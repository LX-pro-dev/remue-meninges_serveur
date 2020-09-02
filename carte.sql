-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 02 Septembre 2020 à 11:11
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
  `datecreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `langue` (`langue`,`category`,`level`,`datecreation`),
  FULLTEXT KEY `question` (`question`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Contenu de la table `carte`
--

INSERT INTO `carte` (`id`, `langue`, `question`, `indice`, `reponse`, `category`, `level`, `datecreation`) VALUES
(1, 'fr', 'Quelle est la couleur du cheval blanc d''Henri IV?\r\n\r\nRouge\r\nVert\r\nJaune\r\nBlanc', 'En fait ce n''est pas une couleur', 'Blanc', 1, 1, '2020-08-19 15:52:29'),
(2, 'fr', 'Quel est l age du capitaine?\r\n', 'C est pas facile comme question.', '64 ans', 2, 3, '2020-08-19 15:52:29'),
(3, 'fr', 'Combien font 4 x 2 ?', 'C est le nombre de jour d une semaine sur Vénus', '8', 3, 1, '2020-08-19 15:52:29'),
(4, 'fr', 'Compléter ce dicton :\r\nS il n''y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-19 15:52:29'),
(5, 'fr', 'A quelle longueur d''onde l''oeil humain est-il le plus sensible?\r\n', 'C''est celle qui est la plus présente sur terre.', 'Vert', 6, 3, '2020-08-19 15:52:29'),
(6, 'fr', 'Qu est-ce que le bonheur', NULL, 'Donner', 1, 1, '2020-08-24 00:00:00'),
(9, 'en', 'hello', 'coco', 'from the island', 2, 2, '2020-08-26 05:41:24'),
(10, 'en', 'what''s yout name', 'your name', 'my is charlie', 4, 1, '2020-08-26 05:49:52'),
(11, 'fr', 'Compléter ce dicton :\r\nS il n''y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 00:54:39'),
(12, 'fr', 'Compléter ce dicton :\r\nS il n y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 00:55:35'),
(13, 'fr', 'Compléter ce dicton : S il n y a pas de solution...', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 00:57:05'),
(14, 'fr', 'Compléter ce dicton :\r\nS il n y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 01:05:31'),
(15, 'fr', 'Compléter ce dicton :\r\nS il n y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 01:07:33'),
(16, 'fr', 'Compléter ce dicton :\r\nS il n y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 01:08:25'),
(17, 'fr', 'Coucou les cocos', '', '...c est cool!', 4, 2, '2020-08-27 01:10:20'),
(20, 'fr', 'Compléter ce dicton : S il n y a pas de solution... ', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 01:29:28'),
(21, 'fr', 'Compléter ce dicton :\r\nS il n y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 01:29:37'),
(22, 'fr', 'Compléter ce dicton :\r\nS il n y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 01:30:03'),
(23, 'fr', 'Compléter ce dicton :\r\nS il n y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 01:30:04'),
(24, 'fr', 'Compléter ce dicton :\r\nS il n y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 01:30:04'),
(26, 'fr', 'Compléter ce dicton :\r\nS il n y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 01:32:06'),
(27, 'fr', 'Compléter ce dicton :\r\nS il n y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 01:32:26'),
(28, '', '', '', '', 0, 0, '2020-08-27 08:35:20'),
(30, 'fr', '', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 10:37:27'),
(31, 'fr', '', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 10:38:46'),
(32, 'fr', '', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 10:39:35'),
(33, 'fr', 'Compléter ce dicton :\r\nS''il n y a pas de solution...\r\n', '', '...c est qu il n y a pas de problème !', 4, 2, '2020-08-27 10:39:54'),
(34, '', '', '', '', 0, 0, '2020-08-27 10:47:29'),
(35, '', '', '', '', 0, 0, '2020-08-27 10:48:08'),
(36, '', '', '', '', 0, 0, '2020-08-27 10:48:58'),
(37, '', '', '', '', 0, 0, '2020-08-27 10:50:05'),
(38, '', '', '', '', 0, 0, '2020-08-27 10:50:27'),
(39, '', '', '', '', 0, 0, '2020-08-27 10:50:49'),
(40, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution...\r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-27 10:55:53'),
(41, '', '', '', '', 0, 0, '2020-08-27 10:57:23'),
(42, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-27 10:57:30'),
(43, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-28 10:44:58'),
(44, '', '', '', '', 0, 0, '2020-08-28 11:40:55'),
(45, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-28 11:41:18'),
(46, '', '', '', '', 0, 0, '2020-08-28 11:42:43'),
(47, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-28 11:45:11'),
(48, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-28 11:51:48'),
(49, '', '', '', '', 0, 0, '2020-08-28 12:14:10'),
(50, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-28 12:17:53'),
(51, '', '', '', '', 0, 0, '2020-08-28 12:18:18'),
(52, '', '', '', '', 0, 0, '2020-08-28 12:19:11'),
(53, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-28 12:19:16'),
(54, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-28 12:19:17'),
(55, '', '', '', '', 0, 0, '2020-08-28 12:19:21'),
(56, '', '', '', '', 0, 0, '2020-08-28 12:19:37'),
(57, '', '', '', '', 0, 0, '2020-08-28 14:57:19'),
(58, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-28 14:59:50'),
(59, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-28 14:59:53'),
(60, '', '', '', '', 0, 0, '2020-08-28 15:07:55'),
(61, '', '', '', '', 0, 0, '2020-08-31 15:20:28'),
(62, '', '', '', '', 0, 0, '2020-08-31 15:21:21'),
(63, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-31 15:21:26'),
(64, '', '', '', '', 0, 0, '2020-08-31 15:21:40'),
(65, '', '', '', '', 0, 0, '2020-08-31 15:22:16'),
(66, '', '', '', '', 0, 0, '2020-08-31 15:22:43'),
(67, '', '', '', '', 0, 0, '2020-08-31 15:24:19'),
(68, '', '', '', '', 0, 0, '2020-08-31 15:25:43'),
(69, '', '', '', '', 0, 0, '2020-08-31 15:26:21'),
(70, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-31 15:26:28'),
(71, '', '', '', '', 0, 0, '2020-08-31 15:27:35'),
(72, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-08-31 17:37:59'),
(73, '', '', '', '', 0, 0, '2020-08-31 17:38:18'),
(74, '', '', '', '', 0, 0, '2020-09-01 04:53:03'),
(75, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-09-01 05:06:01'),
(76, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-09-01 05:07:20'),
(78, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-09-01 05:07:22'),
(79, 'fr', 'Compléter ce dicton :\r\n S''il n y a pas de solution... \r\n', '', '...c''est qu''il n y a pas de problème !', 4, 2, '2020-09-01 12:29:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
