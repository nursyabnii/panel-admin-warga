-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 04:06 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panel_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_keluarga`
--

CREATE TABLE `data_keluarga` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `kelamin` varchar(128) NOT NULL,
  `tempatlahir` varchar(128) NOT NULL,
  `tanggallahir` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `pendidikan` varchar(128) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `kewarganegaraan` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_keluarga`
--

INSERT INTO `data_keluarga` (`id`, `user_id`, `name`, `nik`, `kelamin`, `tempatlahir`, `tanggallahir`, `alamat`, `agama`, `pendidikan`, `pekerjaan`, `status`, `kewarganegaraan`, `image`) VALUES
(3, 7, 'Ihsaan Syaputra', '4312001077', 'Laki-Laki', 'Tegal', '17 Agustus 1945', 'Griya Pratama Blok I No 22', 'Buddha', 'SLTA/Sederajat', 'Mahasiswa', 'Kepala Keluarga', 'Indonesia', ''),
(10, 2, 'Bernadus Bezaro Halawa', '4312001037', 'Laki-Laki', 'Batam', '22 Agustus 2001', 'Kavling Seroja', 'Kristen', 'SLTA/Sederajat', 'Mahasiswa', 'Kepala Keluarga', 'Indonesia', ''),
(11, 2, 'Ahmad Sepriadi', '4312001100', 'Laki-Laki', 'Padang', '09 Januari 2001', 'Batam Center', 'Konghucu', 'SLTA/Sederajat', 'Maxim', 'Anak', 'Indonesia', ''),
(28, 3, 'Bani', '4312001033', 'Laki-Laki', 'Tegal', '28 Oktober 2001', 'Batu Aji', 'Islam', 'SLTA/Sederajat', 'Mahasiswa', 'Anak', 'Indonesia', ''),
(29, 3, 'Raihan', '4312012841', 'Perempuan', 'Batam', '10 Januari 2002', 'Batu Aji', 'Islam', 'SLTA/Sederajat', 'Mahasiswa', 'Istri', 'Indonesia', ''),
(32, 9, 'Ahmad Sepriadi', '431201001', 'Laki-Laki', 'Padang', '17 Januari 2002', 'Batam Center', 'Islam', 'SLTA/Sederajat', 'Maxim', 'Kepala Keluarga', 'Indonesia', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Daniel Silitonga', 'danielsilitonga@gmail.com', 'default.jpg', '$2y$10$yLyeZWsJzYtGoyb5IxIZb.Xj27FtzU7CDAVsZZJw/Q0Yf4BD5vv92', 2, 1, 1661488178),
(7, 'Muhammad Nur Sya\'bani Haris', 'nursyabanigaul29@gmail.com', 'Photo.jpg', '$2y$10$5z8/4y59PIQyuV7VvovPgu21hXAWnlMgC4zr6wd1GicQwUl9NI19C', 1, 1, 1661877753),
(8, 'Ikel', 'yeheskieltampubolon@gmail.com', 'default.jpg', '$2y$10$reXey8SPB3PTiGFrXqTjIOJO3EZMzD3oVva/J/JEedFvagTSoFVSC', 2, 0, 1665037987),
(9, 'Ahmad Sepriadi', 'ulatmadu271@gmail.com', 'default.jpg', '$2y$10$dh7LTguxeZ/nAtf0SpLz4u7to2NDbOeJyaWGQS1tz39736u8AxHXK', 2, 1, 1667373682),
(11, 'Nursyabani', 'baniharis12@gmail.com', 'default.jpg', '$2y$10$PvHIiLUlxujDoAmPiU1OuuN2g6f1XQImTzmIYNgweawq3XyYxjIb.', 1, 1, 1667887424),
(12, 'Muhammad Rizki Saputra', 'rizki12@gmail.com', 'default.jpg', '$2y$10$3yxjXeMtIcQdkYitC1WYceC9TRRlpKUf2Zqc5IZl/jTdumz0pxMU6', 1, 1, 1690115016);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(15, 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Home Information', 'user/home', 'fas fa-fw fa-house-user', 1),
(3, 2, 'My Profile', 'user', 'fas fa-fw fa-solid fa-user', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(9, 1, 'Data Warga', 'admin/datawarga', 'fas fa-fw fa-city', 1),
(10, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(11, 1, 'Management Account', 'admin/managementaccount', 'fas fa-fw fa-wrench', 1),
(23, 2, 'Data Keluarga', 'user/datakeluarga', 'fas fa-fw fa-city', 1),
(24, 1, 'Guest', 'admin/guest', 'fas fa-fw fa-user-tie', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(6, 'yeheskieltampubolon@gmail.com', 'sXuJX172aFQ77123UX9DUm0wSoCWIGLa79pdJXcN8gw=', 1665037987),
(7, 'ulatmadu271@gmail.com', '4iRb9cGmhYEUxrKUvLcduSDMWgQAxgBH9eZQNr0U1Fk=', 1667373682),
(8, 'baniharis12@gmail.com', '9CBulSvr+Igsg5NOZ+1KgELErKsIOJnZKgbEVb+Ji14=', 1667887424),
(9, 'rizki12@gmail.com', '3OU2Fi9mGAfK36u7XaOrwwUNAbh1+n7ipAzJrMJcn5A=', 1690115016);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
