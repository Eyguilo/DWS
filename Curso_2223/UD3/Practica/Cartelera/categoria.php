d<?php
    class Categoria{

        private $id_categoria;
        private $nombre;
        private $imagen;

        private function init($id_categoria,$nombre, $imagen){

            $this->id_categoria=$id_categoria;
            $this->nombre=$nombre;
            $this->imagen=$imagen;
        }

        public function __construct(){
        }

        function obtenerDatos(){

            $conexion = mysqli_connect('localhost', 'root', '1234');
            if (mysqli_connect_errno()){
                echo "Error al conectar MySQL: ".mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'cartelera');
            $consulta = "SELECT id_categoria, nombre, imagen FROM T_Categoria;";
            $resultado = mysqli_query($conexion, $consulta);

            $contador = 0;

            if(!$resultado){
                $mensaje = 'Consulta inválida: '.mysqli_error($conexion)."\n";
                $mensaje .= 'Consulta realitzada: '.$consulta;
                die($mensaje);                 
            } else {
                if(($resultado->num_rows) > 0){
                    while($registro = mysqli_fetch_assoc($resultado)){
    
                        $categoria1 = new Categoria();
    
                        $categoria1->init($registro['id_categoria'], $registro['nombre'], $registro['imagen']);
    
                        $categorias[$contador] = $categoria1;    
                        $contador++;
                    }
                } else{
                    echo "<div class='cajaError'><p class='noResultado'>No se han encontrado resultados.</p></div>";
                }
            }

            return $categorias;      
        }

        function pintar_cabezera(){
            echo "
                <div class='contenedor'> 
                    <div class='caja_uno'><h1>Categorías</h1></div>";
        }

        function pintar(){

            $categoria2 = new Categoria();
            $categorias = $categoria2->obtenerDatos();

            echo"
                    <div class='caja_dos'>
                        <div class='columna_uno'>
                            <div class='caja_imagen_1'>
                                <a href='peliculas.php?id_categoria=".$categorias[0]->getIdCategoria()."&ordenacion=0'>
                                    <img src='imagenes/terror/".$categorias[0]->getImagen()."' alt='".$categorias[0]->getImagen()."'>
                                <p class='nombreCategoria'>".$categorias[0]->getNombre()."</p></a>
                            </div>
                        </div>
                        
                        <div class='columna_dos'>
                            <div class='caja_imagen_2'>
                                <a href='peliculas.php?id_categoria=".$categorias[1]->getIdCategoria()."&ordenacion=0'>
                                    <img src='imagenes/anime/".$categorias[1]->getImagen()."' alt='".$categorias[1]->getImagen()."'>
                                    <p class='nombreCategoria'>".$categorias[1]->getNombre()."</p>
                                </a>
                            </div>                
                        </div>
                    </div>";
        }

        public function getIdCategoria(){
            return $this->id_categoria;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getImagen(){
            return $this->imagen;
        }
    }