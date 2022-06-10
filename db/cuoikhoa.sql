-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 11:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuoikhoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `group_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `address`, `image`, `group_id`) VALUES
('4895c1b1-174f-446b-ac19-d0bc712d4e00', 'Hố Nai', '123/456 Hố Nai', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-1190662.jpg', 'MainMenu'),
('6c7f934b-866c-496a-94d3-acfa3388515c', 'Phạm Văn Thuận', '131/123 BH DN', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-1188254_800x450.jpg', 'MainMenu'),
('9bba4287-282a-4492-a78e-a2aeaff5a6ea', 'Võ Thị Sáu', '542/123 Võ Thị Sáu', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-1188254.jpg', 'MainMenu'),
('e72823ec-6e57-446f-9620-4071d1bdb00a', 'Biên Hoà', '24/12 Biên Hoà', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-658987.jpg', 'MainMenu');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `des`) VALUES
('2', 'Thức Uống Với Sữa', 'asdasd'),
('20289144-54ab-4ea6-bb60-cafaea335a8f', 'Cà Phê', NULL),
('e08bae78-2421-4bdd-89ce-cfb4d325b7b5', 'ád123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_detail`
--

CREATE TABLE `category_detail` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_detail`
--

INSERT INTO `category_detail` (`id`, `category_id`, `name`, `des`) VALUES
('15ff92e1-dff2-4722-b8ad-276383189eb5', '20289144-54ab-4ea6-bb60-cafaea335a8f', 'Sữa Tươi', ''),
('1923965b-6c8e-49bd-af4f-82fb52b574fd', '2', 'Trà', ''),
('35f766ee-4d75-48a5-9643-272012fade4f', '2', 'Trà Sữa', '0'),
('b564c182-256e-48ab-bba6-0f976fc77ed4', '2', 'Check', NULL),
('c34b0602-8179-4455-b9bd-439991a4b7b2', '2', 'Test', NULL),
('cc1622a3-df20-447c-aecc-a24cd9974cf9', '20289144-54ab-4ea6-bb60-cafaea335a8f', 'Capuchino', '');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tinh_thanh_id` int(11) NOT NULL,
  `quan_huyen_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` datetime NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id`, `first_name`, `last_name`, `user_id`, `phone`, `email`, `trang_thai_id`, `tinh_thanh_id`, `quan_huyen_id`, `address`, `create_at`, `note`, `total`) VALUES
('9c02b1d3-8d91-40a8-b172-25b129df5d24', 'ádasd', 'ádas', '1', '1313213', 'ádasdas', '893cb1f4-131d-452f-a361-e52a5467c701', 32, 33, 'ádasdasd', '2022-01-27 00:00:00', 'ádasdasd', '100');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang_chi_tiet`
--

CREATE TABLE `don_hang_chi_tiet` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_don_hang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `don_hang_chi_tiet`
--

INSERT INTO `don_hang_chi_tiet` (`id`, `id_don_hang`, `product_id`, `so_luong`, `gia`) VALUES
('0c9e8e64-b679-41de-8d86-0b74f9b66f21', 'bd287370-90c3-4440-9aa6-e224af9ba198', '0ef847cd-90cc-46f2-a574-7637b22c7d1a', 1, 94565465),
('20fc84be-1eeb-4a57-9c0e-e7c491c9c6a4', '9c02b1d3-8d91-40a8-b172-25b129df5d24', '769c21ec-8f27-414b-8da2-116b47348efa', 4, 25),
('f3deb5e7-76dc-4a9d-980b-d48068533c18', '613c7870-fdc6-439a-a1ae-443d9be9aacf', '0ef847cd-90cc-46f2-a574-7637b22c7d1a', 2, 94565465);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL DEFAULT 1,
  `create_at` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `user_id`, `product_id`, `number`, `create_at`, `trang_thai`) VALUES
