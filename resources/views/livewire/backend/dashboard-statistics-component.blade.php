<style>
    .row.activeUser .col-4 {

        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px 20px;
        box-shadow: 0px 1px 5px 0px rgb(0 0 0 / 33%);


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
            Active Users ({{ count($users->where('status', 'Active')) }})
        </h6>
    </div>


    <div class="table-responsive">

        <div class="row activeUser ">
            @forelse($users as $user)


            @if($user->status == 'Active')
            <div class="col-4 ">



                <div class="col-2 imghead">
                    @if($user->user_image)
                    <img class="img-profile " src="{{ asset('storage/images/users/' . $user->user_image) }}" alt="{{ $user->full_name }}" width="60" height="60">
                    @else
                    <img class="img-profile " src="{{ asset('img/avatar.png') }}" alt="{{ $user->full_name }}" width="60" height="60">
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