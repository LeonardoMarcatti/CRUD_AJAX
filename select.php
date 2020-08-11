<?php
    require('conection.php');

    $sql = "select * from categoria order by id";    
    $r = $conection->query($sql, PDO::FETCH_ASSOC);   
    $id = array();
    foreach ($r as $key => $value) {
        $id[$key] = $value;
    };
    echo 'GetCategorias(' . json_encode($id) . ')';
?>