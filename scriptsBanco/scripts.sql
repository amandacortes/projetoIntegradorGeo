-- Crie na ordem para não dar erro de FK

-- Table Patente

CREATE TABLE patente(
	id SMALLINT(4) Primary Key NOT NULL AUTO_INCREMENT,
	nome VARCHAR(100)
);

-- Table Estado

CREATE TABLE estado(
	id SMALLINT(2) Primary Key NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50),
    sigla char(2),
    CONSTRAINT nome_unique UNIQUE (nome) 
);

-- Table ERB

CREATE TABLE erb(
	id int(11) Primary Key NOT NULL AUTO_INCREMENT,
    id_estado SMALLINT(2),
    latitue FLOAT,
    longitude FLOAT,
    FOREIGN KEY (id_estado) REFERENCES estado (id)
);

-- Table Instituição

CREATE TABLE instituicao(
	id INT(10) Primary Key NOT NULL AUTO_INCREMENT,
	id_estado SMALLINT(2),
	nome VARCHAR(120),
	FOREIGN KEY (id_estado) REFERENCES estado (id)    
);

-- Table Usuario

CREATE TABLE usuario(
	id INT(11) Primary Key NOT NULL AUTO_INCREMENT,
	rg VARCHAR(25) NOT NULL,
	id_patente SMALLINT(4),
	id_instituicao INT(10),
	nome VARCHAR(120),
	email VARCHAR(200),
	senha VARCHAR(32),
	permissao SMALLINT(1),
	ativo BOOL,
	FOREIGN KEY (id_patente) REFERENCES patente (id),
	FOREIGN KEY (id_instituicao) REFERENCES instituicao (id)
);