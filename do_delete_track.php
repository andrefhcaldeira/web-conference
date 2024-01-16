<?php

include("inc/config.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trackId = $_POST['id'];

    $sql = "DELETE FROM track WHERE id = $trackId";
    $result = $db->query($sql);

    $db->close();
   
    header("Location: admin_track.php");
    exit();
} else {
    print "<br>" . $db->error;
    exit();
}
?>