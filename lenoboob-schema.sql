DROP SCHEMA IF EXISTS lenoboob;
CREATE SCHEMA lenoboob;
USE lenoboob;

CREATE TABLE auth (
	person_id	SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(45) NOT NULL,
	email VARCHAR(45) NOT NULL,
	pssword	 VARCHAR(20) NOT NULL,
	phone_no VARCHAR(20) NOT NULL,
	PRIMARY KEY (person_id)
);

CREATE TABLE feeds (
	person_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	content	TEXT,
	FOREIGN KEY (person_id) REFERENCES auth(person_id)
);