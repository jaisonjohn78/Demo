-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 06:32 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peradot`
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
  `admin` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `status`, `timestamp`, `metamask`, `withdraw`, `deposit`, `reward`, `days`, `amount`, `reference_id`, `admin`) VALUES
(1, 'jaison', 'jaison@gmail.com', '9016368471', '202cb962ac59075b964b07152d234b70', '1', '', '', 0, 0, 0, 0, 0, 'MPbDjOG92Q', '1'),
(3, 'hardik', 'hardikzz0409@gmail.com', '9016368472', '202cb962ac59075b964b07152d234b70', '1', '', '', 1000, 1500, 0, 0, 18527, 'isNmfqFQY0', '0'),
(4, 'test1', 't1@gmail.com', '9594604829', '202cb962ac59075b964b07152d234b70', '1', 'May 30, 2022, 1:23 am', '', 0, 0, 0, 0, 880, 'DdGv4wZX', '0'),
(5, 'test2', 't2@gmail.com', '1239999999', '202cb962ac59075b964b07152d234b70', '1', 'May 30, 2022, 1:24 am', '', 0, 0, 0, 0, 600, 'CUwEWTkA', '0'),
(6, 'nikhil', 'n@gmail.com', '9016368478', '202cb962ac59075b964b07152d234b70', '1', 'May 31, 2022, 9:43 pm', '', 0, 0, 0, 0, 0, 'RuAB2MC0', '0');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
