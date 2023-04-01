-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: db.n3rdydzn.software    Database: nrdydes1_bytestore
-- ------------------------------------------------------
-- Server version	5.7.30

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `icon` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Computadores','fa-solid fa-computer'),(2,'Componentes','fa-solid fa-gear'),(3,'Perifericos','fa-solid fa-headset');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `payment_id` bigint(20) NOT NULL,
  `payment_method` varchar(64) DEFAULT NULL,
  `value` double NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `costumer_id` int(11) NOT NULL,
  `costumer_id_cpf` bigint(20) DEFAULT NULL,
  `costumer_bank` varchar(255) DEFAULT NULL,
  `costumer_email` varchar(255) NOT NULL,
  `seller_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payment_id` (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=206 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (195,154,1313596781,'master',650,'accredited',NULL,1,32659430,'','test_user_80507629@testuser.com',13),(205,162,1313670139,'master',10373.33,'accredited',NULL,1,32659430,'','test_user_80507629@testuser.com',1);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `title` varchar(64) NOT NULL,
  `description` longtext NOT NULL,
  `price` double NOT NULL,
  `image` varchar(120) NOT NULL,
  `id_category` tinyint(4) NOT NULL,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (153,1,'Teclado Gamer','Teclado gamer, muito gamer, gamer mesmo, gamer de verdade, switch azul, baruiento',120,'product_641f3c3364fab.jpg',3,13),(154,1,'Headset Gamer','headset gamer, muito gamer tbm',650,'product_641f3c6edeb91.jpg',3,13),(133,1,'Mouse Gamer de alta performance','Tenha a vantagem necessÃ¡ria para vencer todos os seus adversÃ¡rios com o nosso Mouse Gamer de alta performance. Com sensor de precisÃ£o avanÃ§ado e tecnologia de resposta rÃ¡pida, vocÃª poderÃ¡ se mover com precisÃ£o milimÃ©trica e realizar movimentos incrivelmente rÃ¡pidos. O design ergonÃ´mico e os botÃµes programÃ¡veis permitem que vocÃª personalize sua experiÃªncia de jogo, tornando-se mais confortÃ¡vel e eficiente. Compre agora e eleve seu nÃ­vel de jogo a um patamar superior!',120,'product_641777f16e657.jpg',3,1),(162,1,'Computador Gamer','Obtenha a melhor experiÃªncia de jogo com nosso Computador Gamer de alta performance! Equipado com os mais recentes componentes de Ãºltima geraÃ§Ã£o, nosso computador garante velocidade e desempenho excepcionais para os jogos mais intensos. Com uma placa de vÃ­deo poderosa e um processador de ponta, vocÃª pode jogar seus jogos favoritos com grÃ¡ficos incrÃ­veis e sem atrasos. Ainda nÃ£o Ã© suficiente? Nosso computador gamer tambÃ©m possui uma memÃ³ria RAM de alta capacidade e um disco rÃ­gido com amplo espaÃ§o de armazenamento, permitindo que vocÃª armazene todos os seus jogos e arquivos sem se preocupar com a falta de espaÃ§o. NÃ£o perca mais tempo com sistemas lentos e antigos, adquira agora nosso Computador Gamer e jogue como nunca antes!',8530,'product_642228319512c.jpg',1,1),(177,1,'Notebook de Ãºltima geraÃ§Ã£o com tela de alta definiÃ§Ã£o','Este notebook de Ãºltima geraÃ§Ã£o Ã© perfeito para quem precisa de alta performance em suas atividades diÃ¡rias. Com uma tela de alta definiÃ§Ã£o, vocÃª poderÃ¡ visualizar imagens e vÃ­deos com nitidez impressionante. AlÃ©m disso, o processador poderoso e a memÃ³ria RAM de alta capacidade garantem que vocÃª possa executar vÃ¡rias tarefas ao mesmo tempo sem nenhum problema. Com design moderno e elegante, este notebook Ã© a escolha ideal para quem valoriza estilo e funcionalidade.',5900,'product_6428882018a52.jpg',1,1),(178,1,'Laptop HP Pavilion com processador Intel Core i7','Este laptop HP Pavilion Ã© a escolha perfeita para quem precisa de um computador confiÃ¡vel para trabalho ou lazer. Equipado com um processador Intel Core i7, ele Ã© capaz de lidar com tarefas intensivas, desde ediÃ§Ã£o de fotos e vÃ­deos atÃ© jogos exigentes. A tela de 15,6 polegadas oferece imagens nÃ­tidas e vibrantes, enquanto o armazenamento SSD de 512GB garante velocidade e capacidade de armazenamento suficientes para todos os seus arquivos. AlÃ©m disso, possui 16GB de RAM, placa de vÃ­deo dedicada NVIDIA GeForce GTX e bateria de longa duraÃ§Ã£o.',7999,'product_6428884a86152.webp',1,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` longtext NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(16) DEFAULT 'user',
  `verified` tinyint(1) DEFAULT '0',
  `pfp` varchar(255) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Adminstrador','admin','4c963206e59641e9a0b4ff0f5ec2f592','admin',1,NULL,NULL),(2,'user','user@gmail.com','202cb962ac59075b964b07152d234b70','user',0,NULL,NULL),(13,'N3rdy','n3rdydzn','c9f2faeed0862f2b456e0cc52ae1f9ae','admin',0,NULL,NULL);
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

-- Dump completed on 2023-04-01 17:08:29
