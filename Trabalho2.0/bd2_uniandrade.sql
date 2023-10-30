-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/10/2023 às 02:26
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd2_uniandrade`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `calcular_IMC` (IN `peso` DECIMAL(5,2), IN `altura` DECIMAL(5,2))   BEGIN
  DECLARE imc DECIMAL(5,2);
  
  SET imc = peso / (altura * altura);
  
  SELECT imc AS IMC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contar_letras` (IN `texto` VARCHAR(255))   BEGIN
  DECLARE num_letras INT;
  
  SET num_letras = LENGTH(texto);
  
  SELECT num_letras AS Letras;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `conversao_C_F` (IN `celsius` INTEGER, OUT `FARENHEIT` INTEGER)   BEGIN
   
   
   SET FARENHEIT=(celsius * 9/5) + 32;
   
   
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `elevando_ao_quadrada` (IN `numero` INT, OUT `quadrado` INT)   BEGIN
  -- Declare uma variável para o quadrado
  DECLARE quadrado integer;
  
  -- Calcule o quadrado do número de entrada
  SET quadrado = numero*numero;
  
 
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ObterDescontoTotal` (`id_venda` INT)   BEGIN
  DECLARE desconto_total DECIMAL(10, 2);
  
  
  SET desconto_total = 0;

  
  SELECT SUM(desc_produto) INTO desconto_total
  FROM venda
  WHERE id_venda = id_venda;
  
  -- Retorna o valor total do desconto
  SELECT desconto_total AS DescontoTotal;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `cpf_cnpj` varchar(14) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `origem` varchar(255) DEFAULT NULL,
  `id_fone` int(11) DEFAULT NULL
) ;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `data_nascimento`, `data_cadastro`, `cpf_cnpj`, `genero`, `origem`, `id_fone`) VALUES
(1, 'SYDINEY LEANDRO DA SILVA', '1972-02-03', '2023-09-15', '99999999999', 'M', NULL, NULL),
(2, 'Matias Julian Bulacio', '2000-02-15', '2023-09-16', '19999999999', 'M', NULL, NULL),
(3, 'Marcio Machado', '1989-11-17', '2023-09-16', '07953444909', 'M', NULL, NULL),
(4, 'RUAN LISBOA ULRICH', '2003-10-30', '2023-09-16', '66006660', 'M', NULL, NULL),
(5, 'SYDINEY LEANDRO DA SILVA', '1972-02-03', '2023-09-15', '99999999999', 'M', NULL, NULL),
(6, 'Matias Julian Bulacio', '2000-02-15', '2023-09-16', '19999999999', 'M', NULL, NULL),
(7, 'Marcio Machado', '1989-11-17', '2023-09-16', '07953444909', 'M', NULL, NULL),
(8, 'RUAN LISBOA ULRICH', '2003-10-30', '2023-09-16', '66006660', 'M', NULL, NULL),
(9, 'GABRIEL ESPINDOLA FERREIRA', '2003-03-30', '2023-09-16', '49275556822', 'M', NULL, NULL),
(10, 'LUCAS LUCIANO DUTRA CARLOS', '2004-06-06', '2023-09-16', '00000000000', 'M', NULL, NULL),
(11, 'GUSTAVO BATISTA DE SOUZA', '2004-03-01', '2023-09-15', '89056000090', 'M', NULL, NULL),
(12, 'WESLLEY CEZAR PROTSKI DE ABREU', '1992-01-08', '2023-09-15', '89056000090', 'M', NULL, NULL),
(13, 'EDUARDA DEPETRIS', '2004-07-18', '2023-09-15', '10610610652', 'F', NULL, NULL),
(14, 'FELIPE HENRIQUE RIBEIRO', '2004-10-11', '2023-09-15', '10610610652', 'M', NULL, NULL),
(15, 'MARIA BEATRIZ WAGNER TRINDADE', '2002-11-10', '2023-09-15', '12345678912', 'F', NULL, NULL),
(16, 'LUIZ FELIPE DALBELLO', '2002-05-27', '2023-09-15', '69696969691', 'M', NULL, NULL),
(17, 'CLEITTON FERREIRA DOS SANTOS', '2002-01-03', '2023-09-15', '12284373941', 'M', NULL, NULL),
(28, 'marcela', '2013-09-03', '2023-09-04', '07953444808', 'F', NULL, NULL),
(29, 'Patricia', '2013-09-10', '2023-09-06', '07953444707', 'F', NULL, NULL),
(30, 'Raquel', '2014-09-18', '2023-09-07', '07953444607', 'F', NULL, NULL),
(31, 'Patricio', '2013-09-18', '2023-09-19', '07953444908', 'M', NULL, NULL),
(32, 'Bruno', '2013-09-17', '2023-09-13', '07953444808', 'M', NULL, NULL),
(33, 'Andriele', '2013-09-12', '2023-09-20', '07953444601', 'M', NULL, NULL),
(34, 'Luisa', '2013-09-23', '2023-09-19', '07953445908', 'F', NULL, NULL),
(36, '', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cor`
--

