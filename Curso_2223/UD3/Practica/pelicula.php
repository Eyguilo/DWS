<?php

    class Pelicula{

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
        
        function obtener_datos($id_categoria, $valor_ordenacion){

            $conexion = mysqli_connect('localhost', 'root', '1234');
            if (mysqli_connect_errno()){
                echo "Error al conectar MySQL: ".mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'cartelera');
            $sanitized_categoria_id = mysqli_real_escape_string($conexion, $id_categoria);
            $consulta = "SELECT * FROM T_Pelicula WHERE id_categoria = $sanitized_categoria_id $valor_ordenacion;";
            $resultado = mysqli_query($conexion, $consulta);

            $peliculas = array();
            $contador = 0;

            if(!$resultado){
                $mensaje = 'Consulta inválida: '.mysqli_error($conexion)."\n";
                $mensaje .= 'Consulta realitzada: '.$consulta;
                die($mensaje);                 
            } else {
                if(($resultado->num_rows) > 0){
                    while($registro = mysqli_fetch_assoc($resultado)){

                        $pelicula1 = new Pelicula();

                        $pelicula1->init($registro['id_pelicula'], $registro['titulo'], $registro['imagen'], $registro['ano'], $registro['duracion'], 
                        $registro['sinopsis'], $registro['votos'], $registro['id_categoria']);
    
                        $peliculas[$contador] = $pelicula1;    
                        $contador++;
                    }
                } else{
                    echo "No hay resultados.";
                }
            }     
            return $peliculas;           
        }

        function pintar_cabezera($categoria, $id_categoria){
            echo "    
            <div class='contenedor'>
                <div class='primera_caja'>
                    <h1 class='titulo_categoria'>Categoría: ".$categoria."</h1>
                    <a class='enlace_inicio' href='categorias.php'>Inicio</a>
                    <div class='desplegable'>
                        <p class='boton_desplegable'>Ordenar por...</p>
                        <div class='contenido_desplegable'>
                            <a href='peliculas.php?id_categoria=".$id_categoria."&ordenacion=0'>Predeterminado</a>
                            <a href='peliculas.php?id_categoria=".$id_categoria."&ordenacion=1'>Ascendete por votos</a>
                            <a href='peliculas.php?id_categoria=".$id_categoria."&ordenacion=2'>Descendente por votos</a>
                            <a href='peliculas.php?id_categoria=".$id_categoria."&ordenacion=3'>Ascendente por títulos</a>
                            <a href='peliculas.php?id_categoria=".$id_categoria."&ordenacion=4'>Descendente por títulos</a>
                        </div>
                    </div>
                </div>";
        }
        
        function pintar($id_categoria, $categoria, $valor_ordenacion){

            $pelicula2 = new Pelicula();
    
            $peliculas = $pelicula2->obtener_datos($id_categoria, $valor_ordenacion);
    
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
                            <div class='sinopsis_caja'>".$pelicula2->longitud_sinopsis($peliculas[$i]->getSinopsis())."</div>
                            <div class='enlace_caja'>Enlace: <a class='enlace_ficha' href='fichas.php?id_pelicula=".$peliculas[$i]->getIdPelicula()."&id_categoria=".$peliculas[$i]->getIdCategoria()."'>Ver ficha</a></div>
                        </div>
                            <div class='tercera_columna'></div>                
                    </div>";
            }  
        }

        function longitud_sinopsis($sinopsis){

            if(strlen($sinopsis) > 300){
                $resumen = substr($sinopsis, 0, 300)."...";
                return $resumen;  
            } else{
                return $sinopsis;
            }      
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