-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 11:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sm_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `user_id` char(10) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `user_mail` varchar(80) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_role` varchar(40) NOT NULL,
  `user_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`user_id`, `user_name`, `user_mail`, `user_pwd`, `user_role`, `user_status`) VALUES
('002', 'tharu', 'tharu@gmail.com', '123', 'Principle', 1),
('003', 'tharu', 'tharu@mail.com', '202cb962ac59075b964b07152d234b70', 'Principle', 1),
('Emp0001', 'kamal Bandara', 'kamal@gmail.com', '202cb962ac59075b964b07152d234b70', 'Principle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stu_tbl`
--

CREATE TABLE `stu_tbl` (
  `stu_id` char(10) NOT NULL,
  `stu_name` varchar(80) NOT NULL,
  `stu_nic` char(12) NOT NULL,
  `stu_phone` char(10) NOT NULL,
  `stu_mail` varchar(80) NOT NULL,
  `stu_add` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu_tbl`
--

INSERT INTO `stu_tbl` (`stu_id`, `stu_name`, `stu_nic`, `stu_phone`, `stu_mail`, `stu_add`) VALUES
('Stu0001', 'Nimal Perera', '958745215V', '0775698115', 'Nimal@gmail.com', 'Kandy');

-- --------------------------------------------------------

--
-- Table structure for table `tea_tbl`
--

CREATE TABLE `tea_tbl` (
  `tea_id` char(10) NOT NULL,
  `tea_name` varchar(80) NOT NULL,
  `tea_nic` char(12) NOT NULL,
  `tea_phone` char(10) NOT NULL,
  `tea_mail` varchar(80) NOT NULL,
  `tea_add` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tea_tbl`
--

INSERT INTO `tea_tbl` (`tea_id`, `tea_name`, `tea_nic`, `tea_phone`, `tea_mail`, `tea_add`) VALUES
('Tea0002', 'Amali perer', '7895687425V', '0715566782', 'amali@gmail.com', 'kandy'),
('Tea0004', 'Amali perer', '7895687425V', '0715566782', 'amali@gmail.com', 'kandy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `stu_tbl`
--
ALTER TABLE `stu_tbl`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `tea_tbl`
--
ALTER TABLE `tea_tbl`
  ADD PRIMARY KEY (`tea_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
