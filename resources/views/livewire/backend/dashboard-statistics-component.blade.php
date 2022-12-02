<style>
    .row.activeUser .col-4 {

        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px 20px;
        box-shadow: 0px 1px 5px 0px rgb(0 0 0 / 33%);
        margin: 10px 0px;


    }

    .col-6.body .username {
        font-weight: bold;
        font-size: 16px;
        margin-bottom: 0px;
    }



    .statusfoot {
        box-shadow: unset !important;
    }

    .col-6.body .userCreatedAt {
        font-size: 14px;
        font-weight: 500;
        color: #5a6779;
    }

    .col-6.body {
        margin-top: 7px;
    }
</style>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">
            Active Users <span id="activeusers"> {{ count($users->where('status', 'Active')) }} </span>
        </h6>
    </div>


    <div class="table-responsive">

        <div class="row activeUser ">
            @forelse($users as $user)


            @if($user->status == 'Active')
            <div class="col-4">



                <div class="col-2 imghead">
                    @if($user->user_image)
                    <img class="img-profile img-profile rounded-circle" src="{{ asset('storage/images/users/' . $user->user_image) }}" alt="{{ $user->full_name }}" width="60" height="60">
                    @else
                    <img class="img-profile img-profile rounded-circle" src="{{ asset('img/avatar.png') }}" alt="{{ $user->full_name }}" width="60" height="60">
                    @endif
                </div>

                <div class="col-6 body">
                    <h3 class="username"> {{ $user->first_name }} {{ $user->last_name }} </h3>
                    <h4 class="userCreatedAt"> Created At: {{ $user->created_at }} </h4>

                </div>


                <div class="col-4 statusfoot">
                    <div class="activeInactive">
                        <label class="switch">
                            @if($user->status == 'Active')
                            <input type="checkbox" id="togBtn" checked class="update_status" data-id="{{$user->id}}">
                            @else
                            <input type="checkbox" id="togBtn" class="update_status" data-id="{{$user->id}}">
                            @endif
                            <div class="slider round"></div>
                        </label>
                    </div>
                </div>




            </div>
            @endif




            @empty

            <div class="text-center" colspan="6">No Active Users found.</div>

            @endforelse
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".update_status").change(function(e) {
            e.preventDefault();
            var status = '';
            if ($(this).is(":checked")) {
                status = 'Active';

            } else {
                status = 'Inactive';
            }
            var rowid = $(this).attr('data-id');

            $.ajax({
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "userid": rowid,
                    "status": status
                },
                url: "{{route('admin.updatestatus')}}",
                success: function(data) {
                    console.log(data.status);

                    if (data.status == 200) {
                        $('#activeusers').text(data.countusers);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        window.location.reload();
                    } else if (data.status == 201) {
                        $('#activeusers').text(data.countusers);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        window.location.reload();
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'danger',
                            title: 'Failed to update status!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }

                }
            });
        });
    });
</script>