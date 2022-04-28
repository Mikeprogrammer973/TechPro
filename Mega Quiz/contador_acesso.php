<?php
    function statistic_access($file){
        $v_atual = 0;
        if(file_exists($file)){
            $ponteiro = fopen($file, "r");
            $v_atual = chop(fgets($ponteiro));
            $v_atual++;
            fclose($ponteiro);            
        }else{
            $v_atual = 1;
        }
        $ponteiro = fopen($file, "w");
        fwrite($ponteiro, $v_atual);
        fclose($ponteiro);
        print "<input type='number' value='$v_atual' style='text-align:center;display:none;'>";
    }
?>