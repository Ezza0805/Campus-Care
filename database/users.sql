-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2026 pada 16.41
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
-- Database: `kampuscare_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identity_number` varchar(50) NOT NULL COMMENT 'NIM Mahasiswa / NIP Petugas & Admin',
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas','mahasiswa') NOT NULL DEFAULT 'mahasiswa',
  `phone` varchar(20) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL COMMENT 'Prodi untuk Mahasiswa / Divisi Spesialisasi untuk Petugas',
  `avatar` varchar(255) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `identity_number`, `name`, `email`, `password`, `role`, `phone`, `department`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
(1, '00000001', 'Admin Utama UPF', 'admin@terpadu.ac.id', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1f4...', 'admin', NULL, 'Unit Pengelola Fasilitas', NULL, 'aktif', '2026-10-20 13:50:19', '2026-10-20 13:50:19'),
(2, 'TK-012', 'Pak Joko Susilo', 'joko.teknisi@terpadu.ac.id', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1f4...', 'petugas', NULL, 'Divisi Elektrikal & HVAC', NULL, 'aktif', '2026-10-20 13:50:19', '2026-10-20 13:50:19'),
(3, '2108561042', 'Dimas Arya Pratama', 'dimas@student.terpadu.ac.id', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1f4...', 'mahasiswa', NULL, 'S1 Teknik Informatika', NULL, 'aktif', '2026-10-20 13:50:19', '2026-10-20 13:50:19'),
(4, '07352311077', 'Hazza Hafizh', 'hazzahafizh734@gmail.com', '$2y$10$qMszk7YoFMF8I9QsLkSrMO27RuBB1OsIkNzlh4iSnNmt8ZOcJfax.', 'mahasiswa', NULL, NULL, NULL, 'aktif', '2026-10-20 14:34:56', '2026-10-20 14:34:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identity_number` (`identity_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
