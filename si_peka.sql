-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2021 pada 13.56
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_peka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kendaraan`
--

CREATE TABLE `data_kendaraan` (
  `data_kendaraan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `merk_kendaraan` varchar(128) NOT NULL,
  `warna_kendaraan` varchar(128) NOT NULL,
  `nomor_bmn` varchar(128) NOT NULL,
  `nomor_stnk` varchar(128) NOT NULL,
  `nomor_rangka` varchar(128) NOT NULL,
  `tahun_pembuatan` date NOT NULL,
  `kondisi_kendaraan` varchar(128) NOT NULL,
  `jenis_kendaraan` int(2) NOT NULL COMMENT '1: motor 2:mobil 3:bus',
  `seri_kendaraan` varchar(128) NOT NULL,
  `jenis_bbm` int(4) NOT NULL COMMENT '1:pertamax 2:pertamax turbo 3:pertalite 4:Premium 5:solar',
  `nup` varchar(128) NOT NULL,
  `nomor_bpkb` varchar(128) NOT NULL,
  `nomor_mesin` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kendaraan`
--

INSERT INTO `data_kendaraan` (`data_kendaraan_id`, `user_id`, `merk_kendaraan`, `warna_kendaraan`, `nomor_bmn`, `nomor_stnk`, `nomor_rangka`, `tahun_pembuatan`, `kondisi_kendaraan`, `jenis_kendaraan`, `seri_kendaraan`, `jenis_bbm`, `nup`, `nomor_bpkb`, `nomor_mesin`, `created`, `updated`) VALUES
(10, 23, 'Zentrum', 'Hitam', '12345', '12345', '12345', '2021-06-01', 'Sangat Baik', 3, 'BUS Zentrum Double Deck', 1, '12345', '12345', '12345', '2021-06-01 17:33:56', '0000-00-00 00:00:00'),
(11, 24, 'Honda', 'Merah', '22222', '22222', '22222', '2021-05-31', 'Sangat Baik', 1, 'PCX 150 Limited Edition', 3, '22222', '22222', '22222', '2021-06-01 17:35:21', '0000-00-00 00:00:00'),
(12, 25, 'Toyota', 'Hitam', '33333', '33333', '33333', '2016-06-08', 'Baik', 2, 'Innova Reborn AT', 1, '33333', '33333', '33333', '2021-06-04 22:53:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_perbaikan`
--

