<?php
include("inc/config.inc.php");


if (isset($_POST['id'])) {
    $artigo_id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autores = $_POST['autores'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE artigo SET";
    $params = array();
    
    if ($titulo !== null && $titulo !== "") {
        $sql .= " titulo=?,";
        $params[] = $titulo;
    }

    if ($autores !== null && $autores !== "") {
        $sql .= " autores=?,";
        $params[] = $autores;
    }

    if ($descricao !== null && $descricao !== "")  {
        $sql .= " descricao=?,";
        $params[] = $descricao;
    }
    $sql = rtrim($sql, ',');

    $sql .= " WHERE id=?";
    $params[] = $artigo_id;

    $stmt = $db->prepare($sql);

    $param_types = str_repeat('s', count($params) - 1) . 'i'; // 'sss...i' based on the number of parameters
    $stmt->bind_param($param_types, ...$params);

} else {

    $titulo = $_POST['titulo'];
    $autores = $_POST['autores'];
    $descricao = $_POST['descricao'];

    $stmt = $db->prepare("INSERT INTO artigo (titulo, autores, descricao) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $titulo, $autores, $descricao);
}

if ($stmt->execute()) {
    header("Location: admin_artigo.php");
} else {
    print "<br>" . $db->error;
}

$stmt->close();
$db->close();
?>
