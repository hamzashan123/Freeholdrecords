@extends('layouts.admin')

<style>
.table-responsive.childrens {
    padding-top: 0;
}
</style>
@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
 @endif

@foreach($orders as $order)

<!-- parent loop -->
    
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
            Title ID: {{ $order->title_id }}
        </h6>
        <div class="ml-auto">

        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    
                    <th>Actions</th>
                    <th>Add Order</th>
                    <!-- <th>Searches</th> -->
                    <th>Customer</th>
                    <th>File Number</th>
                    <th>Requested By</th>
                    <th>County</th>
                    <th>Block</th>
                    <th>Lot</th>
                    <th>building Number</th>
                    <th>Street Name</th>
                    <th>Unit Number</th>
                    <th>Record Owners</th>
                    <th>Additional Info</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>
                        <div class="btn-group btn-group-sm">
                            @if(Auth::user()->hasRole('admin'))
                            <a data-orderid="{{ $order->id }}" href="#titleFileUpload" data-target="#titleFileUpload" data-toggle="modal" class="btn btn-sm btn-danger titleFileUploadbtn">
                                <i class="fa fa-upload"></i>
                            </a>
                            <a  href="{!! route('admin.systemorder.delete', ['id'=>$order->id]) !!}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-danger" style="color:black;">
                                <i class="fa fa-trash"></i>
                            </a>
                            @endif
                            
                            <a data-orderid="{{ $order->id }}"  class="btn btn-sm btn-danger orderDocuments">
                                <i class="fa fa-book"></i>
                            </a>
                            
                          
                            
                        </div>

                    </td>
                    <td><a data-orderid="{{ $order->id }}" data-titleid="{{$order->title_id}}" data-toggle="modal" data-target="#subOrderCreateModal" class="btn btn-sm btn-primary subOrderCreateModal">
                                <i class="fa fa-plus"></i>
                            </a></td>
                    @php 
                    $searches = json_decode($order->searches,true);
                    if(!empty($searches)){
                        $count = count($searches);
                    }
                    
                    @endphp
                    
                    <!-- <td>
                    @if(!empty($searches))
                        @for($i = 0; $i < $count; $i++)
                         <span class="badge badge-danger">{{ $searches[$i] }}</span>
                         <br>
                         @endfor
                    @endif
                    </td> -->
                    
                    <td>{{ $order->customer }}</td>
                    <td>{{ $order->file_number }}</td>
                    <td>{{ $order->requested_by }}</td>
                    <td>{{ $order->county }}</td>
                    <td>{{ $order->block }}</td>
                    <td>{{ $order->lot }}</td>
                    <td>{{ $order->building_number }}</td>
                    <td>{{ $order->street_name }}</td>
                    <td>{{ $order->unit_number }}</td>
                    <td>{{ $order->record_owners }}</td>
                    <td>{{ $order->additional_info }}</td>
                    <td>{{ $order->due_date }}</td>

                </tr>

            </tbody>

        </table>
    </div>
   @if(count($order->children) > 0)
   
   <div class="table-responsive childrens">
   <p style="text-align: center;font-size:20px; font-weight:600;">Sub Orders</p>
        <table class="table table-hover">
        <thead>
                <tr style="visibility:collapse">
                    
                    <th>Actions</th>
                    <th>Add Order</th>
                    <!-- <th>Searches</th> -->
                    <th>Customer</th>
                    <th>File Number</th>
                    <th>Requested By</th>
                    <th>County</th>
                    <th>Block</th>
                    <th>Lot</th>
                    <th>building Number</th>
                    <th>Street Name</th>
                    <th>Unit Number</th>
                    <th>Record Owners</th>
                    <th>Additional Info</th>
                    <th>Due Date</th>
                </tr>
            </thead>   
        <tbody>
     <!-- child loop -->
     @foreach($order->children as $child)
    
