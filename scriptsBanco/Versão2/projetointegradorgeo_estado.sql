USE geolocalizacao;
DROP TABLE IF EXISTS estados;
CREATE TABLE estados (
  id smallint(2) NOT NULL AUTO_INCREMENT,
  nome varchar(50) DEFAULT NULL,
  sigla char(2) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY nome_unique (nome)
);

LOCK TABLES estados WRITE;

INSERT INTO estados (sigla, nome) VALUES ('AC', 'Acre');
INSERT INTO estados (sigla, nome) VALUES ('AL', 'Alagoas');
INSERT INTO estados (sigla, nome) VALUES ('AP', 'Amapá');
INSERT INTO estados (sigla, nome) VALUES ('AM', 'Amazonas');
INSERT INTO estados (sigla, nome) VALUES ('BA', 'Bahia');
INSERT INTO estados (sigla, nome) VALUES ('CE', 'Ceará');
INSERT INTO estados (sigla, nome) VALUES ('DF', 'Distrito Federal');
INSERT INTO estados (sigla, nome) VALUES ('ES', 'Espírito Santo');
INSERT INTO estados (sigla, nome) VALUES ('GO', 'Goiás');
INSERT INTO estados (sigla, nome) VALUES ('MA', 'Maranhão');
INSERT INTO estados (sigla, nome) VALUES ('MT', 'Mato Grosso');
INSERT INTO estados (sigla, nome) VALUES ('MS', 'Mato Grosso do Sul');
INSERT INTO estados (sigla, nome) VALUES ('MG', 'Minas Gerais');
INSERT INTO estados (sigla, nome) VALUES ('PA', 'Pará');
INSERT INTO estados (sigla, nome) VALUES ('PB', 'Paraíba');
INSERT INTO estados (sigla, nome) VALUES ('PR', 'Paraná');
INSERT INTO estados (sigla, nome) VALUES ('PE', 'Pernambuco');
INSERT INTO estados (sigla, nome) VALUES ('PI', 'Piauí');
INSERT INTO estados (sigla, nome) VALUES ('RJ', 'Rio de Janeiro');
INSERT INTO estados (sigla, nome) VALUES ('RN', 'Rio Grande do Norte');
INSERT INTO estados (sigla, nome) VALUES ('RS', 'Rio Grande do Sul');
INSERT INTO estados (sigla, nome) VALUES ('RO', 'Rondônia');
INSERT INTO estados (sigla, nome) VALUES ('RR', 'Roraima');
INSERT INTO estados (sigla, nome) VALUES ('SC', 'Santa Catarina');
INSERT INTO estados (sigla, nome) VALUES ('SP', 'São Paulo');
INSERT INTO estados (sigla, nome) VALUES ('SE', 'Sergipe');
INSERT INTO estados (sigla, nome) VALUES ('TO', 'Tocantins');

UNLOCK TABLES;

SELECT *
 FROM estados