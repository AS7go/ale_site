<?php

include 'db.php';

// Создаем переменные и присваиваем им значения, если они установлены
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$get_id = isset($_GET['id']) ? $_GET['id'] : null;

// Create
if (isset($_POST['add'])) {
    // Ваш код обработки
    if (!empty($name) && !empty($email)) {
        $sql = "INSERT INTO users_1(name, email) VALUES (?,?)";
        $query = $pdo->prepare($sql);
        $query->execute([$name, $email]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } else {
        // Обработка случая, когда name или email не установлены
        echo "Name и Email должны быть установлены.";
    }
}

// Read

$sql = $pdo->prepare("SELECT * FROM users_1 WHERE flag= 0");
$sql -> execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

// Read flag=1
$sqlFlag1 = $pdo->prepare("SELECT * FROM users_1 WHERE flag = 1");
$sqlFlag1->execute();
$resultFlag1 = $sqlFlag1->fetchAll(PDO::FETCH_OBJ);

// Update

if (isset($_POST['edit'])){
    $sql = ("UPDATE users_1 SET name=?, email=? WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$name, $email, $get_id]);
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

// Delete оставляет, делает не запрашиваемыми

if (isset($_POST['delete'])){
    $sql = ("UPDATE users_1 SET flag =1 WHERE id=?");
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

// Delete полностью удаляет

// if (isset($_POST['delete'])){
//     $sql = ("DELETE FROM users_1 WHERE id=?");
//     $query = $pdo->prepare($sql);
//     $query->execute([$get_id]);
//     if ($query) {
//         header("Location: " . $_SERVER['HTTP_REFERER']);
//     }
// }