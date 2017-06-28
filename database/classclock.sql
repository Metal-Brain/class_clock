-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jun-2017 às 14:51
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classclock`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `competencia`
--

CREATE TABLE `competencia` (
  `idProfessor` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `interesse` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `competencia`
--

INSERT INTO `competencia` (`idProfessor`, `idDisciplina`, `interesse`, `active`) VALUES
(3, 1, 0, 1),
(3, 2, 0, 1),
(3, 4, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`id`, `nome`) VALUES
(1, 'Exclusiva'),
(2, 'Integral'),
(3, 'Parcial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenadorde`
--

CREATE TABLE `coordenadorde` (
  `idCoordenador` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `coordenadorde`
--

INSERT INTO `coordenadorde` (`idCoordenador`, `idProfessor`) VALUES
(3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sigla` varchar(5) NOT NULL,
  `qtdSemestres` int(11) NOT NULL,
  `grau` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `sigla`, `qtdSemestres`, `grau`, `status`) VALUES
(1, 'ANÁLISE E DESENVOLVIMENTO DE SISTEMAS', 'ADS', 6, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso_tem_disciplina`
--

CREATE TABLE `curso_tem_disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso_tem_disciplina`
--

INSERT INTO `curso_tem_disciplina` (`idDisciplina`, `idCurso`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso_tem_periodo`
--

CREATE TABLE `curso_tem_periodo` (
  `idCurso` int(11) NOT NULL,
  `idPeriodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso_tem_periodo`
--

INSERT INTO `curso_tem_periodo` (`idCurso`, `idPeriodo`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sigla` varchar(5) NOT NULL,
  `qtdProf` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `qtdAulas` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`, `sigla`, `qtdProf`, `semestre`, `qtdAulas`, `status`) VALUES
(1, 'Lógica De Programação', 'LOP', 1, 1, 4, 1),
(2, 'MATEMÁTICA DISCRETA', 'MAD', 1, 1, 4, 1),
(3, 'PROGRAMAÇÃO 1', 'PROG1', 1, 1, 4, 1),
(4, 'PROGRAMAÇÃO 2', 'PROG2', 1, 1, 4, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `disciplinasigla`
-- (See below for the actual view)
--
CREATE TABLE `disciplinasigla` (
`idProfessor` int(11)
,`id` int(11)
,`nome` varchar(53)
,`sigla` varchar(5)
,`qtdProf` int(11)
,`semestre` int(11)
,`qtdAulas` int(11)
,`status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disponibilidade`
--

CREATE TABLE `disponibilidade` (
  `id` int(11) NOT NULL,
  `idPeriodo` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `dia` varchar(45) NOT NULL,
  `inicio` time NOT NULL,
  `fim` time NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `hasDisponibilidade` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disponibilidade`
--

INSERT INTO `disponibilidade` (`id`, `idPeriodo`, `idProfessor`, `dia`, `inicio`, `fim`, `status`, `hasDisponibilidade`) VALUES
(1, 3, 3, 'segunda', '19:00:00', '20:00:00', 1, 1),
(2, 3, 3, 'segunda', '20:00:00', '21:00:00', 1, 1),
(3, 3, 3, 'segunda', '21:00:00', '22:00:00', 1, 1),
(4, 3, 3, 'segunda', '22:00:00', '23:00:00', 1, 1),
(5, 3, 3, 'terça', '19:00:00', '20:00:00', 1, 1),
(6, 3, 3, 'terça', '20:00:00', '21:00:00', 1, 1),
(7, 3, 3, 'terça', '21:00:00', '22:00:00', 1, 1),
(8, 3, 3, 'terça', '22:00:00', '23:00:00', 1, 1),
(9, 3, 3, 'quarta', '19:00:00', '20:00:00', 1, 1),
(10, 3, 3, 'quarta', '20:00:00', '21:00:00', 1, 1),
(11, 3, 3, 'quarta', '21:00:00', '22:00:00', 1, 1),
(12, 3, 3, 'quarta', '22:00:00', '23:00:00', 1, 1),
(13, 3, 3, 'quinta', '19:00:00', '20:00:00', 1, 1),
(14, 3, 3, 'quinta', '21:00:00', '22:00:00', 1, 1),
(15, 3, 3, 'quinta', '20:00:00', '21:00:00', 1, 1),
(16, 3, 3, 'quinta', '22:00:00', '23:00:00', 1, 1),
(17, 3, 3, 'sexta', '19:00:00', '20:00:00', 1, 1),
(18, 3, 3, 'sexta', '20:00:00', '21:00:00', 1, 1),
(19, 3, 3, 'sexta', '21:00:00', '22:00:00', 1, 1),
(20, 3, 3, 'sexta', '22:00:00', '23:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grau`
--

CREATE TABLE `grau` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grau`
--

INSERT INTO `grau` (`id`, `nome`) VALUES
(1, 'Bacharel'),
(2, 'Especialização (Pós-Graduação)'),
(3, 'Licenciatura'),
(4, 'Técnico'),
(5, 'Tecnólogo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id`, `nome`) VALUES
(1, 'Graduação'),
(2, 'Pós-Graduação'),
(3, 'Mestrado'),
(4, 'Doutorado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo`
--

CREATE TABLE `periodo` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `periodo`
--

INSERT INTO `periodo` (`id`, `nome`) VALUES
(1, 'Matutino'),
(2, 'Vespertino'),
(3, 'Noturno'),
(4, 'Integral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `idCurso` int(11) DEFAULT NULL,
  `nascimento` date NOT NULL,
  `coordenador` tinyint(1) NOT NULL DEFAULT '0',
  `idContrato` int(11) NOT NULL,
  `idNivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `idCurso`, `nascimento`, `coordenador`, `idContrato`, `idNivel`) VALUES
(3, 1, '1988-07-13', 1, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nSala` varchar(5) NOT NULL,
  `capMax` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`id`, `nSala`, `capMax`, `tipo`, `status`) VALUES
(1, '110', 30, 'Teórica', 1),
(2, '112', 30, 'Laboratório', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `sigla` char(10) NOT NULL,
  `qtdAlunos` int(11) NOT NULL,
  `dp` tinyint(1) NOT NULL DEFAULT '0',
  `disciplina` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `sigla`, `qtdAlunos`, `dp`, `disciplina`, `status`) VALUES
(1, 'ADSS1', 25, 0, 1, 1),
(2, 'ADSS2', 25, 0, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `matricula` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` char(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `dae` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `matricula`, `email`, `senha`, `status`, `dae`) VALUES
(1, 'admin', 'cg123456', 'admin@admin.com', '46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5', 1, 0),
(2, 'dae', 'cg654321', 'dae@dae.com', '46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5', 1, 1),
(3, 'Bruno ', 'CD654321', 'brunojp.rangel@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 0);

-- --------------------------------------------------------

--
-- Structure for view `disciplinasigla`
--
DROP TABLE IF EXISTS `disciplinasigla`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `disciplinasigla`  AS  select `competencia`.`idProfessor` AS `idProfessor`,`disciplina`.`id` AS `id`,concat(`disciplina`.`nome`,' (',`disciplina`.`sigla`,')') AS `nome`,`disciplina`.`sigla` AS `sigla`,`disciplina`.`qtdProf` AS `qtdProf`,`disciplina`.`semestre` AS `semestre`,`disciplina`.`qtdAulas` AS `qtdAulas`,`disciplina`.`status` AS `status` from (`competencia` join `disciplina` on((`disciplina`.`id` = `competencia`.`idDisciplina`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competencia`
--
ALTER TABLE `competencia`
  ADD PRIMARY KEY (`idProfessor`,`idDisciplina`),
  ADD KEY `idDisciplina` (`idDisciplina`);

--
-- Indexes for table `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordenadorde`
--
ALTER TABLE `coordenadorde`
  ADD PRIMARY KEY (`idCoordenador`,`idProfessor`),
  ADD KEY `fk_coordenadorde_professor` (`idProfessor`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD UNIQUE KEY `sigla` (`sigla`),
  ADD KEY `fk_curso_grau` (`grau`);

--
-- Indexes for table `curso_tem_disciplina`
--
ALTER TABLE `curso_tem_disciplina`
  ADD KEY `fk_disciplina_curso` (`idDisciplina`),
  ADD KEY `fk_curso_disciplina` (`idCurso`);

--
-- Indexes for table `curso_tem_periodo`
--
ALTER TABLE `curso_tem_periodo`
  ADD PRIMARY KEY (`idCurso`,`idPeriodo`),
  ADD KEY `fk_periodo_curso` (`idPeriodo`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sigla` (`sigla`);

--
-- Indexes for table `disponibilidade`
--
ALTER TABLE `disponibilidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPeriodo` (`idPeriodo`),
  ADD KEY `idProfessor` (`idProfessor`);

--
-- Indexes for table `grau`
--
ALTER TABLE `grau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_professor_contrato` (`idContrato`),
  ADD KEY `fk_professor_nivel` (`idNivel`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nSala` (`nSala`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sigla` (`sigla`),
  ADD KEY `fk_turma_disciplina` (`disciplina`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `disponibilidade`
--
ALTER TABLE `disponibilidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `grau`
--
ALTER TABLE `grau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `competencia`
--
ALTER TABLE `competencia`
  ADD CONSTRAINT `competencia_ibfk_1` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`),
  ADD CONSTRAINT `competencia_ibfk_2` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`);

--
-- Limitadores para a tabela `coordenadorde`
--
ALTER TABLE `coordenadorde`
  ADD CONSTRAINT `fk_coordenadorde_coordenador` FOREIGN KEY (`idCoordenador`) REFERENCES `professor` (`id`),
  ADD CONSTRAINT `fk_coordenadorde_professor` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`);

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_grau` FOREIGN KEY (`grau`) REFERENCES `grau` (`id`);

--
-- Limitadores para a tabela `curso_tem_disciplina`
--
ALTER TABLE `curso_tem_disciplina`
  ADD CONSTRAINT `fk_curso_disciplina` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `fk_disciplina_curso` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`);

--
-- Limitadores para a tabela `curso_tem_periodo`
--
ALTER TABLE `curso_tem_periodo`
  ADD CONSTRAINT `fk_curso_periodo` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `fk_periodo_curso` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo` (`id`);

--
-- Limitadores para a tabela `disponibilidade`
--
ALTER TABLE `disponibilidade`
  ADD CONSTRAINT `disponibilidade_ibfk_1` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo` (`id`),
  ADD CONSTRAINT `disponibilidade_ibfk_2` FOREIGN KEY (`idProfessor`) REFERENCES `professor` (`id`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_contrato` FOREIGN KEY (`idContrato`) REFERENCES `contrato` (`id`),
  ADD CONSTRAINT `fk_professor_nivel` FOREIGN KEY (`idNivel`) REFERENCES `nivel` (`id`),
  ADD CONSTRAINT `fk_professor_usuario` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_turma_disciplina` FOREIGN KEY (`disciplina`) REFERENCES `disciplina` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
