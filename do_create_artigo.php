<?php
include("inc/config.inc.php");

// Check if the artigo ID is present in the request
if (isset($_POST['id'])) {
    $artigo_id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autores = $_POST['autores'];
    $descricao = $_POST['descricao'];

    // Use prepared statement to prevent SQL injection
    $stmt = $db->prepare("UPDATE artigo SET titulo=?, autores=?, descricao=? WHERE id=?");
    $stmt->bind_param("sssi", $titulo, $autores, $descricao, $artigo_id);
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
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and the database connection
$stmt->close();
$db->close();
?>
