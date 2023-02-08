<?php
    class DireccionIPAccesoDatos{

        function __construct(){
        }

        function obtenerDirecciones(){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            mysqli_select_db($conexion, 'direcciones_ip');
            //$sanitized_consulta = mysqli_real_escape_string($conexion, *variable*)
            $consulta = mysqli_prepare($conexion, "SELECT id_direccion, direccion FROM direcciones_ip;");
            $consulta->execute();
            $result = $consulta->get_result();
            $arrayIp = array();

            while($myrow = $result->ferch_row()){
                array_push($arrayIp, $myrow);
            }
            return $arrayIp;
        }

        function obtenerDireccionesBloqueadas(){
            $conexion = mysqli_connect('localhost','root','1234');
            if (mysqli_connect_errno()) {
                echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }

            mysqli_select_db($conexion, 'direcciones_ip');
            //$sanitized_consulta = mysqli_real_escape_string($conexion, *variable*)
            $consulta = mysqli_prepare($conexion, "SELECT id_direccion_bloqueada, direccion_bloqueada FROM direcciones_ip_bloqueadas;");
            $consulta->execute();
            $result = $consulta->get_result();
            $arrayIpBlocked = array();

            while($myrow = $result->ferch_row()){
                array_push($arrayIpBlocked, $myrow);
            }
            return $arrayIpBlocked;
        }
    }