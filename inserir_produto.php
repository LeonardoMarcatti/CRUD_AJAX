<?php
    require('conection.php');
    if(isset($_POST["produto"])) {
        $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING);
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);
        
        $sql = "INSERT INTO produto(nome, idcategoria) VALUES(:produto, :categoria)";

        $retorno = array();
        $insere = $conection->prepare($sql);
        $insere->bindParam(':produto', $produto);
        $insere->bindParam(':categoria', $categoria);
        $insere->execute();
        if ($insere) {
           $retorno["sucesso"] = true;
           $retorno["mensagem"] = 'Inserido com sucesso';
        } else {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Erro na Inserção!";
        };
        echo json_encode($retorno);
    } else {
        header('location: inicio.php');
     };
?>