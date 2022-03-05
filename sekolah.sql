-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2022 pada 23.05
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(10) NOT NULL,
  `nama_foto` varchar(30) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` int(11) NOT NULL,
  `nama_guru` varchar(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `foto`) VALUES
(12, 'guru', 'mamabiru.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(14) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `ket` enum('guru','siswa') NOT NULL,
  `nim` int(14) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `user`, `pass`, `ket`, `nim`, `nip`) VALUES
(1, 'guru', 'guru', 'guru', 0, 12),
(2, 'siswa', 'siswa', 'siswa', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(14) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` int(6) NOT NULL,
  `th_ajaran` varchar(15) NOT NULL,
  `biaya` int(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id` int(10) NOT NULL,
  `nis` int(14) NOT NULL,
  `bulan` varchar(14) NOT NULL,
  `jth_tempo` date NOT NULL,
  `tgl_bayar` varchar(100) NOT NULL,
  `no_bayar` varchar(10) NOT NULL,
  `jmlh` int(10) NOT NULL,
  `keterangan` enum('belum','lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id`, `nis`, `bulan`, `jth_tempo`, `tgl_bayar`, `no_bayar`, `jmlh`, `keterangan`) VALUES
(103, 14, 'January 2022', '2022-01-29', '2022-01-29', '2201291401', 100000, 'lunas'),
(104, 14, 'February 2022', '2022-03-01', '2022-02-01', '2203011402', 100000, 'lunas'),
(105, 14, 'March 2022', '2022-03-29', '', '', 100000, 'belum'),
(106, 14, 'April 2022', '2022-04-29', '', '', 100000, 'belum'),
(107, 14, 'May 2022', '2022-05-29', '', '', 100000, 'belum'),
(108, 14, 'June 2022', '2022-06-29', '', '', 100000, 'belum'),
(109, 14, 'July 2022', '2022-07-29', '', '', 100000, 'belum'),
(110, 14, 'August 2022', '2022-08-29', '', '', 100000, 'belum'),
(111, 14, 'September 2022', '2022-09-29', '', '', 100000, 'belum'),
(112, 14, 'October 2022', '2022-10-29', '', '', 100000, 'belum'),
(113, 14, 'November 2022', '2022-11-29', '', '', 100000, 'belum'),
(114, 14, 'December 2022', '2022-12-29', '', '', 100000, 'belum'),
(115, 15, 'January 2022', '2022-02-01', '2022-02-01', '2202011503', 100000, 'lunas'),
(116, 15, 'February 2022', '2022-03-01', '', '', 100000, 'belum'),
(117, 15, 'March 2022', '2022-04-01', '', '', 100000, 'belum'),
(118, 15, 'April 2022', '2022-05-01', '', '', 100000, 'belum'),
(119, 15, 'May 2022', '2022-06-01', '', '', 100000, 'belum'),
(120, 15, 'June 2022', '2022-07-01', '', '', 100000, 'belum'),
(121, 15, 'July 2022', '2022-08-01', '', '', 100000, 'belum'),
(122, 15, 'August 2022', '2022-09-01', '', '', 100000, 'belum'),
(123, 15, 'September 2022', '2022-10-01', '', '', 100000, 'belum'),
(124, 15, 'October 2022', '2022-11-01', '', '', 100000, 'belum'),
(125, 15, 'November 2022', '2022-12-01', '', '', 100000, 'belum'),
(126, 15, 'December 2022', '2023-01-01', '', '', 100000, 'belum');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
