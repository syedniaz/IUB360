-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 06:41 PM
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
(1, 'TechTee', 1),
(2, 'PriyoBondhu', 3),
(3, 'Immortal T-Shirts ', 2),
(4, 'Eighteen-18', 4),
(5, 'TechWallet', 1),
(6, 'eGrove', 2),
(7, 'QuickPayBD', 3),
(8, 'Digibazaar', 1),
(9, 'SwiftBatch', 2),
(10, 'ShopEase', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `project_id` int(4) NOT NULL,
  `project_name` varchar(20) NOT NULL,
  `project_leader_id` int(4) NOT NULL,
  `project_member_1_name` varchar(50) NOT NULL,
  `project_member_2_name` varchar(50) NOT NULL,
  `project_member_3_name` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `stage_1` tinyint(1) NOT NULL,
  `stage_2` tinyint(1) NOT NULL,
  `stage_3` tinyint(1) NOT NULL,
  `initial_budget` int(7) NOT NULL,
  `project_path` varchar(30) DEFAULT NULL,
  `final_budget` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`project_id`, `project_name`, `project_leader_id`, `project_member_1_name`, `project_member_2_name`, `project_member_3_name`, `category`, `stage_1`, `stage_2`, `stage_3`, `initial_budget`, `project_path`, `final_budget`) VALUES
(1, 'Immortal T-Shirts', 1, 'Asif', 'Rasheeq', 'Naveel', 'T-Shirts', 1, 1, 1, 80000, 'magic04.rar', 85000),
(2, 'Cloud Cafe', 1, 'Istiaq', 'Faiza', 'Nafis', 'Coffee Shop', 1, 1, 0, 50000, 'magic+gamma+telescope.zip', NULL),
(3, 'Eighteen-18', 6, 'Shochcho', 'Daiyan', 'Safi', 'Web App', 1, 1, 1, 30000, 'applsci-11-07868.pdf', 50000),
(4, 'Dataminds', 6, 'Jaima', 'Shanto', 'Umama', 'Analytics Startup', 1, 0, 0, 100000, 'ReactJS-Guide.pdf', NULL),
(5, 'PriyoBondhu', 5, 'Dilan', 'Ridwan', 'Nafis', 'Mobile Application', 1, 1, 1, 55000, 'bios_update.pdf', 60000),
(6, 'TechTee', 7, 'Rayik', 'Nabil', 'Rifat', 'T-Shirts', 1, 1, 1, 40000, 'document.pdf', 45000),
(7, 'Hammers', 8, 'Sifat', 'Sameer', 'Fardeen', 'Workshop', 1, 0, 0, 200000, 'document.pdf', 250000),
(8, 'LesGoChamp', 9, 'Joy', 'Samin', 'Sakib', 'Streaming App', 0, 0, 0, 80000, 'document.pdf', NULL),
(9, 'GardenR', 10, 'Surem', 'Ayat', 'Nafis', 'Agriculture StartUp', 0, 0, 0, 50000, 'document.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_messages`
--

CREATE TABLE `student_messages` (
  `message_id` int(6) NOT NULL,
  `sender_id` int(6) NOT NULL,
  `receiver_id` int(6) NOT NULL,
  `messages` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_messages`
--

INSERT INTO `student_messages` (`message_id`, `sender_id`, `receiver_id`, `messages`) VALUES
(1, 3, 1, 'Hello, Welcome to IUB 360'),
(2, 3, 1, 'Nice Work!'),
(3, 4, 5, 'Good job on the project'),
(4, 4, 7, 'Please stop giving tours and start working on the project'),
(5, 3, 8, 'Update your prototype within new budget');

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
(3, 'Sabrina Alam', 'sabrina@iub.edu.bd', '1234', 'mentor'),
(4, 'Subha', 'subha@bolbona.com', '1234', 'mentor'),
(5, 'Rasheeq Ishmam', 'rasheeq@gmail.com', '1234', 'student'),
(6, 'Naveel', 'naveel@gmail.com', '1234', 'student'),
(7, 'Al Asif', 'asif@gmail.com', '1234', 'student'),
(8, 'Rafi', 'rafi@gmail.com', '1234', 'student'),
(9, 'Monimur', 'monimur@gmail.com', '1234', 'student'),
(10, 'Sarah', 'sarah@gmail.com', '1234', 'student'),
(11, 'Sanzar', 'sanzar@gmail.com', '1234', 'mentor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `project_leader_id` (`project_leader_id`);

--
-- Indexes for table `student_messages`
--
ALTER TABLE `student_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

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
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `project_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_messages`
--
ALTER TABLE `student_messages`
  MODIFY `message_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_details`
--
ALTER TABLE `project_details`
  ADD CONSTRAINT `project_details_ibfk_1` FOREIGN KEY (`project_leader_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_messages`
--
ALTER TABLE `student_messages`
  ADD CONSTRAINT `student_messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
