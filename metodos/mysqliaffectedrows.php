<?php 
	$mysqli= new mysqli("localhost","root","root","world");
	if (mysqli_connect_errno()) {
		printf("coneccion fallida: %s <br>",mysqli_connect_errno());
		exit();
		
	}

	// agregando filas
	$mysqli->query("create table language select * from countrylanguage");
	printf("Filas afectadas(Insert): %s <br>",$mysqli->affected_rows);

	$mysqli->query("alter table language add Status int default 0");
	// actualiza
	$mysqli->query("update language set Status=1 where Percentage >50");
	printf("nro de filas afectadas(actualiza):%s <br>", $mysqli->affected_rows);

	// elimar filas

	$mysqli->query("delete from language where Percentage<50");
	printf("filas eliminadas: %s <br>",$mysqli->affected_rows);

	// seleccionar filas

	$result=$mysqli->query("select countrycode from language");
	printf("nro de filas selecionadas:%s<br>",$mysqli->affected_rows);

	$result->free();

	// eliminando tabla language
	$mysqli->query("drop table language");

	// cerrar coenxion	
	$mysqli->close();



 ?>