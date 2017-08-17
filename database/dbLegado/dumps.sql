-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: classclock
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

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
-- Table structure for table `competencia`
--

DROP TABLE IF EXISTS `competencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competencia` (
  `idProfessor` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `interesse` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idProfessor`,`idDisciplina`),
  KEY `idDisciplina` (`idDisciplina`),
  CONSTRAINT `competencia_ibfk_1` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`),
  CONSTRAINT `competencia_ibfk_2` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competencia`
--

LOCK TABLES `competencia` WRITE;
/*!40000 ALTER TABLE `competencia` DISABLE KEYS */;
INSERT INTO `competencia` VALUES (4,1,1,1),(4,2,1,1),(4,3,1,1),(4,4,1,1),(4,5,1,1),(4,6,1,1),(4,7,1,1),(4,8,1,1),(4,9,1,1),(4,10,1,1),(4,11,1,1),(4,12,1,1),(4,13,1,1),(4,14,1,1),(4,15,1,1),(4,16,1,1),(4,17,1,1),(4,18,1,1),(4,19,1,1),(4,20,1,1),(4,21,1,1),(4,22,0,1),(4,23,0,1),(4,24,0,1),(4,25,0,1),(4,26,0,1),(4,27,0,1),(4,28,0,1),(4,29,0,1),(4,30,0,1),(4,31,0,1),(4,32,0,1),(4,33,0,1),(4,34,0,1),(4,35,0,1),(4,36,0,1),(4,37,0,1),(4,38,0,1),(4,39,0,1),(4,40,0,1),(4,41,0,1),(4,42,0,1),(4,43,0,1),(4,44,0,1),(4,45,0,1),(4,46,0,1),(4,47,0,1),(4,48,0,1),(4,49,0,1),(4,50,0,1),(4,51,0,1),(4,52,0,1),(4,53,0,1),(4,54,0,1),(4,55,0,1),(4,56,0,1),(4,57,0,1),(4,58,0,1),(4,59,0,1),(4,60,0,1),(4,61,0,1),(4,62,0,1),(4,63,0,1),(4,64,0,1),(4,65,0,1),(4,66,0,1),(4,67,0,1),(4,68,0,1),(4,69,0,1),(4,70,0,1),(4,71,0,1),(4,72,0,1),(4,73,0,1),(4,74,0,1),(4,75,0,1),(4,76,0,1),(4,77,0,1),(6,1,0,1),(6,2,0,1),(6,3,0,1),(6,4,0,1),(6,5,0,1),(6,6,0,1),(6,7,0,1),(6,8,0,1),(6,9,0,1),(6,10,0,1),(6,11,0,1),(6,12,0,1),(6,13,0,1),(6,14,0,1),(6,15,0,1),(6,16,0,1),(6,17,0,1),(6,18,0,1),(6,19,0,1),(6,20,0,1),(6,21,0,1),(6,22,0,1),(6,23,0,1),(6,24,0,1),(6,25,0,1),(6,26,0,1),(6,27,0,1),(6,28,0,1),(6,29,0,1),(6,30,0,1),(6,31,0,1),(6,32,0,1),(6,33,0,1),(6,34,0,1),(6,35,0,1),(6,36,0,1),(6,37,0,1),(6,38,0,1),(6,39,0,1),(6,40,0,1),(6,41,0,1),(6,42,0,1),(6,43,0,1),(6,44,0,1),(6,45,0,1),(6,46,0,1),(6,47,0,1),(6,48,0,1),(6,49,0,1),(6,50,0,1),(6,51,0,1),(6,52,0,1),(6,53,0,1),(6,54,0,1),(6,55,0,1),(6,56,0,1),(6,57,0,1),(6,58,0,1),(6,59,0,1),(6,60,0,1),(6,61,0,1),(6,62,0,1),(6,63,0,1),(6,64,0,1),(6,65,0,1),(6,66,0,1),(6,67,0,1),(6,68,0,1),(6,69,0,1),(6,70,0,1),(6,71,0,1),(6,72,0,1),(6,73,0,1),(6,74,0,1),(6,75,0,1),(6,76,0,1),(6,77,0,1),(6,78,0,1),(6,79,0,1),(6,80,0,1),(6,81,0,1),(6,82,0,1),(6,83,0,1),(6,84,0,1),(6,85,0,1),(7,1,0,1),(7,2,0,1),(7,3,0,1),(7,4,0,1),(7,5,0,1),(7,6,0,1),(7,7,0,1),(7,8,0,1),(7,9,0,1),(7,10,0,1),(7,11,0,1),(7,12,0,1),(7,13,0,1),(7,14,0,1),(7,15,0,1),(7,16,0,1),(7,17,0,1),(7,18,0,1),(7,19,0,1),(7,20,0,1),(7,21,0,1),(7,22,0,1),(7,23,0,1),(7,24,0,1),(7,25,0,1),(7,26,0,1),(7,27,0,1),(7,28,0,1),(7,29,0,1),(7,30,0,1),(7,31,0,1),(7,32,0,1),(7,33,0,1),(7,34,0,1),(7,35,0,1),(7,36,0,1),(7,37,0,1),(7,38,0,1),(7,39,0,1),(7,40,0,1),(7,41,0,1),(7,42,0,1),(7,43,0,1),(7,44,0,1),(7,45,0,1),(7,46,0,1),(7,47,0,1),(7,48,0,1),(7,49,0,1),(7,50,0,1),(7,51,0,1),(7,52,0,1),(7,53,0,1),(7,54,0,1),(7,55,0,1),(7,56,0,1),(7,57,0,1),(7,58,0,1),(7,59,0,1),(7,60,0,1),(7,61,0,1),(7,62,0,1),(7,63,0,1),(7,64,0,1),(7,65,0,1),(7,66,0,1),(7,67,0,1),(7,68,0,1),(7,69,0,1),(7,70,0,1),(7,71,0,1),(7,72,0,1),(7,73,0,1),(7,74,0,1),(7,75,0,1),(7,76,0,1),(8,1,0,1),(8,2,0,1),(8,3,0,1),(8,4,0,1),(8,5,0,1),(8,6,0,1),(8,7,0,1),(8,8,0,1),(8,9,0,1),(8,10,0,1),(8,11,0,1),(8,12,0,1),(8,13,0,1),(8,14,0,1),(8,15,0,1),(8,16,0,1),(8,17,0,1),(8,18,0,1),(8,19,0,1),(8,20,0,1),(8,21,0,1),(8,22,0,1),(8,23,0,1),(8,24,0,1),(8,25,0,1),(8,26,0,1),(8,27,0,1),(8,28,0,1),(8,29,0,1),(8,30,0,1),(8,31,0,1),(8,32,0,1),(8,33,0,1),(8,34,0,1),(8,35,0,1),(8,36,0,1),(8,37,0,1),(8,38,0,1),(8,39,0,1),(8,40,0,1),(8,41,0,1),(8,42,0,1),(8,43,0,1),(8,44,0,1),(8,45,0,1),(8,46,0,1),(8,47,0,1),(8,48,0,1),(8,49,0,1),(8,50,0,1),(8,51,0,1),(8,52,0,1),(8,53,0,1),(8,54,0,1),(8,55,0,1),(8,56,0,1),(8,57,0,1),(8,58,0,1),(8,59,0,1),(8,60,0,1),(8,61,0,1),(8,62,0,1),(8,63,0,1),(8,64,0,1),(8,65,0,1),(8,66,0,1),(8,67,0,1),(8,68,0,1),(8,69,0,1),(8,70,0,1),(8,71,0,1),(8,72,0,1),(8,73,0,1),(8,74,0,1),(8,75,0,1),(8,76,0,1),(8,77,0,1),(8,78,0,1),(8,79,0,1),(8,80,0,1),(8,81,0,1),(8,82,0,1),(8,83,0,1),(8,84,0,1),(8,85,0,1),(8,86,0,1),(8,87,0,1),(8,88,0,1),(8,89,0,1),(8,90,0,1),(8,91,0,1),(8,92,0,1),(9,1,0,1),(9,2,0,1),(9,3,0,1),(9,4,0,1),(9,5,0,1),(9,6,0,1),(9,7,0,1),(9,8,0,1),(9,9,0,1),(9,10,0,1),(9,11,0,1),(9,12,0,1),(9,13,0,1),(9,14,0,1),(9,15,0,1),(9,16,0,1),(9,17,0,1),(9,18,0,1),(9,19,0,1),(9,20,0,1),(9,21,0,1),(9,22,0,1),(9,23,0,1),(9,24,0,1),(9,25,0,1),(9,26,0,1),(9,27,0,1),(9,28,0,1),(9,29,0,1),(9,30,0,1),(9,31,0,1),(9,32,0,1),(9,33,0,1),(9,34,0,1),(9,35,0,1),(9,36,0,1),(9,37,0,1),(9,38,0,1),(9,39,0,1),(9,40,0,1),(9,41,0,1),(9,42,0,1),(9,43,0,1),(9,44,0,1),(9,45,0,1),(9,46,0,1),(9,47,0,1),(9,48,0,1),(9,49,0,1),(9,50,0,1),(9,51,0,1),(9,52,0,1),(9,53,0,1),(9,54,0,1),(9,55,0,1),(9,56,0,1),(9,57,0,1),(9,58,0,1),(9,59,0,1),(9,60,0,1),(9,61,0,1),(9,62,0,1),(9,63,0,1),(9,64,0,1),(9,65,0,1),(9,66,0,1),(9,67,0,1),(9,68,0,1),(9,69,0,1),(9,70,0,1),(9,71,0,1),(9,72,0,1),(9,73,0,1),(9,74,0,1),(9,75,0,1),(9,76,0,1),(9,77,0,1),(9,78,0,1),(9,79,0,1),(9,80,0,1),(9,81,0,1),(9,82,0,1),(9,83,0,1),(9,84,0,1),(9,85,0,1),(9,86,0,1),(9,87,0,1),(9,88,0,1),(9,89,0,1),(9,90,0,1),(9,91,0,1),(9,92,0,1),(9,93,0,1),(9,94,0,1),(9,95,0,1),(9,96,0,1),(9,97,0,1),(9,98,0,1),(9,99,0,1),(9,100,0,1),(9,101,0,1),(9,102,0,1);
/*!40000 ALTER TABLE `competencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` VALUES (1,'Exclusiva'),(2,'Integral'),(3,'Parcial');
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coordenadorde`
--

