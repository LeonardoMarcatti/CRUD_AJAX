<?php
setlocale(LC_ALL, "pt_BR.utf-8");
require('conection.php');

$nome = $_GET['nome'];
$id_categoria = $_GET['idcategoria'];
$id = $_GET['id'];

$sql = "select * from categoria order by id";
$result = $conection->query($sql);
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=yes">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/3/31/Webysther_20160423_-_Elephpant.svg" type="image/png" sizes="16x16">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ec29234e56.js" crossorigin="anonymous" defer></script>
    <script type="text/javascript" src="ajax.js" defer></script>
    <link rel="stylesheet" href="ajax.css">
    <title>PHP - Teste</title>
</head>

<body>
    <div id="barra"><a href="inicio.php">Inicio</a></div>
    <div id="edit_form" class="col-lg-4 offset-lg-4 col-sm-10 offset-sm-1">
        <form action="" method="post" enctype="multipart/form-data" id="editform">
            <div class="form-group row">
                <label for="produto">Nome do produto:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?= $nome ?>">
            </div>
            <div class="form-group row">
                <label for="categoria">Categoria:</label>
                <select name="idcategoria" id="idcategoria" class="form-control">
                    <?php
                    foreach ($result as $key => $value) {
                        if ($id_categoria == $value['id']) { ?>
                            <option value="<?= $value['id'] ?>" selected=""><?= $value['nome'] ?></option>
                        <?php
                        } else { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
                    <?php    }
                    }; ?>

                </select>
            </div>
            <input type="text" value="<?= $id ?>" name="id" id="id" hidden="">
            <div class="form-group row">
                <input type="submit" value="Alterar" class="btn btn-warning btn-block col-6 offset-3" id="submit">
            </div>
        </form>
    </div>
</body>

</html>