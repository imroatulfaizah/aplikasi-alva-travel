-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 13, 2021 at 08:54 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alvatravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `kd_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(35) DEFAULT NULL,
  `username_admin` varchar(30) DEFAULT NULL,
  `password_admin` varchar(256) DEFAULT NULL,
  `img_admin` varchar(35) DEFAULT NULL,
  `email_admin` varchar(35) DEFAULT NULL,
  `level_admin` varchar(12) DEFAULT NULL,
  `status_admin` int(1) DEFAULT NULL,
  `date_create_admin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama_admin`, `username_admin`, `password_admin`, `img_admin`, `email_admin`, `level_admin`, `status_admin`, `date_create_admin`) VALUES
('ADM0001', 'Direktur Alva Travel', 'direktur', '$2y$10$SP7XNH3lyq.iZ4dSND/LwuxJJvNII6sgxgyGyO.2b7Q.6jgdd7lDC', 'assets/backend/img/default.png', 'direktur@gmail.com', '1', 1, '1552819095'),
('ADM0002', 'Operator', 'operator', '$2y$10$SP7XNH3lyq.iZ4dSND/LwuxJJvNII6sgxgyGyO.2b7Q.6jgdd7lDC', 'assets/backend/img/default.png', 'operator@gmail.com', '2', 1, '1552276812');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agen`
--

