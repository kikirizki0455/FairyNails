-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2025 pada 13.52
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin-lapor`
--
CREATE DATABASE IF NOT EXISTS `admin-lapor` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `admin-lapor`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_01_052611_create_residents_table', 1),
(5, '2025_02_01_053223_create_report_categories_table', 1),
(6, '2025_02_01_053551_create_reports_table', 1),
(7, '2025_02_01_054439_create_report_statuses_table', 1),
(8, '2025_02_01_060254_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard-view', 'web', '2025-02-01 00:19:51', '2025-02-01 00:19:51'),
(2, 'user-view', 'web', '2025-02-01 00:19:51', '2025-02-01 00:19:51'),
(3, 'user-create', 'web', '2025-02-01 00:19:51', '2025-02-01 00:19:51'),
(4, 'user-edit', 'web', '2025-02-01 00:19:51', '2025-02-01 00:19:51'),
(5, 'user-delete', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(6, 'resident-view', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(7, 'resident-create', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(8, 'resident-edit', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(9, 'resident-delete', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(10, 'report-category-view', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(11, 'report-category-create', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(12, 'report-category-edit', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(13, 'report-category-delete', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(14, 'report-view', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(15, 'report-create', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(16, 'report-edit', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(17, 'report-delete', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(18, 'report-status-view', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(19, 'report-status-create', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(20, 'report-status-edit', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(21, 'report-status-delete', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `resident_id` bigint(20) UNSIGNED NOT NULL,
  `report_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_categories`
--

CREATE TABLE `report_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_statuses`
--

CREATE TABLE `report_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('delivered','in_process','completed','rejected') NOT NULL,
  `description` longtext NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `residents`
--

CREATE TABLE `residents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-02-01 00:19:52', '2025-02-01 00:19:52'),
(2, 'resident', 'web', '2025-02-01 00:19:53', '2025-02-01 00:19:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(20, 1),
(21, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('daYc3tkU8KwsH3vr69wTZ9xUQczJouh0WTCOUcma', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGpqUzVtN2ZjQ1pNVktrSFJqVWxXdzhxcEl4aDh3dmFJVFJwNGtUWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738413100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-01-31 22:58:34', '$2y$12$96CxI7JNkpsOPjXOzajD7.BNGiTcVtUruJ7QGFvvQyvCLwb8V58TG', NULL, 'kJsfdvLOwz', '2025-01-31 22:58:34', '2025-01-31 22:58:34'),
(2, 'Admin', 'admin@lapor.com', NULL, '$2y$12$3C4o0w/SC1DB5Psv5.7r1eabw2g8iG3AmMLTBkc3k73r5XODBu0Va', NULL, NULL, '2025-02-01 00:19:54', '2025-02-01 00:19:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reports_code_unique` (`code`);

--
-- Indeks untuk tabel `report_categories`
--
ALTER TABLE `report_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report_statuses`
--
ALTER TABLE `report_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `report_categories`
--
ALTER TABLE `report_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `report_statuses`
--
ALTER TABLE `report_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `residents`
--
ALTER TABLE `residents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
--
-- Database: `dustira`
--
CREATE DATABASE IF NOT EXISTS `dustira` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dustira`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` smallint(6) UNSIGNED NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `stok_bahan` smallint(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `stok_bahan`) VALUES
(2, 'ditergen liquid', 19),
(4, 'penetral', 42),
(5, 'concenrated oxygen bleach', 42),
(6, 'karbol sere', 50),
(9, 'soklin', 0),
(16, 'Detol', 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(5) UNSIGNED NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(5) UNSIGNED NOT NULL,
  `stok_dicuci` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `stok_dicuci`) VALUES
