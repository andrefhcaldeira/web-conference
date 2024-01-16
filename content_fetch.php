<?php
// content_fetch.php

// Assuming you have a database connection already established
include("inc/config.inc.php");

// Fetch the text from the database
$sql = "SELECT texto FROM conteudo";
$result = $db->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch the row
    $row = $result->fetch_assoc();

    // Output the text
    echo '<p class="description">' . $row["texto"] . '</p>';
} else {
    // Handle any errors if the query fails
    echo '<p class="description">Error fetching text from the database.</p>';
}
