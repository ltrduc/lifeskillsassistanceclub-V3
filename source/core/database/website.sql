-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 06, 2022 lúc 06:11 PM
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
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id_attendance` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_schoolyear` int(255) NOT NULL,
  `semester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attendance` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_borrow`
--

CREATE TABLE `tbl_borrow` (
  `id_borrow` int(255) NOT NULL,
  `borrower` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `device` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantily` int(255) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id_course` int(255) NOT NULL,
  `id_subject` int(255) NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `period` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `local` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `semester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_schoolyear` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_decentralization`
--

CREATE TABLE `tbl_decentralization` (
  `id_decentralization` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0,
  `attendance` int(1) NOT NULL DEFAULT 0,
  `post` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_decentralization`
--

INSERT INTO `tbl_decentralization` (`id_decentralization`, `id_user`, `admin`, `attendance`, `post`) VALUES
(1, 1, 0, 0, 0),
(2, 2, 0, 0, 0),
(3, 3, 0, 0, 0),
(4, 4, 0, 0, 0),
(5, 5, 0, 0, 0),
(6, 6, 0, 0, 0),
(7, 7, 0, 0, 0),
(8, 8, 0, 0, 0),
(9, 9, 0, 0, 0),
(10, 10, 0, 0, 0),
(11, 11, 0, 0, 0),
(12, 12, 0, 0, 0),
(13, 13, 0, 0, 0),
(14, 14, 0, 0, 0),
(15, 15, 0, 0, 0),
(16, 16, 0, 0, 0),
(17, 17, 0, 0, 0),
(18, 18, 0, 0, 0),
(19, 19, 0, 0, 0),
(20, 20, 0, 0, 0),
(21, 21, 0, 0, 0),
(22, 22, 0, 0, 0),
(23, 23, 0, 0, 0),
(24, 24, 0, 0, 0),
(25, 25, 0, 0, 0),
(26, 26, 0, 0, 0),
(27, 27, 0, 0, 0),
(28, 28, 0, 0, 0),
(29, 29, 0, 0, 0),
(30, 30, 0, 0, 0),
(31, 31, 0, 0, 0),
(32, 32, 0, 0, 0),
(33, 33, 0, 0, 0),
(34, 34, 0, 0, 0),
(35, 35, 0, 0, 0),
(36, 36, 0, 0, 0),
(37, 37, 0, 0, 0),
(38, 38, 0, 0, 0),
(39, 39, 0, 0, 0),
(40, 40, 0, 0, 0),
(41, 41, 0, 0, 0),
(42, 42, 0, 0, 0),
(43, 43, 0, 0, 0),
(44, 44, 0, 0, 0),
(45, 45, 0, 0, 0),
(46, 46, 0, 0, 0),
(47, 47, 0, 0, 0),
(48, 48, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_device`
--

CREATE TABLE `tbl_device` (
  `id_device` int(255) NOT NULL,
  `id_devicegroup` int(255) NOT NULL,
  `device` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_devicegroup`
--

CREATE TABLE `tbl_devicegroup` (
  `id_devicegroup` int(255) NOT NULL,
  `devicegroup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_devicestatistics`
--

CREATE TABLE `tbl_devicestatistics` (
  `id_devicestatistics` int(255) NOT NULL,
  `id_device` int(255) NOT NULL,
  `quantily` int(255) NOT NULL,
  `using` int(255) NOT NULL DEFAULT 0,
  `donotuse` int(255) NOT NULL DEFAULT 0,
  `normal` int(255) NOT NULL DEFAULT 0,
  `broken` int(255) NOT NULL DEFAULT 0,
  `lost` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_executive`
--

CREATE TABLE `tbl_executive` (
  `id_executive` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_position` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id_position` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_recruitment`
--

CREATE TABLE `tbl_recruitment` (
  `id_recruitment` int(255) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_student` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `faculty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `per_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stu_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_team` int(255) NOT NULL,
  `resolution` int(1) NOT NULL,
  `content1` text COLLATE utf8_unicode_ci NOT NULL,
  `content2` text COLLATE utf8_unicode_ci NOT NULL,
  `content3` text COLLATE utf8_unicode_ci NOT NULL,
  `content4` text COLLATE utf8_unicode_ci NOT NULL,
  `content5` text COLLATE utf8_unicode_ci NOT NULL,
  `content6` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `id_schedule` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shift` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_schoolyear`
--

CREATE TABLE `tbl_schoolyear` (
  `id_schoolyear` int(255) NOT NULL,
  `schoolyear` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id_subject` int(255) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id_team` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_team`
--

INSERT INTO `tbl_team` (`id_team`, `name`, `description`) VALUES
(1, 'Ban Hành Chính', '<p>- Hỗ trợ nhập liệu, thống k&ecirc; t&igrave;nh h&igrave;nh điểm danh từ ban nh&acirc;n sự, hỗ trợ tiếp nhận c&aacute;c vấn đề của sinh vi&ecirc;n c&ugrave;ng với thư k&yacute;/gi&aacute;o vụ của bộ m&ocirc;n khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n\r\n<p>- Hỗ trợ giảng vi&ecirc;n trong việc nhập liệu, thống k&ecirc;,&hellip; khi c&oacute; y&ecirc;u cầu v&agrave; được sự đồng &yacute; của Trưởng ban v&agrave; Ban chủ nhiệm.</p>\r\n'),
(2, 'Ban Nhân Sự', '<p>Hỗ trợ cho c&aacute;c lớp học kỹ năng, chuẩn bị c&aacute;c dụng cụ, vật dụng; điều phối, gi&aacute;m s&aacute;t, quản l&yacute; t&igrave;nh h&igrave;nh lớp học; hỗ trợ cho giảng vi&ecirc;n/b&aacute;o c&aacute;o vi&ecirc;n đứng lớp. Hỗ trợ giảng vi&ecirc;n trong qu&aacute; tr&igrave;nh đứng lớp khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n'),
(3, 'Ban Sự kiện và Truyền Thông', '<p>- X&acirc;y dựng kế hoạch v&agrave; tổ chức c&aacute;c buổi chia sẻ, hoạt động ngoại kh&oacute;a, thiện nguyện, &hellip; cho c&acirc;u lạc bộ.</p>\r\n\r\n<p>- Chịu tr&aacute;ch nhiệm ch&iacute;nh về truyền th&ocirc;ng cho c&acirc;u lạc bộ. Quản l&yacute; Fanpage của c&acirc;u lạc bộ, cung cấp h&igrave;nh ảnh của đội, viết b&agrave;i, đưa th&ocirc;ng tin về c&aacute;c kỹ năng sống, kỹ năng bổ trợ đến gần với sinh vi&ecirc;n.</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(255) NOT NULL,
  `id_student` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_team` int(255) DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_student`, `password`, `fullname`, `birthday`, `facebook`, `id_team`, `phone`, `role`) VALUES
(1, '51900040', '9774532db8f52128d641b1016f9728c7', 'Lê Trí Đức', '2001-05-03', 'https://www.facebook.com/ltrduc', 1, '0377025449', 0),
(2, '51900356', '6d5557fa3520948ab7ec199835968295', 'Tạ Quốc Khánh', NULL, NULL, 1, NULL, 0),
(3, 'H1900308', 'c87566fe171afba085d2c43088176e26', 'Nguyễn Nhật Quyên', NULL, NULL, 1, NULL, 0),
(4, '11900067', 'ee215d2465ef614e8cf9c16beae17a32', 'Phạm Ngọc Minh Thư', NULL, NULL, 1, NULL, 0),
(5, '219H0227', '98eaf61ad9feabfb61bac17ab4bf8aaf', 'Bùi Thị Thuỳ Trang', NULL, NULL, 1, NULL, 0),
(6, 'B1900443', '393f83da5ae4f676d6358da3a70f2a15', 'Huỳnh Hữu Khang Vĩ', '2001-04-20', 'https://www.facebook.com/khangvi.huynhhuu/', 1, '0704438192', 0),
(7, '520H0401', '3ab20c95f18788229224f4fbc8531a15', 'Lê Gia Phú', '2002-12-29', 'https://www.facebook.com/GiaPhu2912/', 1, '0852068832', 0),
(8, 'A2000244', '2448fb5a9b77e4644e3beed937ca38d4', 'Phan Phương Thảo', '2002-07-04', 'https://www.facebook.com/thao.phanphuong.5209000', 1, '0857141074', 0),
(9, 'B20H0236', '0e2bc5161f8703ab36d184696e497010', 'Vương Kim Trang', '2002-07-21', 'https://m.facebook.com/profile.php', 1, '0342969417', 0),
(10, 'H2000514', '6b4eeafb2df14a94203625c3afd97cf1', 'Trần Kim Xuân', '2002-12-23', 'https://www.facebook.com/kimxuan.tran.927', 1, '0703874040', 0),
(11, '019H0292', 'a4cbde89381503582267fcf7af3287c3', 'Nguyễn Mỹ Anh', NULL, NULL, 3, NULL, 0),
(12, '720H1519', '34407949dee2cd3056e38e5cae9d02a5', 'Hoàng Ngọc Bảo Châu', NULL, NULL, 3, NULL, 0),
(13, '51900030', '17dd54b49eadccf8e149e6d224fd99d9', 'Nguyễn Quốc Đạt', NULL, NULL, 3, NULL, 0),
(14, '02000939', 'd1763ac34f6a48a43af7045f32842945', 'Hồ Thị Bích Tuyền', NULL, NULL, 3, NULL, 0),
(15, '020H0363', '2a62fe57d691560853438d40dd4e370e', 'Nguyễn Phạm Kim Ngân', NULL, NULL, 3, NULL, 0),
(16, '32001093', '6605d1c5c7dd96701e3a2c47fdb73c81', 'Nguyễn Thị Thư', '2002-01-10', 'https://www.facebook.com/thiendi.hoang.5030', 3, '0346056637', 0),
(17, 'H2000506', 'bbf566384d1e09f37e0b1845301d3c62', 'Lê Thanh Vy', NULL, NULL, 3, NULL, 0),
(18, 'B19H0160', '4b233c55470bafcfaef8b0b310f5512a', 'Nguyễn Trần Phương Anh', NULL, NULL, 2, NULL, 0),
(19, '020H0214', 'c13aceefb420263e13acbdb5ae57b05b', 'Ngô Nguyễn Minh Anh', '2002-04-04', 'https://www.facebook.com/profile.php?id=100044649050442', 2, '0703090346', 0),
(20, '61900381', '12cdb316d70374121cb1cd1b940dda9f', 'Trần Ngọc Châu', '2001-09-10', 'https://www.facebook.com/NgocChau2k1', 2, '0852419920', 0),
(21, '720H1520', '7b2c337b9487f215e6148ca47a5139f3', 'Trần Mỹ Châu', NULL, NULL, 2, NULL, 0),
(22, '61900050', 'fe242d438e5cc9d7b8bce135c2f9e404', 'Lê Thị Hồng Gấm', NULL, NULL, 2, NULL, 0),
(23, '01900146', 'b6ca85c2acd578c092f47e3b9a6bbfe3', 'Huỳnh Thị Diễm Hồng', NULL, NULL, 2, NULL, 0),
(24, '51900119', '32e52bea4a9c000291c04d834c0f1d2b', 'Lê Thành Đăng Khoa', '2001-04-17', 'https://www.facebook.com/khoalag174', 2, '0788765410', 0),
(25, 'B1900124', '98e61dedb2dde05753af4d40ecf9e9db', 'Phạm Hoàng Long', NULL, NULL, 2, NULL, 0),
(26, '31900474', 'da5a44a3a9d55058150dd4e2721550e0', 'Huỳnh Nguyễn Ngọc Minh', NULL, NULL, 2, NULL, 0),
(27, '41900468', '9408bb53069de3d9aeadd1d401e0356f', 'Nguyễn Duy Khánh Minh', '2001-03-09', 'https://www.facebook.com/nguyenduykhanhminh6685', 2, '0862087931', 0),
(28, '31901010', 'b35ff4ee9c13339a79a286c082df2f3a', 'Trầm Tuyết Ngân', NULL, NULL, 2, NULL, 0),
(29, '81900546', '976a7aa94f4fc8b814ab2338efd9a9d4', 'Trần Hiếu Ngân', NULL, NULL, 2, NULL, 0),
(30, 'A2000221', '5299de3b0b6c946845316b3d4db91c79', 'Nguyễn Như Ngọc', NULL, NULL, 2, NULL, 0),
(31, '51900444', '59fd4766e5011211dbe84e7dbdbdcfca', 'Phạm Huỳnh Anh Tiến', NULL, NULL, 2, NULL, 0),
(32, '41900552', '3237d7b0be2ebc85beac9ae7e73fb0bb', 'Huỳnh Quốc Thắng', NULL, NULL, 2, NULL, 0),
(33, '61900566', 'ba29c56c881c768be1d44f3bdcdbaccb', 'Ngô Trần Ngọc Thuận', '2001-01-29', 'https://www.facebook.com/ngocthuanneeee/', 2, '0869320518', 0),
(34, '41900587', '98d5f733e3d4d54eda935678a499f949', 'Nguyễn Hoàng Trân', NULL, NULL, 2, NULL, 0),
(35, '519H0247', 'b69ab6698d5bf70e234f68341a33dcc1', 'Nguyễn Đức Trọng', NULL, NULL, 2, NULL, 0),
(36, 'B19H0163', '791cc672410056d218a1804b3eb8fb91', 'Trương Hoàng Anh', NULL, NULL, 2, NULL, 0),
(37, '81900518', '4813eb9e6ba5c3725e7641bea8582886', 'Nguyễn Thị Kim Hằng', NULL, NULL, 2, NULL, 0),
(38, '81900544', '4ef6d78c01ddd41a3b73060935ddf2d1', 'Nguyễn Thị My', NULL, NULL, 2, NULL, 0),
(39, 'B19H0257', 'bbd6878c1f09a4a13a8b61309e94529b', 'Trần Yến Ngọc', NULL, NULL, 2, NULL, 0),
(40, '81900550', '8431508a871e0136efa47e465dd0ef43', 'Nguyễn Ngọc Thảo Nguyên', NULL, NULL, 2, NULL, 0),
(41, 'C2000286', '8a0d77288e401318308e910e26587e37', 'Nguyễn Hoàng Minh Khan', NULL, NULL, 2, NULL, 0),
(42, '62000831', 'ae4fb3e73957ace0e1cfc16de7778673', 'Trần Phùng Hiếu Ngân', NULL, NULL, 2, NULL, 0),
(43, '720H1569', 'ca20c062fa0090dca7069bebb2c8c103', 'Giang Tịnh Nghi', NULL, NULL, 2, NULL, 0),
(44, '720H1575', 'b59aa4a33fa2c3b62acb3f3e95aa1c8e', 'Đỗ Uyên Nhi', NULL, NULL, 2, NULL, 0),
(45, '32001095', '7c10837b21097b5b8f2c1742b0de7eda', 'Lê Thanh Thùy', NULL, NULL, 2, NULL, 0),
(46, '720H1224', 'e9d698af1f660c04196de0e73da97508', 'Bùi Thị Tố Trinh', '2002-11-01', 'https://www.facebook.com/trinh.to.9862273', 2, '0358729992', 0),
(47, 'B2000218', '174300834bbe23e1e7bc6acf2045f8a6', 'Trầm Thị Quỳnh Tươi', NULL, NULL, 2, NULL, 0),
(48, 'E20H0347', 'a2a2bea9bcf77c92a714ef3e669e2cdf', 'Phùng Lữ Thế Hoài', NULL, NULL, 2, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id_attendance`),
  ADD KEY `fk_tbl_attendance_id_user` (`id_user`),
  ADD KEY `fk_tbl_attendance_id_schoolyear` (`id_schoolyear`);

--
-- Chỉ mục cho bảng `tbl_borrow`
--
ALTER TABLE `tbl_borrow`
  ADD PRIMARY KEY (`id_borrow`);

--
-- Chỉ mục cho bảng `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id_course`),
  ADD KEY `fk_tbl_course_id_subject` (`id_subject`),
  ADD KEY `fk_tbl_course_	id_schoolyear` (`id_schoolyear`);

--
-- Chỉ mục cho bảng `tbl_decentralization`
--
ALTER TABLE `tbl_decentralization`
  ADD PRIMARY KEY (`id_decentralization`),
  ADD KEY `fk_tbl_decentralization_id_user` (`id_user`);

--
-- Chỉ mục cho bảng `tbl_device`
--
ALTER TABLE `tbl_device`
  ADD PRIMARY KEY (`id_device`),
  ADD KEY `fk_tbl_device_id_devicegroup` (`id_devicegroup`);

--
-- Chỉ mục cho bảng `tbl_devicegroup`
--
ALTER TABLE `tbl_devicegroup`
  ADD PRIMARY KEY (`id_devicegroup`);

--
-- Chỉ mục cho bảng `tbl_devicestatistics`
--
ALTER TABLE `tbl_devicestatistics`
  ADD PRIMARY KEY (`id_devicestatistics`),
  ADD KEY `fk_tbl_devicestatistics_id_device` (`id_device`);

--
-- Chỉ mục cho bảng `tbl_executive`
--
ALTER TABLE `tbl_executive`
  ADD PRIMARY KEY (`id_executive`),
  ADD KEY `fk_tbl_executive_id_position` (`id_position`),
  ADD KEY `fk_tbl_executive_id_user` (`id_user`);

--
-- Chỉ mục cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id_position`);

--
-- Chỉ mục cho bảng `tbl_recruitment`
--
ALTER TABLE `tbl_recruitment`
  ADD PRIMARY KEY (`id_recruitment`),
  ADD KEY `fk_tbl_recrutiment_id_team` (`id_team`);

--
-- Chỉ mục cho bảng `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `fk_tbl_schedule_id_user` (`id_user`);

--
-- Chỉ mục cho bảng `tbl_schoolyear`
--
ALTER TABLE `tbl_schoolyear`
  ADD PRIMARY KEY (`id_schoolyear`);

--
-- Chỉ mục cho bảng `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id_subject`);

--
-- Chỉ mục cho bảng `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`id_team`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_tbl_user_id_team` (`id_team`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id_attendance` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_borrow`
--
ALTER TABLE `tbl_borrow`
  MODIFY `id_borrow` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id_course` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_decentralization`
--
ALTER TABLE `tbl_decentralization`
  MODIFY `id_decentralization` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `tbl_device`
--
ALTER TABLE `tbl_device`
  MODIFY `id_device` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_devicegroup`
--
ALTER TABLE `tbl_devicegroup`
  MODIFY `id_devicegroup` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_devicestatistics`
--
ALTER TABLE `tbl_devicestatistics`
  MODIFY `id_devicestatistics` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_executive`
--
ALTER TABLE `tbl_executive`
  MODIFY `id_executive` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id_position` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_recruitment`
--
ALTER TABLE `tbl_recruitment`
  MODIFY `id_recruitment` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `id_schedule` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_schoolyear`
--
ALTER TABLE `tbl_schoolyear`
  MODIFY `id_schoolyear` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id_subject` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id_team` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD CONSTRAINT `fk_tbl_attendance_id_schoolyear` FOREIGN KEY (`id_schoolyear`) REFERENCES `tbl_schoolyear` (`id_schoolyear`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tbl_attendance_id_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `fk_tbl_course_	id_schoolyear` FOREIGN KEY (`id_schoolyear`) REFERENCES `tbl_schoolyear` (`id_schoolyear`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tbl_course_id_subject` FOREIGN KEY (`id_subject`) REFERENCES `tbl_subject` (`id_subject`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_decentralization`
--
ALTER TABLE `tbl_decentralization`
  ADD CONSTRAINT `fk_tbl_decentralization_id_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_device`
--
ALTER TABLE `tbl_device`
  ADD CONSTRAINT `fk_tbl_device_id_devicegroup` FOREIGN KEY (`id_devicegroup`) REFERENCES `tbl_devicegroup` (`id_devicegroup`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_devicestatistics`
--
ALTER TABLE `tbl_devicestatistics`
  ADD CONSTRAINT `fk_tbl_devicestatistics_id_device` FOREIGN KEY (`id_device`) REFERENCES `tbl_device` (`id_device`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_executive`
--
ALTER TABLE `tbl_executive`
  ADD CONSTRAINT `fk_tbl_executive_id_position` FOREIGN KEY (`id_position`) REFERENCES `tbl_position` (`id_position`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tbl_executive_id_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_recruitment`
--
ALTER TABLE `tbl_recruitment`
  ADD CONSTRAINT `fk_tbl_recrutiment_id_team` FOREIGN KEY (`id_team`) REFERENCES `tbl_team` (`id_team`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD CONSTRAINT `fk_tbl_schedule_id_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_tbl_user_id_team` FOREIGN KEY (`id_team`) REFERENCES `tbl_team` (`id_team`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
