<?php

$host = 'mysql-db';
$user = 'db_user';
$pass = 'secret';
$db = 'test_database';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to MySQL successfully";

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Insert data into the database
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "<br>Data inserted successfully";
        } else {
            echo "<br>Error inserting data: " . $conn->error;
        }
    }
}

// Handle GET request
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['action']) && $_GET['action'] == 'fetch') {
        // Retrieve data from the database
        $result = $conn->query("SELECT * FROM users");
        if ($result->num_rows > 0) {
            echo "<br><br>Users:<br>";
            while ($row = $result->fetch_assoc()) {
                echo "Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
            }
        } else {
            echo "<br>No users in the database";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form</title>
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