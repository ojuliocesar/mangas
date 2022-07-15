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

<body style="background: #343a40;">
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th>id</th>
                <th>Categoria</th>
                <th>Nome</th>
                <th>Autor</th>
                <th>Valor</th>
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
                    <button> <a href="?page=update&id=<?= $id ?>">Update</a> </button>
                </td>

                <td>
                    <button> <a href="database/delete.php?id=<?= $id ?>">Delete</a> </button>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>