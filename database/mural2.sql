-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 01:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mural2`
--

-- --------------------------------------------------------

--
-- Table structure for table `recados`
--

CREATE TABLE `recados` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_criacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recados`
--

INSERT INTO `recados` (`id`, `titulo`, `descricao`, `usuario_id`, `data_criacao`) VALUES
(4, 'dwd', 'wdw', 6, '2025-12-03 21:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `foto`) VALUES
(1, 'keirrison', 'keirrisonlima815@gmail.com', '$2y$10$yYI7phH78fieK5VmpUEQtu/ZNs5D8POIGAKRFsEZcxkuxcnoK1vwW', NULL),
(2, 'keirrison01', 'keirrison@gmail', '$2y$10$ndNDGjCWbyNy3Xl8OzvtzOALLwjHMe9h2E.S115Rw9Kl6u.rkreEu', NULL),
(3, 'keirrison011', 'keirrison011@gmail.com', '$2y$10$i61E0RqctpcGsDWFTwdj7.vuRVyfq4dkrKrKxm6ktjF8s7tCwx0ia', NULL),
(4, 'keirrison09', 'keirrison09@gmail', '$2y$10$PYTKTjASi4aFI9Wo70CSaeyr3CkNMvpj.P6j28.MU8YP/0VGzNCVq', NULL),
(5, 'keirrison', 'keirrisonlima@gmail.com', '$2y$10$66s9pIs1gYK4kixElUsjkePVpA2eLao7K9QhWSbq0WKlQXyJTapSW', NULL),
(6, 'keirrison', 'keirrison009@gmail.com', '$2y$10$gnB.dEIjs.DspT38TMjcR.7v310zxHNSJzeEsv4KnWsB6dtiPwDQC', NULL),
(7, 'keirrison', 'keirrisonlima001@gmail.com', '$2y$10$9WN.apOL1JJx1Vj1zPKV9.7CimSZcl3Xaj0Dj3sUV6dzTcvbfKG4a', NULL),
(8, 'tiririca', 'tiririca22@gmail', '$2y$10$PyOWRxj3kKd6mEQIwHAfeuiYKBd00KDYSNjKeemK4m/vdkNQQZ4q.', '6930d071b1730.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recados`
--
ALTER TABLE `recados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recados`
--
ALTER TABLE `recados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recados`
--
ALTER TABLE `recados`
  ADD CONSTRAINT `recados_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
