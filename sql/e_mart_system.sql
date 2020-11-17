-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 06:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_mart_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(50) NOT NULL,
  `customer_id` int(50) DEFAULT NULL,
  `owner_id` int(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `status` int(50) NOT NULL,
  `created` datetime NOT NULL,
  `modifed` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email_address` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `followed_store` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `product_id`, `firstname`, `lastname`, `contact_number`, `address`, `email_address`, `password`, `followed_store`, `created`, `modified`) VALUES
(1, 0, 'Admin sadsad', 'SociableKIT sadsadasd', '09999635031', '30 ', 'mike@sociablekit.com', '$2y$10$dEFZ3JNlgJ4Kc7cPVAeKLO4O785RNQXVO.FHMd4u.gbyTrSCa9ofC', '', '2020-11-17 12:25:24', '2020-11-17 04:29:13'),
(2, 0, 'Admin sadsad', 'SociableKIT sadsadasd', '3123123', '', 'ajcodalify@gmail.com', '$2y$10$dEFZ3JNlgJ4Kc7cPVAeKLO4O785RNQXVO.FHMd4u.gbyTrSCa9ofC', '', '2020-11-17 12:26:52', '2020-11-17 04:29:13'),
(3, 0, 'Encoder1', 'SociableKIT sadsadasd', 'qwewqeqw', '', 'info@codalify.com', '$2y$10$uQPl01hzpS0F8K5pRTTnFukPXuEr69sUJYq2U46TsmOHAyYUQcrB6', '', '2020-11-17 12:31:51', '2020-11-17 04:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `owner_id` int(32) NOT NULL,
  `name` varchar(256) NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'category_id',
  `srp` int(11) NOT NULL COMMENT 'suggested retail price',
  `price` int(11) NOT NULL COMMENT 'price w/profit',
  `received` timestamp NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `store_users`
--

CREATE TABLE `store_users` (
  `id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email_address` varchar(64) NOT NULL,
  `contact_number` varchar(64) NOT NULL,
  `address` varchar(64) NOT NULL,
  `password` varchar(512) CHARACTER SET utf32 COLLATE utf32_latvian_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modfied` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_users`
--

INSERT INTO `store_users` (`id`, `store_name`, `firstname`, `lastname`, `email_address`, `contact_number`, `address`, `password`, `created`, `modfied`) VALUES
(3, 'new era', 'alexis', 'dumale', 'mike@sociablekit.com', '09999635031', '30 alvarez', '$2y$10$iH5o/2d.e7UVnlrmklyG/Oec85B8q0ZMNWnnrKFkN..fLX.P4RjCC', '2020-10-14 02:41:26', '2020-10-14 16:41:26'),
(9, 'rickers', 'alexis', 'dumale', 'alexis@codalify.com', '09999635031', '30 alvarez', '$2y$10$J9Vf53GGY1c5X.6V8RCmoOrR6GU5n75gRDDSreOEeTiGGdFHO3Jum', '2020-10-18 02:26:50', '2020-10-18 16:26:51'),
(10, 'puregold', 'alexis', 'dumale', 'puregold@yahoo.com', '09999635031', '30 alvarez', '$2y$10$4U3whtxfOwoK8d.WW9LZz.6KWUMVBW2yb2E8tRK9lPrNCljQHwf2C', '2020-10-18 02:28:56', '2020-10-18 16:28:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_users`
--
ALTER TABLE `store_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_users`
--
ALTER TABLE `store_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
