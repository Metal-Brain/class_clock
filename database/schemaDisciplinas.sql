DROP DATABASE IF EXISTS CLASSCLOCK;
CREATE DATABASE IF NOT EXISTS CLASSCLOCK;

USE CLASSCLOCK;

CREATE TABLE IF NOT EXISTS Disciplina(
 idDisciplina       INT           NOT NULL  AUTO_INCREMENT,
 nomeDisciplina     VARCHAR(45)   NOT NULL,
 sigla              CHAR(3)       NOT NULL,
 nProfessores       INT           NOT NULL,
 statusDisciplina   BOOLEAN       NOT NULL  DEFAULT TRUE,
 PRIMARY KEY (idDisciplina)
);
