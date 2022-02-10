<?php
    setlocale(LC_ALL, "pt_BR.utf-8");

    $server = 'localhost'; //ip address
    $DB = 'ajax';
    $user = 'root';
    $password = 'a';
        
    try {
        $conection = new PDO("mysql:host=$server; dbname=$DB", "$user", "$password");
    } catch (Throwable $th) {
        echo 'Erro linha: ' . $th->getLine() . "<br>";
        echo ('Código: ' . $th->getMessage());
    };
?>