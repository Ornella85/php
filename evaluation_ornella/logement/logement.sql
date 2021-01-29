-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 jan. 2021 à 12:45
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(11) NOT NULL,
  `titre` varchar(70) DEFAULT NULL,
  `adresse` varchar(250) DEFAULT NULL,
  `ville` varchar(250) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `surface` int(5) DEFAULT NULL,
  `prix` int(25) DEFAULT NULL,
  `photo` blob NOT NULL,
  `type` enum('location','vente') NOT NULL,
  `description` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'le titre', '8 place corneille', 'poissy', '78300', 30, 1230000, 0x4172726179, '', 'jolie vue'),
(2, 'le titre', '8 place corneille', 'poissy', '78300', 30, 1230000, 0x4172726179, '', 'jolie vue'),
(3, 'le titre', '8 place corneille', 'poissy', '78300', 30, 1230000, 0x687474703a2f2f6c6f63616c686f73742f7068702f6576616c756174696f6e2f70686f746f2f6c652074697472655f33312d702d33335f6e6f69722e6a7067, '', 'jolie vue'),
(4, 'le titre', '8 place corneille', 'poissy', '78300', 300, 12300, 0x687474703a2f2f6c6f63616c686f73742f7068702f6576616c756174696f6e2f70686f746f2f6c652074697472655f31312d642d32335f626c65752e6a7067, '', 'jolie jolie vue');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
