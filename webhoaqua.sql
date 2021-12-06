-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2021 lúc 03:46 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'Thời trang Nam', '2021-11-30 15:56:08', '2021-11-30 15:56:08'),
(2, 'Thời trang Nữ', '2021-11-30 15:56:08', '2021-11-30 15:56:08'),
(3, 'Thời tang mùa đông', '2021-12-06 03:14:39', '2021-12-06 03:14:39'),
(4, 'Thời trang mùa hè', '2021-12-06 03:15:46', '2021-12-06 03:15:46'),
(5, 'Thời trang Tuổi Teen', '2021-12-06 03:16:48', '2021-12-06 03:16:48'),
(7, 'Thời trang Hallowen', '2021-12-06 03:15:06', '2021-12-06 03:15:06'),
(8, 'Thời trang bằng PHP', '2021-12-06 03:25:27', '2021-12-06 03:25:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tokens`
--

CREATE TABLE `tokens` (
  `user_id` int(11) NOT NULL,
  `token` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tokens`
--

INSERT INTO `tokens` (`user_id`, `token`, `created_at`) VALUES
(1, '089b529dd3ff900e210fb068fa8e7cdf', '2021-11-05 14:47:13'),
(1, '08e829cf3dbe9aca848db99825571bf7', '2021-11-05 14:42:14'),
(1, '0db4bb38f8f5e97d5d8b1cf57bfe34a4', '2021-11-07 03:46:35'),
(1, '15843c154d3d8a5eb46300460e8b6878', '2021-11-03 15:25:35'),
(1, '175f8b09f100885271a244235775198b', '2021-11-03 14:38:01'),
(1, '1af7ae253fa47ad1d41b33178479ad76', '2021-11-07 03:33:25'),
(1, '1efa5fa527643c3b5ed8936e4b94e2bf', '2021-11-03 15:30:37'),
(1, '26d09d2074133e8a4f52e2d73792dd35', '2021-11-05 14:46:32'),
(1, '278a46d2acef3ef8a1d1efc76f9f8b4c', '2021-11-08 12:57:53'),
(1, '3129181fba02a69d8e12bbb2af258fd3', '2021-11-07 12:11:01'),
(1, '3751194bfee616faf74bbbd0f585cb91', '2021-11-05 14:55:25'),
(1, '39b57efe676a3f218c5834f40f8a2d8e', '2021-11-09 11:40:08'),
(1, '452efd91de80f63b155a1a67455a8b71', '2021-11-05 14:45:38'),
(1, '4f6ef17e6af519273d86195b4481d0f1', '2021-11-07 14:18:28'),
(1, '6e0eacfa856da4af348998fa63dd771b', '2021-11-08 15:17:24'),
(1, '878acf4b1c7874c9ad25d677827fce4b', '2021-11-05 14:44:14'),
(1, '95bff7b0fe681167e0c12574278df4af', '2021-11-05 14:49:51'),
(1, '9879a9dd700dea69fabf10c468df2326', '2021-11-07 06:46:27'),
(1, '9ac9f2f1e81bd09321949418baa5ab96', '2021-11-07 03:46:48'),
(1, 'ad87b134d1ceba6ff0c1c08b9d573a3b', '2021-11-05 14:53:08'),
(1, 'ae4e961dd9f59c4c8b663fa60b4a600e', '2021-11-07 06:48:20'),
(1, 'af5b2ffaf9bff0b820692bce17beea9c', '2021-11-05 14:54:26'),
(1, 'c0a207b48beaae7a7261af180fcd75bb', '2021-11-05 14:48:16'),
(1, 'c1e6e727ab6664fbd545045ce1d775c1', '2021-11-07 03:30:25'),
(1, 'cca03c50fea16b9d43713e5e54c1f29e', '2021-11-05 14:55:31'),
(1, 'd392a3114ec38964582c33c510af7f44', '2021-11-07 06:51:18'),
(1, 'dd3871d2debb81f54bd300997c4c81e0', '2021-11-07 06:50:37'),
(1, 'e10a2612f078616c6b3fc1e2e31d3300', '2021-11-07 03:45:20'),
(1, 'e3c395c54298eb029d9d69b65c7739c4', '2021-11-07 02:29:42'),
(1, 'efbd5dbce66d2324f2b04d845a3588e5', '2021-11-07 04:19:46'),
(1, 'f5498e36c91b216038584c7f5ca9295a', '2021-11-05 14:51:45'),
(1, 'f56c7ede5c22396b1c4d1f5c46f7bd4b', '2021-11-05 13:26:37'),
(1, 'f97d31986aac101d9ede0d3d527639b9', '2021-11-09 11:40:54'),
(1, 'fdf62c70523e7254eb0f9839cee5053b', '2021-11-05 14:54:51'),
(11, '0240068febca3320f1c7aa6322c0967d', '2021-11-20 12:20:59'),
(11, '6ed4893a1448f490a449ab39d630d295', '2021-11-20 12:57:15'),
(11, '823f0f73b0854088560fa511d5eba8ef', '2021-11-11 13:42:42'),
(11, '82acecb9b3a7b14832bfbbd9ca67d493', '2021-11-11 12:03:01'),
(11, '84730f2b00854abcd3d2f0820c5cd23f', '2021-11-10 13:56:08'),
(11, '956322af4635ae29117f4f7606c86a3e', '2021-11-11 14:46:30'),
(11, '9ee122da560d44ffe079732d801193fd', '2021-11-19 15:05:30'),
(11, '9f47702bbfbf9c2acbb8d0fd52af7345', '2021-11-11 14:38:26'),
(11, 'a1f5f8a087a4558d1c5a9b2db4624db7', '2021-11-20 12:37:29'),
(11, 'ad2a2a1856b8ce946a2352f3615d1580', '2021-11-20 13:44:53'),
(11, 'eb7b9851464e7910e7188deb312d0041', '2021-11-20 12:47:18'),
(11, 'f9a9fe1a5ca8c113b82e776774ce80ad', '2021-11-21 06:47:35'),
(12, '1cbd4bcd8a2efc2178ee0a4cff361018', '2021-11-11 14:38:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `update_at`, `deleted`) VALUES
(10, 'Linh Chi', 'mia@gmail.com', '09712121212', 'Phuong cuu, phuong hai, ninh hai , ninh thuan', 'a393e94648e390abb00b74ccd780e3db', 1, '2021-11-09 12:33:20', '2021-11-09 15:45:34', 0),
(11, 'Trần Văn Trung', 'tranvantrung@gmail.com', '09712121212', 'Ninh thuận', '1b783a8238f6df630740ed6215485f43', 1, '2021-11-09 12:33:48', '2021-11-11 14:36:18', 0),
(12, 'Thuận An', 'thuanan@gmail.com', '09712121212', 'Ninh thuận', '1b783a8238f6df630740ed6215485f43', 2, '2021-11-09 12:40:13', '2021-11-09 15:46:59', 0),
(15, 'NGUYEN B', 'nguyenb@gmail.com', '55575595959', 'phan rang', '1b783a8238f6df630740ed6215485f43', 2, '2021-11-09 13:02:20', '2021-11-11 13:59:09', 0),
(16, 'anhthanhnien', 'anhthanhnien@gmail.com', '0101010101', 'ninh thuan', '1b783a8238f6df630740ed6215485f43', 1, '2021-11-09 13:11:46', '2021-11-09 13:11:46', 0),
(17, 'Le thiet Ke', 'lethietke@gmail.com', '10202093', 'ninh Thuana', '1b783a8238f6df630740ed6215485f43', 1, '2021-11-09 14:29:09', '2021-11-09 14:29:09', 0),
(18, 'Le Hoàng', 'lehoang@gmail.com', '87847447', 'Khánh Hòa', '1b783a8238f6df630740ed6215485f43', 2, '2021-11-09 14:42:11', '2021-11-09 14:42:11', 0),
(19, 'Lilada', 'lilad@gmail.com', '958859585958', 'Bình Thuận', '1b783a8238f6df630740ed6215485f43', 2, '2021-11-09 14:43:13', '2021-11-10 13:56:54', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`user_id`,`token`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
