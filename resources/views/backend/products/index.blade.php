@extends('layouts.admin')


<style>


div#yourorder {
    width: 70%;
    margin-left: auto;
}
</style>
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
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
                    <th>#</th>
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
                <tbody id="productbody">
                @forelse($products as $product)
                    <tr id="{{$product->id}}"  >
                        <td>@if($product->quantity > 0 )<input type="checkbox" name="productid" data-itemid="{{$product->id}}" class="productcheck"/> @endif</td>
                        <td >
                            @if($product->firstMedia)
                            <img src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}"
                                 width="60" height="60" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('img/no-img.png') }}" width="60" height="60" alt="{{ $product->name }}">
                            @endif
                        </td>
                        <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a></td>
                        <td >{{ $product->description }}</td>
                        <td>{{ $product->code }} </td>
                        <td>£{{ $product->rrp }}</td>
                        <td>£{{ $product->price }}</td>
                        <td>£{{ number_format( $product->price - (Auth::user()->discount / 100) * $product->price , 2 )}}</td>
                        <td>@if($product->quantity > 0 ) {{ $product->quantity }} @else  <span style="color:red;">  Out Of Stock </span> @endif </td>
                        
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


    <div class="card shadow mb-4" id="yourorder" style="display:none;">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Your Order   
            </h6>
            <br>
            
           
        
        </div>

        <div class="table-responsive">
                <table class="table table-hover" id="producttable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="productdata">
                    
                    </tbody>
                    
                </table>
            </div>

            <div style="text-align:right;">
                    <h2>Grand Total : <span id="grandTotal"> 0</span></h2>
            </div>


      


        
    </div>
    
    @if(Auth::user()->hasRole('user'))
        <div class="ml-auto" style="text-align:right">
                    
                        <a class="btn btn-primary" id="submitOrder"><span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>
                            Submit Order
                        </a>
                
        </div>
    @endif

    <script>
        $(document).ready(function(){
            
            // place order 

            $('#submitOrder').on('click', function(){
                alert('Submit order now');
                var productIds = [];
                var productquantities = [];

                $('#productdata tr').each(function(){
                     productIds.push($(this).find('.productId').text());  
                     productquantities.push($(this).find('.productquantity').val());  
                });

                console.log('productIds', productIds);
                console.log('productquantities', productquantities);
                var orderHtml = $('#yourorder').html();

                var emailTemplate = jQuery('div#yourorder').html();
                $html = $(emailTemplate);
                $html.find('thead th:last-child').remove();
                $html.find('tbody tr td:last-child').remove();
                $html.each(function(index, element) {
                    console.log($(element).html());
                });
                // $.post('{{route("admin.submitOrder")}}',
                // {
                //             "_token": "{{ csrf_token() }}",
                //             product_ids : productIds,
                //             product_quantities: productquantities,
                //             amount: $('#grandTotal').text(),
                //             orderHtml: $('#yourorder').html()
                // },
                // function(data, status){
                //         console.log(data.data);
                //         console.log(data.status);
                //         if(data.status == 'success'){
                //             window.location.reload()
                //         }
                // });
            });


            // product click to add in order
            $('.productcheck').on('change', function(){
                var thisCheck = $(this).is(":checked");
                
                var userdiscount = '<?php echo (auth()->user()->discount / 100) ;?>'
                console.log(userdiscount);
                console.log(thisCheck);       
                $('#yourorder').show();    
                var productid = $(this).attr('data-itemid');
                $.post('{{route("admin.singleproduct")}}',
                {
                            "_token": "{{ csrf_token() }}",
                            product_id : productid,
                },
                function(data, status){

                        console.log(data);
                       
                        if(thisCheck == false){
                            
                            $("#itemRow"+data.data.id).remove();

                            // if($('#productdata tr').length < 2){
                            //     $('#yourorder').hide();
                            // }    
                        }else{
                            var html = '';
                            html += '<tr id="itemRow'+data.data.id+'" ><td class="productId">'+data.data.id+'</td><td class="productName">'+data.data.name+'</td><td class="productPrice">'+  (data.data.price - ( userdiscount * data.data.price )).toFixed(2)  +'</td><td><input type="number" class="productquantity" data-quanitySelected="'+data.data.quantity+'"  /> </div></td> <td class="TotalItemPrice">'+ (data.data.price - ( userdiscount * data.data.price )).toFixed(2) +' </td>   <td><div class="btn-group removeitemRow" data-rowid="'+data.data.id+'"><a  class="btn btn-sm btn-danger" > Remove</a></div></td></tr>';
                            
                            $('#productdata').append(html);
                        }

                });
            });

            
            $(document).on('keyup','.productquantity' , function(){
               
                var quantity = $(this).attr('data-quanitySelected');
            
                if($(this).val() > quantity){
                    $(this).val(quantity);
                    
                    alert("Quantity Limit exceed!");
                }
                var price = $(this).closest('td').siblings('.productPrice').text();
                $(this).closest('td').siblings('.TotalItemPrice').text("");
                $(this).closest('td').siblings('.TotalItemPrice').text($(this).val() * price);

                var TotalItemPrice = 0;
                $('#productdata tr').each(function(){
                     TotalItemPrice = parseFloat($(this).find('.TotalItemPrice').text()) + TotalItemPrice;  
                });

                $('#grandTotal').text("0");
                $('#grandTotal').text(TotalItemPrice.toFixed(2));

            });

            $(document).on('click','.removeitemRow' , function(){
               
                if($('#productdata tr').length < 2){
                    $('#yourorder').hide();
                }
                var thisRowId = $(this).attr('data-rowid');
                // console.log(thisRowId);
                // console.log("tablelength ",$('#productbody tr').length);
                $('#productbody tr').each(function(){
                        // console.log("thisIdLoop" ,$(this).attr('id'));
                        // console.log("click row id ", thisRowId);
                        if($(this).attr('id') == thisRowId){
                            // alert("asdas");
                            // console.log($(this).attr('id'));
                            // console.log(thisRowId);
                            $(this).find('input').prop('checked', false);
                            //jQuery('input[type="checkbox"]').prop('checked', false);
                        }   
                        
                    });

                $(this).closest('tr').remove();
            });


        });
    </script>
    <script>
            $('#producttable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                     'csv' , 'pdf'
                ]
            } );
            
    </script>

   
@endsection
