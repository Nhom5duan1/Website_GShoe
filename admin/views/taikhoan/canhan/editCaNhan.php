<?php include './views/layout/header.php'; ?><!-- header -->
<?php include './views/layout/navbar.php'; ?><!-- navbar -->
<?php include './views/layout/sidebar.php'; ?><!-- sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tài khoản</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                        <h6>Tải ảnh lên</h6>
                        <input type="file" class="form-control">
                    </div>
                </div>
                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <h3>Thông tin tài khoản</h3>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Họ tên: </label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="Jane" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="Bishop" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Company:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="janesemail@gmail.com" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Save Changes" name="">
                            </div>
                        </div>
                    </form>
                    <h3>Đổi mật khẩu</h3>
                    <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri' ?>" method="post">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Mật khẩu cũ</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value="123456789">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Mậ khẩu cũ</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value="123456789">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nhập lại mật khẩu</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value="123456789">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- <footer></footer> -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->
</body>

</html>