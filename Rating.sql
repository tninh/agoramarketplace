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
  `comments` varchar(1024) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`userEmail`, `productId`, `rating`, `comments`) VALUES
('admin@group-all.com', 1, 1, 'bad'),
('admin@group-all.com', 2, 5, 'good'),
('admin@group-all.com', 3, 3, 'nice one'),
('coolprofsinn@group-all.com', 1, 4, 'i like it'),
('coolprofsinn@group-all.com', 2, 3, 'not so bad'),
('ducnguyen@group-all.com', 1, 4, 'hmm'),
('admin@group-all.com', 3, 3, 'amzing'),
('admin@group-all.com', 3, 3, 'average'),
('admin@group-all.com', 3, 3, 'like it'),
('admin@group-all.com', 3, 3, 'alright'),
('admin@group-all.com', 3, 3, 'cool'),
('admin@group-all.com', 3, 3, 'recommended'),
('admin@group-all.com', 3, 3, 'how so'),
('admin@group-all.com', 3, 3, 'nice color'),
('Anonymous', 1, 4, 'strong engine'),
('Anonymous', 1, 4, 'cant wait to get it'),
('Anonymous', 1, 4, 'the beast'),
('Anonymous', 1, 4, 'holo'),
('Anonymous', 1, 4, 'nice'),
('Anonymous', 1, 4, 'very nice'),
('Anonymous', 1, 4, 'amzing'),
('admin@group-all.com', 1, 1, 'ahhh'),
('Anonymous', 1, 4, 'beat it'),
('Anonymous', 2, 5, 'damn'),
('abc@email.com', 2, 4, 'wow');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
