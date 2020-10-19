-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2020 pada 02.03
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_asli` varchar(10) NOT NULL,
  `harga_jual` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_asli`, `harga_jual`) VALUES
(1, 'Kertas HVS Folio / Rim', '45000', '52000'),
(2, 'Kertas HVS A4 / Rim', '39000', '44000'),
(3, 'Amplop polos / Dos', '30000', '32000'),
(4, 'Buku Tulis Folio / Buah', '15000', '15500'),
(5, 'Buku Kuintansi', '9000', '10000'),
(6, 'Map Snelhekter', '2000', '3000'),
(7, 'Map Biasa', '1000', '1500'),
(8, 'Pensil / buah', '500', '1000'),
(9, 'Ballpoint / Lusin', '65000', '68000'),
(10, 'Penggaris Besi 1 m', '50000', '52000'),
(11, 'Lem Kertas / Buah', '12500', '15000'),
(12, 'Karbon Folio / Doss', '87500', '90000'),
(13, 'Gunting', '35000', '36000'),
(14, 'Bak Stempel / Buah', '15000', '18000'),
(15, 'Selotif Besar', '20000', '22000'),
(16, 'Selotif Kecil', '15000', '18000'),
(17, 'karet penghapus / buah', '3500', '5000'),
(18, 'Lem Fox / botol', '25000', '28500'),
(19, 'Pisau Catter / Dos', '8500', '10000'),
(20, 'Kertas stiker / Rim', '75000', '80000'),
(21, 'CD-RW / buah', '20000', '22500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_bayar` varchar(10) NOT NULL,
  `keuntungan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `tgl`, `id_barang`, `jumlah`, `total_bayar`, `keuntungan`) VALUES
(17, '2020-06-19', 0, 4, '40000', '-'),
(18, '2020-06-19', 0, 2, '88000', '-'),
(21, '2020-06-19', 7, 2, '3000', '1000'),
(22, '2020-06-19', 11, 5, '75000', '12500'),
(23, '2020-06-19', 1, 4, '200000', '24000'),
(24, '2020-06-19', 14, 7, '126000', '21000'),
(25, '2020-06-19', 1, 4, '200000', '24000'),
(26, '2020-06-19', 8, 10, '10000', '5000'),
(27, '2020-06-19', 2, 3, '132000', '15000'),
(28, '2020-06-19', 3, 4, '128000', '8000'),
(29, '2020-06-19', 8, 3, '3000', '1500'),
(32, '2020-06-19', 6, 3, '9000', '3000'),
(33, '2020-06-19', 7, 6, '9000', '3000'),
(34, '2020-06-19', 6, 3, '9000', '3000'),
(35, '2020-06-19', 2, 7, '308000', '35000'),
(36, '2020-06-20', 1, 2, '100000', '12000'),
(37, '2020-06-20', 5, 3, '30000', '3000'),
(38, '2020-06-20', 7, 3, '4500', '1500'),
(39, '2020-06-20', 7, 3, '4500', '1500'),
(40, '2020-06-20', 18, 1, '28500', '3500'),
(41, '2020-06-20', 18, 1, '28500', '3500'),
(42, '2020-06-20', 5, 3, '30000', '3000'),
(43, '2020-06-20', 1, 3, '150000', '18000'),
(44, '2020-06-21', 7, 3, '4500', '1500'),
(45, '2020-06-21', 8, 7, '7000', '3500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'jevi alvenosa', 'admin', '3141dafbddb6dbfaa9b9a87f99acf1d6', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
