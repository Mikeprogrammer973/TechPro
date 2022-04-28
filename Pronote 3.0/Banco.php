<?php
    include_once("Interfaces_.php");
    class Banco implements Banco_{
        public $conection = null;
        function Open_Conection_db(){
            $conection = mysqli_connect("localhost", "root", "", "pronote");
            if(!$conection){
                die(trigger_error("Não foi possível conectar ao Banco de Dados 'pronote.db'!"));
            }
            return $conection;
        }
        function Select($tabela, $reference){
            $conection = $this -> Open_Conection_db();
            $result = array();
            $sql = "SELECT * FROM {$tabela} {$reference}";
            if($query = mysqli_query($conection,$sql)){
                if(mysqli_num_rows($query) > 0){                    
                    while($r = mysqli_fetch_assoc($query)){
                        $result[] = $r;
                    }                    
                }
            }
            return $result;
            mysqli_close($conection);
        }
        function Insert($sql){
            $conection = $this -> Open_Conection_db();
            if(mysqli_query($conection, $sql)){
                header("location:index.php?info=ok");
            }else{
                print "Erro: ".$sql."<br>".mysqli_error($conection);
                #header("location:cadastrar.php?info=erro");
            }
            return $info;
            mysqli_close($conection);
        }
        function Update($tabela, $reference){

        }
        function Delete($tabela, $reference){

        }
    }

?>