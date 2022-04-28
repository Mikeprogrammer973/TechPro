<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mega Quiz <-> Pergunta 4</title>
</head>
<body>
<?php
    include_once("quiz.php");
    @$category = $_REQUEST['category'];
    @$ref = $_REQUEST['ref'];
    $id_ask = random_int(1, 5);
    @$id_ref = $_REQUEST['id'];
    $destino = "ask_5.php";
    @$answer = $_REQUEST['op'];

    
    Analista($category,$answer,$ref,$id_ref);

    GeraPergunta($category,$id_ask,$destino,$ref);
    ?>
</body>
</html>