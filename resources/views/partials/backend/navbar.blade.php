<style>
    .row .select2 {
        width: 80.75rem !important;
    }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADVANCED SEARCH</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h4> FIND ALL TITLE(S) WITH... </h4>

                <hr>
                <form method="post" action="{{route('admin.advanceSearch')}}">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <label for="name">CUSTOMER</label>
                            <select name="customer" id="customer" class="form-control">

                                <option value="">Select Customer</option>
                                <option value="Absolute Title Agency" value="{{old('customer', isset($request->customer) && $request->customer == 'Absolute Title Agency' ? $request->customer : ''  )}}">Absolute Title Agency</option>
                                <option value="Advanced Abstract" value="{{old('customer', isset($request->customer) && $request->customer == 'Advanced Abstract' ? $request->customer : ''  )}}">Advanced Abstract</option>
                                <option value="E Title Agency" value="{{old('customer', isset($request->customer) && $request->customer == 'E Title Agency' ? $request->customer : ''  )}}">E Title Agency</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <label for="name">YOUR FILE NUMBER</label>
                            <input type="text" value="{{old('file_number', isset($request->file_number) ? $request->file_number : ''  )}}" id="file_number" name="file_number" class="form-control" placeholder="Enter File Number">
                        </div>
                        <div class="col-md-3">
                            <label for="name">REQUESTED BY</label>
                            <input type="text" value="{{old('requested_by', isset($request->requested_by) ? $request->requested_by : ''  )}}" id="requested_by" name="requested_by" class="form-control" placeholder="Requested By">
                        </div>
                        <div class="col-md-2">
                            <label for="name">COUNTY</label>
                            <select name="county" id="county" class="form-control">
                                @if(isset($request->county))
                                <option value="{{old('county', isset($request->county) ? $request->county : ''  )}}" selected>{{old('county', isset($request->county) ? $request->county : ''  )}}</option>
                                @endif
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
                            <input type="text" id="block" value="{{old('block', isset($request->block) ? $request->block : ''  )}}" name="block" class="form-control" placeholder="Block">
                        </div>

                        <div class="col-md-2">
                            <label for="name">LOT</label>
                            <input type="text" id="lot" value="{{old('lot', isset($request->lot) ? $request->lot : ''  )}}" name="lot" class="form-control" placeholder="Lot">
                        </div>



                        <div class="col-md-3">
                            <label for="name">BUILDING NUMBER</label>
                            <input type="text" id="building_number" value="{{old('building_number', isset($request->building_number) ? $request->building_number : ''  )}}" name="building_number" class="form-control" placeholder="Building number">
                        </div>

                        <div class="col-md-3">
                            <label for="name">STREET NAME</label>
                            <input type="text" id="street_name" value="{{old('street_name', isset($request->street_name) ? $request->street_name : ''  )}}" name="street_name" class="form-control" placeholder="Street name">
                        </div>
                        <div class="col-md-3">
                            <label for="name">UNIT #</label>
                            <input type="text" id="unit" value="{{old('unit', isset($request->unit) ? $request->unit : ''  )}}" name="unit" class="form-control" placeholder="unit">
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">RECORD OWNERS</label>
                            <input type="text" id="record_owners" value="{{old('record_owners', isset($request->record_owners) ? $request->record_owners : ''  )}}" name="record_owners" class="form-control" placeholder="Record number">
                        </div>

                        <div class="col-md-6">
                            <label for="name">ADDITIONAL INFO</label>
                            <input type="text" id="additional_info" value="{{old('additional_info', isset($request->additional_info) ? $request->additional_info : ''  )}}" name="additional_info" class="form-control" placeholder="Additional info">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">DUE DATE</label>
                            <input type="date" id="due_date" value="{{old('due_date', isset($request->due_date) ? $request->due_date : ''  )}}" name="due_date" class="form-control">
                        </div>


                    </div>

                    <br />
                    <br />

                    <div class="col-md-12" style="margin-top: 10px !important;padding-left:0 !important;">
                        <input type="submit" id="btn_search" class="btn btn-secondary" value="Search">
                        <input type="reset" id="btn_search" class="btn btn-primary" value="Clear Search">
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>




<div class="modal fade" id="orderCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Placed Your Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-3">
                        <a href="#allSearch" data-target="#allSearch" data-toggle="modal" class="btn btn-sm btn-primary allSearch">
                            <i class="fa fa-edit"></i> View All Search
                        </a>
                    </div>
                    <div class="col-9">
                        <form method="post" action="{{route('admin.systemorder.createorder')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">


                                    <label for="searches"><b>Type Searches here... </b> </label>
                                    <select name="searches[]" id="searches" class="form-control select2" multiple="multiple">
                                        @foreach($searchdata as $searchd)
                                        <option value="{{$searchd->name}}">{{$searchd->name}}</option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">CUSTOMER</label>
                                    <select name="customer" id="customer" class="form-control">
                                        <option value="">Select Customer</option>
                                        <option value="Absolute Title Agency">Absolute Title Agency</option>
                                        <option value="Advanced Abstract">Advanced Abstract</option>
                                        <option value="E Title Agency">E Title Agency</option>
                                    </select>
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

                            <br />
                            <br />

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
</div>

<div class="modal fade" id="allSearch" tabindex="-1" role="dialog" aria-labelledby="allSearch" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="allSearch">All Searches</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col-12">
                        <form method="post" action="{{route('admin.systemorder.createorder')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">



                                    @foreach($searchdata as $searchd)

                                    <input type="checkbox" name="searchnames[]" value="{{ $searchd->id }}">{{$searchd->name}}

                                    @endforeach



                                </div>
                            </div>
                            <br />

                            <div class="col-md-12" style="margin-top: 10px !important;padding-left:0 !important;">
                                <input type="submit" id="btn_customer" class="btn btn-secondary" value="Continue">

                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item advance-search">
            <a class="nav-link  btn btn-secondary" id="exampleModal" data-toggle="modal" data-target="#exampleModal">Advanced Search</a>
        </li>


        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item new-order">
            <a class="nav-link  btn btn-primary" data-toggle="modal" data-target="#orderCreateModal">Create New Order</a>
        </li>


        <div class="topbar-divider d-none d-sm-block"></div>


        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <livewire:backend.notification-component />
        </li>

        <!-- Nav Item - Messages -->




        <!-- Supervisor link -->
        <!-- @can('access_link')
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('admin.links.index') }}">Links</a>
            </li>
        @endcan -->
        <!-- @can('access_supervisor')
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('admin.consultants.index') }}">Consultants</a>
            </li>
        @endcan -->


        @can('access_setting')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.settings.index') }}">
                <span>Settings</span></a>
        </li>
        @endcan

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @auth()
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->username }}</span>
                @endauth
                @if(auth()->user()->user_image)
                <img class="img-profile rounded-circle" src="{{ asset('storage/images/users/' . auth()->user()->user_image) }}" alt="{{ auth()->user()->full_name }}">
                @else
                <img class="img-profile rounded-circle" src="{{ asset('img/avatar.png') }}" alt="">
                @endif
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.account_setting') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>

                <div class="dropdown-divider"></div>

                @auth()
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" id="logoutsession">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                @endauth
            </div>
        </li>

    </ul>

</nav>