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
INSERT INTO `products` VALUES (1,'Lid - 10,12,16 Oz',89,'Casework','products_image/product1.jpg'),(5,'Appetizer - Mango Chevre',49,'Curb & Gutter','products_image/product2.jpg'),(6,'Beef - Striploin',166,'HVAC','products_image/product3.jpg'),(7,'Rum - Mount Gay Eclipes',191,'Fire Protection','products_image/product4.jpg'),(8,'Irish Cream - Baileys',109,'HVAC',NULL),(9,'Coffee - Beans, Whole',65,'Structural & Misc Steel Erection',NULL),(13,'Ham - Cooked Italian',8,'Termite Control',NULL),(14,'Nut - Pumpkin Seeds',119,'HVAC',NULL),(15,'Cheese - Le Cru Du Clocher',86,'Epoxy Flooring',NULL),(16,'Syrup - Chocolate',122,'Masonry & Precast',NULL),(18,'Cake Circle, Paprus',82,'Masonry',NULL),(19,'Vinegar - Raspberry',185,'Site Furnishings',NULL),(20,'Toothpick Frilled',94,'Electrical',NULL),(21,'Mangoes',55,'Fire Protection',NULL),(22,'Chocolate Bar - Smarties',21,'Framing (Wood)',NULL),(23,'Wheat - Soft Kernal Of Wheat',32,'Temp Fencing, Decorative Fencing and Gates',NULL),(25,'Beans - Green',47,'Doors, Frames & Hardware',NULL),(27,'Mussels - Cultivated',63,'Prefabricated Aluminum Metal Canopies',NULL),(28,'Cups 10oz Trans',71,'HVAC',NULL),(29,'Crab - Meat Combo',105,'Sitework & Site Utilities',NULL),(31,'Butter Ripple - Phillips',117,'Curb & Gutter',NULL),(32,'Soup - Cream Of Potato / Leek',139,'Marlite Panels (FED)',NULL),(33,'Assorted Desserts',60,'Prefabricated Aluminum Metal Canopies',NULL),(34,'Soup - Base Broth Chix',73,'Plumbing & Medical Gas',NULL),(35,'Corn Meal',77,'Doors, Frames & Hardware',NULL),(37,'Lid - 16 Oz And 32 Oz',183,'Ornamental Railings',NULL),(38,'Lid - 16 Oz And 32 Oz',183,'Ornamental Railings',NULL),(39,'Fuji Apples',96,'Retaining Wall and Brick Pavers',NULL),(40,'Veal Inside - Provimi',9,'Marlite Panels (FED)',NULL),(42,'Sour Puss Raspberry',132,'Waterproofing & Caulking',NULL),(45,'Squid - U 5',198,'Drilled Shafts',NULL),(46,'Tea - Green',184,'Retaining Wall and Brick Pavers',NULL),(49,'Banana - Leaves',150,'Construction Clean and Final Clean',NULL),(51,'Soup - French Onion',191,'Construction Clean and Final Clean',NULL),(52,'Wine - Casillero Del Diablo',160,'Drywall & Acoustical (MOB)',NULL),(53,'Chinese Foods - Plain Fried Rice',55,'Retaining Wall and Brick Pavers',NULL),(54,'Pur Source',198,'Glass & Glazing',NULL),(55,'Bread - Corn Muffaletta',23,'Retaining Wall and Brick Pavers',NULL),(56,'Dikon',110,'Landscaping & Irrigation',NULL),(57,'Mussels - Frozen',200,'Epoxy Flooring',NULL),(58,'Cabbage - Green',53,'Wall Protection',NULL),(60,'Garlic - Elephant',139,'Framing (Wood)',NULL),(61,'Wine - Red, Mosaic Zweigelt',134,'Ornamental Railings',NULL),(64,'Cape Capensis - Fillet',149,'Sitework & Site Utilities',NULL),(65,'Crab - Meat Combo',177,'HVAC',NULL),(66,'Bread - Petit Baguette',58,'Roofing (Asphalt)',NULL),(68,'Cake - Miini Cheesecake Cherry',130,'Elevator',NULL),(69,'Milk - Skim',154,'Elevator',NULL),(70,'Sage - Rubbed',133,'Elevator',NULL),(72,'Coffee - Irish Cream',74,'Drilled Shafts',NULL),(75,'Syrup - Monin, Irish Cream',58,'Fire Protection',NULL),(76,'Butter - Pod',44,'Termite Control',NULL),(77,'Chicken - Base',41,'Temp Fencing, Decorative Fencing and Gates',NULL),(80,'Pan Grease',68,'Structural & Misc Steel Erection',NULL),(81,'Coffee - Dark Roast',137,'Glass & Glazing',NULL),(82,'Tomato Puree',75,'Masonry',NULL),(83,'Whmis - Spray Bottle Trigger',160,'Framing (Wood)',NULL),(84,'Bar Mix - Lemon',7,'HVAC',NULL),(85,'Red Snapper - Fillet, Skin On',94,'Construction Clean and Final Clean',NULL),(86,'Raisin - Golden',42,'Casework',NULL),(88,'Shrimp - Black Tiger 16/20',60,'Asphalt Paving',NULL),(89,'Pork - Ham, Virginia',123,'Electrical and Fire Alarm',NULL),(91,'Napkin Colour',41,'Glass & Glazing',NULL),(92,'Scallops 60/80 Iqf',80,'Masonry',NULL),(93,'Salsify, Organic',15,'Marlite Panels (FED)',NULL),(94,'Dr. Pepper - 355ml',76,'Masonry',NULL),(95,'Dr. Pepper - 355ml',76,'Masonry',NULL),(96,'Dr. Pepper - 355ml',76,'Masonry',NULL),(98,'jacket',200,'Electrical',NULL),(99,'jacket',200,'Electrical',NULL),(100,'test',100,'Electrical','products_image/64f7c19ba87720.80870332.jpg'),(101,'rrr',40,'Electrical','../products_image/64f8c0f32fa1b5.74440222.png'),(102,'jacket',100,'Electrical','products_image/64f8c157704999.34792946.png');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-08  5:30:27
