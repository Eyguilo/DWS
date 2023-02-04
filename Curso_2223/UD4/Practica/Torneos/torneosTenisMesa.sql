drop database if exists torneos_tenis_mesa;
create database torneos_tenis_mesa;
use torneos_tenis_mesa;

CREATE TABLE T_Usuario (
	id_usuario INT(5) PRIMARY KEY auto_increment,
    usuario VARCHAR(255) NOT NULL,
    clave varchar(255) not null,
    perfil varchar(255) not null
);

CREATE TABLE T_Torneo (
    id_torneo INT(5) PRIMARY KEY auto_increment,
    nombre VARCHAR(100) NOT NULL,
    num_jugadores int(5) not null,
	fecha date not null,
    estado varchar(255) not null,
    campeon varchar(100)
);

CREATE TABLE T_Jugador (
	id_jugador INT(5) PRIMARY KEY auto_increment,
    nombre VARCHAR(100) NOT NULL,
    total_partidos int(5) not null,
    partidos_ganados int(5) not null,
    total_torneos int(5) not null,
    torneos_ganados int(5) not null
);

CREATE TABLE T_Partido (
    id_partido int(5) PRIMARY KEY  auto_increment,
    id_torneo int(5) not NULL,
    fase varchar(255) not null,
    id_jugador_a int(5) not null,
    id_jugador_b int(5) NOT NULL,
    id_ganador int(5),
    
    foreign key (id_torneo) references T_Torneo(id_torneo) on delete cascade,
    foreign key (id_jugador_a) references T_Jugador(id_jugador),
    foreign key (id_jugador_b) references T_Jugador(id_jugador)
);

insert into T_Jugador (nombre, total_partidos, partidos_ganados, total_torneos, torneos_ganados)values('Charles Negro', 0, 0, 0, 0);
insert into T_Jugador (nombre, total_partidos, partidos_ganados, total_torneos, torneos_ganados)values('Ylijendri Canas', 0, 0, 0, 0);
insert into T_Jugador (nombre, total_partidos, partidos_ganados, total_torneos, torneos_ganados)values('Lerdian Ganu', 0, 0, 0, 0);
insert into T_Jugador (nombre, total_partidos, partidos_ganados, total_torneos, torneos_ganados)values('Lucio Okolo', 0, 0, 0, 0);
insert into T_Jugador (nombre, total_partidos, partidos_ganados, total_torneos, torneos_ganados)values('Jorge Agüila', 0, 0, 0, 0);
insert into T_Jugador (nombre, total_partidos, partidos_ganados, total_torneos, torneos_ganados)values('Ghizermo Quesiii', 0, 0, 0, 0);
insert into T_Jugador (nombre, total_partidos, partidos_ganados, total_torneos, torneos_ganados)values('Marai Motos', 0, 0, 0, 0);
insert into T_Jugador (nombre, total_partidos, partidos_ganados, total_torneos, torneos_ganados)values('Fernidio Mecagoendia', 0, 0, 0, 0);