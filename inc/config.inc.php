<?php
$db = new mysqli('localhost', 'root', '', 'web-conference') or die("Não ligou");

if (!function_exists('mypass')) {
    function mypass($pass){
        $salt="sdkgfwgew";
        return md5(sha1($pass . $salt));
    }
}
