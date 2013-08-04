<meta charset="utf-8"/>
<?php
$mysqli = new mysqli("localhost", "root", "root", "world");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (!$mysqli->query("drop procedure if exists p")||
	!$mysqli->query("create procedure p(
					 out msg varchar(50))
					 begin
					 SELECT '¡Hola!' INTO msg;
					 END; ")) {
	echo "Falló la creación del procedimiento almacenado: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!$mysqli->query("set @msg =''")||
	!$mysqli->query("call p(@msg)")) {
	echo "Falló Call: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!($resultado=$mysqli->query("select @msg as _p_out"))) {
	echo "Falló Call: (" . $mysqli->errno . ") " . $mysqli->error;
}
$fila=$resultado->fetch_assoc();
echo $fila['_p_out'];
?>