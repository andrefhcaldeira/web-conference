<?php if(session_id() == "") session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/novatasks.css">
    <title>Web Conference</title>
</head>

<body>
<nav>
    <div class="nav-container">
        <a href="./index.php">
            <img class="logo" src="./images/ExploraSci.png">
        </a>
        <a href="location.php">Local</a>
        <a href="articles.php">Artigos</a>
        <a href="#">Tracks</a>
        <a href="login.php">Login</a>
    </div>
</nav>
<? include "inc/check-user.inc.php";?>
