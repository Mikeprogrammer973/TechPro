<?php

function update($coluna, $valor, $tabela, $where){
include("db_conection.php");
if((is_array($coluna)) && (is_array($valor))){ 
    if(count($coluna) == count($valor)){
      $valor_coluna = null;
      
      for($c = 0; $c < count($coluna); $c++){
        $valor_coluna .= "{$coluna[$c]} = '{$valor[$c]}',";
      }

      $valor_coluna = substr($valor_coluna,0,-1);
      $sql = "UPDATE {$tabela} SET {$valor_coluna} WHERE `id` = '{$where}'";
    }else{
        return false;
    }     
}else{
$sql = "UPDATE {$tabela} SET `{$coluna}` = '{$valor}' WHERE `id` = '{$where}'";
}

    if(!mysqli_query($link,$sql)){
        echo "<br>Error: ".$sql."<br>".mysqli_error($link);
        
    } 
    mysqli_close($link);

}
?>