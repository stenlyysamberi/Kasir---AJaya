-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 09:26 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `idAkun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `hp` varchar(12) NOT NULL,
  `levell` varchar(10) NOT NULL,
  `alamat` text,
  `create_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`idAkun`, `nama`, `username`, `password`, `gambar`, `hp`, `levell`, `alamat`, `create_date`) VALUES
(47, 'Stenly Samberi', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Stenly Samberiicon.png', '343434342323', 'owner', 'Jayapura, Papua', 'Wednesday,08-Wed-2021'),
(58, 'Marlon Mainolo', 'alon', '356a192b7913b04c54574d18c28d46e6395428ab', 'Marlon Mainolodaniel-lopez.png', '89090234', 'kasir', 'saS', 'Tuesday,09-Tue-2021'),
(63, 'Rio Samberi', 'rio', '356a192b7913b04c54574d18c28d46e6395428ab', 'Rio Ardian Michael Samberilogin.png', '839392929', 'gudang', 'Jl.Airport Sentani - Abepura', 'Monday,09-Mon-2021'),
(64, 'Netta Done', 'neta', '356a192b7913b04c54574d18c28d46e6395428ab', 'Netta Donedog.png', '9090909090', 'gudang', 'Kamp. Dosay', 'Monday,10-Mon-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) UNSIGNED NOT NULL,
  `id_barcode` int(11) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `min_stok` int(3) NOT NULL,
  `status_jual` varchar(4) NOT NULL,
  `id_kategori_barang` int(11) UNSIGNED NOT NULL,
  `id_merk_barang` int(11) UNSIGNED DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_barcode`, `harga`, `min_stok`, `status_jual`, `id_kategori_barang`, `id_merk_barang`, `keterangan`) VALUES
(22, 42, '10000', 5, 'jual', 21, 26, 'Ready Stok'),
(70, 22, '20000', 10, 'jual', 24, 30, 'OK'),
(71, 23, '38000', 5, 'jual', 26, 31, 'OK'),
(72, 25, '95000', 5, 'jual', 24, 30, 'ok       '),
(73, 26, '45000', 5, 'jual', 26, 31, 'ok'),
(74, 24, '35000', 5, 'jual', 26, 31, 'ok                   '),
(75, 29, '10000', 5, 'jual', 26, 32, 'OK     '),
(76, 28, '7000', 5, 'jual', 26, 32, 'OK    '),
(77, 27, '85000', 5, 'jual', 26, 32, 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barcode_barang`
--

CREATE TABLE `tbl_barcode_barang` (
  `id_barcode` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `code_barcode` varchar(30) NOT NULL,
  `nama_barang` text NOT NULL,
  `img` text NOT NULL,
  `qty` int(3) NOT NULL,
  `join_ket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barcode_barang`
--

INSERT INTO `tbl_barcode_barang` (`id_barcode`, `id_satuan`, `code_barcode`, `nama_barang`, `img`, `qty`, `join_ket`) VALUES
(22, 13, '8992628022156', 'Bimoli 1L', 'xHWWtA-Jaya.jpg', 23, 'Berhasil'),
(23, 13, '8992628020152', 'Bimoli 2L', 'JOTHzA-Jaya.jpg', 23, 'Berhasil'),
(24, 0, '8994935000025', 'Minyak Goreng Damai Spesial 2000 ml', 'E4GZKA-Jaya.jpg', 0, 'Berhasil'),
(25, 13, '8992628010139', 'Miyak Goreng Bimoli 5L', 'e7pQrA-Jaya.jpg', 0, 'Berhasil'),
(26, 13, '8992628020145', 'Bimoli Botol 2L', 's7KtKA-Jaya.jpg', 0, 'Berhasil'),
(27, 13, '4072268722198', 'Miyak Goreng Lentera Mas 5L', 'DvR8NA-Jaya.jpg', 0, 'Berhasil'),
(28, 13, '8997222860012', 'Lentera Mas Botol 220 ml', 'w88rlA-Jaya.jpg', 0, 'Berhasil'),
(29, 13, '8997222860036', 'Miyak Goreng Lentera Mas 400 ml ', 'cRERVA-Jaya.jpg', 0, 'Berhasil'),
(32, 11, '8992851104049', 'Sardines Tomat 425 gr', 'lhONzA-Jaya.jpg', 0, 'Pendding'),
(33, 13, '8992851104032', 'Sardines Tomat 155 gr', 'FwfUTA-Jaya.jpg', 0, 'Pendding'),
(34, 13, '6901009100071', 'Maling 397 gr', 'cJnhjA-Jaya.jpg', 0, 'Pendding'),
(35, 13, '711844330108', 'Sardines Cabai 155 gr', 'rLCGmA-Jaya.jpg', 0, 'Pendding'),
(36, 13, '8998006710004', 'Sanmas sardines tomat 155 gr', 'JDBKPA-Jaya.jpg', 0, 'Pendding');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barcode_barang_masuk`
--

CREATE TABLE `tbl_barcode_barang_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_barcode` int(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tgl_masuk` varchar(50) NOT NULL,
  `idAkun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barcode_barang_masuk`
--

INSERT INTO `tbl_barcode_barang_masuk` (`id_masuk`, `id_barcode`, `jumlah_masuk`, `tgl_masuk`, `idAkun`) VALUES
(7, 52, 3, '2021-09-02 19:55:18', 47),
(8, 47, 2, '2021-09-02 19:55:18', 58),
(9, 53, 4, '2021-09-07', 47),
(10, 53, 8, '2021-09-07', 47),
(11, 54, 6, '2021-09-13', 47),
(12, 53, 5, '2021-09-13', 59),
(13, 48, 5, '2021-09-13', 59),
(14, 53, 10, '2021-09-13', 59),
(15, 55, 14, '2021-09-14', 59),
(16, 56, 10, '2021-09-14', 59),
(17, 56, 24, '2021-09-14', 47),
(18, 55, 20, '2021-09-15', 47),
(19, 62, 100, '2021-09-15', 47),
(20, 54, 4, '2021-09-15', 47),
(21, 54, 1, '2021-09-15', 47),
(22, 68, 1, '2021-09-17', 47),
(23, 69, 2, '2021-09-17', 47),
(24, 69, 20, '2021-09-17', 47),
(25, 71, 10, '2021-09-17', 47),
(26, 71, 10, '2021-09-17', 47),
(27, 72, 100, '2021-09-17', 47),
(28, 79, 10, '2021-09-19', 47),
(29, 6, 5, '2021-09-20', 47),
(30, 7, 100, '2021-09-20', 47),
(31, 6, 10, '2021-09-20', 47),
(32, 14, 20, '2021-10-08', 47),
(33, 17, 10, '2021-10-10', 47),
(34, 17, 6, '2021-10-10', 47),
(35, 22, 23, '2021-10-11', 47),
(36, 23, 23, '2021-10-11', 47);

--
-- Triggers `tbl_barcode_barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `tbl_barcode_barang_masuk` FOR EACH ROW BEGIN
	UPDATE tbl_barcode_barang SET qty = qty+NEW.jumlah_masuk
    WHERE id_barcode = NEW.id_barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `id_info` int(11) NOT NULL,
  `idakun` int(11) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id_info`, `idakun`, `info`) VALUES
(1, 47, 'I\'ve been using your theme from the previous developer for our web app, once I knew new version is out, I immediately bought with no hesitation. Great themes, good documentation with lots of customization available and sample app that really fit our need.'),
(2, 47, 'Jayapura!'),
(3, 47, 'Jayapura! Sentani'),
(4, 47, 'Jayapura! Sentanifsf'),
(5, 47, 'czxcz'),
(6, 47, 'Jayapura'),
(7, 0, ''),
(8, 47, 'fdsfdsf'),
(9, 45, 'Holla'),
(10, 47, 'Bandung, Jayapura'),
(11, 47, 'Developer'),
(12, 47, 'Admin'),
(13, 47, 'Microsfot edge will save and fill your password for this site nest time.'),
(14, 47, 'Full Color rolating lamp'),
(15, 47, 'sss'),
(16, 47, 'Mini Oreao Chocolate'),
(17, 47, 'Masukan Informasi disini!'),
(18, 47, 'Semua informasi akan muncul disini!'),
(19, 47, 'Good Morning, Happy Fun Day.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_barang`
--

CREATE TABLE `tbl_kategori_barang` (
  `id_kategori_barang` int(11) UNSIGNED NOT NULL,
  `idAkun` int(11) NOT NULL,
  `kategori` varchar(40) NOT NULL,
  `img` varchar(50) NOT NULL,
  `tgl_buat` varchar(30) NOT NULL,
  `dihapus` enum('tidak','ya') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_barang`
--

INSERT INTO `tbl_kategori_barang` (`id_kategori_barang`, `idAkun`, `kategori`, `img`, `tgl_buat`, `dihapus`) VALUES
(23, 47, 'sdasda', 'sdasda20210818112323_IMG_3724.JPG', 'Thursday,08-Thu-2021', 'tidak'),
(22, 51, 'Mie', 'Mieproduct-6.png', 'Thursday,08-Thu-2021', 'tidak'),
(26, 47, 'Sembako', 'Sembakodog.png', 'Thursday,09-Thu-2021', 'tidak'),
(24, 47, 'Jayapura', 'Jayapura20210818112102_IMG_3721.JPG', 'Thursday,08-Thu-2021', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_pelanggan` mediumint(1) UNSIGNED NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` text,
  `telp` varchar(40) DEFAULT NULL,
  `info_tambahan` text,
  `kode_unik` varchar(30) NOT NULL,
  `waktu_input` datetime NOT NULL,
  `dihapus` enum('tidak','ya') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id_pelanggan`, `nama`, `alamat`, `telp`, `info_tambahan`, `kode_unik`, `waktu_input`, `dihapus`) VALUES
(1, 'Pak Udin', 'Jalan Kayumanis 2 Baru', '08838493439', 'Testtt', '', '2016-05-07 22:44:25', 'ya'),
(2, 'Pak Jarwo', 'Kemanggisan deket binus', '4353535353', NULL, '', '2016-05-07 22:44:49', 'tidak'),
(3, 'Joko', 'Kayumanis', '08773682882', '', '', '2016-05-23 16:31:47', 'tidak'),
(4, 'Budi', 'Salemba', '089930393829', 'Testing', '', '2016-05-23 16:33:00', 'ya'),
(5, 'Mira', 'Pisangan', '09938829232', '', '', '2016-05-23 16:36:45', 'tidak'),
(6, 'Deden', 'Jauh', '990393', 'Test', '', '2016-05-24 20:54:58', 'ya'),
(7, 'Jamil', 'Berlan', '0934934939', '', '14640998941', '2016-05-24 21:24:54', 'tidak'),
(8, 'Budi', 'Jatinegara', '8349393439', '', '14640999321', '2016-05-24 21:25:32', 'tidak'),
(9, 'Kodok', 'Test', '0000', '', '14641003271', '2016-05-24 21:32:07', 'tidak'),
(10, 'Brandon', 'Test', '99030', '', '14641003401', '2016-05-24 21:32:20', 'tidak'),
(11, 'Broke', 'Test', '9900', 'Test', '14641005481', '2016-05-24 21:35:48', 'tidak'),
(12, 'Narji', 'Test', '000', 'Test', '14641006401', '2016-05-24 21:37:20', 'tidak'),
(13, 'Bernard', 'Test', '0000', 'test', '14641006651', '2016-05-24 21:37:45', 'tidak'),
(14, 'Nani', 'Test\r\n\r\nAja', '0000', 'Test\r\n\r\nAja', '14641016551', '2016-05-24 21:54:15', 'ya'),
(15, 'Norman', 'Test', '0039349', '', '14641017311', '2016-05-24 21:55:31', 'tidak'),
(16, 'Melina', 'Jauh', '9900039', 'Test', '14661682871', '2016-06-17 19:58:07', 'tidak'),
(17, 'Malih', 'test', '3434343', '', '14729767201', '2016-09-04 15:12:00', 'tidak'),
(18, 'jaka', 'jaka', '0000', 'jaka', '14729767881', '2016-09-04 15:13:08', 'tidak'),
(19, 'makak', 'kkk', '999', 'kakad', '14729768261', '2016-09-04 15:13:46', 'tidak'),
(20, 'asda', 'asda', '2342', 'asdad', '14729768371', '2016-09-04 15:13:57', 'tidak'),
(21, 'asdadadasdad', 'test', '324', 'asdadad', '14729768481', '2016-09-04 15:14:08', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merk_barang`
--

CREATE TABLE `tbl_merk_barang` (
  `id_merk_barang` int(11) UNSIGNED NOT NULL,
  `idAkun` int(11) NOT NULL,
  `merk` varchar(40) NOT NULL,
  `img` text NOT NULL,
  `tgl_buat` varchar(50) NOT NULL,
  `dihapus` enum('tidak','ya') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_merk_barang`
--

INSERT INTO `tbl_merk_barang` (`id_merk_barang`, `idAkun`, `merk`, `img`, `tgl_buat`, `dihapus`) VALUES
(30, 47, 'minuman', 'minuman20210818112102_IMG_3721.JPG', 'Tuesday,09-Tue-2021', 'tidak'),
(31, 47, 'gula 1 kg ', 'gula 1 kg 20210818112102_IMG_3721.JPG', 'Tuesday,09-Tue-2021', 'tidak'),
(32, 47, 'Minyak', 'Minyakdog.png', 'Monday,10-Mon-2021', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nota`
--

CREATE TABLE `tbl_nota` (
  `id_penjualan_m` int(11) UNSIGNED NOT NULL,
  `nomor_nota` varchar(40) NOT NULL,
  `tanggal` text NOT NULL,
  `grand_total` decimal(10,0) NOT NULL,
  `bayar` decimal(10,0) NOT NULL,
  `keterangan_lain` text,
  `id_pelanggan` mediumint(1) UNSIGNED DEFAULT NULL,
  `idAkun` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nota`
--

INSERT INTO `tbl_nota` (`id_penjualan_m`, `nomor_nota`, `tanggal`, `grand_total`, `bayar`, `keterangan_lain`, `id_pelanggan`, `idAkun`) VALUES
(10, 'AJAYA-47AO0JJ2NSVL', '2021-09-16 20:07:56', '28000', '28000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(9, 'AJAYA-47UOU76Q9CFQ', '2021-09-16 20:07:56', '78000', '80000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(11, 'AJAYA-47SH91BQAGIV', '2021-09-16 20:07:56', '6000', '6000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(12, 'AJAYA-471C4F8WU19E', '2021-09-16 20:07:56', '14000', '14000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(13, 'AJAYA-474PQK5CKHXK', '2021-09-16 20:07:56', '14000', '14000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(14, 'AJAYA-47OEJ65GKW3E', '2021-09-16 20:07:56', '300000', '300000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(15, 'AJAYA-47SLB904GEM4', '2021-09-17 20:07:56', '120000', '120000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(16, 'AJAYA-47KK04Q63EQF', '2021-09-17 09:10:19', '120000', '130000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(17, 'AJAYA-47BI06EFB5M4', '2021-09-17 10:47:30', '1500000', '2000000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(18, 'AJAYA-47P7WGDS55FL', '2021-09-17 17:33:39', '4012000', '4012000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(19, 'AJAYA-47DE3P8LFK3V', '2021-09-17 21:31:23', '2000000', '2000000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(20, 'AJAYA-47KXSD614889', '2021-09-19 23:40:52', '30000', '50000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(21, 'AJAYA-47MKAYWXOETA', '2021-10-08 23:29:03', '180000', '200000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(22, 'AJAYA-4752K1Y32XA2', '2021-10-11 02:19:06', '100000', '100000', 'Terima Kasih! Anugrah Jaya', 0, 47),
(23, 'AJAYA-47S6399WK77T', '2021-10-11 02:24:43', '400000', '500000', 'Terima Kasih! Anugrah Jaya', 0, 47);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan_detail`
--

CREATE TABLE `tbl_penjualan_detail` (
  `id_penjualan_d` int(11) UNSIGNED NOT NULL,
  `id_penjualan_m` int(11) UNSIGNED NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_barcode` int(11) NOT NULL,
  `jumlah_beli` smallint(1) UNSIGNED NOT NULL,
  `harga_satuan` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan_detail`
--

INSERT INTO `tbl_penjualan_detail` (`id_penjualan_d`, `id_penjualan_m`, `id_barang`, `id_barcode`, `jumlah_beli`, `harga_satuan`, `total`) VALUES
(497, 23, 67, 17, 8, '50000', '400000'),
(496, 22, 67, 17, 2, '50000', '100000'),
(495, 21, 65, 14, 2, '90000', '180000'),
(494, 20, 60, 79, 3, '10000', '30000'),
(493, 19, 59, 72, 1, '2000000', '2000000'),
(492, 18, 57, 69, 1, '12000', '12000'),
(491, 18, 59, 72, 2, '2000000', '4000000'),
(490, 17, 58, 71, 10, '30000', '300000'),
(489, 17, 57, 69, 10, '120000', '1200000'),
(488, 16, 57, 69, 1, '120000', '120000'),
(487, 15, 57, 69, 1, '120000', '120000'),
(486, 14, 56, 68, 10, '30000', '300000'),
(485, 14, 54, 55, 1, '14000', '14000'),
(484, 14, 36, 59, 1, '6000', '6000'),
(483, 13, 54, 55, 1, '14000', '14000'),
(482, 12, 54, 55, 1, '14000', '14000'),
(481, 11, 36, 59, 1, '6000', '6000'),
(480, 10, 54, 55, 2, '14000', '28000'),
(479, 9, 36, 59, 1, '6000', '6000'),
(478, 9, 39, 57, 2, '15000', '30000'),
(477, 9, 54, 55, 3, '14000', '42000');

--
-- Triggers `tbl_penjualan_detail`
--
DELIMITER $$
CREATE TRIGGER `terjual` AFTER INSERT ON `tbl_penjualan_detail` FOR EACH ROW BEGIN
	UPDATE tbl_barcode_barang SET qty = qty-NEW.jumlah_beli
    WHERE id_barcode = NEW.id_barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan_produk`
--

CREATE TABLE `tbl_satuan_produk` (
  `id_satuan` int(11) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `idAkun` int(11) NOT NULL,
  `nama_satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_satuan_produk`
--

INSERT INTO `tbl_satuan_produk` (`id_satuan`, `tgl`, `idAkun`, `nama_satuan`) VALUES
(11, 'Friday,08-Fri-2021', 47, 'Karton'),
(12, 'Friday,08-Fri-2021', 47, 'Bks'),
(13, 'Friday,08-Fri-2021', 47, 'Bh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_set` int(11) NOT NULL,
  `idAkun` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_jual`
--

CREATE TABLE `tmp_jual` (
  `id_penjualan_d` int(11) UNSIGNED NOT NULL,
  `id_penjualan_m` int(11) UNSIGNED NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_barcode` int(11) NOT NULL,
  `jumlah_beli` smallint(1) UNSIGNED NOT NULL,
  `harga_satuan` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idAkun`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_barcode_barang`
--
ALTER TABLE `tbl_barcode_barang`
  ADD PRIMARY KEY (`id_barcode`);

--
-- Indexes for table `tbl_barcode_barang_masuk`
--
ALTER TABLE `tbl_barcode_barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tbl_kategori_barang`
--
ALTER TABLE `tbl_kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_merk_barang`
--
ALTER TABLE `tbl_merk_barang`
  ADD PRIMARY KEY (`id_merk_barang`);

--
-- Indexes for table `tbl_nota`
--
ALTER TABLE `tbl_nota`
  ADD PRIMARY KEY (`id_penjualan_m`),
  ADD UNIQUE KEY `nomor_nota` (`nomor_nota`);

--
-- Indexes for table `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_d`);

--
-- Indexes for table `tbl_satuan_produk`
--
ALTER TABLE `tbl_satuan_produk`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_set`);

--
-- Indexes for table `tmp_jual`
--
ALTER TABLE `tmp_jual`
  ADD PRIMARY KEY (`id_penjualan_d`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `idAkun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_barcode_barang`
--
ALTER TABLE `tbl_barcode_barang`
  MODIFY `id_barcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_barcode_barang_masuk`
--
ALTER TABLE `tbl_barcode_barang_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_kategori_barang`
--
ALTER TABLE `tbl_kategori_barang`
  MODIFY `id_kategori_barang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id_pelanggan` mediumint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_merk_barang`
--
ALTER TABLE `tbl_merk_barang`
  MODIFY `id_merk_barang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_nota`
--
ALTER TABLE `tbl_nota`
  MODIFY `id_penjualan_m` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_penjualan_detail`
--
ALTER TABLE `tbl_penjualan_detail`
  MODIFY `id_penjualan_d` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `tbl_satuan_produk`
--
ALTER TABLE `tbl_satuan_produk`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_set` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_jual`
--
ALTER TABLE `tmp_jual`
  MODIFY `id_penjualan_d` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=612;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
