<?php
    require('conection.php');

    $sql = "select p.id as 'id', p.nome as 'nome', c.nome as 'categoria', c.id as 'idcategoria' from produto p join categoria c on p.idcategoria = c.id order by p.id";
    
    $r2 = $conection->query($sql, pdo::FETCH_ASSOC);
    $r3 = $r2->fetchAll();
    $result = array();
    foreach ($r3 as $key => $value) {
        $result[$key] = $value;
    };

    echo json_encode($result);
?>