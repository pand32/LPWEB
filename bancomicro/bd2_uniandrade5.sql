-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/11/2023 às 11:20
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

drop database bd2_uniandrade;
create database bd2_uniandrade;
use bd2_uniandrade;

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `Ins_Upd_Cor` (IN `p_desc_cor` VARCHAR(50), OUT `p_id_cor` INT)   BEGIN
	-- DECLARE mensagem VARCHAR(100);
		-- SET mensagem = "";
	  SELECT id_cor 
      INTO p_id_cor 
      FROM Cor
      WHERE desc_cor = p_desc_cor;
      
	IF p_id_cor IS NULL THEN
    
    INSERT INTO Cor (desc_cor, id_cor)
		VALUES (p_desc_cor, p_id_cor);

		-- SET p_id_modelo = "Modelo adicionado com sucesso";
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Ins_Upd_Email` (IN `p_id_cliente` INT, IN `p_email` VARCHAR(50), IN `p_tipo` VARCHAR(15), OUT `p_id_email` INT)   BEGIN
	SELECT id_email
    INTO p_id_email 
    FROM Email 
    WHERE id_email = p_id_email;
     
		IF p_id_email IS NULL THEN
			INSERT INTO email (id_email, id_cliente, email, tipo)
			VALUES (p_id_email, p_id_cliente, p_email, p_tipo);
			END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Ins_Upd_Endereco` (IN `p_id_cliente` INT, IN `p_logradouro` VARCHAR(100), IN `p_numero` VARCHAR(20), IN `p_complemento` VARCHAR(40), IN `p_cep` VARCHAR(8), IN `p_bairro` VARCHAR(50), IN `p_cidade` VARCHAR(50), IN `p_estado` VARCHAR(2), IN `p_tipo` VARCHAR(20), OUT `p_id_endereco` INT)   BEGIN
	SELECT id_endereco
    INTO p_id_endereco 
    FROM Enderco 
    WHERE id_endereco = p_id_endereco;
     
		IF p_id_endereco IS NULL THEN
			INSERT INTO endereco (id_endereco, id_cliente, logradouro, numero, complemento, cep, bairro, cidade, estado, tipo)
			VALUES (p_id_endereco, p_id_cliente, p_logradouro, p_numero, p_complemento, p_cep, p_bairro, p_cidade, p_estado, p_tipo);
			END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Ins_Upd_Fone` (IN `p_id_cliente` INT, IN `p_numero_fone` VARCHAR(20), IN `p_tipo_fone` VARCHAR(50), OUT `p_id_fone` INT)   BEGIN
	SELECT id_fone
    INTO p_id_fone 
    FROM Fone 
    WHERE id_fone = p_id_fone;
     
		IF p_id_fone IS NULL THEN
			INSERT INTO fone (id_fone, id_cliente, numero_fone, tipo_fone)
			VALUES (p_id_fone, p_id_cliente, p_numero_fone, p_tipo_fone);
			END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Ins_Upd_Linha` (IN `p_desc_linha` VARCHAR(100), OUT `p_id_linha` INT)   BEGIN
	-- DECLARE mensagem VARCHAR(100);
	-- SET mensagem = "";
	
    SELECT id_linha 
      INTO p_id_linha  
      FROM Modelo 
      WHERE desc_linha = p_desc_linha;
      
	IF p_id_linha IS NULL THEN
    
      
      
	  INSERT INTO Linha (desc_linha, id_linha)
		VALUES (p_desc_linha, p_id_linha);

		-- SET p_id_modelo = "Modelo adicionado com sucesso";
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Ins_Upd_Marca` (IN `p_desc_marca` VARCHAR(100), OUT `p_id_marca` INT)   BEGIN
	-- DECLARE mensagem VARCHAR(100);
	-- SET mensagem = "";
	
    SELECT id_marca 
      INTO p_id_marca  
      FROM Modelo 
      WHERE desc_marca = p_desc_marca;
      
	IF p_id_marca IS NULL THEN
    
      
      
	  INSERT INTO Marca (desc_marca, id_marca)
		VALUES (p_desc_marca, p_id_marca);

		-- SET p_id_modelo = "Modelo adicionado com sucesso";
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Ins_Upd_Modelo` (IN `p_desc_modelo` VARCHAR(100), IN `p_id_marca` INT, IN `p_id_linha` INT, OUT `p_id_modelo` INT)   BEGIN
	DECLARE mensagem VARCHAR(100);
	SET mensagem = "";
	SELECT id_desc_modelo INTO p_id_modelo FROM Produto WHERE desc_modelo = p_desc_modelo;
		IF p_id_modelo IS NULL THEN
		INSERT INTO Modelo (desc_modelo, id_marca, id_linha)
		VALUES (p_desc_modelo, p_id_marca, p_id_linha);
			  
			
		SET p_id_modelo = "Modelo adicionado com sucesso";
			END IF;
				
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_calcula_imc` (IN `p_peso_kg` DECIMAL(5,2), IN `p_altura_m` DECIMAL(5,2), OUT `p_imc` DECIMAL(5,2), OUT `p_classificacao` VARCHAR(50))   BEGIN
    -- Calcula o IMC
    SET p_imc = p_peso_kg / (p_altura_m * p_altura_m);

    -- Determina a classificação com base no IMC
    IF p_imc < 18.5 THEN
        SET p_classificacao = 'Abaixo do peso';
    ELSEIF p_imc >= 18.5 AND p_imc < 25 THEN
        SET p_classificacao = 'Peso normal';
    ELSEIF p_imc >= 25 AND p_imc < 30 THEN
        SET p_classificacao = 'Sobrepeso';
    ELSE
        SET p_classificacao = 'Obesidade';
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_InserirProduto` (IN `p_desc_produto` VARCHAR(100), IN `p_desc_marca` VARCHAR(100), IN `p_desc_linha` VARCHAR(100), IN `p_desc_modelo` VARCHAR(100), IN `p_capacidade` VARCHAR(100), IN `p_vlr_sugerido` FLOAT, IN `p_vlr_custo` FLOAT, IN `p_voltagem` INT, IN `p_desc_cor` VARCHAR(100), IN `p_estoque` FLOAT, IN `p_imagem` VARCHAR(200))   BEGIN
	DECLARE mensagem VARCHAR(100);
  SET mensagem = "";
    
	-- Se já existir produto com a mesma descrição verifico se mesma marca e modelo
    IF EXISTS(SELECT id_produto FROM Produto WHERE desc_produto = p_desc_produto) THEN
		  IF EXISTS(SELECT 1 FROM Modelo WHERE desc_modelo = p_desc_modelo) THEN
			  IF EXISTS(SELECT 1 FROM Marca WHERE desc_marca = p_desc_marca) THEN
				  SET mensagem = "Produto com estoque adicionado";
			  END IF;
		  END IF;
    END IF;

	IF (mensagem = "Produto com estoque adicionado") THEN
		UPDATE Estoque
           SET qt_estoque = qt_estoque + p_estoque
         WHERE id_produto = @id_produto;
	ELSE
    SET mensagem = "Produto inserido com sucesso";
		CALL Ins_Upd_Modelo(p_desc_modelo, @id_modelo); 
		-- CALL Ins_Upd_Marca(p_desc_marca); 
		-- CALL Ins_Upd_Linha(p_desc_linha);
 		CALL Ins_Upd_Cor(p_desc_cor, @id_cor); 
    SET @id_modelo = 1;
    SET @id_cor = 1;
		INSERT INTO Produto (desc_produto, id_modelo, capacidade,vlr_sugerido, vlr_custo, voltagem, id_cor, imagem)
        VALUES (p_desc_produto, @id_modelo, p_capacidade, p_vlr_sugerido,p_vlr_custo, p_voltagem, @id_cor, p_imagem);
  END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_cliente` (IN `p_nome_cliente` VARCHAR(50), IN `p_data_nascimento` DATE, IN `p_data_cadastro` DATE, IN `p_cpf_cnpj` VARCHAR(20), IN `p_genero` VARCHAR(10), IN `p_endereco` VARCHAR(100), IN `p_id_endereco` INT, IN `p_fone` VARCHAR(100), IN `p_id_fone` INT, IN `p_id_email` INT, IN `p_email` VARCHAR(100), OUT `p_resultado` VARCHAR(50))   BEGIN
    DECLARE cliente_existente INT;

    -- Verifica se um cliente com o mesmo CPF/CNPJ já existe na tabela
    SELECT COUNT(*) INTO cliente_existente
    FROM cliente
    WHERE cpf_cnpj = p_cpf_cnpj;

    IF cliente_existente = 0 THEN
        -- O cliente não existe, então podemos inseri-lo
        INSERT INTO cliente (nome_cliente, data_nascimento, data_cadastro, cpf_cnpj, genero)
        VALUES (p_nome_cliente, p_data_nascimento, p_data_cadastro, p_cpf_cnpj, p_genero);
    
		INSERT INTO endereco (id_endereco)
		VALUES (@id_endereco);
		
        INSERT email (id_email)
		VALUES (@id_email);
		
        INSERT fone (id_fone)
		VALUES (@id_fone);
     
        SET p_resultado = 'Cliente inserido com sucesso.';
        
        CALL Ins_Upd_Endereco(p_id_endereco, @id_endereco);
        CALL Ins_Upd_Email(p_id_email, @id_email);
        CALL Ins_Upd_Fone(p_id_fone, @id_fone);
    ELSE
        SET p_resultado = 'Cliente já existente.';
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_produto` (IN `p_desc_produto` VARCHAR(100), IN `p_capacidade` FLOAT(3,1), IN `p_vlr_sugerido` FLOAT(6,2), IN `p_vlr_custo` FLOAT(6,2), IN `p_voltagem` VARCHAR(10))   BEGIN
    DECLARE produto_existente INT;

    -- Verifica se o produto já existe na tabela
    SELECT COUNT(*) INTO produto_existente
    FROM produto
    WHERE desc_produto = p_desc_produto;

    IF produto_existente = 0 THEN
        -- O produto não existe, então podemos inseri-lo
        INSERT INTO produto (desc_produto, capacidade, vlr_sugerido, vlr_custo, voltagem)
        VALUES (p_desc_produto, p_capacidade, p_vlr_sugerido, p_vlr_custo, p_voltagem);
   
        
    END IF;
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
  `origem` varchar(255) DEFAULT NULL
) ;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `data_nascimento`, `data_cadastro`, `cpf_cnpj`, `genero`, `origem`) VALUES
(1, 'SYDINEY LEANDRO DA SILVA', '1972-02-03', '2023-09-15', '99999999999', 'M', NULL),
(2, 'Matias Julian Bulacio', '2000-02-15', '2023-09-16', '19999999999', 'M', NULL),
(3, 'Marcio Machado', '1989-11-17', '2023-09-16', '07953444909', 'M', NULL),
(4, 'RUAN LISBOA ULRICH', '2003-10-30', '2023-09-16', '66006660', 'M', NULL),
(5, 'SYDINEY LEANDRO DA SILVA', '1972-02-03', '2023-09-15', '99999999999', 'M', NULL),
(6, 'Matias Julian Bulacio', '2000-02-15', '2023-09-16', '19999999999', 'M', NULL),
(7, 'Marcio Machado', '1989-11-17', '2023-09-16', '07953444909', 'M', NULL),
(8, 'RUAN LISBOA ULRICH', '2003-10-30', '2023-09-16', '66006660', 'M', NULL),
(9, 'GABRIEL ESPINDOLA FERREIRA', '2003-03-30', '2023-09-16', '49275556822', 'M', NULL),
(10, 'LUCAS LUCIANO DUTRA CARLOS', '2004-06-06', '2023-09-16', '00000000000', 'M', NULL),
(11, 'GUSTAVO BATISTA DE SOUZA', '2004-03-01', '2023-09-15', '89056000090', 'M', NULL),
(12, 'WESLLEY CEZAR PROTSKI DE ABREU', '1992-01-08', '2023-09-15', '89056000090', 'M', NULL),
(13, 'EDUARDA DEPETRIS', '2004-07-18', '2023-09-15', '10610610652', 'F', NULL),
(14, 'FELIPE HENRIQUE RIBEIRO', '2004-10-11', '2023-09-15', '10610610652', 'M', NULL),
(15, 'MARIA BEATRIZ WAGNER TRINDADE', '2002-11-10', '2023-09-15', '12345678912', 'F', NULL),
(16, 'LUIZ FELIPE DALBELLO', '2002-05-27', '2023-09-15', '69696969691', 'M', NULL),
(17, 'Cleitton Ferreira Dos Santos', '2002-01-03', '2023-09-15', '12284373941', 'M', NULL),
(29, 'Patricia', '2013-09-10', '2023-09-06', '07953444707', 'F', NULL),
(30, 'Leono', '2014-09-18', '2023-09-07', '07953444607', 'F', NULL),
(32, 'Bruno', '2013-09-17', '2023-09-13', '07953444808', 'M', NULL),
(34, 'Luisa', '2013-09-23', '2023-09-19', '07953445908', 'F', NULL),
(37, 'ROBOCOP', '1989-08-08', '2023-08-08', '07953444808', 'M', NULL),
(40, 'Leona', '0000-00-00', '2023-11-02', '07953444806', 'F', NULL),
(42, 'tiago', NULL, '0000-00-00', NULL, NULL, NULL);

