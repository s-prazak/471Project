# Host: localhost  (Version 5.7.15-log)
# Date: 2016-11-29 13:21:41
# Generator: MySQL-Front 5.4  (Build 4.21)
# Internet: http://www.mysqlfront.de/

/*!40101 SET NAMES utf8 */;

CREATE DATABASE project_database;
USE project_database;

#
# Structure for table "category"
#

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `Name` varchar(255) NOT NULL DEFAULT 'Name',
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "category"
#

INSERT INTO `category` VALUES ('Furniture'),('Entertainment'),('Floral'),('Cooking'),('Clothing');

#
# Structure for table "order"
#

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "order"
#


#
# Structure for table "store"
#

DROP TABLE IF EXISTS `store`;
CREATE TABLE `store` (
  `Name` varchar(255) NOT NULL DEFAULT 'Name',
  `URL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "store"
#


#
# Structure for table "has"
#

DROP TABLE IF EXISTS `has`;
CREATE TABLE `has` (
  `Store_Name` varchar(255) DEFAULT NULL,
  `Category_Name` varchar(255) DEFAULT NULL,
  KEY `Category Name2` (`Category_Name`),
  KEY `Store Name2` (`Store_Name`),
  CONSTRAINT `Category Name2` FOREIGN KEY (`Category_Name`) REFERENCES `category` (`Name`),
  CONSTRAINT `Store Name2` FOREIGN KEY (`Store_Name`) REFERENCES `store` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "has"
#


#
# Structure for table "supplier"
#

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `Name` varchar(255) NOT NULL DEFAULT 'Name',
  `Usual_Stock_Supplied` int(11) DEFAULT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "supplier"
#


#
# Structure for table "product"
#

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Requested_Count` int(11) NOT NULL DEFAULT '0',
  `Category_Name` varchar(255) DEFAULT NULL,
  `Supplier_Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Category Name` (`Category_Name`),
  KEY `Supplier Name` (`Supplier_Name`),
  CONSTRAINT `Category Name` FOREIGN KEY (`Category_Name`) REFERENCES `category` (`Name`),
  CONSTRAINT `Supplier Name` FOREIGN KEY (`Supplier_Name`) REFERENCES `supplier` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "product"
#

#
# Structure for table "sells"
#

DROP TABLE IF EXISTS `sells`;
CREATE TABLE `sells` (
  `Product_Id` int(11) DEFAULT NULL,
  `Store_Name` varchar(255) DEFAULT NULL,
  KEY `Product ID` (`Product_Id`),
  KEY `Store Name` (`Store_Name`),
  CONSTRAINT `Product ID` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Id`),
  CONSTRAINT `Store Name` FOREIGN KEY (`Store_Name`) REFERENCES `store` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "sells"
#


#
# Structure for table "requests"
#

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `Number_Of_Products` int(11) DEFAULT NULL,
  `Product_Id` int(11) DEFAULT NULL,
  `Order_Id` int(255) DEFAULT NULL,
  KEY `Product ID3` (`Product_Id`),
  KEY `Order ID2` (`Order_Id`),
  CONSTRAINT `Order ID2` FOREIGN KEY (`Order_Id`) REFERENCES `order` (`Id`),
  CONSTRAINT `Product ID3` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "requests"
#


#
# Structure for table "buys"
#

DROP TABLE IF EXISTS `buys`;
CREATE TABLE `buys` (
  `Number_Of_Products` int(11) DEFAULT NULL,
  `Product_Id` int(11) DEFAULT NULL,
  `Order_Id` int(11) DEFAULT NULL,
  KEY `Product ID2` (`Product_Id`),
  KEY `Order ID` (`Order_Id`),
  CONSTRAINT `Order ID` FOREIGN KEY (`Order_Id`) REFERENCES `order` (`Id`),
  CONSTRAINT `Product ID2` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "buys"
#

