<?php
    require('conection.php');

    $sql = "select p.id as 'id', p.nome as 'nome', c.nome as 'categoria', c.id as 'idcategoria' from produto p join categoria c on p.idcategoria = c.id order by p.id";
    
    $select = $conection->prepare($sql);
    $select->execute();
    $result = $select->fetchAll(pdo::FETCH_ASSOC);
    $array = array();
    foreach ($result as $key => $value) {
        $array = $value;
    };

    echo json_encode($result);
?>