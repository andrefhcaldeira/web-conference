<?php
include("inc/config.inc.php");

// Check if the artigo ID is present in the request
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

    // Remove the trailing comma from the SQL statement
    $sql = rtrim($sql, ',');

    $sql .= " WHERE id=?";
    $params[] = $artigo_id;

    $stmt = $db->prepare($sql);

    // Dynamically bind parameters
    $param_types = str_repeat('s', count($params) - 1) . 'i'; // 'sss...i' based on the number of parameters
    $stmt->bind_param($param_types, ...$params);

} else {
    // Creating a new artigo
    $titulo = $_POST['titulo'];
    $autores = $_POST['autores'];
    $descricao = $_POST['descricao'];

    // Use prepared statement to prevent SQL injection
    $stmt = $db->prepare("INSERT INTO artigo (titulo, autores, descricao) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $titulo, $autores, $descricao);
}

// Execute the prepared statement
if ($stmt->execute()) {
    header("Location: admin_artigo.php");
} else {
    print "<br>" . $db->error;
}

// Close the prepared statement and the database connection
$stmt->close();
$db->close();
?>
