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

$conn->close();
?>