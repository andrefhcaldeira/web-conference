<?php if(session_id() == "") session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/novatasks.css">
    <title>Document</title>
</head>

<body>

<header>
    <nav class="clearfix">
        <div class="left"></div>
        <div class="right"><? include "inc/check-user.inc.php"; ?></div>
    </nav>
</header>
