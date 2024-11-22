<?php include_once 'layout/header.php'; ?><!-- header -->
<?php include_once 'layout/menu.php'; ?><!-- menu -->
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                                        <div class="pro-large-img img-zoom">
                                            <img style="width: 445px; height: 445px;" src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                                        <div class="pro-nav-thumb">
                                            <img style="width: 97px; height: 97px;" src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="product-details.html"><?= $sanPham['ten_danh_muc'] ?></a>
                                    </div>
                                    <h3 class="product-name"><?= $sanPham['ten_san_pham'] ?></h3>
                                    <div class="ratings d-flex">
                                        <div class="pro-review">
                                            <?php $countComment = count($listBinhLuan); ?>
                                            <span><?= $countComment . ' bình luận' ?></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <?php
                                        if ($sanPham['gia_khuyen_mai']) { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                            <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                        <?php }
                                        ?>

                                    </div>
                                    <h5 class="offer-text"><strong>Nhanh lên</strong>! Khuyến mãi kết thúc vào:</h5>
                                    <div class="product-countdown" data-countdown="2022/12/20"></div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span><?= $sanPham['so_luong'] ?> TRONG KHO</span>
                                    </div>
                                    <p class="pro-desc"><?= $sanPham['mo_ta'] ?></p>
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="btn btn-cart2" href="#">Add to cart</a>
                                        </div>
                                    </div>

                                    <div class="useful-links">
                                        <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                                class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                                class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tab_one">Bình luận sản phẩm (<?= $countComment ?>)</a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tab" href="#tab_three">Thêm bình luận</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_one">
                                            <div class="tab-one">
                                                <?php foreach ($listBinhLuan as $binhLuan): ?>
                                                    <div class="total-reviews">
                                                        <div class="review-box">
                                                            <div class="post-author">
                                                                <p><span><?= $binhLuan['ho_ten'] ?> - </span><?= $binhLuan['ngay_dang'] ?></p>
                                                            </div>
                                                            <p><?= $binhLuan['noi_dung'] ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_three">
                                            <h5>Thêm bình luận sản phẩm</h5>
                                            <form action="#" class="review-form">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label">Bình luận <span class="text-danger">*</span></label>  
                                                        <input type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <button class="btn btn-sqr" type="submit">Continue</button>
                                                </div>
                                            </form> <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản Phẩm Liên Quan</h2>
                        <p class="sub-title">Sản phẩm liên quan cập nhật liên tục</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <?php foreach ($listSanPhamDanhMucId as $key => $sanPham): ?>
                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                        <img style="width: 263px; height: 263px;" class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh']; ?>"
                                            alt="product">
                                        <img style="width: 263px; height: 263px;" class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh']; ?>"
                                            alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <?php
                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                        $ngayHienTai = new DateTime();
                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                        if ($tinhNgay->days <= 7) { ?>
                                            <div class="product-label discount">
                                                <span>new</span>
                                            </div>
                                        <?php }
                                        ?>
                                        <?php
                                        if ($sanPham['gia_khuyen_mai']) { ?>
                                            <div class="product-label new">
                                                <span>sale</span>
                                            </div>
                                        <?php } ?>


                                    </div>
                                    <div class="button-group">
                                        <a href="wishlist.html" data-bs-toggle="tooltip"
                                            data-bs-placement="left" title="Add to wishlist"><i
                                                class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-bs-toggle="tooltip"
                                            data-bs-placement="left" title="Add to Compare"><i
                                                class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick_view"><span data-bs-toggle="tooltip"
                                                data-bs-placement="left" title="Quick View"><i
                                                    class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                            <button class="btn btn-cart">Chi Tiết</button>
                                        </a>

                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name"><a href="#">thú cưng</a>
                                        </p>
                                    </div>
                                    <h6 class="product-name">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                    </h6>
                                    <div class="price-box">
                                        <?php
                                        if ($sanPham['gia_khuyen_mai']) { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                            <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span>
                                        <?php }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
</main>

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->
<?php include_once 'layout/footer.php'; ?><!-- footer -->