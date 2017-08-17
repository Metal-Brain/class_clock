CREATE DATABASE IF NOT EXISTS `horario`;

USE `horario`;

CREATE TABLE IF NOT EXISTS `horario`.`grau` (
  `idGrau` TINYINT NOT NULL AUTO_INCREMENT,
  `graucol` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idGrau`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `horario`.`curso` (
  `idCurso` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `idGrau` TINYINT NOT NULL,
  `nomeCurso` VARCHAR(75) NOT NULL,
  `siglaCurso` CHAR(5) NOT NULL,
  `qtdSemestre` TINYINT(2) NOT NULL,
  `fechamento` CHAR(1) NOT NULL,
  PRIMARY KEY (`idCurso`),
  INDEX `fk_curso_grau1_idx` (`idGrau` ASC),
  CONSTRAINT `fk_curso_grau1`
    FOREIGN KEY (`idGrau`)
    REFERENCES `horario`.`grau` (`idGrau`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `horario`.`disciplina` (
  `idDisciplina` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `idCurso` SMALLINT(6) NOT NULL,
  `nomeDisciplina` VARCHAR(50) NOT NULL,
  `siglaDisciplina` CHAR(5) NOT NULL,
  `modulo` TINYINT(2) NOT NULL,
  `qtdProfessor` TINYINT(1) NOT NULL,
  `cargaSemanal` TINYINT(2) NOT NULL,
  PRIMARY KEY (`idDisciplina`),
  INDEX `fk_disciplina_curso1_idx` (`idCurso` ASC),
  CONSTRAINT `fk_disciplina_curso1`
    FOREIGN KEY (`idCurso`)
    REFERENCES `horario`.`curso` (`idCurso`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `horario`.`turno` (
  `idTurno` TINYINT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`idTurno`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `horario`.`horario` (
  `idHorario` TINYINT NOT NULL AUTO_INCREMENT,
  `idTurno` TINYINT NOT NULL,
  `inicio` TIME NOT NULL,
  `fim` TIME NOT NULL,
  PRIMARY KEY (`idHorario`),
  INDEX `fk_horario_turno_idx` (`idTurno` ASC),
  CONSTRAINT `fk_horario_turno`
    FOREIGN KEY (`idTurno`)
    REFERENCES `horario`.`turno` (`idTurno`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `horario`.`tipoSala` (
  `idTipoSala` TINYINT NOT NULL AUTO_INCREMENT,
  `nomoTipoSala` VARCHAR(30) NOT NULL,
  `descricaoTipoSala` VARCHAR(254) NOT NULL,
  PRIMARY KEY (`idTipoSala`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `horario`.`tipoSalaDisciplina` (
  `idTipoSala` TINYINT NOT NULL,
  `idDisciplina` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`idTipoSala`, `idDisciplina`),
  INDEX `fk_tipoSala_has_disciplina_disciplina1_idx` (`idDisciplina` ASC),
  INDEX `fk_tipoSala_has_disciplina_tipoSala1_idx` (`idTipoSala` ASC),
  CONSTRAINT `fk_tipoSala_has_disciplina_tipoSala1`
    FOREIGN KEY (`idTipoSala`)
    REFERENCES `horario`.`tipoSala` (`idTipoSala`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tipoSala_has_disciplina_disciplina1`
    FOREIGN KEY (`idDisciplina`)
    REFERENCES `horario`.`disciplina` (`idDisciplina`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
