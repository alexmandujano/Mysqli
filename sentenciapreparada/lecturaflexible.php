<?php 

$mysqli = new mysqli("localhost", "root", "root", "world");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("DROP TABLE IF EXISTS test1") ||
    !$mysqli->query("CREATE TABLE test1(id INT, etiqueta CHAR(1))") ||
    !$mysqli->query("INSERT INTO test1(id, etiqueta) VALUES (1, 'a'),(2,'b'),(3,'c')")) {
    echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
}
 if (!($sentencia = $mysqli->prepare("SELECT id, etiqueta FROM test1"))) {
    echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$sentencia->execute()) {
    echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
}

if (!($resultado=$sentencia->get_result())) {
	echo "Falló la preparación: (" . $sentencia->errno . ") " . $sentencia->error;
}
for ($num_fila=($resultado->num_rows-1); $num_fila >=0 ; $num_fila--) { 
	$resultado->data_seek($num_fila);
	var_dump($resultado->fetch_assoc());
}
$resultado->close();
?>