<?php include("inc/top.inc.php"); ?>




<div class="art">
    <?php
    // Include the database configuration file
    include("inc/config.inc.php");

    // Retrieve the articleId from the cookie
    $articleId = isset($_COOKIE['articleId']) ? $_COOKIE['articleId'] : null;

    // SQL query to retrieve data from the database
    $sql = "SELECT id, titulo, autores, descricao FROM artigo WHERE id = $articleId";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Output data from each row
        while ($row = $result->fetch_assoc()) {
            echo "
                <div class='art-container'>
                    <h1 class='art-title'>" . $row["titulo"] . "</h1>
                    <span class='art-author'>By " .  $row["autores"] . "</span>
                    <span class='art-description'>Description</span>
                    <p class='art-description-text'>" . $row["descricao"] . "</p>
                </div>";
        }

        // Close the database connection
        $db->close();
    } else {
        echo "<tr><td colspan='4'>No results found</td></tr>";
    }
    ?>
</div>
<h2 class="questions-h2">Questions</h2>
<hr>
<div class="questions">
<?php
    // TODO CHECK DE UTILIZADOR
    echo "
        <p class='question-login'>Login to submit a question</p>
    ";
    // TODO SE HOUVER UTILIZADOR
    echo "
        <textarea class='question-input' name='question'></textarea>
    ";
    // TODO SE HOUVER PERGUNTAS
    echo "
        <div class='question'>
            <p class='question-text'>
                Hello do you know how long the author took to write this?
            </p>
        </div>
    ";
?>
</div>

<?php include("inc/bot.inc.php"); ?>