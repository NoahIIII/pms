-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pms
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES ('Asphalt Paving'),('Casework'),('Construction Clean and Final Clean'),('Curb & Gutter'),('Doors, Frames & Hardware'),('Drilled Shafts'),('Drywall & Acoustical (MOB)'),('Electrical'),('Electrical and Fire Alarm'),('Elevator'),('Epoxy Flooring'),('Fire Protection'),('Framing (Wood)'),('Glass & Glazing'),('Hard Tile & Stone'),('HVAC'),('Landscaping & Irrigation'),('Marlite Panels (FED)'),('Masonry'),('Masonry & Precast'),('Ornamental Railings'),('Plumbing & Medical Gas'),('Prefabricated Aluminum Metal Canopies'),('Retaining Wall and Brick Pavers'),('Roofing (Asphalt)'),('Site Furnishings'),('Sitework & Site Utilities'),('Structural & Misc Steel Erection'),('Structural and Misc Steel (Fabrication)'),('Temp Fencing, Decorative Fencing and Gates'),('Termite Control'),('Wall Protection'),('Waterproofing & Caulking');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `total` float NOT NULL,
  `user_id` int DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `adress` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (381,5,1,NULL,NULL),(381,5,2,NULL,NULL),(0,5,3,NULL,NULL),(0,5,4,NULL,NULL),(0,5,5,NULL,NULL),(174,5,6,NULL,NULL),(232,5,7,NULL,NULL),(313,5,8,NULL,NULL),(313,5,9,'','01016023105'),(313,5,10,'maka','01016023105'),(275,5,11,'kam','01016023105'),(275,5,12,'mnj','01016023105');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_name_idx` (`category_name`),
  CONSTRAINT `category_name` FOREIGN KEY (`category_name`) REFERENCES `categories` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Lid - 10,12,16 Oz',89,'Casework','products_image/product1.jpg'),(5,'Appetizer - Mango Chevre',49,'Curb & Gutter','products_image/product2.jpg'),(6,'Beef - Striploin',166,'HVAC','products_image/product3.jpg'),(7,'Rum - Mount Gay Eclipes',191,'Fire Protection','products_image/product4.jpg'),(8,'Irish Cream - Baileys',109,'HVAC','products_image/all.jpg'),(9,'Coffee - Beans, Whole',65,'Structural & Misc Steel Erection','products_image/all.jpg'),(13,'Ham - Cooked Italian',8,'Termite Control','products_image/all.jpg'),(14,'Nut - Pumpkin Seeds',119,'HVAC','products_image/all.jpg'),(15,'Cheese - Le Cru Du Clocher',86,'Epoxy Flooring','products_image/all.jpg'),(16,'Syrup - Chocolate',122,'Masonry & Precast','products_image/all.jpg'),(18,'Cake Circle, Paprus',82,'Masonry','products_image/all.jpg'),(19,'Vinegar - Raspberry',185,'Site Furnishings','products_image/all.jpg'),(20,'Toothpick Frilled',94,'Electrical','products_image/all.jpg'),(21,'Mangoes',55,'Fire Protection','products_image/all.jpg'),(22,'Chocolate Bar - Smarties',21,'Framing (Wood)','products_image/all.jpg'),(23,'Wheat - Soft Kernal Of Wheat',32,'Temp Fencing, Decorative Fencing and Gates','products_image/all.jpg'),(25,'Beans - Green',47,'Doors, Frames & Hardware','products_image/all.jpg'),(27,'Mussels - Cultivated',63,'Prefabricated Aluminum Metal Canopies','products_image/all.jpg'),(28,'Cups 10oz Trans',71,'HVAC','products_image/all.jpg'),(29,'Crab - Meat Combo',105,'Sitework & Site Utilities','products_image/all.jpg'),(31,'Butter Ripple - Phillips',117,'Curb & Gutter','products_image/all.jpg'),(32,'Soup - Cream Of Potato / Leek',139,'Marlite Panels (FED)','products_image/all.jpg'),(33,'Assorted Desserts',60,'Prefabricated Aluminum Metal Canopies','products_image/all.jpg'),(34,'Soup - Base Broth Chix',73,'Plumbing & Medical Gas','products_image/all.jpg'),(35,'Corn Meal',77,'Doors, Frames & Hardware','products_image/all.jpg'),(37,'Lid - 16 Oz And 32 Oz',183,'Ornamental Railings','products_image/all.jpg'),(38,'Lid - 16 Oz And 32 Oz',183,'Ornamental Railings','products_image/all.jpg'),(39,'Fuji Apples',96,'Retaining Wall and Brick Pavers','products_image/all.jpg'),(40,'Veal Inside - Provimi',9,'Marlite Panels (FED)','products_image/all.jpg'),(42,'Sour Puss Raspberry',132,'Waterproofing & Caulking','products_image/all.jpg'),(45,'Squid - U 5',198,'Drilled Shafts','products_image/all.jpg'),(46,'Tea - Green',184,'Retaining Wall and Brick Pavers','products_image/all.jpg'),(49,'Banana - Leaves',150,'Construction Clean and Final Clean','products_image/all.jpg'),(51,'Soup - French Onion',191,'Construction Clean and Final Clean','products_image/all.jpg'),(52,'Wine - Casillero Del Diablo',160,'Drywall & Acoustical (MOB)','products_image/all.jpg'),(53,'Chinese Foods - Plain Fried Rice',55,'Retaining Wall and Brick Pavers','products_image/all.jpg'),(54,'Pur Source',198,'Glass & Glazing','products_image/all.jpg'),(55,'Bread - Corn Muffaletta',23,'Retaining Wall and Brick Pavers','products_image/all.jpg'),(56,'Dikon',110,'Landscaping & Irrigation','products_image/all.jpg'),(57,'Mussels - Frozen',200,'Epoxy Flooring','products_image/all.jpg'),(58,'Cabbage - Green',53,'Wall Protection','products_image/all.jpg'),(60,'Garlic - Elephant',139,'Framing (Wood)','products_image/all.jpg'),(61,'Wine - Red, Mosaic Zweigelt',134,'Ornamental Railings','products_image/all.jpg'),(64,'Cape Capensis - Fillet',149,'Sitework & Site Utilities','products_image/all.jpg'),(65,'Crab - Meat Combo',177,'HVAC','products_image/all.jpg'),(66,'Bread - Petit Baguette',58,'Roofing (Asphalt)','products_image/all.jpg'),(68,'Cake - Miini Cheesecake Cherry',130,'Elevator','products_image/all.jpg'),(69,'Milk - Skim',154,'Elevator','products_image/all.jpg'),(70,'Sage - Rubbed',133,'Elevator','products_image/all.jpg'),(72,'Coffee - Irish Cream',74,'Drilled Shafts','products_image/all.jpg'),(75,'Syrup - Monin, Irish Cream',58,'Fire Protection','products_image/all.jpg'),(76,'Butter - Pod',44,'Termite Control','products_image/all.jpg'),(77,'Chicken - Base',41,'Temp Fencing, Decorative Fencing and Gates','products_image/all.jpg'),(80,'Pan Grease',68,'Structural & Misc Steel Erection','products_image/all.jpg'),(81,'Coffee - Dark Roast',137,'Glass & Glazing','products_image/all.jpg'),(82,'Tomato Puree',75,'Masonry','products_image/all.jpg'),(83,'Whmis - Spray Bottle Trigger',160,'Framing (Wood)','products_image/all.jpg'),(84,'Bar Mix - Lemon',7,'HVAC','products_image/all.jpg'),(85,'Red Snapper - Fillet, Skin On',94,'Construction Clean and Final Clean','products_image/all.jpg'),(86,'Raisin - Golden',42,'Casework','products_image/all.jpg'),(88,'Shrimp - Black Tiger 16/20',60,'Asphalt Paving','products_image/all.jpg'),(89,'Pork - Ham, Virginia',123,'Electrical and Fire Alarm','products_image/all.jpg'),(91,'Napkin Colour',41,'Glass & Glazing','products_image/all.jpg'),(92,'Scallops 60/80 Iqf',80,'Masonry','products_image/all.jpg'),(93,'Salsify, Organic',15,'Marlite Panels (FED)','products_image/all.jpg'),(94,'Dr. Pepper - 355ml',76,'Masonry','products_image/all.jpg'),(95,'Dr. Pepper - 355ml',76,'Masonry','products_image/all.jpg'),(96,'Dr. Pepper - 355ml',76,'Masonry','products_image/all.jpg'),(98,'jacket',200,'Electrical','products_image/all.jpg'),(99,'jacket',200,'Electrical','products_image/all.jpg'),(100,'test',100,'Electrical','products_image/all.jpg'),(101,'rrr',40,'Electrical','products_image/all.jpg'),(102,'jacket',100,'Electrical','products_image/all.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(45) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'gamal','mohamedamarttt777@gmail.com','$2y$10$CfvFMN4MKRnOCxQvc7J4Pu8SvBR97Lj1j4VGpFGfqH/yTJwEhNrCW','user','profile_image/noah.jpg'),(2,'noah','n@n.n','$2y$10$ALv5xx3ZqR.GX4fDr1m1bOYt4aZ9bKPgaOqZ5mi3lw2Y396Do5urW','user','../profile_image/64f504a35c1977.76046573.'),(3,'noah','n@gmail.com','$2y$10$tUIEtf8kModI28vellW/buyou7QqgruJfOQ3ECUaIIU1gdXtnYFe2','user','profile_image/64f5054fd40dd7.39688286.'),(4,'ahmed`','f@f.f','$2y$10$qyTp8aKV1kWrf4F6tRcq9eZiiEAM5dCimer7EzvUImp41.qBzk2.2','user','profile_image/64f507439def13.47272970.'),(5,'noah','noah@gmail.com','$2y$10$YGlRZWm/4PHr5H35mDmJXOt0Rj9ebnR5shCUildsUBI30RC0Nqsoy','admin','profile_image/64f507ed8648d9.26457635.jpg');
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

-- Dump completed on 2023-09-10 14:06:57
