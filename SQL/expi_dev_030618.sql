-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 03 juin 2018 à 20:07
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `expi_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `type_ids` varchar(255) DEFAULT NULL,
  `theme_ids` varchar(510) DEFAULT NULL,
  `themes` text,
  `title` varchar(255) NOT NULL,
  `img_uuid` varchar(36) DEFAULT NULL,
  `short_description` varchar(144) NOT NULL,
  `long_description` text NOT NULL,
  `place_id` int(10) UNSIGNED DEFAULT NULL,
  `place_ids` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `update_last` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `img_id` (`img_uuid`),
  KEY `update_last` (`update_last`),
  KEY `place_id` (`place_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `experiences_contents`
--

DROP TABLE IF EXISTS `experiences_contents`;
CREATE TABLE IF NOT EXISTS `experiences_contents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `experience_uuid` varchar(36) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `experience_uuid` (`experience_uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `experiences_images`
--

DROP TABLE IF EXISTS `experiences_images`;
CREATE TABLE IF NOT EXISTS `experiences_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `href` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `interest101`
--

DROP TABLE IF EXISTS `interest101`;
CREATE TABLE IF NOT EXISTS `interest101` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_ids` text NOT NULL COMMENT '"-" separated value',
  `theme_ids` mediumtext NOT NULL COMMENT '"-" separated value',
  `place_ids` text NOT NULL COMMENT '"-" separated value',
  `city_ids` text NOT NULL COMMENT '"-" separated value',
  `departement_ids` varchar(1000) NOT NULL COMMENT '"-" separated value',
  `region_ids` varchar(255) NOT NULL COMMENT '"-" separated value',
  `activity_ids` mediumtext NOT NULL COMMENT '"-" separated value',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `interests_themes`
--

DROP TABLE IF EXISTS `interests_themes`;
CREATE TABLE IF NOT EXISTS `interests_themes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `class` varchar(80) NOT NULL,
  `added_at` datetime NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL COMMENT 'added_by',
  `theme_ids` text NOT NULL COMMENT 'associated themes, "-" separated value',
  `is_used` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `class` (`class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `interests_types`
--

