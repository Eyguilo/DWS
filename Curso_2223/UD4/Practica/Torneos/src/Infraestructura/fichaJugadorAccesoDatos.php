<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    class FichaJugadorAccesoDatos {        
        function __construct() {
        }

        function totalPartidos($idJugador) {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT nombre, count(id_jugador) FROM T_Partido inner JOIN T_Jugador ON T_Partido.id_jugador_a = T_Jugador.id_jugador where id_jugador_a = (?) || id_jugador_b = (?);");
            $consulta->bind_param("ii", $idJugador, $idJugador);
            $consulta->execute();
            $result = $consulta->get_result();

            $torneo =  array();
            while ($myrow = $result->fetch_row()) {
                array_push($torneo, $myrow);
            }
            return $torneo;
        }

        function totalPartidosGanados($idJugador) {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT count(id_jugador) FROM T_Partido inner JOIN T_Jugador ON T_Partido.id_jugador_a = T_Jugador.id_jugador where id_ganador = (?);");
            $consulta->bind_param("i", $idJugador);
            $consulta->execute();
            $result = $consulta->get_result();

            $torneo =  array();
            while ($myrow = $result->fetch_row()) {
                array_push($torneo, $myrow);
            }
            return $torneo;
        }

        function totalTorneos() {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT max(id_torneo) from T_Torneo;");
            $consulta->execute();
            $result = $consulta->get_result();

            $torneo =  array();
            while ($myrow = $result->fetch_row()) {
                array_push($torneo, $myrow);
            }
            return $torneo;
        }
    }