-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Nov 2021 pada 17.24
-- Versi server: 8.0.26
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geomap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `text`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Intro', '<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: 11pt; font-family: Calibri, sans-serif; line-height: 16.8667px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><b><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif; border: 1pt none windowtext; padding: 0cm;\">JASA PEMBUATAN PETA</span></b><b><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif; border: 1pt none windowtext; padding: 0cm;\"><o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: 11pt; font-family: Calibri, sans-serif; line-height: 16.8667px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif; border: 1pt none windowtext; padding: 0cm;\">Selamat datang di GeoMap</span><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif; border: 1pt none windowtext; padding: 0cm;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: 11pt; font-family: Calibri, sans-serif; line-height: 16.8667px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif; border: 1pt none windowtext; padding: 0cm;\">Pada saat ini, pembuatan sebuah peta sebagian besar sudah berbasis digital, dimana aplikasi atau <i>software</i> yang sering digunakan serta yang paling populer dalam pembuatan atau mensimulasikan peta tersebut salah satunya adalah </span><span lang=\"EN-US\"><a href=\"https://www.indonesia-geospasial.com/2020/07/download-aplikasi-open-source.html\" target=\"_blank\" style=\"color: blue; text-decoration: underline;\"><span style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif; color: black; border: 1pt none windowtext; padding: 0cm; text-decoration-line: none;\">ArcGIS</span></a></span><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif; border: 1pt none windowtext; padding: 0cm;\">&nbsp;yang merupakan aplikasi pemetaan pada tingkat lanjut.</span><span lang=\"EN-US\" style=\"font-family: Arial, sans-serif;\"> </span><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif; border: 1pt none windowtext; padding: 0cm;\">Namun saat ini tenaga yang mampu menguasai dalam mengaplikasikan software ini masih kurang, karena aplikasi&nbsp;</span><span lang=\"EN-US\"><a href=\"https://www.indonesia-geospasial.com/2020/07/download-aplikasi-open-source.html\" target=\"_blank\" style=\"color: blue; text-decoration: underline;\"><span style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif; color: black; border: 1pt none windowtext; padding: 0cm; text-decoration-line: none;\">ArcGIS</span></a></span><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif; border: 1pt none windowtext; padding: 0cm;\">&nbsp;tergolong rumit dalam pengoperasiannya.</span><span lang=\"EN-US\" style=\"font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: 11pt; font-family: Calibri, sans-serif; line-height: 16.8667px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif; border: 1pt none windowtext; padding: 0cm;\">Disini Kami</span><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif;\">&nbsp;melayani jasa pembuatan peta dan pengolahan analisis data spasial berbasis GIS&nbsp;<i><span style=\"border: 1pt none windowtext; padding: 0cm;\">(Geographic Information System)&nbsp;</span></i>&nbsp;untuk berbagai macam kebutuhan pengerjaan anda seperti tugas penelitian, skripsi, tesis, project pekerjaan pemetaan untuk Instansi Pemerintah, Swasta atau Perusahaan dan lain sebagainya. Dengan waktu pengerjaan yang cepat dan tidak ada batasan revisi hingga acc. Biaya pengerjaan terjangkau dan disesuaikan dengan ketersediaan data dan tingkat kesulitan.</span><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: 11pt; font-family: Calibri, sans-serif; line-height: 16.8667px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><b><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif;\">Jenis Peta Yang Kami Layani</span></b><b><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif;\"><o:p></o:p></span></b></p><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><ol><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Administrasi Suatu Wilayah</span></li><li><span style=\"font-family: Calibri, sans-serif; font-size: 11pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Tematik (Peta Jaringan Jalan, Peta Jaringan Sungai, Peta Kemiringan Lereng, dll)</span></li><li><span style=\"font-family: Calibri, sans-serif; font-size: 11pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta untuk Penelitian (Skripsi/Tesis/Desertasi)</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Lokasi Penelitian/Sampel Penelitian</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Citra Satelit</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Kontur</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Topografi</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Kemiringan Lereng</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Curah Hujan</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Jenis Tanah</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Geologi</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Penggunaan Lahan</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Tutupan Lahan</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta DAS (Daerah Aliran Sungai)</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Kepadatan Penduduk</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Sebaran Fasilitas</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 11pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta Izin Usaha (SHP Complete untuk OSS RBA)</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Pengolahan Hasil Foto Udara Menggunakan Drone</span></li></ol><span style=\"background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-family: Arial, sans-serif; font-size: 10.5pt;\">Dan lain-lain.</span><br></blockquote><span style=\"background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-family: Arial, sans-serif;\"><br>Kami juga melayani berbagai Pengolahan data spasial diantaranya:</span><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><span style=\"background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-family: Arial, sans-serif; font-size: 11pt;\">Digitasi Peta</span><br><span style=\"background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-family: Arial, sans-serif; font-size: 11pt;\">Analisi Overlay (sesuai Pesanan)</span><br><span style=\"background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-family: Arial, sans-serif; font-size: 11pt;\">Perubahan Penggunaan/Tutupan Lahan</span><br><span style=\"background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-family: Arial, sans-serif; font-size: 11pt;\">Kemampuan Lahan</span><br><span style=\"background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-family: Arial, sans-serif; font-size: 11pt;\">Kesesuaian Lahan</span><br><span style=\"background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-family: Arial, sans-serif; font-size: 11pt;\">Potensi bencana (Longsor, Banjir, Tsunami, dll)</span><br><span style=\"background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-family: Arial, sans-serif; font-size: 11pt;\">Penentuan Lokasi Optimum</span><br><span style=\"background-color: rgba(255,255,255,var(--tw-bg-opacity)); font-family: Arial, sans-serif; font-size: 11pt;\">Dan lain-lain.</span><br></blockquote><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt 36pt; font-size: 11pt; font-family: Calibri, sans-serif; line-height: 16.8667px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><span lang=\"EN-US\" style=\"font-family: Arial, sans-serif;\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: 11pt; font-family: Calibri, sans-serif; line-height: 16.8667px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; vertical-align: baseline;\"><b><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif;\">Proses Pemesanan</span></b><b><span lang=\"EN-US\" style=\"font-size: 10.5pt; line-height: 16.1px; font-family: Arial, sans-serif;\"><o:p></o:p></span></b></p><ol start=\"1\" type=\"1\" style=\"margin-bottom: 0cm;\"><ol><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Client berkonsultasi tentang peta yang akan dibuat.</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 11pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Operator akan mengirimkan sample-sample peta kepada client atau client mengirimkan contoh peta kepada operator.</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Client akan mendapatkan informasi mengenai biaya yang akan dibayarkan.</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 11pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Prosesm pembayaran atau DP terlebih dahulu.</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Proses pengerjaan (durasi waktu pengerjaan tergantung tingkat kesulitan peta)</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Peta atau data dikirimkan kepada client (jenis file yang dikirim berupa file JPEG, PDF, SHP dan lain-lain atau disesuaikan dengan kebutuhan client)</span></li><li><span style=\"font-family: Arial, sans-serif; font-size: 10.5pt; background-color: rgba(255,255,255,var(--tw-bg-opacity));\">Jika peta atau data yang dikirimkan belum sesuai maka client dapat mengajukan revisi hingga sesuai.</span></li></ol></ol><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: 11pt; font-family: Calibri, sans-serif; line-height: 16.8667px;\"><span lang=\"EN-US\" style=\"font-family: Arial, sans-serif;\">Untuk proses negosiasi dan pemesanan, jangan sungkan untuk sekedar bertanya melalui no WhatsApp 0852-9897-2355 atau <u><a href=\"https://api.whatsapp.com/send?phone=+6285298972355&amp;text=Halo,%20saya%20ingin%20membuat%20peta\" title=\"link pesan\" target=\"\">klik disini</a></u><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 0cm 0cm 8pt; font-size: 11pt; font-family: Calibri, sans-serif; line-height: 16.8667px;\"><span lang=\"EN-US\" style=\"font-family: Arial, sans-serif;\">&nbsp;</span></p>', '2021-11-23/AhRHAWVPHlsxz34td6XyruqJNIT963geVsv1ANf5.png', '2021-11-22 17:19:05', '2021-11-22 17:23:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_11_20_140714_create_blogs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, NULL, '$2y$10$doLknImcdUVrK98mhElANOeIAUSG2jKO5ZyfLpXeJGzAMQO9mt5uq', NULL, '2021-11-22 17:17:44', '2021-11-22 17:17:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
