<?php

    require('conection.php');

    $sql = "select * from categoria order by id";
    $select = $conection->prepare($sql);
    $select->execute();
    $result = $select->fetchAll(pdo::FETCH_ASSOC);
    $id = array();

    foreach ($result as $key => $value) {
        $id[$key] = $value;
    };

    echo 'GetCategorias(' . json_encode($id) . ')';

    ?>