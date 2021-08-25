SET foreign_key_checks = 0; 


DROP TABLE admin;

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` enum('1','2') NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO admin VALUES("4","Elise Goldner","Frederique2","xlind@shields.com","$2y$10$PGHeaqEoza0.WJ7sXAXEg.FqJzNwvAS6V..wOd8m1OheNkdx5flEu","1","0000-00-00 00:00:00","2021-07-05 19:33:49");
INSERT INTO admin VALUES("5","Arielle Parisian","Ashleigh0","sconnelly@becker.com","$2y$10$66AE.Ipzoz0iptwt8o3DCeEymO94ZrYxQoPGsaF0Sy8TUvrNLJz82","1","0000-00-00 00:00:00","2021-07-05 19:33:50");
INSERT INTO admin VALUES("6","Chase Wintheiser","Kaci9","verda94@hotmail.com","$2y$10$msYAhOLnXmEvTUIKi7kNTOdCbZxjRlo6sgSFQoHvkf7gijC2BYvrS","1","2021-07-11 07:27:38","2021-07-05 19:33:51");
INSERT INTO admin VALUES("8","Ceciron Alejo Iii","ceci","cecironalejoiii@gmail.com","","2","2021-07-10 10:27:05","2021-07-10 10:27:05");



DROP TABLE apartment;

CREATE TABLE `apartment` (
  `apartment_id` int(5) NOT NULL AUTO_INCREMENT,
  `number` varchar(100) NOT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`apartment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO apartment VALUES("1","A-001","2","2021-07-11 04:04:14","2021-07-05 10:45:36");
INSERT INTO apartment VALUES("2","A-002","2","2021-07-07 07:27:12","2021-07-05 10:45:57");
INSERT INTO apartment VALUES("6","A-006","1","2021-07-09 02:13:53","2021-07-05 10:53:22");
INSERT INTO apartment VALUES("7","A-007","3","2021-07-05 11:31:01","2021-07-05 11:00:02");
INSERT INTO apartment VALUES("8","A-008","2","2021-07-06 10:32:32","2021-07-05 11:22:11");
INSERT INTO apartment VALUES("9","A-009","1","2021-07-06 02:54:24","2021-07-05 11:26:09");
INSERT INTO apartment VALUES("10","A-005","2","2021-07-06 04:53:40","2021-07-05 11:55:38");
INSERT INTO apartment VALUES("11","A-0020","2","2021-07-08 04:01:48","2021-07-07 07:24:40");
INSERT INTO apartment VALUES("12","A-003","1","2021-07-08 04:20:51","2021-07-08 04:20:51");
INSERT INTO apartment VALUES("13","A-004","1","2021-07-08 04:20:57","2021-07-08 04:20:57");
INSERT INTO apartment VALUES("14","A-0010","1","2021-07-08 04:21:22","2021-07-08 04:21:22");
INSERT INTO apartment VALUES("15","A-0011","1","2021-07-08 04:21:29","2021-07-08 04:21:29");
INSERT INTO apartment VALUES("16","A-0015","1","2021-07-11 07:00:43","2021-07-11 07:00:43");



DROP TABLE apartmentrental;

