<?php
include ("inc/autentica.inc.php");
include "inc/top.inc.php";

?>
<main>
    <div class="blue-gradient">
        <div class="hero-container"> 
            <img class="hero-image" src="./images/sky-earth-space-working.jpg" alt="Hero Image"> 
            <div class="overlay"></div> 
            <div class="hero-content"> 
                <h1>Web Conference</h1> 
                <span class="current-year">2024</span>
                <?php 
                    include("content_fetch.php"); 
                ?> 
            </div> 
        </div>
        <h2>Tracks</h2>
        <?php
        $sql = "SELECT horario.id, horario.sala, track.texto AS track_texto, track.nome AS track_nome, horario.data
                FROM horario
                INNER JOIN track ON horario.idTrack = track.id";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                    <div class='track'>
                        <div class='tracks'>
                            <span class='track-number'>" . $row["id"] . "</span>
                            <div class='track-container'>
                                <div class='track-left'>
                                    <span class='track-title'>" . $row["track_nome"] . "</span>
                                    <span class='track-description'>" . $row["track_texto"] . "</span>
                                </div>
                                <div class='track-right'>
                                    <span class='track-date'>" . $row["data"] . "</span>
                                    <span class='track-room'>" . $row["sala"] . "</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>";
            }
            // Close the database connection
            $db->close();
        } else {
            echo "<p>No articles found.</p>";
        }
        ?>
        <br>
    </div>
</main>
<?php
include "inc/bot.inc.php";
?>
