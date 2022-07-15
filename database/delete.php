<?php

session_start();

require('../classes/Manga.php');

$manga = new Manga;

if (isset($_GET['id'])) {
    $delete = $manga->delete($_GET['id']);

    $_SESSION['msg'] = 'Deletado com sucesso';

    header("Location: ../index.php?page=read");
}