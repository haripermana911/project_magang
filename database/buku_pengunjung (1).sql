-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2019 pada 07.06
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_pengunjung`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_feedback_ard` ()  BEGIN
SELECT COUNT(*) AS jumlah FROM feedback WHERE untuk = 'ARD';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_feedback_ga` ()  BEGIN
SELECT COUNT(*) AS jumlah FROM feedback WHERE untuk = 'GA';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `jumlah_feedback_it` ()  BEGIN
SELECT COUNT(*) AS jumlah FROM feedback WHERE untuk = 'IT';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(225) NOT NULL,
  `nama_karyawan` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(225) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `no_telepon` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `jenis_kelamin`, `alamat`, `no_telepon`) VALUES
(2, '120947018927', 'abcdefg', 'Perempuan', '2hasa', '8027140127'),
(3, '9825193', 'ioahfa', 'Perempuan', 'lawDNHADKL', '897412510257');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `untuk` varchar(255) DEFAULT NULL,
  `kritik_saran` text,
  `biaya_feedback` varchar(255) DEFAULT NULL,
  `waktu_feedback` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `nik`, `untuk`, `kritik_saran`, `biaya_feedback`, `waktu_feedback`) VALUES
(1, '.120947018927.', 'ARD', 'bagus', '2000', '2019-12-09 03:42:01'),
(3, '.120947018927.', 'IT', 'idih', '9391', '2019-12-09 03:42:54'),
(5, '.9825193.', 'GA', 'ad', '4000', '2019-12-09 07:00:27'),
(6, '.120947018927.', 'ARD', 'asd', '4000', '2019-12-09 07:01:00'),
(7, '.9825193.', 'ARD', 'asd', '5000', '2019-12-09 07:23:43'),
(8, '.120947018927.', 'GA', 'asd', '500', '2019-12-09 07:29:22'),
(9, '.120947018927.', 'ARD', 'sad', '5000', '2019-12-09 08:18:51'),
(10, '.120947018927.', 'GA', 'sdf', '2000', '2019-12-09 08:30:11'),
(11, '.120947018927.', 'GA', 'sdf', '2000', '2019-12-09 08:30:33'),
(12, '.9825193.', 'GA', 'asd', '123', '2019-12-09 09:12:49'),
(13, '.9825193.', 'GA', 'asd', '123', '2019-12-09 09:13:07'),
(14, '.9825193.', 'GA', 'asd', '5000', '2019-12-09 09:14:04'),
(15, '.120947018927.', 'IT', 'itititit', '13000', '2019-12-09 09:38:36'),
(16, '.9825193.', 'GA', 'gagagagagagagagghahaha', '14000', '2019-12-09 09:44:25'),
(17, '.9825193.', 'ARD', 'qwerty', '18000', '2019-12-09 09:51:13'),
(18, '.9825193.', 'ARD', 'wdcercercercx', '20000', '2019-12-09 09:55:22'),
(19, '.9825193.', 'GA', 'kontok', '11000', '2019-12-09 09:56:13'),
(20, '.120947018927.', 'ARD', 'asdqwrwe', '60000', '2019-12-10 01:11:36'),
(21, '.120947018927.', 'GA', 'ga', '1500', '2019-12-10 01:13:43'),
(22, '.120947018927.', 'IT', 'tahu bulat di pangang dadakan 5 jutaan halooo', '75000000', '2019-12-10 01:15:33'),
(23, '.120947018927.', 'ARD', 'asklihf', '11000', '2019-12-10 09:28:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'ADMIN'),
(2, 'ARD'),
(3, 'GA'),
(4, 'IT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_pegawai`
--

CREATE TABLE `user_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_pegawai`
--

INSERT INTO `user_pegawai` (`id_pegawai`, `nama_pegawai`, `username`, `password`, `id_level`) VALUES
(1, 'raihan1', 'raihan1', 'raihan1', 1),
(2, 'fazel', 'ardard1', 'ardard1', 2),
(3, 'defa', 'gagaga1', 'gagaga1', 3),
(4, 'dimas', 'ititit1', 'ititit1', 4),
(5, 'qwwerty', 'aaaaaaaa', 'oooooooo', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `nama_karyawan` (`nama_karyawan`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `user_pegawai`
--
ALTER TABLE `user_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `nama_pegawai` (`nama_pegawai`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_pegawai`
--
ALTER TABLE `user_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user_pegawai`
--
ALTER TABLE `user_pegawai`
  ADD CONSTRAINT `user_pegawai_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
