USE geolocalizacao;

DROP TABLE IF EXISTS instituicao;

CREATE TABLE instituicao (
  id int(10) NOT NULL AUTO_INCREMENT,
  id_estado smallint(2) DEFAULT NULL,
  nome varchar(120) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY id_estado (id_estado),
  CONSTRAINT instituicao_ibfk_1 FOREIGN KEY (id_estado) REFERENCES estados (id)
);

LOCK TABLES instituicao WRITE;

INSERT INTO instituicao VALUES (1,16,'GAECO');

UNLOCK TABLES;
