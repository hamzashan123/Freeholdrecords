@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
            Users
        </h6>
    </div>


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th class="text-center" style="width: 30px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>
                        {{ $user->first_name }} {{ $user->last_name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>

                        <!-- {{ $user->status }} -->
                        <div class="activeInactive">
                            <label class="switch">
                                <input type="checkbox" id="togBtn">
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