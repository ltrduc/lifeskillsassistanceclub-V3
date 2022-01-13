-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 13, 2022 lúc 11:57 AM
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
-- Cấu trúc bảng cho bảng `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_schoolyear` int(255) NOT NULL,
  `semester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attendance` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `id_user`, `id_schoolyear`, `semester`, `date`, `shift`, `attendance`) VALUES
(1, 1, 6, 'Học kỳ 1', '2022-01-13', 'Ca 1', 'Present'),
(2, 14, 6, 'Học kỳ 1', '2022-01-13', 'Ca 1', 'Present'),
(3, 1, 6, 'Học kỳ 1', '2022-01-13', 'Ca 2', 'Present'),
(4, 2, 6, 'Học kỳ 1', '2022-01-13', 'Ca 2', 'Present'),
(5, 11, 6, 'Học kỳ 1', '2022-01-13', 'Ca 2', 'Present'),
(6, 4, 6, 'Học kỳ 1', '2022-01-13', 'Ca 3', 'Present'),
(7, 11, 6, 'Học kỳ 1', '2022-01-13', 'Ca 3', 'Present'),
(8, 1, 6, 'Học kỳ 1', '2022-01-13', 'Ca 4', 'Present');

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
(1, 1, 1, 0, 0),
(2, 2, 0, 0, 0),
(3, 3, 1, 0, 0),
(4, 4, 1, 0, 0),
(5, 5, 0, 0, 0),
(6, 6, 1, 0, 0),
(7, 7, 0, 0, 0),
(8, 8, 1, 0, 0),
(9, 9, 0, 0, 0),
(10, 10, 1, 0, 0),
(11, 11, 1, 0, 0),
(12, 12, 0, 0, 0),
(13, 13, 0, 0, 0),
(14, 14, 0, 0, 0),
(15, 15, 0, 0, 0),
(16, 16, 0, 0, 0),
(17, 17, 0, 0, 0);

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
(1, 10, 1),
(2, 3, 2),
(3, 1, 3),
(4, 4, 4),
(5, 6, 5),
(6, 8, 6),
(7, 11, 7);

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

--
-- Đang đổ dữ liệu cho bảng `tbl_recruitment`
--

