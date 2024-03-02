-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 01, 2023 at 10:02 AM
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
-- Table structure for table `freelancers_technical`
--

DROP TABLE IF EXISTS `freelancers_technical`;
CREATE TABLE IF NOT EXISTS `freelancers_technical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `assignment_type` text NOT NULL,
  `qualification` text NOT NULL,
  `working_hours` text NOT NULL,
  `subject_tags` text NOT NULL,
  `past_experience` text NOT NULL,
  `work_links` text NOT NULL,
  `linkedin` text NOT NULL,
  `experience` text NOT NULL,
  `past_work_files` text NOT NULL,
  `resume` text NOT NULL,
  `date_of_submission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancers_technical`
--

INSERT INTO `freelancers_technical` (`id`, `freelancer_id`, `assignment_type`, `qualification`, `working_hours`, `subject_tags`, `past_experience`, `work_links`, `linkedin`, `experience`, `past_work_files`, `resume`, `date_of_submission`) VALUES
(1, 1, '[\"Programming / Coding Assignment\"]', 'BE', '24*7', '[\"Machine Learning,Machine Learning Using Python\"]', '5 years', 'https://blue-pen.vercel.app/freelance/freelancer/technical', 'https://www.linkedin.com/', 'some projects', 'filename1_^_filename2_^_file3_^_file4_^_ifile5_^_', 'filename1_^_filename2_^_file3_^_file4_^_ifile5_^_', '28-02-2023 15:54:38'),
(2, 2, '[\"Programming / Coding Assignment\"]', 'BE', '24*7', '[\"Machine Learning,Machine Learning Using Python\"]', '5 years', 'https://blue-pen.vercel.app/freelance/freelancer/technical', 'https://www.linkedin.com/', 'some projects', 'filename1_^_filename2_^_file3_^_file4_^_ifile5_^_', 'filename1_^_filename2_^_file3_^_file4_^_ifile5_^_', '28-02-2023 15:55:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
