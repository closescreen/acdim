-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: avto_cred
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `inbank`
--

DROP TABLE IF EXISTS `inbank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(11) NOT NULL DEFAULT '1',
  `insalon_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by_user_id` int(11) NOT NULL,
  `state_id` varchar(10) NOT NULL DEFAULT 'new',
  `state_desc` varchar(255) NOT NULL DEFAULT '',
  `b1` varchar(255) NOT NULL DEFAULT '',
  `b2` varchar(255) NOT NULL DEFAULT '',
  `b3` varchar(255) NOT NULL DEFAULT '',
  `b4` varchar(255) NOT NULL DEFAULT '',
  `b5` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inbank`
--

LOCK TABLES `inbank` WRITE;
/*!40000 ALTER TABLE `inbank` DISABLE KEYS */;
INSERT INTO `inbank` VALUES (7,1,4,5,'2017-09-22 07:57:38',0,'new','','','','','',''),(8,1,4,7,'2017-09-22 07:57:38',0,'new','','','','','',''),(9,1,3,5,'2017-09-22 09:40:13',0,'new','Видим cкоро возьмем','','','','',''),(10,1,3,7,'2017-09-22 07:58:05',0,'new','','','','','','');
/*!40000 ALTER TABLE `inbank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insalon`
--

DROP TABLE IF EXISTS `insalon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insalon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(1) NOT NULL DEFAULT '1',
  `salon_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` int(11) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by_user_id` int(11) NOT NULL,
  `client_fname` varchar(20) NOT NULL,
  `client_sname` varchar(20) NOT NULL,
  `client_tname` varchar(20) NOT NULL,
  `client_bdate` date NOT NULL,
  `client_phone` varchar(45) NOT NULL,
  `car_price` int(11) NOT NULL,
  `down_payment` int(11) NOT NULL,
  `equipment_cost` int(11) NOT NULL,
  `equipment_desc` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `car_year` int(11) NOT NULL,
  `s1` varchar(255) NOT NULL,
  `s2` varchar(255) NOT NULL,
  `s3` varchar(255) NOT NULL,
  `s4` varchar(255) NOT NULL,
  `s5` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`active`,`salon_id`,`created_by_user_id`,`changed_by_user_id`,`client_tname`,`client_phone`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insalon`
--

LOCK TABLES `insalon` WRITE;
/*!40000 ALTER TABLE `insalon` DISABLE KEYS */;
INSERT INTO `insalon` VALUES (2,0,2,'2017-09-20 08:10:19',20,'2017-09-20 12:43:45',20,'asdf','asdf','asdf','1980-02-01','  34563456',3456,3456,100,'sdf','sdf',1900,'','','','',''),(3,1,2,'2017-09-20 12:35:18',20,'2017-09-20 12:40:58',20,'Петр','Пертович','Петров','1995-06-05','0987987987',5000,123,0,'','Lada',1945,'','','','',''),(4,1,2,'2017-09-22 07:39:07',20,'2017-09-22 07:39:07',20,'Валерия','Витальевна','Иванова','1990-03-04','9879879879',500000,10000,5000,'','Патриот ВАЗ---',2015,'коммент','','','','');
/*!40000 ALTER TABLE `insalon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inbank_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`,`created_by_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (3,9,'2017-09-22 13:17:04',26,'Привет!'),(4,9,'2017-09-23 08:56:45',20,'Привет из салона!');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_bindings`
--

DROP TABLE IF EXISTS `org_bindings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `org_bindings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_id` (`bank_id`),
  KEY `salon_id` (`salon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_bindings`
--

LOCK TABLES `org_bindings` WRITE;
/*!40000 ALTER TABLE `org_bindings` DISABLE KEYS */;
INSERT INTO `org_bindings` VALUES (7,5,2),(8,5,3),(9,6,3),(10,6,4),(11,7,2),(12,7,4);
/*!40000 ALTER TABLE `org_bindings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `org_types`
--

DROP TABLE IF EXISTS `org_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `org_types` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `org_types`
--

LOCK TABLES `org_types` WRITE;
/*!40000 ALTER TABLE `org_types` DISABLE KEYS */;
INSERT INTO `org_types` VALUES ('bank','банк'),('salon','салон'),('admins','администрация');
/*!40000 ALTER TABLE `org_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orgs`
--

DROP TABLE IF EXISTS `orgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `org_type_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `org_type_id` (`org_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orgs`
--

LOCK TABLES `orgs` WRITE;
/*!40000 ALTER TABLE `orgs` DISABLE KEYS */;
INSERT INTO `orgs` VALUES (1,'АдминДляВас','admins',1),(2,'Авто Быстр Тестовый','salon',1),(3,'Авто Умелые Ребята Тестовый','salon',1),(4,'Салон Авто Лучший Тестовый','salon',1),(5,'Банк Надежный Тестовый','bank',1),(6,'Банк Восторг Тестовый','bank',1),(7,'Современный Банк Тестовый','bank',1);
/*!40000 ALTER TABLE `orgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rstates`
--

DROP TABLE IF EXISTS `rstates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rstates` (
  `id` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `style` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rstates`
--

LOCK TABLES `rstates` WRITE;
/*!40000 ALTER TABLE `rstates` DISABLE KEYS */;
INSERT INTO `rstates` VALUES ('new','Новая','request-status-new'),('in-work','В работе','request-status-in-work'),('approved','Одобрена','request-status-approved'),('rejected','Отклонена','request-status-rejected'),('formalized','Оформлена','request-status-formalized');
/*!40000 ALTER TABLE `rstates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` int(11) NOT NULL,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `changed_by_user_id` int(11) NOT NULL,
  `content` mediumblob NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(1) NOT NULL DEFAULT '1',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fio` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `org_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `org_id` (`org_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (19,1,'admin2','yatut123','Красавкин И.И.',1),(20,1,'salonop21','mashina2','Гонкин А.А.',2),(21,1,'salonop22','mashina2','Винтик В.С.',2),(22,1,'salonop31','gonka3','Шпунтик А.В.',3),(23,1,'salonop32','gonka3','Гайкин А.В.',3),(24,1,'salonop41','gonka3','Тросов В.А.',4),(25,1,'salonop42','gonka3','Лебедкин П.Р.',4),(26,1,'bankop51','dengi4','Планктонов М.И.',5),(27,1,'bankop52','baksi5','Сидячев С.М.',5),(28,1,'bankop61','dengi4','Бумажкин С.М.',6),(29,1,'bankop62','baksi5','Печаткин А.П,',6),(30,1,'bankop71','dengi4','Ручкин В.А.',7),(31,1,'bankop72','baksi5','Стеркин П.А.',7),(32,0,'asdfasd','asdf','asdf',1),(33,0,'111','111','dfgh',1);
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

-- Dump completed on 2017-09-23 12:25:59
