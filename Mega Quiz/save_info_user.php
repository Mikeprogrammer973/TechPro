<?php
include("function_inserir.php");
include_once("function_select.php");
$nome= utf8_decode($_REQUEST["nome"]);
$lastname= utf8_decode($_REQUEST["lastname"]);
$email= utf8_decode($_REQUEST["email"]);
$user= utf8_decode($_REQUEST["user"]);
$senha= utf8_decode($_REQUEST["senha"]);
$criptsenha = md5($senha);

$consulta = select("users", $coluna = "user_name, email, senha", $where = null, $ordem = null, $limite = null);
if($consulta == true){
    if($consulta[0]['user_name'] != $user){
        if($consulta[0]['senha'] !=$criptsenha){
            if($consulta[0]['email'] != $email){
                insert(array("nome", "sobrenome", "senha", "email", "user_name", "image_profile"), array($nome, $lastname, $criptsenha, $email, $user, "desenho.png"), "users");
            }else{
                header("location:cadastrar.php?error=email");
            }
        }else{
            header("location:cadastrar.php?error=senha");
        }
    }else{
        header("location:cadastrar.php?error=user");
    }
}else{
    insert(array("nome", "sobrenome", "senha", "email", "user_name", "image_profile"), array($nome, $lastname, $criptsenha, $email, $user, "desenho.png"), "users");
}



?>