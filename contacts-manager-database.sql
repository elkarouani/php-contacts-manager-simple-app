-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour contacts-manager-database
CREATE DATABASE IF NOT EXISTS `contacts-manager-database` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `contacts-manager-database`;

-- Listage de la structure de la table contacts-manager-database. contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL DEFAULT '0',
  `prenom` varchar(50) NOT NULL DEFAULT '0',
  `portable` varchar(50) NOT NULL DEFAULT '0',
  `fax` varchar(50) NOT NULL DEFAULT '0',
  `ville` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table contacts-manager-database.contacts : ~2 rows (environ)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `nom`, `prenom`, `portable`, `fax`, `ville`) VALUES
	(4, 'nom3', 'prenom3', '+212-645789678', '+212-000000000', 'ville3'),
	(5, 'John', 'Doe', '+212-606060685', '+212-506060685', 'NewYork'),
	(6, 'James', 'Bond', '+66-58789468', '+66-7865948415', 'Los Angelos'),
	(11, 'Mark', 'Brown', '0666857013', '0578495814', 'Kyoto'),
	(12, 'ELKAROUANI', 'Salah Eddine', '0666857013', '0524648209', 'Youssoufia'),
	(13, 'Katie', 'Perry', '0887654548', '0578957815', 'California');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
