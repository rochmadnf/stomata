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
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Aceh', 11, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(2, 'Sumatera Utara', 12, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(3, 'Sumatera Barat', 13, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(4, 'Riau', 14, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(5, 'Jambi', 15, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(6, 'Sumatera Selatan', 16, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(7, 'Bengkulu', 17, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(8, 'Lampung', 18, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(9, 'Kepulauan Bangka Belitung', 19, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(10, 'Kepulauan Riau', 21, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(11, 'Dki Jakarta', 31, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(12, 'Jawa Barat', 32, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(13, 'Jawa Tengah', 33, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(14, 'Daerah Istimewa Yogyakarta', 34, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(15, 'Jawa Timur', 35, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(16, 'Banten', 36, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(17, 'Bali', 51, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(18, 'Nusa Tenggara Barat', 52, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(19, 'Nusa Tenggara Timur', 53, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(20, 'Kalimantan Barat', 61, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(21, 'Kalimantan Tengah', 62, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(22, 'Kalimantan Selatan', 63, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(23, 'Kalimantan Timur', 64, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(24, 'Kalimantan Utara', 65, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(25, 'Sulawesi Utara', 71, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(26, 'Sulawesi Tengah', 72, '2023-05-03 15:11:52', '2023-05-03 15:11:52'),
(27, 'Sulawesi Selatan', 73, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(28, 'Sulawesi Tenggara', 74, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(29, 'Gorontalo', 75, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(30, 'Sulawesi Barat', 76, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(31, 'Maluku', 81, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(32, 'Maluku Utara', 82, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(33, 'Papua', 91, '2023-05-03 15:43:03', '2023-05-03 15:43:03'),
(34, 'Papua Barat', 92, '2023-05-03 15:43:03', '2023-05-03 15:43:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provinces_code_unique` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
