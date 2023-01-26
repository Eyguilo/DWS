<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    class GestionTorneosAccesoDatos {        
        function __construct() {
        }

        function obtener() {

            $conexion = mysqli_connect('localhost','root','1234');

            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "insert into T_Torneo (nombre, num_jugadores, fecha, estado, campeon) values ('Copa Topota Madre de Tenis de Mesa', 8, '2023/05/30', 'En curso', '');");
            $consulta->execute();
            $result = $consulta->get_result();

            $torneos =  array();

            while ($myrow = $result->fetch_assoc()) {

                array_push($torneos, $myrow);
            }

            return $torneos;
        }
    }