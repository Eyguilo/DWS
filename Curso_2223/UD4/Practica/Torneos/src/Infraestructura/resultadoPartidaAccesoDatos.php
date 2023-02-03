<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    class ResultadoPartidaAccesoDatos {        
        function __construct() {
        }

        function insertarPartida($idTorneo, $idJugadorA, $idJugadorB, $fase) {
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "INSERT INTO T_Partido (id_torneo, fase, id_jugador_a, id_jugador_b) VALUES (?,?,?,?);");
            $consulta->bind_param("isii", $idTorneo,$fase, $idJugadorA, $idJugadorB);
            $consulta->execute();
            $result = $consulta->get_result();
            return $result;
        }
    }