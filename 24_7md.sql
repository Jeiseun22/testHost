-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 08:26 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `24/7md`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`admin_id`, `first_name`, `last_name`, `birthdate`, `gender`, `email`, `password`) VALUES
(1, 'Marked', 'Lladones', '2003-04-19', 'male', 'lladones@gmail.com', 'admin123'),
(2, 'Kevin', 'Pastores', '1992-06-02', 'male', 'kev_pastores@yahoo.com', 'admin123'),
(3, 'Jason', 'Aballe', '1995-04-29', 'male', 'jeiseun22@gmail.com', 'admin123'),
(4, 'Norbert', 'Brucal', '1988-02-09', 'male', 'nbrucal97@yahoo.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`, `doctor_id`) VALUES
(1, 'ENT', 1),
(2, 'Family Medicine', 2),
(3, 'Internal Medicine', 3),
(4, 'Obstetrics', 4),
(5, 'Occupational Medicine', 5);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_accounts`
--

CREATE TABLE `doctor_accounts` (
  `doctor_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `status` enum('verified','non verified') NOT NULL,
  `prc_identification` text DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_accounts`
--

INSERT INTO `doctor_accounts` (`doctor_id`, `first_name`, `last_name`, `birthdate`, `gender`, `status`, `prc_identification`, `email`, `pass`) VALUES
(1, 'Abel', 'Helphinstine', '1991-09-09', 'male', 'non verified', NULL, 'helphinstine@gmail.com', 'helphinstine'),
(2, 'Zachary', 'Vandergriend', '1991-09-09', 'male', 'non verified', NULL, 'vandergriend@gmail.com', 'vandergriend'),
(3, 'Nehemiah ', 'Monestime', '1999-12-25', 'male', 'non verified', NULL, 'monestime@gmail.com', 'monestime'),
(4, 'Bong Bong ', 'Marcos', '1970-02-05', 'male', 'non verified', NULL, 'marcos@gmail.com', 'marcos'),
(5, 'Leni', 'Robredo', '1980-09-15', 'female', 'non verified', NULL, 'robredo@gmail.com', 'robredo');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_patients`
--

CREATE TABLE `doctor_patients` (
  `dp_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctors_note` text DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_patients`
--

INSERT INTO `doctor_patients` (`dp_id`, `appointment_id`, `doctor_id`, `doctors_note`, `service_id`, `patient_id`, `sched_id`, `department_id`) VALUES
(1, 1, 3, NULL, 2, 1, 2, 3),
(2, 2, 5, NULL, 2, 2, 8, 5),
(3, 3, 5, NULL, 3, 3, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `patient_accounts`
--

CREATE TABLE `patient_accounts` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_accounts`
--

INSERT INTO `patient_accounts` (`patient_id`, `first_name`, `last_name`, `birthdate`, `gender`, `email`, `password`) VALUES
(1, 'Claudia', 'Allen', '2000-01-01', 'female', 'claudia@gmail.com', 'claudia'),
(2, 'Ylenia', 'Allen', '2002-02-20', 'female', 'ylenia@gmail.com', 'ylenia'),
(3, 'Issa', 'Allen', '2005-04-19', 'female', 'issa@gmail.com', 'issa'),
(4, 'Dorcas', 'Cruz', '2015-09-17', 'male', 'dorcas@gmail.com', 'dorcas'),
(5, 'Gideon', 'Jordan', '2011-06-30', 'male', 'gideon@gmail.com', 'gideon');

-- --------------------------------------------------------

--
-- Table structure for table `patient_appointments`
--

CREATE TABLE `patient_appointments` (
  `appointment_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `complaint` text NOT NULL,
  `allergies` text NOT NULL,
  `appointment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_appointments`
--

INSERT INTO `patient_appointments` (`appointment_id`, `first_name`, `last_name`, `age`, `birthdate`, `gender`, `complaint`, `allergies`, `appointment_date`) VALUES
(1, 'Aminah', 'Taliesin', 23, '1999-01-28', 'female', 'Experiencing chest pain, acid reflux and persistent dry cough', 'NKA', '2022-11-19'),
(2, 'Joshua', 'Garcia', 25, '1997-10-07', 'male', 'Experiencing Cough and Colds after exposure to covid at work', 'NKA', '2022-11-23'),
(3, 'Joshua', 'Garcia', 25, '1997-10-07', 'male', 'Request for fit to work clearance after 7 days of quarantine due to covid exposure', 'NKA', '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `sched_id` int(11) NOT NULL,
  `days` varchar(50) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`sched_id`, `days`, `start_time`, `end_time`) VALUES
(1, 'Sunday', '12:00 AM', '1:00 AM'),
(2, 'Sunday', '1:00 AM', '2:00 AM'),
(3, 'Sunday', '2:00 AM', '3:00 AM'),
(4, 'Sunday', '3:00 AM', '4:00 AM'),
(5, 'Sunday', '4:00 AM', '5:00 AM'),
(6, 'Sunday', '5:00 AM', '6:00 AM'),
(7, 'Sunday', '6:00 AM', '7:00 AM'),
(8, 'Sunday', '7:00 AM', '8:00 AM'),
(9, 'Sunday', '8:00 AM', '9:00 AM'),
(10, 'Sunday', '9:00 AM', '10:00 AM'),
(11, 'Sunday', '10:00 AM', '11:00 AM'),
(12, 'Sunday', '11:00 AM', '12:00 PM'),
(13, 'Sunday', '12:00 PM', '1:00 PM'),
(14, 'Sunday', '1:00 PM', '2:00 PM'),
(15, 'Sunday', '2:00 PM', '3:00 PM'),
(16, 'Sunday', '3:00 PM', '4:00 PM'),
(17, 'Sunday', '4:00 PM', '5:00 PM'),
(18, 'Sunday', '5:00 PM', '6:00 PM'),
(19, 'Sunday', '6:00 PM', '7:00 PM'),
(20, 'Sunday', '7:00 PM', '8:00 PM'),
(21, 'Sunday', '8:00 PM', '9:00 PM'),
(22, 'Sunday', '9:00 PM', '10:00 PM'),
(23, 'Sunday', '10:00 PM', '11:00 PM'),
(24, 'Sunday', '11:00 PM', '12:00 AM'),
(25, 'Monday', '12:00 AM', '1:00 AM'),
(26, 'Monday', '1:00 AM', '2:00 AM'),
(27, 'Monday', '2:00 AM', '3:00 AM'),
(28, 'Monday', '3:00 AM', '4:00 AM'),
(29, 'Monday', '4:00 AM', '5:00 AM'),
(30, 'Monday', '5:00 AM', '6:00 AM'),
(31, 'Monday', '6:00 AM', '7:00 AM'),
(32, 'Monday', '7:00 AM', '8:00 AM'),
(33, 'Monday', '8:00 AM', '9:00 AM'),
(34, 'Monday', '9:00 AM', '10:00 AM'),
(35, 'Monday', '10:00 AM', '11:00 AM'),
(36, 'Monday', '11:00 AM', '12:00 PM'),
(37, 'Monday', '12:00 PM', '1:00 PM'),
(38, 'Monday', '1:00 PM', '2:00 PM'),
(39, 'Monday', '2:00 PM', '3:00 PM'),
(40, 'Monday', '3:00 PM', '4:00 PM'),
(41, 'Monday', '4:00 PM', '5:00 PM'),
(42, 'Monday', '5:00 PM', '6:00 PM'),
(43, 'Monday', '6:00 PM', '7:00 PM'),
(44, 'Monday', '7:00 PM', '8:00 PM'),
(45, 'Monday', '8:00 PM', '9:00 PM'),
(46, 'Monday', '9:00 PM', '10:00 PM'),
(47, 'Monday', '10:00 PM', '11:00 PM'),
(48, 'Monday', '11:00 PM', '12:00 AM'),
(49, 'Tuesday', '12:00 AM', '1:00 AM'),
(50, 'Tuesday', '1:00 AM', '2:00 AM'),
(51, 'Tuesday', '2:00 AM', '3:00 AM'),
(52, 'Tuesday', '3:00 AM', '4:00 AM'),
(53, 'Tuesday', '4:00 AM', '5:00 AM'),
(54, 'Tuesday', '5:00 AM', '6:00 AM'),
(55, 'Tuesday', '6:00 AM', '7:00 AM'),
(56, 'Tuesday', '7:00 AM', '8:00 AM'),
(57, 'Tuesday', '8:00 AM', '9:00 AM'),
(58, 'Tuesday', '9:00 AM', '10:00 AM'),
(59, 'Tuesday', '10:00 AM', '11:00 AM'),
(60, 'Tuesday', '11:00 AM', '12:00 PM'),
(61, 'Tuesday', '12:00 PM', '1:00 PM'),
(62, 'Tuesday', '1:00 PM', '2:00 PM'),
(63, 'Tuesday', '2:00 PM', '3:00 PM'),
(64, 'Tuesday', '3:00 PM', '4:00 PM'),
(65, 'Tuesday', '4:00 PM', '5:00 PM'),
(66, 'Tuesday', '5:00 PM', '6:00 PM'),
(67, 'Tuesday', '6:00 PM', '7:00 PM'),
(68, 'Tuesday', '7:00 PM', '8:00 PM'),
(69, 'Tuesday', '8:00 PM', '9:00 PM'),
(70, 'Tuesday', '9:00 PM', '10:00 PM'),
(71, 'Tuesday', '10:00 PM', '11:00 PM'),
(72, 'Tuesday', '11:00 PM', '12:00 AM'),
(73, 'Wednesday', '12:00 AM', '1:00 AM'),
(74, 'Wednesday', '1:00 AM', '2:00 AM'),
(75, 'Wednesday', '2:00 AM', '3:00 AM'),
(76, 'Wednesday', '3:00 AM', '4:00 AM'),
(77, 'Wednesday', '4:00 AM', '5:00 AM'),
(78, 'Wednesday', '5:00 AM', '6:00 AM'),
(79, 'Wednesday', '6:00 AM', '7:00 AM'),
(80, 'Wednesday', '7:00 AM', '8:00 AM'),
(81, 'Wednesday', '8:00 AM', '9:00 AM'),
(82, 'Wednesday', '9:00 AM', '10:00 AM'),
(83, 'Wednesday', '10:00 AM', '11:00 AM'),
(84, 'Wednesday', '11:00 AM', '12:00 PM'),
(85, 'Wednesday', '12:00 PM', '1:00 PM'),
(86, 'Wednesday', '1:00 PM', '2:00 PM'),
(87, 'Wednesday', '2:00 PM', '3:00 PM'),
(88, 'Wednesday', '3:00 PM', '4:00 PM'),
(89, 'Wednesday', '4:00 PM', '5:00 PM'),
(90, 'Wednesday', '5:00 PM', '6:00 PM'),
(91, 'Wednesday', '6:00 PM', '7:00 PM'),
(92, 'Wednesday', '7:00 PM', '8:00 PM'),
(93, 'Wednesday', '8:00 PM', '9:00 PM'),
(94, 'Wednesday', '9:00 PM', '10:00 PM'),
(95, 'Wednesday', '10:00 PM', '11:00 PM'),
(96, 'Wednesday', '11:00 PM', '12:00 AM'),
(97, 'Thursday', '12:00 AM', '1:00 AM'),
(98, 'Thursday', '1:00 AM', '2:00 AM'),
(99, 'Thursday', '2:00 AM', '3:00 AM'),
(100, 'Thursday', '3:00 AM', '4:00 AM'),
(101, 'Thursday', '4:00 AM', '5:00 AM'),
(102, 'Thursday', '5:00 AM', '6:00 AM'),
(103, 'Thursday', '6:00 AM', '7:00 AM'),
(104, 'Thursday', '7:00 AM', '8:00 AM'),
(105, 'Thursday', '8:00 AM', '9:00 AM'),
(106, 'Thursday', '9:00 AM', '10:00 AM'),
(107, 'Thursday', '10:00 AM', '11:00 AM'),
(108, 'Thursday', '11:00 AM', '12:00 PM'),
(109, 'Thursday', '12:00 PM', '1:00 PM'),
(110, 'Thursday', '1:00 PM', '2:00 PM'),
(111, 'Thursday', '2:00 PM', '3:00 PM'),
(112, 'Thursday', '3:00 PM', '4:00 PM'),
(113, 'Thursday', '4:00 PM', '5:00 PM'),
(114, 'Thursday', '5:00 PM', '6:00 PM'),
(115, 'Thursday', '6:00 PM', '7:00 PM'),
(116, 'Thursday', '7:00 PM', '8:00 PM'),
(117, 'Thursday', '8:00 PM', '9:00 PM'),
(118, 'Thursday', '9:00 PM', '10:00 PM'),
(119, 'Thursday', '10:00 PM', '11:00 PM'),
(120, 'Thursday', '11:00 PM', '12:00 AM'),
(121, 'Friday', '12:00 AM', '1:00 AM'),
(122, 'Friday', '1:00 AM', '2:00 AM'),
(123, 'Friday', '2:00 AM', '3:00 AM'),
(124, 'Friday', '3:00 AM', '4:00 AM'),
(125, 'Friday', '4:00 AM', '5:00 AM'),
(126, 'Friday', '5:00 AM', '6:00 AM'),
(127, 'Friday', '6:00 AM', '7:00 AM'),
(128, 'Friday', '7:00 AM', '8:00 AM'),
(129, 'Friday', '8:00 AM', '9:00 AM'),
(130, 'Friday', '9:00 AM', '10:00 AM'),
(131, 'Friday', '10:00 AM', '11:00 AM'),
(132, 'Friday', '11:00 AM', '12:00 PM'),
(133, 'Friday', '12:00 PM', '1:00 PM'),
(134, 'Friday', '1:00 PM', '2:00 PM'),
(135, 'Friday', '2:00 PM', '3:00 PM'),
(136, 'Friday', '3:00 PM', '4:00 PM'),
(137, 'Friday', '4:00 PM', '5:00 PM'),
(138, 'Friday', '5:00 PM', '6:00 PM'),
(139, 'Friday', '6:00 PM', '7:00 PM'),
(140, 'Friday', '7:00 PM', '8:00 PM'),
(141, 'Friday', '8:00 PM', '9:00 PM'),
(142, 'Friday', '9:00 PM', '10:00 PM'),
(143, 'Friday', '10:00 PM', '11:00 PM'),
(144, 'Friday', '11:00 PM', '12:00 AM'),
(145, 'Saturday', '12:00 AM', '1:00 AM'),
(146, 'Saturday', '1:00 AM', '2:00 AM'),
(147, 'Saturday', '2:00 AM', '3:00 AM'),
(148, 'Saturday', '3:00 AM', '4:00 AM'),
(149, 'Saturday', '4:00 AM', '5:00 AM'),
(150, 'Saturday', '5:00 AM', '6:00 AM'),
(151, 'Saturday', '6:00 AM', '7:00 AM'),
(152, 'Saturday', '7:00 AM', '8:00 AM'),
(153, 'Saturday', '8:00 AM', '9:00 AM'),
(154, 'Saturday', '9:00 AM', '10:00 AM'),
(155, 'Saturday', '10:00 AM', '11:00 AM'),
(156, 'Saturday', '11:00 AM', '12:00 PM'),
(157, 'Saturday', '12:00 PM', '1:00 PM'),
(158, 'Saturday', '1:00 PM', '2:00 PM'),
(159, 'Saturday', '2:00 PM', '3:00 PM'),
(160, 'Saturday', '3:00 PM', '4:00 PM'),
(161, 'Saturday', '4:00 PM', '5:00 PM'),
(162, 'Saturday', '5:00 PM', '6:00 PM'),
(163, 'Saturday', '6:00 PM', '7:00 PM'),
(164, 'Saturday', '7:00 PM', '8:00 PM'),
(165, 'Saturday', '8:00 PM', '9:00 PM'),
(166, 'Saturday', '9:00 PM', '10:00 PM'),
(167, 'Saturday', '10:00 PM', '11:00 PM'),
(168, 'Saturday', '11:00 PM', '12:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `services` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `services`) VALUES
(1, 'Follow-Up Check Up'),
(2, 'Online Consultation'),
(3, 'Request for Medical Certificate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `doctor_accounts`
--
ALTER TABLE `doctor_accounts`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_patients`
--
ALTER TABLE `doctor_patients`
  ADD PRIMARY KEY (`dp_id`);

--
-- Indexes for table `patient_accounts`
--
ALTER TABLE `patient_accounts`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_appointments`
--
ALTER TABLE `patient_appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_accounts`
--
ALTER TABLE `doctor_accounts`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_patients`
--
ALTER TABLE `doctor_patients`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_accounts`
--
ALTER TABLE `patient_accounts`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient_appointments`
--
ALTER TABLE `patient_appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
