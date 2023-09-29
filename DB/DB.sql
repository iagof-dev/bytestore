-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: api.iagofragnan.com.br    Database: n3rdy_bytestore
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.22.04.1

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
-- Table structure for table `carousel`
--

DROP TABLE IF EXISTS `carousel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carousel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carousel`
--

LOCK TABLES `carousel` WRITE;
/*!40000 ALTER TABLE `carousel` DISABLE KEYS */;
/*!40000 ALTER TABLE `carousel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `icon` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Computadores',NULL),(2,'Componentes',NULL),(3,'Perifericos',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `payment_id` bigint NOT NULL,
  `payment_method` varchar(64) DEFAULT NULL,
  `value` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `costumer_id` int NOT NULL,
  `costumer_id_cpf` bigint DEFAULT NULL,
  `costumer_bank` varchar(255) DEFAULT NULL,
  `costumer_email` varchar(255) NOT NULL,
  `seller_id` int NOT NULL,
  `payment_ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payment_id` (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (213,178,1312475344,'master',7999,'accredited',NULL,1,32659430,'','test_user_80507629@testuser.com',1,'190.112.153.131'),(216,154,1313909067,'master',650,'rejected','2023-04-09 23:21:11',1,32659430,'','test_user_80507629@testuser.com',3,'190.112.153.131'),(218,153,1313909129,'master',120,'in_process','2023-04-09 23:44:06',1,32659430,'','test_user_80507629@testuser.com',3,'190.112.153.131'),(220,261,57491491094,'pix',1,'approved','2023-04-29 11:03:35',1,51890190802,'Nu Pagamentos S.A.','junindopao86@gmail.com',3,'190.112.153.131'),(221,261,57437168375,'pix',1,'approved','2023-04-29 11:12:14',1,51890190802,'Nu Pagamentos S.A.','junindopao86@gmail.com',3,'190.112.153.131');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `title` varchar(64) NOT NULL,
  `description` longtext NOT NULL,
  `price` double NOT NULL,
  `have_discount` tinyint(1) DEFAULT '0',
  `discount` float DEFAULT '0',
  `image` varchar(120) NOT NULL,
  `id_category` tinyint NOT NULL,
  `owner` int NOT NULL,
  `created` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (265,1,'hamburgui de rato muinto bom testando','remburguer de rato',1,1,0.5,'product_6515fe9d8b129.png',2,140,'0000-00-00 00:00:00'),(266,1,'rato empoeirado rtx 309000000000000','hsdfnuiofgvhjs80dyhfgv890sdhgg89fvhsd89fgvhs89dhf8vs',15000,0,0,'product_6515fe9d8b129.png',2,140,'0000-00-00 00:00:00'),(271,1,' Lorem ipsum dolor sit amet, consectetur adipisicing elit',' Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit',1,0,0,'product_6515fe9d8b129.png',1,140,'2023-09-28 19:32:54'),(272,1,'fafa','fafa',0,0,0,'product_6516130f2b01d.png',2,140,'2023-09-28 20:58:07');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category`
--

LOCK TABLES `sub_category` WRITE;
/*!40000 ALTER TABLE `sub_category` DISABLE KEYS */;
INSERT INTO `sub_category` VALUES (1,1,'Uso Pessoal','fa-solid fa-laptop'),(2,1,'Gamer','fa-sharp fa-solid fa-gamepad'),(3,1,'Workstation','fa-solid fa-briefcase'),(4,1,'Servidor','fa-solid fa-server'),(5,2,'Gabinete','fa-duotone fa-desktop'),(6,2,'Placa de Video (VGA)','fa-sharp fa-solid fa-gamepad'),(7,2,'Processador','fa-solid fa-microchip'),(8,2,'Memoria Ram','fa-solid fa-memory'),(9,2,'Placa Mãe','fa-duotone fa-desktop'),(10,2,'Armazenamento','fa-solid fa-database'),(11,2,'Cooler Box','fa-solid fa-fan'),(12,2,'Air Cooler','fa-solid fa-fan'),(13,2,'Water Cooler','fa-sharp fa-solid fa-droplet'),(14,3,'KIT Gamer','fa-solid fa-cube'),(15,3,'Teclado Gamer','fa-solid fa-keyboard'),(16,3,'Mouse Gamer','fa-solid fa-computer-mouse'),(17,3,'Monitor','fa-solid fa-desktop'),(18,3,'Headset Gamer','fa-solid fa-headset'),(19,3,'Ventilador Gamer','fa-solid fa-fan'),(20,3,'Caixa de Som','fa-solid fa-volume-high'),(21,3,'Mesa Digitalizadora','fa-solid fa-pen'),(22,3,'Impressora','fa-solid fa-print'),(23,3,'Pendrive','fa-solid fa-screwdriver');
/*!40000 ALTER TABLE `sub_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(16) DEFAULT 'user',
  `verified` tinyint(1) DEFAULT '0',
  `pfp` varchar(255) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','admin@iagofragnan.com.br','4c963206e59641e9a0b4ff0f5ec2f592','admin',1,'pfp_64443bb1b172a.png','Bem-vindo à nossa loja de computadores e periféricos! Somos um destino único para todos os seus produtos e acessórios de tecnologia. Desde computadores desktop e laptops até impressoras, monitores, periféricos e muito mais, temos tudo o que você precisa para atender às suas necessidades tecnológicas.'),(2,'user','user@gmail.com','202cb962ac59075b964b07152d234b70','user',0,NULL,NULL),(3,'N3rdy','n3rdydzn','c9f2faeed0862f2b456e0cc52ae1f9ae','admin',1,NULL,NULL),(14,'StrawFox64','strawfox','202cb962ac59075b964b07152d234b70','admin',0,'pfp_6444987356168.jpg','Vendo coisas para pagar o agiota'),(30,'Pineu','pineu@gmail.com','e399720fac1795b1204404784b9aef1c','seller',0,NULL,NULL),(138,'usuariobonito','email_teste_nao_existente@gmail.com','202cb962ac59075b964b07152d234b70','user',0,NULL,NULL),(139,'vitin','n3rdygay@gmail.com','202cb962ac59075b964b07152d234b70','user',0,NULL,NULL),(140,'joao123','joao123@gmail.com','202cb962ac59075b964b07152d234b70','user',0,NULL,NULL),(141,'teste123','teste123@gmail.com','202cb962ac59075b964b07152d234b70','user',0,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'n3rdy_bytestore'
--

--
-- Dumping routines for database 'n3rdy_bytestore'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-29  6:28:12
