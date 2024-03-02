-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2023 at 08:15 AM
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
-- Table structure for table `assignment_art`
--

DROP TABLE IF EXISTS `assignment_art`;
CREATE TABLE IF NOT EXISTS `assignment_art` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `copy` text NOT NULL,
  `city` text,
  `title` text NOT NULL,
  `project_category` text NOT NULL,
  `instructions` text NOT NULL,
  `budget` text NOT NULL,
  `deadline` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `file` text NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `posted` tinyint(4) NOT NULL,
  `under_process` tinyint(4) NOT NULL,
  `assigned_to_wm` tinyint(4) NOT NULL,
  `assigned_to_writer` tinyint(4) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `review_received` tinyint(4) NOT NULL,
  `lost` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment_art`
--

INSERT INTO `assignment_art` (`id`, `assignment_id`, `copy`, `city`, `title`, `project_category`, `instructions`, `budget`, `deadline`, `date_of_submission`, `file`, `is_active`, `posted`, `under_process`, `assigned_to_wm`, `assigned_to_writer`, `completed`, `review_received`, `lost`) VALUES
(1, 268, 'Both', 'mumbai', '3d model of building', '3D', 'it should be neat and clean', '2000', '04-08-2023 12:00', '06-04-2023 15:33:54', '7550requirements.txt_$_7550run.py_$_', 1, 1, 0, 0, 0, 0, 0, 0),
(2, 269, 'Both', 'mumbai', '3d model of building', '3D', '', '2000', '', '06-04-2023 15:55:48', '7550requirements.txt_$_7550run.py_$_', 1, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_ed`
--

DROP TABLE IF EXISTS `assignment_ed`;
CREATE TABLE IF NOT EXISTS `assignment_ed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `city` text,
  `copy` text NOT NULL,
  `software` text NOT NULL,
  `type` text NOT NULL,
  `deadline` text NOT NULL,
  `submission_datetime` text NOT NULL,
  `budget` int(11) DEFAULT NULL,
  `instructions` text NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `file` text NOT NULL,
  `posted` tinyint(4) NOT NULL,
  `under_process` tinyint(4) NOT NULL,
  `assigned_to_wm` tinyint(4) NOT NULL,
  `assigned_to_writer` tinyint(4) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `review_received` tinyint(4) NOT NULL,
  `lost` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment_ed`
--