CREATE TABLE `invoice_perbaikan` (
  `invoice_perbaikan_id` int(11) NOT NULL,
  `kode_invoice_perbaikan` varchar(128) NOT NULL,
  `usulan_perbaikan_id` int(11) NOT NULL,
  `tanggal_invoice` date NOT NULL,
  `penyedia_jasa_id` int(11) NOT NULL,
  `nilai_invoice` int(11) DEFAULT NULL,
  `status_invoice` int(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_perbaikan`
--

INSERT INTO `invoice_perbaikan` (`invoice_perbaikan_id`, `kode_invoice_perbaikan`, `usulan_perbaikan_id`, `tanggal_invoice`, `penyedia_jasa_id`, `nilai_invoice`, `status_invoice`, `created`, `updated`) VALUES
(4, 'BBWSPJ-SMG/AHASS/03-06-21/248635910', 43, '2021-06-01', 1, 1000000, 0, '2021-06-03 12:55:40', '0000-00-00 00:00:00'),
(5, 'BBWSPJ-SMG/AHASS/03-06-21/127634805', 44, '2021-06-03', 1, 5750000, 0, '2021-06-03 23:16:52', '0000-00-00 00:00:00'),
(6, 'BBWSPJ-SMG/AHASS/04-06-21/954326017', 45, '2021-06-04', 4, 6000000, 0, '2021-06-04 23:13:28', '0000-00-00 00:00:00'),
(7, 'BBWSPJ-SMG/AHASS/09-06-21/823071596', 50, '2021-06-09', 1, 300, 0, '2021-06-09 14:29:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_perpanjangan`
--

CREATE TABLE `invoice_perpanjangan` (
  `invoice_perpanjangan_id` int(11) NOT NULL,
  `penyedia_jasa_id` int(11) NOT NULL,
  `perpanjangan_stnk_id` int(11) NOT NULL,
  `kode_invoice_perpanjangan` varchar(128) NOT NULL,
  `tanggal_invoice` date NOT NULL,
  `nilai_invoice` int(11) NOT NULL,
  `status_invoice` int(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_perpanjangan`
--

INSERT INTO `invoice_perpanjangan` (`invoice_perpanjangan_id`, `penyedia_jasa_id`, `perpanjangan_stnk_id`, `kode_invoice_perpanjangan`, `tanggal_invoice`, `nilai_invoice`, `status_invoice`, `created`, `updated`) VALUES
(1, 2, 2, 'BBWSPJ-SMG/SAMSAT/03-06-21/193805264', '2021-06-03', 575000, 0, '2021-06-03 23:35:34', '0000-00-00 00:00:00'),
(2, 2, 3, 'BBWSPJ-SMG/SAMSAT/03-06-21/498035127', '2021-06-03', 780000, 0, '2021-06-03 23:35:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kwitansi_perbaikan`
--

CREATE TABLE `kwitansi_perbaikan` (
  `kwitansi_perbaikan_id` int(11) NOT NULL,
  `penyedia_jasa_id` int(11) NOT NULL,
  `kode_kwitansi_perbaikan` varchar(128) NOT NULL,
  `tanggal_kwitansi` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kwitansi_perbaikan`
--

INSERT INTO `kwitansi_perbaikan` (`kwitansi_perbaikan_id`, `penyedia_jasa_id`, `kode_kwitansi_perbaikan`, `tanggal_kwitansi`, `created`, `updated`) VALUES
(2, 1, 'KWT/PRP/PPK-KTL/VII/03-06-21/136850274', '2021-06-03', '2021-06-03 23:16:27', '0000-00-00 00:00:00'),
(3, 1, 'KWT/PRP/PPK-KTL/VII/04-06-21/145306297', '2021-06-04', '2021-06-04 23:13:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kwitansi_perpanjangan`
--

CREATE TABLE `kwitansi_perpanjangan` (
  `kwitansi_perpanjangan_id` int(11) NOT NULL,
  `penyedia_jasa_id` int(11) NOT NULL,
  `kode_kwitansi_perpanjangan` varchar(128) NOT NULL,
  `tanggal_kwitansi` date NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kwitansi_perpanjangan`
--

INSERT INTO `kwitansi_perpanjangan` (`kwitansi_perpanjangan_id`, `penyedia_jasa_id`, `kode_kwitansi_perpanjangan`, `tanggal_kwitansi`, `created`, `updated`) VALUES
(1, 2, 'KWT/PRP/PPK-KTL/VII/03-06-21/365187092', '2021-06-09', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyedia_jasa`
--

CREATE TABLE `penyedia_jasa` (
  `penyedia_jasa_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyedia_jasa`
--

INSERT INTO `penyedia_jasa` (`penyedia_jasa_id`, `nama`, `phone`, `alamat`, `created`, `updated`) VALUES
(1, 'AHASS Motor - Cabang Pedurungan', '085747281937', 'JL. Majapahit No 78 Semarang', '2021-04-08 16:25:14', '2021-06-04 17:39:12'),
(2, 'SAMSAT Online 1', '0812233445577', 'Jl Brigjend Sudiarto No.10 Semarang\r\n', '2021-04-08 16:27:15', '2021-04-08 11:33:23'),
(4, 'AHASS Motor - Cabang Gemah', '081122334455', 'Jl. Gemah Raya No.19', '2021-06-04 22:46:02', NULL),
(5, 'Samsat Online - Cabang Simpang Lima', '024-8890223', 'Jl. Simpan lima , Semarang', '2021-06-04 22:48:33', '2021-06-04 17:49:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpanjangan_stnk`
--

CREATE TABLE `perpanjangan_stnk` (
  `perpanjangan_stnk_id` int(11) NOT NULL,
  `kode_perpanjangan` varchar(128) DEFAULT NULL,
  `tanggal_perpanjangan` date NOT NULL,
  `nomor_polisi` varchar(128) DEFAULT NULL,
  `pemegang_kendaraan` varchar(128) DEFAULT NULL,
  `jenis_perpanjangan` int(1) DEFAULT NULL,
  `status_perpanjangan` int(2) NOT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perpanjangan_stnk`
--

INSERT INTO `perpanjangan_stnk` (`perpanjangan_stnk_id`, `kode_perpanjangan`, `tanggal_perpanjangan`, `nomor_polisi`, `pemegang_kendaraan`, `jenis_perpanjangan`, `status_perpanjangan`, `foto`, `created`, `updated`) VALUES
(2, 'BBWSPJ-SMG/Perpanjangan/02-06-21/716382504', '2021-06-02', 'H3333CC', 'Endy Kristianto', 1, 1, 'perpanjangan-stnkbpkb-210602-0c6bd986cf.jpg', '2021-06-02 13:41:57', '0000-00-00 00:00:00'),
(3, 'BBWSPJ-SMG/Perpanjangan/02-06-21/809465132', '2021-06-02', 'H3333CC', 'Endy Kristianto', 2, 2, 'perpanjangan-stnkbpkb-210602-01653c3878.jpg', '2021-06-02 13:42:26', '0000-00-00 00:00:00'),
(4, 'BBWSPJ-SMG/Perpanjangan/04-06-21/591683240', '2021-06-04', 'H3333CC', 'Endy Kristianto', 2, 0, NULL, '2021-06-04 23:18:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satker`
--

CREATE TABLE `satker` (
  `satker_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satker`
--

INSERT INTO `satker` (`satker_id`, `nama`, `created`, `updated`) VALUES
(9, 'SISDA', '2021-04-12 17:32:34', '2021-04-12 12:33:48'),
(10, 'SISKU', '2021-04-12 17:32:41', '2021-04-12 12:33:57'),
(11, 'Satker Bendungan', '2021-04-12 17:34:16', '2021-05-23 11:33:32'),
(12, 'Broadcasting', '2021-04-12 17:34:33', '0000-00-00 00:00:00'),
(13, 'Saker Balai', '2021-04-15 22:19:07', '2021-05-23 11:33:17'),
(14, 'Pemantau Lapangan', '2021-04-16 20:26:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart`
--

CREATE TABLE `sparepart` (
  `sparepart_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sparepart`
--

INSERT INTO `sparepart` (`sparepart_id`, `nama`, `created`, `updated`) VALUES
(1, 'Ban(All)', '2021-04-12 16:41:50', '2021-04-12 11:43:04'),
(2, 'Aki(All)', '2021-04-12 16:42:00', '2021-04-12 11:42:54'),
(3, 'AC(Mobil,Bus)', '2021-04-12 16:42:16', '2021-04-12 11:42:42'),
(4, 'Shockbeker(All)', '2021-04-12 16:42:31', '0000-00-00 00:00:00'),
(6, 'Dinamo(All)', '2021-04-12 16:59:51', '2021-04-12 12:11:02'),
(8, 'Oli(All)', '2021-04-12 17:12:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_pemeriksa`
--

CREATE TABLE `tim_pemeriksa` (
  `tim_pemeriksa_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `npp` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tim_pemeriksa`
--

INSERT INTO `tim_pemeriksa` (`tim_pemeriksa_id`, `nama`, `npp`, `jabatan`, `alamat`) VALUES
(1, 'Pamungkas', '0000000000', 'Kepala Bidang Keuangan', 'Semarang'),
(3, 'Bambang', '1111111111', 'Pengamat Lapangan', 'Jl. Gajah Raya No. 9 Semarang'),
(5, 'Joko Susilo', '2222222', 'Kepala Seksi', 'Gubug');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `nomor_p` varchar(128) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `npp` varchar(128) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin 2:user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `nomor_p`, `password`, `name`, `address`, `npp`, `level`) VALUES
(21, 'admin', 'H1111AA', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Reza Iqbal Ardiansyah', 'Mranggen, Demak', '1111111111', 1),
(23, 'User 1', 'H1234BJE', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Fery Agustoni', 'Tegal, Jawa Tengah', '987654321', 2),
(24, 'User 2', 'H2222AA', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Syarif Hidayat', 'Jamus, Semarang', '222222222', 2),
(25, 'User 3', 'H3333CC', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Endy Kristianto', 'Banjarnegara, Jawa Tengah', '333333333', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulan_perbaikan`
--

CREATE TABLE `usulan_perbaikan` (
  `usulan_perbaikan_id` int(11) NOT NULL,
  `data_kendaraan_id` int(11) NOT NULL,
  `kode_usulan` varchar(128) DEFAULT NULL,
  `tanggal_usulan` date NOT NULL,
  `nomor_polisi` varchar(128) DEFAULT NULL,
  `pemegang_kendaraan` varchar(128) DEFAULT NULL,
  `jenis_perbaikan` varchar(128) DEFAULT NULL,
  `status_perbaikan` int(2) DEFAULT NULL COMMENT '0 = proses ; 1 = selesai ; 2 = ditolak',
  `service_rutin` int(2) NOT NULL COMMENT '1:Ya  2:Tidak',
  `catatan_perbaikan` varchar(128) DEFAULT NULL,
  `nama_atasan` int(5) NOT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usulan_perbaikan`
--

INSERT INTO `usulan_perbaikan` (`usulan_perbaikan_id`, `data_kendaraan_id`, `kode_usulan`, `tanggal_usulan`, `nomor_polisi`, `pemegang_kendaraan`, `jenis_perbaikan`, `status_perbaikan`, `service_rutin`, `catatan_perbaikan`, `nama_atasan`, `foto`, `created`, `updated`) VALUES
(43, 11, 'BBWSPJ-SMG/Usulan-Perbaikan/01-06-21/719345062', '2021-06-02', 'H2222AA', 'Syarif Hidayat', 'Ganti AKI', 1, 1, 'AKI mati', 1, 'usulan-perbaikan-210601-c45f28a677.jpg', '2021-06-02 00:48:23', '0000-00-00 00:00:00'),
(44, 10, 'BBWSPJ-SMG/Usulan-Perbaikan/02-06-21/172349685', '2021-06-02', 'H1234BJE', 'Fery Agustoni', 'Ganti Cat', 2, 2, 'Cat Kusam', 1, 'usulan-perbaikan-210602-4979863e62.jpg', '2021-06-02 09:17:18', '0000-00-00 00:00:00'),
(48, 12, 'BBWSPJ-SMG/Usulan-Perbaikan/04-06-21/153048296', '2021-06-04', 'H3333CC', 'Endy Kristianto', 'Ganti Fanbelt', 0, 2, 'Dinamo Startert mati', 2, NULL, '2021-06-04 23:18:51', '0000-00-00 00:00:00'),
(49, 12, 'BBWSPJ-SMG/Usulan-Perbaikan/09-06-21/935762418', '2021-06-09', 'H3333CC', 'Endy Kristianto', 'Ganti AKI', 0, 1, 'Aki Hilang', 1, 'usulan-perbaikan-210609-b2059bd3ad.jpg', '2021-06-09 12:34:46', '0000-00-00 00:00:00'),
(50, 12, 'BBWSPJ-SMG/Usulan-Perbaikan/09-06-21/216980354', '2021-06-09', 'H3333CC', 'Endy Kristianto', 'Ganti Lampu', 1, 1, 'Lampu depan mati', 1, 'usulan-perbaikan-210609-f0368cf30e.jpg', '2021-06-09 14:26:15', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kendaraan`
--
ALTER TABLE `data_kendaraan`
  ADD PRIMARY KEY (`data_kendaraan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `invoice_perbaikan`
--
ALTER TABLE `invoice_perbaikan`
  ADD PRIMARY KEY (`invoice_perbaikan_id`),
  ADD UNIQUE KEY `indeks` (`kode_invoice_perbaikan`);

--
-- Indeks untuk tabel `invoice_perpanjangan`
--
ALTER TABLE `invoice_perpanjangan`
  ADD PRIMARY KEY (`invoice_perpanjangan_id`),
  ADD UNIQUE KEY `indeks` (`kode_invoice_perpanjangan`);

--
-- Indeks untuk tabel `kwitansi_perbaikan`
--
ALTER TABLE `kwitansi_perbaikan`
  ADD PRIMARY KEY (`kwitansi_perbaikan_id`),
  ADD UNIQUE KEY `indeks` (`kode_kwitansi_perbaikan`);

--
-- Indeks untuk tabel `kwitansi_perpanjangan`
--
ALTER TABLE `kwitansi_perpanjangan`
  ADD PRIMARY KEY (`kwitansi_perpanjangan_id`),
  ADD UNIQUE KEY `indeks` (`kode_kwitansi_perpanjangan`);

--
-- Indeks untuk tabel `penyedia_jasa`
--
ALTER TABLE `penyedia_jasa`
  ADD PRIMARY KEY (`penyedia_jasa_id`);

--
-- Indeks untuk tabel `perpanjangan_stnk`
--
ALTER TABLE `perpanjangan_stnk`
  ADD PRIMARY KEY (`perpanjangan_stnk_id`),
  ADD UNIQUE KEY `indeks` (`kode_perpanjangan`);

--
-- Indeks untuk tabel `satker`
--
ALTER TABLE `satker`
  ADD PRIMARY KEY (`satker_id`);

--
-- Indeks untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`sparepart_id`);

--
-- Indeks untuk tabel `tim_pemeriksa`
--
ALTER TABLE `tim_pemeriksa`
  ADD PRIMARY KEY (`tim_pemeriksa_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `usulan_perbaikan`
--
ALTER TABLE `usulan_perbaikan`
  ADD PRIMARY KEY (`usulan_perbaikan_id`),
  ADD UNIQUE KEY `kode_usulan` (`kode_usulan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kendaraan`
--
ALTER TABLE `data_kendaraan`
  MODIFY `data_kendaraan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `invoice_perbaikan`
--
ALTER TABLE `invoice_perbaikan`
  MODIFY `invoice_perbaikan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `invoice_perpanjangan`
--
ALTER TABLE `invoice_perpanjangan`
  MODIFY `invoice_perpanjangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kwitansi_perbaikan`
--
ALTER TABLE `kwitansi_perbaikan`
  MODIFY `kwitansi_perbaikan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kwitansi_perpanjangan`
--
ALTER TABLE `kwitansi_perpanjangan`
  MODIFY `kwitansi_perpanjangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penyedia_jasa`
--
ALTER TABLE `penyedia_jasa`
  MODIFY `penyedia_jasa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `perpanjangan_stnk`
--
ALTER TABLE `perpanjangan_stnk`
  MODIFY `perpanjangan_stnk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `satker`
--
ALTER TABLE `satker`
  MODIFY `satker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `sparepart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tim_pemeriksa`
--
ALTER TABLE `tim_pemeriksa`
  MODIFY `tim_pemeriksa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `usulan_perbaikan`
--
ALTER TABLE `usulan_perbaikan`
  MODIFY `usulan_perbaikan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_kendaraan`
--
ALTER TABLE `data_kendaraan`
  ADD CONSTRAINT `data_kendaraan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
