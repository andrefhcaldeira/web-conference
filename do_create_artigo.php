<?php
include("inc/config.inc.php");

// Check if the artigo ID is present in the request
if (isset($_POST['id'])) {

    $artigo_id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autores = $_POST['autores'];
    $descricao = $_POST['descricao'];

    // Perform update query using $artigo_id
    $sql = "UPDATE artigo SET titulo='$titulo', autores='$autores', descricao='$descricao' WHERE artigo_id=$artigo_id";
} else {
    // Creating a new artigo
    $titulo = $_POST['titulo'];
    $autores = $_POST['autores'];
    $descricao = $_POST['descricao'];

    // Perform insert query
    $sql = "INSERT INTO artigo (titulo, autores, descricao) VALUES ('$titulo', '$autores', '$descricao')";
}

// Execute the SQL query
if ($db->query($sql) === TRUE) {
    echo "Artigo saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

// Close the database connection
$db->close();
?>
