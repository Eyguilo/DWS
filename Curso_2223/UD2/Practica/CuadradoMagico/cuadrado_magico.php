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
    <div id="contenedor">

    <h1>Cuadrado Mágico</h1>

    <?php
        ini_set('display_errors', 'On');
        ini_set('html_errors', 0);

        require("cuadrado.php");
        $arrayResultados = array();




        echo '<p class="test">TEST 1. FILAS Y COLUMNAS ERRÓNEAS CON DIAGONALES CORRECTAS.</p>';
        $matriz1 = array(
            array(4, 9, 2),
            array(1, 5, 1),
            array(8, 1, 6)
        );
        $cuadrado = new Cuadrado($arrayResultados, $matriz1);
        $cuadrado->pintarMatriz($matriz1);
        $cuadrado->pintarCuadradoMagico($cuadrado->analizarCuadradoMagico($matriz1));




        echo '<p class="test">TEST 2. ERRORES EN DIAGONALES EN 5x5.</p>';
        $matriz2 = array(
            array(11, 24, 7, 20, 3),
            array(4, 12, 25, 8, 16),
            array(17, 5, 13, 21, 9),
            array(10, 1, 1, 14, 22),
            array(23, 6, 19, 2, 1)
        );
        $cuadrado = new Cuadrado($arrayResultados, $matriz2);
        $cuadrado->pintarMatriz($matriz2);
        $cuadrado->pintarCuadradoMagico($cuadrado->analizarCuadradoMagico($matriz2));




        echo '<p class="test">TEST 3. ERRORES DE INTRODUCCIÓN DE CARÁCTERES NO NUMÉRICOS ENTEROS.</p>';       
        $matriz3 = array(
            array(4, 9, 2),
            array("", 5, 7),
            array(8, 1, "j")
        );
        try{     
            $cuadrado = new Cuadrado($arrayResultados, $matriz3);
            $cuadrado->pintarMatriz($matriz3);
            $cuadrado->pintarCuadradoMagico($cuadrado->analizarCuadradoMagico($matriz3));
        }catch(Exception $e){
            echo '<p class="false">NO ES UN CUADRADO MÁGICO</p><br>';
            echo "ERROR: ".$e->getMessage();
        }
    
    ?>
    </div>
</body>
</html>