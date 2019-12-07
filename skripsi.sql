-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2019 pada 05.49
-- Versi server: 10.3.16-MariaDB
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
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_cust` int(11) NOT NULL,
  `nama_cust` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_cust`, `nama_cust`, `alamat`, `telepon`) VALUES
(1, 'agung', 'Jalan Kebagusan', 41185642);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal_pengantaran` date NOT NULL,
  `jam` time NOT NULL,
  `sales` varchar(20) NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_cust`, `status`, `tanggal_pengantaran`, `jam`, `sales`, `tanggal_input`) VALUES
(1, 1, 0, '2019-10-09', '17:49:00', '1', '2019-10-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_bahan`
--

CREATE TABLE `stok_bahan` (
  `id_bahan` char(2) NOT NULL,
  `nama_bhn` varchar(21) NOT NULL,
  `jumlah` decimal(3,0) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_bahan`
--

INSERT INTO `stok_bahan` (`id_bahan`, `nama_bhn`, `jumlah`, `satuan`) VALUES
('01', 'Tepung', '230', 'Gram'),
('02', 'Kanji', '30', 'Gram'),
('03', 'Garam', '30', 'Gram'),
('04', 'Cuka', '30', 'ML'),
('05', 'Caramel', '30', 'Gram'),
('06', 'Sakarin', '230', 'Gram'),
('07', 'TM', '292', 'Gram'),
('08', 'Gula cair', '977', 'ML'),
('09', 'Potasium Sorbate', '40', 'Gram'),
('10', 'Benzoat', '30', 'Gram'),
('11', 'Citrit', '20', 'Gram'),
('12', 'Pasta cabe', '20', 'Gram'),
('13', 'Capsio', '20', 'Gram'),
('14', 'Hanoman', '40', 'Gram'),
('15', 'Bawang', '40', 'Gram'),
('16', 'Sunset Yellow', '20', 'Gram'),
('17', 'Ponceau', '20', 'Gram'),
('18', 'Tartrazine', '40', 'Gram'),
('19', 'Ubi Jalar', '0', 'Gram'),
('20', 'Jeruk purut', '20', 'Buah'),
('21', 'Kacang kedelei', '40', 'Gram'),
('22', 'Lombok biji', '20', 'Gram'),
('23', 'Pewarna Makanan', '20', 'Gram');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_barang` char(2) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_barang`
--

INSERT INTO `stok_barang` (`id_barang`, `nama_brg`, `jumlah`, `harga`, `satuan`) VALUES
('01', 'Kecap Manis 3 Jeruk', 5, 6000, 'Botol'),
('02', 'Kecap Manis Cap Udang', 2, 12000, 'Botol'),
('03', 'Kecap Asin Biasa', 0, 55000, 'Jerigen'),
('04', 'Kecap Asin No 4', 0, 12000, 'Botol'),
('05', 'Saos Lombok No II', 0, 5000, 'Botol'),
('06', 'Sambal Cabe', 0, 7500, 'Botol'),
('07', 'Cuka', 0, 5000, 'Botol'),
('08', 'Tauco', 0, 20000, 'Bungkus'),
('09', 'Sambal Cabe ADT', 0, 7500, 'Bungkus'),
('10', 'Kecap Manis ADT', 0, 12000, 'Bungkus'),
('11', 'Saus Tomat', 0, 7500, 'Botol'),
('12', 'Saus Tomat ADT', 0, 7500, 'Bungkus'),
('13', 'Tomat(5Ltr)', 0, 55000, 'Jerigen'),
('14', 'Sambal(5Ltr)', 0, 55000, 'Jerigen'),
('15', 'Kecap Masin Tiga Jeruk(5Ltr)', 0, 55000, 'Jerigen'),
('16', 'Kecap Masin Udang(5Ltr)', 0, 80000, 'Jerigen'),
('17', 'Kecap Asin(5Ltr)', 0, 80000, 'Jerigen'),
('18', 'Tomat(20Ltr)', 0, 190000, 'Jerigen'),
('19', 'Sambal(20Ltr)', 0, 190000, 'Jerigen'),
('20', 'Kecap Manis Udang(20Ltr)', 0, 285000, 'Jerigen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_pesanan`
--

CREATE TABLE `tb_data_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_barang` char(3) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_data_pesanan`
--

INSERT INTO `tb_data_pesanan` (`id_pesanan`, `id_barang`, `nama_barang`, `jumlah`, `status`) VALUES
(1, '01', 'Kecap Manis 3 Jeruk', 15, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `notelp` int(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `alamat`, `notelp`, `status`) VALUES
(1, 'tes', 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'tes', 4623775, 'Admin'),
(2, 'Ivan', 'ivan', '81dc9bdb52d04dc20036dbd8313ed055', 'jalan', 411451859, 'Produksi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `stok_bahan`
--
ALTER TABLE `stok_bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
