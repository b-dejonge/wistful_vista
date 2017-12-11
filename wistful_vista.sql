-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 01:55 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wistful_vista`
--

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenanceID` int(11) NOT NULL,
  `renterID` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `urgency` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageID` int(11) NOT NULL,
  `messageFrom` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `renterID` int(11) NOT NULL,
  `paymentAmount` double NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentPaid` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE `renter` (
  `renterID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `apt` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`maintenanceID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`renterID`),
  ADD UNIQUE KEY `apt` (`apt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `maintenanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `renter`
--
ALTER TABLE `renter`
  MODIFY `renterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
