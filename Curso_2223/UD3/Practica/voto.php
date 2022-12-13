<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/voto.css'> 
    <title>Voto</title>
</head>
<body>
    <?php
        ini_set('display_errors', 1);
        ini_set('html_errors', 1);

        $valor = $_POST['nombre_campo_1'];

        mostrarMensaje();

        function mostrarMensaje(){

            echo"
            <div class='contenedor'>
                <div class='fondo_1'></div>
                <div class='fondo_2'></div>
                <div class='fondo_3'></div>                
                <div class='caja_uno'>
                    <h1>Tu voto ha sido enviado correctamente.</h1><br><br>
                    <a href='categorias.php'><p>Inicio</p></a>
                </div>
            </div>";
        }
    ?>    
</body>
</html>