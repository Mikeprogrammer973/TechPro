<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Error</title>
</head>
<body>
<main>
    <?php
    session_start();
    include("function_select.php");
    
    $user =  $_REQUEST["user"];
    $senha =  md5($_REQUEST["senha"]);
    $info = array();
    
    $consulta = select("users", $coluna = "user_name, email, senha", $where = "WHERE senha = '$senha'", $ordem = null, $limite = "LIMIT 1");
   
    if($consulta == true){
        
            $info[0] = $consulta[0]['user_name'];
            $info[1] = $consulta[0]['email'];
            $info[2] = $consulta[0]['senha'];
        
    }else{
        echo "Erro!";
    }
    if($senha == $info[2]){
        if($user == $info[0] || $user == $info[1]){
            header("location:homepage.php?info=$senha");
        }else{
            header("location:index.php?erro=user");
        }
        
    }else{
        header("location:index.php?erro=senha");
    }
   
    ?>
</main>
</body>
</html>