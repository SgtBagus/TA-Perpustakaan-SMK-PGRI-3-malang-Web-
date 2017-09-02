-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 04:27 AM
-- Server version: 10.1.16-MariaDB
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
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(15) NOT NULL,
  `judul_buku` varchar(225) NOT NULL,
  `gambar_buku` text,
  `jilid` varchar(225) NOT NULL,
  `cetakan` varchar(225) NOT NULL,
  `edisi` varchar(225) NOT NULL,
  `ISBN` varchar(225) NOT NULL,
  `jenis_media` varchar(225) DEFAULT NULL,
  `bahasa` varchar(225) DEFAULT NULL,
  `jenis_koleksi` varchar(225) DEFAULT NULL,
  `id_jenis_buku` int(15) DEFAULT NULL,
  `judul_singkat` varchar(225) NOT NULL,
  `sumber` varchar(225) NOT NULL,
  `kota_terbit` varchar(225) NOT NULL,
  `penerbit` varchar(225) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `biografi` text NOT NULL,
  `tgl_entri_buku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `gambar_buku`, `jilid`, `cetakan`, `edisi`, `ISBN`, `jenis_media`, `bahasa`, `jenis_koleksi`, `id_jenis_buku`, `judul_singkat`, `sumber`, `kota_terbit`, `penerbit`, `tahun_terbit`, `biografi`, `tgl_entri_buku`) VALUES
(1, 'Matematika Kelas XII SMKA/MA/SMK/MAK', '240820171515271.jpg', '03', '01', 'pertama', '978-602-282-103-80', 'Media', 'Indonesia', 'Biasa', 4, 'Matematika XII', 'Pembelian', 'Jakarta', 'Kementerian Pendidikan dan Kebudayaan', '2015-01-01', 'Buku ini merupakan buku guru yang dipersiapkan Pemerintahan dalam rangka implementasi Kurikulum 2013', '2017-08-23'),
(2, 'Comik Seru Bergambar', 'tumblr_onw09nI5hw1u0xk60o1_500.png', '01', '15', 'kedua', '978-089-786-098-90', 'Media', 'Inggris', 'Referensi', 5, 'Comik', 'Hadiah', 'Japan', 'Konbawa', '2015-02-01', 'Buku ini imut', '2017-08-29'),
(3, 'tes', 'thumbnail.png', 'tes', 'tes', 'tes', '123-414-124-124-14', 'Media Cetak', 'Indonesia', 'Biasa', 1, 'tes', 'Pembelian', 'tes', 'tes', '2017-08-15', 'tes`', '2017-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `detail_buku`
--

