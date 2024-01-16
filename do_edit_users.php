<?php
include("inc/config.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $userType = $_POST['userType'];

    // Update the user type in the database
    $updateQuery = "UPDATE users SET type = '$userType' WHERE id = $id";
    $updateResult = $db->query($updateQuery);

    if ($updateResult) {
        header("Location: admin_users.php");
    } else {
        echo "Error updating user type: " . $db->error;
    }
} else {
    echo "Invalid request.";
}

$db->close();
?>
