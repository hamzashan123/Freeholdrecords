@extends('layouts.admin-auth')
@section('title', 'Registration')
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
    <div class="col-xl-12 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-size: cover !important; background-image: url('/img/bg-01.jpg') !important;"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4" style="font-weight:bold !important; text-align:left !important;">Register</h1>
                                <p style="text-align:left;"> This is a secure system and you will need to provide your registration details to access the site</p>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="company" class="text-small text-uppercase">{{ __('company') }}</label>
                                            <input id="company" type="text" class="form-control form-control-lg" name="company" value="{{ old('company') }}" placeholder="First Name">
                                            @error('first_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first_name" class="text-small text-uppercase">{{ __('First Name') }}</label>
                                            <input id="first_name" type="text" class="form-control form-control-lg" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                                            @error('first_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="last_name" class="text-small text-uppercase">{{ __('Last Name') }}</label>
                                            <input id="last_name" type="text" class="form-control form-control-lg" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                                            @error('last_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <!-- <div class="col-6">
                                        <div class="form-group">
                                            <label for="surname" class="text-small text-uppercase">{{ __('CREATE SURNAME') }}</label>
                                            <input id="surname" type="text" class="form-control form-control-lg" name="surname" value="{{ old('surname') }}" placeholder="Create surname">
                                            @error('surname')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="username" class="text-small text-uppercase">{{ __('CREATE USERNAME') }}</label>
                                            <input id="username" type="text" class="form-control form-control-lg" name="username" value="{{ old('username') }}" placeholder="Create username">
                                            @error('username')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div> -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email" class="text-small text-uppercase">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email" class="form-control form-control-lg" value="{{ old('email') }}" name="email" placeholder="Enter your Email">
                                            @error('email')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="phone" class="text-small text-uppercase">{{ __('Phone') }}</label>
                                            <input id="phonereg" type="number" class="form-control form-control-lg" name="phone" value="{{ old('phone') }}">
                                            @error('phone')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password" class="text-small text-uppercase">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control form-control-lg" name="password" placeholder="Enter your password">
                                            @error('password')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password-confirm" class="text-small text-uppercase">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm Password">
                                            @error('password-confirm')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>

                                    <!-- <div class="col-12">
                                           <label for="register-as" class="text-small text-uppercase"> Register As </label>
                                            <div class="userType">
                                            
                                                <div class="userTypee">
                                                
                                                <input id="usertype" type="radio" class=" " name="usertype" value="user" placeholder="Client"  checked>
                                                <label for="register-as" class="text-small text-uppercase"> Client </label>
                                                
                                                </div>
                                                <div class="userTypee">
                                                <input id="usertype" type="radio"  class="" name="usertype" value="consultant" placeholder="Consultant" >
                                                <label for="register-as" class="text-small text-uppercase"> Consultant </label>
                                               

                                                </div>
                                               
                                            </div>
                                            
                                        </div> -->
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Register') }}
                                    </button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("input[type='radio']").change(function() {

        // alert('asdasd');



        if ($('input[type=radio]:checked').val() == "consultant") {
            //alert('check consultant')

            $('.usertypeuser').removeAttr('checked')
            $('.usertypeconsultant').attr('checked', 'true')
        } else {
            $('.usertypeconsultant').removeAttr('checked')
            $('.usertypeuser').attr('checked', 'true')

            // $('.usertypeuser').removeAttr('checked')
        }


        // $(this).find('input[type=radio]').attr('checked', 'checked');

        // if ( $(this).val() == "consultant") {
        //     alert('cons');
        //     $('.usertypeconsultant').prop('checked', false);
        //     $('.usertypeuser').prop('checked', true);
        // }  else {
        //     alert($(this).val())
        //     $('.usertypeuser').prop('checked', true);
        //     $('.usertypeconsultant').prop('checked', false);
        // }


        //         $('input[type=radio]').change(function() {
        //     // When any radio button on the page is selected,
        //     // then deselect all other radio buttons.

        // });

    });
</script>
@endsection