--
-- Acionadores `cliente`
--
DELIMITER $$
CREATE TRIGGER `trg_Cliente_BD_Delete` BEFORE DELETE ON `cliente` FOR EACH ROW BEGIN
	DELETE FROM Fone 
    WHERE OLD.id_cliente = OLD.id_cliente;
    DELETE FROM Endereco 
    WHERE OLD.id_cliente = OLD.id_cliente;
    DELETE FROM Email
    WHERE OLD.id_cliente = OLD.id_cliente;
END
$$
DELIMITER ;

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
(2, 'Branca'),
(3, 'prata'),
(4, 'preto'),
(5, 'cromado'),
(9, 'verde azulado');

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
(1, 1, 50, 1),
(2, 2, 1, 1),
(3, 3, 2, 1);

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
  `id_cliente` int(11) DEFAULT NULL,
  `numero_fone` varchar(20) DEFAULT NULL,
  `tipo_fone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 1, 1, 500.00, 1, 'OK'),
(3, 2, 2, 500.00, 2, 'OK'),
(4, 3, 3, 500.00, 10, 'OK'),
(5, 5, 5, 500.00, 30, 'OK');

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
(5, 'Prosdocimo'),
(6, 'Consul');

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
(1, 'Samsung', 4, 32.0, 700.00, 600.00, '110', 2),
(2, 'Sony', 7, 16.0, 450.00, 400.00, '220', 1),
(3, 'Panasonic', 5, 28.0, 600.00, 550.00, '110', 4),
(4, 'Philips', 8, 20.0, 550.00, 500.00, '220', 3),
(5, 'Toshiba', 3, 18.0, 480.00, 450.00, '110', 5),
(6, 'Sharp', 2, 24.0, 650.00, 600.00, '220', 1),
(7, 'Haier', 1, 14.0, 400.00, 350.00, '110', 4),
(8, 'Mitsubishi', 9, 30.0, 750.00, 700.00, '220', 2),
(9, 'Hisense', 10, 26.0, 680.00, 630.00, '110', 5),
(10, 'TCL', 11, 12.0, 350.00, 300.00, '220', 3);


--
-- Acionadores `produto`
--
DELIMITER $$
CREATE TRIGGER `trg_Produto_BD_Delete` BEFORE DELETE ON `produto` FOR EACH ROW BEGIN 
IF NOT EXISTS 
(SELECT 1 FROM item_venda 
WHERE id_produto = OLD.id_produto)
THEN 
 
DELETE FROM estoque WHERE id_produto = OLD.id_produto;

   
END IF;
	   
END
$$
DELIMITER ;

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
  `id_vendedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `data_venda`, `nr_documento`, `id_cliente`, `status_venda`, `prc_desconto`, `id_vendedor`) VALUES
(1, '2023-12-25', 85854, NULL, 'ok', 9.99, NULL),
(2, '2023-12-25', 85854, NULL, 'ok', 9.99, NULL);

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
  ADD PRIMARY KEY (`id_cliente`);

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
  ADD KEY `FK_VENDA_CLIENTE` (`id_cliente`);

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
  MODIFY `id_cor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `filial`
--
ALTER TABLE `filial`
  MODIFY `id_filial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fone`
--
ALTER TABLE `fone`
  MODIFY `id_fone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
