<?php include_once 'layout/header.php'; ?><!-- header -->
<?php include_once 'layout/menu.php'; ?><!-- menu -->
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Danh sách sản phẩm</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="<?= BASE_URL ?>"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li>Danh sách sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Product Grids -->
<section class="product-grids section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <!-- Start Product Sidebar -->
                <div class="product-sidebar">
                    <!-- Start Single Widget -->
                    <div class="single-widget search">
                        <h3>Tìm kiếm sản phẩm</h3>
                        <form action="#">
                            <input type="text" placeholder="Tìm kiếm sản phẩm....">
                            <button type="submit"><i class="lni lni-search-alt"></i></button>
                        </form>
                    </div>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <div class="single-widget">
                        <h3></h3>
                        <ul class="list">
                            <li>
                                <a href="#"> </a><span></span>
                            </li>
                            <li>
                                <a href="#"></a><span></span>
                            </li>
                            <li>
                                <a href="#"></a><span></span>
                            </li>
                            <li>
                                <a href="#"></a><span></span>
                            </li>
                            <li>
                                <a href="#"></a><span></span>
                            </li>
                            <li>
                                <a href="#"></a><span></span>
                            </li>
                            <li>
                                <a href="#"></a><span></span>
                            </li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                    <!-- Start Single Widget -->
                    <div class="single-widget range">
                        <h3></h3>
                        <!-- <input type="range" class="form-range" name="range" step="1" min="100" max="10000"
                            value="10" onchange="rangePrimary.value=value"> -->
                        <div class="range-inner">
                            <label></label>
                            <!-- <input type="text" id="rangePrimary" placeholder="100" /> -->
                        </div>
                    </div>
                    <!-- End Single Widget -->


                </div>
                <!-- End Product Sidebar -->
            </div>
            <div class="col-lg-9 col-12">
                <div class="product-grids-head">
                    <div class="product-grid-topbar">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-8 col-12">
                                <div class="product-sorting">
                                    <label for="sorting"></label>

                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4 col-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-grid" type="button" role="tab"
                                            aria-controls="nav-grid" aria-selected="true"><i
                                                class="lni lni-grid-alt"></i></button>
                                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-list" type="button" role="tab"
                                            aria-controls="nav-list" aria-selected="false"><i
                                                class="lni lni-list"></i></button>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                            aria-labelledby="nav-grid-tab">
                            <div class="row">
                                <?php foreach ($listSanPham as $key => $sanPham): ?>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <!-- Start Single Product -->
                                        <div class="single-product">
                                            <div class="product-image">
                                                <img src="<?= BASE_URL . $sanPham['hinh_anh']; ?>" style="width: 288px; height: 286px;" alt="#">
                                                <div class="button">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>" class="btn"><i
                                                            class="lni lni-cart"></i>Chi tiết</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <span class="category"><?= $sanPham['ten_danh_muc'] ?></span>
                                                <h4 class="title">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                                </h4>
                                                <ul class="review">
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star"></i></li>
                                                    <li><span>4.0 Review(s)</span></li>
                                                </ul>
                                                <div class="price">
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <p><?= formatPrice($sanPham['gia_san_pham']) . ' đ' ?></p>
                                                        <span><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                                    <?php } else { ?>
                                                        <span><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Pagination -->
                                    <div class="pagination left">
                                        <ul class="pagination-list">
                                            <li class="active"><a href="javascript:void(0)">1</a></li>
                                            
                                        </ul>
                                    </div>
                                    <!--/ End Pagination -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <!-- Start Single Product -->
                                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                                        <div class="single-product">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="product-image">
                                                        <img style="width: 288px; height: 286px; " src="<?= BASE_URL . $sanPham['hinh_anh']; ?>" alt="#">
                                                        <div class="button">
                                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>" class="btn"><i
                                                                    class="lni lni-cart"></i> Chi tiết</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-12">
                                                    <div class="product-info">
                                                        <span class="category"><?= $sanPham['ten_danh_muc'] ?></span>
                                                        <h4 class="title">
                                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                                        </h4>
                                                        <ul class="review">
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star"></i></li>
                                                            <li><span>4.0 Review(s)</span></li>
                                                        </ul>
                                                        <div class="price">
                                                            <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                                <p><?= formatPrice($sanPham['gia_san_pham']) . ' đ' ?></p>
                                                                <span><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                                            <?php } else { ?>
                                                                <span><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    <!-- End Single Product -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Pagination -->
                                    <div class="pagination left">
                                        <ul class="pagination-list">
                                            <li class="active"><a href="javascript:void(0)">1</a></li>
                                        </ul>
                                    </div>
                                    <!--/ End Pagination -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Grids -->
<?php include_once 'layout/footer.php'; ?><!-- footer -->