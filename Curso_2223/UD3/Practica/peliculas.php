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
    <title>Películas: ".$categoria."</title>
</head>
<body>";
?>

<?php

    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    echo "<div class='contenedor'>";

    echo "<div class='primera_caja'>
            <h1 class='titulo_categoria'>Categoría: ".$categoria."</h1>
            <a class='enlace_inicio' href='categorias.php'>Inicio</a>
        </div>";

    class Pelicula{

        private $titulo;
        private $imagen;
        private $duracion;
        private $votos;

        public function __constructor($titulo, $imagen, $duracion, $votos){
            $this->titulo = $titulo;
            $this->imagen = $imagen;
            $this->duracion = $duracion;
            $this->votos = $votos;
        }

        function mostrarPelicula($pelicula){

            for ($i=0; $i < 1; $i++) {             

                echo "
                <div class='segunda_caja'>
                    <div class='primera_columna'>
                        <div class='titulo_caja'><h3>".$pelicula->getTitulo()."</h3></div>
                        <div class='imagen_caja'>
                            <img src='".$pelicula->getImagen()."' alt='imagen_the_shining'>
                        </div>
                        <div class='duracion_caja'>Duración: ".$pelicula->getDuracion()." min.</div>
                    </div>
                    <div class='segunda_columna'>
                        <div class='votos_caja'>Votos: ".$pelicula->getVotos()."</div>
                        <div class='sinopsis_caja'>Sinopsis: </div>
                        <div class='enlace_caja'>Enlace: <a class='enlace_ficha' href='fichas.php'>Ver ficha</a></div>
                    </div>
                    <div class='tercera_columna'></div>
                </div>";
            }
        }

        public function getTitulo(){
            return $this->titulo;
        }

        public function setTitulo($titulo){
            $this->titulo= $titulo;
        }
        public function getImagen(){
            return $this->imagen;
        }

        public function setImagen($imagen){
            $this->iamgen= $imagen;
        }
        public function getDuracion(){
            return $this->duracion;
        }

        public function setDuracion($duracion){
            $this->duracion= $duracion;
        }
        public function getVotos(){
            return $this->votos;
        }

        public function setVotos($votos){
            $this->votos= $votos;
        }
    }


    $pelicula1 = new Pelicula ("El Resplandor", "imagenes/the_shining.jpg", 103, 5);
    $pelicula1->mostrarPelicula($pelicula1);                           
    
    echo "</div>";
?>      
</body>
</html>