-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 20, 2024 at 07:27 AM
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
(1, 'Edukasyong Pantahan at Pangkabuhayan (EPP)', NULL, '2024-04-25 23:26:28', '2024-08-07 08:13:01'),
(2, 'English', NULL, '2024-08-05 00:40:49', '2024-08-05 00:40:49'),
(3, 'Filipino', NULL, '2024-08-05 00:40:54', '2024-08-05 00:40:54'),
(4, 'Mathematics', NULL, '2024-08-05 00:40:59', '2024-08-05 00:40:59'),
(5, 'Science', NULL, '2024-08-05 00:41:07', '2024-08-05 00:41:07'),
(6, 'Araling Panlipunan', NULL, '2024-08-05 00:41:22', '2024-08-05 00:48:19'),
(7, 'MSEP', NULL, '2024-08-05 00:41:30', '2024-08-05 00:41:30');

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

--
-- Dumping data for table `highschool_subjects`
--

INSERT INTO `highschool_subjects` (`id`, `subject`, `yearLevel`, `created_at`, `updated_at`) VALUES
(1, 'Filipino', NULL, '2024-08-04 23:50:05', '2024-08-04 23:50:05'),
(2, 'English', NULL, '2024-08-05 00:41:42', '2024-08-05 00:41:42'),
(4, 'Mathematics', NULL, '2024-08-05 00:42:01', '2024-08-05 00:42:01'),
(5, 'Science', NULL, '2024-08-05 00:42:05', '2024-08-05 00:42:05'),
(6, 'Araling Panlipunan', NULL, '2024-08-05 00:42:09', '2024-08-05 00:42:09'),
(7, 'MAPEH', NULL, '2024-08-05 00:47:40', '2024-08-05 00:47:40'),
(8, 'Edukasyon sa Pagpapakatao (EsP)', NULL, '2024-08-05 00:47:52', '2024-08-05 00:47:52');

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
(1, 'App\\Models\\User', 1, 'NDskMg6uw2FpCpj4ewnqnovF7xgUq0OiYlCDec3j8x7dues0tu', '196f35f2ae85d92bd8dbc878c2b7412ec031c3ae4370e703a1be0b29fd338d75', '[\"*\"]', '2024-08-20 07:11:41', NULL, '2024-08-20 07:09:41', '2024-08-20 07:11:41'),
(2, 'App\\Models\\User', 1, 'd0cb4tfC9PrLKjfUxKxbtJDqOxaGZ9knnzLz84NrSfMWzVtPdT', '676f18d03bf3ab79beff79ffc6af27379a4dd710de005a384c7721c14af0f0ed', '[\"*\"]', '2024-08-20 07:26:52', NULL, '2024-08-20 07:15:22', '2024-08-20 07:26:52'),
(3, 'App\\Models\\User', 1, 'YCeOYt62elYUo2vr45z3Mf5CUuYpVNknLAf2TZoWXUGO0j3tbl', 'eafbe9708cb3acbe169b729fe48e0af2ec1f2cdffa567274c24347daca749127', '[\"*\"]', '2024-08-20 07:25:06', NULL, '2024-08-20 07:16:26', '2024-08-20 07:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `promeds`
--

CREATE TABLE `promeds` (
  `id` int NOT NULL,
  `elemSubjectID` int DEFAULT NULL,
  `hsSubjectID` int DEFAULT NULL,
  `shsSubjectID` int DEFAULT NULL,
  `tleID` int DEFAULT NULL,
  `strandID` int DEFAULT NULL,
  `grade` int DEFAULT NULL,
  `yearLevel` int DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `quarter` int DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `mps` decimal(11,2) DEFAULT NULL,
  `students` int DEFAULT NULL,
  `out1` int DEFAULT NULL,
  `out2` int DEFAULT NULL,
  `out3` int DEFAULT NULL,
  `very` int DEFAULT NULL,
  `sat` int DEFAULT NULL,
  `fair` int DEFAULT NULL,
  `didnot` int DEFAULT NULL,
  `atrisk` int DEFAULT NULL,
  `average` decimal(11,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

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
(12, 2024, 2025, '2024-08-06 07:31:03', '2024-08-06 07:31:03');

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

--
-- Dumping data for table `senior_high_school_subjects`
--

INSERT INTO `senior_high_school_subjects` (`id`, `subject`, `yearLevel`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'Oral Communication', '11', '1', '2024-08-05 00:43:23', '2024-08-05 00:43:23'),
(2, '21st Century Literature from the Philippines and the World', '11', '1', '2024-08-05 00:43:43', '2024-08-05 00:43:43'),
(3, 'Personal Development', '11', '1', '2024-08-05 00:44:00', '2024-08-05 00:44:00'),
(4, 'General Math', '11', '1', '2024-08-05 00:44:53', '2024-08-05 00:44:53'),
(5, 'Media and Information Literacy', '11', '2', '2024-08-05 00:45:04', '2024-08-05 00:45:04'),
(6, 'Practical research 1', '11', '2', '2024-08-05 00:49:54', '2024-08-05 00:49:54'),
(7, 'Practical research 2', '12', '1', '2024-08-05 00:50:08', '2024-08-05 00:50:08'),
(8, 'Inquiries, investigatories, and immersion', '12', '2', '2024-08-05 00:50:28', '2024-08-05 00:50:28');

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
(1, 'Cookery', '12', NULL, '2024-04-25 23:31:42', '2024-05-26 03:26:38'),
(2, 'Food and Beverage Services', '11', 1, '2024-04-25 23:32:09', '2024-05-25 11:31:25'),
(3, 'Bread and Pastry', '11', 2, '2024-04-25 23:32:19', '2024-05-02 19:39:39'),
(4, 'Horticulture', NULL, NULL, '2024-04-25 23:32:36', '2024-04-25 23:32:36'),
(5, 'Garments', NULL, NULL, '2024-04-25 23:33:27', '2024-05-26 00:54:30'),
(6, 'STEM', NULL, NULL, '2024-08-06 06:20:06', '2024-08-06 06:20:06');

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
(2, 'Home Economics', NULL, '2024-04-25 23:27:54', '2024-07-15 03:35:34'),
(3, 'Agri-Fishery Arts', NULL, '2024-04-25 23:28:13', '2024-05-10 10:21:37'),
(4, 'Industrial Arts', NULL, '2024-04-25 23:28:22', '2024-05-10 06:04:02'),
(5, 'ICT', NULL, '2024-04-25 23:28:30', '2024-06-13 23:18:06');

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
(1, NULL, NULL, NULL, NULL, 'Administrator', 'tums@admin.com', NULL, '$2y$12$UzUn0yh2wgZ6/Fv.KJfgYeCFMyYWKBxWP7HdY1PR9yqSJLJbLz2WC', 'hIG3iCLd84I7JxMkjzlJlHgMwoZnQ6F1BaYRYQXhh9BQ6AoptYEcorfkRzys', 1, NULL, '2024-08-20 07:06:50');

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
-- Indexes for table `promeds`
--
ALTER TABLE `promeds`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elementary_schools`
--
ALTER TABLE `elementary_schools`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elementary_subjects`
--
ALTER TABLE `elementary_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `elementary_subjects_data`
--
ALTER TABLE `elementary_subjects_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `highschool_subjects`
--
ALTER TABLE `highschool_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `highschool_subjects_data`
--
ALTER TABLE `highschool_subjects_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `high_schools`
--
ALTER TABLE `high_schools`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promeds`
--
ALTER TABLE `promeds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_documents`
--
ALTER TABLE `request_documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `senior_high_school_subjects`
--
ALTER TABLE `senior_high_school_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `senior_high_school_subjects_data`
--
ALTER TABLE `senior_high_school_subjects_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strand_subjects`
--
ALTER TABLE `strand_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tle_tve_subjects`
--
ALTER TABLE `tle_tve_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
