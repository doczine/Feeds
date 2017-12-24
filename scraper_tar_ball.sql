-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: scraper
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.17.04.1

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
-- Table structure for table `commoncrawl`
--

DROP TABLE IF EXISTS `commoncrawl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commoncrawl` (
  `count` int(200) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) DEFAULT NULL,
  `check_url` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`count`)
) ENGINE=InnoDB AUTO_INCREMENT=5764562 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feed`
--

DROP TABLE IF EXISTS `feed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feed` (
  `counter` int(50) NOT NULL AUTO_INCREMENT,
  `system_file_name` varchar(25) NOT NULL,
  `key_url` varchar(500) NOT NULL,
  `url` varchar(500) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `date` date NOT NULL,
  `checked` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`counter`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `html_url`
--
/

DROP TABLE IF EXISTS `html_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `html_url` (
  `counter` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(300) NOT NULL,
  `checked` varchar(5) DEFAULT NULL,
  `checked1` varchar(5) DEFAULT NULL,
  `checked2` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`counter`),
  UNIQUE KEY `rss` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=105875537 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `html_url1`
--

DROP TABLE IF EXISTS `html_url1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `html_url1` (
  `counter` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(300) NOT NULL,
  `checked` varchar(5) DEFAULT NULL,
  `checked1` varchar(5) DEFAULT NULL,
  `checked2` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`counter`),
  UNIQUE KEY `rss` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=8995997 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urlcounter` varchar(200) NOT NULL DEFAULT '0',
  `title` text,
  `url` varchar(300) NOT NULL DEFAULT '0',
  `host` text,
  `seoterm` text,
  `date` datetime DEFAULT NULL,
  `converted` varchar(5) DEFAULT NULL,
  `system_file_name` varchar(25) DEFAULT NULL,
  `file_verified` int(5) DEFAULT NULL,
  `file_name` varchar(25) DEFAULT NULL,
  `random` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`urlcounter`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rss_url`
--

DROP TABLE IF EXISTS `rss_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rss_url` (
  `counter` int(11) NOT NULL AUTO_INCREMENT,
  `rss` varchar(300) NOT NULL,
  `checked` varchar(5) DEFAULT NULL,
  `checked1` varchar(5) DEFAULT NULL,
  `checked2` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`counter`),
  UNIQUE KEY `rss` (`rss`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rss_xml_parse`
--

DROP TABLE IF EXISTS `rss_xml_parse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rss_xml_parse1` (
  `counter` int(50) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `timestamp` date NOT NULL,
  `description` text,
  `checked` varchar(25) DEFAULT NULL,
  `solr_check` varchar(5) DEFAULT NULL,
  `solr_url` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`counter`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=1364094546 DEFAULT charset=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `search`
--

DROP TABLE IF EXISTS `search`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `search` (
  `id` varchar(200) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `seoterm`
--

DROP TABLE IF EXISTS `seoterm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seoterm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `datesearched` date DEFAULT NULL,
  `searched` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-29 16:07:48
