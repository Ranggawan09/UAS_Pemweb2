-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2024 pada 08.39
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
-- Database: `sisko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin', NULL, '2024-05-26 01:59:55', 0),
(2, '::1', 'rangga@gmail.com', 3, '2024-05-26 02:02:26', 1),
(3, '::1', 'rangga@gmail.com', 3, '2024-05-26 06:53:07', 1),
(4, '::1', 'akhul@gmail.com', 4, '2024-05-26 09:10:23', 1),
(5, '::1', 'rangga@gmail.com', 3, '2024-05-26 12:55:07', 1),
(6, '::1', 'akhul@gmail.com', 4, '2024-06-03 12:15:44', 1),
(7, '::1', 'akhul@gmail.com', 4, '2024-06-03 12:27:58', 1),
(8, '::1', 'akhul@gmail.com', 4, '2024-06-03 12:34:13', 1),
(9, '::1', 'akhul@gmail.com', 4, '2024-06-12 04:56:44', 1),
(10, '::1', 'akhul@gmail.com', 4, '2024-06-12 11:13:21', 1),
(11, '::1', 'akhul@gmail.com', 4, '2024-06-13 11:02:29', 1),
(12, '::1', 'rangga@gmail.com', 3, '2024-06-14 07:05:46', 1),
(13, '::1', 'rangga@gmail.com', 3, '2024-06-14 07:39:23', 1),
(14, '::1', 'rangga@gmail.com', 3, '2024-06-14 11:08:25', 1),
(15, '::1', 'rangga@gmail.com', 3, '2024-06-14 13:49:45', 1),
(16, '::1', 'rangga@gmail.com', 3, '2024-06-14 15:35:28', 1),
(17, '::1', 'rangga@gmail.com', 3, '2024-06-15 14:00:03', 1),
(18, '::1', 'rangga@gmail.com', 3, '2024-06-19 04:15:38', 1),
(19, '::1', 'rangga@gmail.com', 3, '2024-06-19 04:30:39', 1),
(20, '::1', 'rangga@gmail.com', 3, '2024-06-19 05:55:54', 1),
(21, '::1', 'rangga@gmail.com', 3, '2024-06-19 06:51:05', 1),
(22, '::1', 'rangga@gmail.com', 3, '2024-06-19 07:10:45', 1),
(23, '::1', 'rangga@gmail.com', 3, '2024-06-20 11:19:37', 1),
(24, '::1', 'rangga@gmail.com', 3, '2024-06-21 00:47:29', 1),
(25, '::1', 'rangga@gmail.com', 3, '2024-06-21 01:10:41', 1),
(26, '::1', 'rangga@gmail.com', 3, '2024-06-21 14:07:31', 1),
(27, '::1', 'admin', NULL, '2024-06-21 15:04:09', 0),
(28, '::1', '3123123122', NULL, '2024-06-21 15:04:37', 0),
(29, '::1', 'rangga@gmail.com', 3, '2024-06-21 15:04:44', 1),
(30, '::1', 'rangga@gmail.com', 3, '2024-06-22 14:36:10', 1),
(31, '::1', 'admin', NULL, '2024-06-22 14:45:40', 0),
(32, '::1', 'rangga@gmail.com', 3, '2024-06-22 14:45:48', 1),
(33, '::1', 'rangga@gmail.com', 3, '2024-06-22 15:30:29', 1),
(34, '::1', 'rangga@gmail.com', 3, '2024-06-23 02:49:44', 1),
(35, '::1', 'rangga@gmail.com', 3, '2024-06-23 06:00:06', 1),
(36, '::1', 'rangga@gmail.com', 3, '2024-06-23 06:26:05', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `gambar`, `nip`, `nama`) VALUES
(3, 'default.png', '751064', 'Ms. Josianne Wilkinson'),
(4, 'default.png', '181118', 'Ruben Grimes'),
(5, 'default.png', '431032', 'Alisa Kassulke'),
(6, 'default.png', '341298', 'Miss Hailee Klocko'),
(7, 'default.png', '376111', 'Dr. Ryann Adams'),
(8, 'default.png', '503836', 'Dr. Richmond Robel'),
(9, 'default.png', '649574', 'Prof. Alicia Littel V'),
(10, 'default.png', '362647', 'Saige Romaguera II'),
(11, 'default.png', '205338', 'Aiden Erdman'),
(12, 'default.png', '830851', 'Ms. Sheila Strosin III'),
(13, 'default.png', '562651', 'Miss Frances Cummerata'),
(14, 'default.png', '251453', 'Miss Amara Kilback DDS'),
(15, 'default.png', '363401', 'Beau Rowe'),
(16, 'default.png', '857502', 'Joe Doyle V'),
(17, 'default.png', '960441', 'Meagan Erdman'),
(18, 'default.png', '252137', 'Chelsey Lind DDS'),
(19, 'default.png', '434105', 'Estell Kessler'),
(20, 'default.png', '190015', 'Mrs. Tina Hilpert'),
(21, 'default.png', '307926', 'Mr. Norberto O\'Kon'),
(22, 'default.png', '569405', 'River King'),
(23, 'default.png', '795365', 'Cale Blanda'),
(24, 'default.png', '621628', 'Mrs. Yolanda Gislason'),
(25, 'default.png', '821858', 'Dannie Miller'),
(26, 'default.png', '842869', 'Daphnee Kerluke'),
(27, 'default.png', '524548', 'Ferne Schamberger'),
(28, 'default.png', '768261', 'Cordia Barrows'),
(29, 'default.png', '987346', 'Enrique Lesch'),
(30, 'default.png', '707588', 'Thora Davis'),
(31, 'default.png', '304643', 'Emma Bednar'),
(32, 'default.png', '358084', 'Cierra Nitzsche');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jam` varchar(30) NOT NULL,
  `guru_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari`, `mapel`, `kelas`, `jam`, `guru_id`) VALUES
