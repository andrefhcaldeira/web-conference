<?php
include("inc/config.inc.php");

// Check if the question details are present in the request
$userId = $_SESSION['iduser'];
$text = $_POST['text'];

echo "Debug: userId=$userId, text=$text"; // Add debugging output to check parameter values

$sql = "INSERT INTO questions (userId, text) VALUES (?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("ss", $userId, $text);

if ($stmt->execute()) {
    // Redirect to the desired location after successful execution
    header("Location: article_page.php");
} else {
    // Handle the case where the execution was not successful
    print "<br>" . $db->error;
}

$stmt->close();
$db->close();
