-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2023 at 12:30 PM
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
-- Database: `blue-temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
CREATE TABLE IF NOT EXISTS `assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `domain` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assignmentfreelance`
--

DROP TABLE IF EXISTS `assignmentfreelance`;
CREATE TABLE IF NOT EXISTS `assignmentfreelance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `stream` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `course` text NOT NULL,
  `level` text NOT NULL,
  `type` text NOT NULL,
  `subject_tags` text NOT NULL,
  `deadline` text NOT NULL,
  `budget` text NOT NULL,
  `files` text NOT NULL,
  `submission_date` text NOT NULL,
  `project_manager` text,
  `freelancer` text,
  `posted` tinyint(1) NOT NULL,
  `under_process` tinyint(1) NOT NULL,
  `assigned_to_pm` tinyint(1) NOT NULL,
  `assigned_to_freelancer` tinyint(1) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `review_recieved` tinyint(1) NOT NULL,
  `lost` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_otp_email`
--

DROP TABLE IF EXISTS `student_otp_email`;
CREATE TABLE IF NOT EXISTS `student_otp_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` text NOT NULL,
  `otp` int(11) NOT NULL,
  `generation` datetime NOT NULL,
  `expiry` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_otp_email`
--

INSERT INTO `student_otp_email` (`id`, `user_id`, `email`, `otp`, `generation`, `expiry`) VALUES
(1, NULL, '', 1154, '2023-02-20 12:15:10', '2023-02-20 12:20:10'),
(2, NULL, 'bhavyaharia100@gmail.com', 6131, '2023-02-20 12:17:18', '2023-02-20 12:22:18'),
(3, NULL, 'bhavyaharia100@gmail.com', 7491, '2023-02-20 15:23:13', '2023-02-20 15:28:13'),
(4, NULL, 'bhavyaharia100@gmail.com', 8184, '2023-02-20 15:30:56', '2023-02-20 15:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `student_otp_number`
--

DROP TABLE IF EXISTS `student_otp_number`;
CREATE TABLE IF NOT EXISTS `student_otp_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `number` bigint(20) NOT NULL,
  `otp` int(11) NOT NULL,
  `generation` datetime NOT NULL,
  `expiry` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_otp_number`
--

INSERT INTO `student_otp_number` (`id`, `user_id`, `number`, `otp`, `generation`, `expiry`) VALUES
(1, NULL, 9619305482, 7795, '2023-02-20 13:00:26', '2023-02-20 13:05:26'),
(2, NULL, 9619305482, 4184, '2023-02-20 15:31:16', '2023-02-20 15:36:16'),
(3, NULL, 9619305482, 4178, '2023-02-20 15:36:59', '2023-02-20 15:41:59'),
(4, NULL, 9619305482, 1045, '2023-02-20 19:24:43', '2023-02-20 19:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `college` text,
  `email` text NOT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `country` text NOT NULL,
  `number` bigint(20) NOT NULL,
  `number_verified` tinyint(1) NOT NULL DEFAULT '0',
  `address` text NOT NULL,
  `signin_method` text NOT NULL,
  `password` text NOT NULL,
  `wallet` int(11) NOT NULL,
  `date_of_birth` text,
  `created` datetime NOT NULL,
  `agreed` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `college`, `email`, `email_verified`, `country`, `number`, `number_verified`, `address`, `signin_method`, `password`, `wallet`, `date_of_birth`, `created`, `agreed`) VALUES
(1, 'bhavya', 'haria', NULL, 'bhavyharia100@gmail.com', 1, 'India', 9619305482, 1, '', 'manual', '$2y$10$jgFVboP7/fm/XMyWK.hs8uu7lcbXQByHhCaFqnBezxn7NxOn/erwW', 20, '20-02-2023', '2023-02-20 17:06:05', 1),
(2, 'bhavya', 'haria', NULL, 'bhavyharia10@gmail.com', 1, 'India', 961930542, 1, '', 'manual', '$2y$10$BzL2CmkJYTFmyrh/k2z35O1b1vlkICrj5jNp/rwTFFGUfP3ZWD0.S', 20, '20-02-2023', '2023-02-20 17:08:25', 1),
(3, 'bhavya', 'haria', NULL, 'bhavyharia1@gmail.com', 1, 'India', 96130542, 1, '', 'manual', '$2y$10$ELysw9WlI9VDfbiFCUwxJO1anKPZTeF1IMilWsvftTqljmzV9sNMq', 20, '20-02-2023', '2023-02-20 17:09:03', 1),
(4, 'bhavya', 'haria', NULL, 'bhavyharia@gmail.com', 1, 'India', 9610542, 1, 'gokuldham', 'manual', '$2y$10$CLGTd.yWWlEMo0wvb35FVeNJeU9cytaUab5xGbPmFwy9JF3x906I6', 20, '20-02-2023', '2023-02-20 17:11:55', 1),
(5, 'bhavya', 'haria', NULL, 'bhavyhara@gmail.com', 1, 'India', 910542, 1, 'gokuldham', 'manual', '$2y$10$Puv2HbetrGzxkAAiHLNBX.aLieD8aso.XGlyjS42b51dNbIW.h9KO', 20, '20-02-2023', '2023-02-20 17:12:46', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
