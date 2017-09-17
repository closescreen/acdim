use avto_cred;

# orgs:
CREATE TABLE `orgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `org_type_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `org_type_id` (`org_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE orgs AUTO_INCREMENT=0;

# Должна быть первая организация id=1 org_type_id='admins'
# она нужна для жестко прописанног в модель User пользователя
insert into orgs (id, name, org_type_id) values (1,'АдминДляВас', 'admins');
