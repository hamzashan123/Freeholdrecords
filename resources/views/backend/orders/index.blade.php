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
                            
                                {{ $order->id }}
                           
                        </td>
                        <td>@if(!empty($order->user->username)) {{ $order->user->username}} @endif</td>
                        <td>£{{ $order->amount }}</td>
                        <td>{{ $order->status}} </td>
                        <td>{{ $order->created_at}}</td>
                        <td>
                            
                            <div class="btn-group btn-group-sm">

                            <a data-orderid="{{$order->id}}" data-grandtotal="{{$order->amount}}" href="{{route('admin.getorderCsv',['id' => $order->id])}}" class="btn btn-sm btn-primary downloadOrderCsv">
                                    <i class="fa fa-download"></i>
                            </a>
                            <a data-orderid="{{$order->id}}" data-grandtotal="{{$order->amount}}" class="btn btn-sm btn-primary viewOrderItems">
                                    <i class="fa fa-eye"></i>
                            </a>
                            @if(Auth::user()->hasRole('admin'))
                            <a href="{{ route('admin.orders.edit', [$order->id]) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0);"
                               onclick="if (confirm('Are you sure to delete this record?'))
                                   {document.getElementById('delete-order-{{ $order->id }}').submit();} else {return false;}"
                               class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                            </div>
                            <form action="{{ route('admin.orders.destroy', $order) }}"
                                  method="POST"
                                  id="delete-order-{{ $order->id }}" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    
                @endforelse
                </tbody>
               
            </table>
        </div>
    </div>

    <div class="modal modal-primary fade" tabindex="-1" id="viewdetail" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title orderid"> </h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="viewdetail"><span aria-hidden="true">&times;</span></button>
                    
                    
                </div>
                <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">ItemName</th>
                            <th scope="col">Price</th>
                            <th scope="col">Your Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody id="bodyData">
                            <!-- dynamic data comes here with api -->
                        </tbody>
                </table>
                <div style="text-align:right;">
                     <h6 style="font-weight:500">Grand Total : <span id="ordergrandtotal">0</span></h6>
                </div>

                <div class="modal-footer">
                   
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>


       
            $('#orderstable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                     'csv' , 'pdf'
                ]
            } );
       
            $('.viewOrderItems').on('click', function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var order_id = $(this).data('orderid');
                var grandTotal = $(this).data('grandtotal');
            
                $.get('{{route("admin.getorderDetails")}}' + '/'+order_id, function (data) {
                        console.log(data);
                        if(data.status == "success"){
                            var resultData = data.data;
                            var bodyData = '';
                            var i=1;
                            $.each(resultData,function(index,row){
                                var userdiscount = (data.orderUser.user.discount / 100);
                                
                                var totalPrice =  row.orderproducts.price - (userdiscount * row.orderproducts.price).toFixed(2);
                            
                                bodyData+="<tr>"
                                bodyData+="<td>"+ i++ +"</td><td>"+row.orderproducts.name+"</td><td>£"+row.orderproducts.price+"</td><td>£"+ (row.orderproducts.price - ((userdiscount) * row.orderproducts.price)).toFixed(2) +"</td><td>"+row.quantity+"</td><td>£"+ (totalPrice * row.quantity)+"</td>"
                                ;
                                bodyData+="</tr>";
                                
                            })
                            $('.orderid').text('Order ID : '+ order_id);
                            $('#ordergrandtotal').text(grandTotal);
                            
                            $("#bodyData").html('');
                            $("#bodyData").append(bodyData);
                        }
                       
                })
                $('#viewdetail').modal('show');
                // var resultData = dataResult.data;
              
          
            });
            
            // $('.downloadOrderCsv').on('click', function () {
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });

            //     var order_id = $(this).data('orderid');
            //     var grandTotal = $(this).data('grandtotal');
            
            //     $.get('{{route("admin.getorderDetails")}}' + '/'+order_id, function (data) {
            //             console.log(data);
            //             if(data.status == "success"){
            //                 var resultData = data.data;
            //                 var bodyData = '';
            //                 var i=1;
            //                 // $.each(resultData,function(index,row){
            //                 //     var userdiscount = (data.orderUser.user.discount / 100);
            //                 //     var totalPrice =  row.orderproducts.price - (userdiscount * row.orderproducts.price).toFixed(2);
                            
            //                 //     bodyData+="<tr>"
            //                 //     bodyData+="<td>"+ i++ +"</td><td>"+row.orderproducts.name+"</td><td>£"+row.orderproducts.price+"</td><td>£"+row.orderproducts.price+"</td><td>"+row.quantity+"</td><td>£"+ (totalPrice * row.quantity)+"</td>"
            //                 //     ;
            //                 //     bodyData+="</tr>";
                                
            //                 // })
            //                 // $('.orderid').text('Order ID : '+ order_id);
            //                 // $('#ordergrandtotal').text(grandTotal);
                            
            //                 // $("#bodyData").html('');
            //                 // $("#bodyData").append(bodyData);
            //             }
                       
            //     })
            //    // $('#viewdetail').modal('show');
            //     // var resultData = dataResult.data;
              
          
            // });
        </script>
@endsection
