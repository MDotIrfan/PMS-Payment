-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2020 pada 08.10
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
  `email_finance` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `finance`
--

INSERT INTO `finance` (`id`, `nama`, `email_finance`, `alamat`, `jenis_kelamin`, `no_hp`, `foto`) VALUES
('FN001', 'Putri', 'finstarna2@gmail.com', 'Jln. Siliwangi, Sleman', 'P', '08937463874', 'FN001.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `freelance`
--

CREATE TABLE `freelance` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_telp_fl` varchar(15) NOT NULL,
  `no_hp_fl` varchar(15) NOT NULL,
  `email_fl` varchar(50) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `bank` varchar(50) NOT NULL,
  `no_akun` varchar(20) NOT NULL,
  `bahasa_awal` varchar(10) NOT NULL,
  `bahasa_akhir` varchar(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `freelance`
--

INSERT INTO `freelance` (`id`, `nama`, `alamat`, `jenis_kelamin`, `no_telp_fl`, `no_hp_fl`, `email_fl`, `rate`, `bank`, `no_akun`, `bahasa_awal`, `bahasa_akhir`, `foto`) VALUES
('FL001', 'Muhammad Irfan', 'Jln. Bukit Katapang No. 40, Bandung', 'L', '', '0875754368', 'freelnastar1@gmail.com', 70, 'BCA', '0083637266', 'Inggris', 'Indonesia', 'FL0014.jpg'),
('FL002', 'Lalu Achmad Wiraharlan', 'Jln. Godean, Sleman', 'L', '', '0877996699', 'freelnastar2@gmail.com', 100, 'BNI', '7846374', 'German', 'Indonesia', 'FL002.jpg');

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
('I-06110855am', '2020-06-11', 'PO-TS002'),
('I-06190556am', '2020-06-19', 'PO-TS003'),
('I-06190556am', '2020-06-19', 'PO-TS004'),
('I-06190823am', '2020-06-19', 'PO-TS005'),
('I-06240512am', '2020-06-24', 'PO-TS006'),
('I-07010541am', '2020-07-01', 'PO-TS007'),
('I-07010624am', '2020-07-01', 'PO-TS009'),
('I-07070909am', '2020-07-07', 'PO-TS010'),
('I-07070909am', '2020-07-07', 'PO-TS011'),
('I-07070940am', '2020-07-07', 'PO-TS012'),
('I-07080524am', '2020-07-08', 'PO-TS008'),
('I-07080524am', '2020-07-08', 'PO-TS013'),
('I-07131024pm', '2020-07-13', 'PO-TS014'),
('I-07131024pm', '2020-07-13', 'PO-TS015'),
('I-07131035pm', '2020-07-13', 'PO-TS016'),
('I-07140406am', '2020-07-14', 'PO-TS017'),
('I-07140555am', '2020-07-14', 'PO-TS018'),
('I-07140555am', '2020-07-14', 'PO-TS019'),
('I-07161201pm', '2020-07-16', 'PO-TS021');

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
  `wc_repetition` int(11) NOT NULL,
  `wc_fuzzy100` int(11) NOT NULL,
  `wc_fuzzy95` int(11) NOT NULL,
  `wc_fuzzy85` int(11) NOT NULL,
  `wc_fuzzy75` int(11) NOT NULL,
  `wc_fuzzy50` int(11) NOT NULL,
  `wc_nomatch` int(11) NOT NULL,
  `bahasa_asal` varchar(20) NOT NULL,
  `bahasa_target` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`, `id_pm`, `id_fl`, `status`, `file_asal`, `file_selesai`, `detail`, `deadline`, `wc_xtranslated`, `wc_repetition`, `wc_fuzzy100`, `wc_fuzzy95`, `wc_fuzzy85`, `wc_fuzzy75`, `wc_fuzzy50`, `wc_nomatch`, `bahasa_asal`, `bahasa_target`, `currency`) VALUES
