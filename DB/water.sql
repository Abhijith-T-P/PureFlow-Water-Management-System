-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 11:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `water`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `admin_email` varchar(35) NOT NULL,
  `admin_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'root', 'root@gmail.com', 'root'),
(4, 'admin', 'admin@mail.com', 'root'),
(5, 'abhi', 'abhi@mail.com', 'wasd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alert`
--

CREATE TABLE `tbl_alert` (
  `alert_id` int(11) NOT NULL,
  `alert_date` date NOT NULL DEFAULT current_timestamp(),
  `alert_time` varchar(8) NOT NULL DEFAULT current_timestamp(),
  `alert_note` varchar(100) NOT NULL,
  `alert_status` int(1) NOT NULL DEFAULT 0,
  `operator_id` int(11) NOT NULL,
  `expected_start_date` date NOT NULL,
  `expected_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_alert`
--

INSERT INTO `tbl_alert` (`alert_id`, `alert_date`, `alert_time`, `alert_note`, `alert_status`, `operator_id`, `expected_start_date`, `expected_end_date`) VALUES
(1, '2023-09-26', '2023-09-', 'due to test no water from 23 to 45 ', 1, 1, '2023-09-28', '2023-09-28'),
(2, '2023-09-26', '2023-09-', 'jAVA TEST', 0, 1, '2023-09-28', '2023-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill`
--

CREATE TABLE `tbl_bill` (
  `bill_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `bill_date` date NOT NULL DEFAULT current_timestamp(),
  `pay_date` date NOT NULL,
  `bill_due_date` date NOT NULL,
  `bill_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `bill_reading` varchar(11) NOT NULL,
  `bill_pre_reading` varchar(11) NOT NULL DEFAULT '0',
  `bill_amount` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bill`
--

INSERT INTO `tbl_bill` (`bill_id`, `bill_no`, `bill_date`, `pay_date`, `bill_due_date`, `bill_status`, `user_id`, `bill_reading`, `bill_pre_reading`, `bill_amount`, `operator_id`) VALUES
(6, 86987532, '2023-09-09', '2023-09-28', '2023-11-08', 3, 2, '3458', '0', 360, 1),
(11, 7887138, '2023-09-09', '2023-09-28', '2023-11-08', 3, 4, '4522', '0', 200, 1),
(12, 30023477, '2023-09-09', '2023-09-28', '2023-11-08', 3, 6, '5421', '0', 200, 1),
(13, 58865533, '2023-09-09', '2023-09-28', '2023-11-08', 3, 3, '2865', '0', 200, 1),
(15, 50592150, '2023-09-09', '2023-09-28', '2023-11-08', 3, 7, '2542', '0', 200, 1),
(20, 58468214, '2023-09-09', '2023-09-28', '2023-11-08', 3, 5, '2554', '0', 200, 1),
(26, 97984877, '2023-10-09', '0000-00-00', '2023-11-08', 1, 3, '4875', '2865', 200, 1),
(27, 50534459, '2023-10-09', '0000-00-00', '2023-11-08', 1, 5, '4589', '2554', 200, 1),
(28, 35669101, '2023-10-09', '0000-00-00', '2023-11-08', 1, 5, '4521', '4589', 200, 1),
(29, 81318981, '2023-10-09', '0000-00-00', '2023-11-08', 1, 5, '4521', '4521', 200, 1),
(30, 48063828, '2023-10-09', '0000-00-00', '2023-11-08', 1, 7, '4857', '2542', 200, 1),
(31, 64040197, '2023-10-17', '0000-00-00', '2023-11-16', 1, 2, '4987', '3458', 200, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `cmp_id` int(11) NOT NULL,
  `cmp_date` date DEFAULT current_timestamp(),
  `cmp_title` varchar(25) NOT NULL,
  `cmp_detail` varchar(125) NOT NULL,
  `cmp_status` int(10) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`cmp_id`, `cmp_date`, `cmp_title`, `cmp_detail`, `cmp_status`, `user_id`) VALUES
(1, '2023-10-17', '1', 'davood bad', 1, 2),
(2, '2023-10-17', '1', 'athul bad', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(15) NOT NULL,
  `c_email` varchar(25) NOT NULL,
  `c_mobile` int(11) NOT NULL,
  `c_subject` varchar(25) NOT NULL,
  `c_message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`c_id`, `c_name`, `c_email`, `c_mobile`, `c_subject`, `c_message`) VALUES
(1, 'alby', 'alby.bca21@dcschool.net', 0, 'new connection cost', 'what is  the new connection cost'),
(2, 'gim', '', 0, 'price', 'may i know the pricing'),
(3, 'gim', '', 0, 'price', 'may i know the pricing'),
(4, 'gim', 'gim@gmail.com', 0, 'price', 'whaths the prices'),
(5, 'gim', 'gim@gmail.com', 0, 'price', 'whaths the prices');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `note_id` int(11) NOT NULL,
  `note_title` varchar(25) NOT NULL,
  `note_detail` varchar(225) NOT NULL,
  `note_sender` int(25) NOT NULL,
  `note_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`note_id`, `note_title`, `note_detail`, `note_sender`, `note_date`) VALUES
(1, '1', 'no water\r\n', 1, '2023-09-26'),
(2, '1', 'test notification\r\n', 1, '2023-09-26'),
(3, '1', 'test 2', 1, '2023-10-08'),
(4, '2', 'test3', 1, '2023-10-08'),
(5, '', 'test4', 1, '2023-10-08'),
(6, '', 'test4', 1, '2023-10-08'),
(7, '1', 'test5', 1, '2023-10-08'),
(8, '1', 'test6\r\n', 1, '2023-10-08'),
(9, '1', 'button test', 1, '2023-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_operator`
--

CREATE TABLE `tbl_operator` (
  `operator_id` int(11) NOT NULL,
  `operator_name` varchar(25) NOT NULL,
  `operator_contact` varchar(10) NOT NULL,
  `operator_address` varchar(125) NOT NULL,
  `operator_email` varchar(35) NOT NULL,
  `operator_photo` varchar(1024) NOT NULL,
  `operator_proof` varchar(1024) NOT NULL,
  `operator_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_operator`
--

INSERT INTO `tbl_operator` (`operator_id`, `operator_name`, `operator_contact`, `operator_address`, `operator_email`, `operator_photo`, `operator_proof`, `operator_password`) VALUES
(1, 'Davood', '6586587458', 'dc,pullikanam,\r\nvagamon,\r\nidduki', 'davood@gmail.com', 'davood.jpg', 'photoplotnikov161000024.jpg', 'davoo'),
(7, 'Abhith', '9854758457', 'dc,\r\npullikanam,\r\nVagamon', 'abhith.bca21@dcschool.net', 'testimonial-4.jpg', 'testimonial-4.jpg', 'abhith');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `report_id` int(11) NOT NULL,
  `Arsenic` text NOT NULL,
  `Barium` text NOT NULL,
  `Chromium` text NOT NULL,
  `selenium` text NOT NULL,
  `report_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`report_id`, `Arsenic`, `Barium`, `Chromium`, `selenium`, `report_date`) VALUES
(1, '0.5', '0.05', '3', '0.8', '2023-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_request`
--

CREATE TABLE `tbl_service_request` (
  `req_id` int(11) NOT NULL,
  `req_date` date NOT NULL DEFAULT current_timestamp(),
  `req_time` time NOT NULL DEFAULT current_timestamp(),
  `req_type` int(11) NOT NULL,
  `req_detail` varchar(125) NOT NULL,
  `user_id` int(11) NOT NULL,
  `req_status` int(11) NOT NULL DEFAULT 0,
  `req_cost` int(11) DEFAULT NULL,
  `req_bill` varchar(1024) NOT NULL,
  `operator_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service_request`
--

INSERT INTO `tbl_service_request` (`req_id`, `req_date`, `req_time`, `req_type`, `req_detail`, `user_id`, `req_status`, `req_cost`, `req_bill`, `operator_id`) VALUES
(1, '2023-09-27', '15:34:53', 0, 'tap broke\r\n', 2, 6, 456, 'Screenshot 2023-04-01 122414.png', 1),
(2, '2023-09-27', '15:35:04', 1, 'drain overflow', 2, 7, NULL, '', 1),
(3, '2023-09-27', '15:35:24', 2, 'pipe broke in roadside', 2, 4, NULL, '', 1),
(4, '2023-09-27', '15:35:58', 1, 'pipe leaking', 2, 0, NULL, '', NULL),
(5, '2023-10-09', '16:49:43', 0, 'dup1', 2, 0, NULL, '', NULL),
(6, '2023-10-09', '16:49:53', 0, 'dup2', 2, 0, NULL, '', NULL),
(7, '2023-10-10', '15:17:44', 1, 'purify water', 11, 7, 500, 'testimonial-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_address` varchar(125) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_proof` varchar(1024) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_vstatus` int(11) NOT NULL DEFAULT 0,
  `customer_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_address`, `user_email`, `user_proof`, `user_password`, `user_vstatus`, `customer_id`) VALUES
(2, 'Abhijith', '5685654758', 'dc,\r\npullikanam,\r\nvagamon,\r\nidduki', 'abhijith@gmail.com', 'digital_plant_pot2.jpg', 'wasd', 2, '12345678'),
(3, 'Athul', '4785475845', 'dc,\r\npullikanam,\r\nvagamon,\r\nidduki', 'athul@gmail.com', 'id.format-jpeg-1700854187', 'athul', 1, '12345679'),
(4, 'Boby', '8958456214', 'dc,\r\npullikanam,\r\nvagamon,\r\nidduki', 'boby@gmail.com', 'digital_plant_pot2.jpg', 'boby', 2, '12345671'),
(5, 'Adhin', '8958745896', 'dc,\r\npullikanam,\r\nvagamon,\r\nidduki', 'adhin@gmail.com', 'id.format-jpeg-1700854187', 'adhin', 2, '12345672'),
(6, 'Alby', '5865845789', 'dc,\npullikanmam,\nvagamon', 'alby@gmail.com', 'digital_plant_pot2.jpg', 'alby', 0, '12345673'),
(7, 'Sandra', '9854758458', 'dc,\r\npullikanmam,\r\nvagamon', 'sandra@gmail.com', 'digital_plant_pot2.jpg', 'sandra', 2, '12345677'),
(8, 'Abhijith', '9656816849', 'dc,\r\npullikanam,\r\nvagamon', 'abhijithtp2003@gmail.com', 'testimonial-1.jpg', 'abhi', 0, '85769760'),
(9, 'Diya', '6584575685', 'dc,\r\npullikanam,\r\nvagamon', 'diya.bca21@dcschool.net', 'testimonial-2.jpg', 'diya', 2, '31361256'),
(10, 'Bharat', '8457568687', 'dc', 'bharat.bca21@dcschool.net', 'testimonial-1.jpg', 'bharat', 1, '66190856'),
(11, 'Adarsh', '6584789524', 'dc,\r\npullikanam,\r\nvagamon', 'adarsh.bca21@dcschool.net', 'testimonial-1.jpg', 'adarsh', 2, '78336238');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_alert`
--
ALTER TABLE `tbl_alert`
  ADD PRIMARY KEY (`alert_id`);

--
-- Indexes for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`cmp_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `tbl_operator`
--
ALTER TABLE `tbl_operator`
  ADD PRIMARY KEY (`operator_id`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_service_request`
--
ALTER TABLE `tbl_service_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_alert`
--
ALTER TABLE `tbl_alert`
  MODIFY `alert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_operator`
--
ALTER TABLE `tbl_operator`
  MODIFY `operator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_service_request`
--
ALTER TABLE `tbl_service_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
