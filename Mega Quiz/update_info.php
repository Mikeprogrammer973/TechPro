<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mega Quiz - Conta >< Atualização</title>
</head>
<body>
<header>
        <h1 id="title_header">Mega Quiz</h1>
        <p id="p_header">Teste a sua curiosidade!</p>
    </header>
    <main>
        <?php
        include("function_update.php");
        include("function_select.php");
        @$id = $_REQUEST['id'];
        @$email = $_REQUEST['email'];
        @$senha = md5($_REQUEST['senha']);
        @$user = $_REQUEST['user'];

        $consulta = select("users", $coluna = "user_name, email, senha", $where = null, $ordem = null, $limite = null);
if($consulta == true){
    if($consulta[0]['user_name'] != $user){
        if($consulta[0]['senha'] !=$senha){
            if($consulta[0]['email'] != $email){
                update(array("email", "senha", "user_name"), array($email, $senha, $user), "users", $id);
                header("location:info_user.php?query=$senha");
            }else{
                header("location:update_info_2?id=$id&error=email");
            }
        }else{
            header("location:update_info_2?id=$id&error=senha");
        }
    }else{
        header("location:update_info_2?id=$id&error=user");
    }
}else{
    update(array("email", "senha", "user_name"), array($email, $senha, $user), "users", $id);
    header("location:info_user.php?query=$senha");    
}

        
        
        
        ?>        
    </main>
    <footer>
        <p>Follow us:</p>
        <img class="img_footer" src="#" alt="">
        <img class="img_footer" src="#" alt="">
        <img class="img_footer" src="#" alt="">
        <img class="img_footer" src="#" alt="">
    </footer>
</body>
</html>