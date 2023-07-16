/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.7.14 : Database - footstep
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`footstep` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `footstep`;

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `Employee_id` int(50) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Hire_date` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`Employee_id`,`Name`,`Position`,`Hire_date`,`Address`) values (4,'df','dfdf','2023-07-21','343'),(5,'dffff','ff','2023-07-21','fff'),(2,'dssd','ad,in','2023-07-27','45df'),(3,'dfdfdf','dffd','2023-07-20','34'),(1,'fddf','df','2023-07-14','as'),(6,'fdf','454','2023-07-18','dfd');

/*Table structure for table `payroll` */

DROP TABLE IF EXISTS `payroll`;

CREATE TABLE `payroll` (
  `Employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `Date_received` varchar(50) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`Employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `payroll` */

insert  into `payroll`(`Employee_id`,`Date_received`,`Salary`) values (2,'2023-07-16',60),(5,'2023-07-16',66),(4,'2023-07-16',5);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `Product_image` varchar(50) DEFAULT NULL,
  `Product_id` int(50) NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Price` int(50) DEFAULT NULL,
  `Size` int(50) DEFAULT NULL,
  `Quantity` int(50) DEFAULT NULL,
  `TotalProductExpenses` int(50) DEFAULT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

/*Data for the table `product` */

insert  into `product`(`Product_image`,`Product_id`,`Product_name`,`Category`,`Price`,`Size`,`Quantity`,`TotalProductExpenses`) values ('e1.jpg',5,'df','Rubber Shoes',3,NULL,2,6),('black151.jpg',4,'fffff','Black Shoes',30,NULL,2,60),('a2.jpg',3,'dfd','Rubber Shoes',10,NULL,5,50),('d12.jpg',2,'emman','Slippers',10,NULL,2,20),('a1.jpg',1,'sd','Rubber Shoes',2,NULL,4,8),('a2.jpg',111,'errr','Rubber Shoes',9,NULL,2,18),('b11.jpg',88,'j','Rubber Shoes',77,NULL,44,3388),('a11.jpg',33,'dd','Slippers',599,NULL,2,1198);

/*Table structure for table `purchase` */

DROP TABLE IF EXISTS `purchase`;

CREATE TABLE `purchase` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `TotalBought` varchar(50) DEFAULT NULL,
  `try` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `purchase` */

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `Sales_id` int(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `sales` */

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`name`,`username`,`password`,`role`) values (1,'admin','admin','admin','Administrator'),(2,'hr','hr','hr','hr'),(3,'finance','finance','finance','finance'),(4,'cashier','cashier','cashier','cashier');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
