CREATE DATABASE php_mysql_crud;

use php_mysql_crud;

CREATE TABLE task(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  descripcion VARCHAR(250) NOT NULL,
  fechainicial DATE NOT NULL,
  fechafinal DATE NOT NULL,
  integrante VARCHAR(250) NOT NULL,
  proyecto VARCHAR(250) NOT NULL,
  observacion VARCHAR(250) NOT NULL
  asistencia VARCHAR(250) NOT NULL,
  retraso VARCHAR(250) NOT NULL,
);

DESCRIBE task;