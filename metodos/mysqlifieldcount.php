<!-- Devuelve el numero de columnas para la consulta
 más reciente en la conexión representada por el
  parámetro link. Esta función puede ser útil cuando
   se utiliza la función mysqli_store_result() para
    determinar si la consulta ha producido un 
resultado no vacío o no, sin saber la naturaleza de la consulta. -->
<?php 
$mysqli = new mysqli("localhost", "root", "root", "test");

$mysqli->query( "DROP TABLE IF EXISTS friends");
$mysqli->query( "CREATE TABLE friends (id int, name varchar(20))");

$mysqli->query( "INSERT INTO friends VALUES (1,'Hartmut'), (2, 'Ulf')");
$mysqli->real_query("select * from friends");
if ($mysqli->field_count) {
	// esta es un select/muestra o describe query
	$result=$mysqli->store_result();
	//process result_set
	echo "nro de filas:".$mysqli->field_count;
	$row=$result->fetch_row();
	

	//fre result set
	$result->close();
//info del host
    printf(" <br> Informacion del host: %s",$mysqli->host_info);
    	
   printf(" <br> Protocol version: %d", $mysqli->protocol_version);

// Devuelve la versión del servidor MySQL
   printf(" <br> Server version: %s", $mysqli->server_info);
 // Devuelve la versión del servidor MySQL como un valor entero
   printf(" <br> Server version: %d\n", $mysqli->server_version);
   // La función mysqli_info() devuelve una cadena facilitando información sobre la 
   // última consulta ejecutada. La naturaleza de esta cadena está indicada abajo:



   $mysqli->close();
}

?>