-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2020 pada 16.22
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_ajax`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(45) DEFAULT NULL,
  `pengarang` varchar(45) DEFAULT NULL,
  `gambar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `gambar`) VALUES
(15, 'Buku Desaign', 'Joko', 'upload/online-learning_1325-147.jpg'),
(16, 'Buku Web', 'Andy', 'upload/modern-find-me-social-media-background'),
(17, 'Buku E-Commerce', 'Asty', 'upload/cinema-arrangement-with-clipboard-mock');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nim` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `telpon` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `nim`, `nama`, `telpon`, `alamat`) VALUES
(44, '7118931', 'Jesika', '1234', 'Jl.Mawar'),
(45, '8117456', 'Joko', '54321', 'Jl.Bango'),
(46, '1234', 'wawan', '12345', 'Jl.Garuda'),
(47, '6173241', 'Tia', '62788901', 'Jl.Gajah Mada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_detail`
--

CREATE TABLE `peminjaman_detail` (
  `id` int(11) NOT NULL,
  `idpinjam` varchar(45) DEFAULT NULL,
  `idbuku` varchar(45) DEFAULT NULL,
  `qty` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `peminjaman_detail`
--

INSERT INTO `peminjaman_detail` (`id`, `idpinjam`, `idbuku`, `qty`) VALUES
(1, '0001', '12', '2'),
(2, '0002', '12', '2'),
(3, '0002', '13', '3'),
(5, '0003', '12', '3'),
(6, '0004', '12', '3'),
(7, '0005', '12', '3'),
(10, '0007', '12', '4'),
(11, '0007', '12', '5'),
(12, '0008', '12', '3'),
(13, '0008', '12', '2'),
(14, '0009', '12', '3'),
(15, '0011', '12', '3'),
(16, '0013', '12', '3'),
(17, '0014', '15', '1'),
(18, '0014', '16', '1'),
(19, '0014', '17', '1'),
(20, '0015', '15', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_header`
--

CREATE TABLE `peminjaman_header` (
  `idpinjam` varchar(45) NOT NULL,
  `idpeminjam` varchar(45) DEFAULT NULL,
  `tglPinjam` date DEFAULT NULL,
  `tglKembali` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `peminjaman_header`
--

INSERT INTO `peminjaman_header` (`idpinjam`, `idpeminjam`, `tglPinjam`, `tglKembali`, `status`) VALUES
('0001', '1129394', '2020-07-06', '2020-07-15', '1'),
('0002', '1129394', '2020-07-13', '2020-07-22', '0'),
('0003', '1129394', '2020-07-21', '2020-07-23', '0'),
('0004', '1129394', '2020-07-21', '2020-07-23', '0'),
('0005', '11293943', '2020-07-21', '2020-07-23', '0'),
('0006', '11293943', '2020-07-21', '2020-07-23', '0'),
('0007', '11293943', '2020-07-21', '2020-07-23', '0'),
('0008', '1130123', '2020-07-21', '2020-07-30', '1'),
('0009', '11293943', '2020-07-21', '2020-07-29', '0'),
('0010', '1129394', '0000-00-00', '0000-00-00', '0'),
('0011', '11293943', '2020-07-16', '2020-07-31', '0'),
('0012', '', '0000-00-00', '0000-00-00', '0'),
('0013', '1129394er', '2020-07-21', '2020-07-23', '0'),
('0014', '8117456', '2020-08-14', '2020-08-20', '1'),
('0015', '7118931', '2020-08-07', '2020-08-14', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` varchar(255) NOT NULL,
  `id_pinjam` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tgl_realisasi` date DEFAULT NULL,
  `denda` int(255) DEFAULT NULL,
  `pelunasan` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_pinjam`, `nim`, `tgl_kembali`, `tgl_realisasi`, `denda`, `pelunasan`) VALUES
('0001', '0001', '1129394', '2020-07-15', '2020-07-25', 10000, 10000),
('0002', '0008', '1130123', '2020-07-30', '2020-07-25', 0, NULL),
('0003', '0014', '8117456', '2020-08-20', '2020-08-21', 1000, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'b93939873fd4923043b9dec975811f66', '1'),
(2, 'user', 'b93939873fd4923043b9dec975811f66', '2'),
(3, 'user2', 'b93939873fd4923043b9dec975811f66', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman_header`
--
ALTER TABLE `peminjaman_header`
  ADD PRIMARY KEY (`idpinjam`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD UNIQUE KEY `unique_id_pengembalian` (`id_pengembalian`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
