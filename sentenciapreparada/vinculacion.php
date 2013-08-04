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
 if (!($sentencia = $mysqli->prepare("SELECT id, etiqueta FROM test1"))) {
    echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$sentencia->execute()) {
    echo "Falló la ejecución: (" . $mysqli->errno . ") " . $mysqli->error;
}

$id_salida       = NULL;
$etiqueta_salida = NULL;
if (!$sentencia->bind_result($id_salida, $etiqueta_salida)) {
    echo "Falló la vinculación de los parámetros de salida: (" . $sentencia->errno . ") " . $sentencia->error;
}

while ($sentencia->fetch()) {
    printf("id = %s (%s), etiqueta = %s (%s)\n", $id_salida, gettype($id_salida), $etiqueta_salida, gettype($etiqueta_salida));
}
?>