-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 09:38 PM
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
(2, 9),
(2, 47),
(2, 48),
(2, 53),
(2, 54),
(2, 59),
(2, 71),
(2, 72);

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
(34, '::1', 'admin12@gmail.com', 3, '2022-10-13 08:54:43', 1),
(35, '::1', 'admin12@gmail.com', 3, '2022-10-18 02:57:47', 1),
(36, '::1', 'admin12@gmail.com', 3, '2022-10-18 19:32:07', 1),
(37, '::1', 'ditosetiawan@gmail.com', 5, '2022-10-19 02:40:08', 1),
(38, '::1', 'admin12@gmail.com', 3, '2022-10-19 02:42:37', 1),
(39, '::1', 'admin12@gmail.com', 3, '2022-10-19 07:48:53', 1),
(40, '::1', 'admin12@gmail.com', 3, '2022-10-19 12:05:48', 1),
(41, '::1', 'admin12@gmail.com', 3, '2022-10-19 22:42:39', 1),
(42, '::1', 'admin12@gmail.com', 3, '2022-10-20 03:42:16', 1),
(43, '::1', 'admin12@gmail.com', 3, '2022-10-20 20:01:20', 1),
(44, '::1', 'admin12@gmail.com', 3, '2022-10-21 01:27:32', 1),
(45, '::1', 'admin12@gmail.com', 3, '2022-10-21 14:10:47', 1),
(46, '::1', 'admin12@gmail.com', 3, '2022-10-21 19:58:33', 1),
(47, '::1', 'admin12@gmail.com', 3, '2022-10-22 07:54:53', 1),
(48, '::1', 'admin12@gmail.com', 3, '2022-10-22 10:34:38', 1),
(49, '::1', 'admin12@gmail.com', 3, '2022-10-23 00:07:29', 1),
(50, '::1', 'admin12@gmail.com', 3, '2022-10-24 00:27:02', 1),
(51, '::1', 'maria.verena@ti.ukdw.ac.id', 10, '2022-10-24 03:17:20', 1),
(52, '::1', 'admin12@gmail.com', 3, '2022-10-24 03:17:38', 1),
(53, '::1', 'admin12@gmail.com', 3, '2022-10-24 08:48:59', 1),
(54, '::1', 'mariaverena@gmail.com', 10, '2022-10-24 10:32:10', 1),
(55, '::1', 'admin12@gmail.com', 3, '2022-10-24 10:34:24', 1),
(56, '::1', 'maria.verena@ti.ukdw.ac.id', NULL, '2022-10-24 14:28:09', 0),
(57, '::1', 'maria.verena@ti.ukdw.ac.id', NULL, '2022-10-24 14:28:22', 0),
(58, '::1', 'admin12@gmail.com', 3, '2022-10-24 14:28:45', 1),
(59, '::1', 'maria.verena@ti.ukdw.ac.id', 10, '2022-10-24 14:29:38', 1),
(60, '::1', 'admin12@gmail.com', 3, '2022-10-24 14:37:32', 1),
(61, '::1', 'mariaverena', NULL, '2022-10-24 14:38:04', 0),
(62, '::1', 'maria.verena@ti.ukdw.ac.id', 10, '2022-10-24 14:38:49', 1),
(63, '::1', 'admin12@gmail.com', 3, '2022-10-25 00:23:32', 1),
(64, '::1', 'mariaverena', NULL, '2022-10-25 00:25:14', 0),
(65, '::1', 'admin12@gmail.com', 3, '2022-10-25 00:25:32', 1),
(66, '::1', 'mariaverena', NULL, '2022-10-25 00:57:37', 0),
(67, '::1', 'admin12@gmail.com', 3, '2022-10-25 01:01:04', 1),
(68, '::1', 'mariaverena', NULL, '2022-10-25 01:02:52', 0),
(69, '::1', 'admin12@gmail.com', 3, '2022-10-25 01:05:12', 1),
(70, '::1', 'mariaverena', NULL, '2022-10-25 01:05:19', 0),
(71, '::1', 'maria.verena@ti.ukdw.ac.id', 10, '2022-10-25 01:06:05', 1),
(72, '::1', 'mariaverena', 10, '2022-10-25 01:06:26', 0),
(73, '::1', 'mariaverena', 10, '2022-10-25 01:12:28', 0),
(74, '::1', 'mariaverena', NULL, '2022-10-25 01:13:48', 0),
(75, '::1', 'mariaverena', 10, '2022-10-25 01:13:57', 0),
(76, '::1', 'mariaverena', 10, '2022-10-25 01:16:41', 0),
(77, '::1', 'mariaverena', 10, '2022-10-25 01:17:13', 0),
(78, '::1', 'mariaverena', 10, '2022-10-25 01:18:27', 0),
(79, '::1', 'mariaverena', NULL, '2022-10-25 01:19:43', 0),
(80, '::1', 'mariaverena', 10, '2022-10-25 01:19:58', 0),
(81, '::1', 'mariaverena', NULL, '2022-10-25 01:20:55', 0),
(82, '::1', 'mariaverena', 10, '2022-10-25 01:21:31', 0),
(83, '::1', 'mariaverena', 10, '2022-10-25 01:23:32', 0),
(84, '::1', 'mariaverena', NULL, '2022-10-25 01:23:48', 0),
(85, '::1', 'mariaverena', 10, '2022-10-25 01:24:55', 0),
(86, '::1', 'mariaverena', 10, '2022-10-25 01:26:48', 0),
(87, '::1', 'mariaverena', 10, '2022-10-25 01:28:57', 0),
(88, '::1', 'mariaverena', 10, '2022-10-25 01:29:28', 0),
(89, '::1', 'mariaverena', 10, '2022-10-25 01:32:06', 0),
(90, '::1', 'mariaverena', 10, '2022-10-25 01:32:36', 0),
(91, '::1', 'mariaverena', 10, '2022-10-25 01:34:29', 0),
(92, '::1', 'mariaverena', 10, '2022-10-25 01:36:22', 0),
(93, '::1', 'mariaverena', 10, '2022-10-25 01:40:35', 0),
(94, '::1', 'mariaverena', 10, '2022-10-25 01:41:21', 0),
(95, '::1', 'mariaverena', 10, '2022-10-25 01:43:09', 0),
(96, '::1', 'mariaverena', NULL, '2022-10-25 01:43:17', 0),
(97, '::1', 'mariaverena', 10, '2022-10-25 01:46:57', 0),
(98, '::1', 'maria.verena@ti.ukdw.ac.id', 10, '2022-10-25 01:47:48', 1),
(99, '::1', 'mariaverena', 10, '2022-10-25 01:51:46', 0),
(100, '::1', 'mariaverena', 10, '2022-10-25 01:56:09', 0),
(101, '::1', 'yacinthus.dheka@ti.ukdw.ac.id', 9, '2022-10-25 01:56:51', 1),
(102, '::1', 'admin12@gmail.com', 3, '2022-10-25 02:11:13', 1),
(103, '::1', 'mariaverena', NULL, '2022-10-25 02:12:00', 0),
(104, '::1', 'admin12@gmail.com', 3, '2022-10-25 02:14:11', 1),
(105, '::1', 'mariaverena', NULL, '2022-10-25 02:14:48', 0),
(106, '::1', 'mariaverena', NULL, '2022-10-25 02:15:22', 0),
(107, '::1', 'maria.verena@ti.ukdw.ac.id', 10, '2022-10-25 02:15:56', 1),
(108, '::1', 'mariaverena', NULL, '2022-10-25 02:20:20', 0),
(109, '::1', 'admin12@gmail.com', 3, '2022-10-25 03:17:46', 1),
(110, '::1', 'mariaverena', NULL, '2022-10-25 03:30:48', 0),
(111, '::1', 'admin12@gmail.com', 3, '2022-10-25 03:32:34', 1),
(112, '::1', 'mariaverena', NULL, '2022-10-25 03:50:45', 0),
(113, '::1', 'admin12@gmail.com', 3, '2022-10-25 03:51:25', 1),
(114, '::1', 'mariaverena', NULL, '2022-10-25 03:54:00', 0),
(115, '::1', 'mariaverena', NULL, '2022-10-25 03:54:24', 0),
(116, '::1', 'admin12@gmail.com', 3, '2022-10-25 03:58:55', 1),
(117, '::1', 'maria.verena@ti.ukdw.ac.id', 18, '2022-10-25 05:30:00', 1),
(118, '::1', 'admin12@gmail.com', 3, '2022-10-25 05:30:18', 1),
(119, '::1', 'mariaverena', NULL, '2022-10-25 05:59:49', 0),
(120, '::1', 'admin12@gmail.com', 3, '2022-10-25 06:00:05', 1),
(121, '::1', 'mariaverena', NULL, '2022-10-25 06:07:17', 0),
(122, '::1', 'mariaverena', NULL, '2022-10-25 06:08:40', 0),
(123, '::1', 'admin12@gmail.com', 3, '2022-10-25 06:19:17', 1),
(124, '::1', 'mariaverena', NULL, '2022-10-25 06:20:36', 0),
(125, '::1', 'admin12@gmail.com', 3, '2022-10-25 08:11:33', 1),
(126, '::1', 'asu', NULL, '2022-10-25 08:15:03', 0),
(127, '::1', 'asu@gmail.com', 28, '2022-10-25 08:15:10', 1),
(128, '::1', 'asu', NULL, '2022-10-25 08:16:00', 0),
(129, '::1', 'asu@gmail.com', 28, '2022-10-25 08:16:04', 1),
(130, '::1', 'adminukdw', NULL, '2022-10-25 08:16:15', 0),
(131, '::1', 'adminukdw', NULL, '2022-10-25 08:16:26', 0),
(132, '::1', 'admin12@gmail.com', 3, '2022-10-25 08:16:56', 1),
(133, '::1', 'asu', NULL, '2022-10-25 08:18:12', 0),
(134, '::1', 'asu@gmail.com', 28, '2022-10-25 08:18:20', 1),
(135, '::1', 'admin12@gmail.com', 3, '2022-10-25 08:19:22', 1),
(136, '::1', 'asu', NULL, '2022-10-25 08:20:24', 0),
(137, '::1', 'asu', NULL, '2022-10-25 08:20:47', 0),
(138, '::1', 'asu', NULL, '2022-10-25 08:20:59', 0),
(139, '::1', 'admin12@gmail.com', 3, '2022-10-25 08:25:26', 1),
(140, '::1', 'admin12@gmail.com', 3, '2022-10-25 19:46:44', 1),
(141, '::1', 'admin12@gmail.com', 3, '2022-10-26 06:49:56', 1),
(142, '::1', 'admin12@gmail.com', 3, '2022-10-26 23:09:01', 1),
(143, '::1', 'admin12@gmail.com', 3, '2022-10-27 00:10:33', 1),
(144, '::1', 'renaldi.kristian', NULL, '2022-10-27 01:08:51', 0),
(145, '::1', 'renaldi.kristian', NULL, '2022-10-27 01:09:05', 0),
(146, '::1', 'renaldi.kristian', NULL, '2022-10-27 01:09:48', 0),
(147, '::1', 'maria.verena@ti.ukdw.ac.id', 29, '2022-10-27 01:10:18', 1),
(148, '::1', 'admin12@gmail.com', 3, '2022-10-27 01:11:26', 1),
(149, '::1', 'admin12@gmail.com', 3, '2022-10-27 19:31:44', 1),
(150, '::1', 'admin12@gmail.com', 3, '2022-10-27 23:31:03', 1),
(151, '::1', 'tes@gmail.com', 38, '2022-10-28 02:10:11', 1),
(152, '::1', 'admin12@gmail.com', 3, '2022-10-28 02:20:33', 1),
(153, '::1', 'admin12@gmail.com', 3, '2022-10-28 19:29:44', 1),
(154, '::1', 'admin12@gmail.com', 3, '2022-10-29 08:08:17', 1),
(155, '::1', 'admin12@gmail.com', 3, '2022-10-30 07:06:18', 1),
(156, '::1', 'admin12@gmail.com', 3, '2022-10-30 09:27:13', 1),
(157, '::1', 'admin12@gmail.com', 3, '2022-10-30 13:26:01', 1),
(158, '::1', 'admin12@gmail.com', 3, '2022-10-31 00:15:37', 1),
(159, '::1', 'admin12@gmail.com', 3, '2022-10-31 01:16:31', 1),
(160, '::1', 'admin12@gmail.com', 3, '2022-10-31 07:17:37', 1),
(161, '::1', 'admin12@gmail.com', 3, '2022-11-01 19:56:50', 1),
(162, '::1', 'admin12@gmail.com', 3, '2022-11-02 07:10:32', 1),
(163, '::1', 'yacinthus.dheka@ti.ukdw.ac.id', 9, '2022-11-02 07:49:57', 1),
(164, '::1', 'admin12@gmail.com', 3, '2022-11-02 07:50:12', 1),
(165, '::1', 'maria.verena@ti.ukdw.ac.id', 54, '2022-11-02 07:55:10', 1),
(166, '::1', 'admin12@gmail.com', 3, '2022-11-02 08:00:29', 1);

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
-- Table structure for table `hapus_user`
--

