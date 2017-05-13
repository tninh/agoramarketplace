-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2017 at 05:50 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groupall_groupall`
--

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id` int(8) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `domain` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`id`, `title`, `price`, `location`, `image`, `description`, `domain`) VALUES
(1, '2009 BMW 650i - Want to Sell Quickly', 16500.00, 'Mountain View', 'http://match-all.com/photo/car1.jpg', '2009 BMW 650i - Want to Sell Quickly', 'http://match-all.com'),
(2, '2004 Z06', 26700.00, 'Campbell', 'http://match-all.com/photo/car2.jpg', '2004 Z06', 'http://match-all.com'),
(3, '2015 Lexus CT 200h 16K Miles 1-owner Navigation/Backup | Hybrid ct200h', 23500.00, 'Santa Clara', 'http://match-all.com/photo/car3.jpg', '2015 Lexus CT 200h 16K Miles 1-owner Navigation/Backup | Hybrid ct200h', 'http://match-all.com'),
(4, '1978 Chevrolet Corvette Stingray Pace Car', 8500.00, 'San Jose', 'http://match-all.com/photo/car4.jpg', '1978 Chevrolet Corvette Stingray Pace Car', 'http://match-all.com'),
(5, '2007 Toyota 4Runner Sport Edition, 4WD, V8, 4,7 L, Clean Title!', 19500.00, 'San Jose South', 'http://match-all.com/photo/car5.jpg', '2007 Toyota 4Runner Sport Edition, 4WD, V8, 4,7 L, Clean Title!', 'http://match-all.com'),
(6, '2005 Mini Cooper S. Super Low Mileage. Excellent Condition', 6999.00, 'San Jose South', 'http://match-all.com/photo/car6.jpg', '2005 Mini Cooper S. Super Low Mileage. Excellent Condition', 'http://match-all.com'),
(7, '2016 Audi A6 2.0T Premium Sedan *White*31k*Warranty', 27995.00, 'San Jose west', 'http://match-all.com/photo/car7.jpg', '2016 Audi A6 2.0T Premium Sedan *White*31k*Warranty', 'http://match-all.com'),
(8, '2014 Lexus IS250 Sedan *Loaded*31k*Warranty', 22995.00, 'San Jose West', 'http://match-all.com/photo/car8.jpg', '2014 Lexus IS250 Sedan *Loaded*31k*Warranty', 'http://match-all.com'),
(9, '2014 BMW 535i M Sport Package Sedan *Navi*Loaded', 28500.00, 'San Jose West', 'http://match-all.com/photo/car9.jpg', '2014 BMW 535i M Sport Package Sedan *Navi*Loaded', 'http://match-all.com'),
(10, '2011 Hyundai Elantra, Low-62K miles', 8900.00, 'San Jose West', 'http://match-all.com/photo/car10.jpg', '2011 Hyundai Elantra, Low-62K miles', 'http://match-all.com');

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

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
