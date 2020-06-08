-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.26 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour webproject
DROP DATABASE IF EXISTS `solidaritybond`;
CREATE DATABASE IF NOT EXISTS `solidaritybond` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `solidaritybond`;

-- Listage de la structure de la table webproject. bde_events
DROP TABLE IF EXISTS `bde_events`;
CREATE TABLE IF NOT EXISTS `bde_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `paid_event` tinyint(1) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `is_recursive` tinyint(1) NOT NULL DEFAULT '0',
  `days_recursive` int(11) NOT NULL DEFAULT '0',
  `id_CESI_Campuses` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `BDE_Events_Campus_FK` (`id_CESI_Campuses`),
  CONSTRAINT `FK_bde_events_cesi_campuses` FOREIGN KEY (`id_CESI_Campuses`) REFERENCES `cesi_campuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table webproject.bde_events : ~3 rows (environ)
DELETE FROM `bde_events`;
/*!40000 ALTER TABLE `bde_events` DISABLE KEYS */;
INSERT INTO `bde_events` (`id`, `name`, `date`, `description`, `paid_event`, `price`, `is_recursive`, `days_recursive`, `id_CESI_Campuses`) VALUES
	(1, 'Soirée jeux', '2019-11-07', 'Soirée avec différents jeux vidéo et jeux de société. N\'hésitez pas à ramener des jeux ! La soirée ce déroulera à Cési le jeudi 7 novembre de 19h à 23h.\r\nVenez nombreux !', 1, 1, 0, 0, 3),
	(2, 'Tournois Badminton', '2019-11-21', 'Le tournois se fera aux gymnase Paul Fort le jeudi 14 novembre de 18h à 20h. Des équipes de deux se feront sur places.\r\nLes places sont limitées.\r\nDépêchez-vous !', 1, 2, 0, 0, 3),
	(3, 'Geoff World', '2020-10-09', 'Vivez dans un monde 100% Geoff', 1, 1000, 0, 0, 4);
/*!40000 ALTER TABLE `bde_events` ENABLE KEYS */;

-- Listage de la structure de la table webproject. can_participate
DROP TABLE IF EXISTS `can_participate`;
CREATE TABLE IF NOT EXISTS `can_participate` (
  `id` int(11) NOT NULL,
  `id_Site_Users` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_Site_Users`),
  KEY `Can_Participate_Site_Users0_FK` (`id_Site_Users`),
  CONSTRAINT `Can_Participate_BDE_Events_FK` FOREIGN KEY (`id`) REFERENCES `bde_events` (`id`),
  CONSTRAINT `Can_Participate_Site_Users0_FK` FOREIGN KEY (`id_Site_Users`) REFERENCES `site_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table webproject.can_participate : ~3 rows (environ)
DELETE FROM `can_participate`;
/*!40000 ALTER TABLE `can_participate` DISABLE KEYS */;
INSERT INTO `can_participate` (`id`, `id_Site_Users`) VALUES
	(3, 10),
	(3, 11),
	(3, 16);
/*!40000 ALTER TABLE `can_participate` ENABLE KEYS */;

-- Listage de la structure de la table webproject. cesi_campuses
DROP TABLE IF EXISTS `cesi_campuses`;
CREATE TABLE IF NOT EXISTS `cesi_campuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table webproject.cesi_campuses : ~4 rows (environ)
DELETE FROM `cesi_campuses`;
/*!40000 ALTER TABLE `cesi_campuses` DISABLE KEYS */;
INSERT INTO `cesi_campuses` (`id`, `name`) VALUES
	(1, 'Arras'),
	(2, 'Bordeaux'),
	(3, 'Reims'),
	(4, 'Oran');
/*!40000 ALTER TABLE `cesi_campuses` ENABLE KEYS */;

-- Listage de la structure de la table webproject. does_contain
DROP TABLE IF EXISTS `does_contain`;
CREATE TABLE IF NOT EXISTS `does_contain` (
  `id` int(11) NOT NULL,
  `id_Shop_Orders` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_Shop_Orders`),
  KEY `Does_Contain_Shop_Orders0_FK` (`id_Shop_Orders`),
  CONSTRAINT `Does_Contain_Shop_Orders0_FK` FOREIGN KEY (`id_Shop_Orders`) REFERENCES `shop_orders` (`id`),
  CONSTRAINT `Does_Contain_Shop_Products_FK` FOREIGN KEY (`id`) REFERENCES `shop_products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table webproject.does_contain : ~0 rows (environ)
DELETE FROM `does_contain`;
/*!40000 ALTER TABLE `does_contain` DISABLE KEYS */;
/*!40000 ALTER TABLE `does_contain` ENABLE KEYS */;

-- Listage de la structure de la table webproject. event_pictures
DROP TABLE IF EXISTS `event_pictures`;
CREATE TABLE IF NOT EXISTS `event_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_url` text COLLATE utf8_bin NOT NULL,
  `id_BDE_Events` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Event_Pictures_BDE_Events_FK` (`id_BDE_Events`),
  CONSTRAINT `Event_Pictures_BDE_Events_FK` FOREIGN KEY (`id_BDE_Events`) REFERENCES `bde_events` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table webproject.event_pictures : ~7 rows (environ)
