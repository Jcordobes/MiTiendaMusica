-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: den1.mysql2.gear.host    Database: tiendamusica
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `number_of_songs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,'bohemian rhapsody','2018-10-19',4),(2,'Un alumno más','2014-11-25',4),(3,'Karma','2001-02-19',4),(4,'Revival','2017-12-15',4),(5,'Oasis','2019-06-28',4),(6,'Justicia Universal','2019-03-04',4);
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `home_city` varchar(100) DEFAULT NULL,
  `rating` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES (1,'Freddie','Mercury','Londres','5','H','45'),(2,'','Melendi','Oviedo','4','H','41'),(3,'Kamelot','','','5','Banda',''),(4,'Eminem','','St. Joseph','4','H','47'),(5,'Bad Bunny','','Vega Baja','3','H','26'),(6,'Dorian','','','4','Banda','');
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `customer_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorisedby`
--

DROP TABLE IF EXISTS `categorisedby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorisedby` (
  `track_id` int(11) NOT NULL,
  `genre_id` int(11) DEFAULT NULL,
  KEY `track_id_idx` (`track_id`),
  KEY `genre_id_idx` (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorisedby`
--

LOCK TABLES `categorisedby` WRITE;
/*!40000 ALTER TABLE `categorisedby` DISABLE KEYS */;
INSERT INTO `categorisedby` VALUES (1,4),(2,4),(3,4),(4,4),(5,1),(6,1),(7,1),(8,1),(9,2),(10,2),(11,2),(12,2),(13,3),(14,3),(15,3),(16,3),(17,5),(18,5),(19,5),(20,5),(21,6),(22,6),(23,6),(24,6);
/*!40000 ALTER TABLE `categorisedby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compose`
--

DROP TABLE IF EXISTS `compose`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compose` (
  `track_id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compose`
--

LOCK TABLES `compose` WRITE;
/*!40000 ALTER TABLE `compose` DISABLE KEYS */;
INSERT INTO `compose` VALUES (1,1),(2,1),(3,1),(4,1),(5,2),(6,2),(7,2),(8,2),(9,3),(10,3),(11,3),(12,3),(13,4),(14,4),(15,4),(16,4),(17,5),(18,5),(19,5),(20,5),(21,6),(22,6),(23,6),(24,6);
/*!40000 ALTER TABLE `compose` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `email_id` varchar(40) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (7,'Javier','C.','666666666','mimail@mail.com',NULL,'jcordobes','12345678',NULL,NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fulfilledby`
--

DROP TABLE IF EXISTS `fulfilledby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fulfilledby` (
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fulfilledby`
--

LOCK TABLES `fulfilledby` WRITE;
/*!40000 ALTER TABLE `fulfilledby` DISABLE KEYS */;
/*!40000 ALTER TABLE `fulfilledby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'Pop'),(2,'Metal'),(3,'Rap'),(4,'Rock'),(5,'Reggaeton'),(6,'Indie');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makes`
--

DROP TABLE IF EXISTS `makes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `makes` (
  `artist_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makes`
--

LOCK TABLES `makes` WRITE;
/*!40000 ALTER TABLE `makes` DISABLE KEYS */;
INSERT INTO `makes` VALUES (1,1),(1,2),(1,3),(1,4),(2,5),(2,6),(2,7),(2,8),(3,9),(3,10),(3,11),(3,12),(4,13),(4,14),(4,15),(4,16),(5,17),(5,18),(5,19),(5,20),(6,21),(6,22),(6,23),(6,24);
/*!40000 ALTER TABLE `makes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `track_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `original_price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `paid_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (5,1,'2017-11-21',99,0,99),(1,2,'2017-11-21',1000,120,NULL),(10,2,'2017-11-21',100,12,90),(5,3,'2017-11-21',99,0,99),(5,4,'2017-11-21',99,0,99),(10,10,'2017-11-21',10,0,10),(10,12,'2017-11-21',100,12,90),(2,13,'2017-11-22',99,99,0),(3,13,'2017-11-22',99,99,0),(4,13,'2017-11-22',99,99,0),(3,14,'2017-11-22',1031,0,1031),(256,14,'2017-11-22',153,0,153),(3,15,'2017-11-22',1031,0,1031),(4,15,'2017-11-22',351,0,351),(6,15,'2017-11-22',44,0,44),(2,16,'2017-11-22',1169,0,1169),(1,17,'2017-11-22',1170,0,1170),(57,17,'2017-11-22',1157,0,1157),(1,18,'2017-11-22',1170,0,1170),(3,19,'2017-11-22',1031,0,1031),(4,19,'2017-11-22',351,0,351),(21,20,'2017-11-22',902,0,902),(691,20,'2017-11-22',160,0,160),(2,21,'2017-11-22',1169,0,1169),(991,21,'2017-11-22',999,0,999),(4,22,'2017-11-22',351,28,323),(4,23,'2017-11-22',351,28,323),(2,24,'2017-11-22',1169,140,1029),(3,24,'2017-11-22',1031,124,907),(3,25,'2017-11-22',1031,124,907),(1,26,'2020-05-20',17,2,15),(5,27,'2020-05-20',11,1,10),(17,28,'2020-05-20',9,1,8),(1,29,'2020-05-21',17,2,15),(2,29,'2020-05-21',11,1,10),(1,30,'2020-05-26',17,2,15),(14,30,'2020-05-26',7,1,6),(10,121,'2017-11-21',800,96,720),(10,122,'2017-11-21',900,108,810),(10,123,'2017-11-21',10000,1200,9000),(10,1211,'2017-11-21',1000,120,900),(11,12112,NULL,NULL,NULL,NULL),(12,112112,'2017-11-21',NULL,NULL,NULL),(4,31,'2020-05-26',7,1,6),(3,32,'2020-05-31',8,1,7);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `places` (
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` VALUES (7,26,1),(7,27,5),(7,28,17),(7,29,1),(7,29,2),(7,30,1),(7,30,14),(7,31,4),(7,32,3);
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `telephone_number` varchar(20) DEFAULT NULL,
  `email_id` varchar(40) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller`
--

LOCK TABLES `seller` WRITE;
/*!40000 ALTER TABLE `seller` DISABLE KEYS */;
INSERT INTO `seller` VALUES (1,'Javier','Cordobés','MiCorreo@gmail.com ','jcordobes','12345678');
/*!40000 ALTER TABLE `seller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sells`
--

DROP TABLE IF EXISTS `sells`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sells` (
  `track_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sells`
--

LOCK TABLES `sells` WRITE;
/*!40000 ALTER TABLE `sells` DISABLE KEYS */;
/*!40000 ALTER TABLE `sells` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `track`
--

DROP TABLE IF EXISTS `track`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `track` (
  `track_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `track`
--

LOCK TABLES `track` WRITE;
/*!40000 ALTER TABLE `track` DISABLE KEYS */;
INSERT INTO `track` VALUES (1,'Bohemian Rhapsody',355,'1975-10-31','english',17),(2,'Love of my life',222,'1979-06-29','english',11),(3,'I want to break free',200,'1984-02-27','english',8),(4,'Killer Queen',180,'1974-10-12','english',7),(5,'Tocado y hundido',211,'2014-09-15','español',11),(6,'La promesa',233,'2014-11-25','español',7),(7,'Saraluna',432,'2014-10-25','español',8),(8,'Septiembre',246,'2014-11-25','español',8),(9,'Forever',247,'2001-07-19','english',10),(10,'Karma',312,'2001-07-19','english',17),(11,'Don\'t You Cry',258,'2001-07-19','english',13),(12,'The Spell',240,'2001-07-19','english',11),(13,'Remind Me',243,'2017-12-17','english',12),(14,'Heat',190,'2017-12-17','english',7),(15,'Need Me',265,'2017-12-17','english',6),(16,'In Your Head',182,'2017-05-07','english',7),(17,'La canción',242,'2019-06-28','español',9),(18,'Odio',270,'2019-06-28','español',10),(19,'Yo le llego',249,'2019-06-28','español',11),(20,'Cuidao por ahí',198,'2019-06-28','español',12),(21,'Duele',210,'2018-05-25','español',13),(22,'Justicia Universal',228,'2018-05-25','español',11),(23,'Noches Blancas',217,'2018-05-25','español',13),(24,'Cometas',271,'2018-05-25','español',7);
/*!40000 ALTER TABLE `track` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-31 15:28:27
