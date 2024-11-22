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
                    <h1>Chỉnh sửa đơn hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Sửa đơn hàng</h4>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-danh-muc' ?>" method="POST">
                            <input type="text" name="id" value="<?= $donHang['id']?>" hidden>
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" class="form-control form-control-border" name="ten_danh_muc"
                                        placeholder="Nhập tên danh mục" value="<?= $donHang['ten_san_pham']?>">
                                    <?php if (isset($e['ten_san_pham'])) { ?>
                                        <p class="text-danger"><?= $e['ten_san_pham'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="form-control form-control-border border-width-2"
                                        name="mo_ta" placeholder="Nhập mô tả danh mục"><?= $donHang['mo_ta']?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
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