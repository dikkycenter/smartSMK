-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 07:53 PM
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
-- Table structure for table `data_absensi`
--

CREATE TABLE `data_absensi` (
  `id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `absensi` varchar(50) NOT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  `verifikasi_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_isikelas`
--

CREATE TABLE `data_isikelas` (
  `id_isikelas` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `id_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `id_mapel` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_pengajar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `nama_kelas`, `keterangan`) VALUES
('1', 'mja', 'mja');

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
('2171', 'DIKY', 'SATRIA', 'DUMAI', '1996-04-08', 'BATAM CENTRE', 'ISLAM', 'dikkycenter@gmail.com', 'S.Tr.T', 'foto.jpg', 1),
('2172', 'SUCI', 'NOVITASARI', 'BATAM', '0000-00-00', 'Batam', 'Islam', 'soecinovitasari@yahoo.com', 'S.I', '119182.jpg', 1),
('2173', 'ANANDA', 'ROY', 'BATAM', '0000-00-00', 'DUMAI', 'Islam', 'sucinovitasari96@gmail.com', 'S.I', '119181.jpg', 1),
('2174', '', 'ROMI', 'ALI JASMANTO', '0000-00-00', 'BATAM', 'Islam', 'romi96@gmail.com', 'S.I', '119181.jpg', 1),
('2175', 'KEVIN', 'JULIONO', 'DUMAI', '2019-03-14', 'BATAM', 'Islam', 'kevin@gmail.com', 'S.I', '119182.jpg', 1);

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
  `password` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, '2171', '3165163', 3, 1),
(9, '2172', 'sadasdasdsad', 3, 1),
(10, '2173', 'SADASDASDAS', 3, 1),
(11, '2174', 'asdasdasdas', 3, 1),
(12, '2175', 'sadasdasd', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_absensi`
--
ALTER TABLE `data_absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `data_isikelas`
--
ALTER TABLE `data_isikelas`
  ADD PRIMARY KEY (`id_isikelas`),
  ADD KEY `nis` (`nis`,`id_kelas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_mapel` (`id_mapel`,`id_kelas`,`id_pengajar`),
  ADD KEY `id_pengajar` (`id_pengajar`),
  ADD KEY `id_kelas` (`id_kelas`);

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
-- AUTO_INCREMENT for table `data_absensi`
--
ALTER TABLE `data_absensi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_isikelas`
--
ALTER TABLE `data_isikelas`
  MODIFY `id_isikelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_user`
--
ALTER TABLE `kategori_user`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_absensi`
--
ALTER TABLE `data_absensi`
  ADD CONSTRAINT `data_absensi_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `data_jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_isikelas`
--
ALTER TABLE `data_isikelas`
  ADD CONSTRAINT `data_isikelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `data_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_isikelas_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `data_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD CONSTRAINT `data_jadwal_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_jadwal_ibfk_2` FOREIGN KEY (`id_pengajar`) REFERENCES `data_pengajar` (`nip_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_jadwal_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `data_isikelas` (`id_isikelas`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`kategori_user`) REFERENCES `kategori_user` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`username`) REFERENCES `data_pengajar` (`nip_pengajar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
