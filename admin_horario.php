<?php

include "inc/top.inc.php";


?>

<script>
function openPopup() {
    document.getElementById("popup-container").style.display = "flex";
    document.getElementById("edit_conteudo_id").value = "";
}

function openEditPopups(conteudoId) {
    document.getElementById("popup-container").style.display = "flex";
    document.getElementById("edit_conteudo_id").value = conteudoId;
    var inputs = document.getElementsByClassName("form-input");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].removeAttribute("required"); 
    }
}

function closePopup() {
    document.getElementById("popup-container").style.display = "none";
}
</script>

<style>
         .flex-container {
        display: flex;
    }

    /* Content styles */
    .content {
        flex: 1;
        max-width: 1200px; /* Set your desired max-width */
        
    }

    /* Table styles */
    .content table {
        width: 100%;
        border-collapse: collapse;
    }

    .content th, .content td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .content th {
        background-color: #555;
        color: white;
    }
    .popup-container {
            color: black;
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        .popup {
            border-radius: 8px;
            position: relative;
            width: 300px;
            padding: 2em;
            background: #003f5c;
            color: white;
        }

        .close-btn {
            cursor: pointer;
            position: absolute;
            right: 30px;
            font-size: 1.5rem;
        }

    .artigo-form {
        display: flex;
        flex-flow: column;
        justify-content: center;
    }
    
    .form-input {
        width: 100%;
        border: 2px solid gray;
    }

    .submit-btn {
        width: 50%;
        margin: 1em auto;
    }

</style>
<body>
<div class="flex-container">
    <?php
    $currentPage = 'horario';
    include("inc/admin_sidebar.php"); ?>
<div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Artigo</th>
                        <th>Track</th>
                        <th>Sala</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th> <button onclick="openPopup()">Create Artigo</button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("inc/config.inc.php");

        $sql = "SELECT horario.id, artigo.titulo AS artigo_name, track.nome AS track_name, horario.sala, horario.`data`, horario.hora FROM horario
        INNER JOIN artigo ON horario.idArtigo = artigo.id
        INNER JOIN track ON horario.idTrack = track.id";
$result = $db->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["artigo_name"] . "</td>
            <td>" . $row["track_name"] . "</td>
            <td>" . $row["sala"] . "</td> 
            <td>" . $row["data"] . "</td>
            <td>" . $row["hora"] . "</td>
            <td><button onclick=\"openEditPopups('".$row["id"]."')\">Edit</button></td>
            </tr>";
}
                      $db->close();
                      ?>
                  </tbody>
              </table>
          </div>
      </div>
    <!-- Popup Form for Creating/Edit Artigo -->
    <div class="popup-container" id="popup-container">
    <div class="popup">
        <span class="close-btn" onclick="closePopup()">X</span>
        <h3>Edit Conteudo</h3>
        <form class="artigo-form" method="post" action="do_edit_conteudo.php">
            <input type="hidden" name="id" id="edit_conteudo_id" value="">
            <div>
                <label for="Title">Title:</label>
                <input class="form-input" type="text" id="Title" name="Title" required>
            </div>
            <div>
                <label for="Text">Text:</label>
                <textarea class="form-input" id="Text" name="Text" required></textarea>
            </div>
            <div>
                <label for="idArtigo">Artigo:</label>
                <select class="form-input" id="idArtigo" name="idArtigo" required>
                    <?php
                    $artigoQuery = "SELECT id, titulo FROM artigo";
                    $artigoResult = $db->query($artigoQuery);

                    while ($artigoRow = $artigoResult->fetch_assoc()) {
                        echo "<option value='" . $artigoRow["id"] . "'>" . $artigoRow["titulo"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="idTrack">Track:</label>
                <select class="form-input" id="idTrack" name="idTrack" required>
                    <?php
                    $trackQuery = "SELECT id, nome FROM track";
                    $trackResult = $db->query($trackQuery);

                    while ($trackRow = $trackResult->fetch_assoc()) {
                        echo "<option value='" . $trackRow["id"] . "'>" . $trackRow["nome"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <input class="submit-btn" type="submit" value="Submit">
        </form>
    </div>
</div>



  </body>

  
</html>
<?php

include "inc/bot.inc.php";

?>