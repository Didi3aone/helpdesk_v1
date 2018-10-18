-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2018 at 10:22 AM
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
  `menu_group_role_id` int(11) DEFAULT NULL,
  `menu_group_icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_group_menu`
--

INSERT INTO `mst_group_menu` (`menu_group_id`, `menu_group_name`, `menu_group_role_id`, `menu_group_icon`) VALUES
(1, 'Menagement User', 1, 'fa-user'),
(2, 'Manage System', 1, 'fa-bars'),
(3, 'Master', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_menu`
--

CREATE TABLE `mst_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_icon` varchar(255) DEFAULT NULL,
  `menu_controller_name` varchar(255) NOT NULL,
  `menu_url` varchar(255) DEFAULT NULL,
  `menu_action` varchar(255) DEFAULT NULL,
  `menu_button_id` int(11) DEFAULT NULL,
  `menu_user_id` int(11) DEFAULT NULL,
  `menu_group_id` int(11) DEFAULT NULL,
  `menu_is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=notactive;1=active',
  `menu_created_date` datetime DEFAULT NULL,
  `menu_updated_date` datetime DEFAULT NULL,
  `menu_created_by` int(11) DEFAULT NULL,
  `menu_updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_menu`
--

INSERT INTO `mst_menu` (`menu_id`, `menu_name`, `menu_icon`, `menu_controller_name`, `menu_url`, `menu_action`, `menu_button_id`, `menu_user_id`, `menu_group_id`, `menu_is_active`, `menu_created_date`, `menu_updated_date`, `menu_created_by`, `menu_updated_by`) VALUES
(1, 'User List', 'fa-user', 'user', NULL, 'CRUD', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 'Menu', ' fa-bars', 'menu', NULL, NULL, NULL, 1, 2, 1, NULL, NULL, NULL, NULL),
(4, 'Group Menu', '', 'menu', '/list-group', 'CRUD', NULL, NULL, 2, 1, '2018-10-15 11:09:00', NULL, 1, NULL),
(5, 'User Previliges', '', 'user', '/user-previliges', 'CRUD', NULL, NULL, 1, 1, '2018-10-15 13:32:49', NULL, 1, NULL);

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
  `UserProfileId` int(11) DEFAULT NULL,
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

INSERT INTO `mst_user` (`UserId`, `UserFullName`, `UserName`, `UserEmail`, `UserRoleId`, `UserPassword`, `UserPhoto`, `UserIpAddress`, `UserIsState`, `UserProfileId`, `UserLoginTime`, `UserLogoutTime`, `UserIsActive`, `UserCreatedDate`, `UserUpdatedDate`, `UserCreatedBy`, `UserUniqueCode`, `UserForgotPassTime`) VALUES
(1, 'SYSTEM APPLICATION', 'root', 'ROOT@mail.com', 1, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', '::1', 1, 1, '2018-10-15 13:31:48', '2018-10-15 10:33:18', 1, '2018-10-10 21:24:21', '2018-10-10 00:00:00', NULL, '', '2018-10-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user_profile`
--

CREATE TABLE `mst_user_profile` (
  `profile_id` int(11) NOT NULL,
  `profile_name` varchar(255) NOT NULL,
  `menu_grup` varchar(255) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user_profile`
--

INSERT INTO `mst_user_profile` (`profile_id`, `profile_name`, `menu_grup`, `menu_id`, `role_id`) VALUES
(1, 'IT (SYSTEM APPLICATION)', '1,2', '1,2,5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_button_action`
--

CREATE TABLE `tbl_button_action` (
  `button_id` int(11) NOT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `button_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_button_action`
--

INSERT INTO `tbl_button_action` (`button_id`, `button_name`, `button_icon`) VALUES
(1, 'Tambah', 'fa-plus');

-- --------------------------------------------------------

--
-- Table structure for table `trs_menu_user_detail`
--

CREATE TABLE `trs_menu_user_detail` (
  `detail_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trs_menu_user_detail`
--

INSERT INTO `trs_menu_user_detail` (`detail_id`, `menu_id`, `user_id`, `role_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1);

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
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `tbl_button_action`
--
ALTER TABLE `tbl_button_action`
  ADD PRIMARY KEY (`button_id`);

--
-- Indexes for table `trs_menu_user_detail`
--
ALTER TABLE `trs_menu_user_detail`
  ADD PRIMARY KEY (`detail_id`);

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
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `UserId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mst_user_profile`
--
ALTER TABLE `mst_user_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_button_action`
--
ALTER TABLE `tbl_button_action`
  MODIFY `button_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trs_menu_user_detail`
--
ALTER TABLE `trs_menu_user_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trs_user_role`
--
ALTER TABLE `trs_user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
