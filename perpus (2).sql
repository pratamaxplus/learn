-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 10:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `kd_buku` varchar(5) NOT NULL,
  `judul_buku` varchar(30) DEFAULT NULL,
  `pengarang` varchar(30) DEFAULT NULL,
  `jenis_buku` varchar(30) DEFAULT NULL,
  `kd_penerbit` varchar(6) DEFAULT NULL,
  `kd_rak` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`kd_buku`, `judul_buku`, `pengarang`, `jenis_buku`, `kd_penerbit`, `kd_rak`) VALUES
('AA001', 'PEMPROGRAMAN WEB PHP', 'TIM DOSEN UNINDRA', 'Buku Pelajaran', 'P006', 'BB001'),
('BP002', 'BAHASA INDONESIA 2', 'TIM DOSEN', 'Buku Pelajaran', 'P001', 'AA002'),
('BP003', 'BAHASA INDONESIA', 'TIM DOSEN', 'Buku Pelajaran', 'P003', 'AA005'),
('BP004', 'AKHLAK DAN ETIKA', 'H. MUHAMMAD ARIFIN, MPD', 'Buku Pelajaran', 'P003', 'BB003');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('PP0001', 'ADI PRATAMA', 'Laki-Laki', 'Pasar Minggu', '082122221'),
('PP0002', 'AUREL', 'Perempuan', 'PASAR MINGGU', '08560001'),
('PP0003', 'ADI', 'Laki-Laki', 'PASAR MINGGU', '082122');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `kode` varchar(6) NOT NULL,
  `penerbit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`kode`, `penerbit`) VALUES
('P001', 'Airlangga'),
('P002', 'GRAMEDIA'),
('P003', 'Elexmedia Komputindo'),
('P004', 'Gagas Media'),
('P005', 'Agro Media'),
('P006', 'PERSONAL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_member` varchar(10) NOT NULL,
  `kd_buku` varchar(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_member`, `kd_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES
('PP0003', 'AA001', '2020-07-12', '2020-07-18'),
('PP0003', 'BP004', '2020-07-12', '2020-07-18'),
('PP0001', 'BP003', '2020-07-12', '2020-07-18'),
('PP0001', 'BP002', '2020-07-15', '2020-07-16'),
('PP0003', 'BP002', '2020-07-15', '2020-07-18'),
('PP0002', 'BP003', '2020-07-15', '2020-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `no` int(5) NOT NULL,
  `kd_rak` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`no`, `kd_rak`) VALUES
(1, 'AA001'),
(2, 'BB001'),
(3, 'CC001'),
(4, 'DD001'),
(5, 'EE001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `level` enum('admin','member','pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `pass`, `nama_lengkap`, `email`, `level`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Adi Pratama', 'adi@gmail.com', 'admin'),
(2, 'member1', '12345', 'joko', 'joko@gmail.com', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD KEY `kd_buku` (`kd_buku`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`no`,`kd_rak`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
