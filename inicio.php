<?php
    setlocale(LC_ALL, "pt_BR.utf-8");    
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="icon" href="https://pt.seaicons.com/wp-content/uploads/2016/03/Apps-HTML-5-Metro-icon.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="ajax.css">
        <title>AJAX</title>
    </head>
    <body class="container-fluid">
        <div id="form" class="col-md-3 float-md-left">
            <form action="" method="post" enctype="multipart/form-data" id="myform">
                <div class="form-group row">
                    <label for="produto">Insira produto:</label>
                    <input type="text" name="produto" id="produto" class="form-control" required="">
                </div>
                <div class="form-group row">
                    <label for="categoria">Categoria:</label>
                    <select name="categoria" id="categoria" class="form-control"></select>
                </div>
                <div class="form-group row">
                    <input type="submit" value="Adicionar" class="btn btn-warning" id="submit">
                </div>
            </form>
        </div>
        <div id="lista">
            <table class="table table-sm col-md-9 table-hover table-bordered table-striped">
                <thead class="thead-dark text-center">
                    <tr>
                        <th class="">ID</th>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Editar</th>
                        <th>Apagar</th>
                    </tr>
                </thead>
                <tbody id="mybody"></tbody>
            </table>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="delmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><small>&times;</small></span>
                </button>
            </div>
            <div class="modal-body">
                <p> Deseja mesmo deletar o item </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="deletar" value="">Deletar!</button>
            </div>
            </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/ec29234e56.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="ajax.js"></script>
        <script src="https://192.168.1.160/programacao/testes/Projetos/AJAX/select.php"></script>
    </body>
</html>
