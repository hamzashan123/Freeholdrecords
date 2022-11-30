<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserRequest;
use App\Models\User;
use App\Models\ConsultantUser;
use App\Services\ImageService;
use App\Traits\ImageUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Auth;
use App\Mail\UserActivatedByAdmin;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterUser;

class UserController extends Controller
{
    use ImageUploadTrait;

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index(): View
    {
        //$this->authorize('access_user');
        $me = Auth::user();

        $data = ConsultantUser::where('consultant_id' ,$me->id);
        $customers = $data->pluck('client_id');
        $myusers = User::whereIn('id',$customers)->get();
        
        if(Auth::user()->hasRole('consultant')){
            $users = User::whereIn('id',$customers)->where('id' ,'!=' , auth()->user()->id)->with('roles')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')
            ->paginate(\request()->limitBy ?? 10); 
        }
        if(Auth::user()->hasRole('admin')){
            $users = User::where('id' ,'!=' , auth()->user()->id)->with('roles')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')
            ->paginate(\request()->limitBy ?? 10);
        }
            
       //dd($users);   
        return view('backend.users.index', compact('users'));
    }

    public function create(): View
    {
        $this->authorize('create_user');

        return view('backend.users.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        
        $this->authorize('create_user');

        if ($request->hasFile('user_image')) {
            $userImage = $this->imageService->storeUserImages($request->username, $request->user_image);
        }
      //  dd($request);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'surname' => $request->surname,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp ?? NULL,
            'location' => $request->location ?? NULL,
            'visa_expiry' => $request->visa_expiry ?? NULL,
            'status' => $request->status,
            'application_status' => $request->application_status,
            'matter' => $request->matter ?? NULL,
            //for 1st 
            'currency' => $request->currency,
            'amount' => $request->amount,
            'client_paid' => $request->client_paid,
            'client_amount' => $request->client_amount,
            'onthe' => $request->onthe,
            'for' => $request->for,
            //for 2nd
            'currency2' => $request->currency2,
            'amount2' => $request->amount2,
            'client_paid2' => $request->client_paid2,
            'client_amount2' => $request->client_amount2,
            'onthe2' => $request->onthe2,
            'for2' => $request->for2,
            //for 3rd
            'currency3' => $request->currency3,
            'amount3' => $request->amount3,
            'client_paid3' => $request->client_paid3,
            'client_amount3' => $request->client_amount3,
            'onthe3' => $request->onthe3,
            'for3' => $request->for3,
            
            'immigiration' => $request->immigiration,
            'admin_comments'=> $request->admin_comments ?? NULL,
            'receive_email' => true,
            'user_image' => $userImage ?? NULL,
        ]);
        
        $user->markEmailAsVerified();
        $user->assignRole('user');
        $adminData = [
            'admin' => true,
            'username' => $request->username,
            'surname' => $request->surname,
            'email' => $request->email,
            'usertype' => 'user',
            'messagetype' => " The User has been correctly activated and 
             successfully add into the online system."
           
        ];
        
        Mail::to(env('ADMINEMAIL','riccardo@australialegal.it'))->send(new RegisterUser($adminData));

        $userData = [
            'admin' => false,
            'username' => $request->username,
            'surname' => $request->surname,
            'email' => $request->email,
            'usertype' => 'user',
            'messagetype' => 'Welcome to Auslegal Info/Docs System Your email and profile have been successfully registered on the Aus Legal Info/Docs System. 
            You can now login at the link below <a href="' . url('admin') . '">Login now</a> and fill out the forms required on your dashboard.'
           
        ];

        Mail::to($request->email)->send(new RegisterUser($userData));

       

        return redirect()->route('admin.users.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function show(User $user): View
    {
        $this->authorize('user_show');

        return view('backend.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        $this->authorize('edit_user');

        return view('backend.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
       
        $this->authorize('edit_user');

        if ($request->hasFile('user_image')) {
            if ($user->user_image) {
                $this->imageService->unlinkImage($user->user_image, 'users');
            }
            $userImage = $this->imageService->storeUserImages($request->username, $request->user_image);
        }

        if ($request->password){
            $password = bcrypt($request->password);
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'surname' => $request->surname,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp ?? NULL,
            'location' => $request->location ?? NULL,
            'visa_expiry' => $request->visa_expiry ?? NULL,
            'status' => $request->status,
            'application_status' => $request->application_status,
            'matter' => $request->matter ?? NULL,
            //for 1st 
            'currency' => $request->currency,
            'amount' => $request->amount,
            'client_paid' => $request->client_paid,
            'client_amount' => $request->client_amount,
            'onthe' => $request->onthe,
            'for' => $request->for,
            //for 2nd
            'currency2' => $request->currency2,
            'amount2' => $request->amount2,
            'client_paid2' => $request->client_paid2,
            'client_amount2' => $request->client_amount2,
            'onthe2' => $request->onthe2,
            'for2' => $request->for2,
            //for 3rd
            'currency3' => $request->currency3,
            'amount3' => $request->amount3,
            'client_paid3' => $request->client_paid3,
            'client_amount3' => $request->client_amount3,
            'onthe3' => $request->onthe3,
            'for3' => $request->for3,

            'immigiration' => $request->immigiration,
            'admin_comments'=> $request->admin_comments ?? NULL,
            'receive_email' => true,
            'user_image' => $userImage ?? NULL,
        ]);
        
        if($request->status == true){
            $userData = [
                'username' => $request->username,
                'email' => $request->email,
                'usertype' => 'consultant',
                'messagetype' => "Dear ".$request->username .", Your Aus Legal Online 
                System Account has been activated. You can now login with your username (please note your username is 
                not your email but the username that was indicated in the previous email you received) and fill out the 
                forms required for your application. IMPORTANT: Please check the following instructions on the workflow 
                in order to understand how the system functions and how you will communicate with your consultant."                
            ];

    Mail::to($request->email)->send(new UserActivatedByAdmin($userData));
        }
               

        return redirect()->route('admin.users.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete_user');

        if ($user->user_image) {
            $this->imageService->unlinkImage($user->user_image, 'users');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }

    public function get_users()
    {
        $me = Auth::user();

        $data = ConsultantUser::where('consultant_id' ,$me->id);
        $customers = $data->pluck('client_id');
        $myusers = User::whereIn('id',$customers)->get();
        
        if(Auth::user()->hasRole('consultant')){
            $users = User::whereIn('id',$customers)->where('id' ,'!=' , auth()->user()->id)->with('roles')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')
            ->paginate(\request()->limitBy ?? 10); 
        }
        if(Auth::user()->hasRole('admin')){
            $users = User::where('id' ,'!=' , auth()->user()->id)->with('roles')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')
            ->paginate(\request()->limitBy ?? 10);
        }

        return view('backend.users.index', compact('users'));
    }

    public function get_clients(){
        $me = Auth::user();

        $data = ConsultantUser::where('consultant_id' ,$me->id);
        $customers = $data->pluck('client_id');
        $myusers = User::whereIn('id',$customers)->get();
        
        if(Auth::user()->hasRole('admin')){
            $users = User::where('id' ,'!=' , auth()->user()->id)->role('user')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')
            ->paginate(\request()->limitBy ?? 10);
        }
        //dd($users);
        return view('backend.users.index', compact('users'));
    }
}
