<?php
//  La función mysqli_insert_id() devuelve el ID generado por una consulta en una tabla con una columna que tenga el atributo AUTO_INCREMENT. Si la última consulta no fue una sentencia INSERT o UPDATE o si la tabla modificada no tiene una columna con el atributo 
// AUTO_INCREMENT, está función devolverá cero.
$mysqli = new mysqli("localhost", "root", "root", "world");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}

$mysqli->query("CREATE TABLE myCity LIKE City");

$query = "INSERT INTO myCity VALUES (NULL, 'Stuttgart', 'DEU', 'Stuttgart', 617000)";
$mysqli->query($query);

printf ("Nuevo registro con el id %d.\n", $mysqli->insert_id);

/* drop table */
$mysqli->query("DROP TABLE myCity");

/* close connection */
$mysqli->close();
?>