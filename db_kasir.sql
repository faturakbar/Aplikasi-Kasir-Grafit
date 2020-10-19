-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2020 pada 13.26
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id_barang` int(30) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan_barang` text NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_kategori`, `nama_barang`, `satuan_barang`, `harga_jual`, `stok`) VALUES
(42, 9, 'Ball Linear Hitam/Putih', 'BUAH', 20000, -55),
(46, 9, 'Boxy', 'BUAH', 12000, -7),
(47, 9, 'Hitam/Biru Biasa ', 'BUAH', 3000, -2),
(48, 12, 'Agenda Pendek', 'BUAH', 12000, -3),
(49, 12, 'Agenda Panjang', 'BUAH', 18000, -6),
(50, 12, 'Tulis Pendek', 'BUAH', 5000, 0),
(51, 12, 'Tulis Panjang', 'BUAH', 8000, 0),
(52, 13, 'CD-R/RW', 'BUAH', 7000, -4),
(53, 14, 'Box Kaset', 'BUAH', 6000, 0),
(54, 15, 'No. 10', 'BUAH', 5000, -2),
(55, 16, 'Asturo', 'BUAH', 5000, 0),
(56, 16, 'A4 / RIM', 'RIM', 50000, -1),
(57, 16, 'F4', 'RIM', 55000, 0),
(58, 16, 'Manila', 'BUAH', 10000, -1),
(59, 16, 'Foto', 'BUAH', 2000, 0),
(60, 16, 'Folio Bergaris', 'BUAH', 500, -76),
(61, 16, 'Cover/Plastik', 'BUAH', 1000, 0),
(62, 16, 'A4/F4 / Buah', 'BUAH', 200, -10),
(63, 16, 'F4 Warna /  BUAH', 'BUAH', 300, -78),
(64, 16, 'F4 Warna / RIM', 'RIM', 55000, 0),
(65, 17, 'Stofmap Folio', 'BUAH', 3000, -2),
(66, 16, 'Biola', 'BUAH', 5000, 0),
(67, 17, 'Plastik', 'BUAH', 5000, -1),
(68, 18, '2B', 'BUAH', 5000, -3),
(69, 19, 'Penghapus', 'BUAH', 3000, 0),
(70, 20, 'Kecil', 'BUAH', 2000, -1),
(71, 21, 'Boardmarker', 'BUAH', 8000, -3),
(72, 21, 'Permanent', 'BUAH', 10000, -4),
(73, 22, 'Stabilo', 'BUAH', 10000, -4),
(74, 23, 'Biasa', 'BUAH', 6000, -3),
(75, 23, 'Siput', 'BUAH', 8000, 0),
(76, 24, '6000', 'BUAH', 8000, -11),
(77, 25, 'Hitam Besar', 'BUAH', 16000, 0),
(78, 25, 'Hitam Sedang', 'BUAH', 13000, 0),
(79, 25, 'Coklat', 'BUAH', 13000, 0),
(80, 25, 'Bening', 'BUAH', 13000, 0),
(81, 11, '260', 'BUAH', 3000, 0),
(82, 11, '200', 'BUAH', 2000, 0),
(83, 11, '155', 'BUAH', 1500, -28),
(84, 11, '107', 'BUAH', 1000, -26),
(86, 25, 'Double Tape Kecil', 'BUAH', 7000, 0),
(87, 26, 'Besar', 'BUAH', 2000, 42),
(88, 24, 'Kecil', 'BUAH', 1000, 0),
(89, 26, 'Coklat Sedang', 'BUAH', 1000, 56),
(90, 25, 'Coklat Besar', 'BUAH', 3000, -1),
(91, 25, 'Selotip Kecil', 'BUAH', 2000, 0),
(92, 16, 'Riwayat Hidup', 'BUAH', 2000, 0),
(93, 27, 'Biasa A4', 'BUAH', 5000, -6),
(94, 27, 'Semi Lux A3', 'BUAH', 50000, -1),
(95, 27, 'Semi Lux A4/F4', 'BUAH', 35000, 0),
(96, 27, 'Cover Lux A4/F4', 'BUAH', 50000, 0),
(97, 27, 'Spiral Plastik/Besi (Tipis)', 'BUAH', 18000, -15),
(98, 27, 'Spiral Plastik/Besi (Tebal)', 'BUAH', 28000, -20),
(99, 28, 'Laminating', 'BUAH', 8000, -40),
(100, 29, 'Diameter < 5 cm', 'BUAH', 120000, 0),
(101, 29, 'Diameter > 5 cm', 'BUAH', 150000, 0),
(102, 30, 'Id Card PVC', 'BUAH', 80000, 0),
(103, 30, 'Kertas Tebal Biasa', 'BUAH', 35000, 0),
(104, 31, 'Biasa', 'BUAH', 8000, 0),
(105, 32, '12R & 14R', 'BUAH', 150000, 1),
(106, 33, 'Teh Pucuk', 'BUAH', 5000, -36),
(107, 33, 'Qualala', 'BUAH', 5000, -17),
(108, 33, 'Ultra Milk Kecil', 'BUAH', 5000, -13),
(109, 34, 'Surya 16 ', 'DOS', 26000, -16),
(110, 34, 'Surya 12', 'DOS', 20000, -2),
(111, 34, 'Surya Pro Merah ', 'DOS', 20000, -3),
(112, 34, 'Surya Pro Putih', 'DOS', 20000, -11),
(113, 34, 'Sampoerna', 'DOS', 26000, -11),
(114, 35, 'Epson 003 ', 'BUAH', 120000, 0),
(115, 35, 'Epson 664', 'BUAH', 120000, 0),
(116, 27, 'Biasa A3', 'BUAH', 10000, -8),
(117, 36, '2 x 3 ', 'BUAH', 1500, -7),
(118, 36, '3 x  4', 'BUAH', 2000, -24),
(119, 36, '4 x 6', 'BUAH', 2500, -7),
(120, 36, '2R ( 6 x 9 cm)', 'BUAH', 3000, 0),
(121, 36, '3R (8.9 x 12.7 cm)', 'BUAH', 4000, 0),
(122, 36, '4R ( 10.2 x 15.2 cm)', 'BUAH', 6000, 0),
(123, 36, '6R (15.2 x 20.3 cm)', 'BUAH', 8000, 0),
(124, 36, '8R (20.3 x 25.4 cm)', 'BUAH', 10000, 0),
(125, 37, 'A3 Hitam Putih ', 'BUAH', 800, -38),
(126, 37, 'A3 Berwarna', 'BUAH', 7000, 0),
(127, 37, 'A4 / F4 Hitam Putih', 'BUAH', 300, -13250),
(128, 37, 'A4 / F4 Berwarna', 'BUAH', 3500, -61),
(129, 34, 'Surya 16 Eceran', 'BUAH', 1500, 9897),
(130, 38, 'Listrik 100', 'BUAH', 105000, 9996),
(131, 42, 'A4/F4 Hitam Putih', 'BUAH', 1000, 9971),
(132, 38, 'HP/Biasa Rp 5000', 'BUAH', 8000, 997),
(133, 43, 'One Peace', 'BUAH', 8000, 37),
(135, 42, 'A4 / F4 Berwarna', 'BUAH', 3500, 9861),
(136, 42, 'A4 / F4 Kertas Tebal ', 'BUAH', 10000, 999999),
(137, 38, 'Hp/Biasa Rp 10.000', 'BUAH', 13000, 1000),
(138, 17, 'Biola', 'BUAH', 5000, 9994),
(139, 38, 'Hp/Biasa Rp 100.000', 'BUAH', 104000, 9989),
(140, 38, 'Hp/Biasa Rp 20.000', 'BUAH', 23000, 99997),
(141, 27, 'Spiral ( Lebih Tebal ) ', 'BUAH', 38000, 9980),
(142, 42, 'A4/F4 Kertas Foto Double Side', 'BUAH', 7000, 99970),
(143, 38, 'Hp/Biasa Rp 50.000', 'BUAH', 54000, 9994),
(144, 38, 'HP/Data Rp 100.000', 'BUAH', 104000, 9999),
(145, 38, 'Paket Data 12Gb', 'BUAH', 105000, 9999),
(146, 44, 'Tunai', 'BUAH', 1, 10000),
(147, 45, 'VIvo', 'BUAH', 1000000, 9997),
(148, 11, '155  (Dos)', 'DOS', 15000, 9997),
(149, 11, '200 (Dos)', 'DOS', 24000, 10000),
(150, 11, '260 (Dos)', 'DOS', 36000, 10000),
(151, 46, 'OTG 32GB', 'BUAH', 125000, 10000),
(152, 9, 'Zebra 4 Warna', 'BUAH', 12000, 1000),
(153, 9, 'Snowman ', 'BUAH', 5000, 10000),
(154, 25, 'Kertas Kecil', 'BUAH', 10000, 10000),
(155, 47, 'Stiker Kertas A4 ', 'BUAH', 10000, 9989),
(156, 47, 'Spanduk ', 'BUAH', 80000, 9938),
(157, 48, 'L- 150', 'BUAH', 8000, 99999),
(158, 36, 'Polaroid', 'BUAH', 3000, 999),
(159, 49, 'Kecil', 'BUAH', 5000, 99999),
(163, 38, 'Hp/Data Rp 10.000', 'BUAH', 13000, 1000),
(164, 38, 'HP/Data Rp 20.000', 'BUAH', 23000, 999),
(166, 51, 'A4/F4 ', 'BUAH', 2000, 99996),
(167, 38, 'Listrik 50', 'BUAH', 55000, 999),
(168, 26, 'kecil putih', 'BUAH', 1000, 9998),
(169, 33, 'Teh Kotak', 'BUAH', 5000, 99990),
(170, 38, 'Listrik 50', 'BUAH', 55000, 999999),
(171, 33, 'Pulpy Orange', 'BUAH', 7000, 986),
(172, 20, 'Besar', 'BUAH', 5000, 9999999);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pemeblian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_barang` int(30) NOT NULL,
  `banyaknya` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `no_nota` varchar(10) NOT NULL,
  `id_barang` int(30) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`no_nota`, `id_barang`, `jumlah_jual`, `sub_total`) VALUES
