-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2022 lúc 05:21 PM
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
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

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
(1, 'Chủ nhiệm', '<p>Chịu tr&aacute;ch nhiệm, l&ecirc;n kế hoạch, ph&acirc;n c&ocirc;ng nhiệm vụ chung cho to&agrave;n bộ hoạt động của c&acirc;u lạc bộ.Chịu tr&aacute;ch nhiệm, l&ecirc;n kế hoạch, ph&acirc;n c&ocirc;ng nhiệm vụ chung cho to&agrave;n bộ hoạt động của c&acirc;u lạc bộ.</p>\r\n'),
(2, 'Phó chủ nhiệm', '<p>+ Nhận c&ocirc;ng việc, ph&acirc;n c&ocirc;ng trực tiếp từ chủ nhiệm c&acirc;u lạc bộ. Gi&aacute;m s&aacute;t, quản l&iacute; c&aacute;c bộ phận chức năng li&ecirc;n quan</p>\r\n\r\n<p>+ Theo d&otilde;i, đ&aacute;nh gi&aacute; tiến độ ho&agrave;n th&agrave;nh c&ocirc;ng việc của c&aacute;c ban.</p>\r\n\r\n<p>+ Xếp loại đ&aacute;nh gi&aacute; th&agrave;nh t&iacute;ch của c&aacute;c c&aacute; nh&acirc;n trong c&acirc;u lạc bộ.</p>\r\n\r\n<p>+ Chịu tr&aacute;ch nhiệm l&ecirc;n kế hoạch, tuyển th&agrave;nh vi&ecirc;n cho c&acirc;u lạc bộ.</p>\r\n'),
(3, 'Trưởng ban hành chính', '<p>Hỗ trợ nhập liệu, thống k&ecirc; t&igrave;nh h&igrave;nh điểm danh từ ban nh&acirc;n sự, hỗ trợ tiếp nhận c&aacute;c vấn đề của sinh vi&ecirc;n c&ugrave;ng với thư k&yacute;/gi&aacute;o vụ của bộ m&ocirc;n khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n\r\n<p>Hỗ trợ giảng vi&ecirc;n trong việc nhập liệu, thống k&ecirc;,&hellip; khi c&oacute; y&ecirc;u cầu v&agrave; được sự đồng &yacute; của Trưởng ban v&agrave; Ban chủ nhiệm.</p>\r\n'),
(4, 'Phó ban hành chính', '<p>Hỗ trợ nhập liệu, thống k&ecirc; t&igrave;nh h&igrave;nh điểm danh từ ban nh&acirc;n sự, hỗ trợ tiếp nhận c&aacute;c vấn đề của sinh vi&ecirc;n c&ugrave;ng với thư k&yacute;/gi&aacute;o vụ của bộ m&ocirc;n khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n\r\n<p>Hỗ trợ giảng vi&ecirc;n trong việc nhập liệu, thống k&ecirc;,&hellip; khi c&oacute; y&ecirc;u cầu v&agrave; được sự đồng &yacute; của Trưởng ban v&agrave; Ban chủ nhiệm.</p>\r\n'),
(5, 'Trưởng ban nhân sự', '<p>Hỗ trợ cho c&aacute;c lớp học kỹ năng, chuẩn bị c&aacute;c dụng cụ, vật dụng; điều phối, gi&aacute;m s&aacute;t, quản l&yacute; t&igrave;nh h&igrave;nh lớp học; hỗ trợ cho giảng vi&ecirc;n/b&aacute;o c&aacute;o vi&ecirc;n đứng lớp. Hỗ trợ giảng vi&ecirc;n trong qu&aacute; tr&igrave;nh đứng lớp khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n'),
(6, 'Phó ban nhân sự', '<p>Hỗ trợ cho c&aacute;c lớp học kỹ năng, chuẩn bị c&aacute;c dụng cụ, vật dụng; điều phối, gi&aacute;m s&aacute;t, quản l&yacute; t&igrave;nh h&igrave;nh lớp học; hỗ trợ cho giảng vi&ecirc;n/b&aacute;o c&aacute;o vi&ecirc;n đứng lớp. Hỗ trợ giảng vi&ecirc;n trong qu&aacute; tr&igrave;nh đứng lớp khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n'),
(7, 'Trưởng ban truyền thông', '<p>X&acirc;y dựng kế hoạch v&agrave; tổ chức c&aacute;c buổi chia sẻ, hoạt động ngoại kh&oacute;a, thiện nguyện, &hellip; cho c&acirc;u lạc bộ.</p>\r\n\r\n<p>Chịu tr&aacute;ch nhiệm ch&iacute;nh về truyền th&ocirc;ng cho c&acirc;u lạc bộ. Quản l&yacute; Fanpage của c&acirc;u lạc bộ, cung cấp h&igrave;nh ảnh của đội, viết b&agrave;i, đưa th&ocirc;ng tin về c&aacute;c kỹ năng sống, kỹ năng bổ trợ đến gần với sinh vi&ecirc;n.</p>\r\n'),
(8, 'Phó ban truyền thông', '<p>X&acirc;y dựng kế hoạch v&agrave; tổ chức c&aacute;c buổi chia sẻ, hoạt động ngoại kh&oacute;a, thiện nguyện, &hellip; cho c&acirc;u lạc bộ.</p>\r\n\r\n<p>Chịu tr&aacute;ch nhiệm ch&iacute;nh về truyền th&ocirc;ng cho c&acirc;u lạc bộ. Quản l&yacute; Fanpage của c&acirc;u lạc bộ, cung cấp h&igrave;nh ảnh của đội, viết b&agrave;i, đưa th&ocirc;ng tin về c&aacute;c kỹ năng sống, kỹ năng bổ trợ đến gần với sinh vi&ecirc;n.</p>\r\n');

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

