DROP DATABASE CLASSCLOCK;
CREATE DATABASE IF NOT EXISTS CLASSCLOCK;

USE CLASSCLOCK;

CREATE TABLE IF NOT EXISTS Disciplina(
	id             	INT         NOT NULL AUTO_INCREMENT,
	nome           	VARCHAR(45) NOT NULL,
	sigla          	VARCHAR(5)  NOT NULL,
	qtdProf					INT         NOT NULL,
	`status`       	BOOLEAN     NOT NULL DEFAULT TRUE,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Grau (
  id    INT         NOT NULL AUTO_INCREMENT,
  nome  VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO Grau (nome) VALUES ('Bacharel'),('Especialização (Pós-Graduação)'),('Licenciatura'),('Técnico'),('Tecnólogo');

CREATE TABLE IF NOT EXISTS Periodo (
	id		INT			NOT NULL AUTO_INCREMENT,
	nome	VARCHAR(20)	NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO Periodo (nome) VALUES ('Matutino'),('Vespertino'),('Noturno'),('Integral');

CREATE TABLE IF NOT EXISTS Curso (
  id            INT         NOT NULL AUTO_INCREMENT,
  nome          VARCHAR(45) NOT NULL,
  sigla         VARCHAR(5)  NOT NULL,
  qtdSemestres  INT         NOT NULL,
  grau          INT         NOT NULL,
  `status`      BOOLEAN     NOT NULL  DEFAULT TRUE,
  PRIMARY KEY (id),
  CONSTRAINT fk_curso_grau
    FOREIGN KEY (grau) REFERENCES Grau(id)
);

 CREATE TABLE IF NOT EXISTS Curso_tem_disciplina (
   idDisciplina INT NOT NULL,
   idCurso      INT NOT NULL,
   CONSTRAINT fk_disciplina_curso
    FOREIGN KEY (idDisciplina) REFERENCES Disciplina(id),
   CONSTRAINT fk_curso_disciplina
    FOREIGN KEY (idCurso) REFERENCES Curso(id)
 );

 CREATE TABLE IF NOT EXISTS Curso_tem_Periodo (
	 idCurso			INT NOT NULL,
	 idPeriodo		INT NOT NULL,
	 PRIMARY KEY (idCurso,idPeriodo),
	 CONSTRAINT fk_curso_periodo
	 	FOREIGN KEY (idCurso) REFERENCES Curso(id),
	 CONSTRAINT fk_periodo_curso
	 	FOREIGN KEY (idPeriodo) REFERENCES Periodo(id)
 );
