-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2023 at 09:09 AM
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
-- Table structure for table `assign_to_freelancer`
--

DROP TABLE IF EXISTS `assign_to_freelancer`;
CREATE TABLE IF NOT EXISTS `assign_to_freelancer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign_to_freelancer`
--

INSERT INTO `assign_to_freelancer` (`id`, `assignment_id`, `freelancer_id`, `status`) VALUES
(75, 83, 1, 1),
(74, 95, 90, 0),
(73, 95, 1, 0),
(72, 96, 90, 0),
(71, 96, 1, 0),
(100, 5, 9, 1),
(69, 97, 1, 1),
(68, 98, 90, 0),
(99, 95, 41, 0),
(66, 82, 90, 1),
(65, 82, 1, 1),
(64, 85, 1, 1),
(63, 86, 1, 1),
(62, 87, 1, 1),
(61, 88, 90, 1),
(60, 88, 1, 1),
(59, 90, 1, 1),
(57, 91, 1, 1),
(56, 92, 90, 1),
(55, 92, 1, 1),
(54, 93, 90, 1),
(53, 93, 1, 1),
(52, 94, 90, 1),
(51, 94, 1, 1),
(76, 83, 90, 1),
(77, 81, 1, 1),
(78, 81, 90, 1),
(79, 80, 1, 1),
(80, 80, 90, 1),
(81, 79, 1, 1),
(82, 79, 90, 1),
(83, 78, 1, 1),
(84, 78, 90, 1),
(85, 77, 1, 1),
(86, 77, 90, 1),
(87, 76, 1, 1),
(88, 76, 90, 1),
(89, 75, 1, 1),
(90, 75, 90, 1),
(91, 74, 1, 1),
(92, 74, 90, 1),
(93, 73, 1, 1),
(94, 73, 90, 1),
(95, 73, 90, 1),
(96, 72, 1, 1),
(97, 72, 90, 1),
(98, 67, 1, 1),
(101, 97, 9, 1),
(104, 100, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
