<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="description" content="Minimal HTML5 Document">
  <title><?= $title ?? 'TITLE'; ?></title>
  <!-- Bootstrap CSS -->
  <link href="/bootstrap4_6_2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- <ul class="navbar-nav mr-auto"> -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="secret.php">Secret</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Hello, User
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Logout</a>
            <a class="dropdown-item" href="#">Help</a>
          </div>
        </li>
      </ul>

    </div>
  </nav>