DELETE FROM `event_pictures`;
/*!40000 ALTER TABLE `event_pictures` DISABLE KEYS */;
INSERT INTO `event_pictures` (`id`, `pic_url`, `id_BDE_Events`) VALUES
	(2, '../Images/images_events/Soiree_jeux.png', 1),
	(3, '../Images/images_events/Tournois_bad.png', 2),
	(7, '../Images/event_pictures/logo_cesi.jpg', 2),
	(8, '../Images/event_pictures/unknown.png', 2),
	(10, '../Images/event_pictures/geoprouve.png', 3),
	(13, '../Images/event_pictures/necplusgeoff.png', 3),
	(14, '../Images/event_pictures/logo_cesi.jpg', 3);
/*!40000 ALTER TABLE `event_pictures` ENABLE KEYS */;

-- Listage de la structure de la table webproject. likes_pictures
DROP TABLE IF EXISTS `likes_pictures`;
CREATE TABLE IF NOT EXISTS `likes_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Site_Users` int(11) NOT NULL,
  `id_Event_Pictures` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Likes_Pictures_Site_Users_FK` (`id_Site_Users`),
  KEY `Likes_Pictures_Event_Pictures_FK` (`id_Event_Pictures`),
  CONSTRAINT `Likes_Pictures_Event_Pictures_FK` FOREIGN KEY (`id_Event_Pictures`) REFERENCES `event_pictures` (`id`),
  CONSTRAINT `Likes_Pictures_Site_Users_FK` FOREIGN KEY (`id_Site_Users`) REFERENCES `site_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table webproject.likes_pictures : ~1 rows (environ)
DELETE FROM `likes_pictures`;
/*!40000 ALTER TABLE `likes_pictures` DISABLE KEYS */;
INSERT INTO `likes_pictures` (`id`, `id_Site_Users`, `id_Event_Pictures`) VALUES
	(1, 11, 10),
	(2, 10, 10);
/*!40000 ALTER TABLE `likes_pictures` ENABLE KEYS */;

