<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
<style>
  
</style>
</head>
<body>
<?php
include("function_select.php");
include("function_update.php");



$totalpts = 0;
$id = 0;
function Analista($category,$answer,$ref,$id_ask){
    $consulta = select($category, $coluna = "*", $where = "WHERE id = $id_ask", $ordem = null, $limite = "LIMIT 1");
    if($consulta == true){
        if($consulta[0]['respostas'] == $answer){
            $getpts = $consulta = select("users", $coluna = "*", $where = "WHERE senha = '$ref'", $ordem = null, $limite = "LIMIT 1");
            if($getpts == true){
                $totalpts = $getpts[0]['acertos'];
                $id = $getpts[0]['id'];
            }
            $totalpts += 1;
            update("acertos", $totalpts, "users", $id);
        }
    }
}

function GeraPergunta($category,$id_ask,$destino,$ref){
    $op_1 = select($category, $coluna = "*", $where = "WHERE id = ".random_int(1,5), $ordem = null, $limite = "LIMIT 1");
    $op_2 = select($category, $coluna = "*", $where = "WHERE id = ".random_int(1,5), $ordem = null, $limite = "LIMIT 1");
    $op_3 = select($category, $coluna = "*", $where = "WHERE id = ".random_int(1,5), $ordem = null, $limite = "LIMIT 1");
    $op_4 = select($category, $coluna = "*", $where = "WHERE id = ".random_int(1,5), $ordem = null, $limite = "LIMIT 1");
    $consulta = select($category, $coluna = "*", $where = "WHERE id = $id_ask", $ordem = null, $limite = "LIMIT 1");
    if($consulta == true){
        echo "<p>".utf8_encode($consulta[0]['perguntas'])."</p>";
        $op = random_int(1, 5);
        switch($op){
            case 1:
                echo "
                <form method='post' action='$destino?category=$category&ref=$ref&id=$id_ask'>
                    
                    <select name='op'>
                        <option value='".utf8_encode($consulta[0]['respostas'])."'>".utf8_encode($consulta[0]['respostas'])."</option>
                        <option value='".utf8_encode($op_1[0]['respostas'])."'>".utf8_encode($op_1[0]['respostas'])."</option>
                        <option value='".utf8_encode($op_2[0]['respostas'])."'>".utf8_encode($op_2[0]['respostas'])."</option>
                        <option value='".utf8_encode($op_3[0]['respostas'])."'>".utf8_encode($op_3[0]['respostas'])."</option>
                        <option value='".utf8_encode($op_4[0]['respostas'])."'>".utf8_encode($op_4[0]['respostas'])."</option>
                        <option selected value='Não sei'>Não sei</option>
                    </select>
                    <input type='submit' value='Próximo'>
                </form>";
                #print "a)".$consulta[0]['respostas'];
                break;
                case 2:
                    echo "
                    <form method='post' action='$destino?category=$category&ref=$ref&id=$id_ask'>

                    <select name='op'>
                    <option value='".utf8_encode($op_1[0]['respostas'])."'>".utf8_encode($op_1[0]['respostas'])."</option>
                    <option value='".utf8_encode($consulta[0]['respostas'])."'>".utf8_encode($consulta[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_2[0]['respostas'])."'>".utf8_encode($op_2[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_3[0]['respostas'])."'>".utf8_encode($op_3[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_4[0]['respostas'])."'>".utf8_encode($op_4[0]['respostas'])."</option>
                    <option selected value='Não sei'>Não sei</option>
                </select>
                        <input type='submit' value='Próximo'>
                    </form>";
                    #print "b)".$consulta[0]['respostas'];
                    break;
                    case 3:
                        echo "
                    <form method='post' action='$destino?category=$category&ref=$ref&id=$id_ask'>                        

                    <select name='op'>
                    <option value='".utf8_encode($op_1[0]['respostas'])."'>".utf8_encode($op_1[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_2[0]['respostas'])."'>".utf8_encode($op_2[0]['respostas'])."</option>
                    <option value='".utf8_encode($consulta[0]['respostas'])."'>".utf8_encode($consulta[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_3[0]['respostas'])."'>".utf8_encode($op_3[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_4[0]['respostas'])."'>".utf8_encode($op_4[0]['respostas'])."</option>
                    <option selected value='Não sei'>Não sei</option>
                </select>
                        <input type='submit' value='Próximo'>
                    </form>";
                        #print "c)".$consulta[0]['respostas'];
                        break;
                        case 4:
                            echo "
                            <form method='post' action='$destino?category=$category&ref=$ref&id=$id_ask'>
                                
                    <select name='op'>
                    <option value='".utf8_encode($op_1[0]['respostas'])."'>".utf8_encode($op_1[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_2[0]['respostas'])."'>".utf8_encode($op_2[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_3[0]['respostas'])."'>".utf8_encode($op_3[0]['respostas'])."</option>
                    <option value='".utf8_encode($consulta[0]['respostas'])."'>".utf8_encode($consulta[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_4[0]['respostas'])."'>".utf8_encode($op_4[0]['respostas'])."</option>
                    <option selected value='Não sei'>Não sei</option>
                    </select>
                                <input type='submit' value='Próximo'>
                            </form>";
                            #print "d)".$consulta[0]['respostas'];
                            break;
                            case 5:
                                echo "
                                <form method='post' action='$destino?category=$category&ref=$ref&id=$id_ask'>
                                    
                    <select name='op'>
                    <option value='".utf8_encode($op_1[0]['respostas'])."'>".utf8_encode($op_1[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_2[0]['respostas'])."'>".utf8_encode($op_2[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_3[0]['respostas'])."'>".utf8_encode($op_3[0]['respostas'])."</option>
                    <option value='".utf8_encode($op_4[0]['respostas'])."'>".utf8_encode($op_4[0]['respostas'])."</option>
                    <option value='".utf8_encode($consulta[0]['respostas'])."'>".utf8_encode($consulta[0]['respostas'])."</option>
                    <option selected value='Não sei'>Não sei</option>
                    </select>
                                    <input type='submit' value='Próximo'>
                                </form>";
                                #print "e)".$consulta[0]['respostas'];
                                break;
        }
    }else{
        echo "Erro!";
    }
}

