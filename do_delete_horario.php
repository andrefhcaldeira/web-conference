<?php

include("inc/config.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artigoId = $_POST['id'];

    $sql = "DELETE FROM horario WHERE id = $artigoId";
    $result = $db->query($sql);

    $db->close();
   
    header("Location: admin_horario.php");
    exit();
} else {
    print "<br>" . $db->error;
    exit();
}
?>