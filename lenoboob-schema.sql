DROP DATABASE IF EXISTS lenoboob;
CREATE DATABASE lenoboob;
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
	feed_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
	person_id SMALLINT UNSIGNED NOT NULL,
	content	TEXT,
	PRIMARY KEY (feed_id),
	FOREIGN KEY (person_id) REFERENCES auth(person_id)
);
