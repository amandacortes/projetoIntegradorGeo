USE geolocalizacao;
DROP TABLE IF EXISTS erb;
CREATE TABLE erb (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_estado smallint(2) DEFAULT NULL,
  latitue float DEFAULT NULL,
  longitude float DEFAULT NULL,
  PRIMARY KEY (id),
  KEY id_estado (id_estado),
  CONSTRAINT erb_ibfk_1 FOREIGN KEY (id_estado) REFERENCES estados (id)
)