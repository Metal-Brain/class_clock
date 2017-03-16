CREATE DATABASE classclock;

USE classclock;

CREATE TABLE IF NOT EXISTS DISCIPLINAS(
 idDisciplina INT NOT NULL AUTO_INCREMENT,
 nomeDisciplina VARCHAR(45) NOT NULL,
 sigla CHAR(3) NOT NULL,
 nProfessores INT NOT NULL,
 
 PRIMARY KEY (idDisciplina) 
);

