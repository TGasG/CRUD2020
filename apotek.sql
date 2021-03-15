-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2021 pada 01.24
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin123', 'admin'),
(2, 'juan', 'juan', 'juan12345', 'pengguna'),
(3, 'hiro', 'hiro', 'hiro12345', 'pengguna'),
(4, 'kevin', 'kevin', 'kevin12345', 'pengguna'),
(5, 'zidane', 'zidane', 'zidane12345', 'pengguna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kode_obat` char(9) NOT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  `bentuk_obat` varchar(6) DEFAULT NULL,
  `tgl_produksi` date DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL,
  `harga_satuan` int(6) DEFAULT 0,
  `jumlah_sedia` int(3) NOT NULL DEFAULT 0,
  `updated` datetime DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `bentuk_obat`, `tgl_produksi`, `tgl_kadaluarsa`, `harga_satuan`, `jumlah_sedia`, `updated`, `host`) VALUES
('ABCD12345', 'PARACETAMOL', 'SYRUP', '2021-01-01', '2021-01-28', 15000, 34, '2021-01-11 09:50:10', 'root@localhost'),
('KPRN51723', 'RHINNOS', 'KAPLET', '2017-02-02', '2023-01-31', 45000, 100, NULL, NULL),
('SLMNZ1520', 'MICONAZOLE', 'SALEP', '2015-09-15', '2020-09-14', 18000, 100, NULL, NULL),
('SRSCF1723', 'SUCRALFATE', 'SYRUP', '2017-03-23', '2023-03-20', 62500, 100, NULL, NULL),
('SRZNP1723', 'ZINCPRO', 'SYRUP', '2017-02-02', '2023-01-30', 15000, 100, NULL, NULL),
('TBALD1723', 'AMLODIPINE', 'TABLET', '2017-02-02', '2023-01-30', 51000, 100, NULL, NULL);

--
-- Trigger `obat`
--
DELIMITER $$
CREATE TRIGGER `get_datetime_and_host` BEFORE UPDATE ON `obat` FOR EACH ROW BEGIN
SET NEW.updated = NOW();
SET NEW.host = USER();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_ins_obat` BEFORE INSERT ON `obat` FOR EACH ROW SET NEW.nama_obat = UPPER(NEW.nama_obat);
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_upd_obat` BEFORE UPDATE ON `obat` FOR EACH ROW SET NEW.nama_obat = UPPER(NEW.nama_obat);
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_april`
--

CREATE TABLE `penjualan_april` (
  `kode_obat` char(9) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah_terjual` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan_april`
--

INSERT INTO `penjualan_april` (`kode_obat`, `tgl_transaksi`, `jumlah_terjual`) VALUES
('SLMNZ1520', '2019-04-05', 2),
('SRSCF1723', '2019-04-06', 2),
('SRZNP1723', '2019-04-07', 10),
('KPRN51723', '2019-04-08', 8),
('TBALD1723', '2019-04-09', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_februari`
--

CREATE TABLE `penjualan_februari` (
  `kode_obat` char(9) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah_terjual` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan_februari`
--

INSERT INTO `penjualan_februari` (`kode_obat`, `tgl_transaksi`, `jumlah_terjual`) VALUES
('SRZNP1723', '2019-02-02', 12),
('TBALD1723', '2019-02-10', 20),
('CDEF54321', '2021-02-17', 56);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_januari`
--

CREATE TABLE `penjualan_januari` (
  `kode_obat` char(9) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah_terjual` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan_januari`
--

INSERT INTO `penjualan_januari` (`kode_obat`, `tgl_transaksi`, `jumlah_terjual`) VALUES
('SLMNZ1520', '2019-01-15', 32),
('SRSCF1723', '2019-01-15', 14),
('SRZNP1723', '2019-01-15', 5),
('KPRN51723', '2019-01-15', 51),
('TBALD1723', '2019-01-15', 40),
('ABCD12345', '2021-01-07', 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_maret`
--

CREATE TABLE `penjualan_maret` (
  `kode_obat` char(9) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah_terjual` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan_maret`
--

INSERT INTO `penjualan_maret` (`kode_obat`, `tgl_transaksi`, `jumlah_terjual`) VALUES
('TBALD1723', '2019-03-30', 21),
('SLMNZ1520', '2019-03-21', 2),
('SRSCF1723', '2019-03-15', 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
