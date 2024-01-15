-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2024 lúc 09:06 AM
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
  `EMAIL` varchar(50) NOT NULL,
  `TRANG_THAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`MAKH`, `HO_TEN`, `TAI_KHOAN`, `MAT_KHAU`, `EMAIL`, `TRANG_THAI`) VALUES
(1, 'Phan Trường Anh', 'anhnganh04', '123456', 'anhnganh04@gmail.com', 0),
(2, 'keke32', 'qweqwe', '123456', 'anhnganh04@gmail.com', 0),
(3, 'KEKEKEK', 'XINCHAO', '123456', 'HIHI@GMAIL.COM', 1),
(5, 'heheheh', '12312312341', '1231', '123123@gmail.com', 1),
(7, 'undefined', 'truonganhphan', '123456', '123@gmail.com', 0),
(8, 'dat', 'tiendatnguyen', '123456', 'dat@gmail.com', 0),
(9, 'aaa', '12312312412', '123456', 'anh@gmail.com', 0);

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
(1, 'Bánh mì', 1),
(2, 'Đồ ngọt', 1),
(3, 'Đồ uống', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_tri`
--

CREATE TABLE `quan_tri` (
  `TAI_KHOAN` varchar(50) NOT NULL,
  `MATKHAU` varchar(32) NOT NULL,
  `TRANG_THAI` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quan_tri`
--

INSERT INTO `quan_tri` (`TAI_KHOAN`, `MATKHAU`, `TRANG_THAI`) VALUES
('admin', '123456', 1);

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
(5, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(6, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(7, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(8, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(9, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(10, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(11, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(12, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(13, 'Bánh mì thịt nguội', 'Bánh mì thịt nguội bao gồm bánh mì và thịt nguội , gồm 2 thành phần chính là thịt thăn và thịt bò', 33, 1, '../Sanpham/image/bmiVnThitNguoi.webp', 1),
(434, 'hheheh', 'ádsadawwww', 2312, 1, 'uploads/eheheh.jpg', 0),
(35112, 'rể', '123123hehehegegege', 123, 1, 'uploads/2463749-600x393.jpg.webp', 1),
(12152512, '123123', '12312rwar', 23122, 1, 'uploads/anhcv1.jpg', 0);

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `MAKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
