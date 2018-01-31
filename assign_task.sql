-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 08:23 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assign_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL,
  `sku` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `price` double(10,2) NOT NULL,
  `type_switcher` varchar(60) NOT NULL,
  `switcher_attribute` varchar(60) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sort_order` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `sku`, `product_name`, `price`, `type_switcher`, `switcher_attribute`, `created_date`, `last_updated`, `status`, `sort_order`) VALUES
(1, 'SKU101', 'Chair', 0.00, '3', '45,45,45', '2018-01-26 07:51:47', '2018-01-26 06:51:47', 1, 1),
(4, 'SKU104', 'Peace and War', 78.00, '2', '2kgs', '2018-01-26 09:17:05', '2018-01-26 08:17:05', 1, 2),
(6, 'SKU104', 'Peace and War', 78.00, '2', '2kgs', '2018-01-26 09:17:05', '2018-01-26 08:17:05', 1, 2),
(7, 'SKU101', 'Chair', 0.00, '3', '45,45,45', '2018-01-26 07:51:47', '2018-01-26 06:51:47', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
