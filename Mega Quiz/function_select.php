<?php

function select($tabela, $coluna = "user_name, email, senha", $where = null, $ordem = null, $limite = null){
    include("db_conection.php");

    $sql = "SELECT {$coluna} FROM {$tabela} {$where} {$ordem} {$limite}";
    
    // Consultou?
    if($query = mysqli_query($link,$sql)){

        // Encontrou algo?
        if(mysqli_num_rows($query) > 0){
            $resultados = array();

            while($resultado = mysqli_fetch_assoc($query)){
                $resultados[] = $resultado;
            }
            return $resultados;
        }else{
            #echo "Nada foi encontado!";
        }
    }else{
        #echo "Erro!";
    }

    // Fecha conexão
    mysqli_close($link);

    
}

?>