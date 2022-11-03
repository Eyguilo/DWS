<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP</title>
</head>
<body>
    <div>
        Curso PHP <br><br>

        <?php

        echo "Introduce un parámetro: <br>";

        $numeros = [6, 7, 8, 9, 9, 4, 4, 5, 2, 3];

        $buscar = $_GET["parametro"];

        function encontrarOcurrencia($numero, $array){

            $mensaje = "La primera ocurrencia encontrada esta en la
            posición: ";

           for($i = 0; $i < count($array); $i++){

                if($numero == $array[$i]){
                    echo $mensaje.$i;
                    break;
                } elseif($i == count($array) -1){
                    echo $mensaje.-1;
                }
           }
        }

        encontrarOcurrencia($buscar,$numeros);
        ?>
    </div>    
</body>
</html>