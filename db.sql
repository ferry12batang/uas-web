-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2023 at 03:24 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_persewaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint NOT NULL,
  `customer` int NOT NULL,
  `loan` int NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `status` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer`, `loan`, `total`, `status`) VALUES
(1, 1, 1, 60000, 1),
(2, 1, 2, 55000, 0),
(3, 1, 3, 55000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `condition` enum('normal','repair','no') COLLATE utf8mb4_general_ci DEFAULT 'normal',
  `ram` int DEFAULT NULL,
  `procie` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `storage` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vga` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ready` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `name`, `price`, `condition`, `ram`, `procie`, `storage`, `vga`, `ready`) VALUES
(1, 'Asus ZenBook UX333FA', 50000, 'repair', 8, 'Intel Core i5', '256GB SSD', 'Integrated Intel UHD Graphics 620', 1),
(2, 'Acer Swift 3 SF313-52', 45000, 'normal', 16, 'Intel Core i7', '512GB SSD', 'Intel Iris Xe Graphics', 0),
(3, 'Lenovo ThinkPad X1 Carbon', 60000, 'normal', 16, 'Intel Core i7', '1TB SSD', 'Integrated Intel UHD Graphics', 0),
(4, 'HP Spectre x360', 55000, 'normal', 16, 'Intel Core i7', '512GB SSD', 'NVIDIA GeForce MX330', 0),
(5, 'Dell XPS 15', 55000, 'normal', 32, 'Intel Core i9', '1TB SSD', 'NVIDIA GeForce GTX 1650 Ti', 0),
(6, 'Apple MacBook Pro', 65000, 'normal', 16, 'Apple M1', '512GB SSD', 'Apple M1 GPU', 1),
(7, 'Microsoft Surface Laptop 4', 40000, 'normal', 8, 'Intel Core i5', '256GB SSD', 'Intel Iris Xe Graphics', 1),
(8, 'Razer Blade 15', 60000, 'normal', 16, 'Intel Core i7', '1TB SSD', 'NVIDIA GeForce RTX 3060', 1),
(9, 'Asus ROG Zephyrus G14', 50000, 'no', 16, 'AMD Ryzen 9', '1TB SSD', 'NVIDIA GeForce RTX 3060', 1),
(10, 'Lenovo Legion 5', 45000, 'repair', 16, 'AMD Ryzen 7', '512GB SSD', 'NVIDIA GeForce GTX 1660 Ti', 1),
(11, 'HP Pavilion Gaming', 40000, 'normal', 8, 'Intel Core i5', '512GB SSD', 'NVIDIA GeForce GTX 1650', 1),
(12, 'Acer Predator Helios 300', 45000, 'normal', 16, 'Intel Core i7', '1TB SSD', 'NVIDIA GeForce RTX 3070', 1),
(13, 'Dell Inspiron 15 7000', 40000, 'repair', 16, 'Intel Core i5', '512GB SSD', 'NVIDIA GeForce GTX 1650 Ti', 1),
(14, 'Apple MacBook Air', 55000, 'normal', 8, 'Apple M1', '256GB SSD', 'Apple M1 GPU', 1),
(15, 'Asus VivoBook S15', 35000, 'normal', 8, 'Intel Core i5', '512GB SSD', 'Integrated Intel UHD Graphics', 1),
(16, 'Lenovo Yoga C940', 50000, 'no', 12, 'Intel Core i7', '512GB SSD', 'Integrated Intel UHD Graphics', 1),
(17, 'HP Envy x360', 40000, 'normal', 8, 'AMD Ryzen 5', '256GB SSD', 'Integrated AMD Radeon Graphics', 1),
(18, 'Dell G5 15 SE', 45000, 'repair', 16, 'AMD Ryzen 7', '512GB SSD', 'AMD Radeon RX 5600M', 1),
(19, 'MSI GS66 Stealth', 60000, 'normal', 32, 'Intel Core i9', '1TB SSD', 'NVIDIA GeForce RTX 3080', 1),
(20, 'Acer Aspire 5', 35000, 'normal', 8, 'Intel Core i5', '512GB SSD', 'Integrated Intel UHD Graphics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint NOT NULL,
  `laptop` int UNSIGNED NOT NULL,
  `customer` int UNSIGNED NOT NULL,
  `start` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `end` timestamp NULL DEFAULT NULL,
  `status` enum('missing','borrow','back') COLLATE utf8mb4_general_ci DEFAULT 'borrow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `laptop`, `customer`, `start`, `end`, `status`) VALUES
(1, 3, 1, '2023-06-09 04:54:02', '2023-06-16 04:54:02', 'back'),
(2, 4, 1, '2023-06-09 07:12:16', '2023-06-16 07:12:16', 'borrow'),
(3, 5, 1, '2023-06-09 07:12:26', '2023-06-16 07:12:26', 'borrow');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surname` varchar(128) NOT NULL,
  `role` enum('admin','users') DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `surname`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin@sewa.com', '$2y$10$WOrbohYOOJLXio.Y9KG.zec1/kTP/Is8M6xpRj3ikMEIgvfpdro/W', '0450ad3949053cfbd02507dd317935766efccc15a930a342bc57a6d1db8f0020', 'System Administrator', 'admin', '2023-05-29 23:54:16', '2023-06-09 07:58:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
