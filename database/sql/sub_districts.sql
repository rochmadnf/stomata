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
-- Table structure for table `sub_districts`
--

CREATE TABLE `sub_districts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int UNSIGNED NOT NULL,
  `district_code` int UNSIGNED NOT NULL,
  `city_code` int UNSIGNED NOT NULL,
  `province_code` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_districts`
--

INSERT INTO `sub_districts` (`id`, `name`, `code`, `district_code`, `city_code`, `province_code`, `created_at`, `updated_at`) VALUES
(1, 'Besusu Barat', 1004, 1, 71, 72, '2023-05-03 15:34:18', '2023-05-03 15:34:18'),
(2, 'Besusu Tengah', 1006, 1, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(3, 'Besusu Timur', 1007, 1, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(4, 'Lolu Selatan', 1009, 1, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(5, 'Lolu Utara', 1010, 1, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(6, 'Ujuna', 1002, 2, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(7, 'Balaroa', 1005, 2, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(8, 'Kamonji', 1007, 2, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(9, 'Baru', 1008, 2, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(10, 'Lere', 1009, 2, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(11, 'Siranindi', 1015, 2, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(12, 'Tatura Utara', 1001, 3, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(13, 'Birobuli Utara', 1002, 3, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(14, 'Petobo', 1003, 3, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(15, 'Birobuli Selatan', 1011, 3, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(16, 'Tatura Selatan', 1012, 3, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(17, 'Mamboro', 1001, 4, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(18, 'Taipa', 1002, 4, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(19, 'Kayumalue Ngapa', 1003, 4, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(20, 'Kayumalue Pajeko', 1004, 4, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(21, 'Mamboro Barat', 1010, 4, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(22, 'Buluri', 1001, 5, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(23, 'Donggala Kodi', 1002, 5, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(24, 'Kabonena', 1003, 5, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(25, 'Silae', 1004, 5, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(26, 'Watusampu', 1005, 5, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(27, 'Tipo', 1006, 5, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(28, 'Nunu', 1001, 6, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(29, 'Palupi', 1002, 6, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(30, 'Tawanjuka', 1003, 6, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(31, 'Pengawu', 1004, 6, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(32, 'Duyu', 1005, 6, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(33, 'Boyaoge', 1006, 6, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(34, 'Pantoloan', 1001, 7, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(35, 'Pantoloan Boya', 1002, 7, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(36, 'Baiya', 1003, 7, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(37, 'Lambara', 1004, 7, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(38, 'Panawu', 1005, 7, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(39, 'Layana Indah', 1001, 8, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(40, 'Tondo', 1002, 8, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(41, 'Talise', 1003, 8, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(42, 'Tanamodindi', 1004, 8, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(43, 'Lasoani', 1005, 8, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(44, 'Poboya', 1006, 8, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(45, 'Kawatuna', 1007, 8, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19'),
(46, 'Talise Valangguni', 1008, 8, 71, 72, '2023-05-03 15:34:19', '2023-05-03 15:34:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_districts`
--
ALTER TABLE `sub_districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_districts_district_code_foreign` (`district_code`),
  ADD KEY `sub_districts_city_code_foreign` (`city_code`),
  ADD KEY `sub_districts_province_code_foreign` (`province_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_districts`
--
ALTER TABLE `sub_districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_districts`
--
ALTER TABLE `sub_districts`
  ADD CONSTRAINT `sub_districts_city_code_foreign` FOREIGN KEY (`city_code`) REFERENCES `cities` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_districts_district_code_foreign` FOREIGN KEY (`district_code`) REFERENCES `districts` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_districts_province_code_foreign` FOREIGN KEY (`province_code`) REFERENCES `provinces` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
