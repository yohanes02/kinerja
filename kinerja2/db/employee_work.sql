-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 05:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_work`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspect`
--

CREATE TABLE `aspect` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `core_weight` int(11) NOT NULL,
  `secondary_weight` int(11) NOT NULL,
  `weight` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aspect`
--

INSERT INTO `aspect` (`id`, `name`, `core_weight`, `secondary_weight`, `weight`) VALUES
(6, 'Aspek 1', 70, 30, 30),
(7, 'Aspek 2', 70, 30, 70);

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` int(11) NOT NULL,
  `target` int(2) NOT NULL,
  `aspect_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `name`, `type`, `target`, `aspect_id`, `dept_id`) VALUES
(19, 'Aspek 1 : Kriteria Core 1', 1, 4, 6, 1),
(20, 'Aspek 1 : Kriteria Core 2', 1, 3, 6, 1),
(21, 'Aspek 1 : Kriteria Secondary 1', 2, 5, 6, 1),
(22, 'Aspek 2 : Kriteria Core 1', 1, 4, 7, 1),
(23, 'Aspek 2 : Kriteria Secondary 1', 2, 5, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`) VALUES
(1, 'Keuangan'),
(2, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` char(1) NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `dept_id` int(11) NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `email`, `sex`, `birth_place`, `birth_date`, `join_date`, `dept_id`, `address`) VALUES
(6, 'Alderan', 'Susanto', 'alderan@gmail.com', 'L', 'Jakarta', '1998-05-20', '2022-04-20', 1, 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `grade` int(3) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `employee_id`, `criteria_id`, `grade`, `month`, `year`) VALUES
(104, 6, 19, 5, 3, 2022),
(105, 6, 20, 5, 3, 2022),
(106, 6, 21, 5, 3, 2022),
(107, 6, 22, 5, 3, 2022),
(108, 6, 23, 5, 3, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `result_rating`
--

CREATE TABLE `result_rating` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `result` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result_rating`
--

INSERT INTO `result_rating` (`id`, `employee_id`, `month`, `year`, `result`) VALUES
(2, 6, 3, 2022, 4.545);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `address` text DEFAULT NULL,
  `type` int(2) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `sex` char(1) NOT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `address`, `type`, `fname`, `lname`, `birth_date`, `birth_place`, `sex`, `dept_id`) VALUES
(2, 'hrd1', 'hrd@gmail.com', '70c1c2da47834fd30d25bdf0d3eed202', 'Jakarta', 1, 'Nurmaa', 'Hayati', '1996-04-04', 'Jakarta', 'P', 0),
(4, 'kabag1', 'wawan@gmail.com', '5088e6ff63680288565648bd045c1a27', 'alamat', 2, 'Wawan', 'Prasetyo', '1998-05-17', 'Jakarta', 'L', 1),
(5, 'manager', 'fitra@gmail.com', '65165fe439b267c8ecf41316c33016cf', 'address', 3, 'Fitra', 'Eri', '1990-03-31', 'jakarta', 'L', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspect`
--
ALTER TABLE `aspect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_rating`
--
ALTER TABLE `result_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspect`
--
ALTER TABLE `aspect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `result_rating`
--
ALTER TABLE `result_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
