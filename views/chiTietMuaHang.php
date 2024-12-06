<?php include_once 'layout/header.php'; ?><!-- header -->
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Chi tiết đơn hàng</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?= BASE_URL ?>"><i class="lni lni-home"></i> Home</a></li>
                    <li>Chi tiết đơn hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact Area -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Đơn hàng chi tiết</h2>
                    </div>
                </div>
            </div>
            <div class="contact-info">
                <div class="row">
                    <?php foreach ($chiTietDonHang as $item): ?>
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="single-info-head">
                                <!-- Start Single Info -->
                                <div class="single-info">
                                    <img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="#">
                                </div>
                                <!-- End Single Info -->

                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-12 d-flex">
                            <div class="contact-form-head">
                                <div class="form-main">
                                    <form class="form" method="post" action="assets/mail/mail.php">
                                        <div class="row">
                                            <h5>Thông tin sản phẩm</h5>
                                            <hr>
                                            <div class="col-lg-12 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Tên sản phẩm</label>
                                                    <input name="name" value="<?= $item['ten_san_pham'] ?>" type="text" disabled>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Số lượng</label>
                                                    <input name="subject" value="<?= $item['so_luong'] ?>" type="text" disabled>

                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Đơn giá</label>
                                                    <input value="<?= number_format($item['don_gia']) ?> đ" disabled>

                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Thành tiền</label>
                                                    <input value="<?= number_format($item['thanh_tien']) ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="contact-form-head">
                                <div class="form-main">
                                    <form class="form" method="post" action="assets/mail/mail.php">
                                        <div class="row">
                                            <h5>Thông tin dơn hàng</h5>
                                            <hr>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Mã đơn hàng</label>
                                                    <input value="<?= $donHang['ma_don_hang'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Ngày đặt</label>
                                                    <input value="<?= $donHang['ngay_dat'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Người nhận</label>
                                                    <input value="<?= $donHang['ten_nguoi_nhan'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Địa chỉ</label>
                                                    <input value="<?= $donHang['dia_chi_nguoi_nhan'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input value="<?= $donHang['email_nguoi_nhan'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Số điện thoại</label>
                                                    <input value="<?= $donHang['sdt_nguoi_nhan'] ?>" disabled>
                                                </div>
                                            </div>


                                            <div class="col-lg-12 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Ghi chú</label>
                                                    <input value="<?= $donHang['ghi_chu'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Tổng tiền</label>
                                                    <input value="<?= number_format($donHang['tong_tien']) ?> đ" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Phương thức thanh toán</label>
                                                    <input value="<?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="">Trạng thái</label>
                                                    <input value="<?= $trangThaiDonHang[$donHang['trang_thai_id']] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Contact Area -->
<?php include_once 'layout/footer.php'; ?><!-- footer -->