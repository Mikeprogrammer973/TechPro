<?php

include_once("Banco.php");
$banco = new Banco();

@$tipo = $_REQUEST["tipo"];

if($tipo == "escola"){
    $adm = $_REQUEST["adm"];
    $code = "12345";
    $code_escola = $_REQUEST["code_escola"];
    $nome = $_REQUEST["nome"];
    $tp = $_REQUEST["tp"];
    $qp = $_REQUEST["qp"];
    $status = $_REQUEST["status"];

    $banco -> Add("INSERT INTO escolas (code_adm_escola, code_escola, nome_escola, tipo_periodo, qtd_periodo, `status`, foto_perfil_escola) VALUES ('".$adm."', '".$code_escola."', '".$nome."', '".$tp."', '".$qp."', '".$status."', 'turma.png')");
    header("location:homepage.php?info_add=escola&tipo=adm&code=$adm");
}


?>