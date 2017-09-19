
DROP TABLE IF EXISTS `inbank`;
CREATE TABLE `inbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(11) NOT NULL DEFAULT '1',
  `insalon_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `changed` varchar(45) NOT NULL DEFAULT 'current_timestamp on update',
  `changed_by_user_id` int(11) NOT NULL,
  `state_id` varchar(10) NOT NULL DEFAULT 'new',
  `state_desc` varchar(255) NOT NULL,
  `b1` varchar(255) NOT NULL DEFAULT '',
  `b2` varchar(255) NOT NULL DEFAULT '',
  `b3` varchar(255) NOT NULL DEFAULT '',
  `b4` varchar(255) NOT NULL DEFAULT '',
  `b5` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `inbank` WRITE;
UNLOCK TABLES;


DROP TABLE IF EXISTS `insalon`;
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
  `client_bdate` datetime NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


LOCK TABLES `insalon` WRITE;
UNLOCK TABLES;


DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inbank_id` int(11) NOT NULL,
  `created` varchar(45) NOT NULL DEFAULT 'current_timestamp',
  `created_by_user_id` int(11) NOT NULL,
  `text` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`created_by_user_id`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8;


LOCK TABLES `messages` WRITE;
UNLOCK TABLES;


DROP TABLE IF EXISTS `org_bindings`;
CREATE TABLE `org_bindings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_id` (`bank_id`),
  KEY `salon_id` (`salon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


LOCK TABLES `org_bindings` WRITE;
INSERT INTO `org_bindings` VALUES (7,5,2),(8,5,3),(9,6,3),(10,6,4),(11,7,2),(12,7,4);
UNLOCK TABLES;


DROP TABLE IF EXISTS `org_types`;
CREATE TABLE `org_types` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


LOCK TABLES `org_types` WRITE;
INSERT INTO `org_types` VALUES ('bank','банк'),('salon','салон'),('admins','администрация');
UNLOCK TABLES;


DROP TABLE IF EXISTS `orgs`;
CREATE TABLE `orgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `org_type_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `org_type_id` (`org_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


LOCK TABLES `orgs` WRITE;
INSERT INTO `orgs` VALUES (1,'АдминДляВас','admins',1),(2,'Авто Быстр Тестовый','salon',1),(3,'Авто Умелые Ребята Тестовый','salon',1),(4,'Салон Авто Лучший Тестовый','salon',1),(5,'Банк Надежный Тестовый','bank',1),(6,'Банк Восторг Тестовый','bank',1),(7,'Современный Банк Тестовый','bank',1);
UNLOCK TABLES;


DROP TABLE IF EXISTS `rstates`;
CREATE TABLE `rstates` (
  `id` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


LOCK TABLES `rstates` WRITE;
UNLOCK TABLES;


DROP TABLE IF EXISTS `users`;
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


LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (19,1,'admin2','yatut123','Красавкин И.И.',1),(20,1,'salonop21','mashina2','Гонкин А.А.',2),(21,1,'salonop22','mashina2','Винтик В.С.',2),(22,1,'salonop31','gonka3','Шпунтик А.В.',3),(23,1,'salonop32','gonka3','Гайкин А.В.',3),(24,1,'salonop41','gonka3','Тросов В.А.',4),(25,1,'salonop42','gonka3','Лебедкин П.Р.',4),(26,1,'bankop51','dengi4','Планктонов М.И.',5),(27,1,'bankop52','baksi5','Сидячев С.М.',5),(28,1,'bankop61','dengi4','Бумажкин С.М.',6),(29,1,'bankop62','baksi5','Печаткин А.П,',6),(30,1,'bankop71','dengi4','Ручкин В.А.',7),(31,1,'bankop72','baksi5','Стеркин П.А.',7),(32,0,'asdfasd','asdf','asdf',1),(33,0,'111','111','dfgh',1);
UNLOCK TABLES;

