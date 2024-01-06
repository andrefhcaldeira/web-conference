<?php
	require 'inc/config.inc.php';

	$user = $db->real_escape_string($_POST["user"]);
	$email = $db->real_escape_string($_POST["email"]);
	$pass = mypass($db->real_escape_string($_POST["pass"]));
	$extra = $db->real_escape_string($_POST["extra"]);
	
	$sql= "insert into users(username, email, password, extra) 
		values('$user', '$email','$pass', '$extra') ";

	if ($db->query($sql) === TRUE) {
		header("Location: index.php");   
	} else {
		echo "Error: " . $db->error;
	}
?>
