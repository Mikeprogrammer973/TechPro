-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Maio-2022 às 05:03
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pronote`
--
CREATE DATABASE IF NOT EXISTS `pronote` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pronote`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms`
--

DROP TABLE IF EXISTS `adms`;
CREATE TABLE IF NOT EXISTS `adms` (
  `code_adm` varchar(100) NOT NULL,
  `nome_completo` varchar(120) NOT NULL,
  `foto_perfil_adm` varchar(120) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'C',
  UNIQUE KEY `code_adm` (`code_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adms`
--

INSERT INTO `adms` (`code_adm`, `nome_completo`, `foto_perfil_adm`, `status`) VALUES
('maria_db', 'Maria Santos', 'eu.png', 'C'),
('mike_973', 'Mike Pascal', 'eu.png', 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `code_escola` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `nome_completo` varchar(120) NOT NULL,
  `code_turma` varchar(100) NOT NULL,
  `foto_perfil_aluno` varchar(120) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'C',
  UNIQUE KEY `matricula` (`matricula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`code_escola`, `matricula`, `nome_completo`, `code_turma`, `foto_perfil_aluno`, `status`) VALUES
('PB_007', '123581321', 'Priscilla Ferro', 'TPB_001', 'aluno.png', 'C'),
('PB_007', '1501203005', 'Hope Morningstar Pascal', 'TPB_001', 'aluno.png', 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos_prof`
--

DROP TABLE IF EXISTS `cargos_prof`;
CREATE TABLE IF NOT EXISTS `cargos_prof` (
  `code_escola` varchar(100) NOT NULL,
  `code_turma` varchar(100) NOT NULL,
  `code_prof` varchar(100) NOT NULL,
  `code_disciplina` varchar(100) NOT NULL,
  `nome_disciplina` varchar(120) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'C',
  UNIQUE KEY `code_disciplina` (`code_disciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos_prof`
--

INSERT INTO `cargos_prof` (`code_escola`, `code_turma`, `code_prof`, `code_disciplina`, `nome_disciplina`, `status`) VALUES
('PB_007', 'TPB_001', 'PPB_001', 'DPB_001', 'Matemática', 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas`
--

DROP TABLE IF EXISTS `escolas`;
CREATE TABLE IF NOT EXISTS `escolas` (
  `code_escola` varchar(100) NOT NULL,
  `nome_escola` varchar(120) NOT NULL,
  `tipo_periodo` varchar(120) NOT NULL DEFAULT 'Semestre',
  `qtd_periodo` int(11) NOT NULL DEFAULT '2',
  `foto_perfil_escola` varchar(120) NOT NULL,
  `code_adm_escola` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'C',
  UNIQUE KEY `code_escola` (`code_escola`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `escolas`
--

INSERT INTO `escolas` (`code_escola`, `nome_escola`, `tipo_periodo`, `qtd_periodo`, `foto_perfil_escola`, `code_adm_escola`, `status`) VALUES
('PB_007', 'Paulo Bauer', 'Bimestre', 4, 'escola.png', 'maria_db', 'C'),
('WH_007', 'Web Hacker', 'Trimestre', 4, 'escola.png', 'mike_973', 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `info_alunos`
--

DROP TABLE IF EXISTS `info_alunos`;
CREATE TABLE IF NOT EXISTS `info_alunos` (
  `code_escola` varchar(100) NOT NULL,
  `code_turma` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `code_disciplina` varchar(100) NOT NULL,
  `code_prof` varchar(100) NOT NULL,
  `periodo` varchar(120) NOT NULL,
  `code_media` int(11) NOT NULL AUTO_INCREMENT,
  `media` double NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`code_media`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
CREATE TABLE IF NOT EXISTS `mensagens` (
  `code_msg` int(11) NOT NULL,
  `msg` text NOT NULL,
  `destinatario` varchar(100) NOT NULL,
  UNIQUE KEY `code_msg` (`code_msg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas_alunos`
--

DROP TABLE IF EXISTS `notas_alunos`;
CREATE TABLE IF NOT EXISTS `notas_alunos` (
  `code_escola` varchar(100) NOT NULL,
  `code_turma` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `code_disciplina` varchar(100) NOT NULL,
  `code_prof` varchar(100) NOT NULL,
  `periodo` varchar(120) NOT NULL,
  `code_nota` int(11) NOT NULL AUTO_INCREMENT,
  `nota` double NOT NULL,
  `desc_nota` text,
  `status` varchar(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`code_nota`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notas_alunos`
--

INSERT INTO `notas_alunos` (`code_escola`, `code_turma`, `matricula`, `code_disciplina`, `code_prof`, `periodo`, `code_nota`, `nota`, `desc_nota`, `status`) VALUES
('PB_007', 'TPB_001', '123581321', 'DPB_001', 'PPB_001', '1° Bimestre', 1, 9.87, 'Nota da prova sobre as inequações do 2° grau.', 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profs`
--

DROP TABLE IF EXISTS `profs`;
CREATE TABLE IF NOT EXISTS `profs` (
  `code_escola` varchar(100) NOT NULL,
  `code_prof` varchar(100) NOT NULL,
  `nome_completo` varchar(120) NOT NULL,
  `foto_perfil_prof` varchar(120) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'C',
  UNIQUE KEY `code_prof` (`code_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `profs`
--

INSERT INTO `profs` (`code_escola`, `code_prof`, `nome_completo`, `foto_perfil_prof`, `status`) VALUES
('PB_007', 'PPB_001', 'José da Silva Santos', 'prof.png', 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

DROP TABLE IF EXISTS `turmas`;
CREATE TABLE IF NOT EXISTS `turmas` (
  `code_escola` varchar(100) NOT NULL,
  `code_turma` varchar(100) NOT NULL,
  `nome_turma` varchar(120) NOT NULL,
  `foto_perfil_turma` varchar(120) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'C',
  UNIQUE KEY `code_turma` (`code_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`code_escola`, `code_turma`, `nome_turma`, `foto_perfil_turma`, `status`) VALUES
('PB_007', 'TPB_007', '5° Fromager', 'turma.png', 'C');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
