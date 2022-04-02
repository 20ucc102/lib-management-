-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 06:42 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27160958_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookId` varchar(20) NOT NULL,
  `authorName` varchar(25) DEFAULT NULL,
  `bookName` varchar(70) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `edition` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'available'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `authorName`, `bookName`, `type`, `edition`, `status`) VALUES
('lib_bId@00001', 'Gautham ', 'The 3 Mistakes of My Life', 'others', '4', 'available'),
('lib_bId@00002', 'Pulkit', 'Introduction to business management', 'others', '5', 'available'),
('lib_bId@00003', 'Aditya', 'Introduction to computer programming', 'Programming', '4', 'available'),
('lib_bId@00004', 'Gurdeep', 'Introduction to data science', 'Programming', '7', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `firstname` varchar(25) DEFAULT NULL,
  `mobile` varchar(13) DEFAULT NULL,
  `gender` enum('m','f','o') DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `DateOfBirth` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`firstname`, `mobile`, `gender`, `email`, `PASSWORD`, `DateOfBirth`) VALUES
('Librarian ', '9347655125', 'm', '20ucc102@lnmiit.ac.in', '20ucc102', '2003-06-12'),
('somu Goutham reddy', '9347655125', 'm', 'gouthamreddysomu1@gmail.com', 'user@somu Goutham reddy702', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` varchar(20) NOT NULL,
  `s_id` varchar(20) DEFAULT NULL,
  `b_id` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `OrderStatus` varchar(20) DEFAULT 'placed',
  `due` decimal(5,2) DEFAULT 0.00
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `s_id`, `b_id`, `date`, `OrderStatus`, `due`) VALUES
('lib_oId@00001', 'lib_SId@00002', 'lib_bId@00003', '2021-05-17', 'placed', '0.00'),
('lib_oId@00002', 'lib_SId@00010', 'lib_bid@00003', '2021-07-22', 'placed', '0.00'),
('lib_oId@00003', 'lib_SId@00002', 'lib_bId@00003', '2021-11-12', 'placed', '0.00'),
('lib_oId@00004', 'lib_SId@00014', 'lib_bId@00003', '2021-11-26', 'returned', '0.00'),
('lib_oId@00005', 'lib_SId@00014', 'lib_bId@00004', '2021-11-26', 'placed', '0.00'),
('lib_oId@00006', 'lib_SId@00014', 'lib_bId@00003', '2021-11-26', 'returned', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(20) NOT NULL,
  `studentName` varchar(40) DEFAULT NULL,
  `mobile` varchar(13) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `gender` enum('m','f','o') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `studentName`, `mobile`, `email_id`, `gender`) VALUES
('lib_SId@00001', 'ismart', '83280808880', 'dastagiri@gmail.com', 'm'),
('lib_SId@00002', 'iliaz', '83280808880', 'ishaik5409@gmail.com', 'm'),
('lib_SId@00003', 'Shaik', '9247568667', '880@gmail.com', 'm'),
('lib_SId@00004', 'Priyanka', '8688957812', 'jyothipriyanka@gmail.com', 'f'),
('lib_SId@00005', 'Priyanka', '8688957812', 'jyothipriyanka@gmail.com', 'f'),
('lib_SId@00006', 'Priyanka', '8688957812', 'jyothipriyanka@gmail.com', 'f'),
('lib_SId@00007', 'Sailok Chinta', '7742913888', 'sailokchinta2012@gmail.com', 'm'),
('lib_SId@00008', 'Sailok Chinta', '7742913888000', 'sailokchinta2012@gmail.com', 'm'),
('lib_SId@00009', 'Sailok Chinta', '07742913888', 'sailokchinta2012@gmail.com', 'm'),
('lib_SId@00010', 'ncjdsnjvnjf', 'kdknvndk', 'example@gmail.com', 'm'),
('lib_SId@00011', 'aashna', '8287409622', '', ''),
('lib_SId@00012', 'aashna', '8287409622', '9990666149', 'f'),
('lib_SId@00013', 'gautham', '9440655458', 'xxxx@gmail.com', 'm'),
('lib_SId@00014', 'somu Goutham reddy', '9347655125', 'gouthamreddysomu1@gmail.com', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`),
  ADD UNIQUE KEY `bookName` (`bookName`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
