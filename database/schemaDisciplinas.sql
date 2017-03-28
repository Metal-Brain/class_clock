DROP DATABASE IF EXISTS CLASSCLOCK;
CREATE DATABASE IF NOT EXISTS CLASSCLOCK;

USE CLASSCLOCK;

CREATE TABLE IF NOT EXISTS Disciplina(
 id                 INT           NOT NULL  AUTO_INCREMENT,
 nome               VARCHAR(45)   NOT NULL,
 sigla              VARCHAR(5)    NOT NULL,
 qtdProf            INT           NOT NULL,
 status             BOOLEAN       NOT NULL  DEFAULT TRUE,
 PRIMARY KEY (id)
);
