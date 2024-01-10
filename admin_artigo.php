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
        text-align: left;
    }

    .content th {
        background-color: #555;
        color: white;
    }
    .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
        }

        .close-btn {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
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
                    // Include the database configuration file
                    include("inc/config.inc.php");

                    // SQL query to retrieve data from the database
                    $sql = "SELECT titulo, autores, descricao FROM artigo";
                    $result = $db->query($sql);

                    // Output data from each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["titulo"] . "</td>
                                <td>" . $row["autores"] . "</td>
                                <td>" . $row["descricao"] . "</td>
                                <td><button onclick=\"openEditPopup('')\">Edit</button></td>
                                </tr>";
                      }
  
                      // Close the database connection
                      $db->close();
                      ?>
                  </tbody>
              </table>
          </div>
  
          <!-- Popup Form for Creating/Edit Artigo -->
          <div class="popup-container" id="popup-container">
              <div class="popup">
                  <span class="close-btn" onclick="closePopup()">X</span>
                  <h2>Create/Edit Artigo</h2>
                  <!-- Include your form here -->
                  <!-- For simplicity, a basic form is shown below -->
                  <form id="artigo-form" method="post" action="do_create_artigo.php">
                      <label for="titulo">Title:</label>
                      <input type="text" id="titulo" name="titulo" required><br>
  
                      <label for="autores">Authors:</label>
                      <input type="text" id="autores" name="autores" required><br>
  
                      <label for="descricao">Description:</label>
                      <textarea id="descricao" name="descricao" required></textarea><br>
  
                      <input type="submit" value="Submit">
                  </form>
              </div>
          </div>
  
          <!-- Include JavaScript for popup functionality -->
          <script>
              function openPopup() {
                  document.getElementById("popup-container").style.display = "flex";
              }
  
              function openEditPopup(created) {
                  // You can modify this function to pre-fill the form with existing data
                  document.getElementById("popup-container").style.display = "flex";
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