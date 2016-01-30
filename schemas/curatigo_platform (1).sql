-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2015 at 12:00 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `curatigo_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_setting`
--

CREATE TABLE IF NOT EXISTS `admin_setting` (
`id` int(11) unsigned NOT NULL,
  `collection_max_num_per_users` int(20) NOT NULL,
  `collection_max_num_products` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(11) NOT NULL DEFAULT '0',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_description` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(11) NOT NULL DEFAULT '0',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_description`, `status`, `deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 'Electronics', 'lots of products ', 1, 0, '0000-00-00 00:00:00', 0),
(2, 'Phone', 'vdhfsdfvhsdvfhsdhfhvsdhfsdvfvhsfj', 1, 0, '0000-00-00 00:00:00', 0),
(3, 'samsung', 'sdsdsdsds', 1, 0, '0000-00-00 00:00:00', 0),
(4, 'jewellery', 'sdjfdbfdsbjfdsbjkfsfddbjkbjfsdbjksdbjk', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `city_state` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1624 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_state`) VALUES
(1, 'Kolhapur', '17'),
(2, 'Port Blair', 'Andaman and Nicobar Islands'),
(3, 'Adilabad', '1'),
(4, 'Adoni', '1'),
(5, 'Amadalavalasa', '1'),
(6, 'Amalapuram', '1'),
(7, 'Anakapalle', '1'),
(8, 'Anantapur', '1'),
(9, 'Badepalle', '1'),
(10, 'Banganapalle', '1'),
(11, 'Bapatla', '1'),
(12, 'Bellampalle', '1'),
(13, 'Bethamcherla', '1'),
(14, 'Bhadrachalam', '1'),
(15, 'Bhainsa', '1'),
(16, 'Bheemunipatnam', '1'),
(17, 'Bhimavaram', '1'),
(18, 'Bhongir', '1'),
(19, 'Bobbili', '1'),
(20, 'Bodhan', '1'),
(21, 'Chilakaluripet', '1'),
(22, 'Chirala', '1'),
(23, 'Chittoor', '1'),
(24, 'Cuddapah', '1'),
(25, 'Devarakonda', '1'),
(26, 'Dharmavaram', '1'),
(27, 'Eluru', '1'),
(28, 'Farooqnagar', '1'),
(29, 'Gadwal', '1'),
(30, 'Gooty', '1'),
(31, 'Gudivada', '1'),
(32, 'Gudur', '1'),
(33, 'Guntakal', '1'),
(34, 'Guntur', '1'),
(35, 'Hanuman Junction', '1'),
(36, 'Hindupur', '1'),
(37, 'Hyderabad', '1'),
(38, 'Ichchapuram', '1'),
(39, 'Jaggaiahpet', '1'),
(40, 'Jagtial', '1'),
(41, 'Jammalamadugu', '1'),
(42, 'Jangaon', '1'),
(43, 'Kadapa', '1'),
(44, 'Kadiri', '1'),
(45, 'Kagaznagar', '1'),
(46, 'Kakinada', '1'),
(47, 'Kalyandurg', '1'),
(48, 'Kamareddy', '1'),
(49, 'Kandukur', '1'),
(50, 'Karimnagar', '1'),
(51, 'Kavali', '1'),
(52, 'Khammam', '1'),
(53, 'Koratla', '1'),
(54, 'Kothagudem', '1'),
(55, 'Kothapeta', '1'),
(56, 'Kovvur', '1'),
(57, 'Kurnool', '1'),
(58, 'Kyathampalle', '1'),
(59, 'Macherla', '1'),
(60, 'Machilipatnam', '1'),
(61, 'Madanapalle', '1'),
(62, 'Mahbubnagar', '1'),
(63, 'Mancherial', '1'),
(64, 'Mandamarri', '1'),
(65, 'Mandapeta', '1'),
(66, 'Manuguru', '1'),
(67, 'Markapur', '1'),
(68, 'Medak', '1'),
(69, 'Miryalaguda', '1'),
(70, 'Mogalthur', '1'),
(71, 'Nagari', '1'),
(72, 'Nagarkurnool', '1'),
(73, 'Nandyal', '1'),
(74, 'Narasapur', '1'),
(75, 'Narasaraopet', '1'),
(76, 'Narayanpet', '1'),
(77, 'Narsipatnam', '1'),
(78, 'Nellore', '1'),
(79, 'Nidadavole', '1'),
(80, 'Nirmal', '1'),
(81, 'Nizamabad', '1'),
(82, 'Nuzvid', '1'),
(83, 'Ongole', '1'),
(84, 'Palacole', '1'),
(85, 'Palasa Kasibugga', '1'),
(86, 'Palwancha', '1'),
(87, 'Parvathipuram', '1'),
(88, 'Pedana', '1'),
(89, 'Peddapuram', '1'),
(90, 'Pithapuram', '1'),
(91, 'Pondur', '1'),
(92, 'Ponnur', '1'),
(93, 'Proddatur', '1'),
(94, 'Punganur', '1'),
(95, 'Puttur', '1'),
(96, 'Rajahmundry', '1'),
(97, 'Rajam', '1'),
(98, 'Ramachandrapuram', '1'),
(99, 'Ramagundam', '1'),
(100, 'Rayachoti', '1'),
(101, 'Rayadurg', '1'),
(102, 'Renigunta', '1'),
(103, 'Repalle', '1'),
(104, 'Sadasivpet', '1'),
(105, 'Salur', '1'),
(106, 'Samalkot', '1'),
(107, 'Sangareddy', '1'),
(108, 'Sattenapalle', '1'),
(109, 'Siddipet', '1'),
(110, 'Singapur', '1'),
(111, 'Sircilla', '1'),
(112, 'Srikakulam', '1'),
(113, 'Srikalahasti', '1'),
(115, 'Suryapet', '1'),
(116, 'Tadepalligudem', '1'),
(117, 'Tadpatri', '1'),
(118, 'Tandur', '1'),
(119, 'Tanuku', '1'),
(120, 'Tenali', '1'),
(121, 'Tirupati', '1'),
(122, 'Tuni', '1'),
(123, 'Uravakonda', '1'),
(124, 'Venkatagiri', '1'),
(125, 'Vicarabad', '1'),
(126, 'Vijayawada', '1'),
(127, 'Vinukonda', '1'),
(128, 'Visakhapatnam', '1'),
(129, 'Vizianagaram', '1'),
(130, 'Wanaparthy', '1'),
(131, 'Warangal', '1'),
(132, 'Yellandu', '1'),
(133, 'Yemmiganur', '1'),
(134, 'Yerraguntla', '1'),
(135, 'Zahirabad', '1'),
(136, 'Rajampet', 'Andra Pradesh'),
(137, 'Along', '2'),
(138, 'Bomdila', '2'),
(139, 'Itanagar', '2'),
(140, 'Naharlagun', '2'),
(141, 'Pasighat', '2'),
(142, 'Abhayapuri', '3'),
(143, 'Amguri', '3'),
(144, 'Anandnagaar', '3'),
(145, 'Barpeta', '3'),
(146, 'Barpeta Road', '3'),
(147, 'Bilasipara', '3'),
(148, 'Bongaigaon', '3'),
(149, 'Dhekiajuli', '3'),
(150, 'Dhubri', '3'),
(151, 'Dibrugarh', '3'),
(152, 'Digboi', '3'),
(153, 'Diphu', '3'),
(154, 'Dispur', '3'),
(156, 'Gauripur', '3'),
(157, 'Goalpara', '3'),
(158, 'Golaghat', '3'),
(159, 'Guwahati', '3'),
(160, 'Haflong', '3'),
(161, 'Hailakandi', '3'),
(162, 'Hojai', '3'),
(163, 'Jorhat', '3'),
(164, 'Karimganj', '3'),
(165, 'Kokrajhar', '3'),
(166, 'Lanka', '3'),
(167, 'Lumding', '3'),
(168, 'Mangaldoi', '3'),
(169, 'Mankachar', '3'),
(170, 'Margherita', '3'),
(171, 'Mariani', '3'),
(172, 'Marigaon', '3'),
(173, 'Nagaon', '3'),
(174, 'Nalbari', '3'),
(175, 'North Lakhimpur', '3'),
(176, 'Rangia', '3'),
(177, 'Sibsagar', '3'),
(178, 'Silapathar', '3'),
(179, 'Silchar', '3'),
(180, 'Tezpur', '3'),
(181, 'Tinsukia', '3'),
(182, 'Amarpur', '4'),
(183, 'Araria', '4'),
(184, 'Areraj', '4'),
(185, 'Arrah', '4'),
(186, 'Asarganj', '4'),
(187, 'Aurangabad', '4'),
(188, 'Bagaha', '4'),
(189, 'Bahadurganj', '4'),
(190, 'Bairgania', '4'),
(191, 'Bakhtiarpur', '4'),
(192, 'Banka', '4'),
(193, 'Banmankhi Bazar', '4'),
(194, 'Barahiya', '4'),
(195, 'Barauli', '4'),
(196, 'Barbigha', '4'),
(197, 'Barh', '4'),
(198, 'Begusarai', '4'),
(199, 'Behea', '4'),
(200, 'Bettiah', '4'),
(201, 'Bhabua', '4'),
(202, 'Bhagalpur', '4'),
(203, 'Bihar Sharif', '4'),
(204, 'Bikramganj', '4'),
(205, 'Bodh Gaya', '4'),
(206, 'Buxar', '4'),
(207, 'Chandan Bara', '4'),
(208, 'Chanpatia', '4'),
(209, 'Chhapra', '4'),
(210, 'Colgong', '4'),
(211, 'Dalsinghsarai', '4'),
(212, 'Darbhanga', '4'),
(213, 'Daudnagar', '4'),
(214, 'Dehri-on-Sone', '4'),
(215, 'Dhaka', '4'),
(216, 'Dighwara', '4'),
(217, 'Dumraon', '4'),
(218, 'Fatwah', '4'),
(219, 'Forbesganj', '4'),
(220, 'Gaya', '4'),
(221, 'Gogri Jamalpur', '4'),
(222, 'Gopalganj', '4'),
(223, 'Hajipur', '4'),
(224, 'Hilsa', '4'),
(225, 'Hisua', '4'),
(226, 'Islampur', '4'),
(227, 'Jagdispur', '4'),
(228, 'Jamalpur', '4'),
(229, 'Jamui', '4'),
(230, 'Jehanabad', '4'),
(231, 'Jhajha', '4'),
(232, 'Jhanjharpur', '4'),
(233, 'Jogabani', '4'),
(234, 'Kanti', '4'),
(235, 'Katihar', '4'),
(236, 'Khagaria', '4'),
(237, 'Kharagpur', '4'),
(238, 'Kishanganj', '4'),
(239, 'Lakhisarai', '4'),
(240, 'Lalganj', '4'),
(241, 'Madhepura', '4'),
(242, 'Madhubani', '4'),
(243, 'Maharajganj', '4'),
(244, 'Mahnar Bazar', '4'),
(245, 'Makhdumpur', '4'),
(246, 'Maner', '4'),
(247, 'Manihari', '4'),
(248, 'Marhaura', '4'),
(249, 'Masaurhi', '4'),
(250, 'Mirganj', '4'),
(251, 'Mokameh', '4'),
(252, 'Motihari', '4'),
(253, 'Motipur', '4'),
(254, 'Munger', '4'),
(255, 'Murliganj', '4'),
(256, 'Muzaffarpur', '4'),
(257, 'Narkatiaganj', '4'),
(258, 'Naugachhia', '4'),
(259, 'Nawada', '4'),
(260, 'Nokha', '4'),
(261, 'Patna', '4'),
(262, 'Piro', '4'),
(263, 'Purnia', '4'),
(264, 'Rafiganj', '4'),
(265, 'Rajgir', '4'),
(266, 'Ramnagar', '4'),
(267, 'Raxaul Bazar', '4'),
(268, 'Revelganj', '4'),
(269, 'Rosera', '4'),
(270, 'Saharsa', '4'),
(271, 'Samastipur', '4'),
(272, 'Sasaram', '4'),
(273, 'Sheikhpura', '4'),
(274, 'Sheohar', '4'),
(275, 'Sherghati', '4'),
(276, 'Silao', '4'),
(277, 'Sitamarhi', '4'),
(278, 'Siwan', '4'),
(279, 'Sonepur', '4'),
(280, 'Sugauli', '4'),
(281, 'Sultanganj', '4'),
(282, 'Supaul', '4'),
(283, 'Warisaliganj', '4'),
(284, 'Ahiwara', '6'),
(285, 'Akaltara', '6'),
(286, 'Ambagarh Chowki', '6'),
(287, 'Ambikapur', '6'),
(288, 'Arang', '6'),
(289, 'Bade Bacheli', '6'),
(290, 'Balod', '6'),
(291, 'Baloda Bazar', '6'),
(292, 'Bemetra', '6'),
(293, 'Bhatapara', '6'),
(294, 'Bilaspur', '6'),
(295, 'Birgaon', '6'),
(296, 'Champa', '6'),
(297, 'Chirmiri', '6'),
(298, 'Dalli-Rajhara', '6'),
(299, 'Dhamtari', '6'),
(300, 'Dipka', '6'),
(301, 'Dongargarh', '6'),
(302, 'Durg-Bhilai Nagar', '6'),
(303, 'Gobranawapara', '6'),
(304, 'Jagdalpur', '6'),
(305, 'Janjgir', '6'),
(306, 'Jashpurnagar', '6'),
(307, 'Kanker', '6'),
(308, 'Kawardha', '6'),
(309, 'Kondagaon', '6'),
(310, 'Korba', '6'),
(311, 'Mahasamund', '6'),
(312, 'Mahendragarh', '6'),
(313, 'Mungeli', '6'),
(314, 'Naila Janjgir', '6'),
(315, 'Raigarh', '6'),
(316, 'Raipur', '6'),
(317, 'Rajnandgaon', '6'),
(318, 'Sakti', '6'),
(319, 'Tilda Newra', '6'),
(320, 'Amli', 'Dadra & Nagar Haveli'),
(321, 'Silvassa', 'Dadra and Nagar Haveli'),
(322, 'Daman and Diu', 'Daman & Diu'),
(323, 'Daman and Diu', 'Daman & Diu'),
(324, 'Asola', '7'),
(325, 'Delhi', '7'),
(326, 'Aldona', '8'),
(327, 'Curchorem Cacora', '8'),
(328, 'Madgaon', '8'),
(329, 'Mapusa', '8'),
(330, 'Margao', '8'),
(331, 'Marmagao', '8'),
(332, 'Panaji', '8'),
(333, 'Ahmedabad', '9'),
(334, 'Amreli', '9'),
(335, 'Anand', '9'),
(336, 'Ankleshwar', '9'),
(337, 'Bharuch', '9'),
(338, 'Bhavnagar', '9'),
(339, 'Bhuj', '9'),
(340, 'Cambay', '9'),
(341, 'Dahod', '9'),
(342, 'Deesa', '9'),
(343, '"Dharampur', ' India"'),
(344, 'Dholka', '9'),
(345, 'Gandhinagar', '9'),
(346, 'Godhra', '9'),
(347, 'Himatnagar', '9'),
(348, 'Idar', '9'),
(349, 'Jamnagar', '9'),
(350, 'Junagadh', '9'),
(351, 'Kadi', '9'),
(352, 'Kalavad', '9'),
(353, 'Kalol', '9'),
(354, 'Kapadvanj', '9'),
(355, 'Karjan', '9'),
(356, 'Keshod', '9'),
(357, 'Khambhalia', '9'),
(358, 'Khambhat', '9'),
(359, 'Kheda', '9'),
(360, 'Khedbrahma', '9'),
(361, 'Kheralu', '9'),
(362, 'Kodinar', '9'),
(363, 'Lathi', '9'),
(364, 'Limbdi', '9'),
(365, 'Lunawada', '9'),
(366, 'Mahesana', '9'),
(367, 'Mahuva', '9'),
(368, 'Manavadar', '9'),
(369, 'Mandvi', '9'),
(370, 'Mangrol', '9'),
(371, 'Mansa', '9'),
(372, 'Mehmedabad', '9'),
(373, 'Modasa', '9'),
(374, 'Morvi', '9'),
(375, 'Nadiad', '9'),
(376, 'Navsari', '9'),
(377, 'Padra', '9'),
(378, 'Palanpur', '9'),
(379, 'Palitana', '9'),
(380, 'Pardi', '9'),
(381, 'Patan', '9'),
(382, 'Petlad', '9'),
(383, 'Porbandar', '9'),
(384, 'Radhanpur', '9'),
(385, 'Rajkot', '9'),
(386, 'Rajpipla', '9'),
(387, 'Rajula', '9'),
(388, 'Ranavav', '9'),
(389, 'Rapar', '9'),
(390, 'Salaya', '9'),
(391, 'Sanand', '9'),
(392, 'Savarkundla', '9'),
(393, 'Sidhpur', '9'),
(394, 'Sihor', '9'),
(395, 'Songadh', '9'),
(396, 'Surat', '9'),
(397, 'Talaja', '9'),
(398, 'Thangadh', '9'),
(399, 'Tharad', '9'),
(400, 'Umbergaon', '9'),
(401, 'Umreth', '9'),
(402, 'Una', '9'),
(403, 'Unjha', '9'),
(404, 'Upleta', '9'),
(405, 'Vadnagar', '9'),
(406, 'Vadodara', '9'),
(407, 'Valsad', '9'),
(408, 'Vapi', '9'),
(409, 'Vapi', '9'),
(410, 'Veraval', '9'),
(411, 'Vijapur', '9'),
(412, 'Viramgam', '9'),
(413, 'Visnagar', '9'),
(414, 'Vyara', '9'),
(415, 'Wadhwan', '9'),
(416, 'Wankaner', '9'),
(417, 'Adalaj', 'Gujrat'),
(418, 'Adityana', 'Gujrat'),
(419, 'Alang', 'Gujrat'),
(420, 'Ambaji', 'Gujrat'),
(421, 'Ambaliyasan', 'Gujrat'),
(422, 'Andada', 'Gujrat'),
(423, 'Anjar', 'Gujrat'),
(424, 'Anklav', 'Gujrat'),
(425, 'Antaliya', 'Gujrat'),
(426, 'Arambhada', 'Gujrat'),
(427, 'Atul', 'Gujrat'),
(428, 'Ballabhgarh', 'Hariyana'),
(429, 'Ambala', '10'),
(430, 'Ambala', '10'),
(431, 'Asankhurd', '10'),
(432, 'Assandh', '10'),
(433, 'Ateli', '10'),
(434, 'Babiyal', '10'),
(435, 'Bahadurgarh', '10'),
(436, 'Barwala', '10'),
(437, 'Bhiwani', '10'),
(438, 'Charkhi Dadri', '10'),
(439, 'Cheeka', '10'),
(440, 'Ellenabad 2', '10'),
(441, 'Faridabad', '10'),
(442, 'Fatehabad', '10'),
(443, 'Ganaur', '10'),
(444, 'Gharaunda', '10'),
(445, 'Gohana', '10'),
(446, 'Gurgaon', '10'),
(447, 'Haibat(Yamuna Nagar)', '10'),
(448, 'Hansi', '10'),
(449, 'Hisar', '10'),
(450, 'Hodal', '10'),
(451, 'Jhajjar', '10'),
(452, 'Jind', '10'),
(453, 'Kaithal', '10'),
(454, 'Kalan Wali', '10'),
(455, 'Kalka', '10'),
(456, 'Karnal', '10'),
(457, 'Ladwa', '10'),
(458, 'Mahendragarh', '10'),
(459, 'Mandi Dabwali', '10'),
(460, 'Narnaul', '10'),
(461, 'Narwana', '10'),
(462, 'Palwal', '10'),
(463, 'Panchkula', '10'),
(464, 'Panipat', '10'),
(465, 'Pehowa', '10'),
(466, 'Pinjore', '10'),
(467, 'Rania', '10'),
(468, 'Ratia', '10'),
(469, 'Rewari', '10'),
(470, 'Rohtak', '10'),
(471, 'Safidon', '10'),
(472, 'Samalkha', '10'),
(473, 'Shahbad', '10'),
(474, 'Sirsa', '10'),
(475, 'Sohna', '10'),
(476, 'Sonipat', '10'),
(477, 'Taraori', '10'),
(478, 'Thanesar', '10'),
(479, 'Tohana', '10'),
(480, 'Yamunanagar', '10'),
(481, 'Arki', '11'),
(482, 'Baddi', '11'),
(483, 'Bilaspur', '11'),
(484, 'Chamba', '11'),
(485, 'Dalhousie', '11'),
(486, 'Dharamsala', '11'),
(487, 'Hamirpur', '11'),
(488, 'Mandi', '11'),
(489, 'Nahan', '11'),
(490, 'Shimla', '11'),
(491, 'Solan', '11'),
(492, 'Sundarnagar', '11'),
(493, 'Jammu', 'Jammu & Kashmir'),
(494, 'Achabbal', '12'),
(495, 'Akhnoor', '12'),
(496, 'Anantnag', '12'),
(497, 'Arnia', '12'),
(498, 'Awantipora', '12'),
(499, 'Bandipore', '12'),
(500, 'Baramula', '12'),
(501, 'Kathua', '12'),
(502, 'Leh', '12'),
(503, 'Punch', '12'),
(504, 'Rajauri', '12'),
(505, 'Sopore', '12'),
(506, 'Srinagar', '12'),
(507, 'Udhampur', '12'),
(508, 'Amlabad', '13'),
(509, 'Ara', '13'),
(510, 'Barughutu', '13'),
(511, 'Bokaro Steel City', '13'),
(512, 'Chaibasa', '13'),
(513, 'Chakradharpur', '13'),
(514, 'Chandrapura', '13'),
(515, 'Chatra', '13'),
(516, 'Chirkunda', '13'),
(517, 'Churi', '13'),
(518, 'Daltonganj', '13'),
(519, 'Deoghar', '13'),
(520, 'Dhanbad', '13'),
(521, 'Dumka', '13'),
(522, 'Garhwa', '13'),
(523, 'Ghatshila', '13'),
(524, 'Giridih', '13'),
(525, 'Godda', '13'),
(526, 'Gomoh', '13'),
(527, 'Gumia', '13'),
(528, 'Gumla', '13'),
(529, 'Hazaribag', '13'),
(530, 'Hussainabad', '13'),
(531, 'Jamshedpur', '13'),
(532, 'Jamtara', '13'),
(533, 'Jhumri Tilaiya', '13'),
(534, 'Khunti', '13'),
(535, 'Lohardaga', '13'),
(536, 'Madhupur', '13'),
(537, 'Mihijam', '13'),
(538, 'Musabani', '13'),
(539, 'Pakaur', '13'),
(540, 'Patratu', '13'),
(541, 'Phusro', '13'),
(542, 'Ramngarh', '13'),
(543, 'Ranchi', '13'),
(544, 'Sahibganj', '13'),
(545, 'Saunda', '13'),
(546, 'Simdega', '13'),
(547, 'Tenu Dam-cum- Kathhara', '13'),
(548, 'Arasikere', '14'),
(549, 'Bangalore', '14'),
(550, 'Belgaum', '14'),
(551, 'Bellary', '14'),
(552, 'Chamrajnagar', '14'),
(553, 'Chikkaballapur', '14'),
(554, 'Chintamani', '14'),
(555, 'Chitradurga', '14'),
(556, 'Gulbarga', '14'),
(557, 'Gundlupet', '14'),
(558, 'Hassan', '14'),
(559, 'Hospet', '14'),
(560, 'Hubli', '14'),
(561, 'Karkala', '14'),
(562, 'Karwar', '14'),
(563, 'Kolar', '14'),
(564, 'Kota', '14'),
(565, 'Lakshmeshwar', '14'),
(566, 'Lingsugur', '14'),
(567, 'Maddur', '14'),
(568, 'Madhugiri', '14'),
(569, 'Madikeri', '14'),
(570, 'Magadi', '14'),
(571, 'Mahalingpur', '14'),
(572, 'Malavalli', '14'),
(573, 'Malur', '14'),
(574, 'Mandya', '14'),
(575, 'Mangalore', '14'),
(576, 'Manvi', '14'),
(577, 'Mudalgi', '14'),
(578, 'Mudbidri', '14'),
(579, 'Muddebihal', '14'),
(580, 'Mudhol', '14'),
(581, 'Mulbagal', '14'),
(582, 'Mundargi', '14'),
(583, 'Mysore', '14'),
(584, 'Nanjangud', '14'),
(585, 'Pavagada', '14'),
(586, 'Puttur', '14'),
(587, 'Rabkavi Banhatti', '14'),
(588, 'Raichur', '14'),
(589, 'Ramanagaram', '14'),
(590, 'Ramdurg', '14'),
(591, 'Ranibennur', '14'),
(592, 'Robertson Pet', '14'),
(593, 'Ron', '14'),
(594, 'Sadalgi', '14'),
(595, 'Sagar', '14'),
(596, 'Sakleshpur', '14'),
(597, 'Sandur', '14'),
(598, 'Sankeshwar', '14'),
(599, 'Saundatti-Yellamma', '14'),
(600, 'Savanur', '14'),
(601, 'Sedam', '14'),
(602, 'Shahabad', '14'),
(603, 'Shahpur', '14'),
(604, 'Shiggaon', '14'),
(605, 'Shikapur', '14'),
(606, 'Shimoga', '14'),
(607, 'Shorapur', '14'),
(608, 'Shrirangapattana', '14'),
(609, 'Sidlaghatta', '14'),
(610, 'Sindgi', '14'),
(611, 'Sindhnur', '14'),
(612, 'Sira', '14'),
(613, 'Sirsi', '14'),
(614, 'Siruguppa', '14'),
(615, 'Srinivaspur', '14'),
(616, 'Talikota', '14'),
(617, 'Tarikere', '14'),
(618, 'Tekkalakota', '14'),
(619, 'Terdal', '14'),
(620, 'Tiptur', '14'),
(621, 'Tumkur', '14'),
(622, 'Udupi', '14'),
(623, 'Vijayapura', '14'),
(624, 'Wadi', '14'),
(625, 'Yadgir', '14'),
(626, 'Adoor', '15'),
(627, 'Akathiyoor', '15'),
(628, 'Alappuzha', '15'),
(629, 'Ancharakandy', '15'),
(630, 'Aroor', '15'),
(631, 'Ashtamichira', '15'),
(632, 'Attingal', '15'),
(633, 'Avinissery', '15'),
(634, 'Chalakudy', '15'),
(635, 'Changanassery', '15'),
(636, 'Chendamangalam', '15'),
(637, 'Chengannur', '15'),
(638, 'Cherthala', '15'),
(639, 'Cheruthazham', '15'),
(640, 'Chittur-Thathamangalam', '15'),
(641, 'Chockli', '15'),
(642, 'Erattupetta', '15'),
(643, 'Guruvayoor', '15'),
(644, 'Irinjalakuda', '15'),
(645, 'Kadirur', '15'),
(646, 'Kalliasseri', '15'),
(647, 'Kalpetta', '15'),
(648, 'Kanhangad', '15'),
(649, 'Kanjikkuzhi', '15'),
(650, 'Kannur', '15'),
(651, 'Kasaragod', '15'),
(652, 'Kayamkulam', '15'),
(653, 'Kochi', '15'),
(654, 'Kodungallur', '15'),
(655, 'Kollam', '15'),
(656, 'Koothuparamba', '15'),
(657, 'Kothamangalam', '15'),
(658, 'Kottayam', '15'),
(659, 'Kozhikode', '15'),
(660, 'Kunnamkulam', '15'),
(661, 'Malappuram', '15'),
(662, 'Mattannur', '15'),
(663, 'Mavelikkara', '15'),
(664, 'Mavoor', '15'),
(665, 'Muvattupuzha', '15'),
(666, 'Nedumangad', '15'),
(667, 'Neyyattinkara', '15'),
(668, 'Ottappalam', '15'),
(669, 'Palai', '15'),
(670, 'Palakkad', '15'),
(671, 'Panniyannur', '15'),
(672, 'Pappinisseri', '15'),
(673, 'Paravoor', '15'),
(674, 'Pathanamthitta', '15'),
(675, 'Payyannur', '15'),
(676, 'Peringathur', '15'),
(677, 'Perinthalmanna', '15'),
(678, 'Perumbavoor', '15'),
(679, 'Ponnani', '15'),
(680, 'Punalur', '15'),
(681, 'Quilandy', '15'),
(682, 'Shoranur', '15'),
(683, 'Taliparamba', '15'),
(684, 'Thiruvalla', '15'),
(685, 'Thiruvananthapuram', '15'),
(686, 'Thodupuzha', '15'),
(687, 'Thrissur', '15'),
(688, 'Tirur', '15'),
(689, 'Vadakara', '15'),
(690, 'Vaikom', '15'),
(691, 'Varkala', '15'),
(692, 'Kavaratti', 'Lakshadweep'),
(693, 'Ashok Nagar', '16'),
(694, 'Balaghat', '16'),
(695, 'Betul', '16'),
(696, 'Bhopal', '16'),
(697, 'Burhanpur', '16'),
(698, 'Chhatarpur', '16'),
(699, 'Dabra', '16'),
(700, 'Datia', '16'),
(701, 'Dewas', '16'),
(702, 'Dhar', '16'),
(703, 'Fatehabad', '16'),
(704, 'Gwalior', '16'),
(705, 'Indore', '16'),
(706, 'Itarsi', '16'),
(707, 'Jabalpur', '16'),
(708, 'Katni', '16'),
(709, 'Kotma', '16'),
(710, 'Lahar', '16'),
(711, 'Lundi', '16'),
(712, 'Maharajpur', '16'),
(713, 'Mahidpur', '16'),
(714, 'Maihar', '16'),
(715, 'Malajkhand', '16'),
(716, 'Manasa', '16'),
(717, 'Manawar', '16'),
(718, 'Mandideep', '16'),
(719, 'Mandla', '16'),
(720, 'Mandsaur', '16'),
(721, 'Mauganj', '16'),
(722, 'Mhow Cantonment', '16'),
(723, 'Mhowgaon', '16'),
(724, 'Morena', '16'),
(725, 'Multai', '16'),
(726, 'Murwara', '16'),
(727, 'Nagda', '16'),
(728, 'Nainpur', '16'),
(729, 'Narsinghgarh', '16'),
(730, 'Narsinghgarh', '16'),
(731, 'Neemuch', '16'),
(732, 'Nepanagar', '16'),
(733, 'Niwari', '16'),
(734, 'Nowgong', '16'),
(735, 'Nowrozabad', '16'),
(736, 'Pachore', '16'),
(737, 'Pali', '16'),
(738, 'Panagar', '16'),
(739, 'Pandhurna', '16'),
(740, 'Panna', '16'),
(741, 'Pasan', '16'),
(742, 'Pipariya', '16'),
(743, 'Pithampur', '16'),
(744, 'Porsa', '16'),
(745, 'Prithvipur', '16'),
(746, 'Raghogarh-Vijaypur', '16'),
(747, 'Rahatgarh', '16'),
(748, 'Raisen', '16'),
(749, 'Rajgarh', '16'),
(750, 'Ratlam', '16'),
(751, 'Rau', '16'),
(752, 'Rehli', '16'),
(753, 'Rewa', '16'),
(754, 'Sabalgarh', '16'),
(755, 'Sagar', '16'),
(756, 'Sanawad', '16'),
(757, 'Sarangpur', '16'),
(758, 'Sarni', '16'),
(759, 'Satna', '16'),
(760, 'Sausar', '16'),
(761, 'Sehore', '16'),
(762, 'Sendhwa', '16'),
(763, 'Seoni', '16'),
(764, 'Seoni-Malwa', '16'),
(765, 'Shahdol', '16'),
(766, 'Shajapur', '16'),
(767, 'Shamgarh', '16'),
(768, 'Sheopur', '16'),
(769, 'Shivpuri', '16'),
(770, 'Shujalpur', '16'),
(771, 'Sidhi', '16'),
(772, 'Sihora', '16'),
(773, 'Singrauli', '16'),
(774, 'Sironj', '16'),
(775, 'Sohagpur', '16'),
(776, 'Tarana', '16'),
(777, 'Tikamgarh', '16'),
(778, 'Ujhani', '16'),
(779, 'Ujjain', '16'),
(780, 'Umaria', '16'),
(781, 'Vidisha', '16'),
(782, 'Wara Seoni', '16'),
(783, 'Ahmednagar', '17'),
(784, 'Akola', '17'),
(785, 'Amravati', '17'),
(786, 'Aurangabad', '17'),
(787, 'Baramati', '17'),
(788, 'Chalisgaon', '17'),
(789, 'Chinchani', '17'),
(790, 'Devgarh', '17'),
(791, 'Dhule', '17'),
(792, 'Dombivli', '17'),
(793, 'Durgapur', '17'),
(794, 'Ichalkaranji', '17'),
(795, 'Jalna', '17'),
(796, 'Kalyan', '17'),
(797, 'Latur', '17'),
(798, 'Loha', '17'),
(799, 'Lonar', '17'),
(800, 'Lonavla', '17'),
(801, 'Mahad', '17'),
(802, 'Mahuli', '17'),
(803, 'Malegaon', '17'),
(804, 'Malkapur', '17'),
(805, 'Manchar', '17'),
(806, 'Mangalvedhe', '17'),
(807, 'Mangrulpir', '17'),
(808, 'Manjlegaon', '17'),
(809, 'Manmad', '17'),
(810, 'Manwath', '17'),
(811, 'Mehkar', '17'),
(812, 'Mhaswad', '17'),
(813, 'Miraj', '17'),
(814, 'Morshi', '17'),
(815, 'Mukhed', '17'),
(816, 'Mul', '17'),
(817, 'Mumbai', '17'),
(818, 'Murtijapur', '17'),
(819, 'Nagpur', '17'),
(820, 'Nalasopara', '17'),
(821, 'Nanded-Waghala', '17'),
(822, 'Nandgaon', '17'),
(823, 'Nandura', '17'),
(824, 'Nandurbar', '17'),
(825, 'Narkhed', '17'),
(826, 'Nashik', '17'),
(827, 'Navi Mumbai', '17'),
(828, 'Nawapur', '17'),
(829, 'Nilanga', '17'),
(830, 'Osmanabad', '17'),
(831, 'Ozar', '17'),
(832, 'Pachora', '17'),
(833, 'Paithan', '17'),
(834, 'Palghar', '17'),
(835, 'Pandharkaoda', '17'),
(836, 'Pandharpur', '17'),
(837, 'Panvel', '17'),
(838, 'Parbhani', '17'),
(839, 'Parli', '17'),
(840, 'Parola', '17'),
(841, 'Partur', '17'),
(842, 'Pathardi', '17'),
(843, 'Pathri', '17'),
(844, 'Patur', '17'),
(845, 'Pauni', '17'),
(846, 'Pen', '17'),
(847, 'Phaltan', '17'),
(848, 'Pulgaon', '17'),
(849, 'Pune', '17'),
(850, 'Purna', '17'),
(851, 'Pusad', '17'),
(852, 'Rahuri', '17'),
(853, 'Rajura', '17'),
(854, 'Ramtek', '17'),
(855, 'Ratnagiri', '17'),
(856, 'Raver', '17'),
(857, 'Risod', '17'),
(858, 'Sailu', '17'),
(859, 'Sangamner', '17'),
(860, 'Sangli', '17'),
(861, 'Sangole', '17'),
(862, 'Sasvad', '17'),
(863, 'Satana', '17'),
(864, 'Satara', '17'),
(865, 'Savner', '17'),
(866, 'Sawantwadi', '17'),
(867, 'Shahade', '17'),
(868, 'Shegaon', '17'),
(869, 'Shendurjana', '17'),
(870, 'Shirdi', '17'),
(871, 'Shirpur-Warwade', '17'),
(872, 'Shirur', '17'),
(873, 'Shrigonda', '17'),
(874, 'Shrirampur', '17'),
(875, 'Sillod', '17'),
(876, 'Sinnar', '17'),
(877, 'Solapur', '17'),
(878, 'Soyagaon', '17'),
(879, 'Talegaon Dabhade', '17'),
(880, 'Talode', '17'),
(881, 'Tasgaon', '17'),
(882, 'Tirora', '17'),
(883, 'Tuljapur', '17'),
(884, 'Tumsar', '17'),
(885, 'Uran', '17'),
(886, 'Uran Islampur', '17'),
(887, 'Wadgaon Road', '17'),
(888, 'Wai', '17'),
(889, 'Wani', '17'),
(890, 'Wardha', '17'),
(891, 'Warora', '17'),
(892, 'Warud', '17'),
(893, 'Washim', '17'),
(894, 'Yevla', '17'),
(895, 'Uchgaon', 'Maharastra'),
(896, 'Udgir', 'Maharastra'),
(897, 'Umarga', 'Maharastra'),
(898, 'Umarkhed', 'Maharastra'),
(899, 'Umred', 'Maharastra'),
(900, 'Vadgaon Kasba', 'Maharastra'),
(901, 'Vaijapur', 'Maharastra'),
(902, 'Vasai', 'Maharastra'),
(903, 'Virar', 'Maharastra'),
(904, 'Vita', 'Maharastra'),
(905, 'Yavatmal', 'Maharastra'),
(906, 'Yawal', 'Maharastra'),
(907, 'Imphal', '18'),
(908, 'Kakching', '18'),
(909, 'Lilong', '18'),
(910, 'Mayang Imphal', '18'),
(911, 'Thoubal', '18'),
(912, 'Jowai', '19'),
(913, 'Nongstoin', '19'),
(914, 'Shillong', '19'),
(915, 'Tura', '19'),
(916, 'Aizawl', '20'),
(917, 'Champhai', '20'),
(918, 'Lunglei', '20'),
(919, 'Saiha', '20'),
(920, 'Dimapur', '21'),
(921, 'Kohima', '21'),
(922, 'Mokokchung', '21'),
(923, 'Tuensang', '21'),
(924, 'Wokha', '21'),
(925, 'Zunheboto', '21'),
(950, 'Anandapur', '22'),
(951, 'Anugul', '22'),
(952, 'Asika', '22'),
(953, 'Balangir', '22'),
(954, 'Balasore', '22'),
(955, 'Baleshwar', '22'),
(956, 'Bamra', '22'),
(957, 'Barbil', '22'),
(958, 'Bargarh', '22'),
(959, 'Bargarh', '22'),
(960, 'Baripada', '22'),
(961, 'Basudebpur', '22'),
(962, 'Belpahar', '22'),
(963, 'Bhadrak', '22'),
(964, 'Bhawanipatna', '22'),
(965, 'Bhuban', '22'),
(966, 'Bhubaneswar', '22'),
(967, 'Biramitrapur', '22'),
(968, 'Brahmapur', '22'),
(969, 'Brajrajnagar', '22'),
(970, 'Byasanagar', '22'),
(971, 'Cuttack', '22'),
(972, 'Debagarh', '22'),
(973, 'Dhenkanal', '22'),
(974, 'Gunupur', '22'),
(975, 'Hinjilicut', '22'),
(976, 'Jagatsinghapur', '22'),
(977, 'Jajapur', '22'),
(978, 'Jaleswar', '22'),
(979, 'Jatani', '22'),
(980, 'Jeypur', '22'),
(981, 'Jharsuguda', '22'),
(982, 'Joda', '22'),
(983, 'Kantabanji', '22'),
(984, 'Karanjia', '22'),
(985, 'Kendrapara', '22'),
(986, 'Kendujhar', '22'),
(987, 'Khordha', '22'),
(988, 'Koraput', '22'),
(989, 'Malkangiri', '22'),
(990, 'Nabarangapur', '22'),
(991, 'Paradip', '22'),
(992, 'Parlakhemundi', '22'),
(993, 'Pattamundai', '22'),
(994, 'Phulabani', '22'),
(995, 'Puri', '22'),
(996, 'Rairangpur', '22'),
(997, 'Rajagangapur', '22'),
(998, 'Raurkela', '22'),
(999, 'Rayagada', '22'),
(1000, 'Sambalpur', '22'),
(1001, 'Soro', '22'),
(1002, 'Sunabeda', '22'),
(1003, 'Sundargarh', '22'),
(1004, 'Talcher', '22'),
(1005, 'Titlagarh', '22'),
(1006, 'Umarkote', '22'),
(1007, 'Karaikal', 'Pondicherry'),
(1008, 'Mahe', 'Pondicherry'),
(1009, 'Pondicherry', 'Pondicherry'),
(1010, 'Yanam', 'Pondicherry'),
(1011, 'Ahmedgarh', '24'),
(1012, 'Amritsar', '24'),
(1013, 'Barnala', '24'),
(1014, 'Batala', '24'),
(1015, 'Bathinda', '24'),
(1016, 'Bhagha Purana', '24'),
(1017, 'Budhlada', '24'),
(1018, 'Chandigarh', '24'),
(1019, 'Dasua', '24'),
(1020, 'Dhuri', '24'),
(1021, 'Dinanagar', '24'),
(1022, 'Faridkot', '24'),
(1023, 'Fazilka', '24'),
(1024, 'Firozpur', '24'),
(1025, 'Firozpur Cantt.', '24'),
(1026, 'Giddarbaha', '24'),
(1027, 'Gobindgarh', '24'),
(1028, 'Gurdaspur', '24'),
(1029, 'Hoshiarpur', '24'),
(1030, 'Jagraon', '24'),
(1031, 'Jaitu', '24'),
(1032, 'Jalalabad', '24'),
(1033, 'Jalandhar', '24'),
(1034, 'Jalandhar Cantt.', '24'),
(1035, 'Jandiala', '24'),
(1036, 'Kapurthala', '24'),
(1037, 'Karoran', '24'),
(1038, 'Kartarpur', '24'),
(1039, 'Khanna', '24'),
(1040, 'Kharar', '24'),
(1041, 'Kot Kapura', '24'),
(1042, 'Kurali', '24'),
(1043, 'Longowal', '24'),
(1044, 'Ludhiana', '24'),
(1045, 'Malerkotla', '24'),
(1046, 'Malout', '24'),
(1047, 'Mansa', '24'),
(1048, 'Maur', '24'),
(1049, 'Moga', '24'),
(1050, 'Mohali', '24'),
(1051, 'Morinda', '24'),
(1052, 'Mukerian', '24'),
(1053, 'Muktsar', '24'),
(1054, 'Nabha', '24'),
(1055, 'Nakodar', '24'),
(1056, 'Nangal', '24'),
(1057, 'Nawanshahr', '24'),
(1058, 'Pathankot', '24'),
(1059, 'Patiala', '24'),
(1060, 'Patran', '24'),
(1061, 'Patti', '24'),
(1062, 'Phagwara', '24'),
(1063, 'Phillaur', '24'),
(1064, 'Qadian', '24'),
(1065, 'Raikot', '24'),
(1066, 'Rajpura', '24'),
(1067, 'Rampura Phul', '24'),
(1068, 'Rupnagar', '24'),
(1069, 'Samana', '24'),
(1070, 'Sangrur', '24'),
(1071, 'Sirhind Fatehgarh Sahib', '24'),
(1072, 'Sujanpur', '24'),
(1073, 'Sunam', '24'),
(1074, 'Talwara', '24'),
(1075, 'Tarn Taran', '24'),
(1076, 'Urmar Tanda', '24'),
(1077, 'Zira', '24'),
(1078, 'Zirakpur', '24'),
(1079, 'Bali', 'Rajastan'),
(1080, 'Banswara', 'Rajastan'),
(1081, 'Ajmer', '25'),
(1082, 'Alwar', '25'),
(1083, 'Bandikui', '25'),
(1084, 'Baran', '25'),
(1085, 'Barmer', '25'),
(1086, 'Bikaner', '25'),
(1087, 'Fatehpur', '25'),
(1088, 'Jaipur', '25'),
(1089, 'Jaisalmer', '25'),
(1090, 'Jodhpur', '25'),
(1091, 'Kota', '25'),
(1092, 'Lachhmangarh', '25'),
(1093, 'Ladnu', '25'),
(1094, 'Lakheri', '25'),
(1095, 'Lalsot', '25'),
(1096, 'Losal', '25'),
(1097, 'Makrana', '25'),
(1098, 'Malpura', '25'),
(1099, 'Mandalgarh', '25'),
(1100, 'Mandawa', '25'),
(1101, 'Mangrol', '25'),
(1102, 'Merta City', '25'),
(1103, 'Mount Abu', '25'),
(1104, 'Nadbai', '25'),
(1105, 'Nagar', '25'),
(1106, 'Nagaur', '25'),
(1107, 'Nargund', '25'),
(1108, 'Nasirabad', '25'),
(1109, 'Nathdwara', '25'),
(1110, 'Navalgund', '25'),
(1111, 'Nawalgarh', '25'),
(1112, 'Neem-Ka-Thana', '25'),
(1113, 'Nelamangala', '25'),
(1114, 'Nimbahera', '25'),
(1115, 'Nipani', '25'),
(1116, 'Niwai', '25'),
(1117, 'Nohar', '25'),
(1118, 'Nokha', '25'),
(1119, 'Pali', '25'),
(1120, 'Phalodi', '25'),
(1121, 'Phulera', '25'),
(1122, 'Pilani', '25'),
(1123, 'Pilibanga', '25'),
(1124, 'Pindwara', '25'),
(1125, 'Pipar City', '25'),
(1126, 'Prantij', '25'),
(1127, 'Pratapgarh', '25'),
(1128, 'Raisinghnagar', '25'),
(1129, 'Rajakhera', '25'),
(1130, 'Rajaldesar', '25'),
(1131, 'Rajgarh (Alwar)', '25'),
(1132, 'Rajgarh (Churu', '25'),
(1133, 'Rajsamand', '25'),
(1134, 'Ramganj Mandi', '25'),
(1135, 'Ramngarh', '25'),
(1136, 'Ratangarh', '25'),
(1137, 'Rawatbhata', '25'),
(1138, 'Rawatsar', '25'),
(1139, 'Reengus', '25'),
(1140, 'Sadri', '25'),
(1141, 'Sadulshahar', '25'),
(1142, 'Sagwara', '25'),
(1143, 'Sambhar', '25'),
(1144, 'Sanchore', '25'),
(1145, 'Sangaria', '25'),
(1146, 'Sardarshahar', '25'),
(1147, 'Sawai Madhopur', '25'),
(1148, 'Shahpura', '25'),
(1149, 'Shahpura', '25'),
(1150, 'Sheoganj', '25'),
(1151, 'Sikar', '25'),
(1152, 'Sirohi', '25'),
(1153, 'Sojat', '25'),
(1154, 'Sri Madhopur', '25'),
(1155, 'Sujangarh', '25'),
(1156, 'Sumerpur', '25'),
(1157, 'Suratgarh', '25'),
(1158, 'Taranagar', '25'),
(1159, 'Todabhim', '25'),
(1160, 'Todaraisingh', '25'),
(1161, 'Tonk', '25'),
(1162, 'Udaipur', '25'),
(1163, 'Udaipurwati', '25'),
(1164, 'Vijainagar', '25'),
(1165, 'Gangtok', '26'),
(1166, 'Calcutta', '31'),
(1167, 'Arakkonam', '27'),
(1168, 'Arcot', '27'),
(1169, 'Aruppukkottai', '27'),
(1170, 'Bhavani', '27'),
(1171, 'Chengalpattu', '27'),
(1172, 'Chennai', '27'),
(1173, 'Chinna salem', '27'),
(1174, 'Coimbatore', '27'),
(1175, 'Coonoor', '27'),
(1176, 'Cuddalore', '27'),
(1177, 'Dharmapuri', '27'),
(1178, 'Dindigul', '27'),
(1179, 'Erode', '27'),
(1180, 'Gudalur', '27'),
(1181, 'Gudalur', '27'),
(1182, 'Gudalur', '27'),
(1183, 'Kanchipuram', '27'),
(1184, 'Karaikudi', '27'),
(1185, 'Karungal', '27'),
(1186, 'Karur', '27'),
(1187, 'Kollankodu', '27'),
(1188, 'Lalgudi', '27'),
(1189, 'Madurai', '27'),
(1190, 'Nagapattinam', '27'),
(1191, 'Nagercoil', '27'),
(1192, 'Namagiripettai', '27'),
(1193, 'Namakkal', '27'),
(1194, 'Nandivaram-Guduvancheri', '27'),
(1195, 'Nanjikottai', '27'),
(1196, 'Natham', '27'),
(1197, 'Nellikuppam', '27'),
(1198, 'Neyveli', '27'),
(1199, 'O'' Valley', '27'),
(1200, 'Oddanchatram', '27'),
(1201, 'P.N.Patti', '27'),
(1202, 'Pacode', '27'),
(1203, 'Padmanabhapuram', '27'),
(1204, 'Palani', '27'),
(1205, 'Palladam', '27'),
(1206, 'Pallapatti', '27'),
(1207, 'Pallikonda', '27'),
(1208, 'Panagudi', '27'),
(1209, 'Panruti', '27'),
(1210, 'Paramakudi', '27'),
(1211, 'Parangipettai', '27'),
(1212, 'Pattukkottai', '27'),
(1213, 'Perambalur', '27'),
(1214, 'Peravurani', '27'),
(1215, 'Periyakulam', '27'),
(1216, 'Periyasemur', '27'),
(1217, 'Pernampattu', '27'),
(1218, 'Pollachi', '27'),
(1219, 'Polur', '27'),
(1220, 'Ponneri', '27'),
(1221, 'Pudukkottai', '27'),
(1222, 'Pudupattinam', '27'),
(1223, 'Puliyankudi', '27'),
(1224, 'Punjaipugalur', '27'),
(1225, 'Rajapalayam', '27'),
(1226, 'Ramanathapuram', '27'),
(1227, 'Rameshwaram', '27'),
(1228, 'Rasipuram', '27'),
(1229, 'Salem', '27'),
(1230, 'Sankarankoil', '27'),
(1231, 'Sankari', '27'),
(1232, 'Sathyamangalam', '27'),
(1233, 'Sattur', '27'),
(1234, 'Shenkottai', '27'),
(1235, 'Sholavandan', '27'),
(1236, 'Sholingur', '27'),
(1237, 'Sirkali', '27'),
(1238, 'Sivaganga', '27'),
(1239, 'Sivagiri', '27'),
(1240, 'Sivakasi', '27'),
(1241, 'Srivilliputhur', '27'),
(1242, 'Surandai', '27'),
(1243, 'Suriyampalayam', '27'),
(1244, 'Tenkasi', '27'),
(1245, 'Thammampatti', '27'),
(1246, 'Thanjavur', '27'),
(1247, 'Tharamangalam', '27'),
(1248, 'Tharangambadi', '27'),
(1249, 'Theni Allinagaram', '27'),
(1250, 'Thirumangalam', '27'),
(1251, 'Thirunindravur', '27'),
(1252, 'Thiruparappu', '27'),
(1253, 'Thirupuvanam', '27'),
(1254, 'Thiruthuraipoondi', '27'),
(1255, 'Thiruvallur', '27'),
(1256, 'Thiruvarur', '27'),
(1257, 'Thoothukudi', '27'),
(1258, 'Thuraiyur', '27'),
(1259, 'Tindivanam', '27'),
(1260, 'Tiruchendur', '27'),
(1261, 'Tiruchengode', '27'),
(1262, 'Tiruchirappalli', '27'),
(1263, 'Tirukalukundram', '27'),
(1264, 'Tirukkoyilur', '27'),
(1265, 'Tirunelveli', '27'),
(1266, 'Tirupathur', '27'),
(1267, 'Tirupathur', '27'),
(1268, 'Tiruppur', '27'),
(1269, 'Tiruttani', '27'),
(1270, 'Tiruvannamalai', '27'),
(1271, 'Tiruvethipuram', '27'),
(1272, 'Tittakudi', '27'),
(1273, 'Udhagamandalam', '27'),
(1274, 'Udumalaipettai', '27'),
(1275, 'Unnamalaikadai', '27'),
(1276, 'Usilampatti', '27'),
(1277, 'Uthamapalayam', '27'),
(1278, 'Uthiramerur', '27'),
(1279, 'Vadakkuvalliyur', '27'),
(1280, 'Vadalur', '27'),
(1281, 'Vadipatti', '27'),
(1282, 'Valparai', '27'),
(1283, 'Vandavasi', '27'),
(1284, 'Vaniyambadi', '27'),
(1285, 'Vedaranyam', '27'),
(1286, 'Vellakoil', '27'),
(1287, 'Vellore', '27'),
(1288, 'Vikramasingapuram', '27'),
(1289, 'Viluppuram', '27'),
(1290, 'Virudhachalam', '27'),
(1291, 'Virudhunagar', '27'),
(1292, 'Viswanatham', '27'),
(1293, 'Agartala', '28'),
(1294, 'Badharghat', '28'),
(1295, 'Dharmanagar', '28'),
(1296, 'Indranagar', '28'),
(1297, 'Jogendranagar', '28'),
(1298, 'Kailasahar', '28'),
(1299, 'Khowai', '28'),
(1300, 'Pratapgarh', '28'),
(1301, 'Udaipur', '28'),
(1302, 'Achhnera', '29'),
(1303, 'Adari', '29'),
(1304, 'Agra', '29'),
(1305, 'Aligarh', '29'),
(1306, 'Allahabad', '29'),
(1307, 'Amroha', '29'),
(1308, 'Azamgarh', '29'),
(1309, 'Bahraich', '29'),
(1310, 'Ballia', '29'),
(1311, 'Balrampur', '29'),
(1312, 'Banda', '29'),
(1313, 'Bareilly', '29'),
(1314, 'Chandausi', '29'),
(1315, 'Dadri', '29'),
(1316, 'Deoria', '29'),
(1317, 'Etawah', '29'),
(1318, 'Fatehabad', '29'),
(1319, 'Fatehpur', '29'),
(1320, 'Fatehpur', '29'),
(1321, 'Greater Noida', '29'),
(1322, 'Hamirpur', '29'),
(1323, 'Hardoi', '29'),
(1324, 'Jajmau', '29'),
(1325, 'Jaunpur', '29'),
(1326, 'Jhansi', '29'),
(1327, 'Kalpi', '29'),
(1328, 'Kanpur', '29'),
(1329, 'Kota', '29'),
(1330, 'Laharpur', '29'),
(1331, 'Lakhimpur', '29'),
(1332, 'Lal Gopalganj Nindaura', '29'),
(1333, 'Lalganj', '29'),
(1334, 'Lalitpur', '29'),
(1335, 'Lar', '29'),
(1336, 'Loni', '29'),
(1337, 'Lucknow', '29'),
(1338, 'Mathura', '29'),
(1339, 'Meerut', '29'),
(1340, 'Modinagar', '29'),
(1341, 'Muradnagar', '29'),
(1342, 'Nagina', '29'),
(1343, 'Najibabad', '29'),
(1344, 'Nakur', '29'),
(1345, 'Nanpara', '29'),
(1346, 'Naraura', '29'),
(1347, 'Naugawan Sadat', '29'),
(1348, 'Nautanwa', '29'),
(1349, 'Nawabganj', '29'),
(1350, 'Nehtaur', '29'),
(1351, 'NOIDA', '29'),
(1352, 'Noorpur', '29'),
(1353, 'Obra', '29'),
(1354, 'Orai', '29'),
(1355, 'Padrauna', '29'),
(1356, 'Palia Kalan', '29'),
(1357, 'Parasi', '29'),
(1358, 'Phulpur', '29'),
(1359, 'Pihani', '29'),
(1360, 'Pilibhit', '29'),
(1361, 'Pilkhuwa', '29'),
(1362, 'Powayan', '29'),
(1363, 'Pukhrayan', '29'),
(1364, 'Puranpur', '29'),
(1365, 'Purquazi', '29'),
(1366, 'Purwa', '29'),
(1367, 'Rae Bareli', '29'),
(1368, 'Rampur', '29'),
(1369, 'Rampur Maniharan', '29'),
(1370, 'Rasra', '29'),
(1371, 'Rath', '29'),
(1372, 'Renukoot', '29'),
(1373, 'Reoti', '29'),
(1374, 'Robertsganj', '29'),
(1375, 'Rudauli', '29'),
(1376, 'Rudrapur', '29'),
(1377, 'Sadabad', '29'),
(1378, 'Safipur', '29'),
(1379, 'Saharanpur', '29'),
(1380, 'Sahaspur', '29'),
(1381, 'Sahaswan', '29'),
(1382, 'Sahawar', '29'),
(1383, 'Sahjanwa', '29'),
(1384, '"Saidpur', ' Ghazipur"'),
(1385, 'Sambhal', '29'),
(1386, 'Samdhan', '29'),
(1387, 'Samthar', '29'),
(1388, 'Sandi', '29'),
(1389, 'Sandila', '29'),
(1390, 'Sardhana', '29'),
(1391, 'Seohara', '29'),
(1394, 'Shahganj', '29'),
(1395, 'Shahjahanpur', '29'),
(1396, 'Shamli', '29'),
(1399, 'Sherkot', '29'),
(1401, 'Shikohabad', '29'),
(1402, 'Shishgarh', '29'),
(1403, 'Siana', '29'),
(1404, 'Sikanderpur', '29'),
(1405, 'Sikandra Rao', '29'),
(1406, 'Sikandrabad', '29'),
(1407, 'Sirsaganj', '29'),
(1408, 'Sirsi', '29'),
(1409, 'Sitapur', '29'),
(1410, 'Soron', '29'),
(1411, 'Suar', '29'),
(1412, 'Sultanpur', '29'),
(1413, 'Sumerpur', '29'),
(1414, 'Tanda', '29'),
(1415, 'Tanda', '29'),
(1416, 'Tetri Bazar', '29'),
(1417, 'Thakurdwara', '29'),
(1418, 'Thana Bhawan', '29'),
(1419, 'Tilhar', '29'),
(1420, 'Tirwaganj', '29'),
(1421, 'Tulsipur', '29'),
(1422, 'Tundla', '29'),
(1423, 'Unnao', '29'),
(1424, 'Utraula', '29'),
(1425, 'Varanasi', '29'),
(1426, 'Vrindavan', '29'),
(1427, 'Warhapur', '29'),
(1428, 'Zaidpur', '29'),
(1429, 'Zamania', '29'),
(1430, 'Almora', '30'),
(1431, 'Bazpur', '30'),
(1432, 'Chamba', '30'),
(1433, 'Dehradun', '30'),
(1434, 'Haldwani', '30'),
(1435, 'Haridwar', '30'),
(1436, 'Jaspur', '30'),
(1437, 'Kashipur', '30'),
(1438, 'kichha', '30'),
(1439, 'Kotdwara', '30'),
(1440, 'Manglaur', '30'),
(1441, 'Mussoorie', '30'),
(1442, 'Nagla', '30'),
(1443, 'Nainital', '30'),
(1444, 'Pauri', '30'),
(1445, 'Pithoragarh', '30'),
(1446, 'Ramnagar', '30'),
(1447, 'Rishikesh', '30'),
(1448, 'Roorkee', '30'),
(1449, 'Rudrapur', '30'),
(1450, 'Sitarganj', '30'),
(1451, 'Tehri', '30'),
(1452, 'Muzaffarnagar', 'Uttarpradesh'),
(1453, '"Adra', ' Purulia"'),
(1454, 'Alipurduar', '31'),
(1455, 'Arambagh', '31'),
(1456, 'Asansol', '31'),
(1457, 'Baharampur', '31'),
(1458, 'Bally', '31'),
(1459, 'Balurghat', '31'),
(1460, 'Bankura', '31'),
(1461, 'Barakar', '31'),
(1462, 'Barasat', '31'),
(1463, 'Bardhaman', '31'),
(1464, 'Bidhan Nagar', '31'),
(1465, 'Chinsura', '31'),
(1466, 'Contai', '31'),
(1467, 'Cooch Behar', '31'),
(1468, 'Darjeeling', '31'),
(1469, 'Durgapur', '31'),
(1470, 'Haldia', '31'),
(1471, 'Howrah', '31'),
(1472, 'Islampur', '31'),
(1473, 'Jhargram', '31'),
(1474, 'Kharagpur', '31'),
(1475, 'Kolkata', '31'),
(1476, 'Mainaguri', '31'),
(1477, 'Mal', '31'),
(1478, 'Mathabhanga', '31'),
(1479, 'Medinipur', '31'),
(1480, 'Memari', '31'),
(1481, 'Monoharpur', '31'),
(1482, 'Murshidabad', '31'),
(1483, 'Nabadwip', '31'),
(1484, 'Naihati', '31'),
(1485, 'Panchla', '31'),
(1486, 'Pandua', '31'),
(1487, 'Paschim Punropara', '31'),
(1488, 'Purulia', '31'),
(1489, 'Raghunathpur', '31'),
(1490, 'Raiganj', '31'),
(1491, 'Rampurhat', '31'),
(1492, 'Ranaghat', '31'),
(1493, 'Sainthia', '31'),
(1494, 'Santipur', '31'),
(1495, 'Siliguri', '31'),
(1496, 'Sonamukhi', '31'),
(1497, 'Srirampore', '31'),
(1498, 'Suri', '31'),
(1499, 'Taki', '31'),
(1500, 'Tamluk', '31'),
(1501, 'Tarakeswar', '31'),
(1502, 'Chikmagalur', '14'),
(1503, 'Davanagere', '14'),
(1504, 'Dharwad', '14'),
(1505, 'Gadag', '14'),
(1506, 'Chennai', '27'),
(1507, 'Coimbatore', '27'),
(1508, 'Barrackpur', '29'),
(1509, 'Barwani', '29'),
(1510, 'Basna', '29'),
(1511, 'Bawal', '29'),
(1512, 'Beawar', '29'),
(1513, 'Berhampur', '29'),
(1514, 'Bhajanpura', '29'),
(1515, 'Bhandara', '29'),
(1516, 'Bharatpur', '29'),
(1517, 'Bharthana', '29'),
(1518, 'Bhilai', '29'),
(1519, 'Bhilwara', '29'),
(1520, 'Bhinmal', '29'),
(1521, 'Bhiwandi', '29'),
(1522, 'Bhusawal', '29'),
(1523, 'Bidar', '29'),
(1524, 'Bijnaur', '29'),
(1525, 'Bilara', '29'),
(1527, 'Budaun', '29'),
(1528, 'Bulandshahr', '29'),
(1529, 'Burla', '29'),
(1532, 'Chakeri', '29'),
(1533, 'Champawat', '29'),
(1534, 'Chandil', '29'),
(1535, 'Chandrapur', '29'),
(1536, 'Chapirevula', '29'),
(1537, 'Charkhari', '29'),
(1538, 'Charkhi Dadri', '29'),
(1539, 'Chhindwara', '29'),
(1540, 'Chiplun', '29'),
(1541, 'Chitrakoot', '29'),
(1542, 'Churu', '29'),
(1543, 'Dalkhola', '29'),
(1544, 'Damoh', '29'),
(1545, 'Daund', '29'),
(1546, 'Dehgam', '29'),
(1547, 'Devgarh', '29'),
(1548, 'Dhulian', '29'),
(1549, 'Dumdum', '29'),
(1550, 'Dwarka1', '29'),
(1551, 'Etah', '29'),
(1552, 'Faizabad', '29'),
(1553, 'Falna', '29'),
(1554, 'Farrukhabad', '29'),
(1555, 'Fatehgarh', '29'),
(1556, 'Fatehpur Chaurasi', '29'),
(1557, 'Fatehpur Sikri', '29'),
(1558, 'Firozabad', '29'),
(1559, 'Gadchiroli', '29'),
(1560, 'Gandhidham', '29'),
(1561, 'Ganjam', '29'),
(1562, 'Ghatampur', '29'),
(1563, 'Ghatanji', '29'),
(1564, 'Ghaziabad', '29'),
(1565, 'Ghazipur', '29'),
(1566, 'Goa Velha', '29'),
(1567, 'Gokak', '29'),
(1568, 'Gondiya', '29'),
(1569, 'Gorakhpur', '29'),
(1571, 'Guna', '29'),
(1572, 'Hanumangarh', '29'),
(1573, 'Harda', '29'),
(1574, 'Harsawa', '29'),
(1575, 'Hastinapur', '29'),
(1576, 'Hathras', '29'),
(1579, 'Jagadhri', '29'),
(1580, 'Jais', '29'),
(1581, 'Jaitaran', '29'),
(1582, 'Jalgaon', '29'),
(1583, 'Jalore', '29'),
(1584, 'Jhabua', '29'),
(1585, 'Jhalawar', '29'),
(1586, 'Jhunjhunu', '29'),
(1588, 'Junnar', '29'),
(1589, 'Kailaras', '29'),
(1590, 'Kalburgi', '29'),
(1591, 'Kalimpong', '29'),
(1592, 'Kamthi', '29'),
(1593, 'Kanpur', '29'),
(1594, 'Karad', '29'),
(1595, 'Keylong', '29'),
(1596, 'Kheri', '29'),
(1598, 'Khurai', '29'),
(1600, 'Kodad', '29'),
(1601, 'Konnagar', '29'),
(1602, 'Krishnanagar', '29'),
(1603, 'Kuchinda', '29'),
(1605, 'Madhyamgram', '29'),
(1606, 'Mahabaleswar', '29'),
(1608, 'Mahoba', '29'),
(1609, 'Mahwa', '29'),
(1614, 'Manesar', '29'),
(1615, 'Mangalagiri', '29'),
(1616, 'Mira-Bhayandar', '29'),
(1617, 'Mirzapur', '29'),
(1618, 'Mithapur', '29'),
(1619, 'Mohania', '29'),
(1620, 'Mokama', '29'),
(1621, 'Moradabad', '29'),
(1622, 'Mukatsar', '29'),
(1623, 'Nagalapuram', '29');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE IF NOT EXISTS `collections` (
`id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `cat_id` int(30) NOT NULL,
  `url_slug` varchar(255) NOT NULL,
  `user_id` int(20) NOT NULL,
  `tag_line` varchar(255) NOT NULL,
  `description` varchar(250) NOT NULL,
  `is_featured` int(10) NOT NULL DEFAULT '0',
  `is_enable` tinyint(1) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `title`, `cat_id`, `url_slug`, `user_id`, `tag_line`, `description`, `is_featured`, `is_enable`, `is_approved`, `created_at`, `created_time`, `updated_at`, `deleted`) VALUES
(1, 'electronics', 1, 'electronic', 1, 'asdbasbjdbasjdbjkasdbjkabjks', 'sdsgdsagasgjkdgjasdgjasgjkdasgjkdgasdgjk', 1, 1, 1, '2015-12-09', '00:00:00', '2015-12-09 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` bigint(20) NOT NULL,
  `parent_comment_id` bigint(20) NOT NULL,
  `comments` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `section_type` tinyint(1) NOT NULL,
  `section_type_id` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `is_enable` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `parent_comment_id`, `comments`, `user_id`, `section_type`, `section_type_id`, `created_date`, `update_date`, `is_approved`, `is_enable`, `deleted`) VALUES
