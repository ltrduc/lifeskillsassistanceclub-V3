-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th2 03, 2022 lúc 04:56 PM
-- Phiên bản máy phục vụ: 10.5.12-MariaDB
-- Phiên bản PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id17609828_lifeskills_db`
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
(10, 10, 0, 0, 0);

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
(1, '51900040', '9774532db8f52128d641b1016f9728c7', 'Lê Trí Đức', NULL, NULL, 1, NULL, 0),
(2, '51900356', '6d5557fa3520948ab7ec199835968295', 'Tạ Quốc Khánh', NULL, NULL, 1, NULL, 0),
(3, 'H1900308', 'c87566fe171afba085d2c43088176e26', 'Nguyễn Nhật Quyên', NULL, NULL, 1, NULL, 0),
(4, '11900067', 'ee215d2465ef614e8cf9c16beae17a32', 'Phạm Ngọc Minh Thư', NULL, NULL, 1, NULL, 0),
(5, '219H0227', '98eaf61ad9feabfb61bac17ab4bf8aaf', 'Bùi Thị Thuỳ Trang', NULL, NULL, 1, NULL, 0),
(6, 'B1900443', '393f83da5ae4f676d6358da3a70f2a15', 'Huỳnh Hữu Khang Vĩ', NULL, NULL, 1, NULL, 0),
(7, '520H0401', '3ab20c95f18788229224f4fbc8531a15', 'Lê Gia Phú', NULL, NULL, 1, NULL, 0),
(8, 'A2000244', '1f4e65a5c11fc2a437e65aedc2ba11eb', 'Phan Phương Thảo', NULL, NULL, 1, NULL, 0),
(9, 'B20H0236', '0e2bc5161f8703ab36d184696e497010', 'Vương Kim Trang', NULL, NULL, 1, NULL, 0),
(10, 'H2000514', '6b4eeafb2df14a94203625c3afd97cf1', 'Trần Kim Xuân', NULL, NULL, 1, NULL, 0);

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
  MODIFY `id_decentralization` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
