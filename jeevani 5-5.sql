-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 05:55 PM
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
(1, 3, 40, 1),
(2, 3, 50, 1),
(3, 3, 55, 1),
(4, 5, 60, 1),
(5, 5, 60, 1),
(6, 2, 30, 1);

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
(2, 1, 2),
(3, 2, 2),
(4, 2, 3),
(5, 3, 2),
(6, 3, 3),
(7, 3, 4),
(8, 4, 2),
(9, 4, 3),
(10, 4, 4),
(11, 5, 2),
(12, 5, 3),
(13, 5, 4),
(14, 5, 5),
(15, 6, 3),
(16, 6, 4);

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
(1, 3, 3, '2023-05-04 00:00:00', '155', 'Body pain, Feaver', 1, ' use Tulsi kadha for  2 times a day for 3 days.', 3),
(2, 11, 3, '2023-05-04 00:00:00', '246', 'Leg Pain,headache', 0, 'Brahmi ghritam.1-1-1 for 3 days&#10;Sarapgandha vati.1-0-1 for 2 days', 3),
(3, 15, 3, '2023-05-05 00:00:00', '41', NULL, 0, '', 0),
(4, 19, 3, '2023-05-05 00:00:00', '199', NULL, 0, '', 0),
(5, 8, 5, '2023-05-05 00:00:00', '41', NULL, 0, '', 0),
(6, 16, 5, '2023-05-05 00:00:00', '88', NULL, 0, '', 0),
(7, 3, 6, '2023-05-05 00:00:00', '20', NULL, 0, '', 4),
(8, 5, 6, '2023-05-05 00:00:00', '111', NULL, 0, '', 0),
(9, 13, 6, '2023-05-06 00:00:00', '122', NULL, 0, '', 0),
(10, 16, 6, '2023-05-06 00:00:00', '169', NULL, 0, '', 0),
(11, 4, 7, '2023-05-05 00:00:00', '59', NULL, 0, '', 0),
(12, 5, 7, '2023-05-05 00:00:00', '122', NULL, 0, '', 0),
(13, 16, 7, '2023-05-06 00:00:00', '82', NULL, 0, '', 0),
(14, 16, 7, '2023-05-07 00:00:00', '145', NULL, 0, '', 0),
(15, 5, 4, '2023-05-05 00:00:00', '59', NULL, 0, '', 4),
(16, 12, 4, '2023-05-09 00:00:00', '149', NULL, 0, '', 4),
(17, 8, 4, '2023-05-11 00:00:00', '82', NULL, 0, '', 0),
(18, 5, 4, '2023-05-10 00:00:00', '165', NULL, 0, '', 0);

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
(1, 8, '08:00', '08:30', 5, 1),
(2, 8, '10:30', '11:00', 4, 1),
(3, 8, '14:00', '14:30', 3, 1),
(4, 8, '15:00', '16:00', 10, 1),
(5, 9, '15:00', '15:30', 5, 1),
(6, 9, '16:00', '17:00', 9, 1),
(7, 9, '08:00', '09:00', 8, 1),
(8, 10, '10:00', '10:30', 5, 1),
(9, 10, '12:00', '12:30', 7, 1),
(10, 10, '14:00', '14:30', 8, 1),
(11, 10, '15:00', '16:00', 8, 1),
(12, 11, '09:00', '10:00', 8, 1),
(13, 11, '15:00', '16:00', 9, 1),
(14, 11, '12:30', '12:45', 2, 1),
(15, 12, '12:00', '13:00', 8, 1),
(16, 12, '10:30', '11:00', 4, 1),
(17, 13, '10:00', '11:00', 9, 1),
(18, 13, '12:00', '13:00', 10, 1),
(19, 13, '16:00', '16:30', 2, 1);

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
(1, 'pay_LlXOhFL1ISZEuk', 'order_LlXO1hu1TYBlP5', 1, '2023-05-04 06:03:00', 3000),
(2, 'pay_LlXPiU16JLYPV9', 'order_LlXPVrP6jn8X32', 2, '2023-05-04 06:04:24', 8800);

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
(1, 'pay_LlXL8UJx7QNGUX', 'order_LlXKtdMQPffvEf', 1, 0, '2023-05-04 06:00:02');

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
(1, 3, 'abdominal_pain', 'chest_pain', '0', '0', '0', 'GERD', '1', '2023-05-04 15:29:02'),
(2, 3, 'swelled_lymph_nodes', 'chest_pain', '0', '0', '0', 'GERD', '1', '2023-05-04 15:29:09'),
(3, 3, 'swelled_lymph_nodes', 'silver_like_dusting', '0', '0', '0', 'GERD', '1', '2023-05-04 15:29:15'),
(4, 3, 'blackheads', 'silver_like_dusting', '0', '0', '0', 'GERD', '1', '2023-05-04 15:29:26'),
(5, 3, 'visual_disturbances', 'rusty_sputum', '0', '0', '0', 'Pneumonia', '1', '2023-05-04 15:29:34'),
(6, 3, 'increased_appetite', 'altered_sensorium', '0', '0', '0', 'Pneumonia', '1', '2023-05-04 15:29:42'),
(7, 3, 'small_dents_in_nails', 'hip_joint_pain', '0', '0', '0', 'Pneumonia', '1', '2023-05-04 15:29:51'),
(8, 3, 'fluid_overload', 'hip_joint_pain', '0', '0', '0', 'Diabetes', '1', '2023-05-04 15:29:56'),
(9, 3, 'fluid_overload', 'hip_joint_pain', '0', '0', '0', 'Diabetes', '1', '2023-05-04 15:29:59'),
(10, 3, 'fluid_overload', 'hip_joint_pain', '0', '0', '0', 'Pneumonia', '1', '2023-05-04 15:30:02'),
(11, 3, 'fluid_overload', 'hip_joint_pain', '0', '0', '0', 'Pneumonia', '1', '2023-05-04 15:30:03'),
(12, 3, 'fluid_overload', 'hip_joint_pain', '0', '0', '0', 'Pneumonia', '1', '2023-05-04 15:30:05'),
(13, 3, 'fluid_overload', 'hip_joint_pain', '0', '0', '0', 'Diabetes', '1', '2023-05-04 15:30:06'),
(14, 3, 'skin_peeling', 'hip_joint_pain', '0', '0', '0', 'Diabetes', '1', '2023-05-04 15:30:11'),
(15, 4, 'blister', 'swelled_lymph_nodes', '0', '0', '0', 'Psoriasis', '1', '2023-05-04 15:30:47'),
(16, 4, 'blister', 'scurring', '0', '0', '0', 'Diabetes', '1', '2023-05-04 15:30:53'),
(17, 4, 'blister', 'blister', '0', '0', '0', 'Pneumonia', '1', '2023-05-04 15:31:00'),
(18, 4, 'mild_fever', 'blister', '0', '0', '0', 'Diabetes', '1', '2023-05-04 15:31:05'),
(19, 4, 'mild_fever', 'blood_in_sputum', '0', '0', '0', 'Tuberculosis', '1', '2023-05-04 15:31:13'),
(20, 4, 'malaise', 'blood_in_sputum', '0', '0', '0', 'Pneumonia', '1', '2023-05-04 15:31:18'),
(21, 4, 'malaise', 'skin_peeling', '0', '0', '0', 'Tuberculosis', '1', '2023-05-04 15:31:23'),
(22, 4, 'sinus_pressure', 'skin_peeling', '0', '0', '0', 'Common Cold', '1', '2023-05-04 15:31:28'),
(23, 4, 'sinus_pressure', 'skin_peeling', '0', '0', '0', 'Tuberculosis', '1', '2023-05-04 15:31:31'),
(24, 4, 'sinus_pressure', 'skin_peeling', '0', '0', '0', 'Diabetes', '1', '2023-05-04 15:31:32'),
(25, 4, 'sinus_pressure', 'skin_peeling', '0', '0', '0', 'Diabetes', '1', '2023-05-04 15:31:35'),
(26, 4, 'sinus_pressure', 'skin_peeling', '0', '0', '0', 'Tuberculosis', '1', '2023-05-04 15:31:36'),
(27, 4, 'sinus_pressure', 'skin_peeling', '0', '0', '0', 'Pneumonia', '1', '2023-05-04 15:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `serv_feedback_tbl`
--

CREATE TABLE `serv_feedback_tbl` (
  `feedback_id` int(11) NOT NULL,
  `appo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `response` varchar(250) NOT NULL,
  `rating` int(5) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 4, '9199098882', 'CHARIVUKALAYIL H&#10;THULAPALLY PO', '686510', '2023-05-04 15:22:27'),
(2, 4, '8281281942', 'thoppil &#10;THULAPALLY PO', '686510', '2023-05-04 15:22:44'),
(3, 6, '0828128194', 'CHARIVUKALAYIL H&#10;THULAPALLY PO', '686510', '2023-05-04 15:47:43');

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
(1, 'Hair oil', '2023-05-04 20:37:29', 1),
(2, 'Lehyam', '2023-05-04 20:37:33', 1),
(3, 'Capsules', '2023-05-04 20:37:44', 1),
(4, 'Eye Drops', '2023-05-04 20:37:50', 1);

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
(1, 3, 1, '2023-05-04 09:33:50', 1, '0000-00-00 00:00:00', 0, 1),
(2, 3, 0, '2023-05-04 09:34:47', 5, '2023-05-11 18:30:00', 5, 1),
(11, 4, 1, '2023-05-04 14:22:47', 1, '2023-09-08 18:30:00', 0, 0),
(20, 4, 1, '2023-05-04 14:49:35', 1, '2023-10-09 18:30:00', 0, 0);

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
(1, 2, 8, 'Dr Hari  ', ' Thoopil Kochi ', 500, 'Baala Chikitsa ', 0),
(2, 2, 9, 'Dr Akhil  ', ' Thottathil ', 1000, 'Urdhvanga Chikitsa ', 0),
(3, 2, 10, 'Kevin ', ' Kandathil', 900, 'Kayachikits', 0),
(4, 2, 11, 'Dr Geya ', ' Kalapura', 800, 'Kayachikits', 0),
(5, 2, 12, 'Dr Aparna ', ' Mullasheri', 600, 'Shalakya Tantra', 0),
(6, 2, 13, 'Dr Jobin ', ' Kandathil', 300, 'Urdhvanga Chikitsa', 0);

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
(1, 1, 'Good\r\n'),
(3, 3, 'Not so good'),
(4, 4, 'Nice'),
(5, 5, 'moderate'),
(6, 5, 'good product'),
(7, 2, 'average'),
(8, 4, 'not bad'),
(9, 3, 'below average'),
(10, 1, 'not too bad');

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
  `status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`lv_id`, `l_id`, `type`, `fdate`, `tdate`, `reason`, `status`) VALUES
(1, 12, ' Casual', '2023-05-27', '2023-05-28', 'family function', 2),
(2, 13, 'Others', '2023-06-08', '2023-06-09', 'Marriage function', 1),
(3, 8, 'Sick', '2023-05-01', '2023-05-01', 'sick', 1),
(4, 11, 'Others', '2023-06-08', '2023-06-09', 'Marriage function', 1),
(5, 10, 'Sick', '2023-05-01', '2023-05-01', 'sick', 1),
(6, 8, 'Sick', '2023-05-01', '2023-05-01', 'sick', 1),
(7, 12, 'Others', '2023-06-08', '2023-06-09', 'Marriage function', 1);

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
(3, 'abitmonrajancr7@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', 'bf1b1e542bbdff335f26d46a3aa5a41d', 1, '', 3, 0),
(4, 'abitmonrajan@mca.ajce.in', '2bbc429b4ea1efbc2c78ff8a9c5403b8', 'a3cce223a6ad269bf439aa58002d28a9', 1, '', 3, 0),
(5, 'aravind@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', 'df94595c37cc7884ab103cb54a1cc312', 1, '', 3, 0),
(6, 'appu@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', 'd63e67c930faab5412b0f2191e6150ed', 1, '', 3, 0),
(7, 'renjith@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '985e90335437acd7dc057a989fcffd25', 1, '', 3, 0),
(8, 'drhari@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '', 1, '', 2, 0),
(9, 'drakhil@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '', 1, '', 2, 0),
(10, 'drkevin@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '', 1, '', 2, 0),
(11, 'drgeya@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '', 1, '', 2, 0),
(12, 'amuu@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '', 1, '', 2, 0),
(13, 'drjobin@gmail.com', '2bbc429b4ea1efbc2c78ff8a9c5403b8', '', 1, '', 2, 0);

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
(1, 1, 2, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 2, 1, 1),
(5, 3, 1, 3);

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
(1, 'foot massage', 'foot-massage,png.jpg', '3000', 0),
(2, 'karnapooranam', 'karnapooranam.png', '800', 0),
(3, 'Thalam', 'Thalam.png', '1400', 0),
(4, 'Nasaya', 'nasya.png', '1300', 0),
(5, 'lepam', 'lepam.png', '900', 0);

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
(1, 3, 'Amal', 3, 'Akkattu', 'Ponkunnam', 'male', '1999-08-29', 'AB+ve', 0),
(2, 4, 'Arun ', 3, 'Vadakara ', ' Pathanamthitta', 'male', '2000-12-20', 'A+', 0),
(3, 5, 'Aravind', 3, 'Akka', 'Peruuthod', 'male', '2000-12-10', 'AB+ve', 0),
(4, 6, 'Appu', 3, 'Palathunkal', 'Kottayam', 'male', '1999-12-19', 'AB-ve', 0),
(5, 7, 'Renjith', 3, 'Koovan', 'Kottayam', 'male', '2002-02-10', 'O+ve', 0);

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
(1, 2, 'Chyavanprash	', 0, 350, 'Chyavanprash.jpeg', 'Boosts Immunity, Strength & Longevity', '2023-05-04 20:38:54', 1),
(2, 3, 'glymin-plus-tablet', 19, 230, 'glymin-plus-tablet-1.jpeg', 'For Blood Sugar Control', '2023-05-04 20:39:28', 1),
(3, 1, 'kesini-oil', 8, 400, 'kesini-oil-1.jpeg', 'Promotes Hair Growth, Increases Hair Volume', '2023-05-04 20:39:59', 1),
(4, 4, 'Eyeconic', 20, 450, '10-1110222-dr-willmar-schwabe-india-original-imagd9skhprbns99.jpeg', 'Good for eye', '2023-05-04 20:40:28', 1),
(5, 2, 'Vyoshadi Vatakam', 4, 900, 'Vyoshadi Vatakam.png', '	For Cough & Throat Irritation', '2023-05-04 20:40:50', 1);

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
(1, 4, 2, 'pay_LldLoMR3aTFh17', 'order_LldLfDSJiPq6dd', 1330, '2023-05-04 15:28:19', 1),
(2, 6, 3, 'pay_LldmEpqoQlEDFG', 'order_Lldly0QXMvzCtx', 350, '2023-05-04 15:53:12', 1),
(3, 6, 3, 'pay_LldqqJRkfsQdPm', 'order_LldqCRkbMn9us6', 400, '2023-05-04 00:21:50', 0);

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
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(27, 11, 1),
(28, 11, 2),
(53, 20, 1),
(54, 20, 2);

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
-- Indexes for table `serv_feedback_tbl`
--
ALTER TABLE `serv_feedback_tbl`
  ADD PRIMARY KEY (`feedback_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `appoinment_tbl`
--
ALTER TABLE `appoinment_tbl`
  MODIFY `appo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `doctor_timing_tbl`
--
ALTER TABLE `doctor_timing_tbl`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment1_tbl`
--
ALTER TABLE `payment1_tbl`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `preditction_anys1_tbl`
--
ALTER TABLE `preditction_anys1_tbl`
  MODIFY `anyls_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `serv_feedback_tbl`
--
ALTER TABLE `serv_feedback_tbl`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bill_address`
--
ALTER TABLE `tbl_bill_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_custom_package`
--
ALTER TABLE `tbl_custom_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `d_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `f_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `lv_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_p1_purchase`
--
ALTER TABLE `tbl_p1_purchase`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_p_purchase`
--
ALTER TABLE `tbl_p_purchase`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_packages`
--
ALTER TABLE `tbl_user_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
