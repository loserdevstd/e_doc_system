-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 05:47 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`dep_id`, `dep_name`) VALUES
(1, 'ພະແນກບໍລິຫານ'),
(2, 'ພະແນກພົວພັນຕ່າງປະເທດ'),
(3, 'ພະແນກເລຂາ'),
(4, 'ພະແນກໂຊເພີ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_doctype`
--

CREATE TABLE `tb_doctype` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_doctype`
--

INSERT INTO `tb_doctype` (`type_id`, `type_name`) VALUES
(1, 'ໜັງສືສະເໜີ'),
(2, 'ໜັງສືແຈ້ງການ'),
(3, 'ສະໂນດນຳສົ່ງ'),
(4, 'ບົດລາຍງານ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_doc_incoming`
--

CREATE TABLE `tb_doc_incoming` (
  `in_id` int(11) NOT NULL,
  `in_date` date NOT NULL,
  `doc_type` int(11) NOT NULL,
  `doc_title` text NOT NULL,
  `doc_id` varchar(30) NOT NULL,
  `doc_date` date NOT NULL,
  `doc_form` varchar(100) NOT NULL,
  `doc_dep` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `note` text NOT NULL,
  `fl_name` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_doc_incoming`
--

INSERT INTO `tb_doc_incoming` (`in_id`, `in_date`, `doc_type`, `doc_title`, `doc_id`, `doc_date`, `doc_form`, `doc_dep`, `staff`, `note`, `fl_name`, `create_at`, `edit_date`) VALUES
(2, '2020-06-04', 1, '<p><strong>hello h</strong>ow are youhello how are youhello <em>how </em>are youhello how are youhello <span class=\"marker\">how are youhello </span>how are youhello how are you</p>\r\n', '12|ນຍ', '2020-06-01', 'ຫ້ອງການນາຍົກ', 1, 1, 'aaa', '1593342928-313588.docx', '2020-06-30 05:39:15', '2020-06-28 11:15:28'),
(115, '2020-06-01', 1, '<p>hello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello worldhello world</p>\r\n', '12|ນຍ', '2020-06-28', 'ຫ້ອງການນາຍົກ', 1, 1, '', '1593307804-42412.docx', '2020-06-30 05:39:15', '2020-06-28 01:30:04'),
(116, '2020-06-04', 2, '<p>mmmmmmmmmm mmmmmmmm mmmmmmmm mmmmmmmm mmmmmmmmm mmmmmmmm&nbsp;</p>\r\n', '12|ນຍ', '2020-06-24', 'ຫ້ອງການນາຍົກ', 2, 3, 'aaa', '1593402287-426035.docx', '2020-06-30 05:39:15', '2020-06-29 11:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_doc_outgoing`
--

CREATE TABLE `tb_doc_outgoing` (
  `out_id` int(11) NOT NULL,
  `out_date` date NOT NULL,
  `doc_type` int(11) NOT NULL,
  `doc_title` text NOT NULL,
  `auther` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `doc_dep` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `amount` int(30) NOT NULL,
  `note` text NOT NULL,
  `fl_name` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_general`
--

CREATE TABLE `tb_general` (
  `id` int(2) NOT NULL,
  `gen_history` text NOT NULL,
  `gen_vision` text NOT NULL,
  `gen_system` text NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `postbox` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `weekday` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `foot` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mou`
--

CREATE TABLE `tb_mou` (
  `m_id` int(11) NOT NULL,
  `m_partner` varchar(100) NOT NULL,
  `name_partner` varchar(100) NOT NULL,
  `approved` varchar(20) NOT NULL,
  `signdate` date NOT NULL,
  `expiredate` date NOT NULL,
  `extension` varchar(30) NOT NULL,
  `staff` int(11) NOT NULL,
  `note` text NOT NULL,
  `fl_name` varchar(50) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `newupdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_mou`
--

INSERT INTO `tb_mou` (`m_id`, `m_partner`, `name_partner`, `approved`, `signdate`, `expiredate`, `extension`, `staff`, `note`, `fl_name`, `create_at`, `newupdate`) VALUES
(28, 'Thailand', 'khonkane univer', '1', '2020-06-01', '2020-06-01', '1', 6, '', '', '2020-06-30 05:39:49', '2020-06-25 10:43:29'),
(29, 'Thailand', 'khonkane univer', '1', '2020-06-01', '2020-06-25', '1', 6, '', '', '2020-06-30 05:39:49', '2020-06-25 10:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL COMMENT 'ລະຫັດ ພງ',
  `user_name` varchar(50) NOT NULL COMMENT 'ຊື່ ແລະ ນາມສະກຸນ',
  `passwd` varchar(20) NOT NULL COMMENT 'ລະຫັດຜ່ານ',
  `gender` int(1) NOT NULL COMMENT 'ເພດ',
  `bithdate` date NOT NULL COMMENT 'ວດປ ເກີດ',
  `age` int(3) NOT NULL COMMENT 'ອາຍຸ',
  `position` varchar(50) NOT NULL COMMENT 'ຕຳແໜ່ງ',
  `department` int(11) NOT NULL COMMENT 'ພະແນກ',
  `mail` varchar(30) NOT NULL COMMENT 'ອີເມວ',
  `tel` int(10) NOT NULL COMMENT 'ເບີໂທ',
  `address` varchar(200) NOT NULL COMMENT 'ທີ່ຢູ່',
  `degree` varchar(50) NOT NULL COMMENT 'ລະດັບການສຶກສາ',
  `major` varchar(100) NOT NULL COMMENT 'ສາຂາທີ່ຮຽນ',
  `functionary` int(1) NOT NULL COMMENT 'ລັດຖະກອນ',
  `youth_date` date NOT NULL COMMENT 'ວດປ ເຂົ້າຊາວໜຸມ',
  `labor_date` date NOT NULL COMMENT 'ວດປ ເຂົ້າກຳມະບານ',
  `women_date` date NOT NULL COMMENT 'ວດປ ເຂົ້າແມ່ຍິງ',
  `party_prepare_date` date NOT NULL COMMENT 'ວດປ ເຂົ້າພັກສຳຮອງ',
  `party_complete_date` date NOT NULL COMMENT 'ວດປ ເຂົ້າພັກສົມບູນ',
  `user_active` int(1) NOT NULL COMMENT 'ສະຖານະຜູ້ໃຊ້',
  `user_level` int(1) NOT NULL COMMENT 'ລະດັບຜູ້ໃຊ້',
  `user_img` varchar(50) NOT NULL COMMENT 'ຮູບພາບ',
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'ວັນທີແກ້ໄຂລ່າສຸດ',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `passwd`, `gender`, `bithdate`, `age`, `position`, `department`, `mail`, `tel`, `address`, `degree`, `major`, `functionary`, `youth_date`, `labor_date`, `women_date`, `party_prepare_date`, `party_complete_date`, `user_active`, `user_level`, `user_img`, `edit_date`, `create_at`) VALUES
(1, 'user std', '123456', 1, '1998-12-11', 23, 'boss', 3, 'mail@log', 59451199, 'lao lao lao', '2', 'IT', 2, '1111-11-11', '1111-11-11', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 'img212941315720200702_102908.jpg', '2020-07-02 03:29:08', '2020-07-01 08:27:18'),
(12, 'user 1', '123456', 1, '1998-12-11', 23, 'boss', 3, 'mail@log', 59451199, 'lao lao lao', '2', 'IT', 2, '1111-11-11', '1111-11-11', '0000-00-00', '0000-00-00', '0000-00-00', 1, 2, 'img209754181220200701_193447.png', '2020-07-01 12:54:13', '2020-07-01 12:34:47'),
(13, 'dao', '123123', 1, '1999-11-17', 22, 'boss', 2, 'lao@local', 123, 'nao nao svk', '1', 'TI', 2, '2020-07-02', '2020-06-30', '2020-07-01', '0000-00-00', '2020-07-01', 1, 2, 'img75306638020200702_103212.png', '2020-07-02 03:32:12', '2020-07-02 02:22:54'),
(14, 'user 102', '111111', 1, '2020-07-01', 23, 'boss', 2, 'local@mail', 2055451122, 'Lao, Lao, Lao', '1', 'IT support', 2, '2020-07-02', '2020-07-06', '0000-00-00', '0000-00-00', '0000-00-00', 0, 2, '', '2020-07-02 02:31:21', '2020-07-02 02:31:21'),
(15, 'user 103', '111', 1, '2020-07-01', 21, 'boss', 1, 'ss@a', 123, 'Lao, Lao, Lao', '2', 'ac', 1, '2020-07-01', '2020-07-01', '0000-00-00', '0000-00-00', '0000-00-00', 0, 2, '', '2020-07-02 02:40:40', '2020-07-02 02:40:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `tb_doctype`
--
ALTER TABLE `tb_doctype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tb_doc_incoming`
--
ALTER TABLE `tb_doc_incoming`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `tb_general`
--
ALTER TABLE `tb_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mou`
--
ALTER TABLE `tb_mou`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_department`
--
ALTER TABLE `tb_department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_doctype`
--
ALTER TABLE `tb_doctype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_doc_incoming`
--
ALTER TABLE `tb_doc_incoming`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tb_general`
--
ALTER TABLE `tb_general`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mou`
--
ALTER TABLE `tb_mou`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດ ພງ', AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
