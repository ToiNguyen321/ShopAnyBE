-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2019 lúc 12:22 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopany`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `slug`, `parent_id`, `sort_order`, `create_time`) VALUES
(3, 'Máy uống tóc2', 'may-uong-toc2', 0, 1, '2019-10-01 15:30:39'),
(4, 'Máy uống tóc', 'may-uong-toc', 3, 3, '2019-10-02 14:55:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producer`
--

CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text,
  `slug` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `producer`
--

INSERT INTO `producer` (`id`, `name`, `content`, `slug`, `create_time`) VALUES
(2, 'Máy uống tóc2', '<p><em>aaaaaaaaaaaaaaaa</em></p>\r\n\r\n<p><strong>aaaaaaaaaaaaaaaa</strong></p>\r\n\r\n<p>aaaaaaaaaaaaaaaa</p>\r\n\r\n<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>aaaaaaaaaaaaaaaa</p>\r\n\r\n<p>aaaaaaaaaaaaaaaa</p>\r\n\r\n<p>aaaaaaaaaaaaaaaav</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'may-uong-toc2', '2019-10-02 13:44:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `view` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `imageList` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `catalog_id`, `content`, `price`, `discount`, `view`, `producer_id`, `title`, `image`, `imageList`, `slug`, `create_time`) VALUES
(1, 'Máy uống tóc3', 4, '<p>aaaaaaaaaaaaaa</p>\r\n', 100, 10, 0, 2, 'Test gửi email', '0', '[\"imagetest5.jpg\"]', '', '2019-10-02 16:08:57'),
(2, 'Máy uống tóc3', 4, '<p>aaaaaaaaaaaaaa</p>\r\n', 100, 10, 0, 2, 'Test gửi email', '', '[\"imagetest7.jpg\"]', '', '2019-10-02 16:09:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shopany`
--

CREATE TABLE `shopany` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `data` text NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shopany`
--
ALTER TABLE `shopany`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `shopany`
--
ALTER TABLE `shopany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
