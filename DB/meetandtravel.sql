-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 27, 2021 at 10:50 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meetandtravel`
--
CREATE DATABASE IF NOT EXISTS `meetandtravel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `meetandtravel`;

-- --------------------------------------------------------

--
-- Table structure for table `accepted_arrangment`
--

DROP TABLE IF EXISTS `accepted_arrangment`;
CREATE TABLE `accepted_arrangment` (
  `idgroup` int(11) NOT NULL,
  `idarrangment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accepted_arrangment`
--

INSERT INTO `accepted_arrangment` (`idgroup`, `idarrangment`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `arrangment`
--

DROP TABLE IF EXISTS `arrangment`;
CREATE TABLE `arrangment` (
  `idarrangment` int(11) NOT NULL,
  `idagecy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arrangment`
--

INSERT INTO `arrangment` (`idarrangment`, `idagecy`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `idgroup` int(11) NOT NULL,
  `idleader` int(11) NOT NULL,
  `idwish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`idgroup`, `idleader`, `idwish`) VALUES
(1, 1, 4),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `idgroup` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idgroup`, `iduser`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `idmessage` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `idsender` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`idmessage`, `idgroup`, `idsender`, `message`) VALUES
(1, 1, 2, 'Necemo u Kinu! Idemo u Portugal!');

-- --------------------------------------------------------

--
-- Table structure for table `paid`
--

DROP TABLE IF EXISTS `paid`;
CREATE TABLE `paid` (
  `idgroup` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idarragment` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paid`
--

INSERT INTO `paid` (`idgroup`, `iduser`, `idarragment`, `amount`) VALUES
(1, 1, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `iduser` int(11) NOT NULL,
  `bio` varchar(256) CHARACTER SET armscii8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`iduser`, `bio`) VALUES
(1, 'Kinezi zauvek!'),
(2, 'Ja sam Cone Conic'),
(3, 'Smaram studente');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
  `idgroup` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`idgroup`, `iduser`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `type`) VALUES
(1, 'luka1234', '2d651bd0c11e07894decce130d5005c7006dd931ab15288388cb2ef76f9d2c71', 'user'),
(2, 'cone1234', '2d651bd0c11e07894decce130d5005c7006dd931ab15288388cb2ef76f9d2c71', 'user'),
(3, 'etf12345', '2d651bd0c11e07894decce130d5005c7006dd931ab15288388cb2ef76f9d2c71', 'agency');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

DROP TABLE IF EXISTS `wish`;
CREATE TABLE `wish` (
  `idwish` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `budget` int(11) DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `coordinate_x` float DEFAULT NULL,
  `coordinate_y` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wish`
--

INSERT INTO `wish` (`idwish`, `iduser`, `budget`, `from`, `to`, `location`, `coordinate_x`, `coordinate_y`) VALUES
(1, 1, 999, '2021-04-20', '2021-04-20', 'Lisbon', 9.0822, 38.425),
(2, 1, 999, '2021-04-20', '2021-04-20', 'Lisbon', 9.0822, 38.425),
(3, 1, 999, '2021-04-20', '2021-12-20', 'Lisbon', 9.0822, 38.425),
(4, 1, 999, '2021-12-15', '2021-12-20', 'Lisbon', 9.0822, 38.425);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_arrangment`
--
ALTER TABLE `accepted_arrangment`
  ADD PRIMARY KEY (`idgroup`,`idarrangment`),
  ADD KEY `IDARRAGMENT_ACCEPTED_idx` (`idarrangment`);

--
-- Indexes for table `arrangment`
--
ALTER TABLE `arrangment`
  ADD PRIMARY KEY (`idarrangment`),
  ADD KEY `IDAGENCY_idx` (`idagecy`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`idgroup`),
  ADD KEY `IDLEADER_idx` (`idleader`),
  ADD KEY `IDWISH_GROUP_idx` (`idwish`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idgroup`,`iduser`),
  ADD KEY `IDUSER_MEMBER_idx` (`iduser`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idmessage`),
  ADD KEY `IDGROUP_MESSAGE_idx` (`idgroup`),
  ADD KEY `IDSENDER_MESSAGE_idx` (`idsender`);

--
-- Indexes for table `paid`
--
ALTER TABLE `paid`
  ADD PRIMARY KEY (`idgroup`,`iduser`,`idarragment`),
  ADD KEY `IDUSER_idx` (`iduser`),
  ADD KEY `IDARRANGMENT_PAID_idx` (`idarragment`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `IDUSER_idx` (`iduser`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`idgroup`,`iduser`),
  ADD KEY `IDUSER_REQUEST_idx` (`iduser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`idwish`),
  ADD KEY `IDUSER_WISH_idx` (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arrangment`
--
ALTER TABLE `arrangment`
  MODIFY `idarrangment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `idwish` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accepted_arrangment`
--
ALTER TABLE `accepted_arrangment`
  ADD CONSTRAINT `IDARRAGMENT_ACCEPTED` FOREIGN KEY (`idarrangment`) REFERENCES `arrangment` (`idarrangment`),
  ADD CONSTRAINT `IDGROUP_ACCEPTED` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`);

--
-- Constraints for table `arrangment`
--
ALTER TABLE `arrangment`
  ADD CONSTRAINT `IDAGENCY` FOREIGN KEY (`idagecy`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `IDLEADER` FOREIGN KEY (`idleader`) REFERENCES `user` (`iduser`),
  ADD CONSTRAINT `IDWISH_GROUP` FOREIGN KEY (`idwish`) REFERENCES `wish` (`idwish`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `IDGROUP_MEMBER` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  ADD CONSTRAINT `IDUSER_MEMBER` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `IDGROUP_MESSAGE` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  ADD CONSTRAINT `IDSENDER_MESSAGE` FOREIGN KEY (`idsender`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `paid`
--
ALTER TABLE `paid`
  ADD CONSTRAINT `IDARRANGMENT_PAID` FOREIGN KEY (`idarragment`) REFERENCES `arrangment` (`idarrangment`),
  ADD CONSTRAINT `IDGROUP_PAID` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  ADD CONSTRAINT `IDUSER_PAID` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `IDUSER` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `IDGROUP_REQUEST` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  ADD CONSTRAINT `IDUSER_REQUEST` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `wish`
--
ALTER TABLE `wish`
  ADD CONSTRAINT `IDUSER_WISH` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
