<?php 

$mysqli = new mysqli("localhost", "root", "root", "world");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("DROP TABLE IF EXISTS test1") ||
    !$mysqli->query("CREATE TABLE test1(id INT, etiqueta CHAR(1))") ||
    !$mysqli->query("INSERT INTO test1(id, etiqueta) VALUES (1, 'a')")) {
    echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
}
 $sentencia = $mysqli->prepare("select id,etiqueta from test1 where id=1");
 $sentencia->execute();
 $resultado=$sentencia->get_result();
 $fila=$resultado->fetch_assoc();
 printf("id= %s(%s)\n",$fila['id'],gettype($fila['id']));
 printf("etiqueta= %s(%s)\n",$fila['etiqueta'],gettype($fila['etiqueta']))
?>