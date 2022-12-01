<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <label for="name">First Name*</label>
                            <input type="text" id="customer_first_name" name="first_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Last Name*</label>
                            <input type="text" id="customer_last_name" name="last_name" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="name">Email</label>
                            <input type="email" id="customer_email" name="email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="name">Phone</label>
                            <input type="tel" id="customer_phone" name="phone" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="name">Address</label>
                            <input type="text" id="customer_address" name="address" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="name">Company</label>
                            <input type="text" id="customer_company" name="company" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="name">VAT Number</label>
                            <input type="text" id="customer_vat_number" name="vat_number" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="name">Notes</label>
                            <textarea name="notes" id="customer_notes" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px !important;">

                            <input type="button" id="btn_customer" class="btn btn-primary" value="Submit">
                        </div>
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
            <a class="nav-link  btn btn-primary" href="">Create New Order</a>
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