@extends('layouts.admin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Create Customer
            </h6>
            <div class="ml-auto">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Back to customers</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="first_name" class="text-small text-uppercase">{{ __('First Name') }}</label>
                        <input id="first_name" type="text" class="form-control form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                        @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="last_name" class="text-small text-uppercase">{{ __('Last Name') }}</label>
                        <input id="last_name" type="text" class="form-control form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                        @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="company_name" class="text-small text-uppercase">{{ __('Company Name') }}</label>
                        <input id="company_name" type="text" class="form-control form-control" name="company_name" value="{{ old('company_name') }}" placeholder="Company Name">
                        @error('company_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="company_contact" class="text-small text-uppercase">{{ __('Company Contact') }}</label>
                        <input id="company_contact" type="tel" class="form-control form-control" name="company_contact" value="{{ old('company_contact') }}" placeholder="Company Contact">
                        @error('company_contact')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="email" class="text-small text-uppercase">{{ __('E-Mail') }}</label>
                        <input id="email" type="email" class="form-control form-control" name="email" value="{{ old('email') }}" placeholder="Enter your Email">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="phone" class="text-small text-uppercase">{{ __('Phone') }}</label>
                        <input id="phone" type="tel" class="form-control form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
                        @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="discount" class="text-small text-uppercase">{{ __('% discount ') }}</label>
                        <input id="discount" type="text" class="form-control form-control" name="discount" value="{{ old('discount') }}" placeholder="Discount">
                        @error('discount')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" >Active</option>
                            <option value="0" >Inactive</option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
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
