-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2023 at 10:26 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addPengguna` (`in_username` VARCHAR(32), `in_password` VARCHAR(32), `in_level` INT)   begin 
insert into pengguna values(null, in_username, in_password, in_level);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addPetugas` (`in_username` VARCHAR(32), `in_nama` VARCHAR(32), `in_pengguna` INT)   begin 
insert into petugas values(null, in_username, in_nama, in_pengguna);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addSiswa` (IN `in_nisn` VARCHAR(10), IN `in_nis` VARCHAR(5), IN `in_nama` VARCHAR(50), IN `in_telp` VARCHAR(13), IN `in_alamat` TEXT, IN `in_kelas` INT, IN `in_spp` INT, IN `in_pengguna` INT)   begin 
insert into siswa values(null, in_nisn, in_nis, in_nama, in_telp, in_alamat, in_kelas, in_spp, in_pengguna);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePengguna` (`in_username` VARCHAR(32), `in_level` INT, `in_id_pengguna` INT)   begin 
update pengguna set username=in_username, level=in_level where id_pengguna = in_id_pengguna;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePetugas` (`in_username` VARCHAR(32), `in_nama` VARCHAR(32), `in_id_petugas` INT)   begin 
update petugas set username=in_username, nama_petugas=in_nama where id_petugas=in_id_petugas;
end$$

DELIMITER ;

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
(9, 'TKJ', 'Teknik Komputer Jaringan');

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

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `level`) VALUES
(1, 'admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 1),
(2, 'petugas', '6b3402d7cea9dfb83a5278657380082e', 2);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `nama_petugas` varchar(32) DEFAULT NULL,
  `id_pengguna` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `nama_petugas`, `id_pengguna`) VALUES
(1, 'admin', 'admin', 1),
(2, 'petugas', 'petugas', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `selectpetugas`
-- (See below for the actual view)
--
CREATE TABLE `selectpetugas` (
`id_petugas` int
,`username_petugas` varchar(32)
,`nama_petugas` varchar(32)
,`id_pengguna` int
,`username` varchar(32)
,`password` varchar(32)
,`level` int
,`id_level` int
,`keterangan` varchar(12)
);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(5) DEFAULT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `alamat` text,
  `id_kelas` int DEFAULT NULL,
  `id_spp` int DEFAULT NULL,
  `id_pengguna` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int NOT NULL,
  `tahun` int DEFAULT NULL,
  `nominal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure for view `selectpetugas`
--
DROP TABLE IF EXISTS `selectpetugas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectpetugas`  AS SELECT `p`.`id_petugas` AS `id_petugas`, `p`.`username` AS `username_petugas`, `p`.`nama_petugas` AS `nama_petugas`, `pen`.`id_pengguna` AS `id_pengguna`, `pen`.`username` AS `username`, `pen`.`password` AS `password`, `pen`.`level` AS `level`, `l`.`id_level` AS `id_level`, `l`.`keterangan` AS `keterangan` FROM ((`petugas` `p` left join `pengguna` `pen` on((`pen`.`id_pengguna` = `p`.`id_pengguna`))) left join `level` `l` on((`pen`.`level` = `l`.`id_level`)))  ;

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
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `fk_spp` (`id_spp`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_pengguna` (`id_pengguna`);

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
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_spp` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
