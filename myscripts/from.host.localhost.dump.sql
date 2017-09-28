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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inbank`
--

LOCK TABLES `inbank` WRITE;
/*!40000 ALTER TABLE `inbank` DISABLE KEYS */;
INSERT INTO `inbank` VALUES (7,1,4,5,'2017-09-22 07:57:38',0,'new','','','','','',''),(8,1,4,7,'2017-09-22 07:57:38',0,'new','','','','','',''),(9,1,3,5,'2017-09-27 14:03:18',26,'in-work','Видим cкоро возьмем','','','','',''),(10,1,3,7,'2017-09-22 07:58:05',0,'new','','','','','',''),(11,1,5,5,'2017-09-26 07:35:52',0,'in-work','','','','','',''),(12,1,5,7,'2017-09-25 15:37:06',0,'new','','','','','',''),(13,1,6,5,'2017-09-27 07:51:02',0,'rejected','','','','','',''),(14,1,6,7,'2017-09-26 20:41:24',0,'new','','','','','',''),(15,1,7,5,'2017-09-27 07:51:24',0,'approved','','','','','',''),(16,1,7,7,'2017-09-26 21:02:37',0,'new','','','','','',''),(17,1,8,5,'2017-09-27 13:14:37',0,'in-work','','','','','',''),(18,1,8,7,'2017-09-27 09:36:51',0,'new','','','','','',''),(19,1,9,5,'2017-09-27 12:43:57',0,'formalized','','','','','',''),(20,1,9,7,'2017-09-27 10:03:40',0,'new','','','','','',''),(21,1,10,5,'2017-09-28 07:41:32',0,'new','','','','','',''),(22,1,10,6,'2017-09-28 07:41:32',0,'new','','','','','','');
/*!40000 ALTER TABLE `inbank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `inbank_last_msg`
--

DROP TABLE IF EXISTS `inbank_last_msg`;
/*!50001 DROP VIEW IF EXISTS `inbank_last_msg`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `inbank_last_msg` AS SELECT 
 1 AS `id`,
 1 AS `active`,
 1 AS `insalon_id`,
 1 AS `bank_id`,
 1 AS `changed`,
 1 AS `changed_by_user_id`,
 1 AS `state_id`,
 1 AS `state_desc`,
 1 AS `b1`,
 1 AS `b2`,
 1 AS `b3`,
 1 AS `b4`,
 1 AS `b5`,
 1 AS `bank_name`,
 1 AS `salon_name`,
 1 AS `s_client_fio`,
 1 AS `s_client_bdate`,
 1 AS `s_client_phone`,
 1 AS `s_car_price`,
 1 AS `s_down_payment`,
 1 AS `s_equipment_cost`,
 1 AS `s_equipment_desc`,
 1 AS `s_car_model`,
 1 AS `s_car_year`,
 1 AS `m_id`,
 1 AS `m_created`,
 1 AS `m_created_by_user_id`,
 1 AS `m_created_text`*/;
SET character_set_client = @saved_cs_client;

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insalon`
--

LOCK TABLES `insalon` WRITE;
/*!40000 ALTER TABLE `insalon` DISABLE KEYS */;
INSERT INTO `insalon` VALUES (2,0,2,'2017-09-20 08:10:19',20,'2017-09-20 12:43:45',20,'asdf','asdf','asdf','1980-02-01','  34563456',3456,3456,100,'sdf','sdf',1900,'','','','',''),(3,1,2,'2017-09-20 12:35:18',20,'2017-09-27 09:13:08',20,'Петр','Пертович','Петров','1995-06-05','0987987987',5000,123,0,'','Lada',1945,'','','','',''),(4,1,2,'2017-09-22 07:39:07',20,'2017-09-26 07:05:16',20,'Валерия','Витальевна','Иванова','1990-03-04','9879879879',500000,10000,5000,'','Патриот ВАЗ---',2015,'коммент','','','',''),(5,1,2,'2017-09-25 15:37:06',20,'2017-09-25 15:37:06',20,'Василий','Васильевич','Васечкин','1995-05-07','8800200600',600000,20000,5000,'фары','Mersedes',1955,'s1 text','s2 text','s3 text','s4 text','s5 text'),(6,1,2,'2017-09-26 20:41:24',20,'2017-09-27 10:01:39',20,'Иван','Петрович','Сидоров','1975-02-03','12342345',400000,20000,0,'','Камаз 3120',1985,'','','','',''),(7,1,2,'2017-09-26 21:02:37',20,'2017-09-26 21:02:37',20,'Сергей','Васильевич','Мопедов','1975-11-15','8-945-123-234',500000,30000,0,'','BMW 6',2010,'','','','',''),(8,1,2,'2017-09-27 09:36:51',20,'2017-09-27 09:36:51',20,'Вениамин','Довлатович','Скоростин','1995-04-03','+7 345-456-567',200000,10000,0,'','Formula Bollid',2011,'','','','',''),(9,1,2,'2017-09-27 10:03:40',20,'2017-09-27 10:03:40',20,'Антон','Мявович','Светоч','1985-12-31','8-234-346',300000,20000,0,'','УАЗ-469',1985,'','','','',''),(10,1,3,'2017-09-28 07:41:32',22,'2017-09-28 07:41:32',22,'Дмитрий','Фиолетович','Умелов','1985-06-01','+123-345-457',500670,35000,5000,'GPS','Lada kalina',2015,'одно примечание','','','','');
/*!40000 ALTER TABLE `insalon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `insalon_max_state_last_msg`
--

