@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/vendor/select2/css/select2.min.css') }}">
@endsection
@section('content')

    <div class="row">
      
        <div class="col-12">
                        <div class="form-group" style="text-align:right">
                        <a href="{{route('admin.consultant.index')}}" class="btn btn-secondary" style="align-item:right;" >Back</a>
                        </div>
            
            <div class="card">
                <div class="card-header"><b>Clients List</b></div>
                <div class="card-body">
            
                        <div class="row">
                            <div class="col-12">
                            <div class="table-responsive">
                <table class="table table-content table-hover">
                    <thead>
                        <tr>
                            <th>UserName</th>
                            <th>Client Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($users as $user)
                            
                            <tr>
                                <td>{{ ucfirst($user->username) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="btn-group btn-group-toggle">
                                        <a href="{{route('admin.consultant.user.delete', ['userid' => $user->id, 'consultantid' => $id])}}" title="Show" class="btn-danger btn btn-sm"><i class="fa fa-trash"> Delete Client</i></a>
                                    </div>
                                </td>
                            </tr>
                        
                            
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
                            </div>
                        </div>
                       
              
                </div>
                
            </div>
        </div>
    </div>

@endsection


