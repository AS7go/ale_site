<?php

try {
    $db_config = [
        'host' => 'mysql-db',
        'user' => 'ale',
        'pass' => 'secret',
        'db' => 'ale'
    ];

    $dsn = "mysql:host={$db_config['host']};dbname={$db_config['db']};charset=utf8mb4";
    $opt = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //до php 8 нужно было указывать эту строку
    ];

    $db = new PDO($dsn, $db_config['user'], $db_config['pass'], $opt);
} catch (PDOException $e) {
    echo 'Ошибка подключения к базе данных' . $e->getMessage();
}
