drop database if exists cartelera;
create database cartelera;
use cartelera;

CREATE TABLE T_Categoria (
    id_categoria INT(5) PRIMARY KEY not null,
    nombre VARCHAR(100) NOT NULL,
    imagen varchar(100) default null
);

CREATE TABLE T_Director (
	id_director INT(5) PRIMARY KEY not null,
    nombre_director VARCHAR(100) NOT NULL
);

CREATE TABLE T_Reparto (
	id_reparto INT(5) PRIMARY KEY not null,
    nombre_reparto VARCHAR(100) NOT NULL
);

CREATE TABLE T_Pelicula (
    id_pelicula int(5) PRIMARY KEY not null,
    titulo VARCHAR(500) default NULL,
    imagen varchar(100) default null,
    ano int default null,
    duracion INT(6) NOT NULL,
    sinopsis varchar(1000) default null,    
    votos int default '0',
    id_categoria INT(5) default NULL,
    constraint pelicula_ibfk_1 foreign key (id_categoria) references T_Categoria (id_categoria)
);

CREATE TABLE T_Pelicula_Director(
	id_pelicula int(5) not null,
    id_director INT(5) not null,
    PRIMARY KEY (id_pelicula, id_director),
    FOREIGN KEY (id_pelicula) references T_Pelicula(id_pelicula),
    FOREIGN KEY (id_director) references T_Director(id_director)
);

CREATE TABLE T_Pelicula_Reparto(
	id_pelicula int(5) not null,
    id_reparto INT(5) not null,
    PRIMARY KEY (id_pelicula, id_reparto),
    FOREIGN KEY (id_pelicula) references T_Pelicula(id_pelicula),
    FOREIGN KEY (id_reparto) references T_Reparto(id_reparto)
);


-- Inserts de T_Categoria
insert into T_Categoria(id_categoria, nombre, imagen) values(1, 'Terror', 'simbolo_terror.png');
insert into T_Categoria(id_categoria, nombre, imagen) values(2, 'Anime', 'one_piece.png');


-- Inserts de T_Director
insert into T_Director(id_director, nombre_director) values(1, 'Ridley Scott');
insert into T_Director(id_director, nombre_director) values(2, 'Zack Snyder');
insert into T_Director(id_director, nombre_director) values(3, 'Jordan Peele');
insert into T_Director(id_director, nombre_director) values(4, 'Steven Spielberg');
insert into T_Director(id_director, nombre_director) values(5, 'William Friedkin');
insert into T_Director(id_director, nombre_director) values(6, 'Stanley Kubrick');
insert into T_Director(id_director, nombre_director) values(7, 'Mamoru Oshii');
insert into T_Director(id_director, nombre_director) values(8, 'Katsuhiro Ōtomo');
insert into T_Director(id_director, nombre_director) values(9, 'Makoto Shinkai');
insert into T_Director(id_director, nombre_director) values(10, 'Gorô Taniguchi');
insert into T_Director(id_director, nombre_director) values(11, 'Hayao Miyazaki');
insert into T_Director(id_director, nombre_director) values(12, 'Shin\'ichirô Ushijima');


-- Inserts de T_Reparto
insert into T_Reparto(id_reparto, nombre_reparto) values (1, 'Sigourney Weaver'), (2, 'John Hurt'), (3, 'Yaphet Kotto'), (4, 'Tom Skerritt');
insert into T_Reparto(id_reparto, nombre_reparto) values(5, 'Sarah Polley'), (6, 'Ving Rhames'), (7, 'Jake Weber'), (8, 'Mekhi Phifer');
insert into T_Reparto(id_reparto, nombre_reparto) values(9, 'Daniel Kaluuya'), (10, 'Allison Williams'), (11, 'Catherine Keener'), (12, 'Bradley Whitford');
insert into T_Reparto(id_reparto, nombre_reparto) values(13, 'Roy Scheider'), (14, 'Robert Shaw'), (15, 'Richard Dreyfuss'), (16, 'Lorraine Gary');
insert into T_Reparto(id_reparto, nombre_reparto) values(17, 'Linda Blair'), (18, 'Max von Sydow'), (19, 'Ellen Burstyn'), (20, 'Jason Miller');
insert into T_Reparto(id_reparto, nombre_reparto) values(21, 'Jack Nicholson'), (22, 'Shelley Duvall'), (23, 'Danny Lloyd'), (24, 'Scatman Crothers');
insert into T_Reparto(id_reparto, nombre_reparto) values(25, 'Atsuko Tanake'), (26, 'Akio Ôtsuka'), (27, 'Kôichi Yamadera'), (28, 'Yutaka Nakano');
insert into T_Reparto(id_reparto, nombre_reparto) values(29, 'Mitsuo Iwata'), (30, 'Nozomu Sasaki'), (31, 'Mami Koyama'), (32, 'Tarô Ishida');
insert into T_Reparto(id_reparto, nombre_reparto) values(33, 'Ryunosuke Kamiki'), (34, 'Mone Kamishiraishi'), (35, 'Etsuko Ichibara'), (36, 'Masami Nagasawa');
insert into T_Reparto(id_reparto, nombre_reparto) values(37, 'Mayumi Tanaka'), (38, 'Kazuya Nakai'), (39, 'Shûichi Ikeda'), (40, 'Hiroaki Hirata');
insert into T_Reparto(id_reparto, nombre_reparto) values(41, 'Yôji Matsuda'), (42, 'Yuriko Ishida'), (43, 'Kaoru Kobayashi'), (44, 'Yûko Tanake');
insert into T_Reparto(id_reparto, nombre_reparto) values(45, 'Mahiro Takasugi'), (46, 'Yukiko Fujii'), (47, 'Yûma Uchida'), (48, 'Jun Fukusi');


