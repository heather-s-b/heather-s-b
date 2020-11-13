<?php
	$hostname = "localhost";
	$dbuser = "new_user";
	$dbpass = "wvB1wT1l5VcKmC3v";
	$dbname = "travel";
	$conn = new mysqli($hostname, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error)
	{
		die("Failed to connect to database" . mysqli_error($conn));
	}
?>