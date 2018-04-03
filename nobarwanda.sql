-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2018 at 04:46 PM
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
-- Database: `nobarwanda`
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
  `promotion` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `productCategory` int(11) NOT NULL,
  `productDescription` varchar(1024) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productIcon` varchar(100) NOT NULL,
  `shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productPrice`, `promotion`, `quantity`, `currency`, `productCategory`, `productDescription`, `notes`, `dateAdded`, `productIcon`, `shop`) VALUES
(1, 'Arduino', 15000, 13000, 0, 1, 1, 'An inductor is a passive electronic component that stores energy in the form of a magnetic field when electric current is flowing through it. also called a coil or reactor', 'Buy 3 board and get a 3% discount', '2018-03-18 16:43:01', 'img/arduino.jpg', 2),
(2, 'Raspbery Pi', 12, 0, 12, 0, 0, 'Here we are to try something', '', '2018-04-03 14:24:38', '', 1),
(3, 'Raspbery Pi', 12, 0, 12, 0, 0, 'Here we are to try something', '', '2018-04-03 14:26:52', '', 1),
(4, 'ASASAS', 12, 0, 12, 0, 0, '1212', '', '2018-04-03 14:27:05', '', 1),
(5, 'ASASAS', 12, 0, 12, 0, 0, '1212', '', '2018-04-03 14:29:00', '', 1),
(6, 'sdsds', 1212, 0, 12, 0, 0, '1212', '', '2018-04-03 14:29:16', '', 1),
(7, 'sdsd', 12, 0, 12, 0, 0, '1sdsd', '', '2018-04-03 14:30:29', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `news_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `contents` longtext NOT NULL,
  `datas` text NOT NULL,
  `dateup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`news_id`, `title`, `subtitle`, `icon`, `contents`, `datas`, `dateup`) VALUES
(1, 'gaz level detector', 'detect gaz level from everywhere', 'img/Pi2Mod.jpg', 'Wt is a C++ library for developing web applications. Admitted, C++ doesn’t come to mind\r\nas the first choice for a programming language when one talks about web development. Web\r\ndevelopment is usually associated with scripting languages, and is usually implemented at the\r\nlevel of generating responses for incoming requests. Since both requests and responses are text\r\nencodings, web programming is ultimately a text processing task, and thus conveniently expressed\r\nin a scripting language.', '', '2018-03-25 13:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `pubs`
--

CREATE TABLE `pubs` (
  `pubid` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shopName` varchar(256) NOT NULL,
  `admin` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shopIcon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shopName`, `admin`, `dateAdded`, `shopIcon`) VALUES
(2, 'Noba Electronics', 1, '2018-03-19 07:25:19', 'img/kigalivv.jpg'),
(3, 'ware houses', 2, '2018-03-24 16:43:41', 'img/kigalic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shopusers`
--

CREATE TABLE `shopusers` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopusers`
--

INSERT INTO `shopusers` (`id`, `userId`, `shopId`, `dateAdded`) VALUES
(1, 4, 1, '2018-04-03 13:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `descr` varchar(200) NOT NULL,
  `categorieId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `profilePicture` varchar(1024) DEFAULT NULL,
  `type` varchar(6) DEFAULT 'member',
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `lname`, `fname`, `email`, `profilePicture`, `type`, `password`) VALUES
(1, 'hgter', 'jfgjs', 'df@fd.com', NULL, 'member', '9f61408e3afb633e50cdf1b20de6f466'),
(2, 'hgter', 'bn', 'vv@vv.combb', NULL, 'member', '4e58188ff528dea1eec738fffc0e118d'),
(3, 'jhddsgg', 'jfgjs', 'gh@gh.comNM', NULL, 'member', 'e0f3dba3248a6ccb26950955635d93e2'),
(4, 'Richard', '', 'admin@me.rw', NULL, 'admin', '6c8349cc7260ae62e3b1396831a8398f');

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `pubs`
--
ALTER TABLE `pubs`
  ADD PRIMARY KEY (`pubid`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopusers`
--
ALTER TABLE `shopusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`cat_id`);

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
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pubs`
--
ALTER TABLE `pubs`
  MODIFY `pubid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shopusers`
--
ALTER TABLE `shopusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
