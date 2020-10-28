<?php
    require('conection.php');
    require('classes/Produto.php');

    if(isset($_POST["produto"])) {
        $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING);
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);
        
        $new_produto = new Produto();
        $new_produto->setNome($produto);
        $new_produto->setCategoria($categoria);
        $new_produto_dao = new Produto_DAO($conection);
        $return = $new_produto_dao->add($new_produto);
        $retorno = array();
    
        if ($return) {
           $retorno["mensagem"] = 'Inserido com sucesso';
        } else {
            $retorno["mensagem"] = "Erro na Inserção!";
        };
        echo json_encode($retorno);
    } else {
        header('location: inicio.php');
        exit;
    };
?>