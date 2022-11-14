/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - input_form
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`input_form` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `input_form`;

/*Table structure for table `course_reg` */

DROP TABLE IF EXISTS `course_reg`;

CREATE TABLE `course_reg` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `std_id` varchar(50) NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `course_reg` */

insert  into `course_reg`(`id`,`std_id`,`dept_id`,`semester`,`course_id`,`created_at`) values 
(1,'1720779','CSE001','AUTUMN 22','CSE301,CSE203,ENG101,','2022-09-19 15:49:44'),
(2,'1720770','ENV001','AUTUMN 22','ENG101,ACN101,','2022-09-18 13:52:50'),
(3,'1720360','ENV001','AUTUMN 22','CSE301,CSE203,','2022-09-18 14:17:28'),
(5,'1720770','ENG001','AUTUMN 22','CSE203,ENG101,ACN101,','2022-09-20 10:38:17');

/*Table structure for table `courses` */

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dept_id` varchar(20) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `courses` */

insert  into `courses`(`id`,`dept_id`,`course_id`,`course_name`,`created_at`) values 
(1,'CSE001','CSE301','Database Management System','2022-08-25 17:18:38'),
(2,'CSE001','CSE203','Data Structure','2022-08-25 16:15:38'),
(3,'ENG001','ENG101','Speaking & Listening','2022-09-14 15:11:21'),
(4,'BBA001','ACN101','Accounting','2022-08-25 16:18:28');

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dept_id` varchar(100) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `department` */

insert  into `department`(`id`,`dept_id`,`dept_name`,`created_at`) values 
(1,'CSE001','Computer Science & Engineering','2022-08-25 13:02:43'),
(2,'BBA001','Bachelor of Business Administration','2022-08-25 12:40:46'),
(3,'ENV001','Environmental Science & Management','2022-08-27 11:32:22'),
(4,'ENG001','English Literature','2022-09-18 13:41:16');

/*Table structure for table `student_info` */

DROP TABLE IF EXISTS `student_info`;

CREATE TABLE `student_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `std_id` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `student_info` */

insert  into `student_info`(`id`,`std_id`,`first_name`,`last_name`,`email`,`mobile`,`address`,`gender`,`dob`,`image`,`dept_id`) values 
(1,'1720779','Md. Rejwan','Mahmud','mrm.shakil@yahoo.com','01688343322','93/1, Haji Hayder Ali Road,\r\nHasna Garden, Jamtola,\r\nNarayanganj.','male','1997-10-10','_DSC4355.jpg rejwan.jpg','CSE001'),
(2,'1720770','Fayyaz','Shan-naf','fayyaz@local.com','123456789','93/1, Haji Hayder Ali Road,\r\nHasna Garden, Jamtola,\r\nNarayanganj.','male','2021-03-30','92726591_854939421684324_4128545765775638528_n.jpg','BBA001'),
(3,'1720360','htd','jyhgnfc','tt@gg.com','8465132','tfgyhbjnkmyhjkm','male','2022-09-18','coding-gedb3fb2f1_1920.jpg','ENV001');

/*Table structure for table `users_info` */

DROP TABLE IF EXISTS `users_info`;

CREATE TABLE `users_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `users_info` */

insert  into `users_info`(`id`,`person_id`,`email`,`password`,`user_type`) values 
(1,'1234567','admin@local.com','12345678','admin'),
(2,'1720779','rejwan@local.com','12345678','student'),
(3,'1720770','hello@local.com','12345678','student');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
