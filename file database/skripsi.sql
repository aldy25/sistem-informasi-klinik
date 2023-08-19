-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 02:07 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_antigen`
--

CREATE TABLE `tbl_antigen` (
  `id_antigen` int(255) NOT NULL,
  `pasien` int(255) NOT NULL,
  `dokter` int(255) NOT NULL,
  `parameter` text NOT NULL,
  `hasil` text NOT NULL,
  `keterangan` text NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_antigen`
--

INSERT INTO `tbl_antigen` (`id_antigen`, `pasien`, `dokter`, `parameter`, `hasil`, `keterangan`, `waktu`) VALUES
(6, 18, 25, '100', '60,5', 'Negatif', '2023-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asamurat`
--

CREATE TABLE `tbl_asamurat` (
  `id_asamurat` int(255) NOT NULL,
  `pasien` int(255) NOT NULL,
  `dokter` int(255) NOT NULL,
  `nilai_asamurat` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_izin_sakit`
--

CREATE TABLE `tbl_izin_sakit` (
  `id_izin_sakit` int(255) NOT NULL,
  `pasien` int(255) NOT NULL,
  `dokter` int(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `waktu_awal` varchar(255) NOT NULL,
  `waktu_akhir` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_izin_sakit`
--

INSERT INTO `tbl_izin_sakit` (`id_izin_sakit`, `pasien`, `dokter`, `durasi`, `waktu_awal`, `waktu_akhir`, `keterangan`) VALUES
(4, 13, 32, '3 hari', '2023-03-26', '2023-03-28', 'sakit tifes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jahit`
--

CREATE TABLE `tbl_jahit` (
  `id_jahit` int(255) NOT NULL,
  `pasien` int(255) NOT NULL,
  `dokter` int(255) NOT NULL,
  `jumlah_jahitan` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kb`
--

CREATE TABLE `tbl_kb` (
  `id_kb` int(255) NOT NULL,
  `pasien` int(255) NOT NULL,
  `dokter` int(255) NOT NULL,
  `nama_kb` varchar(255) NOT NULL,
  `jenis_kb` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kb`
--

INSERT INTO `tbl_kb` (`id_kb`, `pasien`, `dokter`, `nama_kb`, `jenis_kb`, `keterangan`, `waktu`) VALUES
(7, 17, 32, 'Kb suntik', '1 bulan', '-', '2022-07-13'),
(8, 16, 35, 'Kb suntik', '1 bulan', '-', '2022-07-13'),
(9, 15, 35, 'Kb suntik', '1 bulan', '-', '2022-07-13'),
(10, 14, 35, 'Kb suntik', '1 bulan', '-', '2022-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kir`
--

CREATE TABLE `tbl_kir` (
  `id_kir` int(255) NOT NULL,
  `pasien` int(255) NOT NULL,
  `dokter` int(255) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `perihal` text NOT NULL,
  `tb` varchar(255) NOT NULL,
  `bb` varchar(255) NOT NULL,
  `gd` varchar(255) NOT NULL,
  `td` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kir`
--

INSERT INTO `tbl_kir` (`id_kir`, `pasien`, `dokter`, `nomor_surat`, `perihal`, `tb`, `bb`, `gd`, `td`, `waktu`, `keterangan`) VALUES
(5, 13, 32, '110/20/2023', 'lomba senam', '140', '37', 'O', '110/80', '2023-03-10', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kolestrol`
--

CREATE TABLE `tbl_kolestrol` (
  `id_kolestrol` int(255) NOT NULL,
  `pasien` int(255) NOT NULL,
  `dokter` int(255) NOT NULL,
  `nilai_kolestrol` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_layanan`
--

CREATE TABLE `tbl_layanan` (
  `id_layanan` int(255) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_layanan`
--

INSERT INTO `tbl_layanan` (`id_layanan`, `nama_layanan`, `harga`) VALUES
(1, 'Berobat', '50000'),
(2, 'Tes Antigen', '65000'),
(3, 'Pasang Kb', '35000'),
(4, 'Surat Keterangan Sehat', '30000'),
(5, 'Suntik Vitamin', '30000'),
(6, 'Surat Izin Sakit', '0'),
(7, 'Operasi Kecil', '120000'),
(8, 'Jahit Luka', '100000'),
(9, 'Cek Kolestrol', '35000'),
(10, 'Cek Asam Urat', '35000'),
(11, 'Sunat', '300000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id_obat` int(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `kode_obat` varchar(255) NOT NULL,
  `jumlah_obat` int(255) NOT NULL,
  `harga_satuan` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`id_obat`, `nama_obat`, `kode_obat`, `jumlah_obat`, `harga_satuan`, `satuan`, `keterangan`) VALUES
(6, 'Pil KB', 'A1', 90, '10000', 'keping', '-'),
(7, 'Ambeven', 'A2', 100, '8000', 'keping', '-'),
(8, 'Calcid', 'A3', 90, '7000', 'keping', '-'),
(9, 'Sutra (kondom)', 'A4', 100, '40000', 'kotak', '-'),
(10, 'Test Pack', 'A5', 100, '15000', 'buah', '-'),
(11, 'Combantrin', 'A6', 100, '25000', 'botol', '-'),
(12, 'Gestiamin', 'A7', 100, '15000', 'tablet', '-'),
(13, 'Minyak cap Kapak', 'A8', 100, '30000', 'botol', '-'),
(14, 'Pacdin Vitcur Syrup', 'A9', 100, '30000', 'botol', '-'),
(15, 'Muliavit Syrup', 'A10', 100, '35000', 'botol', '-'),
(16, 'Povidone Iodine', 'A11', 100, '12000', 'keping', '-'),
(17, 'Alkohol', 'A12', 100, '100000', 'botol', '-'),
(18, 'Plester Perekat', 'A13', 100, '10000', 'pcs', '-'),
(19, 'Vitamin C-500 mg', 'A14', 100, '20000', 'kapsul', '-'),
(20, 'Oralit', 'A15', 90, '22000', 'keping', '-'),
(21, 'Salonpas', 'A16', 100, '27000', 'kotak', '-'),
(22, 'Balsem Lang', 'A17', 100, '20000', 'pcs', '-'),
(23, 'Antimo', 'A19', 100, '80000', 'kotak', '-'),
(24, 'Tolak Angin', 'A20', 100, '80000', 'kotak', '-'),
(25, 'Minyak Kayu Putih', 'A18', 100, '17000', 'botol', '-'),
(26, 'Freshcare', 'A21', 100, '26000', 'botol', '-'),
(27, 'Microlak', 'A22', 200, '20000', 'keping', '-'),
(28, 'Salisisil Talk', 'A23', 100, '24000', 'keping', '-'),
(29, 'Handsaplast', 'A24', 100, '30000', 'kotak', '-'),
(30, 'Rivanol', 'A27', 200, '20000', 'tablet', '-'),
(31, 'Molakrim', 'A29', 100, '24000', 'pcs', '-'),
(32, 'Kapas Pembalut', 'A30', 100, '20000', 'kotak', '-'),
(33, 'Kasa Hidrofil', 'A31', 100, '20000', 'keping', '-'),
(34, 'Kasa Baru', 'A32', 100, '12000', 'keping', '-'),
(35, 'Biogastron (Antasid)', 'A33', 100, '32000', 'keping', '-'),
(36, 'Amlodipine Besilate 10 Mg', 'A34', 100, '20000', 'buah', '-'),
(37, 'Hexavask Amlodipine 5 mg', 'A35', 100, '20000', 'tablet', '-'),
(38, 'Topcilin (Amoxcilin)500 mg', 'A36', 90, '33000', 'tablet', '-'),
(39, 'Holicos (Ambroxol) 30 Mg', 'A37', 100, '30000', 'tablet', '-'),
(40, 'roverton { ambroxol} ', 'A38', 100, '24000', 'tablet', '-'),
(41, 'Broxal {Ambroxol }', 'A39', 100, '21000', 'tablet', '-'),
(42, 'Aciclovir Virpes 400 Mg', 'A40', 100, '23000', 'keping', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat_keluar`
--

CREATE TABLE `tbl_obat_keluar` (
  `id_obat_keluar` int(255) NOT NULL,
  `obat` int(255) NOT NULL,
  `jumlah_keluar` varchar(255) NOT NULL,
  `jenis_keluar` varchar(255) NOT NULL,
  `tanggal_keluar` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_obat_keluar`
--

INSERT INTO `tbl_obat_keluar` (`id_obat_keluar`, `obat`, `jumlah_keluar`, `jenis_keluar`, `tanggal_keluar`, `keterangan`) VALUES
(2, 2, '10', 'Berobat', '2023-01-26', '-'),
(3, 4, '10', 'Berobat', '2023-01-26', '-'),
(4, 4, '1', 'Jual', '2023-01-12', '-'),
(5, 2, '2', 'Jual', '2023-01-11', '-'),
(6, 2, '5', 'Berobat', '2023-01-26', '-'),
(7, 4, '3', 'Berobat', '2023-01-26', '-'),
(8, 4, '10', 'Berobat', '2023-01-26', '-'),
(9, 2, '10', 'Berobat', '2023-01-26', '-'),
(10, 2, '10', 'Berobat', '2023-01-19', '-'),
(11, 2, '9', 'Berobat', '2023-02-07', '-'),
(12, 4, '10', 'Berobat', '2023-01-19', '-'),
(13, 2, '2', 'Berobat', '2023-01-20', '-'),
(14, 2, '10', 'Berobat', '2023-03-10', '-'),
(15, 5, '10', 'Berobat', '2023-03-10', '-'),
(16, 2, '10', 'Berobat', '2023-03-12', '-'),
(17, 4, '10', 'Berobat', '2023-03-12', '-'),
(18, 5, '10', 'Berobat', '2023-03-19', '-'),
(19, 4, '10', 'Berobat', '2023-03-19', '-'),
(20, 8, '10', 'Berobat', '2023-03-26', '-'),
(21, 38, '10', 'Berobat', '2023-05-07', '-'),
(22, 20, '10', 'Berobat', '2023-05-07', '-'),
(23, 6, '10', 'Jual', '2023-05-11', 'expired');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat_masuk`
--

CREATE TABLE `tbl_obat_masuk` (
  `id_obat_masuk` int(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `kode_obat` varchar(255) NOT NULL,
  `jumlah_obat` varchar(255) NOT NULL,
  `harga_satuan` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `tanggal_exp` varchar(255) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `tanggal_masuk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_obat_masuk`
--

INSERT INTO `tbl_obat_masuk` (`id_obat_masuk`, `nama_obat`, `kode_obat`, `jumlah_obat`, `harga_satuan`, `satuan`, `tanggal_exp`, `sumber`, `tanggal_masuk`, `keterangan`) VALUES
(2, 'paramex', 'A003', '20', '20000', 'kaplet', '2024-02-14', 'PT AGRI YASA', '2023-01-24', '-'),
(3, 'sanmol', 'A002', '30', '24000', 'kaplet', '2024-01-24', 'PT AGRI YASA', '2023-01-24', '-'),
(4, 'ranitidin', 'K001', '200', '2000', 'kaplet', '2024-02-02', 'PT ADI YASA', '2023-02-02', '-'),
(5, 'Pil KB', 'A1', '100', '10000', 'keping', '2024-07-26', 'PT  agriyasa', '2022-08-17', '-'),
(6, 'Ambeven', 'A2', '100', '8000', 'keping', '2023-12-15', 'PT  agriyasa', '2022-10-11', '-'),
(7, 'Calcid', 'A3', '100', '7000', 'keping', '2023-10-28', 'PT  agriyasa', '2022-12-13', '-'),
(8, 'Sutra (kondom)', 'A4', '100', '40000', 'kotak', '2024-07-10', 'PT  agriyasa', '2022-09-21', '-'),
(9, 'Test Pack', 'A5', '100', '15000', 'buah', '2024-11-07', 'PT  agriyasa', '2022-10-11', '-'),
(10, 'Combantrin', 'A6', '100', '25000', 'botol', '2024-06-13', 'PT  agriyasa', '2022-07-13', '-'),
(11, 'Gestiamin', 'A7', '100', '15000', 'tablet', '2024-01-18', 'PT  agriyasa', '2023-01-18', '-'),
(12, 'Minyak cap Kapak', 'A8', '100', '30000', 'botol', '2023-10-19', 'PT  agriyasa', '2023-02-16', '-'),
(13, 'Pacdin Vitcur Syrup', 'A9', '100', '30000', 'botol', '2023-08-18', 'PT  agriyasa', '2023-02-15', '-'),
(14, 'Muliavit Syrup', 'A10', '100', '35000', 'botol', '2023-11-16', 'PT  agriyasa', '2022-12-14', '-'),
(15, 'Povidone Iodine', 'A11', '100', '12000', 'keping', '2023-09-14', 'PT  agriyasa', '2023-02-22', '-'),
(16, 'Alkohol', 'A12', '100', '100000', 'botol', '2023-08-17', 'PT  agriyasa', '2023-02-15', '-'),
(17, 'Plester Perekat', 'A13', '100', '10000', 'pcs', '2023-07-06', 'PT  agriyasa', '2023-02-16', '-'),
(18, 'Vitamin C-500 mg', 'A14', '100', '20000', 'kapsul', '2023-12-06', 'PT  agriyasa', '2022-12-15', '-'),
(19, 'Oralit', 'A15', '100', '22000', 'keping', '2024-08-07', 'PT  agriyasa', '2022-08-17', '-'),
(20, 'Salonpas', 'A16', '100', '27000', 'kotak', '2023-09-15', 'PT  agriyasa', '2022-10-12', '-'),
(21, 'Balsem Lang', 'A17', '100', '20000', 'pcs', '2023-10-13', 'PT  agriyasa', '2023-01-18', '-'),
(22, 'Antimo', 'A19', '100', '80000', 'kotak', '2024-01-10', 'PT  agriyasa', '2022-12-14', '-'),
(23, 'Tolak Angin', 'A20', '100', '80000', 'kotak', '2023-11-16', 'PT  agriyasa', '2023-01-18', '-'),
(24, 'Minyak Kayu Putih', 'A18', '100', '17000', 'botol', '2023-11-09', 'PT  agriyasa', '2022-12-15', '-'),
(25, 'Freshcare', 'A21', '100', '26000', 'botol', '2023-08-17', 'PT  agriyasa', '2023-01-18', '-'),
(26, 'Microlak', 'A22', '200', '20000', 'keping', '2023-08-17', 'PT  agriyasa', '2023-02-16', '-'),
(27, 'Salisisil Talk', 'A23', '100', '24000', 'keping', '2023-07-13', 'PT  agriyasa', '2023-02-16', '-'),
(28, 'Handsaplast', 'A24', '100', '30000', 'kotak', '2023-07-13', 'PT  agriyasa', '2023-03-14', '-'),
(29, 'Rivanol', 'A27', '100', '20000', 'tablet', '2023-12-07', 'PT  agriyasa', '2023-08-18', '-'),
(30, 'trombogel', 'A27', '100', '12000', 'keping', '2024-03-13', 'PT  agriyasa', '2023-02-16', '-'),
(31, 'Molakrim', 'A29', '100', '24000', 'pcs', '2024-07-18', 'PT  agriyasa', '2023-01-19', '-'),
(32, 'Kapas Pembalut', 'A30', '100', '20000', 'kotak', '2024-02-09', 'PT  agriyasa', '2023-01-19', '-'),
(33, 'Kasa Hidrofil', 'A31', '100', '20000', 'keping', '2023-09-07', 'PT  agriyasa', '2023-02-15', '-'),
(34, 'Kasa Baru', 'A32', '100', '12000', 'keping', '2024-03-14', 'PT  agriyasa', '2023-01-19', '-'),
(35, 'Biogastron (Antasid)', 'A33', '100', '32000', 'keping', '2023-11-17', 'PT  agriyasa', '2023-02-08', '-'),
(36, 'Amlodipine Besilate 10 Mg', 'A34', '100', '20000', 'buah', '2024-03-14', 'PT  agriyasa', '2023-02-16', '-'),
(37, 'Hexavask Amlodipine 5 mg', 'A35', '100', '20000', 'tablet', '2023-12-15', 'PT  agriyasa', '2023-01-19', '-'),
(38, 'Topcilin (Amoxcilin)500 mg', 'A36', '100', '33000', 'tablet', '2023-12-14', 'PT  agriyasa', '2023-01-19', '-'),
(39, 'Holicos (Ambroxol) 30 Mg', 'A37', '100', '30000', 'tablet', '2023-09-15', 'PT  agriyasa', '2023-01-19', '-'),
(40, 'roverton { ambroxol} ', 'A38', '100', '24000', 'tablet', '2023-11-17', 'PT  agriyasa', '2023-01-19', '-'),
(41, 'Broxal {Ambroxol }', 'A39', '100', '21000', 'tablet', '2024-01-18', 'PT  agriyasa', '2023-01-19', '-'),
(42, 'Aciclovir Virpes 400 Mg', 'A40', '100', '23000', 'keping', '2024-03-15', 'PT  agriyasa', '2023-01-19', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_operasi`
--

CREATE TABLE `tbl_operasi` (
  `id_operasi` int(255) NOT NULL,
  `pasien` int(255) NOT NULL,
  `dokter` int(255) NOT NULL,
  `nama_operasi` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(255) NOT NULL,
  `no_rm` varchar(255) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `jk_pasien` varchar(255) NOT NULL,
  `umur_pasien` varchar(255) NOT NULL,
  `alamat_pasien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `no_rm`, `nama_pasien`, `jk_pasien`, `umur_pasien`, `alamat_pasien`) VALUES
(12, '100012', 'ikbal', 'Laki-Laki', '22', 'mendalo indah'),
(13, '100013', 'echa elsavira', 'Perempuan', '15', 'auduri'),
(14, '100014', 'Novi', 'Perempuan', '30', 'RT 39 EKA JAYA'),
(15, '100015', 'Asih', 'Perempuan', '46', 'RT 42 EKA JAYA'),
(16, '100016', 'Yani', 'Perempuan', '38', 'RT 49 EKA JAYA'),
(17, '100017', 'Siti', 'Perempuan', '33', 'RT33 PAYO SELINCAH'),
(18, '100018', 'Andi marlina', 'Perempuan', '41', 'RT 05 EKA JAYA'),
(19, '100019', 'badu', 'Laki-Laki', '24', 'auduri 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekam_medis`
--

CREATE TABLE `tbl_rekam_medis` (
  `id_rm` int(255) NOT NULL,
  `pasien` int(255) NOT NULL,
  `dokter` int(255) NOT NULL,
  `no_rm` varchar(20) NOT NULL,
  `tinggi_badan` int(10) NOT NULL,
  `berat_badan` int(10) NOT NULL,
  `tekanan_darah` varchar(10) NOT NULL,
  `anamnesa` text NOT NULL,
  `assesmen` text NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `terapi` text NOT NULL,
  `edukasi` text NOT NULL,
  `rujukan` text NOT NULL,
  `waktu` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekam_medis`
--

INSERT INTO `tbl_rekam_medis` (`id_rm`, `pasien`, `dokter`, `no_rm`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `anamnesa`, `assesmen`, `diagnosa`, `terapi`, `edukasi`, `rujukan`, `waktu`, `keterangan`) VALUES
(15, 13, 32, '100013', 140, 37, '110/80', 'batuk-batuk, demam, sakit perut', 'suntik', 'demam tinggi', '-', 'hindari minum coffe', '-', '2023-03-10', 'alergi obat cair'),
(16, 12, 32, '100012', 177, 70, '110/10', 'batuk berdahak, mual, pusing, dan demam tinggi', 'suntik', 'tifes', '-', 'jangan makan yang pedas', '-', '2023-03-12', '-'),
(17, 13, 25, '100013', 177, 74, '110/80', 'demam', 'suntik', 'tifus', '-', 'jangan minum kopi', '-', '2023-03-19', '-'),
(18, 13, 25, '100013', 177, 74, '110/80', 'demam', 'suntik', 'tifes', '-', '-', '-', '2023-03-19', '-'),
(19, 13, 25, '100013', 168, 66, '110/80', 'demam', 'Suntik', 'Tifes', '-', '-', '-', '2023-03-26', '-'),
(20, 12, 25, '100012', 173, 70, '110/90', 'sesak nafas', 'suntik', 'ispa', '-', 'jangan begadang', '-', '2023-05-07', '-'),
(21, 19, 32, '100019', 177, 88, '110/30', 'sakit kepala', '', '', '', '', '', '2023-05-10', 'alergi amoxcilin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat_transaksi`
--

CREATE TABLE `tbl_riwayat_transaksi` (
  `id_riwayat` int(255) NOT NULL,
  `pasien` int(255) NOT NULL,
  `layanan` int(255) NOT NULL,
  `kasir` int(255) DEFAULT NULL,
  `biaya_lainya` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `total_bayar` varchar(255) NOT NULL,
  `kembalian` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `status` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_riwayat_transaksi`
--

INSERT INTO `tbl_riwayat_transaksi` (`id_riwayat`, `pasien`, `layanan`, `kasir`, `biaya_lainya`, `total_harga`, `total_bayar`, `kembalian`, `keterangan`, `waktu`, `status`) VALUES
(42, 13, 1, 30, '0', '50000', '0', '', 'alergi obat cair', '2023-03-10', '2'),
(43, 13, 4, 30, '0', '30000', '500000', '470000', '-', '2023-03-10', ''),
(44, 12, 1, 30, '0', '50000', '50000', '0', '-', '2023-03-12', '2'),
(45, 13, 1, 30, '0', '50000', '50000', '0', '-', '2023-03-19', '2'),
(46, 13, 1, 30, '0', '50000', '0100000', '50000', '-', '2023-03-19', '2'),
(47, 13, 1, 30, '0', '50000', '100000', '50000', '-', '2023-03-26', '2'),
(48, 18, 3, 30, '0', '35000', '050000', '15000', '-', '2022-07-13', ''),
(49, 17, 3, 30, '0', '35000', '050000', '15000', '-', '2022-07-13', ''),
(50, 16, 3, 30, '0', '35000', '050000', '15000', '-', '2022-07-13', ''),
(51, 15, 3, 30, '0', '35000', '050000', '15000', '-', '2022-07-13', ''),
(52, 14, 3, 30, '0', '35000', '050000', '15000', '-', '2022-07-13', ''),
(53, 18, 2, 30, '', '65000', '', '', 'Negatif', '2023-05-05', ''),
(54, 12, 1, 30, '020000', '70000', '0100000', '30000', 'tambah obat ', '2023-05-07', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sunat`
--

CREATE TABLE `tbl_sunat` (
  `id_sunat` int(255) NOT NULL,
  `pasien` int(255) NOT NULL,
  `dokter` int(255) NOT NULL,
  `jenis_sunat` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(255) NOT NULL,
  `level` varchar(255) NOT NULL COMMENT 'super admin/administrator/apoteker',
  `role1` varchar(255) NOT NULL,
  `role2` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `level`, `role1`, `role2`, `nama_user`, `status`, `foto`, `username`, `password`) VALUES
(25, 'Dokter', '', '', 'Dokter Yanti', 'on', '1672075711_eb41d5bee44fd34541d8.png', 'dokter1', '$2y$10$5yQOEE1bgg1DXlY9Og1uEOzi2sJJsY/pfPs2d0re5Iu8eAB7K5Doy'),
(27, 'Web Master', '', '', 'Dokter Yanti', 'on', '1672075711_eb41d5bee44fd34541d8.png', 'admin', '$2y$10$40J9Btlg6V9623cgcRSB0OIAC2VC4THP2CM.xH5sPKq5snIn1jMla'),
(30, 'Administrator', 'Dokter', 'Apoteker', 'Indah Mardyh Ayu', 'on', 'avatar2.png', 'administrator1', '$2y$10$r13jWHt2.dXzLn5Dp63qQeyOUe7BUrpZbuEuy/xa4ImqWMDcJPbLG'),
(32, 'Dokter', '', '', 'Dokter eka', 'on', '1674446610_f3825a4b09e7d1f2e3af.png', 'dokter2', '$2y$10$oGgJlKeVPJt8b8kfzJIjC.Hr12LMS.cjxiSR7IZctYivttDXz5Go2'),
(33, 'Dokter', '', '', 'Dokter Eni ', 'on', '1674446657_e17db7891a45a955e3ff.png', 'dokter3', '$2y$10$UlUdS03AerNsAekrwife6.UxzY1CuDKhxrgwrc.yQ8bloAY1MuKNS'),
(34, 'Apoteker', '', '', 'maya', 'on', '1675097064_0190a54afd5e15141c0b.png', 'apoteker1', '$2y$10$Ynkh8Pyo9oM3w2U/ZqwoduB91nxY8oMHoJgBewdRQL40LYaRjdBTq'),
(35, 'Dokter', '', '', 'Dokter Neva', 'on', '1675267047_cc6af907f87a6aecc79a.png', 'dokter4', '$2y$10$/DHsQZjqizzmDGNyC9TD/eqOiaoyLbK2.ErzjeETA9soqcO8.ZOeu'),
(36, 'Dokter', '', '', 'Dokter Oka', 'on', '1675267094_dc365623eef13e0b039f.png', 'dokter5', '$2y$10$ksvjxM02oj/dNvGz4ir5xObFGkW1r4ZWTEYHk0tYuCGEtLIb89Roe'),
(37, 'Administrator', 'Dokter', 'Apoteker', 'Tami', 'on', '1675267227_87fe9fcddaada5fa2b8b.png', 'administrator2', '$2y$10$LTjEktg8.7zQTWpAv0k1IuMAyRXYIa/3KmPalsazseWQrselK8Epe'),
(38, 'Administrator', 'Dokter', 'Apoteker', 'Raden', 'on', '1675267267_2b29945796302537b089.png', 'administrator3', '$2y$10$.cJkbI/H83eCRQywMUaMXuZ2V3m556h0zVpms0u720O3LO3MssgsW'),
(39, 'Administrator', 'Dokter', 'Apoteker', 'Ifa', 'on', '1675267326_33c9a0c67b83ffea4d91.png', 'administrator4', '$2y$10$beCkUOBvITXVHFumY3mnBeyGFyxdma3Y7Xu/7.qUfcgVHRybSh8sW'),
(40, 'Administrator', 'Dokter', 'Apoteker', 'Bunga', 'on', '1675267373_2093cc9399a9530b23da.png', 'administrator5', '$2y$10$jNSek/JDrzBxF/AYXKROX.4T8pOabtrenl/fHZ8xlwsJmj8qwNkcq'),
(41, 'Administrator', 'Dokter', 'Apoteker', 'Dita', 'on', '1675267415_d45b2ac8cfef5dfec085.png', 'administrator6', '$2y$10$m6Y24WHTx357UCUabOnSn.6yM5060R/FdgOw8jgSMlLXzJ.c5n522');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vitamin`
--

CREATE TABLE `tbl_vitamin` (
  `id_vitamin` int(255) NOT NULL,
  `dokter` int(255) NOT NULL,
  `nama_vitamin` varchar(255) NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `pasien` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_resep`
--

CREATE TABLE `tb_resep` (
  `id_resep` int(255) NOT NULL,
  `transaksi` int(255) NOT NULL,
  `obat` int(255) NOT NULL,
  `resep` varchar(30) NOT NULL,
  `jumlah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_resep`
--

INSERT INTO `tb_resep` (`id_resep`, `transaksi`, `obat`, `resep`, `jumlah`) VALUES
(30, 47, 8, '3x1 sesudah makan', '10'),
(31, 54, 38, '3x1 sm', '10'),
(32, 54, 20, '2x1 sm', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_antigen`
--
ALTER TABLE `tbl_antigen`
  ADD PRIMARY KEY (`id_antigen`),
  ADD KEY `dokter` (`dokter`),
  ADD KEY `pasien` (`pasien`);

--
-- Indexes for table `tbl_asamurat`
--
ALTER TABLE `tbl_asamurat`
  ADD PRIMARY KEY (`id_asamurat`),
  ADD KEY `pasien` (`pasien`),
  ADD KEY `dokter` (`dokter`);

--
-- Indexes for table `tbl_izin_sakit`
--
ALTER TABLE `tbl_izin_sakit`
  ADD PRIMARY KEY (`id_izin_sakit`),
  ADD KEY `pasien` (`pasien`),
  ADD KEY `dokter` (`dokter`);

--
-- Indexes for table `tbl_jahit`
--
ALTER TABLE `tbl_jahit`
  ADD PRIMARY KEY (`id_jahit`),
  ADD KEY `pasien` (`pasien`),
  ADD KEY `dokter` (`dokter`);

--
-- Indexes for table `tbl_kb`
--
ALTER TABLE `tbl_kb`
  ADD PRIMARY KEY (`id_kb`),
  ADD KEY `pasien` (`pasien`),
  ADD KEY `dokter` (`dokter`);

--
-- Indexes for table `tbl_kir`
--
ALTER TABLE `tbl_kir`
  ADD PRIMARY KEY (`id_kir`),
  ADD KEY `pasien` (`pasien`),
  ADD KEY `dokter` (`dokter`);

--
-- Indexes for table `tbl_kolestrol`
--
ALTER TABLE `tbl_kolestrol`
  ADD PRIMARY KEY (`id_kolestrol`),
  ADD KEY `pasien` (`pasien`),
  ADD KEY `dokter` (`dokter`);

--
-- Indexes for table `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tbl_obat_keluar`
--
ALTER TABLE `tbl_obat_keluar`
  ADD PRIMARY KEY (`id_obat_keluar`),
  ADD KEY `obat` (`obat`);

--
-- Indexes for table `tbl_obat_masuk`
--
ALTER TABLE `tbl_obat_masuk`
  ADD PRIMARY KEY (`id_obat_masuk`);

--
-- Indexes for table `tbl_operasi`
--
ALTER TABLE `tbl_operasi`
  ADD PRIMARY KEY (`id_operasi`),
  ADD KEY `pasien` (`pasien`),
  ADD KEY `dokter` (`dokter`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tbl_rekam_medis`
--
ALTER TABLE `tbl_rekam_medis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `pasien` (`pasien`),
  ADD KEY `dokter` (`dokter`);

--
-- Indexes for table `tbl_riwayat_transaksi`
--
ALTER TABLE `tbl_riwayat_transaksi`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `layanan` (`layanan`),
  ADD KEY `kasir` (`kasir`),
  ADD KEY `pasien` (`pasien`);

--
-- Indexes for table `tbl_sunat`
--
ALTER TABLE `tbl_sunat`
  ADD PRIMARY KEY (`id_sunat`),
  ADD KEY `pasien` (`pasien`),
  ADD KEY `dokter` (`dokter`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_vitamin`
--
ALTER TABLE `tbl_vitamin`
  ADD PRIMARY KEY (`id_vitamin`),
  ADD KEY `pasien` (`pasien`),
  ADD KEY `dokter` (`dokter`);

--
-- Indexes for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `rm` (`transaksi`),
  ADD KEY `obat` (`obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_antigen`
--
ALTER TABLE `tbl_antigen`
  MODIFY `id_antigen` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_asamurat`
--
ALTER TABLE `tbl_asamurat`
  MODIFY `id_asamurat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_izin_sakit`
--
ALTER TABLE `tbl_izin_sakit`
  MODIFY `id_izin_sakit` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_jahit`
--
ALTER TABLE `tbl_jahit`
  MODIFY `id_jahit` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kb`
--
ALTER TABLE `tbl_kb`
  MODIFY `id_kb` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_kir`
--
ALTER TABLE `tbl_kir`
  MODIFY `id_kir` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kolestrol`
--
ALTER TABLE `tbl_kolestrol`
  MODIFY `id_kolestrol` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  MODIFY `id_layanan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `id_obat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_obat_keluar`
--
ALTER TABLE `tbl_obat_keluar`
  MODIFY `id_obat_keluar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_obat_masuk`
--
ALTER TABLE `tbl_obat_masuk`
  MODIFY `id_obat_masuk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_operasi`
--
ALTER TABLE `tbl_operasi`
  MODIFY `id_operasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_rekam_medis`
--
ALTER TABLE `tbl_rekam_medis`
  MODIFY `id_rm` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_riwayat_transaksi`
--
ALTER TABLE `tbl_riwayat_transaksi`
  MODIFY `id_riwayat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_sunat`
--
ALTER TABLE `tbl_sunat`
  MODIFY `id_sunat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_vitamin`
--
ALTER TABLE `tbl_vitamin`
  MODIFY `id_vitamin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_resep`
--
ALTER TABLE `tb_resep`
  MODIFY `id_resep` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_antigen`
--
ALTER TABLE `tbl_antigen`
  ADD CONSTRAINT `tbl_antigen_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_antigen_ibfk_2` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_asamurat`
--
ALTER TABLE `tbl_asamurat`
  ADD CONSTRAINT `tbl_asamurat_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_asamurat_ibfk_2` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_izin_sakit`
--
ALTER TABLE `tbl_izin_sakit`
  ADD CONSTRAINT `tbl_izin_sakit_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_izin_sakit_ibfk_2` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jahit`
--
ALTER TABLE `tbl_jahit`
  ADD CONSTRAINT `tbl_jahit_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_jahit_ibfk_2` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kb`
--
ALTER TABLE `tbl_kb`
  ADD CONSTRAINT `tbl_kb_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kb_ibfk_2` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kir`
--
ALTER TABLE `tbl_kir`
  ADD CONSTRAINT `tbl_kir_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kir_ibfk_2` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kolestrol`
--
ALTER TABLE `tbl_kolestrol`
  ADD CONSTRAINT `tbl_kolestrol_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_kolestrol_ibfk_2` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_operasi`
--
ALTER TABLE `tbl_operasi`
  ADD CONSTRAINT `tbl_operasi_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_operasi_ibfk_2` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rekam_medis`
--
ALTER TABLE `tbl_rekam_medis`
  ADD CONSTRAINT `tbl_rekam_medis_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_rekam_medis_ibfk_2` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_riwayat_transaksi`
--
ALTER TABLE `tbl_riwayat_transaksi`
  ADD CONSTRAINT `tbl_riwayat_transaksi_ibfk_1` FOREIGN KEY (`layanan`) REFERENCES `tbl_layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_riwayat_transaksi_ibfk_2` FOREIGN KEY (`kasir`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_riwayat_transaksi_ibfk_3` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sunat`
--
ALTER TABLE `tbl_sunat`
  ADD CONSTRAINT `tbl_sunat_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sunat_ibfk_2` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_vitamin`
--
ALTER TABLE `tbl_vitamin`
  ADD CONSTRAINT `tbl_vitamin_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_vitamin_ibfk_2` FOREIGN KEY (`pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD CONSTRAINT `tb_resep_ibfk_1` FOREIGN KEY (`transaksi`) REFERENCES `tbl_riwayat_transaksi` (`id_riwayat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_resep_ibfk_2` FOREIGN KEY (`obat`) REFERENCES `tbl_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
