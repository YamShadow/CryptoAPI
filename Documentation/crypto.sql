-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 02 Mai 2018 à 16:12
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `echange` (
  `id` int(11) NOT NULL,
  `last_update` date DEFAULT NULL,
  `1h` int(11) DEFAULT NULL,
  `24h` int(11) DEFAULT NULL,
  `7d` int(11) DEFAULT NULL,
  `idMonnaieCrypto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `rate` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  `idMonnaieFiducaire` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `historique_prix`
--

CREATE TABLE `historique_prix` (
  `id` int(11) NOT NULL,
  `prix` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `prix_btc` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `24h_vol_usd` int(11) DEFAULT NULL,
  `market_cap_usd` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  `idMonnaieCrypto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `monnaie_crypto`
--

CREATE TABLE `monnaie_crypto` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `symbol` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `monnaie_fiduciaire`
--

CREATE TABLE `monnaie_fiduciaire` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `symbol` varchar(3) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `echange`
--
ALTER TABLE `echange`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Echange_MonnaieCrypto` (`idMonnaieCrypto`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Historique_MonnaieFiduciaire` (`idMonnaieFiducaire`);

--
-- Index pour la table `historique_prix`
--
ALTER TABLE `historique_prix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_HistoriquePrix_MonnaieCrypto` (`idMonnaieCrypto`);

--
-- Index pour la table `monnaie_crypto`
--
ALTER TABLE `monnaie_crypto`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `monnaie_fiduciaire`
--
ALTER TABLE `monnaie_fiduciaire`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
