<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>

    <?php

        ini_set('display_errors', 1);
        ini_set('html_errors', 1);

        $conexion = mysqli_connect('localhost', 'root', '1234');

        mysqli_select_db($conexion, 'cartelera');

        $consulta = "SELECT * FROM T_Pelicula;";

        $resultado = mysqli_query($conexion, $consulta);

        if(!$resultado){
            $mensaje = 'Consulta inválida: '.mysqli_error($conexion)."\n";
            $mensaje = 'Consulta realitzada: '.$consulta;
            die($mensaje);
        } else{

            echo "Conexión OK."."<br><br>";
            while($registro = mysqli_fetch_assoc($resultado)){

                echo $registro['titulo']."<br><br>";
            }
        }
    ?> 
</body>
</html>