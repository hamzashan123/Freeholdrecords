@extends('layouts.admin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
            @if(str_contains(url()->current(), '/admin/get-clients'))
                All Clients
            @elseif(Auth::user()->hasRole('consultant'))
                    My Clients
            @else
                     Clients And Consultants
            @endif
               
            </h6>
            <div class="ml-auto">
                @can('create_user')
                @if(str_contains(url()->current(), '/admin/get-clients'))
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                   
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    
                        
                        <span class="text">Add Client</span>
                   
                       
                    </a>
                    @endif
                @endcan
            </div>
        </div>
       

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Username</th>
                    <th>Matter</th>
                    
                    
                    <th>Status</th>
                    <th>Role</th>
                    @if(Auth::user()->hasRole('admin'))   <th>Application Status</th> @endif
                    @if(Auth::user()->hasRole('admin'))   <th>Account Status</th> @endif
                    <th>Created On</th>
                    <th> Assign Forms</th>
                    <th class="text-center" style="width: 30px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            {{ $user->first_name }}
                        </td>
                        
                        <td>{{ $user->surname }}
                        </td>
                        <td>{{ $user->username }}
                        </td>
                        <td>@if($user->roles[0]->name == 'user') {{$user->matter}} @else  <strong > -- </strong>  @endif</td>
                        <td>{{ $user->status }}</td>
                        <td>@if($user->roles[0]->name == 'user')  <strong> Client </strong> @else <strong>{{$user->roles[0]->name}} </strong> @endif <br>
                        @if(Auth::user()->hasRole('admin'))  
                         <td>{{ $user->application_status }}</td> 
                         @endif
                         @if(Auth::user()->hasRole('admin'))  
                         <td>{{ $user->account_status }}</td> 
                         @endif
                        <td>{{ $user->created_at ? $user->created_at->format('Y-m-d') : '' }}</td>
                        <td>
                        <a href="{{ route('admin.user.formslist', $user->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"> View Forms</i>
                         </a>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <!-- <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-success">
                                    Accept
                                </a>
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-danger">
                                    Reject
                                </a> -->
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);"
                                   onclick="if (confirm('Are you sure to delete this record?'))
                                       {document.getElementById('delete-tag-{{ $user->id }}').submit();} else {return false;}"
                                   class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{ route('admin.users.destroy', $user) }}"
                                  method="POST"
                                  id="delete-tag-{{ $user->id }}" class="d-none">
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
