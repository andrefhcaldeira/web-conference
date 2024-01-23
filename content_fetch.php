<?php
function getContentById($id, $db) {
    $sql = "SELECT texto FROM conteudo WHERE id = $id";
    $result = $db->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row["texto"];
    } else {
        return 'Error fetching text from the database.';
    }
}
?>
