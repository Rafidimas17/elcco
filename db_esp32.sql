-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 09:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_esp32`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp`
--

CREATE TABLE `tbl_temp` (
  `temp_id` int(10) UNSIGNED NOT NULL,
  `temp_value` float DEFAULT 0,
  `temp_humd` float DEFAULT 0,
  `temp_amonia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_temp`
--

INSERT INTO `tbl_temp` (`temp_id`, `temp_value`, `temp_humd`, `temp_amonia`) VALUES
(1, 10, 9, 39),
(2, 23, 13, 25),
(3, 13, 6, 16),
(4, 1, 10, 36),
(5, 11, 17, 22),
(6, 14, 11, 19),
(7, 24, 18, 17),
(8, 26, 6, 23),
(9, 12, 12, 16),
(10, 6, 11, 32),
(11, 5, 10, 5),
(12, 1, 15, 18),
(13, 23, 15, 39),
(14, 21, 16, 37),
(15, 11, 17, 32),
(16, 19, 9, 13),
(17, 2, 17, 24),
(18, 10, 7, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_temp`
--
ALTER TABLE `tbl_temp`
  ADD PRIMARY KEY (`temp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_temp`
--
ALTER TABLE `tbl_temp`
  MODIFY `temp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
