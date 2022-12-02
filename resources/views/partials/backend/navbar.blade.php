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
                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for="name">STARTING ORDER #</label>
                            <input type="text" id="starting_order" name="starting_order" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="name">ENDING ORDER #</label>
                            <input type="text" id="customer_last_name" name="last_name" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label for="name">ORDERED BY</label>
                            <input type="text" id="customer_email" name="email" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="name">TITLE / FILE ID</label>
                            <input type="text" id="customer_phone" name="phone" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="name">COUNTY</label>
                            <select name="county" id="county">
                                <option value="">Select County</option>
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="name">BLOCK</label>
                            <input type="text" id="customer_last_name" name="last_name" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label for="name">LOT START</label>
                            <input type="text" id="customer_email" name="email" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="name">LOT END</label>
                            <input type="text" id="customer_phone" name="phone" class="form-control">
                        </div>


                        <div class="col-md-3">
                            <label for="name">STARTING BUILDING NUMBER</label>
                            <input type="text" id="customer_last_name" name="last_name" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label for="name"> ENDING BUILDING NUMBER</label>
                            <input type="text" id="customer_email" name="email" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="name">STREET NAME</label>
                            <input type="text" id="customer_phone" name="phone" class="form-control">
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <label for="name">STARTING SEARCH SUBMIT DATE</label>
                            <input type="date" id="customer_phone" name="phone" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="name">ENDING SEARCH SUBMIT DATE</label>
                            <input type="date" id="customer_phone" name="phone" class="form-control">
                        </div>
                    </div>

                    <br />
                    <br />

                    <div class="col-md-12" style="margin-top: 10px !important;">
                        <input type="button" id="btn_customer" class="btn btn-secondary" value="Search">
                        <input type="reset" id="btn_customer" class="btn btn-primary" value="Clear Search">
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
                <h5 class="modal-title" id="exampleModalLabel">Create Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h4> FIND ALL TITLE(S) WITH... </h4>
                <hr>
                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for="name">STARTING ORDER #</label>
                            <input type="text" id="starting_order" name="starting_order" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="name">ENDING ORDER #</label>
                            <input type="text" id="customer_last_name" name="last_name" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label for="name">ORDERED BY</label>
                            <input type="text" id="customer_email" name="email" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="name">TITLE / FILE ID</label>
                            <input type="text" id="customer_phone" name="phone" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="name">COUNTY</label>
                            <select name="county" id="county">
                                <option value="">Select County</option>
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="name">BLOCK</label>
                            <input type="text" id="customer_last_name" name="last_name" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label for="name">LOT START</label>
                            <input type="text" id="customer_email" name="email" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="name">LOT END</label>
                            <input type="text" id="customer_phone" name="phone" class="form-control">
                        </div>


                        <div class="col-md-3">
                            <label for="name">STARTING BUILDING NUMBER</label>
                            <input type="text" id="customer_last_name" name="last_name" class="form-control" required>
                        </div>

                        <div class="col-md-3">
                            <label for="name"> ENDING BUILDING NUMBER</label>
                            <input type="text" id="customer_email" name="email" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="name">STREET NAME</label>
                            <input type="text" id="customer_phone" name="phone" class="form-control">
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <label for="name">STARTING SEARCH SUBMIT DATE</label>
                            <input type="date" id="customer_phone" name="phone" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="name">ENDING SEARCH SUBMIT DATE</label>
                            <input type="date" id="customer_phone" name="phone" class="form-control">
                        </div>
                    </div>

                    <br />
                    <br />

                    <div class="col-md-12" style="margin-top: 10px !important;">
                        <input type="button" id="btn_customer" class="btn btn-secondary" value="Search">
                        <input type="reset" id="btn_customer" class="btn btn-primary" value="Clear Search">
                    </div>
                </form>
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
            <a class="nav-link  btn btn-primary"  data-toggle="modal" data-target="#orderCreateModal">Create New Order</a>
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