-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 29 Juin 2016 à 14:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mcq`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier',
  `question_id` int(11) NOT NULL COMMENT 'Question associated Unique identifier',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'answer''s entitled',
  `is_Valid` tinyint(1) NOT NULL COMMENT '1 if correct answer',
  `created_at` datetime NOT NULL COMMENT 'Creation date',
  `updated_at` datetime NOT NULL COMMENT 'Modification date',
  PRIMARY KEY (`id`),
  KEY `IDX_DADD4A251E27F6BF` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Contenu de la table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `value`, `is_Valid`, `created_at`, `updated_at`) VALUES
(3, 4, 'reponse 1', 0, '2016-03-23 14:17:17', '2016-03-23 14:17:17'),
(4, 4, 'reponse 2', 1, '2016-03-23 14:17:27', '2016-03-23 14:17:40'),
(5, 5, 'le diagramme de classe c''est super', 0, '2016-03-26 08:53:07', '2016-03-26 08:53:07'),
(6, 5, 'Le diagramme de séquence permet de séquencer', 1, '2016-03-26 08:53:49', '2016-03-26 08:53:49'),
(7, 6, 'reponse 11', 1, '2016-05-05 11:11:19', '2016-05-05 11:11:19'),
(8, 6, 'reponse 111', 0, '2016-05-05 11:11:32', '2016-05-05 11:12:19'),
(9, 6, 'reponse 1112', 0, '2016-05-05 11:11:50', '2016-05-05 11:12:40'),
(10, 7, 'reponse 2', 1, '2016-05-05 11:13:20', '2016-05-05 11:13:20'),
(11, 7, 'reponse 22', 0, '2016-05-05 11:13:45', '2016-05-05 11:13:45'),
(12, 7, 'reponse 223', 0, '2016-05-05 11:13:59', '2016-05-05 11:13:59'),
(13, 8, 'reponse 4', 1, '2016-05-05 11:14:23', '2016-05-05 11:14:23'),
(14, 8, 'reponse 44', 0, '2016-05-05 11:14:34', '2016-05-05 11:14:34'),
(15, 8, 'reponse 444', 0, '2016-05-05 11:14:48', '2016-05-05 11:14:48'),
(16, 9, 'reponse 5', 1, '2016-05-05 11:15:00', '2016-05-05 11:15:00'),
(17, 9, 'reponse 55', 0, '2016-05-05 11:15:09', '2016-05-05 11:15:09'),
(18, 9, 'reponse 555', 0, '2016-05-05 11:15:24', '2016-05-05 11:15:24'),
(19, 10, 'reponse 6', 1, '2016-05-05 11:15:39', '2016-05-05 11:15:39'),
(20, 10, 'reponse 66', 0, '2016-05-05 11:15:49', '2016-05-05 11:15:49'),
(21, 10, 'reponse 666', 0, '2016-05-05 11:16:00', '2016-05-05 11:16:00'),
(22, 11, 'reponse 7', 1, '2016-05-05 11:16:12', '2016-05-05 11:16:12'),
(23, 11, 'reponse 77', 0, '2016-05-05 11:16:22', '2016-05-05 11:16:22'),
(24, 11, 'reponse 777', 0, '2016-05-05 11:16:38', '2016-05-05 11:16:38');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Category''s name',
  `created_at` datetime NOT NULL COMMENT 'Creation date',
  `updated_at` datetime NOT NULL COMMENT 'Modification date',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_64C19C15E237E06` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'java', '2016-03-07 00:00:00', '2016-03-07 00:00:00'),
