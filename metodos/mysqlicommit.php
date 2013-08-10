<?php
$mysqli = new mysqli("localhost", "root", "root", "world");

/* comprueba la conexión */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$mysqli->query("CREATE TABLE Language LIKE CountryLanguage");

/* Desactiva autocommit */
$mysqli->autocommit(FALSE);

/* Inserta algunos valores */
$mysqli->query("INSERT INTO Language VALUES ('DEU', 'Bavarian', 'F', 11.2)");
$mysqli->query("INSERT INTO Language VALUES ('DEU', 'Swabian', 'F', 9.4)");

/* commit transaction */
$mysqli->commit();

/* Elimina la tabla */
$mysqli->query("DROP TABLE Language");

/* Cierra la conexión */
$mysqli->close();
?>