-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Abr-2019 às 01:02
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sist_podium`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `ID_Aluno` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Nascimento` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telefone` varchar(30) DEFAULT NULL,
  `CPF` varchar(20) DEFAULT NULL,
  `RG` varchar(20) DEFAULT NULL,
  `Pais` varchar(30) DEFAULT NULL,
  `Estado` varchar(30) DEFAULT NULL,
  `Cidade` varchar(30) DEFAULT NULL,
  `Endereco` varchar(100) DEFAULT NULL,
  `Login` varchar(20) DEFAULT NULL,
  `Senha` varchar(20) DEFAULT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`ID_Aluno`, `Nome`, `Nascimento`, `Email`, `Telefone`, `CPF`, `RG`, `Pais`, `Estado`, `Cidade`, `Endereco`, `Login`, `Senha`, `Status`) VALUES
(98, 'Antony Leme', '2002-04-04', 'antony@leme.com', '32988726589', '125678', '12345678', 'Brasil', 'SP', 'Cataguases', 'R. Gov. Francelino Pereira', 'antony', '123', 0),
(99, 'Joao Maria', '0004-04-04', 'joao@gmail.com', '13', '12', '2', '2', '2', '2', '2', '22', '2', 1),
(103, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(104, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(105, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(106, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(107, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(108, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(109, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(110, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(111, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(112, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(113, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(114, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(115, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(116, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(117, 'Antony Novais', '0001-01-01', '0@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(121, 'd', '0001-01-01', '0c@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(123, 'd', '0001-01-01', '0c@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(124, 'd', '0001-01-01', '0c@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(125, 'd', '0001-01-01', '0c@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(126, 'd', '0001-01-01', '0c@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(127, 'Kaio Oliveira', '0001-01-01', '0c@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(128, 'd', '0001-01-01', '0c@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(129, 'd', '0001-01-01', '0c@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(130, 'd', '0001-01-01', '0c@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(132, 'Antonio', '0001-01-01', 'a@gc.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(133, 'Joao', '0001-01-01', '000@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(134, 'Maria', '0001-01-01', '0@i.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(139, 'Flávia Souza', '0001-01-01', '0@a.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(140, '0', '0001-01-01', '0@a.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(141, 'Hugo', '0001-01-01', 'ah@c.com', '000', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(142, 'Hugo', '0001-01-01', 'ah@c.com', '000', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(143, 'Hugo', '0001-01-01', 'ah@c.com', '000', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(144, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(145, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(146, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(147, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(148, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(149, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(150, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(151, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(152, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(153, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(154, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(155, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(156, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(157, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(158, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(159, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(160, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(161, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(162, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(163, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(164, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(165, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(166, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(167, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(168, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(169, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(170, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(171, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(172, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(173, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(174, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(175, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(176, 'Jose', '0001-01-01', 'jose@jose.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(177, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(178, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(179, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(180, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(181, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(182, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(183, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(184, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(185, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(186, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(187, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(188, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(189, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(190, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(191, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(192, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(193, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(194, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(195, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(196, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(197, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(198, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(199, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(200, '0', '0001-01-01', '0@O.COM', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(201, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(202, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(203, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(204, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(205, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(206, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(207, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(208, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(209, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(210, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(211, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(212, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(213, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(214, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(215, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(216, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(217, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(218, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(219, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(220, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(221, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(222, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(223, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(224, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(225, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(226, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(227, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(228, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(229, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(230, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(231, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(232, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(233, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(234, '0', '0001-01-01', '0@h.om', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0),
(236, 'ooo', '0001-01-01', '00@g.com', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_pacotes`
--

