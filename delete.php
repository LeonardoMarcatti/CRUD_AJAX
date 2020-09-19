<?php
    require('conection.php');

    if (isset($_POST['id'])) {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "delete from produto where id = :id";
        $delete = $conection->prepare($sql);
        $delete->bindParam(':id', $id);
        $delete->execute();
    };

    echo json_encode($retorno); 
?>