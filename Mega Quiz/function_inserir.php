<?php
include("function_select.php");
function insert($coluna, $valor, $tabela){
include("db_conection.php");
if((is_array($coluna)) && (is_array($valor))){ 
    if(count($coluna) == count($valor)){
        $sql = "INSERT INTO {$tabela}  (".implode(', ', $coluna).") 
        VALUES ('".implode('\', \'', $valor)."')";           
    }else{
        return false;
    }     
}else{
    $sql = "INSERT INTO {$tabela} ({$coluna}) 
    VALUES ('{$valor}')";
}

    if(mysqli_query($link,$sql)){
       
        header("location:index.php?status=ok");
        
    }else{
        echo "Query não realizado!";
        echo "<br>Error: ".$sql."<br>".mysqli_error($link);
    } 
    mysqli_close($link);

}
?>