-- Listage de la structure de la table webproject. pictures_comments
DROP TABLE IF EXISTS `pictures_comments`;
CREATE TABLE IF NOT EXISTS `pictures_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_bin NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `id_Site_Users` int(11) NOT NULL,
  `id_Event_Pictures` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Pictures_Comments_Site_Users_FK` (`id_Site_Users`),
  KEY `Pictures_Comments_Event_Pictures0_FK` (`id_Event_Pictures`),
  CONSTRAINT `Pictures_Comments_Event_Pictures0_FK` FOREIGN KEY (`id_Event_Pictures`) REFERENCES `event_pictures` (`id`),
  CONSTRAINT `Pictures_Comments_Site_Users_FK` FOREIGN KEY (`id_Site_Users`) REFERENCES `site_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table webproject.pictures_comments : ~11 rows (environ)
DELETE FROM `pictures_comments`;
/*!40000 ALTER TABLE `pictures_comments` DISABLE KEYS */;
INSERT INTO `pictures_comments` (`id`, `content`, `visibility`, `id_Site_Users`, `id_Event_Pictures`) VALUES
	(1, 'lol', 0, 16, 3),
	(3, 'zdzd', 0, 16, 2),
	(4, 'zdz', 0, 16, 2),
	(5, 'bonzour', 0, 16, 2),
	(6, 'zd', 0, 16, 2),
	(7, 'coucou les amis', 0, 10, 2),
	(8, 'j\'aime le jaj', 0, 10, 2),
	(9, 'j\'aime le jaj', 0, 10, 3),
	(10, 'vive les bons jeux', 0, 10, 2),
	(11, 'geoprouve cet événement', 0, 10, 10),
	(12, 'Geoprouve également\r\n\r\n- signé Geoff', 0, 11, 10);
/*!40000 ALTER TABLE `pictures_comments` ENABLE KEYS */;

-- Listage de la structure de la table webproject. shop_orders
DROP TABLE IF EXISTS `shop_orders`;
CREATE TABLE IF NOT EXISTS `shop_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `products` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `id_Site_Users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Shop_Orders_Site_Users_AK` (`id_Site_Users`),
  CONSTRAINT `Shop_Orders_Site_Users_FK` FOREIGN KEY (`id_Site_Users`) REFERENCES `site_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table webproject.shop_orders : ~4 rows (environ)
DELETE FROM `shop_orders`;
/*!40000 ALTER TABLE `shop_orders` DISABLE KEYS */;
INSERT INTO `shop_orders` (`id`, `quantity`, `products`, `status`, `id_Site_Users`) VALUES
	(1, 2, 2, 0, 10),
	(13, 3, 3, 0, 10),
	(14, 2, 2, 0, 10),
	(15, 5, 8, 1, 11);
/*!40000 ALTER TABLE `shop_orders` ENABLE KEYS */;

-- Listage de la structure de la table webproject. shop_products
DROP TABLE IF EXISTS `shop_products`;
CREATE TABLE IF NOT EXISTS `shop_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `category` varchar(50) COLLATE utf8_bin NOT NULL,
  `pic_url` text COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_CESI_Campuses` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Shop_Products_CESI_Campuses_FK` (`id_CESI_Campuses`),
  CONSTRAINT `FK_shop_products_cesi_campuses` FOREIGN KEY (`id_CESI_Campuses`) REFERENCES `cesi_campuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table webproject.shop_products : ~9 rows (environ)
DELETE FROM `shop_products`;
/*!40000 ALTER TABLE `shop_products` DISABLE KEYS */;
INSERT INTO `shop_products` (`id`, `name`, `description`, `category`, `pic_url`, `price`, `stock`, `id_CESI_Campuses`) VALUES
	(2, 'Chaise', 'Avec bon dossier !', 'meuble', '../Images/images_shop/chair.png', 60, 9999, 1),
	(3, 'Effaceur', 'Effaceur magnétique', 'Fourniture', '../Images/images_shop/eraser.jfif', 7, 9999, 2),
	(4, 'Recharge', 'recharge d effaceur magnétique', 'Fourniture', '../Images/images_shop/erasers.jfif', 2, 9999, 2),
	(5, 'Feutres', 'Lot de 4 feutres BIO', 'Fourniture', '../Images/images_shop/marker.jpg', 7, 9999, 2),
	(6, 'Stickers', '1 Stickers de CESI Reims', 'autre', '../Images/images_shop/logos.png', 2, 9999, 3),
	(7, 'Pull', 'Pull Old School', 'Vêtements', '../Images/images_shop/pull.png', 30, 1, 3),
	(8, 'Sweat', 'Sweat Old School', 'Vêtements', '../Images/images_shop/sweat.png', 33, 1, 3),
	(9, 'Polo', 'Polo Old School', 'Vêtements', '../Images/images_shop/polo.png', 26, 1, 3),
	(10, 'Gel nettoyant mains', 'Tester, pour tester.', 'Autres', './Images/images_shop/gel.png', 5, 9999, 4);
/*!40000 ALTER TABLE `shop_products` ENABLE KEYS */;

-- Listage de la structure de la table webproject. site_users
DROP TABLE IF EXISTS `site_users`;
CREATE TABLE IF NOT EXISTS `site_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `surname` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '2',
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_CESI_Campuses` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Site_Users_CESI_Campuses_FK` (`id_CESI_Campuses`),
  CONSTRAINT `Site_Users_CESI_Campuses_FK` FOREIGN KEY (`id_CESI_Campuses`) REFERENCES `cesi_campuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table webproject.site_users : ~12 rows (environ)
DELETE FROM `site_users`;
/*!40000 ALTER TABLE `site_users` DISABLE KEYS */;
INSERT INTO `site_users` (`id`, `name`, `surname`, `password`, `status`, `mail`, `id_CESI_Campuses`) VALUES
	(5, 'Ah', 'Tend', '5ed25af7b1ed23fb00122e13d7f74c4d8262acd8', 2, 'coucou@tuveuxvoir.mabit', 3),
	(8, 'Cantos', 'Manon', '5738153348121377e7d6ed03cdb89d584dd6c02e', 0, 'sotnac.manon@gmail.com', 3),
	(9, 'Ice', 'Roy8', '5738153348121377e7d6ed03cdb89d584dd6c02e', 2, 'Roy8@viacesi.fr', 3),
	(10, 'Alpaga', 'Denis', '5f7a024713e16e56f49d5d70a24a42c7c82ebd37', 0, 'dalpaga@lol.net', 4),
	(11, 'Hurni', 'Geoffrey', 'add7881f675f847b7c32c2b1699d4ca6430014ff', 2, 'hgeoffrey@lol.net', 3),
	(12, 'El Kihel', 'Ismaël', '1cf2aa0fc2a1c7da24a0598f776d29d57f996a65', 0, 'ismael.elkihel@gmail.com', 3),
	(13, 'Cantos', 'Manon', '6307436b1b4081ca2808a2418a6e6aee38fc8777', 2, 'jesuisuneadresse@random.xptdr', 3),
	(14, 'Merdouille', 'Jacquouille', 'd4bafb9bd40b8c760caf31c0255a16ca2acdc782', 1, 'mjacq@lol.net', 1),
	(15, 'Brogniart', 'Denis', 'eb58670954c4eccae991ec872d9202d3d21d45d9', 2, 'monsieurah@lol.net', 2),
	(16, 'Ice', 'IceBaby', '40bb4f03ae70ce2200970fcb6980fddafcc65e30', 0, 'hgeoffrey@lol.net', 4),
	(17, 'Ice', 'Geoff', '4203cdb82b02722c88529e203632f2b8c651ad11', 2, 'Geoff@Ice.fr', 3),
	(19, 'Huart', 'Joachim', '47d6095d7a3f132448dd23ff6dfa0fb9b33a1e4d', 2, 'jhuart@lol.net', 3);
/*!40000 ALTER TABLE `site_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
