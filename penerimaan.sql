-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 03:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penerimaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akun` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL,
  `created_at_date` date NOT NULL,
  `confirmed_at_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akun`, `nama`, `jenis_kelamin`, `username`, `email`, `password`, `level`, `created_at_date`, `confirmed_at_date`, `status`) VALUES
('221017101500001', 'Bambang Tri H', 'Pria', 'bambang', 'joko@gmail.com', 'bambang', 'hrd', '2020-09-20', '2020-09-20', 1),
('221017101600001', 'Kusumo Y', 'Pria', 'kusumo', 'kusumo@gmail.com', 'kusumo', 'direksi', '2020-09-20', '2020-09-20', 1),
('ADM001', 'Bambang', 'Pria', 'admin', 'admin@gmail.com', 'admin123', 'admin', '2020-09-20', '2020-09-20', 1),
('PLM001', 'Yasmin', 'Wanita', 'lalayeye', 'lala@gmail.com', 'lalayeye', 'pelamar', '2021-02-26', '2021-02-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` varchar(20) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `tempat_tl` varchar(30) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `file_foto` varchar(100) NOT NULL,
  `file_ijasah` varchar(100) NOT NULL,
  `file_ktp` varchar(100) NOT NULL,
  `file_kk` varchar(100) NOT NULL,
  `file_skck` varchar(100) DEFAULT NULL,
  `comment_skck` varchar(100) DEFAULT NULL,
  `file_inovasi` varchar(100) NOT NULL,
  `submited` tinyint(1) NOT NULL,
  `confirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `nama_depan`, `nama_belakang`, `tempat_tl`, `agama`, `jenis_kelamin`, `alamat`, `nomor_hp`, `email`, `file_foto`, `file_ijasah`, `file_ktp`, `file_kk`, `file_skck`, `comment_skck`, `file_inovasi`, `submited`, `confirmed`) VALUES
('BKS001', 'y', 'y', 'y', 'y', 'Wanita', 'y', 'y', 'lala@gmail.com', 'a313c9b878741fbe93ca65185479b60b.jpg', 'a313c9b878741fbe93ca65185479b60b.jpg', 'a313c9b878741fbe93ca65185479b60b.jpg', 'a313c9b878741fbe93ca65185479b60b.jpg', 'a313c9b878741fbe93ca65185479b60b.jpg', '', 'a313c9b878741fbe93ca65185479b60b.jpg', 1, 1),
('BKS002', 'q', 'q', 'q', 'q', 'Pria', 'q', 'q', 'y@gmail.com', 'a313c9b878741fbe93ca65185479b60b.jpg', 'a313c9b878741fbe93ca65185479b60b.jpg', 'a313c9b878741fbe93ca65185479b60b.jpg', 'a313c9b878741fbe93ca65185479b60b.jpg', 'a313c9b878741fbe93ca65185479b60b.jpg', '', 'a313c9b878741fbe93ca65185479b60b.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id_loker` varchar(20) NOT NULL,
  `keahlian` varchar(100) NOT NULL,
  `pengalaman` varchar(100) NOT NULL,
  `kualifikasi` varchar(100) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `created_at_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id_loker`, `keahlian`, `pengalaman`, `kualifikasi`, `divisi`, `jabatan`, `tema`, `created_at_date`) VALUES
('LK001', 'Programming', 'Minimal 2 Tahun.', 'Di utamakan usia 20-25 tahun.', 'Mobile Developer', 'Backend Developer', 'Revolusi industri', '2020-09-15'),
('LK002', 'Marketing', '3 Tahun berkerja sebagai Sales', 'Fresh Graduate', 'Marketing', 'Sales Marketing', 'Peningkatan Pemasaran di masa pandemi', '2020-09-12'),
('LK003', 'Coler Draw, Photoshop', '1 Tahun sebagai desainer grafis', 'Max. usia 20 tahun', 'Divisi Desainer', 'Designer Graphic', 'Inovasi Remaja Millenial', '2020-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id` int(150) NOT NULL,
  `id_akun` varchar(10) NOT NULL,
  `id_loker` varchar(20) NOT NULL,
  `id_berkas` varchar(20) NOT NULL,
  `id_ujian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id`, `id_akun`, `id_loker`, `id_berkas`, `id_ujian`) VALUES
(10, 'PLM001', 'LK003', 'BKS001', 'EXM001'),
(11, 'PLM002', 'LK003', 'BKS002', 'EXM002');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(100) NOT NULL,
  `file_soal` varchar(100) NOT NULL,
  `id_loker` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `file_soal`, `id_loker`) VALUES
(12, 'B-INGGRIS 4-Pert-2.pdf', 'LK001');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` varchar(20) NOT NULL,
  `id_loker` varchar(20) NOT NULL,
  `id_berkas` varchar(20) NOT NULL,
  `file_jawaban` varchar(100) DEFAULT NULL,
  `submited_at` date DEFAULT NULL,
  `checked` tinyint(1) DEFAULT NULL,
  `status_ujian` enum('menunggu','lolos','tidak','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `id_loker`, `id_berkas`, `file_jawaban`, `submited_at`, `checked`, `status_ujian`) VALUES
('EXM001', 'LK001', 'BKS001', 'BukuPA1_D4Tekkom_2210171015_SATRIA TARANIKA.pdf', '2021-02-26', 1, 'lolos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akun`) USING BTREE;

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
