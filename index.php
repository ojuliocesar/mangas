<?php
    session_start();

    error_reporting(E_ALL);

    $page = $_GET['page'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Title -->
    <title>Mangás</title>

    <!-- Meta TAGs -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/fonts/fonts.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div id="container">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="?page=home">Home</a>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="?page=create">Create</a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="?page=read">Read</a>
                </div>
            </div>
        </nav>

        <?php
        
        if (file_exists('./views/' . $page . '.php')) {
            require_once('./views/' . $page . '.php');
        }

        if (!isset($page)) {
            header("Location: ?page=home");
        }

        ?>
    </div>
</body>
</html>