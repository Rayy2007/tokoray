-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2025 pada 07.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokoray`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Raynard', 'raynard', '202cb962ac59075b964b07152d234b70', '+6281375397962', 'raynardmarvellin123@gmail.com', 'Banda Aceh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(7, 'Handsfree'),
(8, 'Hp'),
(9, 'Laptop'),
(11, 'Sayur'),
(12, 'Buah'),
(14, 'Pakaian Pria'),
(15, 'Snack'),
(16, 'Minuman Botol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `date_created`) VALUES
(6, 7, 'HandsFree', 300000, 'For music.', 'produk1734065976.jfif', 1, '2024-12-13 05:02:18'),
(7, 9, 'Acer Nitro', 11000000, 'Laptop gaming', 'produk1734065912.jfif', 1, '2024-12-13 05:02:13'),
(9, 8, 'Iphone 14', 13000000, 'Hp elegant dan tinggi performa', 'produk1734065836.jfif', 1, '2024-12-13 04:57:32'),
(10, 12, 'Jeruk', 10000, 'Vitamin C', 'produk1734066364.jfif', 1, '2024-12-13 05:06:04'),
(12, 14, 'Kemeja pria', 175000, 'Simple dan Elegan.', 'produk1734065651.jfif', 1, '2024-12-13 04:54:11'),
(14, 15, 'Chiki', 12000, 'Enak dengan rasa Cocunut.', 'produk1734066427.jfif', 1, '2024-12-13 05:07:20'),
(18, 16, 'Fanta', 5000, 'Fanta nyegerin', 'produk1739052576.jpg', 1, '2025-02-08 22:09:36'),
(19, 16, 'Good Day', 5000, 'Hari bagus untuk mu', 'produk1739052699.jpg', 1, '2025-02-08 22:11:39'),
(20, 16, 'Aqua', 4000, 'Air putih', 'produk1739052747.jpg', 1, '2025-02-08 22:12:27'),
(21, 15, 'Choco Chips', 7000, '', 'produk1739052949.jpg', 1, '2025-02-08 22:15:49'),
(22, 15, 'Daddy Snack', 7000, '', 'produk1739053011.jpg', 1, '2025-02-08 22:16:51'),
(23, 15, 'Rengginang', 6000, '', 'produk1739053047.jpg', 1, '2025-02-08 22:17:27'),
(24, 16, 'Nu Choco Hazelnut', 8000, '', 'produk1739053229.jpg', 1, '2025-02-08 22:20:29'),
(25, 11, 'Tomat', 5000, '', 'produk1739054299.jpg', 1, '2025-02-08 22:38:19'),
(26, 11, 'Wortel', 8000, '', 'produk1739054263.jpg', 1, '2025-02-08 22:37:43'),
(27, 11, 'Paprika merah', 7000, '', 'produk1739054252.jpg', 1, '2025-02-08 22:37:32'),
(28, 11, 'Brokoli', 7000, '', 'produk1739054231.jpg', 1, '2025-02-08 22:37:11'),
(29, 14, 'Batik', 250000, '', 'produk1739054427.jpg', 1, '2025-02-08 22:40:38'),
(30, 14, 'Safari', 400000, '', 'produk1739054470.jpg', 1, '2025-02-08 22:42:05'),
(31, 14, 'Batik lengan panjang', 320000, '', 'produk1739054496.jpg', 1, '2025-02-08 22:41:59'),
(32, 9, 'Dell Inspiron 15 3521', 2000000, '', 'produk1739054797.jpg', 1, '2025-02-08 22:47:17'),
(33, 9, 'Lenovo IdeaPad 3', 2400000, '', 'produk1739054830.jpg', 1, '2025-02-08 22:47:10'),
(34, 9, 'HP Pavilion 15-cd023na', 4000000, '', 'produk1739054877.jpg', 1, '2025-02-08 22:47:57'),
(35, 8, 'Samsung Galaxy S25 Ultra', 24000000, '', 'produk1739055048.jpg', 1, '2025-02-08 22:50:48'),
(36, 8, 'Apple iPhone 16 Pro Max', 23000000, '', 'produk1739055085.jpg', 1, '2025-02-08 22:51:25'),
(37, 8, 'Huawei Mate 50 Pro', 18000000, '', 'produk1739055110.jpg', 1, '2025-02-08 22:51:50'),
(38, 7, 'Sony WF-1000XM4', 240000, '', 'produk1739055214.jpg', 1, '2025-02-08 22:53:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
