-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2019 lúc 12:36 PM
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
(0, 'Không xác định', 'khong-xac-dinh', 0, 0, '2019-10-18 15:05:44'),
(5, 'Máy uốn tóc', 'may-uon-toc', 0, 1, '2019-10-18 15:05:44'),
(6, 'Máy làm tóc', 'may-lam-toc', 0, 1, '2019-10-18 15:12:17');

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
(0, 'Không xác định', NULL, 'khong-xac-dinh', '2019-10-18 15:05:44');

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
(3, ' MÁY LÀM TÓC CHỈ TỪ #150k CHO SALON', 0, '<p>M&aacute;y L&agrave; Thẳng Bản Sứ Tokyo&nbsp;❤️&nbsp;Bản 5cm<br />\r\nGi&aacute; : 330k<br />\r\n- M&aacute;y l&agrave; bản sứ ceramic mượt , b&oacute;ng, bảo vệ t&oacute;c<br />\r\n- Mặt c&oacute; c&aacute;c lỗ để tho&aacute;t nhiệt<br />\r\n- Bảng hiện điện tử nhiệt l&ecirc;n đến 230 độ<br />\r\nBảo h&agrave;nh 1 đổi 1 trong 30 ng&agrave;y</p>\r\n', 150, 0, 0, 0, ' MÁY LÀM TÓC CHỈ TỪ #150k CHO SALON', 'maylamtoc150k32.jpg', '[\"maylamtoc150k.jpg\",\"maylamtoc150k22.jpg\",\"maylamtoc150k34.jpg\"]', 'may-lam-toc-chi-tu-150k-cho-salon', '2019-10-18 15:18:43'),
(5, 'MÁY LÀM TÓC CHỈ TỪ #150k CHO SALON', 0, '<p>imageL</p>\r\n', 111, 0, 0, 0, 'MÁY LÀM TÓC CHỈ TỪ #150k CHO SALON', 'maylamtoc150k33.jpg', '[\"maylamtoc150k.jpg\",\"maylamtoc150k22.jpg\",\"maylamtoc150k34.jpg\"]', 'may-lam-toc-chi-tu-150k-cho-salon', '2019-10-18 16:52:05'),
(6, '', 0, '', 0, 0, 0, 0, '', 'noImage.jpg', '[]', '', '2019-10-18 17:35:13');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `create_time`) VALUES
(1, 'aaaaaaaaaaaaaaaa', '1', '0000-00-00 00:00:00'),
(2, 'aaaaaaaaaaaaaaaa', '1', '0000-00-00 00:00:00'),
(3, 'aaaaaaaaaaaaaaaa', '1', '0000-00-00 00:00:00'),
(4, 'aaaaaaaaaaaaaaaa', '1', '0000-00-00 00:00:00'),
(5, 'aaaaaaaaaaaaaaaa', '1', '0000-00-00 00:00:00'),
(6, 'aaaaaaaaaaaaaaaa', '1', '0000-00-00 00:00:00'),
(7, 'aaaaaaaaaaaaaaaa', '1', '2019-10-17 16:41:57'),
(8, 'aaaaaaaaaaaaaaaa', '1', '2019-10-17 17:13:06'),
(9, 'aaaaaaaaaaaaaaaa', '1', '2019-10-17 17:14:19');

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
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `shopany`
--
ALTER TABLE `shopany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