DROP TABLE IF EXISTS `tbl_agen`;
CREATE TABLE IF NOT EXISTS `tbl_agen` (
  `kd_agen` varchar(50) NOT NULL,
  `nama_agen` varchar(150) NOT NULL,
  `alamat_agen` varchar(200) NOT NULL,
  `hp_agen` varchar(50) NOT NULL,
  `status_agen` int(1) NOT NULL,
  PRIMARY KEY (`kd_agen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agen`
--

INSERT INTO `tbl_agen` (`kd_agen`, `nama_agen`, `alamat_agen`, `hp_agen`, `status_agen`) VALUES
('AG001', 'Ahmad Saifuddin', 'Jl. Simpang Jogja No. 48', '085735626777', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agens`
--

DROP TABLE IF EXISTS `tbl_agens`;
CREATE TABLE IF NOT EXISTS `tbl_agens` (
  `kd_agen` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username_agen` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password_agen` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `no_ktp_agen` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_agen` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat_agen` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email_agen` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `hp_agen` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `img_agen` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status_agen` int(1) DEFAULT NULL,
  `date_create_agen` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`kd_agen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_agens`
--

INSERT INTO `tbl_agens` (`kd_agen`, `username_agen`, `password_agen`, `no_ktp_agen`, `nama_agen`, `alamat_agen`, `email_agen`, `hp_agen`, `img_agen`, `status_agen`, `date_create_agen`) VALUES
('AG001', 'agen01', '$2y$10$dVZ8spZkicGE6N9aSZdZpe7u6SvZlYcMlr4z4riDmUVsJo7v1lH7m', '350708999009922', 'Ahmad Saifuddin', 'Jl. Simpang Jogja No. 48', 'devi@gmail.com', '085735626777', 'assets/frontend/img/default.png', 1, '1622368947'),
('AG002', 'testes', '$2y$10$fKavpZMDn.0t2eiDVSssEuBEZbQY6zXNOfVqMNGWdbQAqODdmxzVy', '350708999009910', 'tes', 'tes', 'tes@gmail.com', '085777666555', 'assets/frontend/img/default.png', 1, '1626181704');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

DROP TABLE IF EXISTS `tbl_bank`;
CREATE TABLE IF NOT EXISTS `tbl_bank` (
  `kd_bank` varchar(50) NOT NULL,
  `nasabah_bank` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `nomrek_bank` varchar(50) DEFAULT NULL,
  `photo_bank` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`kd_bank`, `nasabah_bank`, `nama_bank`, `nomrek_bank`, `photo_bank`) VALUES
('BNK0001', 'Alva Travel', 'BCA', '54902520644', 'assets/frontend/img/bank/bca-icon.jpg'),
('BNK0002', 'Alva Travel', 'MANDIRI', '6666666666', 'assets/frontend/img/bank/mandiri-icon.jpg'),
('BNK0003', 'Alva Travel', 'BRI', '7777777777', 'assets/frontend/img/bank/bri-icon.jpg'),
('BNK0004', 'Alva Travel', 'BNI', '8888888888', 'assets/frontend/img/bank/bni-icon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus`
--

DROP TABLE IF EXISTS `tbl_bus`;
CREATE TABLE IF NOT EXISTS `tbl_bus` (
  `kd_bus` varchar(50) NOT NULL,
  `nama_bus` varchar(50) DEFAULT NULL,
  `plat_bus` varchar(50) DEFAULT NULL,
  `kapasitas_bus` int(13) DEFAULT NULL,
  `status_bus` int(1) DEFAULT NULL,
  `desc_bus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_bus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bus`
--

INSERT INTO `tbl_bus` (`kd_bus`, `nama_bus`, `plat_bus`, `kapasitas_bus`, `status_bus`, `desc_bus`) VALUES
('B001', 'Elf 1', 'N 1265 FF', 10, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

DROP TABLE IF EXISTS `tbl_driver`;
CREATE TABLE IF NOT EXISTS `tbl_driver` (
  `kd_driver` varchar(50) NOT NULL,
  `nama_driver` varchar(150) NOT NULL,
  `alamat_driver` varchar(200) NOT NULL,
  `hp_driver` varchar(50) NOT NULL,
  `status_driver` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_driver`
--

INSERT INTO `tbl_driver` (`kd_driver`, `nama_driver`, `alamat_driver`, `hp_driver`, `status_driver`) VALUES
('D001', 'tes', 'tes', 'tes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

DROP TABLE IF EXISTS `tbl_jadwal`;
CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
  `kd_jadwal` varchar(50) NOT NULL,
  `kd_bus` varchar(50) DEFAULT NULL,
  `kd_tujuan` varchar(50) DEFAULT NULL,
  `kd_asal` varchar(50) DEFAULT NULL,
  `wilayah_jadwal` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_berangkat_jadwal` time DEFAULT NULL,
  `jam_tiba_jadwal` time DEFAULT NULL,
  `harga_jadwal` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_jadwal`),
  KEY `kd_bus` (`kd_bus`),
  KEY `kd_tujuan` (`kd_tujuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`kd_jadwal`, `kd_bus`, `kd_tujuan`, `kd_asal`, `wilayah_jadwal`, `tanggal`, `jam_berangkat_jadwal`, `jam_tiba_jadwal`, `harga_jadwal`) VALUES
('J0001', 'B001', 'TJ001', 'TJ002', 'Jogja', '2021-07-28', '18:56:00', '18:56:00', '130000'),
('J0002', 'B001', 'TJ001', 'TJ002', 'Jogja', '2021-07-06', '07:01:00', '01:01:00', '200000'),
('J0003', 'B001', 'TJ001', 'TJ002', 'Jogja', '2021-07-03', '01:06:00', '20:07:00', '200000'),
('J0004', 'B001', 'TJ001', 'TJ002', 'Jogja', '2021-06-30', '01:08:00', '17:08:00', '200000'),
('J0005', 'B001', 'TJ001', 'TJ002', 'Jogja', '2021-07-18', '13:58:00', '20:58:00', '200000'),
('J0006', 'B001', 'TJ001', 'TJ002', 'Jogja', '2021-10-13', '11:51:00', '15:51:00', '200000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

DROP TABLE IF EXISTS `tbl_konfirmasi`;
CREATE TABLE IF NOT EXISTS `tbl_konfirmasi` (
  `kd_konfirmasi` varchar(50) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `nama_konfirmasi` varchar(50) DEFAULT NULL,
  `nama_bank_konfirmasi` varchar(50) DEFAULT NULL,
  `norek_konfirmasi` varchar(50) DEFAULT NULL,
  `total_konfirmasi` varchar(50) DEFAULT NULL,
  `photo_konfirmasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_konfirmasi`),
  KEY `kode_order` (`kd_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`kd_konfirmasi`, `kd_order`, `nama_konfirmasi`, `nama_bank_konfirmasi`, `norek_konfirmasi`, `total_konfirmasi`, `photo_konfirmasi`) VALUES
('KF0001', 'ORD00001', 'Devi Kharisma', 'BCA', '123', '130000', '/assets/frontend/upload/payment/bingkai_(2).png'),
('KF0002', 'ORD00004', 'Ahmad', 'Mandiri', '432432432', '260000', '/assets/frontend/upload/payment/start2.jpg'),
('KF0003', 'ORD00005', 'test', 'BCA', '322423', '200000', '/assets/frontend/upload/payment/start21.jpg'),
('KF0004', 'ORD00005', '', 'Lunas Agen', '', '200000', '/assets/frontend/upload/payment/start22.jpg'),
('KF0005', 'ORD00006', '', 'Lunas Agen', '', '130000', '/assets/frontend/upload/payment/start23.jpg'),
('KF0006', 'ORD00007', '', 'Lunas Agen', '', '130000', '/assets/frontend/upload/payment/start24.jpg'),
('KF0007', 'ORD00007', '', 'Lunas Agen', '', '130000', '/assets/frontend/upload/payment/start25.jpg'),
('KF0008', 'ORD00007', '', 'Lunas Agen', '', '130000', '/assets/frontend/upload/payment/start26.jpg'),
('KF0009', 'ORD00007', '', 'Lunas Agen', '', '130000', '/assets/frontend/upload/payment/start27.jpg'),
('KF0010', 'ORD00007', '', 'Lunas Agen', '', '130000', '/assets/frontend/upload/payment/start28.jpg'),
('KF0011', 'ORD00007', '', 'Lunas Agen', '', '130000', '/assets/frontend/upload/payment/start29.jpg'),
('KF0012', 'ORD00010', '', 'Lunas Agen', '', '130000', '/assets/frontend/upload/payment/5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

DROP TABLE IF EXISTS `tbl_level`;
CREATE TABLE IF NOT EXISTS `tbl_level` (
  `kd_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`kd_level`, `nama_level`) VALUES
(1, 'Direktur'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `kd_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`kd_menu`, `nama_menu`) VALUES
(1, 'Direktur'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `kd_order` varchar(50) DEFAULT NULL,
  `kd_tiket` varchar(50) DEFAULT NULL,
  `kd_jadwal` varchar(50) DEFAULT NULL,
  `kd_pelanggan` varchar(50) DEFAULT NULL,
  `kd_bank` varchar(50) DEFAULT NULL,
  `kd_agen` varchar(15) NOT NULL,
  `asal_order` varchar(200) DEFAULT NULL,
  `nama_order` varchar(50) DEFAULT NULL,
  `tgl_beli_order` varchar(50) DEFAULT NULL,
  `tgl_berangkat_order` varchar(50) DEFAULT NULL,
  `nama_kursi_order` varchar(50) DEFAULT NULL,
  `umur_kursi_order` varchar(50) DEFAULT NULL,
  `no_kursi_order` varchar(50) DEFAULT NULL,
  `no_ktp_order` varchar(50) DEFAULT NULL,
  `no_tlpn_order` varchar(50) DEFAULT NULL,
  `alamat_order` varchar(100) DEFAULT NULL,
  `email_order` varchar(100) DEFAULT NULL,
  `expired_order` varchar(50) DEFAULT NULL,
  `qrcode_order` varchar(100) DEFAULT NULL,
  `status_order` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `kd_jadwal` (`kd_jadwal`),
  KEY `kd_kustomer` (`kd_pelanggan`),
  KEY `kd_tiket` (`kd_tiket`),
  KEY `kd_bank` (`kd_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `kd_order`, `kd_tiket`, `kd_jadwal`, `kd_pelanggan`, `kd_bank`, `kd_agen`, `asal_order`, `nama_order`, `tgl_beli_order`, `tgl_berangkat_order`, `nama_kursi_order`, `umur_kursi_order`, `no_kursi_order`, `no_ktp_order`, `no_tlpn_order`, `alamat_order`, `email_order`, `expired_order`, `qrcode_order`, `status_order`) VALUES
(7, 'ORD00005', 'T0005202106281', 'J0002', 'PL0001', 'Lunas Agen', '', 'TJ002', 'Devi Kharisma', 'Senin, 28 Juni 2021, 23:47', '2021-06-28', 'Devi A', '86', '1', '350708999009922', '085755733888', 'Jl Sumbersari Malang', 'devi@gmail.com', '29-06-2021 23:47:27', 'assets/frontend/upload/qrcode/ORD00005.png', '2'),
(8, 'ORD00006', 'T0006202106291', 'J0001', 'PL0001', 'Bayar Driver', '', 'TJ002', 'Devi Kharisma', 'Selasa, 29 Juni 2021, 00:29', '2021-06-29', 'Devi Kharisma', '25', '1', '350708999009922', '085755733888', 'Jl Sumbersari Malang', 'devi@gmail.com', '30-06-2021 00:29:59', 'assets/frontend/upload/qrcode/ORD00006.png', '1'),
(9, 'ORD00007', 'T0007202106293', 'J0001', 'PL0001', 'Lunas Agen', 'AG001', 'TJ002', 'Devi Kharisma', 'Selasa, 29 Juni 2021, 00:42', '2021-06-29', 'Devi A', '86', '3', '350708999009922', '085755733888', 'Jl Sumbersari Malang', 'devi@gmail.com', '30-06-2021 00:42:18', 'assets/frontend/upload/qrcode/ORD00007.png', '1'),
(10, 'ORD00008', 'T0008202107021', 'J0001', 'PL0001', 'Transfer', '', 'TJ002', 'Devi Kharisma', 'Jumat, 02 Juli 2021, 00:12', '2021-07-02', 'Devi Kharisma', '21', '1', '350708999009922', '085755733888', 'Jl Sumbersari Malang', 'devi@gmail.com', '03-07-2021 00:12:40', 'assets/frontend/upload/qrcode/ORD00008.png', '1'),
(11, 'ORD00009', 'T0009202107031', 'J0001', 'PL0001', 'Lunas Agen', '', 'TJ002', 'Devi Kharisma', 'Sabtu, 03 Juli 2021, 13:42', '2021-07-03', 'A', '89', '1', '350708999009922', '085755733888', 'Jl Sumbersari Malang', 'devi@gmail.com', '04-07-2021 13:42:52', 'assets/frontend/upload/qrcode/ORD00009.png', '1'),
(12, 'ORD00009', 'T0009202107032', 'J0001', 'PL0001', 'Lunas Agen', '', 'TJ002', 'Devi Kharisma', 'Sabtu, 03 Juli 2021, 13:42', '2021-07-03', 'B', '87', '2', '350708999009922', '085755733888', 'Jl Sumbersari Malang', 'devi@gmail.com', '04-07-2021 13:42:52', 'assets/frontend/upload/qrcode/ORD00009.png', '1'),
(13, 'ORD00009', 'T0009202107033', 'J0001', 'PL0001', 'Lunas Agen', '', 'TJ002', 'Devi Kharisma', 'Sabtu, 03 Juli 2021, 13:42', '2021-07-03', 'C', '87', '3', '350708999009922', '085755733888', 'Jl Sumbersari Malang', 'devi@gmail.com', '04-07-2021 13:42:52', 'assets/frontend/upload/qrcode/ORD00009.png', '1'),
(14, 'ORD00009', 'T0009202107034', 'J0001', 'PL0001', 'Lunas Agen', '', 'TJ002', 'Devi Kharisma', 'Sabtu, 03 Juli 2021, 13:42', '2021-07-03', 'D', '87', '4', '350708999009922', '085755733888', 'Jl Sumbersari Malang', 'devi@gmail.com', '04-07-2021 13:42:52', 'assets/frontend/upload/qrcode/ORD00009.png', '1'),
(15, 'ORD00010', 'T0010202107035', 'J0001', 'PL0001', 'Transfer', 'AG001', 'TJ002', 'Devi Kharisma', 'Sabtu, 03 Juli 2021, 17:33', '2021-07-03', 'Devi Kharisma', '90', '5', '350708999009922', '085755733888', 'Jl Sumbersari Malang', 'devi@gmail.com', '04-07-2021 17:33:17', 'assets/frontend/upload/qrcode/ORD00010.png', '1'),
(16, 'ORD00011', 'T0011202107181', 'J0005', 'PL0001', 'Lunas Agen', '', 'TJ002', 'Devi Kharisma', 'Selasa, 13 Juli 2021, 14:15', '2021-07-18', 'Devi Kharisma', '89', '1', '350708999009922', '085755733888', 'Jl Sumbersari Malang', 'devi@gmail.com', '14-07-2021 14:15:30', 'assets/frontend/upload/qrcode/ORD00011.png', '1'),
(17, 'ORD00012', 'T0012202107182', 'J0005', NULL, 'Lunas Agen', '', 'TJ002', 'Ahmad Saifuddin', 'Selasa, 13 Juli 2021, 21:49', '2021-07-18', 'Devi Kharisma', '89', '2', '350708999009922', '085777666555', 'Jl. Simpang Jogja No. 48', 'devi@gmail.com', '14-07-2021 21:49:23', 'assets/frontend/upload/qrcode/ORD00012.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

DROP TABLE IF EXISTS `tbl_pelanggan`;
CREATE TABLE IF NOT EXISTS `tbl_pelanggan` (
  `kd_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `no_ktp_pelanggan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_pelanggan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email_pelanggan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telpon_pelanggan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `img_pelanggan` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status_pelanggan` int(1) DEFAULT NULL,
  `date_create_pelanggan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`kd_pelanggan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`kd_pelanggan`, `username_pelanggan`, `password_pelanggan`, `no_ktp_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `email_pelanggan`, `telpon_pelanggan`, `img_pelanggan`, `status_pelanggan`, `date_create_pelanggan`) VALUES
('PL0001', 'devidevi', '$2y$10$dVZ8spZkicGE6N9aSZdZpe7u6SvZlYcMlr4z4riDmUVsJo7v1lH7m', '350708999009922', 'Devi Kharisma', 'Jl Sumbersari Malang', 'devi@gmail.com', '085755733888', 'assets/frontend/img/default.png', 1, '1622368947');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tiket`
--

DROP TABLE IF EXISTS `tbl_tiket`;
CREATE TABLE IF NOT EXISTS `tbl_tiket` (
  `kd_tiket` varchar(50) NOT NULL,
  `kd_order` varchar(50) DEFAULT NULL,
  `nama_tiket` varchar(50) DEFAULT NULL,
  `kursi_tiket` varchar(50) DEFAULT NULL,
  `umur_tiket` varchar(50) DEFAULT NULL,
  `asal_beli_tiket` varchar(50) DEFAULT NULL,
  `harga_tiket` varchar(50) NOT NULL,
  `etiket_tiket` varchar(100) DEFAULT NULL,
  `status_tiket` varchar(50) NOT NULL,
  `create_tgl_tiket` date DEFAULT NULL,
  `create_admin_tiket` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_tiket`),
  KEY `kode_order` (`kd_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tiket`
--

INSERT INTO `tbl_tiket` (`kd_tiket`, `kd_order`, `nama_tiket`, `kursi_tiket`, `umur_tiket`, `asal_beli_tiket`, `harga_tiket`, `etiket_tiket`, `status_tiket`, `create_tgl_tiket`, `create_admin_tiket`) VALUES
('T0001202106147', 'ORD00001', 'Devi Karisma', '7', '21 Tahun', 'TJ002', '130000', 'assets/backend/upload/etiket/ORD00001.pdf', '2', '2021-06-14', 'direktur'),
('T0002202106143', 'ORD00002', 'Devi A', '3', '88 Tahun', 'TJ002', '130000', 'assets/backend/upload/etiket/ORD00002.pdf', '2', '2021-06-28', 'operator'),
('T0002202106146', 'ORD00002', 'Devi B', '6', '87 Tahun', 'TJ002', '130000', 'assets/backend/upload/etiket/ORD00002.pdf', '2', '2021-06-28', 'operator'),
('T0004202106281', 'ORD00004', 'Devi Kharisma', '1', '89 Tahun', 'TJ002', '130000', 'assets/backend/upload/etiket/ORD00004.pdf', '2', '2021-06-28', 'operator'),
('T0004202106283', 'ORD00004', 'Ahmad', '3', '87 Tahun', 'TJ002', '130000', 'assets/backend/upload/etiket/ORD00004.pdf', '2', '2021-06-28', 'operator'),
('T0005202106281', 'ORD00005', 'Devi A', '1', '86 Tahun', 'TJ002', '200000', 'assets/backend/upload/etiket/ORD00005.pdf', '2', '2021-07-03', 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tujuan`
--

DROP TABLE IF EXISTS `tbl_tujuan`;
CREATE TABLE IF NOT EXISTS `tbl_tujuan` (
  `kd_tujuan` varchar(50) NOT NULL,
  `kota_tujuan` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_tujuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tujuan`
--

INSERT INTO `tbl_tujuan` (`kd_tujuan`, `kota_tujuan`) VALUES
('TJ001', 'Jogja'),
('TJ002', 'Malang');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
