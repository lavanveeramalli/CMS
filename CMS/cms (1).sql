-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 10:21 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(50) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(60) NOT NULL,
  `creatername` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `datetime`, `name`, `creatername`) VALUES
(159, '2019-04-27 20:34:20', 'trending', 'Prashanth'),
(160, '2019-04-27 21:04:31', 'java', 'Prashanth'),
(162, '2019-06-03 10:41:49', 'html', 'Prashanth'),
(163, '2020-07-20 23:17:42', 'grains', 'sandy');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `status` varchar(5) NOT NULL,
  `tableid` int(10) NOT NULL,
  `approvedby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `email`, `comment`, `status`, `tableid`, `approvedby`) VALUES
(9, '2020-07-20 23:27:52', 'lavan', 'lavan', 'lavan', 'OFF', 17, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `datetime` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `addedby` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `datetime`, `name`, `addedby`, `password`) VALUES
(2, '2019-06-03 17:05:55', 'sandy', 'Prashanth', '1234'),
(4, '2020-07-06 14:39:43', 'lavan veramalli', 'sandy', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tablepanel`
--

CREATE TABLE `tablepanel` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `post` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablepanel`
--

INSERT INTO `tablepanel` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(15, '2020-07-20 23:14:44', 'wheat', 'trending', 'sandy', 'wheat.jpg', 'Good quality and best price'),
(16, '2020-07-20 23:17:04', 'basmati rice', 'trending', 'sandy', 'basmati rice.jpg', '1121 sella brand rice \r\n8.5mm length \r\nfine quality\r\nMoisture- 12.0 Approx\r\nMoisture: 14% max\r\nBroken: 1%\r\nbest prices'),
(17, '2020-07-20 23:20:14', 'Red Gram', 'grains', 'sandy', 'red gram.jpg', 'thick and good quality\r\n'),
(18, '2020-07-20 23:21:38', 'Green gram', 'grains', 'sandy', 'green gram.jpg', 'From farmers directly selling in the website\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `username` varchar(50) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`username`, `gmail`, `password`) VALUES
('sandy', 'gajawadaprashanth@gmail.com', '123456'),
('lavan', 'lavan@gmail.com', '987654321'),
('abcd', 'abc', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tableid` (`tableid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablepanel`
--
ALTER TABLE `tablepanel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tablepanel`
--
ALTER TABLE `tablepanel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `foreign key to tablepanel` FOREIGN KEY (`tableid`) REFERENCES `tablepanel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
