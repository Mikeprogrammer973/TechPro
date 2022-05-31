<?php
    class Banco{
        
        function Select($tabela, $reference){
            include("connection_db.php");
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
            include("connection_db.php");
            if(mysqli_query($conection, $sql)){
                header("location:index.php?info=ok");
            }else{
                print "Erro: ".$sql."<br>".mysqli_error($conection);
                #header("location:cadastrar.php?info=erro");
            }
            return $info;
            mysqli_close($conection);
        }
        function Update($sql){
            include("connection_db.php");
            mysqli_query($conection, $sql);
            mysqli_close($conection);
        }
        function Delete($tabela, $reference){
            include("connection_db.php");
            mysqli_query($conection, $sql);
            mysqli_close($conection);
        }
        function Add($sql){
            include("connection_db.php");
            mysqli_query($conection, $sql);
            mysqli_close($conection);
        }

    }

?>