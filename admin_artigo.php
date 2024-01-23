<?php
include("content_fetch.php");
include "inc/top.inc.php";
include("inc/autentica.inc.php");


if ($_SESSION['userType'] !== 'admin') {
    header("Location: home.php");
}
?>

<style>
       .flex-container {
        display: flex;
    }

    .content {
        flex: 1;
        max-width: 1200px; 
        
    }

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


<head>
  
<body>
<div class="flex-container">
    <?php
    $currentPage = 'artigos';
    include("inc/admin_sidebar.php"); ?>
<div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Authors</th>
                        <th>Description</th>
                        <th> <button onclick="openPopup()">Create Artigo</button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("inc/config.inc.php");

                    $sql = "SELECT id, titulo, autores, descricao FROM artigo";
                    $result = $db->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["titulo"] . "</td>
                                <td>" . $row["autores"] . "</td>
                                <td>" . $row["descricao"] . "</td>
                                <td><button onclick=\"openEditPopup('".$row["id"]."')\">Edit</button>
                                <button onclick=\"deleteArtigo('" . $row["id"] . "')\">Delete</button></td>
                                </tr>";
                      }
                      ?>
                  </tbody>
              </table>
          </div>
          <div class="popup-container" id="popup-container">
              <div class="popup">
                  <span class="close-btn" onclick="closePopup()">X</span>
                  <h3>Edit Artigo</h3>
                  <form class="artigo-form" method="post" action="do_create_artigo.php">
                  <input type="hidden" name="id" id="edit_artigo_id" value="">
                    <div>
                        <label for="titulo">Title:</label>
                        <input class="form-input" type="text" id="titulo" name="titulo" required><br>
                    </div>
                    <div>
                        <label for="autores">Authors:</label>
                        <input class="form-input" type="text" id="autores" name="autores" required><br>
                    </div>
                    <div>
                        <label for="descricao">Description:</label>
                        <textarea class="form-input" id="descricao" name="descricao" required></textarea><br>
                    </div>
                      <input class="submit-btn" type="submit" value="Submit">
                  </form>
              </div>
          </div>

    <script>
    function openPopup() {
        document.getElementById("popup-container").style.display = "flex";
        document.getElementById("edit_artigo_id").value = "";
    }

    function openEditPopup(artigoId) {
        document.getElementById("popup-container").style.display = "flex";
        document.getElementById("edit_artigo_id").value = artigoId;
        var inputs = document.getElementsByClassName("form-input");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].required = false;
    }
    }

    function closePopup() {
        document.getElementById("popup-container").style.display = "none";
    }

    function deleteArtigo(artigoId) {
        if (confirm("Are you sure you want to delete this article?")) {
            var form = document.createElement("form");
            form.method = "post";
            form.action = "do_delete_artigo.php";
            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "id";
            input.value = artigoId;

            form.appendChild(input);

            document.body.appendChild(form);

            form.submit();
        }
    }

</script>

  
      </div>
  
  </body>
  </html>
<?php

include "inc/bot.inc.php";


?>