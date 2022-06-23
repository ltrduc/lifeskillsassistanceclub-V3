-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 23, 2022 lúc 04:49 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

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

--
-- Đang đổ dữ liệu cho bảng `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id_attendance`, `id_user`, `id_schoolyear`, `semester`, `date`, `shift`, `attendance`) VALUES
(1, 6, 3, 'Học kỳ 2', '2022-02-21', 'Ca 2', 'Present'),
(2, 6, 3, 'Học kỳ 2', '2022-02-21', 'Ca 3', 'Present'),
(3, 6, 3, 'Học kỳ 2', '2022-02-21', 'Ca 4', 'Present'),
(4, 1, 3, 'Học kỳ 2', '2022-02-22', 'Ca 3', 'Present'),
(5, 4, 3, 'Học kỳ 2', '2022-02-22', 'Ca 3', 'Present'),
(6, 9, 3, 'Học kỳ 2', '2022-02-22', 'Ca 1', 'Present'),
(7, 9, 3, 'Học kỳ 2', '2022-02-22', 'Ca 2', 'Present'),
(8, 1, 3, 'Học kỳ 2', '2022-02-22', 'Ca 4', 'Present'),
(9, 4, 3, 'Học kỳ 2', '2022-02-22', 'Ca 4', 'Present'),
(10, 1, 3, 'Học kỳ 2', '2022-02-23', 'Ca 2', 'Present'),
(11, 4, 3, 'Học kỳ 2', '2022-02-23', 'Ca 2', 'Present'),
(12, 10, 3, 'Học kỳ 2', '2022-02-23', 'Ca 2', 'Present'),
(13, 1, 3, 'Học kỳ 2', '2022-02-23', 'Ca 3', 'Present'),
(14, 4, 3, 'Học kỳ 2', '2022-02-23', 'Ca 3', 'Present'),
(15, 6, 3, 'Học kỳ 2', '2022-02-23', 'Ca 3', 'Present'),
(16, 8, 3, 'Học kỳ 2', '2022-02-23', 'Ca 3', 'Present'),
(17, 1, 3, 'Học kỳ 2', '2022-02-23', 'Ca 4', 'Present'),
(18, 10, 3, 'Học kỳ 2', '2022-02-23', 'Ca 4', 'Present'),
(19, 9, 3, 'Học kỳ 2', '2022-02-24', 'Ca 1', 'Present'),
(20, 8, 3, 'Học kỳ 2', '2022-02-24', 'Ca 3', 'Present'),
(21, 9, 3, 'Học kỳ 2', '2022-02-24', 'Ca 3', 'Present'),
(22, 1, 3, 'Học kỳ 2', '2022-02-25', 'Ca 1', 'Present'),
(23, 9, 3, 'Học kỳ 2', '2022-02-25', 'Ca 1', 'Present'),
(24, 7, 3, 'Học kỳ 2', '2022-02-25', 'Ca 1', 'Present'),
(25, 1, 3, 'Học kỳ 2', '2022-02-25', 'Ca 2', 'Present'),
(26, 6, 3, 'Học kỳ 2', '2022-02-25', 'Ca 2', 'Present'),
(27, 7, 3, 'Học kỳ 2', '2022-02-25', 'Ca 2', 'Present'),
(28, 9, 3, 'Học kỳ 2', '2022-02-25', 'Ca 2', 'Present'),
(29, 1, 3, 'Học kỳ 2', '2022-02-25', 'Ca 3', 'Present'),
(30, 6, 3, 'Học kỳ 2', '2022-02-25', 'Ca 3', 'Present'),
(31, 7, 3, 'Học kỳ 2', '2022-02-25', 'Ca 3', 'Present'),
(32, 8, 3, 'Học kỳ 2', '2022-02-25', 'Ca 3', 'Present'),
(33, 1, 3, 'Học kỳ 2', '2022-02-28', 'Ca 3', 'Present'),
(35, 1, 3, 'Học kỳ 2', '2022-02-28', 'Ca 4', 'Present'),
(37, 1, 3, 'Học kỳ 2', '2022-02-28', 'Ca 2', 'Present'),
(38, 9, 3, 'Học kỳ 2', '2022-03-01', 'Ca 1', 'Present'),
(39, 4, 3, 'Học kỳ 2', '2022-03-01', 'Ca 2', 'Present'),
(40, 9, 3, 'Học kỳ 2', '2022-03-01', 'Ca 2', 'Present'),
(41, 1, 3, 'Học kỳ 2', '2022-03-01', 'Ca 3', 'Present'),
(42, 4, 3, 'Học kỳ 2', '2022-03-01', 'Ca 3', 'Present'),
(43, 9, 3, 'Học kỳ 2', '2022-03-01', 'Ca 3', 'Present'),
(44, 8, 3, 'Học kỳ 2', '2022-03-03', 'Ca 3', 'Present'),
(45, 9, 3, 'Học kỳ 2', '2022-03-03', 'Ca 3', 'Present'),
(46, 1, 3, 'Học kỳ 2', '2022-03-02', 'Ca 2', 'Present'),
(47, 4, 3, 'Học kỳ 2', '2022-03-02', 'Ca 2', 'Present'),
(48, 1, 3, 'Học kỳ 2', '2022-03-02', 'Ca 3', 'Present'),
(49, 4, 3, 'Học kỳ 2', '2022-03-02', 'Ca 3', 'Present'),
(50, 1, 3, 'Học kỳ 2', '2022-03-02', 'Ca 4', 'Present'),
(51, 4, 3, 'Học kỳ 2', '2022-03-02', 'Ca 4', 'Present'),
(52, 9, 3, 'Học kỳ 2', '2022-03-03', 'Ca 4', 'Present'),
(53, 1, 3, 'Học kỳ 2', '2022-03-04', 'Ca 1', 'Present'),
(54, 1, 3, 'Học kỳ 2', '2022-03-04', 'Ca 2', 'Present'),
(55, 1, 3, 'Học kỳ 2', '2022-03-04', 'Ca 3', 'Present'),
(56, 8, 3, 'Học kỳ 2', '2022-03-04', 'Ca 3', 'Present'),
(58, 5, 3, 'Học kỳ 2', '2022-03-08', 'Ca 2', 'Present'),
(59, 9, 3, 'Học kỳ 2', '2022-03-08', 'Ca 2', 'Present'),
(60, 9, 3, 'Học kỳ 2', '2022-03-08', 'Ca 1', 'Present'),
(61, 5, 3, 'Học kỳ 2', '2022-03-08', 'Ca 3', 'Present'),
(62, 5, 3, 'Học kỳ 2', '2022-03-08', 'Ca 4', 'Present'),
(63, 4, 3, 'Học kỳ 2', '2022-03-09', 'Ca 2', 'Present'),
(64, 7, 3, 'Học kỳ 2', '2022-03-09', 'Ca 2', 'Present'),
(65, 4, 3, 'Học kỳ 2', '2022-03-09', 'Ca 3', 'Present'),
(66, 7, 3, 'Học kỳ 2', '2022-03-09', 'Ca 3', 'Present'),
(67, 4, 3, 'Học kỳ 2', '2022-03-09', 'Ca 4', 'Present'),
(68, 7, 3, 'Học kỳ 2', '2022-03-09', 'Ca 4', 'Present'),
(70, 9, 3, 'Học kỳ 2', '2022-03-11', 'Ca 2', 'Present'),
(71, 5, 3, 'Học kỳ 2', '2022-03-13', 'Ca 3', 'Present'),
(72, 5, 3, 'Học kỳ 2', '2022-03-11', 'Ca 4', 'Present'),
(73, 9, 3, 'Học kỳ 2', '2022-03-11', 'Ca 4', 'Present'),
(74, 9, 3, 'Học kỳ 2', '2022-03-11', 'Ca 1', 'Present'),
(75, 5, 3, 'Học kỳ 2', '2022-03-11', 'Ca 3', 'Present'),
(76, 9, 3, 'Học kỳ 2', '2022-03-25', 'Ca 1', 'Present'),
(77, 8, 3, 'Học kỳ 2', '2022-03-25', 'Ca 4', 'Present'),
(78, 9, 3, 'Học kỳ 2', '2022-03-25', 'Ca 4', 'Present'),
(79, 12, 3, 'Học kỳ 2', '2022-03-25', 'Ca 4', 'Present'),
(80, 14, 3, 'Học kỳ 2', '2022-03-25', 'Ca 4', 'Present'),
(81, 9, 3, 'Học kỳ 2', '2022-03-25', 'Ca 2', 'Present'),
(82, 48, 3, 'Học kỳ 2', '2022-03-30', 'Ca 1', 'Present'),
(83, 48, 3, 'Học kỳ 2', '2022-03-30', 'Ca 2', 'Present'),
(84, 48, 3, 'Học kỳ 2', '2022-03-30', 'Ca 3', 'Present'),
(85, 48, 3, 'Học kỳ 2', '2022-03-30', 'Ca 4', 'Present'),
(86, 1, 3, 'Học kỳ 2', '2022-04-03', 'Ca 2', 'Present'),
(87, 24, 3, 'Học kỳ 2', '2022-04-03', 'Ca 2', 'Present'),
(88, 1, 3, 'Học kỳ 2', '2022-04-03', 'Ca 3', 'Present'),
(89, 24, 3, 'Học kỳ 2', '2022-04-03', 'Ca 3', 'Present'),
(90, 24, 3, 'Học kỳ 2', '2022-04-03', 'Ca 4', 'Present'),
(91, 16, 3, 'Học kỳ 2', '2022-04-03', 'Ca 2', 'Present'),
(92, 45, 3, 'Học kỳ 2', '2022-04-03', 'Ca 2', 'Present'),
(93, 4, 3, 'Học kỳ 2', '2022-06-03', 'Ca 3', 'Present'),
(94, 16, 3, 'Học kỳ 2', '2022-06-03', 'Ca 3', 'Present'),
(95, 24, 3, 'Học kỳ 2', '2022-06-03', 'Ca 3', 'Present'),
(96, 45, 3, 'Học kỳ 2', '2022-06-03', 'Ca 3', 'Present'),
(97, 48, 3, 'Học kỳ 2', '2022-05-03', 'Ca 1', 'Present'),
(98, 1, 3, 'Học kỳ 2', '2022-08-03', 'Ca 1', 'Present'),
(99, 1, 3, 'Học kỳ 2', '2022-08-04', 'Ca 2', 'Present'),
(100, 24, 3, 'Học kỳ 2', '2022-08-04', 'Ca 2', 'Present'),
(101, 1, 3, 'Học kỳ 2', '2022-08-04', 'Ca 3', 'Present'),
(102, 24, 3, 'Học kỳ 2', '2022-04-08', 'Ca 3', 'Present'),
(103, 24, 3, 'Học kỳ 2', '2022-04-08', 'Ca 4', 'Present'),
(104, 9, 3, 'Học kỳ 2', '2022-04-12', 'Ca 1', 'Present'),
(105, 9, 3, 'Học kỳ 2', '2022-04-12', 'Ca 2', 'Present'),
(106, 9, 3, 'Học kỳ 2', '2022-04-12', 'Ca 3', 'Present'),
(107, 24, 3, 'Học kỳ 2', '2022-04-12', 'Ca 2', 'Present'),
(108, 1, 3, 'Học kỳ 2', '2022-04-12', 'Ca 3', 'Present'),
(109, 16, 3, 'Học kỳ 2', '2022-04-13', 'Ca 3', 'Present'),
(110, 45, 3, 'Học kỳ 2', '2022-04-13', 'Ca 3', 'Present'),
(111, 48, 3, 'Học kỳ 2', '2022-04-13', 'Ca 3', 'Present'),
(112, 48, 3, 'Học kỳ 2', '2022-04-14', 'Ca 3', 'Present'),
(113, 48, 3, 'Học kỳ 2', '2022-04-14', 'Ca 4', 'Present'),
(114, 1, 3, 'Học kỳ 2', '2022-04-15', 'Ca 1', 'Present'),
(115, 1, 3, 'Học kỳ 2', '2022-04-15', 'Ca 2', 'Present'),
(116, 9, 3, 'Học kỳ 2', '2022-04-15', 'Ca 2', 'Present'),
(117, 1, 3, 'Học kỳ 2', '2022-04-15', 'Ca 3', 'Present'),
(118, 9, 3, 'Học kỳ 2', '2022-04-15', 'Ca 3', 'Present'),
(119, 12, 3, 'Học kỳ 2', '2022-04-15', 'Ca 4', 'Present'),
(120, 1, 3, 'Học kỳ 2', '2022-04-19', 'Ca 1', 'Present'),
(121, 9, 3, 'Học kỳ 2', '2022-04-19', 'Ca 1', 'Present'),
(124, 1, 3, 'Học kỳ 2', '2022-04-19', 'Ca 2', 'Present'),
(125, 9, 3, 'Học kỳ 2', '2022-04-19', 'Ca 2', 'Present'),
(126, 1, 3, 'Học kỳ 2', '2022-04-19', 'Ca 3', 'Present'),
(127, 9, 3, 'Học kỳ 2', '2022-04-19', 'Ca 3', 'Present'),
(129, 16, 3, 'Học kỳ 2', '2022-04-19', 'Ca 3', 'Present'),
(130, 24, 3, 'Học kỳ 2', '2022-04-19', 'Ca 3', 'Present'),
(131, 45, 3, 'Học kỳ 2', '2022-04-19', 'Ca 3', 'Present'),
(132, 1, 3, 'Học kỳ 2', '2022-04-19', 'Ca 4', 'Present'),
(134, 9, 3, 'Học kỳ 2', '2022-04-19', 'Ca 4', 'Present'),
(136, 16, 3, 'Học kỳ 2', '2022-04-19', 'Ca 4', 'Present'),
(137, 24, 3, 'Học kỳ 2', '2022-04-19', 'Ca 4', 'Present'),
(138, 45, 3, 'Học kỳ 2', '2022-04-19', 'Ca 4', 'Present'),
(139, 1, 3, 'Học kỳ 2', '2022-04-20', 'Ca 2', 'Present'),
(140, 24, 3, 'Học kỳ 2', '2022-04-20', 'Ca 2', 'Present'),
(141, 1, 3, 'Học kỳ 2', '2022-04-20', 'Ca 3', 'Present'),
(142, 24, 3, 'Học kỳ 2', '2022-04-20', 'Ca 3', 'Present'),
(143, 1, 3, 'Học kỳ 2', '2022-04-20', 'Ca 4', 'Present'),
(144, 1, 3, 'Học kỳ 2', '2022-04-21', 'Ca 3', 'Present'),
(145, 19, 3, 'Học kỳ 2', '2022-04-21', 'Ca 3', 'Present'),
(146, 48, 3, 'Học kỳ 2', '2022-04-21', 'Ca 3', 'Present'),
(147, 1, 3, 'Học kỳ 2', '2022-04-21', 'Ca 4', 'Present'),
(148, 19, 3, 'Học kỳ 2', '2022-04-21', 'Ca 4', 'Present'),
(149, 9, 3, 'Học kỳ 2', '2022-04-22', 'Ca 1', 'Present'),
(150, 9, 3, 'Học kỳ 2', '2022-04-22', 'Ca 2', 'Present'),
(151, 19, 3, 'Học kỳ 2', '2022-04-25', 'Ca 2', 'Present'),
(152, 9, 3, 'Học kỳ 2', '2022-04-26', 'Ca 1', 'Present'),
(153, 9, 3, 'Học kỳ 2', '2022-04-26', 'Ca 2', 'Present'),
(154, 9, 3, 'Học kỳ 2', '2022-04-26', 'Ca 3', 'Present'),
(155, 9, 3, 'Học kỳ 2', '2022-04-26', 'Ca 4', 'Present'),
(156, 1, 3, 'Học kỳ 2', '2022-04-27', 'Ca 3', 'Present'),
(157, 10, 3, 'Học kỳ 2', '2022-04-27', 'Ca 3', 'Present'),
(158, 19, 3, 'Học kỳ 2', '2022-04-27', 'Ca 3', 'Present'),
(159, 1, 3, 'Học kỳ 2', '2022-04-27', 'Ca 4', 'Present'),
(160, 10, 3, 'Học kỳ 2', '2022-04-27', 'Ca 4', 'Present'),
(161, 48, 3, 'Học kỳ 2', '2022-04-28', 'Ca 3', 'Present'),
(162, 48, 3, 'Học kỳ 2', '2022-04-28', 'Ca 4', 'Present'),
(163, 9, 3, 'Học kỳ 2', '2022-04-29', 'Ca 1', 'Present'),
(164, 9, 3, 'Học kỳ 2', '2022-04-29', 'Ca 2', 'Present'),
(165, 9, 3, 'Học kỳ 2', '2022-04-29', 'Ca 3', 'Present'),
(166, 1, 3, 'Học kỳ 2', '2022-05-09', 'Ca 3', 'Present'),
(167, 48, 3, 'Học kỳ 2', '2022-05-09', 'Ca 3', 'Present'),
(168, 1, 3, 'Học kỳ 2', '2022-05-10', 'Ca 3', 'Present'),
(169, 1, 3, 'Học kỳ 2', '2022-05-11', 'Ca 1', 'Present'),
(170, 9, 3, 'Học kỳ 2', '2022-05-11', 'Ca 1', 'Present'),
(171, 48, 3, 'Học kỳ 2', '2022-05-11', 'Ca 1', 'Present'),
(172, 1, 3, 'Học kỳ 2', '2022-05-11', 'Ca 2', 'Present'),
(173, 48, 3, 'Học kỳ 2', '2022-05-11', 'Ca 2', 'Present'),
(174, 5, 3, 'Học kỳ 2', '2022-05-11', 'Ca 2', 'Present'),
(175, 5, 3, 'Học kỳ 2', '2022-05-11', 'Ca 3', 'Present'),
(176, 9, 3, 'Học kỳ 2', '2022-05-11', 'Ca 3', 'Present'),
(177, 19, 3, 'Học kỳ 2', '2022-05-11', 'Ca 3', 'Present'),
(178, 48, 3, 'Học kỳ 2', '2022-05-11', 'Ca 3', 'Present'),
(179, 5, 3, 'Học kỳ 2', '2022-05-11', 'Ca 4', 'Present'),
(180, 9, 3, 'Học kỳ 2', '2022-05-11', 'Ca 4', 'Present'),
(181, 19, 3, 'Học kỳ 2', '2022-05-11', 'Ca 4', 'Present'),
(182, 7, 3, 'Học kỳ 2', '2022-05-13', 'Ca 3', 'Present'),
(183, 9, 3, 'Học kỳ 2', '2022-05-13', 'Ca 3', 'Present'),
(184, 19, 3, 'Học kỳ 2', '2022-05-13', 'Ca 3', 'Present'),
(185, 14, 3, 'Học kỳ 2', '2022-05-12', 'Ca 3', 'Present'),
(186, 17, 3, 'Học kỳ 2', '2022-05-12', 'Ca 3', 'Present'),
(187, 48, 3, 'Học kỳ 2', '2022-05-12', 'Ca 3', 'Present'),
(188, 48, 3, 'Học kỳ 2', '2022-05-12', 'Ca 4', 'Present'),
(189, 1, 3, 'Học kỳ 2', '2022-05-13', 'Ca 3', 'Present'),
(190, 8, 3, 'Học kỳ 2', '2022-05-13', 'Ca 3', 'Present'),
(191, 31, 3, 'Học kỳ 2', '2022-05-13', 'Ca 3', 'Present'),
(192, 1, 3, 'Học kỳ 2', '2022-05-13', 'Ca 4', 'Present'),
(193, 7, 3, 'Học kỳ 2', '2022-05-13', 'Ca 4', 'Present'),
(194, 8, 3, 'Học kỳ 2', '2022-05-13', 'Ca 4', 'Present'),
(195, 9, 3, 'Học kỳ 2', '2022-05-13', 'Ca 4', 'Present'),
(196, 19, 3, 'Học kỳ 2', '2022-05-13', 'Ca 4', 'Present'),
(197, 31, 3, 'Học kỳ 2', '2022-05-13', 'Ca 4', 'Present'),
(198, 9, 3, 'Học kỳ 2', '2022-05-17', 'Ca 1', 'Present'),
(199, 9, 3, 'Học kỳ 2', '2022-05-17', 'Ca 2', 'Present'),
(200, 1, 3, 'Học kỳ 2', '2022-05-19', 'Ca 3', 'Present'),
(202, 7, 3, 'Học kỳ 2', '2022-05-19', 'Ca 3', 'Present'),
(203, 8, 3, 'Học kỳ 2', '2022-05-19', 'Ca 3', 'Present'),
(204, 9, 3, 'Học kỳ 2', '2022-05-19', 'Ca 3', 'Present'),
(206, 18, 3, 'Học kỳ 2', '2022-05-19', 'Ca 3', 'Present'),
(207, 19, 3, 'Học kỳ 2', '2022-05-19', 'Ca 3', 'Present'),
(208, 1, 3, 'Học kỳ 2', '2022-05-19', 'Ca 4', 'Present'),
(209, 7, 3, 'Học kỳ 2', '2022-05-19', 'Ca 4', 'Present'),
(210, 8, 3, 'Học kỳ 2', '2022-05-19', 'Ca 4', 'Present'),
(211, 9, 3, 'Học kỳ 2', '2022-05-19', 'Ca 4', 'Present'),
(213, 19, 3, 'Học kỳ 2', '2022-05-19', 'Ca 4', 'Present'),
(214, 24, 3, 'Học kỳ 2', '2022-05-19', 'Ca 4', 'Present'),
(215, 24, 3, 'Học kỳ 2', '2022-05-19', 'Ca 3', 'Present'),
(216, 16, 3, 'Học kỳ 2', '2022-05-19', 'Ca 3', 'Present'),
(217, 8, 3, 'Học kỳ 2', '2022-05-20', 'Ca 3', 'Present'),
(218, 9, 3, 'Học kỳ 2', '2022-05-20', 'Ca 3', 'Present'),
(219, 19, 3, 'Học kỳ 2', '2022-05-20', 'Ca 3', 'Present'),
(220, 48, 3, 'Học kỳ 2', '2022-05-23', 'Ca 3', 'Present'),
(221, 7, 3, 'Học kỳ 2', '2022-05-23', 'Ca 4', 'Present'),
(222, 24, 3, 'Học kỳ 2', '2022-05-24', 'Ca 3', 'Present'),
(223, 24, 3, 'Học kỳ 2', '2022-05-24', 'Ca 4', 'Present'),
(224, 1, 3, 'Học kỳ 2', '2022-05-25', 'Ca 2', 'Present'),
(225, 9, 3, 'Học kỳ 2', '2022-05-26', 'Ca 1', 'Present'),
(226, 1, 3, 'Học kỳ 2', '2022-05-26', 'Ca 2', 'Present'),
(227, 6, 3, 'Học kỳ 2', '2022-05-26', 'Ca 2', 'Present'),
(228, 7, 3, 'Học kỳ 2', '2022-05-26', 'Ca 2', 'Present'),
(229, 9, 3, 'Học kỳ 2', '2022-05-26', 'Ca 2', 'Present'),
(230, 25, 3, 'Học kỳ 2', '2022-05-26', 'Ca 2', 'Present'),
(231, 1, 3, 'Học kỳ 2', '2022-05-26', 'Ca 3', 'Present'),
(232, 7, 3, 'Học kỳ 2', '2022-05-26', 'Ca 3', 'Present'),
(233, 8, 3, 'Học kỳ 2', '2022-05-26', 'Ca 3', 'Present'),
(234, 9, 3, 'Học kỳ 2', '2022-05-26', 'Ca 3', 'Present'),
(235, 11, 3, 'Học kỳ 2', '2022-05-26', 'Ca 3', 'Present'),
(236, 19, 3, 'Học kỳ 2', '2022-05-26', 'Ca 3', 'Present'),
(237, 48, 3, 'Học kỳ 2', '2022-05-26', 'Ca 3', 'Present'),
(238, 1, 3, 'Học kỳ 2', '2022-05-26', 'Ca 4', 'Present'),
(239, 7, 3, 'Học kỳ 2', '2022-05-26', 'Ca 4', 'Present'),
(240, 8, 3, 'Học kỳ 2', '2022-05-26', 'Ca 4', 'Present'),
(241, 9, 3, 'Học kỳ 2', '2022-05-26', 'Ca 4', 'Present'),
(242, 11, 3, 'Học kỳ 2', '2022-05-26', 'Ca 4', 'Present'),
(243, 19, 3, 'Học kỳ 2', '2022-05-26', 'Ca 4', 'Present'),
(244, 48, 3, 'Học kỳ 2', '2022-05-26', 'Ca 4', 'Present'),
(245, 24, 3, 'Học kỳ 2', '2022-05-26', 'Ca 3', 'Present'),
(246, 24, 3, 'Học kỳ 2', '2022-05-26', 'Ca 4', 'Present'),
(247, 5, 3, 'Học kỳ 2', '2022-06-03', 'Ca 2', 'Present'),
(248, 24, 3, 'Học kỳ 2', '2022-06-03', 'Ca 2', 'Present'),
(249, 1, 3, 'Học kỳ 2', '2022-06-03', 'Ca 3', 'Present'),
(250, 7, 3, 'Học kỳ 2', '2022-06-03', 'Ca 3', 'Present'),
(251, 9, 3, 'Học kỳ 2', '2022-06-03', 'Ca 3', 'Present'),
(252, 11, 3, 'Học kỳ 2', '2022-06-03', 'Ca 3', 'Present'),
(253, 14, 3, 'Học kỳ 2', '2022-06-03', 'Ca 3', 'Present'),
(264, 24, 3, 'Học kỳ 2', '2022-06-08', 'Ca 2', 'Present'),
(265, 24, 3, 'Học kỳ 2', '2022-06-08', 'Ca 3', 'Present'),
(266, 24, 3, 'Học kỳ 2', '2022-06-08', 'Ca 4', 'Present'),
(267, 24, 3, 'Học kỳ 2', '2022-06-10', 'Ca 1', 'Present'),
(268, 24, 3, 'Học kỳ 2', '2022-06-10', 'Ca 2', 'Present'),
(269, 7, 3, 'Học kỳ 2', '2022-06-10', 'Ca 3', 'Present'),
(270, 7, 3, 'Học kỳ 2', '2022-06-10', 'Ca 4', 'Present'),
(271, 8, 3, 'Học kỳ 2', '2022-06-10', 'Ca 4', 'Present'),
(272, 1, 3, 'Học kỳ 2', '2022-06-13', 'Ca 1', 'Present'),
(273, 1, 3, 'Học kỳ 2', '2022-06-14', 'Ca 3', 'Present'),
(274, 1, 3, 'Học kỳ 2', '2022-06-15', 'Ca 3', 'Present'),
(275, 1, 3, 'Học kỳ 2', '2022-06-15', 'Ca 4', 'Present'),
(292, 1, 3, 'Học kỳ Hè', '2022-06-13', 'Ca1', 'Present'),
(293, 1, 3, 'Học kỳ Hè', '2022-06-14', 'Ca1', 'Present'),
(294, 1, 3, 'Học kỳ Hè', '2022-06-14', 'Ca2', 'Present'),
(295, 1, 3, 'Học kỳ Hè', '2022-06-15', 'Ca3', 'Present'),
(296, 1, 3, 'Học kỳ Hè', '2022-06-16', 'Ca1', 'Present'),
(297, 1, 3, 'Học kỳ Hè', '2022-06-16', 'Ca2', 'Present'),
(298, 1, 3, 'Học kỳ Hè', '2022-06-16', 'Ca3', 'Present'),
(299, 48, 3, 'Học kỳ Hè', '2022-06-17', 'Ca2', 'Present'),
(300, 1, 3, 'Học kỳ 2', '2022-06-13', 'Ca 2', 'Present'),
(301, 1, 3, 'Học kỳ 2', '2022-06-13', 'Ca 3', 'Present');

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
  `teacher` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `period` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `local` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `semester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_schoolyear` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_course`
--

INSERT INTO `tbl_course` (`id_course`, `id_subject`, `group`, `teacher`, `period`, `local`, `date`, `semester`, `id_schoolyear`) VALUES
(1, 5, '01', 'Nguyễn Thị Diễm My', 'SA:01', 'HT 06B', '2022-02-07', 'Học kỳ 2', 3),
(2, 3, '5', 'Nguyễn Đức Lộc', 'SA:01', 'HT 10A', '2022-02-07', 'Học kỳ 2', 3),
(3, 3, '05', 'Nguyễn Đức Lộc', 'SA:02', 'HT 10A', '2022-02-14', 'Học kỳ 2', 3),
(4, 3, '06', 'Nguyễn Đức Lộc', 'CH:01', 'HT 10A', '2022-02-07', 'Học kỳ 2', 3),
(5, 3, '06', 'Nguyễn Đức Lộc', 'CH:02', 'HT 10A', '2022-02-14', 'Học kỳ 2', 3),
(6, 4, '05', 'Nguyễn Thị Nhung', 'SA:01', '[---]', '2022-02-07', 'Học kỳ 2', 3),
(7, 4, '05', 'Nguyễn Thị Nhung', 'SA:02', '[---]', '2022-02-14', 'Học kỳ 2', 3),
(8, 4, '06', 'Nguyễn Thị Diễm My', 'CH:01', '[---]', '2022-02-07', 'Học kỳ 2', 3),
(9, 4, '06', 'Nguyễn Thị Diễm My', 'CH:02', '[---]', '2022-02-14', 'Học kỳ 2', 3),
(10, 4, '01', 'Nguyễn Thị Diễm My', 'SA:01', 'HT 10A', '2022-02-08', 'Học kỳ 2', 3),
(11, 4, '01', 'Nguyễn Thị Diễm My', 'SA:02', 'HT 10A', '2022-02-15', 'Học kỳ 2', 3),
(12, 4, '02', 'Nguyễn Thị Diễm My', 'CH:01', 'HT 10A', '2022-02-08', 'Học kỳ 2', 3),
(13, 4, '02', 'Nguyễn Thị Diễm My', 'CH:02', 'HT 10A', '2022-02-15', 'Học kỳ 2', 3),
(14, 3, '01', 'Nguyễn Đức Lộc', 'SA:01', 'HT 10A', '2022-02-09', 'Học kỳ 2', 3),
(15, 3, '01', 'Nguyễn Đức Lộc', 'SA:02', 'HT 10A', '2022-02-16', 'Học kỳ 2', 3),
(16, 5, '02', 'Nguyễn Thị Nhung', 'SA:01', 'HT 06B', '2022-02-09', 'Học kỳ 2', 3),
(17, 5, '03', 'Nguyễn Thị Nhung', 'CH:01', 'HT 06B', '2022-02-09', 'Học kỳ 2', 3),
(18, 3, '02', 'Nguyễn Đức Lộc', 'CH:01', 'HT 10A', '2022-02-09', 'Học kỳ 2', 3),
(19, 3, '02', 'Nguyễn Đức Lộc', 'CH:02', 'HT 10A', '2022-02-16', 'Học kỳ 2', 3),
(20, 4, '03', 'Nguyễn Thị Nhung', 'SA:01', 'HT 10A', '2022-02-10', 'Học kỳ 2', 3),
(21, 4, '03', 'Nguyễn Thị Nhung', 'SA:02', 'HT 10A', '2022-02-17', 'Học kỳ 2', 3),
(22, 3, '03', 'Nguyễn Đức Lộc', 'CH:01', 'HT 10A', '2022-02-10', 'Học kỳ 2', 3),
(23, 3, '03', 'Nguyễn Đức Lộc', 'CH:02', 'HT 10A', '2022-02-17', 'Học kỳ 2', 3),
(24, 4, '04', 'Nguyễn Thị Nhung', 'SA:01', 'HT 10A', '2022-02-11', 'Học kỳ 2', 3),
(25, 4, '04', 'Nguyễn Thị Nhung', 'SA:02', 'HT 10A', '2022-02-18', 'Học kỳ 2', 3),
(26, 3, '04', 'Nguyễn Đức Lộc', 'CH:01', 'HT 10A', '2022-02-11', 'Học kỳ 2', 3),
(27, 3, '04', 'Nguyễn Đức Lộc', 'CH:02', 'HT 10A', '2022-02-18', 'Học kỳ 2', 3),
(28, 4, '07', 'Nguyễn Thị Nhung', 'CH:01', '[---]', '2022-02-11', 'Học kỳ 2', 3),
(29, 4, '07', 'Nguyễn Thị Nhung', 'CH:02', '[---]', '2022-02-18', 'Học kỳ 2', 3),
(30, 12, '01', 'Nguyễn Thị Diễm My', 'SA:01', 'HT 06B', '2022-02-14', 'Học kỳ 2', 3),
(32, 12, '02', 'Nguyễn Thị Nhung', 'SA:01', 'HT 06B', '2022-02-16', 'Học kỳ 2', 3),
(33, 12, '04', 'Nguyễn Thị Nhung', 'CH:01', 'HT 06B', '2022-02-16', 'Học kỳ 2', 3),
(34, 12, '03', 'Nguyễn Thị Nhung', 'CH:01', 'HT 06B', '2022-02-17', 'Học kỳ 2', 3),
(35, 5, '01', 'Nguyễn Thị Nhung', 'SA:01', 'HT 10A', '2022-02-22', 'Học kỳ 2', 3),
(36, 5, '01', 'Nguyễn Thị Nhung', 'SA:02', 'HT 10A', '2022-03-01', 'Học kỳ 2', 3),
(37, 5, '02', 'Nguyễn Thị Nhung', 'CH:01', 'HT 10A', '2022-02-22', 'Học kỳ 2', 3),
(38, 5, '02', 'Nguyễn Thị Nhung', 'CH:02', 'HT 10A', '2022-03-01', 'Học kỳ 2', 3),
(39, 5, '03', 'Nguyễn Thị Diễm My', 'SA:01', 'HT 10A', '2022-02-23', 'Học kỳ 2', 3),
(40, 5, '03', 'Nguyễn Thị Diễm My', 'SA:02', 'HT 10A', '2022-03-02', 'Học kỳ 2', 3),
(41, 5, '04', 'Nguyễn Thị Diễm My', 'CH:01', 'HT 10A', '2022-02-23', 'Học kỳ 2', 3),
(42, 5, '04', 'Nguyễn Thị Diễm My', 'CH:02', 'HT 10A', '2022-03-02', 'Học kỳ 2', 3),
(43, 5, '05', 'Nguyễn Thị Nhung', 'SA:01', 'HT 10A', '2022-02-24', 'Học kỳ 2', 3),
(44, 5, '05', 'Nguyễn Thị Nhung', 'SA:02', 'HT 10A', '2022-03-03', 'Học kỳ 2', 3),
(45, 5, '06', 'Nguyễn Thị Nhung', 'CH:01', 'HT 10A', '2022-02-24', 'Học kỳ 2', 3),
(46, 5, '06', 'Nguyễn Thị Nhung', 'CH:02', 'HT 10A', '2022-03-03', 'Học kỳ 2', 3),
(47, 5, '07', 'Nguyễn Thị Diễm My', 'SA:01', 'HT 10A', '2022-02-25', 'Học kỳ 2', 3),
(48, 5, '07', 'Nguyễn Thị Diễm My', 'SA:02', 'HT 10A', '2022-03-04', 'Học kỳ 2', 3),
(49, 5, '08', 'Nguyễn Thị Diễm My', 'CH:01', 'HT 10A', '2022-02-25', 'Học kỳ 2', 3),
(50, 5, '08', 'Nguyễn Thị Diễm My', 'CH:02', 'HT 10A', '2022-03-04', 'Học kỳ 2', 3);

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
(4, 4, 0, 0, 0),
(5, 5, 0, 0, 0),
(6, 6, 0, 0, 0),
(7, 7, 0, 0, 0),
(8, 8, 1, 0, 0),
(9, 9, 1, 0, 0),
(10, 10, 0, 0, 0),
(11, 11, 0, 0, 0),
(12, 12, 1, 0, 0),
(14, 14, 1, 0, 0),
(16, 16, 0, 0, 0),
(17, 17, 0, 0, 0),
(18, 18, 1, 0, 0),
(19, 19, 1, 0, 0),
(23, 23, 0, 0, 0),
(24, 24, 1, 0, 0),
(25, 25, 0, 0, 0),
(29, 29, 0, 0, 0),
(30, 30, 0, 0, 0),
(31, 31, 0, 0, 0),
(36, 36, 0, 0, 0),
(38, 38, 0, 0, 0),
(40, 40, 0, 0, 0),
(45, 45, 0, 0, 0),
(48, 48, 0, 0, 0),
(49, 49, 1, 0, 0),
(51, 51, 0, 0, 0),
(52, 52, 0, 0, 0),
(53, 53, 0, 0, 0),
(54, 54, 0, 0, 0),
(55, 55, 0, 0, 0),
(56, 56, 0, 0, 0),
(57, 57, 0, 0, 0),
(58, 58, 0, 0, 0);

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

--
-- Đang đổ dữ liệu cho bảng `tbl_device`
--

INSERT INTO `tbl_device` (`id_device`, `id_devicegroup`, `device`, `description`, `note`) VALUES
(1, 1, 'Bảng lớn', '', ''),
(2, 1, 'Bảng con', '', ''),
(3, 5, 'Giấy A4 Xanh', '', ''),
(4, 5, 'Giấy A0', '', ''),
(5, 5, 'Giấy Note', '', ''),
(6, 5, 'Giấy A4 Tím', '', ''),
(7, 4, 'Bút lông đỏ', '', ''),
(8, 4, 'Bút lông đen', '', ''),
(9, 4, 'Bút Dạ đỏ', '', ''),
(10, 6, 'Mực đen', '', ''),
(11, 6, 'Mực xanh', '', ''),
(12, 6, 'Mực đỏ', '', ''),
(13, 4, 'Bút lông xanh', '', ''),
(14, 4, 'Bút Dạ xanh', '', ''),
(15, 4, 'Bút Dạ đen', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_devicegroup`
--

