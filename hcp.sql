-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2017 at 11:34 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` double DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locality` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `store_name`, `owner_name`, `store_email`, `password`, `phone`, `address`, `locality`, `created_at`, `updated_at`) VALUES
(2, 'Med Shop', 'Amit Das', 'admin@gmail.com', '$2y$10$7YMH32C8Rk9.J7UcyVEDh.h/UXg70KlcpKIrQgT6QsYiz.5dFB5Ju', 9898787656, 'Guwahati', 'Guwahati', '2017-10-10 02:59:03', '2017-10-10 02:59:03'),
(3, 'Das Medishop', 'Mridul Das', 'medishop@gmail.com', '$2y$10$7YMH32C8Rk9.J7UcyVEDh.h/UXg70KlcpKIrQgT6QsYiz.5dFB5Ju', 8987787656, 'kok', 'Mangoldoi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_id` int(20) NOT NULL,
  `pharmacy_id` int(100) NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `generic_name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(20) NOT NULL,
  `manufacturer` varchar(30) NOT NULL,
  `dosage` varchar(30) NOT NULL,
  `exp_date` varchar(20) NOT NULL,
  `mfg_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_id`, `pharmacy_id`, `brand_name`, `generic_name`, `price`, `type`, `manufacturer`, `dosage`, `exp_date`, `mfg_date`) VALUES
(1, 2, 'Calpol', 'sds', 23, 'tablets', 'sdsds', '234', '1090-12-12', '2017-10-18'),
(2, 2, 'sds', 'ssdsd', 23, 'tablets', 'sdsd', '345', '2017-10-15', '2017-10-11'),
(3, 3, 'l-neuron', 'Atinolol', 80, 'tablets', 'Cipla', '500mg', '2017-11-08', '2017-10-04'),
(4, 3, 'Calpol', 'medi', 67, 'tablets', 'kok', '200mg', '2009-12-12', '2015-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_09_105356_create_pharmacy_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `cust_id` varchar(20) DEFAULT NULL,
  `pharmacy_id` int(100) NOT NULL,
  `drug_id` int(20) DEFAULT NULL,
  `drug_name` varchar(50) DEFAULT NULL,
  `quantity` varchar(300) DEFAULT NULL,
  `price` varchar(300) DEFAULT NULL,
  `amount` varchar(300) DEFAULT NULL,
  `date_of_purchase` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_of_delivery` datetime DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `image` varchar(40) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `invoice_no`, `cust_id`, `pharmacy_id`, `drug_id`, `drug_name`, `quantity`, `price`, `amount`, `date_of_purchase`, `date_of_delivery`, `address`, `image`, `file`, `status`) VALUES
(1019, NULL, '1', 2, NULL, NULL, NULL, NULL, NULL, '2017-10-24 16:43:30', NULL, NULL, '1508843610.jpg', NULL, 0),
(1016, NULL, '1', 2, NULL, NULL, NULL, NULL, NULL, '2017-10-24 15:10:16', NULL, NULL, '1508838016.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` double NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_locality` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dob`, `gender`, `phone`, `password`, `address`, `user_locality`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'satish', 'satish@simplisticsolutions.in', '1993-01-12', 'male', 9859817451, '$2y$10$pHqZIJ.UE9lJH0DoOgTyyuU9/JgMfuFNJNCZJ.R6vflgL76A4if3m', 'kokrajhar', 'Guwahati', 'CstGPhPuiYdAPqYPSztlKbc09XGzRXzvJ1henWxtCfHJnqM8sLbliyLZ0Lbi', '2017-10-10 00:08:56', '2017-10-16 11:20:44'),
(2, 'imdadul', 'imdadul@simplisticsolutions.in', '1994-12-12', 'male', 8787878787, '$2y$10$hYduVgb/C5EixZGZwF6yze3OFmJFj.BIp7qKguboOVlAda4FQDZom', 'namghar road', 'Mangoldoi', 'gcByapyUPL0sBFNZeNMsqNoBa6aoRKezgsoTgNWwxrbxOWI6bXo24RdPeAoO', '2017-10-15 23:58:33', '2017-10-15 23:58:33'),
(3, 'pragyan', 'pragyan@simplisticsolutions.in', '1990-01-12', 'male', 2323232323, '$2y$10$RZNJd321.JNhvwxGgalRJusMNFNNOyD0mQRbqNGXNZGQOzXoT/EYK', 'bora road', 'Mangoldoi', 'Esv0FDkxlJJB31xZwAevLmID7CcYhGfuidlhkFplOC3WYKWKolZrRoqgNUOF', '2017-10-16 00:14:05', '2017-10-16 00:14:05'),
(5, 'amit', 'satishofcit@gmail.com', '1990-12-12', 'male', 9859817451, '$2y$10$sMG1R1YdH356f1aCBi/xr.VndZIlIlzhaexux45HLo9yd40587hTO', 'kok', 'Guwahati', NULL, '2017-10-24 06:45:14', '2017-10-24 06:45:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medical_store_store_email_unique` (`store_email`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `drug_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1020;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
