-- MySQL dump 10.14  Distrib 5.5.60-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: mm_content
-- ------------------------------------------------------
-- Server version	5.5.60-MariaDB

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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `clientID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(50) NOT NULL,
  `clientName` varchar(100) NOT NULL,
  `clientDesc` varchar(255) DEFAULT NULL,
  `telephoneNo` varchar(30) NOT NULL,
  `postalAddress` varchar(100) DEFAULT NULL,
  `physicalAddress` varchar(100) DEFAULT NULL,
  `emailAddress` varchar(200) NOT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '2',
  `activityHistory` text,
  `insertedBy` int(11) NOT NULL DEFAULT '0',
  `dateCreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` int(11) NOT NULL DEFAULT '0',
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`clientID`),
  UNIQUE KEY `clientName_UNIQUE` (`clientName`),
  UNIQUE KEY `uuid_2` (`uuid`),
  KEY `uuid` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='This table stores our clientsâ€™ information. A client is an';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'343etr','SYSTEM ADMINISTRATION CLIENT','System administration account, should not be listed in any drop-down or grids under client tools','00000','00000','Nairobi','bot@bot.com',1,'1|2|2013-04-19 15:00:00',1,'2013-04-19 15:00:00',1,'2018-11-03 02:27:55'),(14,'','george',NULL,'',NULL,NULL,'ggatuma@gmail.com',1,NULL,0,'2019-02-08 12:44:11',0,'2019-04-25 02:29:16'),(22,'cebd342f3a9a4','Alfretgg','mfytnfynft tebsvdrtmyu,nttrer','056544434458','Mishebag','208','mislyuyihebalfred@gmail.com',1,NULL,1,'2019-04-26 13:53:20',1,'2019-04-26 04:53:20'),(23,'f2ca4e0a34a8e','Capuchin TV','Capuchin TV','0755111222','','Nairobi','ktaka@enableit.co.ke',1,NULL,1,'2019-05-15 16:19:47',1,'2019-05-15 13:19:47'),(24,'3a2eb78dd219b','SOHO Consultants','SOHO Consultants','0755111222','1-GPO','Nairobi','ktaka@enableit.co.ke',1,NULL,1,'2019-05-15 16:29:18',1,'2019-05-15 13:29:18');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `contentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clientID` int(10) unsigned NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `contentName` text NOT NULL,
  `price` int(50) unsigned NOT NULL,
  `shortCode` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `originalFileName` varchar(50) DEFAULT NULL,
  `generatedFileName` varchar(50) DEFAULT NULL,
  `updatedBy` int(11) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(3) NOT NULL DEFAULT '2',
  `dateCreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `insertedBy` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`contentID`),
  UNIQUE KEY `keyword` (`keyword`),
  UNIQUE KEY `keyword_2` (`keyword`),
  KEY `fk_cServices_insertedBy` (`insertedBy`),
  KEY `fk_cServices_updatedBy` (`updatedBy`),
  KEY `clientID` (`clientID`),
  CONSTRAINT `content_ibfk_1` FOREIGN KEY (`clientID`) REFERENCES `clients` (`clientID`),
  CONSTRAINT `content_ibfk_2` FOREIGN KEY (`insertedBy`) REFERENCES `users` (`userID`),
  CONSTRAINT `content_ibfk_3` FOREIGN KEY (`updatedBy`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,14,'Buma','1_1_1556524370.109.mp3',566,'','',NULL,NULL,1,2,'2019-04-29 10:52:50','2019-04-30 08:17:44',1),(2,14,'DFDF','1_1_1556542527.5733.mp3',34,'','sxcd xwqwxwec dwqcqc',NULL,NULL,1,2,'2019-04-29 15:55:27','2019-04-30 08:17:44',1),(3,14,'gfgd','1_1_1556542693.9632.mp3',578,'3040','XRUIYHJNJ YTJLN 90-[;',NULL,NULL,1,2,'2019-04-29 15:58:13','2019-05-02 06:32:55',1),(4,14,'sdscefr','1_1_1556545546.5901.mp3',234,'3040','swdee3vgt4hy',NULL,NULL,1,2,'2019-04-29 16:45:46','2019-05-02 06:33:06',1),(5,14,'Brand','14_14_1556623573.7712.mp3',300,'3040','vdsvdsbkdhjfdn d u',NULL,NULL,25,2,'2019-04-30 14:26:13','2019-05-02 06:33:12',25),(6,1,'ghy','1_1_1556628277.0751.mp3',678,'3040','\'oih/puidfdtygoi',NULL,NULL,1,2,'2019-04-30 15:44:37','2019-05-02 06:33:18',1),(7,14,'jkl','1_1_1556628547.3739.mp3',77,'','fgfdfdr',NULL,NULL,1,2,'2019-04-30 15:49:07','2019-04-30 08:17:44',1),(11,14,'dfgd','1_1_1556631056.3004.mp3',344,'','fdfds',NULL,NULL,1,2,'2019-04-30 16:30:56','2019-04-30 08:17:44',1),(12,14,'asdf','14_14_1556631066.9227.mp3',2345,'','werty',NULL,NULL,25,2,'2019-04-30 16:31:06','2019-04-30 08:17:44',25),(13,14,'ads','14_14_1556631114.7425.mp3',200,'','popo pop poipo',NULL,NULL,25,2,'2019-04-30 16:31:54','2019-04-30 08:17:44',25),(14,14,'rewq','1_1_1556631149.9361.mp3',400,'','hjkg',NULL,NULL,1,2,'2019-04-30 16:32:29','2019-04-30 08:17:44',1),(15,14,'rtryue','14_14_1556632236.5804.mp3',566,'','dsdafsd',NULL,NULL,25,2,'2019-04-30 16:50:36','2019-04-30 08:17:44',25),(16,22,'yuiop','1_1_1556632467.4473.mp3',45543,'','12343547758745',NULL,NULL,1,2,'2019-04-30 16:54:27','2019-04-30 08:17:44',1),(17,14,'ertt','14_14_1556632582.5891.mp3',232,'','wqerer',NULL,NULL,25,2,'2019-04-30 16:56:22','2019-04-30 08:17:44',25),(18,22,'ewretr','1_1_1556632620.9571.mp3',3343,'','dqeqwdewr',NULL,NULL,1,2,'2019-04-30 16:57:00','2019-04-30 08:17:44',1),(19,14,'sdw','1_1_1556632674.0884.mp3',334,'','sdeer43',NULL,NULL,1,2,'2019-04-30 16:57:54','2019-04-30 08:17:44',1),(22,14,'test','14_14_1556635018.178.mp3',22,'','test',NULL,NULL,25,2,'2019-04-30 17:36:58','2019-04-30 08:36:58',25),(23,14,'gfhr','Misheba',455,'','dfhbdscycytfyas','01_Raccoon_Song.mp3','14_14_1556729489.3019.mp3',25,2,'2019-05-01 19:51:29','2019-05-01 10:51:29',25),(24,14,'dad','saa',566,'3434','eqrtosc','01_Raccoon_Song.mp3','1_1_1556885582.7063.mp3',1,2,'2019-05-03 15:13:02','2019-05-03 06:13:02',1),(25,14,'dhhgnjf','ddx',566,'hdkjutf','dgfmjjyfdewfdfg','01_Raccoon_Song.mp3','14_14_1557137214.5584.mp3',25,1,'2019-05-06 12:06:54','2019-05-06 03:06:54',25),(26,14,'Bumma','ddx',566,'hdkjutf','yhtyrew','01_Raccoon_Song.mp3','14_14_1557138626.2797.mp3',25,1,'2019-05-06 12:30:26','2019-05-06 03:30:26',25),(27,14,'DAA','Drink',200,'3434','Its Good Content.','01_Raccoon_Song.mp3','1_1_1557923395.823.mp3',1,1,'2019-05-15 15:29:55','2019-05-15 12:29:55',1),(28,14,'Taarifa','News',150,'2020','Its Informational Song','01_Raccoon_Song.mp3','1_1_1558081278.3454.mp3',1,1,'2019-05-17 11:21:18','2019-05-17 08:21:18',1),(29,14,'Grand','GrandShow',103,'3211','The Show','01_Raccoon_Song.mp3','1_1_1558081770.2738.mp3',1,1,'2019-05-17 11:29:30','2019-05-17 08:29:30',1),(30,24,'SKIZA','Rhumba',60,'2020','Skiza Music','01_Raccoon_Song.mp3','24_24_1558084665.7691.mp3',34,1,'2019-05-17 12:17:45','2019-05-17 09:17:45',34);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloads` (
  `downloadsID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clientID` int(10) unsigned NOT NULL,
  `contentName` varchar(50) NOT NULL,
  `orderID` int(10) unsigned NOT NULL,
  `downloads` varchar(50) NOT NULL,
  `MSISDN` bigint(20) unsigned NOT NULL,
  `uuid` varchar(50) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `dateCreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `insertedBy` int(11) unsigned NOT NULL DEFAULT '0',
  `updatedBy` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`downloadsID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloads`
