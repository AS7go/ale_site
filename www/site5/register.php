<?php

session_start();

require_once __DIR__ . '/incs/config.php';
require_once ROOT . '/incs/db.php';
require_once ROOT . '/incs/functions.php';

if(check_auth()){
    redirect('secret.php');
}

$title = 'Register';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = load(['name', 'email', 'password']);

    if(true===($validate = check_required_fields($data))){
        if(register($data)){
            redirect('login.php');
            // header("Location: login.php");
            // die();
        }
    }else{
        $_SESSION['errors']=get_errors($validate);
        // header("Location: register.php");
        // die();
    }
   
    // dump($validate);
    // dump($_POST);
    // dump($data);
}

require_once VIEWS . '/register.tpl.php';