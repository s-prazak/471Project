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

INSERT INTO `category` VALUES ('Furniture'),('Movies'),('Food'),('Clothing'),
('Jewelery'), ('Automotive'), ('Assorted_Trinkets'),('Music'), ('Electronics'), ('Video_Games'), 
('Toys'), ('Furnaces'), ('Sports_and_Outdoors');


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

INSERT INTO `store` VALUES ('Amazon', 'amazon.ca'), ('Walmart', 'walmart.ca'), 
('Costco', 'costco.ca');

#
# Structure for table "has"
#

DROP TABLE IF EXISTS `has`;

CREATE TABLE `has` (
  `Store_Name` varchar(255) NOT NULL DEFAULT 'Name',
  `Category_Name` varchar(255) NOT NULL DEFAULT 'Cate_Name',
  PRIMARY KEY(`Store_Name`, `Category_Name`),
  FOREIGN KEY (`Category_Name`) REFERENCES `category` (`Name`),
  FOREIGN KEY (`Store_Name`) REFERENCES `store` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "has"
#

INSERT INTO `has` VALUES ('Amazon', 'Furniture');
INSERT INTO `has` VALUES ('Amazon', 'Movies');
INSERT INTO `has` VALUES ('Amazon', 'Food');
INSERT INTO `has` VALUES ('Amazon', 'Clothing');
INSERT INTO `has` VALUES ('Amazon', 'Jewelery');
INSERT INTO `has` VALUES ('Amazon', 'Automotive');
INSERT INTO `has` VALUES ('Amazon', 'Assorted_Trinkets');
INSERT INTO `has` VALUES ('Amazon', 'Music');
INSERT INTO `has` VALUES ('Amazon', 'Electronics');
INSERT INTO `has` VALUES ('Amazon', 'Video_Games');
INSERT INTO `has` VALUES ('Amazon', 'Toys');
INSERT INTO `has` VALUES ('Amazon', 'Furnaces');
INSERT INTO `has` VALUES ('Amazon', 'Sports_and_Outdoors');
INSERT INTO `has` VALUES ('Walmart', 'Jewelery');
INSERT INTO `has` VALUES ('Walmart', 'Automotive');
INSERT INTO `has` VALUES ('Walmart', 'Assorted_Trinkets');
INSERT INTO `has` VALUES ('Costco', 'Electronics');
INSERT INTO `has` VALUES ('Costco', 'Video_Games');
INSERT INTO `has` VALUES ('Costco', 'Toys');


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

INSERT INTO `supplier` VALUES ('BigSupplier', 20), ('Microsoft', 20), ('The_Brick', 50), ('Warner_Bros.', 10),
('Spence_Diamonds', 5), ('Ford', 40), ('EMI', 19), ('Bethesda', 10), ('Mattel', 20),
('Big_Furnaces_America', 3), ('Cabellas', 10);

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

INSERT INTO `product` VALUES (1, 'TurboFlax', 10, 50, 0, 'Food', 'BigSupplier'), 
(2, 'Broccoli', 5, 200, 0, 'Food', 'BigSupplier'), (3, 'Oranges', 3, 100, 0, 'Food', 'BigSupplier'),
(4, 'Chair', 100, 30, 0, 'Furniture', 'The_Brick'), (5, 'Couch', 200, 30, 0, 'Furniture', 'The_Brick'),
(6, 'Table', 300, 20, 0, 'Furniture', 'The_Brick'), (7, 'The_Lone_Ranger', 1, 3, 0, 'Movies', 'Warner_Bros.'),
(8, 'Max_Payne', 5, 10, 0, 'Movies', 'Warner_Bros.'), (9, 'Les_Miserables', 500, 37, 0, 'Movies', 'Warner_Bros.');
INSERT INTO `product` VALUES (10, 'Loose_Shirt', 13, 100, 0, 'Clothing', 'BigSupplier');
INSERT INTO `product` VALUES (11, 'Jean_Shorts', 1, 35, 0, 'Clothing', 'BigSupplier');
INSERT INTO `product` VALUES (12, 'Baseball_Cap', 35, 20, 0, 'Clothing', 'BigSupplier');
INSERT INTO `product` VALUES (13, 'Magic_Pear', 500, 5, 0, 'Jewelery', 'Spence_Diamonds');
INSERT INTO `product` VALUES (14, 'Hope_Diamond', 15, 7, 0, 'Jewelery', 'Spence_Diamonds');
INSERT INTO `product` VALUES (15, 'Ruby_Encrusted_Fish', 50000, 100, 0, 'Jewelery', 'Spence_Diamonds');
INSERT INTO `product` VALUES (16, 'Bumper', 200, 15, 0, 'Automotive', 'Ford');
INSERT INTO `product` VALUES (17, 'Wheel', 100, 7, 0, 'Automotive', 'Ford');
INSERT INTO `product` VALUES (18, 'Hood', 600, 15, 0, 'Automotive', 'Ford');
INSERT INTO `product` VALUES (19, 'PushPin', 4, 20, 0, 'Assorted_Trinkets', 'BigSupplier');
INSERT INTO `product` VALUES (20, 'Mexican_Guitar', 100, 10, 0, 'Assorted_Trinkets', 'BigSupplier');
INSERT INTO `product` VALUES (21, 'Shot_Glass', 3, 30, 0, 'Assorted_Trinkets', 'BigSupplier');
INSERT INTO `product` VALUES (22, 'The_Beatles:White_Album', 15, 20, 0, 'Music', 'EMI');
INSERT INTO `product` VALUES (23, 'Radiohead:OK_Computer', 15, 20, 0, 'Music', 'EMI');
INSERT INTO `product` VALUES (24, 'PDiddy_Last_Train_To_Paris', 4, 20, 0, 'Music', 'EMI');
INSERT INTO `product` VALUES (25, 'Surface_4', 1000, 30, 0, 'Electronics', 'Microsoft');
INSERT INTO `product` VALUES (26, 'Microsoft_Office', 300, 20, 0, 'Electronics', 'Microsoft');
INSERT INTO `product` VALUES (27, 'Motorola_RAZR', 1000, 30, 0, 'Electronics', 'BigSupplier');
INSERT INTO `product` VALUES (28, 'Fallout4', 50, 30, 0, 'Video_Games', 'Bethesda');
INSERT INTO `product` VALUES (29, 'Fallout3', 30, 30, 0, 'Video_Games', 'Bethesda');
INSERT INTO `product` VALUES (30, 'Skyrim', 50, 30, 0, 'Video_Games', 'Bethesda');
INSERT INTO `product` VALUES (31, 'Hot_Wheels', 10, 30, 0, 'Toys', 'Mattel');
INSERT INTO `product` VALUES (32, 'Barbie', 15, 30, 0, 'Toys', 'Mattel');
INSERT INTO `product` VALUES (33, 'Fisher-Price', 55, 20, 0, 'Toys', 'Mattel');
INSERT INTO `product` VALUES (34, 'Super_Furnace_3000', 3001, 20, 0, 'Furnaces', 'Big_Furnaces_America');
INSERT INTO `product` VALUES (35, 'Garbage_Incinerator', 403, 20, 0, 'Furnaces', 'Big_Furnaces_America');
INSERT INTO `product` VALUES (36, 'Uncontrolled_Fire_Blaster', 2000000, 20, 0, 'Furnaces', 'Big_Furnaces_America');
INSERT INTO `product` VALUES (37, 'Tent', 100, 10, 0, 'Sports_and_Outdoors', 'Cabellas');
INSERT INTO `product` VALUES (38, 'Jet_Boil', 50, 15, 0, 'Sports_and_Outdoors', 'Cabellas');
INSERT INTO `product` VALUES (39, 'Axe', 12, 5, 0, 'Sports_and_Outdoors', 'Cabellas');



#
# Structure for table "sells"
#

DROP TABLE IF EXISTS `sells`;
CREATE TABLE `sells` (
  `Product_Id` int(11) NOT NULL DEFAULT -1,
  `Store_Name` varchar(255) NOT NULL DEFAULT 'Store_Name',
  PRIMARY KEY (`Product_Id`, `Store_Name`),
  FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Id`),
  FOREIGN KEY (`Store_Name`) REFERENCES `store` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "sells"
#

INSERT INTO `sells` VALUES (1, 'Amazon');
INSERT INTO `sells` VALUES (2, 'Amazon');
INSERT INTO `sells` VALUES (3, 'Amazon');
INSERT INTO `sells` VALUES (4, 'Amazon');
INSERT INTO `sells` VALUES (5, 'Amazon');
INSERT INTO `sells` VALUES (6, 'Amazon');
INSERT INTO `sells` VALUES (7, 'Amazon');
INSERT INTO `sells` VALUES (8, 'Amazon');
INSERT INTO `sells` VALUES (9, 'Amazon');
INSERT INTO `sells` VALUES (10, 'Amazon');
INSERT INTO `sells` VALUES (11, 'Amazon');
INSERT INTO `sells` VALUES (12, 'Amazon');
INSERT INTO `sells` VALUES (13, 'Walmart');
INSERT INTO `sells` VALUES (14, 'Amazon');
INSERT INTO `sells` VALUES (15, 'Amazon');
INSERT INTO `sells` VALUES (16, 'Walmart');
INSERT INTO `sells` VALUES (17, 'Amazon');
INSERT INTO `sells` VALUES (18, 'Amazon');
INSERT INTO `sells` VALUES (19, 'Walmart');
INSERT INTO `sells` VALUES (20, 'Amazon');
INSERT INTO `sells` VALUES (21, 'Amazon');
INSERT INTO `sells` VALUES (22, 'Amazon');
INSERT INTO `sells` VALUES (23, 'Amazon');
INSERT INTO `sells` VALUES (24, 'Amazon');
INSERT INTO `sells` VALUES (25, 'Costco');
INSERT INTO `sells` VALUES (26, 'Amazon');
INSERT INTO `sells` VALUES (27, 'Amazon');
INSERT INTO `sells` VALUES (28, 'Costco');
INSERT INTO `sells` VALUES (29, 'Amazon');
INSERT INTO `sells` VALUES (30, 'Amazon');
INSERT INTO `sells` VALUES (31, 'Costco');
INSERT INTO `sells` VALUES (32, 'Amazon');
INSERT INTO `sells` VALUES (33, 'Amazon');
INSERT INTO `sells` VALUES (34, 'Amazon');
INSERT INTO `sells` VALUES (35, 'Amazon');
INSERT INTO `sells` VALUES (36, 'Amazon');
INSERT INTO `sells` VALUES (37, 'Amazon');
INSERT INTO `sells` VALUES (38, 'Amazon');
INSERT INTO `sells` VALUES (39, 'Amazon');



#
# Structure for table "requests"
#

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `Number_Of_Products` int(11) DEFAULT NULL,
  `Product_Id` int(11) NOT NULL DEFAULT -1,
  `Order_Id` int(255) NOT NULL DEFAULT -1,
  PRIMARY KEY (`Order_Id`, `Product_Id`),
  FOREIGN KEY (`Order_Id`) REFERENCES `order` (`Id`),
  FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Id`)
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
  `Product_Id` int(11) NOT NULL DEFAULT -1,
  `Order_Id` int(11) NOT NULL DEFAULT -1,
  PRIMARY KEY (`Order_Id`, `Product_Id`),
  FOREIGN KEY (`Order_Id`) REFERENCES `order` (`Id`),
  FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "buys"
#

