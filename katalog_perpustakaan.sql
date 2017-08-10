-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Agu 2017 pada 03.03
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
  `gambar_buku` varchar(225) NOT NULL,
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

INSERT INTO `buku` (`id_buku`, `judul_buku`, `gambar_buku`, `jenis_media`, `id_jenis_buku`, `jenis_koleksi`, `kota_terbit`, `penerbit`, `tahun_terbit`, `biografi`, `bahasa`) VALUES
(1, 'Matematika Kelas XII SMKA/MA/SMK/MAK', 'thumbnail_buku.jpg', 'Buku', 4, 'Pelajaran', 'Jakarta', 'Kementerian Pendidikan dan Kebudayaan', '2015-01-01', 'Buku ini merupakan buku guru yang dipersiapkan Pemerintahan dalam rangka implementasi Kurikulum 2013', 'Indonesia'),
(2, 'Comic Semua Usia', 'comic.png', 'Komik', 5, 'Penghibur', 'Japan', '-', '2015-02-01', '-', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_buku`
--

CREATE TABLE `detail_buku` (
  `id_detail_buku` int(15) NOT NULL,
  `id_buku` int(15) NOT NULL,
  `jilid` varchar(225) NOT NULL,
  `cetakan` varchar(225) NOT NULL,
  `edisi` varchar(225) NOT NULL,
  `ISBN` varchar(225) NOT NULL,
  `tgl_entri_buku` date NOT NULL,
  `status_buku` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 300, 'Matematika', 'Matematika (dari bahasa Yunani: Î¼Î±Î¸Î·Î¼Î±Ï„Î¹ÎºÎ¬ - mathÄ“matikÃ¡) adalah studi besaran, struktur, ruang, dan perubahan.'),
(5, 600, 'Komik', 'Buku menyenangkan yang sangat disenangi oleh semua umur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(12) NOT NULL,
  `no_induk` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `foto_user` varchar(225) NOT NULL,
  `jabatan` varchar(225) NOT NULL,
  `kelas` varchar(225) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_entri` date NOT NULL,
  `varifikasi` enum('Sudah','Belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `no_induk`, `nama`, `foto_user`, `jabatan`, `kelas`, `no_hp`, `alamat`, `tgl_entri`, `varifikasi`) VALUES
(1, '17156', 'Bagus Andika', 'thumbnail.jpg', 'Pustakawan', '-', '+067384234123', 'Perumahan Bumi Asti Tahap-II Blok J-15', '2017-08-07', 'Sudah'),
(3, '15678', 'Siapa', 'thumbnail.jpg', 'Guru Pengajar', '-', '+067546534234', 'disana', '2017-08-08', 'Belum'),
(4, '17171', 'Jesyka Aprila Sudjono', 'thumbnail.jpg', 'Siswa', 'XII - RPL - A', '-', 'Disini', '2017-08-09', 'Belum'),
(6, '17172/1613.063', 'Kharisma Yunior Suryatama', 'thumbnail.jpg', 'Siswa', 'XII - RPL - A', '+087859388413', 'Vinolia Gg.3 No.27a RT. 2 RW 5 Kelurahan JATIMULYO Kecamatan LOWOKWARU KOTA', '2017-08-10', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `varifikasi`
--

CREATE TABLE `varifikasi` (
  `id_varifikasi` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `username_user` varchar(225) NOT NULL,
  `email_user` varchar(225) NOT NULL,
  `password_user` varchar(225) NOT NULL,
  `role_user` enum('Admin','Pegawai','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `varifikasi`
--

INSERT INTO `varifikasi` (`id_varifikasi`, `id_user`, `username_user`, `email_user`, `password_user`, `role_user`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD PRIMARY KEY (`id_detail_buku`);

--
-- Indexes for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`id_jenis_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `varifikasi`
--
ALTER TABLE `varifikasi`
  ADD PRIMARY KEY (`id_varifikasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_buku`
--
ALTER TABLE `detail_buku`
  MODIFY `id_detail_buku` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `id_jenis_buku` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `varifikasi`
--
ALTER TABLE `varifikasi`
  MODIFY `id_varifikasi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
