<?php
session_start();
    if(empty($_POST))
        exit();
    $login = $_POST["login"];
    $password = md5($_POST["password"]);

    include 'db.php';
    $query = "SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'";
    $result = $link->query($query) or die($link->error);
    if($result->num_rows == 0){
        header("Location: /login.php?error=Неправильные логин или пароль");
    }

    $row = $result->fetch_assoc();
    $userId = $row['id'];
    $login = $row['login'];
    $_SESSION['userId'] = $userId;
    $_SESSION['login'] = $login;
    $link->close();
    if($login == 'admin')
        header("Location: /admin.php");
    else
        header("Location: /lk.php");
?>