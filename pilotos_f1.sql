-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07/11/2025 às 18:26
-- Versão do servidor: 8.0.40
-- Versão do PHP: 8.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_formulario`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pilotos_f1`
--

CREATE TABLE `pilotos_f1` (
  `id` int NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `equipe` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pilotos_f1`
--

INSERT INTO `pilotos_f1` (`id`, `nome`, `equipe`, `pais`) VALUES
(2, 'Lewis Hamilton', 'Ferrari', 'Reino Unido'),
(3, 'Carlos Sainz', 'Willians', 'Espanha'),
(8, 'Charles Leclerc', 'Ferrari', 'Mônaco');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pilotos_f1`
--
ALTER TABLE `pilotos_f1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pilotos_f1`
--
ALTER TABLE `pilotos_f1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
