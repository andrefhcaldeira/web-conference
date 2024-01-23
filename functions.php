<?php

function getUserType($userId) {
    global $db;
    $userId = $db->real_escape_string($userId);
    $sql = "SELECT type FROM users WHERE id='$userId'";
    $result = $db->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        return $row['type'];
    }

    return 'normal'; 
}