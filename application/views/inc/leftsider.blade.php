<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ site_url('dashboard') }}" class="brand-link bg-primary">
        <img src="" alt="Logo" class="brand-image"
            style="opacity: .8">
        <span class="brand-text font-weight"><b>SO TrashBin</b></span>
    </a>
    <!-- Profile panel -->
    <div class="user-profile d-flex">
        <div class="profile-canvas" style="background-image: linear-gradient(135deg,rgba(45,53,61,.79) 0,rgba(45,53,61,.5) 100%),url({{ asset('cpanel/img/bg.jpg') }})"></div>
        <a href="#" class="profile-link">
            <img src="{{ asset('cpanel/img/_admin.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text profile-text font-weight-light"><b>Karyawan</b> <i class="fa fa-cog"></i></span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2 sidebar-container">
            <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item {{ @$activeMenu == 'dashboard' ? 'menu-open' : '' }}">
                    <a href="{{ site_url('dashboard') }}" class="nav-link {{ @$activeMenu == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ @$activeMenu == 'entities' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ @$activeMenu == 'entities' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Entities
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ site_url('wadah') }}" class="nav-link {{ @$activeSubMenu == 'sampah.index' ? 'active' : '' }}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Wadah</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