CREATE TABLE `detail_buku` (
  `id_detail_buku` int(15) NOT NULL,
  `id_buku` int(15) NOT NULL,
  `kode_buku` varchar(225) NOT NULL,
  `status_buku` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_buku`
--

INSERT INTO `detail_buku` (`id_detail_buku`, `id_buku`, `kode_buku`, `status_buku`) VALUES
(1, 1, '20170823001', 'Dipinjam'),
(2, 1, '20170823002', 'Dipesan'),
(3, 2, '20170823003', 'Dipesan'),
(4, 3, '20170830001', 'Siap Terpinjam'),
(5, 3, '20170830002', 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(12) NOT NULL,
  `id_peminjaman` int(12) NOT NULL,
  `id_detail_buku` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `id_peminjaman`, `id_detail_buku`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 1),
(4, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_buku`
--

CREATE TABLE `jenis_buku` (
  `id_jenis_buku` int(12) NOT NULL,
  `no_dewery` int(12) NOT NULL,
  `subyek` varchar(250) NOT NULL,
  `deskripsi_jenis_buku` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_buku`
--

INSERT INTO `jenis_buku` (`id_jenis_buku`, `no_dewery`, `subyek`, `deskripsi_jenis_buku`) VALUES
(1, 400, 'Bahasa', 'Bahasa (dari bahasa Sanskerta à¤­à¤¾à¤·à¤¾, bhÄá¹£Ä) adalah kemampuan yang dimiliki manusia untuk berkomunikasi dengan manusia lainnya menggunakan tanda, misalnya kata dan gerakan. '),
(2, 200, 'Agama', 'Agama adalah sebuah koleksi terorganisir dari kepercayaan, sistem budaya, dan pandangan dunia yang menghubungkan manusia dengan tatanan/perintah dari kehidupan.'),
(4, 300, 'Matematika', 'Matematika (dari bahasa Yunani: Î¼Î±Î¸Î·Î¼Î±Ï„Î¹ÎºÎ¬ - mathÄ“matikÃ¡) adalah studi besaran, struktur, ruang, dan perubahan.'),
(5, 600, 'Refreshing', 'Buku menyenangkan yang sangat disenangi oleh semua umur');

-- --------------------------------------------------------

--
-- Table structure for table `keterlambatan`
--

CREATE TABLE `keterlambatan` (
  `id_keterlambatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_detail_buku` int(12) NOT NULL,
  `tgl_penuntasan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(12) NOT NULL,
  `no_peminjaman` varchar(225) NOT NULL,
  `id_user` int(12) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_pinjaman` enum('Menunggu','Diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `no_peminjaman`, `id_user`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_pinjaman`) VALUES
(1, '20170831063001', 2, '2017-08-31', '2017-09-02', 'Menunggu'),
(2, '20170831929002', 3, '2017-08-31', '2017-09-07', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kegiatan`
--

CREATE TABLE `riwayat_kegiatan` (
  `id_riwayat_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `riwayat_kegiatan` varchar(225) NOT NULL,
  `tgl_riwayat_kegiatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sanksi`
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(12) NOT NULL,
  `no_induk` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `foto_user` varchar(225) NOT NULL,
  `jabatan` varchar(225) NOT NULL,
  `kelas` varchar(225) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('Admin','User') NOT NULL,
  `tgl_entri` date NOT NULL,
  `verifikasi` enum('Sudah','Belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `no_induk`, `nama`, `username`, `email`, `password`, `foto_user`, `jabatan`, `kelas`, `no_hp`, `alamat`, `role`, `tgl_entri`, `verifikasi`) VALUES
(1, '17154/1595.063', 'Bagus Andika', 'Admin', 'admin@gmail.com', 'admin', '180820170222071219800149560579432soldier aiming.svg.hi.png', 'Pustakawan', '-', '+086738423415', 'Perumahan Bumi Asti Tahap-II Blok J-15 Sengkaling', 'Admin', '2017-08-07', 'Sudah'),
(2, '17172/1613.063', 'Kharisma Yunior Suryatama', 'Kharisma-564', 'kharisma@gmail.com', 'kharisma', 'thumbnail.jpg', 'Siswa', 'XII - RPL - A', '+087859388413', 'Vinolia Gg.3 No.27a RT. 2 RW 5 Kelurahan JATIMULYO Kecamatan LOWOKWARU KOTA', 'User', '2017-08-10', 'Sudah'),
(3, '17672/1273.929', 'Tanpa Nama', 'Tanpa Nama', 'tanpanama@gmail.com', 'tanpanama', 'thumbnail.jpg', 'Siswa', 'X - RPL - D', '+082231241234', 'Disini', 'Admin', '2017-08-11', 'Sudah'),
(4, '67382/0939.230', 'I Just Robbe A BANK', '-', '-', '-', 'thumbnail.jpg', 'Administrasi', '-', '+082314353232', 'Disana', 'Admin', '2017-08-25', 'Belum'),
(5, '17156/1456.024', 'Saya', '-', '-', '-', 'thumbnail.jpg', 'Siswa', 'XII - TKJ - B', '+080893859232', 'Disini', 'Admin', '2017-08-30', 'Belum');

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
-- Indexes for table `keterlambatan`
--
ALTER TABLE `keterlambatan`
  ADD PRIMARY KEY (`id_keterlambatan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_detail_buku`);

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
  MODIFY `id_buku` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_buku`
--
ALTER TABLE `detail_buku`
  MODIFY `id_detail_buku` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `id_jenis_buku` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `keterlambatan`
--
ALTER TABLE `keterlambatan`
  MODIFY `id_keterlambatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_jenis_buku`) REFERENCES `jenis_buku` (`id_jenis_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD CONSTRAINT `detail_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`id_detail_buku`) REFERENCES `detail_buku` (`id_detail_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_kegiatan`
--
ALTER TABLE `riwayat_kegiatan`
  ADD CONSTRAINT `riwayat_kegiatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD CONSTRAINT `sanksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
