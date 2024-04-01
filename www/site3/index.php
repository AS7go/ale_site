<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма регистрации</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container mt-4">
        <?php
        // Проверяем существование и непустое значение куки 'users_3'
        if(isset($_COOKIE['users_3']) && $_COOKIE['users_3'] !== ''):
        ?>
        <p>Привет <?=$_COOKIE['users_3']?>. Чтобы выйти нажмите <a href="/exit.php">Здесь</a>.</p>
        <?php else: ?>
        <div class="row">
            <div class="col">
                <h2>Форма регистрации</h2>
                <form action="validation-form/check.php" method="post">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"><br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
                    <button class="btn btn-success" type="submit">Зарегистрировать</button>
                </form>
            </div>
            <div class="col">
                <h2>Форма авторизации</h2>
                <form action="validation-form/auth.php" method="post">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
                    <button class="btn btn-success" type="submit">Авторизоваться</button>
                </form>
            </div>
        </div>
        <?php endif;?>
    </div>
</body>

</html>
