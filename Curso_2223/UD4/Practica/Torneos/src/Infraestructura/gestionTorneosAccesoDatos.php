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
    }