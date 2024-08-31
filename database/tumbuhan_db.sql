-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 04:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tumbuhan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tumbuhan`
--

CREATE TABLE `tumbuhan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_ilmiah` varchar(255) NOT NULL,
  `nama_umum` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `habitat` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tumbuhan`
--

INSERT INTO `tumbuhan` (`id`, `nama_ilmiah`, `nama_umum`, `deskripsi`, `foto`, `habitat`, `qr_code`, `created_at`, `updated_at`) VALUES
(1, 'Ficus elastica', 'Rubber Plant', 'A popular indoor plant known for its broad leaves edit qr.', 'rubber_plant.jpg', 'Tropical regions, often found indoors.', 'rubber_plant_qrcode.png', '2024-08-26 12:21:58', '2024-08-30 06:45:45'),
(2, 'Monstera deliciosa', 'Swiss Cheese Plant', 'Notable for its large, perforated leaves edit qr.', 'swiss_cheese_plant.jpg', 'Tropical rainforests, often grown as a houseplant.', 'swiss_cheese_plant_qrcode.png', '2024-08-26 12:21:58', '2024-08-30 06:46:18'),
(3, 'Dracaena trifasciata', 'Snake Plant', 'An easy-care plant with upright leaves edit qr.', 'snake_plant.jpg', 'West Africa, often used as an indoor plant.', 'snake_plant_qrcode.png', '2024-08-26 12:21:58', '2024-08-30 06:46:31'),
(4, 'Mangifera indica', 'Pohon Mangga', 'Pohon yang menghasilkan buah mangga.', 'mangga.jpg', 'Tropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(5, 'Rosa', 'Bunga Mawar', 'Bunga dengan berbagai warna yang harum.', 'mawar.jpg', 'Subtropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(6, 'Cocos nucifera', 'Pohon Kelapa', 'Pohon dengan buah kelapa dan daunnya berguna.', 'kelapa.jpg', 'Pantai', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(7, 'Dendrobium anosmum', 'Sangkareang', 'Bunga anggrek dengan aroma harum.', 'sangkareang.jpg', 'Hutan', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(8, 'Bambusoideae', 'Bambu', 'Tumbuhan berkayu dengan batang berongga.', 'bambu.jpg', 'Tropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(9, 'Cactaceae', 'Kaktus', 'Tanaman berduri yang menyimpan air.', 'kaktus.jpg', 'Gurun', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(10, 'Orchidaceae', 'Anggrek', 'Bunga eksotis dengan berbagai bentuk.', 'anggrek.jpg', 'Hutan', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(11, 'Jasminum', 'Jasmine', 'Bunga kecil yang harum dan berwarna putih.', 'jasmine.jpg', 'Subtropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(12, 'Nymphaea', 'Teratai', 'Bunga air yang mengapung di permukaan air.', 'teratai.jpg', 'Kolam', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(13, 'Malus domestica', 'Pohon Apel', 'Pohon dengan buah apel yang segar.', 'apel.jpg', 'Subtropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(14, 'Helianthus annuus', 'Bunga Matahari', 'Bunga besar yang mengikuti arah matahari.', 'matahari.jpg', 'Tropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(15, 'Durio', 'Pohon Durian', 'Pohon dengan buah berduri yang khas.', 'durian.jpg', 'Tropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(16, 'Moringa oleifera', 'Kelor', 'Pohon dengan daun yang kaya nutrisi.', 'kelor.jpg', 'Tropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(17, 'Prunus avium', 'Pohon Ceri', 'Pohon dengan buah ceri merah.', 'ceri.jpg', 'Subtropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(18, 'Lilium', 'Bunga Lili', 'Bunga besar dengan aroma yang menyenangkan.', 'lili.jpg', 'Tropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(19, 'Dendrocalamus asper', 'Bambu Betung', 'Bambu besar yang digunakan untuk berbagai keperluan.', 'bambu_betung.jpg', 'Tropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(20, 'Curcuma longa', 'Kunyit', 'Tanaman rimpang dengan warna kuning dan khasiat obat.', 'kunyit.jpg', 'Tropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(21, 'Citrus sinensis', 'Pohon Jeruk', 'Pohon dengan buah jeruk yang manis.', 'jeruk.jpg', 'Subtropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(22, 'Bougainvillea', 'Bunga Bougainvillea', 'Bunga dengan warna cerah yang menggantung.', 'bougainvillea.jpg', 'Subtropis', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(23, 'Pinus', 'Pohon Pinus', 'Pohon dengan daun jarum dan biji pinus.', 'pinus.jpg', 'Pegunungan', '', '2024-08-29 07:00:23', '2024-08-29 07:00:23'),
(26, 'Nama Ilmiah Create ', 'Nama Umum Create ', 'Deskripsi Create ', 'nama_umum_create_.jpeg', 'Habitat Create ', '', '2024-08-29 09:53:11', '2024-08-29 09:53:11'),
(27, 'Update ', 'testy', 'Update ', 'testy.jpg', ' edit', 'testy_qrcode.png', '2024-08-29 09:56:22', '2024-08-29 10:52:00'),
(28, 'foto edit', 'apa', 'foto edit', 'apa.jpg', 'foto edit tes', 'apa_qrcode.png', '2024-08-29 10:17:24', '2024-08-29 10:53:04'),
(29, 'create', 'create', 'create', 'create.jpg', 'create', 'create_qrcode.png', '2024-08-29 10:55:23', '2024-08-29 10:55:23'),
(30, 'Finally Nama Ilmiah Edit', 'Finally Nama Umum Edit', 'Finally Deskripsi Edit', 'finally_nama_umum_edit.jpg', 'Finally Habitat Edit', 'finally_nama_umum_edit_qrcode.png', '2024-08-30 06:42:56', '2024-08-30 06:43:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tumbuhan`
--
ALTER TABLE `tumbuhan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tumbuhan`
--
ALTER TABLE `tumbuhan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
