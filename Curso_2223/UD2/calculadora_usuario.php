<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP</title>
</head>
<body>
    <div><h1>Curso PHP </h1>
        <?php
        ini_set('display_errors', 'On');
        ini_set('html_errors', 0);
        
            $parametro = 6;

            require("calculadora.php");
            
            $calculadora = new calculadora;

            if($parametro >= 0){
                $mensaje1 = "El factorial de ".$parametro." es: ".
                $calculadora->factorial($parametro);
                echo $mensaje1;
            } else{
                echo "Por favor un número mayor o igual que 0.";
            }           
        ?>
       
        <?php
            echo "<br><br>";

            $num1 = 7;
            $num2 = 7;

            if($calculadora->coeficienteBinomial($num1, $num2)){
                $mensaje2 = "El coeficiente binomial de ".$num1." y ".$num2." es: ".$calculadora->coeficienteBinomial($num1, $num2);
                echo $mensaje2;
            } else{
                throw new Exception("El divisor tiene que ser mayor 0.");
            }


        ?>

        <?php
            echo "<br><br>";

            $binario = 1001;

            $mensaje3 = "El número de decimal de ".$binario." es: ".$calculadora->convierteBinarioDecimal($binario);
            echo $mensaje3;
        ?>

        <?php
            echo "<br><br>";
            $numeros = array(4524, 4582, 7845);

            $mensaje4 = "La suma del los números pares en el array es: ".$calculadora->sumaNumerosPares($numeros);

            echo $mensaje4;
        ?>

        <?php
            echo "<br><br>";
            $palabra1 = "adan";
            $palabra2 = "nada";

            if($calculadora->esPalindromo($palabra1, $palabra2) == true){
                $mensaje5 = $palabra1." y ".$palabra2." son palíndromos.";
            } else{
                $mensaje5 = $palabra1." y ".$palabra2." no son palíndromos.";
            }
            echo $mensaje5;
        ?>

        <?php
            echo "<br><br>";

            $m1 = array(
                array(2,0),
                array(3,0)
            );

            $m2 = array(
                array(1,0),
                array(1,2)
            );

            $suma = $calculadora->sumaMatrices($m1, $m2);

            $mFinal = $calculadora->printArray($suma);

            echo $mFinal;
          
        ?>
    </div>
    
</body>
</html>