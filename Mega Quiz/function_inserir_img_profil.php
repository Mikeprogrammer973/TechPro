<?php
include("function_update.php");
include("function_select.php");
$senha = $_REQUEST['senha'];
$_UP['pasta'] = './Imagens/';
$_UP['tamanho'] = 1024 * 1204 * 2; // 2 MB
$_UP['extensoes'] = array('jpg', 'png', 'jpeg');
$_UP['renomeia'] = true;
$m =explode('.', $_FILES['img']['name']);
$extensao = strtolower(end($m));


if(array_search($extensao, $_UP['extensoes']) === false){
    header("location:homepage.php?error=extensao");
    exit;
}else if( $_UP['tamanho'] < $_FILES['img']['size']){
    header("location:homepage.php?error=tamanho");
    exit;
}else{
    if($_UP['renomeia'] == true){
        $nome_final = time().'.jpg';
    }else{
        $nome_final = $_FILES['img']['name'];
    }

    if(move_uploaded_file($_FILES['img']['tmp_name'], $_UP['pasta'] . $nome_final)){
        include("db_conection.php");
        $id = 0;
        $consulta = select("users", $coluna = "*", $where = "WHERE senha = '$senha'", $ordem = null, $limite = "LIMIT 1");
        if($consulta == true){
            $id= $consulta[0]['id'];
            update("image_profile", $nome_final, "users", "$id");
            header("location:homepage.php?info=$senha&foto=$nome_final");
        }
       
    }else{
        header("location:homepage.php?error=img");
    }
}
?>