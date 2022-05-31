<?php
include("Banco.php");
$banco = new Banco();
@$tipo = $_REQUEST["tipo"];
@$id = $_REQUEST['id'];

if($tipo == "escola"){
    $cons = $banco -> Select("escolas", "WHERE code_escola = '".$id."'");
    $code = $cons[0]["code_adm_escola"];
    $banco -> Update("UPDATE escolas SET `status` = 'C' WHERE code_escola = '".$id."'");
    header("location:homepage.php?info_gerencia=recuperar&code=$code&tipo=adm");    
}

?>