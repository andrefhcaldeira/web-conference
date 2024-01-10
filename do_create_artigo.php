<?php
// Include the database configuration file
include("inc/config.inc.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $titulo = $_POST["titulo"];
    $autores = $_POST["autores"];
    $descricao = $_POST["descricao"];

    // Insert data into the database
    $sql = "INSERT INTO artigo (titulo, autores, descricao) VALUES ('$titulo', '$autores', '$descricao')";
    
    if ($db->query($sql) === TRUE) {
        echo "Artigo created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    // Close the database connection
    $db->close();
}
?>
