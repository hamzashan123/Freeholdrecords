@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
            Customers List
        </h6>
        <div class="ml-auto">
                @can('create_category')
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                        <span class="text">Add New Customer</span>
                    </a>
                @endcan
            </div>
    </div>


    <div class="table-responsive">
        <table class="table table-hover" id="userstable">
            <thead>
                <tr>
                    <!-- <th>Avatar</th> -->
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company Name</th>
                    <th>Company Contact</th>
                    <th>% Discount</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th class="text-center" style="width: 30px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <!-- <td>

                        @if($user->user_image)
                        <img class="img-profile rounded-circle" src="{{ asset('storage/images/users/' . $user->user_image) }}" alt="{{ $user->full_name }}" width="60" height="60">
                        @else
                        <img class="img-profile rounded-circle" src="{{ asset('img/avatar.png') }}" alt="{{ $user->full_name }}" width="60" height="60">
                        @endif
                    </td> -->
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
                        {{ $user->company_name }}
                    </td>
                    <td>
                        {{ $user->company_contact }}
                    </td>
                    <td>
                        {{ $user->discount }}
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
            
        </table>
    </div>
</div>

        <script>
            let table = new DataTable('#userstable');
        </script>
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