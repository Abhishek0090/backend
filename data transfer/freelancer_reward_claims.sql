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
-- Table structure for table `freelancer_reward_claims`
--

DROP TABLE IF EXISTS `freelancer_reward_claims`;
CREATE TABLE IF NOT EXISTS `freelancer_reward_claims` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `number_of_assignments` int(11) NOT NULL,
  `claim_datetime` datetime NOT NULL,
  `claimed` int(11) NOT NULL,
  `sent` int(11) NOT NULL DEFAULT '0',
  `received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancer_reward_claims`
--

INSERT INTO `freelancer_reward_claims` (`id`, `freelancer_id`, `number_of_assignments`, `claim_datetime`, `claimed`, `sent`, `received`) VALUES
(26, 90, 10, '2022-06-02 15:02:40', 1, 1, 1),
(23, 90, 5, '2022-06-02 12:20:25', 1, 1, 1),
(27, 1, 15, '2022-06-02 15:02:49', 1, 1, 1),
(21, 1, 5, '2022-06-02 12:03:55', 1, 1, 1),
(20, 1, 3, '2022-06-02 11:13:52', 1, 1, 1),
(19, 90, 3, '2022-06-02 11:13:48', 1, 1, 1),
(25, 1, 10, '2022-06-02 12:45:02', 1, 1, 1),
(28, 1, 17, '2022-06-02 15:29:07', 1, 1, 1),
(29, 90, 15, '2022-06-02 15:44:41', 1, 1, 1),
(30, 1, 20, '2022-06-02 15:44:44', 1, 1, 1),
(31, 90, 17, '2022-06-02 15:59:01', 1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
