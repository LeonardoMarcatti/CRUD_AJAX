<?php
    require_once('conection.php');
    require_once 'classe/Produto.php';

        if (isset($_POST['nome'], $_POST['idcategoria'])) {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $idcategoria = filter_input(INPUT_POST, 'idcategoria', FILTER_SANITIZE_NUMBER_INT);
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    
            $update_produto = new Produto();
            $update_produto->setNome($nome);
            $update_produto->setCategoria($idcategoria);
            $update_produto->setID($id);
            $update_produto_dao = new Produto_DAO($conection);
            $update = $update_produto_dao->update($update_produto);

            if($update) {
                $result["mensagem"] = "Sucesso!";
            } else {

                $result["mensagem"] = "Erro na edição!";
            };
    
            echo json_encode($result);
        };
?>