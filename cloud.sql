-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 10 sep. 2024 à 11:11
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cloud`
--

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `size` bigint DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `is_directory` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `idx_file_name` (`name`(250)),
  KEY `idx_user_parent` (`user_id`,`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `user_id`, `name`, `path`, `mime_type`, `size`, `parent_id`, `is_directory`, `created_at`, `updated_at`) VALUES
(120, 2, '72123996869__3F673AAB-C0C7-4630-9B10-9CDA2B99C6DC.jpg', '72123996869__3F673AAB-C0C7-4630-9B10-9CDA2B99C6DC.jpg', 'image/jpeg', 1653433, 0, 0, '2024-07-31 13:20:29', '2024-07-31 13:20:29'),
(119, 2, '72123996869__3F673AAB-C0C7-4630-9B10-9CDA2B99C6DC (1).jpg', '72123996869__3F673AAB-C0C7-4630-9B10-9CDA2B99C6DC (1).jpg', 'image/jpeg', 1653433, 0, 0, '2024-07-31 13:20:28', '2024-07-31 13:20:28'),
(124, 1, 'Carte-vitale-avant-FB.pdf', 'important/Carte-vitale-avant-FB.pdf', 'application/pdf', 2007404, 122, 0, '2024-07-31 13:22:10', '2024-07-31 13:22:10'),
(113, 2, 'zugulul', 'zugulul/', 'directory', 0, 0, 1, '2024-07-31 13:20:17', '2024-07-31 13:20:17'),
(114, 2, 'index.html', 'index.html', 'text/html', 4531, 0, 0, '2024-07-31 13:20:28', '2024-07-31 13:20:28'),
(117, 2, 'Sujet app (1).docx', 'Sujet app (1).docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1082804, 0, 0, '2024-07-31 13:20:28', '2024-07-31 13:20:28'),
(118, 2, '72123996869__3F673AAB-C0C7-4630-9B10-9CDA2B99C6DC (1) (1).jpg', '72123996869__3F673AAB-C0C7-4630-9B10-9CDA2B99C6DC (1) (1).jpg', 'image/jpeg', 1653433, 0, 0, '2024-07-31 13:20:28', '2024-07-31 13:20:28'),
(125, 1, 'rib.pdf', 'important/rib.pdf', 'application/pdf', 5016, 122, 0, '2024-07-31 13:22:10', '2024-07-31 13:22:10'),
(126, 1, '1 heure.cmd', '1 heure.cmd', 'application/octet-stream', 19, 0, 0, '2024-07-31 13:22:25', '2024-07-31 13:22:25'),
(127, 1, '1h30.cmd', '1h30.cmd', 'application/octet-stream', 19, 0, 0, '2024-07-31 13:22:25', '2024-07-31 13:22:25'),
(128, 1, '30 minutes.cmd', '30 minutes.cmd', 'application/octet-stream', 19, 0, 0, '2024-07-31 13:22:25', '2024-07-31 13:22:25'),
(129, 1, '45 minutes.cmd', '45 minutes.cmd', 'application/octet-stream', 19, 0, 0, '2024-07-31 13:22:25', '2024-07-31 13:22:25'),
(121, 1, 'cours', 'cours/', 'directory', 0, 0, 1, '2024-07-31 13:21:53', '2024-07-31 13:21:53'),
(122, 1, 'important', 'important/', 'directory', 0, 0, 1, '2024-07-31 13:21:58', '2024-07-31 13:21:58'),
(123, 1, 'Carte-vitale-arriere-FB.pdf', 'important/Carte-vitale-arriere-FB.pdf', 'application/pdf', 712985, 122, 0, '2024-07-31 13:22:10', '2024-07-31 13:22:10');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `spe_title` varchar(255) NOT NULL,
  `content` text,
  `project_date` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `path` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `title`, `spe_title`, `content`, `project_date`, `icon`, `path`) VALUES
(1, 'Palindrome', 'Vérificateur de Palindrome', 'HTML / CSS / JS', 'Fait le 11/2022', 'fas fa-sync-alt', './'),
(2, 'Loto', 'SPA Jeu de loto', 'HTML / CSS / JS / REACT', 'Fait le 01/2023', 'fas fa-dice', './'),
(3, 'Méteo', 'Application Méteo', 'HTML / CSS / JS / Api OpenWeather', 'Fait le 04/2023', 'fas fa-cloud-sun', './'),
(4, 'Stage', 'Gestion stages élèves', 'HTML / PicoCSS / JS / PHP', 'Fait le 05/2023', 'fas fa-graduation-cap', './'),
(5, 'Projet 1', 'Explication projet', 'Contenu de la carte', 'Date du projet', 'fas fa-project-diagram', './'),
(6, 'Projet 2', 'Explication projet', 'Contenu de la carte', 'Date du projet', 'fas fa-tasks', './'),
(7, 'Projet 3', 'Explication projet', 'Contenu de la carte', 'Date du projet', 'fas fa-code', './'),
(8, 'Projet 4', 'Explication projet', 'Contenu de la carte', 'Date du projet', 'fas fa-laptop-code', './'),
(9, 'Projet 5', 'Explication projet', 'Contenu de la carte', 'Date du projet', 'fas fa-cogs', './'),
(10, 'Projet 6', 'Explication projet', 'Contenu de la carte', 'Date du projet', 'fas fa-tools', './'),
(11, 'Autre Carte', 'Autre titre spécifique', 'Contenu d\'une autre carte', 'Fait le 06/2023', 'fas fa-star', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Bastien', 'a@e', '$2y$10$KlSf3oCeHwXlMswdmn9TrOTKzsfHmlTli239DYbK1Bq8QxzKIS0Fa', '2024-07-27 09:46:46'),
(2, 'Léa', 'Lea@gmail.com', '$2y$10$SBWxh9BfBWM38036SblHMeM/YBO/Hsd5bN0pfKyap4sV6AJYwsHci', '2024-07-27 12:08:03'),
(3, 'admin', 'admin@gmail.com', '$2y$10$7N2NKfULQ9Bv1IP1FS2u4efWXoCer8ZhUlCtvGaM53OYL6SZOCRnW', '2024-07-31 13:25:02'),
(14, 'chrichri', 'chrichri@email', 'root', '2024-07-31 21:58:13'),
(13, 'sophie', 'sophie@email', 'root', '2024-07-31 21:58:13'),
(12, 'lolo', 'lolo@email', 'root', '2024-07-31 21:58:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
