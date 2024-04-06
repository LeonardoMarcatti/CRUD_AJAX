<?php
    $server = 'localhost'; 
    $DB = 'ajax';
    $user = 'leo';
    $password = 'Aa119539$';
        
    try {
        $conection = new PDO("mysql:host=$server; dbname=$DB", "$user", "$password");
    } catch (Throwable $th) {
        echo 'Erro linha: ' . $th->getLine() . "<br>";
        echo ('Código: ' . $th->getMessage());
    };
?>