INSERT INTO `tbl_recruitment` (`id_recruitment`, `fullname`, `id_student`, `faculty`, `birthday`, `per_email`, `stu_email`, `phone`, `facebook`, `id_team`, `resolution`, `content1`, `content2`, `content3`, `content4`, `content5`, `content6`) VALUES
(1, 'Nguyễn Văn Hậu', '51900001', 'Công nghệ thông tin', '2001-01-09', 'nguyenvanhau@gmail.com', '51900001@student.tdtu.edu.vn', '968707558', 'https://www.facebook.com/ltrduc/', 1, 1, 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.'),
(2, 'Lê Văn Thành', '51900002', 'Công nghệ thông tin', '2001-01-09', 'levanthanh@gmail.com', '51900002@student.tdtu.edu.vn', '968707555', 'https://www.facebook.com/ltrduc/', 2, 1, 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.'),
(3, 'Trịnh Duy Khánh', '01900002', 'Khoa ngoại ngữ', '2001-01-09', 'trinhduykhanh@gmail.com', '01900002@student.tdtu.edu.vn', '931707555', 'https://www.facebook.com/ltrduc/', 3, 1, 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.', 'Giờ đây, bạn có thể duyệt web ở chế độ riêng tư. Những người khác dùng thiết bị này sẽ không nhìn thấy hoạt động của bạn. Tuy nhiên, hệ thống sẽ lưu các tệp đã tải xuống, dấu trang và các mục có trong danh sách đọc.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_schoolyear`
--

CREATE TABLE `tbl_schoolyear` (
  `id_schoolyear` int(255) NOT NULL,
  `schoolyear` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_schoolyear`
--

INSERT INTO `tbl_schoolyear` (`id_schoolyear`, `schoolyear`) VALUES
(1, '2017-2018'),
(2, '2018-2019'),
(3, '2019-2020'),
(4, '2020-2021'),
(5, '2021-2022'),
(6, '2022-2023');

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
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_student`, `password`, `fullname`, `birthday`, `facebook`, `id_team`, `phone`, `role`) VALUES
(1, '51900040', '9774532db8f52128d641b1016f9728c7', 'Lê Trí Đức', NULL, NULL, 1, NULL, 0),
(2, '51900356', '6d5557fa3520948ab7ec199835968295', 'Tạ Quốc Khánh', NULL, NULL, 1, NULL, 0),
(3, 'H1900308', 'c87566fe171afba085d2c43088176e26', 'Nguyễn Nhật Quyên', NULL, NULL, 1, NULL, 0),
(4, '520H0401', '3ab20c95f18788229224f4fbc8531a15', 'Lê Gia Phú', NULL, NULL, 1, NULL, 0),
(5, 'A2000244', '1f4e65a5c11fc2a437e65aedc2ba11eb', 'Phan Phương Thảo', NULL, NULL, 1, NULL, 0),
(6, 'B19H0160', '4b233c55470bafcfaef8b0b310f5512a', 'Nguyễn Trần Phương Anh', NULL, NULL, 2, NULL, 0),
(7, '020H0214', 'c13aceefb420263e13acbdb5ae57b05b', 'Ngô Nguyễn Minh Anh', NULL, NULL, 2, NULL, 0),
(8, '51900119', '32e52bea4a9c000291c04d834c0f1d2b', 'Lê Thành Đăng Khoa', NULL, NULL, 2, NULL, 0),
(9, '61900381', '12cdb316d70374121cb1cd1b940dda9f', 'Trần Ngọc Châu', NULL, NULL, 2, NULL, 0),
(10, '41900468', '9408bb53069de3d9aeadd1d401e0356f', 'Nguyễn Duy Khánh Minh', NULL, NULL, 3, NULL, 0),
(11, '019H0292', 'a4cbde89381503582267fcf7af3287c3', 'Nguyễn Mỹ Anh', NULL, NULL, 3, NULL, 0),
(12, '720H1519', '34407949dee2cd3056e38e5cae9d02a5', 'Hoàng Ngọc Bảo Châu', NULL, NULL, 3, NULL, 0),
(13, '02000939', 'd1763ac34f6a48a43af7045f32842945', 'Hồ Thị Bích Tuyền', NULL, NULL, 3, NULL, 0),
(14, '51900030', '17dd54b49eadccf8e149e6d224fd99d9', 'Nguyễn Quốc Đạt', NULL, NULL, NULL, NULL, 1),
(15, 'E20H0347', 'a2a2bea9bcf77c92a714ef3e669e2cdf', 'Phùng Lữ Thế Hoài', NULL, NULL, NULL, NULL, 1),
(16, '51900162', '01a542ee4e0aed3dd54e5ade72ba7d74', 'Nguyễn Thị Thảo Như', NULL, NULL, NULL, NULL, 1),
(17, '51900076', 'dd9aae0b3d924c646b5f52614ba570e9', 'Nguyễn Trần Minh Hoa', NULL, NULL, NULL, NULL, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_attendance_id_user` (`id_user`),
  ADD KEY `fk_tbl_attendance_id_schoolyear` (`id_schoolyear`);

--
-- Chỉ mục cho bảng `tbl_decentralization`
--
ALTER TABLE `tbl_decentralization`
  ADD PRIMARY KEY (`id_decentralization`),
  ADD KEY `fk_tbl_decentralization_id_user` (`id_user`);

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
-- Chỉ mục cho bảng `tbl_schoolyear`
--
ALTER TABLE `tbl_schoolyear`
  ADD PRIMARY KEY (`id_schoolyear`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_decentralization`
--
ALTER TABLE `tbl_decentralization`
  MODIFY `id_decentralization` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id_recruitment` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_schoolyear`
--
ALTER TABLE `tbl_schoolyear`
  MODIFY `id_schoolyear` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id_team` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Các ràng buộc cho bảng `tbl_decentralization`
--
ALTER TABLE `tbl_decentralization`
  ADD CONSTRAINT `fk_tbl_decentralization_id_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE;

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
