-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2024 at 03:48 PM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel11crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `present_days` int NOT NULL,
  `absent_days` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_name`, `present_days`, `absent_days`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 20, 5, NULL, NULL),
(2, 'Jane Smith', 18, 7, NULL, NULL),
(3, 'Alice Johnson', 22, 3, NULL, NULL),
(4, 'Bob Brown', 19, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `class_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`, `class_status`, `created_at`, `updated_at`) VALUES
(1, 'BS(SE)', 1, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(2, 'BS(CS)', 1, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(3, 'BS(IT)', 0, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(4, 'MS(CS)', 1, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(5, 'MS(IT)', 0, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(6, 'MS(SE)', 1, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(7, 'BS(SE)', 1, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(8, 'BS(CS)', 1, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(9, 'BS(IT)', 0, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(10, 'MS(CS)', 1, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(11, 'MS(IT)', 0, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(12, 'MS(SE)', 1, '2024-06-30 22:40:33', '2024-06-30 22:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

DROP TABLE IF EXISTS `degrees`;
CREATE TABLE IF NOT EXISTS `degrees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bachelor of Science', '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(2, 'Master of Arts', '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(3, 'PhD in Computer Science', '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(4, 'Bachelor of Science', '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(5, 'Master of Arts', '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(6, 'PhD in Computer Science', '2024-06-30 22:40:33', '2024-06-30 22:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_general_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(10, '2024_06_30_151852_create_attendances_table', 2),
(5, '2024_06_29_162933_create_task1students_table', 1),
(6, '2024_06_29_163021_create_class_table', 1),
(7, '2024_06_29_182138_create_degrees_table', 1),
(8, '2024_06_29_182859_create_students_table', 1),
(9, '2024_06_29__075326_create_stdclasses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_general_ci,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MGIGHL7qLY9siEQ2bKOxALMgRa4DYEFH4rzMSAsP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidHh2NWFCNjVsSXQza0c2WVRTcDlvNHl4SGRaZW9VSElrNDhCa2RyTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdHRlbmRhbmNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1719762385);

-- --------------------------------------------------------

--
-- Table structure for table `stdclasses`
--

DROP TABLE IF EXISTS `stdclasses`;
CREATE TABLE IF NOT EXISTS `stdclasses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `class_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `class_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stdclasses`
--

INSERT INTO `stdclasses` (`id`, `class_name`, `class_status`, `created_at`, `updated_at`) VALUES
(1, 'BS(SE)', 1, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(2, 'BS(CS)', 1, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(3, 'BS(IT)', 0, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(4, 'MS(CS)', 1, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(5, 'MS(IT)', 0, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(6, 'MS(SE)', 1, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(7, 'BS(SE)', 1, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(8, 'BS(CS)', 1, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(9, 'BS(IT)', 0, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(10, 'MS(CS)', 1, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(11, 'MS(IT)', 0, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(12, 'MS(SE)', 1, '2024-06-30 22:40:33', '2024-06-30 22:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `cnic` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `father_cnic` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  `stdclass_id` bigint UNSIGNED DEFAULT NULL,
  `degree_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_stdclass_id_foreign` (`stdclass_id`),
  KEY `students_degree_id_foreign` (`degree_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `father_name`, `dob`, `cnic`, `phone`, `father_cnic`, `address`, `status`, `stdclass_id`, `degree_id`, `created_at`, `updated_at`) VALUES
(1, 'Kenyon Conner', 'Illana Carter', '1979-11-17', 'Excepteur maxime ull', '+1 (284) 182-3951', 'Vitae reprehenderit', 'Inventore est consec', 'active', 6, 2, '2024-06-30 15:32:08', '2024-06-30 15:32:08'),
(3, 'Ralph Caldwell', 'Serena Shaw', '1973-11-19', 'Cumque hic dolor omn', '+1 (188) 132-9443', 'Ut ea dolor ad harum', 'Molestiae in dolores', 'active', 5, 1, '2024-06-30 17:22:40', '2024-06-30 17:22:40'),
(4, 'ddddddddddd', 'ssssssssssss', '2024-06-15', '3e23e32e344', '3489454094530495834', '32888393r943', 'Sunt vo4444444444444444444', 'inactive', 4, 3, '2024-06-30 17:31:10', '2024-06-30 17:36:02'),
(5, 'Amelia Hebert', 'Reuben Frank', '2024-06-11', 'Ab vel enim quis tem', '32234233474', 'Suscipit ipsum eum', 'Est aperiam aliquid', 'active', 2, 3, '2024-06-30 17:48:31', '2024-06-30 17:48:31'),
(6, 'Mohid Khan', 'Iftikhar', '2008-06-10', '2323', '03309196774', '2342343434233342', 'KOhat', 'active', 1, 1, '2024-06-30 18:09:23', '2024-06-30 18:09:23'),
(7, 'Ariana Vincent', 'Levi Espinoza', '2020-06-04', '2222222222222', '22222222222', '22222222222222222', 'Aut ex quia incidunt', 'inactive', 1, 2, '2024-06-30 18:17:45', '2024-06-30 18:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `task1students`
--

DROP TABLE IF EXISTS `task1students`;
CREATE TABLE IF NOT EXISTS `task1students` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `std_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `std_age` int NOT NULL,
  `std_status` enum('1','0') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registered_on` date NOT NULL,
  `added_on` date NOT NULL,
  `std_class` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task1students_std_class_foreign` (`std_class`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task1students`
--

INSERT INTO `task1students` (`id`, `std_name`, `std_age`, `std_status`, `registered_on`, `added_on`, `std_class`, `created_at`, `updated_at`) VALUES
(1, 'tc9qsbVLvD', 18, '1', '2024-06-30', '2024-06-30', 1, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(2, 'nOXbWpb6DB', 24, '1', '2024-06-30', '2024-06-30', 1, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(3, 'GJmdxSgQs0', 20, '0', '2024-06-30', '2024-06-30', 2, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(4, 'mxyD3SgiOq', 25, '0', '2024-06-30', '2024-06-30', 2, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(5, 'Y8VGwuExy5', 24, '0', '2024-06-30', '2024-06-30', 2, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(6, '4ZdHFCSFv5', 24, '', '2024-06-30', '2024-06-30', 2, '2024-06-30 15:25:43', '2024-06-30 15:25:43'),
(7, 'u0jB3Ek1zF', 22, '1', '2024-06-30', '2024-06-30', 1, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(8, 'KJMfJwBO4O', 21, '1', '2024-06-30', '2024-06-30', 1, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(9, 'bussDR5E4m', 21, '0', '2024-06-30', '2024-06-30', 2, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(10, 'VGd9MwkLeb', 21, '0', '2024-06-30', '2024-06-30', 2, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(11, 'Veib1SfsAg', 23, '0', '2024-06-30', '2024-06-30', 2, '2024-06-30 22:40:33', '2024-06-30 22:40:33'),
(12, 'b1ffb9U4yf', 21, '', '2024-06-30', '2024-06-30', 2, '2024-06-30 22:40:33', '2024-06-30 22:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
