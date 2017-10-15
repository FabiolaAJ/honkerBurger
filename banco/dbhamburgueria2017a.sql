-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: dbhamburgueria2017a
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `promocaoprodutos`
--

DROP TABLE IF EXISTS `promocaoprodutos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promocaoprodutos` (
  `idProdutos` int(11) NOT NULL,
  `idpromocaoProdutos` int(11) NOT NULL AUTO_INCREMENT,
  `idPromocao` int(11) NOT NULL,
  PRIMARY KEY (`idpromocaoProdutos`),
  KEY `fk_promocaoProdutos_tbl_produtos1_idx` (`idProdutos`),
  KEY `fk_promocaoProdutos_tbl_promocao1_idx` (`idPromocao`),
  CONSTRAINT `fk_promocaoProdutos_tbl_produtos1` FOREIGN KEY (`idProdutos`) REFERENCES `tbl_produtos` (`idProdutos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_promocaoProdutos_tbl_promocao1` FOREIGN KEY (`idPromocao`) REFERENCES `tbl_promocao` (`idPromocao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocaoprodutos`
--

LOCK TABLES `promocaoprodutos` WRITE;
/*!40000 ALTER TABLE `promocaoprodutos` DISABLE KEYS */;
/*!40000 ALTER TABLE `promocaoprodutos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ambientes`
--

DROP TABLE IF EXISTS `tbl_ambientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ambientes` (
  `idAmbientes` int(11) NOT NULL AUTO_INCREMENT,
  `fotoLocal` varchar(100) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `Endereco` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idAmbientes`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ambientes`
--

LOCK TABLES `tbl_ambientes` WRITE;
/*!40000 ALTER TABLE `tbl_ambientes` DISABLE KEYS */;
INSERT INTO `tbl_ambientes` VALUES (6,'arquivos/images.png','056663','rua nao sei onde fica');
/*!40000 ALTER TABLE `tbl_ambientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_banda`
--

DROP TABLE IF EXISTS `tbl_banda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_banda` (
  `idBanda` int(11) NOT NULL AUTO_INCREMENT,
  `nomeBanda` varchar(45) NOT NULL,
  `txtCentral` text NOT NULL,
  `txtInfoBanda` text NOT NULL,
  `imagemApresentacao` varchar(100) NOT NULL,
  `imagemInfo` varchar(100) NOT NULL,
  `imagem1` varchar(100) NOT NULL,
  `imagem2` varchar(100) NOT NULL,
  `imagem3` varchar(100) NOT NULL,
  `statusBand` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idBanda`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_banda`
--

LOCK TABLES `tbl_banda` WRITE;
/*!40000 ALTER TABLE `tbl_banda` DISABLE KEYS */;
INSERT INTO `tbl_banda` VALUES (7,'Minha banda','','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\n','arquivos/images.png','arquivos/images.jpg','arquivos/images.png','arquivos/images.png','arquivos/pentagrama_dragao.jpg',1),(8,'Deep Purple','aavkldjslmcklmslkcdas','aacsddcs\r\ncdscds\r\ncsds\r\ncds','arquivos/bandaa.png','arquivos/deep01.jpg','arquivos/banda2.jpg','arquivos/inrock.jpg','arquivos/deep1.jpg',0);
/*!40000 ALTER TABLE `tbl_banda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cidade`
--

DROP TABLE IF EXISTS `tbl_cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cidade` (
  `idCidade` int(10) NOT NULL,
  `nomeCidade` varchar(45) NOT NULL,
  PRIMARY KEY (`idCidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cidade`
--

LOCK TABLES `tbl_cidade` WRITE;
/*!40000 ALTER TABLE `tbl_cidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_infonutricional`
--

DROP TABLE IF EXISTS `tbl_infonutricional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_infonutricional` (
  `idInfo` int(10) NOT NULL AUTO_INCREMENT,
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
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idInfo`),
  KEY `fk_tbl_infoNutricional_tbl_produtos1_idx` (`idProduto`),
  CONSTRAINT `fk_tbl_infoNutricional_tbl_produtos1` FOREIGN KEY (`idProduto`) REFERENCES `tbl_produtos` (`idProdutos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_infonutricional`
--

LOCK TABLES `tbl_infonutricional` WRITE;
/*!40000 ALTER TABLE `tbl_infonutricional` DISABLE KEYS */;
INSERT INTO `tbl_infonutricional` VALUES (4,'5','5mg','5','55','5','5','5','5','5',2,1),(5,'10','5','100','6','89','10','12','45','666',1,0);
/*!40000 ALTER TABLE `tbl_infonutricional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_login` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `idNivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_tbl_login_tbl_nivel1_idx` (`idNivel`),
  CONSTRAINT `idNivel` FOREIGN KEY (`idNivel`) REFERENCES `tbl_nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_login`
--

LOCK TABLES `tbl_login` WRITE;
/*!40000 ALTER TABLE `tbl_login` DISABLE KEYS */;
INSERT INTO `tbl_login` VALUES (11,'Marcel Teixeira 123','marcelnt','123',3),(12,'joao','jao','123',1),(13,'maria','maria','123',2);
/*!40000 ALTER TABLE `tbl_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel`
--

DROP TABLE IF EXISTS `tbl_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel` (
  `idNivel` int(11) NOT NULL,
  `nomeNivel` varchar(45) NOT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel`
--

LOCK TABLES `tbl_nivel` WRITE;
/*!40000 ALTER TABLE `tbl_nivel` DISABLE KEYS */;
INSERT INTO `tbl_nivel` VALUES (1,'administrador'),(2,'Operador Basico'),(3,'Catalogista');
/*!40000 ALTER TABLE `tbl_nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pais`
--

DROP TABLE IF EXISTS `tbl_pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pais`
--

LOCK TABLES `tbl_pais` WRITE;
/*!40000 ALTER TABLE `tbl_pais` DISABLE KEYS */;
INSERT INTO `tbl_pais` VALUES (1,'Brasil','BR');
/*!40000 ALTER TABLE `tbl_pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produtos`
--

DROP TABLE IF EXISTS `tbl_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produtos` (
  `idProdutos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `preco` varchar(45) NOT NULL,
  `statusLanche` tinyint(4) DEFAULT NULL,
  `idPromocao` int(11) DEFAULT NULL,
  `idSub` int(11) NOT NULL,
  `selecsub` tinyint(1) DEFAULT NULL,
  `clickDetalhes` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProdutos`),
  KEY `fk_promocao` (`idPromocao`),
  KEY `idSub_idx` (`idSub`),
  CONSTRAINT `fk_promocao` FOREIGN KEY (`idPromocao`) REFERENCES `tbl_promocao` (`idPromocao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produtos`
--

LOCK TABLES `tbl_produtos` WRITE;
/*!40000 ALTER TABLE `tbl_produtos` DISABLE KEYS */;
INSERT INTO `tbl_produtos` VALUES (1,'Honker Triplllo',' Pão com gergilim com três deliciosos andares de hambúrgueres grelhados, com muito cheddar derretido e muito bacon, acompanhados por um molho especial que você só encontra no Honker Triplo.','arquivos/triplo.jpg','15,50',0,NULL,6,0,10),(2,'Combo grande','sakllldlada','arquivos/burguer2.png','10',0,NULL,3,0,5),(4,'x-tradicional','ihjasijiodks','arquivos/burguer.png','15,00',NULL,NULL,7,NULL,3);
/*!40000 ALTER TABLE `tbl_produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_promocao` (
  `idPromocao` int(11) NOT NULL AUTO_INCREMENT,
  `pDesconto` varchar(45) NOT NULL,
  `mensagemAdicional` varchar(100) DEFAULT NULL,
  `nomePromocao` varchar(45) NOT NULL,
  `idProdutos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPromocao`),
  KEY `fk_produtos` (`idProdutos`),
  CONSTRAINT `fk_produtos` FOREIGN KEY (`idProdutos`) REFERENCES `tbl_produtos` (`idProdutos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocao`
--

LOCK TABLES `tbl_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_promocao` DISABLE KEYS */;
INSERT INTO `tbl_promocao` VALUES (1,'10%','','Promoção de páscoa',2),(2,'10%','nmj','phjhj',1);
/*!40000 ALTER TABLE `tbl_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sobre`
--

DROP TABLE IF EXISTS `tbl_sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sobre` (
  `idSobre` int(11) NOT NULL AUTO_INCREMENT,
  `Texto` text NOT NULL,
  `imagemMaior` varchar(100) NOT NULL,
  `imagem1` varchar(100) NOT NULL,
  `imagem2` varchar(100) NOT NULL,
  `imagem3` varchar(100) NOT NULL,
  `imagem4` varchar(100) NOT NULL,
  `statusSobre` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idSobre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sobre`
--

LOCK TABLES `tbl_sobre` WRITE;
/*!40000 ALTER TABLE `tbl_sobre` DISABLE KEYS */;
INSERT INTO `tbl_sobre` VALUES (1,'Honker burger foi fundado por Roger Klotz no ano de 1992 em São Paulo, com finalidade de fazer uma hamburgueria com um diferencial que chamasse a atenção das pessoas, amante de rock sr.Klotz decidiu fazer a sua hamburgueria com tema de rock n roll e carros, o que fez com que ela ganhasse popularidade pela sua essência ainda no ano que foi fundada, e fazendo sucesso até hoje. Sr.Roger Klotz, nasceu em 1925 e faleceu em 2010 com 85 anos por uma parada cardiaca, e deixou sua hamburgueria com seus filhos Alice Klotz e Robert Klotz, nesse ano Honker burger sofreu uma grande dificuldade financeira, pela inexperiência que Alice e Robert tinham com a administração do dinheiro que ganhavam, as condições financeiras foram melhorando aos poucos, e a hamburgueria voltou com seu grande sucesso no meio do ano seguinte. Alice e Robert administram Honker Burger até hoje com muito carinho e dizem:\"Somos muito gratos pelo nosso publico fiel, funcionarios de toda nossa rede, e por toda equipe, nossa familia e amigos que nos ajudaram em tempos dificeis.E nunca desistiremos do sonho de melhorar cada vez mais esse presente que ganhamos do nosso pai, e vamos cuidar da hamburgueria com todo carinho do mundo assim como ele cuidava.\" Esse ano Honker Burger fez 25 anos, e somos gratos a todos pelo carinho e sucesso!','arquivos/robert.jpg','arquivos/banner.jpg','arquivos/background1.png','arquivos/carroo.png','arquivos/rocklocal.jpg',0),(3,'Honker burger foi fundado por Roger Klotz no ano de 1992 em São Paulo, com finalidade de fazer uma hamburgueria com um diferencial que chamasse a atenção das pessoas, amante de rock sr.Klotz decidiu fazer a sua hamburgueria com tema de rock n roll e carros, o que fez com que ela ganhasse popularidade pela sua essência ainda no ano que foi fundada, e fazendo sucesso até hoje. Sr.Roger Klotz, nasceu em 1925 e faleceu em 2010 com 85 anos por uma parada cardiaca, e deixou sua hamburgueria com seus filhos Alice Klotz e Robert Klotz, nesse ano Honker burger sofreu uma grande dificuldade financeira, pela inexperiência que Alice e Robert tinham com a administração do dinheiro que ganhavam, as condições financeiras foram melhorando aos poucos, e a hamburgueria voltou com seu grande sucesso no meio do ano seguinte. Alice e Robert administram Honker Burger até hoje com muito carinho e dizem:\"Somos muito gratos pelo nosso publico fiel, funcionarios de toda nossa rede, e por toda equipe, nossa familia e amigos que nos ajudaram em tempos dificeis.E nunca desistiremos do sonho de melhorar cada vez mais esse presente que ganhamos do nosso pai, e vamos cuidar da hamburgueria com todo carinho do mundo assim como ele cuidava.\" Esse ano Honker Burger fez 25 anos, e somos gratos a todos pelo carinho e sucesso!','arquivos/robert.jpg','arquivos/banner.jpg','arquivos/background1.png','arquivos/carroo.png','arquivos/rocklocal.jpg',0),(4,'aaaaaaaaaaaaaaaaaaaaaaaaaaa','arquivos/burguer.jpg','arquivos/backgroundham.jpg','arquivos/banddestaque.png','arquivos/band2.png','arquivos/black.jpg',1),(5,'bla bla b1231546','arquivos/images.png','arquivos/images.jpg','arquivos/hqdefault.jpg','arquivos/hqdefault (1).jpg','arquivos/images.png',0);
/*!40000 ALTER TABLE `tbl_sobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcategorias`
--

DROP TABLE IF EXISTS `tblcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcategorias` (
  `idCategorias` int(11) NOT NULL AUTO_INCREMENT,
  `NomeCategoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategorias`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcategorias`
--

LOCK TABLES `tblcategorias` WRITE;
/*!40000 ALTER TABLE `tblcategorias` DISABLE KEYS */;
INSERT INTO `tblcategorias` VALUES (8,'Monster Burguer'),(15,'Natural\'s Burguer'),(16,'Black Dog'),(17,'Shakes');
/*!40000 ALTER TABLE `tblcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmensagem`
--

DROP TABLE IF EXISTS `tblmensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblmensagem` (
  `idmensagem` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `homepage` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `sexo` varchar(1) NOT NULL,
  `mensagem` tinytext NOT NULL,
  PRIMARY KEY (`idmensagem`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmensagem`
--

LOCK TABLES `tblmensagem` WRITE;
/*!40000 ALTER TABLE `tblmensagem` DISABLE KEYS */;
INSERT INTO `tblmensagem` VALUES (3,'maria','011 4143-3075','011 95959-7878','mariazinha@hotmail.com','','','F','asdsadada'),(4,'maria','011 4143-3075','011 95959-7878','mariazinha@hotmail.com','','','F','asdsadada');
/*!40000 ALTER TABLE `tblmensagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubcategorias`
--

DROP TABLE IF EXISTS `tblsubcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsubcategorias` (
  `idSub` int(11) NOT NULL AUTO_INCREMENT,
  `nomeSub` varchar(45) NOT NULL,
  `idCategorias` int(11) NOT NULL,
  PRIMARY KEY (`idSub`),
  KEY `fk_tblSubCategorias_tblCategorias1_idx` (`idCategorias`),
  CONSTRAINT `fk_tblSubCategorias_tblCategorias1` FOREIGN KEY (`idCategorias`) REFERENCES `tblcategorias` (`idCategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubcategorias`
--

LOCK TABLES `tblsubcategorias` WRITE;
/*!40000 ALTER TABLE `tblsubcategorias` DISABLE KEYS */;
INSERT INTO `tblsubcategorias` VALUES (3,'Lanches no Prato',8),(5,'Lanches 1K',8),(6,'Gordinhos Burguer',8),(7,'All the Burguer',8),(8,'Lanches Integral',15),(9,'Lanches Verde',15),(10,'Lanches Light',15),(11,'Lanches Fitness',15),(12,'Dogs no prato',16),(13,'Dogão especial',16),(14,'Dogs Simples',16),(15,'Double Dogs',16),(16,'Shakes especial',17),(17,'Shakes simples',17),(18,'Double Shakes',17);
/*!40000 ALTER TABLE `tblsubcategorias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-12 23:03:09
