<?php

@$tipo = $_REQUEST["tipo"];
@$code = $_REQUEST["code"];
@$info_gerencia = $_REQUEST["info_gerencia"];
@$info_add = $_REQUEST["info_add"];

?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pronote 3.0 - Homepage</title>
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
            }
            #info_gerencia{
                text-align: center;
                font: bold 3vh monospace;
                color: green;
                border: none;
                padding: 10px;
                box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.753);
            }
            #data_gerencia{
                box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.453);
                padding: 10px;
                width: 500px;
                text-align:center;
                margin: auto;
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
            #info{
                margin: 5px;
                font: bold 2.5vh monospace;
                box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.253);
                padding: 5px;
                border-radius: 50%;
                text-decoration:none;
                border: 2px solid whitesmoke;
                color: teal;
                }
                #info:hover{
                color: teal;
                border: 2px solid teal;
            }
            footer{
                margin: auto;
                max-width: 710px;
                min-width: 250px;
                border: 1px solid black;
                height: 30px;
            }            

        </style>
    </head>
    <body>
        <header>
            <nav id="titre">
                <h1 id="titre_header">Pronote 3.0
                <a id="l_perfil" href="index.php" ><button class="perfil" id="btn_perfil"><img id="img_perfil" class="perfil" src="./Img??s/1646424599.jpg"></button></a>
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
            <p id="info_gerencia"><?php if($info_gerencia == "arquivar"){
                print "Escola Arquivada com sucesso!";
            }else if($info_gerencia == "update"){
                print "Dados Atualizados com sucesso!";
            }else if($info_gerencia == "remover"){
                print "Escola Removida com sucesso!";
            }else if($info_gerencia == "recuperar"){
                print "Escola Recuperada com sucesso!";
            }
            
            if($info_add == "escola"){
                print "Escola Adicionada com sucesso!";
            }
            ?></p>
            <?php
                include("Banco.php");
                $banco = new Banco();
                if($tipo == "adm"){
                    $escolas = $banco -> Select("escolas", "WHERE code_adm_escola = '".$code."' AND status = 'C'");
                    if($escolas){
                        for($c = 0; $c < count($escolas); $c++){
                            $id = $escolas[$c]["code_escola"];
                            print "<div style='border: none; padding: 10px; width: 250px; display> flex; flex-wrap:wrap; box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.753)'>
                            <a href='gerenciador.php?tipo=escola&id=$id'><img style='width: 100px; height: 100px;' src='./Img??s/desenho.png'></a>
                            <a id='info' href='info.php?tipo=escola&id=$id'>!</a>
                            <a href='gerenciador.php?tipo=escola&id=$id'><button id='escola$c' onmouseenter='ativo($c)' onmouseout='inativo($c)' style='cursor:pointer; padding: 15px; border: none; box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.453); outline: none; color: teal; background-color: azure;'>".$escolas[$c]["nome_escola"]."</button></a>
                            </div>";
                        }
                    }
                }

            ?>
            <section id="data_gerencia">
                <a href="add_form.php?tipo=escola&id=<?php echo $code; ?>"><button class="gerencia_btn">Nova Escola</button></a>
                <a href="recuperar_select.php?tipo=escola&id=<?php echo $code; ?>"><button class="gerencia_btn">Recuperar</button></a>
            </section>
        </main>
        <?php include "footer.php"; ?>
        <script>
            function ocultar_info(){
                document.getElementById("info_gerencia").style.display = "none";
            }
            function ativo(qual){
                document.getElementById(`escola${qual}`).style.color = "azure";
                document.getElementById(`escola${qual}`).style.backgroundColor = "teal";
            }

            function inativo(qual){
                document.getElementById(`escola${qual}`).style.color = "teal";
                document.getElementById(`escola${qual}`).style.backgroundColor = "azure";
            }

            setTimeout(ocultar_info, 3000);
        </script>
    </body>
</html>