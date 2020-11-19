<?php

	define("HOSTNAME","localhost");
	define("USERNAME","root");
	define("PASSWORD","");
	define("DBNAME","registerdonor");
	$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die("cannot connect to database");

/*
$conn = new PDO("mysql:host=localhost;dbname=registerdonor", "root", "");
*/
?>
