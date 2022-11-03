<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Curso PHP </title>
</head>
<body>

    <div> Curso PHP <br><br>
        <?php
            $parametro = $_GET['numero'];

            if($parametro == ''){

                echo "Parametro vacío.";
            }else{
                require("factorial.php");


                $mensaje = "El factorial de ".$parametro." es: ".factorial($parametro);
                echo $mensaje;
            }

        ?>
    </div>
</body>
</html>