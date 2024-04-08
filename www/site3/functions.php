<?php

// Файл functions.php

include 'classes/Db.php'; // Подключаем класс базы данных
$db_config = include 'config.php'; // Получаем конфигурацию базы данных
$db = Db::getInstance()->getConnection($db_config['db']); // Получаем объект базы данных

function print_arr($data): void
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
}

function getCount(string $table, $db): int
// function getCount(string $table): int 
{
    // global $db;

    // Проверяем, был ли передан объект $db
    if (!$db) {
        echo "Failed to connect to the database.";
        return 0; // Возвращаем 0, чтобы показать, что произошла ошибка
    }

    return $db->query("SELECT COUNT(*) FROM {$table}")->findColumn();
}

function get_cities(int $start, int $per_page, $db): array
{
    // global $db; // задан через 3-ий параметр
    return $db->query("SELECT * FROM city LIMIT $start, $per_page")->findAll();
}