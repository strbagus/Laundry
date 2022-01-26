-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 04:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwpb_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `outlet_id` int(3) NOT NULL,
  `outlet_nama` varchar(35) NOT NULL,
  `outlet_alamat` text DEFAULT NULL,
  `outlet_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`outlet_id`, `outlet_nama`, `outlet_alamat`, `outlet_telp`) VALUES
(1, 'Pusat', 'Bantul', '08999999'),
(2, 'Imogiri', 'Imogiri', '08991111222'),
(3, 'Jetis', 'Jetis', '08992222'),
(6, 'pleret', 'pleret', '081234567');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pakaian`
--

CREATE TABLE `tb_pakaian` (
  `pakaian_id` int(11) NOT NULL,
  `pakaian_jenis` varchar(35) NOT NULL,
  `pakaian_jumlah` int(3) NOT NULL,
  `pakaian_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pakaian`
--

INSERT INTO `tb_pakaian` (`pakaian_id`, `pakaian_jenis`, `pakaian_jumlah`, `pakaian_transaksi`) VALUES
(15, 'kemeja', 8, 2),
(23, 'kaos', 10, 1),
(24, 'celana', 5, 1),
(31, 'jaket', 5, 27),
(33, 'kaos', 2, 29),
(37, 'celana', 5, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `paket_id` int(3) NOT NULL,
  `paket_outlet` int(3) NOT NULL,
  `paket_harga` int(20) NOT NULL,
  `paket_jenis` enum('reguler','kilat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`paket_id`, `paket_outlet`, `paket_harga`, `paket_jenis`) VALUES
(1, 1, 30000, 'reguler'),
(2, 1, 40000, 'kilat'),
(6, 2, 20000, 'reguler');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `pelanggan_nama` varchar(35) NOT NULL,
  `pelanggan_alamat` text DEFAULT NULL,
  `pelanggan_telp` varchar(35) NOT NULL,
  `pelanggan_outlet` int(3) NOT NULL,
  `pelanggan_jenis` enum('reguler','member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_alamat`, `pelanggan_telp`, `pelanggan_outlet`, `pelanggan_jenis`) VALUES
(1, 'dudu', 'bantul', '08112222', 1, 'reguler'),
(2, 'dodo', 'imogiri', '08112222', 2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_outlet` int(3) NOT NULL,
  `transaksi_user` int(11) NOT NULL,
  `transaksi_pelanggan` int(11) NOT NULL,
  `transaksi_paket` int(3) NOT NULL,
  `transaksi_masuk` date NOT NULL,
  `transaksi_selesai` date NOT NULL,
  `transaksi_berat` double NOT NULL,
  `transaksi_harga` int(20) NOT NULL,
  `transaksi_bayar` enum('belum','lunas') NOT NULL,
  `transaksi_status` enum('proses','selesai','diambil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_id`, `transaksi_outlet`, `transaksi_user`, `transaksi_pelanggan`, `transaksi_paket`, `transaksi_masuk`, `transaksi_selesai`, `transaksi_berat`, `transaksi_harga`, `transaksi_bayar`, `transaksi_status`) VALUES
(1, 3, 1, 1, 1, '2021-12-01', '2021-12-06', 2.1, 63000, 'belum', 'selesai'),
(2, 3, 2, 2, 2, '2021-12-01', '2021-12-04', 1.7, 68000, 'belum', 'selesai'),
(27, 2, 1, 1, 1, '2021-12-30', '2022-01-05', 2, 60000, 'belum', 'proses'),
(29, 2, 1, 1, 2, '2021-12-30', '2022-01-05', 1, 40000, 'belum', 'proses'),
(30, 1, 1, 1, 1, '2021-12-30', '2022-01-05', 2, 60000, 'belum', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(35) NOT NULL,
  `user_password` varchar(35) NOT NULL,
  `user_nama` varchar(35) NOT NULL,
  `user_level` enum('admin','kasir','owner') NOT NULL,
  `user_outlet` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_level`, `user_outlet`) VALUES
(1, 'admin', '4acb4bc224acbbe3c2bfdcaa39a4324e', 'aditya', 'admin', 1),
(2, 'kasir', '9d58098de921666b8f5f5b957ffd8297', 'donikasir', 'kasir', 1),
(4, 'owner', 'd60b37833adc4884113df6323dbc4ebe', 'bagus', 'owner', 2),
(6, 'nunu', 'bf136332a484727c401cdae14ace106a', 'nunu', 'owner', 3),
(9, 'lulu', 'a73d49f03849fa768255780c7f4d2cec', 'lulu', 'kasir', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`outlet_id`);

--
-- Indexes for table `tb_pakaian`
--
ALTER TABLE `tb_pakaian`
  ADD PRIMARY KEY (`pakaian_id`),
  ADD KEY `pakaian_transaksi` (`pakaian_transaksi`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`paket_id`),
  ADD KEY `paket_outlet` (`paket_outlet`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`),
  ADD KEY `pelanggan_outlet` (`pelanggan_outlet`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `transaksi_outlet` (`transaksi_outlet`),
  ADD KEY `transaksi_user` (`transaksi_user`),
  ADD KEY `transaksi_pelanggan` (`transaksi_pelanggan`),
  ADD KEY `transaksi_paket` (`transaksi_paket`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD KEY `user_outlet` (`user_outlet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `outlet_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pakaian`
--
ALTER TABLE `tb_pakaian`
  MODIFY `pakaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `paket_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pakaian`
--
ALTER TABLE `tb_pakaian`
  ADD CONSTRAINT `transaksipakaian` FOREIGN KEY (`pakaian_transaksi`) REFERENCES `tb_transaksi` (`transaksi_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `outletpaket` FOREIGN KEY (`paket_outlet`) REFERENCES `tb_outlet` (`outlet_id`);

--
-- Constraints for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD CONSTRAINT `outletpelanggan` FOREIGN KEY (`pelanggan_outlet`) REFERENCES `tb_outlet` (`outlet_id`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `outlettransaksi` FOREIGN KEY (`transaksi_outlet`) REFERENCES `tb_outlet` (`outlet_id`),
  ADD CONSTRAINT `pakettransaksi` FOREIGN KEY (`transaksi_paket`) REFERENCES `tb_paket` (`paket_id`),
  ADD CONSTRAINT `pelanggantransaksi` FOREIGN KEY (`transaksi_pelanggan`) REFERENCES `tb_pelanggan` (`pelanggan_id`),
  ADD CONSTRAINT `usertransaksi` FOREIGN KEY (`transaksi_user`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `outletuser` FOREIGN KEY (`user_outlet`) REFERENCES `tb_outlet` (`outlet_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
