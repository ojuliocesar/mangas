<?php

require(__DIR__ . '\..\classes\Manga.php');

$manga = new Manga;

$read = $manga->read();

?>

<div id="list">
    <?php foreach($read as $value): ?>
    <figure>
        <img class="image-book" src="assets/images/<?= $value['banner'] ?>" alt="Imagem do Livro">

        <figcaption>
            <h4><?= $value['name'] ?></h4>
            <h6><?= $value['author'] ?></h6>
            <small><?= $value['categoria'] ?></small>
            <h5>R$ <?= $value['price'] ?></h5>
        </figcaption>
    </figure>
    <?php endforeach ?>
</div>