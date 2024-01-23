<?php
include "inc/top.inc.php";
include ("inc/autentica.inc.php");
?>
<main>
    <h1>Horarios</h1>
    <div class='horario-container'>
    <?php
        include("inc/config.inc.php");
        $sql = "SELECT horario.id, track.nome AS track_name, artigo.titulo AS artigo_name, artigo.autores AS artigo_autor, horario.sala, horario.hora, horario.`data` FROM horario
            INNER JOIN artigo ON horario.idArtigo = artigo.id
            INNER JOIN track ON horario.idTrack = track.id";

        $result = $db->query($sql);
        $organizedData = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $currentDate = $row["data"];

                $organizedData[$currentDate][$row["track_name"]][] = array(
                    "hora" => $row["hora"],
                    "artigo_name" => $row["artigo_name"],
                    "sala" => $row["sala"]
                );
            }
            $db->close();

            foreach ($organizedData as $date => $tracks) {
                echo "<div class='date-container'>
                <span class='horario-date'>$date</span>";

                foreach ($tracks as $trackName => $articles) {
                    echo "<span class='horario-track'>$trackName</span>";

                    foreach ($articles as $article) {
                        echo"<div class='date-article-container'>";
                        echo "<span class='horario-hora'>" . $article["hora"] . "</span><br>";
                        echo "<span class='horario-art'>" . $article["artigo_name"] . "</span>";
                        echo "<span class='horario-sala'>" . $article["sala"] . "</span>";
                        echo "</div>";
                    }
                }
                echo "</div>";
            }
        } else {
            echo "<p>No articles found.</p>";
        }
    ?>
    </div>
</main>
<?php
include "inc/bot.inc.php";
?>
