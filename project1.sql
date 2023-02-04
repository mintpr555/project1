-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2023 at 12:22 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_admin`
--

CREATE TABLE `a_admin` (
  `a_id` int(5) NOT NULL,
  `a_user` varchar(20) NOT NULL,
  `a_pass` varchar(20) NOT NULL,
  `a_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `a_admin`
--

INSERT INTO `a_admin` (`a_id`, `a_user`, `a_pass`, `a_name`) VALUES
(1, 'admin1', '111', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `d_detail`
--

CREATE TABLE `d_detail` (
  `d_id` int(5) NOT NULL,
  `d_mail` varchar(20) NOT NULL,
  `d_pass` varchar(20) NOT NULL,
  `d_proflie` varchar(10) NOT NULL,
  `d_exp` varchar(10) NOT NULL,
  `p_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `d_detail`
--

INSERT INTO `d_detail` (`d_id`, `d_mail`, `d_pass`, `d_proflie`, `d_exp`, `p_id`, `s_id`) VALUES
(4, 'hh1@gmail.com', '11711', '1', '1/12/2565', 5, 4),
(14, 'hh1@gmail.com', '11711', '2', '1/1/2566', 5, 14),
(15, 'hh1@gmail.com', '11711', '3', '27/12/2022', 6, 15),
(19, 'hh1@gmail.com', '11711', '4', '27/12/2565', 6, 19),
(21, 'hh1@gmail.com', '11711', '5', '1/1/2566', 5, 21);

-- --------------------------------------------------------

--
-- Table structure for table `i_information`
--

CREATE TABLE `i_information` (
  `i_id` int(5) NOT NULL,
  `i_detail1` varchar(50) NOT NULL,
  `i_detail2` varchar(50) NOT NULL,
  `i_detail3` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `i_detail4` varchar(50) NOT NULL,
  `i_detail5` varchar(50) NOT NULL,
  `i_detail6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `i_information`
--

INSERT INTO `i_information` (`i_id`, `i_detail1`, `i_detail2`, `i_detail3`, `i_detail4`, `i_detail5`, `i_detail6`) VALUES
(2, '168868125620221220_101913.jpg', '127344738420221201_221149.jpg', 'https://www.youtube.com/embed/UKy_CfE5WC4', 'https://www.youtube.com/embed/euSF7lpdm-M', 'https://www.youtube.com/embed/hQY0Bb9y37g', 'https://www.youtube.com/embed/sfClJ3DRkLE');

-- --------------------------------------------------------

--
-- Table structure for table `m_member`
--

CREATE TABLE `m_member` (
  `m_id` int(5) NOT NULL,
  `m_user` varchar(20) NOT NULL,
  `m_pass` varchar(20) NOT NULL,
  `m_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `m_member`
--

INSERT INTO `m_member` (`m_id`, `m_user`, `m_pass`, `m_name`) VALUES
(1, 'aa1', '111', 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `p_product`
--

CREATE TABLE `p_product` (
  `p_id` int(5) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_img` varchar(100) NOT NULL,
  `p_price` int(5) NOT NULL,
  `p_detail` varchar(200) NOT NULL,
  `p_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `p_product`
--

INSERT INTO `p_product` (`p_id`, `p_name`, `p_img`, `p_price`, `p_detail`, `p_status`) VALUES
(5, 'netflix 30 วัน', '132887285820221130_152810.png', 95, '- แอคไทย\r\n-จอส่วนตัว                                                                                          ', 'สินค้าพร้อมส่ง'),
(6, 'netflix 7 วัน', '165344290220221201_224257.png', 35, '- แอคไทย\r\n-จอส่วนตัว                                                                                                                                                  ', 'สินค้าไม่พร้อมส่ง');

-- --------------------------------------------------------

--
-- Table structure for table `s_sell`
--

CREATE TABLE `s_sell` (
  `s_id` int(5) NOT NULL,
  `s_date` datetime NOT NULL,
  `s_qty` int(1) NOT NULL,
  `s_status` varchar(50) NOT NULL,
  `s_img` varchar(50) NOT NULL,
  `m_id` int(5) NOT NULL,
  `p_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `s_sell`
--

INSERT INTO `s_sell` (`s_id`, `s_date`, `s_qty`, `s_status`, `s_img`, `m_id`, `p_id`) VALUES
(4, '2022-11-11 00:00:00', 1, 'การสั่งซื้อเสร็จสิ้น', '29297847620221217_112816.jpg', 1, 5),
(14, '2022-12-20 00:00:00', 1, 'การสั่งซื้อเสร็จสิ้น', '115069028520221220_225750.jpg', 1, 5),
(15, '2022-12-20 00:00:00', 1, 'การสั่งซื้อเสร็จสิ้น', '183747547920221220_225613.jpg', 1, 6),
(19, '2022-12-25 00:00:00', 1, 'การสั่งซื้อเสร็จสิ้น', '32122967720221221_143656.jpg', 1, 6),
(21, '2022-12-26 13:51:16', 1, 'การสั่งซื้อเสร็จสิ้น', '39570783320221227_203842.jpg', 1, 5),
(22, '2022-12-27 20:35:13', 1, 'รอสินค้า', '73261431120221231_134115.jpg', 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_admin`
--
ALTER TABLE `a_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `d_detail`
--
ALTER TABLE `d_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `i_information`
--
ALTER TABLE `i_information`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `m_member`
--
ALTER TABLE `m_member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `p_product`
--
ALTER TABLE `p_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `s_sell`
--
ALTER TABLE `s_sell`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_admin`
--
ALTER TABLE `a_admin`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `i_information`
--
ALTER TABLE `i_information`
  MODIFY `i_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_member`
--
ALTER TABLE `m_member`
  MODIFY `m_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p_product`
--
ALTER TABLE `p_product`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `s_sell`
--
ALTER TABLE `s_sell`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
