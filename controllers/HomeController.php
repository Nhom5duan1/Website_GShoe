<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        if (isset($_SESSION['user-account'])) {
            $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']);

            $gioHang = $this->modelGioHang->getGioHangFormUser($email['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGiohang($email['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
        } else {
            require_once './views/home.php';
        }
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
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if (is_array($user) && isset($user['email'])) { // Nếu đăng nhập thành công, trả về mảng user
                // Lưu thông tin vào session
                $_SESSION['user-account'] = $user['email'];
                $_SESSION['user-role'] = $user['chuc_vu_id']; // Lưu chuc_vu_id
                header("Location:" . BASE_URL);
                exit();
            } else {
                // Lỗi thì lưu vào session
                $_SESSION['e'] = $user;
                $_SESSION['flash'] = true;
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
        $email = $_SESSION['user-account'];
        $detailAccount = $this->modelTaiKhoan->getTaiKhoanFormEmail($email);
        require_once './views/auth/detail-account.php';
        deleteSessionE();
    }
    public function updateAccountKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_SESSION['user-account'];

            // Lấy dữ liệu từ form
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];

            $old_pass = $_POST['old_pass'] ?? null;
            $new_pass = $_POST['new_pass'] ?? null;

            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($id);

            $e = [];
            $checkPass = false;

            // Kiểm tra mật khẩu nếu được nhập
            if ($old_pass) {
                if (password_verify($old_pass, $user['mat_khau']) || $old_pass === $user['mat_khau']) {
                    $checkPass = true;
                } else {
                    $e['old_pass'] = 'Mật khẩu cũ không đúng';
                }
            }

            // Xử lý lỗi nhập liệu
            if (empty($ho_ten)) $e['ho_ten'] = 'Tên tài khoản không được để trống';
            if (empty($email)) $e['email'] = 'Email không được để trống';
            if (empty($so_dien_thoai)) $e['so_dien_thoai'] = 'Số điện thoại không được để trống';
            if (empty($dia_chi)) $e['dia_chi'] = 'Địa chỉ không được để trống';
            if (empty($ngay_sinh)) $e['ngay_sinh'] = 'Ngày sinh không được để trống';

            // Nếu không có lỗi
            if (empty($e)) {
                // Nếu có mật khẩu mới, hash và cập nhật
                if ($checkPass && $new_pass) {
                    $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                    $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
                }

                // Cập nhật các thông tin khác
                $data = [
                    'ho_ten' => $ho_ten,
                    'email' => $email,
                    'so_dien_thoai' => $so_dien_thoai,
                    'dia_chi' => $dia_chi,
                    'ngay_sinh' => $ngay_sinh,
                    'gioi_tinh' => $gioi_tinh,
                ];
                $status = $this->modelTaiKhoan->updateAccount($user['id'], $data);

                if ($status) {
                    $_SESSION['success'] = "Cập nhật thông tin thành công";
                    header("Location:" . BASE_URL);
                    exit();
                }
            } else {
                $_SESSION['error'] = $e;
                header("Location:" . BASE_URL . '?act=detail-account-khach-hang');
                exit();
            }
        }
    }

    public function listProduct()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $SanPhamDanhMucId = $this->modelSanPham->sanPhamTheo($listDanhMuc['danh_muc_id']);
        require_once './views/listSanPham.php';
    }
    public function cart()
    {
        if (isset($_SESSION['user-account'])) {
            $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']);

            $gioHang = $this->modelGioHang->getGioHangFormUser($email['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGiohang($email['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang);die;
            require_once './views/cart.php';
        } else {
            var_dump('Loi chua dang nhap');
            die;
        }
        require_once './views/cart.php';
    }
    public function thanhToan()
    {
        if (isset($_SESSION['user-account'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']);

            $gioHang = $this->modelGioHang->getGioHangFormUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGiohang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang);die;
            require_once './views/thanhToan.php';
        } else {
            var_dump('Loi chua dang nhap');
            die;
        }
    }
    public function addGiohang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user-account'])) {
                $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']);

                $gioHang = $this->modelGioHang->getGioHangFormUser($email['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGiohang($email['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }
                // var_dump($chiTietGioHang);die;
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong); // Fixed here
                }
                // var_dump('thanh cong');
                header("Location:" . BASE_URL . '?act=gio-hang');
                die;
            } else {
                var_dump('Loi chua dang nhap');
                die;
            }
        }
    }
    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
            $tong_tien = $_POST['tong_tien'];

            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;

            $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']);
            $tai_khoan_id = $email['id'];

            $ma_don_hang = 'DH-' . rand(1000, 9999);

            $donHang = $this->modelDonHang->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );
            $gioHang = $this->modelGioHang->getGioHangFormUser($tai_khoan_id);
            if ($donHang) {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];
                    $this->modelDonHang->addChiTietDonHang(
                        $donHang,
                        $item['san_pham_id'],
                        $donGia,
                        $item['so_luong'],
                        $donGia * $item['so_luong']
                    );
                }
                // Xóa sản phẩm trong chi tiet giỏ hàng
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);
                // Xóa thông tin giỏ hàng người dùng
                $this->modelGioHang->clearGioHang($tai_khoan_id);
                // Chuyen huong ve trang lich su mua hang
                // header("Location:" .BASE_URL . '?act=lich-su-mua-hang');
                // exit;
            } else {
                var_dump('Error');
                die;
            }
        }
    }
    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user-account'])) {
            $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']);

            $gioHang = $this->modelGioHang->getGioHangFormUser($email['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGiohang($email['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
        } else {
            var_dump('Loi chua dang nhap');
            die;
        }
        if (isset($_SESSION['user-account'])) {
            $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']); // thong tin tai khoan dang nhap
            $tai_khoan_id = $email['id'];

            // lay ra dang sach trang thai don hang
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            // lay ra dang sach phuong thuc thanh toan
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
            // var_dump($phuongThucThanhToan);die;
            // lay ra danh sach tat ca don hang cua tai khoan
            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            require_once './views/lichSuMuaHang.php';
        } else {
            var_dump('Loi');
            die;
        }
    }
    public function chiTietMuaHang()
    {
        if (isset($_SESSION['user-account'])) {
            $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']);

            $gioHang = $this->modelGioHang->getGioHangFormUser($email['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGiohang($email['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
        } else {
            var_dump('Loi chua dang nhap');
            die;
        }
        if (isset($_SESSION['user-account'])) {
            $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']); // thong tin tai khoan dang nhap
            $tai_khoan_id = $email['id'];

            // lay id don hang chuyen từ url 
            $don_hang_id = $_GET['id'];

            // lay ra dang sach trang thai don hang
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            // lay ra dang sach phuong thuc thanh toan
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // lay ra thogn tin don hang theo id

            $donHang = $this->modelDonHang->getDonHangById($don_hang_id);

            // lay thong tin san pham cua don hang hang trong bang chi tiet don hang
            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($don_hang_id);
            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Không có quyền truy cập đơn hàng này!";
                exit;
            }
            require_once './views/chiTietMuaHang.php';
        } else {
            var_dump('Loi');
            die;
        }
    }
    public function huyDonHang()
    {
        if (isset($_SESSION['user-account'])) {
            $email = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user-account']); // thong tin tai khoan dang nhap
            $tai_khoan_id = $email['id'];

            // lay id don hang chuyen từ url 
            $don_hang_id = $_GET['id'];
            //  kiem tra don hang 
            $donHang = $this->modelDonHang->getDonHangById($don_hang_id);
            if ($donHang['tai_khoan_id'] != $tai_khoan_id) { // check xem co phai tai khoan hay khong
                echo "Bạn khônd có quyền hủy đơn hàng này!";
                exit;
            }
            if ($donHang['trang_thai_id'] != 1) {
                echo "Chỉ đơn hàng trạng thái chưa xác nhận mới có thể hủy";
                exit;
            }
            // huy don hang
            $this->modelDonHang->updateTrangThaiDonHang($don_hang_id, 11);
            header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
        } else {
            var_dump('Loi');
            die;
        }
    }
}
