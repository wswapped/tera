-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 04:11 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edoricac_edorica`
--

-- --------------------------------------------------------

--
-- Table structure for table `dor`
--

CREATE TABLE `dor` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `code` varchar(2) NOT NULL,
  `province` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dor`
--

INSERT INTO `dor` (`id`, `name`, `code`, `province`) VALUES
(1, 'Burera', '04', 'North'),
(2, 'Musanze', '03', 'North'),
(3, 'Gasabo', '02', 'Kigali'),
(4, 'Nyarugenge', '01', 'Kigali'),
(5, 'Kicukiro', '03', 'Kigali'),
(6, 'Gicumbi', '05', 'North'),
(7, 'Rulindo', '01', 'North'),
(8, 'Gisagara', '02', 'South'),
(9, 'Huye', '04', 'South'),
(10, 'Kamonyi', '08', 'South'),
(11, 'Muhanga', '07', 'South'),
(12, 'Nyamagabe', '05', 'South'),
(13, 'Nyanza', '01', 'South'),
(14, 'Nyaruguru', '03', 'South'),
(15, 'Ruhango', '06', 'South'),
(16, 'Kayonza', '04', 'East'),
(17, 'Karongi', '01', 'West'),
(18, 'Rubavu', '03', 'West'),
(19, 'Rutsiro', '02', 'West'),
(20, 'Nyabihu', '04', 'West'),
(21, 'Ngororero', '05', 'West'),
(22, 'Rusizi', '06', 'West'),
(23, 'Nyamasheke', '07', 'West'),
(24, 'Rwamagana', '01', 'East'),
(25, 'Nyagatare', '02', 'East'),
(26, 'Gatsibo', '03', 'East'),
(27, 'Kirehe', '05', 'East'),
(28, 'Ngoma', '06', 'East'),
(29, 'Bugesera', '07', 'East'),
(30, 'Gakenke', '02', 'North');

-- --------------------------------------------------------

--
-- Table structure for table `por`
--

CREATE TABLE `por` (
  `name` varchar(64) NOT NULL,
  `code` varchar(2) NOT NULL DEFAULT '01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `por`
--

INSERT INTO `por` (`name`, `code`) VALUES
('East', '05'),
('Kigali', '01'),
('North', '04'),
('South', '02'),
('West', '03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dor`
--
ALTER TABLE `dor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `por`
--
ALTER TABLE `por`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dor`
--
ALTER TABLE `dor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
