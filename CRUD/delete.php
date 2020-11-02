<?php
    
    require 'conection.php';
    require 'classe/Produto.php';

    if (isset($_POST['id'])) {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $new_del_produto = new Produto_DAO($conection);
        $new_del_produto->delete($id);
    };
?>