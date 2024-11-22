<?php
class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
    }

    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';
        deleteSessionE();
    }

    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $e = [];

            if (empty($ho_ten)) {
                $e['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $e['email'] = 'Email không được để trống';
            }
            $_SESSION['e'] = $e;

            if (empty($e)) {
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                $chuc_vu_id = 1;
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }
    public function formEditQuanTri()
    {
        $id_quan_tri = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
        // var_dump($quanTri); die();
        require_once './views/taikhoan/quantri/editQuanTri.php';
        deleteSessionE();
    }
    public function postEditQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $quan_tri_id = $_POST['quan_tri_id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $e = [];
            if (empty($ho_ten)) {
                $e['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $e['email'] = 'Email không được để trống';
            }
            if (empty($trang_thai)) {
                $e['trang_thai'] = 'Vui lòng chọn trạng thái';
            }

            $_SESSION['e'] = $e;
            // var_dump($_SESSION); die();
            if (empty($e)) {
                $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai);
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
                exit();
            }
        }
    }
    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }
    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        // var_dump($quanTri); die();
        require_once './views/taikhoan/khachhang/editKhachHang.php';
        deleteSessionE();
    }
    public function postEditKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $khach_hang_id = $_POST['khach_hang_id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $e = [];
            if (empty($ho_ten)) {
                $e['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $e['email'] = 'Email không được để trống';
            }
            if (empty($ngay_sinh)) {
                $e['ngay_sinh'] = 'Ngày sinh không được để trống';
            }
            if (empty($gioi_tinh)) {
                $e['gioi_tinh'] = 'Giói tính không được để trống';
            }
            if (empty($trang_thai)) {
                $e['trang_thai'] = 'Vui lòng chọn trạng thái';
            }

            $_SESSION['e'] = $e;
            if (empty($e)) {
                $this->modelTaiKhoan->updateKhachHang($khach_hang_id, $ho_ten, $email, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai);
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }
    public function detailKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }
    public function formLogin(){
        require_once './views/auth/formLogin.php';
        deleteSessionE();
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Lấy email và password gửi lên từ form 
            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($password); die();
            // xử lý kiểm tra thông tinn đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            if($user == $email){ // trường hợp đăng nhập thành công
                // lưu thông tin vào session 
                $_SESSION['user-admin'] = $user;
                header("Location:" . BASE_URL_ADMIN);
                exit();
            }else{
                // Lỗi thì lưu vào session
                $_SESSION['e'] = $user;
                // var_dump($_SESSION['e']);die();
                $_SESSION['flash'] == true;
                header("Location:". BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }
    public function logout(){
        if(isset($_SESSION['user-admin'])){
            unset($_SESSION['user-admin']);
            header("Location:" . BASE_URL_ADMIN .'?act=login-admin');
        }
    }
    public function formEditCaNhanQuanTri(){
        require_once './views/taikhoan/canhan/editCaNhan.php';
        deleteSessionE();
    }
    public function postEditCaNhanQuanTri(){

    }
    public function postEditMatKhauCaNhan(){
        
    }
}
