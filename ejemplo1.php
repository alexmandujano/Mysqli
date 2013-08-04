<?php 
	$cn= new mysqli("localhost","root","root","world");
	if ($cn -> connect_errno) {
		echo "fallo al conectar mysql:(".$cn -> connect_errno.")". $cn-> connect_errno;
	}
	echo $cn->host_info."<br>";


	$cn2= new mysqli("127.0.0.1","root","root","world");
	if ($cn2-> connect_errno) {
		echo "fallo al coenctarse con el mysql (".$cn2->connect_errno.")". connect_errno;
	}
	echo $cn2->host_info;
 ?>


