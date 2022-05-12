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
            header("location:homepage.php");
        }
    }else{
        print "CA incorreto!";
    }
}else if($function == "prof"){

}else if($function == "aluno"){

}

?>