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
INSERT INTO admin VALUES("6","Chase Wintheiser","Kaci9","verda94@hotmail.com","$2y$10$EjZgfXGdVkQtlgnukFyMaOtnYWEsHkf4F1JI82x/nSZJvESaNyKlW","1","2021-07-14 02:48:48","2021-07-05 19:33:51");
INSERT INTO admin VALUES("8","Jaylin Brian Prieto","superadmin","superadmin@gmail.com","$2y$10$HAWNLRcuutXoPzmjcsAiXuwMhBIQ9bxn7TMqr106FeaCzpznvodVa","2","2021-07-14 22:52:04","2021-07-10 10:27:05");



DROP TABLE apartment;

CREATE TABLE `apartment` (
  `apartment_id` int(5) NOT NULL AUTO_INCREMENT,
  `number` varchar(100) NOT NULL,
  `type` int(10) NOT NULL DEFAULT 1,
  `status` enum('1','2','3') NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`apartment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO apartment VALUES("1","UNIT 4","1","2","2021-07-14 23:25:22","2021-07-05 10:45:36");
INSERT INTO apartment VALUES("6","UNIT 2","1","2","2021-07-15 00:38:21","2021-07-05 10:53:22");
INSERT INTO apartment VALUES("8","UNIT 6","1","1","2021-07-14 22:05:55","2021-07-05 11:22:11");
INSERT INTO apartment VALUES("10","UNIT 5","1","1","2021-07-14 22:03:24","2021-07-05 11:55:38");
INSERT INTO apartment VALUES("11","UNIT 1","1","2","2021-07-14 22:35:02","2021-07-07 07:24:40");
INSERT INTO apartment VALUES("12","UNIT 3","1","1","2021-07-11 10:00:14","2021-07-08 04:20:51");
INSERT INTO apartment VALUES("16","UNIT 8","1","1","2021-07-11 10:03:20","2021-07-11 07:00:43");
INSERT INTO apartment VALUES("17","UNIT 18","2","1","2021-07-14 21:59:30","2021-07-11 08:50:57");
INSERT INTO apartment VALUES("18","UNIT 17","2","1","2021-07-14 23:11:09","2021-07-11 08:51:07");
INSERT INTO apartment VALUES("19","UNIT 9","1","1","2021-07-11 10:05:04","2021-07-11 10:05:04");
INSERT INTO apartment VALUES("20","UNIT 10","1","2","2021-07-14 23:22:19","2021-07-11 10:05:11");
INSERT INTO apartment VALUES("21","UNIT 11","1","1","2021-07-11 10:05:17","2021-07-11 10:05:17");
INSERT INTO apartment VALUES("22","UNIT 12","1","1","2021-07-11 10:05:26","2021-07-11 10:05:26");
INSERT INTO apartment VALUES("23","UNIT 13","1","1","2021-07-11 10:05:33","2021-07-11 10:05:33");
INSERT INTO apartment VALUES("24","UNIT 14","1","1","2021-07-11 10:05:41","2021-07-11 10:05:41");
INSERT INTO apartment VALUES("25","UNIT 15","1","1","2021-07-11 10:05:47","2021-07-11 10:05:47");
INSERT INTO apartment VALUES("26","UNIT 16","1","1","2021-07-11 10:05:54","2021-07-11 10:05:54");
INSERT INTO apartment VALUES("27","UNIT 19","2","1","2021-07-11 10:06:10","2021-07-11 10:06:10");
INSERT INTO apartment VALUES("28","UNIT 20","2","1","2021-07-14 22:31:28","2021-07-11 10:06:17");
INSERT INTO apartment VALUES("29","UNIT 21","2","1","2021-07-11 10:07:07","2021-07-11 10:07:07");
INSERT INTO apartment VALUES("30","UNIT 22","2","1","2021-07-14 21:58:58","2021-07-11 10:07:15");
INSERT INTO apartment VALUES("31","UNIT 23","2","1","2021-07-14 22:00:34","2021-07-11 10:07:22");
INSERT INTO apartment VALUES("32","UNIT 24","2","1","2021-07-14 22:00:27","2021-07-11 10:07:27");
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

INSERT INTO apartmentrental VALUES("13","4","11","2021-07-13","2022-01-13","3","2021-07-14 22:26:50","2021-07-12 23:42:19");
INSERT INTO apartmentrental VALUES("26","3","11","2021-07-14","2022-07-14","1","2021-07-14 22:35:02","2021-07-14 22:35:02");
INSERT INTO apartmentrental VALUES("28","2","20","2021-07-01","2023-07-01","1","2021-07-14 23:22:19","2021-07-14 23:22:19");
INSERT INTO apartmentrental VALUES("29","4","1","2021-07-14","2022-07-14","1","2021-07-14 23:25:22","2021-07-14 23:25:22");
INSERT INTO apartmentrental VALUES("30","5","6","2021-07-15","2023-07-15","1","2021-07-15 00:38:21","2021-07-15 00:38:21");



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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

INSERT INTO bill VALUES("35","13","2021-07-13","0.00","0.00","15000.00","15000.00","15000.00","3","2021-07-14 22:04:42","2021-07-12 23:42:19");
INSERT INTO bill VALUES("36","13","2021-08-13","0.00","0.00","15000.00","15000.00","15000.00","3","2021-07-14 22:04:26","2021-07-12 23:42:20");
INSERT INTO bill VALUES("55","26","2021-08-14","0.00","0.00","15000.00","15000.00","15000.00","3","2021-07-14 22:35:02","2021-07-14 22:35:02");
INSERT INTO bill VALUES("56","26","2021-08-14","0.00","0.00","15000.00","15000.00","15000.00","3","2021-07-14 23:12:31","2021-07-14 22:35:02");
INSERT INTO bill VALUES("57","28","2021-08-01","0.00","0.00","15000.00","15000.00","0.00","1","2021-07-14 23:22:19","2021-07-14 23:22:19");
INSERT INTO bill VALUES("58","28","2021-08-01","0.00","0.00","15000.00","15000.00","0.00","1","2021-07-14 23:22:20","2021-07-14 23:22:20");
INSERT INTO bill VALUES("59","29","2021-08-14","0.00","0.00","15000.00","15000.00","15000.00","3","2021-07-14 23:44:43","2021-07-14 23:25:23");
INSERT INTO bill VALUES("60","29","2021-08-14","0.00","0.00","15000.00","15000.00","0.00","1","2021-07-14 23:25:23","2021-07-14 23:25:23");
INSERT INTO bill VALUES("61","26","2021-07-14","250.00","250.00","15000.00","15500.00","15000.00","2","2021-07-14 23:38:44","2021-07-14 23:38:24");
INSERT INTO bill VALUES("62","29","2021-08-15","250.00","250.00","15000.00","15500.00","0.00","1","2021-07-15 00:29:33","2021-07-15 00:29:33");
INSERT INTO bill VALUES("63","30","2021-07-15","0.00","0.00","15000.00","15000.00","0.00","1","2021-07-15 00:38:21","2021-07-15 00:38:21");
INSERT INTO bill VALUES("64","30","2021-07-15","0.00","0.00","15000.00","15000.00","0.00","1","2021-07-15 00:38:21","2021-07-15 00:38:21");



DROP TABLE log;

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `log_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4;

INSERT INTO log VALUES("2","TENANT","registeredAsdsdaaaaaaaaaaaaaaaa","INSERT","8","2021-07-14 03:27:56");
INSERT INTO log VALUES("3","TENANT","deleted TENANT ID:15","DELETE","8","2021-07-14 03:28:02");
INSERT INTO log VALUES("4","TENANT","deleted TENANT ID:14","DELETE","8","2021-07-14 03:28:09");
INSERT INTO log VALUES("5","TENANT","registeredAaaaaa","INSERT","8","2021-07-14 03:28:52");
INSERT INTO log VALUES("6","TENANT","deleted TENANT ID:16","DELETE","8","2021-07-14 03:29:09");
INSERT INTO log VALUES("7","TENANT","registeredWwwwwwww","INSERT","8","2021-07-14 16:30:05");
INSERT INTO log VALUES("8","TENANT","deleted TENANT ID:17","DELETE","8","2021-07-14 16:30:29");
INSERT INTO log VALUES("9","APARTMENT","deleted APARTMENT ID: 34","DELETE","8","2021-07-14 16:39:11");
INSERT INTO log VALUES("10","APARTMENT","added apartment ZXCZXCZXCZXC","INSERT","8","2021-07-14 16:39:17");
INSERT INTO log VALUES("11","APARTMENT","updated apartmentZXCZXCZXCZXC","UPDATE","8","2021-07-14 16:39:22");
INSERT INTO log VALUES("12","APARTMENT","deleted APARTMENT ID: 35","DELETE","8","2021-07-14 16:39:27");
INSERT INTO log VALUES("13","TENANT","updated Fuji Denzo","UPDATE","8","2021-07-14 18:00:41");
INSERT INTO log VALUES("14","TENANT","updated Mark Jason O. Alejo","UPDATE","8","2021-07-14 18:00:46");
INSERT INTO log VALUES("15","TENANT","updated tenant TENANT ID 1","UPDATE","8","2021-07-14 18:02:58");
INSERT INTO log VALUES("16","APARTMENT","updated apartment APARTMENT ID 10","UPDATE","8","2021-07-14 18:02:59");
INSERT INTO log VALUES("17","CONTRACT","updated contract CONTRACT ID 21","UPDATE","8","2021-07-14 18:02:59");
INSERT INTO log VALUES("18","TENANT","updated Mark Jason O. Alejo","UPDATE","8","2021-07-14 18:04:04");
INSERT INTO log VALUES("19","TENANT","updated tenant TENANT ID 1","UPDATE","8","2021-07-14 18:05:10");
INSERT INTO log VALUES("20","APARTMENT","updated apartment APARTMENT ID 10","UPDATE","8","2021-07-14 18:05:10");
INSERT INTO log VALUES("21","CONTRACT","updated contract CONTRACT ID 22","UPDATE","8","2021-07-14 18:05:10");
INSERT INTO log VALUES("22","CONTRACT","deleted contract CONTRACT ID 21","DELETE","8","2021-07-14 18:05:22");
INSERT INTO log VALUES("23","CONTRACT","deleted contract CONTRACT ID 22","DELETE","8","2021-07-14 18:05:27");
INSERT INTO log VALUES("24","TENANT","updated Mark Jason O. Alejo","UPDATE","8","2021-07-14 18:06:45");
INSERT INTO log VALUES("25","CONTRACT","add new contract CONTRACT ID:  23","INSERT","8","2021-07-14 18:08:11");
INSERT INTO log VALUES("26","BILL","add new bill BILL ID 49","INSERT","8","2021-07-14 18:08:11");
INSERT INTO log VALUES("27","BILL","add new bill BILL ID 50","INSERT","8","2021-07-14 18:08:11");
INSERT INTO log VALUES("28","PAYMENT","add new payment PAYMENT ID 53","INSERT","8","2021-07-14 18:08:11");
INSERT INTO log VALUES("29","PAYMENT","add new payment PAYMENT ID 54","INSERT","8","2021-07-14 18:08:11");
INSERT INTO log VALUES("30","CONTRACT","add new contract CONTRACT ID:  24","INSERT","8","2021-07-14 18:23:19");
INSERT INTO log VALUES("31","TENANT","updated tenant TENANT ID:  3","UPDATE","8","2021-07-14 18:23:19");
INSERT INTO log VALUES("32","APARTMENT","updated apartment APARTMENT ID:  30","UPDATE","8","2021-07-14 18:23:19");
INSERT INTO log VALUES("33","BILL","add new bill BILL ID 51","INSERT","8","2021-07-14 18:23:20");
INSERT INTO log VALUES("34","BILL","add new bill BILL ID 52","INSERT","8","2021-07-14 18:23:20");
INSERT INTO log VALUES("35","PAYMENT","add new payment PAYMENT ID 55","INSERT","8","2021-07-14 18:23:20");
INSERT INTO log VALUES("36","PAYMENT","add new payment PAYMENT ID 56","INSERT","8","2021-07-14 18:23:20");
INSERT INTO log VALUES("37","BILL","updated bill BILL ID 52","UPDATE","8","2021-07-14 18:36:58");
INSERT INTO log VALUES("38","PAYMENT","deleted payment PAYMENT ID 56","DELETE","8","2021-07-14 18:36:59");
INSERT INTO log VALUES("39","TENANT","deleted TENANT ID:13","DELETE","8","2021-07-14 21:55:58");
INSERT INTO log VALUES("40","TENANT","deleted TENANT ID:11","DELETE","8","2021-07-14 21:56:11");
INSERT INTO log VALUES("41","TENANT","updated tenant TENANT ID 5","UPDATE","8","2021-07-14 21:57:27");
INSERT INTO log VALUES("42","APARTMENT","updated apartment APARTMENT ID 1","UPDATE","8","2021-07-14 21:57:27");
INSERT INTO log VALUES("43","CONTRACT","updated contract CONTRACT ID 5","UPDATE","8","2021-07-14 21:57:27");
INSERT INTO log VALUES("44","TENANT","updated tenant TENANT ID 3","UPDATE","8","2021-07-14 21:57:37");
INSERT INTO log VALUES("45","APARTMENT","updated apartment APARTMENT ID 11","UPDATE","8","2021-07-14 21:57:37");
INSERT INTO log VALUES("46","CONTRACT","updated contract CONTRACT ID 12","UPDATE","8","2021-07-14 21:57:37");
INSERT INTO log VALUES("47","TENANT","updated tenant TENANT ID 3","UPDATE","8","2021-07-14 21:57:43");
INSERT INTO log VALUES("48","APARTMENT","updated apartment APARTMENT ID 6","UPDATE","8","2021-07-14 21:57:43");
INSERT INTO log VALUES("49","CONTRACT","updated contract CONTRACT ID 17","UPDATE","8","2021-07-14 21:57:43");
INSERT INTO log VALUES("50","CONTRACT","deleted contract CONTRACT ID 17","DELETE","8","2021-07-14 21:57:53");
INSERT INTO log VALUES("51","CONTRACT","deleted contract CONTRACT ID 12","DELETE","8","2021-07-14 21:57:57");
INSERT INTO log VALUES("52","CONTRACT","deleted contract CONTRACT ID 5","DELETE","8","2021-07-14 21:58:02");
INSERT INTO log VALUES("53","TENANT","updated tenant TENANT ID 3","UPDATE","8","2021-07-14 21:58:58");
INSERT INTO log VALUES("54","APARTMENT","updated apartment APARTMENT ID 30","UPDATE","8","2021-07-14 21:58:58");
INSERT INTO log VALUES("55","CONTRACT","updated contract CONTRACT ID 24","UPDATE","8","2021-07-14 21:58:58");
INSERT INTO log VALUES("56","TENANT","updated Fuji Denzo","UPDATE","8","2021-07-14 21:59:11");
INSERT INTO log VALUES("57","TENANT","updated Aspi Are","UPDATE","8","2021-07-14 21:59:17");
INSERT INTO log VALUES("58","TENANT","updated tenant TENANT ID 5","UPDATE","8","2021-07-14 21:59:30");
INSERT INTO log VALUES("59","APARTMENT","updated apartment APARTMENT ID 17","UPDATE","8","2021-07-14 21:59:30");
INSERT INTO log VALUES("60","CONTRACT","updated contract CONTRACT ID 18","UPDATE","8","2021-07-14 21:59:30");
INSERT INTO log VALUES("61","TENANT","updated Aspi Are","UPDATE","8","2021-07-14 21:59:52");
INSERT INTO log VALUES("62","APARTMENT","updated apartmentUNIT 24","UPDATE","8","2021-07-14 22:00:27");
INSERT INTO log VALUES("63","APARTMENT","updated apartmentUNIT 23","UPDATE","8","2021-07-14 22:00:34");
INSERT INTO log VALUES("64","CONTRACT","deleted contract CONTRACT ID 18","DELETE","8","2021-07-14 22:00:48");
INSERT INTO log VALUES("65","CONTRACT","deleted contract CONTRACT ID 24","DELETE","8","2021-07-14 22:00:52");
INSERT INTO log VALUES("66","CONTRACT","deleted contract CONTRACT ID 4","DELETE","8","2021-07-14 22:00:57");
INSERT INTO log VALUES("67","TENANT","updated tenant TENANT ID 1","UPDATE","8","2021-07-14 22:03:24");
INSERT INTO log VALUES("68","APARTMENT","updated apartment APARTMENT ID 10","UPDATE","8","2021-07-14 22:03:24");
INSERT INTO log VALUES("69","CONTRACT","updated contract CONTRACT ID 23","UPDATE","8","2021-07-14 22:03:24");
INSERT INTO log VALUES("70","CONTRACT","deleted contract CONTRACT ID 23","DELETE","8","2021-07-14 22:04:02");
INSERT INTO log VALUES("71","BILL","updated bill BILL ID 36","UPDATE","8","2021-07-14 22:04:27");
INSERT INTO log VALUES("72","BILL","inserted payment PAYMENT ID 57","INSERT","8","2021-07-14 22:04:27");
INSERT INTO log VALUES("73","BILL","updated bill BILL ID 35","UPDATE","8","2021-07-14 22:04:42");
INSERT INTO log VALUES("74","BILL","inserted payment PAYMENT ID 58","INSERT","8","2021-07-14 22:04:42");
INSERT INTO log VALUES("75","APARTMENT","updated apartmentUNIT 6","UPDATE","8","2021-07-14 22:05:55");
INSERT INTO log VALUES("76","APARTMENT","updated apartmentUNIT 20","UPDATE","8","2021-07-14 22:06:01");
INSERT INTO log VALUES("77","APARTMENT","updated apartmentUNIT 1","UPDATE","8","2021-07-14 22:06:32");
INSERT INTO log VALUES("78","TENANT","updated Ceciron Alejo Iii","UPDATE","8","2021-07-14 22:06:46");
INSERT INTO log VALUES("79","TENANT","updated Mark Jason O. Alejo","UPDATE","8","2021-07-14 22:06:53");
INSERT INTO log VALUES("80","CONTRACT","add new contract CONTRACT ID:  25","INSERT","8","2021-07-14 22:20:33");
INSERT INTO log VALUES("81","TENANT","updated tenant TENANT ID:  1","UPDATE","8","2021-07-14 22:20:34");
INSERT INTO log VALUES("82","APARTMENT","updated apartment APARTMENT ID:  28","UPDATE","8","2021-07-14 22:20:34");
INSERT INTO log VALUES("83","BILL","add new bill BILL ID 53","INSERT","8","2021-07-14 22:20:34");
INSERT INTO log VALUES("84","BILL","add new bill BILL ID 54","INSERT","8","2021-07-14 22:20:34");
INSERT INTO log VALUES("85","PAYMENT","add new payment PAYMENT ID 59","INSERT","8","2021-07-14 22:20:35");
INSERT INTO log VALUES("86","PAYMENT","add new payment PAYMENT ID 60","INSERT","8","2021-07-14 22:20:35");
INSERT INTO log VALUES("87","TENANT","updated tenant TENANT ID 4","UPDATE","8","2021-07-14 22:26:49");
INSERT INTO log VALUES("88","APARTMENT","updated apartment APARTMENT ID 11","UPDATE","8","2021-07-14 22:26:50");
INSERT INTO log VALUES("89","CONTRACT","updated contract CONTRACT ID 13","UPDATE","8","2021-07-14 22:26:50");
INSERT INTO log VALUES("90","BILL","updated bill BILL ID 54","UPDATE","8","2021-07-14 22:29:58");
INSERT INTO log VALUES("91","PAYMENT","deleted payment PAYMENT ID 60","DELETE","8","2021-07-14 22:29:58");
INSERT INTO log VALUES("92","BILL","updated bill BILL ID 53","UPDATE","8","2021-07-14 22:30:05");
INSERT INTO log VALUES("93","PAYMENT","deleted payment PAYMENT ID 59","DELETE","8","2021-07-14 22:30:05");
INSERT INTO log VALUES("94","BILL","updated bill BILL ID 53","UPDATE","8","2021-07-14 22:30:16");
INSERT INTO log VALUES("95","BILL","inserted payment PAYMENT ID 61","INSERT","8","2021-07-14 22:30:16");
INSERT INTO log VALUES("96","BILL","updated bill BILL ID 54","UPDATE","8","2021-07-14 22:30:27");
INSERT INTO log VALUES("97","BILL","inserted payment PAYMENT ID 62","INSERT","8","2021-07-14 22:30:28");
INSERT INTO log VALUES("98","BILL","updated bill BILL ID 54","UPDATE","8","2021-07-14 22:31:10");
INSERT INTO log VALUES("99","BILL","inserted payment PAYMENT ID 63","INSERT","8","2021-07-14 22:31:10");
INSERT INTO log VALUES("100","TENANT","updated tenant TENANT ID 1","UPDATE","8","2021-07-14 22:31:28");
INSERT INTO log VALUES("101","APARTMENT","updated apartment APARTMENT ID 28","UPDATE","8","2021-07-14 22:31:28");
INSERT INTO log VALUES("102","CONTRACT","updated contract CONTRACT ID 25","UPDATE","8","2021-07-14 22:31:28");
INSERT INTO log VALUES("103","CONTRACT","deleted contract CONTRACT ID 25","DELETE","8","2021-07-14 22:31:37");
INSERT INTO log VALUES("104","CONTRACT","add new contract CONTRACT ID:  26","INSERT","8","2021-07-14 22:35:02");
INSERT INTO log VALUES("105","TENANT","updated tenant TENANT ID:  3","UPDATE","8","2021-07-14 22:35:02");
INSERT INTO log VALUES("106","APARTMENT","updated apartment APARTMENT ID:  11","UPDATE","8","2021-07-14 22:35:02");
INSERT INTO log VALUES("107","BILL","add new bill BILL ID 55","INSERT","8","2021-07-14 22:35:02");
INSERT INTO log VALUES("108","BILL","add new bill BILL ID 56","INSERT","8","2021-07-14 22:35:02");
INSERT INTO log VALUES("109","PAYMENT","add new payment PAYMENT ID 64","INSERT","8","2021-07-14 22:35:02");
INSERT INTO log VALUES("110","PAYMENT","add new payment PAYMENT ID 65","INSERT","8","2021-07-14 22:35:03");
INSERT INTO log VALUES("111","DATABASE","exported database 2021-07-14-224916_.sql","EXPORT","8","2021-07-14 22:49:16");
INSERT INTO log VALUES("112","USER","changed own password","UPDATE","8","2021-07-14 22:52:05");
INSERT INTO log VALUES("113","CONTRACT","add new contract CONTRACT ID:  27","INSERT","8","2021-07-14 23:10:52");
INSERT INTO log VALUES("114","TENANT","updated tenant TENANT ID:  5","UPDATE","8","2021-07-14 23:10:52");
INSERT INTO log VALUES("115","APARTMENT","updated apartment APARTMENT ID:  18","UPDATE","8","2021-07-14 23:10:53");
INSERT INTO log VALUES("116","TENANT","updated tenant TENANT ID 5","UPDATE","8","2021-07-14 23:11:09");
INSERT INTO log VALUES("117","APARTMENT","updated apartment APARTMENT ID 18","UPDATE","8","2021-07-14 23:11:09");
INSERT INTO log VALUES("118","CONTRACT","updated contract CONTRACT ID 27","UPDATE","8","2021-07-14 23:11:09");
INSERT INTO log VALUES("119","CONTRACT","deleted contract CONTRACT ID 27","DELETE","8","2021-07-14 23:11:24");
INSERT INTO log VALUES("120","BILL","updated bill BILL ID 56","UPDATE","8","2021-07-14 23:12:03");
INSERT INTO log VALUES("121","PAYMENT","deleted payment PAYMENT ID 65","DELETE","8","2021-07-14 23:12:03");
INSERT INTO log VALUES("122","BILL","updated bill BILL ID 56","UPDATE","8","2021-07-14 23:12:31");
INSERT INTO log VALUES("123","BILL","inserted payment PAYMENT ID 66","INSERT","8","2021-07-14 23:12:32");
INSERT INTO log VALUES("124","CONTRACT","add new contract CONTRACT ID:  28","INSERT","8","2021-07-14 23:22:19");
INSERT INTO log VALUES("125","TENANT","updated tenant TENANT ID:  2","UPDATE","8","2021-07-14 23:22:19");
INSERT INTO log VALUES("126","APARTMENT","updated apartment APARTMENT ID:  20","UPDATE","8","2021-07-14 23:22:19");
INSERT INTO log VALUES("127","BILL","add new bill BILL ID 57","INSERT","8","2021-07-14 23:22:19");
INSERT INTO log VALUES("128","BILL","add new bill BILL ID 58","INSERT","8","2021-07-14 23:22:20");
INSERT INTO log VALUES("129","PAYMENT","add new payment PAYMENT ID 67","INSERT","8","2021-07-14 23:22:20");
INSERT INTO log VALUES("130","PAYMENT","add new payment PAYMENT ID 68","INSERT","8","2021-07-14 23:22:20");
INSERT INTO log VALUES("131","TENANT","updated Aspi Are","UPDATE","8","2021-07-14 23:24:28");
INSERT INTO log VALUES("132","TENANT","updated Rubber King","UPDATE","8","2021-07-14 23:24:34");
INSERT INTO log VALUES("133","CONTRACT","add new contract CONTRACT ID:  29","INSERT","8","2021-07-14 23:25:22");
INSERT INTO log VALUES("134","TENANT","updated tenant TENANT ID:  4","UPDATE","8","2021-07-14 23:25:22");
INSERT INTO log VALUES("135","APARTMENT","updated apartment APARTMENT ID:  1","UPDATE","8","2021-07-14 23:25:22");
INSERT INTO log VALUES("136","BILL","add new bill BILL ID 59","INSERT","8","2021-07-14 23:25:23");
INSERT INTO log VALUES("137","BILL","add new bill BILL ID 60","INSERT","8","2021-07-14 23:25:23");
INSERT INTO log VALUES("138","BILL","added bill BILL ID 61","INSERT","8","2021-07-14 23:38:24");
INSERT INTO log VALUES("139","BILL","updated bill BILL ID 61","UPDATE","8","2021-07-14 23:38:44");
INSERT INTO log VALUES("140","BILL","inserted payment PAYMENT ID 69","INSERT","8","2021-07-14 23:38:44");
INSERT INTO log VALUES("141","BILL","updated bill BILL ID 59","UPDATE","8","2021-07-14 23:44:43");
INSERT INTO log VALUES("142","BILL","inserted payment PAYMENT ID 70","INSERT","8","2021-07-14 23:44:43");
INSERT INTO log VALUES("143","BILL","added bill BILL ID 62","INSERT","8","2021-07-15 00:29:33");
INSERT INTO log VALUES("144","CONTRACT","add new contract CONTRACT ID:  30","INSERT","8","2021-07-15 00:38:21");
INSERT INTO log VALUES("145","TENANT","updated tenant TENANT ID:  5","UPDATE","8","2021-07-15 00:38:21");
INSERT INTO log VALUES("146","APARTMENT","updated apartment APARTMENT ID:  6","UPDATE","8","2021-07-15 00:38:21");
INSERT INTO log VALUES("147","BILL","add new bill BILL ID 63","INSERT","8","2021-07-15 00:38:21");
INSERT INTO log VALUES("148","BILL","add new bill BILL ID 64","INSERT","8","2021-07-15 00:38:21");



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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

INSERT INTO payment VALUES("57","13","36","15000.00","2021-07-14","2021-07-14 22:04:27","2021-07-14 22:04:27");
INSERT INTO payment VALUES("58","13","35","15000.00","2021-07-14","2021-07-14 22:04:42","2021-07-14 22:04:42");
INSERT INTO payment VALUES("64","26","55","15000.00","2021-07-14","2021-07-14 22:35:02","2021-07-14 22:35:02");
INSERT INTO payment VALUES("66","26","56","15000.00","2021-07-14","2021-07-14 23:12:32","2021-07-14 23:12:32");
INSERT INTO payment VALUES("69","26","61","15000.00","2021-07-14","2021-07-14 23:38:44","2021-07-14 23:38:44");
INSERT INTO payment VALUES("70","29","59","15000.00","2021-07-14","2021-07-14 23:44:43","2021-07-14 23:44:43");



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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO tenant VALUES("1","Mark Jason O. Alejo","MALE","2021-04-02","PhilHealth","PH123","SSS","SSS123","3","2021-07-14 22:31:28","2021-07-06 04:39:48");
INSERT INTO tenant VALUES("2","Ceciron Alejo Iii","MALE","2000-11-06","PhilHealth","PH124","Passport","123123","2","2021-07-14 23:22:19","2021-07-06 04:42:35");
INSERT INTO tenant VALUES("3","Fuji Denzo","FEMALE","2000-06-07","Driver\'s License","DL1212","Passport","PS2312","2","2021-07-14 22:35:02","2021-07-07 07:22:29");
INSERT INTO tenant VALUES("4","Rubber King","MALE","2021-06-27","SSS","SSS231","OFW ID","OFW1212","2","2021-07-14 23:25:22","2021-07-07 07:23:35");
INSERT INTO tenant VALUES("5","Aspi Are","FEMALE","2021-07-08","Passport","PP090","OFW ID","OFW223","2","2021-07-15 00:38:21","2021-07-08 04:20:14");



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


