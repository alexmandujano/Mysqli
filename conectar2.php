<?php 
	$cn=new mysqli("localhost","root","root","world");
	if ( !$cn->query("drop table if exists test") || 
		 !$cn->query("create table test(id int)")||
		 !$cn->query("insert into test(id) value (1),(2),(3),(4)")
		) {

		echo "Fallo la creacion de la tabla:(".$cn->errno.")".
			 $cn->error;

	}
	
	$resultado=$cn->query("select id from test order by  id Asc");
	echo "orden inverso...<br>";
	for ($i=$resultado->num_rows-1; $i>=0; $i--) { 
		$resultado->data_seek($i);
		$fila=$resultado->fetch_assoc();
		echo "id= ".$fila['id']."<br>";
	}

	echo "orden de conunto de resultado <br>";
	$resultado->data_seek(0);
	while ($i=$resultado->fetch_assoc()) {
		echo "id =". $i['id']."<br>";
	}
 ?>

 <?php
$cn->real_query("SELECT id FROM test ORDER BY id ASC");
$resultado = $cn->use_result();

echo "Orden del conjunto de resultados...\n";
while ($fila = $resultado->fetch_assoc()) {
    echo " id = " . $fila['id'] . "\n";
}
?>