<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/voto.css'> 
    <title>Sumar voto</title>
</head>
<body>
    <?php
        ini_set('display_errors', 1);
        ini_set('html_errors', 1);

        

        $id_pelicula = $_POST['nombre_campo_1'];

        sumarVoto($id_pelicula);
        mostrarMensaje();





        
        function sumarVoto($id_pelicula){

            $conexion = mysqli_connect('localhost', 'root', '1234');
            mysqli_select_db($conexion, 'cartelera');
            $consulta = "UPDATE T_Pelicula SET votos = votos + 1 WHERE id_pelicula = $id_pelicula;";
            $resultado = mysqli_query($conexion, $consulta);
            
            if(!$resultado){        
                $mensaje = 'Consulta inválida: '.mysqli_error($conexion)."\n";
                $mensaje .= 'Consulta realitzada: '.$consulta;
                die($mensaje);        
            }          
        }
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