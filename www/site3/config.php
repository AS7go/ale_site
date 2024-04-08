<?php

return [
    'db' => [
        'host' => 'mysql-db',
        'dbname' => 'ale',
        'username' => 'ale',
        'password' => 'secret',
        'charset' => 'utf8',
        'options' => [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            // PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //указывать, если php < 8
        ],
    ],
    'per_page' => 10,
];
