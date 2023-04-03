@extends('layouts.admin')



@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Products   
            </h6>
            <br>
            <h3>  @if(Auth::user()->hasRole('user')) (Your Wholesale Discount is @if(Auth::user()->discount) {{Auth::user()->discount}} @else 0  @endif %) @endif</h3>
            <div class="ml-auto">
                @can('create_category')
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                        <span class="text">New product</span>
                    </a>
                @endcan
            </div>
        </div>

      

        <div class="table-responsive">
            <table class="table table-hover" id="producttable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Code</th>
                    <th>RRP</th>
                    <th>Cost Price</th>
                    <th>Your Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    @if(Auth::user()->hasRole('admin'))
                    <th>Status</th>
                    <th>Created at</th>
                    <th class="text-center" style="width: 30px;">Action</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if($product->firstMedia)
                            <img src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}"
                                 width="60" height="60" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('img/no-img.png') }}" width="60" height="60" alt="{{ $product->name }}">
                            @endif
                        </td>
                        <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->code }} </td>
                        <td>£{{ $product->rrp }}</td>
                        <td>£{{ $product->price }}</td>
                        <td>£{{ number_format( $product->price - (Auth::user()->discount / 100) * $product->price , 2 )}}</td>
                        <td>{{ $product->quantity }}</td>
                        
                        <td> <b> {{ $product->category ? $product->category->name : NULL }} </b></td>
                        @if(Auth::user()->hasRole('admin'))
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);"
                                   onclick="if (confirm('Are you sure to delete this record?'))
                                       {document.getElementById('delete-product-{{ $product->id }}').submit();} else {return false;}"
                                   class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{ route('admin.products.destroy', $product) }}"
                                  method="POST"
                                  id="delete-product-{{ $product->id }}" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="10">No products found.</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="10">
                        <div class="float-right">
                            {!! $products->appends(request()->all())->links() !!}
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>


        
    </div>

    <div class="ml-auto">
                
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                        <span class="text">Submit Order</span>
                    </a>
               
        </div>

        <script>
            let table = new DataTable('#producttable');
        </script>
@endsection
