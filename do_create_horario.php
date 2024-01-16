<?php
include("inc/config.inc.php");

if (!empty($_POST['id'])) {
    $idArtigo = $_POST['idArtigo'];
    $idTrack = $_POST['idTrack'];
    $Sala = $_POST['Sala'];
    $Data = $_POST['Data'];
    $Hour = $_POST['Hora'];

    $sql = "UPDATE horario SET";
    $params = array();

    if ($idArtigo !== null && $idArtigo !== "") {
        $sql .= " idArtigo=?,";
        $params[] = $idArtigo;
    }

    if ($idTrack !== null && $idTrack !== "") {
        $sql .= " idTrack=?,";
        $params[] = $idTrack;
    }

    if ($Sala !== null && $Sala !== "") {
        $sql .= " Sala=?,";
        $params[] = $Sala;
    }

    if ($Data !== null && $Data !== "") {
        $sql .= " Data=?,";
        $params[] = $Data;
    }

    if ($Hour !== null && $Hour !== "") {
        $sql .= " Hora=?,";
        $params[] = $Hour;
    }

    $sql = rtrim($sql, ',');

    $sql .= " WHERE id=?";
    $params[] = $_POST['id'];

    $stmt = $db->prepare($sql);

    $param_types = str_repeat('s', count($params) - 1) . 'i';
    $stmt->bind_param($param_types, ...$params);

} else {
    $idArtigo = $_POST['idArtigo'];
    $idTrack = $_POST['idTrack'];
    $Sala = $_POST['Sala'];
    $Data = $_POST['Data'];
    $Hour = $_POST['Hora'];


    
    $stmt = $db->prepare("INSERT INTO horario (idArtigo, idTrack, sala, `data`, Hora) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $idArtigo, $idTrack, $Sala, $Data, $Hour);
}

if ($stmt->execute()) {
    header("Location: admin_horario.php");
} else {
    print "<br>" . $db->error;
}

$stmt->close();
$db->close();
