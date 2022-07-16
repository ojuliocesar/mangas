<?php

require_once(__DIR__ . '\..\classes\Manga.php');

$manga = new Manga;

if (isset($_POST['submit'])) {
    $create = $manga->create($_POST);
    
    if ($create) {
        header("Location: index.php?page=read");
    } else {
        echo "Erro ao cadastrar";
    }
}


?>

<main class="main-form">
    <h1 class="main-title">Create</h1>

    <form class="main-form" method="POST">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o Nome" required>
        </div>

        <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Digite o Autor" required>
        </div>

        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="form-control" name="category" id="category" required>
                <option value="" disabled selected>Selecione a categoria</option>
                <option value="1">Shounnen</option>
                <option value="2">Seinen</option>
                <option value="3">Terror</option>
                <option value="4">Aventura</option>
                <option value="5">Suspense</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Valor</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Digite o Valor" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</main>