DROP TABLE IF EXISTS `interests_types`;
CREATE TABLE IF NOT EXISTS `interests_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `class` varchar(80) NOT NULL,
  `added_at` datetime NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL COMMENT 'added_by',
  `is_used` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `class` (`class`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `interests_types`
--

INSERT INTO `interests_types` (`id`, `name`, `class`, `added_at`, `user_id`, `is_used`) VALUES
(0, 'Tout', 'tout', '2018-03-30 14:08:15', 0, 1),
(1, 'Voir', 'voir', '2018-02-14 10:05:48', 0, 1),
(2, '&Eacute;couter', 'ecouter', '2018-02-14 10:05:48', 0, 1),
(3, 'Go&ucirc;ter', 'gouter', '2018-02-14 10:06:57', 0, 1),
(4, 'Sortir', 'sortir', '2018-02-14 10:06:57', 0, 1),
(5, 'Rencontrer', 'rencontrer', '2018-02-14 10:07:30', 0, 1),
(6, 'Transpirer', 'transpirer', '2018-03-03 18:32:50', 0, 1),
(7, 'Jouer', 'jouer', '2018-03-03 18:34:16', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `locations_cities`
--

DROP TABLE IF EXISTS `locations_cities`;
CREATE TABLE IF NOT EXISTS `locations_cities` (
  `ville_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ville_departement` varchar(3) DEFAULT NULL,
  `ville_slug` varchar(255) DEFAULT NULL,
  `ville_nom` varchar(45) DEFAULT NULL,
  `ville_nom_simple` varchar(45) DEFAULT NULL,
  `ville_nom_reel` varchar(45) DEFAULT NULL,
  `ville_nom_soundex` varchar(20) DEFAULT NULL,
  `ville_nom_metaphone` varchar(22) DEFAULT NULL,
  `ville_code_postal` varchar(255) DEFAULT NULL,
  `ville_commune` varchar(3) DEFAULT NULL,
  `ville_code_commune` varchar(5) NOT NULL,
  `ville_arrondissement` smallint(3) UNSIGNED DEFAULT NULL,
  `ville_canton` varchar(4) DEFAULT NULL,
  `ville_amdi` smallint(5) UNSIGNED DEFAULT NULL,
  `ville_population_2010` mediumint(11) UNSIGNED DEFAULT NULL,
  `ville_population_1999` mediumint(11) UNSIGNED DEFAULT NULL,
  `ville_population_2012` mediumint(10) UNSIGNED DEFAULT NULL COMMENT 'approximatif',
  `ville_densite_2010` int(11) DEFAULT NULL,
  `ville_surface` float DEFAULT NULL,
  `ville_longitude_deg` float DEFAULT NULL,
  `ville_latitude_deg` float DEFAULT NULL,
  `ville_longitude_grd` varchar(9) DEFAULT NULL,
  `ville_latitude_grd` varchar(8) DEFAULT NULL,
  `ville_longitude_dms` varchar(9) DEFAULT NULL,
  `ville_latitude_dms` varchar(8) DEFAULT NULL,
  `ville_zmin` mediumint(4) DEFAULT NULL,
  `ville_zmax` mediumint(4) DEFAULT NULL,
  PRIMARY KEY (`ville_id`),
  UNIQUE KEY `ville_code_commune_2` (`ville_code_commune`),
  UNIQUE KEY `ville_slug` (`ville_slug`),
  KEY `ville_departement` (`ville_departement`),
  KEY `ville_nom` (`ville_nom`),
  KEY `ville_nom_reel` (`ville_nom_reel`),
  KEY `ville_code_commune` (`ville_code_commune`),
  KEY `ville_code_postal` (`ville_code_postal`),
  KEY `ville_longitude_latitude_deg` (`ville_longitude_deg`,`ville_latitude_deg`),
  KEY `ville_nom_soundex` (`ville_nom_soundex`),
  KEY `ville_nom_metaphone` (`ville_nom_metaphone`),
  KEY `ville_population_2010` (`ville_population_2010`),
  KEY `ville_nom_simple` (`ville_nom_simple`)
) ENGINE=MyISAM AUTO_INCREMENT=36831 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `locations_departments`
--

DROP TABLE IF EXISTS `locations_departments`;
CREATE TABLE IF NOT EXISTS `locations_departments` (
  `departement_id` int(11) NOT NULL AUTO_INCREMENT,
  `departement_code` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_uppercase` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_soundex` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`departement_id`),
  KEY `departement_slug` (`departement_slug`),
  KEY `departement_code` (`departement_code`),
  KEY `departement_nom_soundex` (`departement_nom_soundex`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `locations_places`
--

DROP TABLE IF EXISTS `locations_places`;
CREATE TABLE IF NOT EXISTS `locations_places` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `longitude` varchar(42) NOT NULL,
  `latitude` varchar(42) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uuid` (`uuid`),
  KEY `uuid_2` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `nav_description` varchar(255) DEFAULT NULL,
  `pages_nav_ids` varchar(255) NOT NULL COMMENT '"-" separated values',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `title`, `class`, `href`, `nav_description`, `pages_nav_ids`) VALUES
(1, 'Accueil', 'accueil', 'constant(\'HTTPH\') . \'accueil\'', 'Navigation & bo&icirc;te &agrave; outils', '1-2-3-4'),
(2, 'Cr&eacute;ation d\'exp&eacute;rience', 'creation_experience', 'constant(\'HTTPH\') . \'creation-experience\'', 'Navigation', '2-3-4'),
(3, '&Eacute;dition d\'exp&eacute;rience', 'edition_experience', 'constant(HTTPH) . \'edition-experience\'', 'Navigation', '1-2-3-4'),
(4, 'Affichage d\'exp&eacute;rience', 'affichage_experience', 'constant(HTTPH) . \'affichage-experience\'', 'Navigation', '1-2-3-4');

-- --------------------------------------------------------

--
-- Structure de la table `pages_links`
--

