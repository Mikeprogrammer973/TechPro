<?php
include("Banco.php");
$banco = new Banco();
@$tipo = $_REQUEST["tipo"];
@$id = $_REQUEST['id'];

if($tipo == "escola_aluno"){
                    $alunos = $banco -> Select("alunos", "WHERE code_escola = '".$id."' AND status = 'C'");
                    if($alunos){
                        for($a = 0; $a < count($alunos); $a++){
                            $id = $alunos[$a]["code_escola"];
                            $nome = $alunos[$a]["nome_completo"];
                            print "<div style='border: none; padding: 10px; width: 250px; display> flex; flex-wrap:wrap; box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.753); margin:auto;background-color:whitesmoke;'>
                            <img style='width: 100px; height: 100px;' src='./Img´s/desenho.png' id='img_perfil'><br><label for='img_perfil' style='padding:5px;background-color:teal;color:whitesmoke; font-weigth: bold; font-family:monospace;'>$nome</label>
                            </div>";
                        }
                    }else{
                        print "<div style='border: none; padding: 10px; width: 250px; display> flex; flex-wrap:wrap; box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.753); margin:auto;background-color:whitesmoke;'>
                        <p style='padding:5px;background-color:teal;color:whitesmoke; font-weigth: bold; font-family:monospace;'>Nenhum Aluno Encontrado!</p>
                        </div>"; 
                    }                
}else if($tipo == "escola_prof"){
    $profs = $banco -> Select("profs", "WHERE code_escola = '".$id."' AND status = 'C'");
                    if($profs){
                        for($p = 0; $p < count($profs); $p++){
                            $id = $profs[$p]["code_escola"];
                            $nome = $profs[$p]["nome_completo"];
                            print "<div style='border: none; padding: 10px; width: 250px; display> flex; flex-wrap:wrap; box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.753); margin:auto; background-color:whitesmoke;'>
                            <img style='width: 100px; height: 100px;' src='./Img´s/desenho.png' id='img_perfil'><br><label for='img_perfil' style='padding:5px;background-color:teal;color:whitesmoke; font-weigth: bold; font-family:monospace;'>$nome</label>
                            </div>";
                        }
                    }else{
                        print "<div style='border: none; padding: 10px; width: 250px; display> flex; flex-wrap:wrap; box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.753); margin:auto;background-color:whitesmoke;'>
                        <p style='padding:5px;background-color:teal;color:whitesmoke; font-weigth: bold; font-family:monospace;'>Nenhum Professor Encontrado!</p>
                        </div>";                  
                    }
}else if($tipo == "escola_mats"){
    $mats= $banco -> Select("cargos_prof", "WHERE code_escola = '".$id."' AND status = 'C'");
                    if($mats){
                        for($m = 0; $m < count($mats); $m++){
                            $id = $mats[$m]["code_escola"];
                            $nome = $mats[$m]["nome_disciplina"];
                            print "<div style='border: none; padding: 10px; width: 250px; display> flex; flex-wrap:wrap; box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.753); margin:auto;background-color:whitesmoke;'>
                            <img style='width: 100px; height: 100px;' src='./Img´s/desenho.png' id='img_perfil'><br><label for='img_perfil' style='padding:5px;background-color:teal;color:whitesmoke; font-weigth: bold; font-family:monospace;'>$nome</label>
                            </div>";
                        }
                    }else{
                        print "<div style='border: none; padding: 10px; width: 250px; display> flex; flex-wrap:wrap; box-shadow: 2px 2px 1px rgb(0, 0, 0, 0.753); margin:auto;background-color:whitesmoke;'>
                        <p style='padding:5px;background-color:teal;color:whitesmoke; font-weigth: bold; font-family:monospace;'>Nenhuma Diciplina Encontrada!</p>
                        </div>"; 
                    }
}

?>