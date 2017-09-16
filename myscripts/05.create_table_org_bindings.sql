use avto_cred;

# ORG_BINDINGS
CREATE TABLE `org_bindings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `salon_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_id` (`bank_id`),
  KEY `salon_id` (`salon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
