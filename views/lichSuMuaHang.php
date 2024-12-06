<?php include_once 'layout/header.php'; ?><!-- header -->
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Giỏ hàng</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?= BASE_URL ?>"><i class="lni lni-home"></i> Home</a></li>
                    <!-- <li><a href="index.html">Shop</a></li> -->
                    <li>Đơn hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">
            <!-- Cart List Title -->
            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Mã đơn hàng</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Ngày đặt</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Tổng tiền</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Phương thức thanh toán</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Trạng thái đơn hàng</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Thao tác</p>
                    </div>
                </div>
            </div>
            <!-- End Cart List Title -->
            <!-- Cart Single List list -->
            <?php foreach ($donHangs as $donHang): ?>
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2 col-12">
                            <h6 class="product-name"><?= $donHang['ma_don_hang'] ?></h6>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p class="product-name"><?= formatDate($donHang['ngay_dat'])?></p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p class="product-name"><?= formatPrice($donHang['tong_tien'])?> đ</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p class="product-name"><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']]?></p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p class="product-name"><?= $trangThaiDonHang[$donHang['trang_thai_id']]?></p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <a href="<?= BASE_URL?>?act=chi-tiet-mua-hang&id=<?= $donHang['id']?>" class="btn btn-info">Xem chi tiết</a>
                            <?php if($donHang['trang_thai_id'] == 1) : ?>
                                <a href="<?= BASE_URL?>?act=huy-don-hang&id=<?= $donHang['id']?>" onclick="return confirm('Xác nhận hủy')" class="btn btn-danger">Hủy đơn</a>
                            <?php endif?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <!-- End Single List list -->
        </div>
        
    </div>
</div>
<!--/ End Shopping Cart -->
<?php include_once 'layout/footer.php'; ?><!-- footer -->