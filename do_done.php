<?php
include ("inc/autentica.inc.php");

$id=@$_REQUEST['id'];
if (!is_numeric($id))
    die("no id");


$sql="select * from tasks where id=$id";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$done_val=$row['done'];

if ($done_val) 
    $done=0;
else 
    $done=1;


$sql="update tasks set done='$done' where id=$id";

if ($db->query($sql))
    header("Location: home.php");  
else    
    print "<br>" . $db->error;