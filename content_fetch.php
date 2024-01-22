<?php


function getContentById($id, $db) {
    // Fetch the text from the database based on the provided ID
    $sql = "SELECT texto FROM conteudo WHERE id = $id";
    $result = $db->query($sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the row
        $row = $result->fetch_assoc();

        // Return the text
        return $row["texto"];
    } else {
        // Return an error message
        return 'Error fetching text from the database.';
    }
}
?>
