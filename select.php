<?php
    require('conection.php');

    $sql = "select * from categoria order by id";
    $result = $conection->prepare($sql);
    $result->execute();
    $id = array();
    foreach ($result as $key => $value) {
        $id[$key] = $value;
    };
    echo 'GetCategorias(' . json_encode($id) . ')';
?>