CREATE TABLE `cor` (
  `id_cor` int(11) NOT NULL,
  `desc_cor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cor`
--

INSERT INTO `cor` (`id_cor`, `desc_cor`) VALUES
(1, 'azul'),
(2, 'Branca'),
(3, 'prata'),
(4, 'preto'),
(5, 'cromado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `email`
--

CREATE TABLE `email` (
  `id_email` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `email`
--

INSERT INTO `email` (`id_email`, `id_cliente`, `email`, `tipo`) VALUES
(1, NULL, 'sydiney.leandro@gmail.com', NULL),
(2, NULL, 'matias.bulacio@gmail.com', NULL),
(3, NULL, 'marcio.machado@gmail.com', NULL),
(4, NULL, 'ruan.ulrich@gmail.com', NULL),
(5, NULL, 'sydiney.leandro2@gmail.com', NULL),
(6, NULL, 'matias.bulacio2@gmail.com', NULL),
(7, NULL, 'marcio.machado2@gmail.com', NULL),
(8, NULL, 'ruan.ulrich2@gmail.com', NULL),
(9, NULL, 'gabriel.espindola@gmail.com', NULL),
(10, NULL, ' lucas.dutra@gmail.com', NULL),
(11, NULL, 'gustavo.souza@gmail.com', NULL),
(12, NULL, 'weslley.abreu@gmail.com', NULL),
(13, NULL, ' eduarda.depetris@gmail.com', NULL),
(14, NULL, 'felipe.ribeiro@gmail.com', NULL),
(15, NULL, 'maria.trindade@gmail.com', NULL),
(16, NULL, 'luiz.dalbello@gmail.com', NULL),
(17, NULL, 'cleitton.santos@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereço` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(40) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL
) ;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id_endereço`, `id_cliente`, `logradouro`, `numero`, `complemento`, `cep`, `bairro`, `cidade`, `estado`, `tipo`) VALUES
(2, 1, 'Rua das Palmeiras', '123', '101', '12345-67', 'Jardim das Flores', 'São Paulo', 'SP', NULL),
(3, 1, 'Rua das Palmeiras', '123', '101', '12345-67', 'Jardim das Flores', 'São Paulo', 'SP', 'Ap'),
(4, 2, 'Avenida das Rosas', '456', '202', '54321-98', 'Centro', 'Rio de Janeiro', 'RJ', 'Ap'),
(5, 3, 'Praça do Sol', '789', '303', '98765-43', 'Jardim Primavera', 'Belo Horizonte', 'MG', 'Ap'),
(6, 4, 'Avenida Atlântica', '1010', '404', '87654-32', 'Copacabana', 'Rio de Janeiro', 'RJ', 'Ap'),
(7, 5, 'Avenida Central', '222', '505', '23456-78', 'Jardim das Rosas', 'Salvador', 'BA', 'Ap'),
(8, 6, 'Rua das Estrelas', '333', '606', '34567-89', 'Vila Nova', 'Brasília', 'DF', 'Ap'),
(9, 7, 'Avenida da Paz', '555', '707', '56789-01', 'Jardim das Oliveiras', 'Recife', 'PE', 'Ap'),
(10, 8, 'Rua das Flores', '777', '808', '67890-12', 'Vila Industrial', 'Fortaleza', 'CE', 'Ap'),
(11, 9, 'Alameda dos Pinheiros', '1111', '909', '76543-21', 'Parque dos Pássaros', 'Curitiba', 'PR', 'Ap'),
(12, 10, 'Rua das Árvores', '2222', '101', '34567-89', 'Jardim das Águias', 'Porto Alegre', 'RS', 'Ap'),
(13, 11, 'Rua Principal', '12345', '404', '99999-99', 'Centro', 'São Paulo', 'SP', 'Ap'),
(14, 12, 'Avenida Central', '9876', '202', '77777-77', 'Jardim das Estrelas', 'Rio de Janeiro', 'RJ', 'Ap'),
(15, 13, 'Rua das Rosas', '7890', '303', '88888-88', 'Vila Nova', 'Belo Horizonte', 'MG', 'Ap'),
(16, 14, 'Avenida das Oliveiras', '1234', '505', '11111-11', 'Jardim Primavera', 'Salvador', 'BA', 'Ap'),
(17, 15, 'Avenida Atlântica', '10101', '404', '55555-55', 'Copacabana', 'Rio de Janeiro', 'RJ', 'Ap'),
(18, 16, 'Rua das Pássaros', '5678', '606', '22222-22', 'Vila Industrial', 'Brasília', 'DF', 'Ap'),
(19, 17, 'Alameda das Estrelas', '9999', '909', '77777-77', 'Parque dos Sonhos', 'Recife', 'PE', 'Ap');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `id_estoque` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `qt_estoque` int(11) DEFAULT NULL,
  `id_filial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`id_estoque`, `id_produto`, `qt_estoque`, `id_filial`) VALUES
(1, NULL, 50, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `filial`
--

CREATE TABLE `filial` (
  `id_filial` int(11) NOT NULL,
  `nome_filial` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filial`
--

INSERT INTO `filial` (`id_filial`, `nome_filial`) VALUES
(1, 'rei_do_micro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fone`
--

CREATE TABLE `fone` (
  `id_fone` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT current_timestamp(),
  `numero_fone` varchar(20) DEFAULT NULL,
  `tipo_fone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fone`
--

INSERT INTO `fone` (`id_fone`, `id_cliente`, `numero_fone`, `tipo_fone`) VALUES
(1, NULL, '5555-1234', NULL),
(2, NULL, '9876-5432', NULL),
(3, NULL, '1234-5678', NULL),
(4, NULL, '8765-4321', NULL),
(5, NULL, '2345-6789', NULL),
(6, NULL, '2345-6789', NULL),
(7, NULL, '9876-5432', NULL),
(8, NULL, '3456-7890', NULL),
(9, NULL, '8765-4321', NULL),
(10, NULL, '2345-6789', NULL),
(11, NULL, '9876-5432', NULL),
(12, NULL, '3456-7890', NULL),
(13, NULL, '8765-4321', NULL),
(14, NULL, '2345-6789', NULL),
(15, NULL, '9876-5432', NULL),
(16, NULL, '3456-7890', NULL),
(17, NULL, '8765-4321', NULL),
(18, NULL, '2345-6789', NULL),
(19, 34, NULL, NULL),
(20, 33, NULL, NULL),
(21, 32, NULL, NULL),
(22, 31, NULL, NULL),
(23, 30, NULL, NULL),
(24, 31, NULL, NULL),
(25, 30, NULL, NULL),
(26, 29, NULL, NULL),
(27, 28, NULL, NULL),
(28, 17, NULL, NULL),
(29, 16, NULL, NULL),
(30, 15, NULL, NULL),
(31, 14, NULL, NULL),
(32, 13, NULL, NULL),
(33, 12, NULL, NULL),
(34, 11, NULL, NULL),
(35, 10, NULL, NULL),
(36, 9, NULL, NULL),
(37, 8, NULL, NULL),
(38, 7, NULL, NULL),
(39, 6, NULL, NULL),
(40, 5, NULL, NULL),
(41, 4, NULL, NULL),
(42, 3, NULL, NULL),
(43, 2, NULL, NULL),
(44, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `item_venda`
--

CREATE TABLE `item_venda` (
  `id_item` int(11) NOT NULL,
  `id_venda` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `vlr_venda` float(6,2) DEFAULT NULL,
  `qtd_venda` int(11) DEFAULT NULL,
  `status_item_venda` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `item_venda`
--

INSERT INTO `item_venda` (`id_item`, `id_venda`, `id_produto`, `vlr_venda`, `qtd_venda`, `status_item_venda`) VALUES
(2, NULL, 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `linha`
--

CREATE TABLE `linha` (
  `id_linha` int(11) NOT NULL,
  `desc_linha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `linha`
--

INSERT INTO `linha` (`id_linha`, `desc_linha`) VALUES
(1, '70');

-- --------------------------------------------------------

--
-- Estrutura para tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `desc_marca` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `desc_marca`) VALUES
(1, 'Electrolux'),
(2, 'Brastemp'),
(3, 'Sanyo'),
(4, 'Philco'),
(5, 'Prosdocimo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `desc_modelo` varchar(100) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_linha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `desc_modelo`, `id_marca`, `id_linha`) VALUES
(1, 'consul', NULL, NULL),
(4, 'Brastemp', 2, NULL),
(5, 'Eletrolux', NULL, NULL),
(6, 'Sanyo', NULL, NULL),
(7, 'Prosdocimo', NULL, NULL),
(8, 'Philco', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `desc_produto` varchar(100) DEFAULT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `capacidade` float(3,1) DEFAULT NULL,
  `vlr_sugerido` float(6,2) DEFAULT NULL,
  `vlr_custo` float(6,2) DEFAULT NULL,
  `voltagem` varchar(10) DEFAULT NULL,
  `id_cor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `desc_produto`, `id_modelo`, `capacidade`, `vlr_sugerido`, `vlr_custo`, `voltagem`, `id_cor`) VALUES
(1, '50', 2, 22.0, 450.00, 550.00, '220', 2),
(2, '50', 6, 22.0, 500.00, 500.00, '220', 3),
(7, '50', 8, 20.0, 500.00, 550.00, '127', 4),
(8, NULL, 7, 20.0, 550.00, 600.00, NULL, 3),
(9, NULL, 8, 30.0, 400.00, 430.00, NULL, 2),
(10, NULL, 7, 30.0, NULL, 600.00, NULL, 5),
(11, NULL, 2, 20.0, NULL, 400.00, NULL, 2),
(12, NULL, 2, 20.0, NULL, 350.00, NULL, 2),
(13, NULL, 4, 20.0, NULL, 410.00, NULL, 2),
(14, NULL, 2, 20.0, NULL, 320.00, NULL, 2),
(15, NULL, 4, 30.0, NULL, 420.00, NULL, 4),
(17, NULL, 2, 20.0, NULL, 300.00, NULL, 2),
(18, NULL, 2, 20.0, NULL, 400.00, NULL, 2),
(19, NULL, 2, 20.0, NULL, 300.00, NULL, 2),
(20, NULL, 2, 20.0, NULL, 300.00, NULL, 2),
(21, NULL, 2, 20.0, NULL, 400.00, NULL, 2),
(22, NULL, 2, 20.0, NULL, 300.00, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `data_venda` date DEFAULT NULL,
  `nr_documento` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `status_venda` char(20) DEFAULT NULL,
  `prc_desconto` float(3,2) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `data_venda`, `nr_documento`, `id_cliente`, `status_venda`, `prc_desconto`, `id_vendedor`, `id_modelo`, `id_produto`) VALUES
(1, '2023-12-25', 85854, 3, 'ok', 9.99, 3, NULL, NULL),
(2, '2023-12-25', 85854, NULL, 'ok', 9.99, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) NOT NULL,
  `nome_vendedor` varchar(100) DEFAULT NULL,
  `data_adimissao` date DEFAULT NULL,
  `data_demissao` date DEFAULT NULL,
  `comissao` float(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendedor`
--

INSERT INTO `vendedor` (`id_vendedor`, `nome_vendedor`, `data_adimissao`, `data_demissao`, `comissao`) VALUES
(1, 'sidney', '0000-00-00', '2023-05-10', 9.99),
(2, 'sidney', '0000-00-00', '2023-05-10', 9.99),
(3, 'Carlos', NULL, NULL, NULL),
(4, 'Maria', NULL, NULL, NULL),
(5, 'Guilherme', NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_fone` (`id_fone`);

--
-- Índices de tabela `cor`
--
ALTER TABLE `cor`
  ADD PRIMARY KEY (`id_cor`);

--
-- Índices de tabela `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`),
  ADD KEY `FK_EMAIL_CLIENTE` (`id_cliente`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereço`),
  ADD KEY `FK_ENDERECO_CLIENTE` (`id_cliente`);

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id_estoque`);

--
-- Índices de tabela `filial`
--
ALTER TABLE `filial`
  ADD PRIMARY KEY (`id_filial`);

--
-- Índices de tabela `fone`
--
ALTER TABLE `fone`
  ADD PRIMARY KEY (`id_fone`),
  ADD KEY `FK_FONE_FONE` (`id_cliente`);

--
-- Índices de tabela `item_venda`
--
ALTER TABLE `item_venda`
  ADD PRIMARY KEY (`id_item`);

--
-- Índices de tabela `linha`
--
ALTER TABLE `linha`
  ADD PRIMARY KEY (`id_linha`);

--
-- Índices de tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Índices de tabela `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD UNIQUE KEY `id_produto` (`id_venda`,`id_produto`),
  ADD KEY `FK_VENDA_CLIENTE` (`id_cliente`),
  ADD KEY `idx_venda_id_modelo` (`id_modelo`);

--
-- Índices de tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cor`
--
ALTER TABLE `cor`
  MODIFY `id_cor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `email`
--
ALTER TABLE `email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereço` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `filial`
--
ALTER TABLE `filial`
  MODIFY `id_filial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fone`
--
ALTER TABLE `fone`
  MODIFY `id_fone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `item_venda`
--
ALTER TABLE `item_venda`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `linha`
--
ALTER TABLE `linha`
  MODIFY `id_linha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `FK_EMAIL_CLIENTE` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `FK_ENDERECO_CLIENTE` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Restrições para tabelas `fone`
--
ALTER TABLE `fone`
  ADD CONSTRAINT `FK_FONE_FONE` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `FK_fone_CLIENTE` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `FK_VENDA_CLIENTE` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
