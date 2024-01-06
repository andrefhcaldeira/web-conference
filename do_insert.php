<?php
include ("inc/autentica.inc.php");

// set variables
$name=$db->real_escape_string($_REQUEST['name']);  /// sql injection
$description=$db->real_escape_string($_REQUEST['description']);


// insert
$sql="insert into tasks (name, description) values ('$name', '$description' )";

if ($db->query($sql))
    header("Location: home.php");      
else    
    print "<br>" . $db->error;