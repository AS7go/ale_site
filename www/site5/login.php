<?php

session_start();

require_once __DIR__ . '/incs/config.php';
require_once ROOT . '/incs/functions.php';

$title = 'Login';

require_once VIEWS . '/login.tpl.php';