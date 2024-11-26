<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once './views/home.php';
    }
    public function chiTietSanPham()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamDanhMucId = $this->modelSanPham->sanPhamTheoDanhMuc($sanPham['danh_muc_id']);
        // var_dump($listSanPhamDanhMucId);die();
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
    public function formLogin()
    {
        require_once './views/auth/login.php';
        
        deleteSessionE();
    }
    public function formRegister()
    {
        require_once './views/auth/register.php';
        deleteSessionE();
    }
    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy email và password gửi lên từ form 
            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($password); die();
            // xử lý kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            if ($user == $email) { // trường hợp đăng nhập thành công
                // lưu thông tin vào session 
                $_SESSION['user-account'] = $user;
                header("Location:" . BASE_URL);
                exit();
            } else {
                // Lỗi thì lưu vào session
                $_SESSION['e'] = $user;
                // var_dump($_SESSION['e']);die();
                $_SESSION['flash'] == true;
                header("Location:" . BASE_URL . '?act=login');
                exit();
            }
        }
    }
    public function logout()
    {
        if (isset($_SESSION['user-account'])) {
            unset($_SESSION['user-account']);
            header("Location:" . BASE_URL);
        }
    }
    public function detailAccountKhachHang()
    {
        require_once './views/auth/detail-account.php';
    }
    public function listProduct()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $SanPhamDanhMucId = $this->modelSanPham->sanPhamTheo($listDanhMuc['danh_muc_id']);
        require_once './views/listSanPham.php';
    }
    public function cart(){
        require_once './views/cart.php';
    }
    public function thanhToan(){
        require_once './views/thanhToan.php';
    }
}
