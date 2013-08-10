<?php
$mysqli = new mysqli("localhost", "root", "root", "world");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$mysqli->query("CREATE TABLE myCity LIKE City");

/* a remarkable city in Wales */
$query = "INSERT INTO myCity (CountryCode, Name) VALUES('GBR',
        'Llanfairpwllgwyngyllgogerychwyrndrobwllllantysiliogogogoch')";

$mysqli->query($query);
	
	if ($mysqli->warning_count) {
		if ($result=$mysqli->query("SHOW WARNINGS")) {
			$row=$result->fetch_row();
			printf("%s (%d): %s\n",$row[0],$row[1],$row[2]);
			$result->close();
		}
	}
$mysqli->close();


?>
