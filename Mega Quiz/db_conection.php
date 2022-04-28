<?php

    #$pdo = new PDO("mysql:host=localhost;dbname=mega_quiz", "root", "");
    $link = mysqli_connect("localhost", "root", "", "mega_quiz");
    #$mysql_connection = new MySQLi("localhost", "root", "", "cadastro");

    if(!$link){
        die(trigger_error("Não foi possível conectar ao Banco de Dados!"));
        exit;
    }
   
?>