(1, 0, 'Hey everyone!\r\n\r\nThis is a tiny project I put together over the weekend. Serendipity sends you exactly one email every month, introducing you to another awesome person, randomly selected.\r\n\r\nI love monthly products, because it''s something nice to look forward to, and the idea of a surprise is always nice. I think it''d be fun to see what comes out of it in a few months, and it''s pretty exciting to think that anything could, given the serendipity! ', 1, 1, 21, '2015-12-10 00:00:00', '2015-12-03 00:00:00', 1, 1, 0),
(2, 1, 'Hey everyone!\r\n\r\nThis is a tiny project I put together over the weekend. Serendipity sends you exactly one email every month, introducing you to another awesome person, randomly selected.\r\n\r\nI love monthly products, because it''s something nice to look forward to, and the idea of a surprise is always nice. I think it''d be fun to see what comes out of it in a few months, and it''s pretty exciting to think that anything could, given the serendipity! ', 1, 1, 21, '2015-12-10 00:00:00', '2015-12-03 00:00:00', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `countryID` varchar(3) NOT NULL DEFAULT '',
  `countryName` varchar(52) NOT NULL DEFAULT '',
  `localName` varchar(45) NOT NULL,
  `webCode` varchar(2) NOT NULL,
  `region` varchar(26) NOT NULL,
  `continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') NOT NULL,
  `latitude` double NOT NULL DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0',
  `surfaceArea` float(10,2) NOT NULL DEFAULT '0.00',
  `population` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countryID`, `countryName`, `localName`, `webCode`, `region`, `continent`, `latitude`, `longitude`, `surfaceArea`, `population`) VALUES
