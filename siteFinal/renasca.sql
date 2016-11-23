-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 22-Nov-2016 às 23:11
-- Versão do servidor: 5.5.50-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `renasca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `comentario_id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(1000) NOT NULL,
  `page` enum('musica','literatura','plasticas') NOT NULL,
  `usuario` varchar(40) NOT NULL,
  PRIMARY KEY (`comentario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`comentario_id`, `comentario`, `page`, `usuario`) VALUES
(11, 'Muito bom! Excelente texto sobre a música renascentista!', 'musica', 'Lucao'),
(12, 'Gostaria de saber como submeter meus textos a este blog...', 'musica', 'Teste'),
(13, 'Muito bom!', 'musica', 'Teste'),
(14, 'Obrigado pelas informações...', 'musica', 'Flor'),
(15, 'Muito bom!', 'musica', 'Flor'),
(17, 'OlÃ¡', 'musica', '0'),
(18, 'OlÃ¡! Eu sou o Goku!', 'musica', 'Teste'),
(21, 'Deixe seu comentÃ¡rio', 'literatura', 'Flor'),
(22, 'Deixe seu comentÃ¡rio', 'literatura', 'Flor'),
(23, 'Deixe seu comentÃ¡rio', 'literatura', 'Lucao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nome` varchar(60) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nivel` enum('usuario','adm') NOT NULL DEFAULT 'usuario',
  `tem_foto` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nome`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `senha`, `nivel`, `tem_foto`) VALUES
('Flor', '827ccb0eea8a706c4c34a16891f84e7b', 'usuario', 1),
('Lucao', '827ccb0eea8a706c4c34a16891f84e7b', 'adm', 1),
('Teste', '827ccb0eea8a706c4c34a16891f84e7b', 'usuario', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
