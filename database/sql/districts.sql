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
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int UNSIGNED NOT NULL,
  `city_code` int UNSIGNED NOT NULL,
  `province_code` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `code`, `city_code`, `province_code`, `created_at`, `updated_at`) VALUES
(1, 'Palu Timur', 1, 71, 72, '2023-05-03 15:22:03', '2023-05-03 15:22:03'),
(2, 'Palu Barat', 2, 71, 72, '2023-05-03 15:22:03', '2023-05-03 15:22:03'),
(3, 'Palu Selatan', 3, 71, 72, '2023-05-03 15:22:03', '2023-05-03 15:22:03'),
(4, 'Palu Utara', 4, 71, 72, '2023-05-03 15:22:03', '2023-05-03 15:22:03'),
(5, 'Ulujadi', 5, 71, 72, '2023-05-03 15:22:03', '2023-05-03 15:22:03'),
(6, 'Tatanga', 6, 71, 72, '2023-05-03 15:22:03', '2023-05-03 15:22:03'),
(7, 'Tawaeli', 7, 71, 72, '2023-05-03 15:22:03', '2023-05-03 15:22:03'),
(8, 'Mantikulore', 8, 71, 72, '2023-05-03 15:22:03', '2023-05-03 15:22:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_code_unique` (`code`),
  ADD KEY `districts_city_code_foreign` (`city_code`),
  ADD KEY `districts_province_code_foreign` (`province_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_city_code_foreign` FOREIGN KEY (`city_code`) REFERENCES `cities` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `districts_province_code_foreign` FOREIGN KEY (`province_code`) REFERENCES `provinces` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
