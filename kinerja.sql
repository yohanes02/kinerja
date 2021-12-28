-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2021 at 01:24 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-50+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` int(3) NOT NULL,
  `department_id` int(11) NOT NULL,
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `name`, `weight`, `department_id`, `version`) VALUES
(1, 'Kemampuan Kerja Sama', 70, 2, 1),
(2, 'Adaptasi Teknologi Baru', 30, 2, 1),
(5, 'Kecepatan Penanganan', 60, 4, 1),
(6, 'Kerjasama', 40, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `name`) VALUES
(2, 'Information Technology'),
(3, 'Teknisi'),
(4, 'Finance');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `jk` int(1) NOT NULL,
  `fee` int(9) NOT NULL,
  `birth_place` text NOT NULL,
  `birth_date` date NOT NULL,
  `address` text NOT NULL,
  `join_date` date NOT NULL,
  `departemen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `first_name`, `last_name`, `jk`, `fee`, `birth_place`, `birth_date`, `address`, `join_date`, `departemen_id`) VALUES
(2, 'Putra', 'Wijaya', 1, 5000000, 'Bandung', '2000-02-10', 'DKI Jakarta', '2021-01-18', 4),
(3, 'Yohanes', '.', 2, 5000000, 'DKI Jakarta', '2000-02-10', 'Pulogebang', '2018-04-10', 2),
(4, 'Muhammad', 'Dwiky', 2, 5000000, 'DKI Jakarta', '1999-05-05', 'Cakung', '2019-09-13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `sub_criteria_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `criteria_version` int(3) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `month` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `sub_criteria_id`, `criteria_id`, `criteria_version`, `karyawan_id`, `month`) VALUES
(5, 9, 1, 1, 3, 11),
(6, 11, 2, 1, 3, 11),
(7, 10, 1, 1, 4, 11),
(8, 12, 2, 1, 4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `result_penilaian`
--

CREATE TABLE `result_penilaian` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `version` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `result` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_criteria`
--

CREATE TABLE `sub_criteria` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` int(3) NOT NULL,
  `criteria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_criteria`
--

INSERT INTO `sub_criteria` (`id`, `name`, `weight`, `criteria_id`) VALUES
(7, 'Sangat Setuju', 100, 1),
(8, 'Setuju', 75, 1),
(9, 'Cukup', 50, 1),
(10, 'Kurang', 25, 1),
(11, 'Sangat Setuju 2', 100, 2),
(12, 'Setuju 1', 75, 2);

-- --------------------------------------------------------

--
-- Table structure for table `used_criteria`
--

CREATE TABLE `used_criteria` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `used_criteria`
--

INSERT INTO `used_criteria` (`id`, `department_id`, `version`) VALUES
(1, 2, 1),
(4, 4, 1),
(5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(21) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` int(1) NOT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `type`, `department_id`) VALUES
(1, 'hrd', '827ccb0eea8a706c4c34a16891f84e7b', 'ysirorus11@gmail.com', 1, NULL),
(2, 'kabagit', '827ccb0eea8a706c4c34a16891f84e7b', 'ysirorus11@gmail.com', 2, 2),
(4, 'direktur', '827ccb0eea8a706c4c34a16891f84e7b', 'ysirorus11@gmail.com', 3, NULL),
(5, 'kabagfinance', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', 2, 4),
(6, 'kabagteknisi', '827ccb0eea8a706c4c34a16891f84e7b', 'ysirorus11@gmail.com', 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_penilaian`
--
ALTER TABLE `result_penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_criteria`
--
ALTER TABLE `sub_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_criteria`
--
ALTER TABLE `used_criteria`
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
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `result_penilaian`
--
ALTER TABLE `result_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_criteria`
--
ALTER TABLE `sub_criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `used_criteria`
--
ALTER TABLE `used_criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
