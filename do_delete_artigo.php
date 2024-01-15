<?php

include("inc/config.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artigoId = $_POST['id'];

    $sql = "DELETE FROM artigo WHERE id = $artigoId";
    $result = $db->query($sql);

    $db->close();
   
    header("Location: admin_artigo.php");
    exit();
} else {
    print "<br>" . $db->error;
    exit();
}
?>