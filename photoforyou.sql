-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 24 avr. 2022 à 16:34
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

DELIMITER $$
--
-- Fonctions
--
DROP FUNCTION IF EXISTS `client_sans_credit`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `client_sans_credit` (`typeU` VARCHAR(30)) RETURNS INT BEGIN
declare credits int;
SELECT count(*) into credits
FROM users WHERE type=typeU AND
users.credit=0;
RETURN credits;
END$$

DROP FUNCTION IF EXISTS `InitCap`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `InitCap` (`nom` VARCHAR(255)) RETURNS VARCHAR(255) CHARSET utf8mb4 BEGIN
declare nomCorrect varchar(255);
SET nomCorrect=CONCAT(UPPER(SUBSTRING(nom,1,1)),LOWER(SUBSTRING(nom,2)));
RETURN nomCorrect;
END$$

DROP FUNCTION IF EXISTS `MoyenneCreditPhotographe`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `MoyenneCreditPhotographe` () RETURNS FLOAT BEGIN
declare moy float;
declare nb int;
select count(*) into nb from users where type="photographe";
select credit into moy From users where type="photographe";
RETURN moy/nb;
END$$

DELIMITER ;

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
  `id_vendeur` int NOT NULL,
  `id_acheteur` int DEFAULT NULL,
  PRIMARY KEY (`idPhoto`),
  KEY `id_users` (`id_vendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`idPhoto`, `nomPhoto`, `nomCard`, `descCard`, `prixCard`, `id_vendeur`, `id_acheteur`) VALUES
(1, 'imagetest.jpg', 'Jolie Fleure', 'Une belle fleure prise en photo par le talentueux                   Sungondese-Jr.', 45, 0, 13),
(2, 'imagedeux.jpg', 'Crique maritime', 'Un paysage féérique qui donne envie de voyager.', 60, 0, 13),
(3, 'imagetrois.jpg', 'Vallée Rocheuse', 'Des rochers qui font plaisir #moumou.', 30, 0, NULL),
(4, 'imagequatre.jpg', 'Fortnite', 'Un lieu emblématique du jeu populaire Fortnite Battle royale.', 100, 0, NULL),
(5, 'téléchargé.jpg', 'Daniel Craig', 'Le c&eacute;l&egrave;bre acteur qui incarne James Bond dans les films du m&ecirc;me nom.', 75, 0, NULL),
(6, 'FDERXFzXMAcZIuI.jpg', 'Doigby', 'Le streamer qui &agrave; &eacute;t&eacute; le GOAT durant le ZEVENT 2021', 400, 0, NULL),
(7, 'Null-on-Twitter_-_...-_.jpg', 'Denji', 'Le protagoniste de Chainsaw Man, il est bg', 5000, 0, NULL),
(8, 'blush.jpg', 'Dodoko', 'Un personnage du jeu Genshin Impact', 800, 0, NULL),
(9, 'IMG_20210519_140214_117.jpg', 'Terry', 'Un homme extrêmement beau, donc qui vaut très chère', 9000, 0, NULL),
(10, '2DAC42A8-05BA-49EE-A45C-0B1413957C46.jpeg', 'Montebello', 'Il prend des photos en secret le bougre', 1000, 0, NULL),
(11, 'FE1x-EQXwAEeCB4.jpg', 'test', 'test', 1, 0, NULL),
(12, 'p1100252.jpg', 'Photo', 'belle photo', 300, 0, NULL),
(13, 'feur.jpg', 'gogogog', '&lt;script&gt;alert(&quot;ok&quot;)&lt;/script&gt;', 50, 0, NULL),
(14, 'ruby-programming-language.png', 'Ruby', 'langage d\'un site en poo', 80, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `statistique`
--

DROP TABLE IF EXISTS `statistique`;
CREATE TABLE IF NOT EXISTS `statistique` (
  `idstatistique` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `champs` varchar(255) DEFAULT NULL,
  `valeurs` int NOT NULL,
  PRIMARY KEY (`idstatistique`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `statistique`
--

INSERT INTO `statistique` (`idstatistique`, `date`, `champs`, `valeurs`) VALUES
(1, '2021-12-10', 'MoyenneCreditPhotographe', 4610);

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
  `etat` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `type`, `mdp`, `credit`, `photo`, `etat`) VALUES
(5, 'Chovanec', 'Jeremy', 'grosbg@gmail.com', 'photographe', '25d55ad283aa400af464c76d713c07ad', 3954, 'FDERXFzXMAcZIuI.jpg', 'valid'),
(10, 'Evin', 'Baptiste', 'baptbg@gmail.com', 'photographe', '5e8667a439c68f5145dd2fcbecf02209', 4610, 'FDERXFzXMAcZIuI.jpg', 'valid'),
(12, 'MONROCQ', 'Ugo', 'aaaa@aa.fr', 'client', '25d55ad283aa400af464c76d713c07ad', 0, 'téléchargé.jpg', 'valid'),
(13, 'admin', 'admin', 'admin@admin.com', 'admin', '3a4ebf16a4795ad258e5408bae7be341', 99745, 'adminphoto.jpg', 'valid'),
(14, 'wyrwal', 'adrien', 'adrien@gmail.com', 'client', '25d55ad283aa400af464c76d713c07ad', 2955, 'Type-Belfort.jpg', 'banni');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
