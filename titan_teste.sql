-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Dez-2020 às 18:30
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `titan_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

CREATE TABLE `precos` (
  `id` int(11) NOT NULL,
  `preco` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `precos`
--

INSERT INTO `precos` (`id`, `preco`) VALUES
(1, 45.50),
(2, 12.00),
(3, 10.50),
(4, 2.50),
(5, 25.50),
(6, 1.50),
(7, 25.80),
(8, 565.50),
(9, 1.00),
(10, 75.80),
(11, 55.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `cor`) VALUES
(11, 'Balde d\'água', 'Amarelo'),
(12, 'Tênis SkateBoarding', 'Vermelho'),
(13, 'Caneta Bic', 'Preto'),
(14, 'Lapis de escrever', 'Azul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_precos`
--

CREATE TABLE `produtos_precos` (
  `produto_id` int(11) DEFAULT NULL,
  `preco_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_precos`
--

INSERT INTO `produtos_precos` (`produto_id`, `preco_id`) VALUES
(11, 3),
(12, 10),
(12, 11),
(13, 6),
(14, 9);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `precos`
--
ALTER TABLE `precos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos_precos`
--
ALTER TABLE `produtos_precos`
  ADD KEY `FK_PRODUTOS_PRECOS` (`produto_id`),
  ADD KEY `FK_PRECOS_PRODUTOS` (`preco_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `precos`
--
ALTER TABLE `precos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos_precos`
--
ALTER TABLE `produtos_precos`
  ADD CONSTRAINT `FK_PRECOS_PRODUTOS` FOREIGN KEY (`preco_id`) REFERENCES `precos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_PRODUTOS_PRECOS` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produtos_precos_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `produtos_precos_ibfk_2` FOREIGN KEY (`preco_id`) REFERENCES `precos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
