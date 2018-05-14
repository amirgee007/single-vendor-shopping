-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 06:57 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelecommerce_single_vendor`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_status_chat`
--

CREATE TABLE `delivery_status_chat` (
  `chat_id` int(11) NOT NULL,
  `delStatus_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `mer_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `send_by` int(11) NOT NULL COMMENT '''1''-customer,''2''-merchant,''3''-admin',
  `note` text NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_status_chat`
--

INSERT INTO `delivery_status_chat` (`chat_id`, `delStatus_id`, `cust_id`, `mer_id`, `admin_id`, `send_by`, `note`, `created_date`, `status`) VALUES
(84, 39, 201, 41, 1, 3, 'fdfd', '2017-12-12 14:23:08', 0),
(85, 39, 201, 41, 1, 3, 'fdfd', '2017-12-12 14:28:04', 0),
(86, 40, 201, 41, 1, 3, 'gf', '2017-12-12 14:31:36', 0),
(87, 41, 201, 41, 1, 3, 'gffff', '2017-12-12 14:33:31', 0),
(88, 38, 201, 41, 1, 2, 'gfgf', '2017-12-12 14:48:08', 0),
(89, 42, 201, 41, 1, 3, 'fhgh', '2017-12-12 14:50:20', 0),
(90, 42, 201, 41, 1, 3, 'fhgh', '2017-12-12 15:05:20', 0),
(91, 44, 201, 58, 1, 2, 'erer', '2017-12-12 15:45:28', 0),
(92, 45, 201, 58, 1, 2, 'yuu', '2017-12-12 15:55:51', 0),
(93, 43, 197, 60, 1, 2, 'Get lost', '2017-12-12 16:15:42', 0),
(94, 46, 201, 0, 1, 2, 'tytyt', '2017-12-12 16:29:11', 0),
(95, 46, 201, 0, 1, 2, 'tytyt', '2017-12-12 16:30:12', 0),
(96, 46, 201, 0, 1, 2, 'tytyt', '2017-12-12 16:31:33', 0),
(97, 46, 201, 0, 1, 2, 'tytyt', '2017-12-12 16:32:09', 0),
(98, 46, 201, 0, 1, 2, 'tytyt', '2017-12-12 16:34:40', 0),
(99, 47, 197, 60, 1, 2, 'ok', '2017-12-12 16:41:34', 0),
(100, 46, 201, 0, 1, 2, 'tytyt', '2017-12-12 16:51:59', 0),
(101, 46, 201, 0, 1, 2, 'tytyt', '2017-12-12 16:52:21', 0),
(102, 49, 201, 0, 1, 3, 'hgjj', '2017-12-12 16:55:29', 0),
(103, 49, 201, 0, 1, 3, 'hgjj', '2017-12-12 16:59:48', 0),
(104, 49, 201, 0, 1, 3, 'hgjj', '2017-12-12 17:01:30', 0),
(105, 49, 201, 0, 1, 3, 'hgjj', '2017-12-12 17:01:46', 0),
(106, 49, 201, 0, 1, 3, 'hgjj', '2017-12-12 17:02:03', 0),
(107, 49, 201, 0, 1, 3, 'hgjj', '2017-12-12 17:02:23', 0),
(108, 49, 201, 0, 1, 3, 'hgjj', '2017-12-12 17:02:56', 0),
(109, 49, 201, 0, 1, 3, 'hgjj', '2017-12-12 17:03:52', 0),
(110, 48, 197, 60, 1, 2, 'j', '2017-12-12 17:05:48', 0),
(111, 50, 201, 0, 1, 3, 'hghg', '2017-12-12 17:06:13', 0),
(112, 50, 201, 0, 1, 3, 'hghg', '2017-12-12 17:07:27', 0),
(113, 51, 201, 0, 1, 3, 'fgfg', '2017-12-12 17:09:36', 0),
(114, 55, 201, 0, 1, 3, 'uiu', '2017-12-12 17:48:30', 0),
(115, 56, 201, 60, 1, 2, 'jjj', '2017-12-12 18:14:54', 0),
(116, 57, 201, 60, 1, 2, 'rtr', '2017-12-12 18:17:51', 0),
(117, 60, 201, 60, 1, 2, 'gg', '2017-12-12 18:23:46', 0),
(118, 61, 201, 60, 1, 2, 'hh', '2017-12-12 18:25:22', 0),
(119, 62, 201, 60, 1, 2, 'gff', '2017-12-12 18:31:55', 0),
(120, 63, 201, 0, 1, 2, 'hjhj', '2017-12-12 18:35:17', 0),
(121, 63, 201, 0, 1, 2, 'hjhj', '2017-12-12 18:36:27', 0),
(122, 63, 201, 0, 1, 2, 'hjhj', '2017-12-12 18:37:10', 0),
(123, 63, 201, 0, 1, 2, 'hjhj', '2017-12-12 18:37:31', 0),
(124, 63, 201, 0, 1, 2, 'hjhj', '2017-12-12 18:37:49', 0),
(125, 64, 201, 0, 1, 3, 'oooioooooo', '2017-12-12 18:41:42', 0),
(126, 66, 201, 0, 1, 3, 'sssssssssss', '2017-12-12 18:43:56', 0),
(127, 65, 201, 0, 1, 3, 'vvvvvvvvvvvvv', '2017-12-12 18:44:17', 0),
(128, 67, 201, 0, 1, 3, 'sdsds', '2017-12-12 18:48:34', 0),
(129, 69, 201, 0, 1, 3, 'ttt', '2017-12-12 19:12:33', 0),
(130, 70, 201, 0, 1, 3, 'sss', '2017-12-12 19:16:32', 0),
(131, 71, 201, 0, 1, 3, 'rrr', '2017-12-12 19:18:31', 0),
(132, 72, 201, 0, 1, 3, 'jn', '2017-12-12 19:20:08', 0),
(133, 73, 197, 60, 1, 2, 's', '2017-12-12 20:23:53', 0),
(134, 73, 197, 60, 1, 2, 's', '2017-12-12 20:24:05', 0),
(135, 76, 197, 60, 1, 2, 'hgfh', '2017-12-12 21:08:04', 0),
(136, 78, 201, 41, 1, 2, 'll', '2017-12-20 18:19:37', 0),
(137, 79, 201, 41, 1, 3, 'uyuy', '2017-12-20 19:19:21', 0),
(138, 80, 201, 41, 1, 2, 'jj', '2017-12-21 15:00:08', 0),
(139, 81, 201, 0, 1, 3, 'yuy', '2017-12-21 17:43:55', 0),
(140, 82, 201, 41, 1, 3, 'uyuy', '2017-12-21 18:53:08', 0),
(141, 82, 201, 41, 1, 3, 'uyuy', '2017-12-21 18:55:18', 0),
(142, 83, 201, 41, 1, 2, 'yuyuy', '2017-12-21 19:00:39', 0),
(143, 84, 201, 41, 1, 3, 'hjh', '2017-12-21 19:34:23', 0),
(144, 85, 201, 41, 1, 3, 'yyuyuy', '2017-12-21 19:35:37', 0),
(145, 2, 201, 41, 1, 2, 'ghg', '2017-12-25 12:50:19', 0),
(146, 1, 201, 41, 1, 2, 'jjj', '2017-12-25 13:00:23', 0),
(147, 3, 201, 41, 1, 2, 'nnnnnnn', '2017-12-25 13:30:31', 0),
(148, 4, 201, 41, 1, 2, 'oooo', '2017-12-25 13:30:51', 0),
(149, 5, 201, 41, 1, 2, 'hjhjh', '2017-12-25 13:34:19', 0),
(150, 6, 201, 41, 1, 3, 'sds', '2017-12-25 14:59:24', 0),
(151, 8, 201, 41, 1, 3, 'dfd', '2017-12-25 15:02:46', 0),
(152, 7, 201, 41, 1, 3, 'fgfgf', '2017-12-25 15:03:02', 0),
(153, 9, 201, 0, 1, 3, 'uyyuy', '2017-12-25 15:09:01', 0),
(154, 10, 201, 41, 1, 3, 'ggghgg', '2017-12-25 15:33:47', 0),
(155, 11, 201, 41, 1, 3, 'rtr', '2017-12-25 15:35:13', 0),
(156, 11, 201, 41, 1, 3, 'rtr', '2017-12-25 15:36:09', 0),
(157, 12, 201, 41, 1, 3, 'uyuy', '2017-12-25 15:38:31', 0),
(158, 13, 201, 41, 1, 2, 'fd', '2017-12-25 16:13:28', 0),
(159, 14, 201, 0, 1, 3, 'dfdd', '2017-12-25 16:13:45', 0),
(160, 14, 201, 0, 1, 3, 'dfdd', '2017-12-25 16:21:07', 0),
(161, 14, 201, 0, 1, 3, 'dfdd', '2017-12-25 16:24:55', 0),
(162, 14, 201, 0, 1, 3, 'dfdd', '2017-12-25 16:25:50', 0),
(163, 14, 201, 0, 1, 3, 'dfdd', '2017-12-25 16:26:41', 0),
(164, 14, 201, 0, 1, 3, 'dfdd', '2017-12-25 16:26:50', 0),
(165, 14, 201, 0, 1, 3, 'dfdd', '2017-12-25 16:27:05', 0),
(166, 15, 201, 0, 1, 3, 'hghg', '2017-12-25 16:44:01', 0),
(167, 16, 201, 41, 1, 2, 'ooooo', '2017-12-25 16:46:25', 0),
(168, 17, 201, 0, 1, 3, 'gfff', '2017-12-25 16:52:15', 0),
(169, 18, 201, 0, 1, 3, 'dfd', '2017-12-25 16:55:50', 0),
(170, 18, 201, 0, 1, 3, 'dfd', '2017-12-25 16:57:49', 0),
(171, 19, 197, 41, 1, 2, 'Approved Cancellation ', '2018-01-03 17:03:35', 0),
(172, 20, 214, 62, 1, 2, 'disapprove', '2018-01-08 18:37:00', 0),
(173, 32, 201, 41, 1, 2, 'okay', '2018-01-17 10:09:36', 0),
(174, 30, 201, 41, 1, 2, '<html> okay </html> <b> Thanks for shopping </b>', '2018-01-17 11:00:12', 0),
(175, 34, 201, 68, 1, 2, 'test', '2018-02-03 17:52:21', 0),
(176, 40, 229, 0, 1, 3, 'test ok', '2018-02-05 11:01:54', 0),
(177, 41, 229, 0, 1, 3, 'test', '2018-02-06 15:51:23', 0),
(178, 42, 229, 90, 1, 2, 'ok', '2018-02-06 17:10:48', 0),
(179, 44, 229, 60, 1, 2, 'test', '2018-02-17 18:48:34', 0),
(180, 45, 229, 60, 1, 2, 'test', '2018-02-17 18:55:43', 0),
(181, 46, 229, 60, 1, 2, 'test', '2018-02-17 19:26:28', 0),
(182, 48, 229, 90, 1, 2, 'test', '2018-03-01 19:52:07', 0),
(183, 50, 201, 0, 1, 2, 'accept', '2018-03-06 16:25:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_aboutus`
--

CREATE TABLE `nm_aboutus` (
  `ap_id` int(11) NOT NULL,
  `ap_description` longtext NOT NULL,
  `ap_description_fr` longtext NOT NULL,
  `ap_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_aboutus`
--

INSERT INTO `nm_aboutus` (`ap_id`, `ap_description`, `ap_description_fr`, `ap_date`) VALUES
(1, 'About Us', 'À propos de nous', '2017-06-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nm_add`
--

CREATE TABLE `nm_add` (
  `ad_id` smallint(5) UNSIGNED NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_name_fr` varchar(200) NOT NULL,
  `ad_position` tinyint(4) NOT NULL COMMENT '1-left,2-middle,3-right',
  `ad_pages` tinyint(4) NOT NULL COMMENT '1-home,2-product,3-Deal,4-Auction',
  `ad_redirecturl` varchar(150) NOT NULL,
  `ad_img` varchar(150) NOT NULL,
  `ad_type` int(11) NOT NULL DEFAULT '1' COMMENT '1-admin 2 customer',
  `ad_status` tinyint(3) UNSIGNED NOT NULL,
  `ad_read_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-not read 1 read'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_add`
--

INSERT INTO `nm_add` (`ad_id`, `ad_name`, `ad_name_fr`, `ad_position`, `ad_pages`, `ad_redirecturl`, `ad_img`, `ad_type`, `ad_status`, `ad_read_status`) VALUES
(1, 'Mens Fashion', ' Moda de hombres', 1, 1, 'http://google.com', 'Ads_1516431547.jpg', 1, 0, 1),
(3, 'Mobiles', 'Móviles', 2, 1, 'https://www.google.co.in', 'Ads_1516431567.jpg', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_admin`
--

CREATE TABLE `nm_admin` (
  `adm_id` int(10) UNSIGNED NOT NULL,
  `adm_fname` varchar(150) NOT NULL,
  `adm_lname` varchar(150) NOT NULL,
  `adm_password` varchar(150) NOT NULL,
  `adm_email` varchar(150) NOT NULL,
  `adm_phone` varchar(20) NOT NULL,
  `adm_address1` varchar(150) NOT NULL,
  `adm_address2` varchar(150) NOT NULL,
  `adm_ci_id` int(10) UNSIGNED NOT NULL COMMENT 'city id',
  `adm_co_id` smallint(5) UNSIGNED NOT NULL COMMENT 'country id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_admin`
--

INSERT INTO `nm_admin` (`adm_id`, `adm_fname`, `adm_lname`, `adm_password`, `adm_email`, `adm_phone`, `adm_address1`, `adm_address2`, `adm_ci_id`, `adm_co_id`) VALUES
(1, 'admin', 'admin', 'admin', 'suganya.t@pofitec.com', '9790153222', 'chennai', 'chennai', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_adminreply_comments`
--

CREATE TABLE `nm_adminreply_comments` (
  `reply_id` int(11) NOT NULL,
  `reply_blog_id` int(11) NOT NULL,
  `reply_cmt_id` int(11) NOT NULL,
  `reply_msg` text NOT NULL,
  `reply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_adminreply_comments`
--

INSERT INTO `nm_adminreply_comments` (`reply_id`, `reply_blog_id`, `reply_cmt_id`, `reply_msg`, `reply_date`) VALUES
(1, 1, 1, 'oke oke oke oke oke oke oke<br>', '2016-03-10 08:15:34'),
(2, 1, 1, 'dfgdfdfzhghdrdhghd', '2016-03-31 22:23:25'),
(3, 1, 3, 'teststtttttttttttttttttt', '2017-06-09 12:23:12'),
(4, 1, 8, 'okay........................', '2017-06-09 12:54:19'),
(5, 1, 4, '&nbsp;test testtest testtest test test test&nbsp;&nbsp;test testtest testtest test test test', '2017-07-27 11:27:16'),
(6, 1, 2, 'This Project Under testing', '2018-02-06 10:35:37'),
(7, 1, 2, 'This Page is under debugging', '2018-02-06 10:36:52'),
(8, 1, 2, '', '2018-02-06 10:37:03'),
(9, 1, 3, 'Test test test test test test test test', '2018-02-06 10:37:43'),
(10, 1, 2, 'This is test site please go away', '2018-02-06 10:57:42'),
(11, 1, 2, '', '2018-02-06 10:57:48'),
(12, 1, 7, '', '2018-02-17 07:42:32'),
(13, 1, 1, '', '2018-02-17 07:43:58'),
(14, 1, 1, '', '2018-02-17 08:00:06'),
(15, 1, 10, 'test test test est', '2018-02-27 13:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `nm_auction`
--

CREATE TABLE `nm_auction` (
  `auc_id` int(10) UNSIGNED NOT NULL,
  `auc_title` varchar(500) NOT NULL,
  `auc_category` int(11) NOT NULL,
  `auc_main_category` int(11) NOT NULL,
  `auc_sub_category` int(11) NOT NULL,
  `auc_second_sub_category` int(11) NOT NULL,
  `auc_original_price` int(11) NOT NULL,
  `auc_auction_price` int(11) NOT NULL,
  `auc_bitinc` smallint(5) UNSIGNED NOT NULL,
  `auc_saving_price` int(11) NOT NULL,
  `auc_start_date` datetime NOT NULL,
  `auc_end_date` datetime NOT NULL,
  `auc_shippingfee` decimal(10,2) NOT NULL,
  `auc_shippinginfo` text NOT NULL,
  `auc_description` text NOT NULL,
  `auc_merchant_id` int(11) NOT NULL,
  `auc_shop_id` int(11) NOT NULL,
  `auc_meta_keyword` varchar(250) NOT NULL,
  `auc_meta_description` varchar(500) NOT NULL,
  `auc_image_count` int(11) NOT NULL,
  `auc_image` varchar(500) NOT NULL,
  `auc_status` int(11) NOT NULL DEFAULT '1' COMMENT '1-active, 0-block',
  `auc_posted_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_auction`
--

INSERT INTO `nm_auction` (`auc_id`, `auc_title`, `auc_category`, `auc_main_category`, `auc_sub_category`, `auc_second_sub_category`, `auc_original_price`, `auc_auction_price`, `auc_bitinc`, `auc_saving_price`, `auc_start_date`, `auc_end_date`, `auc_shippingfee`, `auc_shippinginfo`, `auc_description`, `auc_merchant_id`, `auc_shop_id`, `auc_meta_keyword`, `auc_meta_description`, `auc_image_count`, `auc_image`, `auc_status`, `auc_posted_date`) VALUES
(1, 'Diamond necklace', 1, 1, 1, 1, 15000, 10500, 10, 4500, '2014-08-09 12:50:47', '2014-09-09 12:50:47', '10.00', 'Ships to india', 'Diamond necklace will take you to a completely different world with \r\nspectacular views. Jewelry diamond necklaces the most beautiful state. \r\nJewelry design is an art. The worldâ€™s most valuable asset is the people.\r\n Charms adorn people. So, Jewelry design is the art of human adornment. \r\nJewelry design is one of the oldest professions. Diamond necklaces are \r\ndesigned by expert designers. We chose the most beautiful diamond \r\nnecklace designs for you. There are two predominant objective in the \r\ndesign of diamond necklaces. Exquisite designs, modesty shows in the \r\nwealth. Large stone adorned with necklaces, are influenced environment. \r\nYou can choose the most special days of the diamond necklace.<br><br><br>', 6, 5, 'Diamond', 'Diamond', 2, 'jewelzc8BoIZr.jpg/**/new2jdMILdT7.jpg/**/new1PhpgKukL.jpg/**/', 1, '2014-08-13 04:11:08'),
(2, 'hand bags', 1, 1, 1, 1, 1500, 1000, 10, 500, '2014-08-13 16:49:34', '2014-08-06 16:49:34', '25.00', 'free', 'asds', 2, 1, 'asd', 'asss', 4, '2YmlkRqJC.png/**/5UCkEi0zv.png/**/4TZEEKtZ7.png/**/1Zfw5yHW8.png/**/6A9AOLRAx.png/**/', 1, '2014-08-11 11:20:54'),
(3, 'hand bags', 1, 1, 1, 1, 1500, 1000, 10, 500, '2014-08-09 12:50:47', '2014-08-12 16:51:17', '25.00', 'swds', 'sdsa', 2, 1, 'sads', 'asdsa', 4, '2w4QZLuE2.png/**/5iJNcTQKA.png/**/62wJiGqDm.png/**/1r11FrvLT.png/**/3hypyZDuW.png/**/', 1, '2014-08-11 11:22:15'),
(4, 'Merchant deal', 2, 2, 2, 2, 10000, 9000, 10, 1000, '2014-08-12 09:38:54', '2014-08-13 15:24:54', '10.00', 'coimbatore vadavalli', 'Meta keywords<br>', 4, 3, 'fdafds', 'dsfds', 2, 'flower3SIH0fbjz.jpg/**/flower1Fk1kQ6Cw.jpg/**/flower2jaBoQuEf.jpg/**/', 1, '2014-08-13 04:10:25'),
(5, 'sasa', 1, 1, 1, 1, 150, 100, 5, 50, '2014-11-21 19:41:48', '2014-11-28 19:41:48', '12.00', 'wewewe', 'weewe', 1, 1, 'wewe', 'wewe', 0, 'DMR_48xTLGZCgG.jpg/**/', 1, '2014-11-20 16:14:58'),
(6, 'BiG Bazar', 2, 2, 0, 0, 1000, 100, 10, 900, '2014-12-10 11:20:30', '2014-12-16 11:20:30', '3.00', 'shipp', 'auction', 5, 4, 'rterte', 'ertert', 0, 'IMG_1269_wUYY6ufcW.jpg/**/', 1, '2014-12-10 10:22:18'),
(7, 'Senbagam', 5, 9, 19, 49, 400, 300, 10, 100, '2015-05-11 08:15:34', '2015-05-12 08:04:34', '0.00', 'item shipping', 'This product which unique<br>', 3, 2, 'keywords', 'keywords', 0, 'ChrysanthemumZVXd9lBr.jpg/**/', 1, '2015-05-11 02:49:23'),
(8, 'shoe sport', 4, 7, 33, 0, 100, 50, 1, 50, '2016-02-17 18:34:37', '2016-02-25 18:34:37', '0.00', 'ship to you', 'is a sport shoe, nike', 1, 1, 'ss', 'ss', 0, 'slide1-2mwb33rdS.png/**/', 1, '2016-02-17 10:36:00'),
(9, 'Test Auc', 5, 8, 14, 35, 320, 250, 10, 70, '2016-03-09 17:40:47', '2016-03-25 17:40:47', '20.00', 'Test', 'Test', 1, 140, 'Test', 'Test', 0, 'imagesRT1JF5cz.jpeg/**/', 1, '2016-03-09 12:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `nm_banner`
--

CREATE TABLE `nm_banner` (
  `bn_id` smallint(5) UNSIGNED NOT NULL,
  `bn_title` varchar(150) NOT NULL,
  `bn_title_fr` varchar(150) NOT NULL,
  `bn_type` varchar(10) NOT NULL COMMENT '1-home,2-product,3-deal,4-auction',
  `bn_img` varchar(150) NOT NULL,
  `bn_status` int(11) NOT NULL COMMENT '1-block,0-unblock',
  `bn_redirecturl` text NOT NULL,
  `bn_slider_position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_banner`
--

INSERT INTO `nm_banner` (`bn_id`, `bn_title`, `bn_title_fr`, `bn_type`, `bn_img`, `bn_status`, `bn_redirecturl`, `bn_slider_position`) VALUES
(44, 'Mens Wear', 'hgjhg', '1,1,1', 'Banner_1516963399.jpg', 1, 'http://www.yahoo.com', '1'),
(45, 'Womens Wear', 'Womens Wear', '1,1,1', 'Banner_1516963408.jpg', 0, 'http://demo.laravelecommerce.com/', '1'),
(46, 'Kids wear', '', '1,1,1', 'Banner_1516963420.jpg', 0, 'http://demo.laravelecommerce.com/', '1'),
(47, 'Cycles', '', '1,1,1', 'Banner_1516963443.jpg', 0, 'http://demo.laravelecommerce.com/', '1'),
(51, 'ch', '', '1,1,1', 'banner2TGGsF3fdm30rwCkM.jpg', 1, 'http://demo.laravelecommerce.com/', '1'),
(52, 'dsaddfgdgf', '', '1,1,1', 'banner2TGGsF3fdY5A8dyRHLa4ZLDPC.jpg', 1, 'http://demo.laravelecommerce.com/', '1'),
(53, 'test', 'tester', '1,1,1', 'banner_151360004831540.jpg', 1, 'http://demo.laravelecommerce.com/', '1'),
(54, 'img check', '', '1,1,1', 'Banner1513599996_870-350.jpg', 1, 'http://www.google.com', '1'),
(55, 'sdas', '', '1,1,1', 'Banner_1513601266.jpg', 1, 'http://www.google.com', '1'),
(56, 'asdasd', '', '1,1,1', 'Banner1513601287.jpg', 1, 'http://www.google.com', '1'),
(57, 'sds', '', '1,1,1', 'Banner1513769913.jpg', 1, 'http://www.google.com', '1'),
(58, 'Website', '', '1,1,1', 'Banner1517908861.jpg', 0, 'http://www.google.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `nm_blog`
--

CREATE TABLE `nm_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(50) NOT NULL,
  `blog_title_fr` varchar(100) NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_desc_fr` text NOT NULL,
  `blog_catid` int(11) NOT NULL,
  `blog_image` varchar(100) NOT NULL,
  `blog_metatitle` varchar(100) NOT NULL,
  `blog_metatitle_fr` varchar(150) NOT NULL,
  `blog_metadesc` text NOT NULL,
  `blog_metadesc_fr` text NOT NULL,
  `blog_metakey` varchar(100) NOT NULL,
  `blog_metakey_fr` varchar(150) NOT NULL,
  `blog_tags` varchar(100) NOT NULL,
  `blog_comments` int(5) NOT NULL COMMENT '0-not allow,1-allow',
  `blog_type` int(5) UNSIGNED NOT NULL COMMENT '1-publish,2-drafts',
  `blog_status` tinyint(3) UNSIGNED NOT NULL COMMENT '1-block,0-unblock',
  `blog_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_blog`
--

INSERT INTO `nm_blog` (`blog_id`, `blog_title`, `blog_title_fr`, `blog_desc`, `blog_desc_fr`, `blog_catid`, `blog_image`, `blog_metatitle`, `blog_metatitle_fr`, `blog_metadesc`, `blog_metadesc_fr`, `blog_metakey`, `blog_metakey_fr`, `blog_tags`, `blog_comments`, `blog_type`, `blog_status`, `blog_created_date`) VALUES
(1, 'test', 'tester ', 'description', 'la description', 3, 'Ads_15106464267411.jpg', 'test', 'sdfsdfsdf', 'test', 'sdfsdf', 'test', 'sdfsdf', 'tag', 1, 1, 0, '2017-06-07 10:17:59'),
(4, 'blog title', ' Titre du Blogsss', 'blog description', 'description du blogsss', 2, 'Blog_1517913175_shop.jpg', 'meta title', 'méta titresss', 'meta description', 'Meta Descriptionsss', 'meta keywords', 'meta keywordssss', 'tags', 1, 2, 0, '2017-09-29 07:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `nm_blogsetting`
--

CREATE TABLE `nm_blogsetting` (
  `bs_id` tinyint(3) UNSIGNED NOT NULL,
  `bs_allowcommt` tinyint(4) NOT NULL,
  `bs_radminapproval` tinyint(4) NOT NULL COMMENT 'Require Admin Approval (1-yes & 0-No)',
  `bs_postsppage` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_blogsetting`
--

INSERT INTO `nm_blogsetting` (`bs_id`, `bs_allowcommt`, `bs_radminapproval`, `bs_postsppage`) VALUES
(1, 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `nm_blog_cus_comments`
--

CREATE TABLE `nm_blog_cus_comments` (
  `cmt_id` int(11) NOT NULL,
  `cmt_blog_id` int(11) NOT NULL,
  `cmt_name` varchar(250) NOT NULL,
  `cmt_email` varchar(250) NOT NULL,
  `cmt_website` varchar(250) NOT NULL,
  `cmt_msg` text NOT NULL,
  `cmt_admin_approve` int(11) NOT NULL DEFAULT '0' COMMENT '1 => Approved, 2 => Unapproved',
  `cmt_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cmt_msg_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-not read ,1 Read '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_blog_cus_comments`
--

INSERT INTO `nm_blog_cus_comments` (`cmt_id`, `cmt_blog_id`, `cmt_name`, `cmt_email`, `cmt_website`, `cmt_msg`, `cmt_admin_approve`, `cmt_date`, `cmt_msg_status`) VALUES
(1, 1, 'yamuna', 'yamua@nexplocindia.com', 'https://www.google.co.in/?gfe_rd=cr&ei=pwbrU7zeM6HV8gfkuYDABQ&gws_rd=ssl', 'description about the product', 0, '2014-08-13 01:03:36', 1),
(2, 1, 'charles', 'charlesvictor.j@pofitec.com', 'http://pofitec.com', 'Lorem ipsum dolor sit amet, lobortis mauris sed, mi fringilla enim nulla tincidunt nibh, mauris lectus ante rutrum at dui, mauris urna varius. Etiam amet vestibulum sodales augue, metus dapibus aspernatur in vel placerat, consectetuer mattis ornare non est convallis vitae, libero in non urna at. Tempor placerat sollicitudin consectetuer justo lacinia, pulvinar arcu arcu purus vel quisque ligula, felis vivamus curabitur nascetur purus elit, tempus mauris varius nulla faucibus sem, auctor mauris eget. Eu nunc ac nostra lectus, wisi dui ante sit sollicitudin aliquam, et nulla urna condimentum nisl cras, lobortis nisl primis libero id. Eu cum, dolor vitae turpis ut dui, neque quam vulputate ut ut. Sodales nostra sed suspendisse cras et, dictum  ', 1, '2016-06-07 04:37:37', 1),
(3, 1, 'test', 'saranya@pofitec.com', 'http://pofitec.com', 'd', 1, '2017-06-09 11:54:31', 1),
(4, 1, 'testtsttt', 'saranya@pofitec.com', 'http://pofitec.com', 'sgfrrrrrrrrrrrrrrrrrrrr', 1, '2017-06-09 12:23:56', 1),
(5, 1, 'f', 'saranya@pofitec.com', 'http://pofitec.com', 'fffffffffffffffffffff', 1, '2017-06-09 12:34:43', 1),
(6, 1, 'fg', 'saranya@pofitec.com', 'http://pofitec.com', 'dfgggggggggggggg', 1, '2017-06-09 12:37:20', 1),
(7, 1, 'tt', 'saranya@pofitec.com', 'http://pofitec.com', 'tttttttttttttttttttttttttttttttt', 0, '2017-06-09 12:51:09', 1),
(8, 1, 'tt', 'saranya@pofitec.com', 'http://pofitec.com', 'tttttttttttttttttttttttttttttttt', 1, '2017-06-09 12:51:38', 1),
(9, 1, 'ddghhg', 'saranya@pofitec.com', 'http://pofitec.com', 'dffffffffffffffffff', 0, '2017-06-09 12:54:42', 1),
(10, 1, 'saranya', 'saranya@pofitec.com', 'http://pofitec.com', 'test', 1, '2017-06-27 12:23:54', 1),
(11, 1, 'saranya', 'saranya@pofitec.com', 'http://pofitec.com', 'asfsdfsgsdgdfgdfggggggggggggggggggggg', 0, '2017-06-27 12:24:44', 1),
(12, 1, 'test', 'saranya@pofitec.com', 'http://pofitec.com', 'tstststttstsdfgdf', 0, '2017-06-27 12:27:24', 1),
(13, 1, 'test', 'saranya@pofitec.com', 'http://pofitec.com', 'vvvvvvvvvv', 0, '2017-06-27 12:28:00', 1),
(14, 1, 'test', 'saranya@pofitec.com', 'http://pofitec.com', '1st dfgd', 0, '2017-06-27 12:37:06', 1),
(15, 1, 'dfgdfg', 'saranya@pofitec.com', 'http://pofitec.com', 'ttttt', 0, '2017-06-27 12:37:49', 1),
(16, 1, 'saranya', 'saranya@pofitec.com', '', 'hggh', 0, '2017-07-10 06:32:37', 1),
(17, 1, 'TEST', 'saranya@pofitec.com', 'http://pofitec.com', 'TEST', 0, '2017-10-03 11:23:13', 1),
(18, 1, 'user', 'user@gmail.com', 'www.google.com', 'sfsdgfdg', 0, '2018-02-06 12:00:40', 1),
(19, 1, 'sdfa', 'sdfasfad@dfgd.com', 'sdfsa', 'sdfa', 0, '2018-02-12 13:22:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_category_ad`
--

CREATE TABLE `nm_category_ad` (
  `cat_ad_id` int(11) NOT NULL,
  `cat_ad_maincat_id` int(11) NOT NULL,
  `cat_ad_img` varchar(512) NOT NULL,
  `cat_ad_status` int(11) NOT NULL COMMENT '1-block,0-Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_category_ad`
--

INSERT INTO `nm_category_ad` (`cat_ad_id`, `cat_ad_maincat_id`, `cat_ad_img`, `cat_ad_status`) VALUES
(28, 12, 'Category_advertisment_151064169126863.jpg/**/Category_advertisment_1510641768_170x400.jpg/**/Category_advertisment_1510641751_170x400 2.jpg/**/', 0),
(29, 2, 'ad2_1.jpg/**//**//**/', 0),
(30, 4, 'ad4_1.jpg/**//**/ad4_3.jpg/**/', 1),
(32, 14, 'ad14_1.jpg/**//**//**/', 1),
(34, 24, 'Category_advertisment1511247474_gscuts60201gmel-gritstones-xl-400x400-imaefss4vb8tdf2g.jpeg/**//**//**/', 0),
(35, 6, 'Category_advertisment1513600303_Banner22.jpg/**//**//**/', 0),
(36, 16, 'Category_advertisment1513601467.png/**/Category_advertisment_1513601479.png/**//**/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_category_banner`
--

CREATE TABLE `nm_category_banner` (
  `cat_bn_id` int(11) NOT NULL,
  `cat_bn_maincat_id` int(11) NOT NULL,
  `cat_bn_img` varchar(512) NOT NULL,
  `cat_bn_status` int(1) NOT NULL COMMENT '1-block,0-Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_category_banner`
--

INSERT INTO `nm_category_banner` (`cat_bn_id`, `cat_bn_maincat_id`, `cat_bn_img`, `cat_bn_status`) VALUES
(40, 6, 'Category_banner_15106425075323.jpg/**/Category_banner_151064266726609.jpg/**/Category_banner_1510642679_baby2.JPG/**/', 0),
(41, 2, 'Category_banner_1510310261_tent-250x200.jpg/**/Category_banner_1510310261_tent-250x200.jpg/**/Category_banner_1510310261_tent-250x200.jpg/**/', 0),
(42, 4, 'Category_banner_1513600711_250-200.jpg/**/Category_banner_1513600724_250-200.jpg/**//**/', 0),
(43, 16, 'Category_banner_1513601559_250-200.jpg/**//**//**/', 0),
(44, 47, 'Category_banner_1515648542_250-200.jpg/**//**//**/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_city`
--

CREATE TABLE `nm_city` (
  `ci_id` int(10) UNSIGNED NOT NULL,
  `ci_name` varchar(100) NOT NULL,
  `ci_name_fr` varchar(150) NOT NULL,
  `ci_con_id` smallint(6) NOT NULL,
  `ci_lati` varchar(150) NOT NULL,
  `ci_long` varchar(150) NOT NULL,
  `ci_default` tinyint(4) NOT NULL,
  `ci_status` tinyint(4) NOT NULL COMMENT '1=>unblock,0=>block'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_city`
--

INSERT INTO `nm_city` (`ci_id`, `ci_name`, `ci_name_fr`, `ci_con_id`, `ci_lati`, `ci_long`, `ci_default`, `ci_status`) VALUES
(1, 'Coimbatore', 'Coimbatoref', 1, '11.00469725195311', '76.92911993710936', 1, 1),
(2, 'chennai', 'Chennai', 1, '12.76506834229134', '80.13712774960936', 0, 0),
(3, 'Delhi', '', 1, '28.52674846734579', '77.13511358945311', 0, 1),
(4, 'Chennai', 'Chennai', 1, '12.91101510701221', '77.66657721249999', 0, 0),
(5, 'Kolkata', 'Kolkata', 1, '23.05206669256911', '87.99372564999999', 0, 0),
(6, 'Bangalore', 'Bangalore', 1, '9999.99999999999999', '9999.99999999999999', 0, 0),
(7, 'Karachi ', '', 9, '24.93887792565219', '67.11970221249999', 0, 0),
(8, 'Lahore ', '', 9, '31.47798880363051', '74.32673346249999', 0, 0),
(9, 'Rawalpindi', '', 9, '33.73588012259288', '73.09626471249999', 0, 0),
(10, 'Islamabad', '', 9, '33.77241754538310', '73.14021002499999', 0, 0),
(11, 'fdgdfg', '', 1, '0.00000000000000', '0.00000000000000', 0, 0),
(12, 'Vatican City', '', 14, '49.96014769063628', '11.88044439999999', 0, 1),
(13, 'Lahore', 'ville anglaiseaa', 15, '11.02896094157218', '74.41056419999995', 0, 1),
(14, 'Lahore', '', 1, '45.61554100000000', '74.35874730000000', 0, 1),
(15, 'vadavalli', '', 1, '11.0247473', '76.89803710000001', 0, 1),
(16, 'peelamedu', '', 1, '11.0331511', '77.02765999999997', 0, 1),
(17, 'guindy', '', 1, '13.0102357', '80.21565099999998', 0, 1),
(18, 'Indira', '', 1, '20.59368400000000', '78.96288000000004', 0, 1),
(19, 'kochi', '', 1, '9.9312328', '76.26730410000005', 0, 1),
(20, 'hjhgkjhk', '', 1, '20.59368400000000', '77.21401560000004', 0, 1),
(21, 'jij', '', 1, '18.93781630000000', '72.83288410000000', 0, 1),
(22, 'vadavalli', '', 7, '29.93439029999999', '-93.9890924', 0, 1),
(23, 'ravalpend', '', 1, '31.2906425', '75.79201460000002', 0, 1),
(24, 'los angles', '', 7, '34.0522342', '-118.2436849', 0, 1),
(25, 'Namakkal', '', 1, '11.2839847', '78.1108279', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_cms_pages`
--

CREATE TABLE `nm_cms_pages` (
  `cp_id` smallint(5) UNSIGNED NOT NULL,
  `cp_title` varchar(250) NOT NULL,
  `cp_title_fr` varchar(250) NOT NULL,
  `cp_description` longtext NOT NULL,
  `cp_description_fr` longtext NOT NULL,
  `cp_status` tinyint(4) NOT NULL DEFAULT '1',
  `cp_created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_cms_pages`
--

INSERT INTO `nm_cms_pages` (`cp_id`, `cp_title`, `cp_title_fr`, `cp_description`, `cp_description_fr`, `cp_status`, `cp_created_date`) VALUES
(9, 'Security', '', 'test', '', 1, '2018-01-19 15:18:24'),
(10, 'Terms of use', 'titre de la page en anglaiss', 'Page description in english', 'Description de la page en anglaiss', 1, '2018-01-19 15:18:13'),
(13, 'Help', '', 'What Information Do You We Collect<br>We collect information from you when&nbsp;register&nbsp;on our site or fill out our contact form.<br>When ordering or raising&nbsp;enquiry&nbsp;on our website, as appropriate, you may be asked to enter your Name, Email id, Phone&nbsp;number&nbsp;and&nbsp;skype&nbsp;ID.&nbsp;However&nbsp;you could visit Laravel&nbsp;ecommerce&nbsp;website anonymously.<br><br>Special Notice&nbsp;<br>If you are under 13 years old Laravel&nbsp;Ecommerce&nbsp;website is not anticipated at children under 13 years old and we do not collect, use, provide or process in any other form any personal information of children under the age of 13 consciously. We therefore also ask you, if you are under 13 years old, please do not send us your personal information (for example, your name, address and email address).<br><br>Purposes of the collection of your data<br>&nbsp;Laravel&nbsp;Ecommerce&nbsp;is&nbsp;intent&nbsp;to inform you of who we are and what we do. We collect and use personal information (including name, phone&nbsp;number&nbsp;and email ID) to better provide you with the required services, or information. We&nbsp;would therefore&nbsp;use your personal information in order to:<ul><li>Acknowledge to your queries or requests</li><li>Govern our obligations in relation to any agreement you have with us</li><li>Anticipate and resolve problems with any goods or services supplied to you</li><li>Create products or services that may meet your needs</li></ul>Keeping our records accurate<br>&nbsp;We aim to keep our data confidential about you as authentic as possible. If you would like to review, change or delete the details you have provided with us, please contact us via email which is&nbsp;mentioned in&nbsp;our website.<br><br>Security of your personal data<br>&nbsp;As we value your personal information, we will establish sufficient level of protection. We have therefore enforced technology and policies with the objective of protecting your privacy from illegal access and erroneous use and will update these measures as new technology becomes available, as relevant.<br>Cookies policy<h4>Why do we use cookies?</h4>We use browser cookies to learn more about the way you interact with our content and help us to improve your experience when visiting our website.<br>Cookies remember the type of browser you use and which additional browser software you have installed. They also remember your preferences, such as language and region, which remain as your default settings when you revisit the website. Cookies also allow you to rate pages and fill in comment forms.<br>Some of the cookies we use are session cookies and only last until you close your browser, others are persistent cookies which are stored on your computer for longer.<br>Changes on privacy policy<br>&nbsp;We may make&nbsp;changes on&nbsp;our website’s privacy policy at any time. If we make any consequential changes to this privacy policy and the way in which we use your personal data we will post these changes on this page and will do our best to notify you of any significant changes. Kindly often check our privacy policies.', '', 1, '2017-12-18 16:47:27'),
(14, 'Returns Policy', '', '1.merchant terms and condition', '', 1, '2018-01-19 15:17:55'),
(15, 'Privacy', '', 'test', '', 1, '2018-01-19 15:18:41'),
(16, 'Infringement', '', 'test', '', 1, '2018-01-19 15:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `nm_color`
--

CREATE TABLE `nm_color` (
  `co_id` smallint(5) UNSIGNED NOT NULL,
  `co_code` varchar(10) NOT NULL,
  `co_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_color`
--

INSERT INTO `nm_color` (`co_id`, `co_code`, `co_name`) VALUES
(5, '#714693', 'Affair'),
(6, '#0047AB', 'Cobalt'),
(8, '#E7F8FF', 'Lily White'),
(9, '#163531', 'Gable Green'),
(10, '#B4C2DA', 'Pigeon Post'),
(11, '#000000', 'Black'),
(12, '#6195ED', 'Cornflower Blue'),
(13, '#66ED61', 'Pastel Green'),
(14, '#252F41', 'Ebony Clay'),
(15, '#3C485D', 'Oxford Blue'),
(16, '#9199AC', 'Manatee'),
(17, '#8F4B0E', 'Korma'),
(18, '#1D2A3E', 'Cloud Burst'),
(19, '#1C1E21', 'Shark'),
(20, '#0C1422', 'Ebony'),
(21, '#3E5884', 'East Bay'),
(23, '#070B12', 'Ebony'),
(24, '#07090D', 'Bunker'),
(25, '#4C4F56', 'Abbey'),
(26, '#F0F8FF', 'Alice Blue'),
(27, '#ED6461', 'Burnt Sienna'),
(28, '#ED6175', 'Mandy'),
(29, '#0D1116', 'Bunker'),
(30, '#6195ED', 'Cornflower Blue'),
(31, '#6195ED', 'Cornflower Blue'),
(34, '#273E72', 'Astronaut'),
(36, '#7CB0A1', 'Acapulco'),
(37, '#FF0000', 'Red'),
(38, '#7CB0A1', 'Acapulco'),
(39, '#C9FFE5', 'Aero Blue'),
(40, '#EB9373', 'Apricot'),
(41, '#4C80D6', 'Havelock Blue'),
(42, '#A7C219', 'La Rioja'),
(43, '#D92030', 'Alizarin Crimson'),
(44, '#7CB0A1', 'Acapulco'),
(45, '#6A428A', 'Affair'),
(46, '#6195ED', 'Cornflower Blue'),
(47, '#6195ED', 'Cornflower Blue'),
(48, '#6195ED', 'Cornflower Blue'),
(49, '#201259', 'Lucky Point'),
(50, '#7CB0A1', 'Acapulco'),
(51, '#6195ED', 'Cornflower Blue'),
(52, '#F5E9D3', 'Albescent White'),
(53, '#044022', 'Zuccini'),
(54, '#044022', 'Zuccini'),
(56, '#4C4F56', 'Abbey'),
(57, '#4C4F56', 'Abbey'),
(58, '#1B1404', 'Acadia'),
(59, '#E32636', 'Alizarin Crimson'),
(60, '#FFF8D1', 'Baja White'),
(61, '#FFF4CE', 'Barley White'),
(62, '#AF8F2C', 'Alpine'),
(63, '#EDB381', 'Tacao'),
(64, '#A5CB0C', 'Bahia'),
(65, '#49783B', 'Fern Green'),
(66, '#6761ED', 'Cornflower Blue'),
(67, '#EDAC61', 'Porsche'),
(68, '#8361ED', 'Cornflower Blue'),
(69, '#DBDBDB', 'Alto'),
(70, '#68ED61', 'Pastel Green'),
(71, '#79ED61', 'Pastel Green'),
(72, '#FAFAFA', 'Alabaster'),
(73, '#9AED61', 'Sulu');

-- --------------------------------------------------------

--
-- Table structure for table `nm_contact`
--

CREATE TABLE `nm_contact` (
  `cont_id` int(10) UNSIGNED NOT NULL,
  `cont_name` varchar(100) NOT NULL,
  `cont_email` varchar(150) NOT NULL,
  `cont_no` varchar(50) NOT NULL,
  `cont_message` text NOT NULL,
  `cont_restatus` tinyint(4) NOT NULL,
  `cont_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nm_country`
--

CREATE TABLE `nm_country` (
  `co_id` smallint(5) UNSIGNED NOT NULL,
  `co_code` varchar(10) NOT NULL,
  `co_name` varchar(30) NOT NULL,
  `co_name_fr` varchar(150) NOT NULL,
  `co_cursymbol` varchar(5) NOT NULL,
  `co_curcode` varchar(10) NOT NULL,
  `co_status` tinyint(4) NOT NULL COMMENT '1-block,0-unblock'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_country`
--

INSERT INTO `nm_country` (`co_id`, `co_code`, `co_name`, `co_name_fr`, `co_cursymbol`, `co_curcode`, `co_status`) VALUES
(1, 'IND', 'India', 'Inde', 'Rs', 'INR', 0),
(5, 'IR', 'Iran', '', 'Rls', 'IRR', 1),
(6, 'CZ', 'czech republic', '', 'K?', 'CZK', 1),
(7, 'USA', 'United States of America', '', '$', 'USD', 0),
(8, 'FR', 'France', '', '€', 'EUR', 0),
(9, 'PK', 'Pakistan', '', 'Rs.', 'PKR', 1),
(10, 'KSA', 'Saudi Arabia', '', '????', 'SAR', 0),
(11, 'PL', 'Poland', '', 'PLN', 'PLN', 0),
(12, 'DE', 'Germany', '', 'EUR', 'EUR', 0),
(13, 'USD', 'USA', '', '$', 'USD', 0),
(14, 'EU', 'Europe', '', '€', 'EUR', 0),
(15, ' IT', 'Italy', 'tests', '€', 'EUR', 0),
(16, ' DZ', 'Algeria', '', '?.?', 'DZD', 0),
(17, ' AO', 'Angola', '', 'Kz', 'AOA', 0),
(18, ' AF', 'Afghanistan', '', '?', 'AFN', 0),
(19, ' KI', 'Kiribati', '', '$', 'AUD', 0),
(20, ' KH', 'Cambodia', '', '?', 'KHR', 0),
(21, ' CU', 'Cuba', '', '$', 'CUC', 0),
(22, ' AL', 'Albania', '', 'L', 'ALL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_coupon`
--

CREATE TABLE `nm_coupon` (
  `id` int(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=>flat, 2=>percentage',
  `value` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` int(100) NOT NULL DEFAULT '1',
  `type_of_coupon` varchar(100) NOT NULL COMMENT 'product coupon->1, user coupon->2',
  `terms` longtext NOT NULL,
  `coupon_per_product` varchar(155) NOT NULL,
  `coupon_per_user` varchar(155) NOT NULL,
  `tot_cart_val` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_coupon`
--

INSERT INTO `nm_coupon` (`id`, `coupon_code`, `coupon_name`, `product_id`, `quantity`, `user_id`, `type`, `value`, `start_date`, `end_date`, `status`, `type_of_coupon`, `terms`, `coupon_per_product`, `coupon_per_user`, `tot_cart_val`, `created_at`) VALUES
(33, 's6ntK5KzFr', 'yu', '40', 1, '0', 1, '5', '2018-02-09 16:24:00', '2018-02-22 00:30:00', 1, '1', 'Conditions', '1', '1', '0', '2018-01-05 16:01:29'),
(34, 'GxrExyJu7L', 'Gd', '35', 1, '0', 1, '6', '2018-01-31 16:28:00', '2018-02-09 00:30:00', 1, '1', 'gfh', '5', '1', '0', '2018-01-05 16:01:07'),
(35, 'HxryvGLotz', 'dfg', '0', 0, '194', 1, '345', '2018-01-05 19:11:00', '2018-01-05 19:11:00', 1, '2', 'sdfsd', '0', '0', '32', '2018-01-05 19:01:15'),
(36, 'yrGv8nnpnv', 'eqwe', '0', 0, '203', 2, '23', '2018-01-05 19:12:00', '2018-01-05 19:12:00', 1, '3', 'werwe', '0', '0', '12', '2018-01-05 19:01:07'),
(37, 'stCI8DGp0M', 'dfg', '40', 1, '0', 1, '23', '2018-01-05 19:19:00', '2018-01-05 19:19:00', 1, '1', 'asddas', '5', '1', '0', '2018-01-05 19:01:22'),
(38, 'upwws5DtzL', 'coupon1', '8933', 2, '0', 2, '12', '2018-02-20 10:32:00', '2018-02-20 14:00:00', 1, '1', 'accept', '2', '1', '0', '2018-02-20 10:02:32'),
(40, 'LyDGsECzKv', 'coupon1', '189', 3, '0', 1, '30', '2018-02-20 11:37:00', '2018-03-29 11:50:00', 1, '1', 'sadsfd', '5', '4', '0', '2018-02-20 11:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `nm_coupon_purchage`
--

CREATE TABLE `nm_coupon_purchage` (
  `id` int(100) NOT NULL,
  `coupon_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `sold_user` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `pro_qty` varchar(255) NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `type_of_coupon` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nm_currency`
--

CREATE TABLE `nm_currency` (
  `cur_id` int(10) UNSIGNED NOT NULL,
  `cur_name` varchar(100) NOT NULL,
  `cur_code` varchar(5) NOT NULL,
  `cur_symbol` varchar(10) NOT NULL,
  `cur_status` tinyint(11) NOT NULL DEFAULT '1',
  `cur_default` tinyint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nm_customer`
--

CREATE TABLE `nm_customer` (
  `cus_id` bigint(10) UNSIGNED NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `facebook_id` varchar(150) NOT NULL,
  `google_id` varchar(150) NOT NULL,
  `cus_email` varchar(150) NOT NULL,
  `cus_pwd` varchar(40) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `cus_address1` varchar(150) NOT NULL,
  `cus_address2` varchar(150) NOT NULL,
  `cus_country` varchar(50) NOT NULL,
  `cus_city` varchar(50) NOT NULL,
  `cus_joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cus_logintype` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=>Admin user, 2=> Website User, 3=> Facebook User',
  `cus_status` int(11) NOT NULL COMMENT '0 unblock 1 block',
  `cus_pic` varchar(150) NOT NULL,
  `created_date` date NOT NULL,
  `wallet` bigint(100) NOT NULL,
  `ship_name` varchar(50) NOT NULL,
  `ship_address1` varchar(100) NOT NULL,
  `ship_address2` varchar(100) NOT NULL,
  `ship_ci_id` int(11) NOT NULL,
  `ship_state` varchar(100) NOT NULL,
  `ship_country` int(11) NOT NULL,
  `ship_postalcode` varchar(30) NOT NULL,
  `ship_phone` varchar(25) NOT NULL,
  `ship_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_customer`
--

INSERT INTO `nm_customer` (`cus_id`, `cus_name`, `facebook_id`, `google_id`, `cus_email`, `cus_pwd`, `cus_phone`, `cus_address1`, `cus_address2`, `cus_country`, `cus_city`, `cus_joindate`, `cus_logintype`, `cus_status`, `cus_pic`, `created_date`, `wallet`, `ship_name`, `ship_address1`, `ship_address2`, `ship_ci_id`, `ship_state`, `ship_country`, `ship_postalcode`, `ship_phone`, `ship_email`) VALUES
(186, 'malar', '', '', 'malarvizhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '8012122975', '12', 'test addr2', '1', '1', '2017-07-05 06:05:20', 1, 0, 'girlwjdk72pV.jpg', '0000-00-00', 3116, 'Malar Gopal', 'coimbatore', 'ram nagar', 1, 'Tamil NAdu', 1, '12234578', '801212975', 'malarvizhi@pofitec.com'),
(194, 'Vinod', '', '', 'vinodbab1@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9876543210', '', '', '1', '4', '2017-10-30 05:04:33', 2, 0, 'service-testUFJxZzXN.csv', '2017-10-30', 4, 'vinod', '', '', 3, '', 1, '', '9876543210', 'vinodbabu@pofitec.com'),
(197, 'venugopal', '', '', 'venugopal1@pofitec.com', '25d55ad283aa400af464c76d713c07ad', '1234567678', 'jhkjh', 'jhk', '9', '9', '2017-10-31 03:58:01', 2, 0, 'Banner_1507871000_Sample_BannerTAI5TIcr.jpg', '2017-10-31', 233, 'venugopal', 'jhkjhkk', 'jhkj', 1, 'jkk', 1, '645678877', '3456765434', 'venugopal@pofitec.com'),
(201, 'suganya', '', '', 'suganya.t@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '7373857689', 'cbe', 'cbe', '1', '17', '2017-11-02 10:12:31', 2, 0, 'ikAwMovFwC.jpg', '2017-11-02', 40530, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 13, 'tn', 15, '123456', '8012122975', 'suganya.t@pofitec.com'),
(202, 'john cena', '', '', 'ajo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9632587410', 'hj', 'nm n', '1', '1', '2017-12-22 04:51:48', 1, 2, '', '2017-12-22', 0, 'john cena', 'hj', 'nm n', 1, '', 1, '', '9632587410', 'ajo@gmail.com'),
(203, 'amal', '', '', 'amal@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '7531598624', 'hj', 'nm n', '1', '1', '2017-12-22 04:58:40', 1, 0, '', '2017-12-22', 76, 'amal', 'hj', 'nm n', 1, '', 1, '', '7531598624', 'amal@pofitec.com'),
(204, 'venugopal', '', '', 'venugopalu1@pofitec.com', 'd9ddf676cf7c75d1b1e231e1ce04ca0d', '3456765434', '', '', '1', '1', '2017-12-22 05:04:46', 2, 0, '', '2017-12-22', 0, 'venugopal', '', '', 1, '', 1, '', '3456765434', 'venugopal1@pofitec.com'),
(205, 'venugopal', '', '', 'micheal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3456765434', '', '', '1', '2', '2017-12-22 05:05:36', 2, 0, '', '2017-12-22', 0, 'venugopal', '', '', 2, '', 1, '', '3456765434', 'micheal@gmail.com'),
(206, 'ragul', '', '', 'ragulgandhi1@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', 'coimbatore', 'coimbatore', '1', '1', '2017-12-26 05:36:43', 2, 0, '', '2017-12-26', 10, 'ragul', '', '', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(208, 'vinods', '12345678912345672311', '', 'kathidrvsdsedlw52311@pofitec.com', '', '', '', '', '', '', '2017-12-27 10:54:10', 3, 0, '', '0000-00-00', 0, '', '', '', 0, '', 0, '', '', ''),
(209, 'dgf', '', '', 'user1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '12345678', 'dsf', 'sdfsd', '1', '1', '2017-12-28 11:05:17', 2, 0, '', '0000-00-00', 0, '', '', '', 0, '', 0, '', '', ''),
(210, 'rtertertertertertertertertertertertertertertertertertertertertertreterterte', '', '', 'safsdf@gm.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567890', '', '', '1', '1', '2018-01-03 10:11:45', 2, 2, '', '2018-01-03', 0, 'rtertertertertertertertertertertertertertertertert', '', '', 1, '', 1, '', '1234567890', 'safsdf@gm.com'),
(211, 'venuchr', '', '', 'venugopal111@pofitec.com', 'e807f1fcf82d132f9bb018ca6738a19f', '1234567890', '', '', '1', '1', '2018-01-03 10:23:09', 2, 0, '', '2018-01-03', 0, 'venuchr', '', '', 1, '', 1, '', '1234567890', 'venugopal111@pofitec.com'),
(212, 'bala', '', '', 'bala@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9874569856', '', '', '1', '1', '2018-01-05 09:14:30', 2, 0, '', '2018-01-05', 20, 'bala', '', '', 1, '', 1, '', '9874569856', 'bala@gmail.com'),
(213, 'vishnu.v.r', '', '', 'vishnu@pofitec.com', '1963fd70e789022f6f5b11498f992404', '8891619125', '', '', '1', '1', '2018-01-05 13:54:35', 2, 0, '', '2018-01-05', 0, 'vishnu.v.r', '', '', 1, '', 1, '', '8891619125', 'vishnu@pofitec.com'),
(214, 'vinod babu ', '', '', 'vinodbabu@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '4244114321312', 'fasdasd', 'asdsa', '1', '14', '2018-01-06 05:07:43', 1, 0, '', '2018-01-06', 154, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 14, 'Test state21', 1, '123456', '4244114321312543543545435', 'vinodbabu1@pofitec.com'),
(215, 'dfgldf lgjdfg#@$%#@$#@%^$#$%^&#^$^243q24 4  gf hlfslfsd ds fas435 sdfnsdfsf', '', '', 'vinodbabu12@pofitec.com', 'a3f0bec59cebeb60553ec80bbfd5dfdf', '9876543210', '', '', '1', '14', '2018-01-06 05:36:34', 2, 2, '', '2018-01-06', 0, 'dfgldf lgjdfg#@$%#@$#@%^$#$%^&#^$^243q24 4  gf hlf', '', '', 14, '', 1, '', '9876543210', 'vinodbabu12@pofitec.com'),
(216, 'dfgldf lgjdfg#@$%#@$#@%^$#$%^&#^$^243q24 4 gf hlfslfsd ds fas435 sdfnsdfsf', '', '', 'vinodbabu123@pofitec.com', 'a3f0bec59cebeb60553ec80bbfd5dfdf', '9876543210', '', '', '1', '15', '2018-01-06 05:46:38', 2, 2, '', '2018-01-06', 0, 'dfgldf lgjdfg#@$%#@$#@%^$#$%^&#^$^243q24 4 gf hlfs', '', '', 15, '', 1, '', '9876543210', 'vinodbabu123@pofitec.com'),
(217, 'Test', '', '', 'vinodbabu123@pofitec.com', '3e1563cd3ee9444a6fea61b754440b5e', '9876543210', '', '', '1', '14', '2018-01-06 05:49:32', 2, 0, '', '2018-01-06', 0, 'Test', '', '', 14, '', 1, '', '9876543210', 'vinodbabu123@pofitec.com'),
(218, 'vxc', '', '', 'venugaopal1@pofitec.com', '25d55ad283aa400af464c76d713c07ad', '3456765434', 'jhkjhkk', 'jhkj', '1', '1', '2018-01-06 07:48:46', 1, 2, '', '2018-01-06', 0, 'vxc', 'jhkjhkk', 'jhkj', 1, '', 1, '', '3456765434', 'venugaopal@pofitec.com'),
(219, 'ghj_ jkj  ', '', '', 'ghjgl@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '3456765434', 'jhkjhkk', 'jhkj', '1', '14', '2018-01-06 08:00:58', 1, 0, '', '2018-01-06', 0, 'ghj', 'jhkjhkk', 'jhkj', 14, '', 1, '', '3456765434', 'ghjgvenu22552g000opal@pofitec.com'),
(220, 'venugopal', '', '', 'venugopal@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '3456765434', 'Address1', 'Address2', '1', '1', '2018-01-06 11:28:25', 2, 0, '', '2018-01-06', 998, 'venugopal', 'Address1', 'Address2', 14, 'CSA state', 1, '12134', '3456765434', 'venugopal@pofitec.com'),
(221, 'venugopal', '', '', 'venugopa2l@pofitec.com', 'd9ddf676cf7c75d1b1e231e1ce04ca0d', '3456765434', '', '', '1', '1', '2018-01-06 11:31:20', 2, 2, '', '2018-01-06', 0, 'venugopal', '', '', 1, '', 1, '', '3456765434', 'venugopal@pofitec.com'),
(222, 'venugopal', '', '', 'venugopal@pofditec.com', 'e10adc3949ba59abbe56e057f20f883e', '3456765434', '', '', '1', '1', '2018-01-06 11:34:25', 2, 2, '', '2018-01-06', 0, 'venugopal', '', '', 1, '', 1, '', '3456765434', 'venugopal@pofitec.com'),
(223, 'sdf', '', '', 'kathirvel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '4512345678', '', '', '1', '14', '2018-01-06 13:09:36', 2, 0, '', '2018-01-06', 0, 'sdf', '', '', 14, '', 1, '', '4512345678', 'kathirvel@gmail.com'),
(224, 'venugopal12345678', '', '', 'venugopal11@pofitec.com', 'd9ddf676cf7c75d1b1e231e1ce04ca0d', '3456765434', 'jhkjhkk', 'jhkj', '1', '14', '2018-01-09 11:01:48', 1, 0, '', '2018-01-09', 0, 'venugopal12345678', 'jhkjhkk', 'jhkj', 14, '', 1, '', '3456765434', 'venugopal11@pofitec.com'),
(225, 'sadasdasdasd_', '', '', 'venugopaljjj@pofitec.com', '6a4eecd12f3c9b5a1629238ac9a6edce', '1234555567567756', 'jhkjhkk', 'jhkj', '1', '1', '2018-01-09 11:04:43', 1, 0, '', '2018-01-09', 0, 'sadasdasdasd_', 'jhkjhkk', 'jhkj', 1, '', 1, '', '1234555567567756', 'venugopaljjj@pofitec.com'),
(226, 'suganya', '', '', 'suganya1.t@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '8', '7', '2018-01-10 11:06:51', 2, 0, '', '0000-00-00', 0, '', '', '', 0, '', 0, '', '', ''),
(227, 'suganya', '', '', 'suganya2.t@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '', '12', '32', '1', '1', '2018-01-10 11:08:37', 2, 0, '', '0000-00-00', 0, '', '', '', 0, '', 0, '', '', ''),
(228, 'vinod babu', '12345678912345672312', '', 'testk420@gmail.com', '', '', '', '', '', '', '2018-01-10 11:25:17', 3, 0, '', '0000-00-00', 0, '', '', '', 0, '', 0, '', '', ''),
(229, 'balu', '', '', 'balamurugan@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '7418529635', 'testsdf', 'test', '1', '1', '2018-01-10 13:05:04', 2, 0, '', '2018-01-10', 1551, 'bala', 'Hope', 'Peelamedu', 16, 'tn', 1, '641004', '7418529635  ', 'balamurugan@pofitec.com'),
(230, 'dfdg', '', '', 'fhgf@fgfd.com', 'd964173dc44da83eeafa3aebbee9a1a0', '1231654541', '', '', '11', '0', '2018-01-11 04:49:57', 2, 0, '', '2018-01-11', 0, 'dfdg', '', '', 0, '', 11, '', '1231654541', 'fhgf@fgfd.com'),
(231, 'sdgfdgsg', '', '', 'users@gmail123.com', 'd964173dc44da83eeafa3aebbee9a1a0', '7894561234', 'gh', 'g', '1', '17', '2018-01-11 04:51:47', 2, 2, '', '2018-01-11', 0, 'sdgfdgsg', '', '', 0, '', 17, '', '7894561234', 'asd@gmail.com'),
(232, 'users', '', '', 'users@gmail123.com', 'e10adc3949ba59abbe56e057f20f883e', '7418529635', 'cbe', 'cbe', '7', '22', '2018-01-11 04:56:11', 2, 2, '', '2018-01-11', 90, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', 1, 'ertrd', 1, '123456', '7418529635', 'suganya.t@pofitec.com'),
(233, 'venugopal', '', '', 'sathyaseelan@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567890123456', 'fh', 'jhkj', '1', '1', '2018-01-11 05:54:51', 2, 0, '', '2018-01-11', 0, 'murugan', '', '', 1, '', 1, '', '9876541221', 'balamurugan.cse12@gmail.com'),
(234, 'dasfdasf', '', '', 'sathyaseelan@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', '', '', '1', '1', '2018-01-13 05:19:27', 2, 2, '', '2018-01-13', 0, 'dasfdasf', '', '', 1, '', 1, '', '9944349002', 'sathyaseelan@pofitec.com'),
(235, 'suganya', '', '', 'suganya@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', '', '', '1', '1', '2018-01-13 05:23:55', 2, 2, '', '2018-01-13', 0, 'suganya', '', '', 1, '', 1, '', '9944349002', 'suganya@pofitec.com'),
(236, 'ragul', '', '', 'ragulaero@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', 'coimbatore', 'coimbatore', '1', '1', '2018-01-13 06:02:19', 2, 2, '', '2018-01-13', 0, 'ragul', '', '', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(237, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', '', '', '1', '1', '2018-01-13 06:04:43', 2, 2, '', '2018-01-13', 0, 'ragul', '', '', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(238, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', '', '', '1', '1', '2018-01-13 06:46:10', 2, 2, '', '2018-01-13', 0, 'ragul', '', '', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(239, 'ytry', '', '', 'venugopal@pofditec.com', '02a2a253ade3a3aa2cfa24f5553397dc', '54645656', 'try', 'try', '1', '17', '2018-01-13 06:56:04', 1, 0, '', '2018-01-13', 0, 'ytry', 'try', 'try', 17, '', 1, '', '54645656', 'venugopal@pofditec.com'),
(240, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', '', '', '1', '1', '2018-01-13 07:55:36', 2, 2, '', '2018-01-13', 0, 'ragul', '', '', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(241, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', '', '', '1', '1', '2018-01-13 08:02:57', 2, 2, '', '2018-01-13', 0, 'ragul', '', '', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(242, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', '', '', '1', '1', '2018-01-13 08:05:39', 2, 2, '', '2018-01-13', 0, 'ragul', '', '', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(243, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', '', '', '1', '1', '2018-01-13 08:08:12', 2, 2, '', '2018-01-13', 0, 'ragul', '', '', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(244, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', '', '', '1', '1', '2018-01-13 09:49:10', 2, 2, '', '2018-01-13', 0, 'ragul', '', '', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(245, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', 'coimbatore', 'asasa', '1', '1', '2018-01-13 11:53:49', 1, 2, '', '2018-01-13', 0, 'ragul', 'coimbatore', 'asasa', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(246, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', 'coimbatore', 'coimbatore', '1', '1', '2018-01-13 12:00:10', 1, 2, '', '2018-01-13', 0, 'ragul', 'coimbatore', 'coimbatore', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(247, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', 'coimbatore', 'coimbatore', '1', '1', '2018-01-13 12:01:12', 1, 2, '', '2018-01-13', 0, 'ragul', 'coimbatore', 'coimbatore', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(248, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', 'coimbatore', 'coimbatore', '1', '1', '2018-01-13 12:03:51', 1, 2, '', '2018-01-13', 0, 'ragul', 'coimbatore', 'coimbatore', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(249, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', 'coimbatore', 'coimbatore', '1', '1', '2018-01-13 12:06:54', 1, 2, '', '2018-01-13', 40, 'ragul', 'coimbatore', 'coimbatore', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(250, 'ragul', '', '', 'ragulgandhi@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9944349002', '', '', '1', '1', '2018-01-16 04:32:41', 2, 0, '', '2018-01-16', 50, 'ragul', '', '', 1, '', 1, '', '9944349002', 'ragulgandhi@pofitec.com'),
(251, 'suganya', '', '', 'suganySa2.t@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '5464356', 'hope', 'Peelamedu', '1', '1', '2018-01-18 11:52:16', 2, 0, '', '0000-00-00', 0, '', '', '', 0, '', 0, '', '', ''),
(253, 'userr', '', '', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '7894561235', 'cbe', 'cbe', '7', '22', '2018-02-06 10:13:05', 2, 0, 'No_image_product6H76rlLa.png', '2018-02-06', 0, 'user', 'safdfdfdsgfdgfghgjghkjhkjhk', 'fdfdsgfg', 1, 'df', 1, '543543', '1234567895', 'user@gmail.com'),
(254, 'saranya', '', '', 'saranya.t@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '7894561235', 'test', 'test', '1', '1', '2018-02-06 12:28:50', 2, 0, '', '2018-02-06', 0, 'saranya', '', '', 1, '', 1, '', '7894561235', 'saranya@gmail.com'),
(263, 'sdfasdf', '', '', 'sdafasf@gmail.com', '84935fe3eba50ea4e3d70b7f7964b9c0', '345456456', 'sdfsa', 'asdfsa', '1', '1', '2018-02-06 14:07:28', 1, 0, '', '2018-02-06', 0, 'sdfasdf', 'sdfsa', 'asdfsa', 1, '', 1, '', '345456456', 'sdafasf@gmail.com'),
(264, 'user5', '', '', 'user5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '876', 'dthghg', 'gfhfg', '1', '1', '2018-02-07 04:36:04', 2, 0, '', '2018-02-07', 0, 'user5', '', '', 1, '', 1, '', '7418529635', 'user5@gmail.com'),
(265, 'sdfasdfd', '', '', 'xcvxcvzvz@gmail.com', 'a956585c9377484e37c4fc14bfbcb2af', '4456756785', '', '', '1', '1', '2018-02-07 07:52:52', 2, 2, '', '2018-02-07', 0, 'sdfasdfd', '', '', 1, '', 1, '', '4456756785', 'xcvxcvzvz@gmail.com'),
(266, 'sdfasfdas', '', '', 'sdfsdfdsf@dgfdfgdfg.com', '3a744f8ffd20821f63e33033456b96cd', '9876543210', '', '', '7', '22', '2018-02-09 11:47:58', 2, 2, '', '2018-02-09', 0, 'sdfasfdas', '', '', 22, '', 7, '', '9876543210', 'sdfsdfdsf@dgfdfgdfg.com'),
(267, 'dsfa', '', '', 'asdfas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '98658655566', 'dssdfadsff', 'sdfsdfas', '1', '3', '2018-02-14 11:50:07', 1, 2, '', '2018-02-14', 0, 'dsfa', 'dssdfadsff', 'sdfsdfas', 3, '', 1, '', '98658655566', 'asdfas@gmail.com'),
(268, 'sdfasdf', '', '', 'malarvizdhi@pofitec.com', '352becfab9a13d08bb2b7f654b0f8bf4', '8012122975', 'test', 'test2', '1', '1', '2018-02-14 11:53:23', 1, 2, '', '2018-02-14', 0, 'sdfasdf', 'test', 'test2', 1, '', 1, '', '8012122975', 'malarvizdhi@pofitec.com'),
(269, 'dsfsdf', '', '', 'amal@pofitec.comd', '0871ffa64cad5be62f1dd9b56b6bc45e', '3456765434', 'jhkjhkk', 'jhkj', '1', '23', '2018-02-14 11:55:25', 1, 2, '', '2018-02-14', 0, 'dsfsdf', 'jhkjhkk', 'jhkj', 23, '', 1, '', '3456765434', 'amal@pofitec.comd'),
(270, 'dffd', '', '', 'balamurun@pofitec.com', '909c79133e09b065ec440fc01d2c2192', '9898745123', 'ram nagar', 'covai', '1', '1', '2018-02-14 11:57:33', 1, 2, '', '2018-02-14', 0, 'rsasadsad', 'ram nagar', 'covai', 1, '', 1, '', '9898745123', 'balamurugadn@pofitec.com'),
(271, 'suganya', '', '', 'suganya@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567890', '', '', '1', '1', '2018-03-28 05:00:57', 2, 2, '', '2018-03-28', 385, 'suganya', '', '', 1, '', 1, '', '1234567890', 'suganya@pofitec.com'),
(274, 'Nazeer', '', '', 'nazeer@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '9445847696', 'Door no: 21D, Arputham Towers', 'ram nagar, Gandhipuram', '1', '1', '2018-04-03 06:45:28', 2, 0, '', '2018-04-03', 0, 'Nazeer', 'Door no: 21D, Arputham Towers', 'ram nagar, Gandhipuram', 1, '', 1, '', '9445847696', 'nazeer@pofitec.com'),
(275, 'Nagoor meeran', '', '107311908005841784404', 'nagoor@pofitec.com', 'e10adc3949ba59abbe56e057f20f883e', '1591591599', '', '', '1', '1', '2018-04-04 09:49:44', 4, 0, '', '2018-04-04', 202, 'Nagoor meeran', '', '', 1, '', 1, '', '1591591599', 'nagoor@pofitec.com'),
(285, 'Fgf', '', '114634821662074458101', 'venugopal@pofitec.com', 'Fgf', '', '', '', '', '', '2018-04-05 11:48:09', 1, 0, '', '0000-00-00', 0, '', '', '', 0, '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nm_deals`
--

CREATE TABLE `nm_deals` (
  `deal_id` int(11) NOT NULL,
  `deal_title` varchar(500) NOT NULL,
  `deal_title_fr` varchar(250) NOT NULL,
  `deal_category` int(11) NOT NULL,
  `deal_main_category` int(11) NOT NULL,
  `deal_sub_category` int(11) NOT NULL,
  `deal_second_sub_category` int(11) NOT NULL,
  `deal_original_price` int(11) NOT NULL,
  `deal_discount_price` int(11) NOT NULL,
  `deal_discount_percentage` int(11) NOT NULL,
  `deal_saving_price` int(11) NOT NULL,
  `deal_inctax` varchar(10) NOT NULL DEFAULT '0',
  `deal_shippamt` varchar(10) NOT NULL,
  `deal_start_date` datetime NOT NULL,
  `deal_end_date` datetime NOT NULL,
  `deal_expiry_date` date NOT NULL,
  `deal_description` text NOT NULL,
  `deal_description_fr` text NOT NULL,
  `deal_merchant_id` int(11) NOT NULL,
  `deal_shop_id` int(11) NOT NULL,
  `deal_meta_keyword` varchar(250) NOT NULL,
  `deal_meta_keyword_fr` varchar(250) NOT NULL,
  `deal_meta_description` varchar(500) NOT NULL,
  `deal_meta_description_fr` varchar(500) NOT NULL,
  `deal_min_limit` int(11) NOT NULL,
  `deal_max_limit` int(11) NOT NULL,
  `deal_purchase_limit` int(11) NOT NULL,
  `deal_image_count` int(11) NOT NULL,
  `deal_image` varchar(500) NOT NULL,
  `deal_no_of_purchase` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `deal_status` int(11) NOT NULL DEFAULT '1' COMMENT '1-active, 0-block',
  `deal_posted_date` datetime NOT NULL,
  `deal_delivery` int(11) NOT NULL,
  `allow_cancel` enum('0','1') NOT NULL COMMENT '0-No,1-Yes',
  `allow_return` enum('0','1') NOT NULL COMMENT '0-No,1-Yes',
  `allow_replace` enum('0','1') NOT NULL COMMENT '0-No,1-Yes',
  `cancel_policy` text NOT NULL,
  `cancel_policy_fr` text NOT NULL,
  `return_policy` text NOT NULL,
  `return_policy_fr` text NOT NULL,
  `replace_policy` text NOT NULL,
  `replace_policy_fr` text NOT NULL,
  `cancel_days` int(11) NOT NULL,
  `return_days` int(11) NOT NULL,
  `replace_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_deals`
--

INSERT INTO `nm_deals` (`deal_id`, `deal_title`, `deal_title_fr`, `deal_category`, `deal_main_category`, `deal_sub_category`, `deal_second_sub_category`, `deal_original_price`, `deal_discount_price`, `deal_discount_percentage`, `deal_saving_price`, `deal_inctax`, `deal_shippamt`, `deal_start_date`, `deal_end_date`, `deal_expiry_date`, `deal_description`, `deal_description_fr`, `deal_merchant_id`, `deal_shop_id`, `deal_meta_keyword`, `deal_meta_keyword_fr`, `deal_meta_description`, `deal_meta_description_fr`, `deal_min_limit`, `deal_max_limit`, `deal_purchase_limit`, `deal_image_count`, `deal_image`, `deal_no_of_purchase`, `created_date`, `deal_status`, `deal_posted_date`, `deal_delivery`, `allow_cancel`, `allow_return`, `allow_replace`, `cancel_policy`, `cancel_policy_fr`, `return_policy`, `return_policy_fr`, `replace_policy`, `replace_policy_fr`, `cancel_days`, `return_days`, `replace_days`) VALUES
(1, 'Trendz Style', '', 3, 4, 5, 0, 1500, 1200, 20, 300, '5', '5', '2018-03-01 11:39:00', '2018-03-01 18:39:00', '2017-12-31', 'test', '', 41, 57, 'test', '', 'test', '', 0, 150, 0, 0, 'Deal_1513422713.Deal_1510126348.cool saree 800 x 800.jpg/**/Deal_1516259133.jpg/**/', 17, '12/16/2017', 1, '2018-01-18 12:35:33', 0, '1', '1', '1', 'yes', '', 'yes', '', 'yes', '', 2, 2, 2),
(2, 'Deal Title d', '', 2, 2, 0, 0, 10, 5, 50, 5, '', '0', '2017-12-08 16:22:00', '2017-12-29 16:22:00', '2017-12-29', 'description', '', 58, 59, 'asd', '', 'asd', '', 0, 10, 0, 0, 'Deal_1513594358.png/**/', 0, '12/18/2017', 1, '2017-12-18 16:22:38', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(3, 'deal img check', '', 2, 2, 3, 0, 10, 5, 50, 5, '', '0', '2017-12-07 16:36:00', '2017-12-29 16:36:00', '2017-12-29', 'ds', '', 58, 59, 'dsf', '', 'sdf', '', 0, 23, 0, 0, 'Deal_1513595220.png/**/Deal_151637040329422.jpg/**/Deal_15163704039103.jpg/**/Deal_151637040326140.jpg/**/Deal_151637040312837.jpg/**/', 1, '12/18/2017', 1, '2018-01-19 19:30:03', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(4, 'Innovador', '', 7, 17, 26, 0, 300, 200, 33, 100, '', '0', '2017-12-19 14:41:00', '2017-12-29 14:41:00', '2017-12-29', 'test', '', 41, 61, 'test', '', 'test', '', 0, 2, 0, 0, 'Deal_1513674579.jpg/**/', 0, '12/19/2017', 1, '2017-12-19 14:41:52', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(5, 'grt', '', 2, 2, 3, 8, 1000, 100, 90, 900, '', '0', '2017-12-21 17:37:00', '2017-12-30 17:37:00', '2017-12-30', 'hehe', '', 41, 57, 'heeh', '', 'hehe', '', 0, 100, 0, 1, 'Deal_1513858084.png/**/', 2, '12/21/2017', 1, '2017-12-21 17:38:04', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(6, 'gool deals', '', 2, 2, 4, 1, 1000, 100, 90, 900, '', '0', '2017-12-21 17:38:00', '2017-12-25 17:38:00', '2017-12-25', 'hehe', '', 60, 63, 'gaag', '', 'eee', '', 0, 100, 0, 5, 'Deal_1513858158.png/**/Deal_1513858158.png/**/Deal_1513858158.png/**/Deal_1513858158.png/**/Deal_1513858158.png/**/', 0, '12/21/2017', 1, '2017-12-21 17:39:19', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(7, 'gud', '', 3, 4, 5, 0, 1000, 100, 90, 900, '', '0', '2017-12-21 17:39:00', '2017-12-22 17:39:00', '2017-12-22', 'fafa', '', 58, 59, 'xaxa', '', 'ads', '', 0, 100, 0, 5, 'Deal_1513858247.png/**/Deal_1513858247.png/**/Deal_1513858247.png/**/Deal_1513858247.png/**/Deal_1513858248.png/**/', 0, '12/21/2017', 1, '2017-12-21 17:40:48', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(8, 'grt', '', 2, 2, 3, 8, 1000, 100, 90, 900, '', '0', '2017-12-21 18:26:00', '2017-12-22 18:26:00', '2017-12-22', 'gaga', '', 58, 59, 'fefef', '', 'efefe', '', 0, 5, 0, 3, 'Deal_1513861081.png/**/Deal_1513861081.png/**/Deal_1513861081.png/**/', 0, '12/21/2017', 1, '2017-12-21 18:28:01', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(9, 'gud', '', 2, 2, 3, 8, 1000, 100, 90, 900, '', '0', '2017-12-21 18:30:00', '2017-12-30 18:30:00', '2017-12-30', 'gege', '', 41, 57, 'tet', '', 'ete', '', 0, 15, 0, 0, 'Deal_1513861286.png/**/Deal_1516193017.jpg/**/', 11, '12/21/2017', 1, '2018-01-17 18:51:02', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(10, 'gudxz', '', 2, 10, 0, 8, 1000, 100, 90, 900, '', '0', '2017-12-21 18:44:00', '2017-12-22 18:44:00', '2017-12-22', 'tete', '', 41, 57, 'ljll', '', 'oio', '', 0, 5, 0, 2, 'Deal_1513862119.png/**/Deal_1513862120.png/**/', 0, '12/21/2017', 1, '2017-12-21 18:45:20', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(11, 'super store', '', 4, 6, 8, 0, 1000, 100, 90, 900, '', '0', '2017-12-21 18:45:00', '2017-12-22 18:45:00', '2017-12-22', 'pskpaks', '', 62, 65, 'sada', '', 'sdasd', '', 0, 5, 0, 5, 'Deal_1513862182.png/**/Deal_1513862182.png/**/Deal_1513862182.png/**/Deal_1513862183.png/**/Deal_1513862183.png/**/', 0, '12/21/2017', 1, '2017-12-21 18:46:23', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(12, 'super store', '', 2, 2, 3, 9, 1000, 100, 90, 900, '', '0', '2017-12-21 18:46:00', '2017-12-21 18:46:00', '2017-12-21', 'yyiu', '', 65, 71, 'jhhkj', '', 'jhk', '', 0, 5, 0, 3, 'Deal_1513862250.png/**/Deal_1513862250.png/**/Deal_1513862250.png/**/', 0, '12/21/2017', 1, '2017-12-21 18:47:30', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(13, 'Express deal', '', 3, 4, 5, 0, 1000, 800, 20, 200, '', '0', '2017-12-27 12:29:00', '2017-12-27 17:00:00', '2017-12-27', 'saree', '', 58, 59, 'saree', '', 'saree', '', 0, 5, 0, 1, 'Deal_1514358120.jpg/**/', 1, '12/27/2017', 1, '2017-12-27 12:32:00', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(14, 'knife sets', '', 5, 15, 0, 0, 9000, 8500, 6, 500, '5', '40', '2017-12-27 17:04:00', '2017-12-27 20:00:00', '2017-12-27', 'asdsa', '', 58, 59, 'wee', '', 'wqewq', '', 0, 5, 0, 1, 'Deal_1514374542.jpg/**/', 0, '12/27/2017', 1, '2017-12-27 17:05:42', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(15, 'silk saree', '', 3, 4, 5, 0, 9000, 8500, 6, 500, '5', '40', '2017-12-27 17:10:00', '2017-12-27 21:00:00', '2017-12-27', 'nice', '', 41, 57, 'sd', '', 'dfdg', '', 0, 5, 0, 1, 'Deal_1514374885.jpg/**/', 0, '12/27/2017', 1, '2017-12-27 17:11:25', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(16, 'cotton saree', '', 4, 12, 20, 0, 9000, 8500, 5, 500, '5', '40', '2018-01-17 21:58:00', '2018-01-19 13:18:00', '2018-01-19', 'dffgf', '', 60, 63, 'fgffg', '', 'fgf', '', 0, 56, 0, 0, '/**/', 5, '12/27/2017', 1, '2018-01-17 18:31:21', 11, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(17, 'dealls', '', 2, 2, 3, 8, 850, 500, 41, 350, '', '0', '2017-12-28 15:14:00', '2017-12-28 15:17:00', '2017-12-28', 'dfd', '', 41, 57, 'gfdg', '', 'ggg', '', 0, 2, 0, 1, 'Deal_1514454329.jpg/**/', 0, '12/28/2017', 1, '2017-12-28 15:15:30', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(18, 'western', '', 3, 7, 10, 4, 500, 320, 36, 180, '', '0', '2017-12-28 15:18:00', '2017-12-28 20:01:00', '2017-12-28', 'uytu', '', 41, 57, 'tyyu', '', 'yury', '', 0, 5, 0, 1, 'Deal_1514454636.jpg/**/', 0, '12/28/2017', 1, '2017-12-28 15:20:36', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(19, 'deal11', '', 3, 4, 5, 0, 500, 250, 50, 250, '5', '0', '2018-01-04 12:40:00', '2018-01-04 12:45:00', '2018-01-04', 'gjghjh', '', 41, 57, 'hgjh', '', 'hgkjk', '', 0, 5, 0, 0, 'Deal_1515049272.jpg/**/', 2, '01/04/2018', 1, '2018-02-07 16:52:45', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(20, 'deal2', '', 3, 4, 5, 0, 500, 250, 50, 250, '5', '0', '2018-01-10 12:56:00', '2018-01-10 13:05:00', '2018-01-10', 'gfhfh', '', 58, 59, 'ghgh', '', 'gfhgh', '', 0, 2, 0, 0, 'Deal_1515050843.jpg/**/Deal_1516199263.jpg/**/Deal_1516200015.jpg/**/', 0, '01/04/2018', 1, '2018-01-17 20:10:15', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(21, 'Test Deal Title Test Deal Title Test Deal Title Test Deal Title Test Deal Title Test Deal Title Test Deal Title Test Deal Title Test Deal Title Test Deal Title Test Deal Title Test Deal Title Test Dea', '', 2, 2, 3, 9, 1000000000, 100000000, 90, 900000000, '99', '0', '2018-01-04 18:28:00', '2018-01-18 18:28:00', '2018-01-18', 'Test', '', 62, 65, 'TEtres', '', 'tests', '', 0, 10, 0, 0, 'Deal_1515070546.jpg/**/', 5, '01/04/2018', 1, '2018-01-04 18:37:02', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(22, 'now deal', '', 3, 4, 5, 0, 20101010, 12101001, 39, 8000009, '20', '0', '2018-01-11 13:19:00', '2018-01-17 22:18:00', '2018-01-17', 'gfh', '', 58, 59, 'fgfg', '', 'ghgfhgjh', '', 0, 1, 0, 0, 'Deal_1516259098.jpg/**/Deal_1516367837.jpg/**/Deal_1516367837.jpg/**/Deal_1516367837.jpg/**/Deal_1516367837.jpg/**/', 0, '01/05/2018', 1, '2018-01-19 18:47:17', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(23, 'Baby Planet', '', 4, 12, 20, 0, 2000, 1800, 10, 200, '0', '50', '2018-01-10 13:17:00', '2018-01-20 18:17:00', '2018-01-20', 'Children\'s clothing or kids\' clothing is clothing for children who have not yet grown to full height. Grandma bait is a retail industry term for expensive children\'s clothing', '', 68, 75, 'American sizes for baby clothes are usually based on the child\'s weight.', '', 'European sizes are usually based on the child\'s height. These may be expressed as an estimated age of the child, e.g., size 6 months (or 3–6 months) is expected to fit a child 61 to 67 centimetres (24 to 26 in) in height and 5.7 to 7.5 kilograms (13 to 17 lb) in weight.', '', 0, 17, 0, 0, 'Deal_1515138943.jpg/**/Deal_1516367752461.jpg/**/', 3, '01/05/2018', 1, '2018-01-19 18:45:52', 2, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(24, 'Sony', '', 6, 16, 24, 0, 43399, 40229, 7, 3170, '0', '0', '1970-01-01 05:30:00', '1970-01-01 05:30:00', '1970-01-01', 'Sony VAIO Fit 15 SVF15318 laptop runs on Windows 8 (64 bit) OS and has Intel Core i5 (4th generation) 1.6 GHz with Intel Turbo boost up to 2.6Ghz processor. It has Intel HD Graphics 4000 / Nvidia GeForce GT 740M 1GB DDR3 graphics processor.', '', 68, 75, 'BASIC INFORMATION', '', 'model name\r\nVAIO Fit 15 SVF15318\r\nlaunch date (global)\r\n2013-11-04\r\noperating system (with version)\r\nWindows 8 (64 bit)\r\nlaptop type\r\nMainstream\r\nDISPLAY\r\ndisplay size (in inches)\r\n15.5\r\ndisplay technology\r\nTFT LED Backlit colour display\r\nResolution\r\n1366 x 768 \r\nCONNECTIVITY\r\nwireless connectivity\r\nWiFi Bluetooth 4.0 +HS\r\nconnectivity\r\n2 x USB 2.0 2 x USB 3.0 HDMI\r\nfeatures\r\nBuilt in HD Webcam (.92 MP) memory card reader Backlit keyboard\r\npointing device\r\nTouchpad (Gesture supported)\r\nMEMORY\r\nr', '', 0, 5, 0, 0, '', 2, '01/05/2018', 1, '2018-02-07 13:45:52', 3, '1', '1', '1', 'You can cancel the product within 24 hours from the date and time you ordered it.', '', 'Generally, merchandise purchased in store or on Walmart.com can be returned or exchanged within 4 of purchase with or without a <b>receipt</b>. Below are<b>exceptions</b> to the general 4 rule. All of the <b>exceptions</b> listed below require the merchandise be returned with a <b>receipt</b>.', '', '<b>Replacement policy</b> is an insurance <b>policy</b> between an insurance company and a consumer which promises to pay the insured the <b>replacement</b> value of the subject of the <b>policy</b> if a loss occurs.', '', 1, 4, 2),
(25, 'Coffee Makers', '', 5, 15, 0, 0, 600, 300, 50, 300, '2', '0', '1970-01-01 05:30:00', '1970-01-17 05:30:00', '1970-01-17', 'Make aromatic, freshly brewed coffee every morning using the Russell Hobbs RCM60 Coffee Maker. It prepares six cups of coffee. Equipped with a permanent filter, this coffee maker is convenient to use. Lightweight and portable, this 650-watt coffee maker is perfect for bachelor pads, dormitories, and homes. Its sleek and stylish design will surely add charm to your kitchen decor.\r\n0.6 liters Capacity,On/off Switch,Inox Boiler Material,650 Watt Power Consumption', '', 68, 75, 'Auto Shut off', '', 'Power Consumption 650 W\r\nPerformance Features 15 bars Pump Pressure', '', 0, 8, 0, 0, 'Deal_1515145271.jpg/**/', 1, '01/05/2018', 1, '2018-01-16 15:25:03', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(26, 'Multicusine Sofa', '', 5, 14, 23, 0, 25000, 22000, 12, 3000, '', '500', '2018-01-05 14:57:00', '2018-01-27 14:57:00', '2018-01-27', 'Wooden furniture has always been in great demand and therefore we offer the best quality wooden furniture to our clients', '', 68, 75, 'Modern Furniture', '', 'Different type of wooden furniture is offered by us like sofa, table, wardrobe case, bed and others. We procure our furniture from best wooden furniture manufacturers who innovatively design the each furniture with optimum quality wood', '', 0, 10, 0, 1, 'Deal_1515145111.jpg/**/', 5, '01/05/2018', 1, '2018-01-05 15:08:31', 0, '1', '1', '0', 'ancellation prior to delivery - You can cancel your order for any product (except made-to-order products and gift items) at any time prior to its delivery by logging in to your account .\r\n\r\nFor cancellations made before a delivery attempt, any advance paid will be refunded as per our refund policy. A delivery attempt is defined as a visit to the customer’s home for delivery purposes.', '', 'If you happen to receive a damaged or defective product, or a product that does not comply with the specifications as per your original order, please get in touch with our customer service team at phone number or by writing in to mail address', '', '', '', 2, 6, 0),
(27, 'Fastrack', '', 3, 47, 0, 0, 750, 620, 17, 130, '2', '0', '2018-01-05 15:12:00', '2018-01-27 15:12:00', '2018-01-27', 'Key Features\r\n\r\nSquare Dial\r\n\r\nBlack Strap\r\n\r\nStainless Steel Back Case\r\n\r\nWater Resistant', '', 68, 75, 'Body and Design', '', 'The solid lines and cuts of the square dial of the watch are complemented by the leather strap that adds a touch of class and texture to it. The dial has a large grey number and no other detailing which looks minimalist and elegant.', '', 0, 15, 0, 1, 'Deal_1515145857.jpg/**/', 14, '01/05/2018', 1, '2018-01-05 15:20:57', 0, '0', '1', '0', '', '', 'Shop online whenever you want to - yes, that 24x7 experience is so convenient now, isn\'t it?! And you get genuine products delivered to your doorstep from your favourite brands with free shipping. ', '', '', '', 0, 4, 0),
(28, 'today deal', '', 3, 4, 5, 0, 25000, 10000, 60, 15000, '5', '250', '2018-01-10 11:52:00', '2018-01-10 14:23:00', '2018-01-10', 'fcgbj', '', 62, 65, 'hgvh', '', 'fhgbj', '', 0, 16, 0, 0, 'Deal_1515563707.jpg/**/Deal_1516195431.jpg/**/', 15, '01/10/2018', 1, '2018-01-17 18:53:51', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(29, 'deal offer', '', 3, 4, 5, 0, 500, 250, 50, 250, '2', '20', '2018-01-11 11:28:00', '2018-01-19 11:28:00', '2018-01-19', 'sggtyt', '', 60, 63, 'fdgfh', '', 'fhgfh', '', 0, 10, 0, 0, 'Deal_1515563961.jpg/**/Deal_1516184766.jpg/**/', 1, '01/10/2018', 1, '2018-01-17 18:19:56', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(30, 'new1 deal', '', 2, 2, 3, 8, 5200, 2500, 51, 2700, '', '0', '2018-01-10 16:03:00', '2018-01-10 19:01:00', '2018-01-10', 'fdhdghj', '', 58, 59, 'dghg', '', 'jhgjhg', '', 0, 9, 0, 0, 'Deal_1515580353.jpg/**/Deal_1516183107.jpg/**/Deal_1516200054.jpg/**/Deal_1516274508.jpg/**/Deal_1516274508.jpg/**/', 5, '01/10/2018', 1, '2018-01-18 16:51:48', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(31, 'off deal', '', 2, 10, 15, 0, 520, 250, 51, 270, '2', '23', '2018-01-10 16:40:00', '2018-01-10 20:38:00', '2018-01-10', 'sdgfdhgh', '', 58, 59, 'fdg', '', 'fhh', '', 0, 10, 0, 0, 'Deal_1515582590.jpg/**/Deal_1516191781.jpg/**/Deal_1516191781.jpg/**/Deal_1516274962.jpg/**/Deal_1516276143.jpg/**/', 5, '01/10/2018', 1, '2018-01-18 17:19:03', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(32, 'now deals', '', 2, 10, 15, 0, 5200, 1230, 76, 3970, '23', '0', '1970-01-01 05:30:00', '1970-01-01 05:30:00', '1970-01-01', 'dtrj', '', 58, 59, 'tytru', '', 'tytyuy', '', 0, 5, 0, 0, '', 0, '01/10/2018', 1, '2018-01-17 19:56:45', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(33, 'hjkhjkh', '', 2, 2, 3, 0, 56, 45, 19, 11, '10', '0', '2018-03-01 11:15:00', '2018-03-02 11:15:00', '2018-01-24', 'gfhgf', '', 41, 57, 'fgh', '', 'fgh', '', 0, 45, 0, 1, 'Deal_1516082600.jpg/**/', 3, '01/16/2018', 1, '2018-01-16 11:33:20', 5, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(34, 'sdfsd', '', 2, 2, 0, 0, 24, 23, 4, 1, '44', '0', '2018-01-16 12:00:00', '2018-01-30 12:00:00', '2018-01-30', 'nhghjghj', '', 41, 57, '', '', '', '', 0, 5, 0, 0, 'Deal_1516084288.jpg/**/Deal_151781890531740.jpg/**/Deal_151781890517029.jpg/**/', 2, '01/16/2018', 1, '2018-02-05 15:31:20', 5, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(35, 'Bata', '', 2, 10, 15, 0, 1200, 999, 16, 201, '5', '0', '2018-01-16 12:45:00', '2018-01-25 12:45:00', '2018-01-25', 'The image must be of, or pertain to, the product being sold.\r\nThe image must be in focus, professionally lit and photographed or scanned, with realistic color, and smooth edges.', '', 68, 75, 'test', '', 'test', '', 0, 50, 0, 1, 'Deal_1516087889.jpg/**/', 2, '01/16/2018', 1, '2018-01-16 13:01:29', 4, '1', '1', '1', ' We require 4 days cancellation notice prior to your scheduled arrival, otherwise we will charge you cancellation fee as below. 10% of your total amount will be charged if you do not notify us about your cancellation or any changes by 2 to 5 days before your scheduled arrival.', '', 'Generally, merchandise purchased in store or on Walmart.com can be returned or exchanged within ninety 2 days of purchase with or without a receipt. Below are exceptions to the general ninety (2) day rule. All of the exceptions listed below require the merchandise be returned with a receipt.', '', 'Replacement policy is an insurance policy between an insurance company and a consumer which promises to pay the insured the replacement value of the subject of the policy if a loss occurs.', '', 4, 2, 7),
(36, 'Stroller', '', 4, 6, 13, 14, 7500, 6000, 20, 1500, '3', '0', '2018-01-17 16:39:00', '2018-01-19 16:39:00', '2018-01-19', 'test', '', 68, 75, 'test', '', 'test', '', 0, 10, 0, 0, 'Deal_1516188103.jpg/**/Deal_15163681425308.jpg/**/Deal_151636814219525.jpg/**/Deal_151636814212186.jpg/**/Deal_151636814224779.jpg/**/', 0, '01/17/2018', 1, '2018-01-19 18:52:22', 3, '1', '0', '0', 'test', '', '', '', '', '', 3, 0, 0),
(37, 'deals today', '', 4, 6, 13, 14, 500, 250, 50, 250, '', '0', '2018-01-17 17:18:00', '2018-01-18 17:18:00', '2018-01-18', 'sfegfdg', '', 58, 59, 'dfghb', '', 'tyyuytu', '', 0, 20, 0, 0, 'Deal_1516189793.jpg/**/Deal_15163689048810.jpg/**/Deal_15163689049051.jpg/**/Deal_151636890530712.jpg/**/Deal_151636890521713.jpg/**/', 3, '01/17/2018', 1, '2018-01-19 19:05:04', 0, '1', '1', '1', 'sdg', '', 'fgfhg', '', 'wetreghfhgfh', '', 23, 23, 23),
(38, 'dealslls', '', 2, 10, 15, 0, 43324, 12344, 71, 30980, '23', '123', '1970-01-01 05:30:00', '1970-01-01 05:30:00', '1970-01-01', 'sew', '', 58, 59, 'ewrewr', '', 'dfgg', '', 0, 123, 0, 0, 'Deal_1516269356.jpg/**/Deal_1516269356.jpg/**/Deal_1516269356.jpg/**/', 0, '01/18/2018', 1, '2018-01-18 15:25:56', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(39, 'shirts', '', 2, 10, 15, 0, 400, 390, 2, 10, '', '0', '2018-01-18 15:30:00', '2018-01-20 15:30:00', '2018-01-20', 'test', '', 58, 59, '', '', '', '', 0, 10, 0, 2, 'Deal_1516269680.jpg/**/Deal_1516269680.jpg/**/', 0, '01/18/2018', 1, '2018-01-18 15:31:21', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(40, 'daelsid', '', 2, 10, 15, 0, 345, 123, 64, 222, '32', '120', '2018-01-18 15:50:00', '2018-02-06 18:48:00', '2018-02-06', 'sdefg', '', 41, 67, 'fdg ', '', 'fdgfdh', '', 0, 25, 0, 0, 'Deal_1516270827.jpg/**/Deal_1516270827.jpg/**/Deal_1516270828.jpg/**/Deal_15197155391385.jpg/**/', 2, '01/18/2018', 1, '2018-02-27 12:42:19', 34, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(41, 'heel', '', 3, 4, 6, 29, 500, 200, 60, 300, '', '0', '2018-01-19 18:30:00', '2018-01-20 18:30:00', '2018-01-20', 'test', '', 58, 59, '', '', '', '', 0, 7, 0, 2, 'Deal_1516366870.jpg/**/Deal_1516366871.jpg/**/', 0, '01/19/2018', 1, '2018-01-19 18:31:11', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(42, 'deal off', '', 2, 11, 17, 0, 3435, 2343, 31, 1092, '', '0', '1970-01-01 05:30:00', '1970-01-01 05:30:00', '1970-01-01', 'fgfdh', '', 41, 57, 'rgh', '', 'fgfh', '', 0, 34, 0, 0, 'Deal_151636804612425.jpg/**/Deal_15163680466286.jpg/**/Deal_151636804626799.jpg/**/', 0, '01/19/2018', 1, '2018-01-19 18:50:46', 434, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(43, 'deal offers', '', 2, 10, 15, 0, 45456, 1234, 97, 44222, '', '0', '2018-01-20 18:52:00', '2018-01-21 18:52:00', '2018-01-21', 'dsfdg', '', 58, 59, 'dff', '', 'sdff', '', 0, 34, 0, 5, 'Deal_1516368241.jpg/**/Deal_1516368241.jpg/**/Deal_1516368241.jpg/**/Deal_1516368241.jpg/**/Deal_1516368241.jpg/**/', 0, '01/19/2018', 1, '2018-01-19 18:54:01', 23, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(44, 'deal offff', '', 2, 10, 15, 0, 45612, 12453, 72, 33159, '', '0', '2018-01-20 18:50:00', '2018-01-21 18:50:00', '2018-01-21', 'gfh', '', 58, 59, 'gfhj', '', 'fghj', '', 0, 34, 0, 4, 'Deal_1516368396.jpg/**/Deal_1516368396.jpg/**/Deal_1516368396.jpg/**/Deal_1516368396.jpg/**/', 0, '01/19/2018', 1, '2018-01-19 18:56:36', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(45, 'dealssa', '', 3, 4, 5, 0, 4512, 3215, 28, 1297, '', '0', '2018-01-20 18:59:00', '2018-01-21 18:59:00', '2018-01-21', 'dfgfdghg', '', 41, 57, 'rdgfdg', '', 'fhfgh', '', 0, 23, 0, 3, 'Deal_151636866516552.jpg/**/Deal_151636866526561.jpg/**/Deal_151636866511110.jpg/**/', 0, '01/19/2018', 1, '2018-01-19 19:01:05', 20, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(46, 'wooden Table', '', 5, 14, 23, 0, 8000, 5000, 37, 3000, '', '0', '2018-01-20 19:02:00', '2018-01-21 19:02:00', '2018-01-21', 'test', '', 68, 75, '', '', '', '', 0, 5, 0, 0, 'Deal_15163689734348.jpg/**/Deal_151636912017589.jpg/**/', 0, '01/19/2018', 1, '2018-02-06 12:35:24', 3, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(47, 'deaaalsss', '', 3, 7, 10, 4, 232, 123, 46, 109, '', '0', '2018-01-20 19:05:00', '2018-01-21 19:05:00', '2018-01-21', 'fgfh', '', 58, 59, 'dfgfg', '', 'sdfgfd', '', 0, 56, 0, 5, 'Deal_1516369019.jpg/**/Deal_1516369019.jpg/**/Deal_1516369019.jpg/**/Deal_1516369019.jpg/**/Deal_1516369019.jpg/**/', 0, '01/19/2018', 1, '2018-01-19 19:06:59', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(48, 'dealing process', '', 5, 14, 23, 0, 800, 600, 25, 200, '', '0', '2018-01-19 19:08:00', '2018-01-20 19:08:00', '2018-01-20', 'test', '', 68, 75, '', '', '', '', 0, 8, 0, 2, 'Deal_151636922531542.jpg/**/Deal_15163692256711.jpg/**/', 0, '01/19/2018', 1, '2018-01-19 19:10:25', 3, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(49, 'deall', '', 3, 7, 10, 0, 1234, 936, 24, 298, '', '0', '2018-01-20 19:11:00', '2018-01-21 19:11:00', '2018-01-21', 'safffsdag', '', 58, 59, 'sfds', '', 'dsfgd', '', 0, 26, 0, 5, 'Deal_151636935619281.jpg/**/Deal_151636935628598.jpg/**/Deal_151636935613495.jpg/**/Deal_151636935625636.jpg/**/Deal_151636935619341.jpg/**/', 0, '01/19/2018', 1, '2018-01-19 19:12:36', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(50, 'process', '', 2, 10, 15, 0, 200, 150, 25, 50, '', '0', '2018-01-19 19:23:00', '2018-01-20 19:23:00', '2018-01-20', 'test', '', 58, 59, '', '', '', '', 0, 4, 0, 3, 'Deal_15163700505962.jpg/**/Deal_15163700509915.jpg/**/Deal_151637005010200.jpg/**/', 0, '01/19/2018', 1, '2018-01-19 19:24:10', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(51, 'ipad', '', 6, 48, 76, 0, 10000, 50, 99, 9950, '2', '0', '2018-01-26 16:16:00', '2018-03-30 16:16:00', '2018-03-30', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 60, 63, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content her', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various ', '', 0, 20, 0, 0, 'Deal_151696373326300.jpg/**/', 20, '01/26/2018', 1, '2018-02-28 18:20:43', 2, '1', '1', '1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 2, 5, 2),
(52, 'ball', '', 7, 17, 26, 0, 1000, 500, 50, 500, '2', '0', '2018-01-26 16:20:00', '2018-03-15 16:20:00', '2018-03-15', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 60, 63, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content her', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various ', '', 0, 25, 0, 0, 'Deal_151696392113893.png/**/', 25, '01/26/2018', 0, '2018-03-02 16:19:01', 2, '1', '1', '1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 23, 23, 23),
(53, 'dealsinprocess', '', 2, 10, 15, 0, 300, 300, 0, 0, '', '0', '1970-01-01 05:30:00', '1970-01-01 05:30:00', '1970-01-01', 'test', '', 41, 57, '', '', '', '', 0, 10, 0, 0, 'Deal_15179013219510.jpg/**/', 0, '02/03/2018', 1, '2018-02-06 12:45:21', 2, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(54, 'Spray', '', 18, 62, 85, 0, 5000, 4000, 20, 1000, '2', '50', '2018-02-05 15:35:00', '2018-02-07 17:35:00', '2018-02-07', 'test', '', 77, 91, ' ', '', '', '', 0, 7, 0, 0, 'Deal_151782543127509.jpg/**/', 4, '02/05/2018', 1, '2018-02-27 12:40:53', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(55, 'Flower Pot', '', 18, 63, 0, 0, 1000, 850, 15, 150, '10', '30', '2018-02-06 12:27:00', '2018-02-07 12:27:00', '2018-02-07', 'trest', '', 58, 59, '', '', '', '', 0, 10, 0, 1, 'Deal_15179005334660.jpg/**/', 0, '02/06/2018', 1, '2018-02-06 12:32:13', 3, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(56, 'Spray\'s', '', 18, 62, 85, 0, 1500, 1300, 13, 200, '', '30', '2018-02-06 16:33:00', '2018-02-08 16:33:00', '2018-02-08', 'test', '', 90, 105, '', '', '', '', 0, 10, 0, 0, 'Deal_151791541112228.jpg/**/Deal_151791541116045.jpg/**/', 10, '02/06/2018', 0, '2018-02-07 15:19:11', 0, '1', '0', '0', 'test', '', '', '', '', '', 3, 0, 0),
(57, 'deal_product', '', 3, 4, 5, 66, 3543, 1313, 62, 2230, '23', '32', '2018-02-23 13:35:00', '2018-02-08 13:37:00', '2018-02-08', 'htjtjyu', '', 41, 57, 'rtyt   ', '', 'thtjf', '', 0, 344, 0, 0, 'Deal_15179908115062.jpg/**/Deal_151799081220148.jpg/**/Deal_15179908122781.jpg/**/', 0, '02/07/2018', 1, '2018-02-08 18:04:55', 454, '1', '1', '1', 'rwetre', '', 'juihuhiook', '', 'refd', '', 543, 453, 435),
(58, 'dealsss', '', 2, 2, 4, 1, 798, 500, 37, 298, '23', '354336', '2018-02-09 15:01:00', '2018-02-09 19:01:00', '2018-02-09', 'fsdrgt', '', 41, 57, 'gfh', '', 'fghfgjd', '', 0, 65464, 0, 0, 'Deal_1518083454826.jpg/**/Deal_15190326874033.jpg/**/Deal_151903268713158.jpg/**/', 0, '02/08/2018', 1, '2018-02-19 15:01:27', 54, '1', '1', '1', 'retgd', '', 'ghhth', '', 'fgghfghd', '', 435, 435, 543),
(59, 'fun ', '', 2, 10, 15, 0, 455, 454, 0, 1, '', '0', '2018-02-17 10:37:00', '2018-05-24 10:37:00', '2018-05-24', 'sdfgdfsg', '', 41, 57, 'dfgdf', '', 'dfgdfg', '', 0, 56, 0, 2, 'Deal_151884423414759.jpg/**/Deal_15188442347764.jpg/**/', 7, '02/17/2018', 1, '2018-02-17 10:40:34', 0, '1', '1', '1', 'dfgdfg', '', 'fdsgfds', '', 'sdgfdsfg', '', 4, 4, 4),
(60, 'Duchdbuujbbubcb', '', 3, 7, 10, 4, 878, 676, 23, 202, '6', '0', '2018-02-19 13:13:00', '2018-05-10 13:13:00', '2018-05-10', 'Ychgcugvftuyvyfc ihb', '', 41, 57, 'Vhgbvcdfx has hit hdfg', '', 'Futfygsc sh sh highs Drs ', '', 0, 401, 0, 5, 'Deal_151902645412217.jpeg/**/Deal_151902645424574.jpeg/**/Deal_151902645429535.jpeg/**/Deal_151902645416812.jpeg/**/Deal_15190264543701.jpeg/**/', 11, '02/19/2018', 1, '2018-02-19 13:17:34', 0, '1', '1', '1', 'Ghzgsvzycs Krishan', '', 'Gauges hsyjsshsvsv', '', 'Cabs syshshshssgs ', '', 4, 7, 5),
(61, 'test', '', 2, 10, 15, 0, 500, 40, 92, 460, '', '30', '2018-02-27 12:37:00', '2018-03-30 12:37:00', '2018-03-30', 'test', '', 58, 59, ' ', '', '', '', 0, 10, 0, 0, 'Deal_151971532012186.jpg/**/Deal_151971532024779.jpg/**/', 9, '02/27/2018', 1, '2018-03-01 15:59:02', 5, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(62, 'test', '', 2, 11, 17, 0, 10, 4, 60, 6, '', '0', '2018-03-01 15:34:00', '2018-03-02 15:34:00', '2018-03-02', 'test', '', 90, 111, '', '', '', '', 0, 30, 0, 1, 'Deal_151989876011372.jpg/**/', 9, '03/01/2018', 1, '2018-03-01 15:36:00', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(63, 'shoe', '', 3, 4, 6, 29, 100, 60, 40, 40, '', '0', '2018-03-01 17:38:00', '2018-03-02 17:38:00', '2018-03-02', 'test', '', 90, 105, '', '', '', '', 0, 15, 0, 1, 'Deal_15199061571851.jpg/**/', 0, '03/01/2018', 1, '2018-03-01 17:39:17', 0, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(64, 'dealadmin', '', 2, 11, 17, 0, 2132, 1223, 42, 909, '23', '23', '2018-03-02 15:30:00', '2018-03-02 21:30:00', '2018-03-02', 'dsreg', '', 0, 0, 'sdfds', '', 'dfssfgds', '', 0, 32, 32, 1, 'Deal_151998492714608.jpg/**/', 0, '03/02/2018', 1, '2018-03-02 15:32:07', 23, '1', '1', '1', 'rewrw', '', 'etre', '', 'ewrr', '', 23, 234, 43),
(65, 'dealadmin2', '', 3, 4, 6, 3, 3545, 2343, 33, 1202, '45', '435', '2018-03-02 15:37:00', '2018-03-02 19:36:00', '2018-03-02', 'rtyrth', '', 0, 0, 'ert', '', 'gf', '', 0, 43, 0, 1, 'Deal_151998523922895.jpg/**/', 0, '03/02/2018', 1, '2018-03-02 15:37:19', 345, '1', '1', '1', 'fgfdh', '', 'rett', '', 'grhdrh', '', 54, 434, 543),
(66, 'dealadmin1', '', 3, 7, 10, 4, 233, 122, 47, 111, '21', '21', '2018-03-05 12:41:00', '2018-03-05 15:39:00', '2018-03-05', 'gffhd', '', 0, 0, 'fg ', '', 'gfdg', '', 0, 45, 0, 0, 'Deal_15202338114224.jpg/**/Deal_152023385827688.jpg/**/Deal_152023385827969.jpg/**/Deal_1520233858742.jpg/**/Deal_152023385939.jpg/**/', 0, '03/05/2018', 0, '2018-03-05 12:40:58', 44, '1', '1', '1', 'tret', '', 'trtetryt', '', 'gffh', '', 45, 4, 45),
(67, 'dealmer', '', 3, 4, 5, 66, 1000, 800, 20, 200, '2', '20', '2018-03-07 14:41:00', '2018-03-07 17:39:00', '2018-03-07', 'Nice to look', '', 0, 0, 'saree', '', 'saree', '', 0, 12, 0, 1, 'Deal_152041393823539.jpg/**/', 14, '03/07/2018', 1, '2018-03-07 14:42:19', 7, '1', '1', '1', 'asds', '', 'ds', '', 'sadw', '', 2, 2, 3),
(68, 'dealmer1', '', 3, 4, 5, 66, 2343, 1213, 48, 1130, '32', '233', '2018-03-07 15:43:00', '2018-03-07 16:43:00', '2018-03-07', 'sfsdfds', '', 0, 0, 'sdf   ', '', 'sfds', '', 0, 434, 0, 0, 'Deal_1520414202.jpg/**/Deal_152041420213821.jpg/**/', 0, '03/07/2018', 2, '2018-03-07 14:47:02', 32, '0', '0', '0', '', '', '', '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_emailsetting`
--

CREATE TABLE `nm_emailsetting` (
  `es_id` tinyint(3) UNSIGNED NOT NULL,
  `es_contactname` varchar(150) NOT NULL,
  `es_contactemail` varchar(150) NOT NULL,
  `es_skype_email_id` varchar(500) NOT NULL,
  `es_webmasteremail` varchar(150) NOT NULL,
  `es_noreplyemail` varchar(150) NOT NULL,
  `es_phone1` varchar(20) NOT NULL,
  `es_phone2` varchar(20) NOT NULL,
  `es_email` varchar(150) NOT NULL,
  `es_address1` varchar(150) NOT NULL,
  `es_address2` varchar(150) NOT NULL,
  `show_address` varchar(10) NOT NULL,
  `es_latitude` decimal(18,14) NOT NULL,
  `es_longitude` decimal(18,14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_emailsetting`
--

INSERT INTO `nm_emailsetting` (`es_id`, `es_contactname`, `es_contactemail`, `es_skype_email_id`, `es_webmasteremail`, `es_noreplyemail`, `es_phone1`, `es_phone2`, `es_email`, `es_address1`, `es_address2`, `show_address`, `es_latitude`, `es_longitude`) VALUES
(1, 'LE Single Vendor ', 'sales@LESingleVendor.com', 'sales@LESingleVendor.com', 'venugopal@pofitec.com', 'sales@LESingleVendor.com', '+919790153111', '+1 (972) 591 8222', 'suganya.t@pofitec.com', 'Ram nagar', 'Coimbatore,Tamil nadu', 'show', '8.49014215738284', '80.54146284179683');

-- --------------------------------------------------------

--
-- Table structure for table `nm_enquiry`
--

CREATE TABLE `nm_enquiry` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(50) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `enq_readstatus` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_enquiry`
--

INSERT INTO `nm_enquiry` (`id`, `name`, `email`, `phone`, `message`, `status`, `created_date`, `enq_readstatus`) VALUES
(1, 'charles', 'charlesvictor.j@pofitec.com', '9498056637', 'Test Demo', 1, '0000-00-00', 1),
(2, 'fgfdgdf', 'dfhdfhd@gmail.com', '1234567890', 'dfsgsfgfgfdh', 1, '0000-00-00', 1),
(5, 'yuyuy', 'pofidevelopmentyuyuy@gmail.com', '8883152529', 'teerdt', 1, '0000-00-00', 1),
(7, 'ilakkiya m', 'il@gm.com', '8883152529', 'rttrtr', 1, '0000-00-00', 1),
(8, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hifh', 1, '0000-00-00', 1),
(9, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hi99', 1, '0000-00-00', 1),
(10, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hi100', 1, '0000-00-00', 1),
(11, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hi11', 1, '0000-00-00', 1),
(12, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hi12', 1, '0000-00-00', 1),
(13, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'hi13', 1, '0000-00-00', 1),
(14, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'twest', 1, '0000-00-00', 1),
(15, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'test', 1, '0000-00-00', 1),
(16, 'maheshwaran', 'maheswaran@pofitec.com', '1234567890', 'test', 1, '0000-00-00', 1),
(17, 'Amit', 'amit.srivastava@tradebooster.com', '9350352736', 'Hi,\r\n\r\nWe would link to purchase comment with star rating plugin.\r\n\r\nPlease confirm cost.', 1, '0000-00-00', 1),
(18, 'raj', 'kumar@pofitec.com', '12131232', 'test', 1, '0000-00-00', 1),
(19, 'Teresa', 'rlbojfanxv@meldram.com', 'http://v-doc.co/nm/txxrz', 'I was just looking at your eCommerce Software; Shopping Cart Software | Laravel E Commerce website and see that your website has the potential to become very popular. I just want to tell you, In case you don\'t already know... There is a website service which already has more than 16 million users, and most of the users are interested in websites like yours. By getting your site on this service you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can find out more about it here: http://hothor.se/1gj55 - Now, let me ask you... Do you need your website to be successful to maintain your business? Do you need targeted traffic who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your site? If your answer is YES, you can achieve these things only if you get your website on the service I am describing. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything at all. All the popular websites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That\'s how running a successful website works... Here\'s to your success! Find out more here: http://www.v-diagram.com/2sv1p', 1, '0000-00-00', 1),
(20, 'kailash', 'kumarkailash075@gmail.com', '1234567890', 'fgdfgdfg', 1, '0000-00-00', 1),
(21, 'kailash', 'kumarkailash075@gmail.com', '1234567890', 'fgdfgdfgfdgfdgfd', 1, '0000-00-00', 1),
(22, 'kailash', 'kumarkailash075@gmail.com', '1234567890', 'ghjghjghjghj', 1, '0000-00-00', 1),
(23, 'kailash', 'kumarkailash075@gmail.com', '1234567890', 'ghjghjghjghj', 1, '0000-00-00', 1),
(24, 'kailash', 'kumarkailash075@gmail.com', '1234567890', 'ghjghjghjghj', 1, '0000-00-00', 1),
(25, 'fsf', 'dsfsdfds@gmail.com', '1232132313', '', 1, '0000-00-00', 1),
(26, 'Jennifer', 'uhjrpuumzu@rtooqjxgnx.com', 'http://hothor.se/2rsx5', 'Did you just create your new Facebook page? Do you want your page to look a little more \"established\"? I found a service that can help you with that. They can send organic and 100% real likes and followers to your social pages and you can try before you buy with their free trial. Their service is completely safe and they send all likes to your page naturally and over time so nobody will suspect that you bought them. Try their service for free here: http://korturl.no/1pwo8', 1, '0000-00-00', 1),
(27, 'Daniel', 'wibdaniel@outlook.com', '32352325', 'I want to receive the contact email.', 1, '0000-00-00', 1),
(28, 'Sandra', 'smggdhro@tpycgnzb.com', 'http://shorturl.van.ee/8', 'Did you just create your new Facebook page? Do you want your page to look a little more \"established\"? I found a service that can help you with that. They can send organic and 100% real likes and followers to your social pages and you can try before you buy with their free trial. Their service is completely safe and they send all likes to your page naturally and over time so nobody will suspect that you bought them. Try their service for free here: http://corta.co/9UC', 1, '0000-00-00', 1),
(29, 'palanikumar11584@gmail.com', 'palanikumar11584@gmail.com', '9677812831', 'palanikumar test query', 1, '0000-00-00', 1),
(30, 'Deanna Brady', 'meoinwrfacy@yaedzw.com', 'http://www.prestonkincaid.com/link/1c', 'I was just looking at your Laravel Ecommerce website and see that your site has the potential to become very popular. I just want to tell you, In case you don\'t already know... There is a website service which already has more than 16 million users, and the majority of the users are interested in topics like yours. By getting your website on this network you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can read more about it here: http://lis.ovh/is - Now, let me ask you... Do you need your site to be successful to maintain your business? Do you need targeted visitors who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your website? If your answer is YES, you can achieve these things only if you get your site on the service I am talking about. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything. All the popular sites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That\'s how running a successful website works... Here\'s to your success! Find out more here: http://www.prestonkincaid.com/link/1c', 1, '0000-00-00', 1),
(31, 'sara', 'saranya@pofitec.com', '8883857744', 'test', 1, '0000-00-00', 1),
(32, 'sara', 'saranya@pofitec.com', '8884447773', 'testt', 1, '0000-00-00', 1),
(33, 'ds', 'saranya@pofitec.com', '8884447773', 'asdasdasdasd', 1, '0000-00-00', 1),
(34, 'test', 'saranya@pofitec.com', '4535345', '', 1, '0000-00-00', 1),
(35, 'saranya', 'saranya@pofitec.com', '1234567890', 'queries', 1, '0000-00-00', 1),
(36, 'test', 'test@gmail.com', '9978599856', 'test', 1, '0000-00-00', 1),
(37, 'h', 'preetha@pofitec.com', '234567890', 'f', 1, '0000-00-00', 1),
(44, 'malar', 'malarvizhi@pofitec.com', '8012122975', 'alert(&#39;hgfh&#39;);', 1, '0000-00-00', 1),
(45, 'malar', 'malarvizhi@pofitec.com', '8012122975', 'alert(\'hgj\');', 1, '0000-00-00', 1),
(46, 'malar', 'malarvizhi@pofitec.com', '8012122975', '<script>alert(\'hgj\');</script>', 1, '2017-10-25', 1),
(47, 'malar gopal', 'malarvizhi@pofitec.com', '8012122975', 'test', 1, '2017-12-09', 1),
(48, 'test', 'suganya@pofitec.com', '8012122975', 'test', 1, '2017-12-18', 1),
(49, 'suganya', 'suganya@pofitec.com', '8012122975', 'test', 1, '2017-12-18', 1),
(50, 'suganya', 'suganya@pofitec.com', '8012122975', 'test', 1, '2017-12-18', 1),
(51, 'rtrt', 'suganya@pofitec.com', '8012122975', 'rtrtrtrtrtrtr', 1, '2017-12-20', 1),
(52, 'sugi', 'ere@gmail.com', '8012122975', 'I was just looking at your Laravel Ecommerce website and see that your site has the potential to become very popular. I just want to tell you, In case you don&#39;t already know... There is a website service which already has more than 16 million users, and the majority of the users are interested in topics like yours. By getting your website on this network you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can read more about it here: http://lis.ovh/is - Now, let me ask you... Do you need your site to be successful to maintain your business? Do you need targeted visitors who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your website? If your answer is YES, you can achieve these things only if you get your site on the service I am talking about. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything. All the popular sites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That&#39;s how running a successful website works... Here&#39;s to your success! Find out more here: http://www.prestonkincaid.com/link/1cI was just looking at your Laravel Ecommerce website and see that your site has the potential to become very popular. I just want to tell you, In case you don&#39;t already know... There is a website service which already has more than 16 million users, and the majority of the users are interested in topics like yours. By getting your website on this network you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can read more about it here: http://lis.ovh/is - Now, let me ask you... Do you need your site to be successful to maintain your business? Do you need targeted visitors who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your website? If your answer is YES, you can achieve these things only if you get your site on the service I am talking about. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything. All the popular sites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That&#39;s how running a successful website works... Here&#39;s to your success! Find out more here: http://www.prestonkincaid.com/link/1cI was just looking at your Laravel Ecommerce website and see that your site has the potential to become very popular. I just want to tell you, In case you don&#39;t already know... There is a website service which already has more than 16 million users, and the majority of the users are interested in topics like yours. By getting your website on this network you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can read more about it here: http://lis.ovh/is - Now, let me ask you... Do you need your site to be successful to maintain your business? Do you need targeted visitors who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your website? If your answer is YES, you can achieve these things only if you get your site on the service I am talking about. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything. All the popular sites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That&#39;s how running a successful website works... Here&#39;s to your success! Find out more here: http://www.prestonkincaid.com/link/1cI was just looking at your Laravel Ecommerce website and see that your site has the potential to become very popular. I just want to tell you, In case you don&#39;t already know... There is a website service which already has more than 16 million users, and the majority of the users are interested in topics like yours. By getting your website on this network you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can read more about it here: http://lis.ovh/is - Now, let me ask you... Do you need your site to be successful to maintain your business? Do you need targeted visitors who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your website? If your answer is YES, you can achieve these things only if you get your site on the service I am talking about. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything. All the popular sites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That&#39;s how running a successful website works... Here&#39;s to your success! Find out more here: http://www.prestonkincaid.com/link/1cI was just looking at your Laravel Ecommerce website and see that your site has the potential to become very popular. I just want to tell you, In case you don&#39;t already know... There is a website service which already has more than 16 million users, and the majority of the users are interested in topics like yours. By getting your website on this network you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can read more about it here: http://lis.ovh/is - Now, let me ask you... Do you need your site to be successful to maintain your business? Do you need targeted visitors who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your website? If your answer is YES, you can achieve these things only if you get your site on the service I am talking about. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything. All the popular sites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That&#39;s how running a successful website works... Here&#39;s to your success! Find out more here: http://www.prestonkincaid.com/link/1cI was just looking at your Laravel Ecommerce website and see that your site has the potential to become very popular. I just want to tell you, In case you don&#39;t already know... There is a website service which already has more than 16 million users, and the majority of the users are interested in topics like yours. By getting your website on this network you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can read more about it here: http://lis.ovh/is - Now, let me ask you... Do you need your site to be successful to maintain your business? Do you need targeted visitors who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your website? If your answer is YES, you can achieve these things only if you get your site on the service I am talking about. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything. All the popular sites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That&#39;s how running a successful website works... Here&#39;s to your success! Find out more here: http://www.prestonkincaid.com/link/1cI was just looking at your Laravel Ecommerce website and see that your site has the potential to become very popular. I just want to tell you, In case you don&#39;t already know... There is a website service which already has more than 16 million users, and the majority of the users are interested in topics like yours. By getting your website on this network you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can read more about it here: http://lis.ovh/is - Now, let me ask you... Do you need your site to be successful to maintain your business? Do you need targeted visitors who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your website? If your answer is YES, you can achieve these things only if you get your site on the service I am talking about. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything. All the popular sites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That&#39;s how running a successful website works... Here&#39;s to your success! Find out more here: http://www.prestonkincaid.com/link/1cgfgfgfI was just looking at your Laravel Ecommerce website and see that your site has the potential to become very popular. I just want to tell you, In case you don&#39;t already know... There is a website service which already has more than 16 million users, and the majority of the users are interested in topics like yours. By getting your website on this network you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can read more about it here: http://lis.ovh/is - Now, let me ask you... Do you need your site to be successful to maintain your business? Do you need targeted visitors who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your website? If your answer is YES, you can achieve these things only if you get your site on the service I am talking about. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything. All the popular sites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That&#39;s how running a successful website works... Here&#39;s to your success! Find out more here: http://www.prestonkincaid.com/link/1cdfdI was just looking at your Laravel Ecommerce website and see that your site has the potential to become very popular. I just want to tell you, In case you don&#39;t already know... There is a website service which already has more than 16 million users, and the majority of the users are interested in topics like yours. By getting your website on this network you have a chance to get your site more visitors than you can imagine. It is free to sign up and you can read more about it here: http://lis.ovh/is - Now, let me ask you... Do you need your site to be successful to maintain your business? Do you need targeted visitors who are interested in the services and products you offer? Are looking for exposure, to increase sales, and to quickly develop awareness for your website? If your answer is YES, you can achieve these things only if you get your site on the service I am talking about. This traffic network advertises you to thousands, while also giving you a chance to test the network before paying anything. All the popular sites are using this service to boost their readership and ad revenue! Why aren’t you? And what is better than traffic? It’s recurring traffic! That&#39;s how running a successful website works... Here&#39;s to your success! Find out more here: http://www.prestonkincaid.com/link/1csdsd', 1, '2017-12-20', 1),
(53, 'ghg', 'ere@gmail.com', '8012122975', 'ytt', 1, '34-34-34', 1),
(54, 'sdffds fdsf', 'vinodbabu@pofitec.com', '9876543210', 'sdfdsfds', 1, '2018-01-06', 1),
(55, 'sdfdsfdsf dsfa dsf dsfds fds fdsf dsf dsfds ', 'vinodbabu@pofitec.com', '3534354354354354354354353', 'd f gdgs dfg dfg dfgdf gd ', 1, '2018-01-06', 1),
(56, 'dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf ', 'vinodbabu@pofitec.com', '9876543210342243 4343432432432432432432 432434324234234324242424 3242342342423423423', 'dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds ', 1, '2018-01-06', 1),
(57, 'dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf ', 'vinodbabu@pofitec.com', '9876543210', 'alert(&#39;&#39;);', 1, '2018-01-06', 1);
INSERT INTO `nm_enquiry` (`id`, `name`, `email`, `phone`, `message`, `status`, `created_date`, `enq_readstatus`) VALUES
(58, 'dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf ', 'vinodbabu@pofitec.com', '0000099999999999999 9999999999999999999999999999 999999994333333333333 33333333333333333 33332222222222222222222222222222', 'dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsfds dsfa dsgf agdfg g adfkjhskdhfkkdskfhkdsfhdshfds fdsf sdf dsfdsf', 1, '2018-01-06', 1);
INSERT INTO `nm_enquiry` (`id`, `name`, `email`, `phone`, `message`, `status`, `created_date`, `enq_readstatus`) VALUES
(59, 'dgfhg', 'dgf@dfd.df', '343543545', 'efrygh', 1, '2018-01-12', 1),
(60, 'retretr', 'dreg@fdgf.ggfh', '43536546', '', 1, '2018-01-12', 1),
(61, 'gfgfh', 'er@rdg.ghg', '432543556', '/n|', 1, '2018-01-12', 1),
(62, 'gfgfh', 'er@rdg.ghg', '432543556', '/n|', 1, '2018-01-12', 1),
(63, 'gfgfh', 'er@rdg.ghg', '432543556', '/n|', 1, '2018-01-12', 1),
(64, 'dfgdgf', 'gfg@rdg.hfg', '3435436546', 'fgfghg', 1, '2018-01-12', 1),
(65, 'dfgdgf', 'gfg@rdg.hfg', '3435436546', 'fgfghg', 1, '2018-01-12', 1),
(66, 'dfgdgf', 'gfg@rdg.hfg', '3435436546', 'fgfghg', 1, '2018-01-12', 1),
(67, 'rert', 'tret@dgfdg.ghg', '35435456', 'fgfhfgjhfgjh', 1, '2018-01-12', 1),
(68, 'Test', 'test@gmail.com', '9876543210', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', 1, '2018-01-12', 1),
(69, 'suganya', 'suganya.t@pofitec.com', '9856322356', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the', 1, '2018-01-12', 1),
(70, 'ragul', 'ragulgandhi@pofitec.com', '9944349002', 'aasdasdasd', 1, '2018-01-16', 1),
(71, 'suganya', 'suganya.t@pofitec.com', '9856322356', 'ghjhkjhk', 1, '2018-02-03', 1),
(72, 'user', 'user@gmail.com', '3243543656', 'ffgfh3243', 1, '2018-02-06', 1),
(73, 'tests testes', 'malarvizhi@pofitec.com', '8012122975', 'test', 1, '2018-02-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_faq`
--

CREATE TABLE `nm_faq` (
  `faq_id` smallint(5) UNSIGNED NOT NULL,
  `faq_name` varchar(256) NOT NULL,
  `faq_name_fr` varchar(250) NOT NULL,
  `faq_ans` text NOT NULL,
  `faq_ans_fr` text NOT NULL,
  `faq_status` tinyint(4) NOT NULL COMMENT '0=>unblock,1=>block'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_faq`
--

INSERT INTO `nm_faq` (`faq_id`, `faq_name`, `faq_name_fr`, `faq_ans`, `faq_ans_fr`, `faq_status`) VALUES
(2, 'What is a product detail page?', 'Quelle est la page de détail d\'un produit?', 'A product detail page is the place where customers read details about a product for sale on Dip Multivendor. It includes the product image, price, description, customer reviews, ordering options, and the link to view offers from all sellers.', 'Une page de détail du produit est l\'endroit où les clients lisent les détails d\'un produit à vendre sur Dip Multivendor. Il comprend l\'image du produit, le prix, la description, les commentaires des clients, les options de commande et le lien pour voir les offres de tous les vendeurs.', 0),
(3, 'Why do I need to create a product detail page?', 'Pourquoi dois-je créer une page de détail du produit?', 'Dip Multivendor has one of the largest online product catalogs. But we don\'t have everything. If you can\'t find a product detail page on Dip Multivendor for something you\'d like to sell, then you need to create one. Once created, the product detail page will be available onDip Multivendor for you to sell your inventory, and other sellers can also use too.', 'Dip Multivendor possède l\'un des plus grands catalogues de produits en ligne. Mais nous n\'en avons pas tout. Si vous ne trouvez pas une page de détail sur Dip Multivendor pour quelque chose que vous souhaitez vendre, vous devez en créer un. Une fois créé, la page de détail du produit sera disponible surDip Multivendor pour que vous puissiez vendre votre inventaire, et d\'autres vendeurs peuvent également l\'utiliser également.', 0),
(4, 'What will the product detail page I create look like?', '', 'The product detail page you create will look like any other product page on Dip Multivendor. By creating pages that use a standard format, customers can more easily evaluate the products they want to buy..', '', 1),
(5, 'How do I create a product detail page?', '', 'First, you confirm that your product isn\'t already listed on Dip Multivendor. Second, you identify the product category and describe it. Third and last, you set the price and condition for each item. For more information, ', '', 1),
(6, 'What information can I include in my product description?', '', 'You are allowed 2,000 characters to describe your product. For some product categories, you also have five key product features (bullets) of 100 characters each for highlighting significant product attributes. ', '', 1),
(7, 'english questions', 'question anglaises', 'english answers', 'réponse anglaises', 1),
(8, 'dfg', '', 'fgdf', '', 0),
(9, 'sdfsdsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdsdfsdfsdfsdfsdfsdf dfsdfsdfsdfsdfsdfsdfsdfsdsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdsdfsdfsdfsdfsdfs  sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdsdfs fsdfsdfsdfsdfsdfsdfsdfsdfsdf', '', 'sdfsd', '', 0),
(10, 'dfg', '', 'dfg', '', 0),
(11, ' asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asda', '', 'asd asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas vv', '', 0),
(15, ' asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas ', '', ' asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas  asdas ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_generalsetting`
--

CREATE TABLE `nm_generalsetting` (
  `gs_id` tinyint(4) NOT NULL,
  `gs_sitename` varchar(100) NOT NULL,
  `gs_sitename_fr` varchar(200) NOT NULL,
  `gs_metatitle` varchar(150) NOT NULL,
  `gs_metatitle_fr` varchar(150) NOT NULL,
  `gs_metakeywords` text NOT NULL,
  `gs_metakeywords_fr` text NOT NULL,
  `gs_metadesc` text NOT NULL,
  `gs_metadesc_fr` text NOT NULL,
  `gs_defaulttheme` tinyint(3) UNSIGNED NOT NULL,
  `gs_defaultlanguage` tinyint(3) UNSIGNED NOT NULL,
  `gs_payment_status` varchar(50) NOT NULL,
  `gs_paypal_payment` varchar(100) NOT NULL,
  `gs_payumoney_status` varchar(100) NOT NULL,
  `gs_themes` varchar(20) NOT NULL,
  `gs_playstore_url` varchar(500) NOT NULL,
  `gs_apple_appstore_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_generalsetting`
--

INSERT INTO `nm_generalsetting` (`gs_id`, `gs_sitename`, `gs_sitename_fr`, `gs_metatitle`, `gs_metatitle_fr`, `gs_metakeywords`, `gs_metakeywords_fr`, `gs_metadesc`, `gs_metadesc_fr`, `gs_defaulttheme`, `gs_defaultlanguage`, `gs_payment_status`, `gs_paypal_payment`, `gs_payumoney_status`, `gs_themes`, `gs_playstore_url`, `gs_apple_appstore_url`) VALUES
(1, 'Laravel Ecommerce Single Vendor', 'Laravel Ecommerce french', 'Laravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single V', 'Laravel Ecommerce', 'Laravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single Vendor', 'Laravel Ecommerce', 'Laravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single VendorLaravel Ecommerce Single Vendor', 'Laravel Ecommerce', 1, 1, 'COD', 'Paypal', 'PayUmoney', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nm_imagesetting`
--

CREATE TABLE `nm_imagesetting` (
  `imgs_id` smallint(6) NOT NULL,
  `imgs_name` varchar(150) NOT NULL,
  `imgs_type` tinyint(4) NOT NULL COMMENT '1- logo,2 -Favicon,3-noimage,4-product,5-deal,6-sores,7-blog_banner,8-upload_banner,9-category,10-ads_blog_image,''11''=>''category'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_imagesetting`
--

INSERT INTO `nm_imagesetting` (`imgs_id`, `imgs_name`, `imgs_type`) VALUES
(1, 'Logo_1520256382_Logo_1517904811_Logo_hfgh.png', 1),
(2, 'Favicon_1517904843_fav_Df.png', 2),
(3, 'No_image_No_image_1509364387_381x215.jpg', 3),
(4, 'No_image_1522326031_800x800', 4),
(5, 'No_image_1509364387_800x800.png', 5),
(6, 'No_image_1509364387_455x378.png', 6),
(7, 'No_image_1509364387_320x190.png', 7),
(8, 'No_image_1509364387_870x350.png', 8),
(9, 'No_image_1509364387_250X200.jpg', 9),
(10, 'No_image_1509364387_380x215.png', 10),
(11, 'No_image_1509953715_200x200', 11);

-- --------------------------------------------------------

--
-- Table structure for table `nm_image_sizes`
--

CREATE TABLE `nm_image_sizes` (
  `image_size_id` int(11) NOT NULL,
  `image_size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_image_sizes`
--

INSERT INTO `nm_image_sizes` (`image_size_id`, `image_size`) VALUES
(1, '{\"product\":{\"width\":800,\"height\":800},\"deals\":{\"width\":800,\"height\":800},\"logo\":{\"width\":180,\"height\":45},\"favicon\":{\"width\":16,\"height\":16},\"no_image\":{\"width\":381,\"height\":215},\"category_advertisment\":{\"width\":170,\"height\":400},\"category_banner\":{\"width\":250,\"height\":200},\"top_category\":{\"width\":200,\"height\":200},\"sub_category\":{\"width\":200,\"height\":200},\"sec_sub_category\":{\"width\":200,\"height\":200},\"ads\":{\"width\":800,\"height\":400},\"store\":{\"width\":455,\"height\":378},\"blog\":{\"width\":320,\"height\":190},\"no_image_banner\":{\"width\":870,\"height\":350}}');

-- --------------------------------------------------------

--
-- Table structure for table `nm_inquiries`
--

CREATE TABLE `nm_inquiries` (
  `iq_id` int(10) UNSIGNED NOT NULL,
  `iq_name` varchar(100) NOT NULL,
  `iq_emailid` varchar(150) NOT NULL,
  `iq_phonenumber` varchar(20) NOT NULL,
  `iq_message` varchar(300) NOT NULL,
  `inq_readstatus` int(11) NOT NULL DEFAULT '0' COMMENT '0-not read 1 read'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_inquiries`
--

INSERT INTO `nm_inquiries` (`iq_id`, `iq_name`, `iq_emailid`, `iq_phonenumber`, `iq_message`, `inq_readstatus`) VALUES
(1, 'charles', 'charlesvictor.j@pofitec.com', '9498056637', 'Test File', 1),
(2, 'charles', 'charlesvictor.j@pofitec.com', '9498056637', 'dfhdhdf', 1),
(3, 'charles', 'charlesvictor.j@pofitec.com', '9498056637', 'sdfgfshdfh', 1),
(4, 'cffdh', 'dfhdfhfd@gmail.com', '56465456', 'dsgdgsdgsd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_language`
--

CREATE TABLE `nm_language` (
  `lang_id` int(11) UNSIGNED NOT NULL,
  `lang_code` varchar(10) NOT NULL,
  `lang_name` varchar(30) NOT NULL,
  `lang_status` int(4) NOT NULL COMMENT '1->Active,2->deactive',
  `lang_default` int(11) NOT NULL COMMENT '1->default,',
  `pack_lang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_language`
--

INSERT INTO `nm_language` (`lang_id`, `lang_code`, `lang_name`, `lang_status`, `lang_default`, `pack_lang`) VALUES
(1, 'en', 'English', 1, 1, 1),
(3, 'fr', 'French', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_login`
--

CREATE TABLE `nm_login` (
  `log_id` int(5) NOT NULL,
  `cus_id` int(5) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_type` int(11) NOT NULL DEFAULT '1' COMMENT '1-wesite,2 facebook'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_login`
--

INSERT INTO `nm_login` (`log_id`, `cus_id`, `log_date`, `log_type`) VALUES
(1, 186, '2017-10-03 07:23:05', 1),
(2, 186, '2017-10-03 12:36:58', 1),
(3, 186, '2017-10-09 11:13:05', 1),
(4, 186, '2017-10-09 11:13:36', 1),
(5, 186, '2017-10-16 12:23:52', 1),
(6, 186, '2017-10-17 08:01:41', 1),
(7, 186, '2017-10-20 05:26:25', 1),
(8, 186, '2017-10-20 09:58:23', 1),
(9, 188, '2017-10-21 11:30:19', 1),
(10, 188, '2017-10-21 11:31:18', 1),
(11, 186, '2017-10-23 06:15:58', 1),
(12, 186, '2017-10-23 10:55:27', 1),
(13, 186, '2017-10-23 10:57:05', 1),
(14, 186, '2017-10-23 11:02:39', 1),
(15, 186, '2017-10-23 11:15:40', 1),
(16, 186, '2017-10-24 04:40:35', 1),
(17, 186, '2017-10-24 04:40:35', 1),
(18, 186, '2017-10-24 06:13:37', 1),
(19, 186, '2017-10-24 06:14:38', 1),
(20, 186, '2017-10-24 07:11:28', 1),
(21, 186, '2017-10-24 07:37:39', 1),
(22, 186, '2017-10-24 07:40:15', 1),
(23, 186, '2017-10-24 08:10:34', 1),
(24, 186, '2017-10-24 08:38:23', 1),
(25, 186, '2017-10-24 08:39:55', 1),
(26, 186, '2017-10-24 08:40:26', 1),
(27, 186, '2017-10-24 08:58:01', 1),
(28, 186, '2017-10-24 08:59:15', 1),
(29, 186, '2017-10-24 09:01:03', 1),
(30, 186, '2017-10-24 09:01:55', 1),
(31, 186, '2017-10-24 09:31:46', 1),
(32, 186, '2017-10-24 09:32:48', 1),
(33, 186, '2017-10-24 09:36:15', 1),
(34, 186, '2017-10-24 10:57:51', 1),
(35, 186, '2017-10-24 10:58:28', 1),
(36, 186, '2017-10-24 12:27:39', 1),
(37, 186, '2017-10-24 13:16:58', 1),
(38, 186, '2017-10-24 13:21:14', 1),
(39, 186, '2017-10-24 13:24:56', 1),
(40, 186, '2017-10-24 13:33:58', 1),
(41, 186, '2017-10-24 13:43:36', 1),
(42, 186, '2017-10-25 04:53:59', 1),
(43, 186, '2017-10-26 07:53:38', 1),
(44, 190, '2017-10-27 04:52:41', 1),
(45, 186, '2017-10-27 05:48:07', 1),
(46, 190, '2017-10-27 06:17:27', 1),
(47, 190, '2017-10-27 07:37:24', 1),
(48, 186, '2017-10-27 09:36:27', 1),
(49, 193, '2017-10-27 10:20:09', 1),
(50, 186, '2017-10-27 10:27:56', 1),
(51, 193, '2017-10-27 10:29:57', 1),
(52, 186, '2017-10-30 04:41:08', 1),
(53, 186, '2017-10-30 04:52:47', 1),
(54, 186, '2017-10-30 04:55:34', 1),
(55, 194, '2017-10-30 05:07:26', 1),
(56, 194, '2017-10-30 05:08:36', 1),
(57, 186, '2017-10-30 08:06:30', 1),
(58, 186, '2017-10-30 08:36:50', 1),
(59, 186, '2017-10-30 08:37:40', 1),
(60, 186, '2017-10-30 11:05:55', 1),
(61, 186, '2017-10-30 11:10:31', 1),
(62, 197, '2017-10-31 04:05:05', 1),
(63, 197, '2017-10-31 04:05:17', 1),
(64, 197, '2017-10-31 04:12:52', 1),
(65, 197, '2017-10-31 04:29:04', 1),
(66, 197, '2017-10-31 04:29:21', 1),
(67, 198, '2017-10-31 04:35:28', 1),
(68, 197, '2017-10-31 04:37:00', 1),
(69, 198, '2017-10-31 05:02:31', 1),
(70, 198, '2017-10-31 05:55:01', 1),
(71, 198, '2017-10-31 05:55:04', 1),
(72, 198, '2017-10-31 05:55:05', 1),
(73, 198, '2017-10-31 05:55:05', 1),
(74, 198, '2017-10-31 05:55:08', 1),
(75, 198, '2017-10-31 05:55:08', 1),
(76, 198, '2017-10-31 05:55:09', 1),
(77, 198, '2017-10-31 05:55:09', 1),
(78, 198, '2017-10-31 05:55:26', 1),
(79, 198, '2017-10-31 05:56:47', 1),
(80, 198, '2017-10-31 05:57:54', 1),
(81, 198, '2017-10-31 06:01:31', 1),
(82, 198, '2017-10-31 06:05:31', 1),
(83, 198, '2017-10-31 06:06:23', 1),
(84, 198, '2017-10-31 06:07:57', 1),
(85, 198, '2017-10-31 06:10:38', 1),
(86, 198, '2017-10-31 06:15:35', 1),
(87, 198, '2017-10-31 06:16:11', 1),
(88, 198, '2017-10-31 06:17:04', 1),
(89, 198, '2017-10-31 06:22:50', 1),
(90, 198, '2017-10-31 06:23:50', 1),
(91, 198, '2017-10-31 06:24:08', 1),
(92, 198, '2017-10-31 07:12:18', 1),
(93, 198, '2017-10-31 07:12:36', 1),
(94, 198, '2017-10-31 07:13:56', 1),
(95, 198, '2017-10-31 07:14:41', 1),
(96, 197, '2017-10-31 07:21:03', 1),
(97, 197, '2017-10-31 09:34:01', 1),
(98, 197, '2017-10-31 09:34:09', 1),
(99, 197, '2017-11-01 10:40:56', 1),
(100, 197, '2017-11-01 11:32:28', 1),
(101, 197, '2017-11-01 11:40:16', 1),
(102, 186, '2017-11-01 12:28:27', 1),
(103, 186, '2017-11-01 12:36:12', 1),
(104, 186, '2017-11-01 12:42:38', 1),
(105, 197, '2017-11-02 04:20:46', 1),
(106, 186, '2017-11-02 10:11:24', 1),
(107, 201, '2017-11-02 10:13:21', 1),
(108, 194, '2017-11-02 10:20:07', 1),
(109, 186, '2017-11-02 10:28:19', 1),
(110, 186, '2017-11-03 10:01:47', 1),
(111, 186, '2017-11-03 10:49:50', 1),
(112, 186, '2017-11-04 05:46:17', 1),
(113, 201, '2017-11-04 06:56:38', 1),
(114, 194, '2017-11-04 09:03:43', 1),
(115, 186, '2017-11-06 11:51:43', 1),
(116, 186, '2017-11-06 11:51:46', 1),
(117, 186, '2017-11-06 11:51:48', 1),
(118, 186, '2017-11-06 11:51:59', 1),
(119, 186, '2017-11-06 11:52:11', 1),
(120, 186, '2017-11-06 11:54:50', 1),
(121, 186, '2017-11-07 07:24:01', 1),
(122, 186, '2017-11-07 07:24:03', 1),
(123, 186, '2017-11-07 07:25:52', 1),
(124, 186, '2017-11-07 07:27:28', 1),
(125, 186, '2017-11-07 07:42:13', 1),
(126, 186, '2017-11-07 09:54:01', 1),
(127, 186, '2017-11-07 09:54:01', 1),
(128, 186, '2017-11-07 09:54:01', 1),
(129, 197, '2017-11-08 04:38:49', 1),
(130, 186, '2017-11-08 11:21:19', 1),
(131, 186, '2017-11-08 11:51:44', 1),
(132, 186, '2017-11-09 12:03:53', 1),
(133, 198, '2017-11-09 12:59:44', 1),
(134, 198, '2017-11-10 04:32:54', 1),
(135, 198, '2017-11-10 04:34:31', 1),
(136, 198, '2017-11-10 04:43:50', 1),
(137, 198, '2017-11-10 04:44:22', 1),
(138, 198, '2017-11-10 04:59:11', 1),
(139, 198, '2017-11-10 05:08:34', 1),
(140, 198, '2017-11-10 05:20:17', 1),
(141, 186, '2017-11-11 06:19:42', 1),
(142, 197, '2017-11-11 09:23:02', 1),
(143, 186, '2017-11-13 07:55:00', 1),
(144, 186, '2017-11-13 09:47:55', 1),
(145, 197, '2017-11-13 11:05:38', 1),
(146, 186, '2017-11-16 05:46:07', 1),
(147, 186, '2017-11-16 10:57:27', 1),
(148, 186, '2017-11-16 12:13:46', 1),
(149, 186, '2017-11-17 04:02:28', 1),
(150, 186, '2017-11-18 06:02:43', 1),
(151, 186, '2017-11-18 07:20:48', 1),
(152, 186, '2017-11-18 10:52:32', 1),
(153, 186, '2017-11-18 11:23:06', 1),
(154, 186, '2017-11-20 04:17:16', 1),
(155, 198, '2017-11-20 04:43:55', 1),
(156, 186, '2017-11-20 06:44:33', 1),
(157, 197, '2017-11-20 10:07:32', 1),
(158, 201, '2017-11-20 10:48:21', 1),
(159, 198, '2017-11-20 12:32:16', 1),
(160, 186, '2017-11-21 12:02:36', 1),
(161, 188, '2017-11-23 05:55:56', 1),
(162, 201, '2017-11-27 05:17:20', 1),
(163, 186, '2017-11-29 09:04:15', 1),
(164, 186, '2017-11-30 11:35:19', 1),
(165, 188, '2017-12-04 07:15:08', 1),
(166, 186, '2017-12-04 11:58:40', 1),
(167, 186, '2017-12-07 07:29:17', 1),
(168, 186, '2017-12-08 13:37:51', 1),
(169, 202, '2017-12-09 04:55:28', 1),
(170, 186, '2017-12-09 10:07:19', 1),
(171, 186, '2017-12-11 05:08:40', 1),
(172, 186, '2017-12-11 12:00:20', 1),
(173, 186, '2017-12-11 12:30:20', 1),
(174, 201, '2017-12-11 13:30:11', 1),
(175, 201, '2017-12-11 15:06:43', 1),
(176, 201, '2017-12-12 05:01:09', 1),
(177, 197, '2017-12-12 06:53:50', 1),
(178, 197, '2017-12-12 11:08:00', 1),
(179, 201, '2017-12-12 12:20:20', 1),
(180, 197, '2017-12-12 14:03:27', 1),
(181, 197, '2017-12-13 04:24:43', 1),
(182, 186, '2017-12-15 07:42:05', 1),
(183, 201, '2017-12-16 06:15:24', 1),
(184, 201, '2017-12-16 06:15:47', 1),
(185, 201, '2017-12-16 09:20:20', 1),
(186, 186, '2017-12-16 12:50:36', 1),
(187, 201, '2017-12-18 04:37:46', 1),
(188, 186, '2017-12-18 06:59:16', 1),
(189, 201, '2017-12-18 08:09:26', 1),
(190, 202, '2017-12-18 09:27:48', 1),
(191, 201, '2017-12-18 09:31:43', 1),
(192, 201, '2017-12-18 09:59:38', 1),
(193, 197, '2017-12-19 04:39:14', 1),
(194, 197, '2017-12-19 04:54:32', 1),
(195, 186, '2017-12-19 05:08:27', 1),
(196, 201, '2017-12-19 07:43:57', 1),
(197, 197, '2017-12-19 09:25:56', 1),
(198, 201, '2017-12-19 09:26:35', 1),
(199, 201, '2017-12-19 12:29:23', 1),
(200, 201, '2017-12-20 06:29:49', 1),
(201, 201, '2017-12-21 04:41:29', 1),
(202, 201, '2017-12-21 05:46:40', 1),
(203, 201, '2017-12-22 04:24:32', 1),
(204, 202, '2017-12-22 04:52:14', 1),
(205, 203, '2017-12-22 04:59:03', 1),
(206, 203, '2017-12-22 05:02:31', 1),
(207, 203, '2017-12-22 05:12:09', 1),
(208, 203, '2017-12-22 11:51:18', 1),
(209, 201, '2017-12-22 12:47:01', 1),
(210, 201, '2017-12-25 05:59:06', 1),
(211, 201, '2017-12-25 12:40:12', 1),
(212, 201, '2017-12-25 12:40:13', 1),
(213, 201, '2017-12-26 04:46:24', 1),
(214, 206, '2017-12-26 05:38:15', 1),
(215, 206, '2017-12-26 13:31:32', 1),
(216, 207, '2017-12-27 08:02:16', 1),
(217, 207, '2017-12-27 11:27:07', 1),
(218, 207, '2017-12-28 07:25:50', 1),
(219, 207, '2017-12-29 11:29:26', 1),
(220, 207, '2018-01-02 07:05:19', 1),
(221, 197, '2018-01-03 09:35:54', 1),
(222, 197, '2018-01-03 11:29:52', 1),
(223, 197, '2018-01-03 13:31:59', 1),
(224, 207, '2018-01-04 07:02:16', 1),
(225, 207, '2018-01-04 10:45:44', 1),
(226, 207, '2018-01-05 04:29:51', 1),
(227, 206, '2018-01-05 06:46:01', 1),
(228, 212, '2018-01-05 09:14:54', 1),
(229, 213, '2018-01-05 13:56:04', 1),
(230, 194, '2018-01-06 05:30:03', 1),
(231, 214, '2018-01-08 05:21:47', 1),
(232, 214, '2018-01-08 06:25:43', 1),
(233, 220, '2018-01-08 08:11:51', 1),
(234, 222, '2018-01-08 10:41:54', 1),
(235, 214, '2018-01-08 10:46:17', 1),
(236, 201, '2018-01-08 11:34:41', 1),
(237, 214, '2018-01-09 05:40:32', 1),
(238, 206, '2018-01-09 06:55:27', 1),
(239, 220, '2018-01-09 11:52:20', 1),
(240, 201, '2018-01-10 06:01:35', 1),
(241, 201, '2018-01-10 06:08:50', 1),
(242, 220, '2018-01-10 06:59:34', 1),
(243, 206, '2018-01-10 10:54:30', 1),
(244, 201, '2018-01-10 13:37:23', 1),
(245, 212, '2018-01-10 13:44:38', 1),
(246, 220, '2018-01-11 04:24:31', 1),
(247, 212, '2018-01-11 04:28:35', 1),
(248, 201, '2018-01-11 04:44:20', 1),
(249, 231, '2018-01-11 04:52:28', 1),
(250, 212, '2018-01-11 04:54:42', 1),
(251, 232, '2018-01-11 04:56:36', 1),
(252, 212, '2018-01-11 05:48:04', 1),
(253, 212, '2018-01-11 06:32:41', 1),
(254, 232, '2018-01-11 06:56:57', 1),
(255, 232, '2018-01-11 08:00:28', 1),
(256, 232, '2018-01-11 08:34:30', 1),
(257, 212, '2018-01-11 12:55:08', 1),
(258, 232, '2018-01-12 03:58:57', 1),
(259, 214, '2018-01-12 05:01:01', 1),
(260, 220, '2018-01-12 05:03:06', 1),
(261, 232, '2018-01-12 06:21:16', 1),
(262, 206, '2018-01-12 07:19:08', 1),
(263, 214, '2018-01-12 07:21:59', 1),
(264, 232, '2018-01-12 08:23:24', 1),
(265, 214, '2018-01-12 09:02:01', 1),
(266, 214, '2018-01-12 11:18:59', 1),
(267, 201, '2018-01-12 12:50:17', 1),
(268, 212, '2018-01-12 13:40:49', 1),
(269, 201, '2018-01-13 04:06:53', 1),
(270, 214, '2018-01-13 04:37:45', 1),
(271, 249, '2018-01-13 12:20:16', 1),
(272, 201, '2018-01-16 03:50:57', 1),
(273, 250, '2018-01-16 04:35:05', 1),
(274, 220, '2018-01-16 05:13:10', 1),
(275, 214, '2018-01-16 06:15:17', 1),
(276, 212, '2018-01-16 07:13:44', 1),
(277, 250, '2018-01-16 10:23:33', 1),
(278, 214, '2018-01-16 10:23:37', 1),
(279, 250, '2018-01-16 10:38:15', 1),
(280, 250, '2018-01-16 10:40:31', 1),
(281, 250, '2018-01-16 10:46:35', 1),
(282, 250, '2018-01-16 10:52:23', 1),
(283, 250, '2018-01-16 10:55:04', 1),
(284, 250, '2018-01-16 11:58:19', 1),
(285, 250, '2018-01-16 12:09:13', 1),
(286, 250, '2018-01-16 14:50:07', 1),
(287, 201, '2018-01-17 05:32:14', 1),
(288, 250, '2018-01-17 05:48:55', 1),
(289, 250, '2018-01-17 05:52:31', 1),
(290, 250, '2018-01-17 05:59:21', 1),
(291, 214, '2018-01-17 07:02:29', 1),
(292, 250, '2018-01-17 10:59:54', 1),
(293, 250, '2018-01-17 12:32:19', 1),
(294, 250, '2018-01-17 13:24:29', 1),
(295, 250, '2018-01-17 13:56:26', 1),
(296, 201, '2018-01-18 04:12:08', 1),
(297, 214, '2018-01-18 07:50:05', 1),
(298, 250, '2018-01-18 07:50:18', 1),
(299, 250, '2018-01-18 08:16:50', 1),
(300, 186, '2018-01-18 10:20:15', 1),
(301, 201, '2018-01-18 12:56:55', 1),
(302, 250, '2018-01-18 13:13:27', 1),
(303, 186, '2018-01-18 14:01:20', 1),
(304, 214, '2018-01-18 14:01:20', 1),
(305, 250, '2018-01-19 05:03:54', 1),
(306, 250, '2018-01-19 05:04:23', 1),
(307, 220, '2018-01-19 06:23:04', 1),
(308, 250, '2018-01-19 07:29:02', 1),
(309, 250, '2018-01-19 11:05:17', 1),
(310, 250, '2018-01-20 09:45:25', 1),
(311, 250, '2018-01-20 10:25:04', 1),
(312, 250, '2018-01-20 10:27:48', 1),
(313, 201, '2018-01-23 04:24:18', 1),
(314, 201, '2018-01-24 06:09:43', 1),
(315, 201, '2018-01-25 03:49:52', 1),
(316, 250, '2018-01-26 08:51:47', 1),
(317, 250, '2018-01-26 08:55:07', 1),
(318, 250, '2018-01-26 09:25:14', 1),
(319, 250, '2018-01-26 10:18:51', 1),
(320, 186, '2018-01-30 06:38:35', 1),
(321, 201, '2018-01-31 12:58:26', 1),
(322, 186, '2018-02-01 05:44:55', 1),
(323, 250, '2018-02-02 06:14:23', 1),
(324, 250, '2018-02-02 06:15:39', 1),
(325, 250, '2018-02-02 06:44:48', 1),
(326, 250, '2018-02-02 06:50:27', 1),
(327, 250, '2018-02-02 06:50:50', 1),
(328, 201, '2018-02-03 11:38:30', 1),
(329, 229, '2018-02-05 05:16:36', 1),
(330, 229, '2018-02-05 05:24:02', 1),
(331, 212, '2018-02-05 10:01:54', 1),
(332, 212, '2018-02-05 10:03:13', 1),
(333, 201, '2018-02-05 10:58:51', 1),
(334, 229, '2018-02-05 11:03:45', 1),
(335, 229, '2018-02-05 11:49:32', 1),
(336, 229, '2018-02-05 11:55:29', 1),
(337, 201, '2018-02-05 12:03:11', 1),
(338, 229, '2018-02-06 05:20:55', 1),
(339, 229, '2018-02-06 05:25:16', 1),
(340, 201, '2018-02-06 06:15:06', 1),
(341, 229, '2018-02-06 10:12:56', 1),
(342, 253, '2018-02-06 10:14:46', 1),
(343, 220, '2018-02-06 10:46:02', 1),
(344, 253, '2018-02-06 11:03:47', 1),
(345, 229, '2018-02-06 11:23:29', 1),
(346, 201, '2018-02-06 13:37:38', 1),
(347, 220, '2018-02-07 06:58:31', 1),
(348, 220, '2018-02-07 07:11:29', 1),
(349, 229, '2018-02-07 07:28:58', 1),
(350, 229, '2018-02-07 07:32:33', 1),
(351, 229, '2018-02-07 07:54:15', 1),
(352, 229, '2018-02-07 08:00:58', 1),
(353, 229, '2018-02-09 12:23:19', 1),
(354, 229, '2018-02-09 12:23:44', 1),
(355, 229, '2018-02-10 09:15:31', 1),
(356, 214, '2018-02-10 13:29:06', 1),
(357, 229, '2018-02-10 13:58:38', 1),
(358, 214, '2018-02-12 04:22:30', 1),
(359, 201, '2018-02-12 05:58:06', 1),
(360, 201, '2018-02-13 08:01:31', 1),
(361, 220, '2018-02-13 09:48:38', 1),
(362, 214, '2018-02-13 10:08:55', 1),
(363, 201, '2018-02-14 03:49:31', 1),
(364, 229, '2018-02-14 04:36:45', 1),
(365, 201, '2018-02-14 12:29:53', 1),
(366, 201, '2018-02-15 04:21:20', 1),
(367, 229, '2018-02-15 07:32:07', 1),
(368, 229, '2018-02-16 10:46:30', 1),
(369, 220, '2018-02-17 09:46:20', 1),
(370, 229, '2018-02-17 13:23:50', 1),
(371, 220, '2018-02-20 08:04:17', 1),
(372, 220, '2018-02-20 12:01:10', 1),
(373, 220, '2018-02-21 14:45:28', 1),
(374, 220, '2018-02-22 04:54:27', 1),
(375, 220, '2018-02-23 11:36:20', 1),
(376, 220, '2018-02-27 08:17:28', 1),
(377, 220, '2018-02-27 11:50:40', 1),
(378, 186, '2018-02-27 13:37:17', 1),
(379, 229, '2018-02-27 13:37:53', 1),
(380, 201, '2018-02-27 13:42:50', 1),
(381, 220, '2018-02-28 04:06:17', 1),
(382, 229, '2018-02-28 04:28:06', 1),
(383, 220, '2018-02-28 05:38:33', 1),
(384, 220, '2018-02-28 06:03:44', 1),
(385, 229, '2018-02-28 07:45:45', 1),
(386, 220, '2018-02-28 08:53:02', 1),
(387, 220, '2018-03-01 04:39:12', 1),
(388, 229, '2018-03-01 05:30:52', 1),
(389, 220, '2018-03-01 10:39:36', 1),
(390, 220, '2018-03-01 10:42:43', 1),
(391, 186, '2018-03-01 14:05:57', 1),
(392, 229, '2018-03-01 14:06:27', 1),
(393, 229, '2018-03-02 04:44:42', 1),
(394, 229, '2018-03-02 13:30:56', 1),
(395, 229, '2018-03-02 13:39:57', 1),
(396, 220, '2018-03-03 05:43:34', 1),
(397, 229, '2018-03-03 06:17:38', 1),
(398, 186, '2018-03-03 06:51:17', 1),
(399, 220, '2018-03-03 10:05:10', 1),
(400, 229, '2018-03-03 13:47:58', 1),
(401, 229, '2018-03-05 04:23:26', 1),
(402, 220, '2018-03-06 05:07:53', 1),
(403, 201, '2018-03-06 06:34:16', 1),
(404, 220, '2018-03-06 06:37:55', 1),
(405, 220, '2018-03-06 07:07:35', 1),
(406, 220, '2018-03-07 05:34:16', 1),
(407, 201, '2018-03-07 05:34:55', 1),
(408, 220, '2018-03-07 07:28:11', 1),
(409, 220, '2018-03-08 05:38:25', 1),
(410, 201, '2018-03-13 09:39:04', 1),
(411, 220, '2018-03-19 12:25:42', 1),
(412, 201, '2018-03-21 06:57:04', 1),
(413, 271, '2018-03-28 05:01:29', 1),
(414, 271, '2018-03-28 05:06:23', 1),
(415, 271, '2018-03-29 11:02:41', 1),
(416, 271, '2018-03-30 04:30:07', 1),
(417, 271, '2018-03-30 06:11:27', 1),
(418, 271, '2018-03-30 08:54:26', 1),
(419, 272, '2018-03-30 11:04:02', 1),
(420, 273, '2018-03-30 11:12:11', 1),
(421, 273, '2018-03-31 04:46:08', 1),
(422, 220, '2018-04-03 05:00:16', 1),
(423, 220, '2018-04-03 06:02:15', 1),
(424, 220, '2018-04-03 06:25:54', 1),
(425, 274, '2018-04-03 06:49:42', 1),
(426, 274, '2018-04-04 05:10:04', 1),
(427, 273, '2018-04-04 07:21:57', 1),
(428, 275, '2018-04-04 09:51:51', 1),
(429, 273, '2018-04-04 10:16:19', 1),
(430, 274, '2018-04-04 10:56:09', 1),
(431, 273, '2018-04-04 11:29:46', 1),
(432, 274, '2018-04-05 05:13:48', 1),
(433, 284, '2018-04-05 08:26:42', 1),
(434, 285, '2018-04-05 11:48:09', 1),
(435, 275, '2018-04-06 04:46:13', 1),
(436, 275, '2018-04-06 06:16:27', 1),
(437, 273, '2018-04-06 07:23:06', 1),
(438, 273, '2018-04-06 08:20:03', 1),
(439, 275, '2018-04-07 09:30:04', 1),
(440, 286, '2018-04-10 10:16:04', 1),
(441, 275, '2018-04-10 10:17:02', 1),
(442, 275, '2018-04-10 10:22:59', 1),
(443, 275, '2018-04-10 10:39:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_maincategory`
--

CREATE TABLE `nm_maincategory` (
  `mc_id` smallint(5) UNSIGNED NOT NULL,
  `mc_name` varchar(100) NOT NULL,
  `mc_name_fr` varchar(100) NOT NULL,
  `mc_type` varchar(10) NOT NULL,
  `mc_img` varchar(150) NOT NULL,
  `mc_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_maincategory`
--

INSERT INTO `nm_maincategory` (`mc_id`, `mc_name`, `mc_name_fr`, `mc_type`, `mc_img`, `mc_status`) VALUES
(2, 'MEN', 'HOMMES', '1,1,1', 'Top_category_151064392814413.jpg', 1),
(3, 'WOMEN', 'FEMMES', '1,1,1', 'Top_category_15106439877938.jpg', 1),
(4, 'BABY & KIDS', 'BABY & KIDS', '1,1,1', 'Top_category_1513600877_200-200.png', 1),
(5, 'HOME & KITCHEN', 'ACCUEIL & CUISINE', '1,1,1', 'dead-shopping-cartfVTnMIGJ.jpg', 1),
(6, 'ELECTRONICS', 'ÉLECTRONIQUE', '1,1,1', 'shopping cart 2ltqacj52.jpg', 1),
(7, 'SPORTS', 'DES SPORTS', '1,1,1', 'profilexyUXsTa9.png', 1),
(8, 'AUTO MOBILES', 'AUTO MOBILES', '1,1,1', 'sedan-512xMcVlTeV.png', 1),
(9, 'BOOKS', 'LIVRES', '1,1,1', 'books-icon-512q6gJrb9I.png', 1),
(12, 'yuyuyuyuyuyuyuyuyuyuyuyuyuy', '', '1,1,1', 'Top_category_1513766717_200x200_10.jpg', 1),
(13, 'tytyt', '', '1,1,1', 'Top_category_1513766812_200x200_11.png', 0),
(14, 'dsds', '', '1,1,1', 'Top_category_1513767909.png', 1),
(17, 'Fashion', '', '1,1,1', 'Top_category_1515132272.jpg', 1),
(18, 'Agri', '', '1,1,1', 'Top_category_1517816866.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_modulesettings`
--

CREATE TABLE `nm_modulesettings` (
  `ms_id` int(11) NOT NULL,
  `ms_dealmodule` int(11) NOT NULL,
  `ms_productmodule` int(11) NOT NULL,
  `ms_auctionmodule` int(11) NOT NULL,
  `ms_blogmodule` int(11) NOT NULL,
  `ms_nearmemapmodule` int(11) NOT NULL,
  `ms_storelistmodule` int(11) NOT NULL,
  `ms_pastdealmodule` int(11) NOT NULL,
  `ms_faqmodule` int(11) NOT NULL,
  `ms_cod` int(11) NOT NULL,
  `ms_paypal` int(11) NOT NULL,
  `ms_creditcard` int(11) NOT NULL,
  `ms_googlecheckout` int(11) NOT NULL,
  `ms_shipping` int(11) NOT NULL COMMENT '1=>Free shipping, 2=> Flat shipping, 3=> Product per shippin, 4=> Per Item shipping',
  `ms_newsletter_template` int(11) NOT NULL COMMENT '1=> Temp 1, 2=>Temp 2, 3=> Temp 3, 4=> Temp 4',
  `ms_citysettings` int(11) NOT NULL COMMENT '1=> With city, 0=> Without city'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nm_newsletter_subscribers`
--

CREATE TABLE `nm_newsletter_subscribers` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `post_dt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nm_newsletter_subscribers`
--

INSERT INTO `nm_newsletter_subscribers` (`id`, `email`, `city_id`, `status`, `post_dt`) VALUES
(37, 'suganya@pofitec.com', 0, 1, '0000-00-00 00:00:00'),
(30, 'malarvizhi@pofitec.com', 0, 1, '0000-00-00 00:00:00'),
(35, 'venugopal@pofitec.com', 0, 0, '0000-00-00 00:00:00'),
(36, 'pgpreethu45@gmail.com', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nm_order`
--

CREATE TABLE `nm_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_cus_id` int(10) UNSIGNED NOT NULL,
  `order_pro_id` int(11) UNSIGNED NOT NULL,
  `order_prod_unitPrice` double NOT NULL DEFAULT '0',
  `order_type` tinyint(4) NOT NULL COMMENT '1-product,2-deals',
  `transaction_id` varchar(50) NOT NULL,
  `payer_email` varchar(50) NOT NULL,
  `payer_id` varchar(50) NOT NULL,
  `payer_name` varchar(100) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_amt` decimal(15,2) NOT NULL COMMENT '(unit price * quantity)',
  `order_tax` decimal(10,2) NOT NULL COMMENT 'tax per unit (in %)',
  `order_taxAmt` decimal(10,2) NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `token_id` varchar(30) NOT NULL,
  `payment_ack` varchar(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_date` varchar(20) NOT NULL,
  `payer_status` varchar(50) NOT NULL,
  `order_status` tinyint(4) NOT NULL COMMENT '1-sucess,2-complete,3-hold,4-failed',
  `delivery_status` int(11) NOT NULL DEFAULT '2' COMMENT '1->order_placed,2->order_packed,3->Dispatched,4->Delivered,5->cancel pending,6->cancelled,7->return pending ,8->returned,9->replace pending,10->replaced',
  `order_paytype` smallint(6) NOT NULL DEFAULT '1' COMMENT '1-paypal',
  `order_pro_color` int(11) NOT NULL,
  `order_pro_size` int(11) NOT NULL,
  `order_shipping_amt` varchar(20) NOT NULL,
  `order_shipping_add` text NOT NULL,
  `order_merchant_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_type` varchar(255) NOT NULL,
  `coupon_amount_type` varchar(255) NOT NULL,
  `coupon_amount` varchar(255) NOT NULL,
  `coupon_total_amount` varchar(255) NOT NULL,
  `wallet_amount` double NOT NULL,
  `mer_commission_amt` decimal(10,2) NOT NULL,
  `mer_amt` decimal(10,2) NOT NULL,
  `tax_id_number` varchar(40) NOT NULL,
  `tax_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_order`
--

INSERT INTO `nm_order` (`order_id`, `order_cus_id`, `order_pro_id`, `order_prod_unitPrice`, `order_type`, `transaction_id`, `payer_email`, `payer_id`, `payer_name`, `order_qty`, `order_amt`, `order_tax`, `order_taxAmt`, `currency_code`, `token_id`, `payment_ack`, `order_date`, `created_date`, `payer_status`, `order_status`, `delivery_status`, `order_paytype`, `order_pro_color`, `order_pro_size`, `order_shipping_amt`, `order_shipping_add`, `order_merchant_id`, `coupon_code`, `coupon_type`, `coupon_amount_type`, `coupon_amount`, `coupon_total_amount`, `wallet_amount`, `mer_commission_amt`, `mer_amt`, `tax_id_number`, `tax_type`) VALUES
(28, 201, 36, 10, 1, 'iZII4IEh9TEBmTKaw', '', '', '', 1, '10.00', '5.00', '0.50', '', '', '', '2017-12-21 00:47:58', '', '', 1, 6, 2, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 16.47, '0.78', '14.73', '', ''),
(29, 201, 35, 5, 1, 'iZII4IEh9TEBmTKaw', '', '', '', 1, '5.00', '4.00', '0.20', '', '', '', '2017-12-21 00:47:58', '', '', 1, 6, 2, 23, 14, '4', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 8.23, '0.46', '8.74', '', ''),
(30, 201, 36, 10, 1, '9R416707CH5978206', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '10.00', '5.00', '0.50', 'INR', 'EC-2C207225HT7184238', 'Success', '2017-12-24 19:53:01', '', 'unverified', 1, 6, 1, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '0.78', '14.73', '', ''),
(31, 201, 36, 10, 1, '0RY18511MJ490792B', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '10.00', '5.00', '0.50', 'INR', 'EC-3RR22142310400222', 'Success', '2017-12-24 19:58:56', '', 'unverified', 1, 6, 1, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '0.78', '14.73', '', ''),
(32, 201, 36, 10, 1, '5HE291760N2586152', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '10.00', '5.00', '0.50', 'INR', 'EC-45A79903CB517980P', 'Success', '2017-12-24 20:01:22', '', 'unverified', 1, 8, 1, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '0.78', '14.73', '', ''),
(33, 201, 36, 10, 1, 'ORDER1519821906TVBEFg', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '10.00', '5.00', '0.50', 'INR', 'EC-05V368365K507540W', 'Success', '2017-12-24 20:02:25', '', 'unverified', 1, 8, 2, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '0.78', '14.73', '', ''),
(34, 201, 36, 10, 1, 'ORDER1519822739Y3pxxS', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '10.00', '5.00', '0.50', 'INR', 'EC-9VD38671RX5375824', 'Success', '2017-12-24 21:46:31', '', 'unverified', 1, 10, 2, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '0.78', '14.73', '', ''),
(35, 201, 36, 10, 1, '4EB761201X023850H', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '10.00', '5.00', '0.50', 'INR', 'EC-1VA86417VW5347932', 'Success', '2017-12-24 21:48:09', '', 'unverified', 1, 8, 1, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '0.78', '14.73', '', ''),
(36, 201, 36, 10, 1, '7HY02061W0863332R', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '10.00', '5.00', '0.50', 'INR', 'EC-2Y505800RP283200X', 'Success', '2017-12-24 22:06:58', '', 'unverified', 1, 10, 1, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '0.78', '14.73', '', ''),
(37, 201, 1, 1200, 2, '1GY19202KC5728326', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '1200.00', '5.00', '60.00', 'INR', 'EC-62U26285AG418543E', 'Success', '2017-12-24 23:14:37', '', 'unverified', 1, 6, 1, 0, 0, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '63.25', '1201.75', '', ''),
(38, 201, 1, 1200, 2, '1SE07703430416241', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '1200.00', '5.00', '60.00', 'INR', 'EC-69A64958W1946135J', 'Success', '2017-12-24 23:17:16', '', 'unverified', 1, 10, 1, 0, 0, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '63.25', '1201.75', '', ''),
(39, 201, 1, 1200, 2, '58X139085H000343K', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '1200.00', '5.00', '60.00', 'INR', 'EC-0KC88858BM037551W', 'Success', '2017-12-24 23:22:45', '', 'unverified', 1, 8, 1, 0, 0, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '63.25', '1201.75', '', ''),
(40, 201, 1, 1200, 2, '2NP83756FC070680U', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '1200.00', '5.00', '60.00', 'INR', 'EC-63543002A9314461U', 'Success', '2017-12-24 23:48:11', '', 'unverified', 1, 10, 1, 0, 0, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '63.25', '1201.75', '', ''),
(41, 201, 1, 1200, 2, '2F716716P51046008', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '1200.00', '5.00', '60.00', 'INR', 'EC-8N7978974F118031P', 'Success', '2017-12-26 05:01:01', '', 'unverified', 1, 8, 1, 0, 0, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com', 41, '0', '0', '0', '0', '0', 0, '63.25', '1201.75', '', ''),
(42, 201, 9, 100, 2, '4XK542811B041453X', 'suganya.t@pofitec.com', 'SN6X6BJGBPQYX', 'test', 1, '100.00', '0.00', '0.00', 'INR', 'EC-546252229G917673X', 'Success', '2017-12-29 01:37:59', '', 'verified', 1, 4, 1, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, '5.00', '95.00', '', ''),
(43, 201, 9, 100, 2, '4XK542811B041453X', 'suganya.t@pofitec.com', 'SN6X6BJGBPQYX', 'test', 1, '100.00', '0.00', '0.00', 'INR', 'EC-546252229G917673X', 'Success', '2017-12-29 01:57:57', '', 'verified', 1, 4, 1, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, '5.00', '95.00', '', ''),
(44, 214, 170, 5, 1, '3PY20343PJ9472408', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '5.00', '2.00', '0.10', 'INR', 'EC-8EP631545F9424223', 'Success', '2018-01-07 19:30:33', '', 'verified', 1, 1, 1, 20, 4, '5', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state22,123456,4244114321312543543545435,vinodbabu@pofitec.com', 62, '0', '0', '0', '0', '0', 0, '0.10', '10.00', '', ''),
(45, 214, 170, 5, 1, '9EK709210D1805016', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '5.00', '2.00', '0.10', 'INR', 'EC-4SP468172U3996217', 'Success', '2018-01-07 23:30:55', '', 'verified', 1, 5, 1, 20, 5, '5', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state22,123456,4244114321312543543545435,vinodbabu@pofitec.com', 62, '0', '0', '0', '0', '0', 0, '0.10', '10.00', '', ''),
(46, 207, 169, 305, 1, 'PAY-18X32451H0459092JKO7KFUI', 'suganya.t@pofitec.com', 'https://www.paypal.com/webapps/auth/identity/user/', 'testuset', 2, '610.00', '3.00', '18.30', 'INR', 'A21AAGTeB3HkEF5hsEbBkgWUnDJAv1', 'Success', '2018-01-08 00:18:12', '', 'verified', 1, 1, 1, 0, 0, '0', 'testuset,\"test addr1\",\"test addr2\",tamil nadu,123456,7200285584,suganya.t@pofitec.com', 68, '', '', '', '', '', 0, '0.00', '628.30', '', ''),
(47, 214, 173, 80, 1, '8Y116078LD8996354', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '80.00', '1.00', '0.80', 'INR', 'EC-5FM876263C044450G', 'Success', '2018-01-08 00:53:21', '', 'verified', 1, 1, 1, 0, 4, '1', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu1@pofitec.com', 62, '0', '0', '0', '0', '0', 0, '0.82', '80.98', '', ''),
(48, 214, 172, 40, 1, '8Y116078LD8996354', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '40.00', '0.00', '0.00', 'INR', 'EC-5FM876263C044450G', 'Success', '2018-01-08 00:53:21', '', 'verified', 1, 1, 1, 11, 9, '10', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu1@pofitec.com', 62, '0', '0', '0', '0', '0', 0, '0.50', '49.50', '', ''),
(49, 220, 170, 5, 1, '8BM34143MC985384A', 'venugopal-buyer-1@pofitec.com', 'H7JMX8Z6VUTQW', 'test', 1, '5.00', '2.00', '0.10', 'INR', 'EC-60078191FD7795847', 'Success', '2018-01-10 19:59:21', '', 'verified', 1, 1, 1, 20, 4, '5', 'venugopal,ghjh,ghj,hgjghj,7567,3456765434,venugopal@pofitec.com', 62, '0', '0', '0', '0', '0', 0, '0.10', '10.00', '', ''),
(50, 212, 170, 5, 1, '7XV261868K389481E', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '5.00', '2.00', '0.10', 'INR', 'EC-71L456868F594263G', 'Success', '2018-01-11 01:03:54', '', 'verified', 1, 1, 1, 20, 4, '5', 'bala,gandhipuram,Bus stand,tn,640122,0123456789,balamurugan@pofitec.com', 62, '0', '0', '0', '0', '0', 0, '0.10', '10.00', '', ''),
(51, 212, 27, 620, 2, '3UC24031A3721333C', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '620.00', '2.00', '12.40', 'INR', 'EC-8F680282XA954690X', 'Success', '2018-01-11 01:37:33', '', 'verified', 1, 1, 1, 0, 0, '0', 'bala,gandhipuram,Bus stand,tn,640122,9874569856,balamurugan@pofitec.com', 68, '0', '0', '0', '0', '0', 0, '0.00', '632.40', '', ''),
(52, 212, 27, 620, 2, '9V914517RB797302W', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '620.00', '2.00', '12.40', 'INR', 'EC-3X34709558818241K', 'Success', '2018-01-11 01:52:39', '', 'verified', 1, 4, 1, 0, 0, '0', 'bala,gandhipuram,Bus stand,tn,640122,0123456,balamurugan@pofitec.com', 68, '0', '0', '0', '0', '0', 0, '0.00', '632.40', '', ''),
(53, 201, 170, 5, 1, '1SG46085LT8632335', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '5.00', '2.00', '0.10', 'INR', 'EC-9VM28921WA121873B', 'Success', '2018-01-12 01:14:47', '', 'verified', 1, 1, 1, 20, 4, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya.t@pofitec.com', 62, '0', '0', '0', '0', '0', 0, '0.10', '10.00', '', ''),
(54, 201, 27, 620, 2, '1SG46085LT8632335', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '620.00', '2.00', '12.40', 'INR', 'EC-9VM28921WA121873B', 'Success', '2018-01-12 01:14:47', '', 'verified', 1, 6, 1, 0, 0, '0', 'suganya,cbe,cbe,tn,123456,8012122975,suganya.t@pofitec.com', 68, '0', '0', '0', '0', '0', 0, '0.00', '632.40', '', ''),
(55, 201, 170, 5, 1, '8FR3459685178804M', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '5.00', '2.00', '0.10', 'INR', 'EC-3HW12919LV854203B', 'Success', '2018-01-13 05:21:56', '', 'verified', 1, 1, 1, 20, 5, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya.t@pofitec.com', 62, '0', '0', '0', '0', '0', 0, '0.10', '10.00', '', ''),
(56, 201, 160, 85001, 1, '4FM70563FJ6525317', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '85001.00', '5.00', '4250.05', 'INR', 'EC-77D73079490575105', 'Success', '2018-01-13 05:34:26', '', 'verified', 1, 5, 1, 0, 14, '40', 'suganya,cbe,cbe,tn,123456,8012122975,suganya.t@pofitec.com', 41, '0', '0', '0', '0', '0', 17821, '4464.55', '84826.50', '', ''),
(57, 220, 27, 620, 2, '164717853P1072731', 'venugopal-buyer-1@pofitec.com', 'H7JMX8Z6VUTQW', 'test', 1, '620.00', '2.00', '12.40', 'INR', 'EC-2MA98261R2145282B', 'Success', '2018-01-16 05:20:59', '', 'verified', 1, 1, 1, 0, 0, '0', 'venugopal,dfgg,dfgdg,dfgff,545345,3456765434,venugopal@pofitec.com', 68, '0', '0', '0', '0', '0', 0, '25.30', '607.10', '', ''),
(58, 214, 174, 1, 1, '3NG03799FS3061112', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '1.00', '0.00', '0.00', 'INR', 'EC-6NL55788M4788554T', 'Success', '2018-01-16 06:40:00', '', 'verified', 1, 1, 1, 0, 4, '0', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com', 60, '0', '0', '0', '0', '0', 0, '0.10', '0.90', '', ''),
(59, 214, 170, 5, 1, '3NG03799FS3061112', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '5.00', '2.00', '0.10', 'INR', 'EC-6NL55788M4788554T', 'Success', '2018-01-16 06:40:00', '', 'verified', 1, 1, 1, 15, 5, '5', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com', 62, '0', '0', '0', '0', '0', 0, '0.10', '10.00', '', ''),
(60, 214, 174, 1, 1, '9T787111J2070714B', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '1.00', '0.00', '0.00', 'INR', 'EC-7X434775NP352445W', 'Success', '2018-01-15 19:47:51', '', 'verified', 1, 1, 1, 0, 8, '0', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '0.10', '0.90', '', ''),
(61, 214, 35, 5, 1, '9T787111J2070714B', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '5.00', '4.00', '0.20', 'INR', 'EC-7X434775NP352445W', 'Success', '2018-01-15 19:47:51', '', 'verified', 1, 1, 1, 23, 0, '4', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 41, '0', '0', '0', '0', '0', 0, '0.46', '8.74', '', ''),
(62, 214, 168, 350, 1, '74V572964R970435M', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '350.00', '0.00', '0.00', 'INR', 'EC-0KM5721068744121P', 'Success', '2018-01-15 20:13:33', '', 'verified', 1, 1, 1, 21, 18, '0', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 68, '0', '0', '0', '0', '0', 0, '14.00', '336.00', '', ''),
(63, 214, 35, 5, 1, '74V572964R970435M', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '5.00', '4.00', '0.20', 'INR', 'EC-0KM5721068744121P', 'Success', '2018-01-15 20:13:33', '', 'verified', 1, 1, 1, 23, 0, '4', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 41, '0', '0', '0', '0', '0', 0, '0.46', '8.74', '', ''),
(64, 214, 174, 1, 1, '', '', '', '', 1, '1.00', '0.00', '0.00', '', '', '', '2018-01-15 21:29:49', '', '', 3, 1, 1, 0, 12, '0', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '0.10', '0.90', '', ''),
(65, 214, 35, 5, 1, '', '', '', '', 1, '5.00', '4.00', '0.20', '', '', '', '2018-01-15 21:29:49', '', '', 3, 1, 1, 23, 0, '4', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 41, '0', '0', '0', '0', '0', 0, '0.46', '8.74', '', ''),
(66, 214, 174, 1, 1, '', '', '', '', 1, '1.00', '0.00', '0.00', '', '', '', '2018-01-15 21:29:49', '', '', 3, 1, 1, 0, 12, '0', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '0.10', '0.90', '', ''),
(67, 214, 35, 5, 1, '', '', '', '', 1, '5.00', '4.00', '0.20', '', '', '', '2018-01-15 21:29:49', '', '', 3, 1, 1, 23, 0, '4', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 41, '0', '0', '0', '0', '0', 0, '0.46', '8.74', '', ''),
(68, 214, 174, 1, 1, '', '', '', '', 1, '1.00', '0.00', '0.00', '', '', '', '2018-01-15 21:32:07', '', '', 3, 1, 1, 0, 12, '0', 'vinod bab,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '0.10', '0.90', '', ''),
(69, 214, 35, 5, 1, '', '', '', '', 1, '5.00', '4.00', '0.20', '', '', '', '2018-01-15 21:32:07', '', '', 3, 1, 1, 23, 0, '4', 'vinod bab,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 41, '0', '0', '0', '0', '0', 0, '0.46', '8.74', '', ''),
(70, 214, 174, 1, 1, '3BR68107MB001423L', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '1.00', '0.00', '0.00', 'INR', 'EC-65X24976GU0878927', 'Success', '2018-01-15 21:32:07', '', 'verified', 1, 1, 1, 0, 12, '0', 'vinod bab,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '0.10', '0.90', '', ''),
(71, 214, 35, 5, 1, '3BR68107MB001423L', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '5.00', '4.00', '0.20', 'INR', 'EC-65X24976GU0878927', 'Success', '2018-01-15 21:32:07', '', 'verified', 1, 1, 1, 23, 0, '4', 'vinod bab,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 41, '0', '0', '0', '0', '0', 0, '0.46', '8.74', '', ''),
(72, 220, 177, 11200, 1, '5CY08665XH8540825', 'venugopal-buyer-1@pofitec.com', 'H7JMX8Z6VUTQW', 'test', 1, '11200.00', '2.00', '224.00', 'INR', 'EC-1H430429LE504493C', 'Success', '2018-01-15 22:06:47', '', 'verified', 1, 1, 1, 25, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 67, '0', '0', '0', '0', '0', 18, '1142.40', '10281.60', '', ''),
(73, 201, 24, 40229, 2, '6CU05309P59494244', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '40229.00', '0.00', '0.00', 'INR', 'EC-4NC87298HV5293242', 'Success', '2018-01-16 00:54:45', '', 'verified', 1, 6, 1, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 68, '0', '0', '0', '0', '0', 0, '1609.16', '38619.84', '', ''),
(74, 214, 174, 1, 1, '1LL41476VJ1615912', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 2, '2.00', '0.00', '0.00', 'INR', 'EC-80R19448DR640764K', 'Success', '2018-01-17 07:25:06', '', 'verified', 1, 1, 1, 0, 4, '0', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu1@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '0.20', '1.80', '', ''),
(75, 214, 36, 10, 1, '1LL41476VJ1615912', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '10.00', '5.00', '0.50', 'INR', 'EC-80R19448DR640764K', 'Success', '2018-01-17 07:25:06', '', 'verified', 1, 1, 1, 24, 14, '5', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu1@pofitec.com,Lahore,India', 41, '0', '0', '0', '0', '0', 0, '0.78', '14.73', '', ''),
(76, 214, 168, 350, 1, '68L07932E58851627', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '350.00', '0.00', '0.00', 'INR', 'EC-99T77422NN668731R', 'Success', '2018-01-16 21:28:40', '', 'verified', 1, 1, 1, 21, 18, '0', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 68, '0', '0', '0', '0', '0', 0, '14.00', '336.00', '', ''),
(77, 214, 174, 1, 1, '68L07932E58851627', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '1.00', '0.00', '0.00', 'INR', 'EC-99T77422NN668731R', 'Success', '2018-01-16 21:28:40', '', 'verified', 1, 1, 1, 0, 4, '0', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '0.10', '0.90', '', ''),
(78, 214, 174, 1, 1, '56E0726737616602T', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '1.00', '0.00', '0.00', 'INR', 'EC-7V431947DJ388383E', 'Success', '2018-01-16 21:40:27', '', 'verified', 1, 1, 1, 0, 8, '0', 'vinod babu,test address1,test address2,Test state21,123456,9790417157,vinodbabu@pofitec.com,vadavalli,India', 60, '0', '0', '0', '0', '0', 0, '0.10', '0.90', '', ''),
(79, 214, 33, 45, 2, '56E0726737616602T', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '45.00', '10.00', '4.50', 'INR', 'EC-7V431947DJ388383E', 'Success', '2018-01-16 21:40:27', '', 'verified', 1, 4, 1, 0, 0, '0', 'vinod babu,test address1,test address2,Test state21,123456,9790417157,vinodbabu@pofitec.com,vadavalli,India', 41, '0', '0', '0', '0', '0', 0, '2.48', '47.03', '', ''),
(80, 201, 37, 250, 2, '3D239866UL551162H', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 2, '500.00', '0.00', '0.00', 'INR', 'EC-9NJ66463MU255813F', 'Success', '2018-01-16 23:50:46', '', 'verified', 1, 8, 1, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 58, '0', '0', '0', '0', '0', 0, '105.00', '395.00', '', ''),
(81, 250, 34, 23, 2, '9YN55284MV039463P', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '23.00', '44.00', '10.12', 'INR', 'EC-4CP02573MY487653E', 'Success', '2018-01-17 00:34:24', '', 'verified', 1, 10, 1, 0, 0, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, '1.66', '31.46', '', ''),
(82, 250, 174, 1, 1, '7UA06428H85103338', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '1.00', '0.00', '0.00', 'INR', 'EC-4L728121YN2639700', 'Success', '2018-01-17 00:54:07', '', 'verified', 1, 1, 1, 0, 8, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, '0.10', '0.90', '', ''),
(83, 250, 181, 750, 1, '85A49672BE817862B', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '750.00', '3.00', '22.50', 'INR', 'EC-841612962X842814F', 'Success', '2018-01-18 00:06:48', '', 'verified', 1, 1, 1, 11, 4, '0', 'ragul,coimbatore,coimbatore,tamilnadu,641102,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, '30.90', '741.60', '', ''),
(84, 229, 174, 1, 1, '3P6520629W955813U', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '1.00', '0.00', '0.00', 'INR', 'EC-7X149997R36351739', 'Success', '2018-02-04 23:56:46', '', 'verified', 1, 4, 1, 0, 8, '0', 'bala,ram nagar,Peelamedu,tamil nadu,634601,7418529635,balamurugan@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, '0.10', '0.90', '', ''),
(85, 229, 40, 123, 2, '0BF64068RG828243R', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 2, '246.00', '32.00', '78.72', 'INR', 'EC-6EE39439HW3025024', 'Success', '2018-02-05 01:01:01', '', 'verified', 1, 4, 1, 0, 0, '240', 'bala,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, '28.24', '536.48', '', ''),
(86, 229, 36, 10, 1, '2DB3789912043444P', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '10.00', '5.00', '0.50', 'INR', 'EC-90Y711414W2135452', 'Success', '2018-02-06 05:27:24', '', 'verified', 1, 4, 1, 24, 14, '5', 'bala,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, '0.78', '14.73', '', ''),
(87, 229, 52, 500, 2, '00B391695E622323V', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '500.00', '2.00', '10.00', 'INR', 'EC-2Y33775845359344B', 'Success', '2018-02-06 05:39:37', '', 'verified', 1, 10, 1, 0, 0, '0', 'bala,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, '51.00', '459.00', '', ''),
(88, 229, 54, 4000, 2, '2D4253430C282510E', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '4000.00', '2.00', '80.00', 'INR', 'EC-8BE59910MD4171604', 'Success', '2018-02-06 19:57:58', '', 'verified', 1, 10, 1, 0, 0, '50', 'bala,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,Coimbatore,India', 77, '0', '0', '0', '0', '0', 0, '4088.70', '41.30', '', ''),
(89, 229, 134, 100, 1, '52B74444A5176283B', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '100.00', '0.00', '0.00', 'INR', 'EC-55X16320W70858623', 'Success', '2018-02-06 20:03:39', '', 'verified', 1, 4, 1, 11, 5, '50', 'bala,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,Coimbatore,India', 67, '0', '0', '0', '0', '0', 0, '15.00', '135.00', '', ''),
(90, 229, 174, 1, 1, '9WR947581X8183918', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '1.00', '0.00', '0.00', 'INR', 'EC-7EA71965KY2738244', 'Success', '2018-02-14 05:36:03', '', 'verified', 1, 8, 1, 0, 4, '0', 'balaa,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,peelamedu,India', 60, '0', '0', '0', '0', '0', 0, '0.10', '0.90', '', ''),
(91, 220, 95, 100, 1, '48X82225YX0460820', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 2, '200.00', '0.00', '0.00', 'INR', 'EC-22S44108W8627714R', 'Success', '2018-02-23 00:14:43', '', 'verified', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 58, '0', '0', '0', '0', '0', 0, '42.00', '158.00', '', ''),
(92, 229, 161, 1, 1, '96K86894UA423315R', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '1.00', '3.00', '0.03', 'INR', 'EC-7BP95889U7292010B', 'Success', '2018-02-27 01:50:38', '', 'verified', 1, 1, 1, 21, 4, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 58, '0', '0', '0', '0', '0', 0, '0.22', '0.81', '', ''),
(93, 229, 47, 7502, 1, '9KK20004A38663738', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '7502.00', '0.00', '0.00', 'INR', 'EC-0GN824134A107693N', 'Success', '2018-03-02 21:58:43', '', 'verified', 1, 1, 1, 5, 4, '52', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 62, '0', '0', '0', '0', '0', 0, '75.54', '7478.46', '', ''),
(94, 229, 171, 60, 1, '3BD73522RR768160V', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '60.00', '0.00', '0.00', 'INR', 'EC-00L10092JR385070K', 'Success', '2018-03-05 05:01:21', '', 'verified', 1, 1, 1, 0, 14, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(95, 220, 161, 3, 1, '', '', '', '', 1, '3.00', '0.00', '0.00', '', '', '', '2018-03-04 22:01:59', '', '', 3, 1, 1, 0, 4, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '', ''),
(96, 220, 161, 3, 1, '', '', '', '', 1, '3.00', '0.00', '0.00', '', '', '', '2018-03-04 22:01:59', '', '', 3, 1, 1, 0, 4, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '', ''),
(97, 220, 161, 3, 1, '25H29490D06450116', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '3.00', '0.00', '0.00', 'INR', 'EC-4HB64119PP812972P', 'Success', '2018-03-04 22:01:59', '', 'verified', 1, 1, 1, 0, 4, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '86UY776WSDHJ', 'GST'),
(98, 220, 51, 50, 2, '4SF57985PY5129257', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 2, '100.00', '2.00', '2.00', 'INR', 'EC-9KA55964020335249', 'Success', '2018-03-04 22:38:57', '', 'verified', 1, 1, 1, 0, 0, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '', ''),
(99, 220, 61, 40, 2, '9H698689J90770333', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '40.00', '0.00', '0.00', 'INR', 'EC-6R784729HA328902C', 'Success', '2018-03-06 06:48:27', '', 'verified', 1, 1, 1, 0, 0, '30', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(100, 201, 171, 60, 1, '0BS501589K263581G', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '60.00', '0.00', '0.00', 'INR', 'EC-6XF97027K5207452F', 'Success', '2018-03-05 19:34:11', '', 'verified', 1, 1, 1, 0, 14, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(101, 201, 182, 5, 1, 'ORDER1520331031DQbdxV', '', '', '', 1, '5.00', '0.00', '0.00', '', '', '', '2018-03-05 22:10:31', '', '', 1, 5, 2, 5, 4, '50', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 55, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(102, 201, 51, 50, 2, 'ORDER1520332996QqXFWJ', '', '', '', 1, '50.00', '2.00', '1.00', '', '', '', '2018-03-05 22:43:16', '', '', 1, 5, 2, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 51, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(103, 201, 51, 50, 2, 'ORDER1520333447BvWWHH', '', '', '', 1, '50.00', '2.00', '1.00', '', '', '', '2018-03-05 22:50:47', '', '', 1, 6, 2, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 51, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(104, 201, 67, 800, 2, '27N81055JP812383N', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '800.00', '2.00', '16.00', 'INR', 'EC-46P16331MY488612V', 'Success', '2018-03-06 21:56:53', '', 'verified', 1, 4, 1, 0, 0, '20', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(105, 201, 67, 800, 2, '27N81055JP812383N', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '800.00', '2.00', '16.00', 'INR', 'EC-46P16331MY488612V', 'Success', '2018-03-06 21:56:53', '', 'verified', 1, 4, 1, 0, 0, '20', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(106, 201, 67, 800, 2, '27N81055JP812383N', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '800.00', '2.00', '16.00', 'INR', 'EC-46P16331MY488612V', 'Success', '2018-03-06 21:56:53', '', 'verified', 1, 4, 1, 0, 0, '20', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(107, 201, 67, 800, 2, '27N81055JP812383N', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '800.00', '2.00', '16.00', 'INR', 'EC-46P16331MY488612V', 'Success', '2018-03-06 21:56:53', '', 'verified', 1, 4, 1, 0, 0, '20', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(108, 201, 201, 101, 1, '04717363YL186141H', 'vinodbabu.89-buyer-1@gmail.com', '58HF7RHS3MG2E', 'test', 1, '101.00', '0.00', '0.00', 'INR', 'EC-6Y012332M8115071S', 'Success', '2018-03-07 01:33:15', '', 'verified', 1, 1, 1, 0, 14, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(109, 271, 195, 121, 1, '42G05497AC5243125', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '121.00', '23.00', '27.83', 'INR', 'EC-92P96746NB113290N', 'Success', '2018-03-27 19:54:09', '', 'unverified', 1, 4, 1, 9, 0, '1', 'suganya,yu,yuy,Tamil nadu,123456,1234567890,suganya@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(110, 273, 195, 121, 1, '57100538AS681443G', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '121.00', '23.00', '27.83', 'INR', 'EC-9EL48284KS633453P', 'Success', '2018-03-29 23:59:00', '', 'unverified', 1, 9, 1, 15, 0, '1', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(111, 273, 162, 2, 1, '1CC39155GF708323D', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '2.00', '0.00', '0.00', 'INR', 'EC-3U523488SE3188848', 'Success', '2018-04-03 20:07:56', '', 'unverified', 1, 4, 1, 16, 4, '0', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(112, 273, 38, 2, 1, '0R925448NP171471T', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '2.00', '5.00', '0.10', 'INR', 'EC-0YD14512P3121643C', 'Success', '2018-04-03 20:20:34', '', 'unverified', 1, 7, 1, 0, 14, '5', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(113, 273, 60, 676, 2, '5GY0810659571183G', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '676.00', '6.00', '40.56', 'INR', 'EC-510724259W3857440', 'Success', '2018-04-03 21:09:59', '', 'unverified', 1, 7, 1, 0, 0, '0', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(114, 273, 60, 676, 2, '212651097D484344T', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '676.00', '6.00', '40.56', 'INR', 'EC-2U361759KG953830J', 'Success', '2018-04-03 21:11:14', '', 'unverified', 1, 9, 1, 0, 0, '0', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(115, 273, 60, 676, 2, '8E0481204C534654D', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '676.00', '6.00', '40.56', 'INR', 'EC-4SG5206315472052W', 'Success', '2018-04-03 21:12:01', '', 'unverified', 1, 5, 1, 0, 0, '0', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(116, 275, 191, 3, 1, '9SG73279LS412714C', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '3.00', '0.00', '0.00', 'INR', 'EC-3MS15986TH9975205', 'Success', '2018-04-03 22:08:57', '', 'unverified', 1, 1, 1, 0, 14, '0', 'Nagoor meeran,Karumbukadai,Aasath Nagar,Tamil Nadu,641008,1591591599,nagoor@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(117, 275, 161, 3, 1, '6NP63254X6752245T', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '3.00', '0.00', '0.00', 'INR', 'EC-8LA676122J580664T', 'Success', '2018-04-03 22:14:57', '', 'unverified', 1, 1, 1, 0, 4, '0', 'Nagoor meeran,Karumbukadai,Aasath Nagar,Tamil Nadu,641008,1591591599,nagoor@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(118, 273, 59, 454, 2, '0H0264141T426192T', 'malarvizhi@pofitec.com', 'BDP23VH5L3RZ8', 'malar', 1, '454.00', '0.00', '0.00', 'INR', 'EC-99N79331AN6511059', 'Success', '2018-04-06 07:23:26', '', 'unverified', 1, 1, 1, 0, 0, '0', 'suganya,mettupalayam,m,Tamil Nadu,344556,1234567890,suganya@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST');

-- --------------------------------------------------------

--
-- Table structure for table `nm_ordercod`
--

CREATE TABLE `nm_ordercod` (
  `cod_id` int(10) UNSIGNED NOT NULL,
  `cod_transaction_id` varchar(60) NOT NULL,
  `cod_cus_id` int(10) UNSIGNED NOT NULL,
  `cod_pro_id` int(11) UNSIGNED NOT NULL,
  `cod_prod_unitPrice` double NOT NULL DEFAULT '0',
  `cod_order_type` tinyint(4) NOT NULL COMMENT '1-product,2-deals',
  `cod_qty` int(11) NOT NULL,
  `cod_amt` decimal(10,2) NOT NULL COMMENT '(unit_price*quantity)',
  `cod_tax` decimal(10,2) NOT NULL COMMENT 'per_product_tax (in %)',
  `cod_taxAmt` decimal(10,2) NOT NULL,
  `cod_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cod_status` tinyint(4) NOT NULL COMMENT '1-sucess,2-complete,3-hold,4-failed',
  `delivery_status` int(11) NOT NULL COMMENT '1->order_placed,2->order_packed,3->Dispatched,4->Delivered,5->cancel pending,6->cancelled,7->return pending ,8->returned,9->replace pending,10->replaced',
  `created_date` varchar(20) NOT NULL,
  `cod_paytype` smallint(6) NOT NULL COMMENT '0=>cash on delivery',
  `cod_pro_color` tinyint(4) NOT NULL,
  `cod_pro_size` tinyint(4) NOT NULL,
  `cod_shipping_amt` varchar(20) NOT NULL,
  `cod_ship_addr` text NOT NULL,
  `cod_merchant_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_type` varchar(255) NOT NULL,
  `coupon_amount_type` varchar(255) NOT NULL,
  `coupon_amount` varchar(100) NOT NULL,
  `coupon_total_amount` varchar(100) NOT NULL,
  `wallet_amount` double NOT NULL,
  `cod_prod_actualprice` double NOT NULL,
  `mer_commission_amt` decimal(10,2) NOT NULL,
  `mer_amt` decimal(10,2) NOT NULL,
  `tax_id_number` varchar(40) NOT NULL,
  `tax_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_ordercod`
--

INSERT INTO `nm_ordercod` (`cod_id`, `cod_transaction_id`, `cod_cus_id`, `cod_pro_id`, `cod_prod_unitPrice`, `cod_order_type`, `cod_qty`, `cod_amt`, `cod_tax`, `cod_taxAmt`, `cod_date`, `cod_status`, `delivery_status`, `created_date`, `cod_paytype`, `cod_pro_color`, `cod_pro_size`, `cod_shipping_amt`, `cod_ship_addr`, `cod_merchant_id`, `coupon_code`, `coupon_type`, `coupon_amount_type`, `coupon_amount`, `coupon_total_amount`, `wallet_amount`, `cod_prod_actualprice`, `mer_commission_amt`, `mer_amt`, `tax_id_number`, `tax_type`) VALUES
(33, 'ORDER1001', 201, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2017-12-21 19:47:15', 1, 4, '', 0, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(34, 'ORDER1002', 201, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2017-12-21 20:48:42', 3, 6, '', 0, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(36, 'ORDER1004', 201, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2017-12-25 06:01:26', 3, 6, '', 0, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(37, 'ORDER1005', 201, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2017-12-24 21:25:23', 1, 8, '', 0, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(38, 'ORDER1006', 201, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2017-12-24 21:30:12', 1, 8, '', 0, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(40, 'ORDER1008', 201, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2017-12-24 21:38:03', 1, 10, '', 0, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(41, 'ORDER1009', 201, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2017-12-24 21:46:06', 3, 6, '', 0, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(42, 'ORDER1010', 201, 1, 1200, 2, 1, '1200.00', '5.00', '60.00', '2017-12-24 22:39:35', 3, 5, '', 0, 0, 0, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '63.25', '1201.75', '', ''),
(43, 'ORDER1011', 201, 1, 1200, 2, 1, '1200.00', '5.00', '60.00', '2017-12-24 22:41:00', 1, 8, '', 0, 0, 0, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '63.25', '1201.75', '', ''),
(44, 'ORDER1012', 201, 1, 1200, 2, 1, '1200.00', '5.00', '60.00', '2017-12-24 23:13:00', 1, 8, '', 0, 0, 0, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '63.25', '1201.75', '', ''),
(45, 'ORDER1013', 201, 1, 1200, 2, 1, '1200.00', '5.00', '60.00', '2017-12-24 23:28:51', 1, 8, '', 0, 0, 0, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '63.25', '1201.75', '', ''),
(46, 'ORDER1014', 201, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2017-12-25 00:40:24', 1, 6, '', 0, 24, 14, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(47, 'ORDER1015', 201, 1, 1200, 2, 1, '1200.00', '5.00', '60.00', '2017-12-26 04:46:52', 1, 10, '', 0, 0, 0, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '63.25', '1201.75', '', ''),
(48, 'ORDER1016', 201, 1, 1200, 2, 1, '1200.00', '5.00', '60.00', '2017-12-26 05:00:38', 1, 8, '', 0, 0, 0, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,city english,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '63.25', '1201.75', '', ''),
(49, 'ORDER1017', 207, 13, 800, 2, 1, '800.00', '0.00', '0.00', '2017-12-26 20:03:07', 3, 1, '', 0, 0, 0, '0', 'suganya,sfsdf,df,tamilnadu,614523,9856322356,suganya.t@pofitec.com,Coimbatore,India', 58, '0', '0', '0', '0', '0', 0, 1000, '168.00', '632.00', '', ''),
(50, 'Sc8ninTt', 207, 9, 100, 2, 1, '100.00', '0.00', '0.00', '2017-12-28 23:32:28', 3, 1, '', 0, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, 0, '5.00', '95.00', '', ''),
(51, 'SPJ2F40E', 207, 9, 100, 2, 1, '100.00', '0.00', '0.00', '2017-12-28 23:33:35', 3, 1, '', 0, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, 0, '5.00', '95.00', '', ''),
(52, 'ORDER1001', 207, 38, 2, 1, 1, '2.00', '5.00', '0.10', '2017-12-28 23:36:37', 3, 1, '', 0, 0, 14, '5', 'suganya,sfsdf,df,tamilnadu,614523,9856322356,suganya.t@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 500, '0.36', '6.75', '', ''),
(53, 'ORDER1001', 207, 9, 100, 2, 2, '200.00', '0.00', '0.00', '2017-12-28 23:36:37', 3, 1, '', 0, 0, 0, '0', 'suganya,sfsdf,df,tamilnadu,614523,9856322356,suganya.t@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 1000, '10.00', '190.00', '', ''),
(54, 'RQ8EghQa', 207, 9, 100, 2, 2, '200.00', '0.00', '0.00', '2017-12-28 23:58:34', 3, 1, '', 0, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, 0, '10.00', '190.00', '', ''),
(55, 'TPE3BLG8', 207, 9, 100, 2, 2, '200.00', '0.00', '0.00', '2017-12-29 00:19:55', 3, 1, '', 0, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, 0, '10.00', '190.00', '', ''),
(56, 'DusasjPs', 207, 9, 100, 2, 2, '200.00', '0.00', '0.00', '2017-12-29 00:40:52', 3, 1, '', 0, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, 0, '10.00', '190.00', '', ''),
(57, 'Fo0ZAzVo', 207, 9, 100, 2, 2, '200.00', '0.00', '0.00', '2017-12-29 00:42:11', 3, 1, '', 0, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, 0, '10.00', '190.00', '', ''),
(58, 'djqcV7Nu', 207, 9, 100, 2, 2, '200.00', '0.00', '0.00', '2017-12-29 00:58:33', 3, 1, '', 0, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, 0, '10.00', '190.00', '', ''),
(59, '0dWtnzPb', 207, 9, 100, 2, 2, '200.00', '0.00', '0.00', '2017-12-29 01:20:59', 3, 1, '', 0, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, 0, '10.00', '190.00', '', ''),
(60, '3IsXsnFK', 207, 9, 100, 2, 2, '200.00', '0.00', '0.00', '2017-12-29 01:33:53', 3, 1, '', 0, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, 0, '10.00', '190.00', '', ''),
(61, 'UqXnt3g1', 207, 9, 100, 2, 2, '200.00', '0.00', '0.00', '2017-12-29 01:50:56', 3, 1, '', 0, 0, 0, '0', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 41, '', '', '', '', '', 0, 0, '10.00', '190.00', '', ''),
(62, 'ORDER1001', 207, 44, 11, 1, 1, '11.00', '0.00', '0.00', '2018-01-01 19:50:30', 3, 1, '', 0, 0, 14, '0', 'suganya,sfsdf,df,tamilnadu,614523,9856322356,suganya.t@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 23, '0.55', '10.45', '', ''),
(63, 'ORDER1002', 207, 44, 11, 1, 1, '11.00', '0.00', '0.00', '2018-01-01 20:11:04', 3, 1, '', 0, 0, 14, '0', 'suganya,sfsdf,df,tamilnadu,614523,9856322356,suganya.t@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 23, '0.55', '10.45', '', ''),
(64, 'ORDER1003', 197, 41, 5, 1, 1, '5.00', '0.00', '0.00', '2018-01-02 23:31:37', 3, 6, '', 0, 0, 14, '0', 'venugopal,jhkjhkk,jhkj,jkk,645678877,3456765434,venugopal@pofitec.com,Coimbatore,India', 58, '0', '0', '0', '0', '0', 0, 20, '1.05', '3.95', '', ''),
(65, 'ORDER1003', 197, 160, 85001, 1, 1, '85001.00', '5.00', '4250.05', '2018-01-02 23:31:37', 3, 6, '', 0, 0, 14, '40', 'venugopal,jhkjhkk,jhkj,jkk,645678877,3456765434,venugopal@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 90001, '4464.55', '84826.50', '', ''),
(66, 'ORDER1004', 197, 16, 8500, 2, 5, '42500.00', '5.00', '2125.00', '2018-01-03 01:32:22', 3, 1, '', 0, 0, 0, '200', 'venugopal,jhkjhkk,jhkj,jkk,645678877,3456765434,venugopal@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 9000, '2241.25', '42583.75', '', ''),
(67, 'ORDER1005', 207, 19, 250, 2, 2, '500.00', '5.00', '25.00', '2018-01-04 07:03:15', 3, 1, '', 0, 0, 0, '0', 'suganya,sfsdf,df,tamilnadu,614523,9856322356,suganya.t@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 500, '26.25', '498.75', '', ''),
(68, 'ORDER1006', 207, 118, 100, 1, 4, '400.00', '0.00', '0.00', '2018-01-03 21:50:39', 3, 1, '', 0, 0, 0, '0', 'suganya,sfsdf,df,tamilnadu,614523,9856322356,suganya.t@pofitec.com,Coimbatore,India', 67, '0', '0', '0', '0', '0', 0, 200, '40.00', '360.00', '', ''),
(69, 'ORDER1007', 207, 41, 5, 1, 7, '35.00', '0.00', '0.00', '2018-01-03 22:46:10', 1, 4, '', 0, 0, 14, '0', 'suganya,sfsdf,df,tamilnadu,614523,9856322356,suganya.t@pofitec.com,Coimbatore,India', 58, '0', '0', '0', '0', '0', 0, 20, '7.35', '27.65', '', ''),
(70, 'ORDER1008', 207, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2018-01-03 22:51:25', 3, 1, '', 0, 24, 14, '5', 'suganya,sfsdf,df,tamilnadu,614523,9856322356,suganya.t@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(71, 'ORDER1009', 206, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2018-01-05 06:46:31', 3, 1, '', 0, 24, 14, '5', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(72, 'ORDER1009', 206, 167, 300, 1, 1, '300.00', '12.00', '36.00', '2018-01-05 06:46:31', 3, 1, '', 0, 37, 7, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 456, '0.00', '336.00', '', ''),
(73, 'ORDER1010', 212, 168, 350, 1, 2, '700.00', '0.00', '0.00', '2018-01-04 21:17:06', 3, 1, '', 0, 13, 17, '0', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,bala@gmail.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 450, '0.00', '700.00', '', ''),
(74, 'ORDER1011', 212, 168, 350, 1, 1, '350.00', '0.00', '0.00', '2018-01-04 21:22:31', 3, 1, '', 0, 18, 17, '0', 'bala,Coimbatore  ram nagar,ram nagar,Tamil Nadu,641001,9874569856,bala@gmail.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 450, '0.00', '350.00', '', ''),
(75, 'ORDER1012', 212, 25, 300, 2, 1, '300.00', '0.00', '0.00', '2018-01-04 21:25:30', 3, 1, '', 0, 0, 0, '0', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,bala@gmail.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 600, '0.00', '300.00', '', ''),
(76, 'ORDER1013', 213, 167, 300, 1, 1, '300.00', '12.00', '36.00', '2018-01-05 01:58:04', 3, 1, '', 0, 47, 4, '0', 'vishnu.v.r,coimbatore,coimbatore,tamilnadu,641104,8891619125,vishnu@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 456, '0.00', '336.00', '', ''),
(77, 'ORDER1014', 214, 170, 5, 1, 2, '10.00', '2.00', '0.20', '2018-01-08 06:19:29', 3, 1, '', 0, 20, 4, '10', 'test name  sfsdf dsf dsf dsf ds hf$@*$@)$*)(@*$)@$@FLCKSCLKSJDLKSDJLKASDLDSLDLSDLKSJDLSJD LS*$)@Q(#*)@*#)(@#@#@#@S DLJSDLKSJDJSKLD SLDK LDSJD LKASDLKA $@*#@Q)# SDLKJSDJAS##@,test address1  sfsdf dsf dsf dsf ds hf$@*$@)$*)(@*$)@$@FLCKSCLKSJDLKSDJLKASDLDSLDLSDLKSJDLSJD LS*$)@Q(#*)@*#)(@#@#@#@S DLJSDLKSJDJSKLD SLDK LDSJD LKASDLKA $@*#@Q)# SDLKJSDJAS##@,test address2   sfsdf dsf dsf dsf ds hf$@*$@)$*)(@*$)@$@FLCKSCLKSJDLKSDJLKASDLDSLDLSDLKSJDLSJD LS*$)@Q(#*)@*#)(@#@#@#@S DLJSDLKSJDJSKLD SLDK LDSJD LKASDLKA $@*#@Q)# SDLKJSDJAS##@,test state  sfsdf dsf dsf dsf ds hf$@*$@)$*)(@*$)@$@FLCKSCLKSJDLKSDJLKASDLDSLDLSDLKSJDLSJD LS*$)@Q(#*)@*#)(@#@#@#@S DLJSDLKSJDJSKLD SLDK LDSJD LKASDLKA $@*#@Q)# SDLKJSDJAS##@,654321,4244114321312,vinodbabu@pofitec.com,TEst city   sfsdf dsf dsf dsf ds hf$@*$@)$*)(@*$)@$@FLCKSCLKSJDLKSDJLKASDLDSLDLSDLKSJDLSJD LS*$)@Q(#*)@*#)(@#@#@#@S DLJSDLKSJDJSKLD SLDK LDSJD LKASDLKA $@*#@Q)# SDLKJSDJAS##@,test ccountry   sfsdf dsf dsf dsf ds hf$@*$@)$*)(@*$)@$@FLCKSCLKSJDLKSDJLKASDLDSLDLSDLKSJDLSJD LS*$)@Q(#*)@*#)(@#@#@#@S DLJSDLKSJDJSKLD SLDK LDSJD LKASDLKA $@*#@Q)# SDLKJSDJAS##@', 62, '0', '0', '0', '0', '0', 0, 10, '0.00', '20.20', '', ''),
(78, 'ORDER1015', 214, 170, 5, 1, 3, '15.00', '2.00', '0.30', '2018-01-08 06:29:03', 3, 1, '', 0, 15, 5, '15', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu1@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, 10, '0.00', '30.30', '', ''),
(79, 'ORDER1016', 214, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-08 06:55:08', 3, 1, '', 0, 9, 8, '5', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, 10, '0.00', '10.10', '', ''),
(80, 'ORDER1017', 214, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-08 07:00:55', 3, 1, '', 0, 20, 9, '5', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu1@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, 10, '0.00', '10.10', '', ''),
(81, 'rBbSwFlK', 201, 23, 1800, 2, 1, '1800.00', '5.00', '90.00', '2018-01-07 23:37:37', 3, 1, '', 0, 0, 0, '50', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 68, '', '', '', '', '', 0, 0, '0.00', '1940.00', '', ''),
(82, 'dda54NE1', 201, 23, 1800, 2, 2, '3600.00', '5.00', '180.00', '2018-01-07 23:38:21', 3, 1, '', 0, 0, 0, '100', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 68, '', '', '', '', '', 0, 0, '0.00', '3880.00', '', ''),
(83, 'ORDER1001', 214, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-07 23:47:56', 3, 1, '', 0, 13, 7, '5', 'test,dfgd,dfdasf,sdfdsfds,324324,3245243242,vinodbabu@pofitec.com,sdfdsfds,sdfdsfds', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(84, 'xBlz8M7J', 207, 169, 305, 1, 19, '5795.00', '3.00', '173.85', '2018-01-08 00:03:40', 3, 1, '', 0, 0, 0, '0.00', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 68, '', '', '', '', '', 0, 0, '0.00', '5968.85', '', ''),
(85, '4MSRxmW4', 207, 169, 305, 1, 2, '610.00', '3.00', '18.30', '2018-01-08 00:04:08', 3, 1, '', 0, 0, 0, '0.00', 'suganya,test ship addr1,test ship addr2,TN,654321,7373857689,suganya.t@pofitec.com', 68, '', '', '', '', '', 0, 0, '0.00', '628.30', '', ''),
(86, '2eNWsiCd', 207, 169, 305, 1, 2, '610.00', '3.00', '18.30', '2018-01-08 00:13:17', 3, 1, '', 0, 0, 0, '0', 'gahdhi,test ship addr1,test ship addr2,TN,641654,9944349002,suganyya.t@pofitec.com', 68, '', '', '', '', '', 0, 0, '0.00', '628.30', '', ''),
(87, 'lTcWNf4F', 201, 164, 30000, 1, 2, '60000.00', '10.00', '6000.00', '2018-01-08 00:29:35', 3, 5, '', 0, 10, 7, '2400', 'gahdhi,test ship addr1,test ship addr2,TN,641654,9944349002,suganyya.t@pofitec.com', 62, '', '', '', '', '', 0, 0, '684.00', '67716.00', '', ''),
(88, 'lTcWNf4F', 201, 138, 8500, 1, 5, '42500.00', '10.00', '4250.00', '2018-01-08 00:29:35', 3, 1, '', 0, 10, 5, '750', 'gahdhi,test ship addr1,test ship addr2,TN,641654,9944349002,suganyya.t@pofitec.com', 60, '', '', '', '', '', 0, 0, '4750.00', '42750.00', '', ''),
(89, 'ORDER1001', 201, 173, 80, 1, 2, '160.00', '1.00', '1.60', '2018-01-10 06:10:38', 3, 1, '', 0, 0, 0, '2', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,Lahore,Italy', 62, '0', '0', '0', '0', '0', 0, 100, '1.64', '161.96', '', ''),
(90, 'ORDER1001', 201, 172, 40, 1, 2, '80.00', '0.00', '0.00', '2018-01-10 06:10:38', 3, 1, '', 0, 0, 0, '20', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,Lahore,Italy', 62, '0', '0', '0', '0', '0', 0, 50, '1.00', '99.00', '', ''),
(91, 'ORDER1001', 201, 28, 10000, 2, 5, '50000.00', '5.00', '2500.00', '2018-01-10 06:10:38', 3, 1, '', 0, 0, 0, '1250', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,Lahore,Italy', 62, '0', '0', '0', '0', '0', 0, 25000, '537.50', '53212.50', '', ''),
(92, 'ORDER1002', 201, 28, 10000, 2, 5, '50000.00', '5.00', '2500.00', '2018-01-10 06:18:43', 3, 1, '', 0, 0, 0, '1250', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,Lahore,Italy', 62, '0', '0', '0', '0', '0', 0, 25000, '537.50', '53212.50', '', ''),
(93, 'ORDER1003', 201, 28, 10000, 2, 5, '50000.00', '5.00', '2500.00', '2018-01-10 07:02:05', 3, 1, '', 0, 0, 0, '1250', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,Lahore,Italy', 62, '0', '0', '0', '0', '0', 0, 25000, '537.50', '53212.50', '', ''),
(94, 'ORDER1004', 220, 172, 40, 1, 1, '40.00', '0.00', '0.00', '2018-01-10 07:16:01', 3, 1, '', 0, 11, 9, '10', 'venugopal,dsfsd,sdfsd,fsdfsdf,4345,3456765434,venugopal@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 50, '0.50', '49.50', '', ''),
(95, 'ORDER1005', 220, 167, 300, 1, 1, '300.00', '12.00', '36.00', '2018-01-10 07:25:43', 3, 5, '', 0, 37, 4, '0', 'venugopal,dsfsd,sdfsd,fsdfsdf,546456,3456765434,venugopal@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 456, '0.00', '336.00', '', ''),
(96, 'ORDER1006', 220, 172, 40, 1, 1, '40.00', '0.00', '0.00', '2018-01-09 19:38:28', 3, 1, '', 0, 11, 11, '10', 'venugopal,rwer,34,3423,4234,3456765434,venugopal@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 50, '0.50', '49.50', '', ''),
(97, 'ORDER1007', 220, 173, 80, 1, 1, '80.00', '1.00', '0.80', '2018-01-09 20:09:51', 3, 1, '', 0, 0, 7, '1', 'venugopal,l;\'l,l;\',8978,987978,3456765434,venugopal@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 100, '0.82', '80.98', '', ''),
(98, 'ORDER1007', 220, 173, 80, 1, 1, '80.00', '1.00', '0.80', '2018-01-09 20:09:51', 3, 1, '', 0, 8, 7, '1', 'venugopal,l;\'l,l;\',8978,987978,3456765434,venugopal@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 100, '0.82', '80.98', '', ''),
(99, 'ORDER1008', 201, 30, 2500, 2, 5, '12500.00', '0.00', '0.00', '2018-01-09 22:33:18', 3, 1, '', 0, 0, 0, '0', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,Lahore,Italy', 58, '0', '0', '0', '0', '0', 0, 5200, '2625.00', '9875.00', '', ''),
(100, 'ORDER1009', 206, 167, 300, 1, 1, '300.00', '12.00', '36.00', '2018-01-09 22:59:49', 3, 5, '', 0, 47, 5, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 456, '0.00', '336.00', '', ''),
(101, 'ORDER1009', 206, 27, 620, 2, 1, '620.00', '2.00', '12.40', '2018-01-09 22:59:49', 3, 1, '', 0, 0, 0, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 750, '0.00', '632.40', '', ''),
(102, 'ORDER1009', 206, 21, 100000000, 2, 1, '99999999.99', '99.00', '99000000.00', '2018-01-09 22:59:49', 3, 1, '', 0, 0, 0, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 1000000000, '1990000.00', '99999999.99', '', ''),
(103, 'ORDER1010', 201, 31, 250, 2, 5, '1250.00', '2.00', '25.00', '2018-01-10 01:37:38', 3, 1, '', 0, 0, 0, '115', 'suganya,cbe,cbe,tn,123456,8012122975,suganya@pofitec.com,Lahore,Italy', 58, '0', '0', '0', '0', '0', 0, 520, '291.90', '1098.10', '', ''),
(104, 'ORDER1011', 212, 173, 80, 1, 2, '160.00', '1.00', '1.60', '2018-01-10 01:45:46', 3, 1, '', 0, 5, 5, '2', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,bala@gmail.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 100, '1.64', '161.96', '', ''),
(105, 'ORDER1012', 212, 167, 300, 1, 2, '600.00', '12.00', '72.00', '2018-01-10 01:50:55', 3, 5, '', 0, 47, 5, '0', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,bala@gmail.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 456, '0.00', '672.00', '', ''),
(106, 'ORDER1013', 212, 173, 80, 1, 1, '80.00', '1.00', '0.80', '2018-01-10 01:54:09', 3, 1, '', 0, 8, 4, '1', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,bala@gmail.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 100, '0.82', '80.98', '', ''),
(107, 'ORDER1014', 212, 173, 80, 1, 1, '80.00', '1.00', '0.80', '2018-01-10 01:57:36', 3, 1, '', 0, 8, 5, '1', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,bala@gmail.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 100, '0.82', '80.98', '', ''),
(108, 'ORDER1015', 212, 173, 80, 1, 1, '80.00', '1.00', '0.80', '2018-01-11 04:44:35', 3, 5, '', 0, 8, 5, '1', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,bala@gmail.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 100, '0.82', '80.98', '', ''),
(109, 'ORDER1016', 201, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-11 04:46:36', 3, 1, '', 0, 20, 4, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(110, 'ORDER1017', 212, 26, 22000, 2, 1, '22000.00', '0.00', '0.00', '2018-01-11 04:56:19', 3, 1, '', 0, 0, 0, '500', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,bala@gmail.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 25000, '0.00', '22500.00', '', ''),
(111, 'ORDER1018', 212, 27, 620, 2, 1, '620.00', '2.00', '12.40', '2018-01-11 05:09:47', 3, 1, '', 0, 0, 0, '0', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,balamurugan@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 750, '0.00', '632.40', '', ''),
(112, 'ORDER1019', 212, 26, 22000, 2, 1, '22000.00', '0.00', '0.00', '2018-01-11 05:12:20', 3, 1, '', 0, 0, 0, '500', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,balamurugan@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 25000, '0.00', '22500.00', '', ''),
(113, 'ORDER1020', 212, 172, 40, 1, 1, '40.00', '0.00', '0.00', '2018-01-11 05:21:55', 3, 1, '', 0, 10, 9, '10', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,balamurugan@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 50, '0.50', '49.50', '', ''),
(114, 'ORDER1021', 212, 168, 350, 1, 1, '350.00', '0.00', '0.00', '2018-01-11 05:48:38', 3, 1, '', 0, 18, 18, '0', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,balamurugan@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 450, '0.00', '350.00', '', ''),
(115, 'ORDER1022', 220, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-11 06:35:59', 3, 1, '', 0, 20, 4, '5', 'venugopal_shipping name,shipping adress 1,shipping adress2,shipping state,111111,0000000000,shippingID@pofitec.com,shipping city,shipping country', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(116, 'ORDER1023', 220, 27, 620, 2, 1, '620.00', '2.00', '12.40', '2018-01-11 06:41:09', 3, 1, '', 0, 0, 0, '0', 'venugopal_shippin,shipping adress  Line1,shipping Address Line2,shipping state,333333,2222222222,shippingvenugopal@pofitec.com,Coimbatore,shipping  India', 68, '0', '0', '0', '0', '0', 0, 750, '0.00', '632.40', '', ''),
(117, 'ORDER1024', 220, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-10 19:56:29', 3, 1, '', 0, 20, 4, '5', 'venugopal_s,gfh,gfh,gf,123456,3456765434,venugopal@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(118, 'ORDER1025', 232, 167, 300, 1, 1, '300.00', '12.00', '36.00', '2018-01-10 21:17:25', 3, 1, '', 0, 47, 4, '0', 'qwerty,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 456, '0.00', '336.00', '', ''),
(119, 'ORDER1026', 232, 164, 30000, 1, 1, '30000.00', '10.00', '3000.00', '2018-01-10 21:22:29', 3, 1, '', 0, 47, 4, '1200', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,etrhgfh,123456,7418529635,suganya.t@pofitec.com,werewtre,tyrytjhg', 62, '0', '0', '0', '0', '0', 0, 90000, '342.00', '33858.00', '', ''),
(120, 'ORDER1026', 232, 172, 40, 1, 1, '40.00', '0.00', '0.00', '2018-01-10 21:22:29', 3, 1, '', 0, 11, 9, '10', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,etrhgfh,123456,7418529635,suganya.t@pofitec.com,werewtre,tyrytjhg', 62, '0', '0', '0', '0', '0', 0, 50, '0.50', '49.50', '', ''),
(121, 'ORDER1027', 232, 138, 8500, 1, 1, '8500.00', '10.00', '850.00', '2018-01-10 21:43:49', 3, 1, '', 0, 10, 5, '150', 'users,wadsedfggh,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 9000, '950.00', '8550.00', '', ''),
(122, 'ORDER1028', 232, 138, 8500, 1, 1, '8500.00', '10.00', '850.00', '2018-01-10 21:54:11', 3, 1, '', 0, 10, 5, '150', 'users,rtryuy57,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 9000, '950.00', '8550.00', '', ''),
(123, 'ORDER1029', 212, 174, 1, 1, 2, '2.00', '12.00', '0.24', '2018-01-11 00:59:12', 3, 1, '', 0, 0, 4, '0', 'bala,gandhipuram,Bus stand,tn,640122,0123456789,bala@gmail.com,1,1', 60, '0', '0', '0', '0', '0', 0, 12, '0.22', '2.02', '', ''),
(124, 'ORDER1030', 212, 27, 620, 2, 2, '1240.00', '2.00', '24.80', '2018-01-11 01:11:41', 3, 1, '', 0, 0, 0, '0', 'bala,gandhipuram,Bus stand,tn,640122,0123456789,balamurugan@pofitec.com,12,1', 68, '0', '0', '0', '0', '0', 0, 750, '0.00', '1264.80', '', ''),
(125, 'ORDER1031', 212, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-11 01:15:55', 3, 1, '', 0, 15, 5, '5', 'bala,gandhipuram,Bus stand,tn,640122,0123456789,balamurugan@pofitec.com,22,7', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(126, 'ORDER1032', 212, 174, 1, 1, 1, '1.00', '12.00', '0.12', '2018-01-11 01:32:13', 3, 1, '', 0, 0, 4, '0', 'bala,gandhipuram,Bus stand,tn,640122,9874569856,balamurugan@pofitec.com,18,8', 60, '0', '0', '0', '0', '0', 0, 12, '0.11', '1.01', '', ''),
(127, 'ORDER1033', 212, 168, 350, 1, 1, '350.00', '0.00', '0.00', '2018-01-11 02:03:51', 3, 1, '', 0, 13, 18, '0', 'bala,gandhipuram,Bus stand,tn,640122,9874569856,balamurugan@pofitec.com,1,1', 68, '0', '0', '0', '0', '0', 0, 450, '0.00', '350.00', '', ''),
(128, 'ORDER1034', 232, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-12 04:09:41', 3, 1, '', 0, 20, 4, '5', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,14,1', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(129, 'ORDER1035', 214, 174, 1, 1, 1, '1.00', '12.00', '0.12', '2018-01-12 05:01:39', 3, 1, '', 0, 0, 4, '0', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu1@pofitec.com,14,1', 60, '0', '0', '0', '0', '0', 0, 12, '0.11', '1.01', '', ''),
(130, 'ORDER1036', 214, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-12 05:21:27', 3, 1, '', 0, 20, 4, '5', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,14,1', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(131, 'ORDER1037', 232, 174, 1, 1, 2, '2.00', '12.00', '0.24', '2018-01-12 06:13:59', 3, 1, '', 0, 0, 4, '0', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,Indira,India', 60, '0', '0', '0', '0', '0', 0, 12, '0.22', '2.02', '', ''),
(132, 'ORDER1037', 232, 138, 8500, 1, 1, '8500.00', '10.00', '850.00', '2018-01-12 06:13:59', 3, 1, '', 0, 10, 5, '150', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,Indira,India', 60, '0', '0', '0', '0', '0', 0, 9000, '950.00', '8550.00', '', ''),
(133, 'ORDER1038', 232, 172, 40, 1, 1, '40.00', '0.00', '0.00', '2018-01-12 06:26:52', 3, 1, '', 0, 11, 9, '10', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,,United States of America', 62, '0', '0', '0', '0', '0', 0, 50, '0.50', '49.50', '', ''),
(134, 'ORDER1039', 232, 164, 30000, 1, 1, '30000.00', '10.00', '3000.00', '2018-01-12 06:46:17', 3, 1, '', 0, 11, 4, '1200', 'dsfds,fggfh,fdgfg,fdh,342353,43254365656545,reg@dfd.cvc,0,0', 62, '0', '0', '0', '0', '0', 0, 90000, '342.00', '33858.00', '', ''),
(135, 'ORDER1040', 232, 174, 1, 1, 1, '1.00', '12.00', '0.12', '2018-01-12 06:54:12', 3, 1, '', 0, 0, 4, '0', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,0,0', 60, '0', '0', '0', '0', '0', 0, 12, '0.11', '1.01', '', ''),
(136, 'ORDER1041', 232, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-12 06:55:24', 3, 1, '', 0, 20, 4, '5', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,0,0', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(137, 'ORDER1042', 232, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-12 06:57:19', 3, 1, '', 0, 20, 4, '5', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,0,0', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(138, 'ORDER1043', 232, 172, 40, 1, 1, '40.00', '0.00', '0.00', '2018-01-12 07:02:39', 3, 1, '', 0, 11, 11, '10', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,salem ,United States of America', 62, '0', '0', '0', '0', '0', 0, 50, '0.50', '49.50', '', ''),
(139, 'ORDER1044', 232, 168, 350, 1, 1, '350.00', '0.00', '0.00', '2018-01-12 07:03:15', 3, 1, '', 0, 13, 17, '0', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,salem ,United States of America', 68, '0', '0', '0', '0', '0', 0, 450, '0.00', '350.00', '', ''),
(140, 'ORDER1045', 232, 138, 8500, 1, 1, '8500.00', '10.00', '850.00', '2018-01-12 07:06:46', 3, 1, '', 0, 10, 5, '150', 'users,rgrd,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,0,0', 60, '0', '0', '0', '0', '0', 0, 9000, '950.00', '8550.00', '', ''),
(141, 'ORDER1046', 232, 174, 1, 1, 1, '1.00', '12.00', '0.12', '2018-01-12 07:08:40', 3, 1, '', 0, 0, 4, '0', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,0,0', 60, '0', '0', '0', '0', '0', 0, 12, '0.11', '1.01', '', ''),
(142, 'ORDER1047', 232, 24, 42229, 2, 1, '42229.00', '5.00', '2111.45', '2018-01-12 07:10:47', 3, 1, '', 0, 0, 0, '0', 'sfdsf,fdgdhfd,gfdg,dfdsg,654657,354365464,dsfg@gf.cvv,,India', 68, '0', '0', '0', '0', '0', 0, 43399, '0.00', '44340.45', '', ''),
(143, 'ORDER1515760977143', 232, 168, 350, 1, 1, '350.00', '0.00', '0.00', '2018-01-12 00:42:57', 3, 1, '', 0, 13, 18, '0', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 450, '0.00', '350.00', '', ''),
(144, 'ORDER1515760977144', 232, 26, 22000, 2, 1, '22000.00', '0.00', '0.00', '2018-01-12 00:42:57', 3, 1, '', 0, 0, 0, '500', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 25000, '0.00', '22500.00', '', ''),
(145, 'ORDER1515761002145', 214, 174, 1, 1, 1, '1.00', '12.00', '0.12', '2018-01-12 00:43:22', 3, 1, '', 0, 0, 4, '0', 'vinod babu,fasdasdgfh,asdsafgdfg,Test statwew,123456,4244114321312543543545435,vinodbabu@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 12, '0.11', '1.01', '', ''),
(146, 'ORDER1515761158146', 232, 26, 22000, 2, 1, '22000.00', '0.00', '0.00', '2018-01-12 00:45:58', 3, 1, '', 0, 0, 0, '500', 'users,asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS,cbe,ertrd,123456,7418529635,suganya.t@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 25000, '0.00', '22500.00', '', ''),
(147, 'ORDER1515761998147', 201, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-12 00:59:57', 3, 1, '', 0, 20, 4, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(148, 'ORDER1515819755148', 201, 44, 11, 1, 1, '11.00', '0.00', '0.00', '2018-01-13 05:02:35', 3, 1, '', 0, 0, 14, '0', 'suganya,cbe,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 41, '0', '0', '0', '0', '0', 0, 23, '0.55', '10.45', '', ''),
(149, 'ORDER1515820016149', 201, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-13 05:06:56', 3, 1, '', 0, 20, 5, '5', 'suganya,cbe,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(150, 'ORDER1515846047150', 249, 21, 100000000, 2, 1, '99999999.99', '99.00', '99000000.00', '2018-01-13 00:20:47', 3, 1, '', 0, 0, 0, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulaero@gmail.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 1000000000, '1990000.00', '99999999.99', '', ''),
(151, 'ORDER1515846205151', 249, 160, 85001, 1, 1, '85001.00', '5.00', '4250.05', '2018-01-13 00:23:25', 3, 5, '', 0, 0, 14, '40', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 90001, '4464.55', '84826.50', '', ''),
(152, 'ORDER1515846895152', 249, 160, 85001, 1, 1, '85001.00', '5.00', '4250.05', '2018-01-13 00:34:54', 3, 5, '', 0, 0, 14, '40', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulaero@gmail.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 90001, '4464.55', '84826.50', '', ''),
(153, 'ORDER1515846987153', 249, 160, 85001, 1, 1, '85001.00', '5.00', '4250.05', '2018-01-13 00:36:27', 3, 5, '', 0, 0, 14, '40', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 90001, '4464.55', '84826.50', '', ''),
(154, 'ORDER1515847427154', 249, 160, 85001, 1, 1, '85001.00', '5.00', '4250.05', '2018-01-13 00:43:47', 3, 5, '', 0, 0, 14, '40', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 90001, '4464.55', '84826.50', '', ''),
(155, 'ORDER1515848274155', 249, 176, 1000, 1, 1, '1000.00', '0.00', '0.00', '2018-01-13 00:57:54', 3, 1, '', 0, 0, 14, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 1500, '100.00', '900.00', '', ''),
(156, 'ORDER1515851015156', 249, 176, 1000, 1, 1, '1000.00', '0.00', '0.00', '2018-01-13 01:43:35', 3, 5, '', 0, 0, 14, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulaero@gmail.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 1500, '100.00', '900.00', '', ''),
(157, '', 201, 44, 11, 1, 1, '11.00', '0.00', '0.00', '2018-01-16 04:17:56', 3, 1, '', 0, 0, 14, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 23, '0.55', '10.45', '', ''),
(158, 'ORDER1516076276158', 201, 160, 85001, 1, 1, '85001.00', '5.00', '4250.05', '2018-01-16 04:17:56', 3, 5, '', 0, 0, 14, '40', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 90001, '4464.55', '84826.50', '', ''),
(159, '', 201, 35, 5, 1, 1, '5.00', '4.00', '0.20', '2018-01-16 04:23:29', 3, 1, '', 0, 23, 0, '4', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 555, '0.46', '8.74', '', ''),
(160, 'ORDER1516076610160', 201, 27, 620, 2, 1, '620.00', '2.00', '12.40', '2018-01-16 04:23:29', 3, 1, '', 0, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 750, '25.30', '607.10', '', ''),
(161, 'ORDER1516077358161', 250, 176, 1000, 1, 1, '1000.00', '0.00', '0.00', '2018-01-16 04:35:58', 3, 1, '', 0, 0, 14, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 1500, '100.00', '900.00', '', ''),
(162, '', 201, 172, 40, 1, 1, '40.00', '0.00', '0.00', '2018-01-16 04:47:19', 3, 5, '', 0, 11, 9, '10', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 62, '0', '0', '0', '0', '0', 0, 50, '0.50', '49.50', '', ''),
(163, 'ORDER1516078039163', 201, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2018-01-16 04:47:19', 3, 6, '', 0, 24, 14, '5', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(164, 'ORDER1516078628164', 250, 27, 620, 2, 1, '620.00', '2.00', '12.40', '2018-01-16 04:57:08', 3, 1, '', 0, 0, 0, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 750, '25.30', '607.10', '', ''),
(165, 'ORDER1516083178166', 201, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2018-01-16 06:12:57', 3, 6, '', 0, 24, 14, '5', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(166, 'ORDER1516083178166', 201, 33, 45, 2, 1, '45.00', '10.00', '4.50', '2018-01-16 06:12:57', 1, 4, '', 0, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 41, '0', '0', '0', '0', '0', 0, 56, '2.48', '47.03', '', ''),
(167, 'ORDER1516084251168', 214, 174, 1, 1, 1, '1.00', '0.00', '0.00', '2018-01-16 06:30:51', 3, 1, '', 0, 0, 4, '0', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, 12, '0.10', '0.90', '', ''),
(168, 'ORDER1516084251168', 214, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-16 06:30:51', 3, 1, '', 0, 20, 4, '5', 'vinod babu d gdf,fasdasdgfh fh,asdsafgdfgfghf,Test state21,123456,4244114321312543543545435,vinodbabu@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(169, 'ORDER1516087066170', 220, 35, 5, 1, 1, '5.00', '4.00', '0.20', '2018-01-16 07:17:45', 3, 1, '', 0, 23, 0, '4', 'venugopal,ytrytry,tryrty,Tytramil NAduy,645645,3456765434,venugopal@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 555, '0.46', '8.74', '', ''),
(170, 'ORDER1516087066170', 220, 34, 23, 2, 1, '23.00', '44.00', '10.12', '2018-01-16 07:17:45', 3, 1, '', 0, 0, 0, '0', 'venugopal,ytrytry,tryrty,Tytramil NAduy,645645,3456765434,venugopal@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 24, '1.66', '31.46', '', ''),
(171, 'ORDER1516087172171', 220, 35, 5, 1, 1, '5.00', '4.00', '0.20', '2018-01-16 07:19:32', 3, 1, '', 0, 23, 0, '4', 'venugopal,ghgfh,gfhgf,fghfg,56456,3456765434,venugopal@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 555, '0.46', '8.74', '', ''),
(172, 'ORDER1516087619172', 220, 174, 1, 1, 1, '1.00', '0.00', '0.00', '2018-01-16 07:26:59', 3, 1, '', 0, 0, 12, '0', 'venugopal,ghjghj,bnmngh,ghjghj,765756,3456765434,venugopal@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 12, '0.10', '0.90', '', ''),
(173, 'ORDER1516095162173', 212, 173, 80, 1, 2, '160.00', '1.00', '1.60', '2018-01-15 21:32:42', 3, 1, '', 0, 5, 4, '0', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,bala@gmail.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 100, '1.62', '159.98', '', ''),
(174, 'ORDER1516095238174', 220, 177, 11200, 1, 1, '11200.00', '2.00', '224.00', '2018-01-15 21:33:58', 3, 1, '', 0, 25, 14, '0', 'venugopal,hjghj,fdgdfg,dfgdfg,123123,3456765434,venugopal@pofitec.com,Coimbatore,India', 67, '0', '0', '0', '0', '0', 0, 13399, '1142.40', '10281.60', '', ''),
(175, 'ORDER1516095421175', 220, 177, 11200, 1, 1, '11200.00', '2.00', '224.00', '2018-01-15 21:37:01', 3, 1, '', 0, 11, 14, '0', 'venugopal,ghgfhgh,bnmnj,tytyu,67567,3456765434,venugopal@pofitec.com,Coimbatore,India', 67, '0', '0', '0', '0', '0', 0, 13399, '1142.40', '10281.60', '', ''),
(176, 'ORDER1516096160176', 212, 173, 80, 1, 1, '80.00', '2.00', '1.60', '2018-01-15 21:49:19', 3, 1, '', 0, 5, 7, '0', 'bala,Ram nagar,ramnagar,Tamil Nadu,634217,9874569856,balamurugan@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 100, '0.82', '80.78', '', ''),
(177, 'ORDER1516096814177', 220, 177, 11200, 1, 1, '11200.00', '2.00', '224.00', '2018-01-15 22:00:14', 3, 1, '', 0, 25, 14, '0', 'venugopal,ghjghj,tytry,hgjhgh,123456,3456765434,venugopal@pofitec.com,Coimbatore,India', 67, '0', '0', '0', '0', '0', 0, 13399, '1142.40', '10281.60', '', ''),
(178, 'ORDER1516097078178', 220, 177, 11200, 1, 1, '11200.00', '2.00', '224.00', '2018-01-15 22:04:38', 3, 1, '', 0, 25, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 67, '0', '0', '0', '0', '0', 0, 13399, '1142.40', '10281.60', '', ''),
(179, 'ORDER1516097173179', 220, 177, 11200, 1, 1, '11200.00', '2.00', '224.00', '2018-01-15 22:06:13', 3, 1, '', 0, 25, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 67, '0', '0', '0', '0', '0', 0, 13399, '1142.40', '10281.60', '', ''),
(180, 'ORDER1516104627181', 250, 21, 100000000, 2, 2, '99999999.99', '99.00', '99999999.99', '2018-01-16 00:10:26', 3, 1, '', 0, 0, 0, '0', 'ragul,,coimbatore,tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 1000000000, '3980000.00', '99999999.99', '', ''),
(181, 'ORDER1516104627181', 250, 35, 999, 2, 1, '999.00', '5.00', '49.95', '2018-01-16 00:10:26', 3, 1, '', 0, 0, 0, '0', 'ragul,,coimbatore,tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 1200, '41.96', '1006.99', '', ''),
(182, 'ORDER1516104669183', 250, 21, 100000000, 2, 1, '99999999.99', '99.00', '99000000.00', '2018-01-16 00:11:09', 3, 1, '', 0, 0, 0, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 1000000000, '1990000.00', '99999999.99', '', ''),
(183, 'ORDER1516104669183', 250, 35, 999, 2, 1, '999.00', '5.00', '49.95', '2018-01-16 00:11:09', 1, 4, '', 0, 0, 0, '0', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 1200, '41.96', '1006.99', '', ''),
(184, 'ORDER1516105593185', 201, 139, 8500, 1, 1, '8500.00', '5.00', '425.00', '2018-01-16 00:26:33', 3, 5, '', 0, 10, 5, '40', 'suganya,asdfgj,qwerty,tn,123456,8012122975,suganya.t@pofitec.com,vadavalli,United States of America', 67, '0', '0', '0', '0', '0', 0, 9000, '896.50', '8068.50', '', ''),
(185, 'ORDER1516105593185', 201, 160, 85001, 1, 1, '85001.00', '5.00', '4250.05', '2018-01-16 00:26:33', 3, 5, '', 0, 0, 14, '40', 'suganya,asdfgj,qwerty,tn,123456,8012122975,suganya.t@pofitec.com,vadavalli,United States of America', 41, '0', '0', '0', '0', '0', 0, 90001, '4464.55', '84826.50', '', ''),
(186, 'ORDER1516114272186', 250, 174, 1, 1, 1, '1.00', '0.00', '0.00', '2018-01-16 02:51:12', 3, 1, '', 0, 0, 8, '0', 'ragul,coimbatore,coimbatore,tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 12, '0.10', '0.90', '', ''),
(187, 'ORDER1516167174187', 201, 36, 10, 1, 1, '10.00', '5.00', '0.50', '2018-01-17 05:32:54', 3, 5, '', 0, 24, 14, '5', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 41, '0', '0', '0', '0', '0', 0, 1500, '0.78', '14.73', '', ''),
(188, 'ORDER1516169597190', 250, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-17 06:13:17', 3, 1, '', 0, 15, 8, '5', 'ragul,coimbatore,coimbatore,tamilnady,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(189, 'ORDER1516169597190', 250, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-17 06:13:17', 3, 1, '', 0, 20, 7, '5', 'ragul,coimbatore,coimbatore,tamilnady,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(190, 'ORDER1516169597190', 250, 174, 1, 1, 1, '1.00', '0.00', '0.00', '2018-01-17 06:13:17', 1, 4, '', 0, 0, 8, '0', 'ragul,coimbatore,coimbatore,tamilnady,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 12, '0.10', '0.90', '', ''),
(191, 'ORDER1516182147192', 201, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-01-16 21:42:27', 3, 1, '', 0, 20, 5, '5', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(192, 'ORDER1516182147192', 201, 33, 45, 2, 1, '45.00', '10.00', '4.50', '2018-01-16 21:42:27', 1, 10, '', 0, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 41, '0', '0', '0', '0', '0', 0, 56, '2.48', '47.03', '', ''),
(193, 'ORDER1516189815193', 201, 37, 250, 2, 1, '250.00', '0.00', '0.00', '2018-01-16 23:50:15', 3, 1, '', 0, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 58, '0', '0', '0', '0', '0', 0, 500, '52.50', '197.50', '', ''),
(194, 'ORDER1516192587194', 250, 180, 1805, 1, 1, '1805.00', '0.00', '0.00', '2018-01-17 00:36:27', 3, 1, '', 0, 8, 4, '60', 'ragul,coimbatore,coimbatore,Tamil Nadu,642356,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 2640, '74.60', '1790.40', '', ''),
(195, 'ORDER1516269124196', 250, 180, 1805, 1, 1, '1805.00', '0.00', '0.00', '2018-01-17 21:52:03', 3, 1, '', 0, 8, 4, '60', 'ragul,coimabatore,coimabatore,tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 2640, '74.60', '1790.40', '', ''),
(196, 'ORDER1516269124196', 250, 181, 750, 1, 1, '750.00', '3.00', '22.50', '2018-01-17 21:52:03', 3, 1, '', 0, 10, 8, '0', 'ragul,coimabatore,coimabatore,tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 800, '30.90', '741.60', '', ''),
(197, 'ORDER1516277128197', 250, 181, 750, 1, 1, '750.00', '3.00', '22.50', '2018-01-18 00:05:28', 3, 1, '', 0, 11, 4, '0', 'ragul,coimbatore,coimbatore,tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 800, '30.90', '741.60', '', ''),
(198, 'ORDER1516360022203', 250, 181, 750, 1, 1, '750.00', '3.00', '22.50', '2018-01-18 23:07:01', 3, 1, '', 0, 25, 8, '0', 'ragul,Coimbatore,Coimbatore,Tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 800, '30.90', '741.60', '', ''),
(199, 'ORDER1516360022203', 250, 176, 1000, 1, 1, '1000.00', '0.00', '0.00', '2018-01-18 23:07:01', 3, 1, '', 0, 0, 14, '0', 'ragul,Coimbatore,Coimbatore,Tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 1500, '100.00', '900.00', '', ''),
(200, 'ORDER1516360022203', 250, 181, 750, 1, 1, '750.00', '3.00', '22.50', '2018-01-18 23:07:01', 3, 1, '', 0, 19, 5, '0', 'ragul,Coimbatore,Coimbatore,Tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 800, '30.90', '741.60', '', ''),
(201, 'ORDER1516360022203', 250, 180, 1805, 1, 1, '1805.00', '0.00', '0.00', '2018-01-18 23:07:01', 3, 1, '', 0, 8, 4, '60', 'ragul,Coimbatore,Coimbatore,Tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 2640, '74.60', '1790.40', '', ''),
(202, 'ORDER1516360022203', 250, 27, 620, 2, 1, '620.00', '2.00', '12.40', '2018-01-18 23:07:01', 3, 1, '', 0, 0, 0, '0', 'ragul,Coimbatore,Coimbatore,Tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 750, '25.30', '607.10', '', ''),
(203, 'ORDER1516360022203', 250, 29, 250, 2, 1, '250.00', '2.00', '5.00', '2018-01-18 23:07:01', 3, 1, '', 0, 0, 0, '20', 'ragul,Coimbatore,Coimbatore,Tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 500, '27.50', '247.50', '', ''),
(204, 'ORDER1516960614204', 250, 27, 620, 2, 1, '620.00', '2.00', '12.40', '2018-01-25 21:56:53', 3, 1, '', 0, 0, 0, '0', 'ragul,Coimbatore,Coimbatore,Tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 750, '25.30', '607.10', '', ''),
(205, 'ORDER1516961277205', 250, 26, 22000, 2, 1, '22000.00', '0.00', '0.00', '2018-01-25 22:07:56', 3, 1, '', 0, 0, 0, '500', 'ragul,Coimbatore,Coimbatore,Tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 25000, '900.00', '21600.00', '', ''),
(206, 'ORDER1516961987206', 250, 27, 620, 2, 1, '620.00', '2.00', '12.40', '2018-01-25 22:19:47', 3, 6, '', 0, 0, 0, '0', 'ragul,Coimbatore,Coimbatore,Tamilnadu,641104,9944349002,ragulgandhi@pofitec.com,Coimbatore,India', 68, '0', '0', '0', '0', '0', 0, 750, '25.30', '607.10', '', ''),
(207, 'ORDER1517807871207', 229, 187, 5, 1, 1, '5.00', '0.00', '0.00', '2018-02-05 05:17:51', 3, 6, '', 0, 0, 15, '50', 'bala,ram nagar,Peelamedu,tamil nadu,634601,7418529635,balamurugan@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 10, '2.75', '52.25', '', '');
INSERT INTO `nm_ordercod` (`cod_id`, `cod_transaction_id`, `cod_cus_id`, `cod_pro_id`, `cod_prod_unitPrice`, `cod_order_type`, `cod_qty`, `cod_amt`, `cod_tax`, `cod_taxAmt`, `cod_date`, `cod_status`, `delivery_status`, `created_date`, `cod_paytype`, `cod_pro_color`, `cod_pro_size`, `cod_shipping_amt`, `cod_ship_addr`, `cod_merchant_id`, `coupon_code`, `coupon_type`, `coupon_amount_type`, `coupon_amount`, `coupon_total_amount`, `wallet_amount`, `cod_prod_actualprice`, `mer_commission_amt`, `mer_amt`, `tax_id_number`, `tax_type`) VALUES
(208, 'ORDER1517807965208', 229, 52, 500, 2, 1, '500.00', '2.00', '10.00', '2018-02-05 05:19:25', 1, 8, '', 0, 0, 0, '0', 'bala,ram nagar,Peelamedu,tamil nadu,634601,7418529635,balamurugan@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 1000, '51.00', '459.00', '', ''),
(209, 'ORDER1517808866209', 229, 174, 1, 1, 1, '1.00', '0.00', '0.00', '2018-02-05 05:34:26', 1, 8, '', 0, 0, 12, '0', 'bala,ram nagar,Peelamedu,tamil nadu,634601,7418529635,balamurugan@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 12, '0.10', '0.90', '', ''),
(210, 'ORDER1517809115210', 229, 162, 2, 1, 1, '2.00', '0.00', '0.00', '2018-02-05 05:38:35', 1, 8, '', 0, 6, 4, '0', 'bala,ram nagar,Peelamedu,tamil nadu,634601,7418529635,balamurugan@pofitec.com,Coimbatore,India', 41, '0', '0', '0', '0', '0', 0, 5, '0.10', '1.90', '', ''),
(211, 'ORDER1517825036211', 212, 52, 500, 2, 15, '7500.00', '2.00', '150.00', '2018-02-04 22:03:56', 1, 4, '', 0, 0, 0, '0', 'bala,Hopes,Peelamedu,tamil nadu,634601,9874569856,balamurugan@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 1000, '765.00', '6885.00', '', ''),
(212, 'ORDER1517825491212', 212, 54, 4000, 2, 3, '12000.00', '2.00', '240.00', '2018-02-04 22:11:31', 1, 10, '', 0, 0, 0, '150', 'bala,ram nagar,Peelamedu,tamil nadu,634601,9874569856,balamurugan@pofitec.com,Coimbatore,India', 77, '0', '0', '0', '0', '0', 0, 5000, '12266.10', '123.90', '', ''),
(213, 'ORDER1517831514213', 229, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-02-04 23:51:53', 3, 1, '', 0, 13, 7, '5', 'bala,ram nagar,Peelamedu,tamil nadu,634601,7418529635,balamurugan@pofitec.com,Coimbatore,India', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(214, 'ORDER1517835128214', 229, 52, 500, 2, 1, '500.00', '2.00', '10.00', '2018-02-05 00:52:08', 3, 6, '', 0, 0, 0, '0', 'bala,ram nagar,Peelamedu,tamil nadu,634601,7418529635,balamurugan@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 1000, '51.00', '459.00', '', ''),
(215, 'ORDER1517894784215', 229, 178, 23, 1, 4, '92.00', '0.00', '0.00', '2018-02-06 05:26:24', 3, 1, '', 0, 0, 14, '0', 'bala,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,Coimbatore,India', 58, '0', '0', '0', '0', '0', 0, 234, '19.32', '72.68', '', ''),
(216, 'ORDER1517895517216', 229, 51, 5000, 2, 3, '15000.00', '2.00', '300.00', '2018-02-06 05:38:37', 1, 10, '', 0, 0, 0, '0', 'bala,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 10000, '1530.00', '13770.00', '', ''),
(217, 'ORDER1517898034217', 201, 35, 5, 1, 1, '5.00', '4.00', '0.20', '2018-02-06 06:20:34', 3, 1, '', 0, 23, 0, '4', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 41, '0', '0', '0', '0', '0', 0, 555, '0.46', '8.74', '', ''),
(218, 'ORDER1517915909218', 253, 56, 1300, 2, 10, '13000.00', '0.00', '0.00', '2018-02-05 23:18:29', 1, 10, '', 0, 0, 0, '300', 'user,cbe,cbe,tn,123456,1234567895,user@gmail.com,Coimbatore,India', 90, '0', '0', '0', '0', '0', 0, 1500, '133.00', '13167.00', '', ''),
(219, 'ORDER1517916234219', 229, 196, 450, 1, 1, '450.00', '0.00', '0.00', '2018-02-05 23:23:54', 1, 8, '', 0, 18, 5, '30', 'bala,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,Coimbatore,India', 90, '0', '0', '0', '0', '0', 0, 500, '4.80', '475.20', '', ''),
(220, 'ORDER1517917355220', 229, 196, 450, 1, 1, '450.00', '0.00', '0.00', '2018-02-05 23:42:35', 3, 1, '', 0, 14, 5, '30', 'bala,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,Coimbatore,India', 90, '0', '0', '0', '0', '0', 0, 500, '4.80', '475.20', '', ''),
(221, 'ORDER1517990078221', 229, 196, 450, 1, 1, '450.00', '0.00', '0.00', '2018-02-06 19:54:38', 1, 10, '', 0, 18, 7, '30', 'bala,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,Coimbatore,India', 90, '0', '0', '0', '0', '0', 0, 500, '4.80', '475.20', '', ''),
(222, 'ORDER1517990184222', 229, 52, 500, 2, 1, '500.00', '2.00', '10.00', '2018-02-06 19:56:24', 3, 6, '', 0, 0, 0, '0', 'bala,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,Coimbatore,India', 60, '0', '0', '0', '0', '0', 0, 1000, '51.00', '459.00', '', ''),
(223, 'ORDER1518415103223', 201, 52, 500, 2, 3, '1500.00', '2.00', '30.00', '2018-02-12 05:58:23', 1, 8, '', 0, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 60, '0', '0', '0', '0', '0', 0, 1000, '153.00', '1377.00', '', ''),
(224, 'ORDER1518415193224', 201, 137, 7500, 1, 10, '75000.00', '0.00', '0.00', '2018-02-12 05:59:52', 3, 1, '', 0, 5, 4, '500', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 67, '0', '0', '0', '0', '0', 0, 8000, '7550.00', '67950.00', '', ''),
(225, 'ORDER1518583040225', 229, 162, 2, 1, 1, '2.00', '0.00', '0.00', '2018-02-14 04:37:20', 3, 1, '', 0, 16, 4, '0', 'balaa,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,peelamedu,India', 41, '0', '0', '0', '0', '0', 0, 5, '0.10', '1.90', '', ''),
(226, 'ORDER1518586299226', 229, 174, 1, 1, 1, '1.00', '0.00', '0.00', '2018-02-14 05:31:39', 3, 1, '', 0, 0, 12, '0', 'balaa,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,peelamedu,India', 60, '0', '0', '0', '0', '0', 0, 12, '0.10', '0.90', '', ''),
(227, 'ORDER1518586507227', 229, 35, 5, 1, 1, '5.00', '4.00', '0.20', '2018-02-14 05:35:07', 3, 5, '', 0, 23, 0, '4', 'balaa,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,peelamedu,India', 41, '0', '0', '0', '0', '0', 0, 555, '0.46', '8.74', '', ''),
(228, 'ORDER1518595915228', 229, 174, 1, 1, 1, '1.00', '0.00', '0.00', '2018-02-13 20:11:55', 3, 1, '', 0, 0, 8, '0', 'balaa,Hope,Peelamedu,tn,637020,7418529635,balamurugan@pofitec.com,peelamedu,India', 60, '0', '0', '0', '0', '0', 0, 12, '0.10', '0.90', '', ''),
(229, 'ORDER1518687054229', 229, 161, 1, 1, 1, '1.00', '3.00', '0.03', '2018-02-14 21:30:53', 3, 1, '', 0, 21, 4, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 58, '0', '0', '0', '0', '0', 0, 2, '0.22', '0.81', '', ''),
(230, 'ORDER1518873841230', 229, 51, 5000, 2, 1, '5000.00', '2.00', '100.00', '2018-02-17 01:24:01', 3, 6, '', 0, 0, 0, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 60, '0', '0', '0', '0', '0', 0, 10000, '510.00', '4590.00', '', ''),
(231, 'ORDER1519387550232', 220, 99, 100, 1, 5, '500.00', '0.00', '0.00', '2018-02-23 00:05:49', 3, 1, '', 0, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, 300, '5.00', '495.00', '', ''),
(232, 'ORDER1519387550232', 220, 161, 1, 1, 5, '5.00', '3.00', '0.15', '2018-02-23 00:05:49', 3, 1, '', 0, 21, 4, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 58, '0', '0', '0', '0', '0', 0, 2, '1.08', '4.07', '', ''),
(233, 'ORDER1519387672233', 220, 58, 7500, 1, 1, '7500.00', '0.00', '0.00', '2018-02-23 00:07:52', 3, 1, '', 0, 5, 4, '50', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 58, '0', '0', '0', '0', '0', 0, 8000, '1585.50', '5964.50', '', ''),
(234, 'ORDER1519732831234', 220, 170, 5, 1, 1, '5.00', '2.00', '0.10', '2018-02-27 00:00:31', 3, 1, '', 0, 20, 4, '5', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, 10, '0.10', '10.00', '', ''),
(235, 'ORDER1519732929235', 220, 95, 100, 1, 1, '100.00', '0.00', '0.00', '2018-02-27 00:02:09', 3, 1, '', 0, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,456345,3456765434,venugopal@pofitec.com,Lahore,India', 58, '0', '0', '0', '0', '0', 0, 500, '21.00', '79.00', '', ''),
(236, 'ORDER1519733205236', 220, 172, 40, 1, 1, '40.00', '0.00', '0.00', '2018-02-27 00:06:45', 3, 1, '', 0, 11, 9, '10', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, 50, '0.50', '49.50', '', ''),
(237, 'ORDER1519733350237', 220, 171, 60, 1, 1, '60.00', '0.00', '0.00', '2018-02-27 00:09:10', 3, 1, '', 0, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, 80, '6.00', '54.00', '', ''),
(238, 'ORDER1519733461238', 220, 171, 60, 1, 1, '60.00', '0.00', '0.00', '2018-02-27 00:11:00', 3, 1, '', 0, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, 80, '6.00', '54.00', '', ''),
(239, 'ORDER1519733550239', 220, 47, 7502, 1, 1, '7502.00', '0.00', '0.00', '2018-02-27 00:12:30', 3, 1, '', 0, 5, 4, '52', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, 8002, '75.54', '7478.46', '', ''),
(240, 'ORDER1519733610240', 220, 47, 7502, 1, 1, '7502.00', '0.00', '0.00', '2018-02-27 00:13:29', 3, 1, '', 0, 5, 4, '52', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, 8002, '75.54', '7478.46', '', ''),
(241, 'ORDER1519733796241', 220, 171, 60, 1, 1, '60.00', '0.00', '0.00', '2018-02-27 00:16:36', 3, 1, '', 0, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, 80, '6.00', '54.00', '', ''),
(242, 'ORDER1519739165242', 229, 189, 800, 1, 2, '1600.00', '3.00', '48.00', '2018-02-27 01:46:04', 3, 1, '', 0, 8, 4, '40', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 58, '0', '0', '0', '0', '0', 0, 1000, '354.48', '1333.52', '', ''),
(243, 'ORDER1519739939243', 229, 61, 400, 2, 2, '800.00', '0.00', '0.00', '2018-02-27 01:58:59', 1, 4, '', 0, 0, 0, '60', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 58, '0', '0', '0', '0', '0', 0, 500, '180.60', '679.40', '', ''),
(244, 'ORDER1519740136244', 229, 189, 800, 1, 1, '800.00', '3.00', '24.00', '2018-02-27 02:02:15', 3, 1, '', 0, 8, 4, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 58, '0', '0', '0', '0', '0', 0, 1000, '173.04', '650.96', '', ''),
(245, 'ORDER1519969592245', 229, 193, 40, 1, 1, '40.00', '0.00', '0.00', '2018-03-02 05:46:32', 3, 1, '', 0, 0, 14, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, 100, '0.40', '39.60', '', ''),
(246, 'ORDER1519997476246', 229, 177, 11200, 1, 1, '11200.00', '2.00', '224.00', '2018-03-02 01:31:15', 3, 1, '', 0, 11, 14, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 67, '0', '0', '0', '0', '0', 0, 13399, '1142.40', '10281.60', '', ''),
(247, 'ORDER1519998023247', 229, 171, 60, 1, 1, '60.00', '0.00', '0.00', '2018-03-02 01:40:22', 3, 1, '', 0, 0, 14, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 60, '0', '0', '0', '0', '0', 0, 80, '6.00', '54.00', '', ''),
(248, 'ORDER1520062842248', 229, 180, 1805, 1, 1, '1805.00', '0.00', '0.00', '2018-03-02 19:40:42', 3, 1, '', 0, 0, 0, '60', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 68, '0', '0', '0', '0', '0', 0, 2640, '74.60', '1790.40', '', ''),
(249, 'ORDER1520070131249', 229, 47, 7502, 1, 1, '7502.00', '0.00', '0.00', '2018-03-02 21:42:11', 3, 1, '', 0, 5, 4, '52', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 62, '0', '0', '0', '0', '0', 0, 8002, '75.54', '7478.46', '', ''),
(250, 'ORDER1520224766250', 229, 180, 1805, 1, 1, '1805.00', '0.00', '0.00', '2018-03-05 04:39:26', 3, 1, '', 0, 0, 0, '60', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 68, '0', '0', '0', '0', '0', 0, 2640, '74.60', '1790.40', '', ''),
(251, 'ORDER1520243378253', 220, 171, 60, 1, 1, '60.00', '0.00', '0.00', '2018-03-04 21:49:37', 3, 1, '', 0, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, 80, '0.00', '0.00', '', ''),
(252, 'ORDER1520243378253', 220, 183, 5, 1, 1, '5.00', '0.00', '0.00', '2018-03-04 21:49:37', 3, 1, '', 0, 37, 4, '50', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 41, '0', '0', '0', '0', '0', 0, 10, '0.00', '0.00', '', ''),
(253, 'ORDER1520243378253', 220, 51, 50, 2, 1, '50.00', '2.00', '1.00', '2018-03-04 21:49:37', 3, 1, '', 0, 0, 0, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, 10000, '0.00', '0.00', '', ''),
(254, 'ORDER1520243882256', 220, 171, 60, 1, 1, '60.00', '0.00', '0.00', '2018-03-04 21:58:01', 3, 1, '', 0, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, 80, '0.00', '0.00', '', ''),
(255, 'ORDER1520243882256', 220, 183, 5, 1, 1, '5.00', '0.00', '0.00', '2018-03-04 21:58:01', 3, 1, '', 0, 37, 4, '50', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 41, '0', '0', '0', '0', '0', 0, 10, '0.00', '0.00', '', ''),
(256, 'ORDER1520243882256', 220, 51, 50, 2, 1, '50.00', '2.00', '1.00', '2018-03-04 21:58:01', 3, 1, '', 0, 0, 0, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, 10000, '0.00', '0.00', '', ''),
(257, 'ORDER1520247893257', 220, 61, 40, 2, 2, '80.00', '0.00', '0.00', '2018-03-04 23:04:52', 3, 1, '', 0, 0, 0, '60', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, 500, '0.00', '0.00', '', ''),
(258, 'ORDER1520248162259', 220, 161, 3, 1, 2, '6.00', '0.00', '0.00', '2018-03-04 23:09:21', 3, 1, '', 0, 0, 4, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, 36, '0.00', '0.00', '', ''),
(259, 'ORDER1520248162259', 220, 52, 500, 2, 1, '500.00', '2.00', '10.00', '2018-03-04 23:09:21', 3, 1, '', 0, 0, 0, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, 1000, '0.00', '0.00', 'SADSADQE34', 'TIN'),
(260, 'ORDER1520314223260', 220, 194, 60, 1, 1, '60.00', '0.00', '0.00', '2018-03-06 05:30:23', 3, 1, '', 0, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, 100, '0.00', '0.00', '22222222', 'GST'),
(261, 'ORDER1520320113261', 220, 161, 3, 1, 1, '3.00', '0.00', '0.00', '2018-03-06 07:08:32', 3, 1, '', 0, 0, 4, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, 36, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(262, 'ORDER1520321127262', 201, 171, 60, 1, 1, '60.00', '0.00', '0.00', '2018-03-06 07:25:27', 3, 1, '', 0, 0, 14, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 80, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(263, 'ORDER1520321271263', 201, 137, 7500, 1, 1, '7500.00', '0.00', '0.00', '2018-03-06 07:27:51', 3, 1, '', 0, 5, 4, '50', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 8000, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(264, 'ORDER1520321980264', 201, 185, 5, 1, 1, '5.00', '0.00', '0.00', '2018-03-05 19:39:40', 3, 1, '', 0, 5, 4, '50', 'suganya,dfd,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 10, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(265, 'ORDER1520338966265', 201, 189, 800, 1, 3, '2400.00', '3.00', '72.00', '2018-03-06 00:22:45', 3, 1, '', 0, 8, 4, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, 'LyDGsECzKv', 'productcoupon', '1', '30', '2370', 0, 1000, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(266, 'ORDER1520407700266', 220, 51, 50, 2, 2, '100.00', '2.00', '2.00', '2018-03-07 07:28:19', 3, 1, '', 0, 0, 0, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, 10000, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(267, 'ORDER1520414332267', 201, 67, 800, 2, 5, '4000.00', '2.00', '80.00', '2018-03-06 21:18:52', 3, 1, '', 0, 0, 0, '100', 'suganya,cbe,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 1000, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(268, 'ORDER1520414341268', 201, 67, 800, 2, 5, '4000.00', '2.00', '80.00', '2018-03-06 21:19:01', 3, 1, '', 0, 0, 0, '100', 'suganya,cbe,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 1000, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(269, 'ORDER1520415903269', 201, 51, 50, 2, 1, '50.00', '2.00', '1.00', '2018-03-06 21:45:03', 3, 1, '', 0, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 10000, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(270, 'ORDER1520416045270', 201, 51, 50, 2, 1, '50.00', '2.00', '1.00', '2018-03-06 21:47:25', 3, 1, '', 0, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 10000, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(271, 'ORDER1520416376271', 201, 51, 50, 2, 1, '50.00', '2.00', '1.00', '2018-03-06 21:52:56', 3, 1, '', 0, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 10000, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(272, 'ORDER1520419131272', 201, 59, 454, 2, 1, '454.00', '0.00', '0.00', '2018-03-06 22:38:51', 3, 5, '', 0, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 455, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(273, 'ORDER1520419213273', 201, 59, 454, 2, 1, '454.00', '0.00', '0.00', '2018-03-06 22:40:13', 3, 5, '', 0, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 455, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(274, 'ORDER1520429238274', 201, 201, 101, 1, 1, '101.00', '0.00', '0.00', '2018-03-07 01:27:18', 1, 4, '', 0, 0, 14, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 131, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(275, 'ORDER1521615451275', 201, 182, 5, 1, 1, '5.00', '0.00', '0.00', '2018-03-21 06:57:30', 3, 1, '', 0, 5, 4, '50', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, 10, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(276, 'ORDER1522223300276', 271, 195, 121, 1, 1, '121.00', '23.00', '27.83', '2018-03-27 19:48:20', 1, 7, '', 0, 9, 0, '1', 'suganya,Ganapathy,Ganapathy,Tamil nadu,231234,1234567890,suganya@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 234, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(277, 'ORDER1522223506277', 271, 195, 121, 1, 1, '121.00', '23.00', '27.83', '2018-03-27 19:51:46', 1, 7, '', 0, 9, 0, '1', 'suganya,test,test,Tamil nadu,123456,1234567890,suganya@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 234, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(278, 'ORDER1522223827278', 271, 195, 121, 1, 1, '121.00', '23.00', '27.83', '2018-03-27 19:57:06', 1, 4, '', 0, 15, 0, '1', 'suganya,Ganapathy,Ganapathy,Tamil nadu,123456,1234567890,suganya@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 234, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(279, 'ORDER1522386021279', 271, 195, 121, 1, 1, '121.00', '23.00', '27.83', '2018-03-30 05:00:21', 3, 1, '', 0, 15, 0, '1', 'suganya,mettupalayam,mett,Tamil Nadu,344556,1234567890,suganya@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 234, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(280, 'ORDER1522386059280', 271, 195, 121, 1, 1, '121.00', '23.00', '27.83', '2018-03-30 05:00:59', 3, 5, '', 0, 9, 0, '1', 'suganya,mettupalayam,met,Tamil Nadu,344556,1234567890,suganya@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 234, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(281, 'ORDER1522386088281', 271, 195, 121, 1, 1, '121.00', '23.00', '27.83', '2018-03-30 05:01:28', 3, 1, '', 0, 15, 0, '1', 'suganya,mettupalayam,m,Tamil Nadu,344556,1234567890,suganya@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 234, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(282, 'ORDER1522408368282', 273, 195, 121, 1, 1, '121.00', '23.00', '27.83', '2018-03-29 23:12:48', 1, 7, '', 0, 15, 0, '1', 'suganya,mettupalayam,mettupalayam,Tamil nadu,641001,1234567890,suganya@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 234, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(283, 'ORDER1522751030283', 274, 59, 454, 2, 1, '454.00', '0.00', '0.00', '2018-04-02 22:23:50', 3, 1, '', 0, 0, 0, '0', 'Nazeer,Door no: 21D  Arputham Towers,ram nagar  Gandhipuram,Tam,641001,9445847696,nazeer@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 455, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(284, 'ORDER1522751089284', 274, 190, 4, 1, 1, '4.00', '0.00', '0.00', '2018-04-02 22:24:49', 1, 4, '', 0, 9, 4, '0', 'Nazeer,Door no: 21D  Arputham Towers,ram nagar  Gandhipuram,Tamil Nadu,641001,9445847696,nazeer@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 5, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(285, 'ORDER1522829245285', 273, 38, 2, 1, 1, '2.00', '5.00', '0.10', '2018-04-03 20:07:25', 3, 5, '', 0, 0, 14, '5', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, 500, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(286, 'ORDER1522829531286', 273, 60, 676, 2, 1, '676.00', '6.00', '40.56', '2018-04-03 20:12:11', 1, 9, '', 0, 0, 0, '0', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, 878, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(287, 'ORDER1522829552287', 273, 60, 676, 2, 1, '676.00', '6.00', '40.56', '2018-04-03 20:12:32', 1, 7, '', 0, 0, 0, '0', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, 878, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(288, 'ORDER1522829576288', 273, 60, 676, 2, 1, '676.00', '6.00', '40.56', '2018-04-03 20:12:56', 3, 5, '', 0, 0, 0, '0', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, 878, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(289, 'ORDER1522829888289', 273, 38, 2, 1, 1, '2.00', '5.00', '0.10', '2018-04-03 20:18:08', 1, 9, '', 0, 0, 14, '5', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, 500, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(290, 'ORDER1522835714291', 275, 60, 676, 2, 1, '676.00', '6.00', '40.56', '2018-04-03 21:55:14', 3, 1, '', 0, 0, 0, '0', 'Nagoor meeran,Karumbukadai,Aasath Nagar,Tamil Nadu,641008,1591591599,nagoor@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 878, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(291, 'ORDER1522835714291', 275, 59, 454, 2, 1, '454.00', '0.00', '0.00', '2018-04-03 21:55:14', 3, 1, '', 0, 0, 0, '0', 'Nagoor meeran,Karumbukadai,Aasath Nagar,Tamil Nadu,641008,1591591599,nagoor@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 455, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(292, 'ORDER2tK6WqB1', 274, 190, 4, 1, 4, '16.00', '0.00', '0.00', '2018-04-05 06:12:10', 3, 1, '', 0, 9, 5, '0', 'Nazeer Hussain,Door no: 12B, Arputham Towers,,Ram nagar, Gandhipuram,Tamil Naadu,641001,9445847696,nazeer@gmail.com', 90, '', '', '', '', '', 0, 0, '0.00', '0.00', '', ''),
(293, 'ORDERpCiO0iTW', 274, 183, 5, 1, 1, '5.00', '0.00', '0.00', '2018-04-05 06:15:02', 3, 1, '', 0, 37, 4, '50', 'Nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641008,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, 0, '0.00', '0.00', '', ''),
(294, 'ORDERcGihCtyn', 274, 191, 3, 1, 1, '3.00', '0.00', '0.00', '2018-04-05 06:17:07', 3, 1, '', 0, 0, 14, '0', 'Nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641008,9445847696,nazeer@gmail.com', 90, '', '', '', '', '', 0, 0, '0.00', '0.00', '', ''),
(295, 'ORDER1522928943295', 285, 59, 454, 2, 1, '454.00', '0.00', '0.00', '2018-04-04 23:49:03', 3, 1, '', 0, 0, 0, '0', 'rty,rty,rty,rty,6456,56456,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, 455, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(296, 'ORDER1523356835296', 275, 161, 3, 1, 1, '3.00', '0.00', '0.00', '2018-04-09 22:40:35', 3, 1, '', 0, 0, 4, '0', 'Nagoor meeran,Asad Nagar,Karumbukadai,Tamil Nadu,641008,1591591599,nagoor@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, 36, '0.00', '0.00', '22AAAAA100Z100A', 'GST');

-- --------------------------------------------------------

--
-- Table structure for table `nm_ordercod_wallet`
--

CREATE TABLE `nm_ordercod_wallet` (
  `cod_transaction_id` varchar(255) NOT NULL,
  `wallet_used` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_ordercod_wallet`
--

INSERT INTO `nm_ordercod_wallet` (`cod_transaction_id`, `wallet_used`) VALUES
('avOfAdcR0jIDtyxH2', '0.00'),
('tMGkmN8y1pFOlDz6p', '1793.95'),
('v24g9Me0QByM0TmXp', '22.60'),
('3MaqnYuN1tDgR3TgI', '22.60'),
('DJ6z7eqjCUeAkUmcw', '16.30'),
('iZII4IEh9TEBmTKaw', '24.70'),
('4FM70563FJ6525317', '17821.00'),
('5CY08665XH8540825', '18.00'),
('ORDER1519820384QMWbGr', '3.00'),
('ORDER1519821906TVBEFg', '3.00'),
('ORDER1519822739Y3pxxS', '0.00'),
('ORDER1520331031DQbdxV', '55.00'),
('ORDER1520332996QqXFWJ', '51.00'),
('ORDER1520333447BvWWHH', '51.00');

-- --------------------------------------------------------

--
-- Table structure for table `nm_order_delivery_status`
--

CREATE TABLE `nm_order_delivery_status` (
  `delStatus_id` int(11) NOT NULL,
  `order_cust_id` int(11) NOT NULL,
  `cod_order_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `mer_id` int(11) NOT NULL,
  `order_type` int(11) NOT NULL COMMENT '''1''-product,''2''-deal',
  `transaction_id` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL COMMENT '''0''->cod,''1''->paypal',
  `delivery_statuss` int(11) NOT NULL,
  `cancel_status` int(11) NOT NULL COMMENT '''0''->not done,''1''->cancel pending ,''2''->cancelled,''3''->hold,4->"Disapproved"',
  `cancel_notes` text NOT NULL,
  `cancel_date` datetime NOT NULL,
  `cancel_approved_date` datetime NOT NULL,
  `return_status` int(11) NOT NULL COMMENT '''0''-not done,''1''-return pending,''3''->hold,''2''-returned,4->"Disapproved"',
  `return_notes` text NOT NULL,
  `return_date` datetime NOT NULL,
  `return_approved_date` datetime NOT NULL,
  `replace_status` int(11) NOT NULL COMMENT '''0''-not done,''1''-replace pending,''3''->hold,''2''-replaced,4->"Disapproved"',
  `replace_notes` text NOT NULL,
  `replace_date` datetime NOT NULL,
  `replace_approved_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_order_delivery_status`
--

INSERT INTO `nm_order_delivery_status` (`delStatus_id`, `order_cust_id`, `cod_order_id`, `order_id`, `prod_id`, `mer_id`, `order_type`, `transaction_id`, `payment_type`, `delivery_statuss`, `cancel_status`, `cancel_notes`, `cancel_date`, `cancel_approved_date`, `return_status`, `return_notes`, `return_date`, `return_approved_date`, `replace_status`, `replace_notes`, `replace_date`, `replace_approved_date`) VALUES
(1, 201, 35, 0, 36, 41, 1, 'ORDER1003', 0, 0, 4, 'tyty', '2017-12-25 11:29:51', '2017-12-25 13:00:23', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 201, 36, 0, 36, 41, 1, 'ORDER1004', 0, 0, 2, 'hghg', '2017-12-25 11:31:46', '2017-12-25 12:50:19', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 201, 0, 30, 36, 41, 1, '9R416707CH5978206', 1, 0, 2, 'rtrtr', '2017-12-25 13:24:28', '2017-12-25 13:30:31', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 201, 0, 31, 36, 41, 1, '0RY18511MJ490792B', 1, 0, 2, 'hhh', '2017-12-25 13:30:04', '2017-12-25 13:30:51', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 201, 0, 33, 36, 41, 1, '0L636862BX7370612', 1, 0, 4, 'yuyuy', '2017-12-25 13:33:49', '2017-12-25 13:34:18', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 201, 37, 0, 36, 41, 1, 'ORDER1005', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'uyy', '2017-12-25 14:59:04', '2017-12-25 14:59:24', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 201, 38, 0, 36, 41, 1, 'ORDER1006', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'ssd', '2017-12-25 15:01:09', '2017-12-25 15:03:02', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 201, 39, 0, 36, 41, 1, 'ORDER1007', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'ssd', '2017-12-25 15:02:24', '2017-12-25 15:02:46', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 201, 40, 0, 36, 41, 1, 'ORDER1008', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'tytyt', '2017-12-25 15:08:36', '2017-12-25 15:09:01'),
(10, 201, 0, 35, 36, 41, 1, '4EB761201X023850H', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'gffg', '2017-12-25 15:19:45', '2017-12-25 15:33:47', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 201, 0, 34, 36, 41, 1, '1XP685263D264494M', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'hhh', '2017-12-25 15:20:08', '2017-12-25 15:36:09'),
(12, 201, 0, 36, 36, 41, 1, '7HY02061W0863332R', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'trr', '2017-12-25 15:38:14', '2017-12-25 15:38:31', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 201, 42, 0, 1, 41, 2, 'ORDER1010', 0, 0, 2, 'hjh', '2017-12-25 16:12:28', '2017-12-25 16:13:28', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 201, 43, 0, 1, 41, 2, 'ORDER1011', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'hghg', '2017-12-25 16:12:45', '2017-12-25 16:27:05', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 201, 44, 0, 1, 41, 2, 'ORDER1012', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'tyty', '2017-12-25 16:43:39', '2017-12-25 16:44:01', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 201, 0, 37, 1, 41, 2, '1GY19202KC5728326', 1, 0, 2, 'hgh', '2017-12-25 16:46:04', '2017-12-25 16:46:25', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 201, 0, 38, 1, 41, 2, '1SE07703430416241', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'fgfgf', '2017-12-25 16:48:42', '2017-12-25 16:52:15'),
(18, 201, 0, 39, 1, 41, 2, '58X139085H000343K', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'gf', '2017-12-25 16:55:28', '2017-12-25 16:57:49', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 197, 65, 0, 160, 41, 1, 'ORDER1003', 0, 0, 2, 'gi', '2018-01-03 17:02:14', '2018-01-03 17:03:35', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 214, 0, 47, 173, 62, 1, '8Y116078LD8996354', 1, 0, 4, '', '2018-01-08 18:33:43', '2018-01-08 18:37:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 212, 105, 0, 167, 68, 1, 'ORDER1012', 0, 0, 1, 'dont like', '2018-01-11 10:18:27', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 212, 108, 0, 173, 62, 1, 'ORDER1015', 0, 0, 1, 'no', '2018-01-11 10:49:24', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 249, 151, 0, 160, 41, 1, 'ORDER1515846205151', 0, 0, 1, 'dont like', '2018-01-13 17:53:53', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 249, 152, 0, 160, 41, 1, 'ORDER1515846895152', 0, 0, 1, 'dsfgdsfg', '2018-01-13 18:05:16', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 249, 153, 0, 160, 41, 1, 'ORDER1515846987153', 0, 0, 1, 'dfgdfg', '2018-01-13 18:06:52', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 249, 154, 0, 160, 41, 1, 'ORDER1515847427154', 0, 0, 1, 'dfgsdfg', '2018-01-13 18:14:08', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 249, 156, 0, 176, 60, 1, 'ORDER1515851015156', 0, 0, 1, 'sdasd', '2018-01-13 19:14:11', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 201, 185, 0, 160, 41, 1, 'ORDER1516105593185', 0, 0, 1, '', '2018-01-16 18:08:06', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 201, 184, 0, 139, 67, 1, 'ORDER1516105593185', 0, 0, 1, '<dfd>sdfsdgv/nhmn', '2018-01-16 18:11:53', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 201, 165, 0, 36, 41, 1, 'ORDER1516083178166', 0, 0, 2, '', '2018-01-16 18:18:40', '2018-01-17 11:00:11', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 201, 0, 56, 160, 41, 1, '4FM70563FJ6525317', 1, 0, 1, 'sdfd#@$#$#$^', '2018-01-16 18:19:57', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 201, 163, 0, 36, 41, 1, 'ORDER1516078039163', 0, 0, 2, '', '2018-01-16 19:12:33', '2018-01-17 10:09:36', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 220, 95, 0, 167, 68, 1, 'ORDER1005', 0, 0, 1, '', '2018-01-16 19:13:08', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 201, 0, 73, 24, 68, 2, '6CU05309P59494244', 1, 0, 2, '', '2018-01-16 19:13:26', '2018-02-03 17:52:20', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 206, 100, 0, 167, 68, 1, 'ORDER1009', 0, 0, 1, '', '2018-01-16 19:19:14', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 201, 87, 0, 164, 62, 1, 'lTcWNf4F', 0, 0, 1, '', '2018-01-16 19:24:36', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 201, 158, 0, 160, 41, 1, 'ORDER1516076276158', 0, 0, 1, 'sxfdsfgfghgfhgf', '2018-01-17 16:33:09', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 201, 187, 0, 36, 41, 1, 'ORDER1516167174187', 0, 0, 1, 'safsdfgfdhgfh', '2018-01-17 16:33:56', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 201, 162, 0, 172, 62, 1, '', 0, 0, 1, 'No interest to buy', '2018-01-17 16:37:13', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 229, 208, 0, 52, 60, 2, 'ORDER1517807965208', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'test', '2018-02-05 11:00:12', '2018-02-05 11:01:54', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 229, 0, 87, 52, 60, 2, '00B391695E622323V', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'test', '2018-02-06 15:48:16', '2018-02-06 15:51:23'),
(42, 229, 219, 0, 196, 90, 1, 'ORDER1517916234219', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'test', '2018-02-06 17:10:13', '2018-02-06 17:10:48', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 229, 227, 0, 35, 41, 1, 'ORDER1518586507227', 0, 0, 1, 'test', '2018-02-15 14:59:16', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 229, 222, 0, 52, 60, 2, 'ORDER1517990184222', 0, 0, 2, 'test', '2018-02-16 16:16:54', '2018-02-17 18:48:34', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 229, 230, 0, 51, 60, 2, 'ORDER1518873841230', 0, 0, 2, 'ddsgg', '2018-02-17 18:54:48', '2018-02-17 18:55:43', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 229, 214, 0, 52, 60, 2, 'ORDER1517835128214', 0, 0, 2, 'test', '2018-02-17 19:25:52', '2018-02-17 19:26:28', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 214, 0, 45, 170, 62, 1, '9EK709210D1805016', 1, 0, 1, 'testing', '2018-03-01 17:52:25', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 229, 0, 50, 191, 90, 1, 'd11e6e7890108a03620e', 1, 0, 2, 'test', '2018-03-01 19:44:17', '2018-03-01 19:52:07', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 201, 0, 101, 182, 0, 1, 'ORDER1520331031DQbdxV', 2, 0, 1, 'not satisfy', '2018-03-06 15:53:12', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 201, 0, 103, 51, 0, 2, 'ORDER1520333447BvWWHH', 2, 0, 2, 'high cost', '2018-03-06 16:24:44', '2018-03-06 16:25:26', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 201, 273, 0, 59, 0, 2, 'ORDER1520419213273', 0, 0, 1, 'not ok', '2018-03-07 16:11:50', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 201, 0, 102, 51, 0, 2, 'ORDER1520332996QqXFWJ', 2, 0, 1, 'cvfdg', '2018-03-07 16:17:03', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 201, 272, 0, 59, 0, 2, 'ORDER1520419131272', 0, 0, 1, 'jkjh', '2018-03-07 16:23:33', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 271, 276, 0, 195, 0, 1, 'ORDER1522223300276', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'tytyt', '2018-03-28 13:20:17', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 271, 277, 0, 195, 0, 1, 'ORDER1522223506277', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2018-03-28 13:22:24', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 271, 280, 0, 195, 0, 1, 'ORDER1522386059280', 0, 0, 1, 'klklk', '2018-03-30 10:32:04', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 273, 285, 0, 38, 0, 1, 'ORDER1522829245285', 0, 0, 1, 'fgfgf', '2018-04-04 13:46:32', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 273, 282, 0, 195, 0, 1, 'ORDER1522408368282', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'uu', '2018-04-04 13:47:43', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 273, 289, 0, 38, 0, 1, 'ORDER1522829888289', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'ghghgghg', '2018-04-04 13:48:58', '0000-00-00 00:00:00'),
(60, 273, 0, 112, 38, 0, 1, '0R925448NP171471T', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'gg', '2018-04-04 13:51:41', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 273, 0, 110, 195, 0, 1, '57100538AS681443G', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'sdsd', '2018-04-04 13:52:00', '0000-00-00 00:00:00'),
(62, 273, 0, 82, 38, 0, 1, '8758a4ac5e1f0a78caf2', 1, 0, 1, 'fgfgf', '2018-04-04 13:52:27', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 273, 0, 81, 38, 0, 1, '674aa8954f75c7b3820c', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'yuyu', '2018-04-04 13:52:57', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 273, 288, 0, 60, 0, 2, 'ORDER1522829576288', 0, 0, 1, 'rtrtr', '2018-04-04 13:53:17', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 273, 287, 0, 60, 0, 2, 'ORDER1522829552287', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'jkjkj', '2018-04-04 13:53:48', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 273, 286, 0, 60, 0, 2, 'ORDER1522829531286', 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'opop', '2018-04-04 13:54:02', '0000-00-00 00:00:00'),
(67, 273, 0, 85, 60, 0, 2, '1c40e9a62bd3a7848a08', 1, 0, 1, 'uiu', '2018-04-04 13:54:18', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 273, 0, 84, 60, 0, 2, 'd82143b64cecde86eaed', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'klk', '2018-04-04 13:54:50', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 273, 0, 83, 60, 0, 2, 'fa01bc4ab566d12fb042', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'jkjkj', '2018-04-04 14:00:43', '0000-00-00 00:00:00'),
(70, 273, 0, 115, 60, 0, 2, '8E0481204C534654D', 1, 0, 1, 'fgf', '2018-04-04 14:42:51', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 273, 0, 114, 60, 0, 2, '212651097D484344T', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'gg', '2018-04-04 14:44:14', '0000-00-00 00:00:00'),
(72, 273, 0, 113, 60, 0, 2, '5GY0810659571183G', 1, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'gggg', '2018-04-04 14:44:32', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nm_order_payu`
--

CREATE TABLE `nm_order_payu` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_cus_id` int(10) UNSIGNED NOT NULL,
  `order_pro_id` int(11) UNSIGNED NOT NULL,
  `order_prod_unitPrice` double NOT NULL DEFAULT '0',
  `order_type` tinyint(4) NOT NULL COMMENT '1-product,2-deals',
  `transaction_id` varchar(50) NOT NULL,
  `payer_email` varchar(50) NOT NULL,
  `payer_id` varchar(50) NOT NULL,
  `payer_name` varchar(100) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_amt` decimal(15,2) NOT NULL COMMENT '(unit price * quantity)',
  `order_tax` decimal(10,2) NOT NULL COMMENT 'tax per unit (in %)',
  `order_taxAmt` decimal(10,2) NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `token_id` varchar(30) NOT NULL,
  `payment_ack` varchar(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_date` varchar(20) NOT NULL,
  `payer_status` varchar(50) NOT NULL,
  `order_status` tinyint(4) NOT NULL COMMENT '1-sucess,2-complete,3-hold,4-failed',
  `delivery_status` int(11) NOT NULL DEFAULT '2' COMMENT '1->order_placed,2->order_packed,3->Dispatched,4->Delivered,5->cancel pending,6->cancelled,7->return pending ,8->returned,9->replace pending,10->replaced',
  `order_paytype` smallint(6) NOT NULL DEFAULT '1' COMMENT '1-paypal',
  `order_pro_color` int(11) NOT NULL,
  `order_pro_size` int(11) NOT NULL,
  `order_shipping_amt` varchar(20) NOT NULL,
  `order_shipping_add` text NOT NULL,
  `order_merchant_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_type` varchar(255) NOT NULL,
  `coupon_amount_type` varchar(255) NOT NULL,
  `coupon_amount` varchar(255) NOT NULL,
  `coupon_total_amount` varchar(255) NOT NULL,
  `wallet_amount` double NOT NULL,
  `mer_commission_amt` decimal(10,2) NOT NULL,
  `mer_amt` decimal(10,2) NOT NULL,
  `tax_id_number` varchar(40) NOT NULL,
  `tax_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_order_payu`
--

INSERT INTO `nm_order_payu` (`order_id`, `order_cus_id`, `order_pro_id`, `order_prod_unitPrice`, `order_type`, `transaction_id`, `payer_email`, `payer_id`, `payer_name`, `order_qty`, `order_amt`, `order_tax`, `order_taxAmt`, `currency_code`, `token_id`, `payment_ack`, `order_date`, `created_date`, `payer_status`, `order_status`, `delivery_status`, `order_paytype`, `order_pro_color`, `order_pro_size`, `order_shipping_amt`, `order_shipping_add`, `order_merchant_id`, `coupon_code`, `coupon_type`, `coupon_amount_type`, `coupon_amount`, `coupon_total_amount`, `wallet_amount`, `mer_commission_amt`, `mer_amt`, `tax_id_number`, `tax_type`) VALUES
(1, 220, 161, 100, 1, '', '', '', '', 1, '100.00', '3.00', '3.00', '', '', '', '2018-02-28 06:09:09', '', '', 1, 1, 1, 0, 4, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 58, '0', '0', '0', '0', '0', 0, '21.63', '81.37', '', ''),
(2, 220, 171, 60, 1, '', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-27 19:32:50', '', '', 3, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(3, 220, 171, 60, 1, '', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-27 19:32:50', '', '', 3, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(4, 220, 171, 60, 1, '5992b77cced87dd7df08', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 07:32:52', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(5, 220, 171, 60, 1, '5992b77cced87dd7df08', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 07:32:52', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(6, 220, 171, 60, 1, '5992b77cced87dd7df08', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 07:32:52', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(7, 220, 157, 100, 1, '5992b77cced87dd7df08', '', '', '', 1, '100.00', '8.00', '8.00', '', '', '', '2018-02-28 07:32:52', '', '', 1, 1, 1, 11, 4, '56', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, '1.64', '162.36', '', ''),
(8, 220, 171, 60, 1, '5992b77cced87dd7df08', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 07:32:52', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(9, 220, 157, 100, 1, '5992b77cced87dd7df08', '', '', '', 1, '100.00', '8.00', '8.00', '', '', '', '2018-02-28 07:32:52', '', '', 1, 1, 1, 11, 4, '56', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, '1.64', '162.36', '', ''),
(10, 220, 168, 350, 1, 'b289180adcf4fc6fe85b', '', '', '', 1, '350.00', '0.00', '0.00', '', '', '', '2018-02-28 08:54:36', '', '', 1, 1, 1, 21, 17, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 68, '0', '0', '0', '0', '0', 0, '14.00', '336.00', '', ''),
(11, 220, 171, 60, 1, 'b289180adcf4fc6fe85b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 08:54:36', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(12, 220, 171, 60, 1, '8d1d632b64bd245bae80', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 09:15:34', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(13, 220, 157, 100, 1, '8d1d632b64bd245bae80', '', '', '', 1, '100.00', '8.00', '8.00', '', '', '', '2018-02-28 09:15:34', '', '', 1, 1, 1, 11, 4, '56', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, '1.64', '162.36', '', ''),
(14, 220, 171, 60, 1, '8d1d632b64bd245bae80', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 09:15:34', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(15, 220, 157, 100, 1, '8d1d632b64bd245bae80', '', '', '', 1, '100.00', '8.00', '8.00', '', '', '', '2018-02-28 09:15:34', '', '', 1, 1, 1, 11, 4, '56', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, '1.64', '162.36', '', ''),
(16, 220, 171, 60, 1, '8d1d632b64bd245bae80', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 09:15:34', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(17, 220, 157, 100, 1, '8d1d632b64bd245bae80', '', '', '', 1, '100.00', '8.00', '8.00', '', '', '', '2018-02-28 09:15:34', '', '', 1, 1, 1, 11, 4, '56', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 62, '0', '0', '0', '0', '0', 0, '1.64', '162.36', '', ''),
(18, 220, 171, 60, 1, '1d807a8896f3aa9d7ee3', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 09:41:28', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(19, 220, 95, 100, 1, '1d807a8896f3aa9d7ee3', '', '', '', 1, '100.00', '0.00', '0.00', '', '', '', '2018-02-28 09:41:28', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 58, '0', '0', '0', '0', '0', 0, '21.00', '79.00', '', ''),
(20, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(21, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(22, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(23, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(24, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(25, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(26, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(27, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(28, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(29, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(30, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(31, 220, 171, 60, 1, 'f714a5964e443a3dfa0b', '', '', '', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:01:11', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(32, 220, 95, 100, 1, 'b647bd8f4ecd2d139e02', 'venugopal@pofitec.com', '', 'venugopal', 1, '100.00', '0.00', '0.00', '', '', '', '2018-02-28 11:44:01', '', '', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 58, '0', '0', '0', '0', '0', 0, '21.00', '79.00', '', ''),
(33, 220, 171, 60, 1, '468544edd4b2daca74e7', 'venugopal@pofitec.com', '', 'venugopal', 1, '60.00', '0.00', '0.00', '', '', '', '2018-02-28 11:47:12', '', 'success', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(34, 220, 51, 50, 2, '2458047c4f71f91ddaba', 'venugopal@pofitec.com', '', 'venugopal', 2, '100.00', '2.00', '2.00', '', '', '', '2018-02-28 12:51:20', '', 'success', 1, 1, 1, 0, 0, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 3, '10.20', '91.80', '', ''),
(35, 229, 161, 3, 1, 'ce850aafa72be1761c1b', 'balamurugan@pofitec.com', '', 'bala', 3, '9.00', '0.00', '0.00', '', '', '', '2018-03-01 05:32:20', '', 'success', 1, 1, 1, 0, 4, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 58, '0', '0', '0', '0', '0', 0, '1.89', '7.11', '', ''),
(36, 220, 171, 60, 1, '247896d2542de383dadf', 'venugopal@pofitec.com', '', 'venugopal', 1, '60.00', '0.00', '0.00', '', '', '', '2018-03-01 05:39:10', '', 'success', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(37, 220, 51, 50, 2, '247896d2542de383dadf', 'venugopal@pofitec.com', '', 'venugopal', 1, '50.00', '2.00', '1.00', '', '', '', '2018-03-01 05:39:10', '', 'success', 1, 6, 1, 0, 0, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '5.10', '45.90', '', ''),
(38, 229, 190, 4, 1, 'd9f2b5986a4bc93efed0', 'balamurugan@pofitec.com', '', 'bala', 1, '4.00', '0.00', '0.00', '', '', '', '2018-03-01 10:14:27', '', 'success', 1, 8, 1, 9, 4, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.04', '3.96', '', ''),
(39, 220, 171, 60, 1, 'd0fb26af598f198b152f', 'venugopal@pofitec.com', '', 'venugopal', 1, '60.00', '0.00', '0.00', '', '', '', '2018-03-01 10:43:23', '', 'success', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '6.00', '54.00', '', ''),
(40, 220, 61, 40, 2, 'd0fb26af598f198b152f', 'venugopal@pofitec.com', '', 'venugopal', 3, '120.00', '0.00', '0.00', '', '', '', '2018-03-01 10:43:23', '', 'success', 1, 1, 1, 0, 0, '90', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 58, '0', '0', '0', '0', '0', 0, '44.10', '165.90', '', ''),
(41, 229, 190, 4, 1, '30fcb112016c45c1655e', 'balamurugan@pofitec.com', '', 'bala', 2, '8.00', '0.00', '0.00', '', '', '', '2018-03-01 11:18:11', '', 'success', 1, 6, 1, 9, 5, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.08', '7.92', '', ''),
(42, 229, 62, 4, 2, '14e58b691d16f7daff58', 'balamurugan@pofitec.com', '', 'bala', 1, '4.00', '0.00', '0.00', '', '', '', '2018-03-01 11:19:57', '', 'success', 1, 6, 1, 0, 0, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.04', '3.96', '', ''),
(43, 229, 62, 4, 2, '4cb87f43757948455676', 'balamurugan@pofitec.com', '', 'bala', 1, '4.00', '0.00', '0.00', '', '', '', '2018-03-01 11:48:58', '', 'success', 1, 10, 1, 0, 0, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.04', '3.96', '', ''),
(44, 229, 171, 60, 1, '990aa13ad82aef28c774', 'balamurugan@pofitec.com', '', 'bala', 2, '120.00', '0.00', '0.00', '', '', '', '2018-03-01 12:12:52', '', 'success', 1, 1, 1, 0, 14, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 60, '0', '0', '0', '0', '0', 0, '12.00', '108.00', '', ''),
(45, 229, 191, 3, 1, '7b89f04b2169ab1fff80', 'balamurugan@pofitec.com', '', 'bala', 2, '6.00', '0.00', '0.00', '', '', '', '2018-03-01 12:15:51', '', 'success', 1, 10, 1, 0, 14, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.06', '5.94', '', ''),
(46, 229, 62, 4, 2, '98e8d799fa60914e3828', 'balamurugan@pofitec.com', '', 'bala', 1, '4.00', '0.00', '0.00', '', '', '', '2018-03-01 12:41:23', '', 'success', 1, 8, 1, 0, 0, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.04', '3.96', '', ''),
(47, 229, 191, 3, 1, '5bb15302256e2f6562ff', 'balamurugan@pofitec.com', '', 'bala', 2, '6.00', '0.00', '0.00', '', '', '', '2018-03-01 12:49:05', '', 'success', 1, 6, 1, 0, 14, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.06', '5.94', '', ''),
(48, 229, 62, 4, 2, 'b9a23a0ba178c1b07987', 'balamurugan@pofitec.com', '', 'bala', 2, '8.00', '0.00', '0.00', '', '', '', '2018-03-01 12:52:15', '', 'success', 1, 8, 1, 0, 0, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.08', '7.92', '', ''),
(49, 229, 189, 800, 1, 'e3f5db72fd0b9d5b816e', 'balamurugan@pofitec.com', '', 'bala', 3, '2400.00', '3.00', '72.00', '', '', '', '2018-03-01 13:24:17', '', 'success', 1, 1, 1, 13, 4, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 58, 'LyDGsECzKv', 'productcoupon', '1', '30', '2370', 0, '519.12', '1952.88', '', ''),
(50, 229, 191, 3, 1, 'd11e6e7890108a03620e', 'balamurugan@pofitec.com', '', 'bala', 1, '3.00', '0.00', '0.00', '', '', '', '2018-03-01 14:06:51', '', 'success', 1, 6, 1, 0, 14, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.03', '2.97', '', ''),
(51, 229, 62, 4, 2, 'b3c6520df608a957f861', 'balamurugan@pofitec.com', '', 'bala', 2, '8.00', '0.00', '0.00', '', '', '', '2018-03-01 14:08:19', '', 'success', 1, 10, 1, 0, 0, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.08', '7.92', '', ''),
(52, 229, 189, 800, 1, '9f850433dfa62a117b8a', 'balamurugan@pofitec.com', '', 'bala', 3, '2400.00', '3.00', '72.00', '', '', '', '2018-03-01 14:10:06', '', 'success', 1, 6, 1, 8, 4, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 58, 'LyDGsECzKv', 'productcoupon', '1', '30', '2370', 0, '519.12', '1952.88', '', ''),
(53, 229, 62, 4, 2, 'e543bc373d50c9cde89a', 'balamurugan@pofitec.com', '', 'bala', 1, '4.00', '0.00', '0.00', '', '', '', '2018-03-01 14:12:33', '', 'success', 1, 8, 1, 0, 0, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.04', '3.96', '', ''),
(54, 229, 171, 60, 1, 'ba75ebec441f7b0883be', 'balamurugan@pofitec.com', '', 'bala', 2, '120.00', '0.00', '0.00', '', '', '', '2018-03-02 05:12:20', '', 'success', 1, 1, 1, 0, 14, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 60, '0', '0', '0', '0', '0', 0, '12.00', '108.00', '', ''),
(55, 229, 62, 4, 2, 'e8cfc26079c1738d0185', 'balamurugan@pofitec.com', '', 'bala', 1, '4.00', '0.00', '0.00', '', '', '', '2018-03-02 05:15:59', '', 'success', 1, 6, 1, 0, 0, '0', 'bala,Hope,Peelamedu,tn,641004,7418529635  ,balamurugan@pofitec.com,peelamedu,India', 90, '0', '0', '0', '0', '0', 0, '0.04', '3.96', '', ''),
(56, 220, 52, 500, 2, '39aa66cb2a27a859cee3', 'venugopal@pofitec.com', '', 'venugopal', 1, '500.00', '2.00', '10.00', '', '', '', '2018-03-03 05:48:44', '', 'success', 1, 1, 1, 0, 0, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 60, '0', '0', '0', '0', '0', 0, '51.00', '459.00', 'SDHKASHD34', 'STT'),
(57, 220, 184, 5, 1, '492224a6b8f06f5bcd8a', 'venugopal@pofitec.com', '', 'venugopal', 2, '10.00', '0.00', '0.00', '', '', '', '2018-03-05 11:27:23', '', 'success', 1, 1, 1, 0, 0, '100', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 41, '0', '0', '0', '0', '0', 0, '5.50', '104.50', '', ''),
(58, 220, 171, 60, 1, '5b26b137398cd8a36d08', 'venugopal@pofitec.com', '', 'venugopal', 1, '60.00', '0.00', '0.00', '', '', '', '2018-03-05 13:20:22', '', 'success', 1, 1, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '', ''),
(59, 220, 161, 3, 1, 'ded0e099e141c6435cce', 'venugopal@pofitec.com', '', 'venugopal', 1, '3.00', '0.00', '0.00', '', '', '', '2018-03-06 05:37:52', '', 'success', 1, 1, 1, 0, 4, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '', ''),
(60, 220, 161, 3, 1, '768f850ac09e95c79931', 'venugopal@pofitec.com', '', 'venugopal', 1, '3.00', '0.00', '0.00', '', '', '', '2018-03-06 06:04:28', '', 'success', 1, 1, 1, 0, 4, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(61, 201, 185, 5, 1, '032dae8882af08e38223', 'suganya.t@pofitec.com', '', 'suganya', 1, '5.00', '0.00', '0.00', '', '', '', '2018-03-06 07:41:17', '', 'success', 1, 4, 1, 37, 4, '50', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(62, 201, 51, 50, 2, '860b89accc8111fa0e78', 'suganya.t@pofitec.com', '', 'suganya', 1, '50.00', '2.00', '1.00', '', '', '', '2018-03-06 10:25:44', '', 'success', 1, 1, 1, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 55, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(63, 201, 51, 50, 2, '38101a8d35e913fad65c', 'suganya.t@pofitec.com', '', 'suganya', 1, '50.00', '2.00', '1.00', '', '', '', '2018-03-06 10:51:57', '', 'success', 1, 1, 1, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'TIN'),
(64, 201, 59, 454, 2, '9c7ebdead03bad441c9a', 'suganya.t@pofitec.com', '', 'suganya', 1, '454.00', '0.00', '0.00', '', '', '', '2018-03-07 10:17:58', '', 'success', 1, 4, 1, 0, 0, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(65, 201, 201, 101, 1, '8d067a3d582d99e5815a', 'suganya.t@pofitec.com', '', 'suganya', 1, '101.00', '0.00', '0.00', '', '', '', '2018-03-07 13:34:55', '', 'success', 1, 4, 1, 0, 14, '0', 'suganya,gdgfdhghshhytuuytu,cbe,tn,123456,8012122975,suganya.t@pofitec.com,Lahore,Italy', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(66, 220, 61, 40, 2, '01816edfee887864a8e1', 'venugopal@pofitec.com', '', 'venugopal', 1, '40.00', '0.00', '0.00', '', '', '', '2018-03-19 12:26:59', '', 'success', 1, 1, 1, 0, 0, '30', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(67, 220, 191, 3, 1, '3bdda35af390801d3e61', 'venugopal@pofitec.com', '', 'venugopal', 1, '3.00', '0.00', '0.00', '', '', '', '2018-03-19 12:29:36', '', 'success', 1, 4, 1, 0, 14, '0', 'venugopal,Address1,Address2,CSA state,12134,3456765434,venugopal@pofitec.com,Lahore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(68, 220, 161, 3, 1, '9', 'nazeer@gmail.com', '281', 'nazeer', 1, '3.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-03 06:05:28', '', 'verified', 1, 1, 1, 0, 4, '0', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 58, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(69, 220, 161, 3, 1, '9', 'nazeer@gmail.com', '281', 'nazeer', 1, '3.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-03 06:05:41', '', 'verified', 1, 1, 1, 0, 4, '0', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 58, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(70, 220, 161, 3, 1, '9', 'nazeer@gmail.com', '281', 'nazeer', 1, '3.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-03 06:07:58', '', 'verified', 1, 1, 1, 0, 4, '0', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 58, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(71, 220, 191, 3, 1, '9', 'nazeer@gmail.com', '281', 'nazeer', 1, '3.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-03 06:26:02', '', 'verified', 1, 1, 1, 0, 14, '0', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 90, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(72, 220, 185, 5, 1, '9', 'nazeer@gmail.com', '281', 'nazeer', 1, '5.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-03 06:26:44', '', 'verified', 1, 1, 1, 37, 4, '50', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(73, 220, 38, 2, 1, '9', 'nazeer@gmail.com', '281', 'nazeer', 1, '2.00', '5.00', '0.10', 'INR', '1111660739', 'Success', '2018-04-03 06:28:02', '', 'verified', 1, 1, 1, 0, 14, '5', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(74, 220, 162, 2, 1, '9', 'nazeer@gmail.com', '281', 'nazeer', 1, '2.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-03 06:37:00', '', 'verified', 1, 1, 1, 6, 4, '0', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(75, 274, 191, 3, 1, '9', 'nazeer@gmail.com', '274', 'nazeer', 1, '3.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-03 06:50:53', '', 'verified', 1, 1, 1, 0, 14, '0', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 90, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(76, 274, 38, 2, 1, '9', 'nazeer@gmail.com', '274', 'nazeer', 1, '2.00', '5.00', '0.10', 'INR', '1111660739', 'Success', '2018-04-02 22:19:40', '', 'verified', 1, 1, 1, 0, 14, '5', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(77, 274, 39, 2000, 1, '9', 'nazeer@gmail.com', '274', 'nazeer', 1, '2000.00', '10.00', '200.00', 'INR', '1111660739', 'Success', '2018-04-02 22:19:40', '', 'verified', 1, 1, 1, 0, 14, '10', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(78, 274, 191, 3, 1, '9', 'nazeer@pofitec.com', '274', 'nazeer', 1, '3.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-02 22:25:23', '', 'verified', 1, 1, 1, 0, 14, '0', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@pofitec.com', 90, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(79, 274, 184, 5, 1, '9', 'nazeer@gmail.com', '274', 'nazeer', 1, '5.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-02 22:39:25', '', 'verified', 1, 1, 1, 0, 0, '50', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(80, 274, 171, 60, 1, '9', 'nazeer@gmail.com', '274', 'nazeer', 8, '480.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-02 22:41:57', '', 'verified', 1, 1, 1, 0, 14, '0', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 60, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(81, 273, 38, 2, 1, '674aa8954f75c7b3820c', 'suganya@pofitec.com', '', 'suganya', 1, '2.00', '5.00', '0.10', '', '', '', '2018-04-04 08:10:16', '', 'success', 1, 7, 1, 0, 14, '5', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(82, 273, 38, 2, 1, '8758a4ac5e1f0a78caf2', 'suganya@pofitec.com', '', 'suganya', 1, '2.00', '5.00', '0.10', '', '', '', '2018-04-04 08:11:16', '', 'success', 1, 5, 1, 0, 14, '5', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(83, 273, 60, 676, 2, 'fa01bc4ab566d12fb042', 'suganya@pofitec.com', '', 'suganya', 1, '676.00', '6.00', '40.56', '', '', '', '2018-04-04 08:13:20', '', 'success', 1, 9, 1, 0, 0, '0', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(84, 273, 60, 676, 2, 'd82143b64cecde86eaed', 'suganya@pofitec.com', '', 'suganya', 1, '676.00', '6.00', '40.56', '', '', '', '2018-04-04 08:14:02', '', 'success', 1, 7, 1, 0, 0, '0', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(85, 273, 60, 676, 2, '1c40e9a62bd3a7848a08', 'suganya@pofitec.com', '', 'suganya', 1, '676.00', '6.00', '40.56', '', '', '', '2018-04-04 08:15:05', '', 'success', 1, 5, 1, 0, 0, '0', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(86, 273, 60, 676, 2, '88777a965f275aeb04c4', 'suganya@pofitec.com', '', 'suganya', 1, '676.00', '6.00', '40.56', '', '', '', '2018-04-04 10:16:41', '', 'success', 1, 1, 1, 0, 0, '0', 'suganya,mettupalayam,mettupalayam,Tamilnadu,600042,1234567890,suganya@pofitec.com,Delhi,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(87, 275, 191, 3, 1, '32fd4333d3b361ea5f81', 'nagoor@pofitec.com', '', 'Nagoor meeran', 1, '3.00', '0.00', '0.00', '', '', '', '2018-04-04 10:18:17', '', 'success', 1, 1, 1, 0, 14, '0', 'Nagoor meeran,Karumbukadai,Aasath Nagar,Tamil Nadu,641008,1591591599,nagoor@pofitec.com,Coimbatore,India', 0, '0', '0', '0', '0', '0', 0, '0.00', '0.00', '22AAAAA100Z100A', 'GST'),
(88, 274, 38, 2, 1, '9', 'nazeer@gmail.com', '274', 'nazeer', 1, '2.00', '5.00', '0.10', 'INR', '1111660739', 'Success', '2018-04-03 23:02:53', '', 'verified', 1, 1, 1, 0, 14, '5', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(89, 274, 162, 2, 1, '9', 'nazeer@gmail.com', '274', 'nazeer', 1, '2.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-04 00:04:59', '', 'verified', 1, 1, 1, 16, 4, '0', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(90, 274, 182, 5, 1, '9', 'nazeer@gmail.com', '274', 'nazeer', 2, '10.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-04 00:10:29', '', 'verified', 1, 1, 1, 5, 4, '100', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(91, 274, 38, 2, 1, '9', 'nazeer@gmail.com', '274', 'nazeer', 1, '2.00', '5.00', '0.10', 'INR', '1111660739', 'Success', '2018-04-04 00:35:12', '', 'verified', 1, 1, 1, 0, 14, '5', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer1@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(92, 274, 185, 5, 1, '9', 'nazeer@gmail.com', '274', 'nazeer', 1, '5.00', '0.00', '0.00', 'INR', '1111660739', 'Success', '2018-04-04 00:56:07', '', 'verified', 1, 1, 1, 5, 4, '50', 'nazeer,Arputham Towers,Gandipuram,Tamil Nadu,641001,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', ''),
(93, 274, 38, 2, 1, '8633b64846fa189ed6f728d186adb8e86830c378388dc79a28', 'nazeer@gmail.com', '274', 'Nazeer Hussain', 1, '2.00', '5.00', '0.10', 'INR', '1111665388', 'Success', '2018-04-05 05:57:16', '', 'verified', 1, 1, 1, 0, 14, '5', 'Nazeer Hussain,Door no: 12B, Arputham Towers,,Ram nagar, Gandhipuram,Tamil Naadu,641001,9445847696,nazeer@gmail.com', 41, '', '', '', '', '', 0, '0.00', '0.00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nm_paymentsettings`
--

CREATE TABLE `nm_paymentsettings` (
  `ps_id` tinyint(3) UNSIGNED NOT NULL,
  `ps_flatshipping` decimal(10,2) NOT NULL COMMENT 'shipping Tax Percentage',
  `ps_taxpercentage` tinyint(3) UNSIGNED NOT NULL,
  `ps_extenddays` smallint(5) UNSIGNED NOT NULL COMMENT 'Auction Extend Days',
  `ps_alertdays` int(11) NOT NULL,
  `ps_minfundrequest` int(10) UNSIGNED NOT NULL,
  `ps_maxfundrequest` int(10) UNSIGNED NOT NULL,
  `ps_referralamount` int(11) NOT NULL,
  `ps_countryid` int(11) NOT NULL,
  `ps_countrycode` varchar(10) NOT NULL,
  `ps_cursymbol` varchar(10) NOT NULL,
  `ps_curcode` varchar(10) NOT NULL,
  `ps_paypal_email` varchar(255) NOT NULL,
  `ps_paypalaccount` varchar(150) NOT NULL,
  `ps_paypal_api_pw` varchar(250) NOT NULL,
  `ps_paypal_api_signature` varchar(250) NOT NULL,
  `ps_authorize_trans_key` varchar(250) NOT NULL,
  `ps_authorize_api_id` varchar(250) NOT NULL,
  `ps_payu_key` varchar(250) NOT NULL,
  `ps_payu_salt` varchar(250) NOT NULL,
  `tax_id_number` varchar(40) NOT NULL,
  `tax_type` varchar(10) NOT NULL,
  `ps_paypal_pay_mode` tinyint(4) NOT NULL COMMENT '0->Test Mode, 1-> Live Mode'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_paymentsettings`
--

INSERT INTO `nm_paymentsettings` (`ps_id`, `ps_flatshipping`, `ps_taxpercentage`, `ps_extenddays`, `ps_alertdays`, `ps_minfundrequest`, `ps_maxfundrequest`, `ps_referralamount`, `ps_countryid`, `ps_countrycode`, `ps_cursymbol`, `ps_curcode`, `ps_paypal_email`, `ps_paypalaccount`, `ps_paypal_api_pw`, `ps_paypal_api_signature`, `ps_authorize_trans_key`, `ps_authorize_api_id`, `ps_payu_key`, `ps_payu_salt`, `tax_id_number`, `tax_type`, `ps_paypal_pay_mode`) VALUES
(1, '0.00', 0, 0, 0, 0, 0, 0, 1, 'IND', 'Rs', 'INR', 'venugopal-buyer@pofitec.com', 'venugopal-facilitator_api1.pofitec.com', 'U5BL5KK3ZUZVJRNL', 'AhEqPBa2LPCE3sKdenmfssNtAsh0AF4qYwXaeb9bpLQiA-T83dJ-0KHq', '', '', 'gtKFFx', 'eCwWELxi', '22AAAAA100Z100A', 'GST', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_procart`
--

CREATE TABLE `nm_procart` (
  `pc_id` int(10) UNSIGNED NOT NULL,
  `pc_date` datetime NOT NULL,
  `pc_pro_id` int(11) NOT NULL,
  `pc_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nm_procolor`
--

CREATE TABLE `nm_procolor` (
  `pc_id` bigint(20) UNSIGNED NOT NULL,
  `pc_pro_id` int(10) UNSIGNED NOT NULL,
  `pc_co_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_procolor`
--

INSERT INTO `nm_procolor` (`pc_id`, `pc_pro_id`, `pc_co_id`) VALUES
(6, 2, 11),
(9, 1, 52),
(14, 5, 17),
(17, 4, 8),
(116, 9, 13),
(117, 9, 17),
(118, 8, 24),
(119, 8, 18),
(120, 8, 23),
(121, 8, 16),
(122, 8, 14),
(123, 8, 6),
(125, 22, 19),
(126, 34, 11),
(135, 43, 5),
(136, 43, 6),
(137, 45, 5),
(138, 45, 6),
(139, 46, 5),
(140, 46, 6),
(141, 47, 5),
(142, 47, 6),
(143, 49, 5),
(144, 49, 6),
(145, 50, 5),
(146, 50, 6),
(147, 51, 5),
(148, 51, 6),
(151, 53, 5),
(152, 53, 6),
(153, 54, 5),
(154, 54, 6),
(155, 55, 5),
(156, 55, 6),
(157, 56, 5),
(158, 56, 6),
(159, 57, 5),
(160, 57, 6),
(161, 58, 5),
(162, 58, 6),
(163, 59, 5),
(164, 59, 6),
(169, 62, 5),
(170, 62, 6),
(175, 65, 5),
(176, 65, 6),
(177, 66, 5),
(178, 66, 6),
(227, 91, 5),
(228, 91, 6),
(229, 92, 5),
(230, 92, 6),
(257, 36, 24),
(267, 112, 5),
(268, 112, 6),
(269, 113, 5),
(270, 113, 6),
(271, 114, 5),
(272, 114, 6),
(273, 115, 5),
(274, 115, 6),
(275, 116, 5),
(276, 116, 6),
(277, 117, 5),
(278, 117, 6),
(279, 122, 11),
(280, 123, 11),
(281, 124, 11),
(282, 125, 11),
(283, 126, 11),
(284, 127, 11),
(285, 128, 11),
(286, 129, 11),
(287, 130, 11),
(288, 131, 11),
(289, 132, 11),
(290, 133, 11),
(291, 134, 11),
(292, 135, 11),
(294, 137, 5),
(295, 137, 6),
(298, 138, 10),
(299, 138, 6),
(300, 138, 5),
(309, 140, 5),
(310, 140, 6),
(311, 141, 5),
(312, 141, 6),
(313, 142, 5),
(314, 142, 6),
(315, 143, 5),
(316, 143, 6),
(317, 144, 5),
(318, 144, 6),
(319, 145, 5),
(320, 145, 6),
(321, 146, 5),
(322, 146, 6),
(323, 147, 5),
(324, 147, 6),
(325, 148, 5),
(326, 149, 5),
(327, 150, 5),
(328, 153, 5),
(329, 154, 6),
(331, 156, 5),
(332, 157, 11),
(335, 35, 23),
(336, 139, 10),
(337, 139, 6),
(338, 139, 5),
(340, 162, 16),
(341, 162, 6),
(345, 163, 20),
(366, 37, 10),
(501, 167, 61),
(502, 167, 10),
(503, 167, 63),
(504, 167, 59),
(505, 167, 56),
(506, 167, 60),
(507, 167, 57),
(508, 167, 53),
(509, 167, 18),
(510, 167, 14),
(511, 167, 9),
(512, 167, 5),
(513, 168, 21),
(514, 168, 18),
(515, 168, 13),
(548, 165, 52),
(549, 165, 45),
(550, 165, 39),
(551, 165, 37),
(552, 165, 18),
(553, 165, 24),
(554, 165, 56),
(555, 165, 42),
(556, 165, 29),
(557, 165, 26),
(558, 165, 8),
(559, 165, 23),
(560, 165, 60),
(561, 165, 57),
(562, 165, 46),
(563, 165, 28),
(564, 165, 19),
(565, 165, 20),
(566, 165, 16),
(567, 165, 50),
(568, 136, 11),
(584, 177, 25),
(585, 177, 11),
(586, 177, 12),
(599, 185, 5),
(600, 185, 37),
(601, 186, 5),
(602, 186, 37),
(625, 172, 11),
(626, 172, 10),
(627, 172, 8),
(656, 182, 5),
(657, 182, 37),
(660, 183, 37),
(661, 183, 5),
(662, 190, 9),
(663, 190, 16),
(756, 8932, 57),
(757, 8932, 58),
(758, 8932, 45),
(759, 8932, 28),
(772, 8934, 6),
(773, 8934, 17),
(774, 8934, 9),
(775, 8934, 12),
(776, 8933, 17),
(777, 8933, 15),
(778, 8933, 8),
(779, 8933, 64),
(783, 170, 20),
(784, 170, 15),
(785, 170, 13),
(786, 170, 9),
(791, 189, 8),
(792, 189, 13),
(793, 189, 19),
(794, 189, 25),
(795, 93, 5),
(796, 93, 6),
(797, 164, 6),
(798, 164, 21),
(799, 164, 18),
(800, 164, 11),
(801, 164, 5),
(802, 164, 8),
(803, 164, 9),
(804, 164, 10),
(805, 164, 12),
(806, 164, 14),
(807, 164, 13),
(808, 164, 15),
(809, 164, 16),
(810, 164, 17),
(811, 164, 19),
(812, 164, 20),
(813, 164, 24),
(814, 164, 25),
(815, 164, 47),
(831, 195, 9),
(832, 195, 15),
(833, 195, 19),
(834, 195, 20),
(835, 195, 15),
(836, 195, 13),
(840, 169, 12),
(841, 169, 20),
(842, 169, 24),
(847, 166, 18),
(848, 166, 10),
(849, 166, 16),
(852, 201, 11),
(853, 201, 8),
(854, 201, 10);

-- --------------------------------------------------------

--
-- Table structure for table `nm_product`
--

CREATE TABLE `nm_product` (
  `pro_no_of_purchase` int(11) NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `pro_title` varchar(150) NOT NULL,
  `pro_title_fr` varchar(150) NOT NULL,
  `pro_mc_id` smallint(5) UNSIGNED DEFAULT NULL,
  `pro_smc_id` smallint(5) UNSIGNED NOT NULL,
  `pro_sb_id` smallint(5) UNSIGNED NOT NULL,
  `pro_ssb_id` smallint(5) UNSIGNED NOT NULL,
  `product_brand_id` int(11) NOT NULL,
  `pro_price` decimal(15,2) NOT NULL,
  `pro_disprice` decimal(15,2) NOT NULL,
  `pro_discount_percentage` varchar(11) NOT NULL,
  `pro_inctax` tinyint(4) NOT NULL,
  `pro_shippamt` decimal(15,2) NOT NULL,
  `pro_desc` longtext NOT NULL,
  `pro_desc_fr` longtext NOT NULL,
  `pro_isspec` tinyint(4) NOT NULL COMMENT '1-yes 2-no',
  `pro_is_size` int(11) NOT NULL COMMENT '0=>yes, 1=>no',
  `pro_is_color` int(11) NOT NULL COMMENT '0=>yes, 1=>no',
  `pro_delivery` smallint(5) UNSIGNED NOT NULL COMMENT 'in days',
  `pro_mr_id` int(10) UNSIGNED NOT NULL,
  `pro_sh_id` smallint(5) UNSIGNED NOT NULL,
  `pro_mkeywords` text NOT NULL,
  `pro_mkeywords_fr` text NOT NULL,
  `pro_mdesc` text NOT NULL COMMENT 'metadescription',
  `pro_mdesc_fr` text NOT NULL,
  `pro_postfacebook` tinyint(4) NOT NULL,
  `pro_Img` varchar(500) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `pro_status` tinyint(4) NOT NULL COMMENT '2=>Delete ,1=> Active, 0 => Block',
  `pro_image_count` int(11) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `hit_count` int(11) NOT NULL DEFAULT '0',
  `sold_status` int(11) NOT NULL DEFAULT '1',
  `cash_pack` varchar(255) NOT NULL,
  `allow_cancel` enum('0','1') NOT NULL COMMENT '0-No,1-Yes',
  `allow_return` enum('0','1') NOT NULL COMMENT '0-No,1-Yes',
  `allow_replace` enum('0','1') NOT NULL COMMENT '0-No,1-Yes',
  `cancel_policy` text NOT NULL,
  `cancel_policy_fr` text NOT NULL,
  `return_policy` text NOT NULL,
  `return_policy_fr` text NOT NULL,
  `replace_policy` text NOT NULL,
  `replace_policy_fr` text NOT NULL,
  `cancel_days` int(11) NOT NULL,
  `return_days` int(11) NOT NULL,
  `replace_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_product`
--

INSERT INTO `nm_product` (`pro_no_of_purchase`, `pro_id`, `pro_title`, `pro_title_fr`, `pro_mc_id`, `pro_smc_id`, `pro_sb_id`, `pro_ssb_id`, `product_brand_id`, `pro_price`, `pro_disprice`, `pro_discount_percentage`, `pro_inctax`, `pro_shippamt`, `pro_desc`, `pro_desc_fr`, `pro_isspec`, `pro_is_size`, `pro_is_color`, `pro_delivery`, `pro_mr_id`, `pro_sh_id`, `pro_mkeywords`, `pro_mkeywords_fr`, `pro_mdesc`, `pro_mdesc_fr`, `pro_postfacebook`, `pro_Img`, `created_date`, `pro_status`, `pro_image_count`, `pro_qty`, `hit_count`, `sold_status`, `cash_pack`, `allow_cancel`, `allow_return`, `allow_replace`, `cancel_policy`, `cancel_policy_fr`, `return_policy`, `return_policy_fr`, `replace_policy`, `replace_policy_fr`, `cancel_days`, `return_days`, `replace_days`) VALUES
(20, 34, 'Iphone7S ', '', 6, 48, 76, 0, 0, '1500.00', '1000.00', '33', 5, '5.00', 'test', '', 1, 0, 0, 2, 41, 57, 'test', '', 'test', '', 0, 'Product_151333429126569.800x800_6.jpg/**/', '2017-12-15', 1, 1, 20, 40, 1, '10 ', '1', '1', '1', 'test', '', 'test', '', 'test', '', 2, 2, 2),
(23, 35, 'Divastri Cotton', '', 2, 2, 4, 1, 0, '555.00', '5.00', '99', 4, '4.00', 'tt', '', 1, 0, 0, 5, 93, 112, 'g', '', 'g', '', 0, 'Product_151333458431144.800x800.jpg/**/', '2017-12-15', 1, 1, 500, 41, 1, '4', '1', '1', '1', 'fgfg', '', 'vvv', '', 'vv', '', 3, 3, 3),
(51, 36, 'Kid-TShirt ', '', 2, 2, 3, 8, 0, '1500.00', '10.00', '99', 5, '5.00', 'test', '', 1, 0, 0, 5, 41, 57, 'test', '', 'test', '', 0, 'Product_15133367309322.800x800_4.jpg/**/', '2017-12-15', 1, 1, 250, 68, 1, '10', '1', '1', '1', 'test', '', 'test', '', 'test', '', 2, 2, 2),
(1, 37, 'Oomph ', '', 2, 2, 3, 8, 0, '850.00', '750.00', '11', 5, '5.00', 'test', '', 1, 0, 0, 3, 41, 61, 'test', '', 'test', '', 0, 'Product_15133374623174.800x800_7.jpg/**/', '2017-12-15', 1, 1, 2, 12, 1, '5 ', '1', '1', '1', 'test', '', 'test', '', 'test', '', 2, 2, 2),
(17, 38, 'Fashion design', '', 3, 7, 19, 22, 0, '500.00', '2.00', '100', 5, '5.00', 'tst', '', 2, 1, 1, 2, 41, 61, 'tst', '', 'tst', '', 0, 'Product_151342661915880.Deal_1512811950.top -2 800x800.jpg/**/', '2017-12-16', 1, 1, 200, 35, 1, '2', '1', '1', '1', 'tst', '', 'tst', '', 'tst', '', 2, 2, 2),
(1, 39, 'Design Willa', '', 3, 7, 19, 22, 0, '2500.00', '2000.00', '20', 10, '10.00', 'test', '', 2, 1, 1, 4, 41, 61, 'test', '', 'test', '', 0, 'Product_151359143022749.jpg/**/', '2017-12-16', 1, 1, 20, 4, 1, '5', '1', '1', '1', 'test', '', 'test', '', 'test', '', 10, 10, 10),
(4, 40, 'chek now image', '', 2, 2, 4, 1, 0, '20.00', '10.00', '50', 0, '0.00', 'b', '', 2, 1, 1, 4, 59, 62, 'sdf', '', 'sdf', '', 0, 'Product_151359200131102.jpg/**/Product_15135920233492.jpg/**/', '2017-12-18', 1, 2, 10, 13, 1, '0 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(10, 41, 'image check 3', '', 3, 4, 0, 0, 0, '20.00', '5.00', '75', 0, '0.00', 'Description', '', 2, 1, 1, 5, 58, 59, '', '', '', '', 0, 'Product_1513593843.png/**/', '2017-11-18', 1, 1, 10, 33, 1, '10', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 42, 'Shoe', '', 7, 17, 26, 0, 0, '300.00', '200.00', '33', 0, '0.00', 'ghgh', '', 2, 1, 1, 3, 41, 61, '', '', '', '', 0, 'Product_151360162426322.jpeg/**/', '2017-12-18', 0, 1, 3, 0, 1, '0 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 43, 'merchant2 product bulk upload submit row4', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 62, 65, 'keytest', '', 'desc', '', 0, '1513765811800-800.jpg/**/', '2017-12-20', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(5, 44, 'ytuyu', '', 2, 2, 4, 1, 0, '23.00', '11.00', '52', 0, '0.00', 'eree', '', 2, 1, 1, 12, 41, 57, '', '', '', '', 0, 'Product_151376625522993.gif/**/', '2017-12-20', 1, 1, 454, 12, 1, '0 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 45, 'title', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 62, 65, 'keytest', '', 'desc', '', 0, '1513776664800-800.jpg/**/', '2017-12-20', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 46, 'title2', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 62, 65, 'keytest', '', 'desc', '', 0, '1513776665800-800.jpg/**/', '2017-12-20', 1, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(4, 47, '22', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 62, 65, 'keytest', '', 'desc', '', 0, '1513776666800-800.jpg/**/', '2017-12-20', 1, 0, 12, 13, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(10, 48, 'pro 7:11', '', 2, 2, 3, 0, 0, '5.00', '1.00', '80', 0, '0.00', 'des', '', 2, 0, 1, 3, 92, 111, '', '', '', '', 0, 'Product_151377738128996.jpg/**/', '2017-12-20', 1, 1, 10, 12, 1, '0 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 49, 'ptitle', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513830839800-800.jpg/**/', '2017-12-21', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 1, 6),
(0, 50, 'ptitle2', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513830839800-800.jpg/**/', '2017-12-21', 1, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 6, 1, 7),
(0, 51, 'p22', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513830839800-800.jpg/**/', '2017-12-21', 1, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 7, 1, 8),
(0, 52, 'ptitle', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '6', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 2, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513832545800-800.jpg/**/', '2017-12-21', 1, 1, 10, 2, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 53, 'ptitle2', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513832545800-800.jpg/**/', '2017-12-21', 1, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 54, 'p22', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513832545800-800.jpg/**/', '2017-12-21', 1, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 55, 'ptitle11', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513832646800-800.jpg/**/', '2017-12-21', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 56, 'ptitle121', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513832647800-800.jpg/**/', '2017-12-21', 1, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 57, 'p2211', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513832647800-800.jpg/**/', '2017-12-21', 1, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(1, 58, 'malar_product', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513835919800-800.jpg/**/', '2017-12-21', 1, 0, 10, 4, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 59, 'pro2', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513835919800-800.jpg/**/', '2017-12-21', 1, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 60, 'malar_product1', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513835920800-800.jpg/**/', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 61, 'malar_product1', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513835971800-800.jpg/**/', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 62, 'pro21', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513835971800-800.jpg/**/', '2017-12-21', 1, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 63, 'malar_product11', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513835972800-800.jpg/**/', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 64, 'malar_product1', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513836242800-800.jpg/**/', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 65, 'product', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513836243800-800.jpg/**/', '2017-12-21', 1, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 66, 'malar_produc', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513836243800-800.jpg/**/', '2017-12-21', 1, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 67, 'malar_product1', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513836734800-800.jpg/**/', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 68, 'product1', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513836734800-800.jpg/**/', '2017-12-21', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 69, 'malar_produc1', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513836735800-800.jpg/**/', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 70, 'malar_product1', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513836808800-800.jpg/**/', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 71, 'product11', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513836808800-800.jpg/**/', '2017-12-21', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 72, 'malar_produc11', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513836808800-800.jpg/**/', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 73, 'malar_product1', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513836917800-800.jpg/**/', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 74, 'product11w', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513836917800-800.jpg/**/', '2017-12-21', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 75, 'malar_produc11w', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513836918800-800.jpg/**/', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 76, 'malar_product1', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513837141800-800.jpg/**/', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 77, 'product11w', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513837141800-800.jpg/**/', '2017-12-21', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 78, 'malar_produc11w', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513837142800-800.jpg/**/', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 79, 'malar_product1', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513837281800-800.jpg/**/', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 80, 'product11w1', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513837281800-800.jpg/**/', '2017-12-21', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 81, 'malar_produc11w1', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513837282800-800.jpg/**/', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 82, 'malar_product1', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513837415800-800.jpg/**/', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 83, 'product11w14', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513837415800-800.jpg/**/', '2017-12-21', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 84, 'malar_produc11w14', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513837415800-800.jpg/**/', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 85, 'malar_product12', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513839077800-800.jpg/**/', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 86, 'product11w14q5', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513839078800-800.jpg/**/', '2017-12-21', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 87, 'malar_produc11w14q5', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513839079800-800.jpg/**/', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 88, 'malar_produsct12', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513856103800-800.jpg/**/1513856104250-200.jpg/**/', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 89, 'product11w14q50s', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513856105800-800.jpg/**/1513856105250-200.jpg/**/', '2017-12-21', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 90, 'malar_produc11w1s4q50', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513856106800-800.jpg/**/1513856106250-200.jpg/**/', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 91, 'product1', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513856414800-800.jpg/**/1513856414250-200.jpg/**/', '2017-12-21', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 92, 'product2', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513856414800-800.jpg/**/1513856414250-200.jpg/**/', '2017-12-21', 1, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 93, 'product3', '', 6, 48, 0, 0, 0, '600.00', '216.00', '64', 0, '2.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513856415800-800.jpg/**/Product_151385649422172.jpg/**/', '2017-12-21', 1, 1, 12, 1, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 94, 'sharkz', '', 2, 2, 3, 8, 0, '500.00', '100.00', '80', 0, '0.00', 'ddd', '', 2, 1, 1, 1, 41, 57, 'sas', '', 'sasaas', '', 0, 'Product_151385643119150.png/**/Product_151385645610751.png/**/', '2017-12-21', 1, 1, 5, 0, 1, '0 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(5, 95, 'golo watch', '', 2, 10, 15, 0, 0, '500.00', '100.00', '80', 0, '0.00', 'fefe', '', 2, 1, 1, 4, 58, 59, 'fefe', '', 'egeg', '', 0, 'Product_15138565545604.png/**/Product_151385655531309.png/**/Product_151385655514594.png/**/Product_15138565554627.png/**/Product_151385655511344.png/**/', '2017-12-21', 1, 1, 5, 7, 0, '0 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 96, 'product4', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 97, 'product5', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-21', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 98, 'product6', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(5, 99, 'gold chain', '', 2, 10, 15, 0, 0, '300.00', '100.00', '67', 0, '0.00', 'eee', '', 2, 1, 1, 2, 62, 65, 'hhaha', '', 'ttt', '', 0, 'Product_15138566886309.png/**/', '2017-12-21', 1, 1, 5, 2, 1, '0 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 100, 'd', '', 2, 10, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 101, 'y', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-21', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 102, 'g', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a\n huge crowd of buyers in mind, your descriptions\n become wishy-washy and you end up addressing no one at all.', '', 2, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 103, '5', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 104, 'check1', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 105, 'check2', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-21', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 106, 'check3', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a\n huge crowd of buyers in mind, your descriptions\n become wishy-washy and you end up addressing no one at all.', '', 2, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-21', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 107, 'check4', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-21', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 108, 'check11', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-22', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 109, 'check21', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-22', 2, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 110, 'check31', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a\n huge crowd of buyers in mind, your descriptions\n become wishy-washy and you end up addressing no one at all.', '', 2, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-22', 2, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 111, 'check41', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-22', 2, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 112, 'check111', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513922362800-800.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 113, 'check211', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513922363800-800.jpg/**/', '2017-12-22', 1, 0, 11, 0, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 114, 'check311', '', 6, 48, 0, 0, 0, '8002.00', '7502.00', '', 0, '52.00', 'When you write a product description with a\n huge crowd of buyers in mind, your descriptions\n become wishy-washy and you end up addressing no one at all.', '', 2, 0, 0, 5, 58, 59, 'keytest', '', 'desc', '', 0, '1513922363800-800.jpg/**/', '2017-12-22', 1, 0, 12, 0, 1, '2', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 115, 'check411', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '1513922363800-800.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 116, 'check1r111', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 3, 58, 59, 'keytest', '', 'desc', '', 0, '', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 117, 'check2r111', '', 6, 48, 0, 0, 0, '8001.00', '7501.00', '', 0, '51.00', 'When you write a product description with a huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 0, 4, 58, 59, 'keytest', '', 'desc', '', 0, '1513933971800-800.jpg/**/', '2017-12-22', 1, 0, 11, 1, 1, '1', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(4, 118, 'aj', '', 2, 2, 3, 0, 0, '200.00', '100.00', '', 0, '0.00', 'ee', '', 2, 1, 1, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139352991.png/**/', '2017-12-22', 1, 0, 4, 7, 1, '0', '', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 119, 'gooal', '', 2, 2, 3, 0, 0, '200.00', '100.00', '', 0, '0.00', 'ee', '', 2, 1, 1, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139354805.png/**/', '2017-12-22', 1, 0, 4, 0, 1, '0', '', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 120, 'zs', '', 2, 2, 3, 0, 0, '200.00', '100.00', '', 0, '0.00', 'ee', '', 2, 1, 1, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139356556.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '0', '', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 121, 'zsa', '', 2, 2, 3, 0, 0, '200.00', '100.00', '', 0, '0.00', 'ee', '', 2, 1, 1, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139357816.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '0', '', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 122, 'zsaz', '', 2, 2, 3, 8, 0, '200.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139363283.png/**/', '2017-12-22', 1, 0, 4, 0, 1, '0', '', '0', '0', 'haha', '', '', '', '', '', 0, 0, 0),
(0, 123, 'zsazs', '', 2, 2, 3, 8, 0, '200.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139364976.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '0', '', '1', '1', 'haha', '', 'ee', '', 'eer', '', 0, 0, 0),
(0, 124, 'zsazsz', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139373956.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '0', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 0, 0, 0),
(0, 125, 'haha', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139375086.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 0, 0, 0),
(0, 126, 'haha1', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139387256.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 1, 0, 0),
(0, 127, 'haha12', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139389416.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 12, 0, 0),
(0, 128, 'haha123', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139393076.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 12, 11, 0),
(0, 129, 'haha1234', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139396626.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 12, 11, 7),
(0, 130, 'haha12345', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139398456.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 12, 11, 7),
(0, 131, 'ee', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139404086.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 12, 11, 7),
(0, 132, 'eez', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139405266.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 12, 11, 7),
(0, 133, 'eezw', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139407476.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 12, 11, 7),
(0, 134, 'eezwa', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139408346.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 12, 11, 7),
(0, 135, 'eezwar', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '', 0, '50.00', 'ee', '', 1, 0, 0, 2, 67, 73, 'jeje', '', 'sjssj', '', 0, '15139410776.jpg/**/', '2017-12-22', 1, 0, 4, 0, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 12, 11, 7),
(0, 136, 'eezwara', '', 2, 2, 3, 8, 0, '1000.00', '100.00', '90', 0, '50.00', 'ee', '', 1, 0, 0, 2, 89, 104, 'jeje', '', 'sjssj', '', 0, '15139418806.jpg/**/', '2017-12-22', 1, 1, 4, 1, 1, '50', '1', '1', '1', 'haha', '', 'ee', '', 'eer', '', 12, 11, 7),
(1, 137, 'azx', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139426806.jpg/**/', '2017-12-22', 1, 0, 10, 6, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 1, 6),
(13, 138, 'final_check', '', 2, 2, 3, 8, 0, '9000.00', '8500.00', '6', 10, '150.00', 'ka', '', 1, 0, 0, 4, 60, 63, 'keytestz', '', 'descz', '', 0, 'Product_1513943423558.jpg/**/', '2017-12-22', 1, 1, 15, 19, 1, '10', '1', '1', '1', 'Test descs', '', 'ee', '', 'cancelpolicy descx', '', 4, 2, 5),
(3, 139, 'editz', '', 2, 2, 0, 0, 0, '9000.00', '8500.00', '6', 5, '40.00', 'ka', '', 1, 0, 0, 4, 67, 74, 'keytestz', '', 'descz', '', 0, 'Product_1513945278.jpg/**/', '2017-12-22', 1, 1, 15, 8, 1, '5', '1', '1', '1', 'Test descz', '', 'az', '', 'cancelpolicy descz', '', 1, 5, 5),
(0, 140, 'final_check', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 5, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139466026.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 1, 6),
(0, 141, 'x', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139466696.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 1, 6),
(0, 142, 'xm', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139467376.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 1, 6),
(0, 143, 'xmz', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139479476.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 144, 'xmzv', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139481926.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 0, 0, 0),
(0, 145, 'xmzvk', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139483206.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 4, 0, 0),
(0, 146, 'xmzvka', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139485256.jpg/**/', '2017-12-22', 1, 0, 10, 1, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 4, 7, 9),
(0, 147, 'xmzvkaz', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139486236.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '1', '1', 'Test desc', '', 'yes', '', 'cancelpolicy desc', '', 4, 7, 9),
(0, 148, 'xmzvkaza', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139505666.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '1', '1', 'Test desc', '', 'yes', '', 'cancelpolicy desc', '', 4, 7, 9),
(0, 149, 'xx', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '1', '1', 'Test desc', '', 'yes', '', 'cancelpolicy desc', '', 4, 7, 9),
(0, 150, 'xxd', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '1', '1', 'Test desc', '', 'yes', '', 'cancelpolicy desc', '', 4, 7, 9),
(0, 151, 'dd', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '', '2017-12-22', 1, 0, 10, 1, 1, '0', '1', '1', '1', 'Test desc', '', 'yes', '', 'cancelpolicy desc', '', 4, 7, 9),
(0, 152, 'ww', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '1', '1', 'Test desc', '', 'yes', '', 'cancelpolicy desc', '', 4, 7, 9),
(0, 153, 'es', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 15, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139520026.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '1', '1', 'Test desc', '', 'yes', '', 'cancelpolicy desc', '', 4, 7, 9),
(0, 154, 'xxq', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 8, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139529921.jpg/**/15139529922.jpg/**/', '2017-12-22', 1, 0, 10, 0, 1, '0', '1', '1', '1', 'Test desc', '', 'yes', '', 'cancelpolicy desc', '', 4, 7, 9),
(0, 155, 'xxqqq', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 8, '50.00', 'k', '', 1, 0, 0, 3, 67, 73, 'keytest', '', 'desc', '', 0, '15139530631.jpg/**/15139530632.jpg/**/', '2017-12-22', 1, 0, 10, 1, 1, '0', '1', '1', '1', 'Test desc', '', 'yes', '', 'cancelpolicy desc', '', 4, 7, 9),
(0, 156, 'y', '', 2, 2, 0, 0, 0, '700.00', '500.00', '', 8, '10.00', 'a', '', 2, 0, 0, 1, 59, 62, 'ee', '', 'dd', '', 0, '15139530633.jpg/**/15139530634.jpg/**/', '2017-12-22', 1, 0, 2, 0, 1, '50', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(5, 157, 'z', '', 2, 10, 0, 0, 0, '500.00', '100.00', '', 8, '56.00', 'e', '', 2, 0, 0, 2, 62, 65, 'eew', '', 'sa', '', 0, '15139530635.jpg/**/15139530636.jpg/**/', '2017-12-22', 1, 0, 5, 1, 0, '32', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 158, 'saree', '', 3, 4, 5, 0, 0, '1000.00', '800.00', '20', 0, '0.00', 'nice to wear', '', 2, 1, 1, 2, 58, 59, 'saree', '', 'saree', '', 0, 'Product_151435794119551.jpg/**/', '2017-12-27', 1, 1, 50, 3, 1, '10', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 159, 'Powder', '', 4, 6, 24, 33, 0, '150.00', '100.00', '33', 5, '40.00', 'powder', '', 2, 1, 1, 4, 58, 59, 'powder', '', 'powder', '', 0, 'Product_151437376710879.jpg/**/', '2017-12-27', 1, 1, 50, 11, 1, '5', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(8, 160, 'silk saree', '', 3, 4, 0, 0, 0, '90001.00', '85001.00', '5', 5, '40.00', 'sf', '', 2, 1, 1, 2, 41, 57, 'saree', '', 'saree', '', 0, '800 800JJo5wiKc.jpg/**/', '2017-12-27', 1, 1, 50, 11, 1, '5', '1', '0', '0', 'asdsa', '', '', '', '', '', 10, 0, 0),
(45, 161, 'venu check', '', 5, 14, 0, 0, 0, '36.00', '3.00', '91', 0, '0.00', 'Description&nbsp;', '', 2, 0, 1, 4, 58, 59, '', '', '', '', 0, 'Product_151498447117205.jpg/**/', '2018-01-03', 1, 1, 20000, 56, 1, '100', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(3, 162, 'product_1', '', 2, 11, 0, 0, 0, '5.00', '2.00', '60', 0, '0.00', 'Description&nbsp;', '', 2, 0, 0, 10, 41, 57, '', '', '', '', 0, 'Product_151498661025833.jpg/**/', '2018-01-03', 1, 1, 10, 7, 1, '10 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 163, 'fdgdfg', '', 2, 2, 0, 0, 0, '100.00', '3.00', '97', 4, '0.00', 'Description&nbsp;', '', 1, 0, 0, 3, 58, 59, '', '', '', '', 0, 'Product_15149868518119.jpg/**/', '2018-01-03', 1, 1, 10, 3, 1, '10 ', '1', '0', '0', 'sdfs', '', '', '', '', '', 2, 0, 0);
INSERT INTO `nm_product` (`pro_no_of_purchase`, `pro_id`, `pro_title`, `pro_title_fr`, `pro_mc_id`, `pro_smc_id`, `pro_sb_id`, `pro_ssb_id`, `product_brand_id`, `pro_price`, `pro_disprice`, `pro_discount_percentage`, `pro_inctax`, `pro_shippamt`, `pro_desc`, `pro_desc_fr`, `pro_isspec`, `pro_is_size`, `pro_is_color`, `pro_delivery`, `pro_mr_id`, `pro_sh_id`, `pro_mkeywords`, `pro_mkeywords_fr`, `pro_mdesc`, `pro_mdesc_fr`, `pro_postfacebook`, `pro_Img`, `created_date`, `pro_status`, `pro_image_count`, `pro_qty`, `hit_count`, `sold_status`, `cash_pack`, `allow_cancel`, `allow_return`, `allow_replace`, `cancel_policy`, `cancel_policy_fr`, `return_policy`, `return_policy_fr`, `replace_policy`, `replace_policy_fr`, `cancel_days`, `return_days`, `replace_days`) VALUES
(4, 164, 'Test Products 1Test Products 1Test Products 1Test Products 1Test Products 1Test Products 1Test Products 1Test Products 1Test Products 1Test Products 1', '', 2, 10, 0, 0, 0, '989.00', '751.00', '24', 10, '1200.00', '<h1>Test&nbsp;</h1><br><span class=\"wysiwyg-color-green\">Test black<br><br><b>Test Bold<br></b><br><i>Test Italic<br></i><br><u>Test Underline<br></u></span><ul><li><span class=\"wysiwyg-color-green\"><u>Test Bullet1</u></span></li><li><span class=\"wysiwyg-color-green\"><u>Test Bullet2</u></span></li></ul><ol><li>Test Orderlist 1</li><li>Test Orderlist 2&nbsp; &nbsp;&nbsp;</li></ol>Test Outdent Test Outdent Test Outdent Test Outdent Test Outdent&nbsp;<br><br><blockquote>Test Indent Test Indent Test Indent Test Indent Test Indent Test Indent&nbsp;<br><br><a href=\"http://192.168.0.24/laravelecommerce_with_lang\" target=\"_self\" rel=\"\">http://192.168.0.24/laravelecommerce_with_lang</a> <br><br><img alt=\"\" src=\"http://192.168.0.24/laravelecommerce_with_lang/assets/product/800 800JJo5wiKc.jpg\"><br><br><br><br><br></blockquote>', '', 2, 0, 0, 1, 62, 65, 'Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords Test Meta Keywords ', '', 'Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description Test Meta Description ', '', 0, '/**/Product_151504245613841.jpg/**/Product_151504245625462.jpg/**/', '2018-01-04', 1, 1, 10, 23, 1, '10', '1', '1', '1', 'Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy Test Cancellation Policy&nbsp;', '', 'Test Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Test Return&nbsp;Policy Return Policy&nbsp;', '', 'Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy Test Replacement Policy&nbsp;', '', 10, 5, 2),
(0, 165, 'product1', '', 5, 14, 0, 0, 0, '99999999.99', '99999999.99', '0', 23, '120.00', 'fghgfh', '', 2, 0, 0, 2, 41, 57, 'dgfdg', '', 'ghfh', '', 0, 'Product_151506509011805.jpg/**/', '2018-01-04', 1, 1, 23, 0, 1, '10', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 166, 'sfsdf', '', 3, 4, 7, 35, 0, '1230000000.00', '1212101010.00', '1', 8, '2.00', 'gfhgfjh', '', 1, 0, 0, 21, 58, 59, 'fhgfjh', '', 'fhgfhg', '', 0, 'Product_151513161028783.jpg/**/', '2018-01-05', 1, 1, 10, 0, 1, '10', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(7, 167, 'RG - Cloths', '', 2, 2, 3, 9, 0, '456.00', '300.00', '34', 12, '0.00', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>', '', 1, 0, 0, 5, 0, 75, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '', 0, 'Cloud9_Shirtoq1dlejr.png/**/Product_151565764132600.jpg/**/Product_151565764114513.jpg/**/Product_151565764116790.jpg/**/Product_151565768922897.jpg/**/', '2018-01-05', 1, 1, 45, 13, 1, '0', '1', '1', '1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>', '', 'Enter Replacement PolicyIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.<br>', '', 10, 10, 10),
(10, 168, 'Nike', '', 2, 10, 0, 0, 0, '450.00', '350.00', '22', 0, '0.00', 'How can you tell&nbsp;if your Nike Air Max 90 shoes are real or fake? We are going to study two&nbsp;pairs of the classic style Air Max 90. One&nbsp;pair&nbsp;is real and made by Nike, the other&nbsp;is a&nbsp;Nike Air Max 90 counterfeit: 100% fake. How can you spot the fake Air Max? What are some of the&nbsp;differences in the real shoe vs. the fake shoe?', '', 1, 0, 0, 2, 68, 75, 'On our fake Air Max 90, the stitching groove interferes with the “A” and the “R” of the Nike Air logo. Also, the counterfeit shoe “Air” logo is missing the molded ribs below the letters. Additionally, the top shape of the OG Nike patch has a significant dip in the middle.', '', 'On our fake Air Max 90, the stitching groove interferes with the “A” and the “R” of the Nike Air logo. Also, the counterfeit shoe “Air” logo is missing the molded ribs below the letters. Additionally, the top shape of the OG Nike patch has a significant dip in the middle.', '', 0, 'nikeKqnWwId8.jpg/**/', '2018-01-05', 1, 1, 10, 20, 0, '0', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(25, 169, 'PUMA', '', 2, 10, 0, 0, 0, '450.00', '305.00', '32', 1, '0.00', 'Challenge: create a motorsport-inspired shoe that embodies speed, even when it\'s standing still. The result? The latest iteration of the PUMA Future Cat. Metallic graphics on the leather upper take inspiration from a wind tunnel, while an asymmetrical lacing system and rounded heel are driver\'s seat-ready.<br>', '', 1, 0, 0, 3, 68, 75, 'Soft, full grain leather upper with printed metallic, wind tunnel-inspired graphics and synthetic trimmings', '', 'Cushioned heel for optimum comfort\r\nRubber outsole for added grip', '', 0, 'pumayqmhyJSD.jpg/**/', '2018-01-05', 1, 1, 26, 7, 1, '0', '1', '1', '0', 'As long as the package has not left our warehouse, the order may be cancelled. Cancellations can be carried out by contacting our Customer Service on telephone&nbsp;<b>1800 102 7862</b><br>', '', 'Returns generally take 2-4 days to process. Refunds will be issued to the original payment method.', '', '', '', 2, 4, 0),
(31, 170, 'were', '', 3, 4, 7, 0, 0, '10.00', '5.00', '50', 2, '5.00', 'Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;Test purchase product&nbsp;', '', 2, 0, 0, 5, 62, 65, 'TTest purchase product Test purchase product Test purchase product Test purchase product ', '', 'Test purchase product Test purchase product Test purchase product Test purchase product Test purchase product ', '', 0, 'Product_15153869973732.jpg/**/Product_151538699732061.jpg/**/Product_15153869976450.jpg/**/', '2018-01-08', 1, 1, 31, 50, 0, '0 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(49, 171, 'books', '', 9, 20, 0, 0, 0, '80.00', '60.00', '25', 0, '0.00', 'as', '', 2, 1, 1, 5, 60, 63, 'as', '', 'as', '', 0, 'Product_151540668127412.jpg/**/', '2018-01-08', 1, 1, 60, 34, 1, '100', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(11, 172, 'Test merchant product ', '', 3, 4, 7, 35, 0, '50.00', '40.00', '20', 0, '10.00', 'Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;Test merchant product&nbsp;', '', 2, 0, 0, 1, 62, 65, '', '', '', '', 0, 'sunidhi-creation-mann257-m-1-2xkrKAzUMZ.jpg/**/Product_15162682467581.jpg/**/', '2018-01-08', 1, 3, 11, 40, 0, '0', '1', '1', '0', 'test', '', 'test', '', '', '', 2, 0, 0),
(13, 173, 'venu_check_color', '', 2, 2, 3, 8, 0, '100.00', '80.00', '20', 2, '0.00', 'Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;', '', 1, 0, 0, 3, 62, 65, 'Test merchant product2 ', '', 'Test merchant product2 ', '', 0, 'designer-saree-red-chiffon-sareeglg4AvRL.jpg/**/', '2018-01-08', 1, 1, 13, 31, 0, '0', '1', '1', '1', 'Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;', '', 'Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;', '', 'Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;Test merchant product2&nbsp;', '', 2, 3, 4),
(24, 174, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem ', '', 2, 2, 3, 9, 0, '12.00', '1.00', '91', 0, '0.00', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 2, 0, 1, 32, 60, 63, '', '', '', '', 0, 'Product_15155835735261.jpg/**/', '2018-01-10', 1, 1, 333, 56, 1, '10 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 175, 'new product', '', 2, 2, 3, 8, 0, '250.00', '100.00', '60', 0, '0.00', 'hguyiukj', '', 1, 1, 1, 20, 58, 59, 'dfdg', '', 'dfdg', '', 0, 'Product_151583900716721.jpg/**/', '2018-01-13', 1, 1, 50, 1, 1, '10', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(4, 176, 'Samsung', '', 6, 48, 0, 0, 0, '562.00', '421.00', '25', 0, '1.00', 'rgytuyt', '', 1, 1, 1, 15, 60, 63, 'Samsung1', '', 'Samsung Samsung', '', 0, 'Product_151608389024125.jpg/**/', '2018-01-13', 1, 1, 15, 37, 1, '10', '1', '0', '0', 'dsgfdsfgdsfg', '', '', '', '', '', 5, 0, 0),
(7, 177, 'Skullcandy', '', 6, 48, 0, 0, 0, '13399.00', '11200.00', '16', 2, '0.00', '<b>kullcandy</b>&nbsp;Hesh 2 Wireless. If you don\'t want to spend more than double or triple the cost on the Bose SoundLink On-Ear Bluetooth or Beats\' wireless&nbsp;<b>headphones</b>, the Hesh 2 Wireless is a decent budget Bluetooth&nbsp;<b>headphone</b>choice.', '', 1, 1, 0, 4, 67, 73, 'test', '', 'test', '', 0, 'Product_151608985410643.jpg/**/', '2018-01-16', 1, 1, 10, 11, 1, '0 ', '1', '1', '1', '<b>Cancellation Policy</b>. We require 4 days&nbsp;<b>cancellation</b>&nbsp;notice prior to your scheduled arrival, otherwise we will charge you&nbsp;<b>cancellation</b>&nbsp;fee as below. 10% of your total amount will be charged if you do not notify us about your&nbsp;<b>cancellation</b>&nbsp;or any changes by 2 to 4 days before your scheduled arrival.', '', 'Generally, merchandise purchased in store or on Walmart.com can be returned or exchanged within ninety (90) days of purchase with or without a&nbsp;<b>receipt</b>. Below&nbsp;are<b>exceptions</b>&nbsp;to the general ninety (90) day rule. All of the&nbsp;<b>exceptions</b>&nbsp;listed below require the merchandise be returned with a&nbsp;<b>receipt</b>.', '', '<b>Replacement policy</b>&nbsp;is an insurance&nbsp;<b>policy</b>&nbsp;between an insurance company and a consumer which promises to pay the insured the&nbsp;<b>replacement</b>&nbsp;value of the subject of the&nbsp;<b>policy</b>&nbsp;if a loss occurs.', '', 5, 4, 3),
(0, 178, 'test', '', 2, 2, 4, 1, 0, '234.00', '23.00', '90', 0, '1.00', 'eeerwerwer', '', 1, 1, 1, 23, 58, 59, '', '', '', '', 0, 'Product_151611372012871.png/**/', '2018-01-16', 1, 1, 190, 1, 1, '0 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 179, 'Raymond', '', 4, 6, 22, 33, 0, '1200.00', '899.00', '25', 2, '30.00', 'The world\'s oldest preserved garment, discovered by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Flinders_Petrie\" target=\"\" rel=\"\">Flinders Petrie</a>, is a \"highly sophisticated\" linen shirt from a First Dynasty Egyptian tomb at&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tarkhan_(Egypt)\" target=\"\" rel=\"\">Tarkan</a>, c. 3000 BC: \"the shoulders and sleeves have been finely pleated to give form-fitting trimness while allowing the wearer room to move', '', 2, 0, 0, 7, 68, 75, 'Henley shirt ', '', 'a collarless polo shirt', '', 0, 'Product_15161826424782.jpg/**/', '2018-01-17', 1, 1, 10, 9, 1, '0 ', '1', '1', '1', 'test', '', 'test', '', 'test', '', 2, 3, 4),
(5, 180, 'Baby Bed', '', 4, 6, 18, 19, 0, '2640.00', '1805.00', '31', 0, '60.00', 'The standard full-size&nbsp;<b>crib</b>&nbsp;mattress is 27¼ inches by 52 inches, and the&nbsp;<b>crib</b>&nbsp;30 inches by 54 inches. Voluntary standards set by the ASTM and the Juvenile Products Manufacturers Assn. require that the openings between slats be no greater than 2? inches, so that&nbsp;<b>babies</b>\' heads can\'t be caught.', '', 1, 0, 0, 4, 68, 75, 'test', '', 'test', '', 0, 'Product_151618957724186.jpg/**/', '2018-01-17', 1, 1, 15, 25, 1, '0 ', '0', '0', '0', 'test', '', 'test', '', 'test', '', 0, 2, 0),
(6, 181, 'Umberlla Shirts', '', 2, 2, 4, 1, 0, '800.00', '750.00', '6', 3, '0.00', '<span>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy<br></span>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy<br><br><ul><li>infancy</li><li>hhjhgj</li><li>ghjhgj</li><li>ghjhgj</li><li>ghhgjhgj</li></ul><br><br>', '', 1, 0, 0, 4, 68, 75, 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy', '', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy', '', 0, 'Product_151619049815917.jpg/**/Product_151626001824551.jpg/**/Product_151627246619806.jpg/**/Product_151627246617727.jpg/**/', '2018-01-17', 1, 1, 12, 117, 1, '0 ', '1', '1', '1', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy', '', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy', '', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy', '', 2, 5, 0),
(4, 182, 'check1111', '', 2, 10, 0, 0, 0, '10.00', '5.00', '', 0, '50.00', 'When you write a product description with a\r\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 2, 0, 0, 3, 41, 57, 'keytest', '', 'desc', '', 0, '15162006691.jpg/**/', '2018-01-17', 1, 0, 10, 5, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 1, 6),
(3, 183, 'check12', '', 2, 10, 0, 0, 0, '10.00', '5.00', '', 0, '50.00', 'When you write a product description with a\r\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 2, 0, 0, 3, 41, 57, 'keytest', '', 'desc', '', 0, '15162007361.jpg/**/15162007361.jpg/**/15162007361.jpg/**/15162007361.jpg/**/15162007361.jpg/**/', '2018-01-17', 1, 0, 10, 12, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 1, 6),
(3, 184, 'check123', '', 2, 10, 0, 0, 0, '10.00', '5.00', '', 0, '50.00', 'When you write a product description with a\r\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 2, 0, 0, 3, 41, 57, 'keytest', '', 'desc', '', 0, '15162010181.jpg/**/15162010182.jpg/**/15162010194.jpg/**/15162010194.jpg/**/15162010195.jpg/**/', '2018-01-17', 1, 0, 10, 4, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 1, 6),
(4, 185, 'check1234', '', 2, 10, 0, 0, 0, '10.00', '5.00', '', 0, '50.00', 'When you write a product description with a\r\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 2, 0, 0, 3, 41, 57, 'keytest', '', 'desc', '', 0, '15162010921.jpg/**/15162010922.jpg/**/15162010924.jpg/**/15162010924.jpg/**/15162010925.jpg/**/', '2018-01-17', 1, 0, 10, 5, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 1, 6),
(0, 186, 'check_calc', '', 2, 10, 0, 0, 0, '10.00', '10.00', '0', 0, '50.00', 'When you write a product description with a\r\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 2, 0, 0, 3, 93, 112, 'keytest', '', 'desc', '', 0, '15162010921.jpg/**/15162010922.jpg/**/15162010924.jpg/**/15162010924.jpg/**/15162010925.jpg/**/', '2018-01-17', 0, 1, 10, 3, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 0, 6),
(0, 187, 'check123456', '', 2, 10, 0, 0, 0, '10.00', '5.00', '50', 0, '50.00', 'When you write a product description with a\r\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 1, 3, 41, 57, 'keytest', '', 'desc', '', 0, '15162010931.jpg/**/Product_151627198227425.jpg/**/Product_151627235919562.jpg/**/Product_15162723591371.jpg/**/Product_151627235912792.jpg/**/', '2018-01-17', 2, 1, 10, 0, 1, '0', '1', '0', '1', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 0, 6),
(0, 188, 'product1234', '', 2, 2, 3, 61, 0, '234.00', '131.00', '44', 12, '32.00', 'fefs', '', 1, 0, 0, 56, 58, 89, 'hfgj', '', 'fggdhh', '', 0, 'Product_15179900118512.jpg/**/', '2018-02-07', 2, 1, 243, 0, 1, '234', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(12, 189, 'test product', '', 2, 10, 0, 0, 0, '1000.00', '800.00', '20', 3, '0.00', 'test', '', 1, 0, 0, 3, 58, 59, '', '', '', '', 0, 'Product_151971673925671.jpg/**/Product_15197167401140.jpg/**/', '2018-02-27', 1, 1, 30, 7, 1, '200', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(8, 190, 'dress', '', 2, 11, 17, 0, 0, '5.00', '4.00', '20', 0, '0.00', 'test', '', 2, 1, 1, 5, 90, 105, '', '', '', '', 0, 'skullcandyQeCe84Z9.jpg/**/', '2018-03-01', 1, 1, 20, 12, 1, '0', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(12, 191, 'High Heal', '', 3, 7, 26, 0, 0, '500.00', '3.00', '99', 0, '0.00', 'TEST', '', 2, 1, 1, 5, 90, 105, '', '', '', '', 0, 'footsew9cyAq4.jpg/**/Product_7455.jpg/**/', '2018-03-01', 1, 1, 15, 23, 1, '2', '1', '1', '0', 'test', '', 'test', '', '', '', 2, 2, 0),
(0, 192, 'product', '', 3, 7, 10, 4, 0, '150.00', '70.00', '53', 0, '0.00', 'test', '', 2, 1, 1, 3, 90, 111, '', '', '', '', 0, 'bagHIDsog2h.jpg/**/bagss7iiWREe2.jpg/**/', '2018-03-01', 1, 2, 15, 3, 1, '20', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(1, 193, 'phone', '', 4, 6, 7, 35, 0, '100.00', '40.00', '60', 0, '0.00', 'test', '', 2, 1, 1, 2, 90, 105, '', '', '', '', 0, 'samsunggY6YEX9p.jpeg/**/', '2018-03-02', 1, 1, 15, 5, 1, '20', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(1, 194, 'samsaung s7 series', '', 6, 48, 76, 0, 0, '100.00', '60.00', '40', 0, '0.00', 'test', '', 2, 1, 1, 3, 90, 105, '', '', '', '', 0, 'redJzSXmpqJ.jpg/**/', '2018-03-02', 1, 1, 15, 3, 1, '0', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(9, 195, 'productadmin', '', 2, 10, 0, 0, 0, '234.00', '121.00', '48', 23, '1.00', 'fgdfg', '', 1, 0, 0, 213, 41, 0, 'rt', '', 'retr', '', 0, 'Product_151999174615026.jpg/**/', '2018-03-02', 1, 1, 234, 9, 1, '55', '1', '1', '1', 'hrhdg', '', 'retsgs', '', 'ytrrt', '', 543, 423, 43),
(0, 196, 'dfgf', '', 2, 10, 15, 0, 0, '436565.00', '45.00', '99', 54, '456.00', '<img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><img alt=\"\"><br><blockquote><span class=\"wysiwyg-color-red\"><b><i><u>fgfhgfh</u></i></b></span><span class=\"wysiwyg-color-red\"><b><i><u> </u></i></b><b><i><u>nbhfg</u></i></b><span class=\"wysiwyg-color-navy\"><b><i><u>hg</u></i></b></span></span></blockquote>', '', 1, 0, 0, 56, 0, 0, 'hgjgj', '', 'hgjhnm', '', 0, 'Product_152025488425766.jpg/**/', '2018-03-05', 2, 1, 34243, 0, 1, '43', '1', '1', '1', '<img alt=\"\"><img alt=\"\">rtreytf', '', 'ytgfjhgjk', '', 'ghngmnhgj', '', 456, 656, 657),
(0, 197, 'hjhgj', '', 2, 10, 15, 0, 0, '34355.00', '3454.00', '89', 45, '54.00', 'fdgfd', '', 1, 0, 0, 78, 0, 0, 'uyiyukj', '', 'ujhkhkj', '', 0, 'Product_15202556091484.jpg/**/', '2018-03-05', 2, 1, 656, 0, 1, '77887', '1', '1', '1', 'hjh', '', 'nbmnmkjh', '', 'hgjhgkjhkhk', '', 767, 678, 678),
(0, 198, 'check1111', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a\r\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 1, 3, 0, 0, 'keytest', '', 'desc', '', 0, '15204058561.jpg/**/', '2018-03-07', 0, 0, 10, 0, 1, '0', '0', '', '0', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 1, 6),
(0, 199, 'checkkk', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '6', 0, '3.00', 'When you write a product description with a\r\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 1, 0, 1, 3, 0, 0, 'keytest', '', 'desc', '', 0, '15204064401.jpg/**/', '2018-03-07', 0, 1, 10, 0, 1, '0', '0', '', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 200, 'prodspec', '', 2, 10, 15, 0, 0, '2421.00', '1233.00', '49', 0, '0.00', 'vbv', '', 1, 1, 1, 23, 0, 0, '', '', '', '', 0, 'Product_152042591117127.jpg/**/', '2018-03-07', 0, 1, 35345, 0, 1, '0 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(3, 201, 'productproduct', '', 2, 10, 0, 0, 0, '131.00', '101.00', '22', 0, '2.00', '<img alt=\"\"><img alt=\"\">trytry', '', 1, 1, 0, 23, 0, 0, 'sdfdgf', '', 'wefdgf', '', 0, 'Product_152042847714152.jpg/**/', '2018-03-07', 1, 1, 1234, 3, 1, '0 ', '0', '0', '0', '', '', '', '', '', '', 0, 0, 0),
(0, 202, 'check_123s', '', 6, 48, 0, 0, 0, '8000.00', '7500.00', '', 0, '50.00', 'When you write a product description with a\r\n huge crowd of buyers in mind, your descriptions become wishy-washy and you end up addressing no one at all.', '', 2, 1, 1, 3, 0, 0, 'keytest', '', 'desc', '', 0, '15216193981.jpg/**/', '2018-03-21', 0, 0, 10, 0, 1, '0', '0', '', '0', 'Test desc', '', '', '', 'cancelpolicy desc', '', 5, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `nm_prosize`
--

CREATE TABLE `nm_prosize` (
  `ps_id` bigint(20) UNSIGNED NOT NULL,
  `ps_pro_id` int(10) UNSIGNED NOT NULL,
  `ps_si_id` smallint(5) UNSIGNED NOT NULL,
  `ps_volume` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_prosize`
--

INSERT INTO `nm_prosize` (`ps_id`, `ps_pro_id`, `ps_si_id`, `ps_volume`) VALUES
(15, 2, 14, 1),
(32, 1, 9, 1),
(33, 1, 8, 1),
(34, 1, 7, 1),
(35, 1, 5, 1),
(40, 5, 5, 1),
(89, 6, 14, 1),
(137, 4, 5, 1),
(185, 7, 14, 1),
(270, 13, 14, 1),
(274, 12, 14, 1),
(276, 11, 14, 1),
(278, 14, 14, 1),
(281, 17, 14, 1),
(288, 19, 14, 1),
(289, 9, 14, 1),
(290, 8, 5, 1),
(291, 8, 7, 1),
(292, 8, 8, 1),
(293, 8, 9, 1),
(294, 8, 11, 1),
(295, 8, 12, 1),
(296, 8, 13, 1),
(297, 8, 15, 1),
(299, 20, 14, 1),
(300, 22, 4, 1),
(302, 23, 14, 1),
(303, 24, 14, 1),
(307, 28, 14, 1),
(308, 29, 14, 1),
(309, 30, 14, 1),
(311, 32, 14, 1),
(313, 18, 14, 1),
(314, 31, 14, 1),
(317, 33, 14, 1),
(333, 39, 14, 1),
(335, 40, 14, 1),
(337, 41, 14, 1),
(341, 43, 14, 1),
(342, 42, 14, 1),
(343, 43, 4, 1),
(344, 43, 5, 1),
(345, 43, 7, 1),
(346, 44, 14, 1),
(347, 45, 4, 1),
(348, 46, 4, 1),
(349, 47, 4, 1),
(350, 48, 12, 1),
(351, 49, 4, 1),
(352, 50, 4, 1),
(353, 51, 4, 1),
(355, 53, 4, 1),
(356, 54, 4, 1),
(357, 55, 4, 1),
(358, 56, 4, 1),
(359, 57, 4, 1),
(360, 58, 4, 1),
(361, 59, 4, 1),
(364, 62, 4, 1),
(367, 65, 4, 1),
(368, 66, 4, 1),
(393, 91, 4, 1),
(394, 92, 4, 1),
(398, 94, 14, 1),
(401, 95, 14, 1),
(406, 99, 14, 1),
(415, 36, 14, 1),
(417, 38, 14, 1),
(423, 112, 4, 1),
(424, 113, 4, 1),
(425, 114, 4, 1),
(426, 115, 4, 1),
(427, 116, 4, 1),
(428, 117, 4, 1),
(429, 122, 5, 1),
(430, 123, 5, 1),
(431, 124, 5, 1),
(432, 125, 5, 1),
(433, 126, 5, 1),
(434, 127, 5, 1),
(435, 128, 5, 1),
(436, 129, 5, 1),
(437, 130, 5, 1),
(438, 131, 5, 1),
(439, 132, 5, 1),
(440, 133, 5, 1),
(441, 134, 5, 1),
(442, 135, 5, 1),
(444, 137, 4, 1),
(446, 138, 5, 1),
(447, 138, 4, 1),
(453, 140, 4, 1),
(454, 141, 4, 1),
(455, 142, 4, 1),
(456, 143, 4, 1),
(457, 144, 4, 1),
(458, 145, 4, 1),
(459, 146, 4, 1),
(460, 147, 4, 1),
(461, 148, 4, 1),
(462, 153, 4, 1),
(463, 154, 4, 1),
(465, 156, 5, 1),
(466, 157, 4, 1),
(467, 158, 14, 1),
(475, 139, 5, 1),
(476, 139, 4, 1),
(480, 160, 14, 1),
(482, 162, 4, 1),
(486, 163, 4, 1),
(502, 37, 7, 1),
(503, 37, 5, 1),
(504, 37, 4, 1),
(646, 167, 11, 1),
(647, 167, 12, 1),
(648, 167, 18, 1),
(649, 167, 16, 1),
(650, 167, 15, 1),
(651, 167, 8, 1),
(652, 167, 7, 1),
(653, 167, 5, 1),
(654, 167, 4, 1),
(710, 174, 12, 1),
(711, 174, 8, 1),
(712, 174, 4, 1),
(713, 174, 19, 1),
(718, 168, 18, 1),
(719, 168, 17, 1),
(752, 165, 18, 1),
(753, 165, 17, 1),
(754, 165, 16, 1),
(755, 165, 15, 1),
(756, 165, 13, 1),
(757, 165, 12, 1),
(758, 165, 11, 1),
(759, 165, 9, 1),
(760, 165, 8, 1),
(761, 165, 7, 1),
(762, 165, 5, 1),
(763, 165, 4, 1),
(764, 136, 5, 1),
(790, 177, 14, 1),
(801, 185, 4, 1),
(802, 186, 4, 1),
(819, 172, 9, 1),
(820, 172, 11, 1),
(821, 172, 12, 1),
(822, 172, 13, 1),
(823, 172, 15, 1),
(824, 172, 16, 1),
(838, 179, 14, 1),
(870, 188, 14, 1),
(873, 187, 15, 1),
(874, 182, 4, 1),
(876, 183, 4, 1),
(877, 190, 4, 1),
(878, 190, 5, 1),
(879, 190, 8, 1),
(880, 190, 9, 1),
(882, 192, 14, 1),
(886, 194, 14, 1),
(887, 193, 14, 1),
(935, 118, 14, 1),
(1008, 202, 14, 1),
(1009, 208, 14, 1),
(1010, 8932, 4, 1),
(1011, 8932, 5, 1),
(1012, 8932, 7, 1),
(1013, 8932, 8, 1),
(1014, 8932, 9, 1),
(1015, 8932, 11, 1),
(1016, 8932, 12, 1),
(1017, 8932, 13, 1),
(1018, 8932, 15, 1),
(1019, 8932, 16, 1),
(1020, 8932, 17, 1),
(1021, 8932, 18, 1),
(1022, 8932, 19, 1),
(1023, 8932, 20, 1),
(1066, 8934, 4, 1),
(1067, 8934, 5, 1),
(1068, 8934, 7, 1),
(1069, 8934, 8, 1),
(1070, 8934, 9, 1),
(1071, 8934, 11, 1),
(1072, 8934, 12, 1),
(1073, 8934, 13, 1),
(1074, 8934, 15, 1),
(1075, 8934, 16, 1),
(1076, 8934, 17, 1),
(1077, 8934, 18, 1),
(1078, 8934, 19, 1),
(1079, 8934, 20, 1),
(1080, 8933, 20, 1),
(1081, 8933, 19, 1),
(1082, 8933, 18, 1),
(1083, 8933, 17, 1),
(1084, 8933, 16, 1),
(1085, 8933, 15, 1),
(1086, 8933, 13, 1),
(1087, 8933, 12, 1),
(1088, 8933, 11, 1),
(1089, 8933, 9, 1),
(1090, 8933, 8, 1),
(1091, 8933, 7, 1),
(1092, 8933, 5, 1),
(1093, 8933, 4, 1),
(1094, 4000, 14, 1),
(1095, 3999, 14, 1),
(1100, 170, 4, 1),
(1101, 170, 5, 1),
(1102, 170, 7, 1),
(1103, 170, 8, 1),
(1104, 170, 9, 1),
(1105, 171, 14, 1),
(1112, 189, 4, 1),
(1113, 189, 4, 1),
(1114, 189, 5, 1),
(1115, 189, 7, 1),
(1116, 189, 8, 1),
(1118, 159, 14, 1),
(1119, 93, 4, 1),
(1120, 164, 18, 1),
(1121, 164, 17, 1),
(1122, 164, 16, 1),
(1123, 164, 15, 1),
(1124, 164, 13, 1),
(1125, 164, 12, 1),
(1126, 164, 11, 1),
(1127, 164, 9, 1),
(1128, 164, 8, 1),
(1129, 164, 7, 1),
(1130, 164, 5, 1),
(1131, 164, 4, 1),
(1132, 176, 14, 1),
(1133, 161, 4, 1),
(1134, 190, 14, 1),
(1137, 191, 14, 1),
(1138, 192, 14, 1),
(1139, 193, 14, 1),
(1140, 194, 14, 1),
(1143, 199, 4, 1),
(1144, 199, 8, 1),
(1145, 199, 5, 1),
(1146, 199, 4, 1),
(1154, 175, 14, 1),
(1157, 169, 17, 1),
(1158, 169, 18, 1),
(1182, 166, 16, 1),
(1183, 166, 8, 1),
(1184, 166, 13, 1),
(1185, 166, 4, 1),
(1186, 166, 5, 1),
(1187, 166, 7, 1),
(1189, 201, 14, 1),
(1190, 203, 4, 1),
(1191, 204, 4, 1),
(1192, 206, 4, 1),
(1193, 209, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_prospec`
--

CREATE TABLE `nm_prospec` (
  `spc_id` bigint(20) UNSIGNED NOT NULL,
  `spc_pro_id` int(10) UNSIGNED NOT NULL,
  `spc_spg_id` int(11) NOT NULL,
  `spc_sp_id` smallint(5) UNSIGNED NOT NULL,
  `spc_value` text NOT NULL,
  `spc_value_fr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_prospec`
--

INSERT INTO `nm_prospec` (`spc_id`, `spc_pro_id`, `spc_spg_id`, `spc_sp_id`, `spc_value`, `spc_value_fr`) VALUES
(14, 2, 10, 15, ' Handset, Adaptor, Earphone, User Manual', 'Combinaison, adaptateur, écouteur, manuel d\'utilisation'),
(15, 2, 10, 16, 'SM-G570FZKGINS', 'SM-G570FZKGINS'),
(16, 2, 10, 17, ' Galaxy J5 Prime', ' Galaxy J5 Prime'),
(17, 2, 10, 18, 'Black', ' Noir'),
(22, 1, 10, 18, 'sandal', 'sandalia'),
(23, 1, 10, 15, ' 1 Kurta, 1 Pyjama, 1 Dupatta', ' 1 Kurta, 1 Pajama, 1 Dupatta'),
(35, 6, 10, 16, 'test spec1', 'test spec1'),
(36, 6, 11, 20, 'test spec2', 'test spec2'),
(37, 6, 10, 16, 'test spec3', 'test spec3'),
(38, 20, 10, 16, 'Test Resolution', 'test resolution'),
(39, 22, 10, 16, 'tests specification fr erre', 'tests specification fr erre'),
(42, 43, 11, 19, 'test1', ''),
(43, 45, 11, 19, 'test1', ''),
(44, 45, 11, 19, 'test2', ''),
(45, 46, 11, 19, 'test1', ''),
(46, 46, 11, 19, 'test3', ''),
(47, 47, 11, 19, 'test1', ''),
(48, 47, 11, 19, 'test4', ''),
(49, 49, 11, 19, 'test1', ''),
(50, 50, 11, 19, 'test1', ''),
(51, 50, 11, 19, 'test3', ''),
(52, 51, 11, 19, 'test1', ''),
(53, 51, 11, 19, 'test4', ''),
(55, 53, 11, 19, 'test1', ''),
(56, 53, 11, 19, 'test3', ''),
(57, 54, 11, 19, 'test1', ''),
(58, 54, 11, 19, 'test4', ''),
(59, 55, 11, 19, 'test1', ''),
(60, 55, 11, 19, 'test2', ''),
(61, 56, 11, 19, 'test1', ''),
(62, 56, 11, 19, 'test3', ''),
(63, 57, 11, 19, 'test1', ''),
(64, 57, 11, 19, 'test4', ''),
(65, 58, 11, 19, 'test1', ''),
(66, 58, 11, 19, 'test2', ''),
(67, 59, 11, 19, 'test1', ''),
(68, 59, 11, 19, 'test3', ''),
(73, 62, 11, 19, 'test1', ''),
(74, 62, 11, 19, 'test3', ''),
(79, 65, 11, 19, 'test1', ''),
(80, 65, 11, 19, 'test3', ''),
(81, 66, 11, 19, 'test1', ''),
(82, 66, 11, 19, 'test4', ''),
(130, 91, 11, 19, 'test1', ''),
(131, 91, 11, 19, 'test2', ''),
(132, 92, 11, 19, 'test1', ''),
(133, 92, 11, 19, 'test3', ''),
(168, 112, 11, 19, 'test1', ''),
(169, 112, 11, 19, 'test2', ''),
(170, 113, 11, 19, 'test1', ''),
(171, 113, 11, 19, 'test3', ''),
(172, 114, 11, 19, 'test1', ''),
(173, 114, 11, 19, 'test3', ''),
(174, 115, 11, 19, 'test1', ''),
(175, 115, 11, 19, 'test2', ''),
(176, 116, 11, 19, 'test1', ''),
(177, 116, 11, 19, 'test2', ''),
(178, 117, 11, 19, 'test1', ''),
(179, 117, 11, 19, 'test3', ''),
(180, 122, 10, 18, '32gb', ''),
(181, 123, 10, 18, '32gb', ''),
(182, 124, 10, 18, '32gb', ''),
(183, 125, 10, 18, '32gb', ''),
(184, 126, 10, 18, '32gb', ''),
(185, 127, 10, 18, '32gb', ''),
(186, 128, 10, 18, '32gb', ''),
(187, 129, 10, 18, '32gb', ''),
(188, 130, 10, 18, '32gb', ''),
(189, 131, 10, 18, '32gb', ''),
(190, 132, 10, 18, '32gb', ''),
(191, 133, 10, 18, '32gb', ''),
(192, 134, 10, 18, '32gb', ''),
(193, 135, 10, 18, '32gb', ''),
(195, 137, 11, 19, 'test1', ''),
(196, 137, 11, 19, 'test2', ''),
(199, 138, 10, 18, 'wow', ''),
(200, 138, 10, 18, 'ee', ''),
(203, 140, 11, 19, 'test1', ''),
(204, 140, 11, 19, 'test2', ''),
(205, 141, 11, 19, 'test1', ''),
(206, 141, 11, 19, 'test2', ''),
(207, 142, 11, 19, 'test1', ''),
(208, 142, 11, 19, 'test2', ''),
(209, 143, 11, 19, 'test1', ''),
(210, 143, 11, 19, 'test2', ''),
(211, 144, 11, 19, 'test1', ''),
(212, 144, 11, 19, 'test2', ''),
(213, 145, 11, 19, 'test1', ''),
(214, 145, 11, 19, 'test2', ''),
(215, 146, 11, 19, 'test1', ''),
(216, 146, 11, 19, 'test2', ''),
(217, 147, 11, 19, 'test1', ''),
(218, 147, 11, 19, 'test2', ''),
(219, 148, 11, 19, 'test1', ''),
(220, 148, 11, 19, 'test2', ''),
(221, 153, 11, 19, 'test1', ''),
(222, 153, 11, 19, 'test2', ''),
(223, 154, 11, 19, 'test1', ''),
(224, 154, 11, 19, 'test2', ''),
(227, 156, 11, 19, 'test1', ''),
(228, 156, 11, 19, 'test2', ''),
(229, 157, 11, 19, 'test1', ''),
(230, 157, 11, 19, 'test2', ''),
(236, 163, 10, 16, '4353', ''),
(238, 37, 10, 18, 'desc', ''),
(331, 167, 10, 16, '12', ''),
(332, 167, 10, 17, 'small', ''),
(333, 167, 10, 15, 'gfhfghdgf', ''),
(334, 167, 10, 15, 'gfhdgfhgf', ''),
(335, 167, 10, 15, 'gfhgfhgf', ''),
(336, 167, 10, 15, 'gfhfghdfghfg', ''),
(337, 167, 10, 15, 'dgfhdfghdgf', ''),
(338, 167, 10, 15, 'dfghdfghdgf', ''),
(339, 167, 10, 15, 'ertertret', ''),
(340, 167, 10, 15, 'rgdfgdf', ''),
(345, 168, 13, 29, 'sadf', ''),
(356, 136, 10, 18, '32gb', ''),
(389, 177, 11, 20, 'jghj', ''),
(390, 177, 16, 32, '21', ''),
(391, 177, 11, 21, '22', ''),
(392, 177, 11, 20, '22', ''),
(393, 177, 11, 21, '22', ''),
(466, 187, 13, 42, 'j', ''),
(467, 190, 20, 56, 'rtrey', ''),
(498, 8932, 14, 33, ' Bruschetta used buys buyouts udb udyb', ''),
(499, 8932, 14, 33, 'Idenusfb usf. Jhsc', ''),
(500, 8932, 14, 33, 'Hfutcytctutytycufutcyt', ''),
(513, 8934, 14, 33, 'Hchcb', ''),
(514, 8934, 14, 33, 'Dhhshsh', ''),
(515, 8933, 14, 33, 'retwret', ''),
(516, 93, 11, 19, 'test1', ''),
(517, 176, 11, 20, 'yjgj', ''),
(539, 175, 10, 15, 'good', ''),
(540, 175, 10, 16, 'gfdfg', ''),
(541, 175, 10, 16, 'cvbb', ''),
(542, 175, 10, 15, 'gfh', ''),
(543, 175, 10, 15, 'gfhgf', ''),
(544, 175, 10, 16, 'gfh', ''),
(545, 175, 10, 26, 'res', ''),
(547, 169, 13, 29, 'h', ''),
(592, 166, 14, 33, 'tyutyu', ''),
(593, 166, 14, 33, 'tyuty', ''),
(596, 201, 13, 29, 'fdghfgh', ''),
(597, 201, 13, 46, 'gfdhg', ''),
(598, 203, 11, 19, 'test1', ''),
(599, 203, 11, 19, 'test2', ''),
(600, 204, 11, 19, 'test1', ''),
(601, 204, 11, 19, 'test2', ''),
(602, 205, 11, 19, 'test1', ''),
(603, 205, 11, 19, 'test2', ''),
(604, 206, 11, 19, 'test1', ''),
(605, 206, 11, 19, 'test2', ''),
(606, 207, 11, 19, 'test1', ''),
(607, 207, 11, 19, 'test2', ''),
(608, 208, 11, 19, 'test1', ''),
(609, 208, 11, 19, 'test2', ''),
(610, 209, 11, 19, 'test1', ''),
(611, 209, 11, 19, 'test2', ''),
(612, 210, 11, 19, 'test1', ''),
(613, 210, 11, 19, 'test2', ''),
(614, 211, 11, 19, 'test1', ''),
(615, 211, 11, 19, 'test2', '');

-- --------------------------------------------------------

--
-- Table structure for table `nm_review`
--

CREATE TABLE `nm_review` (
  `comment_id` int(50) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `deal_id` varchar(255) DEFAULT NULL,
  `store_id` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `ratings` varchar(255) NOT NULL,
  `status` int(50) NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sam1` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_review`
--

INSERT INTO `nm_review` (`comment_id`, `product_id`, `deal_id`, `store_id`, `customer_id`, `title`, `comments`, `ratings`, `status`, `review_date`, `sam1`) VALUES
(2, NULL, '5', NULL, '186', 'Good', 'Good deals', '3', 0, '2018-04-04 12:39:43', 0),
(3, NULL, NULL, '57', '186', 'Good Masz', 'Good Maz Storessdasdasd', '3', 0, '2018-02-06 07:48:32', 0),
(4, '6', NULL, NULL, '186', 'test', 'test tes tste aset tae', '4', 1, '2018-02-07 08:04:32', 0),
(5, '6', NULL, NULL, '186', 'test1', 'test1', '1', 0, '2017-10-16 12:35:17', 0),
(6, NULL, NULL, '62', '186', 'gfdgfg', 'fgfgdfg', '3', 0, '2018-02-06 07:48:28', 0),
(7, NULL, NULL, '63', '198', 'ragul gandhi', 'adsdsf', '4', 0, '2017-11-10 09:08:36', 0),
(10, '18', NULL, NULL, '197', '11/20/2017 3:40', '11/20/2017 3:40', '1', 0, '2017-11-20 10:11:39', 0),
(11, '18', NULL, NULL, '197', '11/20/2017 3:41', '11/20/2017 3:41', '3', 0, '2018-01-18 07:54:43', 0),
(12, '54', NULL, NULL, '197', '11/20/2017 3:42', '11/20/2017 3:4111/20/2017 3:41', '2', 0, '2018-01-08 09:21:21', 0),
(15, NULL, NULL, '81', '220', 'GDfdgdfg ', 'SUperb :)', '0', 0, '2018-01-08 10:38:56', 0),
(17, '118', NULL, NULL, '250', 'dsfdsf', 'sfdsf', '5', 0, '2018-01-18 07:54:38', 0),
(18, '181', NULL, NULL, '250', 'Review about the product', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy\r\n\r\nt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy', '5', 0, '2018-01-18 07:54:40', 0),
(19, '181', NULL, NULL, '250', 'Review about the product', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy', '5', 0, '2018-01-18 07:56:47', 0),
(20, '181', NULL, NULL, '250', 'test review', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy', '5', 0, '2018-01-18 07:56:49', 0),
(21, '181', NULL, NULL, '250', 'test review1', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy', '3', 0, '2018-01-18 07:56:51', 0),
(22, '181', NULL, NULL, '250', 'test review2', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy', '2', 0, '2018-01-18 07:56:54', 0),
(23, '181', NULL, NULL, '250', 'test review5', 'dgfdhfgj', '1', 0, '2018-02-10 13:23:09', 0),
(24, '35', NULL, NULL, '207', 'Goods', 'Good Productss test', '3', 0, '2018-04-04 12:17:48', 0),
(25, NULL, '4', NULL, '207', 'New deal', 'nice.<div>asdd<div>', '3', 0, '2018-04-04 12:39:43', 0),
(26, NULL, NULL, '57', '207', 'Good Masz', 'Good Maz Storess', '3', 0, '2018-01-22 10:36:11', 0),
(28, '171', NULL, NULL, '229', 'test', 'test', '4', 0, '2018-04-04 12:17:48', 0),
(29, '174', NULL, NULL, '253', 'reviwe', '<dsf>good<dsfd>', '3', 0, '2018-04-04 12:17:48', 0),
(30, NULL, NULL, '105', '253', 'review', 'good', '5', 0, '2018-02-16 08:00:47', 0),
(31, '34', NULL, NULL, '253', 'feedback', 'nice', '4', 0, '2018-04-04 12:17:48', 0),
(32, NULL, '57', NULL, '229', 'test', 'tester', '4', 0, '2018-04-04 12:39:43', 0),
(33, '58', NULL, NULL, '220', 'fdg', 'fdg', '5', 0, '2018-04-04 12:17:48', 0),
(34, '180', NULL, NULL, '229', 'test', 'test', '3', 0, '2018-04-04 12:17:48', 0),
(35, '183', NULL, NULL, '271', 'test', 'test1', '2', 0, '2018-04-04 12:17:48', 0),
(36, '183', NULL, NULL, '271', 'tesst2', 'test2', '3', 0, '2018-04-04 12:17:48', 0),
(37, '183', NULL, NULL, '271', 'test3', 'test3', '3', 0, '2018-04-04 12:17:48', 0),
(38, '183', NULL, NULL, '271', 'test4', 'test4', '3', 0, '2018-04-04 12:17:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_save_cart`
--

CREATE TABLE `nm_save_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_product_id` int(11) NOT NULL,
  `cart_deal_id` int(11) NOT NULL,
  `cart_product_qty` int(11) NOT NULL,
  `cart_type` int(1) NOT NULL COMMENT '1-Products,2-Deals',
  `cart_pro_siz_id` int(11) NOT NULL,
  `cart_pro_col_id` int(11) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `addedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_save_cart`
--

INSERT INTO `nm_save_cart` (`cart_id`, `cart_product_id`, `cart_deal_id`, `cart_product_qty`, `cart_type`, `cart_pro_siz_id`, `cart_pro_col_id`, `cart_user_id`, `addedDate`) VALUES
(1, 0, 5, 1, 2, 0, 0, 188, '2017-11-23 05:55:59'),
(14, 40, 0, 1, 1, 14, 0, 202, '2017-12-22 04:54:49'),
(31, 35, 0, 1, 1, 0, 23, 213, '2018-01-05 13:58:32'),
(49, 173, 0, 2, 1, 0, 0, 202, '2018-01-09 08:16:28'),
(87, 174, 0, 1, 1, 4, 0, 206, '2018-01-12 07:19:17'),
(167, 35, 0, 1, 1, 0, 0, 207, '2018-01-22 12:17:06'),
(169, 0, 35, 2, 2, 0, 0, 211, '2018-01-22 12:40:22'),
(175, 0, 54, 3, 2, 0, 0, 212, '2018-02-05 10:11:03'),
(176, 0, 59, 1, 2, 0, 0, 220, '2018-04-03 05:00:24'),
(205, 0, 59, 1, 2, 0, 0, 274, '2018-04-04 13:06:55'),
(207, 161, 0, 1, 1, 4, 0, 273, '2018-04-06 07:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `nm_secmaincategory`
--

CREATE TABLE `nm_secmaincategory` (
  `smc_id` smallint(5) UNSIGNED NOT NULL,
  `smc_name` varchar(100) NOT NULL,
  `smc_name_fr` varchar(100) NOT NULL,
  `smc_mc_id` smallint(5) UNSIGNED NOT NULL,
  `smc_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_secmaincategory`
--

INSERT INTO `nm_secmaincategory` (`smc_id`, `smc_name`, `smc_name_fr`, `smc_mc_id`, `smc_status`) VALUES
(2, 'WOMEN three', 'Tissu', 2, 0),
(4, 'WOMEN1', ' Ropas etnicas', 3, 1),
(6, 'Baby Care', ' Cuidado del bebé', 4, 1),
(7, 'Western Wear', 'Western Wear', 3, 1),
(10, 'Footwear', 'Chaussure', 2, 1),
(11, 'Watches', 'Montres', 2, 1),
(12, 'Cloths', 'Paños', 4, 1),
(14, 'Furnitures', 'Muebles', 5, 1),
(15, 'Kitchenware', ' Batería de cocina', 5, 1),
(16, 'Computers & Gaming', 'Computadoras y juegos', 6, 1),
(17, 'Cricket Kit', ' Kit de Cricket', 7, 1),
(18, 'Cars', 'Carros', 8, 1),
(19, 'Bikes', 'Bicicletas', 8, 1),
(20, 'Story Books', 'Libros de historia', 9, 1),
(21, 'Text Books', ' Libros de texto', 9, 1),
(22, 'Biography', 'Biografía', 9, 1),
(23, 'Bikes', ' Bicicletas', 7, 1),
(24, 'Cameras', 'Cámaras', 6, 1),
(47, 'Watches', 'Relojes', 3, 1),
(48, 'Mobiles', 'Mobiles', 6, 1),
(49, 'fashion main', '', 15, 1),
(50, 'fashion main', '', 15, 1),
(51, 'Story Books', '', 15, 1),
(52, 'fashion main', '', 15, 1),
(53, 'dsfdsf', '', 12, 1),
(54, 'test main', '', 12, 1),
(55, 'test main', '', 17, 1),
(56, 'WOMEN1', '', 2, 1),
(57, 'WOMEN1', '', 2, 1),
(58, 'WOMEN1', '', 2, 1),
(59, 'WOMEN2', '', 2, 1),
(60, 'WOM', '', 2, 1),
(61, 'WOMEN1', '', 2, 1),
(62, 'Organic Tools', '', 18, 1),
(63, 'Harvesting Tools', '', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_secsubcategory`
--

CREATE TABLE `nm_secsubcategory` (
  `ssb_id` smallint(5) UNSIGNED NOT NULL,
  `ssb_name` varchar(100) NOT NULL,
  `ssb_name_fr` varchar(100) NOT NULL,
  `ssb_sb_id` smallint(5) UNSIGNED NOT NULL,
  `ssb_smc_id` smallint(5) UNSIGNED NOT NULL,
  `mc_id` smallint(5) UNSIGNED NOT NULL,
  `ssb_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_secsubcategory`
--

INSERT INTO `nm_secsubcategory` (`ssb_id`, `ssb_name`, `ssb_name_fr`, `ssb_sb_id`, `ssb_smc_id`, `mc_id`, `ssb_status`) VALUES
(1, 'Checked Shirts', ' Chemises vérifiées', 4, 2, 2, 1),
(2, 'Rounded Neck33', 'Ajustement régulier', 9, 2, 2, 1),
(3, 'Indigo', 'Indigo', 6, 3, 4, 1),
(4, 'Printed Tops', 'Hauts imprimés', 10, 3, 7, 1),
(5, 'Analog', 'Analogique', 11, 1, 8, 1),
(6, 'Android Mobiles', 'Mobiles Android', 2, 1, 1, 1),
(8, 'Rounded Neck3', 'Coup arrondi', 3, 2, 2, 1),
(9, 'V-Neck', 'V-Neck', 3, 2, 2, 1),
(13, 'Sony CyberShot', 'Sony CyberShot', 12, 1, 9, 1),
(14, 'Boys Footwear', 'Chaussures pour garçons', 13, 4, 6, 1),
(15, 'Leggings', 'leggings', 10, 3, 7, 1),
(16, 'Girls Footwear', 'Chaussures pour filles', 13, 4, 6, 1),
(19, 'Baby League  Regular Tops', ' Baby League Regular Tops', 18, 4, 6, 1),
(22, 'Z Berries Shrug', 'Z Larry Shrug', 19, 3, 7, 1),
(28, 'Slim Fit', 'Slim Fit', 21, 3, 7, 1),
(29, 'Patiala', 'Patiala', 6, 3, 4, 1),
(33, 'Johnson ', 'Johnson', 22, 4, 6, 1),
(34, 'Lotion', 'Lotion', 22, 4, 6, 1),
(35, 'Diaper Bag', ' Sac à langer', 7, 4, 6, 1),
(61, 'vV neck', 'vV neck', 3, 2, 2, 1),
(62, 'Test sec sub ', '', 79, 15, 49, 1),
(63, 'test Sub cat', '', 78, 12, 53, 1),
(64, 'Rounded Neck1', '', 3, 2, 2, 1),
(65, 'Rounded Neck', '', 4, 2, 2, 1),
(66, 'Cotton', '', 5, 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_shipping`
--

CREATE TABLE `nm_shipping` (
  `ship_id` int(10) UNSIGNED NOT NULL,
  `ship_name` varchar(100) NOT NULL,
  `ship_address1` varchar(200) NOT NULL,
  `ship_address2` varchar(200) NOT NULL,
  `ship_ci_id` varchar(50) NOT NULL,
  `ship_state` varchar(100) NOT NULL,
  `ship_country` varchar(50) NOT NULL,
  `ship_postalcode` varchar(20) NOT NULL,
  `ship_phone` varchar(20) NOT NULL,
  `ship_email` varchar(255) NOT NULL,
  `ship_order_id` varchar(50) NOT NULL,
  `ship_trans_id` varchar(50) NOT NULL,
  `ship_cus_id` bigint(20) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_shipping`
--

INSERT INTO `nm_shipping` (`ship_id`, `ship_name`, `ship_address1`, `ship_address2`, `ship_ci_id`, `ship_state`, `ship_country`, `ship_postalcode`, `ship_phone`, `ship_email`, `ship_order_id`, `ship_trans_id`, `ship_cus_id`, `date_time`) VALUES
(1, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '3', '79N20323NE5053056', 116, '2017-11-04 12:42:14'),
(2, 'Test', 'test ship addr1', 'test ship addr2', '1', 'tn', '1', '641001', '801212975', 'malarvizhi@pofitec.com', '6', '24630669TJ296101U', 186, '2017-11-06 12:37:53'),
(3, 'malar', 'Coimbatore, ram nagar', 'ram nagar', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '8012122975', 'malarvizhi@pofitec.com', '7', '2GB21781RJ791900C', 186, '2017-11-07 07:44:24'),
(4, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '8', '3AA23653AN9915137', 197, '2017-11-08 04:39:14'),
(5, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '1', '6K031407V76284519', 186, '2017-11-08 11:29:23'),
(6, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '2', '03U1120119549191K', 186, '2017-11-08 12:45:28'),
(7, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '3', '79N20323NE5053056', 186, '2017-11-08 12:46:40'),
(8, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '4', '', 186, '2017-11-08 12:46:57'),
(9, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '5', '9F082733SL7373426', 186, '2017-11-08 12:51:10'),
(10, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '2', '03U1120119549191K', 186, '2017-11-08 13:02:54'),
(11, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '3', '79N20323NE5053056', 186, '2017-11-09 12:06:36'),
(12, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '6', '24630669TJ296101U', 186, '2017-11-09 12:09:00'),
(13, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '9', '9E3312339S531020N', 186, '2017-11-09 12:11:17'),
(14, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '3', '79N20323NE5053056', 186, '2017-11-09 12:12:39'),
(15, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '3', '79N20323NE5053056', 186, '2017-11-09 12:45:16'),
(16, 'rwwrwr', 'No 88, Raja Street', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9994446464', 'ragulaero@gmail.com', '1', '6K031407V76284519', 198, '2017-11-09 13:00:25'),
(17, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '3', '79N20323NE5053056', 186, '2017-11-09 13:04:50'),
(18, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '1', '6K031407V76284519', 186, '2017-11-09 13:13:09'),
(19, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '1', '6K031407V76284519', 186, '2017-11-09 13:51:48'),
(20, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '2', '03U1120119549191K', 186, '2017-11-09 13:55:56'),
(21, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '3', '79N20323NE5053056', 186, '2017-11-09 13:57:18'),
(22, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '4', '', 186, '2017-11-09 13:57:33'),
(23, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '5', '9F082733SL7373426', 186, '2017-11-09 13:58:25'),
(24, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '6', '24630669TJ296101U', 186, '2017-11-09 13:58:45'),
(25, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '1', '6K031407V76284519', 186, '2017-11-09 13:59:23'),
(26, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '1', '6K031407V76284519', 186, '2017-11-09 14:03:17'),
(27, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '3', '79N20323NE5053056', 186, '2017-11-13 07:55:22'),
(28, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '6', '24630669TJ296101U', 186, '2017-11-13 07:58:14'),
(29, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '2', '03U1120119549191K', 186, '2017-11-13 09:51:23'),
(30, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '3', '79N20323NE5053056', 197, '2017-11-13 11:06:30'),
(31, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '1', '6K031407V76284519', 197, '2017-11-13 11:09:56'),
(32, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '2', '03U1120119549191K', 186, '2017-11-17 08:15:39'),
(33, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '4', '', 186, '2017-11-17 08:50:06'),
(34, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '5', '9F082733SL7373426', 186, '2017-11-17 08:53:51'),
(35, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '4', 'ORDER1003', 186, '2017-11-17 10:49:19'),
(36, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '5', '9F082733SL7373426', 186, '2017-11-17 10:55:07'),
(37, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '6', '24630669TJ296101U', 186, '2017-11-18 06:03:27'),
(38, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '7', '2GB21781RJ791900C', 186, '2017-11-18 06:04:55'),
(39, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '8', '3AA23653AN9915137', 186, '2017-11-18 07:21:03'),
(40, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '6', '24630669TJ296101U', 186, '2017-11-18 11:24:46'),
(41, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '7', '2GB21781RJ791900C', 186, '2017-11-20 04:19:19'),
(42, 'ragul', 'coimbatore', 'coimbatore', 'fdgdfg', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulaero@gmail.com', '9', '9E3312339S531020N', 198, '2017-11-20 04:45:33'),
(43, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '10', '3NY50624961538124', 186, '2017-11-20 08:29:51'),
(44, 'ragul', 'coimbatore', 'sample stree', 'fdgdfg', 'tamil nadu', 'India', '641202', '9944349002', 'admin@gmail.com', '11', '6PJ31672EM452841Y', 198, '2017-11-20 12:33:49'),
(45, 'Test', 'test ship addr1', 'test ship addr2', '1', 'kerala', '1', '641001', '801212975', 'malarvizhi@pofitec.com', '12', '79J03532RU5764411', 186, '2017-11-21 12:02:57'),
(46, 'malar', 'test ship addr1', 'test ship addr2', '', 'Tamil nadu', '', '641001', '8012122975', 'malarvizhi@pofitec.com', '13', '86R34639F9605723P', 186, '2017-11-28 12:55:00'),
(47, 'vinod babu1', 'test ship addr1', 'test ship addr2', '', 'TN', '', '654321', '9876543210', 'malarvizhi@pofitec.com', '18', '6D355425689074204', 186, '2017-12-04 11:54:52'),
(48, 'vinod babu1', 'test ship addr1', 'test ship addr2', '', 'TN', '', '654321', '9876543210', 'malarvizhi@pofitec.com', '19', '9AJ78882LR057144R', 186, '2017-12-07 04:27:12'),
(49, 'vinod babu1', 'test ship addr1', 'test ship addr2', '', 'TN', '', '654321', '9876543210', 'malarvizhi@pofitec.com', '20', '7DK46533YS425152S', 186, '2017-12-08 04:40:24'),
(50, 'Malarvizhi', 'covai', 'covai', '', 'TN', '', '573735', '9876543210', 'malarvizhi@pofitec.com', '8', '3AA23653AN9915137', 186, '2017-12-08 05:37:36'),
(51, 'Malarvizhi', 'covai', 'covai', '', 'TN', '', '573735', '9876543210', 'malarvizhi@pofitec.com', '9', '9E3312339S531020N', 186, '2017-12-08 05:37:56'),
(52, 'testuset', '\"test addr1\"', '\"test addr2\"', '', 'tamil nadu', '', '123456', '7200285584', 'malarvizhi@pofitec.com', '10', '3NY50624961538124', 186, '2017-12-08 07:27:24'),
(53, 'vinod babu1', 'test ship addr1', 'test ship addr2', '', 'TN', '', '654321', '9876543210', 'malarvizhi@pofitec.com', '11', '6PJ31672EM452841Y', 186, '2017-12-08 07:47:30'),
(54, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '30', '9R416707CH5978206', 186, '2017-12-09 10:08:18'),
(55, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'venugopal@pofitec.com', '32', '5HE291760N2586152', 186, '2017-12-11 12:30:52'),
(56, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'venugopal@pofitec.com', '12', '79J03532RU5764411', 186, '2017-12-11 12:33:56'),
(57, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'venugopal@pofitec.com', '13', '86R34639F9605723P', 186, '2017-12-11 12:34:38'),
(58, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'venugopal@pofitec.com', '14', '0ED924767C9668059', 186, '2017-12-11 13:53:07'),
(59, 'Priscilla Santos', 'Adipisicing blanditiis placeat hic aspernatur quos id ea ullamco corrupti soluta aut quibusdam quis sunt enim eos placeat dolore', 'Nostrud labore aut et sunt', 'Aliquid cupidatat unde dolorem magnam ipsum volupt', 'Corporis est nisi dignissimos sed ipsam delectus ducimus impedit et illum laboriosam voluptatibus su', 'Neque laboriosam non quos aliquip vel nobis minima', '89321', '+747-32-8626491', 'vikopilyde@gmail.com', '34', '1XP685263D264494M', 201, '2017-12-11 14:28:56'),
(60, 'Chaim Odonnell', 'Earum est ipsam laborum Fugiat a distinctio Veritatis aut irure commodi beatae quia nihil adipisicing cupidatat', 'Quis voluptates vero irure delectus autem voluptatem', 'Enim saepe eos sunt fugiat et esse excepturi labor', 'Et pariatur Fugiat commodo aliqua Quidem qui voluptas itaque qui ea porro excepturi mollit', 'Quibusdam harum molestias dolore enim necessitatib', '36296', '+171-57-6244275', 'saga@yahoo.com', '36', '7HY02061W0863332R', 201, '2017-12-11 14:45:07'),
(61, 'sugi', 'kjj', 'jkj', 'Coimbatore', '3434', 'India', '343444', '8012122975', 'ere@gmail.com', '37', '1GY19202KC5728326', 201, '2017-12-12 05:03:44'),
(62, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgff@pofitec.com', '38', '1SE07703430416241', 201, '2017-12-12 05:05:31'),
(63, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'ere@gmail.com', '39', '58X139085H000343K', 201, '2017-12-12 05:06:49'),
(64, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgff@pofitec.com', '40', '2NP83756FC070680U', 201, '2017-12-12 05:09:03'),
(65, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'ere@gmail.com', '41', '2F716716P51046008', 201, '2017-12-12 05:11:50'),
(66, 'sugi', 'gf', 'fg', 'Coimbatore', 'ere', 'India', '123456', '8012122975', 'fgff@pofitec.com', '42', '59N95424B9609954T', 201, '2017-12-12 05:14:54'),
(67, 'sugi', 'gh', 'fhg', 'Coimbatore', 'gh', 'India', '123456', '8012122975', 'fgff@pofitec.com', '43', '55H76513UH811742B', 201, '2017-12-12 05:18:07'),
(68, 'sugi', 'hjh', 'hjh', 'Coimbatore', 'hjh', 'India', '123456', '8012122975', 'ere@gmail.com', '44', '3PY20343PJ9472408', 201, '2017-12-12 05:38:37'),
(69, 'sugi', 'hjh', 'hjh', 'Coimbatore', 'hjh', 'India', '123456', '8012122975', 'ere@gmail.com', '45', '9EK709210D1805016', 201, '2017-12-12 05:46:00'),
(70, 'sugi', 'tyt', 'fgf', 'Coimbatore', 'tyty', 'India', '123456', '8012122975', 'ere@gmail.com', '46', '42H9097038641362H', 201, '2017-12-12 06:05:09'),
(71, 'sugi', 'cvc', 'vcvc', 'Coimbatore', 'cvcv', 'India', '123456', '8012122975', 'fgff@pofitec.com', '47', '7CA103224P8613840', 201, '2017-12-12 06:08:04'),
(72, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgf@gmail.com', '48', '6VR595661D662451N', 201, '2017-12-12 06:10:40'),
(73, 'sugi', 'dfdf', 'dfdf', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgf@gmail.com', '49', '8BM34143MC985384A', 201, '2017-12-12 06:12:35'),
(74, 'sugi', 'df', 'dfdf', 'Coimbatore', 'dfdf', 'India', '123456', '8012122975', 'ere@gmail.com', '50', '7XV261868K389481E', 201, '2017-12-12 06:14:52'),
(75, 'sugi', 'dfdf', 'dfdf', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgf@gmail.com', '15', '81N61059RB2577724', 201, '2017-12-12 06:16:41'),
(76, 'sugi', 'dfdf', 'dfdf', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgf@gmail.com', '16', '81N61059RB2577724', 201, '2017-12-12 06:26:25'),
(77, 'sugi', 'df', 'dfdf', 'Coimbatore', 'dfdf', 'India', '123456', '8012122975', 'ere@gmail.com', '17', '6D355425689074204', 201, '2017-12-12 06:30:43'),
(78, 'sugi', 'df', 'dfdf', 'Coimbatore', 'dfdf', 'India', '123456', '8012122975', 'ere@gmail.com', '18', '6D355425689074204', 201, '2017-12-12 06:31:39'),
(79, 'sugi', 'ere', 'ere', 'Coimbatore', 'ere', 'India', '123456', '8012122975', 'suganya@pofitec.com', '19', '9AJ78882LR057144R', 201, '2017-12-12 06:34:51'),
(80, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'ere@gmail.com', '20', '7DK46533YS425152S', 201, '2017-12-12 06:50:31'),
(81, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '21', '2AG83087FB768830P', 197, '2017-12-12 06:55:25'),
(82, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '22', '4BG443238H202273B', 197, '2017-12-12 06:56:54'),
(83, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgff@pofitec.com', '51', '3UC24031A3721333C', 201, '2017-12-12 06:59:04'),
(84, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgff@pofitec.com', '23', '9TW30205YN1156411', 201, '2017-12-12 06:59:59'),
(85, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '24', '9M436776LG357834G', 197, '2017-12-12 07:01:28'),
(86, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgf@gmail.com', '52', '9V914517RB797302W', 201, '2017-12-12 07:04:25'),
(87, 'sugi', 'hjh', 'hjh', 'Coimbatore', 'hjh', 'India', '123456', '8012122975', 'ere@gmail.com', '53', 'ORDER1002', 201, '2017-12-12 07:06:21'),
(88, 'sugi', 'cvc', 'vcvc', 'Coimbatore', 'cvcv', 'India', '123456', '8012122975', 'fgff@pofitec.com', '25', '52447455402780309', 201, '2017-12-12 07:07:21'),
(89, 'sugi', 'dfdf', 'dfdf', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgf@gmail.com', '26', '6N553464YH560073S', 201, '2017-12-12 07:10:31'),
(90, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '54', 'ORDER1003', 197, '2017-12-12 07:12:42'),
(91, 'sugi', 'df', 'dfdf', 'Coimbatore', 'dfdf', 'India', '123456', '8012122975', 'ere@gmail.com', '27', '5XY4028984949073X', 201, '2017-12-12 07:14:43'),
(92, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgf@gmail.com', '28', '8BV58074KH8941055', 201, '2017-12-12 07:16:44'),
(93, 'sugi', 'cvc', 'vcvc', 'Coimbatore', 'cvcv', 'India', '123456', '8012122975', 'fgff@pofitec.com', '55', '8FR3459685178804M', 201, '2017-12-12 07:17:57'),
(94, 'sugi', 'df', 'dfdf', 'Coimbatore', 'dfdf', 'India', '123456', '8012122975', 'ere@gmail.com', '29', '3X791322L39393717', 201, '2017-12-12 07:19:25'),
(95, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'dfgfg@pofitec.com', '30', '9R416707CH5978206', 201, '2017-12-12 07:45:25'),
(96, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'dfgfg@pofitec.com', '56', '4FM70563FJ6525317', 201, '2017-12-12 07:56:33'),
(97, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'ere@gmail.com', '31', '0RY18511MJ490792B', 201, '2017-12-12 07:57:35'),
(98, 'sugi', 'fgf', 'fgf', 'Coimbatore', 'fgf', 'India', '123456', '8012122975', 'suganya@pofitec.com', '32', '5HE291760N2586152', 201, '2017-12-12 08:03:45'),
(99, 'sugi', 'cvc', 'vcvc', 'Coimbatore', 'cvcv', 'India', '123456', '8012122975', 'fgff@pofitec.com', '33', '0L636862BX7370612', 201, '2017-12-12 08:16:05'),
(100, 'sugi', 'ghg', 'ghg', 'Coimbatore', 'ghg', 'India', '123456', '8012122975', 'fgff@pofitec.com', '34', '1XP685263D264494M', 201, '2017-12-12 08:19:55'),
(101, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '57', '164717853P1072731', 197, '2017-12-12 08:45:13'),
(102, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '58', 'ORDER1007', 197, '2017-12-12 08:57:51'),
(103, 'sugi', 'gh', 'hgh', 'Coimbatore', 'ghg', 'India', '123456', '8012122975', 'fgff@pofitec.com', '35', '4EB761201X023850H', 201, '2017-12-12 08:59:33'),
(104, 'sugi', 'f', 'f', 'Coimbatore', 'f', 'India', '123456', '8012122975', 'dfgfg@pofitec.com', '36', '7HY02061W0863332R', 201, '2017-12-12 09:02:35'),
(105, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'dfgfg@pofitec.com', '37', '1GY19202KC5728326', 201, '2017-12-12 09:19:21'),
(106, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '59', 'ORDER1008', 197, '2017-12-12 09:19:35'),
(107, 'sugi', 'fg', 'hf', 'Coimbatore', 'fg', 'India', '123654', '8012122975', 'ere@gmail.com', '38', '1SE07703430416241', 201, '2017-12-12 09:55:42'),
(108, 'sugi', 'gh', 'hgh', 'Coimbatore', 'ghg', 'India', '123456', '8012122975', 'fgff@pofitec.com', '39', '58X139085H000343K', 201, '2017-12-12 10:04:58'),
(109, 'sugi', 'kjj', 'jkj', 'Coimbatore', '3434', 'India', '343444', '8012122975', 'fgf@gmail.com', '40', '2NP83756FC070680U', 201, '2017-12-12 10:14:24'),
(110, 'sugi', 'jhj', 'hjh', 'Coimbatore', 'hjh', 'India', '123456', '8012122975', 'fgff@pofitec.com', '41', '2F716716P51046008', 201, '2017-12-12 10:24:33'),
(111, 'sugi', 'kjj', 'jkj', 'Coimbatore', '3434', 'India', '343444', '8012122975', 'fgff@pofitec.com', '42', '59N95424B9609954T', 201, '2017-12-12 10:56:29'),
(112, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '60', 'ORDER1009', 197, '2017-12-12 11:08:34'),
(113, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '61', 'ORDER1010', 197, '2017-12-12 11:12:35'),
(114, 'sugi', 'ujkj', 'jkjk', 'Coimbatore', 'Tamil Nadu', 'India', '123654', '8012122975', 'ere@gmail.com', '62', 'ORDER1011', 201, '2017-12-12 11:22:56'),
(115, 'sugi', 'ghg', 'gg', 'Coimbatore', 'ghg', 'India', '123456', '8012122975', 'ere@gmail.com', '43', '55H76513UH811742B', 201, '2017-12-12 11:24:19'),
(116, 'sugi', 'gf', 'fg', 'Coimbatore', 'fgf', 'India', '123654', '8012122975', 'ere@gmail.com', '44', '3PY20343PJ9472408', 201, '2017-12-12 11:35:04'),
(117, 'sugi', 'h', 'ghgh', 'Coimbatore', 'hghg', 'India', '123456', '8012122975', 'suganya@pofitec.com', '45', '9EK709210D1805016', 201, '2017-12-12 11:38:27'),
(118, 'sugi', 'gff', 'fg', 'Coimbatore', 'Tam', 'India', '123654', '8012122975', 'fgf@gmail.com', '63', 'ORDER1012', 201, '2017-12-12 11:40:11'),
(119, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'ere@gmail.com', '64', 'ORDER1013', 201, '2017-12-12 11:46:45'),
(120, 'sugi', 'dfd', 'dfd', 'Coimbatore', 'dfd', 'India', '123456', '8012122975', 'dfgfg@pofitec.com', '65', 'ORDER1014', 201, '2017-12-12 11:51:24'),
(121, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgff@pofitec.com', '66', 'ORDER1015', 201, '2017-12-12 11:59:21'),
(122, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '46', '42H9097038641362H', 197, '2017-12-12 12:01:50'),
(123, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '47', '7CA103224P8613840', 197, '2017-12-12 12:26:37'),
(124, 'sugi', 'dfdf', 'dfdf', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgf@gmail.com', '67', 'ORDER1011', 201, '2017-12-12 12:30:16'),
(125, 'sugi', 'hjh', 'hjh', 'Coimbatore', 'hjh', 'India', '123456', '8012122975', 'ere@gmail.com', '68', 'ORDER1012', 201, '2017-12-12 12:45:33'),
(126, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '48', '6VR595661D662451N', 197, '2017-12-12 12:46:27'),
(127, 'sugi', 'kjj', 'jkj', 'Coimbatore', '3434', 'India', '343444', '8012122975', 'dfgfg@pofitec.com', '69', 'ORDER1011', 201, '2017-12-12 12:47:09'),
(128, 'sugi', 'gf', 'fg', 'Coimbatore', 'ere', 'India', '123456', '8012122975', 'fgff@pofitec.com', '70', '3BR68107MB001423L', 201, '2017-12-12 12:50:17'),
(129, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgf@gmail.com', '71', '3BR68107MB001423L', 201, '2017-12-12 12:53:01'),
(130, 'sugi', 'df', 'dfdf', 'Coimbatore', 'dfdf', 'India', '123456', '8012122975', 'ere@gmail.com', '72', '5CY08665XH8540825', 201, '2017-12-12 12:54:35'),
(131, 'sugi', 'kjj', 'jkj', 'Coimbatore', '3434', 'India', '343444', '8012122975', 'suganya@pofitec.com', '73', '6CU05309P59494244', 201, '2017-12-12 13:01:19'),
(132, 'sugi', 'gf', 'fg', 'Coimbatore', 'fgf', 'India', '123654', '8012122975', 'ere@gmail.com', '74', '1LL41476VJ1615912', 201, '2017-12-12 13:04:29'),
(133, 'sugi', 'cvc', 'vcvc', 'Coimbatore', 'cvcv', 'India', '123456', '8012122975', 'fgff@pofitec.com', '75', '1LL41476VJ1615912', 201, '2017-12-12 13:09:24'),
(134, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'dfgfg@pofitec.com', '76', 'ORDER1015', 201, '2017-12-12 13:12:11'),
(135, 'sugi', 'fgf', 'ghgh', 'Coimbatore', 'hghg', 'India', '123456', '8012122975', 'suganya@pofitec.com', '77', 'ORDER1016', 201, '2017-12-12 13:13:18'),
(136, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgff@pofitec.com', '78', 'ORDER1017', 201, '2017-12-12 13:14:56'),
(137, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'dfgfg@pofitec.com', '79', 'ORDER1018', 201, '2017-12-12 13:40:30'),
(138, 'sugi', 'ere', 'ere', 'Coimbatore', 'ere', 'India', '123456', '8012122975', 'ere@gmail.com', '80', 'ORDER1019', 201, '2017-12-12 13:41:31'),
(139, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'ere@gmail.com', '81', 'ORDER1015', 201, '2017-12-12 13:45:16'),
(140, 'sugi', 'nbn', 'nbnb', 'Coimbatore', 'bn', 'India', '123456', '8012122975', 'fgf@gmail.com', '82', 'ORDER1016', 201, '2017-12-12 13:47:41'),
(141, 'sugi', 'cvc', 'vcvc', 'Coimbatore', 'cvcv', 'India', '123456', '8012122975', 'fgff@pofitec.com', '83', 'ORDER1017', 201, '2017-12-12 13:49:01'),
(142, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '49', '8BM34143MC985384A', 197, '2017-12-12 14:04:25'),
(143, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '84', 'ORDER1018', 197, '2017-12-12 14:08:07'),
(144, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '85', 'ORDER1019', 197, '2017-12-12 14:09:41'),
(145, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '86', 'ORDER1020', 197, '2017-12-12 15:08:35'),
(146, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '87', 'ORDER1021', 197, '2017-12-12 15:12:02'),
(147, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '50', '7XV261868K389481E', 197, '2017-12-12 15:29:29'),
(148, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '51', '3UC24031A3721333C', 197, '2017-12-13 04:26:25'),
(149, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '52', '9V914517RB797302W', 197, '2017-12-13 04:31:22'),
(150, 'sugi', 'cbe', 'cbe', 'Coimbatore', 'tn', 'India', '123456', '8012122975', 'suganya@pofitec.com', '1', '6K031407V76284519', 201, '2017-12-16 13:54:26'),
(151, 'sugi', 'cbekkk', 'cbe', 'Coimbatore', 'tn', 'India', '123456', '8012122975', 'suganya@pofitec.com', '1', '6K031407V76284519', 201, '2017-12-16 13:56:41'),
(152, 'Malar Gopal', 'coimbatore', 'ram nagar', 'Coimbatore', 'Tamil NAdu', 'India', '12234578', '801212975', 'malarvizhi@pofitec.com', '2', '03U1120119549191K', 186, '2017-12-18 06:59:53'),
(153, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '2', 'ORDER1002', 201, '2017-12-18 07:16:18'),
(154, 'suganya', 'cbe', 'cbe,ghg', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '3', '79N20323NE5053056', 201, '2017-12-18 09:51:43'),
(155, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '3', '79N20323NE5053056', 197, '2017-12-19 04:45:10'),
(156, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '4', 'ORDER1004', 197, '2017-12-19 04:46:53'),
(157, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '5', '9F082733SL7373426', 201, '2017-12-19 08:03:46'),
(158, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '7', '2GB21781RJ791900C', 201, '2017-12-19 08:09:38'),
(159, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '8', '3AA23653AN9915137', 201, '2017-12-19 09:29:44'),
(160, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '10', '3NY50624961538124', 201, '2017-12-19 11:15:17'),
(161, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '4', '', 201, '2017-12-19 11:19:32'),
(162, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '12', '79J03532RU5764411', 201, '2017-12-19 11:33:17'),
(163, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '13', '86R34639F9605723P', 201, '2017-12-20 06:30:37'),
(164, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '14', '0ED924767C9668059', 201, '2017-12-20 06:34:31'),
(165, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '5', '9F082733SL7373426', 201, '2017-12-20 06:35:33'),
(166, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '6', '24630669TJ296101U', 201, '2017-12-20 06:38:39'),
(167, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '15', 'ORDER1001', 201, '2017-12-20 06:45:35'),
(168, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '7', '2GB21781RJ791900C', 201, '2017-12-20 07:00:59'),
(169, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '8', '3AA23653AN9915137', 201, '2017-12-20 07:58:39'),
(170, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '9', '9E3312339S531020N', 201, '2017-12-20 08:03:54'),
(171, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '16', 'ORDER1002', 201, '2017-12-20 08:04:54'),
(172, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '17', 'ORDER1003', 201, '2017-12-20 12:41:16'),
(173, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '18', 'ORDER1004', 201, '2017-12-20 13:10:25'),
(174, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '19', 'ORDER1005', 201, '2017-12-21 05:34:19'),
(175, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '10', '3NY50624961538124', 201, '2017-12-21 05:42:55'),
(176, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '20', 'ORDER1006', 201, '2017-12-21 05:43:36'),
(177, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '21', '2AG83087FB768830P', 201, '2017-12-21 05:44:09'),
(178, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '22', 'ORDER1008', 201, '2017-12-21 05:44:29'),
(179, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '11', '6PJ31672EM452841Y', 201, '2017-12-21 13:21:29'),
(180, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '12', '79J03532RU5764411', 201, '2017-12-21 13:29:28'),
(181, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '13', '86R34639F9605723P', 201, '2017-12-21 14:02:09'),
(182, 'john cena', 'hj', 'nm n', 'Coimbatore', 'Tamil Nadu', 'India', '641010', '9632587410', 'ajo@gmail.com', '23', 'ORDER1009', 202, '2017-12-22 04:52:50'),
(183, 'amal', 'hj', 'nm n', 'Coimbatore', 'Tamil Nadu', 'India', '641010', '7531598624', 'amal@pofitec.com', '24', '9M436776LG357834G', 203, '2017-12-22 04:59:23'),
(184, 'amal', 'hj', 'nm n', 'Coimbatore', 'Tamil Nadu', 'India', '641010', '7531598624', 'amal@pofitec.com', '14', '0ED924767C9668059', 203, '2017-12-22 05:03:43'),
(185, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '16', '', 201, '2017-12-22 05:07:55'),
(186, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '18', '', 201, '2017-12-22 05:24:52'),
(187, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '20', '', 201, '2017-12-22 05:28:45'),
(188, 'amal', 'hj', 'nm n', 'Coimbatore', 'Tamil Nadu', 'India', '641010', '7531598624', 'amal@pofitec.com', '21', '2AG83087FB768830P', 203, '2017-12-22 05:31:56'),
(189, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '23', '', 201, '2017-12-22 05:47:41'),
(190, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '25', '52447455402780309', 201, '2017-12-22 06:13:06'),
(191, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '26', '6N553464YH560073S', 201, '2017-12-22 06:13:56'),
(192, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '27', '5XY4028984949073X', 201, '2017-12-22 07:46:49'),
(193, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '28', 'ORDER1014', 201, '2017-12-22 07:48:36'),
(194, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '29', 'ORDER1015', 201, '2017-12-22 07:49:22'),
(195, 'amal', 'hj', 'nm n', 'Coimbatore', 'Tamil Nadu', 'India', '641010', '7531598624', 'amal@pofitec.com', '30', '9R416707CH5978206', 203, '2017-12-22 11:52:31'),
(196, 'amal', 'hj', 'nm n', 'Coimbatore', 'Tamil Nadu', 'India', '641010', '7531598624', 'amal@pofitec.com', '31', '0RY18511MJ490792B', 203, '2017-12-22 11:57:56'),
(197, 'amal', 'hj', 'nm n', 'Coimbatore', 'Tamil Nadu', 'India', '641010', '7531598624', 'amal@pofitec.com', '24', '9M436776LG357834G', 203, '2017-12-22 12:05:46'),
(198, 'amal', 'hj', 'nm n', 'Coimbatore', 'Tamil Nadu', 'India', '641010', '7531598624', 'amal@pofitec.com', '25', '52447455402780309', 203, '2017-12-22 12:07:37'),
(199, 'amal', 'hj', 'nm n', 'Coimbatore', 'Tamil Nadu', 'India', '641010', '7531598624', 'amal@pofitec.com', '26', '6N553464YH560073S', 203, '2017-12-22 12:11:24'),
(200, 'amal', 'hj', 'nm n', 'Coimbatore', 'Tamil Nadu', 'India', '641010', '7531598624', 'amal@pofitec.com', '32', '5HE291760N2586152', 203, '2017-12-22 12:23:01'),
(201, 'amal', 'hj', 'nm n', 'Coimbatore', 'Tamil Nadu', 'India', '641010', '7531598624', 'amal@pofitec.com', '27', '5XY4028984949073X', 203, '2017-12-22 12:24:53'),
(202, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '33', '0L636862BX7370612', 201, '2017-12-22 12:47:16'),
(203, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '29', '', 201, '2017-12-22 12:47:59'),
(204, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '34', '1XP685263D264494M', 201, '2017-12-22 12:48:42'),
(205, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '35', '4EB761201X023850H', 201, '2017-12-25 05:59:19'),
(206, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '36', '7HY02061W0863332R', 201, '2017-12-25 06:01:26'),
(207, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '30', '9R416707CH5978206', 201, '2017-12-25 07:53:55'),
(208, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '31', '0RY18511MJ490792B', 201, '2017-12-25 07:59:24'),
(209, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '32', '5HE291760N2586152', 201, '2017-12-25 08:01:46'),
(210, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '33', '0L636862BX7370612', 201, '2017-12-25 08:02:58'),
(211, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '37', '1GY19202KC5728326', 201, '2017-12-25 09:25:23'),
(212, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '38', '1SE07703430416241', 201, '2017-12-25 09:30:12'),
(213, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '39', '58X139085H000343K', 201, '2017-12-25 09:31:58'),
(214, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '40', '2NP83756FC070680U', 201, '2017-12-25 09:38:04'),
(215, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '41', '2F716716P51046008', 201, '2017-12-25 09:46:06'),
(216, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '34', '1XP685263D264494M', 201, '2017-12-25 09:47:32'),
(217, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '35', '4EB761201X023850H', 201, '2017-12-25 09:48:49'),
(218, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '36', '7HY02061W0863332R', 201, '2017-12-25 10:07:35'),
(219, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '42', 'ORDER1010', 201, '2017-12-25 10:39:36'),
(220, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '43', 'ORDER1011', 201, '2017-12-25 10:41:00'),
(221, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '44', '3PY20343PJ9472408', 201, '2017-12-25 11:13:01'),
(222, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '37', '1GY19202KC5728326', 201, '2017-12-25 11:15:25'),
(223, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '38', '1SE07703430416241', 201, '2017-12-25 11:17:43'),
(224, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '39', '58X139085H000343K', 201, '2017-12-25 11:23:09'),
(225, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '45', '9EK709210D1805016', 201, '2017-12-25 11:28:52'),
(226, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '40', '2NP83756FC070680U', 201, '2017-12-25 11:48:50'),
(227, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '46', 'ORDER1014', 201, '2017-12-25 12:40:25'),
(228, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '47', 'ORDER1015', 201, '2017-12-26 04:46:52'),
(229, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '48', 'ORDER1016', 201, '2017-12-26 05:00:38'),
(230, 'suganya', 'cbe', 'cbe', 'city english', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '41', '2F716716P51046008', 201, '2017-12-26 05:01:45'),
(231, 'saranya', '', '', '1', '', '1', '', '', '', '', '', 207, '2017-12-26 07:57:26'),
(232, 'suganya', 'sfsdf', 'df', 'Coimbatore', 'tamilnadu', 'India', '614523', '9856322356', 'suganya.t@pofitec.com', '49', '8BM34143MC985384A', 207, '2017-12-27 08:03:08'),
(233, 'vinods', '', '', '', '', '', '', '', '', '', '', 208, '2017-12-27 10:54:10'),
(234, 'dgf', '', '', '1', '', '1', '', '', '', '', '', 209, '2017-12-28 11:05:17'),
(235, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '50', '7XV261868K389481E', 207, '2017-12-29 11:32:28'),
(236, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '51', '3UC24031A3721333C', 207, '2017-12-29 11:33:35'),
(237, 'suganya', 'sfsdf', 'df', 'Coimbatore', 'tamilnadu', 'India', '614523', '9856322356', 'suganya.t@pofitec.com', '53', 'ORDER1001', 207, '2017-12-29 11:36:38'),
(238, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '54', '', 207, '2017-12-29 11:58:34'),
(239, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '55', '8FR3459685178804M', 207, '2017-12-29 12:19:56'),
(240, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '56', '4FM70563FJ6525317', 207, '2017-12-29 12:40:52'),
(241, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '57', '164717853P1072731', 207, '2017-12-29 12:42:11'),
(242, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '58', '', 207, '2017-12-29 12:58:33'),
(243, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '59', '', 207, '2017-12-29 13:20:59'),
(244, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '60', '', 207, '2017-12-29 13:33:53'),
(245, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '42', '', 201, '2017-12-29 13:37:59'),
(246, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '61', '', 207, '2017-12-29 13:50:56'),
(247, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '43', '', 201, '2017-12-29 13:57:57'),
(248, 'suganya', 'sfsdf', 'df', 'Coimbatore', 'tamilnadu', 'India', '614523', '9856322356', 'suganya.t@pofitec.com', '62', 'ORDER1001', 207, '2018-01-02 07:50:30'),
(249, 'suganya', 'sfsdf', 'df', 'Coimbatore', 'tamilnadu', 'India', '614523', '9856322356', 'suganya.t@pofitec.com', '63', 'ORDER1002', 207, '2018-01-02 08:11:04'),
(250, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '65', 'ORDER1003', 197, '2018-01-03 11:31:38'),
(251, 'venugopal', 'jhkjhkk', 'jhkj', 'Coimbatore', 'jkk', 'India', '645678877', '3456765434', 'venugopal@pofitec.com', '66', 'ORDER1004', 197, '2018-01-03 13:32:22'),
(252, 'suganya', 'sfsdf', 'df', 'Coimbatore', 'tamilnadu', 'India', '614523', '9856322356', 'suganya.t@pofitec.com', '67', 'ORDER1005', 207, '2018-01-04 07:03:15'),
(253, 'suganya', 'sfsdf', 'df', 'Coimbatore', 'tamilnadu', 'India', '614523', '9856322356', 'suganya.t@pofitec.com', '68', 'ORDER1006', 207, '2018-01-04 09:50:39'),
(254, 'suganya', 'sfsdf', 'df', 'Coimbatore', 'tamilnadu', 'India', '614523', '9856322356', 'suganya.t@pofitec.com', '69', 'ORDER1007', 207, '2018-01-04 10:46:11'),
(255, 'suganya', 'sfsdf', 'df', 'Coimbatore', 'tamilnadu', 'India', '614523', '9856322356', 'suganya.t@pofitec.com', '70', '3BR68107MB001423L', 207, '2018-01-04 10:51:25'),
(256, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '72', '5CY08665XH8540825', 206, '2018-01-05 06:46:31'),
(257, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'bala@gmail.com', '73', '6CU05309P59494244', 212, '2018-01-05 09:17:06'),
(258, 'bala', 'Coimbatore, ram nagar', 'ram nagar', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9874569856', 'bala@gmail.com', '74', '1LL41476VJ1615912', 212, '2018-01-05 09:22:31'),
(259, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'bala@gmail.com', '75', '1LL41476VJ1615912', 212, '2018-01-05 09:25:31'),
(260, 'vishnu.v.r', 'coimbatore', 'coimbatore', 'Coimbatore', 'tamilnadu', 'India', '641104', '8891619125', 'vishnu@pofitec.com', '76', 'ORDER1013', 213, '2018-01-05 13:58:04'),
(261, 'test name  sfsdf dsf dsf dsf ds hf$@*$@)$*)(@*$)@$@FLCKSCLKSJDLKSDJLKASDLDSLDLSDLKSJDLSJD LS*$)@Q(#*', 'test address1  sfsdf dsf dsf dsf ds hf$@*$@)$*)(@*$)@$@FLCKSCLKSJDLKSDJLKASDLDSLDLSDLKSJDLSJD LS*$)@Q(#*)@*#)(@#@#@#@S DLJSDLKSJDJSKLD SLDK LDSJD LKASDLKA $@*#@Q)# SDLKJSDJAS##@', 'test address2   sfsdf dsf dsf dsf ds hf$@*$@)$*)(@*$)@$@FLCKSCLKSJDLKSDJLKASDLDSLDLSDLKSJDLSJD LS*$)@Q(#*)@*#)(@#@#@#@S DLJSDLKSJDJSKLD SLDK LDSJD LKASDLKA $@*#@Q)# SDLKJSDJAS##@', 'TEst city   sfsdf dsf dsf dsf ds hf$@*$@)$*)(@*$)@', 'test state  sfsdf dsf dsf dsf ds hf$@*$@)$*)(@*$)@$@FLCKSCLKSJDLKSDJLKASDLDSLDLSDLKSJDLSJD LS*$)@Q(#', 'test ccountry   sfsdf dsf dsf dsf ds hf$@*$@)$*)(@', '654321', '4244114321312', 'vinodbabu@pofitec.com', '77', 'ORDER1014', 214, '2018-01-08 06:19:29'),
(262, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu1@pofitec.com', '78', 'ORDER1015', 214, '2018-01-08 06:29:03'),
(263, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '79', 'ORDER1016', 214, '2018-01-08 06:55:08'),
(264, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu1@pofitec.com', '80', 'ORDER1017', 214, '2018-01-08 07:00:55'),
(265, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore1', 'Test state22', 'India1', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '44', '3PY20343PJ9472408', 214, '2018-01-08 07:35:55'),
(266, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state22', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '45', '9EK709210D1805016', 214, '2018-01-08 11:31:41'),
(267, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '81', '', 201, '2018-01-08 11:37:37'),
(268, 'suganya', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '654321', '7373857689', 'suganya.t@pofitec.com', '82', '', 201, '2018-01-08 11:38:22'),
(269, 'test', 'dfgd', 'dfdasf', 'sdfdsfds', 'sdfdsfds', 'sdfdsfds', '324324', '3245243242', 'vinodbabu@pofitec.com', '83', 'ORDER1001', 214, '2018-01-08 11:47:57'),
(270, 'suganya', 'test ship addr1', 'test ship addr2', '', 'TN', '', '654321', '7373857689', 'suganya.t@pofitec.com', '84', '', 207, '2018-01-08 12:03:40'),
(271, 'suganya', 'test ship addr1', 'test ship addr2', '', 'TN', '', '654321', '7373857689', 'suganya.t@pofitec.com', '85', '', 207, '2018-01-08 12:04:08'),
(272, 'gahdhi', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '641654', '9944349002', 'suganyya.t@pofitec.com', '86', '', 207, '2018-01-08 12:13:17'),
(273, 'testuset', '\"test addr1\"', '\"test addr2\"', '1', 'tamil nadu', '1', '123456', '7200285584', 'suganya.t@pofitec.com', '46', '', 207, '2018-01-08 12:18:12'),
(274, 'gahdhi', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '641654', '9944349002', 'suganyya.t@pofitec.com', '87', '', 201, '2018-01-08 12:29:35'),
(275, 'gahdhi', 'test ship addr1', 'test ship addr2', '1', 'TN', '1', '641654', '9944349002', 'suganyya.t@pofitec.com', '88', '', 201, '2018-01-08 12:29:36'),
(276, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu1@pofitec.com', '47', '', 214, '2018-01-08 12:54:08'),
(277, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu1@pofitec.com', '48', '', 214, '2018-01-08 12:54:08'),
(278, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '91', 'ORDER1001', 201, '2018-01-10 06:10:38'),
(279, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '92', 'ORDER1002', 201, '2018-01-10 06:18:43'),
(280, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '93', 'ORDER1003', 201, '2018-01-10 07:02:06'),
(281, 'venugopal', 'dsfsd', 'sdfsd', 'Coimbatore', 'fsdfsdf', 'India', '4345', '3456765434', 'venugopal@pofitec.com', '94', 'ORDER1004', 220, '2018-01-10 07:16:01'),
(282, 'venugopal', 'dsfsd', 'sdfsd', 'Coimbatore', 'fsdfsdf', 'India', '546456', '3456765434', 'venugopal@pofitec.com', '95', 'ORDER1005', 220, '2018-01-10 07:25:43'),
(283, 'venugopal', 'rwer', '34', 'Coimbatore', '3423', 'India', '4234', '3456765434', 'venugopal@pofitec.com', '96', 'ORDER1006', 220, '2018-01-10 07:38:29'),
(284, 'venugopal', 'l;\'l', 'l;\'', 'Coimbatore', '8978', 'India', '987978', '3456765434', 'venugopal@pofitec.com', '98', 'ORDER1007', 220, '2018-01-10 08:09:51'),
(285, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '99', 'ORDER1008', 201, '2018-01-10 10:33:19'),
(286, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '102', 'ORDER1009', 206, '2018-01-10 10:59:50'),
(287, 'suganya', '', '', '7', '', '8', '', '', '', '', '', 226, '2018-01-10 11:06:51'),
(288, 'suganya', '', '', '1', '', '1', '', '', '', '', '', 227, '2018-01-10 11:08:37'),
(289, 'vinod babu', '', '', '', '', '', '', '', '', '', '', 228, '2018-01-10 11:25:17'),
(290, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya@pofitec.com', '103', 'ORDER1010', 201, '2018-01-10 13:37:39'),
(291, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'bala@gmail.com', '104', 'ORDER1011', 212, '2018-01-10 13:45:46'),
(292, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'bala@gmail.com', '105', 'ORDER1012', 212, '2018-01-10 13:50:55'),
(293, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'bala@gmail.com', '106', 'ORDER1013', 212, '2018-01-10 13:54:09'),
(294, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'bala@gmail.com', '107', 'ORDER1014', 212, '2018-01-10 13:57:36'),
(295, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'bala@gmail.com', '108', 'ORDER1015', 212, '2018-01-11 04:44:35'),
(296, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '109', 'ORDER1016', 201, '2018-01-11 04:46:37');
INSERT INTO `nm_shipping` (`ship_id`, `ship_name`, `ship_address1`, `ship_address2`, `ship_ci_id`, `ship_state`, `ship_country`, `ship_postalcode`, `ship_phone`, `ship_email`, `ship_order_id`, `ship_trans_id`, `ship_cus_id`, `date_time`) VALUES
(297, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'bala@gmail.com', '110', 'ORDER1017', 212, '2018-01-11 04:56:19'),
(298, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'balamurugan@pofitec.com', '111', 'ORDER1018', 212, '2018-01-11 05:09:47'),
(299, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'balamurugan@pofitec.com', '112', 'ORDER1019', 212, '2018-01-11 05:12:21'),
(300, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'balamurugan@pofitec.com', '113', 'ORDER1020', 212, '2018-01-11 05:21:56'),
(301, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'balamurugan@pofitec.com', '114', 'ORDER1021', 212, '2018-01-11 05:48:38'),
(302, 'venugopal_shipping name', 'shipping adress 1', 'shipping adress2', 'shipping city', 'shipping state', 'shipping country', '111111', '0000000000', 'shippingID@pofitec.com', '115', 'ORDER1022', 220, '2018-01-11 06:35:59'),
(303, 'venugopal_shippin', 'shipping adress  Line1', 'shipping Address Line2', 'Coimbatore', 'shipping state', 'shipping  India', '333333', '2222222222', 'shippingvenugopal@pofitec.com', '117', 'ORDER1023', 220, '2018-01-11 06:41:09'),
(304, 'venugopal_s', 'gfh', 'gfh', 'Coimbatore', 'gf', 'India', '123456', '3456765434', 'venugopal@pofitec.com', '117', 'ORDER1024', 220, '2018-01-11 07:56:29'),
(305, 'venugopal', 'ghjh', 'ghj', 'Coimbatore', 'hgjghj', 'India', '7567', '3456765434', 'venugopal@pofitec.com', '49', '8BM34143MC985384A', 220, '2018-01-11 07:59:57'),
(306, 'qwerty', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', 'Coimbatore', 'ertrd', 'India', '123456', '7418529635', 'suganya.t@pofitec.com', '118', 'ORDER1025', 232, '2018-01-11 09:17:25'),
(307, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', 'werewtre', 'etrhgfh', 'tyrytjhg', '123456', '7418529635', 'suganya.t@pofitec.com', '120', 'ORDER1026', 232, '2018-01-11 09:22:30'),
(308, 'users', 'wadsedfggh', 'cbe', 'Coimbatore', 'ertrd', 'India', '123456', '7418529635', 'suganya.t@pofitec.com', '121', 'ORDER1027', 232, '2018-01-11 09:43:49'),
(309, 'users', 'rtryuy57', 'cbe', 'Coimbatore', 'ertrd', 'India', '123456', '7418529635', 'suganya.t@pofitec.com', '122', 'ORDER1028', 232, '2018-01-11 09:54:12'),
(310, 'bala', 'gandhipuram', 'Bus stand', '1', 'tn', '1', '640122', '0123456789', 'bala@gmail.com', '123', 'ORDER1029', 212, '2018-01-11 12:59:12'),
(311, 'bala', 'gandhipuram', 'Bus stand', '1', 'tn', '1', '640122', '0123456789', 'balamurugan@pofitec.com', '50', '7XV261868K389481E', 212, '2018-01-11 13:05:38'),
(312, 'bala', 'gandhipuram', 'Bus stand', '12', 'tn', '1', '640122', '0123456789', 'balamurugan@pofitec.com', '124', 'ORDER1030', 212, '2018-01-11 13:11:41'),
(313, 'bala', 'gandhipuram', 'Bus stand', '22', 'tn', '7', '640122', '0123456789', 'balamurugan@pofitec.com', '125', 'ORDER1031', 212, '2018-01-11 13:15:56'),
(314, 'bala', 'gandhipuram', 'Bus stand', '18', 'tn', '8', '640122', '9874569856', 'balamurugan@pofitec.com', '126', 'ORDER1032', 212, '2018-01-11 13:32:13'),
(315, 'bala', 'gandhipuram', 'Bus stand', '12', 'tn', '7', '640122', '9874569856', 'balamurugan@pofitec.com', '51', '3UC24031A3721333C', 212, '2018-01-11 13:38:34'),
(316, 'bala', 'gandhipuram', 'Bus stand', '12', 'tn', '7', '640122', '0123456', 'balamurugan@pofitec.com', '52', '9V914517RB797302W', 212, '2018-01-11 13:53:15'),
(317, 'bala', 'gandhipuram', 'Bus stand', '1', 'tn', '1', '640122', '9874569856', 'balamurugan@pofitec.com', '127', 'ORDER1033', 212, '2018-01-11 14:03:51'),
(318, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', '14', 'ertrd', '1', '123456', '7418529635', 'suganya.t@pofitec.com', '128', 'ORDER1034', 232, '2018-01-12 04:09:41'),
(319, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', '14', 'Test state21', '1', '123456', '42441143213125435435', 'vinodbabu1@pofitec.com', '129', 'ORDER1035', 214, '2018-01-12 05:01:40'),
(320, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', '14', 'Test state21', '1', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '130', 'ORDER1036', 214, '2018-01-12 05:21:28'),
(321, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', 'Indira', 'ertrd', 'India', '123456', '7418529635', 'suganya.t@pofitec.com', '132', 'ORDER1037', 232, '2018-01-12 06:14:01'),
(322, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', '', 'ertrd', 'United States of America', '123456', '7418529635', 'suganya.t@pofitec.com', '133', 'ORDER1038', 232, '2018-01-12 06:26:52'),
(323, 'dsfds', 'fggfh', 'fdgfg', '0', 'fdh', '0', '342353', '43254365656545', 'reg@dfd.cvc', '134', 'ORDER1039', 232, '2018-01-12 06:46:17'),
(324, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', '0', 'ertrd', '0', '123456', '7418529635', 'suganya.t@pofitec.com', '135', 'ORDER1040', 232, '2018-01-12 06:54:12'),
(325, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', '0', 'ertrd', '0', '123456', '7418529635', 'suganya.t@pofitec.com', '136', 'ORDER1041', 232, '2018-01-12 06:55:25'),
(326, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', '0', 'ertrd', '0', '123456', '7418529635', 'suganya.t@pofitec.com', '137', 'ORDER1042', 232, '2018-01-12 06:57:20'),
(327, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', 'salem ', 'ertrd', 'United States of America', '123456', '7418529635', 'suganya.t@pofitec.com', '138', 'ORDER1043', 232, '2018-01-12 07:02:40'),
(328, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', 'salem ', 'ertrd', 'United States of America', '123456', '7418529635', 'suganya.t@pofitec.com', '139', 'ORDER1044', 232, '2018-01-12 07:03:15'),
(329, 'users', 'rgrd', 'cbe', '0', 'ertrd', '0', '123456', '7418529635', 'suganya.t@pofitec.com', '140', 'ORDER1045', 232, '2018-01-12 07:06:47'),
(330, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', '0', 'ertrd', '0', '123456', '7418529635', 'suganya.t@pofitec.com', '141', 'ORDER1046', 232, '2018-01-12 07:08:40'),
(331, 'sfdsf', 'fdgdhfd', 'gfdg', '', 'dfdsg', 'India', '654657', '354365464', 'dsfg@gf.cvv', '142', 'ORDER1047', 232, '2018-01-12 07:10:47'),
(332, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', 'Coimbatore', 'ertrd', 'India', '123456', '7418529635', 'suganya.t@pofitec.com', '144', 'ORDER1515760977144', 232, '2018-01-12 12:42:58'),
(333, 'vinod babu', 'fasdasdgfh', 'asdsafgdfg', 'Coimbatore', 'Test statwew', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '145', 'ORDER1515761002145', 214, '2018-01-12 12:43:22'),
(334, 'users', 'asdaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddAS', 'cbe', 'Coimbatore', 'ertrd', 'India', '123456', '7418529635', 'suganya.t@pofitec.com', '146', 'ORDER1515761158146', 232, '2018-01-12 12:45:58'),
(335, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '147', 'ORDER1515761998147', 201, '2018-01-12 12:59:58'),
(336, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '53', '', 201, '2018-01-12 13:16:54'),
(337, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '54', '', 201, '2018-01-12 13:16:54'),
(338, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '148', 'ORDER1515819755148', 201, '2018-01-13 05:02:35'),
(339, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '149', 'ORDER1515820016149', 201, '2018-01-13 05:06:56'),
(340, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '55', '8FR3459685178804M', 201, '2018-01-13 05:22:49'),
(341, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '56', '4FM70563FJ6525317', 201, '2018-01-13 05:34:55'),
(342, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulaero@gmail.com', '150', 'ORDER1515846047150', 249, '2018-01-13 12:20:47'),
(343, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '151', 'ORDER1515846205151', 249, '2018-01-13 12:23:25'),
(344, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulaero@gmail.com', '152', 'ORDER1515846895152', 249, '2018-01-13 12:34:55'),
(345, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '153', 'ORDER1515846987153', 249, '2018-01-13 12:36:28'),
(346, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '154', 'ORDER1515847427154', 249, '2018-01-13 12:43:47'),
(347, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '155', 'ORDER1515848274155', 249, '2018-01-13 12:57:54'),
(348, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulaero@gmail.com', '156', 'ORDER1515851015156', 249, '2018-01-13 13:43:36'),
(349, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Coimbatore', 'tn', 'India', '123456', '8012122975', 'suganya.t@pofitec.com', '158', 'ORDER1516076276158', 201, '2018-01-16 04:17:56'),
(350, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Coimbatore', 'tn', 'India', '123456', '8012122975', 'suganya.t@pofitec.com', '160', 'ORDER1516076610160', 201, '2018-01-16 04:23:30'),
(351, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '161', 'ORDER1516077358161', 250, '2018-01-16 04:35:59'),
(352, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '163', 'ORDER1516078039163', 201, '2018-01-16 04:47:19'),
(353, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '164', 'ORDER1516078628164', 250, '2018-01-16 04:57:08'),
(354, 'venugopal', 'dfgg', 'dfgdg', 'Coimbatore', 'dfgff', 'India', '545345', '3456765434', 'venugopal@pofitec.com', '57', '164717853P1072731', 220, '2018-01-16 05:21:44'),
(355, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '166', 'ORDER1516083178166', 201, '2018-01-16 06:12:59'),
(356, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '168', 'ORDER1516084251168', 214, '2018-01-16 06:30:52'),
(357, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '58', '', 214, '2018-01-16 06:42:02'),
(358, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '59', '', 214, '2018-01-16 06:42:02'),
(359, 'venugopal', 'ytrytry', 'tryrty', 'Coimbatore', 'Tytramil NAduy', 'India', '645645', '3456765434', 'venugopal@pofitec.com', '170', 'ORDER1516087066170', 220, '2018-01-16 07:17:46'),
(360, 'venugopal', 'ghgfh', 'gfhgf', 'Coimbatore', 'fghfg', 'India', '56456', '3456765434', 'venugopal@pofitec.com', '171', 'ORDER1516087172171', 220, '2018-01-16 07:19:32'),
(361, 'venugopal', 'ghjghj', 'bnmngh', 'Coimbatore', 'ghjghj', 'India', '765756', '3456765434', 'venugopal@pofitec.com', '172', 'ORDER1516087619172', 220, '2018-01-16 07:26:59'),
(362, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '60', '', 214, '2018-01-16 07:49:04'),
(363, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '61', '', 214, '2018-01-16 07:49:04'),
(364, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '62', '', 214, '2018-01-16 08:14:55'),
(365, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '63', '', 214, '2018-01-16 08:14:55'),
(366, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '64', '', 214, '2018-01-16 09:30:57'),
(367, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '65', '', 214, '2018-01-16 09:30:57'),
(368, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '66', '', 214, '2018-01-16 09:31:09'),
(369, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '67', '', 214, '2018-01-16 09:31:09'),
(370, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'bala@gmail.com', '173', 'ORDER1516095162173', 212, '2018-01-16 09:32:42'),
(371, 'vinod bab', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '68', '', 214, '2018-01-16 09:32:44'),
(372, 'vinod bab', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '69', '', 214, '2018-01-16 09:32:44'),
(373, 'venugopal', 'hjghj', 'fdgdfg', 'Coimbatore', 'dfgdfg', 'India', '123123', '3456765434', 'venugopal@pofitec.com', '174', 'ORDER1516095238174', 220, '2018-01-16 09:33:58'),
(374, 'vinod bab', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '70', '3BR68107MB001423L', 214, '2018-01-16 09:35:54'),
(375, 'vinod bab', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '71', '3BR68107MB001423L', 214, '2018-01-16 09:35:54'),
(376, 'venugopal', 'ghgfhgh', 'bnmnj', 'Coimbatore', 'tytyu', 'India', '67567', '3456765434', 'venugopal@pofitec.com', '175', 'ORDER1516095421175', 220, '2018-01-16 09:37:01'),
(377, 'bala', 'Ram nagar', 'ramnagar', 'Coimbatore', 'Tamil Nadu', 'India', '634217', '9874569856', 'balamurugan@pofitec.com', '176', 'ORDER1516096160176', 212, '2018-01-16 09:49:20'),
(378, 'venugopal', 'ghjghj', 'tytry', 'Coimbatore', 'hgjhgh', 'India', '123456', '3456765434', 'venugopal@pofitec.com', '177', 'ORDER1516096814177', 220, '2018-01-16 10:00:14'),
(379, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '178', 'ORDER1516097078178', 220, '2018-01-16 10:04:38'),
(380, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '179', 'ORDER1516097173179', 220, '2018-01-16 10:06:14'),
(381, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '72', '5CY08665XH8540825', 220, '2018-01-16 10:07:30'),
(382, 'ragul', '', 'coimbatore', 'Coimbatore', 'tamilnadu', 'India', '641104', '9944349002', 'ragulgandhi@pofitec.com', '181', 'ORDER1516104627181', 250, '2018-01-16 12:10:27'),
(383, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '183', 'ORDER1516104669183', 250, '2018-01-16 12:11:09'),
(384, 'suganya', 'asdfgj', 'qwerty', 'vadavalli', 'tn', 'United States of America', '123456', '8012122975', 'suganya.t@pofitec.com', '185', 'ORDER1516105593185', 201, '2018-01-16 12:26:33'),
(385, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '73', '6CU05309P59494244', 201, '2018-01-16 12:55:19'),
(386, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'tamilnadu', 'India', '641104', '9944349002', 'ragulgandhi@pofitec.com', '186', 'ORDER1516114272186', 250, '2018-01-16 14:51:12'),
(387, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '187', 'ORDER1516167174187', 201, '2018-01-17 05:32:54'),
(388, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'tamilnady', 'India', '641104', '9944349002', 'ragulgandhi@pofitec.com', '190', 'ORDER1516169597190', 250, '2018-01-17 06:13:18'),
(389, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu1@pofitec.com', '74', '1LL41476VJ1615912', 214, '2018-01-17 07:25:53'),
(390, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu1@pofitec.com', '75', '1LL41476VJ1615912', 214, '2018-01-17 07:25:53'),
(391, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '76', '68L07932E58851627', 214, '2018-01-17 09:29:22'),
(392, 'vinod babu d gdf', 'fasdasdgfh fh', 'asdsafgdfgfghf', 'Lahore', 'Test state21', 'India', '123456', '42441143213125435435', 'vinodbabu@pofitec.com', '77', '68L07932E58851627', 214, '2018-01-17 09:29:22'),
(393, 'vinod babu', 'test address1', 'test address2', 'vadavalli', 'Test state21', 'India', '123456', '9790417157', 'vinodbabu@pofitec.com', '79', '56E0726737616602T', 214, '2018-01-17 09:41:14'),
(394, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '192', 'ORDER1516182147192', 201, '2018-01-17 09:42:27'),
(395, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '193', 'ORDER1516189815193', 201, '2018-01-17 11:50:15'),
(396, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '80', '3D239866UL551162H', 201, '2018-01-17 11:51:37'),
(397, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '81', '9YN55284MV039463P', 250, '2018-01-17 12:35:25'),
(398, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '194', 'ORDER1516192587194', 250, '2018-01-17 12:36:27'),
(399, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'Tamil Nadu', 'India', '642356', '9944349002', 'ragulgandhi@pofitec.com', '82', '7UA06428H85103338', 250, '2018-01-17 12:54:48'),
(400, 'ragul', 'coimabatore', 'coimabatore', 'Coimbatore', 'tamilnadu', 'India', '641104', '9944349002', 'ragulgandhi@pofitec.com', '196', 'ORDER1516269124196', 250, '2018-01-18 09:52:04'),
(401, 'suganya', '', '', '1', '', '1', '', '', '', '', '', 251, '2018-01-18 11:52:16'),
(402, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'tamilnadu', 'India', '641104', '9944349002', 'ragulgandhi@pofitec.com', '197', 'ORDER1516277128197', 250, '2018-01-18 12:05:28'),
(403, 'ragul', 'coimbatore', 'coimbatore', 'Coimbatore', 'tamilnadu', 'India', '641102', '9944349002', 'ragulgandhi@pofitec.com', '83', '85A49672BE817862B', 250, '2018-01-18 12:07:57'),
(404, 'ragul', 'Coimbatore', 'Coimbatore', 'Coimbatore', 'Tamilnadu', 'India', '641104', '9944349002', 'ragulgandhi@pofitec.com', '203', 'ORDER1516360022203', 250, '2018-01-19 11:07:03'),
(405, 'suganya', '', '', '1', '', '1', '', '', '', '', '', 252, '2018-01-22 12:01:03'),
(406, 'sfdfsdf', '', '', '1', '', '1', '', '', '', '', '', 253, '2018-01-23 06:06:23'),
(407, 'ragul', 'Coimbatore', 'Coimbatore', 'Coimbatore', 'Tamilnadu', 'India', '641104', '9944349002', 'ragulgandhi@pofitec.com', '204', 'ORDER1516960614204', 250, '2018-01-26 09:56:54'),
(408, 'ragul', 'Coimbatore', 'Coimbatore', 'Coimbatore', 'Tamilnadu', 'India', '641104', '9944349002', 'ragulgandhi@pofitec.com', '205', 'ORDER1516961277205', 250, '2018-01-26 10:07:57'),
(409, 'ragul', 'Coimbatore', 'Coimbatore', 'Coimbatore', 'Tamilnadu', 'India', '641104', '9944349002', 'ragulgandhi@pofitec.com', '206', 'ORDER1516961987206', 250, '2018-01-26 10:19:47'),
(410, 'bala', 'ram nagar', 'Peelamedu', 'Coimbatore', 'tamil nadu', 'India', '634601', '7418529635', 'balamurugan@pofitec.com', '207', 'ORDER1517807871207', 229, '2018-02-05 05:17:51'),
(411, 'bala', 'ram nagar', 'Peelamedu', 'Coimbatore', 'tamil nadu', 'India', '634601', '7418529635', 'balamurugan@pofitec.com', '208', 'ORDER1517807965208', 229, '2018-02-05 05:19:25'),
(412, 'bala', 'ram nagar', 'Peelamedu', 'Coimbatore', 'tamil nadu', 'India', '634601', '7418529635', 'balamurugan@pofitec.com', '209', 'ORDER1517808866209', 229, '2018-02-05 05:34:26'),
(413, 'bala', 'ram nagar', 'Peelamedu', 'Coimbatore', 'tamil nadu', 'India', '634601', '7418529635', 'balamurugan@pofitec.com', '210', 'ORDER1517809115210', 229, '2018-02-05 05:38:35'),
(414, 'bala', 'Hopes', 'Peelamedu', 'Coimbatore', 'tamil nadu', 'India', '634601', '9874569856', 'balamurugan@pofitec.com', '211', 'ORDER1517825036211', 212, '2018-02-05 10:03:56'),
(415, 'bala', 'ram nagar', 'Peelamedu', 'Coimbatore', 'tamil nadu', 'India', '634601', '9874569856', 'balamurugan@pofitec.com', '212', 'ORDER1517825491212', 212, '2018-02-05 10:11:31'),
(416, 'bala', 'ram nagar', 'Peelamedu', 'Coimbatore', 'tamil nadu', 'India', '634601', '7418529635', 'balamurugan@pofitec.com', '213', 'ORDER1517831514213', 229, '2018-02-05 11:51:54'),
(417, 'bala', 'ram nagar', 'Peelamedu', 'Coimbatore', 'tamil nadu', 'India', '634601', '7418529635', 'balamurugan@pofitec.com', '84', '3P6520629W955813U', 229, '2018-02-05 11:57:28'),
(418, 'bala', 'ram nagar', 'Peelamedu', 'Coimbatore', 'tamil nadu', 'India', '634601', '7418529635', 'balamurugan@pofitec.com', '214', 'ORDER1517835128214', 229, '2018-02-05 12:52:08'),
(419, 'bala', 'Hope', 'Peelamedu', 'Coimbatore', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '85', '0BF64068RG828243R', 229, '2018-02-05 13:01:43'),
(420, 'bala', 'Hope', 'Peelamedu', 'Coimbatore', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '215', 'ORDER1517894784215', 229, '2018-02-06 05:26:24'),
(421, 'bala', 'Hope', 'Peelamedu', 'Coimbatore', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '86', '2DB3789912043444P', 229, '2018-02-06 05:28:12'),
(422, 'bala', 'Hope', 'Peelamedu', 'Coimbatore', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '216', 'ORDER1517895517216', 229, '2018-02-06 05:38:37'),
(423, 'bala', 'Hope', 'Peelamedu', 'Coimbatore', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '87', '00B391695E622323V', 229, '2018-02-06 05:39:58'),
(424, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '217', 'ORDER1517898034217', 201, '2018-02-06 06:20:34'),
(425, 'user', 'cbe', 'cbe', 'Coimbatore', 'tn', 'India', '123456', '1234567895', 'user@gmail.com', '218', 'ORDER1517915909218', 253, '2018-02-06 11:18:29'),
(426, 'bala', 'Hope', 'Peelamedu', 'Coimbatore', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '219', 'ORDER1517916234219', 229, '2018-02-06 11:23:54'),
(427, 'bala', 'Hope', 'Peelamedu', 'Coimbatore', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '220', 'ORDER1517917355220', 229, '2018-02-06 11:42:35'),
(428, 'bala', 'Hope', 'Peelamedu', 'Coimbatore', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '221', 'ORDER1517990078221', 229, '2018-02-07 07:54:38'),
(429, 'bala', 'Hope', 'Peelamedu', 'Coimbatore', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '222', 'ORDER1517990184222', 229, '2018-02-07 07:56:24'),
(430, 'bala', 'Hope', 'Peelamedu', 'Coimbatore', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '88', '2D4253430C282510E', 229, '2018-02-07 07:59:00'),
(431, 'bala', 'Hope', 'Peelamedu', 'Coimbatore', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '89', '52B74444A5176283B', 229, '2018-02-07 08:04:07'),
(432, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '223', 'ORDER1518415103223', 201, '2018-02-12 05:58:23'),
(433, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '224', 'ORDER1518415193224', 201, '2018-02-12 05:59:53'),
(434, 'balaa', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '225', 'ORDER1518583040225', 229, '2018-02-14 04:37:20'),
(435, 'balaa', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '226', 'ORDER1518586299226', 229, '2018-02-14 05:31:39'),
(436, 'balaa', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '227', 'ORDER1518586507227', 229, '2018-02-14 05:35:07'),
(437, 'balaa', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '90', '9WR947581X8183918', 229, '2018-02-14 05:36:40'),
(438, 'balaa', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '637020', '7418529635', 'balamurugan@pofitec.com', '228', 'ORDER1518595915228', 229, '2018-02-14 08:11:55'),
(439, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '229', 'ORDER1518687054229', 229, '2018-02-15 09:30:54'),
(440, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '230', 'ORDER1518873841230', 229, '2018-02-17 13:24:02'),
(441, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '232', 'ORDER1519387550232', 220, '2018-02-23 12:05:50'),
(442, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '233', 'ORDER1519387672233', 220, '2018-02-23 12:07:52'),
(443, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '91', '48X82225YX0460820', 220, '2018-02-23 12:20:50'),
(444, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '234', 'ORDER1519732831234', 220, '2018-02-27 12:00:32'),
(445, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '456345', '3456765434', 'venugopal@pofitec.com', '235', 'ORDER1519732929235', 220, '2018-02-27 12:02:09'),
(446, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '236', 'ORDER1519733205236', 220, '2018-02-27 12:06:45'),
(447, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '237', 'ORDER1519733350237', 220, '2018-02-27 12:09:10'),
(448, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '238', 'ORDER1519733461238', 220, '2018-02-27 12:11:01'),
(449, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '239', 'ORDER1519733550239', 220, '2018-02-27 12:12:30'),
(450, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '240', 'ORDER1519733610240', 220, '2018-02-27 12:13:30'),
(451, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '241', 'ORDER1519733796241', 220, '2018-02-27 12:16:36'),
(452, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '242', 'ORDER1519739165242', 229, '2018-02-27 13:46:05'),
(453, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '92', '96K86894UA423315R', 229, '2018-02-27 13:51:14'),
(454, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '243', 'ORDER1519739939243', 229, '2018-02-27 13:59:00'),
(455, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '244', 'ORDER1519740136244', 229, '2018-02-27 14:02:16'),
(456, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '7', '5992b77cced87dd7df08', 220, '2018-02-28 07:42:44'),
(457, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '9', '5992b77cced87dd7df08', 220, '2018-02-28 07:43:12'),
(458, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '11', 'b289180adcf4fc6fe85b', 220, '2018-02-28 08:55:22'),
(459, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '13', '8d1d632b64bd245bae80', 220, '2018-02-28 09:15:57'),
(460, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '15', '8d1d632b64bd245bae80', 220, '2018-02-28 09:20:56'),
(461, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '17', '8d1d632b64bd245bae80', 220, '2018-02-28 09:40:15'),
(462, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '19', '1d807a8896f3aa9d7ee3', 220, '2018-02-28 09:42:50'),
(463, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '20', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:02:49'),
(464, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '21', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:05:41'),
(465, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '22', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:05:56'),
(466, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '23', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:07:54'),
(467, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '24', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:08:42'),
(468, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '25', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:09:44'),
(469, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '26', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:10:21'),
(470, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '27', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:10:48'),
(471, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '28', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:11:04'),
(472, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '29', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:11:37'),
(473, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '30', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:11:57'),
(474, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '31', 'f714a5964e443a3dfa0b', 220, '2018-02-28 11:12:34'),
(475, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '32', 'b647bd8f4ecd2d139e02', 220, '2018-02-28 11:44:24'),
(476, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '33', '468544edd4b2daca74e7', 220, '2018-02-28 11:47:38'),
(477, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '34', '2458047c4f71f91ddaba', 220, '2018-02-28 12:51:39'),
(478, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '35', 'ce850aafa72be1761c1b', 229, '2018-03-01 05:33:43'),
(479, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '37', '247896d2542de383dadf', 220, '2018-03-01 05:39:31'),
(480, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '38', 'd9f2b5986a4bc93efed0', 229, '2018-03-01 10:15:22'),
(481, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '40', 'd0fb26af598f198b152f', 220, '2018-03-01 10:43:43'),
(482, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '41', '30fcb112016c45c1655e', 229, '2018-03-01 11:18:58'),
(483, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '42', '14e58b691d16f7daff58', 229, '2018-03-01 11:20:27'),
(484, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '43', '4cb87f43757948455676', 229, '2018-03-01 11:49:35'),
(485, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '44', '990aa13ad82aef28c774', 229, '2018-03-01 12:13:28'),
(486, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '45', '7b89f04b2169ab1fff80', 229, '2018-03-01 12:16:24'),
(487, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '46', '98e8d799fa60914e3828', 229, '2018-03-01 12:41:57'),
(488, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '47', '5bb15302256e2f6562ff', 229, '2018-03-01 12:49:45'),
(489, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '48', 'b9a23a0ba178c1b07987', 229, '2018-03-01 12:53:24'),
(490, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '49', 'e3f5db72fd0b9d5b816e', 229, '2018-03-01 13:24:40'),
(491, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '50', 'd11e6e7890108a03620e', 229, '2018-03-01 14:07:11'),
(492, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '51', 'b3c6520df608a957f861', 229, '2018-03-01 14:08:44'),
(493, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '52', '9f850433dfa62a117b8a', 229, '2018-03-01 14:11:24'),
(494, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '53', 'e543bc373d50c9cde89a', 229, '2018-03-01 14:13:00'),
(495, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '54', 'ba75ebec441f7b0883be', 229, '2018-03-02 05:14:59'),
(496, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '55', 'e8cfc26079c1738d0185', 229, '2018-03-02 05:16:26'),
(497, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '245', 'ORDER1519969592245', 229, '2018-03-02 05:46:32'),
(498, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '246', 'ORDER1519997476246', 229, '2018-03-02 13:31:16'),
(499, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '247', 'ORDER1519998023247', 229, '2018-03-02 13:40:23'),
(500, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '56', '39aa66cb2a27a859cee3', 220, '2018-03-03 05:49:49'),
(501, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '248', 'ORDER1520062842248', 229, '2018-03-03 07:40:42'),
(502, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '249', 'ORDER1520070131249', 229, '2018-03-03 09:42:12'),
(503, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '93', '9KK20004A38663738', 229, '2018-03-03 09:59:19'),
(504, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '250', 'ORDER1520224766250', 229, '2018-03-05 04:39:26'),
(505, 'bala', 'Hope', 'Peelamedu', 'peelamedu', 'tn', 'India', '641004', '7418529635  ', 'balamurugan@pofitec.com', '94', '3BD73522RR768160V', 229, '2018-03-05 05:01:57'),
(506, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '253', 'ORDER1520243378253', 220, '2018-03-05 09:49:40'),
(507, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '256', 'ORDER1520243882256', 220, '2018-03-05 09:58:03'),
(508, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '95', '25H29490D06450116', 220, '2018-03-05 10:06:09'),
(509, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '96', '25H29490D06450116', 220, '2018-03-05 10:16:37'),
(510, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '97', '25H29490D06450116', 220, '2018-03-05 10:17:27'),
(511, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '98', '4SF57985PY5129257', 220, '2018-03-05 10:39:39'),
(512, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '257', 'ORDER1520247893257', 220, '2018-03-05 11:04:53'),
(513, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '259', 'ORDER1520248162259', 220, '2018-03-05 11:09:23'),
(514, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '57', '492224a6b8f06f5bcd8a', 220, '2018-03-05 11:28:23'),
(515, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '58', '5b26b137398cd8a36d08', 220, '2018-03-05 13:20:38'),
(516, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '260', 'ORDER1520314223260', 220, '2018-03-06 05:30:23'),
(517, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '59', 'ded0e099e141c6435cce', 220, '2018-03-06 05:38:01'),
(518, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '60', '768f850ac09e95c79931', 220, '2018-03-06 06:04:38'),
(519, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '99', '9H698689J90770333', 220, '2018-03-06 06:49:33'),
(520, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '261', 'ORDER1520320113261', 220, '2018-03-06 07:08:33'),
(521, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '262', 'ORDER1520321127262', 201, '2018-03-06 07:25:27'),
(522, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '263', 'ORDER1520321271263', 201, '2018-03-06 07:27:51'),
(523, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '100', '0BS501589K263581G', 201, '2018-03-06 07:36:08'),
(524, 'suganya', 'dfd', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '264', 'ORDER1520321980264', 201, '2018-03-06 07:39:40'),
(525, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '61', '032dae8882af08e38223', 201, '2018-03-06 07:41:39'),
(526, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '101', 'ORDER1520331031DQbdxV', 201, '2018-03-06 10:10:31'),
(527, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '62', '860b89accc8111fa0e78', 201, '2018-03-06 10:26:03'),
(528, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '102', 'ORDER1520332996QqXFWJ', 201, '2018-03-06 10:43:16'),
(529, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '103', 'ORDER1520333447BvWWHH', 201, '2018-03-06 10:50:48'),
(530, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '63', '38101a8d35e913fad65c', 201, '2018-03-06 10:52:06'),
(531, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '265', 'ORDER1520338966265', 201, '2018-03-06 12:22:46'),
(532, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '266', 'ORDER1520407700266', 220, '2018-03-07 07:28:20'),
(533, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '267', 'ORDER1520414332267', 201, '2018-03-07 09:18:52'),
(534, 'suganya', 'cbe', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '268', 'ORDER1520414341268', 201, '2018-03-07 09:19:01'),
(535, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '269', 'ORDER1520415903269', 201, '2018-03-07 09:45:04'),
(536, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '270', 'ORDER1520416045270', 201, '2018-03-07 09:47:25'),
(537, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '271', 'ORDER1520416376271', 201, '2018-03-07 09:52:56'),
(538, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '104', '27N81055JP812383N', 201, '2018-03-07 09:57:33'),
(539, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '105', '27N81055JP812383N', 201, '2018-03-07 09:58:31'),
(540, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '106', '27N81055JP812383N', 201, '2018-03-07 10:00:07'),
(541, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '107', '27N81055JP812383N', 201, '2018-03-07 10:10:47'),
(542, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '64', '9c7ebdead03bad441c9a', 201, '2018-03-07 10:18:19'),
(543, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '272', 'ORDER1520419131272', 201, '2018-03-07 10:38:51'),
(544, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '273', 'ORDER1520419213273', 201, '2018-03-07 10:40:13'),
(545, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '274', 'ORDER1520429238274', 201, '2018-03-07 13:27:18'),
(546, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '108', '04717363YL186141H', 201, '2018-03-07 13:33:55'),
(547, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '65', '8d067a3d582d99e5815a', 201, '2018-03-07 13:35:12'),
(548, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '66', '01816edfee887864a8e1', 220, '2018-03-19 12:27:20'),
(549, 'venugopal', 'Address1', 'Address2', 'Lahore', 'CSA state', 'India', '12134', '3456765434', 'venugopal@pofitec.com', '67', '3bdda35af390801d3e61', 220, '2018-03-19 12:30:00'),
(550, 'suganya', 'gdgfdhghshhytuuytu', 'cbe', 'Lahore', 'tn', 'Italy', '123456', '8012122975', 'suganya.t@pofitec.com', '275', 'ORDER1521615451275', 201, '2018-03-21 06:57:31'),
(551, 'suganya', 'Ganapathy', 'Ganapathy', 'Coimbatore', 'Tamil nadu', 'India', '231234', '1234567890', 'suganya@pofitec.com', '276', 'ORDER1522223300276', 271, '2018-03-28 07:48:21'),
(552, 'suganya', 'test', 'test', 'Coimbatore', 'Tamil nadu', 'India', '123456', '1234567890', 'suganya@pofitec.com', '277', 'ORDER1522223506277', 271, '2018-03-28 07:51:46'),
(553, 'suganya', 'yu', 'yuy', 'Coimbatore', 'Tamil nadu', 'India', '123456', '1234567890', 'suganya@pofitec.com', '109', '42G05497AC5243125', 271, '2018-03-28 07:55:13'),
(554, 'suganya', 'Ganapathy', 'Ganapathy', 'Coimbatore', 'Tamil nadu', 'India', '123456', '1234567890', 'suganya@pofitec.com', '278', 'ORDER1522223827278', 271, '2018-03-28 07:57:07'),
(555, 'suganya', 'mettupalayam', 'mett', 'Coimbatore', 'Tamil Nadu', 'India', '344556', '1234567890', 'suganya@pofitec.com', '279', 'ORDER1522386021279', 271, '2018-03-30 05:00:21'),
(556, 'suganya', 'mettupalayam', 'met', 'Coimbatore', 'Tamil Nadu', 'India', '344556', '1234567890', 'suganya@pofitec.com', '280', 'ORDER1522386059280', 271, '2018-03-30 05:00:59'),
(557, 'suganya', 'mettupalayam', 'm', 'Coimbatore', 'Tamil Nadu', 'India', '344556', '1234567890', 'suganya@pofitec.com', '281', 'ORDER1522386088281', 271, '2018-03-30 05:01:28'),
(558, 'suganya', 'mettupalayam', 'mettupalayam', 'Coimbatore', 'Tamil nadu', 'India', '641001', '1234567890', 'suganya@pofitec.com', '282', 'ORDER1522408368282', 273, '2018-03-30 11:12:48'),
(559, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '110', '57100538AS681443G', 273, '2018-03-30 11:59:52'),
(560, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '68', '9', 220, '2018-04-03 06:05:28'),
(561, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '69', '9', 220, '2018-04-03 06:05:41'),
(562, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '70', '9', 220, '2018-04-03 06:07:58'),
(563, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '71', '9', 220, '2018-04-03 06:26:02'),
(564, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '72', '9', 220, '2018-04-03 06:26:44'),
(565, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '73', '9', 220, '2018-04-03 06:28:03'),
(566, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '74', '9', 220, '2018-04-03 06:37:00'),
(567, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '75', '9', 274, '2018-04-03 06:50:53'),
(568, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '76', '9', 274, '2018-04-03 10:19:40'),
(569, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '77', '9', 274, '2018-04-03 10:19:45'),
(570, 'Nazeer', 'Door no: 21D, Arputham Towers', 'ram nagar, Gandhipuram', 'Coimbatore', 'Tam', 'India', '641001', '9445847696', 'nazeer@pofitec.com', '283', 'ORDER1522751030283', 274, '2018-04-03 10:23:50'),
(571, 'Nazeer', 'Door no: 21D, Arputham Towers', 'ram nagar, Gandhipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@pofitec.com', '284', 'ORDER1522751089284', 274, '2018-04-03 10:24:49'),
(572, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@pofitec.com', '78', '9', 274, '2018-04-03 10:25:23');
INSERT INTO `nm_shipping` (`ship_id`, `ship_name`, `ship_address1`, `ship_address2`, `ship_ci_id`, `ship_state`, `ship_country`, `ship_postalcode`, `ship_phone`, `ship_email`, `ship_order_id`, `ship_trans_id`, `ship_cus_id`, `date_time`) VALUES
(573, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '79', '9', 274, '2018-04-03 10:39:25'),
(574, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '80', '9', 274, '2018-04-03 10:41:57'),
(575, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '285', 'ORDER1522829245285', 273, '2018-04-04 08:07:25'),
(576, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '111', '1CC39155GF708323D', 273, '2018-04-04 08:08:51'),
(577, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '81', '674aa8954f75c7b3820c', 273, '2018-04-04 08:10:39'),
(578, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '82', '8758a4ac5e1f0a78caf2', 273, '2018-04-04 08:11:30'),
(579, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '286', 'ORDER1522829531286', 273, '2018-04-04 08:12:11'),
(580, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '287', 'ORDER1522829552287', 273, '2018-04-04 08:12:32'),
(581, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '288', 'ORDER1522829576288', 273, '2018-04-04 08:12:57'),
(582, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '83', 'fa01bc4ab566d12fb042', 273, '2018-04-04 08:13:36'),
(583, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '84', 'd82143b64cecde86eaed', 273, '2018-04-04 08:14:19'),
(584, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '85', '1c40e9a62bd3a7848a08', 273, '2018-04-04 08:16:10'),
(585, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '289', 'ORDER1522829888289', 273, '2018-04-04 08:18:08'),
(586, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '112', '0R925448NP171471T', 273, '2018-04-04 08:21:03'),
(587, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '113', '5GY0810659571183G', 273, '2018-04-04 09:10:41'),
(588, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '114', '212651097D484344T', 273, '2018-04-04 09:11:36'),
(589, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '115', '8E0481204C534654D', 273, '2018-04-04 09:12:25'),
(590, 'Nagoor meeran', 'Karumbukadai', 'Aasath Nagar', 'Coimbatore', 'Tamil Nadu', 'India', '641008', '1591591599', 'nagoor@pofitec.com', '291', 'ORDER1522835714291', 275, '2018-04-04 09:55:14'),
(591, 'Nagoor meeran', 'Karumbukadai', 'Aasath Nagar', 'Coimbatore', 'Tamil Nadu', 'India', '641008', '1591591599', 'nagoor@pofitec.com', '116', '9SG73279LS412714C', 275, '2018-04-04 10:09:33'),
(592, 'Nagoor meeran', 'Karumbukadai', 'Aasath Nagar', 'Coimbatore', 'Tamil Nadu', 'India', '641008', '1591591599', 'nagoor@pofitec.com', '117', '6NP63254X6752245T', 275, '2018-04-04 10:15:31'),
(593, 'suganya', 'mettupalayam', 'mettupalayam', 'Delhi', 'Tamilnadu', 'India', '600042', '1234567890', 'suganya@pofitec.com', '86', '88777a965f275aeb04c4', 273, '2018-04-04 10:17:02'),
(594, 'Nagoor meeran', 'Karumbukadai', 'Aasath Nagar', 'Coimbatore', 'Tamil Nadu', 'India', '641008', '1591591599', 'nagoor@pofitec.com', '87', '32fd4333d3b361ea5f81', 275, '2018-04-04 10:19:23'),
(595, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '88', '9', 274, '2018-04-04 11:02:53'),
(596, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '89', '9', 274, '2018-04-04 12:04:59'),
(597, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '90', '9', 274, '2018-04-04 12:10:29'),
(598, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer1@gmail.com', '91', '9', 274, '2018-04-04 12:35:12'),
(599, 'nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '92', '9', 274, '2018-04-04 12:56:07'),
(600, 'Nazeer Hussain', 'Door no: 12B, Arputham Towers,', 'Ram nagar, Gandhipuram', 'Coimbatore', 'Tamil Naadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '93', '8633b64846fa189ed6f728d186adb8e86830c378388dc79a28', 274, '2018-04-05 05:57:16'),
(601, 'Nazeer Hussain', 'Door no: 12B, Arputham Towers,', 'Ram nagar, Gandhipuram', 'Coimbatore', 'Tamil Naadu', 'India', '641001', '9445847696', 'nazeer@gmail.com', '292', 'ORDER2tK6WqB1', 274, '2018-04-05 06:12:10'),
(602, 'Nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641008', '9445847696', 'nazeer@gmail.com', '293', 'ORDERpCiO0iTW', 274, '2018-04-05 06:15:03'),
(603, 'Nazeer', 'Arputham Towers', 'Gandipuram', 'Coimbatore', 'Tamil Nadu', 'India', '641008', '9445847696', 'nazeer@gmail.com', '294', 'ORDERcGihCtyn', 274, '2018-04-05 06:17:07'),
(604, 'rty', 'rty', 'rty', 'Delhi', 'rty', 'India', '6456', '56456', 'suganya@pofitec.com', '295', 'ORDER1522928943295', 285, '2018-04-05 11:49:03'),
(605, 'suganya', 'mettupalayam', 'm', 'Coimbatore', 'Tamil Nadu', 'India', '344556', '1234567890', 'suganya@pofitec.com', '118', '0H0264141T426192T', 273, '2018-04-06 07:24:06'),
(606, 'Nagoor meeran', 'Asad Nagar', 'Karumbukadai', 'Coimbatore', 'Tamil Nadu', 'India', '641008', '1591591599', 'nagoor@pofitec.com', '296', 'ORDER1523356835296', 275, '2018-04-10 10:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `nm_size`
--

CREATE TABLE `nm_size` (
  `si_id` smallint(5) UNSIGNED NOT NULL,
  `si_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_size`
--

INSERT INTO `nm_size` (`si_id`, `si_name`) VALUES
(4, '28'),
(5, '32'),
(7, '36'),
(8, '38'),
(9, '40'),
(11, '53'),
(12, '66'),
(13, '55'),
(14, 'no size'),
(15, '4'),
(16, '52'),
(17, '123456789012349'),
(18, '1'),
(19, '123456789012345'),
(20, '30'),
(21, 'Xl');

-- --------------------------------------------------------

--
-- Table structure for table `nm_smtp`
--

CREATE TABLE `nm_smtp` (
  `sm_id` tinyint(4) NOT NULL,
  `sm_host` varchar(150) NOT NULL,
  `sm_port` varchar(20) NOT NULL,
  `sm_uname` varchar(30) NOT NULL,
  `sm_pwd` varchar(30) NOT NULL,
  `sm_isactive` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_smtp`
--

INSERT INTO `nm_smtp` (`sm_id`, `sm_host`, `sm_port`, `sm_uname`, `sm_pwd`, `sm_isactive`) VALUES
(1, 'smtp.gmail.com', '587', 'kailashkumar.r@pofitec.com', '1234567890', 1),
(2, 'Send Grid', '149', 'send grid', 'sendgrid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nm_social_media`
--

CREATE TABLE `nm_social_media` (
  `sm_id` int(11) NOT NULL,
  `sm_fb_app_id` varchar(100) NOT NULL,
  `sm_fb_sec_key` varchar(100) NOT NULL,
  `sm_fb_page_url` varchar(250) NOT NULL,
  `sm_fb_like_page_url` varchar(250) NOT NULL,
  `sm_twitter_url` varchar(250) NOT NULL,
  `sm_twitter_app_id` varchar(250) NOT NULL,
  `sm_twitter_sec_key` varchar(250) NOT NULL,
  `sm_linkedin_url` varchar(250) NOT NULL,
  `sm_youtube_url` varchar(250) NOT NULL,
  `sm_gmap_app_key` varchar(250) NOT NULL,
  `sm_android_page_url` varchar(250) NOT NULL,
  `sm_iphone_url` varchar(250) NOT NULL,
  `sm_analytics_code` text NOT NULL,
  `sm_gl_client_id` varchar(250) NOT NULL,
  `sm_gl_sec_key` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_social_media`
--

INSERT INTO `nm_social_media` (`sm_id`, `sm_fb_app_id`, `sm_fb_sec_key`, `sm_fb_page_url`, `sm_fb_like_page_url`, `sm_twitter_url`, `sm_twitter_app_id`, `sm_twitter_sec_key`, `sm_linkedin_url`, `sm_youtube_url`, `sm_gmap_app_key`, `sm_android_page_url`, `sm_iphone_url`, `sm_analytics_code`, `sm_gl_client_id`, `sm_gl_sec_key`) VALUES
(1, '291704851317266', '77b180bfb7d32d0f9250d1436a381a1e', '', 'https://www.facebook.com', 'https://www.facebook.com', 'dsf1dsfsd232d1f21dsf21ds2f1dsf', 'sd2f1sd2f13sfgsd543df3ds1fds1f', 'https://www.facebook.com', 'https://www.facebook.com', 'AIzaSyCsDoY1OPjAqu1PlQhH3UljYsfw-81bLkI', '', '', '<script>\r\n  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');\r\n\r\n  ga(\'create\', \'UA-62671250-4\', \'auto\');\r\n  ga(\'send\', \'pageview\');\r\n</script>', '782885230420-rbpe9m9044krsto1dqchhr3p6am81ggh.apps.googleusercontent.com', 'O40k7cbT7lnLaESYQ0npsY5c');

-- --------------------------------------------------------

--
-- Table structure for table `nm_specification`
--

CREATE TABLE `nm_specification` (
  `sp_id` smallint(5) UNSIGNED NOT NULL,
  `sp_name` text NOT NULL,
  `sp_name_fr` text NOT NULL,
  `sp_spg_id` smallint(5) UNSIGNED NOT NULL,
  `sp_order` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_specification`
--

INSERT INTO `nm_specification` (`sp_id`, `sp_name`, `sp_name_fr`, `sp_spg_id`, `sp_order`) VALUES
(15, 'In the Box', ' En el cuadro', 10, 5),
(16, 'Model Number', ' Número de modelo', 10, 2),
(17, 'Model Name', ' Nombre del modelo', 10, 3),
(18, 'Color', 'Color', 10, 4),
(19, 'Display Size', '', 11, 1),
(20, 'Resolution', '', 11, 2),
(21, 'Resolution Type', '', 11, 3),
(22, 'Operating System', '', 12, 1),
(24, 'Processor Core', '', 12, 3),
(26, 'Resolution Type', '', 10, 1),
(29, 'Lether', '', 13, 3),
(30, 'Glass', '', 11, 43),
(31, 'glass type', '', 10, 44),
(32, 'Gorilla', '', 16, 11),
(33, 'xx', '', 14, 44),
(34, 'Casual Shirts', '', 10, 3),
(35, 'Short Shirts', '', 10, 4),
(36, 'Nightshirt ', '', 10, 6),
(37, 'Poet shirt ', '', 10, 7),
(38, 'White shirt', '', 10, 7),
(39, 'Halfshirt', '', 10, 7),
(40, 'Camp shirt ', '', 10, 1),
(41, 'Rugby shirt', '', 10, 1),
(42, 'Ballet shoe', '', 13, 3),
(43, 'Boat shoe', '', 13, 3),
(44, 'Derby shoe', '', 13, 4),
(45, 'High-heeled footwear', '', 13, 3),
(46, 'Elevator shoes', '', 13, 3),
(47, 'Rocker bottom shoe', '', 13, 3),
(48, 'Snow boot', '', 13, 3),
(49, 'Steel-toe boot', '', 13, 3),
(50, 'Hooded towel', '', 18, 8),
(51, 'Baby shampoo', '', 18, 8),
(52, 'Safety nail scissors', '', 18, 8),
(53, 'Bottle/nipple brush', '', 18, 8),
(54, 'Stroller', '', 18, 8),
(56, 'Brase Styles', '', 20, 44),
(57, 'touch', '', 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nm_spgroup`
--

CREATE TABLE `nm_spgroup` (
  `spg_id` smallint(5) UNSIGNED NOT NULL,
  `spg_name` varchar(150) NOT NULL,
  `spg_name_fr` varchar(500) NOT NULL,
  `spg_order` smallint(6) NOT NULL,
  `sp_mc_id` int(11) NOT NULL,
  `sp_smc_id` int(11) NOT NULL,
  `show_on_filter` enum('0','1') NOT NULL COMMENT '0:No;1:yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_spgroup`
--

INSERT INTO `nm_spgroup` (`spg_id`, `spg_name`, `spg_name_fr`, `spg_order`, `sp_mc_id`, `sp_smc_id`, `show_on_filter`) VALUES
(10, 'Generall', ' General', 1, 2, 2, '1'),
(11, 'Display Features', 'Características de la pantalla', 2, 6, 48, '1'),
(12, 'Os & Processor Features', ' Funciones del procesador y del procesador', 3, 6, 16, '1'),
(13, 'types', '', 4, 2, 10, '1'),
(14, 'General o', '', 6, 3, 4, '0'),
(15, 'Screen', '', 33, 6, 48, '0'),
(16, 'General glass', '', 22, 6, 48, '0'),
(18, 'New Borns ', '', 7, 4, 6, '1'),
(20, 'Trendings', '', 67, 3, 47, '1');

-- --------------------------------------------------------

--
-- Table structure for table `nm_store`
--

CREATE TABLE `nm_store` (
  `stor_id` int(10) UNSIGNED NOT NULL,
  `stor_merchant_id` int(10) NOT NULL,
  `stor_name` varchar(100) NOT NULL,
  `stor_name_fr` varchar(100) NOT NULL,
  `stor_phone` varchar(20) NOT NULL,
  `stor_address1` varchar(150) NOT NULL,
  `stor_address1_fr` varchar(200) NOT NULL,
  `stor_address2` varchar(150) NOT NULL,
  `stor_address2_fr` varchar(200) NOT NULL,
  `stor_country` smallint(5) UNSIGNED NOT NULL,
  `stor_city` int(10) UNSIGNED NOT NULL,
  `stor_zipcode` varchar(20) NOT NULL,
  `stor_metakeywords` text NOT NULL,
  `stor_metakeywords_fr` text NOT NULL,
  `stor_metadesc` text NOT NULL,
  `stor_metadesc_fr` text NOT NULL,
  `stor_website` text NOT NULL,
  `stor_latitude` decimal(18,14) NOT NULL,
  `stor_longitude` decimal(18,14) NOT NULL,
  `stor_img` varchar(200) NOT NULL,
  `stor_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=>unblock,0=>block',
  `created_date` varchar(20) NOT NULL,
  `stor_addedby` int(5) NOT NULL DEFAULT '1' COMMENT '1-admin,2 -merchant',
  `store_city_status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_store`
--

INSERT INTO `nm_store` (`stor_id`, `stor_merchant_id`, `stor_name`, `stor_name_fr`, `stor_phone`, `stor_address1`, `stor_address1_fr`, `stor_address2`, `stor_address2_fr`, `stor_country`, `stor_city`, `stor_zipcode`, `stor_metakeywords`, `stor_metakeywords_fr`, `stor_metadesc`, `stor_metadesc_fr`, `stor_website`, `stor_latitude`, `stor_longitude`, `stor_img`, `stor_status`, `created_date`, `stor_addedby`, `store_city_status`) VALUES
(57, 41, 'Fun store', 'magasin de produits', '8883857744', 'test,coimbatore', 'tester', 'test,mettuplayam', 'tester2', 1, 1, '641004', 'test', 'test2', 'test', 'test2', '', '11.02098300000000', '76.96633440000005', 'Deal_151013473120826.png', 0, '', 1, 'B'),
(59, 58, 'Store', ' le magasinaa', '88833377335645645', 'Ram Nagar', 'Ram Nagaraa', 'Coimbatore', 'Coimbatoreaa', 1, 1, '1234567890123456', 'Meta Keyword', 'Meta Keywordaa', 'Meta Description', 'Meta Descriptionaa', 'http://pofitec.com', '11.01684450000000', '76.95583209999995', 'Deal_151065251918518.png', 1, '09/29/2017', 1, 'A'),
(61, 41, 'Product store', 'Soies de Chennaiss', '8883857744', 'Gandhipuram', 'Gandhipuramss', 'Address', 'Adressess', 1, 2, '7654367', 'Keywords', 'Mots clésss', 'description', 'la descriptionss', '', '13.08268020000000', '80.27071840000008', 'Store_1513684245.jpg', 0, '', 2, 'A'),
(62, 59, 'Ganapathy skills', 'Habilidades de Ganapatia', '8883857743', 'Gandhipuram', 'Gandhipuram', 'Coimbatore', 'Coimbatore', 1, 4, '641006', 'Keywords', 'Palabras claves', 'description', 'descripción', 'http://pofitec.com', '11.01680000000000', '76.95580000000000', 'Deal_151013461130690.png', 0, '10/04/2017', 1, 'A'),
(63, 60, 'RG', 'RG', '9944349002', 'Coimbatore', 'Coimbatore', 'Coimbatore', 'Coimbatore', 1, 1, '641104', 'dfdsfg', 'Coimbatore', 'sfdgdsfgdsfg', 'Coimbatore', 'laraveleommerce.com', '11.01684450000000', '76.95583209999995', 'Deal_15106456068257.png', 1, '11/09/2017', 1, 'A'),
(65, 62, 'cvb store', '', '453456', 'gfhgf', '', 'gh', '', 1, 1, '64645', 'gfh', '', 'gfhgfh', '', 'http://192.168.0.6/Socialecommerce/blog_view/1', '38.29491000000000', '-78.33370489999999', 'Store_1513836812.jpg', 1, '12/12/2017', 1, 'A'),
(66, 63, 'rr', '', '4534533453', 'fg', '', 'dfgdfg', '', 1, 1, '5345345', 'gdfg', '', 'dfgdfg', '', 'http://192.168.0.6/Socialecommerce/blog_view/1', '10.32359080000000', '76.95100300000001', 'Deal_151360408320191.png', 0, '12/18/2017', 1, 'B'),
(67, 41, 'store3', '', '5454545454', 'sdfs', '', 'sdfdf', '', 1, 1, '654543', '', '', 'sdfd', '', 'http://192.168.0.6/Socialecommerce/blog_view/1', '10.91322060000000', '77.03690200000005', 'Store_1513608051.jpg', 1, '', 1, 'A'),
(68, 63, 'yuyu', '', '1234567895', 'yuy', '', 'yuyu', '', 1, 1, '123456', 'yuy', '', 'uy', '', 'https://www.google.com', '11.01684450000000', '76.95583209999995', 'Store_1513836591.png', 1, '', 1, 'A'),
(69, 64, 'hjhj', '', '18985656565', 'trtr', '', 'rtrtr', '', 1, 1, '213456', 'rtr', '', 'rtr', '', 'https://www.google.com', '11.01684450000000', '76.95583209999995', 'Store_1513836679.jpg', 1, '12/21/2017', 1, 'A'),
(70, 64, 'zzzzzzzzzzzzzz', '', '08012122975', 'fgf', '', 'ghgh', '', 1, 5, '123456', 'ty', '', 'tyt', '', 'https://www.google.com', '11.01684450000000', '76.95583209999995', 'Store_1513836755.png', 0, '', 1, 'A'),
(71, 65, 'ghg', '', '454545455454', 'ttt', '', 'tyt', '', 15, 13, '123456', 'yuyuy', '', 'yyuy', '', 'https://www.google.com', '13.08268020000000', '80.27071840000008', 'Store_1513837031.png', 0, '12/21/2017', 1, 'A'),
(72, 66, 'FINAL', '', '45445454554', 'rtr', '', 'rtr', '', 1, 4, '123456', 'hjhh', '', 'hjh', '', 'https://www.google.com', '13.08268020000000', '80.27071840000008', 'Store_1513837187.jpg', 0, '12/21/2017', 1, 'A'),
(73, 67, 'big show', '', '09632587410', 'hj', '', 'nm n', '', 1, 1, '641010', 'fsdf', '', 'afsfs', '', 'https://www.google.co.in', '11.01040330000000', '76.94990280000002', 'Store_1513858694.png', 1, '12/21/2017', 1, 'A'),
(74, 67, 'edge', '', '09632587410', 'hj', '', 'nm n', '', 15, 13, '641010', 'assa ', '', 'zxz', '', 'https://www.google.co.in', '11.01235010000000', '76.96286580000003', 'Store_1513858640.png', 1, '', 1, 'A'),
(75, 68, 'ragul gandhi', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', '', 'https://www.google.com', '11.01680000000000', '76.95580000000000', '', 1, '01/05/2018', 1, 'A'),
(76, 69, ' d dfg lkdfgdlgjdflgfdgkdfg;ldfkgdfdf;lgkdf;lkgdfl;gp435 43853-5=2 ***^*^(_(_^&% $^%$$##$%&*&& flskd', '', '3242343243243243', ' d dfg lkdfgdlgjdflgfdgkdfg;ldfkgdfdf;lgkdf;lkgdfl;gp435 43853-5=2 ***^*^(_(_^&% $^%$$##$%&*&& flskdjfkldsfldsjfldsf jdslf sdfds fdsf jdlfjdsl fsd s ', '', ' d dfg lkdfgdlgjdflgfdgkdfg;ldfkgdfdf;lgkdf;lkgdfl;gp435 43853-5=2 ***^*^(_(_^&% $^%$$##$%&*&& flskdjfkldsfldsjfldsf jdslf sdfds fdsf jdlfjdsl fsd s ', '', 1, 14, '321231', ' d dfg lkdfgdlgjdflgfdgkdfg;ldfkgdfdf;lgkdf;lkgdfl;gp435 43853-5=2 ***^*^(_(_^&% $^%$$##$%&*&& flskdjfkldsfldsjfldsf jdslf sdfds fdsf jdlfjdsl fsd s ', '', ' d dfg lkdfgdlgjdflgfdgkdfg;ldfkgdfdf;lgkdf;lkgdfl;gp435 43853-5=2 ***^*^(_(_^&% $^%$$##$%&*&& flskdjfkldsfldsjfldsf jdslf sdfds fdsf jdlfjdsl fsd s  d dfg lkdfgdlgjdflgfdgkdfg;ldfkgdfdf;lgkdf;lkgdfl;gp435 43853-5=2 ***^*^(_(_^&% $^%$$##$%&*&& flskdjfkldsfldsjfldsf jdslf sdfds fdsf jdlfjdsl fsd s ', '', 'http://google.com', '20.59368400000000', '78.96288000000004', 'Store_1515241639.png', 1, '01/06/2018', 1, 'A'),
(77, 70, 'test store', '', '09876543210', 'test ship addr1', '', 'test ship addr2', '', 1, 15, '132456', 'dfgdf', '', 'gdgfdf', '', 'http://google.com', '7.95462956363331', '80.65544599609370', 'Deal_151524737810313.png', 1, '01/06/2018', 1, 'B'),
(78, 70, 'test storetest storetest storetest storetest storetest storetest storetest storetest storetest store', '', '09876543210', 'test ship addr1', '', 'test ship addr2', '', 1, 14, '132456', 'test storetest storetest store', '', 'test storetest storetest storetest storetest storetest store', '', 'http://google.com', '8.07021974820911', '80.89027875976558', 'Store_1515246297.png', 1, '', 1, 'A'),
(79, 71, 'cvb', '', '23456789', 'nmbnm', '', 'bnm', '', 1, 1, '567898', 'ghf', '', 'fgh', '', 'http://www.google.com', '11.01684450000000', '76.95583209999995', 'Store_1515389351.png', 1, '01/08/2018', 1, 'A'),
(80, 72, 'venugds', '', '03456765434', 'jhkjhkk', '', 'jhkj', '', 1, 1, '645678', 'keywordskeywordskeywordskeywords', '', 'descriptiondescriptiondescriptiondescription', '', 'http://www.google.com', '11.01684450000000', '76.95583209999995', 'Store_1515389654.png', 1, '01/08/2018', 1, 'A'),
(81, 73, 'venug', '', '03456765434', 'jhkjhkk', '', 'jhkj', '', 1, 1, '645678', '', '', '', '', 'http://www.google.com', '12.98545420000000', '77.66392480000002', 'Store_1515393786.png', 1, '01/08/2018', 1, 'A'),
(82, 74, 'bcvb', '', '6456456456456456', 'gdfg', '', 'fgdf', '', 1, 1, '123456789012', 'fg', '', 'dfg', '', 'http://www.google.com', '23.68499400000000', '90.35633099999995', 'Store_1515409339.png', 1, '01/08/2018', 1, 'A'),
(83, 75, 'venugddfgdfgdfgdfgghjghjghj_____', '', '0345676543456786', 'jhkjhkk', '', 'jhkjghjghjghj', '', 1, 14, '7778678768768', '', '', '', '', 'http://www.google.com', '11.01684450000000', '76.95583209999995', 'Store_1515409535.png', 1, '01/08/2018', 1, 'A'),
(84, 75, 'sfsdfsdff_-------', '', '1312323123123123', '23sdfsdfsdfsddsfsdf', '', 'sdfsdfsdfsdfsdf', '', 1, 1, '453453453453', '', '', '', '', 'http://www.google.com', '13.08268020000000', '80.27071840000008', 'Store_1515410002.png', 1, '', 1, 'A'),
(85, 75, 'venugd', '', '03456765434', 'jhkjhkk', '', 'jhkj', '', 1, 1, '645678877', '', '', '', '', 'http://www.google.com', '8.19956380000000', '80.63269160000004', 'Store_1515410992.png', 1, '', 1, 'A'),
(86, 75, 'ertet__', '', '5675675675675675', 'ytu', '', 'tyutyu', '', 1, 1, '6456456', 'dfgfdg', '', 'dfgdfgdfgdf', '', 'http://www.google.com', '11.01684450000000', '76.95583209999995', 'Store_1515412745.png', 1, '', 1, 'A'),
(87, 75, 'venugd', '', '03456765434', 'jhkjhkk', '', 'jhkj', '', 1, 1, '6756756756', '', '', '', '', 'http://www.google.com', '56.13036600000000', '-106.34677099999999', 'Store_1515412878.png', 1, '', 1, 'A'),
(88, 75, 'rtytry', '', '03456765434', 'jhkjhkk', '', 'jhkj', '', 1, 14, '645678877', '', '', '', '', 'http://www.google.com', '23.68499400000000', '90.35633099999995', 'Store_1515414284.png', 1, '', 1, 'A'),
(89, 58, 'ttytrytry_---', '', '6757567', 'gfhh', '', 'ytrytr', '', 1, 14, '5564645664564564', 'yuiuiyuiyuiyui', '', 'uiyui', '', 'http://www.google.com', '13.08268020000000', '80.27071840000008', 'Store_1515417320_455x378.png', 1, '', 2, 'A'),
(90, 76, 'zxcvzxcv', '', '45454', 'cxvzxcv', '', 'zxcvzxcv', '', 1, 1, '53565', 'xcvzxc', '', 'zxcvzxc', '', 'http://192.168.0.24/laravelecommerce_with_lang/add_merchant', '56.13036600000000', '-106.34677099999999', 'Store_1515495765.jpg', 1, '01/09/2018', 1, 'A'),
(91, 77, 'a-1 chips', '', '09874569856', 'gandhipurams', '', 'Bus stand', '', 1, 1, '640122', 'Chips companys', '', 'We are having more Chips items', '', 'https://www.a1chips.com', '11.22003200000000', '78.16813800000000', 'Store_1515499728.jpg', 1, '01/09/2018', 1, 'A'),
(92, 78, 'Walmarts', '', '09874569856', 'gandhipuram', '', 'back side,Bus stand', '', 1, 17, '640122', '', '', 'born a fashion', '', 'https://www.google.co.in', '10.79048330000000', '78.70467250000002', 'Store_1515501547.jpg', 1, '01/09/2018', 1, 'A'),
(93, 78, 'puma store', '', '98658654578', 'hopes college', '', 'covai', '', 1, 1, '637020', 'shoe', '', 'Quality', '', 'https://www.google.co.in', '1.35208300000000', '103.81983600000001', 'Store_1515502955.jpg', 1, '', 1, 'A'),
(94, 79, 'Nike', '', '09874569856', 'gandhipuram', '', 'Bus stand', '', 1, 1, '640122', 'test', '', 'test', '', 'https://www.google.co.in', '18.33576499999999', '-64.89633500000002', 'Store_1515503848.jpg', 1, '01/09/2018', 1, 'A'),
(95, 80, 'puma', '', '09874569856', 'gandhipuram', '', 'Bus stand', '', 1, 1, '640122', 'test', '', 'test', '', 'https://www.google.co.in', '8.22288100000000', '81.40385770000000', 'Store_1515505475.jpg', 1, '01/09/2018', 1, 'A'),
(96, 81, 'gfsdg', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'dsfdsf', '', 'dasfdasf', '', 'https://www.google.co.in/?gfe_rd=cr&dcr=0&ei=fdhZWrTdFIWRvASQ2r7YCA', '11.01684450000000', '76.95583209999995', 'Store_1515837751.jpg', 1, '01/13/2018', 1, 'A'),
(97, 82, 'dsfgdfg', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'dsfdasf', '', 'asdfdasf', '', 'https://www.google.co.in/search?q=images&dcr=0&biw=1366&bih=662&tbm=isch&source=lnt&tbs=isz:ex,iszw:455,iszh:378#imgrc=6F8A78tDxV_nrM:', '11.01684450000000', '76.95583209999995', 'Store_1515838886.jpg', 1, '01/13/2018', 1, 'A'),
(98, 83, 'dsfgdfg', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 15, '4641104', 'asdasd', '', 'asdasd', '', 'https://www.google.co.in/search?q=images&dcr=0&biw=1366&bih=662&tbm=isch&source=lnt&tbs=isz:ex,iszw:455,iszh:378#imgrc=6F8A78tDxV_nrM:', '11.01684450000000', '76.95583209999995', 'Store_1515839052.jpg', 1, '01/13/2018', 1, 'A'),
(99, 84, 'ragul gandhi', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'dsfgdsfg', '', 'dfgdfg', '', 'https://www.google.co.in/search?q=images&dcr=0&biw=1366&bih=662&tbm=isch&source=lnt&tbs=isz:ex,iszw:455,iszh:378#imgrc=6F8A78tDxV_nrM:', '11.01684450000000', '76.95583209999995', 'Store_1515839908.jpg', 1, '01/13/2018', 1, 'A'),
(100, 85, 'ragul gandhi', '', '09994446464', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'dfgdsfg', '', 'dsgdsg', '', 'https://www.google.co.in/search?q=images&dcr=0&biw=1366&bih=662&tbm=isch&source=lnt&tbs=isz:ex,iszw:455,iszh:378#imgrc=6F8A78tDxV_nrM:', '11.01684450000000', '76.95583209999995', 'Store_1515840018.jpg', 1, '01/13/2018', 1, 'A'),
(101, 86, 'ragul gandhi', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'dsfdasf', '', 'sdfdasf', '', 'https://www.google.co.in/search?q=images&dcr=0&biw=1366&bih=662&tbm=isch&source=lnt&tbs=isz:ex,iszw:455,iszh:378#imgrc=6F8A78tDxV_nrM:', '11.01684450000000', '76.95583209999995', 'Store_1515840868.jpg', 1, '01/13/2018', 1, 'A'),
(102, 87, 'dfdasf', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'jhgfhj', '', 'fgjhfg', '', 'https://www.google.co.in/search?q=images&dcr=0&biw=1366&bih=662&tbm=isch&source=lnt&tbs=isz:ex,iszw:455,iszh:378#imgrc=6F8A78tDxV_nrM:', '11.01684450000000', '76.95583209999995', 'Store_1515841130.jpg', 1, '01/13/2018', 1, 'A'),
(103, 88, 'ragul gandhi', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'asdasd', '', 'asdasd', '', 'https://www.google.co.in/search?q=images&dcr=0&biw=1366&bih=662&tbm=isch&source=lnt&tbs=isz:ex,iszw:455,iszh:378#imgrc=6F8A78tDxV_nrM:', '11.01684450000000', '76.95583209999995', 'Store_1515843315.jpg', 1, '01/13/2018', 1, 'A'),
(104, 89, 'werdaesf', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'dsfdsf', '', 'sdfdsf', '', 'https://www.google.co.in/search?q=images&dcr=0&biw=1366&bih=662&tbm=isch&source=lnt&tbs=isz:ex,iszw:455,iszh:378#imgrc=6F8A78tDxV_nrM:', '11.01684450000000', '76.95583209999995', 'Store_1515843889.jpg', 1, '01/13/2018', 1, 'A'),
(105, 90, 'Smart stores', '', '09874569856', 'vatican city', '', 'Bus stand', '', 14, 12, '640122', 'test', '', 'test', '', 'https://www.google.co.in', '45.34406227982666', '16.21483309179689', 'Store_1516865349.jpg', 1, '01/25/2018', 1, 'A'),
(106, 89, 'Branch1', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'asdfdasf', '', 'dasfdasf', '', 'https://www.lipsum.com/', '11.02098300000000', '76.96633440000005', 'Store_1516970198.png', 1, '', 1, 'A'),
(107, 89, 'tttttt', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'sdfdsa', '', 'dsfdsf', '', 'https://www.lipsum.com/', '11.28908730000000', '76.94096860000002', 'Store_1516970397.png', 1, '', 1, 'A'),
(108, 89, 'dsafdf', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 1, '642356', 'dsfdasf', '', 'sdfdsf', '', 'https://www.lipsum.com/', '11.24319440000000', '76.96135819999995', 'Store_1516970513.png', 1, '', 1, 'A'),
(109, 89, 'adsfdasf', '', '09944349002', 'coimbatore', '', 'coimbatore', '', 1, 19, '642356', 'sadasd', '', 'asdfdasf', '', 'https://www.lipsum.com/', '13.08268020000000', '80.27071840000008', 'Store_1516970645.png', 1, '', 1, 'A'),
(110, 91, 'testss', '', '07418529635', 'ram nagar', '', 'Peelamedu', '', 1, 1, '634601', '', '', '', '', 'https://www.google.com', '9.92520070000000', '78.11977539999998', 'Store_1517903925.jpg', 1, '02/06/2018', 1, 'A'),
(111, 90, 'Vatican store', '', '9865865421', 'hopes', '', 'peelamedu', '', 1, 1, '637020', '', '', '', '', 'https://www.google.com', '13.08268020000000', '80.27071840000008', 'Store_1517917856_sss.jpg', 1, '', 2, 'A'),
(112, 92, 'rrrrrrrrrrr', '', '45364545', 'dsafdfa', '', 'sdfadf', '', 1, 1, '5464745', 'dsfa', '', 'sdfa', '', 'https://www.google.co.in', '13.08268020000000', '80.27071840000008', 'Store_1517995432_app.jpg', 1, '02/07/2018', 1, 'A'),
(113, 91, 'Fun mall', '', '56748785685689', 'dfgfh', '', 'gfhfgh', '', 7, 24, '454356', 'fdhsh', '', 'dgfgsh', '', 'http://www.google.com', '7.98591014355452', '80.73921674804683', '', 1, '02/13/2018', 1, 'A'),
(114, 92, 'dfsdfa', '', '65745674576', 'fdffsdfa', '', 'sdfad', '', 1, 1, '4565435', '', '', '', '', 'https://www.google.co.in', '35.86166000000001', '104.19539699999996', 'Store_1518690334.jpg', 1, '02/15/2018', 1, 'A'),
(115, 92, 'sdfas', '', '4532435', 'sdfa', '', 'sdaf', '', 1, 1, '354465', 'sdf', '', 'af', '', 'https://www.google.co.in', '7.85954140000000', '80.63400939999997', 'Store_1518760176.jpg', 0, '', 1, 'B'),
(116, 93, 'dsfa', '', '45324531534', 'sdfsadf', '', 'sdfas', '', 7, 24, '45353', 'sdf', '', 'sdfa', '', 'https://www.google.co.in', '7.98591014355452', '80.73921674804683', 'Store_1519735349_ca.jpg', 1, '02/27/2018', 1, 'A'),
(117, 94, 'dsaf', '', '09874569856', 'gandhipuram', '', 'Bus stand', '', 1, 3, '640122', '', '', '', '', 'https://www.google.co.in', '6.92707860000000', '79.86124300000006', 'Store_1519736741.jpg', 1, '02/27/2018', 1, 'A'),
(118, 93, 'Cadman House', '', '46', 'Deleniti in earum veritatis delectus omnis repudiandae expedita beatae et ut aut', '', 'Ex beatae ipsa inventore culpa reprehenderit voluptatem magna do fugit eveniet corrupti eveniet blanditiis sit qui', '', 1, 1, '40462', 'Quod incididunt assumenda et ullamco deleniti distinctio Saepe', '', 'Alias sapiente est laudantium aute', '', 'http://www.kuk.org.uk', '7.98591014355452', '80.73921674804683', '', 1, '03/01/2018', 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `nm_subcategory`
--

CREATE TABLE `nm_subcategory` (
  `sb_id` smallint(5) UNSIGNED NOT NULL,
  `sb_name` varchar(100) NOT NULL,
  `sb_name_fr` varchar(100) NOT NULL,
  `sc_img` varchar(250) NOT NULL,
  `sb_smc_id` smallint(5) UNSIGNED NOT NULL,
  `mc_id` smallint(5) UNSIGNED NOT NULL,
  `sb_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_subcategory`
--

INSERT INTO `nm_subcategory` (`sb_id`, `sb_name`, `sb_name_fr`, `sc_img`, `sb_smc_id`, `mc_id`, `sb_status`) VALUES
(3, 'T-Shirtt', 'T-Chemise', 'Sub_category_15106434443044.jpg', 2, 2, 0),
(4, 'Formal Shirts', 'Chemises officielles', 'Sub_category_1513604271_200-200.png', 2, 2, 1),
(5, 'Saree\'s', 'Sarees', 'test.jpg', 4, 3, 1),
(6, 'Kurtas', 'Kurtas', 'test.jpg', 4, 3, 1),
(7, 'Diapers', ' Couches', 'test.jpg', 6, 4, 1),
(8, 'Wipes', ' Lingettes', 'test.jpg', 6, 4, 1),
(9, 'jeans', 'jeans', 'test.jpg', 2, 2, 1),
(10, 'Tops', 'Tops', 'test.jpg', 7, 3, 1),
(13, 'Kids and Baby Footwear', 'Chaussures pour enfants et bébés', 'test.jpg', 6, 4, 1),
(15, 'Casual', 'Décontractée', 'test.jpg', 10, 2, 1),
(17, 'Casual Watches', 'Montres décontractées', 'test.jpg', 11, 2, 1),
(18, 'Tops', 'Tops', 'test.jpg', 6, 4, 1),
(19, 'Shrug', 'Hausser les épaules', 'test.jpg', 7, 3, 1),
(20, 'Kids Clothing', 'Vêtements pour enfants', 'test.jpg', 12, 4, 1),
(21, 'Jeans', 'Jeans', 'test.jpg', 7, 3, 0),
(22, 'Skin Care', 'Soin de la peau', 'test.jpg', 6, 4, 1),
(23, 'Wooden Furniture', ' Meubles en bois', 'test.jpg', 14, 5, 1),
(24, 'Laptops', 'Ordinateurs portables', 'test.jpg', 16, 6, 1),
(25, 'Desktops', 'Ordinateurs de bureau', 'test.jpg', 16, 6, 1),
(26, 'Full Kit', 'Kit complet', 'test.jpg', 17, 7, 1),
(27, 'Separate Equipments', 'Équipements séparés', 'test.jpg', 17, 7, 1),
(28, 'Basic Cars', ' Voitures de base', 'test.jpg', 18, 8, 1),
(29, 'Sports Car', ' Voiture de sport', 'test.jpg', 18, 8, 1),
(30, 'Luxury Car', 'Voiture de luxe', 'test.jpg', 18, 8, 1),
(31, 'Historical', 'Historique', 'test.jpg', 20, 9, 1),
(32, 'Thriller', 'Thriller', 'test.jpg', 20, 9, 1),
(33, 'Comic', 'Bande dessinée', 'test.jpg', 20, 9, 1),
(34, 'Basic Bikes', ' Vélos de base', 'test.jpg', 19, 8, 1),
(35, 'Sports Bikes', 'Vélos sportifs', 'test.jpg', 19, 8, 1),
(36, 'Luxury Bikes', 'Vélos de luxe', 'test.jpg', 19, 8, 1),
(37, 'Digital ', 'Numérique', 'test.jpg', 24, 6, 1),
(38, 'DSLR', 'DSLR', 'test.jpg', 24, 6, 1),
(76, 'Motolora', 'Motolora', 'test.jpg', 48, 6, 1),
(77, 'Sarees', 'Sarees', 'sareeWF8I8WW7.jpg', 2, 2, 1),
(78, 'dsfds', '', 'Sup_category_1515130076_T144693858.jpg', 53, 12, 1),
(79, 'test Sub cat', '', 'Sup_category_1515130219_T144693858.jpg', 49, 15, 1),
(80, 'test Sub cat', '', 'Sup_category_1515130229_T144693858.jpg', 49, 15, 1),
(81, 'Cloth', '', 'Sup_category_1516194439_200-200.png', 2, 2, 1),
(82, 'k', '', 'Sup_category_1516198287_200-200.png', 2, 2, 1),
(83, 'T-Shirtd', '', 'Sup_category_1516198411_200-200.png', 2, 2, 1),
(84, 'Tops', '', 'Sup_category_1517811492_200x 200.jpg', 4, 3, 1),
(85, 'Spray', '', 'Sup_category_1517816998_agri.jpg', 62, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nm_subscription`
--

CREATE TABLE `nm_subscription` (
  `sub_id` int(10) UNSIGNED NOT NULL,
  `sub_cus_id` int(10) UNSIGNED NOT NULL COMMENT 'customer id',
  `sub_mc_id` smallint(5) UNSIGNED NOT NULL,
  `sub_status` tinyint(4) NOT NULL,
  `sub_readstatus` int(11) NOT NULL DEFAULT '0' COMMENT '-not read 1 read'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nm_terms`
--

CREATE TABLE `nm_terms` (
  `tr_id` int(11) NOT NULL,
  `tr_description` text NOT NULL,
  `tr_description_fr` longtext NOT NULL,
  `tr_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_terms`
--

INSERT INTO `nm_terms` (`tr_id`, `tr_description`, `tr_description_fr`, `tr_date`) VALUES
(1, '<b>Introduction</b><br>These terms and conditions govern your use of <a href=\"http://http://www.rapamber.com/\" target=\"\" rel=\"\">http://www.rapamber.com/</a>; by using this website, you accept these terms and conditions in full. If you disagree with these terms and conditions or any part of these terms and conditions, you must not use this website.<br>You must be at least 18 years of age to use this website. By using this website and by agreeing to these terms and conditions you warrant and represent that you are at least 18 years of age.<br>This website uses cookies. By using this website and agreeing to these terms and conditions, you consent to use of cookies in accordance with the terms of <a href=\"http://www.laravelecommerce.com\" target=\"\" rel=\"\">www.laravelecommerce.com</a><br>\r\n             <b>LICENSE TO USE WEBSITE</b><br>Unless otherwise stated, Laravel Ecommerce and/or its licensors own the intellectual property rights in the website and material on the website. Subject to the license below, all these intellectual property rights are reserved.<br>You may view, download for caching purposes only, and print pages [or [OTHER CONTENT]] from the website for your own personal use, subject to the restrictions set out below and elsewhere in these terms and conditions.<br><br>YOU MUST NOT:&nbsp;&nbsp; <br><ul><li>Sell, rent or sub license material from the website;</li><li>Show any material from the website in public;</li><li>Reproduce, duplicate, copy or otherwise exploit material on this website for a commercial purpose;</li><li>Edit or otherwise modify any material on the website;</li><li>Redistribute material from this website.</li></ul><b>ACCEPTABLE USE </b><ul><li>You must not use this website in any way that causes, or may cause, damage to the website or impairment of the availability or accessibility of the website; or in any way which is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, illegal, fraudulent or harmful purpose or activity.</li><li>You must not use this website to copy, store, host, transmit, send, use, publish or distribute any material which consists of (or is linked to) any spyware, computer virus, Trojan horse, worm, keystroke logger, rootkit or other malicious computer software.</li><li>You must not conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction and data harvesting) on or in relation to this website without Laravel Ecommerce’s express written consent.</li><li>You must not use this website to transmit or send unsolicited commercial communications.</li><li>You must not use this website for any purposes related to marketing without Laravel Ecommerce’s express written consent.</li></ul><b>RESTRICTED ACCESS </b><br>[Access to certain areas of this website is restricted.] Laravel Ecommerce’s reserves the right to restrict access to [other] areas of this website, or indeed this entire website, at Laravel Ecommerce discretion.<br>If Laravel Ecommerce’s provides you with a user ID and password to enable you to access restricted areas of this website or other content or services, you must ensure that the user ID and password are kept confidential.<br>Laravel Ecommerce’s may disable your user ID and password in Laravel Ecommerce’s sole discretion without notice or explanation.]<br><br><b>USER CONTENT</b> <br>In these terms and conditions, “your user content” means material (including without limitation text, images, audio material, video material and audio-visual material) that you submit to this website, for whatever purpose.<br>You grant to Laravel Ecommerce a worldwide, irrevocable, non-exclusive, royalty-free license to use, reproduce, adapt, publish, translate and distribute your user content in any existing or future media. You also grant to the right to sub-license these rights, and the right to bring an action for infringement of these rights.<br>Your user content must not be illegal or unlawful, must not infringe any third party’s legal rights, and must not be capable of giving rise to legal action whether against you or Laravel Ecommerce or a third party.<br>You must not submit any user content to the website that is or has ever been the subject of any threatened or actual legal proceedings or other similar complaint.<br>Laravel Ecommerce reserves the right to edit or remove any material submitted to this website, or stored on Laravel Ecommerce’s servers, or hosted or published upon this website. <br><br><b>LIMITATIONS OF LIABILITY</b> <br>Laravel Ecommerce will not be liable to you (whether under the law of contact, the law of torts or otherwise) in relation to the contents of, or use of, or otherwise in connection with, this website:<br>For any indirect, special or consequential loss; or For any business losses, loss of revenue, income, profits or anticipated savings, loss of contracts or business relationships, loss of reputation or goodwill, or loss or corruption of information or data.<br>These limitations of liability apply even if Laravel Ecommerce has been expressly advised of the potential loss.<br><br><b>REASONABLENESS</b> <br>By using this website, you agree that the exclusions and limitations of liability set out in this website disclaimer are reasonable.<br>If you do not think they are reasonable, you must not use this website.<br><br><b>UNENFORCEABLE PROVISIONS<br></b>&nbsp;If any provision of this website disclaimer is, or is found to be, unenforceable under applicable law, that will not affect the enforceability of the other provisions of this website disclaimer.<br><br><b>BREACHES OF THESE TERMS AND CONDITIONS<br></b>&nbsp;Without prejudice to Laravel Ecommerce’s other rights under these terms and conditions, if you breach these terms and conditions in any way, Laravel Ecommerce may take such action as Laravel Ecommerce deems appropriate to deal with the breach, including suspending your access to this website, prohibiting you from accessing the website, blocking computers using your IP address from accessing the website, contacting your internet service provider to request that they block your access to the website and/or bringing court proceedings against you.<br><br><b>VARIATION<br></b>&nbsp;Laravel Ecommerce may revise these terms and conditions from time-to-time. Revised terms and conditions will apply to the use of this website from the date of the publication of the revised terms and conditions on this website. Please check this page regularly to ensure you are familiar with the current version.<br><br><b>ASSIGNMENT<br></b>&nbsp;Laravel Ecommerce may transfer, sub-contract or otherwise deal with Laravel Ecommerce rights and/or obligations under these terms and conditions without notifying you or obtaining your consent.<br>You may not transfer, sub-contract or otherwise deal with your rights and/or obligations under these terms and conditions.<br><br><b>SEVERABILITY<br></b>&nbsp;If a provision of these terms and conditions is determined by any court or other competent authority to be unlawful and/or unenforceable, the other provisions will continue in effect. If any unlawful and/or unenforceable provision would be lawful or enforceable if part of it were deleted, that part will be deemed to be deleted, and the rest of the provision will continue in effect.<br><br><b>LAW AND JURISDICTION<br></b>&nbsp;These terms and conditions will be governed by and construed in accordance with Indian law, and any disputes relating to these terms and conditions will be subject to the exclusive jurisdiction of the courts of Coimbatore.<br><br><br><br>', 'introduction\r\nCes termes et conditions régissent votre utilisation de http://www.rapamber.com/; En utilisant ce site, vous acceptez ces termes et conditions dans leur intégralité. Si vous n\'êtes pas d\'accord avec ces termes et conditions ou une partie de ces termes et conditions, vous ne devez pas utiliser ce site.\r\nVous devez avoir au moins 18 ans pour utiliser ce site. En utilisant ce site et en acceptant ces termes et conditions, vous garantissez et vous déclare que vous avez au moins 18 ans.\r\nCe site utilise des cookies. En utilisant ce site et en acceptant ces termes et conditions, vous consentez à utiliser des cookies conformément aux termes de www.laravelecommerce.com\r\nLICENCE D\'UTILISATION DU SITE WEB\r\nSauf indication contraire, Laravel Ecommerce et / ou ses concédants possèdent les droits de propriété intellectuelle sur le site et le matériel sur le site. Sous réserve de la licence ci-dessous, tous ces droits de propriété intellectuelle sont réservés.\r\nVous pouvez visualiser, télécharger uniquement à des fins de mise en cache et imprimer des pages [ou [AUTRES CONTENUS]] à partir du site Web pour votre propre usage, sous réserve des restrictions énoncées ci-dessous et ailleurs dans ces termes et conditions.', '2017-12-09 09:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `nm_theme`
--

CREATE TABLE `nm_theme` (
  `the_id` smallint(5) UNSIGNED NOT NULL,
  `the_Name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nm_wishlist`
--

CREATE TABLE `nm_wishlist` (
  `ws_id` bigint(20) UNSIGNED NOT NULL,
  `ws_pro_id` bigint(20) UNSIGNED NOT NULL,
  `ws_cus_id` bigint(20) UNSIGNED NOT NULL,
  `ws_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_wishlist`
--

INSERT INTO `nm_wishlist` (`ws_id`, `ws_pro_id`, `ws_cus_id`, `ws_date`) VALUES
(1, 1, 186, '2017-10-09 12:59:45'),
(3, 6, 186, '2017-10-16 12:28:53'),
(6, 3, 186, '2017-10-17 08:19:08'),
(7, 170, 186, '2018-01-09 11:40:38'),
(8, 164, 201, '2018-01-16 12:20:23'),
(9, 139, 201, '2018-01-16 12:20:35'),
(10, 180, 250, '2018-01-17 13:01:41'),
(11, 181, 250, '2018-01-19 11:05:39'),
(12, 58, 220, '2018-02-23 12:22:00'),
(13, 195, 271, '2018-03-28 07:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `nm_withdraw_request`
--

CREATE TABLE `nm_withdraw_request` (
  `wd_id` int(11) NOT NULL,
  `wd_mer_id` int(11) NOT NULL,
  `wd_total_wd_amt` decimal(10,2) NOT NULL,
  `wd_submited_wd_amt` decimal(10,2) NOT NULL,
  `wd_status` int(11) NOT NULL COMMENT '1 => paid, 0=> Hold',
  `wd_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_withdraw_request`
--

INSERT INTO `nm_withdraw_request` (`wd_id`, `wd_mer_id`, `wd_total_wd_amt`, `wd_submited_wd_amt`, `wd_status`, `wd_date`) VALUES
(3, 41, '149673.76', '109.00', 1, '2018-03-01 07:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `nm_withdraw_request_paypal`
--

CREATE TABLE `nm_withdraw_request_paypal` (
  `wr_id` int(11) NOT NULL,
  `wr_mer_id` int(11) NOT NULL,
  `wr_mer_name` varchar(250) NOT NULL,
  `wr_mer_payment_email` varchar(250) NOT NULL,
  `wr_paid_amount` varchar(250) NOT NULL,
  `wr_txn_id` varchar(250) NOT NULL,
  `wr_status` varchar(100) NOT NULL,
  `wr_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_withdraw_request_paypal`
--

INSERT INTO `nm_withdraw_request_paypal` (`wr_id`, `wr_mer_id`, `wr_mer_name`, `wr_mer_payment_email`, `wr_paid_amount`, `wr_txn_id`, `wr_status`, `wr_date`) VALUES
(2, 41, 'Asuganya', 'malarvizhi@pofitec.com', '62.00', '2WN19316W51867640', 'Pending', '2017-12-20 09:45:36'),
(3, 41, 'Asuganya', 'vinodbabu.89-buyer-1@gmail.com', '7.00', '8VA704656W076994W', 'Pending', '2018-01-17 05:43:31'),
(4, 41, 'Asuganya', 'suganya.t@pofitec.com', '20.00', 'd82295f3a6624c422fd9', '1', '2018-03-01 07:53:58'),
(5, 41, 'venugopal', 'venugopal@pofitec.com', '270.00', 'd83d171e7e563139ffdc', '1', '2018-03-01 10:40:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_status_chat`
--
ALTER TABLE `delivery_status_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `nm_aboutus`
--
ALTER TABLE `nm_aboutus`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `nm_add`
--
ALTER TABLE `nm_add`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `nm_admin`
--
ALTER TABLE `nm_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `nm_adminreply_comments`
--
ALTER TABLE `nm_adminreply_comments`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `nm_auction`
--
ALTER TABLE `nm_auction`
  ADD PRIMARY KEY (`auc_id`);

--
-- Indexes for table `nm_banner`
--
ALTER TABLE `nm_banner`
  ADD PRIMARY KEY (`bn_id`);

--
-- Indexes for table `nm_blog`
--
ALTER TABLE `nm_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `nm_blogsetting`
--
ALTER TABLE `nm_blogsetting`
  ADD PRIMARY KEY (`bs_id`);

--
-- Indexes for table `nm_blog_cus_comments`
--
ALTER TABLE `nm_blog_cus_comments`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `nm_category_ad`
--
ALTER TABLE `nm_category_ad`
  ADD PRIMARY KEY (`cat_ad_id`);

--
-- Indexes for table `nm_category_banner`
--
ALTER TABLE `nm_category_banner`
  ADD PRIMARY KEY (`cat_bn_id`);

--
-- Indexes for table `nm_city`
--
ALTER TABLE `nm_city`
  ADD PRIMARY KEY (`ci_id`);

--
-- Indexes for table `nm_cms_pages`
--
ALTER TABLE `nm_cms_pages`
  ADD PRIMARY KEY (`cp_id`);

--
-- Indexes for table `nm_color`
--
ALTER TABLE `nm_color`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `nm_contact`
--
ALTER TABLE `nm_contact`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `nm_country`
--
ALTER TABLE `nm_country`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `nm_coupon`
--
ALTER TABLE `nm_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nm_coupon_purchage`
--
ALTER TABLE `nm_coupon_purchage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nm_currency`
--
ALTER TABLE `nm_currency`
  ADD PRIMARY KEY (`cur_id`);

--
-- Indexes for table `nm_customer`
--
ALTER TABLE `nm_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `nm_deals`
--
ALTER TABLE `nm_deals`
  ADD PRIMARY KEY (`deal_id`);

--
-- Indexes for table `nm_emailsetting`
--
ALTER TABLE `nm_emailsetting`
  ADD PRIMARY KEY (`es_id`);

--
-- Indexes for table `nm_enquiry`
--
ALTER TABLE `nm_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nm_faq`
--
ALTER TABLE `nm_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `nm_generalsetting`
--
ALTER TABLE `nm_generalsetting`
  ADD PRIMARY KEY (`gs_id`);

--
-- Indexes for table `nm_imagesetting`
--
ALTER TABLE `nm_imagesetting`
  ADD PRIMARY KEY (`imgs_id`);

--
-- Indexes for table `nm_image_sizes`
--
ALTER TABLE `nm_image_sizes`
  ADD PRIMARY KEY (`image_size_id`);

--
-- Indexes for table `nm_inquiries`
--
ALTER TABLE `nm_inquiries`
  ADD PRIMARY KEY (`iq_id`);

--
-- Indexes for table `nm_language`
--
ALTER TABLE `nm_language`
  ADD UNIQUE KEY `id` (`lang_id`);

--
-- Indexes for table `nm_login`
--
ALTER TABLE `nm_login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `nm_maincategory`
--
ALTER TABLE `nm_maincategory`
  ADD PRIMARY KEY (`mc_id`),
  ADD KEY `mc_status` (`mc_status`);

--
-- Indexes for table `nm_modulesettings`
--
ALTER TABLE `nm_modulesettings`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `nm_newsletter_subscribers`
--
ALTER TABLE `nm_newsletter_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nm_order`
--
ALTER TABLE `nm_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_cus_id` (`order_cus_id`,`order_pro_id`,`order_status`,`delivery_status`);

--
-- Indexes for table `nm_ordercod`
--
ALTER TABLE `nm_ordercod`
  ADD PRIMARY KEY (`cod_id`);

--
-- Indexes for table `nm_order_delivery_status`
--
ALTER TABLE `nm_order_delivery_status`
  ADD PRIMARY KEY (`delStatus_id`);

--
-- Indexes for table `nm_order_payu`
--
ALTER TABLE `nm_order_payu`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_cus_id` (`order_cus_id`,`order_pro_id`,`order_status`,`delivery_status`);

--
-- Indexes for table `nm_paymentsettings`
--
ALTER TABLE `nm_paymentsettings`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `nm_procart`
--
ALTER TABLE `nm_procart`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `nm_procolor`
--
ALTER TABLE `nm_procolor`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `nm_product`
--
ALTER TABLE `nm_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `nm_prosize`
--
ALTER TABLE `nm_prosize`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `nm_prospec`
--
ALTER TABLE `nm_prospec`
  ADD PRIMARY KEY (`spc_id`);

--
-- Indexes for table `nm_review`
--
ALTER TABLE `nm_review`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `nm_save_cart`
--
ALTER TABLE `nm_save_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `nm_secmaincategory`
--
ALTER TABLE `nm_secmaincategory`
  ADD PRIMARY KEY (`smc_id`),
  ADD KEY `smc_status` (`smc_status`),
  ADD KEY `smc_mc_id` (`smc_mc_id`);

--
-- Indexes for table `nm_secsubcategory`
--
ALTER TABLE `nm_secsubcategory`
  ADD PRIMARY KEY (`ssb_id`),
  ADD KEY `ssb_status` (`ssb_status`),
  ADD KEY `ssb_sb_id` (`ssb_sb_id`),
  ADD KEY `ssb_smc_id` (`ssb_smc_id`),
  ADD KEY `mc_id` (`mc_id`);

--
-- Indexes for table `nm_shipping`
--
ALTER TABLE `nm_shipping`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `nm_size`
--
ALTER TABLE `nm_size`
  ADD PRIMARY KEY (`si_id`);

--
-- Indexes for table `nm_smtp`
--
ALTER TABLE `nm_smtp`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `nm_social_media`
--
ALTER TABLE `nm_social_media`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `nm_specification`
--
ALTER TABLE `nm_specification`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `nm_spgroup`
--
ALTER TABLE `nm_spgroup`
  ADD PRIMARY KEY (`spg_id`);

--
-- Indexes for table `nm_store`
--
ALTER TABLE `nm_store`
  ADD PRIMARY KEY (`stor_id`),
  ADD KEY `stor_merchant_id` (`stor_merchant_id`),
  ADD KEY `stor_status` (`stor_status`);

--
-- Indexes for table `nm_subcategory`
--
ALTER TABLE `nm_subcategory`
  ADD PRIMARY KEY (`sb_id`);

--
-- Indexes for table `nm_subscription`
--
ALTER TABLE `nm_subscription`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `nm_terms`
--
ALTER TABLE `nm_terms`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `nm_theme`
--
ALTER TABLE `nm_theme`
  ADD PRIMARY KEY (`the_id`);

--
-- Indexes for table `nm_wishlist`
--
ALTER TABLE `nm_wishlist`
  ADD PRIMARY KEY (`ws_id`);

--
-- Indexes for table `nm_withdraw_request`
--
ALTER TABLE `nm_withdraw_request`
  ADD PRIMARY KEY (`wd_id`);

--
-- Indexes for table `nm_withdraw_request_paypal`
--
ALTER TABLE `nm_withdraw_request_paypal`
  ADD PRIMARY KEY (`wr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_status_chat`
--
ALTER TABLE `delivery_status_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `nm_aboutus`
--
ALTER TABLE `nm_aboutus`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_add`
--
ALTER TABLE `nm_add`
  MODIFY `ad_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nm_admin`
--
ALTER TABLE `nm_admin`
  MODIFY `adm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_adminreply_comments`
--
ALTER TABLE `nm_adminreply_comments`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nm_auction`
--
ALTER TABLE `nm_auction`
  MODIFY `auc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nm_banner`
--
ALTER TABLE `nm_banner`
  MODIFY `bn_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `nm_blog`
--
ALTER TABLE `nm_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nm_blogsetting`
--
ALTER TABLE `nm_blogsetting`
  MODIFY `bs_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_blog_cus_comments`
--
ALTER TABLE `nm_blog_cus_comments`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nm_category_ad`
--
ALTER TABLE `nm_category_ad`
  MODIFY `cat_ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `nm_category_banner`
--
ALTER TABLE `nm_category_banner`
  MODIFY `cat_bn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `nm_city`
--
ALTER TABLE `nm_city`
  MODIFY `ci_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `nm_cms_pages`
--
ALTER TABLE `nm_cms_pages`
  MODIFY `cp_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nm_color`
--
ALTER TABLE `nm_color`
  MODIFY `co_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `nm_contact`
--
ALTER TABLE `nm_contact`
  MODIFY `cont_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_country`
--
ALTER TABLE `nm_country`
  MODIFY `co_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `nm_coupon`
--
ALTER TABLE `nm_coupon`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `nm_coupon_purchage`
--
ALTER TABLE `nm_coupon_purchage`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_currency`
--
ALTER TABLE `nm_currency`
  MODIFY `cur_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_customer`
--
ALTER TABLE `nm_customer`
  MODIFY `cus_id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `nm_deals`
--
ALTER TABLE `nm_deals`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `nm_emailsetting`
--
ALTER TABLE `nm_emailsetting`
  MODIFY `es_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_enquiry`
--
ALTER TABLE `nm_enquiry`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `nm_faq`
--
ALTER TABLE `nm_faq`
  MODIFY `faq_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nm_generalsetting`
--
ALTER TABLE `nm_generalsetting`
  MODIFY `gs_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_imagesetting`
--
ALTER TABLE `nm_imagesetting`
  MODIFY `imgs_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nm_image_sizes`
--
ALTER TABLE `nm_image_sizes`
  MODIFY `image_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_inquiries`
--
ALTER TABLE `nm_inquiries`
  MODIFY `iq_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nm_language`
--
ALTER TABLE `nm_language`
  MODIFY `lang_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nm_login`
--
ALTER TABLE `nm_login`
  MODIFY `log_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- AUTO_INCREMENT for table `nm_maincategory`
--
ALTER TABLE `nm_maincategory`
  MODIFY `mc_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nm_modulesettings`
--
ALTER TABLE `nm_modulesettings`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_newsletter_subscribers`
--
ALTER TABLE `nm_newsletter_subscribers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `nm_order`
--
ALTER TABLE `nm_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `nm_ordercod`
--
ALTER TABLE `nm_ordercod`
  MODIFY `cod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `nm_order_delivery_status`
--
ALTER TABLE `nm_order_delivery_status`
  MODIFY `delStatus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `nm_order_payu`
--
ALTER TABLE `nm_order_payu`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `nm_paymentsettings`
--
ALTER TABLE `nm_paymentsettings`
  MODIFY `ps_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_procart`
--
ALTER TABLE `nm_procart`
  MODIFY `pc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_procolor`
--
ALTER TABLE `nm_procolor`
  MODIFY `pc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=855;

--
-- AUTO_INCREMENT for table `nm_product`
--
ALTER TABLE `nm_product`
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `nm_prosize`
--
ALTER TABLE `nm_prosize`
  MODIFY `ps_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1194;

--
-- AUTO_INCREMENT for table `nm_prospec`
--
ALTER TABLE `nm_prospec`
  MODIFY `spc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=616;

--
-- AUTO_INCREMENT for table `nm_review`
--
ALTER TABLE `nm_review`
  MODIFY `comment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `nm_save_cart`
--
ALTER TABLE `nm_save_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `nm_secmaincategory`
--
ALTER TABLE `nm_secmaincategory`
  MODIFY `smc_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `nm_secsubcategory`
--
ALTER TABLE `nm_secsubcategory`
  MODIFY `ssb_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `nm_shipping`
--
ALTER TABLE `nm_shipping`
  MODIFY `ship_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=607;

--
-- AUTO_INCREMENT for table `nm_size`
--
ALTER TABLE `nm_size`
  MODIFY `si_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nm_smtp`
--
ALTER TABLE `nm_smtp`
  MODIFY `sm_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nm_social_media`
--
ALTER TABLE `nm_social_media`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_specification`
--
ALTER TABLE `nm_specification`
  MODIFY `sp_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `nm_spgroup`
--
ALTER TABLE `nm_spgroup`
  MODIFY `spg_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nm_store`
--
ALTER TABLE `nm_store`
  MODIFY `stor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `nm_subcategory`
--
ALTER TABLE `nm_subcategory`
  MODIFY `sb_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `nm_subscription`
--
ALTER TABLE `nm_subscription`
  MODIFY `sub_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_terms`
--
ALTER TABLE `nm_terms`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nm_theme`
--
ALTER TABLE `nm_theme`
  MODIFY `the_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nm_wishlist`
--
ALTER TABLE `nm_wishlist`
  MODIFY `ws_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nm_withdraw_request`
--
ALTER TABLE `nm_withdraw_request`
  MODIFY `wd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nm_withdraw_request_paypal`
--
ALTER TABLE `nm_withdraw_request_paypal`
  MODIFY `wr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
