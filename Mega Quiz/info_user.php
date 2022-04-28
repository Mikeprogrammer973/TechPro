<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mega Quiz - Conta</title>
</head>
<body>
<header>
        <h1 id="title_header">Mega Quiz</h1>
        <p id="p_header">Teste a sua curiosidade!</p>
    </header>
    <main>
        <?php
        include("function_select.php");
        @$ref = $_REQUEST['ref'];
        @$ref_2 = $_REQUEST['query'];
        @$pswrd = null;

        if(isset($_REQUEST['query'])){
            $consulta = select("users", $coluna = "*", $where = "WHERE senha = '$ref_2'", $ordem = null, $limite = "LIMIT 1");
        }else{
            $consulta = select("users", $coluna = "*", $where = "WHERE senha = '$ref'", $ordem = null, $limite = "LIMIT 1");
        }
       
        if($consulta == true){
            $pswrd = $consulta[0]['senha'];
            $id_ref = $consulta[0]['id'];
            echo "<p> Usuário: ".$consulta[0]['user_name']."</p>";
            echo "<p> ID: ".$consulta[0]['id']."</p>";
            echo "<p> Nome: ".$consulta[0]['nome']."</p>";
            echo "<p> Sobrenome: ".$consulta[0]['sobrenome']."</p>";  
            echo "<p> E-mail: ".$consulta[0]['email']."</p>";           
            #echo "<p> Senha(Criptografada): ".$consulta[0]['senha']."</p>"; 
            echo "<button id='btn_update_account'><a id='l_update_account' href='update_info_2.php?id=$id_ref'>Atualizar Informações</a></button>";                
            echo "<button id='btn_delete_account'><a id='l_delete_account' href='delete_account.php?id=$id_ref'>Deletar Contar</a></button>";
        }
        ?>         
    <?php echo "<button><a href='homepage.php?info=$pswrd'>Voltar</a></button>"; ?>       
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