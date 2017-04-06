DROP DATABASE CLASSCLOCK;

CREATE DATABASE IF NOT EXISTS CLASSCLOCK;
  
USE CLASSCLOCK;
  
CREATE TABLE IF NOT EXISTS Disciplina(
	id 					INT NOT NULL 			AUTO_INCREMENT,
	nome 				VARCHAR(45) NOT NULL,
	sigla 				CHAR(3) NOT NULL,
	qtdProf 			INT NOT NULL,
	`status` 			tinyint(1) NOT NULL 	DEFAULT '1',
	PRIMARY KEY(id)
);
    
CREATE TABLE IF NOT EXISTS Grau(
	id 					INT NOT NULL 			AUTO_INCREMENT,
    grau 				VARCHAR(45) NOT NULL,    
    PRIMARY KEY(id)
);
    
CREATE TABLE IF NOT EXISTS Curso(
	id 					INT NOT NULL 			AUTO_INCREMENT,
	nome 				VARCHAR(45) NOT NULL,
    sigla 				CHAR(3) NOT NULL,
    qtdSemestres 		INT NOT NULL,
	periodo 			VARCHAR(45) NOT NULL,
    idGrau 				INT NOT NULL,
    `status` 			tinyint(1) NOT NULL 	DEFAULT '1',   
    PRIMARY KEY(id),    
    FOREIGN KEY(idGrau) REFERENCES Grau(id)
);

CREATE TABLE IF NOT EXISTS Curso_tem_Disciplina(
	idDisciplina 		INT NOT NULL,
    idCurso 			INT NOT NULL,
	PRIMARY KEY(idDisciplina, idCurso),
    FOREIGN KEY(idDisciplina) REFERENCES Disciplina(id),
    FOREIGN KEY(idCurso) REFERENCES Curso(id)
);

CREATE TABLE IF NOT EXISTS Sala(
	id 					INT NOT NULL 			AUTO_INCREMENT,
	nSala 				VARCHAR(5) NOT NULL,
	capMax			 	INT NOT NULL,
	tipo 				VARCHAR(45),
	`status` 			tinyint(1) NOT NULL 	DEFAULT '1',
	PRIMARY KEY(id)
);