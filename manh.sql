-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 26, 2022 lúc 04:42 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `manh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_user`, `admin_pass`, `admin_level`) VALUES
(1, 'manh', 'manh6061@gmail.com', 'noname0398', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, '', '', 'noname0398', 'noname0398', 0),
(3, '', '', 'manhadmin', 'noname0398', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandid` int(11) NOT NULL,
  `brandname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandid`, `brandname`) VALUES
(5, 'Acer'),
(6, 'MSI'),
(7, 'DELL'),
(8, 'ASUS'),
(9, 'HP'),
(10, 'Acer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartid`, `productid`, `sid`, `productname`, `price`, `quantity`, `image`) VALUES
(28, 12, '3r1g58id4g0urtvc2a2vbgi3vl', 'Laptop Dell Workstation Mobile Precision 3561 vPro', '44390000', 1, '99421f0a52.jpg'),
(31, 10, '8ig3cqpcn7qsc9gtk8ogbt13i8', 'Laptop Asus Gaming TUF FX506LHB-HN188W', '16299000', 1, '39db6376e3.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catid` int(11) NOT NULL,
  `catname` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catid`, `catname`) VALUES
(10, 'Laptop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cusid` int(11) NOT NULL,
  `cusname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sid` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `productname` varchar(256) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`cusid`, `cusname`, `phone`, `street`, `city`, `town`, `email`, `sid`, `price`, `productname`, `quantity`) VALUES
(10, 'Nguyễn Ngọc mạnh', '0355860828', 'Bắc Từ liêm', 'Hà Nội', 'Xuân Đỉnh', 'manh6061@gmail.com', '8ig3cqpcn7qsc9gtk8ogbt13i8', '16299000', 'Laptop Asus Gaming TUF FX506LHB-HN188W', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `productdesc` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productid`, `productname`, `catid`, `brandid`, `productdesc`, `price`, `image`, `type`) VALUES
(8, 'Laptop Acer Gaming Predator Helios 300 PH315-54-99S6 ', 10, 10, 'CPU: Intel Core i9 11900H\r\nRAM: 16GB\r\nỔ cứng: 512GB SSD\r\nVGA: Nvidia RTX3060 6G\r\nMàn hình: 15.6 inch QHD 165Hz\r\nĐèn bàn phím: RGB', '39999000', '75c761a4a3.png', 0),
(9, 'Laptop Acer TravelMate B3 TMB311-31-P49D', 10, 10, 'CPU: Intel Pentium N5030\r\nRAM: 4GB\r\nỔ cứng: 256GB SSD\r\nVGA: Onboard\r\nMàn hình: 11.6 inch HD\r\nHĐH: Win 11', '4999000', 'ba0a99f204.jpg', 0),
(10, 'Laptop Asus Gaming TUF FX506LHB-HN188W', 10, 8, 'CPU: Intel® Core™ i5-10300H 2.5 GHZ (8M Cache, up to 4.5 GHz, 4 nhân 8 luồng)\r\nRAM: 8GB DDR4 SO-DIMM 2933MHz\r\nỔ cứng: 512GB M.2 NVMe™ PCIe® 3.0 SSD\r\nVGA: NVIDIA GTX 1650 4GB\r\nMàn hình: 15.6-inch, FHD (1920 x 1080) 144hz, 16:9,NTSC: 45%, Độ sáng :250nits\r\nPhím: có đèn led', '16299000', '39db6376e3.jpeg', 0),
(11, 'Laptop Asus VivoBook A1503ZA-L1422W', 10, 8, 'CPU Intel® Core™ i5-12500H Processor (18MB cache, up to 4.5GHz)\r\nRam 8GB DDR4 Onboard\r\nSSD 512GB M.2 NVMe™ PCIe® 3.0\r\nVGA Intel® Iris® Xe Graphics\r\nDisplay 15.6Inch OLED FHD\r\nBacklit Chiclet Keyboard', '19200000', '7aeda7f20e.png', 0),
(12, 'Laptop Dell Workstation Mobile Precision 3561 vPro', 10, 7, 'CPU: Intel Core i7 11850H\r\nRAM: 16GB\r\nỔ cứng: 512GB SSD\r\nVGA: Nvidia T600 4G\r\nMàn hình: 15.6 inch FHD\r\nHĐH: Ubuntu', '44390000', '99421f0a52.jpg', 0),
(13, 'Laptop Dell Inspiron N3511B (P112F001BBL)', 10, 7, 'CPU: Intel Core i5 1135G7\r\nRAM: 4GB\r\nỔ cứng: 512GB SSD\r\nVGA: Intel Iris Xe Graphics\r\nMàn hình: 15.6 inch FHD\r\nHĐH: Win10 + office', '15899000', 'cb82ef48e4.jpg', 0),
(14, 'Laptop HP 14s-cf2527TU (4K4A1PA)', 10, 9, 'CPU: Intel core i3 10110U\r\nRAM: 4GB\r\nỔ cứng: 256GB SSD\r\nVGA: Onboard\r\nMàn hình: 14 inch HD\r\nHĐH: Win 10', '8999000', '320a7078ff.jpg', 0),
(15, 'Laptop HP Zbook Firefly 14 G8 (275W0AV)', 10, 9, 'CPU: Intel Core i7 1165G7\r\nRAM: 16GB\r\nỔ cứng: 512GB SSD\r\nVGA: Onboard\r\nMàn hình: Nvidia T500 4GB\r\nHĐH: Win 10 pro', '35349000', 'c546add8f9.jpg', 0),
(16, 'Laptop MSI Creator Z16 (A11UET-285VN)', 10, 6, 'CPU: Intel Core i9 11900H\r\nRAM: 32GB\r\nỔ cứng: 1TB SSD\r\nVGA: NVIDIA RTX3060 6G\r\nMàn hình: 16.0 inch QHD Cảm ứng\r\nBàn phím: có đèn nền', '63000000', '0d14a378b8.png', 0),
(17, 'Laptop MSI Modern 14 (B11MOU-1028VN)', 10, 6, 'CPU: Core i3 1115G4 – Tiger Lake\r\nRAM: 8GB DDR4 3200Mhz (8GB *1) (2 khe ram)\r\nỔ cứng: 256GB NVMe PCIe SSD Gen 3x4 (update thay thế)\r\nVGA: Intel HD Graphic\r\nMàn hình : 14\" FHD (1920*1080), 60Hz IPS-Level\r\nBàn phím: có đèn led', '11590000', 'ab4382bb6e.jpeg', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catid`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cusid`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
