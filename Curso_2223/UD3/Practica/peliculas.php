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

echo "
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='".$estilo.".css'>
    <title>Películas: ".$categoria."</title>
</head>
<body>";
?>

<?php

    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    require("objetos.php");

    echo "<div class='contenedor'>";

    echo "<div class='primera_caja'>
            <h1 class='titulo_categoria'>Categoría: ".$categoria."</h1>
            <a class='enlace_inicio' href='categorias.php'>Inicio</a>
        </div>";


    function mostrarPelicula($peliculas){

        for ($i=0; $i < count($peliculas); $i++) {             

            echo "
            <div class='segunda_caja'>
                <div class='primera_columna'>
                    <div class='titulo_caja'><h3>".$peliculas[$i]->getTitulo()."</h3></div>
                    <div class='imagen_caja'>
                        <img src='".$peliculas[$i]->getImagen()."' alt='imagen_the_shining'>
                    </div>
                    <div class='duracion_caja'>Duración: ".$peliculas[$i]->getDuracion()." min.</div>
                </div>
                <div class='segunda_columna'>
                    <div class='votos_caja'>Votos: ".$peliculas[$i]->getVotos()."</div>
                    <div class='sinopsis_caja'>".longitudSinopsis($peliculas[$i])."<a class='enlace_ficha' href='fichas.php'>...</a></div>
                    <div class='enlace_caja'>Enlace: <a class='enlace_ficha' href='fichas.php'>Ver ficha</a></div>
                </div>
                <div class='tercera_columna'></div>
            </div>";
        }
    }
    
    function longitudSinopsis($pelicula){

        $resumen = substr($pelicula->getSinopsis(), 0, 200);

        return $resumen;        
    }

    $pelicula1 = new PeliculaTerror(7,"El resplandor","imgs/terror/the_shining.jpg",1980,146,"Stanley Kubrick","Stanley Kubrick, Diane Johnson. Novela: Stephen King","Rachel Elkind, Wendy Carlos","John Alcott",
    "Jack Nicholson, Shelley Duvall, Danny Lloyd, Scatman Crothers, Barry Nelson, Philip Stone, Joe Turkel, Lia Beldam, Billie Gibson, Barry Dennen, David Baxt, Manning Redwood, Lisa Burns, Alison Coleridge, Norman Gay, 
    Tony Burton, Anne Jackson, Jana Shelden, Burnell Tucker","Coproducción Reino Unido-Estados Unidos; Hawk Films, Peregrine, Warner Bros., Producers Circle. Distribuidora: Warner Bros.","Terror | Sobrenatural. Casas 
    encantadas. Fantasmas. Drama psicológico. Película de culto","Jack Torrance se traslada con su mujer y su hijo de siete años al impresionante hotel Overlook, en Colorado, para encargarse del mantenimiento de 
    las instalaciones durante la temporada invernal, época en la que permanece cerrado y aislado por la nieve. Su objetivo es encontrar paz y sosiego para escribir una novela. Sin embargo, poco después de su 
    llegada al hotel, al mismo tiempo que Jack empieza a padecer inquietantes trastornos de personalidad, se suceden extraños y espeluznantes fenómenos paranormales.", 10);

    mostrarPelicula($peliculas);
    longitudSinopsis($pelicula1);
    echo "</div>";

?>      
</body>
</html>