CREATE DATABASE `netland`;

USE `netland`;

CREATE TABLE `gebruikers` (
	id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    wachtwoord VARCHAR(100) NOT NULL
);

INSERT INTO gebruikers(username,wachtwoord) VALUES ('test-user','w@achtwoord');