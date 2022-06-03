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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `timestamp` varchar(255) NOT NULL,
  `metamask` varchar(255) NOT NULL,
  `withdraw` int(11) NOT NULL DEFAULT 0,
  `deposit` int(11) NOT NULL DEFAULT 0,
  `reward` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `reference_id` varchar(255) NOT NULL,
  `admin` enum('0','1') NOT NULL DEFAULT '0',
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `status`, `timestamp`, `metamask`, `withdraw`, `deposit`, `reward`, `days`, `amount`, `reference_id`, `admin`, `code`) VALUES
(1, 'Peradot Foundation', 'peradotfoundation@gmail.com', '9999999999', 'e3ad8800e87ef74d996c5afed87471a1', '1', 'June 1, 2022, 12:34 am', '', 0, 0, 0, 0, 0, 'oldtvOHh', '1', ''),
(2, 'Jaison John ', 'jaisonjohn78.com@gmail.com', '8693018540', 'e570ee21fcc2fdb1327a34158fc452e7', '1', 'June 1, 2022, 12:38 am', '', 0, 27000, 0, 0, 180, 'aFA15ETv', '0', ''),
(3, 'Hardik vekariya', 'hardikzz0409@gmail.com', '9016368472', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'June 1, 2022, 8:50 am', '', 0, 0, 0, 0, 0, 'AzfEcveL', '0', ''),
(6, 'Test4', 'joysonjohnn@gmail.com', '+91 9594664829', '202cb962ac59075b964b07152d234b70', '1', 'June 3, 2022, 3:50 pm', '', 0, 0, 0, 0, 0, 'vAjDt1Hb', '0', ''),
(7, 'Hp123', 'fackf0343@gmail.com', '9313412709', 'd4395a5856617fa4afe8c5cd2eed3912', '1', 'June 3, 2022, 4:08 pm', '', 0, 0, 0, 0, 0, 'Ry58Y2t6', '0', 'e87cc4b4e3c9a127350bd0f204884879'),
(8, 'Vdking', 'maniyavishal42@gmail.com', '9824444139', 'd4395a5856617fa4afe8c5cd2eed3912', '1', 'June 3, 2022, 4:09 pm', '', 0, 3000, 0, 0, 0, '0HUxsaCf', '0', ''),
(9, 'herry', 'patelherry2309@gmail.com', '9979552794', 'd4395a5856617fa4afe8c5cd2eed3912', '1', 'June 3, 2022, 5:12 pm', '', 0, 0, 0, 0, 0, 'denY53ok', '0', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
