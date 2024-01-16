<?php
if (session_id() == "") session_start();

include "inc/config.inc.php";

if (@$_REQUEST['logout']) {
    unset($_SESSION['user']);
    unset($_SESSION['iduser']);
    unset($_SESSION['userType']); // Also unset user type on logout
}

if (@$_POST['user'] && @$_POST['pass']) { // Comes from login form

    $uuser = $db->real_escape_string($_POST['user']);
    $upass = mypass($_POST['pass']); /// encription of database

    $sql = "SELECT id, type FROM users WHERE password='$upass' AND username='$uuser'";
    $result = $db->query($sql);
    $num = $result->num_rows;

    if ($num < 1) {
        header("Location: login.php");
    } else {
        $row = $result->fetch_assoc();
        $iduser = $row['id'];
        $userType = $row['type'];

        $_SESSION['user'] = $uuser; // saves user in session
        $_SESSION['iduser'] = $iduser;
        $_SESSION['userType'] = $userType; // saves user type in session
    }
} else if (!isset($_SESSION['user'])) { // doesn't come from form
    header("Location: login.php");
}
