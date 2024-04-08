<?php

// Файл index.php

$config = require_once 'config.php';

require_once 'functions.php';
require_once 'classes/Db.php';
require_once 'classes/Pagination.php';

// Инициализируем объект $db
$db = (Db::getInstance())->getConnection($config['db']);

// Проверяем, был ли успешно инициализирован объект $db
if (!$db) {
    echo "Failed to connect to the database.";
    exit;
}

// $total = getCount('city'); // c использованием global $db; в functions.php
// $total = getCount('city', $db); //без global $db; в functions.php

$page = $_GET['page'] ?? 1;
$per_page = $config['per_page'];
$total = getCount('city', $db);
$pagination = new Pagination($page, $per_page, $total);
$start = $pagination->get_start();
$cities = get_cities($start, $per_page, $db); //задание $db через параметр
    
    // print_arr($cities);
require_once 'views/index.tpl.php';