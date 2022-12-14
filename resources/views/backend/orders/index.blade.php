@extends('layouts.admin')

@section('content')

@forelse($orders as $order)
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


                            @else
                            @if(!empty($order->image_url))
                            <!-- <a download href="{{  asset('/storage/titlefiles/'.$order->id.'/'.$order->image_url)  }}" class="btn btn-sm btn-danger" style="color:black;">
                                <i class="fa fa-download"></i>
                            </a> -->
                            @endif
                            @endif
                            
                            <a data-orderid="{{ $order->id }}"  class="btn btn-sm btn-danger orderDocuments">
                                <i class="fa fa-book"></i>
                            </a>
                          
                            
                        </div>

                    </td>
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
</div>
@empty
<tr>
    <td class="text-center" colspan="6">No orders found.</td>
</tr>
@endforelse

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
<script>
    $('.titleFileUploadbtn').on('click', function() {
        $('#orderid').val('');
        $('#orderid').val($(this).attr("data-orderid"));
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
                        bodyData+="<td>"+ i++ +"</td><td>"+row.image_url+"</td><td><a download href='{{asset('/storage/titlefiles')}}/"+orderid+"/"+row.image_url+"' class='btn btn-sm' style='color:black;'> <i class='fa fa-download'></i></a><a href='{{asset('/storage/titlefiles')}}/"+orderid+"/"+row.image_url+"' target='_blank' class='btn btn-sm' style='color:black;'> <i class='fa fa-eye'></i></a></td>";
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
@endsection