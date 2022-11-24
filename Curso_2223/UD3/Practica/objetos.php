<?php
    class PeliculaTerror{
        private $id;
        private $titulo;
        private $imagen;
        private $anyo;
        private $duracion;
        private $direccion;
        private $guion;
        private $musica;
        private $fotografia;
        private $reparto;
        private $companyias;
        private $genero;
        private $sinopsis;
        private $votos;

        public function __construct($id,$titulo,$imagen,$anyo,$duracion,$direccion, $guion,$musica,$fotografia,$reparto,$companyias, $genero,$sinopsis,$votos){

            $this->id=$id;
            $this->titulo=$titulo;
            $this->imagen=$imagen;
            $this->anyo=$anyo;
            $this->duracion=$duracion;
            $this->direccion=$direccion;
            $this->guion=$guion;
            $this->musica=$musica;
            $this->fotografia=$fotografia;
            $this->reparto=$reparto;
            $this->companyias=$companyias;
            $this->genero=$genero;
            $this->sinopsis=$sinopsis;
            $this->votos=$votos;
        }                        
        
        public function getId(){
            return $this->id;
        }
        public function setId(){
            $this->id = $id;
        }

        public function getTitulo(){
            return $this->titulo;
        }
        public function setTitulo(){
            $this->titulo = $titulo;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function setImagen(){
            $this->imagen = $imagen;
        }

        public function getAnyo(){
            return $this->anyo;
        }
        
        public function setAnyo(){
            $this->anyo = $anyo;
        }

        public function getDuracion(){
            return $this->duracion;
        }

        public function setDuracion(){
            $this->duracion = $duracion;
        }

        public function getDireccion(){
            return $this->direccion;
        }

        public function setDireccion(){
            $this->direccion = $direccion;
        }

        public function getGuion(){
            return $this->guion;
        }

        public function setGuion(){
            $this->guion = $guion;
        }

        public function getMusica(){
            return $this->musica;
        }

        public function setMusica(){
            $this->musica = $musica;
        }

        public function getFotografia(){
            return $this->fotografia;
        }

        public function setFotografia(){
            $this->fotografia = $fotgrafia;
        }

        public function getReparto(){
            return $this->reparto;
        }

        public function setReparto(){
            $this->reparto = $reparto;
        }

        public function getCompanyias(){
            return $this->companyias;
        }
        public function setCompanyias(){
            $this->companyias = $companyias;
        }

        public function getGenero(){
            return $this->genero;
        }

        public function setGenero(){
            $this->genro = $genero;
        }

        public function getSinopsis(){
            return $this->sinopsis;
        }

        public function setSinopsis(){
            $this->sinopsis = $sinopsis;
        }

        public function getVotos(){
            return $this->votos;
        }

        public function setVotos(){
            $this->votos = $votos;
        }
    }

        $pelicula_alien = new PeliculaTerror(1,"Alien, el octavo pasajero","imagenes/terror/alien.jpg",1979, 116,"Ridley Scott","Dan O'Bannon. Historia: Ronald Shusett. Personaje: H.R. Giger","Jerry Goldsmith",
        "Derek Vanlint"," Sigourney Weaver, John Hurt, Yaphet Kotto, Tom Skerritt, Veronica Cartwright, Harry Dean Stanton, Ian Holm","20th Century Fox, Brandywine Productions","Ciencia ficción. Terror | 
        Extraterrestres. Aventura espacial. Película de culto","De regreso a la Tierra, la nave de carga Nostromo interrumpe su viaje y despierta a sus siete tripulantes. El ordenador central, MADRE, ha 
        detectado la misteriosa transmisión de una forma de vida desconocida, procedente de un planeta cercano aparentemente deshabitado. La nave se dirige entonces al extraño planeta para investigar el 
        origen de la comunicación.",8
        );

        $pelicula_amanecer = new PeliculaTerror(2,"El amanecer de los muertos","imagenes/terror/amanecer.jpg",2004, 100 ,"Zack Snyder","James Gunn. Remake: George A. Romero","Tyler Bates",
        "Matthew F. Leonetti","Sarah Polley, Ving Rhames, Jake Weber, Mekhi Phifer, Ty Burrell, Michael Kelly, Kevin Zegers, Michael Barry, Lindy Booth, Tom Savini, Bruce Bohne, Jayne Eastwood, Boyd Banks, 
        Inna Korobkina, R.D. Reid, Kim Poirier, Matt Frewer, Justin Louis, Hannah Lochner, Ermes Blarasin, Sanjay Talwar, Kim Roberts, Tim Post, Matt Sadowski, Philip DeWilde, Colm Magner, Luigia Zucaro, 
        Geoff Williams, Mike Realba, Phillip MacKenzie, Laura DeCarteret, Georgia Craig, Tino Monte, Chris Gillett, Derek Keurvorst, Dan Duran, Neville Edwards, Sandy Jobin-Bevans, Natalie Brown, Liz West, 
        Scott H. Reiniger, Ken Foree","Strike Entertainment, New Amsterdam Entertainment, Metropolitan Filmexport, Toho-Towa. Distribuidora: Universal Pictures","Terror. Ciencia ficción | Gore. Zombis. Remake",
        "Remake del filme de terror de George A. Romero. Una inexplicable plaga ha diezmado la población del planeta, convirtiendo a los muertos en horribles zombies que continuamente buscan carne y sangre 
        humana para sobrevivir. En Wisconsin, un variopinto grupo de personas que han escapado a la plaga, tratan de salvar la vida refugiándose en un centro comercial, donde deben aprender no sólo a protegerse 
        de las hordas de zombies, sino también a convivir.",6
        );

        $pelicula_dejame_salir = new PeliculaTerror (3,"Dejame salir","imagenes/terror/dejame_salir.jpg",2017,103,"Jordan Peele","Jordan Peele","Michael Abels","Toby Oliver","Daniel Kaluuya, Allison Williams, Catherine Keener, 
        Bradley Whitford, Betty Gabriel, Caleb Landry Jones, Lyle Brocato, Ashley LeConte Campbell, Marcus Henderson, Lil Rel Howery, Jeronimo Spinx, Rutherford Cravens, Lakeith Stanfield","Blumhouse Productions, 
        QC Entertainment","Intriga. Terror. Thriller | Thriller psicológico. Comedia negra. Racismo. Familia","Un joven afroamericano visita a la familia de su novia blanca, un matrimonio adinerado. Para Chris 
        (Daniel Kaluuya) y su novia Rose (Allison Williams) ha llegado el momento de conocer a los futuros suegros, por lo que ella le invita a pasar un fin de semana en el campo con sus padres, Missy 
        (Catherine Keener) y Dean (Bradley Whitford). Al principio, Chris piensa que el comportamiento 'demasiado' complaciente de los padres se debe a su nerviosismo por la relación interracial de su hija, 
        pero a medida que pasan las horas, una serie de descubrimientos cada vez más inquietantes le llevan a descubrir una verdad inimaginable.",7
        );                               

        $pelicula_tiburon = new PeliculaTerror(4,"Tiburón","imagenes/terror/tiburon.jpg",1975,124,"Steven Spielberg","Peter Benchley, Carl Gottlieb. Novela: Peter Benchley","John Williams","Bill Butler","Roy Scheider, 
        Robert Shaw, Richard Dreyfuss, Lorraine Gary, Murray Hamilton, Carl Gottlieb, Jeffrey C. Kramer, Susan Backlinie, Jonathan Filley, Chris Rebello, Jay Mello, Craig Kingsbury, Jeffrey Voorhees, Lee Fierro, 
        Ted Grossman, Robert Chambers, Peter Benchley","Zanuck/Brown. Distribuidora: Universal Pictures","Terror. Drama | Animales. Tiburones. Película de culto","En la costa de un pequeño pueblo del Este de los 
        Estados Unidos, un enorme tiburón ataca a varias personas. Por temor a los nefastos efectos que este hecho podría tener sobre el negocio turístico, el alcalde se niega a cerrar las playas y a difundir la 
        noticia. Pero un nuevo ataque del tiburón termina con la vida de un bañista. Cuando el terror se apodera de todos, un veterano cazador de tiburones, un oceanógrafo y el jefe de la policía local se unen para 
        intentar capturar al escualo.",7
        );

        $pelicula_exorcista = new PeliculaTerror(5,"El exorcista","imagenes/terror/el_exorcista.jpg",1973,121,"William Friedkin","William Peter Blatty. Novela: William Peter Blatty","Jack Nitzsche","Owen Roizman","Linda 
        Blair, Max von Sydow, Ellen Burstyn, Jason Miller, Lee J. Cobb, Kitty Winn, Jack MacGowran, Arthur Storch, Barton Heyman, Gina Petrushka, John Mahon, William O'Malley, Peter Masterson, Rudolf Schündler, Robert 
        Symonds, Thomas Bermingham, Vasiliki Maliaros, Titos Vandis, Wallace Rooney, Ron Faber, Donna Mitchell, Roy Cooper, Robert Gerringer, Mercedes McCambridge","Warner Bros., Hoya Productions","Terror | Posesiones 
        / Exorcismos. Religión. Sobrenatural. Película de culto","Regan, una niña de doce años, sufre fenómenos paranormales como la levitación o la manifestación de una fuerza sobrehumana. Su madre, aterrorizada, tras 
        someter a su hija a múltiples análisis médicos que no ofrecen ningún resultado, acude a un sacerdote con estudios de psiquiatría. Éste, convencido de que el mal no es físico sino espiritual, cree que se trata 
        de una posesión diabólica, y decide practicar un exorcismo... Adaptación de la novela de William Peter Blatty que se inspiró en un exorcismo real ocurrido en Washington en 1949.",8
        );

        $pelicula_el_resplandor = new PeliculaTerror(6,"El resplandor","imagenes/terror/the_shining.jpg",1980,146,"Stanley Kubrick","Stanley Kubrick, Diane Johnson. Novela: Stephen King","Rachel Elkind, Wendy Carlos","John Alcott",
        "Jack Nicholson, Shelley Duvall, Danny Lloyd, Scatman Crothers, Barry Nelson, Philip Stone, Joe Turkel, Lia Beldam, Billie Gibson, Barry Dennen, David Baxt, Manning Redwood, Lisa Burns, Alison Coleridge, Norman Gay, 
        Tony Burton, Anne Jackson, Jana Shelden, Burnell Tucker","Coproducción Reino Unido-Estados Unidos; Hawk Films, Peregrine, Warner Bros., Producers Circle. Distribuidora: Warner Bros.","Terror | Sobrenatural. Casas 
        encantadas. Fantasmas. Drama psicológico. Película de culto","Jack Torrance se traslada con su mujer y su hijo de siete años al impresionante hotel Overlook, en Colorado, para encargarse del mantenimiento de 
        las instalaciones durante la temporada invernal, época en la que permanece cerrado y aislado por la nieve. Su objetivo es encontrar paz y sosiego para escribir una novela. Sin embargo, poco después de su 
        llegada al hotel, al mismo tiempo que Jack empieza a padecer inquietantes trastornos de personalidad, se suceden extraños y espeluznantes fenómenos paranormales.", 10
        );

        $peliculas=array($pelicula_alien,$pelicula_amanecer,$pelicula_dejame_salir,$pelicula_tiburon, $pelicula_exorcista,$pelicula_el_resplandor);