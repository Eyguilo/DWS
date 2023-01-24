<?php
    ini_set('display_errors', 'On');
    ini_set('html_errors', 1);

    require("../Infraestructura/torneosAccesoDatos.php");

    class TorneosReglasNegocio {
        private $_ID;
        private $_NOMBRE;
        private $_NUMJUGADORES;
        private $_FECHA;
        private $_ESTADO;
        private $_CAMPEON;

        function __construct() {
        }

        function init($id, $nombre, $numJugadores, $fecha, $estado, $campeon) {
            $this->_ID = $id;
            $this->_NOMBRE = $nombre;
            $this->_NUMJUGADORES = $numJugadores;
            $this->_FECHA = $fecha;
            $this->_ESTADO = $estado;
            $this->_CAMPEON = $campeon;
        }

        function getID() {
            return $this->_ID;
        }
        function getNOMBRE() {
            return $this->_NOMBRE;
        }
        function getNUMJUGADORES() {
            return $this->_NUMJUGADORES;
        }
        function getFECHA() {
            return $this->_FECHA;
        }
        function getESTADO() {
            return $this->_ESTADO;
        }
        function getCAMPEON() {
            return $this->_CAMPEON;
        }

        function obtener() {
            $torneosDAL = new TorneosAccesoDatos();
            $results = $torneosDAL->obtener();

            $listaTorneos =  array();

            foreach ($results as $torneos) {
                $oTorneosReglasNegocio = new TorneosReglasNegocio();
                $oTorneosReglasNegocio->init($torneos['id_torneo'], $torneos['nombre'], $torneos['num_jugadores'], $torneos['fecha'], $torneos['estado'], $torneos['campeon']);
                array_push($listaTorneos,$oTorneosReglasNegocio);            
            }
            
            return $listaTorneos;
        }
    }