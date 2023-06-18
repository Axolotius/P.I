-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2022 às 20:22
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_pi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `nome_adm` varchar(80) NOT NULL,
  `email_adm` varchar(80) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricao`
--

CREATE TABLE `descricao` (
  `id_desc` int(11) NOT NULL,
  `descri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `descricao`
--

INSERT INTO `descricao` (`id_desc`, `descri`) VALUES
(1, 'caixa de remédio vermelha'),
(2, 'caixa com letras verdes'),
(3, 'caixa com capsulas rosa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_end` int(11) NOT NULL,
  `rua_end` varchar(250) NOT NULL,
  `numero_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `id_hr` int(11) NOT NULL,
  `hora_hr` time(4) NOT NULL,
  `id_rmd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`id_hr`, `hora_hr`, `id_rmd`) VALUES
(1, '07:00:00.0000', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `remedio`
--

CREATE TABLE `remedio` (
  `id_rmd` int(11) NOT NULL,
  `nome_rmd` varchar(50) NOT NULL,
  `quantidade_rmd` varchar(50) NOT NULL,
  `id_desc` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `remedio`
--

INSERT INTO `remedio` (`id_rmd`, `nome_rmd`, `quantidade_rmd`, `id_desc`, `id_usuario`) VALUES
(6, 'paracetamol', 'meia dose', 1, 5),
(7, 'amoxilina', 'uma a cada doze horas', 2, 7),
(8, 'Tramadol', 'um por dia apos almoço', 3, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(30) NOT NULL,
  `sobrenome_usuario` varchar(50) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(50) NOT NULL,
  `sexo_usuario` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha_usuario`, `sexo_usuario`) VALUES
(5, 'artur', 'camarg', 'artur@gmail.com', '202cb962ac59075b964b07152d234b70', 'masculino'),
(7, 'elisane', 'oliveira', 'elisany.oliveira@gmail.com', '202cb962ac59075b964b07152d234b70', 'feminino'),
(9, 'sarah', 'oliveira', 'sarah@gmail.com', '202cb962ac59075b964b07152d234b70', 'Feminino'),
(10, 'vitor', 'ferreira', 'vitor@gmail.com', '202cb962ac59075b964b07152d234b70', 'masculino'),
(11, 'nicole', 'luz', 'nicole@gmail.com', '202cb962ac59075b964b07152d234b70', 'Feminino'),
(12, 'luana', 'flor', 'luana@gmail.com', '202cb962ac59075b964b07152d234b70', 'Feminino'),
(13, 'rodrigo', 'php', 'rodrigo@gmail.com', '202cb962ac59075b964b07152d234b70', 'Masculino'),
(15, 'Anai', 'perera', 'anai@gmail.com', '202cb962ac59075b964b07152d234b7', 'Femininno'),
(17, 'daniel', 'cordeir', 'daniel@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'Masculino');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices para tabela `descricao`
--
ALTER TABLE `descricao`
  ADD PRIMARY KEY (`id_desc`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_end`);

--
-- Índices para tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_hr`),
  ADD KEY `id_rmd_2` (`id_rmd`);

--
-- Índices para tabela `remedio`
--
ALTER TABLE `remedio`
  ADD PRIMARY KEY (`id_rmd`),
  ADD KEY `id_desc` (`id_desc`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `descricao`
--
ALTER TABLE `descricao`
  MODIFY `id_desc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_end` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `id_hr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `remedio`
--
ALTER TABLE `remedio`
  MODIFY `id_rmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `id_rmd_2` FOREIGN KEY (`id_rmd`) REFERENCES `remedio` (`id_rmd`);

--
-- Limitadores para a tabela `remedio`
--
ALTER TABLE `remedio`
  ADD CONSTRAINT `id_desc` FOREIGN KEY (`id_desc`) REFERENCES `descricao` (`id_desc`),
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
