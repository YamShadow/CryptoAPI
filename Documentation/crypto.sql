-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 12 mai 2018 à 12:16
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `crypto`
--

-- --------------------------------------------------------

--
-- Structure de la table `echange`
--

DROP TABLE IF EXISTS `echange`;
CREATE TABLE IF NOT EXISTS `echange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_update` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `1h` int(11) DEFAULT NULL,
  `24h` int(11) DEFAULT NULL,
  `7d` int(11) DEFAULT NULL,
  `idMonnaieCrypto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Echange_MonnaieCrypto` (`idMonnaieCrypto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `last_update` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `idMonnaieFiducaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Historique_MonnaieFiduciaire` (`idMonnaieFiducaire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `historique_prix`
--

DROP TABLE IF EXISTS `historique_prix`;
CREATE TABLE IF NOT EXISTS `historique_prix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `prix_btc` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `vol_24h_usd` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `market_cap_usd` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_update` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `idMonnaieCrypto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_HistoriquePrix_MonnaieCrypto` (`idMonnaieCrypto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `monnaie_crypto`
--

DROP TABLE IF EXISTS `monnaie_crypto`;
CREATE TABLE IF NOT EXISTS `monnaie_crypto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `symbol` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `monnaie_fiduciaire`
--

DROP TABLE IF EXISTS `monnaie_fiduciaire`;
CREATE TABLE IF NOT EXISTS `monnaie_fiduciaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `symbol` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