CREATE TABLE `tbl_devicegroup` (
  `id_devicegroup` int(255) NOT NULL,
  `devicegroup` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_devicegroup`
--

INSERT INTO `tbl_devicegroup` (`id_devicegroup`, `devicegroup`, `note`) VALUES
(1, 'Bảng', ''),
(3, 'Thiết bị điện tử', ''),
(4, 'Bút', ''),
(5, 'Giấy', ''),
(6, 'Mực', '');

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

--
-- Đang đổ dữ liệu cho bảng `tbl_devicestatistics`
--

INSERT INTO `tbl_devicestatistics` (`id_devicestatistics`, `id_device`, `quantily`, `using`, `donotuse`, `normal`, `broken`, `lost`) VALUES
(2, 2, 248, 248, 0, 164, 84, 0),
(3, 5, 19, 0, 19, 0, 0, 0),
(4, 3, 5, 0, 5, 0, 0, 0),
(5, 6, 3, 0, 3, 0, 0, 0),
(6, 4, 3, 0, 3, 0, 0, 0),
(9, 7, 155, 155, 0, 155, 0, 0),
(10, 13, 168, 168, 0, 168, 0, 0),
(11, 8, 168, 5, 163, 5, 0, 0),
(12, 12, 12, 0, 12, 0, 0, 0),
(13, 10, 18, 0, 18, 0, 0, 0),
(14, 11, 59, 0, 59, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_evaluate`
--

CREATE TABLE `tbl_evaluate` (
  `id_evaluate` int(255) NOT NULL,
  `id_student` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `attendance` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'x',
  `content_vn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scores` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `evaluate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_schoolyear` int(255) NOT NULL,
  `semester` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_evaluate`
--

INSERT INTO `tbl_evaluate` (`id_evaluate`, `id_student`, `attendance`, `content_vn`, `content_eng`, `scores`, `note`, `evaluate`, `id_schoolyear`, `semester`) VALUES
(100, '51900040', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(101, '11900067', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(102, '219H0227', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(103, 'B1900443', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(104, '520H0401', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(105, 'A2000244', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(106, 'B20H0236', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(107, 'H2000514', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(108, '019H0292', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(109, '720H1519', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(110, '02000939', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(111, '32001093', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(112, 'H2000506', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(113, 'B19H0160', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(114, '020H0214', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(115, '01900146', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(116, '51900119', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(117, 'B1900124', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(118, '81900546', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(119, 'A2000221', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(120, '51900444', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(121, 'B19H0163', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(122, '81900544', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(123, '81900550', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(124, '32001095', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(125, 'E20H0347', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(126, 'TRANHAO', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(127, '72100347', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(128, '421H0302', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(129, 'D2100331', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(130, '21900494', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(131, 'H2000338', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(132, 'A2100108', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(133, 'A2100248', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II'),
(134, 'A2100100', 'x', 'Thành viên LSA hoàn thành nhiệm vụ Học kỳ II năm học 2021-2022', 'The member of LSA has been recognized for having decent performance in the second semester of the academic year 2021-2022.', '10', NULL, 'Hoàn thành', 3, 'Học kỳ II');

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
(8, 1, 1),
(9, 24, 2),
(10, 9, 3),
(11, 8, 4),
(12, 18, 5),
(13, 19, 6),
(14, 12, 7),
(15, 14, 13);

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
(1, 'Chủ Nhiệm', '<p>Chịu tr&aacute;ch nhiệm, l&ecirc;n kế hoạch, ph&acirc;n c&ocirc;ng nhiệm vụ chung cho to&agrave;n bộ hoạt động của c&acirc;u lạc bộ.Chịu tr&aacute;ch nhiệm, l&ecirc;n kế hoạch, ph&acirc;n c&ocirc;ng nhiệm vụ chung cho to&agrave;n bộ hoạt động của c&acirc;u lạc bộ.</p>\r\n'),
(2, 'Phó Chủ Nhiệm', '<p>- Nhận c&ocirc;ng việc, ph&acirc;n c&ocirc;ng trực tiếp từ chủ nhiệm c&acirc;u lạc bộ. Gi&aacute;m s&aacute;t, quản l&iacute; c&aacute;c bộ phận chức năng li&ecirc;n quan</p>\r\n\r\n<p>- Theo d&otilde;i, đ&aacute;nh gi&aacute; tiến độ ho&agrave;n th&agrave;nh c&ocirc;ng việc của c&aacute;c ban.</p>\r\n\r\n<p>- Xếp loại đ&aacute;nh gi&aacute; th&agrave;nh t&iacute;ch của c&aacute;c c&aacute; nh&acirc;n trong c&acirc;u lạc bộ.</p>\r\n\r\n<p>- Chịu tr&aacute;ch nhiệm l&ecirc;n kế hoạch, tuyển th&agrave;nh vi&ecirc;n cho c&acirc;u lạc bộ.</p>\r\n'),
(3, 'Trưởng ban Hành Chính', '<p>- Hỗ trợ nhập liệu, thống k&ecirc; t&igrave;nh h&igrave;nh điểm danh từ ban nh&acirc;n sự, hỗ trợ tiếp nhận c&aacute;c vấn đề của sinh vi&ecirc;n c&ugrave;ng với thư k&yacute;/gi&aacute;o vụ của bộ m&ocirc;n khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n\r\n<p>- Hỗ trợ giảng vi&ecirc;n trong việc nhập liệu, thống k&ecirc;,&hellip; khi c&oacute; y&ecirc;u cầu v&agrave; được sự đồng &yacute; của Trưởng ban v&agrave; Ban chủ nhiệm.</p>\r\n'),
(4, 'Phó ban Hành Chính', '<p>- Hỗ trợ nhập liệu, thống k&ecirc; t&igrave;nh h&igrave;nh điểm danh từ ban nh&acirc;n sự, hỗ trợ tiếp nhận c&aacute;c vấn đề của sinh vi&ecirc;n c&ugrave;ng với thư k&yacute;/gi&aacute;o vụ của bộ m&ocirc;n khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n\r\n<p>- Hỗ trợ giảng vi&ecirc;n trong việc nhập liệu, thống k&ecirc;,&hellip; khi c&oacute; y&ecirc;u cầu v&agrave; được sự đồng &yacute; của Trưởng ban v&agrave; Ban chủ nhiệm.</p>\r\n'),
(5, 'Trưởng ban Nhân Sự', '<p>Hỗ trợ cho c&aacute;c lớp học kỹ năng, chuẩn bị c&aacute;c dụng cụ, vật dụng; điều phối, gi&aacute;m s&aacute;t, quản l&yacute; t&igrave;nh h&igrave;nh lớp học; hỗ trợ cho giảng vi&ecirc;n/b&aacute;o c&aacute;o vi&ecirc;n đứng lớp. Hỗ trợ giảng vi&ecirc;n trong qu&aacute; tr&igrave;nh đứng lớp khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n'),
(6, 'Phó ban Nhân Sự', '<p>Hỗ trợ cho c&aacute;c lớp học kỹ năng, chuẩn bị c&aacute;c dụng cụ, vật dụng; điều phối, gi&aacute;m s&aacute;t, quản l&yacute; t&igrave;nh h&igrave;nh lớp học; hỗ trợ cho giảng vi&ecirc;n/b&aacute;o c&aacute;o vi&ecirc;n đứng lớp. Hỗ trợ giảng vi&ecirc;n trong qu&aacute; tr&igrave;nh đứng lớp khi c&oacute; sự ph&acirc;n c&ocirc;ng.</p>\r\n'),
(7, 'Trưởng ban Sự kiện và Truyền Thông', '<p>- X&acirc;y dựng kế hoạch v&agrave; tổ chức c&aacute;c buổi chia sẻ, hoạt động ngoại kh&oacute;a, thiện nguyện, &hellip; cho c&acirc;u lạc bộ.</p>\r\n\r\n<p>- Chịu tr&aacute;ch nhiệm ch&iacute;nh về truyền th&ocirc;ng cho c&acirc;u lạc bộ. Quản l&yacute; Fanpage của c&acirc;u lạc bộ, cung cấp h&igrave;nh ảnh của đội, viết b&agrave;i, đưa th&ocirc;ng tin về c&aacute;c kỹ năng sống, kỹ năng bổ trợ đến gần với sinh vi&ecirc;n.</p>\r\n'),
(13, 'Phó ban Sự kiện và Truyền Thông', '<p>- X&acirc;y dựng kế hoạch v&agrave; tổ chức c&aacute;c buổi chia sẻ, hoạt động ngoại kh&oacute;a, thiện nguyện, &hellip; cho c&acirc;u lạc bộ.</p>\r\n\r\n<p>- Chịu tr&aacute;ch nhiệm ch&iacute;nh về truyền th&ocirc;ng cho c&acirc;u lạc bộ. Quản l&yacute; Fanpage của c&acirc;u lạc bộ, cung cấp h&igrave;nh ảnh của đội, viết b&agrave;i, đưa th&ocirc;ng tin về c&aacute;c kỹ năng sống, kỹ năng bổ trợ đến gần với sinh vi&ecirc;n.</p>\r\n');

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

--
-- Đang đổ dữ liệu cho bảng `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`id_schedule`, `id_user`, `session`, `shift`) VALUES
(212, 51, 'Wednesday', 'Ca1 Ca2 '),
(213, 51, 'Friday', 'Ca1 Ca2 '),
(215, 45, 'Friday', 'Ca2 '),
(221, 24, 'Tuesday', 'Ca2 Ca3 Ca4 '),
(222, 1, 'Thursday', 'Ca1 Ca2 Ca3 Ca4 '),
(223, 1, 'Friday', 'Ca1 Ca2 Ca3 Ca4 '),
(224, 10, 'Thursday', 'Ca2 ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_schoolyear`
--

CREATE TABLE `tbl_schoolyear` (
  `id_schoolyear` int(255) NOT NULL,
  `schoolyear` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_schoolyear`
--

INSERT INTO `tbl_schoolyear` (`id_schoolyear`, `schoolyear`, `note`) VALUES
(1, '2019-2020', ''),
(2, '2020-2021', ''),
(3, '2021-2022', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id_subject` int(255) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_subject`
--

INSERT INTO `tbl_subject` (`id_subject`, `subject`, `note`) VALUES
(1, 'Hòa nhập Văn hóa TDTU', ''),
(2, 'Kỹ năng 5S và Kaizen', ''),
(3, 'Kỹ năng Tự học', ''),
(4, 'Thái độ sống 1', ''),
(5, 'Thái độ sống 2', ''),
(6, 'Kỹ năng giao tiếp thuyết trình', ''),
(7, 'Tư duy phản biện', ''),
(8, 'Kỹ năng ra quyết định', ''),
(9, 'Thực tập chuyển hóa  cảm xúc EQ', ''),
(10, 'Xây dựng Team &amp; lãnh đạo', ''),
(11, 'Khởi nghiệp', ''),
(12, 'Thái độ sống 3', '');

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
(3, 'Ban Sự kiện và Truyền Thông', '<p>- X&acirc;y dựng kế hoạch v&agrave; tổ chức c&aacute;c buổi chia sẻ, hoạt động ngoại kh&oacute;a, thiện nguyện, &hellip; cho c&acirc;u lạc bộ.</p>\r\n\r\n<p>- Chịu tr&aacute;ch nhiệm ch&iacute;nh về truyền th&ocirc;ng cho c&acirc;u lạc bộ. Quản l&yacute; Fanpage của c&acirc;u lạc bộ, cung cấp h&igrave;nh ảnh của đội, viết b&agrave;i, đưa th&ocirc;ng tin về c&aacute;c kỹ năng sống, kỹ năng bổ trợ đến gần với sinh vi&ecirc;n.</p>\r\n'),
(4, 'Ban Cố Vấn', '<p>Ban cố vấn l&agrave; nơi tham mưu, tư vấn, gi&uacute;p việc cho C&acirc;u lạc bộ trong qu&aacute; tr&igrave;nh tổ chức thực hiện c&aacute;c c&ocirc;ng việc về, cũng như định hướng ph&aacute;t triển cho C&acirc;u lạc bộ.</p>\r\n');

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
(1, '51900040', 'e1f8b81700700b15a66764f91bc43373', 'Lê Trí Đức', '2001-05-03', 'https://www.facebook.com/ltrduc', 1, '0377025449', 0),
(4, '11900067', 'ee215d2465ef614e8cf9c16beae17a32', 'Phạm Ngọc Minh Thư', NULL, NULL, 1, NULL, 0),
(5, '219H0227', '98eaf61ad9feabfb61bac17ab4bf8aaf', 'Bùi Thị Thuỳ Trang', '2001-05-29', 'https://www.facebook.com/trang.buithithuy.37/', 1, '0827540883', 0),
(6, 'B1900443', '393f83da5ae4f676d6358da3a70f2a15', 'Huỳnh Hữu Khang Vĩ', '2001-04-20', 'https://www.facebook.com/khangvi.huynhhuu/', 1, '0704438192', 0),
(7, '520H0401', '3ab20c95f18788229224f4fbc8531a15', 'Lê Gia Phú', '2002-12-29', 'https://www.facebook.com/GiaPhu2912/', 1, '0852068832', 0),
(8, 'A2000244', '2448fb5a9b77e4644e3beed937ca38d4', 'Phan Phương Thảo', '2002-07-04', 'https://www.facebook.com/thao.phanphuong.5209000', 1, '0857141074', 0),
(9, 'B20H0236', '0e2bc5161f8703ab36d184696e497010', 'Vương Kim Trang', '2002-07-21', 'https://m.facebook.com/profile.php', 1, '0342969417', 0),
(10, 'H2000514', '6b4eeafb2df14a94203625c3afd97cf1', 'Trần Kim Xuân', '2002-12-23', 'https://www.facebook.com/kimxuan.tran.927', 1, '0703874040', 0),
(11, '019H0292', 'a4cbde89381503582267fcf7af3287c3', 'Nguyễn Mỹ Anh', NULL, NULL, 3, NULL, 0),
(12, '720H1519', '34407949dee2cd3056e38e5cae9d02a5', 'Hoàng Ngọc Bảo Châu', '2002-12-12', 'https://www.facebook.com/profile.php?id=100008882825759', 3, '0779603470', 0),
(14, '02000939', 'd1763ac34f6a48a43af7045f32842945', 'Hồ Thị Bích Tuyền', '2002-06-10', 'https://www.facebook.com/bichtuyen.hothi.731', 3, '0373471411', 0),
(16, '32001093', '6605d1c5c7dd96701e3a2c47fdb73c81', 'Nguyễn Thị Thư', '2002-01-10', 'https://www.facebook.com/thiendi.hoang.5030', 3, '0346056637', 0),
(17, 'H2000506', 'bbf566384d1e09f37e0b1845301d3c62', 'Lê Thanh Vy', NULL, NULL, 3, NULL, 0),
(18, 'B19H0160', '4b233c55470bafcfaef8b0b310f5512a', 'Nguyễn Trần Phương Anh', NULL, NULL, 2, NULL, 0),
(19, '020H0214', 'c13aceefb420263e13acbdb5ae57b05b', 'Ngô Nguyễn Minh Anh', '2002-04-04', 'https://www.facebook.com/profile.php?id=100044649050442', 2, '0703090346', 0),
(23, '01900146', 'b6ca85c2acd578c092f47e3b9a6bbfe3', 'Huỳnh Thị Diễm Hồng', NULL, NULL, 2, NULL, 0),
(24, '51900119', '32e52bea4a9c000291c04d834c0f1d2b', 'Lê Thành Đăng Khoa', '2001-04-17', 'https://www.facebook.com/khoalag174', 2, '0788765410', 0),
(25, 'B1900124', '98e61dedb2dde05753af4d40ecf9e9db', 'Phạm Hoàng Long', NULL, NULL, 2, NULL, 0),
(29, '81900546', '976a7aa94f4fc8b814ab2338efd9a9d4', 'Trần Hiếu Ngân', NULL, NULL, 2, NULL, 0),
(30, 'A2000221', '5299de3b0b6c946845316b3d4db91c79', 'Nguyễn Như Ngọc', NULL, NULL, 2, NULL, 0),
(31, '51900444', '59fd4766e5011211dbe84e7dbdbdcfca', 'Phạm Huỳnh Anh Tiến', NULL, NULL, 2, NULL, 0),
(36, 'B19H0163', '791cc672410056d218a1804b3eb8fb91', 'Trương Hoàng Anh', NULL, NULL, 2, NULL, 0),
(38, '81900544', '4ef6d78c01ddd41a3b73060935ddf2d1', 'Nguyễn Thị My', NULL, NULL, 2, NULL, 0),
(40, '81900550', '8431508a871e0136efa47e465dd0ef43', 'Nguyễn Ngọc Thảo Nguyên', NULL, NULL, 2, NULL, 0),
(45, '32001095', '7c10837b21097b5b8f2c1742b0de7eda', 'Lê Thanh Thùy', '2002-01-15', 'https://www.facebook.com/profile.php?id=100027235023512', 2, '0376523632', 0),
(48, 'E20H0347', 'a2a2bea9bcf77c92a714ef3e669e2cdf', 'Phùng Lữ Thế Hoài', '2002-10-28', 'Phùng Hoài', 2, '0886804955', 0),
(49, 'TRANHAO', 'f19d376aa086a3985fdeb5e25fe8235f', 'Trần Tuấn Hào', NULL, NULL, 4, NULL, 0),
(51, '72100347', '90d642d9ceaf28d6e5573a508b460563', 'Sơn Ka Ka Chi', '2003-01-31', 'https://www.facebook.com/profile.php?id=100013193766007', 3, '0913348440', 0),
(52, '421H0302', '11c28891b8713eacc690c0f776ae8028', 'Phan Thành Khang', NULL, NULL, 3, NULL, 0),
(53, 'D2100331', 'd7b7600810e55b8ef9e9523a2df317a7', 'Trương Minh Phát', NULL, NULL, 3, NULL, 0),
(54, '21900494', '8f04763a0f7457b466c9ff0201a3276a', 'Phạm Thị Ngọc Ngân', NULL, NULL, 2, NULL, 0),
(55, 'H2000338', '6060bf865c621e73998caee0b048beb7', 'Lý Mỹ Trinh', NULL, NULL, 2, NULL, 0),
(56, 'A2100108', '949d74eb805fa74c50ebc3cc7f5563b5', 'Phan Tường Vi', NULL, NULL, 2, NULL, 0),
(57, 'A2100248', 'c7f5cbcb8ee3e471cd1af1a66fce848a', 'Lê Thị Thu Sang', NULL, NULL, 2, NULL, 0),
(58, 'A2100100', 'ae4fc20783566462652bc972943e7bc9', 'Huỳnh Thị Thanh Trúc', NULL, NULL, 2, NULL, 0);

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
-- Chỉ mục cho bảng `tbl_evaluate`
--
ALTER TABLE `tbl_evaluate`
  ADD PRIMARY KEY (`id_evaluate`);

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
  MODIFY `id_attendance` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT cho bảng `tbl_borrow`
--
ALTER TABLE `tbl_borrow`
  MODIFY `id_borrow` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id_course` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `tbl_decentralization`
--
ALTER TABLE `tbl_decentralization`
  MODIFY `id_decentralization` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `tbl_device`
--
ALTER TABLE `tbl_device`
  MODIFY `id_device` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_devicegroup`
--
ALTER TABLE `tbl_devicegroup`
  MODIFY `id_devicegroup` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_devicestatistics`
--
ALTER TABLE `tbl_devicestatistics`
  MODIFY `id_devicestatistics` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_evaluate`
--
ALTER TABLE `tbl_evaluate`
  MODIFY `id_evaluate` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT cho bảng `tbl_executive`
--
ALTER TABLE `tbl_executive`
  MODIFY `id_executive` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id_position` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_recruitment`
--
ALTER TABLE `tbl_recruitment`
  MODIFY `id_recruitment` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `id_schedule` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT cho bảng `tbl_schoolyear`
--
ALTER TABLE `tbl_schoolyear`
  MODIFY `id_schoolyear` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id_subject` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id_team` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
