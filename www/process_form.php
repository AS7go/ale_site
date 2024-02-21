<?php
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];

        if (!preg_match('/^[\p{L}\d\-\_\.\ʼ\s]+$/u', $name)) {
            // echo "$name <br>Невалидный ввод имени. Разрешены только буквы, цифры, тире, подчеркивание, точка, апостроф и пробел.";
            // echo "Невалидный ввод имени. Разрешены только буквы, цифры, тире, подчеркивание, точка, апостроф и пробел.";
            // echo '<br><a href="index.php">Назад</a>'; // Кнопка "Назад"
            header("Location: index.php?error=Invalid name input");
            exit; // Прекратить выполнение скрипта
        }

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $name, PDO::PARAM_STR);
        $stmt->bindValue(2, $email, PDO::PARAM_STR);
        $stmt->execute();

        // echo "<br>Data inserted successfully";

        // Перенаправляем пользователя обратно на index.php с параметром запроса success
        header("Location: index.php?success=true");
        exit; // Важно прекратить выполнение скрипта после перенаправления
    }
}
