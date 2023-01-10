@extends('layouts.admin')

@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <div class="first">
            <h6 class="m-0 font-weight-bold text-primary">
                Add New Type Searches
            </h6>
        </div>
        <div class="second">
            <a href="#searchUpload" data-target="#searchUpload" data-toggle="modal" class="btn btn-sm btn-primary searchUpload">
                <i class="fa fa-plus"></i> Add Search
            </a>
        </div>

        <div class="ml-auto">

        </div>
    </div>



    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Search Name</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($searches as $search)
                <tr>

                    <td>{{ $search->id }}</td>
                    <td>{{ $search->name }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            @if(Auth::user()->hasRole('admin'))
                            <a data-searchid="{{ $search->id }}" data-searchname="{{ $search->name}}" href="#searchEdit" data-target="#searchEdit" data-toggle="modal" class="btn btn-sm btn-primary searchEdit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{route('admin.searches.delete',['id' => $search->id])}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-trash"></i>
                            </a>

                            @endif


                        </div>

                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>




<div class="modal fade" id="searchEdit" tabindex="-1" role="dialog" aria-labelledby="searchEdit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchEdit">Update Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post" action="{{route('admin.searches.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="titlefile">Name</label>
                            <input type="hidden" name="searchid" id="searchid" value="">
                            <input type="text" id="searchnameupdate" class="form-control" name="searchnameupdate" placeholder="">
                        </div>


                    </div>
                    <div class="col-md-12" style="margin-top: 10px !important; padding-left:0px !important;">
                        <input type="submit" class="btn btn-secondary" value="Update">

                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

<div class="modal fade" id="searchUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchUpload">Add Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post" action="{{route('admin.searches.create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="titlefile">Search Name</label>

                            <input type="input" id="searchname" name="searchname" class="form-control" placeholder="Add New Search Type...">
                        </div>


                    </div>
                    <div class="col-md-12" style="margin-top: 10px !important; padding-left:0px !important;">
                        <input type="submit" class="btn btn-secondary" value="Add">

                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
<script>
    $('.searchUpload').on('click', function() {

    })
</script>

<script>
    $('.searchEdit').on('click', function() {
        $('#searchid').val('');
        // alert($(this).val());
        $('#searchnameupdate').val($(this).attr('data-searchname'));
        $('#searchid').val($(this).attr("data-searchid"));
    })
</script>
@endsection