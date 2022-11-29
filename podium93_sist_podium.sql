-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 10-Nov-2022 às 12:47
-- Versão do servidor: 5.7.23-23
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `podium93_sist_podium`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `ID_Aluno` int(11) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `Responsavel` varchar(100) DEFAULT NULL,
  `Nascimento` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telefone` varchar(30) DEFAULT NULL,
  `CPF` varchar(20) DEFAULT NULL,
  `RG` varchar(20) DEFAULT NULL,
  `CEP` varchar(30) NOT NULL,
  `Estado` varchar(30) DEFAULT NULL,
  `Cidade` varchar(30) DEFAULT NULL,
  `Rua` varchar(100) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Complemento` int(11) DEFAULT NULL,
  `Senha` varchar(20) DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Ultimo_curso` int(11) DEFAULT NULL,
  `Perfil` varchar(10) DEFAULT 'Aluno',
  `Avatar` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`ID_Aluno`, `Nome`, `Responsavel`, `Nascimento`, `Email`, `Telefone`, `CPF`, `RG`, `CEP`, `Estado`, `Cidade`, `Rua`, `Numero`, `Complemento`, `Senha`, `Status`, `Ultimo_curso`, `Perfil`, `Avatar`) VALUES
(254, 'Antony Leme', NULL, '2000-08-08', 'antonycefet@gmail.com', '(32) 9 8872-6589', '148.272.296-86', '00.000.000', '36771-530', 'MG', 'Cataguases', 'Rua Governador Francelino Pereira', 15, NULL, '08082000', 0, 63, 'Aluno', 3),
(256, 'Waldevino', NULL, '1975-08-21', 'waldevinojr@gmail.com', '(32) 9 8872-5299', NULL, NULL, '36773-010', 'MG', 'Cataguases', 'Avenida Melo Viana', 407, NULL, '21081975', 0, 71, 'Aluno', 21),
(264, 'Lucas Teixeira', NULL, '1991-09-23', 'lucasts19@hotmail.com', '(32) 9 9915-5897', NULL, NULL, '36773-080', 'MG', 'Cataguases', 'Rua Manoel Silveira', 185, NULL, '23091991', 0, 71, 'Aluno', 2),
(265, 'Claudiney Rafael Guimarães Dias', NULL, '1991-09-23', '', '', NULL, NULL, '', 'MG', 'Cataguases', '', 0, NULL, '23091991', 0, 71, 'Aluno', 2),
(266, 'Fernando Teixeira', NULL, '1991-09-23', '', '', NULL, NULL, '', 'MG', 'Cataguases', '', 0, NULL, '23091991', 0, 71, 'Aluno', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_historicos`
--

