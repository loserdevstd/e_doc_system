-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 02:03 PM
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
(2, 'ໜັງສືແຈ້ງການ');

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
  `fl_type` varchar(50) NOT NULL,
  `fl_cont` mediumblob NOT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `fl_type` varchar(50) NOT NULL,
  `fl_cont` mediumblob NOT NULL,
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp()
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
  `fl_type` varchar(50) NOT NULL,
  `fl_cont` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `passwd` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` int(1) NOT NULL,
  `bithdate` date NOT NULL,
  `age` int(3) NOT NULL,
  `department` int(11) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `tel` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `major` varchar(100) NOT NULL,
  `user_active` int(1) NOT NULL,
  `user_level` int(1) NOT NULL,
  `user_img` varchar(50) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_name`, `passwd`, `fname`, `lname`, `gender`, `bithdate`, `age`, `department`, `mail`, `tel`, `address`, `degree`, `major`, `user_active`, `user_level`, `user_img`, `add_date`, `edit_date`) VALUES
(1, 'loser', 'admin', '', '', 1, '2020-04-05', 22, 1, 'mail@gmail.com', 222222222, 'laos', 'aaaa', 'aaaaaaa', 1, 1, 'aaaaa', '2020-05-27 02:38:39', '2020-05-27 02:38:39');

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
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_doctype`
--
ALTER TABLE `tb_doctype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_doc_incoming`
--
ALTER TABLE `tb_doc_incoming`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mou`
--
ALTER TABLE `tb_mou`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
