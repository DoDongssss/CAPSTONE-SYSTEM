-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2022 at 02:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `announcement` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `IS_EXIST` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `announcement`, `status`, `IS_EXIST`) VALUES
(2, 'WELCOME BACK TO SCHOOLS', 1, 1),
(10, '---OBSERVE SOCIAL DISTANCING---', 1, 1),
(77, 'WELCOME BACK TO SCHOOLs', 0, 0),
(78, 'WELCOME BACK TO SCHOOLS', 0, 0),
(79, 'WELCOME BACK TO SCHOOL', 1, 0),
(80, 'WELCOME BACK TO SCHOOL', 0, 0),
(81, 'WELCOME BACK TO SCHOOLS', 0, 0),
(82, 'WELCOME BACK TO SCHOOLS', 0, 0),
(83, 'dsadasSDAS', 0, 0),
(84, 'dsadasdsadsadsasad', 0, 0),
(85, 'Palayo kamo', 0, 0),
(86, 'KUNG GWAPA KA KASULOD JUD KA', 0, 1),
(87, 'sdasdas', 1, 0),
(88, 'sadasdas', 1, 0),
(89, 'sadasdas', 1, 0),
(90, 'sadasdas', 0, 0),
(91, 'BAWAL PANGIT DIRI LODS', 0, 1),
(92, 'WELCOME BACK TO SCHOOLS', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(15) NOT NULL,
  `rfid` int(15) NOT NULL,
  `lrn` int(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `timein-am` text NOT NULL,
  `timeout-am` text NOT NULL,
  `timein-pm` text NOT NULL,
  `timeout-pm` text NOT NULL,
  `date` date NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IS_EXIST` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `rfid`, `lrn`, `grade`, `section`, `fullname`, `timein-am`, `timeout-am`, `timein-pm`, `timeout-pm`, `date`, `updatedAt`, `IS_EXIST`) VALUES
(196, 2354450, 2018954, 'Grade1', 'Flaming', 'Asumbra Johnny A', '', '', '11:47:53', '11:48:00', '2022-09-20', '2022-09-20 04:03:25', 1),
(197, 2368550, 2015113, 'Grade1', 'Brown', 'Tuazon Fritz C', '', '', '11:48:03', '11:48:05', '2022-09-20', '2022-09-20 03:48:05', 1),
(198, 1911930, 2015225, 'Grade2', 'Mindanao', 'TunaIsdaISdaIs Gil Jason B', '', '', '11:48:07', '11:48:09', '2022-09-20', '2022-09-21 14:39:11', 1),
(199, 2354450, 2018954, 'Grade1', 'Flaming', 'Asumbra Johnny A', '', '', '22:18:57', '22:20:33', '2022-09-21', '2022-09-21 14:20:33', 1),
(200, 2368550, 2015113, 'Grade1', 'Brown', 'Tuazon Fritz C', '', '', '22:19:37', '22:20:23', '2022-09-21', '2022-09-21 14:20:23', 1),
(201, 1911930, 2015225, 'Grade2', 'Mindanao', 'TunaIsdaISdaIs Gil Jason B', '', '', '22:19:41', '22:20:27', '2022-09-21', '2022-09-21 14:39:11', 1),
(202, 810130, 2090902, 'Grade10', 'Newton', 'Sustiguer Zachery Z', '', '', '23:05:34', '23:05:50', '2022-09-21', '2022-09-21 15:05:50', 1),
(203, 1555620, 2020201, 'Grade2', 'Luzon', 'Emboltorio Spencer S', '', '', '23:05:38', '23:05:47', '2022-09-21', '2022-09-21 15:05:47', 1),
(204, 2750630, 2020392, 'Grade2', 'Mindanao', 'Cristobal Clyde C', '', '', '23:05:42', '23:05:45', '2022-09-21', '2022-09-21 15:05:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `ratings` int(10) NOT NULL,
  `sms` text NOT NULL,
  `IS_EXIST` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `ratings`, `sms`, `IS_EXIST`) VALUES
(66, 5, 'Satisfied already!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `grade` varchar(150) NOT NULL,
  `IS_EXIST` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `grade`, `IS_EXIST`) VALUES
(1, 'Grade1', 1),
(2, 'Grade2', 1),
(3, 'Grade3', 1),
(4, 'Grade4', 1),
(5, 'Grade5', 1),
(6, 'Grade6', 1),
(7, 'Grade7', 1),
(8, 'Grade8', 1),
(9, 'Grade9', 1),
(10, 'Grade10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grade-section`
--

CREATE TABLE `grade-section` (
  `id` int(11) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `IS_EXIST` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade-section`
--

INSERT INTO `grade-section` (`id`, `grade`, `section`, `total`, `IS_EXIST`) VALUES
(1, 'Grade1', 'Mabini', 0, 1),
(2, 'Grade1', 'Rizal', 0, 0),
(3, 'Grade1', 'Brown', 0, 1),
(4, 'Grade1', 'Flaming', 0, 1),
(5, 'Grade2', 'Luzon', 0, 1),
(18, 'Grade3', 'dsadsadas', 0, 0),
(19, 'Grade10', 'Antena', 0, 0),
(20, 'Grade10', 'Antena', 0, 0),
(21, 'Grade10', 'Antena', 0, 0),
(22, 'Grade9', 'Sukarap', 0, 0),
(23, 'Grade9', 'Bahoilok', 0, 0),
(24, 'Grade9', 'Bahog baba', 0, 0),
(25, 'Grade9', 'Bahog baba og ilong', 0, 0),
(26, 'Grade7', 'Iskamborde', 0, 0),
(27, 'Grade6', 'dsadas', 0, 0),
(28, 'Grade6', 'dsadasaa', 0, 0),
(29, 'Grade6', 'dsadasaadsada', 0, 0),
(30, 'Grade6', 'dsadasaadsadadsadas', 0, 0),
(31, 'Grade5', 'dsadasaadsadadsadas', 0, 0),
(32, 'Grade2', 'dsadsa', 0, 0),
(33, 'Grade5', 'dsad', 0, 0),
(34, 'Grade3', 'dsadas', 0, 0),
(35, 'Grade1', 'Mabini', 0, 0),
(36, 'Grade1', 'q', 0, 0),
(37, 'Grade1', 'Luzon', 0, 0),
(38, 'Grade3', 'a', 0, 0),
(39, 'Grade3', 'b', 0, 0),
(40, 'Grade3', 'c', 0, 0),
(41, 'Grade3', 'd', 0, 0),
(42, 'Grade3', 'e', 0, 0),
(43, 'Grade2', 'a', 0, 0),
(44, 'Grade2', 'b', 0, 0),
(45, 'Grade2', 'c', 0, 0),
(46, 'Grade10', 'Newton', 0, 1),
(47, 'Grade2', 'Mindanao', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login-admin`
--

CREATE TABLE `login-admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `IS_EXIST` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login-admin`
--

INSERT INTO `login-admin` (`id`, `username`, `password`, `IS_EXIST`) VALUES
(1, 'Admin', '$2y$10$i3oH.Lnx.ULR1IoVprhw1eYnpdrAOwx4ors8hMpNOjQgJrJE9vDhy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login-teacher`
--

CREATE TABLE `login-teacher` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `flagstatus` time NOT NULL,
  `IS_EXIST` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login-teacher`
--

INSERT INTO `login-teacher` (`id`, `username`, `password`, `updateAt`, `flagstatus`, `IS_EXIST`) VALUES
(2, '2018954', '$2y$10$fwY02p2meDuG0lCnuLXPW.2cYOnFKPiOP55lu6seqWqH.hIdCZgg6', '2022-10-01 09:42:45', '17:42:45', 1),
(3, '2018955', '$2y$10$yjlRGtiymq/f8kEgSmrXgeC06yDPXd8KbQEjrH3yCvD0JkXQOO1e.', '2022-10-02 04:23:38', '12:23:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section` varchar(150) NOT NULL,
  `IS_EXIST` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section`, `IS_EXIST`) VALUES
(1, 'Mabini', 1),
(2, 'Rizal', 1),
(3, 'Brown', 1),
(4, 'Flaming', 1),
(5, 'Newton', 1),
(6, 'Jade', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student-information`
--

CREATE TABLE `student-information` (
  `id` int(11) NOT NULL,
  `profile` varchar(250) NOT NULL,
  `RFID` int(50) NOT NULL,
  `LRN` int(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `MI` varchar(10) NOT NULL,
  `birthdate` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `grade` varchar(150) NOT NULL,
  `section` varchar(50) NOT NULL,
  `parent` varchar(50) NOT NULL,
  `parentno` varchar(11) NOT NULL,
  `IS_EXIST` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student-information`
--

INSERT INTO `student-information` (`id`, `profile`, `RFID`, `LRN`, `lastname`, `firstname`, `MI`, `birthdate`, `gender`, `address`, `grade`, `section`, `parent`, `parentno`, `IS_EXIST`) VALUES
(25, 'tuna.jpg', 1911930, 2015225, 'TunaIsdaISdaIs', 'Gil Jason', 'B', '2022-08-20', 'Male', 'Koronadal Ctiy, South Cotabato', 'Grade2', 'Mindanao', 'Tuna Mario B', '09098314818', 1),
(26, 'tuazon.jpg', 2368550, 2015113, 'Tuazon', 'Fritz', 'C', '2022-08-16', 'Male', 'Koronadal Ctiy, South Cotabato', 'Grade1', 'Brown', 'Tuazon Ritz C', '09090909321', 1),
(27, 'cristobal.jpg', 2750630, 2020392, 'Cristobal', 'Clyde', 'C', '2022-08-27', 'Male', 'Koronadal Ctiy, South Cotabato', 'Grade2', 'Mindanao', 'Mr. and Mrs. Cristobal', '09099090321', 1),
(28, '1.jpg', 2354450, 2018954, 'Asumbra', 'Johnny', 'A', '2000-03-30', 'Male', 'Poblacion Tampakan South Cotabato', 'Grade1', 'Flaming', 'Leonidisa C. Alinsugay', '09098314181', 1),
(29, 'emboltorio.jpg', 1555620, 2020201, 'Emboltorio', 'Spencer', 'S', '2022-08-18', 'Female', 'Koronadal Ctiy, South Cotabato', 'Grade2', 'Luzon', 'Mr. and Mrs. Emboltorio', '09938976123', 1),
(32, 'sustiguer.jpg', 810130, 2090902, 'Sustiguer', 'Zachery', 'Z', '2022-09-02', 'Female', 'Koronadal Ctiy, South Cotabato', 'Grade10', 'Newton', 'Mr. and Mrs. Sustiguer', '09897867543', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher-information`
--

CREATE TABLE `teacher-information` (
  `id` int(11) NOT NULL,
  `teacherid` int(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `repassword` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(15) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `IS_EXIST` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher-information`
--

INSERT INTO `teacher-information` (`id`, `teacherid`, `password`, `repassword`, `email`, `mobile`, `lastname`, `firstname`, `IS_EXIST`) VALUES
(8, 2018955, '$2y$10$mbgiomIxzIt028j4iedufOXExGAE/u.F6elnSubjLMOP.DY59oou.', '$2y$10$JL05drkMKoKGWD3K\\/As8HOYONSRb83BuUDdUzMHl6A', 'xchitts@gmail.com', 2147483647, 'Asumbra', 'Johnny', 1),
(13, 2018954, '$2y$10$fwY02p2meDuG0lCnuLXPW.2cYOnFKPiOP55lu6seqWqH.hIdCZgg6', '$2y$10$fwY02p2meDuG0lCnuLXPW.2cYOnFKPiOP55lu6seqWqH.hIdCZgg6', 'TunaGilJason@gmail.com', 2147483647, 'Tuna', 'Gil Jason', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade-section`
--
ALTER TABLE `grade-section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login-admin`
--
ALTER TABLE `login-admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login-teacher`
--
ALTER TABLE `login-teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student-information`
--
ALTER TABLE `student-information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher-information`
--
ALTER TABLE `teacher-information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `grade-section`
--
ALTER TABLE `grade-section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `login-admin`
--
ALTER TABLE `login-admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login-teacher`
--
ALTER TABLE `login-teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student-information`
--
ALTER TABLE `student-information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `teacher-information`
--
ALTER TABLE `teacher-information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
