-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2026 pada 17.48
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
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'AC & Tata Udara', 'ac-tata-udara', 'Bocor, mati total, tidak dingin, bising', NULL, '2026-10-20 13:50:19', '2026-10-20 13:50:19'),
(2, 'Kelistrikan & Lampu', 'kelistrikan-lampu', 'Stopkontak rusak, lampu padam, sakelar', NULL, '2026-10-20 13:50:19', '2026-10-20 13:50:19'),
(3, 'Sanitasi & Pipa Air', 'sanitasi-pipa-air', 'Wastafel, toilet mampet, kran lepas', NULL, '2026-10-20 13:50:19', '2026-10-20 13:50:19'),
(4, 'Meja, Kursi & Perabot', 'meja-kursi-perabot', 'Kursi kuliah patah, meja goyang, podium', NULL, '2026-10-20 13:50:19', '2026-10-20 13:50:19'),
(5, 'WiFi, Lab & Komputer', 'wifi-lab-komputer', 'Access Point blank spot, kabel LAN, PC', NULL, '2026-10-20 13:50:19', '2026-10-20 13:50:19'),
(6, 'Pintu, Jendela & Fisik', 'pintu-jendela-fisik', 'Kunci macet, kaca retak, plafon bocor', NULL, '2026-10-20 13:50:19', '2026-10-20 13:50:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_code` varchar(50) NOT NULL COMMENT 'Contoh: KC-2025-0418',
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Mahasiswa Pelapor',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `campus_zone` varchar(100) NOT NULL,
  `building` varchar(100) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `room` varchar(100) NOT NULL,
  `urgency` enum('normal','mendesak','kritis') DEFAULT 'normal',
  `status` enum('PENDING','VERIFIED','ASSIGNED','IN_PROGRESS','COMPLETED','REJECTED') DEFAULT 'PENDING',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `complaint_assignments`
--

CREATE TABLE `complaint_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) UNSIGNED NOT NULL,
  `officer_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Petugas Teknis yang Ditugaskan',
  `assigned_by` bigint(20) UNSIGNED NOT NULL COMMENT 'Admin yang Menugaskan',
  `target_completion` datetime DEFAULT NULL COMMENT 'Target SLA Penanganan',
  `investigation_notes` text DEFAULT NULL COMMENT 'Catatan Investigasi Lapangan',
  `status` enum('assigned','in_progress','completed') DEFAULT 'assigned',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `complaint_logs`
--

CREATE TABLE `complaint_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Aktor Perubahan',
  `action` varchar(150) NOT NULL COMMENT 'Contoh: Verifikasi Laporan, Penugasan Teknisi',
  `status_from` varchar(50) DEFAULT NULL,
  `status_to` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `complaint_photos`
--

CREATE TABLE `complaint_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) UNSIGNED NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `type` enum('evidence','repair') DEFAULT 'evidence' COMMENT 'evidence: awal, repair: hasil perbaikan',
  `caption` varchar(255) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `complaint_reviews`
--

CREATE TABLE `complaint_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL CHECK (`rating` between 1 and 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asset_code` varchar(50) NOT NULL COMMENT 'Contoh: AST-FAS-2023-B302',
  `name` varchar(150) NOT NULL,
  `campus_zone` varchar(100) NOT NULL COMMENT 'Contoh: Kampus Bukit / Kampus Sudirman',
  `building` varchar(100) NOT NULL COMMENT 'Contoh: Gedung B',
  `floor` varchar(50) NOT NULL COMMENT 'Contoh: Lantai 3',
  `room` varchar(100) NOT NULL COMMENT 'Contoh: R.302',
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indeks untuk tabel `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_code` (`ticket_code`),
  ADD KEY `fk_complaints_user` (`user_id`),
  ADD KEY `fk_complaints_category` (`category_id`),
  ADD KEY `fk_complaints_facility` (`facility_id`);

--
-- Indeks untuk tabel `complaint_assignments`
--
ALTER TABLE `complaint_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_assign_complaint` (`complaint_id`),
  ADD KEY `fk_assign_officer` (`officer_id`),
  ADD KEY `fk_assign_admin` (`assigned_by`);

--
-- Indeks untuk tabel `complaint_logs`
--
ALTER TABLE `complaint_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_logs_complaint` (`complaint_id`),
  ADD KEY `fk_logs_user` (`user_id`);

--
-- Indeks untuk tabel `complaint_photos`
--
ALTER TABLE `complaint_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_photos_complaint` (`complaint_id`);

--
-- Indeks untuk tabel `complaint_reviews`
--
ALTER TABLE `complaint_reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `complaint_id` (`complaint_id`),
  ADD KEY `fk_reviews_user` (`user_id`);

--
-- Indeks untuk tabel `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asset_code` (`asset_code`);

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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `complaint_assignments`
--
ALTER TABLE `complaint_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `complaint_logs`
--
ALTER TABLE `complaint_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `complaint_photos`
--
ALTER TABLE `complaint_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `complaint_reviews`
--
ALTER TABLE `complaint_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `fk_complaints_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_complaints_facility` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_complaints_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `complaint_assignments`
--
ALTER TABLE `complaint_assignments`
  ADD CONSTRAINT `fk_assign_admin` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_assign_complaint` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_assign_officer` FOREIGN KEY (`officer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `complaint_logs`
--
ALTER TABLE `complaint_logs`
  ADD CONSTRAINT `fk_logs_complaint` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_logs_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `complaint_photos`
--
ALTER TABLE `complaint_photos`
  ADD CONSTRAINT `fk_photos_complaint` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `complaint_reviews`
--
ALTER TABLE `complaint_reviews`
  ADD CONSTRAINT `fk_reviews_complaint` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_reviews_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
