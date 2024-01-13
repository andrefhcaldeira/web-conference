<?php

include "inc/top.inc.php";


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

</style>
<body>
<div class="flex-container">
    <?php
    $currentPage = 'geral';
    include("inc/admin_sidebar.php"); ?>
<div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Texto</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("inc/config.inc.php");

                    $sql = "SELECT titulo, texto FROM conteudo";
                    $result = $db->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["titulo"] . "</td>
                                <td>" . $row["texto"] . "</td>
                                <td><button onclick=\"openEditPopup('')\">Edit</button></td>
                                </tr>";
                      }
                      $db->close();
                      ?>
                  </tbody>
              </table>
          </div>
      </div>
  </body>
</html>
<?php

include "inc/bot.inc.php";

?>