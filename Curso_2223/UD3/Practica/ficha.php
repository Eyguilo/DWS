<!DOCTYPE html>
<html lang='es'>
<head>
    <?php
    echo "
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/ficha_terror.css'>
    <title>Ficha: </title>";
    ?>
</head>
<body>

    <?php

        ini_set('display_errors', 1);
        ini_set('html_errors', 1);

        require("objetos.php");

        echo "<div class='contenedor'>";

        echo "<div class='primera_caja'>
                <h1 class='titulo_categoria'>Categoría: </h1>
                <a class='enlace_inicio' href='categorias.php'>Inicio</a>
            </div>";


        
        
        function mostrarPelicula($peliculas){
            $id = $_GET['id'];

            for ($i=0; $i < count($peliculas); $i++) {

                if($id == $i){

                    echo "
                    <div class='segunda_caja'>
                        <div class='primera_columna'>
                            <div class='titulo_caja'><h3>".$peliculas[$i]->getTitulo()."</h3></div>
                            <div class='imagen_caja'>
                                <img src='".$peliculas[$i]->getImagen()."'    alt='imagen_the_shining'>
                            </div>
                            <div class='duracion_caja'>Duración: ".$peliculas[$i]->getDuracion()." min.</div>
                        </div>
                        <div class='segunda_columna'>
                            <div class='votos_caja'>Votos: ".$peliculas[$i]->getVotos()."</div>
                            <div class='sinopsis_caja'>".$peliculas[$i]->getSinopsis()."<a class='enlace_ficha' href='ficha.php'>...</a></div>
                            <div class='enlace_caja'>Enlace: <a class='enlace_ficha' href='ficha.php'>Ver ficha</a></div>
                        </div>
                        <div class='tercera_columna'></div>
                    </div>";

                }
            }
        }

        mostrarPelicula($peliculas);
    ?>
    
</body>
</html>