-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2015 pada 21.13
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `gms`
--
CREATE DATABASE IF NOT EXISTS `gms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gms`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `nama_lengkap`, `kontak`, `profile`) VALUES
(13, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0983621712', '8897customer-service-kangen-water.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_kirim`
--

CREATE TABLE IF NOT EXISTS `alamat_kirim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(11) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `alamat_kirim` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga`, `jumlah`, `keterangan`, `gambar`) VALUES
(8, 4, 'Kalung india', 50000, 0, 'Kalung unik dan cantik \r\ncocok untuk perempuan dengan warna yang varian \r\nsok tersedia silahkan di order sis', '8902Gelang India 9.jpg'),
(9, 4, 'kalung elegan', 100000, 15, 'Seperti namanya, ordered list membuat daftar yang terurut. Elemen untuk pembuatan ordered list yaitu ol (ordered llist), dan isi dari list sendiri dibuat dengan menggunakan elemen li, sama seperti pada unordered lsit. Secara standar ordered list akan menggunakan angka sebagai penanda daftar:', '7077ll.jpg'),
(10, 4, 'kalung kayu', 150000, 19, 'merupakan sebuah kerajinan tangan yang jarang sekali ada disekitar kita. Karena itulah barang-barang yang dihasilkan pembuat kerajinan tangan terbatas dan unik. Kerajinan yang dihasilkan beragam, dari mulai aksesoris pakaian seperti bros dan korsase, aksesoris pelengkap seperti kalung, gelang, dan cincin sampai kado unik berupa asbak, magnet hiasan kulkas, hiasan kamar yang terbuat dari Clay (bahan yang terbuat dari campuran tepung dan lem kayu sebagai perekat) yang tentunya aman bagi siapa saja.', '4128kalung.jpg'),
(11, 3, 'gelang perempuan', 20000, 20, 'Proses pembuatan aksesoris dan hiasan unik ini cenderung beragam, dari mulai banyaknya bahan yang diperlukan sampai lama pengerjaannya. Untuk satu gelang saja, dibutuhkan waktu yang beragam, dari mulai 5 menit hingga 1 hari. Tergantung bentuk dan bahan yang digunakan. Untuk pembuatan asbak unik dari clay, hanya diperlukan 10 menit untuk proses pembentukan dan pewarnaannya, namun supaya bahan clay tidak berjamur dan kokoh, harus dijemur dibawah terik matahari 2-3 hari.\r\nUntuk pembelian bahan baku aksesoris ini, yuyun mempunyai langganan di kawasan grosir di daerah Kota, Jakarta Utara. Sedangkan untuk hiasan clay, ia dapat ', '8281gelang.jpg'),
(12, 4, 'Kalung green daimond', 90000, 8, 'Sarana penjualan aksesoris dan hiasan ini pun beragam, dari mulai mengikuti bazaar atau pameran di kampus-kampus dan sekolah-sekolah, juga melalui situs online, yang mana ongkos pengiriman ditanggung oleh pembeli. Selain di Jakarta, Yuyun juga sudah memasarkan produk â€œThe Mutheâ€ ini ke berbagai daerah di Batam dan sekitarnya.', '9345kalung2.jpg'),
(13, 6, 'tas dari tali kur', 50000, 15, 'tas ini merupakan kerajinan tangan yang berbahan dasar dari tali kur dengan motif jagung...\r\ncocok untuk anak muda, warnanya keren, kuat, tahan lama, bisa dicuci, tidak mudah rusak.', '74496769950_20140508022714.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contat_us`
--

CREATE TABLE IF NOT EXISTS `contat_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesan`
--

CREATE TABLE IF NOT EXISTS `detail_pesan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(11) NOT NULL,
  `kode_p` varchar(100) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumbel` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'gelang tangan'),
(4, 'kalung'),
(5, 'hiasan rumah'),
(6, 'tas cewek'),
(7, 'sepatu'),
(8, 'hiasan rumah'),
(10, 'payung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_member` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumbel` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pemesanan`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_pemesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_p` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `bank_tujuan` varchar(100) NOT NULL,
  `tgl_bayar` varchar(100) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_tlp` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama`, `jenis_kelamin`, `no_tlp`, `email`, `password`, `profile`) VALUES
(5, 'user', 'Perempuan', 94782514, 'user@mail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '1057cewek-cantik-bgt.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