INSERT INTO `assignment_ed` (`id`, `assignment_id`, `city`, `copy`, `software`, `type`, `deadline`, `submission_datetime`, `budget`, `instructions`, `is_active`, `file`, `posted`, `under_process`, `assigned_to_wm`, `assigned_to_writer`, `completed`, `review_received`, `lost`) VALUES
(1, 250, 'Mumbai', 'soft', 'abcd', '[\"Isometric Drawing\"]', '2023-12-31 23:59', '02-01-2023 16:10:39', NULL, 'dfhfgc', 1, 'dece.pdf_$_', 1, 0, 0, 0, 0, 0, 0),
(2, 251, 'Mumbai', 'soft', 'abcd', '[\"Isometric Drawing\"]', '2023-12-31 23:59', '02-01-2023 16:24:14', NULL, 'dfhfgc', 1, 'dece.pdf_$_', 1, 0, 0, 0, 0, 0, 0),
(3, 261, 'Mumbai', 'Both', 'AutoCAD', 'Array', '', '06-04-2023 13:33:38', 200, 'ache se banana', 1, '7934Notebook.ipynb_$_7934SVRModel.pkl_$_', 1, 0, 0, 0, 0, 0, 0),
(4, 262, 'Mumbai', 'Both', 'AutoCAD', 'Array', '2023-04-11 13:34', '06-04-2023 13:35:06', 200, 'ache se banana', 1, '7934Notebook.ipynb_$_7934SVRModel.pkl_$_', 1, 0, 0, 0, 0, 0, 0),
(5, 263, 'Mumbai', 'Both', 'AutoCAD', '[\"Isometric Drawing\",\"Sectioning\",\"Dimensioning\"]', '2023-04-11 13:34', '06-04-2023 13:36:21', 200, 'ache se banana', 1, '7934Notebook.ipynb_$_7934SVRModel.pkl_$_', 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_freelance`
--

DROP TABLE IF EXISTS `assignment_freelance`;
CREATE TABLE IF NOT EXISTS `assignment_freelance` (
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
) ENGINE=MyISAM AUTO_INCREMENT=179 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment_freelance`
--

INSERT INTO `assignment_freelance` (`id`, `assignment_id`, `stream`, `title`, `description`, `course`, `level`, `type`, `subject_tags`, `deadline`, `budget`, `files`, `submission_date`, `project_manager`, `freelancer`, `posted`, `under_process`, `assigned_to_pm`, `assigned_to_freelancer`, `completed`, `review_recieved`, `lost`) VALUES
(1, 1, 'Engineering', 'Cell Segmentation', 'Project on cell segmentation using u-net. also count the segmented cells', 'Engineering', 'Bachelors', '', '[\"Machine Learning,Artificial Intelligence Deep Learning\"]', '14/09/2022 12:09:21', '12000', '', '27-02-2023 19:15:53', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(2, 2, 'Engineering', 'Anomaly Detection', 'Detect anomaly in given video', 'Engineering', 'Bachelors', '', '[\"Machine Learning, Deep Learning\"]', '14/09/2022 12:09:21', '12000', '', '27-02-2023 19:18:14', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(3, 3, 'Engineering', 'Malenoma', 'Detect Malenoma using normal images', 'Engineering', 'Bachelors', '[\"Programming / Coding Assignment\"]', '[\"Machine Learning, Deep Learning\"]', '14/09/2022 12:09:21', '12000', '', '27-02-2023 19:20:28', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(4, 0, 'Engineering', 'test title', 'test description', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India,india,ind\"]', '2021-11-27 ', '1500', 'Course work.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(5, 1, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"ind,India\"]', '2021-12-02 ', '5000', '4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(6, 2, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '5000', '4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(7, 3, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '5000', '4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(8, 4, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '5000', '4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(10, 6, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '5000', '4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(11, 7, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '2500', 'Finance Website Anand Bhai.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(12, 8, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '2500', 'Finance Website Anand Bhai.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(13, 9, 'Engineering', 'python', 'personal credit', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"\"]', '2021-12-21 ', '1500', '_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(14, 10, 'Engineering', 'python', 'personal credit', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"computer,India\"]', '2021-12-21 ', '1500', '_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(15, 11, 'Engineering', 'sql assignment', 'i want an sql assignemnt, details are in the files', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-05 ', '1000', 'rar-password.txt_$_F29AI-Coursework2-part1.pdf_$_CW2-Part2and3.zip_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(16, 12, 'Engineering', 'assignment title', 'assignment description', 'Engineering', '\"Bachelors\"', '', '[\"India,Ukraine\"]', '2021-12-24 00:19', '5000', 'CompilerDesign.pdf_$_F29AI-Coursework2-part1.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(17, 13, 'Engineering', 'assignment title here', 'assignment description here', 'Engineering', 'Bachelors', '', '[\"Falkland Islands (Malvinas)\"]', '2021-12-18 22:25', '2000', 'CompilerDesign.pdf_$_F29AI-Coursework2-part1.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(18, 14, 'Engineering', 'testsdlsdkn', 'alskdnnfkjsdfns', 'Engineering', 'Bachelors', '', '[\"India\"]', '2021-12-24 22:26', '2000', 'CompilerDesign.pdf_$_F29AI-Coursework2-part1.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(19, 15, 'Engineering', 'title', 'desc', 'Engineering', 'Diploma', '', '[\"India\"]', '2021-12-19 21:32', '2000', 'F29AI-Coursework2-part1.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(20, 16, 'Engineering', 'title', 'desc', 'Engineering', 'Diploma', '', '[\"India\"]', '2021-12-19 21:32', '2000', 'F29AI-Coursework2-part1.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(21, 17, 'Engineering', 'title', 'desc', 'Engineering', 'Diploma', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"India\"]', '2021-12-19 21:32', '2000', 'F29AI-Coursework2-part1.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(22, 18, 'Engineering', 'title', 'desc', 'Engineering', 'Diploma', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"India\"]', '2021-12-19 21:32', '2000', 'F29AI-Coursework2-part1.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(23, 19, 'Engineering', 'psychlogy', 'case study', 'Psychology', 'Masters', '[\"Report Writing\",\"Case Studies\"]', '[\"India\"]', '2021-12-26 22:35', '1500', 'CompilerDesign.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(24, 21, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(25, 22, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(26, 23, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(27, 24, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(28, 25, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(29, 26, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(30, 27, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 1, 0),
(31, 28, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(32, 29, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(33, 30, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(34, 31, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 1, 0),
(35, 32, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(36, 33, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"AC fundamentals and electrical machines\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 0, 0, 0, 0, 0),
(37, 34, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Artificial intelligence\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 0, 0, 0, 0, 0),
(38, 35, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(39, 36, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 0, 0, 0),
(40, 37, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(41, 38, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(42, 39, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(43, 40, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(44, 41, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(45, 42, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(46, 43, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(47, 44, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', 'Array', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(48, 45, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', 'Array', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(49, 46, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 0, 0, 0, 0),
(50, 47, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(51, 48, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(52, 49, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(53, 50, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(54, 51, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(55, 52, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(56, 53, 'Engineering', 'assignment title', 'assignment description', 'Engineering', 'Bachelors', '[\"Report Writing\",\"Literature Review\",\"Dissertation Writing\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\",\"Other\"]', '[\"All Computer Science Engineering subjects,Computer Science and Engineering,All subjects of Computer Science,Algorithms and Data Structures\"]', '2021-12-25 21:30', '2500', 'Password.txt_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(57, 54, 'Engineering', 'assignment title', 'assignment description', 'Engineering', 'Bachelors', '[\"Report Writing\",\"Literature Review\",\"Dissertation Writing\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\",\"Other\"]', '[\"All Computer Science Engineering subjects,Computer Science and Engineering,All subjects of Computer Science,Algorithms and Data Structures\"]', '2021-12-25 21:30', '2500', 'Password.txt_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(58, 55, 'Engineering', 'Smart kitchen', 'bla bla bla', 'Engineering', 'Bachelors', '[\"Programming/Coding Assignment\"]', '[\"Wireless Sensor Networks and IoT\"]', '2021-12-31 18:00', '9000', 'Drowsiness_Detection.ipynb_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(59, 56, 'Engineering', 'Smartt', 'bla', 'Engineering', 'Bachelors', '[\"Dissertation Writing\"]', '[\"AI & ML\"]', '2021-12-31 20:22', '0', 'o80zlzsa24781.jpg_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(60, 57, 'Engineering', 'Payment app system', 'Have to make a payment system using Tangle (dag network). Have Store data on sql and retirive it using the same ', 'Engineering', 'Bachelors', '[\"Programming/Coding Assignment\"]', '[\"Advanced Java,Android App Development,Android application\"]', '2022-01-02 20:59', '4000', 'Drowsiness_Detection (3).ipynb_$_', '2023-03-16 15:56:33', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(61, 61, 'Engineering', 'Planet Study', 'I want a case study on the milky way galaxy, our solar system, and all the planets in it. The case study should consist of beautiful pictures just  like the ones I am attaching below', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\",\"Case Studies\",\"Other\"]', '[\"Planetary,Solar system,Milky way galaxy\"]', '2022-01-07 19:30', '1000', '560837 (1).jpg_$_560815 (1).jpg_$_84291 (1).png_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 0, 0, 0, 0),
(62, 62, 'Engineering', 'Planet Study', 'I want a case study on the milky way galaxy, our solar system, and all the planets in it. The case study should consist of beautiful pictures just  like the ones I am attaching below', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\",\"Case Studies\",\"Other\"]', '[\"Planetary,Solar system,Milky way galaxy\"]', '2022-01-07 19:30', '1000', '560837 (1).jpg_$_560815 (1).jpg_$_84291 (1).png_$_', '2023-03-16 15:56:33', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(63, 63, 'Engineering', 'aknsdasd', 'kdfsdkdsbfdsbhfsjbfjdsb', 'engg', 'Bachelors', '[\"Thesis Writing\",\"Dissertation Writing\",\"Programming / Coding Assignment\"]', '[\"Machine Learning,Artificial Intelligence Deep Learning\"]', '2022-05-27 16:06', '2000', 'Amazon.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(64, 64, 'Engineering', 'ahsndj', 'aksjdnaskjdn', 'Engineering', 'Bachelors', '[\"Programming/Coding Assignment\"]', '\"Ad Maths (O levels),ad\"', '2022-01-06 01:50', '2000', 'euphoria.sql_$_', '2023-03-16 15:56:33', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(65, 65, 'Engineering', 'ahsndj', 'aksjdnaskjdn', 'Engineering', 'Bachelors', '[\"Programming/Coding Assignment\"]', '[\"B.E and D.El.Ed,Bachelor of Arts,ban\"]', '2022-01-06 01:50', '2000', 'euphoria.sql_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(66, 66, 'Engineering', 'Clothing App', 'I want to make a Clothing App', 'Engineering', 'Bachelors', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"Android App Development,Android app design,App deployment,App Development,Data science and machine learning,Machine Learning,Machine learning Python,Machine Learning Using Python,Machine learning with python,machine-learning\"]', '2022-01-08 18:20', '10000', 'Clothing App (1).pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(67, 67, 'Engineering', 'Clothing App', 'I want to make a Clothing App', 'Engineering', 'Bachelors', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"Android App Development,App Development,App Development without coding,App deployment,app-de\"]', '2022-01-08 18:20', '10000', 'Clothing App (1).pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(68, 68, 'Engineering', 'Clothing app', 'clothing ap', 'Engineering', 'Bachelors', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"Data science and machine learning,Android App Development,app-deve\"]', '2022-01-07 19:05', '2000', 'Clothing App (1).pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(69, 69, 'Engineering', 'Bifurcation', 'I want a bifurcation', 'Engineering', 'Bachelors', '[\"Dissertation Writing\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"PPT Making\"]', '[\"bifurcation,Coding and programming,Programming,Programming (Python),Programming Basics,Programming languages and compilers,programming\"]', '2022-01-13 12:00', '1500', 'Major Project-1 Report.docx (2).pdf_$_Can a documentarybe described as the creative representation of reality.docx_$_RISHABH BE 2021-22 FEES.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(70, 70, 'Engineering', 'report', 'report', 'Engineering', 'Bachelors', '[\"Statement of Purpose\",\"Programming/Coding Assignment\",\"PPT Making\",\"Research Paper\"]', '[\"PPT Presentation,ppt,Machine Learning,Machine Learning Using Python,Machine learning Python,Machine learning using MATLAB,Machine learning with python,machine-learning\"]', '2022-01-14 15:15', '2500', 'Major Project-1 Report.docx (1) (1).pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(71, 71, 'Engineering', 'report', 'report', 'Engineering', 'Bachelors', '[\"Statement of Purpose\",\"Programming/Coding Assignment\",\"PPT Making\",\"Research Paper\"]', '[\"PPT Presentation,ppt\"]', '2022-01-14 15:15', '2500', 'Major Project-1 Report.docx (1) (1).pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(72, 72, 'Engineering', '12345', '', 'engg', 'Choose Level', '[\"Programming/Coding Assignment\"]', '[\"Test Automation,test\"]', '2022-01-14 21:00', '1500', '_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(73, 73, 'Engineering', '12345', '', 'engg', 'Choose Level', '[\"Programming/Coding Assignment\"]', '[\"test\"]', '2022-01-14 23:10', '1500', '_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(74, 74, 'Engineering', '12345', '', 'engg', 'Choose Level', '[\"Programming/Coding Assignment\"]', '[\"test\"]', '2022-01-15 00:10', '1500', '_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(75, 75, 'Engineering', '12345', '', 'engg', 'Choose Level', '[\"Programming/Coding Assignment\"]', '[\"test\"]', '2022-01-15 00:10', '1500', '_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(76, 76, 'Engineering', 'testing', '', 'engg', 'Choose Level', '[\"Programming/Coding Assignment\"]', '[\"test\"]', '2022-01-14 00:14', '1500', '_$_', '2023-03-16 15:56:33', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(77, 77, 'Engineering', '12345', '', 'engg', 'Bachelors', '[\"Programming/Coding Assignment\"]', '[\"test\"]', '2022-01-14 22:15', '1500', '_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(78, 78, 'Engineering', 'joining', 'joining letter', 'engg', 'Bachelors', '[\"Statement of Purpose\",\"Programming/Coding Assignment\"]', '[\"Freelancing profile creation,freelancing\"]', '2022-01-30 20:20', '1500', 'Freelancer Joining Letter by Bluepen.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(79, 79, 'Engineering', 'legal', 'legal documentation', 'law', 'Bachelors', '[\"Programming/Coding Assignment\",\"PPT Making\"]', '[\"Law,Law of attraction,mou\"]', '2022-01-30 01:48', '2500', 'Bluepen Mou.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(80, 80, 'Engineering', 'testkjsadns', 'yeascsdlnakjlfdnslb', 'sdlsdl', 'Bachelors', '[\"Statement of Purpose\",\"Programming / Coding Assignment\",\"Blackbook\"]', '[\"iot,testing\"]', '2022-02-06 16:19', '15000', 'inbound5214230951830158116.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(81, 81, 'Engineering', 'freelancer test', 'this assignment is to test the file transfer in the freelancer panel', 'Engineerimg', 'Bachelors', '[\"Programming / Coding Assignment\",\"IOT/Hardware Projects\"]', '[\"Machine Learning\"]', '2022-06-30 13:37', '15000', '91 Services Website.pdf_$_REWARDS TERMS.pdf_$_inbound5101239842309466087.jpg_$_', '2023-03-16 15:56:33', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(82, 82, 'Engineering', 'sbfhj.kbkjbkb', 'ksjdfdskjb', 'sdlfn', 'Diploma', '[\"Programming / Coding Assignment\"]', '[\"Machine Learning\"]', '2022-06-03 22:10', '1500', 'REWARDS TERMS.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(83, 83, 'Engineering', 'sbfhj.kbkjbkb', 'ksjdfdskjb', 'sdlfn', 'Diploma', '[\"Programming / Coding Assignment\"]', '[\"Machine Learning\"]', '2022-06-03 22:10', '1500', 'REWARDS TERMS.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(84, 84, 'Engineering', 'sbfhj.kbkjbkb', 'ksjdfdskjb', 'sdlfn', 'Diploma', '[\"Programming / Coding Assignment\"]', '[\"Machine Learning\"]', '2022-06-03 22:10', '1500', 'REWARDS TERMS.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(85, 85, 'Engineering', 'sbfhj.kbkjbkb', 'ksjdfdskjb', 'sdlfn', 'Diploma', '[\"Programming / Coding Assignment\"]', '[\"Machine Learning\"]', '2022-06-03 22:10', '1500', 'REWARDS TERMS.pdf_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(86, 86, 'Engineering', 'freelancer test', 'this assignment is to test the file transfer in the freelancer panel', 'Engineerimg', 'Bachelors', '[\"Programming / Coding Assignment\",\"IOT/Hardware Projects\"]', '[\"Machine Learning\"]', '2022-06-30 13:37', '15000', 'logoblack.png_$_', '2023-03-16 15:56:33', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(87, 87, 'Medical', 'freelancer test', 'this assignment is to test the file transfer in the freelancer panel', 'Engineerimg', 'Bachelors', '[\"Programming / Coding Assignment\",\"IOT/Hardware Projects\"]', '[\"Machine Learning\"]', '2022-06-30 13:37', '15000', '91 Services Website.pdf_$_REWARDS TERMS.pdf_$_logoblack.png_$_', '2023-03-16 15:56:33', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(88, 88, 'Arts', 'test t', 'sdfjsdfsk', 'arts', 'Bachelors', '[\"Report Writing\"]', '[\"Machine Learning\"]', '2022-09-23 12:48', '1000', 'javascript.pdf_$_', '2023-03-16 15:56:33', '1', NULL, 1, 1, 0, 0, 0, 0, 0),
(89, 0, 'Engineering', 'test title', 'test description', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India,india,ind\"]', '2021-11-27 ', '1500', 'Course work.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(90, 1, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"ind,India\"]', '2021-12-02 ', '5000', '4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(91, 2, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '5000', '4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(92, 3, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '5000', '4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(93, 4, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '5000', '4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(178, 272, 'Engineering', 'sddsfdsf', 'terhjhmfdfsggjh', 'nghjhk,hjffhg', 'Bachelors', '[\"Programming / Coding\"]', '[\"nghgfb\",\"mhghjhgf\"]', '2023-06-24 04:20', '5000', '7696BillPayReceiptTataTele.pdf_$_7696BillPayReceiptTataTele April.pdf_$_7696bhavyas file.txt_$_', '01-06-2023 16:19:45', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(95, 6, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '5000', '4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(96, 7, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '2500', 'Finance Website Anand Bhai.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(97, 8, 'Engineering', 'python', 'i want a python assignment', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-02 ', '2500', 'Finance Website Anand Bhai.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(98, 9, 'Engineering', 'python', 'personal credit', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"\"]', '2021-12-21 ', '1500', '_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(99, 10, 'Engineering', 'python', 'personal credit', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"computer,India\"]', '2021-12-21 ', '1500', '_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(100, 11, 'Engineering', 'sql assignment', 'i want an sql assignemnt, details are in the files', 'Engineering', 'Bachelors', 'Programming Assignment', '[\"India\"]', '2021-12-05 ', '1000', 'rar-password.txt_$_F29AI-Coursework2-part1.pdf_$_CW2-Part2and3.zip_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(101, 12, 'Engineering', 'assignment title', 'assignment description', 'Engineering', '\"Bachelors\"', '', '[\"India,Ukraine\"]', '2021-12-24 00:19', '5000', 'CompilerDesign.pdf_$_F29AI-Coursework2-part1.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(102, 13, 'Engineering', 'assignment title here', 'assignment description here', 'Engineering', 'Bachelors', '', '[\"Falkland Islands (Malvinas)\"]', '2021-12-18 22:25', '2000', 'CompilerDesign.pdf_$_F29AI-Coursework2-part1.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(103, 14, 'Engineering', 'testsdlsdkn', 'alskdnnfkjsdfns', 'Engineering', 'Bachelors', '', '[\"India\"]', '2021-12-24 22:26', '2000', 'CompilerDesign.pdf_$_F29AI-Coursework2-part1.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(104, 15, 'Engineering', 'title', 'desc', 'Engineering', 'Diploma', '', '[\"India\"]', '2021-12-19 21:32', '2000', 'F29AI-Coursework2-part1.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(105, 16, 'Engineering', 'title', 'desc', 'Engineering', 'Diploma', '', '[\"India\"]', '2021-12-19 21:32', '2000', 'F29AI-Coursework2-part1.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(106, 17, 'Engineering', 'title', 'desc', 'Engineering', 'Diploma', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"India\"]', '2021-12-19 21:32', '2000', 'F29AI-Coursework2-part1.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(107, 18, 'Engineering', 'title', 'desc', 'Engineering', 'Diploma', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"India\"]', '2021-12-19 21:32', '2000', 'F29AI-Coursework2-part1.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(108, 19, 'Engineering', 'psychlogy', 'case study', 'Psychology', 'Masters', '[\"Report Writing\",\"Case Studies\"]', '[\"India\"]', '2021-12-26 22:35', '1500', 'CompilerDesign.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
(109, 21, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(110, 22, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(111, 23, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(112, 24, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(113, 25, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(114, 26, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(115, 27, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 1, 0),
(116, 28, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(117, 29, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(118, 30, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(119, 31, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 1, 0),
(120, 32, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Machine Learning Using Python\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(121, 33, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"AC fundamentals and electrical machines\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 0, 0, 0, 0, 0),
(122, 34, 'Engineering', 'test title', 'test desc', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\"]', '[\"Artificial intelligence\"]', '2021-12-23 20:15', '1000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 0, 0, 0, 0, 0),
(123, 35, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(124, 36, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 0, 0, 0),
(125, 37, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(126, 38, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(127, 39, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(128, 40, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(129, 41, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(130, 42, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(131, 43, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(132, 44, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', 'Array', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(133, 45, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', 'Array', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(134, 46, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 0, 0, 0, 0),
(135, 47, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(136, 48, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(137, 49, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(138, 50, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(139, 51, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(140, 52, 'Engineering', 'titeeleeee', 'descisfdmsfrgasdsfjgrn', 'Engineering', 'Bachelors', '[\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"All Computer Science Engineering subjects,All subjects of Computer Science,Algorithms and Data Structures,Advanced Data Structures\"]', '2021-12-25 14:15', '2000', 'resume300921.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(141, 53, 'Engineering', 'assignment title', 'assignment description', 'Engineering', 'Bachelors', '[\"Report Writing\",\"Literature Review\",\"Dissertation Writing\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\",\"Other\"]', '[\"All Computer Science Engineering subjects,Computer Science and Engineering,All subjects of Computer Science,Algorithms and Data Structures\"]', '2021-12-25 21:30', '2500', 'Password.txt_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(142, 54, 'Engineering', 'assignment title', 'assignment description', 'Engineering', 'Bachelors', '[\"Report Writing\",\"Literature Review\",\"Dissertation Writing\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\",\"Other\"]', '[\"All Computer Science Engineering subjects,Computer Science and Engineering,All subjects of Computer Science,Algorithms and Data Structures\"]', '2021-12-25 21:30', '2500', 'Password.txt_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(143, 55, 'Engineering', 'Smart kitchen', 'bla bla bla', 'Engineering', 'Bachelors', '[\"Programming/Coding Assignment\"]', '[\"Wireless Sensor Networks and IoT\"]', '2021-12-31 18:00', '9000', 'Drowsiness_Detection.ipynb_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(144, 56, 'Engineering', 'Smartt', 'bla', 'Engineering', 'Bachelors', '[\"Dissertation Writing\"]', '[\"AI & ML\"]', '2021-12-31 20:22', '0', 'o80zlzsa24781.jpg_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(145, 57, 'Engineering', 'Payment app system', 'Have to make a payment system using Tangle (dag network). Have Store data on sql and retirive it using the same ', 'Engineering', 'Bachelors', '[\"Programming/Coding Assignment\"]', '[\"Advanced Java,Android App Development,Android application\"]', '2022-01-02 20:59', '4000', 'Drowsiness_Detection (3).ipynb_$_', '2023-03-26 12:57:34', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(146, 61, 'Engineering', 'Planet Study', 'I want a case study on the milky way galaxy, our solar system, and all the planets in it. The case study should consist of beautiful pictures just  like the ones I am attaching below', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\",\"Case Studies\",\"Other\"]', '[\"Planetary,Solar system,Milky way galaxy\"]', '2022-01-07 19:30', '1000', '560837 (1).jpg_$_560815 (1).jpg_$_84291 (1).png_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 0, 0, 0, 0),
(147, 62, 'Engineering', 'Planet Study', 'I want a case study on the milky way galaxy, our solar system, and all the planets in it. The case study should consist of beautiful pictures just  like the ones I am attaching below', 'Engineering', 'Bachelors', '[\"Essay Writing\",\"Report Writing\",\"Case Studies\",\"Other\"]', '[\"Planetary,Solar system,Milky way galaxy\"]', '2022-01-07 19:30', '1000', '560837 (1).jpg_$_560815 (1).jpg_$_84291 (1).png_$_', '2023-03-26 12:57:34', '1', NULL, -1, -1, -1, -1, -1, -1, 1),
(148, 63, 'Engineering', 'aknsdasd', 'kdfsdkdsbfdsbhfsjbfjdsb', 'engg', 'Bachelors', '[\"Thesis Writing\",\"Dissertation Writing\",\"Programming / Coding Assignment\"]', '[\"Machine Learning,Artificial Intelligence Deep Learning\"]', '2022-05-27 16:06', '2000', 'Amazon.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(149, 64, 'Engineering', 'ahsndj', 'aksjdnaskjdn', 'Engineering', 'Bachelors', '[\"Programming/Coding Assignment\"]', '\"Ad Maths (O levels),ad\"', '2022-01-06 01:50', '2000', 'euphoria.sql_$_', '2023-03-26 12:57:34', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(150, 65, 'Engineering', 'ahsndj', 'aksjdnaskjdn', 'Engineering', 'Bachelors', '[\"Programming/Coding Assignment\"]', '[\"B.E and D.El.Ed,Bachelor of Arts,ban\"]', '2022-01-06 01:50', '2000', 'euphoria.sql_$_', '2023-03-26 12:57:34', '1', NULL, 1, 1, 1, 1, 1, 0, 0),
(151, 66, 'Engineering', 'Clothing App', 'I want to make a Clothing App', 'Engineering', 'Bachelors', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"Android App Development,Android app design,App deployment,App Development,Data science and machine learning,Machine Learning,Machine learning Python,Machine Learning Using Python,Machine learning with python,machine-learning\"]', '2022-01-08 18:20', '10000', 'Clothing App (1).pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(152, 67, 'Engineering', 'Clothing App', 'I want to make a Clothing App', 'Engineering', 'Bachelors', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"Android App Development,App Development,App Development without coding,App deployment,app-de\"]', '2022-01-08 18:20', '10000', 'Clothing App (1).pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(153, 68, 'Engineering', 'Clothing app', 'clothing ap', 'Engineering', 'Bachelors', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', '[\"Data science and machine learning,Android App Development,app-deve\"]', '2022-01-07 19:05', '2000', 'Clothing App (1).pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(154, 69, 'Engineering', 'Bifurcation', 'I want a bifurcation', 'Engineering', 'Bachelors', '[\"Dissertation Writing\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"PPT Making\"]', '[\"bifurcation,Coding and programming,Programming,Programming (Python),Programming Basics,Programming languages and compilers,programming\"]', '2022-01-13 12:00', '1500', 'Major Project-1 Report.docx (2).pdf_$_Can a documentarybe described as the creative representation of reality.docx_$_RISHABH BE 2021-22 FEES.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(155, 70, 'Engineering', 'report', 'report', 'Engineering', 'Bachelors', '[\"Statement of Purpose\",\"Programming/Coding Assignment\",\"PPT Making\",\"Research Paper\"]', '[\"PPT Presentation,ppt,Machine Learning,Machine Learning Using Python,Machine learning Python,Machine learning using MATLAB,Machine learning with python,machine-learning\"]', '2022-01-14 15:15', '2500', 'Major Project-1 Report.docx (1) (1).pdf_$_', '2023-03-26 12:57:34', '2', NULL, 1, 1, 1, 1, 1, 0, 0);
INSERT INTO `assignment_freelance` (`id`, `assignment_id`, `stream`, `title`, `description`, `course`, `level`, `type`, `subject_tags`, `deadline`, `budget`, `files`, `submission_date`, `project_manager`, `freelancer`, `posted`, `under_process`, `assigned_to_pm`, `assigned_to_freelancer`, `completed`, `review_recieved`, `lost`) VALUES
(156, 71, 'Engineering', 'report', 'report', 'Engineering', 'Bachelors', '[\"Statement of Purpose\",\"Programming/Coding Assignment\",\"PPT Making\",\"Research Paper\"]', '[\"PPT Presentation,ppt\"]', '2022-01-14 15:15', '2500', 'Major Project-1 Report.docx (1) (1).pdf_$_', '2023-03-26 12:57:34', '2', NULL, 1, 0, 0, 0, 0, 0, 0),
(157, 72, 'Engineering', '12345', '', 'engg', 'Choose Level', '[\"Programming/Coding Assignment\"]', '[\"Test Automation,test\"]', '2022-01-14 21:00', '1500', '_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(158, 73, 'Engineering', '12345', '', 'engg', 'Choose Level', '[\"Programming/Coding Assignment\"]', '[\"test\"]', '2022-01-14 23:10', '1500', '_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(159, 74, 'Engineering', '12345', '', 'engg', 'Choose Level', '[\"Programming/Coding Assignment\"]', '[\"test\"]', '2022-01-15 00:10', '1500', '_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(160, 75, 'Engineering', '12345', '', 'engg', 'Choose Level', '[\"Programming/Coding Assignment\"]', '[\"test\"]', '2022-01-15 00:10', '1500', '_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(161, 76, 'Engineering', 'testing', '', 'engg', 'Choose Level', '[\"Programming/Coding Assignment\"]', '[\"test\"]', '2022-01-14 00:14', '1500', '_$_', '2023-03-26 12:57:34', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(162, 77, 'Engineering', '12345', '', 'engg', 'Bachelors', '[\"Programming/Coding Assignment\"]', '[\"test\"]', '2022-01-14 22:15', '1500', '_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(163, 78, 'Engineering', 'joining', 'joining letter', 'engg', 'Bachelors', '[\"Statement of Purpose\",\"Programming/Coding Assignment\"]', '[\"Freelancing profile creation,freelancing\"]', '2022-01-30 20:20', '1500', 'Freelancer Joining Letter by Bluepen.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(164, 79, 'Engineering', 'legal', 'legal documentation', 'law', 'Bachelors', '[\"Programming/Coding Assignment\",\"PPT Making\"]', '[\"Law,Law of attraction,mou\"]', '2022-01-30 01:48', '2500', 'Bluepen Mou.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(165, 80, 'Engineering', 'testkjsadns', 'yeascsdlnakjlfdnslb', 'sdlsdl', 'Bachelors', '[\"Statement of Purpose\",\"Programming / Coding Assignment\",\"Blackbook\"]', '[\"iot,testing\"]', '2022-02-06 16:19', '15000', 'inbound5214230951830158116.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(166, 81, 'Engineering', 'freelancer test', 'this assignment is to test the file transfer in the freelancer panel', 'Engineerimg', 'Bachelors', '[\"Programming / Coding Assignment\",\"IOT/Hardware Projects\"]', '[\"Machine Learning\"]', '2022-06-30 13:37', '15000', '91 Services Website.pdf_$_REWARDS TERMS.pdf_$_inbound5101239842309466087.jpg_$_', '2023-03-26 12:57:34', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(167, 82, 'Engineering', 'sbfhj.kbkjbkb', 'ksjdfdskjb', 'sdlfn', 'Diploma', '[\"Programming / Coding Assignment\"]', '[\"Machine Learning\"]', '2022-06-03 22:10', '1500', 'REWARDS TERMS.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(168, 83, 'Engineering', 'sbfhj.kbkjbkb', 'ksjdfdskjb', 'sdlfn', 'Diploma', '[\"Programming / Coding Assignment\"]', '[\"Machine Learning\"]', '2022-06-03 22:10', '1500', 'REWARDS TERMS.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(169, 84, 'Engineering', 'sbfhj.kbkjbkb', 'ksjdfdskjb', 'sdlfn', 'Diploma', '[\"Programming / Coding Assignment\"]', '[\"Machine Learning\"]', '2022-06-03 22:10', '1500', 'REWARDS TERMS.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(170, 85, 'Engineering', 'sbfhj.kbkjbkb', 'ksjdfdskjb', 'sdlfn', 'Diploma', '[\"Programming / Coding Assignment\"]', '[\"Machine Learning\"]', '2022-06-03 22:10', '1500', 'REWARDS TERMS.pdf_$_', '2023-03-26 12:57:34', NULL, NULL, 1, 1, 1, 1, 1, 0, 0),
(171, 86, 'Engineering', 'freelancer test', 'this assignment is to test the file transfer in the freelancer panel', 'Engineerimg', 'Bachelors', '[\"Programming / Coding Assignment\",\"IOT/Hardware Projects\"]', '[\"Machine Learning\"]', '2022-06-30 13:37', '15000', 'logoblack.png_$_', '2023-03-26 12:57:34', '3', NULL, 1, 1, 1, 1, 1, 0, 0),
(172, 87, 'Medical', 'freelancer test', 'this assignment is to test the file transfer in the freelancer panel', 'Engineerimg', 'Bachelors', '[\"Programming / Coding Assignment\",\"IOT/Hardware Projects\"]', '[\"Machine Learning\"]', '2022-06-30 13:37', '15000', '91 Services Website.pdf_$_REWARDS TERMS.pdf_$_logoblack.png_$_', '2023-03-26 12:57:34', NULL, NULL, -1, -1, -1, -1, -1, -1, 1),
(173, 88, 'Arts', 'test t', 'sdfjsdfsk', 'arts', 'Bachelors', '[\"Report Writing\"]', '[\"Machine Learning\"]', '2022-09-23 12:48', '1000', 'javascript.pdf_$_', '2023-03-26 12:57:34', '1', NULL, 1, 1, 0, 0, 0, 0, 0),
(174, 255, 'Engineering', 'anomaly detection', 'anomaly detection', 'enggineering', 'Masters', '[\"blackbook\",\"research paper\",\"programming / coding\",\"ppt\"]', '', '2023-04-10 18:00', '5000', '7759requirements.txt_$_7759models.py_$_7759meta-events2.csv_$_', '05-04-2023 17:55:09', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(175, 256, 'Engineering', 'anomaly detection', 'I want a project on anomaly detection', 'engineering', 'Bachelors', '[\"blackbook\",\"research paper\",\"programming / coding\",\"ppt\"]', 'null', '2023-04-29T08:30:46.000Z', '3000', '7759requirements.txt_$_7759models.py_$_7759meta-events2.csv_$_', '05-04-2023 17:57:11', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(176, 257, 'Engineering', 'anomaly detection', 'I want a project on anomaly detection', 'engineering', 'Bachelors', '[\"blackbook\",\"research paper\",\"programming / coding\",\"ppt\"]', 'null', '2023-04-29T08:30:46.000Z', '3000', '7759requirements.txt_$_7759models.py_$_7759meta-events2.csv_$_', '05-04-2023 17:59:16', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(177, 258, 'Engineering', 'thyroid disease detection', 'I want a deep learning based project on thyroid disease detection. ultrasonic images can be used  ', 'engg', 'Bachelors', '[\"blackbook\",\"research paper\",\"programming / coding\",\"ppt\"]', '[\"Machine Learning\",\"Deep Learning\"]', '2023-04-10 18:00', '3500', '1597requirements.txt_$_1597app.py_$_', '05-04-2023 18:51:56', NULL, NULL, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_inquiries`
--

DROP TABLE IF EXISTS `assignment_inquiries`;
CREATE TABLE IF NOT EXISTS `assignment_inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment_inquiries`
--

INSERT INTO `assignment_inquiries` (`id`, `assignment_id`, `freelancer_id`, `status`) VALUES
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
(53, 97, 60, 1),
(54, 88, 93, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_map`
--

DROP TABLE IF EXISTS `assignment_map`;
CREATE TABLE IF NOT EXISTS `assignment_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `domain` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=273 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment_map`
--

INSERT INTO `assignment_map` (`id`, `user_id`, `domain`) VALUES
(1, 5, 'Freelancer'),
(2, 5, 'Freelancer'),
(3, 5, 'Freelancer'),
(4, 24, 'Freelancer'),
(270, 24, 'Freelancer'),
(6, 24, 'Freelancer'),
(7, 24, 'Freelancer'),
(8, 24, 'Freelancer'),
(9, 24, 'Freelancer'),
(10, 24, 'Freelancer'),
(11, 24, 'Freelancer'),
(12, 24, 'Freelancer'),
(13, 24, 'Freelancer'),
(14, 24, 'Freelancer'),
(15, 24, 'Freelancer'),
(16, 24, 'Freelancer'),
(17, 24, 'Freelancer'),
(18, 24, 'Freelancer'),
(19, 24, 'Freelancer'),
(20, 24, 'Freelancer'),
(21, 24, 'Freelancer'),
(22, 24, 'Freelancer'),
(23, 24, 'Freelancer'),
(24, 24, 'Freelancer'),
(25, 24, 'Freelancer'),
(26, 24, 'Freelancer'),
(27, 24, 'Freelancer'),
(28, 24, 'Freelancer'),
(29, 24, 'Freelancer'),
(30, 24, 'Freelancer'),
(31, 24, 'Freelancer'),
(32, 24, 'Freelancer'),
(33, 24, 'Freelancer'),
(34, 24, 'Freelancer'),
(35, 24, 'Freelancer'),
(36, 24, 'Freelancer'),
(37, 24, 'Freelancer'),
(38, 24, 'Freelancer'),
(39, 24, 'Freelancer'),
(40, 24, 'Freelancer'),
(41, 24, 'Freelancer'),
(42, 24, 'Freelancer'),
(43, 24, 'Freelancer'),
(44, 24, 'Freelancer'),
(45, 24, 'Freelancer'),
(46, 24, 'Freelancer'),
(47, 24, 'Freelancer'),
(48, 24, 'Freelancer'),
(49, 24, 'Freelancer'),
(50, 24, 'Freelancer'),
(51, 24, 'Freelancer'),
(52, 24, 'Freelancer'),
(53, 24, 'Freelancer'),
(54, 24, 'Freelancer'),
(55, 24, 'Freelancer'),
(56, 24, 'Freelancer'),
(57, 24, 'Freelancer'),
(58, 24, 'Freelancer'),
(59, 24, 'Freelancer'),
(60, 24, 'Freelancer'),
(61, 24, 'Freelancer'),
(62, 24, 'Freelancer'),
(63, 24, 'Freelancer'),
(64, 24, 'Freelancer'),
(65, 24, 'Freelancer'),
(66, 24, 'Freelancer'),
(67, 24, 'Freelancer'),
(68, 24, 'Freelancer'),
(69, 24, 'Freelancer'),
(70, 24, 'Freelancer'),
(71, 24, 'Freelancer'),
(72, 24, 'Freelancer'),
(73, 24, 'Freelancer'),
(74, 24, 'Freelancer'),
(75, 24, 'Freelancer'),
(76, 24, 'Freelancer'),
(77, 24, 'Freelancer'),
(78, 24, 'Freelancer'),
(79, 24, 'Freelancer'),
(80, 24, 'Freelancer'),
(81, 24, 'Freelancer'),
(82, 4, 'Freelancer'),
(83, 24, 'Freelancer'),
(84, 24, 'Freelancer'),
(85, 24, 'Freelancer'),
(86, 24, 'Freelancer'),
(87, 24, 'Freelancer'),
(88, 24, 'Freelancer'),
(93, 24, 'Freelancer'),
(94, 24, 'Freelancer'),
(95, 24, 'Freelancer'),
(96, 24, 'Freelancer'),
(97, 24, 'Freelancer'),
(98, 24, 'Freelancer'),
(99, 24, 'Freelancer'),
(100, 24, 'Freelancer'),
(101, 24, 'Freelancer'),
(102, 24, 'Freelancer'),
(103, 24, 'Freelancer'),
(104, 24, 'Freelancer'),
(105, 24, 'Freelancer'),
(106, 24, 'Freelancer'),
(107, 24, 'Freelancer'),
(108, 24, 'Freelancer'),
(109, 24, 'Freelancer'),
(110, 24, 'Freelancer'),
(111, 24, 'Freelancer'),
(112, 24, 'Freelancer'),
(113, 24, 'Freelancer'),
(114, 24, 'Freelancer'),
(115, 24, 'Freelancer'),
(116, 24, 'Freelancer'),
(117, 24, 'Freelancer'),
(118, 24, 'Freelancer'),
(119, 24, 'Freelancer'),
(120, 24, 'Freelancer'),
(121, 24, 'Freelancer'),
(122, 24, 'Freelancer'),
(123, 24, 'Freelancer'),
(124, 24, 'Freelancer'),
(125, 24, 'Freelancer'),
(126, 24, 'Freelancer'),
(127, 24, 'Freelancer'),
(128, 24, 'Freelancer'),
(129, 24, 'Freelancer'),
(130, 24, 'Freelancer'),
(131, 24, 'Freelancer'),
(132, 24, 'Freelancer'),
(133, 24, 'Freelancer'),
(134, 24, 'Freelancer'),
(135, 24, 'Freelancer'),
(136, 24, 'Freelancer'),
(137, 24, 'Freelancer'),
(138, 24, 'Freelancer'),
(139, 24, 'Freelancer'),
(140, 24, 'Freelancer'),
(141, 24, 'Freelancer'),
(142, 24, 'Freelancer'),
(143, 24, 'Freelancer'),
(144, 24, 'Freelancer'),
(145, 24, 'Freelancer'),
(146, 24, 'Freelancer'),
(147, 24, 'Freelancer'),
(148, 24, 'Freelancer'),
(149, 24, 'Freelancer'),
(150, 24, 'Freelancer'),
(151, 24, 'Freelancer'),
(152, 24, 'Freelancer'),
(153, 24, 'Freelancer'),
(154, 24, 'Freelancer'),
(155, 24, 'Freelancer'),
(156, 24, 'Freelancer'),
(157, 24, 'Freelancer'),
(158, 24, 'Freelancer'),
(159, 24, 'Freelancer'),
(160, 24, 'Freelancer'),
(161, 24, 'Freelancer'),
(162, 24, 'Freelancer'),
(163, 24, 'Freelancer'),
(164, 24, 'Freelancer'),
(165, 24, 'Freelancer'),
(166, 24, 'Freelancer'),
(167, 24, 'Freelancer'),
(168, 24, 'Freelancer'),
(169, 24, 'Freelancer'),
(170, 24, 'Freelancer'),
(171, 4, 'Freelancer'),
(172, 24, 'Freelancer'),
(173, 24, 'Freelancer'),
(174, 24, 'Freelancer'),
(175, 24, 'Freelancer'),
(176, 24, 'Freelancer'),
(177, 24, 'Freelancer'),
(178, 24, 'Freelancer'),
(179, 24, 'Freelancer'),
(180, 24, 'Freelancer'),
(181, 24, 'Freelancer'),
(182, 24, 'Writing'),
(183, 17, 'Writing'),
(184, 6, 'Writing'),
(185, 19, 'Writing'),
(186, 24, 'Writing'),
(187, 6, 'Writing'),
(188, 6, 'Writing'),
(189, 6, 'Writing'),
(190, 6, 'Writing'),
(191, 6, 'Writing'),
(192, 6, 'Writing'),
(193, 6, 'Writing'),
(194, 6, 'Writing'),
(195, 6, 'Writing'),
(196, 6, 'Writing'),
(197, 6, 'Writing'),
(198, 6, 'Writing'),
(199, 6, 'Writing'),
(200, 6, 'Writing'),
(201, 6, 'Writing'),
(202, 6, 'Writing'),
(203, 6, 'Writing'),
(204, 6, 'Writing'),
(205, 8, 'Writing'),
(206, 6, 'Writing'),
(207, 6, 'Writing'),
(208, 6, 'Writing'),
(209, 6, 'Writing'),
(210, 6, 'Writing'),
(211, 6, 'Writing'),
(212, 12, 'Writing'),
(213, 12, 'Writing'),
(214, 12, 'Writing'),
(215, 12, 'Writing'),
(216, 12, 'Writing'),
(217, 12, 'Writing'),
(218, 12, 'Writing'),
(219, 12, 'Writing'),
(220, 12, 'Writing'),
(221, 12, 'Writing'),
(222, 12, 'Writing'),
(223, 24, 'Writing'),
(224, 24, 'Writing'),
(225, 24, 'Writing'),
(226, 21, 'Writing'),
(227, 24, 'Writing'),
(228, 24, 'Writing'),
(229, 24, 'Writing'),
(230, 4, 'Writing'),
(231, 24, 'Writing'),
(232, 24, 'Writing'),
(233, 24, 'Writing'),
(234, 24, 'Writing'),
(235, 24, 'Writing'),
(236, 24, 'Writing'),
(237, 24, 'Writing'),
(238, 24, 'Writing'),
(239, 24, 'Writing'),
(240, 24, 'Writing'),
(241, 24, 'Writing'),
(242, 24, 'Writing'),
(243, 24, 'Writing'),
(244, 23, 'Writing'),
(245, 24, 'Writing'),
(246, 24, 'Writing'),
(247, 24, 'Writing'),
(248, 24, 'Writing'),
(249, 24, 'Writing'),
(250, 24, 'Technical Drawing'),
(251, 24, 'Technical Drawing'),
(252, 24, 'Typing'),
(253, 24, 'Typing'),
(254, 24, 'Typing'),
(255, 24, 'Freelancer'),
(256, 24, 'Freelancer'),
(257, 24, 'Freelancer'),
(258, 24, 'Freelancer'),
(259, 24, 'Writing'),
(264, 24, 'Art'),
(261, 24, 'ED'),
(262, 24, 'ED'),
(263, 24, 'ED'),
(265, 24, 'Typing'),
(266, 24, 'Typing'),
(267, 24, 'Typing'),
(268, 24, 'Art'),
(269, 24, 'Art'),
(271, 24, 'Freelancer'),
(272, 24, 'Freelancer');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_typing`
--

DROP TABLE IF EXISTS `assignment_typing`;
CREATE TABLE IF NOT EXISTS `assignment_typing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `copy` text NOT NULL,
  `city` text,
  `font` text NOT NULL,
  `font_size` text NOT NULL,
  `font_color` text NOT NULL,
  `orientation` text NOT NULL,
  `page_size` text NOT NULL,
  `margins` text NOT NULL,
  `number_of_pages` int(11) NOT NULL,
  `calculations` text NOT NULL,
  `budget` int(11) NOT NULL,
  `deadline_datetime` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `instructions` text,
  `is_active` int(11) NOT NULL,
  `file` text NOT NULL,
  `writing_manager` text,
  `writer` text,
  `posted` tinyint(4) NOT NULL,
  `under_process` tinyint(4) NOT NULL,
  `assigned_to_wm` tinyint(4) NOT NULL,
  `assigned_to_writer` tinyint(4) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `review_received` tinyint(4) NOT NULL,
  `lost` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment_typing`
--

INSERT INTO `assignment_typing` (`id`, `assignment_id`, `copy`, `city`, `font`, `font_size`, `font_color`, `orientation`, `page_size`, `margins`, `number_of_pages`, `calculations`, `budget`, `deadline_datetime`, `date_of_submission`, `instructions`, `is_active`, `file`, `writing_manager`, `writer`, `posted`, `under_process`, `assigned_to_wm`, `assigned_to_writer`, `completed`, `review_received`, `lost`) VALUES
(1, 252, '', 'Mumbai', 'best', '24', '2555a6', 'Portrait', 'A3', 'Normal', 25, 'yes', 0, '2023-01-21 15:49', '06-01-2023 15:32:53', 'slkfnsdjkfnskj', 1, 'dece.pdf_$_', '', '', 1, 0, 0, 0, 0, 0, 0),
(2, 253, '', 'Mumbai', 'good', '15', 'sdlfn', 'Portrait', 'A3', 'Normal', 151, 'yes', 0, '2024-01-01 15:49', '06-01-2023 15:31:35', 'slkfnsdjkfnskj', 0, 'dece.pdf_$_', '', '', 1, 0, 0, 0, 0, 0, 0),
(3, 254, '', 'Mumbai', 'good', '15', 'sdlfn', 'Portrait', 'A3', 'Normal', 151, 'yes', 0, '2024-01-01 15:49', '06-01-2023 15:31:46', 'slkfnsdjkfnskj', 1, 'dece.pdf_$_', '', '', 1, 0, 0, 0, 0, 0, 0),
(4, 266, 'Both', 'mumbai', 'beyno', '18', 'black', 'Portrait', 'A4', 'Wide', 20, 'No', 500, '04-08-2023 12:00', '06-04-2023 15:28:47', 'good work is expected', 1, '5851main_$_5851Msaini.cpp_$_5851Hcheema.cpp_$_', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(5, 267, 'Both', 'mumbai', 'beyno', '18', 'black', 'Portrait', 'A4', 'Wide', 20, 'No', 500, '04-08-2023 12:00', '06-04-2023 15:30:24', 'good work is expected', 1, '5851main_$_5851Msaini.cpp_$_5851Hcheema.cpp_$_', NULL, NULL, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_update`
--

DROP TABLE IF EXISTS `assignment_update`;
CREATE TABLE IF NOT EXISTS `assignment_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `field` text NOT NULL,
  `value` text NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment_update`
--

INSERT INTO `assignment_update` (`id`, `assignment_id`, `field`, `value`, `updated_on`) VALUES
(1, 255, 'title', '', '2023-05-30 16:59:18'),
(2, 255, 'title', '', '2023-05-30 16:59:26'),
(3, 255, 'title', '17-04-1998', '2023-05-30 16:59:54'),
(4, 255, 'title', '17-04-1998', '2023-05-30 17:00:08'),
(5, 255, 'description', 'I want a project on anomaly detection', '2023-05-30 17:02:56'),
(6, 255, 'subject tags', '', '2023-05-30 18:00:57'),
(7, 88, 'subject tags', '[\"Arts\"]', '2023-05-30 18:01:51'),
(8, 88, 'subject tags', '[\"Arts\"]', '2023-05-30 18:02:29'),
(9, 88, 'subject tags', 'anomaly detection', '2023-05-30 18:03:04'),
(10, 88, 'subject tags', '[\"Machine Learning\"]', '2023-05-30 18:04:12'),
(11, 255, 'deadline', '2023-04-29T08:30:46.000Z', '2023-05-31 11:52:51'),
(12, 255, 'course', 'engineering', '2023-05-31 11:56:50'),
(13, 255, 'course', 'engg', '2023-05-31 11:57:22'),
(14, 255, 'type', 'Array', '2023-05-31 12:01:10'),
(15, 255, 'type', '[\"Report Writing\"]', '2023-05-31 12:03:47'),
(16, 255, 'level', 'Bachelors', '2023-05-31 12:08:25'),
(17, 255, 'budget', '3000', '2023-05-31 12:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_writing`
--

DROP TABLE IF EXISTS `assignment_writing`;
CREATE TABLE IF NOT EXISTS `assignment_writing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `city` text,
  `ink_color` text NOT NULL,
  `submission_datetime` text NOT NULL,
  `delivery_datetime` text NOT NULL,
  `copy` text NOT NULL,
  `sheets` text NOT NULL,
  `sides` text,
  `diagrams` text NOT NULL,
  `content` text NOT NULL,
  `budget` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `instructions` text NOT NULL,
  `posted` tinyint(4) NOT NULL,
  `under_process` tinyint(4) NOT NULL,
  `assigned_to_wm` tinyint(4) NOT NULL,
  `assigned_to_writer` tinyint(4) NOT NULL,
  `completed` tinyint(4) NOT NULL,
  `review_received` tinyint(4) NOT NULL,
  `lost` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment_writing`
--

INSERT INTO `assignment_writing` (`id`, `assignment_id`, `file_name`, `city`, `ink_color`, `submission_datetime`, `delivery_datetime`, `copy`, `sheets`, `sides`, `diagrams`, `content`, `budget`, `is_active`, `instructions`, `posted`, `under_process`, `assigned_to_wm`, `assigned_to_writer`, `completed`, `review_received`, `lost`) VALUES
(4, 183, 'Rujra Bhatt_Resume_V4.docx_$_Placement App using Flutter.pdf_$_Flutter Workout App.pdf_$_', '', 'Blue', '2022-03-17 17:38:06', '2021-08-02 ', 'Soft Copy', 'Assignment Sheets', '', '', '', 0, 1, 'write properly', 1, 1, 0, 0, 0, 0, 0),
(3, 182, 'Frame 1.pdf_$_', '', 'Blue', '2022-03-17 16:41:21', '2022-01-12 ', 'Soft Copy', 'Assignment Sheets', '', '', '', 0, 1, 'aldnasndaskjn', 1, 0, 0, 0, 0, 0, 0),
(5, 184, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Blue', '2022-03-17 17:38:16', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 1, 1, 0, 0, 0, 0),
(6, 185, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 17:38:36', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 1, 1, 1, 0, 0, 0),
(7, 186, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-07-04 13:07:38', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 1, 1, 1, 1, 1, 0),
(8, 187, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 17:39:03', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 1, 1, 1, 1, 1, 0),
(9, 188, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(10, 189, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(11, 190, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(12, 191, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(13, 192, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(14, 193, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(15, 194, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(16, 195, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(17, 196, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(18, 197, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(19, 198, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(20, 199, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(21, 200, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(22, 201, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(23, 202, 'bhavyaharia100@gmail.comSpeech.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(24, 203, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Black', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(25, 204, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(26, 205, 'kaushik@test123.comExternal_ Chrome, NSS, and OpenSSL.pdf', '', 'Black', '2022-03-17 16:41:21', '2020-06-01 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(27, 206, 'bhavyaharia100@gmail.comSEM 8 Exam Form.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-30 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(28, 207, 'bhavyaharia100@gmail.comSEM 8 Exam Form.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-31 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(29, 208, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Black', '2022-03-17 16:41:21', '2020-06-08 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(30, 209, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-31 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(31, 210, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-05-31 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(32, 211, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Black', '2022-03-17 16:41:21', '2020-05-31 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(33, 212, 'bhavyaharia100@gmail.comRushabh SEM 7 Report final.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-10-29 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(34, 213, 'bhavyaharia100@gmail.comSEM 8 Exam Form.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-10-29 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(35, 214, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-10-21 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(36, 215, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-10-24 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(37, 216, 'bhavyaharia100@gmail.comHackathon 2018 Certificate.pdf', '', 'Black', '2022-03-17 16:41:21', '2020-11-25 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(38, 217, 'bhavyaharia100@gmail.com20200225+EDM+SemVIII ILOC+SMJ.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-10-30 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(39, 218, 'bhavyaharia100@gmail.com20200225+EDM+SemVIII ILOC+SMJ.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-11-07 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(40, 219, 'bhavyaharia100@gmail.comHostinger Receipt.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-12-05 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(41, 220, 'bhavyaharia100@gmail.comSEM 7 KT Fees.pdf', '', 'Blue', '2022-03-17 16:41:21', '2020-12-04 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(42, 221, 'Hostinger Receipt.pdf_$_Best Paper Certificate.png_$_', '', 'Blue', '2022-03-17 16:41:21', '2020-11-29 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(43, 222, 'Mahanagar Gas July 2020.pdf_$_Invoice.pdf_$_Hostinger Receipt.pdf_$_CompilerDesign.pdf_$_', '', 'Blue', '2022-03-17 16:41:21', '2021-02-16 ', '', '', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(44, 223, 'Frame 1.pdf_$_', '', 'Blue', '2022-03-17 16:41:21', '2022-01-12 ', 'Soft Copy', 'Assignment Sheets', '', '', '', 0, 1, 'aldnasndaskjn', 1, 0, 0, 0, 0, 0, 0),
(45, 224, 'Frame 1.pdf_$_', '', 'Blue', '2022-03-17 16:41:21', '2022-01-12 ', 'Soft Copy', 'Assignment Sheets', '', '', '', 0, 1, 'aldnasndaskjn', 1, 0, 0, 0, 0, 0, 0),
(46, 225, 'Frame 1.pdf_$_', '', 'Blue', '2022-03-17 16:41:21', '2022-01-12 ', 'Soft Copy', 'Assignment Sheets', '', '', '', 0, 1, 'aldnasndaskjn', 1, 0, 0, 0, 0, 0, 0),
(47, 226, '', '', 'Black', '2022-03-17 16:41:21', '2022-01-15 ', 'Soft Copy', 'Assignment Sheets', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(48, 227, '../assignments/MarketPlace_spacefor_spaceHealth_spaceSolutions_space_leftround1_rightround_exclamation_at_ht_percent_power_and.pdf_$_../assignments/inbound5214230951830158116_space_leftround1_rightround.pdf_$_', '', 'Black', '2022-06-17 16:36:49', '2022-03-17 ', 'Hard Copy', 'Assignment Sheets', '', '', '', 0, 1, 'dfg', 1, 1, 1, 1, 1, 0, 0),
(49, 228, '../assignments/MarketPlace_spacefor_spaceHealth_spaceSolutions_space_leftround1_rightround_exclamation_at_ht_percent_power_and.pdf_$_../assignments/inbound5214230951830158116_space_leftround1_rightround.pdf_$_', '', 'Black', '2022-06-16 12:59:34', '2022-03-17 ', 'Hard Copy', 'Assignment Sheets', '', '', '', 0, 1, 'dfg', 1, 1, 1, 1, 1, 0, 0),
(50, 229, 'Fitness App Sem 8 Blackbook (1).pdf_$_Product_sentiment_analysis_BB (1).pdf_$_', '', 'Black', '2022-06-16 12:47:38', '2022-05-22 ', 'Hard Copy', 'Assignment Sheets', '', '', '', 0, 1, 'sgdh fht', 1, 1, 1, 1, 1, 0, 0),
(51, 230, 'Instant-3.pdf_$_Instant-2.pdf_$_Instant-1.pdf_$_', '', 'Blue', '2022-06-21 14:10:35', '2022-06-22 ', 'Hard Copy', 'Long Book Sheets', '', '', '', 0, 1, '12 go uhg', -1, -1, -1, -1, -1, -1, 1),
(52, 231, '', 'Adoni', 'Blue', '2022-11-23 18:32:32', '2022-11-25 ', 'Soft Copy', 'Assignment Sheets', '', '', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(53, 232, 'SherylBellary_Resume.pdf_$_', 'Mumbai', 'Blue', '2022-11-23 18:34:18', '2022-11-25 ', 'Soft Copy', 'Assignment Sheets', '', '', '', 0, 1, 'zxvxvxc cxvcvc', 1, 0, 0, 0, 0, 0, 0),
(54, 233, 'SherylBellary_Resume.pdf_$_', 'Mumbai', 'Blue', '2022-11-23 18:36:40', '2022-11-25 18:06', 'Soft Copy', 'Assignment Sheets', '', '', '', 0, 1, 'zxvxvxc cxvcvc', 1, 0, 0, 0, 0, 0, 0),
(55, 234, 'SherylBellary_Resume.pdf_$_', 'Mumbai', 'Blue', '2022-11-23 18:42:54', '2022-11-25 18:06', 'Soft Copy', 'Assignment Sheets', '', '', '', 0, 1, 'zxvxvxc cxvcvc', 1, 0, 0, 0, 0, 0, 0),
(56, 235, 'Freelancers Address.pdf_$_', 'New Delhi', 'Blue', '2022-11-23 18:46:48', '2022-12-11 00:45', 'Hard Copy', 'Assignment Sheets', '', '', '', 0, 1, 'write properly', 1, 0, 0, 0, 0, 0, 0),
(57, 236, 'Freelancers Address.pdf_$_', 'New Delhi', 'Blue', '2022-11-26 23:47:37', '2022-12-11 00:45', 'Hard Copy', 'Assignment Sheets', '', '', '', 0, 1, 'write properly, I am submitting it again', 1, 1, 1, 1, 1, 0, 0),
(58, 237, 'Deep Shelke Internship Letter updated (1).pdf_$_TATA Bill Oct-Nov.pdf_$_', 'Jaipur', 'Blue', '2022-12-12 18:44:18', '2022-12-25 17:00', 'Hard Copy', 'Long Book Sheets', '', '', '', 0, 1, 'write properly', 1, 0, 0, 0, 0, 0, 0),
(59, 238, '', 'Mumbai', 'Blue', '29-12-2022 18:50:55', '2022-12-31 23:59', 'Hard Copy', 'Long Book Sheets', '10', '5', 'have', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(60, 239, 'dece.pdf_$_', 'Mumbai', 'Blue', '29-12-2022 19:03:37', '2022-12-31 23:59', 'Hard Copy', 'Long Book Sheets', '10', '5', 'have', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(61, 240, 'dece.pdf_$_', 'Mumbai', 'Blue', '30-12-2022 16:53:28', '2023-01-08 20:55', 'Soft Copy', 'Assignment Sheets', '20', '0', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(62, 241, 'dece.pdf_$_', 'Mumbai', 'Blue', '30-12-2022 16:53:38', '2023-01-08 20:55', 'Soft Copy', 'Assignment Sheets', '20', '0', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(63, 242, 'dece.pdf_$_', 'Mumbai', 'Blue', '30-12-2022 16:55:03', '2023-01-08 22:00', 'Soft Copy', 'Assignment Sheets', '20', '0', '', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(64, 243, 'dece.pdf_$_', 'Mumbai', 'Blue', '30-12-2022 17:00:56', '2022-12-31 23:59', 'Hard Copy', 'Long Book Sheets', '20', '0', 'have', 0, 1, '', 1, 0, 0, 0, 0, 0, 0),
(65, 244, 'dece.pdf_$_', 'Mumbai', 'Blue', '02-01-2023 11:46:50', '2023-02-01 22:59', 'Hard Copy', 'Long Book Sheets', '10', '0', 'have', 0, 0, '', 1, 0, 0, 0, 0, 0, 0),
(66, 245, 'dece.pdf_$_', 'Mumbai', 'Blue', '02-01-2023 11:47:54', '2023-12-31 22:59', 'Hard Copy', 'Long Book Sheets', '10', '2', 'have', 0, 1, 'sonsdkjlncj', 1, 0, 0, 0, 0, 0, 0),
(67, 246, 'Freelancer_Agreement_414_200223.pdf_$_Bluepen Writer App Screens Sample.pdf_$_', 'Mumbai', 'Blue', '03-03-2023 18:14:25', '2023-12-31 00:01', 'Soft Copy', 'Assignment Sheets', '16', '2', 'have', 0, 1, 'sdsdflkkmdsflkmm', 1, 0, 0, 0, 0, 0, 0),
(68, 247, 'Freelancer_Agreement_414_200223.pdf_$_Bluepen Writer App Screens Sample.pdf_$_', 'Mumbai', 'Blue', '03-03-2023 18:15:55', '2023-12-31 00:01', 'Soft Copy', 'Assignment Sheets', '16', '2', 'have', 0, 1, 'sdsdflkkmdsflkmm', 1, 0, 0, 0, 0, 0, 0),
(69, 248, 'KML Transaction Details (1).jpg_$_', 'Baramula', 'Blue', '12-03-2023 17:05:51', '2023-12-31 23:59', 'Hard Copy', 'Long Book Sheets', '2', '1', 'have', 0, 1, 'sdlnsdnf', 1, 0, 0, 0, 0, 0, 0),
(70, 249, 'KML Transaction Details (1).jpg_$_', 'Baramula', 'Blue', '12-03-2023 17:21:54', '2023-12-31 23:59', 'Hard Copy', 'Long Book Sheets', '2', '1', 'have', 0, 1, 'sdlnsdnf', 1, 0, 0, 0, 0, 0, 0),
(71, 259, '1573carriers.csv_$_1573variable-descriptions.csv_$_', 'Mumbai', 'Black', '05-04-2023 20:04:33', '2023-04-07 20:00', 'Both', 'Assignments Sheets', '12', '3', 'I have the content', 120, 1, 'dummy instructions', 1, 0, 0, 0, 0, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

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
(104, 100, 1, 1),
(105, 88, 93, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `submitted_on` text NOT NULL,
  `utm_data` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `submitted_on`, `utm_data`) VALUES
(1, 'bhavya haria', 'bhavyaharia100@gmail.com', 'this is a contact form test submission', '30-06-2023 17:35:39', 'null'),
(2, 'bhavya haria', 'bhavyaharia100@gmail.com', 'this is a contact form test submission', '30-06-2023 17:36:18', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `dump_assignment`
--

DROP TABLE IF EXISTS `dump_assignment`;
CREATE TABLE IF NOT EXISTS `dump_assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL,
  `map_array` text NOT NULL,
  `details_array` text NOT NULL,
  `assignment_array` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dump_assignment`
--

INSERT INTO `dump_assignment` (`id`, `assignment_id`, `map_array`, `details_array`, `assignment_array`) VALUES
(1, 258, '{\"array\":\"Map Array\",\"user_id\":\"24\",\"domain\":\"Freelancer\"}', '{\"array\":\"Assignment Array\",\"id\":\"177\",\"title\":\"thyroid disease detection\",\"description\":\"I want a deep learning based project on thyroid disease detection. ultrasonic images can be used  \",\"course\":\"engg\",\"level\":\"Bachelors\",\"type\":\"[\\\"blackbook\\\",\\\"research paper\\\",\\\"programming \\/ coding\\\",\\\"ppt\\\"]\",\"subject_tags\":\"[\\\"Machine Learning\\\",\\\"Deep Learning\\\"]\",\"deadline\":\"2023-04-10 18:00\",\"budget\":\"3500\",\"files\":\"1597requirements.txt_$_1597app.py_$_\",\"submission_date\":\"05-04-2023 18:51:56\",\"project_manager\":null,\"freelancer\":null,\"posted\":\"1\",\"under_process\":\"0\",\"assigned_to_pm\":\"0\",\"assigned_to_freelancer\":\"0\",\"completed\":\"0\",\"review_recieved\":\"0\",\"lost\":\"0\"}', '[{\"array\":\"Map Array\",\"user_id\":\"24\",\"domain\":\"Freelancer\"},{\"array\":\"Assignment Array\",\"id\":\"177\",\"title\":\"thyroid disease detection\",\"description\":\"I want a deep learning based project on thyroid disease detection. ultrasonic images can be used  \",\"course\":\"engg\",\"level\":\"Bachelors\",\"type\":\"[\\\"blackbook\\\",\\\"research paper\\\",\\\"programming \\/ coding\\\",\\\"ppt\\\"]\",\"subject_tags\":\"[\\\"Machine Learning\\\",\\\"Deep Learning\\\"]\",\"deadline\":\"2023-04-10 18:00\",\"budget\":\"3500\",\"files\":\"1597requirements.txt_$_1597app.py_$_\",\"submission_date\":\"05-04-2023 18:51:56\",\"project_manager\":null,\"freelancer\":null,\"posted\":\"1\",\"under_process\":\"0\",\"assigned_to_pm\":\"0\",\"assigned_to_freelancer\":\"0\",\"completed\":\"0\",\"review_recieved\":\"0\",\"lost\":\"0\"}]'),
(2, 258, '{\"array\":\"Map Array\",\"user_id\":\"24\",\"domain\":\"Freelancer\"}', '{\"array\":\"Assignment Array\",\"id\":\"177\",\"title\":\"thyroid disease detection\",\"description\":\"I want a deep learning based project on thyroid disease detection. ultrasonic images can be used  \",\"course\":\"engg\",\"level\":\"Bachelors\",\"type\":\"[\"blackbook\",\"research paper\",\"programming / coding\",\"ppt\"]\",\"subject_tags\":\"[\"Machine Learning\",\"Deep Learning\"]\",\"deadline\":\"2023-04-10 18:00\",\"budget\":\"3500\",\"files\":\"1597requirements.txt_$_1597app.py_$_\",\"submission_date\":\"05-04-2023 18:51:56\",\"project_manager\":null,\"freelancer\":null,\"posted\":\"1\",\"under_process\":\"0\",\"assigned_to_pm\":\"0\",\"assigned_to_freelancer\":\"0\",\"completed\":\"0\",\"review_recieved\":\"0\",\"lost\":\"0\"}', '[{\"array\":\"Map Array\",\"user_id\":\"24\",\"domain\":\"Freelancer\"},{\"array\":\"Assignment Array\",\"id\":\"177\",\"title\":\"thyroid disease detection\",\"description\":\"I want a deep learning based project on thyroid disease detection. ultrasonic images can be used  \",\"course\":\"engg\",\"level\":\"Bachelors\",\"type\":\"[\"blackbook\",\"research paper\",\"programming / coding\",\"ppt\"]\",\"subject_tags\":\"[\"Machine Learning\",\"Deep Learning\"]\",\"deadline\":\"2023-04-10 18:00\",\"budget\":\"3500\",\"files\":\"1597requirements.txt_$_1597app.py_$_\",\"submission_date\":\"05-04-2023 18:51:56\",\"project_manager\":null,\"freelancer\":null,\"posted\":\"1\",\"under_process\":\"0\",\"assigned_to_pm\":\"0\",\"assigned_to_freelancer\":\"0\",\"completed\":\"0\",\"review_recieved\":\"0\",\"lost\":\"0\"}]'),
(3, 258, '{\"array\":\"Map Array\",\"user_id\":\"24\",\"domain\":\"Freelancer\"}', '{\"array\":\"Assignment Array\",\"id\":\"177\",\"title\":\"thyroid disease detection\",\"description\":\"I want a deep learning based project on thyroid disease detection. ultrasonic images can be used  \",\"course\":\"engg\",\"level\":\"Bachelors\",\"type\":\"[\"blackbook\",\"research paper\",\"programming / coding\",\"ppt\"]\",\"subject_tags\":\"[\"Machine Learning\",\"Deep Learning\"]\",\"deadline\":\"2023-04-10 18:00\",\"budget\":\"3500\",\"files\":\"1597requirements.txt_$_1597app.py_$_\",\"submission_date\":\"05-04-2023 18:51:56\",\"project_manager\":null,\"freelancer\":null,\"posted\":\"1\",\"under_process\":\"0\",\"assigned_to_pm\":\"0\",\"assigned_to_freelancer\":\"0\",\"completed\":\"0\",\"review_recieved\":\"0\",\"lost\":\"0\"}', '[{\"array\":\"Map Array\",\"user_id\":\"24\",\"domain\":\"Freelancer\"},{\"array\":\"Assignment Array\",\"id\":\"177\",\"title\":\"thyroid disease detection\",\"description\":\"I want a deep learning based project on thyroid disease detection. ultrasonic images can be used  \",\"course\":\"engg\",\"level\":\"Bachelors\",\"type\":\"[\"blackbook\",\"research paper\",\"programming / coding\",\"ppt\"]\",\"subject_tags\":\"[\"Machine Learning\",\"Deep Learning\"]\",\"deadline\":\"2023-04-10 18:00\",\"budget\":\"3500\",\"files\":\"1597requirements.txt_$_1597app.py_$_\",\"submission_date\":\"05-04-2023 18:51:56\",\"project_manager\":null,\"freelancer\":null,\"posted\":\"1\",\"under_process\":\"0\",\"assigned_to_pm\":\"0\",\"assigned_to_freelancer\":\"0\",\"completed\":\"0\",\"review_recieved\":\"0\",\"lost\":\"0\"}]'),
(4, 5, '{\"array\":\"Map Array\",\"user_id\":\"24\",\"domain\":\"Freelancer\"}', '{\"array\":\"Assignment Array\",\"id\":\"94\",\"title\":\"python\",\"description\":\"i want a python assignment\",\"course\":\"Engineering\",\"level\":\"Bachelors\",\"type\":\"Programming Assignment\",\"subject_tags\":\"[\"India\"]\",\"deadline\":\"2021-12-02 \",\"budget\":\"5000\",\"files\":\"4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_\",\"submission_date\":\"2023-03-26 12:57:34\",\"project_manager\":null,\"freelancer\":null,\"posted\":\"0\",\"under_process\":\"0\",\"assigned_to_pm\":\"0\",\"assigned_to_freelancer\":\"0\",\"completed\":\"0\",\"review_recieved\":\"0\",\"lost\":\"0\"}', '[{\"array\":\"Map Array\",\"user_id\":\"24\",\"domain\":\"Freelancer\"},{\"array\":\"Assignment Array\",\"id\":\"94\",\"title\":\"python\",\"description\":\"i want a python assignment\",\"course\":\"Engineering\",\"level\":\"Bachelors\",\"type\":\"Programming Assignment\",\"subject_tags\":\"[\"India\"]\",\"deadline\":\"2021-12-02 \",\"budget\":\"5000\",\"files\":\"4-removebg-preview.png_$_Project Report (1) (1).docx_$_GrocyGo Phase II.pdf_$_\",\"submission_date\":\"2023-03-26 12:57:34\",\"project_manager\":null,\"freelancer\":null,\"posted\":\"0\",\"under_process\":\"0\",\"assigned_to_pm\":\"0\",\"assigned_to_freelancer\":\"0\",\"completed\":\"0\",\"review_recieved\":\"0\",\"lost\":\"0\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `dump_freelancer`
--

DROP TABLE IF EXISTS `dump_freelancer`;
CREATE TABLE IF NOT EXISTS `dump_freelancer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `map_array` text NOT NULL,
  `technical_array` text NOT NULL,
  `non_technical_array` text NOT NULL,
  `writer_array` text NOT NULL,
  `freelancer_array` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dump_freelancer`
--

INSERT INTO `dump_freelancer` (`id`, `freelancer_id`, `map_array`, `technical_array`, `non_technical_array`, `writer_array`, `freelancer_array`) VALUES
(1, 131, 'Array', '', '', '', ''),
(2, 131, 'Array', '', '', '', ''),
(3, 131, 'Array', '', '', '', ''),
(4, 131, 'Array', '', '', '', ''),
(5, 131, 'Array', '', '', '', ''),
(6, 131, '{\"array\":\"Map Array\",\"freelancer_id\":\"131\",\"email\":\"selmon@bhoi.com\",\"email_verified\":\"1\",\"country_name\":\"India\",\"country_code\":\"91\",\"number\":\"9879879879\",\"number_verified\":\"1\",\"technical\":\"1\",\"non_technical\":\"0\",\"writer\":\"1\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"1\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":null,\"firstname\":\"selmon\",\"lastname\":\"bhoi\",\"gender\":\"Male\",\"whatsapp\":\"9879879879\",\"address\":\"galaxy apt\",\"street\":\"bandra\",\"city\":\"mumbai\",\"state\":\"maha\",\"pincode\":\"400087\",\"agreed\":\"1\",\"password\":null}', '', '', '', ''),
(7, 131, '{\"array\":\"Map Array\",\"freelancer_id\":\"131\",\"email\":\"selmon@bhoi.com\",\"email_verified\":\"1\",\"country_name\":\"India\",\"country_code\":\"91\",\"number\":\"9879879879\",\"number_verified\":\"1\",\"technical\":\"1\",\"non_technical\":\"0\",\"writer\":\"1\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"1\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":null,\"firstname\":\"selmon\",\"lastname\":\"bhoi\",\"gender\":\"Male\",\"whatsapp\":\"9879879879\",\"address\":\"galaxy apt\",\"street\":\"bandra\",\"city\":\"mumbai\",\"state\":\"maha\",\"pincode\":\"400087\",\"agreed\":\"1\",\"password\":null}', 'Array', 'Array', 'Array', ''),
(8, 131, '{\"array\":\"Map Array\",\"freelancer_id\":\"131\",\"email\":\"selmon@bhoi.com\",\"email_verified\":\"1\",\"country_name\":\"India\",\"country_code\":\"91\",\"number\":\"9879879879\",\"number_verified\":\"1\",\"technical\":\"1\",\"non_technical\":\"0\",\"writer\":\"1\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"1\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":\"\",\"firstname\":\"selmon\",\"lastname\":\"bhoi\",\"gender\":\"Male\",\"whatsapp\":\"9879879879\",\"address\":\"galaxy apt\",\"street\":\"bandra\",\"city\":\"mumbai\",\"state\":\"maha\",\"pincode\":\"400087\",\"agreed\":\"1\",\"password\":\"\"}', '{\"array\":\"Technical Array\",\"id\":\"\",\"domains\":\"\",\"assignment_type\":\"\",\"qualification\":\"\",\"working_hours\":\"\",\"subject_tags\":\"\",\"past_experience\":\"\",\"work_links\":\"\",\"linkedin\":\"\",\"experience\":\"\",\"past_work_files\":\"\",\"resume\":\"\",\"profile_photo\":\"\",\"date_of_submission\":\"\"}', '{\"array\":\"Non Technical Array\"}', 'Array', ''),
(9, 131, '{\"array\":\"Map Array\",\"freelancer_id\":\"131\",\"email\":\"selmon@bhoi.com\",\"email_verified\":\"1\",\"country_name\":\"India\",\"country_code\":\"91\",\"number\":\"9879879879\",\"number_verified\":\"1\",\"technical\":\"1\",\"non_technical\":\"0\",\"writer\":\"1\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"1\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":\"\",\"firstname\":\"selmon\",\"lastname\":\"bhoi\",\"gender\":\"Male\",\"whatsapp\":\"9879879879\",\"address\":\"galaxy apt\",\"street\":\"bandra\",\"city\":\"mumbai\",\"state\":\"maha\",\"pincode\":\"400087\",\"agreed\":\"1\",\"password\":\"\"}', '{\"array\":\"Technical Array\",\"id\":\"\",\"domains\":\"\",\"assignment_type\":\"\",\"qualification\":\"\",\"working_hours\":\"\",\"subject_tags\":\"\",\"past_experience\":\"\",\"work_links\":\"\",\"linkedin\":\"\",\"experience\":\"\",\"past_work_files\":\"\",\"resume\":\"\",\"profile_photo\":\"\",\"date_of_submission\":\"\"}', '{\"array\":\"Non Technical Array\"}', '{\"array\":\"Writer Array\",\"id\":\"13\",\"domains\":\"{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}\",\"writing\":\"1\",\"diagram\":\"1\",\"ed\":\"1\",\"typing\":\"1\",\"art\":\"1\",\"writing_capacity\":\"18\",\"writing_1day_cost\":\"9.5\",\"writing_2day_cost\":\"8.5\",\"writing_3day_cost\":\"7.0\",\"writing_sample\":\"8674big_data_in_mumbai.csv_$_8674big_data_in_india.csv_$_8674ar_in_india.csv_$_\",\"diagram_cost\":\"120.0\",\"diagram_sample\":\"8329data.py_$_8329data.csv_$_8329csvtest.py_$_\",\"ed_cost\":\"180.0\",\"ed_sample\":\"1934getname.py_$_1934freelancerstest.csv_$_1934finalscraping.py_$_\",\"typing_cost\":\"25.0\",\"typing_speed\":\"50\",\"art_type_of_models\":\"2D models,Sketches and water colour paintings,3D models,Software based graphic designing\",\"art_cost\":\"270.0\",\"art_sample\":\"5132teacheron1.csv_$_5132students.csv_$_5132matlab_in_india.csv_$_\",\"bio\":\"heavy rider. As a seasoned writer with a flair for words, I craft stories that captivate readers and evoke emotion. With a degree in literature and years of experience, my writing is a reflection of my passion for storytelling. From short stories to articles, I weave words into compelling narratives that leave a lasting impact. As a keen observer of the human experience, my writing delves into the complexities of life, relationships, and the human psyche. With a penchant for creativity and a keen eye for detail, my words transport readers to new worlds and engage their imaginations. With a diverse portfolio spanning various genres and mediums, I am a versatile wordsmith who can adapt to any writing challenge. When I \' m not typing away at my keyboard, you can find me lost in the pages of a book or exploring the great outdoors for inspiration. As a writer, my mission is to leave an indelible mark on the literary world with my words.\",\"profile_photo\":null,\"date_of_submission\":\"29-03-2023 19:35:04\"}', ''),
(10, 131, '{\"array\":\"Map Array\",\"freelancer_id\":\"131\",\"email\":\"selmon@bhoi.com\",\"email_verified\":\"1\",\"country_name\":\"India\",\"country_code\":\"91\",\"number\":\"9879879879\",\"number_verified\":\"1\",\"technical\":\"1\",\"non_technical\":\"0\",\"writer\":\"1\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"1\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":null,\"firstname\":\"selmon\",\"lastname\":\"bhoi\",\"gender\":\"Male\",\"whatsapp\":\"9879879879\",\"address\":\"galaxy apt\",\"street\":\"bandra\",\"city\":\"mumbai\",\"state\":\"maha\",\"pincode\":\"400087\",\"agreed\":\"1\",\"password\":null}', '{\"array\":\"Technical Array\",\"id\":null,\"domains\":null,\"assignment_type\":null,\"qualification\":null,\"working_hours\":null,\"subject_tags\":null,\"past_experience\":null,\"work_links\":null,\"linkedin\":null,\"experience\":null,\"past_work_files\":null,\"resume\":null,\"profile_photo\":null,\"date_of_submission\":null}', '{\"array\":\"Non Technical Array\"}', '{\"array\":\"Writer Array\",\"id\":\"13\",\"domains\":\"{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}\",\"writing\":\"1\",\"diagram\":\"1\",\"ed\":\"1\",\"typing\":\"1\",\"art\":\"1\",\"writing_capacity\":\"18\",\"writing_1day_cost\":\"9.5\",\"writing_2day_cost\":\"8.5\",\"writing_3day_cost\":\"7.0\",\"writing_sample\":\"8674big_data_in_mumbai.csv_$_8674big_data_in_india.csv_$_8674ar_in_india.csv_$_\",\"diagram_cost\":\"120.0\",\"diagram_sample\":\"8329data.py_$_8329data.csv_$_8329csvtest.py_$_\",\"ed_cost\":\"180.0\",\"ed_sample\":\"1934getname.py_$_1934freelancerstest.csv_$_1934finalscraping.py_$_\",\"typing_cost\":\"25.0\",\"typing_speed\":\"50\",\"art_type_of_models\":\"2D models,Sketches and water colour paintings,3D models,Software based graphic designing\",\"art_cost\":\"270.0\",\"art_sample\":\"5132teacheron1.csv_$_5132students.csv_$_5132matlab_in_india.csv_$_\",\"bio\":\"heavy rider. As a seasoned writer with a flair for words, I craft stories that captivate readers and evoke emotion. With a degree in literature and years of experience, my writing is a reflection of my passion for storytelling. From short stories to articles, I weave words into compelling narratives that leave a lasting impact. As a keen observer of the human experience, my writing delves into the complexities of life, relationships, and the human psyche. With a penchant for creativity and a keen eye for detail, my words transport readers to new worlds and engage their imaginations. With a diverse portfolio spanning various genres and mediums, I am a versatile wordsmith who can adapt to any writing challenge. When I \' m not typing away at my keyboard, you can find me lost in the pages of a book or exploring the great outdoors for inspiration. As a writer, my mission is to leave an indelible mark on the literary world with my words.\",\"profile_photo\":null,\"date_of_submission\":\"29-03-2023 19:35:04\"}', ''),
(11, 131, '{\"array\":\"Map Array\",\"freelancer_id\":\"131\",\"email\":\"selmon@bhoi.com\",\"email_verified\":\"1\",\"country_name\":\"India\",\"country_code\":\"91\",\"number\":\"9879879879\",\"number_verified\":\"1\",\"technical\":\"1\",\"non_technical\":\"0\",\"writer\":\"1\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"1\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":null,\"firstname\":\"selmon\",\"lastname\":\"bhoi\",\"gender\":\"Male\",\"whatsapp\":\"9879879879\",\"address\":\"galaxy apt\",\"street\":\"bandra\",\"city\":\"mumbai\",\"state\":\"maha\",\"pincode\":\"400087\",\"agreed\":\"1\",\"password\":null}', '{\"array\":\"Technical Array\",\"id\":null,\"domains\":null,\"assignment_type\":null,\"qualification\":null,\"working_hours\":null,\"subject_tags\":null,\"past_experience\":null,\"work_links\":null,\"linkedin\":null,\"experience\":null,\"past_work_files\":null,\"resume\":null,\"profile_photo\":null,\"date_of_submission\":null}', '{\"array\":\"Non Technical Array\"}', '{\"array\":\"Writer Array\",\"id\":\"13\",\"domains\":\"{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}\",\"writing\":\"1\",\"diagram\":\"1\",\"ed\":\"1\",\"typing\":\"1\",\"art\":\"1\",\"writing_capacity\":\"18\",\"writing_1day_cost\":\"9.5\",\"writing_2day_cost\":\"8.5\",\"writing_3day_cost\":\"7.0\",\"writing_sample\":\"8674big_data_in_mumbai.csv_$_8674big_data_in_india.csv_$_8674ar_in_india.csv_$_\",\"diagram_cost\":\"120.0\",\"diagram_sample\":\"8329data.py_$_8329data.csv_$_8329csvtest.py_$_\",\"ed_cost\":\"180.0\",\"ed_sample\":\"1934getname.py_$_1934freelancerstest.csv_$_1934finalscraping.py_$_\",\"typing_cost\":\"25.0\",\"typing_speed\":\"50\",\"art_type_of_models\":\"2D models,Sketches and water colour paintings,3D models,Software based graphic designing\",\"art_cost\":\"270.0\",\"art_sample\":\"5132teacheron1.csv_$_5132students.csv_$_5132matlab_in_india.csv_$_\",\"bio\":\"heavy rider. As a seasoned writer with a flair for words, I craft stories that captivate readers and evoke emotion. With a degree in literature and years of experience, my writing is a reflection of my passion for storytelling. From short stories to articles, I weave words into compelling narratives that leave a lasting impact. As a keen observer of the human experience, my writing delves into the complexities of life, relationships, and the human psyche. With a penchant for creativity and a keen eye for detail, my words transport readers to new worlds and engage their imaginations. With a diverse portfolio spanning various genres and mediums, I am a versatile wordsmith who can adapt to any writing challenge. When I \' m not typing away at my keyboard, you can find me lost in the pages of a book or exploring the great outdoors for inspiration. As a writer, my mission is to leave an indelible mark on the literary world with my words.\",\"profile_photo\":null,\"date_of_submission\":\"29-03-2023 19:35:04\"}', ''),
(12, 131, '{\"array\":\"Map Array\",\"freelancer_id\":\"131\",\"email\":\"selmon@bhoi.com\",\"email_verified\":\"1\",\"country_name\":\"India\",\"country_code\":\"91\",\"number\":\"9879879879\",\"number_verified\":\"1\",\"technical\":\"1\",\"non_technical\":\"0\",\"writer\":\"1\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"1\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":null,\"firstname\":\"selmon\",\"lastname\":\"bhoi\",\"gender\":\"Male\",\"whatsapp\":\"9879879879\",\"address\":\"galaxy apt\",\"street\":\"bandra\",\"city\":\"mumbai\",\"state\":\"maha\",\"pincode\":\"400087\",\"agreed\":\"1\",\"password\":null}', '{\"array\":\"Technical Array\",\"id\":null,\"domains\":null,\"assignment_type\":null,\"qualification\":null,\"working_hours\":null,\"subject_tags\":null,\"past_experience\":null,\"work_links\":null,\"linkedin\":null,\"experience\":null,\"past_work_files\":null,\"resume\":null,\"profile_photo\":null,\"date_of_submission\":null}', '{\"array\":\"Non Technical Array\"}', '{\"array\":\"Writer Array\",\"id\":\"13\",\"domains\":\"{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}\",\"writing\":\"1\",\"diagram\":\"1\",\"ed\":\"1\",\"typing\":\"1\",\"art\":\"1\",\"writing_capacity\":\"18\",\"writing_1day_cost\":\"9.5\",\"writing_2day_cost\":\"8.5\",\"writing_3day_cost\":\"7.0\",\"writing_sample\":\"8674big_data_in_mumbai.csv_$_8674big_data_in_india.csv_$_8674ar_in_india.csv_$_\",\"diagram_cost\":\"120.0\",\"diagram_sample\":\"8329data.py_$_8329data.csv_$_8329csvtest.py_$_\",\"ed_cost\":\"180.0\",\"ed_sample\":\"1934getname.py_$_1934freelancerstest.csv_$_1934finalscraping.py_$_\",\"typing_cost\":\"25.0\",\"typing_speed\":\"50\",\"art_type_of_models\":\"2D models,Sketches and water colour paintings,3D models,Software based graphic designing\",\"art_cost\":\"270.0\",\"art_sample\":\"5132teacheron1.csv_$_5132students.csv_$_5132matlab_in_india.csv_$_\",\"bio\":\"heavy rider. As a seasoned writer with a flair for words, I craft stories that captivate readers and evoke emotion. With a degree in literature and years of experience, my writing is a reflection of my passion for storytelling. From short stories to articles, I weave words into compelling narratives that leave a lasting impact. As a keen observer of the human experience, my writing delves into the complexities of life, relationships, and the human psyche. With a penchant for creativity and a keen eye for detail, my words transport readers to new worlds and engage their imaginations. With a diverse portfolio spanning various genres and mediums, I am a versatile wordsmith who can adapt to any writing challenge. When I \' m not typing away at my keyboard, you can find me lost in the pages of a book or exploring the great outdoors for inspiration. As a writer, my mission is to leave an indelible mark on the literary world with my words.\",\"profile_photo\":null,\"date_of_submission\":\"29-03-2023 19:35:04\"}', ''),
(13, 131, '{\"array\":\"Map Array\",\"freelancer_id\":\"131\",\"email\":\"selmon@bhoi.com\",\"email_verified\":\"1\",\"country_name\":\"India\",\"country_code\":\"91\",\"number\":\"9879879879\",\"number_verified\":\"1\",\"technical\":\"1\",\"non_technical\":\"0\",\"writer\":\"1\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"1\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":null,\"firstname\":\"selmon\",\"lastname\":\"bhoi\",\"gender\":\"Male\",\"whatsapp\":\"9879879879\",\"address\":\"galaxy apt\",\"street\":\"bandra\",\"city\":\"mumbai\",\"state\":\"maha\",\"pincode\":\"400087\",\"agreed\":\"1\",\"password\":null}', '{\"array\":\"Technical Array\",\"id\":null,\"domains\":null,\"assignment_type\":null,\"qualification\":null,\"working_hours\":null,\"subject_tags\":null,\"past_experience\":null,\"work_links\":null,\"linkedin\":null,\"experience\":null,\"past_work_files\":null,\"resume\":null,\"profile_photo\":null,\"date_of_submission\":null}', '{\"array\":\"Non Technical Array\"}', '{\"array\":\"Writer Array\",\"id\":\"13\",\"domains\":\"{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}\",\"writing\":\"1\",\"diagram\":\"1\",\"ed\":\"1\",\"typing\":\"1\",\"art\":\"1\",\"writing_capacity\":\"18\",\"writing_1day_cost\":\"9.5\",\"writing_2day_cost\":\"8.5\",\"writing_3day_cost\":\"7.0\",\"writing_sample\":\"8674big_data_in_mumbai.csv_$_8674big_data_in_india.csv_$_8674ar_in_india.csv_$_\",\"diagram_cost\":\"120.0\",\"diagram_sample\":\"8329data.py_$_8329data.csv_$_8329csvtest.py_$_\",\"ed_cost\":\"180.0\",\"ed_sample\":\"1934getname.py_$_1934freelancerstest.csv_$_1934finalscraping.py_$_\",\"typing_cost\":\"25.0\",\"typing_speed\":\"50\",\"art_type_of_models\":\"2D models,Sketches and water colour paintings,3D models,Software based graphic designing\",\"art_cost\":\"270.0\",\"art_sample\":\"5132teacheron1.csv_$_5132students.csv_$_5132matlab_in_india.csv_$_\",\"bio\":\"heavy rider. As a seasoned writer with a flair for words, I craft stories that captivate readers and evoke emotion. With a degree in literature and years of experience, my writing is a reflection of my passion for storytelling. From short stories to articles, I weave words into compelling narratives that leave a lasting impact. As a keen observer of the human experience, my writing delves into the complexities of life, relationships, and the human psyche. With a penchant for creativity and a keen eye for detail, my words transport readers to new worlds and engage their imaginations. With a diverse portfolio spanning various genres and mediums, I am a versatile wordsmith who can adapt to any writing challenge. When I \' m not typing away at my keyboard, you can find me lost in the pages of a book or exploring the great outdoors for inspiration. As a writer, my mission is to leave an indelible mark on the literary world with my words.\",\"profile_photo\":null,\"date_of_submission\":\"29-03-2023 19:35:04\"}', '[{\"array\":\"Map Array\",\"freelancer_id\":\"131\",\"email\":\"selmon@bhoi.com\",\"email_verified\":\"1\",\"country_name\":\"India\",\"country_code\":\"91\",\"number\":\"9879879879\",\"number_verified\":\"1\",\"technical\":\"1\",\"non_technical\":\"0\",\"writer\":\"1\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"1\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":null,\"firstname\":\"selmon\",\"lastname\":\"bhoi\",\"gender\":\"Male\",\"whatsapp\":\"9879879879\",\"address\":\"galaxy apt\",\"street\":\"bandra\",\"city\":\"mumbai\",\"state\":\"maha\",\"pincode\":\"400087\",\"agreed\":\"1\",\"password\":null},{\"array\":\"Technical Array\",\"id\":null,\"domains\":null,\"assignment_type\":null,\"qualification\":null,\"working_hours\":null,\"subject_tags\":null,\"past_experience\":null,\"work_links\":null,\"linkedin\":null,\"experience\":null,\"past_work_files\":null,\"resume\":null,\"profile_photo\":null,\"date_of_submission\":null},{\"array\":\"Non Technical Array\"},{\"array\":\"Writer Array\",\"id\":\"13\",\"domains\":\"{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}\",\"writing\":\"1\",\"diagram\":\"1\",\"ed\":\"1\",\"typing\":\"1\",\"art\":\"1\",\"writing_capacity\":\"18\",\"writing_1day_cost\":\"9.5\",\"writing_2day_cost\":\"8.5\",\"writing_3day_cost\":\"7.0\",\"writing_sample\":\"8674big_data_in_mumbai.csv_$_8674big_data_in_india.csv_$_8674ar_in_india.csv_$_\",\"diagram_cost\":\"120.0\",\"diagram_sample\":\"8329data.py_$_8329data.csv_$_8329csvtest.py_$_\",\"ed_cost\":\"180.0\",\"ed_sample\":\"1934getname.py_$_1934freelancerstest.csv_$_1934finalscraping.py_$_\",\"typing_cost\":\"25.0\",\"typing_speed\":\"50\",\"art_type_of_models\":\"2D models,Sketches and water colour paintings,3D models,Software based graphic designing\",\"art_cost\":\"270.0\",\"art_sample\":\"5132teacheron1.csv_$_5132students.csv_$_5132matlab_in_india.csv_$_\",\"bio\":\"heavy rider. As a seasoned writer with a flair for words, I craft stories that captivate readers and evoke emotion. With a degree in literature and years of experience, my writing is a reflection of my passion for storytelling. From short stories to articles, I weave words into compelling narratives that leave a lasting impact. As a keen observer of the human experience, my writing delves into the complexities of life, relationships, and the human psyche. With a penchant for creativity and a keen eye for detail, my words transport readers to new worlds and engage their imaginations. With a diverse portfolio spanning various genres and mediums, I am a versatile wordsmith who can adapt to any writing challenge. When I \' m not typing away at my keyboard, you can find me lost in the pages of a book or exploring the great outdoors for inspiration. As a writer, my mission is to leave an indelible mark on the literary world with my words.\",\"profile_photo\":null,\"date_of_submission\":\"29-03-2023 19:35:04\"}]'),
(14, 1, '{\"array\":\"Map Array\",\"freelancer_id\":\"1\",\"email\":\"bhavyaharia100@gmail.com\",\"email_verified\":\"1\",\"country_name\":\"\",\"country_code\":\"91\",\"number\":\"91-9619305482\",\"number_verified\":\"0\",\"technical\":\"1\",\"non_technical\":\"0\",\"writer\":\"0\",\"technical_form_filled\":\"1\",\"technical_interview_conducted\":\"1\",\"technical_agreement_sent\":\"1\",\"technical_agreement_received\":\"1\",\"technical_is_approved\":\"1\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"0\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":\"1\",\"firstname\":\"bhavya\",\"lastname\":\"haria\",\"gender\":\"\",\"whatsapp\":\"\",\"address\":\"gokuldham\",\"street\":\"vaidya marg\",\"city\":\"mumbai\",\"state\":\"maharashtra\",\"pincode\":\"400063\",\"agreed\":\"1\",\"password\":\"$2y$10$lLfjlHCBR3VaIiK6d2AC2eB.F.LHf/WgsEMGssHjeswl6MxWe..vW\"}', '{\"array\":\"Technical Array\",\"id\":\"80\",\"domains\":\"\",\"assignment_type\":\"all\",\"qualification\":\"be\",\"working_hours\":\"bhavyaharia100@gmail.com\",\"subject_tags\":\"[\"India,Uganda\"]\",\"past_experience\":\"bluepen\",\"work_links\":\"http://localhost/bluepen/src/freelance.php\",\"linkedin\":\"\",\"experience\":\"bluepen\",\"past_work_files\":\"GrocyGo Phase II.pdf_$_\",\"resume\":\"GrocyGo Phase II (updated).pdf_$_\",\"profile_photo\":null,\"date_of_submission\":null}', '{\"array\":\"Non Technical Array\"}', '{\"array\":\"Writer Array\"}', '[{\"array\":\"Map Array\",\"freelancer_id\":\"1\",\"email\":\"bhavyaharia100@gmail.com\",\"email_verified\":\"1\",\"country_name\":\"\",\"country_code\":\"91\",\"number\":\"91-9619305482\",\"number_verified\":\"0\",\"technical\":\"1\",\"non_technical\":\"0\",\"writer\":\"0\",\"technical_form_filled\":\"1\",\"technical_interview_conducted\":\"1\",\"technical_agreement_sent\":\"1\",\"technical_agreement_received\":\"1\",\"technical_is_approved\":\"1\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"0\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":\"1\",\"firstname\":\"bhavya\",\"lastname\":\"haria\",\"gender\":\"\",\"whatsapp\":\"\",\"address\":\"gokuldham\",\"street\":\"vaidya marg\",\"city\":\"mumbai\",\"state\":\"maharashtra\",\"pincode\":\"400063\",\"agreed\":\"1\",\"password\":\"$2y$10$lLfjlHCBR3VaIiK6d2AC2eB.F.LHf/WgsEMGssHjeswl6MxWe..vW\"},{\"array\":\"Technical Array\",\"id\":\"80\",\"domains\":\"\",\"assignment_type\":\"all\",\"qualification\":\"be\",\"working_hours\":\"bhavyaharia100@gmail.com\",\"subject_tags\":\"[\"India,Uganda\"]\",\"past_experience\":\"bluepen\",\"work_links\":\"http://localhost/bluepen/src/freelance.php\",\"linkedin\":\"\",\"experience\":\"bluepen\",\"past_work_files\":\"GrocyGo Phase II.pdf_$_\",\"resume\":\"GrocyGo Phase II (updated).pdf_$_\",\"profile_photo\":null,\"date_of_submission\":null},{\"array\":\"Non Technical Array\"},{\"array\":\"Writer Array\"}]'),
(15, 1, '{\"array\":\"Map Array\",\"freelancer_id\":\"1\",\"email\":null,\"email_verified\":null,\"country_name\":null,\"country_code\":null,\"number\":null,\"number_verified\":null,\"technical\":null,\"non_technical\":null,\"writer\":null,\"technical_form_filled\":null,\"technical_interview_conducted\":null,\"technical_agreement_sent\":null,\"technical_agreement_received\":null,\"technical_is_approved\":null,\"non_technical_form_filled\":null,\"non_technical_interview_conducted\":null,\"non_technical_agreement_sent\":null,\"non_technical_agreement_received\":null,\"non_technical_is_approved\":null,\"writer_form_filled\":null,\"writer_interview_conducted\":null,\"writer_agreement_sent\":null,\"writer_agreement_received\":null,\"writer_is_approved\":null,\"is_active\":null,\"firstname\":null,\"lastname\":null,\"gender\":null,\"whatsapp\":null,\"address\":null,\"street\":null,\"city\":null,\"state\":null,\"pincode\":null,\"agreed\":null,\"password\":null}', '{\"array\":\"Technical Array\"}', '{\"array\":\"Non Technical Array\"}', '{\"array\":\"Writer Array\"}', '[{\"array\":\"Map Array\",\"freelancer_id\":\"1\",\"email\":null,\"email_verified\":null,\"country_name\":null,\"country_code\":null,\"number\":null,\"number_verified\":null,\"technical\":null,\"non_technical\":null,\"writer\":null,\"technical_form_filled\":null,\"technical_interview_conducted\":null,\"technical_agreement_sent\":null,\"technical_agreement_received\":null,\"technical_is_approved\":null,\"non_technical_form_filled\":null,\"non_technical_interview_conducted\":null,\"non_technical_agreement_sent\":null,\"non_technical_agreement_received\":null,\"non_technical_is_approved\":null,\"writer_form_filled\":null,\"writer_interview_conducted\":null,\"writer_agreement_sent\":null,\"writer_agreement_received\":null,\"writer_is_approved\":null,\"is_active\":null,\"firstname\":null,\"lastname\":null,\"gender\":null,\"whatsapp\":null,\"address\":null,\"street\":null,\"city\":null,\"state\":null,\"pincode\":null,\"agreed\":null,\"password\":null},{\"array\":\"Technical Array\"},{\"array\":\"Non Technical Array\"},{\"array\":\"Writer Array\"}]'),
(16, 1, '{\"array\":\"Map Array\",\"freelancer_id\":\"1\",\"email\":null,\"email_verified\":null,\"country_name\":null,\"country_code\":null,\"number\":null,\"number_verified\":null,\"technical\":null,\"non_technical\":null,\"writer\":null,\"technical_form_filled\":null,\"technical_interview_conducted\":null,\"technical_agreement_sent\":null,\"technical_agreement_received\":null,\"technical_is_approved\":null,\"non_technical_form_filled\":null,\"non_technical_interview_conducted\":null,\"non_technical_agreement_sent\":null,\"non_technical_agreement_received\":null,\"non_technical_is_approved\":null,\"writer_form_filled\":null,\"writer_interview_conducted\":null,\"writer_agreement_sent\":null,\"writer_agreement_received\":null,\"writer_is_approved\":null,\"is_active\":null,\"firstname\":null,\"lastname\":null,\"gender\":null,\"whatsapp\":null,\"address\":null,\"street\":null,\"city\":null,\"state\":null,\"pincode\":null,\"agreed\":null,\"password\":null}', '{\"array\":\"Technical Array\"}', '{\"array\":\"Non Technical Array\"}', '{\"array\":\"Writer Array\"}', '[{\"array\":\"Map Array\",\"freelancer_id\":\"1\",\"email\":null,\"email_verified\":null,\"country_name\":null,\"country_code\":null,\"number\":null,\"number_verified\":null,\"technical\":null,\"non_technical\":null,\"writer\":null,\"technical_form_filled\":null,\"technical_interview_conducted\":null,\"technical_agreement_sent\":null,\"technical_agreement_received\":null,\"technical_is_approved\":null,\"non_technical_form_filled\":null,\"non_technical_interview_conducted\":null,\"non_technical_agreement_sent\":null,\"non_technical_agreement_received\":null,\"non_technical_is_approved\":null,\"writer_form_filled\":null,\"writer_interview_conducted\":null,\"writer_agreement_sent\":null,\"writer_agreement_received\":null,\"writer_is_approved\":null,\"is_active\":null,\"firstname\":null,\"lastname\":null,\"gender\":null,\"whatsapp\":null,\"address\":null,\"street\":null,\"city\":null,\"state\":null,\"pincode\":null,\"agreed\":null,\"password\":null},{\"array\":\"Technical Array\"},{\"array\":\"Non Technical Array\"},{\"array\":\"Writer Array\"}]'),
(17, 46, '{\"array\":\"Map Array\",\"freelancer_id\":\"46\",\"email\":\"bhavyaharia100@gmail.com\",\"email_verified\":\"1\",\"country_name\":\"India (u092du093eu0930u0924)\",\"country_code\":\"91\",\"number\":\"91-9619305482\",\"number_verified\":\"0\",\"technical\":\"0\",\"non_technical\":\"1\",\"writer\":\"0\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"1\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"1\",\"writer_form_filled\":\"0\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":\"1\",\"firstname\":\"Bhavya Freelancer\",\"lastname\":\"Haria Freelancer\",\"gender\":\"\",\"whatsapp\":\"\",\"address\":\"Gokuldham\",\"street\":\"Gen A.K. Vaidya Marg\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"pincode\":\"400063\",\"agreed\":\"1\",\"password\":\"\"}', '{\"array\":\"Technical Array\"}', '{\"array\":\"Non Technical Array\",\"id\":\"2\",\"domains\":null,\"assignment_type\":\"[\"Report Writing\",\"Programming/Coding Assignment\",\"Research Paper\"]\",\"qualification\":\"BE\",\"working_hours\":\"24 hours\",\"subject_tags\":\"ML, Web Development, Android Development\",\"past_experience\":\"Yes\",\"typing_speed\":\"\",\"work_links\":\"http://localhost/Bluepen/src/freelance.php\",\"linkedin\":\"\",\"experience\":\"Yes\",\"past_work_files\":\"Absract.docx_$_\",\"resume\":\"Clothing App.pdf_$_\",\"profile_photo\":\"\",\"date_of_submission\":null}', '{\"array\":\"Writer Array\"}', '[{\"array\":\"Map Array\",\"freelancer_id\":\"46\",\"email\":\"bhavyaharia100@gmail.com\",\"email_verified\":\"1\",\"country_name\":\"India (u092du093eu0930u0924)\",\"country_code\":\"91\",\"number\":\"91-9619305482\",\"number_verified\":\"0\",\"technical\":\"0\",\"non_technical\":\"1\",\"writer\":\"0\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"1\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"1\",\"writer_form_filled\":\"0\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":\"1\",\"firstname\":\"Bhavya Freelancer\",\"lastname\":\"Haria Freelancer\",\"gender\":\"\",\"whatsapp\":\"\",\"address\":\"Gokuldham\",\"street\":\"Gen A.K. Vaidya Marg\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"pincode\":\"400063\",\"agreed\":\"1\",\"password\":\"\"},{\"array\":\"Technical Array\"},{\"array\":\"Non Technical Array\",\"id\":\"2\",\"domains\":null,\"assignment_type\":\"[\"Report Writing\",\"Programming/Coding Assignment\",\"Research Paper\"]\",\"qualification\":\"BE\",\"working_hours\":\"24 hours\",\"subject_tags\":\"ML, Web Development, Android Development\",\"past_experience\":\"Yes\",\"typing_speed\":\"\",\"work_links\":\"http://localhost/Bluepen/src/freelance.php\",\"linkedin\":\"\",\"experience\":\"Yes\",\"past_work_files\":\"Absract.docx_$_\",\"resume\":\"Clothing App.pdf_$_\",\"profile_photo\":\"\",\"date_of_submission\":null},{\"array\":\"Writer Array\"}]'),
(18, 124, '{\"array\":\"Map Array\",\"freelancer_id\":\"124\",\"email\":\"bhavyaharia100@gmail.com\",\"email_verified\":\"1\",\"country_name\":\"India\",\"country_code\":\"91\",\"number\":\"961930548\",\"number_verified\":\"1\",\"technical\":\"0\",\"non_technical\":\"0\",\"writer\":\"1\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"1\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":null,\"firstname\":\"Bhavya\",\"lastname\":\"Haria\",\"gender\":\"Male\",\"whatsapp\":\"9619305482\",\"address\":\"gokuldham\",\"street\":\"marg\",\"city\":\"mumbai\",\"state\":\"maha\",\"pincode\":\"400063\",\"agreed\":\"1\",\"password\":null}', '{\"array\":\"Technical Array\"}', '{\"array\":\"Non Technical Array\"}', '{\"array\":\"Writer Array\",\"id\":\"2\",\"domains\":\"{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}\",\"writing\":\"1\",\"diagram\":\"1\",\"ed\":\"1\",\"typing\":\"1\",\"art\":\"1\",\"writing_capacity\":\"15\",\"writing_1day_cost\":\"5.0\",\"writing_2day_cost\":\"3.5\",\"writing_3day_cost\":\"2.0\",\"writing_sample\":\"writing.pdf\",\"diagram_cost\":\"25.0\",\"diagram_sample\":\"diagram.pdf\",\"ed_cost\":\"150.0\",\"ed_sample\":\"Array\",\"typing_cost\":\"25.0\",\"typing_speed\":\"0\",\"art_type_of_models\":\"2D, 3D, Sketches, Software\",\"art_cost\":\"200.0\",\"art_sample\":\"art.pdf\",\"bio\":\"dkfbdkjlbdkjbfdkjgbdfkjgbdfg\",\"profile_photo\":null,\"date_of_submission\":\"28-03-2023 20:08:41\"}', '[{\"array\":\"Map Array\",\"freelancer_id\":\"124\",\"email\":\"bhavyaharia100@gmail.com\",\"email_verified\":\"1\",\"country_name\":\"India\",\"country_code\":\"91\",\"number\":\"961930548\",\"number_verified\":\"1\",\"technical\":\"0\",\"non_technical\":\"0\",\"writer\":\"1\",\"technical_form_filled\":\"0\",\"technical_interview_conducted\":\"0\",\"technical_agreement_sent\":\"0\",\"technical_agreement_received\":\"0\",\"technical_is_approved\":\"0\",\"non_technical_form_filled\":\"0\",\"non_technical_interview_conducted\":\"0\",\"non_technical_agreement_sent\":\"0\",\"non_technical_agreement_received\":\"0\",\"non_technical_is_approved\":\"0\",\"writer_form_filled\":\"1\",\"writer_interview_conducted\":\"0\",\"writer_agreement_sent\":\"0\",\"writer_agreement_received\":\"0\",\"writer_is_approved\":\"0\",\"is_active\":null,\"firstname\":\"Bhavya\",\"lastname\":\"Haria\",\"gender\":\"Male\",\"whatsapp\":\"9619305482\",\"address\":\"gokuldham\",\"street\":\"marg\",\"city\":\"mumbai\",\"state\":\"maha\",\"pincode\":\"400063\",\"agreed\":\"1\",\"password\":null},{\"array\":\"Technical Array\"},{\"array\":\"Non Technical Array\"},{\"array\":\"Writer Array\",\"id\":\"2\",\"domains\":\"{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}\",\"writing\":\"1\",\"diagram\":\"1\",\"ed\":\"1\",\"typing\":\"1\",\"art\":\"1\",\"writing_capacity\":\"15\",\"writing_1day_cost\":\"5.0\",\"writing_2day_cost\":\"3.5\",\"writing_3day_cost\":\"2.0\",\"writing_sample\":\"writing.pdf\",\"diagram_cost\":\"25.0\",\"diagram_sample\":\"diagram.pdf\",\"ed_cost\":\"150.0\",\"ed_sample\":\"Array\",\"typing_cost\":\"25.0\",\"typing_speed\":\"0\",\"art_type_of_models\":\"2D, 3D, Sketches, Software\",\"art_cost\":\"200.0\",\"art_sample\":\"art.pdf\",\"bio\":\"dkfbdkjlbdkjbfdkjgbdfkjgbdfg\",\"profile_photo\":null,\"date_of_submission\":\"28-03-2023 20:08:41\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_map`
--

DROP TABLE IF EXISTS `freelancers_map`;
CREATE TABLE IF NOT EXISTS `freelancers_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `email_verified` tinyint(1) NOT NULL,
  `country_name` text NOT NULL,
  `country_code` int(11) NOT NULL,
  `number` text NOT NULL,
  `number_verified` tinyint(1) NOT NULL,
  `technical` tinyint(1) NOT NULL DEFAULT '0',
  `non technical` tinyint(1) NOT NULL DEFAULT '0',
  `writer` tinyint(1) NOT NULL DEFAULT '0',
  `technical_form_filled` tinyint(4) DEFAULT '1',
  `technical_interview_conducted` tinyint(4) DEFAULT '0',
  `technical_agreement_sent` tinyint(4) DEFAULT '0',
  `technical_agreement_received` tinyint(4) DEFAULT '0',
  `technical_is_approved` tinyint(1) DEFAULT '0',
  `non_technical_form_filled` tinyint(4) DEFAULT '1',
  `non_technical_interview_conducted` tinyint(4) DEFAULT '0',
  `non_technical_agreement_sent` tinyint(4) DEFAULT '0',
  `non_technical_agreement_received` tinyint(4) DEFAULT '0',
  `non_technical_is_approved` tinyint(4) DEFAULT '0',
  `writer_form_filled` tinyint(4) DEFAULT '1',
  `writer_interview_conducted` tinyint(4) DEFAULT '0',
  `writer_agreement_sent` tinyint(4) DEFAULT '0',
  `writer_agreement_received` tinyint(4) DEFAULT '0',
  `writer_is_approved` tinyint(4) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT NULL,
  `firstname` text,
  `lastname` text,
  `gender` text,
  `whatsapp` text,
  `address` text,
  `street` text,
  `city` text,
  `state` text,
  `pincode` text,
  `agreed` tinyint(1) DEFAULT '0',
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancers_map`
--

INSERT INTO `freelancers_map` (`id`, `email`, `email_verified`, `country_name`, `country_code`, `number`, `number_verified`, `technical`, `non technical`, `writer`, `technical_form_filled`, `technical_interview_conducted`, `technical_agreement_sent`, `technical_agreement_received`, `technical_is_approved`, `non_technical_form_filled`, `non_technical_interview_conducted`, `non_technical_agreement_sent`, `non_technical_agreement_received`, `non_technical_is_approved`, `writer_form_filled`, `writer_interview_conducted`, `writer_agreement_sent`, `writer_agreement_received`, `writer_is_approved`, `is_active`, `firstname`, `lastname`, `gender`, `whatsapp`, `address`, `street`, `city`, `state`, `pincode`, `agreed`, `password`) VALUES
(73, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(71, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(72, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(70, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(69, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(68, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(66, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(67, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(65, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(64, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(63, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(62, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(61, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(60, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(59, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(57, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(58, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(56, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(54, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(52, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(53, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(50, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(51, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(49, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(47, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(48, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(45, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'B-42, B-002, Dayanand Soc., Opp. Lifeline Hospital, Gokuldham, Goregaon(East)', 'Gen. A.K. Vaidya Marg', 'Mumbai', 'Maharashtra', '400063', 1, ''),
(133, 'abc123@gmail.com', 1, 'India', 91, '9513578246', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bhavya', 'haria', 'Male', '9513578246', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(44, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'B-42, B-002, Dayanand Soc., Opp. Lifeline Hospital, Gokuldham, Goregaon(East)', 'Gen. A.K. Vaidya Marg', 'Mumbai', 'Maharashtra', '400063', 1, ''),
(43, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'B-42, B-002, Dayanand Soc., Opp. Lifeline Hospital, Gokuldham, Goregaon(East)', 'Gen. A.K. Vaidya Marg', 'Mumbai', 'Maharashtra', '400063', 1, ''),
(42, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'B-42, B-002, Dayanand Soc., Opp. Lifeline Hospital, Gokuldham, Goregaon(East)', 'Gen. A.K. Vaidya Marg', 'Mumbai', 'Maharashtra', '400063', 1, ''),
(41, 'hu@g.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-2255566644', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'ka', 'ki', '', '', 'rr', 'hj', 'mh', 'mh', '80', 1, ''),
(40, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'gen a.k. vaidya marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(38, 'bhav@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokudldham', 'sjfnj', 'mum', 'maha', '400063', 1, ''),
(39, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'vaidya marg', 'mumbai', 'maha', '400063', 1, ''),
(37, 'bhav@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokudldham', 'sjfnj', 'mum', 'maha', '400063', 1, '$2y$10$xbnOvVA/7GhzRqmIkaopxO3OM2zTUyelUa1o3.VlkbbQ0595puZ2G'),
(35, 'bh@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'adn', 'k;jfdskj', 'sdkjfsdkj', 'aslaskjl', '400063', 1, ''),
(36, 'bhav@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokudldham', 'sjfnj', 'mum', 'maha', '400063', 1, ''),
(33, 'bh@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'adn', 'k;jfdskj', 'sdkjfsdkj', 'aslaskjl', '400063', 1, ''),
(34, 'bh@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'adn', 'k;jfdskj', 'sdkjfsdkj', 'aslaskjl', '400063', 1, ''),
(32, 'bhavya@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mum', 'maha', '400063', 1, ''),
(30, 'bhavya@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mum', 'maha', '400063', 1, ''),
(31, 'bhavya@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mum', 'maha', '400063', 1, ''),
(29, 'bhavya@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gik', 'anf', 'skjjfnsdkj', 'aakjfskj', '400063', 1, ''),
(28, 'bhavya@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mumbai', 'maha', '400063', 1, ''),
(27, 'bhavya@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mumbai', 'maha', '400063', 1, ''),
(26, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mumbai', 'maha', '400063', 1, ''),
(25, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mumbai', 'maha', '400063', 1, ''),
(24, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mumbai', 'maha', '400063', 1, ''),
(22, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mum', 'maha', '400063', 1, ''),
(23, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mumbai', 'maha', '400063', 1, ''),
(21, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mumbai', 'maha', '400063', 1, ''),
(20, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mumbai', 'maha', '400063', 1, ''),
(19, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street', 'mumbai', 'maha', '400063', 1, ''),
(18, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(17, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(11, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'vaidya marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(12, 'abc@zyx.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'vaidya marg', 'gully boy', 'bambai', 'maha', '400063', 1, ''),
(13, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'street ka reet ', 'bambai', 'maha', '400063', 1, ''),
(10, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'vaidya marg', 'mumbai', 'mahrashtra', '400063', 1, ''),
(9, 'vinitsavla6@gmail.com', 1, '', 91, '', 0, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'vinit', 'savla', '', '', 'ghatkopar', 'pantnagar', 'mumbai', 'maha', '400075', 1, '$2y$10$j13RHf5gbzFK0joaQqY8J.pocDRYkYUBifL6nQZJQIeRSIjax.Z76'),
(7, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'goregaon gokuldham', 'gen marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(6, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'goregaon gokuldham', 'gen marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(5, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, -1, 0, 0, 0, 0, -1, 0, 0, 0, 0, -1, 0, 'bhavya', 'haria', '', '', 'goregaon gokuldham', 'gen marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(4, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'vaidya marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(3, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham, goregaon', 'gen vaidya marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(2, 'bhavyaharia1000@gmail.com', 1, '', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'gen vaidya marg', 'mumbai', 'maharashtra', '400063', 1, ''),
(75, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(76, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(77, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(78, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(79, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(81, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(82, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 0, 0, 0, -1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(83, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(84, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, -1, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(85, 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, -1, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, ''),
(87, 'bhavyaharia0100@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, '$2y$10$j13RHf5gbzFK0joaQqY8J.pocDRYkYUBifL6nQZJQIeRSIjax.Z76'),
(88, 'bhavyahari100@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 'Bhavya', 'Haria', '', '', 'kofndsona', 'sl;dfmsld;fds;ln', 'lkfndlsfnslndfj', 'sldkdmfsldfd;lknl', '400063', 1, ''),
(89, 'bhavyaharia300@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-9619305482', 0, 1, 0, 0, 1, 1, 1, 1, -1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'mahar', '400063', 1, ''),
(92, 'bhavyaharia@gmail.com', 1, 'India (????)', 91, '91-9619305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'skjfjb', 'kskjdjnfkj', 'ksjkfdskj', 'sjdnf', '400063', 1, ''),
(93, 'bhavya100@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', 91, '91-96196305482', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'bhavya', 'haria', '', '', 'jsdfkj', 'skjfnskjdn', 'skjjfnsdkj', 'skjdjfn', '400063', 1, ''),
(120, 'bhavyaharia1000@gmail.com', 1, 'India', 91, '9619305482', 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(121, 'bhavyaharia1000@gmail.com', 1, 'India', 91, '9619305482', 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(122, 'bhavyaharia1000@gmail.com', 1, 'India', 91, '9619305482', 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bhavya', 'haria', '', '', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(123, 'local@blue.com', 1, 'India', 91, '9619305482', 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bhavya', 'Haria', 'Male', '9876543120', 'Male', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(132, '123@gmail.com', 1, 'India', 91, '9898989898', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bhavya', 'haria', 'Male', '9898989898', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(125, 'bhavyaharia1000@gmail.com', 1, 'India', 91, '961930548', 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL, 'Bhavya', 'Haria', 'Male', '9619305482', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(126, 'bhavyaharia1000@gmail.com', 1, 'India', 91, '961930548', 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL, 'Bhavya', 'Haria', 'Male', '9619305482', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(127, 'bhavyaharia10@gmail.com', 1, 'India', 91, '9619305482', 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL, 'bhavya', 'haria', 'Male', '9619305482', 'gokuldham', 'marg', 'mumbai', 'marg', '400063', 1, NULL),
(128, 'bhavyaharia1000@gmail.com', 1, 'India', 91, '961930548', 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL, 'Bhavya', 'Haria', 'Male', '9619305482', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(129, 'bhavyah@gmail.com', 1, 'India', 91, '9111111111', 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL, 'bhavya', 'haria', 'Male', '9619305482', 'gokuldham', 'jdnsjk', 'skdkjfnskjn', 'sdjfndskjn', '400063', 1, NULL),
(130, 'abc@def.com', 1, 'India', 91, '9874563105', 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL, 'savlon', 'bhai', 'Male', '9619305482', 'galaxy', 'bandra', 'mumbai', 'maha', '400078', 1, NULL),
(131, 'selmon@bhoi.com', 1, 'India', 91, '9879879879', 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, NULL, 'selmon', 'bhoi', 'Male', '9879879879', 'galaxy apt', 'bandra', 'mumbai', 'maha', '400087', 1, NULL),
(134, 'bhavyaharia1000@gmail.com', 1, 'India', 91, '9371824650', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bhavya', 'haria', 'Male', '9371824650', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(135, 'bhavyaharia1000@gmail.com', 1, 'India', 91, '9713654820', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bhavya', 'haria', 'Male', '9713654820', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(136, 'bhavyaharia1000@gmail.com', 1, 'India', 91, '9871236540', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bhavya', 'haria', 'Male', '9871236540', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(137, 'bhavyaharia1000@gmail.com', 1, 'India', 91, '9513572846', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bhavya', 'haria', 'Male', '9513572846', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL),
(138, 'bhavyaharia100@gmail.com', 1, 'India', 91, '9516237840', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bhavya', 'haria', 'Male', '9516237840', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_nontechnical`
--

DROP TABLE IF EXISTS `freelancers_nontechnical`;
CREATE TABLE IF NOT EXISTS `freelancers_nontechnical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `domains` text,
  `assignment_type` text NOT NULL,
  `qualification` text NOT NULL,
  `working_hours` text NOT NULL,
  `subject_tags` text NOT NULL,
  `past_experience` text NOT NULL,
  `typing_speed` text NOT NULL,
  `work_links` text NOT NULL,
  `linkedin` text NOT NULL,
  `experience` text NOT NULL,
  `past_work_files` text NOT NULL,
  `resume` text NOT NULL,
  `profile_photo` text NOT NULL,
  `date_of_submission` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancers_nontechnical`
--

INSERT INTO `freelancers_nontechnical` (`id`, `freelancer_id`, `domains`, `assignment_type`, `qualification`, `working_hours`, `subject_tags`, `past_experience`, `typing_speed`, `work_links`, `linkedin`, `experience`, `past_work_files`, `resume`, `profile_photo`, `date_of_submission`) VALUES
(2, 46, NULL, '[\"Report Writing\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'ML, Web Development, Android Development', 'Yes', '', 'http://localhost/Bluepen/src/freelance.php', '', 'Yes', 'Absract.docx_$_', 'Clothing App.pdf_$_', '', NULL),
(3, 50, NULL, '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', '', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', '', NULL),
(4, 54, NULL, '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', '', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', '', NULL),
(5, 59, NULL, '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', '', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', '', NULL),
(6, 66, NULL, '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', '', NULL),
(7, 69, NULL, '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', '', NULL),
(8, 73, NULL, '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', '', NULL),
(9, 78, NULL, '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', '', NULL),
(10, 83, NULL, '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', '', NULL),
(11, 84, NULL, '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', '', NULL),
(12, 85, NULL, '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', '', NULL),
(13, 88, NULL, '[\"Primary / Secondary Data Analysis\",\"Engineering Drawing\"]', 'BE', '24/7', '[\"Machine,Machine Learning,Machine Learning Using Python\"]', 'slmdndsjdjn', '', 'http://localhost/Bluepen/src/freelance.php', 'http://www.linkedin.com', 'slmdndsjdjn', 'john2012 (1) (1).pdf_$_', 'Virtual_Interior_Designer_App_11-converted-compressed (2) (1).pdf_$_', '', NULL),
(14, 92, NULL, '[\"Programming / Coding Assignment\"]', 'be', 'sd', '[\"SD-WAN\"]', 'nsdj', '', 'http://localhost/Bluepen/src/freelance.php', 'https://linkedin.com', 'nsdj', 'BillPayReceiptTataTele.pdf_$_', 'BillPayReceiptTataTele.pdf_$_', '', NULL),
(15, 93, NULL, '[\"Programming \\/ Coding Assignment\"]', 'BE', 'BE', '[\"Machine Learning\",\"Deep Learning\"]', 'BE', '', 'BE', 'https://linkedin.com', 'BE', 'BillPayReceiptTataTele.pdf_$_', 'BillPayReceiptTataTele.pdf_$_', '', NULL),
(16, 138, 'Psychology & Sociology,Law', '[\"Primary/Secondary Data Analysis\"]', 'be', '24*7', '[\"Machine Elements and Mechanism\"]', 'good', '>5000', 'bluepen.co.in', 'linkedin.com/in/bhavya-haria-a4970215b/', 'good', '7957515_4942Project Synopsis-1.pdf_$_', '7026resume-anonymized.pdf_$_', '', '14-06-2023 18:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_technical`
--

DROP TABLE IF EXISTS `freelancers_technical`;
CREATE TABLE IF NOT EXISTS `freelancers_technical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `domains` text,
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
  `profile_photo` text,
  `date_of_submission` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancers_technical`
--

INSERT INTO `freelancers_technical` (`id`, `freelancer_id`, `domains`, `assignment_type`, `qualification`, `working_hours`, `subject_tags`, `past_experience`, `work_links`, `linkedin`, `experience`, `past_work_files`, `resume`, `profile_photo`, `date_of_submission`) VALUES
(141, 75, '', '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(140, 72, '', '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(139, 71, '', '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(138, 70, '', '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(137, 68, '', '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(136, 67, '', '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(135, 65, '', '[\"Programming/Coding Assignment\"]', 'BE', '24', '[\"Coding and programming,coding\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'Can a documentarybe described as the creative representation of reality.docx_$_', 'Can a documentarybe described as the creative representation of reality.docx_$_', NULL, NULL),
(134, 64, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(133, 63, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(132, 62, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(131, 61, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(130, 60, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(129, 58, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(128, 57, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(127, 56, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(126, 53, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(125, 52, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(124, 51, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(123, 49, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(122, 48, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(121, 47, '', '[\"Literature Review\",\"Statement of Purpose\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', 'Web Development, Machine Learning', 'Yes', 'https://webmail.gluehost.in/cpsess8358430761/3rdparty/roundcube/?_task=mail&_mbox=INBOX', '', 'Yes', 'Absract.docx_$_', 'Saanvi Internship certificate.pdf_$_', NULL, NULL),
(120, 45, '', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', 'Bachelor of Engineering', '24 hours', '[\"Machine Learning,Backend web development,Full Stack Web Development\"]', 'Bluepen, Whitepocket', 'https://github.com/vidushi4/Personality-prediction-system', '', 'Bluepen, Whitepocket', 'Muradâ€™s resume.pdf_$_', 'WhitePocket Letter head(krutikpatel).pdf_$_', NULL, NULL),
(119, 44, '', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', 'Bachelor of Engineering', '24 hours', '[\"Machine Learning,Backend web development,Full Stack Web Development\"]', 'Bluepen, Whitepocket', 'https://github.com/vidushi4/Personality-prediction-system', '', 'Bluepen, Whitepocket', 'Muradâ€™s resume.pdf_$_', 'WhitePocket Letter head(krutikpatel).pdf_$_', NULL, NULL),
(118, 43, '', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', 'Bachelor of Engineering', '24 hours', '[\"Machine Learning,Backend web development,Full Stack Web Development\"]', 'Bluepen, Whitepocket', 'https://github.com/vidushi4/Personality-prediction-system', '', 'Bluepen, Whitepocket', 'Muradâ€™s resume.pdf_$_', 'WhitePocket Letter head(krutikpatel).pdf_$_', NULL, NULL),
(117, 42, '', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', 'Bachelor of Engineering', '24 hours', '[\"Machine Learning,Backend web development,Full Stack Web Development,Mobile Application and Web Development\"]', 'Bluepen, Whitepocket', 'https://github.com/vidushi4/Personality-prediction-system', '', 'Bluepen, Whitepocket', 'Muradâ€™s resume.pdf_$_', 'WhitePocket Letter head(krutikpatel).pdf_$_', NULL, NULL),
(116, 41, '', '[\"Dissertation Writing\",\"Programming/Coding Assignment\"]', 'no', 'no', '[\"AI & ML\"]', 'no', 'http://localhost/Bluepen/src/freelance.php', '', 'no', 'Project Report.docx_$_', 'CompilerDesign.pdf_$_', NULL, NULL),
(115, 40, '', '[\"Literature Review\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'BE', '24 hours', '[\"All Computer Science Engineering subjects,Advanced Data Structures,Advanced Data Structure and Algorithms,Algorithms and Data Structures,All subjects of Computer Science\"]', 'yes i have ', 'http://localhost/Bluepen/src/freelance.php', '', 'yes i have ', 'resume300921.pdf_$_', 'Copy of Major Project 2.pdf_$_', NULL, NULL),
(114, 39, '', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', 'be', '24 hours', '[\"All Computer Science Engineering subjects\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'Conference-template-A4.doc_$_', 'F29AI-Coursework2-part1.pdf_$_', NULL, NULL),
(113, 38, '', '[\"Programming/Coding Assignment\"]', 'be', 'sdj', '[\"ISI Admission Test\"]', 'skdjfndskj', 'http://localhost/Bluepen/src/freelance.php', '', 'skdjfndskj', 'resume300921.pdf_$_', 'Copy of Major Project 2.pdf_$_', NULL, NULL),
(111, 36, '', '[\"Programming/Coding Assignment\"]', 'be', 'sdj', '[\"ISI Admission Test\"]', 'skdjfndskj', 'http://localhost/Bluepen/src/freelance.php', '', 'skdjfndskj', 'resume300921.pdf_$_', 'Copy of Major Project 2.pdf_$_', NULL, NULL),
(112, 37, '', '[\"Programming/Coding Assignment\"]', 'be', 'sdj', '[\"ISI Admission Test\"]', 'skdjfndskj', 'http://localhost/Bluepen/src/freelance.php', '', 'skdjfndskj', 'resume300921.pdf_$_', 'Copy of Major Project 2.pdf_$_', NULL, NULL),
(110, 35, '', '[\"Programming/Coding Assignment\"]', 'akjsn', 'aksjnc', '[\"IAS Mains Sociology\"]', 'alsnf', 'http://localhost/Bluepen/src/freelance.php', '', 'alsnf', 'resume300921.pdf_$_', 'Copy of Major Project 2.pdf_$_', NULL, NULL),
(108, 33, '', '[\"Programming/Coding Assignment\"]', 'akjsn', 'aksjnc', '[\"IAS Mains Sociology\"]', 'alsnf', 'http://localhost/Bluepen/src/freelance.php', '', 'alsnf', 'resume300921.pdf_$_', 'Copy of Major Project 2.pdf_$_', NULL, NULL),
(109, 34, '', '[\"Programming/Coding Assignment\"]', 'akjsn', 'aksjnc', '[\"IAS Mains Sociology\"]', 'alsnf', 'http://localhost/Bluepen/src/freelance.php', '', 'alsnf', 'resume300921.pdf_$_', 'Copy of Major Project 2.pdf_$_', NULL, NULL),
(107, 32, '', '[\"Programming/Coding Assignment\"]', 'be', 'yes', '[\"All the subjects of UPSC\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'resume300921.pdf_$_', 'NIttansharmacv_compressed.pdf_$_', NULL, NULL),
(105, 30, '', '[\"Programming/Coding Assignment\"]', 'be', 'yes', '[\"IPS\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'resume300921.pdf_$_', 'NIttansharmacv_compressed.pdf_$_', NULL, NULL),
(106, 31, '', '[\"Programming/Coding Assignment\"]', 'be', 'yes', '[\"IPS\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'resume300921.pdf_$_', 'NIttansharmacv_compressed.pdf_$_', NULL, NULL),
(104, 29, '', '[\"Programming/Coding Assignment\"]', 'be', 'ahbj', '[\"IAS\"]', 'askfnsdkj', 'http://localhost/Bluepen/src/freelance.php', '', 'askfnsdkj', 'resume300921.pdf_$_', 'BFI.doc_$_', NULL, NULL),
(102, 27, '', '[\"Programming/Coding Assignment\"]', 'be', 'yes', '[\"Adobe InDesign\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'NIttansharmacv_compressed.pdf_$_', 'resume300921.pdf_$_', NULL, NULL),
(103, 28, '', '[\"Programming/Coding Assignment\"]', 'be', 'yes', '[\"Adobe InDesign\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'NIttansharmacv_compressed.pdf_$_', 'resume300921.pdf_$_', NULL, NULL),
(101, 26, '', '[\"Programming/Coding Assignment\"]', 'be', 'yes', '[\"Backend web development\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'NIttansharmacv_compressed.pdf_$_', 'Project Report.docx_$_', NULL, NULL),
(100, 25, '', '[\"Programming/Coding Assignment\"]', 'be', 'yes', '[\"Backend web development\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'NIttansharmacv_compressed.pdf_$_', 'Project Report.docx_$_', NULL, NULL),
(99, 24, '', '[\"Literature Review\",\"Dissertation Writing\",\"Programming/Coding Assignment\",\"Review Article\"]', 'be', '24', '[\"Artificial intelligence\"]', 'sjfksj', 'http://localhost/Bluepen/src/freelance.php', '', 'sjfksj', 'Conference-template-A4.doc_$_', 'BFI.doc_$_', NULL, NULL),
(97, 22, '', '[\"Report Writing\",\"Programming/Coding Assignment\",\"Research Paper\"]', 'be', '24', '[\"AC Machines\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'resume300921.pdf_$_', 'BFI.doc_$_', NULL, NULL),
(98, 23, '', '[\"Literature Review\",\"Dissertation Writing\",\"Programming/Coding Assignment\",\"Review Article\"]', 'be', '24', '[\"Artificial intelligence\"]', 'sjfksj', 'http://localhost/Bluepen/src/freelance.php', '', 'sjfksj', 'Conference-template-A4.doc_$_', 'BFI.doc_$_', NULL, NULL),
(96, 21, '', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', 'be', '24', '[\"AWS Administration\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'NIttansharmacv_compressed.pdf_$_', 'resume300921.pdf_$_', NULL, NULL),
(95, 20, '', '[\"Report Writing\",\"Programming/Coding Assignment\"]', 'be', '24', '[\"AWS\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'resume300921.pdf_$_', 'NIttansharmacv_compressed.pdf_$_', NULL, NULL),
(92, 17, '', 'null', '', '', 'null', '', '', '', '', '', 'BFI.doc_$_', NULL, NULL),
(93, 18, '', 'null', '', '', 'null', '', '', '', '', '', 'resume300921.pdf_$_', NULL, NULL),
(94, 19, '', '[\"Report Writing\",\"Programming/Coding Assignment\"]', 'be', '24', '[\"AWS\"]', 'yes', 'http://localhost/Bluepen/src/freelance.php', '', 'yes', 'resume300921.pdf_$_', 'NIttansharmacv_compressed.pdf_$_', NULL, NULL),
(91, 13, '', '[\"Report Writing\",\"Literature Review\",\"Programming/Coding Assignment\"]', 'be', '24 hours', '[\"India,Ukraine\"]', 'hajaron', 'http://localhost/Bluepen/src/freelance.php', '', 'hajaron', 'CompilerDesign.pdf_$_', 'F29AI-Coursework2-part1.pdf_$_', NULL, NULL),
(90, 12, '', 'Array', 'BE', '24 hours', '[\"India\"]', 'abc company', 'http://localhost/Bluepen/src/freelance.php', '', 'abc company', 'CompilerDesign.pdf_$_', 'F29AI-Coursework2-part1.pdf_$_', NULL, NULL),
(89, 11, '', 'Programming/Coding Assignment', 'be', '24 hours', '[\"India,Ukraine\"]', 'bluepen', 'http://localhost/Bluepen/src/freelance.php', '', 'bluepen', 'CompilerDesign.pdf_$_', 'F29AI-Coursework2-part1.pdf_$_', NULL, NULL),
(88, 10, '', 'Programming/Coding Assignment', 'be', '24 hours', '[\"India,Uganda,Ukraine\"]', 'bluepen and whitepocket', 'http://localhost/Bluepen/src/freelance.php', '', 'bluepen and whitepocket', 'CompilerDesign.pdf_$_', 'F29AI-Coursework2-part1.pdf_$_', NULL, NULL),
(87, 9, '', 'research paper', 'bE', '4 ', '[\"\"]', 'WHITE POCKET', 'https://konstantclothing.com/', '', 'WHITE POCKET', 'GrocyGo Phase II.pdf_$_', 'Credit Card Fraud.pdf_$_', NULL, NULL),
(86, 7, '', 'all', 'be', '243', '[\"India,Heard and Mc Donald Islands\"]', 'bluepen', 'http://localhost/bluepen/src/freelance.php?signup=success', '', 'bluepen', 'GrocyGo Phase II.pdf_$_', 'GrocyGo Phase II (updated).pdf_$_', NULL, NULL),
(85, 6, '', 'all', 'be', '243', '[\"India,Heard and Mc Donald Islands\"]', 'bluepen', 'http://localhost/bluepen/src/freelance.php?signup=success', '', 'bluepen', 'GrocyGo Phase II.pdf_$_', 'GrocyGo Phase II (updated).pdf_$_', NULL, NULL),
(84, 5, '', 'all', 'be', '243', '[\"India,Heard and Mc Donald Islands\"]', 'bluepen', 'http://localhost/bluepen/src/freelance.php?signup=success', '', 'bluepen', 'GrocyGo Phase II.pdf_$_', 'GrocyGo Phase II (updated).pdf_$_', NULL, NULL),
(83, 4, '', 'all', 'be', '24 hours', '[\"India,Ukraine\"]', 'bluepen', 'http://localhost/bluepen/src/freelance.php?signup=success', '', 'bluepen', 'GrocyGo Phase II.pdf_$_', 'GrocyGo Phase II (updated).pdf_$_', NULL, NULL),
(82, 3, '', 'all', 'be', 'bhavyaharia100@gmail.com', '[\"India,Uganda\"]', 'blupen', 'http://localhost/bluepen/src/freelance.php?signup=success', '', 'blupen', 'GrocyGo Phase II.pdf_$_', 'GrocyGo Phase II (updated).pdf_$_', NULL, NULL),
(176, 132, 'Machine Learning & AI,Web Development', '[\"Programming / Coding\"]', 'be', '24*7', '[\"mahcine\"]', 'i have', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', 'sifsdhf', '4978DarkIcon.png_$_4978BlackLogoBg.png_$_4978BlackLogo.png_$_4978BlackIconBg.png_$_4978BlackIcon.png_$_', '2071resume-anonymized.pdf_$_', '', '14-06-2023 15:19:19'),
(81, 2, '', 'all', 'be', 'bhavyaharia100@gmail.com', '[\"India,Vatican City State\"]', 'bluepen', 'http://localhost/bluepen/src/freelance.php?signup=success', '', 'bluepen', 'GrocyGo Phase II.pdf_$_', 'GrocyGo Phase II (updated).pdf_$_', NULL, NULL),
(142, 76, '', '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(143, 77, '', '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(144, 79, '', '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(145, 81, '', '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(146, 82, '', '[\"Programming/Coding Assignment\"]', 'be', '', '[\"rest\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(147, 87, '', '[\"Programming/Coding Assignment\"]', '24', '', '[\"test\"]', '', 'http://localhost/Bluepen/src/freelance.php', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', '', 'Resume (5).pdf_$_', 'Resume (5).pdf_$_', NULL, NULL),
(148, 89, '', '[\"Programming / Coding Assignment\"]', 'BE', '24', '[\"Machine Learning,Machine Learning Using Python\"]', 'ajdajs', 'http://localhost/Bluepen/src/freelance.php', 'http://linkedin.com', 'ajdajs', 'Sample.pdf_$_', '4.71 Guidelines thesis dissertaion report- Ph.D,M.E,B.E  (AC 4-3-14).pdf_$_', NULL, NULL),
(149, 94, '', '[\"Programming / Coding Assignment\"]', 'dd', 'df', '[\"S/4 HANA Sales and distribution\"]', 'dfgfdg', 'http://localhost/Bluepen/src/freelance.php', 'https://linkedin.com', 'dfgfdg', 'BillPayReceiptTataTele.pdf_$_', 'BillPayReceiptTataTele.pdf_$_', NULL, NULL),
(155, 99, '', 'Array', 'BE', '24*7', 'Array', '3 years', 'github', 'https://www.linkedin.com/in/rahul-subramanian-74347510?miniProfileUrn=urn%3Ali%3Afs_miniProfile%3AACoAAAI0TOMBYSjgt4eggGJx16m42KxUh5f9tXg&lipi=urn%3Ali%3Apage%3Ad_flagship3_feed%3BfvW0HkdETh2byj0fPB1wKQ%3D%3D', 'optional experience', '', '', '', '22-03-2023 12:43:01'),
(156, 100, '', 'Array', 'BE', '24*7', 'Array', '3 years', 'github', 'https://www.linkedin.com/in/rahul-subramanian-74347510?miniProfileUrn=urn%3Ali%3Afs_miniProfile%3AACoAAAI0TOMBYSjgt4eggGJx16m42KxUh5f9tXg&lipi=urn%3Ali%3Apage%3Ad_flagship3_feed%3BfvW0HkdETh2byj0fPB1wKQ%3D%3D', 'optional experience', '', '', '', '22-03-2023 12:43:59'),
(157, 101, '', '[]', 'BE', '24*7', 'Array', '3 years', 'github', 'https://www.linkedin.com/in/rahul-subramanian-74347510?miniProfileUrn=urn%3Ali%3Afs_miniProfile%3AACoAAAI0TOMBYSjgt4eggGJx16m42KxUh5f9tXg&lipi=urn%3Ali%3Apage%3Ad_flagship3_feed%3BfvW0HkdETh2byj0fPB1wKQ%3D%3D', 'optional experience', '', '', '', '22-03-2023 12:48:45'),
(158, 102, '', '[]', 'BE', '24*7', '[[[[[[\"Machine Learning\",\"Deep Learning\"]]]]]]', '3 years', 'github', 'https://www.linkedin.com/in/rahul-subramanian-74347510?miniProfileUrn=urn%3Ali%3Afs_miniProfile%3AACoAAAI0TOMBYSjgt4eggGJx16m42KxUh5f9tXg&lipi=urn%3Ali%3Apage%3Ad_flagship3_feed%3BfvW0HkdETh2byj0fPB1wKQ%3D%3D', 'optional experience', '', '', '', '22-03-2023 12:49:56'),
(159, 103, '', '[\"black book\",\"programming / coding\",\"research paper\",\"ppt\"]', 'BE', '24*7', '[\"Machine Learning\",\"Deep Learning\"]', '3 years', 'github', 'https://www.linkedin.com/in/rahul-subramanian-74347510?miniProfileUrn=urn%3Ali%3Afs_miniProfile%3AACoAAAI0TOMBYSjgt4eggGJx16m42KxUh5f9tXg&lipi=urn%3Ali%3Apage%3Ad_flagship3_feed%3BfvW0HkdETh2byj0fPB1wKQ%3D%3D', 'optional experience', '', '', '', '22-03-2023 12:54:54'),
(172, 120, 'Machine Learning / AI,Web Development,Mobile Development', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', 'be', '24*7', '[\"Machine Learning\",\"Deep Learning\"]', '2 years', 'github', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', 'optional', '4346matlab_in_india.csv_$_4346finalscraping.py_$_4346tutorsinindia.html_$_4346teacheron1.csv_$_4346big_data_in_mumbai.csv_$_', '9183getname.py_$_', '3881testdata.html_$_', '26-03-2023 20:33:43'),
(173, 121, 'Machine Learning / AI,Web Development,Mobile Development', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', 'be', '24*7', '[\"Machine Learning\",\"Deep Learning\"]', '2 years', 'github', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', 'optional', '4346matlab_in_india.csv_$_4346finalscraping.py_$_4346tutorsinindia.html_$_4346teacheron1.csv_$_4346big_data_in_mumbai.csv_$_', '9183getname.py_$_', '3881testdata.html_$_', '26-03-2023 20:33:48'),
(174, 122, 'Machine Learning / AI,Web Development,Mobile Development', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', 'be', '24*7', '[\"Machine Learning\"]', '2 years', 'github', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', 'optional', '4346finalscraping.py_$_', '9183data.py_$_', '3881testdata.html_$_', '26-03-2023 20:47:47'),
(175, 123, 'Machine Learning / AI,Web Development,Mobile Development', '[\"Programming / Coding Assignment\"]', 'BE', 'BE', '[\"Machine Learning\",\"Deep Learning\"]', 'BE', 'BE', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', 'BE', '4346finalscraping.py_$_', '9183data.py_$_', '3881freelancerstest.csv_$_', '26-03-2023 20:52:21'),
(177, 133, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', 'asd', '[\"AS\"]', 'sdsdf', 'https://bluepen.co.in/', 'https://linkedin.com/in/sachin-soni-969978167', 'gdfgdfg', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '3346resume-anonymized.pdf_$_', '', '14-06-2023 15:30:31'),
(178, 133, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', 'asd', '[\"AS\"]', 'sdsdf', 'https://bluepen.co.in/', 'https://linkedin.com/in/sachin-soni-969978167', 'gdfgdfg', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '3346resume-anonymized.pdf_$_', '', '14-06-2023 15:31:04'),
(179, 133, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', 'asd', '[\"AS\"]', 'sdsdf', 'https://bluepen.co.in/', 'https://linkedin.com/in/sachin-soni-969978167', 'gdfgdfg', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '3346resume-anonymized.pdf_$_', '', '14-06-2023 15:33:09'),
(180, 133, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', 'asd', '[\"AS\"]', 'sdsdf', 'https://bluepen.co.in/', 'https://linkedin.com/in/sachin-soni-969978167', 'gdfgdfg', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '3346resume-anonymized.pdf_$_', '', '14-06-2023 16:02:46'),
(181, 133, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', 'asd', '[\"AS\"]', 'sdsdf', 'https://bluepen.co.in/', 'https://linkedin.com/in/sachin-soni-969978167', 'gdfgdfg', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '3346resume-anonymized.pdf_$_', '', '14-06-2023 16:02:54'),
(182, 133, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', 'asd', '[\"AS\"]', 'sdsdf', 'https://bluepen.co.in/', 'https://linkedin.com/in/sachin-soni-969978167', 'gdfgdfg', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '3346resume-anonymized.pdf_$_', '', '14-06-2023 16:03:38'),
(183, 133, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', 'asd', '[\"AS\"]', 'sdsdf', 'https://bluepen.co.in/', 'https://linkedin.com/in/sachin-soni-969978167', 'gdfgdfg', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '3346resume-anonymized.pdf_$_', '', '14-06-2023 16:03:49'),
(184, 134, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', 'asd', '[\"AS\"]', 'sdsdf', 'https://bluepen.co.in/', 'https://linkedin.com/in/sachin-soni-969978167', 'gdfgdfg', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '3346resume-anonymized.pdf_$_', '', '14-06-2023 16:18:46'),
(185, 134, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', 'asd', '[\"AS\"]', 'sdsdf', 'https://bluepen.co.in/', 'https://linkedin.com/in/sachin-soni-969978167', 'gdfgdfg', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '3346resume-anonymized.pdf_$_', '', '14-06-2023 16:22:49'),
(186, 134, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', 'asd', '[\"AS\"]', 'sdsdf', 'https://bluepen.co.in/', 'https://linkedin.com/in/sachin-soni-969978167', 'gdfgdfg', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '3346resume-anonymized.pdf_$_', '', '14-06-2023 16:22:59'),
(187, 134, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', 'asd', '[\"AS\"]', 'sdsdf', 'https://bluepen.co.in/', 'https://linkedin.com/in/sachin-soni-969978167', 'gdfgdfg', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '3346resume-anonymized.pdf_$_', '', '14-06-2023 16:30:22'),
(188, 135, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', '24-*7', '[\"Machine Learning\"]', 'good', 'https://github.com/Bhavya100/blue-pen-backend/commits/main/api/freelancer/freelancersignuptechnical.php', 'https://linkedin.com/in/sachin-soni-969978167', 'great', '6272515_4942SAT_NewYork.ipynb_$_', '2382514_8543Resume_ Rithik Raj Vaishya.pdf_$_', '', '14-06-2023 16:50:07'),
(189, 135, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', '24-*7', '[\"Machine Learning\"]', 'good', 'https://github.com/Bhavya100/blue-pen-backend/commits/main/api/freelancer/freelancersignuptechnical.php', 'https://linkedin.com/in/sachin-soni-969978167', 'great', '6272515_4942SAT_NewYork.ipynb_$_', '2382514_8543Resume_ Rithik Raj Vaishya.pdf_$_', '', '14-06-2023 16:53:15'),
(190, 135, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', '24-*7', '[\"Machine Learning\"]', 'good', 'https://github.com/Bhavya100/blue-pen-backend/commits/main/api/freelancer/freelancersignuptechnical.php', 'https://linkedin.com/in/sachin-soni-969978167', 'great', '6272515_4942SAT_NewYork.ipynb_$_', '2382514_8543Resume_ Rithik Raj Vaishya.pdf_$_', '', '14-06-2023 16:54:00'),
(191, 136, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', '24*7', '[\"Machine elements\"]', 'good', 'https://github.com/Bhavya100/blue-pen-backend/commits/main/api/freelancer/freelancersignuptechnical.phpb', 'https://linkedin.com/in/sachin-soni-969978167', 'great', '5097515_4942SAT_NewYork.ipynb_$_', '5016514_8543Resume_ Rithik Raj Vaishya.pdf_$_', '', '14-06-2023 17:01:08'),
(192, 136, 'Machine Learning & AI,Web Development,App Development', '[\"Programming / Coding\"]', 'be', '24*7', '[\"Machine elements\"]', 'good', 'https://github.com/Bhavya100/blue-pen-backend/commits/main/api/freelancer/freelancersignuptechnical.phpb', 'https://linkedin.com/in/sachin-soni-969978167', 'great', '5097515_4942SAT_NewYork.ipynb_$_', '5016514_8543Resume_ Rithik Raj Vaishya.pdf_$_', '', '14-06-2023 17:02:14'),
(193, 137, 'Machine Learning & AI,Web Development', '[\"Programming / Coding\"]', 'be', '24*7', '[\"Machine\"]', 'good', 'bluepen.co.in', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', 'good', '3347515_4942Project Synopsis-1.pdf_$_3347515_4942SAT_NewYork.ipynb_$_', '8827resume-anonymized.pdf_$_', '', '14-06-2023 17:52:19'),
(194, 137, 'Machine Learning & AI,Web Development', '[\"Programming / Coding\"]', 'be', '24*7', '[\"Machine\"]', 'good', 'bluepen.co.in', 'https://www.linkedin.com/in/bhavya-haria-a4970215b/', 'good', '3347515_4942Project Synopsis-1.pdf_$_3347515_4942SAT_NewYork.ipynb_$_', '8827resume-anonymized.pdf_$_', '', '14-06-2023 18:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers_writer`
--

DROP TABLE IF EXISTS `freelancers_writer`;
CREATE TABLE IF NOT EXISTS `freelancers_writer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `domains` text NOT NULL,
  `writing` tinyint(4) NOT NULL,
  `diagram` tinyint(4) NOT NULL,
  `ed` tinyint(4) NOT NULL,
  `typing` tinyint(4) NOT NULL,
  `art` tinyint(4) NOT NULL,
  `writing_capacity` int(11) DEFAULT NULL,
  `writing_1day_cost` decimal(11,1) DEFAULT NULL,
  `writing_2day_cost` decimal(11,1) DEFAULT NULL,
  `writing_3day_cost` decimal(11,1) DEFAULT NULL,
  `writing_sample` text,
  `diagram_cost` decimal(11,1) DEFAULT NULL,
  `diagram_sample` text,
  `ed_cost` decimal(11,1) DEFAULT NULL,
  `ed_sample` text,
  `typing_cost` decimal(11,1) DEFAULT NULL,
  `typing_speed` int(11) DEFAULT NULL,
  `art_type_of_models` text,
  `art_cost` decimal(11,1) DEFAULT NULL,
  `art_sample` text,
  `bio` text NOT NULL,
  `profile_photo` text,
  `date_of_submission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancers_writer`
--

INSERT INTO `freelancers_writer` (`id`, `freelancer_id`, `domains`, `writing`, `diagram`, `ed`, `typing`, `art`, `writing_capacity`, `writing_1day_cost`, `writing_2day_cost`, `writing_3day_cost`, `writing_sample`, `diagram_cost`, `diagram_sample`, `ed_cost`, `ed_sample`, `typing_cost`, `typing_speed`, `art_type_of_models`, `art_cost`, `art_sample`, `bio`, `profile_photo`, `date_of_submission`) VALUES
(3, 125, '{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}', 1, 1, 1, 1, 1, 15, '5.0', '3.5', '2.0', 'writing.pdf', '25.0', 'diagram.pdf', '150.0', 'Array', '25.0', 0, '2D, 3D, Sketches, Software', '200.0', 'art.pdf', 'dkfbdkjlbdkjbfdkjgbdfkjgbdfg', NULL, '28-03-2023 20:08:59'),
(4, 126, '{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}', 1, 1, 1, 1, 1, 15, '5.0', '3.5', '2.0', 'writing.pdf', '25.0', 'diagram.pdf', '150.0', 'Array', '25.0', 0, '2D, 3D, Sketches, Software', '200.0', 'art.pdf', 'dkfbdkjlbdkjbfdkjgbdfkjgbdfg', NULL, '28-03-2023 20:11:38'),
(5, 128, '{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}', 1, 1, 1, 1, 1, 15, '5.0', '3.5', '2.0', 'writing.pdf', '25.0', 'diagram.pdf', '150.0', 'Array', '25.0', 15, '2D, 3D, Sketches, Software', '200.0', 'art.pdf', 'dkfbdkjlbdkjbfdkjgbdfkjgbdfg', NULL, '29-03-2023 18:41:03'),
(7, 127, '{\"writing\":1,\"diagrams\":0,\"technical_drawing\":0,\"typing\":0,\"art_and_craft\":0}', 1, 0, 0, 0, 0, 0, '0.0', '0.0', '0.0', '4245TRAINED_INDIAN_DATA_FINAL_MODEL.h5_$_4245speak.mp3_$_4245recognise_final_sound.py_$_42451.png_$_', '0.0', '', '0.0', '', '0.0', 0, '', '0.0', '', 'i am a good writer. engineer ki shubh dua dunga main', NULL, '29-03-2023 18:48:38'),
(10, 129, '{\"writing\":1,\"diagrams\":0,\"technical_drawing\":0,\"typing\":0,\"art_and_craft\":0}', 1, 0, 0, 0, 0, 17, '7.5', '6.0', '5.0', '4245TRAINED_INDIAN_DATA_FINAL_MODEL.h5_$_4245speak.mp3_$_4245recognise_final_sound.py_$_42451.png_$_', '0.0', '', '0.0', '', '0.0', 0, '', '0.0', '', 'sldfndskjfndskjfndskjfndskjfndskjfn', NULL, '29-03-2023 19:00:51'),
(11, 130, '{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}', 1, 1, 1, 1, 1, 28, '13.0', '10.5', '9.0', '5697data.py_$_5697csvtest.py_$_5697ar_in_india.csv_$_', '100.0', '1380getname.py_$_1380freelancerstest.csv_$_1380finalscraping.py_$_', '250.0', 'Array', '20.0', 37, '2D models (project book, scrap book, colourful chart paper drawing etc,3D models(real time art models),Sketches and water colour paintings,Software based graphic designing', '500.0', '3963tutorsinindia.html_$_3963testdata.html_$_', 'heavy driver', NULL, '29-03-2023 19:13:16'),
(13, 131, '{\"writing\":1,\"diagrams\":1,\"technical_drawing\":1,\"typing\":1,\"art_and_craft\":1}', 1, 1, 1, 1, 1, 18, '9.5', '8.5', '7.0', '8674big_data_in_mumbai.csv_$_8674big_data_in_india.csv_$_8674ar_in_india.csv_$_', '120.0', '8329data.py_$_8329data.csv_$_8329csvtest.py_$_', '180.0', '1934getname.py_$_1934freelancerstest.csv_$_1934finalscraping.py_$_', '25.0', 50, '2D models,Sketches and water colour paintings,3D models,Software based graphic designing', '270.0', '5132teacheron1.csv_$_5132students.csv_$_5132matlab_in_india.csv_$_', 'heavy rider. As a seasoned writer with a flair for words, I craft stories that captivate readers and evoke emotion. With a degree in literature and years of experience, my writing is a reflection of my passion for storytelling. From short stories to articles, I weave words into compelling narratives that leave a lasting impact. As a keen observer of the human experience, my writing delves into the complexities of life, relationships, and the human psyche. With a penchant for creativity and a keen eye for detail, my words transport readers to new worlds and engage their imaginations. With a diverse portfolio spanning various genres and mediums, I am a versatile wordsmith who can adapt to any writing challenge. When I\'m not typing away at my keyboard, you can find me lost in the pages of a book or exploring the great outdoors for inspiration. As a writer, my mission is to leave an indelible mark on the literary world with my words.', NULL, '29-03-2023 19:35:04');

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

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_forgot_password_otp`
--

DROP TABLE IF EXISTS `freelancer_forgot_password_otp`;
CREATE TABLE IF NOT EXISTS `freelancer_forgot_password_otp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `generation` datetime NOT NULL,
  `expiry` datetime NOT NULL,
  `is_number` tinyint(4) NOT NULL,
  `number_output` text,
  `email_output` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_otp_email`
--

DROP TABLE IF EXISTS `freelancer_otp_email`;
CREATE TABLE IF NOT EXISTS `freelancer_otp_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) DEFAULT NULL,
  `email` text NOT NULL,
  `otp` int(11) NOT NULL,
  `category` text,
  `generation` datetime NOT NULL,
  `expiry` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancer_otp_email`
--

INSERT INTO `freelancer_otp_email` (`id`, `freelancer_id`, `email`, `otp`, `category`, `generation`, `expiry`) VALUES
(1, NULL, 'bhavyaharia100@gmail.com', 4338, 'Freelancer Technical', '2023-03-13 13:05:15', '2023-03-13 13:10:15'),
(2, NULL, 'bhavyaharia100@gmail.com', 4332, 'Freelancer Technical', '2023-03-17 16:11:21', '2023-03-17 16:16:21'),
(3, NULL, 'bhavyaharia100@gmail.com', 6687, '', '2023-03-17 16:18:22', '2023-03-17 16:23:22'),
(4, NULL, 'bhavyaharia100@gmail.com', 1643, '', '2023-03-17 16:20:57', '2023-03-17 16:25:57'),
(5, NULL, 'bhavyaharia100@gmail.com', 9960, '', '2023-03-17 16:24:20', '2023-03-17 16:29:20'),
(6, NULL, 'bhavyaharia100@gmail.com', 1890, '', '2023-03-17 16:25:41', '2023-03-17 16:30:41'),
(7, NULL, 'bhavyaharia100@gmail.com', 4337, '', '2023-03-17 16:26:49', '2023-03-17 16:31:49'),
(8, NULL, 'bhavyaharia100@gmail.com', 4417, 'Techncical', '2023-03-17 16:28:03', '2023-03-17 16:33:03'),
(9, NULL, 'bhavyaharia100@gmail.com', 3107, 'FreeLancer Technical', '2023-03-17 16:32:05', '2023-03-17 16:37:05'),
(10, NULL, 'bhavyaharia100@gmail.com', 8274, 'Freelancer Technical', '2023-03-17 16:44:45', '2023-03-17 16:49:45'),
(11, NULL, 'bhavyaharia100@gmail.com', 2147, 'Freelancer Technical', '2023-03-17 17:14:50', '2023-03-17 17:19:50'),
(12, NULL, 'bhavyaharia100@gmail.com', 9063, 'Freelancer Technical', '2023-03-17 17:20:20', '2023-03-17 17:25:20'),
(13, NULL, 'bhavyaharia100@gmail.com', 2047, 'Freelancer Technical', '2023-03-17 18:16:55', '2023-03-17 18:21:55'),
(14, NULL, 'bhavyaharia100@gmail.com', 1065, 'Freelancer Technical', '2023-03-17 18:21:17', '2023-03-17 18:26:17'),
(15, NULL, 'bhavyaharia100@gmail.com', 2687, 'Freelancer Technical', '2023-03-17 18:26:37', '2023-03-17 18:31:37'),
(16, NULL, 'bhavyaharia100@gmail.com', 7113, 'Freelancer Technical', '2023-03-17 18:30:36', '2023-03-17 18:35:36'),
(17, NULL, 'bhavyaharia100@gmail.com', 6285, 'Freelancer Technical', '2023-03-17 18:47:28', '2023-03-17 18:52:28'),
(18, NULL, 'bhavyaharia100@gmail.com', 9568, 'Freelancer Technical', '2023-03-17 18:48:38', '2023-03-17 18:53:38'),
(19, NULL, 'bhavyaharia100@gmail.com', 5922, 'Freelancer Technical', '2023-03-17 19:00:33', '2023-03-17 19:05:33'),
(20, NULL, 'bhavyaharia100@gmail.com', 9084, 'Freelancer Technical', '2023-03-17 19:05:32', '2023-03-17 19:10:32'),
(21, NULL, 'bhavyaharia100@gmail.com', 2427, 'Freelancer Technical', '2023-03-17 19:07:42', '2023-03-17 19:12:42'),
(22, NULL, 'bhavyaharia100@gmail.com', 2263, 'Freelancer Technical', '2023-03-17 19:13:43', '2023-03-17 19:18:43'),
(23, NULL, 'bhavyaharia100@gmail.com', 5705, 'Freelancer Technical', '2023-03-17 19:57:31', '2023-03-17 20:02:31'),
(24, NULL, 'bhavyaharia100@gmail.com', 5206, 'Freelancer Technical', '2023-03-21 17:41:13', '2023-03-21 17:46:13'),
(25, NULL, 'bhavyaharia100@gmail.com', 3766, 'Freelancer Technical', '2023-03-21 19:23:39', '2023-03-21 19:28:39'),
(26, NULL, 'bhavyaharia100@gmail.com', 1141, 'Freelancer Technical', '2023-03-22 12:40:10', '2023-03-22 12:45:10'),
(27, NULL, 'bhavyaharia100@gmail.com', 7818, 'Freelancer Technical', '2023-03-22 12:57:27', '2023-03-22 13:02:27'),
(28, NULL, 'bhavyaharia100@gmail.com', 6659, 'Freelancer Technical', '2023-03-22 13:30:07', '2023-03-22 13:35:07'),
(29, NULL, 'bhavyaharia10@gmail.com', 6314, 'Freelancer Technical', '2023-03-22 13:39:59', '2023-03-22 13:44:59'),
(30, NULL, 'bhavyaharia10@gmail.com', 6994, 'Freelancer Technical', '2023-03-22 15:24:23', '2023-03-22 15:29:23'),
(31, NULL, 'bhavyaharia10@gmail.com', 3023, 'Freelancer Technical', '2023-03-22 15:30:03', '2023-03-22 15:35:03'),
(32, NULL, 'bhavyaharia10@gmail.com', 1685, 'Freelancer Technical', '2023-03-22 15:34:16', '2023-03-22 15:39:16'),
(33, NULL, 'bhavyaharia10@gmail.com', 1794, 'Freelancer Technical', '2023-03-22 15:48:36', '2023-03-22 15:53:36'),
(34, NULL, 'bhavyaharia10@gmail.com', 9986, 'Freelancer Technical', '2023-03-22 16:08:46', '2023-03-22 16:13:46'),
(35, NULL, 'bhavyaharia10@gmail.com', 1803, 'Freelancer Technical', '2023-03-22 16:22:07', '2023-03-22 16:27:07'),
(36, NULL, 'bhavyaharia10@gmail.com', 7302, 'Freelancer Technical', '2023-03-22 16:24:45', '2023-03-22 16:29:45'),
(37, NULL, 'bhavyaharia10@gmail.como', 3588, 'Freelancer Technical', '2023-03-22 16:25:47', '2023-03-22 16:30:47'),
(38, NULL, 'bhavyaharia10@gmail.com', 1333, 'Freelancer Technical', '2023-03-22 16:27:06', '2023-03-22 16:32:06'),
(39, NULL, 'bhavyaharia10@gmail.com', 5540, 'Freelancer Technical', '2023-03-22 16:30:48', '2023-03-22 16:35:48'),
(40, NULL, 'bhavyaharia10@gmail.com', 9733, 'Freelancer Technical', '2023-03-22 16:31:23', '2023-03-22 16:36:23'),
(41, NULL, 'bhavyaharia10@gmail.com', 6341, 'Freelancer Technical', '2023-03-22 16:35:06', '2023-03-22 16:40:06'),
(42, NULL, 'bhavyaharia10@gmail.com', 4068, 'Freelancer Technical', '2023-03-22 16:41:57', '2023-03-22 16:46:57'),
(43, NULL, 'bhavyaharia10@gmail.com', 4920, 'Freelancer Technical', '2023-03-22 16:49:58', '2023-03-22 16:54:58'),
(44, NULL, 'bhavyaharia10@gmail.com', 4882, 'Freelancer Technical', '2023-03-22 16:55:28', '2023-03-22 17:00:28'),
(45, NULL, 'bhavyaharia10@gmail.com', 3630, 'Freelancer Technical', '2023-03-22 17:03:00', '2023-03-22 17:08:00'),
(46, NULL, 'bhavyaharia10@gmail.com', 4733, 'Freelancer Technical', '2023-03-22 17:05:54', '2023-03-22 17:10:54'),
(47, NULL, 'bhavyaharia10@gmail.com', 7953, 'Freelancer Technical', '2023-03-22 18:24:16', '2023-03-22 18:29:16'),
(48, NULL, 'bhavyaharia10@gmail.com', 7449, 'Freelancer Technical', '2023-03-22 18:47:50', '2023-03-22 18:52:50'),
(49, NULL, 'bhavyaharia10@gmail.com', 3510, 'Freelancer Technical', '2023-03-22 19:03:27', '2023-03-22 19:08:27'),
(50, NULL, 'bhavyaharia10@gmail.com', 6123, 'Freelancer Technical', '2023-03-22 19:07:24', '2023-03-22 19:12:24'),
(51, NULL, 'bhavyaharia10000@gmail.com', 9500, 'Freelancer Technical', '2023-03-23 13:18:25', '2023-03-23 13:23:25'),
(52, NULL, 'bhavyaharia100@gmail.com', 2412, 'Freelancer Technical', '2023-03-26 19:50:21', '2023-03-26 19:55:21'),
(53, NULL, 'bhavyaharia100@gmail.com', 2904, 'Freelancer Technical', '2023-03-26 19:52:18', '2023-03-26 19:57:18'),
(54, NULL, 'bhavyaharia100@gmail.com', 1035, 'Freelancer Technical', '2023-03-26 19:58:26', '2023-03-26 20:03:26'),
(55, NULL, 'bhavyaharia100@gmail.com', 2816, 'Freelancer Technical', '2023-03-26 19:59:35', '2023-03-26 20:04:35'),
(56, NULL, 'bhavyaharia100@gmail.com', 5707, 'Freelancer Technical', '2023-03-26 20:08:27', '2023-03-26 20:13:27'),
(57, NULL, 'bhavyaharia100@gmail.com', 3984, 'Freelancer Technical', '2023-03-26 20:12:40', '2023-03-26 20:17:40'),
(58, NULL, 'bhavyaharia100@gmail.com', 2337, 'Freelancer Technical', '2023-03-26 20:14:43', '2023-03-26 20:19:43'),
(59, NULL, 'bhavyaharia100@gmail.com', 3625, 'Freelancer Technical', '2023-03-26 20:30:26', '2023-03-26 20:35:26'),
(60, NULL, 'bhavyaharia100@gmail.com', 9464, 'Freelancer Technical', '2023-03-26 20:41:40', '2023-03-26 20:46:40'),
(61, NULL, 'local@blue.com', 9194, 'Freelancer Technical', '2023-03-26 20:46:17', '2023-03-26 20:51:17'),
(62, NULL, 'local@blue.com', 8791, 'Freelancer Technical', '2023-03-26 20:53:32', '2023-03-26 20:58:32'),
(63, NULL, 'local@blue.com', 8006, 'Freelancer Technical', '2023-03-26 20:57:37', '2023-03-26 21:02:37'),
(64, NULL, 'bhavyaharia100@gmail.com', 3328, 'Freelancer Technical', '2023-03-28 19:07:26', '2023-03-28 19:12:26'),
(65, NULL, 'bhavyaharia100@gmail.com', 6451, 'Freelancer Technical', '2023-03-29 17:21:17', '2023-03-29 17:26:17'),
(66, NULL, 'bhavyaharia10@gmail.com', 8924, 'writer', '2023-03-29 18:20:22', '2023-03-29 18:25:22'),
(67, NULL, 'bhavyaharia10@gmail.com', 3729, 'writer', '2023-03-29 18:26:41', '2023-03-29 18:31:41'),
(68, NULL, 'bhavyah@gmail.com', 9111, 'writer', '2023-03-29 18:51:56', '2023-03-29 18:56:56'),
(69, NULL, 'bhavyah@gmail.com', 9552, 'writer', '2023-03-29 18:59:30', '2023-03-29 19:04:30'),
(70, NULL, 'abc@def.com', 9845, 'writer', '2023-03-29 19:10:02', '2023-03-29 19:15:02'),
(71, NULL, 'selmon@bhoi.com', 3411, 'writer', '2023-03-29 19:28:53', '2023-03-29 19:33:53'),
(72, NULL, '123@gmail.com', 7920, 'technical', '2023-06-14 15:17:44', '2023-06-14 15:22:44'),
(73, NULL, 'abc123@gmail.com', 5755, 'technical', '2023-06-14 15:26:23', '2023-06-14 15:31:23'),
(74, NULL, 'bhavyaharia100@gmail.com', 5593, 'technical', '2023-06-14 16:10:41', '2023-06-14 16:15:41'),
(75, NULL, 'bhavyaharia100@gmail.com', 8413, 'technical', '2023-06-14 16:46:32', '2023-06-14 16:51:32'),
(76, NULL, 'bhavyaharia100@gmail.com', 7101, 'technical', '2023-06-14 16:59:57', '2023-06-14 17:04:57'),
(77, NULL, 'bhavyaharia100@gmail.com', 3760, 'technical', '2023-06-14 17:48:01', '2023-06-14 17:53:01'),
(78, NULL, 'bhavyaharia100@gmail.com', 9681, 'technical', '2023-06-14 17:49:26', '2023-06-14 17:54:26'),
(79, NULL, 'bhavyaharia100@gmail.com', 3991, 'technical', '2023-06-14 17:50:57', '2023-06-14 17:55:57'),
(80, NULL, 'bhavyaharia100@gmail.com', 3390, 'non_technical', '2023-06-14 18:16:00', '2023-06-14 18:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_otp_number`
--

DROP TABLE IF EXISTS `freelancer_otp_number`;
CREATE TABLE IF NOT EXISTS `freelancer_otp_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) DEFAULT NULL,
  `number` bigint(20) NOT NULL,
  `otp` int(11) NOT NULL,
  `category` text,
  `generation` datetime NOT NULL,
  `expiry` datetime NOT NULL,
  `output` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancer_otp_number`
--

INSERT INTO `freelancer_otp_number` (`id`, `freelancer_id`, `number`, `otp`, `category`, `generation`, `expiry`, `output`) VALUES
(1, NULL, 9619305482, 6887, 'Freelancer Technical', '2023-03-13 13:13:54', '2023-03-13 13:18:54', ''),
(2, NULL, 9619305482, 7627, 'Freelancer Technical', '2023-03-17 16:12:51', '2023-03-17 16:17:51', ''),
(3, NULL, 9619305482, 1460, 'FreeLancer Technical', '2023-03-17 16:42:43', '2023-03-17 16:47:43', ''),
(4, NULL, 9619305482, 2024, 'Freelancer Technical', '2023-03-17 16:44:23', '2023-03-17 16:49:23', ''),
(5, NULL, 9619305482, 3878, 'Freelancer Technical', '2023-03-17 17:14:38', '2023-03-17 17:19:38', ''),
(6, NULL, 9619305482, 9759, 'Freelancer Technical', '2023-03-17 17:20:09', '2023-03-17 17:25:09', ''),
(7, NULL, 9619305482, 2762, 'Freelancer Technical', '2023-03-17 18:17:03', '2023-03-17 18:22:03', ''),
(8, NULL, 9619305482, 7515, 'Freelancer Technical', '2023-03-17 18:21:26', '2023-03-17 18:26:26', ''),
(9, NULL, 9619305482, 7563, 'Freelancer Technical', '2023-03-17 18:26:46', '2023-03-17 18:31:46', ''),
(10, NULL, 9619305482, 6500, 'Freelancer Technical', '2023-03-17 18:30:51', '2023-03-17 18:35:51', ''),
(11, NULL, 9619305482, 2070, 'Freelancer Technical', '2023-03-17 18:47:37', '2023-03-17 18:52:37', ''),
(12, NULL, 9619305482, 2047, 'Freelancer Technical', '2023-03-17 18:48:49', '2023-03-17 18:53:49', ''),
(13, NULL, 9619305482, 5097, 'Freelancer Technical', '2023-03-17 19:00:40', '2023-03-17 19:05:40', ''),
(14, NULL, 9619305482, 6697, 'Freelancer Technical', '2023-03-17 19:05:39', '2023-03-17 19:10:39', ''),
(15, NULL, 9619305482, 2659, 'Freelancer Technical', '2023-03-17 19:07:49', '2023-03-17 19:12:49', ''),
(16, NULL, 9619305482, 8805, 'Freelancer Technical', '2023-03-17 19:13:50', '2023-03-17 19:18:50', ''),
(17, NULL, 9619305482, 5452, 'Freelancer Technical', '2023-03-17 19:57:40', '2023-03-17 20:02:40', ''),
(18, NULL, 9619305482, 4568, 'Freelancer Technical', '2023-03-21 17:41:20', '2023-03-21 17:46:20', ''),
(19, NULL, 9619305482, 6220, 'Freelancer Technical', '2023-03-21 19:23:47', '2023-03-21 19:28:47', ''),
(20, NULL, 9619305482, 6898, 'Freelancer Technical', '2023-03-22 12:40:19', '2023-03-22 12:45:19', ''),
(21, NULL, 9619305482, 7037, 'Freelancer Technical', '2023-03-22 12:57:33', '2023-03-22 13:02:33', ''),
(22, NULL, 9619305482, 1792, 'Freelancer Technical', '2023-03-22 13:30:25', '2023-03-22 13:35:25', ''),
(23, NULL, 9619305482, 4168, 'Freelancer Technical', '2023-03-22 13:40:06', '2023-03-22 13:45:06', ''),
(24, NULL, 9619305482, 8718, 'Freelancer Technical', '2023-03-22 15:24:31', '2023-03-22 15:29:31', ''),
(25, NULL, 9619305482, 5765, 'Freelancer Technical', '2023-03-22 15:30:10', '2023-03-22 15:35:10', ''),
(26, NULL, 9619305482, 6159, 'Freelancer Technical', '2023-03-22 15:34:28', '2023-03-22 15:39:28', ''),
(27, NULL, 9619305482, 1318, 'Freelancer Technical', '2023-03-22 15:48:45', '2023-03-22 15:53:45', ''),
(28, NULL, 9619305482, 4647, 'Freelancer Technical', '2023-03-22 16:08:57', '2023-03-22 16:13:57', ''),
(29, NULL, 9619305482, 7642, 'Freelancer Technical', '2023-03-22 16:22:14', '2023-03-22 16:27:14', ''),
(30, NULL, 9619305482, 3182, 'Freelancer Technical', '2023-03-22 16:25:57', '2023-03-22 16:30:57', ''),
(31, NULL, 9619305482, 7427, 'Freelancer Technical', '2023-03-22 16:27:12', '2023-03-22 16:32:12', ''),
(32, NULL, 9619305482, 4625, 'Freelancer Technical', '2023-03-22 16:30:57', '2023-03-22 16:35:57', ''),
(33, NULL, 9619305482, 3484, 'Freelancer Technical', '2023-03-22 16:32:06', '2023-03-22 16:37:06', ''),
(34, NULL, 9619305482, 2829, 'Freelancer Technical', '2023-03-22 16:35:14', '2023-03-22 16:40:14', ''),
(35, NULL, 9619305482, 9664, 'Freelancer Technical', '2023-03-22 16:42:04', '2023-03-22 16:47:04', ''),
(36, NULL, 9619305482, 5988, 'Freelancer Technical', '2023-03-22 16:50:04', '2023-03-22 16:55:04', ''),
(37, NULL, 9619305482, 4502, 'Freelancer Technical', '2023-03-22 16:55:33', '2023-03-22 17:00:33', ''),
(38, NULL, 9619305482, 7481, 'Freelancer Technical', '2023-03-22 17:03:07', '2023-03-22 17:08:07', ''),
(39, NULL, 9619305482, 6457, 'Freelancer Technical', '2023-03-22 17:06:07', '2023-03-22 17:11:07', ''),
(40, NULL, 9619305482, 3852, 'Freelancer Technical', '2023-03-22 18:24:23', '2023-03-22 18:29:23', ''),
(41, NULL, 9619305482, 9169, 'Freelancer Technical', '2023-03-22 18:47:59', '2023-03-22 18:52:59', ''),
(42, NULL, 9619305482, 3040, 'Freelancer Technical', '2023-03-22 19:03:55', '2023-03-22 19:08:55', ''),
(43, NULL, 9619305482, 6537, 'Freelancer Technical', '2023-03-22 19:07:34', '2023-03-22 19:12:34', ''),
(44, NULL, 9619305482, 4860, 'Freelancer Technical', '2023-03-23 13:18:32', '2023-03-23 13:23:32', ''),
(45, NULL, 9619305482, 5971, 'Freelancer Technical', '2023-03-26 19:50:34', '2023-03-26 19:55:34', ''),
(46, NULL, 9619305482, 4517, 'Freelancer Technical', '2023-03-26 19:52:24', '2023-03-26 19:57:24', ''),
(47, NULL, 9619305482, 5271, 'Freelancer Technical', '2023-03-26 19:58:35', '2023-03-26 20:03:35', ''),
(48, NULL, 9619305482, 1970, 'Freelancer Technical', '2023-03-26 19:59:43', '2023-03-26 20:04:43', ''),
(49, NULL, 9619305482, 5844, 'Freelancer Technical', '2023-03-26 20:08:38', '2023-03-26 20:13:38', ''),
(50, NULL, 9619305482, 8611, 'Freelancer Technical', '2023-03-26 20:12:47', '2023-03-26 20:17:47', ''),
(51, NULL, 9619305482, 7449, 'Freelancer Technical', '2023-03-26 20:14:50', '2023-03-26 20:19:50', ''),
(52, NULL, 9619305482, 4766, 'Freelancer Technical', '2023-03-26 20:30:33', '2023-03-26 20:35:33', ''),
(53, NULL, 9619305482, 9231, 'Freelancer Technical', '2023-03-26 20:41:49', '2023-03-26 20:46:49', ''),
(54, NULL, 9619305489, 5550, 'Freelancer Technical', '2023-03-26 20:47:07', '2023-03-26 20:52:07', ''),
(55, NULL, 9619305489, 1662, 'Freelancer Technical', '2023-03-26 20:53:46', '2023-03-26 20:58:46', ''),
(56, NULL, 9619305482, 1306, 'Freelancer Technical', '2023-03-26 20:57:47', '2023-03-26 21:02:47', ''),
(57, NULL, 9619305482, 8302, 'Freelancer Technical', '2023-03-29 17:21:28', '2023-03-29 17:26:28', ''),
(58, NULL, 9619305482, 5774, 'writer', '2023-03-29 18:20:30', '2023-03-29 18:25:30', ''),
(59, NULL, 9619305482, 8524, 'writer', '2023-03-29 18:26:47', '2023-03-29 18:31:47', ''),
(60, NULL, 9111111111, 5927, 'writer', '2023-03-29 18:52:06', '2023-03-29 18:57:06', ''),
(61, NULL, 9619301111, 7086, 'writer', '2023-03-29 18:59:39', '2023-03-29 19:04:39', ''),
(62, NULL, 9874563105, 8855, 'writer', '2023-03-29 19:10:16', '2023-03-29 19:15:16', ''),
(63, NULL, 9879879879, 7626, 'writer', '2023-03-29 19:29:02', '2023-03-29 19:34:02', ''),
(64, NULL, 9619305482, 2773, 'Freelancer Technical', '2023-05-26 15:48:47', '2023-05-26 15:53:47', ''),
(65, NULL, 9619305482, 1090, 'Freelancer Technical', '2023-05-26 15:56:01', '2023-05-26 16:01:01', ''),
(66, NULL, 9619305482, 1224, 'Freelancer Technical', '2023-05-26 15:59:39', '2023-05-26 16:04:39', ''),
(67, NULL, 9619305482, 2292, 'Freelancer Technical', '2023-05-26 16:03:32', '2023-05-26 16:08:32', '{\"status\":\"Success\",\"code\":\"011\",\"description\":\"Message submitted successfully\",\"data\":{\"messageid\":\"ODcyOTQ3MA==\",\"totnumber\":1,\"totalcredit\":1}}'),
(68, NULL, 9619305482, 5079, 'Freelancer Technical', '2023-05-26 16:04:23', '2023-05-26 16:09:23', '{\"status\":\"Success\",\"code\":\"011\",\"description\":\"Message submitted successfully\",\"data\":{\"messageid\":\"ODcyOTQ5Mw==\",\"totnumber\":1,\"totalcredit\":1}}'),
(69, NULL, 9619305482, 5902, 'Freelancer Technical', '2023-05-30 12:44:24', '2023-05-30 12:49:24', '{\"status\":\"false\",\"code\":\"012\",\"description\":\"API access is disabled.\"}'),
(70, NULL, 9898989898, 9347, 'technical', '2023-06-14 15:18:25', '2023-06-14 15:23:25', NULL),
(71, NULL, 9513578246, 9662, 'technical', '2023-06-14 15:29:30', '2023-06-14 15:34:30', NULL),
(72, NULL, 9371824650, 5580, 'technical', '2023-06-14 16:11:34', '2023-06-14 16:16:34', NULL),
(73, NULL, 9713654820, 7021, 'technical', '2023-06-14 16:49:17', '2023-06-14 16:54:17', NULL),
(74, NULL, 9871236540, 3508, 'technical', '2023-06-14 17:00:32', '2023-06-14 17:05:32', NULL),
(75, NULL, 9632147850, 4165, 'technical', '2023-06-14 17:48:37', '2023-06-14 17:53:37', NULL),
(76, NULL, 9000000000, 9953, 'technical', '2023-06-14 17:49:49', '2023-06-14 17:54:49', NULL),
(77, NULL, 9513572846, 1887, 'technical', '2023-06-14 17:51:42', '2023-06-14 17:56:42', NULL),
(78, NULL, 9516237840, 3291, 'non_technical', '2023-06-14 18:17:51', '2023-06-14 18:22:51', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_update`
--

DROP TABLE IF EXISTS `freelancer_update`;
CREATE TABLE IF NOT EXISTS `freelancer_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) NOT NULL,
  `field` text NOT NULL,
  `value` text NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `freelancer_update`
--

INSERT INTO `freelancer_update` (`id`, `freelancer_id`, `field`, `value`, `updated_on`) VALUES
(1, 24, 'firstname', 'bhavya', '2023-05-31 12:42:16'),
(2, 123, 'firstname', 'bhavya', '2023-05-31 12:43:31'),
(3, 123, 'firstname', 'bhavya', '2023-05-31 12:44:18'),
(4, 123, 'firstname', 'Bhavya', '2023-05-31 12:44:44'),
(5, 123, 'lastname', 'haria', '2023-05-31 12:49:58'),
(6, 123, 'gender', 'Male', '2023-05-31 13:00:56'),
(7, 123, 'gender', '', '2023-05-31 13:08:01'),
(8, 123, 'address', 'gokuldham', '2023-05-31 15:31:25'),
(9, 123, 'street', 'marg', '2023-05-31 15:35:17'),
(10, 123, 'street', '', '2023-05-31 15:35:33'),
(11, 123, 'street', 'Male', '2023-05-31 15:36:40'),
(12, 123, 'city', 'mumbai', '2023-05-31 15:38:25'),
(13, 123, 'city', 'marg', '2023-05-31 15:38:41'),
(14, 123, 'state', 'maha', '2023-05-31 15:40:42'),
(15, 123, 'state', 'mumbai', '2023-05-31 15:40:58'),
(16, 123, 'pincode', '400063', '2023-05-31 15:42:42'),
(17, 123, 'pincode', 'maha', '2023-05-31 15:42:58'),
(18, 123, 'technical_subject_tags', '[\"Machine Learning\"]', '2023-05-31 19:22:39'),
(19, 123, 'technical_subject_tags', '[\"Machine Learning\"]', '2023-05-31 19:23:03'),
(20, 93, 'nontechnical_subject_tags', '[\"Dam 2 and Dam Safety\"]', '2023-05-31 19:27:11'),
(21, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:31:53'),
(22, 93, 'nontechnical_assignment_type', '[\"Programming / Coding Assignment\"]', '2023-05-31 19:32:24'),
(23, 93, 'nontechnical_assignment_type', '[\"Programming / Coding Assignment\"]', '2023-05-31 19:33:17'),
(24, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:34:10'),
(25, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:34:51'),
(26, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:37:04'),
(27, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:38:05'),
(28, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:38:08'),
(29, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:38:26'),
(30, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:44:55'),
(31, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:45:48'),
(32, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:46:13'),
(33, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:46:49'),
(34, 123, 'technical_assignment_type', '[\"black book\",\"research paper\",\"programming / coding\",\"ppt\"]', '2023-05-31 19:47:19'),
(35, 123, 'technical_qualification', 'be', '2023-05-31 19:49:23'),
(36, 123, 'technical_qualification', '\"BE\"', '2023-05-31 19:50:01'),
(37, 93, 'nontechnical_qualification', 'dd', '2023-05-31 19:50:23'),
(38, 93, 'nontechnical_qualification', 'be', '2023-05-31 19:50:40'),
(39, 93, 'nontechnical_working_hours', 'df', '2023-05-31 19:57:29'),
(40, 123, 'technical_working_hours', '24*7', '2023-05-31 19:57:56'),
(41, 123, 'technical_past_experience', '2 years', '2023-05-31 20:00:01'),
(42, 93, 'nontechnical_past_experience', 'dfgfdg', '2023-05-31 20:00:17'),
(43, 93, 'nontechnical_work_links', 'http://localhost/Bluepen/src/freelance.php', '2023-05-31 20:03:00'),
(44, 123, 'technical_work_links', 'github', '2023-05-31 20:03:26'),
(45, 123, 'technical_experience', 'optional', '2023-05-31 20:06:02'),
(46, 93, 'nontechnical_experience', 'dfgfdg', '2023-05-31 20:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `marketing_data`
--

DROP TABLE IF EXISTS `marketing_data`;
CREATE TABLE IF NOT EXISTS `marketing_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` text NOT NULL,
  `data` text NOT NULL,
  `added_on` text NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_otp_email`
--

INSERT INTO `student_otp_email` (`id`, `user_id`, `email`, `otp`, `generation`, `expiry`) VALUES
(1, NULL, '', 1154, '2023-02-20 12:15:10', '2023-02-20 12:20:10'),
(2, NULL, 'bhavyaharia100@gmail.com', 6131, '2023-02-20 12:17:18', '2023-02-20 12:22:18'),
(3, NULL, 'bhavyaharia100@gmail.com', 7491, '2023-02-20 15:23:13', '2023-02-20 15:28:13'),
(4, NULL, 'bhavyaharia100@gmail.com', 8184, '2023-02-20 15:30:56', '2023-02-20 15:35:56'),
(5, NULL, 'bhavyaharia100@gmail.com', 1186, '2023-03-06 14:10:19', '2023-03-06 14:15:19'),
(6, NULL, 'Array', 8992, '2023-03-07 13:01:47', '2023-03-07 13:06:47'),
(7, NULL, 'Array', 6335, '2023-03-07 13:02:36', '2023-03-07 13:07:36'),
(8, NULL, 'Array', 8066, '2023-03-07 13:03:53', '2023-03-07 13:08:53'),
(9, NULL, 'Array', 1314, '2023-03-07 13:07:24', '2023-03-07 13:12:24'),
(10, NULL, 'Array', 6351, '2023-03-07 13:11:48', '2023-03-07 13:16:48'),
(11, NULL, 'bhavyaharia100@gmail.com', 4506, '2023-03-07 13:13:08', '2023-03-07 13:18:08'),
(12, NULL, 'Array', 8124, '2023-03-07 13:19:35', '2023-03-07 13:24:35'),
(13, NULL, 'Array', 3334, '2023-03-07 13:21:12', '2023-03-07 13:26:12'),
(14, NULL, 'Array', 2095, '2023-03-07 13:22:49', '2023-03-07 13:27:49'),
(15, NULL, 'Array', 5972, '2023-03-07 13:25:35', '2023-03-07 13:30:35'),
(16, NULL, 'bhavyaharia100@gmail.com', 9440, '2023-03-07 13:27:33', '2023-03-07 13:32:33'),
(17, NULL, 'Array', 2622, '2023-03-07 13:30:48', '2023-03-07 13:35:48'),
(18, NULL, '', 4616, '2023-03-07 13:31:48', '2023-03-07 13:36:48'),
(19, NULL, 'b', 8137, '2023-03-07 13:33:27', '2023-03-07 13:38:27'),
(20, NULL, 'b', 3795, '2023-03-07 13:34:14', '2023-03-07 13:39:14'),
(21, NULL, 'Array', 8315, '2023-03-07 13:55:38', '2023-03-07 14:00:38'),
(22, NULL, 'Array', 8976, '2023-03-07 13:58:14', '2023-03-07 14:03:14'),
(23, NULL, 'bhavyaharia100@gmail.com', 4099, '2023-03-07 14:01:13', '2023-03-07 14:06:13'),
(24, NULL, 'Array', 5401, '2023-03-07 14:07:33', '2023-03-07 14:12:33'),
(25, NULL, 'Array', 6253, '2023-03-07 14:08:08', '2023-03-07 14:13:08'),
(26, NULL, 'Array', 7208, '2023-03-07 14:23:13', '2023-03-07 14:28:13'),
(27, NULL, '[object Object]', 5648, '2023-03-07 14:28:55', '2023-03-07 14:33:55'),
(28, NULL, 'logan@email.com,logan,logan,,,email.com,,email.com,email.', 1876, '2023-03-07 14:29:33', '2023-03-07 14:34:33'),
(29, NULL, 'logan@email.com,logan,logan,,,email.com,,email.com,email.', 3847, '2023-03-07 14:33:39', '2023-03-07 14:38:39'),
(30, NULL, 'logan@email.com,logan,logan,,,email.com,,email.com,email.', 6480, '2023-03-07 14:34:17', '2023-03-07 14:39:17'),
(31, NULL, 'logan@email.com,logan,logan,,,email.com,,email.com,email.', 4917, '2023-03-07 14:34:54', '2023-03-07 14:39:54'),
(32, NULL, 'logan@email.com,logan,logan,,,email.com,,email.com,email.', 7845, '2023-03-07 14:35:00', '2023-03-07 14:40:00'),
(33, NULL, 'logan@email.com,logan,logan,,,email.com,,email.com,email.', 3645, '2023-03-07 14:54:53', '2023-03-07 14:59:53'),
(34, NULL, 'logan@email.com,logan,logan,,,email.com,,email.com,email.', 2375, '2023-03-07 14:57:04', '2023-03-07 15:02:04'),
(35, NULL, 'bhavyaharia100@gmail.com,bhavyaharia100,bhavyaharia100,,,gmail.com,,gmail.com,gmail.', 8307, '2023-03-07 14:58:08', '2023-03-07 15:03:08'),
(36, NULL, '', 4497, '2023-03-07 15:01:38', '2023-03-07 15:06:38'),
(37, NULL, '', 8270, '2023-03-07 15:01:38', '2023-03-07 15:06:38'),
(38, NULL, '', 5392, '2023-03-07 15:01:56', '2023-03-07 15:06:56'),
(39, NULL, 'bhavyaharia100@gmail.com,bhavyaharia100,bhavyaharia100,,,gmail.com,,gmail.com,gmail.', 4380, '2023-03-07 15:01:56', '2023-03-07 15:06:56'),
(40, NULL, '', 8628, '2023-03-07 15:02:46', '2023-03-07 15:07:46'),
(41, NULL, '', 4392, '2023-03-07 15:02:46', '2023-03-07 15:07:46'),
(42, NULL, '', 5942, '2023-03-07 15:02:53', '2023-03-07 15:07:53'),
(43, NULL, '', 1434, '2023-03-07 15:02:53', '2023-03-07 15:07:53'),
(44, NULL, '', 6419, '2023-03-07 15:03:17', '2023-03-07 15:08:17'),
(45, NULL, 'bhavyaharia100@gmail.com,bhavyaharia100,bhavyaharia100,,,gmail.com,,gmail.com,gmail.', 1769, '2023-03-07 15:03:17', '2023-03-07 15:08:17'),
(46, NULL, '', 7560, '2023-03-07 15:03:37', '2023-03-07 15:08:37'),
(47, NULL, '', 1999, '2023-03-07 15:03:37', '2023-03-07 15:08:37'),
(48, NULL, '', 8183, '2023-03-07 15:03:48', '2023-03-07 15:08:48'),
(49, NULL, '', 4630, '2023-03-07 15:03:48', '2023-03-07 15:08:48'),
(50, NULL, '', 2225, '2023-03-07 15:04:11', '2023-03-07 15:09:11'),
(51, NULL, '', 5979, '2023-03-07 15:04:11', '2023-03-07 15:09:11'),
(52, NULL, '', 9435, '2023-03-07 15:04:43', '2023-03-07 15:09:43'),
(53, NULL, '', 4140, '2023-03-07 15:04:43', '2023-03-07 15:09:43'),
(54, NULL, '', 9212, '2023-03-07 15:05:00', '2023-03-07 15:10:00'),
(55, NULL, '', 5509, '2023-03-07 15:05:00', '2023-03-07 15:10:00'),
(56, NULL, '', 8717, '2023-03-07 15:05:09', '2023-03-07 15:10:09'),
(57, NULL, '', 6468, '2023-03-07 15:05:09', '2023-03-07 15:10:09'),
(58, NULL, '', 7055, '2023-03-07 15:05:28', '2023-03-07 15:10:28'),
(59, NULL, '', 2177, '2023-03-07 15:05:28', '2023-03-07 15:10:28'),
(60, NULL, '', 4269, '2023-03-07 15:05:45', '2023-03-07 15:10:45'),
(61, NULL, 'bhavyaharia100@gmail.com,bhavyaharia100,bhavyaharia100,,,gmail.com,,gmail.com,gmail.', 1867, '2023-03-07 15:05:45', '2023-03-07 15:10:45'),
(62, NULL, 'bhavyaharia100@gmail.com', 8170, '2023-03-07 15:17:56', '2023-03-07 15:22:56'),
(63, NULL, '', 8757, '2023-03-07 15:20:15', '2023-03-07 15:25:15'),
(64, NULL, '', 9780, '2023-03-07 15:20:15', '2023-03-07 15:25:15'),
(65, NULL, '', 4482, '2023-03-07 15:29:30', '2023-03-07 15:34:30'),
(66, NULL, '', 7417, '2023-03-07 15:29:30', '2023-03-07 15:34:30'),
(67, NULL, '', 5387, '2023-03-07 15:31:29', '2023-03-07 15:36:29'),
(68, NULL, '', 2177, '2023-03-07 15:31:29', '2023-03-07 15:36:29'),
(69, NULL, '', 5646, '2023-03-07 15:31:43', '2023-03-07 15:36:43'),
(70, NULL, 'logan@email.com,logan,logan,,,email.com,,email.com,email.', 4053, '2023-03-07 15:31:43', '2023-03-07 15:36:43'),
(71, NULL, '', 5075, '2023-03-07 15:31:57', '2023-03-07 15:36:57'),
(72, NULL, 'logan@email.com', 6123, '2023-03-07 15:31:57', '2023-03-07 15:36:57'),
(73, NULL, '', 5249, '2023-03-07 15:32:19', '2023-03-07 15:37:19'),
(74, NULL, '', 5584, '2023-03-07 15:32:19', '2023-03-07 15:37:19'),
(75, NULL, '', 5601, '2023-03-07 15:32:37', '2023-03-07 15:37:37'),
(76, NULL, 'bhavyaharia100@gmail.com', 7589, '2023-03-07 15:32:37', '2023-03-07 15:37:37'),
(77, NULL, 'bhavyaharia100@gmail.com', 2454, '2023-03-07 15:33:15', '2023-03-07 15:38:15'),
(78, NULL, 'bhavyaharia100@gmail.com', 2041, '2023-03-07 15:36:02', '2023-03-07 15:41:02'),
(79, NULL, 'bhavyaharia100@gmail.com', 9166, '2023-03-07 15:39:25', '2023-03-07 15:44:25'),
(80, NULL, 'bhavyaharia100@gmail.com', 5526, '2023-03-07 15:39:55', '2023-03-07 15:44:55'),
(81, NULL, 'bhavyaharia100@gmail.com', 6312, '2023-03-07 15:56:50', '2023-03-07 16:01:50'),
(82, NULL, 'bhavyaharia100@gmail.com', 1999, '2023-03-07 15:58:09', '2023-03-07 16:03:09'),
(83, NULL, 'bhavyaharia100@gmail.com', 7111, '2023-03-07 16:33:11', '2023-03-07 16:38:11'),
(84, NULL, 'bhavyaharia100@gmail.com', 8831, '2023-03-07 16:34:27', '2023-03-07 16:39:27'),
(85, NULL, 'bhavyaharia100@gmail.com', 2355, '2023-03-07 17:07:20', '2023-03-07 17:12:20'),
(86, NULL, 'bhavyaharia100@gmail.com', 3534, '2023-03-07 17:11:27', '2023-03-07 17:16:27'),
(87, NULL, 'bhavyaharia100@gmail.com', 5770, '2023-03-07 17:20:16', '2023-03-07 17:25:16'),
(88, NULL, 'bhavyaharia100@gmail.com', 4023, '2023-03-07 17:29:09', '2023-03-07 17:34:09'),
(89, NULL, 'bhavyaharia100@gmail.com', 7667, '2023-03-07 17:31:43', '2023-03-07 17:36:43'),
(90, NULL, 'bhavyaharia100@gmail.com', 4976, '2023-03-07 17:34:03', '2023-03-07 17:39:03'),
(91, NULL, 'bhavyaharia100@gmail.com', 3538, '2023-03-07 17:36:40', '2023-03-07 17:41:40'),
(92, NULL, 'bhavyaharia100@gmail.com', 8876, '2023-03-12 16:23:26', '2023-03-12 16:28:26'),
(93, NULL, 'bhavyaharia100@gmail.com', 2910, '2023-03-12 16:30:17', '2023-03-12 16:35:17'),
(94, NULL, 'bhavyaharia100@gmail.com', 5024, '2023-06-28 15:43:52', '2023-06-28 15:48:52'),
(95, NULL, 'bhavyaharia100@gmail.com', 8716, '2023-06-28 15:54:09', '2023-06-28 15:59:09'),
(96, NULL, 'bhavyaharia100@gmail.com', 8363, '2023-06-28 16:59:13', '2023-06-28 17:04:13'),
(97, NULL, 'bhavyaharia100@gmail.com', 9673, '2023-06-28 17:01:45', '2023-06-28 17:06:45'),
(98, NULL, 'bhavyaharia100@gmail.com', 2061, '2023-06-28 17:04:43', '2023-06-28 17:09:43'),
(99, NULL, 'bhavyaharia100@gmail.com', 6524, '2023-06-28 17:13:06', '2023-06-28 17:18:06');

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
  `output` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_otp_number`
--

INSERT INTO `student_otp_number` (`id`, `user_id`, `number`, `otp`, `generation`, `expiry`, `output`) VALUES
(1, NULL, 9619305482, 7795, '2023-02-20 13:00:26', '2023-02-20 13:05:26', NULL),
(2, NULL, 9619305482, 4184, '2023-02-20 15:31:16', '2023-02-20 15:36:16', NULL),
(3, NULL, 9619305482, 4178, '2023-02-20 15:36:59', '2023-02-20 15:41:59', NULL),
(4, NULL, 9619305482, 1045, '2023-02-20 19:24:43', '2023-02-20 19:29:43', NULL),
(5, NULL, 12, 2169, '2023-03-07 16:10:26', '2023-03-07 16:15:26', NULL),
(6, NULL, 12, 5399, '2023-03-07 16:12:39', '2023-03-07 16:17:39', NULL),
(7, NULL, 12, 4379, '2023-03-07 16:13:42', '2023-03-07 16:18:42', NULL),
(8, NULL, 919619305482, 9457, '2023-03-07 16:18:58', '2023-03-07 16:23:58', NULL),
(9, NULL, 9619305482, 9174, '2023-03-07 16:27:49', '2023-03-07 16:32:49', NULL),
(10, NULL, 9619305482, 2880, '2023-03-07 16:29:24', '2023-03-07 16:34:24', NULL),
(11, NULL, 9619305482, 8821, '2023-03-07 16:31:44', '2023-03-07 16:36:44', NULL),
(12, NULL, 9619305482, 3041, '2023-03-07 16:32:49', '2023-03-07 16:37:49', NULL),
(13, NULL, 9619305482, 3774, '2023-03-07 16:34:40', '2023-03-07 16:39:40', NULL),
(14, NULL, 9619305482, 2318, '2023-03-07 16:37:00', '2023-03-07 16:42:00', NULL),
(15, NULL, 9619305482, 8740, '2023-03-07 16:37:57', '2023-03-07 16:42:57', NULL),
(16, NULL, 9619305482, 8861, '2023-03-07 17:07:28', '2023-03-07 17:12:28', NULL),
(17, NULL, 9619305482, 4855, '2023-03-07 17:11:37', '2023-03-07 17:16:37', NULL),
(18, NULL, 9619305482, 5222, '2023-03-07 17:20:26', '2023-03-07 17:25:26', NULL),
(19, NULL, 9619305482, 9730, '2023-03-07 17:29:17', '2023-03-07 17:34:17', NULL),
(20, NULL, 9619305482, 5063, '2023-03-07 17:31:51', '2023-03-07 17:36:51', NULL),
(21, NULL, 9619305482, 7212, '2023-03-07 17:34:11', '2023-03-07 17:39:11', NULL),
(22, NULL, 9619305482, 4701, '2023-03-07 17:36:53', '2023-03-07 17:41:53', NULL),
(23, NULL, 9619305482, 1255, '2023-03-12 16:36:13', '2023-03-12 16:41:13', NULL),
(24, NULL, 9619305482, 5802, '2023-05-26 16:09:20', '2023-05-26 16:14:20', '{\"status\":\"Success\",\"code\":\"011\",\"description\":\"Message submitted successfully\",\"data\":{\"messageid\":\"ODcyOTYzNg==\",\"totnumber\":1,\"totalcredit\":1}}'),
(25, NULL, 9619305482, 4362, '2023-05-30 13:12:10', '2023-05-30 13:17:10', '{\"status\":\"Success\",\"code\":\"011\",\"description\":\"Message submitted successfully\",\"data\":{\"messageid\":\"ODc3OTY1MA==\",\"totnumber\":1,\"totalcredit\":1}}');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email_old` text NOT NULL,
  `email` text NOT NULL,
  `number` bigint(20) NOT NULL,
  `number_whatsapp` bigint(20) NOT NULL,
  `city` text NOT NULL,
  `role` text NOT NULL,
  `is_technical` tinyint(4) NOT NULL,
  `is_non_technical` tinyint(4) NOT NULL,
  `is_writer` tinyint(4) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `email_old`, `email`, `number`, `number_whatsapp`, `city`, `role`, `is_technical`, `is_non_technical`, `is_writer`, `is_active`, `password`) VALUES
(1, 'Admin', 'bluepenassign@gmail.com', 'admin@bluepen.com', 9619305482, 9619305482, 'Mumbai', 'Admin', 1, 1, 1, 1, '$2y$10$j13RHf5gbzFK0joaQqY8J.pocDRYkYUBifL6nQZJQIeRSIjax.Z76'),
(2, 'tech pm', 'techpm@bluepen.com', 'techpm@bluepen.com', 9876543120, 9876543120, 'Mumbai', 'pm', 1, 0, 0, 1, '$2y$10$j13RHf5gbzFK0joaQqY8J.pocDRYkYUBifL6nQZJQIeRSIjax.Z76'),
(3, 'non tech pm', 'nontechpm@bluepen.com', 'nontechpm@bluepen.com', 9874563210, 9874563210, 'Mumbai', 'pm', 0, 1, 0, 1, '$2y$10$j13RHf5gbzFK0joaQqY8J.pocDRYkYUBifL6nQZJQIeRSIjax.Z76'),
(4, 'tech pm 2', 'techpm@gmail.com', 'techpm@gmail.com', 9876543012, 9876543012, 'Mumbai', 'pm', 1, 0, 0, 1, 'skjdskjdfn'),
(5, 'non tech pm 2', 'nontechpm@gmail.com', 'nontechpm@gmail.com', 9876543210, 9876543210, 'Mumbai', 'pm', 0, 1, 0, 1, 'snfskjdnfkj');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files_freelancer`
--

DROP TABLE IF EXISTS `uploaded_files_freelancer`;
CREATE TABLE IF NOT EXISTS `uploaded_files_freelancer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_source` text NOT NULL,
  `file_name` text NOT NULL,
  `file_upload_date_time` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploaded_files_freelancer`
--

INSERT INTO `uploaded_files_freelancer` (`id`, `file_source`, `file_name`, `file_upload_date_time`) VALUES
(1, 'freelancer_past_work_files', '', '2023-03-24 12:13:57'),
(2, 'freelancer_past_work_files', 'Event Recommendation-20230321T074145Z-001.zip_$_', '2023-03-24 12:15:49'),
(3, 'freelancer_past_work_files', 'melanoma bhavya bhaiya report 2 updated.docx_$_Event Recommendation-20230321T074145Z-001.zip_$_', '2023-03-24 12:16:46'),
(4, 'freelancer_past_work_files', 'SUN AGROTECH website.docx_$_Event Recommendation-20230321T074145Z-001.zip_$_', '2023-03-24 12:18:31'),
(5, 'freelancer_past_work_files', '9872skindisease.sql_$_', '2023-03-24 12:33:26'),
(6, 'freelancer_past_work_files', '1381skindisease.sql_$_', '2023-03-24 12:36:07'),
(7, 'freelancer_past_work_files', '2508Event Recommendation-20230321T074145Z-001.zip_$_', '2023-03-24 12:36:21'),
(8, 'freelancer_past_work_files', '6642skindisease.sql_$_6642Event Recommendation-20230321T074145Z-001.zip_$_', '2023-03-24 12:37:08'),
(9, 'freelancer_past_work_files', '3676Event Recommendation-20230321T074145Z-001.zip_$_', '2023-03-24 12:42:12'),
(10, 'freelancer_past_work_files', '3676skindisease.sql_$_3676Event Recommendation-20230321T074145Z-001.zip_$_', '2023-03-24 12:42:34'),
(11, 'freelancer_past_work_files', '3676Assign (1).R_$_', '2023-03-24 12:44:06'),
(12, 'freelancer_past_work_files', '3870TypingTest.com - Prove Your Typing Skills!.pdf_$_', '2023-03-24 12:45:00'),
(13, 'freelancer_past_work_files', '3870freelancers_technical.sql_$_3870TypingTest.com - Prove Your Typing Skills!.pdf_$_', '2023-03-24 12:46:03'),
(14, 'freelancer_past_work_files', '5670Assign.R_$_', '2023-03-24 12:53:33'),
(15, 'freelancer_past_work_files', '3253Assign.R_$_', '2023-03-24 12:56:17'),
(16, 'freelancer_past_work_files', '8372meta_events2.sql_$_', '2023-03-24 19:17:08'),
(17, 'freelancer_past_work_files', '9241Parkinson-s-Disease-Detection-main.zip_$_9241BillPayReceiptTataTele.pdf_$_', '2023-03-26 18:57:18'),
(18, 'freelancer_past_work_files', '5856Parkinson-s-Disease-Detection-main.zip_$_5856BillPayReceiptTataTele.pdf_$_', '2023-03-26 18:57:23'),
(19, 'freelancer_past_work_files', '7462recording.conf_$_7462Parkinson-s-Disease-Detection-main.zip_$_7462BillPayReceiptTataTele.pdf_$_', '2023-03-26 18:58:05'),
(20, 'freelancer_past_work_files', '7118csvtest.py_$_7118recording.conf_$_7118Parkinson-s-Disease-Detection-main.zip_$_7118BillPayReceiptTataTele.pdf_$_', '2023-03-26 18:58:48'),
(21, 'freelancer_past_work_files', 'undefinedfinalscraping.py_$_undefineddata.py_$_undefinedcsvtest.py_$_', '2023-03-26 19:10:43'),
(22, 'freelancer_past_work_files', 'undefinedcsvtest.py_$_', '2023-03-26 19:12:26'),
(23, 'freelancer_past_work_files', '6726csvtest.py_$_', '2023-03-26 19:16:07'),
(24, 'freelancer_past_work_files', '6726finalscraping.py_$_6726csvtest.py_$_', '2023-03-26 19:16:22'),
(25, 'freelancer_past_work_files', '6726csvtest.py_$_', '2023-03-26 19:17:29'),
(26, 'freelancer_past_work_files', '6726finalscraping.py_$_6726csvtest.py_$_', '2023-03-26 19:18:47'),
(27, 'freelancer_resume', '6886ar_in_india.csv_$_', '2023-03-26 19:49:25'),
(28, 'freelancer_profile_photo', '3372data.py_$_', '2023-03-26 20:12:55'),
(29, 'freelancer_profile_photo', '7906data.py_$_', '2023-03-26 20:15:00'),
(30, 'freelancer_past_work_files', '4346big_data_in_mumbai.csv_$_', '2023-03-26 20:26:31'),
(31, 'freelancer_past_work_files', '4346teacheron1.csv_$_4346big_data_in_mumbai.csv_$_', '2023-03-26 20:27:22'),
(32, 'freelancer_past_work_files', '4346tutorsinindia.html_$_4346teacheron1.csv_$_4346big_data_in_mumbai.csv_$_', '2023-03-26 20:27:45'),
(33, 'freelancer_past_work_files', '4346finalscraping.py_$_4346tutorsinindia.html_$_4346teacheron1.csv_$_4346big_data_in_mumbai.csv_$_', '2023-03-26 20:27:55'),
(34, 'freelancer_past_work_files', '4346matlab_in_india.csv_$_4346finalscraping.py_$_4346tutorsinindia.html_$_4346teacheron1.csv_$_4346big_data_in_mumbai.csv_$_', '2023-03-26 20:28:02'),
(35, 'freelancer_resume', '9183getname.py_$_', '2023-03-26 20:30:06'),
(36, 'freelancer_profile_photo', '3881testdata.html_$_', '2023-03-26 20:30:46'),
(37, 'freelancer_past_work_files', '4346finalscraping.py_$_', '2023-03-26 20:41:21'),
(38, 'freelancer_resume', '9183data.py_$_', '2023-03-26 20:41:28'),
(39, 'freelancer_resume', '9183data.py_$_', '2023-03-26 20:46:07'),
(40, 'freelancer_profile_photo', '3881freelancerstest.csv_$_', '2023-03-26 20:49:54'),
(41, 'freelancer_profile_photo', '3881inventory_item_data.sii_$_', '2023-03-26 20:59:56'),
(42, 'writer_writing_sample', '1687logo.png_$_', '2023-03-29 15:55:05'),
(43, 'writer_writing_sample', '16871.png_$_1687logo.png_$_', '2023-03-29 15:55:36'),
(44, 'writer_writing_sample', '6101logo.png_$_610110.png_$_61014.png_$_61013.png_$_61012.png_$_', '2023-03-29 16:03:38'),
(45, 'writer_writing_sample', '', '2023-03-29 16:04:35'),
(46, 'writer_diagram_sample', '2414Renewal of Deposits.pdf_$_2414Parkinson-s-Disease-Detection-main.zip_$_2414Bluepen APIs.postman_collection.json_$_', '2023-03-29 16:07:31'),
(47, 'writer_diagram_sample', '2414Forms Website.pdf_$_2414Renewal of Deposits.pdf_$_2414Parkinson-s-Disease-Detection-main.zip_$_2414Bluepen APIs.postman_collection.json_$_', '2023-03-29 16:07:54'),
(48, 'writer_technical_drawing', '4165Capture3.PNG_$_4165Capture2.PNG_$_4165Capture.PNG_$_', '2023-03-29 16:08:13'),
(49, 'writer_technical_drawing', '4165Capture3.PNG_$_4165Capture2.PNG_$_4165Capture.PNG_$_', '2023-03-29 16:13:01'),
(50, 'writer_technical_drawing', '4165Capture3.PNG_$_4165Capture2.PNG_$_4165Capture.PNG_$_', '2023-03-29 16:14:17'),
(51, 'writer_art_and_craft', '29107.13.php.zip_$_29101aAMVT51-cYtfU2s8FwfD6AejihvQ-th9.htm_$_29101.html_$_', '2023-03-29 16:15:48'),
(52, 'writer_art_and_craft', '2910209-Model.png_$_29107.13.php.zip_$_29101aAMVT51-cYtfU2s8FwfD6AejihvQ-th9.htm_$_29101.html_$_', '2023-03-29 16:16:18'),
(53, 'writer_writing_sample', '5311speak.mp3_$_5311recognise_final_sound.py_$_53111.png_$_', '2023-03-29 16:49:16'),
(54, 'writer_writing_sample', '4245TRAINED_INDIAN_DATA_FINAL_MODEL.h5_$_4245speak.mp3_$_4245recognise_final_sound.py_$_42451.png_$_', '2023-03-29 17:19:22'),
(55, 'freelancer_profile_photo', '8323Untitled.png_$_', '2023-03-29 18:22:24'),
(56, 'writer_profile_photo', '8323Untitled.png_$_', '2023-03-29 18:29:41'),
(57, 'writer_profile_photo', '8323Capture.PNG_$_', '2023-03-29 18:52:53'),
(58, 'writer_profile_photo', '8323Untitled.png_$_', '2023-03-29 19:00:41'),
(59, 'writer_writing_sample', '5697data.py_$_5697csvtest.py_$_5697ar_in_india.csv_$_', '2023-03-29 19:06:42'),
(60, 'writer_diagram_sample', '1380getname.py_$_1380freelancerstest.csv_$_1380finalscraping.py_$_', '2023-03-29 19:07:21'),
(61, 'writer_technical_drawing', '7065teacheron1.csv_$_7065students.csv_$_7065matlab_in_india.csv_$_', '2023-03-29 19:07:56'),
(62, 'writer_art_and_craft', '3963tutorsinindia.html_$_3963testdata.html_$_', '2023-03-29 19:08:12'),
(63, 'writer_profile_photo', '4257selmon-bhoi.jpeg_$_', '2023-03-29 19:12:02'),
(64, 'writer_writing_sample', '5697big_data_in_mumbai.csv_$_5697big_data_in_india.csv_$_5697ar_in_india.csv_$_', '2023-03-29 19:19:44'),
(65, 'writer_diagram_sample', '1380data.py_$_1380data.csv_$_1380csvtest.py_$_', '2023-03-29 19:24:05'),
(66, 'writer_writing_sample', '8674big_data_in_mumbai.csv_$_8674big_data_in_india.csv_$_8674ar_in_india.csv_$_', '2023-03-29 19:27:12'),
(67, 'writer_diagram_sample', '8329data.py_$_8329data.csv_$_8329csvtest.py_$_', '2023-03-29 19:27:36'),
(68, 'writer_technical_drawing', '1934getname.py_$_1934freelancerstest.csv_$_1934finalscraping.py_$_', '2023-03-29 19:27:48'),
(69, 'writer_art_and_craft', '5132teacheron1.csv_$_5132students.csv_$_5132matlab_in_india.csv_$_', '2023-03-29 19:28:23'),
(70, 'writer_profile_photo', '2051selmon-bhoi.jpeg_$_', '2023-03-29 19:30:00'),
(71, 'freelancer_past_work_files', '9594bhavyas file.txt_$_', '2023-06-01 15:52:25'),
(72, 'freelancer_past_work_files', '9594bhavyas file.txt_$_', '2023-06-01 15:52:25'),
(73, 'freelancer_past_work_files', '9594Paper - melanoma.docx_$_9594bhavyas file.txt_$_', '2023-06-01 15:55:08'),
(74, 'freelancer_past_work_files', '8687BillPayReceiptTataTele April.pdf_$_', '2023-06-01 15:57:56'),
(75, 'freelancer_past_work_files', '8687Renewal of Deposits.pdf_$_8687BillPayReceiptTataTele April.pdf_$_', '2023-06-01 15:58:47'),
(76, 'freelancer_past_work_files', '8687Renewal of Deposits.pdf_$_8687BillPayReceiptTataTele April.pdf_$_', '2023-06-01 16:00:27'),
(77, 'freelancer_past_work_files', '8687Paper - melanoma.docx_$_8687Renewal of Deposits.pdf_$_8687BillPayReceiptTataTele April.pdf_$_', '2023-06-01 16:02:33'),
(78, 'freelancer_past_work_files', '8687bhavyas file.txt_$_8687Paper - melanoma.docx_$_8687Renewal of Deposits.pdf_$_8687BillPayReceiptTataTele April.pdf_$_', '2023-06-01 16:03:00'),
(79, 'freelancer_resume', '2071resume-anonymized.pdf_$_', '2023-06-14 15:17:27'),
(80, 'freelancer_past_work_files', '9268WhatsApp Video 2023-06-14 at 13.43.03.mp4_$_', '2023-06-14 15:25:03'),
(81, 'freelancer_resume', '3346resume-anonymized.pdf_$_', '2023-06-14 15:25:55'),
(82, 'freelancer_past_work_files', '6272515_4942SAT_NewYork.ipynb_$_', '2023-06-14 16:45:30'),
(83, 'freelancer_resume', '2382514_8543Resume_ Rithik Raj Vaishya.pdf_$_', '2023-06-14 16:46:10'),
(84, 'freelancer_past_work_files', '5097515_4942SAT_NewYork.ipynb_$_', '2023-06-14 16:56:30'),
(85, 'freelancer_resume', '5016514_8543Resume_ Rithik Raj Vaishya.pdf_$_', '2023-06-14 16:59:27'),
(86, 'freelancer_past_work_files', '3347515_4942Project Synopsis-1.pdf_$_3347515_4942SAT_NewYork.ipynb_$_', '2023-06-14 17:47:09'),
(87, 'freelancer_resume', '8827resume-anonymized.pdf_$_', '2023-06-14 17:47:44'),
(88, 'freelancer_past_work_files', '7957515_4942Project Synopsis-1.pdf_$_', '2023-06-14 18:10:39'),
(89, 'freelancer_resume', '7026resume-anonymized.pdf_$_', '2023-06-14 18:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files_user`
--

DROP TABLE IF EXISTS `uploaded_files_user`;
CREATE TABLE IF NOT EXISTS `uploaded_files_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_source` text NOT NULL,
  `file_name` text NOT NULL,
  `file_upload_date_time` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploaded_files_user`
--

INSERT INTO `uploaded_files_user` (`id`, `file_source`, `file_name`, `file_upload_date_time`) VALUES
(1, 'freelancing_assignment', '', '2023-04-05 13:39:31'),
(2, 'freelancing_assignment', '', '2023-04-05 13:41:05'),
(3, 'freelancing_assignment', '6779app.py_$_', '2023-04-05 13:43:14'),
(4, 'freelancing_assignment', '6779event.sql_$_6779app.py_$_', '2023-04-05 13:44:57'),
(5, 'freelancing_assignment', '7759meta-events2.csv_$_', '2023-04-05 17:49:48'),
(6, 'freelancing_assignment', '7759models.py_$_7759meta-events2.csv_$_', '2023-04-05 17:49:55'),
(7, 'freelancing_assignment', '7759requirements.txt_$_7759models.py_$_7759meta-events2.csv_$_', '2023-04-05 17:50:02'),
(8, 'freelancing_assignment', '1597app.py_$_', '2023-04-05 18:51:43'),
(9, 'freelancing_assignment', '1597requirements.txt_$_1597app.py_$_', '2023-04-05 18:51:48'),
(10, 'writing_assignment', '1573variable-descriptions.csv_$_', '2023-04-05 19:46:01'),
(11, 'writing_assignment', '1573carriers.csv_$_1573variable-descriptions.csv_$_', '2023-04-05 19:46:31'),
(12, 'writing_assignment', '1573variable-descriptions.csv_$_', '2023-04-05 20:00:21'),
(13, 'writing_assignment', '1573carriers.csv_$_1573variable-descriptions.csv_$_', '2023-04-05 20:00:30'),
(14, 'ed_assignment', '7934app.py_$_', '2023-04-05 20:07:29'),
(15, 'ed_assignment', '7934DTModel2.pkl_$_7934app.py_$_', '2023-04-05 20:07:33'),
(16, 'ed_assignment', '7934LRModel.pkl_$_7934DTModel2.pkl_$_7934app.py_$_', '2023-04-05 20:07:37'),
(17, 'ed_assignment', '7934SVRModel.pkl_$_', '2023-04-06 13:31:10'),
(18, 'ed_assignment', '7934Notebook.ipynb_$_7934SVRModel.pkl_$_', '2023-04-06 13:31:25'),
(19, 'typing_assignment', '4874password.txt_$_', '2023-04-06 13:48:35'),
(20, 'typing_assignment', '4874igetintopc.com.jpg_$_4874password.txt_$_', '2023-04-06 13:48:54'),
(21, 'typing_assignment', '7151igetintopc.com.jpg_$_', '2023-04-06 13:54:51'),
(22, 'typing_assignment', '7151Download Free Software.url_$_7151igetintopc.com.jpg_$_', '2023-04-06 13:55:03'),
(23, 'art_and_craft_assignment', '4157password.txt_$_', '2023-04-06 14:10:11'),
(24, 'art_and_craft_assignment', '4157fitgirl-bins.md5_$_4157password.txt_$_', '2023-04-06 14:10:47'),
(25, 'typing_assignment', '5851password.txt_$_', '2023-04-06 14:18:08'),
(26, 'typing_assignment', '5851Request Your Applications here.url_$_5851password.txt_$_', '2023-04-06 14:18:36'),
(27, 'typing_assignment', '5851Hcheema.cpp_$_', '2023-04-06 15:26:39'),
(28, 'typing_assignment', '5851Msaini.cpp_$_5851Hcheema.cpp_$_', '2023-04-06 15:26:52'),
(29, 'typing_assignment', '5851main_$_5851Msaini.cpp_$_5851Hcheema.cpp_$_', '2023-04-06 15:26:58'),
(30, 'art_and_craft_assignment', '7550run.py_$_', '2023-04-06 15:33:27'),
(31, 'art_and_craft_assignment', '7550requirements.txt_$_7550run.py_$_', '2023-04-06 15:33:44'),
(32, 'freelancing_assignment', '7696BillPayReceiptTataTele.pdf_$_7696BillPayReceiptTataTele April.pdf_$_7696bhavyas file.txt_$_', '2023-06-01 16:19:36');

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
  `country_name` text NOT NULL,
  `country_code` int(11) NOT NULL,
  `number` bigint(20) NOT NULL,
  `number_verified` tinyint(1) NOT NULL DEFAULT '0',
  `address` text,
  `is_accepted` tinyint(1) NOT NULL,
  `signin_method` text NOT NULL,
  `password` text NOT NULL,
  `wallet` int(11) NOT NULL,
  `date_of_birth` text,
  `created` text,
  `agreed` text,
  `utm_data` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `college`, `email`, `email_verified`, `country_name`, `country_code`, `number`, `number_verified`, `address`, `is_accepted`, `signin_method`, `password`, `wallet`, `date_of_birth`, `created`, `agreed`, `utm_data`) VALUES
(4, 'admin', 'admin', '', 'admin@bluepen.com', 0, '', 0, 9619305482, 0, 'blue pen', 1, 'manual', '$2y$10$j13RHf5gbzFK0joaQqY8J.pocDRYkYUBifL6nQZJQIeRSIjax.Z76', 0, '', '', '', 'null'),
(13, 'Handwritten', 'Assignments', 'bluepen', 'assignments@bluepen.com', 0, '', 0, 9619305482, 0, 'blue pen', 1, 'manual', '$2y$10$Geu0ry1Xard5kL0yI6JPk.33M5L28tm.E8Z7CleeROg3yJODCI8Ye', 0, '', '', '', 'null'),
(18, 'Bhavya', 'Haria', 'test', 'abc@gmail.com', 0, '', 0, 9876543210, 0, 'bambai', 1, 'manual', '$2y$10$OKPUrgdFWyo/VWObEzHWROxcKnJlhjFmW4sEn7cu7Hz6kcIS2g8pG', 0, '', '', '1', 'null'),
(21, 'Yaba', 'Daba', 'suckec', 'bluepenassssign@gmail.com', 0, '', 0, 9619305482, 0, 'gokuldham', 1, 'manual', '$2y$10$OKPUrgdFWyo/VWObEzHWROxcKnJlhjFmW4sEn7cu7Hz6kcIS2g8pG', 0, '', '', '1', 'null'),
(24, 'Bhavya', 'Haria', '', 'bhavyaharia100@gmail.com', 0, '', 0, 9619305482, 0, 'gokuldham', 1, 'manual', '$2y$10$r3h61NRo//eny3IIKyO/4.aYeidL2L9n8mFBaZISnVFmzmHYZdvs.', 6240, '17-04-1998', '', '1', 'null'),
(27, 'Brain', 'Heaters', 'MU', 'brainheaters@bluepen.com', 0, '', 0, 9619305482, 0, 'Mumbai', 1, 'manual', '$2y$10$j13RHf5gbzFK0joaQqY8J.pocDRYkYUBifL6nQZJQIeRSIjax.Z76', 0, '', '', '1', 'null'),
(40, 'bhavya', 'haria', '', 'bhavyaharia1000@gmail.com', 1, 'India', 91, 9619305482, 0, 'gokuldham', 1, 'manual', '$2y$10$madB7gIiv21TfQBP62FUo.UsHaMZwcP5cNtR9HFN2dtw7OPv9IuwG', 40, '', '2022-12-23 13:25:00', '1', 'null'),
(41, 'Bluepen', 'Projects', NULL, 'bluepenprojects@gmail.com', 1, 'India', 91, 9619305452, 0, '', 1, 'google', '', 100, '11-06-2023', '2023-06-11 16:48:28', '1', 'null'),
(42, 'bhavya', 'haria', NULL, 'bhavyaharia123@gmail.com', 1, 'India', 91, 9619305422, 1, '', 1, 'manual', '$2y$10$tbcCHbrBq3tTA7lsXaha5uIApp62EScEmLbpBUju9M0nzfwlKaqHq', 100, '28-06-2023', '2023-06-28 19:56:37', '1', 'null'),
(43, 'bhavya', 'haria', NULL, 'bhavyaharia159@gmail.com', 0, 'India', 91, 9849885958, 0, '', 1, 'manual', '$2y$10$7SneI.y7/qJ1mMEFpOkvO.q1u1vgf0.ifKsS7509sPmvNHttdC2Qe', 100, '29-06-2023', '2023-06-29 17:24:58', '1', '{\"utm_id\": \"12345\", \"utm_term\": \"keyword123\", \"page_name\": \"signup_page\", \"utm_medium\": \"email\", \"utm_source\": \"newsletter\", \"utm_content\": \"content123\", \"utm_campaign\": \"summer_promo\"}'),
(44, 'bhavya', 'haria', NULL, 'bhavyaharia91@gmail.com', 0, 'India', 91, 6516516516, 0, '', 1, 'manual', '$2y$10$tlVmAgHR71DjMXL0zc33a.qXUh.mMbVHV79hO/RTQsbU/UdfE0/3K', 100, '29-06-2023', '2023-06-29 17:26:23', '1', '{\"utm_id\": null, \"utm_term\": null, \"page_name\": null, \"utm_medium\": null, \"utm_source\": null, \"utm_content\": null, \"utm_campaign\": null}'),
(47, 'Bhavya', 'Haria', NULL, 'bhavya.haria@sakec.ac.in', 1, 'India', 91, 2872782782, 0, '', 1, 'google', '', 100, '29-06-2023', '2023-06-29 17:50:22', '1', '{\"utm_id\": \"12345\", \"utm_term\": \"keyword123\", \"page_name\": \"signup_page\", \"utm_medium\": \"email\", \"utm_source\": \"newsletter\", \"utm_content\": \"content123\", \"utm_campaign\": \"summer_promo\"}'),
(48, 'Blue', 'Pen', NULL, 'bluepenassign@gmail.com', 1, 'India', 91, 2727272727, 0, '', 1, 'google', '', 100, '29-06-2023', '2023-06-29 17:51:15', '1', '{\"utm_id\": null, \"utm_term\": null, \"page_name\": null, \"utm_medium\": null, \"utm_source\": null, \"utm_content\": null, \"utm_campaign\": null}');

-- --------------------------------------------------------

--
-- Table structure for table `user_bought_writer`
--

DROP TABLE IF EXISTS `user_bought_writer`;
CREATE TABLE IF NOT EXISTS `user_bought_writer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `bought_on` datetime NOT NULL,
  `expires_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_bought_writer`
--

INSERT INTO `user_bought_writer` (`id`, `user_id`, `writer_id`, `bought_on`, `expires_on`) VALUES
(1, 24, 131, '2023-04-09 12:52:47', '2023-04-23 12:52:47'),
(2, 24, 131, '2023-04-09 17:04:31', '2023-04-16 17:04:31'),
(3, 24, 131, '2023-04-09 17:04:47', '2023-04-16 17:04:47'),
(4, 24, 131, '2023-04-09 18:45:39', '2023-04-16 18:45:39'),
(5, 24, 131, '2023-04-09 19:13:26', '2023-04-16 19:13:26'),
(6, 24, 130, '2023-04-09 19:22:58', '2023-04-16 19:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_update`
--

DROP TABLE IF EXISTS `user_update`;
CREATE TABLE IF NOT EXISTS `user_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `field` text NOT NULL,
  `value` text NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_update`
--

INSERT INTO `user_update` (`id`, `user_id`, `field`, `value`, `updated_on`) VALUES
(1, 24, 'first_name', 'yabadaba', '2023-05-30 15:35:09'),
(2, 24, 'first_name', 'Bhavya', '2023-05-30 15:35:39'),
(3, 24, 'first_name', 'Bhavya', '2023-05-30 15:39:53'),
(4, 24, 'first_name', 'yabadaba', '2023-05-30 15:44:19'),
(5, 24, 'first_name', 'yabadaba', '2023-05-30 15:44:34'),
(6, 24, 'first_name', 'yabadaba', '2023-05-30 15:44:39'),
(7, 24, 'first_name', 'yabadaba', '2023-05-30 15:45:07'),
(8, 24, 'first_name', 'hello', '2023-05-30 15:45:21'),
(9, 24, 'first_name', 'hello', '2023-05-30 15:45:37'),
(10, 24, 'lastname', 'Haria', '2023-05-30 15:48:49'),
(11, 24, 'lastname', 'Haria', '2023-05-30 15:49:34'),
(12, 24, 'lastname', 'Haria', '2023-05-30 15:49:59'),
(13, 24, 'lastname', 'Bhavya', '2023-05-30 15:50:13'),
(14, 24, 'address', 'gokuldham', '2023-05-30 16:12:24'),
(15, 24, 'address', 'Bhavya', '2023-05-30 16:12:56'),
(16, 24, 'date_of_birth', '1998-04-17', '2023-05-30 16:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet_transactions`
--

DROP TABLE IF EXISTS `user_wallet_transactions`;
CREATE TABLE IF NOT EXISTS `user_wallet_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `coins` int(11) NOT NULL,
  `date_time` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_wallet_transactions`
--

INSERT INTO `user_wallet_transactions` (`id`, `user_id`, `details`, `coins`, `date_time`) VALUES
(1, 8, 'Bought', 50, '2023-03-07 20:38:17'),
(2, 8, 'Bought', 80, '2023-03-07 20:58:26'),
(3, 6, 'Bought', 150, '2023-03-07 20:58:52'),
(4, 8, 'Bought', 100, '2023-03-07 20:59:01'),
(5, 24, 'Bought', 100, '2023-04-02 13:15:25'),
(6, 24, 'Bought', 100, '2023-04-06 16:41:07'),
(7, 24, 'Bought', 750, '2023-04-06 16:41:27'),
(8, 24, 'Bought', 1000, '2023-04-06 18:01:55'),
(9, 24, 'Bought', 100, '2023-04-06 18:12:46'),
(10, 24, 'Bought', 100, '2023-04-06 18:17:43'),
(11, 24, 'Bought', 250, '2023-04-06 18:17:51'),
(12, 24, 'Bought', 250, '2023-04-06 18:18:00'),
(13, 24, 'Bought', 750, '2023-04-06 18:18:09'),
(14, 24, 'Bought', 50, '2023-04-09 17:04:31'),
(15, 24, 'Bought', 40, '2023-04-09 17:04:47'),
(16, 24, 'Bought', 40, '2023-04-09 18:45:39'),
(17, 24, 'Bought', 40, '2023-04-09 19:13:26'),
(18, 24, 'Bought', 40, '2023-04-09 19:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `writer_bought_user`
--

DROP TABLE IF EXISTS `writer_bought_user`;
CREATE TABLE IF NOT EXISTS `writer_bought_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `assignment_type` text NOT NULL,
  `bought_on` datetime NOT NULL,
  `expires_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