--

LOCK TABLES `downloads` WRITE;
/*!40000 ALTER TABLE `downloads` DISABLE KEYS */;
INSERT INTO `downloads` VALUES (1,0,'Brand',2,'http://localhost/d/8823be06013c4',254726742902,'8823be06013c4',1,'0000-00-00 00:00:00','2019-05-04 06:12:00',0,0),(2,0,'Brand',2,'http://localhost/d/4dd598bd484af',254726742902,'4dd598bd484af',1,'0000-00-00 00:00:00','2019-05-04 07:03:05',0,0),(3,0,'Brand',2,'http://localhost/d/7b9471edab10b',254726742902,'7b9471edab10b',1,'0000-00-00 00:00:00','2019-05-04 07:04:10',0,0),(4,0,'Brand',2,'http://localhost/d/26eb6a06edc67',254726742902,'26eb6a06edc67',1,'0000-00-00 00:00:00','2019-05-04 07:10:48',0,0),(5,0,'Brand',2,'http://localhost/d/2d3974e82ce1b',254726742902,'2d3974e82ce1b',1,'0000-00-00 00:00:00','2019-05-04 07:13:54',0,0),(6,0,'Brand',2,'http://localhost/d/c95de5b795391',254726742902,'c95de5b795391',1,'0000-00-00 00:00:00','2019-05-04 07:14:34',0,0),(7,0,'Brand',2,'http://localhost/d/cc4c43c35f902',254726742902,'cc4c43c35f902',1,'0000-00-00 00:00:00','2019-05-04 07:35:56',0,0),(8,14,'Brand',1,'http://localhost/d/d083f9a565392',254726742902,'d083f9a565392',1,'2019-05-06 12:04:54','2019-05-06 03:04:54',0,0),(9,14,'Brand',1,'http://localhost/d/f0fec7196f627',254726742902,'f0fec7196f627',1,'2019-05-06 12:12:36','2019-05-06 03:12:36',0,0),(10,14,'Brand',1,'http://localhost/d/ea57584f135f0',254726742902,'ea57584f135f0',1,'2019-05-06 12:15:03','2019-05-06 03:15:03',0,0),(11,14,'Brand',1,'http://localhost/d/b8cd5e77a90fe',254726742902,'b8cd5e77a90fe',1,'2019-05-06 12:28:50','2019-05-06 03:28:50',0,0),(12,14,'Brand',1,'http://localhost/d/965b5bb6fbb91',254726742902,'965b5bb6fbb91',1,'2019-05-06 14:54:57','2019-05-06 05:54:57',4294967295,4294967295),(13,14,'Brand',1,'http://localhost/d/4a28f132babff',254726742902,'4a28f132babff',1,'2019-05-06 14:55:21','2019-05-06 05:55:21',4294967295,4294967295),(14,14,'Brand',1,'http://localhost/d/1b6fe7d4fa5ba',254726742902,'1b6fe7d4fa5ba',1,'2019-05-09 12:04:01','2019-05-09 03:04:01',4294967295,4294967295),(15,14,'Brand',1,'http://localhost/d/8d3390594a55c',254726742902,'8d3390594a55c',1,'2019-05-09 12:05:02','2019-05-09 03:05:02',4294967295,4294967295),(16,14,'Brand',1,'http://localhost/d/abbef23bf76ba',254726742902,'abbef23bf76ba',1,'2019-05-09 12:05:12','2019-05-09 03:05:12',4294967295,4294967295),(17,14,'Brand',1,'http://localhost/d/a47f1da5819dd',254726742902,'a47f1da5819dd',1,'2019-05-09 12:05:45','2019-05-09 03:05:45',4294967295,4294967295),(18,14,'Brand',1,'http://localhost/d/fabc953448cd8',254726742902,'fabc953448cd8',1,'2019-05-09 12:12:40','2019-05-09 03:12:40',4294967295,4294967295),(19,14,'Brand',1,'http://localhost/d/eca9bd5e595d5',254726742902,'eca9bd5e595d5',1,'2019-05-09 12:40:22','2019-05-09 03:40:22',4294967295,4294967295),(20,14,'Brand',1,'http://localhost/d/6fe9379ffbe42',254726742902,'6fe9379ffbe42',1,'2019-05-09 14:40:44','2019-05-09 05:40:44',4294967295,4294967295),(21,14,'Brand',1,'http://localhost/d/e3da70eaa103c',254726742902,'e3da70eaa103c',1,'2019-05-09 14:41:07','2019-05-09 05:41:07',4294967295,4294967295),(22,14,'Brand',1,'http://localhost/d/c1e2950cb988e',254726742902,'c1e2950cb988e',1,'2019-05-09 14:42:50','2019-05-09 05:42:50',4294967295,4294967295),(23,14,'Brand',1,'http://localhost/d/7dbc79ae8907a',254726742902,'7dbc79ae8907a',1,'2019-05-09 15:18:24','2019-05-09 09:18:24',4294967295,4294967295),(24,14,'Brand',1,'http://localhost/d/fb0ca90ea215c',254726742902,'fb0ca90ea215c',1,'2019-05-09 15:32:15','2019-05-09 09:32:15',4294967295,4294967295),(25,14,'Brand',1,'http://localhost/d/92268f76b0001',254726742902,'92268f76b0001',1,'2019-05-09 15:35:15','2019-05-09 09:35:15',4294967295,4294967295),(26,14,'Brand',1,'http://localhost/d/887fb3bc7d20c',254726742902,'887fb3bc7d20c',1,'2019-05-09 16:44:37','2019-05-09 10:44:37',4294967295,4294967295),(27,14,'Brand',1,'http://localhost/d/0076aa37ef269',254726742902,'0076aa37ef269',1,'2019-05-09 16:47:54','2019-05-09 10:47:54',4294967295,4294967295),(28,14,'Brand',13,'http://localhost/d/437d3af9dff6c',254704716989,'437d3af9dff6c',1,'2019-05-16 14:07:07','2019-05-16 08:07:07',4294967295,4294967295),(29,14,'Brand',13,'http://localhost/d/2efef4f7f5265',254704716989,'2efef4f7f5265',1,'2019-05-16 14:07:26','2019-05-16 08:07:26',4294967295,4294967295),(30,14,'Brand',13,'http://localhost/d/dd49610b4d780',254704716989,'dd49610b4d780',1,'2019-05-16 14:09:02','2019-05-16 08:09:02',4294967295,4294967295),(31,14,'Brand',13,'http://localhost/d/0974c910ed75a',254704716989,'0974c910ed75a',1,'2019-05-16 14:13:11','2019-05-16 08:13:11',4294967295,4294967295),(32,14,'Brand',14,'http://localhost/d/6747830ca369c',254704716989,'6747830ca369c',1,'2019-05-16 16:01:47','2019-05-16 13:01:47',4294967295,4294967295),(33,14,'Brand',19,'http://localhost/d/80b001f153a06',254704716989,'80b001f153a06',1,'2019-05-16 17:06:04','2019-05-16 14:06:04',4294967295,4294967295),(34,24,'SKIZA',23,'http://localhost/d/7a413eec51e0e',254704716989,'7a413eec51e0e',1,'2019-05-17 12:25:21','2019-05-17 09:25:21',4294967295,4294967295),(35,24,'SKIZA',23,'http://localhost/d/978ab2acdff36',254704716989,'978ab2acdff36',1,'2019-05-17 12:31:25','2019-05-17 09:31:25',4294967295,4294967295),(36,24,'SKIZA',29,'http://localhost/d/59c09bfab2268',254704716989,'59c09bfab2268',1,'2019-05-17 14:53:19','2019-05-17 11:53:19',4294967295,4294967295),(37,24,'SKIZA',29,'http://localhost/d/d0ae66fffa9dc',254704716989,'d0ae66fffa9dc',1,'2019-05-17 15:19:27','2019-05-17 12:19:27',4294967295,4294967295),(38,14,'test',36,'http://localhost/d/505ed44fdf2d2',254726742902,'505ed44fdf2d2',1,'2019-05-21 05:52:34','2019-05-21 02:52:34',1,1);
/*!40000 ALTER TABLE `downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `groupID` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `groupTypeID` int(5) unsigned NOT NULL,
  `groupName` varchar(45) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `active` tinyint(3) NOT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `dateModified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`groupID`),
  KEY `fk_groups_groupTypes` (`groupTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,1,'Super Admin [Full access]','Super Admins (Full access)',1,'2013-04-19 11:51:06',1,'2018-06-27 02:16:06',1),(19,3,'testw','test',3,'2018-05-21 14:23:03',1,'2018-06-27 02:16:41',1),(20,3,'New Groupt','',1,'2018-06-27 14:09:16',1,'2018-06-27 05:09:16',1),(21,3,'Client-users','Client-users',1,'2018-06-28 13:20:22',1,'2018-06-28 04:20:22',1);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inMessages`
--

DROP TABLE IF EXISTS `inMessages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inMessages` (
  `messageID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `clientID` int(50) unsigned NOT NULL,
  `shortCode` int(50) unsigned NOT NULL,
  `messageContent` text,
  `MSISDN` bigint(20) unsigned NOT NULL,
  `messageStatusID` tinyint(3) unsigned NOT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `dateCreated` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `createdBy` int(11) unsigned NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int(11) unsigned NOT NULL,
  PRIMARY KEY (`messageID`),
  KEY `clientID` (`clientID`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inMessages`
--

LOCK TABLES `inMessages` WRITE;
/*!40000 ALTER TABLE `inMessages` DISABLE KEYS */;
INSERT INTO `inMessages` VALUES (1,14,3040,'Brand',254704716989,0,1,'2019-05-09 11:36:47',4294967295,'2019-05-09 02:36:47',4294967295),(2,14,3040,'Brand',254704716989,0,1,'2019-05-09 11:41:08',4294967295,'2019-05-09 02:41:08',4294967295),(3,14,3040,'Brand',254704716989,0,1,'2019-05-09 12:11:40',4294967295,'2019-05-09 03:11:40',4294967295),(4,14,3040,'Brand',254704716989,0,1,'2019-05-09 12:12:34',4294967295,'2019-05-09 03:12:34',4294967295),(5,14,3040,'Brand',254704716989,0,1,'2019-05-09 12:22:20',4294967295,'2019-05-09 03:22:20',4294967295),(6,14,3040,'Brand',254704716989,0,1,'2019-05-09 12:28:11',4294967295,'2019-05-09 03:28:11',4294967295),(7,14,3040,'Brand',254704716989,0,1,'2019-05-09 12:40:18',4294967295,'2019-05-09 03:40:18',4294967295),(8,14,3040,'Brand',254704716989,0,1,'2019-05-09 14:41:02',4294967295,'2019-05-09 05:41:02',4294967295),(9,14,3040,'Brand',254704716989,0,1,'2019-05-09 15:18:32',4294967295,'2019-05-09 09:18:32',4294967295),(10,14,3040,'Brand',254704716989,0,1,'2019-05-09 15:31:46',4294967295,'2019-05-09 09:31:46',4294967295),(11,14,3040,'Brand',254704716989,0,1,'2019-05-09 15:35:19',4294967295,'2019-05-09 09:35:19',4294967295),(12,14,3040,'Brand',254704716989,0,1,'2019-05-09 15:46:22',4294967295,'2019-05-09 09:46:22',4294967295),(13,14,3040,'Brand',254704716989,0,1,'2019-05-09 15:46:26',4294967295,'2019-05-09 09:46:26',4294967295),(14,14,3040,'Brand',254704716989,0,1,'2019-05-09 15:51:33',4294967295,'2019-05-09 09:51:33',4294967295),(15,14,3040,'Brand',254704716989,0,1,'2019-05-10 11:44:36',4294967295,'2019-05-10 05:44:36',4294967295),(16,14,3040,'Brand',254704716989,0,1,'2019-05-14 13:56:03',4294967295,'2019-05-14 07:56:03',4294967295),(17,14,3040,'Brand',254704716989,0,1,'2019-05-15 16:00:12',4294967295,'2019-05-15 13:00:12',4294967295),(18,14,3040,'Brand',254704716989,0,1,'2019-05-15 16:00:55',4294967295,'2019-05-15 13:00:55',4294967295),(19,0,3040,'Bran',254704716989,0,1,'2019-05-15 16:01:40',4294967295,'2019-05-15 13:01:40',4294967295),(20,0,3040,'Bran',254704716989,0,1,'2019-05-15 16:35:55',4294967295,'2019-05-15 13:35:55',4294967295),(21,0,3040,'Bran',254704716989,0,1,'2019-05-15 16:37:17',4294967295,'2019-05-15 13:37:17',4294967295),(22,0,3040,'Bran',254704716989,0,1,'2019-05-15 16:38:46',4294967295,'2019-05-15 13:38:46',4294967295),(23,0,3040,'Bran',254704716989,0,1,'2019-05-15 16:41:30',4294967295,'2019-05-15 13:41:30',4294967295),(24,0,3040,'Bran',254704716989,0,1,'2019-05-15 16:42:56',4294967295,'2019-05-15 13:42:56',4294967295),(25,14,3040,'Brand',254704716989,0,1,'2019-05-15 16:43:38',4294967295,'2019-05-15 13:43:38',4294967295),(26,14,3040,'Brand',254704716989,0,1,'2019-05-15 16:44:35',4294967295,'2019-05-15 13:44:35',4294967295),(27,14,3040,'Brand',254704716989,0,1,'2019-05-15 16:44:53',4294967295,'2019-05-15 13:44:53',4294967295),(28,14,3040,'Brand',254704716989,0,1,'2019-05-15 16:54:48',4294967295,'2019-05-15 13:54:48',4294967295),(29,14,3040,'Brand',254704716989,0,1,'2019-05-15 16:54:51',4294967295,'2019-05-15 13:54:51',4294967295),(30,14,3040,'Brand',254704716989,0,1,'2019-05-15 16:59:00',4294967295,'2019-05-15 13:59:00',4294967295),(31,14,3040,'Brand',254704716989,0,1,'2019-05-15 16:59:29',4294967295,'2019-05-15 13:59:29',4294967295),(32,14,3040,'Brand',254704716989,0,1,'2019-05-16 10:32:16',4294967295,'2019-05-16 07:32:16',4294967295),(33,14,3040,'Brand',254704716989,0,1,'2019-05-16 10:41:07',4294967295,'2019-05-16 07:41:07',4294967295),(34,14,3040,'Brand',254704716989,0,1,'2019-05-16 11:05:07',4294967295,'2019-05-16 08:05:07',4294967295),(35,14,3040,'Brand',254704716989,0,1,'2019-05-16 11:07:01',4294967295,'2019-05-16 08:07:01',4294967295),(36,14,3040,'Brand',254704716989,0,1,'2019-05-16 12:06:35',4294967295,'2019-05-16 09:06:35',4294967295),(37,14,3040,'Brand',254704716989,0,1,'2019-05-16 15:24:14',4294967295,'2019-05-16 12:24:14',4294967295),(38,0,3040,'Grand',254704716989,0,1,'2019-05-16 16:05:40',4294967295,'2019-05-16 13:05:40',4294967295),(39,14,3040,'brand',254704716989,0,1,'2019-05-16 16:06:48',4294967295,'2019-05-16 13:06:48',4294967295),(40,14,3040,'brand',254704716989,0,1,'2019-05-16 16:07:21',4294967295,'2019-05-16 13:07:21',4294967295),(41,14,3040,'brand',254704716989,0,1,'2019-05-16 16:11:06',4294967295,'2019-05-16 13:11:06',4294967295),(42,14,3040,'brand',254704716989,0,1,'2019-05-16 16:34:32',4294967295,'2019-05-16 13:34:32',4294967295),(43,14,3040,'Brand',254704716989,0,1,'2019-05-16 17:03:43',4294967295,'2019-05-16 14:03:43',4294967295),(44,14,3040,'brand',254704716989,0,1,'2019-05-16 17:10:35',4294967295,'2019-05-16 14:10:35',4294967295),(45,14,3040,'Brand',254704716989,0,1,'2019-05-16 17:40:14',4294967295,'2019-05-16 14:40:14',4294967295),(46,14,3040,'Brand',254704716989,0,1,'2019-05-16 17:47:34',4294967295,'2019-05-16 14:47:34',4294967295),(47,0,3040,'Brddddand',254704716989,0,1,'2019-05-16 17:58:07',4294967295,'2019-05-16 14:58:07',4294967295),(48,0,3040,'Brddddand',254704716989,0,1,'2019-05-16 21:48:25',4294967295,'2019-05-16 18:48:25',4294967295),(50,24,3040,'SKIZA',254704716989,0,1,'2019-05-17 12:19:52',4294967295,'2019-05-17 09:19:52',4294967295),(51,24,3040,'SKIZA',254704716989,0,1,'2019-05-17 14:19:33',4294967295,'2019-05-17 11:19:33',4294967295),(52,0,3040,'SKIZ',254704716989,0,1,'2019-05-17 14:21:50',4294967295,'2019-05-17 11:21:50',4294967295),(53,24,3040,'SKIZA',254704716989,0,1,'2019-05-17 14:22:41',4294967295,'2019-05-17 11:22:41',4294967295),(54,24,3040,'SKIZA',254704716989,0,1,'2019-05-17 14:22:51',4294967295,'2019-05-17 11:22:51',4294967295),(55,24,3040,'SKIZA',254704716989,0,1,'2019-05-17 14:42:41',4294967295,'2019-05-17 11:42:41',4294967295),(56,24,3040,'SKIZA',254704716989,0,1,'2019-05-17 14:43:09',4294967295,'2019-05-17 11:43:09',4294967295),(57,24,3040,'SKIZA',254704716989,0,1,'2019-05-17 14:47:00',4294967295,'2019-05-17 11:47:00',4294967295),(58,24,3040,'SKIZA',254704716989,0,1,'2019-05-17 14:47:16',4294967295,'2019-05-17 11:47:16',4294967295),(59,14,29777,'test',254726742902,0,1,'2019-05-21 04:42:18',1,'2019-05-21 01:42:18',1),(60,14,29777,'test',254726742902,0,1,'2019-05-21 04:52:32',1,'2019-05-21 01:52:32',1),(61,0,20660,'Cow',254726742902,0,1,'2019-05-21 05:27:15',1,'2019-05-21 02:27:15',1),(62,14,29777,'test',254726742902,0,1,'2019-05-21 05:45:17',1,'2019-05-21 02:45:17',1),(63,14,29777,'test',254726742902,0,1,'2019-05-21 05:50:14',1,'2019-05-21 02:50:14',1),(64,14,29777,'test',254726742902,0,1,'2019-05-21 05:51:13',1,'2019-05-21 02:51:13',1),(65,14,29777,'test',254726742902,0,1,'2019-05-21 05:52:21',1,'2019-05-21 02:52:21',1),(66,0,20660,'Nemis',254708175028,0,1,'2019-05-21 07:01:20',1,'2019-05-21 04:01:20',1);
/*!40000 ALTER TABLE `inMessages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `orderID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `clientID` int(10) unsigned NOT NULL DEFAULT '0',
  `MSISDN` bigint(20) NOT NULL,
  `contentID` int(50) unsigned NOT NULL,
  `messageID` int(50) unsigned NOT NULL,
  `payerNarration` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `checkoutRequestID` varchar(50) NOT NULL,
  `recieptNumber` varchar(50) NOT NULL,
  `mpesaAcknoledgementStatus` int(10) NOT NULL DEFAULT '2',
  `active` smallint(3) NOT NULL DEFAULT '2',
  `dateCreated` datetime NOT NULL,
  `dateModified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `insertedBy` int(11) unsigned DEFAULT NULL,
  `updatedBy` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `contentID` (`contentID`),
  KEY `messageID` (`messageID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,14,254704716989,5,2,'','Brand','','',2,1,'2019-05-09 11:41:08','2019-05-09 02:41:08',4294967295,NULL),(2,14,254704716989,5,4,'','Brand','','',2,1,'2019-05-09 12:12:34','2019-05-09 03:12:34',4294967295,NULL),(3,14,254704716989,5,6,'','Brand','','',2,1,'2019-05-09 12:28:11','2019-05-09 03:28:11',4294967295,NULL),(4,14,254704716989,5,7,'','Brand','','',2,1,'2019-05-09 12:40:18','2019-05-09 03:40:18',4294967295,NULL),(5,14,254704716989,5,8,'','Brand','','',2,1,'2019-05-09 14:41:02','2019-05-09 05:41:02',4294967295,NULL),(6,14,254704716989,5,9,'','Brand','','',2,1,'2019-05-09 15:18:32','2019-05-09 09:18:32',4294967295,NULL),(7,14,254704716989,5,10,'','Brand','','',2,1,'2019-05-09 15:31:46','2019-05-09 09:31:46',4294967295,NULL),(8,14,254704716989,5,11,'','Brand','','',2,1,'2019-05-09 15:35:19','2019-05-09 09:35:19',4294967295,NULL),(9,14,254704716989,5,12,'','Brand','','',2,1,'2019-05-09 15:46:22','2019-05-09 09:46:22',4294967295,NULL),(10,14,254704716989,5,13,'','Brand','','',2,1,'2019-05-09 15:46:26','2019-05-09 09:46:26',4294967295,NULL),(11,14,254704716989,5,14,'','Brand','','',2,1,'2019-05-09 15:51:33','2019-05-09 09:51:33',4294967295,NULL),(12,14,254704716989,5,15,'','Brand','','',2,1,'2019-05-10 11:44:36','2019-05-10 05:44:36',4294967295,NULL),(13,14,254704716989,5,16,'','Brand','ws_CO_DMZ_344880781_16052019125635907','10556-903962-1',1,1,'2019-05-16 12:56:19','2019-05-16 07:04:42',4294967295,NULL),(14,14,254704716989,5,37,'','Brand','ws_CO_DMZ_483483002_16052019152410970','9033-989962-1',1,1,'2019-05-16 15:24:14','2019-05-16 13:01:47',4294967295,NULL),(15,14,254704716989,5,39,'','brand','ws_CO_DMZ_483529726_16052019160644528','2812-989814-1',1,2,'2019-05-16 16:06:48','2019-05-16 13:06:50',4294967295,NULL),(16,14,254704716989,5,40,'','brand','','',2,2,'2019-05-16 16:07:21','2019-05-16 13:07:21',4294967295,NULL),(17,14,254704716989,5,41,'','brand','ws_CO_DMZ_483533890_16052019161102011','23265-1105585-1',1,3,'2019-05-16 16:11:06','2019-05-16 13:57:07',4294967295,NULL),(18,14,254704716989,5,42,'','brand','ws_CO_DMZ_345123041_16052019163431405','23259-1117826-1',1,3,'2019-05-16 16:34:32','2019-05-16 13:41:28',4294967295,NULL),(19,14,254704716989,5,43,'','Brand','ws_CO_DMZ_345160861_16052019170343291','21864-210567-1',1,3,'2019-05-16 17:03:43','2019-05-16 14:06:04',4294967295,NULL),(20,14,254704716989,5,44,'','brand','ws_CO_DMZ_345167895_16052019171034740','2816-1020846-1',1,1,'2019-05-16 17:10:35','2019-05-16 14:14:57',4294967295,NULL),(21,14,254704716989,5,45,'','Brand','ws_CO_DMZ_483634213_16052019174010083','21876-230483-1',1,2,'2019-05-16 17:40:14','2019-05-16 14:40:16',4294967295,NULL),(22,14,254704716989,5,46,'','Brand','ws_CO_DMZ_483644376_16052019174731233','9254-1192114-1',1,2,'2019-05-16 17:47:34','2019-05-16 14:47:37',4294967295,NULL),(23,24,254704716989,30,50,'','SKIZA','ws_CO_DMZ_346110766_17052019121949686','21872-684143-1',1,1,'2019-05-17 12:19:52','2019-05-17 09:25:21',4294967295,NULL),(24,24,254704716989,30,51,'','SKIZA','ws_CO_DMZ_484698385_17052019141927583','21876-748194-1',1,3,'2019-05-17 14:19:33','2019-05-17 11:19:53',4294967295,NULL),(25,24,254704716989,30,53,'','SKIZA','ws_CO_DMZ_346257787_17052019142237729','21873-749866-1',1,3,'2019-05-17 14:22:41','2019-05-17 11:23:49',4294967295,NULL),(26,24,254704716989,30,54,'','SKIZA','','',2,2,'2019-05-17 14:22:51','2019-05-17 11:22:51',4294967295,NULL),(27,24,254704716989,30,55,'','SKIZA','ws_CO_DMZ_346287639_17052019144237827','9031-1520948-1',1,3,'2019-05-17 14:42:41','2019-05-17 11:43:48',4294967295,NULL),(28,24,254704716989,30,56,'','SKIZA','','',2,2,'2019-05-17 14:43:09','2019-05-17 11:43:09',4294967295,NULL),(29,24,254704716989,30,57,'','SKIZA','ws_CO_DMZ_346292704_17052019144658362','9026-1522979-1',1,3,'2019-05-17 14:47:00','2019-05-17 12:20:26',4294967295,NULL),(30,24,254704716989,30,58,'','SKIZA','','',2,2,'2019-05-17 14:47:16','2019-05-17 11:47:16',4294967295,NULL),(31,14,254726742902,22,59,'','test','ws_CO_DMZ_350787332_21052019044205935','1027-899337-1',1,2,'2019-05-21 04:42:18','2019-05-21 01:42:20',1,NULL),(32,14,254726742902,22,60,'','test','ws_CO_DMZ_350789808_21052019045220073','25600-1020496-1',1,2,'2019-05-21 04:52:32','2019-05-21 01:52:34',1,NULL),(33,14,254726742902,22,62,'','test','ws_CO_DMZ_350801253_21052019054504918','9074-906506-1',1,2,'2019-05-21 05:45:17','2019-05-21 02:45:19',1,NULL),(34,14,254726742902,22,63,'','test','ws_CO_DMZ_489173496_21052019054958793','8472-1012245-1',1,2,'2019-05-21 05:50:14','2019-05-21 02:50:16',1,NULL),(35,14,254726742902,22,64,'','test','ws_CO_DMZ_350803012_21052019055100658','25600-1036837-1',1,2,'2019-05-21 05:51:13','2019-05-21 02:51:15',1,NULL),(36,14,254726742902,22,65,'','test','ws_CO_DMZ_350803348_21052019055208263','20371-1030780-1',1,1,'2019-05-21 05:52:21','2019-05-21 02:52:34',1,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outMessages`
--

DROP TABLE IF EXISTS `outMessages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outMessages` (
  `messageID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `clientID` int(50) unsigned NOT NULL,
  `ordersID` int(50) unsigned NOT NULL,
  `paymentID` int(50) unsigned NOT NULL,
  `contentName` varchar(50) NOT NULL,
  `downloadID` int(50) unsigned NOT NULL,
  `messageContent` text,
  `MSISDN` bigint(20) unsigned NOT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '2',
  `dateCreated` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `createdBy` int(11) unsigned NOT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int(11) unsigned NOT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outMessages`
--

LOCK TABLES `outMessages` WRITE;
/*!40000 ALTER TABLE `outMessages` DISABLE KEYS */;
INSERT INTO `outMessages` VALUES (2,14,1,47,'Brand',11,'Dear Customer, to download :Brand Content,click on this link here: http://localhost/d/b8cd5e77a90fe.Thank You.',254726742902,1,'2019-05-06 12:28:50',0,'2019-05-06 03:28:50',0),(3,14,1,51,'Brand',13,'Dear Customer, to download :Brand Content,click on this link here: http://localhost/d/4a28f132babff.Thank You.',254726742902,1,'2019-05-06 14:55:21',4294967295,'2019-05-06 05:55:21',4294967295),(4,14,1,56,'Brand',17,'Dear Customer, to download :Brand Content,click on this link here: http://localhost/d/a47f1da5819dd.Thank You.',254726742902,1,'2019-05-09 12:05:45',4294967295,'2019-05-09 03:05:45',4294967295),(5,14,1,57,'Brand',18,'Dear Customer, to download :Brand Content,click on this link here: http://localhost/d/fabc953448cd8.Thank You.',254726742902,1,'2019-05-09 12:12:40',4294967295,'2019-05-09 03:12:40',4294967295),(6,14,1,58,'Brand',19,'Dear Customer, to download :Brand Content,click on this link here: http://localhost/d/eca9bd5e595d5.Thank You.',254726742902,1,'2019-05-09 12:40:22',14,'2019-05-09 03:40:22',4294967295),(7,14,1,61,'Brand',22,'Dear Customer, to download :Brand Content,click on this link here: http://localhost/d/c1e2950cb988e.Thank You.',254726742902,1,'2019-05-09 14:42:50',14,'2019-05-09 05:42:50',4294967295),(8,14,1,66,'Brand',27,'Dear Customer, to download :Brand Content,click on this link here: http://localhost/d/0076aa37ef269.Thank You.',254726742902,1,'2019-05-09 16:47:54',14,'2019-05-09 10:47:54',4294967295),(10,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,0,'1970-01-01 00:00:00',0,'2019-05-16 07:07:02',0),(11,14,13,0,'Brand',31,'Dear Customer, to download :Brand Content,click on this link here: http://localhost/d/0974c910ed75a.Thank You.',254704716989,1,'2019-05-16 14:13:11',14,'2019-05-16 08:13:11',4294967295),(12,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 12:25:48',0),(13,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 12:57:02',0),(14,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 12:59:09',0),(15,14,14,0,'Brand',32,'Dear Customer, to download :Brand Content,click on this link here: http://localhost/d/6747830ca369c.Thank You.',254704716989,1,'2019-05-16 16:01:48',14,'2019-05-16 13:01:48',4294967295),(16,0,0,0,'',0,'Dear Customer.No Such Content.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 13:05:40',0),(17,0,0,0,'',0,'Dear Customer.There was an Error in Processing ur Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 13:07:23',0),(18,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 13:07:53',0),(19,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 13:12:54',0),(20,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 13:30:30',0),(21,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 13:35:00',0),(22,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 14:03:50',0),(23,14,19,0,'Brand',33,'Dear Customer, to download :Brand Content,click on this link here: http://localhost/d/80b001f153a06.Thank You.',254704716989,1,'2019-05-16 17:06:04',14,'2019-05-16 14:06:04',4294967295),(24,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 14:09:45',0),(25,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 14:11:53',0),(26,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 14:12:14',0),(27,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 14:13:39',0),(28,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 14:41:03',0),(29,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 14:47:54',0),(30,0,0,0,'',0,'Dear Customer.No Such Content.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 14:58:07',0),(31,0,0,0,'',0,'Dear Customer.No Such Content.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 18:48:25',0),(32,0,0,0,'',0,'Dear Customer.No Such Content.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-16 18:49:18',0),(33,24,23,0,'SKIZA',35,'Dear Customer, to download :SKIZA Content,click on this link here: http://localhost/d/978ab2acdff36.Thank You.',254704716989,1,'2019-05-17 12:31:25',24,'2019-05-17 09:31:25',4294967295),(34,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-17 11:19:53',0),(35,0,0,0,'',0,'Dear Customer.No Such Content.Please Check and Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-17 11:21:50',0),(36,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-17 11:22:54',0),(37,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'1970-01-01 00:00:00',0,'2019-05-17 11:23:49',0),(38,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 14:43:11',0,'2019-05-17 11:43:11',0),(39,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 14:43:48',0,'2019-05-17 11:43:48',0),(40,24,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 14:47:18',0,'2019-05-17 11:47:18',0),(41,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 14:48:16',0,'2019-05-17 11:48:16',0),(42,24,29,0,'SKIZA',36,'Dear Customer, to download :SKIZA Content,click on this link here: http://localhost/d/59c09bfab2268.Thank You.',254704716989,1,'2019-05-17 14:53:19',24,'2019-05-17 11:53:19',4294967295),(43,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 15:01:37',0,'2019-05-17 12:01:37',0),(44,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 15:02:57',0,'2019-05-17 12:02:57',0),(45,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 15:03:21',0,'2019-05-17 12:03:21',0),(46,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 15:05:09',0,'2019-05-17 12:05:09',0),(47,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 15:05:45',0,'2019-05-17 12:05:45',0),(48,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 15:12:40',0,'2019-05-17 12:12:40',0),(49,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 15:18:20',0,'2019-05-17 12:18:20',0),(50,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 15:18:56',0,'2019-05-17 12:18:56',0),(51,24,29,0,'SKIZA',37,'Dear Customer, to download :SKIZA Content,click on this link here: http://localhost/d/d0ae66fffa9dc.Thank You.',254704716989,1,'2019-05-17 15:19:27',24,'2019-05-17 12:19:27',4294967295),(52,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254704716989,2,'2019-05-17 15:20:26',0,'2019-05-17 12:20:26',0),(53,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254726742902,2,'2019-05-21 04:42:40',0,'2019-05-21 01:42:40',0),(54,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254726742902,2,'2019-05-21 04:53:40',0,'2019-05-21 01:53:40',0),(55,0,0,0,'',0,'Dear Customer.No Such Content.Please Check and Try Again',0,2,'2019-05-21 05:27:15',0,'2019-05-21 02:27:15',0),(56,0,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254726742902,2,'2019-05-21 05:45:40',0,'2019-05-21 02:45:40',0),(57,14,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254726742902,2,'2019-05-21 05:50:24',0,'2019-05-21 02:50:24',0),(58,14,0,0,'',0,'Dear Customer.There was an Error in Processing your Request.Please Try Again',254726742902,2,'2019-05-21 05:51:37',0,'2019-05-21 02:51:37',0),(59,14,36,0,'test',38,'Dear Customer, to download :test Content,click on this link here: http://localhost/d/505ed44fdf2d2.Thank You.',254726742902,1,'2019-05-21 05:52:35',14,'2019-05-21 02:52:35',1),(60,0,0,0,'',0,'Dear Customer.No Such Content.Please Check and Try Again',0,2,'2019-05-21 07:01:20',0,'2019-05-21 04:01:20',0);
/*!40000 ALTER TABLE `outMessages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passwordStatuses`
--

DROP TABLE IF EXISTS `passwordStatuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passwordStatuses` (
  `passwordStatusID` int(11) unsigned NOT NULL,
  `passwordStatus` varchar(60) NOT NULL,
  `insertedBy` int(11) unsigned DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `updatedBy` int(11) unsigned DEFAULT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`passwordStatusID`),
  UNIQUE KEY `passwordStatus` (`passwordStatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passwordStatuses`
--

LOCK TABLES `passwordStatuses` WRITE;
/*!40000 ALTER TABLE `passwordStatuses` DISABLE KEYS */;
INSERT INTO `passwordStatuses` VALUES (0,'NEW USER',1,'2013-07-05 10:11:29',1,'2013-07-05 01:11:29'),(1,'ACTIVE',1,'2013-07-05 10:11:29',1,'2013-07-05 01:11:29'),(2,'ONE-TIME',1,'2013-07-05 10:11:29',1,'2013-07-05 01:11:29'),(3,'LOCKED',1,'2013-07-05 10:11:29',1,'2013-07-05 01:11:29'),(4,'EXPIRED',1,'2013-07-05 10:11:29',1,'2013-07-05 01:11:29'),(5,'DORMANT',1,'2013-07-05 10:11:29',1,'2013-07-05 01:11:29'),(6,'DELETED USER',1,'2013-07-05 10:11:29',1,'2013-07-05 01:11:29'),(7,'RESET',1,'2013-07-05 10:11:29',1,'2013-07-05 01:11:29');
/*!40000 ALTER TABLE `passwordStatuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paybill`
--

DROP TABLE IF EXISTS `paybill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paybill` (
  `payNo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `paybillNo` varchar(50) NOT NULL,
  `clientID` int(10) unsigned NOT NULL,
  `passKey` varchar(50) NOT NULL,
  `consumerKey` varchar(50) NOT NULL,
  `consumerSecret` varchar(50) NOT NULL,
  `active` tinyint(4) DEFAULT '1',
  `dateActivated` datetime DEFAULT NULL,
  `insertedBy` int(11) NOT NULL DEFAULT '0',
  `dateCreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedBy` int(11) NOT NULL DEFAULT '0',
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`payNo`),
  UNIQUE KEY `paybillNo` (`paybillNo`),
  KEY `fk_apiUsers_clients1_idx` (`clientID`),
  KEY `clientID` (`clientID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paybill`
--

LOCK TABLES `paybill` WRITE;
/*!40000 ALTER TABLE `paybill` DISABLE KEYS */;
INSERT INTO `paybill` VALUES (1,'1234',14,'534','578','768TT7869f',0,NULL,0,'0000-00-00 00:00:00',0,'2019-05-17 07:56:38'),(3,'2342F',14,'534','578','768TT7869f',0,NULL,0,'0000-00-00 00:00:00',0,'2019-04-29 07:18:10'),(4,'2342R',14,'534','54678','REW544',0,NULL,0,'0000-00-00 00:00:00',0,'2019-04-29 07:19:54'),(7,'3435',14,'3434','6767','98765',1,NULL,1,'2019-05-15 15:31:39',1,'2019-05-17 08:47:46'),(10,'4040',24,'truttr','wteytre','wrtyre',1,NULL,34,'2019-05-17 12:38:25',34,'2019-05-17 09:38:25');
/*!40000 ALTER TABLE `paybill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `paymentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordersID` int(10) unsigned NOT NULL,
  `clientID` int(10) unsigned NOT NULL,
  `transactionID` varchar(50) NOT NULL,
  `contentName` varchar(50) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `MSISDN` bigint(20) unsigned NOT NULL,
  `receiptNumber` varchar(50) NOT NULL,
  `businessNumber` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `accountNumber` varchar(50) NOT NULL,
  `updatedBy` int(11) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(3) NOT NULL DEFAULT '2',
  `dateCreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `insertedBy` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`paymentID`),
  KEY `clientID_2` (`clientID`),
  KEY `contentName` (`contentName`),
  KEY `contentName_2` (`contentName`),
  KEY `MSISDN` (`MSISDN`),
  KEY `ordersID` (`ordersID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,1,14,'R67HRYTR','Brand','50.00',254726742902,'','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-15 04:29:31',4294967295),(2,1,14,'R67HRYTR','Brand','50.00',254726742902,'','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-15 04:43:29',4294967295),(3,1,14,'R67HRYTR','Brand','50.00',254726742902,'','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-16 09:24:28',4294967295),(4,1,14,'R67HRYTR','Brand','50.00',254726742902,'','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-16 12:26:49',4294967295),(5,1,14,'R67HRYTR','Brand','50.00',254726742902,'','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-16 14:04:41',4294967295),(6,1,14,'R67HRYTR','Brand','50.00',254726742902,'','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-16 14:39:46',4294967295),(7,1,14,'R67HRYTR','Brand','50.00',254726742902,'','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-16 14:39:55',4294967295),(8,23,24,'R67HRYTR','SKIZA','50.00',254726742902,'21872-684143-1','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-17 09:23:01',4294967295),(9,23,24,'R67HRYTR','SKIZA','50.00',254726742902,'21872-684143-1','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-17 11:13:52',4294967295),(10,23,24,'R67HRYTR','SKIZA','50.00',254726742902,'21872-684143-1','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-17 11:18:12',4294967295),(11,23,24,'R67HRYTR','SKIZA','50.00',254726742902,'21872-684143-1','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-17 11:19:09',4294967295),(12,23,24,'R67HRYTR','SKIZA','50.00',254726742902,'21872-684143-1','299708','COLLINS','MERU','WAIREGI','Pay Bill',4294967295,2,'2018-10-24 08:25:30','2019-05-17 11:51:08',4294967295);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusCodes`
--

DROP TABLE IF EXISTS `statusCodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statusCodes` (
  `statusCodeID` int(11) NOT NULL AUTO_INCREMENT,
  `statTypeID` int(11) NOT NULL,
  `statusCode` varchar(45) DEFAULT NULL,
  `statusCodeDesc` varchar(100) DEFAULT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '2',
  `dateCreated` datetime DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`statusCodeID`),
  KEY `fk_errorCodes_errorCategories1_idx` (`statTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='Table stores hub specific codes that denote particular state';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusCodes`
--

LOCK TABLES `statusCodes` WRITE;
/*!40000 ALTER TABLE `statusCodes` DISABLE KEYS */;
INSERT INTO `statusCodes` VALUES (1,1,'0','unprocessed requests or responses',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(2,1,'1','Delivered request/response',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(3,1,'2','inprocess - request/response still being proc',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(4,1,'3','Failed',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(5,1,'4','Exhausted - Expiry date reached',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(6,1,'5','Exhausted - Escalated',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(7,1,'6','Cannot identify route for request (http 404)',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(8,1,'7','system/host error, to be retried (http: 500,4',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(9,1,'8','invalid credentials',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(10,1,'9','invalid Request - parameter validation failed',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(11,1,'10','duplicate requests',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(12,1,'11','timeout, result unknown',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(13,1,'12','account is disabled',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(14,1,'32','Forwarded to operator',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(15,1,'25','Failed to be delivered to end user (EMG 25)',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(16,1,'40','NO SDP linkID',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(17,1,'41','SMS message is greater than <6> SMS (6*153)',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',0),(18,1,'aaaa','test 1234',1,'2018-04-30 22:18:42',1,'2018-04-30 13:18:42',1);
/*!40000 ALTER TABLE `statusCodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userGroups`
--

DROP TABLE IF EXISTS `userGroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userGroups` (
  `userGroupID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) unsigned NOT NULL,
  `groupID` int(11) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `uuid` varchar(50) NOT NULL,
  `insertedBy` int(11) unsigned DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `updatedBy` int(11) unsigned DEFAULT NULL,
  `dateModified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userGroupID`),
  UNIQUE KEY `userID` (`userID`,`groupID`),
  KEY `fk_userGroups_groups_idx` (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userGroups`
--

LOCK TABLES `userGroups` WRITE;
/*!40000 ALTER TABLE `userGroups` DISABLE KEYS */;
INSERT INTO `userGroups` VALUES (2,5,21,1,'0',1,'2019-02-08 12:42:57',1,'2019-02-08 03:42:57'),(3,6,21,1,'0',1,'2019-02-08 12:44:12',1,'2019-02-08 03:44:12'),(10,13,21,1,'',1,'2019-04-25 13:14:45',1,'2019-04-25 04:14:45'),(11,16,21,1,'',1,'2019-04-25 14:13:15',1,'2019-04-25 05:13:15'),(12,17,21,1,'',1,'2019-04-26 15:20:47',1,'2019-04-26 06:20:47'),(13,18,21,1,'',1,'2019-04-26 15:21:53',1,'2019-04-26 06:21:53'),(14,19,21,1,'',1,'2019-04-26 15:26:09',1,'2019-04-26 06:26:09'),(15,20,21,1,'',1,'2019-04-26 15:29:46',1,'2019-04-26 06:29:46'),(16,21,21,1,'',1,'2019-04-29 16:48:49',1,'2019-04-29 07:48:49'),(17,22,21,1,'',1,'2019-04-29 16:52:25',1,'2019-04-29 07:52:25'),(18,23,21,1,'',1,'2019-04-30 09:16:29',1,'2019-04-30 00:16:29'),(19,24,21,1,'',1,'2019-04-30 11:12:08',1,'2019-04-30 02:12:08'),(20,25,21,1,'',1,'2019-04-30 12:09:04',1,'2019-04-30 03:09:04'),(21,26,21,1,'',1,'2019-05-15 10:52:12',1,'2019-05-15 04:52:12'),(22,27,21,1,'',1,'2019-05-15 10:55:57',1,'2019-05-15 04:55:57'),(23,28,21,1,'',1,'2019-05-15 11:21:09',1,'2019-05-15 05:21:09'),(24,29,21,1,'',1,'2019-05-15 11:23:31',1,'2019-05-15 05:23:31'),(25,30,21,1,'',1,'2019-05-15 12:01:34',1,'2019-05-15 06:01:34'),(26,31,21,1,'',1,'2019-05-15 13:06:09',1,'2019-05-15 07:06:09'),(27,32,21,1,'',1,'2019-05-15 13:08:17',1,'2019-05-15 07:08:17'),(28,33,21,1,'',1,'2019-05-15 14:05:51',1,'2019-05-15 11:05:51'),(29,34,21,1,'',1,'2019-05-17 12:15:17',1,'2019-05-17 09:15:17');
/*!40000 ALTER TABLE `userGroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(50) NOT NULL,
  `clientID` int(10) unsigned NOT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `fullNames` varchar(120) DEFAULT NULL,
  `emailAddress` varchar(120) DEFAULT NULL,
  `IDNumber` varchar(30) DEFAULT NULL,
  `MSISDN` bigint(15) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `passwordAttempts` smallint(6) NOT NULL DEFAULT '0',
  `passwordStatusID` int(11) unsigned NOT NULL DEFAULT '1',
  `auth_key` varchar(150) DEFAULT NULL,
  `access_token_expired_at` int(11) NOT NULL DEFAULT '0',
  `registration_ip` varchar(50) NOT NULL DEFAULT '',
  `last_login_ip` varchar(50) NOT NULL DEFAULT '',
  `last_login_at` int(11) DEFAULT NULL,
  `datePasswordChanged` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `dateActivated` datetime DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `dateModified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `uuid` (`uuid`),
  KEY `fk_users_clients1_idx` (`clientID`),
  KEY `fk_users_passwordStatuses` (`passwordStatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'23aasdad',1,'thesuperadminaccount','The Super Administrator Account','test@test.com','12345678',254721851111,'$2y$13$Vx7utS1j.QJKo7kKPoF6KedGAFltZngXEQLvdPuqbUJv.NtXHxYpC',1,1,'D6qS3GFZJ4Tk88UsBXoP_OpSqY6UchrA_1532122083',1537030321,'::1','::1',1536943921,'2015-06-15 16:50:57',1,'2014-10-05 13:32:14','2013-04-19 10:37:25','2018-11-03 04:54:22',1,1),(6,'',14,'ggatuma@gmail.com',NULL,'ggatuma@gmail.com',NULL,0,NULL,0,0,'UnAAMCmlmfnQjUoNg0rnEWTV9Aj56W4M_1549619052',0,'','',NULL,NULL,NULL,NULL,'2019-02-08 12:44:12','2019-02-08 03:44:12',0,0),(13,'HS-Itjhu',1,NULL,'Fred Alfredo','mishebalfred@gmail.com',NULL,704716989,'$2y$13$v9GkN8tnasSjZwAPNlIJwuBKqlr0Q5sAOVErtr/lQCNqOiwGa1Qwi',0,0,'oPovFZusOa4QNihpXeq8XofHpmxMWHuS_1556187285',0,'','',NULL,NULL,3,NULL,'2019-04-25 13:14:45','2019-04-25 04:14:45',1,1),(16,'Ay0dWNdj',1,NULL,'Dennis Waina','gdbdufd@gmail.com',NULL,704716989,'$2y$13$NfhokmTFxKeTkiIEw3Yxoepbhd7NDCmwhf.DJ6wUuwloG4JH5Yspy',0,0,'xoXMIDLg22rQcmdM5DDeM1xVgnmg_cZJ_1556190795',0,'','',NULL,NULL,3,NULL,'2019-04-25 14:13:15','2019-04-25 05:13:15',1,1),(17,'W75gdPOh',22,'Delete Test','test test','gdbdufgfd@gmail.com',NULL,70471698945,'!23qweASD',0,6,'OsooTzvLAJ8zNs9u7YFzkzfXVEi_VxGL_1556281247',0,'','',NULL,NULL,1,NULL,'2019-04-26 15:20:47','2019-04-29 13:03:44',1,1),(18,'QazA3p50',22,'Delete','test test v','sgdbdufgfd@gmail.com',NULL,704736989,'!23qweASD',0,6,'NrA8MNRvo38EsoyWJ8rf8Pt8nmS6AZLJ_1556281313',0,'','',NULL,NULL,3,NULL,'2019-04-26 15:21:53','2019-04-29 00:23:21',1,1),(19,'vU7UI40P',22,'Tester Update','test test uy','gdbidufd@gmail.com',NULL,705471698945,'!23qweASD',0,0,'SPQOiOMi7gIsnN1IX9-i_tp1ZYrh8yaN_1556281569',0,'','',NULL,NULL,3,NULL,'2019-04-26 15:26:09','2019-04-29 00:22:54',1,1),(20,'8x9kJHMj',22,'Account','Dennis Wai','dbdufd@gmail.com',NULL,70469895,'$2y$13$aZE/7OdoufDmPavH9LUSF.DU3D2yi5k8USoMO1FMa/lkNTbR.T6Gi',0,7,'fq0cGpP4oRsbWiruNXJVXxPsKSnlZtR5_1556518914',0,'','',NULL,NULL,3,NULL,'2019-04-26 15:29:46','2019-04-29 00:21:54',1,1),(21,'KjkWrYH6',14,'Fred','Dennis Wainava','d@gmail.com',NULL,704716989,'$2y$13$UxFyAw23eZY8.DNUftuCw.kbIIzhmB9BIEmjhHx.MuBBKsJ6MUo.m',0,0,'iUe91uK0Jz5eKG3C7w9KLnMYJFo-vdCF_1556545728',0,'','',NULL,NULL,1,NULL,'2019-04-29 16:48:49','2019-04-29 13:03:54',1,1),(22,'F-PCHwRE',14,'ty','rt','gd@gmail.com',NULL,1234567891,'$2y$13$wK7KMJxosK4Zd6x.RxFUUeIGf.4Wtopni4e/SbOFdtd4Y5R3ixiue',0,0,'xxddqBhnmkmpqqQA_Q4GARFvgpPLUG3T_1556545945',0,'','',NULL,NULL,3,NULL,'2019-04-29 16:52:25','2019-04-29 07:52:25',1,1),(23,'piGFNMsT',22,'YT','H','f@gmail.com',NULL,1234567891,'1234',0,6,'jyEkU14xjYSJwSxL1O5kiv7rfgT7So3z_1556604988',0,'','',NULL,NULL,1,NULL,'2019-04-30 09:16:29','2019-04-30 01:37:01',1,1),(24,'TLRgGry7',14,'Y','Y','a@gmail.com',NULL,1234567890,'$2y$13$Rkyc9hjJ8cF9Q1Idcm29kuk5GOlQN8/bWs6DmqRUwoCBi3RRGl8Oy',0,0,'gSq_gnx3eBPXMdXRM7OWA-ZFvrAhFP4u_1556611928',0,'','',NULL,NULL,1,NULL,'2019-04-30 11:12:08','2019-04-30 02:12:53',1,1),(25,'A2l0KonU',14,'Alfredi','Fred','red@gmail.com',NULL,704716999,'$2y$13$H/qFB.Iol6erVot0oGxA2Opw7hUF.EDH6lXgAjCuE3WUyLjuxagtm',0,1,'beOox59YCReqnnyUiha87eJEiTxD91J0_1556615343',0,'','',NULL,NULL,1,NULL,'2019-04-30 12:09:04','2019-04-30 03:38:49',1,1),(26,'siIBb-Ue',22,'Mish','Calvo Gats','frd@gmail.com',NULL,706796989,'$2y$13$q4YfTskf5OzCC3PYSUYQuO3CJR6doSR86ZUSO.KbcKFBNaKbRA5GW',0,6,'pvTpu7RFq06IJZkz_sP_Vi0OF0MVFv_I_1557906731',0,'','',NULL,NULL,3,NULL,'2019-05-15 10:52:12','2019-05-15 04:54:35',1,1),(27,'huplYnlE',22,'Drano','Adrian Haja','get@gmail.com',NULL,708716989,'$2y$13$PftFOqQvoxQXClnVdYwCn.oBv/DD.pq1vv5.O0pg5xwUHFezwNJDC',0,0,'CenjBg2kRVbHwlx4Br0ecVu8bLFhtBQO_1557906956',0,'','',NULL,NULL,1,NULL,'2019-05-15 10:55:57','2019-05-15 05:15:27',1,1),(28,'HEgf0ym-',14,'Fred','Mishalf','dbd@gmail.com',NULL,778656989,'$2y$13$csV4DFHYxzck7ZQnqHtP/OAhr3.q1Zo1bKhZzKy0B0ef9fcxzLu9u',0,0,'Fno32-Dfa6Kbto9Y-wknWCNAlRO4_2mj_1557908469',0,'','',NULL,NULL,3,NULL,'2019-05-15 11:21:09','2019-05-15 05:21:09',1,1),(29,'gOJFyo5y',14,'Roro','Roro Roro','md@gmail.com',NULL,778954321,'$2y$13$WY8EOSO5EFYpyyjTnObrEu9z00FbU.QODXzuV.D6CC0p5/9z9Y7tG',0,6,'4E0p5WtjIZQh3U8G0Ra-alrc1btwzJTw_1557908610',0,'','',NULL,NULL,3,NULL,'2019-05-15 11:23:31','2019-05-15 05:59:02',1,1),(30,'80Q5Acwo',22,'grand','asen  asen','ud@gmail.com',NULL,1234567890,'$2y$13$ysXqBcr4AN38MBcqebT6l.VqiaNIaC.Nza/FUmq1iqRwFYP/4uxma',0,1,'pzRRku7xsRSEdSKzIlzFF65mp05FaYNU_1557910893',0,'','',NULL,NULL,1,NULL,'2019-05-15 12:01:34','2019-05-15 07:04:02',1,1),(31,'OqS6UkIM',14,'Alfredd','Denniss Wainah','sg@gmail.com',NULL,745316989,'$2y$13$9y03H2phpBW1m2.adFOc9OORC1.mue3CBllde6kbUrAfA2zr/XFNS',0,0,'iOf-KB3sJVOaLhfS0eAAQ4OdFaPoHuz9_1557914768',0,'','',NULL,NULL,1,NULL,'2019-05-15 13:06:09','2019-05-15 07:06:09',1,1),(32,'vX4fzB6x',14,'Tes','Test Test','od@gmail.com',NULL,704456989,'123456789',0,1,'UnSCrjMg1IdC2-0OWEvaxT4wgepCWXne_1557914896',0,'','',NULL,NULL,1,NULL,'2019-05-15 13:08:17','2019-05-17 09:00:47',1,1),(33,'PqXlCile',22,'TestUser','test test','abudu@gmail.com',NULL,4567893989,'$2y$13$B32UmIHLnbvN6qqHp3rGhuVS2h1p6bWqI/i832Uu3xX3AC87SVWsa',0,1,'dYfSc3MdRLhuCjkqAfRydGw5Ot4OjA9W_1557918350',0,'','',NULL,NULL,1,NULL,'2019-05-15 14:05:51','2019-05-15 11:05:51',1,1),(34,'92zfJZsL',24,'New Test','Test New','90@gmail.com',NULL,1234567890,'$2y$13$9JDY2Mqm2e8T4CBJNzn8Nu45od0BtLZptM7b7JBH9R26kbn7fabkS',0,1,'hx7jWt5aMcLF8a8Lt_w8UsfFG9VJuJ8W_1558084517',0,'','',NULL,NULL,1,NULL,'2019-05-17 12:15:17','2019-05-17 09:40:39',1,1);
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

-- Dump completed on 2019-05-21 12:21:37
