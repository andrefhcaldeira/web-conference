<?php
$db = new mysqli('localhost', 'root', '', 'conferencedb') or die("Não ligou");

if (!function_exists('mypass')) {
    function mypass($pass){
        $salt="sdkgfwgew";
        return md5(sha1($pass . $salt));
    }
}
