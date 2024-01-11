-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 06:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proyekbwp`
--
CREATE DATABASE IF NOT EXISTS `db_proyekbwp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_proyekbwp`;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `Id_jenis` varchar(5) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`Id_jenis`, `Nama`) VALUES
('1', 'Minuman'),
('2', 'Topping'),
('3', 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `id_jenis` varchar(5) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `flagjual` int(2) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `id_jenis`, `foto`, `harga`, `flagjual`, `keterangan`, `status`) VALUES
(1, 'Kopi item', '1', 'Kopi item.jpg', 12, 1, NULL, 'aktif'),
(2, 'Kopi susu', '1', 'Kopi susu.jpg', 10, 1, NULL, 'aktif'),
(3, 'Boba', '2', 'Boba.jpg', 1, 1, NULL, 'aktif'),
(4, 'Jely', '2', 'Jelly.png', 1, 1, NULL, 'aktif'),
(5, 'French fries', '3', 'French fries.jpg', 6, 1, NULL, 'aktif'),
(8, '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(30) NOT NULL,
  `password` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Nama` tinytext DEFAULT NULL,
  `Alamat` varchar(30) DEFAULT NULL,
  `Kota` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tgljoin` date DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `password`, `email`, `Nama`, `Alamat`, `Kota`, `telp`, `tgllahir`, `tgljoin`, `role`, `status`, `updated_at`, `created_at`) VALUES
('Ariel ezra', '123	', 'ariel@gmail.com', 'Ariel ezra						', 'Rungkut Mapan Timur', 'Surabaya', '08123422123', '1989-03-07', '2023-12-26', 'User', '1', '2023-12-26', '2023-12-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`Id_jenis`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
