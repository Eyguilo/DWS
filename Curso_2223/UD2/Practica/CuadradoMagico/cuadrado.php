<?php

    class Cuadrado{

        private $arrayResultados;
        private $matriz;
        
        function __constructor($arrayResultados, $matriz){

            $this->arrayResultados = $arrayResultados;
            $this->matriz = $matriz;
        }

        function sumFila($matriz, $numFila){
            $fila = 0;

            for ($i=0; $i < count($matriz); $i++) {

                if(is_int($matriz[$numFila][$i]) == false){
                    throw new Exception ('Solo puede haber números enteros.');
                }else{
                    $fila = $fila + $matriz[$numFila][$i];
                }
            }
            return $fila;
        }

        function sumCol($matriz, $numCol){
            $col = 0;

            for ($i=0; $i < count($matriz); $i++) {

                if(is_int($matriz[$i][$numCol]) == false){
                    throw new Exception("Falta un número entero.");
                }else{
                    $col = $col + $matriz[$i][$numCol];
                }

                
            }
            return $col;
        }

        function diagonal1($matriz){

            $dia = 0;
            
            for ($i = 0; $i < count($matriz); $i++) {
                for ($j = 0; $j < count($matriz[$i]); $j++) { 
                    if($j + $i == count($matriz) - 1){
                        $dia = $dia + $matriz[$i][$j];
                    }
                }
            }
            return $dia;
        }

        function diagonal2($matriz){

            $dia = 0;
            for ($i=0; $i < count($matriz); $i++) {
                for ($j=0; $j < count($matriz); $j++) { 
                    if($j == $i){
                        $dia = $dia + $matriz[$i][$j];
                    }
                }
            }
            return $dia;
        }

        function analizarCuadradoMagico($matriz){
            $cuadrado = new Cuadrado();

            for ($i=0; $i < count($matriz); $i++) {

                $this->arrayResultados[0][$i] = $cuadrado->sumFila($matriz, $i);
                $this->arrayResultados[1][$i] = $cuadrado->sumCol($matriz, $i);
            }

            $this->arrayResultados[2][0] = $cuadrado->diagonal1($matriz);
            $this->arrayResultados[2][1] = $cuadrado->diagonal2($matriz);
            
            return $cuadrado;
        }

        function pintarMatriz($matriz){

            echo "<table>";
            
            for($i=0; $i < count($matriz); $i++) {

                echo "<tr>";
                for ($j=0; $j < count($matriz); $j++) {                         
                    echo "<td>".$matriz[$i][$j]."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

            echo "<br><br>";            
        }

        function pintarCuadradoMagico($cuadrado){

            //$cuadrado->pintarMatriz($cuadrado->getMatriz());

            $array = $this->arrayResultados;
            
            $fila1 = $array[0][0];

            $contPosCorrectas = 0;
            $totalPos = count($array[0]) * 2;

            for ($i=0; $i < count($array) - 1; $i++) {
                for ($j=0; $j < count($array[0]); $j++) {
                    if($array[$i][$j] == $array[0][0]){

                        $contPosCorrectas++;
                    }
                }                    
            }

            if($contPosCorrectas == $totalPos){

                echo '<p class="true">ES UN CUADRADO MÁGICO</p>';

            } else{

                echo '<p class="false">NO ES UN CUADRADO MÁGICO</p>';

                echo "<br>";

                echo "Respecto a la suma de la primera fila que es: ".$fila1;

                echo "<br><br>";

                echo "Las filas diferentes a ".$fila1." son:";
                
                for ($i=1; $i < count($array[0]); $i++) {                        

                    if($array[0][$i] != $array[0][0]){
                        
                        echo "<br><br>";
                        echo "Fila ".$i.".";
                    }
                }

                echo "<br><br>";

                echo "Las columnas diferentes a ".$fila1." son:";
                
                for ($i=0; $i < count($array[1]); $i++) {                        

                    if($array[1][$i] != $array[0][0]){
                        
                        echo "<br><br>";
                        echo "Columna ".$i.".";
                    }
                }

                echo "<br><br>";

                echo "Las diagonales diferentes a ".$fila1." son:";

                $nombres = array("Primera", "Segunda");

                if($array[2][0] != $array[0][0]){
                    
                    echo "<br><br>";
                    $mensaje = "Primera diagonal.";
                    echo $mensaje;
                }
                if($array[2][1] != $array[0][0]){
                    echo "<br><br>";
                    $mensaje = "Segunda diagonal.";
                    echo $mensaje;
                }
                if(($array[2][0] == $array[0][0]) && ($array[2][1] == $array[0][0])){
                    echo "<br><br>";
                    echo "Las diagonales son correctas.";
                }
                
                echo "<br><br>";
            }
        }

        public function getMatriz(){
            return $this->matriz;
        }
        public function getArrayResultados(){
            return $this->arrayResultados;
        }
    }