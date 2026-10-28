-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2026 at 04:23 PM
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
-- Database: `skm_dpmptsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `responden_id` int(11) NOT NULL,
  `pertanyaan_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `responden_id`, `pertanyaan_id`, `nilai`) VALUES
(19, 3, 1, 3),
(20, 3, 2, 3),
(21, 3, 3, 3),
(22, 3, 4, 3),
(23, 3, 5, 3),
(24, 3, 6, 3),
(25, 3, 7, 3),
(26, 3, 8, 3),
(27, 3, 9, 3),
(28, 4, 1, 3),
(29, 4, 2, 4),
(30, 4, 3, 3),
(31, 4, 4, 4),
(32, 4, 5, 2),
(33, 4, 6, 3),
(34, 4, 7, 4),
(35, 4, 8, 3),
(36, 4, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `aktif` enum('Ya','Tidak') DEFAULT 'Ya'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `nomor`, `pertanyaan`, `aktif`) VALUES
(1, 1, 'Bagaimana pendapat Anda tentang kesesuaian persyaratan pelayanan dengan jenis pelayanan yang diberikan?', 'Ya'),
(2, 2, 'Bagaimana pemahaman Anda tentang prosedur pelayanan yang diberikan?', 'Ya'),
(3, 3, 'Bagaimana pendapat Anda tentang kecepatan waktu dalam memberikan pelayanan?', 'Ya'),
(4, 4, 'Bagaimana pendapat Anda tentang kewajaran biaya atau tarif pelayanan?', 'Ya'),
(5, 5, 'Bagaimana pendapat Anda tentang kesesuaian produk pelayanan yang diterima?', 'Ya'),
(6, 6, 'Bagaimana pendapat Anda tentang kompetensi atau kemampuan petugas dalam memberikan pelayanan?', 'Ya'),
(7, 7, 'Bagaimana pendapat Anda tentang perilaku petugas dalam memberikan pelayanan?', 'Ya'),
(8, 8, 'Bagaimana pendapat Anda tentang penanganan pengaduan, saran dan masukan?', 'Ya'),
(9, 9, 'Bagaimana pendapat Anda tentang kualitas sarana dan prasarana pelayanan?', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `umur` int(11) NOT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `responden`
--

INSERT INTO `responden` (`id`, `nama`, `jenis_kelamin`, `umur`, `pendidikan`, `pekerjaan`, `tanggal`) VALUES
(3, 'dilla', 'Perempuan', 21, 'Diploma', 'tidak ada', '2026-09-15 11:16:48'),
(4, 'Dea Puspita Sari Br Tarigan', 'Perempuan', 21, 'SMA', 'tidak ada', '2026-09-21 11:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'e4c3f224a956d5a5877a58a7be32e2a6', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responden_id` (`responden_id`),
  ADD KEY `pertanyaan_id` (`pertanyaan_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responden`
--
ALTER TABLE `responden`
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
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `responden`
--
ALTER TABLE `responden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`responden_id`) REFERENCES `responden` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
