<?php
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['action']) && $_GET['action'] == 'fetch') {
        $sql = "SELECT * FROM users";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            echo "<br>Users:<br>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "Id: " . $row["id"] . " Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
            }
        } else {
            echo "<br>No users in the database";
        }
    }
}
?>
