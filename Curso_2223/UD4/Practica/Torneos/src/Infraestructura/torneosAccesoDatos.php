<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    class TorneosAccesoDatos {        
        function __construct() {
        }

        function obtener() {

            $conexion = mysqli_connect('localhost','root','1234');

            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT T_Torneo.id_torneo, T_Torneo.nombre, T_Torneo.num_jugadores, T_Torneo.fecha, T_Torneo.estado, T_Torneo.campeon FROM T_Torneo;");
            $consulta->execute();
            $result = $consulta->get_result();

            $torneos =  array();

            while ($myrow = $result->fetch_assoc()) {

                array_push($torneos, $myrow);
            }

            return $torneos;
        }
    }