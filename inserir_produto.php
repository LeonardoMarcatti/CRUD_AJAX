<?php
    require('conection.php');
    if(isset($_POST["produto"])) {
        $produto = $_POST["produto"];
        $categoria = $_POST['categoria'];
        
        $sql = "INSERT INTO produto(nome, idcategoria) VALUES('$produto', $categoria)";

        $retorno = array();
        $insere = $conection->query($sql);
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