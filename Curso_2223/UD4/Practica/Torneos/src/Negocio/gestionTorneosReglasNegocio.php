<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    require("../Infraestructura/gestionTorneosAccesoDatos.php");
    
    class GestionTorneosReglasNegocio {
        
        function __construct() {
        }

        function insertarTorneo($nombre, $fecha, $estado) {
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->insertarTorneo($nombre,$fecha, $estado);           
            return $res;            
        }

        function insertarPartidosCuartos($idTorneo){
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->jugadores();
            shuffle($res);

            $res1 = [$idTorneo, 'Cuartos', $res[0], $res[1]];
            $res2 = [$idTorneo, 'Cuartos', $res[2], $res[3]];
            $res3 = [$idTorneo, 'Cuartos', $res[4], $res[5]];
            $res4 = [$idTorneo, 'Cuartos', $res[6], $res[7]];            
            $result = [$res1, $res2, $res3, $res4];

            $insertarPartidosCuartos = $gestionDAL->insertarPartidosCuartos($result);

            return $insertarPartidosCuartos;
        }

        function seleccionarPartidos($idTorneo){
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->seleccionarPartidos($idTorneo);
            return $res;          
        }

        function obtenerUltimoIdTorneo(){
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->obtenerUltimoIdTorneo();
            return $res;          
        }

        function obtenerNombreTorneo($idTorneo){
            $gestionDAL = new GestionTorneosAccesoDatos();
            $u = $gestionDAL->obtenerNombreTorneo($idTorneo);
            return $u;
        }

        function borrarPartida($idPartido){
            $gestionDAL = new GestionTorneosAccesoDatos();
            $u = $gestionDAL->borrarPartida($idPartido);
            return $u;
        }
    }