CREATE TABLE `hapus_user` (
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
  `foto_profil` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hapus_user`
--

INSERT INTO `hapus_user` (`idUser`, `nik`, `nim`, `alamat`, `no_hp`, `tipe_user`, `room_access`, `nip`, `nidn`, `nama`, `username`, `created_at`, `updated_at`, `deleted_at`, `foto_profil`, `last_login`) VALUES
(9, 0, 71190423, 'Jl. merak no 1', 2147483647, 'Mahasiswa', 'ALFTI3', 0, 0, 'Yacinthus Dheka Pratomo Putro', 'yacinthus.dheka', '2022-10-18 15:08:50', NULL, NULL, NULL, '2022-10-25 13:56:51'),
(44, 0, 71190500, 'Jl. Merak no 10', 2147483647, 'Mahasiswa', 'ALFTI3', 0, 0, 'Maria Verena Putri Ngganggus', 'mariaverena', '2022-10-25 20:27:14', NULL, NULL, NULL, '2022-10-27 13:10:18'),
(46, 0, 0, 'Jl. Olahraga no 1', 2147483647, 'Dosen', 'ALFTI3', 123456, 112356432, 'tes', 'tes', '2022-10-29 20:21:17', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(51, 0, 71190500, 'Jl. Merak no 10', 2147483647, 'Mahasiswa', 'ALFTI3', 0, 0, 'Maria Verena Putri Ngganggus', 'maria.verena', '2022-10-25 20:27:14', NULL, NULL, NULL, '2022-10-27 13:10:18'),
(52, 0, 0, 'Jl. Olahraga no 1', 2147483647, 'Dosen', 'ALFTI3', 123456, 1123564333, 'Tes', 'tes', '2022-10-29 20:21:17', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(58, 0, 71190423, 'Jl. Merak no 5', 2147483647, 'Mahasiswa', 'ALFTI3', 0, 0, 'Yacinthus Dheka Pratomo Putro', 'yacinthus.dheka', '2022-11-02 20:20:03', NULL, NULL, NULL, '0000-00-00 00:00:00');

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

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id_gedung` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `kode_ruangan` varchar(50) NOT NULL,
  `kondisi_ruangan` text NOT NULL,
  `kapasitas_ruangan` int(11) NOT NULL,
  `terisi` bigint(20) DEFAULT NULL,
  `gedung` varchar(50) DEFAULT NULL,
  `lantai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id_gedung`, `nama_ruangan`, `kode_ruangan`, `kondisi_ruangan`, `kapasitas_ruangan`, `terisi`, `gedung`, `lantai`) VALUES
