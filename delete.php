<?php
    require('conection.php');

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "delete from produto where id = '$id'";
        $result = $conection->query($sql);
        if ($result) {
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Exclusão efetuada com sucesso!";
        } else {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha na exclusão!";
        };        
    };

    echo json_encode($retorno); 
?>