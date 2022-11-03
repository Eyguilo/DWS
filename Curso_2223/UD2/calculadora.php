<?php
    class calculadora{
        function factorial($parametro){

            if($parametro == 0){
                return 1;
        
            } elseif($parametro > 0){

                $resultado = 1;
                while($parametro > 0){
        
                    $resultado = $resultado * $parametro;
                    $parametro--;
                }
                return $resultado;
            }
        }

        function coeficienteBinomial($n, $k){
            
            $resultado = 0;

            $calculadora = new calculadora;

            try{
                $resultado = $calculadora->factorial($n)/
                ($calculadora->factorial($k)*$calculadora->factorial($n - $k));
        
                return $resultado;
            }catch(DivisionByZeroError $e){
            }

        }

        function convierteBinarioDecimal($numero){
        
            $numero1 = strrev($numero);

            $numero2 =  str_split($numero1);

            $resultado = 0;
            $operacion;
            
            for($i = 0; $i < count($numero2); $i++){

                $operacion = $numero2[$i] * (2**$i);
                $resultado = $resultado + $operacion;
            }
            return $resultado;
        }

        function sumaNumerosPares($numeros){
            
            $resultado = 0;
            
            for($i = 0; $i < count($numeros); $i++){

                if($numeros[$i]%2 == 0){
                $resultado = $resultado + $numeros[$i];
                }
               
            }
            return $resultado;
        }

        function esPalindromo($palabra1, $palabra2){
            
            $inversion = strrev($palabra2);
        
                if($palabra1 == $inversion){
                    return true;
                }else{
                    return false;
                }
        }

        function sumaMatrices($m1, $m2){

            $aux = array();
            
            for($i = 0; $i < count($m1); $i++){
                for($j = 0; $j < count($m2); $j++){
                    $aux[$i][$j]= $m1[$i][$j] + $m2[$i][$j];
                }                
            }
            return $aux;
        }

        function printArray($m){
            for($i = 0; $i < count($m); $i++){
                for($j = 0; $j < count($m); $j++){
                    echo $m[$i][$j]."  ";
                }
                echo "<br>";
            }
            return $m;
        }
    }