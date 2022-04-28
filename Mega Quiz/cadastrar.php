<?php
@$erro = $_REQUEST['error'];
include("contador_acesso.php");
statistic_access("acess_cadastrar_count");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mega Quiz - cadastrar</title>
</head>
<body>
    <header>
        <h1 id="title_header">Mega Quiz</h1>
        <p id="p_header">Teste a sua curiosidade!</p>
    </header>
    <main>
        <img class="img_main" src="#" alt="">
        <h1 id="title_main">Cadastro</h1>    
        <?php
        if(isset($_REQUEST['error'])){
        if($erro == "user"){
            echo "<p class='erro_login'>Nome de usuário já está em uso, tente um outro!</p>";
        }
        if($erro == "email"){
            echo "<p class='erro_login'>E-mail já está em uso, tente um outro!</p>";
        }
        if($erro == "senha"){
            echo "<p class='erro_login'>Senha já está em uso, tente um outro!</p>";
        }
    }
        ?>
        <form id="login" method="post" action="save_info_user.php">
        <p class="p_main">
                <label for="cnome">Nome:</label>
                <input type="text" name="nome" id="cnome" placeholder="Nome..." required>
            </p>
            <p class="p_main">
                <label for="clastname">Sobrenome:</label>
                <input type="text" name="lastname" id="clastname" placeholder="Sobrenome..." required>
            </p>
            <p class="p_main">
                <label for="cuser">Usuário:</label>
                <input type="text" name="user" id="cuser" placeholder="Nome de usuário..." required>
            </p>
            <p class="p_main">
                <label for="cemail">E-mail:</label>
                <input type="text" name="email" id="cemail" placeholder="E-mail..." required>
            </p>
            <p class="p_main">
                <label for="csenha">Senha:</label>
                <input type="password" name="senha" id="csenha" placeholder="Palavra-passe..." required>
            </p>
            <p id="p_link"><a id="l_cadastrar" href="index.php">Login</a></p>
            <p id="p_btn"><input id="btn" type="submit" value="Cadastrar"></p>
        </form>
        <img class="img_main" src="#" alt="">
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