<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Mail\RegisterUser;
use Illuminate\Support\Facades\Mail;
use Config;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['first_name'].$data['last_name'],
            'email' => $data['email'],
            'accountemail' => $data['accountemail'],
            'phone' => $data['phone'],
            'status' => false,
            'password' => Hash::make($data['password']),
            'company_name' => $data['company_name'],
            'company_contact' => $data['company_contact'],
            'trading_address' => $data['trading_address'],
            'delivery_address' => $data['delivery_address'],
            
        ]);
    
        $user->markEmailAsVerified();
        $user->assignRole('user');

        $admin = User::role('admin')->first();

        $adminData = [
            'admin' => true,
            'username' => $data['first_name'].$data['last_name'],
            'password' => "",
            'email' => $data['email'],
            'usertype' => 'user',
            'messagetype' => "New User/Customer Registered on your system."
           
        ];
        
        Mail::to($admin->email)->send(new RegisterUser($adminData));

        return redirect()->route('register')->with([
            'message' => 'Registered successfully',
            'alert-type' => 'success'
        ]);

    }
}