--
-- Đang đổ dữ liệu cho bảng `tbl_recruitment`
--

INSERT INTO `tbl_recruitment` (`id_recruitment`, `fullname`, `id_student`, `faculty`, `birthday`, `per_email`, `stu_email`, `phone`, `facebook`, `id_team`, `resolution`, `content1`, `content2`, `content3`, `content4`, `content5`, `content6`) VALUES
(1, 'Lê Trí Đức', '51900040', 'Khoa công nghệ thông tin', '2022-01-05', 'letriduc@gmail.com', '51900040@student.tdtu.edu.vn', 377025449, 'https://www.facebook.com/ltrduc/', 1, 1, 'Nhằm giúp các bạn sinh viên giải đáp các thắc mắc và đóng góp xây dựng về những môn học thuộc bộ môn kỹ năng phát triển và bền vững, CLB Kỹ năng sống (LSA) cùng với các Thầy/Cô Tổ bộ môn kỹ năng tạo form này để các bạn có thể gửi câu hỏi và đóng góp của mình để bộ môn kỹ năng giải đáp và xây dựng Tổ bộ môn kỹ năng ngày càng hoàn thiện. ', 'Nhằm giúp các bạn sinh viên giải đáp các thắc mắc và đóng góp xây dựng về những môn học thuộc bộ môn kỹ năng phát triển và bền vững, CLB Kỹ năng sống (LSA) cùng với các Thầy/Cô Tổ bộ môn kỹ năng tạo form này để các bạn có thể gửi câu hỏi và đóng góp của mình để bộ môn kỹ năng giải đáp và xây dựng Tổ bộ môn kỹ năng ngày càng hoàn thiện. ', 'Nhằm giúp các bạn sinh viên giải đáp các thắc mắc và đóng góp xây dựng về những môn học thuộc bộ môn kỹ năng phát triển và bền vững, CLB Kỹ năng sống (LSA) cùng với các Thầy/Cô Tổ bộ môn kỹ năng tạo form này để các bạn có thể gửi câu hỏi và đóng góp của mình để bộ môn kỹ năng giải đáp và xây dựng Tổ bộ môn kỹ năng ngày càng hoàn thiện. ', 'Nhằm giúp các bạn sinh viên giải đáp các thắc mắc và đóng góp xây dựng về những môn học thuộc bộ môn kỹ năng phát triển và bền vững, CLB Kỹ năng sống (LSA) cùng với các Thầy/Cô Tổ bộ môn kỹ năng tạo form này để các bạn có thể gửi câu hỏi và đóng góp của mình để bộ môn kỹ năng giải đáp và xây dựng Tổ bộ môn kỹ năng ngày càng hoàn thiện. ', 'Nhằm giúp các bạn sinh viên giải đáp các thắc mắc và đóng góp xây dựng về những môn học thuộc bộ môn kỹ năng phát triển và bền vững, CLB Kỹ năng sống (LSA) cùng với các Thầy/Cô Tổ bộ môn kỹ năng tạo form này để các bạn có thể gửi câu hỏi và đóng góp của mình để bộ môn kỹ năng giải đáp và xây dựng Tổ bộ môn kỹ năng ngày càng hoàn thiện. ', 'Nhằm giúp các bạn sinh viên giải đáp các thắc mắc và đóng góp xây dựng về những môn học thuộc bộ môn kỹ năng phát triển và bền vững, CLB Kỹ năng sống (LSA) cùng với các Thầy/Cô Tổ bộ môn kỹ năng tạo form này để các bạn có thể gửi câu hỏi và đóng góp của mình để bộ môn kỹ năng giải đáp và xây dựng Tổ bộ môn kỹ năng ngày càng hoàn thiện. ');

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
(1, 'Ban hành chính', 'Hỗ trợ nhập liệu, thống kê tình hình điểm danh từ ban nhân sự, hỗ trợ tiếp nhận các vấn đề của sinh viên cùng với thư ký/giáo vụ của bộ môn khi có sự phân công.\nHỗ trợ giảng viên trong việc nhập liệu, thống kê,… khi có yêu cầu và được sự đồng ý của Trưởng'),
(2, 'Ban truyền thông', 'Xây dựng kế hoạch và tổ chức các buổi chia sẻ, hoạt động ngoại khóa, thiện nguyện, … cho câu lạc bộ. \nChịu trách nhiệm chính về truyền thông cho câu lạc bộ. Quản lý Fanpage của câu lạc bộ, cung cấp hình ảnh của đội, viết bài, đưa thông tin về các kỹ năng '),
(3, 'Ban nhân sự', '<p>Hỗ trợ cho c&aacute;c lớp học kỹ năng, chuẩn bị c&aacute;c dụng cụ, vật dụng; điều phối, gi&aacute;m s&aacute;t, quản l&yacute; t&igrave;nh h&igrave;nh lớp học; hỗ trợ cho giảng vi&ecirc;n/b&aacute;o c&aacute;o vi&ecirc;n đứng lớp. Hỗ trợ giảng vi&ecirc;n trong qu&aacute; tr&igrave;nh đứng lớp khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n');

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
(1, '51900162', '01a542ee4e0aed3dd54e5ade72ba7d74', 'Nguyễn Thị Thảo Như', NULL, NULL, 1, NULL, 0, 3, 0),
(2, '51900030', '17dd54b49eadccf8e149e6d224fd99d9', 'Nguyễn Quốc Đạt', NULL, NULL, 2, NULL, 0, 3, 0),
(3, '019H0292', 'a4cbde89381503582267fcf7af3287c3', 'Nguyễn Mỹ Anh', NULL, NULL, 2, NULL, 0, 3, 0),
(4, '51900076', 'dd9aae0b3d924c646b5f52614ba570e9', 'Nguyễn Trần Minh Hoa', NULL, NULL, 3, NULL, 0, 3, 0),
(5, '51900040', '9774532db8f52128d641b1016f9728c7', 'Lê Trí Đức', NULL, NULL, 1, NULL, 0, 3, 0);

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
  MODIFY `id_executive` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id_position` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_recruitment`
--
ALTER TABLE `tbl_recruitment`
  MODIFY `id_recruitment` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id_team` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_executive`
--
ALTER TABLE `tbl_executive`
  ADD CONSTRAINT `fk_tbl_executive_id_position` FOREIGN KEY (`id_position`) REFERENCES `tbl_position` (`id_position`),
  ADD CONSTRAINT `fk_tbl_executive_id_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Các ràng buộc cho bảng `tbl_recruitment`
--
ALTER TABLE `tbl_recruitment`
  ADD CONSTRAINT `fk_tbl_recrutiment_id_team` FOREIGN KEY (`id_team`) REFERENCES `tbl_team` (`id_team`);

--
-- Các ràng buộc cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_tbl_user_id_team` FOREIGN KEY (`id_team`) REFERENCES `tbl_team` (`id_team`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
