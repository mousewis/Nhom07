-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2016 at 05:33 PM
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
  `cthd_hoadon` varchar(64) NOT NULL,
  `cthd_dienthoai` int(11) NOT NULL,
  `cthd_soluong` int(11) NOT NULL,
  `cthd_gia` int(11) NOT NULL,
  `cthd_tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cthoadon`
--

INSERT INTO `cthoadon` (`cthd_maso`, `cthd_hoadon`, `cthd_dienthoai`, `cthd_soluong`, `cthd_gia`, `cthd_tinhtrang`) VALUES
(6, '20161125052350000000', 9, 1, 3190000, 0),
(7, '20161125052350000000', 1, 1, 7990000, 0),
(8, '20161125165417000000', 6, 1, 5990000, 0),
(9, '20161126022203000000', 2, 2, 9980000, 2),
(10, '20161207091320000000', 17, 1, 27990000, 0),
(11, '20161207091447000000', 15, 1, 4490000, 2),
(12, '20161207091447000000', 12, 1, 4900000, 2),
(13, '20161207121256000000', 29, 1, 3790000, 0),
(14, '20161207121256000000', 15, 1, 4490000, 0),
(15, '20161207121856000000', 12, 1, 4900000, 2),
(16, '20161207125343000000', 41, 1, 2190000, 0),
(17, '20161207125343000000', 31, 1, 4890000, 0),
(18, '20161207154327000000', 38, 1, 990000, 0),
(19, '20161207154327000000', 17, 1, 27990000, 2),
(20, '20161207154540000000', 30, 1, 4520000, 0),
(21, '20161207161948000000', 21, 1, 1000000, 2),
(22, '20161207163026000000', 15, 1, 4490000, 0),
(23, '20161208132735000000', 50, 1, 1390000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `dg_maso` int(11) NOT NULL,
  `dg_hoadon` varchar(64) NOT NULL,
  `dg_tgian` date NOT NULL,
  `dg_nguoimua` varchar(64) NOT NULL,
  `dg_nguoiban` varchar(64) NOT NULL,
  `dg_diem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`dg_maso`, `dg_hoadon`, `dg_tgian`, `dg_nguoimua`, `dg_nguoiban`, `dg_diem`) VALUES
(6, '20161125052350000000', '2016-11-25', 'customerZ', 'merchantA', 5),
(7, '20161207121856000000', '2016-12-07', 'customerC', 'merchantF', 4);

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
(1, 'NOKIA LUMIA 830', '1', 17, '3', 7990000, 'NO830.JPG', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2200 mAh', 'WINDOWS PHONE 8.1', '1 GB', '32 GB', '10 MP'),
(2, 'HTC DESIRE 620G\r\n', '2', 18, '7', 4990000, 'HT620.JPG', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2100 mAh\r\n', 'ANDROID 4.4\r\n', '1 GB\r\n', '8 GB\r\n', '8 MP\r\n'),
(3, 'HTC DESIRE 816\r\n', '3', 20, '7', 6990000, 'HT816.JPG', 'CẢM ỨNG', '5.5 INCH', '720X1280 PX', '2100 mAh\r\n', 'ANDROID 4.4\r\n', '1 GB\r\n', '8 GB\r\n', '13 MP\r\n'),
(4, 'LG L80 D380', '4', 20, '2', 3790000, 'LG80.JPG', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2540 mAh\r\n', 'ANDROID 4.4\r\n', '1 GB\r\n', '4 GB\r\n', '5 MP\r\n'),
(5, 'LG L FINO', '5', 20, '2', 3790000, 'LG80.JPG', 'CẢM ỨNG', '4.5 INCH', '480X800 PX', '1900 mAh', 'ANDROID 4.4', '1 GB\r\n', '4 GB', '8 MP'),
(6, 'IPHONE 4S 8 GB', '6', 8, '5', 5990000, 'IP4S.JPG', 'CẢM ỨNG', '3.5 INCH', '640X960 PX', '1420 mAh', 'ANDROID 4.4', '512 MB\r\n', '8 GB', '8 MP'),
(9, 'SAMSUNG GALAXY CORE PRIME', '20161121085245000000', 9, '1', 3190000, '20161121085245000000.jpeg', 'CẢM ỨNG', '4.5 INCH', '480X800 PX', '2000 mAh', 'ANDROID 4.4', '1 GB', '8 GB', '8 GB'),
(10, 'OPPO F1 PLUS', '20161207082521000000', 7, '6', 5990000, '20161207082521000000.png', 'CẢM ỨNG', '5.5 INCH', '720X1280 PX', '2850 mAh', 'Android 5.1', '4 GB', '64 GB', '13 MP'),
(11, 'OPPO F1S HERO', '20161207082811000000', 10, '6', 5990000, '20161207082811000000.png', 'CẢM ỨNG', '5.5 INCH', '720X1280 PX', '3075 mAh', 'Android 5.1', '3 GB', '128 GB', '13 MP'),
(12, 'OPPO A39 HERO', '20161207083115000000', 8, '6', 4900000, '20161207083115000000.png', 'CẢM ỨNG', '5.2 INCH', '720X1280 PX', '2900 mAh', 'Android 5.1', '3 GB', '32 GB', '13 MP'),
(13, 'OPPO NEO7 HERO', '20161207083348000000', 10, '6', 3290000, '20161207083348000000.png', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2800 mAh', 'Android 5.0', '1 GB', '16 GB', '8 MP'),
(14, 'LG K10', '20161207084704000000', 20, '2', 2990000, '20161207084704000000.png', 'CẢM ỨNG', '5.3 INCH', '720X1280 PX', '2300 mAh', 'Android 5.0', '1.5 GB', '8 GB', '8 MP'),
(15, 'IG X POWER', '20161207084920000000', 12, '2', 4490000, '20161207084920000000.png', 'CẢM ỨNG', '5.3 INCH', '720X1280 PX', '4100 mAh', 'Android 6.0', '2 GB', '16 GB', '13 MP'),
(16, 'IPHONE 6S PLUS 32GB', '20161207085410000000', 14, '5', 18890000, '20161207085410000000.png', 'CẢM ỨNG', '5.5 INCH', '1080X1920 PX', '2750 mAh', 'IOS 9', '2 GB', '32 GB', '12 MP'),
(17, 'IPHONE 7 PLUS 256GB', '20161207085631000000', 8, '5', 27990000, '20161207085631000000.png', 'CẢM ỨNG', '5.5 INCH', '1080X1920 PX', '2900 mAh', 'IOS 10', '3 GB', '256 GB', '13 MP'),
(18, 'IPHONE SE 16GB', '20161207085912000000', 20, '5', 7990000, '20161207085912000000.png', 'CẢM ỨNG', '4.0 INCH', '640X1136 PX', '1642 mAh', 'IOS 9', '2 GB', '16 GB', '12 MP'),
(19, 'IPHONE 6S 128GB', '20161207090420000000', 15, '5', 15990000, '20161207090420000000.png', 'CẢM ỨNG', '4.7 INCH', '750X1334 PX', '1715 mAh', 'IOS 9', '2 GB', '128 GB', '12 MP'),
(20, 'PHILIPS E170', '20161207092352000000', 50, '9', 890000, '20161207092352000000.png', 'BÀN PHÍM', '2.4 INCH', '320 x 240 Pixels', '2070 mAh', 'KHÔNG', 'KHÔNG', 'KHÔNG', 'KHÔNG'),
(21, 'PHILIPS S307', '20161207102923000000', 9, '9', 1000000, '20161207102923000000.png', 'CẢM ỨNG', '4.0 INCH', '480X800 PX', '1630 mAh', 'Android 4.4', '512 MB', '4 GB', '2 MP'),
(22, 'PHILIPS S337', '20161207103453000000', 10, '9', 1590000, '20161207103453000000.png', 'CẢM ỨNG', '5.0 INCH', '480X854 PX', '2000 mAh', 'Android 5.1', '1 GB', '8 GB', '5 MP'),
(23, 'PHILIPS E310', '20161207103729000000', 10, '9', 1290000, '20161207103729000000.png', 'BÀN PHÍM', '2.4 INCH', '320X240 PX', '1630 mAh', 'KHÔNG', 'KHÔNG', 'KHÔNG', 'VGA (480 x 640 pixels)'),
(24, 'PHILIPS S358', '20161207104002000000', 15, '9', 1990000, '20161207104002000000.png', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2300 mAh', 'Android 5.1', '1 GB', '8 GB', '8 MP'),
(25, 'PHILIPS E105', '20161207104207000000', 20, '9', 320000, '20161207104207000000.png', 'BÀN PHÍM', '1.77 INCH', '128X160 PX', '800 mAh', 'KHÔNG', 'KHÔNG', 'KHÔNG', 'VGA (480 x 640 pixels)'),
(26, 'SAMSUNG GALAXY J1 MINI', '20161207104655000000', 14, '1', 1790000, '20161207104655000000.png', 'CẢM ỨNG', '4.0 INCH', '480X800 PX', '1500 mAh', 'Android 5.1', '768 MB', '8 GB', '5 MP'),
(27, 'SAMSUNG GALAXY J2', '20161207104904000000', 15, '1', 2690000, '20161207104904000000.png', 'CẢM ỨNG', '4.7 INCH', '540X960 PX', '2000 mAh', 'Android 5.1', '1 GB', '8 GB', '5 MP'),
(28, 'SAMSUNG GALAXY J3 LTE', '20161207105035000000', 20, '1', 3290000, '20161207105035000000.png', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2600 mAh', 'Android 5.1', '1.5 GB', '8 GB', '8 MP'),
(29, 'SAMSUNG GALAXY J5', '20161207105204000000', 9, '1', 3790000, 'SAMSUNGGALAXYJ5.png', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2600 mAh', 'Android 5.1', '1.5 GB', '8 GB', '13 MP'),
(30, 'SAMSUNG GALAXY J7', '20161207105341000000', 9, '1', 4520000, '20161207105341000000.png', 'CẢM ỨNG', '5.5 INCH', '720X1280 PX', '3000 mAh', 'Android 5.1', '1.5 GB', '16 GB', '13 MP'),
(31, 'SONY XPERIA XA', '20161207113419000000', 4, '4', 4890000, '20161207113419000000.png', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2300 mAh', 'Android 6.0', '2 GB', '16 GB', '13 MP'),
(32, 'SONY XPERIA M5 SINGLE SIM', '20161207113620000000', 5, '4', 6990000, '20161207113620000000.png', 'CẢM ỨNG', '5.0 INCH', '1080X1920 PX', '2600 mAh', 'Android 5.0', '3 GB', '16 GB', '21.5 MP'),
(33, 'SONY XPERIA XA ULTRA', '20161207113855000000', 10, '4', 7490000, '20161207113855000000.png', 'CẢM ỨNG', '6.0 INCH', '1080X1920 PX', '2700 mAh', 'Android 6.0', '3 GB', '16 GB', '21.5 MP'),
(34, 'SONY XPERIA X', '20161207114047000000', 5, '4', 9990000, '20161207114047000000.png', 'CẢM ỨNG', '5.0 INCH', '1080X1920 PX', '2620 mAh', 'Android 6.0', '3 GB', '64 GB', '23 MP'),
(35, 'SONY XPERIA Z5 DUAL', '20161207114232000000', 15, '4', 10990000, '20161207114232000000.png', 'CẢM ỨNG', '5.2 INCH', '1080X1920 PX', '2900 mAh', 'Android 6.0', '3 GB', '32 GB', '23 MP'),
(36, 'NOKIA 105 SINGLE SIM', '20161207114458000000', 200, '3', 420000, '20161207114458000000.png', 'BÀN PHÍM', '1.4 INCH', '128X128 PX', '800 mAh', 'KHÔNG', 'KHÔNG', 'KHÔNG', 'KHÔNG'),
(37, 'NOKIA 105 DUAL SIM', '20161207114618000000', 100, '3', 430000, '20161207114618000000.png', 'BÀN PHÍM', '1.4 INCH', '128X128 PX', '800 mAh', 'KHÔNG', 'KHÔNG', 'KHÔNG', 'KHÔNG'),
(38, 'NOKIA LUMIA 630', '20161207114856000000', 19, '3', 990000, '20161207114856000000.png', 'CẢM ỨNG', '4.5 INCH', '480X854 PX', '1830 mAh', 'Windows Phone 8.1', '512 MB', '8 GB', '5 MP'),
(39, 'NOKIA LUMIA 550', '20161207115041000000', 20, '3', 1390000, '20161207115041000000.png', 'CẢM ỨNG', '4.7 INCH', '720X1280 PX', '2100 mAh', 'Windows 10', '1 GB', '8 GB', '5 MP'),
(40, 'MICROSOFT LUMIA 535', '20161207115248000000', 20, '3', 1590000, '20161207115248000000.png', 'CẢM ỨNG', '5.0 INCH', '540X960 PX', '1905 mAh', 'Windows 10', '1 GB', '8 GB', '5 MP'),
(41, 'NOKIA LUMIA 730 DUAL SIM', '20161207115434000000', 19, '3', 2190000, '20161207115434000000.png', 'CẢM ỨNG', '4.7 INCH', '720X1280 PX', '2220 mAh', 'Windows Phone 8.1', '1 GB', '8 GB', '6.7 MP'),
(42, 'HTC DESIRE 526G', '20161207131628000000', 15, '7', 1990000, '20161207131628000000.png', 'CẢM ỨNG', '4.7 INCH', '540X960 PX', '2000 mAh', 'Android 4.4', '1 GB', '8 GB', '8 MP'),
(43, 'HTC DESIRE 620G', '20161207133842000000', 12, '7', 2290000, '20161207133842000000.png', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2100 mAh', 'Android 4.4', '1 GB', '8 GB', '8 MP'),
(44, 'HTC DESIRE 626G', '20161207134641000000', 21, '7', 2790000, '20161207134641000000.png', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2000 mAh', 'Android 4.4', '1 GB', '8 GB', '13 MP'),
(45, 'HUAWEI P9', '20161207163936000000', 10, '8', 10990000, '20161207163936000000.jpeg', 'CẢM ỨNG', '5.2 INCH', '1080X1920 PX', '3000 mAh', 'Android 6.0', '3 GB', '32 GB', '12 MP'),
(46, 'ZTE BLADE WAVE 3', '20161208125156000000', 12, '10', 3990000, '20161208125156000000.png', 'CẢM ỨNG', '5.5 INCH', '1080X1920 PX', '3000 mAh', 'Android 5.1', '2 GB', '16 GB', '13 MP'),
(47, 'NOKIA 130', '20161208130553000000', 50, '3', 630000, '20161208130553000000.png', 'BÀN PHÍM', '1.8 INCH', '120X160 PX', '1020 mAh', 'KHÔNG', 'KHÔNG', 'KHÔNG', 'KHÔNG'),
(48, 'NOKIA 215 DUAL SIM', '20161208130905000000', 50, '3', 850000, '20161208130905000000.png', 'BÀN PHÍM', '2.4 INCH', '320 x 240 Pixels', '1100 mAh', 'KHÔNG', 'KHÔNG', 'KHÔNG', 'VGA (480 x 640 pixels)'),
(49, 'NOKIA 222 DUAL SIM', '20161208131226000000', 40, '3', 950000, '20161208131226000000.png', 'BÀN PHÍM', '2.4 INCH', '320 x 240 Pixels', '1100 mAh', 'KHÔNG', 'KHÔNG', 'KHÔNG', '2 MP'),
(50, 'NOKIA 230 DUAL SIM', '20161208131546000000', 29, '3', 1390000, '20161208131546000000.png', 'BÀN PHÍM', '2.8 INCH', '320X240 PX', '1200 mAh', 'KHÔNG', 'KHÔNG', 'KHÔNG', '2 MP'),
(51, 'HUAWEI GR5 2017', '20161208134448000000', 5, '8', 5990000, '20161208134448000000.png', 'CẢM ỨNG', '5.5 INCH', '1080X1920 PX', '3340 mAh', 'Android 6.0 (Marshmallow)', '3 GB', '32 GB', '12 MP'),
(52, 'HUAWEI Y5 II', '20161208134919000000', 12, '8', 2190000, '20161208134919000000.png', 'CẢM ỨNG', '5.0 INCH', '720X1280 PX', '2200 mAh', 'Android 5.1', '1 GB', '8 GB', '8 MP');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `hd_maso` varchar(64) NOT NULL,
  `hd_nguoimua` varchar(64) NOT NULL,
  `hd_nguoinhan` varchar(256) NOT NULL,
  `hd_soluong` int(11) NOT NULL,
  `hd_xuly` int(11) NOT NULL,
  `hd_hoantat` int(11) NOT NULL,
  `hd_huy` int(11) NOT NULL,
  `hd_gia` int(11) NOT NULL,
  `hd_tgian` date NOT NULL,
  `hd_dchi` varchar(256) NOT NULL,
  `hd_sdt` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`hd_maso`, `hd_nguoimua`, `hd_nguoinhan`, `hd_soluong`, `hd_xuly`, `hd_hoantat`, `hd_huy`, `hd_gia`, `hd_tgian`, `hd_dchi`, `hd_sdt`) VALUES
('20161125052350000000', 'customerZ', 'customer Z', 2, 0, 0, 0, 11180000, '2016-11-25', '270 An Dương Vương', '0946607797'),
('20161125165417000000', 'customerZ', 'customer Z', 1, 0, 0, 0, 5990000, '2016-11-25', '270 An Dương Vương', '0946607797'),
('20161126022203000000', 'customerZ', 'customer Z', 1, 0, 1, 0, 9980000, '2016-11-26', '270 An Dương Vương', '0946607797'),
('20161207091320000000', 'customerF', 'Nguyễn Văn An', 1, 0, 0, 0, 27990000, '2016-12-07', '135 Đinh Tiên Hoàng, q.Bình Thạnh', '0905413306'),
('20161207091447000000', 'customerA', 'nguyễn đặng thành long', 2, 0, 2, 0, 9390000, '2016-12-07', '87/22/67 Bành Văn Trân, P7, Q.Tân Bình, tp.HCM', '01626772342'),
('20161207121256000000', 'customerB', 'Đỗ Chí Trung', 2, 0, 0, 0, 8280000, '2016-12-07', '02 Quang Trung, q.Gò Vấp', '0966234234'),
('20161207121856000000', 'customerC', 'Võ Minh Vương', 1, 0, 1, 0, 4900000, '2016-12-07', '17 Phan Đăng Lưu, q.Bình Thạnh', '0944900944'),
('20161207125343000000', 'customerD', 'Trần Xuân Hoàng', 2, 0, 0, 0, 7080000, '2016-12-07', '69 Nguyễn Trung Trực, q.Bình Thạnh', '01288449448'),
('20161207154327000000', 'customerG', 'Tạ Chiến', 2, 0, 1, 0, 28980000, '2016-12-07', '10 Nguyễn Đình Chiểu', '0919426426'),
('20161207154540000000', 'customerH', 'Nguyễn Quỳnh Như', 1, 0, 0, 0, 4520000, '2016-12-07', '88 Lê Lai', '0973973973'),
('20161207161948000000', 'customerJ', 'Hoàng Thị Thùy', 1, 0, 1, 0, 1000000, '2016-12-07', '33/42/12/23 Cách Mạng Tháng 8', '0962988348'),
('20161207163026000000', 'yen_nhi', 'Tạ Huyền', 1, 0, 0, 0, 4490000, '2016-12-07', '1086/127/2/6/15/41 khu phố 6, thị trấn Nhà Bè, huyện Nhà Bè, TP.HCM', '0944546754'),
('20161208132735000000', 'yen_nhi', 'Nguyễn Thị Yến Nhi', 1, 0, 1, 0, 1390000, '2016-12-08', '32/43 Cộng Hòa, Q.Tân Bình, TP.Hồ Chí Minh', '0935764872');

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

--
-- Dumping data for table `hoadonnhap`
--

INSERT INTO `hoadonnhap` (`hdn_maso`, `hdn_nguoidung`, `hdn_tgian`, `hdn_gia`) VALUES
('1', 'merchantA', '2016-11-10', 10000),
('2', 'merchantA', '2016-11-14', 10000),
('20161121085245000000', 'merchantA', '2016-11-21', 10000),
('20161207082521000000', 'merchantF', '2016-12-07', 10000),
('20161207082811000000', 'merchantF', '2016-12-07', 10000),
('20161207083115000000', 'merchantF', '2016-12-07', 10000),
('20161207083348000000', 'merchantF', '2016-12-07', 10000),
('20161207084704000000', 'merchantD', '2016-12-07', 10000),
('20161207084920000000', 'merchantD', '2016-12-07', 10000),
('20161207085410000000', 'merchantC', '2016-12-07', 10000),
('20161207085631000000', 'merchantC', '2016-12-07', 10000),
('20161207085912000000', 'merchantC', '2016-12-07', 10000),
('20161207090420000000', 'merchantC', '2016-12-07', 10000),
('20161207092352000000', 'merchantE', '2016-12-07', 10000),
('20161207102923000000', 'merchantE', '2016-12-07', 10000),
('20161207103453000000', 'merchantE', '2016-12-07', 10000),
('20161207103729000000', 'merchantE', '2016-12-07', 10000),
('20161207104002000000', 'merchantE', '2016-12-07', 10000),
('20161207104207000000', 'merchantE', '2016-12-07', 10000),
('20161207104655000000', 'merchantG', '2016-12-07', 10000),
('20161207104904000000', 'merchantG', '2016-12-07', 10000),
('20161207105035000000', 'merchantG', '2016-12-07', 10000),
('20161207105204000000', 'merchantG', '2016-12-07', 10000),
('20161207105341000000', 'merchantG', '2016-12-07', 10000),
('20161207113419000000', 'merchantH', '2016-12-07', 10000),
('20161207113620000000', 'merchantH', '2016-12-07', 10000),
('20161207113855000000', 'merchantH', '2016-12-07', 10000),
('20161207114047000000', 'merchantH', '2016-12-07', 10000),
('20161207114232000000', 'merchantH', '2016-12-07', 10000),
('20161207114458000000', 'merchantJ', '2016-12-07', 10000),
('20161207114618000000', 'merchantJ', '2016-12-07', 10000),
('20161207114856000000', 'merchantJ', '2016-12-07', 10000),
('20161207115041000000', 'merchantJ', '2016-12-07', 10000),
('20161207115248000000', 'merchantJ', '2016-12-07', 10000),
('20161207115434000000', 'merchantJ', '2016-12-07', 10000),
('20161207131628000000', 'merchantE', '2016-12-07', 10000),
('20161207133842000000', 'merchantB', '2016-12-07', 10000),
('20161207134641000000', 'merchantB', '2016-12-07', 10000),
('20161207163936000000', 'thanh_tam', '2016-12-07', 10000),
('20161208125156000000', 'ngoc_thao', '2016-12-08', 10000),
('20161208130553000000', 'ngoc_thao', '2016-12-08', 10000),
('20161208130905000000', 'ngoc_thao', '2016-12-08', 10000),
('20161208131226000000', 'thanh_tam', '2016-12-08', 10000),
('20161208131546000000', 'thanh_tam', '2016-12-08', 10000),
('20161208134448000000', 'merchantB', '2016-12-08', 10000),
('20161208134919000000', 'merchantB', '2016-12-08', 10000),
('3', 'merchantA', '2016-11-12', 10000),
('4', 'merchantB', '2016-11-14', 10000),
('5', 'merchantB', '2016-11-13', 10000),
('6', 'merchantA', '2016-11-13', 10000);

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
(2, 'merchantB', '2016-11-08', 200000),
(3, 'merchantdemo', '2016-11-27', 200000),
(4, 'merchantdemo', '2016-11-27', 100000),
(5, 'merchantF', '2016-11-08', 300000),
(6, 'merchantC', '2016-10-06', 100000),
(7, 'merchantD', '2016-10-03', 200000),
(8, 'merchantE', '2016-09-05', 500000),
(9, 'merchantG', '2016-09-21', 300000),
(10, 'merchantH', '2016-09-13', 300000),
(11, 'merchantJ', '2016-12-06', 200000),
(12, 'merchantJ', '2016-12-07', 100000),
(13, 'merchantE', '2016-12-07', 100000),
(14, 'merchantB', '2016-12-07', 100000),
(15, 'merchantF', '2016-12-07', 100000),
(16, 'thanh_tam', '2016-12-07', 500000),
(17, 'ngoc_thao', '2016-12-08', 500000);

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
  `nd_danhgia` float NOT NULL,
  `nd_luotdanhgia` int(11) NOT NULL DEFAULT '0',
  `nd_kichhoat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`nd_maso`, `nd_email`, `nd_matkhau`, `nd_hoten`, `nd_sdt`, `nd_dchi`, `nd_loai`, `nd_taikhoan`, `nd_tinhtrang`, `nd_danhgia`, `nd_luotdanhgia`, `nd_kichhoat`) VALUES
