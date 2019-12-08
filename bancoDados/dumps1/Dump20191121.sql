CREATE DATABASE  IF NOT EXISTS `dbprojetopizzariafrajolas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbprojetopizzariafrajolas`;
-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbprojetopizzariafrajolas
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblcontatospizzaria`
--

DROP TABLE IF EXISTS `tblcontatospizzaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcontatospizzaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(2000) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `homepage` varchar(2000) DEFAULT NULL,
  `facebook` varchar(2000) DEFAULT NULL,
  `sexo` varchar(1) NOT NULL,
  `profissao` varchar(60) NOT NULL,
  `tipomsg` varchar(10) NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontatospizzaria`
--

LOCK TABLES `tblcontatospizzaria` WRITE;
/*!40000 ALTER TABLE `tblcontatospizzaria` DISABLE KEYS */;
INSERT INTO `tblcontatospizzaria` VALUES (7,'ingrid','ingrid@gmail.com','','(888) 8888-8888','','','F','programador','sugestao','sswsw');
/*!40000 ALTER TABLE `tblcontatospizzaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcuriosidades`
--

DROP TABLE IF EXISTS `tblcuriosidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcuriosidades` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(3000) DEFAULT NULL,
  `texto` varchar(3000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcuriosidades`
--

LOCK TABLES `tblcuriosidades` WRITE;
/*!40000 ALTER TABLE `tblcuriosidades` DISABLE KEYS */;
INSERT INTO `tblcuriosidades` VALUES (8,'8d25c3d102f26aedc0cefdb491155703.png','Agentes do FBI tentaram pedir pizza durante uma investigação dentro de um hospital psiquiátrico em San Diego, EUA, mas foram confundidos com loucos e não conseguiram receber seu pedido.',1),(9,'6679da8f25ef42f7157e1fdc4eb1fd33.png','Algumas pizzarias no Camboja oferecem o sabor “pizza feliz” no cardápio, que é basicamente uma pizza comum que acompanha um embrulho com maconha',0),(10,'f4e10d028271b15620769d2afbfb1e67.png','Philip Workman, um condenado ao corredor da morte por matar um policial nos EUA, rejeitou sua última refeição e em vez disso pediu para que uma pizza vegetariana fosse entregue a uma pessoa sem-teto. O tribunal rejeitou o pedido, mas muitas pessoas em seguida doaram pizzas para sem-tetos da região.',1);
/*!40000 ALTER TABLE `tblcuriosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblimglojas`
--

DROP TABLE IF EXISTS `tblimglojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblimglojas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(3000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblimglojas`
--

LOCK TABLES `tblimglojas` WRITE;
/*!40000 ALTER TABLE `tblimglojas` DISABLE KEYS */;
INSERT INTO `tblimglojas` VALUES (27,'a350c1dfc50f70fff559de09f009539e.png',1),(32,'51480fe20a570b6197e7d805f78ce8af.png',0);
/*!40000 ALTER TABLE `tblimglojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllojas`
--

DROP TABLE IF EXISTS `tbllojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbllojas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(3000) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cidade` varchar(500) NOT NULL,
  `siglaestado` varchar(2) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllojas`
--

LOCK TABLES `tbllojas` WRITE;
/*!40000 ALTER TABLE `tbllojas` DISABLE KEYS */;
INSERT INTO `tbllojas` VALUES (4,'Rua das Plantas Chácara Santa Cecília ','06655-740','Itapevi','SP','(011) 4141 3686',1),(5,'Rua joão nº141','06655-740','Barueri','sp','1141413686',1);
/*!40000 ALTER TABLE `tbllojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmissavisaovalores`
--

DROP TABLE IF EXISTS `tblmissavisaovalores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblmissavisaovalores` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `titulo` varchar(8) NOT NULL,
  `texto` varchar(1000) NOT NULL,
  `foto` varchar(3000) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmissavisaovalores`
--

LOCK TABLES `tblmissavisaovalores` WRITE;
/*!40000 ALTER TABLE `tblmissavisaovalores` DISABLE KEYS */;
INSERT INTO `tblmissavisaovalores` VALUES (8,1,'Missão','                Proporcionar ao cliente um momento único ao saborear uma pizza de qualidade, elaborada com dedicação e carinho, entregue por um super-entregador que diverte toda a família.                         \r\n                            ','004d25a7340799d40ac67c9251e98529.png',1),(24,2,'Visão','Ser empresa referência no Brasil no ramo de pizza oferecendo um serviço de entrega inovador almejando a expansão internacional.','106620201abcaf5e2f8ecbd8f52bc5bc.png',1),(25,3,'Valores','Valorização da equipe,\r\n                 Qualidade de serviços,\r\n                 Inovação na entrega,\r\n                 Comprometimento com o cliente e\r\n                 Ética no relacionamento com o franqueado. ','bd02688ad0eedcb98a1d233c6d7dab8c.png',1);
/*!40000 ALTER TABLE `tblmissavisaovalores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblniveis`
--

DROP TABLE IF EXISTS `tblniveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblniveis` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `administracaoConteudo` tinyint(4) NOT NULL,
  `administracaoUsuario` tinyint(4) NOT NULL,
  `administracaoFaleConosco` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblniveis`
--

LOCK TABLES `tblniveis` WRITE;
/*!40000 ALTER TABLE `tblniveis` DISABLE KEYS */;
INSERT INTO `tblniveis` VALUES (1,'Administrador',1,1,1,1),(3,'Operador de Conteúdo',1,0,0,0),(4,'Relacionamento com o Cliente',0,0,1,0);
/*!40000 ALTER TABLE `tblniveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsobrenossahistoria`
--

DROP TABLE IF EXISTS `tblsobrenossahistoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsobrenossahistoria` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(3000) DEFAULT NULL,
  `texto` varchar(3000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsobrenossahistoria`
--

LOCK TABLES `tblsobrenossahistoria` WRITE;
/*!40000 ALTER TABLE `tblsobrenossahistoria` DISABLE KEYS */;
INSERT INTO `tblsobrenossahistoria` VALUES (15,'0d0aa5c248b64ebf87aab3979afda460.png','As origens da pizza são um mistério: há quem diga que ela é italiana, quem jure que ela veio do Egito e até aqueles que tem certeza de que a redonda veio da Grécia. Mas, se é difícil chegar a um consenso nesse sentido, pelo menos uma coisa é certa (ou quase): a primeira pizzaria do mundo fica no <span> Senai</span>, em Jandira.\r\n                A história do local começou em 1738, antes mesmo de Jandira ser uma cidade independente – na época, a região pertencia a Cotia. Mas, inicialmente, ela era apenas uma tenda que vendia pizza para quem estivesse de passagem.\r\n                Foi apenas em 1830 que a pizzaria Frajolas de fato surgiu no local, nos modelos de um restaurante como conhecemos hoje. E, quase 200 anos depois, ela continua funcionando no centro histórico de Jandira, para nossa alegria.   ',1),(16,'0fa4977f520405b268ca13727297d2fb.jpg','teste',0);
/*!40000 ALTER TABLE `tblsobrenossahistoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltoposobre`
--

DROP TABLE IF EXISTS `tbltoposobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbltoposobre` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(3000) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltoposobre`
--

LOCK TABLES `tbltoposobre` WRITE;
/*!40000 ALTER TABLE `tbltoposobre` DISABLE KEYS */;
INSERT INTO `tbltoposobre` VALUES (4,'740962de97d41c43654f13de16d70088.png',1);
/*!40000 ALTER TABLE `tbltoposobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblusuarios`
--

DROP TABLE IF EXISTS `tblusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblusuarios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `dt_nasc` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(2000) NOT NULL,
  `codigoNivel` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`),
  KEY `codigoNivel` (`codigoNivel`),
  CONSTRAINT `tblusuarios_ibfk_1` FOREIGN KEY (`codigoNivel`) REFERENCES `tblniveis` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusuarios`
--

LOCK TABLES `tblusuarios` WRITE;
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` VALUES (1,'Ingrid','461.153.328.00','01/08/1998','ingrid@gmail.com','gui','202cb962ac59075b964b07152d234b70',1,1),(6,'yasmin','461.153.328.00','16/03/2002','yasmin@gmail.com','yasmin123','202cb962ac59075b964b07152d234b70',4,0),(7,'joao','111.111.111-11','16/03/2002','joao@gmail.com','joao','202cb962ac59075b964b07152d234b70',3,1);
/*!40000 ALTER TABLE `tblusuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbprojetopizzariafrajolas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-21  3:13:42
