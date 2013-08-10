<?php 
// Devuelve una cadena que contiene el código de error
//  SQLSTATE del último error. El código de error consiste en cinco caracteres.
//   '00000' significa sin error. Los valores son especificados por ANSI SQL y ODBC.
//  Para una lista de los posibles valores, véase » http://dev.mysql.com/doc/mysql/en/error-handling.html.


$mysqli = new mysqli("localhost", "root", "root", "world");

/* Comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}
 if (!$mysqli->query("create table city(id int, name varchar(30))")) {
 	printf("Error-sqlstate %s",$mysqli->sqlstate);
 }
$mysqli->close();

 ?>