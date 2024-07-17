-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2024 at 07:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tums_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int NOT NULL,
  `elemSchoolID` int DEFAULT NULL,
  `highSchoolID` int DEFAULT NULL,
  `requestID` int DEFAULT NULL,
  `teacherID` int DEFAULT NULL,
  `filename` longtext CHARACTER SET utf8mb4 ,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `elemSchoolID`, `highSchoolID`, `requestID`, `teacherID`, `filename`, `created_at`, `updated_at`) VALUES
(22, NULL, 1, 6, 3, 'activity-4-sso-1-2024-05-05-153224.docx', '2024-05-05 07:32:24', '2024-05-05 07:32:24'),
(23, 1, NULL, 6, 13, 'research-302-pinaka-final-na-jud-2024-05-05-174813.pdf', '2024-05-05 09:48:13', '2024-05-05 09:48:13'),
(24, NULL, 1, 6, 3, 'research302-cadayona-tablada-rosal-2024-05-05-180509.pdf', '2024-05-05 10:05:09', '2024-05-05 10:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `elementary_schools`
--

CREATE TABLE `elementary_schools` (
  `id` int NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `elementary_schools`
--

INSERT INTO `elementary_schools` (`id`, `school`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'San Vicente Elementary School', 124.94742190785223, 10.3324336713556, '2024-05-02 18:19:12', '2024-05-07 07:23:28'),
(2, 'Divisioria Elementary School', 124.96556960847725, 10.34156178828817, '2024-05-02 18:40:43', '2024-05-02 18:40:43'),
(5, 'Olisihan Elementary School', 125.00833685367466, 10.429504063368427, '2024-05-07 03:39:21', '2024-05-07 03:39:21'),
(6, 'Bontoc Central School', 124.96912472562585, 10.355566234883598, '2024-05-07 03:42:10', '2024-05-07 03:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `elementary_subjects`
--

CREATE TABLE `elementary_subjects` (
  `id` int NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `yearLevel` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `elementary_subjects`
--

INSERT INTO `elementary_subjects` (`id`, `subject`, `yearLevel`, `created_at`, `updated_at`) VALUES
(1, 'Edukasyong Pantahan at Pangkabuhayan (EPP)', NULL, '2024-04-25 23:26:28', '2024-05-07 07:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `elementary_subjects_data`
--

CREATE TABLE `elementary_subjects_data` (
  `id` int NOT NULL,
  `schoolID` int DEFAULT NULL,
  `yearLevel` int DEFAULT NULL,
  `subjectID` int DEFAULT NULL,
  `first` decimal(11,2) DEFAULT NULL,
  `second` decimal(11,2) DEFAULT NULL,
  `third` decimal(11,2) DEFAULT NULL,
  `fourth` decimal(11,2) DEFAULT NULL,
  `mps` decimal(11,2) DEFAULT NULL,
  `students` int DEFAULT '0',
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `elementary_subjects_data`
--

INSERT INTO `elementary_subjects_data` (`id`, `schoolID`, `yearLevel`, `subjectID`, `first`, `second`, `third`, `fourth`, `mps`, `students`, `year`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 18:19:12', '2024-05-02 18:19:12'),
(2, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 18:19:12', '2024-05-02 18:19:12'),
(3, 1, 6, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 18:19:12', '2024-05-02 18:19:12'),
(4, 2, 4, 1, NULL, NULL, NULL, NULL, NULL, 78, '2024-2025', '2024-05-02 18:40:43', '2024-05-02 19:27:33'),
(5, 2, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 18:40:43', '2024-05-02 18:40:43'),
(6, 2, 6, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 18:40:43', '2024-05-02 19:27:30'),
(13, 5, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:39:22', '2024-05-07 03:39:22'),
(14, 5, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:39:22', '2024-05-07 03:39:22'),
(15, 5, 6, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:39:22', '2024-05-07 03:39:22'),
(16, 6, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:42:10', '2024-05-07 03:49:35'),
(17, 6, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:42:10', '2024-05-07 03:42:10'),
(18, 6, 6, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:42:10', '2024-05-07 03:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `highschool_subjects`
--

CREATE TABLE `highschool_subjects` (
  `id` int NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `yearLevel` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `highschool_subjects_data`
--

CREATE TABLE `highschool_subjects_data` (
  `id` int NOT NULL,
  `schoolID` int DEFAULT NULL,
  `yearLevel` int DEFAULT NULL,
  `subjectID` int DEFAULT NULL,
  `tve_tle` tinyint(1) DEFAULT NULL,
  `first` decimal(11,2) DEFAULT NULL,
  `second` decimal(11,2) DEFAULT NULL,
  `third` decimal(11,2) DEFAULT NULL,
  `fourth` decimal(11,2) DEFAULT NULL,
  `mps` decimal(11,2) DEFAULT NULL,
  `students` int DEFAULT '0',
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `highschool_subjects_data`
--

INSERT INTO `highschool_subjects_data` (`id`, `schoolID`, `yearLevel`, `subjectID`, `tve_tle`, `first`, `second`, `third`, `fourth`, `mps`, `students`, `year`, `created_at`, `updated_at`) VALUES
(17, 1, 7, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 19:31:58'),
(18, 1, 7, 3, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 19:31:58'),
(19, 1, 7, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 19:31:58'),
(20, 1, 7, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 19:31:58'),
(21, 1, 8, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(22, 1, 8, 3, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(23, 1, 8, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(24, 1, 8, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(25, 1, 9, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-07 03:31:04'),
(26, 1, 9, 3, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(27, 1, 9, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(28, 1, 9, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 19:30:51'),
(29, 1, 10, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(30, 1, 10, 3, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(31, 1, 10, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(32, 1, 10, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(33, 2, 7, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(34, 2, 7, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(35, 2, 7, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(36, 2, 8, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(37, 2, 8, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(38, 2, 8, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(39, 2, 9, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(40, 2, 9, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(41, 2, 9, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(42, 2, 10, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(43, 2, 10, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(44, 2, 10, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `high_schools`
--

CREATE TABLE `high_schools` (
  `id` int NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `high_schools`
--

INSERT INTO `high_schools` (`id`, `school`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Bontoc National High School', 124.96696799875, 10.356546743927, '2024-05-02 16:05:18', '2024-05-07 07:27:44'),
(2, 'Sogod National High School', 124.97890152414202, 10.388064710314504, '2024-05-07 03:34:54', '2024-05-07 03:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'uSPrZnhvgQHZ6GMDtYgoLZN918Ph7k2D7ytDs3A5FmN8uo5pxW', '034bd5cd2673e6642b2b354db25b1434c18b7a3721d0e8c049aed37ae3f0a114', '[\"*\"]', '2024-05-07 07:49:11', NULL, '2024-05-07 07:46:47', '2024-05-07 07:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `request_documents`
--

CREATE TABLE `request_documents` (
  `id` int NOT NULL,
  `position` int DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `request_documents`
--

INSERT INTO `request_documents` (`id`, `position`, `description`, `created_at`, `updated_at`) VALUES
(6, 1, 'Request for Sample Documents', '2024-05-05 07:32:06', '2024-05-07 01:12:42'),
(7, 1, 'Grade Reports', '2024-05-05 07:34:13', '2024-05-05 07:34:13'),
(8, 2, 'School Sample for Overall Performance Rating', '2024-05-05 07:36:57', '2024-05-05 07:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int NOT NULL,
  `fromYear` int DEFAULT NULL,
  `toYear` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `fromYear`, `toYear`, `created_at`, `updated_at`) VALUES
(1, 2023, 2024, '2024-04-25 23:38:43', '2024-04-25 23:38:43'),
(8, 2024, 2025, '2024-04-27 02:08:30', '2024-04-27 02:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `senior_high_school_subjects`
--

CREATE TABLE `senior_high_school_subjects` (
  `id` int NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `yearLevel` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `senior_high_school_subjects_data`
--

CREATE TABLE `senior_high_school_subjects_data` (
  `id` int NOT NULL,
  `schoolID` int DEFAULT NULL,
  `yearLevel` int DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `subjectID` int DEFAULT NULL,
  `strand` tinyint(1) DEFAULT NULL,
  `first` decimal(11,2) DEFAULT NULL,
  `second` decimal(11,2) DEFAULT NULL,
  `third` decimal(11,2) DEFAULT NULL,
  `fourth` decimal(11,2) DEFAULT NULL,
  `mps` decimal(11,2) DEFAULT NULL,
  `students` int DEFAULT '0',
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `senior_high_school_subjects_data`
--

INSERT INTO `senior_high_school_subjects_data` (`id`, `schoolID`, `yearLevel`, `semester`, `subjectID`, `strand`, `first`, `second`, `third`, `fourth`, `mps`, `students`, `year`, `created_at`, `updated_at`) VALUES
(11, 1, 11, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 19:20:32'),
(12, 1, 11, NULL, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 19:20:32'),
(13, 1, 11, NULL, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 19:20:32'),
(14, 1, 11, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 19:20:32'),
(15, 1, 11, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 19:30:55'),
(16, 1, 12, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 19:31:19'),
(17, 1, 12, NULL, 4, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(18, 1, 12, NULL, 5, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(19, 1, 12, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(20, 1, 12, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-02 16:05:25', '2024-05-02 16:05:25'),
(21, 2, 11, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(22, 2, 11, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(23, 2, 11, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(24, 2, 12, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(25, 2, 12, NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(26, 2, 12, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-2025', '2024-05-07 03:34:54', '2024-05-07 03:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `strand_subjects`
--

CREATE TABLE `strand_subjects` (
  `id` int NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `yearLevel` varchar(255) DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `strand_subjects`
--

INSERT INTO `strand_subjects` (`id`, `subject`, `yearLevel`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'Cookery', '12', NULL, '2024-04-25 23:31:42', '2024-05-02 16:02:45'),
(2, 'Food and Beverage Services', '11', 1, '2024-04-25 23:32:09', '2024-05-02 16:02:39'),
(3, 'Bread and Pastry', '11', 2, '2024-04-25 23:32:19', '2024-05-02 19:39:39'),
(4, 'Horticulture', NULL, NULL, '2024-04-25 23:32:36', '2024-04-25 23:32:36'),
(5, 'Garments', NULL, NULL, '2024-04-25 23:33:27', '2024-05-02 01:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `schoolType` int DEFAULT NULL,
  `elemSchoolID` int DEFAULT NULL,
  `highSchoolID` int DEFAULT NULL,
  `yearLevel` int DEFAULT NULL,
  `subjectID` int DEFAULT NULL,
  `teacher` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `position` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `schoolType`, `elemSchoolID`, `highSchoolID`, `yearLevel`, `subjectID`, `teacher`, `picture`, `position`, `created_at`, `updated_at`) VALUES
(3, 2, NULL, 1, NULL, NULL, 'Jemuel Cadayona', 'gkbugoqrgqvabfkshomwjz4zxuayosqxtivkgpzapgyt6ivr0h-2024-05-07-105353.png', 1, '2024-05-02 18:18:10', '2024-05-07 07:43:22'),
(6, 1, 1, NULL, NULL, NULL, 'Evelyn Cadayona', 'h4mv1qjixrib2gp1qwxwheg6ojn6c9cdzbvez8s16vy2208cw2-2024-05-07-105325.png', 1, '2024-05-02 18:37:07', '2024-05-07 02:53:25'),
(13, 1, 1, NULL, NULL, NULL, 'Jaysan Ompod', 'b3upyld9mpcca5cnblen8m0r4mxf0njwahvghoonaocum46uej-2024-05-07-105300.png', 1, '2024-05-02 22:14:05', '2024-05-07 02:53:00'),
(14, 2, NULL, 1, NULL, NULL, 'Jessie Cadayona', 'aulp3ki3nauxtqskmxwg0d07bczjpszacr2qzpmm4crkiuald1-2024-05-07-105943.png', 2, '2024-05-03 10:35:59', '2024-05-07 02:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `tle_tve_subjects`
--

CREATE TABLE `tle_tve_subjects` (
  `id` int NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `yearLevel` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tle_tve_subjects`
--

INSERT INTO `tle_tve_subjects` (`id`, `subject`, `yearLevel`, `created_at`, `updated_at`) VALUES
(2, 'Home Economics', NULL, '2024-04-25 23:27:54', '2024-04-25 23:27:54'),
(3, 'Agri-Fishery Arts', NULL, '2024-04-25 23:28:13', '2024-04-25 23:28:13'),
(4, 'Industrial Arts', NULL, '2024-04-25 23:28:22', '2024-05-03 12:20:13'),
(5, 'Information and Communication Technology', NULL, '2024-04-25 23:28:30', '2024-05-07 01:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `teacherID` int DEFAULT NULL,
  `elemschoolID` int DEFAULT NULL,
  `highSchoolID` int DEFAULT NULL,
  `schoolType` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `teacherID`, `elemschoolID`, `highSchoolID`, `schoolType`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'Administrator', 'tums@admin.com', NULL, '$2y$12$.ARKFHKwIyQo8hfYNDttdu/4Mq7KhW8vuZTwRCl8s5YwayoezBxfq', NULL, 1, NULL, '2024-05-07 07:12:04'),
(43, NULL, NULL, 1, 2, NULL, 'bnhs@gmail.com', NULL, '$2y$12$C2I/ehY2soO0Wlpy1rcbJ.fCMfT7WrYxNkYhQWj5rgxjMFdZbKNfG', NULL, 2, '2024-05-02 16:05:18', '2024-05-07 07:27:44'),
(44, 3, NULL, NULL, 2, NULL, '1910961-1', NULL, '$2y$12$cbqd7QujxLS/Pd/YrtJFjODzC0thScIbkxg6pFaG.9dWTtzaJRpnS', NULL, 3, '2024-05-02 18:18:10', '2024-05-07 07:43:22'),
(45, NULL, 1, NULL, 1, NULL, 'sves@gmail.com', NULL, '$2y$12$biG9jSf.lyxXuOIfL42BP.BbiycDertXxygOjU2sLhej8PFmBiVnG', NULL, 2, '2024-05-02 18:19:12', '2024-05-07 07:23:28'),
(48, 6, NULL, NULL, 1, NULL, '1910961-2', NULL, '$2y$12$Ggq780/QcN2BprhoIfxp7ek8OXOyNe2o0ZlPz9EOH8KQzocxCpKPO', NULL, 3, '2024-05-02 18:37:07', '2024-05-07 02:53:25'),
(49, NULL, 2, NULL, 1, NULL, 'des@gmail.com', NULL, '$2y$12$ATjDkdKnNNaYAgQgeA3qLutuz2WZF77A.HVvsTsBuTT8HDLGMLD5O', NULL, 2, '2024-05-02 18:40:43', '2024-05-02 18:40:43'),
(56, 13, NULL, NULL, 1, NULL, '1910961-3', NULL, '$2y$12$ketT5fzYxYQ1GGrrRjUo0uJcgPbq7Hu6T0rMopB.TYSmkOnTRJyt.', NULL, 3, '2024-05-02 22:14:06', '2024-05-07 02:53:00'),
(57, 14, NULL, NULL, 2, NULL, '1910961-4', NULL, '$2y$12$X/vlILFUU80PjFT2foLjKe24IvLCXDrjBN8OeDNrPlyPZNgHrn2qi', NULL, 3, '2024-05-03 10:35:59', '2024-05-07 02:59:44'),
(65, NULL, NULL, 2, 2, NULL, 'snhs@gmail.com', NULL, '$2y$12$lkofQ1rVQ30W9pkzmpvrne6pKcvAbLSK6zdNngcwCO0qmu.z66bxq', NULL, 2, '2024-05-07 03:34:54', '2024-05-07 03:34:54'),
(66, NULL, 5, NULL, 1, NULL, 'olisihan@gmail.com', NULL, '$2y$12$l33lWvecK3uwNgNJRloce.XjXXbmCJDpNQsy1fpI.AsoUkUG03FZW', NULL, 2, '2024-05-07 03:39:22', '2024-05-07 03:39:22'),
(67, NULL, 6, NULL, 1, NULL, 'bcs@gmail.com', NULL, '$2y$12$PJTP8bUlLYjfAX4h7ovsdOhVMwwY6JnjO0i.tv1UWwzbY.dIQbwHu', NULL, 2, '2024-05-07 03:42:10', '2024-05-07 03:42:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elementary_schools`
--
ALTER TABLE `elementary_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elementary_subjects`
--
ALTER TABLE `elementary_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elementary_subjects_data`
--
ALTER TABLE `elementary_subjects_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `highschool_subjects`
--
ALTER TABLE `highschool_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highschool_subjects_data`
--
ALTER TABLE `highschool_subjects_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `high_schools`
--
ALTER TABLE `high_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `request_documents`
--
ALTER TABLE `request_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senior_high_school_subjects`
--
ALTER TABLE `senior_high_school_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senior_high_school_subjects_data`
--
ALTER TABLE `senior_high_school_subjects_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strand_subjects`
--
ALTER TABLE `strand_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tle_tve_subjects`
--
ALTER TABLE `tle_tve_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `elementary_schools`
--
ALTER TABLE `elementary_schools`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `elementary_subjects`
--
ALTER TABLE `elementary_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `elementary_subjects_data`
--
ALTER TABLE `elementary_subjects_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `highschool_subjects`
--
ALTER TABLE `highschool_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `highschool_subjects_data`
--
ALTER TABLE `highschool_subjects_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `high_schools`
--
ALTER TABLE `high_schools`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_documents`
--
ALTER TABLE `request_documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `senior_high_school_subjects`
--
ALTER TABLE `senior_high_school_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `senior_high_school_subjects_data`
--
ALTER TABLE `senior_high_school_subjects_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `strand_subjects`
--
ALTER TABLE `strand_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tle_tve_subjects`
--
ALTER TABLE `tle_tve_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
