<?php
@$erro = $_REQUEST['error'];
@$info = $_REQUEST['info'];
@$foto = $_REQUEST['foto'];
$user = "";
$level = 0;
$barra = 0;
?>
<?php
include("function_select.php");
include("function_update.php");
include("contador_acesso.php");
statistic_access("acess_homepage_count");
$consulta_img = select("users", $coluna = "image_profile", $where = "WHERE senha = '$info'", $ordem = null, $limite = "LIMIT 1");
if($consulta_img == true){
    $img = $consulta_img[0]['image_profile'];

    if($img != "desenho.png"){
        $foto = $img;
    }
    
}

$consulta_ = select("users", $coluna = "*", $where = "WHERE senha = '$info'", $ordem = null, $limite = "LIMIT 1");
if($consulta_img == true){
    $user= $consulta_[0]['user_name'];
    $level= $consulta_[0]['level'];

    if($consulta_[0]['xp'] <= 1200){// Level 0
        $barra = $consulta_[0]['xp'] / 12; 
        update("level", "0", "users", $consulta_[0]['id']);                        
    }else if($consulta_[0]['xp'] <= 5700 && $consulta_[0]['xp'] > 1200){// Level 1
        $barra = $consulta_[0]['xp'] / 57;       
        update("level", "1", "users", $consulta_[0]['id']);       
    }else if($consulta_[0]['xp'] <= 7700 && $consulta_[0]['xp'] > 5700){// Level 2
        $barra = $consulta_[0]['xp'] / 77;       
        update("level", "2", "users", $consulta_[0]['id']);      
    }else if($consulta_[0]['xp'] <= 12000 && $consulta_[0]['xp'] > 7700){// Level 3
        $barra = $consulta_[0]['xp'] / 120;       
        update("level", "3", "users", $consulta_[0]['id']);      
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mega Quiz - Homepage</title>
    <style>
       #level_control{
           height: 100%;
           width: <?php echo $barra; ?>%;
           background-color: green;
       }
       #barra{
           border: 1px solid black;
           height: 10px;
       }
    </style>
</head>
<body>
    <header>
        <h1 id="title_header">Mega Quiz</h1>
             
        <button  id='btn_user_profile' ><?php if($foto != ""){   echo "<img id='img_user_profile' src='./Imagens/$foto' alt=''>";
        }else{
            if(isset($_REQUEST['info'])){
                
            echo "<img id='img_user_profile' src='./Imagens/desenho.png' alt=''>
            <form id='choose_img_perfil' method='post' action='function_inserir_img_profil.php'  enctype='multipart/form-data'>
            <input type='file' name='img' id='cimg'> <input style='display:none;' type='text' name='senha' value='$info'> <input type='submit' value='modificar'></form>";
            }else{
                echo "<img id='img_user_profile' src='./Imagens/desenho.png' alt=''>
                <form id='choose_img_perfil' method='post' action='function_inserir_img_profil.php'  enctype='multipart/form-data'>
                <input type='file' name='img' id='cimg'><input type='submit' value='modificar'></form>";
            }
            
        }
        ?>
        <p><?php print $user; ?></p>
        <p>Nível: <?php print $level; ?></p>
        <div id="barra">
            <div id="level_control"></div>
        </div>
        <ul id="op_conta">
            <?php echo "<li><a href='info_user.php?ref=$info'>Conta</a></li>"; ?>
            <li><a href="logout.php">Sair</a></li>
        </ul>
        <?php if($erro == "extensao"): ?>
            <p>Extensão de imagem inválida, por favor escolhe uma imagem de extensão ".png", ".jpg" ou ".jpeg".</p>
        <?php elseif($erro == "tamanho"): ?>
            <p>Tamanho da imagem não pode ser superior a 2MB! Por favor escolhe uma outra imagem e, tente de novo!</p>
        <?php elseif($erro == "img"): ?>
            <p>Erro ao carregar a imagem, por favor tente novamente!</p>
            <?php endif; ?>
        </button>
        <p id="p_header">Teste a sua curiosidade!</p>
    </header>
    <main>
        <?php
            print "<p class='p_category'><a class='a_category' href='ask_1.php?category=esporte&ref=$info'>►</a>Esporte</p>
            <p class='p_category'><a class='a_category' href='ask_1.php?category=cinema&ref=$info'>►</a>Cinema</p>
            <p class='p_category'><a class='a_category' href='ask_1.php?category=filosofia&ref=$info'>►</a>Filosofia</p>
            <p class='p_category'><a class='a_category' href='ask_1.php?category=math_fisica&ref=$info'>►</a>Math/Física</p>
            <p class='p_category'><a class='a_category' href='ask_1.php?category=geral&ref=$info'>►</a>Geral</p>";
        ?>
    </main>
    <footer>
<?php
#include("function_select.php");
$consulta = select("users", $coluna = "*", $where = "WHERE senha = '$info'", $ordem = null, $limite = "LIMIT 1");
$moedas =0;
$xp = 0;
    if($consulta == true){
       $moedas = $consulta[0]['moedas'];
       $xp = $consulta[0]['xp'];
   } 
print "<button class='btn'><p>$moedas</p><p>$xp xp</p></button>";
    ?>
<button class="btn"><a href="#">Shop</a></button>
<button class="btn"><a href="#">Battle</a></button>
<button class="btn"><a href="#">Chat</a></button>
    </footer>
</body>
</html>