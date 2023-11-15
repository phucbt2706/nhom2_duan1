-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 09, 2023 lúc 01:39 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom2_duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cate_id` int NOT NULL,
  `cate_name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `parent_id`) VALUES
(1, 'Điện thoại', 0),
(2, 'Laptop', 0),
(3, 'Máy tính bảng', 0),
(4, 'Linh kiện', 0),
(5, 'Phụ kiện', 0),
(7, 'Apple', 1),
(8, 'Samsung', 1),
(9, 'Oppo', 1),
(10, 'Xiaomi', 1),
(11, 'Realme', 1),
(12, 'Nokia', 1),
(13, 'Vivo', 1),
(14, 'Apple', 2),
(15, 'Lenovo', 2),
(16, 'MSI', 2),
(17, 'Asus', 2),
(18, 'Dell', 2),
(19, 'LG', 2),
(20, 'Acer', 2),
(21, 'HP', 2),
(22, 'Apple', 3),
(23, 'Samsung', 3),
(24, 'Xiaome', 3),
(25, 'Lenovo', 3),
(26, 'Oppo', 3),
(27, 'Mainboard', 4),
(28, 'CPU', 4),
(29, 'VGA', 4),
(30, 'RAM', 4),
(31, 'Ổ cứng', 4),
(32, 'Màn hình', 4),
(33, 'Bao da', 5),
(34, 'Sạc dự phòng', 5),
(35, 'Tai nghe', 5),
(36, 'Loa', 5),
(37, 'USB', 5),
(38, 'Chuột', 5),
(39, 'Bàn phím', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `phone` int NOT NULL,
  `total` float NOT NULL,
  `note` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `fullname`, `email`, `phone`, `total`, `note`, `order_date`) VALUES
(1, 1, '', '', 0, 1000000, 'Không có ghi chú', '2023-11-09 08:26:15'),
(2, 2, '', '', 0, 1000000, 'Không có ghi chú', '2023-11-09 08:26:15'),
(3, 3, '', '', 0, 1000000, 'Không có ghi chú', '2023-11-09 08:26:15'),
(4, 4, '', '', 0, 1000000, 'Không có ghi chú', '2023-11-09 08:26:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int NOT NULL,
  `qty` int NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  `product_id` int NOT NULL,
  `order_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `qty`, `price`, `total`, `product_id`, `order_id`) VALUES
(1, 2, 11990000, 0, 1, 1),
(2, 2, 11990000, 0, 1, 1),
(3, 3, 21990000, 0, 8, 1),
(4, 3, 31990000, 0, 6, 1),
(5, 3, 51990000, 0, 14, 1),
(6, 3, 51990000, 0, 14, 2),
(7, 3, 51990000, 0, 14, 2),
(8, 1, 11990000, 0, 10, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `cate_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `discount`, `images`, `description`, `cate_id`) VALUES
(1, 'Iphone 11 ', 11990000, NULL, 'Anh Iphone 11', 'Mô tả', 7),
(2, 'Iphone 11 Pro', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(3, 'Iphone 11 Pro Max', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(4, 'Iphone 12', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(5, 'Iphone 12 Pro', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(6, 'Iphone 12 Pro Max', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(7, 'Iphone 13', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(8, 'Iphone 13 Pro', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(9, 'Iphone 13 Pro Max', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(10, 'Iphone 14', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(11, 'Iphone 14 Pro', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(12, 'Iphone 14 Pro Max', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(13, 'Iphone 15', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(14, 'Iphone 15 Pro', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(15, 'Iphone 15 Pro Max', 11990000, NULL, 'Anh Iphone', 'Mô tả', 7),
(16, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(17, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(18, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(19, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(20, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(21, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(22, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(23, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(24, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(25, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(26, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(27, 'MacBook', 11990000, NULL, 'Anh Iphone', 'Mô tả', 14),
(28, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(29, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(30, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(31, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(32, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(33, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(34, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(35, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(36, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(37, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(38, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(39, 'Ipad Gen9', 11990000, NULL, 'Ảnh Ipad', 'Mô tả', 22),
(40, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27),
(41, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27),
(42, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27),
(43, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27),
(44, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27),
(45, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27),
(46, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27),
(47, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27),
(48, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27),
(49, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27),
(50, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27),
(51, 'Mainboard', 11990000, NULL, 'Ảnh Mainboard', 'Mô tả', 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` int NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `phone` int NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `email`, `phone`, `avatar`, `role_id`) VALUES
(1, 'admin', 'admin', 'Bùi Trọng Phúc', 'phucbt2607@gmail.com', 79684646, '', 1),
(2, 'admin12', 'admin', 'Nhật Trường', 'truongnhut12@gmail.com', 796842, '', 1),
(3, 'admin13', 'admin', 'Hoàng Phi', 'phihoang13@gmail.com', 79684646, '', 1),
(4, 'admim14', 'admin', 'Thanh Mẫn', 'thanhman14@gmail.com', 79684645, '', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