('IND', 'India', 'Bharat/India', 'IN', 'Southern and Central Asia', 'Asia', 28.47, 77.03, 3287263.00, 1013662000),
('USA', 'USA', 'United States', 'US', 'North America', 'North America', 38, -97, 9363520.00, 278357000);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(11) unsigned NOT NULL,
  `heading` varchar(255) NOT NULL,
  `url` varchar(100) NOT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `meta_description` varchar(200) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_keywords` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(11) NOT NULL DEFAULT '0',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `heading`, `url`, `content`, `meta_description`, `meta_title`, `meta_keywords`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 'about us', 'about-us', 'ddsdfsdfsdfdfsdf', 'sdfsfsdfdfsd', 'sdfsdffdfsdf', 'sfsdfsdfsfsfsdfsdf', 0, '2015-09-07 10:40:04', 1, '2015-09-07 11:44:30', 1, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) unsigned NOT NULL,
  `title_p` varchar(100) NOT NULL,
  `sku_no` varchar(250) NOT NULL,
  `product_url` varchar(300) NOT NULL,
  `cat_id` int(20) NOT NULL,
  `product_description` text,
  `url_slug` varchar(200) NOT NULL,
  `brand_name` varchar(20) NOT NULL,
  `industry` varchar(300) NOT NULL,
  `price` int(20) NOT NULL,
  `sale_price` varchar(25) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `is_enable` tinyint(1) NOT NULL DEFAULT '0',
  `product_created_at` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title_p`, `sku_no`, `product_url`, `cat_id`, `product_description`, `url_slug`, `brand_name`, `industry`, `price`, `sale_price`, `currency`, `user_id`, `is_enable`, `product_created_at`, `created_time`, `updated_at`, `deleted`) VALUES
