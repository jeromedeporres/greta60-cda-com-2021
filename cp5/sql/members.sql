-- Création du script pour la gestion des membres
DROP DATABASE IF EXISTS greta60
;

CREATE DATABASE greta60
;

USE greta60
;

CREATE TABLE users(
	uid SMALLINT PRIMARY KEY AUTO_INCREMENT,
	pseudo VARCHAR(20) NOT NULL,
	mail VARCHAR(255) NOT NULL UNIQUE,
	pass VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=UTF8
;