@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                 Orders List
            </h6>
            <div class="ml-auto">

            </div>
        </div>

        <!-- @include('backend.orders.filter') -->

        <div class="table-responsive">
            <table class="table table-hover" id="orderstable">
                <thead>
                <tr>
                    <th>#orderId</th>
                    <th>Customer Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Create date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}">
                                {{ $order->id }}
                            </a>
                        </td>
                        <td>@if(!empty($order->user->username)) {{ $order->user->username}} @endif</td>
                        <td>{{ $order->amount }}</td>
                        <td>{{ $order->status}}</td>
                        <td>{{ $order->created_at}}</td>
                        <td>
                            <a href="javascript:void(0);"
                               onclick="if (confirm('Are you sure to delete this record?'))
                                   {document.getElementById('delete-order-{{ $order->id }}').submit();} else {return false;}"
                               class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form action="{{ route('admin.orders.destroy', $order) }}"
                                  method="POST"
                                  id="delete-order-{{ $order->id }}" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    
                @endforelse
                </tbody>
               
            </table>
        </div>
    </div>


    <script>
       
            $('#orderstable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                     'csv' , 'pdf'
                ]
            } );
       
            
        </script>
@endsection
