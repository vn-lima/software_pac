-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Out-2020 às 00:51
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto`
--

CREATE TABLE `objeto` (
  `idObjeto` bigint(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(7) UNSIGNED NOT NULL,
  `Objeto_idObjeto` bigint(11) UNSIGNED NOT NULL,
  `Nome` varchar(80) NOT NULL,
  `Valor` decimal(5,2) UNSIGNED NOT NULL,
  `tipo` int(2) NOT NULL,
  `quantidade` int(3) NOT NULL,
  `Descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `CPF` varchar(14) NOT NULL,
  `Username` varchar(80) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(100) NOT NULL,
  `Endereco` varchar(200) NOT NULL,
  `Telefone` varchar(14) NOT NULL,
  `Adm` tinyint(1) UNSIGNED NOT NULL,
  `Objeto_idObjeto` bigint(11) UNSIGNED NOT NULL,
  `Nome` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `idVenda` bigint(10) UNSIGNED NOT NULL,
  `Objeto_idObjeto` bigint(11) UNSIGNED NOT NULL,
  `Usuário_CPF` varchar(14) NOT NULL,
  `Produto_idProduto` int(7) UNSIGNED NOT NULL,
  `data` datetime NOT NULL,
  `id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`idObjeto`),
  ADD UNIQUE KEY `idObjeto_UNIQUE` (`idObjeto`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`),
  ADD UNIQUE KEY `idProduto_UNIQUE` (`idProduto`),
  ADD UNIQUE KEY `Nome_UNIQUE` (`Nome`),
  ADD KEY `fk_Produto_Objeto1_idx` (`Objeto_idObjeto`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CPF`),
  ADD UNIQUE KEY `CPF_UNIQUE` (`CPF`),
  ADD UNIQUE KEY `Email_UNIQUE` (`Email`),
  ADD KEY `fk_eUser_Objeto_idx` (`Objeto_idObjeto`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idVenda`),
  ADD UNIQUE KEY `idVenda_UNIQUE` (`idVenda`),
  ADD KEY `fk_Venda_Objeto1_idx` (`Objeto_idObjeto`),
  ADD KEY `fk_Venda_eUser1_idx` (`Usuário_CPF`),
  ADD KEY `fk_Venda_Produto1_idx` (`Produto_idProduto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(7) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `idVenda` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_Produto_Objeto1` FOREIGN KEY (`Objeto_idObjeto`) REFERENCES `objeto` (`idObjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_eUser_Objeto` FOREIGN KEY (`Objeto_idObjeto`) REFERENCES `objeto` (`idObjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_Venda_Objeto1` FOREIGN KEY (`Objeto_idObjeto`) REFERENCES `objeto` (`idObjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venda_Produto1` FOREIGN KEY (`Produto_idProduto`) REFERENCES `produto` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venda_eUser1` FOREIGN KEY (`Usuário_CPF`) REFERENCES `usuario` (`CPF`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
