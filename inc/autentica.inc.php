<?php
if (session_id() == "") session_start();

include "inc/config.inc.php";

if (@$_REQUEST['logout']) {
    unset($_SESSION['user']);
    unset($_SESSION['iduser']);
    unset($_SESSION['userType']); 
    header("Location: index.php");
}

if (@$_POST['user'] && @$_POST['pass']) { 

    $uuser = $db->real_escape_string($_POST['user']);
    $upass = mypass($_POST['pass']); 

    $sql = "SELECT id, type FROM users WHERE password='$upass' AND username='$uuser'";
    $result = $db->query($sql);
    $num = $result->num_rows;

    if ($num < 1) {
        header("Location: login.php");
    } else {
        $row = $result->fetch_assoc();
        $iduser = $row['id'];
        $userType = $row['type'];

        $_SESSION['user'] = $uuser; 
        $_SESSION['iduser'] = $iduser;
        $_SESSION['userType'] = $userType; 
    }
    header("Location: index.php");
} 