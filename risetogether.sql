-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2016 at 12:18 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `risetogether`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `ID` int(255) NOT NULL,
  `firstName` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cproject` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ID`, `firstName`, `lastName`, `email`, `password`, `pic`, `website`, `cproject`, `bio`, `facebook`, `linkedin`, `xp`) VALUES
(1, 'test', 'test', 'g@g.com', 'gg', 'ghghghghhg', '', '', 'This is a test of the bio feild ', '', '', 20),
(2, '', '', 'g@gg.com', '', '', '', '', '', '', '', 0),
(3, '', '', 'test@gmail.com', 'kkkkkkkkk', '', '', '', '', '', '', 100),
(4, '', '', 'g@dg.com', '149616', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profilerequests`
--

CREATE TABLE IF NOT EXISTS `profilerequests` (
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `requestID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profileskills`
--

CREATE TABLE IF NOT EXISTS `profileskills` (
  `profileID` int(255) NOT NULL,
  `skillsID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileskills`
--

INSERT INTO `profileskills` (`profileID`, `skillsID`) VALUES
(1, 2),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `ID` int(255) NOT NULL,
  `title` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `ID` int(11) NOT NULL,
  `skillName` varchar(50) NOT NULL,
  `skillInfo` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`ID`, `skillName`, `skillInfo`) VALUES
(2, 'DAAADA', 'DAS BOOT OO YEA'),
(4, 'r', 'rrr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
