-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Set-2019 às 01:09
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projblokchain`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_nome` varchar(100) NOT NULL,
  `admin_senha` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nome`, `admin_senha`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clausula_primeira`
--

CREATE TABLE IF NOT EXISTS `clausula_primeira` (
  `rua_clausula_primeira` varchar(80) DEFAULT NULL,
  `numero_clausula_primeira` int(4) DEFAULT NULL,
  `bairro_clausula_primeira` varchar(50) DEFAULT NULL,
  `cep_clausula_primeira` int(8) DEFAULT NULL,
  `cidade_clausula_primeira` varchar(20) DEFAULT NULL,
  `estado_locador` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clausula_segunda`
--

CREATE TABLE IF NOT EXISTS `clausula_segunda` (
  `meses_locacao` int(4) DEFAULT NULL,
  `data_inicial` int(8) DEFAULT NULL,
  `data_final` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clausula_terceira`
--

CREATE TABLE IF NOT EXISTS `clausula_terceira` (
  `valor` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fiador`
--

CREATE TABLE IF NOT EXISTS `fiador` (
  `codigo_fiador` int(100) NOT NULL AUTO_INCREMENT,
  `nome_fiador` varchar(255) DEFAULT NULL,
  `estado_fiador` varchar(15) DEFAULT NULL,
  `profissao_fiador` varchar(40) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `cpf_fiador` varchar(11) DEFAULT NULL,
  `rua_fiador` varchar(80) DEFAULT NULL,
  `numero_fiador` int(4) DEFAULT NULL,
  `bairro_fiador` varchar(50) DEFAULT NULL,
  `cep_fiador` int(8) DEFAULT NULL,
  `cidade_fiador` varchar(20) DEFAULT NULL,
  `hash_fiador` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo_fiador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `fiador`
--

INSERT INTO `fiador` (`codigo_fiador`, `nome_fiador`, `estado_fiador`, `profissao_fiador`, `password`, `cpf_fiador`, `rua_fiador`, `numero_fiador`, `bairro_fiador`, `cep_fiador`, `cidade_fiador`, `hash_fiador`) VALUES
(21, 'adam fagner nevez', 'am', 'testador', 'e10adc3949ba59abbe56e057f20f883e', '527072290', 'rua 10', 271, 'Santo antonio', 69010, 'manaus', '42f43f5704ed34b7ae11bb3884d05b5e'),
(25, 'fernando silva dos reis', 'am', 'guarda', 'b6f69cd5fe934602241fdd418c775d5c', '02310933228', '27', 189, 'Novo Aleixo', 69099110, 'manaus', '7805c51473fadc2860a944332a09900c'),
(26, 'lucas', 'Am', 'Programador ', 'e10adc3949ba59abbe56e057f20f883e', '02687977225', 'Campina Verde', 383, 'Flores', 69058840, 'Manaus', '7c7d5654d9c632a8339c9b0a8c38b267'),
(27, 'reis', 'am', 'doutor', '827ccb0eea8a706c4c34a16891f84e7b', '0148461674', 'susura', 181, 'novo', 69099110, 'manaus', '7805c51473fadc2860a944332a09900c'),
(28, 'cleane', 'am', 'gerente', '827ccb0eea8a706c4c34a16891f84e7b', '123456', 'igaci', 189, 'mutirao ', 6909110, 'cidade', 'c33367701511b4f6020ec61ded352059'),
(29, 'eu', 'ee', '33', '182be0c5cdcd5072bb1864cdee4d3d6e', '34343', '34', 343, '3ee', 343, 'ee', '14c879f3f5d8ed93a09f6090d77c2cc3'),
(30, 'reiszinho', 'am', 'pintor', '827ccb0eea8a706c4c34a16891f84e7b', '02310933228', 'nova', 189, 'novo', 69099110, 'mana', '7805c51473fadc2860a944332a09900c'),
(31, 'douglas', 'am', 'medico', '827ccb0eea8a706c4c34a16891f84e7b', '0987', 'leopoldo', 174, 'centro', 2828288, 'mananus', '934b535800b1cba8f96a5d72f72f1611');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` int(155) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(250) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `img` longblob NOT NULL,
  `codigo_fiador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `codigo_fiador` (`codigo_fiador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `estado`, `cidade`, `bairro`, `complemento`, `endereco`, `numero`, `cep`, `descricao`, `valor`, `img`, `codigo_fiador`) VALUES
(1, 'Amazonas', 'Manaus', 'Flores', 'Conj. Duque de Caxias', 'Rua Campina Verde ', 69058840, 383, '- Apartamento 3 quartos ;\r\n- 2 Banheiro', '1200', 0x636164617374726f2e706e67, 26),
(2, 'Alagoas', 'manaus', 'novo aleixo ', 'mutirao', 'rua igaci ', 69099110, 189, 'casa', '300', 0x312e6a7067, 25),
(4, 'Distrito Federal', 'goia', 'nutela', 'lola', 'rua timbaia', 3838388, 83, 'asdasb', '23123', '', 25),
(5, 'CearÃ¡', 'fortaleza', 'canoa quabrada', 'praia', 'rua canoa quadra 175', 189, 23109332, 'belo apartamento em canoa quebrada', '1800', '', 25),
(6, 'MaranhÃ£o', 'maranhatam', 'mara', 'novo mara', 'rua mara ', 192, 9393993, 'casa no maranhao dois quartos sala cozinha ', '600', '', 31),
(7, '--', 'santarem', 'santa', 'asa', 'rua santinha', 222, 2929292, 'apartamento com piscina', '2221', 0x31322e6a7067, 25),
(8, 'Amazonas', 'Manaus ', 'Flores ', 'Duque de Caxias', 'Rua Capina Verde ', 383, 69058840, '- Apartamento com 2 quartos;\r\n- 3 andares', '800', '', 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locador`
--

CREATE TABLE IF NOT EXISTS `locador` (
  `codigo_locador` int(4) NOT NULL AUTO_INCREMENT,
  `nome_locador` varchar(255) DEFAULT NULL,
  `estado_locador` varchar(15) DEFAULT NULL,
  `profissao_locador` varchar(40) DEFAULT NULL,
  `rg_locador` int(8) DEFAULT NULL,
  `cpf_locador` int(11) DEFAULT NULL,
  `hash_locador` int(150) DEFAULT NULL,
  PRIMARY KEY (`codigo_locador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `locador`
--

INSERT INTO `locador` (`codigo_locador`, `nome_locador`, `estado_locador`, `profissao_locador`, `rg_locador`, `cpf_locador`, `hash_locador`) VALUES
(1, 'Adalberto', 'RJ', 'Design', 36363636, 1111111111, NULL),
(2, 'Raimunda', 'CE', 'Projetista', 2582582, 258258258, NULL),
(3, 'Joaquim', 'MG', 'Engenheiro', 14821482, 457485412, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locatario`
--

CREATE TABLE IF NOT EXISTS `locatario` (
  `codigo_locatario` int(4) NOT NULL AUTO_INCREMENT,
  `nome_locatario` varchar(255) DEFAULT NULL,
  `estado_locatario` varchar(15) DEFAULT NULL,
  `profissao_locatario` varchar(40) DEFAULT NULL,
  `rg_locatario` int(8) DEFAULT NULL,
  `cpf_locatario` int(11) DEFAULT NULL,
  `hash_locatario` int(150) DEFAULT NULL,
  PRIMARY KEY (`codigo_locatario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `locatario`
--

INSERT INTO `locatario` (`codigo_locatario`, `nome_locatario`, `estado_locatario`, `profissao_locatario`, `rg_locatario`, `cpf_locatario`, `hash_locatario`) VALUES
(1, 'Ana Alcantara', 'SP', 'Dentista', 556365, 55563652, 987654321),
(2, 'Maria', 'RR', 'Autonoma', 1111, 111111, 123456789),
(3, 'Joao', 'SP', 'Vendedor', 11111, 1111111, 123456789),
(7, 'Amadeu', 'SC', 'Agiota', 2010101, 2010101, 563256325);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(25) NOT NULL,
  `usu_email` varchar(60) NOT NULL,
  `usu_cpf` varchar(40) DEFAULT NULL,
  `usu_senha` varchar(255) NOT NULL,
  `hash_cliente` varchar(100) NOT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nome`, `usu_email`, `usu_cpf`, `usu_senha`, `hash_cliente`) VALUES
(6, 'adam fagner nevez', 'adamnevez27@gmail.com', '00527072290', 'e10adc3949ba59abbe56e057f20f883e', '56680968d510222ae27faf3d4f0dfd22'),
(7, 'fernando reis', 'fernandopw_15cellfaire@hotmail.com', '02310933228', 'b6f69cd5fe934602241fdd418c775d5c', '9c934936b63db7e0ffbe43ee9362cb4a'),
(8, 'cleane', 'cleane@cleane', '02310933228', 'b6f69cd5fe934602241fdd418c775d5c', '9c934936b63db7e0ffbe43ee9362cb4a'),
(9, 'mateus', 'mateus@mat', '098', '202cb962ac59075b964b07152d234b70', '92daa86ad43a42f28f4bf58e94667c95'),
(10, 'Lucas Daniel Alves Vieira', 'ldanivieira@gmail.com', '02687977225', '4a912bc4f15b4a5a0b58bc4ff412988f', 'e58a94d4c990a19218f2fd8b027bc831');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` datetime DEFAULT NULL,
  `data_final` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `visitas`
--

INSERT INTO `visitas` (`id`, `data_inicio`, `data_final`) VALUES
(1, '2017-08-16 17:18:59', '2017-08-16 23:27:25'),
(2, '2018-09-10 23:20:36', '2018-09-12 03:01:53'),
(3, '2018-09-10 23:22:12', '2018-09-10 23:38:21'),
(4, '2018-09-10 23:39:19', '2018-09-11 00:53:59'),
(5, '2018-09-12 01:44:07', '2018-09-12 02:19:17'),
(6, '2018-09-12 01:49:26', '2018-09-12 01:49:46'),
(7, '2018-09-12 02:17:01', '2018-09-12 02:17:21'),
(8, '2018-09-12 21:14:33', '2018-09-13 21:27:34'),
(9, '2018-09-13 01:13:14', '2018-09-13 21:26:48'),
(10, '2018-09-13 01:17:52', '2018-09-13 21:26:02'),
(11, '2019-07-31 02:00:57', '2019-07-31 03:17:58'),
(12, '2019-07-31 02:01:26', '2019-07-31 02:04:56'),
(13, '2019-07-31 03:07:00', '2019-07-31 03:26:39'),
(14, '2019-08-31 00:11:23', '2019-08-31 17:35:29'),
(15, '2019-08-31 19:21:55', '2019-09-05 23:50:14');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD CONSTRAINT `imoveis_ibfk_1` FOREIGN KEY (`codigo_fiador`) REFERENCES `fiador` (`codigo_fiador`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