('BRG001', 106, 1, 5000),
('BRG001', 129, 3, 5001),
('BRG001', 127, 6, 1800),
('BRG004', 127, 16, 4800),
('BRG007', 131, 1, 1000),
('BRG007', 127, 1, 300),
('BRG007', 129, 5, 8335),
('BRG008', 106, 1, 5000),
('BRG009', 106, 2, 10000),
('BRG009', 107, 1, 5000),
('BRG010', 127, 6, 1800),
('BRG011', 107, 1, 5000),
('BRG012', 132, 1, 23000),
('BRG013', 127, 10, 3000),
('BRG014', 131, 2, 2000),
('BRG014', 106, 2, 10000),
('BRG015', 133, 12, 96000),
('BRG016', 107, 1, 5000),
('BRG017', 109, 1, 26000),
('BRG018', 118, 5, 10000),
('BRG018', 106, 1, 5000),
('BRG019', 127, 1064, 319200),
('BRG019', 125, 8, 6400),
('BRG019', 98, 10, 280000),
('BRG019', 97, 5, 90000),
('BRG019', 94, 1, 50000),
('BRG020', 132, 1, 8000),
('BRG022', 107, 1, 5000),
('BRG022', 106, 1, 5000),
('BRG023', 107, 1, 5000),
('BRG024', 106, 3, 15000),
('BRG025', 127, 6, 1800),
('BRG025', 129, 3, 4500),
('BRG026', 127, 10, 3000),
('BRG026', 99, 2, 16000),
('BRG026', 106, 1, 5000),
('BRG028', 113, 1, 26000),
('BRG027', 108, 1, 5000),
('BRG028', 109, 2, 52000),
('BRG028', 113, 1, 26000),
('BRG029', 135, 4, 14000),
('BRG030', 127, 6, 1800),
('BRG031', 136, 1, 10000),
('BRG031', 99, 3, 24000),
('BRG031', 106, 1, 5000),
('BRG032', 137, 1, 13000),
('BRG033', 112, 1, 20000),
('BRG034', 119, 4, 10000),
('BRG034', 117, 4, 6000),
('BRG034', 118, 5, 10000),
('BRG034', 138, 1, 5000),
('BRG035', 129, 7, 10000),
('BRG037', 140, 1, 23000),
('BRG037', 109, 1, 26000),
('BRG038', 106, 1, 5000),
('BRG039', 127, 6, 1800),
('BRG039', 89, 1, 1000),
('BRG040', 108, 1, 5000),
('BRG040', 106, 1, 5000),
('BRG042', 142, 30, 210000),
('BRG042', 99, 30, 240000),
('BRG042', 97, 5, 90000),
('BRG042', 89, 1, 1000),
('BRG043', 127, 11, 3300),
('BRG043', 127, 3, 1000),
('BRG044', 129, 3, 5000),
('BRG045', 133, 5, 40000),
('BRG047', 135, 41, 143500),
('BRG047', 141, 5, 190000),
('BRG046', 139, 2, 208000),
('BRG046', 139, 1, 104000),
('BRG046', 143, 1, 54000),
('BRG046', 106, 3, 15000),
('BRG047', 108, 1, 5000),
('BRG048', 127, 17, 5000),
('BRG048', 109, 1, 26000),
('BRG049', 127, 38, 11400),
('BRG049', 93, 1, 5000),
('BRG050', 106, 1, 5000),
('BRG051', 112, 1, 20000),
('BRG052', 127, 3, 900),
('BRG053', 108, 1, 5000),
('BRG053', 106, 1, 5000),
('BRG055', 113, 1, 26000),
('BRG055', 106, 1, 5000),
('BRG056', 76, 1, 8000),
('BRG057', 140, 1, 23000),
('BRG058', 106, 1, 5000),
('BRG058', 106, 1, 5000),
('BRG058', 108, 1, 5000),
('BRG059', 112, 1, 20000),
('BRG059', 108, 1, 5000),
('BRG060', 127, 10, 3000),
('BRG061', 127, 4, 1200),
('BRG061', 42, 1, 20000),
('BRG062', 113, 1, 26000),
('BRG062', 99, 2, 16000),
('BRG064', 139, 1, 104000),
('BRG065', 143, 1, 54000),
('BRG066', 139, 1, 104000),
('BRG067', 143, 1, 54000),
('BRG068', 139, 1, 104000),
('BRG069', 143, 1, 54000),
('BRG070', 145, 1, 105000),
('BRG071', 143, 1, 54000),
('BRG072', 143, 1, 54000),
('BRG073', 155, 2, 15000),
('BRG073', 158, 1, 3000),
('BRG073', 159, 1, 5000),
('BRG073', 108, 1, 5000),
('BRG073', 108, 4, 20000),
('BRG075', 93, 3, 15000),
('BRG075', 138, 3, 15000),
('BRG075', 58, 1, 10000),
('BRG076', 157, 1, 8000),
('BRG077', 62, 10, 2000),
('BRG078', 112, 1, 20000),
('BRG079', 60, 10, 5000),
('BRG080', 127, 4, 1200),
('BRG080', 138, 1, 5000),
('BRG081', 127, 2, 600),
('BRG082', 60, 4, 2000),
('BRG083', 164, 1, 23000),
('BRG027', 160, 1, 5000),
('BRG040', 160, 1, 5000),
('BRG084', 148, 1, 15000),
('BRG085', 149, 1, 24000),
('BRG086', 151, 1, 125000),
('BRG087', 115, 4, 480000),
('BRG088', 150, 1, 36000),
('BRG089', 114, 1, 120000),
('BRG090', 153, 1, 5000),
('BRG091', 56, 2, 100000),
('BRG092', 152, 1, 12000),
('BRG093', 56, 2, 100000),
('BRG094', 100, 1, 120000),
('BRG095', 114, 4, 480000),
('BRG096', 56, 1, 50000),
('BRG097', 154, 1, 10000),
('BRG098', 98, 3, 84000),
('BRG099', 127, 4, 1200),
('BRG099', 135, 1, 3500),
('BRG099', 135, 1, 3500),
('BRG101', 130, 1, 104000),
('BRG102', 135, 1, 3500),
('BRG102', 131, 1, 1000),
('BRG102', 65, 1, 3000),
('BRG102', 131, 1, 1000),
('BRG102', 166, 1, 2000),
('BRG103', 167, 1, 55000),
('BRG104', 144, 1, 104000),
('BRG105', 113, 1, 26000),
('BRG106', 155, 5, 50000),
('BRG006', 113, 1, 26000),
('BRG006', 139, 1, 104000),
('BRG027', 109, 1, 26000),
('BRG041', 106, 1, 5000),
('BRG107', 111, 2, 40000),
('BRG108', 168, 2, 2000),
('BRG109', 60, 10, 5000),
('BRG109', 109, 1, 26000),
('BRG111', 127, 2, 600),
('BRG111', 127, 2, 600),
('BRG112', 113, 1, 26000),
('BRG113', 71, 1, 8000),
('BRG114', 135, 1, 3500),
('BRG115', 127, 3, 900),
('BRG115', 127, 2, 600),
('BRG115', 138, 1, 5000),
('BRG115', 42, 1, 20000),
('BRG116', 60, 10, 5000),
('BRG116', 169, 1, 5000),
('BRG117', 156, 1, 80000),
('BRG118', 47, 1, 3000),
('BRG118', 60, 10, 5000),
('BRG118', 76, 3, 24000),
('BRG119', 109, 1, 26000),
('BRG119', 112, 2, 40000),
('BRG122', 106, 1, 5000),
('BRG123', 119, 3, 7500),
('BRG123', 118, 4, 8000),
('BRG123', 117, 3, 4500),
('BRG124', 169, 1, 5000),
('BRG124', 107, 2, 10000),
('BRG126', 171, 1, 7000),
('BRG126', 106, 1, 5000),
('BRG126', 156, 0, 10000),
('BRG128', 171, 4, 28000),
('BRG129', 171, 2, 14000),
('BRG130', 169, 1, 5000),
('BRG131', 60, 2, 1000),
('BRG131', 131, 12, 12000),
('BRG133', 110, 1, 20000),
('BRG133', 171, 1, 7000),
('BRG134', 169, 1, 5000),
('BRG135', 127, 2, 600),
('BRG136', 0, 0, 0),
('BRG136', 112, 2, 40000),
('BRG137', 76, 4, 32000),
('BRG139', 129, 3, 5000),
('BRG140', 129, 3, 5000),
('BRG140', 155, 1, 10000),
('BRG141', 109, 1, 26000),
('BRG142', 169, 2, 10000),
('BRG142', 106, 1, 5000),
('BRG142', 171, 1, 7000),
('BRG143', 169, 1, 5000),
('BRG144', 131, 9, 9000),
('BRG145', 135, 1, 3500),
('BRG145', 99, 1, 8000),
('BRG146', 131, 1, 1000),
('BRG147', 107, 2, 10000),
('BRG148', 113, 2, 52000),
('BRG149', 127, 60, 18000),
('BRG150', 172, 1, 5000),
('BRG151', 106, 1, 5000),
('BRG152', 135, 5, 17500),
('BRG153', 107, 2, 10000),
('BRG154', 42, 1, 20000),
('BRG155', 47, 1, 3000),
('BRG155', 48, 1, 12000),
('BRG155', 107, 1, 5000),
('BRG156', 135, 1, 3500),
('BRG157', 76, 1, 8000),
('BRG158', 166, 2, 4000),
('BRG158', 76, 1, 8000),
('BRG159', 170, 1, 55000),
('BRG160', 106, 2, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan_temp`
--

CREATE TABLE `detail_penjualan_temp` (
  `no_nota` varchar(10) NOT NULL,
  `id_barang` int(30) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(30) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_pelanggan` text NOT NULL,
  `tgl_hutang` date NOT NULL,
  `banyaknya` int(11) NOT NULL,
  `total_hutang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `id_barang`, `nama_pelanggan`, `tgl_hutang`, `banyaknya`, `total_hutang`) VALUES
(8, 140, 'Fatur', '2020-09-29', 1, 23000),
(11, 139, 'Fatur', '2020-09-29', 1, 104000),
(13, 139, 'Pak Ardi', '2020-10-02', 1, 104000),
(14, 137, 'Pak Ardi', '2020-10-02', 1, 13000),
(19, 127, 'Luthfi (Sisa Hutang)', '2020-10-03', 1056, 316800),
(21, 146, 'Pak Dom', '2020-10-03', 172500, 172500),
(22, 111, 'Fatur', '2020-09-30', 1, 20000),
(23, 137, 'Pak Bakat', '2020-10-02', 1, 13000),
(29, 139, 'Pak Dom', '2020-10-03', 1, 104000),
(47, 56, 'PT. Yodya Karya', '2020-10-03', 1, 50000),
(48, 155, 'Gape', '2020-10-03', 1, 10000),
(55, 139, 'Pak Dom', '2020-10-03', 1, 104000),
(65, 139, 'Fatur', '2020-10-07', 1, 104000),
(67, 112, 'Fatur', '2020-10-07', 1, 20000),
(68, 2147483647, 'fatur', '2020-10-07', 1, 20000),
(70, 143, 'Pak Dom', '2020-10-06', 1, 54000),
(71, 130, 'Pak Win', '2020-09-09', 2, 210000),
(72, 130, 'Pak Win', '2020-09-16', 1, 105000),
(73, 130, 'Pak Win', '2020-09-18', 1, 105000),
(74, 140, 'Pak Win', '2020-09-30', 1, 23000),
(75, 130, 'Pak Win', '2020-10-01', 2, 210000),
(76, 130, 'Pak Win', '2020-10-11', 1, 105000),
(77, 113, 'Fany', '2020-10-10', 1, 26000),
(78, 130, 'Rudi', '2020-10-16', 1, 105000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `kode_kategori` int(11) NOT NULL,
  `kategori_barang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`kode_kategori`, `kategori_barang`) VALUES
