@extends('layouts.admin')


<style>


div#yourorder {
    width: 70%;
    margin-left: auto;
}
</style>
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css
" rel="stylesheet"> 
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js
"></script>
   
<div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Products   
            </h6>
            <br>
            <h3>  
            @if(Auth::user()->hasRole('user')) 
            
            @if(Auth::user()->discount > 0) (Your Wholesale Discount is  {{Auth::user()->discount}} %) @else   @endif  
                
            @endif
            </h3>
            <br>
                
            

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

        @if(Auth::user()->hasRole('user')) <p class="discountheading"">To place an order click in the box next to the product and it will appear on the order form at the bottom of the page where you can edit the quantity.</p>  @endif  




      

        <div class="table-responsive">
            <table class="table table-hover" id="producttable">
                <thead>
                <tr>
                    <th></th>
                    <th>Sku</th>
                    
                    <th @if(Auth::user()->hasRole('user')) class="hidecolumns" @endif >Sorting</th>
                    
                    <th>Image</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Description</th>
                   
                    <th  class="hidecolumns" >Code</th>
                   
                    <th>RRP</th>
                    <th >Cost Price</th>
                    
                    <th @if(Auth::user()->hasRole('user')) class="hidecolumns" @endif >Your Price</th>
                    
                    <th>Category</th>
                    @if(Auth::user()->hasRole('admin'))
                    <th>Status</th>
                    <!-- <th>Created at</th> -->
                    <th class="text-center" style="width: 30px;">Action</th>
                    @endif
                </tr>
                </thead>
                <tbody id="productbody">
                @forelse($products as $product)
                    <tr id="{{$product->id}}"  >

                        <td>
                            @if(Auth::user()->hasRole('user')) 
                                <input type="checkbox" name="productid" data-itemid="{{$product->id}}" class="productcheck"/> 
                            @endif
                        </td>
                        <td>
                            {{$product->sku}}
                        </td>
                       
                        <td @if(Auth::user()->hasRole('user')) class="hidecolumns" @endif>
                            {{$product->sorting}}
                        </td>
                        
                        <td >
                            @if($product->firstMedia)
                            <img src="{{ asset('storage/images/products/' . $product->firstMedia->file_name) }}"
                                 width="60" height="60" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('img/no-img.png') }}" width="60" height="60" alt="{{ $product->name }}">
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td >{{ $product->size }}</td>
                        <td >{{ $product->description }}</td>
                        
                        <td class="hidecolumns" >{{ $product->code }} </td>
                       
                        <td>£{{ number_format($product->rrp ,2 ) }}</td>
                        <td>£{{ number_format($product->price, 2) }}</td>
                        <td @if(Auth::user()->hasRole('user')) class="hidecolumns" @endif>£{{ number_format( $product->price - (Auth::user()->discount / 100) * $product->price , 2 )}}</td>
                        
                        
                        <td> <b> {{ $product->category ? $product->category->name : NULL }} </b></td>
                        @if(Auth::user()->hasRole('admin'))
                        <td>{{ $product->status }}</td>
                        <!-- <td>{{ $product->created_at }}</td> -->
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
                        <th>Sku</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>RRP</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="productdata">
                    
                    </tbody>
                    
                </table>
            </div>
            <div class="ordernotice" style="text-align:right;">
                <h4>Delivery Required : <span > <input type="date" name="" id="delivery_required" ></span></h4> <br>
                <h4>Order Notes : <span > <textarea id="order_notes" placeholder="Order Notes!"></textarea></span></h4>
            </div>
            <br>
            <div style="text-align:right;">
                    <h2>Total Value : <span id="totalValue"> 0</span></h2>
                    @if(Auth::user()->discount > 0)  <h2>Less Discount : <span id="lessDiscount"> 0</span></h2> @endif
                    <h2>Grand Total : <span id="grandTotal"> 0</span></h2>
            </div>


      


        
    </div>
    
    @if(Auth::user()->hasRole('user'))
        <div class="ml-auto" style="text-align:right">
                    
                        <a class="btn btn-primary" style="display:none;" id="submitOrder"><span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>
                            Submit Order
                        </a>
                
        </div>
    @endif

    <script>
        $(document).ready(function(){
            
            // place order 

            $('#submitOrder').on('click', function(){
                
                $('#submitOrder').text('Please wait...');
                alert('Submit order now');
                var productIds = [];
                var productquantities = [];

                $('#productdata tr').each(function(){
                     console.log($(this).find('.productId').text());
                     productIds.push($(this).find('.productId').text());  
                     productquantities.push($(this).find('.productquantity').val());  
                });

                console.log('productIds', productIds);
                console.log('productquantities', productquantities);
                var orderHtml = $('#yourorder').html();
                var formatTemplate = '';

                $.post('{{route("admin.submitOrder")}}',
                {
                            "_token": "{{ csrf_token() }}",
                            product_ids : productIds,
                            product_quantities: productquantities,
                            amount: $('#grandTotal').text(),
                            delivery_notes : $('#delivery_required').val(),
                            order_notes : $('#order_notes').val(),
                            orderHtml: formatTemplate
                },
                function(data, status){
                    $('#submitOrder').text('Submit Order');
                        console.log(data.data);
                        console.log(data.status);
                        if(data.status == 'success'){
                            
                            Swal.fire(
                            'Order Successfull!',
                            'Thank you for your order!',
                            'success'
                            ).then((result) => {
                                window.location.reload()
                            })
                            
                        }
                });
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
                            html += '<tr id="itemRow'+data.data.id+'" ><td class="productId">'+data.data.id+'</td><td >'+data.data.sku+'</td><td class="productName">'+data.data.name+'</td><td class="productPrice">'+  (data.data.price - ( userdiscount * data.data.price )).toFixed(2)  +'</td><td><input type="number" class="productquantity" value="'+1+'" data-quanitySelected="'+data.data.quantity+'"  /> </div></td> <td class="TotalItemPrice">'+ parseFloat((data.data.price - ( userdiscount * data.data.price ))).toFixed(2) +' </td> <td class="totalrrp">'+ parseFloat(data.data.rrp).toFixed(2) +' </td>  <td><div class="btn-group removeitemRow" data-rowid="'+data.data.id+'"><a  class="btn btn-sm btn-danger" > Remove</a></div></td></tr>';
                            
                            $('#productdata').append(html);

                            var TotalItemPrice = 0;
                            var totalValue = 0;
                            var lessDiscount = 0;
                            var grandTotal = 0;

                            
                            $('#productdata tr').each(function(){
                                //TotalItemPrice = parseFloat($(this).find('.TotalItemPrice').text()) + TotalItemPrice; 
                                
                                quanityValue = $(this).find('.productquantity').val();
                                quanityValueUpadate = parseFloat($(this).find('.totalrrp').text()) * quanityValue;
                                totalValue = quanityValueUpadate + totalValue;  
                                console.log(userdiscount);
                                lessDiscount =  userdiscount * totalValue;
                              
                            });

                            
                            
                            grandTotal =  totalValue - lessDiscount;
                            $('#totalValue').text("0");
                            $('#totalValue').text(totalValue.toFixed(2));

                            $('#lessDiscount').text("0");
                            $('#lessDiscount').text(lessDiscount.toFixed(2));

                            // old correct
                            // $('#grandTotal').text("0");
                            // $('#grandTotal').text(TotalItemPrice.toFixed(2));
                             $('#grandTotal').text("0");
                            $('#grandTotal').text(grandTotal.toFixed(2));

                            if(parseInt($('#grandTotal').text()) > 0){
                                $('#submitOrder').show();
                            }else{
                                $('#submitOrder').hide();
                            }
                        }

                });
            });

            
            $(document).on('keyup change','.productquantity' , function(){
               
                var quantity = $(this).attr('data-quanitySelected');
                var userdiscount = '<?php echo (auth()->user()->discount / 100) ;?>'
                

                if(parseInt($(this).val()) <= 0){
                    $(this).val(1);
                    alert("Quantity must be greater than 0 ");
                }

                // if(parseInt($(this).val()) > parseInt(quantity)){
                //     $(this).val(quantity);
                    
                //     alert("Quantity Limit exceed!");
                // }
                
                var price = $(this).closest('td').siblings('.productPrice').text();
                $(this).closest('td').siblings('.TotalItemPrice').text("");
                $(this).closest('td').siblings('.TotalItemPrice').text(parseFloat($(this).val() * price).toFixed(2));

                $('#totalValue').text("0");
                var rrp = $(this).closest('td').siblings('.totalrrp').text();
                var eachRrpValue = rrp * $(this).val();
                var totalRRP = 0;   
                var lessDiscount = 0; 
                var TotalItemPrice = 0;
                var grandTotal = 0 ;
                
                $('#productdata tr').each(function(){
                    // Grand total
                    TotalItemPrice = parseFloat($(this).find('.TotalItemPrice').text()) + TotalItemPrice; 
                    //  Total Value 
                    quanityValue = $(this).find('.productquantity').val();
                    quanityValueUpadate = parseFloat($(this).find('.totalrrp').text()) * quanityValue;
                    totalRRP = quanityValueUpadate + totalRRP;  

                    lessDiscount =  userdiscount * totalRRP; 
                });

               

                grandTotal =  totalRRP - lessDiscount;

                console.log("totalValue" , totalRRP);
                console.log("lessDiscount" ,lessDiscount);
                console.log("grandTotal" , grandTotal);
                
                $('#totalValue').text("0");
                $('#totalValue').text(totalRRP.toFixed(2));

                $('#lessDiscount').text("0");
                $('#lessDiscount').text(lessDiscount.toFixed(2));

                $('#grandTotal').text("0");
                 $('#grandTotal').text(grandTotal.toFixed(2));
                // old correct
                // $('#grandTotal').text("0");
                // $('#grandTotal').text(TotalItemPrice.toFixed(2));

            });

            $(document).on('click','.removeitemRow' , function(){
                
                var userdiscount = '<?php echo (auth()->user()->discount / 100) ;?>'

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

                $('#totalValue').text("0");
                var rrp = $(this).closest('td').siblings('.totalrrp').text();
                var eachRrpValue = rrp * $(this).val();
                var totalRRP = 0;   
                var lessDiscount = 0; 
                var grandTotal = 0;

                var TotalItemPrice = 0;
                
                $('#productdata tr').each(function(){
                    // Grand total
                    TotalItemPrice = parseFloat($(this).find('.TotalItemPrice').text()) + TotalItemPrice; 
                    //  Total Value 
                    quanityValue = $(this).find('.productquantity').val();
                    quanityValueUpadate = parseFloat($(this).find('.totalrrp').text()) * quanityValue;
                    totalRRP = quanityValueUpadate + totalRRP;  

                    lessDiscount =  userdiscount * totalRRP; 
                });

                grandTotal =  totalRRP - lessDiscount;

                $('#totalValue').text("0");
                $('#totalValue').text(totalRRP.toFixed(2));

                $('#lessDiscount').text("0");
                $('#lessDiscount').text(lessDiscount.toFixed(2));

                $('#grandTotal').text("0");
                 $('#grandTotal').text(grandTotal.toFixed(2));

                $(this).closest('tr').remove();
            });


        });
    </script>
   
    <script>
            $('#producttable').DataTable( {
                // order: [[11, 'asc'], [2, 'asc']],
                dom: 'Bfrtip',
                buttons: [
                     'csv' , 'pdf'
                ]
            } );
            
    </script>
    
   
    
   
@endsection
