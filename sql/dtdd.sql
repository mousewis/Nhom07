-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2016 at 08:20 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `cthd_maso` int(11) NOT NULL,
  `cthd_sanpham` varchar(64) NOT NULL,
  `cthd_soluong` int(11) NOT NULL,
  `cthd_gia` int(11) NOT NULL,
  `cthd_tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `dg_maso` int(11) NOT NULL,
  `dg_tgian` date NOT NULL,
  `dg_nguoimua` varchar(64) NOT NULL,
  `dg_nguoiban` varchar(64) NOT NULL,
  `dg_diem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`dg_maso`, `dg_tgian`, `dg_nguoimua`, `dg_nguoiban`, `dg_diem`) VALUES
(1, '2016-11-14', 'customerX', 'merchantA', 5),
(2, '2016-11-13', 'customerY', 'merchantA', 5);

-- --------------------------------------------------------

--
-- Table structure for table `dienthoai`
--

CREATE TABLE `dienthoai` (
  `dt_maso` int(11) NOT NULL,
  `dt_ten` varchar(256) NOT NULL,
  `dt_hdn` varchar(64) NOT NULL,
  `dt_sluong` int(11) NOT NULL,
  `dt_thuonghieu` varchar(64) NOT NULL,
  `dt_gia` int(11) NOT NULL,
  `dt_hinh` varchar(256) NOT NULL,
  `dt_loai` varchar(256) NOT NULL,
  `dt_kco` varchar(256) NOT NULL,
  `dt_pgiai` varchar(256) NOT NULL,
  `dt_pin` varchar(256) NOT NULL,
  `dt_hdh` varchar(256) NOT NULL,
  `dt_ram` varchar(256) NOT NULL,
  `dt_bnho` varchar(256) NOT NULL,
  `dt_cam` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dienthoai`
--

INSERT INTO `dienthoai` (`dt_maso`, `dt_ten`, `dt_hdn`, `dt_sluong`, `dt_thuonghieu`, `dt_gia`, `dt_hinh`, `dt_loai`, `dt_kco`, `dt_pgiai`, `dt_pin`, `dt_hdh`, `dt_ram`, `dt_bnho`, `dt_cam`) VALUES
(1, 'NOKIA LUMIA 830', '1', 20, '3', 7990000, 'NO830.JPG', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2200 mAh', 'WINDOWS PHONE 8.1', '1 GB', '32 GB', '10 MP'),
(2, 'HTC DESIRE 620G\r\n', '2', 20, '7', 4990000, 'HT620.JPG', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2100 mAh\r\n', 'ANDROID 4.4\r\n', '1 GB\r\n', '8 GB\r\n', '8 MP\r\n'),
(3, 'HTC DESIRE 816\r\n', '3', 20, '7', 6990000, 'HT816.JPG', 'CẢM ỨNG', '5.5 INCH', '720X1280 PX', '2100 mAh\r\n', 'ANDROID 4.4\r\n', '1 GB\r\n', '8 GB\r\n', '13 MP\r\n'),
(4, 'LG L80 D380', '4', 20, '2', 3790000, 'LG80.JPG', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2540 mAh\r\n', 'ANDROID 4.4\r\n', '1 GB\r\n', '4 GB\r\n', '5 MP\r\n'),
(5, 'LG L FINO', '5', 20, '2', 3790000, 'LG80.JPG', 'CẢM ỨNG', '4.5 INCH', '480X800 PX', '1900 mAh', 'ANDROID 4.4', '1 GB\r\n', '4 GB', '8 MP'),
(6, 'IPHONE 4S 8 GB', '6', 10, '5', 5990000, 'IP4S.JPG', 'CẢM ỨNG', '3.5 INCH', '640X960 PX', '1420 mAh', 'ANDROID 4.4', '512 MB\r\n', '8 GB', '8 MP');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `hd_maso` int(11) NOT NULL,
  `hd_nguoimua` varchar(64) NOT NULL,
  `hd_tinhtrang` int(11) NOT NULL,
  `hd_gia` int(11) NOT NULL,
  `hd_tgian` date NOT NULL,
  `hd_dchi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `hdn_maso` int(11) NOT NULL,
  `hdn_nguoidung` varchar(64) NOT NULL,
  `hdn_tgian` date NOT NULL,
  `hdn_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadonnhap`
--

INSERT INTO `hoadonnhap` (`hdn_maso`, `hdn_nguoidung`, `hdn_tgian`, `hdn_gia`) VALUES
(1, 'merchantA', '2016-11-10', 10000),
(2, 'merchantA', '2016-11-14', 10000),
(3, 'merchantA', '2016-11-12', 10000),
(4, 'merchantB', '2016-11-14', 10000),
(5, 'merchantB', '2016-11-13', 10000),
(6, 'merchantA', '2016-11-13', 10000),
(7, 'merchantB', '2016-11-16', 10000),
(8, 'merchantA', '2016-11-16', 10000),
(9, 'merchantA', '2016-11-16', 10000),
(10, 'merchantB', '2016-11-16', 10000),
(11, 'merchantA', '2016-11-15', 10000),
(12, 'merchantB', '2016-11-15', 10000),
(13, 'merchantA', '2016-11-14', 10000),
(14, 'merchantB', '2016-11-14', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `hoadontk`
--

CREATE TABLE `hoadontk` (
  `hdtk_maso` int(11) NOT NULL,
  `hdtk_nguoidung` varchar(64) NOT NULL,
  `hdtk_tgian` date NOT NULL,
  `hdtk_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadontk`
--

INSERT INTO `hoadontk` (`hdtk_maso`, `hdtk_nguoidung`, `hdtk_tgian`, `hdtk_gia`) VALUES
(1, 'merchantA', '2016-11-09', 100000),
(2, 'merchantB', '2016-11-08', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `nd_maso` varchar(64) NOT NULL,
  `nd_email` varchar(64) NOT NULL,
  `nd_matkhau` varchar(256) NOT NULL,
  `nd_hoten` varchar(256) NOT NULL,
  `nd_sdt` varchar(256) NOT NULL,
  `nd_dchi` varchar(256) NOT NULL,
  `nd_loai` int(11) NOT NULL,
  `nd_taikhoan` int(11) NOT NULL,
  `nd_tinhtrang` int(11) NOT NULL,
  `nd_danhgia` int(11) NOT NULL,
  `nd_luotdanhgia` int(11) NOT NULL DEFAULT '0',
  `nd_kichhoat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`nd_maso`, `nd_email`, `nd_matkhau`, `nd_hoten`, `nd_sdt`, `nd_dchi`, `nd_loai`, `nd_taikhoan`, `nd_tinhtrang`, `nd_danhgia`, `nd_luotdanhgia`, `nd_kichhoat`) VALUES
('customerX', 'mousewis123@gmail.com', 'ffbc4675f864e0e9aab8bdf7a0437010', 'Customer X', '0946607797', '273 An Dương Vương', 2, 0, 1, 0, 0, '0'),
('customerY', 'mousewis_123@gmail.com', '5ce4d191fd14ac85a1469fb8c29b7a7b', 'Customer Y', '0946607797', '273 An Dương Vương', 2, 0, 1, 0, 0, '0'),
('customerZ', 'mouse_wis@yahoo.com', '033f7f6121501ae98285ad77f216d5e7', 'customer Z', '0946607797', '270 An Dương Vương', 2, 0, 0, 0, 0, 'ldtEayowPzRwzDC8'),
('merchantA', 'mousewis@gmail.com', 'f98919752bf9bfb31e539a1fe663fd68', 'Merchant A', '0946607797', '273 An Dương Vương', 1, 20000, 1, 5, 2, '0'),
('merchantB', 'mouse_wis@gmail.com', '8b550a0ca911a53b1c6fc398c7828f40', 'Merchant b', '0946607797', '273 An Dương Vương', 1, 40000, 1, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `quantri`
--

CREATE TABLE `quantri` (
  `qt_maso` varchar(64) NOT NULL,
  `qt_email` varchar(64) NOT NULL,
  `qt_matkhau` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quantri`
--

INSERT INTO `quantri` (`qt_maso`, `qt_email`, `qt_matkhau`) VALUES
('admin', 'maihuynh16995@gmail.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `th_maso` int(11) NOT NULL,
  `th_ten` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`th_maso`, `th_ten`) VALUES
(1, 'SAMSUNG'),
(2, 'LG'),
(3, 'NOKIA'),
(4, 'SONY'),
(5, 'APPLE'),
(6, 'OPPO'),
(7, 'HTC'),
(8, 'HUAWEI'),
(9, 'PHILIPS'),
(10, 'ZTE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`cthd_maso`,`cthd_sanpham`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`dg_maso`);

--
-- Indexes for table `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD PRIMARY KEY (`dt_maso`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`hd_maso`);

--
-- Indexes for table `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`hdn_maso`);

--
-- Indexes for table `hoadontk`
--
ALTER TABLE `hoadontk`
  ADD PRIMARY KEY (`hdtk_maso`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`nd_maso`),
  ADD UNIQUE KEY `nd_email` (`nd_email`);

--
-- Indexes for table `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`qt_maso`),
  ADD UNIQUE KEY `qt_email` (`qt_email`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`th_maso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `dg_maso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dienthoai`
--
ALTER TABLE `dienthoai`
  MODIFY `dt_maso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `hd_maso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  MODIFY `hdn_maso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `hoadontk`
--
ALTER TABLE `hoadontk`
  MODIFY `hdtk_maso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `th_maso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
