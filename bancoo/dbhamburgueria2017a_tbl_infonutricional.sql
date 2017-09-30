CREATE DATABASE  IF NOT EXISTS `dbhamburgueria2017a` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbhamburgueria2017a`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: dbhamburgueria2017a
-- ------------------------------------------------------
-- Server version	5.6.10-log

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
-- Table structure for table `tbl_infonutricional`
--

DROP TABLE IF EXISTS `tbl_infonutricional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_infonutricional` (
  `idInfo` int(10) NOT NULL,
  `calorias` varchar(45) NOT NULL,
  `proteinas` varchar(45) NOT NULL,
  `carboidratos` varchar(45) NOT NULL,
  `gorduras` varchar(45) NOT NULL,
  `gordurasSaturadas` varchar(45) NOT NULL,
  `gordurasTrans` varchar(45) NOT NULL,
  `acucar` varchar(45) NOT NULL,
  `colesterol` varchar(45) NOT NULL,
  `sodio` varchar(45) NOT NULL,
  `idProduto` int(11) NOT NULL,
  PRIMARY KEY (`idInfo`),
  KEY `fk_tbl_infoNutricional_tbl_produtos1_idx` (`idProduto`),
  CONSTRAINT `fk_tbl_infoNutricional_tbl_produtos1` FOREIGN KEY (`idProduto`) REFERENCES `tbl_produtos` (`idProdutos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_infonutricional`
--

LOCK TABLES `tbl_infonutricional` WRITE;
/*!40000 ALTER TABLE `tbl_infonutricional` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_infonutricional` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-11 16:50:22
