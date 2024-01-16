<?php

include "inc/top.inc.php";
include("inc/autentica.inc.php");

// Check user type for admin pages
if ($_SESSION['userType'] !== 'admin') {
    echo "Access denied. You do not have permission to view this page.";
    // or redirect to an error page
    // header("Location: error.php");
    // exit();
}
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


 
<body>
<div class="flex-container">
    <!-- Include the sidebar -->
    <?php
    $currentPage = 'users';
    include("inc/admin_sidebar.php"); ?>
<div class="content">
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>User Type</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("inc/config.inc.php");

                    $sql = "SELECT id, username, `type` FROM users";
                    $result = $db->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["username"] . "</td>
                                <td>" . $row["type"] . "</td>
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
                  <form class="artigo-form" method="post" action="do_edit_users.php">
                  <input type="hidden" name="id" id="edit_artigo_id" value="">
                  <select name="userType">
                    <?php
                    $userTypeQuery = "SELECT DISTINCT type FROM users";
                    $userTypeResult = $db->query($userTypeQuery);

                    while ($userTypeRow = $userTypeResult->fetch_assoc()) {
                 echo "<option value='" . $userTypeRow["type"] . "'>" . $userTypeRow["type"] . "</option>";
                    }
                ?>
</select>
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