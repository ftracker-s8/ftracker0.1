-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: id3203367_s8ftracker_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `ammount` double NOT NULL,
  `owner_id` int(11) NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `account_desc` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'IBAN:',
  PRIMARY KEY (`account_id`),
  KEY `fk_owner_id_idx` (`owner_id`),
  CONSTRAINT `fk_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'cash',0,1,'&eu','IBAN:'),(2,'cash',0,14,'&eu','IBAN:'),(11,'cash',201,26,'&eu','IBAN: 333'),(12,'RBBank',203.5,26,'&eu','IBAN: 222'),(13,'Balbunk',72.43,26,'&eu','IBAN: 111'),(18,'Goliamata',3441,26,'&eu','big desc');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `budget`
--

DROP TABLE IF EXISTS `budget`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budget` (
  `budget_id` int(11) NOT NULL AUTO_INCREMENT,
  `bud_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `bud_category` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `bud_desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`budget_id`),
  KEY `fk_bud_user_idx` (`owner_id`),
  KEY `fk_bud_cat_idx` (`bud_category`),
  CONSTRAINT `fk_bud_cat` FOREIGN KEY (`bud_category`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bud_user` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `budget`
--

LOCK TABLES `budget` WRITE;
/*!40000 ALTER TABLE `budget` DISABLE KEYS */;
/*!40000 ALTER TABLE `budget` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `icon_url` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `color` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `category_desc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Family','family.png','green','safds'),(2,'Food & Drinks','food.png','red','kkkkkk'),(3,'Travel','travel.png','yellow','dddd'),(4,'Entertainment','entert.png','red','cccc'),(5,'Healt','healt.png','blue','vvvv'),(6,'Kid','kid.png','blue','gggg'),(7,'House','house.png','blue','qqqqqqq'),(8,'Sport','sport.png','green','hhhhh'),(9,'Rent','house.png','#ffff00','aaaaa'),(11,'default','default.png','#dddddd','default');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `recurent_bill` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `fk_trans_accounts_idx` (`account_id`),
  KEY `fk_trans_categories_idx` (`category_id`),
  CONSTRAINT `fk_trans_accounts` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_trans_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'2017-10-20 20:09:35',11,50,'buy',1,'pantofi',0,0);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_categories`
--

DROP TABLE IF EXISTS `user_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_categories` (
  `uc_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_cat_name` varchar(24) NOT NULL,
  `user_cat_icon` varchar(45) NOT NULL DEFAULT 'placeholder.png',
  `user_cat_color` varchar(11) NOT NULL,
  `user_cat_desc` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`uc_id`),
  KEY `fk_usrcat_userid_idx` (`user_id`),
  CONSTRAINT `fk_usrcat_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_categories`
--

LOCK TABLES `user_categories` WRITE;
/*!40000 ALTER TABLE `user_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `user_pic` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '../uploads/placeholder.jpg',
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@admin.dev','a66df261120b6c2311c6ef0b1bab4e583afcbcc0','admin','admin','../uploads/placeholder.jpg',1,'2017-10-16 20:41:41',0),(9,'test5@test5.dev','911ddc3b8f9a13b5499b6bc4638a2b4f3f68bf23','Nametest5','Familytest5','../uploads/placeholder.jpg',1,'2017-10-17 21:41:43',0),(10,'userone@test.dev','52281b81fb6a6037c9e0b42369f062236bd93e86','userOne','familyOne','../uploads/placeholder.jpg',1,'2017-10-17 21:57:49',0),(14,'test31@test.com','5293da0e0a7bfc32bf8bf6ba98b4d4dac0bc6c10','test31','','../uploads/placeholder.jpg',1,'2017-10-18 22:29:40',0),(22,'test43@test.com','2eee3e280033103efd95a2bd1bcf150acb0c62e0','test43','test43','../uploads/placeholder.jpg',1,'2017-10-19 08:20:55',0),(24,'test20@test.com','57e5a4df68387d1d97210cf40c41104ce9256cf6','test20','20test','../uploads/placeholder.jpg',1,'2017-10-19 08:32:43',0),(25,'test22@test.com','8e59a08ba401da8aedd958b3a65c2d8e70dc8da2','test22','test22','../uploads/placeholder.jpg',1,'2017-10-19 08:38:15',0),(26,'test30@test.com','f6ebefa3fcf47cdc0eb801265d1d2dabcfc4fff6','test30','30test30','../uploads/26-profile.jpg',1,'2017-10-19 13:19:18',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-23 12:25:30
