@extends('layouts.admin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Create Clients
            </h6>
            <div class="ml-auto">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Back to clients</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="first_name" class="text-small text-uppercase">{{ __('Name') }}</label>
                            <input id="first_name" type="text" class="form-control form-control" name="first_name"
                                   value="{{ old('first_name') }}" placeholder="First Name">
                            @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="surname" class="text-small text-uppercase">{{ __('Sur Name') }}</label>
                            <input id="surname" type="text" class="form-control form-control" name="surname"
                                   value="{{ old('surname') }}" placeholder="surname">
                            @error('surname')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                <div class="col-6">
                        <div class="form-group">
                            <label for="username" class="text-small text-uppercase">{{ __('User Name') }}</label>
                            <input id="username" type="text" class="form-control form-control" name="username"
                                   value="{{ old('username') }}" placeholder="Username">
                            @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email" class="text-small text-uppercase">{{ __('E-Mail') }}</label>
                            <input id="email" type="email" class="form-control form-control" name="email"
                            value="{{ old('email') }}" placeholder="Enter your Email">
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="password" class="text-small text-uppercase">{{ __('New Password') }}</label>
                            <input id="password" type="password" class="form-control form-control"
                                   name="password"
                                   placeholder="Enter your password">
                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="password-confirm"
                                   class="text-small text-uppercase">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control form-control"
                                   name="password_confirmation" placeholder="Confirm Password">
                            @error('password-confirm')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone" class="text-small text-uppercase">{{ __('Phone') }}</label>
                            <input id="phone" type="text" class="form-control form-control" name="phone"
                            value="{{ old('phone') }}" placeholder="Enter your Phone Number">
                            @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="whatsapp" class="text-small text-uppercase">{{ __('Whatsapp') }}</label>
                            <input id="whatsapp" type="number" class="form-control form-control" name="whatsapp"
                            value="{{ old('whatsapp') }}"  placeholder="Enter your whatsapp Phone">
                            @error('whatsapp')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <select name="location" id="location" class="form-control">
                                        <option value="" disabled>-- Choose location --</option>
                                        <option value="Onshore">Onshore</option>
                                        <option value="Offshore">Offshore</option>
                                    </select>
                                    
                                </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                            <label for="visa_expiry" class="text-small text-uppercase">{{ __('Visa Expiry Date') }}</label>
                            <input id="visa_expiry" type="date" class="form-control form-control"
                            value="{{ old('visa_expiry') }}" name="visa_expiry"
                                   >
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">-- Choose Status User --</option>
                                <option value="1" {{ old('status') == "1" ? 'selected' : null }}>Active</option>
                                <option value="0" {{ old('status') == "0" ? 'selected' : null }}>Inactive</option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-4">
                            <div class="form-group">
                                <label for="status">Application Status</label>
                                <select name="application_status" id="application_status" class="form-control">
                                    <option value="" disabled>-- Choose Visa Type --</option>
                                    <option value="To start" >To start</option>
                                    <option value="In progress" >In progress </option>
                                    <option value="In progress" >In progress </option>
                                    <option value="Lodged" >Lodged </option>
                                    <option value="Outcome positive" >Outcome positive </option>
                                    <option value="Outcome negative" >Outcome negative </option>
                                    <option value="AAT" >AATe </option>
                                    <option value="Other">other</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="status">Matter</label>
                                <select name="matter" id="matter" class="form-control">
                                    <option value="" disabled>-- Choose Visa Type --</option>
                                    
                            <option value="Aus citizenship">Aus citizenship</option>
                            <option value="Sponsorship">186 Nom DE
                            </option>
                            <option value="186 Visa DE">186 Visa DE
                            </option>
                            <option value="186 Nom TRT">186 Nom TRT
                            </option>
                            <option value="186 Visa TRT">186 Visa TRT
                            </option>
                            <option value="188 Visa">188 Visa
                            </option>
                            <option value="189 Visa ">189 Visa
                            </option>
                            <option value="190 Visa">190 Visa
                            </option>
                            <option value="400 Visa">400 Visa
                            </option>
                            <option value="482 SBS">482 SBS
                            </option>
                            <option value="482 NOM">482 NOM
                            </option>
                            <option value="482 VISA">482 VISA
                            </option>
                            <option value="491 Visa">491 Visa
                            </option>
                            <option value="494 Visa ">494 Visa
                            </option>
                            <option value="500 Visa">500 Visa</option>
                            <option value="600 Visa">600 Visa</option>
                            <option value="651 Visa">651 Visa </option>
                            <option value="820/801 Partner visa"> 820/801 Partner visa </option>
                            <option value="309/100 Partner visa">309/100 Partner visa</option>
                            <option value="Parent Visa">Parent Visa</option>
                            <option value="Internal study">Internal study </option>
                            <option value="AITISL">AITISL  </option>
                            <option value="ACS ">ACS   </option>
                            <option value="EA">EA  </option>
                            <option value="TRA">TRA  </option>
                            <option value="VETASSESS">VETASSESS  </option>
                            <option value="VETASSESS TRA ANGLISS">VETASSESS TRA ANGLISS  </option>
                            <option value="Other">other</option>
                                </select>
                                
                            </div>
                        </div>

                </div>
                <h2 style="text-align:center;"><strong>Accounts</strong></h2>
                <h4 ><strong>Professional Fees are :</strong></h4>
                <div class="row">
                <div class="col-6">
                                <div class="form-group">
                                    <label for="currency"> Currency </label>
                                    <select name="currency" id="currency" class="form-control">
                                        <option value="" disabled>--  Currency --</option>
                                        <option value="$ AUD">$ AUD</option>
                                        <option value="€ EUR"> € EUR</option>
                                         
                                    </select>
                                    @error('currency')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>  
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="amount"> Amount </label>
                                    <input id="amount" type="text" class="form-control form-control"
                            value="{{ old('amount') }}" name="amount"
                                   >
                                    @error('amount')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>  
                </div>
                <h4 ><strong>Client will pay the Professional fees as follows :</strong></h4>
                <div class="row">
                         <div class="col-4">
                                <div class="form-group">
                                    <label for="service">Service</label>
                                    <select name="service" id="service" class="form-control">
                                        <option value="" disabled>-- Choose service  --</option>
                                        <option value="Entire Service in full">Entire Service in full </option>
                                        <option value="In 2 Installments (1st to start and 2nd once ready to lodge)">In 2 Installments (1st to start and 2nd once ready to lodge) </option>
                                        <option value="Other">Other</option>
                                         
                                    </select>
                                    @error('service')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>   
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="client_paid">Client has Paid </label>
                                    <select name="client_paid" id="client_paid" class="form-control">
                                        <option value="" disabled>-- Client Paid --</option>
                                        <option value="$ AUD">$ AUD</option>
                                        <option value="€ EUR"> € EUR</option>
                                         
                                    </select>
                                    @error('client_paid')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>  
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="client_amount">Client Amount </label>
                                    <input id="client_amount" type="text" class="form-control form-control"
                            value="{{ old('client_amount') }}" name="client_amount"
                                   >
                                    @error('client_amount')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>   
                </div>
                <h4 ><strong>On the :</strong></h4>
                <div class="row">
                <div class="col-12">
                                <div class="form-group">
                                    <label for="onthe">On the</label>
                                    <input id="onthe" type="date" class="form-control form-control"
                            value="{{ old('onthe') }}" name="onthe"
                                   >
                                    @error('onthe')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div> 
                </div>
                <h4 ><strong>For :</strong></h4>
                <div class="row">
                <div class="col-12">
                                <div class="form-group">
                                    <label for="for">For </label>
                                    <select name="for" id="for" class="form-control">
                                        <option value="" disabled>-- Choose for --</option>
                                        <option value="Entire Service in full">Entire Service in full</option>
                                        <option value="1 of 2 installment">1 of 2 installment</option>
                                        <option value="2 of 2 due Amount">2 of 2 due Amount</option>
                                         
                                    </select>
                                    @error('for')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                </div>

                <hr>


                <h4 ><strong>Professional Fees are :</strong></h4>
                <div class="row">
                <div class="col-6">
                                <div class="form-group">
                                    <label for="currency2"> Currency </label>
                                    <select name="currency2" id="currency2" class="form-control">
                                        <option value="" disabled>--  Currency --</option>
                                        <option value="$ AUD">$ AUD</option>
                                        <option value="€ EUR"> € EUR</option>
                                         
                                    </select>
                                    @error('currency2')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>  
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="amount2"> Amount </label>
                                    <input id="amount2" type="text" class="form-control form-control"
                            value="{{ old('amount2') }}" name="amount2"
                                   >
                                    @error('amount2')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>  
                </div>
                <h4 ><strong>Client will pay the Professional fees as follows :</strong></h4>
                <div class="row">
                         <div class="col-4">
                                <div class="form-group">
                                    <label for="service2">Service</label>
                                    <select name="service2" id="service2" class="form-control">
                                        <option value="" disabled>-- Choose service  --</option>
                                        <option value="Entire Service in full">Entire Service in full </option>
                                        <option value="In 2 Installments (1st to start and 2nd once ready to lodge)">In 2 Installments (1st to start and 2nd once ready to lodge) </option>
                                        <option value="Other">Other</option>
                                         
                                    </select>
                                    @error('service2')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>   
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="client_paid2">Client has Paid </label>
                                    <select name="client_paid2" id="client_paid2" class="form-control">
                                        <option value="" disabled>-- Client Paid --</option>
                                        <option value="$ AUD">$ AUD</option>
                                        <option value="€ EUR"> € EUR</option>
                                         
                                    </select>
                                    @error('client_paid2')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>  
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="client_amount2">Client Amount </label>
                                    <input id="client_amount2" type="text" class="form-control form-control"
                            value="{{ old('client_amount2') }}" name="client_amount2"
                                   >
                                    @error('client_amount2')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>   
                </div>
                <h4 ><strong>On the :</strong></h4>
                <div class="row">
                <div class="col-12">
                                <div class="form-group">
                                    <label for="onthe2">On the</label>
                                    <input id="onthe2" type="date" class="form-control form-control"
                            value="{{ old('onthe2') }}" name="onthe2"
                                   >
                                    @error('onthe2')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div> 
                </div>
                <h4 ><strong>For :</strong></h4>
                <div class="row">
                <div class="col-12">
                                <div class="form-group">
                                    <label for="for2">For </label>
                                    <select name="for2" id="for2" class="form-control">
                                        <option value="" disabled>-- Choose for --</option>
                                        <option value="Entire Service in full">Entire Service in full</option>
                                        <option value="1 of 2 installment">1 of 2 installment</option>
                                        <option value="2 of 2 due Amount">2 of 2 due Amount</option>
                                         
                                    </select>
                                    @error('for2')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                </div>

                <hr>


                <h4 ><strong>Professional Fees are :</strong></h4>
                <div class="row">
                <div class="col-6">
                                <div class="form-group">
                                    <label for="currency3"> Currency </label>
                                    <select name="currency3" id="currency3" class="form-control">
                                        <option value="" disabled>--  Currency --</option>
                                        <option value="$ AUD">$ AUD</option>
                                        <option value="€ EUR"> € EUR</option>
                                         
                                    </select>
                                    @error('currency3')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>  
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="amount3"> Amount </label>
                                    <input id="amount3" type="text" class="form-control form-control"
                            value="{{ old('amount3') }}" name="amount3"
                                   >
                                    @error('amount3')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>  
                </div>
                <h4 ><strong>Client will pay the Professional fees as follows :</strong></h4>
                <div class="row">
                         <div class="col-4">
                                <div class="form-group">
                                    <label for="service3">Service</label>
                                    <select name="service3" id="service3" class="form-control">
                                        <option value="" disabled>-- Choose service  --</option>
                                        <option value="Entire Service in full">Entire Service in full </option>
                                        <option value="In 2 Installments (1st to start and 2nd once ready to lodge)">In 2 Installments (1st to start and 2nd once ready to lodge) </option>
                                        <option value="Other">Other</option>
                                         
                                    </select>
                                    @error('service3')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>   
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="client_paid3">Client has Paid </label>
                                    <select name="client_paid3" id="client_paid3" class="form-control">
                                        <option value="" disabled>-- Client Paid --</option>
                                        <option value="$ AUD">$ AUD</option>
                                        <option value="€ EUR"> € EUR</option>
                                         
                                    </select>
                                    @error('client_paid3')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>  
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="client_amount3">Client Amount </label>
                                    <input id="client_amount3" type="text" class="form-control form-control"
                            value="{{ old('client_amount3') }}" name="client_amount3"
                                   >
                                    @error('client_amount3')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>   
                </div>
                <h4 ><strong>On the :</strong></h4>
                <div class="row">
                <div class="col-12">
                                <div class="form-group">
                                    <label for="onthe3">On the</label>
                                    <input id="onthe3" type="date" class="form-control form-control"
                            value="{{ old('onthe3') }}" name="onthe3"
                                   >
                                    @error('onthe3')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div> 
                </div>
                <h4 ><strong>For :</strong></h4>
                <div class="row">
                <div class="col-12">
                                <div class="form-group">
                                    <label for="for3">For </label>
                                    <select name="for3" id="for3" class="form-control">
                                        <option value="" disabled>-- Choose for --</option>
                                        <option value="Entire Service in full">Entire Service in full</option>
                                        <option value="1 of 2 installment">1 of 2 installment</option>
                                        <option value="2 of 2 due Amount">2 of 2 due Amount</option>
                                         
                                    </select>
                                    @error('for3')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                </div>

                <hr>
         
              <div class="row">
              <div class="col-12">
                                <div class="form-group">
                                    <label for="immigiration">Immigiration fee have been paid by  </label>
                                    <select name="immigiration" id="immigiration" class="form-control">
                                        <option value="" disabled>-- Choose Immigration Fee --</option>
                                        <option value="JAL">JAL</option>
                                        <option value="Client">Client</option>
                                        
                                         
                                    </select>
                                    @error('for')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="admin_comments" class="text-small text-uppercase">{{ __('Admin Comments') }}</label>
                            <textarea name="admin_comments" class="form-control">@if(old('admin_comments')) {{old('admin_comments')}} @endif</textarea>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-12">
                        <label for="user_image">User image</label>
                        <br>
                        <div class="form-group">
                            <input type="file" name="user_image">
                        </div>
                        @error('user_image')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
