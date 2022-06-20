-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2022 pada 03.49
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forummusik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `genres`
--

INSERT INTO `genres` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pop', 'pop', '2022-02-07 10:51:50', '2022-02-07 10:51:50'),
(2, 'Rock', 'rock', '2022-02-07 10:51:51', '2022-02-07 10:51:51'),
(3, 'Jazz', 'jazz', '2022-02-07 10:51:51', '2022-02-07 10:51:51'),
(4, 'Classic', 'classic', '2022-02-07 10:51:51', '2022-02-07 10:51:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `index`
--

CREATE TABLE `index` (
  `topicID` int(10) UNSIGNED NOT NULL,
  `genre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_by` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `listclassics`
--

CREATE TABLE `listclassics` (
  `listID` int(10) UNSIGNED NOT NULL,
  `genre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_mv` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `listjazzs`
--

CREATE TABLE `listjazzs` (
  `listID` int(10) UNSIGNED NOT NULL,
  `genre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_mv` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `listpops`
--

CREATE TABLE `listpops` (
  `listID` int(10) UNSIGNED NOT NULL,
  `genre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_mv` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `listrocks`
--

CREATE TABLE `listrocks` (
  `listID` int(10) UNSIGNED NOT NULL,
  `genre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_mv` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_02_004359_create_listpops_table', 1),
(6, '2022_02_02_004526_create_listclassics_table', 1),
(7, '2022_02_02_004554_create_listrocks_table', 1),
(8, '2022_02_02_004635_create_listjazzs_table', 1),
(9, '2022_02_02_004936_create_playlistpops_table', 1),
(10, '2022_02_02_005023_create_playlistclassics_table', 1),
(11, '2022_02_02_005048_create_playlistrocks_table', 1),
(12, '2022_02_02_005120_create_playlistjazz_table', 1),
(13, '2022_02_02_023842_create_topics_table', 1),
(14, '2022_02_02_024458_create_index_table', 1),
(15, '2022_02_07_110130_create_replies_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlistclassics`
--

CREATE TABLE `playlistclassics` (
  `playlistID` int(10) UNSIGNED NOT NULL,
  `genre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_spotify` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlistjazz`
--

CREATE TABLE `playlistjazz` (
  `playlistID` int(10) UNSIGNED NOT NULL,
  `genre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_spotify` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlistpops`
--

CREATE TABLE `playlistpops` (
  `playlistID` int(10) UNSIGNED NOT NULL,
  `genre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_spotify` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `playlistrocks`
--

CREATE TABLE `playlistrocks` (
  `playlistID` int(10) UNSIGNED NOT NULL,
  `genre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_spotify` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `topic_id`, `content`, `created_at`, `updated_at`) VALUES
(3, 4, 4, '<div>halo juga</div>', '2022-02-08 18:37:08', '2022-02-08 18:37:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topics`
--

CREATE TABLE `topics` (
  `topicID` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `genre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `topics`
--

INSERT INTO `topics` (`topicID`, `user_id`, `genre`, `title`, `description`, `slug`, `genre_id`, `created_at`, `updated_at`) VALUES
(4, 1, '1', 'haloo', '<div>aku baru masuk nih</div>', 'aaaa', 0, '2022-02-07 19:22:27', '2022-02-08 17:51:15'),
(7, 1, '', 'Musik Jazz', '<div>Jazz itu keren</div>', 'musik-jazz', 0, '2022-02-07 23:32:02', '2022-02-07 23:32:02'),
(9, 1, '', 'Hallo', '<div>Hallo</div>', 'hallo', 0, '2022-02-08 07:36:35', '2022-02-08 07:36:35'),
(10, 1, '', 'a', '<div>a</div>', 'a', 0, '2022-02-08 07:36:52', '2022-02-08 07:36:52'),
(11, 4, '', 'ONE OK ROCK', '<div>ONE OK ROCK so cool!</div>', 'one-ok-rock', 0, '2022-02-08 19:17:31', '2022-02-08 19:17:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('member','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_fav1` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre_fav2` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `role`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `date_of_birth`, `home_address`, `gender`, `phone_number`, `genre_fav1`, `genre_fav2`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', '$2y$10$xBBpJVrCgsLh3E6f72c7L.EGhRiWtw0W0yY/7.aByCHG9sk5E.AK.', NULL, NULL, '27/02/1998', 'Medan Selayang', 'male', '085362400359', 'Jazz', 'Pop', '2022-02-07 10:48:42', '2022-02-08 18:14:38'),
(4, 'Evan Yosua', 'evan@gmail.com', 'member', '$2y$10$jcxUT.wXGQgNI2B0JboKAe6eGAkdzwuVCv9K3KP.y0A2h/29EzB3m', NULL, NULL, '27/02/1998', 'Medan Selayang', 'Male', '085362400359', 'Pop', 'Classic', '2022-02-07 11:37:00', '2022-02-08 18:18:27'),
(7, 'Eugeo', 'eugeo@gmail.com', 'member', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-08 10:55:33', '2022-02-08 10:55:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `index`
--
ALTER TABLE `index`
  ADD PRIMARY KEY (`topicID`);

--
-- Indeks untuk tabel `listclassics`
--
ALTER TABLE `listclassics`
  ADD PRIMARY KEY (`listID`);

--
-- Indeks untuk tabel `listjazzs`
--
ALTER TABLE `listjazzs`
  ADD PRIMARY KEY (`listID`);

--
-- Indeks untuk tabel `listpops`
--
ALTER TABLE `listpops`
  ADD PRIMARY KEY (`listID`);

--
-- Indeks untuk tabel `listrocks`
--
ALTER TABLE `listrocks`
  ADD PRIMARY KEY (`listID`);

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `playlistclassics`
--
ALTER TABLE `playlistclassics`
  ADD PRIMARY KEY (`playlistID`);

--
-- Indeks untuk tabel `playlistjazz`
--
ALTER TABLE `playlistjazz`
  ADD PRIMARY KEY (`playlistID`);

--
-- Indeks untuk tabel `playlistpops`
--
ALTER TABLE `playlistpops`
  ADD PRIMARY KEY (`playlistID`);

--
-- Indeks untuk tabel `playlistrocks`
--
ALTER TABLE `playlistrocks`
  ADD PRIMARY KEY (`playlistID`);

--
-- Indeks untuk tabel `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_user_id_foreign` (`user_id`),
  ADD KEY `replies_topic_id_foreign` (`topic_id`);

--
-- Indeks untuk tabel `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topicID`),
  ADD KEY `topics_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `index`
--
ALTER TABLE `index`
  MODIFY `topicID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `listclassics`
--
ALTER TABLE `listclassics`
  MODIFY `listID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `listjazzs`
--
ALTER TABLE `listjazzs`
  MODIFY `listID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `listpops`
--
ALTER TABLE `listpops`
  MODIFY `listID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `listrocks`
--
ALTER TABLE `listrocks`
  MODIFY `listID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `playlistclassics`
--
ALTER TABLE `playlistclassics`
  MODIFY `playlistID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `playlistjazz`
--
ALTER TABLE `playlistjazz`
  MODIFY `playlistID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `playlistpops`
--
ALTER TABLE `playlistpops`
  MODIFY `playlistID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `playlistrocks`
--
ALTER TABLE `playlistrocks`
  MODIFY `playlistID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `topics`
--
ALTER TABLE `topics`
  MODIFY `topicID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topicID`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
