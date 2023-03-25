-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 03:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_cishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `qty`, `subtotal`) VALUES
(25, 1, 3, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `slug`, `title`) VALUES
(1, 'celana-pria', 'Celana Pria'),
(2, 'celana-wanita', 'Celana Wanita'),
(3, 'kaos-pria', 'Kaos Pria'),
(4, 'kaos-wanita', 'Kaos Wanita'),
(5, 'kameja-pria', 'Kameja Pria'),
(6, 'kameja-wanita', 'Kameja Wanita'),
(7, 'topi', 'Topi');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `ekspedisi` varchar(255) DEFAULT NULL,
  `status` enum('waiting','paid','delivered','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date`, `invoice`, `total`, `name`, `address`, `phone`, `metode_pembayaran`, `ekspedisi`, `status`) VALUES
(1, 2, '2022-01-03', '220220103152740', 200000, 'Renaldi Noviandi', 'Kasomalang', '089898989898', 'Bank Transfer', 'Ninja Express', 'delivered'),
(2, 2, '2022-01-03', '220220103154826', 600000, 'Renaldi Noviandi', 'Kasomalang', '089898989898', 'Dana', 'J&T Express', 'paid'),
(3, 2, '2022-01-04', '220220104032844', 400000, 'Penjual', 'Subang', '08384548585858', 'Dana', 'JNE Express', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `orders_confirm`
--

CREATE TABLE `orders_confirm` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_confirm`
--

INSERT INTO `orders_confirm` (`id`, `id_orders`, `account_name`, `account_number`, `nominal`, `note`, `image`) VALUES
(1, 1, 'Renaldi', '098789687875', 200000, '-Semoga Pengiriman Cepat', '220220103152740-20220103153817.jpg'),
(2, 2, 'Renaldi', '08989899898', 600000, '-Bagus barangnya, semoga sesuai', '220220103154826-20220103163444.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `id_orders`, `id_product`, `qty`, `subtotal`) VALUES
(1, 1, 1, 1, 200000),
(2, 2, 1, 3, 600000),
(3, 3, 1, 2, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_category`, `slug`, `title`, `description`, `price`, `is_available`, `image`) VALUES
(1, 5, 'kameja-pria', 'Kameja Pria', 'Kameja Pria Lengan Panjang', 200000, 1, 'kameja-pria-20220103152623.jpg'),
(2, 5, 'kameja-pria-cokelat', 'Kameja Pria Cokelat', 'Kameja Pria Cokelat Lengan Panjang', 300000, 1, 'kameja-pria-cokelat-20220103164716.jpg'),
(3, 4, 'kaos-wanita', 'Kaos Wanita', 'Kaos Wanita Lengan Pendek', 100000, 1, 'kaos-wanita-20220103164822.jpg'),
(4, 1, 'celana-pria-panjang-kotak', 'Celana Pria Panjang Kotak', 'Celana Pria Panjang Kotak Border Putih', 150000, 1, 'celana-pria-panjang-kotak-20220103165232.jpg'),
(5, 1, 'celana-panjang-chino-pria', 'Celana Panjang Chino Pria', 'CELANA PANJANG PRIA / CELANA PANJANG CHINO/CINOS / CELANA PRIA PANJANG SLIM FIT / CELANA COWOK', 60000, 1, 'celana-panjang-chino-pria-20220104021151.jpg'),
(6, 1, 'celana-panjang-pria-jeans', 'Celana Panjang Pria Jeans', 'Jual Celana Jeans Pria Slim Fit Biru Celana Panjang Cowok Celana Pria N0R7', 70000, 1, 'celana-panjang-pria-jeans-20220104021526.jpg'),
(7, 2, 'celana-kargo-jumbo', 'Celana Kargo Jumbo', 'Jual Celana Kargo Jumbo , Celana Wanita Cargo Street - Hitam', 100000, 1, 'celana-kargo-jumbo-20220104021715.jpg'),
(8, 2, 'cullot-polos-purple', 'Cullot Polos Purple', 'Celana Perempuan Cullot Polos Purple', 80000, 1, 'cullot-polos-purple-20220104021928.jpg'),
(9, 3, 'kaos-pria-kaos-distro', 'Kaos Pria Kaos Distro', 'Jual ASY KAOS PRIA II KAOS DISTRO SABLON DIGITAL BERKUALITAS', 80000, 1, 'kaos-pria-kaos-distro-20220104031012.jpg'),
(10, 3, 'kaos-distro-pria-greenlight-splashing', 'Kaos Distro Pria Greenlight Splashing', 'Kaos Distro Pria Greenlight Splashing Neo Kaos Pria T Shirt Pria - Glsplashnavy', 100000, 1, 'kaos-distro-pria-greenlight-splashing-20220104031150.jpg'),
(11, 6, 'kemeja-wanita-kotak-kotak-kasual-lengan-panjang', 'Kemeja Wanita Kotak-Kotak Kasual Lengan Panjang', 'Terbaru kemeja Wanita kotak-kotak kasual lengan panjang', 90000, 1, 'kemeja-wanita-kotak-kotak-kasual-lengan-panjang-20220104032056.jpg'),
(12, 6, 'kemeja-wanita-katun-kotak', 'Kemeja Wanita Katun Kotak', 'Kem Oversize Garmi | Kemeja Wanita Katun Kotak | Kemeja Kerja Murah', 70000, 1, 'kemeja-wanita-katun-kotak-20220104032219.jpg'),
(13, 7, 'topi-baseball-motif-bunga-daisy-kecil', 'Topi Baseball Motif Bunga Daisy Kecil', 'Jual Topi Baseball Motif Bunga Daisy Kecil Gaya Hip Hop Untuk Wanita / Topi Bordir Bunga / Topi Pria', 50000, 1, 'topi-baseball-motif-bunga-daisy-kecil-20220104032340.jpg'),
(14, 7, 'topi-distro-terbaru', 'Topi Distro Terbaru', 'Jual Topi Distro Terbaru - Harga Januari 2022', 60000, 1, 'topi-distro-terbaru-20220104032522.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `is_active`, `image`) VALUES
(1, 'Renaldi Noviandi', 'renaldinoviandi9@gmail.com', '$2y$10$.PzKLXorHG7ME80INL3vSeU3MS3lWCouIj2loyygnb1p5cpykFFf6', 'member', 1, NULL),
(2, 'Penjual', 'penjual@gmail.com', '$2y$10$YkkBIGpDjd4vfPChxdmXsecq/4QrMSYOs9Thr98InvPCq7FG7GeQW', 'admin', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_confirm`
--
ALTER TABLE `orders_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders_confirm`
--
ALTER TABLE `orders_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
