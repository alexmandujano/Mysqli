<?php 
	$mysqli= new mysqli("localhost","root","root","world");
	if ($mysqli->connect_errno) {
	 echo "fallo la coneccion :(". $mysql-> connect_errno.")".
	 $mysqli->connect_error;
	}
	// sentencia no preparada

	if ( !$mysqli->query("drop table if exists test") || 
		 !$mysqli->query("create table test(id int)")
		) {
		echo "Fallo la creacion de la tabla:(".$mysqli->errno.")".
			 $mysqli->error;
	}
// sentencia preparada
	if(!($sentencia=$mysqli->prepare("insert into test(id) values(?)"))){
		echo "fallo la preparación: (". $mysqli->errno.")".$mysqli->error;

	}
 ?>
