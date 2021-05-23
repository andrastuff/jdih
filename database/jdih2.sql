-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 05:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jdih2`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` int(15) NOT NULL,
  `user_id` int(8) NOT NULL,
  `kategori_id` int(3) NOT NULL,
  `headlines` tinyint(1) NOT NULL,
  `utama` tinyint(1) NOT NULL,
  `judul_artikel` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `isi_artikel` text NOT NULL,
  `img` varchar(500) NOT NULL,
  `caption` varchar(200) NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `tanggal` date NOT NULL,
  `view` int(8) NOT NULL,
  `tag` text NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id`, `user_id`, `kategori_id`, `headlines`, `utama`, `judul_artikel`, `slug`, `isi_artikel`, `img`, `caption`, `metakey`, `metadesc`, `tanggal`, `view`, `tag`, `parent`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 'Judul Artikel', 'Judul Artikel', '<p>Isi Artikel</p>', 'f284dd28c30d0dd3624158dba2477c66.jpg', 'caption', 'metakey', 'metadesc', '2021-03-29', 1, '', 0, '2021-03-29 21:44:06', '2021-03-29 21:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE `bahasa` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `_created_by` varchar(255) DEFAULT NULL,
  `_updated_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bahasa`
--

INSERT INTO `bahasa` (`id`, `name`, `status`, `_created_by`, `_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Indonesia', 1, '1', '1', '2019-05-15 15:25:16', '2019-05-15 15:25:16'),
(2, 'Inggris', 1, '1', '1', '2019-05-15 15:25:20', '2019-05-15 15:25:20'),
(3, 'Belanda', 1, '1', '1', '2019-05-15 15:46:31', '2019-05-15 15:46:31'),
(4, 'Jerman', 1, '1', '1', '2019-05-15 15:46:35', '2019-05-15 15:46:35'),
(5, 'Perancis', 1, '1', '1', '2019-05-15 15:46:39', '2019-05-15 15:46:39'),
(6, 'Jepang', 1, '1', '1', '2019-05-15 15:46:44', '2019-05-15 15:46:44'),
(7, 'Arab', 1, '4', '4', '2019-06-13 15:06:44', '2019-06-13 15:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `bidang_hukum`
--

CREATE TABLE `bidang_hukum` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `integrasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang_hukum`
--

INSERT INTO `bidang_hukum` (`id`, `name`, `status`, `integrasi`) VALUES
(5, 'Hukum Umum', 1, 2),
(6, 'Hukum Adat', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_lampiran`
--

CREATE TABLE `data_lampiran` (
  `id` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `judul_lampiran` varchar(255) DEFAULT NULL,
  `url_lampiran` varchar(255) DEFAULT NULL,
  `deskripsi_lampiran` varchar(255) DEFAULT NULL,
  `fulltext` varchar(255) DEFAULT NULL,
  `akses_lampiran` varchar(255) DEFAULT NULL,
  `dokumen_lampiran` varchar(255) DEFAULT NULL,
  `pembatasan_lampiran` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `integrasi` int(11) DEFAULT 1,
  `_created_by` varchar(255) DEFAULT NULL,
  `_updated_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data_lampiran`
--

INSERT INTO `data_lampiran` (`id`, `id_dokumen`, `judul_lampiran`, `url_lampiran`, `deskripsi_lampiran`, `fulltext`, `akses_lampiran`, `dokumen_lampiran`, `pembatasan_lampiran`, `status`, `integrasi`, `_created_by`, `_updated_by`, `created_at`, `updated_at`, `urutan`) VALUES
(4, 1, 'tes', NULL, NULL, NULL, NULL, 'Invoice.docx', NULL, 0, 1, '1', NULL, '2021-05-21 22:48:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_pengarang`
--

CREATE TABLE `data_pengarang` (
  `id` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `nama_pengarang` varchar(100) DEFAULT NULL,
  `tipe_pengarang` varchar(100) DEFAULT NULL,
  `jenis_pengarang` varchar(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `integrasi` int(11) DEFAULT 1,
  `_created_by` varchar(255) DEFAULT NULL,
  `_updated_by` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data_pengarang`
--

INSERT INTO `data_pengarang` (`id`, `id_dokumen`, `nama_pengarang`, `tipe_pengarang`, `jenis_pengarang`, `status`, `integrasi`, `_created_by`, `_updated_by`, `created_at`, `updated_at`) VALUES
(5, 1, 'andra', 'Nama Orang', 'Pengarang Utama', '', 1, '1', NULL, '2021-05-21', NULL),
(6, 745, 'andra 2', 'Nama Orang', 'Pengarang Utama', '', 1, '1', NULL, '2021-05-22', NULL),
(7, 746, 'andra 3', 'Nama Orang', 'Pengarang Utama', '', 1, '1', NULL, '2021-05-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_status`
--

CREATE TABLE `data_status` (
  `id` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `status_peraturan` varchar(255) DEFAULT NULL,
  `id_dokumen_target` varchar(255) DEFAULT NULL,
  `catatan_status_peraturan` text DEFAULT NULL,
  `tanggal_perubahan` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `integrasi` int(11) DEFAULT 1,
  `_created_by` varchar(255) DEFAULT NULL,
  `_updated_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data_status`
--

INSERT INTO `data_status` (`id`, `id_dokumen`, `status_peraturan`, `id_dokumen_target`, `catatan_status_peraturan`, `tanggal_perubahan`, `status`, `integrasi`, `_created_by`, `_updated_by`, `created_at`, `updated_at`, `urutan`) VALUES
(2, 1, '11', NULL, 'teast', NULL, '', 1, '1', NULL, '2021-05-21 23:43:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_subyek`
--

CREATE TABLE `data_subyek` (
  `id` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `subyek` varchar(255) NOT NULL,
  `tipe_subyek` varchar(255) NOT NULL,
  `jenis_subyek` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `integrasi` int(11) DEFAULT 1,
  `_created_by` varchar(255) DEFAULT NULL,
  `_updated_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `data_subyek`
--

INSERT INTO `data_subyek` (`id`, `id_dokumen`, `subyek`, `tipe_subyek`, `jenis_subyek`, `status`, `integrasi`, `_created_by`, `_updated_by`, `created_at`, `updated_at`) VALUES
(5, 1, 'test', 'Topik', 'Utama', '', 1, '1', NULL, '2021-05-21 22:56:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator2'),
(2, 'members', 'General User'),
(3, 'technical', 'Technical Support');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(12) NOT NULL,
  `kategori` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `status`) VALUES
(1, 'Agenda', 'publish'),
(31, 'Berita Umum', 'publish'),
(30, 'Pemerintahan', 'publish'),
(3, 'Pengumuman', 'publish'),
(33, 'Ekonomi', 'publish'),
(35, 'BMW NEWS', 'publish'),
(36, 'Kabupaten Layak Anak', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `code`, `name`) VALUES
(1, 'awd', 'awd');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL DEFAULT 0,
  `nama_menu` varchar(100) NOT NULL,
  `order_menu` int(2) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `status` enum('y','n') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `keyword` varchar(500) NOT NULL,
  `description` varchar(270) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `judul`, `content`, `keyword`, `description`, `status`) VALUES
(1, 'NULL', 'test', '<p>test</p>', 'test', 'test', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `name`, `status`) VALUES
(1, 'awda2', 'awd2'),
(3, 'c3', 'c3');

-- --------------------------------------------------------

--
-- Table structure for table `perundangan`
--

CREATE TABLE `perundangan` (
  `id` int(11) NOT NULL,
  `tipe_dokumen` int(11) DEFAULT NULL,
  `judul` text DEFAULT NULL,
  `teu` text DEFAULT NULL,
  `nomor_peraturan` varchar(255) DEFAULT NULL,
  `nomor_panggil` varchar(255) DEFAULT NULL,
  `bentuk_peraturan` text DEFAULT NULL,
  `singkatan_jenis` text DEFAULT NULL,
  `cetakan` varchar(255) DEFAULT NULL,
  `tempat_terbit` text DEFAULT NULL,
  `penerbit` text DEFAULT NULL,
  `tanggal_penetapan` date DEFAULT NULL,
  `deskripsi_fisik` varchar(255) DEFAULT NULL,
  `sumber` text DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `bahasa` text DEFAULT NULL,
  `bidang_hukum` text DEFAULT NULL,
  `nomor_induk_buku` varchar(255) DEFAULT NULL,
  `jenis_peraturan` varchar(255) DEFAULT NULL,
  `singkatan_bentuk` varchar(255) DEFAULT NULL,
  `tipe_koleksi_nomor_eksemplar` varchar(255) DEFAULT NULL,
  `pola_nomor_eksemplar` varchar(255) DEFAULT NULL,
  `jumlah_eksemplar` varchar(255) DEFAULT NULL,
  `kala_terbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` varchar(255) DEFAULT NULL,
  `tanggal_dibacakan` date DEFAULT NULL,
  `pernyataan_tanggung_jawab` text DEFAULT NULL,
  `edisi` varchar(255) DEFAULT NULL,
  `gmd` varchar(255) DEFAULT NULL,
  `judul_seri` varchar(255) DEFAULT NULL,
  `klasifikasi` varchar(255) DEFAULT NULL,
  `info_detil_spesifik` varchar(255) DEFAULT NULL,
  `abstrak` varchar(255) DEFAULT NULL,
  `gambar_sampul` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `sembunyikan_di_opac` varchar(255) DEFAULT NULL,
  `promosikan_ke_beranda` varchar(255) DEFAULT NULL,
  `status_terakhir` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `integrasi` varchar(11) DEFAULT '1',
  `_created_by` varchar(255) DEFAULT NULL,
  `_updated_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `inisiatif` varchar(255) DEFAULT NULL,
  `pemrakarsa` varchar(255) DEFAULT NULL,
  `tanggal_pengundangan` date DEFAULT NULL,
  `daerah` int(20) DEFAULT NULL,
  `penandatanganan` varchar(255) DEFAULT NULL,
  `lembaga_peradilan` varchar(255) DEFAULT NULL,
  `pemohon` varchar(255) DEFAULT NULL,
  `termohon` varchar(255) DEFAULT NULL,
  `jenis_perkara` varchar(255) DEFAULT NULL,
  `sub_klasifikasi` varchar(255) DEFAULT NULL,
  `amar_status` varchar(255) DEFAULT NULL,
  `berkekuatan_hukum_tetap` varchar(255) DEFAULT NULL,
  `urusan_pemerintahan` varchar(255) DEFAULT NULL,
  `catatan_status_peraturan` varchar(255) DEFAULT NULL,
  `hit_see` int(255) DEFAULT NULL,
  `hit_download` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(8) NOT NULL,
  `agency_id` int(12) DEFAULT NULL,
  `google_code` text DEFAULT NULL,
  `title` varchar(75) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `second_phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `fb` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `google` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `linked` text DEFAULT NULL,
  `metadesc` text DEFAULT NULL,
  `metakey` text DEFAULT NULL,
  `maps` varchar(600) DEFAULT NULL,
  `updated_at` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `agency_id`, `google_code`, `title`, `description`, `logo`, `address`, `phone`, `second_phone`, `email`, `footer`, `fb`, `twitter`, `google`, `youtube`, `linked`, `metadesc`, `metakey`, `maps`, `updated_at`, `created_at`) VALUES
(1, 0, '5', 'JDIH DPRD Tanggamus', '1', NULL, '2', '', '4', 'ardiandra45@gmail.com', 'Copyright © 2020', NULL, NULL, NULL, NULL, NULL, '6', '7', NULL, '2020-12-04 19:43:15', '2020-11-18 14:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `judul`, `link`, `img`) VALUES
(44, 'Pemberian Bantuan Sembako', NULL, '1.jpg'),
(61, 'PJM Towing', '', '2932a8ca482672416b1340cbb03f62af.png');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(11, 'Status Dicabut2d'),
(19, 'sad'),
(20, 'awd'),
(21, '33'),
(24, 'awd'),
(25, 'cc');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(5) NOT NULL,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `nama_tag`, `tag_seo`, `count`) VALUES
(1, 'Pantai', 'pantai', 7),
(2, 'Ekonomi', 'ekonomi', 7),
(3, 'Hiburan', 'hiburan', 16),
(4, 'Teknologi', 'teknologi', 8),
(5, 'Metropolitan', 'metropolitan', 29),
(6, 'Nasional', 'nasional', 38),
(7, 'Kesehatan', 'kesehatan', 14),
(8, 'Olahraga', 'olahraga', 10),
(9, 'Kuliner', 'kuliner', 17),
(10, 'seni-budaya', 'seni-budaya', 4),
(11, 'Sekitar Kita', 'sekitar-kita', 9),
(12, 'Wisata', 'wisata', 4),
(13, 'Hukum', 'hukum', 13),
(14, 'Musik', 'musik', 11),
(15, 'Internasional', 'internasional', 22),
(16, 'Bola', 'bola', 19),
(17, 'tokoh', 'tokoh', 0),
(18, 'pemerintahan', 'publish', 0),
(19, 'Pendidikan', 'pendidikan', 0),
(20, 'Kesehatan', 'kesehatan', 0),
(21, 'BMW NEWS', 'bmw-news', 0),
(22, 'TULANG BAWANG', 'tulang-bawang', 0),
(23, 'NASIONAL', 'nasional', 0),
(24, 'PEMERINTAHAN', 'pemerintahan', 0),
(25, 'UMUM', 'umum', 0),
(26, 'PENDIDIKAN', 'pendidikan', 0),
(27, 'PARIWISATA', 'pariwisata', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_dokumen`
--

CREATE TABLE `type_dokumen` (
  `id` int(11) NOT NULL,
  `second_id` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `integrasi` int(11) DEFAULT 1,
  `_created_by` varchar(255) DEFAULT NULL,
  `_updated_by` varchar(255) DEFAULT NULL,
  `_created_time` datetime DEFAULT NULL,
  `_updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `type_dokumen`
--

INSERT INTO `type_dokumen` (`id`, `second_id`, `parent_id`, `name`, `status`, `integrasi`, `_created_by`, `_updated_by`, `_created_time`, `_updated_time`) VALUES
(1, '1', 0, 'PERATURAN PERUNDANG-UNDANGAN', '', 1, '1', '1', NULL, NULL),
(2, '2', 0, 'MONOGRAFI HUKUM', '', 1, '1', '1', NULL, NULL),
(3, '3', 0, 'ARTIKEL/MAJALAH HUKUM', '', 1, '1', '1', NULL, NULL),
(5, '1:5', 1, 'UNDANG-UNDANG DASAR', '', 1, '1', '1', NULL, NULL),
(6, '1:6', 1, 'KETETAPAN MPR', '', 1, '1', '1', NULL, NULL),
(7, '1:7', 1, 'UNDANG-UNDANG', '', 1, '1', '1', NULL, NULL),
(8, '1:8', 1, 'PERATURAN PEMERINTAH PENGGANTI UNDANG-UNDANG', '', 1, '1', '1', NULL, NULL),
(9, '1:9', 1, 'PERATURAN PEMERINTAH', '', 1, '1', '1', NULL, NULL),
(10, '1:10', 1, 'PERATURAN PRESIDEN', '', 1, '1', '1', NULL, NULL),
(11, '1:11', 1, 'KEPUTUSAN PRESIDEN', '', 1, '1', '1', NULL, NULL),
(12, '1:12', 1, 'INSTRUKSI PRESIDEN', '', 1, '1', '1', NULL, NULL),
(13, '1:13', 1, 'PENETAPAN PRESIDEN', '', 1, '1', '1', NULL, NULL),
(14, '1:14', 1, 'UNDANG-UNDANG DARURAT', '', 1, '1', '1', NULL, NULL),
(15, '1:15', 1, 'PENGATURAN PENGUASA PERANG TERTINGGI', '', 1, '1', '1', NULL, NULL),
(16, '1:16', 1, 'PERATURAN KEMENTERIAN', '', 1, '1', '1', NULL, NULL),
(17, '1:17', 1, 'PERATURAN LEMBAGA NEGARA', '', 1, '1', '1', NULL, NULL),
(18, '1:18', 1, 'PERATURAN LEMBAGA PEMERINTAH NON KEMENTERIAN', '', 1, '1', '1', NULL, NULL),
(19, '1:19', 1, 'PERATURAN LEMBAGA NON STRUKTURAL', '', 1, '1', '1', NULL, NULL),
(20, '1:5:20', 5, 'UUD 1945', '', 1, '1', '1', NULL, NULL),
(21, '1:5:21', 5, 'KONSTITUSI RIS', '', 1, '1', '1', NULL, NULL),
(22, '1:5:22', 5, 'UUD 1950', '', 1, '1', '1', NULL, NULL),
(23, '1:5:23', 5, 'AMANDEMEN I - V', '', 1, '1', '1', NULL, NULL),
(24, '1:5:24', 5, 'UUD DALAM SATU NASKAH', '', 1, '1', '1', NULL, NULL),
(25, '1:16:25', 16, 'PERATURAN MENTERI', '', 1, '1', '1', NULL, NULL),
(26, '1:16:26', 16, 'PERATURAN BERSAMA MENTERI', '', 1, '1', '1', NULL, NULL),
(27, '1:16:27', 16, 'KEPUTUSAN MENTERI', '', 1, '1', '1', NULL, NULL),
(28, '1:16:28', 16, 'KEPUTUSAN BERSAMA MENTERI', '', 1, '1', '1', NULL, NULL),
(29, '1:16:29', 16, 'INSTRUKSI MENTERI', '', 1, '1', '1', NULL, NULL),
(30, '1:16:30', 16, 'INSTRUKSI BERSAMA MENTERI', '', 1, '1', '1', NULL, NULL),
(31, '1:16:31', 16, 'PERATURAN ESELON 1', '', 1, '1', '1', NULL, NULL),
(32, '1:16:32', 16, 'KEPUTUSAN ESELON 1', '', 1, '1', '1', NULL, NULL),
(33, '1:17:33', 17, 'PERATURAN DPR', '', 1, '1', '1', NULL, NULL),
(34, '1:17:34', 17, 'PERATURAN DPD', '', 1, '1', '1', NULL, NULL),
(35, '1:17:35', 17, 'PERATURAN MPR', '', 1, '1', '1', NULL, NULL),
(36, '1:17:36', 17, 'PERATURAN MK', '', 1, '1', '1', NULL, NULL),
(37, '1:17:37', 17, 'PERATURAN MA', '', 1, '1', '1', NULL, NULL),
(38, '1:17:38', 17, 'PERATURAN KY', '', 1, '1', '1', NULL, NULL),
(39, '1:17:39', 17, 'PERATURAN BPK', '', 1, '1', '1', NULL, NULL),
(40, '1:17:40', 17, 'PERATURAN PANGLIMA TNI', '', 1, '1', '1', NULL, NULL),
(41, '1:17:41', 17, 'KEPUTUSAN', '', 1, '1', '1', NULL, NULL),
(43, '1:18:43', 18, 'PERATURAN BADAN', '', 1, '1', '1', NULL, NULL),
(44, '1:18:44', 18, 'PERATURAN LEMBAGA', '', 1, '1', '1', NULL, NULL),
(45, '1:18:45', 18, 'PERATURAN KEPALA', '', 1, '1', '1', NULL, NULL),
(46, '1:18:46', 18, 'KEPUTUSAN', '', 1, '1', '1', NULL, NULL),
(47, '1:19:47', 19, 'PERATURAN BADAN', '', 1, '1', '1', NULL, NULL),
(48, '1:19:48', 19, 'PERATURAN KOMISI', '', 1, '1', '1', NULL, NULL),
(49, '1:19:49', 19, 'PERATURAN DEWAN', '', 1, '1', '1', NULL, NULL),
(50, '1:19:50', 19, 'PERATURAN LEMBAGA', '', 1, '1', '1', NULL, NULL),
(51, '1:19:51', 19, 'PERATURAN KOMITE', '', 1, '1', '1', NULL, NULL),
(52, '1:19:52', 19, 'PERATURAN OJK', '', 1, '1', '1', NULL, NULL),
(53, '1:19:53', 19, 'PERATURAN PPATK', '', 1, '1', '1', NULL, NULL),
(54, '1:19:54', 19, 'KEPUTUSAN', '', 1, '1', '1', NULL, NULL),
(55, '1:55', 1, 'PERATURAN DAERAH PROVINSI', '', 1, '1', '1', NULL, NULL),
(56, '1:56', 1, 'PERATURAN DAERAH KABUPATEN', '', 1, '1', '1', NULL, NULL),
(57, '1:57', 1, 'PERATURAN DAERAH KOTA', '', 1, '1', '1', NULL, NULL),
(58, '1:58', 1, 'PERATURAN DPRD PROVINSI', '', 1, '1', '1', NULL, NULL),
(59, '1:59', 1, 'PERATURAN DPRD KABUPATEN', '', 1, '1', '1', NULL, NULL),
(60, '1:60', 1, 'PERATURAN DPRD KOTA', '', 1, '1', '1', NULL, NULL),
(61, '1:61', 1, 'PERATURAN GUBERNUR', '', 1, '1', '1', NULL, NULL),
(62, '1:62', 1, 'PERATURAN BUPATI', '', 1, '1', '1', NULL, NULL),
(63, '1:63', 1, 'PERATURAN WALIKOTA', '', 1, '1', '1', NULL, NULL),
(64, '1:64', 1, 'PERATURAN BERSAMA GUBERNUR', '', 1, '1', '1', NULL, NULL),
(65, '1:65', 1, 'PERATURAN DESA', '', 1, '1', '1', NULL, NULL),
(66, '1:66', 1, 'KEPUTUSAN GUBERNUR', '', 1, '1', '1', NULL, NULL),
(67, '1:67', 1, 'KEPUTUSAN BUPATI', '', 1, '1', '1', NULL, NULL),
(68, '1:68', 1, 'KEPUTUSAN WALIKOTA', '', 1, '1', '1', NULL, NULL),
(69, '1:69', 1, 'KEPUTUSAN DPRD', '', 1, '1', '1', NULL, NULL),
(70, '1:70', 1, 'INSTRUKSI GUBERNUR', '', 1, '1', '1', NULL, NULL),
(71, '1:71', 1, 'INSTRUKSI BUPATI', '', 1, '1', '1', NULL, NULL),
(72, '1:72', 1, 'INSTRUKSI WALIKOTA', '', 1, '1', '1', NULL, NULL),
(74, '1:74', 1, 'PERATURAN KOLONIAL', '', 1, '1', '1', NULL, NULL),
(75, '2:75', 2, 'BUKU HUKUM', '', 1, '1', '1', NULL, NULL),
(76, '2:76', 2, 'NASKAH AKADEMIK KEMENKUMHAM', '', 1, '1', '1', NULL, NULL),
(77, '2:77', 2, 'NASKAH AKADEMIK', '', 1, '1', '1', NULL, NULL),
(78, '2:78', 2, 'PENELITIAN HUKUM', '', 1, '1', '1', NULL, NULL),
(79, '2:79', 2, 'PENGKAJIAN HUKUM', '', 1, '1', '1', NULL, NULL),
(80, '2:80', 2, 'PENGKAJIAN KONSTITUSI', '', 1, '1', '1', NULL, NULL),
(81, '2:81', 2, 'PENULISAN KARYA ILMIAH', '', 1, '1', '1', NULL, NULL),
(82, '2:82', 2, 'KOMPENDIUM HUKUM', '', 1, '1', '1', NULL, NULL),
(83, '2:83', 2, 'ANALISIS DAN EVALUASI', '', 1, '1', '1', NULL, NULL),
(84, '2:84', 2, 'RANCANGAN', '', 1, '1', '1', NULL, NULL),
(85, '3:85', 3, 'MAJALAH HUKUM NASIONAL', '', 1, '1', '1', NULL, NULL),
(86, '3:86', 3, 'MAJALAH HUKUM', '', 1, '1', '1', NULL, NULL),
(87, '3:87', 3, 'WARTA BPHN', '', 1, '1', '1', NULL, NULL),
(88, '3:88', 3, 'KLIPING MAJALAH KORAN', '', 1, '1', '1', NULL, NULL),
(89, '3:89', 3, 'ARTIKEL HUKUM', '', 1, '1', '1', NULL, NULL),
(90, '4:90', 4, 'YURISPRUDENSI', '', 1, '1', '1', NULL, NULL),
(91, '4:91', 4, 'PUTUSAN MAHKAMAH AGUNG', '', 1, '1', '1', NULL, NULL),
(92, '4:92', 4, 'PUTUSAN MAHKAMAH KONSTITUSI', '', 1, '1', '1', NULL, NULL),
(93, '2:84:93', 84, 'RANCANGAN PERATURAN DAERAH', '', 1, '1', '1', NULL, NULL),
(94, '2:84:94', 84, 'RANCANGAN PERATURAN DAERAH PROVINSI', '', 1, '1', '1', NULL, NULL),
(95, '2:84:95', 84, 'RANCANGAN PERATURAN DAERAH KABUPATEN', '', 1, '1', '1', NULL, NULL),
(96, '2:84:96', 84, 'RANCANGAN PERATURAN DAERAH KOTA', '', 1, '1', '1', NULL, NULL),
(97, '2:84:97', 84, 'RANCANGAN PERATURAN GUBERNUR', '', 1, '1', '1', NULL, NULL),
(98, '2:84:98', 84, 'RANCANGAN PERATURAN BUPATI', '', 1, '1', '1', NULL, NULL),
(99, '2:84:99', 84, 'RANCANGAN PERATURAN WALIKOTA', '', 1, '1', '1', NULL, NULL),
(101, '100:100:101', 100, 'MEMORANDUM OF UNDERSTANDING', '', 1, '1', '1', NULL, NULL),
(102, '100:100:102', 100, 'PERJANJIAN KERJASAMA', '', 1, '1', '1', NULL, NULL),
(103, '1:18:103', 18, 'SURAT EDARAN', '', 1, '1', '1', NULL, NULL),
(104, '1:18:104', 18, 'INSTRUKSI', '', 1, '1', '1', NULL, NULL),
(105, '1:18:105', 18, 'MEMORANDUM OF UNDERSTANDING', '', 1, '1', '1', NULL, NULL),
(106, '1:17:106', 17, 'PERATURAN BERSAMA', '', 1, '1', '1', NULL, NULL),
(107, '1:18:107', 18, 'KEPUTUSAN SETINGKAT ESELON 1', '', 1, '1', '1', NULL, NULL),
(108, '2:108', 2, 'HIMPUNAN', '', 1, '1', '1', NULL, NULL),
(109, '1:109', 1, 'STAATSBLAD', '', 1, '1', '1', NULL, NULL),
(110, '1:110', 1, 'OSAMU SEIRE', '', 1, '1', '1', NULL, NULL),
(111, '1:111', 1, 'OSAMU KANREI', '', 1, '1', '1', NULL, NULL),
(112, '2:112', 2, 'LAPORAN KEGIATAN', '', 1, '1', '1', NULL, NULL),
(113, '2:113', 2, 'KOLEKSI LANGKA', '', 1, '1', '1', NULL, NULL),
(114, '2:114', 2, 'LOKAKARYA', '', 1, '1', '1', NULL, NULL),
(115, '3:115', 2, 'JURNAL HUKUM', '', 1, '1', '1', NULL, NULL),
(116, '3:116', 2, 'JURNAL HAM', '', 1, '1', '1', NULL, NULL),
(117, '3:117', 3, 'BULETIN HUKUM', '', 1, '1', '1', NULL, NULL),
(118, '3:118', 3, 'WARTA HUKUM', '', 1, '1', '1', NULL, NULL),
(119, '2:119', 2, 'SEMINAR', '', 1, '1', '1', NULL, NULL),
(120, '2:120', 2, 'SIMPOSIUM', '', 1, '1', '1', NULL, NULL),
(121, '3:121', 3, 'PROSIDING', '', 1, '1', '1', NULL, NULL),
(122, '1:122', 1, 'KUHP', '', 1, '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `urusan_pemerintahan`
--

CREATE TABLE `urusan_pemerintahan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urusan_pemerintahan`
--

INSERT INTO `urusan_pemerintahan` (`id`, `name`, `status`) VALUES
(1, 'Pemerintah Kabupaten', 'awd'),
(4, 'Pemerintah DPRD', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `avatar`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$fYWVacDqs5PkHowXmoViWOD6Ni4aZ.sYfFEYLF2FVWi6iN5i4rf36', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1621772482, 1, 'Admin', 'istrator', 'ADMIN', '0', '1598349078.png'),
(2, '127.0.0.1', 'administrator', '$2y$12$fYWVacDqs5PkHowXmoViWOD6Ni4aZ.sYfFEYLF2FVWi6iN5i4rf36', 'admin@admin2.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1619180455, 1, 'Admin', 'istrator', 'ADMIN', '0', '1598349078.png');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(8, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `bidang_hukum`
--
ALTER TABLE `bidang_hukum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_lampiran`
--
ALTER TABLE `data_lampiran`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_dokumen` (`id_dokumen`) USING BTREE,
  ADD KEY `judul_lampiran` (`judul_lampiran`) USING BTREE;

--
-- Indexes for table `data_pengarang`
--
ALTER TABLE `data_pengarang`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_dokumen` (`id_dokumen`) USING BTREE,
  ADD KEY `nama_pengarang` (`nama_pengarang`) USING BTREE,
  ADD KEY `idjp_fk` (`jenis_pengarang`) USING BTREE,
  ADD KEY `idtp_fk` (`tipe_pengarang`) USING BTREE;

--
-- Indexes for table `data_status`
--
ALTER TABLE `data_status`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_dokumen` (`id_dokumen`) USING BTREE,
  ADD KEY `id_dokumen_target` (`id_dokumen_target`) USING BTREE;

--
-- Indexes for table `data_subyek`
--
ALTER TABLE `data_subyek`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_dokumen` (`id_dokumen`) USING BTREE,
  ADD KEY `subyek` (`subyek`) USING BTREE;

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perundangan`
--
ALTER TABLE `perundangan`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `tipe_dokumen` (`tipe_dokumen`) USING BTREE,
  ADD KEY `nomor_peraturan` (`nomor_peraturan`) USING BTREE,
  ADD KEY `tahun_terbit` (`tahun_terbit`) USING BTREE;
ALTER TABLE `perundangan` ADD FULLTEXT KEY `judul` (`judul`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_dokumen`
--
ALTER TABLE `type_dokumen`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `second_id` (`second_id`) USING BTREE,
  ADD KEY `parent_id` (`parent_id`) USING BTREE,
  ADD KEY `name` (`name`) USING BTREE;

--
-- Indexes for table `urusan_pemerintahan`
--
ALTER TABLE `urusan_pemerintahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uc_email` (`email`) USING BTREE,
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`) USING BTREE,
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`) USING BTREE,
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`) USING BTREE;

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`) USING BTREE,
  ADD KEY `fk_users_groups_users1_idx` (`user_id`) USING BTREE,
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bidang_hukum`
--
ALTER TABLE `bidang_hukum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_lampiran`
--
ALTER TABLE `data_lampiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_pengarang`
--
ALTER TABLE `data_pengarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_status`
--
ALTER TABLE `data_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_subyek`
--
ALTER TABLE `data_subyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `perundangan`
--
ALTER TABLE `perundangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `type_dokumen`
--
ALTER TABLE `type_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `urusan_pemerintahan`
--
ALTER TABLE `urusan_pemerintahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
