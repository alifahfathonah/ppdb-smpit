-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2017 at 04:18 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahait_ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '1',
  `nama` varchar(50) NOT NULL,
  `waktu` varchar(19) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `id_user`, `nama`, `waktu`, `status`) VALUES
(6, 0, 'Album Sekolah 1', '05-03-2016 14:43:25', 1),
(7, 1, 'Milad SMPIT IQRA'' ke-11', '14-03-2016 15:30:40', 1),
(8, 6, 'Prestasi', '15-03-2016 15:20:17', 1),
(9, 6, 'PLK MAPEL PKN ke KOREM', '01-04-2016 14:00:05', 1),
(10, 6, 'Kegiatan Inservis Pendamping K-13 di Cluster SMPIT', '01-04-2016 14:17:23', 1),
(11, 6, 'Study Tour SMPIT Al Qolam Manna di SMPIT IQRA'' Kot', '01-04-2016 14:37:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `album_foto`
--

CREATE TABLE `album_foto` (
  `id_gambar` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_user` int(10) NOT NULL DEFAULT '1',
  `foto` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `deskripsi` text NOT NULL,
  `waktu` varchar(19) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album_foto`
--

INSERT INTO `album_foto` (`id_gambar`, `id_album`, `id_user`, `foto`, `nama`, `deskripsi`, `waktu`, `status`) VALUES
(19, 6, 1, 'gallery_1457707148.jpg', 'Guru SMP IT IQRO Kota Bengkulu', 'Guru SMP IT IQRO Kota Bengkulu', '11-03-2016 21:39:08', 1),
(20, 6, 3, 'gallery_1457707614.jpg', 'Upacara', 'Upacara bendera', '19-03-2016 12:10:41', 1),
(21, 6, 1, 'gallery_1457707655.jpg', 'Gedung Sekolah', 'Gedung Sekolah', '11-03-2016 21:47:35', 1),
(23, 7, 3, 'gallery_1458016564.JPG', 'Penyerahan Hadiah Utama', '', '19-03-2016 12:11:02', 1),
(24, 7, 3, 'gallery_1458017185.JPG', 'Peresmian Klinik Gigi Sekolah', '', '19-03-2016 11:56:31', 1),
(25, 7, 6, 'gallery_1458017596.JPG', 'Milad SMPIT IQRA'' yang berbarengan dengan Milad Ke', '', '15-03-2016 11:53:17', 1),
(26, 7, 6, 'gallery_1458017918.JPG', 'Jalan Sehat dalam rangka MIlad SMPIT IQRA'' yang ke', '', '15-03-2016 12:25:41', 1),
(27, 7, 3, 'gallery_1458019002.JPG', 'Pemotongan Tumpeng oleh Ketua Yayasan Al Fida dan ', '', '16-03-2016 19:19:18', 1),
(29, 8, 6, 'gallery_1458030412.JPG', '', '', '15-03-2016 15:26:52', 1),
(30, 8, 6, 'gallery_1458030590.JPG', '', '', '15-03-2016 15:29:50', 1),
(31, 9, 6, 'gallery_1459494211.jpg', 'Guru Pendamping bersama Komandan KOREM  Bengkulu', '', '01-04-2016 14:03:33', 1),
(32, 9, 6, 'gallery_1459494357.jpg', 'Kegiatan Mountenering', '', '01-04-2016 14:05:58', 1),
(33, 9, 6, 'gallery_1459494426.jpg', 'Pengenalan Senjata pada siswi SMPIT IQRA''', '', '01-04-2016 14:07:07', 1),
(34, 9, 6, 'gallery_1459494649.jpg', 'Pengenalan Senjata pada siswa SMPIT IQRA''', '', '01-04-2016 14:10:53', 1),
(35, 9, 6, 'gallery_1459494835.jpg', 'Guru PKN yang mendamping PLK PKN', '', '01-04-2016 14:13:56', 1),
(36, 10, 6, 'gallery_1459495212.JPG', 'Kepala SMPIT IQRA'' bersama para narasumber', '', '01-04-2016 14:20:17', 1),
(37, 10, 6, 'gallery_1459495415.JPG', '', '', '01-04-2016 14:23:39', 1),
(38, 10, 6, 'gallery_1459495666.JPG', 'Para pesera Inservis pendamping K-13', '', '01-04-2016 14:27:52', 1),
(39, 10, 6, 'gallery_1459496148.JPG', '', '', '01-04-2016 14:35:53', 1),
(40, 11, 6, 'gallery_1459496438.JPG', 'Guru SMPIT Al Qolam bersama Guru SMPIT IQRA''', '', '01-04-2016 14:40:50', 1),
(41, 11, 6, 'gallery_1459496704.JPG', 'Siswi SMPIT IQRA'' dan Siswi Al Qolam', '', '01-04-2016 14:45:07', 1),
(43, 10, 6, 'gallery_1459562539.JPG', 'On Perpustakan', 'On Perpustakan pada rangkaian inservis K-13 di Cluster SMPIT IQRA'' yang dilakukan oleh Ustad Syaidina Hamzah, SE', '02-04-2016 09:02:23', 1),
(44, 10, 6, 'gallery_1459562769.JPG', 'On Mata Pelajaran Penjas', 'On Mata Pelajaran Penjas dalam rangkaian inservis K-13 oleh Ustad Rusli Supriyatna, S.Pd', '02-04-2016 09:06:15', 1),
(45, 10, 6, 'gallery_1459563005.JPG', 'On Mata Pelajaran IPS', 'On Mata Pelajaran IPS dalam rangkaian inservis K-13 oleh Ustadza Elisa, S.Pd', '02-04-2016 09:10:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `no_registrasi` varchar(12) NOT NULL,
  `tanggal_registrasi` datetime NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat_rumah` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `ktp_ortu` varchar(30) NOT NULL,
  `kartu_keluarga` varchar(30) NOT NULL,
  `akta_lahir` varchar(30) NOT NULL,
  `bukti_bayar` varchar(30) NOT NULL,
  `nama_pembayar` varchar(30) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `status` int(1) NOT NULL,
  `final` int(1) NOT NULL,
  `dok_1` varchar(30) NOT NULL,
  `dok_2` varchar(30) NOT NULL,
  `dok_3` varchar(30) NOT NULL,
  `dok_4` varchar(30) NOT NULL,
  `dok_5` varchar(30) NOT NULL,
  `dok_6` varchar(30) NOT NULL,
  `dok_7` varchar(30) NOT NULL,
  `dok_8` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `nama`, `tanggal`, `keterangan`, `file`, `status`) VALUES
(5, 'Dokumen PPDB', '2016-03-03', '', 'Dokumen_PPDB1.docx', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `id` int(2) NOT NULL,
  `hari` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_tes` text COLLATE utf8_unicode_ci NOT NULL,
  `waktu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id`, `hari`, `tanggal`, `jenis_tes`, `waktu`) VALUES
(1, 'Selasa', '4 Maret 2016', '<p>Bacaan dan Hafalan Alquran<br /><br /></p>\r\n<p>wawancara siswa Wawancara orang<br /><br /></p>\r\n<p>Wawancara orang tua</p>', '<p>Gel.1. No.tes 1-100 (07.30-09.30)<br /><br /></p>\r\n<p>Gel.2. No.tes 101-200 (10.00-12.00)<br /><br /></p>\r\n<p>Gel.3. No.tes &gt;= 201 (13.00-15.00)</p>'),
(3, 'Jum''at', '22 April 2016', '<p>Matematika Dasar (Essay)<br /><br /></p>\r\n<p>Pengetahuan Umum (Pilihan Ganda)</p>', '<p>08.00-08.45<br /><br /></p>\r\n<p>09.15-11.00</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman_berita`
--

CREATE TABLE `pengumuman_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `file` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `status_aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman_berita`
--

INSERT INTO `pengumuman_berita` (`id`, `judul`, `tanggal`, `isi`, `foto`, `file`, `status`, `status_aktif`) VALUES
(1, 'Hasil TO MKKS ke-2 ', '2016-04-01', '<p>TO MKKS ke-2 SMPIT IQRA'' Bengkulu menempati peringkat kedua sekota Bengkulu.</p>', 'pengumuman_1459475683.jpg', 'pengumuman_1456071180.docx', 'berita', 1),
(5, 'Pendaftaran Peserta Didik Baru', '2016-03-17', '<p>Tahun Pelajaran 2016/2017 SMPIT IQRA'' Kota Bengkulu menerima Peserta Didik Baru dengan persyaratan</p>\r\n<p>1. Membayar uang pendaftaran Rp.300.000</p>\r\n<p>2. Mengisi Formulir Pendaftaran</p>\r\n<p>3. Pas Foto ukuran 3 x 4 warna = 3 lembar</p>\r\n<p>&nbsp;</p>\r\n<p>Tempat Pendaftaran SMPIT IQRA'' Kota Bengkulu JL.MT.Haryono No.290 Kampung Bali Telp.0736-21581</p>\r\n<p>Pendaftaran via online :www.smpitiqra-bengkulu.sch.id</p>\r\n<p>Kontak Person :<strong> Syaidina Hamzah, SE (085383219597)</strong></p>\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dizartika, ST (085273626702)</strong></p>', 'pengumuman_1457943879.jpg', '', 'pengumuman', 1),
(34, 'Pengumuman Kelulusan PPDB', '2016-03-19', '<table style="height: 1534px;">\r\n<tbody>\r\n<tr>\r\n<td style="text-align: center;" colspan="5" width="739">\r\n<p><strong>PENGUMUMAN KELULUSAN PENDAFTARAN PESERTA DIDIK BARU</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center;" colspan="5" width="739">\r\n<p><strong>SMPIT IQRA'' KOTA BENGKULU</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center;" colspan="5" width="739">\r\n<p><strong>JALUR PRESTASI</strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center;" colspan="5" width="739">\r\n<p>TP. 2016/2017</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">&nbsp;</td>\r\n<td width="207">&nbsp;</td>\r\n<td width="209">&nbsp;</td>\r\n<td width="95">&nbsp;</td>\r\n<td width="205">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p><strong>NO</strong></p>\r\n</td>\r\n<td width="207">\r\n<p><strong>NAMA</strong></p>\r\n</td>\r\n<td width="209">\r\n<p><strong>KATEGORI PRESTASI</strong></p>\r\n</td>\r\n<td width="95">\r\n<p><strong>NO PESERTA</strong></p>\r\n</td>\r\n<td width="205">\r\n<p><strong>ASAL SEKOLAH </strong></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>1</p>\r\n</td>\r\n<td width="207">\r\n<p>NAUFAL DAFFA ZAYYAN</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 1 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>05 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>2</p>\r\n</td>\r\n<td width="207">\r\n<p>RIFQI SAGHLUL MUSYAFFA</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 1 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>08 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>3</p>\r\n</td>\r\n<td width="207">\r\n<p>MUHAMMAD &nbsp; GHIVARY</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 1 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>04 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>4</p>\r\n</td>\r\n<td width="207">\r\n<p>MUHAMMAD ATHALLAH FIKRI</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 2 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>06 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>5</p>\r\n</td>\r\n<td width="207">\r\n<p>HANNA FUJA DAMAYANTI</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 2 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>09 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>6</p>\r\n</td>\r\n<td width="207">\r\n<p>AFIFAH NAURA HIDAYAT</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 2 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>11 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>7</p>\r\n</td>\r\n<td width="207">\r\n<p>SALZABILLA PUTRI VAUNDRA</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 2 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>03 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>8</p>\r\n</td>\r\n<td width="207">\r\n<p>SALMA ISHMAH</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 3 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>07 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>9</p>\r\n</td>\r\n<td width="207">\r\n<p>QURATUN NAURAH</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 3 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>12 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>10</p>\r\n</td>\r\n<td width="207">\r\n<p>ADNAN NADZIR NASUTION</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 3 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>10 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>11</p>\r\n</td>\r\n<td width="207">\r\n<p>RAHMATHIYAH SARI AMANDA</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 3 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>01 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>12</p>\r\n</td>\r\n<td width="207">\r\n<p>HASNA RAFA TASABITAH</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 1 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>21 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>13</p>\r\n</td>\r\n<td width="207">\r\n<p>RINI DIANA SARI</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 1 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>16 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>14</p>\r\n</td>\r\n<td width="207">\r\n<p>FURQAN AL QOWI</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 1 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>19 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>15</p>\r\n</td>\r\n<td width="207">\r\n<p>SALSABILA TALITHA W</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 1 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>13 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>16</p>\r\n</td>\r\n<td width="207">\r\n<p>ANNISYA NURHASANAH</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 2 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>17 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>17</p>\r\n</td>\r\n<td width="207">\r\n<p>LUTHFIAH AZZAHRA R</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 2 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>14 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>18</p>\r\n</td>\r\n<td width="207">\r\n<p>ECTSA NABILA F.S</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 2 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>18 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>19</p>\r\n</td>\r\n<td width="207">\r\n<p>RIZKIA SEKAR ARUM</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 3 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>15 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>20</p>\r\n</td>\r\n<td width="207">\r\n<p>NAURA SYAHLA A</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 3 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>22 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>21</p>\r\n</td>\r\n<td width="207">\r\n<p>LEONIE TIARA AVISKA</p>\r\n</td>\r\n<td width="209">\r\n<p>JUARA 3 KELAS</p>\r\n</td>\r\n<td width="95">\r\n<p>20 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>22</p>\r\n</td>\r\n<td width="207">\r\n<p>AULIYA ZIKRA FADILA</p>\r\n</td>\r\n<td width="209">\r\n<p>RANGKING 1 PRESTASI LOMBA</p>\r\n</td>\r\n<td width="95">\r\n<p>28 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>23</p>\r\n</td>\r\n<td width="207">\r\n<p>SYAHIDAH RIDHA HARIS</p>\r\n</td>\r\n<td width="209">\r\n<p>RANGKING 2 PRESTASI LOMBA</p>\r\n</td>\r\n<td width="95">\r\n<p>02 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SD N 01 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>24</p>\r\n</td>\r\n<td width="207">\r\n<p>FATHYA KHAIRUNNISAA</p>\r\n</td>\r\n<td width="209">\r\n<p>RANGKING 3 PRESTASI LOMBA</p>\r\n</td>\r\n<td width="95">\r\n<p>27 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 2 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>25</p>\r\n</td>\r\n<td width="207">\r\n<p>NUR EL HASANAH</p>\r\n</td>\r\n<td width="209">\r\n<p>RANGKING 4 PRESTASI LOMBA</p>\r\n</td>\r\n<td width="95">\r\n<p>26 A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">\r\n<p>26</p>\r\n</td>\r\n<td width="207">\r\n<p>ATHIYYAH KANNAVIA</p>\r\n</td>\r\n<td width="209">\r\n<p>RANGKING 5 PRESTASI LOMBA</p>\r\n</td>\r\n<td width="95">\r\n<p>29A</p>\r\n</td>\r\n<td width="205">\r\n<p>SDIT IQRA'' 1 KOTA BENGKULU</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">&nbsp;</td>\r\n<td width="207">&nbsp;</td>\r\n<td width="209">&nbsp;</td>\r\n<td width="95">&nbsp;</td>\r\n<td width="205">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td colspan="5" width="739">\r\n<p>Catatan : Daftar ulang jalur prestasi dilaksanakan dari tanggal 21 maret s/d 31 maret 2016 jam 08.00 WIB s/d jam 14.00 WIB</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="23">&nbsp;</td>\r\n<td width="207">&nbsp;</td>\r\n<td width="209">&nbsp;</td>\r\n<td width="95">&nbsp;</td>\r\n<td width="205">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width="23">&nbsp;</td>\r\n<td width="207">&nbsp;</td>\r\n<td width="209">&nbsp;</td>\r\n<td width="95">&nbsp;</td>\r\n<td width="205">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width="23">&nbsp;</td>\r\n<td colspan="2" rowspan="6" width="416">&nbsp;\r\n<p><strong>CP</strong><strong> : Ketua Panitia </strong></p>\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (085383219597)</strong></p>\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bendahara </strong></p>\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (085268067125)</strong></p>\r\n</td>\r\n<td colspan="2" width="300">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width="23">&nbsp;</td>\r\n<td width="95">&nbsp;</td>\r\n<td width="205">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width="23">&nbsp;</td>\r\n<td colspan="2" width="300">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width="23">&nbsp;</td>\r\n<td width="95">&nbsp;</td>\r\n<td width="205">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width="23">&nbsp;</td>\r\n<td width="95">&nbsp;</td>\r\n<td width="205">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width="23">&nbsp;</td>\r\n<td width="95">&nbsp;</td>\r\n<td width="205">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width="23">&nbsp;</td>\r\n<td width="207">&nbsp;</td>\r\n<td width="209">&nbsp;</td>\r\n<td colspan="2" width="300">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'pengumuman_1458348335.jpg', '', 'pengumuman', 1),
(35, 'Hasil TO JSIT', '2016-04-02', '<p>Alhamdulillah TO Jaringan Sekolah Islam Terpadu (JSIT) kls 9&nbsp; sdh ada hasilnya. SMPIT IQRA bengkulu di posisi 16 Nasional, posisi 1 Sumatera.Semoga tahun depan lebih baik lagi..amin</p>', 'pengumuman_1459475449.jpg', 'Justice_League_vs_Teen_Titans_', 'berita', 1),
(38, 'PLK SMPIT IQRA" Kota Bengkulu ', '2016-04-02', '<p>PLK PKN Kelas 8 SMPIT IQRA'' Kota Bengkulu ke KOREM 041 Gamas.</p>\r\n<p>Dalam rangka melatih kedisiplinan dan menambah rasa cintah tanah air Siswa/i SMPIT IQRA" Kota Bengkulu, Kelompok Kerja Guru (KKG) Mata Pelajaran PKN mengadakan Pembelejaran Luar Kelas (PLK) ke KOREM 041 Gamas pada;</p>\r\n<p>Hari / Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Sabtu / 20 Februari 2016</p>\r\n<p>Jam&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 07.00 - 12.00</p>\r\n<p>Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Komando Resort Militer (KOREM) 041 Gamas Bengkulu</p>\r\n<p>adapun rangkaian kegiatan yang dilakukan sebagai berikut ;</p>\r\n<p>1. Penyambutan oleh pihak KOREM</p>\r\n<p>2. Latihan baris berbaris</p>\r\n<p>3. Pengenalan senjata</p>\r\n<p>4. Mountenering (outbound)</p>\r\n<p>5. Materi bela negara.</p>', 'pengumuman_1459560023.jpg', '', 'berita', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `tingkatan_guru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `foto`, `keterangan`, `status`, `tingkatan_guru`) VALUES
(8, 'SMP IT IQRO'' Kota Bengkulu', 'sekolah_1457150379.jpg', '<h3><strong>VISI</strong></h3>\r\n<p>Terwujudnya Generasi Islami, Unggul dan Mandiri</p>\r\n<h3><strong>JAMINAN MUTU / QUALITY ASSURANCE :</strong></h3>\r\n<p>Setiap peserta didik yang lulus diharapkan minimal telah menguasai jaminan mutu / quality assurance yaitu :</p>\r\n<ol>\r\n<li>Melaksanakan sholat lima waktu &amp; ibadah lainnya dengan kesadaran.</li>\r\n<li>Hafal 2 juz Al Quran.</li>\r\n<li>Berakhlak Islami.</li>\r\n<li>Hafal 20 hadits Arbai''in Nabawi An-Nawawiyyah dan Al-Ma''tsurat.</li>\r\n<li>Senang &amp; terampil dalam belajar.</li>\r\n<li>Bersih, rapi, disiplin, dan sehat.</li>\r\n<li>Dapat berkomunikasi bahasa Arab dan bahasa Inggris sederhana.</li>\r\n<li>Mampu memanfaatkan teknologi&nbsp;dan informasi.</li>\r\n<li>Menguasai konsep dasar mata pelajaran.</li>\r\n</ol>', 'sekolah', 0),
(9, 'Kesiswaan', 'sekolah_1457154258.jpg', '<h3 style="text-align: center;"><strong>&nbsp;Ekstrakurikuler yang ada di SMPIT IQRA'' Kota Bengkulu</strong></h3>\r\n<p>&nbsp;</p>\r\n<table style="margin-left: auto; margin-right: auto;" border="1" cellspacing="10" cellpadding="10">\r\n<tbody>\r\n<tr>\r\n<td style="text-align: center;">\r\n<h3>Bidang Non Akademik :&nbsp;</h3>\r\n</td>\r\n<td style="text-align: center;">\r\n<h3>Bidang Akademik:</h3>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center;">\r\n<ul>\r\n<li style="text-align: left;">Kaligrafi</li>\r\n<li style="text-align: left;">Nasyid</li>\r\n<li style="text-align: left;">Qori</li>\r\n<li style="text-align: left;">Karate</li>\r\n<li style="text-align: left;">Pramuka SIT</li>\r\n<li style="text-align: left;">Grafis</li>\r\n<li style="text-align: left;">Sanggar Pena</li>\r\n<li style="text-align: left;">Pensi</li>\r\n<li style="text-align: left;">obotika</li>\r\n<li style="text-align: left;">Taekwondo</li>\r\n<li style="text-align: left;">Muhadhoroh</li>\r\n<li style="text-align: left;">Futsal</li>\r\n<li style="text-align: left;">Paskibraka</li>\r\n<li style="text-align: left;">Basket</li>\r\n<li style="text-align: left;">PMR</li>\r\n</ul>\r\n</td>\r\n<td style="text-align: center;">\r\n<ul>\r\n<li style="text-align: left;">Matematika Club</li>\r\n<li style="text-align: left;">Fisika Club</li>\r\n<li style="text-align: left;">Biologi Club</li>\r\n<li style="text-align: left;">IPS Club</li>\r\n<li style="text-align: left;">Bahasa Arab</li>\r\n<li style="text-align: left;">Bahasa Inggris Club</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'kesiswaan', 0),
(10, 'Lab.IPA', 'sekolah_1458696513.jpg', '<p>Lab.IPA</p>', 'sarana', 0),
(11, 'SMP IT IQRO'' Kota Bengkulu', '', 'Ini adalah kurikulum', 'kurikulum', 0),
(12, 'Ruang UKS Siswa', 'ava_1457153445.jpg', '<p>Ruang UKS Siswa</p>', 'sarana', 0),
(13, 'Ruang Galeri Seni', 'ava_1457153561.jpg', '<p>Ruang Galeri Seni</p>', 'sarana', 0),
(14, 'Ruang Belajar Siswa', 'ava_1457153711.jpg', '<p>Ruang Belajar Siswa</p>', 'sarana', 0),
(15, 'M. Irfan Sofyan, A.Md', 'ava_1457701275.jpg', '<p>Guru SBK</p>', 'guru', 6),
(16, 'Ustad Agus Meianto, S.Pd.I', 'ava_1457701311.jpg', '<p>Guru Al-Quran</p>', 'guru', 6),
(17, 'Ustad Armawansyah', 'ava_1457701340.jpg', '<p>Staf TU</p>', 'guru', 6),
(18, 'Ustad Asep Suryadi, S.Kom', 'ava_1457701379.jpg', '<p>Guru TIK</p>', 'guru', 6),
(19, 'Ustad Fahmi, S.Pd', 'ava_1457701407.jpg', '<p>Guru Matematika</p>', 'guru', 6),
(20, 'Ustad Ghofar Amarullah, S.Pd', 'ava_1457701433.jpg', '<p>Guru Matematika</p>', 'guru', 6),
(21, 'Ustad Harun Al-Rasyid, S.Pd', 'ava_1457701457.jpg', '<p>Guru IPA</p>', 'guru', 6),
(22, 'Ustad Hendri Dunan, S.Pd.I', 'ava_1457701481.jpg', '<p>Guru Al-Quran</p>', 'guru', 6),
(23, 'Ustad Herizal, S.Ag', 'ava_1457701506.jpg', '<p>Waka. Sarpras, Guru PAI</p>', 'guru', 4),
(24, 'Ustad Lailatul Qadar, S.Pd', 'ava_1457701527.jpg', '<p>Guru Bahasa Inggris</p>', 'guru', 6),
(25, 'Ustad Mupi Hidayan, S.Pd.I', 'ava_1457701548.jpg', '<p>Guru Bahasa Arab</p>', 'guru', 6),
(26, 'Ustad Muslim, SE', 'ava_1457701572.jpg', '<p>Guru IPS</p>', 'guru', 6),
(27, 'Ustad Raminurdiarsyah, S.Pd.I', 'ava_1457701590.jpg', '<p>Guru Al-Qur''an</p>', 'guru', 6),
(29, 'Ustad Rusli Supriatna, S.Pd', 'ava_1457701659.jpg', '<p>Guru Penjas</p>', 'guru', 6),
(30, 'Ustad Saepudin, S.Pd.I', 'ava_1457701678.jpg', '<p>Guru PAI</p>', 'guru', 6),
(31, 'Ustad Sakti Tabalamban, SE', 'ava_1457701712.jpg', '<p>Bendahara BOS</p>', 'guru', 6),
(32, 'Ustad Suratno, S.Pd.I', 'ava_1457705651.jpg', '<p>Guru PAI</p>', 'guru', 6),
(33, 'Ustad Syaidina Hamzah, SE', 'ava_1457705671.jpg', '<p>Waka. Humas, Guru IPS</p>', 'guru', 5),
(34, 'Ustad Winarko, S.Pd', 'ava_1457705694.jpg', '<p>Kepala Sekolah, Guru IPA</p>', 'guru', 1),
(37, 'Ustadz Ahmadi Lubis, SS', 'ava_1457705752.jpg', '<p>Wk. Kurikulum, Guru PAI</p>', 'guru', 2),
(38, 'Ustadza Astuti, S.Pd', 'ava_1457705774.jpg', '<p>Guru Bahasa Indonesia</p>', 'guru', 6),
(39, 'Ustadza Desi Jayanti, S.Pd.I', 'ava_1457705791.jpg', '<p>Guru BK</p>', 'guru', 6),
(40, 'Ustadza Dizartika, ST', 'ava_1457705814.jpg', '<p>Guru TIK</p>', 'guru', 6),
(41, 'Ustadza Eka Lusianti, S.Pd', 'ava_1457705835.jpg', '<p>Guru IPA</p>', 'guru', 6),
(42, 'Ustadza Elisa, S.Pd', 'ava_1457705852.jpg', '<p>Guru &nbsp;IPS</p>', 'guru', 6),
(43, 'Ustadza Elmi Yuliza, S.Pd', 'ava_1457705871.jpg', '<p>Guru Matematika</p>', 'guru', 6),
(44, 'Ustadza Eza Novita, M.Pd', 'ava_1457705886.jpg', '<p>Bahasa Indonesia</p>', 'guru', 6),
(45, 'Ustadza Fifit Ansyari, S.Pd', 'ava_1457705903.jpg', '<p>Guru matematika</p>', 'guru', 6),
(46, 'Ustadza Friza Emasari, A.Md', 'ava_1457705930.jpg', '<p>Guru Al-Qur''an</p>', 'guru', 6),
(48, 'Ustadza Jarni Safitri, S.Pd.I', 'ava_1457705963.jpg', '<p>Guru Al-Qur''an</p>', 'guru', 6),
(49, 'Ustadza Junarti, M.Pd', 'ava_1457705982.jpg', '<p>Guru IPA</p>', 'guru', 6),
(50, 'Ustadza Litra Puryanti, S.Pd', 'ava_1457706001.jpg', '<p>Guru Bahasa Indonesia</p>', 'guru', 6),
(51, 'Ustadza Marti Widiya, S.Th.I', 'ava_1457706018.jpg', '<p>Guru Bahasa Arab</p>', 'guru', 6),
(52, 'Ustadza Neti Dahniar, S.Pd', 'ava_1457706035.jpg', '<p>Guru Bahasa Inggris</p>', 'guru', 6),
(53, 'Ustadza Retmi Hartati,S.Sos', 'ava_1457706052.jpg', '<p>Waka Kesiswaan, Guru PKN</p>', 'guru', 3),
(54, 'Ustadza Retnaningsih, SE', 'ava_1457706066.jpg', '<p>Guru IPS</p>', 'guru', 6),
(55, 'Ustadza Sherly Susanti Oktavia, S.Pd', 'ava_1457706087.jpg', '<p>Guru Bahasa Inggris</p>', 'guru', 6),
(56, 'Ustadza Sholihati, A.Md', 'ava_1457706112.jpg', '<p>Kepala TU</p>', 'guru', 6),
(57, 'Ustadza Sulasi Nengsih, S.Pd', 'ava_1457706128.jpg', '<p>Guru IPA</p>', 'guru', 6),
(58, 'Ustadza Susi Arpa, S.Pd', 'ava_1457706143.jpg', '<p>Guru Bahasa Inggris</p>', 'guru', 6),
(59, 'Ustadza Uswatun Hasanah, S.Ag', 'ava_1457706157.jpg', '<p>Guru PAI</p>', 'guru', 6),
(61, 'Ustadzah Nita Puspita Sari, S.Pd', 'ava_1457706233.jpg', '<p>Guru BK</p>', 'guru', 6),
(64, 'Periode Januari-Februari 2016', 'ava_1458695998.jpg', '<p>Berikut ini beberapa prestasi yang telah diraih oleh siswa dan siswi SMPIT IQRA'' Bengkulu selama dua bulan terakhir (Periode Januari-Februari 2016):</p>\r\n<p>1. Juara 1 Olimpiade IPS tingkat kota<br /> 2. Juara 1 Olimpiade IPS tingkat kota<br /> 3. Juara 2 Olimpiade IPA tingkat kota<br /> 4. Juara 3 Story Telling tingkat kota<br /> 5. Juara 1 Poster tingkat kota<br /> 6. Juara 3 Poster tingkat kota<br /> 7. Juara 3 Olimpiade IPS tingkat kota<br /> 8. Juara 3 Lomba Tahfidz Qur''an tingkat kota<br /> 9. Juara 2 Speech Contest tingkat kota<br /> 10. Juara 1 Olimpiade Matematika tingkat kota<br /> 11. Juara Harapan 1 Basket tingkat provinsi<br /> 12. Dan lomba yang lainnya</p>', 'prestasi', NULL),
(67, 'Green House', 'ava_1458781127.jpg', '<p>Green House sekolah</p>', 'sarana', NULL),
(68, 'Perpustakaan sekolah', 'ava_1458781163.jpg', '', 'sarana', NULL),
(69, 'Gedung Tholibat (anak perempuan)', 'ava_1458781237.jpg', '<p>Gedung Belajar Tholibat (anak perempuan)</p>', 'sarana', NULL),
(70, 'Gedung Thullab (anak laki-laki)', 'ava_1458781524.jpg', '<p>Gedung Belajar Thullab (anak laki-laki)</p>', 'sarana', NULL),
(71, 'Lab.Komputer', 'ava_1458781361.jpg', '<p>Lab.Komputer</p>', 'sarana', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tipe_user` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `tipe_user`, `status`) VALUES
(3, 'rama', '21232f297a57a5a743894a0e4a801fc3', 'rama', 1, 1),
(4, 'akachopa', '21232f297a57a5a743894a0e4a801fc3', 'Robbie AkaChopa', 1, 1),
(6, 'canalisnabila', '25d55ad283aa400af464c76d713c07ad', 'canalisnabila', 1, 1),
(7, 'Edo', 'dc7e140abcc327218d0f039e293b42e2', 'Edo Afriando', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profil`
--

CREATE TABLE `user_profil` (
  `id_profil` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `status` int(1) NOT NULL,
  `asal` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `tanggal_lahir` varchar(11) NOT NULL,
  `kutipan` text NOT NULL,
  `facebook` varchar(120) NOT NULL,
  `twitter` varchar(120) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profil`
--

INSERT INTO `user_profil` (`id_profil`, `id_user`, `nama`, `gender`, `nip`, `status`, `asal`, `alamat`, `pekerjaan`, `tanggal_lahir`, `kutipan`, `facebook`, `twitter`, `foto`) VALUES
(1, 1, 'Administrator', '', '', 1, '', '', '', '2015-11-07', '', '', '', 'admin.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `album_foto`
--
ALTER TABLE `album_foto`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman_berita`
--
ALTER TABLE `pengumuman_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_profil`
--
ALTER TABLE `user_profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `username` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `album_foto`
--
ALTER TABLE `album_foto`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengumuman_berita`
--
ALTER TABLE `pengumuman_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_profil`
--
ALTER TABLE `user_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
