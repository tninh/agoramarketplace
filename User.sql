-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2017 at 05:19 AM
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
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userEmail` varchar(50) NOT NULL,
  `userFirst` varchar(50) NOT NULL,
  `userLast` varchar(50) NOT NULL,
  `userGender` varchar(1) NOT NULL,
  `cellPhone` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(25) NOT NULL,
  `homePhone` varchar(25) NOT NULL,
  `userRole` varchar(25) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `search` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userEmail`, `userFirst`, `userLast`, `userGender`, `cellPhone`, `address`, `city`, `state`, `zip`, `homePhone`, `userRole`, `userPass`, `search`) VALUES
('admin@group-all.com', 'admin', 'admin', 'M', '817-838-0505', '1246 Everett Avenue', 'San Jose', 'California', '95127', '817-237-4196', 'admin', 'Password1', 'admin@group-all.com admin admin M 817-838-0505 1246 Everett Avenue San Jose California 95127 817-237-4196 admin'),
('coolprofsinn@group-all.com', 'Coolprof', 'Sinn', 'M', '817-834-5206', '1201 Forum Way South', 'Fort Worth', 'Texas', '76140', '817-551-1967', 'super', 'Password1', 'coolprofsinn@group-all.com Coolprof Sinn M 817-834-5206 1201 Forum Way South Fort Worth Texas 76140 817-551-1967 super'),
('ducnguyen@group-all.com', 'Duc', 'Nguyen', 'M', '817-423-1995', '6430 Stream Side Court', 'Cummings', 'Georgia', '30041', '203-375-9757', 'user', 'Password1', 'ducnguyen@group-all.com Duc Nguyen M 817-423-1995 6430 Stream Side Court Cummings Georgia 30041 203-375-9757 user'),
('davidjenkins@group-all.com', 'David', 'Jenkins', 'M', '817-573-4734', '412 Hillview Dr', 'Hurst', 'Texas', '76054', '817-282-0319', 'user', 'Password1', 'davidjenkins@group-all.com David Jenkins M 817-573-4734 412 Hillview Dr Hurst Texas 76054 817-282-0319 user'),
('jessicawilliams@group-all.com', 'Jessica', 'Williams', 'F', '817-656-1436', '1120 Oakbend Lane', 'Keller', 'Texas', '76248', '817-431-3582', 'user', 'Password1', 'jessicawilliams@group-all.com Jessica Williams F 817-656-1436 1120 Oakbend Lane Keller Texas 76248 817-431-3582 user'),
('alexsmith@group-all.com', 'Alex', 'Smith', 'M', '817-589-2685', '1409 Lamplighter Lane', 'Fort Worth', 'Texas', '76134', '817-293-7282', 'user', 'Password1', 'alexsmith@group-all.com Alex Smith M 817-589-2685 1409 Lamplighter Lane Fort Worth Texas 76134 817-293-7282 user'),
('juliancrosby@group-all.com', 'Julian', 'Crosby', 'M', '817-730-7322', '7820 Sheridan Rd', 'Fort Worth', 'Texas', '76134', '817-293-1261', 'user', 'Password1', 'juliancrosby@group-all.com Julian Crosby M 817-730-7322 7820 Sheridan Rd Fort Worth Texas 76134 817-293-1261 user'),
('jackelinesalbright@group-all.com', 'Jackeline', 'Albright', 'F', '817-536-9241', '7105 Plover Circle', 'Fort Worth', 'Texas', '76135', '817-237-4196', 'user', 'Password1', 'jackelinesalbright@group-all.com Jackeline Albright F 817-536-9241 7105 Plover Circle Fort Worth Texas 76135 817-237-4196 user'),
('johnsawyer@group-all.com', 'John', 'Sawyer', 'M', '817-306-4608', '6287 Renwood Dr', 'Fort Worth', 'Texas', '76140', '817-4781802', 'user', 'Password1', 'johnsawyer@group-all.com John Sawyer M 817-306-4608 6287 Renwood Dr Fort Worth Texas 76140 817-4781802 user'),
('martinthomas@group-all.com', 'Martin', 'Thomas', 'M', '817-838-1600', '9109 Dove Ct', 'Fort Worth', 'Texas', '76126', '817-249-0088', 'user', 'Password1', 'martinthomas@group-all.com Martin Thomas M 817-838-1600 9109 Dove Ct Fort Worth Texas 76126 817-249-0088 user'),
('benjaminalbright@group-all.com', 'Benjamin', 'Albright', 'M', '409-267-3312', '7117 Deer Hollow Dr', 'Fort Worth', 'Texas', '76132', '817-292-2567', 'user', 'Password1', 'benjaminalbright@group-all.com Benjamin Albright M 409-267-3312 7117 Deer Hollow Dr Fort Worth Texas 76132 817-292-2567 user'),
('marckcraford@group-all.com', 'Marck', 'Crawford', 'M', '817-267-3230', '4601 Deville Dr', 'N Richland Hills', 'Texas', '76180', '817-656-4987', 'user', 'Password1', 'marckcraford@group-all.com Marck Crawford M 817-267-3230 4601 Deville Dr N Richland Hills Texas 76180 817-656-4987 user'),
('karlperry@group-all.com', 'Karl', 'Perry', 'M', '409-866-6262', '740 Bedford Ct', 'Hurst', 'Texas', '76053', '817-282-4016', 'user', 'Password1', 'karlperry@group-all.com Karl Perry M 409-866-6262 740 Bedford Ct Hurst Texas 76053 817-282-4016 user'),
('alicetimmons@group-all.com', 'Alice', 'Timmons', 'F', '817-460-5554', '637 Sandy Trail', 'Fort Worth', 'Texas', '76120', '817-366-9041_', 'user', 'Password1', 'alicetimmons@group-all.com Alice Timmons F 817-460-5554 637 Sandy Trail Fort Worth Texas 76120 817-366-904 user'),
('ritathomas@group-all.com', 'Rita', 'Thomas', 'F', '936-336-3508', '427 Crestview Drive', 'Grapevine', 'Texas', '76051', '817-488-1034', 'user', 'Password1', 'ritathomas@group-all.com Rita Thomas F 936-336-3508 427 Crestview Drive Grapevine Texas 76051 817-488-1034 user'),
('paulcarter@group-all.com', 'Paul', 'Carter', 'M', '817-514-1120', '712 Admiralty Way', 'Fort Worth', 'Texas', '76108', '817-246-9828', 'user', 'Password1', 'paulcarter@group-all.com Paul Carter M 817-514-1120 712 Admiralty Way Fort Worth Texas 76108 817-246-9828 user'),
('georgejenkins@group-all.com', 'George', 'Jenkins', 'M', '972-539-1507', '3809 Shawnee Tr.', 'Fort Worth', 'Texas', '76135', '817-237-9644', 'user', 'Password1', 'georgejenkins@group-all.com George Jenkins M 972-539-1507 3809 Shawnee Tr. Fort Worth Texas 76135 817-237-9644 user'),
('carolwilliams@group-all.com', 'Carol', 'Williams', 'F', '817-444-2895', '9848 Private Rd', 'Quinlan', 'Texas', '75475', '903-356-4082', 'user', 'Password1', 'carolwilliams@group-all.com Carol Williams F 817-444-2895 9848 Private Rd Quinlan Texas 75475 903-356-4082 user'),
('mikehagin@group-all.com', 'Mike', 'Hagin', 'M', '972-335-2883', '6136 Walraven Cir', 'Fort Worth', 'Texas', '76133', '817-294-7099', 'user', 'Password1', 'mikehagin@group-all.com Mike Hagin M 972-335-2883 6136 Walraven Cir Fort Worth Texas 76133 817-294-7099 user'),
('crolinhopkins@group-all.com', 'Crolin ', 'Hopkins', 'F', '817-706-9806', '3479 Coronada Court', 'Fort Worth', 'Texas', '76116', '817-244-1805', 'user', 'Password1', 'crolinhopkins@group-all.com Crolin Hopkins F 817-706-9806 3479 Coronada Court Fort Worth Texas 76116 817-244-1805 user'),
('phong@group-all.com', 'Phong', 'Dong', 'F', '408-324-3333', '123 Easter ave', 'Milpitas', 'California', '95035', '408-324-4444', 'user', 'Password1', 'phong@group-all.com Phong Dong F 408-324-3333 408-324-4444 123 Easter ave Milpitas California 95035 user'),
('asdf@gmail.com', 'asdf', 'asdf', 'M', '847-123-4958', 'asdf', 'asdf', 'adsf', '11111', '847-123-4958', 'user', 'Password1', 'asdf@gmail.com asdf asdf M 847-123-4958 847-123-4958 asdf asdf adsf 11111 user'),
('test@email.com', 'test', 'test', 'f', '408-324-3333', '123 Easter ave', 'San Jose', 'ca', '95122', '408-324-3337', 'user', 'Password1', 'test@email.com test test f 408-324-3333 408-324-3337 123 Easter ave San Jose ca 95122 user'),
('test1@email.com', 'test', 'test', 'f', '408-324-3333', '123 Easter ave', 'San Jose', 'ca', '95122', '408-324-3337', 'user', 'Password1', 'test1@email.com test test f 408-324-3333 408-324-3337 123 Easter ave San Jose ca 95122 user'),
('test2@email.com', 'testa', 'testa', 'm', '408-324-3333', '123 Milpitas ave', 'San Jose', 'CA', '95035', '408-324-4444', 'user', 'Password1', 'test2@email.com testa testa m 408-324-3333 408-324-4444 123 Milpitas ave San Jose CA 95035 user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
