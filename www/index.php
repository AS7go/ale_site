<?php

// Database connection using PDO with prepared statements
try {
  $host = 'mysql-db';
  $user = 'db_user';
  $pass = 'secret';
  $db = 'test_database';

  $dsn = "mysql:host=$host;dbname=$db";
  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "Connected to MySQL successfully using PDO";

  // Handle POST request
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];

      // Prepare and execute statement with placeholder values
      $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
      $stmt->execute(array(':name' => $name, ':email' => $email));

      echo "<br>Data inserted successfully";
    }
  }

  // Handle GET request
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['action']) && $_GET['action'] == 'fetch') {
      // Prepare and execute statement
      $stmt = $pdo->prepare("SELECT * FROM users");
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        echo "<br><br>Users:<br>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
        }
      } else {
        echo "<br>No users in the database";
      }
    }
  }

  $pdo = null; // Close the connection
} catch(PDOException $e) {
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
