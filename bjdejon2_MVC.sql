-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2017 at 12:52 AM
-- Server version: 10.0.27-MariaDB-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bjdejon2_MVC`
--

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE IF NOT EXISTS `maintenance` (
  `maintenanceID` int(11) NOT NULL AUTO_INCREMENT,
  `renterID` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `urgency` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`maintenanceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenanceID`, `renterID`, `date`, `urgency`, `description`, `status`) VALUES
(7, 41, '2017-12-10 23:22:58', 'Standard', 'Bathtub draining slow', 1),
(8, 40, '2017-12-10 23:32:36', 'Immediate', 'Roof is leaking', 0),
(9, 42, '2017-12-10 23:38:36', 'Soon', 'Heater not working', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `messageFrom` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageID`, `messageFrom`, `date`, `subject`, `message`) VALUES
(2, 'Wistful Vista', '2017-12-11 00:50:53', 'New Website', 'Welcome to the new Wistful Vista Apartments renter website. Enjoy easy online payments, create maintenance requests, and messages like these from us. Thanks for choosing Wistful Vista!');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` int(11) NOT NULL AUTO_INCREMENT,
  `renterID` int(11) NOT NULL,
  `paymentAmount` double NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentPaid` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paymentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `renterID`, `paymentAmount`, `paymentDate`, `paymentPaid`) VALUES
(12, 44, 389.99, '2017-12-18', 0),
(13, 40, 415.99, '2017-12-26', 0),
(14, 41, 279.99, '2017-12-31', 1),
(15, 39, 510.99, '2017-12-12', 0),
(16, 45, 362.99, '2017-12-16', 1),
(17, 43, 856.99, '2018-01-02', 0),
(18, 38, 442.99, '2018-01-05', 0),
(19, 42, 743.99, '2017-12-22', 1),
(20, 45, 362.99, '2018-01-16', 0),
(21, 42, 743.99, '2018-01-22', 0),
(22, 41, 279.99, '2018-01-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE IF NOT EXISTS `renter` (
  `renterID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `apt` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`renterID`),
  UNIQUE KEY `apt` (`apt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=46 ;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`renterID`, `firstName`, `lastName`, `apt`, `username`, `password`) VALUES
(0, 'Admin', 'Account', 0, 'admin', '$2y$10$Ity8GvZHM/3lgw4R5DLyUOOhs4J0xKZ4HvHKTEeM/Low8My.dXmEa'),
(38, 'Brian', 'Rather', 245, 'brather', '$2y$10$Hzt27h7ssJXCs.lOHdEOPutXaDiICYPswiI7B0vFfAJFCWRQou/jW'),
(39, 'Kevin', 'Smith', 109, 'ksmith', '$2y$10$NLhOif2eNLUCqx28qJ8eqeNBJMZ7s9cS9/sDHx5BfaSgA1x8Kq/wy'),
(40, 'Mitzi', 'Woods', 47, 'mwoods', '$2y$10$vfpQWV.US8u549XW2Sy2AuGdUMkhm0O7zAPpT86fWzi58KAYYLzvO'),
(41, 'Betsy', 'White', 98, 'bwhite', '$2y$10$ABYaYDdRSVwC410pabHdce62XTp.R05BeF/kwI3.Qtl3ekvQ3OMH.'),
(42, 'Eric', 'Stone', 274, 'estone', '$2y$10$GX86PmoWxgWiEbRYZivgEOatSpkrh9ANf3cH1Bo9iOYVDQJDrzto.'),
(43, 'Kelly', 'Garcia', 193, 'kgarcia', '$2y$10$POknbe21aa8O.uFb/uv8Oe.caHwgJtVEv87J.rBfe67V9TvDCgGN.'),
(44, 'Devin', 'Black', 38, 'dblack', '$2y$10$tV9aHFFHxPH33V2anIzdye7bFYByAll47lUdVykOKoM.DiY/Slgqq'),
(45, 'Ben', 'Atkin', 126, 'batkin', '$2y$10$F5tqO10cdgOUmc00D/RjBeSGu/KciBExU5XSweAOsVORYtyJiohKO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
