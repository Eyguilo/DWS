<!DOCTYPE html>
<html lang='es'>
<head>

<?php 

$estilo;
$categoria = $_GET['categoria'];

if($categoria == "terror"){

    $estilo = 'estilos_terror';
}elseif($categoria == "anime"){
    $estilo = 'estilos_anime';
}

echo"

    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='".$estilo.".css'>
    <title>Películas</title>
</head>
<body>
"
?>

<?php
    echo "<div class='contenedor'>

        <div class='primera_caja'>
            <h1 class='titulo_categoria'>Categoría: </h1>
            <a class='enlace_inicio' href='categorias.php'>Inicio</a>
        </div>

        <div class='segunda_caja'>
            <div class='primera_columna'>
                <div class='titulo_caja'><h3>El resplandor</h3></div>
                <div class='imagen_caja'>
                    <img src='imagenes/the_shining.jpg' alt='imagen_the_shining'>
                </div>
                <div class='duracion_caja'>Duración: </div>
            </div>
            <div class='segunda_columna'>
                <div class='votos_caja'>Votos: </div>
                <div class='sinopsis_caja'>Sinopsis: </div>
                <div class='enlace_caja'>Enlace: <a class='enlace_ficha' href='fichas.php'>Ver ficha</a></div>
            </div>
            <div class='tercera_columna'>
            </div>
        </div>
        
        <div class='segunda_caja'>
            <div class='primera_columna'>
                <div class='titulo_caja'><h3>Insidious</h3></div>
                <div class='imagen_caja'>
                    <img src='imagenes/insidious.jpg' alt='imagen_insidious'>
                </div>
                <div class='duracion_caja'>Duración: </div>
            </div>
            <div class='segunda_columna'>
                <div class='votos_caja'>Votos: </div>
                <div class='sinopsis_caja'>Sinopsis: </div>
                <div class='enlace_caja'>Enlace: </div>
            </div>
            <div class='tercera_columna'>
            </div>
        </div>

        <div class='segunda_caja'>
            <div class='primera_columna'>
                <div class='titulo_caja'><h3>Insidious</h3></div>
                <div class='imagen_caja'>
                    <img src='imagenes/insidious.jpg' alt='imagen_insidious'>
                </div>
                <div class='duracion_caja'>Duración: </div>
            </div>
            <div class='segunda_columna'>
                <div class='votos_caja'>Votos: </div>
                <div class='sinopsis_caja'>Sinopsis: </div>
                <div class='enlace_caja'>Enlace: </div>
            </div>
            <div class='tercera_columna'>
            </div>
        </div>
    </div>"
?>      
</body>
</html>