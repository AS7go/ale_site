<?php

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

    // echo "Connected to MySQL successfully using PDO";

    // Handle POST request
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     if (isset($_POST['submit'])) {

    //         $name = $_POST['name'];

    //         // if (preg_match('/^[\p{L}\d\-\_\.\ʼ\s]+$/u', $name)) {
    //         //     echo "Валидный ввод";
    //         // } else {
    //         //     echo "Невалидный ввод";
    //         // }

    //         $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            
    //         // Prepare statement with placeholders
    //         $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
    //         $stmt = $pdo->prepare($sql);

    //         // Bind values to placeholders
    //         $stmt->bindValue(1, $name, PDO::PARAM_STR);
    //         $stmt->bindValue(2, $email, PDO::PARAM_STR);

    //         // Execute statement
    //         $stmt->execute();

    //         echo "<br>Data inserted successfully";
    //     }
    // }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {
    
            $name = $_POST['name'];
    
            // Проверка ввода имени
            if (!preg_match('/^[\p{L}\d\-\_\.\ʼ\s]+$/u', $name)) {
                // header("Location: index.php");
                // header("Location: form.php");
            
                echo "$name <br>Невалидный ввод имени. Разрешены только буквы, цифры, тире, подчеркивание, точка, апостроф и пробел.";
                echo '<br><a href="index.php">Назад</a>'; // Кнопка "Назад"
                exit; // Прекратить выполнение скрипта
                // return; // Прекратить выполнение скрипта
            }
    
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
            // Подготовка и выполнение запроса
            $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $name, PDO::PARAM_STR);
            $stmt->bindValue(2, $email, PDO::PARAM_STR);
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