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
                    <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-size: cover !important; background-image: url('https://www.vagabondcosmetictoiletbags.co.uk/wp-content/uploads/2021/01/LogoStrapline.svg') !important;"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4" style="font-weight:bold !important; text-align:left !important;">Trade Customer Request</h1>
                                <p style="text-align:left;"> This is a secure system and you will need to provide your registration details to access the site once approved by admin.</p>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="company_name" class="text-small text-uppercase"> Company Name</label>
                                            <input id="company_name" type="text" class="form-control form-control-lg" name="company_name" value="{{ old('company_name') }}" placeholder="Company Name">
                                            @error('company_name')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="company_contact" class="text-small text-uppercase"> Company Contact</label>
                                            <input id="company_contact" type="text" class="form-control form-control-lg" name="company_contact" value="{{ old('company_contact') }}" placeholder="Company Contact">
                                            @error('company_contact')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="trading_address" class="text-small text-uppercase">{{ __('Trading address ') }}</label>
                                            <input id="trading_address" type="text" class="form-control form-control-lg" name="trading_address" value="{{ old('trading_address') }}" placeholder="Trading address">
                                            @error('trading_address')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="delivery_address" class="text-small text-uppercase">{{ __('Delivery address ') }}</label>
                                            <input id="delivery_address" type="text" class="form-control form-control-lg" name="delivery_address" value="{{ old('delivery_address') }}" placeholder="Delivery address">
                                            @error('delivery_address')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email" class="text-small text-uppercase">{{ __('Sales E-Mail Address') }}</label>
                                            <input id="email" type="email" class="form-control form-control-lg" value="{{ old('email') }}" name="email" placeholder="Enter your sales Email">
                                            @error('email')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="accountemail" class="text-small text-uppercase">{{ __('Account E-Mail Address') }}</label>
                                            <input id="accountemail" type="accountemail" class="form-control form-control-lg" value="{{ old('accountemail') }}" name="accountemail" placeholder="Enter your account Email">
                                            @error('accountemail')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="phone" class="text-small text-uppercase">{{ __('Phone') }}</label>
                                            <input id="phonereg" type="number" placeholder="eg. +4470000000" class="form-control form-control-lg" name="phone" value="{{ old('phone') }}">
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

                                  
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('SUBMIT REQUEST') }}
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