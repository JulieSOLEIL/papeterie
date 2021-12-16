-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 déc. 2021 à 13:55
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `papeterie`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_art` int(11) NOT NULL,
  `code_art` varchar(10) NOT NULL,
  `libelle_art` varchar(255) NOT NULL,
  `prix_ht_art` float NOT NULL,
  `promo_art` tinyint(1) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_art`, `code_art`, `libelle_art`, `prix_ht_art`, `promo_art`, `id_cat`) VALUES
(1, '0019', 'Classeur à anneaux', 3.5, 0, 2),
(2, '0010', 'Sous chemises', 1.45, 1, 2),
(3, '0003', 'Couvertures transparentes pour dossiers', 4.5, 0, 2),
(4, '0025', 'Stylos', 1.5, 1, 1),
(5, '0011', 'Gommes', 0.45, 0, 1),
(6, '0005', 'Boîte de 10 feutres', 4.25, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `libelle_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `libelle_cat`) VALUES
(1, 'Ecriture'),
(2, 'Papeterie');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `psw`, `nom`, `prenom`, `role`) VALUES
(1, 'aucpau', '$2y$10$084ObjWKEQ1b2pP9rRdTGeuiojI47nJkmUvOzunKpeIxoHKB1Zy8q', 'auchon', 'paul', 'client'),
(2, 'duppie', '$2y$10$OYddRezEJ13N2QsYBJLgaOfERjN9mpgdPUMfA/CyEhDL1CyD6Fz1a', 'dupont', 'pierre', 'gerant'),
(3, 'client02@g.com', '$2y$10$eJcJhYIBwlfVF5dDZ6BZN.au4OhnWp9jTC2VgyAnA4y5h60DJUw8u1', 'client02', 'jean', 'client'),
(4, 'client03@g.com', '$2y$10$TwXshvrR/BOH6oWR7WsPiujD614xIgqofmSCXQou8twcVLfQnqtG21', 'client03', 'jean', 'client');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_article_categorie`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vue_article_categorie` (
`id_cat` int(11)
,`id_art` int(11)
,`code_art` varchar(10)
,`libelle_art` varchar(255)
,`prix_ht_art` float
,`promo_art` tinyint(1)
,`libelle_cat` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure de la vue `vue_article_categorie`
--
DROP TABLE IF EXISTS `vue_article_categorie`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_article_categorie`  AS SELECT `articles`.`id_cat` AS `id_cat`, `articles`.`id_art` AS `id_art`, `articles`.`code_art` AS `code_art`, `articles`.`libelle_art` AS `libelle_art`, `articles`.`prix_ht_art` AS `prix_ht_art`, `articles`.`promo_art` AS `promo_art`, `categories`.`libelle_cat` AS `libelle_cat` FROM (`articles` join `categories` on(`articles`.`id_cat` = `categories`.`id_cat`)) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_art`),
  ADD KEY `articles_categories_FK` (`id_cat`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_categories_FK` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
