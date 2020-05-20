-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 20, 2020 at 10:52 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbblogoop`
--
CREATE DATABASE IF NOT EXISTS `dbblogoop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `dbblogoop`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `body` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `photo_id`, `author`, `body`) VALUES
(1, 13, 'hi', 'test1'),
(2, 13, 'panithi', 'test again'),
(3, 17, 'Brad pit', 'You are so beautiful.'),
(4, 20, 'Leonado', 'your are so beautiful.');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `caption` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `filename` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `alternate_text` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `size` int(50) NOT NULL,
  `upload_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `title`, `caption`, `description`, `filename`, `alternate_text`, `type`, `size`, `upload_on`) VALUES
(13, 'kartoon', '', 'This is the first gif in these period that i made.', 'imo.gif', '0000-00-00 00:00:00', 'image/gif', 55162, '0000-00-00 00:00:00'),
(14, 'kratur', '', '', 'Lili.jpg', '0000-00-00 00:00:00', 'image/jpeg', 1570104, '0000-00-00 00:00:00'),
(17, 'Tatayoung', '', '', '1075799035.jpeg', '', 'image/jpeg', 393180, '0000-00-00 00:00:00'),
(18, 'yay', '', '', 'portrait_10.jpg', '', 'image/jpeg', 168773, '0000-00-00 00:00:00'),
(20, '', '', '', 'bwgirl.jpg', '', 'image/jpeg', 74047, '0000-00-00 00:00:00'),
(21, '', '', '', 'cadaschien family.jpg', '', 'image/jpeg', 32475, '0000-00-00 00:00:00'),
(22, '', '', '', 'istockphoto-curlygirl.jpg', '', 'image/jpeg', 31012, '0000-00-00 00:00:00'),
(23, '', '', '', 'countrysidegirl.jpg', '', 'image/jpeg', 10819, '0000-00-00 00:00:00'),
(24, 'little girl', 'beautiful hair', '', 'images.jpg', '', 'image/jpeg', 5560, '0000-00-00 00:00:00'),
(25, '3 girl', 'red dresses', '', '3girlsred.jpg', '', 'image/jpeg', 50559, '0000-00-00 00:00:00'),
(26, 'twin', 'black and white', '', 'bwtwin.jpg', '', 'image/jpeg', 29541, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(1, 'ricky', 'ricky', 'Ricky', 'Pamoed', '79f7c72969e904d4d154f2845af4f206.jpg'),
(2, 'khunyay', 'apple', 'Panithi', 'Thamsaroj', 'portrait_10.jpg'),
(3, 'panithi', 'panithi', 'Panithi', 'Pamoed', 'istockphoto-pink.jpg'),
(6, 'test', '-', 'crazy', 'test', '7a1c2ce8899cdad546216c63c745e38a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
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
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
