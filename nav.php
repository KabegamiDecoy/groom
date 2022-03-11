<?php 
function nav($item){

    if(empty($_SESSION['login'])) {
        $items = [
            "index.php" => "Главная",
            "login.php" => "Вход",
            "register.php" => "Регистрация",
        ];
    } else if($_SESSION['login'] == 'admin'){
        $items = [
            "index.php" => "Главная",
            "admin.php" => "Администрирование",
            "logout.php" => "Выход"
        ];
    } else {
        $items = [
            "index.php" => "Главная",
            "lk.php" => "Личный кабинет",
            "logout.php" => "Выход"
        ];
    }

    echo"<nav>";
    $i = 0;
    foreach($items as $key =>$value) {
        if($i == $item)
            echo"<a href='$key' class='active'>$value</a>";
        else
            echo"<a href='$key'>$value</a>";
        $i++;
    }
    echo"</nav>";
}
?>