-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2023 at 06:37 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluepenc_blue-pen-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_swing`
--

CREATE TABLE `freelancer_swing` (
  `id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `swing_status` int(11) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `freelancer_swing`
--

INSERT INTO `freelancer_swing` (`id`, `freelancer_id`, `swing_status`, `updated_on`) VALUES
(1, 5, 0, '2022-09-06 00:31:47'),
(2, 5, 0, '2022-09-06 00:42:08'),
(3, 5, 0, '2022-09-06 00:43:47'),
(4, 5, 0, '2022-09-06 00:57:19'),
(5, 5, 0, '2022-09-06 00:58:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `freelancer_swing`
--
ALTER TABLE `freelancer_swing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `freelancer_swing`
--
ALTER TABLE `freelancer_swing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
