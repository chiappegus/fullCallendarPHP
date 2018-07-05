# Privilegios para `t_access`@`localhost`

GRANT SELECT ON *.* TO 't_access'@'localhost'

GRANT SELECT, INSERT, UPDATE, DELETE ON `bdnext\_u`.* TO 't_access'@'localhost';

GRANT ALL PRIVILEGES ON `transporte_db`.* TO 't_access'@'localhost';


# Privilegios para `t_create_user`@`localhost`

GRANT USAGE ON *.* TO 't_create_user'@'localhost' 
GRANT SELECT, INSERT, UPDATE, DELETE ON `bdnext\_u`.* TO 't_create_user'@'localhost';


# Privilegios para `t_general`@`localhost`

GRANT SELECT ON *.* TO 't_general'@'localhost' 

GRANT SELECT ON `transporte\_db`.* TO 't_general'@'localhost';

GRANT SELECT ON `bdnext\_u`.* TO 't_general'@'localhost';

GRANT SELECT (psw, email, nombre, id) ON `transporte_db`.`usuarios` TO 't_general'@'localhost';


# Privilegios para `user_prueba`@`localhost`

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, INDEX, ALTER, CREATE TEMPORARY TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EVENT, TRIGGER ON *.* TO 'user_prueba'@'localhost' IDENTIFIED BY PASSWORD '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9';

GRANT SELECT ON `transporte\_db`.* TO 'user_prueba'@'localhost';

GRANT ALL PRIVILEGES ON `prueba`.* TO 'user_prueba'@'localhost';

GRANT SELECT (psw, id, nombre) ON `transporte_db`.`usuarios` TO 'user_prueba'@'localhost';


user :
pepe@pepe.com   123456 
gchiappe@gus.com  123456
1@p.com 123