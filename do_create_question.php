<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("inc/config.inc.php");
    $artigoid = trim($_POST['id']);
    $questionText = $_POST['text'];
   
    $stmt = $db->prepare("INSERT INTO pergunta (idArtigo, pergunta) VALUES (?, ?)");
    $stmt->bind_param("is", $artigoid, $questionText);
    echo "Debug: idArtigo = " . $artigoid . ", pergunta = " . $questionText;
    if ($stmt->execute()) {
        header("Location: article_page.php");
        exit();
    } 

    $stmt->close();
    $db->close();
} 

