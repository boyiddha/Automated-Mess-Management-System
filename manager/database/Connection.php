<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "mess_management";
	
	$conn = new mysqli($host, $user, $pass, $db);
	$conn->set_charset("utf8");
	if($conn->connect_error){
		echo "Failed To Connect to database:" . $conn->connect_error;
	}
	
?>