-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 15 nov. 2021 à 14:59
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `photoforyou`
--

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

DROP TABLE IF EXISTS `galerie`;
CREATE TABLE IF NOT EXISTS `galerie` (
  `idPhoto` int NOT NULL AUTO_INCREMENT,
  `nomPhoto` varchar(255) NOT NULL,
  `nomCard` varchar(255) NOT NULL,
  `descCard` varchar(255) NOT NULL,
  `prixCard` int NOT NULL,
  PRIMARY KEY (`idPhoto`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`idPhoto`, `nomPhoto`, `nomCard`, `descCard`, `prixCard`) VALUES
(1, 'imagetest.jpg', 'Jolie Fleure', 'Une belle fleure prise en photo par le talentueux                   Sungondese-Jr.', 45),
(2, 'imagedeux.jpg', 'Crique maritime', 'Un paysage féérique qui donne envie de voyager.', 60),
(3, 'imagetrois.jpg', 'Vallée Rocheuse', 'Des rochers qui font plaisir #moumou.', 30),
(4, 'imagequatre.jpg', 'Fortnite', 'Un lieu emblématique du jeu populaire Fortnite Battle royale.', 100),
(5, 'téléchargé.jpg', 'Daniel Craig', 'Le c&eacute;l&egrave;bre acteur qui incarne James Bond dans les films du m&ecirc;me nom.', 75),
(6, 'FDERXFzXMAcZIuI.jpg', 'Doigby', 'Le streamer qui &agrave; &eacute;t&eacute; le GOAT durant le ZEVENT 2021', 400);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `type` varchar(20) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `credit` int NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `type`, `mdp`, `credit`, `photo`) VALUES
(10, 'Evin', 'Baptiste', 'baptbg@gmail.com', 'photographe', '5e8667a439c68f5145dd2fcbecf02209', 10, 'FDERXFzXMAcZIuI.jpg'),
(5, 'Chovanec', 'Jeremy', 'grosbg@gmail.com', 'client', '25d55ad283aa400af464c76d713c07ad', 3905, 'FDERXFzXMAcZIuI.jpg'),
(12, 'MONROCQ', 'Ugo', 'aaaa@aa.fr', 'client', '25d55ad283aa400af464c76d713c07ad', 100, 'téléchargé.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
