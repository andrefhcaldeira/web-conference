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
                $sql = "SELECT DISTINCT artigo.id, artigo.titulo AS artigo_name, artigo.autores AS artigo_autor, horario.sala, horario.`data` 
                FROM horario
                INNER JOIN artigo ON horario.idArtigo = artigo.id
                INNER JOIN track ON horario.idTrack = track.id
                GROUP BY artigo.id";
        
                $result = $db->query($sql);
                if (isset($_POST["submit"])) {
                    $str = $_POST["search"];
                    $sth = "SELECT DISTINCT artigo.id, artigo.titulo AS artigo_name, artigo.autores AS artigo_autor, horario.sala, horario.`data` 
                    FROM horario
                    INNER JOIN artigo ON horario.idArtigo = artigo.id
                    INNER JOIN track ON horario.idTrack = track.id
                    WHERE artigo.titulo LIKE '%$str%'
                    GROUP BY artigo.id";
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