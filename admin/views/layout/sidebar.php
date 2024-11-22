<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="https://png.pngtree.com/png-vector/20191031/ourmid/pngtree-inspiration-pet-shop-clinic-home-care-logo-design-modern-animal-pet-png-image_1934453.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PetPalace</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://e7.pngegg.com/pngimages/636/819/png-clipart-computer-icons-privacy-policy-admin-icon-copyright-rim.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ($_SESSION['user-admin']); ?></a>
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
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Thống kê</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN .  '?act=danh-muc' ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh mục
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN .  '?act=san-pham' ?>" class="nav-link">
                        <i class="nav-icon fas fa-dog"></i>
                        <p>
                            Sản phẩm
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Quản lý tài khoản
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài khoản quản trị</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài khoản khách hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri' ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài khoản cá nhân</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN .  '?act=don-hang' ?>" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <p>
                            Đơn hàng
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>