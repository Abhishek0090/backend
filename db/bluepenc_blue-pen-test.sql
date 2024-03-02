-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2023 at 11:17 PM
-- Server version: 10.5.18-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `stream` tinyint(1) NOT NULL,
  `course` text NOT NULL,
  `assignment type` text NOT NULL,
  `assignment_level` text NOT NULL,
  `subject_tags` text NOT NULL,
  `deadline` date NOT NULL,
  `time` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `budget` text NOT NULL,
  `filename` text NOT NULL,
  `project_manager` text DEFAULT NULL,
  `freelancer` text DEFAULT NULL,
  `posted` tinyint(1) NOT NULL,
  `under_process` tinyint(1) NOT NULL,
  `assigned_to_pm` tinyint(1) NOT NULL,
  `assigned_to_freelancer` tinyint(1) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `review_recieved` tinyint(1) NOT NULL,
  `lost` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `user_id`, `title`, `description`, `stream`, `course`, `assignment type`, `assignment_level`, `subject_tags`, `deadline`, `time`, `date_of_submission`, `budget`, `filename`, `project_manager`, `freelancer`, `posted`, `under_process`, `assigned_to_pm`, `assigned_to_freelancer`, `confirmed`, `review_recieved`, `lost`) VALUES
(1, 34, 'machine learning', 'i want a machine learning project', 0, 'Engineering', '[\"Literature Review\",\"Programming/Coding Assignment\"]', 'Bachelors', '[\"Machine Learning,Data Structures and Algorithms in Python,Machine Learning Using Python,Data science and machine learning\"]', '2022-01-09', '17:00', '28/12/2021 04:12:54', '2000', 'Muradâ€™s resume.pdf_$_', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(2, 34, 'machine learning', 'i want a machine learning project', 0, 'Engineering', '[\"Literature Review\",\"Programming/Coding Assignment\"]', 'Bachelors', '[\"Machine Learning Using Python,Machine Learning\"]', '2022-01-09', '17:00', '28/12/2021 04:12:15', '2000', 'Muradâ€™s resume.pdf_$_', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(3, 34, 'machine learning', 'i want a machine learning project', 0, 'Engineering', '[\"Literature Review\",\"Programming/Coding Assignment\"]', 'Bachelors', '[\"Machine Learning Using Python,Machine Learning\"]', '2022-01-09', '17:00', '28/12/2021 04:12:20', '2000', 'Muradâ€™s resume.pdf_$_', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(4, 34, 'machine learning', 'i want a machine learning project', 0, 'Engineering', '[\"Literature Review\",\"Programming/Coding Assignment\"]', 'Bachelors', '[\"Machine Learning Using Python,Machine Learning\"]', '2022-01-09', '17:00', '28/12/2021 04:12:54', '2000', 'Muradâ€™s resume.pdf_$_', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(5, 37, 'euphoria analysis', 'I want to analyze the white pocket event euphoria', 1, 'Engineering', '[\"Literature Review\",\"Programming/Coding Assignment\"]', 'Bachelors', '[\"Machine Learning Using Python,Machine Learning,Data science and machine learning,Advanced Python,Data Structures and Algorithms in Python,Data Analysis with Python,Backend web development,Full Stack Web Development,Web Application development\"]', '2022-01-01', '18:45', '29/12/2021 05:12:10', '500', 'euphoria.csv_$_', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(6, 39, 'Cartoon Case Study', 'Study the image and answer the questions', 1, 'B.com', '[\"Report Writing\",\"Literature Review\",\"PPT Making\",\"Other\"]', 'Diploma', '[\"pokemon,Cartoon and illustration,Cartoon creation,Anime\",\"Character Animation\"]', '2022-09-09', '13:30', '05/09/2022 01:09:56', '99', 'Soft Purple Cartoon We Are Hiring Your Story.png_$_', NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(7, 49, 'test non tech', 'non technical mail test', 1, 'pgdm', '[\"Essay Writing\",\"Report Writing\",\"Literature Review\",\"Blackbook\",\"Research Paper\",\"Primary / Secondary Data Analysis\",\"Review Article\",\"Thesis Writing\",\"Dissertation Writing\",\"PPT Making\",\"Statement of Purpose\"]', 'Bachelors', '[\"Account,Accounts\",\"Management & Cost accounting\",\"Management\",\"Management Assignment Guidance\"]', '2022-09-16', '02:30', '07/09/2022 03:09:16', '1999', 'Campus Ambassador Posting (1).pdf_$_Storytelling App.pdf_$_', NULL, NULL, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `user_id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `assign_name` text NOT NULL,
  `city` text NOT NULL,
  `ink_color` varchar(5) NOT NULL,
  `submission_datetime` text NOT NULL,
  `delivery_date` date NOT NULL,
  `time` text NOT NULL,
  `copy` varchar(128) NOT NULL,
  `sheets` varchar(128) NOT NULL,
  `sides` int(11) NOT NULL,
  `diagrams` int(11) NOT NULL,
  `content` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `instructions` varchar(4096) NOT NULL,
  `type` text NOT NULL,
  `amount` int(11) NOT NULL,
  `soa_assigned` tinyint(1) DEFAULT 0,
  `soa_written` tinyint(1) DEFAULT 0,
  `soa_paid` tinyint(1) DEFAULT 0,
  `soa_completed` tinyint(1) DEFAULT 0,
  `writingmanager` text DEFAULT NULL,
  `writer` text DEFAULT NULL,
  `posted` tinyint(1) NOT NULL,
  `under_process` tinyint(1) NOT NULL,
  `assigned_to_pm` tinyint(1) NOT NULL,
  `assigned_to_freelancer` tinyint(1) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `review_recieved` tinyint(1) NOT NULL,
  `lost` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`user_id`, `assign_id`, `assign_name`, `city`, `ink_color`, `submission_datetime`, `delivery_date`, `time`, `copy`, `sheets`, `sides`, `diagrams`, `content`, `is_active`, `instructions`, `type`, `amount`, `soa_assigned`, `soa_written`, `soa_paid`, `soa_completed`, `writingmanager`, `writer`, `posted`, `under_process`, `assigned_to_pm`, `assigned_to_freelancer`, `confirmed`, `review_recieved`, `lost`) VALUES
(11, 38, 'jayshreesavla13@gmail.com11.pdf', '0', 'Blue', '2020-05-31 00:31:58', '2020-06-03', '', '', '', 0, 0, '', 1, '', '0', 18, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(15, 41, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '0', 'Blue', '2020-06-01 09:10:50', '2020-06-12', '', '', '', 0, 0, '', 1, '', '0', 894, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(2, 2, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Black', '2020-04-24 07:36:15', '2020-04-27', '', '', '', 0, 0, '', 1, '', '0', 0, 1, 1, 1, 1, '', '', 0, 0, 0, 0, 0, 0, 0),
(2, 3, 'bhavyaharia100@gmail.comBE Fees.pdf', '0', 'Blue', '2020-04-24 07:36:51', '2020-04-27', '', '', '', 0, 0, '', 1, '', '0', 0, 1, 1, 1, 1, '', '', 0, 0, 0, 0, 0, 0, 0),
(4, 4, 'admin@bluepen.comSpeech.pdf', '0', 'Blue', '2020-04-25 07:05:19', '2020-04-29', '', '', '', 0, 0, '', 1, '', '0', 0, 1, 1, 1, 1, '', '', 0, 0, 0, 0, 0, 0, 0),
(4, 5, 'admin@bluepen.comBE Fees.pdf', '0', 'Black', '2020-04-25 07:11:49', '2020-04-29', '', '', '', 0, 0, '', 1, '', '0', 0, 1, 1, 1, 1, '', '', 0, 0, 0, 0, 0, 0, 0),
(4, 6, 'admin@bluepen.comSpeech.pdf', '0', 'Blue', '2020-04-25 07:17:48', '2020-04-29', '', '', '', 0, 0, '', 1, '', '0', 0, 1, 1, 1, 1, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 31, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '0', 'Blue', '2020-05-21 08:06:38', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 894, 1, 1, 1, 1, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 29, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 07:37:56', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 28, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 07:33:18', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 12, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 06:14:38', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 1, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 13, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 06:15:25', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 14, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-05-21 08:07:49', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 1, 1, 1, 1, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 15, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 06:16:09', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 30, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 07:39:22', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 17, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '0', 'Blue', '2020-04-28 06:18:50', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 894, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 18, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '0', 'Blue', '2020-04-28 06:18:56', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 894, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 19, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '0', 'Blue', '2020-04-28 06:19:04', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 894, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 20, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '0', 'Blue', '2020-04-28 06:19:31', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 894, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 21, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 06:25:57', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 22, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 06:30:41', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 23, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 06:33:43', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 24, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 06:39:05', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 25, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 06:41:26', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 26, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 06:43:02', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 27, 'bhavyaharia100@gmail.comSpeech.pdf', '0', 'Blue', '2020-04-28 06:43:43', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 32, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '0', 'Black', '2020-04-28 07:42:02', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 894, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(6, 33, 'bhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '0', 'Blue', '2020-04-28 07:42:30', '2020-05-05', '', '', '', 0, 0, '', 1, '', '0', 894, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(7, 34, 'kaushik@test123.comExternal_ Chrome, NSS, and OpenSSL.pdf', '0', 'Black', '2020-09-04 12:40:18', '2020-06-01', '', '', '', 0, 0, '', 1, '', '0', 66, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(7, 35, 'jayvora1499@gmail.combhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', '0', 'Blue', '2020-09-03 15:56:25', '2020-09-07', '', '', '', 0, 0, '', 1, '', '0', 894, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(17, 42, 'chachachaudhary@gmail.com1044Biosash Order Form-SEP-20.pdf', '0', 'Blue', '2020-10-10 03:32:19', '2020-10-14', '', '', '', 0, 0, '', 1, '', '0', 18, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(16, 43, 'bhavyaharia100@gmail.comBE-CBCS.pdf', '0', 'Blue', '2020-10-17 05:41:07', '2020-10-22', '', '', '', 0, 0, '', 1, '', '0', 540, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(21, 44, 'Working capital management final project.docx_$_', '0', 'Black', '2021-01-14 10:23:11', '2021-04-01', '', '', '', 0, 0, '', 1, '', '0', 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(16, 45, 'Hostinger Receipt.pdf_$_ComputerOrganisation.pdf_$_Best Paper Certificate.png_$_', '0', 'Blue', '2021-02-21 23:14:00', '2021-02-25', '', 'both', 'any', 0, 0, '', 1, '', '0', 72, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(23, 46, 'Scan 01-Feb-2021.pdf_$_', '0', 'Black', '2021-02-22 03:09:34', '2021-02-24', '', 'soft', 'any', 0, 0, '', 1, '', '0', 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(16, 47, 'ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_', '0', 'Blue', '2021-02-22 22:58:15', '2021-02-28', '', 'hard', 'assignment', 0, 0, '', 1, '', '0', 108, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(24, 48, 'Attendance_Undertaking_Form_wygoep4Xoe.pdf_$_', '0', 'Blue', '2021-02-24 06:44:03', '2021-02-25', '', 'both', 'any', 0, 0, '', 1, '', '0', 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(24, 49, 'IMG-20210224-WA0005.jpg_$_IMG-20210224-WA0008.jpg_$_IMG-20210224-WA0009.jpg_$_Screenshot_2021-02-24-18-40-13-224_com.android.chrome.jpg_$_', '0', 'Blue', '2021-02-24 06:52:21', '2021-02-27', '', 'hard', 'assignment', 0, 0, '', 1, '', '0', 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(16, 50, 'ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_', '0', 'Blue', '2021-02-24 20:20:38', '2021-02-28', '', 'hard', 'assignment', 0, 0, '', 1, '', '0', 108, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(16, 51, 'Hostinger Receipt.pdf_$_ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_', '0', 'Blue', '2021-02-24 20:22:08', '2021-02-28', '', 'hard', 'long', 0, 0, '', 1, '', '0', 114, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(16, 52, 'dlda assignment.docx_$_', '0', 'Blue', '2021-03-01 20:28:41', '2021-03-05', '', 'soft', 'assignment', 0, 0, '', 1, '', '0', 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(16, 53, 'IMG-20210302-WA0000.jpg_$_', '0', 'Blue', '2021-03-01 20:30:06', '2021-03-11', '', 'both', 'any', 0, 0, '', 1, '', '0', 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(16, 54, 'Screenshot_2021-03-02-08-30-53-756_com.linkedin.android.png_$_', '0', 'Blue', '2021-03-01 20:30:35', '2021-03-14', '', 'soft', 'assignment', 0, 0, '', 1, '', '0', 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(16, 55, 'dlda assignment.docx_$_Screenshot_2021-03-02-08-30-53-756_com.linkedin.android.png_$_IMG-20210302-WA0000.jpg_$_38_Bhavya Haria.pdf_$_', '0', 'Blue', '2021-03-01 20:32:48', '2021-03-11', '', 'soft', 'assignment', 0, 0, '', 1, '', '0', 6, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(16, 56, '15ME04 HT Writeup 5.pdf_$_', '0', 'Blue', '2021-03-13 06:33:26', '2021-03-14', '', 'both', 'long', 0, 0, '', 1, '', '0', 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(26, 57, 'IMG_20210412_142620.jpg_$_Screenshot_2021-04-12-17-18-14-55.jpg_$_IMG20210412172111.jpg_$_Screenshot_2021-04-12-17-51-28-93.jpg_$_', '0', 'Blue', '2021-04-12 06:50:57', '2021-04-13', '', 'both', 'any', 0, 0, '', 1, '', '0', 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0),
(49, 58, 'Storytelling App.pdf_$_', '0', 'Black', '2022-09-07 03:35:08', '2022-09-22', '', 'Hard Copy', 'Assignment Sheets', 0, 0, '', 1, 'a   aa sa aesesewrereryryryw4ww4w4ee5e5e5e5e5tt', '0', 0, 0, 0, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0),
(50, 59, '', '0', 'Black', '2022-12-22 07:12:56', '2022-12-31', '12:00', 'Both', 'Long Book Sheets', 0, 0, '', 1, 'none', '0', 0, 0, 0, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0),
(51, 60, 'IMG-20221222-WA0030.jpg_$_', '0', 'Blue', '2022-12-22 23:12:25', '2022-12-31', '13:00', 'Soft Copy', 'Long Book Sheets', 0, 0, '', 1, 'Name- vinit savla\r\nRoll number- 41', '0', 0, 0, 0, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0),
(50, 61, 'food cart.pdf_$_', '0', 'Blue', '2022-12-25 03:07:27', '2022-12-31', '15:41', 'Hard Copy', 'Assignment Sheets', 0, 0, '', 1, 'none', '0', 0, 0, 0, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0),
(50, 62, 'food cart (1).pdf_$_', '0', 'Blue', '2022-12-25 04:28:12', '2023-01-07', '16:02', 'Hard Copy', 'Assignment Sheets', 0, 0, '', 1, '', '0', 0, 0, 0, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0),
(50, 63, 'food cart (1).pdf_$_', '0', 'Blue', '2022-12-25 04:38:07', '2023-01-07', '16:02', 'Hard Copy', 'Assignment Sheets', 0, 0, '', 1, '', '0', 0, 0, 0, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0),
(50, 64, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '2022-12-25 04:40:56', '2023-01-07', '16:02', 'Hard Copy', 'Assignment Sheets', 0, 0, '', 1, '', 'Writing', 0, 0, 0, 0, 0, '', '', 1, 0, 0, 0, 0, 0, 0),
(50, 65, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '2022-12-25 04:41:40', '2023-01-07', '16:02', 'Hard Copy', 'Assignment Sheets', 0, 0, '', 1, '', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 66, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '2022-12-25 04:43:40', '2023-01-07', '16:02', 'Hard Copy', 'Assignment Sheets', 0, 0, '', 1, '', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 68, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '0000-00-00 00:00:00', '2022-12-31', '23:59', 'Hard Copy', 'Long Book Sheets', 0, 0, '', 1, '', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 69, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '0000-00-00 00:00:00', '2022-12-31', '23:59', 'Hard Copy', 'Long Book Sheets', 0, 0, '', 1, '', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 70, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '0000-00-00 00:00:00', '2022-12-31', '23:59', 'Hard Copy', 'Long Book Sheets', 0, 0, '', 1, '', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 71, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '0000-00-00 00:00:00', '2022-12-31', '23:59', 'Hard Copy', 'Long Book Sheets', 0, 0, '', 1, '', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 72, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '0000-00-00 00:00:00', '2022-12-31', '23:59', 'Hard Copy', 'Long Book Sheets', 0, 0, '', 1, '', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 73, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '0000-00-00 00:00:00', '2022-12-31', '23:59', 'Hard Copy', 'Long Book Sheets', 0, 0, '', 1, '', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 74, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '25-12-2022 18:16:31', '2022-12-31', '23:59', 'Hard Copy', 'Long Book Sheets', 0, 0, '', 1, '', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 75, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '25-12-2022 18:20:35', '2022-12-31', '23:59', 'Hard Copy', 'Long Book Sheets', 0, 0, '', 1, 'these are just some instructions', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 76, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '25-12-2022 18:21:11', '2022-12-31', '23:59', 'Hard Copy', 'Long Book Sheets', 0, 0, '', 1, 'these are just some instructions', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 77, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '25-12-2022 18:21:56', '2022-12-31', '23:59', 'Hard Copy', 'Long Book Sheets', 0, 0, '', 1, 'these are just some instructions', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 78, 'food cart (1).pdf_$_', 'Mumbai', 'Blue', '25-12-2022 18:23:35', '2022-12-29', '18:28', 'Hard Copy', 'Assignment Sheets', 0, 0, '', 1, 'tfytvghvghv', 'Writing', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0),
(50, 79, 'traffic.pdf_$_', 'Mumbai', 'Blue', '01-02-2023 18:57:43', '2023-12-31', '23:59', 'Hard Copy', 'Long Book Sheets', 20, 6, 'have', 0, 'skfjnsdkjf', '', 0, 0, 0, 0, 0, NULL, NULL, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignmentsed`
--

CREATE TABLE `assignmentsed` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` text NOT NULL,
  `copy` text NOT NULL,
  `software` text DEFAULT NULL,
  `type` text NOT NULL,
  `deadline` text NOT NULL,
  `time` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `instructions` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `file` text NOT NULL,
  `project_manager` text DEFAULT NULL,
  `freelancer` text DEFAULT NULL,
  `posted` tinyint(1) NOT NULL,
  `under_process` tinyint(1) NOT NULL,
  `assigned_to_pm` tinyint(1) NOT NULL,
  `assigned_to_freelancer` tinyint(1) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `review_recieved` tinyint(1) NOT NULL,
  `lost` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `assignmentsed`
--

INSERT INTO `assignmentsed` (`id`, `user_id`, `city`, `copy`, `software`, `type`, `deadline`, `time`, `date_of_submission`, `instructions`, `is_active`, `file`, `project_manager`, `freelancer`, `posted`, `under_process`, `assigned_to_pm`, `assigned_to_freelancer`, `confirmed`, `review_recieved`, `lost`) VALUES
(1, 50, 'Mumbai', 'soft', 'ysy', '[\"Isometric Drawing\",\"Orthographic Drawing\",\"Dimensioning\",\"Sectioning\",\"Drawing Tools\",\"Assembly Drawings\",\"Cross-sectional Views\",\"Half Sections\",\"Other\"]', '2023-03-03', '00:59', '01-02-2023 19:06:16', 'sfndsfdsfhsshb', 1, 'traffic.pdf_$_', NULL, NULL, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignmentstyping`
--

CREATE TABLE `assignmentstyping` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` text NOT NULL,
  `font` text NOT NULL,
  `font_size` text NOT NULL,
  `font_color` text NOT NULL,
  `orientation` text NOT NULL,
  `page_size` text NOT NULL,
  `margins` text NOT NULL,
  `number` int(11) NOT NULL,
  `calculations` text NOT NULL,
  `deadline` text NOT NULL,
  `time` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `instructions` text DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `file` text NOT NULL,
  `project_manager` text DEFAULT NULL,
  `freelancer` text DEFAULT NULL,
  `posted` tinyint(1) NOT NULL,
  `under_process` tinyint(1) NOT NULL,
  `assigned_to_pm` tinyint(1) NOT NULL,
  `assigned_to_freelancer` tinyint(1) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `review_recieved` tinyint(1) NOT NULL,
  `lost` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `assignmentstyping`
--

INSERT INTO `assignmentstyping` (`id`, `user_id`, `city`, `font`, `font_size`, `font_color`, `orientation`, `page_size`, `margins`, `number`, `calculations`, `deadline`, `time`, `date_of_submission`, `instructions`, `is_active`, `file`, `project_manager`, `freelancer`, `posted`, `under_process`, `assigned_to_pm`, `assigned_to_freelancer`, `confirmed`, `review_recieved`, `lost`) VALUES
(1, 50, 'Mumbai', 'arial', '25', 'black', 'Portrait', 'A4', 'Normal', 20, 'yes', '2023-03-02', '00:00', '01-02-2023 19:23:53', 'sdfjnsfjksnfkjsdnfj', 1, 'traffic voilation report.docx_$_', NULL, NULL, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_update`
--

CREATE TABLE `assignment_update` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `field` text NOT NULL,
  `value` text NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assignment_update`
--

INSERT INTO `assignment_update` (`id`, `assignment_id`, `field`, `value`, `updated_on`) VALUES
(1, 6, 'title', 'Cartoon Study', '2022-09-05 02:29:01'),
(2, 6, 'descripton', 'Study the cartoon given below and write a report on it', '2022-09-05 02:30:57'),
(3, 6, 'subject_tags', '[\"pokemon,Cartoon and illustration,Cartoon creation,Anime\"]', '2022-09-05 02:32:01'),
(4, 6, 'deadline', '2022-09-08', '2022-09-05 02:33:29'),
(5, 6, 'deadline', '2022-09-10', '2022-09-05 02:34:18'),
(6, 6, 'time', '20:24', '2022-09-05 02:35:17'),
(7, 6, 'time', '02:30', '2022-09-05 02:35:56'),
(8, 6, 'course', 'Bcom', '2022-09-05 02:44:47'),
(9, 6, 'assignment type', '[\"Report Writing\",\"Literature Review\",\"PPT Making\",\"Other\"]', '2022-09-05 02:46:41'),
(10, 6, 'assignment type', '[\"Report Writing\",\"Literature Review\",\"PPT Making\"]', '2022-09-05 02:47:03'),
(11, 6, 'assignment level', 'Bachelors', '2022-09-05 02:49:22'),
(12, 6, 'budget', '100', '2022-09-05 02:50:25'),
(13, 7, 'title', 'test non tech', '2022-09-07 03:20:10'),
(14, 7, 'descripton', 'non technical mail test', '2022-09-07 03:21:09'),
(15, 7, 'subject_tags', '[\"Account,Accounts\"]', '2022-09-07 03:22:47'),
(16, 7, 'subject_tags', '[\"Account,Accounts\",\"Management & Cost accounting\"]', '2022-09-07 03:23:22'),
(17, 7, 'deadline', '2022-09-16', '2022-09-07 03:23:51'),
(18, 7, 'time', '20:30', '2022-09-07 03:24:44'),
(19, 7, 'course', 'pgdm', '2022-09-07 03:24:58'),
(20, 7, 'assignment type', '[\"Essay Writing\",\"Report Writing\",\"Literature Review\",\"Blackbook\",\"Research Paper\",\"Primary / Secondary Data Analysis\",\"Review Article\",\"Thesis Writing\",\"Dissertation Writing\",\"PPT Making\",\"Case Studies\",\"Question and Answer Based\",\"Statement of Purpose\"]', '2022-09-07 03:25:34'),
(21, 7, 'assignment level', 'Bachelors', '2022-09-07 03:26:11'),
(22, 7, 'title', 'test non-tech', '2022-09-07 03:30:40'),
(23, 7, 'descripton', 'non-technical mail test', '2022-09-07 03:31:03'),
(24, 7, 'subject_tags', '[\"Account,Accounts\",\"Management & Cost accounting\",\"Management\"]', '2022-09-07 03:31:21'),
(25, 7, 'deadline', '2022-09-15', '2022-09-07 03:32:09'),
(26, 7, 'time', '23:30', '2022-09-07 03:32:43'),
(27, 7, 'course', 'mba pgdm', '2022-09-07 03:33:21'),
(28, 7, 'assignment type', '[\"Essay Writing\",\"Report Writing\",\"Literature Review\",\"Blackbook\",\"Research Paper\",\"Primary / Secondary Data Analysis\",\"Review Article\",\"Thesis Writing\",\"Dissertation Writing\",\"PPT Making\"]', '2022-09-07 03:33:32'),
(29, 7, 'assignment level', 'Masters', '2022-09-07 03:34:01'),
(30, 7, 'budget', '2000', '2022-09-07 03:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `assign_to_freelancer`
--

CREATE TABLE `assign_to_freelancer` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_to_writer`
--

CREATE TABLE `assign_to_writer` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blackbook`
--

CREATE TABLE `blackbook` (
  `user_id` int(11) NOT NULL,
  `blackbook_id` int(11) NOT NULL,
  `stream` text NOT NULL,
  `topic` varchar(5) NOT NULL,
  `submission_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` date NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `college` varchar(256) NOT NULL,
  `font` varchar(50) NOT NULL,
  `font_size` varchar(50) NOT NULL,
  `font_color` varchar(50) NOT NULL,
  `line_spacing` varchar(40) NOT NULL,
  `pages` varchar(30) NOT NULL,
  `table_spacing` varchar(512) NOT NULL,
  `instruction` text NOT NULL,
  `blackbook_name` varchar(256) NOT NULL,
  `lim` varchar(50) NOT NULL,
  `soa_assigned` tinyint(1) NOT NULL,
  `soa_written` tinyint(1) NOT NULL,
  `soa_paid` tinyint(1) NOT NULL,
  `soa_completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blackbook`
--

INSERT INTO `blackbook` (`user_id`, `blackbook_id`, `stream`, `topic`, `submission_datetime`, `delivery_date`, `amount`, `college`, `font`, `font_size`, `font_color`, `line_spacing`, `pages`, `table_spacing`, `instruction`, `blackbook_name`, `lim`, `soa_assigned`, `soa_written`, `soa_paid`, `soa_completed`) VALUES
(17, 1, 'bms', 'Consu', '2020-10-10 11:18:02', '2020-10-14', NULL, 'Mithibai', 'Times new roman', '14', 'Black', '1.5', '15', '1.5', 'Intro, abstract, literature review, research methodology, conclusion, references', 'chachachaudhary@gmail.comBDAassignments1&2.pdf', '5000', 0, 0, 0, 0),
(21, 2, 'bbi', 'Finan', '2021-01-14 17:39:07', '2021-02-26', NULL, 'Somaiya', 'TNR', '12', 'Black', '1.5', '50', '2', 'Safags', 'BLACKBOOK PROJESCT ALTERNATIVE INVESTMENT TO STOCK MARKET.docx_$_', '8000', 0, 0, 0, 0),
(16, 3, 'engg', 'lkckc', '2021-02-24 10:53:34', '2021-02-28', NULL, 'sakec', 'kuch bhi daalo be ', 'apne hisaab se karo', 'ekdum sexy waala', 'jo tumhe theek lage', '150', 'jo tumhe sahi lage', 'ckmalkcceewkjnjew', 'ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_', 'normal', 0, 0, 0, 0),
(16, 4, 'mba', '', '2021-03-02 06:49:23', '2021-03-24', NULL, 'ldsdc\',s', 'kuch bhi daalo be ', 'apne hisaab se karo', 'ekdum sexy waala', 'jo tumhe theek lage', '515', 'jo tumhe sahi lage', 's;dkvm', 'hw3-logic.pdf_$_exam.docx_$_BestProposal.pdf_$_', '500', 0, 0, 0, 0),
(16, 5, 'mba', '', '2021-03-02 06:51:39', '2021-03-12', NULL, 'Uehe', 'kuch bhi daalo be ', 'apne hisaab se karo', 'ekdum sexy waala', 'Sbsb', '56dh', 'Dndn', 'Hsshdh', '_$_', '500', 0, 0, 0, 0),
(16, 6, 'bbi', '', '2021-03-02 06:58:53', '2021-03-12', NULL, 'Shhd', 'kuch bhi daalo be ', 'apne hisaab se karo', 'ekdum sexy waala', 'jo tumhe theek lage', 'Djhd', 'jo tumhe sahi lage', 'Sshshsh', 'PPT updated final.pdf_$_', 'normal', 0, 0, 0, 0),
(26, 7, 'engg', 'Movie', '2021-04-12 14:23:05', '2021-04-17', NULL, 'Terna', 'Times new roman', '12', 'Black', '1.5', '50', '1', 'No', '4550_Download_Instructions for Regular round 1 Merit for Govt online FYJC centralised  admission.pdf_$_FYBAF1.pdf_$_FYBAF.pdf_$_', '10000', 0, 0, 0, 0),
(26, 8, 'engg', 'Movie', '2021-04-12 14:24:16', '2021-04-17', NULL, 'Terna', 'Times new roman', '12', 'Black', '1.5', '50', '1', 'No', '4550_Download_Instructions for Regular round 1 Merit for Govt online FYJC centralised  admission.pdf_$_FYBAF1.pdf_$_FYBAF.pdf_$_', '10000', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `des1` text NOT NULL,
  `tags` varchar(1024) NOT NULL,
  `main` varchar(256) NOT NULL,
  `img1` varchar(256) NOT NULL,
  `img2` varchar(256) NOT NULL,
  `img3` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `w_id` int(11) NOT NULL,
  `des2` varchar(2048) NOT NULL,
  `des3` varchar(2048) NOT NULL,
  `des4` varchar(2048) NOT NULL,
  `des5` varchar(2048) NOT NULL,
  `img4` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `des1`, `tags`, `main`, `img1`, `img2`, `img3`, `date`, `w_id`, `des2`, `des3`, `des4`, `des5`, `img4`) VALUES
(2, 'dsfsdv', 'gff', 'nature;adventure;', 'Capture.PNG', 'Capture1.PNG', 'Capture2.PNG', 'Capture4.PNG', '2012-05-20', 0, '', '', '', '', ''),
(3, 'dejyh', 'gff', 'nature;adventure;', 'Capture6.PNG', 'Capture7.PNG', 'Capture8.PNG', 'CaptureDATA.PNG', '2012-05-20', 0, '', '', '', '', ''),
(4, 'dejyh', 'gff', 'nature;adventure;', 'Capture6.PNG', 'Capture7.PNG', 'Capture8.PNG', 'CaptureDATA.PNG', '2012-05-20', 0, '', '', '', '', ''),
(5, 'dsfsdv', 'gff', 'nature;adventure;', 'KEVAL SHAH - TE3 - 68-1.jpg', 'KEVAL SHAH - TE3 - 68-1.png', 'WhatsApp Image 2020-05-05 at 20.01.42.jpeg', 'WhatsApp Image 2020-03-06 at 08.42.12.jpeg', '2020-05-12', 0, '', '', '', '', ''),
(6, 'dsfsdv', 'gff', 'nature;adventure;', 'WhatsApp Image 2020-05-13 at 15.44.29.jpeg', 'WhatsApp Image 2020-05-11 at 13.52.59 (1).jpeg', 'WhatsApp Image 2020-05-13 at 12.59.03.jpeg', 'WhatsApp Image 2020-03-01 at 19.32.58.jpeg', '2020-05-15', 0, '', '', '', '', ''),
(7, 'dsfsdv', 'hello', 'nature;adventure;', 'WhatsApp Image 2020-05-05 at 20.01.42.jpeg', 'WhatsApp Image 2020-05-05 at 19.27.01.jpeg', '2020-04-13.png', 'WhatsApp Image 2020-03-01 at 19.14.32.jpeg', '2020-05-15', 1, '', '', '', '', ''),
(8, 'aaaa', 'jay', 'nature;adventure;', 'WhatsApp Image 2020-03-01 at 19.29.12.jpeg', 'WhatsApp Image 2020-03-01 at 19.29.05.jpeg', 'WhatsApp Image 2020-03-01 at 19.29.19.jpeg', 'WhatsApp Image 2020-03-01 at 19.29.12.jpeg', '2020-05-15', 2, '', '', '', '', ''),
(9, 'blog title', 'blog description 1', 'old tag; new tag', 'Black Panther.JPG', 'Bhavya Haria Technical Head.JPG', 'Capture.JPG', 'Chrome Background.jpg', '2020-05-19', 2, 'blog description 2', 'blog description 3', 'blog description 4', 'blog description 5', 'Sheeshaa-Iron-Man-Fidget-Hand-SDL151598674-1-8f7a3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_writer`
--

CREATE TABLE `blog_writer` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `des` varchar(2048) NOT NULL,
  `img` varchar(256) NOT NULL,
  `link` varchar(2048) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `blog_writer`
--

INSERT INTO `blog_writer` (`id`, `name`, `des`, `img`, `link`) VALUES
(1, 'jay', 'hello', 'WhatsApp Image 2020-05-13 at 15.44.29.jpeg', 'http://www.jay.com'),
(2, 'VORA JAY BHARAT ', 'hello', 'WhatsApp Image 2020-05-11 at 13.52.58.jpeg', 'http://www.jay.com');

-- --------------------------------------------------------

--
-- Table structure for table `bootcamp`
--

CREATE TABLE `bootcamp` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `residence_area` varchar(256) NOT NULL,
  `college_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bootcamp`
--

INSERT INTO `bootcamp` (`id`, `name`, `email`, `mobile`, `residence_area`, `college_name`) VALUES
(1, 'Bhavya Haria', 'bhavyaharia100@gmail.com', 9619305482, '', ''),
(2, 'Bhavya Haria', 'bhavyaharia100@gmail.com', 9619305482, 'gokuldham', ''),
(3, 'Bhavya Haria', 'bhavyaharia100@gmail.com', 9619305482, 'gokuldham', ''),
(4, 'Bhavya Haria', 'bhavyaharia100@gmail.com', 9619305482, 'gokuldham', 'sakec');

-- --------------------------------------------------------

--
-- Table structure for table `brainheaters`
--

CREATE TABLE `brainheaters` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `college` text NOT NULL,
  `city` text NOT NULL,
  `course` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `assignment type` text NOT NULL,
  `assignment_level` text NOT NULL,
  `subject_tags` text NOT NULL,
  `deadline` text NOT NULL,
  `time` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `budget` text NOT NULL,
  `filename` text NOT NULL,
  `project_manager` text DEFAULT NULL,
  `freelancer` text DEFAULT NULL,
  `posted` tinyint(1) NOT NULL,
  `under_process` tinyint(1) NOT NULL,
  `assigned_to_pm` tinyint(1) NOT NULL,
  `assigned_to_freelancer` tinyint(1) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `review_recieved` tinyint(1) NOT NULL,
  `bh_posted` tinyint(1) NOT NULL,
  `bh_likely` tinyint(1) NOT NULL,
  `bh_converted` tinyint(1) NOT NULL,
  `bh_lost` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brainheatershw`
--

CREATE TABLE `brainheatershw` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `college` text NOT NULL,
  `city` text NOT NULL,
  `ink_color` text NOT NULL,
  `submission_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` text NOT NULL,
  `time` text NOT NULL,
  `copy` text NOT NULL,
  `sheets` text NOT NULL,
  `instructions` text NOT NULL,
  `files` text NOT NULL,
  `soa_assigned` tinyint(1) NOT NULL,
  `soa_written` tinyint(1) NOT NULL,
  `soa_paid` tinyint(1) NOT NULL,
  `soa_completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `cityname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `cityname`) VALUES
(1, 'Achalpur'),
(2, 'Achhnera'),
(3, 'Adalaj'),
(4, 'Adilabad'),
(5, 'Adityapur'),
(6, 'Adoni'),
(7, 'Adoor'),
(8, 'Adra'),
(9, 'Adyar'),
(10, 'Afzalpur'),
(11, 'Agartala'),
(12, 'Agra'),
(13, 'Ahmedabad'),
(14, 'Ahmednagar'),
(15, 'Aizawl'),
(16, 'Ajmer'),
(17, 'Akola'),
(18, 'Akot'),
(19, 'Alappuzha'),
(20, 'Aligarh'),
(21, 'AlipurdUrban Agglomerationr'),
(22, 'Alirajpur'),
(23, 'Allahabad'),
(24, 'Alwar'),
(25, 'Amalapuram'),
(26, 'Amalner'),
(27, 'Ambejogai'),
(28, 'Ambikapur'),
(29, 'Amravati'),
(30, 'Amreli'),
(31, 'Amritsar'),
(32, 'Amroha'),
(33, 'Anakapalle'),
(34, 'Anand'),
(35, 'Anantapur'),
(36, 'Anantnag'),
(37, 'Anjangaon'),
(38, 'Anjar'),
(39, 'Ankleshwar'),
(40, 'Arakkonam'),
(41, 'Arambagh'),
(42, 'Araria'),
(43, 'Arrah'),
(44, 'Arsikere'),
(45, 'Aruppukkottai'),
(46, 'Arvi'),
(47, 'Arwal'),
(48, 'Asansol'),
(49, 'Asarganj'),
(50, 'Ashok Nagar'),
(51, 'Athni'),
(52, 'Attingal'),
(53, 'Aurangabad'),
(54, 'Aurangabad'),
(55, 'Azamgarh'),
(56, 'Bagaha'),
(57, 'Bageshwar'),
(58, 'Bahadurgarh'),
(59, 'Baharampur'),
(60, 'Bahraich'),
(61, 'Balaghat'),
(62, 'Balangir'),
(63, 'Baleshwar Town'),
(64, 'Ballari'),
(65, 'Balurghat'),
(66, 'Bankura'),
(67, 'Bapatla'),
(68, 'Baramula'),
(69, 'Barbil'),
(70, 'Bargarh'),
(71, 'Barh'),
(72, 'Baripada Town'),
(73, 'Barmer'),
(74, 'Barnala'),
(75, 'Barpeta'),
(76, 'Batala'),
(77, 'Bathinda'),
(78, 'Begusarai'),
(79, 'Belagavi'),
(80, 'Bellampalle'),
(81, 'Belonia'),
(82, 'Bengaluru'),
(83, 'Bettiah'),
(84, 'BhabUrban Agglomeration'),
(85, 'Bhadrachalam'),
(86, 'Bhadrak'),
(87, 'Bhagalpur'),
(88, 'Bhainsa'),
(89, 'Bharatpur'),
(90, 'Bharuch'),
(91, 'Bhatapara'),
(92, 'Bhavnagar'),
(93, 'Bhawanipatna'),
(94, 'Bheemunipatnam'),
(95, 'Bhilai Nagar'),
(96, 'Bhilwara'),
(97, 'Bhimavaram'),
(98, 'Bhiwandi'),
(99, 'Bhiwani'),
(100, 'Bhongir'),
(101, 'Bhopal'),
(102, 'Bhubaneswar'),
(103, 'Bhuj'),
(104, 'Bikaner'),
(105, 'Bilaspur'),
(106, 'Bobbili'),
(107, 'Bodhan'),
(108, 'Bokaro Steel City'),
(109, 'Bongaigaon City'),
(110, 'Brahmapur'),
(111, 'Buxar'),
(112, 'Byasanagar'),
(113, 'Chaibasa'),
(114, 'Chalakudy'),
(115, 'Chandausi'),
(116, 'Chandigarh'),
(117, 'Changanassery'),
(118, 'Charkhi Dadri'),
(119, 'Chatra'),
(120, 'Chennai'),
(121, 'Cherthala'),
(122, 'Chhapra'),
(123, 'Chhapra'),
(124, 'Chikkamagaluru'),
(125, 'Chilakaluripet'),
(126, 'Chirala'),
(127, 'Chirkunda'),
(128, 'Chirmiri'),
(129, 'Chittoor'),
(130, 'Chittur-Thathamangalam'),
(131, 'Coimbatore'),
(132, 'Cuttack'),
(133, 'Dalli-Rajhara'),
(134, 'Darbhanga'),
(135, 'Darjiling'),
(136, 'Davanagere'),
(137, 'Deesa'),
(138, 'Dehradun'),
(139, 'Dehri-on-Sone'),
(140, 'Delhi'),
(141, 'Deoghar'),
(142, 'Dhamtari'),
(143, 'Dhanbad'),
(144, 'Dharmanagar'),
(145, 'Dharmavaram'),
(146, 'Dhenkanal'),
(147, 'Dhoraji'),
(148, 'Dhubri'),
(149, 'Dhule'),
(150, 'Dhuri'),
(151, 'Dibrugarh'),
(152, 'Dimapur'),
(153, 'Diphu'),
(154, 'Dumka'),
(155, 'Dumraon'),
(156, 'Durg'),
(157, 'Eluru'),
(158, 'English Bazar'),
(159, 'Erode'),
(160, 'Etawah'),
(161, 'Faridabad'),
(162, 'Faridkot'),
(163, 'Farooqnagar'),
(164, 'Fatehabad'),
(165, 'Fatehpur Sikri'),
(166, 'Fazilka'),
(167, 'Firozabad'),
(168, 'Firozpur Cantt.'),
(169, 'Firozpur'),
(170, 'Forbesganj'),
(171, 'Gadwal'),
(172, 'Gandhinagar'),
(173, 'Gangarampur'),
(174, 'Ganjbasoda'),
(175, 'Gaya'),
(176, 'Giridih'),
(177, 'Goalpara'),
(178, 'Gobichettipalayam'),
(179, 'Gobindgarh'),
(180, 'Godhra'),
(181, 'Gohana'),
(182, 'Gokak'),
(183, 'Gooty'),
(184, 'Gopalganj'),
(185, 'Gudivada'),
(186, 'Gudur'),
(187, 'Gumia'),
(188, 'Guntakal'),
(189, 'Guntur'),
(190, 'Gurdaspur'),
(191, 'Gurgaon'),
(192, 'Guruvayoor'),
(193, 'Guwahati'),
(194, 'Gwalior'),
(195, 'Habra'),
(196, 'Hajipur'),
(197, 'Haldwani-cum-Kathgodam'),
(198, 'Hansi'),
(199, 'Hapur'),
(200, 'Hardoi '),
(201, 'Hardwar'),
(202, 'Hazaribag'),
(203, 'Hindupur'),
(204, 'Hisar'),
(205, 'Hoshiarpur'),
(206, 'Hubli-Dharwad'),
(207, 'Hugli-Chinsurah'),
(208, 'Hyderabad'),
(209, 'Ichalkaranji'),
(210, 'Imphal'),
(211, 'Indore'),
(212, 'Itarsi'),
(213, 'Jabalpur'),
(214, 'Jagdalpur'),
(215, 'Jaggaiahpet'),
(216, 'Jagraon'),
(217, 'Jagtial'),
(218, 'Jaipur'),
(219, 'Jalandhar Cantt.'),
(220, 'Jalandhar'),
(221, 'Jalpaiguri'),
(222, 'Jamalpur'),
(223, 'Jammalamadugu'),
(224, 'Jammu'),
(225, 'Jamnagar'),
(226, 'Jamshedpur'),
(227, 'Jamui'),
(228, 'Jangaon'),
(229, 'Jatani'),
(230, 'Jehanabad'),
(231, 'Jhansi'),
(232, 'Jhargram'),
(233, 'Jharsuguda'),
(234, 'Jhumri Tilaiya'),
(235, 'Jind'),
(236, 'Jodhpur'),
(237, 'Jorhat'),
(238, 'Kadapa'),
(239, 'Kadi'),
(240, 'Kadiri'),
(241, 'Kagaznagar'),
(242, 'Kailasahar'),
(243, 'Kaithal'),
(244, 'Kakinada'),
(245, 'Kalimpong'),
(246, 'Kalpi'),
(247, 'Kalyan-Dombivali'),
(248, 'Kamareddy'),
(249, 'Kancheepuram'),
(250, 'Kandukur'),
(251, 'Kanhangad'),
(252, 'Kannur'),
(253, 'Kanpur'),
(254, 'Kapadvanj'),
(255, 'Kapurthala'),
(256, 'Karaikal'),
(257, 'Karimganj'),
(258, 'Karimnagar'),
(259, 'Karjat'),
(260, 'Karnal'),
(261, 'Karur'),
(262, 'Karwar'),
(263, 'Kasaragod'),
(264, 'Kashipur'),
(265, 'KathUrban Agglomeration'),
(266, 'Katihar'),
(267, 'Kavali'),
(268, 'Kayamkulam'),
(269, 'Kendrapara'),
(270, 'Kendujhar'),
(271, 'Keshod'),
(272, 'Khair'),
(273, 'Khambhat'),
(274, 'Khammam'),
(275, 'Khanna'),
(276, 'Kharagpur'),
(277, 'Kharar'),
(278, 'Khowai'),
(279, 'Kishanganj'),
(280, 'Kochi'),
(281, 'Kodungallur'),
(282, 'Kohima'),
(283, 'Kolar'),
(284, 'Kolkata'),
(285, 'Kollam'),
(286, 'Koratla'),
(287, 'Korba'),
(288, 'Kot Kapura'),
(289, 'Kota'),
(290, 'Kothagudem'),
(291, 'Kottayam'),
(292, 'Kovvur'),
(293, 'Koyilandy'),
(294, 'Kozhikode'),
(295, 'Kunnamkulam'),
(296, 'Kurnool'),
(297, 'Kyathampalle'),
(298, 'Lachhmangarh'),
(299, 'Ladnu'),
(300, 'Ladwa'),
(301, 'Lahar'),
(302, 'Laharpur'),
(303, 'Lakheri'),
(304, 'Lakhimpur'),
(305, 'Lakhisarai'),
(306, 'Lakshmeshwar'),
(307, 'Lal Gopalganj Nindaura'),
(308, 'Lalganj'),
(309, 'Lalganj'),
(310, 'Lalgudi'),
(311, 'Lalitpur'),
(312, 'Lalsot'),
(313, 'Lanka'),
(314, 'Lar'),
(315, 'Lathi'),
(316, 'Latur'),
(317, 'Lilong'),
(318, 'Limbdi'),
(319, 'Lingsugur'),
(320, 'Loha'),
(321, 'Lohardaga'),
(322, 'Lonar'),
(323, 'Lonavla'),
(324, 'Longowal'),
(325, 'Loni'),
(326, 'Losal'),
(327, 'Lucknow'),
(328, 'Ludhiana'),
(329, 'Lumding'),
(330, 'Lunawada'),
(331, 'Lunglei'),
(332, 'Macherla'),
(333, 'Machilipatnam'),
(334, 'Madanapalle'),
(335, 'Maddur'),
(336, 'Madhepura'),
(337, 'Madhubani'),
(338, 'Madhugiri'),
(339, 'Madhupur'),
(340, 'Madikeri'),
(341, 'Madurai'),
(342, 'Magadi'),
(343, 'Mahad'),
(344, 'Mahalingapura'),
(345, 'Maharajganj'),
(346, 'Maharajpur'),
(347, 'Mahasamund'),
(348, 'Mahbubnagar'),
(349, 'Mahe'),
(350, 'Mahemdabad'),
(351, 'Mahendragarh'),
(352, 'Mahesana'),
(353, 'Mahidpur'),
(354, 'Mahnar Bazar'),
(355, 'Mahuva'),
(356, 'Maihar'),
(357, 'Mainaguri'),
(358, 'Makhdumpur'),
(359, 'Makrana'),
(360, 'Malaj Khand'),
(361, 'Malappuram'),
(362, 'Malavalli'),
(363, 'Malda'),
(364, 'Malegaon'),
(365, 'Malerkotla'),
(366, 'Malkangiri'),
(367, 'Malkapur'),
(368, 'Malout'),
(369, 'Malpura'),
(370, 'Malur'),
(371, 'Manachanallur'),
(372, 'Manasa'),
(373, 'Manavadar'),
(374, 'Manawar'),
(375, 'Mancherial'),
(376, 'Mandalgarh'),
(377, 'Mandamarri'),
(378, 'Mandapeta'),
(379, 'Mandawa'),
(380, 'Mandi Dabwali'),
(381, 'Mandi'),
(382, 'Mandideep'),
(383, 'Mandla'),
(384, 'Mandsaur'),
(385, 'Mandvi'),
(386, 'Mandya'),
(387, 'Manendragarh'),
(388, 'Maner'),
(389, 'Mangaldoi'),
(390, 'Mangaluru'),
(391, 'Mangalvedhe'),
(392, 'Manglaur'),
(393, 'Mangrol'),
(394, 'Mangrol'),
(395, 'Mangrulpir'),
(396, 'Manihari'),
(397, 'Manjlegaon'),
(398, 'Mankachar'),
(399, 'Manmad'),
(400, 'Mansa'),
(401, 'Mansa'),
(402, 'Manuguru'),
(403, 'Manvi'),
(404, 'Manwath'),
(405, 'Mapusa'),
(406, 'Margao'),
(407, 'Margherita'),
(408, 'Marhaura'),
(409, 'Mariani'),
(410, 'Marigaon'),
(411, 'Markapur'),
(412, 'Marmagao'),
(413, 'Masaurhi'),
(414, 'Mathabhanga'),
(415, 'Mathura'),
(416, 'Mattannur'),
(417, 'Mauganj'),
(418, 'Mavelikkara'),
(419, 'Mavoor'),
(420, 'Mayang Imphal'),
(421, 'Medak'),
(422, 'Medininagar Daltonganj'),
(423, 'Medinipur'),
(424, 'Meerut'),
(425, 'Mehkar'),
(426, 'Memari'),
(427, 'Merta City'),
(428, 'Mhaswad'),
(429, 'Mhow Cantonment'),
(430, 'Mhowgaon'),
(431, 'Mihijam'),
(432, 'Mira-Bhayandar'),
(433, 'Mirganj'),
(434, 'Miryalaguda'),
(435, 'Modasa'),
(436, 'Modinagar'),
(437, 'Moga'),
(438, 'Mohali'),
(439, 'Mokameh'),
(440, 'Mokokchung'),
(441, 'Monoharpur'),
(442, 'Moradabad'),
(443, 'Morena'),
(444, 'Morinda, India'),
(445, 'Morshi'),
(446, 'Morvi'),
(447, 'Motihari'),
(448, 'Motipur'),
(449, 'Mount Abu'),
(450, 'Mudabidri'),
(451, 'Mudalagi'),
(452, 'Muddebihal'),
(453, 'Mudhol'),
(454, 'Mukerian'),
(455, 'Mukhed'),
(456, 'Muktsar'),
(457, 'Mul'),
(458, 'Mulbagal'),
(459, 'Multai'),
(460, 'Mumbai'),
(461, 'Mundargi'),
(462, 'Mundi'),
(463, 'Mungeli'),
(464, 'Munger'),
(465, 'Murliganj'),
(466, 'Murshidabad'),
(467, 'Murtijapur'),
(468, 'Murwara Katni'),
(469, 'Musabani'),
(470, 'Mussoorie'),
(471, 'Muvattupuzha'),
(472, 'Muzaffarpur'),
(473, 'Mysore'),
(474, 'Nabadwip'),
(475, 'Nabarangapur'),
(476, 'Nabha'),
(477, 'Nadbai'),
(478, 'Nadiad'),
(479, 'Nagaon'),
(480, 'Nagapattinam'),
(481, 'Nagar'),
(482, 'Nagari'),
(483, 'Nagarkurnool'),
(484, 'Nagaur'),
(485, 'Nagda'),
(486, 'Nagercoil'),
(487, 'Nagina'),
(488, 'Nagla'),
(489, 'Nagpur'),
(490, 'Nahan'),
(491, 'Naharlagun'),
(492, 'Naidupet'),
(493, 'Naihati'),
(494, 'Naila Janjgir'),
(495, 'Nainital'),
(496, 'Nainpur'),
(497, 'Najibabad'),
(498, 'Nakodar'),
(499, 'Nakur'),
(500, 'Nalbari'),
(501, 'Namagiripettai'),
(502, 'Namakkal'),
(503, 'Nanded-Waghala'),
(504, 'Nandgaon'),
(505, 'Nandivaram-Guduvancheri'),
(506, 'Nandura'),
(507, 'Nandurbar'),
(508, 'Nandyal'),
(509, 'Nangal'),
(510, 'Nanjangud'),
(511, 'Nanjikottai'),
(512, 'Nanpara'),
(513, 'Narasapuram'),
(514, 'Narasaraopet'),
(515, 'Naraura'),
(516, 'Narayanpet'),
(517, 'Nargund'),
(518, 'Narkatiaganj'),
(519, 'Narkhed'),
(520, 'Narnaul'),
(521, 'Narsinghgarh'),
(522, 'Narsinghgarh'),
(523, 'Narsipatnam'),
(524, 'Narwana'),
(525, 'Nashik'),
(526, 'Nasirabad'),
(527, 'Natham'),
(528, 'Nathdwara'),
(529, 'Naugachhia'),
(530, 'Naugawan Sadat'),
(531, 'Nautanwa'),
(532, 'Navalgund'),
(533, 'Navsari'),
(534, 'Nawabganj'),
(535, 'Nawada'),
(536, 'Nawanshahr'),
(537, 'Nawapur'),
(538, 'Nedumangad'),
(539, 'Neem-Ka-Thana'),
(540, 'Neemuch'),
(541, 'Nehtaur'),
(542, 'Nelamangala'),
(543, 'Nellikuppam'),
(544, 'Nellore'),
(545, 'Nepanagar'),
(546, 'New Delhi'),
(547, 'Neyveli TS'),
(548, 'Neyyattinkara'),
(549, 'Nidadavole'),
(550, 'Nilambur'),
(551, 'Nilanga'),
(552, 'Nimbahera'),
(553, 'Nirmal'),
(554, 'Niwai'),
(555, 'Niwari'),
(556, 'Nizamabad'),
(557, 'Nohar'),
(558, 'Noida'),
(559, 'Nokha'),
(560, 'Nokha'),
(561, 'Nongstoin'),
(562, 'Noorpur'),
(563, 'North Lakhimpur'),
(564, 'Nowgong'),
(565, 'Nowrozabad Khodargama'),
(566, 'Nuzvid'),
(567, 'O\' Valley'),
(568, 'Obra'),
(569, 'Oddanchatram'),
(570, 'Ongole'),
(571, 'Orai'),
(572, 'Osmanabad'),
(573, 'Ottappalam'),
(574, 'Ozar'),
(575, 'P.N.Patti'),
(576, 'Pachora'),
(577, 'Pachore'),
(578, 'Pacode'),
(579, 'Padmanabhapuram'),
(580, 'Padra'),
(581, 'Padrauna'),
(582, 'Paithan'),
(583, 'Pakaur'),
(584, 'Palacole'),
(585, 'Palai'),
(586, 'Palakkad'),
(587, 'Palampur'),
(588, 'Palani'),
(589, 'Palanpur'),
(590, 'Palasa Kasibugga'),
(591, 'Palghar'),
(592, 'Pali'),
(593, 'Pali'),
(594, 'Palia Kalan'),
(595, 'Palitana'),
(596, 'Palladam'),
(597, 'Pallapatti'),
(598, 'Pallikonda'),
(599, 'Palwal'),
(600, 'Palwancha'),
(601, 'Panagar'),
(602, 'Panagudi'),
(603, 'Panaji'),
(604, 'Panamattom'),
(605, 'Panchkula'),
(606, 'Panchla'),
(607, 'Pandharkaoda'),
(608, 'Pandharpur'),
(609, 'Pandhurna'),
(610, 'PandUrban Agglomeration'),
(611, 'Panipat'),
(612, 'Panna'),
(613, 'Panniyannur'),
(614, 'Panruti'),
(615, 'Panvel'),
(616, 'Pappinisseri'),
(617, 'Paradip'),
(618, 'Paramakudi'),
(619, 'Parangipettai'),
(620, 'Parasi'),
(621, 'Paravoor'),
(622, 'Parbhani'),
(623, 'Pardi'),
(624, 'Parlakhemundi'),
(625, 'Parli'),
(626, 'Partur'),
(627, 'Parvathipuram'),
(628, 'Pasan'),
(629, 'Paschim Punropara'),
(630, 'Pasighat'),
(631, 'Patan'),
(632, 'Pathanamthitta'),
(633, 'Pathankot'),
(634, 'Pathardi'),
(635, 'Pathri'),
(636, 'Patiala'),
(637, 'Patna'),
(638, 'Patratu'),
(639, 'Pattamundai'),
(640, 'Patti'),
(641, 'Pattran'),
(642, 'Pattukkottai'),
(643, 'Patur'),
(644, 'Pauni'),
(645, 'Pauri'),
(646, 'Pavagada'),
(647, 'Pedana'),
(648, 'Peddapuram'),
(649, 'Pehowa'),
(650, 'Pen'),
(651, 'Perambalur'),
(652, 'Peravurani'),
(653, 'Peringathur'),
(654, 'Perinthalmanna'),
(655, 'Periyakulam'),
(656, 'Periyasemur'),
(657, 'Pernampattu'),
(658, 'Perumbavoor'),
(659, 'Petlad'),
(660, 'Phagwara'),
(661, 'Phalodi'),
(662, 'Phaltan'),
(663, 'Phillaur'),
(664, 'Phulabani'),
(665, 'Phulera'),
(666, 'Phulpur'),
(667, 'Phusro'),
(668, 'Pihani'),
(669, 'Pilani'),
(670, 'Pilibanga'),
(671, 'Pilibhit'),
(672, 'Pilkhuwa'),
(673, 'Pindwara'),
(674, 'Pinjore'),
(675, 'Pipar City'),
(676, 'Pipariya'),
(677, 'Piriyapatna'),
(678, 'Piro'),
(679, 'Pithampur'),
(680, 'Pithapuram'),
(681, 'Pithoragarh'),
(682, 'Pollachi'),
(683, 'Polur'),
(684, 'Pondicherry'),
(685, 'Ponnani'),
(686, 'Ponneri'),
(687, 'Ponnur'),
(688, 'Porbandar'),
(689, 'Porsa'),
(690, 'Port Blair'),
(691, 'Powayan'),
(692, 'Prantij'),
(693, 'Pratapgarh'),
(694, 'Pratapgarh'),
(695, 'Prithvipur'),
(696, 'Proddatur'),
(697, 'Pudukkottai'),
(698, 'Pudupattinam'),
(699, 'Pukhrayan'),
(700, 'Pulgaon'),
(701, 'Puliyankudi'),
(702, 'Punalur'),
(703, 'Punch'),
(704, 'Pune'),
(705, 'Punganur'),
(706, 'Punjaipugalur'),
(707, 'Puranpur'),
(708, 'Puri'),
(709, 'Purna'),
(710, 'Purnia'),
(711, 'PurqUrban Agglomerationzi'),
(712, 'Purulia'),
(713, 'Purwa'),
(714, 'Pusad'),
(715, 'Puthuppally'),
(716, 'Puttur'),
(717, 'Puttur'),
(718, 'Qadian'),
(719, 'Raayachuru'),
(720, 'Rabkavi Banhatti'),
(721, 'Radhanpur'),
(722, 'Rae Bareli'),
(723, 'Rafiganj'),
(724, 'Raghogarh-Vijaypur'),
(725, 'Raghunathganj'),
(726, 'Raghunathpur'),
(727, 'Rahatgarh'),
(728, 'Rahuri'),
(729, 'Raiganj'),
(730, 'Raigarh'),
(731, 'Raikot'),
(732, 'Raipur'),
(733, 'Rairangpur'),
(734, 'Raisen'),
(735, 'Raisinghnagar'),
(736, 'Rajagangapur'),
(737, 'Rajahmundry'),
(738, 'Rajakhera'),
(739, 'Rajaldesar'),
(740, 'Rajam'),
(741, 'Rajampet'),
(742, 'Rajapalayam'),
(743, 'Rajauri'),
(744, 'Rajgarh (Alwar)'),
(745, 'Rajgarh (Churu)'),
(746, 'Rajgarh'),
(747, 'Rajgir'),
(748, 'Rajkot'),
(749, 'Rajnandgaon'),
(750, 'Rajpipla'),
(751, 'Rajpura'),
(752, 'Rajsamand'),
(753, 'Rajula'),
(754, 'Rajura'),
(755, 'Ramachandrapuram'),
(756, 'Ramagundam'),
(757, 'Ramanagaram'),
(758, 'Ramanathapuram'),
(759, 'Ramdurg'),
(760, 'Rameshwaram'),
(761, 'Ramganj Mandi'),
(762, 'Ramgarh'),
(763, 'Ramnagar'),
(764, 'Ramnagar'),
(765, 'Ramngarh'),
(766, 'Rampur Maniharan'),
(767, 'Rampur'),
(768, 'Rampura Phul'),
(769, 'Rampurhat'),
(770, 'Ramtek'),
(771, 'Ranaghat'),
(772, 'Ranavav'),
(773, 'Ranchi'),
(774, 'Ranebennuru'),
(775, 'Rangia'),
(776, 'Rania'),
(777, 'Ranibennur'),
(778, 'Ranipet'),
(779, 'Rapar'),
(780, 'Rasipuram'),
(781, 'Rasra'),
(782, 'Ratangarh'),
(783, 'Rath'),
(784, 'Ratia'),
(785, 'Ratlam'),
(786, 'Ratnagiri'),
(787, 'Rau'),
(788, 'Raurkela'),
(789, 'Raver'),
(790, 'Rawatbhata'),
(791, 'Rawatsar'),
(792, 'Raxaul Bazar'),
(793, 'Rayachoti'),
(794, 'Rayadurg'),
(795, 'Rayagada'),
(796, 'Reengus'),
(797, 'Rehli'),
(798, 'Renigunta'),
(799, 'Renukoot'),
(800, 'Reoti'),
(801, 'Repalle'),
(802, 'Revelganj'),
(803, 'Rewa'),
(804, 'Rewari'),
(805, 'Rishikesh'),
(806, 'Risod'),
(807, 'Robertsganj'),
(808, 'Robertson Pet'),
(809, 'Rohtak'),
(810, 'Ron'),
(811, 'Roorkee'),
(812, 'Rosera'),
(813, 'Rudauli'),
(814, 'Rudrapur'),
(815, 'Rudrapur'),
(816, 'Rupnagar'),
(817, 'Sabalgarh'),
(818, 'Sadabad'),
(819, 'Sadalagi'),
(820, 'Sadasivpet'),
(821, 'Sadri'),
(822, 'Sadulpur'),
(823, 'Sadulshahar'),
(824, 'Safidon'),
(825, 'Safipur'),
(826, 'Sagar'),
(827, 'Sagara'),
(828, 'Sagwara'),
(829, 'Saharanpur'),
(830, 'Saharsa'),
(831, 'Sahaspur'),
(832, 'Sahaswan'),
(833, 'Sahawar'),
(834, 'Sahibganj'),
(835, 'Sahjanwa'),
(836, 'Saidpur'),
(837, 'Saiha'),
(838, 'Sailu'),
(839, 'Sainthia'),
(840, 'Sakaleshapura'),
(841, 'Sakti'),
(842, 'Salaya'),
(843, 'Salem'),
(844, 'Salur'),
(845, 'Samalkha'),
(846, 'Samalkot'),
(847, 'Samana'),
(848, 'Samastipur'),
(849, 'Sambalpur'),
(850, 'Sambhal'),
(851, 'Sambhar'),
(852, 'Samdhan'),
(853, 'Samthar'),
(854, 'Sanand'),
(855, 'Sanawad'),
(856, 'Sanchore'),
(857, 'Sandi'),
(858, 'Sandila'),
(859, 'Sanduru'),
(860, 'Sangamner'),
(861, 'Sangareddy'),
(862, 'Sangaria'),
(863, 'Sangli'),
(864, 'Sangole'),
(865, 'Sangrur'),
(866, 'Sankarankovil'),
(867, 'Sankari'),
(868, 'Sankeshwara'),
(869, 'Santipur'),
(870, 'Sarangpur'),
(871, 'Sardarshahar'),
(872, 'Sardhana'),
(873, 'Sarni'),
(874, 'Sarsod'),
(875, 'Sasaram'),
(876, 'Sasvad'),
(877, 'Satana'),
(878, 'Satara'),
(879, 'Sathyamangalam'),
(880, 'Satna'),
(881, 'Sattenapalle'),
(882, 'Sattur'),
(883, 'Saunda'),
(884, 'Saundatti-Yellamma'),
(885, 'Sausar'),
(886, 'Savanur'),
(887, 'Savarkundla'),
(888, 'Savner'),
(889, 'Sawai Madhopur'),
(890, 'Sawantwadi'),
(891, 'Sedam'),
(892, 'Sehore'),
(893, 'Sendhwa'),
(894, 'Seohara'),
(895, 'Seoni'),
(896, 'Seoni-Malwa'),
(897, 'Shahabad'),
(898, 'Shahabad, Hardoi'),
(899, 'Shahabad, Rampur'),
(900, 'Shahade'),
(901, 'Shahbad'),
(902, 'Shahdol'),
(903, 'Shahganj'),
(904, 'Shahjahanpur'),
(905, 'Shahpur'),
(906, 'Shahpura'),
(907, 'Shahpura'),
(908, 'Shajapur'),
(909, 'Shamgarh'),
(910, 'Shamli'),
(911, 'Shamsabad, Agra'),
(912, 'Shamsabad, Farrukhabad'),
(913, 'Shegaon'),
(914, 'Sheikhpura'),
(915, 'Shendurjana'),
(916, 'Shenkottai'),
(917, 'Sheoganj'),
(918, 'Sheohar'),
(919, 'Sheopur'),
(920, 'Sherghati'),
(921, 'Sherkot'),
(922, 'Shiggaon'),
(923, 'Shikaripur'),
(924, 'Shikarpur, Bulandshahr'),
(925, 'Shikohabad'),
(926, 'Shillong'),
(927, 'Shimla'),
(928, 'Shirdi'),
(929, 'Shirpur-Warwade'),
(930, 'Shirur'),
(931, 'Shishgarh'),
(932, 'Shivamogga'),
(933, 'Shivpuri'),
(934, 'Sholavandan'),
(935, 'Sholingur'),
(936, 'Shoranur'),
(937, 'Shrigonda'),
(938, 'Shrirampur'),
(939, 'Shrirangapattana'),
(940, 'Shujalpur'),
(941, 'Siana'),
(942, 'Sibsagar'),
(943, 'Siddipet'),
(944, 'Sidhi'),
(945, 'Sidhpur'),
(946, 'Sidlaghatta'),
(947, 'Sihor'),
(948, 'Sihora'),
(949, 'Sikanderpur'),
(950, 'Sikandra Rao'),
(951, 'Sikandrabad'),
(952, 'Sikar'),
(953, 'Silao'),
(954, 'Silapathar'),
(955, 'Silchar'),
(956, 'Siliguri'),
(957, 'Sillod'),
(958, 'Silvassa'),
(959, 'Simdega'),
(960, 'Sindagi'),
(961, 'Sindhagi'),
(962, 'Sindhnur'),
(963, 'Singrauli'),
(964, 'Sinnar'),
(965, 'Sira'),
(966, 'Sircilla'),
(967, 'Sirhind Fatehgarh Sahib'),
(968, 'Sirkali'),
(969, 'Sirohi'),
(970, 'Sironj'),
(971, 'Sirsa'),
(972, 'Sirsaganj'),
(973, 'Sirsi'),
(974, 'Sirsi'),
(975, 'Siruguppa'),
(976, 'Sitamarhi'),
(977, 'Sitapur'),
(978, 'Sitarganj'),
(979, 'Sivaganga'),
(980, 'Sivagiri'),
(981, 'Sivakasi'),
(982, 'Siwan'),
(983, 'Sohagpur'),
(984, 'Sohna'),
(985, 'Sojat'),
(986, 'Solan'),
(987, 'Solapur'),
(988, 'Sonamukhi'),
(989, 'Sonepur'),
(990, 'Songadh'),
(991, 'Sonipat'),
(992, 'Sopore'),
(993, 'Soro'),
(994, 'Soron'),
(995, 'Soyagaon'),
(996, 'Sri Madhopur'),
(997, 'Srikakulam'),
(998, 'Srikalahasti'),
(999, 'Srinagar'),
(1000, 'Srinagar'),
(1001, 'Srinivaspur'),
(1002, 'Srirampore'),
(1003, 'Srisailam Project Right Flank Colony Township'),
(1004, 'Srivilliputhur'),
(1005, 'Sugauli'),
(1006, 'Sujangarh'),
(1007, 'Sujanpur'),
(1008, 'Sullurpeta'),
(1009, 'Sultanganj'),
(1010, 'Sultanpur'),
(1011, 'Sumerpur'),
(1012, 'Sumerpur'),
(1013, 'Sunabeda'),
(1014, 'Sunam'),
(1015, 'Sundargarh'),
(1016, 'Sundarnagar'),
(1017, 'Supaul'),
(1018, 'Surandai'),
(1019, 'Surapura'),
(1020, 'Surat'),
(1021, 'Suratgarh'),
(1022, 'SUrban Agglomerationr'),
(1023, 'Suri'),
(1024, 'Suriyampalayam'),
(1025, 'Suryapet'),
(1026, 'Tadepalligudem'),
(1027, 'Tadpatri'),
(1028, 'Takhatgarh'),
(1029, 'Taki'),
(1030, 'Talaja'),
(1031, 'Talcher'),
(1032, 'Talegaon Dabhade'),
(1033, 'Talikota'),
(1034, 'Taliparamba'),
(1035, 'Talode'),
(1036, 'Talwara'),
(1037, 'Tamluk'),
(1038, 'Tanda'),
(1039, 'Tandur'),
(1040, 'Tanuku'),
(1041, 'Tarakeswar'),
(1042, 'Tarana'),
(1043, 'Taranagar'),
(1044, 'Taraori'),
(1045, 'Tarbha'),
(1046, 'Tarikere'),
(1047, 'Tarn Taran'),
(1048, 'Tasgaon'),
(1049, 'Tehri'),
(1050, 'Tekkalakote'),
(1051, 'Tenali'),
(1052, 'Tenkasi'),
(1053, 'Tenu dam-cum-Kathhara'),
(1054, 'Terdal'),
(1055, 'Tezpur'),
(1056, 'Thakurdwara'),
(1057, 'Thammampatti'),
(1058, 'Thana Bhawan'),
(1059, 'Thane'),
(1060, 'Thanesar'),
(1061, 'Thangadh'),
(1062, 'Thanjavur'),
(1063, 'Tharad'),
(1064, 'Tharamangalam'),
(1065, 'Tharangambadi'),
(1066, 'Theni Allinagaram'),
(1067, 'Thirumangalam'),
(1068, 'Thirupuvanam'),
(1069, 'Thiruthuraipoondi'),
(1070, 'Thiruvalla'),
(1071, 'Thiruvallur'),
(1072, 'Thiruvananthapuram'),
(1073, 'Thiruvarur'),
(1074, 'Thodupuzha'),
(1075, 'Thoubal'),
(1076, 'Thrissur'),
(1077, 'Thuraiyur'),
(1078, 'Tikamgarh'),
(1079, 'Tilda Newra'),
(1080, 'Tilhar'),
(1081, 'Tindivanam'),
(1082, 'Tinsukia'),
(1083, 'Tiptur'),
(1084, 'Tirora'),
(1085, 'Tiruchendur'),
(1086, 'Tiruchengode'),
(1087, 'Tiruchirappalli'),
(1088, 'Tirukalukundram'),
(1089, 'Tirukkoyilur'),
(1090, 'Tirunelveli'),
(1091, 'Tirupathur'),
(1092, 'Tirupathur'),
(1093, 'Tirupati'),
(1094, 'Tiruppur'),
(1095, 'Tirur'),
(1096, 'Tiruttani'),
(1097, 'Tiruvannamalai'),
(1098, 'Tiruvethipuram'),
(1099, 'Tiruvuru'),
(1100, 'Tirwaganj'),
(1101, 'Titlagarh'),
(1102, 'Tittakudi'),
(1103, 'Todabhim'),
(1104, 'Todaraisingh'),
(1105, 'Tohana'),
(1106, 'Tonk'),
(1107, 'Tuensang'),
(1108, 'Tuljapur'),
(1109, 'Tulsipur'),
(1110, 'Tumkur'),
(1111, 'Tumsar'),
(1112, 'Tundla'),
(1113, 'Tuni'),
(1114, 'Tura'),
(1115, 'Uchgaon'),
(1116, 'Udaipur'),
(1117, 'Udaipur'),
(1118, 'Udaipurwati'),
(1119, 'Udgir'),
(1120, 'Udhagamandalam'),
(1121, 'Udhampur'),
(1122, 'Udumalaipettai'),
(1123, 'Udupi'),
(1124, 'Ujhani'),
(1125, 'Ujjain'),
(1126, 'Umarga'),
(1127, 'Umaria'),
(1128, 'Umarkhed'),
(1129, 'Umbergaon'),
(1130, 'Umred'),
(1131, 'Umreth'),
(1132, 'Una'),
(1133, 'Unjha'),
(1134, 'Unnamalaikadai'),
(1135, 'Unnao'),
(1136, 'Upleta'),
(1137, 'Uran Islampur'),
(1138, 'Uran'),
(1139, 'Uravakonda'),
(1140, 'Urmar Tanda'),
(1141, 'Usilampatti'),
(1142, 'Uthamapalayam'),
(1143, 'Uthiramerur'),
(1144, 'Utraula'),
(1145, 'Vadakkuvalliyur'),
(1146, 'Vadalur'),
(1147, 'Vadgaon Kasba'),
(1148, 'Vadipatti'),
(1149, 'Vadnagar'),
(1150, 'Vadodara'),
(1151, 'Vaijapur'),
(1152, 'Vaikom'),
(1153, 'Valparai'),
(1154, 'Valsad'),
(1155, 'Vandavasi'),
(1156, 'Vaniyambadi'),
(1157, 'Vapi'),
(1158, 'Vapi'),
(1159, 'Varanasi'),
(1160, 'Varkala'),
(1161, 'Vasai-Virar'),
(1162, 'Vatakara'),
(1163, 'Vedaranyam'),
(1164, 'Vellakoil'),
(1165, 'Vellore'),
(1166, 'Venkatagiri'),
(1167, 'Veraval'),
(1168, 'Vidisha'),
(1169, 'Vijainagar, Ajmer'),
(1170, 'Vijapur'),
(1171, 'Vijayapura'),
(1172, 'Vijayawada'),
(1173, 'Vijaypur'),
(1174, 'Vikarabad'),
(1175, 'Vikramasingapuram'),
(1176, 'Viluppuram'),
(1177, 'Vinukonda'),
(1178, 'Viramgam'),
(1179, 'Virudhachalam'),
(1180, 'Virudhunagar'),
(1181, 'Visakhapatnam'),
(1182, 'Visnagar'),
(1183, 'Viswanatham'),
(1184, 'Vita'),
(1185, 'Vizianagaram'),
(1186, 'Vrindavan'),
(1187, 'Vyara'),
(1188, 'Wadgaon Road'),
(1189, 'Wadhwan'),
(1190, 'Wadi'),
(1191, 'Wai'),
(1192, 'Wanaparthy'),
(1193, 'Wani'),
(1194, 'Wankaner'),
(1195, 'Wara Seoni'),
(1196, 'Warangal'),
(1197, 'Wardha'),
(1198, 'Warhapur'),
(1199, 'Warisaliganj'),
(1200, 'Warora'),
(1201, 'Warud'),
(1202, 'Washim'),
(1203, 'Wokha'),
(1204, 'Yadgir'),
(1205, 'Yamunanagar'),
(1206, 'Yanam'),
(1207, 'Yavatmal'),
(1208, 'Yawal'),
(1209, 'Yellandu'),
(1210, 'Yemmiganur'),
(1211, 'Yerraguntla'),
(1212, 'Yevla'),
(1213, 'Zaidpur'),
(1214, 'Zamania'),
(1215, 'Zira'),
(1216, 'Zirakpur'),
(1217, 'Zunheboto');

-- --------------------------------------------------------

--
-- Table structure for table `coder`
--

CREATE TABLE `coder` (
  `id` int(11) NOT NULL,
  `first` varchar(256) NOT NULL,
  `last` varchar(256) NOT NULL,
  `college` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `course` varchar(256) NOT NULL,
  `field` varchar(40) NOT NULL,
  `lang` varchar(128) NOT NULL,
  `github` varchar(2048) NOT NULL,
  `previous` varchar(2048) NOT NULL,
  `resume` varchar(8192) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coder`
--

INSERT INTO `coder` (`id`, `first`, `last`, `college`, `email`, `contact`, `course`, `field`, `lang`, `github`, `previous`, `resume`) VALUES
(1, 'bhavya', 'haria', 'sakec', 'jnj@shbs.com', '9619305482', 'ak;j', 'ojewnjf', 'jq', 'dkwq', 'dqwknd', ''),
(2, 'Bhavya', 'Haria', 'SAKEC', 'bhavyaharia100@gmail.com', '9619305482', 'akca', 'wlfncna ', 'wlkfmwakcakle n', 'kcfaklncnqcfwkl ', 'vklaevklav ', ''),
(3, 'Bhavya', 'Haria', 'sakec', 'bhavyaharia100@gmail.com', '9619305482', 'be', 'tech', 'python', 'http://test.bluepen.co.in/coder.php', 'http://test.bluepen.co.in/coder.php', ''),
(4, 'Bhavya', 'Haria', 'sakec', 'bhavyaharia100@gmail.com', '9619305482', 'be', 'tech', 'python', 'https://github.com/bhavya100', 'https://github.com/bhavya100', ''),
(5, 'Bhavya', 'Haria', 'SAKEC', 'bhavyaharia100@gmail.com', '9619305482', 'be', 'tech', 'python', 'https://github.com/bhavya100', 'https://github.com/bhavya100', 'Employee ER Diagram.pdf_$_Employee ER Diagram (1).pdf_$_VIKAS GADDAM RESEARCH PAPER.doc_$_'),
(6, 'Vinit', 'Savla', 'Sakec', 'vinitsavla6@gmail.com', '9174117419', 'Engineerinf', 'Software', 'Python', 'https://bluepen.co.in/', 'https://whitepocket.in/', 'Rutvi Savla Certificate.pdf_$_');

-- --------------------------------------------------------

--
-- Table structure for table `coin_orders`
--

CREATE TABLE `coin_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number_of_coins` int(11) NOT NULL,
  `order_value` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `order_placed` int(11) NOT NULL,
  `payment_tried` int(11) NOT NULL,
  `paymend_done` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comments` varchar(2048) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `reply_id` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comments`, `blog_id`, `user_id`, `date`, `reply_id`) VALUES
(1, 'a', 7, 4, '2020-05-15', 0),
(2, 'hello fellas', 7, 7, '2020-05-17', 0),
(3, 'hey guys', 7, 7, '2020-05-17', 0),
(4, 'hey guys', 7, 7, '2020-05-17', 0),
(5, 'good post', 9, 6, '2020-05-19', 0),
(6, 'test message', 9, 4, '2020-05-31', 0),
(7, 'other test message from admin', 9, 4, '2020-05-31', 0),
(8, 'Nice work', 6, 11, '2020-05-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contentwriter`
--

CREATE TABLE `contentwriter` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(2048) NOT NULL,
  `genere` varchar(256) NOT NULL,
  `lang1` varchar(64) NOT NULL,
  `lang2` varchar(64) NOT NULL,
  `college` varchar(256) NOT NULL,
  `samples` varchar(8192) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contentwriter`
--

INSERT INTO `contentwriter` (`id`, `firstname`, `lastname`, `mobile`, `email`, `address`, `genere`, `lang1`, `lang2`, `college`, `samples`) VALUES
(1, 'kaushik', 'gami', 9930284423, 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPEX,VEERA DESAI RD', 'wffeeu7', 'oiuytre', 'lkj', '', 'VEERA DESAI RD'),
(2, 'kaushik', 'gami', 9930284423, 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'wffeeu7', 'oiuytre', 'lkj', '', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD'),
(3, 'jay', 'gami', 9930284423, 'kaushikgami14221@gmail.com', 'VEERA DESAI RD', 'wffeeu7', 'oiuytre', 'lkj', '', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD'),
(4, 'kaushik', 'gami', 7977381017, 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'wffeeu7', 'oiuytre', 'lkj', '', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD'),
(5, 'kaushik', 'gami', 7977381017, 'kaushikgami123448@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'wffeeu7', 'qedwq', 'qwerty', '', 'Ironman is back'),
(6, 'kaushik', 'gami', 9930284423, 'kaushikgami214@gmail.com', '502,XANADU-C,PRATHEMESH COMPEX,VEERA DESAI RD', 'wffeeu7', 'oiuytre', 'qwerty', '', 'VEERA DESAI RD'),
(12, 'Bhavya', 'Haria', 9619305482, 'bhavyaharia100@gmail.com', 'B-42,B-002, Dayanand Society\r\nOpp. Lifeline Hospital, Gokuldham\r\nGoregaon (East)', 'mix', 'hindi', 'urdu', 'hb', 'Invoice.pdf_$_Hostinger Receipt.pdf_$_ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_'),
(13, 'Vinit', 'Savla', 9892251891, 'vinitsavla6@gmail.com', 'Ghatkopar', 'Literature,English,informative', 'English', 'Hindi', 'Sakec', 'PicsArt_08-10-10.28.26.jpg_$_ZRESULT_DISP_MU_8056.pdf_$_IT ACT 2000.pdf 1.pdf_$_');

-- --------------------------------------------------------

--
-- Table structure for table `contentwriting`
--

CREATE TABLE `contentwriting` (
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_title` varchar(128) NOT NULL,
  `word_count` varchar(20) NOT NULL,
  `content_desc` varchar(8192) NOT NULL,
  `submission_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `soa_assigned` tinyint(4) NOT NULL,
  `soa_written` tinyint(4) NOT NULL,
  `soa_paid` tinyint(4) NOT NULL,
  `soa_completed` tinyint(4) NOT NULL,
  `filename` varchar(2048) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contentwriting`
--

INSERT INTO `contentwriting` (`user_id`, `content_id`, `content_title`, `word_count`, `content_desc`, `submission_datetime`, `delivery_date`, `amount`, `soa_assigned`, `soa_written`, `soa_paid`, `soa_completed`, `filename`) VALUES
(7, 1, 'jwcdbsdb', '', 'hsqoef', '2020-05-21 15:18:07', '2020-05-16', 0, 1, 1, 1, 1, ''),
(7, 2, 'jwcdbsdb', '', 'juguiusw', '2020-05-21 15:29:56', '2020-05-16', 0, 1, 0, 1, 0, ''),
(7, 3, 'jwcdbsdb', '', 'kSCNADC;', '2020-05-16 15:22:01', '2020-05-19', 0, 0, 0, 0, 0, ''),
(8, 6, 'jwcdbsdb', '', 'Ironman is back\r\n', '2020-05-23 10:28:49', '2020-06-01', 0, 0, 0, 0, 0, ''),
(7, 5, 'jwcdbsdb', '', 'xffxc', '2020-05-18 03:05:42', '2020-05-21', 0, 0, 0, 0, 0, ''),
(8, 7, 'saxsd', '400-600 words', 'dazxcdsv', '2020-05-25 14:52:21', '2020-06-01', 0, 0, 0, 0, 0, ''),
(11, 8, 'Fitness', '400-600 words', 'Male and female both', '2020-05-31 07:33:39', '2020-06-03', 0, 0, 0, 0, 0, ''),
(15, 9, 'Love', '400 words', 'something good about love', '2020-06-02 06:15:56', '2020-06-12', 0, 0, 0, 0, 0, ''),
(17, 10, 'Finance', '800-1200 words', 'Essay of 1700 words on finance with 15% less plagiarism', '2020-10-10 10:35:42', '2020-10-22', 650, 0, 0, 0, 0, ''),
(21, 11, 'Finance', '800-1200 words', 'Rtyuu', '2021-01-14 17:30:03', '2021-01-17', 650, 0, 0, 0, 0, ''),
(16, 12, 'kmklcm', '800-1200 words', 'fewnwvwefewlknf w', '2021-02-24 10:27:28', '2021-03-02', 650, 0, 0, 0, 0, 'ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_'),
(16, 13, 'scjnskjcns', '400 words', 'wjdnkjnckjvnkjvkjvkjwvn ', '2021-02-24 10:30:27', '2021-03-07', 300, 0, 0, 0, 0, 'ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_'),
(16, 14, 'Fdss', '800-1200 words', 'Ffyfadsagjgdydz', '2021-03-02 03:34:25', '2021-03-12', 650, 0, 0, 0, 0, '38_Bhavya Haria.pdf_$_dlda assignment.docx_$_Screenshot_2021-03-02-08-30-53-756_com.linkedin.android.png_$_IMG-20210302-WA0000.jpg_$_'),
(16, 15, 'Supply Chain Management', '800-1200 words', 'Baadme fir kabhi', '2021-03-13 13:39:04', '2021-03-17', 650, 0, 0, 0, 0, 'Access to justice-2.pdf_$_'),
(26, 16, 'Political science', '600-800 words', 'Reflection paper to be written', '2021-04-12 14:13:12', '2021-04-16', 500, 0, 0, 0, 0, 'Annual-Report-for-the-year-2015-16.pdf_$_CamScanner 12-01-2020 21.02.35.pdf_$_Certificate for Rutvi Savla for %22Feed back form for E-Talk  ...%22.pdf_$_Rutvi Savla Certificate.pdf_$_');

-- --------------------------------------------------------

--
-- Table structure for table `dump_assignment`
--

CREATE TABLE `dump_assignment` (
  `id` int(11) NOT NULL,
  `ass_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `stream` tinyint(4) NOT NULL,
  `course` text NOT NULL,
  `assignment type` text NOT NULL,
  `assignment_level` text NOT NULL,
  `subject_tags` text NOT NULL,
  `deadline` date NOT NULL,
  `time` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `date_time_of_delete` datetime NOT NULL,
  `budget` text NOT NULL,
  `filename` text NOT NULL,
  `project_manager` text DEFAULT NULL,
  `freelancer` text DEFAULT NULL,
  `posted` tinyint(1) NOT NULL,
  `under_process` tinyint(1) NOT NULL,
  `assigned_to_pm` tinyint(1) NOT NULL,
  `assigned_to_freelancer` tinyint(1) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `review_recieved` tinyint(1) NOT NULL,
  `lost` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dump_copypaste`
--

CREATE TABLE `dump_copypaste` (
  `dump_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `file_name` text DEFAULT NULL,
  `ink_color` varchar(5) NOT NULL,
  `submission_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` date NOT NULL,
  `date_time_of_delete` datetime NOT NULL DEFAULT current_timestamp(),
  `time` text NOT NULL,
  `copy` varchar(128) NOT NULL,
  `sheets` varchar(128) NOT NULL,
  `instructions` varchar(4096) NOT NULL,
  `amount` int(11) NOT NULL,
  `soa_assigned` tinyint(1) DEFAULT 0,
  `soa_written` tinyint(1) DEFAULT 0,
  `soa_paid` tinyint(1) DEFAULT 0,
  `soa_completed` tinyint(1) DEFAULT 0,
  `posted` tinyint(1) DEFAULT NULL,
  `writingmanager` text DEFAULT NULL,
  `writer` text DEFAULT NULL,
  `under_process` tinyint(1) NOT NULL,
  `assigned_to_pm` tinyint(1) NOT NULL,
  `assigned_to_freelancer` tinyint(1) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `review_recieved` tinyint(1) NOT NULL,
  `lost` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dump_freelancer`
--

CREATE TABLE `dump_freelancer` (
  `dump_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL,
  `country` text NOT NULL,
  `mobile_number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `address` text NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postalcode` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `date_time_of_delete` datetime NOT NULL DEFAULT current_timestamp(),
  `domain` tinyint(4) NOT NULL,
  `subject_tags` text NOT NULL,
  `assignment_type` text NOT NULL,
  `qualification` text NOT NULL,
  `working_hours` text NOT NULL,
  `past_experience` text NOT NULL,
  `past_work` text NOT NULL,
  `work_links` text NOT NULL,
  `linkedin` text NOT NULL,
  `freelance_experience` text NOT NULL,
  `resume` text NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `number_of_assignments` text DEFAULT NULL,
  `level` text DEFAULT NULL,
  `form_filled` tinyint(4) DEFAULT 1,
  `interview_conducted` tinyint(4) NOT NULL DEFAULT 0,
  `send_agreement` tinyint(4) NOT NULL DEFAULT 0,
  `agreement_received` tinyint(4) NOT NULL DEFAULT 0,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dump_jobs`
--

CREATE TABLE `dump_jobs` (
  `user_id` int(11) NOT NULL,
  `submission_date` varchar(264) NOT NULL,
  `delivery_date` varchar(264) NOT NULL,
  `amount` int(11) NOT NULL,
  `category` varchar(264) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `dump_jobs`
--

INSERT INTO `dump_jobs` (`user_id`, `submission_date`, `delivery_date`, `amount`, `category`) VALUES
(7, '2020-05-19 20:29:20', '2020-05-16', 0, 'contentwriting'),
(2, '2020-04-24 20:06:15', '2020-04-27', 0, 'assignments'),
(8, '2020-05-21 12:11:33', '2020-06-02', 66, 'assignments'),
(8, '2020-05-21 16:36:41', '2020-06-01', 36, 'assignments'),
(7, '2020-05-16 20:56:20', '2020-05-19', 0, 'contentwriting'),
(8, '2020-05-23 18:16:07', '2020-06-01', 0, 'typing'),
(12, '2020-05-31 14:18:54', '2020-06-11', 12, 'assignments'),
(13, '2020-06-01 12:48:24', '2020-06-12', 6, 'assignments'),
(10, '2020-05-31 12:50:41', '2020-06-10', 12, 'assignments'),
(10, '2020-05-31 12:50:17', '2020-06-10', 12, 'assignments'),
(10, '2020-05-31 12:41:58', '2020-06-11', 12, 'assignments'),
(7, '2020-05-19 20:29:20', '2020-05-16', 0, 'contentwriting'),
(2, '2020-04-24 20:06:15', '2020-04-27', 0, 'assignments'),
(8, '2020-05-21 12:11:33', '2020-06-02', 66, 'assignments'),
(8, '2020-05-21 16:36:41', '2020-06-01', 36, 'assignments'),
(7, '2020-05-16 20:56:20', '2020-05-19', 0, 'contentwriting'),
(8, '2020-05-23 18:16:07', '2020-06-01', 0, 'typing'),
(7, '2020-05-19 20:29:20', '2020-05-16', 0, 'contentwriting'),
(2, '2020-04-24 20:06:15', '2020-04-27', 0, 'assignments'),
(8, '2020-05-21 12:11:33', '2020-06-02', 66, 'assignments'),
(8, '2020-05-21 16:36:41', '2020-06-01', 36, 'assignments'),
(7, '2020-05-16 20:56:20', '2020-05-19', 0, 'contentwriting'),
(8, '2020-05-23 18:16:07', '2020-06-01', 0, 'typing'),
(7, '2020-05-19 20:29:20', '2020-05-16', 0, 'contentwriting'),
(2, '2020-04-24 20:06:15', '2020-04-27', 0, 'assignments'),
(8, '2020-05-21 12:11:33', '2020-06-02', 66, 'assignments'),
(8, '2020-05-21 16:36:41', '2020-06-01', 36, 'assignments'),
(7, '2020-05-16 20:56:20', '2020-05-19', 0, 'contentwriting'),
(8, '2020-05-23 18:16:07', '2020-06-01', 0, 'typing'),
(7, '2020-09-24 10:38:11', '2020-09-16', 0, 'PPT'),
(6, '2020-04-28 18:48:56', '2020-05-05', 894, 'assignments'),
(7, '2020-09-11 22:21:45', '2020-09-18', 0, 'Blackbook'),
(7, '2020-09-08 11:02:20', '2020-09-10', 1012, 'PPT'),
(7, '2020-09-07 03:58:32', '2020-09-11', 894, 'Translation'),
(7, '2020-05-19 20:29:20', '2020-05-16', 0, 'contentwriting'),
(2, '2020-04-24 20:06:15', '2020-04-27', 0, 'assignments'),
(8, '2020-05-21 12:11:33', '2020-06-02', 66, 'assignments'),
(8, '2020-05-21 16:36:41', '2020-06-01', 36, 'assignments'),
(7, '2020-05-16 20:56:20', '2020-05-19', 0, 'contentwriting'),
(8, '2020-05-23 18:16:07', '2020-06-01', 0, 'typing'),
(7, '2020-05-19 20:29:20', '2020-05-16', 0, 'contentwriting'),
(2, '2020-04-24 20:06:15', '2020-04-27', 0, 'assignments'),
(8, '2020-05-21 12:11:33', '2020-06-02', 66, 'assignments'),
(8, '2020-05-21 16:36:41', '2020-06-01', 36, 'assignments'),
(7, '2020-05-16 20:56:20', '2020-05-19', 0, 'contentwriting'),
(8, '2020-05-23 18:16:07', '2020-06-01', 0, 'typing'),
(7, '2020-05-19 20:29:20', '2020-05-16', 0, 'contentwriting'),
(2, '2020-04-24 20:06:15', '2020-04-27', 0, 'assignments'),
(8, '2020-05-21 12:11:33', '2020-06-02', 66, 'assignments'),
(8, '2020-05-21 16:36:41', '2020-06-01', 36, 'assignments'),
(7, '2020-05-16 20:56:20', '2020-05-19', 0, 'contentwriting'),
(8, '2020-05-23 18:16:07', '2020-06-01', 0, 'typing'),
(7, '2020-09-24 10:38:11', '2020-09-16', 0, 'PPT'),
(6, '2020-04-28 18:48:56', '2020-05-05', 894, 'assignments'),
(7, '2020-09-11 22:21:45', '2020-09-18', 0, 'Blackbook'),
(7, '2020-09-08 11:02:20', '2020-09-10', 1012, 'PPT'),
(7, '2020-09-07 03:58:32', '2020-09-11', 894, 'Translation'),
(7, '2020-05-19 20:29:20', '2020-05-16', 0, 'contentwriting'),
(2, '2020-04-24 20:06:15', '2020-04-27', 0, 'assignments'),
(8, '2020-05-21 12:11:33', '2020-06-02', 66, 'assignments'),
(8, '2020-05-21 16:36:41', '2020-06-01', 36, 'assignments'),
(7, '2020-05-16 20:56:20', '2020-05-19', 0, 'contentwriting'),
(8, '2020-05-23 18:16:07', '2020-06-01', 0, 'typing'),
(7, '2020-05-19 20:29:20', '2020-05-16', 0, 'contentwriting'),
(2, '2020-04-24 20:06:15', '2020-04-27', 0, 'assignments'),
(8, '2020-05-21 12:11:33', '2020-06-02', 66, 'assignments'),
(8, '2020-05-21 16:36:41', '2020-06-01', 36, 'assignments'),
(7, '2020-05-16 20:56:20', '2020-05-19', 0, 'contentwriting'),
(8, '2020-05-23 18:16:07', '2020-06-01', 0, 'typing'),
(7, '2020-05-19 20:29:20', '2020-05-16', 0, 'contentwriting'),
(2, '2020-04-24 20:06:15', '2020-04-27', 0, 'assignments'),
(8, '2020-05-21 12:11:33', '2020-06-02', 66, 'assignments'),
(8, '2020-05-21 16:36:41', '2020-06-01', 36, 'assignments'),
(7, '2020-05-16 20:56:20', '2020-05-19', 0, 'contentwriting'),
(8, '2020-05-23 18:16:07', '2020-06-01', 0, 'typing'),
(7, '2020-09-24 10:38:11', '2020-09-16', 0, 'PPT'),
(6, '2020-04-28 18:48:56', '2020-05-05', 894, 'assignments'),
(7, '2020-09-11 22:21:45', '2020-09-18', 0, 'Blackbook'),
(7, '2020-09-08 11:02:20', '2020-09-10', 1012, 'PPT'),
(7, '2020-09-07 03:58:32', '2020-09-11', 894, 'Translation'),
(7, '2020-05-19 20:29:20', '2020-05-16', 0, 'contentwriting'),
(2, '2020-04-24 20:06:15', '2020-04-27', 0, 'assignments'),
(8, '2020-05-21 12:11:33', '2020-06-02', 66, 'assignments'),
(8, '2020-05-21 16:36:41', '2020-06-01', 36, 'assignments'),
(7, '2020-05-16 20:56:20', '2020-05-19', 0, 'contentwriting'),
(8, '2020-05-23 18:16:07', '2020-06-01', 0, 'typing');

-- --------------------------------------------------------

--
-- Table structure for table `dump_writer`
--

CREATE TABLE `dump_writer` (
  `id` int(11) NOT NULL,
  `name` varchar(264) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(264) NOT NULL,
  `address` varchar(264) NOT NULL,
  `category` varchar(264) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `dump_writer`
--

INSERT INTO `dump_writer` (`id`, `name`, `mobile`, `email`, `address`, `category`) VALUES
(15, 'Bhavya Haria', '0', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(18, 'kaushik gami', '2147483647', 'kaushikgami14823@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(2, 'kaushik gami', '2147483647', 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'contentwriter'),
(19, 'kaushik gami', '2147483647', 'kaushikgami1438@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(4, 'kaushik gami', '7977381017', 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'contentwriter'),
(16, 'karan patil', '8169157715', 'karan2000apatil@gmail.com', 'B/115,SURYAKUND CHS MAHAPURUSH MANDIR MARG\r\nMAZGAON', 'writer'),
(20, 'kaushik gami', '9930284423', 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'writer'),
(15, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(20, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'B-42,B-002, Dayanand Society, Opp. Lifeline Hospital, Gokuldham, Goregaon (East)', 'writer'),
(15, 'Bhavya Haria', '0', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(18, 'kaushik gami', '2147483647', 'kaushikgami14823@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(2, 'kaushik gami', '2147483647', 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'contentwriter'),
(19, 'kaushik gami', '2147483647', 'kaushikgami1438@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(4, 'kaushik gami', '7977381017', 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'contentwriter'),
(16, 'karan patil', '8169157715', 'karan2000apatil@gmail.com', 'B/115,SURYAKUND CHS MAHAPURUSH MANDIR MARG\r\nMAZGAON', 'writer'),
(20, 'kaushik gami', '9930284423', 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'writer'),
(15, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(15, 'Bhavya Haria', '0', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(18, 'kaushik gami', '2147483647', 'kaushikgami14823@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(2, 'kaushik gami', '2147483647', 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'contentwriter'),
(19, 'kaushik gami', '2147483647', 'kaushikgami1438@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(4, 'kaushik gami', '7977381017', 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'contentwriter'),
(16, 'karan patil', '8169157715', 'karan2000apatil@gmail.com', 'B/115,SURYAKUND CHS MAHAPURUSH MANDIR MARG\r\nMAZGAON', 'writer'),
(20, 'kaushik gami', '9930284423', 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'writer'),
(15, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(15, 'Bhavya Haria', '0', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(18, 'kaushik gami', '2147483647', 'kaushikgami14823@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(2, 'kaushik gami', '2147483647', 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'contentwriter'),
(19, 'kaushik gami', '2147483647', 'kaushikgami1438@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(4, 'kaushik gami', '7977381017', 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'contentwriter'),
(16, 'karan patil', '8169157715', 'karan2000apatil@gmail.com', 'B/115,SURYAKUND CHS MAHAPURUSH MANDIR MARG\r\nMAZGAON', 'writer'),
(20, 'kaushik gami', '9930284423', 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'writer'),
(15, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(15, 'Bhavya Haria', '0', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(18, 'kaushik gami', '2147483647', 'kaushikgami14823@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(2, 'kaushik gami', '2147483647', 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'contentwriter'),
(19, 'kaushik gami', '2147483647', 'kaushikgami1438@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(4, 'kaushik gami', '7977381017', 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'contentwriter'),
(16, 'karan patil', '8169157715', 'karan2000apatil@gmail.com', 'B/115,SURYAKUND CHS MAHAPURUSH MANDIR MARG\r\nMAZGAON', 'writer'),
(20, 'kaushik gami', '9930284423', 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'writer'),
(15, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(15, 'Bhavya Haria', '0', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(18, 'kaushik gami', '2147483647', 'kaushikgami14823@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(2, 'kaushik gami', '2147483647', 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'contentwriter'),
(19, 'kaushik gami', '2147483647', 'kaushikgami1438@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(4, 'kaushik gami', '7977381017', 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'contentwriter'),
(16, 'karan patil', '8169157715', 'karan2000apatil@gmail.com', 'B/115,SURYAKUND CHS MAHAPURUSH MANDIR MARG\r\nMAZGAON', 'writer'),
(20, 'kaushik gami', '9930284423', 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'writer'),
(15, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(15, 'Bhavya Haria', '0', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(18, 'kaushik gami', '2147483647', 'kaushikgami14823@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(2, 'kaushik gami', '2147483647', 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'contentwriter'),
(19, 'kaushik gami', '2147483647', 'kaushikgami1438@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(4, 'kaushik gami', '7977381017', 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'contentwriter'),
(16, 'karan patil', '8169157715', 'karan2000apatil@gmail.com', 'B/115,SURYAKUND CHS MAHAPURUSH MANDIR MARG\r\nMAZGAON', 'writer'),
(20, 'kaushik gami', '9930284423', 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'writer'),
(15, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(15, 'Bhavya Haria', '0', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(18, 'kaushik gami', '2147483647', 'kaushikgami14823@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(2, 'kaushik gami', '2147483647', 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'contentwriter'),
(19, 'kaushik gami', '2147483647', 'kaushikgami1438@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(4, 'kaushik gami', '7977381017', 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'contentwriter'),
(16, 'karan patil', '8169157715', 'karan2000apatil@gmail.com', 'B/115,SURYAKUND CHS MAHAPURUSH MANDIR MARG\r\nMAZGAON', 'writer'),
(20, 'kaushik gami', '9930284423', 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'writer'),
(15, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(15, 'Bhavya Haria', '0', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(18, 'kaushik gami', '2147483647', 'kaushikgami14823@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(2, 'kaushik gami', '2147483647', 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'contentwriter'),
(19, 'kaushik gami', '2147483647', 'kaushikgami1438@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(4, 'kaushik gami', '7977381017', 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'contentwriter'),
(16, 'karan patil', '8169157715', 'karan2000apatil@gmail.com', 'B/115,SURYAKUND CHS MAHAPURUSH MANDIR MARG\r\nMAZGAON', 'writer'),
(20, 'kaushik gami', '9930284423', 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'writer'),
(15, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(15, 'Bhavya Haria', '0', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(18, 'kaushik gami', '2147483647', 'kaushikgami14823@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(2, 'kaushik gami', '2147483647', 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'contentwriter'),
(19, 'kaushik gami', '2147483647', 'kaushikgami1438@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(4, 'kaushik gami', '7977381017', 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'contentwriter'),
(16, 'karan patil', '8169157715', 'karan2000apatil@gmail.com', 'B/115,SURYAKUND CHS MAHAPURUSH MANDIR MARG\r\nMAZGAON', 'writer'),
(20, 'kaushik gami', '9930284423', 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'writer'),
(15, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(15, 'Bhavya Haria', '0', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(18, 'kaushik gami', '2147483647', 'kaushikgami14823@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(2, 'kaushik gami', '2147483647', 'kaushikgami1456@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'contentwriter'),
(19, 'kaushik gami', '2147483647', 'kaushikgami1438@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'writer'),
(4, 'kaushik gami', '7977381017', 'kaushikgami148@gmail.com', 'Mahavir Education Trust Chowk\r\nW.T Patil Marg', 'contentwriter'),
(16, 'karan patil', '8169157715', 'karan2000apatil@gmail.com', 'B/115,SURYAKUND CHS MAHAPURUSH MANDIR MARG\r\nMAZGAON', 'writer'),
(20, 'kaushik gami', '9930284423', 'kaushikgami14@gmail.com', '502,XANADU-C,PRATHEMESH COMPLEX\r\nVEERA DESAI RD', 'writer'),
(15, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'address', 'writer'),
(9, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'B-42,B-002, Dayanand Society, Opp. Lifeline Hospital, Gokuldham, Goregaon (East)', 'contentwriter'),
(10, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'B-42,B-002, Dayanand Society\r\nOpp. Lifeline Hospital, Gokuldham\r\nGoregaon (East)', 'contentwriter'),
(11, 'Bhavya Haria', '9619305482', 'bhavyaharia100@gmail.com', 'B-42,B-002, Dayanand Society\r\nOpp. Lifeline Hospital, Gokuldham\r\nGoregaon (East)', 'contentwriter');

-- --------------------------------------------------------

--
-- Table structure for table `dump_writers`
--

CREATE TABLE `dump_writers` (
  `dump_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `country` text NOT NULL,
  `mobile_number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `file` text NOT NULL,
  `password` text DEFAULT NULL,
  `address` varchar(2048) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postalcode` text NOT NULL,
  `college` varchar(256) DEFAULT NULL,
  `date_of_submission` text NOT NULL,
  `approval` tinyint(1) NOT NULL,
  `amount` float NOT NULL,
  `date_time_of_delete` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_otp`
--

CREATE TABLE `email_otp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `otp` int(11) NOT NULL,
  `generation` datetime NOT NULL,
  `expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `email_otp`
--

INSERT INTO `email_otp` (`id`, `user_id`, `email`, `otp`, `generation`, `expiry`) VALUES
(1, 0, 'bhavyaharia100@gmail.com', 2492, '2022-09-02 02:48:56', '2022-09-02 02:53:56'),
(2, 0, 'bhavyaharia100@gmail.com', 2263, '2022-09-02 02:55:57', '2022-09-02 03:00:57'),
(3, 0, 'bhavyaharia100@gmail.com', 9197, '2022-09-02 02:56:04', '2022-09-02 03:01:04'),
(4, 0, 'bhavyaharia100@gmail.com', 7705, '2022-09-02 03:26:39', '2022-09-02 03:31:39'),
(5, 0, 'kaushikiyengar1998@gmail.com', 7951, '2022-09-02 03:33:23', '2022-09-02 03:38:23'),
(6, 0, 'bhavyaharia100@gmail.com', 9090, '2022-09-02 03:43:52', '2022-09-02 03:48:52'),
(7, 0, 'bhavyaharia100@gmail.com', 3568, '2022-09-02 03:46:39', '2022-09-02 03:51:39'),
(8, 0, 'bhavyaharia100@gmail.com', 4473, '2022-09-02 03:47:34', '2022-09-02 03:52:34'),
(9, 0, 'bhavyaharia100@gmail.com', 1895, '2022-09-02 03:48:59', '2022-09-02 03:53:59'),
(10, 0, 'bhavyaharia100@gmail.com', 7875, '2022-09-02 16:24:51', '2022-09-02 16:29:51'),
(11, 0, 'bhavyaharia100@gmail.com', 4118, '2022-09-02 16:30:36', '2022-09-02 16:35:36'),
(12, 0, 'kaushikiyengar1998@gmail.com', 1814, '2022-09-02 16:32:13', '2022-09-02 16:37:13'),
(13, 0, 'kaushikiyengar1998@gmail.com', 7338, '2022-09-02 16:34:29', '2022-09-02 16:39:29'),
(14, 0, 'bhavyaharia100@gmail.com', 4751, '2022-09-05 16:21:32', '2022-09-05 16:26:32'),
(15, 0, 'bhavyaharia100@gmail.com', 2781, '2022-09-05 16:51:27', '2022-09-05 16:56:27'),
(16, 0, 'bhavyaharia100@gmail.com', 4141, '2022-09-05 16:54:44', '2022-09-05 16:59:44'),
(17, 0, 'bluepenassign@gmail.com', 9460, '2022-09-06 19:30:25', '2022-09-06 19:35:25'),
(18, 0, 'bluepenassign@gmail.com', 3354, '2022-09-06 19:40:51', '2022-09-06 19:45:51'),
(19, 0, 'bluepenassign@gmail.com', 7451, '2022-09-06 19:44:18', '2022-09-06 19:49:18'),
(20, 0, 'bluepenassign@gmail.com', 8307, '2022-09-06 19:46:58', '2022-09-06 19:51:58'),
(21, 0, 'bluepenassign@gmail.com', 7965, '2022-09-06 19:51:59', '2022-09-06 19:56:59'),
(22, 0, 'fitnessappbe@gmail.com', 1356, '2022-09-07 12:47:00', '2022-09-07 12:52:00'),
(23, 0, 'bhavyaharia100@gmail.com', 4339, '2022-12-22 18:52:29', '2022-12-22 18:57:29'),
(24, 0, 'vinitsavla6@gmail.com', 7357, '2022-12-23 11:37:25', '2022-12-23 11:42:25'),
(25, 0, 'kaushikiyengar1998@gmail.com', 2028, '2022-12-26 18:14:19', '2022-12-26 18:19:19'),
(26, 0, 'kaushik.iyengar@sakec.ac.in', 6315, '2022-12-26 18:20:46', '2022-12-26 18:25:46'),
(27, 0, 'kaushik.iyengar@sakec.ac.in', 1734, '2022-12-26 18:23:06', '2022-12-26 18:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `freelance`
--

CREATE TABLE `freelance` (
  `freelancer_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL,
  `country` text NOT NULL,
  `mobile_number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `address` text NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postalcode` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `domain` tinyint(1) NOT NULL,
  `subject_tags` text NOT NULL,
  `assignment_type` text NOT NULL,
  `qualification` text NOT NULL,
  `working_hours` text NOT NULL,
  `past_experience` text NOT NULL,
  `past_work` text NOT NULL,
  `work_links` text NOT NULL,
  `linkedin` text NOT NULL,
  `freelance_experience` text NOT NULL,
  `resume` text NOT NULL,
  `approved` text NOT NULL,
  `number_of_assignments` text NOT NULL,
  `level` text NOT NULL,
  `form_filled` tinyint(1) NOT NULL DEFAULT 1,
  `interview_conducted` tinyint(1) NOT NULL DEFAULT 0,
  `send_agreement` tinyint(1) NOT NULL DEFAULT 0,
  `agreement_received` tinyint(1) NOT NULL DEFAULT 0,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `freelance`
--

INSERT INTO `freelance` (`freelancer_id`, `firstname`, `lastname`, `email`, `gender`, `country`, `mobile_number`, `whatsapp_number`, `address`, `street`, `city`, `state`, `postalcode`, `date_of_submission`, `domain`, `subject_tags`, `assignment_type`, `qualification`, `working_hours`, `past_experience`, `past_work`, `work_links`, `linkedin`, `freelance_experience`, `resume`, `approved`, `number_of_assignments`, `level`, `form_filled`, `interview_conducted`, `send_agreement`, `agreement_received`, `password`) VALUES
(1, 'bhavya', 'haria', 'bhavyaharia1002@gmail.com', 'Male', 'India (à¤­à¤¾à¤°à¤¤)', '91-9619305482', '9619305482', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, ''),
(2, 'bhavya', 'haria', 'bhavyaharia1001@gmail.com', 'Male', 'India (à¤­à¤¾à¤°à¤¤)', '91-9619305482', '9619305482', 'gokuldham', 'marg', 'mumbai', 'maha', '400063', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, ''),
(3, 'bhavya', 'haria', 'bhavyaharia1000@gmail.com', 'Male', 'India (à¤­à¤¾à¤°à¤¤)', '91-9619305482', '9619305482', 'gokuldham', 'vaidya marg', 'mumbai', 'maharashtra', '400063', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, 0, ''),
(4, 'bhavya', 'haria', 'bhavyaharia1003@gmail.com', 'Male', 'India (à¤­à¤¾à¤°à¤¤)', '91-9619305482', '9619305482', 'gokuldham', 'Vaidya marg', 'mumbai', 'maha', '400063', '2022-09-06 00:13:36', 1, '[\"Commercial Application,Finance,Finance & Management Accounting\"]', '[\"Essay Writing\",\"Report Writing\",\"Literature Review\",\"Blackbook\",\"Research Paper\",\"Primary / Secondary Data Analysis\",\"Review Article\",\"Thesis Writing\",\"Dissertation Writing\",\"PPT Making\",\"Engineering Drawing\",\"Question and Answer Based\",\"Statement of Purpose\"]', 'master', '24*7', 'lots', 'Storytelling App.pdf_$_', 'https://test.bluepen.co.in/freelance.php', 'http://linkedin.com', 'asjnskjdnkjsn', 'Campus Ambassador Posting (1).pdf_$_', '0', '0', '0', 1, 0, 0, 0, ''),
(5, 'bhavya', 'haria', 'bhavyaharia100@gmail.com', 'Male', 'India (à¤­à¤¾à¤°à¤¤)', '91-9619305482', '08123456789', 'Gokuldham', 'vaidya marg', 'mumbai', 'maha', '400063', '2022-09-06 00:27:25', 1, '[\"Finance\",\"Finance and Economics\",\"Marketing\",\"Marketing Analysis\",\"Marketing Analytics\",\"Marketing Communication\",\"Marketing and Human Resource Management\",\"Marketing and sales\",\"Marketing channel management\"]', '[\"Essay Writing\",\"Report Writing\",\"Literature Review\",\"Blackbook\",\"Research Paper\",\"Primary / Secondary Data Analysis\",\"Review Article\",\"Thesis Writing\",\"Dissertation Writing\",\"PPT Making\",\"Case Studies\",\"Question and Answer Based\",\"Statement of Purpose\",\"Other\"]', 'masters', '24*7*365', 'bohot jyaada', 'Campus Ambassador Posting (1).pdf_$_', 'http://bluepen.co.in', 'http://linkedin.com', 'fbnfkbnkjbnkdjlnbdkjlbn', 'Storytelling App.pdf_$_', '1', '0', '0', 1, 1, 1, 1, '$2y$10$CC74W9MtGBJ/DM.kz/.Xqu4I/vr.DD.sMm6Fb4EelPQ2xFH/KB7b2');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_comments`
--

CREATE TABLE `freelancer_comments` (
  `id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `comment` text NOT NULL,
  `commenter` text NOT NULL,
  `commented_on` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_eligible`
--

CREATE TABLE `freelancer_eligible` (
  `id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `number_of_assignments` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `made_on` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_reward_claims`
--

CREATE TABLE `freelancer_reward_claims` (
  `id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `number_of_assignments` int(11) NOT NULL,
  `claim_datetime` datetime NOT NULL,
  `claimed` int(11) NOT NULL,
  `sent` int(11) NOT NULL DEFAULT 0,
  `received` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_update`
--

CREATE TABLE `freelancer_update` (
  `id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `field` text NOT NULL,
  `value` text NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `freelancer_update`
--

INSERT INTO `freelancer_update` (`id`, `freelancer_id`, `field`, `value`, `updated_on`) VALUES
(1, 5, 'firstname', 'bhavya', '2022-09-06 01:18:37'),
(2, 5, 'lastname', 'haria', '2022-09-06 01:18:37'),
(3, 5, 'gender', 'Male', '2022-09-06 01:20:06'),
(4, 5, 'gender', 'Female', '2022-09-06 01:21:30'),
(5, 5, 'gender', 'Male', '2022-09-06 01:21:49'),
(6, 5, 'mobile_number', '91-9619305482', '2022-09-06 01:22:20'),
(7, 5, 'mobile_number', '91-08123456789', '2022-09-06 01:23:19'),
(8, 5, 'whatsapp_number', '9619305482', '2022-09-06 03:13:25'),
(9, 5, 'whatsapp_number', '08123456789', '2022-09-06 03:17:06'),
(10, 5, 'address', 'gokuldham', '2022-09-06 03:52:06'),
(11, 5, 'street', 'Vaidya marg', '2022-09-06 03:52:06'),
(12, 5, 'city', 'mumbai', '2022-09-06 03:52:06'),
(13, 5, 'state', 'maha', '2022-09-06 03:52:06'),
(14, 5, 'postalcode', '400063', '2022-09-06 03:52:06'),
(15, 5, 'address', 'gokuldham', '2022-09-06 03:57:36'),
(16, 5, 'street', 'Vaidya marg', '2022-09-06 03:57:36'),
(17, 5, 'city', 'bambai', '2022-09-06 03:57:36'),
(18, 5, 'state', 'maharashtra', '2022-09-06 03:57:36'),
(19, 5, 'postalcode', '400087', '2022-09-06 03:57:36'),
(20, 5, 'subject_tags', '[\"Finance,Finance and Economics,Marketing,Marketing Analysis,Marketing Analytics\"]', '2022-09-06 03:58:06'),
(21, 5, 'subject_tags', '[\"Finance\",\"Finance and Economics\",\"Marketing\",\"Marketing Analysis\",\"Marketing Analytics\",\"Marketing Communication\"]', '2022-09-06 03:59:16'),
(22, 5, 'subject_tags', '[\"Finance\",\"Finance and Economics\",\"Marketing\",\"Marketing Analysis\",\"Marketing Analytics\",\"Marketing Communication\",\"Marketing and Human Resource Management\"]', '2022-09-06 03:59:54'),
(23, 5, 'subject_tags', '[\"Finance\",\"Finance and Economics\",\"Marketing\",\"Marketing Analysis\",\"Marketing Analytics\",\"Marketing Communication\",\"Marketing and Human Resource Management\",\"Marketing and sales\"]', '2022-09-06 04:00:39'),
(24, 5, 'assignment type', '[\"Essay Writing\",\"Report Writing\",\"Literature Review\",\"Blackbook\",\"Research Paper\",\"Primary / Secondary Data Analysis\",\"Review Article\",\"Thesis Writing\",\"Dissertation Writing\",\"PPT Making\",\"Case Studies\",\"Question and Answer Based\",\"Statement of Purpose\"]', '2022-09-06 04:01:11'),
(25, 5, 'assignment type', '[\"Essay Writing\",\"Report Writing\",\"Literature Review\",\"Blackbook\",\"Research Paper\",\"Primary / Secondary Data Analysis\",\"Review Article\",\"Thesis Writing\",\"Dissertation Writing\",\"PPT Making\",\"Case Studies\",\"Question and Answer Based\",\"Statement of Purpose\",\"Other\"]', '2022-09-06 04:02:06'),
(26, 5, 'assignment type', '[\"Essay Writing\",\"Report Writing\",\"Literature Review\",\"Blackbook\",\"Research Paper\",\"Primary / Secondary Data Analysis\",\"Review Article\",\"Thesis Writing\",\"Dissertation Writing\",\"PPT Making\",\"Case Studies\",\"Question and Answer Based\"]', '2022-09-06 04:02:29'),
(27, 5, 'qualification', 'master', '2022-09-06 04:02:55'),
(28, 5, 'qualification', 'phd', '2022-09-06 04:03:35'),
(29, 5, 'working_hours', '24*7', '2022-09-06 04:04:35'),
(30, 5, 'past_experience', 'lots', '2022-09-06 04:05:24'),
(31, 5, 'work_links', 'https://test.bluepen.co.in/freelance.php', '2022-09-06 04:05:57'),
(32, 5, 'freelance_experience', 'mslkdfmsldklksdfm', '2022-09-06 04:06:21'),
(33, 5, 'freelance_experience', 'asdasnfkjsnfksjfnkjs', '2022-09-06 04:07:02'),
(34, 5, 'gender', 'Female', '2022-09-06 04:07:22'),
(35, 5, 'gender', 'Male', '2022-09-06 04:07:39'),
(36, 5, 'gender', 'Female', '2022-09-06 04:07:55'),
(37, 5, 'firstname', 'Bhavya', '2022-09-07 03:37:16'),
(38, 5, 'lastname', 'Haria', '2022-09-07 03:37:16'),
(39, 5, 'firstname', 'bhavya', '2022-09-07 03:41:44'),
(40, 5, 'lastname', 'haria', '2022-09-07 03:41:44'),
(41, 5, 'firstname', 'Bhavya', '2022-09-07 03:44:09'),
(42, 5, 'lastname', 'Haria', '2022-09-07 03:44:09'),
(43, 5, 'gender', 'Male', '2022-09-07 03:44:23'),
(44, 5, 'gender', 'Female', '2022-09-07 03:44:34'),
(45, 5, 'mobile_number', '91-9619305482', '2022-09-07 03:46:05'),
(46, 5, 'mobile_number', '354-9619305482', '2022-09-07 03:46:53'),
(47, 5, 'whatsapp_number', '9619305482', '2022-09-07 03:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `god`
--

CREATE TABLE `god` (
  `id` int(11) NOT NULL,
  `intern_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `old_email` text NOT NULL,
  `email` text DEFAULT NULL,
  `number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `city` text NOT NULL,
  `role` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `v2_api` text DEFAULT NULL,
  `v3_api` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `god`
--

INSERT INTO `god` (`id`, `intern_id`, `name`, `old_email`, `email`, `number`, `whatsapp_number`, `city`, `role`, `password`, `v2_api`, `v3_api`) VALUES
(1, 0, 'admin', 'admin@bluepen.com', 'admin@bluepen.com', '9619305482', '9619305482', 'mumbai', 'admin', '$2y$10$j13RHf5gbzFK0joaQqY8J.pocDRYkYUBifL6nQZJQIeRSIjax.Z76', NULL, NULL),
(2, 0, 'bhavya', 'bhavya@bluepen.com', 'bhavya@bluepen.com', '9619305482', '9619305482', 'mumbai', 'admin', '$2y$10$j13RHf5gbzFK0joaQqY8J.pocDRYkYUBifL6nQZJQIeRSIjax.Z76', NULL, NULL),
(3, 2, 'abc', 'bhavyaharia100@gmail.com', 'abc@bluepen.com', '9619305482', '9619305482', 'mumbai', 'pm', '$2y$10$1/bxTFie/q7RIBBfHhNCoO0gtPJjHd/3FXO/jRT7y6wTLCsdV1ipO', 'version 2', 'version 3');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `old_email` text NOT NULL,
  `email` text NOT NULL,
  `number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `role` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internbd`
--

CREATE TABLE `internbd` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL,
  `country` text NOT NULL,
  `mobile_number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `address` text NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postalcode` text NOT NULL,
  `college_name` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `worked_as_bd` text NOT NULL,
  `pr_activities` text NOT NULL,
  `revenue_generation` text NOT NULL,
  `ideas` text NOT NULL,
  `resume` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internhr`
--

CREATE TABLE `internhr` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL,
  `country` text NOT NULL,
  `mobile_number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `address` text NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postalcode` text NOT NULL,
  `college_name` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `domain` text NOT NULL,
  `rating` text NOT NULL,
  `past_experience` text NOT NULL,
  `choose` text NOT NULL,
  `resume` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internpm`
--

CREATE TABLE `internpm` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL,
  `country` text NOT NULL,
  `mobile_number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `address` text NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postalcode` text NOT NULL,
  `college_name` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `domain` text NOT NULL,
  `problem_solving` text NOT NULL,
  `commercial_projects` text NOT NULL,
  `choose` text NOT NULL,
  `resume` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internwebtech`
--

CREATE TABLE `internwebtech` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL,
  `country` text NOT NULL,
  `mobile_number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `address` text NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postalcode` text NOT NULL,
  `college_name` text NOT NULL,
  `date_of_submission` text NOT NULL,
  `worked_in_web_dev` text NOT NULL,
  `comfortable_tech_stack` text NOT NULL,
  `new_tech_stack` text NOT NULL,
  `documentation` text NOT NULL,
  `resume` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `blog_id`, `user_id`, `likes`) VALUES
(1, 9, '7,7,7,7,4', 4),
(2, 7, '7', 1),
(3, 6, '11,11,11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lost_reason`
--

CREATE TABLE `lost_reason` (
  `lost_id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lost_reason_copypaste`
--

CREATE TABLE `lost_reason_copypaste` (
  `lost_id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'jay@test.com'),
(2, 'karan2000apatil@gmail.com'),
(3, 'jayvora1499@gmail.com'),
(4, 'kalpeshrane71@gmail.com'),
(5, 'kaushik@test123.com'),
(6, 'kaushikgami1486138@gmail.com'),
(7, 'kaushikgami14668@gmail.com'),
(8, 'bhavyaharia10@gmail.com'),
(9, 'bhavyaharia100@gmail.com'),
(10, 'bhavyaharia100@gmail.com'),
(11, 'bhavyaharia100@gmail.com'),
(12, 'bhavyaharia100@gmail.com'),
(13, 'vinitsavla6@gmail.com'),
(14, 'whitepocket11@gmail.com'),
(15, 'jayshreesavla13@gmail.com'),
(16, 'bhavyaharia100@gmail.com'),
(17, 'jayshreesavla13@gmail.com'),
(18, 'jayshreesavla13@gmail.com'),
(19, 'jay.vora@sakec.ac.in'),
(20, 'kaushikgami148@gmail.com'),
(21, 'bhavyaharia10@gmail.com'),
(22, 'bhavyaharia100@gmail.com'),
(23, 'bhavyaharia100@gmail.com'),
(24, 'bhavyaharia100@gmail.com'),
(25, 'bhavyaharia100@gmail.com'),
(26, 'bhavyaharia100@gmail.com'),
(27, 'chachachaudhary@gmail.com'),
(28, 'kaushikiyengar1998@gmail.com'),
(29, 'bhavyaharia200@gmail.com'),
(30, 'vinit.savla@sakec.ac.in'),
(31, 'vinitsavla6@gmail.com'),
(32, 'vinitsavla123@yahoo.com'),
(33, 'rasiksavla2610@gmail.com'),
(34, 'jindalsimran123@gmail.com'),
(35, 'krutik.patel@sakec.ac.in'),
(36, 'bhavyaharia100@gmail.com'),
(37, 'bhavyaharia100@gmail.com'),
(38, 'beproject611@gmail.com'),
(39, 'bhavyaharia100@gmail.com'),
(40, 'bhavyaharia100@gmail.com'),
(41, 'assignments@bluepen.com'),
(42, 'RUTVI.SAVLA@svkmmumbai.onmicrosoft.com'),
(43, 'vinitsavla6@gmail.com'),
(44, 'bhavyaharia100@gmail.com'),
(45, 'fnel@ornw.com'),
(46, 'bhavyaharia100@gmail.com'),
(47, 'bhavyaharia100@gmail.com'),
(48, 'bhavyaharia100@gmail.com'),
(49, 'yabadabado@gmail.com'),
(50, 'yabadabado@gmail.com'),
(51, 'yabadabado@gmail.com'),
(52, 'yabadab@gmail.com'),
(53, 'bhavyaharia100@gmail.com'),
(54, 'bhavyaharia100@gmail.com'),
(55, 'bhavyaharia100@gmail.com'),
(56, 'bhavyaharia100@gmail.com'),
(57, 'bhavyaharia200@gmail.com'),
(58, 'bhavyaharia200@gmail.com'),
(59, 'bhavyaharia200@gmail.com'),
(60, 'kaushik.iyengar@sakec.ac.in'),
(61, 'bhavyaharia100@gmail.com'),
(62, 'kaushikiyengar1998@gmail.com'),
(63, 'bhavyaharia100@gmail.com'),
(64, 'bhavyaharia100@gmail.com'),
(65, 'bhavyaharia100@gmail.com'),
(66, 'bluepenassign@gmail.com'),
(67, 'bluepenassign@gmail.com'),
(68, 'bluepenassign@gmail.com'),
(69, 'bluepenassign@gmail.com'),
(70, 'bluepenassign@gmail.com'),
(71, 'fitnessappbe@gmail.com'),
(72, 'bhavyaharia100@gmail.com'),
(73, 'vinitsavla6@gmail.com'),
(74, 'kaushik.iyengar@sakec.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `pprwriter`
--

CREATE TABLE `pprwriter` (
  `id` int(11) NOT NULL,
  `first` varchar(256) NOT NULL,
  `last` varchar(256) NOT NULL,
  `college` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `course` varchar(256) NOT NULL,
  `good` varchar(40) NOT NULL,
  `pprname` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pprwriter`
--

INSERT INTO `pprwriter` (`id`, `first`, `last`, `college`, `email`, `contact`, `course`, `good`, `pprname`) VALUES
(2, 'Bhavya', 'Haria', 'SAKEC', 'bhavyaharia100@gmail.com', '9619305482', 'afwkwkjv kjv ', 'primary', 'Hostinger Receipt.pdf_$_Hathway January 2020.pdf_$_ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_');

-- --------------------------------------------------------

--
-- Table structure for table `ppt`
--

CREATE TABLE `ppt` (
  `user_id` int(11) NOT NULL,
  `ppt_id` int(11) NOT NULL,
  `stream` text NOT NULL,
  `topic` varchar(50) NOT NULL,
  `submission_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` date NOT NULL,
  `content` varchar(256) NOT NULL,
  `font` varchar(64) NOT NULL,
  `font_size` varchar(64) NOT NULL,
  `font_color` varchar(64) NOT NULL,
  `combi` varchar(64) NOT NULL,
  `slides` varchar(64) NOT NULL,
  `format` varchar(512) NOT NULL,
  `instruction` varchar(512) NOT NULL,
  `ppt_name` varchar(256) NOT NULL,
  `amount` int(11) NOT NULL,
  `soa_assigned` tinyint(1) NOT NULL,
  `soa_written` tinyint(1) NOT NULL,
  `soa_paid` tinyint(1) NOT NULL,
  `soa_completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ppt`
--

INSERT INTO `ppt` (`user_id`, `ppt_id`, `stream`, `topic`, `submission_datetime`, `delivery_date`, `content`, `font`, `font_size`, `font_color`, `combi`, `slides`, `format`, `instruction`, `ppt_name`, `amount`, `soa_assigned`, `soa_written`, `soa_paid`, `soa_completed`) VALUES
(7, 8, 'mba', '', '2020-09-08 05:02:51', '2020-09-11', 'no', 'a', '10', 'bbc', '1', '22', 'cas', 'cas', 'jayvora1499@gmail.comjayvora1499@gmail.combhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', 1788, 0, 0, 0, 0),
(7, 9, 'mba', '', '2020-09-08 05:05:01', '2020-09-11', 'no', 'a', '10', 'bbc', '1', '22', 'cas', 'cas', 'jayvora1499@gmail.comjayvora1499@gmail.combhavyaharia100@gmail.comTE_BE-Comp_Engg_CBCGS_Syllabus.pdf', 1788, 0, 0, 0, 0),
(7, 10, 'mba', 'acs', '2020-09-08 05:13:31', '2020-09-16', 'no', 'tnr', '10', 'bbc', 'xsa', '1', 'cas', 'cas', 'jayvora1499@gmail.com', 0, 0, 0, 0, 0),
(7, 11, 'mba', 'gf', '2020-09-08 05:18:09', '2020-09-11', 'no', 'tnr', '10', 'bbc', 'bfd', '12', 'vd', 'vs', 'jayvora1499@gmail.com', 0, 0, 0, 0, 0),
(7, 12, 'mba', 'fg', '2020-09-08 05:21:28', '2020-09-12', 'yes', 'tnr', '10', 'bbc', 'bd', '55', 'bd', 'db', 'jayvora1499@gmail.combhavyaharia100@gmail.comSEM 8 Exam Form.pdf', 24, 0, 0, 0, 0),
(7, 13, 'corp', 'ax', '2020-09-08 05:32:20', '2020-09-10', 'yes', 'a', '10', 'bbc', 'xa', '44', 'asc', 'ca', 'jayvora1499@gmail.combhavyaharia100@gmail.comHuman Machine Interaction Quiz 2.pdf', 1012, 0, 0, 0, 0),
(17, 14, 'diff2', 'Multicultural diversity', '2020-10-10 10:43:50', '2020-10-12', 'no', 'Any works', '14', 'Black', 'Blue and black', '5', 'Intro, adv, disadvantages, main body, conclusion', 'Make it class and aesthetic', 'chachachaudhary@gmail.com', 75, 0, 0, 0, 0),
(17, 15, 'corp', 'Women', '2020-10-10 10:48:56', '2020-10-13', 'no', 'Any font works', '13', 'Orange', 'Yellow and black', '40', 'Intro, main body, conclusion', 'Simple and beautiful', 'chachachaudhary@gmail.com', 800, 0, 0, 0, 0),
(21, 16, 'mba', 'Startups', '2021-01-14 17:35:07', '2021-01-16', 'no', 'TNR', '12', 'Black', '', '15', '6*', 'Fhgeg', 'Working of stock exchange.docx_$_', 375, 0, 0, 0, 0),
(16, 17, 'engg', 'your best work', '2021-02-23 06:05:42', '2021-02-28', 'yes', 'kuch bhi daalo be ', 'apne hisaab se karo', 'ekdum sexy waala', 'no, use your graphic designer', '150', 'no format, do your best ppt', 'no instructions, do your best', 'Document from Aniket Waghela.pptx_$_ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_', 0, 0, 0, 0, 0),
(16, 18, 'engg', 'lc aklc ', '2021-02-25 03:28:07', '2021-03-05', 'yes', 'kuch bhi daalo be ', 'apne hisaab se karo', 'ekdum sexy waala', 'dnqLFE KLEF N', '501', 'CKMAMCKACCKJA ', 'EVSJVJV sdklvdslvdkslv ', 'Hathway January 2020.pdf_$_Document from Aniket Waghela.pptx_$_ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_', 0, 0, 0, 0, 0),
(16, 19, 'mba', 'd qwklc ', '2021-02-25 03:30:21', '2021-02-28', 'no', 'kuch bhi daalo be ', 'apne hisaab se karo', 'ekdum sexy waala', 'c sdv sdkv ', '1581', 'akcmdsklvewklv ewklv ', 'lakclkc vewlkv ewklv ', 'Hathway January 2020.pdf_$_Document from Aniket Waghela.pptx_$_ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_', 31620, 0, 0, 0, 0),
(16, 20, 'mba', 'Ejej', '2021-03-02 03:59:44', '2021-03-05', 'yes', 'kuch bhi daalo be ', 'apne hisaab se karo', 'ekdum sexy waala', 'Sheh', '56', 'Whehd', 'Shshsh', 'PPT.pptx_$_PPT updated final.pdf_$_', 2800, 0, 0, 0, 0),
(16, 21, 'mba', 'Hshddhdh', '2021-03-02 04:00:46', '2021-03-12', 'yes', 'kuch bhi daalo be ', 'apne hisaab se karo', 'ekdum sexy waala', 'Bsbsbddh', '64', 'Hshddh', 'Jdjdjd', 'dlda assignment.docx_$_Screenshot_2021-03-02-08-30-53-756_com.linkedin.android.png_$_IMG-20210302-WA0000.jpg_$_PPT.pptx_$_PPT updated final.pdf_$_', 0, 0, 0, 0, 0),
(26, 22, 'bms', 'Impact of covid19 on undergraduates', '2021-04-12 14:19:40', '2021-04-15', 'no', 'Times new roman', '12', 'Black', 'Yellow theme', '15', 'Intro,objectives,lit review,research methodology,hypothesis,conclusion', 'No', 'Secondary_Literature_Review.pptx_$_', 300, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pptmaker`
--

CREATE TABLE `pptmaker` (
  `id` int(11) NOT NULL,
  `first` varchar(256) NOT NULL,
  `last` varchar(256) NOT NULL,
  `college` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(2048) NOT NULL,
  `good` varchar(40) NOT NULL,
  `pptname` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pptmaker`
--

INSERT INTO `pptmaker` (`id`, `first`, `last`, `college`, `email`, `contact`, `address`, `good`, `pptname`) VALUES
(1, 'Bhavya', 'Haria', 'kfbse', 'bhavyaharia100@gmail.com', '9619305482', 'andsjnsjnjkvnvkjnvjfksd;lsv  ewonvwejjvwj oivnwekv kjgvnkjv kjv ', 'Researching about content and design bot', 'Hathway January 2020.pdf_$_Document from Aniket Waghela.pptx_$_ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_'),
(2, 'Bhavya', 'Haria', 'akdccejc vw', 'bhavyaharia100@gmail.com', '9619305482', 'ackkamsclkaclkclcllkkl cklc kl', 'Only designing ppt', 'Hathway January 2020.pdf_$_Document from Aniket Waghela.pptx_$_ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_'),
(3, 'Vinit', 'Savla', 'Sakec', 'Vinitsavla6@gmail.com', '9892251891', 'Ghatkopar', 'Only designing ppt', 'INDIABULLS BLUE CHIP FUND.docx_$_IT ACT 2000.pdf 1.pdf_$_');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `topic` varchar(5) NOT NULL,
  `submission_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` date NOT NULL,
  `college` varchar(256) NOT NULL,
  `domain` varchar(2048) NOT NULL,
  `description` varchar(8192) NOT NULL,
  `project_name` varchar(256) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `refcode` varchar(32) NOT NULL,
  `type` varchar(40) NOT NULL,
  `soa_assigned` tinyint(1) DEFAULT 0,
  `soa_written` tinyint(1) DEFAULT 0,
  `soa_paid` tinyint(1) DEFAULT 0,
  `soa_completed` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`user_id`, `project_id`, `topic`, `submission_datetime`, `delivery_date`, `college`, `domain`, `description`, `project_name`, `branch`, `refcode`, `type`, `soa_assigned`, `soa_written`, `soa_paid`, `soa_completed`) VALUES
(16, 1, 'sldds', '2021-02-23 06:26:10', '0000-00-00', 'sakec', 'lknsc s', 'sdlnslnslvnlnvklernerlgnerlngklnfklw', 'ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_', 'extc', '', 'final', 0, 0, 0, 0),
(16, 2, 'Fjhfi', '2021-03-02 04:16:07', '0000-00-00', 'Dhjh', 'Gjfxvg', 'Fubfigdkfigyrmttjfehh', 'dlda assignment.docx_$_Screenshot_2021-03-02-08-30-53-756_com.linkedin.android.png_$_IMG-20210302-WA0000.jpg_$_PPT updated final.pdf_$_', 'extc', '', 'final', 0, 0, 0, 0),
(23, 3, 'not d', '2021-03-10 02:43:02', '0000-00-00', 'Sakec', 'ML', 'will c ', '_$_', 'comps', '', 'mini', 0, 0, 0, 0),
(16, 4, 'pjdfd', '2021-03-30 14:49:33', '0000-00-00', 'SAKEC', 'whitepocket', 'skd dsk ksd dsk dskjsd sdkjssskjsd', 'Siddhi jain 079 (2).docx_$_VIKAS GADDAM RESEARCH PAPER.doc_$_WhatsApp Image 2021-03-27 at 10.35.47 AM.jpeg_$_RC Churchgate - Elevating Ventures.pdf_$_', 'diff2', 'bappi200', 'final', 0, 0, 0, 0),
(26, 5, 'Movie', '2021-04-12 14:34:02', '0000-00-00', 'Sakec', 'ML', 'Thugdskbhk', 'row-3-col-1.jpg_$_IMG_20210405_194454.jpg_$_row-2-col-1.jpg_$_Rutvi Savla Certificate.pdf_$_', 'it', 'Rtyui', 'final', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT 'User',
  `file_name` varchar(264) NOT NULL DEFAULT 'user.png',
  `rating` varchar(4) NOT NULL,
  `location` varchar(264) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `file_name`, `rating`, `location`, `comment`) VALUES
(1, 'kaushik', 'user.png', '4', 'mumbai', 'ksaqnskedsebdjbtw'),
(2, 'kaushik gami', 'kaushik.png', '5', 'mumbai', 'how u all doing'),
(3, 'SIDDHANT IYENGAR', 'siddhant iyengar.jpeg', '5', ' Mira Road', 'I literally lost a lot of marks during previous semesters due to inconsistent and unpunctual assignment submissions but now bluepen entered my life like a life saver, pulling me out of this huge burden of assignment submissions, offering top notch service at the most affordable prices which is perfect for students. I am really flattered by such kind of amazing service and will look forward to do more business with you guys. 5/5 for being perfect in every possible way'),
(4, 'PARTH GITE', 'Parth Gite.jpeg', '4.5', 'mumbai', 'I have been using bluepens service for the past few daysnow. I am proud to say theyâ€™ve always lived up to the mark and no room for complaints. The services are very prompt and they charge reasonably which is the best part. Writing material has always been very neat and tidy which has helped me score good grades whilst focusing on my other commitments. Way to go you guys!'),
(5, 'JASH SHAH', 'Jash Shah.jpeg', '5', 'mumbai', 'Overall rating: 9/10 , Delivery: 9/10 , Rates :8/10 , Handwriting: 9/10\r\n\r\nI had recently used bluepen,it made my work very easy.I just had to share my content to be written and it was done. Bluepen had completed the work within the given dates.'),
(6, 'VINOD MULEVA', 'Vinod Muleva.jpeg', '4.0', 'mumbai', '@BluePen11 the Quality of work- was good and more then Average Delivery speed- was much better then expected Cost efficiency- starting rates were preferable In short the service provided was better and it was delivered in time and if some mistakes were also changed within short time and finally the service was good then any where else. I have a problem of Typing as i didnt have Laptop so i gave them the work of typing and i got in time so no further delay .......âœŒ âœŒâœŒ A big hand for BluePen and Whole Team..... And many more things are coming soon stay updated .....'),
(7, 'AVDHUT ZOLEKAR', 'Avdhut Zolekar.jpeg', '4.5', 'mumbai', 'Quality of work- Very good. The diagrams were neat, clean and dark. Couldnâ€™t ask for more. Delivery speed- 10/10. They delivered all the three assignments in a span of two days. Cost efficiency- Very cost efficient, considering the time and work. Costing was pretty reasonable. Iâ€™d recommend bluepen to everyone whoâ€™s struggling with their assignments and work. Helped a lot for me.'),
(8, 'Bhavya Haria', 'Bhavya Haria.jpeg', '5.0', 'Goregaon', 'Nice'),
(9, 'Kaushik Gami', 'user.png', '3.5', '', 'hiii'),
(10, 'User', 'user.png', '4.0', '', 'hii'),
(11, 'User', 'Bhavik Maru.jpeg', '4.0', '', 'hiwesodwsc'),
(12, 'Bhavya Haria', 'user.png', '4.0', '', 'hqiqdaods'),
(1, 'kaushik', 'user.png', '4', 'mumbai', 'ksaqnskedsebdjbtw'),
(2, 'kaushik gami', 'kaushik.png', '5', 'mumbai', 'how u all doing'),
(3, 'SIDDHANT IYENGAR', 'siddhant iyengar.jpeg', '5', ' Mira Road', 'I literally lost a lot of marks during previous semesters due to inconsistent and unpunctual assignment submissions but now bluepen entered my life like a life saver, pulling me out of this huge burden of assignment submissions, offering top notch service at the most affordable prices which is perfect for students. I am really flattered by such kind of amazing service and will look forward to do more business with you guys. 5/5 for being perfect in every possible way'),
(4, 'PARTH GITE', 'Parth Gite.jpeg', '4.5', 'mumbai', 'I have been using bluepens service for the past few daysnow. I am proud to say theyâ€™ve always lived up to the mark and no room for complaints. The services are very prompt and they charge reasonably which is the best part. Writing material has always been very neat and tidy which has helped me score good grades whilst focusing on my other commitments. Way to go you guys!'),
(5, 'JASH SHAH', 'Jash Shah.jpeg', '5', 'mumbai', 'Overall rating: 9/10 , Delivery: 9/10 , Rates :8/10 , Handwriting: 9/10\r\n\r\nI had recently used bluepen,it made my work very easy.I just had to share my content to be written and it was done. Bluepen had completed the work within the given dates.'),
(6, 'VINOD MULEVA', 'Vinod Muleva.jpeg', '4.0', 'mumbai', '@BluePen11 the Quality of work- was good and more then Average Delivery speed- was much better then expected Cost efficiency- starting rates were preferable In short the service provided was better and it was delivered in time and if some mistakes were also changed within short time and finally the service was good then any where else. I have a problem of Typing as i didnt have Laptop so i gave them the work of typing and i got in time so no further delay .......âœŒ âœŒâœŒ A big hand for BluePen and Whole Team..... And many more things are coming soon stay updated .....'),
(7, 'AVDHUT ZOLEKAR', 'Avdhut Zolekar.jpeg', '4.5', 'mumbai', 'Quality of work- Very good. The diagrams were neat, clean and dark. Couldnâ€™t ask for more. Delivery speed- 10/10. They delivered all the three assignments in a span of two days. Cost efficiency- Very cost efficient, considering the time and work. Costing was pretty reasonable. Iâ€™d recommend bluepen to everyone whoâ€™s struggling with their assignments and work. Helped a lot for me.'),
(8, 'Bhavya Haria', 'Bhavya Haria.jpeg', '5.0', 'Goregaon', 'Nice'),
(9, 'Kaushik Gami', 'user.png', '3.5', '', 'hiii'),
(10, 'User', 'user.png', '4.0', '', 'hii'),
(11, 'User', 'Bhavik Maru.jpeg', '4.0', '', 'hiwesodwsc'),
(12, 'Bhavya Haria', 'user.png', '4.0', '', 'hqiqdaods'),
(13, 'dipesh', 'dsip1.jpg', '4.0', 'Goregaon', 'HIIII'),
(14, 'Kaushik Natha Gami', 'beginning.png', '4.5', 'Goregaon', 'hiiiiii');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `u_id` int(11) NOT NULL,
  `assign_name` text NOT NULL,
  `ink_color` varchar(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deliverydate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`u_id`, `assign_name`, `ink_color`, `timestamp`, `deliverydate`) VALUES
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Black', '0000-00-00 00:00:00', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Blue', '2020-04-24 14:15:33', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Black', '0000-00-00 00:00:00', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Blue', '2020-04-24 14:15:33', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Black', '0000-00-00 00:00:00', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Blue', '2020-04-24 14:15:33', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Black', '0000-00-00 00:00:00', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Blue', '2020-04-24 14:15:33', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Black', '0000-00-00 00:00:00', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Blue', '2020-04-24 14:15:33', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Black', '0000-00-00 00:00:00', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Blue', '2020-04-24 14:15:33', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Black', '0000-00-00 00:00:00', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Blue', '2020-04-24 14:15:33', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Black', '0000-00-00 00:00:00', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Blue', '2020-04-24 14:15:33', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Black', '0000-00-00 00:00:00', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Blue', '2020-04-24 14:15:33', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Black', '0000-00-00 00:00:00', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Blue', '2020-04-24 14:15:33', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Black', '0000-00-00 00:00:00', '2020-04-27'),
(2, 'bhavyaharia100@gmail.comSpeech.pdf', 'Blue', '2020-04-24 14:15:33', '2020-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `translation`
--

CREATE TABLE `translation` (
  `user_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `ink_color` varchar(5) NOT NULL,
  `submission_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `lang_from` varchar(20) NOT NULL,
  `lang_to` varchar(20) NOT NULL,
  `font` varchar(50) NOT NULL,
  `font_size` int(20) NOT NULL,
  `font_color` varchar(20) NOT NULL,
  `page_size` varchar(40) NOT NULL,
  `margin` varchar(30) NOT NULL,
  `trans_name` varchar(512) NOT NULL,
  `soa_assigned` tinyint(1) DEFAULT 0,
  `soa_written` tinyint(1) DEFAULT 0,
  `soa_paid` tinyint(1) DEFAULT 0,
  `soa_completed` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `translation`
--

INSERT INTO `translation` (`user_id`, `trans_id`, `type`, `ink_color`, `submission_datetime`, `delivery_date`, `amount`, `lang_from`, `lang_to`, `font`, `font_size`, `font_color`, `page_size`, `margin`, `trans_name`, `soa_assigned`, `soa_written`, `soa_paid`, `soa_completed`) VALUES
(17, 1, 'writing', 'Blue', '2020-10-10 11:24:52', '2020-10-14', 0, 'English', 'Hindi', '', 0, '', '', '', 'chachachaudhary@gmail.comBDL EXP 10-3.pdf', 0, 0, 0, 0),
(16, 2, 'writing', 'Black', '2021-02-23 06:11:19', '2021-02-28', 0, 'Marathi', 'Marathi', '', 0, '', '', '', 'ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_', 0, 0, 0, 0),
(16, 3, 'typing', '', '2021-02-23 06:12:31', '2021-02-28', 0, 'Marathi', 'Marathi', 'kuch bhi daalo be ', 0, 'ekdum sexy waala', 'Tabaloid Oversize', 'Moderate', 'ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_', 0, 0, 0, 0),
(16, 4, 'typing', '', '2021-03-02 04:01:45', '2021-03-06', 0, 'English', 'Hindi', 'kuch bhi daalo be ', 0, 'ekdum sexy waala', 'Tabaloid Oversize', 'Moderate', 'dlda assignment.docx_$_Screenshot_2021-03-02-08-30-53-756_com.linkedin.android.png_$_IMG-20210302-WA0000.jpg_$_PPT updated final.pdf_$_', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `typing`
--

CREATE TABLE `typing` (
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `title` varchar(128) NOT NULL,
  `orientation` varchar(16) NOT NULL,
  `font` varchar(32) NOT NULL,
  `fontsize` varchar(16) NOT NULL,
  `fontcolor` varchar(32) NOT NULL,
  `pagesize` varchar(16) NOT NULL,
  `margins` varchar(16) NOT NULL,
  `submission_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `soa_assigned` tinyint(1) DEFAULT 0,
  `soa_written` tinyint(1) DEFAULT 0,
  `soa_paid` tinyint(1) DEFAULT 0,
  `soa_completed` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `typing`
--

INSERT INTO `typing` (`user_id`, `type_id`, `file_name`, `title`, `orientation`, `font`, `fontsize`, `fontcolor`, `pagesize`, `margins`, `submission_datetime`, `delivery_date`, `amount`, `soa_assigned`, `soa_written`, `soa_paid`, `soa_completed`) VALUES
(8, 2, 'kaushik@test123.comExternal_ Chrome, NSS, and OpenSSL.pdf', 'erdfb', 'Potrait', 'alcja', '12', 'green', 'A4', 'Normal', '2020-05-25 15:25:58', '2020-06-01', 0, 0, 0, 0, 0),
(8, 3, 'kaushik@test123.comIMG-20200520-WA0009.jpg', 'erdfb', 'Potrait', 'aasdsfds', '12', 'dac', 'A4', 'Normal', '2020-05-26 02:25:14', '2020-06-01', 0, 0, 0, 0, 0),
(15, 4, 'bhavyaharia100@gmail.comNLP Q2.pdf', 'typing title', 'Potrait', 'beyno', '60px', '#2555a6', 'A4', 'Normal', '2020-06-02 06:48:28', '2020-06-12', 40, 0, 0, 0, 0),
(17, 5, 'chachachaudhary@gmail.comScreenshot_2020-10-10-16-04-22-533_com.android.chrome.png', 'Economy', 'Potrait', 'Times new roman', '12', 'Black', 'A4', 'Narrow', '2020-10-10 10:39:56', '2020-10-22', 0, 0, 0, 0, 0),
(16, 6, 'ComputerOrganisation.pdf_$_CompilerDesign.pdf_$_Best Paper Certificate.png_$_', 'bhavya', 'Landscape', 'kuch bhi daalo be ', 'apne hisaab se k', 'ekdum sexy waala', 'Tabaloid Oversiz', 'Moderate', '2021-02-23 06:03:10', '2021-02-28', 110, 0, 0, 0, 0),
(16, 7, '38_Bhavya Haria.pdf_$_dlda assignment.docx_$_Screenshot_2021-03-02-08-30-53-756_com.linkedin.android.png_$_IMG-20210302-WA0000.jpg_$_', 'typing title', 'Landscape', 'kuch bhi daalo be ', 'apne hisaab se k', 'ekdum sexy waala', 'Tabaloid Oversiz', 'Moderate', '2021-03-02 03:37:34', '2021-03-06', 10, 0, 0, 0, 0),
(26, 8, 'Attendance_Undertaking_Form_wygoep4Xoe.pdf_$_sybaf_sem_4_gkQBFYrCqK.pdf_$_Certificate for Rutvi Savla for %22Feed back form for E-Talk  ...%22.pdf_$_Rutvi Savla Certificate.pdf_$_', 'History', 'Potrait', 'Times new roman', '12', 'Black', 'A4', 'Normal', '2021-04-12 14:14:26', '2021-04-16', 10, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `college` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `email_verified` tinyint(4) NOT NULL,
  `country` text NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `address` varchar(512) NOT NULL,
  `wallet_coins` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_of_submission` text NOT NULL,
  `agreed` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `college`, `email`, `email_verified`, `country`, `mobile`, `address`, `wallet_coins`, `date_of_birth`, `password`, `date_of_submission`, `agreed`) VALUES
(4, 'admin', 'admin', '', 'admin@bluepen.com', 0, '', '9619305482', 'blue pen', 0, '0000-00-00', '$2y$10$x/mWupik5ia5kxuX/QAw4O0w9VYVxZ3kVvD0KSAbgjcAZil0IWOnS', '', NULL),
(11, 'Drashti', 'Savla', 'Gurukul', 'jayshreesavla13@gmail.com', 0, '', '9920808085', 'Ghatkopar pantnagar', 0, '0000-00-00', '$2y$10$3JSMqMNwM/UFH.msWMUjZ.OV2QsPATSG2H12kMMfR7EYT5nLNCC7e', '', NULL),
(34, 'Bhavya', 'Haria', 'sakec', 'bhavyaharia1001@gmail.com', 0, '', '9619305482', 'gokuldham', 0, '0000-00-00', '$2y$10$dH7YfoMS47TySgGfMRMbqOyDb9iWAVX0iRIYQa0zYh7Lk1lktnbYu', '', 1),
(1, 'testfirstname', 'testlastname', '', 'test@gmail.com', 0, '', '9876543210', 'testaddress', 0, '0000-00-00', '', '', NULL),
(17, 'Chacha', 'Chaudhary', 'Atharva college', 'chachachaudhary@gmail.com', 0, '', '9920808085', 'Ghatkopar', 0, '0000-00-00', '$2y$10$lY5WV/9FYgg0qw84HG18PuViE1Tni6Eu1CD.GZpuhqa9iZ5YYaSwG', '', NULL),
(18, 'Kaushik ', 'Iyengar ', 'Sakec', 'kaushikiyengar19998@gmail.com', 0, '', '9004185304', 'Redwoods', 0, '0000-00-00', '$2y$10$O0a6SltXyPXofkiU2SWZgOa3pIf972k4TTdkgOiof97W5rzKzlUl6', '', NULL),
(20, 'Vinit', 'Shah', 'Sakec', 'vinitsavla123@yahoo.com', 0, '', '9920808085', 'Ghatkopar', 0, '0000-00-00', '$2y$10$UCW61blPLwrRdh8IYqWT1eC2CqBONnt8zTLVQUa4OMtlPAoKuNn0y', '', NULL),
(21, 'Rasik', 'Savla', 'Somaiya', 'rasiksavla2610@gmail.com', 0, '', '9870256110', 'Ghatkopar', 0, '0000-00-00', '$2y$10$Ig748AtlvBks/ua6AhDHLOldlyoZo6Yo2DuLNou2YSnTmuQ1uwQL.', '', NULL),
(22, 'Simran ', 'Jindal ', 'SAKEC', 'jindalsimran123@gmail.com', 0, '', '9324260234', '102, Kavita Chs, Sec -19, Plot no. -71 ,\r\nNerul ( East), Navi Mumbai - 400706', 0, '0000-00-00', '$2y$10$l0SBu6nY44BloDYf657rKuga.04srwDHwtB2QSeLZ7u7CwNR98.vW', '', NULL),
(23, 'Krutik', 'Patel', 'Shah and Anchor', 'krutik.patel@sakec.ac.in', 0, '', '7303066668', 'lower parel', 0, '0000-00-00', '$2y$10$JxfDyQNYZp5ghLBCnSETSOWJF8CsWJ2OOELYueqn3br0Eg0UH96Qq', '', NULL),
(24, 'Test', 'Website', 'Mumbai University', 'beproject611@gmail.com', 0, '', '9870256110', 'Santacruz', 0, '0000-00-00', '$2y$10$y37ah25/vwpEMgg3aArtLudxzYaR1rCw7COV7Gv960zej.ybSQQAi', '', NULL),
(25, 'Handwritten', 'Assignments', 'bluepen', 'assignments@bluepen.com', 0, '', '9619305482', 'blue pen', 0, '0000-00-00', '$2y$10$o.bykWoIAqj5YNP/.lZRAu44YlBaVILZ2HLFBLRgixXK7h74b/.Ce', '', NULL),
(26, 'Rutvi', 'Savla', 'Nm college', 'RUTVI.SAVLA@svkmmumbai.onmicrosoft.com', 0, '', '9174117419', 'Ghatkopar', 0, '0000-00-00', '$2y$10$g3unH3sKU4VmBVJoX/i6R.ma7ueg.6VJAwFMvVGrZrppmKMyz2TkK', '', NULL),
(29, 'Bhavya', 'Haria', 'suckec', 'yabadabado@gmail.com', 0, '', '9619388889', 'bambai', 0, '0000-00-00', '$2y$10$y.c3fljIGau/RqmkB.Qkd.E5aLPjZp88MAYtjNhB51OPyUTBHNgRi', '', 1),
(30, 'yaba', 'daba', 'suckec', 'yabadab@gmail.com', 0, '', '9876543210', 'gokuldham', 0, '0000-00-00', '$2y$10$K1uIRSX14FLDEiTYEHMyEuxWjdu/Z1xgXv5mDGyxNwAS90o3BdAD.', '', 1),
(37, 'Bhavya', 'Haria', '', 'bhavyaharia200@gmail.com', 0, '', '9619305482', 'gokuldham', 0, '0000-00-00', '$2y$10$rNgRbv1WWbeW62wBHTAJIeKdpR35T2ufBqDHOSghZTZxxwHzS4ttW', '', 1),
(52, 'Kaushik', 'Iyengar', '', 'kaushik.iyengar@sakec.ac.in', 1, 'India (à¤­à¤¾à¤°à¤¤)', '+915252515154', 'Mumbai', 390, '0000-00-00', '$2y$10$Y5F76DphKB6nhRvM4gpGiuHIq336GpZy.JUwdOzWcodfpwfM.qnf6', '2022-12-26 05:53:26', 1),
(39, 'Bhavya', 'Haria', '', 'bhavyaharia1000@gmail.com', 0, 'India (à¤­à¤¾à¤°à¤¤)', '91', 'gokuldham', 0, '0000-00-00', '$2y$10$NGLj2Pvcg.0NlNmlyqBzj.BmjjihOk1OJg0s05oOgQQADRSizUQju', '2022-09-02 04:01:19', 1),
(40, 'Kaushik', 'Iyengar', '', 'kaushikiyengar1998@gmail.com', 0, 'India (à¤­à¤¾à¤°à¤¤)', '91', 'Mumabi', 0, '0000-00-00', '', '2022-09-02 04:05:53', 1),
(43, 'bhavya', 'haria', '', 'bhavyaharia1000@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', '91-9619305482', 'gokuldham', 0, '0000-00-00', '$2y$10$iBPsjCPyWspOmVqRjzgqlOqF6wAbt0XUsmpAs0uMaEwGZThGQhu6q', '2022-09-05 04:25:16', 1),
(44, 'bhavya', 'haria', '', 'bluepenassssign@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', '+919619305482', 'gokuldham', 0, '0000-00-00', '$2y$10$HHcPVf12sXMh5.bBbEHineqvulytceti3hV0FXicJ3.DVfl8uJMvO', '2022-09-06 07:01:00', 1),
(48, 'bhavya', 'haria', '', 'bluepenasssign@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', '+919619305482', 'gokuldham', 0, '0000-00-00', '$2y$10$WV/XgR527Wb8L3ZQr6izR.H.aVA1WESwFP52gaqFkE0OQiWF4q7WK', '2022-09-06 07:22:31', 1),
(49, 'Fitness', 'App', '', 'fitnessappbe@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', '91-96193054852', 'gokuldham', 0, '0000-00-00', '$2y$10$1Fwid7ATV6o7EG88qep4zOdNla2wdnKDGC4qdF4ISl7vehkKhjOpe', '2022-09-07 00:17:47', 1),
(50, 'Bhavya', 'Haria', '', 'bhavyaharia100@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', '+919619305482', 'gokuldham', 1980, '0000-00-00', '$2y$10$4htUujcHKr6Z/CR17cPqk.Lo4s9.MHYv03zhV6u9G3Wz6AEcIyRA2', '2022-12-22 06:23:19', 1),
(51, 'Vinit', 'Savla', '', 'vinitsavla6@gmail.com', 1, 'India (à¤­à¤¾à¤°à¤¤)', '+919892251891', '71/2122, Visawa Building, Behind Pantnagar police station, Ghatkopar(East)', 20, '0000-00-00', '$2y$10$cbHKjSM6GjJFoZ0ekQlgxuTI0JcaLsJI61yoCVSWvefUdmShBsdo2', '2022-12-22 23:08:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_select`
--

CREATE TABLE `users_select` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_bought_writer`
--

CREATE TABLE `user_bought_writer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `bought_on` datetime NOT NULL,
  `expires_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_bought_writer`
--

INSERT INTO `user_bought_writer` (`id`, `user_id`, `writer_id`, `bought_on`, `expires_on`) VALUES
(1, 50, 28, '2022-12-22 14:16:11', '2022-12-29 14:16:11'),
(2, 52, 29, '2022-12-26 13:08:37', '2023-01-02 13:08:37'),
(3, 50, 29, '2023-01-30 09:27:50', '2023-02-06 09:27:50'),
(4, 50, 34, '2023-02-15 12:32:02', '2023-02-22 12:32:02'),
(5, 50, 29, '2023-02-16 05:36:36', '2023-02-23 05:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_buy_coins`
--

CREATE TABLE `user_buy_coins` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `coins` int(11) NOT NULL,
  `status` text NOT NULL,
  `order_time` datetime NOT NULL,
  `cf_order_id` int(11) DEFAULT NULL,
  `status_update` text DEFAULT NULL,
  `order_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `updated_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_buy_coins`
--

INSERT INTO `user_buy_coins` (`order_id`, `user_id`, `amount`, `coins`, `status`, `order_time`, `cf_order_id`, `status_update`, `order_data`, `update_time`, `updated_data`) VALUES
(1, 50, 150, 225, 'Order Placed', '2023-02-14 00:16:09', NULL, NULL, '', NULL, ''),
(2, 50, 80, 120, 'Order Placed', '2023-02-14 00:25:00', NULL, NULL, '', NULL, ''),
(3, 50, 80, 120, 'Order Placed', '2023-02-14 00:26:23', NULL, NULL, '', NULL, ''),
(4, 50, 80, 120, 'Order Placed', '2023-02-14 00:26:55', NULL, NULL, '', NULL, ''),
(5, 50, 80, 120, 'Order Placed', '2023-02-14 00:27:59', NULL, NULL, '', NULL, ''),
(6, 50, 80, 120, 'Order Placed', '2023-02-14 00:29:46', NULL, NULL, '', NULL, ''),
(7, 50, 80, 120, 'Order Placed', '2023-02-14 00:30:04', NULL, NULL, '', NULL, ''),
(8, 50, 80, 120, 'Order Placed', '2023-02-14 00:30:46', NULL, NULL, '', NULL, ''),
(9, 50, 80, 120, 'Order Placed', '2023-02-14 00:31:25', NULL, NULL, '', NULL, ''),
(10, 50, 80, 120, 'Order Placed', '2023-02-14 00:31:47', NULL, NULL, '', NULL, ''),
(11, 50, 80, 120, 'Order Placed', '2023-02-14 00:32:08', NULL, NULL, '', NULL, ''),
(12, 50, 80, 120, 'Order Placed', '2023-02-14 02:24:30', NULL, NULL, '', NULL, ''),
(13, 50, 80, 120, 'Order Placed', '2023-02-14 02:52:42', NULL, NULL, '', NULL, ''),
(14, 50, 80, 120, 'Order Placed', '2023-02-14 03:00:13', NULL, NULL, '', NULL, ''),
(15, 50, 80, 120, 'Order Placed', '2023-02-14 03:03:00', NULL, NULL, '', NULL, ''),
(16, 50, 80, 120, 'Order Placed', '2023-02-14 03:21:23', NULL, NULL, '', NULL, ''),
(17, 50, 80, 120, 'Order Placed', '2023-02-14 03:54:10', NULL, NULL, '', NULL, ''),
(18, 50, 80, 120, 'Order Placed', '2023-02-14 04:15:48', NULL, NULL, '', NULL, ''),
(19, 50, 80, 120, 'Order Placed', '2023-02-14 04:16:23', NULL, NULL, '', NULL, ''),
(20, 50, 80, 120, 'Order Placed', '2023-02-14 04:16:51', NULL, NULL, '', NULL, ''),
(21, 50, 80, 120, 'Order Placed', '2023-02-14 04:17:22', NULL, NULL, '', NULL, ''),
(22, 50, 80, 120, 'Order Placed', '2023-02-14 04:17:55', NULL, NULL, '', NULL, ''),
(23, 50, 80, 120, 'Order Placed', '2023-02-14 04:18:27', NULL, NULL, '', NULL, ''),
(24, 50, 80, 120, 'Order Placed', '2023-02-14 04:19:14', NULL, NULL, '', NULL, ''),
(25, 50, 80, 120, 'Order Placed', '2023-02-14 04:19:48', NULL, NULL, '', NULL, ''),
(26, 50, 80, 120, 'Order Placed', '2023-02-14 04:20:28', NULL, NULL, '', NULL, ''),
(27, 50, 80, 120, 'Order Placed', '2023-02-14 04:21:32', NULL, NULL, '', NULL, ''),
(28, 50, 80, 120, 'Order Placed', '2023-02-14 04:22:33', NULL, NULL, '', NULL, ''),
(29, 50, 80, 120, 'Order Placed', '2023-02-14 04:43:38', NULL, NULL, '', NULL, ''),
(30, 50, 80, 120, 'Order Placed', '2023-02-14 04:43:46', NULL, NULL, '', NULL, ''),
(31, 50, 80, 120, 'Order Placed', '2023-02-14 04:44:34', NULL, NULL, '', NULL, ''),
(32, 50, 80, 120, 'Order Placed', '2023-02-14 04:56:10', NULL, NULL, '', NULL, ''),
(33, 50, 80, 120, 'Order Placed', '2023-02-14 04:57:10', NULL, NULL, '', NULL, ''),
(34, 50, 80, 120, 'Order Placed', '2023-02-14 06:08:55', NULL, NULL, '', NULL, ''),
(35, 50, 80, 120, 'Order Placed', '2023-02-14 06:09:38', NULL, NULL, '', NULL, ''),
(36, 50, 80, 120, 'Order Placed', '2023-02-14 06:10:54', NULL, NULL, '', NULL, ''),
(37, 50, 80, 120, 'Order Placed', '2023-02-14 06:11:50', NULL, NULL, '', NULL, ''),
(38, 50, 80, 120, 'Order Placed', '2023-02-15 00:41:12', NULL, NULL, '', NULL, ''),
(39, 50, 80, 120, 'Order Placed', '2023-02-15 00:42:31', NULL, NULL, '', NULL, ''),
(40, 50, 80, 120, 'Order Placed', '2023-02-15 00:45:05', NULL, NULL, '', NULL, ''),
(41, 50, 80, 120, 'Order Placed', '2023-02-15 01:00:56', 0, '', '{\"message\":\"order with same id is already present\",\"code\":\"order_already_exists\",\"type\":\"invalid_request_error\"}\n', NULL, ''),
(42, 50, 40, 50, 'Order Placed', '2023-02-15 01:10:40', 3681395, 'ACTIVE', NULL, NULL, ''),
(43, 50, 40, 50, 'Order Placed', '2023-02-15 01:12:03', 3681401, 'ACTIVE', 'Array', NULL, ''),
(44, 50, 40, 50, 'Order Placed', '2023-02-15 01:13:56', 3681418, 'ACTIVE', '{\"cf_order_id\":3681418,\"created_at\":\"2023-02-15T13:43:58+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T13:43:58+05:30\",\"order_id\":\"U-44\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/userwallet.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_5S5_qAyqSCaAPMsxEGfNVq9Tcyitiw2ETf7qg1UH9zpxw8j0pw8zJP32SXnNHKK75_D5bC6ATKS-AIGxQsDxfO0lfNPRgxhGIpu-LuFi7GAq\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-44/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-44/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-44/settlements\"},\"terminal_data\":null}\n', NULL, ''),
(45, 50, 40, 50, 'Order Placed', '2023-02-15 03:05:22', 3682359, 'ACTIVE', '{\"cf_order_id\":3682359,\"created_at\":\"2023-02-15T15:35:24+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T15:35:24+05:30\",\"order_id\":\"U-45\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_LguLqDXEwNMNDQsj5wa-6Da1hoF2W2SP9Or3CG3DU8SI2GY86V0YSeJrf5WNnllbIng7wwasw4CEF3n2dT43tc9SrgGQZQmn4YKPUz_ThPIu\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-45/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-45/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-45/settlements\"},\"terminal_data\":null}\n', NULL, ''),
(46, 50, 80, 120, 'Order Placed', '2023-02-15 03:10:25', 3682399, 'ACTIVE', '{\"cf_order_id\":3682399,\"created_at\":\"2023-02-15T15:40:26+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":80.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T15:40:26+05:30\",\"order_id\":\"U-46\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_-4hT5lV8nHdAxDcGZ4sbzckHZHwr9wG8Q7kIMdaIeeH0evRAQCfrFh6ih57gwfDaPAkTXhO4BVp8dqxaF1M2_omycFOftw9rFfHQVL9K9uKR\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-46/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-46/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-46/settlements\"},\"terminal_data\":null}\n', NULL, ''),
(47, 50, 80, 120, 'Order Placed', '2023-02-15 04:52:46', 3683623, 'ACTIVE', '{\"cf_order_id\":3683623,\"created_at\":\"2023-02-15T17:22:47+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":80.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T17:22:47+05:30\",\"order_id\":\"U-47\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_5KXF2Xa0fgnAhT1-BDzXt8FBZY5sRP8Uj5iYCFMumx8uo765tlOiTGPkuLSClGS624gWaiGycalyVbLW-3ysOV0DhhzbcaXdFMjlYcIHmGqg\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-47/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-47/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-47/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(48, 50, 40, 50, 'Order Placed', '2023-02-15 04:53:43', 3683638, 'ACTIVE', '{\"cf_order_id\":3683638,\"created_at\":\"2023-02-15T17:23:45+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T17:23:45+05:30\",\"order_id\":\"U-48\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_CGyhDEcTP662ntXL7w0pW1sEPeDp1cJIgi0scL3PjPI4iJRdV3UR6h98Xl3dmj-5ADdoYt_J9p8jGJ92N-UXML_apoT9GvrDKxsCqFcIV9So\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-48/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-48/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-48/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(49, 50, 150, 225, 'Order Placed', '2023-02-15 04:54:45', 0, '', '{\"message\":\"order with same id is already present\",\"code\":\"order_already_exists\",\"type\":\"invalid_request_error\"}\n', NULL, NULL),
(50, 50, 150, 225, 'Order Placed', '2023-02-15 04:54:57', 0, '', '{\"message\":\"order with same id is already present\",\"code\":\"order_already_exists\",\"type\":\"invalid_request_error\"}\n', NULL, NULL),
(51, 50, 40, 50, 'Order Placed', '2023-02-15 04:55:07', 3683655, 'ACTIVE', '{\"cf_order_id\":3683655,\"created_at\":\"2023-02-15T17:25:09+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T17:25:09+05:30\",\"order_id\":\"U-51\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_LoVi0BWbWGGoShIDs3zE1daXKjgbpSM8SrastKfii6vwDj7BrxVUod7xb35mlDePFVU2KYtO6tfda_RS4CQ0ddYy9AbqASCSVXvGo9k3YBAV\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-51/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-51/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-51/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(52, 50, 80, 120, 'Order Placed', '2023-02-15 04:55:34', 3683659, 'ACTIVE', '{\"cf_order_id\":3683659,\"created_at\":\"2023-02-15T17:25:35+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":80.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T17:25:35+05:30\",\"order_id\":\"U-52\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_zCtug6g4cYOWWsM0-GaMtOTBx2eo4_YNCQjGwsKtBc1J8nOuOFvnCQwwWuCHSSZBZmbItEVxmbsotaaImxEOj6NWwro36mnpsJT6J8kQfREt\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-52/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-52/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-52/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(53, 50, 150, 225, 'Order Placed', '2023-02-15 04:56:03', 3683664, 'ACTIVE', '{\"cf_order_id\":3683664,\"created_at\":\"2023-02-15T17:26:04+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":150.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T17:26:04+05:30\",\"order_id\":\"U-53\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_92yyn2Qq3ups71ixWcwCjW_dD8HS8fIuVJp6sXUIawTL3t8LwIA1SxqwWkoMr0PR04L7I04sqgTZBeKT1NTyGDprXK9P0n6oWfxaY8kqrw9a\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-53/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-53/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-53/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(54, 50, 150, 225, 'Order Placed', '2023-02-15 04:56:28', 3683669, 'ACTIVE', '{\"cf_order_id\":3683669,\"created_at\":\"2023-02-15T17:26:29+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":150.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T17:26:29+05:30\",\"order_id\":\"U-54\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_vQBWsgB9p1i6WnmTRG-sZoYSSYD2db0aGs5wRHlwbAAZEHLpNtCs7ChBVzpIwU1jgaIv0CGobLHo77Xs0O7w2gELWRXQqEKHwNUU1VR8W_GV\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-54/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-54/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-54/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(55, 50, 150, 225, 'Order Placed', '2023-02-15 04:58:44', 3683684, 'ACTIVE', '{\"cf_order_id\":3683684,\"created_at\":\"2023-02-15T17:28:45+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":150.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T17:28:45+05:30\",\"order_id\":\"U-55\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_MYyjQyK18mK55d4DGuaujzBMktdRgjTWtdnDBcVfH9d2gcU9p5ohXVR6nyXAmuXVkJPNTRahvE_RcpXHMWpzjHRaVwaQAkGvifcbcVrZYLe4\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-55/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-55/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-55/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(56, 50, 150, 225, 'Order Placed', '2023-02-15 05:01:45', 3683718, 'ACTIVE', '{\"cf_order_id\":3683718,\"created_at\":\"2023-02-15T17:31:47+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":150.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T17:31:47+05:30\",\"order_id\":\"U-56\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_Kl3XVGOsrsiKFJMB2oqxGRR4Ldsqa0kgbIpwopGUGTcdrH2sAIqrQJ4Uol-3J_nGtRzyrguHT71hyKV3kPkSHP8PVx2vLBIuuv0pwURTwiZb\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-56/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-56/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-56/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(57, 50, 80, 120, 'Order Placed', '2023-02-15 05:31:16', 3684096, 'ACTIVE', '{\"cf_order_id\":3684096,\"created_at\":\"2023-02-15T18:01:17+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":80.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T18:01:17+05:30\",\"order_id\":\"U-57\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_VM0TD75HE6LiaO9V3huHaltUlQabUmF1fywvY395pvOKwUYLRgst5BReZE0fMrg8RyCT3lZXybKeH6kPpjaZ-zFuNQvA3tJvslbRI_40MTDQ\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-57/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-57/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-57/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(58, 50, 150, 225, 'Order Placed', '2023-02-15 07:24:35', 3684851, 'ACTIVE', '{\"cf_order_id\":3684851,\"created_at\":\"2023-02-15T19:54:37+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":150.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T19:54:37+05:30\",\"order_id\":\"U-58\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_6vk5qDKiJHRlYv9ugtqhf_bea_tisViVIBcINTSp3zRn2V3ov_8NnyE1DZUm2n0_4wR7c9xEHWAQgkUsqeuZFFeQnyivWSya2Tb8HGYfspb3\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-58/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-58/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-58/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(59, 50, 150, 225, 'Order Placed', '2023-02-15 07:25:52', 3684855, 'PAID', '{\"cf_order_id\":3684855,\"created_at\":\"2023-02-15T19:55:54+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":150.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T19:55:54+05:30\",\"order_id\":\"U-59\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_fQpT9eY7qzMZWQD5K9HL3zMJc44WvR_hUkKB7HnWaCtVsPnxI8aStdulTEoJ736DkB29xE6XlZ-QMp7_IWU7OiAkdv2FRWuNf7i4R1dsv90d\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-59/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-59/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-59/settlements\"},\"terminal_data\":null}\n', '2023-02-15 07:27:21', '{\"cf_order_id\":3684855,\"created_at\":\"2023-02-15T19:55:54+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":150.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T19:55:54+05:30\",\"order_id\":\"U-59\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_q1NA-6KOTCbRkBSu70yBN7Jh6fEt7Tn2NfefVJBm1X0_bbXQOo2Q2iR2g-ME31ZzFj0-nugBrcphDqsmInPPVFW0XEFIFzHShSmtOJ8gtjm5\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-59/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-59/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-59/settlements\"},\"terminal_data\":null}\n'),
(60, 50, 150, 225, 'Order Placed', '2023-02-15 07:27:43', 3684859, 'ACTIVE', '{\"cf_order_id\":3684859,\"created_at\":\"2023-02-15T19:57:45+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":150.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T19:57:45+05:30\",\"order_id\":\"U-60\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_grkwdFh9BYrp1oJvI-VgjW2itFFFNB48nD9Kd9_gCO1_NKANk48JqxBQ25W_8f1kZq3ZGeGQ6nDWi616HGyF0pXPD5MWbbnPXaFVBXnAXFMs\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-60/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-60/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-60/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(61, 50, 80, 120, 'Order Placed', '2023-02-15 07:29:19', 3684864, 'ACTIVE', '{\"cf_order_id\":3684864,\"created_at\":\"2023-02-15T19:59:21+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":80.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T19:59:21+05:30\",\"order_id\":\"U-61\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_lT6BSyuSB5PYCW4Aclo4WgrRC9kUXd1Ls9T4wAUEDU0Dsx8iYFVQzqpVE3GaXcu4p3cS_OW2-TX3MB_CNxf_LOjUPX0NNyLNo0c0eT4-tXUF\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-61/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-61/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-61/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(62, 50, 150, 225, 'Order Placed', '2023-02-15 07:30:20', 3684865, 'ACTIVE', '{\"cf_order_id\":3684865,\"created_at\":\"2023-02-15T20:00:21+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":150.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T20:00:21+05:30\",\"order_id\":\"U-62\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_whyKJUbuTswAT0B1ox2vFb_PpU7lDTagAMQpl5TOfb6iWzohDWPccevJysJ7VHnFyJ9XqTxK729ZEnsk4HUf_tNizSNoNfSQE50mj4hvX-g0\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-62/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-62/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-62/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(63, 50, 80, 120, 'Order Placed', '2023-02-15 07:31:03', 3684866, 'FAILED', '{\"cf_order_id\":3684866,\"created_at\":\"2023-02-15T20:01:04+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":80.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T20:01:04+05:30\",\"order_id\":\"U-63\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_m0C1dfUJnGhhitcDRp0Sc1XoTyVV4C0FDdn75Yiw73AuBSTwyQR0Br-A3D0IE08qTm6opRUD0An2oi7yrwQiMXOuty45jIbMVUKzLb9thjDv\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-63/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-63/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-63/settlements\"},\"terminal_data\":null}\n', '2023-02-15 07:32:17', '{\"cf_order_id\":3684866,\"created_at\":\"2023-02-15T20:01:04+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":80.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T20:01:04+05:30\",\"order_id\":\"U-63\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_eMJDgCmeuL4prlF6-cVtAFWYpv8wolITdzw5PiaCi9q7QC0fm2hOviQ7eqAccHm1NTDCvyuuQcPkqOmPFbJBhB7ln5gJGtQXSg9kv-QtLXXA\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-63/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-63/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-63/settlements\"},\"terminal_data\":null}\n'),
(64, 50, 80, 120, 'Order Placed', '2023-02-15 22:37:31', 3687485, 'FAILED', '{\"cf_order_id\":3687485,\"created_at\":\"2023-02-16T11:07:33+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":80.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-18T11:07:33+05:30\",\"order_id\":\"U-64\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_rDeN3Ri8Z3v389fo_aYrlwFctKgZEzYTmsfPmUzGC9hbe11daoIn9AjK0UFo95vPlrSUocdse9foAUtdaZeu4hAHMeYqJrS36T-uqipbMjS6\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-64/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-64/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-64/settlements\"},\"terminal_data\":null}\n', '2023-02-15 22:38:19', '{\"cf_order_id\":3687485,\"created_at\":\"2023-02-16T11:07:33+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":80.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-18T11:07:33+05:30\",\"order_id\":\"U-64\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_BYzCvG2CjFIAhLG3RhwluM8QWghIfl5Etf8enlquZ8dR2YWi70UucTrPiW9KLML-Io0nbKSmo-7rjAc_kz9pThWS4Z9qDGT4qm2Xs5-ss5gH\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-64/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-64/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-64/settlements\"},\"terminal_data\":null}\n'),
(65, 50, 40, 50, 'Order Placed', '2023-02-15 22:38:32', 3687489, 'ACTIVE', '{\"cf_order_id\":3687489,\"created_at\":\"2023-02-16T11:08:34+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-18T11:08:34+05:30\",\"order_id\":\"U-65\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_3aPADxKjBq54-q93tkX3FY740qitfwdoapgWcIo_RveCucKquixdVc0IbStYpdaH_iTYjN3MtS2qCrXHngbgg7jaI84OBs20KlX8AouNqmqR\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-65/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-65/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-65/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(66, 50, 40, 50, 'Order Placed', '2023-02-15 22:39:06', 3687492, 'FAILED', '{\"cf_order_id\":3687492,\"created_at\":\"2023-02-16T11:09:08+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-18T11:09:08+05:30\",\"order_id\":\"U-66\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_YrEQA-Y_EXHCMRfw3gXPKR_fro-ZOIguhEbI8iQeJPKfwCVyJdDkcqh90BjnSLYbCU1mY2fX91Jey08quamWFhh8wzEHNfGSWcPQ2Xc-QrzP\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-66/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-66/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-66/settlements\"},\"terminal_data\":null}\n', '2023-02-15 22:40:09', '{\"cf_order_id\":3687492,\"created_at\":\"2023-02-16T11:09:08+05:30\",\"customer_details\":{\"customer_id\":\"U-50\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"+919619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-18T11:09:08+05:30\",\"order_id\":\"U-66\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_THtQhkiaIvdAetuMScP22S1cW1WggbhQd1P30_FI5ENfkXJ5GSNSpEncZhM48djeM35KAqUxVijgLZA1qCPC16nVwi5BOGHFAnk8d_EwZBln\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-66/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-66/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/U-66/settlements\"},\"terminal_data\":null}\n');

-- --------------------------------------------------------

--
-- Table structure for table `user_coins_upi_transactions`
--

CREATE TABLE `user_coins_upi_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `coins` int(11) NOT NULL,
  `upi_trans_id` bigint(20) NOT NULL,
  `done_on` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_coins_upi_transactions`
--

INSERT INTO `user_coins_upi_transactions` (`id`, `user_id`, `value`, `coins`, `upi_trans_id`, `done_on`, `status`) VALUES
(1, 50, 40, 50, 303003237656, '2023-01-30 02:25:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_update`
--

CREATE TABLE `user_update` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `field` text NOT NULL,
  `value` text NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_update`
--

INSERT INTO `user_update` (`id`, `user_id`, `field`, `value`, `updated_on`) VALUES
(1, 39, 'firstname', 'bhavya', '2022-09-03 05:38:51'),
(2, 39, 'lastname', 'haria', '2022-09-03 05:39:24'),
(3, 39, 'country', 'India (à¤­à¤¾à¤°à¤¤)', '2022-09-03 05:40:35'),
(4, 39, 'mobile', '91', '2022-09-03 05:40:35'),
(5, 43, 'country', 'India (à¤­à¤¾à¤°à¤¤)', '2022-09-05 06:39:13'),
(6, 43, 'mobile', '919619305482', '2022-09-05 06:39:13'),
(7, 43, 'country', 'India (à¤­à¤¾à¤°à¤¤)', '2022-09-05 06:40:05'),
(8, 43, 'mobile', '91', '2022-09-05 06:40:05'),
(9, 43, 'country', 'India (à¤­à¤¾à¤°à¤¤)', '2022-09-05 06:40:30'),
(10, 43, 'mobile', '91', '2022-09-05 06:40:30'),
(11, 43, 'country', 'India (à¤­à¤¾à¤°à¤¤)', '2022-09-05 06:42:58'),
(12, 43, 'mobile', '91-08123456789', '2022-09-05 06:42:58'),
(13, 5, 'country', 'India (à¤­à¤¾à¤°à¤¤)', '2022-09-06 01:22:20'),
(14, 5, 'country', 'India (à¤­à¤¾à¤°à¤¤)', '2022-09-06 01:23:19'),
(15, 49, 'firstname', 'bhavya', '2022-09-07 00:20:00'),
(16, 49, 'firstname', 'Bhavya', '2022-09-07 00:23:29'),
(17, 49, 'firstname', 'Fitness', '2022-09-07 00:26:25'),
(18, 49, 'firstname', 'fitness', '2022-09-07 00:27:42'),
(19, 49, 'firstname', 'Fitness', '2022-09-07 00:28:39'),
(20, 49, 'firstname', 'fitness', '2022-09-07 00:29:20'),
(21, 49, 'firstname', 'Fitness', '2022-09-07 00:36:55'),
(22, 49, 'firstname', 'fitness', '2022-09-07 00:38:49'),
(23, 49, 'firstname', 'Fitness', '2022-09-07 00:39:29'),
(24, 49, 'firstname', 'fitness', '2022-09-07 00:40:37'),
(25, 49, 'firstname', 'Fitness', '2022-09-07 00:43:32'),
(26, 49, 'firstname', 'fitness', '2022-09-07 01:03:25'),
(27, 49, 'firstname', 'Fitness', '2022-09-07 01:04:33'),
(28, 49, 'firstname', 'fitness', '2022-09-07 01:05:27'),
(29, 49, 'lastname', 'haria', '2022-09-07 01:05:37'),
(30, 49, 'firstname', 'Fitness', '2022-09-07 02:09:29'),
(31, 49, 'lastname', 'App', '2022-09-07 02:09:51'),
(32, 49, 'country', 'India (à¤­à¤¾à¤°à¤¤)', '2022-09-07 02:18:03'),
(33, 49, 'mobile', '+919619305482', '2022-09-07 02:18:03'),
(34, 49, 'country', 'Indonesia', '2022-09-07 02:19:41'),
(35, 49, 'mobile', '62-9619305482', '2022-09-07 02:19:41'),
(36, 49, 'firstname', 'fitness', '2022-09-07 02:29:33'),
(37, 49, 'lastname', 'app', '2022-09-07 03:20:53'),
(38, 5, 'country', 'India (à¤­à¤¾à¤°à¤¤)', '2022-09-07 03:46:05'),
(39, 5, 'country', 'Iceland (Ãsland)', '2022-09-07 03:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet_transaction`
--

CREATE TABLE `user_wallet_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `details` text NOT NULL,
  `transaction` int(11) NOT NULL,
  `date_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_wallet_transaction`
--

INSERT INTO `user_wallet_transaction` (`id`, `user_id`, `order_id`, `details`, `transaction`, `date_time`) VALUES
(1, 50, 0, 'Gift from Team Bluepen', 30, '2022-12-22 07:09:04'),
(2, 50, 0, 'Bought Writer Contact', -30, '2022-12-22 14:16:11'),
(3, 52, 0, 'Joining Bonus', 20, '2022-12-26 05:53:26'),
(4, 52, 0, 'Gift from Team Bluepen', 400, '2022-12-26 06:08:21'),
(5, 52, 0, 'Bought Writer Contact', -30, '2022-12-26 13:08:37'),
(6, 50, 0, 'Bought', 50, '2023-01-30 02:27:15'),
(7, 50, 0, 'Bought Writer Contact', -30, '2023-01-30 09:27:50'),
(8, 50, NULL, 'CREDIT', 120, '2023-02-15 04:49:12'),
(9, 50, NULL, 'CREDIT', 120, '2023-02-15 04:49:31'),
(10, 50, NULL, 'CREDIT', 120, '2023-02-15 04:52:26'),
(11, 50, NULL, 'CREDIT', 120, '2023-02-15 04:53:03'),
(12, 50, NULL, 'CREDIT', 50, '2023-02-15 04:54:02'),
(13, 50, NULL, 'CREDIT', 50, '2023-02-15 04:55:23'),
(14, 50, NULL, 'CREDIT', 120, '2023-02-15 04:55:50'),
(15, 50, NULL, 'CREDIT', 225, '2023-02-15 04:56:19'),
(16, 50, NULL, 'CREDIT', 225, '2023-02-15 05:02:04'),
(17, 50, NULL, 'CREDIT', 120, '2023-02-15 05:31:34'),
(18, 50, NULL, 'Bought Writer Contact', -30, '2023-02-15 12:32:02'),
(19, 50, NULL, 'CREDIT', 225, '2023-02-15 07:25:14'),
(20, 50, NULL, 'CREDIT', 225, '2023-02-15 07:26:08'),
(21, 50, NULL, 'CREDIT', 225, '2023-02-15 07:26:58'),
(22, 50, NULL, 'CREDIT', 225, '2023-02-15 07:27:21'),
(23, 50, NULL, 'Bought Writer Contact', -30, '2023-02-16 05:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `writer`
--

CREATE TABLE `writer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `country` text NOT NULL,
  `mobile_number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(256) NOT NULL,
  `file` text DEFAULT NULL,
  `diagram_sample` text DEFAULT NULL,
  `ed_sample` text DEFAULT NULL,
  `art_sample` text NOT NULL,
  `password` text DEFAULT NULL,
  `address` varchar(2048) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postalcode` text NOT NULL,
  `bio` text NOT NULL,
  `assignment_type` text NOT NULL,
  `college` text DEFAULT NULL,
  `date_of_submission` text NOT NULL,
  `approval` tinyint(1) NOT NULL,
  `amount` float NOT NULL,
  `writer_capacity` int(11) DEFAULT NULL,
  `diagram_cost` decimal(11,1) DEFAULT NULL,
  `ed_cost` decimal(11,1) DEFAULT NULL,
  `art_cost` decimal(11,1) NOT NULL,
  `typing_cost` decimal(11,1) DEFAULT NULL,
  `short_cost` decimal(11,1) DEFAULT NULL,
  `medium_cost` decimal(11,1) DEFAULT NULL,
  `long_cost` decimal(11,1) DEFAULT NULL,
  `coins` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `writer`
--

INSERT INTO `writer` (`id`, `firstname`, `lastname`, `gender`, `country`, `mobile_number`, `whatsapp_number`, `mobile`, `email`, `file`, `diagram_sample`, `ed_sample`, `art_sample`, `password`, `address`, `street`, `city`, `state`, `postalcode`, `bio`, `assignment_type`, `college`, `date_of_submission`, `approval`, `amount`, `writer_capacity`, `diagram_cost`, `ed_cost`, `art_cost`, `typing_cost`, `short_cost`, `medium_cost`, `long_cost`, `coins`) VALUES
(21, 'Drashti', 'Savla', '', '', '', '', 9920808085, 'jayshreesavla13@gmail.com', 'jayshreesavla13@gmail.comIMG-20200530-WA0016.jpg', NULL, NULL, '', '', 'Ghatkopar pantnagar', '', '', '', '', '', '', '', '', 0, 0, NULL, NULL, NULL, '0.0', NULL, NULL, NULL, NULL, NULL),
(22, 'Vinit', 'Savla', '', '', '', '', 9892251891, 'vinit.savla@sakec.ac.in', 'vinit.savla@sakec.ac.inIMG_20201009_155609.jpg_$_', NULL, NULL, '', '', 'Ghatkopar', '', '', '', '', '', '', '', '', 0, 0, NULL, NULL, NULL, '0.0', NULL, NULL, NULL, NULL, NULL),
(23, 'savla Vinit', 'Jayshree', '', '', '', '', 9892251891, 'vinitsavla6@gmail.com', 'DeepikajainBPhandwritingsample.jpg_$_', NULL, NULL, '', '$2y$10$6utsKrUggkwqrJw5mLOvgeaQuY5iHTluS4ZQpM.g1cwGoBCe7WYyS', '71/2122, Visawa Building, Behind Pantnagar police station, Ghatkopar(East)', '', '', '', '', '', '', '', '', 1, 0, NULL, NULL, NULL, '0.0', NULL, NULL, NULL, NULL, 20),
(24, 'Bhavya', 'Haria', 'Male', '', '-9619305482', '9619305482', 9619305482, 'bhavyaharia10000@gmail.com', 'CompilerDesign.pdf_$_Best Paper Certificate.png_$_', NULL, NULL, '', '$2y$10$56wo56RUnJUzkU4lp7Y01uvq3T4alw2UCiMA6wfl/0LiKONHcEc2a', 'B-42,B-002, Dayanand SocietyOpp. Lifeline Hospital, GokuldhamGoregaon (East)', 'marg', 'Mumbai', 'maha', '400063', 'sddsfbhsdjfbhdsjbfbshfjsbfjhdsbhfjhbsfjdsbhfjhbfjhbhfjhbsfjhbsfjhbs', '[\"Writing\",\"Diagrams\",\"Engineering Drawing\",\"Typing\",\"Art\"]', '', '', 1, 0, NULL, NULL, NULL, '0.0', NULL, NULL, NULL, NULL, 20),
(25, 'fnwjwejf fejf jenfjewfn', 'akndqwkjnjqwefefewhj', '', '', '', '', 9876543210, 'fnel@ornw.com', '_974fa7509d583eabb592839f9716fe25_Lecture1.pdf_$_', NULL, NULL, '', '', 'sldvnosdnoieinfonieneoweinf;lkcoienefiwnf\'ekcm', '', '', '', '', '', '', '', '', 0, 0, NULL, NULL, NULL, '0.0', NULL, NULL, NULL, NULL, NULL),
(28, 'Bhavya', 'Haria', 'Male', 'India (à¤­à¤¾à¤°à¤¤)', '91-9619305482', '9619305482', 0, 'bhavyaharia1000@gmail.com', 'shantanu intern agreement.docx_$_', 'offerletterntpm (1).docx_$_', 'CCAV_Agreement.pdf_$_', '', '$2y$10$NOrMLw8v5yZDun1E3C0ruO/v3S3eKB.Tsa1vl8EpJUYXPoquMyHuS', 'gokuldham', 'marg', 'Mumbai', 'maha', '400063', 'i am writing since last 2 years and i am a good writer.', '[\"Writing\",\"Diagrams\",\"Engineering Drawing\",\"Typing\"]', NULL, '2022-12-22 06:43:54', 1, 0, 10, '50.0', '100.0', '0.0', '20.0', '13.0', '8.0', '7.0', 0),
(29, 'Vinit', 'Savla', 'Male', 'India (à¤­à¤¾à¤°à¤¤)', '91-9892251891', '9892251891', 0, 'bluepenassign@gmail.com', 'the Form Rifle Stocks-2.docx_$_the Form Rifle Stocks-3.docx_$_', 'limits_and_derivatives (1).pdf_$_Permutations and Combinations.pdf_$_', 'IMG-20221222-WA0030.jpg_$_', '', '$2y$10$XuQcHOAOisEa9DB0Zay25udvbQQZ3wQbYDKTZB6hd5w.aO1a4JkBC', '71/2122, Visawa Building, Behind Pantnagar police station, Ghatkopar(East)', 'Ghatkopar', 'MUMBAI', 'Maharashtra', '400075', 'I can write assignments in good handwriting and very fast', '[\"Writing\",\"Diagrams\",\"Engineering Drawing\",\"Typing\"]', NULL, '2022-12-22 23:23:03', 1, 0, 50, '50.0', '150.0', '0.0', '15.0', '15.0', '10.0', '7.0', NULL),
(30, 'bhavya', 'haria', 'Male', 'India (à¤­à¤¾à¤°à¤¤)', '91-9619305482', '9619305482', 0, 'bhavyaharia10@gmail.com', 'Dear Harish Gautam (7).pdf_$_', 'Ashish-Kap-Resume.pdf_$_', 'RESUME 1.docx_$_', '', NULL, 'gokuldham', 'marg', 'Mumbai', 'maha', '400063', 'sksdknfsdkjnksjdfnskdjfnskjdnfksjdjnnksjdjnfsjenfoaenfjn', '[\"Writing\",\"Diagrams\",\"Engineering Drawing\",\"Art\",\"Typing\"]', NULL, '2023-01-31 00:38:41', 0, 0, 20, '100.0', '200.0', '0.0', '2000.0', '11.5', '8.5', '5.0', NULL),
(31, 'bhavya', 'haria', 'Male', 'India (à¤­à¤¾à¤°à¤¤)', '91-9619305482', '9619305482', 0, 'bhavyaharia1@gmail.com', 'Dear Harish Gautam (7).pdf_$_', 'Ashish-Kap-Resume.pdf_$_', 'RESUME 1.docx_$_', 'ShantanuKhandelwalFinance (1).pdf_$_', NULL, 'gokuldham', 'marg', 'Mumbai', 'maha', '400063', 'sksdknfsdkjnksjdfnskdjfnskjdnfksjdjnnksjdjnfsjenfoaenfjn', '[\"Writing\",\"Diagrams\",\"Engineering Drawing\",\"Art\",\"Typing\"]', NULL, '2023-01-31 01:03:52', 0, 0, 19, '100.0', '200.0', '2000.0', '15.0', '12.5', '8.0', '5.0', NULL),
(34, 'bhavya', 'haria', 'Male', 'India (à¤­à¤¾à¤°à¤¤)', '91-9619305482', '9619305482', 0, 'bhavyaharia100@gmail.com', 'Dear Harish Gautam (7).pdf_$_', 'Ashish-Kap-Resume.pdf_$_', 'RESUME 1.docx_$_', 'ShantanuKhandelwalFinance (1).pdf_$_', '$2y$10$IjEFLaCrGKFCja.x2v92Fe57oJTfDNM2y5nYk0QvL4gnew8T.X/Qa', 'gokul', 'ngf', 'tjcyh', 'kyo;jill', '400063', 'ghhggjfghdhfiitoiggyfjjsdhcghhuffjopiyioehlttcodsj', '[\"Writing\",\"Diagrams\",\"Engineering Drawing\",\"Art\",\"Typing\"]', NULL, '2023-01-31 03:16:03', 1, 0, 28, '50.0', '200.0', '2000.0', '20.0', '11.5', '8.0', '4.5', 1100);

-- --------------------------------------------------------

--
-- Table structure for table `writer_bought_user`
--

CREATE TABLE `writer_bought_user` (
  `id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `assignment_type` text NOT NULL,
  `bought_on` datetime NOT NULL,
  `expires_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `writer_bought_user`
--

INSERT INTO `writer_bought_user` (`id`, `writer_id`, `user_id`, `assignment_id`, `assignment_type`, `bought_on`, `expires_on`) VALUES
(1, 28, 50, 59, '', '2022-12-22 14:13:48', '2022-12-29 14:13:48'),
(2, 34, 50, 78, 'handwritten', '2023-02-01 17:04:18', '2023-02-08 17:04:18'),
(3, 34, 50, 79, 'handwritten', '2023-02-16 05:42:19', '2023-02-23 05:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `writer_buy_coins`
--

CREATE TABLE `writer_buy_coins` (
  `order_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `coins` int(11) NOT NULL,
  `status` text NOT NULL,
  `order_time` datetime NOT NULL,
  `cf_order_id` int(11) DEFAULT NULL,
  `status_update` text DEFAULT NULL,
  `order_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`order_data`)),
  `update_time` datetime DEFAULT NULL,
  `updated_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`updated_data`))
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `writer_buy_coins`
--

INSERT INTO `writer_buy_coins` (`order_id`, `writer_id`, `amount`, `coins`, `status`, `order_time`, `cf_order_id`, `status_update`, `order_data`, `update_time`, `updated_data`) VALUES
(1, 34, 80, 120, 'Order Placed', '2023-02-14 05:23:22', NULL, NULL, NULL, NULL, NULL),
(2, 34, 80, 120, 'Order Placed', '2023-02-14 05:24:09', NULL, NULL, NULL, NULL, NULL),
(3, 34, 80, 120, 'Order Placed', '2023-02-14 05:26:23', NULL, NULL, NULL, NULL, NULL),
(4, 34, 80, 120, 'Order Placed', '2023-02-14 05:26:40', NULL, NULL, NULL, NULL, NULL),
(5, 34, 80, 120, 'Order Placed', '2023-02-14 05:27:09', NULL, NULL, NULL, NULL, NULL),
(6, 34, 80, 120, 'Order Placed', '2023-02-14 05:28:16', NULL, NULL, NULL, NULL, NULL),
(7, 34, 80, 120, 'Order Placed', '2023-02-14 05:28:34', NULL, NULL, NULL, NULL, NULL),
(8, 34, 80, 120, 'Order Placed', '2023-02-15 06:49:54', 3684716, '0', '0', NULL, NULL),
(9, 34, 80, 120, 'Order Placed', '2023-02-15 06:51:01', 3684722, '0', '0', NULL, NULL),
(10, 34, 80, 120, 'Order Placed', '2023-02-15 06:51:24', 3684726, '0', '0', NULL, NULL),
(11, 34, 40, 50, 'Order Placed', '2023-02-15 06:59:05', 3684769, '0', '0', NULL, NULL),
(12, 34, 40, 50, 'Order Placed', '2023-02-15 07:00:28', 3684773, '0', '0', NULL, NULL),
(13, 34, 80, 120, 'Order Placed', '2023-02-15 07:06:26', 3684796, '0', '0', NULL, NULL),
(14, 34, 80, 120, 'Order Placed', '2023-02-15 07:07:12', 3684798, '0', '0', NULL, NULL),
(15, 34, 40, 50, 'Order Placed', '2023-02-15 07:10:55', 3684811, '0', '0', NULL, NULL),
(16, 34, 40, 50, 'Order Placed', '2023-02-15 07:11:45', 3684816, '0', NULL, NULL, NULL),
(17, 34, 40, 50, 'Order Placed', '2023-02-15 07:13:02', 3684821, 'ACTIVE', NULL, NULL, NULL),
(18, 34, 40, 50, 'Order Placed', '2023-02-15 07:15:06', 3684829, 'ACTIVE', '{\"cf_order_id\":3684829,\"created_at\":\"2023-02-15T19:45:08+05:30\",\"customer_details\":{\"customer_id\":\"W-34\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"9619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T19:45:08+05:30\",\"order_id\":\"W-18\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/writer/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_lchm2dIm4qCC4rNhQKtW3QNzCCAMqXuXPbspnE0BXgPUwHDQyP5-obZY-TJQ5XKX26Fhj-Oy3KQmPzpDF_WRCpW1t3rbsEXnqqkSBmjBKnqH\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-18/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-18/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-18/settlements\"},\"terminal_data\":null}\n', NULL, NULL),
(19, 34, 40, 50, 'Order Placed', '2023-02-15 07:15:56', 3684833, 'PAID', '{\"cf_order_id\":3684833,\"created_at\":\"2023-02-15T19:45:58+05:30\",\"customer_details\":{\"customer_id\":\"W-34\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"9619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T19:45:58+05:30\",\"order_id\":\"W-19\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/writer/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_X5cyRpDZRtftHuYfr1qOq4s92606hJtOx-hQn6m8AdmGGAsLOs8sz2Lf0tH3drOBYLk470Xbkc7HsZEJi-QHg08CdqzeReraf9c7T2N_uqcG\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-19/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-19/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-19/settlements\"},\"terminal_data\":null}\n', '2023-02-15 07:23:43', '{\"cf_order_id\":3684833,\"created_at\":\"2023-02-15T19:45:58+05:30\",\"customer_details\":{\"customer_id\":\"W-34\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"9619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T19:45:58+05:30\",\"order_id\":\"W-19\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/writer/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_qM3LaS6ebijnaBhhx-lObJsBroSlljQVuhxxe2EmpScck4BzuNxRObsn5nDetlTxvTTFh0qml99LLThJM23sexC-axYZ2u0MeggpdpIRneaX\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-19/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-19/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-19/settlements\"},\"terminal_data\":null}\n'),
(20, 34, 80, 120, 'Order Placed', '2023-02-15 07:33:52', 3684873, 'FAILED', '{\"cf_order_id\":3684873,\"created_at\":\"2023-02-15T20:03:53+05:30\",\"customer_details\":{\"customer_id\":\"W-34\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"9619305482\"},\"entity\":\"order\",\"order_amount\":80.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T20:03:53+05:30\",\"order_id\":\"W-20\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/writer/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_0K2f2H6GbAj3mIPXhNMmCLTv5KmZNqFkJnJl_nrBLk62SGjntoM1GVTWFhcHVikkTzPegLZier-3v5XbVqyXkF94Ut0cjNRoMmMODPI89CEw\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-20/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-20/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-20/settlements\"},\"terminal_data\":null}\n', '2023-02-15 07:35:22', '{\"cf_order_id\":3684873,\"created_at\":\"2023-02-15T20:03:53+05:30\",\"customer_details\":{\"customer_id\":\"W-34\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"9619305482\"},\"entity\":\"order\",\"order_amount\":80.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-17T20:03:53+05:30\",\"order_id\":\"W-20\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/writer/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_Jy9L-QaCzmXzBsKliR3ZKgvLnnXKi5S89oaQIYCKyYkOP93BGRtlX-eXLKtUDrhde-Dw_L0Gl89CrVOd7U7-WVwP6uBBPLbUZPox_wXqFp0G\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-20/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-20/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-20/settlements\"},\"terminal_data\":null}\n'),
(21, 34, 40, 50, 'Order Placed', '2023-02-18 03:41:27', 3705170, 'PAID', '{\"cf_order_id\":3705170,\"created_at\":\"2023-02-18T16:11:29+05:30\",\"customer_details\":{\"customer_id\":\"W-34\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"9619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-20T16:11:29+05:30\",\"order_id\":\"W-21\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/writer/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"ACTIVE\",\"order_tags\":null,\"payment_session_id\":\"session_ppng8EjcuavuiSm9-AmQs6s4QWVLF_hR1WpNNC-PByB-KZfcvIRi6qfrtv322vaZWIW6xXotMbaC9HsCKd_NKG6dZuDSU9tKyuDypCLO4G9d\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-21/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-21/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-21/settlements\"},\"terminal_data\":null}\n', '2023-02-18 03:41:57', '{\"cf_order_id\":3705170,\"created_at\":\"2023-02-18T16:11:29+05:30\",\"customer_details\":{\"customer_id\":\"W-34\",\"customer_name\":null,\"customer_email\":\"bhavyaharia100@gmail.com\",\"customer_phone\":\"9619305482\"},\"entity\":\"order\",\"order_amount\":40.00,\"order_currency\":\"INR\",\"order_expiry_time\":\"2023-03-20T16:11:29+05:30\",\"order_id\":\"W-21\",\"order_meta\":{\"return_url\":\"https://test.bluepen.co.in/writer/includes/updatewallet.inc.php?order_id={order_id}u0026message=success\",\"notify_url\":null,\"payment_methods\":null},\"order_note\":null,\"order_splits\":[],\"order_status\":\"PAID\",\"order_tags\":null,\"payment_session_id\":\"session_HDEwG2-NF3X_0-fTZihBc-JSI9pw1ZgUyCbFzeF4hEHgC9PmNJYxKQmgJUES47lJVwtyIIEYSLuHUwSnn2iCIhdDr2B63V2IBWZHnSASH1FE\",\"payments\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-21/payments\"},\"refunds\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-21/refunds\"},\"settlements\":{\"url\":\"https://sandbox.cashfree.com/pg/orders/W-21/settlements\"},\"terminal_data\":null}\n');

-- --------------------------------------------------------

--
-- Table structure for table `writer_coins_upi_transactions`
--

CREATE TABLE `writer_coins_upi_transactions` (
  `id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `coins` int(11) NOT NULL,
  `upi_trans_id` bigint(20) NOT NULL,
  `done_on` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `writer_swing`
--

CREATE TABLE `writer_swing` (
  `id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `swing_status` int(11) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `writer_update`
--

CREATE TABLE `writer_update` (
  `id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `field` text NOT NULL,
  `value` text NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `writer_update`
--

INSERT INTO `writer_update` (`id`, `writer_id`, `field`, `value`, `updated_on`) VALUES
(1, 24, 'gender', '', '2023-02-01 03:49:34'),
(2, 24, 'mobile_number', '', '2023-02-01 03:49:51'),
(3, 24, 'whatsapp_number', '', '2023-02-01 03:50:09'),
(4, 24, 'address', 'B-42,B-002, Dayanand Society\r\nOpp. Lifeline Hospital, Gokuldham\r\nGoregaon (East)', '2023-02-01 03:51:32'),
(5, 24, 'street', '', '2023-02-01 03:51:32'),
(6, 24, 'city', '', '2023-02-01 03:51:32'),
(7, 24, 'state', '', '2023-02-01 03:51:32'),
(8, 24, 'postalcode', '', '2023-02-01 03:51:32'),
(9, 24, 'bio', '', '2023-02-01 03:51:50'),
(10, 24, 'assignment_type', '', '2023-02-01 03:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `writer_wallet_transaction`
--

CREATE TABLE `writer_wallet_transaction` (
  `id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `transaction` int(11) NOT NULL,
  `date_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `writer_wallet_transaction`
--

INSERT INTO `writer_wallet_transaction` (`id`, `writer_id`, `details`, `transaction`, `date_time`) VALUES
(1, 28, 'Joining Bonus', 50, '2022-12-22 07:01:50'),
(2, 28, 'Gift from Team Bluepen', 30, '2022-12-22 07:09:47'),
(3, 28, 'Bought User Contact', -30, '2022-12-22 14:13:48'),
(4, 29, 'Joining Bonus', 50, '2022-12-22 23:25:33'),
(5, 23, 'Joining Bonus', 20, '2023-01-30 05:05:11'),
(6, 34, 'Joining Bonus', 20, '2023-01-31 05:21:50'),
(7, 24, 'Joining Bonus', 20, '2023-02-01 03:48:45'),
(8, 34, 'Gift from Team Bluepen', 50, '2023-02-01 10:00:25'),
(9, 34, 'Gift from Team Bluepen', 70, '2023-02-01 10:03:51'),
(10, 34, 'Bought User Contact', -30, '2023-02-01 17:04:18'),
(11, 0, 'CREDIT', 120, '2023-02-15 07:06:43'),
(12, 0, 'CREDIT', 120, '2023-02-15 07:07:29'),
(13, 34, 'CREDIT', 120, '2023-02-15 07:07:51'),
(14, 34, 'CREDIT', 120, '2023-02-15 07:08:08'),
(15, 34, 'CREDIT', 50, '2023-02-15 07:16:14'),
(16, 34, 'CREDIT', 50, '2023-02-15 07:17:03'),
(17, 34, 'CREDIT', 50, '2023-02-15 07:18:15'),
(18, 34, 'CREDIT', 50, '2023-02-15 07:18:44'),
(19, 34, 'CREDIT', 50, '2023-02-15 07:20:16'),
(20, 34, 'CREDIT', 50, '2023-02-15 07:20:41'),
(21, 34, 'CREDIT', 50, '2023-02-15 07:21:23'),
(22, 34, 'CREDIT', 50, '2023-02-15 07:22:57'),
(23, 34, 'CREDIT', 50, '2023-02-15 07:23:43'),
(24, 34, 'Bought User Contact', -30, '2023-02-16 05:42:19'),
(25, 34, 'CREDIT', 50, '2023-02-18 03:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `writingmanager`
--

CREATE TABLE `writingmanager` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `old_email` text NOT NULL,
  `email` text NOT NULL,
  `number` text NOT NULL,
  `whatsapp_number` text NOT NULL,
  `city` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `writing_inquiries`
--

CREATE TABLE `writing_inquiries` (
  `id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `assignmentsed`
--
ALTER TABLE `assignmentsed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignmentstyping`
--
ALTER TABLE `assignmentstyping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_update`
--
ALTER TABLE `assignment_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_to_freelancer`
--
ALTER TABLE `assign_to_freelancer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_to_writer`
--
ALTER TABLE `assign_to_writer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blackbook`
--
ALTER TABLE `blackbook`
  ADD PRIMARY KEY (`blackbook_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_writer`
--
ALTER TABLE `blog_writer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bootcamp`
--
ALTER TABLE `bootcamp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brainheaters`
--
ALTER TABLE `brainheaters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brainheatershw`
--
ALTER TABLE `brainheatershw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coder`
--
ALTER TABLE `coder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coin_orders`
--
ALTER TABLE `coin_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contentwriter`
--
ALTER TABLE `contentwriter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contentwriting`
--
ALTER TABLE `contentwriting`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `dump_assignment`
--
ALTER TABLE `dump_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dump_copypaste`
--
ALTER TABLE `dump_copypaste`
  ADD PRIMARY KEY (`dump_id`);

--
-- Indexes for table `dump_freelancer`
--
ALTER TABLE `dump_freelancer`
  ADD PRIMARY KEY (`dump_id`);

--
-- Indexes for table `dump_writers`
--
ALTER TABLE `dump_writers`
  ADD PRIMARY KEY (`dump_id`);

--
-- Indexes for table `email_otp`
--
ALTER TABLE `email_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelance`
--
ALTER TABLE `freelance`
  ADD PRIMARY KEY (`freelancer_id`);

--
-- Indexes for table `freelancer_comments`
--
ALTER TABLE `freelancer_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_eligible`
--
ALTER TABLE `freelancer_eligible`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_reward_claims`
--
ALTER TABLE `freelancer_reward_claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_swing`
--
ALTER TABLE `freelancer_swing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_update`
--
ALTER TABLE `freelancer_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `god`
--
ALTER TABLE `god`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internbd`
--
ALTER TABLE `internbd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internhr`
--
ALTER TABLE `internhr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internpm`
--
ALTER TABLE `internpm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internwebtech`
--
ALTER TABLE `internwebtech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_reason`
--
ALTER TABLE `lost_reason`
  ADD PRIMARY KEY (`lost_id`);

--
-- Indexes for table `lost_reason_copypaste`
--
ALTER TABLE `lost_reason_copypaste`
  ADD PRIMARY KEY (`lost_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pprwriter`
--
ALTER TABLE `pprwriter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppt`
--
ALTER TABLE `ppt`
  ADD PRIMARY KEY (`ppt_id`);

--
-- Indexes for table `pptmaker`
--
ALTER TABLE `pptmaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translation`
--
ALTER TABLE `translation`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `typing`
--
ALTER TABLE `typing`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_select`
--
ALTER TABLE `users_select`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_bought_writer`
--
ALTER TABLE `user_bought_writer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_buy_coins`
--
ALTER TABLE `user_buy_coins`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_coins_upi_transactions`
--
ALTER TABLE `user_coins_upi_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_update`
--
ALTER TABLE `user_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wallet_transaction`
--
ALTER TABLE `user_wallet_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writer_bought_user`
--
ALTER TABLE `writer_bought_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writer_buy_coins`
--
ALTER TABLE `writer_buy_coins`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `writer_coins_upi_transactions`
--
ALTER TABLE `writer_coins_upi_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writer_swing`
--
ALTER TABLE `writer_swing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writer_update`
--
ALTER TABLE `writer_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writer_wallet_transaction`
--
ALTER TABLE `writer_wallet_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writingmanager`
--
ALTER TABLE `writingmanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writing_inquiries`
--
ALTER TABLE `writing_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `assignmentsed`
--
ALTER TABLE `assignmentsed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignmentstyping`
--
ALTER TABLE `assignmentstyping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment_update`
--
ALTER TABLE `assignment_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `assign_to_freelancer`
--
ALTER TABLE `assign_to_freelancer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_to_writer`
--
ALTER TABLE `assign_to_writer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blackbook`
--
ALTER TABLE `blackbook`
  MODIFY `blackbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog_writer`
--
ALTER TABLE `blog_writer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bootcamp`
--
ALTER TABLE `bootcamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brainheaters`
--
ALTER TABLE `brainheaters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brainheatershw`
--
ALTER TABLE `brainheatershw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1218;

--
-- AUTO_INCREMENT for table `coder`
--
ALTER TABLE `coder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coin_orders`
--
ALTER TABLE `coin_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contentwriter`
--
ALTER TABLE `contentwriter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contentwriting`
--
ALTER TABLE `contentwriting`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dump_assignment`
--
ALTER TABLE `dump_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dump_copypaste`
--
ALTER TABLE `dump_copypaste`
  MODIFY `dump_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dump_freelancer`
--
ALTER TABLE `dump_freelancer`
  MODIFY `dump_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dump_writers`
--
ALTER TABLE `dump_writers`
  MODIFY `dump_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_otp`
--
ALTER TABLE `email_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `freelance`
--
ALTER TABLE `freelance`
  MODIFY `freelancer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `freelancer_comments`
--
ALTER TABLE `freelancer_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancer_eligible`
--
ALTER TABLE `freelancer_eligible`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancer_reward_claims`
--
ALTER TABLE `freelancer_reward_claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancer_swing`
--
ALTER TABLE `freelancer_swing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `freelancer_update`
--
ALTER TABLE `freelancer_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `god`
--
ALTER TABLE `god`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internbd`
--
ALTER TABLE `internbd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internhr`
--
ALTER TABLE `internhr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internpm`
--
ALTER TABLE `internpm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internwebtech`
--
ALTER TABLE `internwebtech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lost_reason`
--
ALTER TABLE `lost_reason`
  MODIFY `lost_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lost_reason_copypaste`
--
ALTER TABLE `lost_reason_copypaste`
  MODIFY `lost_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `pprwriter`
--
ALTER TABLE `pprwriter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ppt`
--
ALTER TABLE `ppt`
  MODIFY `ppt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pptmaker`
--
ALTER TABLE `pptmaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translation`
--
ALTER TABLE `translation`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `typing`
--
ALTER TABLE `typing`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users_select`
--
ALTER TABLE `users_select`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_bought_writer`
--
ALTER TABLE `user_bought_writer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_buy_coins`
--
ALTER TABLE `user_buy_coins`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user_coins_upi_transactions`
--
ALTER TABLE `user_coins_upi_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_update`
--
ALTER TABLE `user_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_wallet_transaction`
--
ALTER TABLE `user_wallet_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `writer`
--
ALTER TABLE `writer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `writer_bought_user`
--
ALTER TABLE `writer_bought_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `writer_buy_coins`
--
ALTER TABLE `writer_buy_coins`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `writer_coins_upi_transactions`
--
ALTER TABLE `writer_coins_upi_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `writer_swing`
--
ALTER TABLE `writer_swing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `writer_update`
--
ALTER TABLE `writer_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `writer_wallet_transaction`
--
ALTER TABLE `writer_wallet_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `writingmanager`
--
ALTER TABLE `writingmanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `writing_inquiries`
--
ALTER TABLE `writing_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
