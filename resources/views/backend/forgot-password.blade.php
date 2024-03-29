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
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-password-image" style="background-size: cover !important; background-image: url('/wholesale/img/bg-01.jpg') !important;"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2" style="text-align:left;">Forgot Your Password?</h1>
                                <p class="mb-4" style="text-align:left;">We get it, stuff happens. Just enter your email address below
                                    and we'll send you a link to reset your password!</p>
                            </div>
                            <form class="user" action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user" placeholder="Enter Email Address...">
                                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Reset Password
                                </button>
                            </form>
                            <hr>
                            <div class="" style="text-align: right;">
                                <a class="small" href="{{ route('admin.login') }}">
                                    Already have an account? Login!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection