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

        
            $users = User::where('id' ,'!=' , auth()->user()->id)->with('roles')
            ->when(\request()->keyword != null, function ($query) {
                $query->search(\request()->keyword);
            })
            ->when(\request()->status != null, function ($query) {
                $query->whereStatus(\request()->status);
            })
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')
            ->paginate(\request()->limitBy ?? 25);
         
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
        $username = $request->first_name.$request->last_name . uniqid();
        $password = bcrypt($request->password);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $username,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => $password,
            'phone' => $request->phone,
            'status' => true,
            'receive_email' => true,
            'user_image' => $userImage ?? NULL,
        ]);
        
        $user->markEmailAsVerified();
        $user->assignRole('user');
        $adminData = [
            'admin' => true,
            'username' => $username,
            'password' => $password,
            'email' => $request->email,
            'usertype' => 'user',
            'messagetype' => "New User has been registered."
           
        ];
        
        Mail::to('hamzashan123@gmail.com')->send(new RegisterUser($adminData));

        $userData = [
            'admin' => false,
            'username' => $username,
            'email' => $request->email,
            'password' => $password,
            'usertype' => 'user',
            'messagetype' => ' Welcome to FreeHold Records LLC 
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
}
