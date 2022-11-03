<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadrado Mágico</title>
    <link rel="stylesheet" href="estilos_cuadrado_magico.css">
</head>
<body>

    <h1>Cuadrado Mágico</h1>

    <?php
        ini_set('display_errors', 'On');
        ini_set('html_errors', 0);

        

        class Cuadrado{

            private $esCuadradoMagico;
            private $arrayResultados;
            /*private $matriz = array(
                array(4, 9, 2),
                array(3, 5, 7),
                array(8, 1, 1)
            );*/

            private $matriz = array(
                array(4, 14, 15, 1),
                array(9, 7, 6, 12),
                array(5, 11, 10, 8),
                array(16, 2, 3, 13)
            );
            
            function __constructor($arrayResultados, $matriz){
                $this->arrayResultados = $arrayResultados;
                $this->matriz = $matriz;
            }

            function sumFila($matriz, $numFila){
                $fila = 0;

                for ($i=0; $i < count($matriz); $i++) {

                    $fila = $fila + $matriz[$numFila][$i];
                }
                return $fila;
            }

            function sumCol($matriz, $numCol){
                $col = 0;

                for ($i=0; $i < count($matriz); $i++) {

                    $col = $col + $matriz[$i][$numCol];
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
                $cuadrado2 = new Cuadrado();

                for ($i=0; $i < count($matriz); $i++) {

                    $this->arrayResultados[0][$i] = $cuadrado2->sumFila($matriz, $i);
                    $this->arrayResultados[1][$i] = $cuadrado2->sumCol($matriz, $i);
                }

                $this->arrayResultados[2][0] = $cuadrado2->diagonal1($matriz);
                $this->arrayResultados[2][1] = $cuadrado2->diagonal2($matriz);

                return $this->arrayResultados;
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

            function pintarCuadradoMagico($array){

                $cuadrado3 = new Cuadrado();
                $cuadrado3->pintarMatriz($this->matriz);

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
                    
                    for ($i=0; $i < 2; $i++) {                        
    
                        if($array[2][$i] != $array[0][0]){
                            
                            echo "<br><br>";
                            echo "Diagonal ".($i + 1).".";
                        }
                    }
                    echo "<br><br>";
                }

                echo $contPosCorrectas;
                echo "<br><br>";
                echo $totalPos;
            }

            public function getMatriz(){
                return $this->matriz;
            }

            public function getArrayResultados(){
                return $this->arrayResultados;
            }
        }
        

        $cuadrado1 = new Cuadrado;

        $cuadrado1->pintarCuadradoMagico($cuadrado1->analizarCuadradoMagico($cuadrado1->getMatriz()));

        echo "<br><br>";
        print_r($cuadrado1->analizarCuadradoMagico($cuadrado1->getMatriz()))
    ?>
</body>
</html>