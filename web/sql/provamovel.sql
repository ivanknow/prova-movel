-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Set-2014 às 14:21
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `provamovel`
--
CREATE DATABASE IF NOT EXISTS `provamovel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `provamovel`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_opcao`
--

CREATE TABLE IF NOT EXISTS `tb_opcao` (
  `id` int(11) NOT NULL,
  `questao` int(255) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_prova`
--

CREATE TABLE IF NOT EXISTS `tb_prova` (
  `id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `tipo` enum('publica','privada') NOT NULL,
  `publicada` tinyint(1) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_prova`
--

INSERT INTO `tb_prova` (`id`, `autor`, `turma`, `titulo`, `tipo`, `publicada`, `data_criacao`) VALUES
(1, 3, 1, 'Teste', 'publica', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questao`
--

CREATE TABLE IF NOT EXISTS `tb_questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enunciado` text NOT NULL,
  `prova` int(11) NOT NULL,
  `tipo` enum('aberta','fechada') NOT NULL,
  `respostaTexto` text,
  `opcaoResposta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_turma`
--

CREATE TABLE IF NOT EXISTS `tb_turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_turma`
--

INSERT INTO `tb_turma` (`id`, `autor`, `titulo`) VALUES
(1, 3, 'Alterado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `email`, `senha`) VALUES
(3, 'ivan@gmail.com', '123456'),
(4, 'ivan2@gmail.com', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