('TS002', 'Project Example 2.1', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS002.rar', 'SLSTS002.zip', 'test 2', '2020-06-12', 0, 0, 0, 0, 0, 0, 0, 100, 'German', 'Indonesia', 'IDR'),
('TS003', 'Project Example 3', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS003.rar', 'SLSTS003.zip', 'test 3', '2020-06-20', 0, 0, 0, 0, 0, 0, 0, 100, 'Inggris', 'Indonesia', 'IDR'),
('TS004', 'Project Example 4', 'PM002', 'FL001', 'Selesai Pembayaran', 'TS004.pdf', 'SLSTS004.pdf', '', '2020-06-19', 0, 0, 0, 0, 0, 0, 0, 120, 'German', 'Indonesia', 'IDR'),
('TS005', 'contoh pekerjaan 1', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS005.rar', 'SLSTS005.pdf', 'contoh 1', '2020-06-20', 0, 0, 0, 0, 0, 0, 0, 150, 'Inggris', 'Indonesia', 'IDR'),
('TS006', 'Project Example 7', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS006.rar', 'SLSTS006.pdf', 'contoh pekerjaan 7', '2020-06-24', 0, 0, 0, 0, 0, 0, 0, 260, 'Inggris', 'Indonesia', 'IDR'),
('TS007', 'Project Example 7', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS007.pdf', 'SLSTS007.pdf', 'testing projek', '2020-07-01', 0, 0, 0, 0, 0, 0, 0, 100, '', '', 'IDR'),
('TS008', 'Project Example 8', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS008.pdf', 'SLSTS008.zip', 'tes', '2020-07-02', 0, 0, 0, 0, 0, 0, 0, 450, '', '', 'IDR'),
('TS009', 'Project Example 9', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS009.pdf', 'SLSTS009.pdf', 'tes pekerjaan', '2020-07-02', 0, 0, 0, 0, 0, 0, 0, 100, '', '', 'IDR'),
('TS010', 'Project Example 10', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS010.pdf', 'SLSTS010.pdf', 'tes pekerjaan', '2020-07-02', 0, 0, 0, 0, 0, 0, 0, 200, '', '', 'IDR'),
('TS011', 'Project Example 1', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS011.rar', 'SLSTS011.zip', 'coba assign projek', '2020-07-09', 0, 0, 0, 0, 0, 0, 0, 100, '', '', 'IDR'),
('TS012', 'task 1', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS012.rar', 'SLSTS012.zip', 'coba assign projek', '2020-07-09', 0, 0, 0, 0, 0, 0, 0, 190, '', '', 'IDR'),
('TS013', 'Project Example 3', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS013.docx', 'SLSTS013.pdf', 'coba', '2020-07-10', 0, 0, 0, 0, 0, 0, 0, 100, '', '', 'IDR'),
('TS014', 'Project Example 3', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS014.pdf', 'SLSTS014.zip', 'testing', '2020-07-14', 0, 0, 0, 0, 0, 0, 0, 140, '', '', 'IDR'),
('TS015', 'coba lagi', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS015.rar', 'SLSTS015.pdf', 'tes', '2020-07-16', 0, 0, 0, 0, 0, 0, 70, 100, '', '', 'IDR'),
('TS016', 'cobacoba', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS016.pdf', 'SLSTS016.zip', 'tes 1', '2020-07-16', 0, 0, 0, 0, 0, 0, 90, 100, '', '', 'IDR'),
('TS017', 'coba terakhir', 'PM001', 'FL001', 'Sudah Invoice', 'TS017.rar', 'SLSTS017.pdf', 'ss', '2020-07-15', 0, 0, 0, 0, 0, 0, 20, 189, '', '', 'IDR'),
('TS018', 'coba terakhir 2', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS018.pdf', 'SLSTS018.zip', 'ssss', '2020-07-16', 0, 0, 0, 0, 0, 0, 0, 120, '', '', 'IDR'),
('TS019', 'tes pekerjaan 1', 'PM001', 'FL001', 'Selesai Pembayaran', 'TS019.rar', 'SLSTS019.pdf', 'coba pekerjaan 1', '2020-07-15', 0, 0, 0, 0, 0, 0, 0, 100, '', '', 'IDR'),
('TS020', 'tes pekerjaan 2', 'PM001', 'FL002', 'Siap Invoice', 'TS020.pdf', 'SLSTS020.pdf', 'coba pekerjaan 2', '2020-07-15', 0, 0, 0, 0, 0, 0, 100, 230, '', '', 'IDR'),
('TS021', 'tes pekerjaan 3', 'PM002', 'FL001', 'Sudah Invoice', 'TS021.rar', 'SLSTS021.zip', 'coba pekerjaan 3', '2020-07-15', 0, 0, 0, 0, 0, 0, 0, 5751, '', '', 'IDR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pm`
--

CREATE TABLE `pm` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_telp_pm` varchar(15) NOT NULL,
  `fax_pm` varchar(15) NOT NULL,
  `email_pm` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pm`
--

INSERT INTO `pm` (`id`, `nama`, `alamat`, `jenis_kelamin`, `no_telp_pm`, `fax_pm`, `email_pm`, `foto`) VALUES
('PM001', 'Sigit Wibisono', 'Jln. Kaliurang, Sleman', 'L', '0893648637', '0893648783', 'pmstarna1@gmail.com', 'PM001.jpg'),
('PM002', 'Sikas Rifki', 'Jln. Kenanga, Sleman', 'L', '0894637254', '0876478394', 'pmstarna2@gmail.com', 'PM002.jpg');

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
('PO-TS002', '2020-06-11', 'TS002', 7000, 'FL001', 'PM001'),
('PO-TS003', '2020-06-19', 'TS003', 7000, 'FL001', 'PM001'),
('PO-TS004', '2020-06-19', 'TS004', 8400, 'FL001', 'PM002'),
('PO-TS005', '2020-06-19', 'TS005', 10500, 'FL001', 'PM001'),
('PO-TS006', '2020-06-24', 'TS006', 18200, 'FL001', 'PM001'),
('PO-TS007', '2020-07-01', 'TS007', 7000, 'FL001', 'PM001'),
('PO-TS008', '2020-07-01', 'TS008', 31500, 'FL001', 'PM001'),
('PO-TS009', '2020-07-01', 'TS009', 7000, 'FL001', 'PM001'),
('PO-TS010', '2020-07-01', 'TS010', 14000, 'FL001', 'PM001'),
('PO-TS011', '2020-07-07', 'TS011', 7000, 'FL001', 'PM001'),
('PO-TS012', '2020-07-07', 'TS012', 13300, 'FL001', 'PM001'),
('PO-TS013', '2020-07-08', 'TS013', 7000, 'FL001', 'PM001'),
('PO-TS014', '2020-07-13', 'TS014', 100, 'FL001', 'PM001'),
('PO-TS015', '2020-07-13', 'TS015', 0, 'FL001', 'PM001'),
('PO-TS016', '2020-07-13', 'TS016', 6790, 'FL001', 'PM001'),
('PO-TS017', '2020-07-14', 'TS017', 10864, 'FL001', 'PM001'),
('PO-TS018', '2020-07-14', 'TS018', 8400, 'FL001', 'PM001'),
('PO-TS019', '2020-07-14', 'TS019', 7000, 'FL001', 'PM001'),
('PO-TS020', '2020-07-16', 'TS020', 33000, 'FL002', 'PM001'),
('PO-TS021', '2020-07-16', 'TS021', 402570, 'FL001', 'PM002');

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
(6, 'fn1', 'fn1', 'FN001', 'finance');

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
