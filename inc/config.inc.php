<?php
$db = new mysqli('localhost', 'root', '', 'novatasks') or die("Não ligou");

function mypass($pass){
    $salt="sdkgfwgew";
    return md5(sha1($pass . $salt));
}