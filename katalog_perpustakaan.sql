-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Sep 2017 pada 12.36
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `id_buku` int(15) NOT NULL,
  `judul_buku` varchar(225) NOT NULL,
  `gambar_buku` text NOT NULL,
  `jilid` varchar(225) NOT NULL,
  `cetakan` varchar(225) NOT NULL,
  `edisi` varchar(225) NOT NULL,
  `ISBN` varchar(225) NOT NULL,
  `jenis_media` varchar(225) NOT NULL,
  `bahasa` varchar(225) NOT NULL,
  `jenis_koleksi` varchar(225) NOT NULL,
  `id_jenis_buku` int(15) DEFAULT NULL,
  `judul_singkat` varchar(225) NOT NULL,
  `sumber` varchar(225) NOT NULL,
  `kota_terbit` varchar(225) NOT NULL,
  `penerbit` varchar(225) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `biografi` text NOT NULL,
  `tgl_entri_buku` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `gambar_buku`, `jilid`, `cetakan`, `edisi`, `ISBN`, `jenis_media`, `bahasa`, `jenis_koleksi`, `id_jenis_buku`, `judul_singkat`, `sumber`, `kota_terbit`, `penerbit`, `tahun_terbit`, `biografi`, `tgl_entri_buku`) VALUES
(1, 'Matematika Kelas XII SMKA/MA/SMK/MAK', '240820171515271.jpg', '03', '01', 'pertama', '978-602-282-103-80', 'Media Cetak', 'Indonesia', 'Biasa', 4, 'Matematika XII', 'Pembelian', 'Jakarta', 'Kementerian Pendidikan dan Kebudayaan', '2015-01-01', 'Buku ini merupakan buku guru yang dipersiapkan Pemerintahan dalam rangka implementasi Kurikulum 2013', '2017-08-23'),
(2, 'Comik Seru Bergambar', 'tumblr_onw09nI5hw1u0xk60o1_500.png', '01', '15', 'kedua', '978-089-786-098-90', 'Media Cetak', 'Inggris', 'Referensi', 5, 'Comik', 'Hadiah', 'Japan', 'Konbawa', '2015-02-01', 'Buku ini imut', '2017-08-29'),
(3, 'tes', 'thumbnail.png', 'tes', 'tes', 'tes', '123-414-124-124-14', 'Media Cetak', 'Indonesia', 'Biasa', 1, 'tes', 'Pembelian', 'tes', 'tes', '2017-08-15', 'tes`', '2017-08-30'),
(4, 'Pasific  War Battle of Midway', '11092017035830World_Of_Warship_473106.jpg', 'Pertama', 'Pertama', 'Kedua', '976-839-203-102-09', 'Media Cetak', 'Inggris', 'Koleksi', 5, 'Midway Battle', 'Tidak Diketahui', 'USA', 'History Geografi Chanel', '2008-02-15', 'Buku ini menjelaskan bagaimana kejadian pertempuran Midway itu terjadi pada tahun 1942', '2017-09-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_buku`
--

CREATE TABLE `detail_buku` (
  `id_detail_buku` int(15) NOT NULL,
  `id_buku` int(15) NOT NULL,
  `kode_buku` varchar(225) NOT NULL,
  `status_buku` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_buku`
--

INSERT INTO `detail_buku` (`id_detail_buku`, `id_buku`, `kode_buku`, `status_buku`) VALUES
(1, 1, '20170823001', 'Siap Terpinjam'),
(2, 1, '20170823002', 'Dipesan'),
(3, 2, '20170823003', 'Dipesan'),
(5, 3, '20170830002', 'Siap Terpinjam'),
(6, 4, '20170911001', 'Siap Terpinjam'),
(7, 4, '20170911002', 'Siap Terpinjam'),
(8, 4, '20170911003', 'Siap Terpinjam'),
(9, 4, '20170911004', 'Dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(12) NOT NULL,
  `id_peminjaman` int(12) NOT NULL,
  `id_detail_buku` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `id_peminjaman`, `id_detail_buku`) VALUES
(7, 3, 5),
(12, 4, 6),
(13, 3, 7),
(14, 5, 9);

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
(5, 600, 'Refreshing', 'Buku menyenangkan yang sangat disenangi oleh semua umur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(225) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `foto_pegawai` text NOT NULL,
  `jabatan_pegawai` varchar(225) NOT NULL,
  `no_hp_pegawai` varchar(225) NOT NULL,
  `alamat_pegawai` text,
  `tgl_entri_pegawai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `nama_pegawai`, `foto_pegawai`, `jabatan_pegawai`, `no_hp_pegawai`, `alamat_pegawai`, `tgl_entri_pegawai`) VALUES
('12309/2394.922', 'Rize', 'rize.jpg', 'Pustakawan', '+082018370120', '*Bukan dari dunia ini', '2017-09-14'),
('17154/1595.063', 'Bagus Andika ', '060920170257021219800149560579432soldier aiming.svg.hi.png', 'Pustakawan', '+086738423415', 'Perumahan Bumi Asti Tahap-II Blok J-15 Sengkaling', '2017-08-07'),
('67382/0939.230', 'I Just Robbe A BANK', 'thumbnail.jpg', 'Administrasi', '+082314353232', 'Disana', '2017-08-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_terlambat` int(15) NOT NULL,
  `denda` int(11) NOT NULL,
  `status_pinjaman` enum('Menunggu','Diterima','Ditolak','Kembali') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_kembali`, `total_terlambat`, `denda`, `status_pinjaman`) VALUES
(3, 4, '2017-09-30', '2017-10-07', '2017-09-30', 0, 0, 'Kembali'),
(4, 6, '2017-09-11', '2017-09-16', '0000-00-00', 0, 0, 'Ditolak'),
(5, 7, '2017-09-25', '2017-10-03', '0000-00-00', 0, 0, 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kegiatan`
--

CREATE TABLE `riwayat_kegiatan` (
  `id_riwayat_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `riwayat_kegiatan` varchar(225) NOT NULL,
  `tgl_riwayat_kegiatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sanksi`
--

CREATE TABLE `sanksi` (
  `id_sanksi` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `id_detail_buku` int(12) NOT NULL,
  `sanksi` varchar(225) NOT NULL,
  `status sanksi` enum('Belum Lunas','Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `NIS` varchar(225) NOT NULL,
  `nama_siswa` varchar(225) NOT NULL,
  `foto_siswa` text NOT NULL,
  `kelas` varchar(225) NOT NULL,
  `no_hp_siswa` varchar(225) NOT NULL,
  `alamat_siswa` text,
  `tgl_entri_siswa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`NIS`, `nama_siswa`, `foto_siswa`, `kelas`, `no_hp_siswa`, `alamat_siswa`, `tgl_entri_siswa`) VALUES
('12391/2312.049', 'Siapa', 'thumbnail.jpg', 'XI - AV - D', '+081230918230', 'Dimana', '2017-09-14'),
('17172/1613.063', 'Kharisma Yunior Suryatama', 'amazon.png', 'XII - RPL - A', '+087859388413', 'Vinolia Gg.3 No.27a RT. 2 RW 5 Kelurahan JATIMULYO Kecamatan LOWOKWARU KOTA', '2017-08-10'),
('17563/3423.087', 'Cocoa Hotto', 'cocoa.jpg', 'X - TKJ - C', '+081231242342', '*Bukan dari dunia sini', '2017-09-14'),
('17672/1273.929', 'Tanpa Nama', 'thumbnail.jpg', 'X - RPL - D', '+082231241234', 'Disini', '2017-08-11'),
('52628/3180.923', 'Aria', 'hidan.jpg', 'XII - PB - C', '+080928019284', '*bukan dunia ini', '2017-09-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(12) NOT NULL,
  `id_siswa_pegawai` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `verifikasi` enum('Sudah','Belum') NOT NULL,
  `role` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_siswa_pegawai`, `username`, `email`, `password`, `verifikasi`, `role`) VALUES
(1, '17154/1595.063', 'Bagus', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Sudah', 'Admin'),
(2, '17172/1613.063', 'Kharisma-564', 'kharisma@gmail.com', '8d54d98edb4b4ebdb4a2cc0cffe6eb1f', 'Sudah', 'User'),
(3, '17672/1273.929', 'Tanpa Nama', 'tanpanama@gmail.com', 'aafb96b2fa8806be307c4496867bad56', 'Sudah', 'User'),
(4, '67382/0939.230', 'I just Robe Bank', 'roberbank@gmail.com', '525118da19b674308b971936e29baa30', 'Sudah', 'User'),
(5, '12309/2394.922', 'Rize', 'rize23@gmail.com', '6ec4c790851c9054c8875ccc55c88c10', 'Sudah', 'User'),
(6, '17563/3423.087', 'Cocoa', 'Cocoa45@gmail.com', '1ed76d35f95379c2c1b160c2154c5c42', 'Sudah', 'User'),
(7, '52628/3180.923', 'Aria', 'aria23@gmail.com', 'ad090bae5286ffcebb5de90d543cea9a', 'Sudah', 'User'),
(8, '12391/2312.049', '-', '-', 'a9a1d5317a33ae8cef33961c34144f84', 'Belum', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_jenis_buku` (`id_jenis_buku`);

--
-- Indexes for table `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD PRIMARY KEY (`id_detail_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_detail_buku` (`id_detail_buku`);

--
-- Indexes for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`id_jenis_buku`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `riwayat_kegiatan`
--
ALTER TABLE `riwayat_kegiatan`
  ADD PRIMARY KEY (`id_riwayat_kegiatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD PRIMARY KEY (`id_sanksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_detail_buku`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_buku`
--
ALTER TABLE `detail_buku`
  MODIFY `id_detail_buku` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `id_jenis_buku` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riwayat_kegiatan`
--
ALTER TABLE `riwayat_kegiatan`
  MODIFY `id_riwayat_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanksi`
--
ALTER TABLE `sanksi`
  MODIFY `id_sanksi` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_jenis_buku`) REFERENCES `jenis_buku` (`id_jenis_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD CONSTRAINT `detail_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`id_detail_buku`) REFERENCES `detail_buku` (`id_detail_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_kegiatan`
--
ALTER TABLE `riwayat_kegiatan`
  ADD CONSTRAINT `riwayat_kegiatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sanksi`
--
ALTER TABLE `sanksi`
  ADD CONSTRAINT `sanksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
