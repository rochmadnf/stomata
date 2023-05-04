-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2023 at 11:44 PM
-- Server version: 8.0.32
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stomata`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int UNSIGNED NOT NULL,
  `province_code` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `code`, `province_code`, `created_at`, `updated_at`) VALUES
(1, 'Kab. Banggai', 1, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(2, 'Kab. Poso', 2, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(3, 'Kab. Donggala', 3, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(4, 'Kab. Toli Toli', 4, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(5, 'Kab. Buol', 5, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(6, 'Kab. Morowali', 6, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(7, 'Kab. Banggai Kepulauan', 7, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(8, 'Kab. Parigi Moutong', 8, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(9, 'Kab. Tojo Una Una', 9, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(10, 'Kab. Sigi', 10, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(11, 'Kab. Banggai Laut', 11, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(12, 'Kab. Morowali Utara', 12, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54'),
(13, 'Kota Palu', 71, 72, '2023-05-03 15:11:54', '2023-05-03 15:11:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_code_unique` (`code`),
  ADD KEY `cities_province_code_foreign` (`province_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_code_foreign` FOREIGN KEY (`province_code`) REFERENCES `provinces` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
