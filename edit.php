<?php
    require_once('conection.php');

        if (isset($_POST['nome'], $_POST['idcategoria'])) {
            $nome = $_POST['nome'];
            $idcategoria = $_POST['idcategoria'];
            $id = $_POST['id'];
    
            $sql = "update produto set nome = '$nome', idcategoria = $idcategoria where id = $id";
            $alteração = $conection->query($sql);
    
            if($alteração) {
                $result["sucesso"] = true;
                $result["mensagem"] = "Sucesso!";
            } else {
                $result["sucesso"] = false;
                $result["mensagem"] = "Erro na edição!";
            };
    
            echo json_encode($result);
        };
?>