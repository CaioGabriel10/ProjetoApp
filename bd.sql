-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Out-2016 às 17:28
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `senha`) VALUES
(1, 'teste1', 'teste1@gmail.com', '1'),
(2, 'teste2', 'teste2@gmail.com', '2'),
(3, 'teste3', 'teste3@gmail.com', '3'),
(4, 'teste4', 'teste4@gmail.om', '4'),
(5, 'teste5', 'teste5@hotmail.com', '1'),
(6, 'teste6', 'teste6@gmail.com', '11'),
(7, 'teste7', 'teste7@hotmail.com', '7'),
(8, 'teste8', 'teste8@hotmail.com', '8'),
(9, 'teste9', 'teste9@hotmail.com', '99'),
(10, 'teste10', 'teste10@gmail.com', '10'),
(11, 'teste11', 'teste11@gmail.com', '11'),
(12, 'teste12', 'teste12@gmail.com', '12'),
(13, 'teste13', 'teste13@gmail.com', '13'),
(14, 'teste14', 'teste14@gmaiil.com', '14'),
(15, 'teste15', 'teste15@gmail.com', '15'),
(16, 'teste30', 'teste30@gmail.com', '30'),
(17, 'teste31', 'teste31@gmail.com', '31'),
(18, 'teste32', 'teste32@gmail.com', '32'),
(19, 'teste33', 'teste33@gmail.com', '33'),
(20, 'teste16', 'teste16@gmail.com', '166'),
(21, 'teste21', 'teste21@gmail.com', '21'),
(22, 'teste22', 'teste22@gmail.com', '22'),
(23, 'teste23', 'teste23@gmail.com', '23'),
(24, 'teste25', 'teste25@gmail.com', '25'),
(25, 'teste26', 'teste26@gmail.com', '26'),
(26, 'teste27', 'teste27@gmail.com', '27'),
(27, 'teste28', 'teste28@gmail.com', '28'),
(28, 'teste29', 'teste29@gmail.com', '29'),
(29, 'teste34', 'teste34@gmail.com', '34'),
(30, 'teste35', 'teste35@gmail.com', '35'),
(31, 'teste36', 'teste36@gmail.com', '36'),
(32, 'teste37', 'teste37@gmail.com', '37'),
(33, 'teste40', 'teste40@gmail.com', '40'),
(34, 'teste41', 'teste41@gmail.com', '41'),
(35, 'teste42', 'teste42@gmail.com', '42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `dispositivo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `servico` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ultima_att` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cliente_id_cliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `dispositivo`, `servico`, `descricao`, `status`, `ultima_att`, `cliente_id_cliente`) VALUES
(44, 'smartphone', 'assitencia-tecnica', 'qwqqw', 'enviado', '2016-10-05 15:25:21', 34),
(43, 'computador', 'assitencia-tecnica', 'qwq', 'enviado', '2016-10-05 15:25:17', 34),
(42, 'notebook', 'assitencia-tecnica', 'asa', 'enviado', '2016-10-05 15:18:05', 35),
(41, 'computador', 'limpeza', 'qwwq wq  wq qwwq wq  wq qwwq wq  wq qwwq wq  wq qwwq wq  wq qwwq wq  wq qwwq wq  wq qwwq wq  wq qwwq', 'enviado', '2016-10-05 15:13:56', 34),
(40, 'smartphone', 'assitencia-tecnica', 'asa', 'enviado', '2016-10-05 15:10:19', 34),
(39, 'computador', 'limpeza', 'as', 'enviado', '2016-10-05 15:10:04', 34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_pedido_cliente_idx` (`cliente_id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
