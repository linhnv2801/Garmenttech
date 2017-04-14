-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 14, 2017 lúc 05:18 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_520_ci,
  `password_hash` text COLLATE utf8_unicode_520_ci NOT NULL,
  `auth_key` text COLLATE utf8_unicode_520_ci,
  `email` text COLLATE utf8_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password_hash`, `auth_key`, `email`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', '$2y$13$C4t6s219dRFjlu.wWtRpdeXHOY2VTXtO6zCQpyYb3.MUKiIxyKYnK', NULL, 'tanze.it92@gmail.com', '2017-02-20 04:59:10', '2017-02-20 04:59:10', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_520_ci NOT NULL,
  `productId` int(11) NOT NULL,
  `base_url` text COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `name`, `productId`, `base_url`) VALUES
(73, 'photo 3', 29, '740491061c49b6aff6ebcb4d1caa9514.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `descritption` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci,
  `image_urls` text,
  `video_url` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_type_id`, `price`, `descritption`, `image_urls`, `video_url`, `created_at`) VALUES
(3, 'May in Canon', 0, 1200000000, '', NULL, '', '2017-02-24 12:52:20'),
(5, 'May in da chuc nang mau', 3, 2147483647, '', NULL, '', '2017-02-24 14:18:48'),
(6, 'Hiha', 8, 2147483647, '', NULL, '', '2017-02-24 14:21:05'),
(7, 'Galaxy Note 4', 9, 2147483647, 'cũ', NULL, '', '2017-02-24 14:22:45'),
(8, 'May in abc', 2, 123000000, 'gdgtryty tỵ ', ' 59b514174bffe4ae402b3d63aad79fe0.png 5887cb7a46f3ea3730073a6bb7a243c7.png edebc62155a44e7df4b5f53ab8d21bf7.png', '', '2017-03-03 11:34:55'),
(9, 'May in lasejet', 2, 2147483647, 'gdgtryty tỵ ', '', '', '2017-03-03 12:47:31'),
(10, 'vxvcfbgfb', 9, 1200000000, '', ' edebc62155a44e7df4b5f53ab8d21bf7.png 82e4c920f790a1798028aed2c2d3c468.png', '', '2017-03-03 12:55:22'),
(19, 'hgj ghjh', 1, 124536, 'ghj juhkjhj ', ' uploads/45537c1ba151121304b3ca4128b8f585.jpg', 'jghjyuj', '2017-04-11 12:18:38'),
(20, 'gfth', 1, 14555, 'yuyi', ' uploads/cb49adf9d39f5569cea9ef8af5fc204b.jpg uploads/464b85854d0dc488b28791b302e27241.jpg uploads/fc8bc3ceda737e81dc96b1c0608c14e6.jpg', '', '2017-04-11 12:20:58'),
(21, 'frte', 2, 4858456, 'grtfyb r', ' uploads/cb49adf9d39f5569cea9ef8af5fc204b.jpg uploads/464b85854d0dc488b28791b302e27241.jpg uploads/fc8bc3ceda737e81dc96b1c0608c14e6.jpg uploads/78805a221a988e79ef3f42d7c5bfd418.jpeg', 'hrthtrfhf', '2017-04-13 14:09:54'),
(22, 'g', 9, 57896896, '', ' uploads/97869ddc10b8ad75ab0a7a336d2621e8.jpg uploads/57c35857f0abac8e84b872cf816da166.jpg uploads/74e4b5dcf2080ea6857691f69c35cb12.jpg uploads/59ec89b10a93ee7fb869bbd8c7943719.jpg uploads/ad4c978f0c2703a136ce09a5f277acae.jpg uploads/b65a3432f9a586a45672760be6d4261f.jpg uploads/f057d9748512748db1d95a1a8e919737.jpg uploads/a018fcffe87b3bbc2184355131d77709.jpg uploads/812bf640370e0a6862e632cd038c1ca3.jpg', '', '2017-04-13 14:17:59'),
(23, 'tyuuy', 3, 2147483647, 'u7iyuoi8ouo', ' uploads/cb49adf9d39f5569cea9ef8af5fc204b.jpg uploads/464b85854d0dc488b28791b302e27241.jpg uploads/78805a221a988e79ef3f42d7c5bfd418.jpeg uploads/52b97d645458f067f292145894db0f19.jpg uploads/c6ba574387b24606fe1374ad078bf15f.jpg uploads/97869ddc10b8ad75ab0a7a336d2621e8.jpg uploads/57c35857f0abac8e84b872cf816da166.jpg', 'ouou9o9uoo', '2017-04-13 14:35:14'),
(24, 'ertertet', 2, 5897686, 'hygfuygjg', ' uploads/9f07c0d72c367a0a6b62745c37edc7c4.jpg uploads/fddf0cab319fd15ef73bc295c8559355.jpg uploads/531beb50ffb32d08756e6462c037c8e1.jpg', 'hftyfhuht', '2017-04-13 14:37:43'),
(25, 'jfhfhgfh', 7, 7463267, 'gdtfhtfhjft', ' uploads/9f07c0d72c367a0a6b62745c37edc7c4.jpg uploads/fddf0cab319fd15ef73bc295c8559355.jpg uploads/531beb50ffb32d08756e6462c037c8e1.jpg', 'hgfhgf', '2017-04-13 14:44:56'),
(26, 'tdrtgd', 2, 423546, 'bvgfhf', ' uploads/5b5b32d21cf6964411d7384e296078d2.png uploads/72a3c202147228463777208e7f224823.png uploads/3248bc7547ce97b2a197b2a06cf7283d.png uploads/46b4b6fbd65f69d751f312b27a006edd.png', 'bdftg', '2017-04-13 17:32:51'),
(27, 'ygrtr', 1, 36576, 'tgdrtygf', ' uploads/cb49adf9d39f5569cea9ef8af5fc204b.jpg uploads/78805a221a988e79ef3f42d7c5bfd418.jpeg uploads/3357855c417bb8f913d780affbeadd40.jpg uploads/74e4b5dcf2080ea6857691f69c35cb12.jpg uploads/f057d9748512748db1d95a1a8e919737.jpg uploads/0ece7bb56cbba5e8b754f838436a73d4.jpg', 'dhfhft', '2017-04-13 17:35:46'),
(28, 'tgdrtyy', 2, 423435, 'hyfghgfh', ' uploads/cb49adf9d39f5569cea9ef8af5fc204b.jpg uploads/78805a221a988e79ef3f42d7c5bfd418.jpeg uploads/3357855c417bb8f913d780affbeadd40.jpg uploads/74e4b5dcf2080ea6857691f69c35cb12.jpg uploads/b65a3432f9a586a45672760be6d4261f.jpg uploads/812bf640370e0a6862e632cd038c1ca3.jpg uploads/46b83ce18db8b81cf1e52068cf693b70.jpg', 'hdghf', '2017-04-13 17:51:45'),
(29, 'gfdrgtg', 1, 2147483647, 'hgfhgjg', ' uploads/263898e4f5a30bb53403b4e1e4ce125e.jpg uploads/1adc0cdfc1c010c94af07dab06e5e8df.jpeg uploads/3ee5265ae2949855140db6c01a638247.jpg uploads/e03cd49b068f3cf7d1bd3b37fe5b163c.jpg uploads/2df696d5a39f720d59b60200d02f5d3f.jpg uploads/92e917732c95ac689dc3e5a73695e631.jpeg uploads/95679a93d95b17b4cbfa10de74a6898c.jpg uploads/eb5ce5c3341d65af28af13b3fe954a13.jpg uploads/5bc49dd4f41fdf403d9dcbb18b65d89e.jpg uploads/c85b2527497624ec6d5d577f0bba19e5.jpg', 'hfthf', '2017-04-14 09:12:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producttype`
--

CREATE TABLE `producttype` (
  `id` int(11) NOT NULL,
  `product_type_name` text COLLATE utf8_unicode_520_ci NOT NULL,
  `parents` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `producttype`
--

INSERT INTO `producttype` (`id`, `product_type_name`, `parents`) VALUES
(1, 'máy in', 0),
(2, 'máy in màu', 1),
(3, 'May in Canon', 1),
(7, 'máy in', 1),
(8, 'may in samsung', 1),
(9, 'điện thoại', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password_hash` text NOT NULL,
  `username` text,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `auth_key` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `password_hash`, `username`, `status`, `created_at`, `updated_at`, `auth_key`) VALUES
(2, 'tanze.it92@gmail.com', '$2y$13$C4t6s219dRFjlu.wWtRpdeXHOY2VTXtO6zCQpyYb3.MUKiIxyKYnK', 'admin', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'thuy.ptt@samsung.com', '$2y$13$fG5L2tPpsJ4jMcgICnR5secqhkJEK0KWDdXiMwx7M7eRSMCjB9rzm', 'thuy', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'V5OKw2jCIgJiTL1g9vAJ2ej6hz5JafK_'),
(4, '', '', NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT cho bảng `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
