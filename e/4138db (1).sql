-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 10:41 AM
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
-- Database: `4138db`
--
CREATE DATABASE IF NOT EXISTS `4138db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `4138db`;

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `app_id` int(11) NOT NULL,
  `app_position` varchar(100) NOT NULL,
  `app_prefix` varchar(20) NOT NULL,
  `app_fullname` varchar(150) NOT NULL,
  `app_birthday` date NOT NULL,
  `app_education` varchar(50) NOT NULL,
  `app_skills` text NOT NULL,
  `app_experience` text NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`app_id`, `app_position`, `app_prefix`, `app_fullname`, `app_birthday`, `app_education`, `app_skills`, `app_experience`, `created_at`) VALUES
(1, 'ฟ ำ', '', '', '0000-00-00', '', '', 'ชัชวาล', 0),
(2, 'Data Analyst', 'นาย', 'ชัชวาล สิงห์เทศ', '2003-06-10', 'ปริญญาตรี', 'afgs', 'fgsfag', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(6) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_phone` varchar(255) NOT NULL,
  `r_height` int(11) NOT NULL,
  `r_address` text NOT NULL,
  `r_color` varchar(50) NOT NULL,
  `r_major` varchar(100) NOT NULL,
  `r_birthday` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `r_name`, `r_phone`, `r_height`, `r_address`, `r_color`, `r_major`, `r_birthday`) VALUES
(1, 'ชัชวาล', '', 0, '', '', '', ''),
(2, 'ชัชวาล สิงห์เทศ', '0832347546', 0, '', '', '', ''),
(3, 'ชัชวาล สิงห์เทศ', '0832347546', 0, '', '', '', ''),
(4, 'ำห', '0832347546', 0, '', '', '', ''),
(5, 'ชัชวาล สิงห์เทศ', '0832347546', 0, '', '', '', ''),
(6, 'ชัชวาล สิงห์เทศ', '0832347546', 188, '108/4', ' #be555a', 'การจัดการ', ' 2003-06-10'),
(7, 'แฟเ ดเฟ', '0832347546', 122, '108', ' #233652', 'การตลาด', ' 11111-11-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
