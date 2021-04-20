CREATE DATABASE  IF NOT EXISTS `meetandtravel`  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci; /*!80016 DEFAULT ENCRYPTION='N' */;
USE `meetandtravel`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: meetandtravel
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accepted_arrangment`
--

DROP TABLE IF EXISTS `accepted_arrangment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accepted_arrangment` (
  `idgroup` int NOT NULL,
  `idarrangment` int NOT NULL,
  PRIMARY KEY (`idgroup`,`idarrangment`),
  KEY `IDARRAGMENT_ACCEPTED_idx` (`idarrangment`),
  CONSTRAINT `IDARRAGMENT_ACCEPTED` FOREIGN KEY (`idarrangment`) REFERENCES `arrangment` (`idarrangment`),
  CONSTRAINT `IDGROUP_ACCEPTED` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accepted_arrangment`
--

LOCK TABLES `accepted_arrangment` WRITE;
/*!40000 ALTER TABLE `accepted_arrangment` DISABLE KEYS */;
/*!40000 ALTER TABLE `accepted_arrangment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arrangment`
--

DROP TABLE IF EXISTS `arrangment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arrangment` (
  `idarrangment` int NOT NULL AUTO_INCREMENT,
  `idagecy` int NOT NULL,
  PRIMARY KEY (`idarrangment`),
  KEY `IDAGENCY_idx` (`idagecy`),
  CONSTRAINT `IDAGENCY` FOREIGN KEY (`idagecy`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arrangment`
--

LOCK TABLES `arrangment` WRITE;
/*!40000 ALTER TABLE `arrangment` DISABLE KEYS */;
/*!40000 ALTER TABLE `arrangment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group` (
  `idgroup` int NOT NULL AUTO_INCREMENT,
  `idleader` int NOT NULL,
  `idwish` int NOT NULL,
  PRIMARY KEY (`idgroup`),
  KEY `IDLEADER_idx` (`idleader`),
  KEY `IDWISH_GROUP_idx` (`idwish`),
  CONSTRAINT `IDLEADER` FOREIGN KEY (`idleader`) REFERENCES `user` (`iduser`),
  CONSTRAINT `IDWISH_GROUP` FOREIGN KEY (`idwish`) REFERENCES `wish` (`idwish`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (1,1,4);
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `idgroup` int NOT NULL,
  `iduser` int NOT NULL,
  PRIMARY KEY (`idgroup`,`iduser`),
  KEY `IDUSER_MEMBER_idx` (`iduser`),
  CONSTRAINT `IDGROUP_MEMBER` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  CONSTRAINT `IDUSER_MEMBER` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,1),(1,3);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message` (
  `idmessage` int NOT NULL AUTO_INCREMENT,
  `idgroup` int NOT NULL,
  `idsender` int NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`idmessage`),
  KEY `IDGROUP_MESSAGE_idx` (`idgroup`),
  KEY `IDSENDER_MESSAGE_idx` (`idsender`),
  CONSTRAINT `IDGROUP_MESSAGE` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  CONSTRAINT `IDSENDER_MESSAGE` FOREIGN KEY (`idsender`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paid`
--

DROP TABLE IF EXISTS `paid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paid` (
  `idgroup` int NOT NULL,
  `iduser` int NOT NULL,
  `idarragment` int NOT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`idgroup`,`iduser`,`idarragment`),
  KEY `IDUSER_idx` (`iduser`),
  KEY `IDARRANGMENT_PAID_idx` (`idarragment`),
  CONSTRAINT `IDARRANGMENT_PAID` FOREIGN KEY (`idarragment`) REFERENCES `arrangment` (`idarrangment`),
  CONSTRAINT `IDGROUP_PAID` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  CONSTRAINT `IDUSER_PAID` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paid`
--

LOCK TABLES `paid` WRITE;
/*!40000 ALTER TABLE `paid` DISABLE KEYS */;
/*!40000 ALTER TABLE `paid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profile` (
  `iduser` int NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `IDUSER_idx` (`iduser`),
  CONSTRAINT `IDUSER` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request` (
  `idgroup` int NOT NULL,
  `iduser` int NOT NULL,
  PRIMARY KEY (`idgroup`,`iduser`),
  KEY `IDUSER_REQUEST_idx` (`iduser`),
  CONSTRAINT `IDGROUP_REQUEST` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`),
  CONSTRAINT `IDUSER_REQUEST` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'luka','legenda','user'),(3,'ludi','legenda','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wish`
--

DROP TABLE IF EXISTS `wish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wish` (
  `idwish` int NOT NULL AUTO_INCREMENT,
  `iduser` int NOT NULL,
  `budget` int DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `coordinate_x` decimal(10,0) DEFAULT NULL,
  `coordinate_y` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idwish`),
  KEY `IDUSER_WISH_idx` (`iduser`),
  CONSTRAINT `IDUSER_WISH` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wish`
--

LOCK TABLES `wish` WRITE;
/*!40000 ALTER TABLE `wish` DISABLE KEYS */;
INSERT INTO `wish` VALUES (1,1,999,NULL,NULL,'Lisbon',NULL,NULL),(2,1,999,'2021-04-20','2021-04-20','Lisbon',NULL,NULL),(3,1,999,'2021-04-20','2021-12-20','Lisbon',NULL,NULL),(4,1,999,'2021-12-15','2021-12-20','Lisbon',NULL,NULL);
/*!40000 ALTER TABLE `wish` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-20 11:09:45
