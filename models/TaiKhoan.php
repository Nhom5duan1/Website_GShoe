<?php
class TaiKhoan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function checkLogin($email, $mat_khau){
        try {
            $sql = "SELECT * FROM `tai_khoans` WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
            if($user && password_verify($mat_khau, $user['mat_khau'])){
                if($user['chuc_vu_id'] == 1 && $user['chuc_vu_id'] == 2){
                    if ($user['trang_thai'] == 1) { // trường hợp đăng nhập thành công
                       return $user['email'];
                    }else{
                        return "Tài khoản bị cấm.";
                    }
                }else{
                    return "Tài khoản không có quyền đăng nhập";
                }
            }else{
                return "Thông tin email và password không đúng.";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}