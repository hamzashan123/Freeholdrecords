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
                <div class="col-4">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input class="form-control" id="first_name" type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                        @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input class="form-control" id="last_name" type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                        @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" id="username" type="text" name="username" value="{{ old('username', $user->username) }}">
                        @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="email">Sales Email</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{ old('email', $user->email) }}">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="email">Account Email</label>
                        <input class="form-control" id="accountemail" type="accountemail" name="accountemail" value="{{ old('accountemail', $user->accountemail) }}">
                        @error('accountemail')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="form-control" id="phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}">
                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                
               
               
            </div>
             
            <div class="row">
            <div class="col-4">
                    <div class="form-group">
                        <label for="company_name" class="text-small text-uppercase">{{ __('Company Name') }}</label>
                        <input id="company_name" type="text" class="form-control form-control" name="company_name" value="{{ old('company_name', $user->company_name) }}" placeholder="Company Name">
                        @error('company_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="company_contact" class="text-small text-uppercase">{{ __('Company Contact') }}</label>
                        <input id="company_contact" type="tel" class="form-control form-control" name="company_contact" value="{{ old('company_contact', $user->company_contact) }}" placeholder="Company Contact">
                        @error('company_contact')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="discount" class="text-small text-uppercase">{{ __('% discount ') }}</label>
                        <input id="discount" type="text" class="form-control form-control" name="discount" value="{{ old('discount', $user->discount) }}" placeholder="Discount">
                        @error('discount')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" {{ old('status', $user->status) == "Active" ? 'selected' : null }}>Active</option>
                                <option value="0" {{ old('status', $user->status) == "Inactive" ? 'selected' : null }}>Inactive</option>
                            </select>
                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                </div>
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
                    @if($user->user_image)
                    <img class="img-profile rounded-circle" src="{{ asset('storage/images/users/' . $user->user_image) }}" alt="{{ $user->full_name }}" width="60" height="60">
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