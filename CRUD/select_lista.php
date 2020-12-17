<?php
    require('conection.php');
    require('classe/Produto.php');

    $all = new Produto_DAO($conection);
    $produtos = $all->selectAll();

    echo json_encode($produtos);
?>