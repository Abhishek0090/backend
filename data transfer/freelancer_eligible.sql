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
-- Table structure for table `freelancer_eligible`
--

DROP TABLE IF EXISTS `freelancer_eligible`;
CREATE TABLE IF NOT EXISTS `freelancer_eligible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `number_of_assignments` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `made_on` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancer_eligible`
--

INSERT INTO `freelancer_eligible` (`id`, `freelancer_id`, `number_of_assignments`, `status`, `made_on`) VALUES
(29, 1, 17, 2, NULL),
(28, 90, 10, 2, NULL),
(27, 1, 15, 2, NULL),
(26, 1, 10, 2, NULL),
(25, 90, 5, 2, NULL),
(24, 1, 5, 2, NULL),
(23, 1, 3, 2, NULL),
(22, 90, 3, 2, NULL),
(30, 1, 20, 2, NULL),
(31, 90, 15, 2, NULL),
(32, 90, 17, 2, NULL),
(33, 90, 20, 2, '03/06/2022 11:06:49'),
(35, 1, 25, 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
