-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2018 at 04:48 PM
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
-- Database: `noba`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL COMMENT 'category name',
  `description` varchar(2048) NOT NULL,
  `shop` int(11) NOT NULL COMMENT 'Shop with these categories',
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `shop`, `dateAdded`) VALUES
(1, 'Electronics', 'blah blah', 1, '2018-03-21 19:29:59'),
(2, 'OK here', 'Okssdsd', 1, '2018-03-21 19:53:00'),
(3, 'OK here', 'Okssdsd', 1, '2018-03-21 19:53:22'),
(4, 'OK here', 'Okssdsd', 1, '2018-03-21 19:53:35'),
(5, 'OK here', 'Okssdsd', 1, '2018-03-21 20:31:57'),
(6, 'OK here', 'Okssdsd', 1, '2018-03-21 20:35:17'),
(7, 'OK here', 'Okssdsd', 1, '2018-03-21 20:37:11'),
(8, 'OK here', 'Okssdsd', 1, '2018-03-21 20:37:20'),
(9, 'OK here', 'Okssdsd', 2, '2018-03-21 20:42:34'),
(10, 'Here comes me', 'There comes you alone and you have rights to do whichever you want', 2, '2018-03-21 20:43:20'),
(11, 'Here comes me', 'There comes you alone and you have rights to do whichever you want', 2, '2018-03-21 20:44:09'),
(12, 'Here comes me', 'There comes you alone and you have rights to do whichever you want', 2, '2018-03-21 20:50:09'),
(13, 'Here comes me', 'There comes you alone and you have rights to do whichever you want', 2, '2018-03-21 20:50:48'),
(14, 'Here comes me', 'There comes you alone and you have rights to do whichever you want', 2, '2018-03-21 20:50:51'),
(15, 'Here comes me', 'There comes you alone and you have rights to do whichever you want', 2, '2018-03-21 20:53:15'),
(16, 'Here comes me', 'There comes you alone and you have rights to do whichever you want', 2, '2018-03-21 20:53:39'),
(17, 'Here comes me', 'There comes you alone and you have rights to do whichever you want', 2, '2018-03-21 20:53:56'),
(18, 'Here comes me', 'There comes you alone and you have rights to do whichever you want', 2, '2018-03-21 20:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(128) NOT NULL,
  `productPrice` float NOT NULL,
  `productCategory` int(11) NOT NULL,
  `productDescription` varchar(1024) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productPrice`, `productCategory`, `productDescription`, `dateAdded`) VALUES
(1, '\r\nInductor 180uH IND24', 500, 1, 'An inductor is a passive electronic component that stores energy in the form of a magnetic field when electric current is flowing through it. also called a coil or reactor', '2018-03-18 16:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shopName` varchar(256) NOT NULL,
  `admin` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shopName`, `admin`, `dateAdded`) VALUES
(2, 'Noba Electronics', 1, '2018-03-19 07:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(128) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `profilePicture` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `dateCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `name`, `email`, `profilePicture`, `password`, `dateCreated`) VALUES
(1, 'placide@noba.rw', 'H. Placide', 'placide@noba.rw', 'assets/app/media/img/users/pl.jpg', 'pla', '2018-03-18 17:16:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
