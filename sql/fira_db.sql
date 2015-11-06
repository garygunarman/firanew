-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2015 at 06:33 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fira_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) NOT NULL,
  `country_id` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=333 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `country_id`, `province`) VALUES
(1, 'Banda Aceh', 'Indonesia', 'Aceh'),
(2, 'Denpasar', 'Indonesia', 'Bali'),
(3, 'Balaraja', 'Indonesia', 'Banten'),
(4, 'Bengkulu', 'Indonesia', 'Bengkulu'),
(5, 'Gorontalo', 'Indonesia', 'Gorontalo'),
(6, 'Jakarta', 'Indonesia', 'Jakarta'),
(7, 'Jambi', 'Indonesia', 'Jambi'),
(8, 'Bandung', 'Indonesia', 'Jawa Barat'),
(9, 'Semarang', 'Indonesia', 'Jawa Tengah'),
(10, 'Surabaya', 'Indonesia', 'Jawa Timur'),
(11, 'Pontianak', 'Indonesia', 'Kalimantan Barat'),
(12, 'Banjarmasin', 'Indonesia', 'Kalimantan Selatan'),
(13, 'Palangkaraya', 'Indonesia', 'Kalimantan Tengah'),
(14, 'Samarinda', 'Indonesia', 'Kalimantan Timur'),
(15, 'Tanjung Selor', 'Indonesia', 'Kalimantan Utara'),
(16, 'Pangkal Pinang', 'Indonesia', 'Kepulauan Bangka Belitung'),
(17, 'Tanjung Pinang', 'Indonesia', 'Kepulauan Riau'),
(18, 'Bandar Lampung', 'Indonesia', 'Lampung'),
(19, 'Ambon', 'Indonesia', 'Maluku'),
(20, 'Ternate', 'Indonesia', 'Maluku Utara'),
(21, 'Dompu', 'Indonesia', 'Nusa Tenggara Barat'),
(22, 'Kupang', 'Indonesia', 'Nusa Tenggara Timur'),
(23, 'Jayapura', 'Indonesia', 'Papua'),
(24, 'Manokwari', 'Indonesia', 'Papua Barat'),
(25, 'Pekanbaru', 'Indonesia', 'Riau'),
(26, 'Mamuju', 'Indonesia', 'Sulawesi Barat'),
(27, 'Makasar', 'Indonesia', 'Sulawesi Selatan'),
(28, 'Palu', 'Indonesia', 'Sulawesi Tengah'),
(29, 'Kendari', 'Indonesia', 'Sulawesi Tenggara'),
(30, 'Manado', 'Indonesia', 'Sulawesi Utara'),
(31, 'Padang', 'Indonesia', 'Sumatera Barat'),
(32, 'Palembang', 'Indonesia', 'Sumatera Selatan'),
(33, 'Medan', 'Indonesia', 'Sumatera Utara'),
(34, 'Yogyakarta', 'Indonesia', 'Yogyakarta'),
(35, 'Banjar', 'Indonesia', 'Jawa Barat'),
(36, 'Bogor', 'Indonesia', 'Jawa Barat'),
(37, 'Cimahi', 'Indonesia', 'Jawa Barat'),
(38, 'Cirebon', 'Indonesia', 'Jawa Barat'),
(39, 'Depok', 'Indonesia', 'Jawa Barat'),
(40, 'Sukabumi', 'Indonesia', 'Jawa Barat'),
(41, 'Tasikmalaya', 'Indonesia', 'Jawa Barat'),
(42, 'Tangerang', 'Indonesia', 'Banten'),
(43, 'Serpong', 'Indonesia', 'Banten'),
(44, 'Serang', 'Indonesia', 'Banten'),
(45, 'Cilegon', 'Indonesia', 'Banten'),
(46, 'Lhokseumawe', 'Indonesia', 'Aceh'),
(47, 'Gianyar', 'Indonesia', 'Bali'),
(48, 'Jimbaran', 'Indonesia', 'Bali'),
(49, 'Kuta', 'Indonesia', 'Bali'),
(50, 'Ngurahrai', 'Indonesia', 'Bali'),
(51, 'Nusa Dua', 'Indonesia', 'Bali'),
(52, 'Sanur', 'Indonesia', 'Bali'),
(53, 'Singaraja', 'Indonesia', 'Bali'),
(54, 'Ubud', 'Indonesia', 'Bali'),
(55, 'Belinyu', 'Indonesia', 'Kepulauan Bangka Belitung'),
(56, 'Gantung', 'Indonesia', 'Kepulauan Bangka Belitung'),
(57, 'Manggar', 'Indonesia', 'Kepulauan Bangka Belitung'),
(58, 'Mentok', 'Indonesia', 'Kepulauan Bangka Belitung'),
(59, 'Marawang', 'Indonesia', 'Kepulauan Bangka Belitung'),
(60, 'Tanjung Pandan', 'Indonesia', 'Kepulauan Bangka Belitung'),
(61, 'Bintaro', 'Indonesia', 'Banten'),
(62, 'Cikupa', 'Indonesia', 'Banten'),
(63, 'Cipondoh', 'Indonesia', 'Banten'),
(64, 'Karawaci', 'Indonesia', 'Banten'),
(65, 'Pamulang', 'Indonesia', 'Banten'),
(66, 'Pandegelang', 'Indonesia', 'Banten'),
(67, 'Panimbang', 'Indonesia', 'Banten'),
(68, 'Rangkas Bitung', 'Indonesia', 'Banten'),
(69, 'Tigaraksa', 'Indonesia', 'Banten'),
(70, 'Curug', 'Indonesia', 'Bengkulu'),
(71, 'Rajang Lebong', 'Indonesia', 'Bengkulu'),
(72, 'Bantul', 'Indonesia', 'Yogyakarta'),
(73, 'Ngaglik', 'Indonesia', 'Yogyakarta'),
(74, 'Prambanan', 'Indonesia', 'Yogyakarta'),
(75, 'Sleman', 'Indonesia', 'Yogyakarta'),
(76, 'Bekasi', 'Indonesia', 'Jawa Barat'),
(77, 'Karawang', 'Indonesia', 'Jawa Barat'),
(78, 'Bojonggede, Cibinong', 'Indonesia', 'Jawa Barat'),
(79, 'Ciamis', 'Indonesia', 'Jawa Barat'),
(80, 'Cianjur', 'Indonesia', 'Jawa Barat'),
(81, 'Ciawi, Cibinong', 'Indonesia', 'Jawa Barat'),
(82, 'Ciawi, Singaparna', 'Sukabumi', 'Jawa Barat'),
(83, 'Cibadak, Sukabumi', 'Indonesia', 'Jawa Barat'),
(84, 'Cibinong, Bogor', 'Indonesia', 'Jawa Barat'),
(85, 'Cibinong, Cianjur', 'Indonesia', 'Jawa Barat'),
(86, 'Cibitung, Cikarang', 'Indonesia', 'Jawa Barat'),
(87, 'Cibitung, Pandegelang', 'Indonesia', 'Jawa Barat'),
(88, 'Cibitung, Sukabumi', 'Indonesia', 'Jawa Barat'),
(89, 'Cibubur', 'Indonesia', 'Jawa Barat'),
(90, 'Cikampek', 'Indonesia', 'Jawa Barat'),
(91, 'Cikarang', 'Indonesia', 'Jawa Barat'),
(92, 'Cileungsi', 'Indonesia', 'Jawa Barat'),
(93, 'Cipanas, Cianjur', 'Indonesia', 'Jawa Barat'),
(94, 'Citeureup', 'Indonesia', 'Jawa Barat'),
(95, 'Dayeuh Kolot', 'Indonesia', 'Jawa Barat'),
(96, 'Garut', 'Indonesia', 'Jawa Barat'),
(97, 'Indramayu', 'Indonesia', 'Jawa Barat'),
(98, 'Jatibarang, Brebes', 'Indonesia', 'Jawa Barat'),
(99, 'Jatibarang, Indramayu', 'Indonesia', 'Jawa Barat'),
(100, 'Jatinangor', 'Indonesia', 'Jawa Barat'),
(101, 'Jatiwangi', 'Indonesia', 'Jawa Barat'),
(102, 'Kadipaten, Majalengka', 'Indonesia', 'Jawa Barat'),
(103, 'Kadipaten, Singaparna', 'Indonesia', 'Jawa Barat'),
(104, 'Kuningan', 'Indonesia', 'Jawa Barat'),
(105, 'Lembang, Ngamprah', 'Indonesia', 'Jawa Barat'),
(106, 'Losari, Brebes', 'Indonesia', 'Jawa Barat'),
(107, 'Lorasi, Sumber', 'Indonesia', 'Jawa Barat'),
(108, 'Majalaya, Karawang', 'Indonesia', 'Jawa Barat'),
(109, 'Majalengka', 'Indonesia', 'Jawa Barat'),
(110, 'Megamendung', 'Indonesia', 'Jawa Barat'),
(111, 'Padalarang', 'Indonesia', 'Jawa Barat'),
(112, 'Palimanan', 'Indonesia', 'Jawa Barat'),
(113, 'Purwakarta', 'Indonesia', 'Jawa Barat'),
(114, 'Purwakarta, Cilegon', 'Indonesia', 'Jawa Barat'),
(115, 'Rancaekek, Soreang', 'Indonesia', 'Jawa Barat'),
(116, 'Soreang', 'Indonesia', 'Jawa Barat'),
(117, 'Subang', 'Indonesia', 'Jawa Barat'),
(118, 'Sumedang', 'Indonesia', 'Jawa Barat'),
(119, 'Tambun, Cikarang', 'Indonesia', 'Jawa Barat'),
(120, 'Cilacap', 'Indonesia', 'Jawa Tengah'),
(121, 'Magelang', 'Indonesia', 'Jawa Tengah'),
(122, 'Solo / Surakarta', 'Indonesia', 'Jawa Tengah'),
(123, 'Ajibarang', 'Indonesia', 'Jawa Tengah'),
(124, 'Ambarawa', 'Indonesia', 'Jawa Tengah'),
(125, 'Banjarnegara', 'Indonesia', 'Jawa Tengah'),
(126, 'Banyumas, Purwokerto', 'Indonesia', 'Jawa Tengah'),
(127, 'Blora', 'Indonesia', 'Jawa Tengah'),
(128, 'Boyolali', 'Indonesia', 'Jawa Tengah'),
(129, 'Cepu, Blora', 'Indonesia', 'Jawa Tengah'),
(130, 'Delanggu, Klaten', 'Indonesia', 'Jawa Tengah'),
(131, 'Demak', 'Indonesia', 'Jawa Tengah'),
(132, 'Jepara', 'Indonesia', 'Jawa Tengah'),
(133, 'Karang Anyar', 'Indonesia', 'Jawa Tengah'),
(134, 'Kebumen', 'Indonesia', 'Jawa Tengah'),
(135, 'Kendal', 'Indonesia', 'Jawa Tengah'),
(136, 'Klaten', 'Indonesia', 'Jawa Tengah'),
(137, 'Kudus', 'Indonesia', 'Jawa Tengah'),
(138, 'Muntilan, Magelang', 'Indonesia', 'Jawa Tengah'),
(139, 'Pati', 'Indonesia', 'Jawa Tengah'),
(140, 'Pekalongan', 'Indonesia', 'Jawa Tengah'),
(141, 'Pemalang', 'Indonesia', 'Jawa Tengah'),
(142, 'Purbalingga', 'Indonesia', 'Jawa Tengah'),
(143, 'Purwodadi, Grobogan', 'Indonesia', 'Jawa Tengah'),
(144, 'Purwokerto', 'Indonesia', 'Jawa Tengah'),
(145, 'Purworejo', 'Indonesia', 'Jawa Tengah'),
(146, 'Rembang', 'Indonesia', 'Jawa Tengah'),
(147, 'Salatiga', 'Indonesia', 'Jawa Tengah'),
(148, 'Slawi', 'Indonesia', 'Jawa Tengah'),
(149, 'Sukoharjo', 'Indonesia', 'Jawa Tengah'),
(150, 'Tahunan, Jepara', 'Indonesia', 'Jawa Tengah'),
(151, 'Tegal', 'Indonesia', 'Jawa Tengah'),
(152, 'Temanggung', 'Indonesia', 'Jawa Tengah'),
(153, 'Ungaran', 'Indonesia', 'Jawa Tengah'),
(154, 'Wonogiri', 'Indonesia', 'Jawa Tengah'),
(155, 'Wonopringgo, Kajen', 'Indonesia', 'Jawa Tengah'),
(156, 'Wonosobo', 'Indonesia', 'Jawa Tengah'),
(157, 'Bangkalan', 'Indonesia', 'Jawa Timur'),
(158, 'Banyuwangi', 'Indonesia', 'Jawa Timur'),
(159, 'Batu', 'Indonesia', 'Jawa Timur'),
(160, 'Blitar', 'Indonesia', 'Jawa Timur'),
(161, 'Bojonegoro', 'Indonesia', 'Jawa Timur'),
(162, 'Bondowoso', 'Indonesia', 'Jawa Timur'),
(163, 'Buduran, Sidoarjo', 'Indonesia', 'Jawa Timur'),
(164, 'Gresik', 'Indonesia', 'Jawa Timur'),
(165, 'Jember', 'Indonesia', 'Jawa Timur'),
(166, 'Jombang', 'Indonesia', 'Jawa Timur'),
(167, 'Kediri', 'Indonesia', 'Jawa Timur'),
(168, 'Lamongan', 'Indonesia', 'Jawa Timur'),
(169, 'Lumajang', 'Indonesia', 'Jawa Timur'),
(170, 'Madiun', 'Indonesia', 'Jawa Timur'),
(171, 'Magetan', 'Indonesia', 'Jawa Timur'),
(172, 'Malang', 'Indonesia', 'Jawa Timur'),
(173, 'Mojokerto', 'Indonesia', 'Jawa Timur'),
(174, 'Nganjuk', 'Indonesia', 'Jawa Timur'),
(175, 'Ngawi', 'Indonesia', 'Jawa Timur'),
(176, 'Pamekasan', 'Indonesia', 'Jawa Timur'),
(177, 'Pandaan', 'Indonesia', 'Jawa Timur'),
(178, 'Pare, Kediri', 'Indonesia', 'Jawa Timur'),
(179, 'Pasuruan', 'Indonesia', 'Jawa Timur'),
(180, 'Ponorogo', 'Indonesia', 'Jawa Timur'),
(181, 'Probolinggo', 'Indonesia', 'Jawa Timur'),
(182, 'Sedati, Sidoarjo', 'Indonesia', 'Jawa Timur'),
(183, 'Sidoarjo', 'Indonesia', 'Jawa Timur'),
(184, 'Situbondo', 'Indonesia', 'Jawa Timur'),
(185, 'Sumenep', 'Indonesia', 'Jawa Timur'),
(186, 'Tlogosari, Bondowoso', 'Indonesia', 'Jawa Timur'),
(187, 'Trenggalek', 'Indonesia', 'Jawa Timur'),
(188, 'Tuban', 'Indonesia', 'Jawa Timur'),
(189, 'Tulungagung', 'Indonesia', 'Jawa Timur'),
(190, 'Turi (Lamongan)', 'Indonesia', 'Jawa Timur'),
(191, 'Waru (Sidoarjo)', 'Indonesia', 'Jawa Timur'),
(192, 'Kotabaru, Pulaulaut', 'Indonesia', 'Kalimantan Selatan'),
(193, 'Kandangan, Kab.Hulu Sungai Selatan', 'Indonesia', 'Kalimantan Selatan'),
(194, 'Banjarbaru', 'Indonesia', 'Kalimantan Selatan'),
(195, 'Batu Licin', 'Indonesia', 'Kalimantan Selatan'),
(196, 'Barabai', 'Indonesia', 'Kalimantan Selatan'),
(197, 'Ketapang', 'Indonesia', 'Kalimantan Barat'),
(198, 'Ketapang, Sampang', 'Indonesia', 'Kalimantan Barat'),
(199, 'Nanga Pinoh, Melawi', 'Indonesia', 'Kalimantan Barat'),
(200, 'Pemangkat', 'Indonesia', 'Kalimantan Barat'),
(201, 'Sambas', 'Indonesia', 'Kalimantan Barat'),
(202, 'Sanggau', 'Indonesia', 'Kalimantan Barat'),
(203, 'Singkawang', 'Indonesia', 'Kalimantan Barat'),
(204, 'Sintang', 'Indonesia', 'Kalimantan Barat'),
(205, 'Sui Raya, Kubu Raya', 'Indonesia', 'Kalimantan Barat'),
(206, 'Martapura, Banjar', 'Indonesia', 'Kalimantan Selatan'),
(207, 'Paringin, Kab. Balangan', 'Indonesia', 'Kalimantan Selatan'),
(208, 'Pelaihari', 'Indonesia', 'Kalimantan Selatan'),
(209, 'Kuala Kapuas', 'Indonesia', 'Kalimantan Tengah'),
(210, 'Muara Teweh', 'Indonesia', 'Kalimantan Tengah'),
(211, 'Palangkaraya', 'Indonesia', 'Kalimantan Tengah'),
(212, 'Pangkalan Banteng', 'Indonesia', 'Kalimantan Tengah'),
(213, 'Pangkalan Bun', 'Indonesia', 'Kalimantan Tengah'),
(214, 'Sampit', 'Indonesia', 'Kalimantan Tengah'),
(215, 'Balikpapan', 'Indonesia', 'Kalimantan Timur'),
(216, 'Bontang', 'Indonesia', 'Kalimantan Timur'),
(217, 'Melak, Sendawar', 'Indonesia', 'Kalimantan Timur'),
(218, 'Nunukan', 'Indonesia', 'Kalimantan Timur'),
(219, 'Samarinda', 'Indonesia', 'Kalimantan Timur'),
(220, 'Sangatta, Bontang', 'Indonesia', 'Kalimantan Timur'),
(221, 'Tanah Grogot, Kab. Paser', 'Indonesia', 'Kalimantan Timur'),
(222, 'Tanjung Selor', 'Indonesia', 'Kalimantan Timur'),
(223, 'Tarakan', 'Indonesia', 'Kalimantan Timur'),
(224, 'Tenggarong, Kutai', 'Indonesia', 'Kalimantan Timur'),
(225, 'Batam', 'Indonesia', 'Kepulauan Riau'),
(226, 'Kundur, Karimun', 'Indonesia', 'Kepulauan Riau'),
(227, 'Lagoi, Bintan', 'Indonesia', 'Kepulauan Riau'),
(228, 'Tanjung Balai Karimun', 'Indonesia', 'Kepulauan Riau'),
(229, 'Tanjung Uban / Bintan Utara', 'Indonesia', 'Kepulauan Riau'),
(230, 'Bakauheuni', 'Indonesia', 'Lampung'),
(231, 'Bukit Kemuning', 'Indonesia', 'Lampung'),
(232, 'Kalianda', 'Indonesia', 'Lampung'),
(233, 'Kota Agung', 'Indonesia', 'Lampung'),
(234, 'Kotabumi', 'Indonesia', 'Lampung'),
(235, 'Liwa', 'Indonesia', 'Lampung'),
(236, 'Metro', 'Indonesia', 'Lampung'),
(237, 'Pringsewu', 'Indonesia', 'Lampung'),
(238, 'Seputih Bawang, Gunung Sugih', 'Indonesia', 'Lampung'),
(239, 'Bima', 'Indonesia', 'Nusa Tenggara Timur'),
(240, 'Kalabahi', 'Indonesia', 'Nusa Tenggara Timur'),
(241, 'Loweleba', 'Indonesia', 'Nusa Tenggara Timur'),
(242, 'Maumere', 'Indonesia', 'Nusa Tenggara Timur'),
(243, 'Ruteng, Kab. Manggarai', 'Indonesia', 'Nusa Tenggara Timur'),
(244, 'Waingapu, Kab. Sumba Timur', 'Indonesia', 'Nusa Tenggara Timur'),
(245, 'Biak', 'Indonesia', 'Papua'),
(246, 'Kuala Kencana, Timika', 'Indonesia', 'Papua'),
(247, 'Merauke', 'Indonesia', 'Papua'),
(248, 'Serui', 'Indonesia', 'Papua'),
(249, 'Timika', 'Indonesia', 'Papua'),
(250, 'Manokwari', 'Indonesia', 'Papua Barat'),
(251, 'Sorong', 'Indonesia', 'Papua Barat'),
(252, 'Bagansiapi Api', 'Indonesia', 'Riau'),
(253, 'Bangkinang', 'Indonesia', 'Riau'),
(254, 'Bengkalis', 'Indonesia', 'Riau'),
(255, 'Dumai', 'Indonesia', 'Riau'),
(256, 'Duri', 'Indonesia', 'Riau'),
(257, 'Marpoyan', 'Indonesia', 'Riau'),
(258, 'Nongsa / Kabil - Batam', 'Indonesia', 'Riau'),
(259, 'Pangkalan Kerinci', 'Indonesia', 'Riau'),
(260, 'Rengat', 'Indonesia', 'Riau'),
(261, 'Rumbai', 'Indonesia', 'Riau'),
(262, 'Siak Sri Indrapura', 'Indonesia', 'Riau'),
(263, 'Teluk Kuantan', 'Indonesia', 'Riau'),
(264, 'Tembilahan', 'Indonesia', 'Riau'),
(265, 'Majene', 'Indonesia', 'Sulawesi Barat'),
(266, 'Mamasa', 'Indonesia', 'Sulawesi Barat'),
(267, 'Polewali', 'Indonesia', 'Sulawesi Barat'),
(268, 'Banawa', 'Indonesia', 'Sulawesi Selatan'),
(269, 'Benteng, Selayar', 'Indonesia', 'Sulawesi Selatan'),
(270, 'Bulukumba', 'Indonesia', 'Sulawesi Selatan'),
(271, 'Maros', 'Indonesia', 'Sulawesi Selatan'),
(272, 'Palopo', 'Indonesia', 'Sulawesi Selatan'),
(273, 'Pare Pare', 'Indonesia', 'Sulawesi Selatan'),
(274, 'Pinrang', 'Indonesia', 'Sulawesi Selatan'),
(275, 'Rantepao, Tana Toraja', 'Indonesia', 'Sulawesi Selatan'),
(276, 'Sengkang', 'Indonesia', 'Sulawesi Selatan'),
(277, 'Soroako', 'Indonesia', 'Sulawesi Selatan'),
(278, 'Sangguminasa, Gowa', 'Indonesia', 'Sulawesi Selatan'),
(279, 'Ampana Kota', 'Indonesia', 'Sulawesi Tengah'),
(280, 'Banggai', 'Indonesia', 'Sulawesi Tengah'),
(281, 'Buol', 'Indonesia', 'Sulawesi Tengah'),
(282, 'Luwuk', 'Indonesia', 'Sulawesi Tengah'),
(283, 'Parigi', 'Indonesia', 'Sulawesi Tengah'),
(284, 'Poso', 'Indonesia', 'Sulawesi Tengah'),
(285, 'Sigi Biromanu, Donggala', 'Indonesia', 'Sulawesi Tengah'),
(286, 'Tolitoli', 'Indonesia', 'Sulawesi Tengah'),
(287, 'Bau-bau', 'Indonesia', 'Sulawesi Tenggara'),
(288, 'Kolaka', 'Indonesia', 'Sulawesi Tenggara'),
(289, 'Unaaha, Konawe', 'Indonesia', 'Sulawesi Tenggara'),
(290, 'Airmadidi', 'Indonesia', 'Sulawesi Utara'),
(291, 'Amurang', 'Indonesia', 'Sulawesi Utara'),
(292, 'Bitung', 'Indonesia', 'Sulawesi Utara'),
(293, 'Kotamobagu', 'Indonesia', 'Sulawesi Utara'),
(294, 'Tahuna', 'Indonesia', 'Sulawesi Utara'),
(295, 'Tomohon', 'Indonesia', 'Sulawesi Utara'),
(296, 'Tondano', 'Indonesia', 'Sulawesi Utara'),
(297, 'Batusangkar', 'Indonesia', 'Sumatera Barat'),
(298, 'Bukittinggi', 'Indonesia', 'Sumatera Barat'),
(299, 'Gunung Sitoli, Nias', 'Indonesia', 'Sumatera Barat'),
(300, 'Padang Panjang', 'Indonesia', 'Sumatera Barat'),
(301, 'Payakumbuh', 'Indonesia', 'Sumatera Barat'),
(302, 'Sawahlunto', 'Indonesia', 'Sumatera Barat'),
(303, 'Solok', 'Indonesia', 'Sumatera Barat'),
(304, 'Baturaja', 'Indonesia', 'Sumatera Selatan'),
(305, 'Indrajaya', 'Indonesia', 'Sumatera Selatan'),
(306, 'Kayu Agung', 'Indonesia', 'Sumatera Selatan'),
(307, 'Lahat', 'Indonesia', 'Sumatera Selatan'),
(308, 'Lubuk Linggau', 'Indonesia', 'Sumatera Selatan'),
(309, 'Martapura', 'Indonesia', 'Sumatera Selatan'),
(310, 'Muara Belikan, Muara Enim', 'Indonesia', 'Sumatera Selatan'),
(311, 'Pagar Alam', 'Indonesia', 'Sumatera Selatan'),
(312, 'Plaju', 'Indonesia', 'Sumatera Selatan'),
(313, 'Prabumulih', 'Indonesia', 'Sumatera Selatan'),
(314, 'Sekayu', 'Indonesia', 'Sumatera Selatan'),
(315, 'Belawan', 'Indonesia', 'Sumatera Utara'),
(316, 'Binjai', 'Indonesia', 'Sumatera Utara'),
(317, 'Kabanjahe', 'Indonesia', 'Sumatera Utara'),
(318, 'Kisaran', 'Indonesia', 'Sumatera Utara'),
(319, 'Lubuk Pakam', 'Indonesia', 'Sumatera Utara'),
(320, 'Padang Sidempuan', 'Indonesia', 'Sumatera Utara'),
(321, 'Pematangsiantar', 'Indonesia', 'Sumatera Utara'),
(322, 'Rantau Prapat', 'Indonesia', 'Sumatera Utara'),
(323, 'Sei Rampah', 'Indonesia', 'Sumatera Utara'),
(324, 'Sibolga', 'Indonesia', 'Sumatera Utara'),
(325, 'Sibuhuan', 'Indonesia', 'Sumatera Utara'),
(326, 'Sidikalang', 'Indonesia', 'Sumatera Utara'),
(327, 'Sipirok', 'Indonesia', 'Sumatera Utara'),
(328, 'Stabat', 'Indonesia', 'Sumatera Utara'),
(329, 'Tanjung Balai Asahan', 'Indonesia', 'Sumatera Utara'),
(330, 'Tanjung Morawa', 'Indonesia', 'Sumatera Utara'),
(331, 'Tarutung', 'Indonesia', 'Sumatera Utara'),
(332, 'Tebing Tinggi', 'Indonesia', 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'US', 'United States'),
(2, 'CA', 'Canada'),
(3, 'AF', 'Afghanistan'),
(4, 'AL', 'Albania'),
(5, 'DZ', 'Algeria'),
(6, 'DS', 'American Samoa'),
(7, 'AD', 'Andorra'),
(8, 'AO', 'Angola'),
(9, 'AI', 'Anguilla'),
(11, 'AG', 'Antigua and/or Barbuda'),
(12, 'AR', 'Argentina'),
(13, 'AM', 'Armenia'),
(14, 'AW', 'Aruba'),
(15, 'AU', 'Australia'),
(16, 'AT', 'Austria'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BS', 'Bahamas'),
(19, 'BH', 'Bahrain'),
(20, 'BD', 'Bangladesh'),
(21, 'BB', 'Barbados'),
(22, 'BY', 'Belarus'),
(23, 'BE', 'Belgium'),
(24, 'BZ', 'Belize'),
(25, 'BJ', 'Benin'),
(26, 'BM', 'Bermuda'),
(27, 'BT', 'Bhutan'),
(28, 'BO', 'Bolivia'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BL', 'Bonaire'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British lndian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CV', 'Cape Verde'),
(41, 'KY', 'Cayman Islands'),
(42, 'CF', 'Central African Republic'),
(43, 'TD', 'Chad'),
(44, 'CL', 'Chile'),
(45, 'CN', 'China'),
(46, 'IC', 'Canary Island'),
(47, 'CC', 'Curacao'),
(48, 'CO', 'Colombia'),
(49, 'KM', 'Comoros'),
(50, 'CG', 'Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecudaor'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(75, 'GF', 'French Guiana'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Hawaii'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'ID', 'Indonesia'),
(101, 'IR', 'Iran (Islamic Republic of)'),
(102, 'IQ', 'Iraq'),
(103, 'IE', 'Ireland'),
(104, 'IL', 'Israel'),
(105, 'IT', 'Italy'),
(106, 'CI', 'Isle Of Man'),
(107, 'JM', 'Jamaica'),
(108, 'JP', 'Japan'),
(109, 'JO', 'Jordan'),
(110, 'KZ', 'Kazakhstan'),
(111, 'KE', 'Kenya'),
(112, 'KI', 'Kiribati'),
(113, 'KP', 'Korea, Democratic People''s Republic of'),
(114, 'KR', 'Korea, Republic of'),
(115, 'KW', 'Kuwait'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'LA', 'Lao People''s Democratic Republic'),
(118, 'LV', 'Latvia'),
(119, 'LB', 'Lebanon'),
(120, 'LS', 'Lesotho'),
(121, 'LR', 'Liberia'),
(123, 'LI', 'Liechtenstein'),
(124, 'LT', 'Lithuania'),
(125, 'LU', 'Luxembourg'),
(126, 'MO', 'Macau'),
(127, 'MK', 'Macedonia'),
(128, 'MG', 'Madagascar'),
(129, 'MW', 'Malawi'),
(130, 'MY', 'Malaysia'),
(131, 'MV', 'Maldives'),
(132, 'ML', 'Mali'),
(133, 'MT', 'Malta'),
(134, 'MH', 'Marshall Islands'),
(135, 'MQ', 'Martinique'),
(136, 'MR', 'Mauritania'),
(137, 'MU', 'Mauritius'),
(138, 'TY', 'Mayotte'),
(139, 'MX', 'Mexico'),
(141, 'MD', 'Moldova, Republic of'),
(142, 'MC', 'Monaco'),
(143, 'MN', 'Mongolia'),
(144, 'MS', 'Montserrat'),
(145, 'MA', 'Morocco'),
(146, 'MZ', 'Mozambique'),
(147, 'MM', 'Myanmar'),
(148, 'NA', 'Namibia'),
(149, 'NR', 'Nauru'),
(150, 'NP', 'Nepal'),
(151, 'NL', 'Netherlands'),
(152, 'AN', 'Netherlands Antilles'),
(153, 'NC', 'New Caledonia'),
(154, 'NZ', 'New Zealand'),
(155, 'NI', 'Nicaragua'),
(156, 'NE', 'Niger'),
(157, 'NG', 'Nigeria'),
(158, 'NU', 'Niue'),
(159, 'NV', 'Nevis'),
(161, 'NO', 'Norway'),
(162, 'OM', 'Oman'),
(163, 'PK', 'Pakistan'),
(164, 'PW', 'Palau'),
(165, 'PA', 'Panama'),
(166, 'PG', 'Papua New Guinea'),
(167, 'PY', 'Paraguay'),
(168, 'PE', 'Peru'),
(169, 'PH', 'Philippines'),
(171, 'PL', 'Poland'),
(172, 'PT', 'Portugal'),
(174, 'QA', 'Qatar'),
(175, 'RE', 'Reunion'),
(176, 'RO', 'Romania'),
(177, 'RU', 'Russian Federation'),
(178, 'RW', 'Rwanda'),
(179, 'KN', 'Saint Kitts and Nevis'),
(180, 'LC', 'Saint Lucia'),
(181, 'VC', 'Saint Vincent and the Grenadines'),
(182, 'WS', 'Samoa'),
(183, 'SM', 'San Marino'),
(184, 'ST', 'Sao Tome and Principe'),
(185, 'SA', 'Saudi Arabia'),
(186, 'SN', 'Senegal'),
(187, 'SC', 'Seychelles'),
(188, 'SL', 'Sierra Leone'),
(189, 'SG', 'Singapore'),
(190, 'SK', 'Slovakia'),
(191, 'SI', 'Slovenia'),
(192, 'SB', 'Solomon Islands'),
(193, 'SO', 'Somalia'),
(194, 'ZA', 'South Africa'),
(195, 'GS', 'South Georgia South Sandwich Islands'),
(196, 'ES', 'Spain'),
(197, 'LK', 'Sri Lanka'),
(198, 'SH', 'St. Helena'),
(199, 'PM', 'St. Pierre and Miquelon'),
(200, 'SD', 'Sudan'),
(201, 'SR', 'Suriname'),
(202, 'SJ', 'Svalbarn and Jan Mayen Islands'),
(203, 'SZ', 'Swaziland'),
(204, 'SE', 'Sweden'),
(205, 'CH', 'Switzerland'),
(206, 'SY', 'Syrian Arab Republic'),
(207, 'TW', 'Taiwan'),
(208, 'TJ', 'Tajikistan'),
(209, 'TZ', 'Tanzania, United Republic of'),
(210, 'TH', 'Thailand'),
(211, 'TG', 'Togo'),
(212, 'TK', 'Tokelau'),
(213, 'TO', 'Tonga'),
(214, 'TT', 'Trinidad and Tobago'),
(215, 'TN', 'Tunisia'),
(216, 'TR', 'Turkey'),
(217, 'TM', 'Turkmenistan'),
(218, 'TC', 'Turks and Caicos Islands'),
(219, 'TV', 'Tuvalu'),
(220, 'UG', 'Uganda'),
(221, 'UA', 'Ukraine'),
(222, 'AE', 'United Arab Emirates'),
(223, 'GB', 'United Kingdom'),
(224, 'UM', 'United States minor outlying islands'),
(225, 'UY', 'Uruguay'),
(226, 'UZ', 'Uzbekistan'),
(227, 'VU', 'Vanuatu'),
(228, 'VA', 'Vatican City State'),
(229, 'VE', 'Venezuela'),
(230, 'VN', 'Vietnam'),
(231, 'VG', 'Virigan Islands (British)'),
(232, 'VI', 'Virgin Islands (U.S.)'),
(233, 'WF', 'Wallis and Futuna Islands'),
(234, 'EH', 'Western Sahara'),
(235, 'YE', 'Yemen'),
(236, 'YU', 'Yugoslavia'),
(237, 'ZR', 'Zaire'),
(238, 'ZM', 'Zambia'),
(239, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_city`
--

CREATE TABLE IF NOT EXISTS `delivery_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_id` int(11) NOT NULL DEFAULT '0',
  `city` varchar(100) NOT NULL DEFAULT '',
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=555 ;

--
-- Dumping data for table `delivery_city`
--

INSERT INTO `delivery_city` (`id`, `delivery_id`, `city`, `state`) VALUES
(1, 2, 'BANDA ACEH', 1),
(2, 2, 'BIREUN', 1),
(3, 2, 'BIANG KEUJERUEN', 1),
(4, 2, 'BLANGPIDIE', 1),
(5, 2, 'CALANG', 1),
(6, 2, 'JANTO', 1),
(7, 2, 'KOTA CANE', 1),
(8, 2, 'KREUNG GEUKEUH', 1),
(9, 2, 'KUALA SIMPANG', 1),
(10, 2, 'LANGSA', 1),
(11, 2, 'LHOKSEUMAWE', 1),
(12, 2, 'LHOKSUKOH', 1),
(13, 2, 'MEULBUOH', 1),
(14, 2, 'SABANG', 1),
(15, 2, 'SIGLI', 1),
(16, 2, 'SINABANG', 1),
(17, 2, 'SINGKIL', 1),
(18, 2, 'SUKAMAKMUR', 1),
(19, 2, 'TAKENGON', 1),
(20, 2, 'TAPAK TUAN', 1),
(21, 2, 'SUBULUSSALAM', 1),
(22, 2, 'MEREUDU', 1),
(23, 2, 'KREUENG SABEE', 1),
(24, 2, 'SIMPANG TIGA REDELON', 1),
(25, 2, 'OTHER PROV ACEH', 1),
(26, 2, 'BAGAN BATU', 2),
(27, 2, 'BAGAN SIAPI API', 2),
(28, 2, 'BANGKINANG', 2),
(29, 2, 'BENGKALIS', 2),
(30, 2, 'DUMAI', 2),
(31, 2, 'DURI', 2),
(32, 2, 'MINAS', 2),
(33, 2, 'PANGKALAN KERINCI', 2),
(34, 2, 'PASIR PANGARAYAN', 2),
(35, 2, 'PEKANBARU', 2),
(36, 2, 'PERAWANG', 2),
(37, 2, 'RENGAT', 2),
(38, 2, 'SIAK INDRAPURA', 2),
(39, 2, 'TELUK KUANTAN', 2),
(40, 2, 'TEMBILAHAN', 2),
(41, 2, 'UJUNG BATU', 2),
(42, 2, 'RUMBAI', 2),
(43, 2, 'MARPOYAN', 2),
(44, 2, 'DABO SINGKEP', 3),
(45, 2, 'BATAM', 3),
(46, 2, 'NATUNA/RANAI', 3),
(47, 2, 'TANJUNG BALAI KARIMUN', 3),
(48, 2, 'LAGOI', 3),
(49, 2, 'NONGSA', 3),
(50, 2, 'KABIL', 3),
(51, 2, 'TANJUNG PINANG', 3),
(52, 2, 'LINGGA/DAIK', 3),
(53, 2, 'TANJUNG UBAN', 3),
(54, 2, 'BANDAR SRI BINTAN', 3),
(55, 2, 'OTHER RIAU', 3),
(56, 2, 'BANGKO', 4),
(57, 2, 'JAMBI', 4),
(58, 2, 'KUALA TUNGKAL', 4),
(59, 2, 'MUARA BULIAN', 4),
(60, 2, 'MUARA BUNGKO', 4),
(61, 2, 'MUARA SABAK', 4),
(62, 2, 'MUARA TEBO', 4),
(63, 2, 'RAMBA', 4),
(64, 2, 'SAROLANGUN', 4),
(65, 2, 'SENGETI', 4),
(66, 2, 'SUNGAI PENUH', 4),
(67, 2, 'OTHER JAMBI', 4),
(68, 2, 'BALIGE', 5),
(69, 2, 'BINJAI', 5),
(70, 2, 'DOLOG SANGGUL', 5),
(71, 2, 'GUNUNG SITOLI/NIAS', 5),
(72, 2, 'KABAN JAHE', 5),
(73, 2, 'KISARAN', 5),
(74, 2, 'LAGUBOTI', 5),
(75, 2, 'LUBUK PAKAM', 5),
(76, 2, 'MEDAN', 5),
(77, 2, 'PADANG SIDEMPUAN', 5),
(78, 2, 'PANGURUPAN', 5),
(79, 2, 'PANYAMBUNGAN', 5),
(80, 2, 'PEMATANG SIANTAR', 5),
(81, 2, 'RANTAU PRAPAT', 5),
(82, 2, 'SALAK', 5),
(83, 2, 'SIBOLGA', 5),
(84, 2, 'SIBORONGGOBONG', 5),
(85, 2, 'SIDIKALANG', 5),
(86, 2, 'STABAT', 5),
(87, 2, 'TANJUNG BALAI ASAHAN', 5),
(88, 2, 'TANJUNG MORAWA', 5),
(89, 2, 'TARUTUNG', 5),
(90, 2, 'TEBING TINGGI', 5),
(91, 2, 'SEI RAMPAH', 5),
(92, 2, 'SIBUHUAN', 5),
(93, 2, 'SIPIROK', 5),
(94, 2, 'PANGKALAN BRANDAN', 5),
(95, 2, 'GUNUNG TUA', 5),
(96, 2, 'LIMAPULUH', 5),
(97, 2, 'BELAWAN', 5),
(98, 2, 'TELUK DALAM', 5),
(99, 2, 'OTHER SUMUT', 5),
(100, 2, 'BATU SANGKAR', 6),
(101, 2, 'BUKIT TINGGI', 6),
(102, 2, 'DHARMAS RAYA', 6),
(103, 2, 'KEP.PAGAI', 6),
(104, 2, 'LUBUK ALUNG', 6),
(105, 2, 'LUBUK BASUNG', 6),
(106, 2, 'LUBUK SIKAPING', 6),
(107, 2, 'SAWAH LUNTO', 6),
(108, 2, 'PADANG', 6),
(109, 2, 'PADANG PANJANG', 6),
(110, 2, 'PAINAN', 6),
(111, 2, 'PARIAMAN', 6),
(112, 2, 'PAYAKUMBUH', 6),
(113, 2, 'SOLOK', 6),
(114, 2, 'AROSUKA', 6),
(115, 2, 'TUA PEJAT', 6),
(116, 2, 'SIJUNJUNG/MUARA', 6),
(117, 2, 'SOLOK SELATAN', 6),
(118, 2, 'LIMA PULUH KOTA', 6),
(119, 2, 'PADANG PARIAMAN', 6),
(120, 2, 'OTHER SUMBAR', 6),
(121, 2, 'BATURAJA', 7),
(122, 2, 'EMPAT LAWANG', 7),
(123, 2, 'INDRALAYA', 7),
(124, 2, 'KAYU AGUNG', 7),
(125, 2, 'LAHAT', 7),
(126, 2, 'LUBUK LINGGAU', 7),
(127, 2, 'MARTA PURA', 7),
(128, 2, 'MUARA DUA', 7),
(129, 2, 'MUARA ENIM', 7),
(130, 2, 'PAGAR ALAM', 7),
(131, 2, 'PALEMBANG', 7),
(132, 2, 'BANYUASIN', 7),
(133, 2, 'PRABUMULIH', 7),
(134, 2, 'SEKAYU', 7),
(135, 2, 'SUNGAI LILIN', 7),
(136, 2, 'TANJUNG ENIM', 7),
(137, 2, 'PLAJU', 7),
(138, 2, 'MUSI RAWAS', 7),
(139, 2, 'OTHER SUMSEL', 7),
(140, 2, 'AMPLAPURA', 8),
(141, 2, 'BADUNG/MENGUWI', 8),
(142, 2, 'BANGLI', 8),
(143, 2, 'BULELENG', 8),
(144, 2, 'SINGARAJA', 8),
(145, 2, 'DENPASAR', 8),
(146, 2, 'GIANYAR UBUD', 8),
(147, 2, 'JEMBRANA/NEGARA', 8),
(148, 2, 'KLUNGKUNG/SAMARAPURA', 8),
(149, 2, 'KUTA', 8),
(150, 2, 'SANUR', 8),
(151, 2, 'NUSA DUA', 8),
(152, 2, 'TABANAN', 8),
(153, 2, 'NGURAH RAI', 8),
(154, 2, 'JIMBARAN', 8),
(155, 2, 'GILIMANUK', 8),
(156, 2, 'OTHER BALI', 8),
(157, 2, 'BELINYU', 9),
(158, 2, 'JEBUS', 9),
(159, 2, 'KELAPA', 9),
(160, 2, 'KOBA', 9),
(161, 2, 'MENTOK', 9),
(162, 2, 'PANGKAL PINANG', 9),
(163, 2, 'SUNGAI LIAT', 9),
(164, 2, 'TOBOALI', 9),
(165, 2, 'MANGGAR', 9),
(166, 2, 'BELITUNG', 9),
(167, 2, 'OTHER BANGKA BELITUNG', 9),
(168, 2, 'AGRAMAKMUR', 10),
(169, 2, 'BENGKULU', 10),
(170, 2, 'KAUR', 10),
(171, 2, 'CURUP', 10),
(172, 2, 'KEPAHYANG', 10),
(173, 2, 'LEBONG/MUARA AMAN', 10),
(174, 2, 'MANNA', 10),
(175, 2, 'MUKO MUKO', 10),
(176, 2, 'TAIS', 10),
(177, 2, 'OTHER BENGKULU', 10),
(178, 2, 'BANDAR LAMPUNG', 11),
(179, 2, 'KALIANDA', 11),
(180, 2, 'KOTA AGUNG', 11),
(181, 2, 'KOTA BUMI', 11),
(182, 2, 'MENGGALA', 11),
(183, 2, 'METRO', 11),
(184, 2, 'PRINGSEWU', 11),
(185, 2, 'LIWA', 11),
(186, 2, 'SUKADANA', 11),
(187, 2, 'GUNUNG SUGIH', 11),
(188, 2, 'BAKAUHEUNI', 11),
(189, 2, 'GEDONG TATAAN', 11),
(190, 2, 'BLAMBANGAN UMPU', 11),
(191, 2, 'BANDAR JAYA', 11),
(192, 2, 'BUKIT KEMUNING', 11),
(193, 2, 'KRUI', 11),
(194, 2, 'SUMBER JAYA', 11),
(195, 2, 'TALANG PADANG', 11),
(196, 2, 'OTHER LAMPUNG', 11),
(197, 2, 'BOGOR', 12),
(198, 2, 'CIBINONG', 12),
(199, 2, 'BEKASI', 12),
(200, 2, 'CIKARANG', 12),
(201, 2, 'DEPOK', 12),
(202, 2, 'KARAWANG', 12),
(203, 2, 'CIKAMPEK', 12),
(204, 2, 'CILEGON', 13),
(205, 2, 'RANGKAS BITUNG', 13),
(206, 2, 'SERANG', 13),
(207, 2, 'PANDEGLANG', 13),
(208, 2, 'MERAK', 13),
(209, 2, 'BALARAJA', 13),
(210, 2, 'BANDARA', 13),
(211, 2, 'SERPONG', 13),
(212, 2, 'TANGERANG', 13),
(213, 2, 'TIGARAKSA', 13),
(214, 2, 'OTHER BANTEN', 13),
(215, 2, 'SUKABUMI', 14),
(216, 2, 'CIANJUR', 14),
(217, 2, 'CIREBON', 14),
(218, 2, 'INDRAMAYU', 14),
(219, 2, 'KUNINGAN', 14),
(220, 2, 'MAJALENGKA', 14),
(221, 2, 'JATIBARANG', 14),
(222, 2, 'KADIPATEN', 14),
(223, 2, 'LOSARI', 14),
(224, 2, 'PALIMANAN', 14),
(225, 2, 'JATIWANGI', 14),
(226, 2, 'SUMBER', 14),
(227, 2, 'BANDUNG', 14),
(228, 2, 'BANJAR', 14),
(229, 2, 'CIAMIS', 14),
(230, 2, 'CIMAHI', 14),
(231, 2, 'GARUT', 14),
(232, 2, 'PURWAKARTA', 14),
(233, 2, 'SUBANG', 14),
(234, 2, 'SUMEDANG', 14),
(235, 2, 'TASIKMALAYA', 14),
(236, 2, 'CIMAREHE', 14),
(237, 2, 'SOREANG', 14),
(238, 2, 'SINGAPARNA', 14),
(239, 2, 'JATINANGOR', 14),
(240, 2, 'PADALARANG', 14),
(241, 2, 'RANCAEKEK', 14),
(242, 2, 'MAJALAYA', 14),
(243, 2, 'LEMBANG', 14),
(244, 2, 'OTHER JAWA BARAT', 14),
(245, 2, 'CILACAP', 15),
(246, 2, 'MAJENANG', 15),
(247, 2, 'BOYOLALI', 15),
(248, 2, 'KARANG ANYAR', 15),
(249, 2, 'KLATEN', 15),
(250, 2, 'SOLO', 15),
(251, 2, 'SRAGEN', 15),
(252, 2, 'SUKOHARJO', 15),
(253, 2, 'WONOGIRI', 15),
(254, 2, 'KARTOSURO', 15),
(255, 2, 'AMBARAWA', 15),
(256, 2, 'AJIBARANG', 15),
(257, 2, 'BANJARNEGARA', 15),
(258, 2, 'BANYUMAS', 15),
(259, 2, 'BATANG BLORA', 15),
(260, 2, 'BOJONEGORO', 15),
(261, 2, 'BREBES', 15),
(262, 2, 'BUMIAYU', 15),
(263, 2, 'CEPU', 15),
(264, 2, 'DEMAK', 15),
(265, 2, 'GROBONGAN', 15),
(266, 2, 'JEPARA', 15),
(267, 2, 'KENDAL', 15),
(268, 2, 'KUDUS', 15),
(269, 2, 'PATI', 15),
(270, 2, 'PEKALONGAN', 15),
(271, 2, 'PEMALANG', 15),
(272, 2, 'PURBALINGGA', 15),
(273, 2, 'PURWODADI', 15),
(274, 2, 'PURWOKERTO', 15),
(275, 2, 'REMBANG', 15),
(276, 2, 'SALATIGA', 15),
(277, 2, 'SEMARANG', 15),
(278, 2, 'SLAWI', 15),
(279, 2, 'TEGAL', 15),
(280, 2, 'UNGARAN', 15),
(281, 2, 'KEBUMEN', 15),
(282, 2, 'MAGELANG', 15),
(283, 2, 'PURWOREJO', 15),
(284, 2, 'TEMANGGUNG', 15),
(285, 2, 'WONOSOBO', 15),
(286, 2, 'MUNGKID', 15),
(287, 2, 'OTHER JATENG', 15),
(288, 2, 'BANTUL', 16),
(289, 2, 'D.I YOGYAKARTA', 16),
(290, 2, 'KULON PROGO', 16),
(291, 2, 'WATES', 16),
(292, 2, 'SLEMAN', 16),
(293, 2, 'WONOSARI', 16),
(294, 2, 'PRAMBANAN', 16),
(295, 2, 'OTHER JOGJAKARTA', 16),
(296, 2, 'BANGKALAN', 17),
(297, 2, 'GRESIK', 17),
(298, 2, 'JOMBANG', 17),
(299, 2, 'LAMONGAN', 17),
(300, 2, 'NGANJUK', 17),
(301, 2, 'PAMEKASAN', 17),
(302, 2, 'SAMPANG', 17),
(303, 2, 'SIDOARJO', 17),
(304, 2, 'SUMENEP', 17),
(305, 2, 'SURABAYA', 17),
(306, 2, 'TRENGGALEK', 17),
(307, 2, 'TUBAN', 17),
(308, 2, 'TULUNG AGUNG', 17),
(309, 2, 'PANDAAN', 17),
(310, 2, 'PASURUAN', 17),
(311, 2, 'JEMBER', 17),
(312, 2, 'BANYUWANGI', 17),
(313, 2, 'BONDOWOSO', 17),
(314, 2, 'PROBOLINGGO', 17),
(315, 2, 'LUMAJANG', 17),
(316, 2, 'SITOBUNDO', 17),
(317, 2, 'KRAKSAAN', 17),
(318, 2, 'PAITON', 17),
(319, 2, 'MALANG', 17),
(320, 2, 'BATU', 17),
(321, 2, 'BLITAR', 17),
(322, 2, 'KEPANJEN', 17),
(323, 2, 'SINGOSARI', 17),
(324, 2, 'MOJOKERTO', 17),
(325, 2, 'KENDIRI', 17),
(326, 2, 'MADIUN', 17),
(327, 2, 'CARUBAN', 17),
(328, 2, 'MAGETAN', 17),
(329, 2, 'NGAWI', 17),
(330, 2, 'PACITAN', 17),
(331, 2, 'PONOROGO', 17),
(332, 2, 'OTHER JATIM', 17),
(333, 2, 'BENGKAYANG', 18),
(334, 2, 'KETAPANG', 18),
(335, 2, 'MEMPAWAH', 18),
(336, 2, 'NANGAH PINOH/MELAWI', 18),
(337, 2, 'NGABANG', 18),
(338, 2, 'PONTIANAK', 18),
(339, 2, 'PUTUS SIBAU', 18),
(340, 2, 'SAMBAS', 18),
(341, 2, 'SANGGAU', 18),
(342, 2, 'SEKADAU', 18),
(343, 2, 'SINGKAWANG', 18),
(344, 2, 'SINTANG', 18),
(345, 2, 'KUBU RAYA/SUNGAI RAYA', 18),
(346, 2, 'KAYONG UTARA', 18),
(347, 2, 'WAJOK', 18),
(348, 2, 'OTHER KALIMANTAN BARAT', 18),
(349, 2, 'AMUNTAI', 19),
(350, 2, 'BALANGAN/PARINGIN', 19),
(351, 2, 'BANJAR/MARTAPURA', 19),
(352, 2, 'BANJARMASIN', 19),
(353, 2, 'BARABAI', 19),
(354, 2, 'BATU LICIN', 19),
(355, 2, 'BUNTOK/BARITO SEL', 19),
(356, 2, 'KANDANGAN', 19),
(357, 2, 'KOTA BARU', 19),
(358, 2, 'MARABAHAN', 19),
(359, 2, 'MUARA TEWEH', 19),
(360, 2, 'PELEIHARI', 19),
(361, 2, 'PURUKCAHU', 19),
(362, 2, 'RANTAU', 19),
(363, 2, 'SUNGAI DANAU', 19),
(364, 2, 'TAMIANGLAYANG', 19),
(365, 2, 'TANJUNG', 19),
(366, 2, 'BANJAR BARU', 19),
(367, 2, 'OTHER KALIMANTAN SELATAN', 19),
(368, 2, 'KASONGAN', 20),
(369, 2, 'KUALA KAPUAS', 20),
(370, 2, 'KUALA KURUN', 20),
(371, 2, 'KUALA PEMBUANG', 20),
(372, 2, 'LAMANDAU/NANGEBULIK', 20),
(373, 2, 'PALANGKARAYA', 20),
(374, 2, 'PANGKALAN BUN', 20),
(375, 2, 'PULAU PISAU', 20),
(376, 2, 'SAMPIT', 20),
(377, 2, 'SUKAMARA', 20),
(378, 2, 'BUNTOK', 20),
(379, 2, 'OTHER KALIMANTAN TENGAH', 20),
(380, 2, 'BALIKPAPAN', 21),
(381, 2, 'PANAJAM', 21),
(382, 2, 'TANAH GROGOT', 21),
(383, 2, 'TANJUNG REDEP/BERAU', 21),
(384, 2, 'KUTAI PANTAI/SENIPAH/HANDIL', 21),
(385, 2, 'SENDAWAR', 21),
(386, 2, 'ANGGANA', 21),
(387, 2, 'KUTAI BARAT', 21),
(388, 2, 'LOA KULU', 21),
(389, 2, 'MUARA BADAK', 21),
(390, 2, 'PALARAN', 21),
(391, 2, 'SAMARINDA', 21),
(392, 2, 'SANGA SANGA', 21),
(393, 2, 'TENGGARONG/ KUTAI KERTANI', 21),
(394, 2, 'BONTANG', 21),
(395, 2, 'TELUK PANDAN', 21),
(396, 2, 'SANGATA', 21),
(397, 2, 'TARAKAN', 21),
(398, 2, 'TANJUNG SELOR', 21),
(399, 2, 'MALINAU', 21),
(400, 2, 'NUNUKAN', 21),
(401, 2, 'SEBATIK', 21),
(402, 2, 'OTHER KALIMANTAN TIMUR', 21),
(403, 2, 'KEPULAUAN BANGGAI', 22),
(404, 2, 'BUAL', 22),
(405, 2, 'DONGGALA/BANAWA', 22),
(406, 2, 'LUWUK', 22),
(407, 2, 'MOROWALI/KOLONEDALE', 22),
(408, 2, 'PALU', 22),
(409, 2, 'PERIGI', 22),
(410, 2, 'POSO', 22),
(411, 2, 'TOJO UNA UNA/AMPANA', 22),
(412, 2, 'TOLI TOLI', 22),
(413, 2, 'OTHER SULAWESI TENGAH', 22),
(414, 2, 'BANTA ENG', 23),
(415, 2, 'BARRU', 23),
(416, 2, 'WATAMPONE', 23),
(417, 2, 'BULUKUMBA', 23),
(418, 2, 'ENREKANG', 23),
(419, 2, 'SUNGGUMINASA', 23),
(420, 2, 'JENE PONTO', 23),
(421, 2, 'MAKALE', 23),
(422, 2, 'MAKASAR', 23),
(423, 2, 'MAROS', 23),
(424, 2, 'MASAMBA', 23),
(425, 2, 'PALOPO', 23),
(426, 2, 'PARE-PARE', 23),
(427, 2, 'PINRANG', 23),
(428, 2, 'BENTENG', 23),
(429, 2, 'SENGKANG', 23),
(430, 2, 'SUNDENRENG RAPPANG', 23),
(431, 2, 'SINJAI', 23),
(432, 2, 'WATANSOMPENG', 23),
(433, 2, 'SOROAKO', 23),
(434, 2, 'MALILI', 23),
(435, 2, 'TAKALAR', 23),
(436, 2, 'BELOPA', 23),
(437, 2, 'OTHER SULAWESI SELATAN', 23),
(438, 2, 'MAJENE', 24),
(439, 2, 'MAMASA', 24),
(440, 2, 'MAMUJU', 24),
(441, 2, 'PASANGKAYU', 24),
(442, 2, 'POLEWALI', 24),
(443, 2, 'OTHER SULAWESI  BARAT', 24),
(444, 2, 'ANDOLO', 25),
(445, 2, 'BAU-BAU', 25),
(446, 2, 'RUMBIA', 25),
(447, 2, 'KENDARI', 25),
(448, 2, 'KOLAKA', 25),
(449, 2, 'LASU SUA', 25),
(450, 2, 'RAHA', 25),
(451, 2, 'UNAAHA', 25),
(452, 2, 'WAKATOBI/WANGI WANGI', 25),
(453, 2, 'PASAR WAJO', 25),
(454, 2, 'MALUKU', 25),
(455, 2, 'AMBON', 25),
(456, 2, 'DOBO', 25),
(457, 2, 'HUNIMOA', 25),
(458, 2, 'PIRU', 25),
(459, 2, 'MASOHI', 25),
(460, 2, 'NAMLEA', 25),
(461, 2, 'SAUMLAKI/TUAL', 25),
(462, 2, 'JAILOLO', 25),
(463, 2, 'LABUHA', 25),
(464, 2, 'MABA', 25),
(465, 2, 'SANANA', 25),
(466, 2, 'WEDA/SOASIU', 25),
(467, 2, 'TERNATE', 25),
(468, 2, 'TOBELO', 25),
(469, 2, 'TIDORE', 25),
(470, 2, 'OTHER SULAWESI TENGGARA', 25),
(471, 2, 'TILAMUTA', 26),
(472, 2, 'SUWAWA', 26),
(473, 2, 'GORONTALO', 26),
(474, 2, 'LIMBOTO', 26),
(475, 2, 'MARISA', 26),
(476, 2, 'KWANDANG', 26),
(477, 2, 'OTHER GORONTALO', 26),
(478, 2, 'AMURANG', 27),
(479, 2, 'BITUNG', 27),
(480, 2, 'KOTAMOBAGU', 27),
(481, 2, 'MANADO', 27),
(482, 2, 'AIRMADIDI', 27),
(483, 2, 'TAHUNA', 27),
(484, 2, 'TOMOHON', 27),
(485, 2, 'TONDANO', 27),
(486, 2, 'RATAHAN', 27),
(487, 2, 'BOROKO', 27),
(488, 2, 'OTHER SULAWESI UTARA', 27),
(489, 2, 'BIMA', 28),
(490, 2, 'BATU HIJAU', 28),
(491, 2, 'RAMBA/WOHA', 28),
(492, 2, 'DOMPU', 28),
(493, 2, 'GERUNG', 28),
(494, 2, 'MATARAM', 28),
(495, 2, 'PRAYA', 28),
(496, 2, 'SELONG', 28),
(497, 2, 'SEMBAWA-BESAR', 28),
(498, 2, 'TALIWANG', 28),
(499, 2, 'OTHER NTB', 28),
(500, 2, 'KALABAHI', 29),
(501, 2, 'ATAMBUA', 29),
(502, 2, 'ROTE NDAO', 29),
(503, 2, 'BAJAWA', 29),
(504, 2, 'ENDE', 29),
(505, 2, 'KAFEMENAHU', 29),
(506, 2, 'KUPANG', 29),
(507, 2, 'LABUAN BAJO', 29),
(508, 2, 'LARANTUKA', 29),
(509, 2, 'LEWOLEBA', 29),
(510, 2, 'MAUMERE', 29),
(511, 2, 'MANGGARAI/SOE', 29),
(512, 2, 'WAIKABUBAK', 29),
(513, 2, 'WAINGAPU', 29),
(514, 2, 'BORONG', 29),
(515, 2, 'MBAY', 29),
(516, 2, 'OELAMASI', 29),
(517, 2, 'TAMBOLAKA', 29),
(518, 2, 'WAIBAKUL', 29),
(519, 2, 'OTHER NTT', 29),
(520, 2, 'AGATS', 30),
(521, 2, 'BIAK', 30),
(522, 2, 'JAYAPURA', 30),
(523, 2, 'WARIS', 30),
(524, 2, 'MAAPI', 30),
(525, 2, 'MERAUKE', 30),
(526, 2, 'MULIA', 30),
(527, 2, 'NABIRE', 30),
(528, 2, 'OKSIBIL', 30),
(529, 2, 'PANIAI', 30),
(530, 2, 'SARMI', 30),
(531, 2, 'SORENDIWARI', 30),
(532, 2, 'KARUBAGA', 30),
(533, 2, 'WAMENA', 30),
(534, 2, 'BOTWA/MAROPEN', 30),
(535, 2, 'SUMOHAI', 30),
(536, 2, 'YAPEN WAROPEN', 30),
(537, 2, 'SENTANI', 30),
(538, 2, 'MAMBERAMO', 30),
(539, 2, 'BOVEN DIGUL', 30),
(540, 2, 'OTHER PAPUA', 30),
(541, 2, 'FAK-FAK', 31),
(542, 2, 'KAIMANA', 31),
(543, 2, 'MANOKWARI', 31),
(544, 2, 'RAJA AMPAT/WAISAI', 31),
(545, 2, 'SORONG', 31),
(546, 2, 'BINTUNI', 31),
(547, 2, 'SORONG SEL', 31),
(548, 2, 'RASEI', 31),
(549, 2, 'OTHER PAPUA BARAT', 31),
(550, 2, 'TIMIKA', 31),
(551, 2, 'TEMBAGA PURA', 31),
(552, 2, 'OTHER TIMIKA', 31),
(553, 2, 'DKI JAKARTA', 12),
(554, 2, 'AMBIL DI TEMPAT', 32);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_cost`
--

CREATE TABLE IF NOT EXISTS `delivery_cost` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_city_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT '',
  `cost` int(11) NOT NULL DEFAULT '0',
  `express_cost` int(11) NOT NULL,
  `weight` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=555 ;

--
-- Dumping data for table `delivery_cost`
--

INSERT INTO `delivery_cost` (`id`, `delivery_city_id`, `type`, `cost`, `express_cost`, `weight`) VALUES
(1, 1, 'Baju / Kaos', 29500, 0, 1),
(2, 2, 'Baju / Kaos', 25400, 0, 1),
(3, 3, 'Baju / Kaos', 40500, 0, 1),
(4, 4, 'Baju / Kaos', 49500, 0, 1),
(5, 5, 'Baju / Kaos', 45000, 0, 1),
(6, 6, 'Baju / Kaos', 28400, 0, 1),
(7, 7, 'Baju / Kaos', 35500, 0, 1),
(8, 8, 'Baju / Kaos', 28400, 0, 1),
(9, 9, 'Baju / Kaos', 28400, 0, 1),
(10, 10, 'Baju / Kaos', 25400, 0, 1),
(11, 11, 'Baju / Kaos', 25400, 0, 1),
(12, 12, 'Baju / Kaos', 28400, 0, 1),
(13, 13, 'Baju / Kaos', 25400, 0, 1),
(14, 14, 'Baju / Kaos', 28400, 0, 1),
(15, 15, 'Baju / Kaos', 28400, 0, 1),
(16, 16, 'Baju / Kaos', 35500, 0, 1),
(17, 17, 'Baju / Kaos', 35500, 0, 1),
(18, 18, 'Baju / Kaos', 35500, 0, 1),
(19, 19, 'Baju / Kaos', 35500, 0, 1),
(20, 20, 'Baju / Kaos', 35500, 0, 1),
(21, 21, 'Baju / Kaos', 28400, 0, 1),
(22, 22, 'Baju / Kaos', 28400, 0, 1),
(23, 23, 'Baju / Kaos', 28400, 0, 1),
(24, 24, 'Baju / Kaos', 28400, 0, 1),
(25, 25, 'Baju / Kaos', 50600, 0, 1),
(26, 26, 'Baju / Kaos', 48000, 0, 1),
(27, 27, 'Baju / Kaos', 38000, 0, 1),
(28, 28, 'Baju / Kaos', 36500, 0, 1),
(29, 29, 'Baju / Kaos', 35000, 0, 1),
(30, 30, 'Baju / Kaos', 29500, 0, 1),
(31, 31, 'Baju / Kaos', 29500, 0, 1),
(32, 32, 'Baju / Kaos', 18300, 0, 1),
(33, 33, 'Baju / Kaos', 25400, 0, 1),
(34, 34, 'Baju / Kaos', 25400, 0, 1),
(35, 35, 'Baju / Kaos', 9200, 0, 1),
(36, 36, 'Baju / Kaos', 25400, 0, 1),
(37, 37, 'Baju / Kaos', 20300, 0, 1),
(38, 38, 'Baju / Kaos', 30400, 0, 1),
(39, 39, 'Baju / Kaos', 25400, 0, 1),
(40, 40, 'Baju / Kaos', 20300, 0, 1),
(41, 41, 'Baju / Kaos', 25400, 0, 1),
(42, 42, 'Baju / Kaos', 15300, 0, 1),
(43, 43, 'Baju / Kaos', 15300, 0, 1),
(44, 44, 'Baju / Kaos', 60000, 0, 1),
(45, 45, 'Baju / Kaos', 20500, 0, 1),
(46, 46, 'Baju / Kaos', 31500, 0, 1),
(47, 47, 'Baju / Kaos', 15300, 0, 1),
(48, 48, 'Baju / Kaos', 31500, 0, 1),
(49, 49, 'Baju / Kaos', 11300, 0, 1),
(50, 50, 'Baju / Kaos', 11300, 0, 1),
(51, 51, 'Baju / Kaos', 12300, 0, 1),
(52, 52, 'Baju / Kaos', 30400, 0, 1),
(53, 53, 'Baju / Kaos', 21400, 0, 1),
(54, 54, 'Baju / Kaos', 32000, 0, 1),
(55, 55, 'Baju / Kaos', 40500, 0, 1),
(56, 56, 'Baju / Kaos', 48000, 0, 1),
(57, 57, 'Baju / Kaos', 17000, 0, 1),
(58, 58, 'Baju / Kaos', 17300, 0, 1),
(59, 59, 'Baju / Kaos', 11300, 0, 1),
(60, 60, 'Baju / Kaos', 16300, 0, 1),
(61, 61, 'Baju / Kaos', 65800, 0, 1),
(62, 62, 'Baju / Kaos', 17300, 0, 1),
(63, 63, 'Baju / Kaos', 65800, 0, 1),
(64, 64, 'Baju / Kaos', 17300, 0, 1),
(65, 65, 'Baju / Kaos', 65800, 0, 1),
(66, 66, 'Baju / Kaos', 17300, 0, 1),
(67, 67, 'Baju / Kaos', 80900, 0, 1),
(68, 68, 'Baju / Kaos', 47500, 0, 1),
(69, 69, 'Baju / Kaos', 33500, 0, 1),
(70, 70, 'Baju / Kaos', 35500, 0, 1),
(71, 71, 'Baju / Kaos', 35500, 0, 1),
(72, 72, 'Baju / Kaos', 15300, 0, 1),
(73, 73, 'Baju / Kaos', 15300, 0, 1),
(74, 74, 'Baju / Kaos', 35500, 0, 1),
(75, 75, 'Baju / Kaos', 13300, 0, 1),
(76, 76, 'Baju / Kaos', 9200, 0, 1),
(77, 77, 'Baju / Kaos', 18300, 0, 1),
(78, 78, 'Baju / Kaos', 35500, 0, 1),
(79, 79, 'Baju / Kaos', 35500, 0, 1),
(80, 80, 'Baju / Kaos', 18300, 0, 1),
(81, 81, 'Baju / Kaos', 24900, 0, 1),
(82, 82, 'Baju / Kaos', 35500, 0, 1),
(83, 83, 'Baju / Kaos', 20300, 0, 1),
(84, 84, 'Baju / Kaos', 35500, 0, 1),
(85, 85, 'Baju / Kaos', 23400, 0, 1),
(86, 86, 'Baju / Kaos', 20300, 0, 1),
(87, 87, 'Baju / Kaos', 20300, 0, 1),
(88, 88, 'Baju / Kaos', 20300, 0, 1),
(89, 89, 'Baju / Kaos', 25400, 0, 1),
(90, 90, 'Baju / Kaos', 17300, 0, 1),
(91, 91, 'Baju / Kaos', 35500, 0, 1),
(92, 92, 'Baju / Kaos', 35500, 0, 1),
(93, 93, 'Baju / Kaos', 35500, 0, 1),
(94, 94, 'Baju / Kaos', 15300, 0, 1),
(95, 95, 'Baju / Kaos', 20300, 0, 1),
(96, 96, 'Baju / Kaos', 20300, 0, 1),
(97, 97, 'Baju / Kaos', 23500, 0, 1),
(98, 98, 'Baju / Kaos', 35500, 0, 1),
(99, 99, 'Baju / Kaos', 44600, 0, 1),
(100, 100, 'Baju / Kaos', 23500, 0, 1),
(101, 101, 'Baju / Kaos', 29000, 0, 1),
(102, 102, 'Baju / Kaos', 56500, 0, 1),
(103, 103, 'Baju / Kaos', 35500, 0, 1),
(104, 104, 'Baju / Kaos', 17300, 0, 1),
(105, 105, 'Baju / Kaos', 20300, 0, 1),
(106, 106, 'Baju / Kaos', 17300, 0, 1),
(107, 107, 'Baju / Kaos', 17300, 0, 1),
(108, 108, 'Baju / Kaos', 9200, 0, 1),
(109, 109, 'Baju / Kaos', 12300, 0, 1),
(110, 110, 'Baju / Kaos', 16300, 0, 1),
(111, 111, 'Baju / Kaos', 16300, 0, 1),
(112, 112, 'Baju / Kaos', 12300, 0, 1),
(113, 113, 'Baju / Kaos', 12300, 0, 1),
(114, 114, 'Baju / Kaos', 28000, 0, 1),
(115, 115, 'Baju / Kaos', 30400, 0, 1),
(116, 116, 'Baju / Kaos', 30400, 0, 1),
(117, 117, 'Baju / Kaos', 30400, 0, 1),
(118, 118, 'Baju / Kaos', 16300, 0, 1),
(119, 119, 'Baju / Kaos', 16300, 0, 1),
(120, 120, 'Baju / Kaos', 45600, 0, 1),
(121, 121, 'Baju / Kaos', 28500, 0, 1),
(122, 122, 'Baju / Kaos', 51000, 0, 1),
(123, 123, 'Baju / Kaos', 10200, 0, 1),
(124, 124, 'Baju / Kaos', 10200, 0, 1),
(125, 125, 'Baju / Kaos', 15300, 0, 1),
(126, 126, 'Baju / Kaos', 12300, 0, 1),
(127, 127, 'Baju / Kaos', 17300, 0, 1),
(128, 128, 'Baju / Kaos', 17300, 0, 1),
(129, 129, 'Baju / Kaos', 15300, 0, 1),
(130, 130, 'Baju / Kaos', 17300, 0, 1),
(131, 131, 'Baju / Kaos', 5200, 0, 1),
(132, 132, 'Baju / Kaos', 33500, 0, 1),
(133, 133, 'Baju / Kaos', 10200, 0, 1),
(134, 134, 'Baju / Kaos', 15300, 0, 1),
(135, 135, 'Baju / Kaos', 17300, 0, 1),
(136, 136, 'Baju / Kaos', 13300, 0, 1),
(137, 137, 'Baju / Kaos', 15300, 0, 1),
(138, 138, 'Baju / Kaos', 25400, 0, 1),
(139, 139, 'Baju / Kaos', 32500, 0, 1),
(140, 140, 'Baju / Kaos', 40000, 0, 1),
(141, 141, 'Baju / Kaos', 23500, 0, 1),
(142, 142, 'Baju / Kaos', 24500, 0, 1),
(143, 143, 'Baju / Kaos', 26500, 0, 1),
(144, 144, 'Baju / Kaos', 17300, 0, 1),
(145, 145, 'Baju / Kaos', 17000, 0, 1),
(146, 146, 'Baju / Kaos', 23500, 0, 1),
(147, 147, 'Baju / Kaos', 15300, 0, 1),
(148, 148, 'Baju / Kaos', 9200, 0, 1),
(149, 149, 'Baju / Kaos', 18000, 0, 1),
(150, 150, 'Baju / Kaos', 5200, 0, 1),
(151, 151, 'Baju / Kaos', 19000, 0, 1),
(152, 152, 'Baju / Kaos', 15300, 0, 1),
(153, 153, 'Baju / Kaos', 5200, 0, 1),
(154, 154, 'Baju / Kaos', 5200, 0, 1),
(155, 155, 'Baju / Kaos', 15300, 0, 1),
(156, 156, 'Baju / Kaos', 23400, 0, 1),
(157, 157, 'Baju / Kaos', 30500, 0, 1),
(158, 158, 'Baju / Kaos', 17300, 0, 1),
(159, 159, 'Baju / Kaos', 17300, 0, 1),
(160, 160, 'Baju / Kaos', 17300, 0, 1),
(161, 161, 'Baju / Kaos', 17300, 0, 1),
(162, 162, 'Baju / Kaos', 9200, 0, 1),
(163, 163, 'Baju / Kaos', 11300, 0, 1),
(164, 164, 'Baju / Kaos', 17300, 0, 1),
(165, 165, 'Baju / Kaos', 17300, 0, 1),
(166, 166, 'Baju / Kaos', 23500, 0, 1),
(167, 167, 'Baju / Kaos', 23400, 0, 1),
(168, 168, 'Baju / Kaos', 26500, 0, 1),
(169, 169, 'Baju / Kaos', 19000, 0, 1),
(170, 170, 'Baju / Kaos', 20300, 0, 1),
(171, 171, 'Baju / Kaos', 32500, 0, 1),
(172, 172, 'Baju / Kaos', 20300, 0, 1),
(173, 173, 'Baju / Kaos', 20300, 0, 1),
(174, 174, 'Baju / Kaos', 20300, 0, 1),
(175, 175, 'Baju / Kaos', 20300, 0, 1),
(176, 176, 'Baju / Kaos', 20300, 0, 1),
(177, 177, 'Baju / Kaos', 16400, 0, 1),
(178, 178, 'Baju / Kaos', 14500, 0, 1),
(179, 179, 'Baju / Kaos', 11300, 0, 1),
(180, 180, 'Baju / Kaos', 13300, 0, 1),
(181, 181, 'Baju / Kaos', 25400, 0, 1),
(182, 182, 'Baju / Kaos', 12300, 0, 1),
(183, 183, 'Baju / Kaos', 12300, 0, 1),
(184, 184, 'Baju / Kaos', 12300, 0, 1),
(185, 185, 'Baju / Kaos', 12300, 0, 1),
(186, 186, 'Baju / Kaos', 12300, 0, 1),
(187, 187, 'Baju / Kaos', 12300, 0, 1),
(188, 188, 'Baju / Kaos', 33500, 0, 1),
(189, 189, 'Baju / Kaos', 15300, 0, 1),
(190, 190, 'Baju / Kaos', 15300, 0, 1),
(191, 191, 'Baju / Kaos', 30000, 0, 1),
(192, 192, 'Baju / Kaos', 32000, 0, 1),
(193, 193, 'Baju / Kaos', 25400, 0, 1),
(194, 194, 'Baju / Kaos', 25400, 0, 1),
(195, 195, 'Baju / Kaos', 15300, 0, 1),
(196, 196, 'Baju / Kaos', 32500, 0, 1),
(197, 197, 'Baju / Kaos', 9500, 0, 1),
(198, 198, 'Baju / Kaos', 17000, 0, 1),
(199, 199, 'Baju / Kaos', 9500, 0, 1),
(200, 200, 'Baju / Kaos', 8000, 0, 1),
(201, 201, 'Baju / Kaos', 17500, 0, 1),
(202, 202, 'Baju / Kaos', 10000, 0, 1),
(203, 203, 'Baju / Kaos', 11500, 0, 1),
(204, 204, 'Baju / Kaos', 7500, 0, 1),
(205, 205, 'Baju / Kaos', 2200, 0, 1),
(206, 206, 'Baju / Kaos', 10000, 0, 1),
(207, 207, 'Baju / Kaos', 10000, 0, 1),
(208, 208, 'Baju / Kaos', 10000, 0, 1),
(209, 209, 'Baju / Kaos', 7500, 0, 1),
(210, 210, 'Baju / Kaos', 15000, 0, 1),
(211, 211, 'Baju / Kaos', 5000, 0, 1),
(212, 212, 'Baju / Kaos', 5000, 0, 1),
(213, 213, 'Baju / Kaos', 7000, 0, 1),
(214, 214, 'Baju / Kaos', 2200, 0, 1),
(215, 215, 'Baju / Kaos', 10000, 0, 1),
(216, 216, 'Baju / Kaos', 11000, 0, 1),
(217, 217, 'Baju / Kaos', 9000, 0, 1),
(218, 218, 'Baju / Kaos', 15000, 0, 1),
(219, 219, 'Baju / Kaos', 6000, 0, 1),
(220, 220, 'Baju / Kaos', 4200, 0, 1),
(221, 221, 'Baju / Kaos', 4200, 0, 1),
(222, 222, 'Baju / Kaos', 4200, 0, 1),
(223, 223, 'Baju / Kaos', 4200, 0, 1),
(224, 224, 'Baju / Kaos', 4200, 0, 1),
(225, 225, 'Baju / Kaos', 4200, 0, 1),
(226, 226, 'Baju / Kaos', 4200, 0, 1),
(227, 227, 'Baju / Kaos', 15000, 0, 1),
(228, 228, 'Baju / Kaos', 33000, 0, 1),
(229, 229, 'Baju / Kaos', 13500, 0, 1),
(230, 230, 'Baju / Kaos', 15000, 0, 1),
(231, 231, 'Baju / Kaos', 15000, 0, 1),
(232, 232, 'Baju / Kaos', 10000, 0, 1),
(233, 233, 'Baju / Kaos', 10000, 0, 1),
(234, 234, 'Baju / Kaos', 0, 0, 1),
(235, 235, 'Baju / Kaos', 15000, 0, 1),
(236, 236, 'Baju / Kaos', 15000, 0, 1),
(237, 237, 'Baju / Kaos', 10000, 0, 1),
(238, 238, 'Baju / Kaos', 2200, 0, 1),
(239, 239, 'Baju / Kaos', 10000, 0, 1),
(240, 240, 'Baju / Kaos', 14000, 0, 1),
(241, 241, 'Baju / Kaos', 10000, 0, 1),
(242, 242, 'Baju / Kaos', 15000, 0, 1),
(243, 243, 'Baju / Kaos', 15000, 0, 1),
(244, 244, 'Baju / Kaos', 7200, 0, 1),
(245, 245, 'Baju / Kaos', 13000, 0, 1),
(246, 246, 'Baju / Kaos', 7200, 0, 1),
(247, 247, 'Baju / Kaos', 22500, 0, 1),
(248, 248, 'Baju / Kaos', 8200, 0, 1),
(249, 249, 'Baju / Kaos', 8200, 0, 1),
(250, 250, 'Baju / Kaos', 8200, 0, 1),
(251, 251, 'Baju / Kaos', 8200, 0, 1),
(252, 252, 'Baju / Kaos', 8200, 0, 1),
(253, 253, 'Baju / Kaos', 8200, 0, 1),
(254, 254, 'Baju / Kaos', 8200, 0, 1),
(255, 255, 'Baju / Kaos', 17000, 0, 1),
(256, 256, 'Baju / Kaos', 23500, 0, 1),
(257, 257, 'Baju / Kaos', 20000, 0, 1),
(258, 258, 'Baju / Kaos', 18500, 0, 1),
(259, 259, 'Baju / Kaos', 20000, 0, 1),
(260, 260, 'Baju / Kaos', 26000, 0, 1),
(261, 261, 'Baju / Kaos', 24000, 0, 1),
(262, 262, 'Baju / Kaos', 28000, 0, 1),
(263, 263, 'Baju / Kaos', 23500, 0, 1),
(264, 264, 'Baju / Kaos', 20000, 0, 1),
(265, 265, 'Baju / Kaos', 8200, 0, 1),
(266, 266, 'Baju / Kaos', 8200, 0, 1),
(267, 267, 'Baju / Kaos', 8200, 0, 1),
(268, 268, 'Baju / Kaos', 17000, 0, 1),
(269, 269, 'Baju / Kaos', 6200, 0, 1),
(270, 270, 'Baju / Kaos', 9200, 0, 1),
(271, 271, 'Baju / Kaos', 10200, 0, 1),
(272, 272, 'Baju / Kaos', 9200, 0, 1),
(273, 273, 'Baju / Kaos', 8200, 0, 1),
(274, 274, 'Baju / Kaos', 10200, 0, 1),
(275, 275, 'Baju / Kaos', 12200, 0, 1),
(276, 276, 'Baju / Kaos', 7200, 0, 1),
(277, 277, 'Baju / Kaos', 2200, 0, 1),
(278, 278, 'Baju / Kaos', 12300, 0, 1),
(279, 279, 'Baju / Kaos', 12300, 0, 1),
(280, 280, 'Baju / Kaos', 4200, 0, 1),
(281, 281, 'Baju / Kaos', 12300, 0, 1),
(282, 282, 'Baju / Kaos', 7200, 0, 1),
(283, 283, 'Baju / Kaos', 12300, 0, 1),
(284, 284, 'Baju / Kaos', 12300, 0, 1),
(285, 285, 'Baju / Kaos', 12300, 0, 1),
(286, 286, 'Baju / Kaos', 12300, 0, 1),
(287, 287, 'Baju / Kaos', 17300, 0, 1),
(288, 288, 'Baju / Kaos', 14500, 0, 1),
(289, 289, 'Baju / Kaos', 19000, 0, 1),
(290, 290, 'Baju / Kaos', 10200, 0, 1),
(291, 291, 'Baju / Kaos', 7200, 0, 1),
(292, 292, 'Baju / Kaos', 7200, 0, 1),
(293, 293, 'Baju / Kaos', 7200, 0, 1),
(294, 294, 'Baju / Kaos', 7200, 0, 1),
(295, 295, 'Baju / Kaos', 14300, 0, 1),
(296, 296, 'Baju / Kaos', 35000, 0, 1),
(297, 297, 'Baju / Kaos', 18000, 0, 1),
(298, 298, 'Baju / Kaos', 8200, 0, 1),
(299, 299, 'Baju / Kaos', 8200, 0, 1),
(300, 300, 'Baju / Kaos', 8200, 0, 1),
(301, 301, 'Baju / Kaos', 23400, 0, 1),
(302, 302, 'Baju / Kaos', 23400, 0, 1),
(303, 303, 'Baju / Kaos', 4200, 0, 1),
(304, 304, 'Baju / Kaos', 23400, 0, 1),
(305, 305, 'Baju / Kaos', 4200, 0, 1),
(306, 306, 'Baju / Kaos', 14300, 0, 1),
(307, 307, 'Baju / Kaos', 7200, 0, 1),
(308, 308, 'Baju / Kaos', 12300, 0, 1),
(309, 309, 'Baju / Kaos', 9200, 0, 1),
(310, 310, 'Baju / Kaos', 10200, 0, 1),
(311, 311, 'Baju / Kaos', 22000, 0, 1),
(312, 312, 'Baju / Kaos', 30000, 0, 1),
(313, 313, 'Baju / Kaos', 26500, 0, 1),
(314, 314, 'Baju / Kaos', 7200, 0, 1),
(315, 315, 'Baju / Kaos', 14300, 0, 1),
(316, 316, 'Baju / Kaos', 14300, 0, 1),
(317, 317, 'Baju / Kaos', 14300, 0, 1),
(318, 318, 'Baju / Kaos', 14300, 0, 1),
(319, 319, 'Baju / Kaos', 7200, 0, 1),
(320, 320, 'Baju / Kaos', 22000, 0, 1),
(321, 321, 'Baju / Kaos', 24500, 0, 1),
(322, 322, 'Baju / Kaos', 14300, 0, 1),
(323, 323, 'Baju / Kaos', 8200, 0, 1),
(324, 324, 'Baju / Kaos', 8200, 0, 1),
(325, 325, 'Baju / Kaos', 6200, 0, 1),
(326, 326, 'Baju / Kaos', 6200, 0, 1),
(327, 327, 'Baju / Kaos', 16500, 0, 1),
(328, 328, 'Baju / Kaos', 9200, 0, 1),
(329, 329, 'Baju / Kaos', 9200, 0, 1),
(330, 330, 'Baju / Kaos', 15300, 0, 1),
(331, 331, 'Baju / Kaos', 9200, 0, 1),
(332, 332, 'Baju / Kaos', 30400, 0, 1),
(333, 333, 'Baju / Kaos', 36000, 0, 1),
(334, 334, 'Baju / Kaos', 28400, 0, 1),
(335, 335, 'Baju / Kaos', 20300, 0, 1),
(336, 336, 'Baju / Kaos', 25400, 0, 1),
(337, 337, 'Baju / Kaos', 20300, 0, 1),
(338, 338, 'Baju / Kaos', 10200, 0, 1),
(339, 339, 'Baju / Kaos', 32500, 0, 1),
(340, 340, 'Baju / Kaos', 32500, 0, 1),
(341, 341, 'Baju / Kaos', 23400, 0, 1),
(342, 342, 'Baju / Kaos', 23400, 0, 1),
(343, 343, 'Baju / Kaos', 15300, 0, 1),
(344, 344, 'Baju / Kaos', 23400, 0, 1),
(345, 345, 'Baju / Kaos', 23400, 0, 1),
(346, 346, 'Baju / Kaos', 23400, 0, 1),
(347, 347, 'Baju / Kaos', 23400, 0, 1),
(348, 348, 'Baju / Kaos', 41600, 0, 1),
(349, 349, 'Baju / Kaos', 36000, 0, 1),
(350, 350, 'Baju / Kaos', 48500, 0, 1),
(351, 351, 'Baju / Kaos', 30000, 0, 1),
(352, 352, 'Baju / Kaos', 26500, 0, 1),
(353, 353, 'Baju / Kaos', 36000, 0, 1),
(354, 354, 'Baju / Kaos', 37000, 0, 1),
(355, 355, 'Baju / Kaos', 43000, 0, 1),
(356, 356, 'Baju / Kaos', 22400, 0, 1),
(357, 357, 'Baju / Kaos', 22400, 0, 1),
(358, 358, 'Baju / Kaos', 22400, 0, 1),
(359, 359, 'Baju / Kaos', 22400, 0, 1),
(360, 360, 'Baju / Kaos', 22400, 0, 1),
(361, 361, 'Baju / Kaos', 35500, 0, 1),
(362, 362, 'Baju / Kaos', 22400, 0, 1),
(363, 363, 'Baju / Kaos', 22400, 0, 1),
(364, 364, 'Baju / Kaos', 35500, 0, 1),
(365, 365, 'Baju / Kaos', 22400, 0, 1),
(366, 366, 'Baju / Kaos', 30000, 0, 1),
(367, 367, 'Baju / Kaos', 44600, 0, 1),
(368, 368, 'Baju / Kaos', 20300, 0, 1),
(369, 369, 'Baju / Kaos', 20300, 0, 1),
(370, 370, 'Baju / Kaos', 40500, 0, 1),
(371, 371, 'Baju / Kaos', 40500, 0, 1),
(372, 372, 'Baju / Kaos', 40500, 0, 1),
(373, 373, 'Baju / Kaos', 10200, 0, 1),
(374, 374, 'Baju / Kaos', 20300, 0, 1),
(375, 375, 'Baju / Kaos', 40500, 0, 1),
(376, 376, 'Baju / Kaos', 22400, 0, 1),
(377, 377, 'Baju / Kaos', 40500, 0, 1),
(378, 378, 'Baju / Kaos', 43000, 0, 1),
(379, 379, 'Baju / Kaos', 50600, 0, 1),
(380, 380, 'Baju / Kaos', 31000, 0, 1),
(381, 381, 'Baju / Kaos', 37500, 0, 1),
(382, 382, 'Baju / Kaos', 30400, 0, 1),
(383, 383, 'Baju / Kaos', 25400, 0, 1),
(384, 384, 'Baju / Kaos', 37500, 0, 1),
(385, 385, 'Baju / Kaos', 37500, 0, 1),
(386, 386, 'Baju / Kaos', 45000, 0, 1),
(387, 387, 'Baju / Kaos', 37500, 0, 1),
(388, 388, 'Baju / Kaos', 37500, 0, 1),
(389, 389, 'Baju / Kaos', 37500, 0, 1),
(390, 390, 'Baju / Kaos', 37500, 0, 1),
(391, 391, 'Baju / Kaos', 15300, 0, 1),
(392, 392, 'Baju / Kaos', 37500, 0, 1),
(393, 393, 'Baju / Kaos', 20300, 0, 1),
(394, 394, 'Baju / Kaos', 40500, 0, 1),
(395, 395, 'Baju / Kaos', 25400, 0, 1),
(396, 396, 'Baju / Kaos', 25400, 0, 1),
(397, 397, 'Baju / Kaos', 20300, 0, 1),
(398, 398, 'Baju / Kaos', 25400, 0, 1),
(399, 399, 'Baju / Kaos', 35500, 0, 1),
(400, 400, 'Baju / Kaos', 35500, 0, 1),
(401, 401, 'Baju / Kaos', 35500, 0, 1),
(402, 402, 'Baju / Kaos', 47600, 0, 1),
(403, 403, 'Baju / Kaos', 45600, 0, 1),
(404, 404, 'Baju / Kaos', 35500, 0, 1),
(405, 405, 'Baju / Kaos', 52000, 0, 1),
(406, 406, 'Baju / Kaos', 30400, 0, 1),
(407, 407, 'Baju / Kaos', 35500, 0, 1),
(408, 408, 'Baju / Kaos', 17300, 0, 1),
(409, 409, 'Baju / Kaos', 35500, 0, 1),
(410, 410, 'Baju / Kaos', 30400, 0, 1),
(411, 411, 'Baju / Kaos', 35500, 0, 1),
(412, 412, 'Baju / Kaos', 30400, 0, 1),
(413, 413, 'Baju / Kaos', 56700, 0, 1),
(414, 414, 'Baju / Kaos', 45000, 0, 1),
(415, 415, 'Baju / Kaos', 43000, 0, 1),
(416, 416, 'Baju / Kaos', 25400, 0, 1),
(417, 417, 'Baju / Kaos', 43500, 0, 1),
(418, 418, 'Baju / Kaos', 25400, 0, 1),
(419, 419, 'Baju / Kaos', 25400, 0, 1),
(420, 420, 'Baju / Kaos', 25400, 0, 1),
(421, 421, 'Baju / Kaos', 25400, 0, 1),
(422, 422, 'Baju / Kaos', 10200, 0, 1),
(423, 423, 'Baju / Kaos', 25400, 0, 1),
(424, 424, 'Baju / Kaos', 25400, 0, 1),
(425, 425, 'Baju / Kaos', 25400, 0, 1),
(426, 426, 'Baju / Kaos', 25400, 0, 1),
(427, 427, 'Baju / Kaos', 25400, 0, 1),
(428, 428, 'Baju / Kaos', 58000, 0, 1),
(429, 429, 'Baju / Kaos', 25400, 0, 1),
(430, 430, 'Baju / Kaos', 25400, 0, 1),
(431, 431, 'Baju / Kaos', 25400, 0, 1),
(432, 432, 'Baju / Kaos', 25400, 0, 1),
(433, 433, 'Baju / Kaos', 25400, 0, 1),
(434, 434, 'Baju / Kaos', 25400, 0, 1),
(435, 435, 'Baju / Kaos', 25400, 0, 1),
(436, 436, 'Baju / Kaos', 53000, 0, 1),
(437, 437, 'Baju / Kaos', 32500, 0, 1),
(438, 438, 'Baju / Kaos', 40500, 0, 1),
(439, 439, 'Baju / Kaos', 40500, 0, 1),
(440, 440, 'Baju / Kaos', 35450, 0, 1),
(441, 441, 'Baju / Kaos', 40500, 0, 1),
(442, 442, 'Baju / Kaos', 40500, 0, 1),
(443, 443, 'Baju / Kaos', 50600, 0, 1),
(444, 444, 'Baju / Kaos', 60500, 0, 1),
(445, 445, 'Baju / Kaos', 53000, 0, 1),
(446, 446, 'Baju / Kaos', 40500, 0, 1),
(447, 447, 'Baju / Kaos', 17300, 0, 1),
(448, 448, 'Baju / Kaos', 40500, 0, 1),
(449, 449, 'Baju / Kaos', 40500, 0, 1),
(450, 450, 'Baju / Kaos', 40500, 0, 1),
(451, 451, 'Baju / Kaos', 40500, 0, 1),
(452, 452, 'Baju / Kaos', 40500, 0, 1),
(453, 453, 'Baju / Kaos', 40500, 0, 1),
(454, 454, 'Baju / Kaos', 30400, 0, 1),
(455, 455, 'Baju / Kaos', 45000, 0, 1),
(456, 456, 'Baju / Kaos', 86500, 0, 1),
(457, 457, 'Baju / Kaos', 65800, 0, 1),
(458, 458, 'Baju / Kaos', 65800, 0, 1),
(459, 459, 'Baju / Kaos', 65800, 0, 1),
(460, 460, 'Baju / Kaos', 65800, 0, 1),
(461, 461, 'Baju / Kaos', 65800, 0, 1),
(462, 462, 'Baju / Kaos', 65800, 0, 1),
(463, 463, 'Baju / Kaos', 65800, 0, 1),
(464, 464, 'Baju / Kaos', 65800, 0, 1),
(465, 465, 'Baju / Kaos', 65800, 0, 1),
(466, 466, 'Baju / Kaos', 65800, 0, 1),
(467, 467, 'Baju / Kaos', 22400, 0, 1),
(468, 468, 'Baju / Kaos', 65800, 0, 1),
(469, 469, 'Baju / Kaos', 65800, 0, 1),
(470, 470, 'Baju / Kaos', 50600, 0, 1),
(471, 471, 'Baju / Kaos', 40500, 0, 1),
(472, 472, 'Baju / Kaos', 40500, 0, 1),
(473, 473, 'Baju / Kaos', 39500, 0, 1),
(474, 474, 'Baju / Kaos', 40500, 0, 1),
(475, 475, 'Baju / Kaos', 40500, 0, 1),
(476, 476, 'Baju / Kaos', 40500, 0, 1),
(477, 477, 'Baju / Kaos', 50600, 0, 1),
(478, 478, 'Baju / Kaos', 47500, 0, 1),
(479, 479, 'Baju / Kaos', 46500, 0, 1),
(480, 480, 'Baju / Kaos', 40500, 0, 1),
(481, 481, 'Baju / Kaos', 17300, 0, 1),
(482, 482, 'Baju / Kaos', 61000, 0, 1),
(483, 483, 'Baju / Kaos', 40500, 0, 1),
(484, 484, 'Baju / Kaos', 40500, 0, 1),
(485, 485, 'Baju / Kaos', 40500, 0, 1),
(486, 486, 'Baju / Kaos', 40500, 0, 1),
(487, 487, 'Baju / Kaos', 58000, 0, 1),
(488, 488, 'Baju / Kaos', 50600, 0, 1),
(489, 489, 'Baju / Kaos', 37000, 0, 1),
(490, 490, 'Baju / Kaos', 30000, 0, 1),
(491, 491, 'Baju / Kaos', 18300, 0, 1),
(492, 492, 'Baju / Kaos', 36500, 0, 1),
(493, 493, 'Baju / Kaos', 18300, 0, 1),
(494, 494, 'Baju / Kaos', 9200, 0, 1),
(495, 495, 'Baju / Kaos', 18300, 0, 1),
(496, 496, 'Baju / Kaos', 18300, 0, 1),
(497, 497, 'Baju / Kaos', 18300, 0, 1),
(498, 498, 'Baju / Kaos', 18300, 0, 1),
(499, 499, 'Baju / Kaos', 24400, 0, 1),
(500, 500, 'Baju / Kaos', 40500, 0, 1),
(501, 501, 'Baju / Kaos', 55500, 0, 1),
(502, 502, 'Baju / Kaos', 40500, 0, 1),
(503, 503, 'Baju / Kaos', 58000, 0, 1),
(504, 504, 'Baju / Kaos', 58000, 0, 1),
(505, 505, 'Baju / Kaos', 40500, 0, 1),
(506, 506, 'Baju / Kaos', 17300, 0, 1),
(507, 507, 'Baju / Kaos', 40500, 0, 1),
(508, 508, 'Baju / Kaos', 40500, 0, 1),
(509, 509, 'Baju / Kaos', 40500, 0, 1),
(510, 510, 'Baju / Kaos', 40500, 0, 1),
(511, 511, 'Baju / Kaos', 40500, 0, 1),
(512, 512, 'Baju / Kaos', 40500, 0, 1),
(513, 513, 'Baju / Kaos', 40500, 0, 1),
(514, 514, 'Baju / Kaos', 75000, 0, 1),
(515, 515, 'Baju / Kaos', 40500, 0, 1),
(516, 516, 'Baju / Kaos', 40500, 0, 1),
(517, 517, 'Baju / Kaos', 65800, 0, 1),
(518, 518, 'Baju / Kaos', 40500, 0, 1),
(519, 519, 'Baju / Kaos', 80900, 0, 1),
(520, 520, 'Baju / Kaos', 92500, 0, 1),
(521, 521, 'Baju / Kaos', 92500, 0, 1),
(522, 522, 'Baju / Kaos', 104000, 0, 1),
(523, 523, 'Baju / Kaos', 86000, 0, 1),
(524, 524, 'Baju / Kaos', 86000, 0, 1),
(525, 525, 'Baju / Kaos', 65800, 0, 1),
(526, 526, 'Baju / Kaos', 86000, 0, 1),
(527, 527, 'Baju / Kaos', 72900, 0, 1),
(528, 528, 'Baju / Kaos', 86000, 0, 1),
(529, 529, 'Baju / Kaos', 86000, 0, 1),
(530, 530, 'Baju / Kaos', 86000, 0, 1),
(531, 531, 'Baju / Kaos', 86000, 0, 1),
(532, 532, 'Baju / Kaos', 86000, 0, 1),
(533, 533, 'Baju / Kaos', 65800, 0, 1),
(534, 534, 'Baju / Kaos', 86000, 0, 1),
(535, 535, 'Baju / Kaos', 86000, 0, 1),
(536, 536, 'Baju / Kaos', 86000, 0, 1),
(537, 537, 'Baju / Kaos', 86000, 0, 1),
(538, 538, 'Baju / Kaos', 86000, 0, 1),
(539, 539, 'Baju / Kaos', 138500, 0, 1),
(540, 540, 'Baju / Kaos', 111200, 0, 1),
(541, 541, 'Baju / Kaos', 138500, 0, 1),
(542, 542, 'Baju / Kaos', 86000, 0, 1),
(543, 543, 'Baju / Kaos', 86000, 0, 1),
(544, 544, 'Baju / Kaos', 86000, 0, 1),
(545, 545, 'Baju / Kaos', 70800, 0, 1),
(546, 546, 'Baju / Kaos', 104000, 0, 1),
(548, 548, 'Baju / Kaos', 86000, 0, 1),
(549, 549, 'Baju / Kaos', 111200, 0, 1),
(550, 550, 'Baju / Kaos', 65800, 0, 1),
(551, 551, 'Baju / Kaos', 86000, 0, 1),
(552, 552, 'Baju / Kaos', 111200, 0, 1),
(553, 553, 'Baju / Kaos', 6000, 12000, 1),
(554, 554, 'Baju / Kaos', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_countries`
--

CREATE TABLE IF NOT EXISTS `delivery_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delivery_countries`
--

INSERT INTO `delivery_countries` (`id`, `code`, `name`) VALUES
(1, 'ID', 'Indonesia'),
(2, 'US', 'U.S.A');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_state`
--

CREATE TABLE IF NOT EXISTS `delivery_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `delivery_state`
--

INSERT INTO `delivery_state` (`id`, `name`, `country_id`) VALUES
(1, 'PROVINSI D.I ACEH', 1),
(2, 'PROVINSI RIAU', 1),
(3, 'KEPULAUAN RIAU', 1),
(4, 'PROVINSI JAMBI', 1),
(5, 'PROVINSI SUMATERA UTARA', 1),
(6, 'PROVINSI SUMATERA BARAT', 1),
(7, 'PROVINSI SUMATERA SELATAN', 1),
(8, 'PROVINSI BALI', 1),
(9, 'PROVINSI BANGKA BELITUNG', 1),
(10, 'PROVINSI BENGKULU', 1),
(11, 'PROVINSI LAMPUNG', 1),
(12, 'DKI JAKARTA', 1),
(13, 'PROVINSI BANTEN', 1),
(14, 'PROVINSI JAWA BARAT', 1),
(15, 'PROVINSI JAWA TENGAH', 1),
(16, 'PROVINSI D.I YOGYAKARTA', 1),
(17, 'PROVINSI JAWA TIMUR', 1),
(18, 'PROVINSI KALIMANTAN BARAT', 1),
(19, 'PROVINSI KALIMANTAN SELATAN', 1),
(20, 'PROVINSI KALIMANTAN TENGAH', 1),
(21, 'PROVINSI KALIMANTAN TIMUR', 1),
(22, 'PROVINSI SULAWESI TENGAH', 1),
(23, 'PROVINSI SULAWESI SELATAN', 1),
(24, 'PROVINSI SULAWESI BARAT', 1),
(25, 'PROVINSI SULAWESI TENGGARA', 1),
(26, 'PROVINSI GORONTALO', 1),
(27, 'PROVINSI SULAWESI UTARA', 1),
(28, 'PROVINSI NTB', 1),
(29, 'PROVINSI NTT', 1),
(30, 'PROVINSI PAPUA', 1),
(31, 'PROVINSI PAPUA BARAT', 1),
(32, 'AMBIL DI TEMPAT', 1),
(33, 'Arizona', 2),
(34, 'Arkansas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` varchar(50) NOT NULL,
  `province_name` varchar(50) NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `country_id`, `province_name`) VALUES
(1, 'Indonesia', 'Aceh'),
(2, 'Indonesia', 'Bali'),
(3, 'Indonesia', 'Banten'),
(4, 'Indonesia', 'Bengkulu'),
(5, 'Indonesia', 'Gorontalo'),
(6, 'Indonesia', 'Jakarta'),
(7, 'Indonesia', 'Jambi'),
(8, 'Indonesia', 'Jawa Barat'),
(9, 'Indonesia', 'Jawa Tengah'),
(10, 'Indonesia', 'Jawa Timur'),
(11, 'Indonesia', 'Kalimantan Barat'),
(12, 'Indonesia', 'Kalimantan Selatan'),
(13, 'Indonesia', 'Kalimantan Tengah'),
(14, 'Indonesia', 'Kalimantan Timur'),
(15, 'Indonesia', 'Kalimantan Utara'),
(16, 'Indonesia', 'Kepulauan Bangka Belitung'),
(17, 'Indonesia', 'Kepulauan Riau'),
(18, 'Indonesia', 'Lampung'),
(19, 'Indonesia', 'Maluku'),
(20, 'Indonesia', 'Maluku Utara'),
(21, 'Indonesia', 'Nusa Tenggara Barat'),
(22, 'Indonesia', 'Nusa Tenggara Timur'),
(23, 'Indonesia', 'Papua'),
(24, 'Indonesia', 'Papua Barat'),
(25, 'Indonesia', 'Riau'),
(26, 'Indonesia', 'Sulawesi Barat'),
(27, 'Indonesia', 'Sulawesi Selatan'),
(28, 'Indonesia', 'Sulawesi Tengah'),
(29, 'Indonesia', 'Sulawesi Tenggara'),
(30, 'Indonesia', 'Sulawesi Utara'),
(31, 'Indonesia', 'Sumatera Barat'),
(32, 'Indonesia', 'Sumatera Selatan'),
(33, 'Indonesia', 'Sumatera Utara'),
(34, 'Indonesia', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE IF NOT EXISTS `tbl_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fill` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `fill`, `description`, `keywords`, `type`) VALUES
(1, 'Semua produk kami di budidayakan secara&nbsp;<strong>Organik</strong>&nbsp;dan <strong>Bionic Farm</strong> telah menerima serifikat organik dari&nbsp;<strong>InOfice (Indonesian Organic Farming Certification)</strong>&nbsp;dan sertifikat halal dari&nbsp;<strong>MUI (Majelis Ulama Indonesia)</strong>.<br />\r\nUntuk menjamin kualitas dan kesegarannya, kami melakukan pengawasan ketat dari tahap awal penanaman, pemanenan, pengemasan hingga pengiriman.<br />\r\nProduk yang baru dipanen ditempatkan pada kotak penyimpanan, kemudian dimasukkan ke dalam lemari pendingin. Produk yang sudah dikemas lalu ditempatkan ke dalam&nbsp;cool box&nbsp;dan didistribusikan ke pasar dalam waktu 24-48 jam setelah panen.<br />\r\n&nbsp;<br />\r\n<strong>MENGAPA ORGANIK?</strong><br />\r\nBahan makanan organik dibudidayakan secara alami dan ramah lingkungan,&nbsp;tanpa menggunakan pestisida dan pupuk dari bahan kimia&nbsp;buatan, sehingga kualitas nutrisi alaminya terjaga. Sebagai produsen bahan makanan organik, kami ingin menjaga keseimbangan ekosistem dan menjaga kesuburan tanah sehingga dapat dimanfaatkan untuk memproduksi makanan organik secara berkesinambungan.<br />\r\nBahan makanan organik mempunyai cita rasa yang lebih lezat dan hasil penelitian membuktikan bahwa bahan makan organik mengandung kadar vitamin C, mineral, enzim dan nutrisi yang lebih tinggi dibandingkan dengan bahan makanan non-organik.<br />\r\nPenggunaan pestisida dan pupuk dari bahan kimia sintetis disatu sisi dapat membantu meningkatkan produktivitas dan menekan biaya produksi untuk sementara waktu, namun disisi lain sesungguhnya efek dari penggunaan bahan-bahan kimia beracun tersebut dapat menimbulkan masalah dikemudian hari. Kesulitan mendapatkan air bersih, turunnya tingkat kesuburan tanah dan polusi udara adalah contoh akibat jangka panjangnya. Sementara itu upaya untuk mengembalikan keadaan lingkungan pada kondisi semula membutuhkan waktu dan biaya yang tidak sedikit, belum lagi masalah sosial akibat komplain dari masyarakat sekitar.<br />\r\nMetode pertanian konvensional di negara-negara berkembang saat ini sangat beresiko terhadap kesehatan petani karena menggunakan pupuk dan pestisida sintetis yang berbahaya. Bahaya yang dapat ditimbulkan antara lain: kanker, gangguan saluran pernafasan dan keracunan bahan kimia sintetis lainnya.<br />\r\nPertanian organik berkontribusi dalam melestarikan keanekaragaman hayati dan kehidupan liar, dengan cara menggunakan pestisida dan pupuk alami yang aman dan ramah lingkungan.', '', '', 'description'),
(2, '<h2 class="quote animated fadeInUp">Tentang Kami</h2>\n\n<div class="row">\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">\n<div class="box box-pattern">\n<p><strong>Bionic Farm </strong>didirikan pada tahun 1990 dan berkomitmen untuk melestarikan alam dengan pertanian organik. Pada awalnya, Bionic Farm khusus membudidayakan jamur. Namun menyadari tumbuhnya kesadaran dan kepedulian masyarakat akan makanan yang dikonsumsi, Bionic Farm mengembangkan variasi produk pertanian organiknya. Bionic Farm memiliki 2 lokasi pertanian yang utama, berada di Cibodas-Puncak dan Ciherang-Bogor, Jawa Barat. Di Cibodas kami membudidayakan berbagai jenis jamur dataran tinggi, kopi, sayuran, dan tanaman herbal. Di Ciherang kami membudidayakan beras organik, rosella, serta berbagai jenis sayuran dan buah-buahan.</p>\n</div>\n<!--.box--></div>\n<!--.col-md--></div>\n<!--.row--><!--.row-->\n\n<h2 class="quote animated fadeInUp">Visi</h2>\n\n<div class="row">\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">\n<div class="box box-pattern">\n<p>Visi Bionic Farm adalah membangun dunia yang sehat dan melestarikan alam agar masyarakat dan lingkungan terbebas dari ancaman bahan kimia yang berbahaya. Visi ini meliputi kegiatan melindungi dan memelihara keindahan alam Indonesia untuk diwariskan kepada generasi yang akan datang.</p>\n</div>\n<!--.box--></div>\n<!--.col-md--></div>\n<!--.row--><!--.row-->\n\n<h2 class="quote animated fadeInUp">Misi</h2>\n\n<div class="row">\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">\n<div class="box box-pattern">\n<p>Bionic Farm berkomitmen untuk membangun masyarakat yang sehat dengan mensuplai produk pertanian yang alami dan organik. Misi ini tumbuh dari rasa kepedulian yang tinggi terhadap kualitas kesehatan manusia khususnya anak-anak. Kami percaya, dengan melakukan perubahan kecil ini akan menghasilkan perubahan yang besar dikemudian hari, seiring dengan pepatah : &quot;Di dalam tubuh yang sehat, terdapat jiwa yang sehat&quot;. Dengan demikian kami turut berkontribusi terhadap peningkatan kualitas sumber daya manusia.</p>\n</div>\n<!--.box--></div>\n<!--.col-md--></div>\n<!--.row--><!--.row-->', 'about description', 'about, company', 'about'),
(6, '', '', '', 'faq'),
(4, '<p><b>1. Pembelian Langsung ke Toko</b></p>\r\n\r\n<p class="p2">Bagi anda yang berdomisili di Jakarta &amp; sekitarnya dapat langsung mendatangi outlet-outlet yang berlokasi di :</p>\r\n\r\n<p class="p2"><span class="s1"><b>- Jakarta</b></span> :&nbsp;FoodHall, All Fresh, Apotek Melawai, Cempaka Fruit Market,&nbsp;Klub Sehat, Farmers, Fresh Market, Grand Lucky, Healthy Choice, Hero, Hypermart, Jakarta Fruit Market, Kem Chicks, Le Gourmet, Market City, Papaya, Ranch Market, Superindo, Stevan Meat Shop, Total Buah Segar, Rejeki Ancol, Rejeki Supermarket, Kawan Sehat Kelapa Gading<br />\r\n<span class="s1"><b>- Tangerang</b></span> :&nbsp;Giant, Farmers, Hypermart, Superindo, Stevan Meat Shop, Total Buah Segar<br />\r\n<span class="s1"><b>- Bogor</b></span> :&nbsp;Farmers, Total Buah Segar, Hypermart<br />\r\n<span class="s1"><b>- Bandung</b></span> :&nbsp;Yogya Toserba<br />\r\n<span class="s1"><b>- Cikarang</b></span> :&nbsp;Hypermart Pejaten, Foodmart Gourmet<br />\r\n<span class="s1"><b>- Bekasi</b></span> :&nbsp;Foodmart Citos<br />\r\n- <b>Denpasar</b> : Propan Sandimas Home Centre (Jl. Gatot Subroto Barat 688, Ubung - Denpasar, Bali)<br />\r\n<br />\r\n<br />\r\n<b>2. Pembelian dengan Layanan Antar</b><br />\r\nKhusus untuk anda yang berdomisili di Jakarta &amp; Tangerang, kami menyediakan layanan antar barang oleh kurir kami. Prosedur Layanan :<br />\r\na. Customer melakukan pemesanan melalui telp. 021 5930 3333 ext 12322,&nbsp;untuk produk bisa dilihat di website pada halaman &ldquo;produk&rdquo;<br />\r\nb. Barang akan diantar ke tempat customer pada jadwal yang telah disepakati<br />\r\nc. Customer diwajibkan melakukan pembayaran satu hari sebelum barang diantar melalui rekening BCA 7620777077 atas nama PT. Bionic Natura<br />\r\nd. Minimum pembelian Rp 500.000 (Jakarta &amp; Tangerang), free ongkir<br />\r\ne. Kerusakan barang setelah pengecekan barang oleh customer bukan menjadi tanggungjawab kami<br />\r\n<br />\r\n<b>3. Pembelian Online</b><br />\r\nDapat langsung dilakukan dengan cara :<br />\r\na. Pilih produk kemudian masukkan ke keranjang belanja (klik --&gt; add to bag)<br />\r\nb. Check daftar produk yang dibeli dengan klik &ldquo;view bag&rdquo;,&nbsp;jika ingin menambah produk, silahkan kembali ke halaman produk.&nbsp;Jika sudah sesuai, silahkan klik &ldquo;checkout&rdquo; untuk melanjutkan transaksi<br />\r\nc. Klik &ldquo;checkout&rdquo; untuk melanjutkan transaksi<br />\r\nd. Login. apabila sudah pernah terdaftar, anda bisa langsung login. Untuk customer baru, silahkan membuat akun dengan mengisi data di &ldquo;New Customer&rdquo; kemudian &ldquo;create new account&rdquo;<br />\r\ne. Lanjutkan proses pembelian dengan melakukan &ldquo;checkout&rdquo; pada bagian bawah daftar produk di keranjang belanja<br />\r\nf. Silahkan lengkapi data diri untuk melanjutkan proses selanjutnya, kemudian klik &ldquo;place order&rdquo;. Alamat yang tercantum disini merupakan alamat tujuan pengiriman. Anda akan mendapatkan 1 (satu) email pada tahap ini<br />\r\ng. customer akan mendapatkan &ldquo;order number&rdquo; (mohon diingat/dicatat) dan keterangan mengenai total belanja dan nomor rekening untuk melanjutkan ke proses pembayaran. Anda akan terima email lagi pada tahap ini<br />\r\nh. Konfirmasi pembayaran, silahkan klik link pada nmr 2, anda akan terhubung ke halaman &ldquo;confirm payment&rdquo;, silahkan masukkan order number dan lengkapi data lainnya, submit. Anda akan mendapat 1 email pada tahap ini<br />\r\ni. Pada tahap ini, pesanan anda sedang dalam proses. Tunggu konfirmasi selanjutnya. Check email anda dan &ldquo;order history&rdquo; untuk mendapatkan rekap transaksi<br />\r\nj. Apabila pemesanan dilakukan diatas jam 15.00wib, pengiriman akan dilakukan dihari kerja berikutnya<br />\r\n<br />\r\n<b>4. Memantau Situs Transaksi</b><br />\r\nUntuk memantau situs transaksi, anda dapat mengunjungi halaman &ldquo;My Account&rdquo; yang terletak di sebelah kanan atas pada halaman web Bionic<br />\r\n<br />\r\n<b>4.1. Confirm Payment</b><br />\r\nMerupakan tahap konfirmasi pembayaran anda<br />\r\n<br />\r\n<b>4.2. View Order History</b><br />\r\nuntuk melihat semua transaksi yang telah anda lakukan<br />\r\nDi setiap invoice yang anda terima melalui email, akan terdapat status sbb :<br />\r\na. Waiting for Payment : Sistem kami belum mendeteksi pembayaran dari anda. Apabila anda telah membayar dan konfirmasi, maka secara otomatis sistem akan merubah status ini menjadi payment accepted<br />\r\nb. Payment Accepted : pembayaran anda sudah diterima oleh sistem<br />\r\nc. In Process : barang anda sedang dipersiapkan dan siap dikirim<br />\r\nd. On Delivery : Barang anda sedang dalam proses pengiriman. Apabila telah dikirim, anda akan mendapat email yang berisi nomor resi pengiriman, bisa digunakan untuk mengecek status barang anda<br />\r\n<br />\r\n<b>4.3. Edit Address &amp; Account Details</b><br />\r\nUntuk merubah database anda (alamat, email, password, dll)</p>\r\n', '', '', 'facilities'),
(5, 'Menghasilkan produk organik yang berkualitas adalah komitmen utama kami.<br />\r\nBionic Farm dilengkapi dengan fasilitas seperti laboratorium, mixer, mesin filling, ruang sterilisasi dan bedeng-bedeng pertumbuhan jamur.', '', '', 'quality');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about_lang`
--

CREATE TABLE IF NOT EXISTS `tbl_about_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_param` int(11) NOT NULL,
  `fill` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `language_code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_about_lang`
--

INSERT INTO `tbl_about_lang` (`id`, `id_param`, `fill`, `description`, `keywords`, `type`, `language_code`) VALUES
(1, 2, '<h2 class="quote animated fadeInUp">ABOUT US</h2>\r\n\r\n<p>Bionic Farm was established in 1990 and committed to preserve the nature through sustainable organic agriculture. In the beginning, Bionic Farm specialized solely in cultivating mushrooms.As people become more aware and conscious of the food they consume, Bionic Farm expanded its products scope.<br />\r\n<br />\r\nWe have several locations for growing organic rice in West Java : Ciherang, Cimande, Cikande and Pancawati. Where as in highland Cibodas-Puncak, we grow organic mushrooms (Oyster Mushrooms, Shiitake, Eringii, Wood Ears), arabica coffee; asparagus and other vegetables.<br />\r\n<br />\r\nIn Ciherang we have integrated organic farm in wich beside rice, we also cultivate Rosella, Calamansi, Soursop, Purple Sweet Potatoes, Honey Potatoes and also goats (for milk), chickens (for meat and eggs), ducks (for eggs), and fishes.</p>\r\n\r\n<div class="row">\r\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6"><!--.box--></div>\r\n<!--.col-md--></div>\r\n<!--.row--><!--.row-->\r\n\r\n<h2 class="quote animated fadeInUp">Vision</h2>\r\n\r\n<div class="row">\r\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">\r\n<div class="box box-pattern">\r\n<p>Bionic Farm envisions a world in which health and well-being of our society and environment are not at risk from exposure from pesticides and other toxic chemicals. This vision also includes preservation and protection of our nature and save our Mother Earth for future generations.</p>\r\n</div>\r\n<!--.box--></div>\r\n<!--.col-md--></div>\r\n<!--.row--><!--.row-->\r\n\r\n<h2 class="quote animated fadeInUp">Mission</h2>\r\n\r\n<div class="row">\r\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">\r\n<div class="box box-pattern">\r\n<p>Bionic Farm is committed to build a vibrant and healthy society by providing organic and natural products. This mission arises from underlying concern for our society, especially children for their sustained health. We believe that by implementing small fundamental changes in our daily intake will have large impact on the well-being, as the saying goes &quot;healthy body, healthy mind&quot; thus in process we could create a strong, high-quality human resources for the nation.</p>\r\n</div>\r\n<!--.box--></div>\r\n<!--.col-md--></div>\r\n<!--.row--><!--.row-->', 'about description', 'about, company', 'about', 'EN'),
(2, 4, '<p>1. <strong>Direct Purchase</strong><br />\r\nFor you who lives in Jakarta &amp; surroundings, can directly go to outlet located at :<br />\r\n-&nbsp;<strong>Jakarta</strong>&nbsp;:&nbsp;FoodHall, All Fresh, Apotek Melawai, Cempaka Fruit Market,&nbsp;Klub Sehat, Farmers, Fresh Market, Grand Lucky, Healthy Choice, Hero, Hypermart, Jakarta Fruit Market, Kem Chicks, Le Gourmet, Market City, Papaya, Ranch Market, Superindo, Stevan Meat Shop, Total Buah Segar, Rejeki Ancol, Rejeki Supermarket, Kawan Sehat Kelapa Gading<br />\r\n-&nbsp;<strong>Tangerang</strong>&nbsp;:&nbsp;Giant, Farmers, Hypermart, Superindo, Stevan Meat Shop, Total Buah Segar<br />\r\n-&nbsp;<strong>Bogor</strong>&nbsp;:&nbsp;Farmers, Total Buah Segar, Hypermart<br />\r\n-&nbsp;<strong>Bandung</strong>&nbsp;:&nbsp;Yogya Toserba<br />\r\n-&nbsp;<strong>Cikarang</strong>&nbsp;:&nbsp;Hypermart Pejaten, Foodmart Gourmet<br />\r\n-&nbsp;<strong>Bekasi</strong>&nbsp;:&nbsp;Foodmart Citos<br />\r\n-&nbsp;<strong>Denpasar</strong>&nbsp;: Propan Sandimas Home Centre (Jl. Gatot Subroto Barat 688, Ubung - Denpasar, Bali)<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n<strong>2. Delivery Service</strong><br />\r\nFor you who lives in Jakarta &amp; Tangerang,&nbsp;we provide delivery service by our courier. Service procedures :<br />\r\na. Customer can order by phone 021 5930 3333 ext 12322, the products can be seen on the website on the &quot;Products&rdquo;<br />\r\nb. Goods will be delivered to the customer at an agreed schedule<br />\r\nc. Customers are required to make a payment one day before the goods are delivered through BCA account 7620777077 in the name of PT. Bionic Natura<br />\r\nd. Free shipping for minimum purchase IDR 500.000 (Jakarta &amp; Tangerang)<br />\r\ne. Goods damage after inspection by the customer is not our responsibility<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n<strong>3. Online Shopping</strong><br />\r\na. Choose the goods you want, put it into shopping bag (click --&gt; add to bag)<br />\r\nb. Please check the list of products you buy by click &quot;viewbag&quot;&nbsp;for add products, please return to page &ldquo;products&rdquo;<br />\r\nc. Click &ldquo;checkout&rdquo; to continue the transaction<br />\r\nd. Login. If it has been registered, you can login directly. If you are a new customer, please create an account by filling the data at &ldquo;New Customer&rdquo; and then &ldquo;Create New Account&rdquo;<br />\r\ne. Continue buying process by doing a &quot;checkout&quot; at the bottom of the list of products in the shopping bag<br />\r\nf. Please complete the data to continue the next process, and then click &quot;place order&quot;. The address listed here is the address of the delivery destination. You will get 1 email at this stage<br />\r\ng. Customer will get &ldquo;order number&rdquo; (please remember this number) and information about the total shopping and account number to proceed to the payment process. You will receive an email again at this stage<br />\r\nh. Confirmation of payment, please click the link in the number two, you will be connected to the &quot;confirm payment&quot;, please enter the order number and complete the other data, submit. You will receive 1 email at this stage<br />\r\ni. In this stage, your order is in process. Please wait the next information. Check your email and &ldquo;order history&rdquo; to get recap transaction<br />\r\nj. If you made an order over than 3 o&#39;clock, the delivery will be done on the next day (office hour)<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n<strong>4. Transaction Monitoring</strong><br />\r\nTo monitoring your transactions, you can visit &quot;My Account&quot; which is located at the top right of the web page Bionic<br />\r\n<strong>4.1. Confirm Payment</strong><br />\r\nThe stage of your payment confirmation<br />\r\n<strong>4.2. View Order History</strong><br />\r\nTo see all of your transactions. In any invoice that you receive through email, there will be the following status :<br />\r\na. Waiting for Payment : our system has not detect your payment. If you have paid and confirmed, then the system will automatically change the status into payment accepted<br />\r\nb. Payment Accepted : your payment has been received by the system<br />\r\nc. In Process : your goods are being prepared and ready for shipment<br />\r\nd. On Delivery : Your goods are in delivery process. Once shipped, you will receive an email containing the shipping receipt number, can be used to check the status of your goods.<br />\r\n<strong>4.3. Edit Address &amp; Account Details</strong><br />\r\nTo change your database (address, email, password, etc.)</p>\r\n', '', '', 'facilities', 'EN'),
(3, 5, 'Bionic Farm&nbsp;is committed to building a vibrant, healthier society by providing natural and organic products. This mission arises from underlying concern for our society especially children for their sustained health.<br />\r\nWe believe that by implementing small fundamental changes in our daily intake will have large impact on the well-being, as the saying goes &quot;healthy body, healthy mind&quot; thus in process we could create a strong, high-quality human resource for the nation.', '', '', 'quality', 'EN'),
(4, 1, '<strong>QUALITY MANAGEMENT</strong><br />\r\nAll our produces are organically grown and Bionic Farm has received organic certificate from&nbsp;<strong>InOfice (Indonesian Organic Farming Certification)&nbsp;</strong>and halal certificate from&nbsp;<strong>MUI (Majelis Ulama Indonesia)</strong>. To ensure freshness and quality, we adhere to stringent checks starting from sowing, harvesting, packaging to delivery. Our harvested fresh produces are immediately packed in containers and put in cooler. The boxed products are then placed in refrigerated trucks and delivered to markets within 24 - 48 hours.<br />\r\n&nbsp;<br />\r\n<strong>WHY ORGANIC</strong><br />\r\nOrganic food is produces that have been grown without the use of synthetic pesticides, fertilizers and other chemicals. Moreover, it represents a set of principles and standards concerning sustainability and quality of food. As organic producer, we want to ensure the integrity of our food chain and to create a legacy of fertile land that could produce healthy food for future generations.<br />\r\nOrganically-grown produce simply taste better and studies have proven that organic crops contain much higher levels of vitamin C, minerals, enzymes and other micro-nutrients than conventional crops.<br />\r\nThe use of synthetic pesticides produce abundant, low-cost food but at the same time, they create higher social costs. The amount of time, expense and trouble devoted to restoring clean air, water and soil is greater than any advantages pesticides offer.<br />\r\nIntensive, conventional farming methods expose workers to harmful chemicals and pesticides that could potentially endanger their lives. There are much higher occurrences of cancer, respiratory problems and other major diseases in workers from non-organic farms, particularly at under developing countries.<br />\r\nOrganic farming promotes biodiversity and wildlife. As organic producer, we do our part to protect the environment by using natural pesticides to control biological damage and natural fertilizers to enrich the soil.<br />\r\nOrganic farming reduces toxic runoff and pollutants that contaminate our food, water and air.', '', '', 'description', 'EN'),
(5, 6, '', '', '', 'faq', 'EN'),
(6, 2, '<h2 class="quote animated fadeInUp">Tentang Kami</h2>\r\n\r\n<div class="row">\r\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">\r\n<div class="box box-pattern">\r\n<p><strong>Bionic Farm </strong>didirikan pada tahun 1990 dan berkomitmen untuk melestarikan alam dengan pertanian organik. Pada awalnya, Bionic Farm khusus membudidayakan jamur. Namun menyadari tumbuhnya kesadaran dan kepedulian masyarakat akan makanan yang dikonsumsi, Bionic Farm mengembangkan variasi produk pertanian organiknya. Bionic Farm memiliki 2 lokasi pertanian yang utama, berada di Cibodas-Puncak dan Ciherang-Bogor, Jawa Barat. Di Cibodas kami membudidayakan berbagai jenis jamur dataran tinggi, kopi, sayuran, dan tanaman herbal. Di Ciherang kami membudidayakan beras organik, rosella, serta berbagai jenis sayuran dan buah-buahan.</p>\r\n</div>\r\n<!--.box--></div>\r\n<!--.col-md--></div>\r\n<!--.row--><!--.row-->\r\n\r\n<h2 class="quote animated fadeInUp">Visi</h2>\r\n\r\n<div class="row">\r\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">\r\n<div class="box box-pattern">\r\n<p>Visi Bionic Farm adalah membangun dunia yang sehat dan melestarikan alam agar masyarakat dan lingkungan terbebas dari ancaman bahan kimia yang berbahaya. Visi ini meliputi kegiatan melindungi dan memelihara keindahan alam Indonesia untuk diwariskan kepada generasi yang akan datang.</p>\r\n</div>\r\n<!--.box--></div>\r\n<!--.col-md--></div>\r\n<!--.row--><!--.row-->\r\n\r\n<h2 class="quote animated fadeInUp">Misi</h2>\r\n\r\n<div class="row">\r\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">\r\n<div class="box box-pattern">\r\n<p>Bionic Farm berkomitmen untuk membangun masyarakat yang sehat dengan mensuplai produk pertanian yang alami dan organik. Misi ini tumbuh dari rasa kepedulian yang tinggi terhadap kualitas kesehatan manusia khususnya anak-anak. Kami percaya, dengan melakukan perubahan kecil ini akan menghasilkan perubahan yang besar dikemudian hari, seiring dengan pepatah : &quot;Di dalam tubuh yang sehat, terdapat jiwa yang sehat&quot;. Dengan demikian kami turut berkontribusi terhadap peningkatan kualitas sumber daya manusia.</p>\r\n</div>\r\n<!--.box--></div>\r\n<!--.col-md--></div>\r\n<!--.row--><!--.row-->', 'about description', 'about, company', 'about', 'ID'),
(7, 4, '<p><b>1. Pembelian Langsung ke Toko</b></p>\r\n\r\n<p class="p2">Bagi anda yang berdomisili di Jakarta &amp; sekitarnya dapat langsung mendatangi outlet-outlet yang berlokasi di :</p>\r\n\r\n<p class="p2"><span class="s1"><b>- Jakarta</b></span> :&nbsp;FoodHall, All Fresh, Apotek Melawai, Cempaka Fruit Market,&nbsp;Klub Sehat, Farmers, Fresh Market, Grand Lucky, Healthy Choice, Hero, Hypermart, Jakarta Fruit Market, Kem Chicks, Le Gourmet, Market City, Papaya, Ranch Market, Superindo, Stevan Meat Shop, Total Buah Segar, Rejeki Ancol, Rejeki Supermarket, Kawan Sehat Kelapa Gading<br />\r\n<span class="s1"><b>- Tangerang</b></span> :&nbsp;Giant, Farmers, Hypermart, Superindo, Stevan Meat Shop, Total Buah Segar<br />\r\n<span class="s1"><b>- Bogor</b></span> :&nbsp;Farmers, Total Buah Segar, Hypermart<br />\r\n<span class="s1"><b>- Bandung</b></span> :&nbsp;Yogya Toserba<br />\r\n<span class="s1"><b>- Cikarang</b></span> :&nbsp;Hypermart Pejaten, Foodmart Gourmet<br />\r\n<span class="s1"><b>- Bekasi</b></span> :&nbsp;Foodmart Citos<br />\r\n- <b>Denpasar</b> : Propan Sandimas Home Centre (Jl. Gatot Subroto Barat 688, Ubung - Denpasar, Bali)<br />\r\n<br />\r\n<br />\r\n<b>2. Pembelian dengan Layanan Antar</b><br />\r\nKhusus untuk anda yang berdomisili di Jakarta &amp; Tangerang, kami menyediakan layanan antar barang oleh kurir kami. Prosedur Layanan :<br />\r\na. Customer melakukan pemesanan melalui telp. 021 5930 3333 ext 12322,&nbsp;untuk produk bisa dilihat di website pada halaman &ldquo;produk&rdquo;<br />\r\nb. Barang akan diantar ke tempat customer pada jadwal yang telah disepakati<br />\r\nc. Customer diwajibkan melakukan pembayaran satu hari sebelum barang diantar melalui rekening BCA 7620777077 atas nama PT. Bionic Natura<br />\r\nd. Minimum pembelian Rp 500.000 (Jakarta &amp; Tangerang), free ongkir<br />\r\ne. Kerusakan barang setelah pengecekan barang oleh customer bukan menjadi tanggungjawab kami<br />\r\n<br />\r\n<b>3. Pembelian Online</b><br />\r\nDapat langsung dilakukan dengan cara :<br />\r\na. Pilih produk kemudian masukkan ke keranjang belanja (klik --&gt; add to bag)<br />\r\nb. Check daftar produk yang dibeli dengan klik &ldquo;view bag&rdquo;,&nbsp;jika ingin menambah produk, silahkan kembali ke halaman produk.&nbsp;Jika sudah sesuai, silahkan klik &ldquo;checkout&rdquo; untuk melanjutkan transaksi<br />\r\nc. Klik &ldquo;checkout&rdquo; untuk melanjutkan transaksi<br />\r\nd. Login. apabila sudah pernah terdaftar, anda bisa langsung login. Untuk customer baru, silahkan membuat akun dengan mengisi data di &ldquo;New Customer&rdquo; kemudian &ldquo;create new account&rdquo;<br />\r\ne. Lanjutkan proses pembelian dengan melakukan &ldquo;checkout&rdquo; pada bagian bawah daftar produk di keranjang belanja<br />\r\nf. Silahkan lengkapi data diri untuk melanjutkan proses selanjutnya, kemudian klik &ldquo;place order&rdquo;. Alamat yang tercantum disini merupakan alamat tujuan pengiriman. Anda akan mendapatkan 1 (satu) email pada tahap ini<br />\r\ng. customer akan mendapatkan &ldquo;order number&rdquo; (mohon diingat/dicatat) dan keterangan mengenai total belanja dan nomor rekening untuk melanjutkan ke proses pembayaran. Anda akan terima email lagi pada tahap ini<br />\r\nh. Konfirmasi pembayaran, silahkan klik link pada nmr 2, anda akan terhubung ke halaman &ldquo;confirm payment&rdquo;, silahkan masukkan order number dan lengkapi data lainnya, submit. Anda akan mendapat 1 email pada tahap ini<br />\r\ni. Pada tahap ini, pesanan anda sedang dalam proses. Tunggu konfirmasi selanjutnya. Check email anda dan &ldquo;order history&rdquo; untuk mendapatkan rekap transaksi<br />\r\nj. Apabila pemesanan dilakukan diatas jam 15.00wib, pengiriman akan dilakukan dihari kerja berikutnya<br />\r\n<br />\r\n<b>4. Memantau Situs Transaksi</b><br />\r\nUntuk memantau situs transaksi, anda dapat mengunjungi halaman &ldquo;My Account&rdquo; yang terletak di sebelah kanan atas pada halaman web Bionic<br />\r\n<br />\r\n<b>4.1. Confirm Payment</b><br />\r\nMerupakan tahap konfirmasi pembayaran anda<br />\r\n<br />\r\n<b>4.2. View Order History</b><br />\r\nuntuk melihat semua transaksi yang telah anda lakukan<br />\r\nDi setiap invoice yang anda terima melalui email, akan terdapat status sbb :<br />\r\na. Waiting for Payment : Sistem kami belum mendeteksi pembayaran dari anda. Apabila anda telah membayar dan konfirmasi, maka secara otomatis sistem akan merubah status ini menjadi payment accepted<br />\r\nb. Payment Accepted : pembayaran anda sudah diterima oleh sistem<br />\r\nc. In Process : barang anda sedang dipersiapkan dan siap dikirim<br />\r\nd. On Delivery : Barang anda sedang dalam proses pengiriman. Apabila telah dikirim, anda akan mendapat email yang berisi nomor resi pengiriman, bisa digunakan untuk mengecek status barang anda<br />\r\n<br />\r\n<b>4.3. Edit Address &amp; Account Details</b><br />\r\nUntuk merubah database anda (alamat, email, password, dll)</p>\r\n', '', '', 'facilities', 'ID'),
(8, 5, '', '', '', 'quality', 'ID'),
(9, 1, '', '', '', 'description', 'ID'),
(10, 2, '<h2 class="quote animated fadeInUp">Tentang Kami</h2>\r\n\r\n<div class="row">\r\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">\r\n<div class="box box-pattern">\r\n<p><strong>Bionic Farm </strong>didirikan pada tahun 1990 dan berkomitmen untuk melestarikan alam dengan pertanian organik. Pada awalnya, Bionic Farm khusus membudidayakan jamur. Namun menyadari tumbuhnya kesadaran dan kepedulian masyarakat akan makanan yang dikonsumsi, Bionic Farm mengembangkan variasi produk pertanian organiknya. Bionic Farm memiliki 2 lokasi pertanian yang utama, berada di Cibodas-Puncak dan Ciherang-Bogor, Jawa Barat. Di Cibodas kami membudidayakan berbagai jenis jamur dataran tinggi, kopi, sayuran, dan tanaman herbal. Di Ciherang kami membudidayakan beras organik, rosella, serta berbagai jenis sayuran dan buah-buahan.</p>\r\n</div>\r\n<!--.box--></div>\r\n<!--.col-md--></div>\r\n<!--.row--><!--.row-->\r\n\r\n<h2 class="quote animated fadeInUp">Visi</h2>\r\n\r\n<div class="row">\r\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">\r\n<div class="box box-pattern">\r\n<p>Visi Bionic Farm adalah membangun dunia yang sehat dan melestarikan alam agar masyarakat dan lingkungan terbebas dari ancaman bahan kimia yang berbahaya. Visi ini meliputi kegiatan melindungi dan memelihara keindahan alam Indonesia untuk diwariskan kepada generasi yang akan datang.</p>\r\n</div>\r\n<!--.box--></div>\r\n<!--.col-md--></div>\r\n<!--.row--><!--.row-->\r\n\r\n<h2 class="quote animated fadeInUp">Misi</h2>\r\n\r\n<div class="row">\r\n<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">\r\n<div class="box box-pattern">\r\n<p>Bionic Farm berkomitmen untuk membangun masyarakat yang sehat dengan mensuplai produk pertanian yang alami dan organik. Misi ini tumbuh dari rasa kepedulian yang tinggi terhadap kualitas kesehatan manusia khususnya anak-anak. Kami percaya, dengan melakukan perubahan kecil ini akan menghasilkan perubahan yang besar dikemudian hari, seiring dengan pepatah : &quot;Di dalam tubuh yang sehat, terdapat jiwa yang sehat&quot;. Dengan demikian kami turut berkontribusi terhadap peningkatan kualitas sumber daya manusia.</p>\r\n</div>\r\n<!--.box--></div>\r\n<!--.col-md--></div>\r\n<!--.row--><!--.row-->', 'about description', 'about, company', 'about', ''),
(11, 4, '<p><b>1. Pembelian Langsung ke Toko</b></p>\r\n\r\n<p class="p2">Bagi anda yang berdomisili di Jakarta &amp; sekitarnya dapat langsung mendatangi outlet-outlet yang berlokasi di :</p>\r\n\r\n<p class="p2"><span class="s1"><b>- Jakarta</b></span> :&nbsp;FoodHall, All Fresh, Apotek Melawai, Cempaka Fruit Market,&nbsp;Klub Sehat, Farmers, Fresh Market, Grand Lucky, Healthy Choice, Hero, Hypermart, Jakarta Fruit Market, Kem Chicks, Le Gourmet, Market City, Papaya, Ranch Market, Superindo, Stevan Meat Shop, Total Buah Segar, Rejeki Ancol, Rejeki Supermarket, Kawan Sehat Kelapa Gading<br />\r\n<span class="s1"><b>- Tangerang</b></span> :&nbsp;Giant, Farmers, Hypermart, Superindo, Stevan Meat Shop, Total Buah Segar<br />\r\n<span class="s1"><b>- Bogor</b></span> :&nbsp;Farmers, Total Buah Segar, Hypermart<br />\r\n<span class="s1"><b>- Bandung</b></span> :&nbsp;Yogya Toserba<br />\r\n<span class="s1"><b>- Cikarang</b></span> :&nbsp;Hypermart Pejaten, Foodmart Gourmet<br />\r\n<span class="s1"><b>- Bekasi</b></span> :&nbsp;Foodmart Citos<br />\r\n- <b>Denpasar</b> : Propan Sandimas Home Centre (Jl. Gatot Subroto Barat 688, Ubung - Denpasar, Bali)<br />\r\n<br />\r\n<br />\r\n<b>2. Pembelian dengan Layanan Antar</b><br />\r\nKhusus untuk anda yang berdomisili di Jakarta &amp; Tangerang, kami menyediakan layanan antar barang oleh kurir kami. Prosedur Layanan :<br />\r\na. Customer melakukan pemesanan melalui telp. 021 5930 3333 ext 12322,&nbsp;untuk produk bisa dilihat di website pada halaman &ldquo;produk&rdquo;<br />\r\nb. Barang akan diantar ke tempat customer pada jadwal yang telah disepakati<br />\r\nc. Customer diwajibkan melakukan pembayaran satu hari sebelum barang diantar melalui rekening BCA 7620777077 atas nama PT. Bionic Natura<br />\r\nd. Minimum pembelian Rp 500.000 (Jakarta &amp; Tangerang), free ongkir<br />\r\ne. Kerusakan barang setelah pengecekan barang oleh customer bukan menjadi tanggungjawab kami<br />\r\n<br />\r\n<b>3. Pembelian Online</b><br />\r\nDapat langsung dilakukan dengan cara :<br />\r\na. Pilih produk kemudian masukkan ke keranjang belanja (klik --&gt; add to bag)<br />\r\nb. Check daftar produk yang dibeli dengan klik &ldquo;view bag&rdquo;,&nbsp;jika ingin menambah produk, silahkan kembali ke halaman produk.&nbsp;Jika sudah sesuai, silahkan klik &ldquo;checkout&rdquo; untuk melanjutkan transaksi<br />\r\nc. Klik &ldquo;checkout&rdquo; untuk melanjutkan transaksi<br />\r\nd. Login. apabila sudah pernah terdaftar, anda bisa langsung login. Untuk customer baru, silahkan membuat akun dengan mengisi data di &ldquo;New Customer&rdquo; kemudian &ldquo;create new account&rdquo;<br />\r\ne. Lanjutkan proses pembelian dengan melakukan &ldquo;checkout&rdquo; pada bagian bawah daftar produk di keranjang belanja<br />\r\nf. Silahkan lengkapi data diri untuk melanjutkan proses selanjutnya, kemudian klik &ldquo;place order&rdquo;. Alamat yang tercantum disini merupakan alamat tujuan pengiriman. Anda akan mendapatkan 1 (satu) email pada tahap ini<br />\r\ng. customer akan mendapatkan &ldquo;order number&rdquo; (mohon diingat/dicatat) dan keterangan mengenai total belanja dan nomor rekening untuk melanjutkan ke proses pembayaran. Anda akan terima email lagi pada tahap ini<br />\r\nh. Konfirmasi pembayaran, silahkan klik link pada nmr 2, anda akan terhubung ke halaman &ldquo;confirm payment&rdquo;, silahkan masukkan order number dan lengkapi data lainnya, submit. Anda akan mendapat 1 email pada tahap ini<br />\r\ni. Pada tahap ini, pesanan anda sedang dalam proses. Tunggu konfirmasi selanjutnya. Check email anda dan &ldquo;order history&rdquo; untuk mendapatkan rekap transaksi<br />\r\nj. Apabila pemesanan dilakukan diatas jam 15.00wib, pengiriman akan dilakukan dihari kerja berikutnya<br />\r\n<br />\r\n<b>4. Memantau Situs Transaksi</b><br />\r\nUntuk memantau situs transaksi, anda dapat mengunjungi halaman &ldquo;My Account&rdquo; yang terletak di sebelah kanan atas pada halaman web Bionic<br />\r\n<br />\r\n<b>4.1. Confirm Payment</b><br />\r\nMerupakan tahap konfirmasi pembayaran anda<br />\r\n<br />\r\n<b>4.2. View Order History</b><br />\r\nuntuk melihat semua transaksi yang telah anda lakukan<br />\r\nDi setiap invoice yang anda terima melalui email, akan terdapat status sbb :<br />\r\na. Waiting for Payment : Sistem kami belum mendeteksi pembayaran dari anda. Apabila anda telah membayar dan konfirmasi, maka secara otomatis sistem akan merubah status ini menjadi payment accepted<br />\r\nb. Payment Accepted : pembayaran anda sudah diterima oleh sistem<br />\r\nc. In Process : barang anda sedang dipersiapkan dan siap dikirim<br />\r\nd. On Delivery : Barang anda sedang dalam proses pengiriman. Apabila telah dikirim, anda akan mendapat email yang berisi nomor resi pengiriman, bisa digunakan untuk mengecek status barang anda<br />\r\n<br />\r\n<b>4.3. Edit Address &amp; Account Details</b><br />\r\nUntuk merubah database anda (alamat, email, password, dll)</p>\r\n', '', '', 'facilities', ''),
(12, 5, 'Menghasilkan produk organik yang berkualitas adalah komitmen utama kami.<br />\r\nBionic Farm dilengkapi dengan fasilitas seperti laboratorium, mixer, mesin filling, ruang sterilisasi dan bedeng-bedeng pertumbuhan jamur.', '', '', 'quality', ''),
(13, 1, 'Semua produk kami di budidayakan secara&nbsp;<strong>Organik</strong>&nbsp;dan <strong>Bionic Farm</strong> telah menerima serifikat organik dari&nbsp;<strong>InOfice (Indonesian Organic Farming Certification)</strong>&nbsp;dan sertifikat halal dari&nbsp;<strong>MUI (Majelis Ulama Indonesia)</strong>.<br />\r\nUntuk menjamin kualitas dan kesegarannya, kami melakukan pengawasan ketat dari tahap awal penanaman, pemanenan, pengemasan hingga pengiriman.<br />\r\nProduk yang baru dipanen ditempatkan pada kotak penyimpanan, kemudian dimasukkan ke dalam lemari pendingin. Produk yang sudah dikemas lalu ditempatkan ke dalam&nbsp;cool box&nbsp;dan didistribusikan ke pasar dalam waktu 24-48 jam setelah panen.<br />\r\n&nbsp;<br />\r\n<strong>MENGAPA ORGANIK?</strong><br />\r\nBahan makanan organik dibudidayakan secara alami dan ramah lingkungan,&nbsp;tanpa menggunakan pestisida dan pupuk dari bahan kimia&nbsp;buatan, sehingga kualitas nutrisi alaminya terjaga. Sebagai produsen bahan makanan organik, kami ingin menjaga keseimbangan ekosistem dan menjaga kesuburan tanah sehingga dapat dimanfaatkan untuk memproduksi makanan organik secara berkesinambungan.<br />\r\nBahan makanan organik mempunyai cita rasa yang lebih lezat dan hasil penelitian membuktikan bahwa bahan makan organik mengandung kadar vitamin C, mineral, enzim dan nutrisi yang lebih tinggi dibandingkan dengan bahan makanan non-organik.<br />\r\nPenggunaan pestisida dan pupuk dari bahan kimia sintetis disatu sisi dapat membantu meningkatkan produktivitas dan menekan biaya produksi untuk sementara waktu, namun disisi lain sesungguhnya efek dari penggunaan bahan-bahan kimia beracun tersebut dapat menimbulkan masalah dikemudian hari. Kesulitan mendapatkan air bersih, turunnya tingkat kesuburan tanah dan polusi udara adalah contoh akibat jangka panjangnya. Sementara itu upaya untuk mengembalikan keadaan lingkungan pada kondisi semula membutuhkan waktu dan biaya yang tidak sedikit, belum lagi masalah sosial akibat komplain dari masyarakat sekitar.<br />\r\nMetode pertanian konvensional di negara-negara berkembang saat ini sangat beresiko terhadap kesehatan petani karena menggunakan pupuk dan pestisida sintetis yang berbahaya. Bahaya yang dapat ditimbulkan antara lain: kanker, gangguan saluran pernafasan dan keracunan bahan kimia sintetis lainnya.<br />\r\nPertanian organik berkontribusi dalam melestarikan keanekaragaman hayati dan kehidupan liar, dengan cara menggunakan pestisida dan pupuk alami yang aman dan ramah lingkungan.', '', '', 'description', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE IF NOT EXISTS `tbl_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(25) NOT NULL,
  `account_bank` text NOT NULL,
  `account_number` text NOT NULL,
  `account_name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `payment_type`, `account_bank`, `account_number`, `account_name`) VALUES
(1, 'bank', 'BCA', '8888-999-888', 'PT. Antikode'),
(4, 'bank', 'Mandiri', '8888-999-888', 'Nicholas Yudha'),
(5, 'bank', 'BNI', '9999-999-999', 'Gary Gregorius Gunarman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  `admString` varchar(12) NOT NULL,
  `created_date` datetime NOT NULL,
  `login_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `role`, `username`, `email`, `password`, `level`, `admString`, `created_date`, `login_date`) VALUES
(1, 'super admin', 'admins', 'dimas@antikode.com', '$23PstrXfk7Nw', '1', 'kiUmvwWHQRBd', '2013-05-01 11:11:11', '2015-08-31 03:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_career`
--

CREATE TABLE IF NOT EXISTS `tbl_career` (
  `career_id` int(11) NOT NULL AUTO_INCREMENT,
  `career_name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  `description` text NOT NULL,
  `reports` text NOT NULL,
  `education` text NOT NULL,
  PRIMARY KEY (`career_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_career`
--

INSERT INTO `tbl_career` (`career_id`, `career_name`, `category`, `active`, `visibility`, `description`, `reports`, `education`) VALUES
(1, 'Accounting Staff', 3, 1, 1, 'Urgently Required\r\n\r\n- Bachelor Degree (GPA 3.5)\r\n- Mastered Nero Accounting', '', 'S1 in field'),
(2, 'Marketing Staff', 2, 1, 1, '- Have own vehicle\r\n- Team work player', '', ''),
(6, 'Staff Operasional', 11, 1, 1, 'Required', '', ''),
(8, 'Web Designer', 11, 1, 1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ', 'Bachelor Degree'),
(9, 'Tes', 11, 1, 1, 'Tes', 'Tes', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_career_category`
--

CREATE TABLE IF NOT EXISTS `tbl_career_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_career_category`
--

INSERT INTO `tbl_career_category` (`category_id`, `category_name`, `active`, `visibility`) VALUES
(2, 'Marketing', 1, 1),
(3, 'Finance', 1, 1),
(12, 'Procurement', 1, 1),
(11, 'Bussiness Developing', 1, 1),
(10, 'Human Resource', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `career_id` int(11) NOT NULL AUTO_INCREMENT,
  `career_name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  `description` text NOT NULL,
  `store_map` text NOT NULL,
  PRIMARY KEY (`career_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`career_id`, `career_name`, `category`, `active`, `visibility`, `description`, `store_map`) VALUES
(1, 'Propan Centre', 9, 1, 1, 'JL. Gatot Subroto Km. 8, Tangerang, Indonesia', 'https://maps.google.com/maps?ie=UTF-8&q=propan+raya&fb=1&hq=propan+raya&cid=0,0,3259338853540256765&ei=mGaMUqzOCMKPrgeu1YBA&ved=0CDYQrwswAA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collection`
--

CREATE TABLE IF NOT EXISTS `tbl_collection` (
  `collection_id` int(11) NOT NULL AUTO_INCREMENT,
  `collection_name` text NOT NULL,
  `collection_description` text,
  `collection_order` int(11) DEFAULT NULL,
  `collection_active_status` varchar(20) NOT NULL,
  `collection_visibility_status` varchar(20) NOT NULL,
  PRIMARY KEY (`collection_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_collection`
--

INSERT INTO `tbl_collection` (`collection_id`, `collection_name`, `collection_description`, `collection_order`, `collection_active_status`, `collection_visibility_status`) VALUES
(9, 'Arabica Mandheling', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 5, 'active', 'yes'),
(6, 'Toraja Arabica', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4, 'active', 'yes'),
(7, 'Speciality', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 6, 'active', 'yes'),
(8, 'Robusta Lampung', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, 'active', 'yes'),
(10, 'Four Season', 'Asd', 2, 'active', 'yes'),
(11, 'Java Monk', 'Java Monk', 1, 'active', 'yes'),
(12, 'Blend Toraja', 'Lorem ipsum', 0, 'active', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE IF NOT EXISTS `tbl_color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` text NOT NULL,
  `color_image` text NOT NULL,
  `color_order` int(11) NOT NULL,
  `color_active_status` varchar(10) NOT NULL,
  `color_visibility_status` varchar(10) NOT NULL,
  `color_delete` int(11) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `color_name`, `color_image`, `color_order`, `color_active_status`, `color_visibility_status`, `color_delete`) VALUES
(24, 'Ground Bag 100 gr', 'files/uploads/color_image/no-color.png', 9, 'active', 'yes', 0),
(25, 'Ground Bag 200 gr', 'files/uploads/color_image/no-color.png', 10, 'active', 'yes', 0),
(26, 'Beans Bag 200 gr', 'files/uploads/color_image/no-color.png', 12, 'active', 'yes', 0),
(31, 'Colors', 'files/uploads/color_image/no-color.png', 16, 'active', 'yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

CREATE TABLE IF NOT EXISTS `tbl_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_environment` int(11) NOT NULL,
  `config_timezone` varchar(50) NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_config`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fill` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `fill`, `type`) VALUES
(1, '<p>\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Melissa Shoes Indonesia</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<div>\r\n	<p class="p1">\r\n		<span style="font-family: ''gotham rounded book''; font-size: 11px;"><span class="GRnoSuggestion GRcorrect" grcontextid="Jl:0" grmarkguid="1b711aee-5e2e-44f9-806b-f1a9805308b7" gruiphraseguid="019d0c2f-8824-419d-8b22-54e71ec38deb">Jl</span>. </span><span class="GRcorrect" grcontextid="ciniru:0" grmarkguid="174a8954-2f17-49a6-8e66-ecb2cf6b9e50" gruiphraseguid="88b7cad7-1dcb-4472-8616-fd01a8d55065" style="font-family: ''gotham rounded book''; font-size: 11px;">ciniru</span><span style="font-family: ''gotham rounded book''; font-size: 11px;"> IV, no</span><span class="GRcorrect" grcontextid=".:1" grmarkguid="0a471c8c-0187-40d2-b34d-9ed59c17de50" gruiphraseguid="88b7cad7-1dcb-4472-8616-fd01a8d55065" style="font-family: ''gotham rounded book''; font-size: 11px;">.</span><span style="font-family: ''gotham rounded book''; font-size: 11px;">8</span></p>\r\n	<p class="p2">\r\n		<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';"><span class="GRcorrect" grcontextid="kebayoran:0" grmarkguid="b3cc901c-62b1-49cd-baf8-4708b385d8f2" gruiphraseguid="6ef27ece-8b37-4f28-92ee-8200f802e6a5" style="">kebayoran</span> <span class="GRnoSuggestion GRcorrect" grcontextid="baru:1" grmarkguid="797d9c31-a559-4ab8-963d-79d9b34c4ccd" gruiphraseguid="6ef27ece-8b37-4f28-92ee-8200f802e6a5" style="">baru</span></span></span></p>\r\n	<p class="p2">\r\n		<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';"><span class="GRcorrect" grcontextid="jakarta:0" grmarkguid="d667db1c-a25a-451d-ad1b-0b0328182eed" gruiphraseguid="c1a9868e-269f-4ce7-b204-fc3153245c69" style="">jakarta</span></span></span></p>\r\n	<p class="p2">\r\n		<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';"><span class="GRcorrect" grcontextid="indonesia:0" grmarkguid="75282ea3-650d-4e22-a704-f02cdd34414c" gruiphraseguid="8ce2ea26-be71-49b1-a627-26d65ebe88a0" style="">indonesia</span> 12180</span></span></p>\r\n	<p class="p2">\r\n		<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';"><span class="GRcorrect" grcontextid="t:0" grmarkguid="a0d9d453-7c89-4529-9eab-41c0653d48c9" gruiphraseguid="a9275b13-0de7-421f-8865-5ea009f23bc5" style="">t</span>: +62.21.7210705</span></span></p>\r\n	<p class="p2">\r\n		<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';"><span class="GRcorrect" grcontextid="f:0" grmarkguid="6a0e475f-9b4c-4981-847a-b00149e920d7" gruiphraseguid="3e836039-daed-4815-86ee-ee5207820049" style="">f</span>: +62.21.7243467</span></span></p>\r\n	<p class="p2">\r\n		<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';"><span class="GRcorrect" grcontextid="m:0" grmarkguid="3ceb407d-5000-4599-8811-72b71f144883" gruiphraseguid="283fa10c-685b-47a6-b268-0b10c9efffc8" style="">m</span>: +62.856.1027878</span></span></p>\r\n	<p class="p2">\r\n		<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">www.sevenohseven.com</span></span></p>\r\n</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Online Inquiries</span></span></div>\r\n<div>\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">For all online inquiries, please contact info@melissashoes.co.id</span></span></div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Wholesale Inquiries</span></span></div>\r\n<div>\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">For wholesale inquiries, please contact sales@melissashoes.co.id</span></span></div>\r\n<div>\r\n	&nbsp;</div>\r\n', 'description');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forgot_log`
--

CREATE TABLE IF NOT EXISTS `tbl_forgot_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `log_time` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_forgot_log`
--

INSERT INTO `tbl_forgot_log` (`log_id`, `admin_id`, `admin_username`, `code`, `status`, `log_time`) VALUES
(1, 1, 'admins', 'S1IbrHmacFPKeeDCmzZ1BFw8NszyZSRRSz4ifrst7hdkxQXTpX', '0', '2015-08-10 16:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `order` int(11) NOT NULL,
  `flag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `filename`, `link`, `order`, `flag`) VALUES
(1, 'files/uploads/gallery/gallery-1-sample_recipe.jpg', 'NOT DEFINED YET', 0, 'files/uploads/gallery/gallery-1-sample_recipe.jpg'),
(2, 'files/uploads/gallery/gallery-2-sample_recipe.jpg', 'NOT DEFINED YET', 0, 'files/uploads/gallery/gallery-2-sample_recipe.jpg'),
(3, 'files/uploads/gallery/gallery-3-sample_recipe.jpg', 'NOT DEFINED YET', 0, 'files/uploads/gallery/gallery-3-sample_recipe.jpg'),
(4, 'files/uploads/gallery/gallery-4-slider-1.jpg', 'NOT DEFINED YET', 0, 'files/uploads/gallery/gallery-4-sample_recipe.jpg'),
(5, '', 'NOT DEFINED YET', 0, 'files/uploads/gallery/gallery-5-sample_recipe.jpg'),
(6, '', 'NOT DEFINED YET', 0, 'files/uploads/gallery/gallery-6-sample_recipe.jpg'),
(7, '', 'NOT DEFINED YET', 0, 'files/uploads/gallery/gallery-7-sample_recipe.jpg'),
(8, '', 'NOT DEFINED YET', 0, 'files/uploads/gallery/gallery-8-sample_recipe.jpg'),
(9, '', 'NOT DEFINED YET', 0, 'files/uploads/gallery/gallery-9-sample_recipe.jpg'),
(10, '', 'NOT DEFINED YET', 0, 'files/uploads/gallery/gallery-10-sample_recipe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general`
--

CREATE TABLE IF NOT EXISTS `tbl_general` (
  `general_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(50) NOT NULL,
  `website_title` varchar(100) NOT NULL,
  `website_description` text NOT NULL,
  `website_keywords` text NOT NULL,
  `analytics_code` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_phone` varchar(20) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_address` text NOT NULL,
  `company_country` varchar(30) NOT NULL,
  `company_province` varchar(100) NOT NULL,
  `company_city` varchar(50) NOT NULL,
  `company_postal_code` varchar(10) NOT NULL,
  `company_facebook` text NOT NULL,
  `company_twitter` text NOT NULL,
  `company_instagram` varchar(255) NOT NULL,
  `currency_rate` int(11) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `cover` text NOT NULL,
  `icon` text NOT NULL,
  PRIMARY KEY (`general_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_general`
--

INSERT INTO `tbl_general` (`general_id`, `url`, `website_title`, `website_description`, `website_keywords`, `analytics_code`, `company_phone`, `company_email`, `company_address`, `company_country`, `company_province`, `company_city`, `company_postal_code`, `company_facebook`, `company_twitter`, `company_instagram`, `currency_rate`, `logo`, `cover`, `icon`) VALUES
(1, 'http://www.antikode.com', 'Fira', 'Contemporary Furniture, Unique Decor Accessories, & Ready to Wear. Jakarta based, Indonesia.', 'furniture, interior, design', 'UA-40171222-1', '+62 811 170 165', 'info@wanderlust.com', 'Jl. Jurang Mangu Barat No. 8\r\nBintaro Jaya Sektor VII\r\nJakarta Selatan, Indonesia', 'Indonesia', 'Banten', 'Bintaro', '15523', 'https://www.facebook.com/BionicFarm', 'https://twitter.com/BionicFarm', 'https://instagram.com/BionicFarm', 14300, 'files/uploads/assets/logo-logo.png', 'files/uploads/cover/cover-account-logo-antikode.png', '/files/uploads/assets/favicon-antikode-favicon.ico');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_help`
--

CREATE TABLE IF NOT EXISTS `tbl_help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fill` text NOT NULL,
  `type` text NOT NULL,
  `order_` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_help`
--

INSERT INTO `tbl_help` (`id`, `fill`, `type`, `order_`) VALUES
(2, '<p>\r\n	<span style="font-family:gotham rounded book;"><span style="font-size:11px;">I wanna dances</span></span></p>\r\n', 'payment', 2),
(3, '<p>\r\n	<span style="font-family:gotham rounded book;"><span style="font-size:11px;">I wanna give you things</span></span></p>\r\n<p>\r\n	<span style="font-family:gotham rounded book;"><span style="font-size:11px;">I kiss you.</span></span></p>\r\n', 'delivery', 3),
(4, '<p>\r\n	&nbsp;</p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Follow these simple steps.</span></span></p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">1. SELECT PRODUCTS</span></span></p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Browse through our catalogue, click on the product you like.</span></span></p>\r\n<p class="p2">\r\n	&nbsp;</p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">2. ADD TO BAG</span></span></p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Once you&#39;ve chosen the products you would like to buy, just simply click on the button ADD TO BAG.</span></span></p>\r\n<p class="p2">\r\n	&nbsp;</p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">3. FOLLOW ORDER PROCESSES</span></span></p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">After the product(s) has been added to the bag, you will then be redirected to My Order. There are four simple steps in My Order.&nbsp;</span></span></p>\r\n<p class="p2">\r\n	&nbsp;</p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Step 1: Shopping Bag</span></span></p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">First step, review the content of your shopping bag. You can change the quantity of the products you added or even remove the products you do not want.</span></span></p>\r\n<p class="p2">\r\n	&nbsp;</p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Step 2: Details</span></span></p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Write down your personal details, as well as your shipping details.&nbsp;</span></span></p>\r\n<p class="p2">\r\n	&nbsp;</p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Step 3: Shipping</span></span></p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Third step, you can choose your shipping method.</span></span></p>\r\n<p class="p2">\r\n	&nbsp;</p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Step 4: Review</span></span></p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Review all the order steps you&#39;ve been through. You can edit each one of them before you confirm the order.</span></span></p>\r\n<p class="p2">\r\n	&nbsp;</p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">4. SEND PAYMENT</span></span></p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">Once you&#39;ve completed the order process, you can make the payment <span class="GRcorrect" grcontextid="with:0" grmarkguid="d7bc0ae1-e7d8-457d-9861-d3fbb02f0b57" gruiphraseguid="46933bb4-0a0e-4622-819d-a3c78d8ee144">with</span> any method you chose <span class="GRcorrect" grcontextid="on:1" grmarkguid="42e7f11b-3860-44e7-abe0-10078a946872" gruiphraseguid="46933bb4-0a0e-4622-819d-a3c78d8ee144">on</span> step 3.</span></span></p>\r\n<p class="p2">\r\n	&nbsp;</p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">5. CONFIRM PAYMENT</span></span></p>\r\n<p class="p1">\r\n	<span style="font-size:11px;"><span style="font-family: ''gotham rounded book'';">After you&#39;ve made the payment, confirm the payment by clicking on the CONFIRM PAYMENT link on the top right of Monstore website.</span></span></p>\r\n', 'ordering', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE IF NOT EXISTS `tbl_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `parameter`, `value`) VALUES
(1, 'url', 'http://www.melissa.co.id'),
(2, 'account_image', 'files/uploads/info/account.jpg'),
(3, 'info_image', 'files/uploads/info/account.jpg'),
(4, 'email', 'info@melissa.co.id'),
(5, 'website_name', 'Melissa'),
(6, 'order_email', 'gary@antikode.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_infos`
--

CREATE TABLE IF NOT EXISTS `tbl_infos` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `email_warehouse` varchar(100) NOT NULL,
  `email_display` varchar(50) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `handphone` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `cover` text NOT NULL,
  PRIMARY KEY (`info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_infos`
--

INSERT INTO `tbl_infos` (`info_id`, `email`, `email_warehouse`, `email_display`, `telephone`, `fax`, `handphone`, `description`, `keywords`, `cover`) VALUES
(1, 'info@nagarey.com', 'dimas.nuhputra@gmail.com', 'hello@nagarey.com', '+62812 1906 0109', '+6221 5904 993', '+62812 9888 2102', 'page description contact', 'contact, location', 'files/uploads/cover/cover-contact-logo-antikode.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language`
--

CREATE TABLE IF NOT EXISTS `tbl_language` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(50) NOT NULL,
  `language_code` varchar(5) NOT NULL,
  `active` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  PRIMARY KEY (`id_language`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_language`
--

INSERT INTO `tbl_language` (`id_language`, `language_name`, `language_code`, `active`, `visibility`) VALUES
(1, 'Indonesia', 'ID', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE IF NOT EXISTS `tbl_location` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_category` varchar(50) NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `news_alias` text NOT NULL,
  `news_date` datetime NOT NULL,
  `news_image` text NOT NULL,
  `news_excerpt` text NOT NULL,
  `news_content` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `news_created_date` datetime NOT NULL,
  `news_visibility` int(11) NOT NULL,
  `order_` int(11) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`news_id`, `news_category`, `news_title`, `news_alias`, `news_date`, `news_image`, `news_excerpt`, `news_content`, `meta_description`, `meta_keywords`, `news_created_date`, `news_visibility`, `order_`) VALUES
(1, '1', 'Head Office', 'head-office', '0000-00-00 00:00:00', 'Wisma GKBI 5th floor Suite 512\r\nJl. Jend. Sudirman Kav. 28\r\nJakarta Pusat 10210\r\n+62-21 5790 1328\r\n+62-21 5790 1316', '-6.217613', '106.812729', '', '', '2015-02-15 19:00:42', 1, 4),
(2, '1', 'JJ Royal Brasserie', 'jj-royal-brasserie', '0000-00-00 00:00:00', 'Jl. Prof. Dr. Satrio Kav. 3-5, \r\nLOTTE Shopping Avenue LG Floor, A01-02, \r\nKuningan\r\nKaret Kuningan\r\nJakarta Selatan 12940\r\n', '-6.22426', '106.823255', '', '', '2015-02-16 12:40:36', 1, 5),
(3, '1', 'JJ Royal Cafe', 'jj-royal-cafe', '0000-00-00 00:00:00', 'Bandara Internasional Soekarno Hatta Terminal II-D\r\nPajang\r\nTangerang, Kota Tgr, Banten 19120', '-6.122193', '106.652577', '', '', '2015-02-16 12:42:57', 1, 6),
(4, '1', 'JJ Royal Brasserie Branch', 'jj-royal-brasserie-branch', '0000-00-00 00:00:00', 'Lotte Shopping Avenue', '-6.22426', '106.652577', '', '', '2015-03-16 13:45:31', 0, 3),
(6, '1', 'JJ Royal Pacific Place', 'jj-royal-pacific-place', '0000-00-00 00:00:00', 'Kem Chicks\r\nPacific Place', '-6.217613', '106.812729', '', '', '2015-03-16 14:28:04', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location_city`
--

CREATE TABLE IF NOT EXISTS `tbl_location_city` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `category_alias` text NOT NULL,
  `category_description` text NOT NULL,
  `category_active` varchar(10) NOT NULL,
  `category_visibility` varchar(10) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `category_order` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_location_city`
--

INSERT INTO `tbl_location_city` (`category_id`, `category_name`, `category_alias`, `category_description`, `category_active`, `category_visibility`, `meta_description`, `meta_keyword`, `category_order`) VALUES
(1, 'DKI Jakarta', 'dki-jakarta', '', 'Inactive', 'Yes', '', '', 1),
(2, 'Bogor', 'bogor', '', 'Active', 'Yes', '', '', 2),
(3, 'Depok', 'depok', '', 'Active', 'Yes', '', '', 3),
(4, 'Tangerang', 'tangerang', '', 'Active', 'Yes', '', '', 4),
(5, 'Bekasi', 'bekasi', '', 'Active', 'Yes', '', '', 5),
(6, 'Bandung', 'bandung', '', 'Active', 'Yes', '', '', 6),
(7, 'Semarang', 'semarang', '', 'Active', 'Yes', '', '', 7),
(8, 'Surabaya', 'surabaya', '', 'Active', 'Yes', '', '', 8),
(9, 'Bali', 'bali', '', 'Active', 'No', '', '', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE IF NOT EXISTS `tbl_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailchimp`
--

CREATE TABLE IF NOT EXISTS `tbl_mailchimp` (
  `mailchimp_id` int(11) NOT NULL AUTO_INCREMENT,
  `mailchimp_key` text NOT NULL,
  `mailchimp_list` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`mailchimp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_mailchimp`
--

INSERT INTO `tbl_mailchimp` (`mailchimp_id`, `mailchimp_key`, `mailchimp_list`, `status`) VALUES
(1, '5db0c649f403acd485bf3356d1f05fad-us6', '8158e705a0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailgun`
--

CREATE TABLE IF NOT EXISTS `tbl_mailgun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `counter` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_mailgun`
--

INSERT INTO `tbl_mailgun` (`id`, `date`, `counter`, `status`) VALUES
(1, '2015-03-26', 28, 1),
(2, '2015-03-30', 13, 1),
(3, '2015-04-01', 4, 1),
(4, '2015-04-03', 13, 1),
(5, '2015-04-04', 15, 1),
(6, '2015-04-07', 1, 1),
(7, '2015-04-14', 2, 1),
(8, '2015-04-20', 1, 1),
(9, '2015-04-29', 7, 1),
(10, '2015-05-04', 5, 1),
(11, '2015-06-08', 2, 1),
(12, '2015-07-03', 1, 1),
(13, '2015-08-10', 3, 1),
(14, '2015-08-11', 4, 1),
(15, '2015-08-12', 57, 1),
(16, '2015-08-13', 131, 1),
(17, '2015-08-29', 8, 1),
(18, '2015-08-31', 15, 1),
(19, '2015-09-01', 20, 1),
(20, '2015-09-02', 4, 1),
(21, '2015-09-03', 11, 1),
(22, '2015-09-04', 2, 1),
(23, '2015-09-07', 1, 1),
(24, '2015-09-08', 59, 1),
(25, '2015-09-09', 5, 1),
(26, '2015-09-10', 4, 1),
(27, '2015-09-11', 22, 1),
(28, '2015-09-15', 2, 1),
(29, '2015-09-27', 2, 1),
(30, '2015-10-21', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailgun_info`
--

CREATE TABLE IF NOT EXISTS `tbl_mailgun_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `api_key` text NOT NULL,
  `domain` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_mailgun_info`
--

INSERT INTO `tbl_mailgun_info` (`id`, `api_key`, `domain`, `status`) VALUES
(1, 'key-19e4b2974cf0afb42a2c48b3cc61e5b9', 'antikode.com', 1),
(2, 'key-19e4b2974cf0afb42a2c48b3cc61e5b9', 'antikode.com', 1),
(3, 'key-19e4b2974cf0afb42a2c48b3cc61e5b9', 'antikode.com', 1),
(4, 'key-19e4b2974cf0afb42a2c48b3cc61e5b9', 'antikode.com', 1),
(5, 'key-19e4b2974cf0afb42a2c48b3cc61e5b9', 'antikode.com', 1),
(6, 'key-19e4b2974cf0afb42a2c48b3cc61e5b9', 'antikode.com', 1),
(7, 'key-19e4b2974cf0afb42a2c48b3cc61e5b9', 'antikode.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_category` varchar(50) NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `news_alias` text NOT NULL,
  `news_date` datetime NOT NULL,
  `news_image` text NOT NULL,
  `news_excerpt` text NOT NULL,
  `news_content` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `news_created_date` datetime NOT NULL,
  `news_visibility` int(11) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_category`, `news_title`, `news_alias`, `news_date`, `news_image`, `news_excerpt`, `news_content`, `meta_description`, `meta_keywords`, `news_created_date`, `news_visibility`) VALUES
(1, '1', 'Acara', 'acara', '2015-09-04 00:00:00', '/files/uploads/news-image/news-15-09-04-04-40-38-acara.jpg', 'Excerpt Acara', 'Content&nbsp;Acara', 'Description Acara', 'Keywords, Acara', '2015-09-04 15:13:23', 1),
(2, '2', 'Acara Lalu', 'acara-lalu', '2015-09-01 00:00:00', 'files/uploads/news-image/news-04-09-15-16-39-00-news-1.jpg', 'Excerpt Acara Lalu', 'Content&nbsp;Acara Lalu', 'Description Acara Lalu', 'Keywords, Acara Lalu', '2015-09-04 16:39:00', 1),
(3, '1', 'Berita Terkini', 'berita-terkini', '2015-09-04 21:59:21', 'files/uploads/news-image/news-04-09-15-21-59-21-gallery-1.jpg', 'Excerpt Berita Terkini', 'Content&nbsp;Berita Terkini', 'Page Description Berita Terkini', 'Keywords, Berita Terkini', '2015-09-04 21:59:21', 1),
(4, '2', 'TES', 'tes', '2015-11-19 05:51:50', 'files/uploads/news-image/news-05-11-15-05-51-51-news-2.jpg', 'Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...', 'Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...<br />\r\n<br />\r\n<img alt="" src="http://localhost/fira/files/uploads/images/images/news-2.jpg" style="width: 802px; height: 600px;" />Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...', '', '', '2015-11-05 05:51:50', 1),
(5, '1', 'Lorem Ipsum Dolor Sit', 'lorem-ipsum-dolor-sit', '2015-11-10 12:27:16', 'files/uploads/news-image/news-05-11-15-12-27-16-news-3.jpg', 'Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...', 'Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...<br />\r\n<img alt="" src="http://localhost/fira/files/uploads/images/images/news-3.jpg" style="width: 802px; height: 600px;" /><br />\r\nBeing the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...', '', '', '2015-11-05 12:27:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_category`
--

CREATE TABLE IF NOT EXISTS `tbl_news_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `category_alias` text NOT NULL,
  `category_description` text NOT NULL,
  `category_active` varchar(10) NOT NULL,
  `category_visibility` varchar(10) NOT NULL,
  `meta_descriptions` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `category_order` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_news_category`
--

INSERT INTO `tbl_news_category` (`category_id`, `category_name`, `category_alias`, `category_description`, `category_active`, `category_visibility`, `meta_descriptions`, `meta_keyword`, `category_order`) VALUES
(1, 'Blog', 'blog', '', 'Active', 'Yes', '', '', 1),
(2, 'Press Kit', 'press-kit', '', 'Active', 'Yes', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_category_lang`
--

CREATE TABLE IF NOT EXISTS `tbl_news_category_lang` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_param` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_alias` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `category_active` varchar(10) NOT NULL,
  `category_visibility` varchar(10) NOT NULL,
  `meta_descriptions` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `category_order` int(11) NOT NULL,
  `language_code` varchar(5) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_news_category_lang`
--

INSERT INTO `tbl_news_category_lang` (`category_id`, `id_param`, `category_name`, `category_alias`, `category_description`, `category_active`, `category_visibility`, `meta_descriptions`, `meta_keyword`, `category_order`, `language_code`) VALUES
(1, 1, 'Event', 'event', '', 'Active', 'Yes', '', '', 1, 'EN'),
(2, 2, 'Archive', 'archive', '', 'Active', 'Yes', '', '', 2, 'EN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_lang`
--

CREATE TABLE IF NOT EXISTS `tbl_news_lang` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_param_news` int(11) NOT NULL,
  `news_category` varchar(50) NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `news_alias` text NOT NULL,
  `news_date` varchar(20) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `news_excerpt` text NOT NULL,
  `news_content` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `news_created_date` date NOT NULL,
  `news_visibility` varchar(10) NOT NULL,
  `language_code` varchar(5) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_news_lang`
--

INSERT INTO `tbl_news_lang` (`news_id`, `id_param_news`, `news_category`, `news_title`, `news_alias`, `news_date`, `news_image`, `news_excerpt`, `news_content`, `meta_description`, `meta_keywords`, `news_created_date`, `news_visibility`, `language_code`) VALUES
(1, 1, '1', 'Testing', 'testing', '2015-09-04', '/files/uploads/news-image/news-15-09-04-04-40-38-acara.jpg', 'excerpt', 'content', 'description', 'keywords, Testing', '2015-09-04', '1', 'EN'),
(2, 2, '2', 'Acara Lalu', 'acara-lalu', '2015-09-01', 'files/uploads/news-image/news-04-09-15-16-39-00-news-1.jpg', 'Excerpt Acara Lalu', 'Content&nbsp;Acara Lalu', 'Description Acara Lalu', 'Keywords, Acara Lalu', '2015-09-04', '1', 'EN'),
(3, 3, '1', 'Latest News', 'latest-news', '2015-09-04 21:59:21', 'files/uploads/news-image/news-04-09-15-21-59-21-gallery-1.jpg', 'Excerpt Latest News', 'Content&nbsp;Latest News', 'Page Description Latest News', 'Keywords, Latest News', '2015-09-04', '1', 'EN'),
(4, 5, '1', 'Lorem Ipsum Dolor Sit', 'lorem-ipsum-dolor-sit', '2015-11-10 12:27:16', 'files/uploads/news-image/news-05-11-15-12-27-16-news-3.jpg', 'Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...', 'Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...<br />\r\n<img alt="" src="http://localhost/fira/files/uploads/images/images/news-3.jpg" style="width: 802px; height: 600px;" /><br />\r\nBeing the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while Being the savage&#39;s bowsman, that is, the person who pulled the bow-oar in his boat (the second one from forward), it was my cheerful duty to attend upon him while...', '', '', '2015-11-05', '1', 'EN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE IF NOT EXISTS `tbl_notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_logo` text NOT NULL,
  `email_order` varchar(100) NOT NULL,
  `email_warehouse` varchar(100) NOT NULL,
  `email_security` text NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `email_logo`, `email_order`, `email_warehouse`, `email_security`) VALUES
(1, 'files/uploads/assets/email-logo-bionic-organic-logo-main.png', 'dimas@antikode.com', 'dimas@antikode.com', 'dimas@antikode.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slideshow`
--

CREATE TABLE IF NOT EXISTS `tbl_slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` text NOT NULL,
  `link` text NOT NULL,
  `order_` int(11) NOT NULL,
  `flag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_slideshow`
--

INSERT INTO `tbl_slideshow` (`id`, `filename`, `link`, `order_`, `flag`) VALUES
(1, 'files/uploads/slideshow/slideshow-25-09-15-16-33-56-img-banner-1.jpg', 'http://www.facebook.com', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timezone`
--

CREATE TABLE IF NOT EXISTS `tbl_timezone` (
  `id` int(11) NOT NULL,
  `timezone` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_timezone`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE IF NOT EXISTS `tbl_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `token` text NOT NULL,
  `description` varchar(100) NOT NULL,
  `parameter` varchar(12) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_token`
--

INSERT INTO `tbl_token` (`id`, `type`, `token`, `description`, `parameter`, `created_date`, `modified_date`) VALUES
(18, 1, '$255Xc5CTZ/AY', 'dimas@antikode.com', 'kiUmvwWHQRBd', '2015-11-05 08:59:07', '0000-00-00 00:00:00'),
(19, 1, '$255Xc5CTZ/AY', 'dimas@antikode.com', 'kiUmvwWHQRBd', '2015-11-05 08:59:38', '0000-00-00 00:00:00');
