<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15"></div>
        <div class="sidebar-brand-text mx-3">

            <h1> FREEHOLD RECORDS LLC </h1>
            <!-- <img src="/logo.png" style="height:100px;"> -->

        </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Interface
    </div> -->
    <!-- Nav Item - Pages Collapse Menu -->

    @if(Auth::user()->hasRole('admin'))
    <li class="nav-item active ">
        <a class="nav-link" href="{{route('admin.users.index')}}">
            <i class="fas fa-users fa-2x text-gray-300"></i>
            <span>Users </span></a>
    </li>
    @endif

    <hr class="sidebar-divider">

    <li class="nav-item active ">
        <a class="nav-link" href="{{route('admin.account_setting')}}">
            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
            <span>Profile </span></a>
    </li>


    @if(Auth::user()->hasRole('admin'))
    <!-- <li class="nav-item active ">
                <a class="nav-link" href="{{route('admin.form360.index')}}">
                <i class="fas fa-clock fa-2x text-gray-300"></i>
                    <span>Draft Applications</span></a>
    </li> -->
    @endif
    @if(Auth::user()->hasRole('admin'))
    <!-- <li class="nav-item active ">
                <a class="nav-link" href="{{route('admin.form360.index')}}">
                <i class="fas fa-check fa-2x text-gray-300"></i>
                    <span>Submitted Applications</span></a>
    </li> -->
    @endif
    @forelse($admin_side_menu as $link)
    @can($link->permission_title)
    <!-- <li class="nav-item active ">
                <a class="nav-link" href="{{ route($link->to) }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ $link->title }}</span></a>
            </li> -->
    <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse{{ $link->as }}"
                   aria-expanded="true" aria-controls="collapse{{ $link->as }}">
                    <i class="{{ $link->icon }}"></i>
                    <span>{{ $link->title }}</span>
                </a>
                <div id="collapse{{ $link->as }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        @if(in_array($link->to, $routes_name))
                            <a class="collapse-item" href="{{ route($link->to) }}">
                                {{ $link->title }}
                            </a>
                        @endif
                    </div>
                </div>
            </li> -->
    @endcan
    @empty
    @endforelse





    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading"></div>
    <!-- Sidebar Toggler (Sidebar) -->
    <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> -->
</ul>