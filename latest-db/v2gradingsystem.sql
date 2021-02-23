-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 08:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v2gradingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `average`
--

CREATE TABLE `average` (
  `avg_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `first_grading` double NOT NULL DEFAULT 0,
  `second_grading` double NOT NULL DEFAULT 0,
  `third_grading` double NOT NULL DEFAULT 0,
  `fourth_grading` double NOT NULL DEFAULT 0,
  `general_average` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `average`
--

INSERT INTO `average` (`avg_id`, `sy_id`, `student_id`, `first_grading`, `second_grading`, `third_grading`, `fourth_grading`, `general_average`) VALUES
(1, 1, 5, 89, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `behavior`
--

CREATE TABLE `behavior` (
  `behavior_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grading` int(11) NOT NULL DEFAULT 0,
  `manners` double NOT NULL DEFAULT 0,
  `appearance` double NOT NULL DEFAULT 0,
  `dependability` double NOT NULL DEFAULT 0,
  `cooperation` double NOT NULL DEFAULT 0,
  `attendance` double NOT NULL DEFAULT 0,
  `initiative_and_resourcefulness` double NOT NULL DEFAULT 0,
  `leadership` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `behavior`
--

INSERT INTO `behavior` (`behavior_id`, `sy_id`, `subject_id`, `student_id`, `grading`, `manners`, `appearance`, `dependability`, `cooperation`, `attendance`, `initiative_and_resourcefulness`, `leadership`, `created_at`) VALUES
(1, 1, 1, 5, 3, 1, 2, 4, 5, 6, 0, 0, '2019-11-02 05:08:04'),
(2, 1, 1, 6, 3, 2, 2, 1, 3, 4, 5, 5, '2020-02-15 14:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `days_present`
--

CREATE TABLE `days_present` (
  `dp_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `aug` int(11) NOT NULL DEFAULT 0,
  `sep` int(11) NOT NULL DEFAULT 0,
  `oct` int(11) NOT NULL DEFAULT 0,
  `nov` int(11) NOT NULL DEFAULT 0,
  `december` int(11) NOT NULL DEFAULT 0,
  `jan` int(11) NOT NULL DEFAULT 0,
  `feb` int(11) NOT NULL DEFAULT 0,
  `mar` int(11) NOT NULL DEFAULT 0,
  `apr` int(11) NOT NULL DEFAULT 0,
  `may` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `quarter_first` double NOT NULL DEFAULT 0,
  `quarter_second` double NOT NULL DEFAULT 0,
  `quarter_third` double NOT NULL DEFAULT 0,
  `quarter_fourth` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `sy_id`, `subject_id`, `student_id`, `quarter_first`, `quarter_second`, `quarter_third`, `quarter_fourth`, `created_at`, `updated_on`) VALUES
