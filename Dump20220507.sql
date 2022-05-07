CREATE DATABASE  IF NOT EXISTS `uptown` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `uptown`;
-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: uptown
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `q_one` int(11) NOT NULL,
  `q_one_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_two` int(11) NOT NULL,
  `q_two_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(4,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(7,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(12,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(20,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(24,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(26,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(27,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(28,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(29,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(31,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(32,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(33,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(34,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(35,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(41,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(43,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(46,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(48,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(49,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(50,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(51,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(52,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(54,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(56,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(58,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(63,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(80,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu'),(81,1,'$2y$10$IGqJcaQFqUbh6pzFy5483.ljmfeBJlfW/YMSM0lHtDb0G/04g7uh2',2,'$2y$10$SXo38x1kBd.xoxlIDiGm6eenzeJin6uruEVyU4EpCCpbuIET4DDZu');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_menu`
--

DROP TABLE IF EXISTS `category_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_menu` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status nya_idx` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_menu`
--

LOCK TABLES `category_menu` WRITE;
/*!40000 ALTER TABLE `category_menu` DISABLE KEYS */;
INSERT INTO `category_menu` VALUES (1,'images\\icons\\alldaybreakfast.png','ADD ONS',1),(2,'images\\menu\\2\\alacarter.png','ALA CARTE',1),(3,'images\\menu\\3\\breakfast-allday.jpg','ALL-DAY BREAKFAST',1),(4,'images\\menu\\4\\drinks.png','DRINKS',1),(5,'images\\menu\\5\\ukb.jpg','UKB',1),(6,'images\\menu\\6\\bibimbap.jpg','All',1),(7,'images\\icons\\alldaybreakfast.png','asdasd',2),(8,'images\\icons\\alldaybreakfast.png','testing',2),(9,'images\\menu\\9\\bibimbap.jpg','imagedcateg',2),(10,'images\\icons\\alldaybreakfast.png','9asdds',2),(11,'images\\icons\\alldaybreakfast.png','8',2),(12,'images\\icons\\alldaybreakfast.png','asdadsdas',2),(13,'images\\icons\\alldaybreakfast.png','new menu',2),(14,'images\\icons\\alldaybreakfast.png','asdasd',2),(15,'images\\icons\\alldaybreakfast.png','unli rice',2);
/*!40000 ALTER TABLE `category_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `idchat` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `message` varchar(45) NOT NULL,
  PRIMARY KEY (`idchat`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1,'asd','asd'),(2,'hpot','sada'),(3,'hpotsedsds','sadadsds'),(4,'hpotsedsds','sadadsds'),(5,'hpotsedsds','sadadsds'),(6,'hpotsedsds','sadadsds'),(7,'hpotsedsds','sadadsds'),(8,'hpotsedsds','sadadsds'),(9,'hpotsedsds','sadadsds'),(10,'hpotsedsds','sadadsds'),(11,'1','2'),(12,'1','2'),(13,'1','2'),(14,'5','2'),(15,'1','2'),(16,'1','2'),(17,'1','2'),(18,'1','2'),(19,'1','2'),(20,'1','2'),(21,'1','2'),(22,'1','2'),(23,'1','2'),(24,'1','2'),(25,'1','2'),(26,'1','2'),(27,'1','2'),(28,'15','2');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `Percentage` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `abbr` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status_idx` (`status`),
  CONSTRAINT `statz` FOREIGN KEY (`status`) REFERENCES `status_discount` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount`
--

LOCK TABLES `discount` WRITE;
/*!40000 ALTER TABLE `discount` DISABLE KEYS */;
INSERT INTO `discount` VALUES (1,'Senior Citizen','20',1,'SR.'),(2,'PWD','15',1,'PWD'),(3,'Regular','0',1,'Regular'),(4,'ass','1',3,''),(5,'testing','10.5',3,''),(6,'holiday','1.5',3,'');
/*!40000 ALTER TABLE `discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Price` varchar(45) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Sub_Category_ID` int(11) DEFAULT NULL,
  `Category_ID` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcat_idx` (`Sub_Category_ID`),
  KEY `cat_idx` (`Category_ID`),
  KEY `stats_idx` (`status_id`),
  KEY `stats_iddx` (`status_id`),
  KEY `statys_idx` (`status_id`),
  KEY `statttsus` (`status_id`),
  CONSTRAINT `cat` FOREIGN KEY (`Category_ID`) REFERENCES `category_menu` (`id`),
  CONSTRAINT `stsasadsda` FOREIGN KEY (`status_id`) REFERENCES `status_menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `subcat` FOREIGN KEY (`Sub_Category_ID`) REFERENCES `sub_category_menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (7,'Tteokkbokii','99','images\\ala-carte\\tteokbokki.jpg','Rice cake with sesame seed',0,2,1),(8,'Jjpaghetti','99','images\\ala-carte\\jjapaghetti.jpg','Korean second best selling instant food',0,1,1),(9,'Ramyeon','99','images\\ala-carte\\ramyeon.jpg','Spicy Korean Noodles',NULL,2,2),(10,'Bulgogi Rice Burger','99','images\\ala-carte\\bulgogi rice burger.jpg','Rice top to bottom with chicken at the middle',0,2,1),(11,'Bibimbap','129','images\\menu\\11\\bibimbap.jpg','Rice with cooked vegetables, usually meat, and often a raw or fried egg In Korea',0,2,1),(12,'Bokkeumbap','120','images\\ala-carte\\bokkeumbap.jpg','simple, delicious fried rice recipe that\'s made with mature kimchi, rice,',0,2,1),(13,'UKB199','199','images\\ukb199\\unlimited_pork.jpg','Unli Free cut pork',0,5,1),(14,'Spam and Egg','65','images\\all-day-breakfast\\spam and egg.jpg','Rice with 1pc of egg and 2pcs of ham',NULL,3,1),(16,'Special Longanisa and Egg','85','images\\all-day-breakfast\\longanisa and egg.jpg','Rice with 1pc of egg and 3pcs of longanisa',0,3,1),(17,'Soju','135','images\\drinks\\soju.jpg','Soju is a clear, low-alcohol, distilled spirit',1,4,1),(18,'Mango Juice','50','images\\drinks\\Mango-Juice.jpg','1 cup every serve',1,4,1),(19,'Pineapple','50','images\\drinks\\pineapple-juice-2.jpg','1 cup every serve',3,4,1),(20,'1.5 Coke and Sprite','123','images\\drinks\\coke-royal-sprite.jpg','Coke & Sprite',0,1,1),(21,'Coke & Sprite sakto','20','images\\drinks\\sakto sprite coke royal.jpg','Small size of softdrinks',2,4,1),(22,'Smirnoff Mule','69','images\\drinks\\smirnoff_mule.jpg','Smirnoff Mule is a mix of vodka, lime and ginger beer.',1,4,1),(23,'Kongnamul','20','images\\add-ons\\kongnamul.jpg','Kongnamul means soybean sprouts and guk means soup.',NULL,1,1),(24,'Kimchi','20','images\\add-ons\\kimchi.jpg','spicy, fermented pickle that invariably accompanies a Korean meal.',NULL,1,1),(25,'Mandu Dumpilng','20','images\\add-ons\\mandu dumpling.jpg','Korean dumplings that consist of a savory filling wrapped in thin wrappers.',NULL,1,1),(26,'Tofu','20','images\\add-ons\\tofu.jpg','Mandu can be steamed, boiled, pan-fried, or deep-fried.',NULL,1,1),(27,'Pickled Radish','20','images\\add-ons\\pickel radish.jpg','apple cider vinegar, salt, sugar, and warm water. Stir to dissolve the sugar and salt',NULL,1,1),(28,'Egg','10','images\\add-ons\\eggroll.jpg','Roll egg',0,1,1),(29,'Mozzarella Cheese','25','images\\add-ons\\mozzarella cheese.jpg','plastic or stretched-curd cheese;',0,1,1),(35,'pansit','0','images\\menu\\34\\jo-isko-logo.jpg','masarap',0,2,3),(40,'lordanadmin','123','images\\menu\\39\\Screenshot_2.png','asdasd',0,1,3),(42,'asdasdasdasdas','123','images\\menu\\41\\Screenshot_2.png','asdasd',0,2,3),(43,'lordanadmina','123','images\\menu\\42\\Screenshot_2.png','asdasd',0,2,3),(44,'valoran','12','images\\menu\\44\\Screenshot_2.png','asdasd',0,1,3),(45,'a','123','images\\menu\\44\\Screenshot_2.png','asdasd',0,2,3),(46,'Kimbap','100','images\\menu\\45\\download.jpg','Rolled rice',0,2,1),(47,'Rice','20','images\\menu\\47\\how-to-cook-rice.jpg','Steamed Rice',NULL,1,1),(48,'as','123','images\\menu\\48\\Screenshot_2.png','asdasd',0,1,3),(49,'sample','123','/images/profile/default.png','sample',0,1,3),(50,'sample1','123','/images/profile/default.png','sample1',0,2,3),(51,'sample2','123','/images/profile/default.png','sample2',0,1,3),(52,'UKB249','249','images\\menu\\52\\images-(1).jpeg','UNLIMITED 249',0,5,1),(53,'UKB299','299','images\\menu\\53\\images-(1).jpeg','UNLIMITED 299',0,5,1),(54,'pansit','123','/images/profile/default.png','pansit masarap',0,2,3),(55,'Ramyeon','99','/images/profile/default.png','umulit',0,3,3),(56,'pansit','123','/images/profile/default.png','sample',0,1,3),(57,'pansit','123','/images/profile/default.png','pasint',0,1,3),(58,'rexter','123','/images/profile/default.png','road',0,1,3),(59,'DANTZY','123','/images/profile/default.png','DANTZY',0,1,3),(60,'test','123','/images/profile/default.png','admin',0,2,3),(61,'test again','123','images/menu.png','test again',0,1,3),(62,'testing','100','images/menu.png','sdadasd',NULL,1,3),(63,'DANTZYz','100','images/menu.png','asdasdasd',NULL,4,3),(64,'Beef Tapa','95','images\\menu\\64\\beef-tapa.png','Beef tapa with garlic rice and egg',0,3,1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_submenu`
--

DROP TABLE IF EXISTS `menu_submenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `submenu_id` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_submenu`
--

LOCK TABLES `menu_submenu` WRITE;
/*!40000 ALTER TABLE `menu_submenu` DISABLE KEYS */;
INSERT INTO `menu_submenu` VALUES (5,35,2,'1'),(6,35,3,'1'),(7,35,4,'1'),(8,35,5,'1'),(34,11,1,'1'),(35,11,3,'1'),(36,11,6,'1'),(37,11,7,'1'),(38,11,8,'1'),(39,11,9,'1');
/*!40000 ALTER TABLE `menu_submenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2021_12_16_070022_roles',1),(5,'2021_12_16_072802_answers',1),(6,'2021_12_16_072819_questions',1),(7,'2021_12_28_063848_status_user',1),(8,'0000_00_00_000000_create_websockets_statistics_entries_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `Menu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_idx` (`Menu_id`),
  KEY `ticket_idx` (`ticket_id`),
  KEY `discount_idx` (`discount_id`),
  KEY `users_idx` (`user_id`),
  KEY `stats_idx` (`status_id`),
  KEY `stats_id` (`status_id`),
  KEY `status_idx` (`status_id`),
  CONSTRAINT `discount` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`id`),
  CONSTRAINT `menu` FOREIGN KEY (`Menu_id`) REFERENCES `menu` (`id`),
  CONSTRAINT `statss` FOREIGN KEY (`status_id`) REFERENCES `status_order` (`id`),
  CONSTRAINT `ticket` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`),
  CONSTRAINT `users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6326 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (5921,1104,11,81,4,1,NULL,'2022-05-05 21:23:06','129'),(5922,1104,11,81,4,1,NULL,'2022-05-05 21:23:06','129'),(5923,1104,11,81,4,1,NULL,'2022-05-05 21:23:06','129'),(5924,1104,24,81,4,2,NULL,'2022-05-05 21:23:12','20'),(5925,1104,24,81,4,2,NULL,'2022-05-05 21:23:12','20'),(5926,1104,24,81,4,2,NULL,'2022-05-05 21:23:12','20'),(5927,1104,25,81,4,3,NULL,'2022-05-05 21:24:35','20'),(5928,1104,25,81,4,3,NULL,'2022-05-05 21:24:35','20'),(5929,1104,25,81,4,3,NULL,'2022-05-05 21:24:35','20'),(5930,1104,12,81,5,3,NULL,'2022-05-05 21:24:47','129'),(5931,1104,12,81,5,3,NULL,'2022-05-05 21:24:47','129'),(5932,1104,12,81,4,3,NULL,'2022-05-05 21:24:47','129'),(5933,1104,12,81,4,1,NULL,'2022-05-05 21:24:54','129'),(5934,1106,24,40,4,3,NULL,'2022-05-05 21:29:09','20'),(5935,1103,24,40,5,3,NULL,'2022-05-05 21:37:07','20'),(5936,1103,23,40,5,3,NULL,'2022-05-05 21:37:08','20'),(5937,1106,12,40,4,3,NULL,'2022-05-05 21:47:33','120'),(5938,1107,12,40,5,3,NULL,'2022-05-05 21:48:45','120'),(5939,1106,8,40,5,3,NULL,'2022-05-05 21:49:04','99'),(5940,1103,7,41,4,3,NULL,'2022-05-05 21:54:03','99'),(5941,1103,29,41,4,3,NULL,'2022-05-05 21:54:05','25'),(5942,1103,29,41,4,3,NULL,'2022-05-05 21:54:24','25'),(5943,1103,29,41,4,3,NULL,'2022-05-05 21:54:24','25'),(5944,1103,29,41,4,3,NULL,'2022-05-05 21:54:24','25'),(5945,1103,29,41,4,1,NULL,'2022-05-05 21:54:30','25'),(5946,1106,14,40,5,3,NULL,'2022-05-05 22:18:56','65'),(5947,1106,8,40,5,3,NULL,'2022-05-05 22:19:08','99'),(5948,1106,8,40,5,3,NULL,'2022-05-05 22:21:18','99'),(5949,1106,12,40,5,3,NULL,'2022-05-05 22:23:09','120'),(5950,1106,20,40,4,3,NULL,'2022-05-05 22:23:11','123'),(5951,1106,8,40,5,1,NULL,'2022-05-05 22:23:16','99'),(5952,1106,8,40,5,1,NULL,'2022-05-05 22:24:41','99'),(5953,1108,7,41,4,3,NULL,'2022-05-05 22:25:22','99'),(5954,1108,25,41,4,3,NULL,'2022-05-05 22:25:26','20'),(5955,1106,8,40,5,3,NULL,'2022-05-05 22:45:54','99'),(5956,1106,8,40,5,3,NULL,'2022-05-05 22:45:54','99'),(5957,1106,8,40,5,3,NULL,'2022-05-05 22:45:54','99'),(5958,1106,12,40,5,3,NULL,'2022-05-05 22:48:11','120'),(5959,1106,11,40,5,3,NULL,'2022-05-05 22:48:17','129'),(5960,1106,11,40,5,1,NULL,'2022-05-05 22:48:25','129'),(5961,1106,12,40,5,3,NULL,'2022-05-05 22:51:30','120'),(5962,1106,12,40,5,3,NULL,'2022-05-05 22:52:33','120'),(5963,1106,12,40,5,1,NULL,'2022-05-05 22:52:36','120'),(5964,1106,12,40,5,1,NULL,'2022-05-05 22:52:36','120'),(5965,1106,12,40,4,1,NULL,'2022-05-05 22:52:46','120'),(5966,1106,12,40,4,1,NULL,'2022-05-05 22:53:26','120'),(5967,1105,7,40,4,3,NULL,'2022-05-05 22:58:50','99'),(5968,1106,7,40,4,3,NULL,'2022-05-05 22:59:05','99'),(5969,1106,20,40,4,3,NULL,'2022-05-05 22:59:18','123'),(5970,1104,11,51,4,3,NULL,'2022-05-05 22:59:58','129'),(5971,1104,8,51,5,3,NULL,'2022-05-05 23:00:05','99'),(5972,1104,24,51,4,1,NULL,'2022-05-05 23:00:09','20'),(5973,1104,27,51,4,2,NULL,'2022-05-05 23:00:14','20'),(5974,1104,27,51,4,2,NULL,'2022-05-05 23:00:14','20'),(5975,1104,27,51,4,2,NULL,'2022-05-05 23:00:14','20'),(5976,1104,27,51,4,2,NULL,'2022-05-05 23:00:14','20'),(5977,1104,27,51,4,2,NULL,'2022-05-05 23:00:14','20'),(5978,1109,23,40,4,3,NULL,'2022-05-05 23:01:33','20'),(5979,1106,7,40,4,3,NULL,'2022-05-05 23:05:19','99'),(5980,1106,12,40,4,3,NULL,'2022-05-05 23:05:21','120'),(5981,1104,8,51,4,1,NULL,'2022-05-05 23:07:18','99'),(5982,1104,8,51,4,2,NULL,'2022-05-05 23:07:18','99'),(5983,1110,8,51,5,2,NULL,'2022-05-05 23:11:34','99'),(5984,1110,11,51,4,2,NULL,'2022-05-05 23:11:42','129'),(5985,1110,8,51,4,2,NULL,'2022-05-05 23:11:44','99'),(5986,1110,20,51,4,2,NULL,'2022-05-05 23:11:45','123'),(5987,1110,23,51,4,2,NULL,'2022-05-05 23:11:46','20'),(5988,1110,25,51,4,2,NULL,'2022-05-05 23:11:47','20'),(5989,1110,11,51,4,2,NULL,'2022-05-05 23:11:57','129'),(5990,1110,64,51,4,2,NULL,'2022-05-05 23:12:09','95'),(5991,1110,12,51,4,2,NULL,'2022-05-05 23:12:13','120'),(5992,1111,52,51,3,2,NULL,'2022-05-05 23:13:01','249'),(5993,1111,53,51,3,1,NULL,'2022-05-05 23:13:43','299'),(5994,1111,53,51,3,1,NULL,'2022-05-05 23:13:43','299'),(5995,1111,53,51,3,1,NULL,'2022-05-05 23:13:43','299'),(5996,1111,53,51,3,1,NULL,'2022-05-05 23:13:43','299'),(5997,1111,53,51,3,1,NULL,'2022-05-05 23:13:43','299'),(5998,1111,53,51,3,1,NULL,'2022-05-05 23:13:43','299'),(5999,1111,53,51,3,1,NULL,'2022-05-05 23:13:43','299'),(6000,1110,7,51,4,1,NULL,'2022-05-05 23:14:02','99'),(6001,1110,7,51,4,1,NULL,'2022-05-05 23:14:03','99'),(6002,1112,14,51,4,1,NULL,'2022-05-05 23:14:33','65'),(6003,1112,19,51,4,1,NULL,'2022-05-05 23:14:38','50'),(6004,1112,23,51,4,1,NULL,'2022-05-05 23:14:47','20'),(6005,1105,16,40,4,3,NULL,'2022-05-05 23:20:37','85'),(6006,1105,14,40,4,3,NULL,'2022-05-05 23:20:53','65'),(6007,1105,11,40,4,3,NULL,'2022-05-05 23:35:21','129'),(6008,1105,20,40,4,3,NULL,'2022-05-05 23:35:24','123'),(6009,1105,8,40,4,3,NULL,'2022-05-05 23:35:25','99'),(6010,1105,24,40,4,3,NULL,'2022-05-05 23:35:26','20'),(6011,1110,11,40,4,3,NULL,'2022-05-05 23:41:16','129'),(6012,1110,8,40,4,3,NULL,'2022-05-05 23:41:19','99'),(6013,1110,25,40,4,3,NULL,'2022-05-05 23:41:22','20'),(6014,1105,7,40,7,3,NULL,'2022-05-05 23:42:51','99'),(6015,1105,18,40,7,3,NULL,'2022-05-05 23:43:07','50'),(6016,1112,18,40,7,3,NULL,'2022-05-05 23:45:05','50'),(6017,1112,19,40,7,3,NULL,'2022-05-05 23:45:06','50'),(6018,1113,52,40,7,3,NULL,'2022-05-05 23:45:20','249'),(6019,1113,12,40,7,3,NULL,'2022-05-05 23:45:24','120'),(6020,1112,12,40,7,3,NULL,'2022-05-05 23:45:34','120'),(6021,1112,46,40,7,3,NULL,'2022-05-05 23:45:36','100'),(6022,1114,12,40,7,3,NULL,'2022-05-05 23:45:57','120'),(6023,1114,46,40,7,3,NULL,'2022-05-05 23:45:59','100'),(6024,1105,12,40,7,3,NULL,'2022-05-05 23:48:18','120'),(6025,1105,12,40,7,3,NULL,'2022-05-05 23:49:19','120'),(6026,1107,12,40,5,3,NULL,'2022-05-05 23:50:54','120'),(6027,1104,11,40,4,3,NULL,'2022-05-05 23:54:22','129'),(6028,1104,28,40,4,3,NULL,'2022-05-05 23:54:23','10'),(6029,1104,8,40,4,3,NULL,'2022-05-05 23:54:29','99'),(6030,1104,24,40,4,3,NULL,'2022-05-05 23:54:32','20'),(6031,1104,12,40,5,3,NULL,'2022-05-05 23:54:56','120'),(6032,1104,20,40,4,3,NULL,'2022-05-05 23:54:59','123'),(6033,1104,13,40,4,3,NULL,'2022-05-05 23:55:02','199'),(6034,1104,12,40,5,3,NULL,'2022-05-05 23:56:17','120'),(6035,1104,12,40,5,3,NULL,'2022-05-05 23:56:17','120'),(6036,1104,12,40,5,3,NULL,'2022-05-05 23:56:17','120'),(6037,1104,12,40,5,1,NULL,'2022-05-05 23:56:22','120'),(6038,1104,12,40,5,1,NULL,'2022-05-05 23:56:22','120'),(6039,1106,12,40,5,3,NULL,'2022-05-05 23:58:53','120'),(6040,1106,28,40,4,3,NULL,'2022-05-05 23:58:55','10'),(6041,1106,28,40,4,1,NULL,'2022-05-05 23:59:08','10'),(6042,1106,28,40,5,2,NULL,'2022-05-05 23:59:08','10'),(6043,1106,28,40,4,3,NULL,'2022-05-05 23:59:08','10'),(6044,1106,28,40,4,3,NULL,'2022-05-05 23:59:08','10'),(6045,1106,28,40,4,3,NULL,'2022-05-05 23:59:08','10'),(6046,1107,53,41,4,3,NULL,'2022-05-06 00:16:31','299'),(6047,1107,53,41,4,3,NULL,'2022-05-06 00:16:35','299'),(6048,1107,53,41,4,3,NULL,'2022-05-06 00:16:41','299'),(6049,1104,46,81,4,3,NULL,'2022-05-06 00:16:51','100'),(6050,1114,7,41,4,3,NULL,'2022-05-06 00:17:04','99'),(6051,1104,8,81,5,3,NULL,'2022-05-06 00:17:26','99'),(6052,1114,7,41,4,3,NULL,'2022-05-06 00:17:29','99'),(6053,1114,23,41,4,3,NULL,'2022-05-06 00:17:45','20'),(6054,1107,13,81,1,3,NULL,'2022-05-06 00:22:51','199'),(6055,1114,25,41,4,3,NULL,'2022-05-06 00:24:05','20'),(6056,1114,23,41,4,3,NULL,'2022-05-06 00:24:09','20'),(6057,1114,25,41,4,3,NULL,'2022-05-06 00:24:11','20'),(6058,1107,25,41,4,3,NULL,'2022-05-06 00:24:28','20'),(6059,1107,23,41,4,1,NULL,'2022-05-06 00:24:34','20'),(6060,1107,23,41,4,1,NULL,'2022-05-06 00:24:34','20'),(6061,1107,23,41,4,1,NULL,'2022-05-06 00:24:34','20'),(6062,1107,23,41,4,2,NULL,'2022-05-06 00:24:44','20'),(6063,1113,13,81,4,3,NULL,'2022-05-06 00:24:47','199'),(6064,1103,53,41,4,2,NULL,'2022-05-06 00:25:04','299'),(6065,1103,13,81,5,3,NULL,'2022-05-06 00:25:07','199'),(6066,1104,23,81,4,3,NULL,'2022-05-06 00:29:09','20'),(6067,1115,8,81,3,3,NULL,'2022-05-06 00:31:08','99'),(6068,1115,8,81,3,3,NULL,'2022-05-06 00:31:08','99'),(6069,1115,8,81,3,3,NULL,'2022-05-06 00:31:08','99'),(6070,1115,8,81,3,2,NULL,'2022-05-06 00:31:17','99'),(6071,1115,8,81,3,2,NULL,'2022-05-06 00:31:17','99'),(6072,1115,53,81,4,3,NULL,'2022-05-06 00:34:46','299'),(6073,1115,53,81,4,3,NULL,'2022-05-06 00:34:46','299'),(6074,1115,53,81,4,1,NULL,'2022-05-06 00:34:59','299'),(6075,1115,21,81,3,3,NULL,'2022-05-06 00:35:39','20'),(6076,1115,21,81,3,1,NULL,'2022-05-06 00:35:45','20'),(6077,1115,12,81,3,3,NULL,'2022-05-06 00:37:00','120'),(6078,1115,12,81,3,3,NULL,'2022-05-06 00:37:00','120'),(6079,1115,12,81,3,1,NULL,'2022-05-06 00:37:04','120'),(6080,1115,46,81,3,3,NULL,'2022-05-06 00:37:13','100'),(6081,1115,46,81,3,1,NULL,'2022-05-06 00:37:21','100'),(6082,1103,7,41,4,3,NULL,'2022-05-06 00:38:06','99'),(6083,1103,7,41,4,3,NULL,'2022-05-06 00:38:35','99'),(6084,1103,7,41,4,3,NULL,'2022-05-06 00:38:50','99'),(6085,1115,46,81,3,3,NULL,'2022-05-06 00:40:01','100'),(6086,1115,14,81,3,3,NULL,'2022-05-06 00:41:26','65'),(6087,1115,14,81,3,3,NULL,'2022-05-06 00:41:26','65'),(6088,1115,64,81,3,3,NULL,'2022-05-06 00:41:33','95'),(6089,1115,64,81,3,1,NULL,'2022-05-06 00:41:42','95'),(6090,1115,64,81,3,2,NULL,'2022-05-06 00:41:42','95'),(6091,1116,7,41,3,3,NULL,'2022-05-06 00:44:21','99'),(6092,1116,24,41,3,3,NULL,'2022-05-06 00:44:23','20'),(6093,1116,8,41,3,3,NULL,'2022-05-06 00:44:26','99'),(6094,1114,7,41,4,3,NULL,'2022-05-06 00:55:12','99'),(6095,1103,7,41,4,3,NULL,'2022-05-06 00:57:58','99'),(6096,1117,14,51,4,3,NULL,'2022-05-06 01:07:04','65'),(6097,1118,21,51,4,3,NULL,'2022-05-06 01:09:56','20'),(6098,1118,21,51,4,3,NULL,'2022-05-06 01:09:56','20'),(6099,1118,21,51,4,3,NULL,'2022-05-06 01:09:56','20'),(6100,1118,11,51,4,3,NULL,'2022-05-06 01:10:05','129'),(6101,1118,28,51,4,3,NULL,'2022-05-06 01:10:10','10'),(6102,1118,28,51,4,3,NULL,'2022-05-06 01:10:10','10'),(6103,1118,28,51,4,3,NULL,'2022-05-06 01:10:10','10'),(6104,1118,10,50,5,3,NULL,'2022-05-06 01:34:45','99'),(6105,1118,10,50,5,3,NULL,'2022-05-06 01:34:45','99'),(6106,1118,10,50,5,3,NULL,'2022-05-06 01:34:45','99'),(6107,1118,46,50,5,3,NULL,'2022-05-06 01:35:01','100'),(6108,1118,46,50,5,3,NULL,'2022-05-06 01:35:01','100'),(6109,1118,46,50,5,3,NULL,'2022-05-06 01:35:01','100'),(6110,1118,46,50,4,3,NULL,'2022-05-06 01:35:59','100'),(6111,1118,46,50,4,3,NULL,'2022-05-06 01:35:59','100'),(6112,1118,46,50,4,3,NULL,'2022-05-06 01:35:59','100'),(6113,1118,46,50,4,3,NULL,'2022-05-06 01:35:59','100'),(6114,1118,19,50,4,3,NULL,'2022-05-06 01:36:30','50'),(6115,1118,19,50,4,3,NULL,'2022-05-06 01:36:30','50'),(6116,1118,19,50,4,3,NULL,'2022-05-06 01:36:30','50'),(6117,1118,19,50,4,3,NULL,'2022-05-06 01:36:30','50'),(6118,1118,19,50,4,3,NULL,'2022-05-06 01:36:30','50'),(6119,1118,46,50,4,3,NULL,'2022-05-06 01:36:37','100'),(6120,1118,64,50,4,3,NULL,'2022-05-06 01:36:49','95'),(6121,1118,64,50,4,3,NULL,'2022-05-06 01:36:49','95'),(6122,1118,64,50,4,3,NULL,'2022-05-06 01:36:49','95'),(6123,1113,12,81,1,1,NULL,'2022-05-06 20:10:02','120'),(6124,1104,8,81,5,2,NULL,'2022-05-06 20:17:37','99'),(6125,1104,8,81,5,1,NULL,'2022-05-06 20:17:37','99'),(6126,1119,10,81,3,2,NULL,'2022-05-07 04:23:49','99'),(6127,1119,10,81,3,3,NULL,'2022-05-07 04:24:13','99'),(6128,1103,7,41,4,3,NULL,'2022-05-07 04:27:10','99'),(6129,1103,25,41,4,3,NULL,'2022-05-07 04:27:15','20'),(6130,1103,23,41,4,1,NULL,'2022-05-07 04:27:32','20'),(6131,1103,23,41,4,1,NULL,'2022-05-07 04:27:32','20'),(6132,1103,23,41,4,1,NULL,'2022-05-07 04:27:41','20'),(6133,1104,28,40,4,3,NULL,'2022-05-07 04:29:45','10'),(6134,1104,20,40,4,3,NULL,'2022-05-07 04:29:56','123'),(6135,1104,21,40,4,2,NULL,'2022-05-07 04:30:13','20'),(6136,1103,46,41,5,3,NULL,'2022-05-07 05:07:38','100'),(6137,1103,7,41,5,3,NULL,'2022-05-07 05:08:51','99'),(6138,1103,26,41,5,3,NULL,'2022-05-07 05:09:34','20'),(6139,1103,23,41,5,3,NULL,'2022-05-07 05:09:46','20'),(6140,1103,23,41,5,3,NULL,'2022-05-07 05:09:46','20'),(6141,1103,23,41,5,3,NULL,'2022-05-07 05:09:46','20'),(6142,1103,25,41,5,3,NULL,'2022-05-07 05:09:52','20'),(6143,1103,25,41,5,3,NULL,'2022-05-07 05:09:52','20'),(6144,1103,25,41,5,3,NULL,'2022-05-07 05:09:52','20'),(6145,1103,25,41,5,3,NULL,'2022-05-07 05:09:52','20'),(6146,1103,25,41,5,3,NULL,'2022-05-07 05:09:52','20'),(6147,1103,25,41,5,3,NULL,'2022-05-07 05:09:52','20'),(6148,1103,23,41,5,3,NULL,'2022-05-07 05:58:23','20'),(6149,1103,26,41,5,3,NULL,'2022-05-07 05:58:27','20'),(6150,1103,26,41,5,3,NULL,'2022-05-07 05:58:27','20'),(6151,1103,26,41,5,3,NULL,'2022-05-07 05:58:27','20'),(6152,1103,26,41,5,3,NULL,'2022-05-07 05:58:27','20'),(6153,1103,16,41,5,3,NULL,'2022-05-07 05:58:32','85'),(6154,1103,16,41,5,3,NULL,'2022-05-07 05:58:32','85'),(6155,1103,16,41,5,3,NULL,'2022-05-07 05:58:32','85'),(6156,1103,16,41,5,3,NULL,'2022-05-07 05:58:32','85'),(6157,1103,16,41,5,3,NULL,'2022-05-07 05:58:32','85'),(6158,1103,16,41,5,1,NULL,'2022-05-07 05:58:37','85'),(6159,1103,16,41,5,1,NULL,'2022-05-07 05:58:53','85'),(6160,1103,16,41,5,1,NULL,'2022-05-07 05:58:53','85'),(6161,1103,16,41,5,1,NULL,'2022-05-07 05:58:53','85'),(6162,1103,16,41,5,2,NULL,'2022-05-07 05:58:59','85'),(6163,1103,16,41,5,2,NULL,'2022-05-07 05:58:59','85'),(6164,1103,16,41,5,2,NULL,'2022-05-07 05:58:59','85'),(6165,1103,16,41,5,2,NULL,'2022-05-07 05:58:59','85'),(6166,1114,52,41,4,3,NULL,'2022-05-07 06:00:17','249'),(6167,1104,7,40,4,1,NULL,'2022-05-07 06:00:48','99'),(6168,1104,19,40,4,1,NULL,'2022-05-07 06:01:26','50'),(6169,1120,28,40,4,1,NULL,'2022-05-07 06:02:01','10'),(6170,1110,28,40,5,1,NULL,'2022-05-07 06:02:11','10'),(6171,1116,11,41,3,3,NULL,'2022-05-07 07:11:30','129'),(6172,1116,12,41,3,1,NULL,'2022-05-07 07:12:26','120'),(6173,1120,11,46,4,3,NULL,'2022-05-07 07:15:39','129'),(6174,1104,14,46,4,3,NULL,'2022-05-07 07:20:16','65'),(6175,1104,14,46,4,3,NULL,'2022-05-07 07:20:16','65'),(6176,1120,14,40,4,3,NULL,'2022-05-07 07:20:56','65'),(6177,1120,52,40,4,3,NULL,'2022-05-07 07:21:07','249'),(6178,1120,64,40,4,3,NULL,'2022-05-07 07:22:09','95'),(6179,1120,28,40,4,3,NULL,'2022-05-07 07:23:17','10'),(6180,1120,12,46,4,3,NULL,'2022-05-07 07:27:55','120'),(6181,1121,12,51,4,3,NULL,'2022-05-07 07:28:07','120'),(6182,1121,12,51,4,3,NULL,'2022-05-07 07:28:07','120'),(6183,1121,12,51,4,3,NULL,'2022-05-07 07:28:07','120'),(6184,1121,12,51,4,3,NULL,'2022-05-07 07:28:07','120'),(6185,1121,28,51,4,3,NULL,'2022-05-07 07:32:18','10'),(6186,1121,28,51,4,3,NULL,'2022-05-07 07:32:18','10'),(6187,1121,28,51,4,3,NULL,'2022-05-07 07:32:18','10'),(6188,1121,52,51,4,3,NULL,'2022-05-07 07:34:53','249'),(6189,1104,20,46,4,3,NULL,'2022-05-07 07:35:25','123'),(6190,1104,20,46,4,3,NULL,'2022-05-07 07:35:25','123'),(6191,1104,13,40,5,3,NULL,'2022-05-07 07:41:41','199'),(6192,1105,19,46,5,3,NULL,'2022-05-07 08:10:50','50'),(6193,1105,19,46,5,3,NULL,'2022-05-07 08:10:50','50'),(6194,1105,19,46,5,3,NULL,'2022-05-07 08:10:50','50'),(6195,1105,19,46,5,3,NULL,'2022-05-07 08:10:50','50'),(6196,1105,19,46,5,3,NULL,'2022-05-07 08:10:50','50'),(6197,1105,19,46,5,3,NULL,'2022-05-07 08:11:16','50'),(6198,1105,19,46,5,3,NULL,'2022-05-07 08:11:16','50'),(6199,1105,19,46,4,3,NULL,'2022-05-07 08:11:16','50'),(6200,1105,19,46,4,3,NULL,'2022-05-07 08:11:16','50'),(6201,1105,19,46,4,3,NULL,'2022-05-07 08:11:16','50'),(6202,1122,64,46,4,3,NULL,'2022-05-07 09:06:56','95'),(6203,1122,24,46,4,1,NULL,'2022-05-07 09:07:11','20'),(6204,1105,11,46,4,3,NULL,'2022-05-07 09:16:33','129'),(6205,1105,11,46,4,3,NULL,'2022-05-07 09:16:42','129'),(6206,1105,10,46,4,3,NULL,'2022-05-07 09:17:11','99'),(6207,1105,10,46,4,3,NULL,'2022-05-07 09:17:11','99'),(6208,1106,17,46,4,3,NULL,'2022-05-07 09:18:59','135'),(6209,1106,17,46,4,3,NULL,'2022-05-07 09:18:59','135'),(6210,1106,17,46,4,3,NULL,'2022-05-07 09:18:59','135'),(6211,1106,17,46,4,3,NULL,'2022-05-07 09:18:59','135'),(6212,1108,14,46,7,3,NULL,'2022-05-07 09:29:06','65'),(6213,1108,14,46,7,3,NULL,'2022-05-07 09:29:06','65'),(6214,1108,14,46,7,1,NULL,'2022-05-07 09:29:22','65'),(6215,1108,14,46,7,3,NULL,'2022-05-07 09:29:22','65'),(6216,1108,16,46,5,3,NULL,'2022-05-07 09:33:19','85'),(6217,1108,16,46,5,3,NULL,'2022-05-07 09:33:19','85'),(6218,1108,16,46,5,3,NULL,'2022-05-07 09:33:19','85'),(6219,1108,16,46,5,3,NULL,'2022-05-07 09:33:19','85'),(6220,1108,16,46,5,3,NULL,'2022-05-07 09:33:33','85'),(6221,1117,52,41,1,3,NULL,'2022-05-07 09:34:57','249'),(6222,1108,46,46,5,3,NULL,'2022-05-07 09:35:05','100'),(6223,1117,52,41,1,3,NULL,'2022-05-07 09:35:09','249'),(6224,1117,24,41,1,3,NULL,'2022-05-07 09:35:47','20'),(6225,1123,24,41,4,3,NULL,'2022-05-07 09:35:53','20'),(6226,1123,23,41,4,3,NULL,'2022-05-07 09:35:55','20'),(6227,1123,23,41,4,3,NULL,'2022-05-07 09:35:58','20'),(6228,1123,23,41,4,3,NULL,'2022-05-07 09:35:58','20'),(6229,1123,52,41,4,3,NULL,'2022-05-07 09:36:04','249'),(6230,1103,10,46,5,3,NULL,'2022-05-07 09:41:44','99'),(6231,1103,22,46,4,2,NULL,'2022-05-07 09:42:24','69'),(6232,1103,22,46,4,3,NULL,'2022-05-07 09:42:41','69'),(6233,1103,22,46,4,3,NULL,'2022-05-07 09:42:41','69'),(6234,1111,21,46,5,3,NULL,'2022-05-07 09:46:27','20'),(6235,1111,21,46,5,3,NULL,'2022-05-07 09:46:27','20'),(6236,1111,21,46,5,3,NULL,'2022-05-07 09:46:27','20'),(6237,1111,21,46,5,3,NULL,'2022-05-07 09:46:27','20'),(6238,1111,21,46,5,3,NULL,'2022-05-07 09:46:27','20'),(6239,1111,13,46,7,3,NULL,'2022-05-07 09:48:17','199'),(6240,1110,46,48,5,3,NULL,'2022-05-07 09:53:15','100'),(6241,1112,7,48,4,3,NULL,'2022-05-07 09:54:39','99'),(6242,1112,46,48,4,3,NULL,'2022-05-07 09:55:37','100'),(6243,1116,52,41,4,3,NULL,'2022-05-07 10:00:35','249'),(6244,1115,52,41,1,3,NULL,'2022-05-07 10:03:57','249'),(6245,1124,52,41,4,3,NULL,'2022-05-07 10:04:15','249'),(6246,1112,20,46,4,3,NULL,'2022-05-07 10:31:40','123'),(6247,1112,8,46,4,3,NULL,'2022-05-07 10:31:45','99'),(6248,1112,25,46,4,3,NULL,'2022-05-07 10:31:49','20'),(6249,1112,8,46,4,3,NULL,'2022-05-07 10:32:12','99'),(6250,1125,20,46,4,3,NULL,'2022-05-07 10:44:01','123'),(6251,1125,28,46,4,3,NULL,'2022-05-07 10:44:02','10'),(6252,1125,8,46,4,3,NULL,'2022-05-07 10:44:04','99'),(6253,1122,12,51,7,3,NULL,'2022-05-07 11:04:04','120'),(6254,1122,12,51,7,3,NULL,'2022-05-07 11:04:04','120'),(6255,1122,12,51,7,3,NULL,'2022-05-07 11:04:04','120'),(6256,1122,12,51,7,3,NULL,'2022-05-07 11:04:04','120'),(6257,1122,12,51,7,3,NULL,'2022-05-07 11:04:04','120'),(6258,1105,18,46,5,3,NULL,'2022-05-07 11:06:00','50'),(6259,1105,18,46,5,2,NULL,'2022-05-07 11:06:12','50'),(6260,1120,14,51,4,3,NULL,'2022-05-07 11:06:40','65'),(6261,1120,14,51,4,3,NULL,'2022-05-07 11:06:40','65'),(6262,1120,14,51,4,3,NULL,'2022-05-07 11:06:40','65'),(6263,1120,14,51,4,3,NULL,'2022-05-07 11:06:40','65'),(6264,1105,21,46,5,3,NULL,'2022-05-07 11:08:03','20'),(6265,1105,21,46,5,1,NULL,'2022-05-07 11:15:23','20'),(6266,1105,17,46,5,3,NULL,'2022-05-07 11:33:18','135'),(6267,1105,17,46,5,1,NULL,'2022-05-07 11:33:53','135'),(6268,1105,17,46,5,3,NULL,'2022-05-07 11:34:12','135'),(6269,1105,17,46,5,1,NULL,'2022-05-07 11:41:35','135'),(6270,1105,28,40,5,2,NULL,'2022-05-07 11:50:32','10'),(6271,1105,28,40,5,2,NULL,'2022-05-07 11:50:32','10'),(6272,1105,28,40,5,2,NULL,'2022-05-07 11:50:32','10'),(6273,1105,28,40,5,2,NULL,'2022-05-07 11:50:32','10'),(6274,1105,20,40,7,2,NULL,'2022-05-07 11:50:39','123'),(6275,1105,20,40,7,2,NULL,'2022-05-07 11:50:39','123'),(6276,1105,20,40,7,2,NULL,'2022-05-07 11:50:39','123'),(6277,1105,20,40,7,2,NULL,'2022-05-07 11:50:39','123'),(6278,1105,20,40,5,1,NULL,'2022-05-07 11:50:48','123'),(6279,1105,20,40,5,1,NULL,'2022-05-07 11:50:48','123'),(6280,1105,20,40,5,1,NULL,'2022-05-07 11:50:48','123'),(6281,1105,28,46,5,1,NULL,'2022-05-07 12:12:02','10'),(6282,1104,28,40,5,3,NULL,'2022-05-07 12:12:30','10'),(6283,1104,8,40,5,3,NULL,'2022-05-07 12:12:31','99'),(6284,1104,24,40,5,3,NULL,'2022-05-07 12:12:32','20'),(6285,1104,23,40,5,3,NULL,'2022-05-07 12:12:33','20'),(6286,1104,25,40,5,3,NULL,'2022-05-07 12:12:35','20'),(6287,1104,29,40,5,3,NULL,'2022-05-07 12:12:36','25'),(6288,1104,27,40,5,3,NULL,'2022-05-07 12:12:37','20'),(6289,1104,47,40,5,3,NULL,'2022-05-07 12:12:38','20'),(6290,1104,26,40,5,3,NULL,'2022-05-07 12:12:40','20'),(6291,1104,11,40,5,3,NULL,'2022-05-07 12:12:41','129'),(6292,1104,12,40,5,3,NULL,'2022-05-07 12:12:42','120'),(6293,1104,10,40,5,3,NULL,'2022-05-07 12:12:43','99'),(6294,1104,64,40,5,3,NULL,'2022-05-07 12:12:46','95'),(6295,1104,14,40,5,3,NULL,'2022-05-07 12:12:47','65'),(6296,1104,16,40,5,3,NULL,'2022-05-07 12:12:48','85'),(6297,1104,21,40,5,3,NULL,'2022-05-07 12:12:50','20'),(6298,1104,18,40,5,3,NULL,'2022-05-07 12:12:51','50'),(6299,1104,19,40,5,3,NULL,'2022-05-07 12:12:52','50'),(6300,1104,22,40,5,3,NULL,'2022-05-07 12:12:53','69'),(6301,1104,17,40,5,3,NULL,'2022-05-07 12:12:54','135'),(6302,1104,13,40,5,3,NULL,'2022-05-07 12:12:55','199'),(6303,1104,52,40,5,3,NULL,'2022-05-07 12:12:56','249'),(6304,1104,53,40,5,3,NULL,'2022-05-07 12:12:57','299'),(6305,1105,28,40,7,3,NULL,'2022-05-07 12:15:32','10'),(6306,1104,11,40,1,3,NULL,'2022-05-07 12:22:12','129'),(6307,1104,20,40,5,2,NULL,'2022-05-07 12:22:19','123'),(6308,1104,20,40,5,2,NULL,'2022-05-07 12:22:19','123'),(6309,1106,11,40,1,3,NULL,'2022-05-07 12:25:18','129'),(6310,1104,29,40,1,1,NULL,'2022-05-07 12:29:56','25'),(6311,1104,29,40,1,2,NULL,'2022-05-07 12:36:57','25'),(6312,1104,27,40,1,2,NULL,'2022-05-07 12:38:52','20'),(6313,1104,47,40,1,2,NULL,'2022-05-07 12:38:55','20'),(6314,1104,12,40,1,2,NULL,'2022-05-07 12:38:56','120'),(6315,1104,7,40,1,2,NULL,'2022-05-07 12:38:58','99'),(6316,1104,19,40,1,2,NULL,'2022-05-07 12:39:00','50'),(6317,1104,17,40,1,2,NULL,'2022-05-07 12:39:01','135'),(6318,1104,52,40,1,2,NULL,'2022-05-07 12:39:03','249'),(6319,1114,16,41,1,3,NULL,'2022-05-07 13:00:37','85'),(6320,1114,16,41,1,3,NULL,'2022-05-07 13:00:37','85'),(6321,1114,16,41,1,3,NULL,'2022-05-07 13:00:37','85'),(6322,1105,20,46,5,1,NULL,'2022-05-07 13:19:30','123'),(6323,1105,17,46,7,1,NULL,'2022-05-07 13:20:25','135'),(6324,1127,46,48,3,3,NULL,'2022-05-07 14:20:26','100'),(6325,1104,12,48,4,3,NULL,'2022-05-07 14:29:02','120');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'What Is your favorite book?'),(2,'What is the name of the road you grew up on?'),(3,'What is your mother’s maiden name?'),(4,'What was the name of your first/current/favorite pet?'),(5,'What was the first company that you worked for?'),(6,'Where did you meet your spouse?'),(7,'Where did you go to high school/college?'),(8,'What is your favorite food?'),(9,'What city were you born in?'),(10,'Where is your favorite place to vacation?');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin'),(2,'Cashier'),(3,'Waiter'),(4,'Kitchen');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_category`
--

DROP TABLE IF EXISTS `status_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_category`
--

LOCK TABLES `status_category` WRITE;
/*!40000 ALTER TABLE `status_category` DISABLE KEYS */;
INSERT INTO `status_category` VALUES (1,'enabled'),(2,'disabled');
/*!40000 ALTER TABLE `status_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_discount`
--

DROP TABLE IF EXISTS `status_discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_discount`
--

LOCK TABLES `status_discount` WRITE;
/*!40000 ALTER TABLE `status_discount` DISABLE KEYS */;
INSERT INTO `status_discount` VALUES (1,'Available'),(2,'Unavailable'),(3,'Archived');
/*!40000 ALTER TABLE `status_discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_menu`
--

DROP TABLE IF EXISTS `status_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_menu`
--

LOCK TABLES `status_menu` WRITE;
/*!40000 ALTER TABLE `status_menu` DISABLE KEYS */;
INSERT INTO `status_menu` VALUES (1,'Available'),(2,'Unavailable'),(3,'Archived');
/*!40000 ALTER TABLE `status_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_order`
--

DROP TABLE IF EXISTS `status_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_order`
--

LOCK TABLES `status_order` WRITE;
/*!40000 ALTER TABLE `status_order` DISABLE KEYS */;
INSERT INTO `status_order` VALUES (1,'unconfirmed'),(2,'pending'),(3,'ready'),(4,'delivered'),(5,'cancelled'),(6,'preparing'),(7,'out of stock');
/*!40000 ALTER TABLE `status_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_submenu`
--

DROP TABLE IF EXISTS `status_submenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_submenu`
--

LOCK TABLES `status_submenu` WRITE;
/*!40000 ALTER TABLE `status_submenu` DISABLE KEYS */;
INSERT INTO `status_submenu` VALUES (1,'Available'),(2,'Unavailable'),(3,'Archived');
/*!40000 ALTER TABLE `status_submenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_table`
--

DROP TABLE IF EXISTS `status_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_table`
--

LOCK TABLES `status_table` WRITE;
/*!40000 ALTER TABLE `status_table` DISABLE KEYS */;
INSERT INTO `status_table` VALUES (1,'Available'),(2,'Pending'),(3,'Delivered'),(4,'Disabled'),(5,'Archived'),(6,'To Serve');
/*!40000 ALTER TABLE `status_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_ticket`
--

DROP TABLE IF EXISTS `status_ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_ticket`
--

LOCK TABLES `status_ticket` WRITE;
/*!40000 ALTER TABLE `status_ticket` DISABLE KEYS */;
INSERT INTO `status_ticket` VALUES (3,'cancelled'),(1,'paid'),(2,'unpaid');
/*!40000 ALTER TABLE `status_ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_user`
--

DROP TABLE IF EXISTS `status_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_user` (
  `id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_user`
--

LOCK TABLES `status_user` WRITE;
/*!40000 ALTER TABLE `status_user` DISABLE KEYS */;
INSERT INTO `status_user` VALUES (1,'New'),(2,'Employeed'),(3,'Archived');
/*!40000 ALTER TABLE `status_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category_menu`
--

DROP TABLE IF EXISTS `sub_category_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_category_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categ_idx` (`Category_Id`),
  CONSTRAINT `categ` FOREIGN KEY (`Category_Id`) REFERENCES `category_menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category_menu`
--

LOCK TABLES `sub_category_menu` WRITE;
/*!40000 ALTER TABLE `sub_category_menu` DISABLE KEYS */;
INSERT INTO `sub_category_menu` VALUES (0,'ALL',6),(1,'LIQOUR',4),(2,'SOFTDRINKS',4),(3,'JUICE',4);
/*!40000 ALTER TABLE `sub_category_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submenu`
--

DROP TABLE IF EXISTS `submenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `statuz_idx` (`status_id`),
  CONSTRAINT `statuz` FOREIGN KEY (`status_id`) REFERENCES `status_submenu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submenu`
--

LOCK TABLES `submenu` WRITE;
/*!40000 ALTER TABLE `submenu` DISABLE KEYS */;
INSERT INTO `submenu` VALUES (1,'egg',10,'images/submenu/1/submenu.jpg',1,1,1),(2,'manok',0,'images/submenu.png',2,1,NULL),(3,'gagana?',100,'images/submenu.png',3,1,NULL),(4,'gumana ka please',100,'images/submenu.png',3,1,NULL),(5,'fishball',5,'images/submenu.png',2,1,NULL),(6,'rice',12,'images/submenu.png',1,1,NULL),(7,'squidball',5,'images/submenu.png',1,1,NULL),(8,'riceball',28,'images/submenu/8/submenu.jpg',3,1,NULL),(9,'kanin',26,'images/submenu/9/submenu.jpg',3,1,NULL);
/*!40000 ALTER TABLE `submenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemsettings`
--

DROP TABLE IF EXISTS `systemsettings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemsettings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemsettings`
--

LOCK TABLES `systemsettings` WRITE;
/*!40000 ALTER TABLE `systemsettings` DISABLE KEYS */;
INSERT INTO `systemsettings` VALUES (1,'Address','Upper Ground Umipig Building, Quezon Street, Brgy. San Roque ( 2nd Level of Motorzone Castillejos) 2208 Castillejos, Philippines'),(2,'Contact Number','0916-777-7524');
/*!40000 ALTER TABLE `systemsettings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tablename` varchar(45) NOT NULL,
  `table_status_id` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `end_time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table-status_idx` (`table_status_id`),
  CONSTRAINT `tablestat` FOREIGN KEY (`table_status_id`) REFERENCES `status_table` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` VALUES (1,'1',3,0,0,'2022-05-07 16:53:43'),(2,'2',3,0,0,''),(3,'3',3,0,0,''),(4,'4',3,0,0,'2022-05-07 18:53:15'),(5,'5',3,0,0,''),(6,'6',1,0,0,''),(7,'7',2,0,0,''),(8,'8',3,0,0,''),(9,'9',3,0,0,''),(10,'10',3,0,0,''),(11,'11',3,0,0,''),(12,'12',3,0,0,'2022-05-07 19:07:21'),(13,'13',3,0,0,'2022-05-07 17:08:26'),(14,'14',3,0,0,'2022-05-06 09:56:11'),(15,'15',3,0,0,''),(16,'16',3,NULL,NULL,''),(17,'17',2,NULL,NULL,''),(18,'18',3,NULL,NULL,'2022-05-07 19:31:01'),(19,'19',3,NULL,NULL,''),(20,'20',3,NULL,NULL,'2022-05-07 17:07:12'),(21,'21',3,NULL,NULL,''),(22,'22',3,NULL,NULL,''),(23,'23',3,NULL,NULL,'2022-05-07 19:34:47'),(24,'24',3,NULL,NULL,'2022-05-07 19:34:03'),(25,'25',1,NULL,NULL,''),(26,'26',1,NULL,NULL,''),(27,'27',2,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) NOT NULL,
  `ticket_status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Total_Price` int(11) DEFAULT NULL,
  `Received_total` int(11) DEFAULT NULL,
  `Change_total` int(11) DEFAULT NULL,
  `Start_time` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tables_idx` (`table_id`),
  KEY `stats_idx` (`ticket_status_id`),
  KEY `users_idx` (`user_id`),
  KEY `users_id` (`user_id`),
  CONSTRAINT `stats` FOREIGN KEY (`ticket_status_id`) REFERENCES `status_ticket` (`id`),
  CONSTRAINT `tables` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`),
  CONSTRAINT `userss` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1128 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (1103,6,2,40,0,0,0,'0'),(1104,1,2,81,0,0,0,'3:23 pm'),(1105,2,2,40,0,0,0,'0'),(1106,3,2,40,0,0,0,'0'),(1107,4,2,40,0,0,0,'5:23 pm'),(1108,5,2,41,0,0,0,'0'),(1109,7,2,40,0,0,0,'0'),(1110,10,2,51,0,0,0,'0'),(1111,8,2,51,0,0,0,'0'),(1112,9,2,51,0,0,0,'0'),(1113,14,2,40,0,0,0,'8:26 am'),(1114,11,2,40,0,0,0,'0'),(1115,24,2,81,0,0,0,'6:04 pm'),(1116,18,2,41,0,0,0,'6:01 pm'),(1117,15,2,51,0,0,0,'0'),(1118,16,2,51,0,0,0,'0'),(1119,17,2,81,0,0,0,'0'),(1120,13,2,46,0,0,0,'3:38 pm'),(1121,20,2,51,0,0,0,'3:37 pm'),(1122,19,2,46,0,0,0,'0'),(1123,12,2,41,0,0,0,'5:37 pm'),(1124,23,2,41,0,0,0,'6:04 pm'),(1125,21,2,46,0,0,0,'0'),(1126,27,2,51,0,0,0,'0'),(1127,22,2,48,0,0,0,'0');
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `Answers_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `archived_at` timestamp NULL DEFAULT NULL,
  `reset_by` int(11) DEFAULT NULL,
  `reset_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `role_idx` (`role_id`),
  KEY `status_idx` (`status_id`),
  KEY `answer_idx` (`Answers_id`),
  CONSTRAINT `answer` FOREIGN KEY (`Answers_id`) REFERENCES `answers` (`id`),
  CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `status` FOREIGN KEY (`status_id`) REFERENCES `status_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Lordan Lingat','/images/employee/1/nica.png','lordanniel','$2y$10$4.PB7xvhI052lmo4OSwpdOrlugXtQZTsnqhPpLeAE2WB5f1WBnK/i',1,2,1,NULL,'Mk0TEJo3JArMShlHcC03jKe59ZopJmSlVqiw0vfccq9JfhWDPGhMnhGX06Sl','2021-12-28 06:27:30','2022-05-07 14:52:12','2022-05-01 15:43:03',1,'2022-05-04 16:00:00'),(2,'Joel Nacionales','/images/profile/default.png','waiter','$2y$10$ui7z.70FKZ5VESiBKdmWbeFyCZLx93JIF0IP.Mapo6VVIE3ZOdBKa',3,3,NULL,NULL,NULL,'2021-12-28 06:43:28','2022-05-03 14:00:49','2022-03-19 01:35:35',NULL,NULL),(3,'john riel recosana','/images/profile/default.png','cashier','$2y$10$r.oqeTuI/FtKlnKuk2RsIexlK8OeV8IHsTbN3mcb/lOqdcW9IL9Iu',2,1,NULL,NULL,NULL,'2021-12-28 06:46:50','2022-03-30 06:40:39',NULL,1,'2022-04-03 16:00:00'),(4,'Sul Castillo','/images/profile/default.png','kitchen','$2y$10$XbE8qdk91oV6/ql94iQR4.a2EBRUSd4QnLvmDUo4ZHPzVg.zFIKF6',4,2,4,NULL,NULL,'2021-12-28 06:51:42','2022-05-06 18:42:54',NULL,NULL,NULL),(5,'Jordan Clarkson','/images/employee/5/262547012_668921184514778_7340661990309897028_n.jpg','waiterlordan','$2y$10$PzgHF3U13JeGDtPecwW9ge8.XoNqTvwkmHIBnhCdnYGoGobyR44Au',3,1,NULL,NULL,'afx2L3BgBZaQqyghSBvoAg08NHa7exlMXhpaNwCKhRJ3OZDZXT3WCqi48CE4','2021-12-28 06:52:44','2022-01-08 00:49:27','2022-01-06 23:54:18',1,'2022-04-03 16:00:00'),(7,'Kobe Bryant','/images/employee/7/a-a-a-a-a.ico','kitchenlordan','$2y$10$2VUwdep640JkGF7.90Sv8usXSNrtYhiJCPa188p4q7XbKovEZmTta',4,2,7,NULL,NULL,'2021-12-28 07:04:13','2022-01-08 02:02:13',NULL,NULL,NULL),(8,'Carlo Casipit','/images/profile/default.png','carlo','$2y$10$N0CSk6SGdNqmVdnB6gZpzeVyL0W1pxWY4eVJdINt9qIod7xO1TyT2',3,3,NULL,NULL,NULL,'2021-12-28 07:31:10','2022-05-01 09:26:21','2022-05-01 09:25:50',43,'2022-04-30 16:00:00'),(9,'Peter Parker','/images/profile/default.png','carlomanager','$2y$10$809VJMmUY0/8JenPLDLEi.7joFbrA2s.wkkwCWT9RQw6FvzG97Zc2',1,2,NULL,NULL,NULL,'2021-12-28 08:22:12','2022-01-08 00:19:32',NULL,NULL,NULL),(10,'Tracy Mac','/images/profile/default.png','kitchenwei','$2y$10$sFNXuk/wuCF/eo0/fvf4zelndpYM/HOV1YG64LFwtzv282qRM1/we',4,2,NULL,NULL,NULL,'2021-12-28 21:02:11','2022-05-07 09:36:56',NULL,NULL,NULL),(11,'cashier2','/images/profile/default.png','cashier2','$2y$10$xCZl3Iyw/tWRLgRQmDhPLep8pMa1ZZ.S848uf2uq05p/vVVKQ3Xi2',2,2,NULL,NULL,NULL,'2021-12-28 22:03:11','2022-03-18 22:45:56','2022-01-05 12:02:42',NULL,NULL),(13,'Carlo joaqui','/images/profile/default.png','carloKitchen','$2y$10$act5mNI9XFgyspiKIhrX0eo4/OdiWTGPTLBqtMmdEGobZYoXyFx9G',4,2,NULL,NULL,NULL,'2021-12-29 23:39:54','2022-01-08 02:22:56','2022-04-04 09:33:26',NULL,NULL),(14,'William Singe','/images/profile/default.png','weiadmin','$2y$10$oShjIwTHoccrgT/wNKDGOebszR43CoxHKq1XyTKOw7j34T29g2qwu',1,3,NULL,NULL,NULL,'2022-01-02 23:05:55','2022-01-02 23:05:55','2022-05-01 09:25:19',NULL,NULL),(15,'Kyrie Irving','/images/profile/default.png','kitchenrex','$2y$10$4FZvJZIiowfJh5leCkNF9ut5Zm7WpazxN1zjeGJTAEidSPacNhbwO',4,2,NULL,NULL,NULL,'2022-01-03 06:23:18','2022-01-03 06:23:18',NULL,NULL,NULL),(16,'Kez Reyes','/images/profile/default.png','testing','$2y$10$A0McOPDsxtOQOBc2gJRBxuwl3MAXUEQTZltKmB1Yyptf.w51/nT4C',1,2,NULL,NULL,NULL,'2022-01-03 08:25:14','2022-01-03 08:25:14',NULL,NULL,NULL),(17,'Joyce Anne Delos Santos','/images/profile/default.png','dantzy','$2y$10$Kh368pAdsqiyk/JcLlSbVu5xM5zATs1ib8597soQKNDhUpMCMcllu',1,2,NULL,NULL,NULL,'2022-01-03 08:29:05','2022-01-03 08:29:05',NULL,NULL,NULL),(20,'isabel Soriano','/images/profile/default.png','password','$2y$10$tq7fmnPpJOkY7WjLs5fkV.FZg/0X1YsNDG9/zqk5f/P4XYrGrvrUG',1,3,20,NULL,NULL,'2022-01-06 03:26:42','2022-05-04 17:45:50','2022-05-07 04:51:51',43,'2022-05-04 16:00:00'),(21,'Mhikee Samonte','/images/profile/default.png','carlokitchen1','$2y$10$/vWvtXFkBeGl9XI4XrleCOJxKYHako9E7WWditqWFarVRCTnp8Wjm',4,2,NULL,NULL,NULL,'2022-01-06 03:28:06','2022-01-06 08:31:52',NULL,NULL,NULL),(22,'Iyah isabelle','/images/profile/default.png','testing123','$2y$10$KAbCJEVnL17lKpTiY/pXyOPh74.B7naCqipinZHaFAnmXiS4RaFKS',3,2,NULL,NULL,NULL,'2022-01-06 05:07:05','2022-01-06 05:07:05',NULL,NULL,NULL),(23,'Nics Garcia','/images/profile/default.png','name','$2y$10$ptlF.QCdw2M7bL14cvBBq.Q52z5dVKQ.thatRojPihC.d4/b894D6',1,2,NULL,NULL,NULL,'2022-01-06 05:16:40','2022-01-06 05:16:40',NULL,NULL,NULL),(24,'Jane jimenez','/images/profile/default.png','cashierwei','$2y$10$Up2pIUbKyHLIWqmNHGtcs.AaOHgt5sVGh6JbVC5uDHx/057FJi7ge',2,2,24,NULL,NULL,'2022-01-07 00:39:53','2022-01-08 01:36:31',NULL,NULL,NULL),(25,'carlo pineda','/images/profile/default.png','kitchens','$2y$10$4EBw0C.Ef8aXywDYxiNxKOCG0qY84jgklir8vcU9yYt/LSrp6K4v6',4,1,NULL,NULL,NULL,'2022-01-07 07:05:25','2022-03-31 03:49:21',NULL,1,'2022-03-30 16:00:00'),(26,'rexter cordova','/images/profile/default.png','rexteradmin','$2y$10$85LswEy9TargrKVANPb/P.8KFLUO6fFnFj4NTUSqD.pK9aaNnbdrm',1,2,26,NULL,NULL,'2022-01-07 07:41:32','2022-01-07 12:03:13',NULL,NULL,NULL),(27,'riel reco','/images/profile/default.png','rieladmin','$2y$10$lxiJsBYDeQ844O5K9IV.lOFVd1STQSrFt3ysVe15wYXK/.MGjproG',1,2,27,NULL,NULL,'2022-01-07 07:45:56','2022-01-07 09:41:02',NULL,NULL,NULL),(28,'jennylyn percado','/images/profile/default.png','waiterjen','$2y$10$OZppYkkbAePHBO1EEPw8keg/Z0Mp/GXlqbyKc5nmjXhsw54h0lirO',3,2,28,NULL,NULL,'2022-01-08 01:54:20','2022-01-08 01:55:46',NULL,NULL,NULL),(30,'sul ren','/images/profile/default.png','suladmin','$2y$10$TVJGSx62qw56NE9/TfGXxOQg4ZW.bbGnt7uImNrojOnZdAOleujlC',1,2,NULL,NULL,NULL,'2022-01-08 02:09:17','2022-01-08 02:09:37',NULL,NULL,NULL),(31,'noel marcelino','/images/employee/31/renren.jpg','noeladmins','$2y$10$rc1tND7XccjKkbqQtMLZReJWi2zllXbyU9CBN.cmmLlBZo2uSnaXO',1,2,31,NULL,NULL,'2022-01-08 05:40:11','2022-01-08 05:49:07',NULL,NULL,NULL),(32,'cashierr','/images/profile/default.png','saiuaiygsf','$2y$10$h1WUcCsX768R3kG8mD/WteH/wBoDoDs1cg.nn7CG/eXqJYYiTx3ry',2,2,32,NULL,NULL,'2022-02-23 13:02:58','2022-04-28 10:27:53',NULL,NULL,NULL),(33,'asbnasbni','/images/profile/default.png','waiter123','$2y$10$jAc1nxKOOw.Hd.UupLC.SOo6UAgYRAyM0D8a3srQFjQmrELOqlwXS',3,3,33,NULL,NULL,'2022-02-23 13:05:19','2022-03-04 03:01:32','2022-03-31 02:22:41',NULL,NULL),(34,'carloadmin','/images/employee/34/My-most-popular-pic-since-I-started-dog-photography-5a0b38cbd5e1e__880.jpg','carloadmin','$2y$10$gdzaV3mnqgnHXFa2ROzINuYESJVW89zSlCR/FTrA4XBusvKUACIDK',1,2,34,NULL,NULL,'2022-02-24 07:08:59','2022-03-19 01:50:04',NULL,NULL,NULL),(35,'carloadmin1','/images/profile/default.png','carloadmin1','$2y$10$tult0noMxCGH8a7rTtSfiujDyASubInVRYe52mW6ADMQx9wuVRnCK',1,2,35,NULL,NULL,'2022-02-24 07:14:33','2022-02-24 07:14:59',NULL,NULL,NULL),(36,'carloadmin2','/images/profile/default.png','carloadmin2','$2y$10$/ZiDNq1on1hRlMgGjyLUQuW8zQvP6FiyC8k4v74pcwF5fxH27Hf1y',1,3,NULL,NULL,NULL,'2022-02-24 09:03:44','2022-02-24 09:03:53','2022-03-01 06:53:29',NULL,NULL),(37,'kitchen carlo','/images/profile/default.png','kitchencarlo','$2y$10$2ksIWk/EbS/KJIg5J3qJ.OtprBt.ROCriuMqvwMvDqjT3Bk.tR0la',4,2,NULL,NULL,NULL,'2022-03-10 14:31:32','2022-03-18 23:37:51',NULL,NULL,NULL),(38,'cashier carlo','/images/profile/default.png','cashiercarlo','$2y$10$xvK25ZOaorkLznJMqkuRd.r1HL4R5RuzPhJkLBxrIvWeaG0BU6ata',2,2,NULL,NULL,NULL,'2022-03-10 14:52:50','2022-05-02 16:08:18',NULL,NULL,NULL),(39,'Joel Nacionales','/images/profile/default.png','adminwei','$2y$10$DslycAyg9b4PdCwb/HoKFedDjNZVH/sgJjW/0XDKW3SD2lB8xKMVO',1,2,NULL,NULL,'i3eiNP1uNYvRmbawsN3A5ovslwSm9Iqpe3TwZgha97SMsCZzNgkl1wrS5R3L','2022-03-11 16:17:14','2022-05-05 14:24:39',NULL,NULL,NULL),(40,'waiter wei','/images/profile/default.png','waiterwei','$2y$10$pnzGUmeUIj6dMB3UxqQ8geLj0uQx3Q6koIznNggH3UXEMGYMmLz.a',3,2,NULL,NULL,'Tde7KBEC8eBhqptK9AOPrH9hrUexcHojDybqWr0ADHdde9U0t75MnVma4BYr','2022-03-11 16:17:31','2022-05-07 11:49:32',NULL,NULL,NULL),(41,'cashier wei','/images/profile/default.png','cashierwhei','$2y$10$27G/LJ/Xt9SIlckmbCIwwe.I7eBPp1rNOgHlHEm3GqbxgGNKdfw6i',2,2,41,NULL,'kVeVXIzXjrZh8oQUyXzlmomSESoG9p5WMBL95667LHbxzrTkum7cD33xMEnF','2022-03-11 16:18:12','2022-05-07 12:56:25',NULL,NULL,NULL),(42,'kitchen whei','/images/profile/default.png','kitchenwhei','$2y$10$hDrOZhts6sNtzKebrBLoFu375d/hbOSf3Akqt1zV0cwCqLAJ4Bjge',4,2,NULL,NULL,NULL,'2022-03-11 16:18:52','2022-03-23 08:14:05',NULL,NULL,NULL),(43,'rexter Cordoba','/images/employee/43/My-most-popular-pic-since-I-started-dog-photography-5a0b38cbd5e1e__880.jpg','adminrexter','$2y$10$zgtt1M0wNwYS3bTC7yYxOOQeTw/1rMPp5K8B9ibp2Bmn7m2nEJHpS',1,2,43,NULL,'9eWZWNPdzhKbOus0gf1ZOpzBc6OM88HSAdQ5eH4vufAckdVmOk9T9a5NbaWv','2022-03-17 18:03:55','2022-05-05 23:46:31',NULL,NULL,NULL),(44,'lenlen marcos','/images/profile/default.png','lenlen214','$2y$10$2kAGuLhiV82jXCaDSchFvOZDiLQU2tx9ELk66Iir5dw7ysWZAdVYy',4,3,NULL,NULL,NULL,'2022-03-17 21:16:25','2022-03-17 21:16:25','2022-03-17 21:16:38',NULL,NULL),(45,'sample','/images/profile/default.png','sample12','$2y$10$GtLpPs4EvWuaJuDMslYcGuTJEWkpGFqxF8DVvdLPi7XqcknbkjJiS',4,3,NULL,NULL,NULL,'2022-03-17 21:32:35','2022-03-17 21:32:35','2022-03-17 21:32:47',NULL,NULL),(46,'sulay mabinay','/images/profile/default.png','sulwaiter','$2y$10$ymDianuUSqXpUIX3mbrbXOfg3ePpxxIwnaT.b0Vsuz7pN3cNNQ1bC',3,2,46,NULL,NULL,'2022-03-18 11:02:00','2022-05-07 12:11:49',NULL,1,'2022-04-21 16:00:00'),(47,'sul mabinay2','/images/profile/default.png','adminsul','$2y$10$cxgKVZhx/jUcYUwfxRKy4OKJTg0WrXw3xEHQsqI9gw.u8WANidQQe',1,1,NULL,NULL,NULL,'2022-03-18 11:02:58','2022-03-18 11:17:43',NULL,NULL,NULL),(48,'sul mabinay3','/images/profile/default.png','cashiersul','$2y$10$gIB5TRMJBahCUZv2Da1FsOY4j0bU2fQ6zrL.88UYFjd8TDUBHv3Za',2,2,48,NULL,NULL,'2022-03-18 11:03:39','2022-05-07 09:12:24',NULL,NULL,NULL),(49,'sul mabinay4','/images/profile/default.png','kitchensul','$2y$10$oL6kyFqG1Mot3FSyF8SK3Ol4Y9HrZ6F3OmdE25O5.3ADBbgRhhOFu',4,2,49,NULL,NULL,'2022-03-18 11:04:08','2022-05-07 14:20:53',NULL,NULL,NULL),(50,'rexter rexter','/images/profile/default.png','cashierexter','$2y$10$hvLTaep9GtDf4dp.AVo8seIkutwQPxQd2PoFQrI1zOxD3jb1JWSrG',2,2,50,NULL,NULL,'2022-03-21 11:58:51','2022-05-07 10:48:16',NULL,NULL,NULL),(51,'rexter rexter rexter rexter','/images/profile/default.png','waiterexter','$2y$10$XQARUEA7FFuZ2tlRiGpzWuv6Dpi3/suoGe1WmqmnoZqQuCJ.TZ3yS',3,2,51,NULL,NULL,'2022-03-21 12:01:18','2022-05-07 10:48:09',NULL,NULL,NULL),(52,'rexter rexter rexter','/images/profile/default.png','kitchenrexter','$2y$10$tye5PS3TGGq8mghl.qjMK.keJN9lVP.XvSaehNv42NTKtPRM5N9RC',4,2,52,NULL,NULL,'2022-03-21 12:02:27','2022-05-07 11:09:40',NULL,NULL,NULL),(53,'cordova cordova','/images/profile/default.png','adminrexter1','$2y$10$AveCsSiayJ/Mb2gPZ5PZTOuciv0.HjjJMpoLdZ.lEMNykxpeBYRw2',4,1,NULL,NULL,NULL,'2022-03-23 03:11:27','2022-03-23 03:11:27',NULL,NULL,NULL),(54,'John Recosana','/images/profile/default.png','AdminRiel','$2y$10$sabLiOgFo.N9bK.OUBh3yOFqDSEhbnd.QklLsPjQcfdNFeRikUQQi',1,2,54,NULL,NULL,'2022-03-23 03:55:37','2022-03-23 15:23:54',NULL,NULL,NULL),(55,'John Kyrie','/images/profile/default.png','WaiterKy','$2y$10$GWQA82ZqFV6U205X.Rn/8ORbAi2CLfzmMxP4eXaRif8qp4Y2FlPDS',3,1,NULL,NULL,NULL,'2022-03-23 14:29:22','2022-03-23 14:29:22',NULL,NULL,NULL),(56,'Junnieboy','/images/profile/default.png','Cashierjunie','$2y$10$9VjWI96m76eessiCzEE3N.vXlwXm24gCsvAE.DTxtDMlm1jvwhSEq',2,2,56,NULL,NULL,'2022-03-23 14:30:07','2022-04-27 20:21:36',NULL,NULL,NULL),(57,'marlon velasquez','/images/profile/default.png','Kitchemarlon','$2y$10$dry6peE6C9nCYUigRwxwR.VTDXofUxnwrXNImAxvbztGMpkphamLa',4,1,NULL,NULL,NULL,'2022-03-23 14:30:54','2022-03-23 14:30:54',NULL,NULL,NULL),(58,'junnie boy','/images/profile/default.png','Waiterjunie','$2y$10$fOOuJUR252sJXBjgoiJWGOkBPkgvbn9TC3VFlJ4Fhex6myRWjRlYS',3,2,58,NULL,NULL,'2022-03-23 14:33:24','2022-03-24 04:59:38',NULL,NULL,NULL),(60,'john bryant','/images/profile/default.png','cashierbry','$2y$10$.d8J2ag6oBUWhazUz.WFyuTYvPLs13TetjGl7kRs6utWKET/STqQq',2,1,NULL,NULL,NULL,'2022-03-23 15:26:28','2022-03-23 15:26:28',NULL,NULL,NULL),(61,'joey ceres','/images/profile/default.png','joerskey','$2y$10$2DLfYw3kB8PqfJM/n/NNp.MJDZQKSnqtsR/lcmOYCxVKVz6xUz1Z6',1,1,NULL,NULL,NULL,'2022-03-31 09:11:08','2022-03-31 09:11:08',NULL,NULL,NULL),(62,'jenny','/images/profile/default.png','jennifer','$2y$10$yBTvo6Cm89xYBuKyNz5dzefo8qGhcYYG0vhjYOIfyiNGErP9GwsIO',1,1,NULL,1,NULL,'2022-03-31 09:14:54','2022-03-31 09:14:54',NULL,NULL,NULL),(63,'Sul','/images/profile/default.png','adminsol','$2y$10$YT1UNViILaOcG1j5YoIdSevTl5dGc9Q2S5qULZ8GfFbDyBczRFaOa',1,2,63,1,NULL,'2022-04-22 13:21:53','2022-05-07 14:34:30',NULL,NULL,NULL),(64,'uptown','/images/profile/default.png','uptowngrill','$2y$10$55bfUhRXNNiBGlhilfnru..FhC68O5TYAQFGAXdw8x9O1KaQhj00y',4,1,NULL,43,NULL,'2022-05-01 09:37:29','2022-05-01 09:37:29',NULL,NULL,NULL),(65,'jnics ramos','/images/profile/default.png','jnicsacct','$2y$10$sGCpcoqvJzRdhNjYwRU.X.0/kmaioytUBfpEXZGrBJ4HXe1NxzVv6',1,1,NULL,1,NULL,'2022-05-01 18:11:41','2022-05-01 18:11:41',NULL,NULL,NULL),(66,'carlo casupot','/images/profile/default.png','carlopusit','$2y$10$T0ecMBATo2JVLU5IDNq9x.PhsKetpcdSO8rFQwFCBADod72twb1BS',1,3,NULL,1,NULL,'2022-05-01 18:25:38','2022-05-01 18:25:38','2022-05-01 19:54:48',NULL,NULL),(67,'carla casipit','/images/profile/default.png','carlathoy','$2y$10$vFoLCCin4/AdQQuLC7k2kO0uYWgd6tAgYE7PHROr1dec6Tc5d1q6a',1,3,NULL,1,NULL,'2022-05-01 18:26:16','2022-05-01 18:26:16','2022-05-01 19:53:20',NULL,NULL),(68,'jenifer','/images/profile/default.png','jenelynzz','$2y$10$MOb4vRifl6tgqlvpKJ1hsuzFkewGj1t3motytegc115FIQP7aLJka',1,1,NULL,1,NULL,'2022-05-01 18:28:02','2022-05-01 18:28:02',NULL,NULL,NULL),(69,'donny bell','/images/profile/default.png','donatelo','$2y$10$R2KTm2t.2DxNE1OCK0zdceOLIpFyRBdOmBVK0ZbpUTFjz1h7KCb9S',1,3,NULL,1,NULL,'2022-05-01 18:29:12','2022-05-01 18:29:12','2022-05-01 19:55:16',NULL,NULL),(70,'joey national','/images/profile/default.png','joelnationales','$2y$10$5pu839TIWPR0DPr8xQwr9eM6I1sYGzyywxfaQVt7BF7jXH56Ckh4u',1,1,NULL,1,NULL,'2022-05-01 18:33:05','2022-05-01 18:33:05',NULL,NULL,NULL),(72,'joey national','/images/profile/default.png','joelnationalesz','$2y$10$m85G7Rj4JcWWllQespKhuuUJOQKXtKMkRReCLG6Gl3rqe9W8ZCney',1,1,NULL,1,NULL,'2022-05-01 18:36:02','2022-05-01 18:36:02',NULL,NULL,NULL),(73,'riel recasana','/images/profile/default.png','recosana','$2y$10$ndFfcBwve1/nLiKzxwxYyucvitaqo8ArP0QMwKIffmy9c34Ink.ZK',2,1,NULL,1,NULL,'2022-05-01 18:37:21','2022-05-01 18:37:21',NULL,NULL,NULL),(74,'monkey d luffy','/images/profile/default.png','pirateking','$2y$10$N7kLblLvTloGhBa4K/3uWOi6UGZR6bawgFmp5M0rn.QiIPMRIb2gW',1,1,NULL,1,NULL,'2022-05-01 19:45:48','2022-05-01 19:45:48',NULL,NULL,NULL),(75,'monkey d luffy','/images/profile/default.png','piratekingz','$2y$10$kK82o3d7IoYIm/fcxiYvDewDQ4YXL.QLuLSTkJZYTfPr2tFdwBrPK',2,1,NULL,1,NULL,'2022-05-01 19:47:16','2022-05-01 19:47:16',NULL,NULL,NULL),(76,'monkey d garp','/images/profile/default.png','viceadmiral','$2y$10$FoEBh6cRsqqKcDzkVO.TGeHu3meSOO3ePMF2.RWWbq0qOoFofwbiK',1,1,NULL,1,NULL,'2022-05-01 19:48:00','2022-05-01 19:48:00',NULL,NULL,NULL),(80,'Lordan Cabarrubias Lingat','/images/profile/default.png','lordankitchen','$2y$10$zgTit3/Y91ja80NnB/X73eHtXfaMvbGfm0deuVgiKiE.7DoP3oS2a',4,2,80,1,NULL,'2022-05-02 18:49:32','2022-05-06 00:27:51',NULL,NULL,NULL),(81,'Lordan Cabarrubias','/images/profile/default.png','lordancashier','$2y$10$BfxAT1epBy1NMlyXjT1xfejb.5xv/umEj7EgOcXBzqggk7XZ4Riyi',2,2,81,1,NULL,'2022-05-02 18:56:07','2022-05-07 04:24:02',NULL,NULL,NULL),(82,'Jonathan','/images/profile/default.png','waiterthan','$2y$10$OFRQ18sF.X/Qt6mNb5AebeaAN4EOh9KAiiUuWqe469muLf8iKiI5O',3,1,NULL,43,NULL,'2022-05-05 23:50:50',NULL,NULL,NULL,NULL),(83,'John Riel','/images/profile/default.png','adminrecosana','$2y$10$Lzp3nVFtPimsJJog9ydNQObxxDGmcPti9E0hn.2ABgbB0HWAo2SG2',1,1,NULL,63,NULL,'2022-05-07 05:03:33',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `websockets_statistics_entries`
--

DROP TABLE IF EXISTS `websockets_statistics_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `websockets_statistics_entries`
--

LOCK TABLES `websockets_statistics_entries` WRITE;
/*!40000 ALTER TABLE `websockets_statistics_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `websockets_statistics_entries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-07 23:07:38
