<!DOCTYPE html>
<html>

<head>
    <title>PHP Form with PDO</title>
</head>

<body>
    <h2>Submit Form</h2>
    <?php
    // Проверяем наличие параметра запроса success и его значение
    // if (isset($_GET['success']) && $_GET['success'] === 'true') {
    //     echo "<p>Данные успешно введены!</p>";
    // }
    if (isset($_GET['success'])) {
        echo "<p>{$_GET['success']}</p>";
    }

    // Проверяем наличие параметра запроса error и его значение
    if (isset($_GET['error'])) {
        echo "<p>{$_GET['error']}</p>";
    }
    ?>
    <form method="post" action="process_form.php">
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Retrieve Data</h2>

    <!-- Кнопка для вызова include 'fetch_data.php'; -->
    <form method="get" action="index.php">
        <input type="hidden" name="action" value="fetch">
        <input type="submit" value="Fetch Data">
    </form>
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'fetch') {
        include 'fetch_data.php'; // Включаем файл fetch_data.php
    }
    ?>
    <br>
    <a href="javascript:history.back()" class="back-button">Назад</a>

</body>

</html>