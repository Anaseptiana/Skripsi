-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2022 pada 19.13
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `sub_judul` varchar(256) NOT NULL,
  `nama_link` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `sub_judul`, `nama_link`, `link`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'QUAM TEMPORIBUS ACCUSAM HIC DUCIMUS QUIA', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <span style=\"font-size: 1rem;\">tempor incididunt ut labore et dolore magna aliqua. </span></p>', 'cars', 'cars.html', '3ca616ab7d778324e32ca7606587e1d2.jpg', '2020-12-14 10:23:29', '2020-12-14 21:39:57'),
(4, 'ALIQUAM IUSTO HARUM RATIONE PORRO ODIO', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&nbsp;<span style=\"font-size: 1rem;\">tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,&nbsp;</span><span style=\"font-size: 1rem;\">quis nostrud exercitatio', 'about us', 'aboutus.html', '91d083c090ff60cc4e4f5c10f81c8178.jpg', '2020-12-14 10:25:10', NULL),
(5, 'Lorem ipsum dolor sit amet, consectetur.', '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse&nbsp;<span style=\"font-size: 1rem;\">cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&nbsp;</span><span style=\"font-size: 1rem;\">proident, sunt in culpa qui offic', 'contact us', 'contactus.html', 'f2a14770b7d6b65d356d2103bddcdb67.jpg', '2020-12-14 10:26:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `konten` text NOT NULL,
  `id_user` int(12) NOT NULL,
  `background` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id_blog`, `judul`, `slug`, `konten`, `id_user`, `background`, `created_at`, `updated_at`) VALUES
(4, 'Contoh', 'contoh-848581610', '<p>ini konten blog</p><p><br></p>', 5, '353eae755b1a24a91841976daab26f95.jpg', '2020-12-07 07:48:46', '2020-12-09 17:05:39'),
(5, 'Passion bisa menjebak', 'passion-bisa-menjebak', '<p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Kita senang melakukan apa yang kita suka walaupun yang kita lakukan itu tidak dibayar. Banyak yang bilang itu PASSION.</p><p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Kita berpikir mulai mencari kerja dari hal yang kita sukai.</p><p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Kita membayangkan betapa menyenangkannya bekerja sesuai PASSION karena itu yang kita sukai.</p><p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Tapi ternyata tidak semudah itu...</p><p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Apa yang kita inginkan tidak selalu terwujud.</p><p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Apa yang kita rasa menyenangkan ternyata tidak terjadi.</p><p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Mungkin kita sudah mencari kerja sesuai PASSION, tapi belum dapat juga.</p><p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Akhirnya kita terus mencari dan menunggu.</p><p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Banyak tawaran kerja tapi kita tolak hanya karena bukan PASSION kita.</p><p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Kita mulai kecewa sama usaha yang kita lakukan selama ini, karena tidak ada hasilnya.</p><p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Kita suka tidak sadar banyak peluang yang kita lewatkan karena hanya memandang pada satu sisi.</p><p style=\"text-align: justify; margin: 30px 0px; line-height: 1.5;\" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 20px;\"=\"\">Padahal di sisi lain ada kebaikannya.</p>', 5, '1d7f6962ab3eca9cb97255d44105f1ca.jpg', '2020-12-09 09:18:49', '2020-12-09 17:05:47'),
(7, 'Assssssssssss', 'assssssssssss-1539246490', '<p>dddddddddddddddddddd</p>', 14, '8c8878866c4b8f7e521542cd60611417.png', '2020-12-13 10:31:31', '2020-12-13 17:32:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(13) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat`, `telp`, `email`, `password`, `foto`) VALUES
(1, 'Ilham Bahari', 'Bandung', '', 'ilham@gmail.com', '$2y$10$RzsmbI.izq8HqvXT.hqFfOahQDseZJZtsDRn0.Z0YvYPNcDRC/.9e', 'default.jpg'),
(2, 'Ilham Bahari', 'bandung', '', 'bahari@gmail.com', '$2y$10$tj1/8vPbYYc2ZW7DZyyoq.Nzh.odF.Ni9y6iAZtOyVU4Yg9LGc4Y2', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_mobil`
--

CREATE TABLE `gambar_mobil` (
  `id_gambar_mobil` int(11) NOT NULL,
  `id_mobil` int(12) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `is_default` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_mobil`
--

INSERT INTO `gambar_mobil` (`id_gambar_mobil`, `id_mobil`, `gambar`, `is_default`, `created_at`, `updated_at`) VALUES
(7, 1, 'ae41d7eeeb9e4ca8c59d88954e4c451f.jpg', 1, NULL, NULL),
(8, 1, 'dfff3d1b7e2a5dd0e887f3631228e296.jpg', 0, NULL, NULL),
(9, 1, 'eba6e19bc0c909b11ec8b734156e3319.jpg', 0, NULL, NULL),
(10, 1, 'ff07e1c035380f9af34dceb2cfac242f.jpg', 0, NULL, NULL),
(11, 2, 'bd8d3f9e1516d58198981e676da30727.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pesanan`
--

CREATE TABLE `konfirmasi_pesanan` (
  `id_konfirmasi` int(13) NOT NULL,
  `id_pesanan` int(13) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfirmasi_pesanan`
--

INSERT INTO `konfirmasi_pesanan` (`id_konfirmasi`, `id_pesanan`, `no_rekening`, `nama_akun`, `tanggal_transfer`, `bukti_transfer`) VALUES
(1, 5, '11221122', 'ilham', '2022-07-03', '2b76fd6cc88675e923dcceb8741dc735.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `deskripsi_mobil` text NOT NULL,
  `harga_dalam_kota` int(12) NOT NULL,
  `harga_luar_kota` int(13) NOT NULL,
  `background` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nama_mobil`, `slug`, `deskripsi_mobil`, `harga_dalam_kota`, `harga_luar_kota`, `background`, `created_at`, `updated_at`) VALUES
(1, 'XPANDER CROSS RF BLACK EDITION', 'xpander-cross-rf-black-edition', '<p><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- Colour coded bumpers</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- Tinted glass</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- Immobiliser</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- Central locking - remote</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- Passenger airbag</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- Electric windows</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- Rear head rests</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- Radio</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- CD player</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- Ideal first car</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- Warranty</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">- High level brake light</span><br style=\"-webkit-font-smoothing: antialiased; color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\"><span style=\"color: rgb(122, 122, 122); font-family: Poppins, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br></p>', 303499998, 0, 'ae57ee893cb2096fa3bf95f4fd246ccb.jpg', NULL, NULL),
(2, 'XPANDER BLACK EDITION', 'xpander-black-edition', '<p>test</p>', 257100000, 0, 'ee33151754b161bc6e1b8d766c0e3494.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_mobil`
--

CREATE TABLE `model_mobil` (
  `id_model` int(11) NOT NULL,
  `nama_model` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `isi_pesan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `subject`, `isi_pesan`, `created_at`, `updated_at`) VALUES
(1, 'Ilham', 'muhari@gmail.coms', 'Tanya Harga', 'Assalamualaikum, saya ingin menanyakan apakah mobil ini masih tersedia?', '2020-12-28 00:42:46', NULL),
(2, 'Ilham', 'muhari@gmail.coms', 'Tanya Harga', 'Assalamualaikum, saya ingin menanyakan apakah mobil ini masih tersedia?', '2020-12-28 00:43:37', NULL),
(3, 'asas', 'ilham@gmail.com', 'asas', 'test', '2020-12-28 00:44:02', NULL),
(4, 'asas', 'muhari@gmail.coms', 'ass', 'asas', '2020-12-28 00:54:32', NULL),
(5, 'dfgdf', 'dfgdfg@wdasf.cvom', 'dfgdfg', 'dfgdfg', '2022-06-26 13:43:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(13) NOT NULL,
  `id_mobil` int(13) NOT NULL,
  `id_customer` int(13) NOT NULL,
  `id_supir` int(13) DEFAULT NULL,
  `supir` tinyint(1) DEFAULT 0,
  `dalam_kota` tinyint(1) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `harga_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `harga_supir` int(13) DEFAULT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `total_harga` int(13) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_mobil`, `id_customer`, `id_supir`, `supir`, `dalam_kota`, `tujuan`, `harga_mobil`, `nama_mobil`, `harga_supir`, `tanggal_pesan`, `tanggal_mulai`, `tanggal_selesai`, `total_harga`, `status`) VALUES
(5, 1, 2, NULL, NULL, 0, '', 303499998, 'XPANDER CROSS RF BLACK EDITION', NULL, '2022-06-28', '2022-06-29', '2022-06-30', 303499998, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `nama_website` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `twitter` varchar(256) DEFAULT NULL,
  `harga_supir_dalam_kota` varchar(255) DEFAULT NULL,
  `harga_supir_luar_kota` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_website`, `email`, `telp`, `whatsapp`, `facebook`, `twitter`, `harga_supir_dalam_kota`, `harga_supir_luar_kota`) VALUES
(1, 'Hamidah Rent Car', 'email@gmail.com', '08998899889', '08998899889', '', '', '50000', '100000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supir`
--

CREATE TABLE `supir` (
  `id` int(13) NOT NULL,
  `nama_supir` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supir`
--

INSERT INTO `supir` (`id`, `nama_supir`, `telp`, `alamat`, `foto`, `status`) VALUES
(1, 'Wahyu', '089089898908', 'Bandung', 'default.png', 0),
(2, 'Asep', '12321313', 'fdsfsdfsdf', 'd3cf0db60032d979c158ca099e2a0d8d.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `pesan` text NOT NULL,
  `foto` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nama`, `pesan`, `foto`, `created_at`, `updated_at`) VALUES
(9, 'George Walker', '<p>\"Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus.\"<br></p>', '409f5d04cb765559a973bf1327c392dd.jpg', '2020-12-14 11:06:53', NULL),
(10, 'John Smith', '<p>\"In eget leo ante. Sed nibh leo, laoreet accumsan euismod quis, scelerisque a nunc. Mauris accumsan, arcu id ornare malesuada, est nulla luctus nisi.\"<br></p>', '8d8b1c866f74b827beffb88c71fa3264.jpg', '2020-12-14 11:07:59', NULL),
(11, 'David Wood', '<p>\"Ut ultricies maximus turpis, in sollicitudin ligula posuere vel. Donec finibus maximus neque, vitae egestas quam imperdiet nec. Proin nec mauris eu tortor consectetur tristique.\"<br></p>', 'c0184578829c8a42040f03bd1de9d87b.jpg', '2020-12-14 11:08:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_mobil`
--

CREATE TABLE `tipe_mobil` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(256) NOT NULL,
  `aktif` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_mobil`
--

INSERT INTO `tipe_mobil` (`id_tipe`, `nama_tipe`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'Passenger Car', 1, '2020-12-21 09:33:36', NULL),
(2, 'Light Commercial Vehicle\r\n', 1, '2020-12-21 09:33:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'David', 'admin@gmail.com', 'man-large1.jpg', '$2y$10$hIg5Uua.nW6MgyiuQ6I5CO6KWU1XRuKqj.UWILqSQySh4m9jWcv/i', 1, 1, 1552120289),
(6, 'Doddy Ferdiansyah', 'doddy@gmail.com', 'profile.jpg', '$2y$10$FhGzXwwTWLN/yonJpDLR0.nKoeWlKWBoRG9bsk0jOAgbJ007XzeFO', 2, 1, 1552285263),
(11, 'Sandhika Galih', 'sandhikagalih@gmail.com', 'default.jpg', '$2y$10$0QYEK1pB2L.Rdo.ZQsJO5eeTSpdzT7PvHaEwsuEyGSs0J1Qf5BoSq', 2, 1, 1553151354),
(12, 'admin', 'admin1@gmail.com', 'ilham.jpg', 'admin', 1, 1, 1552120289),
(14, 'galihrexy', 'galihrexyhakiki@gmail.com', 'default.jpg', '$2y$10$NnOOEph8Xh.m.bZp6OKwAe77MFIE7Ptntqzg2rNAF0UIpuGny93iW', 1, 1, 1607843275);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2),
(17, 1, 7),
(18, 1, 6),
(19, 1, 5),
(20, 1, 8),
(21, 1, 9),
(23, 1, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Mobil'),
(6, 'Banner'),
(7, 'Setting'),
(8, 'Blog'),
(9, 'Testimoni'),
(10, 'Pesan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 5, 'Daftar Mobil', 'mobil', 'fas fa-fw fa-folder', 1),
(10, 5, 'Gambar Mobil', 'mobil/gambar', 'fas fa-fw fa-folder', 1),
(11, 7, 'Website', 'setting', 'fas fa-fw fa-folder', 1),
(12, 8, 'Daftar Blog', 'blog', 'fas fa-fw fa-folder', 1),
(13, 1, 'User', 'admin/user', 'fas fa-fw fa-folder', 1),
(14, 9, 'Daftar Testimoni', 'testimoni', 'fas fa-fw fa-folder', 1),
(15, 6, 'Daftar Banner', 'banner', 'fas fa-fw fa-folder', 1),
(16, 10, 'Daftar Pesan', 'pesan', 'fas fa-fw fa-folder', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(9, 'galihrexyhakiki@gmail.com', 'C+7BkBKDbL1LpCzcrb4Eo+vNThr7CBBEXe4rzCYaJsc=', 1607843275);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `konten` (`konten`(768)),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `gambar_mobil`
--
ALTER TABLE `gambar_mobil`
  ADD PRIMARY KEY (`id_gambar_mobil`);

--
-- Indeks untuk tabel `konfirmasi_pesanan`
--
ALTER TABLE `konfirmasi_pesanan`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `model_mobil`
--
ALTER TABLE `model_mobil`
  ADD PRIMARY KEY (`id_model`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indeks untuk tabel `tipe_mobil`
--
ALTER TABLE `tipe_mobil`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gambar_mobil`
--
ALTER TABLE `gambar_mobil`
  MODIFY `id_gambar_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pesanan`
--
ALTER TABLE `konfirmasi_pesanan`
  MODIFY `id_konfirmasi` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `model_mobil`
--
ALTER TABLE `model_mobil`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supir`
--
ALTER TABLE `supir`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tipe_mobil`
--
ALTER TABLE `tipe_mobil`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
