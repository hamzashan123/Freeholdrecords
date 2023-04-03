@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
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
                    <th>#</th>
                    <th>User</th>
                    <th>OrderId</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Create date</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}">
                                {{ $order->ref_id }}
                            </a>
                        </td>
                        <td>sada</td>
                        <td>asdas</td>
                        <td>dasd</td>
                      
                        <td>adsd</td>
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
                <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="float-right">
                            
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>


    <script>
            let table = new DataTable('#orderstable');
        </script>
@endsection
