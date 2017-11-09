CREATE DATABASE  IF NOT EXISTS `retailpurchase` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `retailpurchase`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: retailpurchase
-- ------------------------------------------------------
-- Server version	5.5.46

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banks` (
  `bankID` int(11) NOT NULL AUTO_INCREMENT,
  `bankName` varchar(45) NOT NULL,
  PRIMARY KEY (`bankID`),
  UNIQUE KEY `bankName_UNIQUE` (`bankName`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banks`
--

LOCK TABLES `banks` WRITE;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` VALUES (5,'boa'),(32,'check6'),(33,'check7'),(36,'checking'),(2,'dcu'),(8,'hdfc'),(9,'hsbc'),(6,'icici'),(4,'keywest'),(10,'rbs'),(7,'sbi'),(1,'union'),(3,'wells');
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `numberOfPurchases` int(11) NOT NULL,
  `bankAccountNumber` bigint(15) NOT NULL,
  PRIMARY KEY (`customerID`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `bankAccountNumber_UNIQUE` (`bankAccountNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (101,'abc9','1234',0,12345678933),(102,'account','account',1,13234565608),(103,'admin','min',1,14345674509),(104,'advert','vert',1,15456785610),(105,'company','pany',0,16567897801),(106,'finance','nance',0,17678906702),(107,'manager','ager',0,18789018703),(108,'marketing','keting',0,19890120104),(109,'password','word',0,20901239005),(110,'postmaster','master',0,11123451107),(111,'abc2','abc',0,13123453407),(112,'xyz','xyz',12,33333333302),(134,'example1','1234',0,12475964704),(135,'apple2','apple',0,12475967509),(146,'checking','1234',0,44444444436);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(45) DEFAULT NULL,
  `productType` varchar(45) DEFAULT NULL,
  `details` varchar(45) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `modelNumber` int(11) DEFAULT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Dell Inspiron','Electronics','15.6 inch',549.99,1001),(2,'HP mouse','Electronics','Optical',9.25,1001),(3,'Game of Thrones','Books','George RR Martin',20.25,2001),(4,'Database System Design','Books','Ullman Molina',19.49,2001),(5,'Adidas Shoes','Footwear','Studded Sole Climawear',24.99,1001),(6,'Contigo Water Bottle','Home & Kitchen','Hitech drinking apparatus',15.99,1001),(7,'Saute Pan','Home & Kitchen','non stick ',45.99,2001),(8,'Chef\'s Knife','Home & Kitchen','Razor sharp',12.99,3001),(9,'Playdoh','Toy','flexible non-toxic colorful',12.99,1001),(10,'Stapler','Office Supplies','highly durable',5.99,1001),(11,'Dell Inspiron','Electronics','12 inch',345.00,1002),(12,'Men\'s Denim','Clothing','Regular fit',19.99,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchasedate`
--

DROP TABLE IF EXISTS `purchasedate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchasedate` (
  `purchaseID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `dateOfPurchase` date NOT NULL,
  `TotalPrice` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`purchaseID`,`customerID`),
  KEY `customerID_pd_idx` (`customerID`),
  CONSTRAINT `customerID_pd` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchasedate`
--

LOCK TABLES `purchasedate` WRITE;
/*!40000 ALTER TABLE `purchasedate` DISABLE KEYS */;
INSERT INTO `purchasedate` VALUES (1,102,'2015-11-23',NULL),(1,103,'2015-10-11',NULL),(1,104,'2015-10-18',NULL),(1,112,'2015-12-10',664.00),(2,102,'2015-11-15',NULL),(2,103,'2015-11-11',NULL),(2,112,'2015-12-10',590.00),(3,112,'2015-12-10',1650.00),(4,112,'2015-12-10',38.00),(5,112,'2015-12-10',550.00),(6,112,'2015-12-10',1100.00),(7,112,'2015-12-13',550.00),(8,112,'2015-12-13',550.00),(9,112,'2015-12-14',1019.00),(10,112,'2015-12-14',1019.00),(11,112,'2015-12-16',86.22),(12,112,'2015-12-16',1253.92);
/*!40000 ALTER TABLE `purchasedate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchasequantity`
--

DROP TABLE IF EXISTS `purchasequantity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchasequantity` (
  `purchaseID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`purchaseID`,`customerID`,`productID`),
  KEY `productID_pq_idx` (`productID`),
  CONSTRAINT `customerID_pq` FOREIGN KEY (`purchaseID`, `customerID`) REFERENCES `purchasedate` (`purchaseID`, `customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `productID_pq` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchasequantity`
--

LOCK TABLES `purchasequantity` WRITE;
/*!40000 ALTER TABLE `purchasequantity` DISABLE KEYS */;
INSERT INTO `purchasequantity` VALUES (1,102,5,5),(1,102,6,4),(1,103,6,3),(1,104,2,8),(1,112,1,1),(1,112,4,2),(1,112,5,3),(2,102,6,4),(2,103,8,2),(2,112,1,1),(2,112,3,1),(2,112,4,1),(3,112,1,3),(4,112,8,2),(4,112,10,2),(5,112,1,1),(6,112,1,2),(7,112,1,1),(8,112,1,1),(9,112,1,1),(9,112,2,1),(9,112,3,1),(9,112,4,1),(9,112,6,1),(9,112,7,1),(9,112,8,1),(9,112,11,1),(10,112,1,1),(10,112,2,1),(10,112,3,1),(10,112,4,1),(10,112,6,1),(10,112,7,1),(10,112,8,1),(10,112,11,1),(11,112,2,1),(11,112,5,1),(11,112,7,1),(11,112,10,1),(12,112,1,2),(12,112,2,4),(12,112,4,6);
/*!40000 ALTER TABLE `purchasequantity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'retailpurchase'
--
/*!50003 DROP PROCEDURE IF EXISTS `get_totalprice` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_totalprice`(IN custID int, IN purchid int)
BEGIN
Select totalprice 
from purchasedate 
where purchaseid = purchid AND customerid = custID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_bankname` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_bankname`(IN nameofbank varchar(45))
BEGIN
Insert into banks(bankName) values(nameofbank);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `login_check` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `login_check`(IN user varchar(45), IN pass varchar(45))
BEGIN
select customerID, numberOfPurchases 
from customer 
where password= pass AND username= user;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `order_history` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `order_history`(IN custID int, IN purchid int)
BEGIN
Select purchasequantity.productID, productName, productType, Quantity, (price*Quantity) as Price
From purchasequantity join product 
on (purchasequantity.productID = product.productID) 
where customerID = custID AND purchaseID = purchid;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-16  2:52:29
