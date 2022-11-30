<?php

    ini_set('display_errors', 1);
    ini_set('html_errors', 1);

    class Pelicula{

        private $id;
        private $titulo;
        private $imagen;
        private $ano;
        private $duracion;
        private $sinopsis;
        private $votos;
        private $id_categoria;

        private function init($id,$titulo,$imagen,$ano,$duracion,$sinopsis,$votos, $id_categoria){

            $this->id=$id;
            $this->titulo=$titulo;
            $this->imagen=$imagen;
            $this->ano=$ano;
            $this->duracion=$duracion;
            $this->sinopsis=$sinopsis;
            $this->votos=$votos;
            $this->id_categoria = $id_categoria;
        }

        public function __construct(){
        }
        
        function obtenerDatos($id_categoria){

            $conexion = mysqli_connect('localhost', 'root', '1234');
            mysqli_select_db($conexion, 'cartelera');
            $consulta = "SELECT * FROM T_Pelicula WHERE id_categoria = $id_categoria;";
            $resultado = mysqli_query($conexion, $consulta);

            $peliculas = array();
            $contador = 0;
            
            if(!$resultado){        
                $mensaje = 'Consulta inválida: '.mysqli_error($conexion)."\n";
                $mensaje .= 'Consulta realitzada: '.$consulta;
                die($mensaje);        
            } else{                   
                while($registro = mysqli_fetch_assoc($resultado)){
    
                    $pelicula1 = new Pelicula();

                    $pelicula1->init($registro['id'], $registro['titulo'], $registro['imagen'], $registro['ano'], $registro['duracion'], 
                    $registro['sinopsis'], $registro['votos'], $registro['id_categoria']);

                    $peliculas[$contador] = $pelicula1;    
                    $contador++;
                }
            }
            return $peliculas;             
        }

        function mostrarCabezera($categoria){
            echo "    
            <div class='contenedor'>
                <div class='primera_caja'>
                    <h1 class='titulo_categoria'>Categoría: ".$categoria."</h1>
                    <a class='enlace_inicio' href='categorias.php'>Inicio</a>
                </div>";
        }
        
        function mostrarPelicula($id_categoria, $categoria){

            $pelicula2 = new Pelicula();
    
            $peliculas = $pelicula2->obtenerDatos($id_categoria);
    
            for ($i=0; $i < count($peliculas); $i++) {
                echo "
                    <div class='segunda_caja'>
                        <div class='primera_columna'>
                            <div class='titulo_caja'><h3>".$peliculas[$i]->getTitulo()."</h3></div>
                            <div class='imagen_caja'>
                                <img src='imagenes/".$categoria."/".$peliculas[$i]->getImagen()."' alt='".$peliculas[$i]->getImagen()."'>
                            </div>
                            <div class='duracion_caja'>Duración: ".$peliculas[$i]->getDuracion()." min.</div>
                        </div>
                    <div class='segunda_columna'>
                        <div class='votos_caja'>Votos: ".$peliculas[$i]->getVotos()."</div>
                        <div class='sinopsis_caja'>".$pelicula2->longitudSinopsis($peliculas[$i]->getSinopsis())."<a class='enlace_ficha' href='ficha.php'>...</a></div>
                        <div class='enlace_caja'>Enlace: <a class='enlace_ficha' href='ficha.php?id=".$peliculas[$i]->getId()."'>Ver ficha</a></div>
                    </div>
                        <div class='tercera_columna'></div>                
                    </div>";
            }  
        }

        function longitudSinopsis($sinopsis){
            $resumen = substr($sinopsis, 0, 200);
            return $resumen;        
        }
        
        public function getId(){
            return $this->id;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getImagen(){
            return $this->imagen;
        }
        public function getAno(){
            return $this->anyo;
        }
        public function getDuracion(){
            return $this->duracion;
        }
        public function getSinopsis(){
            return $this->sinopsis;
        }
        public function getVotos(){
            return $this->votos;
        }
        
    }