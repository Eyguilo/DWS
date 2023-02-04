<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    require("../Infraestructura/torneoAccesoDatos.php");

    class TorneoReglasNegocio {
        private $_ID;
        private $_NOMBRE;

        function __construct() {
        }

        function init($id, $nombre) {
            $this->_ID = $id;
            $this->_NOMBRE = $nombre;
        }

        function getID() {
            return $this->_ID;
        }
        function getNOMBRE() {
            return $this->_NOMBRE;
        }

        function obtenerCuartos($idTorneo){
            $torneoDAL = new TorneoAccesoDatos();
            $u = $torneoDAL->obtenerCuartos($idTorneo);
            return $u;
        }

        function obtenerSemifinales($idTorneo){
            $torneoDAL = new TorneoAccesoDatos();
            $u = $torneoDAL->obtenerSemifinales($idTorneo);
            return $u;
        }

        function obtenerFinal($idTorneo){
            $torneoDAL = new TorneoAccesoDatos();
            $u = $torneoDAL->obtenerFinal($idTorneo);
            return $u;
        }

        function nombreTorneo($idTorneo){
            $torneoDAL = new TorneoAccesoDatos();
            $u = $torneoDAL->nombreTorneo($idTorneo);
            return $u;
        }

        function obtenerGanador($idTorneo){
            $torneoDAL = new TorneoAccesoDatos();
            $u = $torneoDAL->obtenerGanador($idTorneo);
            return $u;
        }
        function insertarCampeonTorneo($idTorneo, $nombreJugador){
            $fichaDAL = new TorneoAccesoDatos();
            $u = $fichaDAL->insertarCampeonTorneo($idTorneo, $nombreJugador);
            return $u;
        }
    }