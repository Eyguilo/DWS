<?php
    class Ficha{

        private $id_pelicula;
        private $titulo;
        private $imagen;
        private $ano;
        private $direccion;
        private $duracion;
        private $sinopsis;
        private $votos;
        private $id_categoria;

        private function init($id_pelicula,$titulo,$imagen,$ano,$duracion,$sinopsis,$votos, $id_categoria,$direccion){

            $this->id_pelicula=$id_pelicula;
            $this->titulo=$titulo;
            $this->imagen=$imagen;  
            $this->ano=$ano;            
            $this->duracion=$duracion;
            $this->sinopsis=$sinopsis;
            $this->votos=$votos;
            $this->id_categoria = $id_categoria;
            $this->direccion=$direccion;
        }

        public function __construct(){
        }
        
        function obtener_datos($id_pelicula){

            $conexion = mysqli_connect('localhost', 'root', '1234');
            if (mysqli_connect_errno()){
                echo "Error al conectar MySQL: ".mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'cartelera');
            $sanitized_pelicula_id = mysqli_real_escape_string($conexion, $id_pelicula);
            $consulta1 = "SELECT T_Pelicula.id_pelicula, T_Pelicula.titulo, T_Pelicula.imagen, T_Pelicula.ano, 
            T_Pelicula.duracion, T_Pelicula.sinopsis, T_Pelicula.votos, T_Pelicula.id_categoria, T_Director.nombre_director FROM T_Pelicula 
            INNER JOIN T_Pelicula_Director ON T_Pelicula.id_pelicula = T_Pelicula_Director.id_pelicula
            INNER JOIN T_Director ON T_Pelicula_Director.id_director = T_Director.id_director
            WHERE T_Pelicula.id_pelicula = $sanitized_pelicula_id;";
            $resultado1 = mysqli_query($conexion, $consulta1);

            $consulta2 = "SELECT T_Reparto.nombre_reparto FROM T_Pelicula 
            INNER JOIN T_Pelicula_Reparto ON T_Pelicula.id_pelicula = T_Pelicula_Reparto.id_pelicula
            INNER JOIN T_Reparto ON T_Pelicula_Reparto.id_reparto = T_Reparto.id_reparto 
            WHERE T_Pelicula.id_pelicula = $sanitized_pelicula_id;";
            $resultado2 = mysqli_query($conexion, $consulta2);

            $actor = "";
            if(!$resultado1){
                $mensaje = "<div class='cajaError'><p class='noResultado'>Consulta inválida: '".mysqli_error($conexion)."'\n','Consulta realizada: '".$consulta1."</p></div>";
                die($mensaje);                 
            } else {
                if(($resultado1->num_rows) > 0){
                    while($registro = mysqli_fetch_assoc($resultado1)){

                        $ficha1 = new Ficha();
    
                        $ficha1->init($registro['id_pelicula'], $registro['titulo'], $registro['imagen'], $registro['ano'],
                        $registro['duracion'], $registro['sinopsis'], $registro['votos'], $registro['id_categoria'], $registro['nombre_director']);
                    }
                    while($registro = mysqli_fetch_assoc($resultado2)){
    
                        $actor = $actor.$registro['nombre_reparto'].", ";
                    }
                } else{
                    echo "<div class='cajaError'><p class='noResultado'>No se han encontrado datos sobre la película.</p></div>";
                }

                $actores = substr($actor, 0, -2);
                $ficha = [$ficha1, $actores];
    
                return $ficha; 
            }           
        }

        function pintar_cabezera($id_categoria, $categoria){
            echo "    
            <div class='contenedor'>
                <div class='primera_caja'>
                    <h1 class='titulo_categoria'>Categoría: ".$categoria."</h1>
                    <a class='enlace_inicio' href='categorias.php'>Inicio</a>
                    <a class='enlace_inicio' href='peliculas.php?id_categoria=".$id_categoria."&ordenacion=0'>Volver</a>
                </div>";
        }
        
        function pintar($id_pelicula, $categoria){

            $ficha2 = new Ficha();
    
            $pelicula = $ficha2->obtener_datos($id_pelicula);
    
            echo "
                    <div class='segunda_caja'>
                        <div class='primera_columna'>
                            <div class='titulo_caja'><h3>".$pelicula[0]->getTitulo()."</h3></div>
                            <div class='imagen_caja'>
                                <img src='imagenes/".$categoria."/".$pelicula[0]->getImagen()."' alt='".$pelicula[0]->getImagen()."'>
                            </div>
                            <div class='duracion_caja'>Duración: ".$pelicula[0]->getDuracion()." min.</div>
                        </div>
                        <div class='segunda_columna'>
                            <div class='votos_caja'>
                                <form action='voto.php' method='POST'>
                                    <input id='nombre_campo_1' name='nombre_campo_1' type='hidden' value='".$pelicula[0]->getIdPelicula()."'>
                                    <a href='voto.php'><input class='boton' type='submit' value='Votar'></a><br>
                                </form>
                            </div>
                            <div class='ano_caja'>Año: ".$pelicula[0]->getAno()."</div>
                            <div class='directores_caja'>Dirección: ".$pelicula[0]->getDireccion()."</div>
                            <div class='reparto_caja'>Reparto: ".$pelicula[1]."</div>
                            <div class='sinopsis_caja'>".$pelicula[0]->getSinopsis()."</div>
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
        public function getDireccion(){
            return $this->direccion;
        }
        public function getDuracion(){
            return $this->duracion;
        }
        public function getSinopsis(){
            return $this->sinopsis;
        }
    }