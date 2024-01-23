<?php

include("inc/config.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['id'];

    $sql = "DELETE FROM users WHERE id = $userid";
    $result = $db->query($sql);

    $db->close();
   
    header("Location: admin_users.php");
    exit();
} else {
    print "<br>" . $db->error;
    exit();
}