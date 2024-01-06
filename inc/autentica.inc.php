<?php
if(session_id() == "") session_start();

include "inc/config.inc.php";

if (@$_REQUEST['logout']) {
	unset($_SESSION['user']);
	unset($_SESSION['iduser']);
}

if (@$_POST['user'] && @$_POST['pass']){  //cames from login form

	$uuser= $db->real_escape_string($_POST['user']);
	$upass= mypass($_POST['pass']);   /// encription of database

	$sql="SELECT id FROM users WHERE password='$upass' AND username='$uuser'";
	$result = $db->query( $sql);
	$num = $result->num_rows;

	if ($num<1) {
		header("Location: login.php");
	} else {
		$row = $result->fetch_assoc();
		$iduser=$row['id'];

		$_SESSION['user'] = $uuser;  // saves user in session
		$_SESSION['iduser'] = $iduser;
	}
	
} else if (!@isset($_SESSION['user'])) { // doesn't came from form
	header("Location: login.php");
}
