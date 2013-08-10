<?php 
/* connect database test */
$mysqli = new mysqli("localhost", "root", "root", "world");

  /* check connection */
  if (mysqli_connect_errno()) {
      printf("Error de conexión: %s\n", mysqli_connect_error());
      exit();
  }
if ($result=$mysqli->query("select DATABASE()")) {
		
	$row=$result->fetch_row();
	printf("<br> base de datos actual: %s\n",$row[0]);
	$result->close();

	}
  $mysqli->query("SET @a:=1");
  $mysqli->change_user("root","root","test");
	if ($result=$mysqli->query("select DATABASE()")) {
		
	$row=$result->fetch_row();
	printf("<br> base de datos nueva: %s\n",$row[0]);
	$result->close();

	}
	if ($result=$mysqli->query("select @a")) {
		$row=$result->fetch_row();
		if ($row[0]===NULL) {
			printf("<br> value of variable a is null\n");

		}
		$result->close();
	}
		$mysqli->close()
 ?>