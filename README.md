http://localhost:8000/
  
http://localhost:8081/index.php?route=/&route=%2F&db=test_database
  
MYSQL_ROOT_PASSWORD: secret  
MYSQL_DATABASE: ale  
MYSQL_USER: ale  
MYSQL_PASSWORD: secret  

docker-compose up --build  
docker-compose down  
docker-compose up -d  

Добавить sql запрос 
   
CREATE TABLE users (  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    name VARCHAR(255) NOT NULL,  
    email VARCHAR(255) NOT NULL  
);  

=== docker-compose.yml ================================  
version: '3.9'
services:
  webserver:
    container_name: PHP-1
    build: 
      context: .
      dockerfile: Dockerfile
    volumes:
      - ./www:/var/www/html
    ports:
      - 8000:80
    depends_on:
      - mysql-db

  mysql-db:
    container_name: mysql-1
    image: mysql:8.0
    environment:
      MYSQL_ROOT_PASSWORD: secret
      MYSQL_DATABASE: ale
      MYSQL_USER: ale
      MYSQL_PASSWORD: secret
    volumes:
      - ./www/mysql-data:/var/lib/mysql
    ports:
      - "3306:3306"

  phpmyadmin:
    container_name: phpmyadmin-1
    image: phpmyadmin/phpmyadmin
    depends_on:
      - mysql-db
    ports:
      - "8081:80"
    environment:
      PMA_HOST: mysql-db
      MYSQL_ROOT_PASSWORD: secret


  
=== index.php ============================================  
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

    echo "Connected to MySQL successfully using PDO";

    // Handle POST request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];

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