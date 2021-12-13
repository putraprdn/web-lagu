-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2021 pada 07.50
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lagu_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(100) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`, `deleted_at`) VALUES
(1, 'Pop', NULL),
(2, 'EDM', NULL),
(3, 'Hip Hop', NULL),
(4, 'Jazz', NULL),
(5, 'RnB', NULL),
(6, 'Tes', '2021-12-07 15:38:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `nm_modul` varchar(255) NOT NULL,
  `judul_modul` varchar(255) NOT NULL,
  `icon_modul` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `nm_modul`, `judul_modul`, `icon_modul`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'genre_list', 'Genre Musik', 'library_music', NULL, '2021-12-07 16:58:34', '2021-12-07 16:58:34'),
(2, 'musik_list', 'List Musik', 'audiotrack', NULL, '2021-12-08 06:27:47', '2021-12-08 06:27:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul_role`
--

CREATE TABLE `modul_role` (
  `id_modul` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_create` tinyint(4) NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `is_update` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `is_save` tinyint(4) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `modul_role`
--

INSERT INTO `modul_role` (`id_modul`, `id_role`, `is_create`, `is_read`, `is_update`, `is_delete`, `is_save`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, NULL, '2021-12-08 05:47:48', '2021-12-08 05:47:48'),
(1, 2, 1, 1, 1, 0, 1, NULL, '2021-12-08 05:48:52', '2021-12-08 05:48:52'),
(2, 1, 1, 1, 1, 1, 1, NULL, '2021-12-08 00:32:03', '2021-12-08 00:32:03'),
(2, 2, 0, 1, 0, 0, 1, NULL, '2021-12-11 09:09:06', '2021-12-11 09:09:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `musik`
--

CREATE TABLE `musik` (
  `id_musik` int(11) NOT NULL,
  `judul_musik` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `artist` text NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `musik`
--

INSERT INTO `musik` (`id_musik`, `judul_musik`, `tahun`, `artist`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Heather', 2020, 'Conan Gray', NULL, '2021-12-12 04:06:52', '2021-12-13 05:30:46'),
(2, 'At My Worst', 2021, 'Pink Sweat$', NULL, '2021-12-12 04:21:04', '2021-12-12 04:21:04'),
(3, 'Heartbreak Anniversary', 2020, 'Giveon', NULL, '2021-12-12 04:21:58', '2021-12-12 04:21:58'),
(4, 'Eyes Blue Like The Atlantic', 2019, 'Sista Prod', NULL, '2021-12-12 04:23:12', '2021-12-12 04:23:12'),
(5, 'DANCING IN MY ROOM', 2020, '347aidan', NULL, '2021-12-12 04:24:07', '2021-12-12 04:24:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `musik_genre`
--

CREATE TABLE `musik_genre` (
  `id_musik` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `musik_genre`
--

INSERT INTO `musik_genre` (`id_musik`, `id_genre`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2021-12-13 10:53:50', '2021-12-12 08:24:45'),
(1, 5, NULL, '2021-12-12 04:06:52', '2021-12-12 08:23:11'),
(2, 1, NULL, '2021-12-12 04:21:04', '2021-12-12 04:21:04'),
(2, 5, NULL, '2021-12-12 04:21:04', '2021-12-12 04:21:04'),
(3, 1, NULL, '2021-12-12 04:21:58', '2021-12-12 04:21:58'),
(4, 1, NULL, '2021-12-12 04:23:12', '2021-12-12 04:23:12'),
(4, 5, NULL, '2021-12-12 04:23:12', '2021-12-12 04:23:12'),
(5, 5, NULL, '2021-12-12 04:24:07', '2021-12-12 04:24:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nm_role` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `user_username`, `user_password`, `id_role`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, '2021-12-06 23:37:46', '2021-12-06 23:37:46'),
(2, 'Operator', 'operator', '827ccb0eea8a706c4c34a16891f84e7b', 2, NULL, '2021-12-06 23:37:46', '2021-12-06 23:37:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indeks untuk tabel `modul_role`
--
ALTER TABLE `modul_role`
  ADD PRIMARY KEY (`id_modul`,`id_role`);

--
-- Indeks untuk tabel `musik`
--
ALTER TABLE `musik`
  ADD PRIMARY KEY (`id_musik`);

--
-- Indeks untuk tabel `musik_genre`
--
ALTER TABLE `musik_genre`
  ADD PRIMARY KEY (`id_musik`,`id_genre`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `musik`
--
ALTER TABLE `musik`
  MODIFY `id_musik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
