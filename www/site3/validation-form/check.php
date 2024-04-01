<?php
$login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
$name = filter_var(trim($_POST['name']), FILTER_UNSAFE_RAW);
$pass = trim($_POST['pass']);

if(mb_strlen($login)<2||mb_strlen($login)>50){
    echo "Недопустимая длина логина";
    exit();
}elseif(mb_strlen($name)<2||mb_strlen($name)>50){
    echo "Недопустимая длина имени";
    exit();
}elseif(mb_strlen($pass)<2||mb_strlen($pass)>10){
    echo "Недопустимая длина пароля (от 2 до 10 символов)";
    exit();
}

// Хешируем пароль с помощью password_hash
$passHash = password_hash($pass, PASSWORD_DEFAULT);

$mysql = new mysqli('mysql-db', 'ale', 'secret', 'ale');
$stmt = $mysql->prepare("INSERT INTO `users_3` (`login`, `pass`, `name`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $login, $passHash, $name);
$stmt->execute();
$mysql->close();

header('Location: /');
?>
