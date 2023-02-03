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

        function insertarPartidosCuartos($partidos){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            for ($i=0; $i < 4; $i++) { 
                $consulta = mysqli_prepare($conexion, "INSERT INTO T_Partido(id_torneo,fase, id_jugador_a, id_jugador_b) VALUES (?,?,?,?);");  
                $consulta->bind_param("isii", $partidos[$i][0], $partidos[$i][1], $partidos[$i][2][0], $partidos[$i][3][0]);
                $res = $consulta->execute();
                var_dump($partidos[$i][2]);
            }
            return $res;
        }
        
        function jugadores() {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT id_jugador FROM T_Jugador;");  
            $consulta->execute();
            $res = $consulta->get_result();
            
            $jugadores =  array();
            while ($myrow = $res->fetch_row()) {
                array_push($jugadores, $myrow);
            }
            return $jugadores;
        }

        function seleccionarPartidos($idTorneo){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT fase, id_jugador_a, id_jugador_b, ganador FROM T_Partido WHERE id_torneo = (?);");  
            $consulta->bind_param("i", $idTorneo);
            $consulta->execute();
            $res = $consulta->get_result();

            $partido =  array();
            while ($myrow = $res->fetch_row()) {
                array_push($partido, $myrow);
            }
            return $partido;
        }

        function seleccionarJugadorPorId($idJugador){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT nombre FROM T_Jugador WHERE id_jugador = (?);");  
            $consulta->bind_param("i", $idJugador);
            $consulta->execute();
            $res = $consulta->get_result();
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

            $idUltimo =  array();
            while ($myrow = $idTorneo->fetch_row()) {
                array_push($idUltimo, $myrow);
            }
            return $idUltimo;
        }
    }