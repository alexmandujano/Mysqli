<?php
$mysqli = new mysqli("localhost", "root", "root", "world");

if (mysqli_connect_errno()) {
    printf("Fallo la conexión: %s\n", mysqli_connect_error());
    exit();
}

/* activar la autoconsigna */
$mysqli->autocommit(true);

if ($resultado = $mysqli->query("SELECT @@autocommit")) {
    $fila = $resultado->fetch_row();
    printf("El estado de la autoconsigna es %s\n", $fila[0]);
    $resultado->free();
}

/* Cerrar conexión */
$mysqli->close();
?>