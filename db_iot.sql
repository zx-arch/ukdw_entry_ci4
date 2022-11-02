-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 04:31 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iot`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas_user`
--

CREATE TABLE `aktivitas_user` (
  `id` bigint(20) NOT NULL,
  `idCard` varchar(50) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `status_aktivitas` enum('masuk','keluar','','') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
CREATE TABLE `rooms` (
  `id_gedung` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `kode_ruangan` varchar(50) NOT NULL,
  `kondisi_ruangan` text NOT NULL,
  `kapasitas_ruangan` int(11) NOT NULL,
  `terisi` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id_gedung`, `nama_ruangan`, `kode_ruangan`, `kondisi_ruangan`, `kapasitas_ruangan`, `terisi`) VALUES
(1, 'Lab FTI 3', 'ALFTI3', 'Normal', 30, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nik` bigint(20) DEFAULT NULL,
  `nim` int(8) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` int(12) DEFAULT NULL,
  `tipe_user` enum('Mahasiswa','Dosen','Staff','Tamu') DEFAULT NULL,
  `room_access` varchar(50) DEFAULT NULL,
  `nip` bigint(20) DEFAULT NULL,
  `nidn` bigint(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `foto_profil` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'user', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 3),
(2, 5),
(2, 6),
(2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'adminukdw', NULL, '2022-10-11 12:38:52', 0),
(2, '::1', 'admin', 1, '2022-10-11 12:39:02', 0),
(3, '::1', 'admin', 1, '2022-10-11 12:39:17', 0),
(4, '::1', 'admin12@gmail.com', 3, '2022-10-11 12:40:00', 1),
(5, '::1', 'admin12@gmail.com', 3, '2022-10-11 20:20:20', 1),
(6, '::1', 'admin12@gmail.com', 3, '2022-10-11 20:55:40', 1),
(7, '::1', 'admin12@gmail.com', 3, '2022-10-11 21:44:34', 1),
(8, '::1', 'admin12@gmail.com', 3, '2022-10-11 22:20:56', 1),
(9, '::1', 'ditosetiawan@gmail.com', 4, '2022-10-11 23:11:17', 1),
(10, '::1', 'ditosetiawan', NULL, '2022-10-12 00:19:02', 0),
(11, '::1', 'admin12@gmail.com', 3, '2022-10-12 00:19:13', 1),
(12, '::1', 'admin12@gmail.com', 3, '2022-10-12 00:35:53', 1),
(13, '::1', 'ditosetiawan@gmail.com', 5, '2022-10-12 00:42:39', 1),
(14, '::1', 'admin12@gmail.com', 3, '2022-10-12 01:04:15', 1),
(15, '::1', 'ditosetiawan@gmail.com', 5, '2022-10-12 02:27:54', 1),
(16, '::1', 'rendiwijaya@gmail.com', 8, '2022-10-12 03:19:19', 1),
(17, '::1', 'admin12@gmail.com', 3, '2022-10-12 03:25:55', 1),
(18, '::1', 'admin12@gmail.com', 3, '2022-10-12 03:34:41', 1),
(19, '::1', 'admin12@gmail.com', 3, '2022-10-12 06:18:52', 1),
(20, '::1', 'ditosetiawan@gmail.com', 5, '2022-10-12 06:19:14', 1),
(21, '::1', 'ditosetiawan@gmail.com', 5, '2022-10-12 17:43:58', 1),
(22, '::1', 'ditosetiawan@gmail.com', 5, '2022-10-12 18:09:02', 1),
(23, '::1', 'ditosetiawan@gmail.com', 5, '2022-10-12 18:17:11', 1),
(24, '::1', 'admin12@gmail.com', 3, '2022-10-12 19:00:48', 1),
(25, '::1', 'admin12@gmail.com', 3, '2022-10-12 19:11:43', 1),
(26, '::1', 'admin12@gmail.com', 3, '2022-10-12 19:20:26', 1),
(27, '::1', 'ditosetiawan@gmail.com', 5, '2022-10-12 19:20:52', 1),
(28, '::1', 'admin12@gmail.com', 3, '2022-10-12 19:24:27', 1),
(29, '::1', 'ditosetiawan@gmail.com', 5, '2022-10-12 19:34:54', 1),
(30, '::1', 'admin12@gmail.com', 3, '2022-10-12 19:52:55', 1),
(31, '::1', 'ditosetiawan@gmail.com', 5, '2022-10-12 19:54:33', 1),
(32, '::1', 'admin12@gmail.com', 3, '2022-10-13 08:39:39', 1),
(33, '::1', 'ditosetiawan@gmail.com', 5, '2022-10-13 08:53:26', 1),
(34, '::1', 'admin12@gmail.com', 3, '2022-10-13 08:54:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1665508780, 1);

-- --------------------------------------------------------
CREATE TABLE `rooms` (
  `id_gedung` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `kode_ruangan` varchar(50) NOT NULL,
  `kondisi_ruangan` text NOT NULL,
  `kapasitas_ruangan` int(11) NOT NULL,
  `terisi` bigint(20) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id_gedung`, `nama_ruangan`, `kode_ruangan`, `kondisi_ruangan`, `kapasitas_ruangan`, `terisi`, `tgllahir`) VALUES
(1, 'Lab FTI 3', 'ALFTI3', 'Normal', 30, NULL, NULL);

--
-- Table structure for table `users`
--
CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nik` bigint(20) DEFAULT NULL,
  `nim` int(8) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` int(12) DEFAULT NULL,
  `tipe_user` enum('Mahasiswa','Dosen','Staff','Tamu') DEFAULT NULL,
  `room_access` varchar(50) DEFAULT NULL,
  `nip` bigint(20) DEFAULT NULL,
  `nidn` bigint(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `foto_profil` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `last_login`) VALUES
(3, 'admin12@gmail.com', 'adminukdw', '$argon2id$v=19$m=2048,t=4,p=4$eDVBTWliNVdXUER2alZubQ$JBEt9myh8Co9GUP1fSG4gZlNGFFhqV51oWYZ//Zop7I', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-11 12:39:55', '2022-10-13 08:54:43', NULL, '2022-10-13 07:17:29'),
(5, 'ditosetiawan@gmail.com', 'ditosetiawan', '$argon2id$v=19$m=2048,t=4,p=4$MWVSN1ZBbjRWSENoSzl1Vw$Y8ir5Rnhw3HXc0xCqIXCgFQ5Wj/rYXDnUbK+yDnz6JE', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-12 00:41:57', '2022-10-13 08:53:26', NULL, '2022-10-13 08:53:30'),
(6, 'renaldikristian@gmail.com', 'renaldikristian', '$argon2id$v=19$m=2048,t=4,p=4$YU5SYWpmRzZWZ0FidmpEeg$o31slf3RP+8WoVGjMPcIMqrgiZmd4joiosH+GBWDfL8', NULL, NULL, NULL, 'b9d57522572db5bbd8665bc95f1dc215', NULL, NULL, 0, 0, '2022-10-12 02:52:14', '2022-10-12 02:52:14', NULL, NULL),
(8, 'rendiwijaya@gmail.com', 'rendi', '$argon2id$v=19$m=2048,t=4,p=4$UHM1N3FHQjZOWENYVHptag$vKl+RO98ZGvlMu5Byio9RLXW86GL178Rt18Hs8CR7HE', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-12 03:18:59', '2022-10-12 03:19:19', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas_user`
--
ALTER TABLE `aktivitas_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas_user`
--
ALTER TABLE `aktivitas_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
