-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 09:28 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `nama_penulis`, `jenis_kelamin`, `tanggal_lahir`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Mark Manson', 'Laki - laki', '1997-02-11', NULL, '2018-11-09 07:59:52', '2018-11-09 07:59:52'),
(2, 'J.k. Rowling', 'Perempuan', '1990-02-05', NULL, '2018-11-09 08:06:03', '2018-11-09 08:06:03'),
(3, 'Gita Savitri Devi', 'Perempuan', '2018-11-08', NULL, '2018-11-09 08:09:18', '2018-11-09 08:09:18'),
(4, 'Haruichi Furudate', 'Laki - laki', '2018-11-05', NULL, '2018-11-09 08:11:29', '2018-11-09 08:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) NOT NULL,
  `genre_id` int(10) NOT NULL,
  `nama_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `cover` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `author_id`, `genre_id`, `nama_buku`, `deskripsi`, `tahun_terbit`, `cover`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sebuah Seni untuk Bersikap Bodo Amat', '\"Selama beberapa tahun belakangan, Mark Manson—melalui blognya yang sangat populer—telah membantu mengoreksi harapan-harapan delusional kita', 2017, '9786024526986_Sebuah-Seni-Untuk-Bersikap-Bodo-Amat__w200_hauto.jpg', 0, '2018-11-09 08:01:31', '2018-11-09 08:01:31'),
(2, 2, 2, 'Harry Potter and The Cursed Child', 'Harry berjuang menghadapi masa lalu yang mengikutinya, putra bungsunya, Albus, harus berjuang menghadapi beban warisan keluarga yang tak pernah ia inginkan.', 2018, '9786020386201_Harry-Potter-__w200_hauto.jpg', 0, '2018-11-09 08:07:22', '2018-11-09 08:07:22'),
(3, 3, 3, 'Rentang Kisah', 'Rentang Kisah adalah buku kumpulan cerita yang ditulis berdasarkan pengalaman-pengalaman Gita Savitri menetap dan kuliah di Jerman', 2018, '9789797809034_9789797809034__w200_hauto.jpg', 0, '2018-11-09 08:10:15', '2018-11-09 08:10:15'),
(4, 4, 4, 'Haikyu!! - Fly High! Volleyball! 15', 'Tembok besi yang dibangun berulang kali!” Berkat usaha Ennoshita dan seluruh anggota tim, Karasuno berhasil mengalahkan Wakutani Minami,', 2016, '531860182_haikyu_15_COV_Ina__w200_hauto.jpg', 0, '2018-11-09 08:12:38', '2018-11-09 08:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `nama_genre`, `created_at`, `updated_at`) VALUES
(1, 'Education', '2018-11-09 08:00:21', '2018-11-09 08:00:21'),
(2, 'Novel', '2018-11-09 08:06:15', '2018-11-09 08:06:15'),
(3, 'Biografi', '2018-11-09 08:08:39', '2018-11-09 08:08:39'),
(4, 'Comic', '2018-11-09 08:11:14', '2018-11-09 08:11:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
