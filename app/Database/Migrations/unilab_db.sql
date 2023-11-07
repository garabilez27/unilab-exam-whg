-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 01:28 PM
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
-- Database: `unilab_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `dateCreated` date NOT NULL DEFAULT '2023-10-25',
  `createdBy` int(11) NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(11) NOT NULL,
  `active` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `fullname`, `mobileNumber`, `city`, `dateCreated`, `createdBy`, `updatedAt`, `userID`, `active`) VALUES
(1, 'Sample', 'Sample', 'Sample,Sample', '116151513', 'Manila', '2023-10-25', 1, '2023-10-25 18:31:41', 1, 0),
(2, 'John', 'Doe', 'Doe,John', '123456790', 'Manila', '2023-10-25', 0, '2023-10-30 09:53:44', 1, 1),
(3, 'Parfum', 'Fougere', 'Fougere,Parfum', '0945515165', 'Quezon City', '2023-10-25', 0, '2023-10-30 09:53:47', 2, 1),
(4, 'Alvin', 'Santosa', 'Santosa,Alvin', '541561155', 'Manila City', '2023-10-25', 0, '2023-10-30 10:11:27', 3, 0);

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_10_25_103515_create_customers_table', 1),
(4, '2023_10_25_103612_create_s_k_u_s_table', 1),
(5, '2023_10_25_103651_create_purchase_orders_table', 1),
(6, '2023_10_25_103658_create_purchase_items_table', 1),
(7, '2023_10_25_171118_create_status_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poID` int(11) NOT NULL,
  `skuID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(11,2) NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `poID`, `skuID`, `quantity`, `price`, `updatedAt`, `userID`) VALUES
(10, 10, 13, 2, 200.00, '2023-10-31 08:24:01', 1),
(13, 11, 13, 4, 400.00, '2023-10-31 08:26:30', 1),
(14, 12, 13, 4, 400.00, '2023-10-31 08:29:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerID` int(11) NOT NULL,
  `dateOfDelivery` date NOT NULL,
  `status` smallint(6) NOT NULL,
  `amountDue` double(11,2) NOT NULL,
  `dateCreated` date NOT NULL DEFAULT '2023-10-25',
  `createdBy` int(11) NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(11) NOT NULL,
  `active` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `customerID`, `dateOfDelivery`, `status`, `amountDue`, `dateCreated`, `createdBy`, `updatedAt`, `userID`, `active`) VALUES
(10, 3, '2023-11-01', 2, 200.00, '2023-10-25', 0, '2023-10-31 08:24:01', 1, 1),
(11, 2, '2023-11-25', 1, 400.00, '2023-10-25', 0, '2023-10-31 08:26:30', 1, 1),
(12, 3, '2023-11-03', 3, 400.00, '2023-10-25', 0, '2023-10-31 08:29:15', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `dateCreated`) VALUES
(1, 'New', '2023-10-25 17:38:24'),
(2, 'Completed', '2023-10-25 17:38:24'),
(3, 'Cancelled', '2023-10-25 17:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `s_k_u_s`
--

CREATE TABLE `s_k_u_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `unitPrice` double(11,2) NOT NULL,
  `dateCreated` date NOT NULL DEFAULT '2023-10-25',
  `createdBy` int(11) NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userID` int(11) NOT NULL,
  `active` smallint(6) NOT NULL DEFAULT 1,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s_k_u_s`
--

INSERT INTO `s_k_u_s` (`id`, `name`, `code`, `unitPrice`, `dateCreated`, `createdBy`, `updatedAt`, `userID`, `active`, `img`) VALUES
(13, 'Sample', 'S1', 100.00, '2023-10-25', 0, '2023-10-30 17:25:45', 2, 1, '1698680091_bba297ee2b057d46477a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dateCreated`) VALUES
(1, 'Wen', 'wen@gmail.com', '12345678', '2023-10-30 09:23:52'),
(2, 'Del', 'del@gmail.com', '12345678', '2023-10-30 09:24:21'),
(3, 'Wendel', 'wendel@gmail.com', '12345678', '2023-10-30 09:24:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_k_u_s`
--
ALTER TABLE `s_k_u_s`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_k_u_s`
--
ALTER TABLE `s_k_u_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
