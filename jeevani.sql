-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 06:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeevani`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_custom_pack_main_tbl`
--

CREATE TABLE `admin_custom_pack_main_tbl` (
  `id` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_custom_pack_main_tbl`
--

INSERT INTO `admin_custom_pack_main_tbl` (`id`, `days`, `discount`, `status`) VALUES
(1, 4, 30, 1),
(3, 4, 37, 1),
(6, 5, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_custom_pack_slave_tbl`
--

CREATE TABLE `admin_custom_pack_slave_tbl` (
  `id` int(11) NOT NULL,
  `main_tbl_id` int(11) NOT NULL,
  `each_package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_custom_pack_slave_tbl`
--

INSERT INTO `admin_custom_pack_slave_tbl` (`id`, `main_tbl_id`, `each_package_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(6, 3, 1),
(7, 3, 2),
(8, 3, 3),
(12, 6, 1),
(13, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `appoinment_tbl`
--

CREATE TABLE `appoinment_tbl` (
  `appo_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `token` varchar(100) NOT NULL,
  `symptom` varchar(250) DEFAULT NULL,
  `fee_status` tinyint(4) DEFAULT 0,
  `prescription` text DEFAULT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appoinment_tbl`
--

INSERT INTO `appoinment_tbl` (`appo_id`, `time_id`, `l_id`, `date`, `token`, `symptom`, `fee_status`, `prescription`, `status`) VALUES
(2, 1, 3, '2023-02-15 00:00:00', 'Token-72a567d885', 'paim', 1, 'rest', 3),
(3, 1, 3, '2023-02-17 00:00:00', 'Token-34969846ac', 'body pain', 1, 'jhgf', 3),
(5, 3, 7, '2023-02-15 00:00:00', 'Token-5861bc7889', 'pain', 1, 'Lehyam', 3),
(6, 3, 7, '2023-02-22 00:00:00', 'Token-e9b09b165c', 'kda', 1, 'jjgh', 3),
(7, 1, 7, '2023-02-23 00:00:00', 'Token-1eb21c6dd0', 'adadvfv', 1, 'faqdfadf', 3),
(8, 1, 3, '2023-02-19 00:00:00', 'Token-71ec4f9cef', NULL, 1, 'zfdasf', 3),
(9, 3, 3, '2023-02-24 00:00:00', 'Token-7db9f85f38', 'jhg', 1, 'oiughcfv', 3),
(11, 3, 7, '2023-02-22 00:00:00', 'Token-e9b09b165c', 'kda', 1, 'jjgh', 3),
(12, 1, 7, '2023-02-23 00:00:00', 'Token-1eb21c6dd0', 'adadvfv', 1, 'faqdfadf', 3),
(13, 3, 7, '2023-03-01 00:00:00', 'Token-6db8a8865e', NULL, 0, '', 0),
(14, 6, 6, '2023-03-09 00:00:00', 'Token-f725391c20', NULL, 0, '', 0),
(15, 6, 7, '2023-03-09 00:00:00', 'Token-74ef17679c', NULL, 0, '', 0),
(16, 8, 3, '2023-03-10 00:00:00', 'Token-bf9fd5c997', NULL, 0, '', 0),
(17, 8, 6, '2023-03-10 00:00:00', 'Token-03ff1bf104', NULL, 0, '', 0),
(18, 8, 7, '2023-03-10 00:00:00', 'Token-42fff216a2', NULL, 0, '', 0),
(19, 8, 8, '2023-03-10 00:00:00', 'Token-5a7dc43940', NULL, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_timing_tbl`
--

CREATE TABLE `doctor_timing_tbl` (
  `time_id` int(11) NOT NULL,
  `l_id` int(11) NOT NULL,
  `start` varchar(10) NOT NULL,
  `end` varchar(10) NOT NULL,
  `slot_count` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_timing_tbl`
--

INSERT INTO `doctor_timing_tbl` (`time_id`, `l_id`, `start`, `end`, `slot_count`, `status`) VALUES
(3, 4, '09:00', '11:00', 1, 1),
(4, 5, '11:45', '16:00', 1, 1),
(5, 5, '12:00', '14:00', 1, 1),
(6, 4, '12:58', '13:58', 2, 1),
(8, 2, '10:00', '12:00', 2, 1),
(9, 2, '15:00', '16:00', 4, 1),
(10, 2, '16:02', '17:02', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment1_tbl`
--

CREATE TABLE `payment1_tbl` (
  `pay_id` int(11) NOT NULL,
  `r_pay_id` varchar(250) NOT NULL,
  `r_order_id` varchar(250) NOT NULL,
  `custom_package_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment1_tbl`
--

INSERT INTO `payment1_tbl` (`pay_id`, `r_pay_id`, `r_order_id`, `custom_package_id`, `date`, `amount`) VALUES
(1, 'pay_LGHziW8eDCl8IQ', 'order_LGHzFTEFDFUKcS', 3, '2023-02-14 05:50:06', 25000),
(2, 'pay_LPqhK34ozfhbKB', 'order_LPqh0ykeT8PQuy', 4, '2023-03-09 21:38:07', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `pay_id` int(11) NOT NULL,
  `r_pay_id` varchar(250) NOT NULL,
  `r_order_id` varchar(250) NOT NULL,
  `appo_id` int(11) NOT NULL DEFAULT 0,
  `treament_id` int(11) DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`pay_id`, `r_pay_id`, `r_order_id`, `appo_id`, `treament_id`, `date`) VALUES
(1, 'pay_LGMUxajaTZbUNZ', 'order_LGMUgFN4sug7kc', 1, 0, '2023-02-13 22:14:37'),
(2, 'pay_LGoFa2nDketbjN', 'order_LGoEznJz0HnL5J', 4, 0, '2023-02-15 01:23:13'),
(3, 'pay_LGoK3iOktAVzkJ', 'order_LGoJl0fwA2p90a', 5, 0, '2023-02-15 01:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `preditction_anys1_tbl`
--

CREATE TABLE `preditction_anys1_tbl` (
  `anyls_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `query_1` varchar(25) NOT NULL,
  `query_2` varchar(25) NOT NULL,
  `query_3` varchar(25) NOT NULL,
  `query_4` varchar(25) NOT NULL,
  `query_5` varchar(25) NOT NULL,
  `result_out` varchar(25) NOT NULL,
  `predict_type` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preditction_anys1_tbl`
--

INSERT INTO `preditction_anys1_tbl` (`anyls_id`, `user_id`, `query_1`, `query_2`, `query_3`, `query_4`, `query_5`, `result_out`, `predict_type`, `date`) VALUES
(1, 6, 'back_pain', 'back_pain', 'constipation', 'back_pain', 'congestion', 'Common Cold', '1', '2023-03-08 17:20:28'),
(2, 6, 'swelled_lymph_nodes', 'swelled_lymph_nodes', 'blurred_and_distorted_vis', 'redness_of_eyes', 'phlegm', 'Common Cold', '2', '2023-03-08 18:11:08'),
(3, 6, 'acute_liver_failure', 'runny_nose', 'constipation', 'blackheads', 'inflammatory_nails', 'Common Cold', '1', '2023-03-08 18:11:27'),
(4, 6, 'mild_fever', 'yellowing_of_eyes', '0', '0', '0', 'hepatitis A', '3', '2023-03-08 18:12:31'),
(5, 3, 'swelled_lymph_nodes', 'sinus_pressure', '0', '0', '0', 'Drug Reaction', '3', '2023-03-09 06:37:15'),
(6, 3, 'constipation', 'yellow_urine', '0', '0', '0', 'Drug Reaction', '2', '2023-03-10 06:30:10'),
(7, 3, 'constipation', 'swelled_lymph_nodes', '0', '0', '0', 'Dimorphic hemmorhoids(pil', '2', '2023-03-10 06:36:58'),
(8, 3, 'constipation', 'yellow_urine', '0', '0', '0', 'Typhoid', '3', '2023-03-12 17:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill_address`
--

CREATE TABLE `tbl_bill_address` (
  `address_id` int(11) NOT NULL,
  `user_log_id` int(11) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bill_address`
--

INSERT INTO `tbl_bill_address` (`address_id`, `user_log_id`, `contact_no`, `address`, `pincode`, `date`) VALUES
(1, 6, '9095909890', 'abhhjgjg bhgkj', '989889', '2023-02-14 10:21:55'),
(2, 7, '8918212834', ';lKjoiugy', '686518', '2023-02-14 15:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_log_id` int(11) NOT NULL,
  `qty` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cata_id` int(11) NOT NULL,
  `cata_name` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cata_id`, `cata_name`, `date`, `status`) VALUES
(1, 'Hair oil', '2023-02-14 15:08:36', 0),
(2, 'Lehyam', '2023-02-14 15:10:05', 1),
(3, 'capsules', '2023-02-14 15:10:17', 1),
(4, 'Eye Drop', '2023-02-14 15:19:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom_package`
--

CREATE TABLE `tbl_custom_package` (
  `id` int(11) NOT NULL,
  `user_log_id` int(11) NOT NULL,
  `type_status` tinyint(4) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `num_days` int(11) NOT NULL,
  `appo_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_custom_p_id` int(11) NOT NULL DEFAULT 0,
  `fee_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_custom_package`
--

INSERT INTO `tbl_custom_package` (`id`, `user_log_id`, `type_status`, `create_date`, `num_days`, `appo_date`, `admin_custom_p_id`, `fee_status`) VALUES
(1, 6, 1, '2023-02-14 10:17:53', 1, '2023-02-14 18:30:00', 0, 0),
(2, 6, 0, '2023-02-14 10:19:01', 4, '2023-02-16 18:30:00', 1, 0),
(3, 6, 0, '2023-02-14 10:20:44', 5, '2023-02-17 18:30:00', 6, 1),
(4, 3, 1, '2023-03-10 14:08:34', 1, '2023-03-09 18:30:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `d_id` int(100) NOT NULL,
  `a_id` int(5) NOT NULL,
  `l_id` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_address` varchar(100) NOT NULL,
  `d_fees` int(50) NOT NULL,
  `spec` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`d_id`, `a_id`, `l_id`, `d_name`, `d_address`, `d_fees`, `spec`, `status`) VALUES
(1, 2, 2, 'Dr Abcd', 'CHARIVUKALAYIL H', 350, 'Baala Chikitsa', 0),
(2, 2, 4, 'dr rog', 'CHARIVUKALAYIL H', 400, 'Baala Chikitsa', 0),
(3, 2, 5, 'Dr saki ', ' sdfswfsdf', 700, 'Kayachikits', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `f_id` int(100) NOT NULL,
  `fr_id` int(100) NOT NULL,
  `feedback` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`f_id`, `fr_id`, `feedback`) VALUES
(1, 1, 'Good '),
(2, 4, 'Bad'),
(3, 5, 'Not so good'),
(4, 3, 'Nice'),
(5, 5, 'Excellent');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `lv_id` int(50) NOT NULL,
  `l_id` int(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `fdate` varchar(30) NOT NULL,
  `tdate` varchar(30) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`lv_id`, `l_id`, `type`, `fdate`, `tdate`, `reason`, `status`) VALUES
(1, 2, ' Casual', '2023-02-24', '', 'casual', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `l_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `code` varchar(100) NOT NULL,
  `verified` int(1) NOT NULL DEFAULT 0,
  `verify_token` varchar(100) NOT NULL,
  `a_id` int(5) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`l_id`, `email`, `password`, `code`, `verified`, `verify_token`, `a_id`, `status`) VALUES
(1, 'admin@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '', 1, '', 1, 0),
(2, 'abitmonrajancr7@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '', 1, '', 2, 1),
(3, 'abitmonrajan@mca.ajce.in', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '002d7ecc034d12cd0c9e0197642db40d', 1, '', 3, 0),
(4, 'rogexed287@ngopy.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '', 1, '', 2, 0),
(5, 'sakig93805@mirtox.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '', 1, '', 2, 0),
(6, 'yasiwej866@mirtox.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', 'ce850b47e0b45c0a05932f8344e3e10b', 1, '', 3, 0),
(7, 'gifev93946@mirtox.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '17682704662adbf59d01bc38ebd0e590', 1, '', 3, 0),
(8, 'waferir633@rolenot.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '0a84e9b323e1de00bca867c8fdec6954', 1, '', 3, 0),
(9, 'vemono1797@gpipes.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', 'a580648c9dc272f95c769035565072a8', 1, '', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_p1_purchase`
--

CREATE TABLE `tbl_p1_purchase` (
  `item_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_p1_purchase`
--

INSERT INTO `tbl_p1_purchase` (`item_id`, `pay_id`, `qty`, `product_id`) VALUES
(1, 1, 5, 3),
(2, 2, 5, 3),
(3, 3, 7, 2),
(4, 3, 7, 4),
(5, 3, 3, 5),
(6, 3, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packages`
--

CREATE TABLE `tbl_packages` (
  `p_id` int(100) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_image` varchar(300) NOT NULL,
  `p_amount` varchar(30) NOT NULL,
  `p_status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_packages`
--

INSERT INTO `tbl_packages` (`p_id`, `p_name`, `p_image`, `p_amount`, `p_status`) VALUES
(1, 'Foot Massag', 'foot-massage,png.jpg', '2000  ', 0),
(2, 'Thalam', 'Thalam.png', '3000', 0),
(3, 'Nasya', 'nasya.png', '1500', 0),
(4, 'Applying Medicated Paste', 'Applying Medicated Paste.jpg', '5000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `user_id` int(10) NOT NULL,
  `l_id` int(30) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `a_id` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `bloodgrp` varchar(5) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`user_id`, `l_id`, `u_name`, `a_id`, `address`, `city`, `gender`, `dob`, `bloodgrp`, `status`) VALUES
(1, 3, 'patient', 3, 'patient h ', 'Ranny', 'male', '2010-02-11', 'A+ve', 0),
(2, 6, 'Amla', 3, 'aksdjk da', 'sdvasd', 'female', '2007-03-15', 'B+ve', 0),
(3, 7, 'hari', 3, 'qerwr', 'twesfdz', 'male', '2010-10-12', 'AB+ve', 0),
(4, 8, 'Amal', 3, 'char', 'pathanamthitta', 'male', '1999-09-09', 'A+ve', 0),
(5, 9, 'Shino V Shibu', 3, 'Anathadam', 'Ranny', 'male', '1999-09-09', 'A+ve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `cata_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `cata_id`, `product_name`, `stock`, `price`, `image`, `description`, `date`, `status`) VALUES
(2, 2, 'Chyavanprash', 1, 350, 'Chyavanprash.jpeg', 'Boosts Immunity, Strength & Longevity', '2023-02-14 15:13:46', 1),
(3, 3, 'glymin-plus-tablet', 40, 230, 'glymin-plus-tablet-1.jpeg', 'For Blood Sugar Control', '2023-02-14 15:14:48', 1),
(4, 1, 'kesini-oil', 33, 800, 'kesini-oil-1.jpeg', 'Promotes Hair Growth, Increases Hair Volume', '2023-02-14 15:15:37', 1),
(5, 4, 'Eyeconic', 10, 400, '10-1110222-dr-willmar-schwabe-india-original-imagd9skhprbns99.jpeg', 'Good for eye', '2023-02-14 15:30:11', 1),
(6, 2, 'Vyoshadi Vatakam', 5, 590, 'Vyoshadi Vatakam.png', 'For Cough & Throat Irritation', '2023-02-14 15:31:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_p_purchase`
--

CREATE TABLE `tbl_p_purchase` (
  `pay_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `r_pay_id` varchar(250) NOT NULL,
  `r_order_id` varchar(250) NOT NULL,
  `total_amount` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_p_purchase`
--

INSERT INTO `tbl_p_purchase` (`pay_id`, `log_id`, `bill_id`, `r_pay_id`, `r_order_id`, `total_amount`, `date`, `status`) VALUES
(1, 6, 1, 'pay_LGI9nMD6Ld3JKO', 'order_LGI9Vu9Ro7rd2L', 1150, '2023-02-14 15:16:07', 1),
(2, 7, 2, 'pay_LGN8ucJXiRmd6w', 'order_LGN7eU7NCRGnyw', 1150, '2023-02-16 13:29:20', 1),
(3, 7, 2, 'pay_LHBZMT0VaZt6Ct', 'order_LHBY7ZZ0QRWgYt', 9840, '2023-02-16 00:11:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_packages`
--

CREATE TABLE `tbl_user_packages` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `each_package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_packages`
--

INSERT INTO `tbl_user_packages` (`id`, `package_id`, `each_package_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 3, 1),
(6, 3, 4),
(7, 3, 2),
(8, 4, 1),
(9, 4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_custom_pack_main_tbl`
--
ALTER TABLE `admin_custom_pack_main_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_custom_pack_slave_tbl`
--
ALTER TABLE `admin_custom_pack_slave_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_tbl_id_fk` (`main_tbl_id`);

--
-- Indexes for table `appoinment_tbl`
--
ALTER TABLE `appoinment_tbl`
  ADD PRIMARY KEY (`appo_id`);

--
-- Indexes for table `doctor_timing_tbl`
--
ALTER TABLE `doctor_timing_tbl`
  ADD PRIMARY KEY (`time_id`),
  ADD KEY `time_log_id_fk` (`l_id`);

--
-- Indexes for table `payment1_tbl`
--
ALTER TABLE `payment1_tbl`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `custom_pack_id_fk` (`custom_package_id`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `preditction_anys1_tbl`
--
ALTER TABLE `preditction_anys1_tbl`
  ADD PRIMARY KEY (`anyls_id`);

--
-- Indexes for table `tbl_bill_address`
--
ALTER TABLE `tbl_bill_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `address_user_log_id_fk` (`user_log_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_p_id_fk` (`product_id`),
  ADD KEY `cart_log_id_fk` (`user_log_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cata_id`);

--
-- Indexes for table `tbl_custom_package`
--
ALTER TABLE `tbl_custom_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_user_id_fk` (`user_log_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `l_id` (`l_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `for_id` (`fr_id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`lv_id`),
  ADD KEY `d_id` (`l_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tbl_p1_purchase`
--
ALTER TABLE `tbl_p1_purchase`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `p1_purchase_pay_id_fk` (`pay_id`),
  ADD KEY `p1_purchase_prodcut_fk_id` (`product_id`);

--
-- Indexes for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_login` (`l_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_p_purchase`
--
ALTER TABLE `tbl_p_purchase`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `p_purchase_log_id_fk` (`log_id`),
  ADD KEY `p_pruchase_bill_id_fk` (`bill_id`);

--
-- Indexes for table `tbl_user_packages`
--
ALTER TABLE `tbl_user_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_p_id_fk` (`package_id`),
  ADD KEY `each_p_id_fk` (`each_package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_custom_pack_main_tbl`
--
ALTER TABLE `admin_custom_pack_main_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_custom_pack_slave_tbl`
--
ALTER TABLE `admin_custom_pack_slave_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `appoinment_tbl`
--
ALTER TABLE `appoinment_tbl`
  MODIFY `appo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doctor_timing_tbl`
--
ALTER TABLE `doctor_timing_tbl`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment1_tbl`
--
ALTER TABLE `payment1_tbl`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `preditction_anys1_tbl`
--
ALTER TABLE `preditction_anys1_tbl`
  MODIFY `anyls_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_bill_address`
--
ALTER TABLE `tbl_bill_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_custom_package`
--
ALTER TABLE `tbl_custom_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `d_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `f_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `lv_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_p1_purchase`
--
ALTER TABLE `tbl_p1_purchase`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_p_purchase`
--
ALTER TABLE `tbl_p_purchase`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_packages`
--
ALTER TABLE `tbl_user_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_custom_pack_slave_tbl`
--
ALTER TABLE `admin_custom_pack_slave_tbl`
  ADD CONSTRAINT `main_tbl_id_fk` FOREIGN KEY (`main_tbl_id`) REFERENCES `admin_custom_pack_main_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_timing_tbl`
--
ALTER TABLE `doctor_timing_tbl`
  ADD CONSTRAINT `time_log_id_fk` FOREIGN KEY (`l_id`) REFERENCES `tbl_login` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment1_tbl`
--
ALTER TABLE `payment1_tbl`
  ADD CONSTRAINT `custom_pack_id_fk` FOREIGN KEY (`custom_package_id`) REFERENCES `tbl_custom_package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_bill_address`
--
ALTER TABLE `tbl_bill_address`
  ADD CONSTRAINT `address_user_log_id_fk` FOREIGN KEY (`user_log_id`) REFERENCES `tbl_login` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `cart_log_id_fk` FOREIGN KEY (`user_log_id`) REFERENCES `tbl_login` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_p_id_fk` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_custom_package`
--
ALTER TABLE `tbl_custom_package`
  ADD CONSTRAINT `login_user_id_fk` FOREIGN KEY (`user_log_id`) REFERENCES `tbl_login` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD CONSTRAINT `tbl_doctor_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `tbl_login` (`l_id`);

--
-- Constraints for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `for_id` FOREIGN KEY (`fr_id`) REFERENCES `tbl_patient` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD CONSTRAINT `l_id_fk` FOREIGN KEY (`l_id`) REFERENCES `tbl_login` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_p1_purchase`
--
ALTER TABLE `tbl_p1_purchase`
  ADD CONSTRAINT `p1_purchase_pay_id_fk` FOREIGN KEY (`pay_id`) REFERENCES `tbl_p_purchase` (`pay_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p1_purchase_prodcut_fk_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD CONSTRAINT `fk_login` FOREIGN KEY (`l_id`) REFERENCES `tbl_login` (`l_id`);

--
-- Constraints for table `tbl_p_purchase`
--
ALTER TABLE `tbl_p_purchase`
  ADD CONSTRAINT `p_pruchase_bill_id_fk` FOREIGN KEY (`bill_id`) REFERENCES `tbl_bill_address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_purchase_log_id_fk` FOREIGN KEY (`log_id`) REFERENCES `tbl_login` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user_packages`
--
ALTER TABLE `tbl_user_packages`
  ADD CONSTRAINT `custom_p_id_fk` FOREIGN KEY (`package_id`) REFERENCES `tbl_custom_package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `each_p_id_fk` FOREIGN KEY (`each_package_id`) REFERENCES `tbl_packages` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
