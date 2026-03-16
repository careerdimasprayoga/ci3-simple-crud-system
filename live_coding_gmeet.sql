-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 16 Mar 2026 pada 03.20
-- Versi server: 8.3.0
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `live_coding_gmeet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `id_category` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date_purchase` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `goods`
--

INSERT INTO `goods` (`id`, `name`, `id_category`, `price`, `date_purchase`, `created_at`, `updated_at`) VALUES
(5, 'Axio', 2, 25000000.00, '2026-03-01', '2026-03-13 11:47:51', NULL),
(4, 'Infinix Pro 10', 1, 15000000.00, '2026-03-04', '2026-03-13 11:47:36', NULL),
(8, 'Realme 13 pro+', 1, 32000000.00, '2026-03-26', '2026-03-16 09:38:33', NULL),
(9, 'Roller Rally v.2.3.1', 4, 500000.00, '2026-09-01', '2026-03-16 09:42:03', '2026-03-16 09:54:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods_categories`
--

DROP TABLE IF EXISTS `goods_categories`;
CREATE TABLE IF NOT EXISTS `goods_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `goods_categories`
--

INSERT INTO `goods_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone', 0, '2026-03-13 10:46:15', NULL),
(2, 'Notebook', 0, '2026-03-13 10:46:15', NULL),
(4, 'Roller', 0, '2026-03-16 09:41:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `password`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '', 'tenka@gmail.com', '', '$2y$10$Pftcn0HzBZVNPgZp3GASSuDb43cpNqvJs2X6AO6yy/NLi4ljTDST.', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '', 'admin', '', '$2y$10$.iyqaO630UZ8rstZCMxew.UD1jxoOs4q.FQBOj7yt5eZvkcaDavHS', 1, '2026-03-13 10:20:52', '2026-03-13 10:26:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