CREATE TABLE `apartmentrental` (
  `apartment_rental_id` int(5) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`apartment_rental_id`),
  KEY `apartmentrental_tenant_id_foreign` (`tenant_id`),
  KEY `apartmentrental_apartment_id_foreign` (`apartment_id`),
  CONSTRAINT `apartmentrental_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartment` (`apartment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `apartmentrental_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO apartmentrental VALUES("1","1","10","2021-07-01","2021-07-31","1","2021-07-06 04:53:40","2021-07-06 04:53:40");
INSERT INTO apartmentrental VALUES("2","2","8","2021-07-01","2021-07-17","1","2021-07-06 10:32:32","2021-07-06 10:32:32");
INSERT INTO apartmentrental VALUES("3","3","2","2021-07-01","2021-10-31","1","2021-07-07 07:27:12","2021-07-07 07:27:12");
INSERT INTO apartmentrental VALUES("4","4","11","2021-07-08","2022-01-08","1","2021-07-08 04:01:48","2021-07-08 04:01:48");
INSERT INTO apartmentrental VALUES("5","5","1","2021-07-09","2022-07-30","1","2021-07-11 07:07:58","2021-07-09 03:30:37");



DROP TABLE bill;

CREATE TABLE `bill` (
  `bill_id` int(12) NOT NULL AUTO_INCREMENT,
  `apartment_rental_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `electricity` float(11,2) NOT NULL DEFAULT 0.00,
  `water` float(11,2) NOT NULL DEFAULT 0.00,
  `rental` float(11,2) NOT NULL DEFAULT 0.00,
  `total` float(11,2) NOT NULL DEFAULT 0.00,
  `amount_paid` float(11,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`bill_id`),
  KEY `bill_apartment_rental_id_foreign` (`apartment_rental_id`),
  CONSTRAINT `bill_apartment_rental_id_foreign` FOREIGN KEY (`apartment_rental_id`) REFERENCES `apartmentrental` (`apartment_rental_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO bill VALUES("1","1","2021-07-01","500.00","500.00","1000.00","2000.00","0.00","1","2021-07-07 06:44:30","2021-07-07 06:44:30");
INSERT INTO bill VALUES("2","1","2021-07-07","500.00","500.00","1000.00","2000.00","0.00","1","2021-07-07 06:45:32","2021-07-07 06:45:32");
INSERT INTO bill VALUES("3","1","2021-08-11","250.00","400.00","1000.00","1650.00","0.00","1","2021-07-07 06:51:48","2021-07-07 06:51:48");
INSERT INTO bill VALUES("4","1","2021-09-08","500.00","200.00","1000.00","1700.00","1700.00","3","2021-07-08 01:48:06","2021-07-07 07:01:20");
INSERT INTO bill VALUES("5","2","2021-07-08","300.00","250.00","500.00","1050.00","1050.00","3","2021-07-08 01:41:18","2021-07-07 07:30:00");
INSERT INTO bill VALUES("6","2","2021-06-30","300.00","200.00","500.00","1000.00","1000.00","3","2021-07-08 03:59:45","2021-07-07 07:30:50");
INSERT INTO bill VALUES("7","2","2021-09-30","500.00","350.00","1000.00","1850.00","1850.00","3","2021-07-08 01:40:29","2021-07-07 07:31:11");
INSERT INTO bill VALUES("8","2","2021-10-01","250.25","345.21","500.00","1095.46","1095.46","3","2021-07-08 01:39:37","2021-07-07 23:30:21");
INSERT INTO bill VALUES("9","4","2021-07-08","500.00","500.00","1000.00","2000.00","0.00","1","2021-07-08 04:03:51","2021-07-08 04:03:51");
INSERT INTO bill VALUES("10","4","2021-08-08","340.00","124.00","1000.00","1464.00","0.00","1","2021-07-08 04:04:12","2021-07-08 04:04:12");
INSERT INTO bill VALUES("11","4","2021-09-08","650.00","450.00","1000.00","2100.00","2100.00","3","2021-07-09 09:48:24","2021-07-08 04:04:51");
INSERT INTO bill VALUES("12","4","2021-11-08","240.00","250.00","1000.00","1490.00","1490.00","3","2021-07-08 04:25:50","2021-07-08 04:05:12");
INSERT INTO bill VALUES("15","5","2021-09-09","350.00","359.00","2000.00","2709.00","0.00","1","2021-07-10 03:29:08","2021-07-10 03:29:08");
INSERT INTO bill VALUES("16","5","2021-07-31","0.00","0.00","3500.00","3500.00","0.00","1","2021-07-11 00:05:23","2021-07-11 00:05:23");
INSERT INTO bill VALUES("17","5","2021-06-11","0.00","0.00","3500.00","3500.00","0.00","1","2021-07-11 00:05:38","2021-07-11 00:05:38");
INSERT INTO bill VALUES("18","5","2021-07-31","250.00","250.00","3500.00","4000.00","4000.00","3","2021-07-11 07:10:03","2021-07-11 07:09:06");



DROP TABLE migrations;

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO migrations VALUES("2","2021-07-05-110952","App\\Database\\Migrations\\AddAdmin","default","App","1625484779","1");
INSERT INTO migrations VALUES("3","2021-07-05-131057","App\\Database\\Migrations\\AddApartment","default","App","1625492605","2");
INSERT INTO migrations VALUES("4","2021-07-06-032106","App\\Database\\Migrations\\AddValidIDs","default","App","1625541953","3");
INSERT INTO migrations VALUES("7","2021-07-06-041139","App\\Database\\Migrations\\AddTenant","default","App","1625564001","4");
INSERT INTO migrations VALUES("8","2021-07-06-071757","App\\Database\\Migrations\\AddApartmentRental","default","App","1625564001","4");
INSERT INTO migrations VALUES("10","2021-07-06-163034","App\\Database\\Migrations\\AddBill","default","App","1625639654","5");
INSERT INTO migrations VALUES("12","2021-07-07-120317","App\\Database\\Migrations\\AddPayment","default","App","1625673567","6");
INSERT INTO migrations VALUES("13","2021-07-09-150944","App\\Database\\Migrations\\AddSettings","default","App","1625846128","7");



DROP TABLE payment;

CREATE TABLE `payment` (
  `payment_id` int(12) NOT NULL AUTO_INCREMENT,
  `apartment_rental_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `amount` float(11,2) NOT NULL DEFAULT 0.00,
  `pay_date` date NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`payment_id`),
  KEY `payment_apartment_rental_id_foreign` (`apartment_rental_id`),
  KEY `payment_bill_id_foreign` (`bill_id`),
  CONSTRAINT `payment_apartment_rental_id_foreign` FOREIGN KEY (`apartment_rental_id`) REFERENCES `apartmentrental` (`apartment_rental_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `payment_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO payment VALUES("4","2","8","1000.00","2021-07-08","2021-07-08 01:35:40","2021-07-08 01:35:40");
INSERT INTO payment VALUES("5","2","8","95.46","2021-07-08","2021-07-08 01:39:37","2021-07-08 01:39:37");
INSERT INTO payment VALUES("6","2","7","1000.00","2021-07-08","2021-07-08 01:40:05","2021-07-08 01:40:05");
INSERT INTO payment VALUES("7","2","7","850.00","2021-07-08","2021-07-08 01:40:29","2021-07-08 01:40:29");
INSERT INTO payment VALUES("8","2","5","1050.00","2021-07-08","2021-07-08 01:41:18","2021-07-08 01:41:18");
INSERT INTO payment VALUES("9","1","4","1700.00","2021-07-08","2021-07-08 01:48:06","2021-07-08 01:48:06");
INSERT INTO payment VALUES("10","2","6","500.00","2021-07-08","2021-07-08 03:58:06","2021-07-08 03:58:06");
INSERT INTO payment VALUES("11","2","6","150.00","2021-07-08","2021-07-08 03:58:34","2021-07-08 03:58:34");
INSERT INTO payment VALUES("12","2","6","150.00","2021-07-08","2021-07-08 03:59:21","2021-07-08 03:59:21");
INSERT INTO payment VALUES("13","2","6","200.00","2021-07-08","2021-07-08 03:59:45","2021-07-08 03:59:45");
INSERT INTO payment VALUES("14","4","12","490.00","2021-07-08","2021-07-08 04:06:48","2021-07-08 04:06:48");
INSERT INTO payment VALUES("15","4","12","750.00","2021-07-08","2021-07-08 04:08:42","2021-07-08 04:08:42");
INSERT INTO payment VALUES("16","4","12","250.00","2021-07-08","2021-07-08 04:25:50","2021-07-08 04:25:50");
INSERT INTO payment VALUES("17","4","11","1000.00","2021-07-09","2021-07-09 00:43:14","2021-07-09 00:43:14");
INSERT INTO payment VALUES("18","4","11","1100.00","2021-07-09","2021-07-09 09:48:24","2021-07-09 09:48:24");
INSERT INTO payment VALUES("25","5","18","2000.00","2021-07-11","2021-07-11 07:09:30","2021-07-11 07:09:30");
INSERT INTO payment VALUES("27","5","18","2000.00","2021-07-11","2021-07-11 07:10:03","2021-07-11 07:10:03");



DROP TABLE settings;

CREATE TABLE `settings` (
  `settings_id` int(12) NOT NULL AUTO_INCREMENT,
  `rental_fee` float(11,2) NOT NULL DEFAULT 0.00,
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO settings VALUES("1","3500.00","2021-07-11 07:28:07","2021-07-09 23:56:12");



DROP TABLE tenant;

CREATE TABLE `tenant` (
  `tenant_id` int(5) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `valid_id_type_1` varchar(100) NOT NULL,
  `valid_id_1` varchar(100) NOT NULL,
  `valid_id_type_2` varchar(100) NOT NULL,
  `valid_id_2` varchar(100) NOT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`tenant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO tenant VALUES("1","Mark Jason O. Alejo","MALE","2021-04-02","PhilHealth","PH123","SSS","SSS123","2","2021-07-06 04:53:40","2021-07-06 04:39:48");
INSERT INTO tenant VALUES("2","Ceciron Alejo Iii","MALE","2000-11-06","PhilHealth","PH124","Passport","123123","2","2021-07-06 10:32:32","2021-07-06 04:42:35");
INSERT INTO tenant VALUES("3","Fuji Denzo","FEMALE","2000-06-07","Driver\'s License","DL1212","Passport","PS2312","2","2021-07-07 07:27:12","2021-07-07 07:22:29");
INSERT INTO tenant VALUES("4","Rubber King","MALE","2021-06-27","SSS","SSS231","OFW ID","OFW1212","2","2021-07-08 04:01:48","2021-07-07 07:23:35");
INSERT INTO tenant VALUES("5","Aspi Are","FEMALE","2021-07-08","Passport","PP090","OFW ID","OFW223","2","2021-07-09 03:30:37","2021-07-08 04:20:14");
INSERT INTO tenant VALUES("6","Fu Ye","FEMALE","2021-07-09","Driver\'s License","DL23","SSS","SSS11","1","2021-07-10 03:19:26","2021-07-09 09:01:37");
INSERT INTO tenant VALUES("7","Konz Ert","MALE","2021-12-15","PhilHealth","PP090","SSS","SSS232","1","2021-07-10 10:27:38","2021-07-10 10:27:38");
INSERT INTO tenant VALUES("8","Baby Flo","FEMALE","2000-12-01","PhilHealth","PP090","SSS","SSS2234","1","2021-07-11 07:12:16","2021-07-11 07:12:16");



DROP TABLE valid_id;

CREATE TABLE `valid_id` (
  `valid_id_id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(250) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`valid_id_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO valid_id VALUES("1","PhilHealth","0000-00-00 00:00:00","2021-07-06 11:40:16");
INSERT INTO valid_id VALUES("2","SSS","0000-00-00 00:00:00","2021-07-06 11:40:16");
INSERT INTO valid_id VALUES("3","PRC","0000-00-00 00:00:00","2021-07-06 11:40:16");
INSERT INTO valid_id VALUES("4","Voter\'s","0000-00-00 00:00:00","2021-07-06 11:40:16");
INSERT INTO valid_id VALUES("5","Driver\'s License","0000-00-00 00:00:00","2021-07-06 11:40:16");
INSERT INTO valid_id VALUES("6","Passport","0000-00-00 00:00:00","2021-07-06 11:40:16");



SET foreign_key_checks = 1; 


