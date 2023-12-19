/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - pesan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pesan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `pesan`;

/*Table structure for table `reservasi` */

DROP TABLE IF EXISTS `reservasi`;

CREATE TABLE `reservasi` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `orang_dewasa` int(11) DEFAULT NULL,
  `anak_anak` int(11) DEFAULT NULL,
  `kamar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43434328 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `reservasi` */

insert  into `reservasi`(`_id`,`check_in`,`check_out`,`orang_dewasa`,`anak_anak`,`kamar`) values 
(43434327,'2023-12-20','2023-12-21',3,5,'VVIP Rooms');

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `reservasi_id` int(11) DEFAULT NULL,
  `reviews` text DEFAULT NULL,
  PRIMARY KEY (`_id`),
  KEY `users_id` (`users_id`),
  KEY `reservasi_id` (`reservasi_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`_id`),
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`reservasi_id`) REFERENCES `reservasi` (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `reviews` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1231312137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`_id`,`nama`,`jenis_kelamin`,`status`,`alamat`) values 
(1231312136,'kamu','laki-laki','lajang','krapyak');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
