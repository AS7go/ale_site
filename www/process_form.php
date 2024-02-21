<?php

include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];

        if (!preg_match('/^[\p{L}\d\-\_\.\ʼ\s]+$/u', $name)) {
            header("Location: index.php?error=Invalid name input");
            exit; // It is important to stop running the script after the redirect
        }

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $name, PDO::PARAM_STR);
        $stmt->bindValue(2, $email, PDO::PARAM_STR);
        $stmt->execute();

        // Redirect the user back to index.php with the success query parameter
        header("Location: index.php?success=Data inserted successfully");
        exit; // It is important to stop running the script after the redirect
    }
}
?>