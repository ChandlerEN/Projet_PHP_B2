-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 20 jan. 2022 à 12:46
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_php_b2`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_a` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titre_a` varchar(30) NOT NULL,
  `contenu_a` text NOT NULL,
  `image_a` varchar(50) NOT NULL,
  `date_a` date NOT NULL,
  `user_a` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_a`),
  KEY `user_a` (`user_a`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

DROP TABLE IF EXISTS `inscrit`;
CREATE TABLE IF NOT EXISTS `inscrit` (
  `id_i` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom_i` varchar(30) NOT NULL,
  `mail_i` varchar(50) NOT NULL,
  `mdp_i` varchar(100) NOT NULL,
  `photo_i` varchar(50) NOT NULL DEFAULT './assets/IMG/user/default.svg',
  `ban_i` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_i`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table pour les inscrits';

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_a`) REFERENCES `inscrit` (`id_i`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
