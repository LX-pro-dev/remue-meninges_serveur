-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 19 Août 2020 à 15:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `remue_meninges`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE IF NOT EXISTS `carte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `langue` varchar(4) NOT NULL,
  `question` text NOT NULL,
  `indice` text,
  `reponse` text NOT NULL,
  `category` tinyint(4) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `dateceration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `langue` (`langue`,`category`,`level`,`dateceration`),
  FULLTEXT KEY `question` (`question`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `carte`
--

INSERT INTO `carte` (`id`, `langue`, `question`, `indice`, `reponse`, `category`, `level`, `dateceration`) VALUES
(1, 'fr', 'Quelle est la couleur du cheval blanc d''Henri IV?\r\n\r\nRouge\r\nVert\r\nJaune\r\nBlanc', 'En fait ce n''est pas une couleur', 'Blanc', 1, 1, '2020-08-19 15:52:29'),
(2, 'fr', 'Quel est l''age du capitaine?\r\n', 'C''est pas facile comme question.', '64 ans', 2, 3, '2020-08-19 15:52:29'),
(3, 'fr', 'Combien font 4 x 2 ?', 'C''est le nombre de jour d''une semaine sur Vénus', '8', 3, 1, '2020-08-19 15:52:29'),
(4, 'fr', 'Compléter ce dicton :\r\nS''il n''y a pas de solution...\r\n', '', '...c''est qu''il n''y a pas de problèmes', 4, 2, '2020-08-19 15:52:29'),
(5, 'fr', 'A quelle est la longueur d''onde l''oeil humain est-il le plus sensible?\r\n', 'C''est celle qui est la plus présente sur terre.', 'Vert', 6, 3, '2020-08-19 15:52:29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
