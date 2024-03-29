<?php include("inc/top.inc.php");
include("content_fetch.php");
?>
<style>
.noticeQuestion{
  font-weight: bold;
  color: #ffa600;
};

</style>


<div class="art">
<?php
include("inc/config.inc.php");

$articleId = isset($_COOKIE['articleId']) ? $_COOKIE['articleId'] : null;
$sql = "SELECT horario.id, horario.idArtigo, artigo.titulo AS artigo_name, artigo.descricao AS artigo_descricao, artigo.autores AS artigo_autor, horario.sala, horario.`data` FROM horario
        INNER JOIN artigo ON horario.idArtigo = artigo.id
        INNER JOIN track ON horario.idTrack = track.id WHERE horario.id = $articleId";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $idArtigo = $row["idArtigo"];
    $_SESSION["idArtigo"] = $idArtigo;
    echo $idArtigo;
    
    echo "
        <div class='art-container'>
            <h1 class='art-title'>" . $row["artigo_name"] . "</h1>
            <span class='art-author'>By " .  $row["artigo_autor"] . "</span>
            <span class='article-time'>" . $row["data"] . "</span>
            <span class='art-description'>Description</span>
            <p class='art-description-text'>" . $row["artigo_descricao"] . "</p>
        </div>";
} else {
    echo "<tr><td colspan='4'>No results found</td></tr>";
}
?>


</div>
<h2 class="questions-h2">Questions</h2>
<hr>
<div class="questions">
    <?php
    $idArtigoFromSession = isset($_SESSION["idArtigo"]) ? $_SESSION["idArtigo"] : '';
    $sqlQuestions = "SELECT pergunta FROM pergunta WHERE idArtigo = '$idArtigoFromSession'";
    $resultQuestions = $db->query($sqlQuestions);

    if ($resultQuestions->num_rows > 0) {
        while ($rowQuestion = $resultQuestions->fetch_assoc()) {
            echo "<div class='question'><p class='question-text'>" . $rowQuestion["pergunta"] . "</p></div>";
        }
    } else {
        echo "<p>No questions yet.</p>";
    }
    ?>
<?php
if (!isset($_SESSION['user'])) {
    echo "<div class='question'><p class='noticeQuestion'><b>Please login to submit questions.</b></p></div>";
} else {
?>
    <form class='question-box' method='post' action='do_create_question.php'>
        <input type='hidden' name='id' value='<?php echo $idArtigo; ?>'>
        <textarea class='question-input' name='text' required></textarea><br>
        <input class='submit-btn' type='submit' value='Submit'>
    </form>
<?php
}
?>

<?php include("inc/bot.inc.php"); ?>