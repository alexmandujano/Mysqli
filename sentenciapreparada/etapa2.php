<?php 
include 'etapa1.php';
	$id=2;
	if (!$sentencia->bind_param("i",$id)) 
	{
		echo "fallo la vinculacion de parametros:(".
			$sentencia->errno .")".$sentencia->error;
	}
	if (!$sentencia->execute()){
		echo "fallo la ejecuciom: (". $sentencia->errno.")". $sentencia->error;
	}
 ?>