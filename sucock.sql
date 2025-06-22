-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2025 pada 12.33
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
-- Database: `sucock`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` text DEFAULT NULL,
  `provinsi` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `kecamatan` text DEFAULT NULL,
  `kelurahan` text DEFAULT NULL,
  `RT` text DEFAULT NULL,
  `RW` text DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_utama` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_pesanan`
--

CREATE TABLE `keranjang_pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keranjang_id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_05_07_061311_create_alamat_table', 1),
(7, '2025_05_20_131601_create_produk_table', 1),
(8, '2025_05_20_131602_create_keranjang_table', 1),
(9, '2025_05_20_135020_create_pesanan_table', 1),
(10, '2025_05_20_135021_create_pengiriman_table', 1),
(11, '2025_05_20_135039_create_pembayaran_table', 1),
(12, '2025_05_26_073702_create_review_table', 1),
(13, '2025_06_07_061226_create_chat_table', 1),
(14, '2025_06_09_092550_add_is_utama_to_alamat_table', 1),
(15, '2025_06_10_093735_create_keranjang_pesanan_table', 1),
(16, '2025_06_11_072425_create_messages_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `metode_pengiriman` varchar(255) NOT NULL,
  `tanggal_pengiriman` date DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `status_pengiriman` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `alamat_id` bigint(20) UNSIGNED NOT NULL,
  `kode_pesanan` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `status_pesanan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penjual_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `bintang` int(11) NOT NULL,
  `review_text` text DEFAULT NULL,
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
  `nohp` varchar(13) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'ACTIVE',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `nohp`, `email`, `email_verified_at`, `password`, `role`, `foto_profil`, `jenis_kelamin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Penjual', '082191927762', 'penjual@gmail.com', NULL, '$2y$10$Q4j7PufuTgLWPKxek0Edoujt2zz3RfS1g1q2d7t5IWPYMXVgQUjjy', 'Penjual', '', 'Perempuan', 'ACTIVE', NULL, NULL, NULL),
(2, 'Pembeli', '082191927762', 'pembeli@gmail.com', NULL, '$2y$10$JxTJF955gEN76RIK/89YteL2fxfUiNKEqQjFaeuoW9C2oc.wCZkz2', 'Pembeli', '', 'Laki-Laki', 'ACTIVE', NULL, NULL, NULL),
(3, 'Admin', '082191927762', 'admin@gmail.com', NULL, '$2y$10$4bKRTmYfbLW3X.YiJfXxtub3Zl//cbRrHSFn93xzdMWGpDdYsuJRa', 'Admin', '', 'Perempuan', 'ACTIVE', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamat_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_produk_id_foreign` (`produk_id`),
  ADD KEY `keranjang_pembeli_id_foreign` (`pembeli_id`);

--
-- Indeks untuk tabel `keranjang_pesanan`
--
ALTER TABLE `keranjang_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_pesanan_keranjang_id_foreign` (`keranjang_id`),
  ADD KEY `keranjang_pesanan_pesanan_id_foreign` (`pesanan_id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_from_user_id_foreign` (`from_user_id`),
  ADD KEY `messages_to_user_id_foreign` (`to_user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_pesanan_id_foreign` (`pesanan_id`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_pesanan_id_foreign` (`pesanan_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_pembeli_id_foreign` (`pembeli_id`),
  ADD KEY `pesanan_alamat_id_foreign` (`alamat_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_penjual_id_foreign` (`penjual_id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `review_produk_id_foreign` (`produk_id`);

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
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keranjang_pesanan`
--
ALTER TABLE `keranjang_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang_pesanan`
--
ALTER TABLE `keranjang_pesanan`
  ADD CONSTRAINT `keranjang_pesanan_keranjang_id_foreign` FOREIGN KEY (`keranjang_id`) REFERENCES `keranjang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_pesanan_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_alamat_id_foreign` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_penjual_id_foreign` FOREIGN KEY (`penjual_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
