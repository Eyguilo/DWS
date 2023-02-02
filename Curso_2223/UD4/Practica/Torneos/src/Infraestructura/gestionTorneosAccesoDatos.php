<?php

    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    class GestionTorneosAccesoDatos {	

        function __construct() {
        }

        function insertarTorneo($nombre, $fecha, $estado, $ganador) {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            $numJugadores = 8;            
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "INSERT INTO T_Torneo(nombre,num_jugadores,fecha,estado,campeon) VALUES (?,?,?,?,?);");  
            $consulta->bind_param("sisss", $nombre, $numJugadores, $fecha, $estado, $ganador);
            $res = $consulta->execute();            
            return $res;
        }

        function obtenerUltimoIdTorneo(){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT MAX(id_torneo) FROM T_Torneo;");  
            $consulta->execute();
            $idTorneo = $consulta->get_result();
            var_dump($idTorneo);
            return $idTorneo;
        }

        function insertarPartidosCuartos($partidos){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            $gestionDAL = new GestionTorneosAccesoDatos();
            $idTorneo = $gestionDAL->obtenerUltimoIdTorneo();
            
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            for ($i=0; $i < 4; $i++) { 
                $consulta = mysqli_prepare($conexion, "INSERT INTO T_Partido(id_torneo,fase, id_jugador_a, id_jugador_b) VALUES (?,?,?,?);");  
                $consulta->bind_param("isii", $idTorneo, $partidos[$i][0], $partidos[$i][1], $partidos[$i][2]);
                $res = $consulta->execute();
            }
            return $res;
        }
        
        function jugadores() {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT idJugador FROM T_Jugador;");  
            $consulta->execute();
            $res = $consulta->get_result();            
            return $res;
        }
    }