-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 01:47 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jajalku`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(5) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `jenis_kelamin`, `asal_sekolah`) VALUES
('kr001', 'wahyudi', 'L', 'smp muh pundong'),
('kr002', 'suharni', 'L', 'Smp muh 2 Bantul'),
('kr003', 'sunanto', 'L', 'smp muh kadisoro'),
('kr004', 'hernanto', 'L', 'smp muh 2 dlingo'),
('kr005', 'sukardi', 'L', 'smp piyungan'),
('kr006', 'farid', 'L', 'sanden'),
('kr007', 'maimunah', 'P', 'surabaya'),
('kr009', 'kurniawan', 'L', 'pajangan');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(20) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`) VALUES
('kr001', 'tes tertulis', 0.4),
('kr002', 'sholat fardhu', 0.2),
('kr003', 'Al Quran', 0.1),
('kr004', 'Bersuci', 0.1),
('kr006', 'shalat Jenazah', 0.1),
('kr007', 'kemuhammadiyahan', 0.05),
('kr008', 'Organisasi', 0.05);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_matrik`
--

CREATE TABLE `nilai_matrik` (
  `id_matrik` int(7) NOT NULL,
  `id_guru` varchar(5) NOT NULL,
  `id_kriteria` varchar(5) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_matrik`
--

INSERT INTO `nilai_matrik` (`id_matrik`, `id_guru`, `id_kriteria`, `nilai`) VALUES
(828, 'kr001', 'kr001', 8),
(829, 'kr001', 'kr002', 7),
(830, 'kr001', 'kr003', 6),
(831, 'kr001', 'kr004', 5),
(832, 'kr001', 'kr006', 4),
(833, 'kr001', 'kr007', 4),
(834, 'kr001', 'kr008', 4),
(835, 'kr002', 'kr001', 8),
(836, 'kr002', 'kr002', 8),
(837, 'kr002', 'kr003', 7),
(838, 'kr002', 'kr004', 8),
(839, 'kr002', 'kr006', 8),
(840, 'kr002', 'kr007', 8),
(841, 'kr002', 'kr008', 7),
(842, 'kr003', 'kr001', 5),
(843, 'kr003', 'kr002', 5),
(844, 'kr003', 'kr003', 5),
(845, 'kr003', 'kr004', 6),
(846, 'kr003', 'kr006', 5),
(847, 'kr003', 'kr007', 5),
(848, 'kr003', 'kr008', 5),
(849, 'kr004', 'kr001', 9),
(850, 'kr004', 'kr002', 8),
(851, 'kr004', 'kr003', 7),
(852, 'kr004', 'kr004', 6),
(853, 'kr004', 'kr006', 9),
(854, 'kr004', 'kr007', 9),
(855, 'kr004', 'kr008', 9),
(856, 'kr005', 'kr001', 4),
(857, 'kr005', 'kr002', 4),
(858, 'kr005', 'kr003', 4),
(859, 'kr005', 'kr004', 3),
(860, 'kr005', 'kr006', 5),
(861, 'kr005', 'kr007', 4),
(862, 'kr005', 'kr008', 4),
(863, 'kr006', 'kr001', 7),
(864, 'kr006', 'kr002', 6),
(865, 'kr006', 'kr003', 9),
(866, 'kr006', 'kr004', 8),
(867, 'kr006', 'kr006', 8),
(868, 'kr006', 'kr007', 8),
(869, 'kr006', 'kr008', 7),
(870, 'kr007', 'kr001', 9),
(871, 'kr007', 'kr002', 8),
(872, 'kr007', 'kr003', 4),
(873, 'kr007', 'kr004', 7),
(874, 'kr007', 'kr006', 7),
(875, 'kr007', 'kr007', 6),
(876, 'kr007', 'kr008', 8),
(877, 'kr008', 'kr001', 4),
(878, 'kr008', 'kr002', 3),
(879, 'kr008', 'kr003', 4),
(880, 'kr008', 'kr004', 4),
(881, 'kr008', 'kr006', 4),
(882, 'kr008', 'kr007', 8),
(883, 'kr008', 'kr008', 10),
(884, 'kr009', 'kr001', 8),
(885, 'kr009', 'kr002', 8),
(886, 'kr009', 'kr003', 7),
(887, 'kr009', 'kr004', 7),
(888, 'kr009', 'kr006', 7),
(889, 'kr009', 'kr007', 7),
(890, 'kr009', 'kr008', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `id_preferensi` int(7) NOT NULL,
  `id_guru` varchar(5) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `level_user` varchar(40) NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'member', 'aa08769cdcb26674c6706093503ff0a3', 'member'),
(3, 'guru', '77e69c137812518e359196bb2f5e9bb9', 'guru'),
(12, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 'kepala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  ADD PRIMARY KEY (`id_matrik`);

--
-- Indexes for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  ADD PRIMARY KEY (`id_preferensi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  MODIFY `id_matrik` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=891;
--
-- AUTO_INCREMENT for table `nilai_preferensi`
--
ALTER TABLE `nilai_preferensi`
  MODIFY `id_preferensi` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