function Recompensa($ref){
    $moedas = 0;
    $xp = 0;
    $getpts = $consulta = select("users", $coluna = "*", $where = "WHERE senha = '$ref'", $ordem = null, $limite = "LIMIT 1");
    if($getpts == true){
        $acertos = $getpts[0]['acertos'];
        print "<p class='reward'>Acertos: $acertos</p>";
        switch($acertos){
            case 1:
                $moedas = 2;
                $xp = 1;
                print "<p class='reward'>2xp 1 moeda</p>";
                break;
                case 2:
                    $moedas = 3;
                    $xp = 5;
                    print "<p class='reward'>5xp 3 moedas</p>";
                    break;
                    case 3:
                        $moedas = 8;
                        $xp = 7;
                        print "<p class='reward'>7xp 8 moedas</p>";
                        break;
                        case 4:
                            $moedas = 11;
                            $xp = 9;
                            print "<p class='reward'>9xp 11 moedas</p>";
                            break;
                            case 5:
                                $moedas = 17;
                                $xp = 13;
                                print "<p class='reward'>13xp 17 moedas</p>";
                                break;
        }
        
        $getid = select("users", $coluna = "*", $where = "WHERE senha = '$ref'", $ordem = null, $limite = "LIMIT 1");
            if($getid == true){                
                $id = $getid[0]['id'];
                $get = select("users", $coluna = "*", $where = "WHERE id = $id", $ordem = null, $limite = "LIMIT 1");
            if($get == true){
                $totalmoedas = $get[0]['moedas'];
                $totalxp = $get[0]['xp'];
            }
            $totalmoedas += $moedas;
            $totalxp += $xp;
            update("moedas", $totalmoedas, "users", $id);
            update("xp", $totalxp, "users", $id);
            update("acertos", "0", "users", $id);
        }
            }
        update("acertos", "0", "users", $id);
    }



?>
</body>
</html>