-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2020 pada 13.38
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `finance`
--

CREATE TABLE `finance` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email_finance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `finance`
--

INSERT INTO `finance` (`id`, `nama`, `email_finance`) VALUES
('FN001', 'Finance Example 1', 'finstarna2@gmail.com'),
('FN002', 'Finance Example 2', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `freelance`
--

CREATE TABLE `freelance` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_telp_fl` varchar(15) NOT NULL,
  `no_hp_fl` varchar(15) NOT NULL,
  `email_fl` varchar(50) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `bank` varchar(50) NOT NULL,
  `no_akun` varchar(20) NOT NULL,
  `bahasa_awal` varchar(10) NOT NULL,
  `bahasa_akhir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `freelance`
--

INSERT INTO `freelance` (`id`, `nama`, `no_telp_fl`, `no_hp_fl`, `email_fl`, `rate`, `bank`, `no_akun`, `bahasa_awal`, `bahasa_akhir`) VALUES
('FL001', 'Freelance Example 1', '', '0875754368', 'freelnastar1@gmail.com', 70, 'BCA', '0083637266', 'Inggris', 'Indonesia'),
('FL002', 'Freelance Example 2', '', '0877996699', 'freelnastar2@gmail.com', 100, 'BNI', '7846374', 'German', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` varchar(20) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `id_po` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `tgl`, `id_po`) VALUES
('I-06090220am', '2020-06-09', 'PO-TS001'),
('I-06090220am', '2020-06-09', 'PO-TS002'),
('I-06090250am', '2020-06-09', 'PO-TS003'),
('I-06090250am', '2020-06-09', 'PO-TS004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` varchar(10) NOT NULL,
  `nama_pekerjaan` varchar(100) DEFAULT NULL,
  `id_pm` varchar(10) DEFAULT NULL,
  `id_fl` varchar(10) NOT NULL,
  `status` enum('Sedang Dikerjakan','Menunggu PO','Siap Invoice','Sudah Invoice','Selesai Pembayaran') NOT NULL,
  `file_asal` text NOT NULL,
  `file_selesai` text NOT NULL,
  `detail` text NOT NULL,
  `deadline` date NOT NULL,
  `wc_xtranslated` int(11) NOT NULL,
  `w_xtranslated` int(11) NOT NULL,
  `wc_repetition` int(11) NOT NULL,
  `w_repetition` int(11) NOT NULL,
  `wc_fuzzy100` int(11) NOT NULL,
  `w_fuzzy100` int(11) NOT NULL,
  `wc_fuzzy95` int(11) NOT NULL,
  `w_fuzzy95` int(11) NOT NULL,
  `wc_fuzzy85` int(11) NOT NULL,
  `w_fuzzy85` int(11) NOT NULL,
  `wc_fuzzy75` int(11) NOT NULL,
  `w_fuzzy75` int(11) NOT NULL,
  `wc_fuzzy50` int(11) NOT NULL,
  `w_fuzzy50` int(11) NOT NULL,
  `wc_nomatch` int(11) NOT NULL,
  `w_nomatch` int(11) NOT NULL,
  `bahasa_asal` varchar(20) NOT NULL,
  `bahasa_target` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`, `id_pm`, `id_fl`, `status`, `file_asal`, `file_selesai`, `detail`, `deadline`, `wc_xtranslated`, `w_xtranslated`, `wc_repetition`, `w_repetition`, `wc_fuzzy100`, `w_fuzzy100`, `wc_fuzzy95`, `w_fuzzy95`, `wc_fuzzy85`, `w_fuzzy85`, `wc_fuzzy75`, `w_fuzzy75`, `wc_fuzzy50`, `w_fuzzy50`, `wc_nomatch`, `w_nomatch`, `bahasa_asal`, `bahasa_target`, `currency`) VALUES
('TS001', 'Project Example 1', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS001.rar', 'SLSTS001.zip', 'tes 1', '2020-06-10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1900, 100, 'Inggris', 'Indonesia', 'IDR'),
('TS002', 'Project Example 2', 'PM002', 'FL001', 'Selesai Pembayaran', 'TS002.pdf', 'SLSTS002.zip', 'tes 2', '2020-06-10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1808, 100, 'German', 'Indonesia', 'IDR'),
('TS003', 'Project Example 3', 'PM001', 'FL002', 'Selesai Pembayaran', 'TS003.rar', 'SLSTS003.zip', 'test 2', '2020-06-10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1200, 100, 'German', 'Indonesia', 'IDR'),
('TS004', 'Project Example 4', 'PM002', 'FL002', 'Selesai Pembayaran', 'TS004.rar', 'SLSTS004.zip', 'test 2', '2020-06-10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1000, 100, 'German', 'Indonesia', 'IDR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pm`
--

CREATE TABLE `pm` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_telp_pm` varchar(15) NOT NULL,
  `fax_pm` varchar(15) NOT NULL,
  `email_pm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pm`
--

INSERT INTO `pm` (`id`, `nama`, `no_telp_pm`, `fax_pm`, `email_pm`) VALUES
('PM001', 'Project Manager Example 1', '0893648637', '0893648783', 'pmstarna1@gmail.com'),
('PM002', 'Project Manager Example 2', '0894637254', '0876478394', 'pmstarna2@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `id_po` varchar(10) NOT NULL,
  `tgl` date DEFAULT NULL,
  `id_pekerjaan` varchar(10) DEFAULT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_fl` varchar(10) DEFAULT NULL,
  `id_pm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`id_po`, `tgl`, `id_pekerjaan`, `total_bayar`, `id_fl`, `id_pm`) VALUES
('PO-TS001', '2020-06-09', 'TS001', 133000, 'FL001', 'PM001'),
('PO-TS002', '2020-06-09', 'TS002', 126560, 'FL001', 'PM002'),
('PO-TS003', '2020-06-09', 'TS003', 120000, 'FL002', 'PM001'),
('PO-TS004', '2020-06-09', 'TS004', 100000, 'FL002', 'PM002');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tampil_pekerjaan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tampil_pekerjaan` (
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `level` enum('admin','pm','fl','finance') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `id_user`, `level`) VALUES
(1, 'admin', 'admin', 'AD001', 'admin'),
(2, 'fl1', 'fl1', 'FL001', 'fl'),
(3, 'fl2', 'fl2', 'FL002', 'fl'),
(4, 'pm1', 'pm1', 'PM001', 'pm'),
(5, 'pm2', 'pm2', 'PM002', 'pm'),
(6, 'finance1', 'finance1', 'FN001', 'finance');

-- --------------------------------------------------------

--
-- Struktur untuk view `tampil_pekerjaan`
--
DROP TABLE IF EXISTS `tampil_pekerjaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tampil_pekerjaan`  AS  select `pekerjaan`.`id_pekerjaan` AS `id_pekerjaan`,`pekerjaan`.`nama_pekerjaan` AS `nama_pekerjaan`,`pekerjaan`.`total_kata` AS `total_kata`,`pm`.`nama_pm` AS `nama_pm`,`freelance`.`nama_fl` AS `nama_fl`,`pekerjaan`.`status` AS `STATUS` from ((`pekerjaan` join `pm`) join `freelance`) where ((`pekerjaan`.`id_pm` = `pm`.`id_pm`) and (`freelance`.`id_fl` = `pekerjaan`.`id_fl`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `freelance`
--
ALTER TABLE `freelance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD KEY `FK_invoice` (`id_po`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `FK_pekerjaan` (`id_pm`),
  ADD KEY `FK_fl_pekerjaan` (`id_fl`);

--
-- Indeks untuk tabel `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id_po`),
  ADD KEY `FK_po` (`id_pekerjaan`),
  ADD KEY `FK_po_fl` (`id_fl`),
  ADD KEY `FK_po3` (`id_pm`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `FK_invoice` FOREIGN KEY (`id_po`) REFERENCES `po` (`id_po`);

--
-- Ketidakleluasaan untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `FK_fl_pekerjaan` FOREIGN KEY (`id_fl`) REFERENCES `freelance` (`id`),
  ADD CONSTRAINT `FK_pekerjaan` FOREIGN KEY (`id_pm`) REFERENCES `pm` (`id`);

--
-- Ketidakleluasaan untuk tabel `po`
--
ALTER TABLE `po`
  ADD CONSTRAINT `FK_po` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id_pekerjaan`),
  ADD CONSTRAINT `FK_po3` FOREIGN KEY (`id_pm`) REFERENCES `pm` (`id`),
  ADD CONSTRAINT `FK_po_fl` FOREIGN KEY (`id_fl`) REFERENCES `freelance` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
