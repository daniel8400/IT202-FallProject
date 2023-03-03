-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2022 at 03:36 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `streetAddress` varchar(60) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `reference` varchar(60) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `firstName`, `lastName`, `emailAddress`, `streetAddress`, `city`, `state`, `zipCode`, `reference`, `dateAdded`) VALUES
(1, 'john', 'smith', 'jsmith@njit.edu', '111 smith drive', 'newark', 'NJ', '07102', 'Google Search', '2022-12-10 02:11:44'),
(2, 'joe', 'lane', 'jlane@njit.edu', '112 joe lane', 'newark', 'NJ', '07102', 'Friend', '2022-12-10 02:11:44'),
(3, 'jane ', 'doe', 'doejane@njit.edu', '1223 doe lane', 'newark', 'NJ', '07102', 'Google Search', '2022-12-10 02:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `videocategories`
--

CREATE TABLE `videocategories` (
  `videoCategoryID` int(11) NOT NULL,
  `videoCategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videocategories`
--

INSERT INTO `videocategories` (`videoCategoryID`, `videoCategoryName`) VALUES
(1, 'Action'),
(2, 'Superhero'),
(3, 'Anime'),
(4, 'Horror'),
(5, 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videoID` int(11) NOT NULL,
  `videoCategoryID` int(11) NOT NULL,
  `videoCode` varchar(10) NOT NULL,
  `videoName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videoID`, `videoCategoryID`, `videoCode`, `videoName`, `description`, `price`, `dateAdded`) VALUES
(1, 2, '123', 'Avengers: Infinity War', 'description', '19.99', '2022-12-09 18:56:50'),
(2, 2, '124', 'Captain America: The Winter Soldier', 'Captain america sequel', '19.99', '2022-12-10 03:02:42'),
(3, 2, '125', 'Avengers: Endgame', 'Thanos and time travel', '19.99', '2022-12-10 03:02:42'),
(4, 1, '111', 'Baby Driver', 'Music and racing', '19.99', '2022-12-10 03:05:48'),
(5, 1, '112', 'Edge of Tomorrow', 'Groundhog day', '19.99', '2022-12-10 03:05:48'),
(6, 1, '113', 'Bullet Train', 'train and bullets and punching', '19.99', '2022-12-10 03:05:48'),
(7, 3, '131', 'One Piece: Stampede', 'Peak Fiction', '10.43', '2022-12-10 03:12:20'),
(8, 3, '132', 'Fate/Stay Night: Unlimited Blade Works', 'rin best girl', '19.99', '2022-12-10 03:12:20'),
(9, 3, '133', 'A Silent Voice', 'bully bad', '19.99', '2022-12-10 03:12:20'),
(10, 4, '141', 'The Conjuring', 'ghosts', '19.99', '2022-12-10 03:14:37'),
(11, 4, '142', 'Annabelle', 'spooky doll', '19.99', '2022-12-10 03:14:37'),
(12, 4, '143', 'The exorcist', 'flexible', '19.99', '2022-12-10 03:14:37'),
(13, 5, '151', 'Ted', 'bear', '19.99', '2022-12-10 03:16:00'),
(14, 5, '152', 'white chicks', 'white women', '19.99', '2022-12-10 03:16:00'),
(15, 5, '153', '21 Jump Street', 'jumping over 21 streets', '21.00', '2022-12-10 03:16:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `videocategories`
--
ALTER TABLE `videocategories`
  ADD PRIMARY KEY (`videoCategoryID`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videoID`),
  ADD UNIQUE KEY `videoCode` (`videoCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videocategories`
--
ALTER TABLE `videocategories`
  MODIFY `videoCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
