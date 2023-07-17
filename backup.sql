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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`Employee_id`,`Name`,`Position`,`Hire_date`,`Address`) values (7,'lo','hj','2023-06-29','hj'),(2,'df','df','2023-07-20','3'),(1,'bel','admin','12/07/2023','aritao');

/*Table structure for table `expenses` */

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `ItemID` int(20) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(20) DEFAULT NULL,
  `Quantity` int(20) DEFAULT NULL,
  `TotalStock` int(20) DEFAULT NULL,
  `Price` int(20) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `expenses` */

insert  into `expenses`(`ItemID`,`ItemName`,`Quantity`,`TotalStock`,`Price`,`Date`) values (1,'asd',1,1,1,'2023-07-17'),(2,'sd',69,95,138,'2023-07-17'),(3,'emman',68,69,680,'2023-07-17'),(4,'emman',69,138,690,'2023-07-17'),(5,'emman',69,137,690,'2023-07-17'),(6,'12',1,1,3,'2023-07-17');

/*Table structure for table `payroll` */

DROP TABLE IF EXISTS `payroll`;

CREATE TABLE `payroll` (
  `Employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `Date_received` varchar(50) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`Employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `payroll` */

insert  into `payroll`(`Employee_id`,`Date_received`,`Salary`) values (1,'2023-07-17',50),(2,'2023-07-16',50);

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
  `CurrentBought` int(50) DEFAULT NULL,
  `CurrentPrice` int(50) DEFAULT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

/*Data for the table `product` */

insert  into `product`(`Product_image`,`Product_id`,`Product_name`,`Category`,`Price`,`Size`,`Quantity`,`TotalProductExpenses`,`CurrentBought`,`CurrentPrice`) values ('e1.jpg',5,'df','Rubber Shoes',3,NULL,2,6,NULL,NULL),('black151.jpg',4,'fffff','Black Shoes',30,NULL,2,60,NULL,NULL),('a2.jpg',3,'dfd','Rubber Shoes',10,NULL,5,50,NULL,NULL),('d12.jpg',2,'emman','Slippers',10,NULL,137,1390,69,690),('a1.jpg',1,'sd','Rubber Shoes',2,NULL,95,190,69,138),('a2.jpg',111,'errr','Rubber Shoes',9,NULL,2,18,NULL,NULL),('b11.jpg',88,'j','Rubber Shoes',77,NULL,44,3388,NULL,NULL),('a11.jpg',33,'dd','Slippers',599,NULL,1,1198,NULL,NULL),('f1.jpg',112,'12','Slippers',3,NULL,1,3,1,3);

/*Table structure for table `purchase` */

DROP TABLE IF EXISTS `purchase`;

CREATE TABLE `purchase` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `TotalBought` varchar(50) DEFAULT NULL,
  `try` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `purchase` */

insert  into `purchase`(`id`,`TotalBought`,`try`) values (2,'20','additional value'),(3,'639','additional value'),(4,'609','additional value'),(5,'10','additional value');

/*Table structure for table `sales` */

DROP TABLE IF EXISTS `sales`;

CREATE TABLE `sales` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `TotalPrice` int(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `sales` */

insert  into `sales`(`ID`,`Date`,`TotalPrice`) values (1,'2023-07-17',1),(2,'2023-07-17',2),(4,'2023-07-17',609),(5,'2023-07-17',10);

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

/* Trigger structure for table `product` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `ExpensesAudit` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `ExpensesAudit` AFTER UPDATE ON `product` FOR EACH ROW BEGIN
    INSERT INTO expenses (ItemName, TotalStock, Quantity, Price, DATE)
    VALUES (NEW.Product_name, NEW.Quantity, NEW.CurrentBought, NEW.CurrentPrice, NOW());
END */$$


DELIMITER ;

/* Trigger structure for table `purchase` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `SalesAudit` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `SalesAudit` AFTER INSERT ON `purchase` FOR EACH ROW BEGIN
    INSERT INTO sales (ID, DATE, TotalPrice)
    VALUES (NEW.id, NOW(), NEW.TotalBought);
END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
