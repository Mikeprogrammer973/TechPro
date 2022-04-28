<?php
@$id = $_REQUEST['id'];
@$erro = $_REQUEST['error'];
include("function_select.php");
$consulta_info = select("users", $coluna = "*", $where = "WHERE id = '$id'", $ordem = null, $limite = "LIMIT 1");
if($consulta_info == true){
    $senha = $consulta_info[0]['senha']; 
    $email = $consulta_info[0]['email']; 
    $user = $consulta_info[0]['user_name']; 

}

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
       
echo "<form method='post' action='update_info.php'>
 <p class='update_info'>
     <label for='cid'>ID: </label>
     <input class='input_update_info' type='text' name='id'  id='cid' value = '$id' readonly></input>
 </p>
    <p class='update_info'>
        <label for='cnuser'>Nome de Usuário:</label>
        <input class='input_update_info' type='text' name='user' id='cnuser' value='$user' required></input>
    </p>
    <p class='update_info'>
        <label for='cnemail'>E-mail:</label>
        <input class='input_update_info' type='email' name='email' id='cnemail' value='$email' required></input>
    </p>
    <p class='update_info'>
        <label for='cnsenha'>Senha:</label>
        <input class='input_update_info' type='password' name='senha' id='cnseha' value='$senha' required></input>
    </p>
    <button class='btn_update_info'><a href='info_user.php?query=$senha'>Cancelar</a></button>
    <p class='btn_update_info'><input type='submit' value='Atualizar'></input></p>
</form>";
?>