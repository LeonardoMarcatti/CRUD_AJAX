<?php
require_once('conection.php');

if (isset($_POST['nome']) && isset($_POST['idcategoria'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_UNSAFE_RAW);
    $idcategoria = filter_input(INPUT_POST, 'idcategoria', FILTER_SANITIZE_NUMBER_INT);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    $sql = "update produto set nome = :nome, idcategoria = :idcategoria where id = :id";
    $update = $conection->prepare($sql);
    $update->bindParam(':nome', $nome);
    $update->bindParam(':idcategoria', $idcategoria);
    $update->bindParam(':id', $id);
    $update->execute();

    if ($update) {
        $result["mensagem"] = 'Sucesso!';
    } else {
        $result["mensagem"] = "Erro na edição!";
    };

    echo json_encode($result);
};
