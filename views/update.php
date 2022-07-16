<?php

require(__DIR__ . '\..\classes\Manga.php'); 

$manga = new Manga;

if (isset($_GET['id'])) {
    $data = $manga->readById($_GET['id']);
}

if (isset($_POST['submit'])) {
    $update = $manga->update($_POST);
    
    if ($update) {
        $_SESSION['msg'] = 'Atualizado com sucesso';

        header("Location: index.php?page=read");
    }
}

?>

<main class="main-form">  
    <h1 class="main-title">Update</h1>

    <form class="main-form" method="POST">
        <input type="hidden" name="id_mangas" id="id_mangas" value=" <?= $data['id_mangas'] ?>">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o Nome" required value="<?= $data['name'] ?>">
        </div>

        <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Digite o Autor" required value="<?= $data['author'] ?>">
        </div>

        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="form-control" name="category" id="category" required>
                <option value="1">Shounnen</option>
                <option value="2">Seinen</option>
                <option value="3">Terror</option>
                <option value="4">Aventura</option>
                <option value="5">Suspense</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Valor</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Digite o Valor" required value="<?= $data['price'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</main>