DROP DATABASE CLASSCLOCK;
CREATE DATABASE IF NOT EXISTS CLASSCLOCK;

USE CLASSCLOCK;

CREATE TABLE IF NOT EXISTS Disciplina(
	id             INT         NOT NULL AUTO_INCREMENT,
	nome           VARCHAR(45) NOT NULL,
	sigla          CHAR(3)     NOT NULL,
	nProfessores   INT         NOT NULL,
	status         BOOLEAN     NOT NULL DEFAULT FALSE,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Grau (
  id    INT         NOT NULL AUTO_INCREMENT,
  nome  VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Curso (
  id            INT         NOT NULL AUTO_INCREMENT,
  nome          VARCHAR(45) NOT NULL,
  sigla         CHAR(3)     NOT NULL,
  qtdSemestres  INT         NOT NULL,
  periodo       VARCHAR(45) NOT NULL,
  grau          INT         NOT NULL,
  status        BOOLEAN     NOT NULL  DEFAULT FALSE,
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
