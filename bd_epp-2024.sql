-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 21 fév. 2026 à 08:32
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_epp-2024`
--

-- --------------------------------------------------------

--
-- Structure de la table `chauffeurs`
--

DROP TABLE IF EXISTS `chauffeurs`;
CREATE TABLE IF NOT EXISTS `chauffeurs` (
  `chauffeur_id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `disponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`chauffeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chauffeurs`
--

INSERT INTO `chauffeurs` (`chauffeur_id`, `nom`, `prenom`, `telephone`, `sexe`, `disponible`) VALUES
(1, 'Marc', 'Seydou', '+2290169007300', 'Masculin', 1),
(2, 'hugues', 'Alexe', '+2290164898686', 'Masculin', 0),
(3, 'toto', 'Bake', '+2290197331752', 'Masculin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `courses_id` int NOT NULL AUTO_INCREMENT,
  `point_depart` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `point_darrivee` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_heure` datetime NOT NULL,
  `chauffeur_id` int DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_vehicule` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`courses_id`),
  KEY `fk_chauffeurs_courses` (`chauffeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`courses_id`, `point_depart`, `point_darrivee`, `date_heure`, `chauffeur_id`, `statut`, `image_vehicule`) VALUES
(10, 'dd', 'zz', '2026-02-13 11:52:00', 2, 'terminee', 'image/2026-02-2010-02-54.png'),
(11, 'ezre', 'fg', '2026-02-27 12:47:00', 1, 'terminee', ''),
(12, 'ezre', 'fg', '2026-02-27 12:47:00', 1, 'terminee', ''),
(13, 'uu', 'yy', '2026-02-22 12:13:00', 1, 'terminee', ''),
(14, 'calavi', 'porto-novo', '2026-02-24 12:30:00', 3, 'terminee', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_chauffeurs_courses` FOREIGN KEY (`chauffeur_id`) REFERENCES `chauffeurs` (`chauffeur_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
