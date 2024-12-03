-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2024 at 07:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wedsite_gshoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) VALUES
(1, 13, 5, 'Sản phẩm tuyệt vời', '2024-07-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(1, 1, 13, '9000000.00', 12, '9000000.00'),
(2, 2, 14, '10000000.00', 1, '10000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(3, 2, 13, 12),
(4, 2, 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten_chuc_vu`) VALUES
(1, 'admin'),
(2, 'khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text,
  `anh` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`, `anh`) VALUES
(1, 'Nike', 'Thương hiệu giày Nike', 'https://inkythuatso.com/uploads/images/2021/11/logo-nike-inkythuatso-2-01-04-15-42-44.jpg'),
(2, 'Adidas', 'Thương hiệu giày Adidas', 'https://cdn-copck.nitrocdn.com/WwybsgZzWtFojdWowVAajDJCKuMAXRVm/assets/images/optimized/rev-327d879/rubicmarketing.com/wp-content/uploads/2023/04/y-nghia-logo-adidas.jpg'),
(14, 'Vans', 'Thương hiệu giày Vans', 'https://drake.vn/image/catalog/H%C3%ACnh%20content/logo-vans/vans-logo_2.jpg'),
(15, 'Gucci', 'Thương hiệu giày Gucci', 'https://bota.vn/wp-content/uploads/2018/11/gg.jpg'),
(16, 'Balenciaga', 'Thương hiệu giày Balenciaga', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuD0wn3anZmKa-VUwFWaw1B0GGaYlucXzuIA&s'),
(17, 'Converse', 'Thương hiệu giày Converse', 'https://ih1.redbubble.net/image.5146905014.7484/st,small,507x507-pad,600x600,f8f8f8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(1, 'DH-1', 5, 'Nguyễn Văn A', 'Nguyenvana@gmail.com', '0987654320', '13 Trịnh Văn Bô, Hà Nội', '2024-08-01', '9000000.00', 'Chú ý đóng gói cẩn thận', 1, 10),
(2, 'DH-2', 7, 'Dương Thị Mai', 'Duongthimai@gmail.com', '0123456789', 'Nam Từ Liêm, Hà Nội', '2024-08-02', '10000000.00', 'Chú ý hàng là cần bảo quản ', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(14, 5, './uploads/1723394333pngtree-cartoon-cat-cute-cat-hand-painted-cat-cat-cute-pet-png-image_449977.jpg'),
(15, 5, './uploads/1723394333pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263 (1).png'),
(16, 5, './uploads/1723394333pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263.png'),
(17, 6, './uploads/1723394490pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263 (1).png'),
(18, 6, './uploads/1723394490pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263.png'),
(19, 6, './uploads/1723394490tải xuống (1).jpg'),
(23, 7, './uploads/1723482105anh.jpg'),
(24, 7, './uploads/1723482105Logo maker project (3).png'),
(25, 7, './uploads/1723482105Logo maker project.png'),
(26, 7, './uploads/1723482105pngtree-cartoon-cat-cute-cat-hand-painted-cat-cat-cute-pet-png-image_449977.jpg'),
(27, 7, './uploads/1723482105pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263 (1).png'),
(28, 7, './uploads/1723482105pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263.png'),
(29, 7, './uploads/1723482105tải xuống (1).jpg'),
(30, 7, './uploads/1723482105tải xuống (2).jpg'),
(31, 7, './uploads/1723482105tải xuống (3).jpg'),
(32, 7, './uploads/1723482105tải xuống (4).jpg'),
(33, 7, './uploads/1723482105tải xuống (5).jpg'),
(34, 8, './uploads/1723558922pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263 (1).png'),
(35, 8, './uploads/1723558922pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263.png'),
(36, 8, './uploads/1723558922tải xuống (1).jpg'),
(37, 8, './uploads/1723558922tải xuống (2).jpg'),
(38, 8, './uploads/1723558922tải xuống (3).jpg'),
(39, 8, './uploads/1723558922tải xuống (4).jpg'),
(40, 8, './uploads/1723558922tải xuống (5).jpg'),
(41, 9, './uploads/1723558946pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263 (1).png'),
(42, 9, './uploads/1723558946pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263.png'),
(43, 9, './uploads/1723558946tải xuống (1).jpg'),
(44, 9, './uploads/1723558946tải xuống (2).jpg'),
(45, 9, './uploads/1723558946tải xuống (3).jpg'),
(46, 9, './uploads/1723558946tải xuống (4).jpg'),
(47, 9, './uploads/1723558946tải xuống (5).jpg'),
(48, 10, './uploads/1723558971pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263 (1).png'),
(49, 10, './uploads/1723558971pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263.png'),
(50, 10, './uploads/1723558971tải xuống (1).jpg'),
(51, 10, './uploads/1723558971tải xuống (2).jpg'),
(52, 10, './uploads/1723558971tải xuống (3).jpg'),
(53, 10, './uploads/1723558971tải xuống (4).jpg'),
(54, 10, './uploads/1723558971tải xuống (5).jpg'),
(55, 11, './uploads/1723558997pngtree-favorite-cat-pet-shop-logo-cat-hand-drawn-graphics-png-image_4569263 (1).png'),
(56, 13, './uploads/1731136592images.jpg'),
(57, 13, './uploads/1731136604tải xuống.jpg'),
(58, 13, './uploads/1731136616tải xuống (1).jpg'),
(59, 13, './uploads/1731136626tải xuống (2).jpg'),
(60, 13, './uploads/1731136635tải xuống (3).jpg'),
(61, 14, './uploads/1731136889tải xuống.jpg'),
(62, 14, './uploads/1731136889tải xuống (1).jpg'),
(63, 14, './uploads/1731136889tải xuống (3).jpg'),
(64, 14, './uploads/1731136889tải xuống (4).jpg'),
(65, 15, './uploads/1731137868GW9196-1.webp'),
(66, 15, './uploads/1731137868ID2949-1.webp'),
(67, 15, './uploads/1731137868GW9198-1.webp'),
(68, 15, './uploads/1731137868ID2970-1.webp'),
(69, 16, './uploads/1731138238giay-the-thao-adidas-samba-adv-shoes-gz8477-mau-trang-xam-655b0abfc6248-20112023142903.webp'),
(70, 16, './uploads/1731138238giay-the-thao-adidas-samba-adv-shoes-gz8477-mau-trang-xam-655b0abfc6b4a-20112023142903.webp'),
(71, 16, './uploads/1731138238giay-the-thao-adidas-samba-adv-shoes-gz8477-mau-trang-xam-655b0abfc6e1f-20112023142903.webp'),
(72, 16, './uploads/1731138238giay-the-thao-adidas-samba-adv-shoes-gz8477-mau-trang-xam-655b0abfc76f2-20112023142903.webp'),
(73, 16, './uploads/1731138238giay-the-thao-adidas-samba-adv-shoes-gz8477-mau-trang-xam-655b0abfc7155-20112023142903.webp');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD(Thanh toán khi nhận hàng)'),
(2, 'Thanh toán online');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `so_luong` int NOT NULL,
  `luot_xem` int DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `mo_ta` text,
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(13, 'Giày thể thao Nike Air Force 1', '3000000.00', '2929000.00', './uploads/1731136508AIR+FORCE+1+\'07.png', 10, 0, '2024-11-01', 'Nike Air Force 1 \'07 Men\'s Shoes', 1, 1),
(14, 'Giày thể thao Nike Air Force 1', '3000000.00', '2809000.00', './uploads/1731136900tải xuống (2).jpg', 10, 0, '2024-11-02', 'Air Jordan 1 Low SE Older Kids\' Shoes', 1, 1),
(15, 'Giày Sneaker Nam Adidas Grand ', '3000000.00', '1400000.00', './uploads/1731137723GW9195-1.webp', 9, 0, '2024-11-01', 'Giày Sneaker Nam Adidas Grand Court Cloudfoam Comfort - Trắng', 2, 1),
(16, 'Giày Thể Thao Adidas Samba Adv Shoes GZ8477 IE3975', '3000000.00', '3550000.00', './uploads/1731138124giay-the-thao-adidas-samba-adv-shoes-gz8477-mau-trang-xam-655b0abfc6757-20112023142903.webp', 5, 0, '2024-11-03', 'Giày Thể Thao Adidas Samba Adv Shoes GZ8477 IE3975 Màu Trắng Xám Size 36.5', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gioi_tinh` tinyint(1) DEFAULT '1',
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `chuc_vu_id` int NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(4, 'admin', 'https://d1hjkbq40fs2x4.cloudfront.net/2017-08-21/files/landscape-photography_1645-t.jpg', '2024-09-01', 'admin@fpt.edu.vn', '0987654321', 1, '123', '$2y$10$tEd7lok7wI5jE0jB0348i.RP5PLn6R5n4U/c/cYXxMLEDxloCcNn6', 1, 1),
(5, 'Nguyễn Văn A', 'https://photo.znews.vn/w660/Uploaded/mdf_eioxrd/2021_07_06/2.jpg', '2024-09-01', 'nguyenvana@gmail.com', '0123456789', 1, 'Số 1 Ba Đình ', '$2y$10$4X5RXO8Psn19lHrrjscshOwFi4ZJhp4OFH6ca.78BybcwGViOnb2u', 2, 1),
(7, 'Nguyễn Thị B', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSN0Y_SeJHZINmA_vwcN_rR71JW9wJXegQWiA&s', '2024-09-01', 'nguyenthib@gmail.com', '0123443210', 2, 'Hà Nội', '$2y$10$WegmWQsuO7nM/tHqrsvoY.tx6gRNQiV1WRSCED3NhGWRlFrFOVVFa', 2, 2),
(8, 'Admin 2', 'https://d1hjkbq40fs2x4.cloudfront.net/2016-01-31/files/1045.jpg', '2024-09-08', 'admin2@gmail.com', '0999256388', 1, 'admin2@gmail.com', '$2y$10$FiMyrOM9YG3x5dIKgdADMe5dtGBkGQ8G22NaTjnSvsRH0.uBUy0Bi', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chưa xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Chưa thanh toán'),
(4, 'Đã thanh toán'),
(5, 'Đang chuẩn bị hàng'),
(6, 'Đang giao'),
(7, 'Đã giao'),
(8, 'Đã nhận'),
(9, 'Thành công'),
(10, 'Hoàn hàng'),
(11, 'Hủy đơn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
