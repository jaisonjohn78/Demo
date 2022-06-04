-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2022 at 04:15 PM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u230766858_peradot`
--

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_price` int(11) NOT NULL,
  `days` int(11) NOT NULL DEFAULT 30,
  `reward` int(11) NOT NULL DEFAULT 60,
  `timestamp` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `user_id`, `package_name`, `package_price`, `days`, `reward`, `timestamp`, `status`) VALUES
(1, 2, 'package 2', 500, 0, 30, 'June 3, 2022 10:50:53', 1),
(3, 2, 'package 4', 2000, 0, 120, 'June 3, 2022 18:41:40', 1),
(5, 8, 'package 5', 4000, 30, 240, 'June 3, 2022 16:15:32', 1),
(6, 9, 'package 5', 4000, 29, 240, 'June 4, 2022 18:38:58', 1),
(7, 9, 'package 4', 2000, 29, 120, 'June 4, 2022 18:39:11', 1),
(8, 9, 'package 3', 1000, 29, 60, 'June 4, 2022 18:39:07', 1),
(9, 2, 'package 3', 1000, 25, 60, 'June 4, 2022 20:14:38', 1),
(10, 2, 'package 3', 1000, 25, 60, 'June 4, 2022 20:14:35', 1),
(11, 2, 'package 4', 2000, 29, 120, 'June 4, 2022 20:13:54', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
