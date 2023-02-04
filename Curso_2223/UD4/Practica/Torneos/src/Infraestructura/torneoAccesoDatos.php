<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    class TorneoAccesoDatos {        
        function __construct() {
        }

        function obtenerCuartos($idTorneo) {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            $fase = 'Cuartos';
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT id_jugador_a, (SELECT nombre FROM T_Jugador WHERE T_Jugador.id_jugador=id_jugador_a) as nombre_jugador_a, id_jugador_b, (SELECT nombre FROM T_Jugador WHERE T_Jugador.id_jugador=id_jugador_b) as nombre_jugador_b FROM T_Partido INNER JOIN T_Jugador ON T_Jugador.id_jugador = T_Partido.id_jugador_b WHERE id_torneo = (?) && fase = (?) ORDER BY id_partido;");
            $consulta->bind_param("is", $idTorneo, $fase);
            $consulta->execute();
            $result = $consulta->get_result();

            $torneo =  array();
            while ($myrow = $result->fetch_row()) {
                array_push($torneo, $myrow);
            }
            return $torneo;
        }
        function obtenerSemifinales($idTorneo) {

            $conexion = mysqli_connect('localhost','root','1234');

            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            $fase = 'Semifinales';
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT id_jugador_a, (SELECT nombre FROM T_Jugador WHERE T_Jugador.id_jugador=id_jugador_a) as nombre_jugador_a, id_jugador_b, (SELECT nombre FROM T_Jugador WHERE T_Jugador.id_jugador=id_jugador_b) as nombre_jugador_b FROM T_Partido INNER JOIN T_Jugador ON T_Jugador.id_jugador = T_Partido.id_jugador_b WHERE id_torneo = (?) && fase = (?) ORDER BY id_partido;");
            $consulta->bind_param("is", $idTorneo, $fase);
            $consulta->execute();
            $result = $consulta->get_result();

            $torneo =  array();
            while ($myrow = $result->fetch_row()) {
                array_push($torneo, $myrow);
            }
            return $torneo;
        }
        function obtenerFinal($idTorneo) {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            $fase = 'Final';
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT id_jugador_a, (SELECT nombre FROM T_Jugador WHERE T_Jugador.id_jugador=id_jugador_a) as nombre_jugador_a, id_jugador_b, (SELECT nombre FROM T_Jugador WHERE T_Jugador.id_jugador=id_jugador_b) as nombre_jugador_b FROM T_Partido INNER JOIN T_Jugador ON T_Jugador.id_jugador = T_Partido.id_jugador_b WHERE id_torneo = (?) && fase = (?) ORDER BY id_partido;");
            $consulta->bind_param("is", $idTorneo, $fase);
            $consulta->execute();
            $result = $consulta->get_result();

            $torneo =  array();
            while ($myrow = $result->fetch_row()) {
                array_push($torneo, $myrow);
            }
            return $torneo;
        }

        function nombreTorneo($idTorneo) {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            $fase = 'Final';
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT nombre FROM T_Torneo WHERE id_torneo = (?);");
            $consulta->bind_param("i", $idTorneo);
            $consulta->execute();
            $result = $consulta->get_result();

            $torneo =  array();
            while ($myrow = $result->fetch_row()) {
                array_push($torneo, $myrow);
            }
            return $torneo;
        }

        function obtenerGanador($idTorneo) {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT id_ganador, (SELECT nombre FROM T_Jugador WHERE T_Jugador.id_jugador=id_ganador) FROM T_Partido INNER JOIN T_Torneo on 
            T_Partido.id_torneo = T_Torneo.id_torneo INNER JOIN T_Jugador ON T_Partido.id_jugador_a = T_Jugador.id_jugador where T_Partido.id_torneo = (?) && fase = 'Final' && id_ganador != '';");
            $consulta->bind_param("i", $idTorneo);
            $consulta->execute();
            $result = $consulta->get_result();

            $torneo =  array();
            while ($myrow = $result->fetch_row()) {
                array_push($torneo, $myrow);
            }
            return $torneo;
        }
        function insertarCampeonTorneo($idTorneo, $nombreJugador) {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            $estadoTorneo = 'Finalizado';
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "UPDATE T_Torneo SET estado=(?), campeon = (?) where id_torneo = (?);");
            $consulta->bind_param("ssi", $estadoTorneo,$nombreJugador,$idTorneo);
            $consulta->execute();
            $result = $consulta->get_result();

            return $result;
        }
    }