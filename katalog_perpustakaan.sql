-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Agu 2017 pada 05.11
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katalog_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(12) NOT NULL,
  `judul_buku` varchar(225) NOT NULL,
  `jenis_media` varchar(225) NOT NULL,
  `id_jenis_buku` int(12) NOT NULL,
  `jenis_koleksi` varchar(225) NOT NULL,
  `kota_terbit` varchar(225) NOT NULL,
  `penerbit` varchar(225) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `biografi` text NOT NULL,
  `bahasa` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `jenis_media`, `id_jenis_buku`, `jenis_koleksi`, `kota_terbit`, `penerbit`, `tahun_terbit`, `biografi`, `bahasa`) VALUES
(1, 'Matematika Kelas XII SMKA/MA/SMK/MAK', 'Buku', 4, 'Pelajaran', 'Jakarta', 'Kementerian Pendidikan dan Kebudayaan', '2015-01-01', 'Buku ini merupakan buku guru yang dipersiapkan Pemerintahan dalam rangka implementasi Kurikulum 2013', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_buku`
--

CREATE TABLE `jenis_buku` (
  `id_jenis_buku` int(12) NOT NULL,
  `no_dewery` int(12) NOT NULL,
  `subyek` varchar(250) NOT NULL,
  `deskripsi_jenis_buku` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_buku`
--

INSERT INTO `jenis_buku` (`id_jenis_buku`, `no_dewery`, `subyek`, `deskripsi_jenis_buku`) VALUES
(1, 400, 'Bahasa', 'Bahasa (dari bahasa Sanskerta à¤­à¤¾à¤·à¤¾, bhÄá¹£Ä) adalah kemampuan yang dimiliki manusia untuk berkomunikasi dengan manusia lainnya menggunakan tanda, misalnya kata dan gerakan. '),
(2, 200, 'Agama', 'Agama adalah sebuah koleksi terorganisir dari kepercayaan, sistem budaya, dan pandangan dunia yang menghubungkan manusia dengan tatanan/perintah dari kehidupan.'),
(4, 300, 'Matematika', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(12) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `jabatan_pegawai` varchar(225) NOT NULL,
  `perwalian_kelas` varchar(225) NOT NULL,
  `no_hp_pegawai` varchar(15) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_entri` date NOT NULL,
  `varifikasi_pegawai` enum('Sudah','Belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `jabatan_pegawai`, `perwalian_kelas`, `no_hp_pegawai`, `alamat_pegawai`, `tgl_masuk`, `tgl_entri`, `varifikasi_pegawai`) VALUES
('P1', '17156', 'Admin', 'Pustakawan', 'XII RPL-A', '067384234123', 'Perumahan Bumi Asti Tahap-II Blok J-15', '2014-02-02', '2017-08-07', 'Sudah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`id_jenis_buku`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `id_jenis_buku` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
