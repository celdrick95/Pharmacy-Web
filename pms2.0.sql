-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 07:38 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `country_list`
--

CREATE TABLE `country_list` (
  `countryId` int(11) NOT NULL,
  `countryName` text NOT NULL,
  `countryCode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country_list`
--

INSERT INTO `country_list` (`countryId`, `countryName`, `countryCode`) VALUES
(1, 'Albania', ''),
(2, 'Algeria', ''),
(3, 'Afghanistan', ''),
(4, 'Australia', ''),
(5, 'Bahrain', ''),
(6, 'Bangladesh', ''),
(7, 'Belgium', ''),
(8, 'Brazil', ''),
(9, 'China', ''),
(10, 'Colombia', ''),
(11, 'Dominican Republic', ''),
(12, 'East Timor', ''),
(13, 'France', ''),
(14, 'Japan', '81'),
(15, 'Germany', ''),
(16, 'Ghana', ''),
(17, 'Hongkong', ''),
(18, 'Iceland', ''),
(19, 'Indonesia', ''),
(20, 'Laos', ''),
(21, 'Lebanon', ''),
(22, 'Malaysia', ''),
(23, 'Maldives', ''),
(24, 'Myanmar', ''),
(25, 'New Zealand', ''),
(26, 'Panama', ''),
(27, 'Philippines', '63'),
(28, 'Poland', ''),
(29, 'Singapore', ''),
(30, 'Syria', ''),
(31, 'Thailand', ''),
(32, 'Uganda', ''),
(33, 'Ukraine', ''),
(34, 'United Kingdom', ''),
(35, 'United States of America', '');

-- --------------------------------------------------------

--
-- Table structure for table `log_in_out`
--

CREATE TABLE `log_in_out` (
  `logId` int(11) NOT NULL,
  `emailAddress` text NOT NULL,
  `logIn` datetime NOT NULL,
  `logOut` datetime NOT NULL,
  `userType` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_in_out`
--

INSERT INTO `log_in_out` (`logId`, `emailAddress`, `logIn`, `logOut`, `userType`) VALUES
(2, 'you_arias12345@ymail.com', '2019-11-23 02:11:28', '2019-11-23 02:11:31', 'Customer'),
(3, 'you_arias12345@ymail.com', '2019-11-23 02:12:40', '2019-11-23 02:12:43', 'Customer'),
(4, 'you_arias12345@ymail.com', '2019-11-23 02:13:02', '2019-11-23 02:13:11', 'Customer'),
(5, 'you_arias12345@ymail.com', '2019-11-23 02:13:30', '2019-11-23 02:13:33', 'Customer'),
(6, 'you_arias12345@ymail.com', '2019-11-23 02:13:43', '2019-11-23 02:14:51', 'Customer'),
(7, 'you_arias12345@ymail.com', '2019-11-23 02:14:56', '2019-11-23 02:15:19', 'Customer'),
(8, 'you_arias12345@ymail.com', '2019-11-23 02:15:24', '2019-11-23 02:15:26', 'Customer'),
(9, 'you_arias12345@ymail.com', '2019-11-23 02:15:46', '0000-00-00 00:00:00', 'Customer'),
(10, 'you_arias12345@gmail.com', '2019-11-23 07:36:02', '0000-00-00 00:00:00', 'Administrator'),
(11, 'you_arias12345@gmail.com', '2019-11-23 07:45:40', '0000-00-00 00:00:00', 'Administrator'),
(12, 'you_arias12345@hooray.com', '2019-11-23 08:14:29', '0000-00-00 00:00:00', 'Administrator'),
(13, 'you_arias12345@hooray.com', '2019-11-23 09:48:01', '0000-00-00 00:00:00', 'Administrator'),
(14, 'you_arias12345@gmail.com', '2019-11-23 10:22:15', '0000-00-00 00:00:00', 'Administrator'),
(15, 'you_arias12345@gmail.com', '2019-11-23 07:15:59', '0000-00-00 00:00:00', 'Administrator'),
(16, 'you_arias12345@ymail.com', '2019-11-23 08:57:36', '2019-11-23 08:59:09', 'Customer'),
(17, 'you_arias12345@gmail.com', '2019-11-23 09:09:49', '0000-00-00 00:00:00', 'Administrator'),
(18, 'you_arias12345@gmail.com', '2019-11-24 11:21:26', '0000-00-00 00:00:00', 'Administrator'),
(19, 'you_arias12345@gmail.com', '2019-11-25 02:07:27', '0000-00-00 00:00:00', 'Administrator'),
(20, 'you_arias12345@gmail.com', '2019-11-26 02:27:47', '0000-00-00 00:00:00', 'Administrator'),
(21, 'you_arias12345@gmail.com', '2019-11-26 08:02:31', '0000-00-00 00:00:00', 'Administrator'),
(22, 'you_arias12345@ymail.com', '2019-11-26 09:26:31', '2019-11-26 09:26:34', 'Customer'),
(23, 'you_arias12345@gmail.com', '2019-11-26 09:30:04', '0000-00-00 00:00:00', 'Administrator'),
(25, 'you_arias12345@gmail.com', '2019-11-28 01:54:43', '0000-00-00 00:00:00', 'Administrator'),
(26, 'you_arias12345@gmail.com', '2019-11-28 02:00:26', '0000-00-00 00:00:00', 'Administrator'),
(27, 'you_arias12345@yahoo.com', '2019-11-28 12:31:47', '2019-11-28 12:33:18', 'Customer'),
(28, 'you_arias12345@gmail.com', '2019-11-28 12:36:44', '0000-00-00 00:00:00', 'Administrator'),
(29, 'you_arias12345@gmail.com', '2019-11-28 12:46:07', '0000-00-00 00:00:00', 'Administrator'),
(30, 'you_arias12345@gmail.com', '2019-11-28 12:57:24', '0000-00-00 00:00:00', 'Administrator'),
(31, 'you_arias12345@gmail.com', '2019-11-28 12:57:29', '0000-00-00 00:00:00', 'Administrator'),
(32, 'you_arias12345@gmail.com', '2019-11-28 12:59:02', '0000-00-00 00:00:00', 'Administrator'),
(33, 'you_arias12345@gmail.com', '2019-11-28 12:59:23', '0000-00-00 00:00:00', 'Administrator'),
(34, 'you_arias12345@gmail.com', '2019-11-28 01:03:49', '0000-00-00 00:00:00', 'Administrator'),
(35, 'you_arias12345@yahoo.com', '2019-11-28 01:04:25', '0000-00-00 00:00:00', 'Customer'),
(36, 'you_arias12345@gmail.com', '2019-11-28 01:04:49', '0000-00-00 00:00:00', 'Administrator'),
(37, 'you_arias12345@yahoo.com', '2019-11-28 01:05:24', '0000-00-00 00:00:00', 'Customer'),
(38, 'you_arias12345@yahoo.com', '2019-11-28 01:29:06', '0000-00-00 00:00:00', 'Customer'),
(39, 'you_arias12345@yahoo.com', '2019-11-28 05:07:01', '0000-00-00 00:00:00', 'Customer'),
(40, 'you_arias12345@yahoo.com', '2019-11-28 17:28:04', '0000-00-00 00:00:00', 'Customer'),
(41, 'you_arias12345@yahoo.com', '2019-11-28 17:32:16', '2019-11-28 17:32:20', 'Customer'),
(42, 'you_arias12345@yahoo.com', '2019-11-28 17:52:52', '2019-11-28 18:07:41', 'Customer'),
(43, 'you_arias12345@gmail.com', '2019-11-28 18:12:42', '0000-00-00 00:00:00', 'Administrator'),
(44, 'you_arias12345@yahoo.com', '2019-11-28 18:16:22', '2019-11-28 18:26:06', 'Customer'),
(45, 'you_arias12345@gmail.com', '2019-11-28 18:26:17', '0000-00-00 00:00:00', 'Administrator'),
(46, 'you_arias12345@hooray.com', '2019-11-28 22:07:14', '2019-11-28 22:07:25', 'Customer'),
(47, 'you_arias12345@gmail.com', '2019-11-28 22:11:37', '0000-00-00 00:00:00', 'Administrator'),
(48, 'you_arias12345@gmail.com', '2019-11-29 00:06:46', '0000-00-00 00:00:00', 'Administrator'),
(49, 'you_arias12345@gmail.com', '2019-12-01 22:41:58', '0000-00-00 00:00:00', 'Administrator'),
(50, 'you_arias12345@gmail.com', '2019-12-02 00:04:16', '0000-00-00 00:00:00', 'Administrator'),
(51, 'you_arias12345@ymail.com', '2019-12-02 00:07:15', '0000-00-00 00:00:00', 'Customer'),
(52, 'you_arias12345@gmail.com', '2019-12-02 22:09:33', '0000-00-00 00:00:00', 'Administrator'),
(53, 'you_arias12345@ymail.com', '2019-12-02 22:28:48', '0000-00-00 00:00:00', 'Customer'),
(54, 'you_arias12345@gmail.com', '2019-12-02 22:39:21', '0000-00-00 00:00:00', 'Administrator'),
(55, 'you_arias12345@gmail.com', '2019-12-03 00:09:47', '0000-00-00 00:00:00', 'Administrator'),
(56, 'you_arias12345@ymail.com', '2019-12-03 00:18:30', '0000-00-00 00:00:00', 'Customer'),
(57, 'you_arias12345@ymail.com', '2019-12-03 00:19:17', '2019-12-03 00:19:21', 'Customer'),
(58, 'you_arias12345@gmail.com', '2019-12-03 00:19:34', '2019-12-03 00:20:34', 'Administrator'),
(59, 'you_arias12345@ymail.com', '2019-12-03 03:32:04', '2019-12-03 04:44:33', 'Customer'),
(60, 'you_arias12345@ymail.com', '2019-12-07 08:30:37', '0000-00-00 00:00:00', 'Customer'),
(61, 'you_arias12345@gmail.com', '2019-12-07 08:39:36', '0000-00-00 00:00:00', 'Administrator'),
(62, 'you_arias12345@ymail.com', '2019-12-07 09:43:25', '2019-12-07 09:44:27', 'Customer'),
(63, 'you_arias12345@ymail.com', '2019-12-07 09:43:25', '2019-12-07 09:44:27', 'Customer'),
(64, 'mattbuenagua@gmail.com', '2019-12-07 09:47:54', '2019-12-07 09:49:27', 'Customer'),
(65, 'mattbuenagua@gmail.com', '2019-12-07 09:50:02', '2019-12-07 09:51:01', 'Customer'),
(66, 'MUSTACISA_MARIA@YAHOO.COM', '2019-12-07 10:06:18', '0000-00-00 00:00:00', 'Customer'),
(67, 'you_arias12345@gmail.com', '2019-12-07 11:54:58', '0000-00-00 00:00:00', 'Administrator'),
(68, 'you_arias12345@ymail.com', '2019-12-07 11:55:05', '0000-00-00 00:00:00', 'Customer'),
(69, 'you_arias12345@ymail.com', '2019-12-07 12:14:16', '2019-12-07 12:22:00', 'Customer'),
(70, 'mattbuenagua123@gmail.com', '2019-12-07 12:33:49', '2019-12-07 12:42:08', 'Customer'),
(71, 'mattbuenagua123@gmail.com', '2019-12-07 12:44:40', '0000-00-00 00:00:00', 'Customer'),
(72, 'you_arias12345@gmail.com', '2019-12-07 12:45:12', '0000-00-00 00:00:00', 'Administrator'),
(73, 'you_arias12345@yahoo.com', '2019-12-12 13:04:19', '2019-12-12 13:56:15', 'Customer'),
(74, 'you_arias12345@ymail.com', '2019-12-12 13:56:23', '2019-12-12 13:56:52', 'Customer'),
(75, 'you_arias12345@yahoo.com', '2019-12-12 13:56:59', '2019-12-12 14:15:15', 'Customer'),
(76, 'you_arias12345@gmail.com', '2019-12-12 14:15:28', '0000-00-00 00:00:00', 'Administrator'),
(77, 'you_arias12345@ymail.com', '2019-12-12 17:39:57', '0000-00-00 00:00:00', 'Customer'),
(78, 'you_arias12345@hooray.com', '2019-12-12 17:44:32', '2019-12-12 17:45:59', 'Administrator'),
(79, 'you_arias12345@gmail.com', '2019-12-12 17:46:18', '2019-12-12 17:46:23', 'Administrator'),
(80, 'you_arias12345@hooray.com', '2019-12-12 17:46:32', '0000-00-00 00:00:00', 'Administrator'),
(81, 'you_arias12345@gmail.com', '2019-12-13 07:17:14', '0000-00-00 00:00:00', 'Administrator'),
(82, 'you_arias12345@yahoo.com', '2019-12-13 15:01:56', '2019-12-13 15:02:53', 'Customer'),
(83, 'you_arias12345@ymail.com', '2019-12-13 15:03:00', '0000-00-00 00:00:00', 'Customer'),
(84, 'you_arias12345@gmail.com', '2019-12-13 21:46:18', '0000-00-00 00:00:00', 'Administrator'),
(85, 'you_arias12345@gmail.com', '2019-12-13 22:56:48', '0000-00-00 00:00:00', 'Administrator'),
(86, 'you_arias12345@yahoo.com', '2019-12-13 23:30:15', '0000-00-00 00:00:00', 'Customer'),
(87, 'you_arias12345@gmail.com', '2019-12-14 01:06:49', '2019-12-14 01:07:50', 'Administrator'),
(88, 'you_arias12345@gmail.com', '2019-12-14 12:57:14', '0000-00-00 00:00:00', 'Administrator'),
(89, 'you_arias12345@gmail.com', '2019-12-14 13:28:14', '0000-00-00 00:00:00', 'Administrator'),
(90, 'you_arias12345@yahoo.com', '2020-03-23 01:59:29', '2020-03-23 02:25:43', 'Customer'),
(91, 'you_arias12345@yahoo.com', '2020-03-23 02:53:56', '2020-03-23 02:54:00', 'Customer'),
(92, 'you_arias12345@yahoo.com', '2020-03-23 02:54:24', '2020-03-23 02:54:27', 'Customer'),
(93, 'you_arias12345@yahoo.com', '2020-04-01 22:50:58', '2020-04-01 22:52:09', 'Administrator'),
(94, 'you_arias12345@yahoo.com', '2020-04-01 22:52:14', '2020-04-01 23:10:25', 'Administrator'),
(95, 'you_arias12345@yahoo.com', '2020-04-05 08:55:09', '2020-04-05 09:19:42', 'Administrator'),
(96, 'you_arias12345@yahoo.com', '2020-04-05 09:42:50', '0000-00-00 00:00:00', 'Administrator'),
(97, 'you_arias12345@yahoo.com', '2020-04-05 19:37:17', '2020-04-05 22:16:40', 'Administrator'),
(98, 'you_arias12345@yahoo.com', '2020-04-05 22:42:38', '2020-04-05 22:42:41', 'Administrator'),
(99, 'you_arias12345@yahoo.com', '2020-04-05 22:42:47', '2020-04-05 22:42:51', 'Administrator'),
(100, 'you_arias12345@yahoo.com', '2020-04-05 22:44:32', '0000-00-00 00:00:00', 'Customer'),
(101, 'you_arias12345@yahoo.com', '2020-04-05 22:44:33', '2020-04-05 22:46:14', 'Customer'),
(102, 'you_arias12345@yahoo.com', '2020-04-05 22:46:25', '2020-04-06 00:36:23', 'Customer'),
(103, 'you_arias12345@yahoo.com', '2020-04-06 00:36:28', '2020-04-06 00:37:51', 'Customer'),
(104, 'you_arias12345@yahoo.com', '2020-04-06 00:37:55', '2020-04-06 00:44:38', 'Customer'),
(105, 'you_arias12345@yahoo.com', '2020-04-06 00:44:43', '2020-04-06 00:50:24', 'Customer'),
(106, 'you_arias12345@yahoo.com', '2020-04-06 00:50:28', '0000-00-00 00:00:00', 'Customer'),
(107, 'you_arias12345@yahoo.com', '2020-04-06 00:55:09', '2020-04-06 01:11:31', 'Customer'),
(108, 'you_arias12345@yahoo.com', '2020-04-06 01:12:40', '2020-04-06 01:15:42', 'Customer'),
(109, 'you_arias12345@yahoo.com', '2020-04-06 01:19:18', '2020-04-06 01:21:13', 'Customer'),
(110, 'you_arias12345@yahoo.com', '2020-04-06 01:21:30', '2020-04-06 01:21:57', 'Customer'),
(111, 'you_arias12345@yahoo.com', '2020-04-06 01:21:30', '2020-04-06 01:21:57', 'Customer'),
(112, 'you_arias12345@yahoo.com', '2020-04-06 01:22:02', '0000-00-00 00:00:00', 'Customer'),
(113, 'you_arias12345@yahoo.com', '2020-04-06 01:23:36', '2020-04-06 01:25:47', 'Customer'),
(114, 'you_arias12345@yahoo.com', '2020-04-06 01:25:52', '2020-04-06 01:26:58', 'Customer'),
(115, 'you_arias12345@yahoo.com', '2020-04-06 01:27:02', '0000-00-00 00:00:00', 'Customer'),
(116, 'you_arias12345@yahoo.com', '2020-04-06 01:31:16', '2020-04-06 01:31:34', 'Customer'),
(117, 'you_arias12345@yahoo.com', '2020-04-06 01:31:38', '2020-04-06 01:41:22', 'Customer'),
(118, 'you_arias12345@yahoo.com', '2020-04-06 01:41:26', '2020-04-06 01:51:40', 'Customer'),
(119, 'you_arias12345@yahoo.com', '2020-04-06 01:52:35', '0000-00-00 00:00:00', 'Customer'),
(120, 'you_arias12345@yahoo.com', '2020-04-06 01:53:31', '0000-00-00 00:00:00', 'Customer'),
(121, 'you_arias12345@yahoo.com', '2020-04-06 01:53:45', '0000-00-00 00:00:00', 'Customer'),
(122, 'you_arias12345@yahoo.com', '2020-04-06 01:54:40', '0000-00-00 00:00:00', 'Customer'),
(123, 'you_arias12345@yahoo.com', '2020-04-06 01:55:09', '0000-00-00 00:00:00', 'Customer'),
(124, 'you_arias12345@yahoo.com', '2020-04-06 01:56:22', '0000-00-00 00:00:00', 'Customer'),
(125, 'you_arias12345@yahoo.com', '2020-04-06 01:57:57', '0000-00-00 00:00:00', 'Customer'),
(126, 'you_arias12345@yahoo.com', '2020-04-06 01:59:14', '2020-04-06 01:59:33', 'Customer'),
(127, 'you_arias12345@yahoo.com', '2020-04-06 01:59:37', '2020-04-06 02:02:48', 'Customer'),
(128, 'you_arias12345@yahoo.com', '2020-04-06 02:02:53', '2020-04-06 02:03:35', 'Customer'),
(129, 'you_arias12345@yahoo.com', '2020-04-06 02:03:39', '2020-04-06 02:37:46', 'Customer'),
(130, 'you_arias12345@yahoo.com', '2020-04-06 02:37:51', '2020-04-06 02:39:46', 'Customer'),
(131, 'you_arias12345@yahoo.com', '2020-05-11 00:59:50', '0000-00-00 00:00:00', 'Customer'),
(132, 'you_arias12345@yahoo.com', '2020-05-11 01:00:43', '2020-05-11 01:00:47', 'Customer'),
(133, 'you_arias12345@yahoo.com', '2020-05-11 01:01:04', '0000-00-00 00:00:00', 'Customer'),
(134, 'you_arias12345@yahoo.com', '2020-05-11 01:02:41', '0000-00-00 00:00:00', 'Customer'),
(135, 'you_arias12345@yahoo.com', '2020-05-11 01:03:21', '0000-00-00 00:00:00', 'Customer'),
(136, 'you_arias12345@yahoo.com', '2020-05-11 01:16:57', '2020-05-11 01:17:35', 'Customer'),
(137, 'you_arias12345@yahoo.com', '2020-05-11 01:17:47', '2020-05-11 01:19:14', 'Customer'),
(138, 'you_arias12345@yahoo.com', '2020-05-11 01:19:20', '2020-05-11 01:20:58', 'Customer'),
(139, 'you_arias12345@yahoo.com', '2020-05-11 01:21:25', '0000-00-00 00:00:00', 'Customer'),
(140, 'you_arias12345@yahoo.com', '2020-05-11 14:07:58', '2020-05-11 14:30:24', 'Customer'),
(141, 'you_arias12345@yahoo.com', '2020-05-11 17:31:28', '2020-05-14 21:36:34', 'Customer'),
(142, 'you_arias12345@yahoo.com', '2020-05-14 21:36:40', '2020-05-15 00:38:32', 'Customer'),
(143, 'you_arias12345@yahoo.com', '2020-05-15 00:39:58', '2020-05-15 01:18:35', 'Customer'),
(144, 'you_arias12345@gmail.com', '2020-05-15 01:45:50', '0000-00-00 00:00:00', 'Administrator'),
(145, 'you_arias12345@yahoo.com', '2020-05-15 22:33:44', '0000-00-00 00:00:00', 'Customer'),
(146, 'you_arias12345@gmail.com', '2020-05-17 15:34:49', '0000-00-00 00:00:00', 'Administrator'),
(147, 'you_arias12345@gmail.com', '2020-05-17 22:49:35', '0000-00-00 00:00:00', 'Administrator'),
(148, 'you_arias12345@gmail.com', '2020-05-17 23:16:08', '0000-00-00 00:00:00', 'Administrator'),
(149, 'you_arias12345@gmail.com', '2020-05-17 23:16:08', '0000-00-00 00:00:00', 'Administrator'),
(150, 'you_arias12345@gmail.com', '2020-05-17 23:16:08', '0000-00-00 00:00:00', 'Administrator'),
(151, 'you_arias12345@gmail.com', '2020-05-17 23:16:08', '0000-00-00 00:00:00', 'Administrator'),
(152, 'you_arias12345@gmail.com', '2020-05-17 23:16:08', '0000-00-00 00:00:00', 'Administrator'),
(153, 'you_arias12345@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Administrator'),
(154, 'you_arias12345@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Administrator'),
(155, 'you_arias12345@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Administrator'),
(156, 'you_arias12345@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Administrator'),
(157, 'you_arias12345@gmail.com', '2020-05-21 04:16:06', '0000-00-00 00:00:00', 'Administrator'),
(158, 'you_arias12345@gmail.com', '2020-05-21 04:17:44', '0000-00-00 00:00:00', 'Administrator'),
(159, 'you_arias12345@gmail.com', '2020-05-21 04:19:08', '0000-00-00 00:00:00', 'Administrator'),
(160, 'you_arias12345@gmail.com', '2020-05-21 04:20:08', '0000-00-00 00:00:00', 'Administrator'),
(161, 'you_arias12345@gmail.com', '2020-05-21 04:20:45', '0000-00-00 00:00:00', 'Administrator'),
(162, 'you_arias12345@gmail.com', '2020-05-21 04:22:00', '0000-00-00 00:00:00', 'Administrator'),
(163, 'you_arias12345@gmail.com', '2020-05-21 04:23:06', '0000-00-00 00:00:00', 'Administrator'),
(164, 'you_arias12345@gmail.com', '2020-05-21 04:26:40', '0000-00-00 00:00:00', 'Administrator'),
(165, 'you_arias12345@yahoo.com', '2020-05-21 04:28:17', '0000-00-00 00:00:00', 'Customer'),
(166, 'you_arias12345@yahoo.com', '2020-05-21 04:28:54', '0000-00-00 00:00:00', 'Customer'),
(167, 'you_arias12345@yahoo.com', '2020-05-21 04:30:04', '0000-00-00 00:00:00', 'Customer'),
(168, 'you_arias12345@yahoo.com', '2020-05-21 04:30:04', '0000-00-00 00:00:00', 'Customer'),
(169, 'you_arias12345@yahoo.com', '2020-05-21 04:30:39', '2020-05-21 04:30:43', 'Customer'),
(170, 'you_arias12345@gmail.com', '2020-05-21 04:31:45', '2020-05-21 04:34:22', 'Administrator'),
(171, 'you_arias12345@yahoo.com', '2020-05-21 04:34:29', '0000-00-00 00:00:00', 'Customer'),
(172, 'you_arias12345@yahoo.com', '2020-05-21 04:52:10', '0000-00-00 00:00:00', 'Customer'),
(173, 'you_arias12345@yahoo.com', '2020-05-21 04:54:39', '2020-05-21 04:54:54', 'Customer'),
(174, 'you_arias12345@yahoo.com', '2020-05-21 05:00:43', '2020-05-21 05:08:56', 'Customer'),
(175, 'you_arias12345@yahoo.com', '2020-05-21 05:10:01', '2020-05-21 05:10:58', 'Customer'),
(176, 'you_arias12345@gmail.com', '2020-05-21 05:11:11', '0000-00-00 00:00:00', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` text NOT NULL,
  `categoryEnc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`categoryId`, `categoryName`, `categoryEnc`) VALUES
(1, 'Allergy', 'Allergy'),
(2, 'Body & Muscle Pain', 'Body+%26+Muscle+Pain'),
(3, 'Children\'s Health', 'Children%27s+Health'),
(4, 'Cough & Colds', 'Cough+%26+Colds'),
(5, 'Gut or Stomach Health', 'Gut+or+Stomach+Health'),
(6, 'Headache, Fever & Flu', 'Headache%2C+Fever+%26+Flu'),
(7, 'Healthy Aging or Seniors', 'Healthy+Aging+or+Seniors'),
(8, 'Men\'s Health', 'Men%27s+Health'),
(9, 'Oral Care', 'Oral+Care'),
(10, 'Prescription Drugs', 'Prescription+Drugs'),
(11, 'Skin Care', 'Skin+Care'),
(12, 'Sports Nutrition', 'Sports+Nutrition'),
(13, 'Vitamins & Supplements', 'Vitamins+%26+Supplements'),
(14, 'Women\'s Health & Beauty', 'Women%27s+Health+%26+Beauty');

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory`
--

CREATE TABLE `product_inventory` (
  `productId` int(11) NOT NULL,
  `productName` text NOT NULL,
  `productCategory` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `expiryDate` date NOT NULL,
  `dateAdded` date NOT NULL,
  `imageSource` text NOT NULL,
  `productEnc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_inventory`
--

INSERT INTO `product_inventory` (`productId`, `productName`, `productCategory`, `price`, `stock`, `expiryDate`, `dateAdded`, `imageSource`, `productEnc`) VALUES
(41, 'Allerin', 'Allergy', 150, 49, '2020-12-12', '2019-12-12', 'image/product/allerin.png', 'Allerin'),
(42, 'Allerkid', 'Allergy', 150, 50, '2020-12-12', '2019-12-02', 'image/product/allerkid.png', 'Allerkid'),
(43, 'Allerta', 'Allergy', 150, 50, '2020-12-12', '2019-12-02', 'image/product/allerta.png', 'Allerta'),
(44, 'Allerta Dermatec', 'Allergy', 150, 50, '2020-12-12', '2019-12-02', 'image/product/allerta-dermatec.png', 'Allerta+Dermatec'),
(45, 'Allerteen', 'Allergy', 150, 50, '2020-12-12', '2019-12-02', 'image/product/allerteen.png', 'Allerteen'),
(46, 'Alaxan FR', 'Body & Muscle Pain', 150, 50, '2020-12-12', '2019-12-02', 'image/product/alaxan-fr.png', 'Alaxan+FR'),
(47, 'Dolfenal 250 MG', 'Body & Muscle Pain', 150, 50, '2020-12-12', '2019-12-02', 'image/product/dolfenal.png', 'Dolfenal+250+MG'),
(48, 'Juvenaid', 'Body & Muscle Pain', 150, 50, '2020-12-12', '2019-12-02', 'image/product/juvenaid.png', 'Juvenaid'),
(49, 'Medicol Advance', 'Body & Muscle Pain', 150, 50, '2020-12-12', '2019-12-02', 'image/product/medicol-advance.png', 'Medicol+Advance'),
(50, 'Medicol Advance 400', 'Body & Muscle Pain', 150, 50, '2020-12-12', '2019-12-02', 'image/product/medicol-advance-400.png', 'Medicol+Advance+400'),
(51, 'Alnix Plus Syrup', 'Children\'s Health', 150, 46, '2020-12-12', '2019-12-02', 'image/product/alnix-plus-syrup.png', 'Alnix+Plus+Syrup'),
(52, 'Appebon 500', 'Children\'s Health', 150, 50, '2020-12-12', '2019-12-02', 'image/product/appebon-500.png', 'Appebon+500'),
(53, 'Appebon Kid', 'Children\'s Health', 150, 50, '2020-12-12', '2019-12-02', 'image/product/appebon-kid.png', 'Appebon+Kid'),
(54, 'Biogesic Syrup and Tablet', 'Children\'s Health', 150, 50, '2020-12-12', '2019-12-02', 'image/product/biogesic-syrup-and-tablet.png', 'Biogesic+Syrup+and+Tablet'),
(55, 'Ceelin', 'Children\'s Health', 150, 50, '2020-12-12', '2019-12-02', 'image/product/ceelin.png', 'Ceelin'),
(56, 'Decolgen Forte', 'Cough & Colds', 150, 50, '2020-12-12', '2019-12-02', 'image/product/decolgen-forte.png', 'Decolgen+Forte'),
(57, 'Expel OD', 'Cough & Colds', 150, 50, '2020-12-12', '2019-12-02', 'image/product/expel-od.png', 'Expel+OD'),
(58, 'Myracof', 'Cough & Colds', 150, 50, '2020-12-12', '2019-12-02', 'image/product/myracof.png', 'Myracof'),
(59, 'Nafarin-A', 'Cough & Colds', 150, 50, '2020-12-12', '2019-12-02', 'image/product/nafarin-a.png', 'Nafarin-A'),
(60, 'Neozep Forte', 'Cough & Colds', 150, 50, '2020-12-12', '2019-12-02', 'image/product/neozep-forte.png', 'Neozep+Forte'),
(61, 'Diatabs', 'Gut or Stomach Health', 150, 50, '2020-12-12', '2019-12-02', 'image/product/diatabs.png', 'Diatabs'),
(62, 'Enzyplex', 'Gut or Stomach Health', 150, 50, '2020-12-12', '2019-12-02', 'image/product/enzyplex.png', 'Enzyplex'),
(63, 'Glydolax', 'Gut or Stomach Health', 150, 50, '2020-12-12', '2019-12-02', 'image/product/glydolax.png', 'Glydolax'),
(64, 'Hyos', 'Gut or Stomach Health', 150, 50, '2020-12-12', '2019-12-02', 'image/product/hyos.png', 'Hyos'),
(65, 'Kremil-S', 'Gut or Stomach Health', 150, 50, '2020-12-12', '2019-12-02', 'image/product/kremil-s.png', 'Kremil-S'),
(66, 'Bioflu', 'Headache, Fever & Flu', 150, 50, '2020-12-12', '2019-12-02', 'image/product/bioflu.png', 'Bioflu'),
(67, 'Bioflu Non-Drowsy', 'Headache, Fever & Flu', 150, 50, '2020-12-12', '2019-12-02', 'image/product/bioflu-non-drowsy.png', 'Bioflu+Non-Drowsy'),
(68, 'Biogesic', 'Headache, Fever & Flu', 150, 50, '2020-12-12', '2019-12-02', 'image/product/biogesic.png', 'Biogesic'),
(69, 'Rexidol Forte', 'Headache, Fever & Flu', 150, 50, '2020-12-12', '2019-12-02', 'image/product/rexidol-forte.png', 'Rexidol+Forte'),
(71, 'Enervon Prime Low-Fat Milk Drink for Adults', 'Healthy Aging or Seniors', 300, 50, '2020-12-12', '2019-12-02', 'image/product/low-fat-milk.png', 'Enervon+Prime+Low-Fat+Milk+Drink+for+Adults'),
(72, 'Neurogen-E', 'Healthy Aging or Seniors', 150, 50, '2020-12-12', '2019-12-02', 'image/product/neurogen-e.png', 'Neurogen-E'),
(73, 'Enervon Prime Reduced Lactose Milk Drink for Adult', 'Healthy Aging or Seniors', 350, 50, '2020-12-12', '2019-12-02', 'image/product/reduced-lactose-milk.png', 'Enervon+Prime+Reduced+Lactose+Milk+Drink+for+Adult'),
(74, 'Skelan 220', 'Healthy Aging or Seniors', 150, 50, '2020-12-12', '2019-12-02', 'image/product/skelan-220.png', 'Skelan+220'),
(75, 'Maxvit', 'Men\'s Health', 150, 50, '2020-12-12', '2019-12-02', 'image/product/maxvit.png', 'Maxvit'),
(76, 'Revicon Forte', 'Men\'s Health', 150, 50, '2020-12-12', '2019-12-02', 'image/product/revicon-forte.png', 'Revicon+Forte'),
(77, 'Swish Breath Spray Arctic Chill', 'Oral Care', 150, 50, '2020-12-12', '2019-12-02', 'image/product/swish-breath-spray-arctic-chill.png', 'Swish+Breath+Spray+Arctic+Chill'),
(78, 'Swish Breath Spray Peppermint Fresh', 'Oral Care', 150, 50, '2020-12-12', '2019-12-02', 'image/product/swish-breath-spray-peppermint-fresh.png', 'Swish+Breath+Spray+Peppermint+Fresh'),
(79, 'Swish Mouthwash Arctic Chill', 'Oral Care', 150, 50, '2020-12-12', '2019-12-02', 'image/product/swish-mouthwash-arctic-chill.png', 'Swish+Mouthwash+Arctic+Chill'),
(80, 'Swish Mouthwash Peppermint Fresh', 'Oral Care', 150, 50, '2020-12-12', '2019-12-02', 'image/product/swish-mouthwash-peppermint-fresh.png', 'Swish+Mouthwash+Peppermint+Fresh'),
(81, 'Alendra', 'Prescription Drugs', 150, 50, '2020-12-12', '2019-12-02', 'image/product/alendra.png', 'Alendra'),
(82, 'Algesia', 'Prescription Drugs', 150, 50, '2020-12-12', '2019-12-02', 'image/product/algesia.png', 'Algesia'),
(86, 'Allerzet (Syrup)', 'Prescription Drugs', 150, 50, '2020-12-12', '2019-12-02', 'image/product/allerzet-syrup.png', 'Allerzet+(Syrup)'),
(87, 'Allerzet (Tablet)', 'Prescription Drugs', 150, 50, '2020-12-12', '2019-12-02', 'image/product/allerzet-tablet.png', 'Allerzet+(Tablet)'),
(88, 'Amena', 'Prescription Drugs', 150, 50, '2020-12-12', '2019-12-02', 'image/product/amena.png', 'Amena'),
(89, 'Celeteque DermoCosmetics 24-Hour Photoready Liquid Foundation with SPF 30', 'Skin Care', 150, 50, '2020-12-12', '2019-12-02', 'image/product/24-hour-photoready-liquid-foundation.png', 'Celeteque+DermoCosmetics+24-Hour+Photoready+Liquid+Foundation+with+SPF+30'),
(90, 'Celeteque DermoCosmetics 24-Hour Volumizer Mascara', 'Skin Care', 150, 50, '2020-12-12', '2019-12-02', 'image/product/24-hour-volumizer-mascara.png', 'Celeteque+DermoCosmetics+24-Hour+Volumizer+Mascara'),
(91, 'Celeteque DermoCosmetics Blush and Face Contour Kit', 'Skin Care', 150, 50, '2020-12-12', '2019-12-02', 'image/product/blush-and-face-contour-kit.png', 'Celeteque+DermoCosmetics+Blush+and+Face+Contour+Kit'),
(92, 'Celeteque DermoCosmetics Cheek Color Stick', 'Skin Care', 150, 50, '2020-12-12', '2019-12-02', 'image/product/cheek-color-stick.png', 'Celeteque+DermoCosmetics+Cheek+Color+Stick'),
(93, 'Celeteque DermoCosmetics Dark Spot Concealer Stick', 'Skin Care', 150, 50, '2020-12-12', '2019-12-02', 'image/product/dark-spot-concealer-stick.png', 'Celeteque+DermoCosmetics+Dark+Spot+Concealer+Stick'),
(94, 'ActiveHealth SKINPRO After-Sun Soothing Gel', 'Sports Nutrition', 150, 48, '2020-12-12', '2019-12-02', 'image/product/after-sun-soothing-gel.png', 'ActiveHealth+SKINPRO+After-Sun+Soothing+Gel'),
(95, 'ActiveHealth SKINPRO Anti-Chafe Cream', 'Sports Nutrition', 150, 50, '2020-12-12', '2019-12-02', 'image/product/anti-chafe-cream.png', 'ActiveHealth+SKINPRO+Anti-Chafe+Cream'),
(96, 'Enervon Activ', 'Sports Nutrition', 150, 50, '2020-12-12', '2019-12-02', 'image/product/enervon-activ.png', 'Enervon+Activ'),
(97, 'Enervon HP', 'Sports Nutrition', 150, 50, '2020-12-12', '2019-12-02', 'image/product/enervon-hp.png', 'Enervon+HP'),
(98, 'ActiveHealth SKINPRO Sunscreen Spray', 'Sports Nutrition', 150, 50, '2020-12-12', '2019-12-02', 'image/product/sunscreen-spray.png', 'ActiveHealth+SKINPRO+Sunscreen+Spray'),
(99, 'Calciumade', 'Vitamins & Supplements', 150, 48, '2020-12-12', '2019-12-02', 'image/product/calciumade.png', 'Calciumade'),
(100, 'Conzace', 'Vitamins & Supplements', 150, 50, '2020-12-12', '2019-12-02', 'image/product/conzace.png', 'Conzace'),
(101, 'Enervon', 'Vitamins & Supplements', 150, 50, '2020-12-12', '2019-12-02', 'image/product/enervon.png', 'Enervon'),
(102, 'Flotera', 'Vitamins & Supplements', 150, 50, '2020-12-12', '2019-12-02', 'image/product/flotera.png', 'Flotera'),
(103, 'Forti-D', 'Vitamins & Supplements', 150, 50, '2020-12-12', '2019-12-02', 'image/product/forti-d.png', 'Forti-D'),
(104, 'Hemarate', 'Women\'s Health & Beauty', 150, 50, '2020-12-12', '2019-12-02', 'image/product/hemarate.png', 'Hemarate'),
(105, 'Lactezin', 'Women\'s Health & Beauty', 150, 50, '2020-12-12', '2019-12-02', 'image/product/lactezin.png', 'Lactezin'),
(106, 'Myra 300-e', 'Women\'s Health & Beauty', 150, 50, '2020-12-12', '2019-12-02', 'image/product/myra-300e.png', 'Myra+300-e'),
(107, 'Myra Triple Beauty Hand and Body Lotion', 'Women\'s Health & Beauty', 150, 50, '2020-12-12', '2019-12-02', 'image/product/myra-triple.png', 'Myra+Triple+Beauty+Hand+and+Body+Lotion');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesId` int(11) NOT NULL,
  `productName` text NOT NULL,
  `productCategory` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dateSold` date NOT NULL,
  `timeSold` time NOT NULL,
  `methodOfPayment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesId`, `productName`, `productCategory`, `price`, `quantity`, `total`, `dateSold`, `timeSold`, `methodOfPayment`) VALUES
(40, 'Alaxan', 'Allergy', 150, 1, 150, '2019-11-22', '02:29:47', 'Paypal System'),
(41, 'Alaxan', 'Body & Muscle Pain', 150, 1, 150, '2019-11-22', '02:29:47', 'Paypal System'),
(42, 'Allerin', 'Allergy', 150, 5, 750, '2019-11-23', '08:47:05', 'Cash on Delivery'),
(43, 'Allerin', 'Allergy', 150, 2, 300, '2019-11-25', '00:40:07', 'Cash on Delivery'),
(44, 'Allerin', 'Allergy', 150, 1, 150, '2019-11-25', '00:40:59', 'Cash on Delivery'),
(48, 'Allerin', 'Allergy', 150, 1, 150, '2019-11-28', '17:37:51', 'Cash on Delivery'),
(49, 'Allerin', 'Allergy', 150, 1, 150, '2019-12-02', '22:37:16', 'Direct Bank Transfer'),
(51, 'Maxvit', 'Sports Nutrition', 150, 2, 300, '2019-12-07', '12:13:34', 'Cash on Delivery'),
(52, 'Allerin', 'Allergy', 150, 2, 300, '2020-05-11', '18:06:06', 'Direct Bank Transfer'),
(53, 'Alaxan FR', 'Body & Muscle Pain', 150, 2, 300, '2020-05-11', '18:06:06', 'Direct Bank Transfer'),
(54, 'Alnix Plus Syrup', 'Children\'s Health', 150, 1, 150, '2020-05-11', '19:28:03', 'Direct Bank Transfer'),
(55, 'Allerin', 'Allergy', 150, 2, 300, '2020-05-11', '19:29:49', 'Direct Bank Transfer'),
(56, 'Alaxan FR', 'Body & Muscle Pain', 150, 1, 150, '2020-05-11', '19:38:27', 'Direct Bank Transfer'),
(57, 'Alnix Plus Syrup', 'Children\'s Health', 150, 3, 450, '2020-05-11', '19:39:50', 'Direct Bank Transfer'),
(58, 'Allerin', 'Allergy', 150, 3, 450, '2020-05-11', '19:41:37', 'Direct Bank Transfer'),
(59, 'Allerin', 'Allergy', 150, 12, 1800, '2020-05-11', '19:46:43', 'Direct Bank Transfer'),
(60, 'Allerin', 'Allergy', 150, 1, 150, '2020-05-11', '23:01:11', 'Paypal System'),
(61, 'Allerin', 'Allergy', 150, 2, 300, '2020-05-11', '23:09:50', 'Cash on Delivery'),
(62, 'Allerin', 'Allergy', 150, 1, 150, '2020-05-21', '05:04:32', 'Cash on Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `accountId` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `middleName` text NOT NULL,
  `lastName` text NOT NULL,
  `suffix` text NOT NULL,
  `gender` text NOT NULL,
  `birthDate` date NOT NULL,
  `age` int(11) NOT NULL,
  `contactNo` text NOT NULL,
  `addressLine1` text NOT NULL,
  `addressLine2` text NOT NULL,
  `city_municipality` text NOT NULL,
  `zipCode` int(11) NOT NULL,
  `country` text NOT NULL,
  `secretQuestion` text NOT NULL,
  `secretAnswer` text NOT NULL,
  `emailAddress` text NOT NULL,
  `encryptedPassword` text NOT NULL,
  `userType` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  `imageSource` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`accountId`, `firstName`, `middleName`, `lastName`, `suffix`, `gender`, `birthDate`, `age`, `contactNo`, `addressLine1`, `addressLine2`, `city_municipality`, `zipCode`, `country`, `secretQuestion`, `secretAnswer`, `emailAddress`, `encryptedPassword`, `userType`, `dateCreated`, `imageSource`) VALUES
(22, 'You', '', 'Arias', '', 'Male', '1991-08-28', 28, '09070223694', 'Ph5A P5 B23 L14', 'Bagong Silang', 'Caloocan City', 4550022, 'Philippines', 'What is Your Favorite Food?', 'Adobo', 'you_arias12345@ymail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Customer', '2019-11-23 07:43:32', 'image/user/arias.jpg'),
(23, 'You', '', 'Arias', '', 'Male', '1991-08-28', 28, '09070223694', 'Ph5A P5 B23 L14', 'Bagong Silang', 'Caloocan City', 4550022, 'Philippines', 'What is Your Favorite Food?', 'Adobo', 'you_arias12345@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Administrator', '2019-11-23 07:44:37', 'image/user/arias.jpg'),
(35, 'matt', '', 'buenagua', '', 'Male', '1998-04-15', 21, '09462070699', '4893 mannga st', 'camarin', 'caloocan', 1400, 'Philippines', 'What is Your Favorite Color?', 'black', 'mattbuenagua@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Customer', '2019-12-07 09:47:35', 'image/user/buenagua.jpg'),
(36, 'MaRIA Fe', '', 'Pepito', '', 'Female', '1968-08-06', 51, '09502165716', '4893 mannga st', 'camarin', 'Caloocan', 1400, 'Hongkong', 'What is Your Favorite Color?', 'YELLOW', 'MUSTACISA_MARIA@YAHOO.COM', 'd78a44c871e68eba188745861f5120d3827c6aab', 'Customer', '2019-12-07 10:05:34', 'image/user/pepito.jpg'),
(61, 'you', '', 'arias', '', 'Male', '1991-08-28', 28, '21321', '2321', '232131', '23123', 23131, 'Philippines', 'What is Your Favorite Food?', 'Adobo', 'you_arias12345@yahoo.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Customer', '2020-05-11 00:51:15', 'image/user/koala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE `user_comments` (
  `tableId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `dateCommented` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_comments`
--

INSERT INTO `user_comments` (`tableId`, `accountId`, `name`, `comment`, `dateCommented`) VALUES
(39, 22, 'You Arias', 'asd', '2019-12-02 22:30:23'),
(40, 35, 'matt buenagua', 'Magnda sya.. effective', '2019-12-07 09:48:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country_list`
--
ALTER TABLE `country_list`
  ADD PRIMARY KEY (`countryId`);

--
-- Indexes for table `log_in_out`
--
ALTER TABLE `log_in_out`
  ADD PRIMARY KEY (`logId`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesId`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `user_comments`
--
ALTER TABLE `user_comments`
  ADD PRIMARY KEY (`tableId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country_list`
--
ALTER TABLE `country_list`
  MODIFY `countryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `log_in_out`
--
ALTER TABLE `log_in_out`
  MODIFY `logId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user_comments`
--
ALTER TABLE `user_comments`
  MODIFY `tableId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