(1, 'abc', '1005242562', '', 1, 'asbdjasdbsjabjdasjkbdsajkdsajkbdjksdasjkdasjk', 'abc-1', 'electrolux', '', 100, '200', '', 1, 1, '2015-12-05', '00:00:00', '2015-12-05 00:00:00', 0),
(2, 'samsung galaxy note 2', '1002520052', 'http://www.gsmarena.com/samsung_galaxy_note_ii_n7100-4854.php', 1, 'wdhfvsdbjfdsfsdbjfsdbjfsfbsdfsbsbsdlkfsdlkf', 'electronic', 'samsung', 'smartphone', 200000, '200000', 'INR', 1, 1, '2015-12-26', '00:00:00', '2015-12-26 00:00:00', 0),
(5, 'samsung galaxy note 3', '1002520053', 'http://www.gsmarena.com/samsung_galaxy_note_iii_n7100-4854.php', 1, 'sfsvhdfvsdfsdvfsdfsdvjkfsdvjkfsvjk', 'note-3', 'samsung', 'smartphone', 31000, '31000', 'INR', 1, 1, '2015-12-23', '12:00:00', '2015-12-23 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_in_collection`
--

CREATE TABLE IF NOT EXISTS `products_in_collection` (
`id` int(11) unsigned NOT NULL,
  `col_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `display_order` smallint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_in_collection`
--

INSERT INTO `products_in_collection` (`id`, `col_id`, `product_id`, `display_order`, `created_at`) VALUES
(3, 1, 5, 0, '0000-00-00 00:00:00'),
(4, 1, 2, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE IF NOT EXISTS `product_media` (
`id` int(11) unsigned NOT NULL,
  `product_id` int(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `img_alt` varchar(100) NOT NULL,
  `img_title` varchar(200) NOT NULL,
  `file_path` varchar(300) NOT NULL,
  `media_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`id`, `product_id`, `type`, `file_name`, `img_alt`, `img_title`, `file_path`, `media_status`, `created_at`) VALUES
(1, 1, 'jpeg', 'jassi.jpg', 'asasas', 'asasasas', '', 1, '0000-00-00 00:00:00'),
(2, 2, 'jpeg', 'title_1449728831.jpg', '', 'title_1449728831.jpg', 'C:/xampp/htdocs/curatigo/upload/products/title_1449728831.jpg', 1, '2015-12-26 00:00:00'),
(3, 5, 'jpeg', 'title_1449658648.jpeg', '', 'title_1449658648.jpeg', 'C:/xampp/htdocs/curatigo/upload/products/title_1449658648.jpeg', 1, '2015-12-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_shipping`
--

CREATE TABLE IF NOT EXISTS `product_shipping` (
`id` int(11) unsigned NOT NULL,
  `product_id` int(10) NOT NULL,
  `type` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `country_id` int(10) NOT NULL,
  `state_id` int(10) DEFAULT NULL,
  `city_id` int(10) NOT NULL,
  `pin_code` int(20) NOT NULL,
  `fees` int(100) NOT NULL,
  `shipping_status` tinyint(1) NOT NULL DEFAULT '0',
  `shipping_created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) unsigned NOT NULL DEFAULT '0',
  `shipping_deleted` tinyint(11) NOT NULL DEFAULT '0',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_shipping`
--

INSERT INTO `product_shipping` (`id`, `product_id`, `type`, `location`, `country_id`, `state_id`, `city_id`, `pin_code`, `fees`, `shipping_status`, `shipping_created_at`, `created_by`, `updated_at`, `updated_by`, `shipping_deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 1, '1', 'sdfsdfsdf', 1, 2, 5, 0, 0, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE IF NOT EXISTS `product_stocks` (
`id` int(11) unsigned NOT NULL,
  `product_id` int(20) NOT NULL,
  `available_stock` int(10) NOT NULL,
  `basic_unit` varchar(20) NOT NULL,
  `minium_qty` int(10) DEFAULT NULL,
  `maximum_qty` int(10) NOT NULL,
  `allow_bulk_order` int(1) NOT NULL DEFAULT '0',
  `bulk_order_text` varchar(200) NOT NULL,
  `stock_status` tinyint(1) NOT NULL DEFAULT '0',
  `stock_created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) unsigned NOT NULL DEFAULT '0',
  `stock_deleted` tinyint(11) NOT NULL DEFAULT '0',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `available_stock`, `basic_unit`, `minium_qty`, `maximum_qty`, `allow_bulk_order`, `bulk_order_text`, `stock_status`, `stock_created_at`, `created_by`, `updated_at`, `updated_by`, `stock_deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 100, '2', 10, 20, 0, '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `store_id` int(20) NOT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(11) NOT NULL DEFAULT '0',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `store_id`, `description`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 'My collection', 1, 'asdasdasdasdasdassdadasdasdasd', 1, '2015-10-05 09:16:49', 2, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seo_meta`
--

CREATE TABLE IF NOT EXISTS `seo_meta` (
`id` int(11) unsigned NOT NULL,
  `section_type` tinyint(1) NOT NULL,
  `section_type_id` bigint(20) NOT NULL,
  `meta_title` varchar(50) NOT NULL,
  `meta_description` varchar(2000) NOT NULL,
  `meta_keyword` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `meta_robots_index` tinyint(1) NOT NULL,
  `meta_robots_follow` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seo_meta`
--

INSERT INTO `seo_meta` (`id`, `section_type`, `section_type_id`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `meta_robots_index`, `meta_robots_follow`, `updated_at`) VALUES
(1, 0, 1, 'asdasdasda', 'collection', 'asdasdasdadasd', '2015-12-09 00:00:00', 0, 0, '2015-12-09 00:00:00'),
(2, 1, 2, 'note2', 'samsung', 'samsung', '2015-12-26 00:00:00', 0, 0, '2015-12-26 00:00:00'),
(3, 1, 5, 'asdasdasda', 'asdasdasdas', 'asdasdasdasdasdasdasd', '2015-12-23 00:00:00', 0, 0, '2015-12-23 00:00:00'),
(6, 2, 1, 'sbdbasdbkasdbjasbjdasbjkdasdbjkakdjskj', 'asdasdasdasdasdasdasd', 'update-story', '2015-12-23 00:00:00', 0, 0, '2015-12-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `social_users`
--

CREATE TABLE IF NOT EXISTS `social_users` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userpwd` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `displayName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `profileURL` text NOT NULL,
  `photoURL` text NOT NULL,
  `webSiteURL` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `language` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `birthDay` varchar(255) NOT NULL,
  `birthMonth` varchar(255) NOT NULL,
  `birthYear` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_users`
--

INSERT INTO `social_users` (`id`, `email`, `userpwd`, `firstName`, `lastName`, `displayName`, `phone`, `gender`, `identifier`, `profileURL`, `photoURL`, `webSiteURL`, `description`, `language`, `age`, `birthDay`, `birthMonth`, `birthYear`, `address`, `country`, `region`, `city`, `zip`, `provider`, `status`) VALUES
(49, 'ashish.gupta@relesol.com', '', 'json hello', '', 'ashish_relesol', '', '', '4328803336', 'http://twitter.com/ashish_relesol', 'http://abs.twimg.com/sticky/default_profile_images/default_profile_4_normal.png', 'https://t.co/HXdqkT3dVS', 'software developer', '', 0, '', '', '', '', '', 'New Delhi, Delhi', '', '', 'Twitter', 1),
(51, 'abhishek.singh@relesol.com', '', 'abhishek singh', '', 'abhishek5341u', '', '', '4415751503', 'http://twitter.com/abhishek5341u', 'http://pbs.twimg.com/profile_images/675206678661488645/YigoWkkB_normal.jpg', '', '', '', 0, '', '', '', '', '', '', '', '', 'Twitter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_users_friends`
--

CREATE TABLE IF NOT EXISTS `social_users_friends` (
`fid` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `webSiteURL` varchar(255) DEFAULT NULL,
  `profileURL` varchar(255) DEFAULT NULL,
  `photoURL` varchar(255) DEFAULT NULL,
  `displayName` varchar(255) DEFAULT NULL,
  `description` text,
  `email` varchar(255) DEFAULT NULL,
  `friend_email` varchar(255) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_users_friends`
--

INSERT INTO `social_users_friends` (`fid`, `identifier`, `webSiteURL`, `profileURL`, `photoURL`, `displayName`, `description`, `email`, `friend_email`, `provider`, `status`) VALUES
(3, 'AaKX64Nkl8CCT9gWSelJxbwfKg-evZoYW4037vbUvG4p4pgioUFBpvuRG1tR0BEpD_fL2Uy7hVg5celY1SGi3Awf9KExOjcZOdWRvhlpBpgPtg', NULL, 'https://www.facebook.com/profile.php?id=AaKX64Nkl8CCT9gWSelJxbwfKg-evZoYW4037vbUvG4p4pgioUFBpvuRG1tR0BEpD_fL2Uy7hVg5celY1SGi3Awf9KExOjcZOdWRvhlpBpgPtg', 'https://graph.facebook.com/AaKX64Nkl8CCT9gWSelJxbwfKg-evZoYW4037vbUvG4p4pgioUFBpvuRG1tR0BEpD_fL2Uy7hVg5celY1SGi3Awf9KExOjcZOdWRvhlpBpgPtg/picture?type=square', 'Ashish Gupta', NULL, 'ashish.gupta@relesol.com', NULL, 'Facebook', 1),
(4, 'AaKZ00MQFNIRiRiwuQIqtN4vt9z1BOFj6EOeTSK3m7_Olfz8VzubVbtX72fvGN_MMVrG67WX-8CCoSqWuuGxIgsR5ONqWD9_copl_NEP8G1dDg', NULL, 'https://www.facebook.com/profile.php?id=AaKZ00MQFNIRiRiwuQIqtN4vt9z1BOFj6EOeTSK3m7_Olfz8VzubVbtX72fvGN_MMVrG67WX-8CCoSqWuuGxIgsR5ONqWD9_copl_NEP8G1dDg', 'https://graph.facebook.com/AaKZ00MQFNIRiRiwuQIqtN4vt9z1BOFj6EOeTSK3m7_Olfz8VzubVbtX72fvGN_MMVrG67WX-8CCoSqWuuGxIgsR5ONqWD9_copl_NEP8G1dDg/picture?type=square', 'Ashish Gupta', NULL, 'ashish.gupta@relesol.com', NULL, 'Facebook', 1),
(5, 'AaLA4McLqtYQRBd3x72tiC74G8YcrciLZLtyEmxbIV1zU_lT12tPD0WxXOc-eARiE5TNIyXAodW7qV12rvRWy5adLz0rbv69GOsSrbWSWYK7MA', NULL, 'https://www.facebook.com/profile.php?id=AaLA4McLqtYQRBd3x72tiC74G8YcrciLZLtyEmxbIV1zU_lT12tPD0WxXOc-eARiE5TNIyXAodW7qV12rvRWy5adLz0rbv69GOsSrbWSWYK7MA', 'https://graph.facebook.com/AaLA4McLqtYQRBd3x72tiC74G8YcrciLZLtyEmxbIV1zU_lT12tPD0WxXOc-eARiE5TNIyXAodW7qV12rvRWy5adLz0rbv69GOsSrbWSWYK7MA/picture?type=square', 'Ashish Gupta', NULL, 'ashish.gupta@relesol.com', NULL, 'Facebook', 1),
(6, 'AaJjEfFdRGrG74qWoSIbrNWyiIJdUBU1kIh05XT1-7LqVY1Fp0RUa7F6Ev4_Mgq9IH_5i6BjfvOZ3USRdq-mITei3Wgtj-yuFeiyMg0eP53hWA', NULL, 'https://www.facebook.com/profile.php?id=AaJjEfFdRGrG74qWoSIbrNWyiIJdUBU1kIh05XT1-7LqVY1Fp0RUa7F6Ev4_Mgq9IH_5i6BjfvOZ3USRdq-mITei3Wgtj-yuFeiyMg0eP53hWA', 'https://graph.facebook.com/AaJjEfFdRGrG74qWoSIbrNWyiIJdUBU1kIh05XT1-7LqVY1Fp0RUa7F6Ev4_Mgq9IH_5i6BjfvOZ3USRdq-mITei3Wgtj-yuFeiyMg0eP53hWA/picture?type=square', 'Ashish Gupta', NULL, 'ashish.gupta@relesol.com', NULL, 'Facebook', 1),
(7, 'AaIEjk4GR2V6GqV4Re6MBwJJ-v3gpFtM8TXvlPKnxm1cRLgmk0g5PF4vYy8SpfZ7OPsoBF75JglkHrEpwbS1bzZTPkpFWm0aV5__OZVV3nCEcg', NULL, 'https://www.facebook.com/profile.php?id=AaIEjk4GR2V6GqV4Re6MBwJJ-v3gpFtM8TXvlPKnxm1cRLgmk0g5PF4vYy8SpfZ7OPsoBF75JglkHrEpwbS1bzZTPkpFWm0aV5__OZVV3nCEcg', 'https://graph.facebook.com/AaIEjk4GR2V6GqV4Re6MBwJJ-v3gpFtM8TXvlPKnxm1cRLgmk0g5PF4vYy8SpfZ7OPsoBF75JglkHrEpwbS1bzZTPkpFWm0aV5__OZVV3nCEcg/picture?type=square', 'Ashish Gupta', NULL, 'ashish.gupta@relesol.com', NULL, 'Facebook', 1),
(8, '113278275', NULL, 'http://twitter.com/bomanirani', 'http://pbs.twimg.com/profile_images/664342899920760832/_HMAYCg1_normal.jpg', 'Boman Irani', 'work in progress', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(9, '56631494', NULL, 'http://twitter.com/shahidkapoor', 'http://pbs.twimg.com/profile_images/661793461155323905/Snd7grjc_normal.jpg', 'Shahid Kapoor', 'Actor, Dreamer, Lover, Believer .', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(10, '471741741', NULL, 'http://twitter.com/PMOIndia', 'http://pbs.twimg.com/profile_images/471275189364203520/Wei_kIj__normal.jpeg', 'PMO India', 'Office of the Prime Minister of India', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(11, '88856792', NULL, 'http://twitter.com/aamir_khan', 'http://pbs.twimg.com/profile_images/542685126648274945/A1odhC4l_normal.jpeg', 'Aamir Khan', 'Actor.', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(12, '101311381', NULL, 'http://twitter.com/iamsrk', 'http://pbs.twimg.com/profile_images/661679664/keep_it_onn_normal.jpg', 'Shah Rukh Khan', '', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(13, '18839785', NULL, 'http://twitter.com/narendramodi', 'http://pbs.twimg.com/profile_images/454954067488288768/fU6NY-EI_normal.jpeg', 'Narendra Modi', 'Prime Minister of India', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(14, '6509832', NULL, 'http://twitter.com/ibnlive', 'http://pbs.twimg.com/profile_images/671614090867904512/tduAKz9C_normal.jpg', 'CNN-IBN News', 'Latest news alerts from India', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(15, '132385468', NULL, 'http://twitter.com/BeingSalmanKhan', 'http://pbs.twimg.com/profile_images/838562307/IMG00882-20100416-0034_normal.jpg', 'Salman Khan', 'Film actor, artist, painter, humanitarian', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(16, '97865628', NULL, 'http://twitter.com/FarOutAkhtar', 'http://pbs.twimg.com/profile_images/671456036687994880/Dx3zDlJG_normal.jpg', 'Farhan Akhtar', 'Writer. Director. Actor. Singer/Songwriter. Founder- MARD Initiative & UNwomen Goodwill Ambassador(South Asia)', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(17, '138822469', NULL, 'http://twitter.com/abdullah_omar', 'http://pbs.twimg.com/profile_images/654622071792644096/7CCF0nEW_normal.jpg', 'Omar Abdullah', 'Former CM of J&K; MLA from Beerwah, Budgam (the gateway to Gulmarg). Tweets are all my own now, Retweets just mean something interested me.', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(18, '143766231', NULL, 'http://twitter.com/dtptraffic', 'http://pbs.twimg.com/profile_images/1231599477/DTP-Logo_normal.jpg', 'Delhi Traffic Police', '24x7 Control Room : +91-11-25844444', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(19, '60937837', NULL, 'http://twitter.com/Swamy39', 'http://pbs.twimg.com/profile_images/452218891/subramanian-swamy_normal.jpg', 'Subramanian Swamy', 'Fmr. Union Cabinet Minister & five term MP, Harvard Ph.D in Economics; Professor, BJP member, I give as good as I get', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(20, '405427035', NULL, 'http://twitter.com/ArvindKejriwal', 'http://pbs.twimg.com/profile_images/2438376986/h35y4r0aw5n7tph9xcat_normal.jpeg', 'Arvind Kejriwal', 'Political revolution in India has begun. Bharat jaldi badlega. Arvind Kejriwal.', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(21, '113419517', NULL, 'http://twitter.com/iHrithik', 'http://pbs.twimg.com/profile_images/642201680734384128/lYK045_h_normal.jpg', 'Hrithik Roshan', 'Man on mission- to live the best life possible come what may.', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(22, '145125358', NULL, 'http://twitter.com/SrBachchan', 'http://pbs.twimg.com/profile_images/634804687074496512/GIrZ9Gc0_normal.jpg', 'Amitabh Bachchan', 'Actor ... well at least some are STILL saying so !!', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(23, '20751449', NULL, 'http://twitter.com/the_hindu', 'http://pbs.twimg.com/profile_images/627376030282416128/pYl_LmcW_normal.jpg', 'The Hindu', 'News feeds from India''s National Newspaper', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(24, '24705126', NULL, 'http://twitter.com/ShashiTharoor', 'http://pbs.twimg.com/profile_images/669857065938976768/OGSRagoY_normal.png', 'Shashi Tharoor', 'MP for Thiruvananthapuram. Author of 15 books. Former Minister of State,Govt.of India.  Former UnderSecretaryGeneral,UnitedNations. RTs do not imply endorsement', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(25, '31348594', NULL, 'http://twitter.com/akshaykumar', 'http://pbs.twimg.com/profile_images/655247250009018368/9ksoXmKa_normal.jpg', 'Akshay Kumar', '', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(26, '37034483', NULL, 'http://twitter.com/ndtv', 'http://pbs.twimg.com/profile_images/570440108424171520/QuGYd7jH_normal.png', 'NDTV', 'Breaking news alerts from India', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(27, '135421739', NULL, 'http://twitter.com/sachin_rt', 'http://pbs.twimg.com/profile_images/2504398687/344204969_normal.jpg', 'sachin tendulkar', 'Proud Indian', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(28, '43568964', NULL, 'http://twitter.com/virsanghvi', 'http://pbs.twimg.com/profile_images/570684447537938432/DSnADpOX_normal.jpeg', 'vir sanghvi', 'Journalist, TV anchor', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(29, '76294950', NULL, 'http://twitter.com/AnupamPkher', 'http://pbs.twimg.com/profile_images/659326808177942528/cLyrllDZ_normal.jpg', 'Anupam Kher', 'Actor/Teacher/Author/Motivational Speaker/@UN_Women Champion of Gender Equality @HeForShe', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(30, '75509967', NULL, 'http://twitter.com/rahulkanwal', 'http://pbs.twimg.com/profile_images/501605397094862848/wTyNZMSu_normal.jpeg', 'Rahul Kanwal', 'Managing Editor @IndiaToday & @Aajtak Anchor Newsroom & Seedhi Baat. https://t.co/1tBPfxo0Zf Proud Army Brat. Explorer. Fiercely non-aligned.', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(31, '277434037', NULL, 'http://twitter.com/RNTata2000', 'http://pbs.twimg.com/profile_images/1655289586/RNT-Image_01_normal.jpg', 'Ratan N. Tata', 'Former Chairman of Tata Group. Personal interests : - aviation, automobiles, scuba diving and architectural design.', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(32, '134758540', NULL, 'http://twitter.com/timesofindia', 'http://pbs.twimg.com/profile_images/632887540073148420/VyXkcpwM_normal.jpg', 'Times of India', 'News. Views. Analyses. Conversations. India’s No.1 digital news destination, world’s largest-selling English newspaper.', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(33, '19895282', NULL, 'http://twitter.com/arrahman', 'http://pbs.twimg.com/profile_images/597865661264596992/NnOqToId_normal.jpg', 'A.R.Rahman', 'Grammy and Academy Award winning musician', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(34, '44588485', NULL, 'http://twitter.com/chetan_bhagat', 'http://pbs.twimg.com/profile_images/522590098320142336/K70JqZ_E_normal.jpeg', 'Chetan Bhagat', 'The CB family!', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(35, '19929890', NULL, 'http://twitter.com/BDUTT', 'http://pbs.twimg.com/profile_images/649787704146833408/HLWlF7GP_normal.jpg', 'barkha dutt', 'Editor & Journalist. Wannabe Lawyer. Argumentative! Yaaron Ka Yaar. Named by @TIME as one of best #twitter140 feeds. On @FP_Magazine list of top 100 ''Womerati''', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(36, '71201743', NULL, 'http://twitter.com/imVkohli', 'http://pbs.twimg.com/profile_images/614345481297096704/a3PYZNbA_normal.jpg', 'Virat Kohli ', 'The Official twitter account of Virat Kohli, Indian cricketer,gamer,car lover,loves soccer and an enthusiast', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(37, '34197952', NULL, 'http://twitter.com/anandmahindra', 'http://pbs.twimg.com/profile_images/619739923654967296/b86Fvz9C_normal.jpg', 'anand mahindra', 'Chairman and Managing Director, Mahindra Group', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(38, '56304605', NULL, 'http://twitter.com/sardesairajdeep', 'http://pbs.twimg.com/profile_images/639435470858940417/lJvWCh_v_normal.jpg', 'Rajdeep Sardesai', 'Journalist, anchor, author: 2014: The Election That Changed India. mail: rajdeepsardesai52@gmail.com. blog at https://t.co/L2nING3oVB', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(39, '240649814', NULL, 'http://twitter.com/TimesNow', 'http://pbs.twimg.com/profile_images/548508720888442881/T4tYT9xR_normal.jpeg', 'TIMES NOW', 'Times Now is India’s most watched English news channel. Follow us for breaking news & updates from India.', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(40, '711694309', NULL, 'http://twitter.com/AamAadmiParty', 'http://pbs.twimg.com/profile_images/601997295496769536/htnZp04D_normal.jpg', 'Aam Aadmi Party- AAP', '?????????? ????? ???? ????? ???? ???? ????? ????? ?? ? ?? ????? ? http://t.co/2sbFV0qvbE', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(41, '183230911', NULL, 'http://twitter.com/aliaa08', 'http://pbs.twimg.com/profile_images/671336419885842432/wZnKAzWE_normal.jpg', 'Alia Bhatt', 'Beautifully chaotic :)', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(42, '68977380', NULL, 'http://twitter.com/thekiranbedi', 'http://pbs.twimg.com/profile_images/451311379639574528/KEwEfRFg_normal.jpeg', 'Kiran Bedi', 'IPS (retd),Magsaysay Awardee,former UN Police Advisor,Asian Tennis Champion,Law Grad,PhD-IIT Delhi,Nehru Fellow,Author, Voted Most Trusted,Admired Woman,2 NGOs', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(43, '15093629', NULL, 'http://twitter.com/shekharkapur', 'http://pbs.twimg.com/profile_images/2385194922/bnd4twa982tugs4xdsfi_normal.jpeg', 'Shekhar Kapur', 'Neither prejudiced by the past, nor in fear of the future. The moment. Only the moment. \nhttp://t.co/th0dJDENCl', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(44, '101695592', NULL, 'http://twitter.com/deepikapadukone', 'http://pbs.twimg.com/profile_images/672729025916313600/lx7SZfKK_normal.jpg', 'Deepika Padukone', 'Live,Love,Laugh... https://t.co/W632g3qOKi', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(45, '18681139', NULL, 'http://twitter.com/priyankachopra', 'http://pbs.twimg.com/profile_images/637534621459181568/TAqiJD2s_normal.png', 'PRIYANKA', 'ACTOR...\nRECORDING ARTIST..\nDREAMER..\nACHIEVER..', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(46, '20609518', NULL, 'http://twitter.com/DalaiLama', 'http://pbs.twimg.com/profile_images/529214699041067008/fqPBAr5s_normal.jpeg', 'Dalai Lama', 'Welcome to the official twitter page of the Office of His Holiness the 14th Dalai Lama.', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(47, '39743812', NULL, 'http://twitter.com/EconomicTimes', 'http://pbs.twimg.com/profile_images/3058389561/59776ba42f417ecab27de0262f048df3_normal.jpeg', 'EconomicTimes', 'The No. 1 Business Daily in India bringing you the latest #news updates on PM #ModiInUK and LIVE coverage of #politics #economy #markets #technology', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(48, '36327407', NULL, 'http://twitter.com/htTweets', 'http://pbs.twimg.com/profile_images/455557542572072960/F68yUL5q_normal.jpeg', 'Hindustan Times', 'One of India''s largest media companies. Latest news from around the world. Retweets are not endorsements.', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(49, '2183816041', NULL, 'http://twitter.com/arunjaitley', 'http://pbs.twimg.com/profile_images/378800000828197225/f1d53aeab8f0534c7d73b0fbd5651130_normal.png', 'Arun Jaitley', 'Finance Minister, Minister of Corporate Affairs and Minister of Information and Broadcasting, Government of India', 'ashish.gupta@relesol.com', NULL, 'Twitter', 1),
(50, '113278275', NULL, 'http://twitter.com/bomanirani', 'http://pbs.twimg.com/profile_images/664342899920760832/_HMAYCg1_normal.jpg', 'Boman Irani', 'work in progress', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(51, '56631494', NULL, 'http://twitter.com/shahidkapoor', 'http://pbs.twimg.com/profile_images/661793461155323905/Snd7grjc_normal.jpg', 'Shahid Kapoor', 'Actor, Dreamer, Lover, Believer .', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(52, '471741741', NULL, 'http://twitter.com/PMOIndia', 'http://pbs.twimg.com/profile_images/471275189364203520/Wei_kIj__normal.jpeg', 'PMO India', 'Office of the Prime Minister of India', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(53, '88856792', NULL, 'http://twitter.com/aamir_khan', 'http://pbs.twimg.com/profile_images/542685126648274945/A1odhC4l_normal.jpeg', 'Aamir Khan', 'Actor.', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(54, '101311381', NULL, 'http://twitter.com/iamsrk', 'http://pbs.twimg.com/profile_images/661679664/keep_it_onn_normal.jpg', 'Shah Rukh Khan', '', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(55, '18839785', NULL, 'http://twitter.com/narendramodi', 'http://pbs.twimg.com/profile_images/454954067488288768/fU6NY-EI_normal.jpeg', 'Narendra Modi', 'Prime Minister of India', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(56, '6509832', NULL, 'http://twitter.com/ibnlive', 'http://pbs.twimg.com/profile_images/671614090867904512/tduAKz9C_normal.jpg', 'CNN-IBN News', 'Latest news alerts from India', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(57, '132385468', NULL, 'http://twitter.com/BeingSalmanKhan', 'http://pbs.twimg.com/profile_images/838562307/IMG00882-20100416-0034_normal.jpg', 'Salman Khan', 'Film actor, artist, painter, humanitarian', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(58, '97865628', NULL, 'http://twitter.com/FarOutAkhtar', 'http://pbs.twimg.com/profile_images/671456036687994880/Dx3zDlJG_normal.jpg', 'Farhan Akhtar', 'Writer. Director. Actor. Singer/Songwriter. Founder- MARD Initiative & UNwomen Goodwill Ambassador(South Asia)', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(59, '138822469', NULL, 'http://twitter.com/abdullah_omar', 'http://pbs.twimg.com/profile_images/654622071792644096/7CCF0nEW_normal.jpg', 'Omar Abdullah', 'Former CM of J&K; MLA from Beerwah, Budgam (the gateway to Gulmarg). Tweets are all my own now, Retweets just mean something interested me.', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(60, '143766231', NULL, 'http://twitter.com/dtptraffic', 'http://pbs.twimg.com/profile_images/1231599477/DTP-Logo_normal.jpg', 'Delhi Traffic Police', '24x7 Control Room : +91-11-25844444', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(61, '60937837', NULL, 'http://twitter.com/Swamy39', 'http://pbs.twimg.com/profile_images/452218891/subramanian-swamy_normal.jpg', 'Subramanian Swamy', 'Fmr. Union Cabinet Minister & five term MP, Harvard Ph.D in Economics; Professor, BJP member, I give as good as I get', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(62, '405427035', NULL, 'http://twitter.com/ArvindKejriwal', 'http://pbs.twimg.com/profile_images/2438376986/h35y4r0aw5n7tph9xcat_normal.jpeg', 'Arvind Kejriwal', 'Political revolution in India has begun. Bharat jaldi badlega. Arvind Kejriwal.', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(63, '113419517', NULL, 'http://twitter.com/iHrithik', 'http://pbs.twimg.com/profile_images/642201680734384128/lYK045_h_normal.jpg', 'Hrithik Roshan', 'Man on mission- to live the best life possible come what may.', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(64, '145125358', NULL, 'http://twitter.com/SrBachchan', 'http://pbs.twimg.com/profile_images/634804687074496512/GIrZ9Gc0_normal.jpg', 'Amitabh Bachchan', 'Actor ... well at least some are STILL saying so !!', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(65, '20751449', NULL, 'http://twitter.com/the_hindu', 'http://pbs.twimg.com/profile_images/627376030282416128/pYl_LmcW_normal.jpg', 'The Hindu', 'News feeds from India''s National Newspaper', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(66, '24705126', NULL, 'http://twitter.com/ShashiTharoor', 'http://pbs.twimg.com/profile_images/669857065938976768/OGSRagoY_normal.png', 'Shashi Tharoor', 'MP for Thiruvananthapuram. Author of 15 books. Former Minister of State,Govt.of India.  Former UnderSecretaryGeneral,UnitedNations. RTs do not imply endorsement', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(67, '31348594', NULL, 'http://twitter.com/akshaykumar', 'http://pbs.twimg.com/profile_images/655247250009018368/9ksoXmKa_normal.jpg', 'Akshay Kumar', '', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(68, '37034483', NULL, 'http://twitter.com/ndtv', 'http://pbs.twimg.com/profile_images/570440108424171520/QuGYd7jH_normal.png', 'NDTV', 'Breaking news alerts from India', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(69, '135421739', NULL, 'http://twitter.com/sachin_rt', 'http://pbs.twimg.com/profile_images/2504398687/344204969_normal.jpg', 'sachin tendulkar', 'Proud Indian', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(70, '43568964', NULL, 'http://twitter.com/virsanghvi', 'http://pbs.twimg.com/profile_images/570684447537938432/DSnADpOX_normal.jpeg', 'vir sanghvi', 'Journalist, TV anchor', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(71, '76294950', NULL, 'http://twitter.com/AnupamPkher', 'http://pbs.twimg.com/profile_images/659326808177942528/cLyrllDZ_normal.jpg', 'Anupam Kher', 'Actor/Teacher/Author/Motivational Speaker/@UN_Women Champion of Gender Equality @HeForShe', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(72, '75509967', NULL, 'http://twitter.com/rahulkanwal', 'http://pbs.twimg.com/profile_images/501605397094862848/wTyNZMSu_normal.jpeg', 'Rahul Kanwal', 'Managing Editor @IndiaToday & @Aajtak Anchor Newsroom & Seedhi Baat. https://t.co/1tBPfxo0Zf Proud Army Brat. Explorer. Fiercely non-aligned.', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(73, '277434037', NULL, 'http://twitter.com/RNTata2000', 'http://pbs.twimg.com/profile_images/1655289586/RNT-Image_01_normal.jpg', 'Ratan N. Tata', 'Former Chairman of Tata Group. Personal interests : - aviation, automobiles, scuba diving and architectural design.', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(74, '134758540', NULL, 'http://twitter.com/timesofindia', 'http://pbs.twimg.com/profile_images/632887540073148420/VyXkcpwM_normal.jpg', 'Times of India', 'News. Views. Analyses. Conversations. India’s No.1 digital news destination, world’s largest-selling English newspaper.', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(75, '19895282', NULL, 'http://twitter.com/arrahman', 'http://pbs.twimg.com/profile_images/597865661264596992/NnOqToId_normal.jpg', 'A.R.Rahman', 'Grammy and Academy Award winning musician', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(76, '44588485', NULL, 'http://twitter.com/chetan_bhagat', 'http://pbs.twimg.com/profile_images/522590098320142336/K70JqZ_E_normal.jpeg', 'Chetan Bhagat', 'The CB family!', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(77, '19929890', NULL, 'http://twitter.com/BDUTT', 'http://pbs.twimg.com/profile_images/649787704146833408/HLWlF7GP_normal.jpg', 'barkha dutt', 'Editor & Journalist. Wannabe Lawyer. Argumentative! Yaaron Ka Yaar. Named by @TIME as one of best #twitter140 feeds. On @FP_Magazine list of top 100 ''Womerati''', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(78, '71201743', NULL, 'http://twitter.com/imVkohli', 'http://pbs.twimg.com/profile_images/614345481297096704/a3PYZNbA_normal.jpg', 'Virat Kohli ', 'The Official twitter account of Virat Kohli, Indian cricketer,gamer,car lover,loves soccer and an enthusiast', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(79, '34197952', NULL, 'http://twitter.com/anandmahindra', 'http://pbs.twimg.com/profile_images/619739923654967296/b86Fvz9C_normal.jpg', 'anand mahindra', 'Chairman and Managing Director, Mahindra Group', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(80, '56304605', NULL, 'http://twitter.com/sardesairajdeep', 'http://pbs.twimg.com/profile_images/639435470858940417/lJvWCh_v_normal.jpg', 'Rajdeep Sardesai', 'Journalist, anchor, author: 2014: The Election That Changed India. mail: rajdeepsardesai52@gmail.com. blog at https://t.co/L2nING3oVB', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(81, '240649814', NULL, 'http://twitter.com/TimesNow', 'http://pbs.twimg.com/profile_images/548508720888442881/T4tYT9xR_normal.jpeg', 'TIMES NOW', 'Times Now is India’s most watched English news channel. Follow us for breaking news & updates from India.', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(82, '711694309', NULL, 'http://twitter.com/AamAadmiParty', 'http://pbs.twimg.com/profile_images/601997295496769536/htnZp04D_normal.jpg', 'Aam Aadmi Party- AAP', '?????????? ????? ???? ????? ???? ???? ????? ????? ?? ? ?? ????? ? http://t.co/2sbFV0qvbE', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(83, '183230911', NULL, 'http://twitter.com/aliaa08', 'http://pbs.twimg.com/profile_images/671336419885842432/wZnKAzWE_normal.jpg', 'Alia Bhatt', 'Beautifully chaotic :)', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(84, '68977380', NULL, 'http://twitter.com/thekiranbedi', 'http://pbs.twimg.com/profile_images/451311379639574528/KEwEfRFg_normal.jpeg', 'Kiran Bedi', 'IPS (retd),Magsaysay Awardee,former UN Police Advisor,Asian Tennis Champion,Law Grad,PhD-IIT Delhi,Nehru Fellow,Author, Voted Most Trusted,Admired Woman,2 NGOs', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(85, '15093629', NULL, 'http://twitter.com/shekharkapur', 'http://pbs.twimg.com/profile_images/2385194922/bnd4twa982tugs4xdsfi_normal.jpeg', 'Shekhar Kapur', 'Neither prejudiced by the past, nor in fear of the future. The moment. Only the moment. \nhttp://t.co/th0dJDENCl', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(86, '101695592', NULL, 'http://twitter.com/deepikapadukone', 'http://pbs.twimg.com/profile_images/672729025916313600/lx7SZfKK_normal.jpg', 'Deepika Padukone', 'Live,Love,Laugh... https://t.co/W632g3qOKi', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(87, '18681139', NULL, 'http://twitter.com/priyankachopra', 'http://pbs.twimg.com/profile_images/637534621459181568/TAqiJD2s_normal.png', 'PRIYANKA', 'ACTOR...\nRECORDING ARTIST..\nDREAMER..\nACHIEVER..', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(88, '20609518', NULL, 'http://twitter.com/DalaiLama', 'http://pbs.twimg.com/profile_images/529214699041067008/fqPBAr5s_normal.jpeg', 'Dalai Lama', 'Welcome to the official twitter page of the Office of His Holiness the 14th Dalai Lama.', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(89, '39743812', NULL, 'http://twitter.com/EconomicTimes', 'http://pbs.twimg.com/profile_images/3058389561/59776ba42f417ecab27de0262f048df3_normal.jpeg', 'EconomicTimes', 'The No. 1 Business Daily in India bringing you the latest #news updates on PM #ModiInUK and LIVE coverage of #politics #economy #markets #technology', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(90, '36327407', NULL, 'http://twitter.com/htTweets', 'http://pbs.twimg.com/profile_images/455557542572072960/F68yUL5q_normal.jpeg', 'Hindustan Times', 'One of India''s largest media companies. Latest news from around the world. Retweets are not endorsements.', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(91, '2183816041', NULL, 'http://twitter.com/arunjaitley', 'http://pbs.twimg.com/profile_images/378800000828197225/f1d53aeab8f0534c7d73b0fbd5651130_normal.png', 'Arun Jaitley', 'Finance Minister, Minister of Corporate Affairs and Minister of Information and Broadcasting, Government of India', 'ashishgupta11@gmail.com', NULL, 'Twitter', 1),
(92, 'AaIwBVZzQWtJ2TyiAzj1UTGtsQkw8dZnGFJ--vLyqAqIZHDYGjj5Yx9_rWDQ4S_10r7FJhXMPKvi6DEG-VZnkTPStYOb-7Jl8AgXCWYW0WGvvw', NULL, 'https://www.facebook.com/profile.php?id=AaIwBVZzQWtJ2TyiAzj1UTGtsQkw8dZnGFJ--vLyqAqIZHDYGjj5Yx9_rWDQ4S_10r7FJhXMPKvi6DEG-VZnkTPStYOb-7Jl8AgXCWYW0WGvvw', 'https://graph.facebook.com/AaIwBVZzQWtJ2TyiAzj1UTGtsQkw8dZnGFJ--vLyqAqIZHDYGjj5Yx9_rWDQ4S_10r7FJhXMPKvi6DEG-VZnkTPStYOb-7Jl8AgXCWYW0WGvvw/picture?type=square', 'Ashish Gupta', NULL, 'ashish.gupta@relesol.com', NULL, 'Facebook', 1),
(93, 'AaJhcW4e609QQ20r9vIpsk-Z4JJMjcFrPzYnZAIm0Q-4bw-rgGvkAOsyh2sZFrDmqwVfyr_qwIjQoDtiRbhalfh9QFg4bmBwscDfxLkSxJky7A', NULL, 'https://www.facebook.com/profile.php?id=AaJhcW4e609QQ20r9vIpsk-Z4JJMjcFrPzYnZAIm0Q-4bw-rgGvkAOsyh2sZFrDmqwVfyr_qwIjQoDtiRbhalfh9QFg4bmBwscDfxLkSxJky7A', 'https://graph.facebook.com/AaJhcW4e609QQ20r9vIpsk-Z4JJMjcFrPzYnZAIm0Q-4bw-rgGvkAOsyh2sZFrDmqwVfyr_qwIjQoDtiRbhalfh9QFg4bmBwscDfxLkSxJky7A/picture?type=square', 'Ashish Gupta', NULL, 'ashish.gupta@relesol.com', NULL, 'Facebook', 1),
(94, 'AaLVaxy2DKNKMdDy5X7Q0_gE74DR1ZZckpiE4HQ-sOTAdHjslA6Sp6O3HpylqcyDegP7Y4H6Rl8RQUcoZICQo6FG6snlPle6rWeffs-x8WIfpA', NULL, 'https://www.facebook.com/profile.php?id=AaLVaxy2DKNKMdDy5X7Q0_gE74DR1ZZckpiE4HQ-sOTAdHjslA6Sp6O3HpylqcyDegP7Y4H6Rl8RQUcoZICQo6FG6snlPle6rWeffs-x8WIfpA', 'https://graph.facebook.com/AaLVaxy2DKNKMdDy5X7Q0_gE74DR1ZZckpiE4HQ-sOTAdHjslA6Sp6O3HpylqcyDegP7Y4H6Rl8RQUcoZICQo6FG6snlPle6rWeffs-x8WIfpA/picture?type=square', 'Ashish Gupta', NULL, 'ashish.gupta@relesol.com', NULL, 'Facebook', 1),
(95, 'AaLeVkdGYqDZz0AYHq7Thbbv1GKGl2zqBH7KPQD_RLvzjrA7NDip_IrHBaBuVnq14T75iy-eDL0WjWxUUk0NXuyYDj2-B_FiXh2qIYh7Rgr-zw', NULL, 'https://www.facebook.com/profile.php?id=AaLeVkdGYqDZz0AYHq7Thbbv1GKGl2zqBH7KPQD_RLvzjrA7NDip_IrHBaBuVnq14T75iy-eDL0WjWxUUk0NXuyYDj2-B_FiXh2qIYh7Rgr-zw', 'https://graph.facebook.com/AaLeVkdGYqDZz0AYHq7Thbbv1GKGl2zqBH7KPQD_RLvzjrA7NDip_IrHBaBuVnq14T75iy-eDL0WjWxUUk0NXuyYDj2-B_FiXh2qIYh7Rgr-zw/picture?type=square', 'Ashish Gupta', NULL, 'ashish.gupta@relesol.com', NULL, 'Facebook', 1),
(96, 'AaIdHbIg0Go55_jdUu9OiEQsbsK9sXhoAYeYbOd3j6YCBr5ZWz2julYQU3SKdOPdw4DWn27TLtQhcpVbOyFQyQrXF253lk4W8KXMR71Qa01kpg', NULL, 'https://www.facebook.com/profile.php?id=AaIdHbIg0Go55_jdUu9OiEQsbsK9sXhoAYeYbOd3j6YCBr5ZWz2julYQU3SKdOPdw4DWn27TLtQhcpVbOyFQyQrXF253lk4W8KXMR71Qa01kpg', 'https://graph.facebook.com/AaIdHbIg0Go55_jdUu9OiEQsbsK9sXhoAYeYbOd3j6YCBr5ZWz2julYQU3SKdOPdw4DWn27TLtQhcpVbOyFQyQrXF253lk4W8KXMR71Qa01kpg/picture?type=square', 'Ashish Gupta', NULL, 'ashish.gupta@relesol.com', NULL, 'Facebook', 1),
(97, 'AaIHBacxSIaJAj8E9sEjE2_4YBQEdSoxMM-nj4X2zlwMeu2dOhE0ofMibNCuNZsDZ08y2Gbq0yDf8jwkRDUf_YBPn7qGpe1l8r1UG59l9yeMKg', NULL, 'https://www.facebook.com/profile.php?id=AaIHBacxSIaJAj8E9sEjE2_4YBQEdSoxMM-nj4X2zlwMeu2dOhE0ofMibNCuNZsDZ08y2Gbq0yDf8jwkRDUf_YBPn7qGpe1l8r1UG59l9yeMKg', 'https://graph.facebook.com/AaIHBacxSIaJAj8E9sEjE2_4YBQEdSoxMM-nj4X2zlwMeu2dOhE0ofMibNCuNZsDZ08y2Gbq0yDf8jwkRDUf_YBPn7qGpe1l8r1UG59l9yeMKg/picture?type=square', 'Ashish Gupta', NULL, 'ashish.gupta@relesol.com', NULL, 'Facebook', 1),
(98, '926701', NULL, 'http://twitter.com/claytonjohnson', 'http://pbs.twimg.com/profile_images/540258404988510210/a87hXedt_normal.png', 'Clayton Johnson', 'I''m Clayton Johnson, I make things happen. The dude @the_hoth.\n \n#hustle #champagne #internets', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(99, '2981692238', NULL, 'http://twitter.com/teen_India', 'http://pbs.twimg.com/profile_images/608715610126598144/1PT8tbIi_normal.jpg', 'Lizaa Hazarika', '#freewill #18th #busybee #adventurous  #wonderer #paponist', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(100, '2883022748', NULL, 'http://twitter.com/hennaraydesign', 'http://pbs.twimg.com/profile_images/643743285530505216/QdAmZqGs_normal.jpg', 'Henna Ray', 'Entrepreneur @designhilldh | Business Analysis, Brand Management, graphic designing and financial modeling are my forte.', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(101, '2981123715', NULL, 'http://twitter.com/NeuvooMarDen', 'http://pbs.twimg.com/profile_images/556092919799480322/1mlLBGXJ_normal.png', 'Marketing Denver', 'Looking for a Marketing job  in Denver? Check out our website http://t.co/GXMbpMC1uw', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(102, '225694411', NULL, 'http://twitter.com/ijeetujain', 'http://pbs.twimg.com/profile_images/634593333159948288/EbZcp2tW_normal.jpg', 'Jitender Bhandari', 'Dreamer. Thinker. Doer. Entrepreneur. Founder https://t.co/gmREHWU3pd\nDon''t hold yourself back. Dream & work to make something big.\n?????? ? @BolteRahoo', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(103, '1192219334', NULL, 'http://twitter.com/BrajeshJangid', 'http://pbs.twimg.com/profile_images/565446591104835584/DWgxFUvK_normal.jpeg', 'Brajesh Jangid', '', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(104, '2849075205', NULL, 'http://twitter.com/AlphaGammaHQ', 'http://pbs.twimg.com/profile_images/527259338679664640/G4fipzPo_normal.png', 'AlphaGamma', 'Business portal for #millennials. We write about #entrepreneurship, #finance and #business #opportunities. Want to get more clients or investors? Let us know!', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(105, '2652231836', NULL, 'http://twitter.com/kato034', 'http://pbs.twimg.com/profile_images/624711163599695872/z7mNWLcX_normal.jpg', '????@??????', '', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(106, '4252486813', NULL, 'http://twitter.com/anujmishra1993', 'http://pbs.twimg.com/profile_images/666096637643657221/a2dTKFBe_normal.jpg', 'Anuj Mishra', '', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(107, '2777053319', NULL, 'http://twitter.com/landonharris631', 'http://pbs.twimg.com/profile_images/514245903021256705/8215ERXR_normal.jpeg', 'Landon Harris', '', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(108, '242411811', NULL, 'http://twitter.com/JustReminding', 'http://pbs.twimg.com/profile_images/1224713694/tv_justreminding_normal.png', 'Just Reminding', 'What we think about: Glee, Conan, TopGear, Mad Men, The Walking Dead, Survivor, Amazing Race, Modern Family, Hawaii Five O, & much much more!!!!!!', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(109, '56304605', NULL, 'http://twitter.com/sardesairajdeep', 'http://pbs.twimg.com/profile_images/639435470858940417/lJvWCh_v_normal.jpg', 'Rajdeep Sardesai', 'Journalist, anchor, author: 2014: The Election That Changed India. mail: rajdeepsardesai52@gmail.com. blog at https://t.co/L2nING3oVB', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(110, '187098402', NULL, 'http://twitter.com/MsCrucids', 'http://pbs.twimg.com/profile_images/672369397860728832/SvRzcVMD_normal.jpg', 'crucids ??', 'One of a kind, just like you.', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(111, '2434858177', NULL, 'http://twitter.com/aliimeducation', 'http://pbs.twimg.com/profile_images/557353637559541760/0bTcFq1A_normal.png', 'ALIIM', 'Over 2 million Syrian refugee children have been out of school for 3-5 Yrs. #SmartphoneSchools Crowdfunding now live! Donate at https://t.co/YvmF4s64MV', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(112, '3046059654', NULL, 'http://twitter.com/iammiller1', 'http://pbs.twimg.com/profile_images/587942240929976320/1v9rosuT_normal.jpg', 'Roy Miller', 'Roy Miller is business and graphic design consultant, blogger.In addition,he''s passionate to contribute tips to the startups & entrepreneurs.', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(113, '2402328356', NULL, 'http://twitter.com/krowdster', 'http://pbs.twimg.com/profile_images/520779200454619136/a0tCDQPQ_normal.png', 'Krowdster', '#Crowdfunding Campaign Optimization & Promotion App. Grow your Crowd on Twitter, Find Influencers, Discover Trending Content & Download Media Lists', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(114, '2995722256', NULL, 'http://twitter.com/WebputationEU', 'http://pbs.twimg.com/profile_images/586477216881487872/mMfrsBVs_normal.jpg', 'Webputation', 'Webputation - Agentur für #DigitalMarketing & #Reputationsmanagent. #ContentMarketing #SocialMedia #Strategy #Reputation #Marketing https://t.co/tVAMLrxmHt', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(115, '540217054', NULL, 'http://twitter.com/anuragmishra030', 'http://pbs.twimg.com/profile_images/666592484093399045/DIlixSjE_normal.jpg', 'Anurag Mishra', 'Blogger cum Entrepreneur. Digital Marketing Consultant and Strategist. Founder of @dmediaglobe Social Media Enthusiast #WordPress #Blogging #SEM #SEO #marketing', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(116, '47529608', NULL, 'http://twitter.com/ggascon', 'http://pbs.twimg.com/profile_images/658787475108724741/xqDw-jG5_normal.jpg', 'Greg Gascon', 'Marketing // Social Media Automation // Consultancy', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(117, '828262964', NULL, 'http://twitter.com/gasmoney124', 'http://pbs.twimg.com/profile_images/647990861691797504/PeaHzypZ_normal.jpg', 'Vickie Smith', 'I was hoping to cover my car payment each month. Itworks!did it! I''m loving Those Crazy Wrap Things! I''m working on a transportation project. Details soon$$$', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(118, '58800236', NULL, 'http://twitter.com/josefholm', 'http://pbs.twimg.com/profile_images/622183113809006592/7Tua100p_normal.jpg', 'Josef Holm', 'Tech Entrepreneur and Crowdfunding Advocat. Founder & CEO @Krowdster, @Tubestart, Software Architect, Dog Lover', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(119, '169334569', NULL, 'http://twitter.com/leomenjr', 'http://pbs.twimg.com/profile_images/466877447070162945/J4MGnlFb_normal.jpeg', 'Leo Mendoza Jr.', '#DigitalMarketing, #SEO, #SEM, #SMM, #PPC, #StartupPH,  #Startups, #Entrepreneur, #Incubator, Regional Partner @ FasterCapital, Techie enthusiast.', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(120, '84273114', NULL, 'http://twitter.com/blogginginside', 'http://pbs.twimg.com/profile_images/577548410418429952/eoquj2im_normal.png', 'Blogging Inside', 'Interests: #WordPress #Themes and #Plugins #Webdesign #Blogging Martial Arts #Neuromarketing #Guitars Impressum unter: http://t.co/6NZyww552F', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(121, '3702994035', NULL, 'http://twitter.com/markchev_mr', 'http://pbs.twimg.com/profile_images/646527759171252224/CoeORz10_normal.jpg', 'semichev871', 'Buy 2000 INSTAGRAM FOLLOWERS just $15. and get 500 LIKES  BONUS. more info. click here  https://t.co/ZSsM2Vfuci', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(122, '3758252894', NULL, 'http://twitter.com/mylike28', 'http://pbs.twimg.com/profile_images/657154353258590208/2188Gigj_normal.jpg', 'Smartboy', '', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(123, '4201833747', NULL, 'http://twitter.com/OlgaSavcuk', 'http://pbs.twimg.com/profile_images/666264045985669121/QoJWcnFH_normal.jpg', 'Olga Savcuk', 'Helpful & meaningful business success resources, focusing on finance & accounting. Also essential advice on how to own prosperous business. Follow me', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(124, '2239263571', NULL, 'http://twitter.com/tanyanayyar', 'http://pbs.twimg.com/profile_images/616673618668482560/G6e7otar_normal.jpg', 'Tanya Nayyar', 'Freelance digital marketing & social media consultant, blogger, novelist based in Brighton, UK.', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(125, '143770386', NULL, 'http://twitter.com/shrimish', 'http://pbs.twimg.com/profile_images/638594030054436864/7RYEG7zW_normal.jpg', 'SM', 'Strategist, Lawyer, Runner (Half Marathon), Social worker. Tweets with social/ political/ business relevance are shared but not endorsed.', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(126, '68977380', NULL, 'http://twitter.com/thekiranbedi', 'http://pbs.twimg.com/profile_images/451311379639574528/KEwEfRFg_normal.jpeg', 'Kiran Bedi', 'IPS (retd),Magsaysay Awardee,former UN Police Advisor,Asian Tennis Champion,Law Grad,PhD-IIT Delhi,Nehru Fellow,Author, Voted Most Trusted,Admired Woman,2 NGOs', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(127, '626629546', NULL, 'http://twitter.com/newimarketing', 'http://pbs.twimg.com/profile_images/502577184188293120/tPwNYOHt_normal.jpeg', 'NIM', 'New service By @jenkellyjen #inspirational #quotes tweeted from your account. Save time. Save the search. 30-days free - https://t.co/ZbPU0QrK9F', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(128, '24705126', NULL, 'http://twitter.com/ShashiTharoor', 'http://pbs.twimg.com/profile_images/669857065938976768/OGSRagoY_normal.png', 'Shashi Tharoor', 'MP for Thiruvananthapuram. Author of 15 books. Former Minister of State,Govt.of India.  Former UnderSecretaryGeneral,UnitedNations. RTs do not imply endorsement', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(129, '2319194739', NULL, 'http://twitter.com/Akkicena1', 'http://pbs.twimg.com/profile_images/674115454512836608/TTcFmfOT_normal.jpg', 'Ankit Roy', 'Digital marketing executive at https://t.co/L8ruoZi0Kq. Social media expert.  #startup & #entrepreneur admirer \nhttps://t.co/QXHBCrevW0\nhttps://t.co/h9JfzU0nqO', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1),
(130, '405427035', NULL, 'http://twitter.com/ArvindKejriwal', 'http://pbs.twimg.com/profile_images/2438376986/h35y4r0aw5n7tph9xcat_normal.jpeg', 'Arvind Kejriwal', 'Political revolution in India has begun. Bharat jaldi badlega. Arvind Kejriwal.', 'abhishek.singh@relesol.com', NULL, 'Twitter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
`stateID` smallint(5) unsigned NOT NULL,
  `stateName` varchar(50) NOT NULL DEFAULT '',
  `countryID` varchar(3) NOT NULL,
  `latitude` double NOT NULL DEFAULT '0',
  `longitude` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`stateID`, `stateName`, `countryID`, `latitude`, `longitude`) VALUES
(1, 'Andhra Pradesh', 'IND', 17.38, 78.47),
(2, 'Arunachal Pradesh', 'IND', 27.57, 93.85),
(3, 'Assam', 'IND', 24.82, 92.8),
(4, 'Bihar', 'IND', 25.6, 85.12),
(5, 'Chandigarh', 'IND', 30.74, 76.79),
(6, 'Chhattisgarh', 'IND', 21.18, 81.28),
(7, 'Delhi', 'IND', 28.67, 77.22),
(8, 'Goa', 'IND', 15.27, 73.92),
(9, 'Gujarat', 'IND', 23.03, 72.62),
(10, 'Haryana', 'IND', 28.47, 77.03),
(11, 'Himachal Pradesh', 'IND', 31.1, 77.17),
(12, 'Jammu and Kashmir', 'IND', 33.8, 74.26),
(13, 'Jharkhand', 'IND', 23.35, 85.33),
(14, 'Karnataka', 'IND', 12.98, 77.58),
(15, 'Kerala', 'IND', 8.51, 76.96),
(16, 'Madhya Pradesh', 'IND', 22.72, 75.83),
(17, 'Maharashtra', 'IND', 18.98, 72.83),
(18, 'Manipur', 'IND', 24.82, 93.95),
(19, 'Meghalaya', 'IND', 25.58, 91.87),
(20, 'Mizoram', 'IND', 23.72, 92.72),
(21, 'Nagaland', 'IND', 25.67, 94.12),
(22, 'Orissa', 'IND', 20.5, 85.83),
(23, 'Puducherry', 'IND', 11.93, 79.83),
(24, 'Punjab', 'IND', 30.9, 75.85),
(25, 'Rajasthan', 'IND', 26.92, 75.82),
(26, 'Sikkim', 'IND', 27.33, 88.62),
(27, 'Tamil Nadu', 'IND', 13.08, 80.28),
(28, 'Tripura', 'IND', 23.84, 91.28),
(29, 'Uttar Pradesh', 'IND', 27.18, 78.02),
(30, 'Uttarakhand', 'IND', 30.32, 78.03),
(31, 'West Bengal', 'IND', 22.57, 88.37);

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE IF NOT EXISTS `story` (
`story_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url_slug` varchar(100) NOT NULL,
  `link` varchar(300) NOT NULL,
  `self_story` bigint(1) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `story_created_at` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_featured` tinyint(1) NOT NULL COMMENT '0- not featured ,1- featured',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0- not approved ,1- approved',
  `is_enable` tinyint(1) NOT NULL COMMENT '0- not enable ,1- enable',
  `deleted` tinyint(1) NOT NULL COMMENT '0- not deleted ,1- deleted'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`story_id`, `title`, `url_slug`, `link`, `self_story`, `description`, `user_id`, `cat_id`, `story_created_at`, `created_time`, `updated_at`, `is_featured`, `is_approved`, `is_enable`, `deleted`) VALUES
(1, 'Airbnb is being sued for copying a French designer’s house', 'airbnb-is-being-sued-for-copying-a-french-designers-house', 'http://www.designhill.com/', 1, 'A French interior designer is suing Airbnb because the company allegedly copied her home decor without permission or credit, reports The Mirror. Zoé de las Cases, who rents out her flat on the service said a friend had noticed Airbnb’s San Francisco offices looked alarmingly similar to her home. In one photo of the company’s HQ, she even found the same picture of her grandmother that sits on a shelf in her kitchen in one part of the offices.', 1, 1, '2015-12-23', '16:03:00', '2015-12-23 00:00:00', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `story_media`
--

CREATE TABLE IF NOT EXISTS `story_media` (
`id` int(11) NOT NULL,
  `story_id` int(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `img_title` varchar(100) NOT NULL,
  `file_path` varchar(300) NOT NULL,
  `media_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `story_media`
--

INSERT INTO `story_media` (`id`, `story_id`, `type`, `file_name`, `img_title`, `file_path`, `media_status`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 'jpeg', 'Stories_cover_1449816722.jpg', 'Stories_cover_1449816722.jpg', 'C:/xampp/htdocs/curatigo/upload/story/Stories_cover_1449816722.jpg', 1, '2015-12-23 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(11) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'electronic', '2015-12-07 00:00:00', '0000-00-00'),
(2, 'gift', '2015-12-07 00:00:00', '0000-00-00'),
(3, 'wears', '2015-12-10 09:33:52', '0000-00-00'),
(4, 'home & furniture', '2015-12-10 09:40:23', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tags_in_collection`
--

CREATE TABLE IF NOT EXISTS `tags_in_collection` (
`id` int(11) unsigned NOT NULL,
  `col_id` bigint(20) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags_in_collection`
--

INSERT INTO `tags_in_collection` (`id`, `col_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00'),
(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tags_in_product`
--

CREATE TABLE IF NOT EXISTS `tags_in_product` (
`id` int(11) unsigned NOT NULL,
  `prod_id` bigint(20) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT '0000-00-00',
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags_in_product`
--

INSERT INTO `tags_in_product` (`id`, `prod_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00', '0000-00-00'),
(2, 1, 2, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tags_in_story`
--

CREATE TABLE IF NOT EXISTS `tags_in_story` (
`id` int(11) unsigned NOT NULL,
  `story_id` bigint(20) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT '0000-00-00',
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags_in_story`
--

INSERT INTO `tags_in_story` (`id`, `story_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00', '0000-00-00'),
(2, 1, 2, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(511) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `grp_fk_id` int(11) NOT NULL DEFAULT '3' COMMENT 'Group Reference key',
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `middle_name` varchar(128) NOT NULL,
  `photo_source` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) NOT NULL,
  `professional_skills` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `suspended_at` datetime DEFAULT NULL,
  `suspended_by` int(11) unsigned NOT NULL DEFAULT '0',
  `last_login_at` datetime DEFAULT NULL,
  `previous_login_at` datetime DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `verification_request_at` datetime DEFAULT NULL,
  `password_reset_request_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email_id`, `identifier`, `grp_fk_id`, `first_name`, `last_name`, `middle_name`, `photo_source`, `photo`, `website_url`, `professional_skills`, `active`, `suspended_at`, `suspended_by`, `last_login_at`, `previous_login_at`, `verified_at`, `verification_request_at`, `password_reset_request_at`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 'storeadmin@relesol.com', '$2a$08$PViX9osk5jyay6V.iaFdAeozXSPCJuOiN7Ptri3sfYD86RGXG09gi', '0', '', 1, 'Master', 'Commander', 'And', NULL, NULL, '', '', 1, NULL, 0, '2015-12-11 07:14:38', '2015-12-10 06:54:57', '2014-08-11 09:08:31', '2014-08-11 09:07:55', NULL, '2014-03-29 08:44:11', 0, '2014-08-10 22:52:34', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'jasdeep.singh9771@gmail.com', '$2a$08$PViX9osk5jyay6V.iaFdAeozXSPCJuOiN7Ptri3sfYD86RGXG09gi', '0', '', 3, '', '', '', NULL, NULL, '', '', 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2015-09-23 14:36:02', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_followers`
--

CREATE TABLE IF NOT EXISTS `users_followers` (
`id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `follower_id` bigint(20) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=unfollow,1=follow'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_followers`
--

INSERT INTO `users_followers` (`id`, `user_id`, `follower_id`, `status`) VALUES
(1, 1, 2, '0'),
(2, 1, 3, '0'),
(3, 3, 1, '0'),
(4, 2, 1, '0'),
(5, 2, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) unsigned NOT NULL DEFAULT '0',
  `delete` tinyint(11) NOT NULL DEFAULT '0',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `name`, `description`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `delete`, `deleted_at`, `deleted_by`) VALUES
(1, 'Admin', NULL, 1, '2015-08-07 12:30:35', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_stores_roles`
--

CREATE TABLE IF NOT EXISTS `users_stores_roles` (
`id` int(11) unsigned NOT NULL,
  `str_fk_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Store Reference key',
  `user_fk_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `features` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(11) NOT NULL DEFAULT '0',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_stores_roles`
--

INSERT INTO `users_stores_roles` (`id`, `str_fk_id`, `user_fk_id`, `name`, `features`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 2, 'Owner', '1#1##2#1##9#1##8#1##7#1##6#1##3#1##25#1##24#1##26#1##4#1##13#1##12#1##10#1##11#1##5#1##23#1##22#1##21#1##20#0##19#1##18#1##17#1##16#1##15#1##14#1', 1, '2015-08-05 04:32:31', 1, '2015-09-28 15:39:51', 0, 0, '0000-00-00 00:00:00', 0),
(2, 1, 1, 'Product Executive', '1#1##2#1##9#1##8#1##7#1##6#1##3#0##25#0##24#0##26#0##4#1##13#1##12#1##10#1##11#1##5#1##23#1##22#1##21#1##20#1##19#1##18#1##17#1##16#1##15#1##14#1', 1, '2015-08-06 09:28:33', 0, '2015-08-28 15:55:32', 0, 0, '0000-00-00 00:00:00', 0),
(3, 3, 2, 'Random User', '1#1##2#1##9#1##8#1##7#1##6#1##3#1##25#1##24#1##26#1##4#1##13#1##12#1##10#1##11#1##5#1##23#1##22#1##21#1##20#1##19#1##18#1##17#1##16#1##15#1##14#1', 1, '2015-08-06 10:29:34', 0, '2015-08-28 15:20:56', 0, 0, '0000-00-00 00:00:00', 0),
(4, 4, 1, 'Page Manager', '1#0##2#0##9#0##8#0##7#0##6#0##3#0##25#0##24#0##26#0##4#1##13#1##12#1##10#1##11#1##5#1##23#0##22#0##21#0##20#0##19#0##18#0##17#0##16#0##15#0##14#0', 1, '2015-08-06 09:28:33', 0, '2015-09-28 13:57:53', 0, 0, '0000-00-00 00:00:00', 0),
(5, 2, 2, 'manager store', '1#0##2#1##9#1##8#1##7#1##6#1##3#1##25#1##24#1##26#1##4#1##13#1##12#1##10#1##11#1##5#1##23#1##22#1##21#1##20#1##19#1##18#1##17#1##16#1##15#1##14#1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_stores_roles_features_master`
--

CREATE TABLE IF NOT EXISTS `users_stores_roles_features_master` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `features` text,
  `rfm_parent_id` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(11) NOT NULL DEFAULT '0',
  `deleted_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_by` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_stores_roles_features_master`
--

INSERT INTO `users_stores_roles_features_master` (`id`, `name`, `features`, `rfm_parent_id`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted`, `deleted_at`, `deleted_by`) VALUES
(1, 'All', NULL, 0, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(2, 'Store Basic', NULL, 1, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(3, 'SEO Settings', NULL, 1, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(4, 'Products', NULL, 1, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'Sub Sections/Pages', NULL, 1, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(6, 'Title Updation', NULL, 2, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(7, 'Logo Updation', NULL, 2, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(8, 'Address Updation', NULL, 2, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(9, 'Description Updation', NULL, 2, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(10, 'Add Products', NULL, 4, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(11, 'Edit Products', NULL, 4, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(12, 'Delete Products', NULL, 4, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(13, 'Approve Products', NULL, 4, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(14, 'Watchers', NULL, 5, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(15, 'Feedbacks', NULL, 5, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(16, 'Brand Story', NULL, 5, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(17, 'FAQ and Contacts', NULL, 5, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(18, 'Collections', NULL, 5, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(19, 'Feedbacks', NULL, 5, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(20, 'Styles', NULL, 5, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(21, 'Watched Store', NULL, 5, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(22, 'Fav. Product', NULL, 5, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(23, 'Following Users', NULL, 5, 1, '2015-08-13 09:00:00', 1, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(24, 'Title', NULL, 3, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(25, 'Keyword', NULL, 3, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0),
(26, 'Description', NULL, 3, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
`vote_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `section_type` tinyint(1) NOT NULL COMMENT '0-collection.1-products,2-story,3-comment',
  `section_type_id` bigint(20) NOT NULL,
  `voted_type` tinyint(1) NOT NULL COMMENT '0-up,1-down',
  `added_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `user_id`, `section_type`, `section_type_id`, `voted_type`, `added_date`) VALUES
(1, 1, 0, 1, 1, '2015-12-08 08:23:32'),
(2, 1, 0, 3, 1, '2015-12-08 08:39:33'),
(3, 1, 0, 3, 1, '2015-12-08 08:22:34'),
(4, 1, 0, 4, 1, '2015-12-08 08:29:34'),
(5, 1, 0, 2, 1, '2015-12-08 08:34:40'),
(6, 1, 0, 5, 0, '2015-12-08 08:59:53'),
(7, 1, 0, 6, 0, '2015-12-08 08:02:54'),
(8, 1, 2, 12, 1, '2015-12-08 09:03:12'),
(9, 1, 2, 21, 0, '2015-12-08 09:26:12'),
(10, 1, 2, 20, 1, '2015-12-08 09:23:15'),
(11, 1, 2, 15, 0, '2015-12-09 09:08:15'),
(12, 1, 2, 14, 1, '2015-12-09 09:17:15'),
(13, 1, 2, 19, 1, '2015-12-10 08:20:17'),
(14, 1, 2, 17, 1, '2015-12-10 08:33:17'),
(17, 1, 3, 1, 0, '2015-12-10 12:27:32'),
(18, 1, 3, 2, 1, '2015-12-10 12:25:43'),
(19, 0, 2, 21, 1, '2015-12-10 01:22:31'),
(20, 0, 3, 1, 1, '2015-12-10 01:47:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_setting`
--
ALTER TABLE `admin_setting`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`countryID`), ADD UNIQUE KEY `webCode` (`webCode`), ADD UNIQUE KEY `countryName` (`countryName`), ADD KEY `region` (`region`), ADD KEY `continent` (`continent`), ADD KEY `population` (`population`), ADD KEY `surfaceArea` (`surfaceArea`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url` (`url_slug`), ADD UNIQUE KEY `sku_no` (`sku_no`);

--
-- Indexes for table `products_in_collection`
--
ALTER TABLE `products_in_collection`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_shipping`
--
ALTER TABLE `product_shipping`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_meta`
--
ALTER TABLE `seo_meta`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_users`
--
ALTER TABLE `social_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_users_friends`
--
ALTER TABLE `social_users_friends`
 ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`stateID`), ADD KEY `stateName` (`stateName`), ADD KEY `countryID` (`countryID`), ADD KEY `unq1` (`countryID`,`stateName`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
 ADD PRIMARY KEY (`story_id`);

--
-- Indexes for table `story_media`
--
ALTER TABLE `story_media`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_in_collection`
--
ALTER TABLE `tags_in_collection`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_in_product`
--
ALTER TABLE `tags_in_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_in_story`
--
ALTER TABLE `tags_in_story`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `created_by` (`created_by`), ADD KEY `updated_by` (`updated_by`), ADD KEY `deleted_by` (`deleted_by`), ADD KEY `last_login_at` (`last_login_at`), ADD KEY `suspended_by` (`suspended_by`);

--
-- Indexes for table `users_followers`
--
ALTER TABLE `users_followers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_stores_roles`
--
ALTER TABLE `users_stores_roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_stores_roles_features_master`
--
ALTER TABLE `users_stores_roles_features_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
 ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_setting`
--
ALTER TABLE `admin_setting`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1624;
--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products_in_collection`
--
ALTER TABLE `products_in_collection`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_shipping`
--
ALTER TABLE `product_shipping`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seo_meta`
--
ALTER TABLE `seo_meta`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `social_users`
--
ALTER TABLE `social_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `social_users_friends`
--
ALTER TABLE `social_users_friends`
MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `stateID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
MODIFY `story_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `story_media`
--
ALTER TABLE `story_media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tags_in_collection`
--
ALTER TABLE `tags_in_collection`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags_in_product`
--
ALTER TABLE `tags_in_product`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags_in_story`
--
ALTER TABLE `tags_in_story`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_followers`
--
ALTER TABLE `users_followers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_stores_roles`
--
ALTER TABLE `users_stores_roles`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_stores_roles_features_master`
--
ALTER TABLE `users_stores_roles_features_master`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
MODIFY `vote_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
