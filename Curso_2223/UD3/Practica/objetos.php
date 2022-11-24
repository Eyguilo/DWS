<?php
    class PeliculaTerror{
        private $id;
        private $titulo;
        private $imagen;
        private $anyo;
        private $duracion;
        private $sinopsis;
        private $votos;

        public function __construct($id,$titulo,$imagen,$anyo,$duracion,$sinopsis,$votos){

            $this->id=$id;
            $this->titulo=$titulo;
            $this->imagen=$imagen;
            $this->anyo=$anyo;
            $this->duracion=$duracion;
            $this->sinopsis=$sinopsis;
            $this->votos=$votos;
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
        public function getAnyo(){
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

        $pelicula_alien = new PeliculaTerror(1,"Alien, el octavo pasajero","imagenes/terror/alien.jpg",1979, 116,"De regreso a la Tierra, la nave de carga Nostromo interrumpe su viaje y despierta a sus siete tripulantes. El ordenador central, MADRE, ha 
        detectado la misteriosa transmisión de una forma de vida desconocida, procedente de un planeta cercano aparentemente deshabitado. La nave se dirige entonces al extraño planeta para investigar el 
        origen de la comunicación.",8
        );

        $pelicula_amanecer = new PeliculaTerror(2,"El amanecer de los muertos","imagenes/terror/amanecer.jpg",2004, 100 ,"Remake del filme de terror de George A. Romero. Una inexplicable plaga ha diezmado la población del planeta, convirtiendo a los muertos en horribles zombies que continuamente buscan carne y sangre 
        humana para sobrevivir. En Wisconsin, un variopinto grupo de personas que han escapado a la plaga, tratan de salvar la vida refugiándose en un centro comercial, donde deben aprender no sólo a protegerse 
        de las hordas de zombies, sino también a convivir.",6
        );

        $pelicula_dejame_salir = new PeliculaTerror (3,"Dejame salir","imagenes/terror/dejame_salir.jpg",2017,103,"Un joven afroamericano visita a la familia de su novia blanca, un matrimonio adinerado. Para Chris 
        (Daniel Kaluuya) y su novia Rose (Allison Williams) ha llegado el momento de conocer a los futuros suegros, por lo que ella le invita a pasar un fin de semana en el campo con sus padres, Missy 
        (Catherine Keener) y Dean (Bradley Whitford). Al principio, Chris piensa que el comportamiento 'demasiado' complaciente de los padres se debe a su nerviosismo por la relación interracial de su hija, 
        pero a medida que pasan las horas, una serie de descubrimientos cada vez más inquietantes le llevan a descubrir una verdad inimaginable.",7
        );                               

        $pelicula_tiburon = new PeliculaTerror(4,"Tiburón","imagenes/terror/tiburon.jpg",1975,124,"En la costa de un pequeño pueblo del Este de los Estados Unidos, un enorme tiburón ataca a varias personas. Por temor a los nefastos efectos que este hecho podría tener sobre el negocio turístico, el alcalde se niega a cerrar las playas y a difundir la 
        noticia. Pero un nuevo ataque del tiburón termina con la vida de un bañista. Cuando el terror se apodera de todos, un veterano cazador de tiburones, un oceanógrafo y el jefe de la policía local se unen para 
        intentar capturar al escualo.",7
        );

        $pelicula_exorcista = new PeliculaTerror(5,"El exorcista","imagenes/terror/el_exorcista.jpg",1973,121,"Regan, una niña de doce años, sufre fenómenos paranormales como la levitación o la manifestación de una fuerza sobrehumana. Su madre, aterrorizada, tras 
        someter a su hija a múltiples análisis médicos que no ofrecen ningún resultado, acude a un sacerdote con estudios de psiquiatría. Éste, convencido de que el mal no es físico sino espiritual, cree que se trata 
        de una posesión diabólica, y decide practicar un exorcismo... Adaptación de la novela de William Peter Blatty que se inspiró en un exorcismo real ocurrido en Washington en 1949.",8
        );

        $pelicula_el_resplandor = new PeliculaTerror(6,"El resplandor","imagenes/terror/the_shining.jpg",1980,146,"Jack Torrance se traslada con su mujer y su hijo de siete años al impresionante hotel Overlook, en Colorado, para encargarse del mantenimiento de 
        las instalaciones durante la temporada invernal, época en la que permanece cerrado y aislado por la nieve. Su objetivo es encontrar paz y sosiego para escribir una novela. Sin embargo, poco después de su 
        llegada al hotel, al mismo tiempo que Jack empieza a padecer inquietantes trastornos de personalidad, se suceden extraños y espeluznantes fenómenos paranormales.", 10
        );

        $peliculas=array($pelicula_alien,$pelicula_amanecer,$pelicula_dejame_salir,$pelicula_tiburon, $pelicula_exorcista,$pelicula_el_resplandor);