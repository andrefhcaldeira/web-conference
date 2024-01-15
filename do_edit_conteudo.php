<?php
include("inc/config.inc.php");
if (!empty($_POST['id'])) {
    $conteudo_id = $_POST['id'];
    $titulo = $_POST['Title'];
    $textos = $_POST['Text'];;

    // Check if the article with the given id exists
    $checkExistence = $db->prepare("SELECT id FROM conteudo WHERE id = ?");
    $checkExistence->bind_param("i", $conteudo_id);
    $checkExistence->execute();
    $checkExistence->store_result();

    if ($checkExistence->num_rows > 0) {
        $checkExistence->close();

        // Perform the update
        $sql = "UPDATE conteudo SET";
        $params = array();

        if ($titulo !== null && $titulo !== "") {
            $sql .= " titulo=?,";
            $params[] = $titulo;
        }

        if ($textos !== null && $textos !== "") {
            $sql .= " texto=?,";
            $params[] = $textos;
        }

        $sql = rtrim($sql, ',');
        $sql .= " WHERE id=?";
        $params[] = $conteudo_id;

        $stmt = $db->prepare($sql);

        $param_types = str_repeat('s', count($params) - 1) . 'i'; // 'sss...i' based on the number of parameters
        $stmt->bind_param($param_types, ...$params);

        if ($stmt->execute()) {
            header("Location: admin_geral.php");
        } else {
            print "<br>" . $db->error;
        }

        $stmt->close();
    } else {
    
        echo "Article with id $conteudo_id not found.";
    }

    $db->close();
}