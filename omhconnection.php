<?php
	$servername = "localhost";  //Or you can use 127.0.0.1    echo $mysqli->host_info . "\n";
	$username = "root";
	$password = "";
	$database = "omh";

	$mysqli = new mysqli($servername, $username, $password, $database);

	if ($mysqli->connect_errno) {
    	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}
?>