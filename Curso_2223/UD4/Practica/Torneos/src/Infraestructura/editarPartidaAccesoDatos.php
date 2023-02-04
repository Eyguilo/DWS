<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    class EditarPartidaAccesoDatos {        
        function __construct() {
        }

        function insertarPartida($idPartida, $idTorneo, $fase, $idJugadorA, $idJugadorB, $idGanador) {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "UPDATE T_Partido SET id_torneo = (?), fase = (?), id_jugador_a = (?), id_jugador_b = (?), id_ganador = (?) WHERE id_partido = (?);");
            $consulta->bind_param("isiiii", $idTorneo, $fase, $idJugadorA, $idJugadorB, $idGanador, $idPartida);
            $consulta->execute();
            $result = $consulta->get_result();
            return $result;
        }
    }