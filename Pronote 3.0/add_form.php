<?php

@$tipo = $_REQUEST["tipo"];
@$id = $_REQUEST['id'];

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova <?php if($tipo == "escola"){
        echo "Escola";
    }  ?></title>
    <style>
        header{
                margin: auto;
                padding: 5px;
                max-width: 700px;
                min-width: 250px;
                text-align: center;
                border: 1px solid black;
            }
            #titre{
            }
            #titre_header{
                margin: auto;

                font: bold 4vw monospace;
                color: navy;
                text-shadow: 0.9px 0.7px 1px rgb(0, 0, 0, 0.378);
            }

            #l_perfil{
                margin-left: 80px;
            }
            #img_perfil{
                width: 50px;
                height: 50px;
                border-radius: 50%;
                box-shadow: 2px 2px rgb(0, 0, 0, 0.178); 
            }
            #btn_perfil{
                padding: 5px;
                width: 70px;
                height: 70px;
                border: none;
                background-color: white;
                cursor: pointer;
                outline:none;
            }

            #menu{
                margin-top: 20px;

            }
            .item_menu{
                margin-left: 5px;
                text-decoration: none;
                transition-duration: 0.7s;
                padding: 10px;
                color: teal;
                font: bold 1.7vw monospace;
                text-shadow: 0.4px 0.5px 1px rgb(0, 0, 0, 0.378);
            }
            .item_menu:hover{
                background-color: teal;
                color: white;
            }
            #pesquisa{
                margin-top: 20px;
            }
            #txt_busca{
                outline: none;
                width: 200px;
                padding: 5px;
                margin: 10px;
                border: none;
                box-shadow: 2px 2px 0.5px rgb(0, 0, 0, 0.753);
            }
            #txt_busca:hover{
                background-color: aliceblue;
            }
            #btn_busca{
                color: teal;
                background-color: whitesmoke;
                box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.453);
                border: none;
                padding: 7px 10px;
                height: 29px;
                outline: none;
            }
            #btn_busca:hover{                 
                color: whitesmoke;
                background-color: teal;
            }
            main{
                margin: auto;
                max-width: 670px;
                min-width: 250px;
                border: 1px solid black;
                padding: 20px;
                font: bold 2.5vh monospace;
            }
            footer{
                margin: auto;
                max-width: 710px;
                min-width: 250px;
                border: 1px solid black;
                height: 30px;
            } 
            #data_info{
                box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.453);
                padding: 10px;
                width: 500px;
                text-align:center;
                margin: auto;
            }
            input{
                text-align:center;
                outline: none;
                font: italic 2.5vh monospace;
            }
            input:hover{
                background-color: aliceblue;
                font: bold 2.5vh monospace;
            }
            .gerencia_btn{
                outline: none;
                border: none;
                box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.453);
                padding: 5px;
                margin: 10px;
                font: bold 2.5vh monospace;
                color: teal;
                background-color: whitesmoke;
            }
            .gerencia_btn:hover{
                color: whitesmoke;
                background-color: teal;
            }
    </style>
</head>
<body>
<header>
            <nav id="titre">
                <h1 id="titre_header">Pronote 3.0
                <a id="l_perfil" href="index.php" ><button class="perfil" id="btn_perfil"><img id="img_perfil" class="perfil" src="./Img´s/1646424599.jpg"></button></a>
            </h1>
            </nav>
            <nav id="menu">
                <a class="item_menu" href="#">Turmas</a>
                <a class="item_menu" href="#">Alunos </a>
                <a class="item_menu" href="#">Professores</a> 
                <a class="item_menu" href="#">Disciplinas</a> 
                <a class="item_menu" href="#">Notas</a>
                <a class="item_menu" href="#">View Geral</a>                 
            </nav>
            <nav id="pesquisa">
                <input type="text" id="txt_busca"><input id="btn_busca" type="button" value="Buscar">
            </nav>
</header>
        <main>
            <section id="data_info">
                <?php
                    include_once("Banco.php");

                    $banco = new Banco();                    

                    if($tipo == "escola"){
                        $default_code = null;
                        $error = false;
                        do{
                            $default_code = random_int(0, 10000000);
                            $verify = $banco -> Select("escolas", "WHERE code_escola = '".$default_code."'");
                            if(count($verify) > 0){
                                $error = true;
                            }else{
                                $error = false;
                            }
                        }while($error);
                        print "<form method='get' name='gerencia' action='add.php'>
                            <input style='display:none;' type='text' value='escola' name='tipo'>                            
                            <p>Admin........: <input type='text' name='adm' value='".$id."' readonly></p>
                            <p>Cód. Acesso..: <input type='text' name='code_escola' value='".$default_code."' required></p>
                            <p>Nome Escola       .: <input type='text' name='nome' required></p>
                            <p>Tipo Periódo      : <input type='text' name='tp' required> </p>
                            <p>Qtd. Período      : <input name='qp' type='number' required></p>
                            <p>Status.......: <input name='status' type='text' value='C' readonly></p>                            
                            <input type='submit' class='gerencia_btn' value='Adicionar'>
                        </form>";
                    }

                ?>
            </section>
        </main> 
        <?php include "footer.php"; ?>
</body>
</html