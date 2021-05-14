-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2020 at 05:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lovingstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(256) COLLATE utf8_bin NOT NULL,
  `thumbnail` varchar(256) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `salt` int(8) NOT NULL,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `contact` varchar(256) COLLATE utf8_bin NOT NULL,
  `email` varchar(256) COLLATE utf8_bin NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `role_id`, `username`, `thumbnail`, `password`, `salt`, `name`, `contact`, `email`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 1, 'xxx', '', 'e8b669e8c3490c1004fc0e7fba284a6fcb5253d2a20ac5364f9eca412c41b14bb451f189346351001aa7b7980598c23e20b82788518e65ea2ae2080f742cfb57', 632598, 'xxx', '0987654321', 'xxx@gmail.com', '2020-06-11 14:21:02', 0, '0000-00-00 00:00:00', 0, 0),
(2, 1, 'emmwee', '', 'cddc3b05059022a978c0765199e5b6876b38b6e717beeb8dd418ddfac8ef11bc0a0269730a0f49e9ced50024a9218bbda417c5632c02b222c6898886f3d0a43b', 549959, 'Emmanual', '123456789', 'emmwee96@gmail.com', '2020-09-14 06:13:56', 1, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(256) COLLATE utf8_bin NOT NULL,
  `type` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`, `type`) VALUES
(1, 'admin', 'ADMIN'),
(2, 'user', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `referral_id` int(11) NOT NULL,
  `username` varchar(256) COLLATE utf8_bin NOT NULL,
  `id_no` varchar(256) COLLATE utf8_bin NOT NULL,
  `contact` varchar(256) COLLATE utf8_bin NOT NULL,
  `tax_no` varchar(256) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `salt` int(8) NOT NULL,
  `referral_code` varchar(256) COLLATE utf8_bin NOT NULL,
  `lover_level` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `referral_id`, `username`, `id_no`, `contact`, `tax_no`, `password`, `salt`, `referral_code`, `lover_level`, `created_date`, `created_by`, `modified_date`, `modified_by`, `deleted`) VALUES
(1, 2, 0, 'emmuser', '123456789', '123456789', '123456789', '25c5eb988f83e94e5e93925f5c1982e211e68427e4bebe3f5b4d406c2773bab4f83a3fe6e869032c1fbcaf3c82895ace54e0be1e12d074c643efec16a9faec61', 447055, 'sLLa1YOmbi', 1, '2020-10-23 14:00:25', 0, '0000-00-00 00:00:00', 0, 0),
(2, 2, 1, 'testuser', '15645464', '15614565', '561156445', '625eeb746f77367a8022f7b7a13956277d924e60c5a25d0926d3bde009bebd60190941dc197abe73fbe400ea404503be00e71f11a2eb8c17eba04bc79d227a35', 479677, 'lPKuhkUnGC', 0, '2020-10-23 14:19:57', 0, '0000-00-00 00:00:00', 0, 0),
(3, 2, 1, 'testuser2', '894944151', '54646489', '16948', '23b2c0936819de7db063099d308c48dfddf3e4a6337f7045591461d6e0dcfa55f438e83bd00141fc687608887b7aca882fcaaf0442075a8c879e3b783137658a', 950238, 'd6F4Dabtet', 0, '2020-10-23 14:35:33', 0, '0000-00-00 00:00:00', 0, 0),
(4, 2, 1, 'testuser3', '15645464', '12312312', '1231232', '9ca48000387b2d2f827ce8aed0d07589335ddb6690273903627baee6b556e0e34250eda0a111f17822a8347199d40364014fd841769c9fcd94333729517959f1', 654946, '6DzZxOy59r', 0, '2020-10-23 14:36:47', 0, '0000-00-00 00:00:00', 0, 0),
(5, 2, 1, 'testuser4', '12312312312', '23423423423', '23423432423', 'a05627cf0d6ed6de2a96726c76f50ac5d85d853c5c06bcc34d6d4ccf5ed71328d2845012433ef87d64f16c60a971c072c8898a691db2a20ccdff0e404d24efe3', 418269, 'WgvB7EpcnT', 0, '2020-10-23 14:38:15', 0, '0000-00-00 00:00:00', 0, 0),
(6, 2, 1, 'testuser5', '1231231232', '234234234', '23423423432', '13a4eaae891a3ab97483aebadee3adaddfa307f691e130e94d58c57e3e7d39c502406137bd4541f5fa32334df06ce40d13cd58f3caf440f6594ec63127a4b3b7', 496567, 'MLVYI6UHIx', 0, '2020-10-23 14:38:45', 0, '0000-00-00 00:00:00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
