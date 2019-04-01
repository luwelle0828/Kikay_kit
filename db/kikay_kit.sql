/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.6.12-log : Database - kikay_kit
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`kikay_kit` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kikay_kit`;

/*Table structure for table `avail_service` */

DROP TABLE IF EXISTS `avail_service`;

CREATE TABLE `avail_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `avail_service` */

insert  into `avail_service`(`id`,`price`,`duration`,`branch_id`,`service_id`,`status`) values (1,200,'01:00',1,1,'A'),(2,150,'01:00',1,2,'A'),(3,1050,'01:30',1,3,'A'),(4,600,'01:00',1,4,'A'),(5,175,'00:30',1,5,'A'),(6,210,'00:30',1,6,'A'),(7,150,'00:30',1,7,'A'),(8,210,'01:00',1,8,'A'),(19,200,'01:00',2,1,'A'),(20,150,'01:00',2,2,'A'),(21,1000,'01:30',2,3,'A'),(22,600,'01:00',2,4,'A'),(23,175,'00:30',2,5,'A'),(24,210,'00:30',2,6,'A'),(25,150,'00:30',2,7,'A'),(26,210,'01:00',2,8,'A'),(27,200,'01:00',3,1,'A'),(28,NULL,NULL,3,2,'I'),(29,NULL,NULL,3,3,'I'),(30,NULL,NULL,3,4,'I'),(31,200,'00:30',3,5,'A'),(32,200,'00:30',3,6,'A'),(33,200,'00:30',3,7,'A'),(34,NULL,NULL,3,8,'I'),(35,950,'01:30',1,9,'A'),(36,NULL,NULL,2,9,'I'),(37,NULL,NULL,3,9,'I'),(38,390,'01:00',4,10,'A'),(39,400,'01:00',5,10,'A'),(40,360,'01:00',4,11,'A'),(41,350,'01:00',5,11,'A'),(42,450,'02:00',4,12,'A'),(43,450,'02:00',5,12,'A'),(44,900,'01:30',4,13,'A'),(45,900,'01:30',5,13,'A'),(46,380,'01:00',6,10,'A'),(47,360,'01:00',6,11,'A'),(48,450,'02:00',6,12,'A'),(49,900,'01:30',6,13,'A');

/*Table structure for table `branch` */

DROP TABLE IF EXISTS `branch`;

CREATE TABLE `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(32) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` text,
  `location` text,
  `mobile` varchar(20) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `open_days` varchar(14) DEFAULT NULL,
  `open_time` varchar(10) DEFAULT NULL,
  `close_time` varchar(10) DEFAULT NULL,
  `image` text,
  `slots` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `branch` */

insert  into `branch`(`id`,`code`,`user_id`,`name`,`location`,`mobile`,`telephone`,`open_days`,`open_time`,`close_time`,`image`,`slots`,`company_id`,`created_date`,`created_by`,`updated_date`,`updated_by`) values (1,'BR00000001',2,'David’s Salon - main','Makati','(+09)312 481 2612','352 18 29','2,3,4,5,6','08:00','21:00','default.png',10,1,'2018-06-11 16:36:10',NULL,'0000-00-00 00:00:00',NULL),(2,'BR00000002',3,'David’s Salon - Caloocan','Caloocan','(+09)231 556 2167','352 17 82','2,3,4,5,6','08:00','20:00','default.png',8,1,'2018-06-11 16:41:43','david01','2018-06-11 08:59:21','david02'),(3,'BR00000003',4,'David’s Salon - Manila','Manila','(+09)325 176 4512','325 16 72','2,3,4,5,6','09:00','20:00','default.png',15,1,'2018-06-11 16:44:20','admin','2018-06-11 08:59:32','david03'),(4,'BR00000004',5,'Vivere - main','Valenzuela','(+09)251 562 3518','341 79 21','2,3,4,5,6,7','09:00','21:00','default.png',10,2,'2018-06-11 16:56:37',NULL,'2018-06-11 08:58:51','viv01'),(5,'BR00000005',6,'Vivere - Makati','Makati','(+09)231 685 4127','324 51 26','2,3,5,6','08:00','20:00','default.png',15,2,'2018-06-11 17:01:05','viv01','2018-06-11 09:15:54','viv02'),(6,'BR00000006',7,'Vivere - Pasay','Pasay','(+09)515 726 3517','326 10 12','2,3,4,6,7','08:00','18:00','default.png',8,2,'2018-06-11 17:19:26','viv01','2018-06-11 09:22:09','viv03');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`type`,`status`,`company_id`) values (1,'Cutting & Styling','A',1),(2,'Hair Color','A',1),(3,'Make-up','A',1),(4,'Nail Care','A',1),(5,'Waxing','A',1),(6,'Treatments','A',1),(7,'Cuts And Style','A',2),(8,'Hairstyling','A',2),(15,'Make-up','A',2);

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(32) DEFAULT NULL,
  `name` text,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `company` */