(32, 'S Bantal', 100, 11),
(33, 'Laken', 100, 0),
(34, 'Selimut', 200, 0),
(35, 'Sprei', 100, 0),
(36, 'Bedcover', 100, 36),
(37, 'Gorden', 44, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pelipatan`
--

CREATE TABLE `detail_pelipatan` (
  `id_detail_pelipatan` int(5) UNSIGNED NOT NULL,
  `id_pelipatan` int(5) UNSIGNED NOT NULL,
  `id_barang` int(5) UNSIGNED NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pelipatan`
--

INSERT INTO `detail_pelipatan` (`id_detail_pelipatan`, `id_pelipatan`, `id_barang`, `jumlah_barang`, `status`, `created_at`, `updated_at`) VALUES
(128, 74, 32, 1, '', '2024-12-06 21:11:51', '2024-12-07 00:10:10'),
(129, 74, 33, 2, '', '2024-12-06 21:13:49', '2024-12-07 00:10:10'),
(132, 74, 35, 1, '', '2024-12-06 21:39:00', '2024-12-07 00:10:10'),
(133, 76, 32, 1, '', '2024-12-07 00:11:02', '2024-12-07 00:53:13'),
(134, 77, 36, 2, '', '2024-12-07 00:39:49', '2024-12-07 04:49:08'),
(135, 78, 36, 1, '', '2024-12-07 04:50:28', '2024-12-07 04:50:45'),
(136, 79, 32, 2, '', '2024-12-07 05:05:36', '2024-12-07 05:05:40'),
(137, 80, 32, 2, '', '2024-12-08 05:45:51', '2024-12-08 05:46:03'),
(138, 80, 34, 2, '', '2024-12-08 05:45:55', '2024-12-08 05:46:03'),
(139, 80, 36, 2, '', '2024-12-08 05:45:58', '2024-12-08 05:46:03'),
(140, 81, 36, 1, '', '2024-12-08 06:39:29', '2024-12-08 06:39:32'),
(141, 83, 36, 2, '', '2024-12-09 01:01:50', '2024-12-09 01:02:12'),
(142, 83, 33, 20, '', '2024-12-09 01:01:56', '2024-12-09 01:02:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesin`
--

CREATE TABLE `mesin` (
  `id_mesin` int(11) UNSIGNED NOT NULL,
  `nama_mesin` varchar(100) NOT NULL,
  `status_mesin` enum('aktif','nonaktif','maintenance') NOT NULL DEFAULT 'aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesin_bahan`
--

CREATE TABLE `mesin_bahan` (
  `id` int(5) NOT NULL,
  `id_mesin` int(5) NOT NULL,
  `id_bahan` smallint(6) UNSIGNED NOT NULL,
  `jumlah_bahan` smallint(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mesin_bahan`
--

INSERT INTO `mesin_bahan` (`id`, `id_mesin`, `id_bahan`, `jumlah_bahan`) VALUES
(1, 13, 2, 12),
(2, 13, 4, 12),
(3, 13, 5, 12),
(4, 14, 2, 12),
(5, 14, 4, 12),
(6, 14, 5, 12),
(15, 14, 9, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesin_cuci`
--

CREATE TABLE `mesin_cuci` (
  `id_mesin` int(5) NOT NULL,
  `nama_mesin` varchar(255) NOT NULL,
  `kapasitas` smallint(6) NOT NULL,
  `status` enum('aktif','tidak_aktif') NOT NULL,
  `kategori` enum('infeksi','non_infeksi') NOT NULL,
  `id_bahan` smallint(6) UNSIGNED DEFAULT NULL,
  `jumlah_bahan` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mesin_cuci`
--

INSERT INTO `mesin_cuci` (`id_mesin`, `nama_mesin`, `kapasitas`, `status`, `kategori`, `id_bahan`, `jumlah_bahan`, `created_at`, `updated_at`) VALUES
(13, 'Mesin Infeksi 1.A', 30, 'aktif', 'infeksi', NULL, NULL, NULL, NULL),
(14, 'Mesin Non Infeksi B1', 30, 'aktif', 'non_infeksi', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-08-22-165656', 'App\\Database\\Migrations\\CreateTablesBahan', 'default', 'App', 1725212787, 1),
(2, '2024-08-22-165656', 'App\\Database\\Migrations\\CreateTablesbahan', 'default', 'App', 1725212876, 2),
(3, '2024-08-22-165656', 'App\\Database\\Migrations\\CreateTablesTimbangan', 'default', 'App', 1725212933, 3),
(4, '2024-08-22-165656', 'App\\Database\\Migrations\\CreateTablesPegawai', 'default', 'App', 1725213047, 4),
(5, '2024-08-22-165656', 'App\\Database\\Migrations\\CreateTablesPencucian', 'default', 'App', 1725213097, 5),
(6, '2024-08-22-165656', 'App\\Database\\Migrations\\UpdatePencucianTable', 'default', 'App', 1725346871, 6),
(7, '2024-08-22-165656', 'App\\Database\\Migrations\\UpdatePencucian1Table', 'default', 'App', 1725347673, 7),
(8, '2024-08-22-165656', 'App\\Database\\Migrations\\UpdatePencucianStatusTable', 'default', 'App', 1725347732, 8),
(9, '2024-08-22-165656', 'App\\Database\\Migrations\\RemoveStatusColumnFromPencucian', 'default', 'App', 1725347847, 9),
(10, '2024-08-22-165656', 'App\\Database\\Migrations\\UpdateTablePencucian', 'default', 'App', 1725348030, 10),
(15, '2024-08-22-165656', 'App\\Database\\Migrations\\AddForeignKeyToPencucian', 'default', 'App', 1725379167, 11),
(16, '2024-08-22-165656', 'App\\Database\\Migrations\\DropTablePencucian', 'default', 'App', 1725380414, 12),
(18, '2024-08-22-165656', 'App\\Database\\Migrations\\UpadateStatusTablePencucian', 'default', 'App', 1725380886, 13),
(19, '2024-08-22-165656', 'App\\Database\\Migrations\\AddStatusTablePencucian', 'default', 'App', 1725380951, 14),
(20, '2024-08-22-165656', 'App\\Database\\Migrations\\AddBeratBarangTablePencucian', 'default', 'App', 1725381594, 15),
(21, '2024-08-22-165656', 'App\\Database\\Migrations\\AddBeratBarang2TablePencucian', 'default', 'App', 1725381742, 16),
(22, '2024-08-22-165656', 'App\\Database\\Migrations\\AddBeratBarang3TablePencucian', 'default', 'App', 1725381766, 17),
(23, '2024-08-22-165656', 'App\\Database\\Migrations\\AddNamaBarangTablePencucian', 'default', 'App', 1725382097, 18),
(24, '2024-08-22-165656', 'App\\Database\\Migrations\\AddWaktuEstimasiToPencucian', 'default', 'App', 1726640707, 19),
(25, '2024-08-22-165656', 'App\\Database\\Migrations\\CreateTableRusak', 'default', 'App', 1726650641, 20),
(26, '2024-08-22-165656', 'App\\Database\\Migrations\\addKategoriTimbangan', 'default', 'App', 1726652756, 21),
(27, '2024-08-22-165656', 'App\\Database\\Migrations\\RemoveStatusPencucianFromTimbangan', 'default', 'App', 1726653310, 22),
(28, '2024-08-22-165656', 'App\\Database\\Migrations\\AddStatusPencucianToTimbangan', 'default', 'App', 1726653419, 23),
(29, '2024-08-22-165656', 'App\\Database\\Migrations\\CreatePengeringanTable', 'default', 'App', 1726673225, 24),
(30, '2024-09-19-072234', 'App\\Database\\Migrations\\UbahIdPencucian', 'default', 'App', 1726731102, 25),
(31, '2024-09-19-074603', 'App\\Database\\Migrations\\DropIdBahanTablePengeringan', 'default', 'App', 1726732107, 26),
(32, '2024-09-19-074603', 'App\\Database\\Migrations\\RemoveIdBahanPengeringan', 'default', 'App', 1726732447, 27),
(33, '2024-09-19-074603', 'App\\Database\\Migrations\\addDurasiTablePengeringan', 'default', 'App', 1726740100, 28),
(34, '2024-09-19-104528', 'App\\Database\\Migrations\\AddWaktuColumnToPengeringan', 'default', 'App', 1726742746, 29),
(35, '2024-09-19-104528', 'App\\Database\\Migrations\\EditColumnStatusPengeringan', 'default', 'App', 1726744143, 30),
(36, '2024-09-19-104528', 'App\\Database\\Migrations\\UpdatePengeringanTimer', 'default', 'App', 1726763483, 31),
(37, '2024-09-19-134042', 'App\\Database\\Migrations\\CreateTablePenyetrikaan', 'default', 'App', 1726763483, 31),
(39, '2024-09-19-134042', 'App\\Database\\Migrations\\CreatePenyetrikaanTable', 'default', 'App', 1726764965, 32),
(40, '2024-09-19-134042', 'App\\Database\\Migrations\\DropBahanTablePenyetrikaan', 'default', 'App', 1726767353, 33),
(41, '2024-09-19-134042', 'App\\Database\\Migrations\\DropIDBahanTablePenyetrikaan', 'default', 'App', 1726767445, 34),
(50, '2024-10-14-204416', 'App\\Database\\Migrations\\CreateTableMesinCuci', 'default', 'App', 1728990417, 35),
(51, '2024-10-15-095640', 'App\\Database\\Migrations\\AddColumnNoInvoice', 'default', 'App', 1728990417, 35),
(52, '2024-10-15-101350', 'App\\Database\\Migrations\\AddIdBarangAsForeignKeyToTimbangan', 'default', 'App', 1728990417, 35),
(53, '2024-10-15-103255', 'App\\Database\\Migrations\\UpdateTimbanganTable', 'default', 'App', 1728990417, 35),
(54, '2024-10-15-111011', 'App\\Database\\Migrations\\AddForeignKeyToTimbangan', 'default', 'App', 1728990701, 36),
(55, '2024-10-15-111115', 'App\\Database\\Migrations\\RemoveIdBarangFromTimbangan', 'default', 'App', 1728990701, 36),
(56, '2024-10-15-111011', 'App\\Database\\Migrations\\AddIdBarangAsForeign', 'default', 'App', 1728991033, 37),
(57, '2024-10-15-111011', 'App\\Database\\Migrations\\AddIDBarangAsForeign', 'default', 'App', 1728992300, 38),
(58, '2024-10-15-111011', 'App\\Database\\Migrations\\AddToTimbanganIDBarangAsForeign', 'default', 'App', 1728992854, 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(5) UNSIGNED NOT NULL,
  `nomor_pegawai` varchar(100) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `role_pegawai` enum('administrator','admin','distribusi','pengelola') NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nomor_pegawai`, `nama_pegawai`, `role_pegawai`, `username`, `password`) VALUES
(11, '123100001', 'apow', 'pengelola', 'dustira', '$2y$10$DuojJ0tqszDP5gUMym7xcebLDCQZwxmcNXBO1kQ2DuXdvSULXyoZG'),
(12, '001', 'rizki', 'admin', 'admin', '$2y$10$X06ryWlq2o3ZwlpVezARV.WjVExqJVl1PWJIbQLIh0gleFiltJSsO'),
(13, '0021231', 'akmal', 'distribusi', 'akmal1', '$2y$10$5HapVRHtYzEPrLURnbvfye3SRmX7vf0F4ol4h9j8fO/h42G9YhsF6'),
(14, '11231', 'asd', 'pengelola', '123', '$2y$10$hFifnbK8uQtxHK8Ht8lF.ukWIWVz00vupFnqalKJkwdqt/wF7M40C'),
(15, '123005876124', 'Mang Toto', 'distribusi', 'toto', '$2y$10$XFPavgq7/HfZK6Fh9DUIGOz2D/fTM1AVfflhT0vyK/41ObrmdE7Dq'),
(16, '123123', 'rizki', 'admin', 'kikirizki', '$2y$10$6GT/QOgRMOvsTdc3Fr.3EOphfRLXKo.Eq9EVvTXZ2kXp5AXsKc.t2'),
(19, 'ADMIN001', 'Super Administrator', 'administrator', 'administrator', '$2y$10$2PWnexM4R4Ps0vvEa7b2FuR/zoLpTjwY3zaUOHq4jXP4IN.lFs6Cm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelipatan`
--

CREATE TABLE `pelipatan` (
  `id_pelipatan` int(5) UNSIGNED NOT NULL,
  `id_penyetrikaan` int(5) UNSIGNED NOT NULL,
  `status` enum('pending','in_progress','ready_move','completed') NOT NULL DEFAULT 'pending',
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelipatan`
--

INSERT INTO `pelipatan` (`id_pelipatan`, `id_penyetrikaan`, `status`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
(74, 86, 'completed', '2024-12-06 06:26:12', '2024-12-07 00:10:10', '2024-12-06 06:05:18', '2024-12-07 00:40:20'),
(76, 87, 'completed', '2024-12-06 06:26:44', '2024-12-07 00:53:13', '2024-12-06 06:15:07', '2024-12-07 02:02:11'),
(77, 88, 'completed', '2024-12-06 07:42:47', '2024-12-07 04:49:07', '2024-12-06 06:16:31', '2024-12-07 04:49:11'),
(78, 89, 'completed', '2024-12-07 04:50:11', '2024-12-07 04:50:45', '2024-12-06 06:16:39', '2024-12-07 04:50:48'),
(79, 90, 'completed', '2024-12-07 05:05:31', '2024-12-07 05:05:40', '2024-12-07 05:05:22', '2024-12-07 05:37:04'),
(80, 91, 'completed', '2024-12-08 05:45:42', '2024-12-08 05:46:03', '2024-12-07 05:05:26', '2024-12-08 05:46:05'),
(81, 92, 'completed', '2024-12-08 06:39:21', '2024-12-08 06:39:32', '2024-12-08 06:39:16', '2024-12-08 06:39:34'),
(82, 93, 'pending', '2024-12-08 06:41:04', NULL, '2024-12-08 06:41:04', '2024-12-08 06:41:04'),
(83, 95, 'completed', '2024-12-09 01:01:17', '2024-12-09 01:02:12', '2024-12-09 01:01:09', '2024-12-09 01:02:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencucian`
--

CREATE TABLE `pencucian` (
  `id_cuci` int(5) UNSIGNED NOT NULL,
  `id_timbangan` int(5) UNSIGNED NOT NULL,
  `id_bahan` smallint(6) UNSIGNED DEFAULT NULL,
  `id_barang` int(5) UNSIGNED DEFAULT NULL,
  `id_mesin` int(5) DEFAULT NULL,
  `berat_barang` decimal(8,2) NOT NULL,
  `jumlah_bahan` int(3) NOT NULL,
  `status` enum('pending','in_progress','completed') NOT NULL,
  `pencucian_status` enum('pending','in_progress','ready_move','completed') NOT NULL,
  `tanggal_mulai` timestamp NULL DEFAULT NULL,
  `tanggal_selesai` timestamp NULL DEFAULT NULL,
  `waktu_estimasi` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pencucian`
--

INSERT INTO `pencucian` (`id_cuci`, `id_timbangan`, `id_bahan`, `id_barang`, `id_mesin`, `berat_barang`, `jumlah_bahan`, `status`, `pencucian_status`, `tanggal_mulai`, `tanggal_selesai`, `waktu_estimasi`) VALUES
(258, 327, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 20:43:19', '2024-12-05 20:43:20', NULL),
(259, 328, NULL, NULL, 13, 2.00, 0, 'in_progress', 'completed', '2024-12-05 21:35:09', '2024-12-05 21:35:16', NULL),
(260, 329, NULL, NULL, 13, 3.00, 0, 'in_progress', 'completed', '2024-12-05 21:35:11', '2024-12-05 21:35:19', NULL),
(261, 330, NULL, NULL, 13, 2.00, 0, 'in_progress', 'completed', '2024-12-05 21:35:22', '2024-12-05 21:35:23', NULL),
(262, 331, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 21:35:27', '2024-12-05 21:35:28', NULL),
(263, 332, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 21:35:32', '2024-12-05 21:35:33', NULL),
(264, 333, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 21:35:37', '2024-12-05 21:35:38', NULL),
(265, 334, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 21:35:42', '2024-12-05 21:35:43', NULL),
(266, 335, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 21:35:47', '2024-12-05 21:35:48', NULL),
(267, 336, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 21:35:51', '2024-12-05 21:35:53', NULL),
(268, 337, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 21:35:58', '2024-12-05 21:36:01', NULL),
(269, 338, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 21:36:06', '2024-12-05 21:36:09', NULL),
(270, 339, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 21:36:14', '2024-12-05 21:36:16', NULL),
(271, 340, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 21:36:23', '2024-12-05 21:36:28', NULL),
(272, 341, NULL, NULL, 13, 1.00, 0, 'in_progress', 'completed', '2024-12-05 21:36:37', '2024-12-05 21:36:40', NULL),
(273, 344, NULL, NULL, 13, 3.00, 0, 'in_progress', 'completed', '2024-12-08 17:59:34', '2024-12-08 17:59:37', NULL),
(274, 345, NULL, NULL, 14, 1.00, 0, 'in_progress', 'completed', '2024-12-08 17:59:43', '2024-12-08 17:59:47', NULL),
(275, 346, NULL, NULL, 13, 23.00, 0, 'in_progress', 'completed', '2024-12-08 17:59:52', '2024-12-08 17:59:54', NULL),
(276, 347, NULL, NULL, 13, 23.00, 0, 'in_progress', 'completed', '2024-12-08 18:00:00', '2024-12-08 18:00:02', NULL),
(277, 348, NULL, NULL, 14, 2.00, 0, 'in_progress', 'pending', '2025-01-03 23:56:07', NULL, NULL),
(281, 350, NULL, NULL, 13, 1.00, 0, 'in_progress', 'pending', '2025-01-22 21:14:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelolaan`
--

CREATE TABLE `pengelolaan` (
  `id_pengelolaan` int(5) UNSIGNED NOT NULL,
  `id_timbangan` int(5) UNSIGNED NOT NULL,
  `id_ruangan` int(5) UNSIGNED DEFAULT NULL,
  `berat_barang` decimal(8,2) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `status` enum('pending','pencucian','pengeringan','penyetrikaan','pelipatan') NOT NULL DEFAULT 'pending',
  `id_barang` int(5) UNSIGNED NOT NULL,
  `id_pegawai` int(5) UNSIGNED NOT NULL,
  `id_mesin` int(5) UNSIGNED DEFAULT NULL,
  `tgl_terima` datetime NOT NULL,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengelolaan`
--

INSERT INTO `pengelolaan` (`id_pengelolaan`, `id_timbangan`, `id_ruangan`, `berat_barang`, `no_invoice`, `status`, `id_barang`, `id_pegawai`, `id_mesin`, `tgl_terima`, `waktu_mulai`, `waktu_selesai`, `catatan`, `created_at`, `updated_at`) VALUES
(3, 352, NULL, 1.00, 'KLA2301202513353', 'pelipatan', 0, 14, NULL, '2025-01-23 21:36:32', '2025-01-24 04:21:21', '2025-01-24 04:21:21', 'Data dari timbangan kotor ID: 352', '2025-01-23 21:36:32', '2025-01-24 04:21:21'),
(4, 354, 37, 1.00, 'HAO2401202574355', 'pelipatan', 0, 14, NULL, '2025-01-24 03:09:24', '2025-01-24 04:23:38', '2025-01-24 04:23:38', 'Data dari timbangan kotor ID: 354', '2025-01-24 03:09:24', '2025-01-24 04:23:38'),
(6, 355, 35, 3.00, 'HPW2401202553356', 'pelipatan', 0, 11, NULL, '2025-01-24 03:33:32', '2025-01-24 04:17:04', '2025-01-24 04:17:04', 'Data dari timbangan kotor ID: 355', '2025-01-24 03:33:32', '2025-01-24 04:17:04'),
(7, 356, 35, 1.00, 'RGF2401202553357', 'pelipatan', 0, 14, NULL, '2025-01-24 04:11:12', '2025-01-24 04:25:15', '2025-01-24 04:25:15', 'Data dari timbangan kotor ID: 356', '2025-01-24 04:11:12', '2025-01-24 04:25:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeringan`
--

CREATE TABLE `pengeringan` (
  `id_pengeringan` int(5) UNSIGNED NOT NULL,
  `id_cuci` int(5) UNSIGNED DEFAULT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `status` enum('pending','in_progress','ready_move','completed') DEFAULT 'in_progress',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengeringan`
--

INSERT INTO `pengeringan` (`id_pengeringan`, `id_cuci`, `tanggal_mulai`, `tanggal_selesai`, `status`, `created_at`, `updated_at`) VALUES
(203, 258, '2024-12-06 04:08:56', '2024-12-06 04:09:04', 'completed', '2024-12-06 03:50:22', '2024-12-06 04:15:17'),
(204, 259, '2024-12-06 06:05:03', '2024-12-06 06:05:06', 'completed', '2024-12-06 04:35:18', '2024-12-06 06:05:08'),
(205, 260, '2024-12-06 06:15:25', '2024-12-06 06:15:27', 'completed', '2024-12-06 04:35:20', '2024-12-06 06:15:28'),
(206, 261, '2024-12-06 06:15:30', '2024-12-06 06:15:31', 'completed', '2024-12-06 04:35:25', '2024-12-06 06:15:33'),
(207, 262, '2024-12-06 06:15:39', '2024-12-06 06:15:41', 'completed', '2024-12-06 04:35:30', '2024-12-06 06:15:43'),
(208, 263, '2024-12-06 06:16:06', '2024-12-06 06:16:12', 'completed', '2024-12-06 04:35:35', '2024-12-06 06:16:14'),
(209, 264, '2024-12-08 06:38:28', '2024-12-08 06:38:29', 'completed', '2024-12-06 04:35:40', '2024-12-08 06:38:31'),
(210, 265, '2024-12-08 06:40:51', '2024-12-08 06:40:52', 'completed', '2024-12-06 04:35:44', '2024-12-08 06:40:54'),
(211, 266, '2024-12-09 01:00:14', '2024-12-09 01:00:18', 'completed', '2024-12-06 04:35:50', '2024-12-09 01:00:21'),
(212, 267, '2024-12-06 04:35:56', NULL, 'pending', '2024-12-06 04:35:56', '2024-12-06 04:35:56'),
(213, 268, '2024-12-06 04:36:04', NULL, 'pending', '2024-12-06 04:36:04', '2024-12-06 04:36:04'),
(214, 269, '2024-12-06 04:36:11', NULL, 'pending', '2024-12-06 04:36:11', '2024-12-06 04:36:11'),
(215, 270, '2024-12-06 04:36:17', NULL, 'pending', '2024-12-06 04:36:17', '2024-12-06 04:36:17'),
(216, 271, '2024-12-06 04:36:33', NULL, 'pending', '2024-12-06 04:36:33', '2024-12-06 04:36:33'),
(217, 272, '2024-12-06 04:36:43', NULL, 'pending', '2024-12-06 04:36:43', '2024-12-06 04:36:43'),
(218, 273, '2024-12-09 00:59:40', NULL, 'pending', '2024-12-09 00:59:40', '2024-12-09 00:59:40'),
(219, 274, '2024-12-09 00:59:49', NULL, 'pending', '2024-12-09 00:59:49', '2024-12-09 00:59:49'),
(220, 275, '2024-12-09 00:59:56', NULL, 'pending', '2024-12-09 00:59:56', '2024-12-09 00:59:56'),
(221, 276, '2024-12-09 01:00:26', '2024-12-09 01:00:54', 'completed', '2024-12-09 01:00:05', '2024-12-09 01:00:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan_bahan`
--

CREATE TABLE `penggunaan_bahan` (
  `id_penggunaan` int(5) UNSIGNED NOT NULL,
  `id_bahan` smallint(6) UNSIGNED NOT NULL,
  `jumlah_penggunaan` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `id_timbangan` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penggunaan_bahan`
--

INSERT INTO `penggunaan_bahan` (`id_penggunaan`, `id_bahan`, `jumlah_penggunaan`, `tanggal`, `bulan`, `tahun`, `keterangan`, `id_timbangan`) VALUES
(2, 2, 12, '2024-12-08', 12, 2024, 'Penggunaan bahan untuk timbangan ID: 345', 345),
(3, 4, 12, '2024-12-08', 12, 2024, 'Penggunaan bahan untuk timbangan ID: 345', 345),
(4, 5, 12, '2024-12-08', 12, 2024, 'Penggunaan bahan untuk timbangan ID: 345', 345),
(5, 2, 12, '2024-12-09', 12, 2024, 'Penggunaan bahan untuk timbangan ID: 346', 346),
(6, 4, 12, '2024-12-09', 12, 2024, 'Penggunaan bahan untuk timbangan ID: 346', 346),
(7, 5, 12, '2024-12-09', 12, 2024, 'Penggunaan bahan untuk timbangan ID: 346', 346),
(8, 2, 12, '2024-12-09', 12, 2024, 'Penggunaan bahan untuk timbangan ID: 347', 347),
(9, 4, 12, '2024-12-09', 12, 2024, 'Penggunaan bahan untuk timbangan ID: 347', 347),
(10, 5, 12, '2024-12-09', 12, 2024, 'Penggunaan bahan untuk timbangan ID: 347', 347),
(11, 2, 12, '2025-01-04', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 348', 348),
(12, 4, 12, '2025-01-04', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 348', 348),
(13, 5, 12, '2025-01-04', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 348', 348),
(14, 9, 25, '2025-01-04', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 348', 348),
(24, 2, 12, '2025-01-23', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 350', 350),
(25, 4, 12, '2025-01-23', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 350', 350),
(26, 5, 12, '2025-01-23', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 350', 350),
(77, 2, 12, '2025-01-23', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 351', 351),
(78, 4, 12, '2025-01-23', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 351', 351),
(79, 5, 12, '2025-01-23', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 351', 351),
(80, 2, 12, '2025-01-23', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 352', 352),
(81, 4, 12, '2025-01-23', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 352', 352),
(82, 5, 12, '2025-01-23', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 352', 352),
(91, 2, 12, '2025-01-24', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 354', 354),
(92, 4, 12, '2025-01-24', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 354', 354),
(93, 5, 12, '2025-01-24', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 354', 354),
(94, 9, 25, '2025-01-24', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 354', 354),
(98, 2, 12, '2025-01-24', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 355', 355),
(99, 4, 12, '2025-01-24', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 355', 355),
(100, 5, 12, '2025-01-24', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 355', 355),
(101, 2, 12, '2025-01-24', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 356', 356),
(102, 4, 12, '2025-01-24', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 356', 356),
(103, 5, 12, '2025-01-24', 1, 2025, 'Penggunaan bahan untuk timbangan ID: 356', 356);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_timbangan_bersih` int(5) UNSIGNED DEFAULT NULL,
  `signature_path` varchar(255) DEFAULT NULL,
  `status` enum('pending','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_timbangan_bersih`, `signature_path`, `status`, `created_at`) VALUES
(1, 35, 'signature_35_1733611262.png', 'completed', '2024-12-07 22:41:02'),
(2, 37, 'signature_37_1733611326.png', 'completed', '2024-12-07 22:42:06'),
(3, 38, 'signature_38_1733611358.png', 'completed', '2024-12-07 22:42:38'),
(4, 39, 'signature_39_1733611597.png', 'completed', '2024-12-07 22:46:37'),
(5, 43, 'signature_43_1733681069.png', 'completed', '2024-12-08 18:04:29'),
(6, 41, 'signature_41_1737578698.png', 'completed', '2025-01-22 20:45:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyetrikaan`
--

CREATE TABLE `penyetrikaan` (
  `id_penyetrikaan` int(5) UNSIGNED NOT NULL,
  `id_pengeringan` int(5) UNSIGNED NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `status` enum('pending','in_progress','ready_move','completed') NOT NULL DEFAULT 'in_progress',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_moved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyetrikaan`
--

INSERT INTO `penyetrikaan` (`id_penyetrikaan`, `id_pengeringan`, `tanggal_mulai`, `tanggal_selesai`, `status`, `created_at`, `updated_at`, `is_moved`) VALUES
(86, 203, '2024-12-06 06:04:49', '2024-12-06 06:04:56', 'completed', '2024-12-06 04:15:17', '2024-12-06 06:05:18', 0),
(87, 204, '2024-12-06 06:05:14', '2024-12-06 06:06:14', 'completed', '2024-12-06 06:05:08', '2024-12-06 06:15:07', 0),
(88, 205, '2024-12-06 06:16:29', '2024-12-06 06:16:30', 'completed', '2024-12-06 06:15:28', '2024-12-06 06:16:31', 0),
(89, 206, '2024-12-06 06:16:35', '2024-12-06 06:16:38', 'completed', '2024-12-06 06:15:33', '2024-12-06 06:16:39', 0),
(90, 207, '2024-12-07 05:05:20', '2024-12-07 05:05:21', 'completed', '2024-12-06 06:15:43', '2024-12-07 05:05:22', 0),
(91, 208, '2024-12-07 05:05:24', '2024-12-07 05:05:25', 'completed', '2024-12-06 06:16:14', '2024-12-07 05:05:26', 0),
(92, 209, '2024-12-08 06:39:13', '2024-12-08 06:39:14', 'completed', '2024-12-08 06:38:31', '2024-12-08 06:39:16', 0),
(93, 210, '2024-12-08 06:41:00', '2024-12-08 06:41:02', 'completed', '2024-12-08 06:40:54', '2024-12-08 06:41:04', 0),
(94, 211, '2024-12-09 01:00:21', NULL, 'pending', '2024-12-09 01:00:21', '2024-12-09 01:00:21', 0),
(95, 221, '2024-12-09 01:01:06', '2024-12-09 01:01:08', 'completed', '2024-12-09 01:00:56', '2024-12-09 01:01:09', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(5) NOT NULL,
  `nama_ruangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(31, 'Seroja'),
(32, 'Melur'),
(33, 'Melati'),
(35, 'Anyelir'),
(36, 'Suplier'),
(37, 'Tulip'),
(38, 'Teratai'),
(40, 'Cempaka'),
(41, 'Walini'),
(42, 'Mawar'),
(44, 'Kaktus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan_barang`
--

CREATE TABLE `ruangan_barang` (
  `id_ruangan_barang` int(5) UNSIGNED NOT NULL,
  `id_ruangan` int(5) DEFAULT NULL,
  `id_barang` int(5) UNSIGNED DEFAULT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruangan_barang`
--

INSERT INTO `ruangan_barang` (`id_ruangan_barang`, `id_ruangan`, `id_barang`, `jumlah`) VALUES
(86, 31, 36, 10),
(87, 32, 36, 8),
(88, 33, 36, 0),
(89, 35, 36, 5),
(90, 36, 36, 8),
(91, 37, 36, 9),
(92, 38, 36, 10),
(93, 40, 36, 8),
(94, 41, 36, 10),
(95, 42, 36, 3),
(96, 31, 32, 89),
(97, 32, 33, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rusak`
--

CREATE TABLE `rusak` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `berat_barang` int(11) NOT NULL,
  `tanggal_rusak` date NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `timbangan`
--

CREATE TABLE `timbangan` (
  `id_timbangan` int(5) UNSIGNED NOT NULL,
  `id_ruangan` int(5) NOT NULL,
  `berat_barang` decimal(8,2) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `status` enum('pending','in_progress','completed') NOT NULL,
  `id_barang` int(5) UNSIGNED NOT NULL,
  `id_pegawai` int(5) UNSIGNED NOT NULL,
  `id_mesin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `timbangan`
--

INSERT INTO `timbangan` (`id_timbangan`, `id_ruangan`, `berat_barang`, `no_invoice`, `status`, `id_barang`, `id_pegawai`, `id_mesin`) VALUES
(326, 31, 5.00, 'HJO0512202411002', 'completed', 0, 11, 13),
(327, 42, 1.00, 'SJX0512202413327', 'completed', 0, 11, 13),
(328, 42, 2.00, 'TIJ0612202423328', 'completed', 0, 11, 13),
(329, 33, 3.00, 'RZC0612202423329', 'completed', 0, 14, 13),
(330, 32, 2.00, 'NMZ0612202433330', 'completed', 0, 11, 13),
(331, 42, 1.00, 'AQL0612202423331', 'completed', 0, 11, 13),
(332, 32, 1.00, 'BND0612202423332', 'completed', 0, 11, 13),
(333, 31, 1.00, 'ULN0612202423333', 'completed', 0, 11, 13),
(334, 36, 1.00, 'OWK0612202413334', 'completed', 0, 11, 13),
(335, 40, 1.00, 'TKP0612202463335', 'completed', 0, 11, 13),
(336, 42, 1.00, 'CGG0612202403336', 'completed', 0, 11, 13),
(337, 31, 1.00, 'GPZ0612202423337', 'completed', 0, 11, 13),
(338, 32, 1.00, 'OPK0612202413338', 'completed', 0, 11, 13),
(339, 35, 1.00, 'SXP0612202423339', 'completed', 0, 11, 13),
(340, 36, 1.00, 'CFF0612202453340', 'completed', 0, 11, 13),
(341, 40, 1.00, 'UKH0612202463341', 'completed', 0, 11, 13),
(344, 31, 3.00, 'VGS0712202403342', 'completed', 0, 11, 13),
(345, 31, 1.00, 'BHP0812202413345', 'completed', 0, 11, 14),
(346, 31, 23.00, 'FIV0912202414346', 'completed', 0, 11, 13),
(347, 32, 23.00, 'FOV0912202413347', 'completed', 0, 11, 13),
(348, 35, 2.00, 'FRK0912202423348', 'completed', 0, 11, 14),
(350, 33, 1.00, 'VON2301202554349', 'completed', 0, 14, 13),
(351, 33, 3.00, 'ENH2301202533351', 'completed', 0, 14, 13),
(352, 31, 1.00, 'WRY2301202533352', 'completed', 0, 14, 13),
(354, 37, 1.00, 'BFS2301202513353', 'completed', 0, 14, 14),
(355, 35, 3.00, 'TKF2401202574355', 'completed', 0, 11, 13),
(356, 35, 1.00, 'XKO2401202553356', 'completed', 0, 14, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `timbangan_barang`
--

CREATE TABLE `timbangan_barang` (
  `id` int(5) NOT NULL,
  `id_timbangan` int(5) UNSIGNED DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_barang` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `timbangan_barang`
--

INSERT INTO `timbangan_barang` (`id`, `id_timbangan`, `nama_barang`, `jumlah`, `id_barang`) VALUES
(183, 326, 'Bedcover', 5, 36),
(184, 327, 'Bedcover', 5, 36),
(185, 328, 'Bedcover', 1, 36),
(186, 329, 'Bedcover', 2, 36),
(187, 330, 'Bedcover', 1, 36),
(188, 331, 'Bedcover', 1, 36),
(189, 332, 'Bedcover', 1, 36),
(190, 333, 'Bedcover', 1, 36),
(191, 334, 'Bedcover', 1, 36),
(192, 335, 'Bedcover', 1, 36),
(193, 336, 'Bedcover', 1, 36),
(194, 337, 'Bedcover', 1, 36),
(195, 338, 'Bedcover', 1, 36),
(196, 339, 'Bedcover', 1, 36),
(197, 340, 'Bedcover', 1, 36),
(198, 341, 'Bedcover', 1, 36),
(200, 344, 'Bedcover', 3, 36),
(201, 345, 'Bedcover', 1, 36),
(202, 346, 'S Bantal', 10, 32),
(203, 347, 'Bedcover', 2, 36),
(204, 347, 'Laken', 20, 33),
(205, 348, 'Bedcover', 1, 36),
(207, 350, 'Bedcover', 1, 36),
(208, 351, 'Bedcover', 7, 36),
(209, 352, 'Bedcover', 1, 36),
(210, 352, 'S Bantal', 1, 32),
(212, 354, 'Bedcover', 1, 36),
(213, 355, 'Bedcover', 2, 36),
(214, 356, 'Bedcover', 1, 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `timbangan_bersih`
--

CREATE TABLE `timbangan_bersih` (
  `id_timbangan_bersih` int(5) UNSIGNED NOT NULL,
  `id_pelipatan` int(5) UNSIGNED NOT NULL,
  `berat_bersih` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','process','delivered') NOT NULL DEFAULT 'pending',
  `tanggal_pengiriman` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ruangan` enum('melati','suplier','tulip','mawar','teratai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `timbangan_bersih`
--

INSERT INTO `timbangan_bersih` (`id_timbangan_bersih`, `id_pelipatan`, `berat_bersih`, `status`, `tanggal_pengiriman`, `created_at`, `updated_at`, `ruangan`) VALUES
(35, 74, 2.00, 'delivered', NULL, '2024-12-07 00:40:20', '2024-12-08 05:41:02', NULL),
(37, 76, 1.00, 'delivered', NULL, '2024-12-07 02:02:11', '2024-12-08 05:42:07', NULL),
(38, 77, 2.00, 'delivered', NULL, '2024-12-07 04:49:11', '2024-12-08 05:42:39', NULL),
(39, 78, 2.00, 'delivered', '2024-12-08 05:46:37', '2024-12-07 04:50:48', '2024-12-08 05:46:37', NULL),
(40, 79, 3.00, 'process', '2024-12-08 06:32:20', '2024-12-07 05:37:04', '2024-12-08 06:32:20', NULL),
(41, 80, 1.00, 'delivered', '2025-01-23 03:45:00', '2024-12-08 05:46:05', '2025-01-23 03:45:00', NULL),
(42, 81, NULL, 'pending', NULL, '2024-12-08 06:39:34', '2024-12-08 06:39:34', NULL),
(43, 83, 23.00, 'delivered', '2024-12-09 01:04:29', '2024-12-09 01:02:14', '2024-12-09 01:04:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_pelipatan`
--
ALTER TABLE `detail_pelipatan`
  ADD PRIMARY KEY (`id_detail_pelipatan`),
  ADD KEY `id_pelipatan` (`id_pelipatan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indeks untuk tabel `mesin_bahan`
--
ALTER TABLE `mesin_bahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mesin_bahan_mesin` (`id_mesin`),
  ADD KEY `fk_mesin_bahan_bahan` (`id_bahan`);

--
-- Indeks untuk tabel `mesin_cuci`
--
ALTER TABLE `mesin_cuci`
  ADD PRIMARY KEY (`id_mesin`),
  ADD KEY `fk_bahan_mesin` (`id_bahan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `email` (`username`);

--
-- Indeks untuk tabel `pelipatan`
--
ALTER TABLE `pelipatan`
  ADD PRIMARY KEY (`id_pelipatan`),
  ADD KEY `id_penyetrikaan` (`id_penyetrikaan`);

--
-- Indeks untuk tabel `pencucian`
--
ALTER TABLE `pencucian`
  ADD PRIMARY KEY (`id_cuci`),
  ADD KEY `pencucian_id_timbangan_foreign` (`id_timbangan`),
  ADD KEY `fk_id_barang` (`id_barang`),
  ADD KEY `fk_id_bahan` (`id_bahan`),
  ADD KEY `fk_pencucian_mesin` (`id_mesin`);

--
-- Indeks untuk tabel `pengelolaan`
--
ALTER TABLE `pengelolaan`
  ADD PRIMARY KEY (`id_pengelolaan`),
  ADD KEY `id_timbangan` (`id_timbangan`);

--
-- Indeks untuk tabel `pengeringan`
--
ALTER TABLE `pengeringan`
  ADD PRIMARY KEY (`id_pengeringan`),
  ADD KEY `fk_pengeringan` (`id_cuci`);

--
-- Indeks untuk tabel `penggunaan_bahan`
--
ALTER TABLE `penggunaan_bahan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `fk_timbangan` (`id_timbangan`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_timbangan_bersih` (`id_timbangan_bersih`);

--
-- Indeks untuk tabel `penyetrikaan`
--
ALTER TABLE `penyetrikaan`
  ADD PRIMARY KEY (`id_penyetrikaan`),
  ADD KEY `penyetrikaan_id_pengeringan_foreign` (`id_pengeringan`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `ruangan_barang`
--
ALTER TABLE `ruangan_barang`
  ADD PRIMARY KEY (`id_ruangan_barang`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `rusak`
--
ALTER TABLE `rusak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `timbangan`
--
ALTER TABLE `timbangan`
  ADD PRIMARY KEY (`id_timbangan`),
  ADD KEY `fk_timbangan_barang` (`id_barang`),
  ADD KEY `fk_timbangan_pegawai` (`id_pegawai`),
  ADD KEY `fk_id_mesin` (`id_mesin`),
  ADD KEY `fk_id_ruangan` (`id_ruangan`);

--
-- Indeks untuk tabel `timbangan_barang`
--
ALTER TABLE `timbangan_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timbangan_barang_ibfk_1` (`id_timbangan`),
  ADD KEY `fk_timbangan_barang_barang` (`id_barang`);

--
-- Indeks untuk tabel `timbangan_bersih`
--
ALTER TABLE `timbangan_bersih`
  ADD PRIMARY KEY (`id_timbangan_bersih`),
  ADD KEY `id_pelipatan` (`id_pelipatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `detail_pelipatan`
--
ALTER TABLE `detail_pelipatan`
  MODIFY `id_detail_pelipatan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT untuk tabel `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id_mesin` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mesin_bahan`
--
ALTER TABLE `mesin_bahan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mesin_cuci`
--
ALTER TABLE `mesin_cuci`
  MODIFY `id_mesin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pelipatan`
--
ALTER TABLE `pelipatan`
  MODIFY `id_pelipatan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `pencucian`
--
ALTER TABLE `pencucian`
  MODIFY `id_cuci` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT untuk tabel `pengelolaan`
--
ALTER TABLE `pengelolaan`
  MODIFY `id_pengelolaan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengeringan`
--
ALTER TABLE `pengeringan`
  MODIFY `id_pengeringan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT untuk tabel `penggunaan_bahan`
--
ALTER TABLE `penggunaan_bahan`
  MODIFY `id_penggunaan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penyetrikaan`
--
ALTER TABLE `penyetrikaan`
  MODIFY `id_penyetrikaan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `ruangan_barang`
--
ALTER TABLE `ruangan_barang`
  MODIFY `id_ruangan_barang` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `rusak`
--
ALTER TABLE `rusak`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `timbangan`
--
ALTER TABLE `timbangan`
  MODIFY `id_timbangan` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT untuk tabel `timbangan_barang`
--
ALTER TABLE `timbangan_barang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT untuk tabel `timbangan_bersih`
--
ALTER TABLE `timbangan_bersih`
  MODIFY `id_timbangan_bersih` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mesin_bahan`
--
ALTER TABLE `mesin_bahan`
  ADD CONSTRAINT `fk_mesin_bahan_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mesin_bahan_mesin` FOREIGN KEY (`id_mesin`) REFERENCES `mesin_cuci` (`id_mesin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengelolaan`
--
ALTER TABLE `pengelolaan`
  ADD CONSTRAINT `pengelolaan_ibfk_1` FOREIGN KEY (`id_timbangan`) REFERENCES `timbangan` (`id_timbangan`);

--
-- Ketidakleluasaan untuk tabel `penggunaan_bahan`
--
ALTER TABLE `penggunaan_bahan`
  ADD CONSTRAINT `fk_timbangan` FOREIGN KEY (`id_timbangan`) REFERENCES `timbangan` (`id_timbangan`),
  ADD CONSTRAINT `penggunaan_bahan_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_timbangan_bersih`) REFERENCES `timbangan_bersih` (`id_timbangan_bersih`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ruangan_barang`
--
ALTER TABLE `ruangan_barang`
  ADD CONSTRAINT `ruangan_barang_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE CASCADE,
  ADD CONSTRAINT `ruangan_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `timbangan`
--
ALTER TABLE `timbangan`
  ADD CONSTRAINT `fk_id_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `timbangan_barang`
--
ALTER TABLE `timbangan_barang`
  ADD CONSTRAINT `fk_timbangan_barang_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timbangan_barang_ibfk_1` FOREIGN KEY (`id_timbangan`) REFERENCES `timbangan` (`id_timbangan`) ON DELETE CASCADE;
--
-- Database: `fairy_nails`
--
CREATE DATABASE IF NOT EXISTS `fairy_nails` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fairy_nails`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_20_234151_add_role_to_users_table', 1),
(5, '2025_02_20_234602_update_users_table_add_columns', 1),
(6, '2025_02_24_120925_add_level_exp_point_to_user_table', 2),
(10, '2025_02_24_165445_create_table_product', 3),
(11, '2025_02_24_191145_update_category_collumn_in_product_table', 4),
(12, '2025_02_24_213001_create_vouchers_table', 5),
(13, '2025_02_24_214542_user_vouchers', 6),
(14, '2025_02_24_220032_redemptions', 7),
(15, '2025_02_24_220941_create_table_transactions', 8),
(17, '2025_02_24_221059_create_table_transactions_detail', 9),
(18, '2025_02_27_132625_create_table_cart', 10),
(19, '2025_02_27_134723_update_table_cart_add_collumn_user_f_k', 11),
(20, '2025_02_28_015315_add_proses_to_payment_status_enum', 12),
(21, '2025_03_01_092603_create_pending_users_table', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pending_users`
--

CREATE TABLE `pending_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` enum('Nail Art','Nail Extension','Press On Nails') NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(5, 'Nail Art', 'Nail Rainbow', 'Nail Art raibow is so fucking beutifull', 65000.00, '2025-02-24 12:46:12', '2025-02-24 12:46:12'),
(6, 'Press On Nails', 'Press Abstrakk', 'Press On Nails Awesome!!', 120000.00, '2025-02-24 12:48:06', '2025-02-24 12:48:06'),
(7, 'Nail Extension', 'Kuku Gajah', 'Ini Kuku Gajah Asli Buatan Banten', 100000.00, '2025-02-26 16:02:20', '2025-02-26 16:02:20'),
(8, 'Nail Art', 'Cat Kuku Asli Nippon Paint Asli Dijamin ORI!!!', 'Nippont Paint Cintai Product Product Indonesia', 150000.00, '2025-02-26 16:03:22', '2025-02-26 16:03:22'),
(9, 'Press On Nails', 'Kuku Macan', 'Kuku Macan bisa membuat kita berlari dengan cepat di setiap tempat dan keadaan', 120000.00, '2025-02-27 09:24:39', '2025-02-27 09:24:39'),
(10, 'Nail Extension', 'Bakakak', 'Bakakakk Gorengg', 135000.00, '2025-03-01 04:51:51', '2025-03-01 04:51:51'),
(11, 'Nail Art', 'diskon 25%', 'masuk sini masuk sini aja', 20.00, '2025-03-01 05:15:38', '2025-03-01 05:36:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `redemptions`
--

CREATE TABLE `redemptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `points_used` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1BNhFDVYYwL6nPEQzcQCUSgPB7jo4csUDhkOhbzu', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR01UdnFKb0N6RlJOelpTazhieTNna0JXQ0tlVHNETjFMOW5oN1c3NiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1740811051),
('i4vWylxTG9UhG6H7ZbN0BSMFY9Nn3Qcjtnx1xUP9', 2, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 13; Pixel 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaXNHWGRzbDZEdUtjNnVlaGI5S1R3alIwTGRjOGMyMmpZYzA2N2FJNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9wcm9kdWN0cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1740811032);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `points_earned` int(11) NOT NULL DEFAULT 0,
  `xp_earned` int(11) NOT NULL DEFAULT 0,
  `voucher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_status` enum('pending','completed','cancelled','process') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `total_amount`, `points_earned`, `xp_earned`, `voucher_id`, `discount_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(4, 10, 120000.00, 10, 10, NULL, 10.00, 'cancelled', '2025-02-26 19:48:53', '2025-02-26 13:05:54'),
(5, 3, 9000.00, 50, 20, NULL, 10.00, 'completed', '2025-02-26 20:10:59', '2025-02-26 14:50:34'),
(6, 11, 90000.00, 30, 100, NULL, 10.00, 'completed', '2025-02-26 20:54:15', '2025-02-26 14:55:42'),
(7, 10, 108000.00, 1000, 10000, NULL, 20.00, 'completed', '2025-02-26 23:04:16', '2025-02-26 16:05:28'),
(8, 10, 87300.00, 10, 100, NULL, 10.00, 'completed', '2025-02-26 23:16:17', '2025-02-26 16:17:25'),
(9, 11, 10800.00, 100, 5000, NULL, 10.00, 'completed', '2025-02-26 23:20:54', '2025-02-26 16:22:07'),
(10, 11, 104500.00, 100, 10000, NULL, 20.00, 'completed', '2025-02-26 23:27:28', '2025-02-26 16:28:31'),
(49, 10, 243000.00, 0, 0, NULL, 1.00, 'pending', '2025-02-27 15:09:03', '2025-02-27 15:09:03'),
(50, 10, 90000.00, 0, 0, NULL, 1.00, 'pending', '2025-02-27 15:09:33', '2025-02-27 15:09:33'),
(51, 10, 108000.00, 0, 0, NULL, 1.00, 'pending', '2025-02-27 15:11:29', '2025-02-27 15:11:29'),
(53, 10, 108300.00, 10, 1000, NULL, 12000.00, 'completed', '2025-02-27 15:25:49', '2025-02-28 14:22:26'),
(54, 3, 360000.00, 0, 0, NULL, 0.00, 'pending', '2025-02-27 18:11:41', '2025-02-27 18:11:41'),
(55, 3, 185000.00, 18, 1800, NULL, 0.00, 'pending', '2025-02-27 18:23:03', '2025-02-27 18:23:03'),
(56, 3, 100000.00, 10, 1000, 25, 100000.00, 'pending', '2025-02-27 18:29:16', '2025-02-27 18:29:16'),
(57, 3, 110000.00, 11, 1100, 29, 110000.00, 'pending', '2025-02-27 18:45:39', '2025-02-27 18:45:39'),
(58, 3, 58500.00, 5, 500, 26, 6500.00, 'process', '2025-02-27 18:48:03', '2025-02-27 20:23:48'),
(59, 3, 510000.00, 51, 5100, 31, 510000.00, 'process', '2025-02-27 18:56:57', '2025-02-27 19:01:20'),
(60, 3, 96048.00, 10, 1000, 30, 12000.00, 'completed', '2025-02-27 19:02:48', '2025-02-28 11:04:25'),
(61, 10, 0.00, 0, 0, NULL, 0.00, 'pending', '2025-02-28 11:21:11', '2025-02-28 11:21:11'),
(62, 10, 0.00, 0, 0, NULL, 0.00, 'pending', '2025-02-28 11:21:14', '2025-02-28 11:21:14'),
(63, 10, 108000.00, 10, 1000, 23, 12000.00, 'pending', '2025-02-28 11:21:44', '2025-02-28 11:21:44'),
(64, 3, 300000.00, 30, 3000, 33, 300000.00, 'pending', '2025-02-28 11:28:16', '2025-02-28 11:28:16'),
(65, 3, 0.00, 0, 0, NULL, 0.00, 'pending', '2025-02-28 11:28:40', '2025-02-28 11:28:40'),
(66, 3, 405000.00, 40, 4000, 32, 45000.00, 'pending', '2025-02-28 11:29:08', '2025-02-28 11:29:08'),
(67, 3, 317400.00, 36, 3600, 27, 0.00, 'completed', '2025-02-28 12:27:59', '2025-02-28 12:56:45'),
(68, 10, 428640.00, 48, 4800, 36, 480000.00, 'completed', '2025-02-28 13:15:16', '2025-02-28 13:17:00'),
(69, 14, 375060.00, 42, 4200, 37, 420000.00, 'completed', '2025-02-28 13:24:35', '2025-02-28 13:25:46'),
(70, 14, 108300.00, 12, 1200, NULL, 0.00, 'completed', '2025-02-28 13:26:53', '2025-02-28 14:24:37'),
(71, 10, 65000.00, 6, 600, 39, 195000.00, 'completed', '2025-02-28 15:08:49', '2025-02-28 15:11:47'),
(72, 10, 232800.00, 24, 2400, NULL, 0.00, 'completed', '2025-02-28 15:12:40', '2025-02-28 15:14:07'),
(73, 3, 150000.00, 15, 1500, 34, 0.00, 'pending', '2025-03-01 00:19:42', '2025-03-01 00:19:42'),
(74, 3, 65000.00, 6, 600, 40, 0.00, 'pending', '2025-03-01 00:26:20', '2025-03-01 00:26:20'),
(75, 3, 120000.00, 12, 1200, NULL, 0.00, 'pending', '2025-03-01 00:36:50', '2025-03-01 00:36:50'),
(76, 3, 126960.00, 15, 1500, NULL, 0.00, 'completed', '2025-03-01 01:26:41', '2025-03-01 02:04:34'),
(77, 10, 135375.00, 15, 1500, 22, 0.00, 'completed', '2025-03-01 04:49:19', '2025-03-01 04:51:02'),
(78, 3, 280000.00, 28, 2800, 41, 0.00, 'process', '2025-03-01 06:05:08', '2025-03-01 06:22:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `quantity`, `price`, `discount`, `subtotal`, `created_at`, `updated_at`) VALUES
(32, 49, 8, 1, 150000.00, 0.00, 150000.00, '2025-02-27 15:09:04', '2025-02-27 15:09:04'),
(33, 49, 6, 1, 120000.00, 0.00, 120000.00, '2025-02-27 15:09:04', '2025-02-27 15:09:04'),
(34, 50, 7, 1, 100000.00, 0.00, 100000.00, '2025-02-27 15:09:33', '2025-02-27 15:09:33'),
(35, 51, 9, 1, 120000.00, 0.00, 120000.00, '2025-02-27 15:11:29', '2025-02-27 15:11:29'),
(36, 53, 9, 1, 120000.00, 0.00, 120000.00, '2025-02-27 15:25:49', '2025-02-27 15:25:49'),
(37, 55, 6, 1, 120000.00, 0.00, 120000.00, '2025-02-27 18:23:03', '2025-02-27 18:23:03'),
(38, 55, 5, 1, 65000.00, 0.00, 65000.00, '2025-02-27 18:23:04', '2025-02-27 18:23:04'),
(39, 56, 7, 2, 100000.00, 0.00, 200000.00, '2025-02-27 18:29:16', '2025-02-27 18:29:16'),
(40, 57, 6, 1, 120000.00, 0.00, 120000.00, '2025-02-27 18:45:39', '2025-02-27 18:45:39'),
(41, 57, 7, 1, 100000.00, 0.00, 100000.00, '2025-02-27 18:45:39', '2025-02-27 18:45:39'),
(42, 58, 5, 1, 65000.00, 0.00, 65000.00, '2025-02-27 18:48:03', '2025-02-27 18:48:03'),
(43, 59, 6, 3, 120000.00, 0.00, 360000.00, '2025-02-27 18:56:58', '2025-02-27 18:56:58'),
(44, 59, 7, 3, 100000.00, 0.00, 300000.00, '2025-02-27 18:56:58', '2025-02-27 18:56:58'),
(45, 59, 9, 3, 120000.00, 0.00, 360000.00, '2025-02-27 18:56:58', '2025-02-27 18:56:58'),
(46, 60, 9, 1, 120000.00, 0.00, 120000.00, '2025-02-27 19:02:49', '2025-02-27 19:02:49'),
(47, 63, 6, 1, 120000.00, 0.00, 120000.00, '2025-02-28 11:21:44', '2025-02-28 11:21:44'),
(48, 64, 8, 4, 150000.00, 0.00, 600000.00, '2025-02-28 11:28:16', '2025-02-28 11:28:16'),
(49, 66, 8, 3, 150000.00, 0.00, 450000.00, '2025-02-28 11:29:08', '2025-02-28 11:29:08'),
(50, 67, 9, 3, 120000.00, 0.00, 360000.00, '2025-02-28 12:27:59', '2025-02-28 12:27:59'),
(51, 68, 9, 8, 120000.00, 0.00, 960000.00, '2025-02-28 13:15:16', '2025-02-28 13:15:16'),
(52, 69, 6, 7, 120000.00, 0.00, 840000.00, '2025-02-28 13:24:35', '2025-02-28 13:24:35'),
(53, 70, 6, 1, 120000.00, 0.00, 120000.00, '2025-02-28 13:26:53', '2025-02-28 13:26:53'),
(54, 71, 5, 4, 65000.00, 0.00, 260000.00, '2025-02-28 15:08:49', '2025-02-28 15:08:49'),
(55, 72, 6, 2, 120000.00, 0.00, 240000.00, '2025-02-28 15:12:40', '2025-02-28 15:12:40'),
(56, 73, 8, 1, 150000.00, 0.00, 150000.00, '2025-03-01 00:19:42', '2025-03-01 00:19:42'),
(57, 74, 5, 1, 65000.00, 0.00, 65000.00, '2025-03-01 00:26:20', '2025-03-01 00:26:20'),
(58, 75, 6, 1, 120000.00, 0.00, 120000.00, '2025-03-01 00:36:50', '2025-03-01 00:36:50'),
(59, 76, 8, 1, 150000.00, 0.00, 150000.00, '2025-03-01 01:26:41', '2025-03-01 01:26:41'),
(60, 77, 8, 1, 150000.00, 0.00, 150000.00, '2025-03-01 04:49:19', '2025-03-01 04:49:19'),
(61, 78, 5, 2, 65000.00, 0.00, 130000.00, '2025-03-01 06:05:08', '2025-03-01 06:05:08'),
(62, 78, 8, 1, 150000.00, 0.00, 150000.00, '2025-03-01 06:05:08', '2025-03-01 06:05:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `birthdate` date DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `level` enum('bronze','silver','gold','platinum') NOT NULL DEFAULT 'bronze',
  `exp` int(11) NOT NULL DEFAULT 0,
  `points` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `birthdate`, `phone`, `address`, `gender`, `level`, `exp`, `points`) VALUES
(2, 'admin', 'admin@example', NULL, '$2y$12$WHO0/XtP316zoAAzXo/ezeXEn1CPzyD5ZIW5smdPzShmW0XzojioG', NULL, '2025-02-20 16:53:22', '2025-02-20 16:53:22', 'admin', '2000-01-01', '08123456789', 'Jl. Contoh, No. 123, Jakarta Selatan', 'male', 'bronze', 0, 0),
(3, 'user', 'user@example', NULL, '$2y$12$rxdxYQXTWxuyvfxYsnNyseAsrZ3hvnRJ5yOp9IEq0jztprJ7XlzqW', NULL, '2025-02-20 16:53:23', '2025-03-01 02:04:34', 'user', '2000-01-01', '08123456789', 'Jl. Contoh, No. 123, Jakarta Selatan', 'female', 'platinum', 7100, 99999474),
(10, 'Rizki', 'kikirizki0455@gmail.com', NULL, '$2y$12$dLIN37l1oppWlQCC3gfhROxH6FUryvVfh30WoiJVHDPJXVNQQsE66', NULL, '2025-02-24 05:21:09', '2025-03-01 04:51:02', 'user', '2025-02-18', '081123123991', 'JL SUPLIER V NO 3 BLOK 5 RT 11 RW 5 kel. rancaekek kencana kec. rancaekek kab. bandung, home', 'male', 'gold', 2000, 60),
(11, 'buih permadani', 'iki@gmail.com', NULL, '$2y$12$/57FTf69RmVMKyyLf47CZeJvRkCEbQ/mgDiadfKm/Lu.b.B0X8oEW', NULL, '2025-02-24 05:22:56', '2025-02-26 16:28:31', 'user', '2025-02-18', '081123123991', 'JL SUPLIER V NO 3 BLOK 5 RT 11 RW 5 kel. rancaekek kencana kec. rancaekek kab. bandung, home', 'male', 'gold', 6100, 10),
(14, 'Rizki Rahmat Hidayat', 'ikii@gmail.com', NULL, '$2y$12$e.xW.a6Zgv7zy9uz8wulXufN1YPsZBP7Fnao5LeUXUlRHNMqMEpnG', NULL, '2025-02-28 13:21:50', '2025-02-28 14:24:37', 'user', '2000-02-15', '081231245111', 'jl laskar pelangi no 20', 'male', 'gold', 1400, 34),
(15, 'goten', 'kertichsan123@gmail.com', NULL, '$2y$12$I22hw0vNxzcVFlf2SEEiUu.fFjTvv91lagiw.YNGmJAmGQ4rDocr2', 'yCaVtvuy6N2q9lLjqUP1wrijPgBdwQPLXJolOCsaV2spQV9WkzwN5Ike8QOr', '2025-03-01 04:41:44', '2025-03-01 04:45:48', 'user', '2000-02-12', '0881202131231', 'BANDUNGG BANGET NI BOSSS', 'male', 'bronze', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_vouchers`
--

CREATE TABLE `user_vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `expire_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_vouchers`
--

INSERT INTO `user_vouchers` (`id`, `user_id`, `voucher_id`, `is_used`, `expire_date`, `created_at`, `updated_at`) VALUES
(22, 10, 3, 1, '2025-03-29', '2025-02-27 08:59:40', '2025-03-01 04:49:20'),
(23, 10, 1, 1, '2025-03-29', '2025-02-27 08:59:43', '2025-02-28 11:21:44'),
(24, 11, 3, 0, '2025-03-29', '2025-02-27 10:12:07', '2025-02-27 10:12:07'),
(25, 3, 2, 1, '2025-03-30', '2025-02-27 18:17:41', '2025-02-27 18:29:16'),
(26, 3, 1, 1, '2025-03-30', '2025-02-27 18:17:52', '2025-02-27 18:48:03'),
(27, 3, 3, 1, '2025-03-30', '2025-02-27 18:17:55', '2025-02-28 12:27:59'),
(28, 3, 4, 0, '2025-03-30', '2025-02-27 18:17:56', '2025-02-27 18:17:56'),
(29, 3, 2, 1, '2025-03-30', '2025-02-27 18:44:12', '2025-02-27 18:45:39'),
(30, 3, 1, 1, '2025-03-30', '2025-02-27 18:56:18', '2025-02-27 19:02:49'),
(31, 3, 2, 1, '2025-03-30', '2025-02-27 18:56:20', '2025-02-27 18:56:58'),
(32, 3, 1, 1, '2025-03-30', '2025-02-28 11:27:41', '2025-02-28 11:29:08'),
(33, 3, 2, 1, '2025-03-30', '2025-02-28 11:27:43', '2025-02-28 11:28:16'),
(34, 3, 3, 1, '2025-03-30', '2025-02-28 11:27:44', '2025-03-01 00:19:42'),
(35, 3, 4, 0, '2025-03-30', '2025-02-28 11:27:47', '2025-02-28 11:27:47'),
(36, 10, 2, 1, '2025-03-30', '2025-02-28 13:14:47', '2025-02-28 13:15:16'),
(37, 14, 2, 1, '2025-03-30', '2025-02-28 13:24:07', '2025-02-28 13:24:35'),
(38, 14, 1, 0, '2025-03-30', '2025-02-28 13:26:45', '2025-02-28 13:26:45'),
(39, 10, 5, 1, '2025-03-30', '2025-02-28 15:08:12', '2025-02-28 15:08:50'),
(40, 3, 3, 1, '2025-03-31', '2025-03-01 00:20:16', '2025-03-01 00:26:20'),
(41, 3, 3, 1, '2025-03-31', '2025-03-01 01:07:47', '2025-03-01 06:05:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `type` enum('percentage_discount','free_service') NOT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `product_category` varchar(255) DEFAULT NULL,
  `points_required` int(11) NOT NULL,
  `minimum_transaction` decimal(10,2) NOT NULL DEFAULT 60000.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vouchers`
--

INSERT INTO `vouchers` (`id`, `name`, `code`, `description`, `type`, `value`, `product_category`, `points_required`, `minimum_transaction`, `created_at`, `updated_at`) VALUES
(1, 'diskon 10%', '220109', 'Diskon 10% setiap sekali pembayaran', 'percentage_discount', 10.00, NULL, 20, 50000.00, '2025-02-24 16:36:43', '2025-02-24 16:36:43'),
(2, 'diskon 50%', '00123', 'Diskon 50% setiap sekali pembayaran', 'percentage_discount', 50.00, NULL, 50, 100000.00, '2025-02-24 16:38:01', '2025-02-24 16:38:01'),
(3, 'diskon beras 2 karung', '221', NULL, 'free_service', NULL, 'Nail Arts', 20, 60000.00, '2025-02-24 19:48:08', '2025-02-24 19:48:08'),
(4, 'Gratis sawah 2 hektar', '2001', 'Gratis sawah asal daek ngurus', 'free_service', NULL, 'pelanan assset', 100, 2000000.00, '2025-02-24 19:52:53', '2025-02-24 19:52:53'),
(5, 'Diskon 75% Ramadhan', '2201', 'Diskon Bulan Ramadhan Buruan!!!', 'percentage_discount', 75.00, NULL, 150, 200000.00, '2025-02-28 14:31:23', '2025-02-28 14:31:23'),
(6, 'Bikin Rumah Gratis', '002', 'Ayo kita bekerja buat rumah sederhana', 'free_service', NULL, 'layanan gratis', 200, 60000.00, '2025-03-01 02:10:42', '2025-03-01 02:10:42'),
(7, 'diskon 95%', '122', 'asdasdasd', 'percentage_discount', 95.00, NULL, 221, 60000.00, '2025-03-01 04:53:56', '2025-03-01 04:53:56'),
(8, 'diskon20', '0012', 'asdaaa', 'percentage_discount', 20.00, NULL, 20, 60000.00, '2025-03-01 05:40:15', '2025-03-01 05:40:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_product_id_foreign` (`product_id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pending_users`
--
ALTER TABLE `pending_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pending_users_email_unique` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `redemptions`
--
ALTER TABLE `redemptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redemptions_voucher_id_foreign` (`voucher_id`),
  ADD KEY `redemptions_user_id_voucher_id_index` (`user_id`,`voucher_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_voucher_id_foreign` (`voucher_id`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_vouchers`
--
ALTER TABLE `user_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_vouchers_voucher_id_foreign` (`voucher_id`),
  ADD KEY `user_vouchers_user_id_voucher_id_index` (`user_id`,`voucher_id`);

--
-- Indeks untuk tabel `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_code_unique` (`code`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pending_users`
--
ALTER TABLE `pending_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `redemptions`
--
ALTER TABLE `redemptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_vouchers`
--
ALTER TABLE `user_vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `redemptions`
--
ALTER TABLE `redemptions`
  ADD CONSTRAINT `redemptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redemptions_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `user_vouchers` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_vouchers`
--
ALTER TABLE `user_vouchers`
  ADD CONSTRAINT `user_vouchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_vouchers_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;
--
-- Database: `laundry`
--
CREATE DATABASE IF NOT EXISTS `laundry` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laundry`;
--
-- Database: `member_app`
--
CREATE DATABASE IF NOT EXISTS `member_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `member_app`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('kertichsan123@gmail.com|127.0.0.1', 'i:3;', 1738412802),
('kertichsan123@gmail.com|127.0.0.1:timer', 'i:1738412802;', 1738412802),
('kikirizki0455@gmail.com|127.0.0.1', 'i:1;', 1738412784),
('kikirizki0455@gmail.com|127.0.0.1:timer', 'i:1738412784;', 1738412784);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `points` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `level` enum('bronze','silver','gold') NOT NULL DEFAULT 'bronze',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_29_205136_create_table_member', 2),
(5, '2025_01_29_205203_create_table_transation', 2),
(6, '2025_01_29_205222_create_table_redemption', 2),
(7, '2024_01_30_043711_add_is_admin_to_users_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `redemptions`
--

CREATE TABLE `redemptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('discount','custom_design','home_service') NOT NULL,
  `points_used` int(10) UNSIGNED NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cr0FmV142HpRNZbDZmNpHeXREpnJqvsDsKnc9Hc2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2JyekcxWVZCZExOS0hlRExCaVFsUXVSd0hVOVJmbGR3cGZQRHhRbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738183411),
('h5ogHSNk8plt0fqAIvpKn3GBii5uUsuRACBnvpqP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1QxRnJNWFE4UkdMUW1kQnFxanVEWWpzcTI1ZnYyamc4NGFmZk5vbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738187008),
('Mlvh5FUnfkvMed7jV30IoBCCNSHka8MOUhwevlnx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNkgyV040bFdMenpnRHZ5VHJwbVVhWGwyaHRBeDYxYXhwN2U2aE50WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738412752);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) UNSIGNED NOT NULL,
  `payment_method` enum('QRIS','BCA','BNI','MANDIRI') NOT NULL,
  `status` enum('pending','success','failed') NOT NULL DEFAULT 'pending',
  `snap_token` text DEFAULT NULL,
  `reference_num` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_user_id_unique` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `redemptions`
--
ALTER TABLE `redemptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redemptions_member_id_foreign` (`member_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `redemptions`
--
ALTER TABLE `redemptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `redemptions`
--
ALTER TABLE `redemptions`
  ADD CONSTRAINT `redemptions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data untuk tabel `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"relation_lines\":\"true\",\"snap_to_grid\":\"off\",\"angular_direct\":\"direct\",\"full_screen\":\"off\"}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data untuk tabel `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'dustira', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"bahan\",\"barang\",\"migrations\",\"pegawai\",\"timbangan\"],\"table_structure[]\":[\"bahan\",\"barang\",\"migrations\",\"pegawai\",\"timbangan\"],\"table_data[]\":[\"bahan\",\"barang\",\"migrations\",\"pegawai\",\"timbangan\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Struktur tabel @TABLE@\",\"latex_structure_continued_caption\":\"Struktur tabel @TABLE@ (dilanjutkan)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Isi tabel @TABLE@\",\"latex_data_continued_caption\":\"Isi tabel @TABLE@ (dilanjutkan)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(4, 'root', 'server', 'dustira', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"dustira\",\"laundry\",\"phpmyadmin\",\"rslaundry\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Struktur tabel @TABLE@\",\"latex_structure_continued_caption\":\"Struktur tabel @TABLE@ (dilanjutkan)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Isi tabel @TABLE@\",\"latex_data_continued_caption\":\"Isi tabel @TABLE@ (dilanjutkan)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(9, 'root', 'database', 'DB_RS_DUSTIRA', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"bahan\",\"barang\",\"mesin_cuci\",\"migrations\",\"pegawai\",\"pencucian\",\"pengeringan\",\"penyetrikaan\",\"rusak\",\"timbangan\"],\"table_structure[]\":[\"bahan\",\"barang\",\"mesin_cuci\",\"migrations\",\"pegawai\",\"pencucian\",\"pengeringan\",\"penyetrikaan\",\"rusak\",\"timbangan\"],\"table_data[]\":[\"bahan\",\"barang\",\"mesin_cuci\",\"migrations\",\"pegawai\",\"pencucian\",\"pengeringan\",\"penyetrikaan\",\"rusak\",\"timbangan\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Struktur tabel @TABLE@\",\"latex_structure_continued_caption\":\"Struktur tabel @TABLE@ (dilanjutkan)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Isi tabel @TABLE@\",\"latex_data_continued_caption\":\"Isi tabel @TABLE@ (dilanjutkan)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}'),
(13, 'root', 'server', 'fairynails', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"admin-lapor\",\"dustira\",\"fairy_nails\",\"laundry\",\"member_app\",\"phpmyadmin\",\"rslaundry\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Struktur tabel @TABLE@\",\"latex_structure_continued_caption\":\"Struktur tabel @TABLE@ (dilanjutkan)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Isi tabel @TABLE@\",\"latex_data_continued_caption\":\"Isi tabel @TABLE@ (dilanjutkan)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data untuk tabel `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"fairy_nails\",\"table\":\"products\"},{\"db\":\"fairy_nails\",\"table\":\"pending_users\"},{\"db\":\"fairy_nails\",\"table\":\"users\"},{\"db\":\"fairy_nails\",\"table\":\"transactions\"},{\"db\":\"fairy_nails\",\"table\":\"vouchers\"},{\"db\":\"fairy_nails\",\"table\":\"transaction_details\"},{\"db\":\"fairy_nails\",\"table\":\"user_vouchers\"},{\"db\":\"fairy_nails\",\"table\":\"cart\"},{\"db\":\"fairy_nails\",\"table\":\"table_cart\"},{\"db\":\"fairy_nails\",\"table\":\"redemptions\"}]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data untuk tabel `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('dustira', 'timbangan', 'no_invoice'),
('dustira', 'timbangan_barang', 'nama_barang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data untuk tabel `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2025-03-01 12:51:39', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"id\",\"NavigationWidth\":374}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Struktur dari tabel `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indeks untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indeks untuk tabel `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indeks untuk tabel `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indeks untuk tabel `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indeks untuk tabel `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indeks untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indeks untuk tabel `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indeks untuk tabel `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indeks untuk tabel `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indeks untuk tabel `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indeks untuk tabel `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `rslaundry`
--
CREATE DATABASE IF NOT EXISTS `rslaundry` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rslaundry`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` enum('atasan','pengelola','distribusi') NOT NULL,
  `role_pengelola` enum('pencuci','penimbang','pengering','penyetrika','pelipat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `username`, `password`, `role`, `role_pengelola`) VALUES
(4, 'admin', '$2y$10$TUOvoRewFnOq.Xrn6H', 'pengelola', 'pencuci'),
(6, 'asu', '$2y$10$NlU8dHhP.uhF3NJ1aJ', 'pengelola', 'pencuci'),
(10, 'mamang', '123', 'pengelola', 'pencuci'),
(13, 'rosa', '123', 'pengelola', 'pencuci');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(10) NOT NULL,
  `nama_role` enum('atasan','distribusi','pengelola','') NOT NULL DEFAULT '',
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_pengelola`
--

CREATE TABLE `role_pengelola` (
  `id` int(10) NOT NULL,
  `role_pengelola` enum('pencuci','penimbang','pengering','penyetrika','pelipat') NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_role` (`nama_role`);

--
-- Indeks untuk tabel `role_pengelola`
--
ALTER TABLE `role_pengelola`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_pengelola` (`role_pengelola`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role_pengelola`
--
ALTER TABLE `role_pengelola`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
