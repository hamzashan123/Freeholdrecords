@extends('layouts.admin-auth')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                               <input type="hidden" name="token" value="{{ $token }}">
                               <div class="form-group">
                                    <label for="email">Email*</label>
                                   <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user" placeholder="Your email">
                                   @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                               
                           </div>

                           <div class="form-group">
                           <label for="password">Password*</label>
                                   <input id="pass" type="password" name="password"  class="form-control form-control-user" placeholder="password">
                               
                               
                               @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                           </div>

                           <div class="form-group">
                           <label for="password_confirmation">Confirm password *</label>
                           <input id="pass" type="password" name="password_confirmation" class="form-control form-control-user" placeholder="confirm password">
                               
                               @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                           </div>

                           <div class="button-box">
                               <div class="login-toggle-btn">
                               <button type="submit" class="btn btn-primary btn-user btn-block" >{{ __('Reset Password') }}</button>
                                
                               </div>
                           </div>
                           </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Dont have an acount? </a>
                                </div>
                                <div class="text-center">
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



  











