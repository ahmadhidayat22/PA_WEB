-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 11:15 AM
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
-- Database: `kapal_laut`
--

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tanggal_berangkat` varchar(255) NOT NULL,
  `tanggal_tiba` varchar(255) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `asal`, `tujuan`, `tanggal_berangkat`, `tanggal_tiba`, `harga`) VALUES
(6, 'balikpapan', 'penajam', '2023-11-04', '2023-11-03', 65000),
(9, 'Sulawesi', 'Bau-bau', '2023-11-05', '2023-11-08', 200000),
(10, 'Tanjung Priok', 'Tanjung Perak', '2023-11-17', '2023-11-17', 500000),
(11, 'Surabaya', 'Makassar', '2023-11-18', '2023-11-18', 600000),
(12, 'Balikpapan', 'Jakarta', '2023-11-18', '2023-11-18', 550000),
(13, 'Makassar', 'Balikpapan', '2023-11-18', '2023-11-19', 700000),
(14, 'Jakarta', 'Tanjung Priok', '2023-11-20', '2023-11-22', 450000),
(15, 'Medan', 'Padang', '2023-11-20', '2023-11-22', 480000),
(16, 'Semarang', 'Denpasar', '2023-11-21', '2023-11-23', 550000),
(17, 'Pontianak', 'Banjarmasin', '2023-11-18', '2023-11-19', 600000),
(18, 'Ambon', 'Jayapura', '2023-11-22', '2023-11-24', 700000),
(19, 'Manado', 'Sorong', '2023-11-19', '2023-11-21', 650000),
(20, 'Pekanbaru', 'Jambi', '2023-11-21', '2023-11-23', 520000),
(21, 'Banda Aceh', 'Palembang', '2023-12-15', '2023-12-16', 480000),
(22, 'Bandung', 'Yogyakarta', '2023-12-20', '2023-09-21', 530000),
(23, 'Malang', 'Solo', '2023-12-25', '2023-12-27', 480000),
(24, 'Kupang', 'Makassar', '2023-12-30', '2024-01-01', 550000),
(25, 'Tanjung Perak', 'Tanjung Priok', '2023-11-20', '2023-11-22', 510000),
(26, 'Makassar', 'Surabaya', '2023-11-20', '2023-11-22', 620000),
(27, 'Banjarmasin', 'Semarang', '2023-11-20', '2023-11-22', 570000),
(28, 'Jayapura', 'Ambon', '2023-11-20', '2023-11-22', 710000),
(29, 'Sorong', 'Manado', '2023-11-20', '2023-11-22', 660000),
(30, 'Jambi', 'Pekanbaru', '2023-11-20', '2023-11-22', 530000),
(31, 'Palembang', 'Banda Aceh', '2023-11-20', '2023-11-22', 490000),
(32, 'Yogyakarta', 'Bandung', '2023-11-20', '2023-11-23', 540000),
(33, 'Solo', 'Malang', '2023-11-21', '2023-11-23', 490000),
(34, 'Makassar', 'Kupang', '2023-11-20', '2023-11-21', 560000),
(35, 'Medan', 'Padang', '2023-12-25', '2023-12-27', 490000),
(36, 'Denpasar', 'Pontianak', '2024-01-30', '2024-01-31', 610000),
(37, 'Jember', 'Manokwari', '2024-03-06', '2024-03-07', 720000),
(38, 'Tanjung Pinang', 'Sibolga', '2024-04-10', '2024-04-11', 550000),
(39, 'Lhokseumawe', 'Samarinda', '2024-05-15', '2024-05-16', 580000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_tiket` int(100) NOT NULL,
  `total_harga` int(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Age` int(11) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `role` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `Username`, `Email`, `Age`, `Password`, `gambar`, `role`) VALUES
(1, 'admin', 'admin@admin.com', 20, 'admin', 'no-image.jpeg', 'admin'),
(30, 'ahmad', 'ahmad@den.com', 25, 'ahmad123', '2023-11-16.30.png', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
