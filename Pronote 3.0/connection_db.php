<?php

    $conection = mysqli_connect("localhost", "root", "", "pronote");
        if(!$conection){
            die(trigger_error("Não foi possível conectar ao Banco de Dados 'pronote.db'!"));
        }

?>