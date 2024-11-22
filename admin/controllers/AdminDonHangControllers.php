<?php
class AdminDonHangControllers
{
    public $modelDonHang;
    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachDonHang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();
        // echo "Đây là trang danh mục";
        require_once './views/donhang/listDonHang.php';
    }
    public function detailDonHang()
    {
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id); // lấy thông tin đơn hàng ở bảng đơn hàng
        $getlistDonHang = $this->modelDonHang->getListDonHang($id); // lấy danh sách sản phẩm từ bảng chi_tiet_don_hangs
        $trangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang(); // lấy trạng thái đon hàng
        // $updateTrangThaiDonHang = $this->modelDonHang->updateTrangThaiDonHang($id);
        // var_dump($listDonHang);die();
        require_once './views/donhang/detailDonHang.php';
    }
    public function formEditDonHang()
    {
        // hàm này dùng để hiển thị form sản phẩm
        // lấy ra thông tin sản phẩm cần sủa
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);

        if ($donHang) {
            require_once './views/donhang/editDonHang.php';
            deleteSessionE();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }
    }
    public function postEditDonHang()// chỉ sửa trạng thái đơn hàng
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $don_hang_id = $_POST['don_hang_id'] ?? '';// lấy id đơn hàng
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';// lấy id trạng thái đơn hàng
            $this->modelDonHang->updateDonHang($don_hang_id, $trang_thai_id);// gọi đến model updateDonHang
            header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang='. $don_hang_id);// thành công sẽ bắn về trang chi tiết đon hàng
            exit();
        }
    }
    public function print(){
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id); // lấy thông tin đơn hàng ở bảng đơn hàng
        $getlistDonHang = $this->modelDonHang->getListDonHang($id); // lấy danh sách sản phẩm từ bảng chi_tiet_don_hangs
        $trangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang(); // lấy trạng thái đon hàng
        require_once './views/donhang/printDonHang.php';
    }
    public function deleteDonHang()
    {
        //         $id = $_GET['id_san_pham'];
        //         $sanPham = $this->modelSanPham->getDetailSanPham($id); 
        //         $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        //         if ($sanPham) {
        //             deleteFile($sanPham['hinh_anh']);
        //             $this->modelSanPham->destroySanPham($id);
        //         }
        //         if($listAnhSanPham){
        //             foreach($listAnhSanPham as $key=>$anhSp){
        //                 deleteFile($anhSp['link_hinh_anh']);
        //                 $this->modelSanPham->destroyAnhSanPham($anhSp['id']);
        //             }
        //         }
        //         header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
        //         exit();
    }
}