-- Inserts de T_Pelicula
insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria) 
values(1,"Alien, el octavo pasajero","alien.jpg",1979, 116,"De regreso a la Tierra, la nave de carga Nostromo interrumpe su viaje y despierta a sus siete tripulantes. El ordenador central, MADRE, ha 
        detectado la misteriosa transmisión de una forma de vida desconocida, procedente de un planeta cercano aparentemente deshabitado. La nave se dirige entonces al extraño planeta para investigar el 
        origen de la comunicación.",0,1);
insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria)
values(2,"Amanecer de los muertos","amanecer.jpg",2004, 100 ,"Remake del filme de terror de George A. Romero. Una inexplicable plaga ha diezmado la población del planeta, convirtiendo a los muertos en horribles zombies que continuamente buscan carne y sangre 
        humana para sobrevivir. En Wisconsin, un variopinto grupo de personas que han escapado a la plaga, tratan de salvar la vida refugiándose en un centro comercial, donde deben aprender no sólo a protegerse 
        de las hordas de zombies, sino también a convivir.",0,1);
insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria)
values(3,"Dejame salir","dejame_salir.jpg",2017,103,"Un joven afroamericano visita a la familia de su novia blanca, un matrimonio adinerado. Para Chris 
        (Daniel Kaluuya) y su novia Rose (Allison Williams) ha llegado el momento de conocer a los futuros suegros, por lo que ella le invita a pasar un fin de semana en el campo con sus padres, Missy 
        (Catherine Keener) y Dean (Bradley Whitford). Al principio, Chris piensa que el comportamiento 'demasiado' complaciente de los padres se debe a su nerviosismo por la relación interracial de su hija, 
        pero a medida que pasan las horas, una serie de descubrimientos cada vez más inquietantes le llevan a descubrir una verdad inimaginable.",0,1);

insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria)
values(4,"Tiburón","tiburon.jpg",1975,124,"En la costa de un pequeño pueblo del Este de los Estados Unidos, un enorme tiburón ataca a varias personas. Por temor a los nefastos efectos que este hecho podría tener sobre el negocio turístico, el alcalde se niega a cerrar las playas y a difundir la 
        noticia. Pero un nuevo ataque del tiburón termina con la vida de un bañista. Cuando el terror se apodera de todos, un veterano cazador de tiburones, un oceanógrafo y el jefe de la policía local se unen para 
        intentar capturar al escualo.",0,1);

insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria)
values(5,"El exorcista","el_exorcista.jpg",1973,121,"Regan, una niña de doce años, sufre fenómenos paranormales como la levitación o la manifestación de una fuerza sobrehumana. Su madre, aterrorizada, tras 
        someter a su hija a múltiples análisis médicos que no ofrecen ningún resultado, acude a un sacerdote con estudios de psiquiatría. Éste, convencido de que el mal no es físico sino espiritual, cree que se trata 
        de una posesión diabólica, y decide practicar un exorcismo... Adaptación de la novela de William Peter Blatty que se inspiró en un exorcismo real ocurrido en Washington en 1949.",0,1);

insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria)
values(6,"El resplandor","the_shining.jpg",1980,146,"Jack Torrance se traslada con su mujer y su hijo de siete años al impresionante hotel Overlook, en Colorado, para encargarse del mantenimiento de 
        las instalaciones durante la temporada invernal, época en la que permanece cerrado y aislado por la nieve. Su objetivo es encontrar paz y sosiego para escribir una novela. Sin embargo, poco después de su 
        llegada al hotel, al mismo tiempo que Jack empieza a padecer inquietantes trastornos de personalidad, se suceden extraños y espeluznantes fenómenos paranormales.", 0,1);
        
insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria)
values(7, "Ghost in the Shell", "ghost.jpg", 1995, 83, "Año 2029. En una enorme ciudad asiática, una mujer robot policía -cyborg- investiga las siniestras actividades de un misteriososo hacker, 
		un supercriminal que está invadiendo las autopistas de la información.", 0, 2);

insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria)
values(8, "Akira", "akira.jpg", 1988, 124, "Año 2019. Neo-Tokyo es una ciudad construida sobre las ruinas de la antigua capital japonesa destruida tras la Tercera Guerra Mundial. Japón es un país 
al borde del colapso que sufre continuas crisis políticas. En secreto, un equipo de científicos ha reanudado por orden del ejército un experimento para encontrar a individuos que puedan controlar el arma definitiva: 
una fuerza denominada 'la energía absoluta'. Pero los habitantes de Neo-Tokyo tienen otras cosas de las que preocuparse. Uno de ellos es Kaneda, un joven pandillero líder de una banda de motoristas. Durante una pelea,
 su mejor amigo, Tetsuo, sufre un extraño accidente y termina ingresado en unas instalaciones militares. Allí los científicos descubrirán que es el poseedor de la energía absoluta. Pero Tetsuo, que no se resigna a 
 convertirse en un conejillo de indias, muy pronto se convertirá en la amenaza más grande que el mundo ha conocido.", 0, 2);

insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria)
values(9, "Your name", "your_name.jpg", 2016, 106, "Taki y Mitsuha descubren un día que durante el sueño sus cuerpos se intercambian, y comienzan a comunicarse por medio de notas. A medida que consiguen
 superar torpemente un reto tras otro, se va creando entre los dos un vínculo que poco a poco se convierte en algo más romántico.", 0, 2);


insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria)
values(10, "One Piece Film Red", "one_piece.jpg", 2022, 115, "Uta, la cantante número uno del mundo, se dispone a dar su primer concierto en directo frente a un público formado por piratas, marines y
 toda clase de fans. Uta está considerada la cantante más querida de todo el mundo. A pesar de que siempre ha ocultado su identidad, se dice que su voz al cantar es tan maravillosa que parece proceder de “otra dimensión”. 
 Ahora, se celebrará un concierto en directo en el que aparecerá en persona por primera vez frente al público. La tan esperada voz que todo el mundo quiere oír se dispone a resonar mientras multitud de coloridos piratas,
 marines que no le quitan el ojo de encima, los Piratas de Sombreros de Paja de Luffy, quien se siente atraído por la voz de Uta sin saber nada, y toda clase de fans de Uta llenan el lugar. La historia arranca con la impactante
 revelación de que Uta es la hija de Shanks.", 0, 2);

insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria)
values(11, "La princesa Mononoke", "mononoke.jpg", 1997, 133, "Con el fin de curar la herida que le ha causado un jabalí enloquecido, el joven Ashitaka sale en busca del dios Ciervo, pues sólo él puede liberarlo 
del sortilegio. A lo largo de su periplo descubre cómo los animales del bosque luchan contra hombres que están dispuestos a destruir la Naturaleza.", 0,2);

insert into T_Pelicula(id_pelicula, titulo, imagen,ano, duracion,sinopsis, votos, id_categoria)
values(12, "Quiero comerme tu páncreas", "pancreas.jpg", 2018, 108, "Un día, un solitario estudiante de secundaria encuentra un libro de bolsillo en el hospital. Su título es 'Conviviendo con la Muerte'. Resulta ser 
un diario de una compañera de clase, Sakura Yamauchi, en el cual escribe que, debido a su enfermedad pancreática, le quedan sólo unos cuantos meses de vida. Esto hace que surja una amistad entre ellos muy especial, desvelando la 
difícil circunstancia por la que atraviesa Sakura no sólo en relación a su enfermedad, sino también a otros factores que convierten su día a día en una cruel pesadilla.", 0, 2);


-- Inserts de T_Pelicula_Director
insert into T_Pelicula_Director(id_pelicula, id_director) values(1,1), (2,2), (3,3), (4,4), (5,5), (6,6), (7,7), (8,8), (9,9), (10,10), (11,11), (12,12);


-- Inserts de T_Pelicula_Reparto
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(1,1), (1,2),(1,3),(1,4);
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(2,5), (2,6),(2,7),(2,8);
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(3,9), (3,10),(3,11),(3,12);
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(4,13), (4,14),(4, 15),(4, 16);
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(5, 17), (5, 18),(5, 19),(5, 20);
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(6, 21), (6, 22),(6, 23),(6, 24);
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(7, 25), (7, 26),(7, 27),(7, 28);
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(8, 29), (8, 30),(8, 31),(8, 32);
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(9, 33), (9, 34),(9, 35),(9, 36);
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(10, 37), (10, 38),(10, 39),(10, 40);
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(11, 41), (11, 42),(11, 43),(11, 44);
insert into T_Pelicula_Reparto(id_pelicula, id_reparto) values(12, 45), (12, 46),(12, 47),(12, 48);


