-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2023 at 10:16 AM
-- Server version: 5.7.36
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blue-pen`
--

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_swing`
--

DROP TABLE IF EXISTS `freelancer_swing`;
CREATE TABLE IF NOT EXISTS `freelancer_swing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `swing_status` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancer_swing`
--

INSERT INTO `freelancer_swing` (`id`, `freelancer_id`, `swing_status`, `updated_on`) VALUES
(1, 1, 0, '2022-06-06 05:36:12'),
(2, 1, 2, '2022-06-06 11:20:34'),
(3, 1, 2, '2022-06-06 11:21:24'),
(4, 1, 2, '2022-06-06 11:22:05'),
(5, 1, 0, '2022-06-06 11:35:25'),
(6, 1, 1, '2022-06-06 11:35:31'),
(7, 1, 2, '2022-06-06 11:35:35'),
(8, 1, 1, '2022-06-06 11:35:38'),
(9, 1, 0, '2022-06-06 11:35:41'),
(10, 1, 0, '2022-06-06 11:36:12'),
(11, 1, -1, '2022-06-06 11:38:04'),
(12, 1, 2, '2022-06-06 11:38:46'),
(13, 1, 1, '2022-06-06 11:38:49'),
(14, 1, -1, '2022-06-06 11:38:51'),
(15, 37, 0, '2022-06-06 11:51:25'),
(16, 1, 2, '2022-06-06 12:04:03'),
(17, 1, 1, '2022-06-06 12:04:11'),
(18, 1, -1, '2022-06-06 12:04:16'),
(19, 1, 2, '2022-06-06 12:08:59'),
(20, 1, 1, '2022-06-06 12:09:04'),
(21, 1, -1, '2022-06-06 12:09:09'),
(22, 37, 2, '2022-06-16 13:17:07'),
(23, 37, 2, '2022-06-16 13:37:54'),
(24, 91, 0, '2022-07-04 15:00:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
