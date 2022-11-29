<!DOCTYPE html>
<html lang='es'>
<head>

    <?php 

    $estilo;
    $categoria = $_GET['categoria'];

    if($categoria == "terror"){
        $id_categoria = 1;
    }elseif($categoria == "anime"){
        $id_categoria = 2;
    }

    echo "
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='css/estilos_".$categoria.".css'>
        <title>Películas: ".$categoria."</title>
    </head>
    <body>";
    ?>

    <?php

    ini_set('display_errors', 1);
    ini_set('html_errors', 1);

    echo "<div class='contenedor'>";

    echo "<div class='primera_caja'>
            <h1 class='titulo_categoria'>Categoría: ".$categoria."</h1>
            <a class='enlace_inicio' href='categorias.php'>Inicio</a>
        </div>";




    function mostrarPelicula($id_categoria, $categoria){

    $conexion = mysqli_connect('localhost', 'root', '1234');
    mysqli_select_db($conexion, 'cartelera');
    $consulta = "SELECT * FROM T_Pelicula WHERE id_categoria = $id_categoria;";
    $resultado = mysqli_query($conexion, $consulta);
    
        if(!$resultado){

            $mensaje = 'Consulta inválida: '.mysqli_error($conexion)."\n";
            $mensaje .= 'Consulta realitzada: '.$consulta;
            die($mensaje);

        } else{

            
            while($registro = mysqli_fetch_assoc($resultado)){

                echo (var_dump($imagen = $registro['imagen']));

                echo "
                <div class='segunda_caja'>
                    <div class='primera_columna'>
                        <div class='titulo_caja'><h3>".$titulo = $registro['titulo']."</h3></div>
                        <div class='imagen_caja'>
                            <img src='imagenes/".$categoria."/".$imagen = $registro['imagen']."' alt='".$imagen = $registro['imagen']."'>
                        </div>
                        <div class='duracion_caja'>Duración: ".$duracion = $registro['duracion']." min.</div>
                    </div>
                    <div class='segunda_columna'>
                    <div class='votos_caja'>Votos: ".$votos = $registro['votos']."</div>
                    <div class='sinopsis_caja'>".longitudSinopsis($sinopsis = $registro['sinopsis'])."<a class='enlace_ficha' href='ficha.php'>...</a></div>
                    <div class='enlace_caja'>Enlace: <a class='enlace_ficha' href='ficha.php?id=".$id = $registro['id']."'>Ver ficha</a></div>
                </div>
                <div class='tercera_columna'></div>
                </div>"; 
            }
        }  
    }
    
    function longitudSinopsis($sinopsis){
        $resumen = substr($sinopsis, 0, 200);
        return $resumen;        
    }

    mostrarPelicula($id_categoria, $categoria);

    echo "</div>";

    ?>      
</body>
</html>