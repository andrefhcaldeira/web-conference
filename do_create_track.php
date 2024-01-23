<?php
include("inc/config.inc.php");

if (!empty($_POST['id'])) {
    $artigo_id = $_POST['id'];
    $Nome = $_POST['nome'];
    $Texto = $_POST['texto'];

    $sql = "UPDATE track SET";
    $params = array();
    
    if ($Nome !== null && $Nome !== "") {
        $sql .= " nome=?,";
        $params[] = $Nome;
    }

    if ($Texto !== null && $Texto !== "") {
        $sql .= " texto=?,";
        $params[] = $Texto;
    }

    $sql = rtrim($sql, ',');

    $sql .= " WHERE id=?";
    $params[] = $artigo_id;

    $stmt = $db->prepare($sql);

    $param_types = str_repeat('s', count($params) - 1) . 'i';
    $stmt->bind_param($param_types, ...$params);

} else {

    $Nome = $_POST['nome'];
    $Texto = $_POST['texto'];


    $stmt = $db->prepare("INSERT INTO track (nome, texto) VALUES (?, ?)");
    $stmt->bind_param("ss", $Nome, $Texto);
}

if ($stmt->execute()) {
    header("Location: admin_track.php");
} else {
    print "<br>" . $db->error;
}

$stmt->close();
$db->close();
?>
