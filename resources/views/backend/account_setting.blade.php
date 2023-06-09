@extends('layouts.admin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Account : ({{ auth()->user()->full_name }})
            </h6>
            <div class="ml-auto">

            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.account_setting.update', auth()->id()) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input class="form-control" id="first_name" type="text" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}">
                            @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input class="form-control" id="last_name" type="text" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}">
                            @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" id="username" type="text" name="username" value="{{ old('username', auth()->user()->username) }}">
                            @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                <div class="col-6">
                                        <div class="form-group">
                                            <label for="trading_address" class="text-small text-uppercase">{{ __('Trading address ') }}</label>
                                            <input id="trading_address" type="text" class="form-control form-control-lg" name="trading_address" value="{{ old('trading_address', auth()->user()->trading_address) }}" placeholder="Trading address">
                                            @error('trading_address')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                <div class="col-6">
                                        <div class="form-group">
                                            <label for="delivery_address" class="text-small text-uppercase">{{ __('Delivery address ') }}</label>
                                            <input id="delivery_address" type="text" class="form-control form-control-lg" name="delivery_address" value="{{ old('delivery_address', auth()->user()->delivery_address) }}" placeholder="Delivery address">
                                            @error('delivery_address')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                </div>
                </div>
               

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email">Sales Email</label>
                            <input class="form-control" id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="accountemail">Accounts Email</label>
                            <input class="form-control" id="accountemail" type="email" name="accountemail" value="{{ old('accountemail', auth()->user()->accountemail) }}">
                            @error('accountemail')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" id="phone" type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                            @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="password" class="text-danger">Change password</label>
                            <input class="form-control" id="password" type="password" name="password" value="{{ old('password') }}">
                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        @if(auth()->user()->user_image)
                            <img src="{{ asset('storage/images/users/' . auth()->user()->user_image) }}" alt="{{ auth()->user()->full_name }}" width="60" height="60">
                        @else
                            <img src="{{ asset('img/avatar.png') }}" alt="{{ auth()->user()->full_name }}" width="60" height="60">
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

    @include('backend.users.edit_password')
@endsection
