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
if (!$mysqli->multi_query("call p()") /*!mysqli_multi_query($mysqli,"call p()")*/) {
	 echo "Falló CALL: (" . $mysqli->errno . ") " . $mysqli->error;
}
do {
	if ($resultado=$mysqli->store_result()) {
		printf("------ /n");
		var_dump($resultado->fetch_all());
		// var_dump(mysqli_fetch_all($resultado));
		$resultado->free();
		// mysqli_free_result($resultado);
	}else{
		if ($mysqli->errno) {
            echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
	}
} // while ( $mysqli->more_results()&&$mysqli->next_result() )
   while (mysqli_more_results($mysqli)&&mysqli_next_result($mysqli));  
?>