DROP TABLE IF EXISTS `coordenadorde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coordenadorde` (
  `idCoordenador` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  PRIMARY KEY (`idCoordenador`,`idProfessor`),
  KEY `fk_coordenadorde_professor` (`idProfessor`),
  CONSTRAINT `fk_coordenadorde_coordenador` FOREIGN KEY (`idCoordenador`) REFERENCES `professor` (`id`),
  CONSTRAINT `fk_coordenadorde_professor` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordenadorde`
--

LOCK TABLES `coordenadorde` WRITE;
/*!40000 ALTER TABLE `coordenadorde` DISABLE KEYS */;
INSERT INTO `coordenadorde` VALUES (4,6),(4,7),(4,8),(4,9),(5,7);
/*!40000 ALTER TABLE `coordenadorde` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sigla` varchar(5) NOT NULL,
  `qtdSemestres` int(11) NOT NULL,
  `grau` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`),
  UNIQUE KEY `sigla` (`sigla`),
  KEY `fk_curso_grau` (`grau`),
  CONSTRAINT `fk_curso_grau` FOREIGN KEY (`grau`) REFERENCES `grau` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'Física','FI',8,3,1),(2,'Análise De Sistemas','ADS',6,5,1),(3,'Matemática','MAT',8,3,1);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso_tem_disciplina`
--

DROP TABLE IF EXISTS `curso_tem_disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso_tem_disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  KEY `fk_disciplina_curso` (`idDisciplina`),
  KEY `fk_curso_disciplina` (`idCurso`),
  CONSTRAINT `fk_curso_disciplina` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`id`),
  CONSTRAINT `fk_disciplina_curso` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_tem_disciplina`
--

LOCK TABLES `curso_tem_disciplina` WRITE;
/*!40000 ALTER TABLE `curso_tem_disciplina` DISABLE KEYS */;
INSERT INTO `curso_tem_disciplina` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(92,3),(93,3),(94,3),(95,3),(96,3),(97,3),(98,3),(99,3),(100,3),(101,3),(102,3),(103,3),(104,3),(105,3),(106,3),(107,3),(108,3),(109,3),(110,3),(111,3),(112,3),(113,3),(114,3),(115,3),(116,3),(117,3),(118,3),(119,3),(120,3),(121,3),(122,3),(123,3),(124,3),(125,3),(126,3),(127,3),(128,3),(129,3),(130,3),(131,3),(132,3),(133,3),(134,3),(135,3),(136,3),(137,3),(138,3),(139,3),(140,3),(141,3),(142,3),(143,3),(144,3),(145,3),(59,2),(60,2),(61,2),(62,2),(63,2),(64,2),(65,2),(66,2),(67,2),(68,2),(69,2),(70,2),(71,2),(72,2),(73,2),(74,2),(75,2),(76,2),(77,2),(78,2),(79,2),(80,2),(81,2),(82,2),(83,2),(84,2),(85,2),(86,2),(87,2),(88,2),(89,2),(90,2),(91,2);
/*!40000 ALTER TABLE `curso_tem_disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso_tem_periodo`
--

DROP TABLE IF EXISTS `curso_tem_periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso_tem_periodo` (
  `idCurso` int(11) NOT NULL,
  `idPeriodo` int(11) NOT NULL,
  PRIMARY KEY (`idCurso`,`idPeriodo`),
  KEY `fk_periodo_curso` (`idPeriodo`),
  CONSTRAINT `fk_curso_periodo` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`id`),
  CONSTRAINT `fk_periodo_curso` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_tem_periodo`
--

LOCK TABLES `curso_tem_periodo` WRITE;
/*!40000 ALTER TABLE `curso_tem_periodo` DISABLE KEYS */;
INSERT INTO `curso_tem_periodo` VALUES (1,3),(2,3),(3,3);
/*!40000 ALTER TABLE `curso_tem_periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sigla` varchar(5) NOT NULL,
  `qtdProf` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `qtdAulas` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sigla` (`sigla`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina`
--

LOCK TABLES `disciplina` WRITE;
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
INSERT INTO `disciplina` VALUES (1,'Introdução à Ciência Experimental','ICEF1',2,1,4,1),(2,'Introdução à Mecânica Clássica','IMCF1',1,1,4,1),(3,'Fundamentos de Algebra','FALF1',1,1,4,1),(4,'Geometria Plana e Espacial','GPEF1',1,1,2,1),(5,'Vetores','VETF1',1,1,2,1),(6,'Estatística Básica','ESBF1',1,1,2,1),(7,'Educação em Direitos Humanos','EDHF1',1,1,2,1),(8,'Gravitação e Leis de Conservação','GLCF2',1,2,4,1),(9,'Projetos Experimentais de Mecânica','PMEF2',2,2,2,1),(10,'Cálculo Diferencial e Integral 1','CD1F2',1,2,6,1),(11,'Geometria Analítica','GANF2',1,2,2,1),(12,'Hstória da Educação','HEDF2',1,2,2,1),(13,'Comunicação e Eucação','CEDF2',1,2,2,1),(14,'História da Ciência e da Tecnologia','HCTF2',1,2,2,1),(15,'Mecânica de Fluídos','MFLF3',1,3,2,1),(16,'Estática dos Sólidos','ESSF3',1,3,2,1),(17,'Ondulatória','ONDF3',1,3,4,1),(18,'Projetos Experimentais de Ondulatório','PONF3',2,3,2,1),(19,'Cálculo Integral e Diferêncial 2','CD2F3',1,3,4,1),(20,'Filosofia da Educação','FEDF3',1,3,2,1),(21,'Psicologia da Educação','PEDF3',1,3,2,1),(22,'Produção de Textos Científicos e Educacionais','PCEF3',1,3,2,1),(23,'Dinâmica dos Sólidos','DISF4',1,4,2,1),(24,'Termodinâmica','TERF4',1,4,4,1),(25,'Projetos Experimentais de Termodinâmica','PTEF4',2,4,2,1),(26,'Cálculo Diferencial e Integral 3','CD3F4',1,4,4,1),(27,'Organização e Gestão Escolar','OGEF4',1,4,2,1),(28,'Organização Política Educacional','OPEF4',1,4,2,1),(29,'Evolução dos Conceitos de Física','ECFF4',1,4,4,1),(30,'Eletrecidade e Circuitos Elétricos','ECEF5',1,5,4,1),(31,'Óptica','OTCF5',1,5,2,1),(32,'Projetos Experimentais de Óptica','POTF5',2,5,2,1),(33,'Cálculo Diferencial e Integral 4','CD4F5',1,5,4,1),(34,'Avaliação da Aprendizagem Escolar','AAEF5',1,5,2,1),(35,'Didática Geral','DIGF5',1,5,2,1),(36,'Educação Inclusiva','EINF5',1,5,2,1),(37,'Prática de Ensino 1','PE1F5',1,5,2,1),(38,'Física Moderma','FMOF6',1,6,4,1),(39,'Eletromagnetismo','EMGF6',1,5,4,1),(40,'Projetos Experimentais de Eletromagnetismo','PEMF6',2,6,2,1),(41,'Metodologia do Ensino de Física','MEFF6',1,6,2,1),(42,'Ensino de Ciência e Divulgação Científica','EDCF6',1,6,2,1),(43,'Interfaces da Física com a Química','IFQF6',1,6,2,1),(44,'Prática de Ensino 2','PE2F6',1,6,2,1),(45,'Metodologia do Trabalho Científico','MTCF6',1,6,2,1),(46,'Relatividade','RELF7',1,7,4,1),(47,'Fundamentos de Física Quântica','FFQF7',1,7,4,1),(48,'Projetos Experimentais de Física Moderna','PFMF7',2,7,2,1),(49,'Interfaces da Física com a Biologia','IFBF7',1,7,2,1),(50,'Prática de Ensino 3','PE3F7',1,7,4,1),(51,'Projeto de Pesquisa 1','PP1F7',1,7,2,1),(52,'Fundamentos de Astronomia e Astrofísica','FAAF8',1,8,4,1),(53,'Física Nuclear e de Partículas','FNPF8',1,8,2,1),(54,'Física, Computação e Educação','FCEF8',2,8,2,1),(55,'Prática de Ensino 4','PE4F8',1,8,4,1),(56,'Epistemologia e Filosofia da Ciência','EFCF8',1,8,2,1),(57,'LIBRAS','LIBF8',1,8,2,1),(58,'Projeto de Pesquisa 2','PP2F8',1,8,2,1),(59,'Arquitetura De Computadores','ADCA1',1,1,4,1),(60,'Lógica De Programação','LOPA1',2,1,6,1),(61,'Comunicação E Expressão','COEA1',1,1,2,1),(62,'Inglês Técnico','INGA1',1,1,4,1),(63,'História Da Ciência E Tecnologia','HTCA1',1,1,2,1),(64,'Matemática Discreta I','MD1A1',1,1,2,1),(65,'Matemática Discreta II','MD2A2',1,2,2,1),(66,'Análise De Sistemas I','AS1A2',1,2,4,1),(67,'Administração Geral','ADMA2',1,2,2,1),(68,'Sistemas Operacionais','SOPA2',1,2,4,1),(69,'Redes De Computadores I','RC1A2',2,2,4,1),(70,'Linguagem De Programação I','LOGA2',2,2,4,1),(71,'Probabilidade E Estatística','PEEA3',1,3,2,1),(72,'Organização, Sistemas E Métodos','OSMA3',1,3,2,1),(73,'Banco De Dados I','BD1A3',2,3,4,1),(74,'Estrutura De Dados','EDDA3',2,3,4,1),(75,'Redes De Computadores II','RC2A3',2,3,4,1),(76,'Análise De Sistemas II','AS2A3',1,3,4,1),(77,'Banco De Dados II','BD2A4',2,4,4,1),(78,'Metodologia De Pesquisa','MTPA4',1,4,2,1),(79,'Gestão De Serviços Informatizados','GSIA4',1,4,2,1),(80,'Implantação De Servidores','ID2A4',2,4,4,1),(81,'Projeto De Sistemas','PR2A4',1,4,4,1),(82,'Linguagem De Programação II','LP2A4',2,4,4,1),(83,'Sistemas De Informações Gerenciais','SIGA5',1,5,4,1),(84,'Gestão De TI','GTIA5',1,5,4,1),(85,'Desenvolvimento Para Web I','DW1A5',2,5,4,1),(86,'Engenharia De Software','ENGA5',1,5,4,1),(87,'Projeto Integrado I','PR1A5',2,5,4,1),(88,'Desenvolvimento Web II','DW2A6',2,6,4,1),(89,'Projeto Integrado II','PISA6',2,6,8,1),(90,'Tópicos Avançados ','TPAA6',2,6,4,1),(91,'Segurança Da Informação','SEGA6',1,6,4,1),(92,'Conjuntos e Funções','COFM1',1,1,4,1),(93,'Geometria 1 - Plana','GEPM1',1,1,4,1),(94,'Análise Combinatória e Probabilidade','ACPM1',1,1,2,1),(95,'Trigonometria','TRIM1',1,1,2,1),(96,'Matrizes, Determ. e Sistemas','MDSM1',1,1,2,1),(97,'Didática Geral','DIGM1',1,1,2,1),(98,'Fundamentos da Educação','FUEM1',1,1,2,1),(99,'Leitura, Interpr. e Prod. de Texto 1','LT1M1',1,1,2,1),(100,'Estatística Básica','ESBM2',1,2,4,1),(101,'Geometria 2 - Espacial','GEEM2',1,2,4,1),(102,'Geometria Analítica','GANM2',1,2,3,1),(103,'Números Complexos e Polinômios','COPM2',1,2,2,1),(104,'Didática da Matemática','DIMM2',1,2,2,1),(105,'História da Educação','HIEM2',1,2,4,1),(106,'Leitura, Interpr. e Prod. de Texto 2','LT2M2',1,2,2,1),(107,'Calculo Diferencial e Integral 1','CD1M3',1,3,6,1),(108,'Vetores','VETM3',1,3,4,1),(109,'Desenho Geométrico','DGEM3',2,3,2,1),(110,'Psicologia da Educação','PEDM3',1,3,2,1),(111,'Inglês Instrumental 1','IG1M3',1,3,2,1),(112,'História da Ciência e da Tecnologia','HCTM3',1,3,2,1),(113,'LIBRAS','LIBM3',1,3,2,1),(114,'Calculo Diferencial e Integral 2','CD2M3',1,4,4,1),(115,'Estatística Aplicada','ESAM4',1,4,2,1),(116,'Teoria dos Números','TNUM4',1,4,2,1),(117,'Matemática Financeira','MFIM4',1,4,2,1),(118,'Metodologia do Ensino da Matemática','MEMM4',1,4,2,1),(119,'Organização Política Educacional','OPEM4',1,4,2,1),(120,'Inglês Instrumental 2','IG2M4',1,4,2,1),(121,'Matemática e sua História','MHIM4',1,4,4,1),(122,'Calculo Diferencial e Integral 3','CD1M5',1,5,4,1),(123,'Álgebra Linear','ALGM5',1,5,4,1),(124,'Cálculo Numérico','CNUM5',1,5,3,1),(125,'Prática de Ensino 1','PE1M5',2,5,3,1),(126,'Interface da Mat. com a Física 1','IF1M5',1,5,4,1),(127,'Equações Diferenciais','EDIM6',1,6,2,1),(128,'Sequências e Séries','SSEM6',1,6,2,1),(129,'Estruturas Algébricas','EALM6',1,6,4,1),(130,'Filosofia da Educação M6','FIEM6',1,6,2,1),(131,'Prática de Ensino 2','PE2M6',2,6,2,1),(132,'Interface da Matem. com a Física 2','IF2M6',1,6,4,1),(133,'Metodologia do Trabalho Científico','MTCM6',1,6,2,1),(134,'Introdução a Análise Real','IARM7',1,7,2,1),(135,'Introdução a Lógica','ILOM7',1,7,2,1),(136,'Laboratório de Matemática 1','LM1M7',2,7,2,1),(137,'Prática de Ensino 3','pe3m7',1,7,4,1),(138,'Interface da Mat. com a Física 3','IF3M7',1,7,4,1),(139,'Projeto de Ensino e Pesquisa 1','PR1M7',1,7,2,1),(140,'Geometrias não Euclidianas','DNEM8',1,8,2,1),(141,'Filosofia da Matemática','FMAM8',1,8,2,1),(142,'Prática de Ensino 4','PE4M8',1,8,2,1),(143,'Laboratório de Matemática 2','LM2M8',1,8,4,1),(144,'Interface da Mat. com a Física 4','IF4M8',1,8,4,1),(145,'Projeto de Ensino e Pesquisa 2','PR2M8',1,8,2,1);
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `disciplinasigla`
--

DROP TABLE IF EXISTS `disciplinasigla`;
/*!50001 DROP VIEW IF EXISTS `disciplinasigla`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `disciplinasigla` AS SELECT 
 1 AS `idProfessor`,
 1 AS `id`,
 1 AS `nome`,
 1 AS `sigla`,
 1 AS `qtdProf`,
 1 AS `semestre`,
 1 AS `qtdAulas`,
 1 AS `status`,
 1 AS `active`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `disponibilidade`
--

DROP TABLE IF EXISTS `disponibilidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disponibilidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPeriodo` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `dia` varchar(45) NOT NULL,
  `inicio` time NOT NULL,
  `fim` time NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `hasDisponibilidade` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idPeriodo` (`idPeriodo`),
  KEY `idProfessor` (`idProfessor`),
  CONSTRAINT `disponibilidade_ibfk_1` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo` (`id`),
  CONSTRAINT `disponibilidade_ibfk_2` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponibilidade`
--

LOCK TABLES `disponibilidade` WRITE;
/*!40000 ALTER TABLE `disponibilidade` DISABLE KEYS */;
INSERT INTO `disponibilidade` VALUES (1,3,3,'segunda','19:00:00','20:00:00',1,1),(2,3,3,'segunda','20:00:00','21:00:00',1,1),(3,3,3,'segunda','21:00:00','22:00:00',1,1),(4,3,3,'segunda','22:00:00','23:00:00',1,1),(5,3,3,'terça','19:00:00','20:00:00',1,1),(6,3,3,'terça','20:00:00','21:00:00',1,1),(7,3,3,'terça','21:00:00','22:00:00',1,1),(8,3,3,'terça','22:00:00','23:00:00',1,1),(9,3,3,'quarta','19:00:00','20:00:00',1,1),(10,3,3,'quarta','20:00:00','21:00:00',1,1),(11,3,3,'quarta','21:00:00','22:00:00',1,1),(12,3,3,'quarta','22:00:00','23:00:00',1,1),(13,3,3,'quinta','19:00:00','20:00:00',1,1),(14,3,3,'quinta','20:00:00','21:00:00',1,1),(15,3,3,'quinta','21:00:00','22:00:00',1,1),(16,3,3,'quinta','22:00:00','23:00:00',1,1),(17,3,3,'sexta','19:00:00','20:00:00',1,1),(18,3,3,'sexta','20:00:00','21:00:00',1,1),(19,3,3,'sexta','21:00:00','22:00:00',1,1),(20,3,3,'sexta','22:00:00','23:00:00',1,1),(21,3,4,'segunda','19:00:00','20:00:00',1,0),(22,3,4,'segunda','20:00:00','21:00:00',1,0),(23,3,4,'segunda','21:00:00','22:00:00',1,0),(24,3,4,'segunda','22:00:00','23:00:00',1,0),(25,3,4,'terça','19:00:00','20:00:00',1,1),(26,3,4,'terça','20:00:00','21:00:00',1,1),(27,3,4,'terça','21:00:00','22:00:00',1,1),(28,3,4,'terça','22:00:00','23:00:00',1,1),(29,3,4,'quarta','19:00:00','20:00:00',1,1),(30,3,4,'quarta','20:00:00','21:00:00',1,1),(31,3,4,'quarta','21:00:00','22:00:00',1,1),(32,3,4,'quarta','22:00:00','23:00:00',1,1),(33,3,4,'quinta','19:00:00','20:00:00',1,1),(34,3,4,'quinta','20:00:00','21:00:00',1,1),(35,3,4,'quinta','21:00:00','22:00:00',1,1),(36,3,4,'quinta','22:00:00','23:00:00',1,1),(37,3,4,'sexta','19:00:00','20:00:00',1,1),(38,3,4,'sexta','20:00:00','21:00:00',1,1),(39,3,4,'sexta','21:00:00','22:00:00',1,1),(40,3,4,'sexta','22:00:00','23:00:00',1,1),(41,3,5,'segunda','19:00:00','20:00:00',1,1),(42,3,5,'segunda','20:00:00','21:00:00',1,1),(43,3,5,'segunda','21:00:00','22:00:00',1,1),(44,3,5,'segunda','22:00:00','23:00:00',1,1),(45,3,5,'terça','19:00:00','20:00:00',1,1),(46,3,5,'terça','20:00:00','21:00:00',1,1),(47,3,5,'terça','21:00:00','22:00:00',1,1),(48,3,5,'terça','22:00:00','23:00:00',1,1),(49,3,5,'quarta','19:00:00','20:00:00',1,1),(50,3,5,'quarta','20:00:00','21:00:00',1,1),(51,3,5,'quarta','21:00:00','22:00:00',1,1),(52,3,5,'quarta','22:00:00','23:00:00',1,1),(53,3,5,'quinta','19:00:00','20:00:00',1,1),(54,3,5,'quinta','20:00:00','21:00:00',1,1),(55,3,5,'quinta','21:00:00','22:00:00',1,1),(56,3,5,'quinta','22:00:00','23:00:00',1,1),(57,3,5,'sexta','19:00:00','20:00:00',1,1),(58,3,5,'sexta','20:00:00','21:00:00',1,1),(59,3,5,'sexta','21:00:00','22:00:00',1,1),(60,3,5,'sexta','22:00:00','23:00:00',1,1),(61,3,6,'segunda','19:00:00','20:00:00',1,0),(62,3,6,'segunda','20:00:00','21:00:00',1,0),(63,3,6,'segunda','21:00:00','22:00:00',1,0),(64,3,6,'segunda','22:00:00','23:00:00',1,0),(65,3,6,'terça','19:00:00','20:00:00',1,1),(66,3,6,'terça','20:00:00','21:00:00',1,1),(67,3,6,'terça','21:00:00','22:00:00',1,1),(68,3,6,'terça','22:00:00','23:00:00',1,1),(69,3,6,'quarta','19:00:00','20:00:00',1,1),(70,3,6,'quarta','20:00:00','21:00:00',1,1),(71,3,6,'quarta','21:00:00','22:00:00',1,1),(72,3,6,'quarta','22:00:00','23:00:00',1,1),(73,3,6,'quinta','19:00:00','20:00:00',1,1),(74,3,6,'quinta','20:00:00','21:00:00',1,1),(75,3,6,'quinta','21:00:00','22:00:00',1,1),(76,3,6,'quinta','22:00:00','23:00:00',1,1),(77,3,6,'sexta','19:00:00','20:00:00',1,1),(78,3,6,'sexta','20:00:00','21:00:00',1,1),(79,3,6,'sexta','21:00:00','22:00:00',1,1),(80,3,6,'sexta','22:00:00','23:00:00',1,1),(81,3,7,'segunda','19:00:00','20:00:00',1,1),(82,3,7,'segunda','20:00:00','21:00:00',1,1),(83,3,7,'segunda','21:00:00','22:00:00',1,1),(84,3,7,'segunda','22:00:00','23:00:00',1,1),(85,3,7,'terça','19:00:00','20:00:00',1,1),(86,3,7,'terça','20:00:00','21:00:00',1,1),(87,3,7,'terça','21:00:00','22:00:00',1,1),(88,3,7,'terça','22:00:00','23:00:00',1,1),(89,3,7,'quarta','19:00:00','20:00:00',1,1),(90,3,7,'quarta','20:00:00','21:00:00',1,1),(91,3,7,'quarta','21:00:00','22:00:00',1,1),(92,3,7,'quarta','22:00:00','23:00:00',1,1),(93,3,7,'quinta','19:00:00','20:00:00',1,1),(94,3,7,'quinta','20:00:00','21:00:00',1,1),(95,3,7,'quinta','21:00:00','22:00:00',1,1),(96,3,7,'quinta','22:00:00','23:00:00',1,1),(97,3,7,'sexta','19:00:00','20:00:00',1,1),(98,3,7,'sexta','20:00:00','21:00:00',1,1),(99,3,7,'sexta','21:00:00','22:00:00',1,1),(100,3,7,'sexta','22:00:00','23:00:00',1,1),(101,3,8,'segunda','19:00:00','20:00:00',1,0),(102,3,8,'segunda','20:00:00','21:00:00',1,0),(103,3,8,'segunda','21:00:00','22:00:00',1,1),(104,3,8,'segunda','22:00:00','23:00:00',1,1),(105,3,8,'terça','19:00:00','20:00:00',1,1),(106,3,8,'terça','20:00:00','21:00:00',1,1),(107,3,8,'terça','21:00:00','22:00:00',1,1),(108,3,8,'terça','22:00:00','23:00:00',1,1),(109,3,8,'quarta','19:00:00','20:00:00',1,1),(110,3,8,'quarta','20:00:00','21:00:00',1,1),(111,3,8,'quarta','21:00:00','22:00:00',1,1),(112,3,8,'quarta','22:00:00','23:00:00',1,1),(113,3,8,'quinta','19:00:00','20:00:00',1,1),(114,3,8,'quinta','20:00:00','21:00:00',1,1),(115,3,8,'quinta','21:00:00','22:00:00',1,1),(116,3,8,'quinta','22:00:00','23:00:00',1,1),(117,3,8,'sexta','19:00:00','20:00:00',1,1),(118,3,8,'sexta','20:00:00','21:00:00',1,1),(119,3,8,'sexta','21:00:00','22:00:00',1,1),(120,3,8,'sexta','22:00:00','23:00:00',1,1);
/*!40000 ALTER TABLE `disponibilidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grau`
--

DROP TABLE IF EXISTS `grau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grau`
--

LOCK TABLES `grau` WRITE;
/*!40000 ALTER TABLE `grau` DISABLE KEYS */;
INSERT INTO `grau` VALUES (1,'Bacharel'),(2,'Especialização (Pós-Graduação)'),(3,'Licenciatura'),(4,'Técnico'),(5,'Tecnólogo');
/*!40000 ALTER TABLE `grau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel`
--

DROP TABLE IF EXISTS `nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel`
--

LOCK TABLES `nivel` WRITE;
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` VALUES (1,'Graduação'),(2,'Pós-Graduação'),(3,'Mestrado'),(4,'Doutorado');
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodo`
--

DROP TABLE IF EXISTS `periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo`
--

LOCK TABLES `periodo` WRITE;
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
INSERT INTO `periodo` VALUES (1,'Matutino'),(2,'Vespertino'),(3,'Noturno'),(4,'Integral');
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCurso` int(11) DEFAULT NULL,
  `nascimento` date NOT NULL,
  `coordenador` tinyint(1) NOT NULL DEFAULT '0',
  `idContrato` int(11) NOT NULL,
  `idNivel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_professor_contrato` (`idContrato`),
  KEY `fk_professor_nivel` (`idNivel`),
  CONSTRAINT `fk_professor_contrato` FOREIGN KEY (`idContrato`) REFERENCES `contrato` (`id`),
  CONSTRAINT `fk_professor_nivel` FOREIGN KEY (`idNivel`) REFERENCES `nivel` (`id`),
  CONSTRAINT `fk_professor_usuario` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (3,1,'1980-10-10',1,1,4),(4,2,'1982-10-10',1,1,4),(5,3,'1983-10-10',1,1,4),(6,NULL,'1982-10-10',0,1,4),(7,NULL,'1983-10-10',0,1,4),(8,NULL,'1983-10-10',0,1,4),(9,NULL,'1983-10-10',0,1,4),(10,NULL,'1983-10-10',0,1,4),(11,NULL,'1983-10-10',0,1,4),(12,NULL,'1983-10-10',0,1,4);
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nSala` varchar(5) NOT NULL,
  `capMax` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nSala` (`nSala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
/*!40000 ALTER TABLE `sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` char(10) NOT NULL,
  `qtdAlunos` int(11) NOT NULL,
  `dp` tinyint(1) NOT NULL DEFAULT '0',
  `disciplina` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sigla` (`sigla`),
  KEY `fk_turma_disciplina` (`disciplina`),
  CONSTRAINT `fk_turma_disciplina` FOREIGN KEY (`disciplina`) REFERENCES `disciplina` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(32) NOT NULL,
  `matricula` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` char(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `dae` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','cg123456','admin@admin.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0),(2,'dae','cg654321','dae@dae.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,1),(3,'Coordenador De Física','CG111111','coordena@fisica.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0),(4,'Coordenador De ADS','CG222222','coordena@ads.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0),(5,'Coordenador De Matematica','CG333333','coordena@mat.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0),(6,'Jose1','CG444444','prof1@mat.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0),(7,'Maria','CG555555','prof2@mat.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0),(8,'Jose2','CG666666','prof3@mat.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0),(9,'Maria','CG777777','prof4@mat.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0),(10,'PROF ADS1','CG111222','prof5@ads.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0),(11,'PROF ADS2','CG111333','prof6@ads.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0),(12,'PROF FIS1','CG222111','prof7@fis.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0),(13,'PROF FIS2','CG222333','prof8@fis.com','46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5',1,0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `disciplinasigla`
--

/*!50001 DROP VIEW IF EXISTS `disciplinasigla`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `disciplinasigla` AS select `competencia`.`idProfessor` AS `idProfessor`,`disciplina`.`id` AS `id`,concat(`disciplina`.`nome`,' (',`disciplina`.`sigla`,')') AS `nome`,`disciplina`.`sigla` AS `sigla`,`disciplina`.`qtdProf` AS `qtdProf`,`disciplina`.`semestre` AS `semestre`,`disciplina`.`qtdAulas` AS `qtdAulas`,`disciplina`.`status` AS `status`,`competencia`.`active` AS `active` from (`competencia` join `disciplina` on((`disciplina`.`id` = `competencia`.`idDisciplina`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-28 21:55:26
