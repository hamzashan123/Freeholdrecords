<style>
    .row .select2 {
        width: 80.75rem !important;
    }
</style>


<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

     
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


        <!-- @can('access_setting')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.settings.index') }}">
                <span>Settings</span></a>
        </li>
        @endcan -->

        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @auth()
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ ucfirst(auth()->user()->username) }}</span>
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