('c4853de1-1856-40ca-8a3b-4d33ae19be0f', '1', '769c21ec-8f27-414b-8da2-116b47348efa', 4, '2022-01-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `ParentsId` int(11) NOT NULL,
  `IsPublic` int(11) NOT NULL,
  `Note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`Id`, `Name`, `ParentsId`, `IsPublic`, `Note`) VALUES
(1, 'Hà Nội', 0, 1, ''),
(2, 'Ba Đình', 1, 1, ''),
(3, 'Ba Vì', 1, 1, ''),
(4, 'Bắc Từ Liêm', 1, 1, ''),
(5, 'Cầu Giấy', 1, 1, ''),
(6, 'Chương Mỹ', 1, 1, ''),
(7, 'Đan Phượng', 1, 1, ''),
(8, 'Đông Anh', 1, 1, ''),
(9, 'Đống Đa', 1, 1, ''),
(10, 'Gia Lâm', 1, 1, ''),
(11, 'Hà Đông', 1, 1, ''),
(12, 'Hai Bà Trưng', 1, 1, ''),
(13, 'Hoài Đức', 1, 1, ''),
(14, 'Hoàn Kiếm', 1, 1, ''),
(15, 'Hoàng Mai', 1, 1, ''),
(16, 'Long Biên', 1, 1, ''),
(17, 'Mê Linh', 1, 1, ''),
(18, 'Mỹ Đức', 1, 1, ''),
(19, 'Nam Từ Liêm', 1, 1, ''),
(20, 'Phú Xuyên', 1, 1, ''),
(21, 'Phúc Thọ', 1, 1, ''),
(22, 'Quốc Oai', 1, 1, ''),
(23, 'Sóc Sơn', 1, 1, ''),
(24, 'Tây Hồ', 1, 1, ''),
(25, 'Thạch Thất', 1, 1, ''),
(26, 'Thanh Oai', 1, 1, ''),
(27, 'Thanh Trì', 1, 1, ''),
(28, 'Thanh Xuân', 1, 1, ''),
(29, 'Thị xã Sơn Tây', 1, 1, ''),
(30, 'Thường Tín', 1, 1, ''),
(31, 'Ứng Hòa', 1, 1, ''),
(32, 'Hồ Chí Minh', 0, 1, ''),
(33, 'Bình Tân', 32, 1, ''),
(34, 'Bình Thạnh', 32, 1, ''),
(35, 'Củ Chi', 32, 1, ''),
(36, 'Gò Vấp', 32, 1, ''),
(37, 'Hóc Môn', 32, 1, ''),
(38, 'Huyện Bình Chánh', 32, 1, ''),
(39, 'Huyện Cần Giờ', 32, 1, ''),
(40, 'Huyện Nhà Bè', 32, 1, ''),
(41, 'Phú Nhuận', 32, 1, ''),
(42, 'Quận 1', 32, 1, ''),
(43, 'Quận 10', 32, 1, ''),
(44, 'Quận 11', 32, 1, ''),
(45, 'Quận 12', 32, 1, ''),
(46, 'Quận 2', 32, 1, ''),
(47, 'Quận 3', 32, 1, ''),
(48, 'Quận 4', 32, 1, ''),
(49, 'Quận 5', 32, 1, ''),
(50, 'Quận 6', 32, 1, ''),
(51, 'Quận 7', 32, 1, ''),
(52, 'Quận 8', 32, 1, ''),
(53, 'Quận 9', 32, 1, ''),
(54, 'Tân Bình', 32, 1, ''),
(55, 'Tân Phú', 32, 1, ''),
(56, 'Thủ Đức', 32, 1, ''),
(57, 'Đà Nẵng', 0, 1, ''),
(58, 'Huyện Hòa Vang', 57, 1, ''),
(59, 'Huyện đảo Hoàng Sa', 57, 1, ''),
(60, 'Quận Cẩm Lệ', 57, 1, ''),
(61, 'Quận Hải Châu', 57, 1, ''),
(62, 'Quận Liên Chiểu', 57, 1, ''),
(63, 'Quận Ngũ Hành Sơn', 57, 1, ''),
(64, 'Quận Sơn Trà', 57, 1, ''),
(65, 'Quận Thanh Khê', 57, 1, ''),
(66, 'An Gian', 0, 1, ''),
(67, 'Huyện An Phú', 66, 1, ''),
(68, 'Huyện Châu Phú', 66, 1, ''),
(69, 'Huyện Châu Thành', 66, 1, ''),
(70, 'Huyện Chợ Mới', 66, 1, ''),
(71, 'Huyện Thoại Sơn', 66, 1, ''),
(72, 'Huyện Tịnh Biên', 66, 1, ''),
(73, 'Huyện Tri Tôn', 66, 1, ''),
(74, 'Phú Tân', 66, 1, ''),
(75, 'Thành Phố Châu Đốc', 66, 1, ''),
(76, 'Thành phố Long Xuyên', 66, 1, ''),
(77, 'Thị xã Tân Châu', 66, 1, ''),
(78, 'Vũng Tàu', 0, 1, ''),
(79, 'Huyện Châu Đức', 78, 1, ''),
(80, 'Huyện Côn Đảo', 78, 1, ''),
(81, 'Huyện Đất Đỏ', 78, 1, ''),
(82, 'Huyện Long Điền', 78, 1, ''),
(83, 'Huyện Tân Thành', 78, 1, ''),
(84, 'Huyện Xuyên Mộc', 78, 1, ''),
(85, 'Thành phố Vũng Tàu', 78, 1, ''),
(86, 'Thị xã Bà Rịa', 78, 1, ''),
(87, 'Bắc Cạn', 0, 1, ''),
(88, 'Huyện Ba Bể', 87, 1, ''),
(89, 'Huyện Bạch Thông', 87, 1, ''),
(90, 'Huyện Chợ Đồn', 87, 1, ''),
(91, 'Huyện Chợ Mới', 87, 1, ''),
(92, 'Huyện Na Rì', 87, 1, ''),
(93, 'Huyện Ngân Sơn', 87, 1, ''),
(94, 'Huyện Pác Nặm', 87, 1, ''),
(95, 'Thị xã Bắc Kạn', 87, 1, ''),
(96, 'Bắc Giang', 0, 1, ''),
(97, 'Huyện Hiệp Hòa', 96, 1, ''),
(98, 'Huyện Lạng Giang', 96, 1, ''),
(99, 'Huyện Lục Nam', 96, 1, ''),
(100, 'Huyện Lục Ngạn', 96, 1, ''),
(101, 'Huyện Sơn Động', 96, 1, ''),
(102, 'Huyện Tân Yên', 96, 1, ''),
(103, 'Huyện Việt Yên', 96, 1, ''),
(104, 'Huyện Yên Dũng', 96, 1, ''),
(105, 'Huyện Yên Thế', 96, 1, ''),
(106, 'Thành phố Bắc Giang', 96, 1, ''),
(107, 'Bạc Liêu', 0, 1, ''),
(108, 'Huyện Đông Hải', 107, 1, ''),
(109, 'Huyện Giá Rai', 107, 1, ''),
(110, 'Huyện Hoà Bình', 107, 1, ''),
(111, 'Huyện Hồng Dân', 107, 1, ''),
(112, 'Huyện Phước Long', 107, 1, ''),
(113, 'Huyện Vĩnh Lợi', 107, 1, ''),
(114, 'Thành phố Bạc Liêu', 107, 1, ''),
(115, 'Bắc Ninh', 0, 1, ''),
(116, 'Huyện Gia Bình', 115, 1, ''),
(117, 'Huyện Lương Tài', 115, 1, ''),
(118, 'Huyện Quế Võ', 115, 1, ''),
(119, 'Huyện Thuận Thành', 115, 1, ''),
(120, 'Huyện Tiên Du', 115, 1, ''),
(121, 'Huyện Yên Phong', 115, 1, ''),
(122, 'Thành phố Bắc Ninh', 115, 1, ''),
(123, 'Thị xã Từ Sơn', 115, 1, ''),
(124, 'Bến Tre', 0, 1, ''),
(125, 'Huyện Ba Tri', 124, 1, ''),
(126, 'Huyện Bình Đại', 124, 1, ''),
(127, 'Huyện Châu Thành', 124, 1, ''),
(128, 'Huyện Chợ Lách', 124, 1, ''),
(129, 'Huyện Giồng Trôm', 124, 1, ''),
(130, 'Huyện Mỏ Cày Bắc', 124, 1, ''),
(131, 'Huyện Mỏ Cày Nam', 124, 1, ''),
(132, 'Huyện Thạnh Phú', 124, 1, ''),
(133, 'Thành phố Bến Tre', 124, 1, ''),
(134, 'Bình Định', 0, 1, ''),
(135, 'Huyện An Lão', 134, 1, ''),
(136, 'Huyện An Nhơn', 134, 1, ''),
(137, 'Huyện Hoài Ân', 134, 1, ''),
(138, 'Huyện Hoài Nhơn', 134, 1, ''),
(139, 'Huyện Phù Cát', 134, 1, ''),
(140, 'Huyện Phù Mỹ', 134, 1, ''),
(141, 'Huyện Tây Sơn', 134, 1, ''),
(142, 'Huyện Tuy Phước', 134, 1, ''),
(143, 'Huyện Vân Canh', 134, 1, ''),
(144, 'Huyện Vĩnh Thạnh', 134, 1, ''),
(145, 'Thành phố Qui Nhơn', 134, 1, ''),
(146, 'Bình Dương', 0, 1, ''),
(147, 'Huyện Bắc Tân Uyên', 146, 1, ''),
(148, 'Huyện Bàu Bàng', 146, 1, ''),
(149, 'Huyện Dầu Tiếng', 146, 1, ''),
(150, 'Huyện Phú Giáo', 146, 1, ''),
(151, 'Thành phố Thủ Dầu Một', 146, 1, ''),
(152, 'Thị xã Bến Cát', 146, 1, ''),
(153, 'Thị xã Dĩ An', 146, 1, ''),
(154, 'Thị xã Tân Uyên', 146, 1, ''),
(155, 'Thị xã Thuận An', 146, 1, ''),
(156, 'Bình Phước', 0, 1, ''),
(157, 'Huyện Bù Đăng', 156, 1, ''),
(158, 'Huyện Bù Đốp', 156, 1, ''),
(159, 'Huyện Bù Gia Mập', 156, 1, ''),
(160, 'Huyện Chơn Thành', 156, 1, ''),
(161, 'Huyện Đồng Phú', 156, 1, ''),
(162, 'Huyện Hớn Quản', 156, 1, ''),
(163, 'Huyện Lộc Ninh', 156, 1, ''),
(164, 'Huyện Phú Riềng', 156, 1, ''),
(165, 'Thị xã Bình Long', 156, 1, ''),
(166, 'Thị xã Đồng Xoài', 156, 1, ''),
(167, 'Thị xã Phước Long', 156, 1, ''),
(168, 'Bình Thuận', 0, 1, ''),
(169, 'Huyện Bắc Bình', 168, 1, ''),
(170, 'Huyện Đức Linh', 168, 1, ''),
(171, 'Huyện Hàm Tân', 168, 1, ''),
(172, 'Huyện Hàm Thuận Bắc', 168, 1, ''),
(173, 'Huyện Hàm Thuận Nam', 168, 1, ''),
(174, 'Huyện Tánh Linh', 168, 1, ''),
(175, 'Huyện Tuy Phong', 168, 1, ''),
(176, 'Huyện đảo Phú Quý', 168, 1, ''),
(177, 'Thành phố Phan Thiết', 168, 1, ''),
(178, 'Thị xã La Gi', 168, 1, ''),
(179, 'Cà Mau', 0, 1, ''),
(180, 'Huyện Cái Nước', 179, 1, ''),
(181, 'Huyện Đầm Dơi', 179, 1, ''),
(182, 'Huyện Năm Căn', 179, 1, ''),
(183, 'Huyện Ngọc Hiển', 179, 1, ''),
(184, 'Huyện Phú Tân', 179, 1, ''),
(185, 'Huyện Thới Bình', 179, 1, ''),
(186, 'Huyện Trần Văn Thời', 179, 1, ''),
(187, 'Huyện U Minh', 179, 1, ''),
(188, 'Thành phố Cà Mau', 179, 1, ''),
(189, 'Cần Thơ', 0, 1, ''),
(190, 'Huyện Cờ Đỏ', 189, 1, ''),
(191, 'Huyện Phong Điền', 189, 1, ''),
(192, 'Huyện Thới Lai', 189, 1, ''),
(193, 'Huyện Vĩnh Thạnh', 189, 1, ''),
(194, 'Quận Bình Thủy', 189, 1, ''),
(195, 'Quận Cái Răng', 189, 1, ''),
(196, 'Quận Ninh Kiều', 189, 1, ''),
(197, 'Quận Ô Môn', 189, 1, ''),
(198, 'Quận Thốt Nốt', 189, 1, ''),
(199, 'Cao Bằng', 0, 1, ''),
(200, 'Huyện Bảo Lạc', 199, 1, ''),
(201, 'Huyện Bảo Lâm', 199, 1, ''),
(202, 'Huyện Hạ Lang', 199, 1, ''),
(203, 'Huyện Hà Quảng', 199, 1, ''),
(204, 'Huyện Hòa An', 199, 1, ''),
(205, 'Huyện Nguyên Bình', 199, 1, ''),
(206, 'Huyện Phục Hòa', 199, 1, ''),
(207, 'Huyện Quảng Uyên', 199, 1, ''),
(208, 'Huyện Thạch An', 199, 1, ''),
(209, 'Huyện Thông Nông', 199, 1, ''),
(210, 'Huyện Trà Lĩnh', 199, 1, ''),
(211, 'Huyện Trùng Khánh', 199, 1, ''),
(212, 'Thị xã Cao Bằng', 199, 1, ''),
(213, 'Đắc Lắc', 0, 1, ''),
(214, 'Huyện Buôn Đôn', 213, 1, ''),
(215, 'Huyện Cư Kuin', 213, 1, ''),
(216, 'Huyện Cư Mgar', 213, 1, ''),
(218, 'Huyện Ea Kar', 213, 1, ''),
(219, 'Huyện Ea Súp', 213, 1, ''),
(220, 'Huyện Krông Ana', 213, 1, ''),
(221, 'Huyện Krông Bông', 213, 1, ''),
(222, 'Huyện Krông Búk', 213, 1, ''),
(223, 'Huyện Krông Năng', 213, 1, ''),
(224, 'Huyện Krông Pắk', 213, 1, ''),
(225, 'Huyện Lăk', 213, 1, ''),
(227, 'Thành phố Buôn Ma Thuột', 213, 1, ''),
(228, 'Thị xã Buôn Hồ', 213, 1, ''),
(229, 'Đắc Nông', 0, 1, ''),
(230, 'Huyện Cư Jút', 229, 1, ''),
(231, 'Huyện Đăk Glong', 229, 1, ''),
(232, 'Huyện Đăk Mil', 229, 1, ''),
(234, 'Huyện Đăk Song', 229, 1, ''),
(235, 'Huyện Krông Nô', 229, 1, ''),
(236, 'Huyện Tuy Đức', 229, 1, ''),
(237, 'Thị xã Gia Nghĩa', 229, 1, ''),
(238, 'Điện Biên', 0, 1, ''),
(239, 'Huyện Điện Biên', 238, 1, ''),
(240, 'Huyện Điện Biên Đông', 238, 1, ''),
(241, 'Huyện Mường Ảng', 238, 1, ''),
(242, 'Huyện Mường Chà', 238, 1, ''),
(243, 'Huyện Mường Nhé', 238, 1, ''),
(244, 'Huyện Nậm Pồ', 238, 1, ''),
(245, 'Huyện Tủa Chùa', 238, 1, ''),
(246, 'Huyện Tuần Giáo', 238, 1, ''),
(247, 'Thành phố Điện Biên Phủ', 238, 1, ''),
(248, 'Thị xã Mường Lay', 238, 1, ''),
(249, 'Đồng Nai', 0, 1, ''),
(250, 'Huyện Cẩm Mỹ', 249, 1, ''),
(251, 'Huyện Định Quán', 249, 1, ''),
(252, 'Huyện Long Thành', 249, 1, ''),
(253, 'Huyện Nhơn Trạch', 249, 1, ''),
(254, 'Huyện Tân Phú', 249, 1, ''),
(255, 'Huyện Thống Nhất', 249, 1, ''),
(256, 'Huyện Trảng Bom', 249, 1, ''),
(257, 'Huyện Vĩnh Cửu', 249, 1, ''),
(258, 'Huyện Xuân Lộc', 249, 1, ''),
(259, 'Thành phố Biên Hòa', 249, 1, ''),
(260, 'Thị xã Long Khánh', 249, 1, ''),
(261, 'Đồng Tháp', 0, 1, ''),
(262, 'Huyện Cao Lãnh', 261, 1, ''),
(263, 'Huyện Châu Thành', 261, 1, ''),
(264, 'Huyện Hồng Ngự', 261, 1, ''),
(265, 'Huyện Lai Vung', 261, 1, ''),
(266, 'Huyện Lấp Vò', 261, 1, ''),
(267, 'Huyện Tam Nông', 261, 1, ''),
(268, 'Huyện Tân Hồng', 261, 1, ''),
(269, 'Huyện Thanh Bình', 261, 1, ''),
(270, 'Huyện Tháp Mười', 261, 1, ''),
(271, 'Thành phố Cao Lãnh', 261, 1, ''),
(272, 'Thị xã Hồng Ngự', 261, 1, ''),
(273, 'Thị xã Sa Đéc', 261, 1, ''),
(274, 'Gia Lai', 0, 1, ''),
(275, 'Huyện Chư Păh', 274, 1, ''),
(276, 'Huyện Chư Prông', 274, 1, ''),
(277, 'Huyện Chư Pưh', 274, 1, ''),
(278, 'Huyện Chư Sê', 274, 1, ''),
(279, 'Huyện Đăk Đoa', 274, 1, ''),
(280, 'Huyện Đắk Pơ', 274, 1, ''),
(281, 'Huyện Đức Cơ', 274, 1, ''),
(282, 'Huyện Ia Grai', 274, 1, ''),
(283, 'Huyện Ia Pa', 274, 1, ''),
(284, 'Huyện Kbang', 274, 1, ''),
(285, 'Huyện Kông Chro', 274, 1, ''),
(286, 'Huyện Krông Pa', 274, 1, ''),
(287, 'Huyện Mang Yang', 274, 1, ''),
(288, 'Huyện Phú Thiện', 274, 1, ''),
(289, 'Thành phố Pleiku', 274, 1, ''),
(290, 'Thị xã An Khê', 274, 1, ''),
(291, 'Thị xã Ayun Pa', 274, 1, ''),
(292, 'Hà Giang', 0, 1, ''),
(293, 'Huyện Bắc Mê', 292, 1, ''),
(294, 'Huyện Bắc Quang', 292, 1, ''),
(295, 'Huyện Đồng Văn', 292, 1, ''),
(296, 'Huyện Hoàng Su Phì', 292, 1, ''),
(297, 'Huyện Mèo Vạc', 292, 1, ''),
(298, 'Huyện Quản Bạ', 292, 1, ''),
(299, 'Huyện Quang Bình', 292, 1, ''),
(300, 'Huyện Vị Xuyên', 292, 1, ''),
(301, 'Huyện Xín Mần', 292, 1, ''),
(302, 'Huyện Yên Minh', 292, 1, ''),
(303, 'Thành phố Hà Giang', 292, 1, ''),
(304, 'Hà Nam', 0, 1, ''),
(305, 'Huyện Bình Lục', 304, 1, ''),
(306, 'Huyện Duy Tiên', 304, 1, ''),
(307, 'Huyện Kim Bảng', 304, 1, ''),
(308, 'Huyện Lý Nhân', 304, 1, ''),
(309, 'Huyện Thanh Liêm', 304, 1, ''),
(310, 'Thành phố Phủ Lý', 304, 1, ''),
(311, 'Hà Tĩnh', 0, 1, ''),
(312, 'Huyện Cẩm Xuyên', 311, 1, ''),
(313, 'Huyện Can Lộc', 311, 1, ''),
(314, 'Huyện Đức Thọ', 311, 1, ''),
(315, 'Huyện Hương Khê', 311, 1, ''),
(316, 'Huyện Hương Sơn', 311, 1, ''),
(317, 'Huyện Kỳ Anh', 311, 1, ''),
(318, 'Huyện Lộc Hà', 311, 1, ''),
(319, 'Huyện Nghi Xuân', 311, 1, ''),
(320, 'Huyện Thạch Hà', 311, 1, ''),
(321, 'Huyện Vũ Quang', 311, 1, ''),
(322, 'Thành phố Hà Tĩnh', 311, 1, ''),
(323, 'Thị xã Hồng Lĩnh', 311, 1, ''),
(324, 'Thị xã Kỳ Anh', 311, 1, ''),
(325, 'Hải Dương', 0, 1, ''),
(326, 'Huyện Bình Giang', 325, 1, ''),
(327, 'Huyện Cẩm Giàng', 325, 1, ''),
(328, 'Huyện Gia Lộc', 325, 1, ''),
(329, 'Huyện Kim Thành', 325, 1, ''),
(330, 'Huyện Kinh Môn', 325, 1, ''),
(331, 'Huyện Nam Sách', 325, 1, ''),
(332, 'Huyện Ninh Giang', 325, 1, ''),
(333, 'Huyện Thanh Hà', 325, 1, ''),
(334, 'Huyện Thanh Miện', 325, 1, ''),
(335, 'Huyện Tứ Kỳ', 325, 1, ''),
(336, 'Thành phố Hải Dương', 325, 1, ''),
(337, 'Thị xã Chí Linh', 325, 1, ''),
(338, 'Hải Phòng', 0, 1, ''),
(339, 'Huyện An Dương', 338, 1, ''),
(340, 'Huyện An Lão', 338, 1, ''),
(341, 'Huyện Kiến Thụy', 338, 1, ''),
(342, 'Huyện Thuỷ Nguyên', 338, 1, ''),
(343, 'Huyện Tiên Lãng', 338, 1, ''),
(344, 'Huyện Vĩnh Bảo', 338, 1, ''),
(345, 'Huyện đảo Bạch Long Vĩ', 338, 1, ''),
(346, 'Huyện đảo Cát Hải', 338, 1, ''),
(347, 'Quận Đồ Sơn', 338, 1, ''),
(348, 'Quận Dương Kinh', 338, 1, ''),
(349, 'Quận Hải An', 338, 1, ''),
(350, 'Quận Hồng Bàng', 338, 1, ''),
(351, 'Quận Kiến An', 338, 1, ''),
(352, 'Quận Lê Chân', 338, 1, ''),
(353, 'Quận Ngô Quyền', 338, 1, ''),
(354, 'Hậu Giang', 0, 1, ''),
(355, 'Huyện Châu Thành', 354, 1, ''),
(356, 'Huyện Châu Thành A', 354, 1, ''),
(357, 'Huyện Long Mỹ', 354, 1, ''),
(358, 'Huyện Phụng Hiệp', 354, 1, ''),
(359, 'Huyện Vị Thủy', 354, 1, ''),
(360, 'Thành phố Vị Thanh', 354, 1, ''),
(361, 'Thị xã Long Mỹ', 354, 1, ''),
(362, 'Thị xã Ngã Bảy', 354, 1, ''),
(363, 'HòaBình', 0, 1, ''),
(364, 'Huyện Cao Phong', 363, 1, ''),
(365, 'Huyện Đà Bắc', 363, 1, ''),
(366, 'Huyện Kim Bôi', 363, 1, ''),
(367, 'Huyện Kỳ Sơn', 363, 1, ''),
(368, 'Huyện Lạc Sơn', 363, 1, ''),
(369, 'Huyện Lạc Thủy', 363, 1, ''),
(370, 'Huyện Lương Sơn', 363, 1, ''),
(371, 'Huyện Mai Châu', 363, 1, ''),
(372, 'Huyện Tân Lạc', 363, 1, ''),
(373, 'Huyện Yên Thủy', 363, 1, ''),
(374, 'Thành phố Hoà Bình', 363, 1, ''),
(375, 'Hưng Yên', 0, 1, ''),
(376, 'Huyện Ân Thi', 375, 1, ''),
(377, 'Huyện Khoái Châu', 375, 1, ''),
(378, 'Huyện Kim Động', 375, 1, ''),
(379, 'Huyện Mỹ Hào', 375, 1, ''),
(380, 'Huyện Phù Cừ', 375, 1, ''),
(381, 'Huyện Tiên Lữ', 375, 1, ''),
(382, 'Huyện Văn Giang', 375, 1, ''),
(383, 'Huyện Văn Lâm', 375, 1, ''),
(384, 'Huyện Yên Mỹ', 375, 1, ''),
(385, 'Thành phố Hưng Yên', 375, 1, ''),
(386, 'Khánh Hòa', 0, 1, ''),
(387, 'Huyện Cam Lâm', 386, 1, ''),
(388, 'Huyện Diên Khánh', 386, 1, ''),
(389, 'Huyện Khánh Sơn', 386, 1, ''),
(390, 'Huyện Khánh Vĩnh', 386, 1, ''),
(391, 'Huyện Vạn Ninh', 386, 1, ''),
(392, 'Huyện đảo Trường Sa', 386, 1, ''),
(393, 'Thành phố Cam Ranh', 386, 1, ''),
(394, ' Nha Trang', 386, 1, ''),
(395, 'Thị xã Ninh Hòa', 386, 1, ''),
(396, 'Kiên Giang', 0, 1, ''),
(397, 'Huyện An Biên', 396, 1, ''),
(398, 'Huyện An Minh', 396, 1, ''),
(399, 'Huyện Châu Thành', 396, 1, ''),
(400, 'Huyện Giang Thành', 396, 1, ''),
(401, 'Huyện Giồng Riềng', 396, 1, ''),
(402, 'Huyện Gò Quao', 396, 1, ''),
(403, 'Huyện Hòn Đất', 396, 1, ''),
(404, 'Huyện Kiên Lương', 396, 1, ''),
(405, 'Huyện Tân Hiệp', 396, 1, ''),
(406, 'Huyện U Minh Thượng', 396, 1, ''),
(407, 'Huyện Vĩnh Thuận', 396, 1, ''),
(408, 'Huyện đảo Kiên Hải', 396, 1, ''),
(409, 'Huyện đảo Phú Quốc', 396, 1, ''),
(410, 'Thành phố Rạch Giá', 396, 1, ''),
(411, 'Thị xã Hà Tiên', 396, 1, ''),
(412, 'Kom Tum', 0, 1, ''),
(413, 'Huyện Đắk Glei', 412, 1, ''),
(414, 'Huyện Đắk Hà', 412, 1, ''),
(415, 'Huyện Đăk Tô', 412, 1, ''),
(417, 'Huyện Kon Plông', 412, 1, ''),
(418, 'Huyện Kon Rẫy', 412, 1, ''),
(419, 'Huyện Ngọc Hồi', 412, 1, ''),
(420, 'Huyện Sa Thầy', 412, 1, ''),
(421, 'Huyện Tu Mơ Rông', 412, 1, ''),
(422, 'Thành phố Kon Tum', 412, 1, ''),
(423, 'Lai Châu', 0, 1, ''),
(424, 'Huyện Mường Tè', 423, 1, ''),
(425, 'Huyện Nậm Nhùn', 423, 1, ''),
(426, 'Huyện Phong Thổ', 423, 1, ''),
(427, 'Huyện Sìn Hồ', 423, 1, ''),
(428, 'Huyện Tam Đường', 423, 1, ''),
(429, 'Huyện Tân Uyên', 423, 1, ''),
(430, 'Huyện Than Uyên', 423, 1, ''),
(431, 'Thị xã Lai Châu', 423, 1, ''),
(432, 'Lâm Đồng', 0, 1, ''),
(433, 'Huyện Bảo Lâm', 432, 1, ''),
(434, 'Huyện Cát Tiên', 432, 1, ''),
(435, 'Huyện Đạ Huoai', 432, 1, ''),
(436, 'Huyện Đạ Tẻh', 432, 1, ''),
(437, 'Huyện Đam Rông', 432, 1, ''),
(438, 'Huyện Di Linh', 432, 1, ''),
(439, 'Huyện Đức Trọng', 432, 1, ''),
(440, 'Huyện Lạc Dương', 432, 1, ''),
(441, 'Huyện Lâm Hà', 432, 1, ''),
(442, 'Thành phố Bảo Lộc', 432, 1, ''),
(443, 'Thành phố Đà Lạt', 432, 1, ''),
(444, 'Huyện Đơn Dương', 432, 1, ''),
(445, 'Lạng Sơn', 0, 1, ''),
(446, 'Huyện Bắc Sơn', 445, 1, ''),
(447, 'Huyện Bình Gia', 445, 1, ''),
(448, 'Huyện Cao Lộc', 445, 1, ''),
(449, 'Huyện Chi Lăng', 445, 1, ''),
(450, 'Huyện Đình Lập', 445, 1, ''),
(451, 'Huyện Hữu Lũng', 445, 1, ''),
(452, 'Huyện Lộc Bình', 445, 1, ''),
(453, 'Huyện Văn Lãng', 445, 1, ''),
(454, 'Huyện Văn Quan', 445, 1, ''),
(455, 'Thành phố Lạng Sơn', 445, 1, ''),
(456, 'Huyện Tràng Định', 445, 1, ''),
(457, 'Lào Cai', 0, 1, ''),
(458, 'Huyện Bắc Hà', 457, 1, ''),
(459, 'Huyện Bảo Thắng', 457, 1, ''),
(460, 'Huyện Bảo Yên', 457, 1, ''),
(461, 'Huyện Bát Xát', 457, 1, ''),
(462, 'Huyện Mường Khương', 457, 1, ''),
(463, 'Huyện Sa Pa', 457, 1, ''),
(464, 'Huyện Si Ma Cai', 457, 1, ''),
(465, 'Huyện Văn Bàn', 457, 1, ''),
(466, 'Thành phố Lào Cai', 457, 1, ''),
(467, 'Long An', 0, 1, ''),
(468, 'Huyện Bến Lức', 467, 1, ''),
(469, 'Huyện Cần Đước', 467, 1, ''),
(470, 'Huyện Cần Giuộc', 467, 1, ''),
(471, 'Huyện Châu Thành', 467, 1, ''),
(472, 'Huyện Đức Hòa', 467, 1, ''),
(473, 'Huyện Đức Huệ', 467, 1, ''),
(474, 'Huyện Mộc Hóa', 467, 1, ''),
(475, 'Huyện Tân Hưng', 467, 1, ''),
(476, 'Huyện Tân Thạnh', 467, 1, ''),
(477, 'Huyện Tân Trụ', 467, 1, ''),
(478, 'Huyện Thạnh Hóa', 467, 1, ''),
(479, 'Huyện Thủ Thừa', 467, 1, ''),
(480, 'Huyện Vĩnh Hưng', 467, 1, ''),
(481, 'Thành phố Tân An', 467, 1, ''),
(482, 'Thị xã Kiến Tường', 467, 1, ''),
(483, 'Nam Định', 0, 1, ''),
(484, 'Huyện Giao Thủy', 483, 1, ''),
(485, 'Huyện Hải Hậu', 483, 1, ''),
(486, 'Huyện Mỹ Lộc', 483, 1, ''),
(487, 'Huyện Nam Trực', 483, 1, ''),
(488, 'Huyện Nghĩa Hưng', 483, 1, ''),
(489, 'Huyện Trực Ninh', 483, 1, ''),
(490, 'Huyện Vụ Bản', 483, 1, ''),
(491, 'Huyện Xuân Trường', 483, 1, ''),
(492, 'Huyện Ý Yên', 483, 1, ''),
(493, 'Thành phố Nam Định', 483, 1, ''),
(494, 'Nghệ An', 0, 1, ''),
(495, 'Huyện Anh Sơn', 494, 1, ''),
(496, 'Huyện Con Cuông', 494, 1, ''),
(497, 'Huyện Diễn Châu', 494, 1, ''),
(498, 'Huyện Đô Lương', 494, 1, ''),
(499, 'Huyện Hưng Nguyên', 494, 1, ''),
(500, 'Huyện Kỳ Sơn', 494, 1, ''),
(501, 'Huyện Nam Đàn', 494, 1, ''),
(502, 'Huyện Nghi Lộc', 494, 1, ''),
(503, 'Huyện Nghĩa Đàn', 494, 1, ''),
(504, 'Huyện Quế Phong', 494, 1, ''),
(505, 'Huyện Quỳ Châu', 494, 1, ''),
(506, 'Huyện Quỳ Hợp', 494, 1, ''),
(507, 'Huyện Quỳnh Lưu', 494, 1, ''),
(508, 'Huyện Tân Kỳ', 494, 1, ''),
(509, 'Huyện Thanh Chương', 494, 1, ''),
(510, 'Huyện Tương Dương', 494, 1, ''),
(511, 'Huyện Yên Thành', 494, 1, ''),
(512, 'Thành phố Vinh', 494, 1, ''),
(513, 'Thị xã Cửa Lò', 494, 1, ''),
(514, 'Thị xã Hoàng Mai', 494, 1, ''),
(515, 'Thị xã Thái Hòa', 494, 1, ''),
(516, 'Ninh Bình', 0, 1, ''),
(517, 'Huyện Gia Viễn', 516, 1, ''),
(518, 'Huyện Hoa Lư', 516, 1, ''),
(519, 'Huyện Kim Sơn', 516, 1, ''),
(520, 'Huyện Nho Quan', 516, 1, ''),
(521, 'Huyện Yên Khánh', 516, 1, ''),
(522, 'Huyện Yên Mô', 516, 1, ''),
(523, 'Thành phố Ninh Bình', 516, 1, ''),
(524, 'Thị xã Tam Điệp', 516, 1, ''),
(525, 'Ninh Thuận', 0, 1, ''),
(526, 'Huyện Bác Ái', 525, 1, ''),
(527, 'Huyện Ninh Hải', 525, 1, ''),
(528, 'Huyện Ninh Phước', 525, 1, ''),
(529, 'Huyện Ninh Sơn', 525, 1, ''),
(530, 'Huyện Thuận Bắc', 525, 1, ''),
(531, 'Huyện Thuận Nam', 525, 1, ''),
(532, 'Thành phố Phan Rang-Tháp Chàm', 525, 1, ''),
(533, 'Phú Thọ', 0, 1, ''),
(534, 'Huyện Cẩm Khê', 533, 1, ''),
(535, 'Huyện Đoan Hùng', 533, 1, ''),
(536, 'Huyện Hạ Hòa', 533, 1, ''),
(537, 'Huyện Lâm Thao', 533, 1, ''),
(538, 'Huyện Phù Ninh', 533, 1, ''),
(539, 'Huyện Tam Nông', 533, 1, ''),
(540, 'Huyện Tân Sơn', 533, 1, ''),
(541, 'Huyện Thanh Ba', 533, 1, ''),
(542, 'Huyện Thanh Sơn', 533, 1, ''),
(543, 'Huyện Thanh Thủy', 533, 1, ''),
(544, 'Huyện Yên Lập', 533, 1, ''),
(545, 'Thành phố Việt Trì', 533, 1, ''),
(546, 'Thị xã Phú Thọ', 533, 1, ''),
(547, 'Phú Yên', 0, 1, ''),
(548, 'Huyện Đông Hòa', 547, 1, ''),
(549, 'Huyện Đồng Xuân', 547, 1, ''),
(550, 'Huyện Phú Hòa', 547, 1, ''),
(551, 'Huyện Sơn Hòa', 547, 1, ''),
(552, 'Huyện Sông Hin', 547, 1, ''),
(553, 'Huyện Tây Hòa', 547, 1, ''),
(554, 'Huyện Tuy An', 547, 1, ''),
(555, 'Thành phố Tuy Hòa', 547, 1, ''),
(556, 'Thị xã Sông Cầu', 547, 1, ''),
(557, 'Quảng Bình', 0, 1, ''),
(558, 'Huyện Bố Trạch', 557, 1, ''),
(559, 'Huyện Lệ Thủy', 557, 1, ''),
(560, 'Huyện Minh Hóa', 557, 1, ''),
(561, 'Huyện Quảng Ninh', 557, 1, ''),
(562, 'Huyện Quảng Trạch', 557, 1, ''),
(563, 'Huyện Tuyên Hóa', 557, 1, ''),
(564, 'Thành phố Đồng Hới', 557, 1, ''),
(565, 'Thị xã Ba Đồn', 557, 1, ''),
(566, 'Quảng Nam', 0, 1, ''),
(567, 'Huyện Bắc Trà My', 566, 1, ''),
(568, 'Huyện Đại Lộc', 566, 1, ''),
(569, 'Huyện Điện Bàn', 566, 1, ''),
(570, 'Huyện Đông Giang', 566, 1, ''),
(571, 'Huyện Duy Xuyên', 566, 1, ''),
(572, 'Huyện Hiệp Đức', 566, 1, ''),
(573, 'Huyện Nam Giang', 566, 1, ''),
(574, 'Huyện Nam Trà My', 566, 1, ''),
(575, 'Huyện Nông Sơn', 566, 1, ''),
(576, 'Huyện Núi Thành', 566, 1, ''),
(577, 'Huyện Phú Ninh', 566, 1, ''),
(578, 'Huyện Phước Sơn', 566, 1, ''),
(579, 'Huyện Quế Sơn', 566, 1, ''),
(580, 'Huyện Tây Giang', 566, 1, ''),
(581, 'Huyện Thăng Bình', 566, 1, ''),
(582, 'Huyện Tiên Phước', 566, 1, ''),
(583, 'Thành phố Hội An', 566, 1, ''),
(584, 'Thành phố Tam Kỳ', 566, 1, ''),
(585, 'Quảng Nam', 0, 1, ''),
(586, 'Huyện Bắc Trà My', 585, 1, ''),
(587, 'Huyện Đại Lộc', 585, 1, ''),
(588, 'Huyện Điện Bàn', 585, 1, ''),
(589, 'Huyện Đông Giang', 585, 1, ''),
(590, 'Huyện Duy Xuyên', 585, 1, ''),
(591, 'Huyện Hiệp Đức', 585, 1, ''),
(592, 'Huyện Nam Giang', 585, 1, ''),
(593, 'Huyện Nam Trà My', 585, 1, ''),
(594, 'Huyện Nông Sơn', 585, 1, ''),
(595, 'Huyện Núi Thành', 585, 1, ''),
(596, 'Huyện Phú Ninh', 585, 1, ''),
(597, 'Huyện Phước Sơn', 585, 1, ''),
(598, 'Huyện Quế Sơn', 585, 1, ''),
(599, 'Huyện Tây Giang', 585, 1, ''),
(600, 'Huyện Thăng Bình', 585, 1, ''),
(601, 'Huyện Tiên Phước', 585, 1, ''),
(602, 'Thành phố Hội An', 585, 1, ''),
(603, 'Thành phố Tam Kỳ', 585, 1, ''),
(604, 'Quảng Ninh', 0, 1, ''),
(605, 'Huyện Ba Chẽ', 604, 1, ''),
(606, 'Huyện Bình Liêu', 604, 1, ''),
(607, 'Huyện Đầm Hà', 604, 1, ''),
(608, 'Huyện Đông Triều', 604, 1, ''),
(609, 'Huyện Hải Hà', 604, 1, ''),
(610, 'Huyện Hoành Bồ', 604, 1, ''),
(611, 'Huyện Tiên Yên', 604, 1, ''),
(612, 'Huyện Tư Nghĩa', 604, 1, ''),
(613, 'Huyện Vân Đồn', 604, 1, ''),
(614, 'Huyện Yên Hưng', 604, 1, ''),
(615, 'Huyện đảo Cô Tô', 604, 1, ''),
(616, 'Thành phố Cẩm Phả', 604, 1, ''),
(617, 'Thành phố Hạ Long', 604, 1, ''),
(618, 'Thành phố Móng Cái', 604, 1, ''),
(619, 'Thành phố Uông Bí', 604, 1, ''),
(620, 'Thị Xã Quảng Yên', 604, 1, ''),
(621, 'Quảng Trị', 0, 1, ''),
(622, 'Huyện Cam Lộ', 621, 1, ''),
(623, 'Huyện Đa Krông', 621, 1, ''),
(624, 'Huyện Gio Linh', 621, 1, ''),
(625, 'Huyện Hải Lăng', 621, 1, ''),
(626, 'Huyện Hướng Hóa', 621, 1, ''),
(627, 'Huyện Triệu Phong', 621, 1, ''),
(628, 'Huyện Vĩnh Linh', 621, 1, ''),
(629, 'Huyện đảo Cồn Cỏ', 621, 1, ''),
(630, 'Thành phố Đông Hà', 621, 1, ''),
(631, 'Thị xã Quảng Trị', 621, 1, ''),
(632, 'Sóc Trăng', 0, 1, ''),
(633, 'Huyện Châu Thành', 632, 1, ''),
(634, 'Huyện Cù Lao Dung', 632, 1, ''),
(635, 'Huyện Kế Sách', 632, 1, ''),
(636, 'uyện Long Phú', 632, 1, ''),
(637, 'Huyện Mỹ Tú', 632, 1, ''),
(638, 'Huyện Mỹ Xuyên', 632, 1, ''),
(639, 'Huyện Ngã Năm', 632, 1, ''),
(640, 'Huyện Thạnh Trị', 632, 1, ''),
(641, 'Huyện Trần Đề', 632, 1, ''),
(642, 'Huyện Vĩnh Châu', 632, 1, ''),
(643, 'Thành phố Sóc Trăng', 632, 1, ''),
(644, 'Sơn La', 0, 1, ''),
(645, 'Huyện Bắc Yên', 644, 1, ''),
(646, 'Huyện Mai Sơn', 644, 1, ''),
(647, 'Huyện Mộc Châu', 644, 1, ''),
(648, 'Huyện Mường La', 644, 1, ''),
(649, 'Huyện Phù Yên', 644, 1, ''),
(650, 'Huyện Quỳnh Nhai', 644, 1, ''),
(651, 'Huyện Sông Mã', 644, 1, ''),
(652, 'Huyện Sốp Cộp', 644, 1, ''),
(653, 'Huyện Thuận Châu', 644, 1, ''),
(654, 'Huyện Vân Hồ', 644, 1, ''),
(655, 'Huyện Yên Châu', 644, 1, ''),
(656, 'Thành phố Sơn La', 644, 1, ''),
(657, 'Tây Ninh', 0, 1, ''),
(658, 'Huyện Bến Cầu', 657, 1, ''),
(659, 'Huyện Châu Thành', 657, 1, ''),
(660, 'Huyện Dương Minh Châu', 657, 1, ''),
(661, 'Huyện Gò Dầu', 657, 1, ''),
(662, 'Huyện Hòa Thành', 657, 1, ''),
(663, 'Huyện Tân Biên', 657, 1, ''),
(664, 'Huyện Tân Châu', 657, 1, ''),
(665, 'Huyện Trảng Bàng', 657, 1, ''),
(666, 'Thị xã Tây Ninh', 657, 1, ''),
(667, 'Thái Bình', 0, 1, ''),
(668, 'Huyện Đông Hưng', 667, 1, ''),
(669, 'Huyện Hưng Hà', 667, 1, ''),
(670, 'Huyện Kiến Xương', 667, 1, ''),
(671, 'Huyện Quỳnh Phụ', 667, 1, ''),
(672, 'Huyện Thái Thụy', 667, 1, ''),
(673, 'Huyện Tiền Hải', 667, 1, ''),
(674, 'Huyện Vũ Thư', 667, 1, ''),
(675, 'Thành phố Thái Bình', 667, 1, ''),
(676, 'Thái Nguyên', 0, 1, ''),
(677, 'Huyện Đại Từ', 676, 1, ''),
(678, 'Huyện Định Hóa', 676, 1, ''),
(679, 'Huyện Đồng Hỷ', 676, 1, ''),
(680, 'Huyện Phổ Yên', 676, 1, ''),
(681, 'Huyện Phú Bình', 676, 1, ''),
(682, 'Huyện Phú Lương', 676, 1, ''),
(683, 'Huyện Võ Nhai', 676, 1, ''),
(684, 'Thành phố Thái Nguyên', 676, 1, ''),
(685, 'Thị xã Sông Công', 676, 1, ''),
(686, 'Thanh Hóa', 0, 1, ''),
(687, 'Huyện Bá Thước', 686, 1, ''),
(688, 'Huyện Cẩm Thủy', 686, 1, ''),
(689, 'Huyện Đông Sơn', 686, 1, ''),
(690, 'Huyện Hà Trung', 686, 1, ''),
(691, 'Huyện Hậu Lộc', 686, 1, ''),
(692, 'Huyện Hoằng Hóa', 686, 1, ''),
(693, 'Huyện Lang Chánh', 686, 1, ''),
(694, 'Huyện Mường Lát', 686, 1, ''),
(695, 'Huyện Nga Sơn', 686, 1, ''),
(696, 'Huyện Ngọc Lặc', 686, 1, ''),
(697, 'Huyện Như Thanh', 686, 1, ''),
(698, 'Huyện Như Xuân', 686, 1, ''),
(699, 'Huyện Nông Cống', 686, 1, ''),
(700, 'Huyện Quan Hóa', 686, 1, ''),
(701, 'Huyện Quan Sơn', 686, 1, ''),
(702, 'Huyện Quảng Xương', 686, 1, ''),
(703, 'Huyện Thạch Thành', 686, 1, ''),
(704, 'Huyện Thiệu Hóa', 686, 1, ''),
(705, 'Huyện Thọ Xuân', 686, 1, ''),
(706, 'Huyện Thường Xuân', 686, 1, ''),
(707, 'Huyện Tĩnh Gia', 686, 1, ''),
(708, 'Huyện Triệu Sơn', 686, 1, ''),
(709, 'Huyện Vĩnh Lộc', 686, 1, ''),
(710, 'Huyện Yên Định', 686, 1, ''),
(711, 'Thành phố Thanh Hóa', 686, 1, ''),
(712, 'Thị xã Bỉm Sơn', 686, 1, ''),
(713, 'Thị xã Sầm Sơn', 686, 1, ''),
(714, 'Thừa Thiên Huế', 0, 1, ''),
(715, 'Huyện A Lưới', 714, 1, ''),
(716, 'Huyện Nam Đông', 714, 1, ''),
(717, 'Huyện Phong Điền', 714, 1, ''),
(718, 'Huyện Phú Lộc', 714, 1, ''),
(719, 'Huyện Phú Vang', 714, 1, ''),
(720, 'Huyện Quảng Điền', 714, 1, ''),
(721, 'Thành phố Huế', 714, 1, ''),
(722, 'Thị xã Hương Thủy', 714, 1, ''),
(723, 'Thị xã Hương Trà', 714, 1, ''),
(724, 'Tiền Giang', 0, 1, ''),
(725, 'Huyện Cái Bè', 724, 1, ''),
(726, 'Huyện Cai Lậy', 724, 1, ''),
(727, 'Huyện Châu Thành', 724, 1, ''),
(728, 'Huyện Chợ Gạo', 724, 1, ''),
(729, 'Huyện Gò Công Đông', 724, 1, ''),
(730, 'Huyện Gò Công Tây', 724, 1, ''),
(731, 'Huyện Tân Phú Đông', 724, 1, ''),
(732, 'Huyện Tân Phước', 724, 1, ''),
(733, 'Thành phố Mỹ Tho', 724, 1, ''),
(734, 'Thị xã Cai Lậy', 724, 1, ''),
(735, 'Thị xã Gò Công', 724, 1, ''),
(736, 'Trà Vinh', 0, 1, ''),
(737, 'Huyện Càng Long', 736, 1, ''),
(738, 'Huyện Cầu Kè', 736, 1, ''),
(739, 'Huyện Cầu Ngang', 736, 1, ''),
(740, 'Huyện Châu Thành', 736, 1, ''),
(741, 'Huyện Duyên Hải', 736, 1, ''),
(742, 'Huyện Tiểu Cần', 736, 1, ''),
(743, 'Huyện Trà Cú', 736, 1, ''),
(744, 'Thành phố Trà Vinh', 736, 1, ''),
(745, 'Thị xã Duyên Hải', 736, 1, ''),
(746, 'Tuyên Quang', 0, 1, ''),
(747, 'Huyện Chiêm Hóa', 746, 1, ''),
(748, 'Huyện Hàm Yên', 746, 1, ''),
(749, 'Huyện Lâm Bình', 746, 1, ''),
(750, 'Huyện Na Hang', 746, 1, ''),
(751, 'Huyện Sơn Dương', 746, 1, ''),
(752, 'Huyện Yên Sơn', 746, 1, ''),
(753, 'Thành phố Tuyên Quang', 746, 1, ''),
(754, 'Vĩnh Long', 0, 1, ''),
(755, 'Huyện Bình Minh', 754, 1, ''),
(756, 'Huyện Bình Tân', 754, 1, ''),
(757, 'Huyện Long Hồ', 754, 1, ''),
(758, 'Huyện Mang Thít', 754, 1, ''),
(759, 'Huyện Tam Bình', 754, 1, ''),
(760, 'Huyện Trà Ôn', 754, 1, ''),
(761, 'Huyện Vũng Liêm', 754, 1, ''),
(762, 'Thành phố Vĩnh Long', 754, 1, ''),
(763, 'Vĩnh Phúc', 0, 1, ''),
(764, 'Huyện Bình Xuyên', 763, 1, ''),
(765, 'Huyện Lập Thạch', 763, 1, ''),
(766, 'Huyện Sông Lô', 763, 1, ''),
(767, 'Huyện Tam Đảo', 763, 1, ''),
(768, 'Huyện Tam Dương', 763, 1, ''),
(769, 'Huyện Vĩnh Tường', 763, 1, ''),
(770, 'Huyện Yên Lạc', 763, 1, ''),
(771, 'Thành phố Vĩnh Yên', 763, 1, ''),
(772, 'Thị xã Phúc Yên', 763, 1, ''),
(773, 'Yên Bái', 0, 1, ''),
(774, 'Huyện Lục Yên', 773, 1, ''),
(775, 'Huyện Mù Căng Chải', 773, 1, ''),
(776, 'Huyện Trạm Tấu', 773, 1, ''),
(777, 'Huyện Trấn Yên', 773, 1, ''),
(778, 'Huyện Văn Chấn', 773, 1, ''),
(779, 'Huyện Văn Yên', 773, 1, ''),
(780, 'Huyện Yên Bình', 773, 1, ''),
(781, 'Thành phố Yên Bái', 773, 1, ''),
(782, 'Thị xã Nghĩa Lộ', 773, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `parent_id`, `icon`, `group_id`, `stt`) VALUES
('221e03d3-1575-4a05-be07-6fb9c3a5b6ee', 'Về Chúng Tôi', 'about-us.html', '', '', 'MainMenu', 0),
('354e048e-1c85-4f59-8d47-71e5f649e485', 'Liên Hệ', 'lien-he.html', '', '', 'MainMenu', 3),
('61430b46-9eb9-4869-9e53-3942f7d471bc', 'Sản Phẩm', 'sanpham.html', '', '', 'MainMenu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `key_word` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `alias` text COLLATE utf8_unicode_ci NOT NULL,
  `des` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `images`, `content`, `key_word`, `title`, `alias`, `des`) VALUES
('43c3ac05-81b8-4b4d-98e3-6f8ae37fea90', 'Sản Phẩm', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-1188254.jpg', '&lt;p&gt;&amp;aacute;dasd&lt;/p&gt;', '&lt;p&gt;&amp;aacute;dadsa&lt;/p&gt;', 'ádas', 'sanpham', 'ádasd'),
('756509fe-3beb-4372-b6bb-4f0a257413de', 'Liên Hệ', '/Molicha/public/admin/userfiles/files/123.jpg', '<p><strong>3.&nbsp;Gửi email</strong><strong>&nbsp;theo&nbsp;</strong><a href=\"https://help.shopee.vn/vn/s/contactusform\" target=\"_blank\"><strong>hướng dẫn</strong></a><br />\r\n<br />\r\n<strong>4. Gọi điện thoại:&nbsp;</strong><strong>19001221</strong><strong>&nbsp;</strong>(cước ph&iacute; l&agrave; 1.000đ / ph&uacute;t)<br />\r\n<br />\r\n<strong>Lưu &yacute;:</strong>&nbsp;Thời gian nhận được kết quả xử l&yacute;<br />\r\n- Ngay lập tức: d&agrave;nh cho những y&ecirc;u cầu về tư vấn v&agrave; giải đ&aacute;p th&ocirc;ng tin<br />\r\n- Từ 1-2 ng&agrave;y l&agrave;m việc: d&agrave;nh cho những y&ecirc;u cầu hỗ trợ cần c&aacute;c bộ phận li&ecirc;n quan xử l&yacute;<br />\r\n- Từ 3-5 ng&agrave;y l&agrave;m việc: d&agrave;nh cho những y&ecirc;u cầu khiếu nại</p>\r\n', '<p>asdasd,&aacute;dsadas</p>\r\n', 'Liên Hệ', 'lien-he', 'ádasdasd'),
('a8767eb2-8966-49b6-94d8-9b5f7606b6f2', 'Về Chúng Tôi Short', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-1188254.jpg', '&lt;p&gt;&lt;strong&gt;3.&amp;nbsp;Gửi email&lt;/strong&gt;&lt;strong&gt;&amp;nbsp;theo&amp;nbsp;&lt;/strong&gt;&lt;a href=\\&quot;https://help.shopee.vn/vn/s/contactusform\\&quot; target=\\&quot;_blank\\&quot;&gt;&lt;strong&gt;hướng dẫn&lt;/strong&gt;&lt;/a&gt;&lt;br /&gt; &lt;br /&gt; &lt;strong&gt;4. Gọi điện thoại:&amp;nbsp;&lt;/strong&gt;&lt;strong&gt;19001221&lt;/strong&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;(cước ph&amp;iacute; l&amp;agrave; 1.000đ / ph&amp;uacute;t)&lt;br /&gt; &lt;br /&gt; &lt;strong&gt;Lưu &amp;yacute;:&lt;/strong&gt;&amp;nbsp;Thời gian nhận được kết quả xử l&amp;yacute;&lt;br /&gt; - Ngay lập tức: d&amp;agrave;nh cho những y&amp;ecirc;u cầu về tư vấn v&amp;agrave; giải đ&amp;aacute;p th&amp;ocirc;ng tin&lt;br /&gt; - Từ 1-2 ng&amp;agrave;y l&amp;agrave;m việc: d&amp;agrave;nh cho những y&amp;ecirc;u cầu hỗ trợ cần c&amp;aacute;c bộ phận li&amp;ecirc;n quan xử l&amp;yacute;&lt;br /&gt; - Từ 3-5 ng&amp;agrave;y l&amp;agrave;m việc: d&amp;agrave;nh cho những y&amp;ecirc;u cầu khiếu nại&lt;/p&gt;', '&lt;p&gt;asdasd,&amp;aacute;dasd&lt;/p&gt;', 'Về Chúng Tôi', 'short-aboutUs', 'Ngắn'),
('f05b8dfb-f6cb-4524-ae00-d1603f3a1d2d', 'asdhas', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-1190662.jpg', '<p>asdas</p>\r\n', '<p>asdasd</p>\r\n', 'aasdas', 'danhmuc', 'asdsa'),
('f559ec48-431c-4347-ac44-7f729aa8b8bc', 'Về Chúng Tôi', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-1188254_800x450.jpg', '&lt;h1&gt;Giới thi&amp;ecirc;̣u v&amp;ecirc;̀ shop Thời Trang Ciao.&lt;/h1&gt; &lt;h2&gt;Đ&amp;ocirc;i lời giới thi&amp;ecirc;̣u v&amp;ecirc;̀ shop:&lt;/h2&gt; &lt;p&gt;Shop Thời Trang Ciao chúng t&amp;ocirc;i kh&amp;ocirc;ng đơn thu&amp;acirc;̀n là cái đẹp thời trang, chúng t&amp;ocirc;i khao khát ki&amp;ecirc;́n tạo những giá trị xã h&amp;ocirc;̣i nh&amp;acirc;n văn, trở thành m&amp;ocirc;̣t l&amp;ocirc;́i s&amp;ocirc;́ng đ&amp;ecirc;̉ đ&amp;ocirc;̀ng hành cùng phụ nữ tr&amp;ecirc;n hành trình th&amp;acirc;́u cảm vẻ đẹp của chính mình.&lt;/p&gt; &lt;p&gt;Shop Thời Trang Ciao là k&amp;ecirc;nh mua sắm online uy tín hàng đ&amp;acirc;̀u, cùng với đ&amp;ocirc;̣i ngũ nh&amp;acirc;n vi&amp;ecirc;n chuy&amp;ecirc;n nghi&amp;ecirc;̣p, chúng t&amp;ocirc;i cam k&amp;ecirc;́t đem những sản ph&amp;acirc;̉m t&amp;ocirc;́t nh&amp;acirc;́t, với giá cả phải chăng, uy tín và ch&amp;acirc;́t lượng với dịch vụ t&amp;ocirc;́t nh&amp;acirc;́t đ&amp;ecirc;́n với mọi người.&lt;/p&gt; &lt;h2&gt;Mục ti&amp;ecirc;u của chúng t&amp;ocirc;i.&lt;/h2&gt; &lt;p&gt;Shop thời trang Ciao &amp;ndash; Ch&amp;acirc;́t Lượng &amp;ndash; Uy Tín &amp;ndash; Chuy&amp;ecirc;n nghi&amp;ecirc;̣p&lt;/p&gt; &lt;ul&gt; &lt;li&gt;Ti&amp;ecirc;́p tục trở thành shop bán lẻ hàng đ&amp;acirc;̀u.&lt;/li&gt; &lt;li&gt;Mở r&amp;ocirc;̣ng phạm vi bán hàng ra toàn qu&amp;ocirc;́c.&lt;/li&gt; &lt;li&gt;Mang đ&amp;ecirc;́n cho khách hàng sự y&amp;ecirc;n t&amp;acirc;m và hài lòng khi mua sắm tại nhà.&lt;/li&gt; &lt;li&gt;Kh&amp;ocirc;ng ngừng t&amp;igrave;m kiếm v&amp;agrave; cập nhật c&amp;aacute;c mẫu quần &amp;aacute;o, c&amp;aacute;c hot trend tr&amp;ecirc;n thị trường để đ&amp;aacute;p ứng nhu cầu của kh&amp;aacute;ch h&amp;agrave;ng.&lt;/li&gt; &lt;li&gt;Nơi cung c&amp;acirc;́p th&amp;ocirc;ng tin và tư v&amp;acirc;́n sản ph&amp;acirc;̉m t&amp;ocirc;́t nh&amp;acirc;́t cho khách hàng.&lt;/li&gt; &lt;li&gt;Đ&amp;ocirc;́i tác ti&amp;ecirc;̀m năng và uy tín của các nhà cung c&amp;acirc;́p.&lt;/li&gt; &lt;/ul&gt; &lt;h2&gt;Cơ sở v&amp;acirc;̣t ch&amp;acirc;́t.&lt;/h2&gt; &lt;ul&gt; &lt;li&gt;Đội ngũ nh&amp;acirc;n sự chuy&amp;ecirc;n nghiệp, tận t&amp;igrave;nh v&amp;agrave; trung thực&lt;/li&gt; &lt;li&gt;Bộ phận Tư vấn v&amp;agrave; chăm s&amp;oacute;c kh&amp;aacute;ch h&amp;agrave;ng.&lt;/li&gt; &lt;li&gt;Bộ phận Nhận diện thương hiệu.&lt;/li&gt; &lt;li&gt;Bộ phận Video v&amp;agrave; h&amp;igrave;nh ảnh&lt;/li&gt; &lt;li&gt;Bộ phận Giao nhận&lt;/li&gt; &lt;li&gt;C&amp;aacute;c bộ phận kh&amp;aacute;c: H&amp;agrave;nh ch&amp;iacute;nh, Kế to&amp;aacute;n &amp;hellip;&lt;/li&gt; &lt;li&gt;Cơ sở vật chất&amp;nbsp; đầy đủ v&amp;agrave; hiện đại&lt;/li&gt; &lt;li&gt;Kho lưu giữ h&amp;agrave;ng h&amp;oacute;a, đặt ngay tại trung t&amp;acirc;m th&amp;agrave;nh phố.&lt;/li&gt; &lt;li&gt;Xe vận chuyển h&amp;agrave;ng h&amp;oacute;a v&amp;agrave; sắp xếp h&amp;agrave;ng h&amp;oacute;a&lt;/li&gt; &lt;/ul&gt; &lt;h2&gt;Hình thức bán hàng.&lt;/h2&gt; &lt;ul&gt; &lt;li&gt;Mọi sản phẩm đều được b&amp;aacute;n qua k&amp;ecirc;nh Online.&lt;/li&gt; &lt;li&gt;Đặt h&amp;agrave;ng trực tuyến tr&amp;ecirc;n&amp;nbsp;&lt;a href=\\&quot;https://www.facebook.com/VayXinh.ReDep.ThoiTrangCiao/\\&quot; rel=\\&quot;noreferrer noopener\\&quot; target=\\&quot;_blank\\&quot;&gt;Fanpage Facebook của Shop chúng t&amp;ocirc;i&lt;/a&gt;.&lt;/li&gt; &lt;li&gt;Đưa sản phẩm l&amp;ecirc;n website:&amp;nbsp;&lt;a href=\\&quot;https://thoitrangciao.com/\\&quot;&gt;Trang chủ &amp;ndash; thoitrangciao.com&lt;/a&gt;.&lt;/li&gt; &lt;li&gt;H&amp;agrave;ng th&amp;aacute;ng ph&amp;aacute;t h&amp;agrave;nh 500 m&amp;atilde; giảm gi&amp;aacute; tặng k&amp;egrave;m khi kh&amp;aacute;ch h&amp;agrave;ng mua h&amp;agrave;ng tại shop.&lt;/li&gt; &lt;li&gt;Hai th&amp;aacute;ng ph&amp;aacute;t h&amp;agrave;nh 100 qu&amp;agrave; tặng d&amp;agrave;nh cho kh&amp;aacute;ch h&amp;agrave;ng th&amp;acirc;n thiết.&lt;/li&gt; &lt;/ul&gt; &lt;h2&gt;Sản ph&amp;acirc;̉m kinh doanh.&lt;/h2&gt; &lt;p&gt;Ch&amp;uacute;ng t&amp;ocirc;i chuy&amp;ecirc;n kinh doanh thời trang nữ dành cho mọi lứa tu&amp;ocirc;̉i, sản phẩm chủ yếu l&amp;agrave;&amp;nbsp;&lt;a href=\\&quot;https://thoitrangciao.com/danh-muc/ao/\\&quot; rel=\\&quot;noreferrer noopener\\&quot; target=\\&quot;_blank\\&quot;&gt;&amp;Aacute;o Thời Trang Nữ&lt;/a&gt;,&amp;nbsp;&lt;a href=\\&quot;https://thoitrangciao.com/danh-muc/chan-vay/\\&quot; rel=\\&quot;noreferrer noopener\\&quot; target=\\&quot;_blank\\&quot;&gt;Ch&amp;acirc;n V&amp;aacute;y Nữ&lt;/a&gt;,&amp;nbsp;&lt;a href=\\&quot;https://thoitrangciao.com/danh-muc/dam/\\&quot; rel=\\&quot;noreferrer noopener\\&quot; target=\\&quot;_blank\\&quot;&gt;Đầm Nữ Đẹp&lt;/a&gt;.&lt;/p&gt; &lt;p&gt;Những sản phẩm tại Thời Trang Ciao được ch&amp;iacute;nh chủ Shop t&amp;igrave;m kiếm tuyển chọn mẫu m&amp;atilde; đa dạng phong ph&amp;uacute; theo xu hướng thời trang &amp;ldquo;HOT&amp;rdquo; nhất tr&amp;ecirc;n thị trường.&amp;nbsp;&lt;/p&gt; &lt;p&gt;C&amp;aacute;c sản phẩm của ch&amp;uacute;ng t&amp;ocirc;i được lựa chọn vải v&amp;agrave; đặt may tại Việt Nam với ti&amp;ecirc;u ch&amp;iacute; &amp;ldquo;Kh&amp;ocirc;ng qua trung gian &amp;ndash; Gi&amp;aacute; cả hợp l&amp;yacute; &amp;ndash; Chất lượng đảm bảo&amp;rdquo;&amp;nbsp;&lt;/p&gt; &lt;h2&gt;Hành trình phát tri&amp;ecirc;̉n Thời Trang Ciao.&lt;/h2&gt; &lt;p&gt;Chúng t&amp;ocirc;i ra đời tr&amp;ecirc;n phương di&amp;ecirc;̣n lắng nghe mong ước của những người phụ nữ, dựa tr&amp;ecirc;n thực t&amp;ecirc;́ nhi&amp;ecirc;̀u người mong mu&amp;ocirc;́n được mặc đẹp hơn, khoác l&amp;ecirc;n người những b&amp;ocirc;̣ cánh làm t&amp;ocirc;n l&amp;ecirc;n vẻ đẹp của bản th&amp;acirc;n với m&amp;ocirc;̣t mức giá phù hợp nh&amp;acirc;́t.&lt;/p&gt; &lt;p&gt;T&amp;acirc;́t cả những sản ph&amp;acirc;̉m của chúng t&amp;ocirc;i được nh&amp;acirc;̣p v&amp;ecirc;̀ tr&amp;ecirc;n ti&amp;ecirc;u chí b&amp;ecirc;̀n rẻ đẹp, c&amp;ocirc;́ gắng t&amp;ocirc;́t nh&amp;acirc;́t đ&amp;ecirc;̉ làm hài lòng mọi người, tr&amp;ecirc;n phương di&amp;ecirc;̣n g&amp;acirc;̀n gũi hơn nhưng v&amp;acirc;̃n giữ nguy&amp;ecirc;n vẻ thanh lịch, t&amp;ocirc;́i giản và sang trọng.&lt;/p&gt; &lt;p&gt;Chi&amp;ecirc;́n lực phát tri&amp;ecirc;̉n của thời trang Ciao chúng t&amp;ocirc;i là lu&amp;ocirc;n lu&amp;ocirc;n đ&amp;ocirc;̉i mới, c&amp;ocirc;́ gắng tìm tòi những cách thức phục vụ t&amp;ocirc;́t nh&amp;acirc;́t cho nhu c&amp;acirc;̀u làm đẹp chính đáng của mọi người.&lt;/p&gt; &lt;h2&gt;Chúng t&amp;ocirc;i cam k&amp;ecirc;́t.&lt;/h2&gt; &lt;ul&gt; &lt;li&gt;Giá cả phù hợp, tư v&amp;acirc;́n nhi&amp;ecirc;̣t tình.&lt;/li&gt; &lt;li&gt;Giao hàng nhanh chóng, mi&amp;ecirc;̃n phí tr&amp;ecirc;n toàn qu&amp;ocirc;́c.&lt;/li&gt; &lt;li&gt;H&amp;acirc;̣u mãi chu đáo.&lt;/li&gt; &lt;li&gt;Nhi&amp;ecirc;̀u chương trình khuy&amp;ecirc;́n mãi h&amp;acirc;́p d&amp;acirc;̃n.&lt;/li&gt; &lt;/ul&gt;', '&lt;p&gt;asdasd,&amp;aacute;dsdasd&lt;/p&gt;', '...', 'about-us', 'ádasdas');

-- --------------------------------------------------------

--
-- Table structure for table `password_resert`
--

CREATE TABLE `password_resert` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `sale_off` decimal(10,3) NOT NULL,
  `create_at` datetime NOT NULL,
  `is_show` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `key_word` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `code`, `des`, `sale_off`, `create_at`, `is_show`, `view`, `key_word`) VALUES
('0ef847cd-90cc-46f2-a574-7637b22c7d1a', 'alo alo', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-658987.jpg', '90.000', '23131646', '&lt;p&gt;asdasd&lt;/p&gt;', '85.000', '2022-01-27 00:00:00', 0, 5000, 'asdasd,asdasdad'),
('769c21ec-8f27-414b-8da2-116b47348efa', 'Capuchino', '/Molicha/public/admin/userfiles/files/123.jpg', '20.000', 'TS_CY12312312', '&lt;p&gt;asdasdasd,asdasdasdasd&lt;/p&gt;', '20.000', '2022-01-27 00:00:00', 0, 10003, 'asdasd,asdasd'),
('a5ef7ef0-f8d8-49bd-8cd1-060a7b67fd21', 'Trà Sữa 1', '/Molicha/public/admin/userfiles/files/123.jpg', '25.000', 'adasd', '&lt;p&gt;&amp;aacute;dasd&lt;/p&gt;', '20.000', '2022-01-27 00:00:00', 0, 15000, 'adasd,ádsa'),
('c8c45f91-8040-487d-a793-99df690c7861', 'Trà Sữa Nóng', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-1190662.jpg', '15.000', 'TS_CY', '&lt;p&gt;asdasd&lt;/p&gt;', '20.000', '2022-01-27 00:00:00', 0, 12000, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_detail`
--

CREATE TABLE `product_category_detail` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_category_detail`
--

INSERT INTO `product_category_detail` (`id`, `category_id`, `product_id`) VALUES
('1cf01dc0-f51e-4554-baeb-ba99aba5d545', '1923965b-6c8e-49bd-af4f-82fb52b574fd', '769c21ec-8f27-414b-8da2-116b47348efa'),
('2a795231-d714-44e7-9787-e733d11be21e', 'c34b0602-8179-4455-b9bd-439991a4b7b2', 'c8c45f91-8040-487d-a793-99df690c7861'),
('407dbe43-439c-4a28-bdb8-5c44b1199b67', '35f766ee-4d75-48a5-9643-272012fade4f', 'a5ef7ef0-f8d8-49bd-8cd1-060a7b67fd21'),
('63c602e8-77be-4094-857b-f915705ac8f1', '1923965b-6c8e-49bd-af4f-82fb52b574fd', 'c8c45f91-8040-487d-a793-99df690c7861'),
('6da878d2-f68f-4036-8163-006e5e12a1c6', '15ff92e1-dff2-4722-b8ad-276383189eb5', 'a5ef7ef0-f8d8-49bd-8cd1-060a7b67fd21'),
('7ac38246-8251-4e9b-81c8-0bb4e69baa62', '15ff92e1-dff2-4722-b8ad-276383189eb5', 'c8c45f91-8040-487d-a793-99df690c7861'),
('ba3e0d7b-3117-4d54-a070-0d6be9cbd3dd', '1923965b-6c8e-49bd-af4f-82fb52b574fd', 'a5ef7ef0-f8d8-49bd-8cd1-060a7b67fd21'),
('c59efae2-da0a-4096-89a9-54ba0a9ec616', 'cc1622a3-df20-447c-aecc-a24cd9974cf9', '769c21ec-8f27-414b-8da2-116b47348efa'),
('d7b40f5d-a268-48d1-bef9-f1c2715ddf94', '35f766ee-4d75-48a5-9643-272012fade4f', 'c8c45f91-8040-487d-a793-99df690c7861'),
('f94e6c7d-b3ce-41db-9d9e-37d4554a18e3', 'b564c182-256e-48ab-bba6-0f976fc77ed4', 'a5ef7ef0-f8d8-49bd-8cd1-060a7b67fd21');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `des`) VALUES
('c28db6c1-5769-4c3d-bae8-d52a39ea048c', 'admin', 'admin'),
('c9e535b8-38a9-4501-a2cc-9cf4072b2804', 'Quản Lý Quyền Xem', 'Quản Lý Quyền Xem');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `group_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_public` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `content`, `image`, `group_id`, `is_public`) VALUES
('47614e7f-2def-4306-be36-54e69adeff1b', 'Main Slider', '&lt;p&gt;djsgfasjgfjsbfjsdfaf&lt;/p&gt;', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-658987.jpg', 'HomeSlide', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_login`
--

CREATE TABLE `social_login` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fb_token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `zalo_token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_token` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `toping`
--

CREATE TABLE `toping` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `toping`
--

INSERT INTO `toping` (`id`, `name`, `product_id`) VALUES
('daf1282a-0b1d-4b7e-89b6-852030732d2b', 'Trân Châu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_detail`
--

CREATE TABLE `trang_thai_detail` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hang`
--

CREATE TABLE `trang_thai_don_hang` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trang_thai_don_hang`
--

INSERT INTO `trang_thai_don_hang` (`id`, `name`, `des`) VALUES
('78c0486e-214e-4970-9ff5-3a947c47cf83', 'Đang Chuẩn Bị', 'Dang Chuẩn Bị Á'),
('893cb1f4-131d-452f-a361-e52a5467c701', 'Đã Xong', ''),
('e1ec8f8f-27cc-44f5-b51e-74db7dfbece5', 'Huỷ', '');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_parent`
--

CREATE TABLE `trang_thai_parent` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trang_thai_parent`
--

INSERT INTO `trang_thai_parent` (`id`, `name`, `des`) VALUES
('00f21d70-018a-47e3-955c-cc42b1ffa97c', 'Đấ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` datetime DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `avartar` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` datetime NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `birthday`, `gender`, `avartar`, `password`, `key_password`, `email`, `phone`, `address`, `create_at`, `active`) VALUES
('1', 'MINH MAI 123456', 'admin', '2022-01-01 09:34:12', 0, NULL, 'cb852b860ea39c7e49024daf2ce2ddfeb0bc282d', '6516608d2d39a702b70804337dc6316e20a0a815', 'nhokminhmai@gmail.com', '', NULL, '2022-01-01 09:34:12', 1),
('7cf07681-8559-4001-9df5-db020d09f2af', 'asdasd', 'test123', NULL, NULL, NULL, 'b2906cc21183ae4f9d2bd97d77e5256ae36c93db', '9944820e-2503-4dc5-853b-8b256c99b789', 'fhjgjadf@gmail.com', NULL, NULL, '0000-00-00 00:00:00', 1),
('a95c9503-4070-43e2-b48f-7bd1ce0435b9', NULL, 'test2', NULL, NULL, NULL, 'e9b9380bbeeffe1900500128560228ed1ebb46b0', '81434560-a5c1-43dc-b9b9-9eea19524ac5', 'asdasd@gmail.com', NULL, NULL, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_detail`
--

CREATE TABLE `user_role_detail` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role_detail`
--

INSERT INTO `user_role_detail` (`id`, `role_name`, `user_id`) VALUES
('4c9f8dc9-cfac-43ee-a92c-abbc00456ad4', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `widget`
--

CREATE TABLE `widget` (
  `id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `group_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8_unicode_ci NOT NULL,
  `stt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `widget`
--

INSERT INTO `widget` (`id`, `name`, `des`, `link`, `group_id`, `image`, `stt`) VALUES
('2d95a08d-9ac9-4a43-a82f-6e8e4634ab3b', 'Trà', '&lt;p&gt;&amp;aacute;dasdasd&lt;/p&gt;', 'Trà', 'MainMenu', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-1188254.jpg', 0),
('3fa2137a-f8f3-4c51-a3da-27f3c7ffb8dc', 'Sữa Tươi', '&lt;p&gt;Sữa Tươi,...&lt;/p&gt;', 'Sữa Tươi', 'MainMenu', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-1188254_800x450.jpg', 4),
('790890bc-2deb-4780-aca7-ac0967810a3e', 'Trà Sữa', '&lt;p&gt;Tr&amp;agrave; Sữa,B&amp;aacute;nh Flan&lt;/p&gt;', 'Trà Sữa', 'MainMenu', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-1188254.jpg', 2),
('ea760b7a-1843-45a1-b6d5-dd28f352d0d5', 'Capuchino', '&lt;p&gt;C&amp;agrave; Ph&amp;ecirc; Rang Xay&lt;/p&gt;', 'Capuchino', 'MainMenu', '/Molicha/public/admin/userfiles/files/stretched-1920-1080-658987.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `category_detail`
--
ALTER TABLE `category_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH,
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trang_thai_id` (`trang_thai_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tinh_thanh_id` (`tinh_thanh_id`),
  ADD KEY `quan_huyen_id` (`quan_huyen_id`);

--
-- Indexes for table `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`link`,`stt`) USING HASH;

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`alias`) USING HASH;

--
-- Indexes for table `password_resert`
--
ALTER TABLE `password_resert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `product_category_detail`
--
ALTER TABLE `product_category_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_login`
--
ALTER TABLE `social_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toping`
--
ALTER TABLE `toping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `trang_thai_detail`
--
ALTER TABLE `trang_thai_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trang_thai_id` (`trang_thai_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `trang_thai_parent`
--
ALTER TABLE `trang_thai_parent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_detail`
--
ALTER TABLE `user_role_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_name` (`role_name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `widget`
--
ALTER TABLE `widget`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`stt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=783;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_detail`
--
ALTER TABLE `category_detail`
  ADD CONSTRAINT `category_detail_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai_don_hang` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_3` FOREIGN KEY (`tinh_thanh_id`) REFERENCES `locations` (`Id`),
  ADD CONSTRAINT `don_hang_ibfk_4` FOREIGN KEY (`quan_huyen_id`) REFERENCES `locations` (`Id`);

--
-- Constraints for table `password_resert`
--
ALTER TABLE `password_resert`
  ADD CONSTRAINT `password_resert_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `product_category_detail`
--
ALTER TABLE `product_category_detail`
  ADD CONSTRAINT `product_category_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_category_detail_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category_detail` (`id`);

--
-- Constraints for table `toping`
--
ALTER TABLE `toping`
  ADD CONSTRAINT `toping_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `trang_thai_detail`
--
ALTER TABLE `trang_thai_detail`
  ADD CONSTRAINT `trang_thai_detail_ibfk_3` FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai_parent` (`id`),
  ADD CONSTRAINT `trang_thai_detail_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `user_role_detail`
--
ALTER TABLE `user_role_detail`
  ADD CONSTRAINT `user_role_detail_ibfk_3` FOREIGN KEY (`role_name`) REFERENCES `role` (`name`),
  ADD CONSTRAINT `user_role_detail_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