(53, ' Jumat', ' Penjas', '9B', '07.00-09.00', 9),
(54, ' Jumat', ' Kimia', '9A', ' 13.00-15.00', 8),
(55, ' Jumat', ' Matematika', '8B', ' 11.00-12.30', 25),
(56, ' Kamis', ' Biologi', '7B', ' 13.00-15.00', 11),
(57, ' Jumat', ' PKN', '7B', '07.00-09.00', 30),
(58, ' Kamis', ' Fisika', '8A', '07.00-09.00', 8),
(59, ' Rabu', ' Biologi', '7C', ' 09.30-11.00', 11),
(60, ' Rabu', ' Biologi', '7B', ' 11.00-12.30', 29),
(61, 'Senin', ' Bahasa Inggris', '8B', ' 09.30-11.00', 18),
(62, ' Selasa', ' Fisika', '7B', ' 13.00-15.00', 6),
(63, ' Jumat', ' Fisika', '7C', ' 09.30-11.00', 7),
(64, ' Rabu', ' PKN', '9A', ' 09.30-11.00', 19),
(65, ' Jumat', 'Bahasa Indonesia', '7A', '07.00-09.00', 17),
(66, ' Jumat', ' Matematika', '8C', ' 11.00-12.30', 15),
(67, ' Rabu', ' PKN', '8C', ' 11.00-12.30', 14),
(68, ' Kamis', ' Matematika', '7C', ' 13.00-15.00', 6),
(69, 'Senin', ' Fisika', '9A', ' 11.00-12.30', 14),
(70, ' Selasa', 'Bahasa Indonesia', '7B', ' 13.00-15.00', 15),
(71, ' Jumat', ' Biologi', '8C', ' 11.00-12.30', 21),
(72, ' Kamis', ' Bahasa Inggris', '9A', ' 11.00-12.30', 21),
(73, ' Selasa', ' PKN', '7C', ' 13.00-15.00', 5),
(74, ' Kamis', ' Kimia', '9B', ' 09.30-11.00', 4),
(75, ' Kamis', ' Penjas', '9B', ' 09.30-11.00', 4),
(76, 'Senin', ' Kimia', '8C', ' 09.30-11.00', 22),
(77, ' Kamis', ' Penjas', '7A', ' 13.00-15.00', 15),
(78, 'Senin', ' Fisika', '7B', ' 11.00-12.30', 4),
(79, ' Kamis', ' PKN', '9A', ' 13.00-15.00', 15),
(80, ' Jumat', 'Bahasa Indonesia', '8A', ' 13.00-15.00', 23),
(81, ' Kamis', ' PAI', '9A', ' 13.00-15.00', 4),
(82, ' Selasa', ' Matematika', '9B', '07.00-09.00', 21),
(83, ' Rabu', ' PAI', '7C', ' 13.00-15.00', 14),
(84, 'Senin', ' Bahasa Inggris', '8B', '07.00-09.00', 15),
(85, ' Selasa', ' PKN', '9C', ' 13.00-15.00', 11),
(86, 'Senin', ' PAI', '7B', ' 11.00-12.30', 29),
(87, ' Jumat', ' PAI', '9B', ' 13.00-15.00', 30),
(88, ' Jumat', ' Kimia', '7B', ' 13.00-15.00', 4),
(89, 'Senin', ' PAI', '7B', ' 09.30-11.00', 30),
(90, ' Jumat', ' Penjas', '8A', ' 11.00-12.30', 28),
(91, ' Jumat', ' Fisika', '7A', ' 11.00-12.30', 15),
(92, ' Rabu', ' Penjas', '8A', '07.00-09.00', 23),
(93, ' Rabu', ' Kimia', '9A', '07.00-09.00', 28),
(94, ' Rabu', ' Penjas', '7C', ' 09.30-11.00', 25),
(95, 'Senin', ' Kimia', '8A', ' 09.30-11.00', 21),
(96, ' Rabu', ' PKN', '9B', ' 11.00-12.30', 20),
(97, ' Rabu', ' PKN', '8B', ' 11.00-12.30', 11),
(98, ' Jumat', ' Fisika', '9B', ' 13.00-15.00', 27),
(99, ' Rabu', ' Matematika', '9B', ' 09.30-11.00', 15),
(100, ' Selasa', ' PAI', '8A', ' 09.30-11.00', 16);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1716687500, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(9) UNSIGNED NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `telepon` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `kelas`, `telepon`, `alamat`) VALUES
(2, '13989893', 'Shanny Dare', '7B', '438.459.65', '1574 Reynolds Land\nDomingofurt, MN 05389-6403'),
(3, '81675137', 'Deja Flatley', '8C', '498-298-75', '001 Smith Cove Suite 946\nNew Delphabury, OH 50264-8602'),
(4, '92398308', 'Lydia Pfeffer', '9A', '506-973-53', '717 Darlene Burg\nNorth Delbert, KS 53456-0397'),
(5, '27395923', 'Harley Stehr', '7C', '+98(4)0193', '834 Wisoky Club Suite 657\nLindchester, PA 71384-7152'),
(6, '92281738', 'Jeanie Hilll', '8A', '0186229392', '888 Richie Mission Apt. 234\nRickeyton, SC 31293-3570'),
(7, '72057993', 'Pierce Volkman', '9C', '(906)459-5', '441 Hansen Trail Apt. 551\nWisokyfurt, VA 36713'),
(8, '77737248', 'Nathan O\'Connell', '8B', '606.578.20', '1325 Shany River\nSouth Susanmouth, MO 79500'),
(9, '12702890', 'Ms. Kelly Williamson IV', '8A', '+20(9)4379', '76366 Dwight Island Apt. 198\nHermanville, HI 51874-0094'),
(10, '92512274', 'Chanelle Prohaska', '7B', '1-060-787-', '3718 Hammes Mountains\nKochbury, NV 43262-0001'),
(11, '43979197', 'Seth Rodriguez V', '9C', '756-234-18', '71353 Clarissa Skyway\nNorth Michelfurt, WV 61334'),
(12, '33235346', 'Prof. Domingo Leuschke', '9C', '(978)280-7', '0522 Collins Dale Apt. 972\nConsidineborough, NM 62245-4547'),
(13, '97849704', 'Lee Cartwright V', '7A', '571-260-70', '241 Piper Valleys\nPort Marie, ND 60967'),
(14, '56762483', 'Makayla Brekke IV', '9B', '1-742-064-', '43460 Elyse Summit Apt. 347\nNew Jessica, CO 89893'),
(15, '79937383', 'Jerrell Yost', '7A', '(165)895-8', '0870 Jaskolski Green Suite 827\nRicochester, NJ 37850'),
(16, '77512640', 'Retha VonRueden', '8C', '921.221.43', '73691 Jalon Station\nWest Amari, NC 73439'),
(17, '51183498', 'Bill Metz', '7C', '1-721-751-', '7186 Price Courts Apt. 337\nSouth Clementinehaven, WI 10901-6769'),
(18, '57297124', 'Prof. Demetrius Hackett', '7C', '453-230-24', '33256 Nader Mews\nCreolachester, KS 17669-3178'),
(19, '62407768', 'Lacey Larkin', '9C', '1-138-700-', '4907 Deon Parkways\nRogahnport, RI 16953-1961'),
(20, '71002828', 'Dr. Jonathon Kessler I', '8A', '+08(9)0077', '5398 Runolfsson Tunnel\nZboncakhaven, OK 32764-8297'),
(21, '79188546', 'Joanne Orn', '7B', '1-141-347-', '2760 Brian View Suite 286\nProsaccoton, DE 59373-6631'),
(22, '14975503', 'Althea Bradtke', '9B', '532.216.43', '48992 Altenwerth Spur Apt. 894\nBoehmside, AL 25911-1709'),
(23, '83823821', 'Prof. Lavina Conn', '9C', '498-420-57', '734 Elton Shoal\nEast Torrance, VT 62785'),
(24, '89348985', 'Miss Vickie Skiles Jr.', '9C', '+16(7)4425', '56026 Fatima Extensions\nSchillerfort, SC 84193'),
(25, '17519216', 'Dr. Janelle Rogahn', '7C', '(364)200-8', '575 Emilio Terrace Apt. 274\nFinnport, IN 27390-4278'),
(26, '39981940', 'Elmira Volkman', '7A', '866-929-42', '5276 Rylee Lodge\nRicoborough, WV 16461-1962'),
(27, '79461611', 'Jarrell Marks', '8C', '773.177.17', '344 Zella Crossing Apt. 234\nDangelomouth, VA 55035'),
(28, '49560717', 'Gertrude Morar', '7A', '589.972.92', '1724 Skylar Estate\nWest Icie, TN 53823'),
(29, '77419562', 'Prof. Filiberto Stroman II', '8B', '1-315-172-', '5912 Wyman Road\nManleyside, KY 23506'),
(30, '20660421', 'Koby Bahringer', '9B', '196-016-96', '94533 Kennedy Turnpike\nRebafurt, MT 55370'),
(31, '91828502', 'Mr. Brayan Ziemann', '7C', '753.603.03', '370 Schmeler Stravenue Suite 695\nTiffanyland, OH 01183-6875'),
(32, '49521739', 'Prof. Nels Frami', '8C', '961-425-54', '33741 Vandervort Summit\nElinormouth, KS 31072-2813'),
(33, '94009302', 'Prof. Berta Wehner Sr.', '8B', '0746392060', '5628 Fay Forks Suite 428\nSouth Nora, IL 51074'),
(34, '26339254', 'Kathryn Abernathy MD', '9A', '(100)261-1', '4794 Keanu Place Apt. 305\nCummeratabury, MN 82360-3982'),
(35, '75157101', 'Prof. Meggie Collier I', '7C', '408.841.38', '35684 Gulgowski Stravenue\nMarilynehaven, DC 17282'),
(36, '34044258', 'Miss Lola Willms DDS', '7A', '080.235.88', '05094 Kiera Centers Apt. 347\nNew Maureenton, VA 74869-5920'),
(37, '17776295', 'Pete Roob', '7A', '422-136-23', '922 Strosin Corners Apt. 000\nWest Aylaland, WA 87642'),
(38, '25079623', 'Anya Keeling', '9C', '+17(8)9183', '87805 Weber Island\nNorth Maximo, IN 16008'),
(39, '35476830', 'Mr. Friedrich White', '8B', '420.200.67', '4523 Rashad Lane Apt. 482\nKennachester, TX 17390-5927'),
(40, '11561006', 'Earnestine Parisian', '9C', '(387)945-9', '6241 Cydney Forks Suite 433\nBalistreriland, MN 12346-6481'),
(41, '16292750', 'Liliana Marks', '7C', '776.166.26', '789 Ratke Knolls\nNew Ednabury, SD 49424'),
(42, '94588858', 'Colby Considine', '9C', '+11(5)9277', '4040 Diego Ferry Apt. 659\nEast Jerrellside, KY 24807'),
(43, '58996442', 'Rosalinda Barton', '9B', '0720956434', '43897 Schroeder Valley\nJaunitamouth, SC 56317'),
(44, '15008547', 'Javier Pouros', '8B', '1-329-251-', '5907 Baron Ports\nPort Adrianamouth, WA 38456-7359'),
(45, '91796369', 'Shania Hettinger', '8B', '+25(3)3571', '832 McCullough Port Apt. 161\nDakotachester, VA 65947'),
(46, '70269663', 'Nora Bernhard', '7B', '607-772-98', '007 Schuppe Cape\nPort Brennaberg, IA 32512-7993'),
(47, '11305714', 'Korey Carroll', '7C', '(889)801-5', '98503 Keshaun Forges\nNew Braeden, CO 73894'),
(48, '53035851', 'Marlon Schmitt', '7A', '278-620-49', '749 Leopoldo Port Suite 898\nMaggioton, AL 41401'),
(49, '19380889', 'Citlalli Kuphal', '8B', '903.671.45', '1616 Ophelia Fords\nBahringerstad, AZ 53567'),
(50, '99456394', 'Icie O\'Reilly', '7C', '+62(6)9049', '2546 Jesus Vista Suite 600\nMayertfort, ID 84476-9961'),
(51, '97527788', 'Dejon Erdman', '8B', '894.778.77', '613 Sanford Radial\nSouth Carmellaburgh, SD 42107'),
(52, '64888481', 'Hunter Bayer', '8B', '(195)638-4', '8801 Powlowski Ports Apt. 551\nLake Henrifurt, DE 51858-5718'),
(53, '22052260', 'Jo Kling III', '8B', '1-446-569-', '27963 Stan Springs\nBalistreriberg, ID 17738-1800'),
(54, '66518659', 'Miss Margot Konopelski', '8C', '116.398.24', '870 Feil Plaza\nMrazborough, KY 32818'),
(55, '68498234', 'Sigmund Armstrong', '9C', '1-056-102-', '5981 Kacie Ports Suite 808\nPort Gabriellechester, LA 75559'),
(56, '67061494', 'Nya Kassulke', '9A', '1-692-409-', '85000 West Valleys Suite 142\nNew Pedro, IA 52103-8451'),
(57, '27556734', 'Retta Ward', '8B', '892-831-22', '0823 Jammie Flat\nPort Leanna, PA 13014'),
(58, '89611531', 'Alessandra Cartwright', '8C', '819.319.50', '0150 Erich Meadows\nEast Jaquanstad, ID 62139'),
(59, '59865942', 'Jordy Veum', '9A', '+65(1)2343', '020 Stokes Junctions\nLake Alan, CA 07595'),
(60, '26709107', 'Cesar Russel', '9A', '(142)663-8', '90012 Barrows Trace\nGarretmouth, GA 06922'),
(61, '39274451', 'Rene Ryan', '8C', '223-328-59', '57092 Wilderman Fall\nEast Braeden, WI 53412'),
(62, '22497331', 'Hassie Corwin', '8C', '1-903-993-', '3625 Ritchie Ridges\nSouth Rod, ME 36904-1859'),
(63, '85311432', 'Krista Kuhlman', '8A', '775.707.81', '458 Buckridge Expressway\nWest Stephon, MT 20152'),
(64, '41685297', 'Ubaldo Murazik Sr.', '7B', '(523)998-9', '8396 Dicki Coves Apt. 329\nMoenstad, CT 42719'),
(65, '96001580', 'Nellie Rodriguez PhD', '9B', '+55(1)6638', '2455 Reichel Drive\nElliotfort, IL 73224'),
(66, '52213791', 'Ena Zboncak', '9C', '852.241.27', '33213 Alexander Divide\nPort Buford, CO 87717-9995'),
(67, '67149093', 'Ethyl Pouros', '7B', '+14(8)8617', '7135 Cummings Bridge Apt. 998\nPort Emeraldhaven, NC 48760'),
(68, '80962430', 'Lucas Bogisich', '7C', '585-249-96', '6187 Streich Fords\nEast Raegantown, DE 22620'),
(69, '82594119', 'Miss Ada Gleichner', '7B', '184-732-75', '58406 Jewell Drive\nNicolasmouth, RI 46303-9618'),
(70, '64153671', 'Jake Crona', '8B', '(901)336-5', '82871 Ruecker Vista\nPort Ocie, DE 72521'),
(71, '72521407', 'Dr. Kory Renner', '9C', '039-457-19', '738 Octavia Extensions Suite 062\nHandville, NV 05891-8527'),
(72, '31423815', 'Prof. Dameon Will', '9B', '1-827-277-', '872 Madonna Trafficway Suite 589\nNorth Fannymouth, RI 33963'),
(73, '28186492', 'Mr. Myrl Gusikowski DDS', '9A', '(763)586-3', '461 Katelyn Roads\nNorth Iva, OR 20190'),
(74, '92495148', 'Francisca Hauck III', '7C', '225-174-68', '6184 Winston Harbor Suite 019\nWisokymouth, OR 61500-5778'),
(75, '88692681', 'Clarabelle Altenwerth', '8B', '0044332233', '8401 Feeney Pines\nLake Maya, OK 71246'),
(76, '86657251', 'Ezekiel Rath', '9A', '328-485-52', '779 Josh Route\nLaurieland, VT 25619'),
(77, '38120498', 'Kasandra Simonis', '7C', '206-775-20', '65526 Herman Meadow\nWest Sarinachester, VT 19621'),
(78, '29720188', 'Jazmyn McCullough', '7A', '1-927-781-', '730 Lebsack Isle\nNettiehaven, DC 23346'),
(79, '60070031', 'Arlie Hackett', '7C', '1-544-887-', '640 Breitenberg Divide Apt. 309\nSouth Orionstad, NJ 74707'),
(80, '18066101', 'Adell Jerde', '8C', '(052)686-2', '0140 Lorna Trail\nLorenfort, SC 78531-7203');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'rangga@gmail.com', 'admin', '$2y$10$wUdzGR.HaOpJs6UQZ2FuveRVpbQlbM81TkKHyy4srpU.e1N6FbVfq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-05-26 02:02:15', '2024-05-26 02:02:15', NULL),
(4, 'akhul@gmail.com', 'akhul', '$2y$10$4OBxRgBO6iA9epMNU4t7a.NyM4Q5NE6.iTYew61SMcLHd/5tXcu4G', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-05-26 09:08:00', '2024-05-26 09:08:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_ibfk_1` (`guru_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
