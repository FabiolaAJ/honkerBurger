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
-- Table structure for table `tbl_ambientes`
--

DROP TABLE IF EXISTS `tbl_ambientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ambientes` (
  `idAmbientes` int(11) NOT NULL AUTO_INCREMENT,
  `imagemPrincipal` varchar(100) NOT NULL,
  `fotoLocal` varchar(100) NOT NULL,
  `nomeLocal` varchar(100) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` int(20) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `idCidade` int(10) NOT NULL,
  PRIMARY KEY (`idAmbientes`),
  KEY `fk_tbl_ambientes_tbl_cidade1_idx` (`idCidade`),
  CONSTRAINT `idCidade` FOREIGN KEY (`idCidade`) REFERENCES `tbl_cidade` (`idCidade`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ambientes`
--

LOCK TABLES `tbl_ambientes` WRITE;
/*!40000 ALTER TABLE `tbl_ambientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ambientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-11 16:50:23
