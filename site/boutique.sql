-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 28 jan. 2021 à 16:43
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
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) DEFAULT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `montant`, `date_enregistrement`, `etat`) VALUES
(1, 4, 301, '2015-07-10 14:44:46', 'en cours de traitement'),
(2, 6, 143, '2021-01-28 10:24:31', 'en cours de traitement'),
(3, 6, 94, '2021-01-28 10:24:39', 'en cours de traitement'),
(4, 6, 94, '2021-01-28 10:24:41', 'en cours de traitement'),
(5, 6, 94, '2021-01-28 10:24:43', 'en cours de traitement'),
(6, 6, 94, '2021-01-28 10:24:54', 'en cours de traitement'),
(7, 6, 94, '2021-01-28 10:34:41', 'en cours de traitement'),
(8, 6, 1392, '2021-01-28 11:25:46', 'en cours de traitement');

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(3) NOT NULL,
  `id_commande` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `details_commande`
--

INSERT INTO `details_commande` (`id_details_commande`, `id_commande`, `id_produit`, `quantite`, `prix`) VALUES
(1, 1, 2, 1, 15),
(2, 1, 6, 1, 49),
(3, 1, 8, 3, 79),
(4, 0, 2, 1, 15),
(5, 0, 8, 1, 79),
(6, 0, 6, 1, 49),
(7, 2, 2, 1, 15),
(8, 2, 8, 1, 79),
(9, 2, 6, 1, 49),
(10, 3, 2, 1, 15),
(11, 3, 8, 1, 79),
(12, 4, 2, 1, 15),
(13, 4, 8, 1, 79),
(14, 5, 2, 1, 15),
(15, 5, 8, 1, 79),
(16, 6, 2, 1, 15),
(17, 6, 8, 1, 79),
(18, 7, 2, 1, 15),
(19, 7, 8, 1, 79),
(20, 8, 6, 1, 49),
(21, 8, 8, 17, 79);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(1, 'juju', 'soleil', 'Cottet', 'Julien', 'julien.cottet@gmail.com', 'm', 'Paris', 75015, '300 rue de vaugirard', 0),
(2, 'lamarie', 'planete', 'thoyer', 'marie', 'marie.thoyer@yahoo.fr', 'f', 'Lyon', 69003, '10 rue paul bert', 0),
(3, 'fab', 'avatar13', 'grand', 'fabrice', 'fabrice.grand@gmail.com', 'm', 'Marseille', 13009, '70 rue de la république', 0),
(4, 'membre', 'membre', 'membre', 'membre', 'membre@exemple.com', 'f', 'Toulouse', 31000, '55 rue bayard', 0),
(5, 'admin', 'admin', 'admin', 'admin', 'admin@exemple.com', 'm', 'Paris', 75015, '33 rue mademoiselle', 1),
(6, 'Ornella', '$2y$10$x4wL1pNTeK1pN9u5gatRm.tD323gqvMj.gOQcXH5VdBL748mfvcQy', 'lallier', 'ornella', 'email@email.fr', 'f', 'poissy', 78300, '8 rue corneille', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(5) NOT NULL,
  `public` enum('m','f','mixte') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES
(1, '11-d-23', 'tshirt', 'Tshirt Col V', 'Tee-shirt en coton flammé liseré contrastant', 'bleu', 'M', 'm', 'http://localhost/php/site/photo/11-d-23_bleu.jpg', 20, 40),
(2, '66-f-15', 'tshirt', 'Tshirt Col V rouge', 'c\'est vraiment un super tshirt en soirée !', 'rouge', 'L', 'm', 'http://localhost/php/site/photo/66-f-15_rouge.png', 15, 217),
(3, '88-g-77', 'tshirt', 'Tshirt Col rond vert', 'Il vous faut ce tshirt Made In France !!!', 'vert', 'L', 'm', 'http://localhost/php/site/photo/88-g-77_vert.png', 29, 50),
(4, '55-b-38', 'tshirt', 'Tshirt jaune', 'le jaune reviens à la mode, non? :-)', 'jaune', 'S', 'm', 'http://localhost/php/site/photo/55-b-38_jaune.png', 20, 10),
(5, '31-p-33', 'tshirt', 'Tshirt noir original', 'voici un tshirt noir très original :p', 'noir', 'XL', 'm', 'http://localhost/php/site/photo/31-p-33_noir.jpg', 25, 67),
(6, '56-a-65', 'chemise', 'Chemise Blanche', 'Les chemises c\'est bien mieux que les tshirts', 'blanc', 'L', 'm', 'http://localhost/php/site/photo/56-a-65_chemiseblanchem.jpg', 49, 11),
(7, '63-s-63', 'chemise', 'Chemise Noir', 'Comme vous pouvez le voir c\'est une chemise noir...', 'noir', 'M', 'm', 'http://localhost/php/site/photo/63-s-63_chemisenoirm.jpg', 59, 107),
(8, '77-p-79', 'pull', 'Pull gris', 'Pull gris pour l\'hiver', 'bleu', 'XL', 'f', 'http://localhost/php/site/photo/11-d-23_bleu.jpg', 79, 69),
(10, '33-p-253', 'tee-shirt', 't-shirt noir', 't-shirt noir en coton 100% fibre naturelle', 'noir', 'M', 'f', 'http://localhost/php/site/photo/33-p-253_31-p-33_noir.jpg', 10, 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
