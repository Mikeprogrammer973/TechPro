<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mega Quiz <-> Recompensas</title>
</head>
<body>
<?php
  include("contador_acesso.php");
  statistic_access("acess_end-quiz_count");
  include_once("quiz.php");
  @$category = $_REQUEST['category'];
  @$ref = $_REQUEST['ref'];
  $id_ask = random_int(1, 5);
  @$id_ref = $_REQUEST['id'];
  $destino = "reward.php";
  @$answer = $_REQUEST['op'];

  
  Analista($category,$answer,$ref,$id_ref);

  Recompensa($ref);

  echo "<a href='homepage.php?info=$ref'> Voltar Homepage</a>";
?>
</body>
</html>