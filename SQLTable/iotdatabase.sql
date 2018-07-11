-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 12:48 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iotdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `devicelist`
--

CREATE TABLE `devicelist` (
  `indexID` int(16) NOT NULL,
  `deviceID` varchar(255) DEFAULT NULL,
  `NumberOfPorts` int(16) DEFAULT NULL,
  `DeviceType` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devicelist`
--

INSERT INTO `devicelist` (`indexID`, `deviceID`, `NumberOfPorts`, `DeviceType`) VALUES
(1, 'iot001', 2, 'S'),
(2, 'iot002', 2, 'S'),
(3, 'iot003', 1, 'S/R'),
(5, 'iot004', 2, 'S'),
(14, 'iot005', 2, 'S'),
(15, 'iot006', 2, 'S/W'),
(16, 'iot007', 2, 'S'),
(17, 'iot008', 1, 'S'),
(18, 'iot009', 2, 'S/W'),
(19, 'iot0010', 1, 'S/W'),
(20, 'iot0011', 2, 'S'),
(21, 'iot0012', 2, 'S'),
(22, 'iot0013', 1, 'S/W'),
(23, 'iot0015', 1, 'S'),
(24, 'iot0014', 1, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `devicestatus`
--

CREATE TABLE `devicestatus` (
  `serialNo` int(255) NOT NULL,
  `deviceID` varchar(255) DEFAULT NULL,
  `devicePortNo` varchar(255) DEFAULT NULL,
  `Activation` varchar(8) DEFAULT NULL,
  `deviceStatus` int(4) DEFAULT NULL,
  `ParentKey` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devicestatus`
--

INSERT INTO `devicestatus` (`serialNo`, `deviceID`, `devicePortNo`, `Activation`, `deviceStatus`, `ParentKey`) VALUES
(10, 'iot001', '1', 'yes', 0, 14),
(11, 'iot001', '2', 'yes', 0, 14),
(12, 'iot003', '1', 'yes', 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `serialNo` int(255) NOT NULL,
  `FirstName` varchar(64) DEFAULT NULL,
  `LastName` varchar(64) DEFAULT NULL,
  `UserName` varchar(64) DEFAULT NULL,
  `UserPassword` varchar(255) DEFAULT NULL,
  `EmailAddress` varchar(128) DEFAULT NULL,
  `UserType` varchar(128) DEFAULT NULL,
  `ProfilePicPath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`serialNo`, `FirstName`, `LastName`, `UserName`, `UserPassword`, `EmailAddress`, `UserType`, `ProfilePicPath`) VALUES
(10, 'Bidyut', 'Debnath', '1992bidyut', 'e10adc3949ba59abbe56e057f20f883e', '1992bidyut@gmail.com', 'user', 'profile-image/IMG_20171205_233811.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usertoderive`
--

CREATE TABLE `usertoderive` (
  `serialNo` int(255) NOT NULL,
  `UserName` varchar(128) DEFAULT NULL,
  `DeviceID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertoderive`
--

INSERT INTO `usertoderive` (`serialNo`, `UserName`, `DeviceID`) VALUES
(14, '1992bidyut', 'iot001'),
(15, '1992bidyut', 'iot003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devicelist`
--
ALTER TABLE `devicelist`
  ADD PRIMARY KEY (`indexID`),
  ADD UNIQUE KEY `deviceID` (`deviceID`);

--
-- Indexes for table `devicestatus`
--
ALTER TABLE `devicestatus`
  ADD PRIMARY KEY (`serialNo`),
  ADD KEY `ParentKey` (`ParentKey`);

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`serialNo`),
  ADD UNIQUE KEY `EmailAddress` (`EmailAddress`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `usertoderive`
--
ALTER TABLE `usertoderive`
  ADD PRIMARY KEY (`serialNo`),
  ADD UNIQUE KEY `DeviceID` (`DeviceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devicelist`
--
ALTER TABLE `devicelist`
  MODIFY `indexID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `devicestatus`
--
ALTER TABLE `devicestatus`
  MODIFY `serialNo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `serialNo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usertoderive`
--
ALTER TABLE `usertoderive`
  MODIFY `serialNo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devicestatus`
--
ALTER TABLE `devicestatus`
  ADD CONSTRAINT `devicestatus_ibfk_1` FOREIGN KEY (`ParentKey`) REFERENCES `usertoderive` (`serialNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
