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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="icon" href="https://phproberto.gallerycdn.vsassets.io/extensions/phproberto/vscode-php-getters-setters/1.2.3/1525759974843/Microsoft.VisualStudio.Services.Icons.Default" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="ajax.css">
        <title>PHP - Teste</title>    
    </head>
    <body>
        <?php
           echo "<div id=\"barra\"><a href=\"inicio.php\">Inicio</a></div>
           <div id=\"edit_form\" class=\"col-lg-4 offset-lg-4 col-sm-10 offset-sm-1\">
           <form action=\"\" method=\"post\" enctype=\"multipart/form-data\" id=\"editform\">
               <div class=\"form-group row\">
                   <label for=\"produto\">Nome do produto:</label>
                   <input type=\"text\" name=\"nome\" id=\"nome\" class=\"form-control\" value=\"$nome\">
               </div>
               <div class=\"form-group row\">
                   <label for=\"categoria\">Categoria:</label>
                   <select name=\"idcategoria\" id=\"idcategoria\" class=\"form-control\">";
                    foreach ($result as $key => $value) {
                        if ($id_categoria == $value['id']) {
                            echo "<option value=\"$value[id]\" selected=\"\">$value[nome]</option>";
                        } else {
                            echo "<option value=\"$value[id]\">$value[nome]</option>";
                        }                        
                    };
                   
                   echo"</select>
               </div>
               <input type=\"text\" value=\"$id\" name=\"id\" id=\"id\" hidden=\"\">
               <div class=\"form-group row\">
                   <input type=\"submit\" value=\"Alterar\" class=\"btn btn-warning btn-block col-6 offset-3\" id=\"submit\">
               </div>
           </form>
       </div>"
        ?>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript" src="ajax.js"></script>
    </body>
</html>