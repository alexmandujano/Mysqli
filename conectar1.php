<?php 
	$cn=new mysqli("localhost","root","root","world");
	if ( !$cn->query("drop table if exists test") || 
		 !$cn->query("create table test(id int)")||
		 !$cn->query("insert into test(id) value(2)")
		) {

		echo "Fallo la creacion de la tabla:(".$cn->errno.")".
			 $cn->error;

	}
	
 ?>