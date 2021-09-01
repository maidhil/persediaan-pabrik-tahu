-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 08:26 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pabrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `is_analisa_eoq`
--

CREATE TABLE `is_analisa_eoq` (
  `kode_eoq` varchar(10) NOT NULL,
  `tanggal_analisa` date NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `kebutuhan` int(11) NOT NULL,
  `biaya_penyimpanan` float NOT NULL,
  `biaya_pesan` varchar(11) NOT NULL,
  `jumlah_pesan_ekonomis` int(50) NOT NULL,
  `created_user` int(5) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_analisa_eoq`
--

INSERT INTO `is_analisa_eoq` (`kode_eoq`, `tanggal_analisa`, `kode_barang`, `kebutuhan`, `biaya_penyimpanan`, `biaya_pesan`, `jumlah_pesan_ekonomis`, `created_user`, `created_date`) VALUES
('EOQ00001', '2021-06-06', 'B00002', 2000, 5000, '20000', 16, 1, '2021-06-06 14:48:50'),
('EOQ00002', '2021-06-06', 'B00001', 3600, 90000, '6000000', 139, 1, '2021-06-06 14:50:55'),
('EOQ00003', '2021-06-06', 'B00003', 24, 1500, '20000', 3, 1, '2021-06-06 14:52:59'),
('EOQ00004', '2021-06-06', 'B00004', 240, 2000, '50000', 18, 1, '2021-06-06 15:09:31'),
('EOQ00005', '2021-06-06', 'B00005', 240, 1000, '30000', 12, 1, '2021-06-06 15:44:04'),
('EOQ00006', '2021-06-06', 'B00006', 240, 2000, '50000', 18, 1, '2021-06-06 15:59:33'),
('EOQ00007', '2021-06-06', 'B00007', 1000, 6000, '40000', 58, 1, '2021-06-06 16:02:40'),
('EOQ00008', '2021-06-06', 'B00008', 2000, 20000, '50000', 21, 1, '2021-06-06 16:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `is_barang`
--

CREATE TABLE `is_barang` (
  `kode_barang` varchar(7) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_barang`
--

INSERT INTO `is_barang` (`kode_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `satuan`, `stok`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('B00001', 'Kacang Kedelai', 450000, 0, 'Karung', 290, 1, '2021-04-11 16:06:54', 1, '2021-07-04 18:23:23'),
('B00002', 'Asam Cuka', 40000, 0, 'Botol', 40, 1, '2021-04-11 16:07:05', 1, '2021-07-04 18:23:46'),
('B00003', 'Ragi Tempe', 13000, 0, 'Pcs', 6, 1, '2021-04-11 16:07:20', 1, '2021-07-04 18:23:54'),
('B00004', 'Plastik 5000', 12000, 0, 'Kg', 8, 3, '2021-04-18 17:08:42', 3, '2021-07-04 18:24:05'),
('B00005', 'Plastik 2000', 10000, 0, 'Kg', 8, 3, '2021-04-18 17:09:07', 3, '2021-07-04 18:24:10'),
('B00006', 'Plastik Jumbo', 12000, 0, 'Kg', 8, 3, '2021-04-18 17:09:46', 3, '2021-07-04 18:24:20'),
('B00007', 'Minyak Goreng', 12000, 0, 'Liter', 105, 3, '2021-04-18 17:12:19', 3, '2021-07-04 18:24:33'),
('B00008', 'Garam Kasar', 95000, 0, 'Karung', 4, 3, '2021-04-18 17:13:59', 3, '2021-07-04 18:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `is_barang_masuk`
--

CREATE TABLE `is_barang_masuk` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kode_barang` varchar(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_barang_masuk`
--

INSERT INTO `is_barang_masuk` (`kode_transaksi`, `tanggal_masuk`, `kode_barang`, `jumlah_masuk`, `created_user`, `created_date`) VALUES
('BM-2021-00001', '2021-05-30', 'B00001', 300, 1, '2021-05-30 14:58:58'),
('BM-2021-00002', '2021-05-30', 'B00002', 60, 1, '2021-05-30 14:59:24'),
('BM-2021-00003', '2021-05-30', 'B00007', 120, 1, '2021-05-30 15:00:20'),
('BM-2021-00004', '2021-05-30', 'B00008', 5, 1, '2021-05-30 15:00:37'),
('BM-2021-00005', '2021-05-30', 'B00003', 7, 1, '2021-05-30 15:00:48'),
('BM-2021-00006', '2021-05-30', 'B00005', 10, 1, '2021-05-30 15:01:03'),
('BM-2021-00007', '2021-05-30', 'B00004', 10, 1, '2021-05-30 15:01:18'),
('BM-2021-00008', '2021-05-30', 'B00006', 10, 1, '2021-05-30 15:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `is_barang_pakai`
--

CREATE TABLE `is_barang_pakai` (
  `kode_terpakai` varchar(15) NOT NULL,
  `tanggal_pakai` date NOT NULL,
  `kode_barang` varchar(7) NOT NULL,
  `jumlah_pakai` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_barang_pakai`
--

INSERT INTO `is_barang_pakai` (`kode_terpakai`, `tanggal_pakai`, `kode_barang`, `jumlah_pakai`, `created_user`, `created_date`) VALUES
('BT-2021-00001', '2021-07-04', 'B00001', 10, 1, '2021-07-04 18:23:23'),
('BT-2021-00002', '2021-07-04', 'B00002', 20, 1, '2021-07-04 18:23:46'),
('BT-2021-00003', '2021-07-04', 'B00003', 1, 1, '2021-07-04 18:23:53'),
('BT-2021-00004', '2021-07-04', 'B00004', 2, 1, '2021-07-04 18:24:05'),
('BT-2021-00005', '2021-07-04', 'B00005', 2, 1, '2021-07-04 18:24:10'),
('BT-2021-00006', '2021-07-04', 'B00006', 2, 1, '2021-07-04 18:24:19'),
('BT-2021-00007', '2021-07-04', 'B00007', 15, 1, '2021-07-04 18:24:33'),
('BT-2021-00008', '2021-07-04', 'B00008', 1, 1, '2021-07-04 18:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `is_users`
--

CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'maidhil', 'admin', 'Maidhil27.ma@gmail.com', '082375829583', 'user 1.png', 'Super Admin', 'aktif', '2021-01-31 15:41:55', '2021-07-04 17:24:10'),
(2, 'rafi', 'ahmad rapiw', 'rafi', 'rapiw@gmail.com', '085680892909', 'kadina.png', 'Manajer', 'aktif', '2017-04-01 08:15:15', '2021-02-01 15:03:53'),
(3, 'aldo', 'aldo rinaldo', 'aldo', 'aldo@gmail.com', '085758858855', 'user 3.png', 'Gudang', 'aktif', '2017-04-01 08:15:15', '2021-07-04 17:24:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `is_analisa_eoq`
--
ALTER TABLE `is_analisa_eoq`
  ADD PRIMARY KEY (`kode_eoq`);

--
-- Indexes for table `is_barang`
--
ALTER TABLE `is_barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `is_barang_masuk`
--
ALTER TABLE `is_barang_masuk`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_barang` (`kode_barang`),
  ADD KEY `created_user` (`created_user`);

--
-- Indexes for table `is_barang_pakai`
--
ALTER TABLE `is_barang_pakai`
  ADD PRIMARY KEY (`kode_terpakai`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `id_barang` (`kode_barang`);

--
-- Indexes for table `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `is_barang`
--
ALTER TABLE `is_barang`
  ADD CONSTRAINT `is_barang_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_barang_masuk`
--
ALTER TABLE `is_barang_masuk`
  ADD CONSTRAINT `is_barang_masuk_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `is_barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_masuk_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_barang_pakai`
--
ALTER TABLE `is_barang_pakai`
  ADD CONSTRAINT `is_barang_pakai_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_pakai_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `is_barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
