<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    require("../Infraestructura/gestionTorneosAccesoDatos.php");
    
    class GestionTorneosReglasNegocio {
        function __construct() {
        }

        function insertar($nombre, $fecha, $estado, $ganador) {
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->insertar($nombre,$fecha, $estado, $ganador);           
            return $res;            
        }

        function borrar($id_torneo){            
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->borrar($id_torneo);           
            return $res;
        }

    }