<tr>
    <td>
        <div class="btn-group btn-group-sm">
            @if(Auth::user()->hasRole('admin'))
            <a data-orderid="{{ $child->id }}" href="#titleFileUpload" data-target="#titleFileUpload" data-toggle="modal" class="btn btn-sm btn-danger titleFileUploadbtn">
                <i class="fa fa-upload"></i>
            </a>
            <a  href="{!! route('admin.systemorder.delete', ['id'=>$child->id]) !!}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-danger" style="color:black;">
                <i class="fa fa-trash"></i>
            </a>
            @endif
            
            <a data-orderid="{{ $child->id }}"  class="btn btn-sm btn-danger orderDocuments">
                <i class="fa fa-book"></i>
            </a>
            
          
            
        </div>

    </td>
    <td ><a style="visibility: collapse;" data-orderid="{{ $order->id }}" data-titleid="{{$order->title_id}}" data-toggle="modal" data-target="#subOrderCreateModal" class="btn btn-sm btn-primary subOrderCreateModal">
                                <i class="fa fa-plus"></i>
                            </a></td>
    @php 
    $searches = json_decode($child->searches,true);
    if(!empty($searches)){
        $count = count($searches);
    }
    
    @endphp
    
    <!-- <td>
    @if(!empty($searches))
        @for($i = 0; $i < $count; $i++)
         <span class="badge badge-danger">{{ $searches[$i] }}</span>
         <br>
         @endfor
    @endif
    </td> -->
    
    <td>{{ $child->customer }}</td>
    <td>{{ $child->file_number }}</td>
    <td>{{ $child->requested_by }}</td>
    <td>{{ $child->county }}</td>
    <td>{{ $child->block }}</td>
    <td>{{ $child->lot }}</td>
    <td>{{ $child->building_number }}</td>
    <td>{{ $child->street_name }}</td>
    <td>{{ $child->unit_number }}</td>
    <td>{{ $child->record_owners }}</td>
    <td>{{ $child->additional_info }}</td>
    <td>{{ $child->due_date }}</td>

</tr>
     @endforeach
     </tbody>
        </table>
    </div>
   @endif
    
</div>
  

@endforeach




<tr>
    <td class="text-center" colspan="6">No orders found.</td>
</tr>

<div class="modal fade" id="titleFileUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post" action="{{route('admin.titlefileupload')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="titlefile">File</label>
                            <input type="hidden" name="orderid" id="orderid" value="">
                            <input type="file" id="titlefile" name="titlefile" placeholder="STARTING ORDER #">
                        </div>


                    </div>
                    <div class="col-md-12" style="margin-top: 10px !important; padding-left:0px !important;">
                        <input type="submit" class="btn btn-secondary" value="Upload">

                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<div class="modal fade" id="orderDocuments" tabindex="-1" role="dialog" aria-labelledby="orderDocuments" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderDocuments">All Files</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post" action="{{route('admin.titlefileupload')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        
                    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody id="bodyData">
                            <!-- dynamic data comes here with api -->
                        </tbody>
           

        </table>
    </div>

                    </div>
                  
                </form>
            </div>


        </div>
    </div>
</div>