insert  into `company`(`id`,`code`,`name`,`description`,`user_id`,`created_date`,`created_by`,`updated_date`,`updated_by`) values (1,'CL00000001','David’s Salon',NULL,2,'2018-06-11 16:36:10',NULL,'0000-00-00 00:00:00',NULL),(2,'CL00000002','Vivere','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean placerat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Praesent in mauris eu tortor porttitor accumsan. Sed ac dolor sit amet purus malesuada congue. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Proin mattis lacinia justo. Nullam sit amet magna in magna gravida vehicula. Aliquam ornare wisi eu metus. Aliquam erat volutpat. Etiam egestas wisi a erat. Nulla non lectus sed nisl molestie malesuada. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Duis pulvinar. Integer vulputate sem a nibh rutrum consequat. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo.',5,'2018-06-11 16:56:37','admin','2018-06-11 08:58:51','viv01');

/*Table structure for table `counter` */

DROP TABLE IF EXISTS `counter`;

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `counter` */

insert  into `counter`(`id`,`code`,`count`) values (1,'CL',2),(2,'BR',6),(3,'CS',5),(4,'RS',2);

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(32) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` text,
  `last_name` text,
  `address` text,
  `contact` varchar(20) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

insert  into `customer`(`id`,`code`,`user_id`,`first_name`,`last_name`,`address`,`contact`,`gender`,`created_date`,`created_by`,`updated_date`,`updated_by`) values (1,'CS00000001',8,'Luwelle','Baltazar','Caloocan','(+09)512 853 5126','male','2018-06-11 17:25:59',NULL,'0000-00-00 00:00:00',NULL),(2,'CS00000002',9,'Robert','Estopace','Tondo, Manila','(+09)512 835 2611','male','2018-06-11 17:27:39',NULL,'0000-00-00 00:00:00',NULL),(3,'CS00000003',10,'Jan Madelind','Ronquillo','Pasay','(+09)167 253 7162','female','2018-06-11 17:28:05',NULL,'2018-06-11 17:30:03','admin'),(4,'CS00000004',11,'Charlone','Poserio','Laguna','(+09)512 835 7631','Male','2018-06-11 17:29:02','admin','0000-00-00 00:00:00',NULL),(5,'CS00000005',12,'Lyle Angeline','Paulo','Bulacan','(+09)512 635 1762','Female','2018-06-11 17:29:56','admin','0000-00-00 00:00:00',NULL);

/*Table structure for table `reservation` */

DROP TABLE IF EXISTS `reservation`;

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(32) DEFAULT NULL,
  `date` varchar(15) DEFAULT NULL,
  `time` varchar(15) DEFAULT NULL,
  `time_end` varchar(15) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `reservation` */

insert  into `reservation`(`id`,`code`,`date`,`time`,`time_end`,`status`,`customer_id`,`branch_id`,`created_date`,`created_by`,`updated_date`,`updated_by`) values (1,'RS00000001','06/11/2018','08:00','09:00','Pending',1,1,'2018-06-11 17:43:40','custom01','0000-00-00 00:00:00',NULL),(2,'RS00000002','06/15/2018','10:30','11:30','Pending',1,1,'2018-06-11 17:44:09','custom01','0000-00-00 00:00:00',NULL);

/*Table structure for table `reservation_service` */

DROP TABLE IF EXISTS `reservation_service`;

CREATE TABLE `reservation_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) DEFAULT NULL,
  `avail_service_id` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `reservation_service` */

