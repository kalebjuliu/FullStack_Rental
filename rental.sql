-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 01:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `status` enum('Sedang Dikirim','Sudah Dikirim','Siap di Pick-up','Selesai') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Sedang Dikirim' COMMENT 'Default = Sedang Dikirim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `grand_total`, `duration`, `status`) VALUES
(30, 3, 1135000.00, 3, 'Sedang Dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `sub_total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `sub_total`) VALUES
(47, 30, 1, 1, 350000.00),
(48, 30, 2, 1, 100000.00),
(49, 30, 8, 1, 50000.00),
(50, 30, 11, 1, 100000.00),
(51, 30, 10, 1, 50000.00),
(52, 30, 9, 1, 50000.00),
(53, 30, 14, 1, 400000.00),
(54, 30, 15, 1, 35000.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `qty`, `image`, `price`, `description`) VALUES
(1, 'Playstation 5', 29, 'playstation5.png', 350000, 'PlayStation 5 (PS5) merupakan konsol permainan yang dikembangkan oleh Sony Interactive Entertainment. Game Konsol dirilis pada akhir tahun 2020. Konsol ini akan menggunakan Solid State Drive (SSD) khusus, GPU dengan dukungan Ray Tracing'),
(2, 'Xbox One S', 29, 'xboxone.png', 100000, 'Sebuah produk konsol permainan video rumah generasi kedelapan yang dikembangkan oleh Microsoft. Produk ini diumumkan pada Bulan Mei 2013, ini adalah penerus dari Xbox 360 dan konsol ketiga dalam keluarga Xbox.'),
(8, 'Xbox 360', 29, 'xbox360.png', 50000, 'Xbox 360 atau dikenal dengan Xenon atau Xbox 2 adalah penerus konsol permainan video Xbox milik Microsoft sebelum Xbox One rilis. Microsoft secara resmi memperkenalkannya di MTV pada 12 Mei 2005.'),
(9, 'Nintendo Wii', 29, 'wii.png', 50000, 'Nintendo Wii adalah konsol permainan yang memungkinkan pemain untuk menggunakan pergerakan sebagai metode input.'),
(10, 'Playstation 3', 29, 'playstation3.png', 50000, 'Playstation 3 (PS3) merupakan konsol game generasi ketiga dari perusahaan Sony. PS3 ini merupakan penerus dari PlayStation 1 dan juga PlayStation 2. Konsol ini bersaing dengan Xbox 360 dari Microsoft dan Nintendo Wii dari Nintendo pada jamannya.'),
(11, 'Playstation 4', 29, 'playstation4.png', 100000, 'PlayStation 4 atau PS4 merupakan konsol permainan video buatan Sony Computer Entertainment sama seperti PS3. Konsol ini merupakan penerus dari PlayStation 3 yang diumumkan pada tanggal 20 Februari 2013'),
(14, 'Nintendo Switch', 29, 'switch.png', 400000, 'Nintendo Switch adalah konsol video game yang dirilis pada 3 Maret 2017. Sejauh ini, konsol ini merupakan satu-satunya konsol hybrid yang merupakan konsol rumahan namun sekaligus konsol portabel juga.'),
(15, 'Playstation 2', 29, 'PS2.png', 35000, 'PlayStation 2(PS2) adalah konsol video game kedua yang dikeluarkan oleh Sony setelah PlayStation 1. Pengembangannya diumumkan pada bulan diluncurkan ke pasar pertama kali pada tanggal 4 Maret 2000 di Jepang. Game yang ditawarkan juga banyak dari game konso');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `phone_number`, `role_id`) VALUES
(1, 'Kaleb', 'Juliu', 'kalebjuliu@gmail.com', '$2y$10$M1/5f6kAhjNokc2M2oLFJ.dP.FOo8IjqjLI6FHrbTjnoZ03XBmoIe', 'Jl. Kemayoran Barat 1 No. 22', '0811954477', 1),
(2, 'Ricky', 'Tandiono', 'rickytandiono@gmail.com', '$2y$10$M1/5f6kAhjNokc2M2oLFJ.dP.FOo8IjqjLI6FHrbTjnoZ03XBmoIe', 'Jl. Angkasa Raya No. 25', '0812345612', 0),
(3, 'Sergio', 'Nathaniel', 'sergion@gmail.com', '$2y$10$s7UMdyuqjNyavwb8Ha9mhOkYl1fbacRNRZiCA2rHOv8M3Bj4Rl0/6', 'Jl. Bumi Timur No. 80', '0811253575', 0),
(4, 'Maurice', 'Marvin', 'mauricem@gmail.com', '$2y$10$N0G7NpKau0OL9IunYMNjsuJiu7qiMmYk3TaY0ouYl6JtAkJ6e1uku', 'Jl. Abal Banget No. 666', '0811253578', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
