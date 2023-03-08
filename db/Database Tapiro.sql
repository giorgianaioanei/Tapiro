CREATE TABLE utenti(
	id SMALLINT AUTO_INCREMENT PRIMARY KEY,
	nome varchar(50) NOT NULL,
	cognome varchar(50) NOT NULL,
	email varchar(100) NOT NULL UNIQUE,
	password varchar(100) NOT NULL,
	cookie varchar(100),
	endcookie datetime DEFAULT NULL
);