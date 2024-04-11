<?php

$config = require_once 'config.php';

require_once 'functions.php';
require_once 'classes/Db.php';
require_once 'classes/Pagination.php';
require_once 'classes/Validator.php';

// Инициализируем объект $db
$db = (Db::getInstance())->getConnection($config['db']);

$data = json_decode(file_get_contents('php://input'), true);

//pagination
if (isset($data['page'])) {
    $page = (int)$data['page'];
    $per_page = $config['per_page'];
    $total = get_count('city', $db);
    $pagination = new Pagination((int)$page, $per_page, $total);
    $start = $pagination->get_start();
    $cities = get_cities($start, $per_page, $db); //задание $db через параметр
    require_once 'views/index-content.tpl.php';
    die();
}

// Add city

if (isset($_POST['addCity'])){
    echo json_encode($_POST);
    die();
}