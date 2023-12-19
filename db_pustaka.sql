-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pustaka_db
CREATE DATABASE IF NOT EXISTS `pustaka_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pustaka_db`;

-- Dumping structure for table pustaka_db.books
DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pustaka_db.books: ~2 rows (approximately)
INSERT INTO `books` (`id`, `kode_buku`, `judul`, `cover`, `status`, `created_at`, `updated_at`, `slug`, `deleted_at`) VALUES
	(67, 'brthbtzxzc', 'Tukar Lagi 2 kali fix', 'Tukar Lagi 2 kali fix-1702802855.jpg', 'tersedia', '2023-12-16 21:23:51', '2023-12-17 01:47:35', 'tukar-lagi-2-kali-fix', NULL);

-- Dumping structure for table pustaka_db.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pustaka_db.categories: ~10 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(13, 'Humor Sufi', 'humor-sufi', '2023-11-27 23:37:07', '2023-12-07 07:10:02', NULL),
	(14, 'Politik Islam', 'politik-islam', '2023-11-28 00:56:55', '2023-12-07 07:11:06', NULL),
	(15, 'Filsafat dan Psikologi', 'filsafat-dan-psikologi', '2023-11-28 00:58:18', '2023-11-28 19:40:43', NULL),
	(19, 'Agama', 'agama', '2023-11-28 01:07:46', '2023-11-28 01:07:46', NULL),
	(21, 'Kamus', 'kamus', '2023-11-28 23:54:33', '2023-11-30 20:32:29', NULL),
	(22, 'Ensiklopedia', 'ensiklopedia', '2023-11-28 23:54:45', '2023-11-28 23:54:45', NULL),
	(23, 'Komputer', 'komputer', '2023-11-29 07:42:35', '2023-11-29 07:42:35', NULL),
	(24, 'Hukum', 'hukum', '2023-11-29 20:38:55', '2023-12-07 06:54:33', NULL),
	(25, 'Filosofi', 'filosofi', '2023-12-05 00:25:19', '2023-12-07 07:11:48', NULL),
	(27, 'Wild Animal', 'wild-animal', '2023-12-08 01:13:53', '2023-12-14 08:02:25', NULL);

-- Dumping structure for table pustaka_db.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pustaka_db.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pustaka_db.history_logs
DROP TABLE IF EXISTS `history_logs`;
CREATE TABLE IF NOT EXISTS `history_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `book_id` bigint unsigned NOT NULL,
  `rent_date` date NOT NULL,
  `return_date` date NOT NULL,
  `fix_return_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `history_logs_book_id_foreign` (`book_id`),
  KEY `history_logs_user_id_foreign` (`user_id`),
  CONSTRAINT `history_logs_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `history_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pustaka_db.history_logs: ~0 rows (approximately)

-- Dumping structure for table pustaka_db.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pustaka_db.migrations: ~17 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_11_20_073333_create_roles_table', 1),
	(6, '2023_11_20_074851_add_role_id_to_users_table', 1),
	(26, '2023_11_20_080234_create_categories_table', 2),
	(27, '2023_11_20_080318_create_books_table', 2),
	(28, '2023_11_20_081022_create_pivot_book_categories_table', 2),
	(29, '2023_11_20_081612_create_history_logs_table', 2),
	(31, '2023_11_27_063242_add_slugs_column_to_categories_table', 3),
	(33, '2023_11_28_042805_add_deleted_at_to_categories_table', 4),
	(34, '2023_11_29_030700_add_slug_and_cover_to_books_table', 5),
	(35, '2023_11_29_024453_add_slug_cover_to_books_table', 6),
	(36, '2023_11_30_075857_add_deleted_at_to_books_table', 6),
	(39, '2023_12_01_074248_add_slug_column_to_users_table', 7),
	(40, '2023_12_01_150102_add_deleted_at_to_users_table', 8);

-- Dumping structure for table pustaka_db.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pustaka_db.password_resets: ~0 rows (approximately)

-- Dumping structure for table pustaka_db.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pustaka_db.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table pustaka_db.pivot_book_categories
DROP TABLE IF EXISTS `pivot_book_categories`;
CREATE TABLE IF NOT EXISTS `pivot_book_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pivot_book_categories_category_id_foreign` (`category_id`),
  KEY `pivot_book_categories_book_id_foreign` (`book_id`),
  CONSTRAINT `pivot_book_categories_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pivot_book_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pustaka_db.pivot_book_categories: ~1 rows (approximately)
INSERT INTO `pivot_book_categories` (`id`, `book_id`, `category_id`, `created_at`, `updated_at`) VALUES
	(71, 67, 13, NULL, NULL);

-- Dumping structure for table pustaka_db.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pustaka_db.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', NULL, NULL),
	(2, 'pengunjung', NULL, NULL);

-- Dumping structure for table pustaka_db.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(65) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(29) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-aktif',
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pustaka_db.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `name`, `slug`, `password`, `telephone`, `alamat`, `status`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', 'admin', '$2y$10$9V9HA.1OozkrY11eKH8n4.usBFW3DJhKls0paGjLoCsaTdUzF0Xma', '0215589', 'Jalan Bahagia', 'aktif', 1, NULL, NULL, NULL),
	(2, 'ali', 'ali', '$2y$10$0Dr0F2Px5ZIiXASBelbYguiKzlqyXebzlQO4F0Ov7MujJSOGYWqDG', '0112564', 'Jl.SM Raja', 'aktif', 2, NULL, '2023-12-01 19:37:58', NULL),
	(5, 'Mesut Ozil', 'mesut-ozil', '$2y$10$sVnQ4EAvEpE6XKNHFUZSmOZHAIZZdrJ3IFDnZ671295uUuNZJ4Hba', '02154879', 'Germany', 'non-aktif', 2, '2023-12-01 00:22:54', '2023-12-07 01:45:57', NULL),
	(6, 'Jono Wijaya', 'jono-wijaya', '$2y$10$Bg9TyXMIl2ZVuYe0b3mpIeMZtu0Wps79J8/YUzJrDPpWNSUgaE/xK', '01245878', 'Indonesia', 'non-aktif', 2, '2023-12-01 00:57:24', '2023-12-01 00:57:24', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