(3, 'CSharp', '2016-03-14 00:00:00', '2016-03-15 00:00:00'),
(4, 'Gestion de projets', '2016-03-23 10:33:38', '2016-03-23 10:34:03'),
(5, 'Uml', '2016-03-26 08:42:59', '2016-03-26 08:42:59'),
(6, 'C++', '2016-05-11 10:00:11', '2016-05-11 10:00:11');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User name',
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user email',
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'encrypt password key',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user password',
  `last_login` datetime DEFAULT NULL COMMENT 'user last login date',
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT 'Creation date',
  `updated_at` datetime NOT NULL COMMENT 'Modification date',
  `team_id` int(11) DEFAULT NULL COMMENT 'Team identifier associated',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  KEY `IDX_957A6479296CD8AE` (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `created_at`, `updated_at`, `team_id`) VALUES
(1, 'antoine', 'antoine', 'antoinetrouve.france@gmail.com', 'antoinetrouve.france@gmail.com', 1, 'jdfyfov1sf4gksgoog8cswwos8wcos4', '$2y$13$jdfyfov1sf4gksgoog8csu2/NePuGquNOZx4uDBZ6NttQLSaN9Ceu', '2016-06-29 14:01:55', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '2016-01-28 15:41:32', '2016-06-29 14:01:55', 1),
(2, 'root', 'root', 'antrouve.pro@gmail.com', 'antrouve.pro@gmail.com', 1, 'syxiwglag9cc4w840ws4co0k8884c4c', '$2y$13$syxiwglag9cc4w840ws4ceTxhMzogGh9m/TeUbQx7gixI.YA2iV6W', '2016-06-29 09:24:40', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2016-03-12 09:38:59', '2016-06-29 09:24:40', 1),
(3, 'test', 'test', 'test@test.fr', 'test@test.fr', 1, 'krc4mhm73q8gcwooss0ww4c80w84kko', '$2y$13$krc4mhm73q8gcwooss0wwuSp6U93JgHOecjf41p6bnOpDL6KJwRi.', '2016-03-22 10:13:47', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2016-03-22 10:13:47', '2016-03-22 10:13:47', NULL),
(4, 'antoinesha512', 'antoinesha512', 'antoinesha512@mail.com', 'antoinesha512@mail.com', 1, '7m2097zy81s0k0gkg4cosgswoscock4', '93dh64uuPb0kSSDFkghDoEZfZo3oJV7KgT9QtuVaXhGOrFFBH1l2Kp0YCxHOVavGuTmo5MjRLgrkKafO11CBAA==', '2016-05-28 10:20:56', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '2016-05-28 10:18:14', '2016-05-28 10:20:56', NULL),
(5, 'antoine2', 'antoine2', 'antoine2@mail.com', 'antoine2@mail.com', 1, 'b31vobpours4sc0k4cwg88c4cg84sco', 'xCuod8MmNXWRBqzymSZdA5EbKVkji4TrcVBbcFLDpCylfEvrKVQreCbkZ9hGMUthV38697/w+dUEUPDO45f8mA==', '2016-05-28 10:49:21', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '2016-05-28 10:45:15', '2016-05-28 10:49:21', NULL),
(10, 'admin', 'admin', 'admin@gmail.com', 'admin@gmail.com', 0, 'ly1c0ksy79c4wog8ocggwc88kg4wc8g', 'admin53!', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '2016-06-29 14:02:37', '2016-06-29 14:06:16', 7);

-- --------------------------------------------------------

--
-- Structure de la table `mcq`
--

CREATE TABLE IF NOT EXISTS `mcq` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier',
  `category_id` int(11) NOT NULL COMMENT 'Category identifier associated',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mcq name',
  `is_Actif` tinyint(1) NOT NULL COMMENT '1 if published',
  `countdown` int(11) NOT NULL COMMENT 'time to answer qcm',
  `diffDeb` datetime NOT NULL COMMENT 'begin time to publish',
  `diffEnd` datetime NOT NULL COMMENT 'End time to publish',
  `created_at` datetime NOT NULL COMMENT 'Creation date',
  `updated_at` datetime NOT NULL COMMENT 'Modification date',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D69CF8AF5E237E06` (`name`),
  KEY `IDX_D69CF8AF12469DE2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `mcq`
--

INSERT INTO `mcq` (`id`, `category_id`, `name`, `is_Actif`, `countdown`, `diffDeb`, `diffEnd`, `created_at`, `updated_at`) VALUES
(3, 3, 'NUM3', 1, 5000, '2016-03-14 00:00:00', '2016-03-14 00:00:00', '2016-03-14 00:00:00', '2016-03-14 00:00:00'),
(7, 4, 'Examen 5', 1, 60000, '2011-01-01 00:00:00', '2011-01-01 00:00:00', '2016-03-23 13:35:31', '2016-03-23 13:57:09'),
(8, 5, 'Devoir sur mobile', 1, 9000, '2016-03-05 08:00:00', '2016-03-05 09:30:00', '2016-03-26 08:45:00', '2016-03-26 08:45:00'),
(9, 3, 'NUM4', 1, 60, '2011-01-01 00:00:00', '2011-01-01 00:00:00', '2016-05-05 11:08:27', '2016-05-05 11:08:27'),
(10, 2, 'NUM 5', 1, 75, '2011-01-01 00:00:00', '2011-01-01 00:00:00', '2016-05-05 11:08:54', '2016-05-05 11:08:54'),
(12, 2, 'test2', 0, 1, '2011-01-01 00:00:00', '2011-01-01 00:00:00', '2016-06-29 11:12:34', '2016-06-29 11:42:37');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier',
  `type_media_id` int(11) DEFAULT NULL COMMENT 'Type media identifier associated',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'media name',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'media url',
  `created_at` datetime NOT NULL COMMENT 'creation date',
  `updated_at` datetime NOT NULL COMMENT 'Modification name',
  PRIMARY KEY (`id`),
  KEY `IDX_6A2CA10C2760FA89` (`type_media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id`, `type_media_id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(2, 3, 'map', 'http://www.vectortemplates.com/raster/maps-world-map-02.png', '2016-03-23 09:41:43', '2016-03-23 09:41:43');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier',
  `media_id` int(11) DEFAULT NULL COMMENT 'media identifier associated',
  `mcq_id` int(11) NOT NULL COMMENT 'mcq identifier associated',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'question name',
  `createdAt` datetime NOT NULL COMMENT 'creation date',
  `updated_At` datetime NOT NULL COMMENT 'Modification name',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B6F7494EEA9FDD75` (`media_id`),
  KEY `IDX_B6F7494E91B96B61` (`mcq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `media_id`, `mcq_id`, `name`, `createdAt`, `updated_At`) VALUES
(4, 2, 7, 'question 1', '2016-03-23 00:00:00', '2016-03-23 00:00:00'),
(5, NULL, 8, 'Choisir la réponse correcte ci-dessous', '2016-03-26 08:51:49', '2016-03-26 08:51:49'),
(6, NULL, 3, 'question 11', '2016-05-05 11:09:28', '2016-05-05 11:10:41'),
(7, NULL, 3, 'question 2', '2016-05-05 11:09:38', '2016-05-05 11:09:38'),
(8, NULL, 9, 'question 4', '2016-05-05 11:09:49', '2016-05-05 11:09:49'),
(9, NULL, 9, 'question 5', '2016-05-05 11:09:59', '2016-05-05 11:09:59'),
(10, NULL, 10, 'question 6', '2016-05-05 11:10:09', '2016-05-05 11:10:09'),
(11, NULL, 10, 'question 7', '2016-05-05 11:10:19', '2016-05-05 11:10:19');

-- --------------------------------------------------------

--
-- Structure de la table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier',
  `user_id` int(11) DEFAULT NULL COMMENT 'User identifier associated',
  `mcq_id` int(11) DEFAULT NULL COMMENT 'mcq identifier associated',
  `score` int(11) NOT NULL COMMENT 'user qcm score',
  `is_completed` tinyint(1) NOT NULL COMMENT '1 if completed by user',
  `created_At` datetime NOT NULL COMMENT 'creation date',
  `updated_At` datetime NOT NULL COMMENT 'modification date',
  PRIMARY KEY (`id`),
  KEY `IDX_136AC113A76ED395` (`user_id`),
  KEY `IDX_136AC11391B96B61` (`mcq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier',
  `created_at` datetime NOT NULL COMMENT 'creation date',
  `updated_at` datetime NOT NULL COMMENT 'modification date',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'team name',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_64D209215E237E06` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `team`
--

INSERT INTO `team` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2016-03-01 00:00:00', '2016-03-01 00:00:00', 'Cdsm'),
(6, '2016-03-23 16:46:42', '2016-03-23 16:46:42', 'BTS 1'),
(7, '2016-06-29 14:05:19', '2016-06-29 14:05:19', 'Super Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `team_mcq`
--

CREATE TABLE IF NOT EXISTS `team_mcq` (
  `team_id` int(11) NOT NULL COMMENT 'team identifier associated to mcq',
  `mcq_id` int(11) NOT NULL COMMENT 'mcq identifier associated to mcq',
  PRIMARY KEY (`team_id`,`mcq_id`),
  KEY `IDX_8C0F720B296CD8AE` (`team_id`),
  KEY `IDX_8C0F720B91B96B61` (`mcq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `team_mcq`
--

INSERT INTO `team_mcq` (`team_id`, `mcq_id`) VALUES
(1, 3),
(1, 7),
(1, 9),
(6, 3);

-- --------------------------------------------------------

--
-- Structure de la table `type_media`
--

CREATE TABLE IF NOT EXISTS `type_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'type media name',
  `created_at` datetime NOT NULL COMMENT 'creation date',
  `updated_at` datetime NOT NULL COMMENT 'modification date',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_642026FB5E237E06` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `type_media`
--

INSERT INTO `type_media` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'gbfbfg', '2016-03-24 00:00:00', '2016-03-21 00:00:00'),
(3, 'Image', '2016-03-22 16:39:17', '2016-03-22 16:39:17');

-- --------------------------------------------------------

--
-- Structure de la table `user_mcq`
--

CREATE TABLE IF NOT EXISTS `user_mcq` (
  `user_id` int(11) NOT NULL COMMENT 'user identifier associated to mcq',
  `mcq_id` int(11) NOT NULL COMMENT 'mcq identifier associated to user',
  PRIMARY KEY (`user_id`,`mcq_id`),
  KEY `IDX_3D8A9924A76ED395` (`user_id`),
  KEY `IDX_3D8A992491B96B61` (`mcq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_mcq`
--

INSERT INTO `user_mcq` (`user_id`, `mcq_id`) VALUES
(1, 3),
(1, 9),
(1, 10);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `FK_DADD4A251E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);

--
-- Contraintes pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD CONSTRAINT `FK_957A6479296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Contraintes pour la table `mcq`
--
ALTER TABLE `mcq`
  ADD CONSTRAINT `FK_D69CF8AF12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `FK_6A2CA10C2760FA89` FOREIGN KEY (`type_media_id`) REFERENCES `type_media` (`id`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_B6F7494E91B96B61` FOREIGN KEY (`mcq_id`) REFERENCES `mcq` (`id`),
  ADD CONSTRAINT `FK_B6F7494EEA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);

--
-- Contraintes pour la table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `FK_136AC11391B96B61` FOREIGN KEY (`mcq_id`) REFERENCES `mcq` (`id`),
  ADD CONSTRAINT `FK_136AC113A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `team_mcq`
--
ALTER TABLE `team_mcq`
  ADD CONSTRAINT `FK_8C0F720B296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8C0F720B91B96B61` FOREIGN KEY (`mcq_id`) REFERENCES `mcq` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_mcq`
--
ALTER TABLE `user_mcq`
  ADD CONSTRAINT `FK_3D8A992491B96B61` FOREIGN KEY (`mcq_id`) REFERENCES `mcq` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3D8A9924A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
