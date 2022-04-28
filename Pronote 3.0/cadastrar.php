<doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Pronote 3.0 - Cadastrar</title>
</head>
<body>
  <?php include "header.php"; ?>  
  <main>
    <form method="post" action="save_info.php">
        <p>
            Nome Completo:<br>
            <input type="text" name="nome" id="cnome" placeholder="Nome Completo..." required>
        </p>
        <p>
            Código de Acesso (CA):<br>
            <input type="text" name="ca" id="cca" placeholder="Crie seu CA..." required>
        </p>
        <p>
            Confirmar CA:<br>
            <input type="text" name="confca" id="cconfca" placeholder="Confirmar CA..." required>
        </p>
        <p>
                Função:<br>
                <select name="function">
                    <option value="aluno">Aluno</option>
                    <option value="prof">Professor</option>
                    <option value="adm" selected>Professor(Administrador)</option>
                </select>
            </p>
        <input type="submit" value="Cadastrar"><br><br>
        <a href="index.php">Login</a> 
    </form>
  </main>
  <?php include "footer.php"; ?>  
  <script>
      
  </script>
</body>
</html>