-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2022 lúc 12:52 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.14

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
-- Cấu trúc bảng cho bảng `tbl_executive`
--

CREATE TABLE `tbl_executive` (
  `id_executive` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_position` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_executive`
--

INSERT INTO `tbl_executive` (`id_executive`, `id_user`, `id_position`) VALUES
(1, 15, 1),
(2, 2, 2),
(3, 1, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 9, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id_position` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_position`
--

INSERT INTO `tbl_position` (`id_position`, `name`, `description`) VALUES
(1, 'Chủ Nhiệm', '<p>Chịu tr&aacute;ch nhiệm, l&ecirc;n kế hoạch, ph&acirc;n c&ocirc;ng nhiệm vụ chung cho to&agrave;n bộ hoạt động của c&acirc;u lạc bộ.</p>\r\n'),
(2, 'Phó Chủ Nhiệm', '<p>- Nhận c&ocirc;ng việc, ph&acirc;n c&ocirc;ng trực tiếp từ chủ nhiệm c&acirc;u lạc bộ. Gi&aacute;m s&aacute;t, quản l&iacute; c&aacute;c bộ phận chức năng li&ecirc;n quan</p>\r\n\r\n<p>- Theo d&otilde;i, đ&aacute;nh gi&aacute; tiến độ ho&agrave;n th&agrave;nh c&ocirc;ng việc của c&aacute;c ban.</p>\r\n\r\n<p>- Xếp loại đ&aacute;nh gi&aacute; th&agrave;nh t&iacute;ch của c&aacute;c c&aacute; nh&acirc;n trong c&acirc;u lạc bộ.</p>\r\n\r\n<p>- Chịu tr&aacute;ch nhiệm l&ecirc;n kế hoạch, tuyển th&agrave;nh vi&ecirc;n cho c&acirc;u lạc bộ.</p>\r\n'),
(3, 'Trưởng ban Hành Chính', '<p>- Hỗ trợ nhập liệu, thống k&ecirc; t&igrave;nh h&igrave;nh điểm danh từ ban nh&acirc;n sự, hỗ trợ tiếp nhận c&aacute;c vấn đề của sinh vi&ecirc;n c&ugrave;ng với thư k&yacute;/gi&aacute;o vụ của bộ m&ocirc;n khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n\r\n<p>- Hỗ trợ giảng vi&ecirc;n trong việc nhập liệu, thống k&ecirc;,&hellip; khi c&oacute; y&ecirc;u cầu v&agrave; được sự đồng &yacute; của Trưởng ban v&agrave; Ban chủ nhiệm.</p>\r\n'),
(4, 'Phó ban Hành Chính', '<p>- Hỗ trợ nhập liệu, thống k&ecirc; t&igrave;nh h&igrave;nh điểm danh từ ban nh&acirc;n sự, hỗ trợ tiếp nhận c&aacute;c vấn đề của sinh vi&ecirc;n c&ugrave;ng với thư k&yacute;/gi&aacute;o vụ của bộ m&ocirc;n khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n\r\n<p>- Hỗ trợ giảng vi&ecirc;n trong việc nhập liệu, thống k&ecirc;,&hellip; khi c&oacute; y&ecirc;u cầu v&agrave; được sự đồng &yacute; của Trưởng ban v&agrave; Ban chủ nhiệm.</p>\r\n'),
(5, 'Trưởng ban Nhân Sự', '<p>Hỗ trợ cho c&aacute;c lớp học kỹ năng, chuẩn bị c&aacute;c dụng cụ, vật dụng; điều phối, gi&aacute;m s&aacute;t, quản l&yacute; t&igrave;nh h&igrave;nh lớp học; hỗ trợ cho giảng vi&ecirc;n/b&aacute;o c&aacute;o vi&ecirc;n đứng lớp. Hỗ trợ giảng vi&ecirc;n trong qu&aacute; tr&igrave;nh đứng lớp khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n'),
(6, 'Phó ban Nhân Sự', '<p>Hỗ trợ cho c&aacute;c lớp học kỹ năng, chuẩn bị c&aacute;c dụng cụ, vật dụng; điều phối, gi&aacute;m s&aacute;t, quản l&yacute; t&igrave;nh h&igrave;nh lớp học; hỗ trợ cho giảng vi&ecirc;n/b&aacute;o c&aacute;o vi&ecirc;n đứng lớp. Hỗ trợ giảng vi&ecirc;n trong qu&aacute; tr&igrave;nh đứng lớp khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n'),
(7, 'Trưởng ban Sự kiện và Truyền Thông', '<p>- X&acirc;y dựng kế hoạch v&agrave; tổ chức c&aacute;c buổi chia sẻ, hoạt động ngoại kh&oacute;a, thiện nguyện, &hellip; cho c&acirc;u lạc bộ.</p>\r\n\r\n<p>- Chịu tr&aacute;ch nhiệm ch&iacute;nh về truyền th&ocirc;ng cho c&acirc;u lạc bộ. Quản l&yacute; Fanpage của c&acirc;u lạc bộ, cung cấp h&igrave;nh ảnh của đội, viết b&agrave;i, đưa th&ocirc;ng tin về c&aacute;c kỹ năng sống, kỹ năng bổ trợ đến gần với sinh vi&ecirc;n.</p>\r\n'),
(8, 'Phó ban Sự kiện và Truyền Thông - Team Thiết Kế', '<p>- X&acirc;y dựng kế hoạch v&agrave; tổ chức c&aacute;c buổi chia sẻ, hoạt động ngoại kh&oacute;a, thiện nguyện, &hellip; cho c&acirc;u lạc bộ.</p>\r\n\r\n<p>- Chịu tr&aacute;ch nhiệm ch&iacute;nh về truyền th&ocirc;ng cho c&acirc;u lạc bộ. Quản l&yacute; Fanpage của c&acirc;u lạc bộ, cung cấp h&igrave;nh ảnh của đội, viết b&agrave;i, đưa th&ocirc;ng tin về c&aacute;c kỹ năng sống, kỹ năng bổ trợ đến gần với sinh vi&ecirc;n.</p>\r\n'),
(9, 'Phó ban Sự kiện và Truyền Thông - Team Sự Kiện', '<p>- X&acirc;y dựng kế hoạch v&agrave; tổ chức c&aacute;c buổi chia sẻ, hoạt động ngoại kh&oacute;a, thiện nguyện, &hellip; cho c&acirc;u lạc bộ.</p>\r\n\r\n<p>- Chịu tr&aacute;ch nhiệm ch&iacute;nh về truyền th&ocirc;ng cho c&acirc;u lạc bộ. Quản l&yacute; Fanpage của c&acirc;u lạc bộ, cung cấp h&igrave;nh ảnh của đội, viết b&agrave;i, đưa th&ocirc;ng tin về c&aacute;c kỹ năng sống, kỹ năng bổ trợ đến gần với sinh vi&ecirc;n.</p>\r\n'),
(10, 'Phó ban Sự kiện và Truyền Thông - Team Nội Dung', '<p>- X&acirc;y dựng kế hoạch v&agrave; tổ chức c&aacute;c buổi chia sẻ, hoạt động ngoại kh&oacute;a, thiện nguyện, &hellip; cho c&acirc;u lạc bộ.</p>\r\n\r\n<p>- Chịu tr&aacute;ch nhiệm ch&iacute;nh về truyền th&ocirc;ng cho c&acirc;u lạc bộ. Quản l&yacute; Fanpage của c&acirc;u lạc bộ, cung cấp h&igrave;nh ảnh của đội, viết b&agrave;i, đưa th&ocirc;ng tin về c&aacute;c kỹ năng sống, kỹ năng bổ trợ đến gần với sinh vi&ecirc;n.</p>\r\n');

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
  `phone` int(11) NOT NULL,
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
  `phone` int(11) DEFAULT NULL,
  `role` int(1) NOT NULL,
  `level` int(1) NOT NULL DEFAULT 3,
  `activate` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_student`, `password`, `fullname`, `birthday`, `facebook`, `id_team`, `phone`, `role`, `level`, `activate`) VALUES
(1, '51900040', '9774532db8f52128d641b1016f9728c7', 'Lê Trí Đức', NULL, NULL, 1, NULL, 0, 0, 0),
(2, 'H1900308', 'c87566fe171afba085d2c43088176e26', 'Nguyễn Nhật Quyên', NULL, NULL, 1, NULL, 0, 0, 0),
(3, '11900067', 'ee215d2465ef614e8cf9c16beae17a32', 'Phạm Ngọc Minh Thư', NULL, NULL, 1, NULL, 0, 3, 0),
(4, '520H0401', '3ab20c95f18788229224f4fbc8531a15', 'Lê Gia Phú', NULL, NULL, 1, NULL, 0, 0, 0),
(5, 'B19H0160', '4b233c55470bafcfaef8b0b310f5512a', 'Nguyễn Trần Phương Anh', NULL, NULL, 2, NULL, 0, 0, 0),
(6, '51900119', '32e52bea4a9c000291c04d834c0f1d2b', 'Lê Thành Đăng Khoa', NULL, NULL, 2, NULL, 0, 0, 0),
(7, '41900552', '3237d7b0be2ebc85beac9ae7e73fb0bb', 'Huỳnh Quốc Thắng', NULL, NULL, 2, NULL, 0, 3, 0),
(8, '61900566', 'ba29c56c881c768be1d44f3bdcdbaccb', 'Ngô Trần Ngọc Thuận', NULL, NULL, 2, NULL, 0, 3, 0),
(9, '019H0292', 'a4cbde89381503582267fcf7af3287c3', 'Nguyễn Mỹ Anh', NULL, NULL, 3, NULL, 0, 0, 0),
(10, '720H1519', '34407949dee2cd3056e38e5cae9d02a5', 'Hoàng Ngọc Bảo Châu', NULL, NULL, 3, NULL, 0, 3, 0),
(11, '02000939', 'd1763ac34f6a48a43af7045f32842945', 'Hồ Thị Bích Tuyền', NULL, NULL, 3, NULL, 0, 3, 0),
(12, '020H0363', '2a62fe57d691560853438d40dd4e370e', 'Nguyễn Phạm Kim Ngân', NULL, NULL, 3, NULL, 0, 3, 0),
(13, 'H2000506', 'bbf566384d1e09f37e0b1845301d3c62', 'Lê Thanh Vy', NULL, NULL, 3, NULL, 0, 3, 0),
(14, '32001093', '28871e13c700c6690a6e84b8ce60999a', 'Nguyễn Thị Thư', NULL, NULL, 3, NULL, 0, 3, 0),
(15, '41900468', '9408bb53069de3d9aeadd1d401e0356f', 'Nguyễn Duy Khánh Minh', NULL, NULL, 3, NULL, 0, 0, 0),
(16, '51900076', 'dd9aae0b3d924c646b5f52614ba570e9', 'Nguyễn Trần Minh Hoa', NULL, NULL, NULL, NULL, 1, 3, 0),
(17, '51900162', '01a542ee4e0aed3dd54e5ade72ba7d74', 'Nguyễn Thị Thảo Như', NULL, NULL, NULL, NULL, 1, 3, 0),
(18, '51900030', '17dd54b49eadccf8e149e6d224fd99d9', 'Nguyễn Quốc Đạt', NULL, NULL, NULL, NULL, 1, 3, 0),
(19, 'E20H0347', 'a2a2bea9bcf77c92a714ef3e669e2cdf', 'Phùng Lữ Thế Hoài', NULL, NULL, NULL, NULL, 1, 3, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `tbl_executive`
--
ALTER TABLE `tbl_executive`
  MODIFY `id_executive` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id_position` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_recruitment`
--
ALTER TABLE `tbl_recruitment`
  MODIFY `id_recruitment` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id_team` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

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
-- Các ràng buộc cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_tbl_user_id_team` FOREIGN KEY (`id_team`) REFERENCES `tbl_team` (`id_team`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
