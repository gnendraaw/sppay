-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2023 at 11:59 AM
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePengguna` (`in_id_pengguna` INT)   begin 
delete from pengguna where id_pengguna = in_id_pengguna;
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
(9, 'TKJ', 'Teknik Komputer Jaringan'),
(10, 'TPTU', 'Teknik Pendingin Tata Udara');

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
(7, 1, 2, 1, '2023-02-27', 'juli', '2023', 200000),
(8, 1, 2, 1, '2023-02-27', 'agustus', '2023', 200000),
(9, 1, 2, 1, '2023-02-27', 'september', '2023', 200000),
(10, 1, 2, 1, '2023-02-27', 'oktober', '2023', 200000),
(11, 1, 2, 1, '2023-02-27', 'november', '2023', 200000),
(12, 1, 2, 1, '2023-02-27', 'desember', '2023', 200000),
(13, 1, 3, 1, '2023-02-27', 'juli', '2023', 200000),
(14, 1, 3, 1, '2023-02-27', 'agustus', '2023', 200000),
(15, 1, 3, 1, '2023-02-27', 'september', '2023', 200000),
(16, 1, 3, 1, '2023-02-27', 'oktober', '2023', 200000),
(17, 1, 3, 1, '2023-02-27', 'november', '2023', 200000),
(18, 1, 3, 1, '2023-02-27', 'desember', '2023', 200000),
(19, 1, 3, 1, '2023-02-27', 'januari', '2023', 200000),
(20, 1, 3, 1, '2023-02-27', 'februari', '2023', 200000),
(21, 1, 3, 1, '2023-02-27', 'maret', '2023', 200000),
(22, 1, 3, 1, '2023-02-27', 'april', '2023', 200000),
(23, 1, 3, 1, '2023-02-27', 'mei', '2023', 200000),
(24, 1, 3, 1, '2023-02-27', 'juni', '2023', 200000),
(25, 1, 2, 1, '2023-02-27', 'januari', '2023', 200000),
(26, 1, 2, 1, '2023-02-27', 'februari', '2023', 200000),
(27, 1, 2, 1, '2023-02-27', 'maret', '2023', 200000),
(28, 1, 2, 1, '2023-02-27', 'april', '2023', 200000),
(29, 1, 2, 1, '2023-02-27', 'mei', '2023', 200000),
(30, 1, 2, 1, '2023-02-27', 'juni', '2023', 200000),
(38, 1, 5, 1, '2023-03-03', 'juli', '2023', 200000),
(39, 1, 5, 1, '2023-03-03', 'agustus', '2023', 200000),
(40, 1, 5, 1, '2023-03-03', 'september', '2023', 200000),
(41, 1, 5, 1, '2023-03-03', 'oktober', '2023', 200000),
(42, 1, 5, 1, '2023-03-03', 'november', '2023', 200000),
(43, 1, 5, 1, '2023-03-03', 'desember', '2023', 200000),
(44, 1, 6, 1, '2023-03-05', 'juli', '2023', 200000),
(45, 1, 6, 1, '2023-03-05', 'agustus', '2023', 200000),
(46, 1, 6, 1, '2023-03-05', 'september', '2023', 200000),
(47, 1, 6, 1, '2023-03-05', 'oktober', '2023', 200000),
(48, 1, 6, 1, '2023-03-05', 'november', '2023', 200000),
(49, 1, 6, 1, '2023-03-05', 'desember', '2023', 200000);

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
(2, 'petugas', '482c811da5d5b4bc6d497ffa98491e38', 2),
(4, '2880', 'f1beaf277a0ba2efdec5ed4ce8f5435b', 3),
(5, '28911', 'f1beaf277a0ba2efdec5ed4ce8f5435b', 3),
(7, '88888', 'f1beaf277a0ba2efdec5ed4ce8f5435b', 3),
(8, '97532', 'f1beaf277a0ba2efdec5ed4ce8f5435b', 3);

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
-- Stand-in structure for view `selectallpembayaran`
-- (See below for the actual view)
--
CREATE TABLE `selectallpembayaran` (
`alamat` text
,`id_kelas` int
,`id_pembayaran` int
,`id_siswa` int
,`id_spp` int
,`jumlah_bayar` int
,`kompetensi_keahlian` varchar(64)
,`nama_kelas` varchar(32)
,`nama_siswa` varchar(50)
,`nis` varchar(5)
,`nisn` varchar(10)
,`no_telp` varchar(13)
,`nominal` int
,`tahun` varchar(9)
,`tahun_bayar` varchar(4)
,`tgl_bayar` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `selectallsiswa`
-- (See below for the actual view)
--
CREATE TABLE `selectallsiswa` (
`alamat` text
,`id_kelas` int
,`id_pengguna` int
,`id_siswa` int
,`id_spp` int
,`kompetensi_keahlian` varchar(64)
,`level` int
,`nama_kelas` varchar(32)
,`nama_siswa` varchar(50)
,`nis` varchar(5)
,`nisn` varchar(10)
,`no_telp` varchar(13)
,`nominal` int
,`password` varchar(32)
,`tahun` varchar(9)
,`username` varchar(32)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `selectpetugas`
-- (See below for the actual view)
--
CREATE TABLE `selectpetugas` (
`id_level` int
,`id_pengguna` int
,`id_petugas` int
,`keterangan` varchar(12)
,`level` int
,`nama_petugas` varchar(32)
,`password` varchar(32)
,`username` varchar(32)
,`username_petugas` varchar(32)
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

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nis`, `nama_siswa`, `no_telp`, `alamat`, `id_kelas`, `id_spp`, `id_pengguna`) VALUES
(2, '0053638888', '2880', 'I Gede Tio Mahesa Diputra', '0812345678899', 'dalung, kuta utara, badung, bali', 2, 1, 4),
(3, '0053637777', '28911', 'Ridho Christian Sanjaya', '0812355555555', 'bengkel PAG mantap', 2, 1, 5),
(5, '5102858941', '88888', 'budi irawan', '0812345678901', 'alamat budi irawan', 9, 1, 7),
(6, '9758372878', '97532', 'Ari Mahendra Yuda', '0812345677899', 'Dalung Permai, Kuta Utara, Badung, Bali', 10, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int NOT NULL,
  `tahun` varchar(9) DEFAULT NULL,
  `nominal` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, '2022/2023', 200000),
