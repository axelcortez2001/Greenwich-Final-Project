/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.7.14 : Database - greenwich
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`greenwich` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `greenwich`;

/*Table structure for table `audit_log` */

DROP TABLE IF EXISTS `audit_log`;

CREATE TABLE `audit_log` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) DEFAULT NULL,
  `user_id` int(15) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=329 DEFAULT CHARSET=latin1;

/*Data for the table `audit_log` */

LOCK TABLES `audit_log` WRITE;

insert  into `audit_log`(`id`,`action`,`user_id`,`user`,`role`,`timestamp`) values (328,'Login',9,'Axel ','Admin','2023-07-20 05:14:51'),(327,'Logout',19,'hakdog','Inventory Manager','2023-07-20 05:14:48'),(326,'Login',19,'hakdog','Inventory Manager','2023-07-20 05:14:36'),(325,'Logout',9,'Axel ','Admin','2023-07-20 05:14:33'),(324,'Attempt to Edit Employee17',9,'Axel ','Admin','2023-07-20 04:47:56'),(323,'Login',9,'Axel ','Admin','2023-07-20 04:42:52'),(322,'Attempt to Edit Employee17',9,'Axel ','Admin','2023-07-20 04:23:09'),(321,'Login',9,'Axel ','Admin','2023-07-20 04:22:53'),(320,'Login',9,'Axel ','Admin','2023-07-19 13:23:49'),(319,'Login',17,'axel','Cashier','2023-07-19 08:38:08'),(318,'Login',9,'Axel ','Admin','2023-07-19 08:34:23'),(317,'Logout',17,'axel','Cashier','2023-07-19 08:34:18'),(316,'Login',17,'axel','Cashier','2023-07-19 08:33:40'),(315,'Attempt to Edit Job 1',9,'Axel ','Admin','2023-07-19 07:55:12');

UNLOCK TABLES;

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `emp_id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone_no` varchar(50) DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `job_id` int(15) DEFAULT NULL,
  `bank_acct` int(50) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

LOCK TABLES `employee` WRITE;

insert  into `employee`(`emp_id`,`name`,`address`,`phone_no`,`date_hired`,`username`,`password`,`job_id`,`bank_acct`) values (17,'axel','sad','98gh','2023-07-28','a','a',7,57),(18,'Nyzuz','Solano','099999999','2023-07-01','nyzuz','pass',5,NULL),(19,'hakdog','bagabag','90898','2023-07-01','im','im',4,NULL),(9,'Axel ','Bagabag','09771530826','2023-06-30','admin','admin',1,NULL),(20,'has','saibu','87','2023-07-28','manager','pass',2,NULL),(24,'Franz','Solano','09165887425','2023-07-18','franz','franz',2,1);

UNLOCK TABLES;

/*Table structure for table `erp_url` */

DROP TABLE IF EXISTS `erp_url`;

