<?php include("inc/top.inc.php"); ?>
<div class="art">
    <?php
    // Include the database configuration file
    include("inc/config.inc.php");

    // SQL query to retrieve data from the database
    $articleId = $_POST['articleId'];
    $sql = "SELECT id, titulo, autores, descricao FROM artigo WHERE id = $articleId";
    $result = $db->query($sql);

    echo $articleId;
    if ($result->num_rows > 0) {
        // Output data from each row
        while ($row = $result->fetch_assoc()) {
            echo "
                <div class='art-container'>
                    <h1 class='art-title'>" . $row["titulo"] . "</h1>
                    <span class='art-author'>" .  $row["autores"] . "</span>
                    <span class='art-time'>" . '19:00h Monday ' . $row["time"] . "</span>
                    <span class='art-description'>" . $row["descricao"] . "</span>
                </div>";
        }


        // Close the database connection
        $db->close();
    } else {
        echo "<tr><td colspan='4'>No results found</td></tr>";
    }
    ?>
</div>
<?php include("inc/bot.inc.php"); ?>