('customerA', 'nguyendangthanhlong1994@gmail.com.vn', '24f73f60c8d336177403899116008c9f', 'nguyễn đặng thành long', '01626772342', '87/22/67 Bành Văn Trân, P7, Q.Tân Bình, tp.HCM', 2, 0, 1, 0, 0, '0'),
('customerB', 'trungchi1980@gmail.com', '3ad69428e83370456155079c1c4d8a16', 'Đỗ Chí Trung', '0966234234', '02 Quang Trung, q.Gò Vấp', 2, 0, 1, 0, 0, 'ZT1Pbqc7zsw6afHZ'),
('customerC', 'customerc@gmail.com', '2b3bc9757e808e3e34015c55f4e6d96f', 'Võ Minh Vương', '0944900944', '17 Phan Đăng Lưu, q.Bình Thạnh', 2, 0, 1, 0, 0, '2u6fl7N46ZJBpR8O'),
('customerD', 'hoangtran19771015@gmail.com', 'f37b668562f3715f33863de851ca0ce5', 'Trần Xuân Hoàng', '01288449448', '69 Nguyễn Trung Trực, q.Bình Thạnh', 2, 0, 1, 0, 0, 'SMol6NpeCenS616G'),
('customerF', 'JosvanAn@gmail.com', 'ea26db4c52ffcaf7c58e7dc8cf4ada90', 'Nguyễn Văn An', '0905413306', '135 Đinh Tiên Hoàng, q.Bình Thạnh', 2, 0, 1, 0, 0, 'eUHJ27z5uYEWczSi'),
('customerG', 'chientadondoc@gmail.com', 'fcf0a0cfa343dec7761dbc9ea50e1733', 'Tạ Chiến', '0919426426', '10 Nguyễn Đình Chiểu', 2, 0, 1, 0, 0, 'KNEXPTzvpvJMEKJm'),
('customerH', 'quynhnhunguyen@gmail.com', '84beef34d2665f39d4d39871dfb82a14', 'Nguyễn Quỳnh Như', '0973973973', '88 Lê Lai', 2, 0, 1, 0, 0, 'tshAPRmHggUTwxwB'),
('customerJ', 'thuyhoangd75@gmail.com', '6b14c8e72ee725070f877a374bd6365a', 'Hoàng Thị Thùy', '0945445445', '33/42/12/23 Cách Mạng Tháng 8', 2, 0, 1, 0, 0, '0'),
('customerX', 'mousewis123@gmail.com', 'ffbc4675f864e0e9aab8bdf7a0437010', 'Customer X', '0946607797', '273 An Dương Vương', 2, 0, 1, 0, 0, '0'),
('customerY', 'mousewis_123@gmail.com', '5ce4d191fd14ac85a1469fb8c29b7a7b', 'Customer Y', '0946607797', '273 An Dương Vương', 2, 0, 1, 0, 0, '0'),
('customerZ', 'mouse_wis@yahoo.com', '033f7f6121501ae98285ad77f216d5e7', 'customer Z', '0946607797', '270 An Dương Vương', 2, 0, 1, 0, 0, 'ldtEayowPzRwzDC8'),
('merchantA', 'mousewis@gmail.com', 'f98919752bf9bfb31e539a1fe663fd68', 'Merchant A', '0946607798', '273 An Dương Vương', 1, 10000, 1, 3.8, 4, 'a1b2c4b68g9t5t90'),
('merchantB', 'mouse_wis@gmail.com', '8b550a0ca911a53b1c6fc398c7828f40', 'Merchant b', '0946607797', '273 An Dương Vương', 1, 100000, 1, 0, 0, '0'),
('merchantC', 'nguyendangthanhlong1994@gmail.com', '5efa8a48d025ffea7421b90a334fbfad', 'nguyễn long', '01626772342', '87/22/67 Bành Văn Trân, P7, Q.Tân Bình, tp.HCM', 1, 60000, 1, 0, 0, 'QReGza402m8ueFQU'),
('merchantD', 'linhtran3113410055@gmail.com', '53182c29af344ee3e40ed77aba69898e', 'quốc linh', '0939394959', '124 Cách Mạng Tháng 8', 1, 180000, 1, 0, 0, 'IlAUraSxqSUAcrCg'),
('merchantdemo', 'mouse_wis@yahoo.com.vn', '4b5cd34c845417c6ab55a6e781eac410', 'Merchant Demo', '0946607777', '270 Sư Vạn Hạnh', 1, 300000, 1, 0, 0, 'I3j7Hju3R6j0bCXr'),
('merchantE', 'duy9c1994@yahoo.com.vn', '7803d041f4d413b93775a1d80f6e309e', 'bùi duy', '0939394959', '22/67 Cách Mạng Tháng 8', 1, 530000, 1, 0, 0, 'SviDYqsSeq0QmFqS'),
('merchantF', 'quoclinhdkm@gmail.com', '11e9e0750e508d8ff66c6cd779cab777', 'trần linh', '01224537341', '22/67 Cách Mạng Tháng 8', 1, 360000, 1, 0, 0, 'XltmcVnv2irqr1b1'),
('merchantG', 'merchantg@gmail.com', 'f08c16c404adf4dad30c9b8a004dce17', 'phan sỹ', '0932451215', '222 Võ Văn Tần', 1, 250000, 1, 0, 0, 'yfIfb4ooU8eznCQG'),
('merchantH', 'vansinh@gmail.com', '4ff43a3b59f2c1a78e30ea4b0a3cca3f', 'nguyễn văn sinh', '01668793452', '41/13 Nguyễn Du', 1, 250000, 1, 0, 0, 'QSgafdQ8sAQCLTjB'),
('merchantJ', 'dongduc1988@gmail.com', '9ccb50cc8648c22d8116eb46725f3c2a', 'Nguyễn Đông Đức', '0941941941', '143 Đồng Đen', 1, 240000, 1, 0, 0, 'bzCzJ62c78k60EFd'),
('ngoc_thao', 'ngoc_thao_DTT1342@gmail.com', '8f8bd1bc7b2248b961af6fc4e8637eca', 'Phạm Ngọc Thảo', '01223234234', '58/43 Lý Tự Trọng, Q.1, TP HCM', 1, 470000, 1, 0, 0, 'Ac11bEk1bayfAjz6'),
('thanh_tam', 'nguyenthanhtamDS84@gmail.com', 'c896275c27000126a288cfe6a66b9480', 'nguyễn Thị Thanh Tâm', '0973973973', '1086/127/2/6/15/41 khu phố 6, thị trấn Nhà Bè, huyện Nhà Bè, TP. HCM', 1, 470000, 1, 0, 0, 'xXJsAJiUVmPjh3sj'),
('yen_nhi', 'yennhidongson@gmail.com', 'd993cdd8eb658dd70fb7fa285adb8d03', 'Nguyễn Yến Nhi', '0935764872', '1086/127/2/6/15/41 khu phố 6, thị trấn Nhà Bè, huyện Nhà Bè, TP.HCM', 2, 0, 1, 0, 0, '0');

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
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tk_maso` int(11) NOT NULL,
  `tk_nguoidung` varchar(64) NOT NULL,
  `tk_noidung` int(11) NOT NULL,
  `tk_ghichu` varchar(256) NOT NULL,
  `tk_tgian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`tk_maso`, `tk_nguoidung`, `tk_noidung`, `tk_ghichu`, `tk_tgian`) VALUES
(1, 'customerX', -1, 'Tài khoản spam', '2016-11-26'),
(2, 'customerX', 1, 'Đã liên hệ admin ', '2016-11-26');

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
  ADD PRIMARY KEY (`cthd_maso`);

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
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tk_maso`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`th_maso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `cthd_maso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `dg_maso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dienthoai`
--
ALTER TABLE `dienthoai`
  MODIFY `dt_maso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `hoadontk`
--
ALTER TABLE `hoadontk`
  MODIFY `hdtk_maso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `tk_maso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `th_maso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
