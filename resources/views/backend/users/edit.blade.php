@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
            Edit user: ({{ $user->full_name }})
        </h6>
        <div class="ml-auto">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                <span class="icon text-white-50">
                    <i class="fa fa-home"></i>
                </span>
                <span class="text">Back to users</span>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input class="form-control" id="first_name" type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                        @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                        <div class="form-group">
                            <label for="surname" class="">{{ __('Sur Name') }}</label>
                            <input id="surname" type="text" class="form-control" name="surname"
                            value="{{ old('surname', $user->surname) }}" placeholder="surname">
                            @error('surname')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" id="username" type="text" name="username" value="{{ old('username', $user->username) }}">
                        @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{ old('email', $user->email) }}">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
              
            <div class="col-4">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status', $user->status) == "Active" ? 'selected' : null }}>Active</option>
                            <option value="0" {{ old('status', $user->status) == "Inactive" ? 'selected' : null }}>Inactive</option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>    
                <div class="col-4">
                    <div class="form-group">
                        <label for="status">Application Status</label>
                        <select name="application_status" id="application_status" class="form-control">
                            <option value="" disabled>-- Choose Visa Type --</option>
                            @if(!empty(isset($user->application_status)))
                            <option value="{{$user->application_status}}" selected>{{$user->application_status}}</option>
                            @endif
                            <option value="To start">To start</option>
                            <option value="In progress">In progress </option>
                            <option value="In progress">In progress </option>
                            <option value="Lodged">Lodged </option>
                            <option value="Outcome positive">Outcome positive </option>
                            <option value="Outcome negative">Outcome negative </option>
                            <option value="AAT">AATe </option>
                            <option value="Other">other</option>
                        </select>
                        @error('application_status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="status">Matter</label>
                        <select name="matter" id="matter" class="form-control">
                            <option value="" disabled>-- Choose Visa Type --</option>
                            @if(!empty(isset($user->matter)))
                            <option value="{{$user->matter}}" selected>{{$user->matter}}</option>
                            @endif

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
                            



                            <option value="Other">other</option>
                        </select>
                        @error('matter')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>


                </div>
                <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="form-control" id="phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}">
                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="whatsapp">Whatsapp</label>
                        <input class="form-control" id="whatsapp" type="text" name="whatsapp" value="{{ old('whatsapp', $user->whatsapp) }}">
                        @error('whatsapp')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                
            </div>
                <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="location">Location</label>
                        <select name="location" id="location" class="form-control">
                            <option value="" disabled>-- Choose location --</option>
                            @if(!empty(isset($user->location)))
                            <option value="{{$user->location}}" selected>{{$user->location}}</option>
                            @endif
                            <option value="Onshore">Onshore</option>
                            <option value="Offshore">Offshore</option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                        <div class="form-group">
                            <label for="visa_expiry" class="text-small text-uppercase">{{ __('Visa Expiry Date') }}</label>
                            <input id="visa_expiry" type="date" class="form-control form-control"
                            value="{{ old('visa_expiry', $user->visa_expiry) }}" name="visa_expiry"
                                   >
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
                                        @if(!empty(isset($user->currency)))
                                        <option value="{{$user->currency}}" selected>{{$user->currency}}</option>
                                        @endif
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
                                    value="{{ old('amount', $user->amount) }}" name="amount"
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
                                        @if(!empty(isset($user->service)))
                                        <option value="{{$user->service}}" selected>{{$user->service}}</option>
                                        @endif
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
                                        @if(!empty(isset($user->service)))
                                        <option value="{{$user->service}}" selected>{{$user->service}}</option>
                                        @endif
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
                                    value="{{ old('client_amount', $user->client_amount) }}" name="client_amount"
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
                                    value="{{ old('onthe', $user->onthe) }}" name="onthe"
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
                                        @if(!empty(isset($user->for)))
                                        <option value="{{$user->for}}" selected>{{$user->for}}</option>
                                        @endif
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
                                        @if(!empty(isset($user->currency2)))
                                        <option value="{{$user->currency2}}" selected>{{$user->currency2}}</option>
                                        @endif
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
                            value="{{ old('amount2', $user->amount2) }}" name="amount2"
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
                                        @if(!empty(isset($user->service2)))
                                        <option value="{{$user->service2}}" selected>{{$user->service2}}</option>
                                        @endif
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
                                        @if(!empty(isset($user->client_paid2)))
                                        <option value="{{$user->client_paid2}}" selected>{{$user->client_paid2}}</option>
                                        @endif
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
                            value="{{ old('client_amount2' , $user->client_amount2) }}" name="client_amount2"
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
                            value="{{ old('onthe2' , $user->onthe2) }}" name="onthe2"
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
                                        @if(!empty(isset($user->for2)))
                                        <option value="{{$user->for2}}" selected>{{$user->for2}}</option>
                                        @endif
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
                                        @if(!empty(isset($user->currency3)))
                                        <option value="{{$user->currency3}}" selected>{{$user->currency3}}</option>
                                        @endif
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
                            value="{{ old('amount3' , $user->amount3) }}" name="amount3"
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
                                        @if(!empty(isset($user->service3)))
                                        <option value="{{$user->service3}}" selected>{{$user->service3}}</option>
                                        @endif
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
                                        @if(!empty(isset($user->client_paid3)))
                                        <option value="{{$user->client_paid3}}" selected>{{$user->client_paid3}}</option>
                                        @endif
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
                                    value="{{ old('client_amount3', $user->client_amount3) }}" name="client_amount3"
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
                                    value="{{ old('onthe3', $user->onthe3) }}" name="onthe3"
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
                                        @if(!empty(isset($user->for3)))
                                        <option value="{{$user->for3}}" selected>{{$user->for3}}</option>
                                        @endif
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
                                        @if(!empty(isset($user->immigiration)))
                                        <option value="{{$user->immigiration}}" selected>{{$user->immigiration}}</option>
                                        @endif
                                        <option value="JAL">JAL</option>
                                        <option value="Client">Client</option>
                                        
                                         
                                    </select>
                                    @error('for')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                </div>
            <div class="row">
                <!-- <div class="col-6">
                    <label for="receive-email">Receive Email</label>
                    <select name="receive_email" id="receive-email" class="form-control">
                        <option value="">---</option>
                        <option value="1" {{ old('receive_email', $user->receive_email) == 1 ? 'selected' : null }}>Yes</option>
                        <option value="0" {{ old('receive_email', $user->receive_email) == 0 ? 'selected' : null }}>No</option>
                    </select>
                    @error('receive_email')<span class="text-danger">{{ $message }}</span>@enderror
                </div> -->

                <div class="col-6">
                    <div class="form-group">
                        <label for="password" class="text-danger">Change password</label>
                        <input class="form-control" id="password" type="password" name="password" >
                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="admin_comments" class="text-small text-uppercase">{{ __('Admin Comments') }}</label>
                            <textarea name="admin_comments" class="form-control"> @if(!empty($user->admin_comments)) {{$user->admin_comments}} @endif</textarea>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    @if($user->user_image)
                    <img src="{{ asset('storage/images/users/' . $user->user_image) }}" alt="{{ $user->full_name }}" width="60" height="60">
                    @else
                    <img src="{{ asset('img/avatar.png') }}" alt="{{ $user->full_name }}" width="60" height="60">
                    @endif
                    <br>
                    <input type="file" name="user_image">
                </div>
            </div>

            <div class="form-group pt-4">
                <button class="btn btn-primary" type="submit" name="submit">Update</button>
            </div>
        </form>
    </div>
</div>
<script>
    //remove selected duplicate value from all select tags
    $("select option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
</script>
@endsection