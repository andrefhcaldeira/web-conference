<?php
include ("inc/autentica.inc.php");

$iduser=@$_SESSION['iduser'];
if (!is_numeric($iduser))
    die("no iduser");
$idtask=@$_REQUEST['id'];
if (!is_numeric($idtask))
    die("no id");

// ckeck for claps
$sql="select * from claps where iduser=$iduser and idtask=$idtask";
$result = $db->query($sql);
if ($result->num_rows == 1) {
    header( "refresh:2;url=home.php" );
    die ("<div style='background-color: red; margin: 30px auto'>already claped</div>");
}

$sql="insert into claps (iduser, idtask) values($iduser, $idtask)";

if ($db->query($sql))
    header("Location: home.php");  
else    
    print "<br>" . $db->error;
