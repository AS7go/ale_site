<?php

function dump($data): void
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function dd($data)
{
    // echo '<pre>' . print_r($data, 1) . '</pre>';
    dump($data);
    die();
}

// field substitution protection-защита от подмены полей
function load(array $fillable, $post = true)
{
    $load_data = $post ? $_POST : $_GET;
    $data = [];
    foreach ($fillable as $value) {
        if (isset($load_data[$value])) {
            $data[$value] = trim($load_data[$value]);
        } else {
            $data[$value] = '';
        }
    }

    return $data;
}

//check for completeness of fields-проверка на заполненность полей
function check_required_fields(array $data): true|array
{
    $errors = [];
    foreach ($data as $k => $v) {
        if (empty($v)) {
            $errors[] = "Не заполненно поле {$k}";
        }
    }

    if (!$errors) {
        return true;
    }
    return $errors;
}

function h(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES); //ENT_QUOTES-преобразовывает кавычки "" и '' от XSS атак
}

// оставлять заполненными поля при ошибке в register.tpl.php
function old(string $name, $post = true): string
{
    $load_data = $post ? $_POST : $_GET;
    return isset($load_data[$name]) ? h($load_data[$name]) : '';
}

function get_errors(array $errors): string
{
    $html = '<ul class="list-unstyled">';
    foreach ($errors as $error) {
        $html .= "<li>{$error}</li>";
    }
    $html .= '<ul>';
    return $html;
}

// вывод сообщений
function get_alerts(): void
{
    if (!empty($_SESSION['errors'])) {
        require VIEWS . '/incs/alert_danger.tpl.php';
        unset($_SESSION['errors']);
    }
    if (!empty($_SESSION['success'])) {
        require VIEWS . '/incs/alert_success.tpl.php';
        unset($_SESSION['success']);
    }
}
// include 'db.php';
// function register(PDO $db, array $data)
function register(array $data): bool
{
    global $db;
    try {
        $stmt = $db->prepare("SELECT COUNT(*) FROM users_5 WHERE email = ?");
        $stmt->execute([$data['email']]); //строка
        if ($stmt->fetchColumn()) {
            $_SESSION['errors'] = 'This email is already taken';
            return false;
        }
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        //обернуть в try catch
        // $stmt = $db->prepare("INSERT INTO users_5 (name, email, password) VALUES(?,?,?)");
        //именованные плейсхолдеры
        $stmt = $db->prepare("INSERT INTO users_5 (name, email, password) VALUES(:name,:email,:password)");
        $stmt->execute($data); // @param array $data
        $_SESSION['success'] = 'You have successfully registered';
        return true;
    } catch (PDOException $e) {
        $_SESSION['errors'] = 'Database error: ' . $e->getMessage();
    }
}
