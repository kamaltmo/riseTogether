-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2016 at 06:44 AM
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
  `pic` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cproject` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xp` int(11) NOT NULL,
  `onSite` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ID`, `firstName`, `lastName`, `email`, `password`, `pic`, `website`, `cproject`, `bio`, `facebook`, `linkedin`, `xp`, `onSite`) VALUES
(1, 'Kamal', 'Osman', 'g@g.com', 'gg', 'http://zblogged.com/wp-content/uploads/2015/11/17.jpg', 'kamalosman.co.uk', 'ffff', 'This is a test of the bio feildgg', 'gggg', 'linkedf', 20, 0),
(2, '', '', 'g@gg.com', '', '', '', '', '', '', '', 0, 1),
(3, '', '', 'test@gmail.com', 'kkkkkkkkk', '', '', '', '', '', '', 100, 0),
(4, 'kkkkk', 'oooooo', 'g@dg.com', '149616', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTF_erFD1SeUnxEpvFjzBCCDxLvf-wlh9ZuPMqi02qGnyyBtPWdE-3KoH3s', '', '', 'Testing testing 1 2', '', '', 0, 0),
(6, '', '', 'kamaltmo@gmail.com', 'kingkaz52', '', '', '', '', '', '', 0, 1),
(7, '', '', 'g@gss.com', 'ggssssss', '', '', '', '', '', '', 0, 0),
(8, '', '', 'vlad@buzatu.com', 'testing', '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profileproject`
--

CREATE TABLE IF NOT EXISTS `profileproject` (
  `senderID` int(11) NOT NULL,
  `ReciverID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileproject`
--

INSERT INTO `profileproject` (`senderID`, `ReciverID`, `projectID`) VALUES
(1, 4, 1);

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
(1, 5),
(1, 6),
(1, 5),
(1, 6),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `projectName` varchar(70) NOT NULL,
  `aimedUser` varchar(30) NOT NULL,
  `projectDescription` text NOT NULL,
  `projectStatus` int(1) NOT NULL,
  `acceptetdStatus` int(1) NOT NULL,
  `projectID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectName`, `aimedUser`, `projectDescription`, `projectStatus`, `acceptetdStatus`, `projectID`) VALUES
('Project 1', 'vlad@buzatu.com', 'INFO INFO INFO', 1, 1, 1),
('Mamaimea', 'vlad@buzatu.com', 'INFORMATION INFO INFORMATION', 1, 1, 3),
('Mamaimea MIA', 'vlad@buzatu.com', 'INFORMATION more INFO INFORMATION', 1, 1, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`ID`, `skillName`, `skillInfo`) VALUES
(5, 'Web Development', 'For all your website needs look no further.'),
(6, 'Marketing', 'Need help getting stuff out there, getting eyes on or just some word of mouth. We got you!'),
(7, 'Corporate Law', 'We all need some protection, these guys know the law like the back of there had and are willing to hear you out.'),
(8, 'Music', 'Creativity thrives in rise, and here we have some of the most creative people of all. Looking to have some one hear you out or to listen to others, this is the place. '),
(9, 'Writing', 'Creators of worlds, makers of myths, gods amongst me men. Looking for a world builder to work with or want to have some nice critique. You are welcome here'),
(10, 'Supply Chain Managment', 'Everything and anything, these people will help you find. No matter how obscure or how difficult to manage. Find help make your business sustainable. '),
(11, 'Human Resource', 'People, such fickle things. Learning to tame these creatures takes skill and a lifetime, lucky for someone else already has these talents. Find them here '),
(12, 'Project Managment', 'I speaks from experience when I say projects can quickly get out of hand. Only few have mastered the art of managing theses beasts, trust me when I say you need one.'),
(13, 'Photography', 'Capturing life in a still image is no mere feet, even if your camera phone says other wise. These skilled individuals can portray the most complex of thoughts with out a single word.'),
(16, 'Manufacturing ', 'Complexity is the name of the game, and these guys make it look like child play. Handling numbers beyond comprehension, need help making your ideas reality''s one step at a time  '),
(17, 'Integrated Circuit Design', 'Molecules, please. The folks work with atoms on a regular basis make machines that can do the unimaginable and pushing the race to the bleeding edge'),
(18, 'Accounting', 'They do numbers... I guess');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`);

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
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
