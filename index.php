<?php
include("inc/autentica.inc.php");
include "inc/top.inc.php";
include("content_fetch.php");

?>
<main id="special">
    <div class="blue-gradient">
        <div class="hero-container">
            <img class="hero-image" src="./images/sky-earth-space-working.jpg" alt="Hero Image">
            <div class="overlay"></div>
            <div class="hero-content">
                <h1>Web Conference</h1>
                <span class="current-year">2024</span>
                <?php
                $contentId = 1;
                $contentText = getContentById($contentId, $db);
                echo '<p class="description">' . $contentText . '</p>';
                ?>
            </div>
        </div>
        <h2>Tracks</h2>
        <?php
        $sql = "SELECT horario.id, horario.sala, track.texto AS track_texto, track.nome AS track_nome, horario.data
        FROM horario INNER JOIN track ON horario.idTrack = track.id";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $uniqueTracks = array(); // Array to store unique track names
            while ($row = $result->fetch_assoc()) {
                $trackName = $row["track_nome"];

                // Check if track has already been displayed
                if (!in_array($trackName, $uniqueTracks)) {
                    echo "
                    <div class='track'>
                        <div class='tracks'>
                            <span class='track-number'>" . $counter . "</span>
                            <div class='track-container'>
                                <div class='track-left'>
                                    <span class='track-title'>" . $trackName . "</span>
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

                    $uniqueTracks[] = $trackName; // Add track to the unique tracks array
                }
            }
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