-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Mar 2016 la 03:39
-- Versiune server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `risetogether`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `projects`
--

CREATE TABLE `projects` (
  `projectName` varchar(70) NOT NULL,
  `aimedUser` varchar(30) NOT NULL,
  `projectDescription` text NOT NULL,
  `projectStatus` int(1) NOT NULL,
  `acceptetdStatus` int(1) NOT NULL,
  `projectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `projects`
--

INSERT INTO `projects` (`projectName`, `aimedUser`, `projectDescription`, `projectStatus`, `acceptetdStatus`, `projectID`) VALUES
('Project 1', 'vlad@buzatu.com', 'INFO INFO INFO', 1, 1, 1),
('Mamaimea', 'vlad@buzatu.com', 'INFORMATION INFO INFORMATION', 0, 0, 3),
('Mamaimea MIA', 'vlad@buzatu.com', 'INFORMATION more INFO INFORMATION', 0, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
