-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 16 juin 2020 à 15:55
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `solidarity_bond`
--

-- --------------------------------------------------------

--
-- Structure de la table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `basketID` int(10) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `basketQUANTITY` int(11) NOT NULL,
  PRIMARY KEY (`basketID`),
  KEY `FK1_productID` (`productID`),
  KEY `FK2_userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `basket`
--

INSERT INTO `basket` (`basketID`, `productID`, `userID`, `basketQUANTITY`) VALUES
(1, 1, 3, 500),
(3, 3, 3, 50),
(4, 2, 3, 5),
(5, 4, 3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `chatID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `userSTATUS` tinyint(1) NOT NULL,
  `chatMESSAGE` varchar(2000) COLLATE utf8_bin NOT NULL,
  `chatTIMER` varchar(15) COLLATE utf8_bin NOT NULL,
  `chatFOR` tinyint(1) NOT NULL,
  PRIMARY KEY (`chatID`),
  KEY `FK1_userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`chatID`, `userID`, `userSTATUS`, `chatMESSAGE`, `chatTIMER`, `chatFOR`) VALUES
(1, 1, 2, 'Test, Entreprise ? Vous me recevez ?', '2020-06-11', 0),
(2, 1, 2, 'Ceci est un second test, confirmation envoi message.', '2020-06-12', 0),
(3, 1, 2, 'Je teste tout ça encore une fois.', '2020-06-15', 0),
(4, 1, 2, 'Test devant vous', '2020-06-15', 0),
(5, 3, 0, 'Bonjour, puis-je avoir des informations sur ma commande ?', '2020-06-15', 2),
(6, 1, 2, 'Bonjour, quel est le numéro de votre commande ?', '2020-06-16', 0),
(11, 4, 1, 'Concernant les matières premières, je peux vous livrer le 24 janvier.', '2020-06-16', 2),
(12, 1, 2, 'Merci beaucoup, je notes ça.', '2020-06-16', 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(10) NOT NULL AUTO_INCREMENT,
  `productID` int(10) NOT NULL,
  `orderQUANTITY` int(10) NOT NULL,
  `orderSTATUS` tinyint(1) NOT NULL,
  `orderDELIDATE` date DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `FK_ProductID` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(10) NOT NULL AUTO_INCREMENT,
  `productNAME` varchar(30) COLLATE utf8_bin NOT NULL,
  `productDESC` varchar(255) COLLATE utf8_bin NOT NULL,
  `picURL` varchar(300) COLLATE utf8_bin NOT NULL,
  `productSTOCK` int(10) NOT NULL,
  `productPRICE` decimal(4,2) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`productID`, `productNAME`, `productDESC`, `picURL`, `productSTOCK`, `productPRICE`) VALUES
(1, 'Masque FFP2', 'Ces masques serviront pour protéger vos voies respiratoires contre les particules fines et toxiques et contre les virus grippaux.', 'https://www.pharmaciedesteinfort.com/media/catalog/product/cache/cd30c5c2a49353086bf9c7be9820feea/m/a/masque_ffp2_kn95_1.jpg', 1500, '0.99'),
(2, 'Visière de protection', 'Cette visière vous évite de prendre quelconque poussière ou de recevoir des postillons sur le visage.', 'https://cdn.manelli.com/16538-thickbox_default/visiere-de-protection-visage-lot-de-3-pieces.jpg', 2000, '1.99'),
(3, 'Gants jetables', 'Ces gants vous permettront de ne pas toucher directement avec vos mains des\r\nproduits potentiellement touchées par des gens positifs.', 'https://www.topmedic.fr/image/cache//catalog/topmedic/Gants-Jetable/Gants-Jetalbes-Nitrile/Gants-Jetable-1-600x600.jpg', 2000, '0.99'),
(4, 'Gel hydroalcoolique', 'Ce gel vous permettra de nettoyer vos mains partout au sein de votre entreprise.', 'https://www.ld-medical.fr/2346-large_default/aniosgel-800.jpg', 1750, '3.99');

-- --------------------------------------------------------

--
-- Structure de la table `raw_material`
--

DROP TABLE IF EXISTS `raw_material`;
CREATE TABLE IF NOT EXISTS `raw_material` (
  `matID` int(10) NOT NULL AUTO_INCREMENT,
  `rawmatNAME` varchar(20) COLLATE utf8_bin NOT NULL,
  `rawmatDESC` varchar(500) COLLATE utf8_bin NOT NULL,
  `rawmatQUANTITY` int(10) NOT NULL,
  `rawmatREASON` varchar(1000) COLLATE utf8_bin NOT NULL,
  `isDemandTreated` tinyint(1) NOT NULL,
  PRIMARY KEY (`matID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `userLASTNAME` varchar(15) COLLATE utf8_bin NOT NULL,
  `userFIRSTNAME` varchar(15) COLLATE utf8_bin NOT NULL,
  `userMAIL` varchar(50) COLLATE utf8_bin NOT NULL,
  `userPASSWORD` varchar(50) COLLATE utf8_bin NOT NULL,
  `userSTATUS` int(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`userID`, `userLASTNAME`, `userFIRSTNAME`, `userMAIL`, `userPASSWORD`, `userSTATUS`) VALUES
(1, 'Ismaël', 'El Kihel', 'ismael.elkihel@viacesi.fr', 'd4bafb9bd40b8c760caf31c0255a16ca2acdc782', 2),
(2, 'Test', 'Test', 'test@test.com', 'd4bafb9bd40b8c760caf31c0255a16ca2acdc782', 0),
(3, 'bernard', 'rodolphe', 'rbernard@ub-enterprise.com', 'd4bafb9bd40b8c760caf31c0255a16ca2acdc782', 0),
(4, 'bernard', 'gillowel', 'g-b@lacasadelospomelos.net', 'b95ec9182c4aab1a4f0774aea943d816a1e19a57', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `FK1_userID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
