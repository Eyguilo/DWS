<?php

    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    class GestionTorneosAccesoDatos {	

        function __construct() {
        }

        function insertar($nombre, $fecha, $estado, $ganador) {
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

        function borrar($idTorneo) {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "DELETE FROM T_Torneo WHERE id_torneo = (?);");  
            $consulta->bind_param("i", $idTorneo);
            $res = $consulta->execute();
            
            return $res;
        }

        function crearPartido(){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT id_jugador, nombre FROM T_Jugador;");  
            $consulta->execute();
            $result = $consulta->get_result();
            $jugadores =  array();

            while ($myrow = $result->fetch_assoc()) {
                array_push($jugadores, $myrow);
            }
            return $jugadores;            
        }

        function insertarPartidoCuartos($idTorneo, $fase, $idJugadorA, $idJugadorB){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "INSERT INTO T_Partido (id_torneo, fase, id_jugador_a, id_jugador_b) VALUES (?,?,?,?)");  
            $consulta->bind_param("isii", $idTorneo, $fase, $idJugadorA, $idJugadorB);
            $res = $consulta->execute();

            return $res;   
        }
    }