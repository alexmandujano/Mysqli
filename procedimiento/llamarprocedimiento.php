<meta charset="utf-8"/>
<?php 
$mysqli=new mysqli("localhost","root","root","world");
if ($mysqli->connect_errno) {
	echo "se produjo un error :(". $mysqli->connect_errno.")".$mysqli->connect_error;	
}
if (!$mysqli->query("drop table if exists test")||
	!$mysqli->query("create table test (id int)")) {
	
	echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
}
 
if (!$mysqli->query("drop procedure if exists p")||
	!$mysqli->query("create procedure p(
					 in id_val int
					 )
		             begin
		             insert into test(id) value(id_val);
		             end
		             ;")) {
	echo "Falló la creación del procedimiento: (" . $mysqli->errno . ") " . $mysqli->error;

	
}
if (!$mysqli->query("call p(2)")) {
	echo "error al ejecutar el procedimiento (".$mysqli->errno.")".$mysqli->error;
}
if (!($resultado=$mysqli->query("select id from test"))) {
	 echo "error en la consulta (". $resultado->errno.")".$resultado->error;	
	}	
$a=$resultado->fetch_assoc();
var_dump($a);
?>