insert  into `reservation_service`(`id`,`reservation_id`,`avail_service_id`,`status`) values (1,1,1,'A'),(2,2,1,'A');

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) DEFAULT NULL,
  `message` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `branch_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `reviews` */

insert  into `reviews`(`id`,`rating`,`message`,`created_date`,`branch_id`,`customer_id`) values (1,5,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Fusce dui leo, imperdiet in, aliquam sit amet, feugiat eu, orci. Aliquam in lorem sit amet leo accumsan lacinia. Integer vulputate sem a nibh rutrum consequat. Nunc auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Integer malesuada. Aenean placerat. Aliquam in lorem sit amet leo accumsan lacinia. Etiam posuere lacus quis dolor. Nulla est. Integer vulputate sem a nibh rutrum consequat. Curabitur ligula sapien, pulvinar a vestibulum quis, facilisis vel sapien.','2018-06-11 17:47:31',2,1);

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `price` float DEFAULT NULL,
  `duration` varchar(6) DEFAULT NULL,
  `description` text,
  `status` char(1) DEFAULT NULL,
  `image` blob,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(32) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `service` */

insert  into `service`(`id`,`name`,`price`,`duration`,`description`,`status`,`image`,`created_date`,`created_by`,`updated_date`,`updated_by`,`company_id`,`category_id`) values (1,'Haircut',200,'01:00',NULL,'A','haircut-salon-tease-today-160607_6edb3b20c56f717a53bf9d3af5813fa0.jpg','2018-06-11 15:54:00','belo01','2018-06-11 07:56:56','belo01',1,1),(2,'Shampoo & Blowdry',150,'01:00',NULL,'A','002.jpg','2018-06-11 15:57:51','belo01','2018-06-11 07:58:04','belo01',1,1),(3,'Tint (Root) Deluxe',1050,'01:30',NULL,'A','default.png','2018-06-11 16:05:04','david01','0000-00-00 00:00:00',NULL,1,2),(4,'Eye Makeup',600,'01:00',NULL,'A','default.png','2018-06-11 16:05:46','david01','0000-00-00 00:00:00',NULL,1,3),(5,'Manicure',175,'00:30',NULL,'A','default.png','2018-06-11 16:06:10','david01','0000-00-00 00:00:00',NULL,1,4),(6,'Pedicure',210,'00:30',NULL,'A','default.png','2018-06-11 16:06:28','david01','0000-00-00 00:00:00',NULL,1,4),(7,'Nail Art',150,'00:30',NULL,'A','default.png','2018-06-11 16:06:53','david01','0000-00-00 00:00:00',NULL,1,4),(8,'Eyebrow',210,'01:00',NULL,'A','default.png','2018-06-11 16:13:59','david01','0000-00-00 00:00:00',NULL,1,5),(9,'Organic',950,'01:30',NULL,'A','default.png','2018-06-11 16:57:47','david01','0000-00-00 00:00:00',NULL,1,6),(10,'Ladies’ Cut',390,'01:00',NULL,'A','default.png','2018-06-11 17:02:34','viv01','2018-06-11 09:03:28','viv01',2,7),(11,'Men’s Cut',360,'01:00',NULL,'A','default.png','2018-06-11 17:02:49','viv01','0000-00-00 00:00:00',NULL,2,7),(12,'Wash & Blow Dry With Style',450,'02:00',NULL,'A','default.png','2018-06-11 17:14:26','viv01','0000-00-00 00:00:00',NULL,2,8),(13,'Full Makeup',900,'01:30',NULL,'A','default.png','2018-06-11 17:15:26','viv01','0000-00-00 00:00:00',NULL,2,15);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` text,
  `status` char(1) DEFAULT NULL,
  `logged_in` int(11) DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`status`,`logged_in`,`user_type_id`,`created_date`,`created_by`,`updated_date`,`updated_by`) values (1,'admin','123','A',0,1,'2018-06-11 16:23:19',NULL,'0000-00-00 00:00:00',NULL),(2,'david01','123','A',0,2,'2018-06-11 16:36:09',NULL,'0000-00-00 00:00:00',NULL),(3,'david02','123','A',0,3,'2018-06-11 16:41:43','david01','0000-00-00 00:00:00',NULL),(4,'david03','123','A',0,3,'2018-06-11 16:44:20','admin','0000-00-00 00:00:00',NULL),(5,'viv01','123','A',0,2,'2018-06-11 16:56:37','admin','0000-00-00 00:00:00',NULL),(6,'viv02','123','A',0,3,'2018-06-11 17:01:05','viv01','0000-00-00 00:00:00',NULL),(7,'viv03','123','A',0,3,'2018-06-11 17:19:26','viv01','0000-00-00 00:00:00',NULL),(8,'custom01','123','A',0,4,'2018-06-11 17:25:59',NULL,'0000-00-00 00:00:00',NULL),(9,'custom02','123','A',0,4,'2018-06-11 17:27:39',NULL,'0000-00-00 00:00:00',NULL),(10,'custom03','123','A',0,4,'2018-06-11 17:28:05',NULL,'0000-00-00 00:00:00',NULL),(11,'custom04','123','A',NULL,4,'2018-06-11 17:29:01','admin','0000-00-00 00:00:00',NULL),(12,'custom05','123','A',NULL,4,'2018-06-11 17:29:56','admin','0000-00-00 00:00:00',NULL);

/*Table structure for table `user_activity` */

DROP TABLE IF EXISTS `user_activity`;

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` int(11) DEFAULT NULL,
  `action` text,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_activity` */

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_type` */

insert  into `user_type`(`id`,`type`) values (1,'admin'),(2,'client'),(3,'branch'),(4,'customer');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
