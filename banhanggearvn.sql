-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 03, 2022 lúc 05:55 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhanggearvn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `id_hangsanxuat` int(11) NOT NULL,
  `tenhangsanxuat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`id_hangsanxuat`, `tenhangsanxuat`) VALUES
(1, 'Corsair'),
(2, 'Razer'),
(3, 'GVN'),
(4, 'HP'),
(5, 'Acer'),
(6, 'Asus'),
(8, 'MSI');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `led`
--

CREATE TABLE `led` (
  `id_led` int(11) NOT NULL,
  `loai_led` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `led`
--

INSERT INTO `led` (`id_led`, `loai_led`) VALUES
(1, 'RGB'),
(2, 'Đơn'),
(3, 'Không có');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id_loaisanpham` int(11) NOT NULL,
  `tenloaisanpham` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id_loaisanpham`, `tenloaisanpham`) VALUES
(1, 'PC'),
(2, 'LAPTOP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausanpham`
--

CREATE TABLE `mausanpham` (
  `id_mau` int(11) NOT NULL,
  `mausanpham` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mausanpham`
--

INSERT INTO `mausanpham` (`id_mau`, `mausanpham`) VALUES
(1, 'Đen'),
(2, 'Xám'),
(3, 'Trắng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) UNSIGNED NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `giatien` varchar(100) NOT NULL,
  `soluongban` int(11) NOT NULL,
  `loaisanpham` int(11) NOT NULL,
  `linksanpham` varchar(100) NOT NULL,
  `baohanh` int(11) NOT NULL,
  `hangsanxuat` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `mau` int(11) NOT NULL DEFAULT 1,
  `led` int(11) NOT NULL DEFAULT 1,
  `motasanpham` varchar(1000) NOT NULL DEFAULT '''\\''Đang cập nhật . . .\\'''''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensanpham`, `hinhanh`, `giatien`, `soluongban`, `loaisanpham`, `linksanpham`, `baohanh`, `hangsanxuat`, `tinhtrang`, `mau`, `led`, `motasanpham`) VALUES
(1, 'GVN AXE M', 'img/PC1.jpg', '7,790,000₫', 7, 1, '\'update.html\'', 12, 3, 1, 2, 1, '\r\nMainboard: MSI H510M Pro-E	\r\nCPU: Intel Core i3 10100F / 6MB / 4.3GHZ / 4 nhân 8 luồng / LGA 1200	\r\nRAM: PNY XLR8 RGB DDR4 1x8GB 3200	\r\nVGA: MSI GeForce GT 730 2G (N730K-2GD3H/LPV1)	\r\nSSD: PNY CS900 120G 2.5\" Sata 3	\r\nHHD: Có thể tùy chọn Nâng Cấp	\r\nPSU: Deepcool DN450 - 80 Plus	\r\nCase: Case XIGMATEK AERO 2F	'),
(2, 'GVN Titan M\r\n', 'img/PC2.jpg', '8,490,000₫\r\n', 2, 1, '\'update.html\'', 6, 3, 1, 1, 1, 'Đang cập nhật . . .'),
(3, 'GVN Ventus M\r\n', 'img/PC3.jpg\r\n', '8,790,000₫\r\n', 9, 1, '\'update.html\'', 24, 3, 1, 1, 1, 'Đang cập nhật . . .'),
(4, 'GVN Mystic M', 'img/PC4.jpg', '12,390,000₫', 5, 1, '\'update.html\'', 8, 3, 1, 1, 1, 'Đang cập nhật . . .'),
(5, 'GVN Ivy M', 'img/PC5.jpg', '13,690,000₫', 5, 1, '\'update.html\'', 36, 3, 2, 1, 1, 'Đang cập nhật . . .'),
(6, 'GVN Ratchet M\r\n', 'img/PC6.jpg', '18,190,000₫', 4, 1, '\'update.html\'', 12, 3, 1, 1, 1, 'Đang cập nhật . . .'),
(8, 'GVN Athen M\r\n', 'img/PC7.jpg', '19,590,000₫', 2, 1, '\'update.html\'', 6, 3, 1, 1, 1, 'Đang cập nhật . . .'),
(9, 'GVN Hextech S\r\n', 'img/PC9.jpg', '24,990,000₫\r\n', 11, 1, '\'update.html\'', 24, 3, 1, 1, 1, 'Đang cập nhật . . .'),
(10, 'GVN Ghost S\r\n', 'img/PC8.jpg', '25,790,000₫', 10, 1, '\'update.html\'', 24, 3, 1, 1, 1, 'Đang cập nhật . . .'),
(11, 'GVN Phantom S\r\n', 'img/PC10.jpg', '31,290,000₫', 6, 1, '\'update.html\'', 12, 3, 1, 1, 1, 'Đang cập nhật . . .'),
(12, 'Laptop Gaming HP VICTUS 16 e0177AX 4R0U9PA\r\n', 'img/LAPTOP1.jpg', '19,490,000₫', 5, 2, '\'update.html\'', 36, 4, 2, 1, 3, 'Đang cập nhật . . .'),
(13, 'Laptop Gaming Acer Aspire 7 A715 42G R05G\r\n', 'img/LAPTOP2.jpg', '19,590,000₫', 8, 2, '\'update.html\'', 12, 5, 1, 1, 1, 'Đang cập nhật . . .'),
(14, 'Laptop Gaming Acer Nitro 5 AN515 45 R6EV\r\n', 'img/LAPTOP3.jpg', '20,990,000₫', 6, 2, '\'update.html\'', 6, 5, 1, 1, 1, 'Đang cập nhật . . .'),
(15, 'Laptop Gaming Acer Nitro 5 Eagle AN515 57 5669\r\n', 'img/LAPTOP4.jpg', '20,990,000₫', 13, 2, '\'update.html\'', 6, 5, 1, 1, 1, 'Đang cập nhật . . .'),
(16, 'Laptop Gaming Asus ROG Strix G15 G513IH HN015T\r\n', 'img/LAPTOP5.png', '21,990,000₫', 17, 2, '\'update.html\'', 18, 6, 1, 1, 1, 'Đang cập nhật . . .'),
(17, 'Laptop Gaming Asus ROG Strix G15 G513IH HN015W\r\n', 'img/LAPTOP6.png', '22,490,000₫', 9, 2, '\'update.html\'', 36, 6, 2, 1, 1, 'Đang cập nhật . . .'),
(18, 'Laptop Gaming MSI Katana GF66 11UC 676VN\r\n', 'img/LAPTOP7.jpg', '23,490,000₫', 4, 2, '\'update.html\'', 6, 8, 1, 1, 2, 'Đang cập nhật . . .'),
(19, 'Laptop gaming Acer Nitro 5 Eagle AN515 57 54MV\r\n', 'img/LAPTOP8.jpg', '23,590,000₫', 8, 2, '\'update.html\'', 12, 5, 1, 1, 1, 'Đang cập nhật . . .'),
(20, 'Laptop ASUS TUF Gaming F15 FX506HCB HN144W\r\n', 'img/LAPTOP9.png', '23,990,000₫', 11, 2, '\'update.html\'', 24, 6, 1, 1, 2, 'Đang cập nhật . . .'),
(21, 'Laptop Asus TUF Gaming FX706HCB HX105W\r\n', 'img/LAPTOP10.png', '24,390,000₫', 2, 2, '\'update.html\'', 12, 6, 2, 1, 2, 'Đang cập nhật . . .');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoannguoidung`
--

CREATE TABLE `taikhoannguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoannguoidung`
--

INSERT INTO `taikhoannguoidung` (`id`, `email`, `username`, `password`) VALUES
(1, 'quockhanh392001@gmail.com', 'Nguyễn Quốc Khánh', '123456'),
(2, 'hahaha@gmail.com', 'asdasdasd', '96e79218965eb72c92a549dd5a330112'),
(3, 'khanh392001@gmail.com', 'asdasaaa', '3d186804534370c3c817db0563f0e461'),
(4, 'uchiha@gmail.com', 'hjgjhgj', '1a100d2c0dab19c4430e7d73762b3423'),
(5, 'hahahaaaaa@gmail.com', '321321312', 'c8837b23ff8aaa8a2dde915473ce0991'),
(6, 'hahahabc@gmail.com', 'asdasdasd', '1bbd886460827015e5d605ed44252251'),
(7, 'hahahabc@gmail.com', 'asdasdasd', '1bbd886460827015e5d605ed44252251'),
(8, 'hiii@gmail.com', 'asdasdasd', '1bbd886460827015e5d605ed44252251'),
(9, 'khanhh392001@gmail.com', 'Khánh', '3d186804534370c3c817db0563f0e461'),
(10, 'khanhh392001@gmail.com', 'Khánh', '3d186804534370c3c817db0563f0e461');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrangsanpham`
--

