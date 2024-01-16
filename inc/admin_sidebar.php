


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>


        /* Sidebar styles */
        /* Sidebar styles */
        .sidebar {
            text-decoration: none;
            width: 80px;
            background-color: #333;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start; /* Align buttons to the top */
        }

        /* Sidebar button styles */
        .sidebar button {
            background-color: #555;
            border: none;
            color: white;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            display: block;
            font-size: 16px;
            width: 100%;
            cursor: pointer;
        }
        .sidebar button.active {
    background-color: blue; /* Adjust the color as needed */
    cursor: default; /* Remove pointer cursor */
    pointer-events: none; /* Disable click events */
}
    </style>
</head>
<body>

    <!-- Sidebar -->
<div class="sidebar">


    <?php if ($_SESSION['userType'] == 'admin') { ?>
        <button class="<?php echo ($currentPage == 'users') ? 'active' : ''; ?>" onclick="window.location.href='admin_users.php';">Users</button>
        <button class="<?php echo ($currentPage == 'artigos') ? 'active' : ''; ?>" onclick="window.location.href='admin_artigo.php';">Artigos</button>
        <button class="<?php echo ($currentPage == 'geral') ? 'active' : ''; ?>" onclick="window.location.href='admin_geral.php';">Info Geral</button>
        <button class="<?php echo ($currentPage == 'horario') ? 'active' : ''; ?>" onclick="window.location.href='admin_horario.php';">Horário</button>
    <?php } ?>

    <?php if ($_SESSION['userType'] == 'admin' || $_SESSION['userType'] == 'trackadmin') { ?>
        <button class="<?php echo ($currentPage == 'track') ? 'active' : ''; ?>" onclick="window.location.href='admin_track.php';">Tracks</button>
    <?php } ?>
</div>



</body>
</html>