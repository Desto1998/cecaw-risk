-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cecaw
CREATE DATABASE IF NOT EXISTS `cecaw` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cecaw`;

-- Listage de la structure de la table cecaw. agences
CREATE TABLE IF NOT EXISTS `agences` (
  `agence_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_agence` varchar(255) NOT NULL,
  `adresse_agence` varchar(255) NOT NULL,
  `ville_agence` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`agence_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table cecaw.agences : ~2 rows (environ)
/*!40000 ALTER TABLE `agences` DISABLE KEYS */;
REPLACE INTO `agences` (`agence_id`, `nom_agence`, `adresse_agence`, `ville_agence`, `created_at`, `updated_at`) VALUES
	(1, 'Agence de douala', 'Bepanda', 'Douala', '2022-08-23 21:43:43', '2022-08-23 21:43:43'),
	(2, 'Agence penja', 'Face marche penja', 'Penja', '2022-08-23 21:43:43', '2022-08-23 21:43:43'),
	(3, 'Agence Loum', 'sous prefecture loum', 'Loum', '2022-08-23 21:43:43', '2022-08-23 21:43:43');
/*!40000 ALTER TABLE `agences` ENABLE KEYS */;

-- Listage de la structure de la table cecaw. clients
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(255) NOT NULL,
  `prenom_client` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `ville_residence` varchar(255) NOT NULL,
  `agence` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Listage des données de la table cecaw.clients : ~2 rows (environ)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
REPLACE INTO `clients` (`client_id`, `nom_client`, `prenom_client`, `date_naissance`, `telephone`, `ville_residence`, `agence`, `created_at`, `updated_at`) VALUES
	(3, 'Larissa 1', 'Larie 1', '2022-08-16', '0676934987', 'Douala', 'Agence de douala', '2022-08-23 20:46:35', '2022-08-24 15:08:38'),
	(4, 'Larissa 1', 'Larie 1', '2022-08-16', '0676934987', 'Douala', 'Agence de douala', '2022-08-23 20:46:35', '2022-08-24 15:08:38'),
	(5, 'Larissa 1', 'Larie 1', '2022-08-16', '0676934987', 'Douala', 'Agence de douala', '2022-08-23 20:46:35', '2022-08-24 15:08:38'),
	(6, 'Larissa 1', 'Larie 1', '2022-08-16', '0676934987', 'Douala', 'Agence de douala', '2022-08-23 20:46:35', '2022-08-24 15:08:38'),
	(7, 'Larissa 1', 'Larie 1', '2022-08-16', '0676934987', 'Douala', 'Agence de douala', '2022-08-23 20:46:35', '2022-08-24 15:08:38'),
	(8, 'Larissa 1', 'Larie 1', '2022-08-16', '0676934987', 'Douala', 'Agence de douala', '2022-08-23 20:46:35', '2022-08-24 15:08:38'),
	(9, 'Larissa 1', 'Larie 1', '2022-08-16', '0676934987', 'Douala', 'Agence de douala', '2022-08-23 20:46:35', '2022-08-24 15:08:38'),
	(10, 'Larissa 1', 'Larie 1', '2022-08-16', '0676934987', 'Douala', 'Agence de douala', '2022-08-23 20:46:35', '2022-08-24 15:08:38'),
	(11, 'Larissa 1', 'Larie 1', '2022-08-16', '0676934987', 'Douala', 'Agence de douala', '2022-08-23 20:46:35', '2022-08-24 15:08:38');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Listage de la structure de la table cecaw. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table cecaw.failed_jobs : ~0 rows (environ)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Listage de la structure de la table cecaw. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table cecaw.migrations : ~4 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table cecaw. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table cecaw.password_resets : ~0 rows (environ)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table cecaw. personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table cecaw.personal_access_tokens : ~0 rows (environ)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Listage de la structure de la table cecaw. risques
CREATE TABLE IF NOT EXISTS `risques` (
  `risque_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `montant_pret` float NOT NULL,
  `avance` float NOT NULL,
  `reste` float NOT NULL,
  `date_pret` date NOT NULL,
  `date_reglement` date NOT NULL,
  `statut_declaration` int(11) NOT NULL,
  `commentaire` varchar(5000) NOT NULL,
  `agence_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `compte` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`risque_id`),
  KEY `user_id` (`user_id`),
  KEY `client_id` (`client_id`),
  KEY `agence_id` (`agence_id`),
  CONSTRAINT `risques_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `risques_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE,
  CONSTRAINT `risques_ibfk_3` FOREIGN KEY (`agence_id`) REFERENCES `agences` (`agence_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table cecaw.risques : ~3 rows (environ)
/*!40000 ALTER TABLE `risques` DISABLE KEYS */;
REPLACE INTO `risques` (`risque_id`, `montant_pret`, `avance`, `reste`, `date_pret`, `date_reglement`, `statut_declaration`, `commentaire`, `agence_id`, `user_id`, `client_id`, `created_at`, `updated_at`, `compte`) VALUES
	(1, 250000, 15000, 235000, '2022-08-01', '2022-08-09', 1, 'Il est absent et introuvable nulle part', 1, 1, 3, '2022-08-23 21:29:41', '2022-08-23 21:33:11', '0522555'),
	(2, 7000000, 500000, 6500000, '2022-03-09', '2022-08-11', 0, 'Il devais mais il ne l\'a pas fais', 1, 1, 3, '2022-08-24 14:09:48', '2022-08-24 14:09:48', '0522554');
/*!40000 ALTER TABLE `risques` ENABLE KEYS */;

-- Listage de la structure de la table cecaw. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table cecaw.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `nom`, `prenom`, `email`, `email_verified_at`, `password`, `is_active`, `role`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Laris', 'belle', 'admin@gmail.com', NULL, '$2y$10$pNvh3UJnGLZI3mbBEsDo0evtzhm7yXkkGVtHPy8npm1mSlYNZDbU2', 1, 'admin', 1, NULL, NULL, NULL),
	(3, 'user', 'user', 'user@gmail.com', NULL, '$2y$10$HSpH5hRrdrwg.QunelyWEe6wTMAWvpM8FGigWUyEEIZ80dUI2xAl6', 1, 'Utilisateur', 0, NULL, NULL, NULL),
	(4, 'des', 'desto', 'royaloaksresidence@gmail.com', NULL, '$2y$10$Cpjc5s8vpQaIO6bMEH3/Q.vcyWfM2WBbduxhBhHzag21EysU0bNde', 1, '2', 0, NULL, '2022-08-25 08:50:24', '2022-08-25 08:50:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
