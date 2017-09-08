-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2017 at 05:35 AM
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_id` varchar(20) NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `generic_name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `manufacturer` varchar(30) NOT NULL,
  `dosage` varchar(30) NOT NULL,
  `exp_date` varchar(20) NOT NULL,
  `mfg_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(20) NOT NULL,
  `cust_id` varchar(20) NOT NULL,
  `drug_id` int(20) NOT NULL,
  `drug_name` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` float NOT NULL,
  `amount` float NOT NULL,
  `date_of_purchase` varchar(20) NOT NULL,
  `date_of_delivery` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'john', 'doe@hj.com', '123', NULL, '2017-09-06 07:08:08', '2017-09-06 07:08:08'),
(2, 'abc', 'abc@hhn.co', '12345', NULL, '2017-09-06 09:08:35', '2017-09-06 09:08:35'),
(3, 'cnd', 'cnd@gmail.com', '$2y$10$.SmpK7.CFJnWJaX8uphJ2uDSMTBebtlgE6V7YQiZnQS6mTiw1UW9m', 'Hep5uABDkZEeoVCnXk3MlG949XxaRuSJa7MfZ7ieTDsQdSyygUievDvk7GJj', '2017-09-07 03:01:41', '2017-09-07 03:01:41'),
(4, 'Abc', 'abc@hot.com', '$2y$10$VQ/d1R5L8tPF.Lq9cEOi4ubMxabdGpq0cL25XrJajJDk5mYsOMA6G', 'Ah20Hzqsonhw6TWFJB1m1xPhUWxXuOZNT9E29SLu4jmPKoDZkSp6BKVeWTah', '2017-09-07 05:10:00', '2017-09-07 05:10:00'),
(5, 'Uio', 'uio@hh.com', '$2y$10$kXilKAodyOKO9ncWbLGdQOTEqQIuCSaUhk9Iqdg27q5DWswBRAWAq', 'Lwte5MtVDXJSZG914KZBll4LNFXjaUwcHXsSfMe5wluatMbRCofAbK9eygoR', '2017-09-07 05:39:01', '2017-09-07 05:39:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
