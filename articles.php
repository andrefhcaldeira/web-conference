<?php
include "inc/top.inc.php";
?>

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
            <input type="text" placeholder="Search...">
            <button type="submit">Search</button>
        </div>
        <?php
        // Include the database configuration file
        include("inc/config.inc.php");
    
        // SQL query to retrieve data from the database
        $sql = "SELECT id, titulo, autores, descricao FROM artigo";
        $result = $db->query($sql);
    
        if ($result->num_rows > 0) {
        // Output data from each row
            while ($row = $result->fetch_assoc()) {
                echo "
                    <a href='article_page.php' id='articleAnchor' onclick='document.cookie = articleId=" . $row["id"] . "; setArticleId(articleId);'>
                        <div class='article-container'>
                            <span class='article-title'>" . $row["titulo"] . "</span>
                            <span class='article-author'>" .  $row["autores"] . "</span>
                            <span class='article-time'>" . '19:00h Monday ' . $row["time"] . "</span>
                        </div>
                    </a>";
                }
    
                // Close the database connection
                $db->close();
        } else {
            echo "<tr><td colspan='4'>No results found</td></tr>";
        }
        ?>
    </div>
</div>

<?php
include "inc/bot.inc.php";
?>