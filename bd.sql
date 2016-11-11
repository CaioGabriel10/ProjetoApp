-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Nov-2016 às 14:25
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste_app1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `criacao_cli` date NOT NULL,
  `ultima_att` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `senha`, `criacao_cli`, `ultima_att`) VALUES
(1, 'teste1', 'teste1@gmail.com', '7350', '2016-01-16', '2016-10-14 17:04:07'),
(2, 'teste2', 'teste2@gmail.com', '5671', '2016-08-07', '2016-10-14 17:04:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `dispositivo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `servico` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor` double NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `criacao_ped` date NOT NULL,
  `ultima_att` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cliente_id_cliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `dispositivo`, `servico`, `descricao`, `valor`, `status`, `criacao_ped`, `ultima_att`, `cliente_id_cliente`) VALUES
(1, 'notebook', 'assitencia-tecnica', 'teste teste teste[...]', 168, 'enviado', '2016-10-27', '2016-11-09 21:23:12', 48),
(2, 'computador', 'assitencia-tecnica', 'teste teste teste[...]', 404, 'cancelado', '2016-12-16', '2016-11-09 21:23:12', 26);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
