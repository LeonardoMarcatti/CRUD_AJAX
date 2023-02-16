<?php
    require 'conection.php';
    require 'classe/Produto.php';

    use AJAX\CRUD\classe\Produto_DAO;

    $all = new Produto_DAO($conection);
    $produtos = $all->selectAll();

    echo json_encode($produtos);
?>