CREATE TABLE `alunos_pacotes` (
  `ID_Aluno_pacote` int(11) NOT NULL,
  `ID_Aluno` int(11) DEFAULT NULL,
  `ID_Pacote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos_pacotes`
--

INSERT INTO `alunos_pacotes` (`ID_Aluno_pacote`, `ID_Aluno`, `ID_Pacote`) VALUES
(17, 98, 15),
(39, 121, 8),
(41, 123, 8),
(42, 124, 8),
(43, 125, 8),
(44, 126, 8),
(45, 127, 8),
(46, 128, 8),
(47, 129, 8),
(48, 130, 8),
(50, 132, 9),
(51, 133, 8),
(52, 134, 8),
(57, 139, 9),
(58, 140, 9),
(59, 141, 8),
(60, 142, 8),
(61, 143, 8),
(62, 144, 8),
(63, 145, 8),
(64, 146, 8),
(65, 147, 8),
(66, 148, 8),
(67, 149, 8),
(68, 150, 8),
(69, 151, 8),
(70, 152, 8),
(71, 153, 8),
(72, 154, 8),
(73, 155, 8),
(74, 156, 8),
(75, 157, 8),
(76, 158, 8),
(77, 159, 8),
(78, 160, 8),
(79, 161, 8),
(80, 162, 8),
(81, 163, 8),
(82, 164, 8),
(83, 165, 8),
(84, 166, 8),
(85, 167, 8),
(86, 168, 8),
(87, 169, 8),
(88, 170, 8),
(89, 171, 8),
(90, 172, 8),
(91, 173, 8),
(92, 174, 8),
(93, 175, 8),
(94, 176, 8),
(95, 177, 8),
(96, 178, 8),
(97, 179, 8),
(98, 180, 8),
(99, 181, 8),
(100, 182, 8),
(101, 183, 8),
(102, 184, 8),
(103, 185, 8),
(104, 186, 8),
(105, 187, 8),
(106, 188, 8),
(107, 189, 8),
(108, 190, 8),
(109, 191, 8),
(110, 192, 8),
(111, 193, 8),
(112, 194, 8),
(113, 195, 8),
(114, 196, 8),
(115, 197, 8),
(116, 198, 8),
(117, 199, 8),
(118, 200, 8),
(119, 201, 8),
(120, 202, 8),
(121, 203, 8),
(122, 204, 8),
(123, 205, 8),
(124, 206, 8),
(125, 207, 8),
(126, 208, 8),
(127, 209, 8),
(128, 210, 8),
(129, 211, 8),
(130, 212, 8),
(131, 213, 8),
(132, 214, 8),
(133, 215, 8),
(134, 216, 8),
(135, 217, 8),
(136, 218, 8),
(137, 219, 8),
(138, 220, 8),
(139, 221, 8),
(140, 222, 8),
(141, 223, 8),
(142, 224, 8),
(143, 225, 8),
(144, 226, 8),
(145, 227, 8),
(146, 228, 8),
(147, 229, 8),
(148, 230, 8),
(149, 231, 8),
(150, 232, 8),
(151, 233, 8),
(152, 234, 8),
(167, 99, 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `ID_Aula` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Arquivo` varchar(100) DEFAULT NULL,
  `Apostila` varchar(100) DEFAULT NULL,
  `Exercicios` varchar(100) DEFAULT NULL,
  `Teste` varchar(100) DEFAULT NULL,
  `ID_Curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `ID_Colaborador` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Nascimento` date NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefone` varchar(30) NOT NULL,
  `Pais` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Cidade` varchar(30) NOT NULL,
  `Endereco` varchar(100) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `Senha` varchar(20) NOT NULL,
  `Perfil` varchar(30) NOT NULL,
  `Licenca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`ID_Colaborador`, `Nome`, `Nascimento`, `Email`, `Telefone`, `Pais`, `Estado`, `Cidade`, `Endereco`, `Login`, `Senha`, `Perfil`, `Licenca`) VALUES
(4, 'Antony Leme Novais Ferreira', '2002-04-04', 'antony@leme.cf', '32988726589', 'Brasil', 'MG', 'Cataguases', 'R. Gov. Francelino Pereira, 15', 'antony', '123', 'Coordenador', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `ID_Curso` int(11) NOT NULL,
  `Nome_curso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`ID_Curso`, `Nome_curso`) VALUES
(10, 'Excel 2016'),
(15, 'Word 2016'),
(16, 'PowerPoint 2016'),
(17, 'PHP 7'),
(18, 'Python 3'),
(19, 'HTML 5'),
(20, 'CSS 3'),
(21, 'Javascript'),
(22, 'Photoshop CS6'),
(23, 'Fireworks CS6'),
(24, 'Illustrator CS6'),
(25, 'CorelDraw X5'),
(26, 'Lógica de programação'),
(27, 'Estrutura de Dados'),
(28, 'Programação orientada a objetos'),
(29, 'Java'),
(30, 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `ID_Horario` int(11) NOT NULL,
  `Dia` varchar(20) NOT NULL,
  `Hora_inicio` time NOT NULL,
  `Hora_fim` time NOT NULL,
  `Ordem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`ID_Horario`, `Dia`, `Hora_inicio`, `Hora_fim`, `Ordem`) VALUES
(31, 'Segunda-feira', '08:00:00', '09:00:00', 1),
(32, 'Segunda-feira', '10:00:00', '11:00:00', 1),
(33, 'Segunda-feira', '09:00:00', '10:00:00', 1),
(34, 'Terça-feira', '08:00:00', '09:00:00', 2),
(35, 'Terça-feira', '10:00:00', '11:00:00', 2),
(36, 'Terça-feira', '14:00:00', '15:00:00', 2),
(37, 'Sexta-feira', '15:00:00', '16:00:00', 5),
(38, 'Quarta-feira', '08:00:00', '09:00:00', 3),
(39, 'Segunda-feira', '15:00:00', '16:00:00', 1),
(40, 'Terça-feira', '07:00:00', '08:00:00', 2),
(41, 'Segunda-feira', '07:00:00', '08:00:00', 1),
(42, 'Sexta-feira', '19:00:00', '20:00:00', 5),
(43, 'Segunda-feira', '16:00:00', '17:00:00', 1),
(44, 'Segunda-feira', '17:00:00', '18:00:00', 1),
(45, 'Segunda-feira', '19:00:00', '20:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios_alunos`
--

CREATE TABLE `horarios_alunos` (
  `ID_Horario_Aluno` int(11) NOT NULL,
  `ID_Aluno` int(11) DEFAULT NULL,
  `ID_Sala_Horario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horarios_alunos`
--

INSERT INTO `horarios_alunos` (`ID_Horario_Aluno`, `ID_Aluno`, `ID_Sala_Horario`) VALUES
(34, 98, 24),
(35, 99, 24),
(38, 139, 25),
(39, 127, 26),
(41, 236, 29),
(42, 98, 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `maquinas`
--

CREATE TABLE `maquinas` (
  `ID_Maquina` int(11) NOT NULL,
  `Maquina_Nome` varchar(30) DEFAULT NULL,
  `ID_Sala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `maquinas`
--

INSERT INTO `maquinas` (`ID_Maquina`, `Maquina_Nome`, `ID_Sala`) VALUES
(28, '01', 2),
(29, '02', 2),
(30, '03', 2),
(31, '04', 2),
(32, '05', 2),
(33, '01', 3),
(34, '02', 3),
(35, '03', 3),
(36, '01', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacotes`
--

CREATE TABLE `pacotes` (
  `ID_Pacote` int(11) NOT NULL,
  `Nome_pacote` varchar(30) DEFAULT NULL,
  `Aluno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacotes`
--

INSERT INTO `pacotes` (`ID_Pacote`, `Nome_pacote`, `Aluno`) VALUES
(3, 'Office', 0),
(7, 'Programador WEB', 0),
(8, 'Designer', 0),
(9, 'Programação', 0),
(12, 'antonyleme', 1),
(13, 'Antony Leme', 1),
(14, 'Antony Leme Novais Ferreira', 1),
(15, 'Antony Leme', 1),
(23, '99', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacotes_cursos`
--

CREATE TABLE `pacotes_cursos` (
  `ID_Pacote_curso` int(11) NOT NULL,
  `ID_Pacote` int(11) DEFAULT NULL,
  `ID_Curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacotes_cursos`
--

INSERT INTO `pacotes_cursos` (`ID_Pacote_curso`, `ID_Pacote`, `ID_Curso`) VALUES
(24, 3, 10),
(25, 3, 15),
(27, 3, 16),
(28, 7, 19),
(29, 7, 21),
(30, 7, 20),
(31, 7, 18),
(32, 7, 17),
(33, 8, 25),
(34, 8, 24),
(35, 8, 23),
(36, 8, 22),
(38, 9, 26),
(39, 9, 30),
(40, 9, 27),
(41, 9, 29),
(42, 9, 28),
(51, 12, 25),
(52, 12, 23),
(53, 12, 10),
(54, 12, 26),
(55, 13, 25),
(56, 13, 24),
(57, 13, 10),
(58, 13, 15),
(59, 13, 26),
(60, 14, 25),
(61, 14, 24),
(62, 14, 23),
(63, 14, 10),
(64, 14, 26),
(65, 15, 25),
(66, 15, 24),
(67, 15, 10),
(128, 23, 10),
(129, 23, 15),
(130, 23, 16),
(131, 23, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `ID_Sala` int(11) NOT NULL,
  `Nome_Sala` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`ID_Sala`, `Nome_Sala`) VALUES
(2, 'Laboratório de Informática 1'),
(3, 'Laboratório de Informática 2'),
(4, 'Laboratório de Informática 3'),
(5, 'Laboratório de Farmácia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas_horarios`
--

CREATE TABLE `salas_horarios` (
  `ID_Sala_Horario` int(11) NOT NULL,
  `ID_Sala` int(11) DEFAULT NULL,
  `ID_Horario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `salas_horarios`
--

INSERT INTO `salas_horarios` (`ID_Sala_Horario`, `ID_Sala`, `ID_Horario`) VALUES
(24, 2, 41),
(25, 2, 31),
(26, 2, 33),
(27, 2, 32),
(28, 2, 39),
(29, 2, 40),
(30, 2, 34),
(31, 2, 35),
(32, 2, 36),
(33, 2, 38),
(34, 2, 37),
(35, 3, 41),
(36, 3, 31),
(37, 3, 33),
(38, 3, 32),
(39, 3, 39),
(40, 3, 38),
(41, 4, 40),
(42, 4, 34),
(43, 4, 35),
(44, 4, 36),
(45, 4, 38),
(46, 4, 37),
(47, 5, 42),
(48, 2, 44),
(49, 2, 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`ID_Aluno`);

--
-- Indexes for table `alunos_pacotes`
--
ALTER TABLE `alunos_pacotes`
  ADD PRIMARY KEY (`ID_Aluno_pacote`),
  ADD KEY `fk_ID_Aluno` (`ID_Aluno`),
  ADD KEY `fk_ID_Pacote` (`ID_Pacote`);

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`ID_Aula`),
  ADD KEY `fk_aula_id_curso` (`ID_Curso`);

--
-- Indexes for table `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`ID_Colaborador`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`ID_Curso`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`ID_Horario`);

--
-- Indexes for table `horarios_alunos`
--
ALTER TABLE `horarios_alunos`
  ADD PRIMARY KEY (`ID_Horario_Aluno`),
  ADD KEY `fk_horarios_alunos_id_aluno` (`ID_Aluno`),
  ADD KEY `fk_horarios_alunos_id_sala_horario` (`ID_Sala_Horario`);

--
-- Indexes for table `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`ID_Maquina`),
  ADD KEY `fk_maquina_id_sala` (`ID_Sala`);

--
-- Indexes for table `pacotes`
--
ALTER TABLE `pacotes`
  ADD PRIMARY KEY (`ID_Pacote`);

--
-- Indexes for table `pacotes_cursos`
--
ALTER TABLE `pacotes_cursos`
  ADD PRIMARY KEY (`ID_Pacote_curso`),
  ADD KEY `fk_pacote_id_pacote` (`ID_Pacote`),
  ADD KEY `fk_pacote_id_curso` (`ID_Curso`);

--
-- Indexes for table `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`ID_Sala`);

--
-- Indexes for table `salas_horarios`
--
ALTER TABLE `salas_horarios`
  ADD PRIMARY KEY (`ID_Sala_Horario`),
  ADD KEY `fk_ID_Sala` (`ID_Sala`),
  ADD KEY `fk_ID_Horario` (`ID_Horario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `ID_Aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `alunos_pacotes`
--
ALTER TABLE `alunos_pacotes`
  MODIFY `ID_Aluno_pacote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `aulas`
--
ALTER TABLE `aulas`
  MODIFY `ID_Aula` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `ID_Colaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `ID_Curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `ID_Horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `horarios_alunos`
--
ALTER TABLE `horarios_alunos`
  MODIFY `ID_Horario_Aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `ID_Maquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pacotes`
--
ALTER TABLE `pacotes`
  MODIFY `ID_Pacote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pacotes_cursos`
--
ALTER TABLE `pacotes_cursos`
  MODIFY `ID_Pacote_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `salas`
--
ALTER TABLE `salas`
  MODIFY `ID_Sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salas_horarios`
--
ALTER TABLE `salas_horarios`
  MODIFY `ID_Sala_Horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos_pacotes`
--
ALTER TABLE `alunos_pacotes`
  ADD CONSTRAINT `fk_ID_Aluno` FOREIGN KEY (`ID_Aluno`) REFERENCES `alunos` (`ID_Aluno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ID_Pacote` FOREIGN KEY (`ID_Pacote`) REFERENCES `pacotes` (`ID_Pacote`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_aula_id_curso` FOREIGN KEY (`ID_Curso`) REFERENCES `cursos` (`ID_Curso`);

--
-- Limitadores para a tabela `horarios_alunos`
--
ALTER TABLE `horarios_alunos`
  ADD CONSTRAINT `fk_horarios_alunos_id_aluno` FOREIGN KEY (`ID_Aluno`) REFERENCES `alunos` (`ID_Aluno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_horarios_alunos_id_sala_horario` FOREIGN KEY (`ID_Sala_Horario`) REFERENCES `salas_horarios` (`ID_Sala_Horario`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `fk_maquina_id_sala` FOREIGN KEY (`ID_Sala`) REFERENCES `salas` (`ID_Sala`);

--
-- Limitadores para a tabela `pacotes_cursos`
--
ALTER TABLE `pacotes_cursos`
  ADD CONSTRAINT `fk_pacote_id_curso` FOREIGN KEY (`ID_Curso`) REFERENCES `cursos` (`ID_Curso`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pacote_id_pacote` FOREIGN KEY (`ID_Pacote`) REFERENCES `pacotes` (`ID_Pacote`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `salas_horarios`
--
ALTER TABLE `salas_horarios`
  ADD CONSTRAINT `fk_ID_Horario` FOREIGN KEY (`ID_Horario`) REFERENCES `horarios` (`ID_Horario`),
  ADD CONSTRAINT `fk_ID_Sala` FOREIGN KEY (`ID_Sala`) REFERENCES `salas` (`ID_Sala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
