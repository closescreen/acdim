use avto_cred;

# users:
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
