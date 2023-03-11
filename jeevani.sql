-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 05:54 PM
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
-- Database: `db`
--
CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(50) NOT NULL,
  `first name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first name`, `lastname`, `email`, `username`, `password`, `role`, `Age`, `gender`, `address`) VALUES
(8, 'Subin', 'Joseph', 'subin.josephara@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, 23, 'Male', 'Arangathu'),
(9, 'Bibin', 'Joseph', 'bibin.josephara@gmail.com', 'bibin123', '2da0e0aae058a32f35c573a85fb5b799', 3, 25, 'Male', '526'),
(10, 'Jefine', 'Joseph', 'jeff@gmail.com', 'jeff11', '25d55ad283aa400af464c76d713c07ad', 3, 22, 'Male', 'abc'),
(11, 'Bibin', 'Joseph', 'bibin.josephara@gmail.com', 'bibin704', '93f37cdd097a2266a25ebdb1198210b0', 3, 25, 'Male', 'Arangathu'),
(12, 'Bibin', '', 'subin.josephara@gmail.com', 'bibin123', '2da0e0aae058a32f35c573a85fb5b799', 3, 52, 'Male', '526'),
(13, 'jojo', 'jane', 'subin.josephara@gmail.com', 'bibin123', '2da0e0aae058a32f35c573a85fb5b799', 3, 25, 'Male', '526');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Database: `dbconn`
--
CREATE DATABASE IF NOT EXISTS `dbconn` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbconn`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `regid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `imag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`regid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `eye`
--
CREATE DATABASE IF NOT EXISTS `eye` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `eye`;

-- --------------------------------------------------------

--
-- Table structure for table `appoinment_tbl`
--

CREATE TABLE `appoinment_tbl` (
  `appoinment_id` int(10) NOT NULL,
  `time_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `token` varchar(50) NOT NULL,
  `fee_status` tinyint(1) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appoinment_tbl`
--

INSERT INTO `appoinment_tbl` (`appoinment_id`, `time_id`, `user_id`, `date`, `token`, `fee_status`, `status`) VALUES
(38, 15, 39, '2022-11-22', '1', 0, 1),
(39, 13, 42, '2022-11-22', '39', 0, 1),
(40, 13, 36, '2022-11-22', '40', 1, 3),
(41, 6, 36, '2022-11-23', '41', 0, 3),
(42, 6, 42, '2022-11-23', '42', 0, 4),
(43, 15, 42, '2022-11-24', '43', 0, 1),
(44, 6, 34, '2022-11-23', '44', 0, 3),
(45, 15, 48, '2022-11-23', '45', 0, 1),
(46, 13, 36, '2022-11-26', '46', 0, 3),
(47, 6, 36, '2022-11-23', '47', 0, 3),
(48, 6, 36, '2022-11-23', '48', 0, 3),
(49, 6, 36, '2022-11-23', '49', 0, 1),
(50, 11, 49, '2022-11-23', '50', 0, 3),
(51, 6, 49, '2022-11-23', '51', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_timing_tbl`
--

CREATE TABLE `doctor_timing_tbl` (
  `time_id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `visiter_allow_count` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_timing_tbl`
--

INSERT INTO `doctor_timing_tbl` (`time_id`, `userid`, `start`, `end`, `visiter_allow_count`, `status`) VALUES
(6, 41, '09:30:00', '12:00:00', 10, 1),
(11, 43, '13:00:00', '15:00:00', 12, 1),
(13, 41, '14:30:00', '15:00:00', 4, 1),
(14, 35, '09:30:00', '11:30:00', 10, 1),
(15, 40, '10:44:00', '12:44:00', 1, 1);

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
(3, 'Eye Drops', '2022-11-05 00:26:48', 1),
(4, 'Ointments', '2022-11-05 00:39:44', 1),
(7, 'Capsules', '2022-11-18 14:46:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doc`
--

CREATE TABLE `tbl_doc` (
  `doc_id` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `doc_profile` varchar(20) NOT NULL,
  `doc_qua` varchar(20) NOT NULL,
  `doc_exp` varchar(20) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `licence_no` varchar(150) NOT NULL,
  `doc_fee` float NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doc`
--

INSERT INTO `tbl_doc` (`doc_id`, `userid`, `doc_profile`, `doc_qua`, `doc_exp`, `dob`, `licence_no`, `doc_fee`, `status`) VALUES
(13, 41, 'Opthalmology', 'MS,FICO General Oph', '5', '1990-11-16', '01066873A', 300, 1),
(14, 40, 'Opthalmology', 'MBBS,MD', '10', '1989-04-02', '01099873V', 200, 1),
(15, 35, 'Opthalmology', 'MS,Vitreo Retinal ', '10', '1970-07-02', '00299873X', 300, 1),
(16, 43, 'Opthalmology', 'MS,DNB MRCS Glasgow', '7', '1989-08-06', '09045873V', 350, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `leave_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text NOT NULL,
  `days_count` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`leave_id`, `userid`, `start_date`, `end_date`, `reason`, `days_count`, `status`) VALUES
(1, 35, '2022-11-18', '2022-11-18', 'fever', 0, 3),
(2, 35, '2022-11-18', '2022-11-18', 'dfgsfsdfdsf', 0, 1),
(3, 35, '2022-11-19', '2022-11-24', 'dsfsdf', 5, 3),
(4, 41, '2022-11-20', '2022-11-21', 'fever', 1, 0),
(5, 35, '2023-02-28', '2023-03-02', 'feaver ahda', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `log_id` int(100) NOT NULL,
  `user_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `temp_code` varchar(50) DEFAULT NULL,
  `role` int(5) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`log_id`, `user_id`, `username`, `password`, `temp_code`, `role`, `status`) VALUES
(29, 33, 'admin@gmail.com', '3a525502c138ee3d6905368fe69aad08', '34cf866b6a1fba6c889c0fa3f12ebc341', 1, 1),
(30, 34, 'melvin@gmail.com', '3a525502c138ee3d6905368fe69aad08', '34cf866b6a1fba6c889c0fa3f12ebc45', 3, 1),
(31, 35, 'jerrin@gmail.com', '3a525502c138ee3d6905368fe69aad08', '5942992c04d8f9fab447962a10e427f3', 2, 1),
(32, 36, 'neha@gmail.com', '6a1fefa3e327c82e2f1528109ea3b978', '7c36576bc52870efc25e05c2ff7c7759', 3, 1),
(33, 37, 'albin@gmail.com', '3a525502c138ee3d6905368fe69aad08', '1', 3, 0),
(35, 39, 'teny@gmail.com', '3a525502c138ee3d6905368fe69aad08', '24328e226d1181d35941ea1590a13cdb', 3, 1),
(36, 40, 'michal@gmail.com', '3a525502c138ee3d6905368fe69aad08', '1', 2, 0),
(37, 41, 'nevin@gmail.com', '3a525502c138ee3d6905368fe69aad08', '130576be1fd668703b2953b478a5b198', 2, 1),
(38, 42, 'saranya@gmail.com', '3a525502c138ee3d6905368fe69aad08', '1', 3, 1),
(39, 43, 'drsebin@gmail.com', '3a525502c138ee3d6905368fe69aad08', '99ccac67a461ac7637191090958d9022', 2, 1),
(40, 44, 'dralan@gmail.com', '3a525502c138ee3d6905368fe69aad08', 'bb3759a54e8e62465126b87f680e021c', 2, 1),
(41, 45, 'candy@gmail.com', '3a525502c138ee3d6905368fe69aad08', '301fe02aff628d25e12114cfedbe8ae8', 3, 0),
(42, 46, 'drshef@gmail.com', '3a525502c138ee3d6905368fe69aad08', '8f39692d78dcd7aa25d38519519f3214', 2, 1),
(43, 47, 'jeeva@gmail.com', '3a525502c138ee3d6905368fe69aad08', 'dfc0563d399348e7f76f7454168716f7', 2, 0),
(44, 48, 'merlinmoncy7@gmail.com', '3a525502c138ee3d6905368fe69aad08', '341eecc71932a739f55789c235741eac', 3, 1),
(45, 49, 'marvin@gmail.com', '3a525502c138ee3d6905368fe69aad08', '0138335d70d66f7f339949e7cf0682a6', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patient_id` int(50) NOT NULL,
  `userid` int(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bloodgrp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `userid`, `dob`, `gender`, `bloodgrp`) VALUES
(38, 34, '2000-03-15', 'female', 'A+ve'),
(39, 36, '2000-03-01', 'female', 'A+ve'),
(40, 37, '2002-03-07', 'male', 'O+ve'),
(42, 39, '2022-11-11', 'female', 'AB+ve'),
(43, 42, '2022-11-08', 'female', 'A+ve'),
(44, 45, '2022-11-15', 'female', 'O+ve'),
(45, 48, '2000-09-26', 'female', 'AB+ve'),
(46, 49, '1998-06-05', 'male', 'AB+ve');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_details`
--

CREATE TABLE `tbl_payment_details` (
  `payment_id` int(11) NOT NULL,
  `appo_id` int(11) NOT NULL,
  `r_pay_id` varchar(250) NOT NULL,
  `r_order_id` varchar(250) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment_details`
--

INSERT INTO `tbl_payment_details` (`payment_id`, `appo_id`, `r_pay_id`, `r_order_id`, `date`) VALUES
(7, 40, 'pay_Kj1MCrJs7ip4Ru', 'order_Kj1M5iJ4UoOz5s', '2022-11-22 14:07:03');

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
(4, 4, ' bacitracin', 4, 49.5, 'ointment.jpg', 'Bacitracin is a topical antibiotic ointment widely used by both medical professionals and the general public to treat minor skin injuries, including cuts, scrapes, and burns', '2022-11-05 10:18:34', 1),
(5, 3, 'Renu Fresh Solution', 5, 265, 'solution.jpg', 'Renu Fresh is a lens solution that features Hydranate, a component used to improve moisture content in one’s contact lenses.', '2022-11-18 14:40:51', 1),
(6, 7, ' Mojocare Perfect Vision', 5, 824, 'capsule.png', 'Mojocare Perfect Vision is a multivitamin for your eyes. ', '2022-11-18 14:50:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reg`
--

CREATE TABLE `tbl_reg` (
  `userid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `mob` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reg`
--

INSERT INTO `tbl_reg` (`userid`, `name`, `address`, `dist`, `mob`, `email`) VALUES
(33, 'ADMIN', 'cghbvh', 'Alappuzha', '9495693805', 'admin@gmail.com'),
(34, 'Melvin moncy', 'Maliackal', 'Idukki', '7878905611', 'melvin@gmail.com'),
(35, 'Jerrin', 'palakudiyil', 'Malappuram', '9087654321', 'jerrin@gmail.com'),
(36, 'Neha Antony', 'Kunnerthet', 'Ernakulam', '9898785432', 'neha@gmail.com'),
(37, 'AlbinByju', 'parayil', 'Alappuzha', '9090876543', 'albin@gmail.com'),
(39, 'Teny', 'tenyvilla', 'Pathanamthitta', '9701254613', 'teny@gmail.com'),
(40, 'Michal', 'peryil', 'Kollam', '9465465745', 'michal@gmail.com'),
(41, 'Nevin', 'thundiyil', 'Kollam', '9465465745', 'nevin@gmail.com'),
(42, 'Saranya', 'orickal', 'Pathanamthitta', '9465465745', 'saranya@gmail.com'),
(43, 'Sebin', 'chengalath', 'Kollam', '9098909989', 'drsebin@gmail.com'),
(44, 'Alan', 'thoppil', 'Thiruvanathapuram', '9098988484', 'dralan@gmail.com'),
(45, 'Candy', 'thymadath', 'Pathanamthitta', '9465465745', 'candy@gmail.com'),
(46, 'Shefany', 'hilltop', 'Thiruvanathapuram', '9098988796', 'drshef@gmail.com'),
(47, 'Jeeva Jayan', 'kadapara', 'Kottayam', '7789083221', 'jeeva@gmail.com'),
(48, 'Merlin Moncy', 'Maliackal', 'Pathanamthitta', '9495693805', 'merlinmoncy7@gmail.com'),
(49, 'Marvin Moncy', 'Maliackal', 'Pathanamthitta', '9447223805', 'marvin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinment_tbl`
--
ALTER TABLE `appoinment_tbl`
  ADD PRIMARY KEY (`appoinment_id`),
  ADD KEY `appo_time_id_fk` (`time_id`),
  ADD KEY `appo_user_id_fk` (`user_id`);

--
-- Indexes for table `doctor_timing_tbl`
--
ALTER TABLE `doctor_timing_tbl`
  ADD PRIMARY KEY (`time_id`),
  ADD KEY `time_user_id_fk` (`userid`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cata_id`);

--
-- Indexes for table `tbl_doc`
--
ALTER TABLE `tbl_doc`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `doc_user_fk` (`userid`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `leave_userid` (`userid`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `login_user_id_fk` (`user_id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `user_id_fk` (`userid`);

--
-- Indexes for table `tbl_payment_details`
--
ALTER TABLE `tbl_payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_appo_id_fk` (`appo_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `p_cata_id_fk` (`cata_id`);

--
-- Indexes for table `tbl_reg`
--
ALTER TABLE `tbl_reg`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinment_tbl`
--
ALTER TABLE `appoinment_tbl`
  MODIFY `appoinment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `doctor_timing_tbl`
--
ALTER TABLE `doctor_timing_tbl`
  MODIFY `time_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_doc`
--
ALTER TABLE `tbl_doc`
  MODIFY `doc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_payment_details`
--
ALTER TABLE `tbl_payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_reg`
--
ALTER TABLE `tbl_reg`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoinment_tbl`
--
ALTER TABLE `appoinment_tbl`
  ADD CONSTRAINT `appo_time_id_fk` FOREIGN KEY (`time_id`) REFERENCES `doctor_timing_tbl` (`time_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appo_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `tbl_reg` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_timing_tbl`
--
ALTER TABLE `doctor_timing_tbl`
  ADD CONSTRAINT `time_user_id_fk` FOREIGN KEY (`userid`) REFERENCES `tbl_reg` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_doc`
--
ALTER TABLE `tbl_doc`
  ADD CONSTRAINT `doc_user_fk` FOREIGN KEY (`userid`) REFERENCES `tbl_reg` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD CONSTRAINT `leave_userid` FOREIGN KEY (`userid`) REFERENCES `tbl_reg` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `login_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `tbl_reg` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`userid`) REFERENCES `tbl_reg` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payment_details`
--
ALTER TABLE `tbl_payment_details`
  ADD CONSTRAINT `payment_appo_id_fk` FOREIGN KEY (`appo_id`) REFERENCES `appoinment_tbl` (`appoinment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `p_cata_id_fk` FOREIGN KEY (`cata_id`) REFERENCES `tbl_category` (`cata_id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `jeevani`
--
CREATE DATABASE IF NOT EXISTS `jeevani` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jeevani`;

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
(1, 'pay_LGHziW8eDCl8IQ', 'order_LGHzFTEFDFUKcS', 3, '2023-02-14 05:50:06', 25000);

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
(5, 3, 'swelled_lymph_nodes', 'sinus_pressure', '0', '0', '0', 'Drug Reaction', '3', '2023-03-09 06:37:15');

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
(1, 'Hair oil', '2023-02-14 15:08:36', 1),
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
(3, 6, 0, '2023-02-14 10:20:44', 5, '2023-02-17 18:30:00', 6, 1);

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
(1, 1, 'Good ');

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
(7, 3, 2);

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
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `preditction_anys1_tbl`
--
ALTER TABLE `preditction_anys1_tbl`
  MODIFY `anyls_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `d_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `f_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
--
-- Database: `js`
--
CREATE DATABASE IF NOT EXISTS `js` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `js`;
--
-- Database: `ovs`
--
CREATE DATABASE IF NOT EXISTS `ovs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ovs`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidate`
--

CREATE TABLE `tbl_candidate` (
  `user_id` int(50) NOT NULL,
  `login_id` int(40) NOT NULL,
  `first name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `party` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL,
  `proof` varchar(200) NOT NULL,
  `symbol` varchar(200) NOT NULL,
  `nomin` varchar(200) NOT NULL,
  `assets` int(100) NOT NULL,
  `punishment` varchar(50) NOT NULL,
  `postal` int(50) NOT NULL,
  `Status` int(20) NOT NULL,
  `Comments` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_candidate`
--

INSERT INTO `tbl_candidate` (`user_id`, `login_id`, `first name`, `lastname`, `Age`, `contact`, `gender`, `party`, `address`, `img`, `proof`, `symbol`, `nomin`, `assets`, `punishment`, `postal`, `Status`, `Comments`) VALUES
(16, 91, 'Alen', 'Toms', 25, '9985452523', 'Male', 'UDF', 'Palakkad', 'upload/1666755432.jpg', 'upload/rkv1ndf.webp', 'upload/vHV5K9.png', 'upload/tPMgZ.png', 0, '', 0, 2, 'invalid proof'),
(17, 92, 'Albin', 'Joseph', 24, '9965235263', 'Male', 'LDF', 'Kanjirappally', 'upload/1670758420.jpg', 'upload/oudKc04.jpg', 'upload/ST0uQE.png', 'upload/40AE2.jpeg', 0, '', 0, 2, 'invalid proof'),
(18, 93, 'Ashish', 'Sam', 24, '9956252321', 'Male', 'BJP', 'Kayamkulam', 'upload/1666756037.jpg', 'upload/MGWJjjb.jpg', 'upload/LviVvy.jpg', 'upload/KuwJu.png', 0, '', 0, 2, 'invalid proof'),
(19, 94, 'Jerin', 'John', 24, '9952425242', 'Male', 'OTHERS', 'Kottayam', 'upload/1666756158.jpg', 'upload/oR7wj8C.png', 'upload/00giQG.png', 'upload/R1BXo.png', 0, '', 0, 2, 'invalid proof');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatbot`
--

CREATE TABLE `tbl_chatbot` (
  `id` int(10) NOT NULL,
  `queries` varchar(100) NOT NULL,
  `replies` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chatbot`
--

INSERT INTO `tbl_chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'hello', '	hello how can I help you.'),
(2, 'what is your name', 'My name is bot how can I help You'),
(3, 'how can I vote', 'Got to the registration page and register a voter'),
(4, 'candidate registration', 'Candidate can be register by self ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_election`
--

CREATE TABLE `tbl_election` (
  `id` int(11) NOT NULL,
  `cand_reg` int(20) NOT NULL,
  `voter_reg` int(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `year` int(100) NOT NULL,
  `State` varchar(50) NOT NULL,
  `election_status` int(50) NOT NULL,
  `report` int(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id` int(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `role` varchar(50) NOT NULL,
  `Action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`id`, `username`, `role`, `Action`, `date`) VALUES
(2, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 09:03:39'),
(3, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 09:04:02'),
(4, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 09:20:27'),
(5, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 09:43:46'),
(6, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 10:00:24'),
(7, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 10:01:41'),
(8, 'nidhunm@mca.ajce.in', 'Subadmin', 'Login', '2022-10-26 10:03:09'),
(9, 'nidhunm@mca.ajce.in', 'Subadmin', 'Logout', '2022-10-26 10:03:13'),
(10, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-10-26 10:03:24'),
(11, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-10-26 10:03:31'),
(12, 'jefinejoseph@mca.ajce.in', 'Subadmin', 'Login', '2022-10-26 10:03:45'),
(13, 'jefinejoseph@mca.ajce.in', 'Subadmin', 'Logout', '2022-10-26 10:03:48'),
(14, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-10-26 10:05:51'),
(15, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-10-26 10:32:34'),
(16, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 10:32:47'),
(17, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 10:54:45'),
(18, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 10:58:59'),
(19, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 10:59:04'),
(20, 'nidhunm@mca.ajce.in', 'Subadmin', 'Login', '2022-10-26 10:59:21'),
(21, 'nidhunm@mca.ajce.in', 'Subadmin', 'Logout', '2022-10-26 11:00:52'),
(22, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 11:01:59'),
(23, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 11:12:33'),
(24, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 11:25:12'),
(25, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 11:28:18'),
(26, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-10-26 11:28:35'),
(27, 'aljobiju@mca.ajce.in', 'Subadmin', 'Approved voter geyamerin@mca.ajce.in', '2022-10-26 11:30:46'),
(28, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-10-26 11:31:00'),
(29, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-10-26 11:31:08'),
(30, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-10-26 11:31:19'),
(31, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 11:31:34'),
(32, 'admin@ovs.com', 'Admin', 'Approved voter geyamerin@mca.ajce.in', '2022-10-26 11:40:16'),
(33, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 11:40:30'),
(34, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-10-26 11:40:38'),
(35, 'aljobiju@mca.ajce.in', 'Subadmin', 'Approved voter jainyjohn704@gmail.com', '2022-10-26 11:40:46'),
(36, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-10-26 11:40:49'),
(37, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 11:40:53'),
(38, 'admin@ovs.com', 'Admin', 'Approved voter jainyjohn704@gmail.com', '2022-10-26 11:40:57'),
(39, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 11:41:26'),
(40, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-10-26 11:41:40'),
(41, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-10-26 11:43:12'),
(42, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 11:43:15'),
(43, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 11:45:11'),
(44, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-10-26 11:45:17'),
(45, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-10-26 11:51:36'),
(46, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-10-26 11:52:21'),
(47, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-10-26 11:52:31'),
(48, 'jainyjohn704@gmail.com', 'Voter', 'Login', '2022-10-26 11:52:54'),
(49, 'jainyjohn704@gmail.com', 'Voter', 'Logout', '2022-10-26 11:53:34'),
(50, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 11:53:56'),
(51, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 11:56:22'),
(52, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 12:01:22'),
(53, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 12:01:44'),
(54, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 12:03:12'),
(55, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 14:00:53'),
(56, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 14:01:16'),
(57, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 14:09:50'),
(58, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 14:10:49'),
(59, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-10-26 14:11:38'),
(60, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-10-26 14:12:31'),
(61, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-10-26 14:12:34'),
(62, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-10-26 14:13:37'),
(63, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-10-26 14:13:53'),
(64, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-10-26 14:15:24'),
(65, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-10-26 17:29:33'),
(66, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-10-26 17:29:52'),
(67, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 17:29:59'),
(68, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 17:34:11'),
(69, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 17:40:19'),
(70, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 17:40:52'),
(71, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 17:41:05'),
(72, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 17:41:39'),
(73, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 17:41:42'),
(74, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 17:42:22'),
(75, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 20:48:25'),
(76, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 20:48:36'),
(77, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 20:48:39'),
(78, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 21:21:26'),
(79, 'admin@ovs.com', 'Admin', 'Login', '2022-10-26 21:25:19'),
(80, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-26 21:25:56'),
(81, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-27 00:00:14'),
(82, 'admin@ovs.com', 'Admin', 'Login', '2022-10-27 00:00:34'),
(83, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-27 00:04:53'),
(84, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-10-27 00:05:00'),
(85, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-10-27 00:05:38'),
(86, 'admin@ovs.com', 'Admin', 'Login', '2022-10-27 00:05:43'),
(87, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-27 00:05:47'),
(88, 'jerinjohn@mca.ajce.in', 'Candidate', 'Login', '2022-10-27 00:05:57'),
(89, 'jerinjohn@mca.ajce.in', 'Candidate', 'Logout', '2022-10-27 00:06:01'),
(90, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-10-27 00:06:08'),
(91, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-10-27 00:06:14'),
(92, 'nidhunm@mca.ajce.in', 'Subadmin', 'Login', '2022-10-27 00:06:23'),
(93, 'nidhunm@mca.ajce.in', 'Subadmin', 'Approved voter amalbijuthomas@mca.ajce.in', '2022-10-27 00:06:38'),
(94, 'nidhunm@mca.ajce.in', 'Subadmin', 'Logout', '2022-10-27 00:06:43'),
(95, 'admin@ovs.com', 'Admin', 'Login', '2022-10-27 00:06:50'),
(96, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-27 00:07:12'),
(97, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-10-27 00:07:20'),
(98, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-10-27 00:08:03'),
(99, 'admin@ovs.com', 'Admin', 'Login', '2022-10-27 00:09:03'),
(100, 'admin@ovs.com', 'Admin', 'Login', '2022-10-27 00:10:04'),
(101, 'admin@ovs.com', 'Admin', 'Login', '2022-10-27 08:43:23'),
(102, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-27 08:48:05'),
(103, 'admin@ovs.com', 'Admin', 'Login', '2022-10-27 08:48:51'),
(104, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-27 08:51:55'),
(105, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-10-27 08:52:01'),
(106, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-10-27 08:52:27'),
(107, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-10-27 08:53:09'),
(108, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-10-27 08:54:15'),
(109, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-10-27 08:54:20'),
(110, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-10-27 08:56:49'),
(111, 'admin@ovs.com', 'Admin', 'Login', '2022-10-27 08:56:55'),
(112, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-27 08:58:22'),
(113, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-10-27 08:58:33'),
(114, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-10-27 08:58:42'),
(115, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-10-27 08:58:47'),
(116, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-10-27 08:59:05'),
(117, 'antontoms@mca.ajce.in', 'Voter', 'Login', '2022-10-27 08:59:12'),
(118, 'antontoms@mca.ajce.in', 'Voter', 'Logout', '2022-10-27 08:59:38'),
(119, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-10-27 08:59:46'),
(120, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-10-27 09:00:07'),
(121, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-10-27 14:46:42'),
(122, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-10-27 14:48:34'),
(123, 'admin@ovs.com', 'Admin', 'Login', '2022-10-27 14:48:39'),
(124, 'admin@ovs.com', 'Admin', 'Login', '2022-10-27 14:49:17'),
(125, 'admin@ovs.com', 'Admin', 'Login', '2022-10-28 22:41:31'),
(126, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-28 22:41:59'),
(127, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-10-28 22:42:19'),
(128, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-10-28 22:42:28'),
(129, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-10-28 23:29:02'),
(130, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-10-28 23:29:11'),
(131, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-10-29 10:27:00'),
(132, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-10-29 10:27:04'),
(133, 'admin@ovs.com', 'Admin', 'Login', '2022-10-29 11:13:37'),
(134, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-29 11:13:43'),
(135, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 10:35:49'),
(136, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 10:38:35'),
(137, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 10:39:28'),
(138, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 10:39:32'),
(139, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 10:39:41'),
(140, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 10:41:06'),
(141, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 10:41:23'),
(142, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 10:42:10'),
(143, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-10-31 10:42:16'),
(144, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-10-31 10:42:44'),
(145, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 10:42:50'),
(146, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 10:43:26'),
(147, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-10-31 10:43:30'),
(148, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-10-31 10:43:46'),
(149, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 10:46:52'),
(150, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 10:46:58'),
(151, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-10-31 10:47:14'),
(152, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-10-31 10:47:17'),
(153, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 11:34:05'),
(154, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 11:34:30'),
(155, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 11:42:31'),
(156, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 11:42:38'),
(157, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 11:46:12'),
(158, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 11:46:59'),
(159, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-10-31 11:47:12'),
(160, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-10-31 11:48:13'),
(161, 'alentoms1@gmail.com', 'Candidate', 'Login', '2022-10-31 11:48:18'),
(162, 'alentoms1@gmail.com', 'Candidate', 'Logout', '2022-10-31 11:48:20'),
(163, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-10-31 11:48:29'),
(164, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 23:06:36'),
(165, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 23:06:55'),
(166, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 23:09:54'),
(167, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 23:10:29'),
(168, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 23:20:32'),
(169, 'admin@ovs.com', 'Admin', 'Login', '2022-10-31 23:21:36'),
(170, 'admin@ovs.com', 'Admin', 'Logout', '2022-10-31 23:21:39'),
(171, 'admin@ovs.com', 'Admin', 'Login', '2022-11-02 01:09:05'),
(172, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-02 01:09:30'),
(173, 'admin@ovs.com', 'Admin', 'Login', '2022-11-02 01:09:33'),
(174, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-02 01:09:40'),
(175, 'admin@ovs.com', 'Admin', 'Login', '2022-11-02 01:09:48'),
(176, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-02 01:10:09'),
(177, 'admin@ovs.com', 'Admin', 'Login', '2022-11-02 01:10:47'),
(178, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-02 01:10:52'),
(179, 'admin@ovs.com', 'Admin', 'Login', '2022-11-08 19:31:21'),
(180, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-08 19:31:53'),
(181, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-11-08 19:32:03'),
(182, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-11-08 19:32:54'),
(183, 'admin@ovs.com', 'Admin', 'Login', '2022-11-18 18:41:30'),
(184, 'admin@ovs.com', 'Admin', 'Rejected voter amalbijuthomas@mca.ajce.in', '2022-11-18 18:41:42'),
(185, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-18 18:42:54'),
(186, 'admin@ovs.com', 'Admin', 'Login', '2022-11-24 09:23:13'),
(187, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-24 09:24:33'),
(188, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-11-24 09:24:47'),
(189, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-11-24 09:25:19'),
(190, 'alentoms1@gmail.com', 'Candidate', 'Login', '2022-11-24 09:25:33'),
(191, 'alentoms1@gmail.com', 'Candidate', 'Logout', '2022-11-24 09:25:42'),
(192, 'alentoms1@gmail.com', 'Candidate', 'Login', '2022-11-24 09:26:27'),
(193, 'alentoms1@gmail.com', 'Candidate', 'Logout', '2022-11-24 09:27:47'),
(194, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:16:10'),
(195, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:17:24'),
(196, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:19:51'),
(197, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:20:16'),
(198, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 18:25:42'),
(199, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:26:08'),
(200, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 18:26:12'),
(201, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:28:17'),
(202, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 18:28:20'),
(203, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:29:08'),
(204, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 18:29:10'),
(205, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:29:46'),
(206, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 18:30:10'),
(207, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:30:22'),
(208, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 18:30:26'),
(209, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:30:48'),
(210, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 18:30:51'),
(211, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:56:49'),
(212, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 18:56:53'),
(213, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 18:57:15'),
(214, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 19:00:17'),
(215, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 19:00:34'),
(216, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 19:01:37'),
(217, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 19:01:49'),
(218, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 19:10:41'),
(219, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 19:11:02'),
(220, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 19:12:25'),
(221, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 19:12:59'),
(222, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 19:15:43'),
(223, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 19:16:37'),
(224, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 19:17:53'),
(225, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 20:43:30'),
(226, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 20:45:22'),
(227, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 21:03:18'),
(228, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 21:15:53'),
(229, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-29 21:21:54'),
(230, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 21:22:05'),
(231, 'admin@ovs.com', 'Admin', 'Login', '2022-11-29 23:02:57'),
(232, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 08:06:23'),
(233, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 08:19:40'),
(234, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-30 08:28:14'),
(235, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 08:28:20'),
(236, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-30 08:49:01'),
(237, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 08:49:12'),
(238, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-30 08:58:21'),
(239, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 09:01:34'),
(240, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 09:48:24'),
(241, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-30 09:51:43'),
(242, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-11-30 09:51:58'),
(243, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-11-30 10:54:22'),
(245, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 10:55:50'),
(246, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 11:30:48'),
(247, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-30 11:46:34'),
(248, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 11:46:39'),
(249, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-30 14:19:37'),
(250, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 14:21:47'),
(251, 'admin@ovs.com', 'Admin', 'Logout', '2022-11-30 14:21:58'),
(252, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 14:22:02'),
(253, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 18:27:37'),
(254, 'admin@ovs.com', 'Admin', 'Login', '2022-11-30 19:24:12'),
(255, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 09:53:36'),
(256, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 12:53:50'),
(257, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 12:59:46'),
(258, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:05:38'),
(259, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:05:58'),
(260, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:07:10'),
(261, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:07:44'),
(262, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:10:46'),
(263, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:14:53'),
(264, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:16:16'),
(265, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:17:06'),
(266, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:17:14'),
(267, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:17:44'),
(268, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:17:57'),
(269, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:21:12'),
(270, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:21:23'),
(271, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:22:24'),
(272, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:22:30'),
(273, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:23:33'),
(274, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:23:38'),
(275, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:27:02'),
(276, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:27:08'),
(277, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:30:55'),
(278, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:31:11'),
(279, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:31:43'),
(280, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:32:37'),
(281, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:32:45'),
(282, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:33:41'),
(283, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:39:26'),
(284, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:39:35'),
(285, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:39:42'),
(286, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:41:11'),
(287, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:41:28'),
(288, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:42:30'),
(289, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:43:10'),
(290, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:43:17'),
(291, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:45:21'),
(292, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:45:33'),
(293, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:46:10'),
(294, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:46:20'),
(295, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 13:47:02'),
(296, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 13:58:36'),
(297, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 14:00:18'),
(298, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 14:00:26'),
(299, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 14:00:38'),
(300, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 14:04:24'),
(301, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 14:04:34'),
(302, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 14:05:23'),
(303, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 14:05:56'),
(304, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 14:19:04'),
(305, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 14:19:14'),
(306, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 14:51:39'),
(307, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 15:06:12'),
(308, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-01 19:22:17'),
(309, 'admin@ovs.com', 'Admin', 'Login', '2022-12-01 19:22:22'),
(310, 'admin@ovs.com', 'Admin', 'Login', '2022-12-02 09:48:04'),
(311, 'admin@ovs.com', 'Admin', 'Login', '2022-12-02 09:51:17'),
(312, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-02 10:02:05'),
(313, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-02 10:32:48'),
(314, 'admin@ovs.com', 'Admin', 'Login', '2022-12-02 10:33:04'),
(315, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-02 11:23:27'),
(316, 'admin@ovs.com', 'Admin', 'Login', '2022-12-02 11:23:33'),
(317, 'admin@ovs.com', 'Admin', 'Login', '2022-12-03 13:16:25'),
(318, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-03 18:08:24'),
(319, 'admin@ovs.com', 'Admin', 'Login', '2022-12-03 18:08:29'),
(320, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-03 20:48:40'),
(321, 'admin@ovs.com', 'Admin', 'Login', '2022-12-03 20:49:53'),
(322, 'admin@ovs.com', 'Admin', 'Login', '2022-12-04 08:40:08'),
(323, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-04 14:37:48'),
(324, 'admin@ovs.com', 'Admin', 'Login', '2022-12-04 14:38:04'),
(325, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-04 14:39:54'),
(326, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-12-04 14:40:06'),
(327, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-12-04 14:40:26'),
(328, 'admin@ovs.com', 'Admin', 'Login', '2022-12-04 14:40:32'),
(329, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-04 15:31:15'),
(330, 'admin@ovs.com', 'Admin', 'Login', '2022-12-04 15:31:21'),
(331, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-04 17:15:29'),
(332, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-12-04 17:16:31'),
(333, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-12-04 17:16:36'),
(334, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-04 17:16:44'),
(335, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-04 17:18:44'),
(336, 'admin@ovs.com', 'Admin', 'Login', '2022-12-04 17:48:57'),
(337, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-04 17:49:02'),
(338, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-04 17:50:41'),
(339, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-04 18:10:36'),
(340, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-04 20:20:23'),
(341, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-04 21:13:00'),
(342, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-04 21:13:13'),
(343, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-04 21:13:19'),
(344, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-04 21:13:38'),
(345, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-04 21:13:42'),
(346, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-04 21:13:50'),
(347, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-04 21:15:37'),
(348, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-04 21:15:51'),
(349, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-04 21:15:55'),
(350, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-04 21:16:02'),
(351, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-04 22:11:48'),
(353, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-12-04 22:12:14'),
(354, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-12-04 22:12:41'),
(355, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-04 22:12:49'),
(356, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-04 22:16:47'),
(357, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-04 22:17:01'),
(358, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-04 22:17:48'),
(359, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-05 12:53:35'),
(360, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-05 21:34:26'),
(361, 'admin@ovs.com', 'Admin', 'Login', '2022-12-05 21:34:35'),
(362, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-05 21:35:41'),
(363, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-12-05 21:35:48'),
(364, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-12-05 21:36:05'),
(365, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-05 21:36:13'),
(366, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-05 21:48:49'),
(367, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-05 21:48:56'),
(368, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-05 22:04:35'),
(369, 'meenumathew345@gmail.com', 'Voter', 'Login', '2022-12-05 22:04:44'),
(370, 'meenumathew345@gmail.com', 'Voter', 'Logout', '2022-12-05 22:14:48'),
(371, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-12-05 22:14:54'),
(372, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-12-05 22:16:20'),
(373, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-05 22:16:28'),
(374, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-05 22:18:29'),
(375, 'admin@ovs.com', 'Admin', 'Login', '2022-12-07 09:14:48'),
(376, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-07 09:18:22'),
(377, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 09:22:07'),
(378, 'admin@ovs.com', 'Admin', 'Login', '2022-12-07 10:48:24'),
(379, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-07 10:48:47'),
(380, 'admin@ovs.com', 'Admin', 'Login', '2022-12-07 10:48:50'),
(381, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-07 10:49:48'),
(382, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-12-07 10:49:55'),
(383, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 10:50:02'),
(384, 'admin@ovs.com', 'Admin', 'Login', '2022-12-07 10:54:34'),
(385, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-07 10:57:15'),
(386, 'admin@ovs.com', 'Admin', 'Login', '2022-12-07 10:57:19'),
(387, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-07 10:59:05'),
(388, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 10:59:13'),
(389, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 11:06:14'),
(390, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 11:06:17'),
(391, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 11:08:48'),
(392, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 11:08:51'),
(393, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 11:10:53'),
(394, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 11:10:56'),
(395, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 11:11:39'),
(396, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 11:12:49'),
(397, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 11:12:59'),
(398, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 11:13:02'),
(399, 'admin@ovs.com', 'Admin', 'Login', '2022-12-07 11:13:28'),
(400, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-07 11:13:33'),
(401, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 11:14:14'),
(402, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 11:15:18'),
(403, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 11:19:56'),
(404, 'admin@ovs.com', 'Admin', 'Login', '2022-12-07 11:20:38'),
(405, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-07 11:22:09'),
(406, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 11:22:18'),
(407, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 11:37:53'),
(408, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 11:38:08'),
(409, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 11:38:21'),
(410, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 11:38:49'),
(411, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 12:05:35'),
(412, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 12:42:54'),
(413, 'admin@ovs.com', 'Admin', 'Login', '2022-12-07 12:43:03'),
(414, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-07 13:57:42'),
(415, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 13:57:56'),
(416, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 13:58:27'),
(417, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 14:02:09'),
(418, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 14:18:17'),
(419, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 14:20:21'),
(420, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 14:54:57'),
(421, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 15:04:41'),
(422, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 15:13:32'),
(423, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 15:13:41'),
(424, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 15:13:52'),
(425, 'admin@ovs.com', 'Admin', 'Login', '2022-12-07 15:14:01'),
(426, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-07 15:14:25'),
(427, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 15:14:37'),
(428, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 15:37:06'),
(429, 'admin@ovs.com', 'Admin', 'Login', '2022-12-07 15:37:38'),
(430, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-07 15:41:46'),
(431, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 15:41:53'),
(432, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 15:42:16'),
(433, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 21:11:39'),
(434, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-07 21:11:45'),
(435, 'admin@ovs.com', 'Admin', 'Login', '2022-12-07 21:11:52'),
(436, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-07 21:15:39'),
(437, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 21:15:49'),
(438, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 21:17:07'),
(439, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-07 21:17:40'),
(440, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 14:04:58'),
(441, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 14:05:09'),
(442, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-12-08 14:05:18'),
(443, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 14:05:34'),
(444, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 14:05:48'),
(445, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 14:08:44'),
(446, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 14:17:39'),
(447, 'admin@ovs.com', 'Admin', 'Login', '2022-12-08 14:17:46'),
(448, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-08 14:34:01'),
(449, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 14:34:09'),
(450, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 15:22:34'),
(451, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 15:22:46'),
(452, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 15:40:28'),
(453, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 15:40:36'),
(454, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 15:43:33'),
(455, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 15:43:40'),
(456, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 15:46:29'),
(457, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 15:46:38'),
(458, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 18:48:19'),
(459, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 18:57:06'),
(460, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 18:57:13'),
(461, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 18:57:58'),
(462, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 18:58:01'),
(463, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 18:58:33'),
(464, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 18:58:36'),
(465, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 19:00:13'),
(466, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 19:00:17'),
(467, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 19:01:07'),
(468, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 19:01:16'),
(469, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 19:03:11'),
(470, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 19:03:17'),
(471, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 19:11:42'),
(472, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 19:11:50'),
(473, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 20:52:00'),
(474, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-08 20:53:10'),
(475, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-08 21:06:10'),
(476, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-08 21:06:20'),
(477, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-08 21:17:58'),
(478, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-08 21:18:03'),
(479, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-08 21:19:35'),
(480, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-08 21:28:59'),
(481, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-08 21:29:12'),
(482, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-09 09:38:31'),
(483, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-09 09:39:07'),
(484, 'admin@ovs.com', 'Admin', 'Login', '2022-12-09 10:05:24'),
(485, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-09 10:06:32'),
(486, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-09 10:06:47'),
(487, 'admin@ovs.com', 'Admin', 'Login', '2022-12-09 10:08:37'),
(488, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-09 10:11:44'),
(489, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-12-09 10:12:02'),
(490, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-12-09 10:12:08'),
(491, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-09 10:13:06'),
(492, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-09 10:27:33'),
(493, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-09 10:28:23'),
(494, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-09 10:28:27'),
(495, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-09 10:32:06'),
(496, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-09 11:11:03'),
(497, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-09 11:11:14'),
(498, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-09 12:35:02'),
(499, 'admin@ovs.com', 'Admin', 'Login', '2022-12-09 12:35:13'),
(500, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-09 12:39:10'),
(501, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-09 12:39:23'),
(502, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-09 12:51:12'),
(503, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-09 13:38:54'),
(504, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-09 13:42:06'),
(505, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-09 13:49:59'),
(506, 'admin@ovs.com', 'Admin', 'Login', '2022-12-09 13:50:06'),
(507, 'admin@ovs.com', 'Admin', 'Login', '2022-12-09 13:57:06'),
(508, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-09 14:17:18'),
(509, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-09 14:18:34'),
(510, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-09 14:21:22'),
(511, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-09 14:25:47'),
(512, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-09 14:25:56'),
(513, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-09 14:28:30'),
(514, 'admin@ovs.com', 'Admin', 'Login', '2022-12-09 14:28:38'),
(515, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-09 14:28:44'),
(516, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-09 14:28:51'),
(517, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-09 15:18:09'),
(518, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-09 15:18:14'),
(519, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-09 15:19:28'),
(520, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-09 18:59:18'),
(521, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-09 21:24:15'),
(522, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-09 22:14:49'),
(523, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-09 22:14:54'),
(524, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-09 22:15:19'),
(525, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-09 22:15:31'),
(526, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-10 11:27:28'),
(527, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-10 16:57:09'),
(528, 'admin@ovs.com', 'Admin', 'Login', '2022-12-10 20:45:35'),
(529, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-10 20:45:41'),
(530, 'admin@ovs.com', 'Admin', 'Login', '2022-12-10 20:47:40'),
(531, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-10 20:47:44'),
(532, 'admin@ovs.com', 'Admin', 'Login', '2022-12-10 21:14:50'),
(533, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-10 21:15:07'),
(534, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-10 21:56:37'),
(535, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-10 21:56:44'),
(536, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-10 21:57:41'),
(537, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-10 21:57:45'),
(538, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-10 21:57:59'),
(539, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-10 21:58:04'),
(540, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-10 21:59:12'),
(541, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-10 21:59:15'),
(542, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-12-10 21:59:36'),
(543, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-12-10 22:00:11'),
(544, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-10 22:00:20'),
(545, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-10 22:00:29'),
(546, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-12-10 22:02:43'),
(547, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-12-10 22:03:25'),
(548, 'admin@ovs.com', 'Admin', 'Login', '2022-12-10 22:27:22'),
(549, 'admin@ovs.com', 'Admin', 'Login', '2022-12-11 12:14:06'),
(550, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-11 12:15:36'),
(551, 'admin@ovs.com', 'Admin', 'Login', '2022-12-11 12:16:15'),
(552, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-11 12:18:33'),
(553, 'admin@ovs.com', 'Admin', 'Login', '2022-12-11 12:24:37'),
(554, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-11 12:24:52'),
(555, 'admin@ovs.com', 'Admin', 'Login', '2022-12-11 15:39:36'),
(556, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-11 16:02:20'),
(557, 'sherwinsabu@mca.ajce.in', 'Voter', 'Login', '2022-12-11 16:02:40'),
(558, 'sherwinsabu@mca.ajce.in', 'Voter', 'Logout', '2022-12-11 16:02:53'),
(559, 'alen.joseph@mca.ajce.in', 'Voter', 'Login', '2022-12-11 16:03:01'),
(560, 'alen.joseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-11 16:03:06'),
(561, 'amalbijuthomas@mca.ajce.in', 'Voter', 'Login', '2022-12-11 16:03:16'),
(562, 'amalbijuthomas@mca.ajce.in', 'Voter', 'Logout', '2022-12-11 16:03:20'),
(563, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-12-11 16:03:28'),
(564, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-12-11 16:04:23'),
(565, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-12-11 17:03:50'),
(566, 'admin@ovs.com', 'Admin', 'Login', '2022-12-11 17:16:27'),
(567, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-11 17:16:36'),
(568, 'admin@ovs.com', 'Admin', 'Login', '2022-12-11 17:26:11'),
(569, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-11 17:26:48'),
(570, 'admin@ovs.com', 'Admin', 'Login', '2022-12-11 17:47:06'),
(571, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-11 17:54:18'),
(572, 'admin@ovs.com', 'Admin', 'Login', '2022-12-11 19:00:42'),
(573, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-11 19:03:09'),
(574, 'admin@ovs.com', 'Admin', 'Login', '2022-12-11 22:53:13'),
(575, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-11 22:54:36'),
(576, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 09:00:17'),
(577, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-12 09:48:27'),
(578, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 12:17:47'),
(579, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-12 12:17:53'),
(580, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 12:55:01'),
(581, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-12 13:47:29'),
(582, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 14:02:57'),
(583, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 14:05:58'),
(584, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-12 14:07:25'),
(585, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 14:07:53'),
(586, 'jojoarangathu5271@gmail.com', 'Voter', 'Login', '2022-12-12 14:21:58'),
(587, 'jojoarangathu5271@gmail.com', 'Voter', 'Logout', '2022-12-12 14:22:05'),
(588, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 14:22:11'),
(589, 'jojoarangathu5271@gmail.com', 'Voter', 'Login', '2022-12-12 14:46:15'),
(590, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-12 17:11:40'),
(591, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 17:12:02'),
(592, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-12 17:27:10'),
(593, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 17:44:13'),
(594, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-12 17:46:57'),
(595, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 17:51:00'),
(596, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 19:49:36'),
(597, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-12 20:41:18'),
(598, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 20:45:18'),
(599, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 21:14:52'),
(600, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-12 21:54:03'),
(601, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 21:54:28'),
(602, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-12 21:58:26'),
(603, 'admin@ovs.com', 'Admin', 'Login', '2022-12-12 22:11:16'),
(604, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-12 22:11:30'),
(605, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-12 22:11:55'),
(606, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-12 22:12:59'),
(607, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-12 22:13:13'),
(608, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-12 22:14:26'),
(609, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-12 22:14:40'),
(610, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-12 22:16:31'),
(611, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 08:57:34'),
(612, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 08:57:43'),
(613, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 11:59:42'),
(614, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 12:42:26'),
(615, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-13 12:42:49'),
(616, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-13 12:43:07'),
(617, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 12:50:01'),
(618, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 12:53:52'),
(619, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 14:11:11'),
(620, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 14:12:32'),
(621, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-13 14:15:29'),
(622, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-13 14:17:25'),
(623, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-13 14:17:41'),
(624, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-13 14:17:44'),
(625, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-12-13 14:17:51'),
(626, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-12-13 14:17:59'),
(627, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 14:19:33'),
(628, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 14:42:02'),
(629, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 14:42:06'),
(630, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 14:42:09'),
(631, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-12-13 14:42:16'),
(632, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-12-13 14:43:06'),
(633, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-12-13 14:43:22'),
(634, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-12-13 14:47:24'),
(635, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-12-13 14:48:32'),
(636, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-12-13 14:48:35'),
(637, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-12-13 14:48:47'),
(638, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-12-13 14:48:49'),
(639, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 14:48:57'),
(640, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 14:52:39'),
(641, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 14:56:19'),
(642, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 15:43:58'),
(643, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 15:44:49'),
(644, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 15:44:59'),
(645, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 15:45:32'),
(646, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 15:54:17'),
(647, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 15:54:38'),
(648, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 18:42:16'),
(649, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 19:01:29'),
(650, 'aljobiju@mca.ajce.in', 'Subadmin', 'Login', '2022-12-13 19:01:39'),
(651, 'aljobiju@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-13 19:07:53'),
(652, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 19:08:02'),
(653, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 21:10:32'),
(654, 'admin@ovs.com', 'Admin', 'Login', '2022-12-13 21:12:52'),
(655, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-13 21:30:45'),
(656, 'alen.joseph@mca.ajce.in', 'Voter', 'Login', '2022-12-13 21:32:09'),
(657, 'alen.joseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-13 21:32:22'),
(658, 'alen.joseph@mca.ajce.in', 'Voter', 'Login', '2022-12-13 21:41:22'),
(659, 'alen.joseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-13 21:41:31'),
(660, 'admin@ovs.com', 'Admin', 'Login', '2022-12-14 09:00:05'),
(661, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-14 09:25:08'),
(662, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-14 09:25:30'),
(663, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-14 09:27:11'),
(664, 'jerinjohn@mca.ajce.in', 'Candidate', 'Login', '2022-12-14 09:27:44'),
(665, 'jerinjohn@mca.ajce.in', 'Candidate', 'Logout', '2022-12-14 09:28:53'),
(666, 'admin@ovs.com', 'Admin', 'Login', '2022-12-14 09:31:28'),
(667, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-14 10:01:33'),
(668, 'admin@ovs.com', 'Admin', 'Login', '2022-12-14 10:25:47'),
(669, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-14 11:02:29'),
(670, 'admin@ovs.com', 'Admin', 'Login', '2022-12-14 11:02:45'),
(671, 'admin@ovs.com', 'Admin', 'Login', '2022-12-14 11:02:52'),
(672, 'admin@ovs.com', 'Admin', 'Login', '2022-12-14 12:21:07'),
(673, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-14 12:22:52'),
(674, 'admin@ovs.com', 'Admin', 'Login', '2022-12-14 13:57:40'),
(675, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-14 13:58:01'),
(676, 'admin@ovs.com', 'Admin', 'Login', '2022-12-14 14:02:56'),
(677, 'admin@ovs.com', 'Admin', 'Login', '2022-12-15 09:01:47'),
(678, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-15 11:47:23'),
(679, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-15 11:47:44'),
(680, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-15 11:51:16'),
(681, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-15 11:51:31'),
(682, 'agnesbenny@mca.ajce.in', 'Voter', 'Login', '2022-12-15 11:53:01'),
(683, 'agnesbenny@mca.ajce.in', 'Voter', 'Logout', '2022-12-15 11:53:20'),
(684, 'alen.joseph@mca.ajce.in', 'Voter', 'Login', '2022-12-15 11:53:49'),
(685, 'alen.joseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-15 11:54:50'),
(686, 'antontoms@mca.ajce.in', 'Voter', 'Login', '2022-12-15 11:55:22'),
(687, 'antontoms@mca.ajce.in', 'Voter', 'Logout', '2022-12-15 11:55:34'),
(688, 'amalbijuthomas@mca.ajce.in', 'Voter', 'Login', '2022-12-15 11:57:10'),
(689, 'amalbijuthomas@mca.ajce.in', 'Voter', 'Logout', '2022-12-15 11:57:26'),
(690, 'amalbijuthomas@mca.ajce.in', 'Voter', 'Login', '2022-12-15 12:07:54'),
(691, 'amalbijuthomas@mca.ajce.in', 'Voter', 'Logout', '2022-12-15 12:08:25'),
(692, 'amalbijuthomas@mca.ajce.in', 'Voter', 'Login', '2022-12-15 12:09:31'),
(693, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-15 18:54:51'),
(694, 'admin@ovs.com', 'Admin', 'Login', '2022-12-15 18:57:09'),
(695, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-15 18:58:27'),
(696, 'admin@ovs.com', 'Admin', 'Login', '2022-12-15 18:58:46'),
(697, 'amalbijuthomas@mca.ajce.in', 'Voter', 'Logout', '2022-12-15 18:59:42'),
(698, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-15 19:47:25'),
(699, 'admin@ovs.com', 'Admin', 'Login', '2022-12-15 19:47:47'),
(700, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-15 19:50:48'),
(701, 'alen.joseph@mca.ajce.in', 'Voter', 'Login', '2022-12-15 19:54:34'),
(702, 'alen.joseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-15 19:54:50'),
(703, 'alen.joseph@mca.ajce.in', 'Voter', 'Login', '2022-12-15 19:56:22'),
(704, 'alen.joseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-15 20:01:12'),
(705, 'alen.joseph@mca.ajce.in', 'Voter', 'Login', '2022-12-15 20:01:24'),
(706, 'alen.joseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-15 20:01:37'),
(707, 'admin@ovs.com', 'Admin', 'Login', '2022-12-15 20:01:49'),
(708, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-15 22:04:47'),
(709, 'admin@ovs.com', 'Admin', 'Login', '2022-12-15 22:04:53'),
(710, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-15 22:06:33'),
(711, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-12-15 22:06:43'),
(712, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-12-15 22:23:08'),
(713, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-12-16 12:20:52'),
(714, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-12-16 12:20:57'),
(715, 'albinandrews@mca.ajce.in', 'Candidate', 'Login', '2022-12-16 12:25:34'),
(716, 'albinandrews@mca.ajce.in', 'Candidate', 'Logout', '2022-12-16 12:26:13'),
(717, 'admin@ovs.com', 'Admin', 'Login', '2022-12-16 12:26:22'),
(718, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-16 12:43:44'),
(719, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 12:44:03'),
(720, 'amalbijuthomas@mca.ajce.in', 'Voter', 'Login', '2022-12-16 12:44:48'),
(721, 'amalbijuthomas@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 12:45:00'),
(722, 'alen.joseph@mca.ajce.in', 'Voter', 'Login', '2022-12-16 12:45:16'),
(723, 'alen.joseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 12:45:27'),
(724, 'antontoms@mca.ajce.in', 'Voter', 'Login', '2022-12-16 12:45:47'),
(725, 'antontoms@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 12:45:55'),
(726, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-16 12:46:05'),
(727, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 12:46:22'),
(728, 'sherwinsabu@mca.ajce.in', 'Voter', 'Login', '2022-12-16 12:47:10'),
(729, 'sherwinsabu@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 12:47:20'),
(730, 'admin@ovs.com', 'Admin', 'Login', '2022-12-16 13:58:00'),
(731, 'admin@ovs.com', 'Admin', 'Login', '2022-12-16 14:25:18'),
(732, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-16 14:34:08'),
(733, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-16 14:34:20'),
(734, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 14:35:18'),
(735, 'admin@ovs.com', 'Admin', 'Login', '2022-12-16 14:36:31');
INSERT INTO `tbl_history` (`id`, `username`, `role`, `Action`, `date`) VALUES
(736, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-16 14:38:16'),
(737, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 14:39:04'),
(738, 'alen.joseph@mca.ajce.in', 'Voter', 'Login', '2022-12-16 14:39:10'),
(739, 'alen.joseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 14:39:24'),
(740, 'alen.joseph@mca.ajce.in', 'Voter', 'Login', '2022-12-16 14:40:23'),
(741, 'alen.joseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 14:40:44'),
(742, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-16 14:41:27'),
(743, 'geyamerin@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 14:42:52'),
(744, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-16 14:44:05'),
(745, 'nidhunm@mca.ajce.in', 'Subadmin', 'Login', '2022-12-16 14:44:13'),
(746, 'nidhunm@mca.ajce.in', 'Subadmin', 'Logout', '2022-12-16 14:45:04'),
(747, 'admin@ovs.com', 'Admin', 'Login', '2022-12-16 18:36:49'),
(748, 'geyamerin@mca.ajce.in', 'Voter', 'Login', '2022-12-16 18:37:23'),
(749, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-16 18:54:31'),
(750, 'alen.joseph@mca.ajce.in', 'Voter', 'Login', '2022-12-16 18:54:39'),
(751, 'alen.joseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 19:12:28'),
(752, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-16 19:12:55'),
(753, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-16 19:16:36'),
(754, 'leojoseph@mca.ajce.in', 'Voter', 'Login', '2022-12-17 12:02:59'),
(755, 'leojoseph@mca.ajce.in', 'Voter', 'Logout', '2022-12-17 12:03:07'),
(756, 'admin@ovs.com', 'Admin', 'Login', '2022-12-19 09:09:45'),
(757, 'admin@ovs.com', 'Admin', 'Logout', '2022-12-19 09:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `name`, `email`, `password`, `role`, `code`, `Status`) VALUES
(3, 'Subin', 'admin@ovs.com', 'e3afed0047b08059d0fada10f400c1e5', 'Admin', '63ef5e1d5c68aac5f88bb1ca8c7da317', 1),
(91, 'Alen', 'alentoms1@gmail.com', '8dd43ae0638e1ce2690e2e3cfa653923', 'Candidate', '', 1),
(92, 'Albin', 'albinandrews@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Candidate', '', 1),
(93, 'Ashish', 'ashishsamtgeorge@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Candidate', '', 1),
(94, 'Jerin', 'jerinjohn@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Candidate', '', 1),
(95, 'Nidhun', 'nidhunm@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Subadmin', '', 1),
(96, 'Aljo', 'aljobiju@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Subadmin', '', 1),
(97, 'Jefine', 'jefinejoseph@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Subadmin', '', 1),
(98, 'Amal', 'amalbijuthomas@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Voter', '', 1),
(99, 'Agnes', 'agnesbenny@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Voter', 'b263679ec85d1746d02a4fe84bc069a1', 1),
(100, 'Leo', 'leojoseph@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Voter', '', 1),
(101, 'Alen', 'alen.joseph@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Voter', '', 1),
(102, 'Geya', 'geyamerin@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Voter', '', 1),
(103, 'Anton', 'antontoms@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Voter', '', 1),
(104, 'Sherwin', 'sherwinsabu@mca.ajce.in', '8dd43ae0638e1ce2690e2e3cfa653923', 'Voter', '', 1),
(105, 'Jainy', 'jainyjohn704@gmail.com', '8dd43ae0638e1ce2690e2e3cfa653923', 'Voter', '', 1),
(106, 'Meenu', 'meenumathew345@gmail.com', '8dd43ae0638e1ce2690e2e3cfa653923', 'Voter', '', 1),
(107, 'KV', 'josephsubin2000@gmail.com', '8dd43ae0638e1ce2690e2e3cfa653923', 'Subadmin', 'ca49f0252b2e5d311e130c821836c108', 1),
(119, 'joji', 'redromeo@gmail.com', '6f818f2b03febdf5e91567a7bec03293', 'Subadmin', 'de5076f590c93b78f7a1689f30b7ecba', 1),
(121, 'josh', 'jd4205742@gmail.com', '75a529b0096cfcb5a56106756ad04286', 'Subadmin', '687481a2071f7eea9d456340bfa700eb', 1),
(128, 'Joji', 'jojoarangathu5271@gmail.com', '8dd43ae0638e1ce2690e2e3cfa653923', 'Voter', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notify`
--

CREATE TABLE `tbl_notify` (
  `id` int(50) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notify`
--

INSERT INTO `tbl_notify` (`id`, `text`) VALUES
(1, 'The Election Commission of India is an autonomous constitutional authority responsible for administering election processes in India. The body administers elections to the Lok Sabha, Rajya Sabha, State Legislative Assemblies in India, and the offices of the President and Vice President in the country. The Election Commission operates under the authority of Constitution per Article 324, and subsequently enacted Representation of the People Act');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_previous`
--

CREATE TABLE `tbl_previous` (
  `id` int(10) NOT NULL,
  `commenced_date` date NOT NULL,
  `total_candidates` int(50) NOT NULL,
  `voted_voters` int(50) NOT NULL,
  `unvoted_voters` int(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Year` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_previous`
--

INSERT INTO `tbl_previous` (`id`, `commenced_date`, `total_candidates`, `voted_voters`, `unvoted_voters`, `type`, `State`, `Year`) VALUES
(7, '2022-12-15', 4, 5, 4, 'Regular', 'Tamil Nadu', 2022),
(8, '2022-12-16', 4, 5, 4, 'Regular', 'Kerala', 2024),
(10, '2022-12-16', 4, 0, 9, 'Regular', 'Gujarat', 2025),
(11, '2022-12-16', 4, 0, 9, 'Regular', 'Gujarat', 2025),
(12, '2022-12-16', 4, 0, 9, 'Regular', 'Gujarat', 2025),
(13, '2022-12-16', 4, 0, 9, 'Regular', 'Gujarat', 2025),
(14, '2022-12-16', 4, 0, 9, 'Regular', 'Gujarat', 2025),
(15, '2022-12-16', 4, 0, 9, 'Regular', 'Gujarat', 2025),
(16, '2022-12-16', 4, 1, 8, 'Regular', 'Tamil Nadu', 2030);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prev_res`
--

CREATE TABLE `tbl_prev_res` (
  `id` int(10) NOT NULL DEFAULT 0,
  `Photo` varchar(200) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Age` int(20) NOT NULL,
  `Party` varchar(50) NOT NULL,
  `Symbol` varchar(200) NOT NULL,
  `Vote_count` int(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `year` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prev_res`
--

INSERT INTO `tbl_prev_res` (`id`, `Photo`, `Name`, `Age`, `Party`, `Symbol`, `Vote_count`, `state`, `year`) VALUES
(1, 'upload/1666755432.jpg', 'Alen Toms', 25, 'UDF', 'upload/vHV5K9.png', 1, 'Tamil Nadu', 2022),
(2, 'upload/1670758420.jpg', 'Albin Joseph', 24, 'LDF', 'upload/ST0uQE.png', 2, 'Tamil Nadu', 2022),
(3, 'upload/1666756037.jpg', 'Ashish Sam', 24, 'BJP', 'upload/LviVvy.jpg', 2, 'Tamil Nadu', 2022),
(4, 'upload/1666756158.jpg', 'Jerin John', 24, 'OTHERS', 'upload/00giQG.png', 2, 'Tamil Nadu', 2022),
(1, 'upload/1666755432.jpg', 'Alen Toms', 25, 'UDF', 'upload/vHV5K9.png', 2, 'Kerala', 2024),
(2, 'upload/1670758420.jpg', 'Albin Joseph', 24, 'LDF', 'upload/ST0uQE.png', 4, 'Kerala', 2024),
(3, 'upload/1666756037.jpg', 'Ashish Sam', 24, 'BJP', 'upload/LviVvy.jpg', 3, 'Kerala', 2024),
(4, 'upload/1666756158.jpg', 'Jerin John', 24, 'OTHERS', 'upload/00giQG.png', 3, 'Kerala', 2024),
(1, 'upload/1666755432.jpg', 'Alen Toms', 25, 'UDF', 'upload/vHV5K9.png', 2, 'Gujarat', 2025),
(2, 'upload/1670758420.jpg', 'Albin Joseph', 24, 'LDF', 'upload/ST0uQE.png', 4, 'Gujarat', 2025),
(3, 'upload/1666756037.jpg', 'Ashish Sam', 24, 'BJP', 'upload/LviVvy.jpg', 3, 'Gujarat', 2025),
(4, 'upload/1666756158.jpg', 'Jerin John', 24, 'OTHERS', 'upload/00giQG.png', 3, 'Gujarat', 2025),
(1, 'upload/1666755432.jpg', 'Alen Toms', 25, 'UDF', 'upload/vHV5K9.png', 2, 'Gujarat', 2025),
(2, 'upload/1670758420.jpg', 'Albin Joseph', 24, 'LDF', 'upload/ST0uQE.png', 4, 'Gujarat', 2025),
(3, 'upload/1666756037.jpg', 'Ashish Sam', 24, 'BJP', 'upload/LviVvy.jpg', 3, 'Gujarat', 2025),
(4, 'upload/1666756158.jpg', 'Jerin John', 24, 'OTHERS', 'upload/00giQG.png', 3, 'Gujarat', 2025),
(1, 'upload/1666755432.jpg', 'Alen Toms', 25, 'UDF', 'upload/vHV5K9.png', 2, 'Gujarat', 2025),
(2, 'upload/1670758420.jpg', 'Albin Joseph', 24, 'LDF', 'upload/ST0uQE.png', 4, 'Gujarat', 2025),
(3, 'upload/1666756037.jpg', 'Ashish Sam', 24, 'BJP', 'upload/LviVvy.jpg', 3, 'Gujarat', 2025),
(4, 'upload/1666756158.jpg', 'Jerin John', 24, 'OTHERS', 'upload/00giQG.png', 3, 'Gujarat', 2025),
(1, 'upload/1666755432.jpg', 'Alen Toms', 25, 'UDF', 'upload/vHV5K9.png', 2, 'Gujarat', 2025),
(2, 'upload/1670758420.jpg', 'Albin Joseph', 24, 'LDF', 'upload/ST0uQE.png', 4, 'Gujarat', 2025),
(3, 'upload/1666756037.jpg', 'Ashish Sam', 24, 'BJP', 'upload/LviVvy.jpg', 3, 'Gujarat', 2025),
(4, 'upload/1666756158.jpg', 'Jerin John', 24, 'OTHERS', 'upload/00giQG.png', 3, 'Gujarat', 2025),
(1, 'upload/1666755432.jpg', 'Alen Toms', 25, 'UDF', 'upload/vHV5K9.png', 2, 'Gujarat', 2025),
(2, 'upload/1670758420.jpg', 'Albin Joseph', 24, 'LDF', 'upload/ST0uQE.png', 4, 'Gujarat', 2025),
(3, 'upload/1666756037.jpg', 'Ashish Sam', 24, 'BJP', 'upload/LviVvy.jpg', 3, 'Gujarat', 2025),
(4, 'upload/1666756158.jpg', 'Jerin John', 24, 'OTHERS', 'upload/00giQG.png', 3, 'Gujarat', 2025),
(1, 'upload/1666755432.jpg', 'Alen Toms', 25, 'UDF', 'upload/vHV5K9.png', 2, 'Gujarat', 2025),
(2, 'upload/1670758420.jpg', 'Albin Joseph', 24, 'LDF', 'upload/ST0uQE.png', 4, 'Gujarat', 2025),
(3, 'upload/1666756037.jpg', 'Ashish Sam', 24, 'BJP', 'upload/LviVvy.jpg', 3, 'Gujarat', 2025),
(4, 'upload/1666756158.jpg', 'Jerin John', 24, 'OTHERS', 'upload/00giQG.png', 3, 'Gujarat', 2025),
(1, 'upload/1666755432.jpg', 'Alen Toms', 25, 'UDF', 'upload/vHV5K9.png', 2, 'Gujarat', 2025),
(2, 'upload/1670758420.jpg', 'Albin Joseph', 24, 'LDF', 'upload/ST0uQE.png', 4, 'Gujarat', 2025),
(3, 'upload/1666756037.jpg', 'Ashish Sam', 24, 'BJP', 'upload/LviVvy.jpg', 3, 'Gujarat', 2025),
(4, 'upload/1666756158.jpg', 'Jerin John', 24, 'OTHERS', 'upload/00giQG.png', 3, 'Gujarat', 2025),
(1, 'upload/1666755432.jpg', 'Alen Toms', 25, 'UDF', 'upload/vHV5K9.png', 2, 'Tamil Nadu', 2030),
(2, 'upload/1670758420.jpg', 'Albin Joseph', 24, 'LDF', 'upload/ST0uQE.png', 5, 'Tamil Nadu', 2030),
(3, 'upload/1666756037.jpg', 'Ashish Sam', 24, 'BJP', 'upload/LviVvy.jpg', 3, 'Tamil Nadu', 2030),
(4, 'upload/1666756158.jpg', 'Jerin John', 24, 'OTHERS', 'upload/00giQG.png', 3, 'Tamil Nadu', 2030);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `id` int(10) NOT NULL,
  `Photo` varchar(200) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Age` int(20) NOT NULL,
  `Party` varchar(50) NOT NULL,
  `Symbol` varchar(200) NOT NULL,
  `Vote_count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`id`, `Photo`, `Name`, `Age`, `Party`, `Symbol`, `Vote_count`) VALUES
(1, 'upload/1666755432.jpg', 'Alen Toms', 25, 'UDF', 'upload/vHV5K9.png', 2),
(2, 'upload/1670758420.jpg', 'Albin Joseph', 24, 'LDF', 'upload/ST0uQE.png', 5),
(3, 'upload/1666756037.jpg', 'Ashish Sam', 24, 'BJP', 'upload/LviVvy.jpg', 3),
(4, 'upload/1666756158.jpg', 'Jerin John', 24, 'OTHERS', 'upload/00giQG.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(50) NOT NULL,
  `login_id` int(40) NOT NULL,
  `first name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL,
  `Status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `login_id`, `first name`, `lastname`, `contact`, `gender`, `area`, `img`, `Status`) VALUES
(1, 3, 'Subin', 'Joseph', '9947059704', 'Male', 'Head', 'upload/1663835087.jpg', 3),
(27, 95, 'Nidhun', 'M', '9952524252', 'Male', 'Kattappana', 'upload/1666757463.jpg', 1),
(28, 96, 'Aljo', 'Biju', '8854254212', 'Male', 'Nedumkandam', 'upload/1666757539.jpg', 1),
(29, 97, 'Jefine', 'Joseph', '9985625124', 'Male', 'Munnar', 'upload/1666757602.jpg', 1),
(30, 107, 'KV', 'Devassay', '9985242512', 'Male', 'Kongad', 'upload/1666799571.jpg', 1),
(42, 119, 'joji', 'john', '88555525252', 'Male', 'qwertyu', 'upload/1670082219.jpg', 1),
(43, 121, 'josh', 'jain', '5524125252', 'Male', 'ugfujyfujfuyyf', 'upload/1670761282.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voters`
--

CREATE TABLE `tbl_voters` (
  `user_id` int(50) NOT NULL,
  `login_id` int(40) NOT NULL,
  `first name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `postal` int(50) NOT NULL,
  `img` varchar(200) NOT NULL,
  `proof` varchar(200) NOT NULL,
  `Status` int(20) NOT NULL,
  `Comments` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_voters`
--

INSERT INTO `tbl_voters` (`user_id`, `login_id`, `first name`, `lastname`, `Age`, `contact`, `gender`, `area`, `postal`, `img`, `proof`, `Status`, `Comments`) VALUES
(8, 98, 'Amal', 'Biju', 24, '9955252124', 'Male', 'Nedumkandam', 689556, 'upload/1666757779.jpg', 'upload/aJcwTQg.jpg', 2, ''),
(9, 99, 'Agnes', 'Benny', 23, '9952632585', 'Female', 'Nedumkandam', 689556, 'upload/1666841078.jpg', 'upload/yMuX6lQ.jpg', 2, ''),
(10, 100, 'Leo', 'Joseph', 24, '9985425124', 'Male', 'Nedumkandam', 689556, 'upload/1670507153.jpg', 'upload/OZZjJ0H.png', 5, ''),
(11, 101, 'Alen', 'Joseph', 24, '9952421523', 'Male', 'Nedumkandam', 689556, 'upload/1666758098.jpg', 'upload/h8FzJm3.png', 2, ''),
(12, 102, 'Geya', 'Merin', 24, '9952421526', 'Female', 'Nedumkandam', 689556, 'upload/1666764779.jpg', 'upload/IRAUthf.jpg', 2, ''),
(13, 103, 'Anton', 'Toms', 24, '9952421524', 'Male', 'Nedumkandam', 689556, 'upload/1666758258.jpg', 'upload/A5xxRKd.jpg', 2, ''),
(14, 104, 'Sherwin', 'Sabu', 23, '9985242152', 'Male', 'Nedumkandam', 689556, 'upload/1666758344.jpg', 'upload/1EEw9HP.jpg', 2, ''),
(15, 105, 'Jainy', 'John', 21, '6652124252', 'Female', 'Nedumkandam', 689556, 'upload/1666758498.jpg', 'upload/eNH5TkR.png', 2, ''),
(16, 106, 'Meenu', 'Mathew', 24, '9952421521', 'Female', 'Nedumkandam', 689556, 'upload/1666758602.jpg', 'upload/r474qoF.jpg', 2, ''),
(17, 128, 'Joji', 'John', 1993, '9958523652', 'Male', 'Kottayam', 685551, 'upload/1670834944.jpg', 'upload/AOFzJK7.jpg', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_votes`
--

CREATE TABLE `tbl_votes` (
  `id` int(50) NOT NULL,
  `vote` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_votes`
--

INSERT INTO `tbl_votes` (`id`, `vote`) VALUES
(1, '227a13e57a80620601fa8ad316c146bd'),
(2, 'c6e9478ff746d5f21c95922318047210'),
(3, '24c1069fec25e103a31d0f6f2698c642'),
(4, 'bac1fd5d02d4def9c156cee965f7a718'),
(5, 'c6e9478ff746d5f21c95922318047210'),
(6, '227a13e57a80620601fa8ad316c146bd'),
(7, 'bac1fd5d02d4def9c156cee965f7a718'),
(8, 'bac1fd5d02d4def9c156cee965f7a718'),
(9, '24c1069fec25e103a31d0f6f2698c642'),
(10, '227a13e57a80620601fa8ad316c146bd'),
(11, 'c6e9478ff746d5f21c95922318047210'),
(12, 'bac1fd5d02d4def9c156cee965f7a718'),
(13, 'bac1fd5d02d4def9c156cee965f7a718');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_login` (`login_id`);

--
-- Indexes for table `tbl_chatbot`
--
ALTER TABLE `tbl_chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_election`
--
ALTER TABLE `tbl_election`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notify`
--
ALTER TABLE `tbl_notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_previous`
--
ALTER TABLE `tbl_previous`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_admin` (`login_id`);

--
-- Indexes for table `tbl_voters`
--
ALTER TABLE `tbl_voters`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `login_fk` (`login_id`);

--
-- Indexes for table `tbl_votes`
--
ALTER TABLE `tbl_votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_chatbot`
--
ALTER TABLE `tbl_chatbot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_election`
--
ALTER TABLE `tbl_election`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=758;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `tbl_notify`
--
ALTER TABLE `tbl_notify`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_previous`
--
ALTER TABLE `tbl_previous`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_voters`
--
ALTER TABLE `tbl_voters`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_votes`
--
ALTER TABLE `tbl_votes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_candidate`
--
ALTER TABLE `tbl_candidate`
  ADD CONSTRAINT `fk_login` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`id`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`id`);

--
-- Constraints for table `tbl_voters`
--
ALTER TABLE `tbl_voters`
  ADD CONSTRAINT `login_fk` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`id`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"jeevani\",\"table\":\"tbl_login\"},{\"db\":\"jeevani\",\"table\":\"tbl_patient\"},{\"db\":\"jeevani\",\"table\":\"tbl_doctor\"},{\"db\":\"jeevani\",\"table\":\"tbl_leave\"},{\"db\":\"jeevani\",\"table\":\"tbl_feedback\"},{\"db\":\"jeevani\",\"table\":\"tbl_c_packages\"},{\"db\":\"jeevani\",\"table\":\"tbl_appointment\"},{\"db\":\"jeevani\",\"table\":\"tbl_schedule\"},{\"db\":\"jeevani\",\"table\":\"doctor_timing_tbl\"},{\"db\":\"jeevani\",\"table\":\"appoinment_tbl\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-10-25 16:14:15', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":243}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `python_demo`
--
CREATE DATABASE IF NOT EXISTS `python_demo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `python_demo`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('[abit]', '[value2]');
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `test1`
--
CREATE DATABASE IF NOT EXISTS `test1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test1`;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `R_ID` int(2) NOT NULL,
  `NAME` varchar(40) NOT NULL,
  `MOB` varchar(20) NOT NULL,
  `EMAIL` varchar(20) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
