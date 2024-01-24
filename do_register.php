<?php
	require 'inc/config.inc.php';

	$user = $db->real_escape_string($_POST["user"]);
	$email = $db->real_escape_string($_POST["email"]);
	$pass = mypass($db->real_escape_string($_POST["pass"]));
	$type = 'normal';

	$sql= "insert into users(username, email, password, type) 
		values('$user', '$email','$pass', '$type') ";

	if ($db->query($sql) === TRUE) {
		header("Location: index.php");   
	} else {
		echo "Error: " . $db->error;
	}
?>
