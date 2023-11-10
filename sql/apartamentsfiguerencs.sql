-- MariaDB dump 10.19-11.1.2-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: apartamentsfiguerencs
-- ------------------------------------------------------
-- Server version	11.1.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `apartments`
--

DROP TABLE IF EXISTS `apartments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartments` (
  `price_off_season` decimal(10,2) DEFAULT NULL,
  `price_peak_season` decimal(10,2) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `square_meters` decimal(8,2) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `date1_peak_season` date DEFAULT NULL,
  `date2_peak_season` date DEFAULT NULL,
  `services` varchar(255) DEFAULT NULL,
  `postal_address` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartments`
--

LOCK TABLES `apartments` WRITE;
/*!40000 ALTER TABLE `apartments` DISABLE KEYS */;
INSERT INTO `apartments` VALUES
(30.00,45.00,4,120.00,0.000000,0.000000,'2023-01-07','2023-09-01','','17600','Apartament 1','Descripció apartament 1',1,5),
(35.00,55.00,3,90.00,0.000000,0.000000,'2023-02-15','2023-08-30',NULL,'17601','Apartament 2','Descripció apartament 2',2,4),
(40.00,60.00,2,80.00,0.000000,0.000000,'2023-03-01','2023-09-15',NULL,'17602','Apartament 3','Descripció apartament 3',3,3),
(25.00,50.00,1,60.00,0.000000,0.000000,'2023-04-10','2023-10-01',NULL,'17603','Apartament 4','Descripció apartament 4',4,2),
(50.00,70.00,3,110.00,0.000000,0.000000,'2023-05-20','2023-10-15',NULL,'17604','Apartament 5','Descripció apartament 5',5,6),
(45.00,65.00,2,95.00,0.000000,0.000000,'2023-06-03','2023-09-30',NULL,'17605','Apartament 6','Descripció apartament 6',6,4),
(60.00,80.00,4,130.00,0.000000,0.000000,'2023-07-12','2023-08-31',NULL,'17606','Apartament 7','Descripció apartament 7',7,8),
(55.00,75.00,3,105.00,0.000000,0.000000,'2023-08-25','2023-09-20',NULL,'17607','Apartament 8','Descripció apartament 8',8,6),
(70.00,90.00,2,75.00,0.000000,0.000000,'2023-09-10','2023-09-25',NULL,'17608','Apartament 9','Descripció apartament 9',9,4),
(75.00,95.00,1,55.00,0.000000,0.000000,'2023-10-05','2023-10-20',NULL,'17609','Apartament 10','Descripció apartament 10',10,2);
/*!40000 ALTER TABLE `apartments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `booking_date` date DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `cancelled` tinyint(1) DEFAULT NULL,
  `apartment_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `apartment_code` (`apartment_code`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`apartment_code`) REFERENCES `apartments` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES
('2023-10-24','2023-10-26','2023-11-04',1,0,1);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `url` varchar(255) DEFAULT NULL,
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `apartment_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `apartment_code` (`apartment_code`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`apartment_code`) REFERENCES `apartments` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES
('/assets/img/exterior.jpg',1,1),
('/assets/img/exterior.jpg',2,2),
('/assets/img/exterior.jpg',3,3),
('/assets/img/exterior.jpg',4,4),
('/assets/img/exterior.jpg',5,5),
('/assets/img/exterior.jpg',6,6),
('/assets/img/exterior.jpg',7,7),
('/assets/img/exterior.jpg',8,8),
('/assets/img/exterior.jpg',9,9),
('/assets/img/exterior.jpg',10,10),
('/assets/img/exterior2.jpg',16,1);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `code` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `name` varchar(255) DEFAULT NULL,
  `code` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_permissions`
--

DROP TABLE IF EXISTS `roles_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_permissions` (
  `role_code` int(11) DEFAULT NULL,
  `permission_code` int(11) DEFAULT NULL,
  KEY `role_code` (`role_code`),
  KEY `permission_code` (`permission_code`),
  CONSTRAINT `roles_permissions_ibfk_1` FOREIGN KEY (`role_code`) REFERENCES `roles` (`code`),
  CONSTRAINT `roles_permissions_ibfk_2` FOREIGN KEY (`permission_code`) REFERENCES `permissions` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_permissions`
--

LOCK TABLES `roles_permissions` WRITE;
/*!40000 ALTER TABLE `roles_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seasons`
--

DROP TABLE IF EXISTS `seasons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seasons` (
  `type` varchar(255) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `apartment_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `apartment_code` (`apartment_code`),
  CONSTRAINT `seasons_ibfk_1` FOREIGN KEY (`apartment_code`) REFERENCES `apartments` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seasons`
--

LOCK TABLES `seasons` WRITE;
/*!40000 ALTER TABLE `seasons` DISABLE KEYS */;
/*!40000 ALTER TABLE `seasons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `status` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `apartment_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `apartment_code` (`apartment_code`),
  CONSTRAINT `statuses_ibfk_1` FOREIGN KEY (`apartment_code`) REFERENCES `apartments` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `role_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `role_code` (`role_code`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_code`) REFERENCES `roles` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-27 18:47:58
