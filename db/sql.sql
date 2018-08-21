CREATE DATABASE  IF NOT EXISTS `kuponatik` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kuponatik`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: kuponatik
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
-- Table structure for table `tbl_books`
--

DROP TABLE IF EXISTS `tbl_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `price` float(8,2) NOT NULL,
  `author` varchar(300) NOT NULL,
  `category` varchar(250) NOT NULL,
  `language` varchar(100) NOT NULL,
  `ISBN` varchar(40) NOT NULL,
  `publish_date` date NOT NULL,
  `cant` int(10) DEFAULT '0',
  `search` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_books`
--

LOCK TABLES `tbl_books` WRITE;
/*!40000 ALTER TABLE `tbl_books` DISABLE KEYS */;
INSERT INTO `tbl_books` VALUES (1,'Red Hat Enterprise Linux 6 Administration',50.00,'Sander van','Computer Science','en','984-1234-12341234','2013-12-05',14,'{\"in\":2,\"ad\":4,\"linux\":2,\"computer\":3,\"6\":1,\"Administration\":1}'),(2,'Design Patterns: Elements of Reusable Object-Oriented Software ',15.11,'Ralph Johnson, John Vlissides, Grady Booch','Computer Science','en','978-0201633610','2016-03-01',3,'{\"computer\":3}'),(3,'Machine Learning for Absolute Beginners\r\n',10.36,'Oliver Theobald','Computer Science','en','123-58679-654','2016-08-01',5,'{\"in\":2,\"computer\":3}'),(4,'Python Crash Course: A Hands-On, Project-Based Introduction to Programming',21.58,' Eric Matthes','Programming','en','659-8546-324','2015-11-30',2,'{\"in\":2}'),(5,'Data Structures and Algorithms in Java',102.65,'Michael T. Goodrich, Roberto Tamassia, Michael H. Goldwasser','Computer Science','en',' 978-1118777788','2014-06-23',5,'{\"in\":2,\"computer\":3}'),(6,'Star Wars: Darth Vader Vol. 1: Vader',26.54,'Kieron Gillen','Comic Novels','en','485-6582-658','2015-09-16',4,'{\"ad\":4}'),(7,'Star Wars Vol. 1: Skywalker Strikes',16.23,'Jason Aron','Novels','en','159-7539-985','2011-04-11',0,NULL),(8,'Phonics for Kindergarten, Grade K ',6.32,'Carson-Dellosa Publishing ','Education','en','412-6548-7854','2016-08-10',6,'{\"in\":2,\"ad\":4}'),(9,'Astrophysics for People in a Hurry ',9.95,'Astrophysics for People in a Hurry ','Science','en','654-71235-654','2010-10-02',2,'{\"in\":2}'),(10,'Let\'s Review Algebra I',8.54,'Gary Rubinstein (Author) ','Science','en','978-1438009854','2006-03-24',0,NULL);
/*!40000 ALTER TABLE `tbl_books` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-20 23:53:22
