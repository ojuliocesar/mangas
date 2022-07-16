<?php

require(__DIR__ . '\..\classes\Manga.php');

$manga = new Manga;

$read = $manga->read();

?>

<?php

if (isset($_SESSION['msg'])) { ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION['msg'] ?>
    </div>

<?php unset($_SESSION['msg']); } ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Categoria</th>
            <th>Nome</th>
            <th>Autor</th>
            <th>Valor</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach($read as $value): $id = $value['id_mangas'] ?> 

        <tr>
            <td><?php echo $value['id_mangas']?></td>
            <td><?php echo $value['categoria'] ?></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['author'] ?></td>
            <td><?php echo $value['price'] ?></td>

            <td>
                <a class="btn btn-primary" href="?page=update&id=<?= $id ?>">Update</a>
            </td>

            <td>
                <a class="btn btn-danger" href="database/delete.php?id=<?= $id ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>