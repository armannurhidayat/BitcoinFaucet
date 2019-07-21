-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2019 at 04:23 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitcoinfaucet`
--

-- --------------------------------------------------------

--
-- Table structure for table `coinpot`
--

CREATE TABLE `coinpot` (
  `id_coinpot` varchar(50) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_coin` varchar(50) DEFAULT NULL,
  `payment` varchar(100) NOT NULL,
  `timer` int(10) NOT NULL,
  `withdrawal` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coinpot`
--

INSERT INTO `coinpot` (`id_coinpot`, `nama`, `status`, `id_coin`, `payment`, `timer`, `withdrawal`, `link`, `added`) VALUES
('f2b5bfa4-c903-425a-8121-41e620db7e7c', 'Tambah', 'legit', '2c8a8a54-5139-4ade-8dba-70f0e95ea71d', 'CoinPot', 1, '1', '1', '2019-07-21 22:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `coin_list`
--

CREATE TABLE `coin_list` (
  `id` varchar(50) NOT NULL,
  `nama_coin` varchar(200) NOT NULL,
  `code_coin` varchar(100) NOT NULL,
  `logo_coin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coin_list`
--

INSERT INTO `coin_list` (`id`, `nama_coin`, `code_coin`, `logo_coin`) VALUES
('2c8a8a54-5139-4ade-8dba-70f0e95ea71d', 'bitcoin', 'btc', ''),
('876f7044-4f6b-4197-b90a-621ac46d94d1', 'dogecoin', 'doge', '');

-- --------------------------------------------------------

--
-- Table structure for table `direct`
--

CREATE TABLE `direct` (
  `id_direct` varchar(50) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `id_coin` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `timer` int(10) NOT NULL,
  `withdrawal` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `direct`
--

INSERT INTO `direct` (`id_direct`, `nama`, `id_coin`, `status`, `payment`, `timer`, `withdrawal`, `link`, `added`) VALUES
('4098a117-e4a3-4da3-a785-5c440ba9a58c', 'Tambah1', '2c8a8a54-5139-4ade-8dba-70f0e95ea71d', 'legit', 'Direct', 1, '1', '1', '2019-07-21 21:52:59'),
('5572dd75-6c73-41f6-856a-c17c83fe1f63', 'Tambah', '876f7044-4f6b-4197-b90a-621ac46d94d1', 'testing', 'Direct', 1, '2', 'https://facebook.com', '2019-07-21 21:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `faucethub`
--

CREATE TABLE `faucethub` (
  `id_faucethub` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `id_coin` int(10) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `timer` int(10) NOT NULL,
  `withdrawal` varchar(100) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faucethub`
--

INSERT INTO `faucethub` (`id_faucethub`, `status`, `nama`, `id_coin`, `payment`, `timer`, `withdrawal`, `link`) VALUES
('477e5137-6f02-4f73-a700-08fc3d23a06e', 'testing', 'Tambah11', 2, 'FaucetHub', 1, '1', '111'),
('a5bb7504-f4ca-43cf-ac1b-2a4f3b77aa72', 'legit', 'Tambah1', 2, 'FaucetHub', 1, '1', '1111'),
('c9f64b5d-7746-41a8-94be-b39c6faf6afc', 'legit', 'Tambah', 2, 'FaucetHub', 1, '1', '11');

-- --------------------------------------------------------

--
-- Table structure for table `ptc`
--

CREATE TABLE `ptc` (
  `id_ptc` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'arman nur hidayat', 'admin', '$2y$10$B328GKeFb7BxXiJ.gMVxwekOOwQVYquawfQGXkzKaDcnw/VnL1Gse', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coinpot`
--
ALTER TABLE `coinpot`
  ADD PRIMARY KEY (`id_coinpot`),
  ADD KEY `id_coin` (`id_coin`);

--
-- Indexes for table `coin_list`
--
ALTER TABLE `coin_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direct`
--
ALTER TABLE `direct`
  ADD PRIMARY KEY (`id_direct`),
  ADD KEY `id_coin` (`id_coin`);

--
-- Indexes for table `faucethub`
--
ALTER TABLE `faucethub`
  ADD PRIMARY KEY (`id_faucethub`);

--
-- Indexes for table `ptc`
--
ALTER TABLE `ptc`
  ADD PRIMARY KEY (`id_ptc`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coinpot`
--
ALTER TABLE `coinpot`
  ADD CONSTRAINT `coinpot_ibfk_1` FOREIGN KEY (`id_coin`) REFERENCES `coin_list` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `direct`
--
ALTER TABLE `direct`
  ADD CONSTRAINT `direct_ibfk_1` FOREIGN KEY (`id_coin`) REFERENCES `coin_list` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
