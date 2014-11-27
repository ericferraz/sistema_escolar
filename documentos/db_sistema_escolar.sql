-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Nov-2014 às 06:57
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sistema_escolar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `registro_matricula` varchar(45) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nome_pai` varchar(60) DEFAULT NULL,
  `nome_mae` varchar(60) NOT NULL,
  `id_municipio_aluno` int(11) DEFAULT NULL,
  `nome_aluno` varchar(60) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `fk_alunos_municipios1_idx` (`id_municipio_aluno`),
  KEY `id_municipio_aluno` (`id_municipio_aluno`),
  KEY `registro_matricula` (`registro_matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `registro_matricula`, `data_nascimento`, `nome_pai`, `nome_mae`, `id_municipio_aluno`, `nome_aluno`) VALUES
(11, '223443', '2014-11-17', 'Luciano(boi)', 'Daine(vaca)', 2, 'Carlos Daniel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome_curso` varchar(150) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome_curso`) VALUES
(1, 'analise e desenvolvimento de sistemas'),
(2, 'segurança da informação'),
(3, 'Jogos digitais'),
(4, 'inteligência artificial'),
(5, 'ensino fundamental');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nome_estado` varchar(45) NOT NULL,
  `sigla_estado` varchar(3) NOT NULL,
  `id_pais_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `fk_estados_paises_idx` (`id_pais_estado`),
  KEY `id_pais_estado` (`id_pais_estado`),
  KEY `id_pais_estado_2` (`id_pais_estado`),
  KEY `id_estado` (`id_estado`),
  KEY `id_pais_estado_4` (`id_pais_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id_estado`, `nome_estado`, `sigla_estado`, `id_pais_estado`) VALUES
(5, 'Bahia', 'BA', 5),
(6, 'Paraná', 'PR', 5),
(9, 'São Paulo', 'SP', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
  `id_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `data_matricula` date NOT NULL,
  `id_aluno_matricula` int(11) NOT NULL,
  `id_turma_matricula` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_matricula`),
  KEY `fk_matriculas_alunos1_idx` (`id_aluno_matricula`),
  KEY `fk_matriculas_turmas1_idx` (`id_turma_matricula`),
  KEY `id_aluno_matricula` (`id_aluno_matricula`),
  KEY `id_turma_matricula` (`id_turma_matricula`),
  KEY `id_matricula` (`id_matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`id_matricula`, `data_matricula`, `id_aluno_matricula`, `id_turma_matricula`) VALUES
(17, '2014-11-24', 11, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `nome_municipio` varchar(45) NOT NULL,
  `id_estado_municipio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `fk_municipios_estados1_idx` (`id_estado_municipio`),
  KEY `id_estado_municipio` (`id_estado_municipio`),
  KEY `id_municipio` (`id_municipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `municipios`
--

INSERT INTO `municipios` (`id_municipio`, `nome_municipio`, `id_estado_municipio`) VALUES
(2, 'Londrina', 6),
(4, 'Ourinhos', 9),
(5, 'Jacarezinho', 6),
(6, 'Bauru', 9),
(7, 'Canitar', 9),
(8, 'Piraju', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pais` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pais`),
  KEY `id_pais` (`id_pais`),
  KEY `id_pais_2` (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `paises`
--

INSERT INTO `paises` (`id_pais`, `nome_pais`) VALUES
(2, 'eua'),
(3, 'canadá'),
(5, 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE IF NOT EXISTS `turmas` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `nome_turma` varchar(150) NOT NULL,
  `id_curso_turma` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_turma`),
  KEY `fk_turmas_cursos1_idx` (`id_curso_turma`),
  KEY `id_turma` (`id_turma`),
  KEY `id_curso_turma` (`id_curso_turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `nome_turma`, `id_curso_turma`) VALUES
(1, 'ads', 1),
(3, 'segurança noturno', 2),
(4, '1º semestre 2015 manhã', 3),
(5, 'ads vespertino', 1),
(6, '1º semestre 2015 vespertino', 1),
(7, 'me. ciência da computação', 4),
(8, '3ªserie c', 5);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `fk_alunos_municipios1` FOREIGN KEY (`id_municipio_aluno`) REFERENCES `municipios` (`id_municipio`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `fk_estados_paises` FOREIGN KEY (`id_pais_estado`) REFERENCES `paises` (`id_pais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `fk_matriculas_alunos1` FOREIGN KEY (`id_aluno_matricula`) REFERENCES `alunos` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_matriculas_turmas1` FOREIGN KEY (`id_turma_matricula`) REFERENCES `turmas` (`id_turma`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `fk_municipios_estados1` FOREIGN KEY (`id_estado_municipio`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `fk_turmas_cursos1` FOREIGN KEY (`id_curso_turma`) REFERENCES `cursos` (`id_curso`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
