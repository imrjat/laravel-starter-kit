<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin/home') }}" class="brand-link">
        <img src="{{ asset(App\Helpers\GeneralHelpers::get_from_setting('logo')) }}" alt="{{ App\Helpers\GeneralHelpers::get_from_setting('app_name') }}"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{App\Helpers\GeneralHelpers:: get_from_setting('app_name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user3-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" #" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item {{ request()->is('home') == 'home' ? 'menu-open' : null }}">
                    <a href="{{ url('/admin/home') }}"
                        class="nav-link {{ request()->is('home') == 'home' ? 'active' : null }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <span class="badge badge-info right">2</span> --}}
                        </p>
                    </a>
                </li>


                @canany(['user-viewAny', 'role-viewAny', 'permission-viewAny' . 'setting-viewAny'])

                    <li class="nav-header">System Section</li>
                    <li
                        class="nav-item {{ request()->is('admin/settings*') || request()->is('admin/users*') || request()->is('admin/roles*') || request()->is('admin/permissions*') ? 'menu-open' : '' }} ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                System Setting
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            @can('user-viewAny')
                                <li class="nav-item">
                                    <a href="{{ url('admin/users') }}"
                                        class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                                        <i class="fas fa-user-cog nav-icon"></i>
                                        <p>Users {{-- <span class="badge badge-info right">2</span> --}}</p>
                                    </a>
                                </li>
                            @endcan

                            @can('role-viewAny')
                                <li class="nav-item">
                                    <a href="{{ url('admin/roles') }}"
                                        class="nav-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                                        <i class="fas fa-user-edit nav-icon"></i>
                                        <p>Roles {{-- <span class="badge badge-info right">2</span> --}}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('permission-viewAny')
                                <li class="nav-item">
                                    <a href="{{ url('admin/permissions') }}"
                                        class="nav-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                                        <i class="fas fa-user-check nav-icon"></i>
                                        <p>Permissions {{-- <span class="badge badge-info right">2</span> --}}</p>
                                    </a>
                                </li>
                            @endcan

                            @can('setting-viewAny')
                                <li class="nav-item">
                                    <a href="{{ url('admin/settings') }}"
                                        class="nav-link {{ request()->is('admin/settings*') ? 'active' : '' }}">
                                        <i class="fas fa-sliders-h  nav-icon"></i>
                                        <p>General Setting {{-- <span class="badge badge-info right">2</span> --}}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany


                {{-- <li class="nav-item">
                    <a href="" #" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
