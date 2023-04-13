@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
            Edit Order
        </h6>
        <div class="ml-auto">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">
                <span class="icon text-white-50">
                    <i class="fa fa-home"></i>
                </span>
                <span class="text">Back to Orders</span>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.orders.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="order_id" value="{{$order->id}}" >
            <div class="row">
                <div class="col-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="Pending" {{ old('status', $order->status) == "Pending" ? 'selected' : null }}>Pending</option>
                                <option value="Delivered" {{ old('status', $order->status) == "Delivered" ? 'selected' : null }}>Delivered</option>
                            </select>
                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                </div>
                
            </div>
            

            <div class="form-group pt-4">
                <button class="btn btn-primary" type="submit" name="submit">Update</button>
            </div>
        </form>
    </div>
</div>
<script>
    //remove selected duplicate value from all select tags
    $("select option").each(function() {
        $(this).siblings('[value="' + this.value + '"]').remove();
    });
</script>
@endsection