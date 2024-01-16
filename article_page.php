<?php include("inc/top.inc.php"); ?>




<div class="art">
    <?php
    // Include the database configuration file
    include("inc/config.inc.php");

    // Retrieve the articleId from the cookie
    $articleId = isset($_COOKIE['articleId']) ? $_COOKIE['articleId'] : null;

    // SQL query to retrieve data from the database
    $sql = "SELECT horario.id, artigo.titulo AS artigo_name, artigo.descricao AS artigo_descricao, artigo.autores AS artigo_autor, horario.sala, horario.`data` FROM horario
        INNER JOIN artigo ON horario.idArtigo = artigo.id
        INNER JOIN track ON horario.idTrack = track.id WHERE horario.id = $articleId";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Output data from each row
        while ($row = $result->fetch_assoc()) {
            echo "
                <div class='art-container'>
                    <h1 class='art-title'>" . $row["artigo_name"] . "</h1>
                    <span class='art-author'>By " .  $row["artigo_autor"] . "</span>
                    <span class='article-time'>" . $row["data"] . "</span>
                    <span class='art-description'>Description</span>
                    <p class='art-description-text'>" . $row["artigo_descricao"] . "</p>
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
    <form class='question-box' method='post' action='do_create_question.php'>
        <textarea class='question-input' name='text' required></textarea><br>
        <!-- <input type="hidden" name="id" id="question_id" value=""> -->
        <input class='submit-btn' type='submit' value='Submit'>
    </form>
    <?php
    echo "
        <div class='question'>
            <p class='question-text'>
                Hello do you know how long the author took to write this?
            </p>
        </div>
        ";
    ?>
</div>
<!-- <script>
    document.getElementById("question_id").value = $_SESSION['iduser'];
</script> -->
<?php include("inc/bot.inc.php"); ?>