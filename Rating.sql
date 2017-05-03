-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2017 at 01:42 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matchall`
--

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `userEmail` varchar(50) NOT NULL,
  `productId` int(8) NOT NULL,
  `rating` int(8) NOT NULL,
  `commnents` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`userEmail`, `productId`, `rating`, `commnents`) VALUES
('admin@group-all.com', 1, 4, 0x676f6f64),
('admin@group-all.com', 2, 5, 0x76657279206e636965),
('admin@group-all.com', 3, 3, 0x6e696365),
('coolprofsinn@group-all.com', 1, 4, 0x6e69636520636172),
('coolprofsinn@group-all.com', 2, 3, 0x6e69636520636f6c6f72),
('ducnguyen@group-all.com', 1, 4, 0x69206c696b65206974);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
