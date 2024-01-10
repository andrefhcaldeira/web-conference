<?php

include "inc/top.inc.php";


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Your existing styles for the sidebar can be included here */
        /* ... */
    </style>
</head>
<body>
    <div>
    <!-- Include the sidebar -->
    <?php
    $currentPage = 'horario';
    include("inc/admin_sidebar.php");
    ?>
    </div>
  

</body>
</html>
<?php

include "inc/bot.inc.php";


?>