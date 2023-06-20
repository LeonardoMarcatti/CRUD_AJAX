<?php
setlocale(LC_ALL, "pt_BR.utf-8");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="icon" href="https://pt.seaicons.com/wp-content/uploads/2016/03/Apps-HTML-5-Metro-icon.png" type="image/png" sizes="16x16">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ec29234e56.js" crossorigin="anonymous" defer></script>
    <script type="text/javascript" src="ajax.js" defer></script>
    <script src="https://192.168.1.160/programacao/testes/Projetos/AJAX/select.php" defer></script>
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
                    <th>ID</th>
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
                    <h5 class="modal-title" id="mymodel">Atenção</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><small>&times;</small></span>
                    </button>
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
</body>

</html>