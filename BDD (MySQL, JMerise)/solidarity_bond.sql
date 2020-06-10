-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.4.10-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour solidarity_bond
DROP DATABASE IF EXISTS `solidarity_bond`;
CREATE DATABASE IF NOT EXISTS `solidarity_bond` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `solidarity_bond`;

-- Listage de la structure de la table solidarity_bond. basket
DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `basketID` int(10) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `productNAME` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `basketQUANTITY` int(11) NOT NULL,
  PRIMARY KEY (`basketID`),
  KEY `FK1_productID` (`productID`),
  KEY `FK2_userID` (`userID`),
  CONSTRAINT `FK1_productID` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  CONSTRAINT `FK2_userID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table solidarity_bond.basket : ~0 rows (environ)
DELETE FROM `basket`;
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;

-- Listage de la structure de la table solidarity_bond. chat
DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `chatID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `userSTATUS` tinyint(1) NOT NULL,
  `chatMESSAGE` varchar(255) COLLATE utf8_bin NOT NULL,
  `chatTIMER` int(20) NOT NULL,
  PRIMARY KEY (`chatID`),
  KEY `FK_userID` (`userID`),
  CONSTRAINT `FK_userID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table solidarity_bond.chat : ~0 rows (environ)
DELETE FROM `chat`;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;

-- Listage de la structure de la table solidarity_bond. orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(10) NOT NULL AUTO_INCREMENT,
  `productID` int(10) NOT NULL,
  `orderQuantity` int(10) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `FK_ProductID` (`productID`),
  CONSTRAINT `FK_ProductID` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table solidarity_bond.orders : ~0 rows (environ)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Listage de la structure de la table solidarity_bond. product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(10) NOT NULL AUTO_INCREMENT,
  `productNAME` varchar(30) COLLATE utf8_bin NOT NULL,
  `productDESC` varchar(255) COLLATE utf8_bin NOT NULL,
  `picURL` varchar(300) COLLATE utf8_bin NOT NULL,
  `productSTOCK` int(10) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table solidarity_bond.product : ~0 rows (environ)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Listage de la structure de la table solidarity_bond. raw_material
DROP TABLE IF EXISTS `raw_material`;
CREATE TABLE IF NOT EXISTS `raw_material` (
  `matID` int(10) NOT NULL AUTO_INCREMENT,
  `NameRawMat` varchar(10) COLLATE utf8_bin NOT NULL,
  `Quantity` int(10) NOT NULL,
  PRIMARY KEY (`matID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table solidarity_bond.raw_material : ~0 rows (environ)
DELETE FROM `raw_material`;
/*!40000 ALTER TABLE `raw_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `raw_material` ENABLE KEYS */;

-- Listage de la structure de la table solidarity_bond. user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `userLASTNAME` varchar(15) COLLATE utf8_bin NOT NULL,
  `userFIRSTNAME` varchar(15) COLLATE utf8_bin NOT NULL,
  `userMAIL` varchar(50) COLLATE utf8_bin NOT NULL,
  `userPASSWORD` varchar(50) COLLATE utf8_bin NOT NULL,
  `userSTATUS` int(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table solidarity_bond.user : ~1 rows (environ)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`userID`, `userLASTNAME`, `userFIRSTNAME`, `userMAIL`, `userPASSWORD`, `userSTATUS`) VALUES
	(1, 'Ismaël', 'El Kihel', 'ismael.elkihel@viacesi.fr', 'd4bafb9bd40b8c760caf31c0255a16ca2acdc782', 2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
