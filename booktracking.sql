-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 03:18 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booktracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(40) NOT NULL,
  `book_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `book_id`) VALUES
(1, 'Kevin, D.', 452),
(2, 'Stephen, C.', 482),
(3, 'Bryan, G.', 399),
(4, 'Peter, Z.', 0),
(5, 'Howard, E.', 0),
(10, 'Changyu Kevin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `advisor_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`advisor_id`) VALUES
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `ISBN` varchar(80) NOT NULL,
  `book_name` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `due_date` date NOT NULL DEFAULT '2099-12-31',
  `dept_id` int(11) NOT NULL,
  `checkout_date` date NOT NULL DEFAULT '2099-12-31'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `ISBN`, `book_name`, `price`, `due_date`, `dept_id`, `checkout_date`) VALUES
(725, 'KOXHIFNYWUX', 'book725', 6.65, '2099-12-31', 4, '2009-12-31'),
(596, 'GUYSCXENLUJ', 'book596', 7.02, '2099-12-31', 3, '2009-12-31'),
(577, 'PLIFPXWWVVK', 'book577', 13.59, '2099-12-31', 3, '2009-12-31'),
(646, 'OGHWCDFMDFH', 'book646', 14.98, '2099-12-31', 4, '2009-12-31'),
(538, 'GKPXICDFXBC', 'book538', 3.73, '2099-12-31', 1, '2009-12-31'),
(736, 'CEDVTTYMEHG', 'book736', 1.27, '2099-12-31', 1, '2009-12-31'),
(712, 'GYQBRMXYWWN', 'book712', 5.99, '2099-12-31', 1, '2009-12-31'),
(529, 'RGIGSWCNOIY', 'book529', 1.08, '2099-12-31', 5, '2009-12-31'),
(633, 'MUNARNSWKWG', 'book633', 2.62, '2099-12-31', 3, '2009-12-31'),
(737, 'NRCCSXLJVJM', 'book737', 14.75, '2099-12-31', 3, '2009-12-31'),
(670, 'BLNSXUCOJFH', 'book670', 4.99, '2099-12-31', 4, '2009-12-31'),
(849, 'QLXDFALQJUY', 'book849', 4.09, '2099-12-31', 2, '2009-12-31'),
(639, 'DTLBCCNCDJJ', 'book639', 3.36, '2099-12-31', 1, '2009-12-31'),
(592, 'DAMITNCNWTS', 'book592', 15.94, '2099-12-31', 4, '2009-12-31'),
(605, 'XMVJPDVPAHC', 'book605', 7.33, '2099-12-31', 4, '2009-12-31'),
(597, 'BBCEBLSYDNU', 'book597', 2.23, '2099-12-31', 1, '2009-12-31'),
(247, 'NWQJLMNNJJR', 'book247', 3.6, '2017-02-22', 1, '2099-12-31'),
(100, 'UCCYGNILFQF', 'book100', 12.91, '2017-01-11', 1, '2099-12-31'),
(286, 'FHTMJXYAIHN', 'book286', 11.46, '2017-07-23', 3, '2099-12-31'),
(129, 'KYNVQNGBBVL', 'book129', 1.03, '2017-03-24', 1, '2099-12-31'),
(165, 'NSBAACYLTFD', 'book165', 14.55, '2017-09-08', 1, '2099-12-31'),
(176, 'HDMXQPVLIJY', 'book176', 11.38, '2017-08-09', 4, '2099-12-31'),
(140, 'TMYYCNTVYDA', 'book140', 3.93, '2017-01-26', 2, '2099-12-31'),
(196, 'CLVYYLJPUYY', 'book196', 2.82, '2017-06-17', 4, '2099-12-31'),
(117, 'JPRLRDNDUFP', 'book117', 13.18, '2017-04-24', 5, '2099-12-31'),
(201, 'YTDJDEJCCWX', 'book201', 14.69, '2017-07-03', 4, '2099-12-31'),
(271, 'YLJQUEQQXIK', 'book271', 7.7, '2017-01-18', 1, '2099-12-31'),
(298, 'UQRLHHTMTJL', 'book298', 13.05, '2017-07-09', 5, '2099-12-31'),
(119, 'DKPOEOVIOXS', 'book119', 2.96, '2017-11-26', 1, '2099-12-31'),
(191, 'XDQWAHMWLSN', 'book191', 10.7, '2017-06-01', 4, '2099-12-31'),
(238, 'YYHIGKUPAYG', 'book238', 6.29, '2017-06-18', 1, '2099-12-31'),
(125, 'CWKLOCARFLX', 'book125', 10.95, '2017-08-06', 2, '2099-12-31'),
(237, 'HUPFOUCCFIP', 'book237', 7.6, '2017-10-07', 4, '2099-12-31'),
(278, 'KNGFDDJOMQA', 'book278', 15.12, '2017-09-27', 2, '2099-12-31'),
(177, 'RLJRIUAWMID', 'book177', 3.7, '2017-03-19', 3, '2099-12-31'),
(211, 'WKJNTKGXUUS', 'book211', 3.83, '2017-02-22', 3, '2099-12-31'),
(242, 'GYMACRAARMC', 'book242', 11.5, '2017-03-15', 2, '2099-12-31'),
(692, 'VFHQGSGOBCH', 'book692', 4.47, '2099-12-31', 1, '2009-12-31'),
(568, 'FIMTMGIIYMI', 'book568', 9.6, '2017-07-05', 4, '2099-12-31'),
(555, 'WKTPKOHIPPK', 'book555', 5.72, '2017-03-08', 1, '2099-12-31'),
(644, 'HWJTMFLYVOO', 'book644', 2.8, '2017-03-20', 4, '2099-12-31'),
(832, 'TNKFQKXQYVG', 'book832', 7.7, '2017-10-14', 3, '2099-12-31'),
(578, 'MLXWEAVWPCM', 'book578', 6.89, '2017-08-22', 3, '2099-12-31'),
(755, 'COYVPEUOTRF', 'book755', 15.78, '2017-07-07', 1, '2099-12-31'),
(720, 'WETVFBQSXWP', 'book720', 15.44, '2017-06-28', 3, '2099-12-31'),
(682, 'HAMACLXFTKN', 'book682', 9.05, '2017-06-01', 1, '2099-12-31'),
(784, 'MKFNCJOBXBV', 'book784', 10.79, '2099-12-31', 1, '2009-12-31'),
(162, 'CFVUCXPGCOR', 'book162', 11.98, '2017-03-29', 1, '2099-12-31'),
(259, 'FVSPWNIWLQW', 'book259', 9.85, '2017-05-01', 4, '2099-12-31'),
(190, 'XKGAPHDYFAS', 'book190', 12.56, '2017-08-16', 1, '2099-12-31'),
(269, 'XJWBLXSNWIS', 'book269', 5.24, '2017-08-19', 1, '2099-12-31'),
(171, 'VGAXAPJPNDR', 'book171', 14.12, '2017-03-29', 4, '2099-12-31'),
(146, 'ICXIWEOMJBM', 'book146', 11.11, '2017-10-07', 3, '2099-12-31'),
(151, 'QUEXTUVUJFV', 'book151', 13.86, '2017-07-15', 4, '2099-12-31'),
(145, 'OOXKGCHPLTR', 'book145', 2.23, '2017-06-01', 1, '2099-12-31'),
(127, 'CDYVQJISQDT', 'book127', 12.1, '2017-01-15', 1, '2099-12-31'),
(138, 'HAVHPBHVCGF', 'book138', 7.12, '2017-05-02', 5, '2099-12-31'),
(282, 'LERIXCGYQXW', 'book282', 14.27, '2017-01-13', 2, '2099-12-31'),
(212, 'YCDIWKGSYFT', 'book212', 4.45, '2017-04-23', 1, '2099-12-31'),
(225, 'QFVFWYKDXGD', 'book225', 6.61, '2017-03-08', 3, '2099-12-31'),
(128, 'MGHUQXUUOIU', 'book128', 5.86, '2017-04-16', 4, '2099-12-31'),
(126, 'RQQOIQQYEMM', 'book126', 7.84, '2017-08-29', 4, '2099-12-31'),
(233, 'GHSOSDXFVRH', 'book233', 11.19, '2017-02-16', 3, '2099-12-31'),
(262, 'DDPGDGAUFVO', 'book262', 1.89, '2017-03-12', 3, '2099-12-31'),
(289, 'MTBJYNIIJKL', 'book289', 14.56, '2017-07-27', 5, '2099-12-31'),
(123, 'XELXPTCMVRQ', 'book123', 1.17, '2017-07-26', 1, '2099-12-31'),
(114, 'RJTEROGMGSE', 'book114', 14.23, '2017-09-13', 5, '2099-12-31'),
(180, 'OICMLBBFIEI', 'book180', 7.19, '2017-10-29', 1, '2099-12-31'),
(164, 'RGEQHPXOTOP', 'book164', 9.39, '2017-06-07', 2, '2099-12-31'),
(292, 'JTORQDFKKXE', 'book292', 14.52, '2017-05-01', 3, '2099-12-31'),
(175, 'FWOPLMYWDQX', 'book175', 13.96, '2017-10-01', 3, '2099-12-31'),
(121, 'JVDIEXRXFYE', 'book121', 15.41, '2017-01-23', 2, '2099-12-31'),
(193, 'EFMTIJHRIVE', 'book193', 2.11, '2017-05-07', 1, '2099-12-31'),
(267, 'HBYEVWXRWPD', 'book267', 4.2, '2017-10-22', 5, '2099-12-31'),
(200, 'DIOHTJCHYPD', 'book200', 2.61, '2017-02-14', 1, '2099-12-31'),
(235, 'BTGTMPKYFRQ', 'book235', 3.99, '2017-01-13', 3, '2099-12-31'),
(279, 'HRUUTDYGBKJ', 'book279', 3.92, '2099-12-31', 5, '2009-12-31'),
(131, 'CMDURENWWGI', 'book131', 6.66, '2099-12-31', 4, '2009-12-31'),
(159, 'ETDXLVNPXCX', 'book159', 10.21, '2099-12-31', 3, '2009-12-31'),
(210, 'TAYQEHBBOAN', 'book210', 3.52, '2099-12-31', 2, '2009-12-31'),
(202, 'TKPRRYUQQVA', 'book202', 10.76, '2099-12-31', 5, '2009-12-31'),
(230, 'AJJUVXLKTEC', 'book230', 10.46, '2099-12-31', 5, '2009-12-31'),
(272, 'DLDPASUJWCU', 'book272', 8.06, '2099-12-31', 3, '2009-12-31'),
(163, 'QUYMNXKAVIW', 'book163', 5.88, '2099-12-31', 1, '2009-12-31'),
(124, 'JPPEBRCKGDQ', 'book124', 12.92, '2099-12-31', 5, '2009-12-31'),
(166, 'MUVNNRTBLXA', 'book166', 12.13, '2099-12-31', 4, '2009-12-31'),
(245, 'DNGTTGLWBUC', 'book245', 12.56, '2099-12-31', 1, '2009-12-31'),
(290, 'EHSTJTJOFHP', 'book290', 13.92, '2099-12-31', 4, '2009-12-31'),
(189, 'XSYIMIGDMIB', 'book189', 10.98, '2099-12-31', 2, '2009-12-31'),
(256, 'KCGOPDTWVBO', 'book256', 15.6, '2099-12-31', 2, '2009-12-31'),
(285, 'RFLYQPOTXLS', 'book285', 12.57, '2099-12-31', 2, '2009-12-31'),
(222, 'PLEFRBDTKFA', 'book222', 9.71, '2099-12-31', 4, '2009-12-31'),
(227, 'NKYSJBMPXKM', 'book227', 4.91, '2099-12-31', 2, '2009-12-31'),
(275, 'SCGWLSYKSUP', 'book275', 10.06, '2099-12-31', 5, '2009-12-31'),
(291, 'QEXUJEMQRSU', 'book291', 15.48, '2099-12-31', 1, '2009-12-31'),
(142, 'GGAEKHQMYEQ', 'book142', 10.08, '2099-12-31', 4, '2009-12-31'),
(232, 'LHQGDMFKPVR', 'book232', 1.06, '2099-12-31', 2, '2009-12-31'),
(276, 'GWWHALYWJWF', 'book276', 5.72, '2099-12-31', 2, '2009-12-31'),
(280, 'XVJSKJSBDVP', 'book280', 11.86, '2099-12-31', 5, '2009-12-31'),
(252, 'AATYWRQBMKP', 'book252', 4.6, '2099-12-31', 1, '2009-12-31'),
(205, 'NOIKEVWHJDE', 'book205', 15.75, '2099-12-31', 4, '2009-12-31'),
(173, 'TYSFABNBOKD', 'book173', 10.96, '2099-12-31', 5, '2009-12-31'),
(215, 'NJNFHFHSADN', 'book215', 12.73, '2099-12-31', 5, '2009-12-31'),
(199, 'AQENVLUBABX', 'book199', 2.41, '2099-12-31', 5, '2009-12-31'),
(283, 'AMOXPFTRTWY', 'book283', 15.14, '2099-12-31', 1, '2009-12-31'),
(144, 'KRLMMHKWALI', 'book144', 10.37, '2099-12-31', 5, '2009-12-31'),
(10, 'EELWVACPMNQ', 'book10', 1.59, '2017-12-30', 5, '2099-12-31'),
(38, 'FLGVXKRJITX', 'book38', 10.74, '2017-12-30', 4, '2099-12-31'),
(29, 'LAQVSGXVXLB', 'book29', 1.04, '2017-05-15', 4, '2017-05-02'),
(11, 'NDHXCCDJDKI', 'book11', 15.43, '2017-12-30', 2, '2099-12-31'),
(56, 'UELRXWLQXVC', 'book56', 13.49, '2017-12-30', 4, '2099-12-31'),
(77, 'AXYXRMXCRUO', 'book77', 1.11, '2017-12-30', 3, '2099-12-31'),
(43, 'LIIKTUGMUMS', 'book43', 6.62, '2017-12-30', 1, '2099-12-31'),
(87, 'IMAWCKPEEAT', 'book87', 1.05, '2017-12-30', 4, '2099-12-31'),
(37, 'NAQGISTAFSS', 'book37', 9.92, '2017-12-30', 2, '2099-12-31'),
(30, 'OAXXMJJFGIU', 'book30', 3.99, '2017-12-30', 5, '2099-12-31'),
(54, 'FXXIXJXHUMV', 'book54', 11.63, '2017-12-30', 3, '2099-12-31'),
(69, 'XJBQXSHYFDI', 'book69', 10.25, '2017-12-30', 2, '2099-12-31'),
(67, 'GSDPQLJXYFS', 'book67', 9.21, '2017-12-30', 1, '2099-12-31'),
(97, 'WPHPLXDMMFE', 'book97', 1.8, '2017-12-30', 5, '2099-12-31'),
(34, 'RFLWDFRTUIR', 'book34', 3.76, '2017-12-30', 4, '2099-12-31'),
(18, 'LNOYSEEYGCT', 'book18', 5.87, '2017-12-30', 5, '2099-12-31'),
(32, 'QLEEVYBHLRE', 'book32', 13.04, '2017-12-30', 4, '2099-12-31'),
(53, 'TPGLOYPQFWI', 'book53', 12.47, '2017-12-30', 3, '2099-12-31'),
(35, 'SIUGKFXDOPA', 'book35', 13.34, '2017-12-30', 3, '2099-12-31'),
(73, 'YCBQENSQVCN', 'book73', 15.56, '2099-12-31', 4, '2009-12-31'),
(1, 'JHLPARDTBQF', 'book01', 5.04, '2017-05-15', 4, '2017-05-02'),
(57, 'FKYLCRUTUAF', 'book57', 13.02, '2099-12-31', 2, '2009-12-31'),
(96, 'OMNMMUHMCJY', 'book96', 6.94, '2099-12-31', 4, '2009-12-31'),
(70, 'YXNTWWVTKAS', 'book70', 10.35, '2099-12-31', 5, '2009-12-31'),
(41, 'RWPFIJEULKT', 'book41', 9.37, '2099-12-31', 5, '2009-12-31'),
(75, 'TRLNVNXLRGV', 'book75', 13.15, '2099-12-31', 1, '2009-12-31'),
(71, 'AWRUCLTVYTA', 'book71', 5.97, '2099-12-31', 5, '2009-12-31'),
(59, 'UOGVWJOPLVY', 'book59', 8.27, '2099-12-31', 5, '2009-12-31'),
(39, 'TBLXWPBBIOP', 'book39', 14.32, '2099-12-31', 5, '2009-12-31'),
(92, 'DVMOWQLRSTG', 'book92', 8.84, '2099-12-31', 5, '2009-12-31'),
(423, 'VRUSIBJAVUT', 'book423', 15.34, '2017-01-28', 3, '2099-12-31'),
(482, 'LAHWCNGOYVP', 'book482', 4.04, '2017-11-26', 5, '2099-12-31'),
(399, 'LPYQROPVAKS', 'book399', 8.06, '2017-10-09', 1, '2099-12-31'),
(380, 'HVUGXEPMFWU', 'book380', 3.95, '2099-12-31', 3, '2009-12-31'),
(369, 'VXUFAIQPBIS', 'book369', 11.08, '2099-12-31', 3, '2009-12-31'),
(318, 'TRLPLDXATIW', 'book318', 14.64, '2099-12-31', 5, '2009-12-31'),
(307, 'EMVWFLSGGMI', 'book307', 5.96, '2099-12-31', 3, '2009-12-31'),
(408, 'ICAMACQJLIW', 'book408', 12.59, '2099-12-31', 5, '2009-12-31'),
(392, 'NMFQHSOIEXH', 'book392', 5.57, '2099-12-31', 5, '2009-12-31'),
(382, 'YXPEQPJGDPC', 'book382', 6.45, '2099-12-31', 2, '2009-12-31'),
(349, 'EWBSMTNILDR', 'book349', 11.62, '2099-12-31', 1, '2009-12-31'),
(355, 'UEXOBWRHMUE', 'book355', 11.31, '2099-12-31', 5, '2009-12-31'),
(438, 'MSPAIATBHOF', 'book438', 5.89, '2099-12-31', 3, '2009-12-31'),
(442, 'WAOPWPCOWGU', 'book442', 11.85, '2099-12-31', 2, '2009-12-31'),
(496, 'RYBOEPCPRNY', 'book496', 5.15, '2099-12-31', 2, '2009-12-31'),
(427, 'EGUBPXIMMRL', 'book427', 4.17, '2099-12-31', 3, '2009-12-31'),
(430, 'EIADVRODOBG', 'book430', 14.97, '2099-12-31', 2, '2009-12-31'),
(474, 'AVLCBBPCOMI', 'book474', 11.37, '2099-12-31', 2, '2009-12-31'),
(459, 'SVLRWUGFHTK', 'book459', 15.66, '2099-12-31', 1, '2009-12-31'),
(405, 'RGQOTSHEFOQ', 'book405', 7.34, '2099-12-31', 4, '2009-12-31'),
(431, 'JWFSBGQFYUH', 'book431', 6.03, '2099-12-31', 2, '2009-12-31'),
(398, 'VAPKGQOABXF', 'book398', 13.99, '2099-12-31', 4, '2009-12-31'),
(498, 'XAPEIRPDIDU', 'book498', 8.13, '2099-12-31', 4, '2009-12-31'),
(381, 'UQMKJBWMVLS', 'book381', 1.53, '2099-12-31', 2, '2009-12-31'),
(372, 'ENHBHHFDXUE', 'book372', 10.82, '2099-12-31', 5, '2009-12-31'),
(452, 'CVINUOTHHIF', 'book452', 11.85, '2017-05-15', 4, '2017-05-02'),
(317, 'JEXEMNPDBEE', 'book317', 11.29, '2099-12-31', 1, '2009-12-31'),
(421, 'ELTIARTPFMK', 'book421', 1.51, '2099-12-31', 3, '2009-12-31'),
(417, 'JXMISJTHJHI', 'book417', 6.56, '2099-12-31', 1, '2009-12-31'),
(379, 'TKYROBKISWW', 'book379', 15.22, '2099-12-31', 3, '2009-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(40) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `dept_id`, `teacher_id`, `book_id`) VALUES
(301, 'Intro to Programming', 3, 3, 0),
(311, 'Intro to Garbage', 6, 3, 0),
(365, 'City Planning', 2, 4, 0),
(375, 'Highway Engineering', 2, 5, 0),
(461, 'College Geometry 1', 5, 6, 0),
(462, 'College Geometry 2', 5, 7, 0),
(467, 'Intro to Data Structures', 3, 8, 755),
(514, 'Manpower Utilization', 4, 9, 0),
(561, 'Advanced City Planning', 2, 5, 0),
(562, 'Advanced Garbage Collection', 6, 3, 0),
(701, 'Compiler Construction', 3, 1, 0),
(726, 'Nonlinear Programming', 3, 2, 0),
(569, 'Intro to Computer Science', 13, 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_name`) VALUES
(1, 'Chemical Engineering'),
(2, 'Civil Engineering'),
(3, 'Computer Engineering'),
(4, 'Industrial Engineering'),
(5, 'Mathematics'),
(6, 'Sanitary Engineering'),
(13, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`class_id`, `student_id`, `grade`) VALUES
(302, 24, 4),
(365, 1, 4),
(461, 13, 2.94),
(467, 49, 2.87),
(561, 46, 3.55),
(302, 51, 3.84),
(562, 22, 3.51),
(375, 39, 3.96),
(311, 5, 1.8),
(310, 41, 2.53),
(467, 55, 3.96),
(461, 25, 2.8),
(461, 35, 1.64),
(461, 57, 3.07),
(310, 43, 2.96),
(461, 40, 1.77),
(467, 36, 1.99),
(365, 21, 2.16),
(302, 46, 3.09),
(514, 59, 1.38),
(302, 40, 2.27),
(302, 11, 3.08),
(311, 18, 1.51),
(461, 49, 3.26),
(514, 44, 1),
(561, 26, 3.79),
(311, 36, 3.09),
(375, 21, 2.94),
(701, 7, 2.71),
(467, 46, 2.75),
(562, 4, 2.84),
(462, 6, 2.97),
(375, 57, 3.75),
(310, 27, 3.28),
(467, 26, 2.79),
(514, 41, 3.68),
(310, 39, 2),
(562, 34, 1.46),
(365, 44, 3.63),
(467, 9, 3.01),
(462, 57, 3.82),
(310, 10, 3.14),
(562, 59, 1.72),
(375, 54, 3.26),
(462, 50, 2.85),
(375, 35, 3.75),
(701, 39, 1.2),
(467, 36, 1.08),
(365, 9, 1.04),
(467, 1, 3.45),
(701, 35, 2.77),
(467, 9, 3.31),
(310, 37, 1.34),
(375, 4, 3.74),
(562, 5, 1.27),
(462, 15, 2.95),
(462, 53, 2.42),
(311, 32, 2.61);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `parent_name` varchar(40) NOT NULL,
  `phone_number` bigint(13) DEFAULT NULL,
  `book_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `parent_name`, `phone_number`, `book_id`) VALUES
(64, 'Fred, Edwin B.', 858353504, 29),
(65, 'Ripper, Jack T.', 485387758, 11),
(66, 'Altenhaus, Stuart', 656158150, 56),
(115, 'Changyu Wu', 7824334, 1),
(69, 'Heilskov, G.', 501784367, 87),
(70, 'Caucutt, B.', 214655271, 37),
(71, 'Mark, B.', 661737038, 30),
(72, 'Barnes, J.', 582428152, 54),
(73, 'Quarnty, G.', 783423886, 69),
(74, 'Andrus, J.', 780871330, 67),
(75, 'Jones, A.', 880147745, 97),
(76, 'Zorhoff, C.', 473302556, 34),
(77, 'Paull, Thomas H.', 656280127, 18),
(78, 'Cool, J.', 318436538, 32),
(79, 'Evert, Chris', 470282367, 53),
(80, 'Connors, Jimmy', 262833365, 35),
(81, 'Smith, Ike Z.', 547251420, 0),
(82, 'News, Nightly', 857145448, 0),
(83, 'Jones, Ivan L.', 886321700, 0),
(84, 'Smith, R.', 324706762, 0),
(85, 'Mayer, N.', 157528231, 0),
(86, 'Gonring, J.', 111462137, 0),
(87, 'Mueller, D.', 528448880, 0),
(88, 'Bates, M.', 787361272, 0),
(89, 'Longlastname, A.', 771381034, 0),
(90, 'Zappa, F.', 108185741, 0),
(91, 'Ghandi, I.', 455730378, 0),
(92, 'Kirk, J.', 410558651, 0),
(93, 'Andermanthenol, K.', 711673650, 0),
(94, 'Uoiea, Z.', 204333577, 0),
(95, 'Grzlbltz, Q.', 301374010, 0),
(96, 'Birch, M.', 364345734, 0),
(97, 'Morgan, D.', 344858688, 0),
(98, 'Taylor, R.', 361738303, 0),
(99, 'Jones, J.', 200156307, 0),
(100, 'Gringo, C.', 437568824, 0),
(101, 'Davis, Scott P.', 344745475, 0),
(102, 'Bates, Michael L.', 747241812, 0),
(103, 'Kaisler, Janet M.', 840726201, 0),
(104, 'Baskett, Wayse T.', 427100678, 0),
(112, 'Kevin, W.', 12345678, 0),
(116, 'Changyu Wu', 123123444, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(40) NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `dept_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `year` int(2) NOT NULL,
  `gpa` double NOT NULL,
  `phone_number` bigint(12) DEFAULT NULL,
  `book_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_gender`, `parent_id`, `dept_id`, `advisor_id`, `year`, `gpa`, `phone_number`, `book_id`) VALUES
(73, 'Changyu Wu', 'male', 66, 3, 4, 4, 4, 78945632, 0),
(1, 'Kevin, W.', 'male', 63, 3, 3, 4, 4, 456789326, 0),
(72, 'Kevin, W.', 'male', 63, 12, 1, 2, 4, 78456, 0),
(5, 'Form, Clara O.', 'female', 68, 5, 3, 1, 3.3, 567676025, 165),
(6, 'Scott, Kim J.', 'male', 70, 2, 1, 1, 3.8, 746865444, 176),
(7, 'Sather, Roberto B.', 'male', 83, 3, 2, 4, 2.2, 264507542, 140),
(8, 'Stanley, Leotha T.', 'male', 66, 5, 3, 3, 3.6, 704557835, 196),
(9, 'Smith, Joyce A.', 'female', 92, 3, 3, 4, 2, 855117475, 117),
(10, 'Jones, David S.', 'male', 96, 1, 2, 2, 3.5, 772775266, 201),
(11, 'Paul, Mary W.', 'female', 101, 1, 4, 5, 3.6, 104773885, 271),
(12, 'Soong, V.', 'female', 84, 1, 1, 5, 3.5, 815465316, 298),
(13, 'Kellerman, S.', 'female', 103, 4, 4, 3, 2.9, 146054070, 119),
(14, 'Cheong, R.', 'male', 96, 3, 3, 4, 3, 186417046, 191),
(15, 'Borchart, Sandra L.', 'female', 86, 3, 2, 5, 3.9, 167286783, 238),
(16, 'Alsberg, David J.', 'male', 70, 2, 1, 5, 3.5, 420007367, 125),
(17, 'Thorton, James Q.', 'male', 91, 3, 2, 4, 2.7, 628651333, 237),
(18, 'Gooch', 'male', 70, 2, 5, 1, 1.4, 284407482, 278),
(19, 'Smith, L.', 'male', 97, 1, 2, 4, 0.7, 152438551, 177),
(20, 'Korpel, E.', 'female', 99, 3, 4, 3, 3.5, 507714887, 211),
(21, 'Surk, K.', 'male', 103, 3, 5, 2, 2.5, 138570124, 242),
(22, 'Emile, R.', 'male', 89, 5, 5, 1, 2, 273285720, 162),
(23, 'Bomber, C.', 'female', 95, 3, 5, 4, 3.2, 654240138, 259),
(24, 'Carter, Jimmy', 'male', 95, 3, 5, 5, 3.5, 634027685, 190),
(25, 'Kissinger, Henry', 'male', 67, 4, 1, 5, 3.4, 722830230, 269),
(26, 'Ford, Gerald', 'male', 61, 5, 5, 5, 3.5, 521343181, 171),
(27, 'Anderson, P.', 'female', 70, 2, 3, 1, 3.2, 104548410, 146),
(28, 'Austin, G.', 'male', 86, 3, 4, 5, 3.5, 680858481, 151),
(29, 'Hamilton, S.', 'male', 83, 3, 5, 3, 2.8, 721446674, 145),
(30, 'Baker, C.', 'female', 62, 2, 1, 1, 3.5, 268223885, 127),
(31, 'Andrews, R.', 'male', 100, 4, 3, 2, 2.8, 782638748, 138),
(32, 'Liu, Huihusan', 'male', 62, 1, 4, 5, 3.9, 780675722, 282),
(33, 'Chao, Tsechih', 'female', 74, 2, 4, 5, 3.6, 715635525, 212),
(34, 'Kasten, Norman L.', 'male', 66, 3, 2, 2, 2.5, 865866158, 225),
(35, 'Mathews, John W.', 'male', 61, 2, 2, 5, 3.6, 733013286, 128),
(36, 'Burroughs, Susan S.', 'female', 88, 5, 1, 1, 3, 766770126, 126),
(37, 'Dunbar, D.', 'male', 64, 3, 3, 5, 3.4, 617863252, 233),
(38, 'Auen, B.', 'male', 66, 3, 5, 3, 2.7, 113203167, 262),
(39, 'Shoemaker, A.', 'female', 91, 4, 3, 4, 3.5, 808387301, 289),
(40, 'Rosemeyer, S.', 'female', 71, 4, 4, 3, 2.9, 804206135, 123),
(41, 'Fisher, C.', 'female', 98, 1, 2, 4, 3.5, 874231552, 114),
(42, 'Trude, T.', 'male', 88, 3, 1, 2, 2.9, 685464353, 180),
(43, 'Ksar, J.', 'male', 82, 1, 5, 3, 3.4, 263888535, 164),
(44, 'Moeri, S.', 'female', 81, 4, 2, 4, 3.2, 462676857, 292),
(45, 'June, Granson', 'female', 87, 3, 4, 1, 3.1, 187873411, 175),
(46, 'Micheal, Zadicki T.', 'male', 97, 4, 2, 2, 2.7, 518115200, 121),
(47, 'Roger, Blotter N.', 'male', 71, 5, 5, 3, 1.9, 608222701, 193),
(48, 'Natividad, A.', 'female', 78, 1, 4, 5, 4, 333030487, 267),
(49, 'Villa-lobos, M.', 'male', 92, 1, 1, 5, 3.7, 204278578, 200),
(50, 'Moomchi, B.', 'male', 70, 5, 5, 5, 3.5, 754855324, 235),
(51, 'Jetplane, Leaving O.', 'male', 61, 3, 2, 1, 0, 761630730, 0),
(52, 'Fy, Clara I.', 'female', 90, 4, 1, 2, 2, 711733438, 0),
(53, 'Atny, Mary H.', 'female', 77, 3, 4, 5, 3.8, 810800617, 0),
(54, 'Maximillian', 'male', 95, 1, 2, 5, 3, 516056761, 0),
(55, 'Glitch, R.', 'male', 75, 4, 2, 1, 2.8, 267523414, 0),
(56, 'Starry, J.', 'female', 84, 3, 4, 4, 3.3, 545216454, 0),
(57, 'Hiemerschmitz, A.', 'female', 93, 5, 2, 1, 2.7, 283846386, 0),
(58, 'Marshmallton', 'male', 68, 3, 2, 3, 3, 347237344, 0),
(59, 'Ziebart, F.', 'male', 96, 5, 2, 4, 1.8, 810311182, 0),
(60, 'Calcmity, J.', 'female', 94, 1, 2, 3, 2.6, 652853146, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(40) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `phone_number` bigint(13) DEFAULT NULL,
  `book_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `dept_id`, `phone_number`, `book_id`) VALUES
(1, 'Brian, C.', 3, 7086789, 860),
(2, 'Kevin, D.', 12, 12344444, 0),
(4, 'Clark, E.', 4, 534516733, 832),
(5, 'Edison, L.', 5, 870363156, 578),
(6, 'Jones, J.', 6, 762426640, 755),
(7, 'Randolph, B.', 3, 180654700, 720),
(8, 'Robinson, T.', 3, 677074270, 682),
(9, 'Smith, S.', 1, 863248077, 0),
(3, 'Walter, A.', 4, 225583600, 0),
(21, 'Changyu Wu', 3, 456789023, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `fk_book_id` (`book_id`);

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`advisor_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `fk_teacher_id` (`teacher_id`),
  ADD KEY `fk_dept_id` (`dept_id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD KEY `fk_class_id` (`class_id`),
  ADD KEY `fk_student_id` (`student_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `fk_book_id` (`book_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `fk_parent_id` (`parent_id`),
  ADD KEY `fk_dept_id` (`dept_id`),
  ADD KEY `fk_advisor_id` (`advisor_id`),
  ADD KEY `fk_book_id` (`book_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `fk_dept_id` (`dept_id`),
  ADD KEY `fk_book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
