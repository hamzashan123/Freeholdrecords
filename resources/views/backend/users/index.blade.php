@extends('layouts.admin')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
            Add New User
        </h6>
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

            </div>




            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> {{ __('Add User') }}
                </button>
            </div>
        </form>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
            Users List
        </h6>
    </div>


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th class="text-center" style="width: 30px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>

                        @if($user->user_image)
                        <img class="img-profile rounded-circle" src="{{ asset('storage/images/users/' . $user->user_image) }}" alt="{{ $user->full_name }}" width="60" height="60">
                        @else
                        <img class="img-profile rounded-circle" src="{{ asset('img/avatar.png') }}" alt="{{ $user->full_name }}" width="60" height="60">
                        @endif
                    </td>
                    <td>
                        {{ $user->first_name }} {{ $user->last_name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->phone }}
                    </td>
                    <td>
                        {{ $user->created_at }}
                    </td>
                    <td>


                        <div class="activeInactive">
                            <label class="switch">
                                @if($user->status == 'Active')
                                <input type="checkbox" id="togBtn" checked class="update_status" data-id="{{$user->id}}">
                                @else
                                <input type="checkbox" id="togBtn" class="update_status" data-id="{{$user->id}}">
                                @endif
                                <div class="slider round"></div>
                            </label>
                        </div>
                    </td>

                    <td>
                        
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?'))
                                       {document.getElementById('delete-tag-{{ $user->id }}').submit();} else {return false;}" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" id="delete-tag-{{ $user->id }}" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="6">No users found.</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="float-right">
                            {!! $users->appends(request()->all())->links() !!}
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".update_status").change(function(e) {
            e.preventDefault();
            var status = '';
            if ($(this).is(":checked")) {
                status = 'Active';

            } else {
                status = 'Inactive';
            }
            var rowid = $(this).attr('data-id');

            $.ajax({
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "userid": rowid,
                    "status": status
                },
                url: "{{route('admin.updatestatus')}}",
                success: function(data) {
                    console.log(data.status);
                    if (data.status == 200) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else if (data.status == 201) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'danger',
                            title: 'Failed to update status!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }

                }
            });
        });
    });
</script>