CREATE TABLE `alunos_historicos` (
  `id_aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `data_fim` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_pacotes`
--

CREATE TABLE `alunos_pacotes` (
  `ID_Aluno_pacote` int(11) NOT NULL,
  `ID_Aluno` int(11) DEFAULT NULL,
  `ID_Pacote` int(11) DEFAULT NULL,
  `Finalizado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos_pacotes`
--

INSERT INTO `alunos_pacotes` (`ID_Aluno_pacote`, `ID_Aluno`, `ID_Pacote`, `Finalizado`) VALUES
(289, 264, 71, 0),
(292, 256, 71, 0),
(302, 256, 77, 0),
(303, 256, 78, 0),
(304, 256, 79, 0),
(305, 256, 80, 0),
(306, 256, 26, 0),
(307, 256, 44, 0),
(308, 256, 66, 0),
(309, 256, 75, 0),
(310, 256, 76, 0),
(311, 265, 71, 0),
(312, 266, 71, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_curso_progressos`
--

CREATE TABLE `aluno_curso_progressos` (
  `ID_Curso` int(11) NOT NULL,
  `ID_Aluno` int(11) NOT NULL,
  `Aula_atual` int(11) DEFAULT '1',
  `Estagio` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_curso_progressos`
--

INSERT INTO `aluno_curso_progressos` (`ID_Curso`, `ID_Aluno`, `Aula_atual`, `Estagio`) VALUES
(60, 256, 5, 1),
(62, 256, 3, 1),
(63, 256, 5, 1),
(65, 256, 6, 1),
(66, 256, 5, 1),
(69, 256, 5, 1),
(70, 256, 5, 1),
(71, 256, 5, 1),
(71, 264, 5, 1),
(71, 265, 5, 1),
(71, 266, 5, 1),
(74, 256, 7, 1),
(75, 256, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_presencas`
--

CREATE TABLE `aluno_presencas` (
  `ID_Aluno` int(11) NOT NULL,
  `Data` varchar(50) NOT NULL,
  `ID_Sala_Horario` int(11) NOT NULL,
  `Presente` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_presencas`
--

INSERT INTO `aluno_presencas` (`ID_Aluno`, `Data`, `ID_Sala_Horario`, `Presente`) VALUES
(237, '2019-06-09 00:00:00', 29, 1),
(238, '2019-06-10 00:00:00', 24, 1),
(238, '2019-06-12 00:00:00', 24, 1),
(239, '2019-06-09 00:00:00', 29, 0),
(244, '2019-06-09 00:00:00', 33, 0),
(244, '2019-10-19 00:00:00', 33, 0),
(246, '2019-06-09 00:00:00', 29, 0),
(246, '2019-06-09 00:00:00', 33, 0),
(246, '2019-10-19 00:00:00', 33, 0),
(252, '2019-10-19 00:00:00', 33, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_testes`
--

CREATE TABLE `aluno_testes` (
  `ID_Aluno` int(11) NOT NULL,
  `ID_Curso` int(11) NOT NULL,
  `Numero_aula` int(11) NOT NULL,
  `Nota` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_testes`
--

INSERT INTO `aluno_testes` (`ID_Aluno`, `ID_Curso`, `Numero_aula`, `Nota`) VALUES
(256, 60, 1, 100),
(256, 60, 2, 75),
(256, 60, 3, 100),
(256, 60, 4, 75),
(256, 60, 5, 100),
(256, 60, 6, 100),
(256, 62, 1, 100),
(256, 62, 2, 100),
(256, 62, 3, 100),
(256, 62, 4, 75),
(256, 62, 5, 100),
(256, 63, 1, 100),
(256, 65, 5, 100),
(256, 69, 1, 100),
(256, 69, 2, 75),
(256, 69, 3, 75),
(256, 69, 4, 80),
(256, 69, 5, 80),
(256, 69, 6, 100),
(256, 69, 9, 75),
(256, 69, 10, 75),
(256, 69, 11, 100),
(256, 69, 12, 75),
(256, 69, 13, 100),
(256, 69, 14, 100),
(256, 71, 1, 90),
(256, 74, 1, 77.8),
(256, 74, 3, 100),
(256, 74, 4, 100),
(256, 74, 5, 100),
(256, 74, 6, 100),
(256, 75, 1, 100),
(264, 71, 1, 90),
(264, 71, 2, 100),
(264, 71, 3, 100),
(264, 71, 4, 100),
(265, 71, 1, 90),
(265, 71, 2, 100),
(265, 71, 3, 100),
(265, 71, 4, 100),
(266, 71, 1, 80),
(266, 71, 2, 90),
(266, 71, 3, 90),
(266, 71, 4, 100);

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
  `CEP` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Cidade` varchar(30) NOT NULL,
  `Rua` varchar(100) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Complemento` int(11) DEFAULT NULL,
  `Login` varchar(20) NOT NULL,
  `Senha` varchar(20) NOT NULL,
  `Perfil` varchar(30) NOT NULL,
  `Licenca` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`ID_Colaborador`, `Nome`, `Nascimento`, `Email`, `Telefone`, `CEP`, `Estado`, `Cidade`, `Rua`, `Numero`, `Complemento`, `Login`, `Senha`, `Perfil`, `Licenca`) VALUES
(4, 'Antony Leme Novais Ferreira', '2002-04-04', 'antony@leme.cf', '32988726589', 'Brasil', 'MG', 'Cataguases', 'R. Gov. Francelino Pereira, 15', 0, NULL, 'antony1', '123', 'Coordenador', NULL),
(5, 'Junior Ferreira Jacinto', '2002-04-04', 'jun@outlook.com', '(32) 9 8872-6589', '36771-000', 'MG', 'Cataguases', 'Avenida Manoel Inácio Peixoto', 77, NULL, 'admin', 'grupopodium', 'Coordenador', NULL),
(6, 'Gabriel do Carmo Silva', '2001-10-06', 'gabriel.ccarmo@gmail.com', '991602908', '36772006', 'MG', 'Cataguases', 'Amelinha Peixoto', 441, 201, 'silva', 'podium', 'Administrador', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `ID` int(11) NOT NULL,
  `Razao_social` varchar(100) NOT NULL,
  `Nome_fantasia` varchar(100) NOT NULL,
  `Telefone` varchar(20) NOT NULL,
  `CEP` varchar(20) NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `Cidade` varchar(100) NOT NULL,
  `Rua` varchar(100) NOT NULL,
  `Bairro` varchar(100) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Complemento` int(11) DEFAULT NULL,
  `CNPJ` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`ID`, `Razao_social`, `Nome_fantasia`, `Telefone`, `CEP`, `Estado`, `Cidade`, `Rua`, `Bairro`, `Numero`, `Complemento`, `CNPJ`) VALUES
(1, 'GUERRA & NASCIMENTO EMPREENDIMENTO LTDA', 'GRUPO PODIUM', '(32) 9 8827-6892', '36771-530', 'MG', 'Cataguases', 'Rua Governador Francelino Pereira', 'Taquara Preta', 15, NULL, '3253267368594');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos`
--

CREATE TABLE `contratos` (
  `Clausulas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contratos`
--

INSERT INTO `contratos` (`Clausulas`) VALUES
('1.1 - Quando empregadas no presente contrato, e/ou documentos relacionados com a\r\nexecução dele, as denominações adiante relacionadas significarão, respectivamente:\r\na) PROPOSTA DE ADESÃO: documento firmado pelas Partes, a este explicitamente\r\nvinculado e que deste passará a ser parte integrante e indissociável, onde constarão\r\nos dados de identificação e qualificação da EMPRESA, identificação e qualificação\r\ndo(s) representantes(s) legal(is) e/ou autorizado(s) dessa, e as condições comerciais\r\nno âmbito deste Contrato de Prestação de Serviços;\r\nb) CARTÃO BRB TICKET RESTAURANTE® ou CARTÃO: cartão magnético\r\nfornecido à EMPRESA, cadastrada, correntista ou não do Banco Regional de Brasília -\r\nBRB e entregue ao USUÁRIO para a realização de TRANSAÇÃO na rede de\r\nESTABELECIMENTOS credenciados; \r\n2\r\nc) ESTABELECIMENTO: os estabelecimentos comerciais, voltados ao segmento de\r\nrestaurante, tais como restaurantes, lanchonetes, padarias e similares, identificados\r\ncom a bandeira TICKET;\r\nd) EXTRATO DO CARTÃO: relatório impresso, que discrimina as despesas e os\r\ncréditos apurados no CARTÃO;\r\ne) PEDIDO DE CRÉDITO: é a relação encaminhada pela EMPRESA à\r\nCONTRATADA, contendo o nome, CPF do USUÁRIO, o valor do benefício, a serem\r\ndisponibilizados nos CARTÕES;\r\nf) SISTEMA CARTÃO BRB TICKET RESTAURANTE® ou SISTEMA: conjunto de\r\nprocessos tecnológicos e operacionais de gerenciamento de transações realizadas\r\nentre USUÁRIO e ESTABELECIMENTO, por meio de cartão eletrônico, para\r\naquisição de refeições prontas em restaurantes e em estabelecimentos similares, em\r\nconformidade com a legislação do Programa de Alimentação do Trabalhador - PAT;\r\ng) SENHA: código eletrônico secreto, individualizado para cada CARTÃO,\r\nencaminhado à EMPRESA em envelope lacrado, a qual será sempre responsável pela\r\nentrega ao USUÁRIO, constituindo sua utilização assinatura eletrônica do USUÁRIO,\r\nvalendo para todos os efeitos da lei e do contrato, como expressão inequívoca de sua\r\nvontade, especialmente por ocasião de TRANSAÇÕES junto ao\r\nESTABELECIMENTO credenciado;\r\nh) TRANSAÇÃO: legítima operação comercial de aquisição de refeições prontas,\r\nmediante a utilização do CARTÃO, transmitida por equipamentos ou de forma manual,\r\nconforme especificações contidas no folheto de utilização do CARTÃO, realizada entre\r\no USUÁRIO e o ESTABELECIMENTO;\r\ni) USUÁRIO: pessoa física designada para portar o CARTÃO BRB TICKET\r\nRESTAURANTE® e habilitado a realizar TRANSAÇÃO na rede de\r\nESTABELECIMENTO credenciada, por meio da SENHA de autorização;\r\nj) CONTRATADA: prestadora de serviços de implantação e gerenciamento do\r\nSISTEMA de CARTÃO BRB TICKET RESTAURANTE®;\r\nk) EMPRESA: pessoa jurídica, com sede no País, com inscrição no Cadastro Nacional\r\nde pessoa jurídica ou Cadastro Geral de Contribuintes do ministério da Fazenda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `ID_Curso` int(11) NOT NULL,
  `Nome_curso` varchar(100) NOT NULL,
  `Preco` float NOT NULL,
  `Horas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`ID_Curso`, `Nome_curso`, `Preco`, `Horas`) VALUES
(60, 'Cuidador de Idosos', 300, 12),
(62, 'Porteiro e Vigia', 200, 10),
(63, 'Windows 10', 200, NULL),
(65, 'PowerPoint 2016', 0, 0),
(66, 'Word 2016', 0, 0),
(69, 'Robótica', 0, 0),
(70, 'Excel 2016', 0, 0),
(71, 'NR 35 Trabalho em Altura', 0, 0),
(72, 'NR 33 Trabalho em Espaço Confinado', 0, 0),
(73, 'NR 23 Brigada de  Incêndio', 0, 0),
(74, 'NR 20 Trabalho com combustíveis e inflamáveis', 0, 9),
(75, 'Atendente de Farmácia', 200, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicos`
--

CREATE TABLE `historicos` (
  `id_aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `media` float NOT NULL,
  `data_fim` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(45, 'Segunda-feira', '19:00:00', '20:00:00', 1),
(46, 'Terça-feira', '09:00:00', '10:00:00', 2);

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
(68, 254, 24),
(70, 256, 25),
(71, 256, 26);

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
(26, 'Cuidador de Idosos', 0),
(44, 'Porteiro e Vigia', 0),
(66, 'Robótica', 0),
(71, 'NR 35 Trabalho em altura', 0),
(72, 'NR 33 Trabalho em Espaço Confi', 0),
(73, 'NR 23 Brigada de Incêndio', 0),
(75, 'NR 20 Trabalho com Líquidos e ', 0),
(76, 'Atendente de Farmácia', 0),
(77, 'Windows10', 0),
(78, 'Excel2016', 0),
(79, 'Word2016', 0),
(80, 'PowerPoint2016', 0);

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
(215, 66, 69),
(226, 71, 71),
(228, 72, 72),
(229, 73, 73),
(230, 75, 74),
(232, 26, 60),
(233, 44, 62),
(236, 77, 63),
(240, 78, 70),
(241, 79, 66),
(242, 80, 65),
(243, 76, 75);

-- --------------------------------------------------------

--
-- Estrutura da tabela `propagandas`
--

CREATE TABLE `propagandas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `propagandas`
--

INSERT INTO `propagandas` (`id`, `titulo`) VALUES
(5, 'Cursos'),
(6, 'Titulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `representantes`
--

CREATE TABLE `representantes` (
  `CPF` varchar(100) NOT NULL,
  `RG` varchar(30) NOT NULL,
  `Nome` varchar(100) DEFAULT NULL,
  `CEP` varchar(20) DEFAULT NULL,
  `Rua` varchar(100) DEFAULT NULL,
  `Cidade` varchar(100) DEFAULT NULL,
  `Bairro` varchar(100) DEFAULT NULL,
  `Numero` int(11) NOT NULL,
  `Complemento` int(11) DEFAULT NULL,
  `Estado` varchar(100) DEFAULT NULL,
  `Telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `representantes`
--

INSERT INTO `representantes` (`CPF`, `RG`, `Nome`, `CEP`, `Rua`, `Cidade`, `Bairro`, `Numero`, `Complemento`, `Estado`, `Telefone`) VALUES
('000000000000000', '', 'resp', '00000000', '000000000', '00000000', '0000000', 0, 9, NULL, NULL),
('117.210.006-32', '99.999.999', 'Fabiana Cristina de Meira Santos', '36773-097', 'Rua Joaquim Anacleto', 'Cataguases', 'Jardim Bandeirantes I', 108, NULL, 'MG', '(32) 9 8439-2338'),
('999.999.999-99', '99.999.999', 'Waldevino', '36773-010', 'Avenida Melo Viana', 'Cataguases', 'Centro', 108, NULL, 'MG', '(32) 9 8872-5299'),
('9999999999', '2543534', 'Pai', '999999', '99', '99', '99', 99, 8, '9', '999999999'),
('999999999999', '99999999', 'antony', '36771530', 'M', 'M', 'M', 15, 1, 'MG', '9999999999999999');

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
(49, 2, 45),
(50, 2, 46);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`ID_Aluno`),
  ADD KEY `fk_aluno_ultimo_curso` (`Ultimo_curso`),
  ADD KEY `fk_representante_cpf` (`Responsavel`);

--
-- Índices para tabela `alunos_historicos`
--
ALTER TABLE `alunos_historicos`
  ADD PRIMARY KEY (`id_aluno`,`id_curso`),
  ADD KEY `fk_alunos_historicos_idcurso` (`id_curso`);

--
-- Índices para tabela `alunos_pacotes`
--
ALTER TABLE `alunos_pacotes`
  ADD PRIMARY KEY (`ID_Aluno_pacote`),
  ADD KEY `fk_ID_Aluno` (`ID_Aluno`),
  ADD KEY `fk_ID_Pacote` (`ID_Pacote`);

--
-- Índices para tabela `aluno_curso_progressos`
--
ALTER TABLE `aluno_curso_progressos`
  ADD PRIMARY KEY (`ID_Curso`,`ID_Aluno`),
  ADD KEY `fk_progresso_id_aluno` (`ID_Aluno`);

--
-- Índices para tabela `aluno_presencas`
--
ALTER TABLE `aluno_presencas`
  ADD PRIMARY KEY (`ID_Aluno`,`Data`,`ID_Sala_Horario`);

--
-- Índices para tabela `aluno_testes`
--
ALTER TABLE `aluno_testes`
  ADD PRIMARY KEY (`ID_Aluno`,`ID_Curso`,`Numero_aula`),
  ADD KEY `fk_aluno_teste_idcurso` (`ID_Curso`);

--
-- Índices para tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`ID_Aula`),
  ADD KEY `fk_aula_id_curso` (`ID_Curso`);

--
-- Índices para tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`ID_Colaborador`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`ID_Curso`);

--
-- Índices para tabela `historicos`
--
ALTER TABLE `historicos`
  ADD PRIMARY KEY (`id_aluno`,`id_curso`),
  ADD KEY `fk_historico_idcurso` (`id_curso`);

--
-- Índices para tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`ID_Horario`);

--
-- Índices para tabela `horarios_alunos`
--
ALTER TABLE `horarios_alunos`
  ADD PRIMARY KEY (`ID_Horario_Aluno`),
  ADD KEY `fk_horarios_alunos_id_aluno` (`ID_Aluno`),
  ADD KEY `fk_horarios_alunos_id_sala_horario` (`ID_Sala_Horario`);

--
-- Índices para tabela `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`ID_Maquina`),
  ADD KEY `fk_maquina_id_sala` (`ID_Sala`);

--
-- Índices para tabela `pacotes`
--
ALTER TABLE `pacotes`
  ADD PRIMARY KEY (`ID_Pacote`);

--
-- Índices para tabela `pacotes_cursos`
--
ALTER TABLE `pacotes_cursos`
  ADD PRIMARY KEY (`ID_Pacote_curso`),
  ADD KEY `fk_pacote_id_pacote` (`ID_Pacote`),
  ADD KEY `fk_pacote_id_curso` (`ID_Curso`);

--
-- Índices para tabela `propagandas`
--
ALTER TABLE `propagandas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`CPF`);

--
-- Índices para tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`ID_Sala`);

--
-- Índices para tabela `salas_horarios`
--
ALTER TABLE `salas_horarios`
  ADD PRIMARY KEY (`ID_Sala_Horario`),
  ADD KEY `fk_ID_Sala` (`ID_Sala`),
  ADD KEY `fk_ID_Horario` (`ID_Horario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `ID_Aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT de tabela `alunos_pacotes`
--
ALTER TABLE `alunos_pacotes`
  MODIFY `ID_Aluno_pacote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `ID_Aula` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `ID_Colaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `ID_Curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `ID_Horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `horarios_alunos`
--
ALTER TABLE `horarios_alunos`
  MODIFY `ID_Horario_Aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `ID_Maquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `pacotes`
--
ALTER TABLE `pacotes`
  MODIFY `ID_Pacote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `pacotes_cursos`
--
ALTER TABLE `pacotes_cursos`
  MODIFY `ID_Pacote_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT de tabela `propagandas`
--
ALTER TABLE `propagandas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `ID_Sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `salas_horarios`
--
ALTER TABLE `salas_horarios`
  MODIFY `ID_Sala_Horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `fk_aluno_ultimo_curso` FOREIGN KEY (`Ultimo_curso`) REFERENCES `cursos` (`ID_Curso`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_representante_cpf` FOREIGN KEY (`Responsavel`) REFERENCES `representantes` (`CPF`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_resp_cpf` FOREIGN KEY (`Responsavel`) REFERENCES `representantes` (`CPF`);

--
-- Limitadores para a tabela `alunos_historicos`
--
ALTER TABLE `alunos_historicos`
  ADD CONSTRAINT `fk_alunos_historicos_idaluno` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`ID_Aluno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_alunos_historicos_idcurso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`ID_Curso`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `alunos_pacotes`
--
ALTER TABLE `alunos_pacotes`
  ADD CONSTRAINT `fk_ID_Aluno` FOREIGN KEY (`ID_Aluno`) REFERENCES `alunos` (`ID_Aluno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ID_Pacote` FOREIGN KEY (`ID_Pacote`) REFERENCES `pacotes` (`ID_Pacote`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `aluno_curso_progressos`
--
ALTER TABLE `aluno_curso_progressos`
  ADD CONSTRAINT `fk_progresso_id_aluno` FOREIGN KEY (`ID_Aluno`) REFERENCES `alunos` (`ID_Aluno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_progresso_id_curso` FOREIGN KEY (`ID_Curso`) REFERENCES `cursos` (`ID_Curso`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `aluno_testes`
--
ALTER TABLE `aluno_testes`
  ADD CONSTRAINT `fk_aluno_teste_idaluno` FOREIGN KEY (`ID_Aluno`) REFERENCES `alunos` (`ID_Aluno`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_aluno_teste_idcurso` FOREIGN KEY (`ID_Curso`) REFERENCES `cursos` (`ID_Curso`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_aula_id_curso` FOREIGN KEY (`ID_Curso`) REFERENCES `cursos` (`ID_Curso`);

--
-- Limitadores para a tabela `historicos`
--
ALTER TABLE `historicos`
  ADD CONSTRAINT `fk_historico_idaluno` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`ID_Aluno`),
  ADD CONSTRAINT `fk_historico_idcurso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`ID_Curso`);

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
