-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Mar-2022 às 02:05
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
-- Banco de dados: `mega_quiz`
--
CREATE DATABASE IF NOT EXISTS `mega_quiz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mega_quiz`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cinema`
--

DROP TABLE IF EXISTS `cinema`;
CREATE TABLE IF NOT EXISTS `cinema` (
  `perguntas` text NOT NULL,
  `respostas` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cinema`
--

INSERT INTO `cinema` (`perguntas`, `respostas`, `id`) VALUES
('Qual o melhor filme do Mundo?', 'O filme de Jesus', 1),
('Qual o ator mais famoso do mundo?', 'Mike Wasalsky', 2),
('Qual é o filme que nunca terá a oportunnidade de assistir?', 'O filme que voçê nuna verá', 3),
('Qual a atriz mais linda do mundo?', 'Priscilla Ferro', 4),
('Qual o foi o momento épico do mundo cinematográfico?', 'Nenhum', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `compras_id` int(11) NOT NULL,
  `compradores_id` int(11) NOT NULL,
  KEY `compras_id` (`compras_id`),
  KEY `compradores_id` (`compradores_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`compras_id`, `compradores_id`) VALUES
(1, 2),
(1, 4),
(2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `esporte`
--

DROP TABLE IF EXISTS `esporte`;
CREATE TABLE IF NOT EXISTS `esporte` (
  `perguntas` text NOT NULL,
  `respostas` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `esporte`
--

INSERT INTO `esporte` (`perguntas`, `respostas`, `id`) VALUES
('Qual o melhor jogador de futebol do mundo?', 'Cristiano Ronaldo', 1),
('Qual o jogador de futebol mais famoso do mundo?', 'Lionel Andress Messi', 2),
('Qual é o maior time de basquete dos EUA?', 'Lackers', 3),
('Onde se situa o maior estádio de futebol do mundo?', 'Brasil', 4),
('Qual o melhor jogador de tênis de mesa do Brasil?', 'Pablo Wasderf', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filosofia`
--

DROP TABLE IF EXISTS `filosofia`;
CREATE TABLE IF NOT EXISTS `filosofia` (
  `perguntas` text NOT NULL,
  `respostas` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `filosofia`
--

INSERT INTO `filosofia` (`perguntas`, `respostas`, `id`) VALUES
('A que se asemelha a vida?', 'Uma neblina', 1),
('Qual é o certo?', 'O certo', 2),
('Onde está o reto caminho', 'Na tua frente', 3),
('Qual é o errado?', 'O errado', 4),
('Quem o caminho?', 'Jesus', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `geral`
--

DROP TABLE IF EXISTS `geral`;
CREATE TABLE IF NOT EXISTS `geral` (
  `perguntas` text NOT NULL,
  `respostas` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `geral`
--

INSERT INTO `geral` (`perguntas`, `respostas`, `id`) VALUES
('Quantos livros tem a Bíblia?', '66', 1),
('Quantos livros tem respectivamente o Antigo Testamento e, o Novo Testamento?', '39 e 27', 2),
('Quem é o maior programador do mundo?', 'Bil Gates', 3),
('Quem é o maior sonhador do mundo?', 'Mike D. Pascal', 4),
('Quem será o maior programador deste século?', 'Aquele que quiser', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `math_fisica`
--

DROP TABLE IF EXISTS `math_fisica`;
CREATE TABLE IF NOT EXISTS `math_fisica` (
  `perguntas` text NOT NULL,
  `respostas` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `math_fisica`
--

INSERT INTO `math_fisica` (`perguntas`, `respostas`, `id`) VALUES
('Raiz quadrada de 9:', '3', 1),
('3!:', '6', 2),
('2 + 2:', '4', 3),
('raiz cubo de 3:', '27', 4),
('7 elevado a 0:', '1', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asks_cards` text NOT NULL,
  `answers_cards` text NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `shop`
--

INSERT INTO `shop` (`id`, `asks_cards`, `answers_cards`, `level`) VALUES
(1, 'Quem é Mike D. Pascal?', 'Um doidão!', 0),
(2, 'O que o Rasmus diz para o PHP?', 'Eu sou teu pai!', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `image_profile` varchar(70) NOT NULL,
  `moedas` int(11) NOT NULL DEFAULT '0',
  `xp` int(11) NOT NULL DEFAULT '0',
  `level` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `acertos` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `senha` (`senha`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `sobrenome`, `email`, `senha`, `user_name`, `image_profile`, `moedas`, `xp`, `level`, `acertos`) VALUES
(2, 'Mike', 'Pascal', 'mikepascal.delta@gmail.com', '202cb962ac59075b964b07152d234b70', 'Mike9_73', '1646685897.jpg', 76, 60, 0, 0),
(4, 'Maria Eduarda', 'Santos', 'mariaduda@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Maria_db', '1646686590.jpg', 25, 13, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
