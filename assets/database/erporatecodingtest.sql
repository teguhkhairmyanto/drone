-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2019 pada 08.28
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erporatecodingtest`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `idaktivitas` int(9) NOT NULL,
  `idpengguna` int(9) NOT NULL,
  `aktivitas` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `isipesanan`
--

CREATE TABLE `isipesanan` (
  `idisipesanan` int(5) NOT NULL,
  `idpesanan` varchar(15) NOT NULL,
  `idmenu` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `isipesanan`
--

INSERT INTO `isipesanan` (`idisipesanan`, `idpesanan`, `idmenu`) VALUES
(4, 'ERP22122019-001', '1'),
(5, 'ERP22122019-001', '1'),
(7, 'ERP22122019-002', '2'),
(9, 'ERP22122019-001', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenispengguna`
--

CREATE TABLE `jenispengguna` (
  `idjenispengguna` int(2) NOT NULL,
  `namajenispengguna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenispengguna`
--

INSERT INTO `jenispengguna` (`idjenispengguna`, `namajenispengguna`) VALUES
(1, 'Pelayan'),
(2, 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(2) NOT NULL,
  `namamenu` varchar(50) NOT NULL,
  `hargamenu` int(15) NOT NULL,
  `gambarmenu` varchar(100) NOT NULL,
  `statusmenu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`idmenu`, `namamenu`, `hargamenu`, `gambarmenu`, `statusmenu`) VALUES
(1, 'Nasi Goreng Seafood', 12000, 'nasgor_seafood.jpg', 1),
(2, 'Soto Ayam', 22000, 'soto_gamba.jpg', 1),
(3, 'Nasi Goreng Telor', 12000, 'NasiGorengJawa.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(9) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenispengguna` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `username`, `password`, `jenispengguna`) VALUES
(1, 'teguhkhairmyanto', 'teguhkhairmyanto', 1),
(2, 'aprinaldopangribuan', 'aprinaldopangribuan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `idpesanan` varchar(15) NOT NULL,
  `idpengguna` int(2) NOT NULL,
  `nomormeja` int(2) NOT NULL,
  `statuspesanan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`idpesanan`, `idpengguna`, `nomormeja`, `statuspesanan`) VALUES
('ERP22122019-001', 1, 1, 1),
('ERP22122019-002', 1, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`idaktivitas`);

--
-- Indeks untuk tabel `isipesanan`
--
ALTER TABLE `isipesanan`
  ADD PRIMARY KEY (`idisipesanan`);

--
-- Indeks untuk tabel `jenispengguna`
--
ALTER TABLE `jenispengguna`
  ADD PRIMARY KEY (`idjenispengguna`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idpesanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `idaktivitas` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `isipesanan`
--
ALTER TABLE `isipesanan`
  MODIFY `idisipesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenispengguna`
--
ALTER TABLE `jenispengguna`
  MODIFY `idjenispengguna` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
