<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #282a32">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('User_admin') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-gamepad"></i>
                </div>
                <div class="sidebar-brand-text mx-3">RENTAL</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                DATABASE
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('User_admin') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Product_admin') ?>">
                    <i class="fas fa-fw fa-gamepad"></i>
                    <span>Products</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                ORDERS
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Order_admin') ?>">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Orders</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" style="background: #1b1b22;" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav style="background: #282a32" class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hello <?= $name ?>!</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href=<?= base_url('auth/logout') ?>><i class="fas fa-sign-out-alt mr-2 text-gray-400"></i></a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->