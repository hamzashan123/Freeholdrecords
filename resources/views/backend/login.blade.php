@extends('layouts.admin-auth')

@section('content')
<style>
    input {
        border-radius: 0px !important;
    }

    button[type="submit"] {
        margin-top: 20px;
        font-size: 19px !important;
        font-weight: bold !important;
        border-radius: 0px !important;
        letter-spacing: 2px;
    }

    label {
        font-weight: bold;
    }
</style>
<div class="row justify-content-center login">
    <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-size: cover !important; background-image: url('/img/bg-01.jpg') !important;"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4" style="font-weight: bold; text-align:left !important;">Wholesale Customer System</h1>
                                <p style="text-align:left !important;"> This is a secure system and you will need to provide your login details to access the site </p>
                            </div>
                            @if(Session::has('inactive'))
                            <span class="text-danger"> {{Session::get('inactive')}} </span>
                            @endif
                            <form class="user" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label> Email </label>
                                    <input style="border-radius:0px !important;" type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user" placeholder="Enter Your email">
                                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label> PASSWORD </label>
                                    <input style="border-radius:0px !important;" type="password" name="password" value="{{ old('password') }}" class="form-control form-control-user" placeholder="Enter Your Password">
                                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block mylogin" type="submit" name="login" style="border-radius:0px !important;">
                                    LOGIN
                                </button>
                            </form>
                            <hr>
                            <div class="text-center" id="registerDiv">
                                <a class="small" href="{{ route('register') }}">Request for and account? </a>
                            </div>
                            <div class="" id="forgetPassword">
                                <a class="small" href="{{ route('admin.forgot_password') }}">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection