-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2023 at 09:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppay`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `nama_kelas` varchar(32) DEFAULT NULL,
  `kompetensi_keahlian` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(2, 'RPL', 'Rekayasa Perangkat Lunak'),
(3, 'MM', 'Multimedia'),
(5, 'testst', 'estast');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int NOT NULL,
  `keterangan` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `keterangan`) VALUES
(1, 'admin'),
(2, 'petugas'),
(3, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_spp` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `id_petugas` int DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bulan_bayar` varchar(10) DEFAULT NULL,
  `tahun_bayar` varchar(4) DEFAULT NULL,
  `jumlah_bayar` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_spp`, `id_siswa`, `id_petugas`, `tgl_bayar`, `bulan_bayar`, `tahun_bayar`, `jumlah_bayar`) VALUES
(2, 11, 4, 1, '2023-02-22', 'juni', '2023', 200000),
(4, 11, 4, 1, '2023-02-22', 'juli', '2023', 200000),
(5, 11, 4, 1, '2023-02-22', 'agustus', '2023', 200000),
(6, 11, 4, 1, '2023-02-22', 'september', '2023', 200000),
(7, 11, 4, 1, '2023-02-22', 'oktober', '2023', 200000),
(8, 11, 4, 1, '2023-02-22', 'november', '2023', 200000),
(9, 11, 4, 1, '2023-02-22', 'desember', '2023', 200000),
(10, 11, 4, 1, '2023-02-22', 'januari', '2023', 200000),
(11, 11, 4, 1, '2023-02-22', 'februari', '2023', 200000),
(12, 11, 4, 1, '2023-02-22', 'maret', '2023', 200000),
(13, 11, 4, 1, '2023-02-22', 'april', '2023', 200000),
(14, 11, 4, 1, '2023-02-22', 'mei', '2023', 200000),
(39, 11, 7, 1, '2023-02-22', 'juli', '2023', 200000),
(40, 11, 7, 1, '2023-02-22', 'agustus', '2023', 200000),
(41, 11, 7, 1, '2023-02-22', 'september', '2023', 200000),
(42, 11, 7, 1, '2023-02-22', 'oktober', '2023', 200000),
(43, 11, 7, 1, '2023-02-22', 'november', '2023', 200000),
(44, 11, 7, 1, '2023-02-22', 'desember', '2023', 200000),
(45, 11, 7, 1, '2023-02-22', 'januari', '2023', 200000),
(46, 11, 7, 1, '2023-02-22', 'februari', '2023', 200000),
(47, 11, 7, 1, '2023-02-22', 'maret', '2023', 200000),
(48, 11, 7, 1, '2023-02-22', 'april', '2023', 200000),
(49, 11, 7, 1, '2023-02-22', 'juni', '2023', 200000),
(50, 11, 7, 1, '2023-02-22', 'mei', '2023', 200000),
(51, 11, 8, 1, '2023-02-22', 'juli', '2023', 200000),
(52, 11, 8, 1, '2023-02-22', 'agustus', '2023', 200000),
(53, 11, 8, 1, '2023-02-22', 'september', '2023', 200000),
(54, 11, 8, 1, '2023-02-22', 'oktober', '2023', 200000),
(55, 11, 8, 1, '2023-02-22', 'november', '2023', 200000),
(56, 11, 8, 1, '2023-02-22', 'desember', '2023', 200000),
(57, 11, 9, 1, '2023-02-23', 'juli', '2023', 200000),
(58, 11, 9, 1, '2023-02-23', 'agustus', '2023', 200000),
(59, 11, 9, 1, '2023-02-23', 'september', '2023', 200000),
(60, 11, 9, 1, '2023-02-23', 'oktober', '2023', 200000),
(61, 11, 9, 1, '2023-02-23', 'november', '2023', 200000),
(62, 11, 9, 1, '2023-02-23', 'januari', '2023', 200000),
(63, 11, 9, 1, '2023-02-23', 'desember', '2023', 200000),
(64, 11, 9, 1, '2023-02-23', 'februari', '2023', 200000),
(65, 11, 9, 1, '2023-02-23', 'maret', '2023', 200000),
(66, 11, 9, 1, '2023-02-23', 'april', '2023', 200000),
(67, 11, 9, 1, '2023-02-23', 'mei', '2023', 200000),
(68, 11, 9, 1, '2023-02-23', 'juni', '2023', 200000),
(69, 11, 8, 1, '2023-02-23', 'januari', '2023', 200000),
(70, 11, 8, 1, '2023-02-23', 'februari', '2023', 200000),
(71, 11, 8, 1, '2023-02-23', 'maret', '2023', 200000),
(72, 11, 8, 1, '2023-02-23', 'april', '2023', 200000),
(73, 11, 8, 1, '2023-02-23', 'mei', '2023', 200000),
(74, 11, 8, 1, '2023-02-23', 'juni', '2023', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama_petugas` varchar(32) DEFAULT NULL,
  `id_level` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `id_level`) VALUES
(1, 'admin', 'admin123', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(5) DEFAULT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `alamat` text,
  `id_kelas` int DEFAULT NULL,
  `id_spp` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nis`, `nama_siswa`, `password`, `no_telp`, `alamat`, `id_kelas`, `id_spp`) VALUES
(4, '288828', '9999', 'budi sudirman', 'f1beaf277a0ba2efdec5ed4ce8f5435b', '08123456789', 'alamat budi sudirman', 2, 11),
(7, '1342352353', '23525', 'rudy santoso', 'f1beaf277a0ba2efdec5ed4ce8f5435b', '2343423523525', 'alamat rudy santoso', 2, 11),
(8, '9991288488', '12412', 'budi irawan', 'f1beaf277a0ba2efdec5ed4ce8f5435b', '1355135312515', 'alamat budi irawan', 2, 11),
(9, '2222222222', '22222', 'annak baru', 'f1beaf277a0ba2efdec5ed4ce8f5435b', '1328888888888', 'alamat nak baru', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int NOT NULL,
  `tahun` int DEFAULT NULL,
  `nominal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(11, 2023, 200000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `fk_spp` (`id_spp`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_spp` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
