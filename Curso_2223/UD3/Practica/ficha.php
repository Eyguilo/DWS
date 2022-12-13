<?php

    ini_set('display_errors', 1);
    ini_set('html_errors', 1);

    class Ficha{

        private $id_pelicula;
        private $titulo;
        private $imagen;
        private $ano;
        private $duracion;
        private $sinopsis;
        private $votos;
        private $id_categoria;

        private function init($id_pelicula,$titulo,$imagen,$ano,$duracion,$sinopsis,$votos, $id_categoria){

            $this->id_pelicula=$id_pelicula;
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
        
        function obtenerDatos($id_pelicula){

            $conexion = mysqli_connect('localhost', 'root', '1234');
            mysqli_select_db($conexion, 'cartelera');
            $consulta = "SELECT * FROM T_Pelicula WHERE id_pelicula = $id_pelicula;";
            $resultado = mysqli_query($conexion, $consulta);
            
            if(!$resultado){        
                $mensaje = 'Consulta inválida: '.mysqli_error($conexion)."\n";
                $mensaje .= 'Consulta realitzada: '.$consulta;
                die($mensaje);        
            } else{                   
                while($registro = mysqli_fetch_assoc($resultado)){
    
                    $ficha1 = new Ficha();

                    $ficha1->init($registro['id_pelicula'], $registro['titulo'], $registro['imagen'], $registro['ano'], $registro['duracion'], 
                    $registro['sinopsis'], $registro['votos'], $registro['id_categoria']);
                }
            }
            return $ficha1;             
        }

        function mostrarCabezera($categoria){
            echo "    
            <div class='contenedor'>
                <div class='primera_caja'>
                    <h1 class='titulo_categoria'>Categoría: ".$categoria."</h1>
                    <a class='enlace_inicio' href='categorias.php'>Inicio</a>
                </div>";
        }
        
        function mostrarFicha($id_pelicula, $categoria){

            $ficha2 = new Ficha();
    
            $pelicula = $ficha2->obtenerDatos($id_pelicula);
    
            echo "
                    <div class='segunda_caja'>
                        <div class='primera_columna'>
                            <div class='titulo_caja'><h3>".$pelicula->getTitulo()."</h3></div>
                            <div class='imagen_caja'>
                                <img src='imagenes/".$categoria."/".$pelicula->getImagen()."' alt='".$pelicula->getImagen()."'>
                            </div>
                            <div class='duracion_caja'>Duración: ".$pelicula->getDuracion()." min.</div>
                        </div>
                        <div class='segunda_columna'>
                            <div class='votos_caja'>
                                <form action='voto.php' method='POST'>
                                    <input id='id_campo_1' name='nombre_campo_1' type='hidden' value='".$pelicula->getIdPelicula()."'>
                                    <a href='voto.php'><input class='boton' type='submit' value='Votar'></a><br>
                                </form>
                            </div>
                            <div class='ano_caja'>Año: ".$pelicula->getAno()."</div>
                            <div class='directores_caja'>Directores: </div>
                            <div class='reparto_caja'>Reparto: </div>
                            <div class='sinopsis_caja'>".$pelicula->getSinopsis()."</div>
                        </div>
                        <div class='tercera_columna'></div>                
                    </div>
                </div>";  
        }
        
        public function getIdPelicula(){
            return $this->id_pelicula;
        }
        public function getTitulo(){
            return $this->titulo;
        }
        public function getImagen(){
            return $this->imagen;
        }
        public function getAno(){
            return $this->ano;
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
        public function getIdCategoria(){
            return $this->id_categoria;
        } 
    }