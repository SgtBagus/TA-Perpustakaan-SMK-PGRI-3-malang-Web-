-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Okt 2017 pada 11.53
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
(3, 'tes', '20102017072019Anime-PNG-HD.png', 'tes', 'tes', 'tes', '123-414-124-124-14', 'Media', 'Indonesia', 'Biasa', 1, 'tes', 'Pembelian', 'tes', 'tes', '2017-08-15', 'tes`', '2017-10-20'),
(4, 'Pasific  War Battle of Midway', '11092017035830World_Of_Warship_473106.jpg', 'Pertama', 'Pertama', 'Kedua', '976-839-203-102-09', 'Media Cetak', 'Inggris', 'Koleksi', 5, 'Midway Battle', 'Tidak Diketahui', 'USA', 'History Geografi Chanel', '2008-02-15', 'Buku ini menjelaskan bagaimana kejadian pertempuran Midway itu terjadi pada tahun 1942', '2017-09-11'),
(5, '6th Destroyer Division History', '0510201702172939407706.png', 'Pertama ', 'Kedua', '01', '676-859-394-201-21', 'Media Cetak', 'Inggris', 'Biasa', 5, '6th Div DD', 'Hadiah', 'Japan', 'Kadokawa', '2017-10-05', 'Sejarah dari divisi penghancur ke 6 milik IJN dengan animasi animasi yang menarik', '2017-10-05'),
(6, 'Cute Girls Doing Cute Things', '1810201701462922046553_1115827305217838_5528973730536370586_n.png', 'Pertama', 'Pertama ', 'Kedua', '272-123-920-310-23', 'Media Cetak', 'Inggris', 'Biasa', 5, 'CGDCT', 'Hadiah', 'Malang', 'Kota Malang', '2015-02-03', 'Buku Ini Ditambahkan sebagai  bahan pembelajaran bahasa inggris', '2017-10-18');

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
(2, 1, '20170823002', 'Siap Terpinjam'),
(3, 2, '20170823003', 'Siap Terpinjam'),
(5, 3, '20170830002', 'Rusak'),
(6, 4, '20170911001', 'Siap Terpinjam'),
(7, 4, '20170911002', 'Rusak'),
(8, 4, '20170911003', 'Siap Terpinjam'),
(9, 4, '20170911004', 'Dipinjam'),
(10, 5, '20171005001', 'Siap Terpinjam'),
(11, 5, '20171005002', 'Siap Terpinjam'),
(12, 5, '20171005003', 'Hilang'),
(13, 5, '20171005004', 'Siap Terpinjam'),
(14, 5, '20171005005', 'Siap Terpinjam'),
(15, 6, '20171018001', 'Siap Terpinjam'),
(16, 6, '20171018002', 'Siap Terpinjam'),
(17, 6, '20171018003', 'Siap Terpinjam'),
(18, 6, '20171018004', 'Siap Terpinjam'),
(19, 6, '20171018005', 'Siap Terpinjam');

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
(13, 3, 7),
(14, 5, 9),
(15, 6, 12),
(16, 7, 3),
(17, 8, 10);

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
('12309/2394.922', 'Rize', '3.jpg', 'Pustakawan', '+082018370120', '*Bukan dari dunia ini', '2017-09-14'),
('12345/6789.011', 'tes pegawai dafta', 'thumbnail.jpg', 'Guru Pengajar', '+080870870970', 'disini', '2017-10-09'),
('17154/1595.063', 'Bagus Andika ', '1910201703250022046553_1115827305217838_5528973730536370586_n.png', 'Pustakawan', '+086738423415', 'Perumahan Bumi Asti Tahap-II Blok J-15 Sengkaling', '2017-08-07'),
('67382/0939.230', 'I Just Robbe A BANK', '6.png', 'Administrasi', '+082314353232', 'Disana', '2017-08-25');

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
(3, 4, '2017-09-29', '2017-10-01', '2017-10-05', 4, 800, 'Kembali'),
(5, 7, '2017-09-25', '2017-10-07', '0000-00-00', 0, 0, 'Diterima'),
(6, 6, '2017-10-01', '2017-10-03', '0000-00-00', 17, 1700, 'Diterima'),
(7, 3, '2017-10-09', '2017-10-11', '0000-00-00', 0, 0, 'Ditolak'),
(8, 2, '2017-10-07', '2017-10-08', '0000-00-00', 0, 0, 'Menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kegiatan`
--

CREATE TABLE `riwayat_kegiatan` (
  `id_riwayat_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `riwayat_kegiatan` varchar(225) NOT NULL,
  `tgl_riwayat_kegiatan` date NOT NULL,
  `status_riwayat` enum('primary','warning','danger') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_kegiatan`
--

INSERT INTO `riwayat_kegiatan` (`id_riwayat_kegiatan`, `id_user`, `riwayat_kegiatan`, `tgl_riwayat_kegiatan`, `status_riwayat`) VALUES
(6, 1, 'Melakukan Penambahan Data Siswa Bernama basfdasdasd Sebagai pengguna baru ', '2017-10-04', 'primary'),
(7, 1, 'Melakukan Penambahan Data Buku Berjudul 6th Destroyer Division History sebanyak 6 banyak buku', '2017-10-05', 'primary'),
(8, 1, 'Melakukan Reset pada salah satu user', '2017-10-05', 'warning'),
(9, 1, 'Melakukan Penghapusan Salah satu Siswa', '2017-10-05', 'danger'),
(10, 1, 'Melakukan Penerimaan Pengembalian', '2017-10-05', 'primary'),
(11, 1, 'Melakukan Pengaktifan Admin pada salah satu pegawai', '2017-10-05', 'warning'),
(12, 1, 'Melakukan Pengdeaktifan Admin pada salah satu pegawai', '2017-10-05', 'warning'),
(13, 1, 'Melakukan Pengaktifan Admin pada salah satu pegawai', '2017-10-06', 'warning'),
(14, 1, 'Melakukan Pengdeaktifan Admin pada salah satu pegawai', '2017-10-06', 'warning'),
(15, 1, 'Melakukan Penghapusan Pemesanan', '2017-10-06', 'danger'),
(16, 1, 'Melakukan Penambahan Data Siswa Bernama Tes Mendaftar Akun Sebagai pengguna baru ', '2017-10-09', 'primary'),
(17, 1, 'Melakukan Penambahan Data Siswa Bernama mr Sebagai pengguna baru ', '2017-10-09', 'primary'),
(18, 1, 'Melakukan Penambahan Data Pegawai Bernama mbot Sebagai pengguna baru ', '2017-10-09', 'primary'),
(19, 1, 'Melakukan Penghapusan Salah satu Pegawai', '2017-10-09', 'danger'),
(20, 1, 'Melakukan Penghapusan Salah satu Siswa', '2017-10-09', 'danger'),
(21, 1, 'Melakukan Penghapusan Salah satu Siswa', '2017-10-09', 'danger'),
(22, 1, 'Melakukan Penolakan Pemesanan', '2017-10-09', 'danger'),
(23, 1, 'Melakukan Penambahan Data Pegawai Bernama tes pegawai dafta Sebagai pengguna baru ', '2017-10-09', 'primary'),
(24, 1, 'Melakukan Pengaktifan Admin pada salah satu pegawai', '2017-10-09', 'warning'),
(25, 1, 'Melakukan Pengaktifan Admin pada salah satu pegawai', '2017-10-09', 'warning'),
(26, 1, 'Melakukan Pengdeaktifan Admin pada salah satu pegawai', '2017-10-09', 'warning'),
(27, 1, 'Melakukan Pengdeaktifan Admin pada salah satu pegawai', '2017-10-09', 'warning'),
(28, 1, 'Melakukan Reset pada salah satu user', '2017-10-09', 'warning'),
(29, 1, 'Melakukan Reset pada salah satu user', '2017-10-09', 'warning'),
(30, 1, 'Melakukan Penambahan Data Siswa Bernama Android Sebagai pengguna baru ', '2017-10-12', 'primary'),
(31, 1, 'Melakukan Reset pada salah satu user', '2017-10-12', 'warning'),
(32, 1, 'Melakukan Penghapusan Salah satu Siswa', '2017-10-12', 'danger'),
(33, 1, 'Melakukan Penambahan Data Buku Berjudul Cute Girls Doing Cute Things sebanyak 5 banyak buku', '2017-10-18', 'primary'),
(34, 1, 'Melakukan pendataan sanksi', '2017-10-19', 'warning'),
(35, 1, 'Melakukan pendataan sanksi', '2017-10-20', 'warning'),
(36, 1, 'Melakukan Reset pada salah satu user', '2017-10-23', 'warning'),
(37, 1, 'Melakukan Reset pada salah satu user', '2017-10-23', 'warning'),
(38, 1, 'Melakukan Reset pada salah satu user', '2017-10-23', 'warning');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sanksi`
--

CREATE TABLE `sanksi` (
  `id_sanksi` int(12) NOT NULL,
  `id_user` int(12) NOT NULL,
  `id_peminjaman` int(12) NOT NULL,
  `sanksi` varchar(225) NOT NULL,
  `catatan_sanksi` text NOT NULL,
  `status_sanksi` enum('Belum Lunas','Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sanksi`
--

INSERT INTO `sanksi` (`id_sanksi`, `id_user`, `id_peminjaman`, `sanksi`, `catatan_sanksi`, `status_sanksi`) VALUES
(1, 4, 3, 'Tes Tambah Sanksi', 'Ini cuma tes report sanksi', 'Belum Lunas'),
(2, 6, 6, 'buku dihilangkan', 'buku hilang disuruh ganti 50k', 'Belum Lunas');

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
('17172/1613.063', 'Kharisma Yunior Suryatama', '9.png', 'XII - RPL - A', '+087859388413', 'Vinolia Gg.3 No.27a RT. 2 RW 5 Kelurahan JATIMULYO Kecamatan LOWOKWARU KOTA', '2017-08-10'),
('17176/1617.063', 'mr', 'thumbnail.jpg', 'XII - RPL - A', '+086564326865', 'gondang', '2017-10-09'),
('17563/3423.087', 'Cocoa Hotto', '2.jpg', 'X - TKJ - C', '+081231242342', '*Bukan dari dunia sini', '2017-09-14'),
('17672/1273.929', 'Tanpa Nama', '10.jpg', 'X - RPL - D', '+082231241234', 'Disini', '2017-08-11'),
('52628/3180.923', 'Aria', '5.jpg', 'XII - PB - C', '+080928019284', '*bukan dunia ini', '2017-09-14');

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
(1, '17154/1595.063', 'Bagus', 'bagus@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Sudah', 'Admin'),
(2, '17172/1613.063', '-', '-', '69783ee76a92567d446143b811519068', 'Belum', 'User'),
(3, '17672/1273.929', 'Tanpa Nama', 'tanpanama@gmail.com', 'aafb96b2fa8806be307c4496867bad56', 'Sudah', 'User'),
(4, '67382/0939.230', 'I just Robe Bank', 'roberbank@gmail.com', '525118da19b674308b971936e29baa30', 'Sudah', 'User'),
(5, '12309/2394.922', 'Rize', 'rize@gmail.com', '6ec4c790851c9054c8875ccc55c88c10', 'Sudah', 'User'),
(6, '17563/3423.087', 'Cocoa', 'Cocoa45@gmail.com', '1ed76d35f95379c2c1b160c2154c5c42', 'Sudah', 'User'),
(7, '52628/3180.923', 'Aria', 'aria23@gmail.com', 'ad090bae5286ffcebb5de90d543cea9a', 'Sudah', 'User'),
(10, '17176/1617.063', '-', '-', 'a5cdd4aa0048b187f7182f1b9ce7a6a7', 'Belum', 'User');

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
  ADD KEY `id_peminjaman` (`id_peminjaman`);

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
  MODIFY `id_buku` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_buku`
--
ALTER TABLE `detail_buku`
  MODIFY `id_detail_buku` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `id_jenis_buku` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `riwayat_kegiatan`
--
ALTER TABLE `riwayat_kegiatan`
  MODIFY `id_riwayat_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `sanksi`
--
ALTER TABLE `sanksi`
  MODIFY `id_sanksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  ADD CONSTRAINT `sanksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanksi_ibfk_2` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
