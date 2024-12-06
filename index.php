<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';
// Route
$act = $_GET['act'] ?? '/';
match ($act) {
    // Trang chủ
    '/' => (new HomeController())->home(),
    
    // auth
    'login' => (new HomeController())->formLogin(),
    'register' => (new HomeController())->formRegister(),
    'check-login' =>(new HomeController())->postLogin(),
    'logout' =>(new HomeController())->logout(),
    'detail-account-khach-hang' => (new HomeController())->detailAccountKhachHang(),
    'update-taikhoan' => (new HomeController())->updateAccountKhachHang(),

    // Sản phẩm
    'list-product' => (new HomeController())->listProduct(),
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),

    // Giỏ hàng
    'gio-hang' => (new HomeController())->cart(),
    'them-gio-hang' => (new HomeController())->addGiohang(),

    // Thanh toán
    'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' => (new HomeController())->postThanhToan(),

    'lich-su-mua-hang' => (new HomeController())->lichSuMuaHang(),
    'chi-tiet-mua-hang' => (new HomeController())->chiTietMuaHang(),
    'huy-don-hang' => (new HomeController())->huyDonHang(),
};