(1, 'Lab FTI 3', 'ALFTI3', 'Normal', 82, 0, 'Agape', 3);

-- --------------------------------------------------------

--
-- Table structure for table `smartcard`
--

CREATE TABLE `smartcard` (
  `idCard` varchar(50) NOT NULL,
  `idCardUser` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `idCardUser` varchar(50) DEFAULT NULL,
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `idCardUser`, `nik`, `nim`, `alamat`, `no_hp`, `tipe_user`, `room_access`, `nip`, `nidn`, `nama`, `username`, `created_at`, `updated_at`, `deleted_at`, `foto_profil`) VALUES
(8, 'dsn-112356432', 0, 0, 'Jl. Olahraga no 1', 2147483647, 'Dosen', 'ALFTI3', 123456, 112356432, 'Tes', 'tes', '2022-10-29 20:21:17', '2022-10-31 22:53:20', NULL, NULL),
(9, 'mhs-71190500', 0, 71190500, 'Jl. Merak no 10', 2147483647, 'Mahasiswa', 'ALFTI3', 0, 0, 'Maria Verena Putri Ngganggus', 'maria.verena', '2022-10-25 20:27:14', '2022-11-02 19:54:54', NULL, NULL),
(14, 'mhs-71190423', 0, 71190423, 'Jl. merak no 1', 2147483647, 'Mahasiswa', 'ALFTI3', 0, 0, 'Yacinthus Dheka Pratomo Putro', 'yacinthus.dheka', '2022-10-18 15:08:50', '2022-11-02 20:23:15', NULL, NULL),
(26, 'staff-24455666', 444444, NULL, 'ddd', 2147483647, 'Staff', 'ALFTI3', 24455666, NULL, 'sarkem', 'sarkem', '2022-11-02 21:28:59', NULL, NULL, 'pexels-maria-orlova-4947569 (1).jpg'),
(27, 'tm-323224442', 323224442, NULL, 'vvvv', 2147483647, 'Tamu', 'ALFTI3', NULL, NULL, 'teke', 'tekebosok', '2022-11-02 21:29:45', NULL, NULL, 'pexels-maria-orlova-4947569 (1)_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
(3, 'admin12@gmail.com', 'adminukdw', '$argon2id$v=19$m=2048,t=4,p=4$NGJsdE1uTnVPUVp6aHVVcA$iRBzg7VTxWtBFdvrkzcL01vcUClgSJw2QTB40vGM9Gg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-11 12:39:55', '2022-11-02 08:00:29', NULL, '2022-10-13 07:17:29'),
(53, 'tes1234@gmail.com', 'tes', '$argon2id$v=19$m=2048,t=4,p=4$UFNIeVJkT0dOcTUxOERNMg$BNEWaPYrj3g1n1+UETBhbFqj2uMxOX3dUX70dxwMDcw', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-29 20:21:17', '2022-10-31 22:53:20', NULL, '0000-00-00 00:00:00'),
(54, 'maria.verena@ti.ukdw.ac.id', 'maria.verena', '$argon2id$v=19$m=2048,t=4,p=4$V2h4YnNpaFhvOXhKa3JQQw$uqbCh7+kgR7piZiA7cb5kYPr0apEliU4r4J7t55WETQ', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-25 20:27:14', '2022-11-02 07:55:10', NULL, '2022-11-02 19:55:10'),
(59, 'yacinthus.dheka@ti.ukdw.ac.id', 'yacinthus.dheka', '$argon2id$v=19$m=2048,t=4,p=4$aUx6WWpwb3p4ZWRDTmtzag$iMtw5oH7RijS59JCvmcX26d74epVnNiGUY2g+1i78wM', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-02 20:20:03', '2022-11-02 20:23:15', NULL, '0000-00-00 00:00:00'),
(71, 'sarkem@gmail.com', 'sarkem', '$argon2id$v=19$m=2048,t=4,p=4$d1lkSURaQ0FUeDFpR2J4Mg$/aEP0zXuh4Ew0zSvEss5D3/QN737ZA9C4flmWF7IRzQ', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-02 21:28:59', NULL, NULL, NULL),
(72, 'tekebosok@gmail.com', 'tekebosok', '$argon2id$v=19$m=2048,t=4,p=4$ZXpqcC9QVU8zWElET29uZA$LFHUSo/2URzv1ZSjIBEG6s6VZhSiAR9YfhHAMX1RFH0', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-02 21:29:45', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas_user`
--
ALTER TABLE `aktivitas_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCard` (`idCard`);

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
-- Indexes for table `hapus_user`
--
ALTER TABLE `hapus_user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD KEY `kode_ruangan` (`kode_ruangan`);

--
-- Indexes for table `smartcard`
--
ALTER TABLE `smartcard`
  ADD PRIMARY KEY (`idCard`),
  ADD KEY `idCardUser` (`idCardUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `room_access` (`room_access`),
  ADD KEY `idCardUser` (`idCardUser`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

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
-- AUTO_INCREMENT for table `hapus_user`
--
ALTER TABLE `hapus_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivitas_user`
--
ALTER TABLE `aktivitas_user`
  ADD CONSTRAINT `aktivitas_user_fk` FOREIGN KEY (`idCard`) REFERENCES `smartcard` (`idCard`);

--
-- Constraints for table `smartcard`
--
ALTER TABLE `smartcard`
  ADD CONSTRAINT `smartcard_fk` FOREIGN KEY (`idCardUser`) REFERENCES `user` (`idCardUser`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`room_access`) REFERENCES `rooms` (`kode_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
