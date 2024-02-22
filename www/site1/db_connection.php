<?php

try {
    $host = 'mysql-db';
    $user = 'ale';
    $pass = 'secret';
    $db = 'ale';

    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // It is important to stop running the script after the redirect
}
?>
