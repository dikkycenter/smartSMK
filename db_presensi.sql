-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 12:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `id_mapel` varchar(50) NOT NULL,
  `id_kelas` varchar(50) NOT NULL,
  `id_pengajar` varchar(50) NOT NULL,
  `id_pengajar2` varchar(50) DEFAULT NULL,
  `input_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `hari`, `start`, `end`, `id_mapel`, `id_kelas`, `id_pengajar`, `id_pengajar2`, `input_date`, `update_date`) VALUES
('11PGA_001', 'Senin', '07:15:00', '09:45:00', 'MP001', '11PGA', '2172', NULL, '2019-05-07 17:25:22', '2019-05-07 17:25:22'),
('11PGA_002', 'Senin', '10:00:00', '11:45:00', 'MP004', '11PGA', '2173', NULL, '2019-05-07 17:35:06', '2019-05-07 17:35:06'),
('11PGA_003', 'Senin', '13:15:00', '14:15:00', 'MP002', '11PGA', '2177', NULL, '2019-05-07 17:30:10', '2019-05-07 17:30:10'),
('12MJA_001', 'Senin', '10:00:00', '11:45:00', 'MP001', '12MJA', '2172', NULL, '2019-05-07 17:16:22', '2019-05-07 17:16:22'),
('12MJA_002', 'Senin', '07:15:00', '09:45:00', 'MP002', '12MJA', '2177', NULL, '2019-05-07 17:31:49', '2019-05-07 17:31:49'),
('12MJA_003', 'Senin', '13:15:00', '14:15:00', 'MP004', '12MJA', '2173', NULL, '2019-05-07 17:33:13', '2019-05-07 17:33:13'),
('12MJB_001', 'Senin', '13:15:00', '14:15:00', 'MP001', '12MJB', '2172', NULL, '2019-05-07 17:21:02', '2019-05-07 17:21:02'),
('12MJB_002', 'Senin', '07:15:00', '09:45:00', 'MP004', '12MJB', '2173', NULL, '2019-05-07 17:38:02', '2019-05-07 17:38:02'),
('12MJB_003', 'Senin', '10:00:00', '11:45:00', 'MP002', '12MJB', '2177', NULL, '2019-05-07 17:42:24', '2019-05-07 17:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `nama_kelas`, `nama_jurusan`, `keterangan`) VALUES
('11PGA', '11PGA', 'Produksi Grafika', ''),
('12MJA', '12MJA', 'Multimedia', ''),
('12MJB', '12MJB', 'Multimedia', ''),
('12TPA', '12TPA', 'Teknik Pemesinan', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengajar`
--

