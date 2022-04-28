<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">   
    <title>Pronote 3.0</title>
</head>
<body>
    <?php include "header.php"; ?>
    <main>        
        <form method="post" action="verify_login.php">
            <h1>Login</h1>
            <p>
                Código de Acesso:<br>
                <input type="text" name="code" required max="100" placeholder="Código de Acesso...">
            </p>
            <p>
                Função:<br>
                <select name="function">
                    <option value="aluno">Aluno</option>
                    <option value="prof">Professor</option>
                    <option value="adm" selected>Professor(Administrador)</option>
                </select>
            </p>
            <input type="submit" value="Entrar"><br><br>
            <a href="cadastrar.php">Cadastrar</a>   
        </form>
    </main>
    <?php include "footer.php"; ?>
</body>
</html>