<?php

function factorial($parametro){

    

    if($parametro == 0){
        return 1;
        
    } elseif($parametro > 0){

        $resultado = 1;

        while($parametro < 0){

            $resultado = $resultado * $parametro;
            $parametro--;
        }
        return $resultado;
    }

}