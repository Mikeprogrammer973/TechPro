<?php
include("Banco.php");
$banco = new Banco();
@$tipo = $_REQUEST["tipo"];
@$id = $_REQUEST['id'];


if($tipo == "escola"){
    @$nome = $_REQUEST['nome'];
    if($nome == ""){
        $nome = "Unknown";
    }
    @$tp = $_REQUEST["tp"];
    if($tp == ""){
        $tp = "Unknown";
    }
    @$qp = $_REQUEST["qp"];
    if($qp == ""){
        $qp = -1;
    }
    @$status = $_REQUEST["status"];
    if($status != "A" || $status != "C"){
        $status = "A";
    }
    $cons = $banco -> Select("escolas", "WHERE code_escola = '".$id."'");
    $code = $cons[0]["code_adm_escola"];
    $banco -> Update("UPDATE escolas SET `status` = '".$status."', nome_escola = '".$nome."', tipo_periodo = '".$tp."', qtd_periodo = '".$qp."' WHERE code_escola = '".$id."'");
    header("location:homepage.php?info_gerencia=update&code=$code&tipo=adm");    
}

?>