(2, '2023/2024', 350000);

-- --------------------------------------------------------

--
-- Structure for view `selectallpembayaran`
--
DROP TABLE IF EXISTS `selectallpembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectallpembayaran`  AS SELECT `pembayaran`.`id_pembayaran` AS `id_pembayaran`, `pembayaran`.`tgl_bayar` AS `tgl_bayar`, `pembayaran`.`tahun_bayar` AS `tahun_bayar`, `pembayaran`.`jumlah_bayar` AS `jumlah_bayar`, `siswa`.`id_siswa` AS `id_siswa`, `siswa`.`nisn` AS `nisn`, `siswa`.`nis` AS `nis`, `siswa`.`nama_siswa` AS `nama_siswa`, `siswa`.`no_telp` AS `no_telp`, `siswa`.`alamat` AS `alamat`, `spp`.`id_spp` AS `id_spp`, `spp`.`tahun` AS `tahun`, `spp`.`nominal` AS `nominal`, `kelas`.`id_kelas` AS `id_kelas`, `kelas`.`nama_kelas` AS `nama_kelas`, `kelas`.`kompetensi_keahlian` AS `kompetensi_keahlian` FROM (((`pembayaran` left join `siswa` on((`siswa`.`id_siswa` = `pembayaran`.`id_siswa`))) left join `kelas` on((`siswa`.`id_kelas` = `kelas`.`id_kelas`))) left join `spp` on((`spp`.`id_spp` = `siswa`.`id_spp`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `selectallsiswa`
--
DROP TABLE IF EXISTS `selectallsiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `selectallsiswa`  AS SELECT `siswa`.`id_siswa` AS `id_siswa`, `siswa`.`nisn` AS `nisn`, `siswa`.`nis` AS `nis`, `siswa`.`nama_siswa` AS `nama_siswa`, `siswa`.`no_telp` AS `no_telp`, `siswa`.`alamat` AS `alamat`, `spp`.`id_spp` AS `id_spp`, `spp`.`tahun` AS `tahun`, `spp`.`nominal` AS `nominal`, `kelas`.`id_kelas` AS `id_kelas`, `kelas`.`nama_kelas` AS `nama_kelas`, `kelas`.`kompetensi_keahlian` AS `kompetensi_keahlian`, `pengguna`.`id_pengguna` AS `id_pengguna`, `pengguna`.`username` AS `username`, `pengguna`.`password` AS `password`, `pengguna`.`level` AS `level` FROM (((`siswa` left join `spp` on((`siswa`.`id_spp` = `spp`.`id_spp`))) left join `kelas` on((`siswa`.`id_kelas` = `kelas`.`id_kelas`))) left join `pengguna` on((`siswa`.`id_pengguna` = `pengguna`.`id_pengguna`)))  ;

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
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
