-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 04:15 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sali`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `propid` int(10) UNSIGNED NOT NULL,
  `houseno` int(16) DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` int(16) NOT NULL,
  `bedrooms` int(16) DEFAULT NULL,
  `floors` int(16) DEFAULT NULL,
  `accommodationtype` varchar(255) DEFAULT NULL,
  `comments` text,
  `image` varchar(255) DEFAULT NULL,
  `price` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propid`, `houseno`, `street`, `city`, `postcode`, `bedrooms`, `floors`, `accommodationtype`, `comments`, `image`, `price`) VALUES
(18, 34, 'dgg', 'city_2', 232, 23, 23, 'type_2', 'dasfsd', 'images/981f766756.png', 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contactno` varchar(12) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `first_name`, `last_name`, `contactno`, `dob`, `address`, `user_type`) VALUES
(11, 'Testuser', 'admin@gmail.com', '$2y$10$T5K7oxeXgFAvg/Zl498Hte1IVT60ievTbxD8IEBvGDWQcYaZKtcT2', 'Test', 'User', '2352353245', '2018-05-10', 'abcde', 2),
(12, 'ID', 'id@gmail.com', 'password', 'id1', 'id2', '12233344455', '1996-04-03', 'id11111', 1),
(13, 'ID23', 'ww@gmail.com', 'flower', 'id34', 'wer', '333333', '4333-04-23', 'wwwwwww', 1),
(14, 'QW', 'ASD@GMAIL.COM', 'ASD', 'ASD', 'ASD', '2333333', '0222-02-12', 'ASD', 1),
(15, 'Saira', 'abcd@mail.com', 'flower', 'saira', 'ali', '1111111111', '2018-05-13', 'aaaaa', 1),
(16, 'jahid99', 'sadfas@fsdafd', 'jahid99', 'sadfasfdsa', 'fsafsf', '234234234', '2018-05-04', 'asdfasf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`, `type_id`) VALUES
(1, 'Student', 1),
(2, 'Agent', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`propid`),
  ADD UNIQUE KEY `propid_UNIQUE` (`propid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `propid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
