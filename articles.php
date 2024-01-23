<?php

include("content_fetch.php");
include "inc/top.inc.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

?>
<script>
    function setCookieAndRedirect(articleId) {
        document.cookie = "articleId=" + articleId;
        window.location.href = 'article_page.php';
    }
</script>
<main>
    <div class="articles-wrapper">
        <div class="filters">
            <span class="filters-title">Filters</span> <br>
            <span class="tracks-title">Tracks:</span>
            <div class="article-tracks">
                <form>
                    <label>
                        <input type="radio" name="tracks" value="1">
                        1
                    </label>
                    <label>
                        <input type="radio" name="tracks" value="2">
                        2
                    </label>
                    <label>
                        <input type="radio" name="tracks" value="3">
                        3
                    </label>
                    <label>
                        <input type="radio" name="tracks" value="4">
                        4
                    </label>
                    <label>
                        <input type="radio" name="tracks" value="5">
                        5
                    </label>
                </form>
            </div>
            <span class="date-tile">Publication Date:</span>
            <div class="dates">
                <form class="dates-flex">
                    <label>
                        <input type="radio" name="dates" value="1">
                        <span>Last Week ()</span>
                    </label>
                    <label>
                        <input type="radio" name="dates" value="2">
                        <span>Last Month ()</span>
                    </label>
                    <label>
                        <input type="radio" name="dates" value="3">
                        <span>Last 3 Months ()</span>
                    </label>
                    <label>
                        <input type="radio" name="dates" value="4">
                        <span>Last 6 Months ()</span>
                    </label>
                    <label>
                        <input type="radio" name="dates" value="5">
                        <span>Last Year ()</span>
                    </label>
                </form>
            </div>
        </div>
        <div class="articles">
            <div>
                <h1 class="articles-h1">Articles</h1>
                <form method="post">
                    <input id='searchInput' type="text" name="search" placeholder="Search articles...">
                    <button type="submit" name="submit">Search</button>
                </form>
            </div>
            <div id="searchResults">
                <?php
                include("inc/config.inc.php");
                $sql = "SELECT horario.id, artigo.titulo AS artigo_name, artigo.autores AS artigo_autor, horario.sala, horario.`data` FROM horario
                INNER JOIN artigo ON horario.idArtigo = artigo.id
                INNER JOIN track ON horario.idTrack = track.id";
                $result = $db->query($sql);
                if (isset($_POST["submit"])) {
                    $str = $_POST["search"];
                    $sth = "SELECT horario.id, artigo.titulo AS artigo_name, artigo.autores AS artigo_autor, horario.sala, horario.`data` FROM horario
                    INNER JOIN artigo ON horario.idArtigo = artigo.id
                    INNER JOIN track ON horario.idTrack = track.id WHERE titulo LIKE '%$str%'";
                    $result = $db->query($sth);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<a href='article_page.php' id='articleAnchor' onclick='setCookieAndRedirect(" . $row["id"] . ")'>
                            <div class='article-container'>
                                <span class='article-title'>" . $row["artigo_name"] . "</span>
                                <span class='article-author'>" .  $row["artigo_autor"] . "</span>
                                <span class='article-time'>" . $row["data"] . "</span>
                            </div>
                          </a>";
                        }
                    } else {
                        echo "Does not exist";
                    }
                }

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<a href='article_page.php' id='articleAnchor' onclick='setCookieAndRedirect(" . $row["id"] . ")'>
                            <div class='article-container'>
                                <span class='article-title'>" . $row["artigo_name"] . "</span>
                                <span class='article-author'>" .  $row["artigo_autor"] . "</span>
                                <span class='article-time'>" . $row["data"] . "</span>
                            </div>
                          </a>";
                    }
                   
                } else {
                    echo "<p>No articles found.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</main>

<?php
include "inc/bot.inc.php";
?>