(9, 'Bolpen'),
(11, 'Binder Clips '),
(12, 'Buku'),
(13, 'CD-R/RW'),
(14, 'Box Kaset'),
(15, 'Isi Hekter '),
(16, 'Kertas'),
(17, 'Map'),
(18, 'Pensil'),
(19, 'Penghapus'),
(20, 'Serutan'),
(21, 'Spidol '),
(22, 'Stabilo'),
(23, 'Typex'),
(24, 'Materai'),
(25, 'Plakban'),
(26, 'Amplop'),
(27, 'Jilid'),
(28, 'Laminating'),
(29, 'Stempel'),
(30, 'Id Card'),
(31, 'Cutter'),
(32, 'Bingkai'),
(33, 'Minuman'),
(34, 'Rokok'),
(35, 'Tinta Printer'),
(36, 'Cetak Foto '),
(37, 'Foto Copy '),
(38, 'Pulsa'),
(42, 'Print '),
(43, 'Sticker'),
(44, 'Uang'),
(45, 'HP'),
(46, 'Flashdisk'),
(47, 'Cetak'),
(48, 'Isi Cutter'),
(49, 'Gunting'),
(51, 'Scan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` text NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`) VALUES
(3, 'Niaga', 'Abepura');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` varchar(10) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `dibayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `id_supplier`, `tgl_pembelian`, `total_pembelian`, `dibayar`, `kembali`) VALUES
('PB001', 3, '2020-10-14', 0, 234, -19766);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `no_nota` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `dibayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`no_nota`, `tgl`, `jumlah`, `dibayar`, `kembali`) VALUES
('BRG001', '2020-09-29', 20000, 11801, 8199),
('BRG004', '2020-09-29', 10000, 4800, 5200),
('BRG006', '2020-09-29', 130000, 130000, 0),
('BRG007', '2020-09-29', 10000, 9635, 365),
('BRG008', '2020-09-29', 5000, 5000, 0),
('BRG009', '2020-09-30', 20000, 15000, 5000),
('BRG010', '2020-09-30', 2000, 1800, 200),
('BRG011', '2020-09-30', 20000, 5000, 15000),
('BRG012', '2020-09-30', 25000, 23000, 2000),
('BRG013', '2020-09-30', 3000, 3000, 0),
('BRG014', '2020-09-30', 12000, 12000, 0),
('BRG015', '2020-09-30', 100000, 96000, 4000),
('BRG016', '2020-09-30', 5000, 5000, 0),
('BRG017', '2020-09-30', 30000, 26000, 4000),
('BRG018', '2020-10-01', 15000, 15000, 0),
('BRG019', '2020-10-01', 800000, 745600, 54400),
('BRG020', '2020-10-01', 100000, 8000, 92000),
('BRG022', '2020-10-01', 10000, 10000, 0),
('BRG023', '2020-10-01', 5000, 5000, 0),
('BRG024', '2020-10-01', 20000, 15000, 5000),
('BRG025', '2020-10-01', 6000, 6300, -300),
('BRG026', '2020-10-02', 25000, 24000, 1000),
('BRG027', '2020-10-02', 50000, 31000, 19000),
('BRG028', '2020-10-02', 250000, 104000, 146000),
('BRG029', '2020-10-02', 15000, 14000, 1000),
('BRG030', '2020-10-02', 2000, 1800, 200),
('BRG031', '2020-10-02', 50000, 39000, 11000),
('BRG032', '2020-10-02', 20000, 13000, 7000),
('BRG033', '2020-10-02', 50000, 20000, 30000),
('BRG034', '2020-10-02', 50000, 31000, 19000),
('BRG035', '2020-10-02', 10000, 10000, 0),
('BRG037', '2020-10-02', 100000, 49000, 51000),
('BRG038', '2020-10-02', 5000, 5000, 0),
('BRG039', '2020-10-03', 3000, 2800, 200),
('BRG040', '2020-10-03', 10000, 10000, 0),
('BRG041', '2020-10-03', 5000, 5000, 0),
('BRG042', '2020-10-03', 540000, 541000, 10000),
('BRG043', '2020-10-03', 4000, 4300, -300),
('BRG044', '2020-10-03', 5000, 5000, 0),
('BRG045', '2020-10-03', 40000, 40000, 0),
('BRG046', '2020-10-05', 700000, 699500, 500),
('BRG047', '2020-10-05', 100000, 20000, 80000),
('BRG048', '2020-10-05', 32000, 31000, 1000),
('BRG049', '2020-10-05', 20000, 16400, 3600),
('BRG050', '2020-10-05', 10000, 5000, 5000),
('BRG051', '2020-10-05', 20000, 20000, 0),
('BRG052', '2020-10-05', 10000, 900, 9100),
('BRG053', '2020-10-05', 5000, 5000, 0),
('BRG054', '2020-10-05', 5000, 5000, 0),
('BRG055', '2020-10-05', 40000, 31000, 9000),
('BRG056', '2020-10-05', 10000, 8000, 2000),
('BRG057', '2020-10-05', 50000, 23000, 27000),
('BRG058', '2020-10-05', 15000, 15000, 0),
('BRG059', '2020-10-05', 26000, 25000, 1000),
('BRG060', '2020-10-06', 100000, 3000, 97000),
('BRG061', '2020-10-06', 21000, 21200, -200),
('BRG062', '2020-10-06', 51000, 26000, 25000),
('BRG063', '2020-10-06', 50000, 16000, 34000),
('BRG064', '2020-10-06', 104000, 104000, 0),
('BRG065', '2020-10-06', 54000, 54000, 0),
('BRG066', '2020-10-06', 104000, 104000, 0),
('BRG067', '2020-10-06', 54000, 54000, 0),
('BRG068', '2020-10-06', 104000, 104000, 0),
('BRG069', '2020-10-06', 54000, 54000, 0),
('BRG070', '2020-10-06', 105000, 105000, 0),
('BRG071', '2020-10-06', 55000, 54000, 1000),
('BRG072', '2020-10-06', 100000, 54000, 46000),
('BRG073', '2020-10-06', 100000, 28000, 72000),
('BRG074', '2020-10-06', 20000, 20000, 0),
('BRG075', '2020-10-06', 100000, 30000, 70000),
('BRG076', '2020-10-06', 20000, 18000, 2000),
('BRG077', '2020-10-06', 2000, 2000, 0),
('BRG078', '2020-10-06', 20000, 20000, 0),
('BRG079', '2020-10-06', 5000, 5000, 0),
('BRG080', '2020-10-07', 6000, 6200, -200),
('BRG081', '2020-10-07', 50000, 600, 49400),
('BRG082', '2020-10-07', 5000, 2000, 3000),
('BRG083', '2020-10-07', 50000, 23000, 27000),
('BRG084', '2020-10-07', 15000, 15000, 0),
('BRG085', '2020-10-07', 24000, 24000, 0),
('BRG086', '2020-10-07', 125000, 125000, 0),
('BRG087', '2020-10-07', 480000, 480000, 0),
('BRG088', '2020-10-07', 36000, 36000, 0),
('BRG089', '2020-10-07', 120000, 120000, 0),
('BRG090', '2020-10-07', 5000, 5000, 0),
('BRG091', '2020-10-07', 100000, 100000, 0),
('BRG092', '2020-10-07', 12000, 12000, 0),
('BRG093', '2020-10-07', 100000, 100000, 0),
('BRG094', '2020-10-07', 120000, 120000, 0),
('BRG095', '2020-10-07', 480000, 480000, 0),
('BRG096', '2020-10-07', 50000, 50000, 0),
('BRG097', '2020-10-07', 10000, 10000, 0),
('BRG098', '2020-10-07', 84000, 84000, 0),
('BRG099', '2020-10-09', 5000, 4700, 300),
('BRG100', '2020-10-09', 4000, 3500, 500),
('BRG101', '2020-10-09', 105000, 104000, 1000),
('BRG102', '2020-10-09', 10500, 10500, 0),
('BRG103', '2020-10-09', 55000, 55000, 0),
('BRG104', '2020-10-09', 110000, 104000, 6000),
('BRG105', '2020-10-09', 51000, 26000, 25000),
('BRG106', '2020-10-10', 50000, 50000, 0),
('BRG107', '2020-10-10', 40000, 40000, 0),
('BRG108', '2020-10-10', 10000, 2000, 8000),
('BRG109', '2020-10-10', 50000, 5000, 45000),
('BRG110', '2020-10-10', 50000, 26000, 24000),
('BRG111', '2020-10-12', 50000, 600, 49400),
('BRG112', '2020-10-12', 5000, 600, 4400),
('BRG113', '2020-10-12', 26000, 26000, 0),
('BRG114', '2020-10-12', 100000, 8000, 92000),
('BRG115', '2020-10-12', 50000, 30000, 20000),
('BRG116', '2020-10-12', 10000, 10000, 0),
('BRG117', '2020-10-12', 100000, 80000, 20000),
('BRG118', '2020-10-12', 50000, 32000, 18000),
('BRG119', '2020-10-14', 66000, 66000, 0),
('BRG122', '2020-10-14', 5000, 5000, 0),
('BRG123', '2020-10-14', 20000, 20000, 0),
('BRG124', '2020-10-14', 15000, 15000, 0),
('BRG126', '2020-10-14', 22000, 22000, 0),
('BRG128', '2020-10-14', 100000, 28000, 72000),
('BRG129', '2020-10-14', 14000, 14000, 0),
('BRG130', '2020-10-14', 5000, 5000, 0),
('BRG131', '2020-10-15', 1000, 1000, 0),
('BRG132', '2020-10-15', 12000, 12000, 0),
('BRG133', '2020-10-15', 50000, 27000, 23000),
('BRG134', '2020-10-16', 5000, 5000, 0),
('BRG135', '2020-10-16', 1000, 600, 400),
('BRG136', '2020-10-16', 40000, 40000, 0),
('BRG137', '2020-10-16', 32000, 32000, 0),
('BRG139', '2020-10-16', 5000, 5000, 0),
('BRG140', '2020-10-16', 15000, 15000, 0),
('BRG141', '2020-10-16', 30000, 26000, 4000),
('BRG142', '2020-10-16', 50000, 22000, 28000),
('BRG143', '2020-10-17', 10000, 5000, 5000),
('BRG144', '2020-10-17', 50000, 9000, 41000),
('BRG145', '2020-10-17', 12000, 11500, 500),
('BRG146', '2020-10-17', 1000, 1000, 0),
('BRG147', '2020-10-17', 20000, 10000, 10000),
('BRG148', '2020-10-17', 52000, 52000, 0),
('BRG149', '2020-10-17', 20000, 18000, 2000),
('BRG150', '2020-10-17', 5000, 5000, 0),
('BRG151', '2020-10-17', 5000, 5000, 0),
('BRG152', '2020-10-19', 50000, 17500, 32500),
('BRG153', '2020-10-19', 10000, 10000, 0),
('BRG154', '2020-10-19', 20000, 20000, 0),
('BRG155', '2020-10-19', 50000, 20000, 30000),
('BRG156', '2020-10-19', 5000, 3500, 1500),
('BRG157', '2020-10-19', 10000, 8000, 2000),
('BRG158', '2020-10-19', 52000, 12000, 40000),
('BRG159', '2020-10-19', 55000, 55000, 0),
('BRG160', '2020-10-19', 10000, 10000, 0);

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
(1, 'jevi alvenosa', 'grafit', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pemeblian`),
  ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `no_nota` (`no_nota`);

--
-- Indeks untuk tabel `detail_penjualan_temp`
--
ALTER TABLE `detail_penjualan_temp`
  ADD KEY `no_nota` (`no_nota`);

--
-- Indeks untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`),
  ADD KEY `id_hutang` (`id_hutang`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`no_nota`);

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
  MODIFY `id_barang` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pemeblian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
