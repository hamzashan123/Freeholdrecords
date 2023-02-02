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
use App\Mail\UserActivatedByAdmin;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        
            $users = User::where('id' ,'!=' , auth()->user()->id)->with('roles')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc');
            
            
            if(Auth::user()->hasRole('admin')){
                $users = $users->paginate(\request()->limitBy ?? 25);
            }else{
               $users =  $users->where('created_by', $me->id)->paginate(\request()->limitBy ?? 25);
            }
        return view('backend.users.index', compact('users'));
    }

    public function create(): View
    {
        //$this->authorize('create_user');

        return view('backend.users.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {

        //$this->authorize('create_user');
        
        if ($request->hasFile('user_image')) {
            $userImage = $this->imageService->storeUserImages($request->username, $request->user_image);
        }
        
        $username = $request->first_name.$request->last_name . uniqid();
        $password = $username.uniqid();
        $password_hashed = bcrypt($password);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $username,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => $password_hashed,
            'phone' => $request->phone,
            'status' => true,
            'receive_email' => true,
            'user_image' => $userImage ?? NULL,
            'created_by' => Auth::user()->id
        ]);
        
        $user->markEmailAsVerified();
        $user->assignRole('user');
     

        $userData = [
            'admin' => false,
            'username' => $username,
            'email' => $request->email,
            'password' => $password,
            'usertype' => 'user',
            'messagetype' => '
            You can now login at the link below <a href="' . url('admin') . '">Login now</a> and see your dashboard.'
           
        ];

        Mail::to($request->email)->send(new RegisterUser($userData));

       

        return redirect()->route('admin.users.index')->with([
            'message' => 'User created successfully',
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
        //$this->authorize('edit_user');

        return view('backend.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
       
        //$this->authorize('edit_user');

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
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'receive_email' => true,
            'user_image' => $userImage ?? NULL,
        ]);
        
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

    public function updateStatus(Request $request){
        
        if($request->status == 'Active'){
            $user = User::where('id', $request->userid)->update([
                'status' => true
            ]);
            $count = User::where('status','Active')->count();

            $userinfo =  User::where('id', $request->userid)->first();

            $userData = [
                'admin' => false,
                'username' => $userinfo->username,
                'email' => $userinfo->email,
                'password' => "",
                'usertype' => 'user',
                'messagetype' => '
                     Your account has been activated please login with this link <a href="' . url('admin') . '">Login now</a> and see your dashboard.'
               
            ];
    
            Mail::to($userinfo->email)->send(new UserActivatedByAdmin($userData));
            
            return response()->json(['msg' => 'User Successfully Active!' ,'countusers' => $count,'status' => 200]);
        }else{
            $user = User::where('id', $request->userid)->update([
                'status' => false
            ]);
            $count = User::where('status','Active')->count();

            $userinfo =  User::where('id', $request->userid)->first();
            $userData = [
                'admin' => false,
                'username' => $userinfo->username,
                'email' => $userinfo->email,
                'password' => "",
                'usertype' => 'user',
                'messagetype' => '
                     Your account has been dectivated please contact with system administrator.'
               
            ];
    
            Mail::to($userinfo->email)->send(new UserActivatedByAdmin($userData));
            return response()->json(['msg' => 'User Successfully Inactive!' ,'countusers' => $count,'status' => 201]);
        }
        
        
    }
}
