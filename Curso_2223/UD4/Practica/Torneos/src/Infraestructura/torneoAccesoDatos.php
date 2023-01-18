<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);

    class TorneoAccesoDatos {        
        function __construct() {
        }

        function obtener() {

            $conexion = mysqli_connect('localhost','root','1234');

            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            mysqli_select_db($conexion, 'torneos_tenis_mesa');
            $consulta = mysqli_prepare($conexion, "SELECT T_Jugador.nombre FROM T_Jugador inner join T_Partidos on T_Partidos.ganador = T_Jugador.id_jugador;");
            $consulta->execute();
            $result = $consulta->get_result();

            $torneos =  array();

            while ($myrow = $result->fetch_assoc()) {

                array_push($torneos, $myrow);
            }

            return $torneos;
        }
    }
    $foo = new TorneoAccesoDatos();

    var_dump($foo->obtener());