CREATE TABLE `erp_url` (
  `ID` int(15) NOT NULL,
  `Student_Name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` longtext,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `erp_url` */

LOCK TABLES `erp_url` WRITE;

insert  into `erp_url`(`ID`,`Student_Name`,`link`,`image`) values (1,'ACOBA, ERWIN','192.168.10.95/Clickers','clickers.jpg'),(2,'ALLAS, KENETH','192.168.10.72/Monterey','monterey.png'),(3,'AMORIN, RODRIGO','192.168.10.65/FiveStarBus','fivestar.png'),(4,'BALADAD, JOHN','192.168.10.75/LBC','lbc.jpg'),(5,'BALAJADIA, CRIMELSON','192.168.10.66/BDO','BDO.png'),(6,'BATOL, JOHN','192.168.10.70/EasternGasStation','egs.jpg'),(7,'BAYSA, ADRIANE','192.168.10.88/Hendison','hendi.jpg'),(8,'CABRITO, DAVID','192.168.10.80/savemore','sm.jpg'),(9,'CORTEZ, JOHN','192.168.10.99/Greenwhich','green.jpg'),(10,'DAMASO, NYZUZ','192.168.10.89/kfc','kfc.png'),(11,'DULNUAN, FRANZ','192.168.10.90/Mercury','mercury.jpg'),(12,'GARCES, SHERWYN','192.168.10.128/RBBI','rbbi.png'),(13,'ILADRE, JOHN','192.168.10.69/Villarica','villarica.jpg'),(14,'LEJAO, CLARENCE','192.168.10.83/Andoks','andoks.jpg'),(15,'LEJAO, KYLE','192.168.10.143/24-7INN','247.jpg'),(16,'MACALALAY, JOHN','192.168.10.151/nationalbookstore','nb.jpg'),(17,'MONTALBO, JUSTINE','192.168.10.225/MrsBakers','bakers.jpg'),(18,'SIERRA, RC','192.168.10.186/pldt','pldt.jpg'),(19,'UDAUNDO, WINNER','192.168.10.169/7-11','711.png'),(20,'VICENTE, JERICHO','192.168.10.92/pandayan','pandayan.jpg'),(21,'YU, ANDREI','192.168.10.224/saberinn','si.jpg'),(22,'ASIS, DARYNNE','192.168.10.111/catholicchurch','church.jpg'),(23,'BUNGUBUNG, NEPH','192.168.10.103/MangInasal','inasal.jpg'),(24,'ERANA, KAT KAT','192.168.10.199/MisterDonut','md.jpg'),(25,'GABATINO, PRECIOUS','192.168.10.204/CindysBakery','cindy.png'),(26,'LICTAWA, LOUBHELE','192.168.10.120/Footstep','ft.png'),(27,'MANUEL, GERALDINE','192.168.10.82/EliteGym','eg.jpg'),(28,'NASTOR, JERKINE','192.168.10.213/watsons','watsons.png'),(29,'PABLO, MARICRIS','192.168.10.203/ludansstore','ludans.jpg');

UNLOCK TABLES;

/*Table structure for table `inventory` */

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `inventory_id` int(15) NOT NULL AUTO_INCREMENT,
  `product_id` int(15) DEFAULT NULL,
  `stock` int(15) DEFAULT NULL,
  `price` float(15,2) DEFAULT NULL,
  PRIMARY KEY (`inventory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `inventory` */

LOCK TABLES `inventory` WRITE;

insert  into `inventory`(`inventory_id`,`product_id`,`stock`,`price`) values (1,16,1,499.00),(2,17,0,400.00),(3,18,11,699.00),(4,19,23,219.00),(5,20,9,249.00),(6,21,7,350.00),(7,22,5,279.00),(8,23,77,215.00),(9,24,10,89.00),(10,25,10,200.00),(11,26,10,149.00),(12,27,9,99.00),(13,28,10,50.00),(14,29,9,599.00),(15,30,8,799.00),(16,31,0,999.00),(17,32,10,179.00),(18,33,9,189.00),(19,34,9,79.00),(20,35,9,149.00),(21,36,10,78.00),(22,37,10,179.00),(23,38,22,99.00),(24,39,8,85.00),(25,40,19,50.00);

UNLOCK TABLES;

/*Table structure for table `job` */

DROP TABLE IF EXISTS `job`;

CREATE TABLE `job` (
  `job_id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `des` varchar(50) DEFAULT NULL,
  `salary` int(15) DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `job` */

LOCK TABLES `job` WRITE;

insert  into `job`(`job_id`,`name`,`des`,`salary`) values (1,'Admin','System Monitoring',30000),(2,'Manager','Task to do in Back Office',40000),(4,'Inventory Manager','Task to manage the inventory',25000),(5,'HR Manager','Task to manage employees and Job',27000),(6,'Accounting Manager','Task for Payrolls and Sales',30000),(7,'Cashier','Task for the counter',12000),(8,'Guard','Task to guard the Store',14000),(9,'Staff','Task to Serve Customers and do other side works in',12000);

UNLOCK TABLES;

/*Table structure for table `order_transaction` */

DROP TABLE IF EXISTS `order_transaction`;

CREATE TABLE `order_transaction` (
  `trans_id` int(15) NOT NULL AUTO_INCREMENT,
  `emp_id` int(15) DEFAULT NULL,
  `total_amount` float(10,2) DEFAULT NULL,
  `payment` float(10,2) DEFAULT NULL,
  `change` float(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `cart_data` longtext,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

/*Data for the table `order_transaction` */

LOCK TABLES `order_transaction` WRITE;

insert  into `order_transaction`(`trans_id`,`emp_id`,`total_amount`,`payment`,`change`,`date`,`type`,`cart_data`) values (67,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(62,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(63,17,0.00,0.00,0.00,'2023-07-14','Card','a:0:{}'),(64,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(65,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(66,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(46,17,1314.00,1500.00,186.00,'2023-07-14','Cash','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:6;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:1314;}}'),(47,17,800.00,1000.00,200.00,'2023-07-14','Cash','a:1:{s:32:\"70efdf2ec9b086079795c442636b55fb\";a:6:{s:2:\"id\";s:2:\"17\";s:3:\"qty\";d:2;s:5:\"price\";d:400;s:4:\"name\";s:24:\"Pizza and Lasagna Trio A\";s:5:\"rowid\";s:32:\"70efdf2ec9b086079795c442636b55fb\";s:8:\"subtotal\";d:800;}}'),(48,17,988.00,1000.00,12.00,'2023-07-14','Cash','a:2:{s:32:\"b6d767d2f8ed5d21a44b0e5886680cb9\";a:6:{s:2:\"id\";s:2:\"22\";s:3:\"qty\";d:2;s:5:\"price\";d:279;s:4:\"name\";s:27:\"Veggies and Cheese Overload\";s:5:\"rowid\";s:32:\"b6d767d2f8ed5d21a44b0e5886680cb9\";s:8:\"subtotal\";d:558;}s:32:\"37693cfc748049e45d87b8c7d8b9aacd\";a:6:{s:2:\"id\";s:2:\"23\";s:3:\"qty\";d:2;s:5:\"price\";d:215;s:4:\"name\";s:26:\"Beef and Mushroom Overload\";s:5:\"rowid\";s:32:\"37693cfc748049e45d87b8c7d8b9aacd\";s:8:\"subtotal\";d:430;}}'),(49,17,438.00,500.00,62.00,'2023-07-14','Cash','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:2;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:438;}}'),(50,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(51,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(52,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(53,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(54,17,0.00,0.00,0.00,'2023-07-14','Card','a:0:{}'),(55,17,50.00,50.00,0.00,'2023-07-14','Card','a:1:{s:32:\"d645920e395fedad7bbbed0eca3fe2e0\";a:6:{s:2:\"id\";s:2:\"40\";s:3:\"qty\";d:1;s:5:\"price\";d:50;s:4:\"name\";s:8:\"Iced Tea\";s:5:\"rowid\";s:32:\"d645920e395fedad7bbbed0eca3fe2e0\";s:8:\"subtotal\";d:50;}}'),(56,9,85.00,100.00,15.00,'2023-07-14','Cash','a:1:{s:32:\"d67d8ab4f4c10bf22aa353e27879133c\";a:6:{s:2:\"id\";s:2:\"39\";s:3:\"qty\";d:1;s:5:\"price\";d:85;s:4:\"name\";s:8:\"1L Pepsi\";s:5:\"rowid\";s:32:\"d67d8ab4f4c10bf22aa353e27879133c\";s:8:\"subtotal\";d:85;}}'),(57,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(58,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(59,17,800.00,800.00,0.00,'2023-07-14','Card','a:1:{s:32:\"70efdf2ec9b086079795c442636b55fb\";a:6:{s:2:\"id\";s:2:\"17\";s:3:\"qty\";d:2;s:5:\"price\";d:400;s:4:\"name\";s:24:\"Pizza and Lasagna Trio A\";s:5:\"rowid\";s:32:\"70efdf2ec9b086079795c442636b55fb\";s:8:\"subtotal\";d:800;}}'),(60,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(61,17,219.00,219.00,0.00,'2023-07-14','Card','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}}'),(68,17,438.00,500.00,62.00,'2023-07-14','Cash','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:2;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:438;}}'),(69,17,657.00,700.00,43.00,'2023-07-14','Cash','a:1:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:3;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:657;}}'),(70,17,495.00,500.00,5.00,'2023-07-14','Cash','a:1:{s:32:\"a5771bce93e200c36f7cd9dfd0e5deaa\";a:6:{s:2:\"id\";s:2:\"38\";s:3:\"qty\";d:5;s:5:\"price\";d:99;s:4:\"name\";s:9:\"1.5L Coke\";s:5:\"rowid\";s:32:\"a5771bce93e200c36f7cd9dfd0e5deaa\";s:8:\"subtotal\";d:495;}}'),(71,17,11791.00,12000.00,209.00,'2023-07-14','Cash','a:4:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:21;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:4599;}s:32:\"6ea9ab1baa0efb9e19094440c317e21b\";a:6:{s:2:\"id\";s:2:\"29\";s:3:\"qty\";d:1;s:5:\"price\";d:599;s:4:\"name\";s:31:\"Barkada Bundle 599 - Good for 5\";s:5:\"rowid\";s:32:\"6ea9ab1baa0efb9e19094440c317e21b\";s:8:\"subtotal\";d:599;}s:32:\"34173cb38f07f89ddbebc2ac9128303f\";a:6:{s:2:\"id\";s:2:\"30\";s:3:\"qty\";d:2;s:5:\"price\";d:799;s:4:\"name\";s:31:\"Barkada Bundle 499 - Good for 3\";s:5:\"rowid\";s:32:\"34173cb38f07f89ddbebc2ac9128303f\";s:8:\"subtotal\";d:1598;}s:32:\"c16a5320fa475530d9583c34fd356ef5\";a:6:{s:2:\"id\";s:2:\"31\";s:3:\"qty\";d:5;s:5:\"price\";d:999;s:4:\"name\";s:31:\"Barkada Bundle 999 - Good for 6\";s:5:\"rowid\";s:32:\"c16a5320fa475530d9583c34fd356ef5\";s:8:\"subtotal\";d:4995;}}'),(78,17,707.00,707.00,0.00,'2023-07-18','Card','a:3:{s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:2;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:438;}s:32:\"a5771bce93e200c36f7cd9dfd0e5deaa\";a:6:{s:2:\"id\";s:2:\"38\";s:3:\"qty\";d:1;s:5:\"price\";d:99;s:4:\"name\";s:9:\"1.5L Coke\";s:5:\"rowid\";s:32:\"a5771bce93e200c36f7cd9dfd0e5deaa\";s:8:\"subtotal\";d:99;}s:32:\"d67d8ab4f4c10bf22aa353e27879133c\";a:6:{s:2:\"id\";s:2:\"39\";s:3:\"qty\";d:2;s:5:\"price\";d:85;s:4:\"name\";s:8:\"1L Pepsi\";s:5:\"rowid\";s:32:\"d67d8ab4f4c10bf22aa353e27879133c\";s:8:\"subtotal\";d:170;}}'),(76,9,0.00,0.00,0.00,'2023-07-17','Card','a:0:{}'),(77,9,0.00,0.00,0.00,'2023-07-17','Card','a:0:{}'),(79,17,1941.00,2000.00,59.00,'2023-07-18','Cash','a:5:{s:32:\"98f13708210194c475687be6106a3b84\";a:6:{s:2:\"id\";s:2:\"20\";s:3:\"qty\";d:1;s:5:\"price\";d:249;s:4:\"name\";s:15:\"All-In Overload\";s:5:\"rowid\";s:32:\"98f13708210194c475687be6106a3b84\";s:8:\"subtotal\";d:249;}s:32:\"3c59dc048e8850243be8079a5c74d079\";a:6:{s:2:\"id\";s:2:\"21\";s:3:\"qty\";d:2;s:5:\"price\";d:350;s:4:\"name\";s:18:\"Pepperoni Overload\";s:5:\"rowid\";s:32:\"3c59dc048e8850243be8079a5c74d079\";s:8:\"subtotal\";d:700;}s:32:\"b6d767d2f8ed5d21a44b0e5886680cb9\";a:6:{s:2:\"id\";s:2:\"22\";s:3:\"qty\";d:2;s:5:\"price\";d:279;s:4:\"name\";s:27:\"Veggies and Cheese Overload\";s:5:\"rowid\";s:32:\"b6d767d2f8ed5d21a44b0e5886680cb9\";s:8:\"subtotal\";d:558;}s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";a:6:{s:2:\"id\";s:2:\"19\";s:3:\"qty\";d:1;s:5:\"price\";d:219;s:4:\"name\";s:17:\"Hawaiian Overload\";s:5:\"rowid\";s:32:\"1f0e3dad99908345f7439f8ffabdffc4\";s:8:\"subtotal\";d:219;}s:32:\"37693cfc748049e45d87b8c7d8b9aacd\";a:6:{s:2:\"id\";s:2:\"23\";s:3:\"qty\";d:1;s:5:\"price\";d:215;s:4:\"name\";s:26:\"Beef and Mushroom Overload\";s:5:\"rowid\";s:32:\"37693cfc748049e45d87b8c7d8b9aacd\";s:8:\"subtotal\";d:215;}}'),(80,17,99.00,100.00,1.00,'2023-07-19','Cash','a:1:{s:32:\"a5771bce93e200c36f7cd9dfd0e5deaa\";a:6:{s:2:\"id\";s:2:\"38\";s:3:\"qty\";d:1;s:5:\"price\";d:99;s:4:\"name\";s:9:\"1.5L Coke\";s:5:\"rowid\";s:32:\"a5771bce93e200c36f7cd9dfd0e5deaa\";s:8:\"subtotal\";d:99;}}'),(81,17,333.00,333.00,0.00,'2023-07-19','Cash','a:3:{s:32:\"a5771bce93e200c36f7cd9dfd0e5deaa\";a:6:{s:2:\"id\";s:2:\"38\";s:3:\"qty\";d:2;s:5:\"price\";d:99;s:4:\"name\";s:9:\"1.5L Coke\";s:5:\"rowid\";s:32:\"a5771bce93e200c36f7cd9dfd0e5deaa\";s:8:\"subtotal\";d:198;}s:32:\"d67d8ab4f4c10bf22aa353e27879133c\";a:6:{s:2:\"id\";s:2:\"39\";s:3:\"qty\";d:1;s:5:\"price\";d:85;s:4:\"name\";s:8:\"1L Pepsi\";s:5:\"rowid\";s:32:\"d67d8ab4f4c10bf22aa353e27879133c\";s:8:\"subtotal\";d:85;}s:32:\"d645920e395fedad7bbbed0eca3fe2e0\";a:6:{s:2:\"id\";s:2:\"40\";s:3:\"qty\";d:1;s:5:\"price\";d:50;s:4:\"name\";s:8:\"Iced Tea\";s:5:\"rowid\";s:32:\"d645920e395fedad7bbbed0eca3fe2e0\";s:8:\"subtotal\";d:50;}}'),(82,17,800.00,1000.00,200.00,'2023-07-19','Cash','a:1:{s:32:\"70efdf2ec9b086079795c442636b55fb\";a:6:{s:2:\"id\";s:2:\"17\";s:3:\"qty\";d:2;s:5:\"price\";d:400;s:4:\"name\";s:24:\"Pizza and Lasagna Trio A\";s:5:\"rowid\";s:32:\"70efdf2ec9b086079795c442636b55fb\";s:8:\"subtotal\";d:800;}}');

UNLOCK TABLES;

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `customer_id` int(15) DEFAULT NULL,
  `order_id` int(15) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

LOCK TABLES `payment` WRITE;

UNLOCK TABLES;

/*Table structure for table `payroll` */

DROP TABLE IF EXISTS `payroll`;

CREATE TABLE `payroll` (
  `payroll_id` int(15) NOT NULL AUTO_INCREMENT,
  `emp_id` int(15) DEFAULT NULL,
  `job_id` int(15) DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `pay_salary` float(10,2) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`payroll_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `payroll` */

LOCK TABLES `payroll` WRITE;

insert  into `payroll`(`payroll_id`,`emp_id`,`job_id`,`from`,`to`,`date`,`pay_salary`,`type`) values (15,17,7,'2023-06-14','2023-07-14','2023-07-14',12000.00,'Cash'),(32,17,7,'2023-06-18','2023-07-18','2023-07-18',12000.00,'Card'),(31,18,5,'2023-06-18','2023-07-18','2023-07-18',947.00,'Cash'),(30,17,7,'2023-06-17','2023-07-17','2023-07-17',12000.00,'Card'),(33,17,7,'2023-06-19','2023-07-19','2023-07-19',10.00,'Cash'),(34,9,1,'2023-07-19','2023-07-19','2023-07-19',90.00,'Cash');

UNLOCK TABLES;

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` int(15) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `product` */

LOCK TABLES `product` WRITE;

insert  into `product`(`product_id`,`name`,`price`,`supplier`,`img`,`category`) values (18,'12 Barkada Dealicious Duo Overload',400,'Greenwich Franchise','duo12barkada.jpg','Special Offers'),(17,'Pizza and Lasagna Trio A',200,'Greenwich Franchise','pizzalasagnatrioa.png','Special Offers'),(16,'Overload Trio A',299,'Greenwich Franchise','overloadtrio.jpg','Special Offers'),(19,'Hawaiian Overload',100,'Greenwich Franchise','haiwainoverload.jpg','Pizza'),(20,'All-In Overload',119,'Greenwich Franchise','allinoverload.jpg','Pizza'),(21,'Pepperoni Overload',112,'Greenwich Franchise','pepperonioverload.jpg','Pizza'),(22,'Veggies and Cheese Overload',111,'Greenwich Franchise','vegiesandcheese.jpg','Pizza'),(23,'Beef and Mushroom Overload',115,'Greenwich Franchise','beefmushroom.png','Pizza'),(24,'Cheeseburger Classic',59,'Greenwich Franchise','cheeseburger.jpg','Pizza'),(25,'Ham and Pineapples Classic',99,'Greenwich Franchise','hamandcheese.png','Pizza'),(26,'Lasagna Supreme',79,'Greenwich Franchise','lasagnasupreme.jpg','Pasta'),(27,'Creamy Bacon Carbonara',49,'Greenwich Franchise','creamybaconcarbonara.jpg','Pasta'),(28,'Meaty Spaghetti',20,'Greenwich Franchise','meatyspag.jpg','Pasta'),(29,'Barkada Bundle 599 - Good for 5',400,'Greenwich Franchise','barkada5.jpg','Group Meals'),(30,'Barkada Bundle 499 - Good for 3',200,'Greenwich Franchise','barkadabundle3.png','Group Meals'),(31,'Barkada Bundle 999 - Good for 6',500,'Greenwich Franchise','barakada67.png','Group Meals'),(32,'Lasagna Chicken Combo',100,'Greenwich Franchise','lasagnachickencombo.png','Solo Meals'),(33,'Creamy Carbonara Chicken Combo',110,'Greenwich Franchise','creamycarbonorasolo.png','Solo Meals'),(34,'Pizza Value Meal B',40,'Greenwich Franchise','solomealb.png','Solo Meals'),(35,'Overload Meal D',99,'Greenwich Franchise','solomeald.png','Solo Meals'),(36,'1 pc Crunchy Chicken with Rice',49,'Greenwich Franchise','chickwrice.png','Solo Meals'),(37,'2 pcs Crunchy Chicken with Rice',111,'Greenwich Franchise','2pcchicken.png','Solo Meals'),(38,'1.5L Coke',45,'Greenwich Franchise','15.png','Drinks'),(39,'1L Pepsi',40,'Greenwich Franchise','1l.png','Drinks'),(40,'Iced Tea',25,'Greenwich Franchise','icedtea.jpg','Drinks');

UNLOCK TABLES;

/*Table structure for table `product_purchase` */

DROP TABLE IF EXISTS `product_purchase`;

CREATE TABLE `product_purchase` (
  `purchase_id` int(15) NOT NULL AUTO_INCREMENT,
  `product_id` int(15) DEFAULT NULL,
  `total_product` int(15) DEFAULT NULL,
  `total_amount` int(15) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Data for the table `product_purchase` */

LOCK TABLES `product_purchase` WRITE;

insert  into `product_purchase`(`purchase_id`,`product_id`,`total_product`,`total_amount`,`date`,`status`,`type`) values (32,18,10,4000,'2023-07-13','Paid',NULL),(33,17,20,4000,'2023-07-13','Paid',NULL),(34,19,100,10000,'2023-07-13','Paid',NULL),(35,40,1,25,'2023-07-13','Paid',NULL),(36,18,1,400,'2023-07-13','Paid',NULL),(37,17,12,2400,'2023-07-13','Paid','Cash'),(38,18,1,400,'2023-07-13','Paid','Card'),(39,40,10,250,'2023-07-14','Paid','Cash'),(40,38,10,450,'2023-07-14','Paid','Card'),(41,38,10,450,'2023-07-14','Paid','Card'),(42,17,1,200,'2023-07-14','Paid','Card'),(43,38,1,45,'2023-07-14','Paid','Card'),(44,39,2,80,'2023-07-14','Paid','Cash'),(45,40,1,25,'2023-07-14','Paid','Card'),(46,18,1,400,'2023-07-14','Paid','Card'),(47,19,1,100,'2023-07-17','Paid','Card'),(48,23,10,1150,'2023-07-18','Paid','Card'),(49,19,1,100,'2023-07-18','Paid','Card'),(50,19,1,100,'2023-07-18','Paid','Card'),(51,38,2,90,'2023-07-18','Paid','Card'),(52,17,1,200,'2023-07-18','Pending',NULL),(53,40,1,25,'2023-07-18','Pending',NULL),(54,18,10,4000,'2023-07-18','Pending',NULL),(55,17,1,200,'2023-07-18','Pending',NULL),(56,22,1,111,'2023-07-19','Pending',NULL);

UNLOCK TABLES;

/*Table structure for table `transaction_report` */

DROP TABLE IF EXISTS `transaction_report`;

CREATE TABLE `transaction_report` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `order_id` int(15) DEFAULT NULL,
  `customer_id` int(15) DEFAULT NULL,
  `cashier_id` int(15) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `transaction_report` */

LOCK TABLES `transaction_report` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
