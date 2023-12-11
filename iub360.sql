-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 08:03 PM
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
-- Database: `iub360`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `batch` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `batch`) VALUES
(1, 'TechAsif', 2),
(2, 'PriyoBondhu', 1),
(3, 'CloudCafe', 2),
(4, 'ClickCart', 3),
(5, 'TechWallet', 1),
(6, 'eGrove', 2),
(7, 'QuickPayBD', 3),
(8, 'Digibazaar', 1),
(9, 'SwiftBatch', 2),
(10, 'ShopEase', 1),
(11, 'PayPulse', 3),
(12, 'TechHarbor', 2),
(13, 'ZippyCart', 1),
(14, 'ByteBucks', 3),
(15, 'GadgetGrid', 2),
(16, 'MarketMingle', 1),
(17, 'PulsePay', 3),
(18, 'UrbanSwipe', 2),
(19, 'QuantumCart', 1),
(20, 'FlashFunds', 3),
(21, 'CyberHarbor', 2),
(22, 'NexusPay', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(24) NOT NULL,
  `user_type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Syed Niaz', 'syedniaz_10@yahoo.com', '1234', 'student'),
(2, 'admin1', 'admin1@gmail.com', '1234', 'admin'),
(3, 'Sabrina Alam', 'sabrina@iub.edu.bd', '1234', 'mentor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
