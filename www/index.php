<?php
// ^[a-zA-Zа-яА-ЯёЁіІїЇєЄ0-9\s\-_.]+$
// ^[a-zA-Zа-яА-ЯёЁіІїЇєЄ0-9\s\-_.]+$
    // $string = "Привет, мир!123-_.АБВГДЕёжзиЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ";
    // $input = "Привіт мир - 12Їs_sSSЫЫЫыы._Ґ Ґґʼ ' Пзз0490ггггггБгГгггГїгггггггггггггггггГГггГГкtt";
    $input = "Привіт мир12ЇssSS-ЫЫЫыыIiІі _Ґ Ґґʼ  Пзз0490гг..ггггБг_ггГїгГкttÄÖÜäöüß";

    if (preg_match('/^[\p{L}\d\-\_\.\ʼ\s]+$/u', $input)) {
    // if (preg_match('/^[a-zA-Zа-яА-ЯёЁіІїЇєЄҐґ0-9\s\-_ʼ.]+$/u', $input)) {
        echo "Валидный ввод";
    } else {
        echo "Невалидный ввод";
    }
echo '<br><br>';

try {

    // === для http://ale.ho.ua
    // $host = 'localhost';
    // $user = 'ale';
    // $pass = '****'; //пароль
    // $db = 'ale';

    // === для Docker compose
    $host = 'mysql-db';
    $user = 'ale';
    $pass = 'secret';
    $db = 'ale';

    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to MySQL successfully using PDO";

    // Handle POST request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {

            // if (isset($_POST['name'])) {
            //     // Очистка имени
            //     $startTime = microtime(true);
            //     $name = htmlspecialchars($_POST['name']);
            //     $endTime = microtime(true);
            //     $time1 = $endTime - $startTime;

            //     $startTime = microtime(true);
            //     $name = preg_replace('/[^a-zA-Z0-9-_.]/', '', $_POST['name']);
            // $name = preg_replace('/[^a-zA-Z0-9-_.\p{Cyrillic}]/', '', $_POST['name']);
            //     $endTime = microtime(true);
            //     $time2 = $endTime - $startTime;

            //     echo "Время выполнения htmlspecialchars(): " . $time1 . " секунд\n";
            //     echo "Время выполнения preg_replace(): " . $time2 . " секунд\n";
            // }
            // $string = "<h1>Привет, мир!</h1><script>alert('XSS-атака!');</script>";:

            // $name = htmlspecialchars($_POST['name']);
            //---------------
            // $string = "<h1>Привет, мир!</h1><script>alert('XSS-атака!');</script>";

            // Экранирование HTML-символов
            // $htmlspecialchars_string = htmlspecialchars($string);
            // $name_str = filter_var($string, FILTER_SANITIZE_STRING); 

            // Удаление JavaScript-кода
            // $preg_replace_string = preg_replace('/<script>(.*?)<\/script>/is', '', $string);

            // echo "Исходная строка: " . $string . "\n";
            // echo "Строка после htmlspecialchars(): " . $htmlspecialchars_string . "\n";
            // echo "Строка после preg_replace(): " . $preg_replace_string . "\n";
            // echo "Строка FILTER_SANITIZE_STRING после $name_str: " . $name_str . "\n";

            // Удаляем все теги <script> и их содержимое
            // $string_safe = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $string);

            // echo '11111111 --------' . $string_safe . '----';

            //---------------

        


            // $name = strip_tags($_POST['name']);
            // $name = htmlspecialchars($_POST['name']);
            // $name = htmlentities($_POST['name']);
            // $name = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $string);

            // $string = "<h1>Привет, мир!</h1><script>alert('XSS-атака!');</script>";
            // $string = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $string);
            // $name = strip_tags($string);
            // echo 'Введенный код = ' . $name;

            // $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');

            // $name = preg_replace('/[^а-яА-Яa-zA-Z0-9-_.\p{L}]/', '', $name);
            // $name = preg_replace('/[^a-zA-Z0-9-_.]/', '', $_POST['name']);
            // $name = preg_replace('/[^a-zA-Z0-9-_.\p{Cyrillic}]/', '', $_POST['name']);
            // $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
            
            $name = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $_POST['name']);
            $name = strip_tags($name);

            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            // Validate name and email (e.g., length, format)

            // Prepare statement with placeholders
            $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);

            // Bind values to placeholders
            $stmt->bindValue(1, $name, PDO::PARAM_STR);
            $stmt->bindValue(2, $email, PDO::PARAM_STR);

            // Execute statement
            $stmt->execute();

            echo "<br>Data inserted successfully";
        }
    }

    // Handle GET request
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['action']) && $_GET['action'] == 'fetch') {
            // Get data from database
            $sql = "SELECT * FROM users";
            $result = $pdo->query($sql);

            if ($result->rowCount() > 0) {
                echo "<br><br>Users:<br>";
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
                }
            } else {
                echo "<br>No users in the database";
            }
        }
    }

    $pdo = null; // Close the connection
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP Form with PDO</title>
</head>

<body>
    <h2>Submit Form</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Retrieve Data</h2>
    <a href="?action=fetch">Fetch Data</a>
</body>

</html>