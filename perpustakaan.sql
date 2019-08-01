-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Mei 2018 pada 15.12
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` varchar(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `uname`, `pass`, `foto`) VALUES
('U1', 'faizah', '7aedeb3c0483c19498be5786acfb79df', 'unikama.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE IF NOT EXISTS `tb_buku` (
`kode_buku` int(15) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`kode_buku`, `judul_buku`, `tanggal_terbit`, `pengarang`, `stok`) VALUES
(1, 'Harapan', '2018-05-19', 'Faizah', 27),
(2, 'Ketika senja', '0000-00-00', 'Kurniawan', 58),
(5, 'Ulva', '0000-00-00', 'Ulva Dwi', 16),
(6, 'Hope', '2018-05-19', 'Puss', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `npm` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `tanggal_masuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`npm`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jurusan`, `tanggal_masuk`) VALUES
('160403020002', 'Imroatul faizah', 'Malang', '01-05-2013', 'Sistem informasi', '04-05-2017'),
('160403020003', 'Inggrid nindy', 'Bondowoso', '02-05-2013', 'Teknik informatika', '05-05-2017'),
('160403020004', 'Sofia ivonaris', 'Manggarai', '03-05-2013', 'Matematika', '06-05-2017'),
('160403020018', 'Puss elek', 'Malang', '2018-05-12', 'Sistem Informasi', '2018-05-26'),
('160403020039', 'Ulva Elek Koyo Tekek', 'Surabaya', '2018-05-10', 'Teknik Informatika', '2018-05-25'),
('160403020091', 'Riska', 'Malang', '2018-05-01', 'Akuntansi', '2018-05-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE IF NOT EXISTS `tb_peminjaman` (
`kode_peminjaman` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`kode_peminjaman`, `nama`, `judul_buku`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(27, 'Imroatul faizah', 'Ketika senja', '2018-05-12', '2018-05-26'),
(28, 'Sofia ivonaris', 'Ketika senja', '2018-05-18', '2018-05-26');

--
-- Trigger `tb_peminjaman`
--
DELIMITER //
CREATE TRIGGER `AFTER_INSERTPEMINJAMAN` AFTER INSERT ON `tb_peminjaman`
 FOR EACH ROW BEGIN
	UPDATE `tb_buku` SET `stok`=(`stok`-1) WHERE `judul_buku` = NEW.`judul_buku`;	
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengembalian`
--

CREATE TABLE IF NOT EXISTS `tb_pengembalian` (
`kode_pengembalian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `judul_buku` varchar(30) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`kode_pengembalian`, `nama`, `judul_buku`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(17, 'Inggrid', 'Hope', '2018-05-18', '2018-05-26'),
(18, 'Imroatul', 'Ulva', '0000-00-00', '0000-00-00'),
(21, 'Sofia', 'Ulva', '2018-05-18', '2018-05-19'),
(30, 'Imroatul faizah', 'Ulva', '2018-05-12', '2018-05-26');

--
-- Trigger `tb_pengembalian`
--
DELIMITER //
CREATE TRIGGER `AFTER_INSERTPENGEMBALIAN` AFTER INSERT ON `tb_pengembalian`
 FOR EACH ROW BEGIN
	UPDATE `tb_buku` SET `stok`=(`stok`+1) WHERE `judul_buku` = NEW.`judul_buku`;	
END
//
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
 ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
 ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
 ADD PRIMARY KEY (`kode_peminjaman`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
 ADD PRIMARY KEY (`kode_pengembalian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
MODIFY `kode_buku` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
MODIFY `kode_peminjaman` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
MODIFY `kode_pengembalian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
