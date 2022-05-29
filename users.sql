-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 08:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atif`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `profile_pic` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'inactive',
  `token` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `mobile`, `gender`, `state`, `ip`, `created_at`, `profile_pic`, `status`, `token`) VALUES
(1, 'tester', 'test@mail.com', '$2y$10$0qPEi76CfPTCeUe04BTzjuNq5aFLILixPI86SzRtltx5b2k4DxEGu', 7897897892, 'Male', 'Telanagana', '::1', '2022-04-05 20:36:19', '', 'active', '2a00f8084fa0f50d5a86fc6cf05152ff'),
(2, 'hello', 'hello@mail.com', '$2y$10$r33EQa/sfB9LIdbG7C06zO555iW2oVZvXiojBC4leuWssGb85iQI2', 4567897894, 'Male', 'Telanagana', '::1', '2022-04-05 20:39:57', '', 'inactive', '6d726950e6b79e7ac4eac55b84252a63'),
(3, 'Welcome', 'welcome@mail.com', '$2y$10$sQGj2cpBw9m3KW0IXz1ISek8OhFjBvh56v4xgjOEpeFohDbMX0quG', 0, '', 'Telanagana', '::1', '2022-04-05 20:58:51', '', 'inactive', '619c7f9e2daf0daf2127cb73b5b8cdbc'),
(5, 'Ram Babburi', 'rambabburi@gmail.com', '$2y$10$cBB807DRpLeI1LiMyQpjR.BtZo8jpt9zG89e6zbW5Ae.IHPmJaXUC', 7897897897, 'Male', 'Odisha', '::1', '2022-04-06 20:26:26', '', 'active', '757e83423315dbcb336dfeff9344fb06'),
(7, 'tester', 'tejameet@gmail.com', '$2y$10$uam5vwn7ogdn16jBw.2kyu56TyxLCIa9O./WnwKNhM2HBBJs95hO.', 7897897890, '', 'Telanagana', '::1', '2022-04-07 09:32:16', '', 'inactive', 'ae7c28566631b5fd948051332bb1477d'),
(31, 'beingsahil', 'beingsahil70@gmail.com', '$2y$10$Mo0x/2K1DvVnfw.B5GG.Uetgq2SL/auO7jNwdsyEm3X0MJ3MrM8iW', 7678251169, 'Male', 'Telanagana', '::1', '2022-04-08 02:32:41', '', 'inactive', '7595b61406cb642a36d5f0021895bf63'),
(33, 'ATIF INAM', 'ATIFINAM17@GMAIL.COM', '$2y$10$z437hfmxyI5TUEC55PHOAOb.TU9Ajcpo6RB9g0Zp4eolkAY1p1PJS', 7678251169, 'Male', 'Telanagana', '::1', '2022-04-08 02:46:49', '', 'active', '39bb0365d8a4d3c7f87c52aec119e359'),
(35, 'admin', 'admin@gmail.com', '$2y$10$FwfrXpnVJ3jK5yNRDv/Pk./pWbr.9tXMx1VqQ17FhjY/4nye6WyP.', 1234567890, 'Male', 'Odisha', '::1', '2022-04-08 04:42:14', '', 'inactive', '3dd8d71f8717f383553602ab095c473e'),
(45, 'Inam Khan', 'inam@gmail.com', '$2y$10$FuK6vNVurkL5oupN2vrx.e.NTYe2kks6xGQJ3aGz0fzzo0WSBG7X.', 1234567890, 'Male', 'Odisha', '::1', '2022-04-12 01:28:40', '', 'inactive', 'dcf4f8090965b54c170400d92107e04e'),
(46, 'Faiz Sikandar', 'faiz@gmail.com', '$2y$10$VH55WjDsGi679jATknxjJ.gXyVZjOINQuI7PmALUQ0/dLzsmxCIIG', 7457224755, 'Male', 'Telanagana', '::1', '2022-04-15 04:42:33', '', 'inactive', '27b2df6b12ba73539781edaffa65ef3f'),
(47, 'Abcde', 'abcd@gmail.com', '$2y$10$WIt09b.MoAhen74fWppD..zeIagfAJ5UpbcdJP96Nh.xNs6dTOwZ.', 9889772819, 'Female', 'Telanagana', '::1', '2022-04-21 04:43:07', '', 'inactive', '3a87d7ded1767af78fee6a73d8926a7a'),
(49, 'ATIF INAM', 'ntr@gmail.com', '$2y$10$Jmrs5sj0XR38GMpt4pSNwusvcuZI.crHdM2ov.z3jPwKU4LUhZafK', 7678251169, 'Male', 'Telanagana', '::1', '2022-05-10 21:53:57', '', 'inactive', '7685ca4fbaa6793b81a1000e794a4973'),
(50, 'Bingo', 'bingo@gmail.com', '$2y$10$Ahlcckr/VpD4zfFsjoMieu7A7lpFnVP7kU0Drp3Lrcr1Jqz7Wznsu', 909090909, 'Male', 'Andhrapradesh', '::1', '2022-05-10 21:56:37', '', 'inactive', '38043f543b9f3042ff859b858d2ed359');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
