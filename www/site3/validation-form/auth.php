<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW);
    $pass = trim($_POST['pass']);

    $mysql = new mysqli('mysql-db', 'ale', 'secret', 'ale');

    // Используем подготовленный запрос
    $stmt = $mysql->prepare("SELECT * FROM users_3 WHERE login=?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Такой пользователь не найден";
        exit();
    }

    $user = $result->fetch_assoc();
    if (password_verify($pass, $user['pass'])) {
        setcookie('user', $user['name'], time() + 3600, "/");
        $mysql->close();
        header('Location: /');
    } else {
        echo "Неправильный пароль";
    }
} else {
    echo "Данные не были отправлены методом POST";
}
?>
