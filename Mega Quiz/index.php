<?php
@$status = $_REQUEST["status"];
@$erro = $_REQUEST["erro"];
include("contador_acesso.php");
statistic_access("acess_login-zone_count");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mega Quiz</title>
</head>
<body>
    <header>
        <h1 id="title_header">Mega Quiz</h1>
        <p id="p_header">Teste a sua curiosidade!</p>
    </header>
    <main>
        <img class="img_main" src="#" alt="">
        <h1 id="title_main">Login</h1>
        <?php if($status == "ok"): ?>
            <p><strong class="cadastro_sucesso">Cadastro realizado com sucesso!</strong></p>
            <?php endif; ?>
        <?php if($erro == "user"){
            echo "<p><strong class='erro_login'>Verifique se o nome de usuário está correto antes de continuar!</strong></p>";
        }
            ?>        
        <?php if($erro == "senha"): ?>
            <p><strong class="erro_login">Verifique se a senha está correta antes de continuar!</strong></p>
        <?php endif; ?>
        <form id="login" method="post" action="verify_login.php">        
            <p class="p_main">
                <label for="cuser">Usuário:</label>
                <input type="text" name="user" id="cuser" placeholder="Nome de usuário ou E-mail..." required>
            </p>
            <p class="p_main">
                <label for="csenha">Senha:</label>
                <input type="password" name="senha" id="csenha" placeholder="Palavra-passe..." required>
            </p>
            <p id="p_link"><a id="l_cadastrar" href="cadastrar.php">Cadastrar</a></p>
            <p id="p_btn"><input id="btn" type="submit" value="Entrar"></p>
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