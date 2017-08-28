-- -----------------------------------------------------
-- Schema horario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `horario` DEFAULT CHARACTER SET latin1 ;
USE `horario` ;

-- -----------------------------------------------------
-- Table `horario`.`grau`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `horario`.`grau` (
  `id` TINYINT NOT NULL AUTO_INCREMENT,
  `codigo` TINYINT(6) NOT NULL UNIQUE,
  `nome_grau` VARCHAR(50) NOT NULL,
  `codigo` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `horario`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `horario`.`curso` (
  `id` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `grau_id` TINYINT NOT NULL,
  `nome_curso` VARCHAR(75) NOT NULL,
  `sigla_curso` CHAR(5) NOT NULL,
  `qtd_semestre` TINYINT(2) NOT NULL,
  `fechamento` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_curso_grau1_idx` (`grau_id` ASC),
  CONSTRAINT `fk_curso_grau1`
    FOREIGN KEY (`grau_id`)
    REFERENCES `horario`.`grau` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `horario`.`disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `horario`.`disciplina` (
  `id` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `curso_id` SMALLINT(6) NOT NULL,
  `nome_disciplina` VARCHAR(50) NOT NULL,
  `sigla_disciplina` CHAR(5) NOT NULL,
  `modulo` TINYINT(2) NOT NULL,
  `qtd_professor` TINYINT(1) NOT NULL,
  `carga_semanal` TINYINT(2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_disciplina_curso1_idx` (`curso_id` ASC),
  CONSTRAINT `fk_disciplina_curso1`
    FOREIGN KEY (`curso_id`)
    REFERENCES `horario`.`curso` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `horario`.`turno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `horario`.`turno` (
  `id` TINYINT NOT NULL AUTO_INCREMENT,
  `nome_turno` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `horario`.`horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `horario`.`horario` (
  `id` TINYINT NOT NULL AUTO_INCREMENT,
  `turno_id` TINYINT NOT NULL,
  `inicio` TIME NOT NULL,
  `fim` TIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_horario_turno_idx` (`turno_id` ASC),
  CONSTRAINT `fk_horario_turno`
    FOREIGN KEY (`turno_id`)
    REFERENCES `horario`.`turno` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `horario`.`tipo_sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `horario`.`tipo_sala` (
  `id` TINYINT NOT NULL AUTO_INCREMENT,
  `nome_tipo_sala` VARCHAR(30) NOT NULL,
  `descricao_tipo_sala` VARCHAR(254) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;