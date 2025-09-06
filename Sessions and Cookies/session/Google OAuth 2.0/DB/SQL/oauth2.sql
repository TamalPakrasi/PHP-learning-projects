-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2025 at 05:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taitonaki`
--

-- --------------------------------------------------------

--
-- Table structure for table `oauth2`
--

CREATE TABLE `oauth2` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `auth_style` set('local','google','github') NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `github_id` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oauth2`
--

INSERT INTO `oauth2` (`id`, `username`, `email`, `password`, `auth_style`, `google_id`, `github_id`, `created_at`) VALUES
(6, 'Tamal Pakrasi', 'tamalpakrasi11@gmail.com', NULL, 'google', '115663993377052633793', NULL, '2025-09-06 20:35:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oauth2`
--
ALTER TABLE `oauth2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `google_id` (`google_id`),
  ADD UNIQUE KEY `github_id` (`github_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oauth2`
--
ALTER TABLE `oauth2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
