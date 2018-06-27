-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2018 at 05:52 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prakweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nip` varchar(12) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`nip`, `nama_dosen`, `jk`, `alamat`) VALUES
('72001', 'Faisal', 'Laki-laki', 'Jl. Hasanuddin'),
('72003', 'Andy', 'Laki-laki', 'Jl. Burung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nim`, `nama`, `jk`, `angkatan`, `alamat`) VALUES
('602003', 'Ambo Aco', 'Laki-laki', '2015', 'Jl. M. Yamin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mk`
--

CREATE TABLE `tb_mk` (
  `kd_mk` varchar(12) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int(2) NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mk`
--

INSERT INTO `tb_mk` (`kd_mk`, `nama_mk`, `sks`, `semester`) VALUES
('m002', 'Grafkom', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` varchar(12) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `kd_mk` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `nip`, `nim`, `kd_mk`) VALUES
('tr001', '72001', '602003', 'm002'),
('tr005', '72003', '602003', 'm002');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi` (
`id` varchar(12)
,`nip` varchar(12)
,`nama_dosen` varchar(50)
,`nim` varchar(12)
,`nama` varchar(50)
,`kd_mk` varchar(12)
,`nama_mk` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS  select `t`.`id` AS `id`,`d`.`nip` AS `nip`,`d`.`nama_dosen` AS `nama_dosen`,`m`.`nim` AS `nim`,`m`.`nama` AS `nama`,`mk`.`kd_mk` AS `kd_mk`,`mk`.`nama_mk` AS `nama_mk` from (((`tb_transaksi` `t` join `tb_mk` `mk`) join `tb_mahasiswa` `m`) join `tb_dosen` `d`) where ((`t`.`nim` = `m`.`nim`) and (`t`.`nip` = `d`.`nip`) and (`t`.`kd_mk` = `mk`.`kd_mk`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_mk`
--
ALTER TABLE `tb_mk`
  ADD PRIMARY KEY (`kd_mk`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`),
  ADD KEY `kd_dosen` (`kd_mk`),
  ADD KEY `nip` (`nip`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tb_mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`kd_mk`) REFERENCES `tb_mk` (`kd_mk`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
