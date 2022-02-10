<?php
    setlocale(LC_ALL, "pt_BR.utf-8");
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=yes">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" href="https://phproberto.gallerycdn.vsassets.io/extensions/phproberto/vscode-php-getters-setters/1.2.3/1525759974843/Microsoft.VisualStudio.Services.Icons.Default" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="ajax.css">
        <title>AJAX</title>
    </head>
    <body class="container-fluid">
        <div class="row">
            <div id="form" class="col-md-3 float-start">
                <form action="" method="post" enctype="multipart/form-data" id="myform">
                    <div class="form-group mb-3">
                        <label for="produto">Insira produto:</label>
                        <input type="text" name="produto" id="produto" class="form-control" required="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="categoria">Categoria:</label>
                        <select name="categoria" id="categoria" class="form-control"></select>
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" value="Adicionar" class="btn btn-warning" id="submit">
                    </div>
                </form>
            </div>
            <div id="lista" class="col-8">
                <table class="table table-sm table-hover table-bordered table-striped float-end">
                    <thead class="table-dark text-center">
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-6">Produto</th>
                            <th class="col-2">Categoria</th>
                            <th class="col-1">Editar</th>
                            <th class="col-1">Apagar</th>
                        </tr>
                    </thead>
                    <tbody id="mybody"></tbody>
                </table>
            </div>   
        </div>
        <!-- Modal -->
        <div class="modal fade" id="delmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mymodel">Atenção</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p> Deseja mesmo deletar o item </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="deletar" value="">Deletar!</button>
                </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/ec29234e56.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="ajax.js"></script>
        <script src="https://192.168.10.160/programacao/testes/Projetos/AJAX/select.php"></script>
    </body>
</html>