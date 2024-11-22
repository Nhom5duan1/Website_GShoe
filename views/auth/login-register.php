<?php include_once './views/layout/header.php'; ?><!-- header -->
<?php include_once './views/layout/menu.php'; ?><!-- menu -->
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">login-Register</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- login register wrapper start -->
    <div class="login-register-wrapper section-padding">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
                    <div class="col-lg-6">
                        <div class="login-reg-form-wrap">
                            <h5>Đăng nhập</h5>
                            <?php if (isset($_SESSION['e'])) { ?>
                                <p class="text-danger login-box-msg"><?= $_SESSION['e'] ?></p>
                            <?php } else { ?>
                                <p class="login-box-msg">Đăng nhập tài khoản</p>
                            <?php } ?>
                            <form action="<?= BASE_URL . '?act=check-login-register' ?>" method="post">
                                <div class="single-input-item">
                                    <input type="email" name="email" placeholder="Email or Username" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="password" name="password" placeholder="Enter your Password" required />
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                            </div>
                                        </div>
                                        <a href="#" class="forget-pwd">Quên mật khẩu?</a>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button class="btn btn-sqr">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Content End -->

                    <!-- Register Content Start -->
                    <div class="col-lg-6">
                        <div class="login-reg-form-wrap sign-up-form">
                            <h5>Đăng ký</h5>
                            <form action="<?= BASE_URL . '?act=check-login-register' ?>" method="post">
                                <div class="single-input-item">
                                    <input type="text" placeholder="Full Name" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="email" placeholder="Enter your Email" required />
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input type="password" placeholder="Enter your Password" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input type="password" placeholder="Repeat your Password" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta">
                                        <div class="remember-meta">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                                <label class="custom-control-label" for="subnewsletter">Subscribe
                                                    Our Newsletter</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button class="btn btn-sqr">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Register Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- login register wrapper end -->
</main>

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->
<?php include_once './views/layout/footer.php'; ?><!-- footer -->