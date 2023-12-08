-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2023 lúc 08:01 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MAKH` int(11) NOT NULL,
  `HO_TEN` varchar(100) NOT NULL,
  `TAI_KHOAN` varchar(50) NOT NULL,
  `MAT_KHAU` varchar(32) NOT NULL,
  `DIEN_THOAI` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `NGAY_SINH` datetime NOT NULL,
  `GIOI_TINH` tinyint(1) NOT NULL,
  `TRANG_THAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_he`
--

CREATE TABLE `lien_he` (
  `MALH` int(11) NOT NULL,
  `TIEU_DE` varchar(250) NOT NULL,
  `DIEN_THOAI` varchar(250) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `TRANG_THAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `MALSP` int(11) NOT NULL,
  `TEN_LOAI` varchar(100) NOT NULL,
  `TRANG_THAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`MALSP`, `TEN_LOAI`, `TRANG_THAI`) VALUES
(1, 'Bánh mì', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_tri`
--

CREATE TABLE `quan_tri` (
  `TAI_KHOAN` varchar(50) NOT NULL,
  `MATKHAU` varchar(32) NOT NULL,
  `TRANG_THAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` int(11) NOT NULL,
  `TEN_SP` varchar(200) NOT NULL,
  `MO_TA` varchar(250) NOT NULL,
  `GIA` float NOT NULL,
  `MALSP` int(11) NOT NULL,
  `HINH_ANH` varchar(100) NOT NULL,
  `TRANGTHAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `TEN_SP`, `MO_TA`, `GIA`, `MALSP`, `HINH_ANH`, `TRANGTHAI`) VALUES
(1, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(2, 'Bánh mì que pate cay', 'Bánh mì que pate cay bao gồm pate và trứng được trộn đều làm hương vị thêm hòa hợp', 33, 1, '../Sanpham/image/bmiQuePateCay.webp', 0),
(3, 'Bánh mì gậy cá ngữ', 'Bánh mì gậy cá ngừ được kẹp bên trong với cá ngừ từ đại dương tươi ngon ', 40, 1, '../Sanpham/image/bmiQuePateCay.webp', 1),
(4, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(5, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(6, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(7, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(8, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(9, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(10, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(11, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(12, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(13, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`MAKH`),
  ADD UNIQUE KEY `TAI_KHOAN` (`TAI_KHOAN`);

--
-- Chỉ mục cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`MALH`);

--
-- Chỉ mục cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`MALSP`);

--
-- Chỉ mục cho bảng `quan_tri`
--
ALTER TABLE `quan_tri`
  ADD PRIMARY KEY (`TAI_KHOAN`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `MALSP` (`MALSP`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MALSP`) REFERENCES `loai_san_pham` (`MALSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
