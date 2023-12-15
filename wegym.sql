-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 13/12/2023 às 09:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wegym`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `idusuario`, `nome`, `cpf`, `telefone`) VALUES
(2, 2, 'José', '17875024064', '999222333'),
(4, 4, 'eu', '987192654', '81999914676'),
(5, 5, 'sergio', '11111111111', '81999000111'),
(7, 7, 'helena', '91827162512', '81765125391'),
(10, 17, 'teste', '918261826', '81999962376'),
(11, 18, 'teste2', '10621793078', '81955514676'),
(14, 30, 'aluno1', '09812387612', '81991234576'),
(15, 35, 'tais', '99988877761', '81992314676'),
(16, 36, 'artur', '56789012345', '81999098765');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `idusuario`, `nome`, `cpf`, `telefone`, `cargo`) VALUES
(1, 1, 'usuario_master', '38786541030', '81999999999', 'administrador'),
(4, 11, 'helen1', '123456123', '81987123765', 'prof'),
(5, 5, 'sergio', '11111111111', '81999000111', ''),
(6, 13, 'oi', '123456098', '81980876123', 'prof'),
(7, 14, 'teste', '192819263', '81999182555', 'prof'),
(8, 15, 'teste2', '128736112', '81991214766', 'prof'),
(10, 21, 'agora', '1298', '81999234678', 'administrador'),
(11, 22, 'Helen', '1234', '81999087162', 'adm'),
(12, 23, 'Beatriz', '9812', '81909090909', 'professora'),
(15, 26, 'Walter', '38786541031', '81999000999', 'seila'),
(18, 29, 'art', '9870129716', '81999000888', 'seila'),
(19, 31, 'tais', '76512398732', '81999000888', 'professora'),
(23, 37, 'testando111223', '11122312345', '81999000999', 'prof'),
(27, 41, 'testando11122', '11122312346', '81999000999', 'prof');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `perfil`, `status`) VALUES
(1, 'admin@wegym.com.br', '250cf8b51c773f3f8dc8b4be867a9a02', 'Admin', 'ativo'),
(2, 'jose@gmail.com', '202cb962ac59075b964b07152d234b70', 'Aluno', 'ativo'),
(4, 'eu@eu.com.br', '202cb962ac59075b964b07152d234b70', 'Aluno', 'ativo'),
(5, 'sergio1@sergio.com.br', '202cb962ac59075b964b07152d234b70', 'Aluno', 'ativo'),
(7, 'helena@gmail.com', '202cb962ac59075b964b07152d234b70', 'Aluno', 'ativo'),
(11, 'helen@gmail.com', '202cb962ac59075b964b07152d234b70', 'Professor', 'ativo'),
(12, 'prof@prof.com.br', '202cb962ac59075b964b07152d234b70', 'Professor', 'ativo'),
(13, 'oieu@gmail.com', '202cb962ac59075b964b07152d234b70', 'Professor', 'ativo'),
(14, 'oir@oir.com', '202cb962ac59075b964b07152d234b70', 'Professor', 'ativo'),
(15, 'walter@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Professor', 'ativo'),
(17, 'waalegal@hotmail.com', '202cb962ac59075b964b07152d234b70', 'Aluno', 'ativo'),
(18, 'joseasasasa@gmail.com', '202cb962ac59075b964b07152d234b70', 'Aluno', 'ativo'),
(21, 'agora@wegym.com.br', '202cb962ac59075b964b07152d234b70', 'Professor', 'ativo'),
(22, 'agora1@wegym.com.br', '202cb962ac59075b964b07152d234b70', 'Professor', 'ativo'),
(23, 'oioi@gmail.com', '202cb962ac59075b964b07152d234b70', 'Professor', 'inativo'),
(26, 'admin@wegym.com.brr', '202cb962ac59075b964b07152d234b70', 'Admin', 'ativo'),
(29, 'seila@gmail.com', '202cb962ac59075b964b07152d234b70', 'Professor', 'inativo'),
(30, 'aluno@wegym.com.br', '202cb962ac59075b964b07152d234b70', 'Aluno', 'ativo'),
(31, 'tais@ficr.com.br', '81dc9bdb52d04dc20036dbd8313ed055', 'Professor', 'ativo'),
(35, 'tais@wegym.com.br', '20d135f0f28185b84a4cf7aa51f29500', 'Aluno', 'ativo'),
(36, 'profartur@wegym.com.br', '202cb962ac59075b964b07152d234b70', 'Aluno', 'ativo'),
(37, 'testando111223@wegym.com.br', '202cb962ac59075b964b07152d234b70', 'Professor', 'ativo'),
(41, 'testando11122@wegym.com.br', '202cb962ac59075b964b07152d234b70', 'Professor', 'ativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `id_usuario` (`idusuario`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `id_usuario` (`idusuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
