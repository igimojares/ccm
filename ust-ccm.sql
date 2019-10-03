CREATE DATABASE  IF NOT EXISTS `ustccm` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ustccm`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ustccm
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `animators`
--

DROP TABLE IF EXISTS `animators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `college` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_animators_college_idx` (`college`),
  KEY `FK_animators_request_idx` (`request`),
  CONSTRAINT `FK_animators_college` FOREIGN KEY (`college`) REFERENCES `colleges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_animators_request` FOREIGN KEY (`request`) REFERENCES `request` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animators`
--

LOCK TABLES `animators` WRITE;
/*!40000 ALTER TABLE `animators` DISABLE KEYS */;
/*!40000 ALTER TABLE `animators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colleges`
--

DROP TABLE IF EXISTS `colleges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colleges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college` varchar(200) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colleges`
--

LOCK TABLES `colleges` WRITE;
/*!40000 ALTER TABLE `colleges` DISABLE KEYS */;
INSERT INTO `colleges` VALUES (1,'IICS',''),(2,'Eng\'g','');
/*!40000 ALTER TABLE `colleges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emcee`
--

DROP TABLE IF EXISTS `emcee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emcee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `college` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_emcee_request_idx` (`request`),
  KEY `FK_emcee_college_idx` (`college`),
  CONSTRAINT `FK_emcee_college` FOREIGN KEY (`college`) REFERENCES `colleges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_emcee_request` FOREIGN KEY (`request`) REFERENCES `request` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emcee`
--

LOCK TABLES `emcee` WRITE;
/*!40000 ALTER TABLE `emcee` DISABLE KEYS */;
/*!40000 ALTER TABLE `emcee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prayerleader`
--

DROP TABLE IF EXISTS `prayerleader`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prayerleader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `college` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_leader_request_idx` (`request`),
  KEY `FK_leader_college_idx` (`college`),
  CONSTRAINT `FK_leader_college` FOREIGN KEY (`college`) REFERENCES `colleges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_leader_request` FOREIGN KEY (`request`) REFERENCES `request` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prayerleader`
--

LOCK TABLES `prayerleader` WRITE;
/*!40000 ALTER TABLE `prayerleader` DISABLE KEYS */;
INSERT INTO `prayerleader` VALUES (2,2,'prayerLeader',1),(3,3,'prayerLeader',1),(4,4,'prayerLeader',1);
/*!40000 ALTER TABLE `prayerleader` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college` int(11) DEFAULT NULL,
  `recollectionDate` datetime DEFAULT NULL,
  `venue` varchar(200) DEFAULT NULL,
  `speaker` varchar(100) DEFAULT NULL,
  `mainCelebrant` varchar(100) DEFAULT NULL,
  `noOfConfessors` int(11) DEFAULT NULL,
  `noOfAttendedStudents` int(11) DEFAULT NULL,
  `noOfConfession` int(11) DEFAULT NULL,
  `dateRequested` datetime DEFAULT NULL,
  `requestedBy` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_request_college_idx` (`college`),
  CONSTRAINT `FK_request_college` FOREIGN KEY (`college`) REFERENCES `colleges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request` int(11) DEFAULT NULL,
  `section` varchar(200) DEFAULT NULL,
  `studentCount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_section_request_idx` (`request`),
  CONSTRAINT `FK_section_request` FOREIGN KEY (`request`) REFERENCES `request` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `singers`
--

DROP TABLE IF EXISTS `singers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `singers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `college` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_singer_request_idx` (`request`),
  KEY `FK_singer_college_idx` (`college`),
  CONSTRAINT `FK_singer_college` FOREIGN KEY (`college`) REFERENCES `colleges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_singer_request` FOREIGN KEY (`request`) REFERENCES `request` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `singers`
--

LOCK TABLES `singers` WRITE;
/*!40000 ALTER TABLE `singers` DISABLE KEYS */;
INSERT INTO `singers` VALUES (2,2,'singer',1),(3,3,'singer',1),(4,4,'singer',1);
/*!40000 ALTER TABLE `singers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `isAdmin` bit(1) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','fef5fcfb63e466274b17fd6d748c38f8','admin','admin','igi.mojares@gmail.com','0000-00-00 00:00:00','','Active');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usher`
--

DROP TABLE IF EXISTS `usher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `college` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usher_request_idx` (`request`),
  KEY `FK_usher_college_idx` (`college`),
  CONSTRAINT `FK_usher_college` FOREIGN KEY (`college`) REFERENCES `colleges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_usher_request` FOREIGN KEY (`request`) REFERENCES `request` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usher`
--

LOCK TABLES `usher` WRITE;
/*!40000 ALTER TABLE `usher` DISABLE KEYS */;
/*!40000 ALTER TABLE `usher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-03  9:44:03