<div class="modal fade" id="subOrderCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subOrderCreateModal">Placed Your Order Into Existing Order <b id="titleid"> FRH-61488 </b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
                <div class="row">


                    <form method="post" action="{{route('admin.systemorder.createorder')}}">
                        <input type="hidden" name="parent_id" id="parent_id" value="" > 
                        @csrf
                        
                        <div class="row">
                            <div class="col-12">


                                <label for="searches"><b>Type Searches here... </b> </label>
                                <select name="searchesnew[]" id="searchesnew" class="form-control select2" multiple="multiple">
                                    @foreach($searchdata as $searchd)

                                    <option value="{{$searchd->name}}">{{$searchd->name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">CUSTOMER</label>
                                @if(Auth::user()->hasRole('admin'))
                                <select name="customer" id="customer" class="form-control">

                                    <option value="">Select Customer</option>
                                    @if(!empty($alluserslist))
                                    @foreach($alluserslist as $user)
                                    <option value="{{$user->username}}">{{$user->username}}</option>
                                    @endforeach
                                    
                                    @endif
                                </select>
                                @else
                            <input type="text" name="customer" id="customer" value="{{ucfirst(Auth::user()->username)}}" disabled class="form-control" >
                            @endif
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-3">
                                <label for="name">YOUR FILE NUMBER</label>
                                <input type="text" value="{{ old('file_number') }}" id="file_number" name="file_number" class="form-control" required placeholder="Enter File Number">
                            </div>
                            <div class="col-md-3">
                                <label for="name">REQUESTED BY</label>
                                <input type="text" id="requested_by" name="requested_by" class="form-control" required placeholder="Requested By">
                            </div>
                            <div class="col-md-2">
                                <label for="name">COUNTY</label>
                                <select name="county" id="county" class="form-control">
                                    <option value="">Select County</option>
                                    <option value="MANHATTAN">MANHATTAN</option>
                                    <option value="BRONX">BRONX</option>
                                    <option value="KINGS">KINGS</option>
                                    <option value="QUEENS">QUEENS</option>
                                    <option value="RICHMOND">RICHMOND</option>
                                    <option value="NASSAU">NASSAU</option>
                                    <option value="SUFFOLK">SUFFOLK</option>
                                    <option value="WESTCHESTER">WESTCHESTER</option>
                                    <option value="PUTNAM">PUTNAM</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="name">BLOCK</label>
                                <input type="text" id="block" name="block" class="form-control" placeholder="Block">
                            </div>

                            <div class="col-md-2">
                                <label for="name">LOT</label>
                                <input type="text" id="lot" name="lot" class="form-control" placeholder="Lot">
                            </div>



                            <div class="col-md-3">
                                <label for="name">BUILDING NUMBER</label>
                                <input type="text" id="building_number" name="building_number" class="form-control" placeholder="Building number">
                            </div>

                            <div class="col-md-3">
                                <label for="name">STREET NAME</label>
                                <input type="text" id="street_name" name="street_name" class="form-control" placeholder="Street name">
                            </div>
                            <div class="col-md-3">
                                <label for="name">UNIT #</label>
                                <input type="text" id="unit" name="unit" class="form-control" placeholder="unit">
                            </div>



                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">RECORD OWNERS</label>
                                <input type="text" id="record_owners" name="record_owners" class="form-control" placeholder="Record number">
                            </div>

                            <div class="col-md-6">
                                <label for="name">ADDITIONAL INFO</label>
                                <input type="text" id="additional_info" name="additional_info" class="form-control" placeholder="Additional info">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">DUE DATE</label>
                                <input type="date" id="due_date" name="due_date" class="form-control">
                            </div>


                        </div>



                        <div class="col-md-12" style="margin-top: 10px !important;padding-left:0 !important;">
                            <input type="submit" id="btn_customer" class="btn btn-secondary" value="Order">
                            <input type="reset" id="btn_customer" class="btn btn-primary" value="Clear Order">
                        </div>
                    </form>

                </div>

            </div>


        </div>
    </div>
</div>
<script>
    $('.titleFileUploadbtn').on('click', function() {
        $('#orderid').val('');
        $('#orderid').val($(this).attr("data-orderid"));
    })
    $('.subOrderCreateModal').on('click', function() {
        $('#titleid').text('');
        $('#titleid').text($(this).attr("data-titleid"));

        $('#parent_id').val('');
        $('#parent_id').val($(this).attr("data-orderid"));
    })
    
    
    $('.orderDocuments').on('click', function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var orderid  = $(this).data('orderid');
            console.log(orderid);
                $.get('{{route("admin.documentslist")}}' + '/'+orderid, function (data) {
                    console.log(data);
                    var resultData = data;
                    var bodyData = '';
                    var i=1;
                    $.each(resultData,function(index,row){
                        
                        
                            bodyData+="<tr>"
                            bodyData+="<td>"+ i++ +"</td><td>"+row.image_url+"</td><td><a download href='{{asset('/storage/titlefiles')}}/"+orderid+"/"+row.image_url+"' class='btn btn-sm' style='color:black;'> <i class='fa fa-download'></i></a><a href='{{asset('/storage/titlefiles')}}/"+orderid+"/"+row.image_url+"' target='_blank' class='btn btn-sm' style='color:black;'> <i class='fa fa-eye'></i></a><a href='{{route('admin.systemorder.deleteOrderDocument')}}/"+row.id+"' onclick='return confirm('Are you sure you want to delete?')' class='btn btn-sm' style='color:black;'> <i class='fa fa-trash'></i></a></td>";
                            bodyData+="</tr>";
                        
                       
                        
                    })

                    console.log(bodyData);
                    // $('.projectid').text('Project Unique ID : '+ data.name);
                    $("#bodyData").html('');
                    $("#bodyData").append(bodyData);
                    
                    $('#orderDocuments').modal('show');
                    
              
          
        });
    });
</script>
<script>
    $('.alert-success').fadeIn().delay(5000).fadeOut();
  </script>
@endsection