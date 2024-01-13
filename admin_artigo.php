<?php

include "inc/top.inc.php";

?>

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
</style>

<head>
  
<body>
<div class="flex-container">
    <!-- Include the sidebar -->
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
  
                      $db->close();
                      ?>
                  </tbody>
              </table>
          </div>
  
          <!-- Popup Form for Creating/Edit Artigo -->
          <div class="popup-container" id="popup-container">
              <div class="popup">
                  <span class="close-btn" onclick="closePopup()">X</span>
                  <h3>Edit Artigo</h3>
                  <!-- Include your form here -->
                  <!-- For simplicity, a basic form is shown below -->
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
        // Reset the hidden input value for create
        document.getElementById("edit_artigo_id").value = "";
    }

    function openEditPopup(artigoId) {
        document.getElementById("popup-container").style.display = "flex";
        // Set the hidden input value for edit
        document.getElementById("edit_artigo_id").value = artigoId;

        // Add additional code to fetch existing data based on the artigoId
        // and populate the form fields if needed.
        // Example: fetchDataAndPopulateForm(artigoId);
    }

    function closePopup() {
        document.getElementById("popup-container").style.display = "none";
    }
</script>

  
      </div>
  
  </body>
  </html>
<?php

include "inc/bot.inc.php";


?>