DROP TABLE IF EXISTS `pages_links`;
CREATE TABLE IF NOT EXISTS `pages_links` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `order_value` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pages_links`
--

INSERT INTO `pages_links` (`id`, `title`, `class`, `href`, `order_value`) VALUES
(1, 'Ajouter une exp&eacute;rience', 'ajout_xp', 'constant(\'HTTPH\') . \'creation-experience\'', 80),
(2, 'Accueil', 'accueil', 'constant(\'HTTPH\') . \'accueil\'', 100);

-- --------------------------------------------------------

--
-- Structure de la table `pages_navs`
--

DROP TABLE IF EXISTS `pages_navs`;
CREATE TABLE IF NOT EXISTS `pages_navs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `order_value` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `pages_link_ids` varchar(255) NOT NULL COMMENT '"-" separated values',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pages_navs`
--

INSERT INTO `pages_navs` (`id`, `title`, `class`, `order_value`, `description`, `pages_link_ids`) VALUES
(1, 'Bo&icirc;te &agrave; Outils', 'boite_outils', 100, 'Contient les action possibles sur la page', '1'),
(2, 'Mes int&eacute;r&ecirc;ts', 'mes_interets', 80, 'Contient ce qui m\'int&eacute;resse le plus', ''),
(3, 'Int&eacute;r&ecirc;ts globaux', 'interets_globaux', 70, 'Contient ce qui int&eacute;resse le plus de monde', ''),
(4, 'Navigation', 'navigation', 90, 'Contient des liens pour naviguer entre les pages', '2');

-- --------------------------------------------------------

--
-- Structure de la table `updates`
--

DROP TABLE IF EXISTS `updates`;
CREATE TABLE IF NOT EXISTS `updates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `edited_table` varchar(255) NOT NULL,
  `table_ids` text NOT NULL COMMENT 'updated objects'' IDs, "-" separated value',
  `description` varchar(144) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `registration` datetime NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `pseudo` varchar(25) DEFAULT NULL,
  `name` varchar(140) DEFAULT NULL,
  `surname` varchar(140) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `localisation` varchar(125) DEFAULT NULL COMMENT 'longitude-lattitude',
  `interest101_uuid` varchar(36) NOT NULL,
  `avatar_uuid` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  KEY `role_id` (`role_id`),
  KEY `interest101_uuid` (`interest101_uuid`),
  KEY `avatar_uuid` (`avatar_uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_avatars`
--

DROP TABLE IF EXISTS `users_avatars`;
CREATE TABLE IF NOT EXISTS `users_avatars` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `href` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `added_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_interest101`
--

DROP TABLE IF EXISTS `users_interest101`;
CREATE TABLE IF NOT EXISTS `users_interest101` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `type_ids` text COMMENT '"-" separated value',
  `theme_ids` mediumtext COMMENT '"-" separated value',
  `place_ids` text COMMENT '"-" separated value',
  `city_ids` text COMMENT '"-" separated value',
  `department_ids` varchar(1000) DEFAULT NULL COMMENT '"-" separated value',
  `region_ids` varchar(255) DEFAULT NULL COMMENT '"-" separated value',
  `experience_ids` mediumtext COMMENT '"-" separated value',
  PRIMARY KEY (`id`),
  KEY `uuid` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_logins`
--

DROP TABLE IF EXISTS `users_logins`;
CREATE TABLE IF NOT EXISTS `users_logins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE IF NOT EXISTS `users_roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `class` varchar(48) NOT NULL,
  `description` varchar(144) NOT NULL,
  `added_at` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'added_by',
  `is_used` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `class` (`class`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences` ADD FULLTEXT KEY `theme_ids` (`theme_ids`);
ALTER TABLE `experiences` ADD FULLTEXT KEY `type_ids` (`type_ids`);
ALTER TABLE `experiences` ADD FULLTEXT KEY `place_ids` (`place_ids`);
ALTER TABLE `experiences` ADD FULLTEXT KEY `research` (`title`,`short_description`,`long_description`);
ALTER TABLE `experiences` ADD FULLTEXT KEY `themes` (`themes`);

--
-- Index pour la table `locations_places`
--
ALTER TABLE `locations_places` ADD FULLTEXT KEY `title` (`title`);
ALTER TABLE `locations_places` ADD FULLTEXT KEY `class` (`class`);
ALTER TABLE `locations_places` ADD FULLTEXT KEY `description` (`description`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