(1, 1, 1, 5, 85, 0, 0, 0, '2019-10-15 14:36:11', '2019-10-15 14:36:11'),
(2, 1, 2, 5, 89, 0, 0, 0, '2019-10-15 14:39:04', '2019-10-15 14:39:04'),
(3, 1, 3, 5, 100, 100, 100, 100, '2019-10-15 14:39:12', '2019-10-15 14:39:12'),
(4, 1, 4, 5, 87, 0, 0, 0, '2019-10-15 14:39:21', '2019-10-15 14:39:21'),
(5, 1, 5, 5, 85, 0, 0, 0, '2019-10-15 14:39:30', '2019-10-15 14:39:30'),
(6, 1, 6, 5, 88, 0, 0, 0, '2019-10-15 14:39:39', '2019-10-15 14:39:39'),
(7, 1, 7, 5, 89, 0, 0, 0, '2019-10-15 14:39:52', '2019-10-15 14:39:52'),
(8, 1, 8, 5, 88, 0, 0, 0, '2019-10-15 14:40:01', '2019-10-15 14:40:01'),
(9, 1, 9, 5, 86, 0, 0, 0, '2019-10-15 14:40:11', '2019-10-15 14:40:11'),
(10, 1, 10, 5, 86, 0, 0, 0, '2019-10-15 14:40:35', '2019-10-15 14:40:35'),
(11, 1, 11, 5, 88, 0, 0, 0, '2019-10-15 14:40:43', '2019-10-15 14:40:43'),
(12, 1, 12, 5, 89, 0, 0, 0, '2019-10-15 14:40:52', '2019-10-15 14:40:52'),
(13, 1, 1, 6, 0, 0, 56, 0, '2019-11-03 04:19:07', '2019-11-03 04:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `grade_deadline`
--

CREATE TABLE `grade_deadline` (
  `gd_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `date_deadline` text NOT NULL,
  `time_deadline` text NOT NULL,
  `grading` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_deadline`
--

INSERT INTO `grade_deadline` (`gd_id`, `sy_id`, `date_deadline`, `time_deadline`, `grading`) VALUES
(1, 1, 'Mar 10, 2020', '21:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `link` longtext NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `description`, `link`, `date_created`) VALUES
(1, 'Teacher Teacher updated Pamela Math1 third grading grade in 2019-2020 scool year.', '', '2019-11-02 12:53:36'),
(2, 'Teacher Teacher added Pamela Math1 third grading behavior in 2019-2020 scool year.', '', '2019-11-02 13:08:04'),
(3, 'Teacher Teacher updated Pamela Math1 third grading behavior in 2019-2020 scool year.', '', '2019-11-02 13:08:14'),
(4, 'Teacher Teacher updated Pamela Math1 third grading grade in 2019-2020 scool year.', '', '2019-11-02 13:08:20'),
(5, '<b>Teacher Teacher</b> updated Pamela Math1 third grading grade in 2019-2020 scool year.', '', '2019-11-02 20:10:06'),
(6, '<b>Teacher Teacher</b> updated <b class=\'text-green\'>Pamela</b> Math1 third grading grade in 2019-2020 scool year.', '', '2019-11-02 20:12:54'),
(7, '<b>Teacher Teacher</b> updated <small class=\'text-green\'>Pamela</small> Math1 third grading grade in 2019-2020 scool year.', '', '2019-11-02 20:14:20'),
(8, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> Math1 third grading grade in 2019-2020 scool year.', '', '2019-11-02 20:14:53'),
(9, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2019-11-02 20:17:15'),
(10, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2019-11-02 20:17:24'),
(11, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2019-11-02 20:17:34'),
(12, '<b>Teacher Teacher</b> added <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2019-11-03 12:19:07'),
(13, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> Math1 third grading grade in 2019-2020 scool year.', '', '2019-11-03 21:34:37'),
(14, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> Math1 third grading grade in 2019-2020 scool year.', '', '2019-11-03 21:38:41'),
(15, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 20:54:49'),
(16, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 21:04:49'),
(17, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 21:04:59'),
(18, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 21:04:59'),
(19, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 21:06:54'),
(20, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 21:07:15'),
(21, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 21:07:33'),
(22, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 21:20:04'),
(23, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 21:20:10'),
(24, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 21:20:16'),
(25, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 21:23:00'),
(26, '<b>Teacher Teacher</b> added <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:33:02'),
(27, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:33:34'),
(28, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:34:17'),
(29, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:34:46'),
(30, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:35:10'),
(31, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:35:37'),
(32, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:35:44'),
(33, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:36:20'),
(34, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:36:27'),
(35, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:39:44'),
(36, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 22:40:22'),
(37, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:48:00'),
(38, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:50:36'),
(39, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading behavior in 2019-2020 scool year.', '', '2020-02-15 22:51:12'),
(40, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Melvin</span> Math1 third grading grade in 2019-2020 scool year.', '', '2020-02-15 22:51:24'),
(41, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English first grading grade in 2019-2020 scool year.', '', '2020-02-23 13:26:55'),
(42, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English first grading grade in 2019-2020 scool year.', '', '2020-02-23 13:41:27'),
(43, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English first grading grade in 2019-2020 scool year.', '', '2020-02-23 13:43:54'),
(44, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English first grading grade in 2019-2020 scool year.', '', '2020-02-23 13:44:23'),
(45, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English first grading grade in 2019-2020 scool year.', '', '2020-02-23 13:44:53'),
(46, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English first grading grade in 2019-2020 scool year.', '', '2020-02-23 13:47:27'),
(47, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English first grading grade in 2019-2020 scool year.', '', '2020-02-23 13:48:35'),
(48, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English first grading grade in 2019-2020 scool year.', '', '2020-02-23 13:48:49'),
(49, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English secong grading grade in 2019-2020 scool year.', '', '2020-02-23 13:50:05'),
(50, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English secong grading grade in 2019-2020 scool year.', '', '2020-02-23 13:50:17'),
(51, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English third grading grade in 2019-2020 scool year.', '', '2020-02-23 13:50:45'),
(52, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English third grading grade in 2019-2020 scool year.', '', '2020-02-23 13:51:02'),
(53, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English fourth grading grade in 2019-2020 scool year.', '', '2020-02-23 13:51:17'),
(54, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English fourth grading grade in 2019-2020 scool year.', '', '2020-02-23 13:51:21'),
(55, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English fourth grading grade in 2019-2020 scool year.', '', '2020-02-23 13:51:25'),
(56, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English fourth grading grade in 2019-2020 scool year.', '', '2020-02-23 13:51:55'),
(57, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English fourth grading grade in 2019-2020 scool year.', '', '2020-02-23 13:52:12'),
(58, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English fourth grading grade in 2019-2020 scool year.', '', '2020-02-23 13:52:47'),
(59, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English fourth grading grade in 2019-2020 scool year.', '', '2020-02-23 13:53:38'),
(60, '<b>Teacher Teacher</b> updated <span class=\'text-green\'>Pamela</span> English fourth grading grade in 2019-2020 scool year.', '', '2020-02-23 13:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grading` varchar(50) NOT NULL,
  `reason` longtext NOT NULL,
  `request_attempt` int(11) NOT NULL,
  `deadline_date` varchar(100) NOT NULL,
  `req_status` varchar(100) NOT NULL,
  `requested_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `sy_id`, `student_id`, `teacher_id`, `subject_id`, `grading`, `reason`, `request_attempt`, `deadline_date`, `req_status`, `requested_at`) VALUES
(19, 1, 5, 2, 15, '3', 'awdawdawd1143434', 4, '10/16/2019', 'Accepted', '2019-10-12 22:36:59'),
(23, 1, 5, 2, 1, '4', 'awdawdad', 1, '', 'Pending', '2020-01-26 12:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `sy_id` int(11) NOT NULL,
  `start_year` int(11) NOT NULL,
  `end_year` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`sy_id`, `start_year`, `end_year`, `added_on`) VALUES
(1, 2019, 2020, '2019-09-01 12:47:52'),
(2, 2021, 2022, '2020-02-01 12:55:38'),
(3, 2023, 2024, '2020-02-02 14:54:19'),
(4, 2024, 2025, '2020-02-02 14:54:43'),
(5, 2026, 2027, '2020-02-02 14:56:24'),
(6, 2028, 2029, '2020-02-02 14:56:43'),
(7, 2027, 2028, '2020-03-15 08:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear_students`
--

CREATE TABLE `schoolyear_students` (
  `sy_std_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `grade_level` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolyear_students`
--

INSERT INTO `schoolyear_students` (`sy_std_id`, `sy_id`, `grade_level`, `student_id`) VALUES
(5, 1, 'grade-7', 5),
(6, 1, 'grade-7', 6),
(7, 1, 'grade-7', 7),
(8, 1, 'grade-7', 8),
(9, 1, 'grade-7', 9),
(10, 1, 'grade-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_days`
--

CREATE TABLE `school_days` (
  `sd_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `aug` int(11) NOT NULL DEFAULT 0,
  `sep` int(11) NOT NULL DEFAULT 0,
  `oct` int(11) NOT NULL DEFAULT 0,
  `nov` int(11) NOT NULL DEFAULT 0,
  `december` int(11) NOT NULL DEFAULT 0,
  `jan` int(11) NOT NULL DEFAULT 0,
  `feb` int(11) NOT NULL DEFAULT 0,
  `mar` int(11) NOT NULL DEFAULT 0,
  `apr` int(11) NOT NULL DEFAULT 0,
  `may` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_days`
--

INSERT INTO `school_days` (`sd_id`, `sy_id`, `student_id`, `aug`, `sep`, `oct`, `nov`, `december`, `jan`, `feb`, `mar`, `apr`, `may`, `total`, `updated_on`) VALUES
(1, 1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, '2019-09-15 08:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `age` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `student_no` varchar(100) NOT NULL,
  `lrn` varchar(100) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `age`, `birthdate`, `gender`, `student_no`, `lrn`, `status`) VALUES
(1, 'Terry1', '0', '1997-02-12', 'Male', '123', '456', 1),
(2, 'CHan', '0', '2000-02-12', 'Male', '567', '894', 1),
(3, 'Jane', '0', '2000-02-12', 'Female', '987', '674', 1),
(4, 'Rocel', '0', '2000-02-12', 'Female', '79', '767', 1),
(5, 'Pamela', '0', '2001-02-12', 'FEmale', '876', '2324', 1),
(6, 'Melvin', '0', '2002-02-12', 'Male', '24', '534', 1),
(7, 'Juphet', '0', '1999-02-12', 'Male', '545', '867', 1),
(8, 'Kim', '0', '2000-02-12', 'Female', '9797', '8798', 1),
(9, 'Jay-ann', '0', '2002-02-12', 'Female', '85', '6576', 1),
(12, 'Cruiser', '0', '2000-02-12', 'Anna', '2', '2', 1),
(13, 'Uy', '0', '2000-02-12', 'Leonardo', '3', '3', 1),
(14, 'Tom', '0', '2000-02-12', 'Matt', '4', '4', 1),
(15, 'aa1', '0', '2000-02-12', 'Marion', '5', '5', 1),
(16, 'aa2', '0', '2000-02-12', 'Brock', '6', '6', 1),
(17, 'aa3', '0', '2000-02-12', 'Matt', '7', '7', 1),
(18, 'aa4', '0', '2000-02-12', 'Brock', '8', '8', 1),
(24, 'ss1', '0', '2000-02-12', 'Cory', '9', '9', 1),
(25, 'ss2', '0', '2000-02-12', 'Matt', '10', '10', 1),
(26, 'Cristina Paragess', '0', '2000-02-12', 'Female', '123456', '654321', 1),
(27, 'Sample121', '', '1980-01-02', 'Female', '121', '121', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `credit_unit` double NOT NULL,
  `semester` int(11) NOT NULL,
  `assigned_teacher` int(11) NOT NULL,
  `grade_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `sy_id`, `subject_name`, `credit_unit`, `semester`, `assigned_teacher`, `grade_level`) VALUES
(1, 1, 'Math1', 1.66, 2, 2, 'grade-7'),
(2, 1, 'Science ', 1.7, 2, 2, 'grade-7'),
(3, 1, 'English', 1.3, 0, 2, 'grade-7'),
(4, 1, 'Filipino', 1, 0, 2, 'grade-7'),
(5, 1, 'AP', 1, 0, 2, 'grade-7'),
(6, 1, 'EP', 1, 0, 2, 'grade-7'),
(7, 1, 'Math2', 0.7, 0, 2, 'grade-7'),
(8, 1, 'Science 2', 0.7, 0, 2, 'grade-7'),
(9, 1, 'English 2', 0.3, 0, 2, 'grade-7'),
(10, 1, 'Filipino2', 0.3, 0, 2, 'grade-7'),
(11, 1, 'AP2', 0.3, 0, 2, 'grade-7'),
(12, 1, 'EP2', 0.3, 0, 2, 'grade-7'),
(13, 1, 'Math', 1.66, 1, 13, 'grade-12'),
(14, 1, 'English', 1.77, 1, 13, 'grade-12'),
(15, 1, 'Sample', 1.66, 0, 0, 'grade-12'),
(16, 1, 'Sample', 1.22, 1, 19, 'grade-7'),
(17, 1, 'awdwadwad', 1.1, 1, 14, 'grade-7'),
(18, 6, 'AP', 1.1, 1, 2, 'grade-7'),
(19, 6, 'ssssssssss', 1.1, 2, 2, 'grade-7'),
(23, 1, 'QQQQ', 1.1, 1, 0, 'grade-7');

-- --------------------------------------------------------

--
-- Table structure for table `times_tardy`
--

CREATE TABLE `times_tardy` (
  `tt_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `aug` int(11) NOT NULL DEFAULT 0,
  `sep` int(11) NOT NULL DEFAULT 0,
  `oct` int(11) NOT NULL DEFAULT 0,
  `nov` int(11) NOT NULL DEFAULT 0,
  `december` int(11) NOT NULL DEFAULT 0,
  `jan` int(11) NOT NULL DEFAULT 0,
  `feb` int(11) NOT NULL DEFAULT 0,
  `mar` int(11) NOT NULL DEFAULT 0,
  `apr` int(11) NOT NULL DEFAULT 0,
  `may` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `active` int(5) NOT NULL DEFAULT 1,
  `user_type` varchar(60) NOT NULL,
  `profile_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `created_on`, `active`, `user_type`, `profile_img`) VALUES
(1, 'Prowezasver Tewst1aSS', 'Sues', 'example@proweaver.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-09-01 20:46:55', 1, 'admin', ''),
(2, 'Teacher', 'Teacher', 'teach@up.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-09-01 20:53:39', 1, 'teacher', ''),
(3, 'Chan', 'Chans', 'chan@up.com', '46ff45e5656b0eaeb549120dae2c69e0', '2019-10-12 10:52:34', 1, 'superadmin', ''),
(4, 'Tomss', 'Tom', 'sample@up.com', '46ff45e5656b0eaeb549120dae2c69e0', '2019-11-03 13:32:14', 1, 'admin', ''),
(7, 'Proweaver Test', 'Sue', 'sq@proweaver.com', '46ff45e5656b0eaeb549120dae2c69e0', '2019-11-03 13:43:05', 1, 'superadmin', ''),
(13, 'Proweaver Test', 'Marion', 'example2@proweaver.com', '46ff45e5656b0eaeb549120dae2c69e0', '2019-11-03 16:25:48', 1, 'teacher', ''),
(14, 'Proweaver Test', 'Terry', 'example3@proweaver.com', '46ff45e5656b0eaeb549120dae2c69e0', '2019-11-03 16:25:57', 1, 'teacher', ''),
(19, 'Proweaver Test', 'Mull', 'sssss@proweaver.com', '46ff45e5656b0eaeb549120dae2c69e0', '2020-01-21 22:21:30', 1, 'teacher', ''),
(20, 'Proweaver Testawdwadawd', 'Terry', 'exampawdawdawdle@proweaver.com', '46ff45e5656b0eaeb549120dae2c69e0', '2020-01-21 22:21:48', 1, 'teacher', ''),
(21, 'CHAN', 'fdc', 'chan@fdc.com', '46ff45e5656b0eaeb549120dae2c69e0', '2020-02-23 11:17:24', 1, 'teacher', ''),
(22, 'Marry', 'FDC', 'marry@fdc.com', '46ff45e5656b0eaeb549120dae2c69e0', '2020-02-23 11:18:12', 1, 'teacher', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `average`
--
ALTER TABLE `average`
  ADD PRIMARY KEY (`avg_id`);

--
-- Indexes for table `behavior`
--
ALTER TABLE `behavior`
  ADD PRIMARY KEY (`behavior_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `grade_deadline`
--
ALTER TABLE `grade_deadline`
  ADD PRIMARY KEY (`gd_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `schoolyear_students`
--
ALTER TABLE `schoolyear_students`
  ADD PRIMARY KEY (`sy_std_id`);

--
-- Indexes for table `school_days`
--
ALTER TABLE `school_days`
  ADD PRIMARY KEY (`sd_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `average`
--
ALTER TABLE `average`
  MODIFY `avg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `behavior`
--
ALTER TABLE `behavior`
  MODIFY `behavior_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `grade_deadline`
--
ALTER TABLE `grade_deadline`
  MODIFY `gd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schoolyear_students`
--
ALTER TABLE `schoolyear_students`
  MODIFY `sy_std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `school_days`
--
ALTER TABLE `school_days`
  MODIFY `sd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
