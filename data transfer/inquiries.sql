-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2023 at 01:37 PM
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
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `assignment_id`, `freelancer_id`, `status`) VALUES
(1, 89, 1, 0),
(2, 87, 1, 1),
(3, 87, 9, 1),
(4, 84, 1, 0),
(5, 84, 9, 0),
(6, 88, 86, 0),
(7, 88, 1, 0),
(8, 85, 1, 1),
(9, 90, 1, 1),
(10, 88, 1, 1),
(11, 86, 1, 1),
(12, 83, 1, 1),
(13, 82, 1, 1),
(14, 81, 1, 1),
(15, 80, 1, 1),
(16, 79, 1, 1),
(17, 78, 1, 1),
(18, 77, 1, 1),
(19, 76, 1, 1),
(20, 75, 1, 1),
(21, 74, 1, 1),
(22, 78, 90, 1),
(23, 90, 90, 1),
(24, 77, 90, 1),
(25, 76, 90, 1),
(26, 75, 90, 1),
(27, 73, 1, 1),
(28, 73, 90, 1),
(29, 94, 1, 1),
(30, 94, 90, 1),
(31, 93, 1, 1),
(32, 93, 90, 1),
(33, 92, 1, 1),
(34, 92, 90, 1),
(35, 91, 1, 1),
(36, 88, 90, 1),
(37, 82, 90, 1),
(38, 98, 1, 0),
(39, 98, 90, 0),
(40, 97, 1, 1),
(41, 97, 90, 1),
(42, 96, 1, 0),
(43, 96, 90, 0),
(44, 95, 1, 0),
(45, 95, 90, 0),
(46, 83, 90, 1),
(47, 81, 90, 1),
(48, 80, 90, 1),
(49, 79, 90, 1),
(50, 74, 90, 1),
(51, 72, 1, 1),
(52, 72, 90, 1),
(53, 97, 60, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
