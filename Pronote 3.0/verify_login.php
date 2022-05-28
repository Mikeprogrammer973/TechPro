<?php

session_start();
include("Banco.php");
$banco = new Banco();
@$code = $_REQUEST["code"];
@$function = $_REQUEST["function"];

if($function == "adm"){
    $adm = $banco -> Select("adms", "WHERE code_adm = '".$code."'");
    if($adm){
        if($adm[0]["code_adm"] == $code){
            $_SESSION["logado"] = true;
            header("location:homepage.php?tipo=$function&code=$code");
        }
    }else{
        header("location:index.php?error_login=ca");
    }
}else if($function == "prof"){

}else if($function == "aluno"){

}

?>