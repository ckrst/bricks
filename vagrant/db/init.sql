-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Host: 127.9.3.2:3306
-- Generation Time: Apr 04, 2016 at 09:27 PM
-- Server version: 5.5.45
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brix`
--

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE IF NOT EXISTS `app` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `owner_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_app_ownner_idx` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`id`, `nome`, `owner_id`) VALUES
(1, 'Minhas Tarefas', 1),
(2, 'CoolApp', 2),
(3, 'MyApp', 3),
(4, 'MinhaVagaBunda', 4),
(5, 'Infra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `campo`
--

CREATE TABLE IF NOT EXISTS `campo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `objeto_id` bigint(20) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_campo_objeto_idx` (`objeto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `campo`
--

INSERT INTO `campo` (`id`, `objeto_id`, `nome`, `tipo`, `ordem`) VALUES
(1, 3, 'name', 3, 0),
(2, 1, 'Titulo', 3, 1),
(3, 1, 'Descricao', 1, 2),
(4, 1, 'Status', 2, 3),
(5, 1, 'Prioridade', 2, 4),
(6, 2, 'Nome', 3, 5),
(7, 4, 'nome', 3, 6),
(8, 4, 'especialidade', 1, 7),
(9, 5, 'tag', 4, 8),
(10, 5, 'tarefa', 4, 9),
(11, 6, 'Name', 2, 10),
(12, 6, 'Name', 3, 11),
(13, 8, 'Name', 3, 12),
(14, 9, 'export', 4, 13),
(15, 9, 'import', 4, 14),
(16, 10, 'type', 4, 15),
(17, 6, 'git_repo', 6, 16),
(18, 7, 'Name', 3, 17),
(19, 11, 'Name', 3, 18);

-- --------------------------------------------------------

--
-- Table structure for table `chave`
--

CREATE TABLE IF NOT EXISTS `chave` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `objeto_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chave_objeto_idx` (`objeto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE IF NOT EXISTS `guest` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_guest_app_idx` (`app_id`),
  KEY `fk_guest_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mashup`
--

CREATE TABLE IF NOT EXISTS `mashup` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `layout` int(11) NOT NULL DEFAULT '0',
  `style` int(11) NOT NULL DEFAULT '0',
  `app_id` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_mashup_app_idx` (`app_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mashup`
--

INSERT INTO `mashup` (`id`, `nome`, `layout`, `style`, `app_id`) VALUES
(1, 'Tarefas', 1, 3, 1),
(2, 'default', 1, 3, 2),
(3, 'default', 1, 3, 3),
(4, 'default', 1, 3, 4),
(5, 'default', 1, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `mashup_widget_xref`
--

CREATE TABLE IF NOT EXISTS `mashup_widget_xref` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mashup_id` bigint(20) NOT NULL,
  `widget_id` bigint(20) NOT NULL,
  `zona` int(11) NOT NULL DEFAULT '0',
  `ordem` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_mashup_widget_xref_mashup_idx` (`mashup_id`),
  KEY `fk_mashup_widget_xref_widget_idx` (`widget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mashup_widget_xref`
--

INSERT INTO `mashup_widget_xref` (`id`, `mashup_id`, `widget_id`, `zona`, `ordem`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 1),
(3, 1, 1, 3, 1),
(4, 1, 1, 4, 1),
(5, 5, 2, 1, 1),
(6, 5, 3, 2, 1),
(7, 5, 2, 3, 1),
(8, 5, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `objeto`
--

CREATE TABLE IF NOT EXISTS `objeto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `app_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `objeto`
--

INSERT INTO `objeto` (`id`, `nome`, `app_id`) VALUES
(1, 'Tarefa', 1),
(2, 'Tag', 1),
(3, 'Cliente', 3),
(4, 'produto', 4),
(5, 'tagtarefa', 1),
(6, 'Application', 5),
(7, 'provider', 5),
(8, 'resource_type', 5),
(9, 'resource_connection', 5),
(10, 'resource', 5),
(11, 'provisioner', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'vinik', 'vinicius.kirst@gmail.com', '1cfead9959b76ce44a847c850b61c587'),
(2, 'vinicius.versul', 'vinicius@versul.com.br', '37916c4962aba2d8661c61a2ea06af4b'),
(3, 'Diego', 'diegosv.nh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'andre', 'andre@versul.com.br', '93279e3308bdbbeed946fc965017f67a');

-- --------------------------------------------------------

--
-- Table structure for table `valor`
--

CREATE TABLE IF NOT EXISTS `valor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `campo_id` bigint(20) NOT NULL,
  `valor_campo` text,
  `chave_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_valor_campo_idx` (`campo_id`),
  KEY `fk_valor_chave_idx` (`chave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `widget`
--

CREATE TABLE IF NOT EXISTS `widget` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `objeto_id` bigint(20) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_widget_objeto_idx` (`objeto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `widget`
--

INSERT INTO `widget` (`id`, `nome`, `objeto_id`, `tipo`) VALUES
(1, 'Lista de Tarefas', 1, 1),
(2, 'App', 6, 2),
(3, 'Apps', 6, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app`
--
ALTER TABLE `app`
  ADD CONSTRAINT `fk_app_ownner` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `campo`
--
ALTER TABLE `campo`
  ADD CONSTRAINT `fk_campo_objeto` FOREIGN KEY (`objeto_id`) REFERENCES `objeto` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chave`
--
ALTER TABLE `chave`
  ADD CONSTRAINT `fk_chave_objeto` FOREIGN KEY (`objeto_id`) REFERENCES `objeto` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `guest`
--
ALTER TABLE `guest`
  ADD CONSTRAINT `fk_guest_app` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guest_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mashup`
--
ALTER TABLE `mashup`
  ADD CONSTRAINT `fk_mashup_app` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mashup_widget_xref`
--
ALTER TABLE `mashup_widget_xref`
  ADD CONSTRAINT `fk_mashup_widget_xref_mashup` FOREIGN KEY (`mashup_id`) REFERENCES `mashup` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mashup_widget_xref_widget` FOREIGN KEY (`widget_id`) REFERENCES `widget` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `valor`
--
ALTER TABLE `valor`
  ADD CONSTRAINT `fk_valor_campo` FOREIGN KEY (`campo_id`) REFERENCES `campo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_valor_chave` FOREIGN KEY (`chave_id`) REFERENCES `chave` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `widget`
--
ALTER TABLE `widget`
  ADD CONSTRAINT `fk_widget_objeto` FOREIGN KEY (`objeto_id`) REFERENCES `objeto` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
