-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 09:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_bantuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'danypradana', '21232f297a57a5a743894a0e4a801fc3', 'Dany Pradana');

-- --------------------------------------------------------

--
-- Table structure for table `himpunan`
--

CREATE TABLE `himpunan` (
  `id_himpunan` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `namahimpunan` varchar(100) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `himpunan`
--

INSERT INTO `himpunan` (`id_himpunan`, `id_kriteria`, `namahimpunan`, `nilai`, `keterangan`) VALUES
(25, 1, 'Tidak Lulus SD', '25', 'Sangat Baik'),
(26, 1, 'SD-SMA', '50', 'Baik'),
(27, 1, 'S1', '75', 'Cukup'),
(28, 1, 'S2-S3', '100', 'Kurang'),
(29, 2, 'Rp. 0 / Tidak ada pekerjaan', '25', 'Sangat Baik'),
(30, 2, 'Rp. 1.500.000 - Rp. 2.500.000', '50', 'Baik'),
(31, 2, 'Rp. 2.600.000 - Rp. 5.000.000', '75', 'Cukup'),
(32, 2, 'Penghasilan > Rp. 5.000.000', '100', 'Kurang'),
(33, 3, 'Lantai: Tanah, Tembok: Kayu, Atap: Bocor', '25', 'Sangat Baik'),
(34, 3, 'Lantai: Tanah, Tembok: Beton, Atap: Bocor', '50', 'Baik'),
(35, 3, 'Lantai: Beton, Tembok: Beton, Atap: Tidak Bocor', '75', 'Cukup'),
(36, 3, 'Lantai: Keramik, Tembok: Keramik, Atap: Tidak Bocor', '100', 'Kurang'),
(37, 4, '1 anak', '25', 'Kurang'),
(38, 4, '2-3 Anak', '50', 'Cukup'),
(39, 4, '4 Anak', '75', 'Baik'),
(40, 4, 'Jml. Tanggungan > 5 Anak', '100', 'Sangat Baik'),
(41, 5, 'Usia < 21 Tahun', '25', 'Kurang'),
(42, 5, '21 - 30 Tahun', '50', 'Cukup'),
(43, 5, '31 - 40 Tahun', '75', 'Baik'),
(44, 5, 'Usia > 40 Tahun', '100', 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(5) NOT NULL,
  `id_penerima` varchar(10) DEFAULT NULL,
  `jml_tanggungan` double NOT NULL,
  `pend_terakhir` double DEFAULT NULL,
  `penghasilan_ortu` double NOT NULL,
  `kond_rumah` double DEFAULT NULL,
  `usia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `id_penerima`, `jml_tanggungan`, `pend_terakhir`, `penghasilan_ortu`, `kond_rumah`, `usia`) VALUES
(26, 'CPB-000001', 100, 25, 25, 25, 100),
(27, 'CPB-000002', 25, 25, 50, 25, 100),
(28, 'CPB-000003', 25, 100, 100, 100, 100),
(29, 'CPB-000004', 50, 50, 50, 75, 50),
(30, 'CPB-000005', 75, 50, 50, 75, 75),
(31, 'CPB-000006', 25, 75, 100, 100, 50),
(32, 'CPB-000007', 50, 50, 100, 100, 100),
(33, 'CPB-000008', 100, 75, 100, 100, 100),
(34, 'CPB-000009', 25, 25, 75, 100, 25),
(36, 'CPB-000010', 100, 50, 100, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `namakriteria` varchar(100) NOT NULL,
  `atribut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `namakriteria`, `atribut`) VALUES
(1, 'Pendidikan Terakhir', 'Cost'),
(2, 'Penghasilan', 'Cost'),
(3, 'Kondisi Rumah', 'Cost'),
(4, 'Jumlah Tanggungan', 'Benefit'),
(5, 'Usia', 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` varchar(10) NOT NULL,
  `nama_penerima` varchar(100) DEFAULT NULL,
  `asal` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`id_penerima`, `nama_penerima`, `asal`) VALUES
('CPB-000001', 'Paijan', 'Kebumen'),
('CPB-000002', 'Parsono', 'Kebumen'),
('CPB-000003', 'Sartino', 'Kebumen'),
('CPB-000004', 'Tomin', 'Kebumen'),
('CPB-000005', 'Samiran', 'Kebumen'),
('CPB-000006', 'Tukijan', 'Kebumen'),
('CPB-000007', 'Tolibin', 'Kebumen'),
('CPB-000008', 'Mustopa', 'Kebumen'),
('CPB-000009', 'Parimin', 'Kebumen'),
('CPB-000010', 'Bariman', 'Kebumen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `himpunan`
--
ALTER TABLE `himpunan`
  ADD PRIMARY KEY (`id_himpunan`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `himpunan`
--
ALTER TABLE `himpunan`
  MODIFY `id_himpunan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id_klasifikasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
