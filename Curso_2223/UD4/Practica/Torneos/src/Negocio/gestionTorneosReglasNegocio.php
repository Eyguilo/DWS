<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    require("../Infraestructura/gestionTorneosAccesoDatos.php");
    
    class GestionTorneosReglasNegocio {
        private $_ID;

        function __construct() {
        }

        function init($id) {
            $this->_ID = $id;
        }

        function getID() {
            return $this->_ID;
        }

        function obtenerUltimoIdTorneo() {
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->obtenerUltimoIdTorneo();
            return $res;            
        }

        function insertarTorneo($nombre, $fecha, $estado, $ganador) {
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->insertarTorneo($nombre,$fecha, $estado, $ganador);           
            return $res;            
        }

        function jugadores(){
            $gestionDAL = new GestionTorneosAccesoDatos();
            $res = $gestionDAL->jugadores();
            shuffle($res);

            $res1 = ['Cuartos', $res[0], $res[1]];
            $res2 = ['Cuartos', $res[2], $res[3]];
            $res3 = ['Cuartos', $res[4], $res[5]];
            $res4 = ['Cuartos', $res[6], $res[7]];            
            $result = [$res1, $res2, $res3, $res4];

            $insertarPartidosCuartos = $gestionDAL->insertarPartidosCuartos($result);

            return $insertarPartidosCuartos;
        }
    }