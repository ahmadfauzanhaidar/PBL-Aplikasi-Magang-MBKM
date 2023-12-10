-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2023 pada 08.53
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_pbl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `transkrip` varchar(255) NOT NULL,
  `pernyataan` varchar(255) NOT NULL,
  `rekomendasi` varchar(255) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `catatan` text NOT NULL,
  `sptjm` varchar(255) DEFAULT NULL,
  `file_rekomendasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`id`, `nama`, `nim`, `prodi`, `transkrip`, `pernyataan`, `rekomendasi`, `tanggal_upload`, `catatan`, `sptjm`, `file_rekomendasi`) VALUES
(1, 'faiz', '123', 'Teknologi Informasi', 'uploads/sptjm.pdf', 'uploads/surat_pernyataan.pdf', 'uploads/surat_rekomendasi.pdf', '2023-12-07 16:04:51', 'Diterima', 'uploads/sptjm/sptjm.pdf', 'uploads/rekomendasi/surat_rekomendasi.pdf'),
(2, 'rico', '133', 'Teknologi Informasi', 'uploads/sptjm.pdf', 'uploads/surat_pernyataan.pdf', 'uploads/surat_rekomendasi.pdf', '2023-12-09 07:25:39', 'Ditolak, file transkrip dan rekomendasinya salah', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `program_studi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_data`
--

INSERT INTO `tbl_data` (`id`, `nama`, `nim`, `departemen`, `program_studi`) VALUES
(1, 'faiz', '123', 'Industri Kreatif dan Digital', 'Teknologi Informasi'),
(2, 'rico', '133', 'Industri Kreatif dan Digital', 'Teknologi Informasi'),
(4, 'dika', '155', 'Bisnis dan Hospitality', 'Manajemen Perhotelan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hak`
--

CREATE TABLE `tbl_hak` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hak_akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_hak`
--

INSERT INTO `tbl_hak` (`id`, `nama`, `hak_akses`) VALUES
(6, 'akademik', 'superadmin'),
(10, 'dosen', 'admin'),
(14, 'mahasiswa', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','user','superadmin') NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `email`) VALUES
(1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin', 'superadmin@gmail.com'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'user@gmail.com'),
(4, 'rico', 'be89e250d8388c5e7ded2f1630e5daa4', 'user', 'rico@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_hak`
--
ALTER TABLE `tbl_hak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `Username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_hak`
--
ALTER TABLE `tbl_hak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
