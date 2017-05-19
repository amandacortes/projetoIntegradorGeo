USE geolocalizacao;
DROP TABLE IF EXISTS usuario;

USE geolocalizacao;
CREATE TABLE usuario (
  id int(11) NOT NULL AUTO_INCREMENT,
  rg varchar(25) NOT NULL,
  id_patente int(100) DEFAULT NULL,
  id_instituicao int(10) DEFAULT NULL,
  id_estado varchar(3) DEFAULT NULL,
  nome varchar(120) DEFAULT NULL,
  email varchar(200) DEFAULT NULL,
  senha varchar(32) DEFAULT NULL,
  permissao int(1) DEFAULT NULL,
  ativo int(1) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY id_patente (id_patente),
  KEY id_instituicao (id_instituicao),
  CONSTRAINT usuario_ibfk_2 FOREIGN KEY (id_instituicao) REFERENCES instituicao (id)
);

LOCK TABLES usuario WRITE;
INSERT INTO usuario
  VALUES (1,'101420370',1,1,16,'Amanda Cortês Rodrigues','amandar.cortes@gmail.com','123456',0,0);

UNLOCK TABLES;