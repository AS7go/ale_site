<!DOCTYPE html>
<html>

<head>
     <title>PHP Form with PDO</title>

     <!-- Bootstrap CSS -->
     <link href="/bootstrap4_6_2/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="/bootstrap4_6_2/css/fontawesome-free-5.15.4-web/css/all.css">

     <!-- Подключение стилей из отдельного файла -->
     <link rel="stylesheet" href="css/styles.css">
</head>

<body>
     <div class="container">
          <h1 class="mb-3 mt-3">Test PHP code</h1>

          <?php
          // Массив данных для карточек
          $cards = array(
               array(
                    "url" => "/site1",
                    "img_src" => "img/crud1.png",
                    "title" => "Add to database",
                    "text" => "Adding and viewing data in the database <br><br>",
                    "btn_text" => "Example 1"
               ),
               array(
                    "url" => "/site2",
                    "img_src" => "img/crud2.png",
                    "title" => "+++ CRUD",
                    "text" => "Create, Read, Update, Delete operations in the database.",
                    "btn_text" => "Example 2"
               ),
               array(
                    "url" => "/site3",
                    "img_src" => "https://dummyimage.com/300x200/6824b5/ffffff",
                    "title" => "Authentication authorization",
                    "text" => "old, doesn't work Authentication authorization database",
                    "btn_text" => "Example 3"
               ),
               array(
                    "url" => "/site4",
                    "img_src" => "img/di.png",
                    "title" => "Внедрение зависимостей DI",
                    "text" => "Простой пример с использованием MySql",
                    "btn_text" => "Example 4"
               ),
               array(
                    "url" => "/site5",
                    "img_src" => "img/crud53.png",
                    "title" => "+++ Авторизация и регистрация",
                    "text" => "Авторизация регистрация на чистом PHP, пример",
                    "btn_text" => "Example 5"
               ),
               array(
                    "url" => "/site6",
                    "img_src" => "https://dummyimage.com/300x200/6824b5/ffffff",
                    "title" => "Card title",
                    "text" => "Some quick example text to build on the card title and make up the bulk of the card's content.",
                    "btn_text" => "Go somewhere"
               )
          );

          // Распределение карточек по трем столбцам и двум строкам
          $rowCount = ceil(count($cards) / 3);
          $counter = 0;

          // HTML для карточек
          for ($row = 1; $row <= $rowCount; $row++) {
               echo '<div class="row">';
               for ($col = 1; $col <= 3; $col++) {
                    if ($counter < count($cards)) {
                         echo generateCardHtml($cards[$counter]);
                         $counter++;
                    }
               }
               echo '</div>';
          }

          // Функция для генерации HTML кода карточки
          function generateCardHtml($cardData)
          {
          return <<<HTML
            <div class="col-md-4">
                <div class="card mb-3">
                    <a href="{$cardData["url"]}">
                        <img src="{$cardData["img_src"]}" class="card-img-top p-1" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{$cardData["url"]}" class="card-link text-dark">{$cardData["title"]}</a>
                        </h5>
                        <p class="card-text">{$cardData["text"]}</p>
                        <a href="{$cardData["url"]}" class="btn btn-primary">{$cardData["btn_text"]}</a>
                    </div>
                </div>
            </div>
          HTML;
          }
          ?>
     </div>

     <script src="/bootstrap4_6_2/js/jquery.slim.min.js"></script>
     <script src="/bootstrap4_6_2/js/bootstrap.bundle.min.js"></script>
</body>

</html>