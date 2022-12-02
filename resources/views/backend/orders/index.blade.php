@extends('layouts.admin')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Title ID: 12XY23GN12
            </h6>
            <div class="ml-auto">

            </div>
        </div>

       

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Searches</th>
                    <th>Status</th>
                    <th>App Id</th>
                    <th>County</th>
                    <th>Block</th>
                    <th>Lot</th>
                    <th>Premises</th>
                    <th>Actions</th>
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
                        <td>{{ $order->searches }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->app_id }}</td>
                        <td>{{ $order->county }}</td>
                        <td>{{ $order->block }}</td>
                        <td>{{ $order->lot }}</td>
                        <td>{{ $order->premises }}</td>
                        <td>
                            <a href="javascript:void(0);"
                               onclick="if (confirm('Are you sure to delete this record?'))
                                   {document.getElementById('delete-order-{{ $order->id }}').submit();} else {return false;}"
                               class="btn btn-sm btn-danger">
                                <i class="fa fa-download"></i> Download
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
                    <tr>
                        <td class="text-center" colspan="6">No orders found.</td>
                    </tr>
                @endforelse
                </tbody>
                
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Title ID: 12XY23GN12
            </h6>
            <div class="ml-auto">

            </div>
        </div>

       

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Searches</th>
                    <th>Status</th>
                    <th>App Id</th>
                    <th>County</th>
                    <th>Block</th>
                    <th>Lot</th>
                    <th>Premises</th>
                    <th>Actions</th>
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
                        <td>{{ $order->searches }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->app_id }}</td>
                        <td>{{ $order->county }}</td>
                        <td>{{ $order->block }}</td>
                        <td>{{ $order->lot }}</td>
                        <td>{{ $order->premises }}</td>
                        <td>
                            <a href="javascript:void(0);"
                               onclick="if (confirm('Are you sure to delete this record?'))
                                   {document.getElementById('delete-order-{{ $order->id }}').submit();} else {return false;}"
                               class="btn btn-sm btn-danger">
                                <i class="fa fa-download"></i> Download
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
                    <tr>
                        <td class="text-center" colspan="6">No orders found.</td>
                    </tr>
                @endforelse
                </tbody>
                
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Title ID: 12XY23GN12
            </h6>
            <div class="ml-auto">

            </div>
        </div>

       

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Searches</th>
                    <th>Status</th>
                    <th>App Id</th>
                    <th>County</th>
                    <th>Block</th>
                    <th>Lot</th>
                    <th>Premises</th>
                    <th>Actions</th>
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
                        <td>{{ $order->searches }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->app_id }}</td>
                        <td>{{ $order->county }}</td>
                        <td>{{ $order->block }}</td>
                        <td>{{ $order->lot }}</td>
                        <td>{{ $order->premises }}</td>
                        <td>
                            <a href="javascript:void(0);"
                               onclick="if (confirm('Are you sure to delete this record?'))
                                   {document.getElementById('delete-order-{{ $order->id }}').submit();} else {return false;}"
                               class="btn btn-sm btn-danger">
                                <i class="fa fa-download"></i> Download
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
                    <tr>
                        <td class="text-center" colspan="6">No orders found.</td>
                    </tr>
                @endforelse
                </tbody>
                
            </table>
        </div>
    </div>
@endsection
