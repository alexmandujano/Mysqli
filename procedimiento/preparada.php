<meta charset="utf-8"/>
<?php 
$mysqli = new mysqli("localhost", "root", "root", "world");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->query("DROP TABLE IF EXISTS test") ||
    !$mysqli->query("CREATE TABLE test(id INT)") ||
    !$mysqli->query("INSERT INTO test(id) VALUES (1),(2),(3)")) {
    echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!$mysqli->query("drop procedure if exists p")||
	!$mysqli->query("create procedure p() reads sql data 
		            begin 
		            select id from test ;
		            select id+1 from test;
		            end;")){
	echo "Falló la creación del procedimiento almacenado: (" . $mysqli->errno . ") " . $mysqli->error;
	
}
if (!($sentencia=$mysqli->prepare("call p()"))) {
	 echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!$sentencia->execute()) {
	echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
}
do {
	if ($resultado=$sentencia->get_result()) {
		echo " <br> ---";
		var_dump($resultado->fetch_all());
		$resultado->free();
	}else{
		if ($sentencia->errno) {
			echo "Stored failed:(". $sentencia->errno .")".$sentencia->error;
		}
	}
 // $id_out = NULL;
  //   if (!$sentencia->bind_result($id_out)) {
  //       echo "Falló la vinculiación: (" . $sentencia->errno . ") " . $sentencia->error;
  //   }
 
  //   while ($sentencia->fetch()) {
  //       echo "id = $id_out\n";
  //   }
} while ($sentencia->next_result()&&$sentencia->more_results());
?>
