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
//Sentencia preparada, etapa 1: preparación 
	if(!($sentencia=$mysqli->prepare("insert into test(id) values(?)"))){
		echo "fallo la preparación: (". $mysqli->errno.")".$mysqli->error;

	}
//Sentencia preparada, etapa 2: vinculación y ejecución  
	$id=1;
	if (!$sentencia->bind_param("i",$id)) 
	{
		echo "fallo la vinculacion de parametros:(".
			$sentencia->errno .")".$sentencia->error;
	}
	if (!$sentencia->execute()){
		echo "fallo la ejecucion: (". $sentencia->errno.")". $sentencia->error;
	}
 
 /* Sentencia preparada: ejecución repetida, sólo datos transferidos desde el cliente al servidor */

 	for ($id=2; $id <5 ; $id++) { 
 		if (!$sentencia->execute()) {
		echo "fallo la ejecucion: (". $sentencia->errno.")". $sentencia->error;
 		}
 	}
 	/* se recomienda el cierre explícito */
 	$sentencia->close();
/* Sentencia no preparada */
$result=$mysqli->query("select id from test");
var_dump($result->fetch_all());

 ?>