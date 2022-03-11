<?php
    $dbhost = "localhost";
    $dbname = "groomroom";
    $dbuser = "root";
    $dbpassword = "root";

    $link = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
    if($link->connect_errno){
        echo"Ошибка при подключении к БД: $link->connect_error";
    }
?>