CREATE TABLE `data_pengajar` (
  `nip_pengajar` varchar(20) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `gelar` varchar(30) NOT NULL,
  `foto_pengajar` text NOT NULL,
  `status_pengajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengajar`
--

INSERT INTO `data_pengajar` (`nip_pengajar`, `nama_depan`, `nama_belakang`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `email`, `gelar`, `foto_pengajar`, `status_pengajar`) VALUES
('2172', 'SUCI', 'NOVITASARI', 'BATAM', '1970-01-01', 'Batam', 'Budha', 'soecinovitasari@yahoo.com', 'S.I', '119182.jpg', 1),
('2173', 'ANANDA', 'ROY', 'BATAM', '0000-00-00', 'DUMAI', 'Islam', 'sucinovitasari96@gmail.com', 'S.I', '119181.jpg', 1),
('2176', 'SUCI', 'JULIONO', 'BATAM', '2019-03-07', 'Batam', 'Islam', 'administrator@admin.com', 'S.IP', 'Key-01.png', 1),
('2177', 'DIKY', 'CAVE', 'DUMAI', '2019-03-29', 'BATAM', 'Islam', 'dikygazali@gmail.com', 'S.IP', 'batam2.jpg', 1),
('2178', 'ROY', 'ANANDA', 'BATAM', '2019-03-22', 'BATAM', 'Islam', 'administrator@admin.com', 'S.IP', '1553977670awan-di-langit_20180416_203622.jpg', 1),
('2179', 'KEVIN', 'ANANDA', 'BATAM', '2019-03-08', 'Batam', 'Islam', 'administrator@admin.com', 'S.IP', '155398008801_3000.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_presensi`
--

CREATE TABLE `data_presensi` (
  `id` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `presensi` varchar(11) NOT NULL,
  `verifikasi_by` varchar(20) NOT NULL,
  `verifikasi_date` datetime NOT NULL,
  `presensi_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_presensi`
--

INSERT INTO `data_presensi` (`id`, `tanggal`, `id_jadwal`, `nis`, `presensi`, `verifikasi_by`, `verifikasi_date`, `presensi_by`) VALUES
(365, '2019-05-12 11:55:57', '190', '001', 'Hadir', '', '0000-00-00 00:00:00', '2173'),
(366, '2019-05-12 11:55:57', '190', '002', 'Hadir', '', '0000-00-00 00:00:00', '2173'),
(367, '2019-05-12 11:55:57', '190', '009', 'Hadir', '', '0000-00-00 00:00:00', '2173');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `nis` varchar(20) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_wali` varchar(100) NOT NULL,
  `email_wali` text NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `input_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`nis`, `nama_depan`, `nama_belakang`, `tempat_lahir`, `tanggal_lahir`, `nama_wali`, `email_wali`, `agama`, `alamat`, `kelas`, `foto`, `input_date`, `update_date`, `update_by`, `status`) VALUES
('001', 'ADIL', '', 'BATAM', '2019-04-28', 'DIKY BOCIL', 'adil@smk.com', 'Islam', 'batam', '11PGA', 'avatar.png', '2019-05-07 16:52:18', '2019-05-07 16:52:18', 'admin', 1),
('002', 'MIKO', '', 'BATAM', '2019-04-28', 'WIRO', 'miko@smk.com', 'Islam', 'batam', '11PGA', 'avatar.png', '2019-05-07 16:53:39', '2019-05-07 16:53:39', 'admin', 1),
('003', 'aziza', '', 'BATAM', '2019-04-28', 'DOYOK', 'aziza@smk.com', 'Islam', 'BATAM', '12MJA', 'avatar.png', '2019-05-07 16:55:01', '2019-05-07 16:55:01', 'admin', 1),
('004', 'dian', '', 'bATAM', '2019-04-28', 'JONY', 'dian@smk.com', 'Islam', 'BATAM', '12MJA', 'avatar.png', '2019-05-07 16:56:04', '2019-05-07 16:56:04', 'admin', 1),
('005', 'BENY', '', 'BATAM', '2019-05-03', 'GOGO`', 'beny@smk.com', 'Islam', 'BATAM', '12MJB', 'avatar.png', '2019-05-07 16:57:30', '2019-05-07 16:57:30', 'admin', 1),
('006', 'MIKO', '', 'BATAM', '2019-04-28', 'GEGE', 'miko@smk.com', 'Islam', 'BATAM', '12MJB', 'avatar.png', '2019-05-07 16:58:21', '2019-05-07 16:58:21', 'admin', 1),
('007', 'EPSOM', '', 'BATAM', '2019-04-28', 'RRE', 'rere@smk.com', 'Islam', 'BATAM', '12TPA', 'avatar.png', '2019-05-07 16:59:06', '2019-05-07 16:59:06', 'admin', 1),
('008', 'OBONG', '', 'BATAM', '2019-04-28', 'BOBOK', 'bobok@smk.com', 'Islam', 'BATAM', '12TPA', 'avatar.png', '2019-05-07 16:59:58', '2019-05-07 16:59:58', 'admin', 1),
('009', 'SATRIANI', 'SATRIA', 'DUMAI', '2019-05-24', 'DIKY GANS', 'diky@gmail.com', 'Islam', 'batam', '11PGA', 'avatar.png', '2019-05-11 10:36:35', '2019-05-11 10:36:35', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_walikelas`
--

CREATE TABLE `data_walikelas` (
  `nip_pengajar` varchar(20) NOT NULL,
  `id_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_user`
--

CREATE TABLE `kategori_user` (
  `id_kategori` int(11) NOT NULL,
  `user_kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_user`
--

INSERT INTO `kategori_user` (`id_kategori`, `user_kategori`, `keterangan`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Wali Kelas', 'Wali Kelas'),
(3, 'Pengajar', 'Pengajar'),
(4, 'Siswa', 'Siswa - Siswi');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` varchar(20) NOT NULL,
  `mapel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `mapel`) VALUES
('MP001', 'Teknik Jaringan'),
('MP002', 'Matematika teknik'),
('MP003', 'PERANGKAT KERAS'),
('MP004', 'KEWARGANEGARAAN');

-- --------------------------------------------------------

--
-- Table structure for table `table_jadwal`
--

CREATE TABLE `table_jadwal` (
  `id` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  `nama_event` varchar(20) NOT NULL,
  `intval` varchar(20) NOT NULL,
  `starts` datetime NOT NULL,
  `ends` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_jadwal`
--

INSERT INTO `table_jadwal` (`id`, `tanggal`, `id_jadwal`, `nama_event`, `intval`, `starts`, `ends`) VALUES
(175, '2019-05-06 00:00:00', '11PGA_002', '11PGA_002', '1 DAY', '2019-05-06 00:00:00', '2019-05-07 00:00:00'),
(176, '2019-05-07 00:00:00', '11PGA_002', '11PGA_002', '1 DAY', '2019-05-07 00:00:00', '2019-05-08 00:00:00'),
(177, '2019-05-06 00:00:00', '11PGA_001', '11PGA_001', '1 WEEK', '2019-05-06 00:00:00', '2019-05-07 00:00:00'),
(178, '2019-05-07 00:00:00', '11PGA_003', '11PGA_003', '1 WEEK', '2019-05-07 00:00:00', '2019-05-08 00:00:00'),
(179, '2019-05-07 00:00:00', '12MJA_001', '12MJA_001', '1 WEEK', '2019-05-07 00:00:00', '2019-05-14 00:00:00'),
(180, '2019-05-07 00:00:00', '12MJA_002', '12MJA_002', '1 WEEK', '2019-05-07 00:00:00', '2019-05-31 00:00:00'),
(181, '2019-05-12 00:00:00', '12MJA_003', '12MJA_003', '1 WEEK', '2019-05-12 00:00:00', '2019-05-31 00:00:00'),
(182, '2019-05-07 00:00:00', '12MJB_001', '12MJB_001', '1 WEEK', '2019-05-07 00:00:00', '2019-05-31 00:00:00'),
(183, '2019-05-07 00:00:00', '12MJB_002', '12MJB_002', '1 WEEK', '2019-05-07 00:00:00', '2019-05-31 00:00:00'),
(184, '2019-05-08 00:00:00', '12MJB_003', '12MJB_003', '1 WEEK', '2019-05-08 00:00:00', '2019-05-31 00:00:00'),
(185, '2019-05-08 00:00:00', '11PGA_002', '11PGA_002', '1 DAY', '2019-05-07 00:00:00', '2019-05-08 00:00:00'),
(186, '2019-05-08 00:00:00', '12MJB_003', '12MJB_003', '1 WEEK', '2019-05-08 00:00:00', '2019-05-31 00:00:00'),
(187, '2019-05-09 21:31:00', '11PGA_003', '11PGA_003', '1 WEEK', '2019-05-07 00:00:00', '2019-05-08 00:00:00'),
(188, '2019-05-10 00:00:00', '11PGA_003', '11PGA_003', '1 WEEK', '2019-05-07 00:00:00', '2019-05-08 00:00:00'),
(189, '2019-05-11 00:00:00', '11PGA_001', '11PGA_001', '1 DAY', '2019-05-11 00:00:00', '2019-05-14 00:00:00'),
(190, '2019-05-12 00:00:00', '11PGA_002', '11PGA_002', '1 HOUR', '2019-05-12 00:00:00', '2019-05-13 00:00:00'),
(191, '2019-05-11 00:00:00', '11PGA_003', '11PGA_003', '1 HOUR', '2019-05-11 00:00:00', '2019-05-18 00:00:00'),
(192, '2019-05-12 14:46:29', '11PGA_002', '11PGA_002', '1 HOUR', '2019-05-12 00:00:00', '2019-05-13 00:00:00'),
(193, '2019-05-12 15:00:00', '11PGA_003', '11PGA_003', '1 HOUR', '2019-05-11 00:00:00', '2019-05-18 00:00:00'),
(194, '2019-05-12 16:00:00', '11PGA_003', '11PGA_003', '1 HOUR', '2019-05-11 00:00:00', '2019-05-18 00:00:00'),
(195, '2019-05-12 17:00:00', '11PGA_003', '11PGA_003', '1 HOUR', '2019-05-11 00:00:00', '2019-05-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `kategori_user` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `kategori_user`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(9, '2172', '21232f297a57a5a743894a0e4a801fc3', 3, 1),
(10, '2173', '21232f297a57a5a743894a0e4a801fc3', 3, 1),
(14, '2176', '21232f297a57a5a743894a0e4a801fc3', 3, 1),
(15, '2177', '21232f297a57a5a743894a0e4a801fc3', 3, 1),
(16, '2178', 'SADASDAS', 3, 1),
(17, '2179', 'adada', 3, 1),
(18, '4311611010', '827ccb0eea8a706c4c34a16891f84e7b', 4, 1),
(19, '001', '202cb962ac59075b964b07152d234b70', 4, 1),
(20, '002', '202cb962ac59075b964b07152d234b70', 4, 1),
(21, '003', '202cb962ac59075b964b07152d234b70', 4, 1),
(22, '004', '202cb962ac59075b964b07152d234b70', 4, 1),
(23, '005', '202cb962ac59075b964b07152d234b70', 4, 1),
(24, '006', '202cb962ac59075b964b07152d234b70', 4, 1),
(25, '007', '202cb962ac59075b964b07152d234b70', 4, 1),
(26, '008', '202cb962ac59075b964b07152d234b70', 4, 1),
(27, '009', '166450042d16bd4a7c19ea7f02bc067d', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `data_pengajar`
--
ALTER TABLE `data_pengajar`
  ADD PRIMARY KEY (`nip_pengajar`);

--
-- Indexes for table `data_presensi`
--
ALTER TABLE `data_presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `data_walikelas`
--
ALTER TABLE `data_walikelas`
  ADD KEY `nip_pengajar` (`nip_pengajar`,`id_kelas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kategori_user`
--
ALTER TABLE `kategori_user`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `table_jadwal`
--
ALTER TABLE `table_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`,`kategori_user`),
  ADD KEY `kategori_user` (`kategori_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_presensi`
--
ALTER TABLE `data_presensi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT for table `kategori_user`
--
ALTER TABLE `kategori_user`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_jadwal`
--
ALTER TABLE `table_jadwal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_walikelas`
--
ALTER TABLE `data_walikelas`
  ADD CONSTRAINT `data_walikelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `data_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_walikelas_ibfk_2` FOREIGN KEY (`nip_pengajar`) REFERENCES `data_pengajar` (`nip_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`kategori_user`) REFERENCES `kategori_user` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `11PGA_003` ON SCHEDULE EVERY 1 HOUR STARTS '2019-05-11 00:00:00' ENDS '2019-05-18 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO insert into table_jadwal values (null,now(),'11PGA_003','11PGA_003','1 HOUR','2019-05-11 00:00:00','2019-05-18 00:00:00')$$

CREATE DEFINER=`root`@`localhost` EVENT `11PGA_001` ON SCHEDULE EVERY 1 DAY STARTS '2019-05-11 00:00:00' ENDS '2019-05-14 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO insert into table_jadwal values (null,now(),'11PGA_001','11PGA_001','1 DAY','2019-05-11 00:00:00','2019-05-14 00:00:00')$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
