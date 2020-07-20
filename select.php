<?php
    require('conection.php');

    $sql1 = "select * from categoria order by id";    
    $r1 = $conection->query($sql1, PDO::FETCH_ASSOC);   
    $id = array();
    foreach ($r1 as $key => $value) {
        $id[$key] = $value;
    };
    echo 'GetCategorias(' . json_encode($id) . ')';
?>