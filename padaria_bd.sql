-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 01:54 PM
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
-- Database: `padaria_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
    `id` int(100) NOT NULL,
    `usuario_id` int(100) NOT NULL,
    `nome` varchar(100) NOT NULL,
    `preco` int(100)  NOT NULL,
    `quantidade` int(100) NOT NULL,
    `imagem` varchar(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
    `id` int(100) NOT NULL,
    `usuario_id` int(100) NOT NULL,
    `nome` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `numero` varchar(12) NOT NULL,
    `mensagem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
    `id` int(100) NOT NULL,
    `usuario_id` int(100) NOT NULL,
    `nome` varchar(100) NOT NULL,
    `numero` varchar(12) NOT NULL,
    `email` varchar(100) NOT NULL,
    `metodo` varchar(100) NOT NULL,
    `endereco` varchar(500) NOT NULL,
    `total_produtos` varchar(1000) NOT NULL,
    `total_preco` int (100) NOT NULL,
    `quantidade` varchar(50) NOT NULL,
    `status_pagamento` varchar(20) NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
    `id_produto` int(100) NOT NULL,
    `nome_produto` varchar(100) NOT NULL,
    `preco` float NOT NULL,
    `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 
-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
    `id` int(100) NOT NULL,
    `nome` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `senha` varchar(50) NOT NULL,
    `tipo_usuario` varchar (20) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas 
--

--
-- Índice para tabela `carrinho`
--
ALTER TABLE `carrinho`
    ADD PRIMARY KEY (`id`);

--
-- Índice para tabela `mensagem`

--
ALTER TABLE `mensagem`
    ADD PRIMARY KEY (`id`);

--
-- Índice para tabela `pedidos`
--
ALTER TABLE `pedidos`
    ADD PRIMARY KEY (`id`);

--
-- Índice para tabela `produtos`
--
ALTER TABLE `produtos`
    ADD PRIMARY KEY (`id_produto`);

--
-- Índice para tabela `usuario`
--
ALTER TABLE `usuario`

    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para as tabelas 
--

--
-- AUTO_INCREMENT para tabela `carrinho`
--
ALTER TABLE `carrinho`
    MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT= 57;

--
-- AUTO_INCREMENT para tabela `mensagem`
--
ALTER TABLE `mensagem`

    MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT= 10;

--
-- AUTO_INCREMENT para tabela `pedidos`
--
ALTER TABLE `pedidos`
    MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT para tabela  `produtos`
--
ALTER TABLE `produtos`
    MODIFY `id_produto` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT para tabela `usuario`
--
ALTER TABLE `usuario`
    MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT; 

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;