DROP TABLE IF EXISTS `insalon_max_state_last_msg`;
/*!50001 DROP VIEW IF EXISTS `insalon_max_state_last_msg`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `insalon_max_state_last_msg` AS SELECT 
 1 AS `id`,
 1 AS `active`,
 1 AS `salon_id`,
 1 AS `salon_name`,
 1 AS `created`,
 1 AS `created_by_user_id`,
 1 AS `changed`,
 1 AS `changed_by_user_id`,
 1 AS `client_fio`,
 1 AS `client_fname`,
 1 AS `client_sname`,
 1 AS `client_tname`,
 1 AS `client_bdate`,
 1 AS `client_phone`,
 1 AS `car_price`,
 1 AS `down_payment`,
 1 AS `equipment_cost`,
 1 AS `equipment_desc`,
 1 AS `car_model`,
 1 AS `car_year`,
 1 AS `s1`,
 1 AS `s2`,
 1 AS `s3`,
 1 AS `s4`,
 1 AS `s5`,
 1 AS `state_stage`,
 1 AS `state_id`,
 1 AS `state_name`,
 1 AS `m_id`,
 1 AS `m_inbank_id`,
 1 AS `m_created`,
 1 AS `m_created_text`,
 1 AS `m_created_by_user_id`*/;
SET character_set_client = @saved_cs_client;

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (3,9,'2017-09-22 13:17:04',26,'Привет!'),(4,9,'2017-09-23 08:56:45',20,'Привет из салона!'),(5,11,'2017-09-25 15:37:42',20,'Заявку видели?'),(6,12,'2017-09-25 15:38:13',20,'А вы заявку видели? Дело в том, что я новенький.'),(7,15,'2017-09-26 21:05:04',20,'Привет'),(8,16,'2017-09-26 21:11:21',20,'hello');
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
  `stage` int(1) NOT NULL,
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
INSERT INTO `rstates` VALUES ('new',0,'Новая','request-status-new'),('in-work',1,'В работе','request-status-in-work'),('approved',2,'Одобрена','request-status-approved'),('rejected',-1,'Отклонена','request-status-rejected'),('formalized',4,'Оформлена','request-status-formalized');
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
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_real_name` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `file_desc` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `inbank_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` VALUES (5,1,'2017-09-24 11:34:13',26,'2017-09-24 11:34:13',26,'Beach_by_Renato_Giordanelli.jpg','/home/dima/avto-cred-dim/config/../web/uploads/2017-09/s2/b5//1506252853.1496_Beach_by_Renato_Giordanelli.jpg','aaaaaaaa',9),(6,1,'2017-09-24 12:01:49',26,'2017-09-24 12:01:49',26,'Безымянный документ.txt','/home/dima/avto-cred-dim/config/../web/uploads/2017-09/s2/b5//1506254509.5394_Безымянный документ.txt','Документ, который очень просили',9),(7,1,'2017-09-27 11:24:04',20,'2017-09-27 11:24:04',20,'Julia_on_LLVM4.png','/home/belyaev/Avtocred/config/../web/uploads/2017-09/s2/b5//1506511444.6583_Julia_on_LLVM4.png','Фото',19),(8,1,'2017-09-27 11:33:14',20,'2017-09-27 11:33:14',20,'Beach_by_Renato_Giordanelli_hot_keys.png','/home/belyaev/Avtocred/config/../web/uploads/2017-09/s2/b5//1506511994.6148_Beach_by_Renato_Giordanelli_hot_keys.png','Пляж',19),(9,1,'2017-09-27 11:47:44',20,'2017-09-27 11:47:44',20,'Juliabox.png','/home/belyaev/Avtocred/config/../web/uploads/2017-09/s2/b5//1506512864.492_Juliabox.png','Juliabox',9),(10,1,'2017-09-27 11:50:34',20,'2017-09-27 11:50:34',20,'llvm.jpg','/home/belyaev/Avtocred/config/../web/uploads/2017-09/s2/b7//1506513034.5508_llvm.jpg','llvm',10);
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

--
-- Final view structure for view `inbank_last_msg`
--

/*!50001 DROP VIEW IF EXISTS `inbank_last_msg`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `inbank_last_msg` AS select `b`.`id` AS `id`,`b`.`active` AS `active`,`b`.`insalon_id` AS `insalon_id`,`b`.`bank_id` AS `bank_id`,`b`.`changed` AS `changed`,`b`.`changed_by_user_id` AS `changed_by_user_id`,`b`.`state_id` AS `state_id`,`b`.`state_desc` AS `state_desc`,`b`.`b1` AS `b1`,`b`.`b2` AS `b2`,`b`.`b3` AS `b3`,`b`.`b4` AS `b4`,`b`.`b5` AS `b5`,`bo`.`name` AS `bank_name`,`salon`.`name` AS `salon_name`,concat_ws('.',`s`.`client_tname`,substr(`s`.`client_fname`,1,1),substr(`s`.`client_sname`,1,1)) AS `s_client_fio`,`s`.`client_bdate` AS `s_client_bdate`,`s`.`client_phone` AS `s_client_phone`,`s`.`car_price` AS `s_car_price`,`s`.`down_payment` AS `s_down_payment`,`s`.`equipment_cost` AS `s_equipment_cost`,`s`.`equipment_desc` AS `s_equipment_desc`,`s`.`car_model` AS `s_car_model`,`s`.`car_year` AS `s_car_year`,`m`.`id` AS `m_id`,`m`.`created` AS `m_created`,`m`.`created_by_user_id` AS `m_created_by_user_id`,concat_ws(' ',`m`.`created`,`m`.`text`) AS `m_created_text` from (((((`avto_cred`.`inbank` `b` left join (select `avto_cred`.`messages`.`inbank_id` AS `inbank_id`,max(`avto_cred`.`messages`.`id`) AS `last_msg_id` from `avto_cred`.`messages` group by `avto_cred`.`messages`.`inbank_id`) `lm` on((`lm`.`inbank_id` = `b`.`id`))) left join `avto_cred`.`messages` `m` on((`lm`.`last_msg_id` = `m`.`id`))) left join `avto_cred`.`orgs` `bo` on((`b`.`bank_id` = `bo`.`id`))) left join `avto_cred`.`insalon` `s` on((`b`.`insalon_id` = `s`.`id`))) left join `avto_cred`.`orgs` `salon` on((`s`.`salon_id` = `salon`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `insalon_max_state_last_msg`
--

/*!50001 DROP VIEW IF EXISTS `insalon_max_state_last_msg`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `insalon_max_state_last_msg` AS select `s`.`id` AS `id`,`s`.`active` AS `active`,`s`.`salon_id` AS `salon_id`,`salon`.`name` AS `salon_name`,`s`.`created` AS `created`,`s`.`created_by_user_id` AS `created_by_user_id`,`s`.`changed` AS `changed`,`s`.`changed_by_user_id` AS `changed_by_user_id`,concat_ws('.',`s`.`client_tname`,substr(`s`.`client_fname`,1,1),substr(`s`.`client_sname`,1,1)) AS `client_fio`,`s`.`client_fname` AS `client_fname`,`s`.`client_sname` AS `client_sname`,`s`.`client_tname` AS `client_tname`,`s`.`client_bdate` AS `client_bdate`,`s`.`client_phone` AS `client_phone`,`s`.`car_price` AS `car_price`,`s`.`down_payment` AS `down_payment`,`s`.`equipment_cost` AS `equipment_cost`,`s`.`equipment_desc` AS `equipment_desc`,`s`.`car_model` AS `car_model`,`s`.`car_year` AS `car_year`,`s`.`s1` AS `s1`,`s`.`s2` AS `s2`,`s`.`s3` AS `s3`,`s`.`s4` AS `s4`,`s`.`s5` AS `s5`,`sal_st`.`stage` AS `state_stage`,`st`.`id` AS `state_id`,`st`.`name` AS `state_name`,`sal_msg`.`id` AS `m_id`,`m`.`inbank_id` AS `m_inbank_id`,`m`.`created` AS `m_created`,concat_ws(' ',`m`.`created`,`m`.`text`) AS `m_created_text`,`m`.`created_by_user_id` AS `m_created_by_user_id` from (((((`avto_cred`.`insalon` `s` left join (select `b`.`insalon_id` AS `insalon_id`,max(`rs`.`stage`) AS `stage` from (`avto_cred`.`inbank` `b` left join `avto_cred`.`rstates` `rs` on((`rs`.`id` = `b`.`state_id`))) group by `b`.`insalon_id`) `sal_st` on((`s`.`id` = `sal_st`.`insalon_id`))) left join `avto_cred`.`rstates` `st` on((`sal_st`.`stage` = `st`.`stage`))) left join (select `b`.`insalon_id` AS `insalon_id`,max(`m`.`id`) AS `id` from (`avto_cred`.`inbank` `b` left join `avto_cred`.`messages` `m` on((`b`.`id` = `m`.`inbank_id`))) group by `b`.`insalon_id`) `sal_msg` on((`s`.`id` = `sal_msg`.`insalon_id`))) left join `avto_cred`.`messages` `m` on((`m`.`id` = `sal_msg`.`id`))) left join `avto_cred`.`orgs` `salon` on((`s`.`salon_id` = `salon`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-28 11:45:03
