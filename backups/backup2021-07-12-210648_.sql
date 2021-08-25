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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO admin VALUES("4","Elise Goldner","Frederique2","xlind@shields.com","$2y$10$PGHeaqEoza0.WJ7sXAXEg.FqJzNwvAS6V..wOd8m1OheNkdx5flEu","1","0000-00-00 00:00:00","2021-07-05 19:33:49");
INSERT INTO admin VALUES("6","Chase Wintheiser","Kaci9","verda94@hotmail.com","$2y$10$msYAhOLnXmEvTUIKi7kNTOdCbZxjRlo6sgSFQoHvkf7gijC2BYvrS","1","2021-07-11 07:27:38","2021-07-05 19:33:51");
INSERT INTO admin VALUES("8","Ceciron Alejo Iii","ceci","cecironalejoiii@gmail.com","","2","2021-07-10 10:27:05","2021-07-10 10:27:05");
INSERT INTO admin VALUES("9","Baby Flo","bb","bb@gmail.com","","2","2021-07-11 07:31:02","2021-07-11 07:31:02");



DROP TABLE apartment;

CREATE TABLE `apartment` (
  `apartment_id` int(5) NOT NULL AUTO_INCREMENT,
  `number` varchar(100) NOT NULL,
  `type` int(10) NOT NULL DEFAULT 1,
  `status` enum('1','2','3') NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`apartment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

INSERT INTO apartment VALUES("1","UNIT 4","1","2","2021-07-11 10:02:16","2021-07-05 10:45:36");
INSERT INTO apartment VALUES("6","UNIT 2","1","1","2021-07-11 09:59:12","2021-07-05 10:53:22");
INSERT INTO apartment VALUES("8","UNIT 6","1","1","2021-07-12 11:02:17","2021-07-05 11:22:11");
INSERT INTO apartment VALUES("10","UNIT 5","1","1","2021-07-12 11:24:52","2021-07-05 11:55:38");
INSERT INTO apartment VALUES("11","UNIT 1","1","2","2021-07-11 09:58:27","2021-07-07 07:24:40");
INSERT INTO apartment VALUES("12","UNIT 3","1","1","2021-07-11 10:00:14","2021-07-08 04:20:51");
INSERT INTO apartment VALUES("16","UNIT 8","1","1","2021-07-11 10:03:20","2021-07-11 07:00:43");
INSERT INTO apartment VALUES("17","UNIT 18","2","1","2021-07-11 10:04:13","2021-07-11 08:50:57");
INSERT INTO apartment VALUES("18","UNIT 17","2","1","2021-07-11 10:03:54","2021-07-11 08:51:07");
INSERT INTO apartment VALUES("19","UNIT 9","1","1","2021-07-11 10:05:04","2021-07-11 10:05:04");
INSERT INTO apartment VALUES("20","UNIT 10","1","1","2021-07-11 10:05:11","2021-07-11 10:05:11");
INSERT INTO apartment VALUES("21","UNIT 11","1","1","2021-07-11 10:05:17","2021-07-11 10:05:17");
INSERT INTO apartment VALUES("22","UNIT 12","1","1","2021-07-11 10:05:26","2021-07-11 10:05:26");
INSERT INTO apartment VALUES("23","UNIT 13","1","1","2021-07-11 10:05:33","2021-07-11 10:05:33");
INSERT INTO apartment VALUES("24","UNIT 14","1","1","2021-07-11 10:05:41","2021-07-11 10:05:41");
INSERT INTO apartment VALUES("25","UNIT 15","1","1","2021-07-11 10:05:47","2021-07-11 10:05:47");
INSERT INTO apartment VALUES("26","UNIT 16","1","1","2021-07-11 10:05:54","2021-07-11 10:05:54");
INSERT INTO apartment VALUES("27","UNIT 19","2","1","2021-07-11 10:06:10","2021-07-11 10:06:10");
INSERT INTO apartment VALUES("28","UNIT 20","2","2","2021-07-12 11:56:04","2021-07-11 10:06:17");
INSERT INTO apartment VALUES("29","UNIT 21","2","1","2021-07-11 10:07:07","2021-07-11 10:07:07");
INSERT INTO apartment VALUES("30","UNIT 22","2","1","2021-07-11 10:07:15","2021-07-11 10:07:15");
INSERT INTO apartment VALUES("31","UNIT 23","2","2","2021-07-12 20:54:54","2021-07-11 10:07:22");
INSERT INTO apartment VALUES("32","UNIT 24","2","2","2021-07-12 01:45:48","2021-07-11 10:07:27");
INSERT INTO apartment VALUES("33","UNIT 7","1","1","2021-07-12 07:31:08","2021-07-12 07:31:08");



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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO apartmentrental VALUES("4","4","11","2021-07-08","2022-01-08","1","2021-07-08 04:01:48","2021-07-08 04:01:48");
INSERT INTO apartmentrental VALUES("5","5","1","2021-07-09","2022-07-30","1","2021-07-11 07:07:58","2021-07-09 03:30:37");
INSERT INTO apartmentrental VALUES("6","7","32","2021-07-12","2021-07-12","2","2021-07-12 21:02:58","2021-07-12 01:45:47");
INSERT INTO apartmentrental VALUES("9","6","28","2021-07-06","2022-01-06","1","2021-07-12 11:56:03","2021-07-12 11:56:03");
INSERT INTO apartmentrental VALUES("10","9","31","2021-07-13","2022-05-13","3","2021-07-12 21:02:22","2021-07-12 20:54:53");



DROP TABLE apartmenttype;

CREATE TABLE `apartmenttype` (
  `apartment_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `price` float(11,2) NOT NULL,
  PRIMARY KEY (`apartment_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO apartmenttype VALUES("1","114 m²","15000.00");
INSERT INTO apartmenttype VALUES("2","127 m²","18000.00");



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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

INSERT INTO bill VALUES("9","4","2021-07-08","500.00","500.00","1000.00","2000.00","0.00","1","2021-07-08 04:03:51","2021-07-08 04:03:51");
INSERT INTO bill VALUES("10","4","2021-08-08","340.00","124.00","1000.00","1464.00","0.00","1","2021-07-12 20:58:00","2021-07-08 04:04:12");
INSERT INTO bill VALUES("11","4","2021-09-08","650.00","450.00","1000.00","2100.00","2100.00","3","2021-07-09 09:48:24","2021-07-08 04:04:51");
INSERT INTO bill VALUES("12","4","2021-11-08","240.00","250.00","1000.00","1490.00","1490.00","3","2021-07-08 04:25:50","2021-07-08 04:05:12");
INSERT INTO bill VALUES("16","5","2021-07-31","0.00","0.00","3500.00","3500.00","3500.00","3","2021-07-11 23:21:06","2021-07-11 00:05:23");
INSERT INTO bill VALUES("17","5","2021-06-11","0.00","0.00","3500.00","3500.00","0.00","1","2021-07-11 00:05:38","2021-07-11 00:05:38");
INSERT INTO bill VALUES("18","5","2021-07-31","250.00","250.00","3500.00","4000.00","4000.00","3","2021-07-11 07:10:03","2021-07-11 07:09:06");
INSERT INTO bill VALUES("19","5","2021-07-11","0.00","0.00","15000.00","15000.00","15000.00","3","2021-07-11 23:20:43","2021-07-11 10:14:44");
INSERT INTO bill VALUES("20","6","2021-07-12","0.00","0.00","18000.00","18000.00","0.00","1","2021-07-12 03:34:39","2021-07-12 03:34:39");
INSERT INTO bill VALUES("21","6","2021-07-12","0.00","0.00","18000.00","18000.00","0.00","1","2021-07-12 03:34:48","2021-07-12 03:34:48");
INSERT INTO bill VALUES("23","6","2021-08-12","2000.00","2000.00","18000.00","22000.00","22000.00","3","2021-07-12 04:50:14","2021-07-12 04:37:58");
INSERT INTO bill VALUES("25","9","2021-07-06","0.00","0.00","18000.00","18000.00","0.00","1","2021-07-12 11:57:55","2021-07-12 11:56:04");
INSERT INTO bill VALUES("26","9","2021-08-06","0.00","0.00","18000.00","18000.00","0.00","1","2021-07-12 11:57:49","2021-07-12 11:56:04");
INSERT INTO bill VALUES("28","10","2021-08-13","0.00","0.00","18000.00","18000.00","18000.00","3","2021-07-12 20:56:22","2021-07-12 20:54:54");
INSERT INTO bill VALUES("29","10","2021-07-13","25000.00","2453.00","18000.00","45453.00","18000.00","2","2021-07-12 21:01:18","2021-07-12 21:01:01");



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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

INSERT INTO payment VALUES("14","4","12","490.00","2021-07-08","2021-07-08 04:06:48","2021-07-08 04:06:48");
INSERT INTO payment VALUES("15","4","12","750.00","2021-07-08","2021-07-08 04:08:42","2021-07-08 04:08:42");
INSERT INTO payment VALUES("16","4","12","250.00","2021-07-08","2021-07-08 04:25:50","2021-07-08 04:25:50");
INSERT INTO payment VALUES("17","4","11","1000.00","2021-07-09","2021-07-09 00:43:14","2021-07-09 00:43:14");
INSERT INTO payment VALUES("18","4","11","1100.00","2021-07-09","2021-07-09 09:48:24","2021-07-09 09:48:24");
INSERT INTO payment VALUES("25","5","18","2000.00","2021-07-11","2021-07-11 07:09:30","2021-07-11 07:09:30");
INSERT INTO payment VALUES("27","5","18","2000.00","2021-07-11","2021-07-11 07:10:03","2021-07-11 07:10:03");
INSERT INTO payment VALUES("29","5","19","4000.00","2021-07-12","2021-07-11 22:43:20","2021-07-11 22:43:20");
INSERT INTO payment VALUES("30","5","19","11000.00","2021-07-12","2021-07-11 23:20:43","2021-07-11 23:20:43");
INSERT INTO payment VALUES("31","5","16","3500.00","2021-07-12","2021-07-11 23:21:06","2021-07-11 23:21:06");
INSERT INTO payment VALUES("34","6","23","19000.00","2021-07-12","2021-07-12 04:47:31","2021-07-12 04:47:31");
INSERT INTO payment VALUES("35","6","23","3000.00","2021-07-12","2021-07-12 04:50:14","2021-07-12 04:50:14");
INSERT INTO payment VALUES("36","10","28","18000.00","2021-07-13","2021-07-12 20:56:22","2021-07-12 20:56:22");
INSERT INTO payment VALUES("37","10","29","18000.00","2021-07-13","2021-07-12 21:01:18","2021-07-12 21:01:18");



DROP TABLE settings;

CREATE TABLE `settings` (
  `settings_id` int(12) NOT NULL AUTO_INCREMENT,
  `rental_fee` float(11,2) NOT NULL DEFAULT 0.00,
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO settings VALUES("1","15000.00","2021-07-11 08:34:38","2021-07-09 23:56:12");



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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO tenant VALUES("1","Mark Jason O. Alejo","MALE","2021-04-02","PhilHealth","PH123","SSS","SSS123","3","2021-07-12 11:24:52","2021-07-06 04:39:48");
INSERT INTO tenant VALUES("2","Ceciron Alejo Iii","MALE","2000-11-06","PhilHealth","PH124","Passport","123123","2","2021-07-06 10:32:32","2021-07-06 04:42:35");
INSERT INTO tenant VALUES("3","Fuji Denzo","FEMALE","2000-06-07","Driver\'s License","DL1212","Passport","PS2312","3","2021-07-12 11:03:10","2021-07-07 07:22:29");
INSERT INTO tenant VALUES("4","Rubber King","MALE","2021-06-27","SSS","SSS231","OFW ID","OFW1212","2","2021-07-08 04:01:48","2021-07-07 07:23:35");
INSERT INTO tenant VALUES("5","Aspi Are","FEMALE","2021-07-08","Passport","PP090","OFW ID","OFW223","2","2021-07-09 03:30:37","2021-07-08 04:20:14");
INSERT INTO tenant VALUES("6","Fu Ye","FEMALE","2021-07-09","Driver\'s License","DL23","SSS","SSS11","2","2021-07-12 11:56:04","2021-07-09 09:01:37");
INSERT INTO tenant VALUES("7","Konz Ert","MALE","2021-12-15","PhilHealth","PP090","SSS","SSS232","2","2021-07-12 01:45:48","2021-07-10 10:27:38");
INSERT INTO tenant VALUES("9","Juan Dela Cruz","MALE","2021-07-13","PhilHealth","PP090","SSS","SSS231","2","2021-07-12 20:54:54","2021-07-12 20:53:18");



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


