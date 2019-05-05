-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 05:30 AM
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
('12TKJ3-002', 'Senin', '10:45:00', '12:45:00', 'MP002', '12TKJ3', '2177', NULL, '2019-05-04 22:58:28', '2019-05-04 22:58:28'),
('12TKJ3-03', 'Selasa', '09:15:00', '11:15:00', 'MP002', '12TKJ3', '2176', NULL, '2019-05-05 04:20:15', '2019-05-05 04:20:15'),
('12TKJ3_01', 'Senin', '07:15:00', '09:15:00', 'MP001', '12TKJ3', '2172', NULL, '2019-05-04 17:26:49', '2019-05-04 17:26:49'),
('tkk-001', 'Senin', '07:45:00', '09:45:00', 'MP001', 'tkk1b', '2173', NULL, '2019-05-04 22:59:30', '2019-05-04 22:59:30');

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
('12TKJ3', '12TKJ3', 'Multimedia', ''),
('mj4a', 'mj', 'Multimedia', ''),
('mj4b', 'mj', 'Multimedia', 'diky bodok'),
('tkk1a', 'tkk', 'Teknik Kelistrikan Kapal', ''),
('tkk1b', 'tkk', 'Teknik Kelistrikan Kapal', ''),
('tpk1a', 'tpk', 'Teknik Pengelasan Kapal', '');

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
  `presensi` int(11) NOT NULL,
  `verifikasi_by` varchar(20) NOT NULL,
  `verifikasi_date` datetime NOT NULL,
  `presensi_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('4311611010', 'Ananda', 'Roy', 'Batam', '2019-04-18', 'Jhonny Astin', 'jhony@justinfilm.com', 'Kristen Khatolik', 'Tg. Uma', 'mj42', '1556036500045503500_1486041676-qureta_com.jpg', '2019-04-23 18:35:45', '2019-04-23 18:35:45', 'admin', 1);

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
('MP002', 'Matematika teknik');

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
(83, '2019-05-05 00:00:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(84, '2019-05-05 09:49:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(85, '2019-05-05 00:00:00', '12TKJ3-03', '12TKJ3-03', '5 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(86, '2019-05-05 00:00:00', '12TKJ3_01', '12TKJ3_01', '1 HOUR', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(87, '2019-05-05 09:50:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(88, '2019-05-05 09:50:00', '12TKJ3-03', '12TKJ3-03', '5 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(89, '2019-05-05 09:51:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(90, '2019-05-05 09:52:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(91, '2019-05-05 09:53:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(92, '2019-05-05 09:54:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(93, '2019-05-05 09:55:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(94, '2019-05-05 09:55:00', '12TKJ3-03', '12TKJ3-03', '5 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(95, '2019-05-05 09:56:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(96, '2019-05-05 09:57:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(97, '2019-05-05 09:58:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(98, '2019-05-05 09:59:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(99, '2019-05-05 10:00:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(100, '2019-05-05 10:00:00', '12TKJ3-03', '12TKJ3-03', '5 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(101, '2019-05-05 10:00:00', '12TKJ3_01', '12TKJ3_01', '1 HOUR', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(102, '2019-05-05 10:01:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(103, '2019-05-05 10:02:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(104, '2019-05-05 10:03:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(105, '2019-05-05 10:04:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(106, '2019-05-05 10:05:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(107, '2019-05-05 10:05:00', '12TKJ3-03', '12TKJ3-03', '5 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(108, '2019-05-05 10:06:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(109, '2019-05-05 10:07:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(110, '2019-05-05 10:08:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(111, '2019-05-05 10:09:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(112, '2019-05-05 10:10:00', '12TKJ3-03', '12TKJ3-03', '5 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(113, '2019-05-05 10:10:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(114, '2019-05-05 10:11:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(115, '2019-05-05 10:12:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(116, '2019-05-05 10:13:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(117, '2019-05-05 10:14:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(118, '2019-05-05 10:15:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(119, '2019-05-05 10:15:00', '12TKJ3-03', '12TKJ3-03', '5 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(120, '2019-05-05 10:16:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(121, '2019-05-05 10:17:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(122, '2019-05-05 10:18:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(123, '2019-05-05 10:19:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(124, '2019-05-05 10:20:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(125, '2019-05-05 10:20:00', '12TKJ3-03', '12TKJ3-03', '5 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(126, '2019-05-05 10:21:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(127, '2019-05-05 10:22:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(128, '2019-05-05 10:28:40', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(129, '2019-05-05 10:28:40', '12TKJ3-03', '12TKJ3-03', '5 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(130, '2019-05-05 10:29:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(131, '2019-05-05 10:30:00', '12TKJ3-002', '12TKJ3-002', '1 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00'),
(132, '2019-05-05 10:30:00', '12TKJ3-03', '12TKJ3-03', '5 MINUTE', '2019-05-05 00:00:00', '2019-05-06 00:00:00');

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
(10, '2173', '611fe6ad3bc639d95becf37356b0ec9a', 3, 1),
(14, '2176', 'be582f802932fa7f88fc4addabb56940', 3, 1),
(15, '2177', 'asdasdasdas', 3, 1),
(16, '2178', 'SADASDAS', 3, 1),
(17, '2179', 'adada', 3, 1),
(18, '4311611010', '827ccb0eea8a706c4c34a16891f84e7b', 4, 1);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_user`
--
ALTER TABLE `kategori_user`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_jadwal`
--
ALTER TABLE `table_jadwal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
CREATE DEFINER=`root`@`localhost` EVENT `12TKJ3_01` ON SCHEDULE EVERY 1 HOUR STARTS '2019-05-05 00:00:00' ENDS '2019-05-06 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO insert into table_jadwal values (null,now(),'12TKJ3_01','12TKJ3_01','1 HOUR','2019-05-05 00:00:00','2019-05-06 00:00:00')$$

CREATE DEFINER=`root`@`localhost` EVENT `12TKJ3-002` ON SCHEDULE EVERY 1 MINUTE STARTS '2019-05-05 00:00:00' ENDS '2019-05-06 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO insert into table_jadwal values (null,now(),'12TKJ3-002','12TKJ3-002','1 MINUTE','2019-05-05 00:00:00','2019-05-06 00:00:00')$$

CREATE DEFINER=`root`@`localhost` EVENT `12TKJ3-03` ON SCHEDULE EVERY 5 MINUTE STARTS '2019-05-05 00:00:00' ENDS '2019-05-06 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO insert into table_jadwal values (null,now(),'12TKJ3-03','12TKJ3-03','5 MINUTE','2019-05-05 00:00:00','2019-05-06 00:00:00')$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
