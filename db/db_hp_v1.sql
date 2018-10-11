-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2018 at 10:18 AM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.0.32-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hp_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_group_menu`
--

CREATE TABLE `mst_group_menu` (
  `menu_group_id` int(11) NOT NULL,
  `menu_group_name` varchar(255) NOT NULL,
  `menu_group_role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_group_menu`
--

INSERT INTO `mst_group_menu` (`menu_group_id`, `menu_group_name`, `menu_group_role_id`) VALUES
(1, 'Menagement User', 1),
(2, 'Manage System', 1),
(3, 'Master', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_menu`
--

CREATE TABLE `mst_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_icon` varchar(255) DEFAULT NULL,
  `menu_controller_name` varchar(255) NOT NULL,
  `menu_user_id` int(11) DEFAULT NULL,
  `menu_group_id` int(11) DEFAULT NULL,
  `menu_is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=notactive;1=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_menu`
--

INSERT INTO `mst_menu` (`menu_id`, `menu_name`, `menu_icon`, `menu_controller_name`, `menu_user_id`, `menu_group_id`, `menu_is_active`) VALUES
(1, 'Menagement User', 'fa-user', 'user', 1, 1, 1),
(2, 'Menu', 'fa-cubes', 'menu', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `UserId` bigint(20) NOT NULL,
  `UserFullName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `UserEmail` varchar(50) DEFAULT NULL,
  `UserRoleId` int(11) DEFAULT NULL,
  `UserPassword` varchar(50) DEFAULT NULL,
  `UserPhoto` varchar(255) DEFAULT NULL,
  `UserIpAddress` varchar(50) DEFAULT NULL,
  `UserIsState` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=logout;login',
  `UserLoginTime` datetime DEFAULT NULL,
  `UserLogoutTime` datetime DEFAULT NULL,
  `UserIsActive` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=inactive;1=active',
  `UserCreatedDate` datetime DEFAULT NULL,
  `UserUpdatedDate` datetime DEFAULT NULL,
  `UserCreatedBy` int(11) DEFAULT NULL,
  `UserUniqueCode` varchar(40) NOT NULL,
  `UserForgotPassTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`UserId`, `UserFullName`, `UserName`, `UserEmail`, `UserRoleId`, `UserPassword`, `UserPhoto`, `UserIpAddress`, `UserIsState`, `UserLoginTime`, `UserLogoutTime`, `UserIsActive`, `UserCreatedDate`, `UserUpdatedDate`, `UserCreatedBy`, `UserUniqueCode`, `UserForgotPassTime`) VALUES
(1, 'SYSTEM APPLICATION', 'root', 'ROOT@mail.com', 1, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '::1', 1, '2018-10-11 05:24:13', '2018-10-11 00:15:15', 1, '2018-10-10 21:24:21', '2018-10-10 00:00:00', NULL, '', '2018-10-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user_profile`
--

CREATE TABLE `mst_user_profile` (
  `mup_id` int(11) NOT NULL,
  `mup_name` varchar(255) NOT NULL,
  `mup_user_id` int(11) NOT NULL,
  `mup_grup_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trs_user_role`
--

CREATE TABLE `trs_user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trs_user_role`
--

INSERT INTO `trs_user_role` (`role_id`, `role_name`) VALUES
(1, 'SYSTEM APPLICATION');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_group_menu`
--
ALTER TABLE `mst_group_menu`
  ADD PRIMARY KEY (`menu_group_id`);

--
-- Indexes for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `mst_user_profile`
--
ALTER TABLE `mst_user_profile`
  ADD PRIMARY KEY (`mup_id`);

--
-- Indexes for table `trs_user_role`
--
ALTER TABLE `trs_user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_group_menu`
--
ALTER TABLE `mst_group_menu`
  MODIFY `menu_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `UserId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_user_profile`
--
ALTER TABLE `mst_user_profile`
  MODIFY `mup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trs_user_role`
--
ALTER TABLE `trs_user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
