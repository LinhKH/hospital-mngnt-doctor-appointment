-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 04:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctorappointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appointment_number` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `consulation_fees` varchar(255) DEFAULT NULL,
  `consulation_fees_status` varchar(255) DEFAULT NULL COMMENT 'pending, completed',
  `user_comment` varchar(255) DEFAULT NULL,
  `doctor_comment` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'booked' COMMENT 'Booked, Completed, Cancel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `doctor_id`, `appointment_number`, `appointment_date`, `appointment_time`, `name`, `email`, `phone`, `consulation_fees`, `consulation_fees_status`, `user_comment`, `doctor_comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'asd5662', '2023-09-29', '11:00', 'ved ', 'ved@gmail.com', '9879879878', '850', 'pending', 'need to check up', 'test', 'booked', '2023-04-25 09:55:05', '2023-04-25 09:55:05'),
(2, 6, 1, 'asd5662', '2023-09-29', '10:00', 'om', 'ved@gmail.com', '9879879878', '850', 'pending', 'need to check up', 'test', 'booked', '2023-04-25 09:55:05', '2023-04-25 09:55:05'),
(3, 1, 1, '521467', '2023-09-29', '16:00', 'Om Prakash N', 'admin@gmail.com', '8880202617', '850', 'pending', NULL, NULL, 'booked', '2023-09-29 01:58:03', '2023-09-29 01:58:03'),
(4, 3, 1, '979470', '2023-10-02', '10:30', 'Dr Om Prakash N', 'om@gmail.com', '8880202617', '850', 'completed', NULL, 'sad asd', 'completed', '2023-10-01 17:25:34', '2023-10-01 18:25:20'),
(5, 3, 1, '740266', '2023-10-02', '11:00', 'kush', 'kush@gmail.com', '8889998889', '850', 'pending', NULL, NULL, 'cancel', '2023-10-01 17:36:13', '2023-10-01 17:36:13'),
(6, 1, 1, '658877', '2023-10-14', '10:00', 'User 4', 'user4@gmail.com', '6549879876', '850', 'pending', NULL, NULL, 'booked', '2023-10-14 12:38:58', '2023-10-14 12:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `slug`, `description`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Neurology', 'neurology', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\n\r\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p><p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '', 1, '2023-02-11 09:09:31', '2023-10-26 02:30:22'),
(2, 'Orthopedic', 'orthopedic', NULL, 'uploads/departments/1676126536.jpg', 1, '2023-02-11 09:12:16', '2023-10-25 04:33:44'),
(3, 'Dental', 'dental', NULL, 'uploads/departments/1676126864.jpg', 1, '2023-02-11 09:12:35', '2023-02-11 09:17:44'),
(5, 'ENT', 'ent', NULL, '', 1, '2023-02-11 09:20:28', '2023-02-11 09:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `specialization` varchar(1000) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `consulation_fees` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `department_id`, `name`, `slug`, `gender`, `phone`, `designation`, `qualification`, `experience`, `specialization`, `bio`, `consulation_fees`, `address`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Dr Om Prakash N', 'dr-om-prakash-n3', 'Male', '8888899999', 'Neurology physician and surgen', 'MBBS, MBSC', '5+ years in surgon', 'asd asd asd', 'I am ved, neuro surgen doctor 5+ years in surgen', '850', 'asd asd sad asd', 'uploads/doctors/1676197397.jpg', 1, '2023-02-11 11:18:42', '2023-02-12 08:36:59'),
(2, 4, 1, 'Dr Ved Prakash', 'dr-ved-prakash-n4', 'Male', '9786459878', 'Orthopedic', 'MBBS, HADDI', '5+ years, in orthopedic', 'Orthopedic, Neuro', 'I am dr ved prakash, Orthopedic, Neuro', '850', '#422, 1st cross, 5th main, bangalore', '', 1, '2023-02-12 04:57:25', '2023-02-13 00:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_timings`
--

CREATE TABLE `doctor_timings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) NOT NULL,
  `shift` varchar(50) NOT NULL COMMENT 'shift_1 & shift_2',
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `avg_consultation_time` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_timings`
--

INSERT INTO `doctor_timings` (`id`, `doctor_id`, `day`, `shift`, `start_time`, `end_time`, `avg_consultation_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'monday', 'shift_1', '10:00:00', '13:00:00', '30', '2023-02-18 03:11:43', '2023-10-01 17:33:19'),
(2, 1, 'monday', 'shift_2', '15:00:00', '18:00:00', '25', '2023-02-18 03:20:18', '2023-02-18 03:51:12'),
(3, 1, 'tuesday', 'shift_1', '10:00:00', '13:00:00', '20', '2023-03-30 11:08:45', '2023-03-30 11:08:45'),
(4, 1, 'tuesday', 'shift_2', '16:00:00', '21:00:00', '20', '2023-03-30 11:09:26', '2023-03-30 11:09:26'),
(5, 1, 'wednesday', 'shift_1', '09:00:00', '13:00:00', '20', '2023-04-25 10:43:08', '2023-04-25 10:43:08'),
(6, 1, 'wednesday', 'shift_2', '16:00:00', '22:00:00', '20', '2023-04-25 10:43:37', '2023-04-25 10:43:37'),
(7, 1, 'thursday', 'shift_1', '09:00:00', '13:00:00', '20', '2023-04-25 10:44:18', '2023-04-25 10:44:18'),
(8, 1, 'thursday', 'shift_2', '16:00:00', '22:00:00', '20', '2023-04-25 10:44:41', '2023-04-25 10:44:41'),
(9, 1, 'friday', 'shift_1', '10:00:00', '13:00:00', '20', '2023-04-25 10:45:18', '2023-04-25 10:45:18'),
(10, 1, 'friday', 'shift_2', '15:00:00', '19:00:00', '20', '2023-04-25 10:45:53', '2023-04-25 10:45:53'),
(11, 1, 'saturday', 'shift_1', '09:00:00', '13:00:00', '20', '2023-04-25 10:46:49', '2023-04-25 10:46:49'),
(13, 2, 'monday', 'shift_1', '10:00:00', '13:00:00', '20', '2023-09-29 04:41:15', '2023-09-29 04:41:15'),
(14, 2, 'monday', 'shift_2', '13:00:00', '19:00:00', '20', '2023-09-29 04:42:06', '2023-09-29 04:42:06'),
(15, 2, 'thursday', 'shift_1', '10:00:00', '14:00:00', '20', '2023-09-29 04:42:40', '2023-09-29 04:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_08_154451_add_details_to_users_table', 2),
(6, '2023_02_09_150953_create_departments_table', 3),
(7, '2023_02_11_145235_create_doctors_table', 4),
(9, '2023_02_14_163251_create_doctor_timings_table', 5),
(10, '2023_03_30_162137_create_appointments_table', 6),
(11, '2023_08_07_080905_create_settings_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `website_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `copyright` varchar(500) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(191) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_link`, `image`, `favicon`, `copyright`, `email1`, `email2`, `fax`, `phone1`, `phone2`, `whatsapp`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Doctor App', 'www.fundaofwebit.com', 'uploads/1697112496.png', NULL, '@Copyrights Funda of web it. All rights reserved. 2023', 'fundaofwebit@gmail.com', 'contact@fundaofwebit.com', '65464565', '987987987', '9887987987', '987987978', 'Bangalore, Karnataka, India', '2023-10-12 12:02:22', '2023-10-12 12:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `is_ban` tinyint(1) NOT NULL DEFAULT 0,
  `role_as` varchar(255) NOT NULL DEFAULT 'user' COMMENT 'Admin, Doctor, User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `age`, `dob`, `gender`, `phone`, `is_ban`, `role_as`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$30tJ3ywJg/S4E7GK7FQGiOAW6xnT1jWUE7.0OrrKfepm1R0IzpB0S', NULL, '2023-02-08 10:10:59', '2023-10-01 18:34:44', 40, NULL, 'Male', NULL, 0, 'admin'),
(2, 'Ved Prakash', 'ved@gmail.com', NULL, '$2y$10$rPSqgMxbzlmKBCE63xgDieCck2StHSXjOmfk9jb3AlYZM6/L2oXI.', NULL, '2023-02-11 11:16:23', '2023-10-04 17:53:58', NULL, '15 Dec 1994', 'Male', '9786549875', 0, 'user'),
(3, 'Dr Om Prakash N', 'om@gmail.com', NULL, '$2y$10$d83d/obO8LBRUrBP5Zx9wek3.m7yzdnGIe/EYuQ3y4nll2Gbx1xwi', NULL, '2023-02-11 11:18:42', '2023-10-01 17:56:51', 20, '27-05-2000', 'Male', '8888899999', 0, 'doctor'),
(4, 'Dr Ved Prakash', 'vedprakash@gmail.com', NULL, '$2y$10$pyUSxV4HBKlP9bt2.taTEeYmvdNNfdkRV.Wa/Qy.mbrLzb/F7W0Mq', NULL, '2023-02-12 04:57:25', '2023-04-25 06:59:57', 27, '15 Dec 1994', 'Male', '9786459878', 0, 'doctor'),
(6, 'ved prakash n', 'vedn@gmail.com', NULL, '$2y$10$jC.RBX/F3q7rYRFid32FbeNDUMxV9Ew3CpMYtXIDQ5RLbEC5N6UEm', NULL, '2023-02-18 10:44:19', '2023-10-04 18:29:52', 15, '15 Dec 1994', 'Male', NULL, 0, 'user'),
(7, 'Admin 2', 'admin2@gmaill.com', NULL, '$2y$10$WZ1S72q0Xr5uAQ9CIBxC0ejiaeaQh5ohMJRYSIzJgmkgKdXcoyUt6', NULL, '2023-10-12 11:40:40', '2023-10-12 11:44:22', NULL, NULL, 'Male', '99999888888', 0, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_timings`
--
ALTER TABLE `doctor_timings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_timings_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_timings`
--
ALTER TABLE `doctor_timings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_timings`
--
ALTER TABLE `doctor_timings`
  ADD CONSTRAINT `doctor_timings_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
