-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2016 at 05:59 PM
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
  `cthd_maso` varchar(64) NOT NULL,
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
  `dg_maso` varchar(64) NOT NULL,
  `dg_nguoimua` varchar(64) NOT NULL,
  `dg_nguoiban` varchar(64) NOT NULL,
  `dg_diem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dienthoai`
--

CREATE TABLE `dienthoai` (
  `dt_maso` varchar(64) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `hd_maso` varchar(64) NOT NULL,
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
  `hdn_maso` varchar(64) NOT NULL,
  `hdn_nguoidung` varchar(64) NOT NULL,
  `hdn_tgian` date NOT NULL,
  `hdn_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hoadontk`
--

CREATE TABLE `hoadontk` (
  `hdtk_maso` varchar(64) NOT NULL,
  `hdtk_nguoidung` varchar(64) NOT NULL,
  `hdtk_tgian` date NOT NULL,
  `hdtk_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `nd_maso` varchar(64) NOT NULL,
  `nd_email` varchar(256) NOT NULL,
  `nd_matkhau` varchar(256) NOT NULL,
  `nd_hoten` varchar(256) NOT NULL,
  `nd_sdt` varchar(256) NOT NULL,
  `nd_dchi` varchar(256) NOT NULL,
  `nd_loai` int(11) NOT NULL,
  `nd_taikhoan` int(11) NOT NULL,
  `nd_tinhtrang` int(11) NOT NULL,
  `nd_danhgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quantri`
--

CREATE TABLE `quantri` (
  `qt_maso` varchar(64) NOT NULL,
  `qt_email` varchar(256) NOT NULL,
  `qt_matkhau` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `th_maso` varchar(64) NOT NULL,
  `th_ten` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`nd_maso`);

--
-- Indexes for table `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`qt_maso`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`th_maso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
