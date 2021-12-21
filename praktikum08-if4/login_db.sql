-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 12:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` varchar(6) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `gambar`) VALUES
('A0001', 'Percobaan Artikel Pertama', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat diam nec eros maximus, sed sodales est commodo. In consequat ultricies tortor eget semper. Aenean ultricies consequat justo vel lobortis. Donec nec placerat velit, in bibendum justo. Praesent a venenatis diam, nec faucibus dui. Morbi at ipsum et ex efficitur convallis. Suspendisse potenti. Praesent ut tempus sem. Sed non metus ex. Morbi gravida libero porta ante auctor auctor.', '30112021_69985175_2624712725.jpg'),
('A0002', 'CARSA Career Center Smart Assitant', 'Integer sed consectetur quam. Nulla non dapibus dui. Duis gravida tincidunt hendrerit. Fusce euismod velit at nisl congue tempor. Curabitur feugiat purus purus. Aenean suscipit, quam condimentum consectetur varius, nulla tellus feugiat ipsum, et convallis erat dui quis justo. Vivamus luctus est tortor, sagittis sodales risus congue accumsan. Duis tortor nunc, imperdiet fringilla nisl et, tincidunt tristique odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', '30112021_975553790_KentoNanami.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Kang Koding'),
(5, 'ferian@hyung.oppa', 'ab56b4d92b40713acc5af89985d4b786', ''),
(6, 'mbahjonas', '21232f297a57a5a743894a0e4a801fc3', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