CREATE TABLE `tinhtrangsanpham` (
  `id_tinhtrang` int(11) NOT NULL,
  `tinhtrangsanpham` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tinhtrangsanpham`
--

INSERT INTO `tinhtrangsanpham` (`id_tinhtrang`, `tinhtrangsanpham`) VALUES
(1, 'Mới 100%'),
(2, 'Cũ (Đã qua sử dụng)');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`id_hangsanxuat`);

--
-- Chỉ mục cho bảng `led`
--
ALTER TABLE `led`
  ADD PRIMARY KEY (`id_led`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id_loaisanpham`);

--
-- Chỉ mục cho bảng `mausanpham`
--
ALTER TABLE `mausanpham`
  ADD PRIMARY KEY (`id_mau`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loaisanpham` (`loaisanpham`),
  ADD KEY `id_hangsanxuat` (`hangsanxuat`),
  ADD KEY `tinhtrang` (`tinhtrang`),
  ADD KEY `mau` (`mau`),
  ADD KEY `led` (`led`);

--
-- Chỉ mục cho bảng `taikhoannguoidung`
--
ALTER TABLE `taikhoannguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinhtrangsanpham`
--
ALTER TABLE `tinhtrangsanpham`
  ADD PRIMARY KEY (`id_tinhtrang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `id_hangsanxuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `led`
--
ALTER TABLE `led`
  MODIFY `id_led` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_loaisanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `mausanpham`
--
ALTER TABLE `mausanpham`
  MODIFY `id_mau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `taikhoannguoidung`
--
ALTER TABLE `taikhoannguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tinhtrangsanpham`
--
ALTER TABLE `tinhtrangsanpham`
  MODIFY `id_tinhtrang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`loaisanpham`) REFERENCES `loaisanpham` (`id_loaisanpham`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`hangsanxuat`) REFERENCES `hangsanxuat` (`id_hangsanxuat`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`tinhtrang`) REFERENCES `tinhtrangsanpham` (`id_tinhtrang`),
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`mau`) REFERENCES `mausanpham` (`id_mau`),
  ADD CONSTRAINT `sanpham_ibfk_5` FOREIGN KEY (`led`) REFERENCES `led` (`id_led`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
