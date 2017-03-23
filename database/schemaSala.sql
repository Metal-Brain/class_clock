DROP DATABASE IF EXISTS CLASSCLOCK;
CREATE DATABASE IF NOT EXISTS CLASSCLOCK;

USE CLASSCLOCK

CREATE TABLE IF NOT EXISTS Sala(
  id                 INT           NOT NULL AUTO_INCREMENT,
  nSala              VARCHAR(5)    NOT NULL,
  capMax             INT           NOT NULL,
  tipo               VARCHAR(45)   NOT NULL,
  status             BOOLEAN       NOT NULL  DEFAULT TRUE,

  PRIMARY KEY(id)
);
