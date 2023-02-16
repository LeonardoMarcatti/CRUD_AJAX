<?php
    setlocale(LC_ALL, "pt_BR.utf-8");

    $server = 'localhost'; //ip address
    $DB = 'ajax';
<<<<<<< HEAD
    $user = 'leo';
    $password = 'Aa119539$';
=======
    $user = 'root';
    $password = 'a';
>>>>>>> 7e79bec58791ed49a42091f8f95156a271ebfee2
        
    try {
        $conection = new PDO("mysql:host=$server; dbname=$DB", "$user", "$password");
    } catch (Throwable $th) {
        echo 'Erro linha: ' . $th->getLine() . "<br>";
        echo ('Código: ' . $th->getMessage());
    };
